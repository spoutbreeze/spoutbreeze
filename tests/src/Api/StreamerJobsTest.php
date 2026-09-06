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

use Domain\Jobs\StreamerJobStore;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class StreamerJobsTest extends Scenario
{
    protected $group = 'Streamer Jobs API';

    private const TOKEN = 'aaaaaaaabbbbbbbbccccccccdddddddd';
    private const KEY   = StreamerJobStore::PREFIX . self::TOKEN;

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testJobLifecycle($f3)
    {
        $test  = $this->newTest();
        if (!class_exists(\Redis::class)) {
            $test->expect(true, 'Redis extension is not loaded in this environment');

            return $test->results();
        }
        $redis = new \Redis();
        try {
            $redis->connect(\getenv('REDIS_HOST') ?: 'redis', 6379, 1.0);
        } catch (\Throwable) {
            $test->expect(true, 'Redis is not reachable in this environment');

            return $test->results();
        }
        $redis->setex(self::KEY, 300, json_encode([
            'state'    => 'ready',
            'profile'  => '1080p30',
            'targets'  => [['url' => 'rtmp://sink/live/k1']],
        ]));

        $f3->mock('GET /api/v1/streamer/jobs/' . self::TOKEN);
        $response = json_decode((string) $f3->get('RESPONSE'), true);
        $test->expect('ready' === ($response['state'] ?? null), 'Ready job is returned');
        $test->expect('1080p30' === ($response['profile'] ?? null), 'Profile is returned');

        $f3->mock('POST /api/v1/streamer/jobs/' . self::TOKEN . '/heartbeat', [
            'targets' => [['label' => 'twitch', 'state' => 'connected']],
        ]);
        $test->expect(['ok' => true] === json_decode((string) $f3->get('RESPONSE'), true), 'Heartbeat acknowledged');

        $f3->mock('GET /api/v1/streamer/jobs/' . self::TOKEN);
        $response = json_decode((string) $f3->get('RESPONSE'), true);
        $test->expect('connected' === ($response['target_states'][0]['state'] ?? null), 'Heartbeat state is persisted');

        $f3->mock('GET /api/v1/streamer/jobs/ffffffff11111111222222223333cccc');
        $response = json_decode((string) $f3->get('RESPONSE'), true);
        $test->expect(false === ($response['success'] ?? true), 'Unknown job returns the error envelope');

        // These routes are open by design, so only well-formed job tokens may
        // address a key. Provider operation rows live at names like `b4`, and
        // reaching one from here used to hand out live stream keys.
        $redis->setex(StreamerJobStore::OPS_PREFIX . 'b4', 60, json_encode(['targets' => [['access_token' => 'leaked']]]));
        $redis->setex(StreamerJobStore::PREFIX . 'b4', 60, json_encode(['state' => 'ready']));
        foreach (['b4', 'statera-token', 'AAAAAAAABBBBBBBBCCCCCCCCDDDDDDDD'] as $probe) {
            $f3->mock('GET /api/v1/streamer/jobs/' . $probe);
            $response = json_decode((string) $f3->get('RESPONSE'), true);
            $test->expect(false === ($response['success'] ?? true), 'A non-job token (' . $probe . ') is refused');
        }
        $redis->del(StreamerJobStore::OPS_PREFIX . 'b4');
        $redis->del(StreamerJobStore::PREFIX . 'b4');

        $redis->del(self::KEY);

        return $test->results();
    }

    /**
     * The readiness probe gates the container in any orchestrator, so a
     * probe that can never report ready is as bad as a down service. It
     * compared phpredis' PING against the string 'PONG' while the extension
     * returns true.
     */
    public function testReadinessReportsReadyWhenRedisAnswers($f3)
    {
        $test = $this->newTest();

        $f3->mock('GET /readyz');
        $response = json_decode((string) $f3->get('RESPONSE'), true);

        if (!\is_array($response) || !\array_key_exists('redis', $response['checks'] ?? [])) {
            $test->expect(true, 'Redis is not configured in this environment');

            return $test->results();
        }

        $test->expect(true === $response['checks']['redis'], 'a reachable Redis reports healthy');
        $test->expect('ok' === ($response['status'] ?? null), 'the probe reports ready');

        return $test->results();
    }
}
