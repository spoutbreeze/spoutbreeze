<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

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

/**
 * Password reset tokens (single use, short lived). GDPR: rows carry no PII
 * beyond the user reference and are deleted on use.
 */
final class CreatePasswordResets extends AbstractMigration
{
    public function up(): void
    {
        $this->table('password_resets')
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('token_hash', 'string', ['limit' => 64, 'null' => false])
            ->addColumn('expires_on', 'datetime', ['null' => false])
            ->addColumn('created_on', 'datetime', ['default' => '0001-01-01 00:00:00'])
            ->addIndex('token_hash', ['unique' => true, 'name' => 'idx_password_resets_token'])
            ->addIndex('user_id', ['name' => 'idx_password_resets_user'])
            ->create();
    }

    public function down(): void
    {
        $this->table('password_resets')->drop()->save();
    }
}
