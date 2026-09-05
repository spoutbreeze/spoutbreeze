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

final class AddDemoServers extends AbstractMigration
{
    public function up(): void
    {
        // Add super admin user
        $serverTable = $this->table('servers');

        $serverDataOne = [
            [
                'fqdn'          => 'demo.spoutbreeze.test',
                'ip_address'    => '192.168.83.125',
                'shared_secret' => 'rqAsM6PHKyLXawfSZ9xidVUDvk4ej3EYtWpG7BJozn', // 12345678
                'created_on'    => date('Y-m-d H:i:s')
            ]
        ];

        $serverTable->insert($serverDataOne)->save();

        $serverDataTwo = [
            [
                'fqdn'          => 'demo2.spoutbreeze.test',
                'ip_address'    => '192.168.83.1',
                'shared_secret' => 'rqAsM6PHKyLXawfSZ9xidVUDvk4ej3EYtWpG7BJozn', // 12345678
                'created_on'    => date('Y-m-d H:i:s')
            ]
        ];

        $serverTable->insert($serverDataTwo)->save();
    }

    public function down(): void
    {
        $userTable = $this->table('server');
        $userTable->getAdapter()->execute("DELETE from users where fqdn='demo.spoutbreeze.test'");
        $userTable->getAdapter()->execute("DELETE from users where fqdn='demo2.spoutbreeze.test'");
    }
}
