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

namespace Domain\Streaming;


/**
 * YouTube Live Streaming API adapter: create a broadcast and stream, bind
 * them, and return the RTMP ingest URL. OAuth access tokens are supplied
 * by the caller (Redis-backed console storage is fine for M1).
 */
final class YouTube implements Provider
{
    private const API = 'https://www.googleapis.com/youtube/v3';

    public function __construct(private Transport $http) {}

    public function name(): string
    {
        return 'youtube';
    }

    public function prepare(array $config): Destination
    {
        $token = (string) ($config['access_token'] ?? \Base::instance()->get('spoutbreeze.youtube.access_token'));
        if ('' === $token) {
            throw new \InvalidArgumentException('A YouTube access token is required');
        }

        $title   = (string) ($config['title'] ?? 'SpoutBreeze broadcast');
        $privacy = (string) ($config['privacy'] ?? 'unlisted');
        $start   = gmdate('Y-m-d\TH:i:s\Z');

        $broadcast = $this->api('POST', '/liveBroadcasts?part=snippet,status,contentDetails', $token, [
            'snippet'        => [
                'title'              => $title,
                'scheduledStartTime' => $start,
            ],
            'status'         => ['privacyStatus' => $privacy],
            'contentDetails' => [
                'enableAutoStart' => true,
                'enableAutoStop'  => true,
            ],
        ]);
        $broadcastId = (string) ($broadcast['id'] ?? '');
        if ('' === $broadcastId) {
            throw new \RuntimeException('YouTube did not return a broadcast id');
        }

        $stream = $this->api('POST', '/liveStreams?part=snippet,cdn', $token, [
            'snippet' => ['title' => $title],
            'cdn'     => [
                'frameRate'     => '30fps',
                'ingestionType' => 'rtmp',
                'resolution'    => '1080p',
            ],
        ]);
        $streamId = (string) ($stream['id'] ?? '');
        $info     = $stream['cdn']['ingestionInfo'] ?? [];
        $address  = rtrim((string) ($info['ingestionAddress'] ?? ''), '/');
        $name     = (string) ($info['streamName'] ?? '');
        if ('' === $address || '' === $name) {
            throw new \RuntimeException('YouTube did not return an ingest URL');
        }

        $this->api(
            'POST',
            '/liveBroadcasts/bind?id=' . rawurlencode($broadcastId)
            . '&streamId=' . rawurlencode($streamId) . '&part=id,contentDetails,status',
            $token,
            null
        );

        return new Destination(
            $this->name(),
            $address . '/' . $name,
            (string) ($config['label'] ?? 'youtube'),
            [
                'broadcast_id' => $broadcastId,
                'stream_id'    => $streamId,
                'title'        => $title,
            ]
        );
    }

    /**
     * Move the bound broadcast to the live state once the streamer is
     * pushing (called after the page-ready gate flips the job to ready).
     *
     * @param array<string, mixed> $config provider config with access_token
     * @param array<string, mixed> $meta   destination meta from prepare()
     */
    public function goLive(array $config, array $meta): void
    {
        $token      = (string) ($config['access_token'] ?? '');
        $broadcastId = (string) ($meta['broadcast_id'] ?? '');
        if ('' === $token || '' === $broadcastId) {
            return;
        }
        $this->api('POST', '/liveBroadcasts/transition?broadcastStatus=live&id=' . rawurlencode($broadcastId) . '&part=id,status', $token, null);
    }

    /**
     * Complete the broadcast when the operator or the meeting stops it.
     *
     * @param array<string, mixed> $config provider config with access_token
     * @param array<string, mixed> $meta   destination meta from prepare()
     */
    public function end(array $config, array $meta): void
    {
        $token      = (string) ($config['access_token'] ?? '');
        $broadcastId = (string) ($meta['broadcast_id'] ?? '');
        if ('' === $token || '' === $broadcastId) {
            return;
        }
        $this->api('POST', '/liveBroadcasts/transition?broadcastStatus=complete&id=' . rawurlencode($broadcastId) . '&part=id,status', $token, null);
    }

    /**
     * @param null|array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    private function api(string $method, string $path, string $token, ?array $payload): array
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $body = null;
        if (null !== $payload) {
            $headers['Content-Type'] = 'application/json';
            $body                    = json_encode($payload, JSON_THROW_ON_ERROR);
        }
        $response = $this->http->send($method, self::API . $path, $headers, $body);
        $decoded  = json_decode($response['body'], true);
        if ($response['status'] >= 300 || !\is_array($decoded)) {
            $message = \is_array($decoded) ? (string) ($decoded['error']['message'] ?? $response['body']) : $response['body'];

            throw new \RuntimeException('YouTube API error (' . $response['status'] . '): ' . $message);
        }

        return $decoded;
    }
}
