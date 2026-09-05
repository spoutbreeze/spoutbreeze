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

import io.micronaut.context.annotation.Value;
import jakarta.inject.Singleton;
import org.openqa.selenium.MutableCapabilities;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.net.MalformedURLException;
import java.net.URI;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Singleton
public class VideoBroadcaster {
    private static final Logger logger = LoggerFactory.getLogger(VideoBroadcaster.class);

    private final String hubUri;
    private final String apiUrl;
    private final org.spoutbreeze.agent.services.SessionKeepAlive keepAlive;

    public VideoBroadcaster(@Value("${grid.endpoint}") String hubUri,
                            @Value("${spoutbreeze.api.url}") String apiUrl,
                            org.spoutbreeze.agent.services.SessionKeepAlive keepAlive) {
        this.hubUri = hubUri;
        this.apiUrl = apiUrl;
        this.keepAlive = keepAlive;
    }

    public RemoteWebDriver broacast() {
        return broacast(null, null);
    }

    public RemoteWebDriver broacast(String jobToken, String joinUrl) {
        logger.info("Starting a new broadcast");

        Map<String, Object> options = gridOptions();
        if (null != jobToken) {
            options.put("env", List.of("SPOUTBREEZE_JOB=" + jobToken, "SPOUTBREEZE_API=" + apiUrl));
        }

        ChromeOptions chromeOptions = new ChromeOptions();
        chromeOptions.setExperimentalOption("excludeSwitches", Arrays.asList("enable-automation", "load-extension"));
        chromeOptions.addArguments("--window-size=1920,1080");
        // Exclusive fullscreen: kiosk renders the client with no browser frame.
        chromeOptions.addArguments("--kiosk");
        chromeOptions.setCapability("selenoid:options", options);

        RemoteWebDriver driver = connect(hubUri, chromeOptions);
        String sessionId = driver.getSessionId().toString();
        logger.info("Created browser session with id {}", sessionId);

        if (null != joinUrl) {
            driver.get(joinUrl);
            logger.info("Navigated the capture session to the meeting");
        }
        keepAlive.track(sessionId, driver);
        return driver;
    }

    static Map<String, Object> gridOptions() {
        Map<String, Object> options = new HashMap<>();
        options.put("enableVNC", true);
        options.put("enableVideo", true);
        options.put("enableLog", true);
        options.put("logName", "recording.meetingId.log");
        options.put("screenResolution", "1920x1080x24");
        options.put("sessionTimeout", "8h");
        options.put("videoFrameRate", 30);
        return options;
    }

    RemoteWebDriver connect(String uri, MutableCapabilities capabilities) {
        try {
            return new RemoteWebDriver(URI.create(uri).toURL(), capabilities);
        } catch (MalformedURLException e) {
            throw new IllegalArgumentException("Invalid hub uri " + uri, e);
        }
    }
}
