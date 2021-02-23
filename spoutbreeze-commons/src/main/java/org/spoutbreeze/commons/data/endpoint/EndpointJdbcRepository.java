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

package org.spoutbreeze.commons.data.endpoint;

import java.util.List;

import org.spoutbreeze.commons.data.common.InsertInfoRowMapper;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.entities.Endpoint;
import org.spoutbreeze.commons.util.DbUtil;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.EmptyResultDataAccessException;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Repository;

@Repository
@Component("endpointJdbcRepository")
public class EndpointJdbcRepository {

    @Autowired
    JdbcTemplate jdbcTemplate;

    public Endpoint findById(Long id) {
        return jdbcTemplate.queryForObject("SELECT * FROM streaming_endpoints WHERE id = ?", new Object[] { id },
                new EndpointRowMapper());
    }

    public Endpoint findByName(String name) {
        try {
            return jdbcTemplate.queryForObject("SELECT * FROM streaming_endpoints WHERE name = ?",
                    new Object[] { name }, new EndpointRowMapper());
        } catch (EmptyResultDataAccessException e) {
            return null;
        }
    }

    public int deleteById(Long id) {
        return jdbcTemplate.update("DELETE FROM streaming_endpoints where id = ?", new Object[] { id });
    }

    public int insert(Endpoint endpoint) {
        return jdbcTemplate.update(
                "INSERT INTO streaming_endpoints (name, url, created_on,updated_on) "
                        + "VALUES(?, ?, ?, ?, ?::timestamp)",
                new Object[] { endpoint.name, endpoint.url, DbUtil.timeToDb(endpoint.createdOn) });
    }

    public List<Endpoint> findAll() {
        return jdbcTemplate.query("SELECT * FROM streaming_endpoints", new EndpointRowMapper());
    }

    public InsertInfo lastInsertedId() {
        return jdbcTemplate.query("SELECT MAX(id) as last_id FROM streaming_endpoints", new InsertInfoRowMapper())
                .get(0);
    }
}
