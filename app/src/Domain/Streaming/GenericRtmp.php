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
 * Any RTMP/RTMPS URL, optionally with a separate stream key appended.
 */
final class GenericRtmp implements Provider
{
    public function name(): string
    {
        return 'generic_rtmp';
    }

    public function prepare(array $config): Destination
    {
        $url = trim((string) ($config['url'] ?? ''));
        if ('' === $url) {
            throw new \InvalidArgumentException('An RTMP URL is required');
        }
        if (!str_starts_with($url, 'rtmp://') && !str_starts_with($url, 'rtmps://')) {
            throw new \InvalidArgumentException('The target must be an RTMP or RTMPS URL');
        }
        $key = trim((string) ($config['stream_key'] ?? $config['key'] ?? ''));
        if ('' !== $key) {
            $url = rtrim($url, '/') . '/' . ltrim($key, '/');
        }

        return new Destination(
            $this->name(),
            $url,
            (string) ($config['label'] ?? 'rtmp'),
            $config
        );
    }
}
