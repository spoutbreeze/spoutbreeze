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
package org.spoutbreeze.commons.entities;

import org.spoutbreeze.commons.enums.BroadcastStatus;

import java.time.ZonedDateTime;

import jakarta.persistence.*;


@Entity(name = "broadcasts")
public class Broadcast {

    @Id
    @Column(name = "id")
    public Long id;

    @Column(name = "server_id")
    public Long server_id;

    @Column(name = "endpoint_id")
    public Long endpoint_id;

    @Column(name = "session_id")
    public String session_id;

    @Column(name = "meeting_id")
    public String meeting_id;

    @Column(name = "agent_id")
    public Long agent_id;

    @OneToOne
    @JoinColumn(name="id")
    public Agent agent;

    @Column(name = "created_on")
    public ZonedDateTime createdOn;

    @Column(name = "updated_on")
    public ZonedDateTime updatedOn;

    @Column(name = "status")
    @Enumerated(EnumType.STRING)
    public BroadcastStatus status;
}
