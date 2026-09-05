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
package org.spoutbreeze.manager.services;

import io.micronaut.context.annotation.Value;
import jakarta.inject.Singleton;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.bbb.BbbApiClient;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Server;
import org.spoutbreeze.manager.bbb.BbbClientFactory;

import java.io.IOException;
import java.util.Map;
import java.util.TreeMap;
import java.util.UUID;

/**
 * Turns a servers-registry row plus a meeting id into a signed bot join URL
 * against BigBlueButton 4.0 ({@code bot=true}, plugin manifests, webhooks).
 */
@Singleton
public class BbbJoinService {
    private static final Logger logger = LoggerFactory.getLogger(BbbJoinService.class);
    private static final String HOOK_EVENTS = "meeting-created,meeting-ended,user-joined,user-left";

    private final ServerJdbcRepository servers;
    private final BbbClientFactory clients;
    private final String checksumAlgo;
    private final String pluginManifestUrl;
    private final String callbackBase;
    private final String defaultApiUrl;
    private final String defaultFqdn;

    public BbbJoinService(ServerJdbcRepository servers, BbbClientFactory clients,
                          @Value("${spoutbreeze.bbb.checksum-algo:sha1}") String checksumAlgo,
                          @Value("${spoutbreeze.plugin.manifest-url:}") String pluginManifestUrl,
                          @Value("${spoutbreeze.bbb.callback-base:}") String callbackBase,
                          @Value("${spoutbreeze.bbb.api-url:}") String defaultApiUrl,
                          @Value("${spoutbreeze.bbb.fqdn:}") String defaultFqdn) {
        this.servers = servers;
        this.clients = clients;
        this.checksumAlgo = checksumAlgo;
        this.pluginManifestUrl = pluginManifestUrl;
        this.callbackBase = callbackBase;
        this.defaultApiUrl = defaultApiUrl;
        this.defaultFqdn = defaultFqdn;
    }

    public String botJoinUrl(Long serverId, String meetingId, String meetingName) {
        Server server = resolveServer(serverId);
        BbbApiClient client = clients.create(apiUrlFor(server), server.sharedSecret, checksumAlgo);
        String attendeePassword = randomPassword();
        String moderatorPassword = randomPassword();
        String displayName = (meetingName == null || meetingName.isBlank()) ? meetingId : meetingName;

        try {
            String xml = client.createMeeting(meetingId, displayName, attendeePassword, moderatorPassword,
                    createExtras(server));
            if (!client.isSuccessful(xml)) {
                throw new IllegalStateException("BigBlueButton create failed: " + client.messageKey(xml));
            }
            String attendee = client.xmlValue(xml, "attendeePW");
            if (attendee.isBlank()) {
                attendee = attendeePassword;
            }
            registerHook(client, server);
            return client.botJoinUrl(meetingId, attendee);
        } catch (InterruptedException e) {
            Thread.currentThread().interrupt();
            throw new IllegalStateException("Cannot talk to BigBlueButton at " + server.fqdn, e);
        } catch (IOException e) {
            throw new IllegalStateException("Cannot talk to BigBlueButton at " + server.fqdn, e);
        }
    }

    public Server resolveServer(Long serverId) {
        if (serverId != null) {
            return servers.findById(serverId).orElseThrow(() ->
                    new IllegalStateException("Unknown BigBlueButton server " + serverId));
        }
        if (defaultFqdn != null && !defaultFqdn.isBlank()) {
            return servers.findByName(defaultFqdn).orElseThrow(() ->
                    new IllegalStateException("No BigBlueButton server registered for " + defaultFqdn));
        }
        return servers.findAll().stream().findFirst().orElseThrow(() ->
                new IllegalStateException("No BigBlueButton server is registered"));
    }

    public String apiUrlFor(Server server) {
        if (defaultApiUrl != null && !defaultApiUrl.isBlank()
                && defaultFqdn != null && defaultFqdn.equals(server.fqdn)) {
            return defaultApiUrl;
        }
        return "https://" + server.fqdn + "/bigbluebutton/api";
    }

    Map<String, String> createExtras(Server server) {
        Map<String, String> extras = new TreeMap<>();
        extras.put("webcamsOnlyForModerator", "true");
        extras.put("record", "true");
        if (pluginManifestUrl != null && !pluginManifestUrl.isBlank()) {
            extras.put("pluginManifests", "[{\"url\":\"" + pluginManifestUrl + "\"}]");
        }
        if (callbackBase != null && !callbackBase.isBlank()) {
            String ended = callbackBase.replaceAll("/$", "") + "/hooks/bbb/" + server.fqdn;
            extras.put("meetingEndedURL", ended);
            extras.put("meta_endCallbackUrl", ended);
        }
        return extras;
    }

    void registerHook(BbbApiClient client, Server server) {
        if (callbackBase == null || callbackBase.isBlank()) {
            logger.info("Skipping webhook registration; spoutbreeze.bbb.callback-base is empty");
            return;
        }
        String callbackUrl = callbackBase.replaceAll("/$", "") + "/hooks/bbb/" + server.fqdn;
        try {
            String xml = client.createHook(callbackUrl, HOOK_EVENTS);
            logger.info("Registered bbb-webhooks for {} → {} ({})", server.fqdn, callbackUrl,
                    client.isSuccessful(xml) ? "ok" : client.messageKey(xml));
        } catch (InterruptedException e) {
            Thread.currentThread().interrupt();
            logger.warn("Cannot register bbb-webhooks for {}: {}", server.fqdn, e.getMessage());
        } catch (IOException e) {
            logger.warn("Cannot register bbb-webhooks for {}: {}", server.fqdn, e.getMessage());
        }
    }

    private static String randomPassword() {
        return UUID.randomUUID().toString().replace("-", "").substring(0, 12);
    }
}
