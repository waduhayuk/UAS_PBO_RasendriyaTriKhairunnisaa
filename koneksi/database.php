<?php

class Database 
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "db_uas_pbo_trpl1b_rasendriyatrikhairunnisaa";
    public $koneksi;

    public function __construct() 
    {
        // Membuat koneksi menggunakan objek MySQLi (OOP Murni)
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Mengecek apakah koneksi eror lewat properti objek
        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }
    }
}

// Membuat objek dari class Database agar bisa dipakai di index.php
$db = new Database();
$koneksi = $db->koneksi;

?>