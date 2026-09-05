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

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.ArgumentCaptor;
import org.spoutbreeze.commons.bbb.BbbApiClient;
import org.spoutbreeze.commons.contracts.BroadcastEvent;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.data.server.ServerJdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.entities.Server;
import org.spoutbreeze.commons.util.QueueMessageUtils;
import org.spoutbreeze.interactor.bbb.BbbEventPublisher;
import org.spoutbreeze.interactor.chat.ChatRelayService;

import java.util.Optional;
import java.util.concurrent.atomic.AtomicLong;

import static org.assertj.core.api.Assertions.assertThat;
import static org.assertj.core.api.Assertions.assertThatCode;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.ArgumentMatchers.anyString;
import static org.mockito.ArgumentMatchers.eq;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.times;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.verifyNoInteractions;
import static org.mockito.Mockito.when;

class ChatRelayServiceTest {
    private final BroadcastJdbcRepository broadcasts = mock(BroadcastJdbcRepository.class);
    private final ServerJdbcRepository servers = mock(ServerJdbcRepository.class);
    private final BbbEventPublisher eventPublisher = mock(BbbEventPublisher.class);
    private final BbbApiClient apiClient = mock(BbbApiClient.class);
    private final AtomicLong clockValue = new AtomicLong(1_000_000);

    private ChatRelayService service;

    @BeforeEach
    void setUp() {
        service = new ChatRelayService(broadcasts, servers, eventPublisher, "sha1", 2_000);
        service.setClock(clockValue::get);
    }

    private ChatRelayService spyingService() {
        ChatRelayService spy = org.mockito.Mockito.spy(service);
        // doReturn: the when(spy.method()) form would execute the real
        // createClient and crash on its null argument.
        org.mockito.Mockito.doReturn(apiClient).when(spy).createClient(any(Server.class));
        return spy;
    }

    private void liveBroadcastExists() {
        Broadcast broadcast = new Broadcast();
        broadcast.id = 7L;
        broadcast.meeting_id = "meeting-1";
        broadcast.server_id = 3L;
        when(broadcasts.findLatestLive()).thenReturn(Optional.of(broadcast));
        Server server = new Server();
        server.id = 3L;
        server.fqdn = "bbb.example.com";
        server.sharedSecret = "secret";
        when(servers.findById(3L)).thenReturn(Optional.of(server));
    }

    @Test
    void relaysChatIntoTheLiveMeetingWithPlatformPrefix() throws Exception {
        liveBroadcastExists();
        ChatRelayService spy = spyingService();

        spy.relay("Twitch", "viewer", "hello meeting");

        verify(apiClient).sendChatMessage("meeting-1", "[Twitch] viewer: hello meeting");
        verify(eventPublisher).publish(eq("bbb.example.com"), anyString());
    }

    @Test
    void rateLimitsFlooding() throws Exception {
        liveBroadcastExists();
        ChatRelayService spy = spyingService();

        spy.relay("Twitch", "viewer", "first");
        spy.relay("Twitch", "viewer", "too fast");

        verify(apiClient, times(1)).sendChatMessage(anyString(), anyString());
    }

    @Test
    void doesNothingWithoutLiveBroadcast() {
        when(broadcasts.findLatestLive()).thenReturn(Optional.empty());

        service.relay("Twitch", "viewer", "hello");

        verifyNoInteractions(eventPublisher);
    }

    @Test
    void ignoresBlankMessages() {
        service.relay("Twitch", "viewer", "   ");

        verifyNoInteractions(broadcasts, eventPublisher);
    }

    @Test
    void survivesSendFailures() throws Exception {
        liveBroadcastExists();
        ChatRelayService spy = spyingService();
        when(apiClient.sendChatMessage(anyString(), anyString()))
                .thenThrow(new java.io.IOException("bbb down"));

        assertThatCode(() -> spy.relay("Twitch", "viewer", "hello")).doesNotThrowAnyException();
    }

    @Test
    void publishesChatInboundEvent() throws Exception {
        liveBroadcastExists();
        ChatRelayService spy = spyingService();
        ArgumentCaptor<String> body = ArgumentCaptor.forClass(String.class);

        spy.relay("Twitch", "viewer", "event test");

        verify(eventPublisher).publish(anyString(), body.capture());
        BroadcastEvent event = QueueMessageUtils.getBroadcastEvent(body.getValue());
        assertThat(event).isNotNull();
        assertThat(event.type()).isEqualTo("chat.inbound");
        assertThat(event.payload())
                .containsEntry("platform", "Twitch")
                .containsEntry("user", "viewer")
                .containsEntry("text", "event test");
    }
}
