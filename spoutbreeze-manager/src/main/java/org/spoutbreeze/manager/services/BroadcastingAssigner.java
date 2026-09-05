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

import io.micronaut.scheduling.annotation.Scheduled;
import jakarta.inject.Singleton;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.util.Optional;

@Singleton
public class BroadcastingAssigner {
    private static final Logger logger = LoggerFactory.getLogger(BroadcastingAssigner.class);

    private final BroadcastJdbcRepository broadcastRepository;
    private final AgentsService agentsService;
    private final AgentQueuePublisher agentQueuePublisher;

    public BroadcastingAssigner(BroadcastJdbcRepository broadcastRepository, AgentsService agentsService,
                                AgentQueuePublisher agentQueuePublisher) {
        this.broadcastRepository = broadcastRepository;
        this.agentsService = agentsService;
        this.agentQueuePublisher = agentQueuePublisher;
    }

    @Scheduled(fixedRate = "2500ms")
    public void scheduleAssignments() {
        try {
            assignReadyBroadcasts();
        } catch (RuntimeException e) {
            logger.error("Error during broadcast assignment", e);
        }
    }

    public void assignReadyBroadcasts() {
        Optional<Agent> agent = agentsService.firstEnabledAgent();
        if (agent.isEmpty()) {
            return;
        }

        // The claim is the atomic hand-over: only the winner publishes, so a
        // READY row can never be placed twice when this poller races the
        // queue consumer.
        Optional<Broadcast> claimed = broadcastRepository.claimNextReadyBroadcast(agent.get().id);
        if (claimed.isEmpty()) {
            return;
        }

        BroadcastMessage message = new BroadcastMessage();
        message.setId(claimed.get().id);
        if (!agentQueuePublisher.publishMessage(message, agent.get())) {
            logger.error("Cannot publish broadcast {} to agent {} — returning it to READY",
                    claimed.get().id, agent.get().id);
            broadcastRepository.updateStatus(claimed.get().id, BroadcastStatus.READY);
        }
    }
}
