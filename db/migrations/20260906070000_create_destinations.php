<?php

declare(strict_types=1);

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

use Phinx\Migration\AbstractMigration;

/**
 * Saved streaming destinations: a named, reusable provider configuration.
 *
 * Credentials live in `secret` as a single libsodium-sealed blob rather
 * than in separate columns, so an operator reading the table — or a backup
 * of it — never sees a usable stream key. The non-secret half of the
 * configuration stays in `config` for listing and for the console form.
 */
final class CreateDestinations extends AbstractMigration
{
    public function up(): void
    {
        $this->table('destinations')
            ->addColumn('name', 'string', ['limit' => 128, 'null' => false])
            ->addColumn('provider', 'string', ['limit' => 32, 'null' => false])
            ->addColumn('label', 'string', ['limit' => 64, 'null' => false])
            ->addColumn('config', 'jsonb', ['null' => true])
            ->addColumn('secret', 'text', ['null' => true])
            ->addColumn('enabled', 'boolean', ['default' => true, 'null' => false])
            ->addColumn('last_status', 'string', ['limit' => 32, 'null' => true])
            ->addColumn('last_checked_on', 'timestamp', ['null' => true])
            ->addColumn('created_on', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => false])
            ->addColumn('updated_on', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => false])
            ->addIndex(['name'], ['unique' => true])
            ->addIndex(['provider'])
            ->create();
    }

    public function down(): void
    {
        $this->table('destinations')->drop()->save();
    }
}
