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
 * A resolved ingest destination the streamer can push to.
 */
final class Destination
{
    /**
     * @param array<string, mixed> $meta
     */
    public function __construct(
        public string $provider,
        public string $url,
        public string $label,
        public array $meta = [],
    ) {}

    /**
     * @return array{url: string, label: string}
     */
    public function toTarget(): array
    {
        return ['url' => $this->url, 'label' => $this->label];
    }

    /**
     * Credential fields a provider config may carry. `GenericRtmp` passes
     * its whole config through as meta, so the filter has to name every one
     * of them rather than trusting the provider to have been careful.
     */
    private const SECRET_KEYS = [
        'access_token',
        'refresh_token',
        'client_secret',
        'stream_key',
        'key',
        'password',
        'secret',
        'api_password',
    ];

    /**
     * The row handed to the streamer: where to push, and under what label.
     * Everything that could authenticate a caller to a platform is stripped
     * here, because this row is served to whoever holds the job token.
     *
     * @return array<string, mixed>
     */
    public function toJobTarget(): array
    {
        return [
            'url'      => $this->url,
            'label'    => $this->label,
            'provider' => $this->provider,
            'meta'     => self::withoutSecrets($this->meta),
        ];
    }

    /**
     * @param array<string, mixed> $values
     *
     * @return array<string, mixed>
     */
    public static function withoutSecrets(array $values): array
    {
        foreach (self::SECRET_KEYS as $key) {
            unset($values[$key]);
        }

        return $values;
    }

    /**
     * The complement of withoutSecrets(): the credential half of a provider
     * configuration, which the destination registry seals before storing.
     *
     * @param array<string, mixed> $values
     *
     * @return array<string, mixed>
     */
    public static function onlySecrets(array $values): array
    {
        $secrets = [];
        foreach (self::SECRET_KEYS as $key) {
            if (isset($values[$key]) && '' !== $values[$key]) {
                $secrets[$key] = $values[$key];
            }
        }

        return $secrets;
    }
}
