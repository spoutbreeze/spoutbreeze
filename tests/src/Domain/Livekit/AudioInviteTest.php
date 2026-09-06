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

namespace Domain\Livekit;

use Domain\Bbb\BbbClient;
use Domain\Streaming\Transport;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class AudioInviteTest extends Scenario
{
    protected $group = 'LiveKit AudioInvite';

    private const INTERNAL = '183f0bf3a0982a127bdb8161e0c44eb696b3e75c-1757000000000';

    public function testAdmitsAViewerToALiveMeeting($f3)
    {
        $grant = $this->invite(true)->admit($this->broadcast('LIVE'), 'Amina');

        $test = $this->newTest();
        $test->expect(self::INTERNAL === $grant['room'], 'the LiveKit room is the internal meeting id');
        $test->expect('wss://bbb.example/livekit' === $grant['url'], 'the viewer is pointed at the LiveKit server');
        $test->expect(AudioInvite::MODE_LISTEN === $grant['mode'], 'listen-only unless speaking is enabled');
        $test->expect(str_starts_with($grant['identity'], 'spoutbreeze-player-'), 'the identity marks a player viewer');
        $test->expect('' !== $grant['token'], 'a token is issued');

        return $test->results();
    }

    public function testRefusesWhenInvitationsAreDisabled($f3)
    {
        $test = $this->newTest();
        $test->expect(
            'Audio invitations are not enabled on this server' === $this->refusal($this->invite(false), 'LIVE'),
            'the feature is off by default and refuses'
        );

        return $test->results();
    }

    public function testRefusesWhenTheBroadcastIsNotLive($f3)
    {
        $test = $this->newTest();

        foreach (['READY', 'ENDED', 'FAILED'] as $status) {
            $test->expect(
                'This broadcast is not live' === $this->refusal($this->invite(true), $status),
                'a ' . $status . ' broadcast admits nobody'
            );
        }

        return $test->results();
    }

    public function testRefusesWhenTheMeetingHasNotStarted($f3)
    {
        $invite = $this->invite(true, false, running: false);

        $test = $this->newTest();
        $test->expect(
            'The meeting has not started yet' === $this->refusal($invite, 'LIVE'),
            'a meeting that is not running admits nobody'
        );

        return $test->results();
    }

    public function testSpeakingIsCarriedIntoTheGrant($f3)
    {
        $grant = $this->invite(true, true)->admit($this->broadcast('LIVE'), 'Amina');

        $test = $this->newTest();
        $test->expect(AudioInvite::MODE_SPEAK === $grant['mode'], 'the grant reports the speaking mode');

        return $test->results();
    }

    public function testDisplayNamesAreCleaned($f3)
    {
        $invite = $this->invite(true);

        $test = $this->newTest();
        $test->expect(
            'Viewer' === $this->nameIn($invite->admit($this->broadcast('LIVE'), '   ')),
            'a blank name falls back to Viewer'
        );
        $test->expect(
            64 === mb_strlen($this->nameIn($invite->admit($this->broadcast('LIVE'), str_repeat('a', 200)))),
            'an overlong name is truncated'
        );
        $test->expect(
            !str_contains($this->nameIn($invite->admit($this->broadcast('LIVE'), "Am\x00ina\x1B")), "\x00"),
            'control characters are stripped from the name shown to the room'
        );

        return $test->results();
    }

    private function nameIn(array $grant): string
    {
        $segment = explode('.', $grant['token'])[1];
        $padded  = str_pad(strtr($segment, '-_', '+/'), (int) (4 * ceil(\strlen($segment) / 4)), '=');
        $payload = json_decode((string) base64_decode($padded, true), true) ?: [];

        return (string) ($payload['name'] ?? '');
    }

    private function refusal(AudioInvite $invite, string $status): string
    {
        try {
            $invite->admit($this->broadcast($status), 'Amina');
        } catch (\RuntimeException $e) {
            return $e->getMessage();
        }

        return '(no refusal)';
    }

    private function broadcast(string $status): array
    {
        return ['meeting_id' => 'sb-test-meeting', 'status' => $status, 'server_id' => 1];
    }

    private function invite(bool $enabled, bool $speaking = false, bool $running = true): AudioInvite
    {
        return new AudioInvite(
            new BbbClient('bbb.example', 'secret', $this->bbb($running)),
            new AccessToken('APIkey', 'a-livekit-api-secret-value'),
            'wss://bbb.example/livekit',
            $enabled,
            $speaking
        );
    }

    private function bbb(bool $running): Transport
    {
        return new class($running) implements Transport {
            public function __construct(private bool $running) {}

            public function send(string $method, string $url, array $headers = [], ?string $body = null): array
            {
                return ['status' => 200, 'body' => '<response>'
                    . '<returncode>SUCCESS</returncode>'
                    . '<meetingID>sb-test-meeting</meetingID>'
                    . '<internalMeetingID>' . AudioInviteTest::internalId() . '</internalMeetingID>'
                    . '<running>' . ($this->running ? 'true' : 'false') . '</running>'
                    . '<participantCount>3</participantCount>'
                    . '</response>'];
            }
        };
    }

    public static function internalId(): string
    {
        return self::INTERNAL;
    }
}
