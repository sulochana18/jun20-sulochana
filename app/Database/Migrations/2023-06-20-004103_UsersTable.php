<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersTable extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('users')) {
            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'phone' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'address' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'city' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'state' => [                    
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'country' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'status' => [
                    'type' => "ENUM('active','inactive')",
                    'default' => 'active',
                ],
            ];
            $this->forge->addField($fields);
            $this->forge->addKey('id', true);
            $this->forge->createTable('users');
        }   
    }

    public function down()
    {
        //
    }
}
