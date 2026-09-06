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

use Sukarix\Actions\ApiAction;
use Domain\Bbb\BbbClient;
use Domain\Livekit\AccessToken;
use Domain\Livekit\AudioInvite;
use Domain\Persistence\DomainDb;
use Domain\Streaming\CurlTransport;

/**
 * The player's audio-join endpoint.
 *
 * Anonymous by design — a watch page viewer has no account — so the gates
 * live in {@see AudioInvite} and the answer is worth no more than a seat in
 * a meeting that is on air right now.
 */
class PlayerAudio extends ApiAction
{
    public static ?AudioInvite $invite = null;

    /**
     * GET /api/v1/player/audio/{meeting} — is the invitation on offer?
     *
     * The watch page asks this on load so it can show the invitation only
     * when joining would actually work.
     *
     * @param \Base $f3
     * @param array $params
     */
    public function status($f3, $params): void
    {
        $broadcast = $this->liveBroadcast($f3, (string) $params['meeting']);

        $this->json([
            'available' => null !== $broadcast && (bool) $f3->get('spoutbreeze.livekit.audio_invite'),
            'mode'      => $f3->get('spoutbreeze.livekit.allow_speaking') ? AudioInvite::MODE_SPEAK : AudioInvite::MODE_LISTEN,
        ]);
    }

    /**
     * POST /api/v1/player/audio/{meeting} — mint a LiveKit token.
     *
     * @param \Base $f3
     * @param array $params
     */
    public function token($f3, $params): void
    {
        $meetingId = (string) $params['meeting'];
        $broadcast = $this->liveBroadcast($f3, $meetingId);
        if (null === $broadcast) {
            $this->notFound('No live broadcast for this meeting');

            return;
        }

        // Checked before anything is constructed: with invitations off, the
        // answer is "the feature is not enabled", not a complaint about
        // LiveKit credentials the operator was never asked to set.
        if (!$f3->get('spoutbreeze.livekit.audio_invite')) {
            $this->error('Audio invitations are not enabled on this server', 409);

            return;
        }

        try {
            $body = $this->getDecodedBody();
        } catch (\Throwable) {
            $body = [];
        }

        try {
            $this->json($this->invite($f3, $broadcast)->admit($broadcast, (string) ($body['name'] ?? '')));
        } catch (\RuntimeException $e) {
            // Every gate in AudioInvite refuses with a reason a viewer can act
            // on ("not live yet", "not started"), so it is worth returning.
            $this->error($e->getMessage(), 409);
        } catch (\Throwable $e) {
            $this->error('Audio is unavailable right now', 503);
        }
    }

    /**
     * @return null|array<string, mixed>
     */
    private function liveBroadcast(\Base $f3, string $meetingId): ?array
    {
        if ('' === trim($meetingId)) {
            return null;
        }

        try {
            foreach (DomainDb::fromEnv()->all() as $row) {
                if ((string) $row['meeting_id'] === $meetingId) {
                    return $row;
                }
            }
        } catch (\Throwable) {
            return null;
        }

        return null;
    }

    /**
     * @param array<string, mixed> $broadcast
     */
    private function invite(\Base $f3, array $broadcast): AudioInvite
    {
        if (null !== self::$invite) {
            return self::$invite;
        }

        $server = $this->server($f3, (int) ($broadcast['server_id'] ?? 0));

        return new AudioInvite(
            new BbbClient(
                $server['fqdn'],
                $server['shared_secret'],
                new CurlTransport(),
                (string) ($f3->get('spoutbreeze.bbb.checksum_algo') ?: 'sha256')
            ),
            new AccessToken(
                (string) $f3->get('spoutbreeze.livekit.key'),
                (string) $f3->get('spoutbreeze.livekit.secret')
            ),
            (string) $f3->get('spoutbreeze.livekit.url'),
            (bool) $f3->get('spoutbreeze.livekit.audio_invite'),
            (bool) $f3->get('spoutbreeze.livekit.allow_speaking'),
            (int) ($f3->get('spoutbreeze.livekit.ttl') ?: 14400)
        );
    }

    /**
     * @return array{fqdn: string, shared_secret: string}
     */
    private function server(\Base $f3, int $serverId): array
    {
        $pdo = new \PDO(
            (string) $f3->get('spoutbreeze.domain.db.dsn'),
            (string) $f3->get('spoutbreeze.domain.db.username'),
            (string) $f3->get('spoutbreeze.domain.db.password'),
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]
        );
        $statement = $pdo->prepare('SELECT fqdn, shared_secret FROM servers WHERE id = ?');
        $statement->execute([$serverId]);
        $row = $statement->fetch();
        if (!\is_array($row)) {
            throw new \RuntimeException('The broadcast server is not registered');
        }

        return $row;
    }
}
