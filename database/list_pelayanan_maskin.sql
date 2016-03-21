-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 11:37 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dinkes`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_maskin`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_maskin` (
  `P_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_MASKIN_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`P_MASKIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `list_pelayanan_maskin`
--

INSERT INTO `list_pelayanan_maskin` (`P_MASKIN_ID`, `P_MASKIN_NAMA`) VALUES
(1, 'Rawat Jalan '),
(2, 'Rawat Jalan : a.  Jumlah Pasien.'),
(3, 'Rawat Jalan : b. Jumlah Kunjungan. '),
(4, 'Rawat Jalan : c.Jumlah keluhan. '),
(5, 'Rawat Jalan : d.   Keluhan Yang ditangani.'),
(6, 'Rawat Darurat :'),
(7, 'Rawat Darurat : a. Jumlah Pasien.'),
(8, 'Rawat Darurat : b. Jumlah Kunjungan.'),
(9, 'Rawat Darurat : c. Jumlah keluhan.'),
(10, 'Rawat Darurat : d. Keluhan Yang ditangani'),
(11, 'Rawat Inap  '),
(12, 'Rawat Inap : a.       Jumlah Pasien.'),
(13, 'Rawat Inap :b. Jumlah Kunjungan.'),
(14, 'Rawat Inap :c. Jumlah keluhan.'),
(15, ' Rawat Inap : d.  Keluhan Yang ditangani'),
(16, 'Jumlah Pasien Maskin yang dilayani (Total dr berbagai instalasi)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
