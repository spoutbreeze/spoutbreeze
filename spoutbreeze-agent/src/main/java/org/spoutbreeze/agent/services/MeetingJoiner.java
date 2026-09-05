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

import jakarta.inject.Singleton;
import org.openqa.selenium.By;
import org.openqa.selenium.TimeoutException;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.time.Duration;

/**
 * The bot's DOM journey after the meeting page loads: wait for the BigBlueButton
 * client, join the audio in listen-only mode (clicking the dialog button when
 * the microphone flow gets in the way), and return only once the client shows
 * the joined state. The streamer is gated on this, so it never pushes a
 * desktop that is not inside the meeting audio.
 */

@Singleton
public class MeetingJoiner {
    private static final Logger logger = LoggerFactory.getLogger(MeetingJoiner.class);

    private static final Duration CLIENT_TIMEOUT = Duration.ofSeconds(45);
    private static final Duration DIALOG_TIMEOUT = Duration.ofSeconds(15);

    /**
     * BBB 4.0 marks its controls with data-test attributes; the visible-text
     * fallback covers versions and locales where the attribute differs.
     */
    private static final By LISTEN_ONLY_BUTTON = By.xpath(
            "//button[contains(@data-test,'istenOnly')"
                    + " or contains(translate(normalize-space(.),"
                    + " 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'),"
                    + " 'listen only')]");

    private static final By AUDIO_DIALOG = By.xpath(
            "//*[contains(@data-test,'udioModal') or contains(@class,'audioModal')]");

    private static final By CLIENT_SHELL = By.cssSelector("#app, [data-test], .ReactModalPortal");

    public void joinListenOnly(RemoteWebDriver driver) {
        logger.info("Starting the listen-only DOM journey");
        followJoinRedirect(driver);
        waitForClient(driver);

        boolean clicked = clickListenOnlyIfPresent(driver);
        if (!clicked) {
            // userdata-bbb_listen_only_mode may have auto-joined already.
            logger.info("No listen-only dialog appeared; assuming the client auto-joined the audio");
        }

        waitForDialogToClose(driver);
        logger.info("Listen-only audio joined");
    }

    /**
     * A join URL created with redirect=false returns an XML document whose
     * body carries the html5client URL; follow it so the client actually
     * loads. With redirect=true (the default) this is a no-op.
     */
    void followJoinRedirect(WebDriver driver) {
        try {
            String body = driver.findElement(By.tagName("body")).getText();
            if (body.contains("<response>") || body.contains("sessionToken")) {
                String url = driver.getCurrentUrl();
                logger.info("Join returned an XML redirect page; body starts: {}",
                        body.substring(0, Math.min(200, body.length())));
                // BBB returns <response>...<joinUrl>? or the client URL in the
                // page text when redirect=false; extract any http(s) URL and go.
                java.util.regex.Matcher m = java.util.regex.Pattern
                        .compile("https?://\\S+html5client\\S*")
                        .matcher(body);
                if (m.find()) {
                    String client = m.group().replaceAll("[<\"']+$", "");
                    logger.info("Following html5client at {}", client);
                    driver.get(client);
                }
            }
        } catch (RuntimeException e) {
            // body may not exist yet or page is already the client — fine.
        }
    }

    void waitForClient(WebDriver driver) {
        WebDriverWait wait = new WebDriverWait(driver, CLIENT_TIMEOUT);
        wait.until(d -> "complete".equals(
                ((org.openqa.selenium.JavascriptExecutor) d).executeScript("return document.readyState")));
        wait.until(d -> !d.findElements(CLIENT_SHELL).isEmpty());
    }

    boolean clickListenOnlyIfPresent(WebDriver driver) {
        try {
            WebDriverWait dialogWait = new WebDriverWait(driver, DIALOG_TIMEOUT);
            WebElement button = dialogWait.until(
                    d -> d.findElements(LISTEN_ONLY_BUTTON).stream().findFirst().orElse(null));
            button.click();
            logger.info("Clicked the listen-only button");
            return true;
        } catch (TimeoutException e) {
            return false;
        }
    }

    private void waitForDialogToClose(WebDriver driver) {
        try {
            WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(20));
            wait.until(d -> {
                boolean dialogGone = d.findElements(AUDIO_DIALOG).isEmpty()
                        || !d.findElements(AUDIO_DIALOG).get(0).isDisplayed();
                boolean buttonGone = d.findElements(LISTEN_ONLY_BUTTON).isEmpty()
                        || !d.findElements(LISTEN_ONLY_BUTTON).get(0).isDisplayed();
                return dialogGone && buttonGone;
            });
        } catch (TimeoutException e) {
            throw new IllegalStateException("The audio dialog never closed after listen-only", e);
        }
    }
}
