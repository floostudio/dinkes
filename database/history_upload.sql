-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2014 at 11:25 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

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
-- Table structure for table `history_upload`
--

CREATE TABLE IF NOT EXISTS `history_upload` (
  `history_upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `bab_id` int(11) NOT NULL,
  `TAHUN_ID` int(11) NOT NULL,
  `RS_NOREG` int(11) NOT NULL,
  `SHEET_NO` int(11) NOT NULL,
  `ERROR_DETAIL` text NOT NULL,
  PRIMARY KEY (`history_upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `history_upload`
--

INSERT INTO `history_upload` (`history_upload_id`, `bab_id`, `TAHUN_ID`, `RS_NOREG`, `SHEET_NO`, `ERROR_DETAIL`) VALUES
(1, 1, 1, 2, 1, ''),
(3, 1, 1, 2, 2, '8F | 15H | 16K | 28E | 36D | 37D | 45E | 51D | ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
