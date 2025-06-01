-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peminjaman_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruang_id` bigint(20) UNSIGNED NOT NULL,
  `Pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `ruang_id`, `Pegawai_id`, `tanggal`, `jam_mulai`, `jam_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-07', '09:00:00', '11:00:00', 'Rapat Tim', NULL, NULL),
(2, 2, 2, '2025-05-08', '13:00:00', '15:00:00', 'Presentasi Produk', NULL, NULL),
(3, 3, 3, '2025-05-09', '10:00:00', '12:00:00', 'Diskusi Proyek', NULL, NULL),
(4, 4, 4, '2025-05-10', '14:00:00', '16:00:00', 'Rapat Strategi', NULL, NULL),
(5, 5, 5, '2025-05-11', '08:00:00', '10:00:00', 'Pelatihan Karyawan', NULL, NULL),
(6, 1, 6, '2025-05-12', '11:00:00', '13:00:00', 'Rapat Evaluasi', NULL, NULL),
(7, 2, 7, '2025-05-13', '15:00:00', '17:00:00', 'Koordinasi Tim', NULL, NULL),
(8, 3, 8, '2025-05-14', '09:00:00', '11:00:00', 'Rapat Anggaran', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_ruang_id_foreign` (`ruang_id`),
  ADD KEY `peminjaman_pegawai_id_foreign` (`Pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_pegawai_id_foreign` FOREIGN KEY (`Pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
