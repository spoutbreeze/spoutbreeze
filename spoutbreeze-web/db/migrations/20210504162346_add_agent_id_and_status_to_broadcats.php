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

use Phinx\Migration\AbstractMigration;

final class AddAgentIdAndStatusToBroadcats extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('broadcasts');
        $table->addColumn('agent_id', 'integer', ['null' => true])
              ->addColumn('status', 'string', ['limit' => 128, 'null' => false])
              ->addIndex(['agent_id'], [
                                         'unique' => true,
                                         'name'   => 'idx_broadcasts_agent_id']
              )
              ->save();
    }

    public function down(): void
    {
        $this->table('broadcasts')
             ->removeIndexByName('idx_broadcasts_agent_id')
             ->removeColumn('agent_id')
             ->removeColumn('status')
             ->save();
    }
}
