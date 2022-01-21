<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\NumberProvider;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new Users();#135745
        #$kioskModel->where('kiosk_id', 135745)->where('kiosk_status', 1)->first()
        var_dump ($userModel->getUserById(1));
        return view('welcome_message');
    }

    public function test($providerId)
    {
        $userModel = new Users();
        var_dump ($userModel->getUserById(1));
    }
}
