<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function belajarRoutes() 
    {
        echo 'Belajar Routes!';
    }
    public function tesDb() 
    {
        $db = db_connect();
        if ($db)
        {
            echo "Koneksi berhasil. Database yang terhubung: " . $db->getDatabase();
            echo "<br>Versi MySQL: " . $db->getVersion();
        }
        else
        {
            echo "Koneksi gagal.";
        }
        $db->close();
    }
}