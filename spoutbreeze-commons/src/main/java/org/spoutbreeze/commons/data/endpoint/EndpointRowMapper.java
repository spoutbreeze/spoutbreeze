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
package org.spoutbreeze.commons.data.endpoint;

import org.spoutbreeze.commons.db.RowMapper;
import org.spoutbreeze.commons.entities.Endpoint;
import org.spoutbreeze.commons.util.DbUtil;

import java.sql.ResultSet;
import java.sql.SQLException;

public class EndpointRowMapper implements RowMapper<Endpoint> {
    @Override
    public Endpoint map(ResultSet rs) throws SQLException {
        Endpoint endpoint = new Endpoint();
        endpoint.id = rs.getLong("id");
        endpoint.name = rs.getString("name");
        endpoint.url = rs.getString("url");
        endpoint.createdOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("created_on"));
        endpoint.updatedOn = DbUtil.timeStampToZonedDateTime(rs.getTimestamp("updated_on"));
        return endpoint;
    }
}
