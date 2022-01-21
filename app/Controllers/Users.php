<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Users extends BaseController
{
    /**
     *
     */
    public function index()
    {
        //
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    public function auth()
    {
        $data = [];
        helper(['form']);

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
                return redirect()->to('/');
            }
        }
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    /**
     * @return RedirectResponse|void
     * @throws ReflectionException
     */
    public function register()
    {
        $data = [];

        if ($this->request->getMethod() === 'post')
        {
            $rules = [
                'email' => 'required|min_length[7]|max_length[30]|valid_email|is_unique[users.users_email]',
                'password' => 'required|min_length[6]|max_length[30]',
                'cpassword' => 'matches[password]'
            ];
            if (!$this->validate($rules))
                $data['validation'] = $this->validator;
            else{
                $this->models->users->addNewUser([
                    'users_email' => $this->request->getVar('email'),
                    'users_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                ]);
                session()->setFlashdata('successRegistrations', 'Register Successfully.');
                return redirect()->to('/users');
            }
        }

        helper(['form']);
        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }
}
