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
package org.spoutbreeze.commons.contracts;

import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.Map;

/**
 * BroadcastEvent v1 — envelope on spoutbreeze_events
 * (spoutbreeze-commons/contracts/broadcast-event.schema.json).
 */
@JsonInclude(JsonInclude.Include.NON_NULL)
public record BroadcastEvent(
        @JsonProperty("v") int v,
        @JsonProperty("type") String type,
        @JsonProperty("timestamp") String timestamp,
        @JsonProperty("broadcast_id") Long broadcastId,
        @JsonProperty("agent") String agent,
        @JsonProperty("server") String server,
        @JsonProperty("payload") Map<String, Object> payload) {
}
