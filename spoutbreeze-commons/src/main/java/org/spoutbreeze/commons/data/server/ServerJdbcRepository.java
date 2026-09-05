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
package org.spoutbreeze.commons.data.server;

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.db.JdbcRepository;
import org.spoutbreeze.commons.entities.Server;
import org.spoutbreeze.commons.util.DbUtil;

import javax.sql.DataSource;
import java.util.List;
import java.util.Optional;

public class ServerJdbcRepository extends JdbcRepository {
    private final ServerRowMapper rowMapper = new ServerRowMapper();

    public ServerJdbcRepository(DataSource dataSource) {
        super(dataSource);
    }

    public Optional<Server> findById(Long id) {
        return queryOne("SELECT * FROM servers WHERE id = ?", rowMapper, id);
    }

    public Optional<Server> findByName(String fqdn) {
        return queryOne("SELECT * FROM servers WHERE fqdn = ?", rowMapper, fqdn);
    }

    public List<Server> findAll() {
        return query("SELECT * FROM servers", rowMapper);
    }

    public int deleteById(Long id) {
        return update("DELETE FROM servers WHERE id = ?", id);
    }

    public int insert(Server server) {
        return update("INSERT INTO servers (fqdn, ip_address, shared_secret, created_on) VALUES (?, ?, ?, ?)",
                server.fqdn, server.ipAddress, server.sharedSecret, DbUtil.toTimestamp(server.createdOn));
    }

    public InsertInfo lastInsertedId() {
        return queryOne("SELECT MAX(id) AS last_id FROM servers", new InsertInfoRowMapper()).orElseThrow();
    }
}
