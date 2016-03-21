-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2014 at 12:59 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `kolom_list`
--

CREATE TABLE IF NOT EXISTS `kolom_list` (
  `ID_KOLOM` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_KOLOM` varchar(200) NOT NULL,
  `ID_BAB` int(11) NOT NULL,
  PRIMARY KEY (`ID_KOLOM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `kolom_list`
--

INSERT INTO `kolom_list` (`ID_KOLOM`, `NAMA_KOLOM`, `ID_BAB`) VALUES
(1, 'Peralatan Canggih RS', 1),
(2, 'Tingkat Efektivitas Pengelolaan RS: IGD', 1),
(3, 'Tingkat Efektivitas Pengelolaan RS: IRJ', 1),
(4, 'Tingkat Efektivitas  Pengelolaan RS: IRJ', 1),
(5, 'Tingkat Efisiensi Mutu Pengelolaan RS', 1),
(6, 'Gambaran Ketenagaan RS: Tenaga Medik Dasar', 2),
(7, 'Gambaran Ketenagaan RS: Tenaga Medik Spesialis Dasar', 2),
(8, 'Gambaran Ketenagaan RS: Tenaga Spesialis Penunjang Medik', 2),
(9, 'Gambaran Ketenagaan RS: Tenaga Medis Spesialis Lain', 2),
(10, 'Gambaran Ketenagaan RS: Tenaga Medis Gigi Mulut', 2),
(11, 'Gambaran Ketenagaan RS: Tenaga Paramedis dan Tenaga Kesehatan Lain', 2),
(12, 'Gambaran Ketenagaan RS: Tenaga Non Medis Lainnya', 2),
(13, 'Trend Kunjungan IGD', 4),
(14, '10 Penyakit Terbanyak IGD', 4),
(15, '10 Penyakit Terbanyak Rawat Jalan', 4),
(16, '10 Penyakit Terbanyak Rawat Inap', 4),
(17, 'Total 10 Besar Penyakit Terbanyak', 4),
(18, 'Indikator Klinik Kegiatan Rawat Inap', 4),
(19, 'Kunjungan Pelayanan Radiologi', 4),
(20, 'Kegiatan Rehabilitasi Medik', 4),
(21, 'Kegiatan Tranfusi Darah', 4),
(22, 'Penggunaan Darah di Rumah Sakit', 4),
(23, 'Penerimaan Darah', 4),
(24, 'Kegiatan Pemulasaran Jenazah', 4),
(25, 'Kasus TB Rawat Jalan', 5),
(26, 'Kasus TB RJ Berdasarkan Jenis', 5),
(27, 'Kasus TB Rawat Inap', 5),
(28, 'Kasus TB RI Berdasarkan Jenis', 5),
(29, 'Penderita HIV/AIDS Ri Berdasarkan Umur', 5),
(30, 'Jumlah DBD Dirawat (Usia-Jenis Kelamin)', 5),
(31, 'Sebab Kematian Ibu', 5),
(32, 'Peralatan Radiologi Kelas A', 6),
(33, 'Peralatan Radiologi Kelas B', 6),
(34, 'Peralatan Radiologi Kelas C', 6),
(35, 'Peralatan Radiologi Kelas D', 6),
(36, 'Peraltaan Radiologi Lainnya', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
