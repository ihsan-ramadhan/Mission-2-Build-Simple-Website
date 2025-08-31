<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $allowedFields = ['nim', 'nama', 'umur'];

    public function getFirst()
    {
        return $this->first();
    }
    public function getAllAsArray()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa ORDER BY nim ASC");
        return $query->getResultArray();
    }
}