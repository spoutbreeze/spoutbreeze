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
package org.spoutbreeze.interactor;

import org.junit.jupiter.api.Test;
import org.spoutbreeze.interactor.handlers.ReceivedMessageHandler;

import static org.assertj.core.api.Assertions.assertThatCode;

class ReceivedMessageHandlerTest {
    private final ReceivedMessageHandler handler = new ReceivedMessageHandler();

    @Test
    void parsesValidMessage() {
        assertThatCode(() -> handler.handleMessage(
                "{\"core\":{\"header\":{\"name\":\"CreateMeetingReqMsg\"}},\"envelope\":{}}"))
                .doesNotThrowAnyException();
    }

    @Test
    void toleratesUnknownFields() {
        assertThatCode(() -> handler.handleMessage(
                "{\"core\":{\"header\":{\"name\":\"X\",\"unknown\":1},\"body\":{}},\"envelope\":{},\"extra\":true}"))
                .doesNotThrowAnyException();
    }

    @Test
    void swallowsInvalidPayload() {
        assertThatCode(() -> handler.handleMessage("not json")).doesNotThrowAnyException();
    }
}
