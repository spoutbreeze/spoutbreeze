<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.io/
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

namespace Core;

use Test\Scenario;

class ConfigurationTest extends Scenario
{
    protected $group = 'Framework & Server Configuration';

    /**
     * @param $f3 \Base
     * @return array
     */
    public function testDefaultConfiguration($f3)
    {
        $test = $this->newTest();
        $test->expect(date_default_timezone_get() === 'Europe/Istanbul', 'Timezone set to Europe/Istanbul');
        $test->expect(ini_get('default_charset') === 'UTF-8', 'Default charset is UTF-8');
        $test->expect($f3->get('LOGS') === '../logs/', 'Logs folder correctly configured to "logs"');
        $test->expect($f3->get('TEMP') === '../tmp/', 'Cache folder correctly configured to "tmp/cache/"');
        $test->expect(mb_strpos($f3->get('UI'), 'templates/;../public/;') === 0, 'Templates folder correctly configured to "templates" and "public"');
        $test->expect($f3->get('FALLBACK') === 'en-GB', 'Fallback language set to en-GB');
        $test->expect($f3->get('db.driver') === 'pgsql', 'Using PostgreSQL database for session storage');
        $test->expect($f3->get('application.logfile') === '../logs/' . (PHP_SAPI !== 'cli' ? 'app' : 'cli') . '-' . date('Y-m-d') . '.log', 'Log file name set to daily rotation ' . 'app-' . date('Y-m-d') . '.log');

        return $test->results();
    }
}
