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

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.data.broadcast.BroadcastJdbcRepository;
import org.spoutbreeze.commons.entities.Broadcast;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.scheduling.annotation.Scheduled;

public class BroadcastingAssigner {

    private static final Logger logger = LoggerFactory.getLogger(BroadcastingAssigner.class);

    private Boolean isAssigning = false;

    @Autowired
    @Qualifier("agentsManager")
    private AgentsManager agentsManager;

    @Autowired
    @Qualifier("assignmentJdbcRepository")
    private BroadcastJdbcRepository broadcastJdbcRepository;

    // Check if there is any broadcast to assign to an agent then create
    // @todo: replace @Scheduled task with real-time message (redis)
    @Scheduled(fixedRate = 2500)
    public void scheduleAssignments() {
        try {
            assignRecordingsToAgents();
            endAssignement();
        } catch (InterruptedException e) {
            logger.error("CRITICAL !! An excpeted error occured during assigning the recordings.", e);
        }
    }

    /**
     * Fetches the recordings and distribute them to agents
     * 
     * @throws InterruptedException
     */
    private void assignRecordingsToAgents() throws InterruptedException {
        // Do nothing if an assignment is being made
        if (assignementInProgess())
            return;

        // Create a lock to inform the other services that an assignment is in progress
        startAssignment();

        // Load the assignments
        Broadcast readyBroadcast = broadcastJdbcRepository.findReadyBroadcast();
        // @todo assign the broadcast to an agent and find the agent
        broadcastJdbcRepository.assignToAgent(readyBroadcast, 1);

        logger.info("Finished distributing the recordings");
    }

    private void startAssignment() {
        isAssigning = true;
        logger.info("Lock on recordings assignement created");
    }

    private void endAssignement() {
        isAssigning = false;
        logger.info("Lock on recordings assignement released");
    }

    public Boolean assignementInProgess() {
        return isAssigning.equals(true);
    }
}
