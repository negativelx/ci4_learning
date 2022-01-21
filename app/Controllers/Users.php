<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    /**
     * @return mixed|void
     */
    public function index()
    {
        //
        helper(['forms']);
        $data = [
            'title' => 'My Webpage'
        ];
        echo view('header', $data);
        echo view('login');
        echo view('footer');
    }

    public function auth()
    {
        $data = [];
        helper(['forms']);

        if ($this->request->getMethod() === 'post')
        {
            $rules = [
                'email' => 'required|min_length[7]|max_length[30]|valid_email',
                'password' => 'required|min_length[6]|max_length[30]|validateUser[email,password]'
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password doesn\'t match.'
                ],
            ];
            if (!$this->validate($rules, $errors))
                $data['validation'] = $this->validator;
            else{
                //do session jwt and etc...

            }
        }
        echo view('header', $data);
        echo view('login');
        echo view('footer');
    }
}
