<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    /**
     * table name
     */
    protected $table = "user";

    /**
     * allow field
     */
    protected $allowedFields = [
        'username', 'password', 'name', 'email', 'hak_akses'
    ];
    protected $primaryKey       = 'id_user';
}
