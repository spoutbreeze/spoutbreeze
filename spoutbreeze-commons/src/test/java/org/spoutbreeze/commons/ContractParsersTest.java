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
import org.spoutbreeze.commons.contracts.BroadcastRequested;
import org.spoutbreeze.commons.contracts.StartSession;
import org.spoutbreeze.commons.util.QueueMessageUtils;

import static org.assertj.core.api.Assertions.assertThat;

class ContractParsersTest {
    @Test
    void parsesBroadcastRequested() {
        BroadcastRequested request = QueueMessageUtils.getBroadcastRequested(
                "{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\",\"profile\":\"720p30\"}");

        assertThat(request).isNotNull();
        assertThat(request.broadcastId()).isEqualTo(7L);
        assertThat(request.joinUrl()).isEqualTo("https://bbb/join");
        assertThat(request.targetsRef()).isEqualTo("tok");
        assertThat(request.profile()).isEqualTo("720p30");
    }

    @Test
    void parsesBroadcastRequestedWithMeetingAndServer() {
        BroadcastRequested request = QueueMessageUtils.getBroadcastRequested(
                "{\"v\":1,\"broadcast_id\":7,\"meeting_id\":\"m-1\",\"server_id\":3,\"targets_ref\":\"tok\"}");

        assertThat(request).isNotNull();
        assertThat(request.meetingId()).isEqualTo("m-1");
        assertThat(request.serverId()).isEqualTo(3L);
        assertThat(request.joinUrl()).isNull();
    }

    @Test
    void defaultsProfileAndRejectsForeignVersions() {
        assertThat(QueueMessageUtils.getBroadcastRequested("{\"v\":1,\"broadcast_id\":7,\"targets_ref\":\"tok\"}").profile()).isEqualTo("1080p30");
        assertThat(QueueMessageUtils.getBroadcastRequested("{\"v\":2,\"broadcast_id\":7}")).isNull();
        assertThat(QueueMessageUtils.getBroadcastRequested("not json")).isNull();
        assertThat(QueueMessageUtils.getBroadcastRequested("{\"v\":1,\"broadcast_id\":7}")).isNull();
    }

    @Test
    void serialisesRecordsWithContractFieldNames() throws Exception {
        byte[] body = QueueMessageUtils.toMessageBody((Object) new org.spoutbreeze.commons.contracts.StartSession(
                1, 7, "https://bbb/join", "tok", "1080p30"));
        String json = new String(body, java.nio.charset.StandardCharsets.UTF_8);

        assertThat(json).contains("\"broadcast_id\"").contains("\"join_url\"").contains("\"targets_ref\"");
        assertThat(QueueMessageUtils.getStartSession(json).joinUrl()).isEqualTo("https://bbb/join");
    }

    @Test
    void parsesStartSession() {
        StartSession session = QueueMessageUtils.getStartSession(
                "{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        assertThat(session).isNotNull();
        assertThat(session.broadcastId()).isEqualTo(7L);
        assertThat(session.joinUrl()).isEqualTo("https://bbb/join");
        assertThat(QueueMessageUtils.getStartSession("not json")).isNull();
        assertThat(QueueMessageUtils.getStartSession("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}")).isNull();
    }

    @Test
    void parsesStopSessionAndBroadcastStopRequested() {
        assertThat(QueueMessageUtils.getStopSession("{\"v\":1,\"broadcast_id\":7,\"reason\":\"meeting-ended\"}"))
                .isNotNull()
                .extracting("broadcastId", "reason")
                .containsExactly(7L, "meeting-ended");
        assertThat(QueueMessageUtils.getBroadcastStopRequested("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}"))
                .isNotNull()
                .extracting("broadcastId", "reason")
                .containsExactly(7L, "operator");
        assertThat(QueueMessageUtils.getBroadcastRequested("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}")).isNull();
        assertThat(QueueMessageUtils.getStartSession("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}")).isNull();
    }

    @Test
    void parsesBroadcastEvent() {
        org.spoutbreeze.commons.contracts.BroadcastEvent event = QueueMessageUtils.getBroadcastEvent(
                "{\"v\":1,\"type\":\"bbb.meeting_ended\",\"timestamp\":\"2026-09-05T08:00:00Z\",\"payload\":{\"meeting_id\":\"m-1\"}}");

        assertThat(event).isNotNull();
        assertThat(event.type()).isEqualTo("bbb.meeting_ended");
        assertThat(event.payload()).containsEntry("meeting_id", "m-1");
        assertThat(QueueMessageUtils.getBroadcastEvent("{\"v\":1}")).isNull();
    }
}
