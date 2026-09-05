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
package org.spoutbreeze.interactor.handlers;

import com.fasterxml.jackson.databind.DeserializationFeature;
import com.fasterxml.jackson.databind.ObjectMapper;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.interactor.bigbluebutton.messages.commons.BbbCommonEnvCoreMsg;

import java.io.IOException;

public class ReceivedMessageHandler {
    private static final Logger logger = LoggerFactory.getLogger(ReceivedMessageHandler.class);
    private static final ObjectMapper objectMapper = new ObjectMapper()
            .configure(DeserializationFeature.FAIL_ON_UNKNOWN_PROPERTIES, false);

    public void handleMessage(String message) {
        try {
            BbbCommonEnvCoreMsg bbbMessage = objectMapper.readValue(message, BbbCommonEnvCoreMsg.class);
            logger.info("Converted a BigBlueButton message of type {}", bbbMessage.core.header.name);
        } catch (IOException e) {
            logger.error("Cannot handle the received BigBlueButton message", e);
        }
    }
}
