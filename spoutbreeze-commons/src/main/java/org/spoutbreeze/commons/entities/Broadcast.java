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

package org.spoutbreeze.commons.entities;

import java.time.ZonedDateTime;

import javax.persistence.Column;
import javax.persistence.GeneratedValue;

import org.springframework.data.annotation.Id;

// @Entity(name = "broadcasts")
public class Broadcast {

    @Id
    @GeneratedValue
    @Column(name = "id")
    public Long id;

    @Column(name = "server_id")
    public Long server_id;

    @Column(name = "endpoint_id")
    public Long endpoint_id;

    @Column(name = "selenoid_id")
    public String selenoid_id;

    public Agent agent;

    @Column(name = "created_on")
    public ZonedDateTime createdOn;

    @Column(name = "updated_on")
    public ZonedDateTime updatedOn;
}
