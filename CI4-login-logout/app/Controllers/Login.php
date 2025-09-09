<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Login extends BaseController
{
    public function index(){
        if (session()->get('logged_in')) {
            return redirect()->to('/home');
        }

        $data = [
            'title' => 'Login',
            'content' => view('login', ['error' => session()->getFlashdata('error')])
        ];
        
        return view('template', $data);
    }

    public function attempt(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AdminModel();
        $admin = $model->getAdminByUsername($username);
        
        if ($admin && $password === $admin['password']) {
            session()->set('logged_in', true);
            session()->set('username', $username);
            return redirect()->to('/home');
        } else {
            session()->setFlashdata('error', 'Username atau password salah');
        }
        
        $data = [
            'title' => 'Login',
            'content' => view('login', ['error' => session()->getFlashdata('error')])
        ];
        return view('template', $data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}