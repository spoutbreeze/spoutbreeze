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

namespace Actions\Website;

use Test\Scenario;

class GetLocaleTest extends Scenario
{
    protected $group = 'Action Core GetLocale';

    /**
     * @param $f3 \Base
     * @return array
     */
    public function testGetLocale($f3)
    {
        $test = $this->newTest();
        $f3->mock('GET /locale/json/en-GB.json [ajax]');

        json_decode($f3->get('RESPONSE'));

        $test->expect(json_last_error() === JSON_ERROR_NONE, 'Create JSON localisation on the fly is valid caching ON');

        return $test->results();
    }
}
