<?php

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
