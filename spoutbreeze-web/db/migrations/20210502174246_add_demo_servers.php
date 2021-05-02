<?php

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
