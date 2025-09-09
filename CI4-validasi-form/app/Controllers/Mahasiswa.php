<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $model->getMahasiswa(),
            'content' => view('mahasiswa/display_mahasiswa', ['mahasiswa' => $model->getMahasiswa()])
        ];
        return view('template', $data);
    }

    public function detail($nim)
    {
        $model = new MahasiswaModel();
        $mahasiswa_data = $model->getMahasiswaByNIM($nim);
        if (empty($mahasiswa_data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan.');
        }
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa_data,
            'content' => view('mahasiswa/detail_mahasiswa', ['mahasiswa' => $mahasiswa_data])
        ];
        return view('template', $data);
    }

    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        $data['title'] = 'Tambah Mahasiswa';
        $data['content'] = view('mahasiswa/create_mahasiswa', $data);
        return view('template', $data);
    }

    public function store()
    {
        $rules = [
            'nim'  => [
                'rules' => 'required|numeric|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'numeric'  => 'NIM hanya boleh berisi angka.',
                    'is_unique' => 'NIM sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                    'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi.'
                ]
            ],
            'umur' => [
                'rules' => 'required|integer|greater_than[0]',
                'errors' => [
                    'required' => 'Umur wajib diisi.',
                    'integer'  => 'Umur harus berupa angka.',
                    'greater_than' => 'Umur harus lebih dari 0.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new MahasiswaModel();
        $data = [
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ];
        $model->saveMahasiswa($data);
        
        session()->setFlashdata('success', 'Data mahasiswa berhasil ditambahkan.');
        return redirect()->to('/tabel-mhs');
    }

    public function edit($nim)
    {
        $model = new MahasiswaModel();
        $mahasiswa_data = $model->getMahasiswaByNIM($nim);
        if (empty($mahasiswa_data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $mahasiswa_data,
            'content' => view('mahasiswa/edit_mahasiswa', ['mahasiswa' => $mahasiswa_data])
        ];
        return view('template', $data);
    }

    public function update($nim)
    {
        $rules = [
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                    'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi.'
                ]
            ],
            'umur' => [
                'rules' => 'required|integer|greater_than[0]',
                'errors' => [
                    'required' => 'Umur wajib diisi.',
                    'integer'  => 'Umur harus berupa angka.',
                    'greater_than' => 'Umur harus lebih dari 0.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new MahasiswaModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ];
        $model->updateMahasiswa($nim, $data);

        session()->setFlashdata('success', 'Data mahasiswa berhasil diperbarui.');
        return redirect()->to('/tabel-mhs');
    }

    public function delete($nim)
    {
        $model = new MahasiswaModel();
        $deleted = $model->deleteMahasiswa($nim);
        
        if ($deleted) {
            session()->setFlashdata('success', 'Data mahasiswa berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data mahasiswa.');
        }

        return redirect()->to('/tabel-mhs');
    }
}