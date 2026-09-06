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

namespace Domain;

use Domain\Streaming\GenericRtmp;
use Domain\Streaming\ProviderRegistry;
use Domain\Streaming\Transport;
use Domain\Streaming\YouTube;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class StreamingProvidersTest extends Scenario
{
    protected $group = 'Streaming providers';

    public function testGenericRtmpAppendsTheStreamKey($f3)
    {
        $destination = (new GenericRtmp())->prepare([
            'url'        => 'rtmp://a.youtube.com/live2',
            'stream_key' => 'abcd-efgh',
            'label'      => 'yt',
        ]);

        $test = $this->newTest();
        $test->expect('rtmp://a.youtube.com/live2/abcd-efgh' === $destination->url, 'stream key is appended');
        $test->expect('yt' === $destination->label, 'label is preserved');

        return $test->results();
    }

    public function testGenericRtmpRejectsHttp($f3)
    {
        $test = $this->newTest();
        try {
            (new GenericRtmp())->prepare(['url' => 'https://example.com']);
            $test->expect(false, 'HTTP URLs must be rejected');
        } catch (\InvalidArgumentException) {
            $test->expect(true, 'HTTP URLs are rejected');
        }

        return $test->results();
    }

    public function testYouTubeCreatesAndBindsAStream($f3)
    {
        $calls     = [];
        $transport = new class($calls) implements Transport {
            public function __construct(private array &$calls) {}

            public function send(string $method, string $url, array $headers = [], ?string $body = null): array
            {
                $this->calls[] = $url;
                if (str_contains($url, 'liveBroadcasts?')) {
                    return ['status' => 200, 'body' => json_encode(['id' => 'b-1'])];
                }
                if (str_contains($url, 'liveStreams?')) {
                    return ['status' => 200, 'body' => json_encode([
                        'id'  => 's-1',
                        'cdn' => ['ingestionInfo' => [
                            'ingestionAddress' => 'rtmp://a.youtube.com/live2',
                            'streamName'       => 'xxxx-yyyy',
                        ]],
                    ])];
                }

                return ['status' => 200, 'body' => json_encode(['id' => 'b-1'])];
            }
        };

        $destination = (new YouTube($transport))->prepare([
            'access_token' => 'tok',
            'title'        => 'Demo',
        ]);

        $test = $this->newTest();
        $test->expect('rtmp://a.youtube.com/live2/xxxx-yyyy' === $destination->url, 'ingest URL is assembled');
        $test->expect('b-1' === $destination->meta['broadcast_id'], 'broadcast id is stored');
        $test->expect(3 === \count($calls), 'create, stream and bind are called');

        return $test->results();
    }

    public function testRegistryResolvesMixedTargets($f3)
    {
        $registry = new ProviderRegistry(new GenericRtmp());
        $targets  = $registry->resolve([
            ['url' => 'rtmp://mediamtx:1935/live/k1', 'label' => 'sink'],
        ]);

        $test = $this->newTest();
        $test->expect('rtmp://mediamtx:1935/live/k1' === $targets[0]['url'], 'generic RTMP is passed through');
        $test->expect('sink' === $targets[0]['label'], 'label survives resolution');

        return $test->results();
    }
}
