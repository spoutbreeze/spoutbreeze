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
package org.spoutbreeze.commons.util;

import java.sql.Timestamp;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.time.format.DateTimeFormatter;

public final class DbUtil {
    private static final ZoneId UTC = ZoneId.of("UTC");

    private DbUtil() {
    }

    public static ZonedDateTime timeStampToZonedDateTime(Timestamp timeStamp) {
        return timeStamp == null ? null : timeStamp.toLocalDateTime().atZone(UTC);
    }

    public static Timestamp toTimestamp(ZonedDateTime time) {
        return Timestamp.from(time.withZoneSameInstant(UTC).toInstant());
    }

    public static Timestamp nowTimestamp() {
        return toTimestamp(ZonedDateTime.now(UTC));
    }

    public static String now() {
        return timeToDb(ZonedDateTime.now(UTC));
    }

    public static String timeToDb(ZonedDateTime time) {
        LocalDateTime utc = time.withZoneSameInstant(UTC).toLocalDateTime();
        return utc.format(DateTimeFormatter.ISO_LOCAL_DATE_TIME);
    }
}
