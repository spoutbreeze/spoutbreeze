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
final class LinkedInTest extends Scenario
{
    protected $group = 'Streaming LinkedIn';

    public function testLinkedInAssemblesIngestFromEvent($f3)
    {
        $linkedin  = new LinkedIn(new CurlTransport());
        $destination = $linkedin->prepare([
            'url'  => 'rtmps://dext.vimeo.com/live/abc',
            'key'  => 'key-123',
        ]);

        $test = $this->newTest();
        $test->expect('rtmps://dext.vimeo.com/live/abc/key-123' === $destination->url, 'LinkedIn ingest URL + key assemble');
        $test->expect('linkedin' === $destination->provider, 'provider name is linkedin');

        $thrown = false;
        try {
            $linkedin->prepare(['url' => '', 'key' => '']);
        } catch (\InvalidArgumentException $e) {
            $thrown = true;
        }
        $test->expect($thrown, 'empty LinkedIn ingest is rejected');

        return $test->results();
    }

    public function testLinkedInConstraints($f3)
    {
        $constraints = (new LinkedIn(new CurlTransport()))->constraints();

        $test = $this->newTest();
        $test->expect(1080 === $constraints['max_height'], 'LinkedIn caps height at 1080');
        $test->expect(30 === $constraints['max_framerate'], 'LinkedIn caps framerate at 30');
        $test->expect(6000 === $constraints['max_bitrate_kbps'], 'LinkedIn caps bitrate at 6000 kbps');
        $test->expect(4 === $constraints['max_duration_hours'], 'LinkedIn caps duration at 4 hours');

        return $test->results();
    }
}
