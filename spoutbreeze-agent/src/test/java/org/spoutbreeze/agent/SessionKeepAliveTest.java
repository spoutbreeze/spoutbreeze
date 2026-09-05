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

import org.junit.jupiter.api.Test;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.spoutbreeze.agent.services.SessionKeepAlive;

import static org.assertj.core.api.Assertions.assertThat;
import static org.mockito.Mockito.doThrow;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.when;
import static org.mockito.Mockito.verify;

class SessionKeepAliveTest {
    private final SessionKeepAlive keepAlive = new SessionKeepAlive();

    @Test
    void releaseQuitsAndForgetsTheDriver() {
        RemoteWebDriver driver = mock(RemoteWebDriver.class);
        keepAlive.track("s1", driver);

        assertThat(keepAlive.release("s1")).isTrue();
        verify(driver).quit();
        assertThat(keepAlive.isTracked("s1")).isFalse();
        assertThat(keepAlive.release("s1")).isFalse();
    }

    @Test
    void releaseSurvivesQuitFailure() {
        RemoteWebDriver driver = mock(RemoteWebDriver.class);
        doThrow(new RuntimeException("gone")).when(driver).quit();
        keepAlive.track("s1", driver);

        assertThat(keepAlive.release("s1")).isTrue();
        assertThat(keepAlive.isTracked("s1")).isFalse();
    }

    @Test
    void transientPollFailuresKeepTheSession() {
        RemoteWebDriver driver = mock(RemoteWebDriver.class);
        doThrow(new RuntimeException("blip")).when(driver).getCurrentUrl();
        keepAlive.track("s1", driver);

        keepAlive.pollSessions();
        keepAlive.pollSessions();

        // Two blips must not kill a live capture session and its stream.
        assertThat(keepAlive.isTracked("s1")).isTrue();
        verify(driver, never()).quit();
    }

    @Test
    void sustainedPollFailuresQuitAndDropTheSession() {
        RemoteWebDriver driver = mock(RemoteWebDriver.class);
        doThrow(new RuntimeException("dead")).when(driver).getCurrentUrl();
        keepAlive.track("s1", driver);

        keepAlive.pollSessions();
        keepAlive.pollSessions();
        keepAlive.pollSessions();

        // Dead for ~90 s: quit so the hub deletes the session and stops the streamer.
        verify(driver).quit();
        assertThat(keepAlive.isTracked("s1")).isFalse();
    }

    @Test
    void successfulPollResetsTheFailureCount() {
        RemoteWebDriver driver = mock(RemoteWebDriver.class);
        when(driver.getCurrentUrl()).thenThrow(new RuntimeException("blip"))
                .thenThrow(new RuntimeException("blip"))
                .thenReturn("https://meeting")
                .thenThrow(new RuntimeException("blip again"))
                .thenThrow(new RuntimeException("blip again"));
        keepAlive.track("s1", driver);

        keepAlive.pollSessions();
        keepAlive.pollSessions();
        keepAlive.pollSessions();
        keepAlive.pollSessions();
        keepAlive.pollSessions();

        assertThat(keepAlive.isTracked("s1")).isTrue();
    }
}
