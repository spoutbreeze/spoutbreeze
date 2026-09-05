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
package org.spoutbreeze.manager.bbb;

import org.spoutbreeze.commons.bbb.BbbApiClient;
import org.spoutbreeze.commons.bbb.HttpTransport;

/**
 * Builds a BBB API client for a server. Tests replace this with a fake.
 */
public interface BbbClientFactory {
    BbbApiClient create(String apiUrl, String secret, String checksumAlgo);

    final class Default implements BbbClientFactory {
        private final HttpTransport transport;

        public Default() {
            this(null);
        }

        public Default(HttpTransport transport) {
            this.transport = transport;
        }

        @Override
        public BbbApiClient create(String apiUrl, String secret, String checksumAlgo) {
            return transport == null
                    ? new BbbApiClient(apiUrl, secret, checksumAlgo)
                    : new BbbApiClient(apiUrl, secret, checksumAlgo, transport);
        }
    }
}
