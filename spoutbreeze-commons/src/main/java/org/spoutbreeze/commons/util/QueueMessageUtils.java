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
package org.spoutbreeze.commons.util;

import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.contracts.BroadcastEvent;
import org.spoutbreeze.commons.contracts.BroadcastRequested;
import org.spoutbreeze.commons.contracts.BroadcastStopRequested;
import org.spoutbreeze.commons.contracts.StartSession;
import org.spoutbreeze.commons.contracts.StopSession;
import org.spoutbreeze.commons.entities.BroadcastMessage;

import java.io.IOException;
import java.io.UncheckedIOException;
import java.nio.charset.StandardCharsets;

public final class QueueMessageUtils {
    private static final Logger logger = LoggerFactory.getLogger(QueueMessageUtils.class);
    private static final ObjectMapper objectMapper = new ObjectMapper();

    private QueueMessageUtils() {
    }

    public static BroadcastMessage getBroadcastMessage(byte[] message) {
        return getBroadcastMessage(new String(message, StandardCharsets.UTF_8));
    }

    public static BroadcastMessage getBroadcastMessage(String message) {
        try {
            return objectMapper.readValue(message, BroadcastMessage.class);
        } catch (IOException e) {
            logger.error("Cannot parse the broadcast message payload: {}", message, e);
            return null;
        }
    }

    public static byte[] toMessageBody(BroadcastMessage message) {
        return toMessageBody((Object) message);
    }

    public static byte[] toMessageBody(Object message) {
        try {
            return objectMapper.writeValueAsBytes(message);
        } catch (IOException e) {
            throw new UncheckedIOException(e);
        }
    }

    public static BroadcastStopRequested getBroadcastStopRequested(String body) {
        try {
            JsonNode root = objectMapper.readTree(body);
            if (root.path("v").asInt() != 1 || !isStopCommand(root)) {
                return null;
            }
            return new BroadcastStopRequested(1, root.path("broadcast_id").asLong(),
                    textOrNull(root, "reason") == null ? "operator" : textOrNull(root, "reason"));
        } catch (IOException e) {
            logger.error("Cannot parse the broadcast stop payload: {}", body, e);
            return null;
        }
    }

    public static BroadcastRequested getBroadcastRequested(String body) {
        try {
            JsonNode root = objectMapper.readTree(body);
            if (root.path("v").asInt() != 1 || isStopCommand(root)) {
                return null;
            }
            if (textOrNull(root, "targets_ref") == null && textOrNull(root, "join_url") == null
                    && textOrNull(root, "meeting_id") == null) {
                return null;
            }
            Long serverId = root.has("server_id") && !root.path("server_id").isNull()
                    ? root.path("server_id").asLong() : null;
            return new BroadcastRequested(
                    1,
                    root.path("broadcast_id").asLong(),
                    textOrNull(root, "join_url"),
                    textOrNull(root, "targets_ref"),
                    root.path("profile").asText("1080p30"),
                    textOrNull(root, "meeting_id"),
                    serverId);
        } catch (IOException e) {
            logger.error("Cannot parse the broadcast request payload: {}", body, e);
            return null;
        }
    }

    public static StartSession getStartSession(String body) {
        try {
            JsonNode root = objectMapper.readTree(body);
            if (root.path("v").asInt() != 1 || textOrNull(root, "join_url") == null) {
                return null;
            }
            return new StartSession(
                    1,
                    root.path("broadcast_id").asLong(),
                    textOrNull(root, "join_url"),
                    textOrNull(root, "targets_ref"),
                    root.path("profile").asText("1080p30"));
        } catch (IOException e) {
            logger.error("Cannot parse the start session payload: {}", body, e);
            return null;
        }
    }

    public static StopSession getStopSession(String body) {
        try {
            JsonNode root = objectMapper.readTree(body);
            if (root.path("v").asInt() != 1 || textOrNull(root, "join_url") != null || !isStopCommand(root)) {
                return null;
            }
            return new StopSession(1, root.path("broadcast_id").asLong(),
                    textOrNull(root, "reason") == null ? "operator" : textOrNull(root, "reason"));
        } catch (IOException e) {
            logger.error("Cannot parse the stop session payload: {}", body, e);
            return null;
        }
    }

    public static BroadcastEvent getBroadcastEvent(String body) {
        try {
            JsonNode root = objectMapper.readTree(body);
            if (root.path("v").asInt() != 1 || textOrNull(root, "type") == null) {
                return null;
            }
            return objectMapper.treeToValue(root, BroadcastEvent.class);
        } catch (IOException e) {
            logger.error("Cannot parse the broadcast event payload: {}", body, e);
            return null;
        }
    }

    static boolean isStopCommand(JsonNode root) {
        return root.has("reason")
                || "broadcast.stop_requested".equals(root.path("type").asText())
                || "stop".equals(root.path("action").asText());
    }

    static String textOrNull(JsonNode root, String field) {
        JsonNode value = root.get(field);
        if (value == null || value.isNull()) {
            return null;
        }
        String text = value.asText();
        return text.isBlank() ? null : text;
    }
}
