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

namespace Api\Actions\V1;

use Domain\Jobs\StreamerJobStore;
use Sukarix\Actions\ApiAction;

/**
 * Streamer job endpoints: the streamer sidecar fetches its targets once with a
 * one-time job token and reports per-target state through heartbeats.
 */
class StreamerJobs extends ApiAction
{
    /**
     * @param \Base $f3
     * @param array $params
     */
    public function fetch($f3, $params): void
    {
        if (!$this->isJobToken((string) $params['token'])) {
            $this->notFound('Unknown streamer job');

            return;
        }

        $job = $this->store()->get($params['token']);
        if (null === $job) {
            $this->notFound('Unknown streamer job');

            return;
        }

        $this->json($job);
    }

    /**
     * @param \Base $f3
     * @param array $params
     */
    public function heartbeat($f3, $params): void
    {
        if (!$this->isJobToken((string) $params['token'])) {
            $this->notFound('Unknown streamer job');

            return;
        }

        $store = $this->store();
        $job   = $store->get($params['token']);
        if (null === $job) {
            $this->notFound('Unknown streamer job');

            return;
        }

        $body                 = $this->getDecodedBody();
        $job['target_states'] = $body['targets'] ?? ($job['target_states'] ?? []);
        $store->put($params['token'], $job);
        $this->json(['ok' => true]);
    }

    private function store(): StreamerJobStore
    {
        return StreamerJobStore::fromHive($this->f3);
    }

    /**
     * These two routes are open by design — the job token is the streamer's
     * only capability, and the sidecar has no other credential to present.
     * That makes the shape of the token load-bearing: only the 32 hex
     * characters `StreamerJobStore::create()` mints are addressable, so no
     * caller can reach a neighbouring key by guessing a short or structured
     * name.
     */
    private function isJobToken(string $token): bool
    {
        return 1 === preg_match('/^[0-9a-f]{32}$/', $token);
    }
}
