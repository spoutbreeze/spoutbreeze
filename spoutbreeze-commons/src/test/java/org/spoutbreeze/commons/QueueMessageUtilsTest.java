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
package org.spoutbreeze.commons;

import org.junit.jupiter.api.Test;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.spoutbreeze.commons.util.QueueMessageUtils;

import java.nio.charset.StandardCharsets;

import static org.assertj.core.api.Assertions.assertThat;

class QueueMessageUtilsTest {
    @Test
    void parsesMessageFromBody() {
        BroadcastMessage message = QueueMessageUtils.getBroadcastMessage(
                "{\"id\":7,\"session_id\":\"s1\",\"server_id\":\"1\",\"endpoint_id\":\"2\",\"meeting_id\":\"m1\",\"agent_id\":\"3\",\"status\":\"READY\"}");

        assertThat(message).isNotNull();
        assertThat(message.getId()).isEqualTo(7L);
        assertThat(message.getSessionId()).isEqualTo("s1");
        assertThat(message.getServerId()).isEqualTo("1");
        assertThat(message.getEndpointId()).isEqualTo("2");
        assertThat(message.getMeetingId()).isEqualTo("m1");
        assertThat(message.getAgentId()).isEqualTo("3");
        assertThat(message.getStatus()).isEqualTo("READY");
    }

    @Test
    void parsesMessageFromBytes() {
        BroadcastMessage message = QueueMessageUtils.getBroadcastMessage(
                "{\"id\":7}".getBytes(StandardCharsets.UTF_8));

        assertThat(message.getId()).isEqualTo(7L);
    }

    @Test
    void returnsNullForInvalidPayload() {
        assertThat(QueueMessageUtils.getBroadcastMessage("not json")).isNull();
        assertThat(QueueMessageUtils.getBroadcastMessage("not json".getBytes(StandardCharsets.UTF_8))).isNull();
    }

    @Test
    void serialisesRoundTrip() {
        BroadcastMessage message = new BroadcastMessage();
        message.setId(9L);
        message.setSessionId("session");
        message.setServerId("1");
        message.setEndpointId("2");
        message.setMeetingId("meeting");
        message.setAgentId("4");
        message.setCreatedOn("2026-09-05");
        message.setUpdatedOn("2026-09-05");
        message.setStatus("ASSIGNED");
        message.setUserId("user");

        BroadcastMessage parsed = QueueMessageUtils.getBroadcastMessage(QueueMessageUtils.toMessageBody(message));

        assertThat(parsed.getId()).isEqualTo(9L);
        assertThat(parsed.getSessionId()).isEqualTo("session");
        assertThat(parsed.getServerId()).isEqualTo("1");
        assertThat(parsed.getEndpointId()).isEqualTo("2");
        assertThat(parsed.getMeetingId()).isEqualTo("meeting");
        assertThat(parsed.getAgentId()).isEqualTo("4");
        assertThat(parsed.getCreatedOn()).isEqualTo("2026-09-05");
        assertThat(parsed.getUpdatedOn()).isEqualTo("2026-09-05");
        assertThat(parsed.getStatus()).isEqualTo("ASSIGNED");
        assertThat(parsed.getUserId()).isNull();
    }
}
