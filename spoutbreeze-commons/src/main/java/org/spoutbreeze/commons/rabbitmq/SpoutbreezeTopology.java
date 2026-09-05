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
package org.spoutbreeze.commons.rabbitmq;

import com.rabbitmq.client.Channel;

import java.io.IOException;

/**
 * The 2021 RabbitMQ topology, declared identically wherever it is needed:
 * the direct exchange spoutbreeze, the manager command queue, the events
 * queue and the dead-letter queue.
 */
public final class SpoutbreezeTopology {
    public static final String EXCHANGE = "spoutbreeze";
    public static final String MANAGER_QUEUE = "spoutbreeze_manager";
    public static final String EVENTS_QUEUE = "spoutbreeze_events";
    public static final String DLQ = "spoutbreeze_dlq";

    private SpoutbreezeTopology() {
    }

    public static void declare(Channel channel) throws IOException {
        channel.exchangeDeclare(EXCHANGE, "direct", true);
        channel.queueDeclare(MANAGER_QUEUE, true, false, false, null);
        channel.queueBind(MANAGER_QUEUE, EXCHANGE, MANAGER_QUEUE);
        channel.queueDeclare(EVENTS_QUEUE, true, false, false, null);
        channel.queueBind(EVENTS_QUEUE, EXCHANGE, EVENTS_QUEUE);
        channel.queueDeclare(DLQ, true, false, false, null);
    }

    public static void declareAgentQueue(Channel channel, String queueName) throws IOException {
        channel.queueDeclare(queueName, true, false, false, null);
        channel.queueBind(queueName, EXCHANGE, queueName);
    }
}
