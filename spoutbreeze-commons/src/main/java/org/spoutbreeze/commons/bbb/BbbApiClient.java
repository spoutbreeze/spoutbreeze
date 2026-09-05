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

import java.io.IOException;
import java.net.URI;
import java.net.URLEncoder;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.net.URISyntaxException;
import java.nio.charset.StandardCharsets;
import java.time.Duration;
import java.util.Map;
import java.util.TreeMap;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * BigBlueButton API client: signed query strings, call helpers and response
 * envelope checks for the calls SpoutBreeze uses.
 */
public class BbbApiClient {
    private static final Pattern RETURN_CODE = Pattern.compile("<returncode>(\\w+)</returncode>");
    private static final Pattern MESSAGE_KEY = Pattern.compile("<messageKey>(\\w+)</messageKey>");
    public static final String BOT_FULL_NAME = "SpoutBreeze";

    private final String apiUrl;
    private final String secret;
    private final String checksumAlgo;
    private final HttpTransport transport;

    public BbbApiClient(String serverUrl, String secret, String checksumAlgo) {
        this(serverUrl, secret, checksumAlgo, new JdkHttpTransport());
    }

    public BbbApiClient(String serverUrl, String secret, String checksumAlgo, HttpTransport transport) {
        this.apiUrl = serverUrl.endsWith("/") ? serverUrl.substring(0, serverUrl.length() - 1) : serverUrl;
        this.secret = secret;
        this.checksumAlgo = checksumAlgo;
        this.transport = transport;
    }

    public String call(String action, Map<String, String> params) throws IOException, InterruptedException {
        TreeMap<String, String> sorted = new TreeMap<>(params == null ? Map.of() : params);
        StringBuilder query = new StringBuilder();
        for (Map.Entry<String, String> entry : sorted.entrySet()) {
            if (!query.isEmpty()) {
                query.append('&');
            }
            query.append(urlEncode(entry.getKey())).append('=').append(urlEncode(entry.getValue()));
        }

        String checksumInput = action + query;
        String checksum = BbbChecksum.compute(checksumAlgo, checksumInput, secret);

        StringBuilder url = new StringBuilder(apiUrl).append('/').append(action);
        if (!query.isEmpty()) {
            url.append('?').append(query);
        }
        url.append(query.isEmpty() ? '?' : '&').append("checksum=").append(checksum);

        return transport.get(url.toString());
    }

    public boolean isSuccessful(String xml) {
        Matcher matcher = RETURN_CODE.matcher(xml);
        return matcher.find() && "SUCCESS".equals(matcher.group(1));
    }

    public String messageKey(String xml) {
        Matcher matcher = MESSAGE_KEY.matcher(xml);
        return matcher.find() ? matcher.group(1) : "";
    }

    public String getMeetings() throws IOException, InterruptedException {
        return call("getMeetings", Map.of());
    }

    public String createMeeting(String meetingId, String name, String attendeePw, String moderatorPw,
                                Map<String, String> extraParams) throws IOException, InterruptedException {
        Map<String, String> params = new TreeMap<>(Map.of(
                "meetingID", meetingId,
                "name", name,
                "attendeePW", attendeePw,
                "moderatorPW", moderatorPw));
        params.putAll(extraParams == null ? Map.of() : extraParams);
        return call("create", params);
    }

    public String joinUrl(String meetingId, String password, Map<String, String> extraParams) {
        TreeMap<String, String> sorted = new TreeMap<>(extraParams == null ? Map.of() : extraParams);
        sorted.put("meetingID", meetingId);
        sorted.put("password", password);

        StringBuilder query = new StringBuilder();
        for (Map.Entry<String, String> entry : sorted.entrySet()) {
            if (!query.isEmpty()) {
                query.append('&');
            }
            query.append(urlEncode(entry.getKey())).append('=').append(urlEncode(entry.getValue()));
        }

        String checksum = BbbChecksum.compute(checksumAlgo, "join" + query, secret);
        return apiUrl + "/join?" + query + "&checksum=" + checksum;
    }

    public String endMeeting(String meetingId, String password) throws IOException, InterruptedException {
        return call("end", Map.of("meetingID", meetingId, "password", password));
    }

    public String sendChatMessage(String meetingId, String message) throws IOException, InterruptedException {
        return call("sendChatMessage", Map.of("meetingID", meetingId, "message", message));
    }

    public String getMeetingInfo(String meetingId) throws IOException, InterruptedException {
        return call("getMeetingInfo", Map.of("meetingID", meetingId));
    }

    public String createHook(String callbackUrl, String eventId) throws IOException, InterruptedException {
        Map<String, String> params = new TreeMap<>();
        params.put("callbackURL", callbackUrl);
        if (eventId != null && !eventId.isBlank()) {
            params.put("eventID", eventId);
        }
        return call("hooks/create", params);
    }

    public String xmlValue(String xml, String tag) {
        Matcher matcher = Pattern.compile("<" + Pattern.quote(tag) + ">([^<]*)</" + Pattern.quote(tag) + ">").matcher(xml);
        return matcher.find() ? matcher.group(1) : "";
    }

    public Map<String, String> botJoinParams() {
        Map<String, String> params = new TreeMap<>();
        params.put("fullName", BOT_FULL_NAME);
        params.put("role", "VIEWER");
        params.put("bot", "true");
        params.put("userdata-bbb_auto_join_audio", "true");
        params.put("userdata-bbb_listen_only_mode", "true");
        params.put("userdata-bbb_skip_check_audio", "true");
        params.put("userdata-bbb_hide_controls", "true");
        params.put("userdata-bbb_hide_notifications", "true");
        return params;
    }

    public String botJoinUrl(String meetingId, String attendeePassword) {
        return joinUrl(meetingId, attendeePassword, botJoinParams());
    }

    private static String urlEncode(String value) {
        return URLEncoder.encode(value, StandardCharsets.UTF_8);
    }

    static final class JdkHttpTransport implements HttpTransport {
        private final HttpClient client = HttpClient.newBuilder()
                .connectTimeout(Duration.ofSeconds(10))
                .build();

        @Override
        public String get(String url) throws IOException, InterruptedException {
            HttpRequest request;
            try {
                request = HttpRequest.newBuilder(URI.create(url)).GET().build();
            } catch (IllegalArgumentException e) {
                throw new IOException(e);
            }
            HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() >= 400) {
                throw new IOException("BigBlueButton answered HTTP " + response.statusCode());
            }
            return response.body();
        }
    }
}
