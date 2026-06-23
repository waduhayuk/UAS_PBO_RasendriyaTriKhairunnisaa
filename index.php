<?php
// 1. Include file koneksi dan semua class yang dibutuhkan
require_once "koneksi/database.php";
require_once "class/KaryawanKontrak.php";
require_once "class/KaryawanTetap.php";   
require_once "class/KaryawanMagang.php"; 

// 2. Siapkan array untuk menampung objek berdasarkan kategori
$daftarKontrak = [];
$daftarTetap = [];
$daftarMagang = [];

// 3. Ambil data dari database secara dinamis
// Catatan: Karena kolom hari_kerja_masuk berbentuk DATE di DB, 
// namun di Tahap 5 digunakan sebagai pengali gaji (jumlah hari hadir),
// kita asumsikan nilainya diambil dari data numerik atau jumlah hari kerja bulan ini.
// Di sini kita gunakan fungsi DAY() atau angka statis dari tanggal untuk simulasi hari kerja (misal: mengambil tanggalnya saja sebagai jumlah hari hadir)
// Atau kamu bisa menganggap kolom itu diisi total hari kerja. Agar aman, kita ambil nilai day dari tanggal tersebut atau default 22 jika format date murni.
$query = "SELECT *, DAY(hari_kerja_masuk) as jumlah_hari_hadir FROM tabel_karyawan";
$result = mysqli_query($koneksi, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Gunakan tanggal/day atau nilai default 20 hari sebagai simulasi jumlah hari kerja masuk dari database
        $hariKerja = $row['jumlah_hari_hadir'] > 0 ? $row['jumlah_hari_hadir'] : 20; 
        
        // Polimorfisme: Instansiasi objek berdasarkan jenis_karyawan
        if ($row['jenis_karyawan'] == 'kontrak') {
            $daftarKontrak[] = new KaryawanKontrak(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $hariKerja, // dimasukkan ke properti $hariKerjaMasuk
                $row['gaji_dasar_per_hari'],
                $row['durasi_kontrak_bulan'],
                $row['agensi_penyalur']
            );
        } elseif ($row['jenis_karyawan'] == 'tetap') {
            $daftarTetap[] = new KaryawanTetap(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $hariKerja,
                $row['gaji_dasar_per_hari'],
                $row['tunjangan_kesehatan'],
                $row['opsi_saham_id']
            );
        } elseif ($row['jenis_karyawan'] == 'magang') {
            $daftarMagang[] = new KaryawanMagang(
                $row['id_karyawan'],
                $row['nama_karyawan'],
                $row['departemen'],
                $hariKerja,
                $row['gaji_dasar_per_hari'],
                $row['uang_saku_bulanan'],
                $row['sertifikat_kampus_merdeka']
            );
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Slip Gaji Karyawan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; }
        h2 { border-bottom: 2px solid #2c3e50; padding-bottom: 5px; margin-top: 40px; color: #2980b9; }
        .grid-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 15px; }
        .card { background: white; border: 1px solid #ddd; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .card-title { font-weight: bold; font-size: 1.1em; color: #2c3e50; margin-bottom: 10px; border-bottom: 1px dashed #ccc; padding-bottom: 5px; }
        .gaji { font-size: 1.2em; font-weight: bold; color: #27ae60; margin-top: 10px; padding-top: 5px; border-top: 1px solid #eee; }
    </style>
</head>
<body>

    <h1>SISTEM INFORMASI SLIP GAJI KARYAWAN</h1>

    <h2>1. Kategori Karyawan Tetap</h2>
    <div class="grid-container">
        <?php foreach ($daftarTetap as $k): ?>
            <div class="card">
                <div class="card-title">Slip Gaji Tetap</div>
                <?php echo $k->tampilkanProfilKaryawan(); ?>
                <div class="gaji">Gaji Bersih: Rp<?php echo number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>2. Kategori Karyawan Kontrak</h2>
    <div class="grid-container">
        <?php foreach ($daftarKontrak as $k): ?>
            <div class="card">
                <div class="card-title">Slip Gaji Kontrak</div>
                <?php echo $k->tampilkanProfilKaryawan(); ?>
                <div class="gaji">Gaji Bersih: Rp<?php echo number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>3. Kategori Karyawan Magang</h2>
    <div class="grid-container">
        <?php foreach ($daftarMagang as $k): ?>
            <div class="card">
                <div class="card-title">Slip Gaji Magang</div>
                <?php echo $k->tampilkanProfilKaryawan(); ?>
                <div class="gaji">Gaji Bersih: Rp<?php echo number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>