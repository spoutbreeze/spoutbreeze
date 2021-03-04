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

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.commons.entities.Broadcast;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Service;

@Service
public class BroadcastFinder {

    private static final Logger logger = LoggerFactory.getLogger(BroadcastFinder.class);

    private Broadcast currentBroadcast;

    @Autowired
    @Qualifier("videoBroadcaster")
    private static VideoBroadcaster videoBroadcaster;

    @Scheduled(fixedRate = 2500)
    public void findAssignement() {
        // @todo
        // 1 - Find the assigned broadcast
        // - Lock starting another broadcast
        // 2 - Create a join link with the API
        // - The join API must auto-join audio and hide the layout parts
        // 3 - Change the broadcast status once live
        // 4 - Distribute the new status to the interactor
        // 5 - Display the broadcasting status into the extender
        // 6 - Deregister the selenoid session
    }

    public Boolean isBroadcasting() {
        return false;
    }
}
