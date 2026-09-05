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

import jakarta.inject.Singleton;
import org.spoutbreeze.commons.bbb.BbbApiClient;
import org.spoutbreeze.commons.contracts.BroadcastEvent;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.entities.Server;
import org.spoutbreeze.commons.util.QueueMessageUtils;
import org.spoutbreeze.interactor.bbb.BbbEventPublisher;
import org.spoutbreeze.interactor.chat.ChatMessageFormatter;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.time.OffsetDateTime;
import java.util.Map;
import java.util.Optional;
import java.util.function.LongSupplier;

/**
 * Relays platform chat into the live BigBlueButton meeting: finds the LIVE
 * broadcast, formats the message with a platform prefix, and calls the BBB
 * sendChatMessage API. Rate limited so a chatty stream cannot flood the
 * meeting (the design's "relay mode with rate limits").
 */
@Singleton
public class ChatRelayService {
    private static final Logger logger = LoggerFactory.getLogger(ChatRelayService.class);
    private static final int MAX_TEXT_LENGTH = 200;

    private final BroadcastJdbcRepository broadcasts;
    private final ServerJdbcRepository servers;
    private final BbbEventPublisher eventPublisher;
    private final String checksumAlgo;
    private final long minIntervalMs;
    private LongSupplier clock = System::currentTimeMillis;
    private long lastSentAt;

    public ChatRelayService(BroadcastJdbcRepository broadcasts, ServerJdbcRepository servers,
                            BbbEventPublisher eventPublisher,
                            @io.micronaut.context.annotation.Value("${spoutbreeze.bbb.checksum-algo}") String checksumAlgo,
                            @io.micronaut.context.annotation.Value("${chat.relay.min-interval-ms:2000}") long minIntervalMs) {
        this.broadcasts = broadcasts;
        this.servers = servers;
        this.eventPublisher = eventPublisher;
        this.checksumAlgo = checksumAlgo;
        this.minIntervalMs = minIntervalMs;
    }

    void setClock(LongSupplier clock) {
        this.clock = clock;
    }

    public void relay(String platform, String user, String text) {
        if (user == null || text == null || text.isBlank()) {
            return;
        }
        long now = clock.getAsLong();
        if (now - lastSentAt < minIntervalMs) {
            logger.debug("Rate limit: dropping chat message from {}", user);
            return;
        }

        Optional<Broadcast> live = broadcasts.findLatestLive();
        if (live.isEmpty() || live.get().meeting_id == null) {
            logger.debug("No live broadcast to relay chat into");
            return;
        }
        Broadcast broadcast = live.get();
        Optional<Server> server = servers.findById(broadcast.server_id);
        if (server.isEmpty()) {
            logger.warn("Broadcast {} points at an unknown server {}", broadcast.id, broadcast.server_id);
            return;
        }

        String formatted = ChatMessageFormatter.format(platform, user, truncate(text));
        try {
            createClient(server.get()).sendChatMessage(broadcast.meeting_id, formatted);
        } catch (InterruptedException e) {
            Thread.currentThread().interrupt();
            return;
        } catch (Exception e) {
            logger.error("Cannot relay chat message into meeting {}", broadcast.meeting_id, e);
            return;
        }

        lastSentAt = now;
        publishChatInbound(server.get().fqdn, broadcast.id, platform, user, text);
        logger.info("Relayed {} chat from {} into meeting {}", platform, user, broadcast.meeting_id);
    }

    BbbApiClient createClient(Server server) {
        return new BbbApiClient("https://" + server.fqdn + "/bigbluebutton/api", server.sharedSecret, checksumAlgo);
    }

    private void publishChatInbound(String server, Long broadcastId, String platform, String user, String text) {
        try {
            BroadcastEvent event = new BroadcastEvent(1, "chat.inbound",
                    OffsetDateTime.now().toInstant().toString(), broadcastId, null, server,
                    Map.of("platform", platform, "user", user, "text", text));
            eventPublisher.publish(server, new String(QueueMessageUtils.toMessageBody(event),
                    java.nio.charset.StandardCharsets.UTF_8));
        } catch (RuntimeException e) {
            logger.warn("Cannot publish the chat.inbound event", e);
        }
    }

    private static String truncate(String text) {
        String flat = text.replaceAll("\\s+", " ").trim();
        return flat.length() <= MAX_TEXT_LENGTH ? flat : flat.substring(0, MAX_TEXT_LENGTH - 1) + "…";
    }
}
