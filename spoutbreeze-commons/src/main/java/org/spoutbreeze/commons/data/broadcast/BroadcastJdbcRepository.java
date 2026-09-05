/*
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021-2026 RIADVICE SUARL.
 *
 * This program is free software: you can redistribute it and/or modify it under the
 * terms of the GNU Affero General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License along
 * with SpoutBreeze. If not, see <https://www.gnu.org/licenses/>.
 */
package org.spoutbreeze.commons.data.broadcast;

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.db.JdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.util.DbUtil;

import javax.sql.DataSource;
import java.util.List;
import java.util.Optional;

public class BroadcastJdbcRepository extends JdbcRepository {
    private final BroadcastRowMapper rowMapper = new BroadcastRowMapper();

    public BroadcastJdbcRepository(DataSource dataSource) {
        super(dataSource);
    }

    public Optional<Broadcast> findById(Long id) {
        return queryOne("SELECT * FROM broadcasts WHERE id = ?", rowMapper, id);
    }

    public List<Broadcast> findAll() {
        return query("SELECT * FROM broadcasts", rowMapper);
    }

    public Optional<Broadcast> findReadyBroadcast() {
        return queryOne("SELECT * FROM broadcasts WHERE status = ? LIMIT 1", rowMapper, BroadcastStatus.READY.toString());
    }

    public Optional<Broadcast> findByMeetingId(String meetingId) {
        return queryOne("SELECT * FROM broadcasts WHERE meeting_id = ?", rowMapper, meetingId);
    }

    public Optional<Broadcast> findLatestLive() {
        return queryOne("SELECT * FROM broadcasts WHERE status = ? ORDER BY id DESC LIMIT 1", rowMapper,
                BroadcastStatus.LIVE.toString());
    }

    public Optional<Broadcast> findLiveByMeetingId(String meetingId) {
        return queryOne("SELECT * FROM broadcasts WHERE meeting_id = ? AND status = ?", rowMapper,
                meetingId, BroadcastStatus.LIVE.toString());
    }

    public int deleteById(Long id) {
        return update("DELETE FROM broadcasts WHERE id = ?", id);
    }

    public long insert(Broadcast broadcast) {
        String sessionId = broadcast.session_id == null || broadcast.session_id.isBlank() ? "none" : broadcast.session_id;
        String status = broadcast.status == null ? BroadcastStatus.READY.toString() : broadcast.status.toString();
        return insertAndReturnId(
                "INSERT INTO broadcasts (session_id, server_id, endpoint_id, meeting_id, agent_id, status, created_on) VALUES (?, ?, ?, ?, ?, ?, ?)",
                sessionId, broadcast.server_id, broadcast.endpoint_id, broadcast.meeting_id, broadcast.agent_id,
                status, DbUtil.toTimestamp(broadcast.createdOn));
    }

    public int assignToAgent(Broadcast broadcast, long agentId) {
        return update("UPDATE broadcasts SET status = ?, agent_id = ?, updated_on = ? WHERE id = ?",
                BroadcastStatus.ASSIGNED.toString(), agentId, DbUtil.nowTimestamp(), broadcast.id);
    }

    /**
     * Atomically claim a broadcast that is still READY: the conditional
     * UPDATE is the lock, so exactly one consumer wins a given row even when
     * the scheduled assigner and the queue consumer race.
     */
    public int claimBroadcast(long broadcastId, long agentId) {
        return update("UPDATE broadcasts SET status = ?, agent_id = ?, updated_on = ? WHERE id = ? AND status = ?",
                BroadcastStatus.ASSIGNED.toString(), agentId, DbUtil.nowTimestamp(), broadcastId,
                BroadcastStatus.READY.toString());
    }

    /**
     * Atomically claim the oldest READY broadcast for the given agent, or
     * empty when none is left. Retries the candidate selection when another
     * consumer claims the row between the read and the conditional update.
     */
    public Optional<Broadcast> claimNextReadyBroadcast(long agentId) {
        for (int attempt = 0; attempt < 10; attempt++) {
            Optional<Long> candidate = queryOne("SELECT id FROM broadcasts WHERE status = ? ORDER BY id ASC LIMIT 1",
                    rs -> rs.getLong("id"), BroadcastStatus.READY.toString());
            if (candidate.isEmpty()) {
                return Optional.empty();
            }
            if (claimBroadcast(candidate.get(), agentId) == 1) {
                return findById(candidate.get());
            }
        }
        return Optional.empty();
    }

    public int updateStatus(Long id, BroadcastStatus status) {
        return update("UPDATE broadcasts SET status = ?, updated_on = ? WHERE id = ?",
                status.toString(), DbUtil.nowTimestamp(), id);
    }

    public int updateSessionId(Long id, String sessionId) {
        return update("UPDATE broadcasts SET session_id = ?, updated_on = ? WHERE id = ?",
                sessionId, DbUtil.nowTimestamp(), id);
    }

    public int releaseAgent(Long id) {
        return update("UPDATE broadcasts SET agent_id = NULL, updated_on = ? WHERE id = ?",
                DbUtil.nowTimestamp(), id);
    }

    public InsertInfo lastInsertedId() {
        return queryOne("SELECT MAX(id) AS last_id FROM broadcasts", new InsertInfoRowMapper()).orElseThrow();
    }
}
