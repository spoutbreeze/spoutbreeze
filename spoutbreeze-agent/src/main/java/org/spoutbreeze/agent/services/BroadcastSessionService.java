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
package org.spoutbreeze.agent.services;

import io.micronaut.context.annotation.Value;
import io.micronaut.http.HttpRequest;
import io.micronaut.http.client.HttpClient;
import io.micronaut.http.client.annotation.Client;
import jakarta.inject.Singleton;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.agent.video.VideoBroadcaster;
import org.spoutbreeze.commons.contracts.StartSession;
import org.spoutbreeze.commons.contracts.StopSession;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.enums.BroadcastStatus;
import org.spoutbreeze.commons.util.QueueMessageUtils;

import java.util.Map;
import java.util.concurrent.ConcurrentHashMap;

@Singleton
public class BroadcastSessionService {
    private static final Logger logger = LoggerFactory.getLogger(BroadcastSessionService.class);

    private final VideoBroadcaster videoBroadcaster;
    private final BroadcastJdbcRepository broadcastRepository;
    private final SessionKeepAlive keepAlive;
    private final HttpClient apiClient;
    private final String apiKey;
    private final MeetingJoiner meetingJoiner;
    private final Map<Long, String> sessionsByBroadcast = new ConcurrentHashMap<>();

    public BroadcastSessionService(VideoBroadcaster videoBroadcaster, BroadcastJdbcRepository broadcastRepository,
                                   SessionKeepAlive keepAlive, MeetingJoiner meetingJoiner,
                                   @Client(id = "spoutbreeze-api") HttpClient apiClient,
                                   @Value("${spoutbreeze.api.key}") String apiKey) {
        this.videoBroadcaster = videoBroadcaster;
        this.broadcastRepository = broadcastRepository;
        this.keepAlive = keepAlive;
        this.meetingJoiner = meetingJoiner;
        this.apiClient = apiClient;
        this.apiKey = apiKey;
    }

    public void handle(String body) {
        StopSession stop = QueueMessageUtils.getStopSession(body);
        if (stop != null) {
            stopSession(stop);
            return;
        }

        StartSession session = QueueMessageUtils.getStartSession(body);
        if (session != null) {
            startSession(session);
            return;
        }

        org.spoutbreeze.commons.entities.BroadcastMessage legacy = QueueMessageUtils.getBroadcastMessage(body);
        if (legacy == null) {
            return;
        }
        startLegacy(legacy);
    }

    void startSession(StartSession session) {
        if (sessionsByBroadcast.containsKey(session.broadcastId())) {
            logger.info("Broadcast {} is already running; ignoring a redelivered StartSession", session.broadcastId());
            return;
        }

        org.openqa.selenium.remote.RemoteWebDriver driver;
        try {
            driver = videoBroadcaster.broacast(session.targetsRef(), session.joinUrl());
        } catch (RuntimeException e) {
            // Without a session there will never be a stream: record the
            // failure instead of leaving the broadcast assigned forever.
            logger.error("Cannot start the capture session for broadcast {}", session.broadcastId(), e);
            broadcastRepository.updateStatus(session.broadcastId(), BroadcastStatus.FAILED);
            broadcastRepository.releaseAgent(session.broadcastId());
            return;
        }
        String sessionId = driver.getSessionId().toString();

        // The stream must only start once the bot actually sits in the
        // meeting audio: join listen-only (kiosk fullscreen) first.
        try {
            meetingJoiner.joinListenOnly(driver);
        } catch (RuntimeException e) {
            logger.error("The listen-only journey failed for broadcast {}", session.broadcastId(), e);
            keepAlive.release(sessionId);
            sessionsByBroadcast.remove(session.broadcastId());
            broadcastRepository.updateStatus(session.broadcastId(), BroadcastStatus.FAILED);
            broadcastRepository.releaseAgent(session.broadcastId());
            return;
        }

        sessionsByBroadcast.put(session.broadcastId(), sessionId);
        broadcastRepository.updateSessionId(session.broadcastId(), sessionId);
        broadcastRepository.updateStatus(session.broadcastId(), BroadcastStatus.LIVE);
        markJobReady(session.targetsRef());
        logger.info("Broadcast {} live with session {} (listen-only joined)", session.broadcastId(), sessionId);
    }

    void stopSession(StopSession stop) {
        String sessionId = sessionsByBroadcast.remove(stop.broadcastId());
        if (sessionId == null) {
            sessionId = broadcastRepository.findById(stop.broadcastId())
                    .map(broadcast -> broadcast.session_id)
                    .orElse(null);
        }
        if (sessionId != null && !"none".equals(sessionId)) {
            keepAlive.release(sessionId);
        }
        broadcastRepository.updateStatus(stop.broadcastId(), BroadcastStatus.ENDED);
        broadcastRepository.releaseAgent(stop.broadcastId());
        logger.info("Broadcast {} stopped ({})", stop.broadcastId(), stop.reason());
    }

    void startLegacy(org.spoutbreeze.commons.entities.BroadcastMessage message) {
        if (sessionsByBroadcast.containsKey(message.getId())) {
            logger.info("Broadcast {} is already running; ignoring a redelivered legacy message", message.getId());
            return;
        }
        if (broadcastRepository.findById(message.getId()).isEmpty()) {
            logger.error("No broadcast found for id {}", message.getId());
            return;
        }

        org.openqa.selenium.remote.RemoteWebDriver driver;
        try {
            driver = videoBroadcaster.broacast(null, null);
        } catch (RuntimeException e) {
            logger.error("Cannot start the capture session for broadcast {}", message.getId(), e);
            broadcastRepository.updateStatus(message.getId(), BroadcastStatus.FAILED);
            broadcastRepository.releaseAgent(message.getId());
            return;
        }
        String sessionId = driver.getSessionId().toString();

        sessionsByBroadcast.put(message.getId(), sessionId);
        broadcastRepository.updateSessionId(message.getId(), sessionId);
        broadcastRepository.updateStatus(message.getId(), BroadcastStatus.LIVE);
    }

    void markJobReady(String jobToken) {
        if (null == jobToken) {
            return;
        }
        try {
            apiClient.toBlocking().retrieve(
                    HttpRequest.POST("/api/v1/agent/jobs/" + jobToken + "/ready", "")
                            .bearerAuth(apiKey));
        } catch (RuntimeException e) {
            logger.error("Cannot mark the streamer job {} ready", jobToken, e);
        }
    }
}
