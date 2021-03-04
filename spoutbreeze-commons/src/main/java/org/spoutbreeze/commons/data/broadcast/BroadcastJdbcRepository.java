/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

package org.spoutbreeze.commons.data.broadcast;

import java.util.List;

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.util.DbUtil;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Repository;

@Repository
@Component("BroadcastJdbcRepository")
public class BroadcastJdbcRepository {

    @Autowired
    JdbcTemplate jdbcTemplate;

    public Broadcast findById(Long id) {
        return jdbcTemplate.queryForObject("SELECT * FROM broadcasts WHERE id = ?", new Object[] { id },
                new BroadcastRowMapper());
    }

    public int deleteById(Long id) {
        return jdbcTemplate.update("DELETE FROM broadcasts where id = ?", new Object[] { id });
    }

    public int insert(Broadcast broadcast) {
        return jdbcTemplate.update(
                "INSERT INTO broadcasts (selenoid_id, server_id, endpoint_id, created_on) "
                        + "VALUES(?, ?, ?, ?::timestamp)",
                new Object[] { broadcast.selenoid_id, broadcast.server_id, broadcast.endpoint_id,
                        DbUtil.timeToDb(broadcast.createdOn) });
    }

    public Broadcast findReadyBroadcast() {
        return jdbcTemplate.queryForObject("SELECT * FROM broadcasts WHERE status = ? LIMIT 1",
                new Object[] { BroadcastStatus.READY }, new BroadcastRowMapper());
    }

    public int assignToAgent(Broadcast broadcast, int agentId) {
        return jdbcTemplate.update(
                "UPDATE broadcast SET status = ?, agent_id = ?, updated_on = ?::timestamp WHERE id = ?",
                new Object[] { BroadcastStatus.ASSIGNED.toString(), agentId, DbUtil.now(), broadcast.id });
    }

    public List<Broadcast> findAll() {
        return jdbcTemplate.query("SELECT * FROM broadcasts", new BroadcastRowMapper());
    }

    public InsertInfo lastInsertedId() {
        return jdbcTemplate.query("SELECT MAX(id) as last_id FROM broadcasts", new InsertInfoRowMapper()).get(0);
    }
}
