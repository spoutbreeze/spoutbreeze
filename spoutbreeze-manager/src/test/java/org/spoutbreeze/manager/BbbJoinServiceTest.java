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
import org.spoutbreeze.commons.bbb.BbbApiClient;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Server;
import org.spoutbreeze.manager.bbb.BbbClientFactory;
import org.spoutbreeze.manager.services.BbbJoinService;

import java.util.List;
import java.util.Optional;

import static org.assertj.core.api.Assertions.assertThat;
import static org.assertj.core.api.Assertions.assertThatThrownBy;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.ArgumentMatchers.anyMap;
import static org.mockito.ArgumentMatchers.anyString;
import static org.mockito.ArgumentMatchers.eq;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

class BbbJoinServiceTest {
    private final ServerJdbcRepository servers = mock(ServerJdbcRepository.class);
    private final BbbApiClient client = mock(BbbApiClient.class);
    private final BbbClientFactory factory = (apiUrl, secret, algo) -> client;
    private final BbbJoinService service = new BbbJoinService(
            servers, factory, "sha1",
            "https://console/plugins/bigbluebutton/0.2.0/manifest.json",
            "https://spb.example.com",
            "https://bbb.example.com/bigbluebutton/api",
            "bbb.example.com");

    private Server demoServer() {
        Server server = new Server();
        server.id = 1L;
        server.fqdn = "bbb.example.com";
        server.sharedSecret = "secret";
        return server;
    }

    @Test
    void createsTheMeetingAndReturnsABotJoinUrl() throws Exception {
        when(servers.findById(1L)).thenReturn(Optional.of(demoServer()));
        when(client.createMeeting(eq("m-1"), eq("m-1"), anyString(), anyString(), anyMap()))
                .thenReturn("<response><returncode>SUCCESS</returncode><attendeePW>ap</attendeePW></response>");
        when(client.isSuccessful(anyString())).thenReturn(true);
        when(client.xmlValue(anyString(), eq("attendeePW"))).thenReturn("ap");
        when(client.botJoinUrl("m-1", "ap")).thenReturn("https://bbb/join?bot=true");
        when(client.createHook(anyString(), anyString()))
                .thenReturn("<response><returncode>SUCCESS</returncode></response>");

        String url = service.botJoinUrl(1L, "m-1", "m-1");

        assertThat(url).contains("bot=true");
        verify(client).createHook("https://spb.example.com/hooks/bbb/bbb.example.com",
                "meeting-created,meeting-ended,user-joined,user-left");
        verify(client).createMeeting(eq("m-1"), eq("m-1"), anyString(), anyString(), anyMap());
    }

    @Test
    void rejectsAFailedCreate() throws Exception {
        when(servers.findById(1L)).thenReturn(Optional.of(demoServer()));
        when(client.createMeeting(anyString(), anyString(), anyString(), anyString(), anyMap()))
                .thenReturn("<response><returncode>FAILED</returncode><messageKey>checksumError</messageKey></response>");
        when(client.isSuccessful(anyString())).thenReturn(false);
        when(client.messageKey(anyString())).thenReturn("checksumError");

        assertThatThrownBy(() -> service.botJoinUrl(1L, "m-1", "m-1"))
                .isInstanceOf(IllegalStateException.class)
                .hasMessageContaining("checksumError");
    }

    @Test
    void usesTheConfiguredApiUrlForTheDemoFqdn() {
        assertThat(service.apiUrlFor(demoServer())).isEqualTo("https://bbb.example.com/bigbluebutton/api");
        Server other = new Server();
        other.fqdn = "other.example";
        assertThat(service.apiUrlFor(other)).isEqualTo("https://other.example/bigbluebutton/api");
    }

    @Test
    void fallsBackToTheFirstRegisteredServer() {
        when(servers.findAll()).thenReturn(List.of(demoServer()));
        BbbJoinService unconfigured = new BbbJoinService(servers, factory, "sha1", "", "", "", "");

        assertThat(unconfigured.resolveServer(null).fqdn).isEqualTo("bbb.example.com");
    }

    @Test
    void unknownServerIdIsRejected() {
        when(servers.findById(9L)).thenReturn(Optional.empty());

        assertThatThrownBy(() -> service.resolveServer(9L)).isInstanceOf(IllegalStateException.class);
    }

    @Test
    void skipsWebhookRegistrationWhenTheCallbackBaseIsEmpty() throws Exception {
        BbbJoinService local = new BbbJoinService(servers, factory, "sha1", "", "", "", "bbb.example.com");
        when(servers.findById(1L)).thenReturn(Optional.of(demoServer()));
        when(client.createMeeting(anyString(), anyString(), anyString(), anyString(), anyMap()))
                .thenReturn("<response><returncode>SUCCESS</returncode><attendeePW>ap</attendeePW></response>");
        when(client.isSuccessful(anyString())).thenReturn(true);
        when(client.xmlValue(anyString(), eq("attendeePW"))).thenReturn("ap");
        when(client.botJoinUrl("m-1", "ap")).thenReturn("https://bbb/join?bot=true");

        assertThat(local.botJoinUrl(1L, "m-1", "m-1")).contains("bot=true");
        verify(client, org.mockito.Mockito.never()).createHook(anyString(), anyString());
    }
}
