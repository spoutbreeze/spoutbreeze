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

package org.spoutbreeze.interactor.controllers;

import org.spoutbreeze.interactor.data.BroadcastStartRequest;

import io.micronaut.http.HttpResponse;
import io.micronaut.http.MediaType;
import io.micronaut.http.annotation.Body;
import io.micronaut.http.annotation.Consumes;
import io.micronaut.http.annotation.Controller;
import io.micronaut.http.annotation.Post;

@Controller("/broadcasting")
public class BroadcastingController {

    /* {"endpointId":"1", "meetingId":"5b6d8c848e9b1b3746b72a7681d8c59f3481f8a7-1600099820574", "userId": "12345"}
     */
    @Consumes({ MediaType.APPLICATION_JSON })
    @Post("/start")
    public HttpResponse issue(@Body BroadcastStartRequest jsonData) {
        return HttpResponse.ok();
    }

}
