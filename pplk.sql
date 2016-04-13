-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 12:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `pengajar` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

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
(24, 'dsa', 'dsa', 'dsa', '#FF8C00', '2016-03-31 01:01:00', '2016-03-01 03:33:00'),
(25, 'kursus ASP.NET MVC 5', 'Erick Kurniawan', 'Kursus ASP.NET MVC 5 mulai dari bootstrap, dsb.', '#000', '2016-04-14 10:00:00', '2016-04-18 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `nama_gambar`) VALUES
(1, './images/15332570a274b6649e.jpg'),
(2, './images/2328356b76d8cc41d7.jpg'),
(3, './images/119356b76e3f1b0d0.jpg'),
(4, './images/263405709bf1976038.jpeg'),
(5, './images/417956b76d3618530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_lab`
--

CREATE TABLE IF NOT EXISTS `jadwal_lab` (
  `id_jadwal_lab` int(11) NOT NULL AUTO_INCREMENT,
  `id_lab` int(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  PRIMARY KEY (`id_jadwal_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jadwal_lab`
--

INSERT INTO `jadwal_lab` (`id_jadwal_lab`, `id_lab`, `nama_matkul`, `prodi`, `status`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 1, 'Algoritma dan Pemrograman', 'Sistem Informasi', 'Reguler', '2016-04-09', '2016-04-09'),
(3, 5, 'Desain Game', 'Sistem Informasi', 'Reguler', '2016-04-09', '2016-04-09'),
(9, 29, 'Ervan Ganteng', 'Sistem Informasi', 'Reguler', '2016-04-09', '2016-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `kritik`
--

CREATE TABLE IF NOT EXISTS `kritik` (
  `id_kritik` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_kritik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `email`, `nama`, `pesan`, `tanggal`) VALUES
(33, 'monxanbel@gmail.com', 'monxanbel', 'uji coba', '2016-04-11 23:27:28'),
(34, 'monxanbel@gmail.com', 'monxanbel', 'lala', '2016-04-12 23:25:57'),
(35, 'monxanbel@gmail.com', 'monxanbel', 'lalala', '2016-04-12 23:36:15'),
(36, 'monxanbel@gmail.com', 'monxanbel', 'lalala', '2016-04-12 23:39:08'),
(37, 'monxanbel@gmail.com', 'monxanbel', 'aaaa', '2016-04-12 23:39:31'),
(38, 'monxanbel@gmail.com', 'monxanbel', 'oaoaoaoa', '2016-04-12 23:45:49'),
(39, 'monxanbel@gmail.com', 'monxanbel', 'LALALA', '2016-04-12 23:50:41'),
(40, 'monxanbel@gmail.com', 'monxanbel', 'aodasaa', '2016-04-12 23:53:18'),
(41, 'monxanbel@gmail.com', 'monxanbel', 'asadasa', '2016-04-12 23:54:44'),
(42, 'monxanbel@gmail.com', 'monxanbel', 'adas', '2016-04-12 23:58:40'),
(43, 'monxanbel@gmail.com', 'monxanbel', 'sadasda', '2016-04-13 00:03:58'),
(44, 'monxanbel@gmail.com', 'monxanbel', 'lala', '2016-04-13 23:25:32'),
(45, 'Monxanbel@gmail.com', 'maria', 'lala', '2016-04-13 23:26:52'),
(46, 'monxanbel@gmail.com', 'monxanbel', 'lalala', '2016-04-13 23:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `id_lab` int(11) NOT NULL AUTO_INCREMENT,
  `lab` varchar(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `sesi` varchar(11) NOT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `lab`, `hari`, `sesi`) VALUES
(1, 'Lab A', 'Senin', 'I'),
(2, 'Lab A', 'Senin', 'II'),
(3, 'Lab A', 'Senin', 'III'),
(4, 'Lab A', 'Senin', 'IV'),
(5, 'Lab A', 'Selasa', 'I'),
(6, 'Lab A', 'Selasa', 'II'),
(7, 'Lab A', 'Selasa', 'III'),
(8, 'Lab A', 'Selasa', 'IV'),
(9, 'Lab A', 'Rabu', 'I'),
(10, 'Lab A', 'Rabu', 'II'),
(11, 'Lab A', 'Rabu', 'III'),
(12, 'Lab A', 'Rabu', 'IV'),
(13, 'Lab A', 'Kamis', 'I'),
(14, 'Lab A', 'Kamis', 'II'),
(15, 'Lab A', 'Kamis', 'III'),
(16, 'Lab A', 'Kamis', 'IV'),
(17, 'Lab A', 'Jumat', 'I'),
(18, 'Lab A', 'Jumat', 'II'),
(19, 'Lab A', 'Jumat', 'III'),
(20, 'Lab A', 'Jumat', 'IV'),
(21, 'Lab A', 'Sabtu', 'I'),
(22, 'Lab A', 'Sabtu', 'II'),
(23, 'Lab A', 'Sabtu', 'III'),
(24, 'Lab A', 'Sabtu', 'IV'),
(25, 'Lab A', 'Minggu', 'I'),
(26, 'Lab A', 'Minggu', 'II'),
(27, 'Lab A', 'Minggu', 'III'),
(28, 'Lab A', 'Minggu', 'IV'),
(29, 'Lab B', 'Senin', 'I'),
(30, 'Lab B', 'Senin', 'II'),
(31, 'Lab B', 'Senin', 'III'),
(32, 'Lab B', 'Senin', 'IV'),
(33, 'Lab B', 'Selasa', 'I'),
(34, 'Lab B', 'Selasa', 'II'),
(35, 'Lab B', 'Selasa', 'III'),
(36, 'Lab B', 'Selasa', 'IV'),
(37, 'Lab B', 'Rabu', 'I'),
(38, 'Lab B', 'Rabu', 'II'),
(39, 'Lab B', 'Rabu', 'III'),
(40, 'Lab B', 'Rabu', 'IV'),
(41, 'Lab B', 'Kamis', 'I'),
(42, 'Lab B', 'Kamis', 'II'),
(43, 'Lab B', 'Kamis', 'III'),
(44, 'Lab B', 'Kamis', 'IV'),
(45, 'Lab B', 'Jumat', 'I'),
(46, 'Lab B', 'Jumat', 'II'),
(47, 'Lab B', 'Jumat', 'III'),
(48, 'Lab B', 'Jumat', 'IV'),
(49, 'Lab B', 'Sabtu', 'I'),
(50, 'Lab B', 'Sabtu', 'II'),
(51, 'Lab B', 'Sabtu', 'III'),
(52, 'Lab B', 'Sabtu', 'IV'),
(53, 'Lab B', 'Minggu', 'I'),
(54, 'Lab B', 'Minggu', 'II'),
(55, 'Lab B', 'Minggu', 'III'),
(56, 'Lab B', 'Minggu', 'IV'),
(57, 'Lab C', 'Senin', 'I'),
(58, 'Lab C', 'Senin', 'II'),
(59, 'Lab C', 'Senin', 'III'),
(60, 'Lab C', 'Senin', 'IV'),
(61, 'Lab C', 'Selasa', 'I'),
(62, 'Lab C', 'Selasa', 'II'),
(63, 'Lab C', 'Selasa', 'III'),
(64, 'Lab C', 'Selasa', 'IV'),
(65, 'Lab C', 'Rabu', 'I'),
(66, 'Lab C', 'Rabu', 'II'),
(67, 'Lab C', 'Rabu', 'III'),
(68, 'Lab C', 'Rabu', 'IV'),
(69, 'Lab C', 'Kamis', 'I'),
(70, 'Lab C', 'Kamis', 'II'),
(71, 'Lab C', 'Kamis', 'III'),
(72, 'Lab C', 'Kamis', 'IV'),
(73, 'Lab C', 'Jumat', 'I'),
(74, 'Lab C', 'Jumat', 'II'),
(75, 'Lab C', 'Jumat', 'III'),
(76, 'Lab C', 'Jumat', 'IV'),
(77, 'Lab C', 'Sabtu', 'I'),
(78, 'Lab C', 'Sabtu', 'II'),
(79, 'Lab C', 'Sabtu', 'III'),
(80, 'Lab C', 'Sabtu', 'IV'),
(81, 'Lab C', 'Minggu', 'I'),
(82, 'Lab C', 'Minggu', 'II'),
(83, 'Lab C', 'Minggu', 'III'),
(84, 'Lab C', 'Minggu', 'IV'),
(85, 'Lab D', 'Senin', 'I'),
(86, 'Lab D', 'Senin', 'II'),
(87, 'Lab D', 'Senin', 'III'),
(88, 'Lab D', 'Senin', 'IV'),
(89, 'Lab D', 'Selasa', 'I'),
(90, 'Lab D', 'Selasa', 'II'),
(91, 'Lab D', 'Selasa', 'III'),
(92, 'Lab D', 'Selasa', 'IV'),
(93, 'Lab D', 'Rabu', 'I'),
(94, 'Lab D', 'Rabu', 'II'),
(95, 'Lab D', 'Rabu', 'III'),
(96, 'Lab D', 'Rabu', 'IV'),
(97, 'Lab D', 'Kamis', 'I'),
(98, 'Lab D', 'Kamis', 'II'),
(99, 'Lab D', 'Kamis', 'III'),
(100, 'Lab D', 'Kamis', 'IV'),
(101, 'Lab D', 'Jumat', 'I'),
(102, 'Lab D', 'Jumat', 'II'),
(103, 'Lab D', 'Jumat', 'III'),
(104, 'Lab D', 'Jumat', 'IV'),
(105, 'Lab D', 'Sabtu', 'I'),
(106, 'Lab D', 'Sabtu', 'II'),
(107, 'Lab D', 'Sabtu', 'III'),
(108, 'Lab D', 'Sabtu', 'IV'),
(109, 'Lab D', 'Minggu', 'I'),
(110, 'Lab D', 'Minggu', 'II'),
(111, 'Lab D', 'Minggu', 'III'),
(112, 'Lab D', 'Minggu', 'IV'),
(113, 'Lab E', 'Senin', 'I'),
(114, 'Lab E', 'Senin', 'II'),
(115, 'Lab E', 'Senin', 'III'),
(116, 'Lab E', 'Senin', 'IV'),
(117, 'Lab E', 'Selasa', 'I'),
(118, 'Lab E', 'Selasa', 'II'),
(119, 'Lab E', 'Selasa', 'III'),
(120, 'Lab E', 'Selasa', 'IV'),
(121, 'Lab E', 'Rabu', 'I'),
(122, 'Lab E', 'Rabu', 'II'),
(123, 'Lab E', 'Rabu', 'III'),
(124, 'Lab E', 'Rabu', 'IV'),
(125, 'Lab E', 'Kamis', 'I'),
(126, 'Lab E', 'Kamis', 'II'),
(127, 'Lab E', 'Kamis', 'III'),
(128, 'Lab E', 'Kamis', 'IV'),
(129, 'Lab E', 'Jumat', 'I'),
(130, 'Lab E', 'Jumat', 'II'),
(131, 'Lab E', 'Jumat', 'III'),
(132, 'Lab E', 'Jumat', 'IV'),
(133, 'Lab E', 'Sabtu', 'I'),
(134, 'Lab E', 'Sabtu', 'II'),
(135, 'Lab E', 'Sabtu', 'III'),
(136, 'Lab E', 'Sabtu', 'IV'),
(137, 'Lab E', 'Minggu', 'I'),
(138, 'Lab E', 'Minggu', 'II'),
(139, 'Lab E', 'Minggu', 'III'),
(140, 'Lab E', 'Minggu', 'IV'),
(141, 'Lab F', 'Senin', 'I'),
(142, 'Lab F', 'Senin', 'II'),
(143, 'Lab F', 'Senin', 'III'),
(144, 'Lab F', 'Senin', 'IV'),
(145, 'Lab F', 'Selasa', 'I'),
(146, 'Lab F', 'Selasa', 'II'),
(147, 'Lab F', 'Selasa', 'III'),
(148, 'Lab F', 'Selasa', 'IV'),
(149, 'Lab F', 'Rabu', 'I'),
(150, 'Lab F', 'Rabu', 'II'),
(151, 'Lab F', 'Rabu', 'III'),
(152, 'Lab F', 'Rabu', 'IV'),
(153, 'Lab F', 'Kamis', 'I'),
(154, 'Lab F', 'Kamis', 'II'),
(155, 'Lab F', 'Kamis', 'III'),
(156, 'Lab F', 'Kamis', 'IV'),
(157, 'Lab F', 'Jumat', 'I'),
(158, 'Lab F', 'Jumat', 'II'),
(159, 'Lab F', 'Jumat', 'III'),
(160, 'Lab F', 'Jumat', 'IV'),
(161, 'Lab F', 'Sabtu', 'I'),
(162, 'Lab F', 'Sabtu', 'II'),
(163, 'Lab F', 'Sabtu', 'III'),
(164, 'Lab F', 'Sabtu', 'IV'),
(165, 'Lab F', 'Minggu', 'I'),
(166, 'Lab F', 'Minggu', 'II'),
(167, 'Lab F', 'Minggu', 'III'),
(168, 'Lab F', 'Minggu', 'IV'),
(169, 'Lab G', 'Senin', 'I'),
(170, 'Lab G', 'Senin', 'II'),
(171, 'Lab G', 'Senin', 'III'),
(172, 'Lab G', 'Senin', 'IV'),
(173, 'Lab G', 'Selasa', 'I'),
(174, 'Lab G', 'Selasa', 'II'),
(175, 'Lab G', 'Selasa', 'III'),
(176, 'Lab G', 'Selasa', 'IV'),
(177, 'Lab G', 'Rabu', 'I'),
(178, 'Lab G', 'Rabu', 'II'),
(179, 'Lab G', 'Rabu', 'III'),
(180, 'Lab G', 'Rabu', 'IV'),
(181, 'Lab G', 'Kamis', 'I'),
(182, 'Lab G', 'Kamis', 'II'),
(183, 'Lab G', 'Kamis', 'III'),
(184, 'Lab G', 'Kamis', 'IV'),
(185, 'Lab G', 'Jumat', 'I'),
(186, 'Lab G', 'Jumat', 'II'),
(187, 'Lab G', 'Jumat', 'III'),
(188, 'Lab G', 'Jumat', 'IV'),
(189, 'Lab G', 'Sabtu', 'I'),
(190, 'Lab G', 'Sabtu', 'II'),
(191, 'Lab G', 'Sabtu', 'III'),
(192, 'Lab G', 'Sabtu', 'IV'),
(193, 'Lab G', 'Minggu', 'I'),
(194, 'Lab G', 'Minggu', 'II'),
(195, 'Lab G', 'Minggu', 'III'),
(196, 'Lab G', 'Minggu', 'IV'),
(197, 'Lab H', 'Senin', 'I'),
(198, 'Lab H', 'Senin', 'II'),
(199, 'Lab H', 'Senin', 'III'),
(200, 'Lab H', 'Senin', 'IV'),
(201, 'Lab H', 'Selasa', 'I'),
(202, 'Lab H', 'Selasa', 'II'),
(203, 'Lab H', 'Selasa', 'III'),
(204, 'Lab H', 'Selasa', 'IV'),
(205, 'Lab H', 'Rabu', 'I'),
(206, 'Lab H', 'Rabu', 'II'),
(207, 'Lab H', 'Rabu', 'III'),
(208, 'Lab H', 'Rabu', 'IV'),
(209, 'Lab H', 'Kamis', 'I'),
(210, 'Lab H', 'Kamis', 'II'),
(211, 'Lab H', 'Kamis', 'III'),
(212, 'Lab H', 'Kamis', 'IV'),
(213, 'Lab H', 'Jumat', 'I'),
(214, 'Lab H', 'Jumat', 'II'),
(215, 'Lab H', 'Jumat', 'III'),
(216, 'Lab H', 'Jumat', 'IV'),
(217, 'Lab H', 'Sabtu', 'I'),
(218, 'Lab H', 'Sabtu', 'II'),
(219, 'Lab H', 'Sabtu', 'III'),
(220, 'Lab H', 'Sabtu', 'IV'),
(221, 'Lab H', 'Minggu', 'I'),
(222, 'Lab H', 'Minggu', 'II'),
(223, 'Lab H', 'Minggu', 'III'),
(224, 'Lab H', 'Minggu', 'IV'),
(225, 'Lab I', 'Senin', 'I'),
(226, 'Lab I', 'Senin', 'II'),
(227, 'Lab I', 'Senin', 'III'),
(228, 'Lab I', 'Senin', 'IV'),
(229, 'Lab I', 'Selasa', 'I'),
(230, 'Lab I', 'Selasa', 'II'),
(231, 'Lab I', 'Selasa', 'III'),
(232, 'Lab I', 'Selasa', 'IV'),
(233, 'Lab I', 'Rabu', 'I'),
(234, 'Lab I', 'Rabu', 'II'),
(235, 'Lab I', 'Rabu', 'III'),
(236, 'Lab I', 'Rabu', 'IV'),
(237, 'Lab I', 'Kamis', 'I'),
(238, 'Lab I', 'Kamis', 'II'),
(239, 'Lab I', 'Kamis', 'III'),
(240, 'Lab I', 'Kamis', 'IV'),
(241, 'Lab I', 'Jumat', 'I'),
(242, 'Lab I', 'Jumat', 'II'),
(243, 'Lab I', 'Jumat', 'III'),
(244, 'Lab I', 'Jumat', 'IV'),
(245, 'Lab I', 'Sabtu', 'I'),
(246, 'Lab I', 'Sabtu', 'II'),
(247, 'Lab I', 'Sabtu', 'III'),
(248, 'Lab I', 'Sabtu', 'IV'),
(249, 'Lab I', 'Minggu', 'I'),
(250, 'Lab I', 'Minggu', 'II'),
(251, 'Lab I', 'Minggu', 'III'),
(252, 'Lab I', 'Minggu', 'IV');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
