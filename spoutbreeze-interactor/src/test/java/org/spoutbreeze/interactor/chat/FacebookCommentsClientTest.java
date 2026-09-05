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

import com.fasterxml.jackson.databind.ObjectMapper;
import org.junit.jupiter.api.Test;
import org.spoutbreeze.interactor.chat.FacebookCommentsClient.CursorResult;

import java.util.List;

import static org.assertj.core.api.Assertions.assertThat;

class FacebookCommentsClientTest {
    private static final ObjectMapper MAPPER = new ObjectMapper();

    private static com.fasterxml.jackson.databind.JsonNode json(String body) throws Exception {
        return MAPPER.readTree(body).path("data");
    }

    @Test
    void firstPollSkipsTheBacklogAndSetsTheCursor() throws Exception {
        var data = json("{\"data\":[{\"id\":\"c3\",\"from\":{\"name\":\"Bob\"},\"message\":\"newest\"},"
                + "{\"id\":\"c2\",\"from\":{\"name\":\"Ann\"},\"message\":\"mid\"}]}");

        CursorResult result = FacebookCommentsClient.parseComments(data, null);

        assertThat(result.fresh()).isEmpty();
        assertThat(result.newCursor()).isEqualTo("c3");
    }

    @Test
    void returnsOnlyNewCommentsInChronologicalOrder() throws Exception {
        var data = json("{\"data\":[{\"id\":\"c4\",\"from\":{\"name\":\"Bob\"},\"message\":\"newer\"},"
                + "{\"id\":\"c3\",\"from\":{\"name\":\"Ann\"},\"message\":\"seen\"}]}");

        CursorResult result = FacebookCommentsClient.parseComments(data, "c3");

        assertThat(result.fresh()).hasSize(1);
        assertThat(result.fresh().get(0).id()).isEqualTo("c4");
        assertThat(result.fresh().get(0).user()).isEqualTo("Bob");
        assertThat(result.newCursor()).isEqualTo("c4");
    }

    @Test
    void stopsAtTheCursorWhenOlderCommentsRemain() throws Exception {
        var data = json("{\"data\":[{\"id\":\"c5\",\"from\":{\"name\":\"Zoe\"},\"message\":\"n\"},"
                + "{\"id\":\"c4\",\"from\":{\"name\":\"Bob\"},\"message\":\"already\"},"
                + "{\"id\":\"c3\",\"from\":{\"name\":\"Ann\"},\"message\":\"old\"}]}");

        CursorResult result = FacebookCommentsClient.parseComments(data, "c4");

        assertThat(result.fresh()).extracting(FacebookCommentsClient.Comment::id).containsExactly("c5");
    }

    @Test
    void emptyOrMissingDataKeepsTheCursor() throws Exception {
        assertThat(FacebookCommentsClient.parseComments(null, "c1").fresh()).isEmpty();
        assertThat(FacebookCommentsClient.parseComments(json("{\"data\":[]}"), "c1").fresh()).isEmpty();
        assertThat(FacebookCommentsClient.parseComments(json("{}"), "c1").newCursor()).isEqualTo("c1");
    }
}
