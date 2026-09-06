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
 * Facebook Live adapter: create a live_video on a page (or profile) through
 * the Graph API and return its RTMPS ingest. Requires a user access token
 * with publish_video and the Page (or user) id; the token comes from the
 * operator console exactly like the YouTube one.
 */
final class Facebook implements Provider
{
    private const GRAPH = 'https://graph.facebook.com/v23.0';

    public function __construct(private Transport $http) {}

    public function name(): string
    {
        return 'facebook';
    }

    public function prepare(array $config): Destination
    {
        $token  = (string) ($config['access_token'] ?? '');
        $target = (string) ($config['target_id'] ?? 'me');
        if ('' === $token) {
            throw new \InvalidArgumentException('A Facebook access token is required');
        }

        $title = (string) ($config['title'] ?? 'SpoutBreeze broadcast');
        $response = $this->api('POST', '/' . $target . '/live_videos', $token, [
            'status'  => 'LIVE_NOW',
            'title'   => $title,
        ]);
        $id = (string) ($response['id'] ?? '');
        if ('' === $id) {
            throw new \RuntimeException('Facebook did not return a live video id');
        }

        // The secure ingest URL arrives on the video object; one follow-up read.
        $video = $this->api('GET', '/' . $id . '?fields=secure_stream_url,stream_url', $token, null);
        $url = (string) ($video['secure_stream_url'] ?? $video['stream_url'] ?? '');
        if ('' === $url) {
            throw new \RuntimeException('Facebook did not return a stream URL');
        }

        return new Destination(
            $this->name(),
            $url,
            (string) ($config['label'] ?? 'facebook'),
            ['live_video_id' => $id, 'title' => $title]
        );
    }

    /**
     * End the live video when the broadcast stops.
     *
     * @param array<string, mixed> $config
     * @param array<string, mixed> $meta
     */
    public function end(array $config, array $meta): void
    {
        $token = (string) ($config['access_token'] ?? '');
        $id    = (string) ($meta['live_video_id'] ?? '');
        if ('' === $token || '' === $id) {
            return;
        }
        $this->api('POST', '/' . $id, $token, ['end_live_video' => 'true']);
    }

    /**
     * @param null|array<string, mixed> $payload
     *
     * @return array<string, mixed>
     */
    private function api(string $method, string $path, string $token, ?array $payload): array
    {
        $url  = self::GRAPH . $path . (str_contains($path, '?') ? '&' : '?') . 'access_token=' . rawurlencode($token);
        $body = null;
        $headers = ['Accept' => 'application/json'];
        if (null !== $payload) {
            $headers['Content-Type'] = 'application/json';
            $body = json_encode($payload, JSON_THROW_ON_ERROR);
        }
        $response = $this->http->send($method, $url, $headers, $body);
        $decoded  = json_decode($response['body'], true);
        if ($response['status'] >= 300 || !\is_array($decoded)) {
            $message = \is_array($decoded)
                ? (string) ($decoded['error']['message'] ?? $response['body'])
                : $response['body'];

            throw new \RuntimeException('Facebook API error (' . $response['status'] . '): ' . $message);
        }

        return $decoded;
    }
}
