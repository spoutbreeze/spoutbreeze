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
import org.spoutbreeze.commons.contracts.StartSession;
import org.spoutbreeze.commons.contracts.StopSession;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.db.InsertInfo;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.manager.services.AgentQueuePublisher;
import org.spoutbreeze.manager.services.AgentsService;
import org.spoutbreeze.manager.services.BbbJoinService;
import org.spoutbreeze.manager.services.QueueProcessor;

import java.util.Optional;

import static org.assertj.core.api.Assertions.assertThat;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.ArgumentMatchers.anyLong;
import static org.mockito.ArgumentMatchers.anyString;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

class QueueProcessorTest {
    private final AgentsService agentsService = mock(AgentsService.class);
    private final AgentQueuePublisher publisher = mock(AgentQueuePublisher.class);
    private final BroadcastJdbcRepository broadcasts = mock(BroadcastJdbcRepository.class);
    private final BbbJoinService joinService = mock(BbbJoinService.class);
    private final QueueProcessor processor = new QueueProcessor(agentsService, publisher, broadcasts, joinService);

    private Agent enabledAgent() {
        Agent agent = new Agent();
        agent.id = 5L;
        agent.name = "local";
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.of(agent));
        return agent;
    }

    @Test
    void publishesValidMessageToFirstEnabledAgent() {
        enabledAgent();

        processor.handle("{\"id\":7,\"status\":\"READY\"}");

        verify(publisher).publishMessage(any(), any());
    }

    @Test
    void ignoresInvalidPayload() {
        processor.handle("not json");

        verify(publisher, never()).publishMessage(any(), any());
    }

    @Test
    void ignoresPayloadWithoutAgent() {
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.empty());

        processor.handle("{\"id\":7}");

        verify(publisher, never()).publishMessage(any(), any());
        verify(agentsService).firstEnabledAgent();
    }

    @Test
    void routesV1StartWithJoinUrlToTheAgent() {
        Agent agent = enabledAgent();
        Broadcast broadcast = new Broadcast();
        broadcast.id = 7L;
        when(broadcasts.findById(7L)).thenReturn(Optional.of(broadcast));
        when(broadcasts.claimBroadcast(7L, 5L)).thenReturn(1);
        when(publisher.publishStartSession(any(StartSession.class), any(Agent.class))).thenReturn(true);

        processor.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\",\"profile\":\"720p30\"}");

        verify(broadcasts).claimBroadcast(7L, 5L);
        verify(publisher).publishStartSession(any(StartSession.class), any(Agent.class));
        verify(joinService, never()).botJoinUrl(any(), any(), any());
        assertThat(agent.id).isEqualTo(5L);
    }

    @Test
    void skipsAStartAlreadyClaimedByAnotherConsumer() {
        enabledAgent();
        Broadcast broadcast = new Broadcast();
        broadcast.id = 7L;
        when(broadcasts.findById(7L)).thenReturn(Optional.of(broadcast));
        when(broadcasts.claimBroadcast(7L, 5L)).thenReturn(0);

        processor.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        verify(publisher, never()).publishStartSession(any(), any());
    }

    @Test
    void returnsBroadcastToReadyWhenStartPublishFails() {
        enabledAgent();
        Broadcast broadcast = new Broadcast();
        broadcast.id = 7L;
        when(broadcasts.findById(7L)).thenReturn(Optional.of(broadcast));
        when(broadcasts.claimBroadcast(7L, 5L)).thenReturn(1);
        when(publisher.publishStartSession(any(StartSession.class), any(Agent.class))).thenReturn(false);

        processor.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        verify(broadcasts).updateStatus(7L, BroadcastStatus.READY);
    }

    @Test
    void buildsAJoinUrlWhenTheRequestHasAMeeting() {
        Agent agent = enabledAgent();
        when(joinService.botJoinUrl(3L, "m-1", "m-1")).thenReturn("https://bbb/join?bot=true");
        when(broadcasts.findById(0L)).thenReturn(Optional.empty());
        when(broadcasts.findByMeetingId("m-1")).thenReturn(Optional.empty());
        Broadcast inserted = new Broadcast();
        inserted.id = 11L;
        when(broadcasts.insert(any(Broadcast.class))).thenReturn(11L);
        when(broadcasts.findById(11L)).thenReturn(Optional.of(inserted));
        when(broadcasts.claimBroadcast(11L, agent.id)).thenReturn(1);
        when(publisher.publishStartSession(any(StartSession.class), any(Agent.class))).thenReturn(true);

        processor.handle("{\"v\":1,\"broadcast_id\":0,\"meeting_id\":\"m-1\",\"server_id\":3,\"targets_ref\":\"tok\"}");

        verify(joinService).botJoinUrl(3L, "m-1", "m-1");
        verify(publisher).publishStartSession(any(StartSession.class), any(Agent.class));
    }

    @Test
    void routesStopToTheAssignedAgent() {
        Agent agent = new Agent();
        agent.id = 5L;
        Broadcast broadcast = new Broadcast();
        broadcast.id = 7L;
        broadcast.agent_id = 5L;
        when(broadcasts.findById(7L)).thenReturn(Optional.of(broadcast));
        when(agentsService.getAgent(5L)).thenReturn(Optional.of(agent));

        when(publisher.publishStopSession(any(StopSession.class), any(Agent.class))).thenReturn(true);

        processor.handle("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}");

        verify(publisher).publishStopSession(any(StopSession.class), any(Agent.class));
        verify(broadcasts).updateStatus(7L, BroadcastStatus.ENDED);
        verify(broadcasts).releaseAgent(7L);
        verify(publisher, never()).publishStartSession(any(), any());
    }

    @Test
    void stopWithoutAnAgentIsANoOp() {
        when(broadcasts.findById(7L)).thenReturn(Optional.empty());
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.empty());

        processor.handle("{\"v\":1,\"broadcast_id\":7,\"reason\":\"operator\"}");

        verify(publisher, never()).publishStopSession(any(), any());
        verify(broadcasts, never()).updateStatus(anyLong(), any());
    }

    @Test
    void startWithoutAnAgentIsANoOp() {
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.empty());

        processor.handle("{\"v\":1,\"broadcast_id\":7,\"join_url\":\"https://bbb/join\",\"targets_ref\":\"tok\"}");

        verify(publisher, never()).publishStartSession(any(), any());
    }

    private static InsertInfo insertedId(int id) {
        InsertInfo info = new InsertInfo();
        info.lastId = id;
        return info;
    }
}
