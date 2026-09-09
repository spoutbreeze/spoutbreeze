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

namespace Domain\Bbb;

use Domain\Streaming\Transport;

/**
 * The slice of the BigBlueButton API the Web Facade needs directly.
 *
 * The JVM services own the meeting lifecycle; this exists so the player's
 * audio endpoint can answer two questions without a round trip through
 * RabbitMQ: is the meeting running, and what is its internal id — which is
 * what BigBlueButton names the LiveKit room after.
 */
final class BbbClient
{
    public function __construct(
        private string $fqdn,
        private string $secret,
        private Transport $http,
        private string $checksumAlgo = 'sha256',
    ) {}

    /**
     * The BigBlueButton API checksum: the digest of the action name, the
     * query string, and the shared secret.
     */
    public function checksum(string $action, string $query): string
    {
        return hash($this->checksumAlgo, $action . $query . $this->secret);
    }

    public function url(string $action, array $params = []): string
    {
        $query = http_build_query($params, '', '&', PHP_QUERY_RFC3986);
        $query .= ('' === $query ? '' : '&') . 'checksum=' . $this->checksum($action, $query);

        return 'https://' . $this->fqdn . '/bigbluebutton/api/' . $action . '?' . $query;
    }

    /**
     * @return array<string, mixed> the parsed getMeetingInfo response
     *
     * @throws \RuntimeException when the meeting is unknown or the call fails
     */
    public function meetingInfo(string $meetingId): array
    {
        $response = $this->http->send('GET', $this->url('getMeetingInfo', ['meetingID' => $meetingId]));
        if ($response['status'] >= 300) {
            throw new \RuntimeException('BigBlueButton returned HTTP ' . $response['status']);
        }

        $xml = @simplexml_load_string($response['body']);
        if (false === $xml) {
            throw new \RuntimeException('BigBlueButton returned an unreadable response');
        }
        if ('SUCCESS' !== (string) ($xml->returncode ?? '')) {
            throw new \RuntimeException((string) ($xml->message ?: 'The meeting is not available'));
        }

        return [
            'meeting_id'          => (string) ($xml->meetingID ?? ''),
            'internal_meeting_id' => (string) ($xml->internalMeetingID ?? ''),
            'running'             => 'true' === (string) ($xml->running ?? 'false'),
            'participant_count'   => (int) ($xml->participantCount ?? 0),
        ];
    }
}
