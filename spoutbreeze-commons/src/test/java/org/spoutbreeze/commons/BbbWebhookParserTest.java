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
import org.spoutbreeze.commons.bbb.BbbWebhookParser;

import static org.assertj.core.api.Assertions.assertThat;

class BbbWebhookParserTest {
    @Test
    void detectsMeetingEndedFromDocumentedPayload() {
        String body = "{\"data\":{\"id\":\"meeting-ended\",\"attributes\":{\"meeting\":{\"external-meeting-id\":\"m-1\"}}}}";

        assertThat(BbbWebhookParser.isMeetingEnded(body)).isTrue();
        assertThat(BbbWebhookParser.externalMeetingId(body)).isEqualTo("m-1");
    }

    @Test
    void detectsMeetingEndedFromEventArray() {
        String body = "{\"event\":[{\"data\":{\"id\":\"meeting-ended\",\"attributes\":{\"meeting\":{\"external-meeting-id\":\"m-2\"}}}}]}";

        assertThat(BbbWebhookParser.isMeetingEnded(body)).isTrue();
        assertThat(BbbWebhookParser.externalMeetingId(body)).isEqualTo("m-2");
    }

    @Test
    void detectsMeetingEndedEvtMsgSubstring() {
        assertThat(BbbWebhookParser.isMeetingEnded("{\"envelope\":{\"name\":\"MeetingEndedEvtMsg\"}}")).isTrue();
        assertThat(BbbWebhookParser.isMeetingEnded("{\"data\":{\"id\":\"user-joined\"}}")).isFalse();
        assertThat(BbbWebhookParser.isMeetingEnded("")).isFalse();
        assertThat(BbbWebhookParser.isMeetingEnded(null)).isFalse();
    }

    @Test
    void readsMeetingIdFromFallbackFields() {
        assertThat(BbbWebhookParser.externalMeetingId("{\"payload\":{\"meeting_id\":\"m-3\"}}")).isEqualTo("m-3");
        assertThat(BbbWebhookParser.externalMeetingId("not json")).isEmpty();
        assertThat(BbbWebhookParser.externalMeetingId("")).isEmpty();
    }
}
