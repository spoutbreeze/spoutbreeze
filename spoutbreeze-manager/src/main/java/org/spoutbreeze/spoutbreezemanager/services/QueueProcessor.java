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

import java.util.List;
import java.util.Optional;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.spoutbreeze.commons.enums.AgentStatus;
import org.spoutbreeze.commons.util.QueueMessageUtils;
import org.springframework.amqp.core.Message;
import org.springframework.amqp.rabbit.annotation.RabbitListener;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.lang.Nullable;
import org.springframework.stereotype.Component;

/**
 * Processes the inbound message from the queue
 */
@Component
public class QueueProcessor {
    private static final Logger logger = LoggerFactory.getLogger(AgentsService.class);

    @Autowired
    private AgentsService agentsService;

    @Autowired
    private BroadcastingAssigner broadcastingAssigner;

    @Autowired
    private AgentQueuePublisher agentQueuePublisher;

    /**
     * gets the message
     * @param message the message
     */
    @RabbitListener(queues = "spoutbreeze_manager")
    public void receiveMessage(final Message message) {
        //get the message
        final BroadcastMessage broadcastMessage = QueueMessageUtils.getBroadcastMessage(message.getBody());
        if (broadcastMessage == null) {
            return;
        }

        System.out.println("the broadcast message is " + broadcastMessage);

        //get the agent
        final Agent agent = getOneAgent(AgentStatus.ENABLED).orElseThrow(() -> new RuntimeException("No agent of type enabled"));

        //assinging the broadcasting message to the agent ????
//        broadcastingAssigner.assignBroadcastToAgent(broadcastMessage, agent);

        //send the queue message to the agent queue.
        agentQueuePublisher.publishMessage(broadcastMessage, agent);
    }

    /**
     * returns the agent(s) having the status
     * @param status the status of the agent
     * @return the agent(s) or no agent with the given status
     */
    @Nullable
    private Optional<Agent> getOneAgent(final AgentStatus status) {
        final List<Agent> agents = agentsService.getAllAgentForStatus(status);
        if (agents.size() == 0) {
            logger.error("the agents are empty, please get some agents");
            return null;
        }
        return Optional.of(agents.get(0));
    }
}
