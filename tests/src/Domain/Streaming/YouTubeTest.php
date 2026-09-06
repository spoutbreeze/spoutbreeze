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
final class YouTubeTest extends Scenario
{
    protected $group = 'Streaming YouTube';

    public function testCreatesBroadcastStreamAndBind($f3)
    {
        $http     = new class implements Transport {
            public array $calls = [];

            public function send(string $method, string $url, array $headers = [], ?string $body = null): array
            {
                $this->calls[] = $url;
                if (str_contains($url, 'liveBroadcasts/bind')) {
                    return ['status' => 200, 'body' => '{"id":"b1"}'];
                }
                if (str_contains($url, 'liveBroadcasts')) {
                    return ['status' => 200, 'body' => '{"id":"b1"}'];
                }

                return ['status' => 200, 'body' => json_encode([
                    'id'  => 's1',
                    'cdn' => ['ingestionInfo' => [
                        'ingestionAddress' => 'rtmp://a.youtube.com/live2',
                        'streamName'       => 'xxxx-yyyy',
                    ]],
                ])];
            }
        };
        $youtube = new YouTube($http);
        $destination = $youtube->prepare(['access_token' => 'tok', 'title' => 'Demo']);

        $test = $this->newTest();
        $test->expect('rtmp://a.youtube.com/live2/xxxx-yyyy' === $destination->url, 'ingest URL is assembled from the stream');
        $test->expect('b1' === ($destination->meta['broadcast_id'] ?? null), 'broadcast id is kept');
        $test->expect(3 === \count($http->calls), 'create, stream and bind are called');

        return $test->results();
    }

    public function testRequiresAnAccessToken($f3)
    {
        $thrown = false;
        try {
            (new YouTube(new class implements Transport {
                public function send(string $method, string $url, array $headers = [], ?string $body = null): array
                {
                    return ['status' => 200, 'body' => '{}'];
                }
            }))->prepare([]);
        } catch (\InvalidArgumentException) {
            $thrown = true;
        }

        $test = $this->newTest();
        $test->expect($thrown, 'missing access token is rejected');

        return $test->results();
    }
}
