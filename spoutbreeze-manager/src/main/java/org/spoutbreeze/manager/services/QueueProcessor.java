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
import org.spoutbreeze.commons.contracts.BroadcastRequested;
import org.spoutbreeze.commons.contracts.BroadcastStopRequested;
import org.spoutbreeze.commons.contracts.StartSession;
import org.spoutbreeze.commons.contracts.StopSession;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Agent;
import org.spoutbreeze.commons.entities.Broadcast;
import org.spoutbreeze.commons.entities.BroadcastMessage;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.util.QueueMessageUtils;

import java.time.ZonedDateTime;
import java.util.Optional;

@Singleton
public class QueueProcessor {
    private static final Logger logger = LoggerFactory.getLogger(QueueProcessor.class);

    private final AgentsService agentsService;
    private final AgentQueuePublisher agentQueuePublisher;
    private final BroadcastJdbcRepository broadcasts;
    private final BbbJoinService joinService;

    public QueueProcessor(AgentsService agentsService, AgentQueuePublisher agentQueuePublisher,
                          BroadcastJdbcRepository broadcasts, BbbJoinService joinService) {
        this.agentsService = agentsService;
        this.agentQueuePublisher = agentQueuePublisher;
        this.broadcasts = broadcasts;
        this.joinService = joinService;
    }

    public void handle(String body) {
        BroadcastStopRequested stop = QueueMessageUtils.getBroadcastStopRequested(body);
        if (stop != null) {
            handleStop(stop);
            return;
        }

        BroadcastRequested request = QueueMessageUtils.getBroadcastRequested(body);
        if (request != null) {
            handleRequest(request);
            return;
        }

        BroadcastMessage legacy = QueueMessageUtils.getBroadcastMessage(body);
        if (legacy == null) {
            return;
        }

        Optional<Agent> agent = agentsService.firstEnabledAgent();
        if (agent.isEmpty()) {
            logger.error("No enabled agent available for broadcast {}", legacy.getId());
            return;
        }

        agentQueuePublisher.publishMessage(legacy, agent.get());
    }

    void handleRequest(BroadcastRequested request) {
        Optional<Agent> agent = agentsService.firstEnabledAgent();
        if (agent.isEmpty()) {
            logger.error("No enabled agent available for broadcast {}", request.broadcastId());
            return;
        }

        String joinUrl = request.joinUrl();
        if (joinUrl == null || joinUrl.isBlank()) {
            joinUrl = joinService.botJoinUrl(request.serverId(), request.meetingId(), request.meetingId());
        }

        Broadcast broadcast = persistAssignment(request, agent.get());
        if (broadcast == null) {
            // Another consumer (the scheduled assigner) claimed the row
            // first and will drive it; publishing here would start a second
            // capture session for the same broadcast.
            logger.info("Broadcast for meeting {} was already claimed; skipping", request.meetingId());
            return;
        }

        if (!agentQueuePublisher.publishStartSession(
                new StartSession(1, broadcast.id, joinUrl, request.targetsRef(), request.profile()),
                agent.get())) {
            broadcasts.updateStatus(broadcast.id, BroadcastStatus.READY);
        }
    }

    public void handleStop(BroadcastStopRequested stop) {
        Optional<Agent> agent = agentFor(stop.broadcastId());
        if (agent.isEmpty()) {
            logger.error("No agent available to stop broadcast {}", stop.broadcastId());
            return;
        }

        // Tell the agent first: only a delivered StopSession may flip the
        // state, otherwise a failed publish would leave a live stream shown
        // as ENDED.
        if (!agentQueuePublisher.publishStopSession(
                new StopSession(1, stop.broadcastId(), stop.reason()), agent.get())) {
            logger.error("Stop for broadcast {} could not be delivered; state left unchanged", stop.broadcastId());
            return;
        }

        broadcasts.updateStatus(stop.broadcastId(), BroadcastStatus.ENDED);
        broadcasts.releaseAgent(stop.broadcastId());
    }

    Broadcast persistAssignment(BroadcastRequested request, Agent agent) {
        Optional<Broadcast> existing = request.broadcastId() > 0
                ? broadcasts.findById(request.broadcastId())
                : Optional.empty();
        if (existing.isEmpty() && request.meetingId() != null) {
            existing = broadcasts.findByMeetingId(request.meetingId());
        }

        if (existing.isEmpty()) {
            existing = insertBroadcast(request);
        }
        if (existing.isEmpty()) {
            return null;
        }

        // Conditional claim: wins only if the row is still READY, so the
        // scheduled assigner and this consumer cannot both place it.
        if (broadcasts.claimBroadcast(existing.get().id, agent.id) != 1) {
            return null;
        }
        Broadcast broadcast = existing.get();
        broadcast.agent_id = agent.id;
        broadcast.status = BroadcastStatus.ASSIGNED;
        return broadcast;
    }

    Optional<Broadcast> insertBroadcast(BroadcastRequested request) {
        Broadcast broadcast = new Broadcast();
        broadcast.server_id = request.serverId() == null ? 1L : request.serverId();
        broadcast.endpoint_id = 1L;
        broadcast.meeting_id = request.meetingId();
        broadcast.session_id = "none";
        broadcast.status = BroadcastStatus.READY;
        broadcast.createdOn = ZonedDateTime.now();
        try {
            long id = broadcasts.insert(broadcast);
            return broadcasts.findById(id);
        } catch (org.spoutbreeze.commons.db.JdbcRepository.DataAccessException e) {
            // A unique meeting_id conflict means the Web Facade already
            // inserted the row for this meeting; re-read it and continue.
            logger.info("Broadcast row for meeting {} already exists", request.meetingId());
            return request.meetingId() == null ? Optional.empty() : broadcasts.findByMeetingId(request.meetingId());
        }
    }

    Optional<Agent> agentFor(long broadcastId) {
        Optional<Broadcast> broadcast = broadcasts.findById(broadcastId);
        if (broadcast.isPresent() && broadcast.get().agent_id != null) {
            Optional<Agent> assigned = agentsService.getAgent(broadcast.get().agent_id);
            if (assigned.isPresent()) {
                return assigned;
            }
        }
        return agentsService.firstEnabledAgent();
    }
}
