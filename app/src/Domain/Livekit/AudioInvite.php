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

use Domain\Bbb\BbbClient;

/**
 * Admits a player viewer to the meeting's audio.
 *
 * BigBlueButton 4.0 carries meeting audio on LiveKit, so a viewer already
 * watching the stream can be moved into the live conversation by handing
 * them a token for the meeting's LiveKit room. They never load the
 * BigBlueButton client; the player opens a LiveKit connection and subscribes
 * to the room's audio.
 *
 * Three gates stand in front of that, because the token is a key to a live
 * meeting's audio:
 *
 *  1. The operator must have enabled audio invitations for the install.
 *  2. The broadcast must actually be live — a token is worthless before the
 *     event and must not be mintable after it.
 *  3. The meeting must be running on BigBlueButton, which is also where the
 *     room name comes from.
 *
 * Speaking is off unless the operator turns it on. A viewer admitted this
 * way is a LiveKit participant rather than a BigBlueButton user, so a
 * moderator cannot mute or eject them from the BigBlueButton interface; a
 * silent listener is a very different risk from an unlisted voice.
 */
final class AudioInvite
{
    public const MODE_LISTEN = 'listen-only';
    public const MODE_SPEAK  = 'speak';

    /** Statuses in which a broadcast is on air. */
    private const LIVE_STATUSES = ['LIVE', 'ASSIGNED'];

    public function __construct(
        private BbbClient $bbb,
        private AccessToken $tokens,
        private string $serverUrl,
        private bool $enabled = false,
        private bool $allowSpeaking = false,
        private int $ttlSeconds = 14400,
    ) {}

    /**
     * @param array<string, mixed> $broadcast the broadcast row for this meeting
     *
     * @return array{url: string, token: string, room: string, identity: string, mode: string, expires_in: int}
     *
     * @throws \RuntimeException when any gate refuses
     */
    public function admit(array $broadcast, string $displayName): array
    {
        if (!$this->enabled) {
            throw new \RuntimeException('Audio invitations are not enabled on this server');
        }

        $status = strtoupper((string) ($broadcast['status'] ?? ''));
        if (!\in_array($status, self::LIVE_STATUSES, true)) {
            throw new \RuntimeException('This broadcast is not live');
        }

        $meetingId = (string) ($broadcast['meeting_id'] ?? '');
        $info      = $this->bbb->meetingInfo($meetingId);
        if (!$info['running']) {
            throw new \RuntimeException('The meeting has not started yet');
        }

        // BigBlueButton names the LiveKit room after the internal meeting id,
        // which changes every time a meeting restarts — so it is read live
        // rather than cached against the broadcast row.
        $room = (string) $info['internal_meeting_id'];
        if ('' === $room) {
            throw new \RuntimeException('BigBlueButton did not return an internal meeting id');
        }

        $name     = $this->cleanName($displayName);
        $identity = 'spoutbreeze-player-' . bin2hex(random_bytes(8));
        $mode     = $this->allowSpeaking ? self::MODE_SPEAK : self::MODE_LISTEN;

        return [
            'url'   => $this->serverUrl,
            'token' => $this->tokens->forRoom(
                $room,
                $identity,
                $name,
                $this->allowSpeaking,
                $this->ttlSeconds,
                // Marks the participant for moderators and for anything
                // reading the room roster: this is a watch-page listener,
                // not a BigBlueButton user.
                ['source' => 'spoutbreeze-player', 'mode' => $mode, 'meeting_id' => $meetingId]
            ),
            'room'       => $room,
            'identity'   => $identity,
            'mode'       => $mode,
            'expires_in' => $this->ttlSeconds,
        ];
    }

    /**
     * Viewers type this and it is shown to everyone in the meeting.
     */
    private function cleanName(string $displayName): string
    {
        $name = preg_replace('/[\x00-\x1F\x7F]/u', '', trim($displayName)) ?? '';
        $name = mb_substr($name, 0, 64);

        return '' === $name ? 'Viewer' : $name;
    }
}
