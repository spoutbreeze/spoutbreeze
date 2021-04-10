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

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.spoutbreeze.interactor.config.ApiConfiguration;

import io.micronaut.http.HttpMethod;
import io.micronaut.http.HttpRequest;
import io.micronaut.http.MediaType;
import io.micronaut.http.MutableHttpRequest;
import io.micronaut.http.annotation.Controller;
import io.micronaut.http.annotation.Post;
import io.micronaut.http.annotation.Produces;
import io.reactivex.Flowable;

@Controller("/spoutbreeze/endpoints")
public class EndpointsController extends ApiController {

    private static final Logger log = LoggerFactory.getLogger(EndpointsController.class);

    public EndpointsController(ApiConfiguration apiConfiguration) {
        super(apiConfiguration);
    }

    @Post("/list")
    @Produces(MediaType.APPLICATION_JSON)
    public Flowable<String> list() {
        // @todo: add more headers and secure the call later
        MutableHttpRequest<Object> request = HttpRequest.create(HttpMethod.GET, "/endpoints/available")
                .basicAuth(apiConfiguration.user, apiConfiguration.password).accept(MediaType.APPLICATION_JSON);
        return httpClient.retrieve(request);
    }

}
