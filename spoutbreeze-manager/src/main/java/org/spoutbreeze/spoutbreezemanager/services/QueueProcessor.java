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

package org.spoutbreeze.spoutbreezemanager.services;

import java.io.IOException;

import com.fasterxml.jackson.databind.ObjectMapper;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.spoutbreezemanager.models.BroadcastMessage;
import org.springframework.amqp.rabbit.annotation.RabbitListener;
import org.springframework.lang.Nullable;
import org.springframework.stereotype.Service;

/**
 * Processes the inbound message from the queue
 */
@Service
public class QueueProcessor {
    private static final Logger logger = LoggerFactory.getLogger(AgentsManager.class);

    /**
     * gets the message
     * @param message the message
     */
    @RabbitListener(queues = "spoutbreeze_manager")
    public void receiveMessage(final byte[] message) {
        //get the message
        final BroadcastMessage broadcastMessage = getBroadcastMessage(message);
        if (broadcastMessage == null) {
            return;
        }

        //get the agent


    }

    /**
     * marshalls the byte[] message
     * @param message the message
     * @return the marshalled object
     */
    @Nullable
    public BroadcastMessage getBroadcastMessage(byte[] message) {
        logger.info("Received message as generic: {}", message);
        System.out.println("the message obtained is " + message);

        final ObjectMapper objectMapper = new ObjectMapper();

        try {
            final BroadcastMessage broadcastMessage = objectMapper.readValue(message, BroadcastMessage.class);

            System.out.println(broadcastMessage.toString());
            return broadcastMessage;
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }
}
