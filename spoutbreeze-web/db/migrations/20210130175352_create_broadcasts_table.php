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

final class CreateBroadcastsTable extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('broadcasts');
        $table->addColumn('selenoid_id', 'string', ['limit' => 256, 'null' => false])
              ->addColumn('server_id', 'integer', ['limit' => 4, 'default' => 1, 'null' => false])
              ->addColumn('endpoint_id', 'integer', ['limit' => 4, 'default' => 1, 'null' => false])
              ->addColumn('created_on', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
              ->addColumn('updated_on', 'datetime', ['default' => '0001-01-01 00:00:00', 'timezone' => true])
              ->addForeignKey(['server_id'], 'servers', ['id'], ['constraint' => 'broadcast_server_id'])
              ->addForeignKey(['endpoint_id'], 'streaming_endpoints', ['id'], ['constraint' => 'broadcast_streaming_endpoint_id'])
              ->save();
    }

    public function down(): void
    {
        $this->table('broadcasts')->drop()->save();
    }
}
