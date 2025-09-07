<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController{
    public function display(){
        $model = new MahasiswaModel();

        $data['mahasiswa'] = $model->getMahasiswa();

        return view('mahasiswa/display_mahasiswa', $data);
    }

    public function detail($nim){
        $model = new MahasiswaModel();

        $data['mahasiswa'] = $model->getMahasiswaByNIM($nim);
        
        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan.');
        }

        return view('mahasiswa/detail_mahasiswa', $data);
    }
}