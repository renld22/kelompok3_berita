<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    /**
     * table name
     */
    protected $table = "artikel";

    /**
     * allow field
     */
    protected $allowedFields = [
        'judul', 'konten', 'ringkasan', 'gambar', 'tanggal', 'id_user'
    ];
    protected $primaryKey       = 'id_artikel';
}
