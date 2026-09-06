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
 * PDO access to the JVM-owned spoutbreeze schema.
 */
final class DomainDb implements BroadcastCatalogue
{
    public function __construct(private \PDO $pdo)
    {
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    public static function fromEnv(): self
    {
        $f3 = \Base::instance();

        return new self(new \PDO(
            (string) $f3->get('spoutbreeze.domain.db.dsn'),
            (string) $f3->get('spoutbreeze.domain.db.username'),
            (string) $f3->get('spoutbreeze.domain.db.password')
        ));
    }

    public function upsert(array $fields): int
    {
        // Atomic on the unique meeting_id index: two concurrent starts for
        // the same meeting converge on one row instead of racing a
        // SELECT-then-INSERT. session_id is deliberately left untouched on
        // conflict so a restart never clobbers a live capture session id.
        $statement = $this->pdo->prepare(
            'INSERT INTO broadcasts (session_id, server_id, endpoint_id, meeting_id, agent_id, status, created_on, updated_on)
             VALUES (?, ?, ?, ?, NULL, ?, ?, ?)
             ON CONFLICT (meeting_id) DO UPDATE
                SET status = EXCLUDED.status,
                    endpoint_id = EXCLUDED.endpoint_id,
                    server_id = EXCLUDED.server_id,
                    updated_on = EXCLUDED.updated_on
             RETURNING id'
        );
        $now = $fields['created_on'] ?? date('Y-m-d H:i:s');
        $statement->execute([
            $fields['session_id'] ?? 'none',
            $fields['server_id'],
            $fields['endpoint_id'],
            (string) ($fields['meeting_id'] ?? ''),
            $fields['status'] ?? 'READY',
            $now,
            $fields['updated_on'] ?? $now,
        ]);

        return (int) $statement->fetchColumn();
    }

    public function all(): array
    {
        return $this->pdo->query(
            'SELECT id, meeting_id, server_id, endpoint_id, agent_id, status, session_id, created_on, updated_on
             FROM broadcasts ORDER BY id DESC LIMIT 100'
        )->fetchAll() ?: [];
    }

    public function find(int $id): ?array
    {
        $statement = $this->pdo->prepare('SELECT * FROM broadcasts WHERE id = ?');
        $statement->execute([$id]);
        $row = $statement->fetch();

        return \is_array($row) ? $row : null;
    }

    public function firstServerId(): ?int
    {
        $id = $this->pdo->query('SELECT id FROM servers ORDER BY id ASC LIMIT 1')->fetchColumn();

        return false === $id ? null : (int) $id;
    }

    public function firstEndpointId(): ?int
    {
        $id = $this->pdo->query('SELECT id FROM streaming_endpoints ORDER BY id ASC LIMIT 1')->fetchColumn();

        return false === $id ? null : (int) $id;
    }

    public function updateStatus(int $id, string $status): void
    {
        $statement = $this->pdo->prepare('UPDATE broadcasts SET status = ?, updated_on = ? WHERE id = ?');
        $statement->execute([$status, date('Y-m-d H:i:s'), $id]);
    }
}
