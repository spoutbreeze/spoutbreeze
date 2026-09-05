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
package org.spoutbreeze.agent.video;

import org.junit.jupiter.api.Test;
import org.mockito.Mockito;
import org.openqa.selenium.MutableCapabilities;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.remote.SessionId;
import org.spoutbreeze.agent.video.VideoBroadcaster;

import java.util.List;
import java.util.Map;

import java.net.MalformedURLException;

import static org.assertj.core.api.Assertions.assertThat;
import static org.assertj.core.api.Assertions.assertThatThrownBy;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.when;

class VideoBroadcasterTest {
    private final RemoteWebDriver driver = mock(RemoteWebDriver.class);
    private final MutableCapabilities[] captured = new MutableCapabilities[1];

    private final VideoBroadcaster broadcaster = new VideoBroadcaster("http://hub:4444/wd/hub", "http://api", new org.spoutbreeze.agent.services.SessionKeepAlive()) {
        @Override
        RemoteWebDriver connect(String uri, MutableCapabilities capabilities) {
            assertThat(uri).isEqualTo("http://hub:4444/wd/hub");
            assertThat(capabilities.getBrowserName()).isEqualTo("chrome");
            captured[0] = capabilities;
            return driver;
        }
    };

    @Test
    void broadcastReturnsTheLiveDriver() {
        when(driver.getSessionId()).thenReturn(new SessionId("session-42"));

        assertThat(broadcaster.broacast()).isSameAs(driver);
    }

    @Test
    @SuppressWarnings("unchecked")
    void capabilitiesCarryTheSelenoidOptions() {
        when(driver.getSessionId()).thenReturn(new SessionId("s"));
        when(driver.getCurrentUrl()).thenReturn("https://meeting");

        broadcaster.broacast("tok", "https://meeting");

        assertThat(captured[0]).isInstanceOf(ChromeOptions.class);
        Map<String, Object> options = (Map<String, Object>) ((ChromeOptions) captured[0]).getCapability("selenoid:options");
        assertThat(options).isNotNull();
        assertThat((java.util.List<String>) options.get("env"))
                .containsExactly("SPOUTBREEZE_JOB=tok", "SPOUTBREEZE_API=http://api");
    }

    @Test
    void legacySelenoidOptions() {
        assertThat(VideoBroadcaster.gridOptions())
                .containsEntry("enableVNC", true)
                .containsEntry("enableVideo", true)
                .containsEntry("screenResolution", "1920x1080x24")
                .containsEntry("sessionTimeout", "8h")
                .containsEntry("videoFrameRate", 30);
    }

    @Test
    void invalidHubUriIsRejected() {
        VideoBroadcaster real = new VideoBroadcaster("not a url", "http://api", new org.spoutbreeze.agent.services.SessionKeepAlive());

        assertThatThrownBy(() -> real.connect("not a url", new DesiredCapabilities()))
                .isInstanceOf(IllegalArgumentException.class);
    }
}
