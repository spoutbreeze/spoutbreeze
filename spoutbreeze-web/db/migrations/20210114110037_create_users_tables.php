<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.io/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

use Phinx\Migration\AbstractMigration;

class CreateUsersTables extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('users');
        $table->addColumn('email', 'string', ['limit' => 256, 'null' => false])
            ->addColumn('username', 'string', ['limit' => 32, 'null' => false])
            ->addColumn('role', 'string', ['limit' => 32, 'default' => 'admin', 'null' => false])
            ->addColumn('password', 'string', ['limit' => 256, 'null' => false])
            ->addColumn('salt', 'string', ['limit' => 256, 'null' => false])
            ->addColumn('status', 'string', ['limit' => 32, 'default' => 'inactive', 'null' => false])
            ->addColumn('last_login', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
            ->addColumn('created_on', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
            ->addColumn('updated_on', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
            ->addIndex('username', ['unique' => true, 'name' => 'idx_users_username'])
            ->addIndex('email', ['unique' => true, 'name' => 'idx_users_email'])
            ->save();
    }

    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
