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

use Sukarix\Security\SecretBox;
use Sukarix\Configuration\EnvConfig;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class DestinationRepositoryTest extends Scenario
{
    protected $group = 'Streaming Destinations';

    private const KEY = '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef';

    public function testSavedDestinationsResolveIntoTargets($f3)
    {
        $test = $this->newTest();
        $pdo  = $this->pdo();
        if (null === $pdo) {
            $test->expect(true, 'PostgreSQL is not reachable in this environment');

            return $test->results();
        }

        $repository = new DestinationRepository($pdo, SecretBox::fromKeyMaterial(self::KEY));
        $name       = 'statera-' . bin2hex(random_bytes(4));

        $id = $repository->create($name, 'generic_rtmp', 'twitch', [
            'url'        => 'rtmp://live.example/app',
            'stream_key' => 'statera-secret',
        ]);

        $targets = $repository->targetsFor([$id]);
        $test->expect(1 === \count($targets), 'the saved destination resolves to one target');
        $test->expect('statera-secret' === ($targets[0]['stream_key'] ?? null), 'the stream key is unsealed for the broadcast');
        $test->expect('twitch' === ($targets[0]['label'] ?? null), 'the label is carried through');

        // The credential must not be readable from the table itself.
        $stored = $pdo->query('SELECT config::text AS config, secret FROM destinations WHERE id = ' . $id)->fetch();
        $test->expect(!str_contains((string) $stored['config'], 'statera-secret'), 'the plain config column holds no credential');
        $test->expect(!str_contains((string) $stored['secret'], 'statera-secret'), 'the secret column is not plaintext');

        // Listing is what the console renders, so it must stay clean too.
        $listed = json_encode($repository->all());
        $test->expect(!str_contains((string) $listed, 'statera-secret'), 'the console listing never carries the credential');

        $repository->toggle($id);
        $test->expect([] === $repository->targetsFor([$id]), 'a disabled destination resolves to nothing');

        $repository->delete($id);
        $test->expect([] === $repository->targetsFor([$id]), 'a deleted destination resolves to nothing');

        return $test->results();
    }

    public function testInvalidConfigurationsAreRejected($f3)
    {
        $test = $this->newTest();
        $pdo  = $this->pdo();
        if (null === $pdo) {
            $test->expect(true, 'PostgreSQL is not reachable in this environment');

            return $test->results();
        }

        $repository = new DestinationRepository($pdo, SecretBox::fromKeyMaterial(self::KEY));

        foreach ([
            ['', 'generic_rtmp', ['url' => 'rtmp://live.example/app'], 'a blank name is rejected'],
            ['x', 'vimeo', [], 'an unknown provider is rejected'],
            ['x', 'generic_rtmp', ['url' => 'https://live.example'], 'a non-RTMP URL is rejected'],
            ['x', 'youtube', [], 'YouTube without a token is rejected'],
            ['x', 'panopto', ['site' => 'demo.example'], 'incomplete Panopto credentials are rejected'],
        ] as [$name, $provider, $config, $message]) {
            $thrown = false;

            try {
                $repository->create($name, $provider, '', $config);
            } catch (\InvalidArgumentException) {
                $thrown = true;
            }
            $test->expect($thrown, $message);
        }

        return $test->results();
    }

    private function pdo(): ?\PDO
    {
        try {
            return new \PDO(
                EnvConfig::str('APP_DB_DSN', 'pgsql:host=postgres;port=5432;dbname=spoutbreeze_app'),
                EnvConfig::str('APP_DB_USER', 'spoutbreeze_u'),
                EnvConfig::str('APP_DB_PASSWORD', 'spoutbreeze_pass')
            );
        } catch (\Throwable) {
            return null;
        }
    }
}
