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
package org.spoutbreeze.manager;

import org.junit.jupiter.api.Test;
import org.spoutbreeze.commons.data.endpoint.EndpointJdbcRepository;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Endpoint;
import org.spoutbreeze.commons.entities.Server;
import org.spoutbreeze.manager.services.RegistrySeed;

import java.util.Optional;

import static org.mockito.ArgumentMatchers.any;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

class RegistrySeedTest {
    private final ServerJdbcRepository servers = mock(ServerJdbcRepository.class);
    private final EndpointJdbcRepository endpoints = mock(EndpointJdbcRepository.class);

    @Test
    void insertsTheDemoServerAndSinkOnce() {
        when(servers.findByName("bbb.example.com")).thenReturn(Optional.empty());
        when(endpoints.findByName("dev-sink")).thenReturn(Optional.empty());

        new RegistrySeed(servers, endpoints, "bbb.example.com", "secret", "rtmp://mediamtx:1935/live/spoutbreeze")
                .seed();

        verify(servers).insert(any(Server.class));
        verify(endpoints).insert(any(Endpoint.class));
    }

    @Test
    void skipsWhenTheServerAlreadyExists() {
        Server existing = new Server();
        existing.fqdn = "bbb.example.com";
        when(servers.findByName("bbb.example.com")).thenReturn(Optional.of(existing));
        when(endpoints.findByName("dev-sink")).thenReturn(Optional.of(new Endpoint()));

        new RegistrySeed(servers, endpoints, "bbb.example.com", "secret", "rtmp://x").seed();

        verify(servers, never()).insert(any());
        verify(endpoints, never()).insert(any());
    }

    @Test
    void skipsTheServerWhenTheSecretIsMissing() {
        when(endpoints.findByName("dev-sink")).thenReturn(Optional.of(new Endpoint()));

        new RegistrySeed(servers, endpoints, "bbb.example.com", "", "rtmp://x").seed();

        verify(servers, never()).insert(any());
    }
}
