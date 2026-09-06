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

namespace Domain\Persistence;

/**
 * Domain rows live on the spoutbreeze database (servers, broadcasts,
 * streaming_endpoints), not on the Sukarix skeleton database.
 */
interface BroadcastCatalogue
{
    /**
     * Insert or reuse the row for this meeting id. Returns the broadcast id.
     *
     * @param array<string, mixed> $fields
     */
    public function upsert(array $fields): int;

    /**
     * @return list<array<string, mixed>>
     */
    public function all(): array;

    /**
     * @return null|array<string, mixed>
     */
    public function find(int $id): ?array;

    public function firstServerId(): ?int;

    public function firstEndpointId(): ?int;

    public function updateStatus(int $id, string $status): void;
}
