<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
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
                'password'   => '$2y$10$389aec3bc72f05df7ff7euhLd8y11Po/FkxCLXPv5hqmy5bFRpMeO', // 12345678
                'salt'       => '389aec3bc72f05df7ff7e8',
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
