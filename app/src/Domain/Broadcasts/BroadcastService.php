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

namespace Domain\Broadcasts;

use Domain\Jobs\JobStore;
use Domain\Jobs\StreamerJobStore;
use Domain\Messaging\AmqpPublisher;
use Domain\Persistence\BroadcastCatalogue;
use Domain\Persistence\DomainDb;
use Domain\Security\SecretBox;
use Domain\Streaming\DestinationRepository;
use Domain\Streaming\ProviderRegistry;
use Sukarix\Messaging\CommandPublisher;

/**
 * Starts and stops broadcasts: persist a domain row, stash the streamer
 * job, publish on the manager queue. Join URLs are optional; the manager
 * builds a bot join against the servers registry when meeting_id is set.
 */
final class BroadcastService
{
    public function __construct(
        private BroadcastCatalogue $broadcasts,
        private JobStore $jobs,
        private CommandPublisher $publisher,
        private ProviderRegistry $providers,
        private JobStore $providerOps,
        private ?DestinationRepository $destinations = null,
    ) {}

    public static function fromEnv(\Base $f3): self
    {
        return new self(
            DomainDb::fromEnv(),
            StreamerJobStore::fromHive($f3),
            AmqpPublisher::fromHive($f3),
            ProviderRegistry::defaults(),
            StreamerJobStore::fromHive($f3, StreamerJobStore::OPS_PREFIX),
            self::destinations($f3)
        );
    }

    /**
     * The destination registry is optional: an install that has not set a
     * secret key can still stream to an ad-hoc RTMP target, it just cannot
     * save one.
     */
    public static function destinations(\Base $f3): ?DestinationRepository
    {
        try {
            return new DestinationRepository(
                new \PDO(
                    (string) $f3->get('spoutbreeze.db.dsn'),
                    (string) $f3->get('spoutbreeze.db.username'),
                    (string) $f3->get('spoutbreeze.db.password')
                ),
                SecretBox::fromHive($f3)
            );
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * @param array<string, mixed> $input
     *
     * @return array<string, mixed>
     */
    public function start(array $input): array
    {
        $joinUrl   = trim((string) ($input['join_url'] ?? ''));
        $meetingId = trim((string) ($input['meeting_id'] ?? ''));
        $profile   = (string) ($input['profile'] ?? '1080p30');
        $raw       = $input['targets'] ?? [];
        $raw       = \is_array($raw) ? array_values($raw) : [];

        // Saved destinations are expanded into ordinary target rows, so a
        // broadcast may mix stored ones with an ad-hoc RTMP URL.
        $selected = $input['destination_ids'] ?? [];
        if (\is_array($selected) && [] !== $selected) {
            if (null === $this->destinations) {
                throw new \RuntimeException('Saved destinations are unavailable; set ' . SecretBox::HIVE_KEY);
            }
            $raw = array_merge($this->destinations->targetsFor($selected), $raw);
        }

        if ([] === $raw) {
            throw new \InvalidArgumentException('At least one target is required');
        }
        if ('' === $joinUrl && '' === $meetingId) {
            throw new \InvalidArgumentException('meeting_id or join_url is required');
        }

        $opsTargets = [];
        $targets    = $this->providers->resolve($raw, $opsTargets);
        if ([] === $targets) {
            throw new \InvalidArgumentException('At least one target is required');
        }
        if ('' === $meetingId) {
            $meetingId = 'sb-' . bin2hex(random_bytes(8));
        }

        $serverId   = isset($input['server_id']) ? (int) $input['server_id'] : $this->broadcasts->firstServerId();
        $endpointId = $this->broadcasts->firstEndpointId();
        if (null === $serverId || null === $endpointId) {
            throw new \RuntimeException('No BigBlueButton server or streaming endpoint is registered');
        }

        $broadcastId = $this->broadcasts->upsert([
            'meeting_id'  => $meetingId,
            'server_id'   => $serverId,
            'endpoint_id' => $endpointId,
            'session_id' => 'none',
            'status'      => 'READY',
        ]);

        // Provider operations data (tokens, remote broadcast ids) lives in a
        // separate store the streamer job endpoint never exposes, keyed by
        // broadcast id so stop() can find it without a listing.
        $this->providerOps->put('b' . $broadcastId, [
            'broadcast_id' => $broadcastId,
            'targets'      => $opsTargets,
        ]);

        $token = $this->jobs->create([
            'state'        => 'pending',
            'profile'      => $profile,
            'targets'      => $targets,
            'broadcast_id' => $broadcastId,
            'meeting_id'   => $meetingId,
        ]);

        $payload = [
            'v'            => 1,
            'broadcast_id' => $broadcastId,
            'targets_ref'  => $token,
            'profile'      => $profile,
            'meeting_id'   => $meetingId,
            'server_id'    => $serverId,
        ];
        if ('' !== $joinUrl) {
            $payload['join_url'] = $joinUrl;
        }

        try {
            $this->publisher->publish('spoutbreeze_manager', $payload);
        } catch (\Throwable $e) {
            // A failed publish must not leave a READY row (the scheduled
            // assigner on the manager would place it anyway) nor a pending
            // job the streamer could later pick up.
            $this->broadcasts->updateStatus($broadcastId, 'FAILED');
            $failed                 = $this->jobs->get($token) ?? [];
            $failed['state']        = 'failed';
            $failed['failure']      = $e->getMessage();
            $this->jobs->put($token, $failed);

            throw new \RuntimeException('Cannot reach the message bus: ' . $e->getMessage(), 0, $e);
        }

        return [
            'token'        => $token,
            'broadcast_id' => $broadcastId,
            'meeting_id'   => $meetingId,
            'state'        => 'pending',
        ];
    }

    public function stop(int $broadcastId, string $reason = 'operator'): void
    {
        if ($broadcastId < 1) {
            throw new \InvalidArgumentException('broadcast_id is required');
        }

        // Complete remote broadcasts before the stop command goes out.
        $this->endRemoteBroadcasts($broadcastId);

        $this->publisher->publish('spoutbreeze_manager', [
            'v'            => 1,
            'broadcast_id' => $broadcastId,
            'reason'       => $reason,
        ]);
    }

    /**
     * Tell each managed provider that the broadcast is over: YouTube and
     * Facebook complete the remote broadcast, Panopto converts the webcast
     * to an on-demand session.
     *
     * Dispatch is per provider rather than gated on an access token —
     * Panopto authenticates with a site user and password, so a shared
     * "skip targets without a token" guard silently disabled it.
     */
    private function endRemoteBroadcasts(int $broadcastId): void
    {
        $ops = $this->providerOps->get('b' . $broadcastId);
        if (null === $ops) {
            return;
        }
        foreach ($ops['targets'] ?? [] as $target) {
            $provider = (string) ($target['provider'] ?? '');
            $token    = (string) ($target['access_token'] ?? '');
            $meta     = \is_array($target['meta'] ?? null) ? $target['meta'] : [];
            $config   = \is_array($target['config'] ?? null) ? $target['config'] : [];

            try {
                switch ($provider) {
                    case 'youtube':
                        if ('' !== $token && isset($meta['broadcast_id'])) {
                            (new \Domain\Streaming\YouTube(new \Domain\Streaming\CurlTransport()))
                                ->end(['access_token' => $token], $meta);
                        }

                        break;

                    case 'facebook':
                        if ('' !== $token && isset($meta['live_video_id'])) {
                            (new \Domain\Streaming\Facebook(new \Domain\Streaming\CurlTransport()))
                                ->end(['access_token' => $token], $meta);
                        }

                        break;

                    case 'panopto':
                        if (isset($meta['session_id'])) {
                            (new \Domain\Streaming\Panopto())->convertToOnDemand($config, $meta);
                        }

                        break;
                }
            } catch (\Throwable) {
                // Stopping the stream must not fail because the platform
                // already completed the broadcast.
            }
        }
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function list(): array
    {
        return $this->broadcasts->all();
    }

    /**
     * @return null|array<string, mixed>
     */
    public function job(string $token): ?array
    {
        return $this->jobs->get($token);
    }
}
