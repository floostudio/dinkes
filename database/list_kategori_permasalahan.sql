-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 12:04 PM
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
-- Table structure for table `list_kategori_permasalahan`
--

CREATE TABLE IF NOT EXISTS `list_kategori_permasalahan` (
  `KAT_PERMASALAHAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KAT_PERMASALAHAN_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`KAT_PERMASALAHAN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `list_kategori_permasalahan`
--

INSERT INTO `list_kategori_permasalahan` (`KAT_PERMASALAHAN_ID`, `KAT_PERMASALAHAN_NAMA`) VALUES
(1, 'UGD'),
(2, 'Rawat Jalan'),
(3, 'Rawat Inap'),
(4, 'Pelayanan Bedah'),
(5, 'Persalinan, Perinatologi dan Neonatologi'),
(6, ' Pelayanan Intensif'),
(7, ' Pelayanan Radiologi'),
(8, 'Pelayanan Laboratorium'),
(9, ' Pelayanan Rehabilitasi Medik'),
(10, 'Pelayanan Minimal (SPM) Pelayanan Farmasi'),
(11, 'Pelayanan Gizi'),
(12, 'Pelayanan Transfusi Darah'),
(13, 'Pelayanan Maskin '),
(14, 'Pelayanan Rekam Medik'),
(15, 'Pelayanan Limbah'),
(16, 'Pelayanan Administrasi dan Manajemen'),
(17, 'Ambulans/Kereta Jenazah'),
(18, ' Pelayanan Pemulasaraan Jenazah'),
(19, 'Pelayanan Pemeliharaan Sarana'),
(20, ' Pelayanan Pemeliharaan Laundry'),
(21, ' Pelayanan Pengendalian Infeksi'),
(22, 'Pelayanan Kesehatan Gigi'),
(23, 'Kegiatan Kesehatan Jiwa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;