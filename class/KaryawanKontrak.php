<?php
require_once "Karyawan.php";

class KaryawanKontrak extends Karyawan
{

    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id, $nama, $dept, $tglMasuk, $gajiHari, $durasi, $agensi)
    {
        
        parent::__construct($id, $nama, $dept, $tglMasuk, $gajiHari);
        
        $this->durasiKontrakBulan = $durasi;
        $this->agensiPenyalur = $agensi;
    }

    public function hitungGajiBersih()
    {
        // Gaji Bersih = hariKerjaMasuk * gajiDasarPerHari
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan()
    {
        return "ID: " . $this->id_karyawan . "<br>" .
               "Nama: " . $this->nama_karyawan . "<br>" .
               "Departemen: " . $this->departemen . "<br>" .
               "Durasi Kontrak: " . $this->durasiKontrakBulan . " Bulan<br>" .
               "Agensi Penyalur: " . $this->agensiPenyalur . "<br>";
    }
}
?>