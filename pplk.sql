-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 05:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pplk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `pengajar` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `pengajar`, `deskripsi`, `color`, `start`, `end`) VALUES
(2, 'Long Event', '', '', '#FF0000', '2016-01-07 00:00:00', '2016-01-10 00:00:00'),
(4, 'Conference', '', '', '#40E0D0', '2016-01-11 00:00:00', '2016-01-13 00:00:00'),
(5, 'Meeting', '', '', '#000', '2016-01-12 10:30:00', '2016-01-12 12:30:00'),
(9, 'Birthday Party', '', '', '#FFD700', '2016-01-14 07:00:00', '2016-01-14 07:00:00'),
(15, 'libur', '', '', '#40E0D0', '2016-03-25 07:00:00', '2016-03-25 09:00:00'),
(16, 'paskah2', '', '', '#FF0000', '2016-03-26 08:00:00', '2016-03-26 10:00:00'),
(20, 'paskah1', 'Erick Kurniawan', 'pelatihan untuk PT. SETIA BUDI UTAMA Jakarta', '#0071c5', '2016-03-26 09:00:00', '2016-03-26 14:00:00'),
(21, 'paskah3', '', 'lalala', '#008000', '2016-03-26 03:00:00', '2016-03-26 05:00:00'),
(23, 'asd', 'asda', 'asdasd', '#FF8C00', '2016-05-31 11:11:00', '2016-03-24 01:11:00'),
(24, 'dsa', 'dsa', 'dsa', '#FF8C00', '2016-03-31 01:01:00', '2016-03-01 03:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
`id_gambar` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `nama_gambar`) VALUES
(1, './images/1823256c5b68827c3c.jpg'),
(2, './images/2328356b76d8cc41d7.jpg'),
(3, './images/119356b76e3f1b0d0.jpg'),
(4, './images/1827856b7f90cd8431.jpg'),
(5, './images/417956b76d3618530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_lab`
--

CREATE TABLE IF NOT EXISTS `jadwal_lab` (
`id_jadwal_lab` int(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `sesi` varchar(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_lab`
--

INSERT INTO `jadwal_lab` (`id_jadwal_lab`, `lab`, `hari`, `sesi`, `nama_matkul`, `prodi`) VALUES
(1, 'Lab A', 'Senin', 'I', 'Praktikum SAP (A)', 'Teknik Informatika'),
(2, 'Lab A', 'Senin', 'II', '-', '-\r\n'),
(3, 'Lab A', 'Senin', 'III', '-', '-\r\n'),
(4, 'Lab A', 'Senin', 'IV', '-', '-\r\n'),
(5, 'Lab A', 'Selasa', 'I', '-', '-\r\n'),
(6, 'Lab A', 'Selasa', 'II', '-', '-\r\n'),
(7, 'Lab A', 'Selasa', 'III', '-', '-\r\n'),
(8, 'Lab A', 'Selasa', 'IV', '-', '-\r\n'),
(9, 'Lab A', 'Rabu', 'I', '-', '-\r\n'),
(10, 'Lab A', 'Rabu', 'II', '-', '-\r\n'),
(11, 'Lab A', 'Rabu', 'III', '-', '-\r\n'),
(12, 'Lab A', 'Rabu', 'IV', '-', '-\r\n'),
(13, 'Lab A', 'Kamis', 'I', '-', '-\r\n'),
(14, 'Lab A', 'Kamis', 'II', '-', '-\r\n'),
(15, 'Lab A', 'Kamis', 'III', '-', '-\r\n'),
(16, 'Lab A', 'Kamis', 'IV', '-', '-\r\n'),
(17, 'Lab A', 'Jumat', 'I', '-', '-\r\n'),
(18, 'Lab A', 'Jumat', 'II', '-', '-\r\n'),
(19, 'Lab A', 'Jumat', 'III', '-', '-\r\n'),
(20, 'Lab A', 'Jumat', 'IV', '-', '-\r\n'),
(21, 'Lab B', 'Senin', 'I', '-', '-'),
(22, 'Lab B', 'Senin', 'II', '-', '-\r\n'),
(23, 'Lab B', 'Senin', 'III', '-', '-\r\n'),
(24, 'Lab B', 'Senin', 'IV', '-', '-\r\n'),
(25, 'Lab B', 'Selasa', 'I', '-', '-\r\n'),
(26, 'Lab B', 'Selasa', 'II', '-', '-\r\n'),
(27, 'Lab B', 'Selasa', 'III', '-', '-\r\n'),
(28, 'Lab B', 'Selasa', 'IV', '-', '-\r\n'),
(29, 'Lab B', 'Rabu', 'I', '-', '-\r\n'),
(30, 'Lab B', 'Rabu', 'II', '-', '-\r\n'),
(31, 'Lab B', 'Rabu', 'III', '-', '-\r\n'),
(32, 'Lab B', 'Rabu', 'IV', '-', '-\r\n'),
(33, 'Lab B', 'Kamis', 'I', '-', '-\r\n'),
(34, 'Lab B', 'Kamis', 'II', '-', '-\r\n'),
(35, 'Lab B', 'Kamis', 'III', '-', '-\r\n'),
(36, 'Lab B', 'Kamis', 'IV', '-', '-\r\n'),
(37, 'Lab B', 'Jumat', 'I', '-', '-\r\n'),
(38, 'Lab B', 'Jumat', 'II', '-', '-\r\n'),
(39, 'Lab B', 'Jumat', 'III', '-', '-\r\n'),
(40, 'Lab B', 'Jumat', 'IV', '-', '-\r\n'),
(41, 'Lab C', 'Senin', 'I', '-', '-'),
(42, 'Lab C', 'Senin', 'II', '-', '-'),
(43, 'Lab C', 'Senin', 'III', '-', '-'),
(44, 'Lab C', 'Senin', 'IV', '-', '-'),
(45, 'Lab C', 'Selasa', 'I', '-', '-'),
(46, 'Lab C', 'Selasa', 'II', '-', '-'),
(47, 'Lab C', 'Selasa', 'III', '-', '-'),
(48, 'Lab C', 'Selasa', 'IV', '-', '-'),
(49, 'Lab C', 'Rabu', 'I', '-', '-'),
(50, 'Lab C', 'Rabu', 'II', '-', '-'),
(51, 'Lab C', 'Rabu', 'III', '-', '-'),
(52, 'Lab C', 'Rabu', 'IV', '-', '-'),
(53, 'Lab C', 'Kamis', 'I', '-', '-'),
(54, 'Lab C', 'Kamis', 'II', '-', '-'),
(55, 'Lab C', 'Kamis', 'III', '-', '-'),
(56, 'Lab C', 'Kamis', 'IV', '-', '-'),
(57, 'Lab C', 'Jumat', 'I', '-', '-'),
(58, 'Lab C', 'Jumat', 'II', '-', '-'),
(59, 'Lab C', 'Jumat', 'III', '-', '-'),
(60, 'Lab C', 'Jumat', 'IV', '-', '-'),
(61, 'Lab D', 'Senin', 'I', '-', '-'),
(62, 'Lab D', 'Senin', 'II', '-', '-'),
(63, 'Lab D', 'Senin', 'III', '-', '-'),
(64, 'Lab D', 'Senin', 'IV', '-', '-'),
(65, 'Lab D', 'Selasa', 'I', '-', '-'),
(66, 'Lab D', 'Selasa', 'II', '-', '-'),
(67, 'Lab D', 'Selasa', 'III', '-', '-'),
(68, 'Lab D', 'Selasa', 'IV', '-', '-'),
(69, 'Lab D', 'Rabu', 'I', '-', '-'),
(70, 'Lab D', 'Rabu', 'II', '-', '-'),
(71, 'Lab D', 'Rabu', 'III', '-', '-'),
(72, 'Lab D', 'Rabu', 'IV', '-', '-'),
(73, 'Lab D', 'Kamis', 'I', '-', '-'),
(74, 'Lab D', 'Kamis', 'II', '-', '-'),
(75, 'Lab D', 'Kamis', 'III', '-', '-'),
(76, 'Lab D', 'Kamis', 'IV', '-', '-'),
(77, 'Lab D', 'Jumat', 'I', '-', '-'),
(78, 'Lab D', 'Jumat', 'II', '-', '-'),
(79, 'Lab D', 'Jumat', 'III', '-', '-'),
(80, 'Lab D', 'Jumat', 'IV', '-', '-'),
(81, 'Lab E', 'Senin', 'I', '-', '-'),
(82, 'Lab E', 'Senin', 'II', '-', '-'),
(83, 'Lab E', 'Senin', 'III', '-', '-'),
(84, 'Lab E', 'Senin', 'IV', '-', '-'),
(85, 'Lab E', 'Selasa', 'I', '-', '-'),
(86, 'Lab E', 'Selasa', 'II', '-', '-'),
(87, 'Lab E', 'Selasa', 'III', '-', '-'),
(88, 'Lab E', 'Selasa', 'IV', '-', '-'),
(89, 'Lab E', 'Rabu', 'I', '-', '-'),
(90, 'Lab E', 'Rabu', 'II', '-', '-'),
(91, 'Lab E', 'Rabu', 'III', '-', '-'),
(92, 'Lab E', 'Rabu', 'IV', '-', '-'),
(93, 'Lab E', 'Kamis', 'I', '-', '-'),
(94, 'Lab E', 'Kamis', 'II', '-', '-'),
(95, 'Lab E', 'Kamis', 'III', '-', '-'),
(96, 'Lab E', 'Kamis', 'IV', '-', '-'),
(97, 'Lab E', 'Jumat', 'I', '-', '-'),
(98, 'Lab E', 'Jumat', 'II', '-', '-'),
(99, 'Lab E', 'Jumat', 'III', '-', '-'),
(100, 'Lab E', 'Jumat', 'IV', '-', '-'),
(101, 'Lab F', 'Senin', 'I', '-', '-'),
(102, 'Lab F', 'Senin', 'II', '-', '-'),
(103, 'Lab F', 'Senin', 'III', '-', '-'),
(104, 'Lab F', 'Senin', 'IV', '-', '-'),
(105, 'Lab F', 'Selasa', 'I', '-', '-'),
(106, 'Lab F', 'Selasa', 'II', '-', '-'),
(107, 'Lab F', 'Selasa', 'III', '-', '-'),
(108, 'Lab F', 'Selasa', 'IV', '-', '-'),
(109, 'Lab F', 'Rabu', 'I', '-', '-'),
(110, 'Lab F', 'Rabu', 'II', '-', '-'),
(111, 'Lab F', 'Rabu', 'III', '-', '-'),
(112, 'Lab F', 'Rabu', 'IV', '-', '-'),
(113, 'Lab F', 'Kamis', 'I', '-', '-'),
(114, 'Lab F', 'Kamis', 'II', '-', '-'),
(115, 'Lab F', 'Kamis', 'III', '-', '-'),
(116, 'Lab F', 'Kamis', 'IV', '-', '-'),
(117, 'Lab F', 'Jumat', 'I', '-', '-'),
(118, 'Lab F', 'Jumat', 'II', '-', '-'),
(119, 'Lab F', 'Jumat', 'III', '-', '-'),
(120, 'Lab F', 'Jumat', 'IV', '-', '-'),
(121, 'Lab G', 'Senin', 'I', '-', '-'),
(122, 'Lab G', 'Senin', 'II', '-', '-'),
(123, 'Lab G', 'Senin', 'III', '-', '-'),
(124, 'Lab G', 'Senin', 'IV', '-', '-'),
(125, 'Lab G', 'Selasa', 'I', '-', '-'),
(126, 'Lab G', 'Selasa', 'II', '-', '-'),
(127, 'Lab G', 'Selasa', 'III', '-', '-'),
(128, 'Lab G', 'Selasa', 'IV', '-', '-'),
(129, 'Lab G', 'Rabu', 'I', '-', '-'),
(130, 'Lab G', 'Rabu', 'II', '-', '-'),
(131, 'Lab G', 'Rabu', 'III', '-', '-'),
(132, 'Lab G', 'Rabu', 'IV', '-', '-'),
(133, 'Lab G', 'Kamis', 'I', '-', '-'),
(134, 'Lab G', 'Kamis', 'II', '-', '-'),
(135, 'Lab G', 'Kamis', 'III', '-', '-'),
(136, 'Lab G', 'Kamis', 'IV', '-', '-'),
(137, 'Lab G', 'Jumat', 'I', '-', '-'),
(138, 'Lab G', 'Jumat', 'II', '-', '-'),
(139, 'Lab G', 'Jumat', 'III', '-', '-'),
(140, 'Lab G', 'Jumat', 'IV', '-', '-'),
(141, 'Lab H', 'Senin', 'I', '-', '-'),
(142, 'Lab H', 'Senin', 'II', '-', '-'),
(143, 'Lab H', 'Senin', 'III', '-', '-'),
(144, 'Lab H', 'Senin', 'IV', '-', '-'),
(145, 'Lab H', 'Selasa', 'I', '-', '-'),
(146, 'Lab H', 'Selasa', 'II', '-', '-'),
(147, 'Lab H', 'Selasa', 'III', '-', '-'),
(148, 'Lab H', 'Selasa', 'IV', '-', '-'),
(149, 'Lab H', 'Rabu', 'I', '-', '-'),
(150, 'Lab H', 'Rabu', 'II', '-', '-'),
(151, 'Lab H', 'Rabu', 'III', '-', '-'),
(152, 'Lab H', 'Rabu', 'IV', '-', '-'),
(153, 'Lab H', 'Kamis', 'I', '-', '-'),
(154, 'Lab H', 'Kamis', 'II', '-', '-'),
(155, 'Lab H', 'Kamis', 'III', '-', '-'),
(156, 'Lab H', 'Kamis', 'IV', '-', '-'),
(157, 'Lab H', 'Jumat', 'I', '-', '-'),
(158, 'Lab H', 'Jumat', 'II', '-', '-'),
(159, 'Lab H', 'Jumat', 'III', '-', '-'),
(160, 'Lab H', 'Jumat', 'IV', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kritik`
--

CREATE TABLE IF NOT EXISTS `kritik` (
`id_kritik` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `nama`, `pesan`, `tanggal`) VALUES
(1, 'asd', 'dsa', '0000-00-00'),
(2, '12132131', '123', '2016-02-17'),
(3, 'SSSA', 'ASFASDA', '2016-02-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `jadwal_lab`
--
ALTER TABLE `jadwal_lab`
 ADD PRIMARY KEY (`id_jadwal_lab`);

--
-- Indexes for table `kritik`
--
ALTER TABLE `kritik`
 ADD PRIMARY KEY (`id_kritik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal_lab`
--
ALTER TABLE `jadwal_lab`
MODIFY `id_jadwal_lab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `kritik`
--
ALTER TABLE `kritik`
MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
