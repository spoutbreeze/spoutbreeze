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

final class CreateServersTable extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('servers');
        $table->addColumn('fqdn', 'string', ['limit' => 256, 'null' => false])
              ->addColumn('ip_address', 'string', ['limit' => 32, 'null' => false])
              ->addColumn('shared_secret', 'string', ['limit' => 256, 'null' => false])
              ->addColumn('created_on', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
              ->addColumn('updated_on', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
              ->addIndex('fqdn', ['unique' => true, 'name' => 'idx_server_fqdn'])
              ->addIndex('ip_address', ['unique' => true, 'name' => 'idx_server_ip_address'])
              ->save();
    }

    public function down(): void
    {
        $userTable = $this->table('servers');
        $userTable->drop();
    }
}
