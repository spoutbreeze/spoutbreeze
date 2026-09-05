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
package org.spoutbreeze.commons.bbb;

import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;

import java.io.IOException;
import java.util.Locale;

/**
 * Reads meeting-ended (and related) events out of a bbb-webhooks JSON body.
 * The payload shape has moved between BBB releases, so this looks at the
 * documented fields and falls back to a conservative substring match.
 */
public final class BbbWebhookParser {
    private static final ObjectMapper MAPPER = new ObjectMapper();

    private BbbWebhookParser() {
    }

    public static boolean isMeetingEnded(String body) {
        if (body == null || body.isBlank()) {
            return false;
        }
        String lowered = body.toLowerCase(Locale.ROOT);
        if (lowered.contains("meeting-ended") || lowered.contains("meetingendedevtmsg")) {
            return true;
        }
        try {
            JsonNode root = MAPPER.readTree(body);
            return "meeting-ended".equalsIgnoreCase(eventId(root));
        } catch (IOException e) {
            return false;
        }
    }

    public static String contractType(String body) {
        if (isMeetingEnded(body)) {
            return "bbb.meeting_ended";
        }
        try {
            JsonNode root = MAPPER.readTree(body);
            String id = eventId(root).toLowerCase(Locale.ROOT);
            if (id.contains("created")) {
                return "bbb.meeting_created";
            }
            if (id.contains("left")) {
                return "bbb.user_left";
            }
            if (id.contains("joined")) {
                return "bbb.user_joined";
            }
        } catch (IOException e) {
            return "bbb.user_joined";
        }
        return "bbb.user_joined";
    }

    public static String externalMeetingId(String body) {
        if (body == null || body.isBlank()) {
            return "";
        }
        try {
            JsonNode root = MAPPER.readTree(body);
            String fromAttributes = text(root.path("data").path("attributes").path("meeting").path("external-meeting-id"));
            if (!fromAttributes.isEmpty()) {
                return fromAttributes;
            }
            String fromEvent = text(root.path("event").path("externalMeetingID"));
            if (!fromEvent.isEmpty()) {
                return fromEvent;
            }
            if (root.path("event").isArray() && root.path("event").size() > 0) {
                JsonNode first = root.path("event").get(0);
                String nested = text(first.path("data").path("attributes").path("meeting").path("external-meeting-id"));
                if (!nested.isEmpty()) {
                    return nested;
                }
            }
            String fromCore = text(root.path("core").path("body").path("meetingId"));
            if (!fromCore.isEmpty()) {
                return fromCore;
            }
            return text(root.path("payload").path("meeting_id"));
        } catch (IOException e) {
            return "";
        }
    }

    static String eventId(JsonNode root) {
        String dataId = text(root.path("data").path("id"));
        if (!dataId.isEmpty()) {
            return dataId;
        }
        if (root.path("event").isArray() && root.path("event").size() > 0) {
            return text(root.path("event").get(0).path("data").path("id"));
        }
        return text(root.path("event").path("type"));
    }

    private static String text(JsonNode node) {
        if (node == null || node.isMissingNode() || node.isNull()) {
            return "";
        }
        String value = node.asText("");
        return value == null ? "" : value;
    }
}
