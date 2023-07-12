<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class History extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel history
        $this->forge->addField([
            'history_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'movie_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'seat_number' => [
                'type'           => 'int',
                'constraint'     => 2,
            ],
            'status'      => [
                'type'           => 'ENUM',
                'constraint'     => ['on', 'cancel'],
                'default'        => 'on',
            ],
            'date' => [
                'type'           => 'date',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('history_id', TRUE);
        $this->forge->addForeignKey('movie_id', 'film', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');

        // Membuat tabel history
        $this->forge->createTable('history', TRUE);
    }

    //-------------------------------------------------------

    public function down()
    {
        // menghapus tabel history
        $this->forge->dropTable('history');
    }
}
