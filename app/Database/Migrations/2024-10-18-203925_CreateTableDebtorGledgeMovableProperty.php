<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDebtorGledgeMovableProperty extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'debtor_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '512',
            ],
            'property' => [
                'type'       => 'VARCHAR',
                'constraint' => '512',
            ],
            'notification_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'registration_data' => [
                'type'       => 'DATE',
            ],
            'notification_text' => [
                'type'       => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('debtorGledgeMovableProperty');
    }

    public function down()
    {
        $this->forge->dropTable('debtorGledgeMovableProperty');
    }
}
