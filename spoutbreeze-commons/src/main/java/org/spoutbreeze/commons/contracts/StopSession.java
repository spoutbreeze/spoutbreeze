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

import com.fasterxml.jackson.annotation.JsonProperty;

/**
 * StopSession v1 — the Capture Manager tells an agent to tear down a capture
 * session (spoutbreeze-commons/contracts/stop-session.schema.json).
 */
public record StopSession(
        @JsonProperty("v") int v,
        @JsonProperty("broadcast_id") long broadcastId,
        @JsonProperty("reason") String reason) {
}
