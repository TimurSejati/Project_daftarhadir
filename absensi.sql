-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2020 at 10:43 AM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barepset_absensi`
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
(1, 'Admin', 'Admin', '$2y$10$v5DS8zXwI7bDBq5aKItyLeR4hqlsNEVddFxpsMMk3YKRFFfX95Zga', 'logocil1.png');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `narasumber` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status_page` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `judul`, `slug`, `narasumber`, `tanggal`, `status_page`) VALUES
(56, 'dpsds', 'pptk', 'dpsds', 'ddd', '2020-10-06', 0),
(57, 'umum2020', 'keuangan', 'umum2020', 'Aji', '2020-10-16', 1),
(58, 'pip2020', 'Program Indonesia Pintar 2020', 'pip2020', 'Aji aji', '2020-10-06', 0),
(59, 'Diklat Pengawas', 'Diklat Pengawas', 'diklat-pengawas', 'Trio Ruktio', '2020-10-15', 0),
(61, 'tes2020', 'Testing Aplikasi Daftar Hadir Dinas Pendidikan dan Kebudayaan Kab. Cilacap', 'tes2020', 'Bpk. Trio Rukito,S.Kom', '2020-10-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `alamat_unit_kerja` varchar(225) NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `nip`, `jabatan`, `instansi`, `unit_kerja`, `alamat_unit_kerja`, `tanda_tangan`, `kegiatan_id`) VALUES
(47, 'Mohamad Prasetyo Aji', '123456789987654321', 'Staf Pelaksana Perencanaan ', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'ssss', 'ssss', 'assets/images/4ff7afd128899178a417f08545c1886d.png', 57),
(48, 'admina', '123456789123456789', 'asdas', 'asdasd', 'asdsad', 'asdasd', 'assets/images/1982f76c34f02d222246ecedb4b7bec4.png', 59),
(49, 'Jans', '098765432123456789', 'fasfsd', 'asdasd', 'asdsadas', 'asdasd', 'assets/images/0359565ab23cfe0b7d37f2f39cc4cc0b.png', 59),
(50, 'sedsd', '432167854321567843', 'sadasd', 'asdasd', 'asdasd', 'asdasd', 'assets/images/e2d3f21a7317d14dc3101992053ae7b6.png', 59),
(51, 'Farras Ammar I', '123456789987654321', 'Staf Pelaksana Perencanaan ', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'ssss', 'ssss', 'assets/images/9368b2a97536f39ba6e8db87a475ee6f.png', 57),
(52, 'Farras Ammar Isnandy', '987654321123456789', 'Staf Pelaksana Perencanaan ', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'ssss', 'ssss', 'assets/images/0bd8ec3754a2c4f3a73f07aa63937e40.png', 61),
(53, 'Syech', '192167322008231002', 'GURU', 'SDN Jajal', 'Sdn Jajal', 'Jl pelan pelan', 'assets/images/ee54861595945c0a891ced6f72e83666.png', 61),
(54, 'Diaz Ganteng', '192456789129876543', 'Staff Subag keuangan & Aset', 'Dinas Pendidikan dan Kebudayaan Cilacap', 'Dinas Pendidikan dan Kebudayaan ', 'Jl. Kalimantan no 51', 'assets/images/f6952935728c4558226520b08e3be87a.png', 61),
(55, 'Mohamad Prasetyo Aji', '0', 'Staf Pelaksana Bidang Dikdas ', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'ssss', 'ssss', 'assets/images/91221f497d41af0e62fbd3beefa5bbc7.png', 61),
(56, 'TRIO RUKITO', '197705162006041004', 'Staff Perenanaan', 'Dinas P dan K', 'Dinas P dan K Kab. Cilacap', 'Jl. Kalimantan no 51', 'assets/images/8049ecc02b131bc2eaa80c8709df8615.png', 61),
(57, 'VERONICA ARINDA PUTRI ', '111996311219941014', 'ADMINISTRASI', 'PT', 'ADALAH', 'GATSU', 'assets/images/7cc665d637037ea6342bcff1868a319e.png', 61),
(58, 'Farras Aji Prasetyo', '123456789987654321', 'PRO PLAYER', 'FREE FIRE', 'Bang Gift Alok', 'Jalan Kemana Aja Asal Sama Kamu', 'assets/images/d25cfa477647c8383521a050e32124be.png', 61),
(59, 'Aimatun Khasanah', '0', 'aaa', 'aaa', 'aaa', 'bbb', 'assets/images/dfbb26db44f410ec3ace215770961d90.png', 61),
(60, 'ISOFI LASPIRIYANTI ', '0', 'Pelaksanaan administrasi ', 'Dinas Pendidikan dan Kebudayaan ', 'SUB BAGIAN UMUM DAN KEPEGAWAIAN ', 'Jl. Kalimantan No 51', 'assets/images/12f9e561ffd1aac490a06124cd68cde3.png', 61),
(61, 'Yunan Adhi', '364826433482', 'Staf Pelaksana Perencanaan ', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'Kementerian Pendidikan dan Kebudayaan', 'Jl. Kalimantan no. 51', 'assets/images/cd04cf485b05b137b4bbf4705e211067.png', 61),
(62, 'Eti Wahyuni', '432428248284782', 'Staf Pelaksana Perencanaan ', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'Kementerian Pendidikan dan Kebudayaan', 'Jl. Kalimantan no. 51', 'assets/images/adb9325118b7d7ce49da801168eaa9f5.png', 61),
(63, 'Larasati DS', '4324282782', 'Staf Paud', 'Kementerian Pendidikan dan Kebudayaan', 'Direktorat Jendral PAUD', 'Jl. Jakarta', 'assets/images/a5e3f546c7d5a33606e9fc9aa318705a.png', 61),
(64, 'Karina Gina P', '117162172', 'Staf Sarpras', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'Bidang Sarana dan Prasarana', 'Jl. Kalimantan no. 51', 'assets/images/956240ef3c294672147b87b15a450d6d.png', 61),
(65, 'Pengagum Rahasia', '15151515151', 'Pemerhati Dirimu', 'PT MENCARI CINTA SEJATI', 'Penjaga Hatimu', 'Jalan Lubuk Hati Paling Dalam', 'assets/images/5db0e611beffcd62f4c3b00aa884b486.png', 61),
(66, 'Bu dwi H', '15151515151', 'Staf Dikdas', 'Dinas Pendidikan Dan Kebudayaan Kabupaten Cilacap', 'Bidang Pendidikan Dasar', 'Jl. Kalimantan no. 51', 'assets/images/69c97a92d6f5899ae78e04e6788abe45.png', 61),
(67, 'Ade', '777724031997777', 'Staff PPTK PAUD DIKMAS', 'Dinas Pendidikan dan Kebudayaan Cilacap', 'Malioboro', 'Yogyakarta', 'assets/images/d15e7f544f94c845e348b52bac8a2273.png', 61);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
