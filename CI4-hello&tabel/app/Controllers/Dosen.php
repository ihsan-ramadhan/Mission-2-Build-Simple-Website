<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dosen extends Controller {
    public function helloDosen() {
        return view('display_helloworld');
    }
}