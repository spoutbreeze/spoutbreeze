<?php

declare(strict_types=1);

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

namespace Domain\Streaming;

use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class GenericRtmpTest extends Scenario
{
    protected $group = 'Streaming GenericRtmp';

    public function testAppendsTheStreamKey($f3)
    {
        $destination = (new GenericRtmp())->prepare([
            'url'        => 'rtmp://live.example/app/',
            'stream_key' => 'abc123',
            'label'      => 'twitch',
        ]);

        $test = $this->newTest();
        $test->expect('rtmp://live.example/app/abc123' === $destination->url, 'stream key is appended to the URL');
        $test->expect('twitch' === $destination->label, 'label is preserved');

        return $test->results();
    }

    public function testRejectsNonRtmpUrls($f3)
    {
        $thrown = false;
        try {
            (new GenericRtmp())->prepare(['url' => 'https://example.com']);
        } catch (\InvalidArgumentException) {
            $thrown = true;
        }

        $test = $this->newTest();
        $test->expect($thrown, 'non-RTMP URLs are rejected');

        return $test->results();
    }
}
