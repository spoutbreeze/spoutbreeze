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

namespace Domain\Broadcasts;

use Domain\Jobs\MemoryJobStore;
use Sukarix\Messaging\RecordingPublisher;
use Domain\Persistence\MemoryBroadcasts;
use Domain\Streaming\ProviderRegistry;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class BroadcastServiceTest extends Scenario
{
    protected $group = 'Broadcast service';

    public function testStartPersistsAndPublishesWithoutAJoinUrl($f3)
    {
        $broadcasts = new MemoryBroadcasts();
        $jobs       = new MemoryJobStore();
        $publisher  = new RecordingPublisher();
        $service    = new BroadcastService($broadcasts, $jobs, $publisher, ProviderRegistry::defaults(), new \Domain\Jobs\MemoryJobStore());

        $result = $service->start([
            'meeting_id' => 'm-1',
            'targets'    => [['url' => 'rtmp://mediamtx:1935/live/spoutbreeze']],
        ]);

        $test = $this->newTest();
        $test->expect('m-1' === $result['meeting_id'], 'meeting id is returned');
        $test->expect($result['broadcast_id'] > 0, 'a domain row is inserted');
        $test->expect('pending' === $result['state'], 'job starts pending');
        $test->expect(1 === \count($publisher->messages), 'one command is published');
        $test->expect('spoutbreeze_manager' === $publisher->messages[0]['routing_key'], 'command lands on the manager queue');
        $test->expect(!isset($publisher->messages[0]['payload']['join_url']), 'join_url is omitted so the manager builds it');
        $test->expect('m-1' === $publisher->messages[0]['payload']['meeting_id'], 'meeting_id is on the wire');

        return $test->results();
    }

    public function testStopPublishesAReason($f3)
    {
        $publisher = new RecordingPublisher();
        $service   = new BroadcastService(new MemoryBroadcasts(), new MemoryJobStore(), $publisher, ProviderRegistry::defaults(), new MemoryJobStore());
        $service->stop(7, 'operator');

        $test = $this->newTest();
        $test->expect('operator' === ($publisher->messages[0]['payload']['reason'] ?? ''), 'stop carries a reason');
        $test->expect(7 === ($publisher->messages[0]['payload']['broadcast_id'] ?? 0), 'stop carries the broadcast id');

        return $test->results();
    }

    public function testStartRequiresATarget($f3)
    {
        $service = new BroadcastService(new MemoryBroadcasts(), new MemoryJobStore(), new RecordingPublisher(), ProviderRegistry::defaults(), new MemoryJobStore());
        $thrown  = false;
        try {
            $service->start(['meeting_id' => 'm-1', 'targets' => []]);
        } catch (\InvalidArgumentException) {
            $thrown = true;
        }

        $test = $this->newTest();
        $test->expect($thrown, 'empty targets are rejected');

        return $test->results();
    }
}
