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
package org.spoutbreeze.interactor.controllers;

import io.micronaut.http.HttpMethod;
import io.micronaut.http.HttpRequest;
import io.micronaut.http.MediaType;
import io.micronaut.http.MutableHttpRequest;
import io.micronaut.http.annotation.Controller;
import io.micronaut.http.annotation.Post;
import io.micronaut.http.annotation.Produces;
import jakarta.inject.Singleton;
import org.spoutbreeze.interactor.config.ApiConfiguration;

@Singleton
@Controller("/spoutbreeze/endpoints")
public class EndpointsController extends ApiController {

    public EndpointsController(ApiConfiguration apiConfiguration) {
        super(apiConfiguration);
    }

    @Post("/list")
    @Produces(MediaType.APPLICATION_JSON)
    public String list() {
        MutableHttpRequest<Object> request = HttpRequest.create(HttpMethod.GET, "/endpoints/available")
                .basicAuth(apiConfiguration.getUser(), apiConfiguration.getPassword())
                .accept(MediaType.APPLICATION_JSON);
        return httpClient.toBlocking().retrieve(request);
    }
}
