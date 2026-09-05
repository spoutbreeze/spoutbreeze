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

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.db.JdbcRepository;
import org.spoutbreeze.commons.entities.Endpoint;
import org.spoutbreeze.commons.util.DbUtil;

import javax.sql.DataSource;
import java.util.List;
import java.util.Optional;

public class EndpointJdbcRepository extends JdbcRepository {
    private final EndpointRowMapper rowMapper = new EndpointRowMapper();

    public EndpointJdbcRepository(DataSource dataSource) {
        super(dataSource);
    }

    public Optional<Endpoint> findById(Long id) {
        return queryOne("SELECT * FROM streaming_endpoints WHERE id = ?", rowMapper, id);
    }

    public Optional<Endpoint> findByName(String name) {
        return queryOne("SELECT * FROM streaming_endpoints WHERE name = ?", rowMapper, name);
    }

    public List<Endpoint> findAll() {
        return query("SELECT * FROM streaming_endpoints", rowMapper);
    }

    public int deleteById(Long id) {
        return update("DELETE FROM streaming_endpoints WHERE id = ?", id);
    }

    public int insert(Endpoint endpoint) {
        return update("INSERT INTO streaming_endpoints (name, url, created_on) VALUES (?, ?, ?)",
                endpoint.name, endpoint.url, DbUtil.toTimestamp(endpoint.createdOn));
    }

    public InsertInfo lastInsertedId() {
        return queryOne("SELECT MAX(id) AS last_id FROM streaming_endpoints", new InsertInfoRowMapper()).orElseThrow();
    }
}
