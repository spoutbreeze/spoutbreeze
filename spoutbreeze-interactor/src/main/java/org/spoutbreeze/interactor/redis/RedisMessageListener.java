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

package org.spoutbreeze.interactor.redis;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.inject.Singleton;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.interactor.handlers.ReceivedMessageHandler;

import io.lettuce.core.pubsub.RedisPubSubListener;
import io.lettuce.core.pubsub.StatefulRedisPubSubConnection;
import io.micronaut.context.annotation.Context;

@Context
@Singleton
public class RedisMessageListener {

    private static final Logger log = LoggerFactory.getLogger(RedisMessageListener.class);

    @Inject
    StatefulRedisPubSubConnection<String, String> connection;

    ReceivedMessageHandler handler;

    @PostConstruct
    public void addListeners() {
        log.info("Adding BigBlueButton Redis listeners");
        handler = new ReceivedMessageHandler();
        // @todo: put the channels in configuration
        connection.async().subscribe("to-akka-apps-redis-channel", "from-akka-apps-redis-channel");
        connection.addListener(new RedisPubSubListener<String, String>() {
            @Override
            public void message(String s, String s2) {
                log.info("message, channel = {}, message = {}", s, s2);
                handler.handleMessage(s);
            }

            @Override
            public void message(String s, String k1, String s2) {
                log.info("message, pattern = {}, channel = {}, message = {}", s, k1, s2);
            }

            @Override
            public void subscribed(String s, long l) {
                log.info("subscribed, channel = {}, currentChannelCount = {}", s, l);
            }

            @Override
            public void psubscribed(String s, long l) {
                log.info("psubscribed, channel = {}, currentChannelCount = {}", s, l);
            }

            @Override
            public void unsubscribed(String s, long l) {
                log.info("unsubscribed, channel = {}, currentChannelCount = {}", s, l);
            }

            @Override
            public void punsubscribed(String s, long l) {
                log.info("punsubscribed, channel = {}, currentChannelCount = {}", s, l);
            }
        });
    }
}
