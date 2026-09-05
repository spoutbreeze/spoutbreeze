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
package org.spoutbreeze.manager;

import com.rabbitmq.client.AMQP;
import com.rabbitmq.client.Channel;
import io.micronaut.rabbitmq.connect.ChannelPool;
import org.junit.jupiter.api.Test;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.spoutbreeze.manager.services.AgentQueuePublisher;

import java.io.IOException;

import static org.assertj.core.api.Assertions.assertThat;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.ArgumentMatchers.anyBoolean;
import static org.mockito.ArgumentMatchers.anyMap;
import static org.mockito.ArgumentMatchers.anyString;
import static org.mockito.ArgumentMatchers.eq;
import static org.mockito.ArgumentMatchers.isNull;
import static org.mockito.Mockito.doThrow;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

class AgentQueuePublisherTest {
    private final ChannelPool channelPool = mock(ChannelPool.class);
    private final Channel channel = mock(Channel.class);
    private final AgentQueuePublisher publisher = new AgentQueuePublisher(channelPool);

    private Agent agent(long id, String name) throws IOException {
        when(channelPool.getChannel()).thenReturn(channel);
        Agent agent = new Agent();
        agent.id = id;
        agent.name = name;
        return agent;
    }

    @Test
    void buildsPerAgentQueueName() {
        Agent agent = new Agent();
        agent.id = 5L;
        agent.name = "host-one";

        assertThat(publisher.queueNameFor(agent)).isEqualTo("spoutbreeze_agent.host-one");
    }

    @Test
    void declaresQueueAndPublishesMessage() throws IOException {
        Agent agent = agent(5L, "host-one");
        BroadcastMessage message = new BroadcastMessage();
        message.setId(7L);

        publisher.publishMessage(message, agent);

        assertThat(message.getAgentId()).isEqualTo("5");
        verify(channel).queueDeclare("spoutbreeze_agent.host-one", true, false, false, null);
        verify(channel).queueBind(eq("spoutbreeze_agent.host-one"), eq("spoutbreeze"), eq("spoutbreeze_agent.host-one"));
        verify(channel).basicPublish(eq(""), eq("spoutbreeze_agent.host-one"), any(), any());
        verify(channelPool).returnChannel(channel);
    }

    @Test
    void returnsChannelAndSwallowsPublishFailure() throws IOException {
        Agent agent = agent(5L, "host-one");
        when(channel.queueDeclare(anyString(), anyBoolean(), anyBoolean(), anyBoolean(), anyMap()))
                .thenReturn(mock(AMQP.Queue.DeclareOk.class));
        doThrow(new IOException("boom")).when(channel).basicPublish(anyString(), anyString(), any(), any());

        publisher.publishMessage(new BroadcastMessage(), agent);

        verify(channelPool).returnChannel(channel);
        verify(channel).basicPublish(anyString(), anyString(), isNull(), any());
    }

    @Test
    void publishesStopSessionToTheAgentQueue() throws IOException {
        Agent agent = agent(5L, "host-one");
        org.spoutbreeze.commons.contracts.StopSession stop =
                new org.spoutbreeze.commons.contracts.StopSession(1, 7L, "operator");

        publisher.publishStopSession(stop, agent);

        verify(channel).basicPublish(eq(""), eq("spoutbreeze_agent.host-one"), any(), any());
        verify(channelPool).returnChannel(channel);
    }
}
