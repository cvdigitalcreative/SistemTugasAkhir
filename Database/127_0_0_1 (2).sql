-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 04:13 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemtugasakhir`
--
CREATE DATABASE IF NOT EXISTS `sistemtugasakhir` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistemtugasakhir`;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nip` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`) VALUES
(1, 'budi', '09120394019201'),
(2, 'megah', '09123402429420');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nim` varchar(250) NOT NULL,
  `judul_tugas_akhir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama`, `nim`, `judul_tugas_akhir`) VALUES
(1, 'neymar', '09101002038', 'mencoba mencari kebenaraan'),
(2, 'malian zikri', '091020024', 'mencintai sepenuh hati'),
(3, 'aby', '0123456789', 'testing tugas akhir');

-- --------------------------------------------------------

--
-- Table structure for table `seminartugasakhir`
--

CREATE TABLE `seminartugasakhir` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` varchar(250) NOT NULL,
  `berkastugasakhir` varchar(250) DEFAULT NULL,
  `statusujian` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminartugasakhir`
--

INSERT INTO `seminartugasakhir` (`id`, `id_mahasiswa`, `berkastugasakhir`, `statusujian`) VALUES
(1, '09101002038', 'Invoice_060_-_IT_-_Project_Website_SPP_Negeri_Sembawa_Banyuasin_-_ITI060.pdf', 0),
(3, '091020024', '5__Laporan_Keuangan_Januari_20181.pdf', 2),
(4, '0123456789', '1__Laporan_Keuangan_September_2017.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tugasakhir`
--

CREATE TABLE `tugasakhir` (
  `id` int(11) NOT NULL,
  `nim` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `judul_tugas_akhir` text NOT NULL,
  `id_pembimbing_1` int(11) NOT NULL,
  `id_pembimbing_2` int(11) NOT NULL,
  `status_proposal_pembimbing_1` int(11) NOT NULL DEFAULT '0',
  `status_proposal_pembimbing_2` int(11) NOT NULL DEFAULT '0',
  `berkas_proposal` varchar(250) DEFAULT NULL,
  `status_tugas_akhir` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugasakhir`
--

INSERT INTO `tugasakhir` (`id`, `nim`, `nama`, `judul_tugas_akhir`, `id_pembimbing_1`, `id_pembimbing_2`, `status_proposal_pembimbing_1`, `status_proposal_pembimbing_2`, `berkas_proposal`, `status_tugas_akhir`) VALUES
(1, '09101002038', 'neymar', 'mencoba mencari kebenaraan', 1, 2, 0, 0, '1__Laporan_Keuangan_September_2017.pdf', 0),
(2, '091020024', 'malian zikri', 'mencintai sepenuh hati', 2, 1, 0, 0, NULL, 0),
(3, '0123456789', 'aby', 'testing tugas akhir', 2, 1, 3, 3, '7__Laporan_Keuangan_Maret_2018.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ujianterakhir`
--

CREATE TABLE `ujianterakhir` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` varchar(250) NOT NULL,
  `id_pembimbing` varchar(250) NOT NULL,
  `bab_1_status` int(11) NOT NULL DEFAULT '0',
  `tanggal_bab_1` varchar(250) DEFAULT NULL,
  `bab_2_status` int(11) NOT NULL DEFAULT '0',
  `tanggal_bab_2` varchar(250) DEFAULT NULL,
  `bab_3_status` int(11) NOT NULL DEFAULT '0',
  `tanggal_bab_3` varchar(250) DEFAULT NULL,
  `bab_4_status` int(11) NOT NULL DEFAULT '0',
  `tanggal_bab_4` varchar(250) DEFAULT NULL,
  `bab_5_status` int(11) NOT NULL DEFAULT '0',
  `tanggal_bab_5` varchar(250) DEFAULT NULL,
  `program_status` int(11) NOT NULL DEFAULT '0',
  `tanggal_program` varchar(250) DEFAULT NULL,
  `status_pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujianterakhir`
--

INSERT INTO `ujianterakhir` (`id`, `id_mahasiswa`, `id_pembimbing`, `bab_1_status`, `tanggal_bab_1`, `bab_2_status`, `tanggal_bab_2`, `bab_3_status`, `tanggal_bab_3`, `bab_4_status`, `tanggal_bab_4`, `bab_5_status`, `tanggal_bab_5`, `program_status`, `tanggal_program`, `status_pembimbing`) VALUES
(5, '091020024', '2', 1, '2018-06-26 14:19:26', 1, '2018-06-26 14:19:27', 1, '2018-06-26 14:19:28', 1, '2018-06-26 14:19:29', 1, '2018-06-26 14:19:30', 1, '2018-06-26 14:19:30', 1),
(6, '091020024', '1', 1, '2018-06-26 14:19:09', 1, '2018-06-26 14:19:10', 1, '2018-06-26 14:19:11', 1, '2018-06-26 14:19:11', 1, '2018-06-26 14:19:12', 1, '2018-06-26 14:19:13', 2),
(7, '0123456789', '2', 1, '2018-06-25 13:27:03', 1, '2018-06-25 13:27:04', 1, '2018-06-25 13:27:05', 1, '2018-06-25 13:27:06', 1, '2018-06-25 13:27:08', 1, '2018-06-25 13:27:09', 1),
(8, '0123456789', '1', 1, '2018-06-25 13:25:51', 1, '2018-06-25 13:26:19', 1, '2018-06-25 13:26:20', 1, '2018-06-25 13:26:21', 1, '2018-06-25 13:26:22', 1, '2018-06-25 13:26:23', 2),
(11, '09101002038', '1', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 1),
(12, '09101002038', '2', 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, '1', '21232f297a57a5a743894a0e4a801fc3', 2),
(2, '09101002038', 'bfca9981ba2620170a377b2b5e334a14', 1),
(3, '2', '21232f297a57a5a743894a0e4a801fc3', 2),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 3),
(5, '091020024', '478b78fab697d8a96141f7291c98a36a', 1),
(6, '0123456789', '781e5e245d69b566979b86e28d23f2c7', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `seminartugasakhir`
--
ALTER TABLE `seminartugasakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujianterakhir`
--
ALTER TABLE `ujianterakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminartugasakhir`
--
ALTER TABLE `seminartugasakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ujianterakhir`
--
ALTER TABLE `ujianterakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
