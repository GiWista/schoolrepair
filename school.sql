-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 05:43 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_parameter`
--

CREATE TABLE IF NOT EXISTS `bobot_parameter` (
  `id_bobot` int(5) NOT NULL,
  `nama_bobot` varchar(255) NOT NULL,
  `nilai_bobot` float NOT NULL,
  `ketentuan` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot_parameter`
--

INSERT INTO `bobot_parameter` (`id_bobot`, `nama_bobot`, `nilai_bobot`, `ketentuan`) VALUES
(1, 'p1', 0.181, 'max'),
(2, 'p2', 0.163, 'max'),
(3, 'p3', 0.145, 'max'),
(4, 'p4', 0.127, 'max'),
(5, 'p5', 0.109, 'min'),
(6, 'p6', 0.09, 'max'),
(7, 'p7', 0.072, 'max'),
(8, 'p8', 0.054, 'max'),
(9, 'p9', 0.036, 'max'),
(10, 'p10', 0.018, 'max');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_optimasi`
--

CREATE TABLE IF NOT EXISTS `hasil_optimasi` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(10) DEFAULT NULL,
  `nilai` varchar(55) DEFAULT NULL,
  `keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `identitas_sekolah`
--

CREATE TABLE IF NOT EXISTS `identitas_sekolah` (
  `id_sekolah` int(4) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `alamat_sekolah` varchar(50) NOT NULL,
  `tingkat_kerusakan` float NOT NULL,
  `lama_rusak` int(5) NOT NULL,
  `kapasitas_sekolah` int(5) NOT NULL,
  `intensitas_perbaikan` int(5) NOT NULL,
  `anggaran_perbaikan` int(15) NOT NULL,
  `kapasitas_lahan` int(5) NOT NULL,
  `jarak_sekolah_lain` int(5) NOT NULL,
  `jumlah_guru` int(5) NOT NULL,
  `jumlah_siswa` int(5) NOT NULL,
  `pertumbuhan_murid` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_sekolah`
--

INSERT INTO `identitas_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `tingkat_kerusakan`, `lama_rusak`, `kapasitas_sekolah`, `intensitas_perbaikan`, `anggaran_perbaikan`, `kapasitas_lahan`, `jarak_sekolah_lain`, `jumlah_guru`, `jumlah_siswa`, `pertumbuhan_murid`) VALUES
(1, 'SD Negeri 1 Ciputat', 'Ciputat', 2.14, 10, 76, 3, 4150000, 1621, 20, 40, 1199, 193),
(2, 'SD Negeri 2 Ciputat', 'Ciputat', 2.57, 12, 78, 2, 4285000, 1200, 30, 25, 686, 130),
(3, 'SD Negeri 3 Ciputat', 'Ciputat', 4.86, 18, 88, 3, 2640000, 980, 30, 19, 490, 73),
(4, 'SD Negeri 4 Ciputat', 'Ciputat', 6.57, 48, 78, 3, 5200000, 1674, 30, 28, 490, 166),
(5, 'SD Negeri 5 Ciputat', 'Ciputat', 2.29, 16, 78, 2, 3540000, 1424, 40, 11, 217, 31),
(6, 'SDN 7 Ciputat', 'Ciputat', 2.5, 13, 78, 2, 30000000, 1200, 15, 23, 200, 100),
(7, 'SDN 5 Cirendeu', 'Cirendeu', 3.4, 8, 75, 3, 15000000, 1000, 1, 25, 300, 7),
(8, 'SDN 8 Ciputat', 'Ciputat', 3.4, 1, 80, 2, 34000000, 300, 25, 32, 350, 132),
(9, 'SDN 3 Serua', 'Serua', 2.7, 3, 78, 2, 25000000, 200, 28, 25, 175, 124),
(10, 'SDN Pisangan', 'Cirendeu', 2.3, 8, 78, 4, 40000000, 456, 345, 45, 450, 89),
(11, 'SDN 7 Pamulang', 'Pamulang', 3.4, 14, 345, 3, 4500000, 342, 45, 23, 200, 67),
(12, 'SDN 1 Bukateja', 'Bukateja', 3.2, 15, 80, 3, 20000000, 450, 300, 24, 200, 45),
(13, 'SDN 1 Pondok Cabe', 'Pondok Cabe', 3, 17, 78, 2, 12000000, 500, 45, 23, 200, 67),
(14, 'SDN 1 Pondok Cabe', 'Pondok Cabe', 4, 19, 78, 4, 25000000, 500, 45, 31, 252, 80),
(15, 'SDN 2 Pondok Cabe', 'Pondok Cabe', 5, 24, 67, 4, 30000000, 430, 40, 26, 341, 76),
(16, 'SDN 3 Pondok Cabe', 'Pondok Cabe', 3, 20, 87, 4, 22000000, 520, 80, 32, 310, 98),
(17, 'SDN 4 Pondok Cabe', 'Pondok Cabe', 7, 23, 89, 4, 11000000, 230, 100, 32, 310, 78),
(18, 'SDN 5 Pondok Cabe', 'Pondok Cabe', 2, 14, 79, 4, 14000000, 340, 87, 33, 238, 76),
(19, 'SDN 6 Pondok Cabe', 'Pondok Cabe', 3, 20, 86, 4, 31000000, 400, 50, 30, 200, 80),
(20, 'SDN 7 Pondok Cabe', 'Pondok Cabe', 2, 25, 91, 3, 26000000, 530, 150, 37, 349, 97),
(21, 'SDN 1 Serua', 'Serua', 3.2, 40, 84, 3, 18000000, 600, 300, 32, 360, 80),
(22, 'SDN 1 Tanah tinggal', 'Tanah Tinggal', 4.5, 40, 90, 3, 23000000, 340, 120, 28, 276, 67),
(23, 'SDN 2 Tanah Tinggal', 'Tanah Tinggal', 3.6, 26, 75, 1, 14000000, 340, 130, 28, 290, 65),
(24, 'SDN 2 Serua', 'Serua', 3.7, 20, 94, 3, 25000000, 450, 150, 34, 390, 98),
(25, 'SDN 3 Tanah Tinggal', 'Tanah Tinggal', 3.9, 25, 87, 4, 28000000, 350, 40, 31, 290, 70),
(26, 'SDN 1 Bukit', 'Bukit', 2.4, 24, 78, 1, 19000000, 450, 90, 27, 267, 65),
(27, 'SDN 4 Tanah Tinggal', 'Tanah Tinggal', 3.8, 29, 86, 2, 29000000, 520, 100, 39, 340, 90),
(28, 'SDN 3 Serua', 'Serua', 4.2, 27, 86, 3, 25000000, 320, 80, 28, 280, 70),
(29, 'SDN 1 Cipondoh', 'Cipondoh', 3.6, 30, 87, 3, 36000000, 550, 200, 40, 380, 80),
(30, 'SDN 1 Bambu Apus', 'Bambu Apus', 3.7, 34, 91, 1, 28000000, 430, 150, 34, 290, 78),
(31, 'SDN 1 Bukit', 'Bukit', 4.5, 29, 87, 5, 31000000, 470, 210, 35, 230, 67),
(32, 'SDN 2 Bukit', 'Bukit', 3.8, 30, 93, 2, 26000000, 400, 200, 37, 300, 70),
(33, 'SDN 3 Bukit', 'Bukit', 4.5, 39, 96, 7, 40000000, 530, 300, 39, 400, 80),
(34, 'SDN 4 Bukit', 'Bukit', 3.4, 29, 87, 4, 31000000, 400, 90, 28, 310, 75),
(35, 'SDN 5 Bukit', 'Bukit', 5.1, 40, 88, 1, 39000000, 500, 300, 34, 325, 75),
(36, 'SDN 6 Bukit', 'Bukit', 3.8, 30, 87, 4, 29000000, 300, 140, 28, 320, 67),
(37, 'SDN 7 Bukit', 'Bukit', 4.7, 38, 87, 1, 11000000, 250, 200, 30, 270, 65),
(38, 'SDN 8 Bukit', 'Bukit', 3.1, 26, 87, 1, 23000000, 420, 350, 34, 342, 81),
(39, 'SDN 9 Bukit', 'Bukit', 4.5, 40, 89, 3, 31000000, 400, 150, 18, 210, 54),
(40, 'SDN 10 Bukit', 'Bukit', 2.3, 29, 87, 3, 28500000, 470, 130, 31, 310, 70),
(41, 'SDN 1 Pisangan Timur', 'Pisangan Timur', 1.2, 3, 98, 1, 11000000, 500, 250, 39, 400, 78),
(42, 'SDN 2 Pisangan Timur', 'Pisangan Timur', 3.5, 21, 85, 5, 31000000, 300, 23, 20, 210, 50),
(43, 'SDN 3 Pisangan Timur', 'Pisangan Timur', 5.3, 26, 90, 3, 26000000, 300, 320, 39, 400, 80),
(44, 'SDN 4 Pisangan Timur', 'Pisangan Timur', 3.1, 23, 89, 4, 31000000, 400, 250, 24, 304, 67),
(45, 'SDN 5 Pisangan Timur', 'Pisangan Timur', 3.7, 30, 89, 6, 31000000, 530, 320, 38, 300, 74),
(46, 'SDN 6 Pisangan Timur', 'Pisangan Timur', 4.6, 29, 91, 4, 21200000, 520, 350, 36, 310, 73),
(47, 'SDN 7 Pisangan Timur', 'Pisangan Timur', 6.9, 10, 76, 1, 29000000, 400, 80, 33, 340, 67),
(48, 'SDN 8 Pisangan Timur', 'Pisangan Timur', 3.2, 28, 87, 1, 17000000, 300, 190, 24, 240, 60),
(49, 'SDN 9 Pisangan Timur', 'Pisangan Timur', 1.8, 6, 98, 1, 11000000, 300, 110, 26, 275, 78),
(50, 'SDN 10 Pisangan Timur', 'Pisangan Timur', 3.2, 26, 88, 6, 27000000, 400, 150, 30, 270, 78);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_parameter`
--
ALTER TABLE `bobot_parameter`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `hasil_optimasi`
--
ALTER TABLE `hasil_optimasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_parameter`
--
ALTER TABLE `bobot_parameter`
  MODIFY `id_bobot` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hasil_optimasi`
--
ALTER TABLE `hasil_optimasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  MODIFY `id_sekolah` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
