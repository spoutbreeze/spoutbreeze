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

package org.spoutbreeze.commons.data.agent;

import java.util.List;

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.util.DbUtil;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.EmptyResultDataAccessException;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Repository;

@Repository
@Component("agentJdbcRepository")
public class AgentJdbcRepository {

    @Autowired
    JdbcTemplate jdbcTemplate;

    public Agent findById(Long id) {
        return jdbcTemplate.queryForObject("SELECT * FROM agents WHERE id = ?", new Object[] { id },
                new AgentRowMapper());
    }

    public Agent findByName(String name) {
        try {
            return jdbcTemplate.queryForObject("SELECT * FROM agents WHERE name = ?", new Object[] { name },
                    new AgentRowMapper());
        } catch (EmptyResultDataAccessException e) {
            return null;
        }
    }

    public int deleteById(Long id) {
        return jdbcTemplate.update("DELETE FROM agents where id = ?", new Object[] { id });
    }

    public int insert(Agent agent) {
        return jdbcTemplate.update(
                "INSERT INTO agents (name, status, created_on) " + "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?::timestamp)",
                new Object[] { agent.name, agent.status, DbUtil.timeToDb(agent.createdOn) });
    }

    public List<Agent> findAll() {
        return jdbcTemplate.query("SELECT * FROM agents", new AgentRowMapper());
    }

    public InsertInfo lastInsertedId() {
        return jdbcTemplate.query("SELECT MAX(id) as last_id FROM agents", new InsertInfoRowMapper()).get(0);
    }
}
