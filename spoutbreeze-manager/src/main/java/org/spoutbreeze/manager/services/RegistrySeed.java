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
import io.micronaut.context.event.StartupEvent;
import io.micronaut.runtime.event.annotation.EventListener;
import jakarta.inject.Singleton;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.data.endpoint.EndpointJdbcRepository;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Endpoint;
import org.spoutbreeze.commons.entities.Server;

import java.time.ZonedDateTime;

/**
 * Ensures the demo BBB server and a local RTMP sink endpoint exist so a
 * first broadcast can be placed without a console round-trip.
 */
@Singleton
public class RegistrySeed {
    private static final Logger logger = LoggerFactory.getLogger(RegistrySeed.class);

    private final ServerJdbcRepository servers;
    private final EndpointJdbcRepository endpoints;
    private final String fqdn;
    private final String secret;
    private final String sinkUrl;

    public RegistrySeed(ServerJdbcRepository servers, EndpointJdbcRepository endpoints,
                        @Value("${spoutbreeze.bbb.fqdn:}") String fqdn,
                        @Value("${spoutbreeze.bbb.shared-secret:}") String secret,
                        @Value("${spoutbreeze.sink.url:rtmp://mediamtx:1935/live/spoutbreeze}") String sinkUrl) {
        this.servers = servers;
        this.endpoints = endpoints;
        this.fqdn = fqdn;
        this.secret = secret;
        this.sinkUrl = sinkUrl;
    }

    @EventListener
    void onStartup(StartupEvent event) {
        seed();
    }

    public void seed() {
        seedServer();
        seedSink();
    }

    void seedServer() {
        if (fqdn == null || fqdn.isBlank() || secret == null || secret.isBlank()) {
            return;
        }
        if (servers.findByName(fqdn).isPresent()) {
            return;
        }
        Server server = new Server();
        server.fqdn = fqdn;
        server.ipAddress = "192.0.2.40";
        server.sharedSecret = secret;
        server.createdOn = ZonedDateTime.now();
        servers.insert(server);
        logger.info("Registered BigBlueButton server {}", fqdn);
    }

    void seedSink() {
        if (endpoints.findByName("dev-sink").isPresent()) {
            return;
        }
        Endpoint endpoint = new Endpoint();
        endpoint.name = "dev-sink";
        endpoint.url = sinkUrl;
        endpoint.createdOn = ZonedDateTime.now();
        endpoints.insert(endpoint);
    }
}
