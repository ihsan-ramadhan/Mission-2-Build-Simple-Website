<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function getAdminByUsername($username){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM admin WHERE username = ?", [$username]);
        return $query->getRowArray();
    }
}