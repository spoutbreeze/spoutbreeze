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

import io.micronaut.scheduling.annotation.Scheduled;
import jakarta.inject.Singleton;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.util.Map;
import java.util.concurrent.ConcurrentHashMap;

/**
 * Keeps capture sessions alive: every WebDriver command resets the hub's idle
 * timer, so a light poll per active session prevents the 60 s default reap
 * while the streamer runs undisturbed. {@link #release(String)} quits the
 * driver so the hub deletes the session and SIGTERMs the streamer sidecar.
 */
@Singleton
public class SessionKeepAlive {
    private static final Logger logger = LoggerFactory.getLogger(SessionKeepAlive.class);

    private static final int MAX_CONSECUTIVE_FAILURES = 3;

    private final Map<String, RemoteWebDriver> sessions = new ConcurrentHashMap<>();
    private final Map<String, Integer> failures = new ConcurrentHashMap<>();

    public void track(String sessionId, RemoteWebDriver driver) {
        sessions.put(sessionId, driver);
        failures.remove(sessionId);
    }

    public boolean isTracked(String sessionId) {
        return sessions.containsKey(sessionId);
    }

    public boolean release(String sessionId) {
        RemoteWebDriver driver = sessions.remove(sessionId);
        failures.remove(sessionId);
        if (driver == null) {
            return false;
        }
        return quitQuietly(sessionId, driver);
    }

    private boolean quitQuietly(String sessionId, RemoteWebDriver driver) {
        try {
            driver.quit();
            logger.info("Quit capture session {}", sessionId);
            return true;
        } catch (RuntimeException e) {
            logger.warn("Session {} did not quit cleanly: {}", sessionId, e.getMessage());
            return true;
        }
    }

    @Scheduled(fixedRate = "30s")
    public void pollSessions() {
        sessions.forEach((sessionId, driver) -> {
            try {
                driver.getCurrentUrl();
                failures.remove(sessionId);
            } catch (RuntimeException e) {
                int count = failures.merge(sessionId, 1, Integer::sum);
                logger.warn("Session {} poll failed {}/{}: {}", sessionId, count, MAX_CONSECUTIVE_FAILURES, e.getMessage());
                if (count >= MAX_CONSECUTIVE_FAILURES) {
                    // Dead for ~90 s: quit so the hub deletes the session and
                    // SIGTERMs the streamer instead of streaming to a zombie.
                    sessions.remove(sessionId);
                    failures.remove(sessionId);
                    quitQuietly(sessionId, driver);
                }
            }
        });
    }
}
