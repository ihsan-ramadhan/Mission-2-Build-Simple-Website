<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getMahasiswa(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM mahasiswa");
        return $query->getResultArray();
    }
}