<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'film';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'description',
        'release_date',
        'poster_url',
        'age_rating',
        'ticket_price',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
