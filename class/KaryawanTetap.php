<?php
require_once "Karyawan.php";

class KaryawanTetap extends Karyawan
{
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id, $nama, $dept, $tglMasuk, $gajiHari, $tunjangan, $sahamId)
    {
        parent::__construct($id, $nama, $dept, $tglMasuk, $gajiHari);
        
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $sahamId;
    }

    public function hitungGajiBersih()
    {
        // Gaji Bersih = (hariKerjaMasuk * gajiDasarPerHari) + tunjanganKesehatan
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan()
    {
        return "ID: " . $this->id_karyawan . "<br>" .
               "Nama: " . $this->nama_karyawan . "<br>" .
               "Departemen: " . $this->departemen . "<br>" .
               "Tunjangan Kesehatan: Rp" . number_format($this->tunjanganKesehatan, 0, ',', '.') . "<br>" .
               "ID Opsi Saham: " . $this->opsiSahamId . "<br>";
    }
}
?>