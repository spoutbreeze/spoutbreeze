/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

package org.spoutbreeze.agent.video;

import java.net.MalformedURLException;
import java.net.URI;
import java.util.Arrays;
import java.util.HashMap;

import org.openqa.selenium.MutableCapabilities;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Service;

@Service
public class VideoBroadcaster {

    private static final Logger logger = LoggerFactory.getLogger(VideoBroadcaster.class);

    private RemoteWebDriver seleniumDriver;

    private String selenoidServiceUri = "http://127.0.0.1:4444/wd/hub";

    private String sessionId;

    public void broacast() {
        logger.info("Starting a new broadcast");

        DesiredCapabilities capabilities = new DesiredCapabilities();
        capabilities.setCapability("browserName", "chrome");
        capabilities.setCapability("browserVersion", "87.0");
        capabilities.setCapability("selenoid:options", new HashMap<String, Object>() {
            {
                put("enableVNC", true);
                put("enableVideo", true);
                put("enableLog", true);
                put("logName", "recording.meetingId.log");
                put("screenResolution", "1024x768x24");
                // @todo: session time is configurable
                put("sessionTimeout", "20000s");
                put("videoFrameRate", 24);
            }
        });

        logger.info("Creating Chrome options");
        ChromeOptions chromeOptions = new ChromeOptions();
        chromeOptions.setExperimentalOption("excludeSwitches", Arrays.asList("enable-automation", "load-extension"));
        chromeOptions.addArguments("--start-fullscreen");
        chromeOptions.merge(capabilities);
        try {
            connectToSelenoid(chromeOptions);
        } catch (MalformedURLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        sessionId = seleniumDriver.getSessionId().toString();
        logger.info("Created Selenium session with id [{}]", "sessionId");

        // @todo : use the URL generated from an API call

        String recordingUrl = "https://bigbluebutton.org";

        // @todo
        // - Hide users list
        // - Hide icons on webcams
        // - Hide icons in presentation

        logger.info("Navigating to url [{}]", recordingUrl);
        seleniumDriver.navigate().to(recordingUrl);
        try {
            Thread.sleep(20000000);
        } catch (InterruptedException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private void connectToSelenoid(MutableCapabilities capabilities) throws MalformedURLException {
        logger.info("Connection to selenoid driver.");
        this.seleniumDriver = new RemoteWebDriver(URI.create(selenoidServiceUri).toURL(), capabilities);
    }
}
