<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getMahasiswa(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM mahasiswa ORDER BY nim ASC");
        return $query->getResultArray();
    }

    public function getMahasiswaByNIM($nim){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM mahasiswa WHERE nim = ?", [$nim]);
        return $query->getRowArray();
    }
}