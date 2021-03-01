package org.spoutbreeze.interactor.redis;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.inject.Singleton;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import io.lettuce.core.pubsub.RedisPubSubListener;
import io.lettuce.core.pubsub.StatefulRedisPubSubConnection;
import io.micronaut.context.annotation.Context;

@Context
@Singleton
public class RedisMessageListener {

    private static final Logger log = LoggerFactory.getLogger(RedisMessageListener.class);

    @Inject
    StatefulRedisPubSubConnection<String, String> connection;

    @PostConstruct
    public void addListeners() {
        log.info("Adding BigBlueButton Redis listeners");
        // @todo: put the channels in configuration
        connection.async().subscribe("to-akka-apps-redis-channel");
        connection.async().subscribe("from-akka-apps-redis-channel");
        connection.addListener(new RedisPubSubListener<String, String>() {
            @Override
            public void message(String s, String s2) {
                log.info("message, channel = {}, message = {}", s, s2);
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
