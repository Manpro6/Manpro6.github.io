-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2016 at 04:38 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

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
(21, 'paskah3', '', 'lalala', '#008000', '2016-03-26 03:00:00', '2016-03-26 05:00:00');

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
(1, './images/1823256c5b68827c3c.jpg'),
(2, './images/2328356b76d8cc41d7.jpg'),
(3, './images/119356b76e3f1b0d0.jpg'),
(4, './images/1827856b7f90cd8431.jpg'),
(5, './images/417956b76d3618530.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kritik`
--

CREATE TABLE IF NOT EXISTS `kritik` (
  `id_kritik` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_kritik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `nama`, `pesan`, `tanggal`) VALUES
(1, 'asd', 'dsa', '0000-00-00'),
(2, '12132131', '123', '2016-02-17'),
(3, 'SSSA', 'ASFASDA', '2016-02-17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
