-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2026 at 02:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1b_rasendriyatrikhairunnisaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `departemen` varchar(50) DEFAULT NULL,
  `hari_kerja_masuk` date DEFAULT NULL,
  `gaji_dasar_per_hari` decimal(10,2) DEFAULT NULL,
  `jenis_karyawan` enum('kontrak','tetap','magang') DEFAULT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(10,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(10,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
(1, 'Andi Saputra', 'IT', '2025-01-10', '200000.00', 'kontrak', 12, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'Marketing', '2025-02-15', '180000.00', 'kontrak', 6, 'PT Mitra Kerja', NULL, NULL, NULL, NULL),
(3, 'Citra Dewi', 'Keuangan', '2025-03-01', '190000.00', 'kontrak', 24, 'PT Outsource Indonesia', NULL, NULL, NULL, NULL),
(4, 'Deni Pratama', 'Gudang', '2025-01-20', '170000.00', 'kontrak', 12, 'PT Tenaga Mandiri', NULL, NULL, NULL, NULL),
(5, 'Eka Lestari', 'Produksi', '2025-04-10', '185000.00', 'kontrak', 18, 'PT SDM Nusantara', NULL, NULL, NULL, NULL),
(6, 'Farhan Rizki', 'IT', '2025-05-05', '195000.00', 'kontrak', 12, 'PT Sumber Karya', NULL, NULL, NULL, NULL),
(7, 'Gita Ayu', 'Administrasi', '2025-06-01', '175000.00', 'kontrak', 6, 'PT Mitra Kerja', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'IT', '2023-02-10', '250000.00', 'tetap', NULL, NULL, '1500000.00', 'OS001', NULL, NULL),
(9, 'Indah Sari', 'Keuangan', '2022-08-12', '260000.00', 'tetap', NULL, NULL, '1800000.00', 'OS002', NULL, NULL),
(10, 'Joko Prasetyo', 'HRD', '2021-03-18', '240000.00', 'tetap', NULL, NULL, '1600000.00', 'OS003', NULL, NULL),
(11, 'Karina Putri', 'Marketing', '2020-11-20', '255000.00', 'tetap', NULL, NULL, '1700000.00', 'OS004', NULL, NULL),
(12, 'Lukman Hakim', 'Operasional', '2019-06-15', '245000.00', 'tetap', NULL, NULL, '1550000.00', 'OS005', NULL, NULL),
(13, 'Maya Sari', 'Produksi', '2021-01-25', '250000.00', 'tetap', NULL, NULL, '1650000.00', 'OS006', NULL, NULL),
(14, 'Nanda Putra', 'IT', '2020-09-05', '270000.00', 'tetap', NULL, NULL, '1900000.00', 'OS007', NULL, NULL),
(15, 'Olivia Putri', 'IT', '2026-01-10', '75000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'KM001'),
(16, 'Putra Aditya', 'Marketing', '2026-02-01', '70000.00', 'magang', NULL, NULL, NULL, NULL, '1400000.00', 'KM002'),
(17, 'Qori Aulia', 'Keuangan', '2026-01-15', '80000.00', 'magang', NULL, NULL, NULL, NULL, '1600000.00', 'KM003'),
(18, 'Rizky Maulana', 'HRD', '2026-03-05', '75000.00', 'magang', NULL, NULL, NULL, NULL, '1500000.00', 'KM004'),
(19, 'Salsa Nabila', 'Administrasi', '2026-02-20', '70000.00', 'magang', NULL, NULL, NULL, NULL, '1450000.00', 'KM005'),
(20, 'Teguh Prakoso', 'Produksi', '2026-04-01', '80000.00', 'magang', NULL, NULL, NULL, NULL, '1550000.00', 'KM006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
