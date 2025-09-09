<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $allowedFields = ['nim', 'nama', 'umur'];

    public function getMahasiswa()
    {
        return $this->orderBy('nim', 'ASC')->findAll();
    }

    public function getMahasiswaByNIM($nim)
    {
        return $this->find($nim);
    }

    public function saveMahasiswa($data)
    {
        return $this->insert($data);
    }

    public function updateMahasiswa($nim, $data)
    {
        return $this->update($nim, $data);
    }

    public function deleteMahasiswa($nim)
    {
        return $this->delete($nim);
    }
}