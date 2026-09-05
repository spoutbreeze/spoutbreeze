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

import org.spoutbreeze.commons.db.RowMapper;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.util.DbUtil;

import java.sql.ResultSet;
import java.sql.SQLException;

public class BroadcastRowMapper implements RowMapper<Broadcast> {
    @Override
    public Broadcast map(ResultSet rs) throws SQLException {
        Broadcast broadcast = new Broadcast();
        broadcast.id = rs.getLong("id");
        broadcast.server_id = rs.getLong("server_id");
        broadcast.endpoint_id = rs.getLong("endpoint_id");
        broadcast.session_id = rs.getString("session_id");
        broadcast.meeting_id = columnOrNull(rs, "meeting_id");
        Long agentId = columnLong(rs, "agent_id");
        broadcast.agent_id = agentId != null && agentId != 0L ? agentId : null;
        String status = rs.getString("status");
        broadcast.status = status == null ? null : BroadcastStatus.valueOf(status);
        broadcast.createdOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("created_on"));
        broadcast.updatedOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("updated_on"));
        return broadcast;
    }

    private static String columnOrNull(ResultSet rs, String column) {
        try {
            return rs.getString(column);
        } catch (SQLException e) {
            return null;
        }
    }

    private static Long columnLong(ResultSet rs, String column) {
        try {
            long value = rs.getLong(column);
            return rs.wasNull() ? null : value;
        } catch (SQLException e) {
            return null;
        }
    }
}
