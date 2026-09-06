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

use Domain\Broadcasts\BroadcastService;
use Sukarix\Actions\ApiAction;

/**
 * Broadcast lifecycle endpoints for machine callers.
 */
class Broadcasts extends ApiAction
{
    public static ?BroadcastService $service = null;

    /**
     * POST /api/v1/broadcasts — request a broadcast. Join URL is optional;
     * meeting_id plus the servers registry is enough for the manager to
     * build a bot join against BigBlueButton 4.0.
     *
     * @param \Base $f3
     */
    public function start($f3): void
    {
        if (!$this->apiAuthorised()) {
            $this->unauthorized('Invalid API key');

            return;
        }

        try {
            $body   = $this->getDecodedBody();
            $result = $this->service($f3)->start($body);
        } catch (\JsonException) {
            $this->error('JSON body is required', 422);

            return;
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage(), 422);

            return;
        } catch (\Throwable $e) {
            $this->error($e->getMessage(), 500);

            return;
        }

        $this->json($result);
    }

    /**
     * POST /api/v1/broadcasts/@id/stop
     *
     * @param \Base $f3
     * @param array $params
     */
    public function stop($f3, $params): void
    {
        if (!$this->apiAuthorised()) {
            $this->unauthorized('Invalid API key');

            return;
        }

        try {
            $this->service($f3)->stop((int) $params['id'], (string) ($this->optionalReason() ?: 'operator'));
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage(), 422);

            return;
        } catch (\Throwable $e) {
            $this->error($e->getMessage(), 500);

            return;
        }

        $this->json(['ok' => true, 'state' => 'stopping']);
    }

    /**
     * @param \Base $f3
     * @param array $params
     */
    public function jobStatus($f3, $params): void
    {
        if (!$this->apiAuthorised()) {
            $this->unauthorized('Invalid API key');

            return;
        }

        $job = $this->service($f3)->job($params['token']);
        if (null === $job) {
            $this->notFound('Unknown streamer job');

            return;
        }

        $this->json($job);
    }

    private function service(\Base $f3): BroadcastService
    {
        return self::$service ?? BroadcastService::fromEnv($f3);
    }

    private function optionalReason(): string
    {
        $body = [];
        try {
            $body = $this->getDecodedBody();
        } catch (\Throwable) {
        }

        return (string) ($body['reason'] ?? '');
    }

    private function apiAuthorised(): bool
    {
        return $this->bearerTokenMatches((string) $this->f3->get('spoutbreeze.api.key'));
    }
}
