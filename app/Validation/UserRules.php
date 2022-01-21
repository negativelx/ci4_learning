<?php

namespace App\Validation;

use App\Models\Models;
use App\Models\Users;
use Config\Services;

class UserRules
{
    /**
     * @param string $str
     * @param string $field
     * @param array $data
     * @return bool
     */
    public function validateUser(string $str, string $field, array $data): bool
    {
        $user = Services::models()->users->where('users_email', $data['email'])
                          ->first();
        if (!$user)
            return false;

        return password_verify($data['password'], $user['users_password']);
    }
}