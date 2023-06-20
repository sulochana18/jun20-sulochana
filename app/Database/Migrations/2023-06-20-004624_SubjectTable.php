<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubjectTable extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('subjects')) {
            $fields = [
                'sub_id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('sub_id', true);
            $this->forge->createTable('subjects');
        }
    }

    public function down()
    {
        //
    }
}
