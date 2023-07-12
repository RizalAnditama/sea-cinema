<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Film extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel film
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
            'description'      => [
                'type'           => 'text',
            ],
            'release_date' => [
                'type'           => 'date',
            ],
            'poster_url'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
            'age_rating'      => [
                'type'           => 'int',
                'constraint'     => '11'
            ],
            'ticket_price'      => [
                'type'           => 'int',
                'constraint'     => '11'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel film
        $this->forge->createTable('film', TRUE);
    }

    //-------------------------------------------------------

    public function down()
    {
        // menghapus tabel film
        $this->forge->dropTable('film');
    }
}
