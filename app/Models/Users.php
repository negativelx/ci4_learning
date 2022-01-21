<?php

namespace App\Models;

use CodeIgniter\Model;
use ReflectionException;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'users_id';
    protected $allowedFields = [
        'users_email',
        'users_password',
        /*
        'users_username',
        'users_lastname',
        'users_firstname',
        'users_country',
        'users_phone',
        'users_mobilephone',
        'users_status',
        'users_upline',
        */
    ];
    protected $updatedField = 'users_updated';

    /**
     * @param $kioskId
     * @return array|object|nul
     */
    public function getUserById($kioskId)
    {
        return $this
            ->where('users_id', $kioskId)
            ->where('users_status', 1)
            ->first();
    }

    /**
     * @param $data
     * @return bool
     * @throws ReflectionException
     */
    public function addNewUser($data)
    {
        return $this->save($data);
    }

}