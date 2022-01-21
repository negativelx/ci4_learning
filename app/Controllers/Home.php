<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\NumberProvider;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('templates/header', $data);
        echo view('home');
        echo view('templates/footer');
    }

    public function test($providerId)
    {
        $userModel = new Users();
        var_dump ($userModel->getUserById(1));
    }
}
