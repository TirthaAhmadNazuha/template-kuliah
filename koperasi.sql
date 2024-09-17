-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2024 at 04:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `no_anggota` varchar(20) NOT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `wajib` int(11) DEFAULT NULL,
  `pokok` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`no_anggota`, `nama`, `wajib`, `pokok`, `saldo`, `created_at`, `updated_at`) VALUES
('24ba31567dda7ed86c18', 'babbab', NULL, NULL, NULL, '2024-09-01 07:41:40', '2024-09-01 07:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kasir`
--

CREATE TABLE `tbl_kasir` (
  `kodeksr` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kasir`
--

INSERT INTO `tbl_kasir` (`kodeksr`, `username`, `password`) VALUES
('001', 'admin', 'password123'),
('002', 'admin2', 'password456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `no_pinjam` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_anggota` varchar(20) DEFAULT NULL,
  `jml_pinjam` int(11) DEFAULT NULL,
  `kodeksr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpan`
--

CREATE TABLE `tbl_simpan` (
  `no_simpan` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_anggota` varchar(20) DEFAULT NULL,
  `jml_simpan` int(11) DEFAULT NULL,
  `kodeksr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  ADD PRIMARY KEY (`kodeksr`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `kodeksr` (`kodeksr`);

--
-- Indexes for table `tbl_simpan`
--
ALTER TABLE `tbl_simpan`
  ADD PRIMARY KEY (`no_simpan`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `kodeksr` (`kodeksr`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD CONSTRAINT `tbl_pinjam_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `tbl_anggota` (`no_anggota`),
  ADD CONSTRAINT `tbl_pinjam_ibfk_2` FOREIGN KEY (`kodeksr`) REFERENCES `tbl_kasir` (`kodeksr`);

--
-- Constraints for table `tbl_simpan`
--
ALTER TABLE `tbl_simpan`
  ADD CONSTRAINT `tbl_simpan_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `tbl_anggota` (`no_anggota`),
  ADD CONSTRAINT `tbl_simpan_ibfk_2` FOREIGN KEY (`kodeksr`) REFERENCES `tbl_kasir` (`kodeksr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
