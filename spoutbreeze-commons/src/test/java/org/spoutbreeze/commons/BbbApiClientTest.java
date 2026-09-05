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
import org.spoutbreeze.commons.bbb.BbbApiClient;
import org.spoutbreeze.commons.bbb.HttpTransport;

import java.io.IOException;
import java.util.LinkedHashMap;
import java.util.Map;

import static org.assertj.core.api.Assertions.assertThat;

class BbbApiClientTest {
    private final StringBuilder requestedUrl = new StringBuilder();
    private final HttpTransport recording = url -> {
        requestedUrl.setLength(0);
        requestedUrl.append(url);
        return "<response><returncode>SUCCESS</returncode></response>";
    };

    private final BbbApiClient client =
            new BbbApiClient("https://bbb.example.com/bigbluebutton/", "secret", "sha256", recording);

    @Test
    void signsCallsWithSortedParamsAndChecksum() throws Exception {
        String xml = client.call("getMeetings", Map.of());

        assertThat(xml).contains("SUCCESS");
        assertThat(requestedUrl.toString())
                .startsWith("https://bbb.example.com/bigbluebutton/getMeetings?checksum=");
        assertThat(requestedUrl.toString()).doesNotContain("//bigbluebutton//");
    }

    @Test
    void sortsParametersBeforeSigning() throws Exception {
        Map<String, String> params = new LinkedHashMap<>();
        params.put("b", "2");
        params.put("a", "1");

        client.call("create", params);

        int checksumIndex = requestedUrl.indexOf("checksum=");
        String query = requestedUrl.substring(requestedUrl.indexOf("?") + 1, checksumIndex);
        assertThat(query).startsWith("a=1&b=2");
    }

    @Test
    void urlEncodesValues() throws Exception {
        client.call("create", Map.of("name", "Réunion & démo"));

        assertThat(requestedUrl.toString()).contains("name=R%C3%A9union+%26+d%C3%A9mo");
    }

    @Test
    void readsReturnCodeAndMessageKey() {
        String xml = "<response><returncode>FAILED</returncode><messageKey>notFound</messageKey></response>";

        assertThat(client.isSuccessful(xml)).isFalse();
        assertThat(client.messageKey(xml)).isEqualTo("notFound");
        assertThat(client.messageKey("<response/>")).isEmpty();
    }

    @Test
    void buildsSignedJoinUrl() {
        String url = client.joinUrl("meeting-1", "pw", Map.of("role", "VIEWER"));

        assertThat(url)
                .startsWith("https://bbb.example.com/bigbluebutton/join?")
                .contains("meetingID=meeting-1")
                .contains("password=pw")
                .contains("role=VIEWER")
                .endsWith("&checksum=" + expectedChecksum());
    }

    private String expectedChecksum() {
        return org.spoutbreeze.commons.bbb.BbbChecksum.compute("sha256",
                "joinmeetingID=meeting-1&password=pw&role=VIEWER", "secret");
    }

    @Test
    void wrapsConvenienceCalls() throws Exception {
        client.getMeetings();
        assertThat(requestedUrl.toString()).contains("/getMeetings?checksum=");

        client.endMeeting("meeting-1", "pw");
        assertThat(requestedUrl.toString()).contains("meetingID=meeting-1");

        client.sendChatMessage("meeting-1", "hello");
        assertThat(requestedUrl.toString()).contains("sendChatMessage");

        client.getMeetingInfo("meeting-1");
        assertThat(requestedUrl.toString()).contains("/getMeetingInfo?");

        client.createHook("https://spb.example.com/hooks/bbb/demo", "meeting-ended");
        assertThat(requestedUrl.toString()).contains("/hooks/create?").contains("callbackURL=");
    }

    @Test
    void readsXmlTagsAndBuildsABotJoinUrl() {
        String xml = "<response><returncode>SUCCESS</returncode><attendeePW>ap</attendeePW></response>";

        assertThat(client.xmlValue(xml, "attendeePW")).isEqualTo("ap");
        assertThat(client.xmlValue("<response/>", "attendeePW")).isEmpty();
        assertThat(client.botJoinUrl("meeting-1", "ap"))
                .contains("bot=true")
                .contains("role=VIEWER")
                .contains("fullName=SpoutBreeze");
        assertThat(client.botJoinParams()).containsEntry("bot", "true");
    }
}
