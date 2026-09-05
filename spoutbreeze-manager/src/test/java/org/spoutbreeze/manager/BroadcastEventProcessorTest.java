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
import org.spoutbreeze.commons.contracts.BroadcastStopRequested;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.manager.queue.EventsQueueListener;
import org.spoutbreeze.manager.services.BroadcastEventProcessor;
import org.spoutbreeze.manager.services.QueueProcessor;

import java.util.Optional;

import static org.mockito.ArgumentMatchers.any;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.when;

class BroadcastEventProcessorTest {
    private final BroadcastJdbcRepository broadcasts = mock(BroadcastJdbcRepository.class);
    private final QueueProcessor queueProcessor = mock(QueueProcessor.class);
    private final BroadcastEventProcessor processor = new BroadcastEventProcessor(broadcasts, queueProcessor);

    @Test
    void stopsTheLiveBroadcastWhenTheMeetingEnds() {
        Broadcast live = new Broadcast();
        live.id = 7L;
        live.status = BroadcastStatus.LIVE;
        when(broadcasts.findLiveByMeetingId("m-1")).thenReturn(Optional.of(live));

        processor.handle("{\"v\":1,\"type\":\"bbb.meeting_ended\",\"timestamp\":\"2026-09-05T08:00:00Z\",\"payload\":{\"meeting_id\":\"m-1\"}}");

        verify(queueProcessor).handleStop(any(BroadcastStopRequested.class));
    }

    @Test
    void stopsAnAssignedBroadcastWhenTheMeetingEndsBeforeGoingLive() {
        Broadcast assigned = new Broadcast();
        assigned.id = 8L;
        assigned.status = BroadcastStatus.ASSIGNED;
        when(broadcasts.findLiveByMeetingId("m-2")).thenReturn(Optional.empty());
        when(broadcasts.findByMeetingId("m-2")).thenReturn(Optional.of(assigned));

        processor.handle("{\"v\":1,\"type\":\"bbb.meeting_ended\",\"timestamp\":\"2026-09-05T08:00:00Z\",\"payload\":{\"meeting_id\":\"m-2\"}}");

        verify(queueProcessor).handleStop(any(BroadcastStopRequested.class));
    }

    @Test
    void ignoresOtherEventsAndUnknownMeetings() {
        when(broadcasts.findLiveByMeetingId("m-1")).thenReturn(Optional.empty());
        when(broadcasts.findByMeetingId("m-1")).thenReturn(Optional.empty());

        processor.handle("{\"v\":1,\"type\":\"bbb.user_joined\",\"timestamp\":\"2026-09-05T08:00:00Z\"}");
        processor.handle("{\"v\":1,\"type\":\"bbb.meeting_ended\",\"timestamp\":\"2026-09-05T08:00:00Z\",\"payload\":{\"meeting_id\":\"m-1\"}}");
        processor.handle("not json");

        verify(queueProcessor, never()).handleStop(any());
    }

    @Test
    void forwardsBodiesFromTheEventsListener() {
        EventsQueueListener listener = new EventsQueueListener(processor);
        listener.receive("{\"v\":1,\"type\":\"bbb.user_joined\",\"timestamp\":\"2026-09-05T08:00:00Z\"}");

        verify(queueProcessor, never()).handleStop(any());
    }
}
