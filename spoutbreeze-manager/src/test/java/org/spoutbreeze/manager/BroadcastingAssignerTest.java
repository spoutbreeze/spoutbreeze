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
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.manager.services.AgentQueuePublisher;
import org.spoutbreeze.manager.services.AgentsService;
import org.spoutbreeze.manager.services.BroadcastingAssigner;

import java.util.Optional;

import static org.mockito.ArgumentMatchers.any;
import static org.mockito.ArgumentMatchers.anyLong;
import static org.mockito.ArgumentMatchers.eq;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.verifyNoInteractions;
import static org.mockito.Mockito.when;

class BroadcastingAssignerTest {
    private final BroadcastJdbcRepository broadcasts = mock(BroadcastJdbcRepository.class);
    private final AgentsService agentsService = mock(AgentsService.class);
    private final AgentQueuePublisher publisher = mock(AgentQueuePublisher.class);
    private final BroadcastingAssigner assigner = new BroadcastingAssigner(broadcasts, agentsService, publisher);

    private Agent agent(long id) {
        Agent agent = new Agent();
        agent.id = id;
        agent.name = "host";
        return agent;
    }

    @Test
    void assignsClaimedReadyBroadcastToEnabledAgent() {
        Broadcast broadcast = new Broadcast();
        broadcast.id = 3L;
        when(broadcasts.claimNextReadyBroadcast(5L)).thenReturn(Optional.of(broadcast));
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.of(agent(5L)));
        when(publisher.publishMessage(any(), any())).thenReturn(true);

        assigner.assignReadyBroadcasts();

        verify(broadcasts).claimNextReadyBroadcast(5L);
        verify(publisher).publishMessage(any(), any());
        verify(broadcasts, never()).claimBroadcast(anyLong(), anyLong());
    }

    @Test
    void doesNothingWithoutReadyBroadcast() {
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.of(agent(5L)));
        when(broadcasts.claimNextReadyBroadcast(5L)).thenReturn(Optional.empty());

        assigner.assignReadyBroadcasts();

        verifyNoInteractions(publisher);
    }

    @Test
    void doesNothingWithoutAgent() {
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.empty());

        assigner.assignReadyBroadcasts();

        verifyNoInteractions(publisher);
        verify(broadcasts, never()).claimNextReadyBroadcast(anyLong());
    }

    @Test
    void returnsBroadcastToReadyWhenPublishFails() {
        Broadcast broadcast = new Broadcast();
        broadcast.id = 3L;
        when(broadcasts.claimNextReadyBroadcast(5L)).thenReturn(Optional.of(broadcast));
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.of(agent(5L)));
        when(publisher.publishMessage(any(), any())).thenReturn(false);

        assigner.assignReadyBroadcasts();

        verify(broadcasts).updateStatus(3L, BroadcastStatus.READY);
    }

    @Test
    void scheduledRunSurvivesRepositoryFailure() {
        when(agentsService.firstEnabledAgent()).thenReturn(Optional.of(agent(5L)));
        when(broadcasts.claimNextReadyBroadcast(5L)).thenThrow(new RuntimeException("db down"));

        assigner.scheduleAssignments();
    }
}
