/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 * <p>
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 * <p>
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 * <p>
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 * <p>
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

package org.spoutbreeze.interactor.controllers;

import javax.inject.Inject;

import org.spoutbreeze.interactor.config.ApiConfiguration;

import io.micronaut.core.annotation.Nullable;
import io.micronaut.http.client.RxHttpClient;
import io.micronaut.http.client.annotation.Client;

public abstract class ApiController {
    protected final ApiConfiguration apiConfiguration;

    @Client("api")
    @Inject
    RxHttpClient httpClient;

    public ApiController(@Nullable ApiConfiguration apiConfiguration) {
        this.apiConfiguration = apiConfiguration;
    }
}
