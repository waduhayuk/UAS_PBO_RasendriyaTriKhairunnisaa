<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_uas_pbo_trpl1b_rasendriyatrikhairunnisaa"
);

if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>