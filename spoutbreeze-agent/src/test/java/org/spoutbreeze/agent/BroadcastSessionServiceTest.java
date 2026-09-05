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
package org.spoutbreeze.agent;

import io.micronaut.http.HttpRequest;
import io.micronaut.http.client.BlockingHttpClient;
import io.micronaut.http.client.HttpClient;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.ArgumentCaptor;
import org.mockito.InOrder;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.remote.SessionId;
import org.spoutbreeze.agent.services.BroadcastSessionService;
import org.spoutbreeze.agent.services.MeetingJoiner;
import org.spoutbreeze.agent.services.SessionKeepAlive;
import org.spoutbreeze.agent.video.VideoBroadcaster;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;

import java.util.Optional;

import static org.assertj.core.api.Assertions.assertThat;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.ArgumentMatchers.anyLong;
import static org.mockito.ArgumentMatchers.anyString;
import static org.mockito.Mockito.inOrder;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

class BroadcastSessionServiceTest {
    private final VideoBroadcaster broadcaster = mock(VideoBroadcaster.class);
    private final BroadcastJdbcRepository broadcasts = mock(BroadcastJdbcRepository.class);
    private final SessionKeepAlive keepAlive = mock(SessionKeepAlive.class);
    private final MeetingJoiner joiner = mock(MeetingJoiner.class);
    private final HttpClient httpClient = mock(HttpClient.class);
    private final BlockingHttpClient blocking = mock(BlockingHttpClient.class);
    private final BroadcastSessionService service =
            new BroadcastSessionService(broadcaster, broadcasts, keepAlive, joiner, httpClient, "key");

    private RemoteWebDriver driver(String id) {
        RemoteWebDriver driver = mock(RemoteWebDriver.class);
        when(driver.getSessionId()).thenReturn(new SessionId(id));
        return driver;
    }

    @BeforeEach
    void wire() {
        when(httpClient.toBlocking()).thenReturn(blocking);
    }

    @Test
    void joinsListenOnlyThenMarksTheStreamerJobReady() {
        RemoteWebDriver sessionDriver = driver("session-1");
        when(broadcaster.broacast("tok", "https://bbb/join")).thenReturn(sessionDriver);
        when(blocking.retrieve(any(HttpRequest.class))).thenReturn("{\"ok\":true}");

        service.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\",\"profile\":\"1080p30\"}");

        InOrder order = inOrder(joiner, broadcasts, blocking);
        order.verify(joiner).joinListenOnly(sessionDriver);
        order.verify(broadcasts).updateSessionId(7L, "session-1");
        order.verify(broadcasts).updateStatus(7L, BroadcastStatus.LIVE);
        ArgumentCaptor<HttpRequest<?>> captor = ArgumentCaptor.forClass(HttpRequest.class);
        verify(blocking).retrieve(captor.capture());
        assertThat(captor.getValue().getPath()).isEqualTo("/api/v1/agent/jobs/tok/ready");
        assertThat(captor.getValue().getHeaders().get("Authorization")).isEqualTo("Bearer key");
    }

    @Test
    void journeyFailureFailsTheBroadcastAndQuitsTheSession() {
        RemoteWebDriver live = driver("session-1");
        doThrowJourney(live);
        when(broadcaster.broacast("tok", "https://bbb/join")).thenReturn(live);

        service.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        verify(keepAlive).release("session-1");
        verify(broadcasts).updateStatus(7L, BroadcastStatus.FAILED);
        verify(broadcasts).releaseAgent(7L);
        verify(blocking, never()).retrieve(any(HttpRequest.class));
    }

    private void doThrowJourney(RemoteWebDriver driver) {
        org.mockito.Mockito.doThrow(new RuntimeException("dialog never closed"))
                .when(joiner).joinListenOnly(driver);
    }

    @Test
    void ignoresRedeliveredStartForARunningBroadcast() {
        RemoteWebDriver sessionDriver = driver("session-1");
        when(broadcaster.broacast("tok", "https://bbb/join")).thenReturn(sessionDriver);

        String start = "{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}";
        service.handle(start);
        service.handle(start);

        verify(broadcaster).broacast("tok", "https://bbb/join");
    }

    @Test
    void stopsARunningSession() {
        RemoteWebDriver sessionDriver = driver("session-1");
        when(broadcaster.broacast("tok", "https://bbb/join")).thenReturn(sessionDriver);
        service.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        service.handle("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}");

        verify(keepAlive).release("session-1");
        verify(broadcasts).updateStatus(7L, BroadcastStatus.ENDED);
        verify(broadcasts).releaseAgent(7L);
    }

    @Test
    void stopLooksUpSessionIdWhenTheProcessHasForgottenTheSession() {
        Broadcast broadcast = new Broadcast();
        broadcast.session_id = "session-9";
        when(broadcasts.findById(4L)).thenReturn(Optional.of(broadcast));

        service.handle("{\"v\":1,\"broadcast_id\":4,\"reason\":\"meeting-ended\"}");

        verify(keepAlive).release("session-9");
        verify(broadcasts).updateStatus(4L, BroadcastStatus.ENDED);
    }

    @Test
    void survivesApiFailureWhenMarkingReady() {
        RemoteWebDriver sessionDriver = driver("session-1");
        when(broadcaster.broacast("tok", "https://bbb/join")).thenReturn(sessionDriver);
        when(blocking.retrieve(any(HttpRequest.class))).thenThrow(new RuntimeException("api down"));

        service.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        verify(broadcasts).updateStatus(7L, BroadcastStatus.LIVE);
    }

    @Test
    void ignoresInvalidPayload() {
        service.handle("not json");

        verify(broadcaster, never()).broacast(any(), any());
        verify(broadcasts, never()).updateStatus(anyLong(), any());
    }

    @Test
    void ignoresUnknownLegacyBroadcast() {
        when(broadcasts.findById(7L)).thenReturn(Optional.empty());

        service.handle("{\"id\":7}");

        verify(broadcaster, never()).broacast(any(), any());
        verify(broadcasts, never()).updateSessionId(anyLong(), anyString());
    }
}
