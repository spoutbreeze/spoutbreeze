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

use Domain\Broadcasts\BroadcastService;
use Domain\Jobs\MemoryJobStore;
use Sukarix\Messaging\RecordingPublisher;
use Domain\Persistence\MemoryBroadcasts;
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
final class BroadcastServiceTest extends Scenario
{
    protected $group = 'Broadcast service';

    private function service(?RecordingPublisher $publisher = null, ?Transport $transport = null): array
    {
        $publisher ??= new RecordingPublisher();
        $jobs      = new MemoryJobStore();
        $catalogue = new MemoryBroadcasts();
        $service   = new BroadcastService(
            $catalogue,
            $jobs,
            $publisher,
            new ProviderRegistry(new GenericRtmp(), new YouTube($transport ?? new class implements Transport {
                public function send(string $method, string $url, array $headers = [], ?string $body = null): array
                {
                    throw new \RuntimeException('YouTube transport should not be called');
                }
            }))
        );

        return [$service, $publisher, $jobs, $catalogue];
    }

    public function testStartPublishesWithoutAJoinUrl($f3)
    {
        [$service, $publisher] = $this->service();
        $result                = $service->start([
            'meeting_id' => 'm-1',
            'targets'    => [['url' => 'rtmp://mediamtx:1935/live/k1']],
        ]);

        $test = $this->newTest();
        $test->expect($result['broadcast_id'] > 0, 'a broadcast id is allocated');
        $test->expect('pending' === $result['state'], 'job starts pending');
        $test->expect('spoutbreeze_manager' === $publisher->messages[0]['routing_key'], 'start is published on the manager queue');
        $test->expect(!isset($publisher->messages[0]['payload']['join_url']), 'join_url is omitted so the manager builds it');
        $test->expect('m-1' === $publisher->messages[0]['payload']['meeting_id'], 'meeting_id is on the wire');

        return $test->results();
    }

    public function testStopPublishesAReason($f3)
    {
        [$service, $publisher] = $this->service();
        $started               = $service->start([
            'meeting_id' => 'm-1',
            'targets'    => [['url' => 'rtmp://sink/live/k1']],
        ]);
        $service->stop($started['broadcast_id'], 'operator');

        $test = $this->newTest();
        $stop = $publisher->messages[1];
        $test->expect('operator' === $stop['payload']['reason'], 'stop carries a reason');
        $test->expect($started['broadcast_id'] === $stop['payload']['broadcast_id'], 'stop addresses the started broadcast');

        return $test->results();
    }

    public function testStartRequiresATarget($f3)
    {
        [$service] = $this->service();
        $test      = $this->newTest();
        try {
            $service->start(['meeting_id' => 'm-1', 'targets' => []]);
            $test->expect(false, 'empty targets must be rejected');
        } catch (\InvalidArgumentException $e) {
            $test->expect(true, 'empty targets are rejected: ' . $e->getMessage());
        }

        return $test->results();
    }
}
