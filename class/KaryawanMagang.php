<?php
require_once "Karyawan.php";

class KaryawanMagang extends Karyawan
{
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id, $nama, $dept, $tglMasuk, $gajiHari, $uangSaku, $sertifikat)
    {
        parent::__construct($id, $nama, $dept, $tglMasuk, $gajiHari);
        
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    public function hitungGajiBersih()
    {
        // Gaji Bersih = (hariKerjaMasuk * gajiDasarPerHari) * 0.80 (potongan 20%)
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) * 0.80;
    }

    public function tampilkanProfilKaryawan()
    {
        return "ID: " . $this->id_karyawan . "<br>" .
               "Nama: " . $this->nama_karyawan . "<br>" .
               "Departemen: " . $this->departemen . "<br>" .
               "Uang Saku Bulanan: Rp" . number_format($this->uangSakuBulanan, 0, ',', '.') . "<br>" .
               "Sertifikat Kampus Merdeka: " . $this->sertifikatKampusMerdeka . "<br>";
    }
}
?>