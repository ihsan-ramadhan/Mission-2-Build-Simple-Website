<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class DataMahasiswa extends BaseController
{
    public function index(){
        $model = new MahasiswaModel();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $model->getMahasiswa(),
            'content' => view('data_mahasiswa', ['mahasiswa' => $model->getMahasiswa()])
        ];
        
        return view('template', $data);
    }

    public function detail($nim){
        $model = new MahasiswaModel();
        $mahasiswa = $model->getMahasiswaByNIM($nim);
        
        if (empty($mahasiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'content' => view('mahasiswa_detail', ['mahasiswa' => $mahasiswa])
        ];
        
        return view('template', $data);
    }
}