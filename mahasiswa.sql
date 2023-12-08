-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2023 pada 20.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` bigint(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Kode_Prodi` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Kode_Prodi`) VALUES
(121130301, 'Bambang Susanto', 20201),
(121130302, 'Rina Agustina', 20201),
(121130303, 'Eko Prasetyo', 20201),
(121130304, 'Siti Rahayu', 20201),
(121130305, 'Hadi Saputra', 20201),
(121130306, 'Diana Putri', 20201),
(121140301, 'Ahmad Budi Santoso', 55202),
(121140302, 'Siti Fatimah', 55202),
(121140303, 'Rudi Hermawan', 55202),
(121140304, 'Lina Sari', 55202),
(121140305, 'Hendra Wijaya', 55202),
(121140306, 'Dewi Anggraeni', 55202),
(121280301, 'Rudiawan Wijaya', 24201),
(121280302, 'Siti Nurul Hasanah', 24201),
(121280303, 'Dian Setiawan', 24201),
(121280304, 'Krisna Pratama', 24201),
(121280305, 'Maya Sari', 24201),
(121280306, 'Irfan Nugraha', 24201),
(121320301, 'Dwi Cahyono', 30201),
(121320302, 'Nia Fitriani', 30201),
(121320303, 'Rizky Maulana', 30201),
(121320304, 'Nurul Hidayah', 30201),
(121320305, 'Arief Setiawan', 30201),
(121320306, 'Sri Wahyuni', 30201),
(121450301, 'Agus Setiawan', 49202),
(121450302, 'Wulan Sari', 49202),
(121450303, 'Yoga Prabowo', 49202),
(121450304, 'Sri Lestari', 49202),
(121450305, 'Firman Hidayat', 49202),
(121450306, 'Rina Fitriani', 49202);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` bigint(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`) VALUES
(20201, 'Teknik Elektro'),
(24201, 'Teknik Kimia'),
(30201, 'Teknik Fisika'),
(49202, 'Sains Data'),
(55202, 'Teknik Informatika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `Kode_Prodi` (`Kode_Prodi`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`Kode_Prodi`) REFERENCES `prodi` (`kode_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
