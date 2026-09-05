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
package org.spoutbreeze.manager.services;

import jakarta.inject.Singleton;
import org.spoutbreeze.commons.data.agent.AgentJdbcRepository;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.enums.AgentStatus;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.util.List;
import java.util.Optional;

@Singleton
public class AgentsService {
    private static final Logger logger = LoggerFactory.getLogger(AgentsService.class);

    private final AgentJdbcRepository agentRepository;

    public AgentsService(AgentJdbcRepository agentRepository) {
        this.agentRepository = agentRepository;
    }

    public Optional<Agent> getAgent(Long agentId) {
        logger.info("Looking for agent with id {}", agentId);
        return agentRepository.findById(agentId);
    }

    public Optional<Agent> firstEnabledAgent() {
        List<Agent> agents = agentRepository.findAllByStatus(AgentStatus.ENABLED);
        return agents.isEmpty() ? Optional.empty() : Optional.of(agents.get(0));
    }
}
