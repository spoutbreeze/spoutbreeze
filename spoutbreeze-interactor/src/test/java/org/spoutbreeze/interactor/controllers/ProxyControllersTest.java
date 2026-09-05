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

import io.micronaut.http.HttpRequest;
import io.micronaut.http.client.BlockingHttpClient;
import io.micronaut.http.client.HttpClient;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.spoutbreeze.interactor.config.ApiConfiguration;

import static org.assertj.core.api.Assertions.assertThat;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.when;

class ProxyControllersTest {
    private final HttpClient httpClient = mock(HttpClient.class);
    private final BlockingHttpClient blocking = mock(BlockingHttpClient.class);
    private final ApiConfiguration configuration = new ApiConfiguration();

    @BeforeEach
    void wire() {
        configuration.setUser("api@spoutbreeze.test");
        configuration.setPassword("api_password");
        when(httpClient.toBlocking()).thenReturn(blocking);
        when(blocking.retrieve(any(HttpRequest.class))).thenReturn("[]");
    }

    @Test
    void broadcastingStartProxiesToApi() {
        BroadcastingController controller = new BroadcastingController(configuration);
        controller.httpClient = httpClient;

        assertThat(controller.start("{\"endpointId\":1}")).isEqualTo("[]");
    }

    @Test
    void endpointsListProxiesToApi() {
        EndpointsController controller = new EndpointsController(configuration);
        controller.httpClient = httpClient;

        assertThat(controller.list()).isEqualTo("[]");
    }
}
