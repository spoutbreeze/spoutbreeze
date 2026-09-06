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
 * LinkedIn Live as a guided GenericRtmp preset: the member or Page schedules
 * a LinkedIn Live Event with "custom stream (RTMP)" and pastes the ingest
 * URL + stream key SpoutBreeze shows the operator. LinkedIn caps custom
 * streams at 1080p, 30 fps, 6 Mbps and four hours, so the provider carries
 * those constraints for profile intersection. The Live Events API adapter
 * lands behind a feature flag once partner access is granted.
 */
final class LinkedIn implements Provider
{
    public const MAX_WIDTH    = 1920;
    public const MAX_HEIGHT   = 1080;
    public const MAX_FRAMERATE = 30;
    public const MAX_BITRATE_KBPS = 6000;
    public const MAX_DURATION_HOURS = 4;

    public function __construct(private Transport $http) {}

    public function name(): string
    {
        return 'linkedin';
    }

    /**
     * The operator pastes the ingest URL and key from the LinkedIn Live
     * Event setup page; SpoutBreeze assembles the single push URL.
     */
    public function prepare(array $config): Destination
    {
        $url = trim((string) ($config['url'] ?? ''));
        $key = trim((string) ($config['key'] ?? ''));
        if ('' === $url || '' === $key) {
            throw new \InvalidArgumentException('The LinkedIn ingest URL and stream key are required (LinkedIn Live Event → custom stream)');
        }
        if (!str_starts_with($url, 'rtmp')) {
            throw new \InvalidArgumentException('The LinkedIn ingest URL must be an RTMP(S) URL');
        }

        return new Destination(
            $this->name(),
            rtrim($url, '/') . '/' . ltrim($key, '/'),
            (string) ($config['label'] ?? 'linkedin'),
            ['guided' => true]
        );
    }

    /**
     * @return array{max_width: int, max_height: int, max_framerate: int, max_bitrate_kbps: int, max_duration_hours: int}
     */
    public function constraints(): array
    {
        return [
            'max_width'          => self::MAX_WIDTH,
            'max_height'         => self::MAX_HEIGHT,
            'max_framerate'      => self::MAX_FRAMERATE,
            'max_bitrate_kbps'   => self::MAX_BITRATE_KBPS,
            'max_duration_hours' => self::MAX_DURATION_HOURS,
        ];
    }
}
