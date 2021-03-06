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

package org.spoutbreeze.spoutbreezemanager.services;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Server;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Service;

@Service
public class ServersManager {

    private static final Logger logger = LoggerFactory.getLogger(ServersManager.class);

    @Autowired
    @Qualifier("serverJdbcRepository")
    private ServerJdbcRepository serverJdbcRepository;

    public Server getServer(Long serverId) {
        logger.info("Looking for agent with id {}", serverId);
        return serverJdbcRepository.findById(serverId);
    }
}
