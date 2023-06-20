<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecordsTable extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('records')) {
            $fields = [
                'record_id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                ],
                'subject' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'marks' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
                'grade' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('record_id', true);
            //$this->forge->addForeignKey('id', 'users', 'record_id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('records');
        }   
    }

    public function down()
    {
        //
    }
}
