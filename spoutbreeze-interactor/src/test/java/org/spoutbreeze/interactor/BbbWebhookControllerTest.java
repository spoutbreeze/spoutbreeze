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

import io.micronaut.http.HttpResponse;
import org.junit.jupiter.api.Test;
import org.mockito.ArgumentCaptor;
import org.spoutbreeze.commons.contracts.BroadcastEvent;
import org.spoutbreeze.interactor.bbb.BbbChecksumVerifier;
import org.spoutbreeze.interactor.bbb.BbbEventPublisher;
import org.spoutbreeze.interactor.bbb.BbbWebhookController;

import static org.assertj.core.api.Assertions.assertThat;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.never;
import static org.mockito.Mockito.verify;

class BbbWebhookControllerTest {
    private final BbbEventPublisher publisher = mock(BbbEventPublisher.class);
    private final BbbWebhookController controller =
            new BbbWebhookController(publisher, "https://spb.example.com", "s3cret", "sha256");

    @Test
    void acceptsValidChecksumAndPublishesAMeetingEndedEvent() {
        String body = "{\"data\":{\"id\":\"meeting-ended\",\"attributes\":{\"meeting\":{\"external-meeting-id\":\"m-1\"}}}}";
        String callbackUrl = "https://spb.example.com/hooks/bbb/bbb.example.com";
        String checksum = BbbChecksumVerifier.digest("sha256", callbackUrl + body + "s3cret");

        HttpResponse<String> response = controller.receive("bbb.example.com", body, checksum);

        assertThat(response.code()).isEqualTo(200);
        assertThat(response.body()).isEqualTo("ok");
        ArgumentCaptor<BroadcastEvent> captor = ArgumentCaptor.forClass(BroadcastEvent.class);
        verify(publisher).publishEvent(captor.capture());
        assertThat(captor.getValue().type()).isEqualTo("bbb.meeting_ended");
        assertThat(captor.getValue().server()).isEqualTo("bbb.example.com");
        assertThat(captor.getValue().payload()).containsEntry("meeting_id", "m-1");
    }

    @Test
    void rejectsInvalidChecksum() {
        HttpResponse<String> response = controller.receive("bbb.example.com", "{}", "deadbeef");

        assertThat(response.code()).isEqualTo(401);
        verify(publisher, never()).publishEvent(any());
    }
}
