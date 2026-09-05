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
package org.spoutbreeze.interactor.redis;

import io.lettuce.core.RedisClient;
import io.lettuce.core.pubsub.RedisPubSubListener;
import io.lettuce.core.pubsub.StatefulRedisPubSubConnection;
import io.micronaut.context.annotation.Context;
import io.micronaut.context.annotation.Value;
import jakarta.annotation.PostConstruct;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.interactor.handlers.ReceivedMessageHandler;

@Context
public class RedisMessageListener {
    private static final Logger logger = LoggerFactory.getLogger(RedisMessageListener.class);

    private final RedisClient redisClient;
    private final ReceivedMessageHandler handler = new ReceivedMessageHandler();

    public RedisMessageListener(@Value("${redis.uri}") String redisUri) {
        this.redisClient = RedisClient.create(redisUri);
    }

    @PostConstruct
    public void addListeners() {
        logger.info("Adding BigBlueButton Redis listeners");
        StatefulRedisPubSubConnection<String, String> connection = redisClient.connectPubSub();
        connection.async().subscribe("to-akka-apps-redis-channel", "from-akka-apps-redis-channel");
        connection.addListener(new RedisPubSubListener<>() {
            @Override
            public void message(String channel, String message) {
                logger.info("message, channel = {}", channel);
                handler.handleMessage(message);
            }

            @Override
            public void message(String pattern, String channel, String message) {
                logger.info("message, pattern = {}, channel = {}", pattern, channel);
            }

            @Override
            public void subscribed(String channel, long count) {
                logger.info("subscribed, channel = {}", channel);
            }

            @Override
            public void psubscribed(String pattern, long count) {
                logger.info("psubscribed, pattern = {}", pattern);
            }

            @Override
            public void unsubscribed(String channel, long count) {
                logger.info("unsubscribed, channel = {}", channel);
            }

            @Override
            public void punsubscribed(String pattern, long count) {
                logger.info("punsubscribed, pattern = {}", pattern);
            }
        });
    }
}
