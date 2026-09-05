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

import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.time.Duration;
import java.util.ArrayList;
import java.util.List;

/**
 * Facebook Live comments through the Graph API: polls the live video's
 * comments edge and returns only messages newer than the newest one already
 * seen. The live video id is discovered from the broadcast's destination so
 * the gateway follows whatever stream is currently live.
 */
public class FacebookCommentsClient {
    public record Comment(String id, String user, String text) {}

    private static final Logger logger = LoggerFactory.getLogger(FacebookCommentsClient.class);
    private static final String GRAPH = "https://graph.facebook.com/v23.0";
    private static final ObjectMapper MAPPER = new ObjectMapper();

    private final HttpClient http = HttpClient.newBuilder().connectTimeout(Duration.ofSeconds(10)).build();
    private final String token;
    private String lastSeenId;

    public FacebookCommentsClient(String token) {
        this.token = token;
    }

    /**
     * Fetches the comments newer than the last seen one, advancing the
     * cursor. An API error returns an empty list — the caller retries.
     */
    public List<Comment> newComments(String liveVideoId) {
        List<Comment> fresh = new ArrayList<>();
        try {
            String url = GRAPH + "/" + liveVideoId + "/comments"
                    + "?fields=id,from{name},message&order=reverse_chronological&limit=25"
                    + "&access_token=" + token;
            HttpRequest request = HttpRequest.newBuilder(URI.create(url)).GET().build();
            HttpResponse<String> response = http.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() >= 300) {
                logger.warn("Facebook comments API answered HTTP {}", response.statusCode());
                return fresh;
            }
            JsonNode data = MAPPER.readTree(response.body()).path("data");
            CursorResult result = parseComments(data, lastSeenId);
            lastSeenId = result.newCursor();
            return result.fresh();
        } catch (InterruptedException e) {
            Thread.currentThread().interrupt();
        } catch (Exception e) {
            logger.warn("Cannot poll Facebook comments: {}", e.getMessage());
        }
        return fresh;
    }

    void seedCursor(String commentId) {
        this.lastSeenId = commentId;
    }

    public record CursorResult(List<Comment> fresh, String newCursor) {}

    /**
     * Pure parser: takes a comments array (newest first) and the last seen
     * id, returns the unseen comments in chronological order plus the new
     * cursor. A null cursor means "first poll": skip the backlog.
     */
    public static CursorResult parseComments(JsonNode data, String lastSeenId) {
        List<Comment> page = new ArrayList<>();
        if (data == null || !data.isArray()) {
            return new CursorResult(page, lastSeenId);
        }
        for (JsonNode node : data) {
            String id = node.path("id").asText("");
            if (id.isEmpty() || id.equals(lastSeenId)) {
                break;
            }
            page.add(new Comment(
                    id,
                    node.path("from").path("name").asText("viewer"),
                    node.path("message").asText("")));
        }
        if (page.isEmpty()) {
            return new CursorResult(page, lastSeenId);
        }
        if (lastSeenId == null) {
            return new CursorResult(new ArrayList<>(), page.get(0).id());
        }
        List<Comment> fresh = new ArrayList<>(page);
        java.util.Collections.reverse(fresh);
        return new CursorResult(fresh, page.get(0).id());
    }
}
