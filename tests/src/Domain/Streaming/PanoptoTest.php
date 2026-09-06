<?php

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

declare(strict_types=1);

namespace Domain\Streaming;

use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class PanoptoTest extends Scenario
{
    protected $group = 'Streaming Panopto';

    public function testPanoptoValidatesConfiguration($f3)
    {
        $panopto = new Panopto(null);

        $test = $this->newTest();
        $incomplete = [
            ['site' => '', 'user' => 'u', 'folder_id' => 'f'],
            ['site' => 's', 'user' => '', 'folder_id' => 'f'],
            ['site' => 's', 'user' => 'u', 'folder_id' => ''],
        ];
        foreach ($incomplete as $config) {
            $thrown = false;
            try {
                $panopto->prepare($config);
            } catch (\InvalidArgumentException) {
                $thrown = true;
            }
            $test->expect($thrown, 'Panopto rejects incomplete configuration');
        }

        return $test->results();
    }

    public function testPanoptoConvertToOnDemandWithoutSession($f3)
    {
        $test  = $this->newTest();
        $quiet = (new Panopto(null))->convertToOnDemand([], []);

        $test->expect(null === $quiet, 'missing session id converts silently');

        return $test->results();
    }
}
