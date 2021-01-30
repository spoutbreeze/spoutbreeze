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

use Enum\UserRole;
use Phinx\Migration\AbstractMigration;

class AddDefaultAdminRecord extends AbstractMigration
{
    public function up(): void
    {
        // Add super admin user
        $userTable = $this->table('users');

        $userData = [
            [
                'email'      => 'admin@spoutbreeze.test',
                'username'   => 'admin',
                'role'       => UserRole::ADMIN,
                'password'   => '$2y$10$2cc96b1263fa3d2931f23ud5RaGBAhrF5XlaYMPY5oEcTyr9LxPIq',
                'salt'       => '2cc96b1263fa3d2931f232',
                'status'     => 'active',
                'created_on' => date('Y-m-d H:i:s')
            ]
        ];

        $userTable->insert($userData)->save();
    }

    public function down(): void
    {
        $userTable = $this->table('users');
        $userTable->getAdapter()->execute("DELETE from users where email='admin@spoutbreeze.test'");
    }
}
