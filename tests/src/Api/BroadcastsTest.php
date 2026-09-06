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

namespace Api;

use Domain\Broadcasts\BroadcastService;
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
final class BroadcastsTest extends Scenario
{
    protected $group = 'Broadcasts API';

    public function testStartAndStop($f3)
    {
        $publisher = new RecordingPublisher();
        \Api\Actions\V1\Broadcasts::$service = new BroadcastService(
            new MemoryBroadcasts(),
            new MemoryJobStore(),
            $publisher,
            ProviderRegistry::defaults(),
            new MemoryJobStore()
        );

        $f3->set('HEADERS.Authorization', 'Bearer spoutbreeze-dev-api-key');
        $f3->mock('POST /api/v1/broadcasts', [
            'meeting_id' => 'm-api',
            'targets'    => [['url' => 'rtmp://mediamtx:1935/live/k']],
        ]);
        $started = json_decode((string) $f3->get('RESPONSE'), true);

        $test = $this->newTest();
        $test->expect('m-api' === ($started['meeting_id'] ?? null), 'start returns the meeting id');
        $test->expect(!empty($started['token']), 'start returns a job token');

        $f3->mock('POST /api/v1/broadcasts/' . $started['broadcast_id'] . '/stop', ['reason' => 'operator']);
        $stopped = json_decode((string) $f3->get('RESPONSE'), true);
        $test->expect(true === ($stopped['ok'] ?? false), 'stop is acknowledged');
        $test->expect(2 === \count($publisher->messages), 'start and stop were published');

        $f3->set('HEADERS.Authorization', 'Bearer wrong');
        $f3->mock('POST /api/v1/broadcasts', ['meeting_id' => 'm', 'targets' => [['url' => 'rtmp://x/live/k']]]);
        $denied = json_decode((string) $f3->get('RESPONSE'), true);
        $test->expect(false === ($denied['success'] ?? true), 'wrong API key is rejected');

        \Api\Actions\V1\Broadcasts::$service = null;

        return $test->results();
    }

    public function testValidation($f3)
    {
        \Api\Actions\V1\Broadcasts::$service = new BroadcastService(
            new MemoryBroadcasts(),
            new MemoryJobStore(),
            new RecordingPublisher(),
            ProviderRegistry::defaults(),
            new MemoryJobStore()
        );
        $f3->set('HEADERS.Authorization', 'Bearer spoutbreeze-dev-api-key');
        $f3->mock('POST /api/v1/broadcasts', ['meeting_id' => 'm-1', 'targets' => []]);
        $response = json_decode((string) $f3->get('RESPONSE'), true);

        $test = $this->newTest();
        $test->expect(false === ($response['success'] ?? true), 'missing targets returns an error envelope');
        $test->expect(422 === ($response['status'] ?? 0), 'validation uses 422');

        \Api\Actions\V1\Broadcasts::$service = null;

        return $test->results();
    }
}
