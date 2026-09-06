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

use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class AccessTokenTest extends Scenario
{
    protected $group = 'LiveKit AccessToken';

    private const KEY    = 'APIspoutbreeze';
    private const SECRET = 'a-livekit-api-secret-value';

    public function testMintsAJoinTokenLiveKitCanVerify($f3)
    {
        $jwt   = (new AccessToken(self::KEY, self::SECRET))->forRoom('room-abc', 'viewer-1', 'Amina');
        $parts = explode('.', $jwt);

        $test = $this->newTest();
        $test->expect(3 === \count($parts), 'the token has three JWT segments');

        $header  = $this->decode($parts[0]);
        $payload = $this->decode($parts[1]);

        $test->expect('HS256' === ($header['alg'] ?? null), 'signed with HS256, as LiveKit expects');
        $test->expect('JWT' === ($header['typ'] ?? null), 'typed as a JWT');
        $test->expect(self::KEY === ($payload['iss'] ?? null), 'the API key is the issuer');
        $test->expect('viewer-1' === ($payload['sub'] ?? null), 'the identity is the subject');
        $test->expect('Amina' === ($payload['name'] ?? null), 'the display name is carried');
        $test->expect('room-abc' === ($payload['video']['room'] ?? null), 'the grant names the room');
        $test->expect(true === ($payload['video']['roomJoin'] ?? null), 'the grant allows joining');

        // The signature must verify against the secret, or LiveKit rejects it.
        $expected = rtrim(strtr(base64_encode(
            hash_hmac('sha256', $parts[0] . '.' . $parts[1], self::SECRET, true)
        ), '+/', '-_'), '=');
        $test->expect($expected === $parts[2], 'the signature verifies against the API secret');

        return $test->results();
    }

    public function testViewersListenAndCannotPublish($f3)
    {
        $payload = $this->payload(
            (new AccessToken(self::KEY, self::SECRET))->forRoom('room-abc', 'viewer-1', 'Amina')
        );

        $test = $this->newTest();
        $test->expect(true === ($payload['video']['canSubscribe'] ?? null), 'a viewer may subscribe');
        $test->expect(false === ($payload['video']['canPublish'] ?? null), 'a viewer may not publish audio by default');
        $test->expect(false === ($payload['video']['canPublishData'] ?? null), 'a viewer may not publish data');
        $test->expect(false === ($payload['video']['hidden'] ?? null), 'the viewer is visible in the room, not hidden from moderators');

        return $test->results();
    }

    public function testSpeakingIsGrantedOnlyWhenAsked($f3)
    {
        $payload = $this->payload(
            (new AccessToken(self::KEY, self::SECRET))->forRoom('room-abc', 'viewer-1', 'Amina', true)
        );

        $test = $this->newTest();
        $test->expect(true === ($payload['video']['canPublish'] ?? null), 'speaking is granted when the operator allows it');

        return $test->results();
    }

    public function testTokenExpires($f3)
    {
        $payload = $this->payload(
            (new AccessToken(self::KEY, self::SECRET))->forRoom('room-abc', 'viewer-1', 'Amina', false, 600)
        );

        $test = $this->newTest();
        $now = time();
        $test->expect(($payload['nbf'] ?? 0) <= $now + 1, 'the token is valid from now');
        $test->expect(abs(($payload['exp'] ?? 0) - ($now + 600)) <= 2, 'the token expires after the configured TTL');
        $test->expect(32 === \strlen((string) ($payload['jti'] ?? '')), 'each token carries a unique id');

        return $test->results();
    }

    public function testRefusesIncompleteConfiguration($f3)
    {
        $test = $this->newTest();

        foreach ([['', self::SECRET], [self::KEY, '']] as [$key, $secret]) {
            $thrown = false;

            try {
                new AccessToken($key, $secret);
            } catch (\RuntimeException) {
                $thrown = true;
            }
            $test->expect($thrown, 'incomplete LiveKit credentials are refused');
        }

        $thrown = false;

        try {
            (new AccessToken(self::KEY, self::SECRET))->forRoom('', 'viewer-1', 'Amina');
        } catch (\InvalidArgumentException) {
            $thrown = true;
        }
        $test->expect($thrown, 'a token without a room is refused');

        return $test->results();
    }

    private function payload(string $jwt): array
    {
        return $this->decode(explode('.', $jwt)[1]);
    }

    private function decode(string $segment): array
    {
        $padded = str_pad(strtr($segment, '-_', '+/'), (int) (4 * ceil(\strlen($segment) / 4)), '=');

        return json_decode((string) base64_decode($padded, true), true) ?: [];
    }
}
