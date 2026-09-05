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
package org.spoutbreeze.commons;

import com.rabbitmq.client.Channel;
import org.junit.jupiter.api.Test;
import org.spoutbreeze.commons.rabbitmq.SpoutbreezeTopology;

import java.io.IOException;

import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.verify;

class SpoutbreezeTopologyTest {
    private final Channel channel = mock(Channel.class);

    @Test
    void declaresExchangeQueuesAndBindings() throws IOException {
        SpoutbreezeTopology.declare(channel);

        verify(channel).exchangeDeclare("spoutbreeze", "direct", true);
        verify(channel).queueDeclare("spoutbreeze_manager", true, false, false, null);
        verify(channel).queueBind("spoutbreeze_manager", "spoutbreeze", "spoutbreeze_manager");
        verify(channel).queueDeclare("spoutbreeze_events", true, false, false, null);
        verify(channel).queueBind("spoutbreeze_events", "spoutbreeze", "spoutbreeze_events");
        verify(channel).queueDeclare("spoutbreeze_dlq", true, false, false, null);
    }

    @Test
    void declaresPerAgentQueue() throws IOException {
        SpoutbreezeTopology.declareAgentQueue(channel, "spoutbreeze_agent.host-one-5");

        verify(channel).queueDeclare("spoutbreeze_agent.host-one-5", true, false, false, null);
        verify(channel).queueBind("spoutbreeze_agent.host-one-5", "spoutbreeze", "spoutbreeze_agent.host-one-5");
    }
}
