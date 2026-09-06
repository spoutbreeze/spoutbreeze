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
 * Agent-side streamer job transitions: the capture agent flips a job to
 * ready once the browser session reached the meeting page, so the streamer
 * never pushes the empty desktop.
 */
class AgentJobs extends ApiAction
{
    /**
     * POST /api/v1/agent/jobs/{token}/ready
     *
     * @param \Base $f3
     * @param array $params
     */
    public function ready($f3, $params): void
    {
        if (!$this->apiAuthorised()) {
            $this->unauthorized('Invalid API key');

            return;
        }

        $store = StreamerJobStore::fromHive($this->f3);
        $job   = $store->get($params['token']);
        if (null === $job) {
            $this->notFound('Unknown streamer job');

            return;
        }

        $job['state'] = 'ready';
        $store->put($params['token'], $job);
        $this->goLiveRemote($job);
        $this->json(['ok' => true, 'state' => 'ready']);
    }

    /**
     * Managed providers transition their remote broadcast to live once the
     * stream actually starts; generic RTMP targets need nothing here.
     */
    private function goLiveRemote(array $job): void
    {
        $ops = StreamerJobStore::fromHive($this->f3, StreamerJobStore::OPS_PREFIX)
            ->get('b' . (string) ($job['broadcast_id'] ?? ''));
        if (null === $ops) {
            return;
        }
        foreach ($ops['targets'] ?? [] as $target) {
            if ('youtube' !== ($target['provider'] ?? '') || empty($target['meta']['broadcast_id'])) {
                continue;
            }
            try {
                (new \Domain\Streaming\YouTube(new \Domain\Streaming\CurlTransport()))
                    ->goLive(['access_token' => (string) ($target['access_token'] ?? '')], $target['meta']);
            } catch (\Throwable $e) {
                // autoStart handles most broadcasts; a failed transition must
                // not block the streamer gate.
            }
        }
    }

    private function apiAuthorised(): bool
    {
        return $this->bearerTokenMatches((string) $this->f3->get('spoutbreeze.api.key'));
    }
}
