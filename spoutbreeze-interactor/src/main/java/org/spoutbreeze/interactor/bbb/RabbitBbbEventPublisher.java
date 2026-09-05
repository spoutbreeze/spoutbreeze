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
package org.spoutbreeze.interactor.bbb;

import com.rabbitmq.client.Channel;
import io.micronaut.rabbitmq.connect.ChannelPool;
import jakarta.inject.Singleton;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.bbb.BbbWebhookParser;
import org.spoutbreeze.commons.contracts.BroadcastEvent;
import org.spoutbreeze.commons.rabbitmq.SpoutbreezeTopology;
import org.spoutbreeze.commons.util.QueueMessageUtils;

import java.io.IOException;
import java.time.Instant;
import java.util.HashMap;
import java.util.Map;

@Singleton
public class RabbitBbbEventPublisher implements BbbEventPublisher {
    private static final Logger logger = LoggerFactory.getLogger(RabbitBbbEventPublisher.class);

    private final ChannelPool channelPool;

    public RabbitBbbEventPublisher(ChannelPool channelPool) {
        this.channelPool = channelPool;
    }

    @Override
    public void publish(String server, String body) {
        Map<String, Object> payload = new HashMap<>();
        payload.put("raw", body);
        String meetingId = BbbWebhookParser.externalMeetingId(body);
        if (!meetingId.isEmpty()) {
            payload.put("meeting_id", meetingId);
        }
        String type = BbbWebhookParser.contractType(body);
        publishEvent(new BroadcastEvent(1, type, Instant.now().toString(), null, null, server, payload));
    }

    @Override
    public void publishEvent(BroadcastEvent event) {
        Channel channel = null;
        try {
            channel = channelPool.getChannel();
            channel.basicPublish(SpoutbreezeTopology.EXCHANGE, SpoutbreezeTopology.EVENTS_QUEUE, null,
                    QueueMessageUtils.toMessageBody((Object) event));
            logger.info("Published {} from server {}", event.type(), event.server());
        } catch (IOException e) {
            logger.error("Cannot publish the BigBlueButton event from server {}", event.server(), e);
        } finally {
            if (null != channel) {
                channelPool.returnChannel(channel);
            }
        }
    }
}
