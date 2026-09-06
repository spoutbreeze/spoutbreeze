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
 * In-memory job store for Statera scenarios.
 */
final class MemoryJobStore implements JobStore
{
    /** @var array<string, array<string, mixed>> */
    private array $jobs = [];

    public function create(array $job): string
    {
        $token              = bin2hex(random_bytes(8));
        $this->jobs[$token] = $job;

        return $token;
    }

    public function get(string $token): ?array
    {
        return $this->jobs[$token] ?? null;
    }

    public function put(string $token, array $job): void
    {
        $this->jobs[$token] = $job;
    }
}
