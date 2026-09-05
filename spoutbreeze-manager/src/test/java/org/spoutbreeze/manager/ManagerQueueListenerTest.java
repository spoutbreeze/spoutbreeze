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
package org.spoutbreeze.manager;

import org.junit.jupiter.api.Test;
import org.spoutbreeze.manager.queue.ManagerQueueListener;
import org.spoutbreeze.manager.services.QueueProcessor;

import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.verify;

class ManagerQueueListenerTest {
    private final QueueProcessor processor = mock(QueueProcessor.class);
    private final ManagerQueueListener listener = new ManagerQueueListener(processor);

    @Test
    void forwardsBodiesToTheProcessor() {
        listener.receive("{\"id\":7}");

        verify(processor).handle("{\"id\":7}");
    }
}
