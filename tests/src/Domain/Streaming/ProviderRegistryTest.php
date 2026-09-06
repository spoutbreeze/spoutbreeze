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
final class ProviderRegistryTest extends Scenario
{
    protected $group = 'Streaming ProviderRegistry';

    /**
     * The streamer fetches its targets with nothing but a job token, so the
     * row it receives must not carry anything that authenticates to a
     * platform. This pins the separation shut: the registry used to build
     * the ops row and hand the very same array to the streamer.
     */
    public function testStreamerTargetsCarryNoCredentials($f3)
    {
        $ops     = [];
        $targets = (new ProviderRegistry(new GenericRtmp()))->resolve([
            [
                'provider'     => 'generic_rtmp',
                'url'          => 'rtmp://live.example/app',
                'stream_key'   => 'super-secret-key',
                'access_token' => 'ya29.should-never-be-served',
                'label'        => 'twitch',
            ],
        ], $ops);

        $encoded = json_encode($targets);
        $test    = $this->newTest();

        $test->expect(!str_contains($encoded, 'ya29.should-never-be-served'), 'no access token reaches the streamer job');
        $test->expect(!str_contains($encoded, '"stream_key"'), 'no stream key field reaches the streamer job');
        $test->expect(!isset($targets[0]['access_token']), 'the streamer row has no access_token key at all');
        $test->expect(
            'rtmp://live.example/app/super-secret-key' === $targets[0]['url'],
            'the assembled ingest URL still reaches the streamer'
        );

        return $test->results();
    }

    public function testOperationRowsKeepTheCredentials($f3)
    {
        $ops = [];
        (new ProviderRegistry(new GenericRtmp()))->resolve([
            [
                'provider'     => 'generic_rtmp',
                'url'          => 'rtmp://live.example/app',
                'access_token' => 'ya29.token',
                'label'        => 'twitch',
            ],
        ], $ops);

        $test = $this->newTest();
        $test->expect('ya29.token' === ($ops[0]['access_token'] ?? null), 'stop() can still reach the access token');
        $test->expect(
            'rtmp://live.example/app' === ($ops[0]['config']['url'] ?? null),
            'the provider configuration is kept for the stop callbacks'
        );

        return $test->results();
    }

    public function testUnknownProvidersAreRejected($f3)
    {
        $thrown = false;

        try {
            (new ProviderRegistry(new GenericRtmp()))->resolve([['provider' => 'vimeo']]);
        } catch (\InvalidArgumentException) {
            $thrown = true;
        }

        $test = $this->newTest();
        $test->expect($thrown, 'an unknown provider is rejected');

        return $test->results();
    }
}
