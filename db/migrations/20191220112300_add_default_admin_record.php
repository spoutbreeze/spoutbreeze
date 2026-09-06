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

class AddDefaultAdminRecord extends AbstractMigration
{
    public function up(): void
    {
        // Add super admin user
        $userTable = $this->table('users');

        $userData = [
            [
                'email'      => 'admin@email.com',
                'username'   => 'admin',
                'role'       => 'admin',
                'password'   => '$2y$10$36d51ca3b8acdf6cdbda9uJ4TizvdKg.slgIFo/6uy4Wrm5DONCiG',
                'status'     => 'active',
                'created_on' => date('Y-m-d H:i:s'),
            ],
        ];

        $userTable->insert($userData)->save();
    }

    public function down(): void
    {
        $userTable = $this->table('users');
        $userTable->getAdapter()->execute("DELETE from users where email='admin@email.com'");
    }
}
