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

package org.spoutbreeze.commons.data.server;

import java.sql.ResultSet;
import java.sql.SQLException;

import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.util.DbUtil;
import org.springframework.jdbc.core.RowMapper;

public class ServerRowMapper implements RowMapper<Server> {

    @Override
    public Server mapRow(ResultSet rs, int rowNum) throws SQLException {

        Server server = new Server();
        server.id = rs.getLong("id");
        server.fqdn = rs.getString("fqdn");
        server.ip_address = rs.getString("ip_address");
        server.shared_secret = rs.getString("shared_secret");
        server.createdOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("created_on"));
        server.updatedOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("updated_on"));
        return server;
    }

}
