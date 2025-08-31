<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class MahasiswaController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new MahasiswaModel();
    }

    public function tabelHtml()
    {
        $mahasiswa = $this->model->getFirst();
        $data = [
            'nim' => $mahasiswa ? $mahasiswa['nim'] : 'Tidak ada data',
            'nama' => $mahasiswa ? $mahasiswa['nama'] : 'Tidak ada data',
            'umur' => $mahasiswa ? $mahasiswa['umur'] : 'Tidak ada data'
        ];
        return view('latihan4b.php', $data);
    }
    public function tabelLoop()
    {
        $mahasiswa = $this->model->getAllAsArray();
        $data = [
            'mahasiswa' => $mahasiswa
        ];
        return view('latihan4c', $data);
    }
}