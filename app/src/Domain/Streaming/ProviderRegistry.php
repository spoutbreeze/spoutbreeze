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
 * Resolves operator target rows through the registered providers.
 */
final class ProviderRegistry
{
    /** @var array<string, Provider> */
    private array $providers = [];

    public function __construct(Provider ...$providers)
    {
        foreach ($providers as $provider) {
            $this->providers[$provider->name()] = $provider;
        }
    }

    public static function defaults(?Transport $transport = null): self
    {
        return new self(
            new GenericRtmp(),
            new YouTube($transport ?? new CurlTransport()),
            new Facebook($transport ?? new CurlTransport()),
            new LinkedIn($transport ?? new CurlTransport()),
            new Panopto(),
        );
    }

    /**
     * @param list<array<string, mixed>> $targets
     * @param list<array<string, mixed>> $opsTargets provider operation rows,
     *        credentials included — never served to the streamer
     *
     * @return list<array<string, mixed>>
     */
    public function resolve(array $targets, array &$opsTargets = []): array
    {
        $resolved = [];
        foreach ($targets as $target) {
            if (!\is_array($target)) {
                continue;
            }
            $name = (string) ($target['provider'] ?? '');
            if ('' === $name && !empty($target['url'])) {
                $name = 'generic_rtmp';
            }
            if (!isset($this->providers[$name])) {
                throw new \InvalidArgumentException('Unknown streaming provider "' . $name . '"');
            }
            $destination  = $this->providers[$name]->prepare($target);
            $streamerRow  = $destination->toJobTarget();

            // Two distinct rows, deliberately not the same array: the
            // streamer row is served to whoever holds the job token, while
            // the ops row keeps the credentials stop() and goLive() need to
            // call the platform back. Building one from the other by adding
            // the token afterwards is what leaked it.
            $opsTargets[] = $streamerRow + [
                'access_token' => $target['access_token'] ?? null,
                'config'       => $target,
            ];
            $resolved[] = $streamerRow;
        }

        return $resolved;
    }
}
