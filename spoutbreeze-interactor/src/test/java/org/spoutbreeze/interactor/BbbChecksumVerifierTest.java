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
import org.spoutbreeze.interactor.bbb.BbbChecksumVerifier;

import static org.assertj.core.api.Assertions.assertThat;
import static org.assertj.core.api.Assertions.assertThatThrownBy;

class BbbChecksumVerifierTest {
    private static final String CALLBACK = "https://spb.example.com/hooks/bbb/bbb.example.com";
    private static final String BODY = "{\"event\":{\"type\":\"meeting-ended\"}}";
    private static final String SECRET = "s3cret";

    @Test
    void verifiesSha256Checksum() {
        String checksum = BbbChecksumVerifier.digest("sha256", CALLBACK + BODY + SECRET);

        assertThat(BbbChecksumVerifier.verify("sha256", CALLBACK, BODY, SECRET, checksum)).isTrue();
    }

    @Test
    void verifiesSha1ChecksumCaseInsensitively() {
        String checksum = BbbChecksumVerifier.digest("sha1", CALLBACK + BODY + SECRET).toUpperCase();

        assertThat(BbbChecksumVerifier.verify("sha1", CALLBACK, BODY, SECRET, checksum)).isTrue();
    }

    @Test
    void rejectsWrongSecret() {
        String checksum = BbbChecksumVerifier.digest("sha256", CALLBACK + BODY + "other");

        assertThat(BbbChecksumVerifier.verify("sha256", CALLBACK, BODY, SECRET, checksum)).isFalse();
    }

    @Test
    void rejectsMissingChecksum() {
        assertThat(BbbChecksumVerifier.verify("sha256", CALLBACK, BODY, SECRET, null)).isFalse();
        assertThat(BbbChecksumVerifier.verify("sha256", CALLBACK, BODY, SECRET, " ")).isFalse();
    }

    @Test
    void rejectsUnknownAlgorithm() {
        assertThatThrownBy(() -> BbbChecksumVerifier.digest("md99", "input"))
                .isInstanceOf(IllegalArgumentException.class);
    }
}
