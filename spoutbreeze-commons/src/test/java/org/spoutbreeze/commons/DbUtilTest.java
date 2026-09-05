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
import org.spoutbreeze.commons.util.DbUtil;

import java.sql.Timestamp;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.ZonedDateTime;

import static org.assertj.core.api.Assertions.assertThat;

class DbUtilTest {
    @Test
    void convertsTimestampToUtcZonedDateTime() {
        LocalDateTime local = LocalDateTime.of(2026, 9, 5, 12, 0, 0);
        ZonedDateTime converted = DbUtil.timeStampToZonedDateTime(Timestamp.valueOf(local));

        assertThat(converted.toLocalDateTime()).isEqualTo(local);
        assertThat(converted.getZone()).isEqualTo(ZoneId.of("UTC"));
    }

    @Test
    void formatsZonedDateTimeForPostgres() {
        ZonedDateTime time = ZonedDateTime.of(2026, 9, 5, 12, 30, 15, 0, ZoneId.of("UTC"));

        assertThat(DbUtil.timeToDb(time)).isEqualTo("2026-09-05T12:30:15");
    }

    @Test
    void normalisesNonUtcInput() {
        ZonedDateTime time = ZonedDateTime.of(2026, 9, 5, 14, 30, 15, 0, ZoneId.of("Europe/Paris"));

        assertThat(DbUtil.timeToDb(time)).isEqualTo("2026-09-05T12:30:15");
    }

    @Test
    void nowProducesParseableTimestamp() {
        assertThat(DbUtil.now()).matches("\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}(\\.\\d+)?");
    }
}
