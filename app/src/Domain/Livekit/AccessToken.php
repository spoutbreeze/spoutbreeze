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

namespace Domain\Livekit;

/**
 * A LiveKit access token: a JWT signed with the server's API secret.
 *
 * BigBlueButton 4.0 runs LiveKit as its default audio bridge, so a player
 * viewer can be admitted to the meeting's audio by presenting a token for
 * the same room the meeting uses — no BigBlueButton client, no FreeSWITCH.
 *
 * The grant is deliberately narrow. A viewer subscribes and nothing more
 * unless the operator has enabled speaking for the event: an unlisted
 * participant who can publish audio into a live meeting is a moderation
 * problem, and the default should not create one.
 */
final class AccessToken
{
    /** LiveKit signs with HS256; the API secret is the HMAC key. */
    private const ALGORITHM = 'HS256';

    public function __construct(
        private string $apiKey,
        private string $apiSecret,
    ) {
        if ('' === trim($this->apiKey) || '' === trim($this->apiSecret)) {
            throw new \RuntimeException('LiveKit API credentials are not configured');
        }
    }

    /**
     * @param array<string, mixed> $metadata attached to the participant, visible to the room
     */
    public function forRoom(
        string $room,
        string $identity,
        string $displayName,
        bool $canPublish = false,
        int $ttlSeconds = 14400,
        array $metadata = [],
    ): string {
        if ('' === trim($room)) {
            throw new \InvalidArgumentException('A LiveKit room name is required');
        }
        if ('' === trim($identity)) {
            throw new \InvalidArgumentException('A participant identity is required');
        }

        $now = time();

        return $this->sign([
            'iss'      => $this->apiKey,
            'sub'      => $identity,
            'nbf'      => $now,
            'exp'      => $now + max(60, $ttlSeconds),
            'jti'      => bin2hex(random_bytes(16)),
            'name'     => $displayName,
            'metadata' => json_encode($metadata, JSON_THROW_ON_ERROR),
            'video'    => [
                'room'     => $room,
                'roomJoin' => true,
                // Subscribing is the whole point; publishing is the part that
                // needs a deliberate decision per event.
                'canSubscribe'   => true,
                'canPublish'     => $canPublish,
                'canPublishData' => false,
                // Never hidden: a listener the moderators cannot see in the
                // room is exactly what we are trying not to build.
                'hidden'   => false,
                'recorder' => false,
            ],
        ]);
    }

    /**
     * @param array<string, mixed> $claims
     */
    private function sign(array $claims): string
    {
        $header    = $this->encode(['alg' => self::ALGORITHM, 'typ' => 'JWT']);
        $payload   = $this->encode($claims);
        $signature = hash_hmac('sha256', $header . '.' . $payload, $this->apiSecret, true);

        return $header . '.' . $payload . '.' . $this->base64Url($signature);
    }

    /**
     * @param array<string, mixed> $data
     */
    private function encode(array $data): string
    {
        return $this->base64Url(json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
    }

    private function base64Url(string $raw): string
    {
        return rtrim(strtr(base64_encode($raw), '+/', '-_'), '=');
    }
}
