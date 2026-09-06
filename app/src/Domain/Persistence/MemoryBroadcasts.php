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
 * In-memory catalogue for Statera scenarios.
 */
final class MemoryBroadcasts implements BroadcastCatalogue
{
    /** @var array<int, array<string, mixed>> */
    private array $rows = [];
    private int $seq    = 0;

    public function upsert(array $fields): int
    {
        $meetingId = (string) ($fields['meeting_id'] ?? '');
        if ('' !== $meetingId) {
            foreach ($this->rows as $id => $row) {
                if (($row['meeting_id'] ?? '') === $meetingId) {
                    $this->rows[$id] = array_merge($row, $fields, ['id' => $id]);

                    return $id;
                }
            }
        }
        $id              = ++$this->seq;
        $this->rows[$id] = array_merge($fields, ['id' => $id]);

        return $id;
    }

    public function all(): array
    {
        $rows = array_values($this->rows);
        usort($rows, static fn ($a, $b) => ($b['id'] ?? 0) <=> ($a['id'] ?? 0));

        return $rows;
    }

    public function find(int $id): ?array
    {
        return $this->rows[$id] ?? null;
    }

    public function firstServerId(): ?int
    {
        return 1;
    }

    public function firstEndpointId(): ?int
    {
        return 1;
    }

    public function updateStatus(int $id, string $status): void
    {
        foreach ($this->rows as $i => $row) {
            if ((int) $row['id'] === $id) {
                $this->rows[$i]['status'] = $status;
            }
        }
    }
}
