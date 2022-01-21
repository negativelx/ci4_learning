<?php

namespace App\Validation;


use App\Models\Models;
use App\Models\Users;

class UserRules
{

    /**
     * @var Models
     */
    private $model;
    public function __construct()
    {
        $this->model = new Models();
    }

    /**
     * @param string $str
     * @param string $field
     * @param array $data
     * @return bool
     */
    public function validateUser(string $str, string $field, array $data): bool
    {
        $user = $this->model->users->where('users_email', $data['email'])
                          ->first();
        if (!$user)
            return false;

        return password_verify($data['password'], $user['users_password']);
    }
}