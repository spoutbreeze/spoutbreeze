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
package org.spoutbreeze.commons;

import org.junit.jupiter.api.Test;
import org.spoutbreeze.commons.bbb.BbbChecksum;

import static org.assertj.core.api.Assertions.assertThat;
import static org.assertj.core.api.Assertions.assertThatThrownBy;

class BbbChecksumTest {
    @Test
    void computesSha256OverQueryAndSecret() {
        String checksum = BbbChecksum.compute("sha256", "getMeetings", "secret");

        assertThat(checksum).hasSize(64).matches("[0-9a-f]+");
    }

    @Test
    void computesSha1OverQueryAndSecret() {
        String checksum = BbbChecksum.compute("sha1", "joinmeetingID=x", "secret");

        assertThat(checksum).hasSize(40).matches("[0-9a-f]+");
    }

    @Test
    void rejectsUnknownAlgorithm() {
        assertThatThrownBy(() -> BbbChecksum.compute("md99", "x", "y"))
                .isInstanceOf(IllegalArgumentException.class);
    }
}
