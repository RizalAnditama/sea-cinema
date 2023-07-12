<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel user
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'birthdate' => [
                'type'           => 'date',
            ],
            'balance'      => [
                'type'           => 'int',
                'constraint'     => '11'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel user
        $this->forge->createTable('user', TRUE);
    }

    //-------------------------------------------------------

    public function down()
    {
        // menghapus tabel user
        $this->forge->dropTable('user');
    }
}
