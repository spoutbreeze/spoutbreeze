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

namespace Domain\Jobs;


/**
 * Redis-backed streamer jobs. Keys are raw Redis strings so the Fat-Free
 * cache seed cannot shadow them.
 *
 * The prefix is per-instance because two stores share this class with very
 * different exposure: the streamer job namespace is readable by anyone who
 * holds a job token, while the provider-operations namespace holds access
 * tokens and must never be addressable from there.
 */
final class StreamerJobStore implements JobStore
{
    public const PREFIX     = 'spoutbreeze:streamer_job:';
    public const OPS_PREFIX = 'spoutbreeze:provider_ops:';
    public const TTL        = 86400;

    public function __construct(private \Redis $redis, private string $prefix = self::PREFIX) {}

    public static function fromHive(\Base $f3, string $prefix = self::PREFIX): self
    {
        $cache = (string) $f3->get('CACHE');
        $host  = preg_match('/redis=([\w.-]+)/', $cache, $m) ? $m[1] : (string) $f3->get('spoutbreeze.redis.host');
        $redis = new \Redis();
        $redis->connect($host, 6379);

        return new self($redis, $prefix);
    }

    public function create(array $job): string
    {
        $token = bin2hex(random_bytes(16));
        $this->put($token, $job);

        return $token;
    }

    public function get(string $token): ?array
    {
        $raw = $this->redis->get($this->prefix . $token);
        if (!\is_string($raw)) {
            return null;
        }

        return json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
    }

    public function put(string $token, array $job): void
    {
        $this->redis->setex(
            $this->prefix . $token,
            self::TTL,
            json_encode($job, JSON_THROW_ON_ERROR)
        );
    }
}
