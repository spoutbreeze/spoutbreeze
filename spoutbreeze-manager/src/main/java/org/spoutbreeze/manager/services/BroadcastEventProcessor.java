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

import jakarta.inject.Singleton;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.contracts.BroadcastEvent;
import org.spoutbreeze.commons.contracts.BroadcastStopRequested;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.util.QueueMessageUtils;

import java.util.Optional;

@Singleton
public class BroadcastEventProcessor {
    private static final Logger logger = LoggerFactory.getLogger(BroadcastEventProcessor.class);

    private final BroadcastJdbcRepository broadcasts;
    private final QueueProcessor queueProcessor;

    public BroadcastEventProcessor(BroadcastJdbcRepository broadcasts, QueueProcessor queueProcessor) {
        this.broadcasts = broadcasts;
        this.queueProcessor = queueProcessor;
    }

    public void handle(String body) {
        BroadcastEvent event = QueueMessageUtils.getBroadcastEvent(body);
        if (event == null || !"bbb.meeting_ended".equals(event.type())) {
            return;
        }

        String meetingId = meetingIdFrom(event);
        if (meetingId == null || meetingId.isBlank()) {
            logger.info("Meeting-ended event had no meeting id");
            return;
        }

        Optional<Broadcast> live = broadcasts.findLiveByMeetingId(meetingId);
        if (live.isEmpty()) {
            live = broadcasts.findByMeetingId(meetingId)
                    .filter(broadcast -> broadcast.status == BroadcastStatus.ASSIGNED
                            || broadcast.status == BroadcastStatus.READY);
        }
        if (live.isEmpty()) {
            logger.info("No live broadcast for ended meeting {}", meetingId);
            return;
        }

        logger.info("Stopping broadcast {} because meeting {} ended", live.get().id, meetingId);
        queueProcessor.handleStop(new BroadcastStopRequested(1, live.get().id, "meeting-ended"));
    }

    static String meetingIdFrom(BroadcastEvent event) {
        if (event.payload() == null) {
            return null;
        }
        Object value = event.payload().get("meeting_id");
        return value == null ? null : String.valueOf(value);
    }
}
