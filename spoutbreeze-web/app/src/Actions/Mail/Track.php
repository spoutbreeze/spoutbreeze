<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

namespace Actions\Mail;

class Track
{
    /**
     * @param \Mailer $mailer
     * @param $log
     */
    public static function logError($mailer, $log): void
    {
        $logger = new Log('logs/smtp_' . date('Y_m_d') . '.log');
        $logger->write($log);
    }

    public static function traceMail($hash): void
    {
        // your mail $hash is being read
    }

    public static function traceClick($target): void
    {
        // someone clicked $target link
    }
}
