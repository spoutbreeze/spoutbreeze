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

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.db.JdbcRepository;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.enums.AgentStatus;
import org.spoutbreeze.commons.util.DbUtil;

import javax.sql.DataSource;
import java.util.List;
import java.util.Optional;

public class AgentJdbcRepository extends JdbcRepository {
    private final AgentRowMapper rowMapper = new AgentRowMapper();

    public AgentJdbcRepository(DataSource dataSource) {
        super(dataSource);
    }

    public Optional<Agent> findById(Long id) {
        return queryOne("SELECT * FROM agents WHERE id = ?", rowMapper, id);
    }

    public Optional<Agent> findByName(String name) {
        return queryOne("SELECT * FROM agents WHERE name = ?", rowMapper, name);
    }

    public List<Agent> findAllByStatus(AgentStatus status) {
        return query("SELECT * FROM agents WHERE status = ?", rowMapper, status.toString());
    }

    public List<Agent> findAll() {
        return query("SELECT * FROM agents", rowMapper);
    }

    public int deleteById(Long id) {
        return update("DELETE FROM agents WHERE id = ?", id);
    }

    public int insert(Agent agent) {
        return update("INSERT INTO agents (name, status, created_on) VALUES (?, ?, ?)",
                agent.name, agent.status.toString(), DbUtil.toTimestamp(agent.createdOn));
    }

    public InsertInfo lastInsertedId() {
        return queryOne("SELECT MAX(id) AS last_id FROM agents", new InsertInfoRowMapper()).orElseThrow();
    }
}
