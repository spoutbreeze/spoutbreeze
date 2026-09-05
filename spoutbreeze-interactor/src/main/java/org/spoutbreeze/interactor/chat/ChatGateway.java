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
package org.spoutbreeze.interactor.chat;

import io.micronaut.context.annotation.Context;
import io.micronaut.context.annotation.Value;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

/**
 * Lifecycle for the Twitch chat source: disabled unless configured. When
 * enabled, connects over IRC/TLS and reconnects with a fixed backoff on any
 * drop; every parsed chat message goes to the relay.
 */
@Context
public class ChatGateway {
    private static final Logger logger = LoggerFactory.getLogger(ChatGateway.class);
    private static final long RECONNECT_BACKOFF_MS = 30_000;

    public ChatGateway(@Value("${chat.twitch.enabled:false}") boolean enabled,
                       @Value("${chat.twitch.token:}") String token,
                       @Value("${chat.twitch.nick:spoutbreeze-bot}") String nick,
                       @Value("${chat.twitch.channel:}") String channel,
                       @Value("${chat.facebook.enabled:false}") boolean facebookEnabled,
                       @Value("${chat.facebook.token:}") String facebookToken,
                       @Value("${chat.facebook.poll-ms:10000}") long facebookPollMs,
                       org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository broadcasts,
                       ChatRelayService relay) {
        if (enabled) {
            if (token.isBlank() || channel.isBlank()) {
                logger.warn("Twitch chat gateway enabled but the token or channel is empty; not connecting");
            } else {
                Thread.ofVirtual().name("twitch-chat").start(() -> run(token, nick, channel, relay));
                logger.info("Twitch chat gateway started for channel #{}", channel);
            }
        } else {
            logger.info("Twitch chat gateway disabled");
        }

        if (facebookEnabled) {
            if (facebookToken.isBlank()) {
                logger.warn("Facebook chat gateway enabled but the token is empty; not polling");
            } else {
                Thread.ofVirtual().name("facebook-chat")
                        .start(() -> runFacebook(facebookToken, facebookPollMs, broadcasts, relay));
                logger.info("Facebook chat gateway started");
            }
        } else {
            logger.info("Facebook chat gateway disabled");
        }
    }

    /**
     * Facebook comments follow the live broadcast's facebook destination:
     * the poller re-reads the destination meta when a broadcast goes live,
     * so the right live video id is always used.
     */
    private void runFacebook(String token, long pollMs,
                             org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository broadcasts,
                             ChatRelayService relay) {
        FacebookCommentsClient client = new FacebookCommentsClient(token);
        String liveVideoId = null;
        while (true) {
            try {
                var live = broadcasts.findLatestLive();
                String currentId = live
                        .map(b -> b.session_id)
                        .filter(id -> id != null && id.startsWith("fb:"))
                        .map(id -> id.substring(3))
                        .orElse(null);
                if (currentId == null) {
                    liveVideoId = null;
                } else if (!currentId.equals(liveVideoId)) {
                    liveVideoId = currentId;
                    client.seedCursor(null);
                    logger.info("Facebook chat following live video {}", currentId);
                }
                if (liveVideoId != null) {
                    for (FacebookCommentsClient.Comment comment : client.newComments(liveVideoId)) {
                        relay.relay("Facebook", comment.user(), comment.text());
                    }
                }
                Thread.sleep(pollMs);
            } catch (InterruptedException e) {
                Thread.currentThread().interrupt();
                return;
            } catch (Exception e) {
                logger.error("Facebook chat poll failed; retrying", e);
                try {
                    Thread.sleep(pollMs);
                } catch (InterruptedException ie) {
                    Thread.currentThread().interrupt();
                    return;
                }
            }
        }
    }

    private void run(String token, String nick, String channel, ChatRelayService relay) {
        while (true) {
            TwitchIrcClient client = new TwitchIrcClient(token, nick, channel,
                    message -> relay.relay("Twitch", message.user(), message.text()));
            try {
                client.connect();
                client.runLoop();
                logger.warn("Twitch chat connection dropped; reconnecting in {} ms", RECONNECT_BACKOFF_MS);
            } catch (Exception e) {
                logger.error("Twitch chat gateway error; reconnecting in {} ms", RECONNECT_BACKOFF_MS, e);
            } finally {
                client.close();
            }
            try {
                Thread.sleep(RECONNECT_BACKOFF_MS);
            } catch (InterruptedException e) {
                Thread.currentThread().interrupt();
                return;
            }
        }
    }
}
