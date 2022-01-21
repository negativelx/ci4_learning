<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'users_id';

    public function getUserById ($kioskId)
    {
        return $this
                    ->where('users_id', $kioskId)
                    ->where('users_status', 1)
                    ->first();
    }

}