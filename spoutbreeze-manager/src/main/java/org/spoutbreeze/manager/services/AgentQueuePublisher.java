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

import com.rabbitmq.client.Channel;
import io.micronaut.rabbitmq.connect.ChannelPool;
import jakarta.inject.Singleton;
import org.spoutbreeze.commons.contracts.StartSession;
import org.spoutbreeze.commons.contracts.StopSession;
import org.spoutbreeze.commons.contracts.StopSession;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.spoutbreeze.commons.rabbitmq.SpoutbreezeTopology;
import org.spoutbreeze.commons.util.QueueMessageUtils;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.io.IOException;

@Singleton
public class AgentQueuePublisher {
    private static final Logger logger = LoggerFactory.getLogger(AgentQueuePublisher.class);

    private final ChannelPool channelPool;

    public AgentQueuePublisher(ChannelPool channelPool) {
        this.channelPool = channelPool;
    }

    public boolean publishMessage(BroadcastMessage message, Agent agent) {
        message.setAgentId(String.valueOf(agent.id));
        String queueName = queueNameFor(agent);

        Channel channel = null;
        try {
            channel = channelPool.getChannel();
            SpoutbreezeTopology.declareAgentQueue(channel, queueName);
            channel.basicPublish("", queueName, null, QueueMessageUtils.toMessageBody(message));
            logger.info("Published broadcast {} to agent queue {}", message.getId(), queueName);
            return true;
        } catch (IOException e) {
            logger.error("Cannot publish to agent queue {}", queueName, e);
            return false;
        } finally {
            if (null != channel) {
                channelPool.returnChannel(channel);
            }
        }
    }

    public boolean publishStartSession(StartSession session, Agent agent) {
        String queueName = queueNameFor(agent);
        try (Channel channel = channelPool.getChannel()) {
            SpoutbreezeTopology.declareAgentQueue(channel, queueName);
            channel.basicPublish("", queueName, null, QueueMessageUtils.toMessageBody((Object) session));
            logger.info("Published start session for broadcast {} to agent queue {}", session.broadcastId(), queueName);
            return true;
        } catch (IOException | java.util.concurrent.TimeoutException e) {
            logger.error("Cannot publish to agent queue {}", queueName, e);
            return false;
        }
    }

    public boolean publishStopSession(StopSession session, Agent agent) {
        String queueName = queueNameFor(agent);
        Channel channel = null;
        try {
            channel = channelPool.getChannel();
            SpoutbreezeTopology.declareAgentQueue(channel, queueName);
            channel.basicPublish("", queueName, null, QueueMessageUtils.toMessageBody((Object) session));
            logger.info("Published stop session for broadcast {} to agent queue {}", session.broadcastId(), queueName);
            return true;
        } catch (IOException e) {
            logger.error("Cannot publish stop to agent queue {}", queueName, e);
            return false;
        } finally {
            if (null != channel) {
                channelPool.returnChannel(channel);
            }
        }
    }

    public String queueNameFor(Agent agent) {
        return "spoutbreeze_agent." + agent.name;
    }
}
