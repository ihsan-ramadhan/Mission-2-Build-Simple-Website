<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Home',
            'content' => view('home')
        ];
        
        return view('template', $data);
    }
}