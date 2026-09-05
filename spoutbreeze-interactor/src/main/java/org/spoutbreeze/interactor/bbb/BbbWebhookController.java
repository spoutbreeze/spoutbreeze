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
package org.spoutbreeze.interactor.bbb;

import io.micronaut.context.annotation.Value;
import io.micronaut.http.HttpResponse;
import io.micronaut.http.annotation.Body;
import io.micronaut.http.annotation.Controller;
import io.micronaut.http.annotation.PathVariable;
import io.micronaut.http.annotation.Post;
import io.micronaut.http.annotation.QueryValue;
import jakarta.inject.Singleton;
import org.spoutbreeze.commons.bbb.BbbWebhookParser;
import org.spoutbreeze.commons.contracts.BroadcastEvent;

import java.time.Instant;
import java.util.HashMap;
import java.util.Map;

@Singleton
@Controller("/hooks/bbb")
public class BbbWebhookController {
    private final BbbEventPublisher publisher;
    private final String callbackBase;
    private final String secret;
    private final String checksumAlgo;

    public BbbWebhookController(BbbEventPublisher publisher,
                                @Value("${spoutbreeze.bbb.callback-base}") String callbackBase,
                                @Value("${spoutbreeze.bbb.secret}") String secret,
                                @Value("${spoutbreeze.bbb.checksum-algo}") String checksumAlgo) {
        this.publisher = publisher;
        this.callbackBase = callbackBase;
        this.secret = secret;
        this.checksumAlgo = checksumAlgo;
    }

    @Post(uri = "/{server}")
    public HttpResponse<String> receive(@PathVariable String server, @Body String body,
                                 @QueryValue String checksum) {
        String callbackUrl = callbackBase + "/hooks/bbb/" + server;
        if (!BbbChecksumVerifier.verify(checksumAlgo, callbackUrl, body, secret, checksum)) {
            return HttpResponse.unauthorized();
        }

        publisher.publishEvent(toEvent(server, body));
        return HttpResponse.ok("ok");
    }

    static BroadcastEvent toEvent(String server, String body) {
        Map<String, Object> payload = new HashMap<>();
        payload.put("raw", body);
        String meetingId = BbbWebhookParser.externalMeetingId(body);
        if (!meetingId.isEmpty()) {
            payload.put("meeting_id", meetingId);
        }
        String type = BbbWebhookParser.contractType(body);
        return new BroadcastEvent(1, type, Instant.now().toString(), null, null, server, payload);
    }
}
