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
package org.spoutbreeze.commons.data.agent;

import org.spoutbreeze.commons.db.RowMapper;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.enums.AgentStatus;
import org.spoutbreeze.commons.util.DbUtil;

import java.sql.ResultSet;
import java.sql.SQLException;

public class AgentRowMapper implements RowMapper<Agent> {
    @Override
    public Agent map(ResultSet rs) throws SQLException {
        Agent agent = new Agent();
        agent.id = rs.getLong("id");
        agent.name = rs.getString("name");
        String status = rs.getString("status");
        agent.status = status == null ? null : AgentStatus.valueOf(status);
        agent.createdOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("created_on"));
        agent.updatedOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("updated_on"));
        return agent;
    }
}
