-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2020 at 05:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_presensi_ci_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `avatar`) VALUES
(1, 'Admin Dinas', 'Admin', '$2y$10$v5DS8zXwI7bDBq5aKItyLeR4hqlsNEVddFxpsMMk3YKRFFfX95Zga', 'logocil1.png');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `nama` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `npwp` int(11) DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `instansi` int(11) DEFAULT NULL,
  `unit_kerja` int(11) DEFAULT NULL,
  `alamat_unit_kerja` int(11) DEFAULT NULL,
  `pangkat` int(11) DEFAULT NULL,
  `tmpt_lahir` int(11) DEFAULT NULL,
  `tgl_lahir` int(11) DEFAULT NULL,
  `alamat_rumah` int(11) DEFAULT NULL,
  `tlp_instansi` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `cabang_bank` int(11) DEFAULT NULL,
  `no_rekening` int(11) DEFAULT NULL,
  `nama_rekening` int(11) DEFAULT NULL,
  `upload_file` int(11) DEFAULT NULL,
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `narasumber` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status_page` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `npwp` varchar(17) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `alamat_unit_kerja` varchar(225) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_rumah` varchar(100) DEFAULT NULL,
  `telepon_instansi` varchar(13) DEFAULT NULL,
  `fax_instansi` varchar(13) DEFAULT NULL,
  `nomor_hp` varchar(13) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `cabang_bank` varchar(100) DEFAULT NULL,
  `norek` varchar(20) DEFAULT NULL,
  `nama_rek` varchar(100) DEFAULT NULL,
  `tanda_tangan` varchar(255) DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  `kegiatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_ibfk_1` (`kegiatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
