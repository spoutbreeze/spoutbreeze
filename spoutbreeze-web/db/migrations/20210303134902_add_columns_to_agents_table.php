<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddColumnsToAgentsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        $table = $this->table('agents');
        $table->addColumn('ip_address', 'string', ['limit' => 256, 'null' => false, 'default' => '127.0.0.1'])
            ->addColumn('port', 'integer', ['limit' => 256, 'null' => false, 'default' => 15001])
            ->addIndex(['name'], ['unique' => true])
            ->save();
    }

    public function down(): void
    {
        $this->table('agents')
            ->removeColumn('ip_address')
            ->removeColumn('port')
            ->save();
    }
}
