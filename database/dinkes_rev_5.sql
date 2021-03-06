-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2014 at 11:35 AM
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
CREATE DATABASE IF NOT EXISTS `dinkes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dinkes`;

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE IF NOT EXISTS `analisa` (
  `ANALISA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `ANALISA_KATEGORI_ID` int(11) NOT NULL,
  `ANALISA_URAIAN` text,
  PRIMARY KEY (`ANALISA_ID`),
  KEY `FK_RELATIONSHIP_230` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `ANALISA_KATEGORI_ID` (`ANALISA_KATEGORI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `analisa_ketenagaan`
--

CREATE TABLE IF NOT EXISTS `analisa_ketenagaan` (
  `AT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `AT_JUMLAH` int(11) DEFAULT NULL,
  `AT_STANDAR` int(11) DEFAULT NULL,
  PRIMARY KEY (`AT_ID`),
  KEY `FK_RELATIONSHIP_105` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `analisa_ketenagaan`
--

INSERT INTO `analisa_ketenagaan` (`AT_ID`, `TAHUN_ID`, `RS_NOREG`, `AT_JUMLAH`, `AT_STANDAR`) VALUES
(1, 1, '1', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `analisa_rasio_keuangan`
--

CREATE TABLE IF NOT EXISTS `analisa_rasio_keuangan` (
  `ARK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(35) NOT NULL,
  `LIST_ANALISA_RK_ID` int(11) NOT NULL,
  `ARK_TREND` varchar(100) DEFAULT NULL,
  `ARK_KESIMPULAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ARK_ID`),
  KEY `FK_RELATIONSHIP_112` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_ANALISA_RK_ID` (`LIST_ANALISA_RK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `analisa_rasio_keuangan`
--

INSERT INTO `analisa_rasio_keuangan` (`ARK_ID`, `TAHUN_ID`, `RS_NOREG`, `LIST_ANALISA_RK_ID`, `ARK_TREND`, `ARK_KESIMPULAN`) VALUES
(1, 1, '1', 1, 'naik', 'baik'),
(2, 1, '1', 2, 'turun', 'tidak baik'),
(3, 1, '1', 3, 'fluktuatif', 'baik'),
(4, 1, '1', 4, 'naik', 'tidak baik'),
(5, 1, '1', 5, 'turun', 'baik'),
(6, 1, '1', 6, 'fluktuatif', 'tidak baik');

-- --------------------------------------------------------

--
-- Table structure for table `bab`
--

CREATE TABLE IF NOT EXISTS `bab` (
  `bab_id` int(11) NOT NULL AUTO_INCREMENT,
  `bab_name` varchar(25) NOT NULL,
  PRIMARY KEY (`bab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bab`
--

INSERT INTO `bab` (`bab_id`, `bab_name`) VALUES
(1, 'BAB II'),
(2, 'BAB III'),
(3, 'BAB IV'),
(4, 'BAB V'),
(5, 'BAB VI'),
(6, 'LAMPIRAN');

-- --------------------------------------------------------

--
-- Table structure for table `bab_list`
--

CREATE TABLE IF NOT EXISTS `bab_list` (
  `bab_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `bab_list_table` varchar(50) NOT NULL,
  `bab_id` int(11) NOT NULL,
  PRIMARY KEY (`bab_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bab_list`
--

INSERT INTO `bab_list` (`bab_list_id`, `bab_list_table`, `bab_id`) VALUES
(1, 'Pelayanan', 1),
(2, 'Peralatan Canggih', 1),
(3, 'Sales Growth Rate', 3),
(4, 'Cost Recovery', 3),
(5, 'SPM', 5),
(6, 'Analisa Kepuasan Pelanggan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cost_recovery`
--

CREATE TABLE IF NOT EXISTS `cost_recovery` (
  `CR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `LIST_CR_ID` int(11) DEFAULT NULL,
  `CR_JUMLAH_N2` float DEFAULT NULL,
  `CR_JUMLAH_N1` float DEFAULT NULL,
  `CR_JUMLAH_N` float NOT NULL,
  PRIMARY KEY (`CR_ID`),
  KEY `FK_RELATIONSHIP_110` (`TAHUN_ID`),
  KEY `LIST_CR_ID` (`LIST_CR_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cost_recovery`
--

INSERT INTO `cost_recovery` (`CR_ID`, `TAHUN_ID`, `RS_NOREG`, `LIST_CR_ID`, `CR_JUMLAH_N2`, `CR_JUMLAH_N1`, `CR_JUMLAH_N`) VALUES
(1, 1, '1', 1, 100, 200, 300),
(2, 1, '1', 2, 50, 150, 250),
(3, 1, '1', 3, 200, 133.333, 120);

-- --------------------------------------------------------

--
-- Table structure for table `dbd`
--

CREATE TABLE IF NOT EXISTS `dbd` (
  `DBD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `TAHUN_ID` int(25) NOT NULL,
  `DBD_DIAGNOSIS_ID` int(11) DEFAULT NULL,
  `DBD_DEWASA_L` int(11) DEFAULT NULL,
  `DBD_DEWASA_P` int(11) DEFAULT NULL,
  `DBD_ANAK_L` int(11) DEFAULT NULL,
  `DBD_ANAK_P` int(11) DEFAULT NULL,
  `DBD_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`DBD_ID`),
  KEY `FK_RELATIONSHIP_137` (`RS_NOREG`),
  KEY `FK_RELATIONSHIP_71` (`DBD_DIAGNOSIS_ID`),
  KEY `RS_NOREG` (`TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dbd`
--

INSERT INTO `dbd` (`DBD_ID`, `RS_NOREG`, `TAHUN_ID`, `DBD_DIAGNOSIS_ID`, `DBD_DEWASA_L`, `DBD_DEWASA_P`, `DBD_ANAK_L`, `DBD_ANAK_P`, `DBD_TOTAL`) VALUES
(1, '1', 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, '1', 1, 2, NULL, NULL, NULL, NULL, NULL),
(3, '1', 1, 3, NULL, NULL, NULL, NULL, NULL),
(4, '1', 1, 1, 12, 13, 14, 15, 16),
(5, '1', 1, 2, 13, 14, 15, 16, 17),
(6, '1', 1, 3, 14, 15, 16, 17, 18),
(7, '1', 1, 1, 12, 13, 14, 15, 16),
(8, '1', 1, 2, 13, 14, 15, 16, 17),
(9, '1', 1, 3, 14, 15, 16, 17, 18);

-- --------------------------------------------------------

--
-- Table structure for table `dbd_baru_dan_pulang`
--

CREATE TABLE IF NOT EXISTS `dbd_baru_dan_pulang` (
  `DBD_II_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `TAHUN_ID` int(11) NOT NULL,
  `DBD_DIAGNOSIS_ID` int(11) DEFAULT NULL,
  `DBD_II_MRS_DEWASA` int(11) DEFAULT NULL,
  `DBD_II_MRS_ANAK` int(11) DEFAULT NULL,
  `DBD_II_DEWASA_MDB24` int(11) DEFAULT NULL,
  `DBD_II_DEWASA_MDA24` int(11) DEFAULT NULL,
  `DBD_II_DEWASA_SEMBUH` int(11) DEFAULT NULL,
  `DBD_II_ANAK_MDB24` int(11) DEFAULT NULL,
  `DBD_II_ANAK_MDA24` int(11) DEFAULT NULL,
  `DBD_II_ANAK_SEBUH` int(11) DEFAULT NULL,
  `DBD_II_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`DBD_II_ID`),
  KEY `FK_RELATIONSHIP_138` (`RS_NOREG`),
  KEY `FK_RELATIONSHIP_72` (`DBD_DIAGNOSIS_ID`),
  KEY `RS_NOREG` (`TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dbd_baru_dan_pulang`
--

INSERT INTO `dbd_baru_dan_pulang` (`DBD_II_ID`, `RS_NOREG`, `TAHUN_ID`, `DBD_DIAGNOSIS_ID`, `DBD_II_MRS_DEWASA`, `DBD_II_MRS_ANAK`, `DBD_II_DEWASA_MDB24`, `DBD_II_DEWASA_MDA24`, `DBD_II_DEWASA_SEMBUH`, `DBD_II_ANAK_MDB24`, `DBD_II_ANAK_MDA24`, `DBD_II_ANAK_SEBUH`, `DBD_II_TOTAL`) VALUES
(1, '1', 1, 1, 33, 44, 55, 66, 77, 88, 99, 110, 121),
(2, '1', 1, 2, 44, 55, 66, 77, 88, 99, 110, 121, 132),
(3, '1', 1, 3, 55, 66, 77, 88, 99, 110, 121, 132, 143),
(4, '1', 1, 1, 33, 44, 55, 66, 77, 88, 99, 110, 121),
(5, '1', 1, 2, 44, 55, 66, 77, 88, 99, 110, 121, 132),
(6, '1', 1, 3, 55, 66, 77, 88, 99, 110, 121, 132, 143),
(7, '1', 1, 1, 33, 44, 55, 66, 77, 88, 99, 110, 121),
(8, '1', 1, 2, 44, 55, 66, 77, 88, 99, 110, 121, 132),
(9, '1', 1, 3, 55, 66, 77, 88, 99, 110, 121, 132, 143);

-- --------------------------------------------------------

--
-- Table structure for table `dbd_diagnosis`
--

CREATE TABLE IF NOT EXISTS `dbd_diagnosis` (
  `DBD_DIAGNOSIS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DBD_DIAGNOSIS_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DBD_DIAGNOSIS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dbd_diagnosis`
--

INSERT INTO `dbd_diagnosis` (`DBD_DIAGNOSIS_ID`, `DBD_DIAGNOSIS_NAMA`) VALUES
(1, 'Suspek'),
(2, 'DBD'),
(3, 'DBD + syok');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_kematian_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `diagnosis_kematian_rawat_inap` (
  `DK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ICD10_CODE` varchar(25) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `DK_JENIS_PENYAKIT` varchar(250) DEFAULT NULL,
  `DK_JML_KASUS` int(11) DEFAULT NULL,
  `DK_JML_KEMATIAN` int(11) DEFAULT NULL,
  `DK_PERSEN` float DEFAULT NULL,
  PRIMARY KEY (`DK_ID`),
  KEY `FK_RELATIONSHIP_184` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `DK_ID` (`DK_ID`),
  KEY `ICD10_CODE` (`ICD10_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pelayanan_perinatologi`
--

CREATE TABLE IF NOT EXISTS `hasil_pelayanan_perinatologi` (
  `PERINATOLOGI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PPR_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PERINATOLOGI_RUJUKAN_TOTAL_T1` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_MENINGGAL_T1` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_TOTAL_T1` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_MENINGGAL_T1` int(11) NOT NULL,
  `PERINATOLOGI_DIRUJUK_T1` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_TOTAL_T2` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_MENINGGAL_T2` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_TOTAL_T2` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_MENINGGAL_T2` int(11) NOT NULL,
  `PERINATOLOGI_DIRUJUK_T2` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_TOTAL_T3` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_MENINGGAL_T3` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_TOTAL_T3` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_MENINGGAL_T3` int(11) NOT NULL,
  `PERINATOLOGI_DIRUJUK_T3` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_TOTAL_T4` int(11) NOT NULL,
  `PERINATOLOGI_RUJUKAN_MENINGGAL_T4` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_TOTAL_T4` int(11) NOT NULL,
  `PERINATOLOGI_SENDIRI_MENINGGAL_T4` int(11) NOT NULL,
  `PERINATOLOGI_DIRUJUK_T4` int(11) NOT NULL,
  PRIMARY KEY (`PERINATOLOGI_ID`),
  KEY `FK_RELATIONSHIP_193` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_33` (`PPR_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pelayanan_persalinan`
--

CREATE TABLE IF NOT EXISTS `hasil_pelayanan_persalinan` (
  `PERSALINAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PP_ID` int(11) DEFAULT NULL,
  `PERSALINAN_RUJUKAN_TOTAL_T1` int(11) DEFAULT NULL,
  `PERSALINAN_RUJUKAN_MENINGGAL_T1` int(11) DEFAULT NULL,
  `PERSALINAN_SENDIRI_TOTAL_T1` int(11) DEFAULT NULL,
  `PERSALINAN_SENDIRI_MENINGGAL_T1` int(11) DEFAULT NULL,
  `PERSALINAN_DIRUJUK_T1` int(11) DEFAULT NULL,
  `PERSALINAN_RUJUKAN_TOTAL_T2` int(11) NOT NULL,
  `PERSALINAN_RUJUKAN_MENINGGAL_T2` int(11) NOT NULL,
  `PERSALINAN_SENDIRI_TOTAL_T2` int(11) NOT NULL,
  `PERSALINAN_SENDIRI_MENINGGAL_T2` int(11) NOT NULL,
  `PERSALINAN_DIRUJUK_T2` int(11) NOT NULL,
  `PERSALINAN_RUJUKAN_TOTAL_T3` int(11) NOT NULL,
  `PERSALINAN_RUJUKAN_MENINGGAL_T3` int(11) NOT NULL,
  `PERSALINAN_SENDIRI_TOTAL_T3` int(11) NOT NULL,
  `PERSALINAN_SENDIRI_MENINGGAL_T3` int(11) NOT NULL,
  `PERSALINAN_DIRUJUK_T3` int(11) NOT NULL,
  `PERSALINAN_RUJUKAN_TOTAL_T4` int(11) NOT NULL,
  `PERSALINAN_RUJUKAN_MENINGGAL_T4` int(11) NOT NULL,
  `PERSALINAN_SENDIRI_TOTAL_T4` int(11) NOT NULL,
  `PERSALINAN_SENDIRI_MENINGGAL_T4` int(11) NOT NULL,
  `PERSALINAN_DIRUJUK_T4` int(11) NOT NULL,
  PRIMARY KEY (`PERSALINAN_ID`),
  KEY `FK_RELATIONSHIP_192` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_32` (`PP_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survey_maskin`
--

CREATE TABLE IF NOT EXISTS `hasil_survey_maskin` (
  `HASILSURVEY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `P_MASKIN_ID` int(11) DEFAULT NULL,
  `HASIL_SURVEY_SKOR` float DEFAULT NULL,
  `HASIL_SURVEY_RESPONDEN` int(11) DEFAULT NULL,
  `HASIL_SURVEY_KETERANGAN` text,
  PRIMARY KEY (`HASILSURVEY_ID`),
  KEY `FK_RELATIONSHIP_251` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_85` (`P_MASKIN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hiv`
--

CREATE TABLE IF NOT EXISTS `hiv` (
  `HIV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `GOLONGAN_UMUR_ID` int(11) DEFAULT NULL,
  `HIV_JUMLAH` int(11) DEFAULT NULL,
  `HIV_JUMLAH1` int(11) NOT NULL,
  `HIV_JUMLAH2` int(11) NOT NULL,
  PRIMARY KEY (`HIV_ID`),
  KEY `FK_RELATIONSHIP_127` (`GOLONGAN_UMUR_ID`),
  KEY `FK_RELATIONSHIP_136` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `hiv`
--

INSERT INTO `hiv` (`HIV_ID`, `TAHUN_ID`, `RS_NOREG`, `GOLONGAN_UMUR_ID`, `HIV_JUMLAH`, `HIV_JUMLAH1`, `HIV_JUMLAH2`) VALUES
(1, 1, '1', 1, 52, 42, 32),
(2, 1, '1', 2, 62, 52, 42),
(3, 1, '1', 3, 72, 62, 52),
(4, 1, '1', 4, 82, 72, 62),
(5, 1, '1', 5, 92, 82, 72),
(6, 1, '1', 6, 102, 92, 82),
(7, 1, '1', 7, 112, 102, 92),
(8, 1, '1', 1, 52, 42, 32),
(9, 1, '1', 2, 62, 52, 42),
(10, 1, '1', 3, 72, 62, 52),
(11, 1, '1', 4, 82, 72, 62),
(12, 1, '1', 5, 92, 82, 72),
(13, 1, '1', 6, 102, 92, 82),
(14, 1, '1', 7, 112, 102, 92),
(15, 1, '1', 1, 52, 42, 32),
(16, 1, '1', 2, 62, 52, 42),
(17, 1, '1', 3, 72, 62, 52),
(18, 1, '1', 4, 82, 72, 62),
(19, 1, '1', 5, 92, 82, 72),
(20, 1, '1', 6, 102, 92, 82),
(21, 1, '1', 7, 112, 102, 92);

-- --------------------------------------------------------

--
-- Table structure for table `icd10`
--

CREATE TABLE IF NOT EXISTS `icd10` (
  `ICD10_CODE` varchar(10) NOT NULL,
  `ICD10_NAME` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ICD10_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `igd`
--

CREATE TABLE IF NOT EXISTS `igd` (
  `KIGD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KIGD_PASIEN_L_N2` int(11) DEFAULT NULL,
  `KIGD_PASIEN_P_N2` int(11) DEFAULT NULL,
  `KIGD_PASIEN_TOTAL_N2` int(11) DEFAULT NULL,
  `KIGD_PASIEN_L_N1` int(11) NOT NULL,
  `KIGD_PASIEN_P_N1` int(11) NOT NULL,
  `KIGD_PASIEN_TOTAL_N1` int(11) NOT NULL,
  `KIGD_PASIEN_L_N` int(11) NOT NULL,
  `KIGD_PASIEN_P_N` int(11) NOT NULL,
  `KIGD_PASIEN_TOTAL_N` int(11) NOT NULL,
  PRIMARY KEY (`KIGD_ID`),
  KEY `FK_RELATIONSHIP_94` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `igd`
--

INSERT INTO `igd` (`KIGD_ID`, `TAHUN_ID`, `RS_NOREG`, `KIGD_PASIEN_L_N2`, `KIGD_PASIEN_P_N2`, `KIGD_PASIEN_TOTAL_N2`, `KIGD_PASIEN_L_N1`, `KIGD_PASIEN_P_N1`, `KIGD_PASIEN_TOTAL_N1`, `KIGD_PASIEN_L_N`, `KIGD_PASIEN_P_N`, `KIGD_PASIEN_TOTAL_N`) VALUES
(1, 1, '1', 2, 5, 7, 1, 9, 10, 12, 57, 69),
(2, 1, '1', 2, 5, 7, 1, 9, 10, 12, 57, 69),
(3, 1, '1', 2, 5, 7, 1, 9, 10, 12, 57, 69);

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE IF NOT EXISTS `imunisasi` (
  `IMUNISASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_IMUNISASI_ID` int(11) DEFAULT NULL,
  `IMUNISASI_JML_KEGIATAN` int(11) DEFAULT NULL,
  `IMUNISASI_DASAR1` int(11) DEFAULT NULL,
  `IMUNISASI_DASAR2` int(11) DEFAULT NULL,
  `IMUNISASI_DASAR3` int(11) DEFAULT NULL,
  `IMUNISASI_BOOSTER1` int(11) DEFAULT NULL,
  `IMUNISASI_BOOSTER6` int(11) DEFAULT NULL,
  `IMUNISASI_BOOSTER12` int(11) DEFAULT NULL,
  `IMUNISASI_BOOSTER_JML` int(11) DEFAULT NULL,
  `IMUNISASI_KETERANGAN` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IMUNISASI_ID`),
  KEY `FK_RELATIONSHIP_238` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_59` (`JENIS_IMUNISASI_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `indikator_klinik_kegiatan_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `indikator_klinik_kegiatan_rawat_inap` (
  `IK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `IKRI_ID` int(11) DEFAULT NULL,
  `IK_NILAI` float DEFAULT NULL,
  PRIMARY KEY (`IK_ID`),
  KEY `FK_RELATIONSHIP_183` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `IKRI_ID` (`IKRI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `iri`
--

CREATE TABLE IF NOT EXISTS `iri` (
  `IRI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(26) DEFAULT NULL,
  `KATEGORI_PASIEN_ID` int(11) NOT NULL,
  `IRI_JUMLAH_N2` int(11) DEFAULT NULL,
  `IRI_JUMLAH_N1` int(11) DEFAULT NULL,
  `IRI_JUMLAH_N` int(11) DEFAULT NULL,
  PRIMARY KEY (`IRI_ID`),
  KEY `FK_RELATIONSHIP_96` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `KATEGORI_PASIEN_ID` (`KATEGORI_PASIEN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `iri`
--

INSERT INTO `iri` (`IRI_ID`, `TAHUN_ID`, `RS_NOREG`, `KATEGORI_PASIEN_ID`, `IRI_JUMLAH_N2`, `IRI_JUMLAH_N1`, `IRI_JUMLAH_N`) VALUES
(2, 1, '1', 1, 23, 34, 45),
(3, 1, '1', 2, 23, 24, 45),
(4, 1, '1', 3, 12, 13, 13),
(5, 1, '1', 4, 11, 11, 32),
(6, 1, '1', 5, 22, 24, 26),
(7, 1, '1', 6, 12, 13, 14),
(8, 1, '1', 7, 10, 11, 12),
(9, 1, '1', 8, 66, 57, 57),
(10, 1, '1', 9, 54, 25, 14),
(11, 1, '1', 10, 12, 32, 43),
(12, 1, '1', 11, 43, 86, 64),
(13, 1, '1', 12, 31, 52, 13),
(14, 1, '1', 13, 12, 34, 51),
(15, 1, '1', 14, 69, 129, 115),
(16, 1, '1', 15, 13, 41, 51),
(17, 1, '1', 16, 56, 88, 64),
(18, 1, '1', 17, 53, 13, 53),
(19, 1, '1', 18, 13, 53, 64),
(20, 1, '1', 1, 12, 13, 14),
(21, 1, '1', 2, 13, 14, 15),
(22, 1, '1', 3, 14, 15, 16),
(23, 1, '1', 4, 15, 16, 17),
(24, 1, '1', 5, 16, 17, 18),
(25, 1, '1', 6, 17, 18, 19),
(26, 1, '1', 7, 18, 19, 20),
(27, 1, '1', 8, 19, 20, 21),
(28, 1, '1', 9, 20, 21, 22),
(29, 1, '1', 10, 21, 22, 23),
(30, 1, '1', 11, 22, 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `irj`
--

CREATE TABLE IF NOT EXISTS `irj` (
  `irj_id` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_id` int(11) DEFAULT NULL,
  `rs_noreg` varchar(25) NOT NULL,
  `pasien_kategori_id` int(11) NOT NULL,
  `irj_pasien_l_n2` int(11) DEFAULT NULL,
  `irj_pasien_p_n2` int(11) DEFAULT NULL,
  `irj_pasien_total_n2` int(11) DEFAULT NULL,
  `irj_pasien_l_n1` int(11) NOT NULL,
  `irj_pasien_p_n1` int(11) NOT NULL,
  `irj_pasien_total_n1` int(11) NOT NULL,
  `irj_pasien_l_n` int(11) NOT NULL,
  `irj_pasien_p_n` int(11) NOT NULL,
  `irj_pasien_total_n` int(11) NOT NULL,
  PRIMARY KEY (`irj_id`),
  KEY `FK_RELATIONSHIP_98` (`TAHUN_id`),
  KEY `rs_noreg` (`rs_noreg`),
  KEY `pasien_kategori_id` (`pasien_kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `irj`
--

INSERT INTO `irj` (`irj_id`, `TAHUN_id`, `rs_noreg`, `pasien_kategori_id`, `irj_pasien_l_n2`, `irj_pasien_p_n2`, `irj_pasien_total_n2`, `irj_pasien_l_n1`, `irj_pasien_p_n1`, `irj_pasien_total_n1`, `irj_pasien_l_n`, `irj_pasien_p_n`, `irj_pasien_total_n`) VALUES
(2, 1, '1', 1, 34, 32, 66, 54, 13, 67, 12, 51, 63),
(3, 1, '1', 2, 12, 43, 55, 74, 73, 147, 14, 63, 77);

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_ambulans_rs`
--

CREATE TABLE IF NOT EXISTS `jumlah_ambulans_rs` (
  `AMB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `AMB_TRANS_JML` int(11) DEFAULT NULL,
  `AMB_TRANS_BAIK` int(11) DEFAULT NULL,
  `AMB_TRANS_RUSAK_RINGAN` int(11) DEFAULT NULL,
  `AMB_TRANS_RUSAK_BERAT` int(11) DEFAULT NULL,
  `AMB_GD_JML` int(11) DEFAULT NULL,
  `AMB_GD_BAIK` int(11) DEFAULT NULL,
  `AMB_GD_RUSAK_RINGAN` int(11) DEFAULT NULL,
  `AMB_GD_RUSAK_BERAT` int(11) DEFAULT NULL,
  `AMB_JENAZAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`AMB_ID`),
  KEY `FK_RELATIONSHIP_90` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_kematian_ibu`
--

CREATE TABLE IF NOT EXISTS `jumlah_kematian_ibu` (
  `JKI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `TAHUN_ID` int(11) NOT NULL,
  `JKI_IBUHAMIL_RUJUKAN` int(11) DEFAULT NULL,
  `JKI_IBUHAMIL_DTGSENDIRI` int(11) DEFAULT NULL,
  `JKI_IBUBERSALIN_RUJUKAN` int(11) DEFAULT NULL,
  `JKI_IBUBERHASIL_DTGSENDIRI` int(11) DEFAULT NULL,
  `JKI_IBUNIFAS_RSLAIN` int(11) DEFAULT NULL,
  `JKI_IBUNIFAS_RS` int(11) DEFAULT NULL,
  `JKI_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`JKI_ID`),
  KEY `FK_RELATIONSHIP_139` (`RS_NOREG`),
  KEY `RS_NOREG` (`TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jumlah_kematian_ibu`
--

INSERT INTO `jumlah_kematian_ibu` (`JKI_ID`, `RS_NOREG`, `TAHUN_ID`, `JKI_IBUHAMIL_RUJUKAN`, `JKI_IBUHAMIL_DTGSENDIRI`, `JKI_IBUBERSALIN_RUJUKAN`, `JKI_IBUBERHASIL_DTGSENDIRI`, `JKI_IBUNIFAS_RSLAIN`, `JKI_IBUNIFAS_RS`, `JKI_TOTAL`) VALUES
(1, '1', 1, 1, 23, 34, 45, 56, 67, 78),
(2, '1', 1, 1, 23, 34, 45, 56, 67, 78),
(3, '1', 1, 1, 23, 34, 45, 56, 67, 78);

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_kematian_ibu_per_faktor`
--

CREATE TABLE IF NOT EXISTS `jumlah_kematian_ibu_per_faktor` (
  `JKIF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) NOT NULL,
  `SKI_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `JKIF_FAKTOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`JKIF_ID`),
  KEY `FK_RELATIONSHIP_140` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_73` (`SKI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `jumlah_kematian_ibu_per_faktor`
--

INSERT INTO `jumlah_kematian_ibu_per_faktor` (`JKIF_ID`, `RS_NOREG`, `SKI_ID`, `TAHUN_ID`, `JKIF_FAKTOR`) VALUES
(1, '1', 1, 1, 13),
(2, '1', 2, 1, 24),
(3, '1', 3, 1, 35),
(4, '1', 4, 1, 46),
(5, '1', 5, 1, 57),
(6, '1', 6, 1, 68),
(7, '1', 7, 1, 79),
(8, '1', 8, 1, 80),
(9, '1', 9, 1, 9),
(10, '1', 1, 1, 13),
(11, '1', 2, 1, 24),
(12, '1', 3, 1, 35),
(13, '1', 4, 1, 46),
(14, '1', 5, 1, 57),
(15, '1', 6, 1, 68),
(16, '1', 7, 1, 79),
(17, '1', 8, 1, 80),
(18, '1', 9, 1, 9),
(19, '1', 1, 1, 13),
(20, '1', 2, 1, 24),
(21, '1', 3, 1, 35),
(22, '1', 4, 1, 46),
(23, '1', 5, 1, 57),
(24, '1', 6, 1, 68),
(25, '1', 7, 1, 79),
(26, '1', 8, 1, 80),
(27, '1', 9, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_kunjungan_radiologi`
--

CREATE TABLE IF NOT EXISTS `jumlah_kunjungan_radiologi` (
  `RADIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_RADIO_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `RADIO_KUNJUNGAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`RADIO_ID`),
  KEY `FK_RELATIONSHIP_198` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_40` (`P_RADIO_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_operasi_bedah`
--

CREATE TABLE IF NOT EXISTS `jumlah_operasi_bedah` (
  `OPERASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_OPERASI_ID` int(11) DEFAULT NULL,
  `OPERASI_KHUSUS_N2` int(11) DEFAULT NULL,
  `OPERASI_BESAR_N2` int(11) DEFAULT NULL,
  `OPERASI_SEDANG_N2` int(11) DEFAULT NULL,
  `OPERASI_KECIL_N2` int(11) DEFAULT NULL,
  `OPERASI_TOTAL_N2` int(11) DEFAULT NULL,
  `OPERASI_KHUSUS_N1` int(11) NOT NULL,
  `OPERASI_BESAR_N1` int(11) NOT NULL,
  `OPERASI_SEDANG_N1` int(11) NOT NULL,
  `OPERASI_KECIL_N1` int(11) NOT NULL,
  `OPERASI_TOTAL_N1` int(11) NOT NULL,
  `OPERASI_KHUSUS_N` int(11) NOT NULL,
  `OPERASI_BESAR_N` int(11) NOT NULL,
  `OPERASI_SEDANG_N` int(11) NOT NULL,
  `OPERASI_KECIL_N` int(11) NOT NULL,
  `OPERASI_TOTAL_N` int(11) NOT NULL,
  PRIMARY KEY (`OPERASI_ID`),
  KEY `FK_RELATIONSHIP_189` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_29` (`JENIS_OPERASI_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_tenaga_igd`
--

CREATE TABLE IF NOT EXISTS `jumlah_tenaga_igd` (
  `IGD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `IGDLIST_ID` int(11) DEFAULT NULL,
  `IGD_JUMLAH` int(11) DEFAULT NULL,
  `IGD_JUMLAH_TERLATIH` int(11) DEFAULT NULL,
  `IGD_KETERANGAN` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IGD_ID`),
  KEY `FK_RELATIONSHIP_166` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_20` (`IGDLIST_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kapasitas_tempat_tidur`
--

CREATE TABLE IF NOT EXISTS `kapasitas_tempat_tidur` (
  `KTT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `JENIS_TT_ID` int(11) DEFAULT NULL,
  `KTT_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`KTT_ID`),
  KEY `FK_RELATIONSHIP_77` (`RS_NOREG`),
  KEY `FK_RELATIONSHIP_89` (`JENIS_TT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kasus_tb_ri`
--

CREATE TABLE IF NOT EXISTS `kasus_tb_ri` (
  `KASUS_TB_RI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `GOLONGAN_UMUR_ID` int(11) DEFAULT NULL,
  `KASUS_TB_RI_N2` int(11) DEFAULT NULL,
  `KASUS_TB_RI_N1` int(11) NOT NULL,
  `KASUS_TB_RI_N` int(11) NOT NULL,
  PRIMARY KEY (`KASUS_TB_RI_ID`),
  KEY `FK_RELATIONSHIP_132` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_87` (`GOLONGAN_UMUR_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kasus_tb_ri`
--

INSERT INTO `kasus_tb_ri` (`KASUS_TB_RI_ID`, `TAHUN_ID`, `RS_NOREG`, `GOLONGAN_UMUR_ID`, `KASUS_TB_RI_N2`, `KASUS_TB_RI_N1`, `KASUS_TB_RI_N`) VALUES
(1, 1, '1', 1, 31, 32, 33),
(2, 1, '1', 2, 34, 35, 36),
(3, 1, '1', 3, 37, 38, 39),
(4, 1, '1', 4, 40, 41, 42),
(5, 1, '1', 5, 43, 44, 45),
(6, 1, '1', 6, 46, 47, 48),
(7, 1, '1', 7, 49, 50, 51),
(8, 1, '1', 1, 31, 32, 33),
(9, 1, '1', 2, 34, 35, 36),
(10, 1, '1', 3, 37, 38, 39),
(11, 1, '1', 4, 40, 41, 42),
(12, 1, '1', 5, 43, 44, 45),
(13, 1, '1', 6, 46, 47, 48),
(14, 1, '1', 7, 49, 50, 51);

-- --------------------------------------------------------

--
-- Table structure for table `kasus_tb_ri_jenis`
--

CREATE TABLE IF NOT EXISTS `kasus_tb_ri_jenis` (
  `KASUS_TB_RI_JENIS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_TB_ID` int(11) DEFAULT NULL,
  `KASUS_TB_RI_JENIS_N2` int(11) DEFAULT NULL,
  `KASUS_TB_RI_JENIS_N1` int(11) NOT NULL,
  `KASUS_TB_RI_JENIS_N` int(11) NOT NULL,
  PRIMARY KEY (`KASUS_TB_RI_JENIS_ID`),
  KEY `FK_RELATIONSHIP_134` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_70` (`JENIS_TB_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `kasus_tb_ri_jenis`
--

INSERT INTO `kasus_tb_ri_jenis` (`KASUS_TB_RI_JENIS_ID`, `TAHUN_ID`, `RS_NOREG`, `JENIS_TB_ID`, `KASUS_TB_RI_JENIS_N2`, `KASUS_TB_RI_JENIS_N1`, `KASUS_TB_RI_JENIS_N`) VALUES
(1, 1, '1', 1, 41, 42, 43),
(2, 1, '1', 2, 44, 45, 46),
(3, 1, '1', 3, 47, 48, 49),
(4, 1, '1', 4, 50, 51, 52),
(5, 1, '1', 5, 53, 54, 55),
(6, 1, '1', 6, 56, 57, 58),
(7, 1, '1', 7, 59, 60, 61),
(8, 1, '1', 8, 62, 63, 64),
(9, 1, '1', 9, 65, 66, 67),
(10, 1, '1', 10, 68, 69, 70),
(11, 1, '1', 1, 41, 42, 43),
(12, 1, '1', 2, 44, 45, 46),
(13, 1, '1', 3, 47, 48, 49),
(14, 1, '1', 4, 50, 51, 52),
(15, 1, '1', 5, 53, 54, 55),
(16, 1, '1', 6, 56, 57, 58),
(17, 1, '1', 7, 59, 60, 61),
(18, 1, '1', 8, 62, 63, 64),
(19, 1, '1', 9, 65, 66, 67),
(20, 1, '1', 10, 68, 69, 70);

-- --------------------------------------------------------

--
-- Table structure for table `kasus_tb_rj`
--

CREATE TABLE IF NOT EXISTS `kasus_tb_rj` (
  `KASUS_TB_RJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `GOLONGAN_UMUR_ID` int(11) DEFAULT NULL,
  `KASUS_TB_RJ_N2` int(11) DEFAULT NULL,
  `KASUS_TB_RJ_N1` int(11) NOT NULL,
  `KASUS_TB_RJ_N` int(11) NOT NULL,
  PRIMARY KEY (`KASUS_TB_RJ_ID`),
  KEY `FK_RELATIONSHIP_131` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_65` (`GOLONGAN_UMUR_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kasus_tb_rj`
--

INSERT INTO `kasus_tb_rj` (`KASUS_TB_RJ_ID`, `TAHUN_ID`, `RS_NOREG`, `GOLONGAN_UMUR_ID`, `KASUS_TB_RJ_N2`, `KASUS_TB_RJ_N1`, `KASUS_TB_RJ_N`) VALUES
(1, 1, '1', 1, 11, 12, 13),
(2, 1, '1', 2, 14, 15, 16),
(3, 1, '1', 3, 17, 18, 19),
(4, 1, '1', 4, 20, 21, 22),
(5, 1, '1', 5, 23, 24, 25),
(6, 1, '1', 6, 26, 27, 28),
(7, 1, '1', 7, 29, 30, 31),
(8, 1, '1', 1, 11, 12, 13),
(9, 1, '1', 2, 14, 15, 16),
(10, 1, '1', 3, 17, 18, 19),
(11, 1, '1', 4, 20, 21, 22),
(12, 1, '1', 5, 23, 24, 25),
(13, 1, '1', 6, 26, 27, 28),
(14, 1, '1', 7, 29, 30, 31);

-- --------------------------------------------------------

--
-- Table structure for table `kasus_tb_rj_jenis`
--

CREATE TABLE IF NOT EXISTS `kasus_tb_rj_jenis` (
  `KASUS_TB_RJ_JENIS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_TB_ID` int(11) DEFAULT NULL,
  `KASUS_TB_RJ_JENIS_N2` int(11) DEFAULT NULL,
  `KASUS_TB_RJ_JENIS_N1` int(11) NOT NULL,
  `KASUS_TB_RJ_JENIS_N` int(11) NOT NULL,
  PRIMARY KEY (`KASUS_TB_RJ_JENIS_ID`),
  KEY `FK_RELATIONSHIP_133` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_67` (`JENIS_TB_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `kasus_tb_rj_jenis`
--

INSERT INTO `kasus_tb_rj_jenis` (`KASUS_TB_RJ_JENIS_ID`, `TAHUN_ID`, `RS_NOREG`, `JENIS_TB_ID`, `KASUS_TB_RJ_JENIS_N2`, `KASUS_TB_RJ_JENIS_N1`, `KASUS_TB_RJ_JENIS_N`) VALUES
(1, 1, '1', 1, 20, 21, 22),
(2, 1, '1', 2, 23, 24, 25),
(3, 1, '1', 3, 26, 27, 28),
(4, 1, '1', 4, 29, 30, 31),
(5, 1, '1', 5, 32, 33, 34),
(6, 1, '1', 6, 35, 36, 37),
(7, 1, '1', 7, 38, 39, 40),
(8, 1, '1', 8, 41, 42, 43),
(9, 1, '1', 9, 44, 45, 46),
(10, 1, '1', 10, 47, 48, 49),
(11, 1, '1', 1, 20, 21, 22),
(12, 1, '1', 2, 23, 24, 25),
(13, 1, '1', 3, 26, 27, 28),
(14, 1, '1', 4, 29, 30, 31),
(15, 1, '1', 5, 32, 33, 34),
(16, 1, '1', 6, 35, 36, 37),
(17, 1, '1', 7, 38, 39, 40),
(18, 1, '1', 8, 41, 42, 43),
(19, 1, '1', 9, 44, 45, 46),
(20, 1, '1', 10, 47, 48, 49);

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_tenaga`
--

CREATE TABLE IF NOT EXISTS `kebutuhan_tenaga` (
  `KEB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TM_ID` int(11) NOT NULL,
  `KEB_RENCANA` int(11) DEFAULT NULL,
  `KEB_UPAYA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`KEB_ID`),
  KEY `FK_RELATIONSHIP_104` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LKT_ID` (`LIST_TM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kebutuhan_tenaga`
--

INSERT INTO `kebutuhan_tenaga` (`KEB_ID`, `TAHUN_ID`, `RS_NOREG`, `LIST_TM_ID`, `KEB_RENCANA`, `KEB_UPAYA`) VALUES
(1, 1, '1', 1, 11, '22'),
(2, 1, '1', 2, 22, '33'),
(3, 1, '1', 3, 33, '44');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_kesehatan_jiwa`
--

CREATE TABLE IF NOT EXISTS `kegiatan_kesehatan_jiwa` (
  `JIWA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_JIWA_ID` int(11) DEFAULT NULL,
  `JIWA_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`JIWA_ID`),
  KEY `FK_RELATIONSHIP_239` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_JIWA_ID` (`LIST_JIWA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `kegiatan_rawat_inap` (
  `KRI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PEL_RI_ID` int(11) DEFAULT NULL,
  `KRI_TOTAL` int(11) DEFAULT NULL,
  `KRI_PASIENHIDUP_L` int(11) DEFAULT NULL,
  `KRI_PASIENHIDUP_P` int(11) DEFAULT NULL,
  `KRI_PASIENMATI_K48_L` int(11) DEFAULT NULL,
  `KRI_PASIENMATI_K48_P` int(11) DEFAULT NULL,
  `KRI_PASIENMATI_L48_L` int(11) DEFAULT NULL,
  `KRI_PASIENMATI_L48_P` int(11) DEFAULT NULL,
  `KRI_LAMARAWAT` int(11) DEFAULT NULL,
  `KRI_HARIRAWAT` int(11) DEFAULT NULL,
  `KRI_VVIP` int(11) DEFAULT NULL,
  `KRI_VIP` int(11) DEFAULT NULL,
  `KRI_KLSI` int(11) DEFAULT NULL,
  `KRI_KLSII` int(11) DEFAULT NULL,
  `KRI_KLSIII` int(11) DEFAULT NULL,
  `KRI_KETERANGAN` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`KRI_ID`),
  KEY `FK_RELATIONSHIP_180` (`PEL_RI_ID`),
  KEY `FK_RELATIONSHIP_181` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_rujukan`
--

CREATE TABLE IF NOT EXISTS `kegiatan_rujukan` (
  `RJK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SR_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `RJK_RS_TOTALKALI` int(11) DEFAULT NULL,
  `RJK_RS_JUMLAH` int(11) DEFAULT NULL,
  `RJK_PS_TOTALKALI` int(11) DEFAULT NULL,
  `RJK_PS_JUMLAH` int(11) DEFAULT NULL,
  `RJK_KUNJUNGAN_TOTALKALI` int(11) DEFAULT NULL,
  `RJK_KUNJUNGAN_ASING` int(11) DEFAULT NULL,
  `RJK_TOTAL_PASIEN` int(11) DEFAULT NULL,
  `RJK_DARI_PUSKESMAS` int(11) DEFAULT NULL,
  `RJK_DARI_FASILITAS_LAIN` int(11) DEFAULT NULL,
  `RJK_DARI_RSLAIN` int(11) DEFAULT NULL,
  `RJK_KEMBALI_PUSKESMAS` int(11) DEFAULT NULL,
  `RJK_KEMBALI_FASILITAS_LAIN` int(11) DEFAULT NULL,
  `RJK_KEMBALI_RS_ASAL` int(11) DEFAULT NULL,
  `RJK_PASIEN_RUJUKAN` int(11) DEFAULT NULL,
  `RJK_PASIEN_DTG_SENDIRI` int(11) DEFAULT NULL,
  `RJK_DITERIMA_KEMBALI` int(11) DEFAULT NULL,
  PRIMARY KEY (`RJK_ID`),
  KEY `FK_RELATIONSHIP_163` (`SR_ID`),
  KEY `FK_RELATIONSHIP_170` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_rujukan_igd`
--

CREATE TABLE IF NOT EXISTS `kegiatan_rujukan_igd` (
  `RUJUKAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LISTRUJUKAN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `RUJUKAN_IGD_JML_RUJUKAN` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_JML_NON_RUJUKAN` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_DIRAWAT` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_DIRUJUK` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_PULANG` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_TOTAL_KEMATIAN` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_SEBELUM` int(11) DEFAULT NULL,
  `RUJUKAN_IGD_SETELAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`RUJUKAN_ID`),
  KEY `FK_RELATIONSHIP_169` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_35` (`LISTRUJUKAN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_sanitasi`
--

CREATE TABLE IF NOT EXISTS `kegiatan_sanitasi` (
  `SANITASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_SANITASI_ID` int(11) DEFAULT NULL,
  `SANITASI_KESIMPULAN` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`SANITASI_ID`),
  KEY `FK_RELATIONSHIP_226` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_SANITASI_ID` (`LIST_SANITASI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_transfusi_darah`
--

CREATE TABLE IF NOT EXISTS `kegiatan_transfusi_darah` (
  `TRANS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KEGIATAN_TRANS_ID` int(11) DEFAULT NULL,
  `TRANS_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`TRANS_ID`),
  KEY `FK_RELATIONSHIP_219` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `KEGIATAN_TRANS_ID` (`KEGIATAN_TRANS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_rs`
--

CREATE TABLE IF NOT EXISTS `kelas_rs` (
  `kelas_rs_id` int(11) NOT NULL,
  `kelas_rs` varchar(300) NOT NULL,
  PRIMARY KEY (`kelas_rs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_kelola_maskin`
--

CREATE TABLE IF NOT EXISTS `kelengkapan_kelola_maskin` (
  `KELOLA_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KLP_ID` int(11) DEFAULT NULL,
  `KELOLA_MASKIN_KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`KELOLA_MASKIN_ID`),
  KEY `FK_RELATIONSHIP_246` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_81` (`KLP_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_peralatan`
--

CREATE TABLE IF NOT EXISTS `kelengkapan_peralatan` (
  `KPR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JUMLAH_PERALATAN_PER_UNIT` int(11) NOT NULL,
  `JUMLAH_PERALATAN_STANDAR` int(11) NOT NULL,
  `JUMLAH_PERALATAN_KALIBRASI` int(11) NOT NULL,
  `JUMLAH_PERALATAN_KALIBRASI_STANDAR` int(11) NOT NULL,
  `JUMLAH_PERALATAN_KONDISI_BAIK` int(11) NOT NULL,
  `JUMLAH_PERALATAN_TOTAL` int(11) NOT NULL,
  `JUMLAH_LUAS_RUANGAN` int(11) NOT NULL,
  `JUMLAH_LUAS_RUANGAN_STANDAR` int(11) NOT NULL,
  PRIMARY KEY (`KPR_ID`),
  KEY `FK_RELATIONSHIP_100` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kelengkapan_peralatan`
--

INSERT INTO `kelengkapan_peralatan` (`KPR_ID`, `TAHUN_ID`, `RS_NOREG`, `JUMLAH_PERALATAN_PER_UNIT`, `JUMLAH_PERALATAN_STANDAR`, `JUMLAH_PERALATAN_KALIBRASI`, `JUMLAH_PERALATAN_KALIBRASI_STANDAR`, `JUMLAH_PERALATAN_KONDISI_BAIK`, `JUMLAH_PERALATAN_TOTAL`, `JUMLAH_LUAS_RUANGAN`, `JUMLAH_LUAS_RUANGAN_STANDAR`) VALUES
(1, 1, '1', 3, 4, 2, 5, 1, 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_survey_maskin`
--

CREATE TABLE IF NOT EXISTS `kelengkapan_survey_maskin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KP_MASKIN_ID` int(11) DEFAULT NULL,
  `KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_RELATIONSHIP_245` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_83` (`KP_MASKIN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_maskin_petugas`
--

CREATE TABLE IF NOT EXISTS `keluhan_maskin_petugas` (
  `SV_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PMASKIN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SV_MASKIN_UGD` int(11) DEFAULT NULL,
  `SV_MASKIN_UGD_P` float DEFAULT NULL,
  `SV_MASKIN_IRJA` int(11) DEFAULT NULL,
  `SV_MASKIN_IRJA_P` float DEFAULT NULL,
  `SV_MASKIN_IRNA` int(11) DEFAULT NULL,
  `SV_MASKIN_IRNA_P` float DEFAULT NULL,
  PRIMARY KEY (`SV_MASKIN_ID`),
  KEY `FK_RELATIONSHIP_247` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_84` (`PMASKIN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kematian_ibu_karena_persalinan`
--

CREATE TABLE IF NOT EXISTS `kematian_ibu_karena_persalinan` (
  `KIP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) NOT NULL,
  `TRIBULAN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `KIP_TOTAL` int(11) DEFAULT NULL,
  `KIP_PENDARAHAN` int(11) DEFAULT NULL,
  `KIP_EKLAMPSIA` int(11) DEFAULT NULL,
  `KIP_SEPSIS` int(11) DEFAULT NULL,
  PRIMARY KEY (`KIP_ID`),
  KEY `FK_RELATIONSHIP_128` (`TRIBULAN_ID`),
  KEY `FK_RELATIONSHIP_141` (`TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `kematian_ibu_karena_persalinan`
--

INSERT INTO `kematian_ibu_karena_persalinan` (`KIP_ID`, `RS_NOREG`, `TRIBULAN_ID`, `TAHUN_ID`, `KIP_TOTAL`, `KIP_PENDARAHAN`, `KIP_EKLAMPSIA`, `KIP_SEPSIS`) VALUES
(1, '1', 1, 1, 91, 82, 73, 64),
(2, '1', 2, 1, 82, 73, 64, 55),
(3, '1', 3, 1, 73, 64, 55, 46),
(4, '1', 4, 1, 64, 55, 46, 37),
(5, '1', 1, 1, 91, 82, 73, 64),
(6, '1', 2, 1, 82, 73, 64, 55),
(7, '1', 3, 1, 73, 64, 55, 46),
(8, '1', 4, 1, 64, 55, 46, 37),
(9, '1', 1, 1, 91, 82, 73, 64),
(10, '1', 2, 1, 82, 73, 64, 55),
(11, '1', 3, 1, 73, 64, 55, 46),
(12, '1', 4, 1, 64, 55, 46, 37);

-- --------------------------------------------------------

--
-- Table structure for table `ketenagaan`
--

CREATE TABLE IF NOT EXISTS `ketenagaan` (
  `KETENAGAAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LK_ID` int(11) DEFAULT NULL,
  `KETENAGAAN_JUMLAH` int(11) DEFAULT NULL,
  `KETENAGAAN_TETAP` int(11) NOT NULL,
  `KETENAGAAN_KONTRAK` int(11) NOT NULL,
  PRIMARY KEY (`KETENAGAAN_ID`),
  KEY `FK_RELATIONSHIP_106` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_17` (`LK_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `ketenagaan`
--

INSERT INTO `ketenagaan` (`KETENAGAAN_ID`, `TAHUN_ID`, `RS_NOREG`, `LK_ID`, `KETENAGAAN_JUMLAH`, `KETENAGAAN_TETAP`, `KETENAGAAN_KONTRAK`) VALUES
(1, 1, '1', 1, 1, 2, 3),
(2, 1, '1', 2, 2, 3, 4),
(3, 1, '1', 3, 3, 4, 5),
(4, 1, '1', 4, 4, 5, 6),
(5, 1, '1', 5, 5, 6, 7),
(6, 1, '1', 6, 6, 7, 8),
(7, 1, '1', 7, 7, 8, 9),
(8, 1, '1', 8, 8, 9, 10),
(9, 1, '1', 9, 9, 10, 11),
(10, 1, '1', 10, 10, 11, 12),
(11, 1, '1', 11, 11, 12, 13),
(12, 1, '1', 12, 12, 13, 14),
(13, 1, '1', 13, 13, 14, 15),
(14, 1, '1', 14, 14, 15, 16),
(15, 1, '1', 15, 15, 16, 17),
(16, 1, '1', 16, 16, 17, 18),
(17, 1, '1', 17, 17, 18, 19),
(18, 1, '1', 18, 18, 19, 20),
(19, 1, '1', 19, 19, 20, 21),
(20, 1, '1', 20, 20, 21, 22),
(21, 1, '1', 21, 21, 22, 23),
(22, 1, '1', 22, 22, 23, 24),
(23, 1, '1', 23, 23, 24, 25),
(24, 1, '1', 24, 24, 25, 26),
(25, 1, '1', 25, 25, 26, 27),
(26, 1, '1', 26, 26, 27, 28),
(27, 1, '1', 27, 27, 28, 29),
(28, 1, '1', 28, 28, 29, 30),
(29, 1, '1', 29, 29, 30, 31),
(30, 1, '1', 30, 30, 31, 32),
(31, 1, '1', 31, 31, 32, 33),
(32, 1, '1', 32, 32, 33, 34),
(33, 1, '1', 33, 33, 34, 35),
(34, 1, '1', 34, 34, 35, 36),
(35, 1, '1', 35, 35, 36, 37),
(36, 1, '1', 36, 36, 37, 38),
(37, 1, '1', 37, 37, 38, 39),
(38, 1, '1', 38, 38, 39, 40),
(39, 1, '1', 39, 39, 40, 41),
(40, 1, '1', 40, 40, 41, 42),
(41, 1, '1', 41, 41, 42, 43),
(42, 1, '1', 42, 42, 43, 44),
(43, 1, '1', 43, 43, 44, 45),
(44, 1, '1', 44, 44, 45, 46),
(45, 1, '1', 45, 45, 46, 47),
(46, 1, '1', 46, 46, 47, 48),
(47, 1, '1', 47, 47, 48, 49),
(48, 1, '1', 48, 48, 49, 50),
(49, 1, '1', 49, 49, 50, 51),
(50, 1, '1', 50, 50, 51, 52),
(51, 1, '1', 51, 51, 52, 53),
(52, 1, '1', 52, 52, 53, 54),
(53, 1, '1', 53, 53, 54, 55),
(54, 1, '1', 54, 54, 55, 56),
(55, 1, '1', 55, 55, 56, 57),
(56, 1, '1', 56, 56, 57, 58),
(57, 1, '1', 57, 57, 58, 59),
(58, 1, '1', 58, 58, 59, 60),
(59, 1, '1', 59, 59, 60, 61),
(60, 1, '1', 60, 60, 61, 62),
(61, 1, '1', 61, 61, 62, 63),
(62, 1, '1', 62, 62, 63, 64),
(63, 1, '1', 63, 63, 64, 65),
(64, 1, '1', 64, 64, 65, 66),
(65, 1, '1', 65, 65, 66, 67),
(66, 1, '1', 66, 66, 67, 68),
(67, 1, '1', 67, 67, 68, 69),
(68, 1, '1', 68, 68, 69, 70),
(69, 1, '1', 69, 69, 70, 71),
(70, 1, '1', 70, 70, 71, 72),
(71, 1, '1', 71, 71, 72, 73);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_peralatan_rs`
--

CREATE TABLE IF NOT EXISTS `kondisi_peralatan_rs` (
  `PERALATAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_PERALATAN_ID` int(11) DEFAULT NULL,
  `PERALATAN_KONDISI` tinyint(1) DEFAULT NULL,
  `PERALATAN_KETERANGAN` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PERALATAN_ID`),
  KEY `FK_RELATIONSHIP_107` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_16` (`LIST_PERALATAN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `kondisi_peralatan_rs`
--

INSERT INTO `kondisi_peralatan_rs` (`PERALATAN_ID`, `TAHUN_ID`, `RS_NOREG`, `LIST_PERALATAN_ID`, `PERALATAN_KONDISI`, `PERALATAN_KETERANGAN`) VALUES
(1, 1, '1', 1, 0, 'keterangan 1'),
(2, 1, '1', 2, 1, 'keterangan 2'),
(3, 1, '1', 3, 2, 'keterangan 3'),
(4, 1, '1', 4, 1, 'keterangan 4'),
(5, 1, '1', 5, 0, 'keterangan 5'),
(6, 1, '1', 6, 1, 'keterangan 6'),
(7, 1, '1', 7, 2, 'keterangan 7'),
(8, 1, '1', 8, 1, 'keterangan 8'),
(9, 1, '1', 9, 0, 'keterangan 9'),
(10, 1, '1', 10, 1, 'keterangan 10'),
(11, 1, '1', 11, 2, 'keterangan 11'),
(12, 1, '1', 12, 1, 'keterangan 12'),
(13, 1, '1', 13, 0, 'keterangan 13'),
(14, 1, '1', 14, 1, 'keterangan 14'),
(15, 1, '1', 15, 2, 'keterangan 15'),
(16, 1, '1', 16, 1, 'keterangan 16'),
(17, 1, '1', 17, 0, 'keterangan 17'),
(18, 1, '1', 18, 1, 'keterangan 18'),
(19, 1, '1', 19, 2, 'keterangan 19'),
(20, 1, '1', 20, 1, 'keterangan 20'),
(21, 1, '1', 21, 0, 'keterangan 21'),
(22, 1, '1', 22, 1, 'keterangan 22'),
(23, 1, '1', 23, 2, 'keterangan 23'),
(24, 1, '1', 24, 1, 'keterangan 24'),
(25, 1, '1', 25, 0, 'keterangan 25'),
(26, 1, '1', 26, 1, 'keterangan 26'),
(27, 1, '1', 27, 2, 'keterangan 27'),
(28, 1, '1', 28, 1, 'keterangan 28'),
(29, 1, '1', 29, 0, 'keterangan 29'),
(30, 1, '1', 30, 1, 'keterangan 30'),
(31, 1, '1', 31, 2, 'keterangan 31'),
(32, 1, '1', 32, 1, 'keterangan 32'),
(33, 1, '1', 33, 0, 'keterangan 33'),
(34, 1, '1', 34, 1, 'keterangan 34'),
(35, 1, '1', 35, 2, 'keterangan 35'),
(36, 1, '1', 36, 1, 'keterangan 36'),
(37, 1, '1', 37, 0, 'keterangan 37'),
(38, 1, '1', 38, 1, 'keterangan 38'),
(39, 1, '1', 39, 2, 'keterangan 39'),
(40, 1, '1', 40, 1, 'keterangan 40'),
(41, 1, '1', 41, 0, 'keterangan 41'),
(42, 1, '1', 42, 1, 'keterangan 42'),
(43, 1, '1', 43, 2, 'keterangan 43'),
(44, 1, '1', 44, 1, 'keterangan 44'),
(45, 1, '1', 45, 0, 'keterangan 45'),
(46, 1, '1', 46, 1, 'keterangan 46'),
(47, 1, '1', 47, 2, 'keterangan 47'),
(48, 1, '1', 48, 1, 'keterangan 48'),
(49, 1, '1', 49, 0, 'keterangan 49'),
(50, 1, '1', 50, 1, 'keterangan 50'),
(51, 1, '1', 51, 2, 'keterangan 51'),
(52, 1, '1', 52, 1, 'keterangan 52'),
(53, 1, '1', 53, 0, 'keterangan 53'),
(54, 1, '1', 54, 1, 'keterangan 54'),
(55, 1, '1', 55, 0, 'keterangan 55'),
(56, 1, '1', 56, 1, 'keterangan 56'),
(57, 1, '1', 57, 2, 'keterangan 57'),
(58, 1, '1', 58, 1, 'keterangan 58'),
(59, 1, '1', 59, 0, 'keterangan 59'),
(60, 1, '1', 60, 1, 'keterangan 60'),
(61, 1, '1', 61, 2, 'keterangan 61'),
(62, 1, '1', 62, 1, 'keterangan 62'),
(63, 1, '1', 63, 0, 'keterangan 63'),
(64, 1, '1', 64, 1, 'keterangan 64'),
(65, 1, '1', 65, 2, 'keterangan 65'),
(66, 1, '1', 66, 1, 'keterangan 66'),
(67, 1, '1', 67, 0, 'keterangan 67'),
(68, 1, '1', 68, 1, 'keterangan 68'),
(69, 1, '1', 69, 2, 'keterangan 69'),
(70, 1, '1', 70, 2, 'keterangan 70');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_gizi`
--

CREATE TABLE IF NOT EXISTS `konsultasi_gizi` (
  `KG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `TIPE_PASIEN_ID` int(11) DEFAULT NULL,
  `KG_JUMLAH` int(11) DEFAULT NULL,
  `KG_KETERANGAN` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`KG_ID`),
  KEY `FK_RELATIONSHIP_215` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `TIPE_PASIEN_ID` (`TIPE_PASIEN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kujungan_rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `kujungan_rawat_jalan` (
  `KRJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POLI_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KRJ_LAMA_L` int(11) DEFAULT NULL,
  `KRJ_LAMA_P` int(11) DEFAULT NULL,
  `KRJ_LAMA_TOTAL` int(11) DEFAULT NULL,
  `KRJ_BARU_L` int(11) DEFAULT NULL,
  `KRJ_BARU_P` int(11) DEFAULT NULL,
  `KRJ_BARU_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`KRJ_ID`),
  KEY `FK_RELATIONSHIP_172` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_22` (`POLI_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_igd`
--

CREATE TABLE IF NOT EXISTS `kunjungan_igd` (
  `TJK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) NOT NULL,
  `TJK_UMUM` int(11) DEFAULT NULL,
  `TJK_ASKES` int(11) DEFAULT NULL,
  `TJK_ASURANSI_LAIN` int(11) DEFAULT NULL,
  `TJK_JAMKESMAS` int(11) DEFAULT NULL,
  `TJK_JAMKESDA` int(11) DEFAULT NULL,
  `TJK_JAMSOSTEK` int(11) DEFAULT NULL,
  `TJK_SPM` int(11) DEFAULT NULL,
  `TJK_LAIN` int(11) DEFAULT NULL,
  `TJK_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`TJK_ID`),
  KEY `FK_RELATIONSHIP_164` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laptah_penemuan_tb`
--

CREATE TABLE IF NOT EXISTS `laptah_penemuan_tb` (
  `LAPTAH_TB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `TIPE_TB` int(11) DEFAULT NULL,
  `LAPTAH_TB_ANAK_0_4_L` int(11) NOT NULL,
  `LAPTAH_TB_ANAK_0_4_P` int(11) NOT NULL,
  `LAPTAH_TB_ANAK_5_14_L` int(11) NOT NULL,
  `LAPTAH_TB_ANAK_5_14_P` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_15_24_L` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_15_24_P` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_23_34_L` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_23_34_P` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_35_44_L` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_35_44_P` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_45_54_L` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_45_54_P` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_55_65_L` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_55_65_P` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_65_L` int(11) NOT NULL,
  `LAPTAH_TB_DEWASA_65_P` int(11) NOT NULL,
  `LAPTAH_TB_TOTAL_L` int(11) NOT NULL,
  `LAPTAH_TB_TOTAL_P` int(11) NOT NULL,
  `LAPTAH_TB_TOTAL` int(11) NOT NULL,
  PRIMARY KEY (`LAPTAH_TB_ID`),
  KEY `FK_RELATIONSHIP_125` (`TIPE_TB`),
  KEY `FK_RELATIONSHIP_142` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `laptah_penemuan_tb`
--

INSERT INTO `laptah_penemuan_tb` (`LAPTAH_TB_ID`, `TAHUN_ID`, `RS_NOREG`, `TIPE_TB`, `LAPTAH_TB_ANAK_0_4_L`, `LAPTAH_TB_ANAK_0_4_P`, `LAPTAH_TB_ANAK_5_14_L`, `LAPTAH_TB_ANAK_5_14_P`, `LAPTAH_TB_DEWASA_15_24_L`, `LAPTAH_TB_DEWASA_15_24_P`, `LAPTAH_TB_DEWASA_23_34_L`, `LAPTAH_TB_DEWASA_23_34_P`, `LAPTAH_TB_DEWASA_35_44_L`, `LAPTAH_TB_DEWASA_35_44_P`, `LAPTAH_TB_DEWASA_45_54_L`, `LAPTAH_TB_DEWASA_45_54_P`, `LAPTAH_TB_DEWASA_55_65_L`, `LAPTAH_TB_DEWASA_55_65_P`, `LAPTAH_TB_DEWASA_65_L`, `LAPTAH_TB_DEWASA_65_P`, `LAPTAH_TB_TOTAL_L`, `LAPTAH_TB_TOTAL_P`, `LAPTAH_TB_TOTAL`) VALUES
(1, 1, '1', 1, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30),
(2, 1, '1', 2, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31),
(3, 1, '1', 3, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32),
(4, 1, '1', 4, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36),
(5, 1, '1', 5, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37),
(6, 1, '1', 6, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38),
(7, 1, '1', 7, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39),
(8, 1, '1', 8, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40);

-- --------------------------------------------------------

--
-- Table structure for table `layanan_umum`
--

CREATE TABLE IF NOT EXISTS `layanan_umum` (
  `LYN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `LYN_SIM_RS` tinyint(1) DEFAULT NULL,
  `LYN_BANK_DARAH` tinyint(1) DEFAULT NULL,
  `LYN_UNGGULAN` text,
  PRIMARY KEY (`LYN_ID`),
  KEY `FK_RELATIONSHIP_91` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_analisa`
--

CREATE TABLE IF NOT EXISTS `list_analisa` (
  `list_analisa_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_analisa_nama` varchar(200) NOT NULL,
  PRIMARY KEY (`list_analisa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `list_analisa`
--

INSERT INTO `list_analisa` (`list_analisa_id`, `list_analisa_nama`) VALUES
(1, 'Tingkat Efesiensi dan Mutu Pengelolaan Rumah Sakit - Bab II Sheet 3'),
(2, 'Kelengkapan Peralatan Bab III Sheet 3 1'),
(3, 'Kelayakan Peralatan Bab III Sheet 3 2'),
(4, 'Kelayakan Ruangan Bab III Sheet 3 3'),
(5, ' Analisa Ketenagaan Rumah Sakit, Bab III sheet 5'),
(6, 'ANALISA TREND Sales Growth Rate - Bab IV'),
(7, 'ANALISA TREND Cost Recovery - Bab IV'),
(8, 'ANALISA TREND Rasio Keuangan  - Bab IV'),
(9, 'Analisa V.1.a Trend Jumlah Kunjungan IGD'),
(10, 'Analisa V.2.d. Pencapaian Standar Pelayanan Minimal Rawat Jalan						'),
(11, 'Analisa V.3.c. Indikator Klinik Kegiatan Rawat Inap				'),
(12, 'Analisa V.3.d.  10 Besar Penyakit Kegiatan Rawat Inap'),
(13, 'Analisa V.4.a. Jumlah Operasi'),
(14, 'Analisa V.5.c. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Persalinan, Perinatologi dan Neonatologi'),
(15, 'Analisa V.5.d. Permasalahan dan Pemecahan Masalah di Pelayanan Persalinan, Perinatalogi dan Neonatologi'),
(16, 'Analisa v.6.a Hasil Pelayanan Kegiatan KB'),
(17, 'Analisa V.7.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Intensif'),
(18, 'Analisa V.7.b. Permasalahan dan Pemecahan Masalah di Pelayanan Intensif'),
(19, 'Analisa V.8.a. Jumlah Kunjungan Pelayanan Radiologi'),
(20, 'Analisa V.8.b. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Radiologi'),
(21, 'Analisa V.8.c. Permasalahan dan Pemecahan Masalah di Pelayanan Radiologi'),
(22, 'Analisa V.9.b. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Laboratorium'),
(23, 'Analisa V.9.c. Permasalahan dan Pemecahan Masalah di Pelayanan Laboratorium'),
(24, 'Analisa V.10.b. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Rehabilitasi Medik'),
(25, 'Analisa V.10.c. Permasalahan dan Pemecahan Masalah di Rehabilitasi Medik'),
(26, 'Analisa V.11.a. Pelayanan Obat'),
(27, 'Analisa V.11.b. Permasalahan dan Pemecahan Masalah di Pelayanan Farmasi'),
(28, 'Analisa V.11.c. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Farmasi'),
(29, 'Analisa V.12.a. Jumlah Pelayanan Diit'),
(30, 'Analisa V.12.c Evaluasi mutu asuhan gizi'),
(31, 'Analisa V.12.d. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Gizi'),
(32, 'Analisa V.12.e. Permasalahan dan Pemecahan Masalah di Pelayanan Gizi'),
(33, 'Analisa V.13.d. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Transfusi Darah'),
(34, 'Analisa V.13.e. Permasalahan dan Pemecahan Masalah di Pelayanan Transfusi Darah'),
(35, 'Analisa V.14.g Hasil Survey Keluhan Pasien Masyarakat Miskin di RS				'),
(36, 'Analisa V.14.l. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Maskin :'),
(37, 'Analisa V.15.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Rekam Medik'),
(38, 'Analisa V.16.b. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Limbah'),
(39, 'Analisa V.17.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Administrasi dan Manajemen'),
(40, 'Analisa V.18.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Ambulans/Kereta Jenazah'),
(41, 'Analisa V.19.b. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Pemulasaraan Jenazah'),
(42, 'Analisa V.20.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Pemeliharaan Sarana'),
(43, 'Analisa V.21.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Pemeliharaan Laundry'),
(44, 'Analisa V.22.a. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Pemeliharaan Pengendalian Infeksi'),
(45, 'VI.1. Analisa Evaluasi Standar Pelayanan Minimal  RS'),
(46, 'VI.2 Analisa Survey Kepuasan Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `list_cost_recovery`
--

CREATE TABLE IF NOT EXISTS `list_cost_recovery` (
  `list_cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_cr_nama` varchar(200) NOT NULL,
  PRIMARY KEY (`list_cr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_cost_recovery`
--

INSERT INTO `list_cost_recovery` (`list_cr_id`, `list_cr_nama`) VALUES
(1, 'Pendapatan (Revenue)'),
(2, 'Belanja (Cost)	'),
(3, 'Cost Recovery (%)');

-- --------------------------------------------------------

--
-- Table structure for table `list_golongan_obat`
--

CREATE TABLE IF NOT EXISTS `list_golongan_obat` (
  `GO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GO_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`GO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `list_golongan_obat`
--

INSERT INTO `list_golongan_obat` (`GO_ID`, `GO_NAMA`) VALUES
(1, 'Obat generik berlogo'),
(2, 'Obat generik tdk berlogo'),
(3, 'Obat sesuai Formularium'),
(4, 'Obat paten');

-- --------------------------------------------------------

--
-- Table structure for table `list_golongan_umur`
--

CREATE TABLE IF NOT EXISTS `list_golongan_umur` (
  `GOLONGAN_UMUR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GOLONGAN_UMUR_URAIAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`GOLONGAN_UMUR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `list_golongan_umur`
--

INSERT INTO `list_golongan_umur` (`GOLONGAN_UMUR_ID`, `GOLONGAN_UMUR_URAIAN`) VALUES
(1, '< 1 tahun'),
(2, '1 – 4 tahun '),
(3, '5 – 14 tahun'),
(4, '15 – 24 tahun'),
(5, '25 – 44 tahun'),
(6, '45 – 64 tahun'),
(7, '65 + tahun');

-- --------------------------------------------------------

--
-- Table structure for table `list_golongan_umur_tb`
--

CREATE TABLE IF NOT EXISTS `list_golongan_umur_tb` (
  `GOL_TB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GOL_TB_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`GOL_TB_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `list_golongan_umur_tb`
--

INSERT INTO `list_golongan_umur_tb` (`GOL_TB_ID`, `GOL_TB_NAMA`) VALUES
(1, '0-4'),
(2, '5-14'),
(3, '15-24'),
(4, '23-34'),
(5, '35-44'),
(6, '45-54'),
(7, '55-65'),
(8, '>65');

-- --------------------------------------------------------

--
-- Table structure for table `list_hemo_sarpras`
--

CREATE TABLE IF NOT EXISTS `list_hemo_sarpras` (
  `hemo_sarpras_id` int(11) NOT NULL AUTO_INCREMENT,
  `hemo_sarpras_nama` varchar(200) NOT NULL,
  PRIMARY KEY (`hemo_sarpras_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `list_hemo_sarpras`
--

INSERT INTO `list_hemo_sarpras` (`hemo_sarpras_id`, `hemo_sarpras_nama`) VALUES
(1, 'Ruang perlatan mesin HD untuk kapasitas 4 mesin HD'),
(2, 'Ruang pemeriksaan dokter/konsultan'),
(3, 'Ruang Tindakan'),
(4, 'Ruang perawatan'),
(5, 'Ruang Sterilisasi'),
(6, 'Ruang Penyimpanan Obat'),
(7, 'Ruang Penunjang Medik'),
(8, 'Ruang administarsi dan ruang tunggu pasien');

-- --------------------------------------------------------

--
-- Table structure for table `list_hemo_tenaga_medik`
--

CREATE TABLE IF NOT EXISTS `list_hemo_tenaga_medik` (
  `LIST_HEMO_TENAGA_MEDIK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_HEMO_TENAGA_MEDIK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_HEMO_TENAGA_MEDIK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `list_hemo_tenaga_medik`
--

INSERT INTO `list_hemo_tenaga_medik` (`LIST_HEMO_TENAGA_MEDIK_ID`, `LIST_HEMO_TENAGA_MEDIK_NAMA`) VALUES
(1, 'Konsultan Ginjal Hipertensi (KGH)'),
(2, 'Dokter SP PD KGH yang memiliki SIP'),
(3, 'Dr Sp Peny Dalam yang bersertifikat HD oleh organisasi profesi'),
(4, 'Dokter bersertifikat HD'),
(5, 'Perawat Mahir HD'),
(6, 'Teknik Elektromedik dg pelatihan khusus mesin dialisis'),
(7, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_indikator_klinik_ri`
--

CREATE TABLE IF NOT EXISTS `list_indikator_klinik_ri` (
  `IKRI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IKRI_NAMA` varchar(100) NOT NULL,
  PRIMARY KEY (`IKRI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_indikator_klinik_ri`
--

INSERT INTO `list_indikator_klinik_ri` (`IKRI_ID`, `IKRI_NAMA`) VALUES
(1, 'Angka Dekubitus		'),
(2, 'Angka Infeksi Saluran Kencing		'),
(3, 'Angka Infeksi Luka Operasi		'),
(4, 'Angka Infeksi karena jarum infus		'),
(5, 'Lain-lain 		');

-- --------------------------------------------------------

--
-- Table structure for table `list_indikator_spm`
--

CREATE TABLE IF NOT EXISTS `list_indikator_spm` (
  `INDIKATOR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INDIKATOR_KATEGORI_ID` int(11) NOT NULL,
  `INDIKATOR_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`INDIKATOR_ID`),
  KEY `INDIKATOR_KATEGORI_ID` (`INDIKATOR_KATEGORI_ID`),
  KEY `INDIKATOR_KATEGORI_ID_2` (`INDIKATOR_KATEGORI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `list_indikator_spm`
--

INSERT INTO `list_indikator_spm` (`INDIKATOR_ID`, `INDIKATOR_KATEGORI_ID`, `INDIKATOR_NAMA`) VALUES
(1, 1, 'Kemampuan menangani life saving anak dan dewasa			'),
(2, 1, 'Jam buka pelayanan gawat darurat        '),
(3, 1, 'Pemberi pelayanan kegawatdaruratan yang bersertifikat yang masih berlaku			'),
(4, 1, 'Ketersediaan tim penanggulangan bencana			'),
(5, 1, 'Waktu tanggap pelayanan Dokter di Gawat Darurat			'),
(6, 1, 'Kepuasan Pelanggan			'),
(7, 1, 'Kematian pasien  ? 24 jam			'),
(8, 1, 'Khusus untuk RS Jiwa Pasien dapat ditenangkan dalam waktu ? 48 jam			'),
(9, 1, 'Tidak adanya pasien yang diharuskan membayar uang muka			'),
(18, 2, 'Dokter pemberi pelayanan di Poliklinik Spesialis	'),
(19, 2, 'Ketersediaan Pelayanan'),
(20, 2, 'Ketersediaan Pelayanan di RS Jiwa '),
(21, 2, 'Jam buka pelayanan'),
(22, 2, 'Waktu tunggu di rawat jalan'),
(23, 2, 'Kepuasan Pelanggan'),
(24, 2, 'a. Penegakan diagnosis TB melalui pemeriksaan mikroskop TB (untuk RS yang telah melaksanakan TB DOTS)'),
(25, 2, 'b. Terlaksananya kegiatan pencatatan dan pelaporan TB di rumah sakit'),
(26, 3, 'Pemberi pelayanan di Rawat Inap'),
(27, 3, 'Dokter penanggung jawab pasien rawat inap'),
(28, 3, 'Ketersediaan Pelayanan Rawat Inap'),
(29, 3, 'Jam Visite Dokter Spesialis'),
(30, 3, 'Kejadian infeksi pasca operasi	'),
(31, 3, 'Kejadian infeksi nosokomial	'),
(32, 3, 'Tidak adanya kejadian pasien jatuh yang berakibat kecacatan/kematian	'),
(33, 3, 'Kematian pasien > 48 jam	'),
(34, 3, 'Kejadian pulang paksa	'),
(35, 3, 'Kepuasan pelanggan	'),
(36, 3, 'Rawat inap TB: Penegakan diagnosis TB melalui pemeriksaan mikroskopis TB	'),
(37, 3, 'Rawat inap TB: Terlaksananya kegiatan pencatatan dan pelaporan TB di Rumah Sakit	'),
(38, 3, 'Ketersediaan Pelayanan Rawat Inap di RS yg memberikan pelayanan jiwa	'),
(39, 3, 'Tidak adanya kejadian kematian pasien gangguan jiwa karena bunuh diri	'),
(40, 3, 'Kejadian re-admission pasien gangguan jiwa dalam waktu ? 1 bulan	'),
(41, 3, 'Lama hari perawatan pasien gangguan jiwa	'),
(42, 4, 'Waktu tunggu operasi elektif							'),
(43, 4, 'Kejadian kematian di meja operasi							'),
(44, 4, 'Tidak adanya kejadian operasi salah sisi							'),
(45, 4, 'Tidak adanya kejadian operasi salah orang							'),
(46, 4, 'Tidak adanya kejadian salah tindakan pada operasi							'),
(47, 4, 'Tidak adanya kejadian tertinggalnya benda asing/lain pada tubuh pasien setelah operasi'),
(48, 4, 'Komplikasi anestesi karena overdosis,reaksi anestesi, dan salah penempatan endotracheal tube							'),
(49, 5, 'Kejadian kematian ibu karena persalinan'),
(50, 5, 'Pemberi pelayanan persalinan normal'),
(51, 5, 'Pemberi pelayanan persalinan dengan penyulit'),
(52, 5, 'Pemberi pelayanan persalinan dengan tindakan operasi'),
(53, 5, 'Kemampuan menangani BBLR 1500 gr-2500 gr'),
(54, 5, 'Pertolongan persalinan melalui seksio cesaria'),
(55, 5, 'Keluarga Berencana: a. Presentase KB (Vasektomi &tubektomi yang dilakukan oleh tenaga kompeten dr. SpOG, dr. Sp.B, dr. SP.U, dokter umum terlatih'),
(56, 5, 'Keluarga Berencana: b. Presentasi peserta KB mantap yang mendapat konseling KB mantap oleh bidan terlatih'),
(57, 5, 'Kepuasan pelanggan'),
(58, 6, 'Rata-rata Pasien yang kembali ke perawatan intensif dengan kasus yang sama <72'),
(59, 6, 'Pemberi pelayanan Unit Intensif'),
(60, 7, 'Waktu tunggu hasil pelayanan thorax foto'),
(61, 7, 'Pelaksana ekspertisi'),
(62, 7, 'Kejadian kegagalan pelayanan Rontgen'),
(63, 7, 'Kepuasan Pelanggan'),
(64, 8, 'Waktu tunggu hasil pelayanan laboratorium'),
(65, 8, 'Pelaksana ekspertisi'),
(66, 8, 'Tidak adanya kesalahan pemberian hasil pemeriksaan laboratorium'),
(67, 8, 'Kepuasan Pelanggan'),
(68, 9, 'Kejadian Drop Out pasien terhadap pelayanan Rehabilitasi Medik yang direncanakan'),
(69, 9, 'Tidak adanya kejadian kesalahan tindakan rehabilitasi medik'),
(70, 9, 'Kepuasan Pelanggan'),
(71, 10, 'Waktu tunggu pelayanan a. Obat jadi'),
(72, 10, 'Waktu tunggu pelayanan b. Racikan'),
(73, 10, 'Tidak adanya kejadian kesalahan pemberian obat'),
(74, 10, 'Kepuasan pelanggan'),
(75, 10, 'Penulisan resep sesuai formularium'),
(76, 11, 'Ketepatan waktu pemberian makanankepada pasien'),
(77, 11, 'Sisa makanan yang tidak termakan oleh pasien'),
(78, 11, 'Tidak adanya kejadian kesalahan pemberian diet'),
(79, 12, 'Kebutuhan darah bagi setiap pelayanan tranfusi'),
(80, 12, 'Kejadian Reaksi tranfusi'),
(81, 13, 'Pelayanan terhadap pasien GAKIN yang datang ke RS pada setiap unit pelayanan.'),
(82, 14, 'Kelengkapan pengisian rekam medis 24 jam setelah selesai pelayanan.'),
(83, 14, 'Kelengkapan Informed Concent setelah mendapatkan informasi yang jelas.'),
(84, 14, 'Waktu penyediaan dokumen rekam medik pelayanan rawat jalan'),
(85, 14, 'Waktu penyediaan dokumen rekam medik pelayanan rawat inap.'),
(86, 15, 'Baku mutu limbah cair '),
(87, 15, 'Pengelolaan limbah padat infeksius sesuai dengan aturan'),
(88, 16, 'Tindak lanjut penyelesaian hasil pertemuan tingkat direksi'),
(89, 16, 'Kelengkapan laporan akuntabilitas kinerja'),
(90, 16, 'Ketepatan waktu pengusulan kenaikan pangkat'),
(91, 16, 'Ketepatan waktu pengusulan gaji berkala'),
(92, 16, 'Karyawan yang mendapat pelatihan minimal 20 jam setahun'),
(93, 16, 'Cost recovery'),
(94, 16, 'Ketepatan waktu penyusunan laporan keuangan'),
(95, 16, 'Kecepatan waktu pemberian informasi tentang tagihan pasien rawat inap'),
(96, 16, 'Ketepatan waktu pemberian imbalan (insentif) sesuai kesepakatan waktu'),
(97, 17, 'Waktu pelayanan ambulance/Kereta Jenazah'),
(98, 17, 'Kecepatan memberikan pelayanan ambulance/Kereta jenazah di Rumah Sakit'),
(99, 17, 'Response time pelayanan ambulance oleh masyarakat yang membutuhkan'),
(100, 18, 'Waktu tanggap pelayanan pemulasaran jenazah'),
(101, 19, 'Kecepatan waktu menanggapi kerusakan alat'),
(102, 19, 'Ketepatan waktu pemeliharaan alat'),
(103, 19, 'Peralatan laboratorium dan alat ukur yang digunakan dalam pelayanan terkalibrasi tepat waktu sesuai dengan ketentuan kalibrasi'),
(104, 20, 'Tidak adanya linen yang hilang'),
(105, 20, 'Ketepatan waktu penyediaan linen untuk ruang rawat inap'),
(106, 21, 'Ada anggota tim PPI yang terlatih'),
(107, 21, 'Tersedia APD di setiap instalasi/departement'),
(108, 21, 'Kegiatan pencatatan dan pelaporan infeksi nosokomial/HAI (health care associated infections) di rumah sakit (minimum satu parameter)');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_diet`
--

CREATE TABLE IF NOT EXISTS `list_jenis_diet` (
  `JENIS_DIET_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_DIET` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`JENIS_DIET_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_jenis_diet`
--

INSERT INTO `list_jenis_diet` (`JENIS_DIET_ID`, `JENIS_DIET`) VALUES
(1, 'TKTP'),
(2, 'Bubur Halus'),
(3, 'Rendah Serat'),
(4, 'Rendah Garam'),
(5, 'Rendah Lemak'),
(6, 'Lain - Lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_imunisasi`
--

CREATE TABLE IF NOT EXISTS `list_jenis_imunisasi` (
  `JENIS_IMUNISASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_IMUNISASI_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`JENIS_IMUNISASI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `list_jenis_imunisasi`
--

INSERT INTO `list_jenis_imunisasi` (`JENIS_IMUNISASI_ID`, `JENIS_IMUNISASI_NAMA`) VALUES
(1, 'BCG'),
(2, 'DTP'),
(3, 'Poliomelitis'),
(4, 'Tetanus Toxoid'),
(5, 'D T  '),
(6, 'Campak'),
(7, 'Hepatitis B'),
(8, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_operasi`
--

CREATE TABLE IF NOT EXISTS `list_jenis_operasi` (
  `JENIS_OPERASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_OPERASI_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`JENIS_OPERASI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `list_jenis_operasi`
--

INSERT INTO `list_jenis_operasi` (`JENIS_OPERASI_ID`, `JENIS_OPERASI_NAMA`) VALUES
(1, 'Bedah Umum'),
(2, 'Bedah Orthopedi'),
(3, 'Bedah saraf\n'),
(4, 'Bedah urologi\n'),
(5, 'Bedah Plastik\n'),
(6, 'Bedah Anak'),
(7, 'Bedah Digestif'),
(8, 'Bedah Karditoraka'),
(9, 'Bedah Onkologi'),
(10, 'Bedah Vascular\n'),
(11, 'Obstetrik & ginekologi\n'),
(12, 'THT\n'),
(13, 'Mata\n'),
(14, 'Kulit kelamin\n'),
(15, 'Gigi dan Mulut\n'),
(16, 'Kardiologi\n'),
(17, 'Paru-paru\n'),
(18, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_pemeriksaan_lab`
--

CREATE TABLE IF NOT EXISTS `list_jenis_pemeriksaan_lab` (
  `JENIS_LAB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_LAB_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`JENIS_LAB_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_jenis_pemeriksaan_lab`
--

INSERT INTO `list_jenis_pemeriksaan_lab` (`JENIS_LAB_ID`, `JENIS_LAB_NAMA`) VALUES
(1, 'Patologi Klinik'),
(2, 'Patologi Anatomi'),
(3, 'Toksikologi');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_rs`
--

CREATE TABLE IF NOT EXISTS `list_jenis_rs` (
  `jenis_rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_rs_nama` varchar(200) NOT NULL,
  `jenis_rs_uraian` varchar(300) NOT NULL,
  PRIMARY KEY (`jenis_rs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `list_jenis_rs`
--

INSERT INTO `list_jenis_rs` (`jenis_rs_id`, `jenis_rs_nama`, `jenis_rs_uraian`) VALUES
(1, 'RSU', 'Rumah Sakit Umum'),
(2, 'RS Jiwa/RSKO', 'Rumah Sakir Jiwa/ Ketergantung Obat'),
(3, 'RSB', 'Rumah Sakit Bersalin'),
(4, 'RS Mata', 'Rumah Sakit Mata'),
(5, 'RS Kanker', 'Rumah Sakit Kanker'),
(6, 'RSTP', 'Rumah Sakit Tuberkulosa Paru'),
(7, 'RS Kusta', 'Rumah Sakit Kusta'),
(8, 'RS Penyakit Infeksi', 'Rumah Sakit Penyakit Infeksi'),
(9, 'RSOP', 'Rumah Sakit Orthopedi'),
(10, 'RSK P. Dalam', 'Rumah Sakit Khusus Penyakit Dalam'),
(11, 'RSK Bedah', 'Rumah Sakit Khusus Bedah'),
(12, 'RS Jantung', 'Rumah Sakit Jantung'),
(13, 'RSK THT', 'Rumah Sakit Khusus THT'),
(14, 'RS Stroke', 'Rumah Sakit Stroke'),
(15, 'RSAB', 'Rumah Sakit Anak Bunda'),
(16, 'RSK Anak', 'Rumah Sakit Khusus Anak'),
(17, 'RSK Syaraf', 'Rumah Sakit Khusus Syaraf'),
(18, 'RSK Ginjal', 'Rumah Sakit Khusus Ginjal'),
(19, 'RSK GM', 'Rumah Sakit Khusus Gigi dan Mulut');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_tb`
--

CREATE TABLE IF NOT EXISTS `list_jenis_tb` (
  `JENIS_TB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_TB_URAIAN` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`JENIS_TB_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `list_jenis_tb`
--

INSERT INTO `list_jenis_tb` (`JENIS_TB_ID`, `JENIS_TB_URAIAN`) VALUES
(1, 'TB Paru BTA (+) dgn/tanpa biakan kuman TB'),
(2, 'TB Paru Lainnya'),
(3, 'TB Ekstra Paru'),
(4, 'TB alat napas lainnya'),
(5, ' Meningitis TB'),
(6, 'TB Susunan saraf pusat lainnya'),
(7, 'TB Tulang dan sendi'),
(8, ' Limfadenitis TB'),
(9, 'TB Miller'),
(10, 'TB Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_tempat_tidur`
--

CREATE TABLE IF NOT EXISTS `list_jenis_tempat_tidur` (
  `JENIS_TT_ID` int(11) NOT NULL,
  `JENIS_TT_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`JENIS_TT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_jenis_tenaga_medis`
--

CREATE TABLE IF NOT EXISTS `list_jenis_tenaga_medis` (
  `LIST_TM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_TM_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_TM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_jenis_tenaga_medis`
--

INSERT INTO `list_jenis_tenaga_medis` (`LIST_TM_ID`, `LIST_TM_NAMA`) VALUES
(1, 'Medis'),
(2, 'Paramedis'),
(3, 'Non Medis');

-- --------------------------------------------------------

--
-- Table structure for table `list_kategori_indikator_spm`
--

CREATE TABLE IF NOT EXISTS `list_kategori_indikator_spm` (
  `INDIKATOR_KATEGORI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INDIKATOR_KATEGORI_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`INDIKATOR_KATEGORI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `list_kategori_indikator_spm`
--

INSERT INTO `list_kategori_indikator_spm` (`INDIKATOR_KATEGORI_ID`, `INDIKATOR_KATEGORI_NAMA`) VALUES
(1, 'UGD'),
(2, 'Rawat Jalan'),
(3, 'Rawat Inap'),
(4, 'Bedah'),
(5, 'Pelayanan Persalinan, Perinatologi dan Neonatologi'),
(6, 'Pelayanan Intensif'),
(7, 'Pelayanan Radiologi'),
(8, 'Pelayanan Laboratorium'),
(9, 'Pelayanan Rehabilitasi Medik'),
(10, 'Pelayanan Farmasi'),
(11, 'Pelayanan Gizi'),
(12, 'Pelayanan Transfusi Darah'),
(13, 'Pelayanan Maskin '),
(14, 'Pelayanan Rekam Medik'),
(15, 'Pelayanan Limbah'),
(16, 'Pelayanan Administrasi Manajemen'),
(17, 'Pelayanan Ambulans/Kereta Jenazah'),
(18, 'Pelayanan Pemulasaraan Jenazah'),
(19, 'Pelayanan Pemeliharaan Sarana'),
(20, 'Pelayanan Pemeliharaan Laundry'),
(21, ' Pelayanan Pemeliharaan Pengendalian Infeksi');

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

-- --------------------------------------------------------

--
-- Table structure for table `list_kategori_unit_survey`
--

CREATE TABLE IF NOT EXISTS `list_kategori_unit_survey` (
  `KATEGORI_UNIT_SURVEY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_UNIT_SURVEY_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`KATEGORI_UNIT_SURVEY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `list_kategori_unit_survey`
--

INSERT INTO `list_kategori_unit_survey` (`KATEGORI_UNIT_SURVEY_ID`, `KATEGORI_UNIT_SURVEY_NAMA`) VALUES
(1, 'Parkir'),
(2, 'Loket Pendaftaran'),
(3, 'Satpam'),
(4, 'Pelayanan Administrasi Pasien'),
(5, 'Ruang/Poli'),
(6, 'Pelayanan Laboratorium'),
(7, 'Pelayanan Gizi'),
(8, 'Pelayanan Gigi dan Mulut'),
(9, 'Pelayanan Dokter'),
(10, 'Pelayanan Perawat'),
(11, 'Pelayanan Farmasi'),
(12, 'Pelayanan Radiologi'),
(13, 'Pelayanan Fisioterapi'),
(14, 'Pelayanan Darah'),
(15, 'Biaya');

-- --------------------------------------------------------

--
-- Table structure for table `list_kegiatan_jiwa`
--

CREATE TABLE IF NOT EXISTS `list_kegiatan_jiwa` (
  `LIST_JIWA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_JIWA_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`LIST_JIWA_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_kegiatan_jiwa`
--

INSERT INTO `list_kegiatan_jiwa` (`LIST_JIWA_ID`, `LIST_JIWA_NAMA`) VALUES
(1, 'Psikotest'),
(2, 'Konsultasi		'),
(3, 'Therapi Medikamentosa		'),
(4, 'Elektromedik		'),
(5, 'Psikoterapi		'),
(6, 'Play Therapi		');

-- --------------------------------------------------------

--
-- Table structure for table `list_kegiatan_rujukan_igd`
--

CREATE TABLE IF NOT EXISTS `list_kegiatan_rujukan_igd` (
  `LISTRUJUKAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LISTRUJUKAN_JENIS` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`LISTRUJUKAN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_kegiatan_rujukan_igd`
--

INSERT INTO `list_kegiatan_rujukan_igd` (`LISTRUJUKAN_ID`, `LISTRUJUKAN_JENIS`) VALUES
(1, 'Bedah'),
(2, 'Non Bedah'),
(3, 'Kebidanan'),
(4, 'Psikiatri'),
(5, 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `list_kegiatan_transfusi`
--

CREATE TABLE IF NOT EXISTS `list_kegiatan_transfusi` (
  `KEGIATAN_TRANS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KEGIATAN_TRANS_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KEGIATAN_TRANS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_kegiatan_transfusi`
--

INSERT INTO `list_kegiatan_transfusi` (`KEGIATAN_TRANS_ID`, `KEGIATAN_TRANS_NAMA`) VALUES
(1, 'Total darah yang terkumpul (kantong)'),
(2, 'Total darah yang terpakai (kantong)'),
(3, 'Total darah yang terpakai - Darah (kantong)'),
(4, 'Total darah yang terpakai - Packet cell (kantong)'),
(5, 'Total darah yang terpakai - Plasma (kantong)'),
(6, 'Total darah yang terpakai - Komponen darah lain (kantong)');

-- --------------------------------------------------------

--
-- Table structure for table `list_kelengkapan_kelola_maskin`
--

CREATE TABLE IF NOT EXISTS `list_kelengkapan_kelola_maskin` (
  `KLP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KLP_NAMA` varchar(124) DEFAULT NULL,
  PRIMARY KEY (`KLP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_kelengkapan_kelola_maskin`
--

INSERT INTO `list_kelengkapan_kelola_maskin` (`KLP_ID`, `KLP_NAMA`) VALUES
(1, 'Prosedur Pengelolaan'),
(2, 'Pelaksanaan Pengelolaan'),
(3, 'Tempat Pengaduan dan penyelesaian Pengaduan/Keluhan'),
(4, 'Catatan proses pengaduan'),
(5, 'Catatan/Dokumen tindak lanjut'),
(6, 'Pelaporan');

-- --------------------------------------------------------

--
-- Table structure for table `list_kelengkapan_survey_maskin`
--

CREATE TABLE IF NOT EXISTS `list_kelengkapan_survey_maskin` (
  `KP_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KP_MASKIN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KP_MASKIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `list_kelengkapan_survey_maskin`
--

INSERT INTO `list_kelengkapan_survey_maskin` (`KP_MASKIN_ID`, `KP_MASKIN_NAMA`) VALUES
(1, 'Prosedur Pelaksanaan (SOP)'),
(2, 'Tim Pelaksana Survey '),
(3, 'Tim Pelaksana Survey Internal RS'),
(4, 'Tim Pelaksana Survey Eksternal RS'),
(5, 'Media'),
(6, 'Media Kuestioner'),
(7, 'Media Kotak Saran'),
(8, 'Media Media Massa'),
(9, 'Pelaporan');

-- --------------------------------------------------------

--
-- Table structure for table `list_keluhan_maskin`
--

CREATE TABLE IF NOT EXISTS `list_keluhan_maskin` (
  `LIST_KELUHAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_KELUHAN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_KELUHAN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_keluhan_maskin`
--

INSERT INTO `list_keluhan_maskin` (`LIST_KELUHAN_ID`, `LIST_KELUHAN_NAMA`) VALUES
(1, 'Keluhan terhadap layanan dari Petugas		'),
(2, 'Keluhan terhadap komunikasi petugas		'),
(3, 'Keluhan terhadap sikap/tingkah laku petugas'),
(4, 'Sarana prasarana/alat medis		'),
(5, 'Sarana prasarana non medis (parkir/gedung)'),
(6, 'Lainnya 		');

-- --------------------------------------------------------

--
-- Table structure for table `list_ketenagaan`
--

CREATE TABLE IF NOT EXISTS `list_ketenagaan` (
  `LK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LK_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `list_ketenagaan`
--

INSERT INTO `list_ketenagaan` (`LK_ID`, `LK_NAMA`) VALUES
(1, 'Dokter Umum'),
(2, 'Dokter Gigi'),
(3, 'Dokter Spesialis Bedah'),
(4, 'Dokter Sub Spesialis Bedah Digestif'),
(5, 'Dokter Sub Spesialis Bedah Onkologi'),
(6, 'Dokter Spesialis Penyakit Dalam'),
(7, 'Dokter Sub Spesialis Ginjal Hipertensi (Sp.PD KGH)'),
(8, 'Dokter Sub Spesialis Hematologi-Onkologi Klinik (Sp.PD KHOM)'),
(9, 'Dokter Sub Spesialis Endokrinologi-Metabolik Diabetes(Sp.PD KEMD)'),
(10, 'Dokter Sub Spesialis Gastroenterologi-Hepatologi (Sp.PD KGEH)'),
(11, 'Dokter Sub Spesialis Geriatri (Sp.PD Kger)'),
(12, 'Dokter Sub Spesialis Alergi-Immunologi Klinik'),
(13, 'Dokter Sub Spesialis Kardiovaskular (Sp.PD KKV)'),
(14, 'Dokter Subspesialis Nutrisi Metabolik'),
(15, 'Dokter Spesialis Anak'),
(16, 'Dokter Sub Spesialis Perinatologi'),
(17, 'Dokter Sub Spesialis Alergi-Immunologi '),
(18, 'Dokter Subspesialis Pediatri Gawat Darurat'),
(19, 'Dokter Subspesialis Nutrisi Metabolik '),
(20, 'Dokter Spesialis Obgyn'),
(21, 'Dokter Sub Spesialis  Onkologi (Sp.OG K.Onk) '),
(22, 'Dokter Sub Spesialis  Fetomaternal (Sp.OG KFM)'),
(23, 'Dokter Sub Spesialis Fertilitas Endokrinologi Reproduksi (Sp.OG KFER) '),
(24, 'Dokter Spesialis Anestesiologi'),
(25, 'Dokter Spesialis Radiologi '),
(26, 'Dokter Spesialis Rehabilitasi Medik'),
(27, 'Dokter Spesialis Patologi Klinik '),
(28, 'Dokter Spesialis Patologi Anatomi'),
(29, 'Dokter Spesialis Mata '),
(30, 'Dokter Spesialis THT'),
(31, 'Dokter Spesialis Syaraf '),
(32, 'Dokter Spesialis Jantung & Pembuluh Darah'),
(33, 'Dokter Sub Spesialis Intervensi'),
(34, 'Dokter Sub Spesialis  Rehab'),
(35, 'Dokter Spesialis Kulit dan Kelamin'),
(36, 'Dokter Spesialis Jiwa'),
(37, 'Dokter Spesialis Paru'),
(38, 'Dokter Spesialis Orthopedik'),
(39, 'Dokter Spesialis Urologi'),
(40, 'Dokter Spesialis Bedah Syaraf'),
(41, 'Dokter Spesialis Bedah Plastik'),
(42, 'Dokter Spesialis Forensik'),
(43, 'Dokter Gigi Spesialis Bedah Mulut'),
(44, 'Dokter Gigi Spesialis Konservasi/Endodonsi'),
(45, 'Dokter Gigi Spesialis Periodonti '),
(46, ' Dokter Gigi Spesialis Orthodonti '),
(47, 'Dokter Gigi Spesialis Prosthodonti'),
(48, ' Dokter Gigi Spesialis Pedodonsi'),
(49, 'Dokter Gigi Spesialis Penyakit Mulut'),
(50, ' SPK'),
(51, 'D1 Perawat '),
(52, ' D3 Perawat'),
(53, 'S1 Perawat '),
(54, ' S2 Perawat'),
(55, 'D3 Bidan '),
(56, ' S1 Bidan'),
(57, 'Apoteker '),
(58, ' D1 Gizi'),
(59, 'D3 Gizi'),
(60, ' S1 Gizi'),
(61, 'D3 Anestesi'),
(62, ' D3 Rekam Medik'),
(63, 'D3 Teknik Lingkungan'),
(64, ' D3 Teknik Medik'),
(65, 'D3  Farmasi'),
(66, ' D3 Analis Kesehatan'),
(67, 'D3  Radiologi'),
(68, ' D3 Fisioterapi'),
(69, 'Sarjana Kesehatan Masyarakat'),
(70, ' Sarjana Psikologi'),
(71, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_mdgs`
--

CREATE TABLE IF NOT EXISTS `list_mdgs` (
  `MDGS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDGS_PERTANYAAN` varchar(500) DEFAULT NULL,
  `MDGS_KATEGORI` varchar(100) NOT NULL,
  PRIMARY KEY (`MDGS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `list_mdgs`
--

INSERT INTO `list_mdgs` (`MDGS_ID`, `MDGS_PERTANYAAN`, `MDGS_KATEGORI`) VALUES
(1, 'Rumah sakit melaksanakan Audit Maternal Perinatal', 'MGDS4'),
(2, 'Rumah sakit menerapkan "Buku Saku Pelayanan Kesehatan Anak di RS"', 'MGDS4'),
(3, 'Rumah Sakit memenuhi kecukupan obat dan alat sesuai Buku Saku Pelayanan Kesehatan Anak di RS', 'MGDS4'),
(4, 'Rumah Sakit memiliki dokter spesialis anak minimal 1 orang', 'MGDS4'),
(5, 'Rumah Sakit melaksanakan sistim rujukan (protap/pedoman/SOP dan instrumen) sesuai dengan standar', 'MGDS4'),
(6, 'Jumlah perinatologi set yang dimiliki Rumah Sakit sebanyak', 'MGDS4'),
(7, 'Pelaksanaan Pelayanan Obstetrik Neonatal Emergensi Komprehensif (PONEK) Rumah Sakit', 'MGDS5'),
(8, 'Kondisi sarana dan peralatan rumah sakit PONEK', 'MGDS5'),
(9, 'Jumlah Kunjungan pembinaan Tim PONEK  RS ke puskesmas PONED dalam 1 tahun sebanyak', 'MGDS5'),
(10, 'Jumlah Kunjungan pembinaan Tim PONEK  RS ke klinik/RS sekitarnya dalam 1 tahun sebanyak', 'MGDS5'),
(11, 'Jumlah Audit Maternal Perinatal (AMP) termasuk surveilans kematian ibu yang dilaksanakan sebanyak', 'MGDS5'),
(12, 'Rumah Sakit sudah memiliki SK Tim PONEK RS', 'MGDS5'),
(13, 'Rumah Sakit memberikan pelatihan KT (Konseling  dan Test)  bagi tim  di fasilitas  kesehatan', 'MGDS6'),
(14, 'Layanan KT di Rumah Sakit memiliki sarana dan operasional untuk mendukung layanan konseling, dan test HIV', 'MGDS6'),
(15, 'Rumah Sakit memberikan pelatihan IMS bagi tim  di fasilitas  kesehatan', 'MGDS6'),
(16, 'Rumah sakit memberikan pelatihan layanan PTRM', 'MGDS6'),
(17, 'Rumah sakit memberikan pelatihan PMTCT', 'MGDS6'),
(18, 'Rumah sakit memberikan pelatihan tim CST bagi petugas kesehatan', 'MGDS6'),
(19, 'Rumah sakit memiliki pelayanan pemeriksaan CD4', 'MGDS6'),
(20, 'Rumah sakit memiliki pelayanan pemeriksaan viral load', 'MGDS6'),
(21, 'Rumah sakit menyelenggarakan pelayanan rujukan bagi Orang dengan HIV dan AIDS (ODHA)', 'MGDS6'),
(22, 'RS telah dilatih dan melaksanakan pelayanan TB sesuai strategi DOTS', 'MGDS6'),
(23, 'Rumah Sakit memiliki tim DOTS terlatih', 'MGDS6'),
(24, 'Rumah Sakit melaksanakan pengendalian infeksi airborne dalam implementasi DOTS', 'MGDS6'),
(25, 'Laboratorium RS melaksanakan pengendalian infeksi TB dalam pemeriksaan kultur', 'MGDS6'),
(26, 'Rumah Sakit  memiliki SK Direktur tentang pembentukan Tim DOTS', 'MGDS6'),
(27, 'Rumah Sakit memiliki sarana yang dapat member pelayanan TB dengan strategi DOTS', 'MGDS6'),
(28, 'Rumah Sakit memiliki formularium obat TB sesuai panduan standar pengobatan TB strategi DOTS', 'MGDS6'),
(29, 'Laboratorium RS memiliki mikroskop dan bahan laboratorium yang sesuai standard dan berfungsi dengan baik', 'MGDS6'),
(30, 'Rumah Sakit memiliki bahan lab sesuai dengan fungsinya dalam jumlah yang cukup', 'MGDS6'),
(31, 'RS memiliki ruang isolasi untuk TB HIV', 'MGDS6'),
(32, 'RS memiliki ruang isolasi untuk MDR TB', 'MGDS6'),
(33, 'Tersedianya Obat Anti Tuberkulosis (OAT) sesuai standar', 'MGDS6'),
(34, 'RS memiliki media KIE untuk program TB', 'MGDS6'),
(35, 'Jumlah tim yang dilatih dalam pelatihan KT bagi tim di fasilitas kesehatan di Rumah Sakit sebanyak', 'MGDS6'),
(36, 'Jumlah tim yang dilatih dalam pelatihan IMS bagi tim di fasilitas kesehatan di Rumah Sakit sebanyak', 'MGDS6'),
(37, 'Jumlah petugas kesehatan yang dilatih PTRM sebanyak', 'MGDS6'),
(38, 'Jumlah petugas kesehatan yang dilatih PMTCT sebanyak', 'MGDS6'),
(39, 'Pertemuan jejaring internal dan eksternal dalam implementasi strategi DOTS dalam setahun sebanyak', 'MGDS6'),
(40, 'Jumlah tenaga lab yang dilatih dan  mengirimkan slide untuk dilakukan cross check secara teratur setiap triwulan sebanyak', 'MGDS6');

-- --------------------------------------------------------

--
-- Table structure for table `list_mekanisme_pengaduan_maskin`
--

CREATE TABLE IF NOT EXISTS `list_mekanisme_pengaduan_maskin` (
  `LIST_MEKANISME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_MEKANISME_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_MEKANISME_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_mekanisme_pengaduan_maskin`
--

INSERT INTO `list_mekanisme_pengaduan_maskin` (`LIST_MEKANISME_ID`, `LIST_MEKANISME_NAMA`) VALUES
(1, 'Media Masa'),
(2, 'Media Elektronik (TV, Radio, Internet dll)'),
(3, 'Kotak Saran'),
(4, 'Telepon/SMS/Hotlines'),
(5, 'Tim Pengendali Pelayanan');

-- --------------------------------------------------------

--
-- Table structure for table `list_metode_kb`
--

CREATE TABLE IF NOT EXISTS `list_metode_kb` (
  `METODE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `METODE_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`METODE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `list_metode_kb`
--

INSERT INTO `list_metode_kb` (`METODE_ID`, `METODE_NAMA`) VALUES
(1, 'IUD'),
(2, 'MOW'),
(3, 'MOP'),
(4, 'Implant'),
(5, 'Pil'),
(6, 'Suntik'),
(7, 'Kondom'),
(8, 'Obat Vaginal'),
(9, 'Lain – lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_pasien_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `list_pasien_rawat_inap` (
  `PRI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRI_NAMA` varchar(100) NOT NULL,
  PRIMARY KEY (`PRI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `list_pasien_rawat_inap`
--

INSERT INTO `list_pasien_rawat_inap` (`PRI_ID`, `PRI_NAMA`) VALUES
(1, 'Pasien Total'),
(2, 'Pasien masuk total'),
(3, 'Pasien masuk laki-laki'),
(4, 'Pasien masuk perempuan '),
(5, 'Pasien keluar hidup total'),
(6, 'Pasien keluar hidup laki-laki'),
(7, 'pasien keluar hidup perempuan'),
(8, 'pasien keluar mati total'),
(9, 'pasien keluar mati laki-laki'),
(10, 'pasien keluar mati perempuan'),
(11, 'pasien keluar mati kurang dari 24 jam total'),
(12, 'pasien keluar mati kurang dari 24 jam laki-laki'),
(13, 'pasien keluar mati kurang dari 24 jam perempuan'),
(14, 'pasien keluar mati lebih dari 24 jam total'),
(15, 'pasien keluar mati lebih dari 24 jam laki-laki'),
(16, 'pasien keluar mati lebih dari 24 jam perempuan'),
(17, 'lama dirawat'),
(18, 'hari perawatan');

-- --------------------------------------------------------

--
-- Table structure for table `list_pasien_rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `list_pasien_rawat_jalan` (
  `LIST_PASIEN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_PASIEN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_PASIEN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `list_pasien_rawat_jalan`
--

INSERT INTO `list_pasien_rawat_jalan` (`LIST_PASIEN_ID`, `LIST_PASIEN_NAMA`) VALUES
(1, 'Pasien Baru'),
(2, 'Pasien Lama');

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan` (
  `LP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LP_NAMA` varchar(250) DEFAULT NULL,
  `pelayanan_kategori` char(11) NOT NULL,
  PRIMARY KEY (`LP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `list_pelayanan`
--

INSERT INTO `list_pelayanan` (`LP_ID`, `LP_NAMA`, `pelayanan_kategori`) VALUES
(1, 'Pelayanan Medik Umum', 'A'),
(2, 'Pelayanan medik dasar', 'A'),
(3, 'Pelayanan medik gigi mulut', 'A'),
(4, 'Pelayanan KIA/KB', 'A'),
(5, 'Pelayanan Gawat Darurat', 'B'),
(6, '24 Jam & 7 hari seminggu', 'B'),
(7, 'Pelayanan Medik Dasar', 'C'),
(8, 'Penyakit Dalam', 'C'),
(9, 'Kesehatan Anak', 'C'),
(10, 'Bedah', 'C'),
(11, 'Obstetri & Ginekologi', 'C'),
(12, 'Pelayanan Spesialis Penunjang Medik', 'D'),
(13, 'Radiologi', 'D'),
(14, 'Patologi Klinik', 'D'),
(15, 'Anestesiologi', 'D'),
(16, 'Rehabilitasi Medik', 'D'),
(17, 'Patologi Anatomi', 'D'),
(18, 'Pelayanan Medik Spesialis lain', 'E'),
(19, 'Mata', 'E'),
(20, 'Telinga Hidup Tenggorokan', 'E'),
(21, 'Syaraf', 'E'),
(22, 'Jantung dan Pembuluh Darah', 'E'),
(23, 'Kulit dan Kelamin', 'E'),
(24, 'Kedokteran Jiwa', 'E'),
(25, 'Paru ', 'E'),
(26, 'Orthopedi', 'E'),
(27, 'Urologi ', 'E'),
(28, 'Bedah Syaraf', 'E'),
(29, 'Bedah Plastik ', 'E'),
(30, 'Kedokteran Forensik', 'E'),
(31, 'Pelayanan Medik Spesialis Gigi Mulut ', 'F'),
(32, 'Bedah Mulut', 'F'),
(33, 'Konservasi/Endodonsi', 'F'),
(34, 'Orthodonti ', 'F'),
(35, 'Periodonti', 'F'),
(36, 'Prosthodonti', 'F'),
(37, 'Pedodonsi', 'F'),
(38, 'Penyakit Mulut', 'F'),
(39, 'Pelayanan Medik Subspesialis ', 'G'),
(40, 'Bedah ', 'G'),
(41, 'Penyakit Dalam ', 'G'),
(42, 'Kesehatan Anak', 'G'),
(43, 'Obstetri & Ginekologi ', 'G'),
(44, 'Mata', 'G'),
(45, 'Telinga Hidung Tenggorokan ', 'G'),
(46, 'Syaraf', 'G'),
(47, 'Jantung dan Pembuluh Darah ', 'G'),
(48, 'Kulit dan Kelamin', 'G'),
(49, 'Jiwa ', 'G'),
(50, 'Paru ', 'G'),
(51, 'Orthopedi ', 'G'),
(52, 'Gigi Mulut ', 'G'),
(53, 'Pelayanan keperawatan dan kebidanan', 'H'),
(54, 'Asuhan keperawatan', 'H'),
(55, 'Asuhan kebidanan ', 'H'),
(56, 'Pelayanan penunjang klinik', 'I'),
(57, 'Perawatan Intensif', 'I'),
(58, 'Pelayanan darah ', 'I'),
(59, 'Gizi', 'I'),
(60, 'Farmasi', 'I'),
(61, 'Sterilisasi Instrumen', 'I'),
(62, 'Rekam medik', 'I'),
(63, 'Pelayanan penunjang non klinik', 'J'),
(64, 'Laundry/linen', 'J'),
(65, 'Jasa Boga/Dapur', 'J'),
(66, 'Teknik dan pemeliharaan fasilitas', 'J'),
(67, 'Pengelolaan limbah', 'J'),
(68, 'Gudang', 'J'),
(69, 'Ambulance', 'J'),
(70, 'Komunikasi', 'J'),
(71, 'Kamar Jenazah', 'J'),
(72, 'Pemadam Kebakaran', 'J'),
(73, 'Pengelolaan Gas Medik', 'J'),
(74, 'Penampungan Air Bersih', 'J'),
(75, 'Pelayanan  Khusus', 'K'),
(76, 'Akupuntur', 'K'),
(77, 'Hiperbarik', 'K'),
(78, 'Herbal/Jamu', 'K'),
(79, 'Lainnya', 'K');

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_maskin`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_maskin` (
  `P_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_MASKIN_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`P_MASKIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_perinatologi`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_perinatologi` (
  `PPR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PPR_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PPR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `list_pelayanan_perinatologi`
--

INSERT INTO `list_pelayanan_perinatologi` (`PPR_ID`, `PPR_NAMA`) VALUES
(1, 'Kasus Neonatal 0 - 7 hari'),
(2, '- Asphyxia'),
(3, '- Trauma kelahiran\n'),
(4, '- BBLR\n'),
(5, '- Tetanus Neonatorum\n'),
(6, '- Kelainan congenital\n'),
(7, '- ISPA\n'),
(8, '- Diare\n'),
(9, '- Lain-lain\n'),
(10, 'Kasus Neonatal 8-28 hari'),
(11, '- Asphyxia'),
(12, '- Trauma kelahiran'),
(13, '- BBLR'),
(14, '- Tetanus Neonatorum'),
(15, '- Kelainan congenital'),
(16, '- ISPA'),
(17, '- Diare'),
(18, '- Lain-lain'),
(19, 'Kelahiran Mati');

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_persalinan`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_persalinan` (
  `PP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PP_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `list_pelayanan_persalinan`
--

INSERT INTO `list_pelayanan_persalinan` (`PP_ID`, `PP_NAMA`) VALUES
(1, 'Yan ibu hamil'),
(2, '- Hiperemesis'),
(3, 'Yan Persalinan & Nifas'),
(4, 'Total Persalinan (a+b+c)'),
(5, 'Persalinan Normal'),
(6, 'Persalinan dengan Komplikasi'),
(7, '- Perdarahan sebelum bersalin'),
(8, '- Perdarahan sesudah persalinan'),
(9, '- Pre eklampsi'),
(11, '- Eklamsi'),
(12, '- Infeksi'),
(13, '- Lain-lain'),
(14, 'Seksio Sesaria'),
(15, 'Indikasi Seksio'),
(16, '- CPD'),
(17, '- Partus macet'),
(18, '- Bekas SC'),
(19, '- Kelainan Panggul'),
(20, '- Perdarahan antepartum'),
(21, '- Tumor menghalangi jalan lahir'),
(22, '- Kegagalan induksi persalinan'),
(23, '- Persistent Fetal Distress'),
(24, '- Malpresentasi'),
(25, '- gawat janin'),
(26, '- gemely'),
(27, '- Anak Mahal'),
(28, '- Prolapsus funikuli & bayi masih hidup'),
(29, '- Permintaan Sendiri'),
(30, 'Hasil Persalinan'),
(31, '- Abortus'),
(32, '- Prematur'),
(33, '- Lahir Hidup'),
(34, '- Lahir Mati'),
(35, '- BB > 2500 gr'),
(36, '- BB < 2500 gr');

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_radiologi`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_radiologi` (
  `P_RADIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_RADIO_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`P_RADIO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_pelayanan_radiologi`
--

INSERT INTO `list_pelayanan_radiologi` (`P_RADIO_ID`, `P_RADIO_NAMA`) VALUES
(1, 'Foto tanpa bahan kontras'),
(2, 'Foto dengan bahan kontras'),
(3, 'USG'),
(4, 'CT Scan'),
(5, 'MRI (Magnetic Resonance Imaging)'),
(6, 'Lain – lain ');

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_rawat_inap` (
  `PEL_RI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEL_RI_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PEL_RI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `list_pelayanan_rawat_inap`
--

INSERT INTO `list_pelayanan_rawat_inap` (`PEL_RI_ID`, `PEL_RI_NAMA`) VALUES
(1, 'Penyakit Dalam'),
(2, 'Bedah'),
(3, 'Kesehatan Anak'),
(4, 'Obstetri'),
(5, 'Gynekologi'),
(6, 'Bedah Syaraf'),
(7, 'Syaraf'),
(8, 'Jiwa '),
(9, 'THT'),
(10, 'Mata'),
(11, 'Kulit &Kelamin'),
(12, 'Gigi dan Mulut'),
(13, 'Kardiologi'),
(14, 'Radioterapi    '),
(15, 'Bedah Orthopedi'),
(16, 'Paru – paru'),
(17, 'Kusta'),
(18, 'Umum '),
(19, 'Rehabilitasi Medik'),
(20, 'Isolasi'),
(21, 'Luka bakar'),
(22, 'ICU / OK'),
(23, 'ICCU'),
(24, 'Perinatal (NICU)'),
(25, 'Lain lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_pemeriksaan_sanitasi`
--

CREATE TABLE IF NOT EXISTS `list_pemeriksaan_sanitasi` (
  `LIST_SANITASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_SANITASI_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_SANITASI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_pemeriksaan_sanitasi`
--

INSERT INTO `list_pemeriksaan_sanitasi` (`LIST_SANITASI_ID`, `LIST_SANITASI_NAMA`) VALUES
(1, 'Kualitas fisik dan kimia air bersih					'),
(2, 'Kualitas mikrobiologi air bersih					'),
(3, 'Kualitas lingkungan fisik 					'),
(4, 'Kualitas mikrobiologi dan angka kuman udara ruang					'),
(5, 'Kualitas fisik dan kimia air dari instalasi gizi					'),
(6, 'Hasil pemeriksaan usap alat makan					');

-- --------------------------------------------------------

--
-- Table structure for table `list_pemeriksaan_toksikologi`
--

CREATE TABLE IF NOT EXISTS `list_pemeriksaan_toksikologi` (
  `LPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPT_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LPT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_pemeriksaan_toksikologi`
--

INSERT INTO `list_pemeriksaan_toksikologi` (`LPT_ID`, `LPT_NAMA`) VALUES
(1, 'Narkotika'),
(2, 'Psikotropika'),
(3, 'Zat Adiktif'),
(4, 'Pestisida'),
(5, 'Zat Toksikologi');

-- --------------------------------------------------------

--
-- Table structure for table `list_penerimaan_darah`
--

CREATE TABLE IF NOT EXISTS `list_penerimaan_darah` (
  `PENERIMAAN_DARAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PENERIMAAN_DARAH_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PENERIMAAN_DARAH_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_penerimaan_darah`
--

INSERT INTO `list_penerimaan_darah` (`PENERIMAAN_DARAH_ID`, `PENERIMAAN_DARAH_NAMA`) VALUES
(1, 'Dari PMI (UTD)'),
(2, 'Diambil dari Rumah Sakit'),
(3, 'Dari RS Lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_penggunaan_transfusi`
--

CREATE TABLE IF NOT EXISTS `list_penggunaan_transfusi` (
  `PENGGUNAAN_TRANS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PENGGUNAAN_TRANS_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PENGGUNAAN_TRANS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_penggunaan_transfusi`
--

INSERT INTO `list_penggunaan_transfusi` (`PENGGUNAAN_TRANS_ID`, `PENGGUNAAN_TRANS_NAMA`) VALUES
(1, 'Kasus Obsgyn'),
(2, 'Kasus Neonatal'),
(3, 'Kasus Bedah'),
(4, 'Kasus Dalam'),
(5, 'Lain - lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_pentahapan_akreditasi_rs`
--

CREATE TABLE IF NOT EXISTS `list_pentahapan_akreditasi_rs` (
  `tars_id` int(11) NOT NULL AUTO_INCREMENT,
  `tars_status` varchar(200) NOT NULL,
  PRIMARY KEY (`tars_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_peralatan_canggih`
--

CREATE TABLE IF NOT EXISTS `list_peralatan_canggih` (
  `LPC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPC_NAMA` varchar(100) NOT NULL,
  PRIMARY KEY (`LPC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `list_peralatan_canggih`
--

INSERT INTO `list_peralatan_canggih` (`LPC_ID`, `LPC_NAMA`) VALUES
(1, 'DSA'),
(2, 'MRI'),
(3, 'CT SCANNER'),
(4, 'FLOUROSKOPI'),
(5, 'Endoscopy'),
(6, 'USG 4D'),
(7, 'Hemodialisa'),
(8, 'Linac'),
(9, 'Mammography X-Ray'),
(10, 'Cateterazion lab'),
(11, 'Telegama cobalt-60'),
(12, 'Hiperbaric chamber');

-- --------------------------------------------------------

--
-- Table structure for table `list_peralatan_hemodialisis`
--

CREATE TABLE IF NOT EXISTS `list_peralatan_hemodialisis` (
  `LPH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPH_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LPH_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `list_peralatan_hemodialisis`
--

INSERT INTO `list_peralatan_hemodialisis` (`LPH_ID`, `LPH_NAMA`) VALUES
(1, 'Mesin Hemodialisis				'),
(2, 'Tempat tidur pasien HD				'),
(3, 'Peralatan medik dasar				'),
(4, 'Reuse dialiser				'),
(5, 'Peralatan pengolahan air sesuai standar				'),
(6, 'Peralatan sterilisasi alat medis				'),
(7, 'Generator listrik				');

-- --------------------------------------------------------

--
-- Table structure for table `list_peralatan_maternal_essensial`
--

CREATE TABLE IF NOT EXISTS `list_peralatan_maternal_essensial` (
  `MATERNAL_ESSENSIAL_UD` int(11) NOT NULL AUTO_INCREMENT,
  `MATERNAL_ESSENSIAL_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`MATERNAL_ESSENSIAL_UD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `list_peralatan_maternal_essensial`
--

INSERT INTO `list_peralatan_maternal_essensial` (`MATERNAL_ESSENSIAL_UD`, `MATERNAL_ESSENSIAL_NAMA`) VALUES
(1, 'Kotak Resusitasi'),
(2, 'Inkubator'),
(3, 'Penghangat (Radiant Warmer)'),
(4, 'Ekstraktor Vakum'),
(5, 'Forceps naegele'),
(6, 'AVM'),
(7, 'Pompa Vakum Listrik'),
(8, 'Monitor denyut jantung/pernapasan'),
(9, 'Foetal Doppler'),
(10, 'Set Sectio Saesaria');

-- --------------------------------------------------------

--
-- Table structure for table `list_peralatan_neonatal_esensial`
--

CREATE TABLE IF NOT EXISTS `list_peralatan_neonatal_esensial` (
  `NEONATAL_ESENSIAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NEONATAL_ESENSIAL_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`NEONATAL_ESENSIAL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `list_peralatan_neonatal_esensial`
--

INSERT INTO `list_peralatan_neonatal_esensial` (`NEONATAL_ESENSIAL_ID`, `NEONATAL_ESENSIAL_NAMA`) VALUES
(1, 'Inkubator'),
(2, 'Infant Warmer'),
(3, 'Pulse Oxymeter Neonatus'),
(4, 'Therapy Sinar'),
(5, 'Syringe Pump'),
(6, 'Tabung Oksigen'),
(7, 'Lampu Tindakan'),
(8, 'Alat-Alat Resusitasi Neonatus'),
(9, 'CPAP (Continous Positive Airways Preassure)'),
(10, 'Inkubator Transport');

-- --------------------------------------------------------

--
-- Table structure for table `list_peralatan_pelayanan`
--

CREATE TABLE IF NOT EXISTS `list_peralatan_pelayanan` (
  `LIST_PERALATAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_PERALATAN_PELAYANAN` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`LIST_PERALATAN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `list_peralatan_pelayanan`
--

INSERT INTO `list_peralatan_pelayanan` (`LIST_PERALATAN_ID`, `LIST_PERALATAN_PELAYANAN`) VALUES
(1, 'Pelayanan Obstetri Gynecology'),
(2, 'POG Rawat Jalan'),
(3, 'Kamar Bersalin'),
(4, 'POG Gawat Darurat'),
(5, 'POG Rawat Inap'),
(6, 'Ruang Perinatologi'),
(7, 'Pelayanan Anak'),
(8, 'Anak Rawat Jalan'),
(9, 'Anak Rawat Inap'),
(10, 'Pelayanan Penyakit Dalam'),
(11, 'Penyakit Dalam Rawat Jalan'),
(12, 'Penyakit Dalam Rawat Inap'),
(13, 'Pelayanan Jantung & Pembuluh Darah'),
(14, 'Pelayanan Jantung Rawat Jalan'),
(15, 'Pelayanan Jantung Rawat Inap'),
(16, 'Pelayanan Bedah'),
(17, 'Pelayanan Bedah Rawat Jalan'),
(18, 'Pelayanan Bedah Rawat Inap'),
(19, 'Ruang Operasi/Bedah'),
(20, 'Pelayanan Mata'),
(21, 'Pelayanan Mata Rawat Jalan'),
(22, 'Pelayanan Mata Rawat Inap'),
(23, 'Ruang Operasi Mata'),
(24, 'Pelayanan THT'),
(25, 'THT Rawat Jalan'),
(26, 'THT Rawat Inap'),
(27, 'Ruang Operasi THT'),
(28, 'Pelayanan Kulit & Kelamin'),
(29, 'KK Rawat Jalan'),
(30, 'KK Rawat Inap'),
(31, 'Pelayanan Gigi & Mulut'),
(32, 'Gigi & Mulut Rawat Jalan'),
(33, 'Pelayanan Saraf'),
(34, 'Syaraf Rawat Jalan'),
(35, 'Syaraf Rawat Inap'),
(36, 'Pelayanan Jiwa'),
(37, 'Jiwa Rawat Jalan'),
(38, 'Jiwa Rawat Inap'),
(39, 'Pelayanan Gawat Darurat'),
(40, 'Kamar Operasi (Bedah Sentral)'),
(41, 'Perawatan Intensif'),
(42, ' Pelayanan Keperawatan'),
(43, 'Pelayanan Anestesi dan Reanimasi'),
(44, ' Pelayanan Laboratorium'),
(45, 'Pelayanan Radiologi'),
(46, ' Pelayanan Rehabilitasi Medik'),
(47, 'Pelayanan Keterapian Fisik'),
(48, ' Pelayanan Farmasi'),
(49, 'Pelayanan Gizi'),
(50, 'Pelayanan Sterilisasi Sentral'),
(51, 'Pelayanan Rekam Medis'),
(52, 'Pelayanan Laundry'),
(53, 'Pengadaan Air'),
(54, 'Listrik'),
(55, 'Pemeliharaan Sarana'),
(56, 'Pemulasaraan Jenazah'),
(57, 'Telekomunikasi'),
(58, 'Pengelolaan Limbah'),
(59, 'Transportasi');

-- --------------------------------------------------------

--
-- Table structure for table `list_peralatan_radiologi`
--

CREATE TABLE IF NOT EXISTS `list_peralatan_radiologi` (
  `PERALATAN_RAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERALATAN_RAD_NAMA` varchar(250) DEFAULT NULL,
  `PERALATAN_RAD_KATEGORI` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`PERALATAN_RAD_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `list_peralatan_radiologi`
--

INSERT INTO `list_peralatan_radiologi` (`PERALATAN_RAD_ID`, `PERALATAN_RAD_NAMA`, `PERALATAN_RAD_KATEGORI`) VALUES
(1, 'DSA', 'A'),
(2, 'MRI', 'A'),
(3, 'CT Multislice', 'A'),
(4, 'Fluoroskopi', 'A'),
(5, 'USG', 'A'),
(6, 'Analog X-RAY FIXED UNIT dan/atau ', 'A'),
(7, 'Mobile X-Ray', 'A'),
(8, 'Mammography', 'A'),
(9, 'Peralatan Digital Panoramic/Cephalometri', 'A'),
(10, 'Peralatan Dental X-Ray', 'A'),
(11, 'C-ARM', 'A'),
(12, 'Computed Radiography', 'A'),
(13, 'Picture Archiving Communication System (PACS)', 'A'),
(14, 'Peralatan Protektif Radiasi', 'A'),
(15, 'Perlengkapan Proteksi Radiasi', 'A'),
(16, 'Peralatan Quality Assurance dan Quality Control (Kendali Mutu) Radiofotografi', 'A'),
(17, 'Emergency KIT', 'A'),
(18, 'Viewing Box', 'A'),
(19, 'Generator Set', 'A'),
(20, 'CT Multislice', 'B'),
(21, 'Fluoroskopi\n', 'B'),
(22, 'USG\n', 'B'),
(23, 'Analog X-RAY FIXED UNIT dan/atau DIGITAL\n\n', 'B'),
(24, 'Mobile X-Ray\n\n', 'B'),
(25, 'Mammography\n', 'B'),
(26, 'Peralatan C-ARM\n', 'B'),
(27, 'Peralatan Digital Panoramic/Cephalometri', 'B'),
(28, 'Peralatan Dental X-Ray', 'B'),
(29, 'Peralatan Proteksi Radiasi\r\n', 'B'),
(30, 'Perlengkapan Proteksi Radiasi\n', 'B'),
(31, 'Peralatan Quality Assurance dan Quality Control', 'B'),
(32, 'Emergency KIT', 'B'),
(33, 'Peralatan Kamar Gelap', 'B'),
(34, 'Peralatan Alat Pelindung Diri', 'B'),
(35, 'Peralatan Viewing Box', 'B'),
(36, 'Peralatan USG', 'C'),
(37, 'Analog X-RAY FIXED UNIT dan/atau DIGITAL', 'C'),
(38, 'Mobile X-Ray', 'C'),
(39, 'Peralatan Dental X-Ray', 'C'),
(40, 'Peralatan Proteksi Radiasi', 'C'),
(41, 'Perlengkapan Proteksi Radiasi', 'C'),
(42, 'Peralatan Quality Assurance dan Quality Control', 'C'),
(43, 'Emergency KIT', 'C'),
(44, 'Peralatan Kamar Gelap', 'C'),
(45, 'Peralatan Viewing Box', 'C'),
(46, 'Peralatan USG', 'D'),
(47, 'Analog X-RAY FIXED UNIT dan/atau DIGITAL', 'D'),
(48, 'Peralatan Proteksi Radiasi', 'D'),
(49, 'Perlengkapan Proteksi Radiasi', 'D'),
(50, 'Peralatan Quality Assurance dan Quality Control', 'D'),
(51, 'Emergency KIT', 'D'),
(52, 'Peralatan Kamar Gelap', 'D'),
(53, 'Peralatan Viewing Box', 'D'),
(54, 'MGIT', 'E'),
(55, 'Phoenix', 'E'),
(56, 'Bactec', 'E'),
(57, 'Dimention RL', 'E'),
(58, 'Advia Centaur', 'E'),
(59, 'Rubi', 'E'),
(60, 'CS 2100', 'E'),
(61, 'CA 1500', 'E'),
(62, 'Sysmex 2100', 'E'),
(63, 'HPLC', 'E'),
(64, 'Electropheresis Sebia', 'E'),
(65, 'Mini Capilarie Electropheresis Sebia', 'E'),
(66, 'USG DC-7', 'E'),
(67, 'CT Scan Somatom Emotion 16', 'E'),
(68, 'Digital Radiografi', 'E'),
(69, 'Digital Radiografi & Flouroskopi', 'E'),
(70, 'Computer Radiografi', 'E'),
(71, 'Linac Varian 2100C', 'E'),
(72, 'Linac varian 600C/D', 'E'),
(73, 'Cobalt-60 Shinva FCC 8000F', 'E'),
(74, 'HDR GammaMed iXPlus 3D', 'E'),
(75, 'Simulator Simulix-Hp', 'E'),
(76, 'Simulator Simscan Mecaserto', 'E'),
(77, 'RTPS Eclipse 3D IMX', 'E'),
(78, 'RTPS ISIS 3D', 'E'),
(79, 'RTPD ISIS 2D', 'E'),
(80, 'Mouldign Manual Negatoscope', 'E'),
(81, 'Moulding Hek Autimo 2D', 'E'),
(82, 'Mesin Pemanas Masker', 'E'),
(83, 'Absolute Dosimeter PTW unidos LA48', 'E'),
(84, 'Relative Dosimeter In-Vivo', 'E'),
(85, 'Digital Personal Dosimeter', 'E'),
(86, 'Survey meter Baby Line 81', 'E'),
(87, 'Survey Meter RGD STEP', 'E'),
(88, 'RFA (Radiation Field Analyzer)', 'E'),
(89, 'Waterphantom', 'E'),
(90, 'Wheelhofer', 'E'),
(91, 'Tissue Processor', 'E'),
(92, 'Auto Stainner', 'E'),
(93, 'Cryo Cut', 'E'),
(94, 'Miscorscope 5 headed', 'E'),
(95, 'Tissue Embadding System', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `list_petugas_maskin`
--

CREATE TABLE IF NOT EXISTS `list_petugas_maskin` (
  `PMASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PMASKIN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PMASKIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `list_petugas_maskin`
--

INSERT INTO `list_petugas_maskin` (`PMASKIN_ID`, `PMASKIN_NAMA`) VALUES
(1, 'Tenaga Spesialis'),
(2, 'Dokter Umum'),
(3, 'Perawat'),
(4, 'Bidan'),
(5, 'Tenaga Paramedis Lain'),
(6, 'Petugas Administrasi (Petugas loket/keuangan)'),
(7, 'Petugas lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_poli_rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `list_poli_rawat_jalan` (
  `POLI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POLI_NAMA` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`POLI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_rasio_keuangan`
--

CREATE TABLE IF NOT EXISTS `list_rasio_keuangan` (
  `list_rk_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_rk_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`list_rk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `list_rasio_keuangan`
--

INSERT INTO `list_rasio_keuangan` (`list_rk_id`, `list_rk_nama`) VALUES
(1, 'Current Ratio'),
(2, 'Quick Ratio'),
(3, 'Cash Ratio'),
(4, 'Return on Invesment'),
(5, 'Debt to Total Asset Ratio'),
(6, 'Debt to Equity Ratio');

-- --------------------------------------------------------

--
-- Table structure for table `list_region`
--

CREATE TABLE IF NOT EXISTS `list_region` (
  `id_list_region` int(11) NOT NULL AUTO_INCREMENT,
  `nm_list_regoion` varchar(200) NOT NULL,
  `ket_list_region` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_list_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_region`
--

INSERT INTO `list_region` (`id_list_region`, `nm_list_regoion`, `ket_list_region`) VALUES
(1, 'Region 1', 'Jawa Timur Daerah Timur'),
(2, 'Region 2', 'Jawa Timur Daerah Tengah'),
(3, 'Region 3', 'Jawa Timur Daerah Barat');

-- --------------------------------------------------------

--
-- Table structure for table `list_sarpras`
--

CREATE TABLE IF NOT EXISTS `list_sarpras` (
  `LIST_SARPRAS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_SARPRAS_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_SARPRAS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `list_sarpras`
--

INSERT INTO `list_sarpras` (`LIST_SARPRAS_ID`, `LIST_SARPRAS_NAMA`) VALUES
(1, 'Bangunan/Ruang Gawat Darurat'),
(2, 'Bangunan/Ruang Rawat Jalan'),
(3, 'Bangunan/Ruang Rawat Inap'),
(4, 'Bangunan/Ruang Bedah/Kamar Operasi'),
(5, 'Bangunan/Ruang Rawat Intensif'),
(6, 'Bangunan/Ruang Isolasi'),
(7, 'Bangunan/Ruang Radiologi'),
(8, 'Bangunan/Ruang Laboratorium Klinik'),
(9, 'Bangunan/Ruang Farmasi'),
(10, 'Bangunan/Ruang Gizi'),
(11, 'Bangunan/Ruang Rehabilitasi Medik'),
(12, 'Bangunan/Ruang Pemeliharaan Sarana Prasarana'),
(13, 'Bangunan/Ruang Pengelolaan Limbah'),
(14, 'Bangunan/Ruang Sterilisasi'),
(15, 'Bangunan/Ruang Laundry'),
(16, 'Bangunan/Ruang Pemulasaran Jenazah'),
(17, 'Bangunan/Ruang Aministrasi'),
(18, 'Bangunan/Ruang Gudang'),
(19, 'Bangunan/Ruang Sanitasi'),
(20, 'Bangunan/Ruang Dinas Asrama'),
(21, 'Ambulan'),
(22, 'Ruang Komite Medis'),
(23, 'Ruang PKMRS'),
(24, 'Ruang Perpustakaan'),
(25, 'Ruang Jaga Ko Ass'),
(26, 'Ruang Pertemuan'),
(27, 'Bangunan/Ruang Diklat'),
(28, 'Ruang Diskusi'),
(29, 'Skill Lab dan Audio Visual'),
(30, 'Sistem Informasi Rumah Sakit'),
(31, 'Sistem Dokumentasi Medis Pendidikan'),
(32, 'Listrik/Genset'),
(33, 'Air'),
(34, 'Gas Medis'),
(35, 'Limbah Cair'),
(36, 'Limbah Padat'),
(37, 'Penanganan Kebakaran'),
(38, 'Perangkat Komunikasi (24 jam)'),
(39, 'Tempat Tidur');

-- --------------------------------------------------------

--
-- Table structure for table `list_sebab_kematian_ibu`
--

CREATE TABLE IF NOT EXISTS `list_sebab_kematian_ibu` (
  `SKI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKI_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`SKI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `list_sebab_kematian_ibu`
--

INSERT INTO `list_sebab_kematian_ibu` (`SKI_ID`, `SKI_NAMA`) VALUES
(1, 'Perdarahan'),
(2, 'Infeksi'),
(3, 'Sepsis'),
(4, 'Pre Eklamsia/Eklampsia'),
(5, 'Jantung'),
(6, 'TB Paru'),
(7, 'Asma'),
(8, 'Hipertensi'),
(9, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `list_spesialisasi_rujukan`
--

CREATE TABLE IF NOT EXISTS `list_spesialisasi_rujukan` (
  `SR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SR_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_spm`
--

CREATE TABLE IF NOT EXISTS `list_spm` (
  `LIST_SPM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_SPM_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`LIST_SPM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_spm_rs`
--

CREATE TABLE IF NOT EXISTS `list_spm_rs` (
  `LSPMRS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LSPMRS_URAIAN` varchar(300) DEFAULT NULL,
  `LSPMRS_STANDAR` int(11) DEFAULT NULL,
  PRIMARY KEY (`LSPMRS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `list_spm_rs`
--

INSERT INTO `list_spm_rs` (`LSPMRS_ID`, `LSPMRS_URAIAN`, `LSPMRS_STANDAR`) VALUES
(1, 'Gawat Darurat', 9),
(2, 'Rawat Jalan', 7),
(3, 'Rawat Inap', 15),
(4, 'Bedah', 7),
(5, 'Persalinan dan Perinatologi', 8),
(6, 'Intensif', 2),
(7, 'Radiologi', 4),
(8, 'Laboratorium', 4),
(9, 'Rehabilitasi Medik', 3),
(10, 'Farmasi', 4),
(11, 'Gizi', 3),
(12, 'Transfusi Darah', 2),
(13, 'GAKIN', 1),
(14, 'Rekam Medik', 4),
(15, 'Pengelolaan Limbah', 2),
(16, 'Administrasi dan Manajemen', 9),
(17, 'Ambulance/Kereta Jenazah', 3),
(18, 'Pemulasaran Jenazah', 1),
(19, 'Pemeliharaan Sarana RS', 3),
(20, 'Laundry', 2),
(21, 'Pencegahan dan Pengendalian Infeksi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `list_tahun`
--

CREATE TABLE IF NOT EXISTS `list_tahun` (
  `LIST_TAHUN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_TAHUN_TAHUN` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`LIST_TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `list_tahun`
--

INSERT INTO `list_tahun` (`LIST_TAHUN_ID`, `LIST_TAHUN_TAHUN`) VALUES
(1, 'Tahun N-2'),
(2, 'Tahun N-1'),
(3, 'Tahun N');

-- --------------------------------------------------------

--
-- Table structure for table `list_tenaga_igd`
--

CREATE TABLE IF NOT EXISTS `list_tenaga_igd` (
  `IGDLIST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IGDLIST_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`IGDLIST_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=8 ;

--
-- Dumping data for table `list_tenaga_igd`
--

INSERT INTO `list_tenaga_igd` (`IGDLIST_ID`, `IGDLIST_NAMA`) VALUES
(1, 'Dr. Subspesialis'),
(2, 'Dr. Spesialis'),
(3, 'Dr. PPDS'),
(4, 'D. Umum'),
(5, 'Perawat Kepala'),
(6, 'Perawat'),
(7, 'Non Medis');

-- --------------------------------------------------------

--
-- Table structure for table `list_tindakan_gilut`
--

CREATE TABLE IF NOT EXISTS `list_tindakan_gilut` (
  `TDK_GILUT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TDK_GILUT_TINDAKAN` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`TDK_GILUT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `list_tindakan_gilut`
--

INSERT INTO `list_tindakan_gilut` (`TDK_GILUT_ID`, `TDK_GILUT_TINDAKAN`) VALUES
(1, 'Tindakan Medik Dasar Umum :			'),
(2, 'a. Tumpatan tetap gigi permanen			'),
(3, 'b. Tumpatan tetap gigi sulung			'),
(4, 'c. Pengobatan pulpa			'),
(5, 'd. Pencabutan gigi tetap karena keluhan pulpa			'),
(6, 'e. Pencabutan gigi tetap karena penyebab lain			'),
(7, 'f.  Pencabutan gigi tetap karena persistensi			'),
(8, 'g. Pengobatan periodontal berupa gingival curetage 			'),
(9, 'h. Pengobatan periodontal berupa tindakan lainnya			'),
(10, 'i.  Tindakan pasca bedah			'),
(11, 'j.  Tindakan preventif berupa scaling			'),
(12, 'k. Tindakan preventif berupa topical aplikasi			'),
(13, 'l.  Pengobatan abses berupa pemberian obat per oral			'),
(14, 'm.Pengobatan abses dengan cara lain-lain			'),
(15, 'n. Pengobatan abses berupa insisi ekstra/intra oral			'),
(16, 'Tindakan Medik Dasar Khusus :			'),
(17, 'a. Odontektomi			'),
(18, 'b. Freknotomi			'),
(19, 'c. Excisi Denture Hyper Plasia			'),
(20, 'd. Excisi Torus Paltinus			'),
(21, 'e. Pengelolaan Simple Fraktur Mandibula dan Maxilla 			');

-- --------------------------------------------------------

--
-- Table structure for table `list_tindakan_jenazah`
--

CREATE TABLE IF NOT EXISTS `list_tindakan_jenazah` (
  `LIST_JENAZAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_JENAZAH_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_JENAZAH_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `list_tindakan_jenazah`
--

INSERT INTO `list_tindakan_jenazah` (`LIST_JENAZAH_ID`, `LIST_JENAZAH_NAMA`) VALUES
(1, 'Perawatan Jenazah'),
(2, 'Konservasi Jenazah'),
(3, 'Penyimpanan Jenazah'),
(4, 'Penguburan Jenazah'),
(5, 'Autopsi Klinik');

-- --------------------------------------------------------

--
-- Table structure for table `list_tindakan_rehabilitasi_medik`
--

CREATE TABLE IF NOT EXISTS `list_tindakan_rehabilitasi_medik` (
  `LIST_TM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_TM_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_TM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `list_tindakan_rehabilitasi_medik`
--

INSERT INTO `list_tindakan_rehabilitasi_medik` (`LIST_TM_ID`, `LIST_TM_NAMA`) VALUES
(5, 'Medis'),
(6, 'Fisioterapi'),
(7, 'Okupasiterapi'),
(8, 'Terapi Wicara'),
(9, 'Psikologi'),
(10, 'Sosial Medis'),
(11, 'Ortotik Prostetik'),
(12, 'Kunjungan Rumah');

-- --------------------------------------------------------

--
-- Table structure for table `list_tipe_pasien`
--

CREATE TABLE IF NOT EXISTS `list_tipe_pasien` (
  `TIPE_PASIEN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPE_PASIEN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TIPE_PASIEN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `list_tipe_pasien`
--

INSERT INTO `list_tipe_pasien` (`TIPE_PASIEN_ID`, `TIPE_PASIEN_NAMA`) VALUES
(1, 'Pasien Rawat Jalan'),
(2, 'Pasien Rawat Inap');

-- --------------------------------------------------------

--
-- Table structure for table `list_tipe_pasien_tb`
--

CREATE TABLE IF NOT EXISTS `list_tipe_pasien_tb` (
  `TIPE_TB` int(11) NOT NULL AUTO_INCREMENT,
  `TIPE_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TIPE_TB`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `list_tipe_pasien_tb`
--

INSERT INTO `list_tipe_pasien_tb` (`TIPE_TB`, `TIPE_NAMA`) VALUES
(1, 'BTA Positif'),
(2, 'BTA Negatif/ Ro Pos'),
(3, 'Extra Paru'),
(4, 'Kambuh'),
(5, 'Defaulter'),
(6, 'Gagal'),
(7, 'Kronik'),
(8, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_tribulan`
--

CREATE TABLE IF NOT EXISTS `list_tribulan` (
  `TRIBULAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRIBULAN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TRIBULAN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `list_tribulan`
--

INSERT INTO `list_tribulan` (`TRIBULAN_ID`, `TRIBULAN_NAMA`) VALUES
(1, 'TRIBULAN I'),
(2, 'TRIBULAN II'),
(3, 'TRIBULAN III'),
(4, 'TRIBULAN IV');

-- --------------------------------------------------------

--
-- Table structure for table `list_unit`
--

CREATE TABLE IF NOT EXISTS `list_unit` (
  `UNIT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UNIT_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`UNIT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `list_unit`
--

INSERT INTO `list_unit` (`UNIT_ID`, `UNIT_NAMA`) VALUES
(1, 'UGD'),
(2, 'IRNA'),
(3, 'IRJA'),
(4, 'Instalasi Perinatologi'),
(5, 'Instalasi Farmasi'),
(6, 'Instalasi Radiologi'),
(7, 'Instalasi Perawatan Intensif'),
(8, 'Instalasi Bedah Sentral'),
(9, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `list_unit_kerja_maskin`
--

CREATE TABLE IF NOT EXISTS `list_unit_kerja_maskin` (
  `UNITMASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UNITMASKIN_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`UNITMASKIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_unit_survey`
--

CREATE TABLE IF NOT EXISTS `list_unit_survey` (
  `UNIT_SURVEY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI_UNIT_SURVEY_ID` int(11) DEFAULT NULL,
  `UNIT_SURVEY_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`UNIT_SURVEY_ID`),
  KEY `FK_RELATIONSHIP_63` (`KATEGORI_UNIT_SURVEY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `list_unit_survey`
--

INSERT INTO `list_unit_survey` (`UNIT_SURVEY_ID`, `KATEGORI_UNIT_SURVEY_ID`, `UNIT_SURVEY_NAMA`) VALUES
(1, 1, 'Sikap petugas'),
(2, 1, 'Keamanan'),
(3, 1, 'Ketrampilan petugas'),
(4, 1, 'Fasilitas parkir'),
(5, 2, 'Keramahan'),
(6, 2, 'Kecepatan'),
(7, 2, 'Ketrampilan'),
(8, 3, 'Sikap Petugas'),
(9, 3, 'Kejelasan Informasi'),
(10, 3, 'Kepedulian'),
(11, 4, 'Sikap petugas'),
(12, 4, 'Kejelasan informasi'),
(13, 4, 'Kecepatan'),
(14, 4, 'Prosedur pelayanan'),
(15, 4, 'Persyaratan pelayanan'),
(16, 4, 'Keadilan pelayanan'),
(17, 5, 'Fasilitas '),
(18, 5, 'Kebersihan/Kenyamanan'),
(19, 5, 'Kejelasan petugas'),
(20, 5, 'Jadwal pelayanan'),
(21, 6, 'Sikap petugas'),
(22, 6, 'Kecepatan pelayanan'),
(23, 6, 'Keterampilan petugas'),
(24, 6, 'Fasilitas '),
(25, 6, 'Kenyamanan '),
(26, 6, 'Keadilan pelayanan'),
(27, 7, 'Sikap petugas'),
(28, 7, 'Citarasa'),
(29, 7, 'Keterampilan petugas'),
(30, 7, 'Fasilitas parkir'),
(31, 7, 'Kebersihan'),
(32, 8, 'Sikap petugas'),
(33, 8, 'Fasilitas'),
(34, 8, 'Kecepatan'),
(35, 8, 'Keterampilan '),
(36, 8, 'Kenyamanan '),
(37, 8, 'Keadilan pelayanan'),
(38, 9, 'Sikap '),
(39, 9, 'Kejelasan informasi'),
(40, 9, 'Kecepatan'),
(41, 9, 'Ketelatenan'),
(42, 9, 'Kedisiplinan'),
(43, 9, 'Tanggung jawab'),
(44, 9, 'Keadilan pelayanan'),
(45, 10, 'Sikap petugas'),
(46, 10, 'Kedisiplinan'),
(47, 10, 'Kecepatan'),
(48, 10, 'Keterampilan '),
(49, 10, 'Tanggung jawab'),
(50, 10, 'Kejelasan'),
(51, 11, 'Sikap petugas'),
(52, 11, 'Kejelasan informasi'),
(53, 11, 'Kecepatan'),
(54, 11, 'Prosedur pelayanan'),
(55, 11, 'Persyaratan pelayanan'),
(56, 11, 'Keadilan pelayanan'),
(57, 12, 'Sikap petugas'),
(58, 12, 'Fasilitas '),
(59, 12, 'Kecepatan'),
(60, 12, 'Keterampilan '),
(61, 12, 'Kenyamanan'),
(62, 12, 'Keadilan pelayanan'),
(63, 13, 'Sikap petugas'),
(64, 13, 'Keterampilan '),
(65, 13, 'Kecepatan'),
(66, 13, 'Fasilitas '),
(67, 13, 'Kenyamanan'),
(68, 14, 'Sikap petugas'),
(69, 14, 'Kejelasan informasi'),
(70, 14, 'Kecepatan'),
(71, 14, 'Prosedur pelayanan'),
(72, 14, 'Keterampilan'),
(73, 14, 'Kenyamanan'),
(74, 15, 'Kewajaran'),
(75, 15, 'Kepastian biaya');

-- --------------------------------------------------------

--
-- Table structure for table `list_uraian_efisiensi`
--

CREATE TABLE IF NOT EXISTS `list_uraian_efisiensi` (
  `DEFF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEFF_NAMA` varchar(250) DEFAULT NULL,
  `DEFF_STANDAR_A` float DEFAULT NULL,
  `DEFF_STANDAR_B` float NOT NULL,
  PRIMARY KEY (`DEFF_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `list_uraian_efisiensi`
--

INSERT INTO `list_uraian_efisiensi` (`DEFF_ID`, `DEFF_NAMA`, `DEFF_STANDAR_A`, `DEFF_STANDAR_B`) VALUES
(1, 'BOR perinatologi', 0, 0),
(2, 'BOR RS', 60, 85),
(3, 'TOI ', 1, 3),
(4, 'BTO', 40, 50),
(5, 'ALOS ', 6, 9),
(6, 'GDR', 45, 45),
(7, 'GDR Laki-laki', 45, 45),
(8, 'GDR Perempuan', 45, 45),
(9, 'NDR', 25, 25),
(10, 'NDR Laki-laki', 25, 25),
(11, 'NDR Perempuan', 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `live_saving`
--

CREATE TABLE IF NOT EXISTS `live_saving` (
  `LS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRIBULAN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LS_KUMULATIF_PASIEN` int(11) DEFAULT NULL,
  `LS_TOTAL_PASIEN` int(11) DEFAULT NULL,
  `LS_PERSENTASE` int(11) DEFAULT NULL,
  PRIMARY KEY (`LS_ID`),
  KEY `FK_RELATIONSHIP_160` (`TRIBULAN_ID`),
  KEY `FK_RELATIONSHIP_165` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mdgs4_1`
--

CREATE TABLE IF NOT EXISTS `mdgs4_1` (
  `MDGS41_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS4_ID` int(11) DEFAULT NULL,
  `MDGS41_KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MDGS41_ID`),
  KEY `FK_RELATIONSHIP_144` (`MDGS4_ID`),
  KEY `FK_RELATIONSHIP_151` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mdgs4_1`
--

INSERT INTO `mdgs4_1` (`MDGS41_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS4_ID`, `MDGS41_KONDISI`) VALUES
(1, 1, '1', 1, 1),
(2, 1, '1', 2, 0),
(3, 1, '1', 3, 1),
(4, 1, '1', 4, 1),
(5, 1, '1', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs4_2`
--

CREATE TABLE IF NOT EXISTS `mdgs4_2` (
  `MDGS42_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDGS4_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS42_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`MDGS42_ID`),
  KEY `FK_RELATIONSHIP_145` (`MDGS4_ID`),
  KEY `FK_RELATIONSHIP_152` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mdgs4_2`
--

INSERT INTO `mdgs4_2` (`MDGS42_ID`, `MDGS4_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS42_JUMLAH`) VALUES
(1, 6, 1, '1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs4_peralatan_neonatal_esensial`
--

CREATE TABLE IF NOT EXISTS `mdgs4_peralatan_neonatal_esensial` (
  `PN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NEONATAL_ESENSIAL_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PN_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PN_ID`),
  KEY `FK_RELATIONSHIP_157` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_76` (`NEONATAL_ESENSIAL_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mdgs4_peralatan_neonatal_esensial`
--

INSERT INTO `mdgs4_peralatan_neonatal_esensial` (`PN_ID`, `NEONATAL_ESENSIAL_ID`, `TAHUN_ID`, `RS_NOREG`, `PN_JUMLAH`) VALUES
(1, 1, 1, '1', 21),
(2, 2, 1, '1', 32),
(3, 3, 1, '1', 43),
(4, 4, 1, '1', 54),
(5, 5, 1, '1', 65),
(6, 6, 1, '1', 76),
(7, 7, 1, '1', 87),
(8, 8, 1, '1', 98),
(9, 9, 1, '1', 9),
(10, 10, 1, '1', 99);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs5_1`
--

CREATE TABLE IF NOT EXISTS `mdgs5_1` (
  `MDGS51_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDGS5_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS51_KONDISI` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`MDGS51_ID`),
  KEY `FK_RELATIONSHIP_146` (`MDGS5_ID`),
  KEY `FK_RELATIONSHIP_153` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mdgs5_1`
--

INSERT INTO `mdgs5_1` (`MDGS51_ID`, `MDGS5_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS51_KONDISI`) VALUES
(1, 7, 1, '1', 0),
(2, 8, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs5_2`
--

CREATE TABLE IF NOT EXISTS `mdgs5_2` (
  `MDGS52_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDGS5_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS52_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`MDGS52_ID`),
  KEY `FK_RELATIONSHIP_147` (`MDGS5_ID`),
  KEY `FK_RELATIONSHIP_154` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mdgs5_2`
--

INSERT INTO `mdgs5_2` (`MDGS52_ID`, `MDGS5_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS52_JUMLAH`) VALUES
(1, 9, 1, '1', 45),
(2, 10, 1, '1', 2),
(3, 11, 1, '1', 78);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs5_3`
--

CREATE TABLE IF NOT EXISTS `mdgs5_3` (
  `MDGS53_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS5_ID` int(11) DEFAULT NULL,
  `MDGS53_KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MDGS53_ID`),
  KEY `FK_RELATIONSHIP_148` (`MDGS5_ID`),
  KEY `FK_RELATIONSHIP_155` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mdgs5_3`
--

INSERT INTO `mdgs5_3` (`MDGS53_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS5_ID`, `MDGS53_KONDISI`) VALUES
(1, 1, '1', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs5_peralatan_maternal_essensial`
--

CREATE TABLE IF NOT EXISTS `mdgs5_peralatan_maternal_essensial` (
  `PM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MATERNAL_ESSENSIAL_ID` int(11) DEFAULT NULL,
  `PM_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PM_ID`),
  KEY `FK_RELATIONSHIP_156` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_75` (`MATERNAL_ESSENSIAL_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mdgs5_peralatan_maternal_essensial`
--

INSERT INTO `mdgs5_peralatan_maternal_essensial` (`PM_ID`, `TAHUN_ID`, `RS_NOREG`, `MATERNAL_ESSENSIAL_ID`, `PM_JUMLAH`) VALUES
(1, 1, '1', 1, 12),
(2, 1, '1', 2, 23),
(3, 1, '1', 3, 34),
(4, 1, '1', 4, 45),
(5, 1, '1', 5, 56),
(6, 1, '1', 6, 67),
(7, 1, '1', 7, 78),
(8, 1, '1', 8, 89),
(9, 1, '1', 9, 90),
(10, 1, '1', 10, 123);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs6_1`
--

CREATE TABLE IF NOT EXISTS `mdgs6_1` (
  `MDGS61_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS6_ID` int(11) DEFAULT NULL,
  `MDGS61_KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MDGS61_ID`),
  KEY `FK_RELATIONSHIP_149` (`MDGS6_ID`),
  KEY `FK_RELATIONSHIP_158` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mdgs6_1`
--

INSERT INTO `mdgs6_1` (`MDGS61_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS6_ID`, `MDGS61_KONDISI`) VALUES
(1, 1, '1', 13, 0),
(2, 1, '1', 14, 1),
(3, 1, '1', 15, 0),
(4, 1, '1', 16, 1),
(5, 1, '1', 17, 0),
(6, 1, '1', 18, 1),
(7, 1, '1', 19, 0),
(8, 1, '1', 20, 1),
(9, 1, '1', 21, 0),
(10, 1, '1', 22, 1),
(11, 1, '1', 23, 0),
(12, 1, '1', 24, 1),
(13, 1, '1', 25, 0),
(14, 1, '1', 26, 1),
(15, 1, '1', 27, 0),
(16, 1, '1', 28, 1),
(17, 1, '1', 29, 0),
(18, 1, '1', 30, 1),
(19, 1, '1', 31, 0),
(20, 1, '1', 32, 1),
(21, 1, '1', 33, 0),
(22, 1, '1', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdgs6_2`
--

CREATE TABLE IF NOT EXISTS `mdgs6_2` (
  `MDGS62_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MDGS6_ID` int(11) DEFAULT NULL,
  `MDGS62_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`MDGS62_ID`),
  KEY `FK_RELATIONSHIP_150` (`MDGS6_ID`),
  KEY `FK_RELATIONSHIP_159` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mdgs6_2`
--

INSERT INTO `mdgs6_2` (`MDGS62_ID`, `TAHUN_ID`, `RS_NOREG`, `MDGS6_ID`, `MDGS62_JUMLAH`) VALUES
(1, 1, '1', 35, 21),
(2, 1, '1', 36, 43),
(3, 1, '1', 37, 54),
(4, 1, '1', 38, 65),
(5, 1, '1', 39, 76),
(6, 1, '1', 40, 98);

-- --------------------------------------------------------

--
-- Table structure for table `mekanisme_pengaduan_maskin`
--

CREATE TABLE IF NOT EXISTS `mekanisme_pengaduan_maskin` (
  `MEKANISME_PENGADUAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_MEKANISME_ID` int(11) DEFAULT NULL,
  `MEKANISME_PENGADUAN_N2` int(11) DEFAULT NULL,
  `MEKANISME_PENGADUAN_N1` int(11) NOT NULL,
  `MEKANISME_PENGADUAN_N` int(11) NOT NULL,
  `	MEKANISME_PENGADUAN_JML` int(11) NOT NULL,
  `MEKANISME_PENGADUAN_RATA` float DEFAULT NULL,
  `MEKANISME_PENGADUAN_TREN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MEKANISME_PENGADUAN_ID`),
  KEY `FK_RELATIONSHIP_250` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_79` (`LIST_MEKANISME_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien_hemodialisis`
--

CREATE TABLE IF NOT EXISTS `pasien_hemodialisis` (
  `PH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) NOT NULL,
  `PH_LAMA_L` int(11) DEFAULT NULL,
  `PH_LAMA_P` int(11) DEFAULT NULL,
  `PH_LAMA_TOTAL` int(11) DEFAULT NULL,
  `PH_BARU_L` int(11) DEFAULT NULL,
  `PH_BARU_P` int(11) DEFAULT NULL,
  `PH_BARU_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`PH_ID`),
  KEY `FK_RELATIONSHIP_121` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan_sdm`
--

CREATE TABLE IF NOT EXISTS `pelatihan_sdm` (
  `PELATIHAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `UNIT_ID` int(11) DEFAULT NULL,
  `LIST_TM_ID` int(6) DEFAULT NULL,
  `PELATIHAN_URAIAN` varchar(1024) DEFAULT NULL,
  `PELATIHAN_JUMLAH` int(11) DEFAULT NULL,
  `PELATIHAN_PENYELENGGARA` varchar(213) DEFAULT NULL,
  PRIMARY KEY (`PELATIHAN_ID`),
  KEY `FK_RELATIONSHIP_103` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_99` (`UNIT_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `PELATIHAN_JENIS` (`LIST_TM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `pelatihan_sdm`
--

INSERT INTO `pelatihan_sdm` (`PELATIHAN_ID`, `TAHUN_ID`, `RS_NOREG`, `UNIT_ID`, `LIST_TM_ID`, `PELATIHAN_URAIAN`, `PELATIHAN_JUMLAH`, `PELATIHAN_PENYELENGGARA`) VALUES
(1, 1, '1', 13, 1, '11', 12, '14'),
(2, 1, '1', 14, 1, '12', 13, '15'),
(3, 1, '1', 15, 1, '13', 14, '16'),
(4, 1, '1', 16, 1, '14', 15, '17'),
(5, 1, '1', 17, 1, '15', 16, '18'),
(6, 1, '1', 18, 1, '16', 17, '19'),
(7, 1, '1', 19, 1, '17', 18, '20'),
(8, 1, '1', 20, 1, '18', 19, '21'),
(9, 1, '1', 21, 1, '19', 20, '22'),
(10, 1, '1', 22, 1, '20', 21, '23'),
(11, 1, '1', 23, 1, '21', 22, '24'),
(12, 1, '1', 24, 1, '22', 23, '25'),
(13, 1, '1', 25, 1, '23', 24, '26'),
(14, 1, '1', 26, 1, '24', 25, '27'),
(15, 1, '1', 27, 1, '25', 26, '28'),
(16, 1, '1', 28, 1, '26', 27, '29'),
(17, 1, '1', 29, 1, '27', 28, '30'),
(18, 1, '1', 30, 1, '28', 29, '31'),
(19, 1, '1', 31, 1, '29', 30, '32'),
(20, 1, '1', 32, 1, '30', 31, '33'),
(21, 1, '1', 17, 2, '15', 16, '18'),
(22, 1, '1', 18, 2, '16', 17, '19'),
(23, 1, '1', 19, 2, '17', 18, '20'),
(24, 1, '1', 20, 2, '18', 19, '21'),
(25, 1, '1', 21, 2, '19', 20, '22'),
(26, 1, '1', 22, 2, '20', 21, '23'),
(27, 1, '1', 23, 2, '21', 22, '24'),
(28, 1, '1', 24, 2, '22', 23, '25'),
(29, 1, '1', 25, 2, '23', 24, '26'),
(30, 1, '1', 26, 2, '24', 25, '27'),
(31, 1, '1', 27, 2, '25', 26, '28'),
(32, 1, '1', 28, 2, '26', 27, '29'),
(33, 1, '1', 29, 2, '27', 28, '30'),
(34, 1, '1', 30, 2, '28', 29, '31'),
(35, 1, '1', 31, 2, '29', 30, '32'),
(36, 1, '1', 32, 2, '30', 31, '33'),
(37, 1, '1', 33, 2, '31', 32, '34'),
(38, 1, '1', 34, 2, '32', 33, '35'),
(39, 1, '1', 35, 2, '33', 34, '36'),
(40, 1, '1', 36, 2, '34', 35, '37'),
(41, 1, '1', 21, 3, '19', 20, '22'),
(42, 1, '1', 22, 3, '20', 21, '23'),
(43, 1, '1', 23, 3, '21', 22, '24'),
(44, 1, '1', 24, 3, '22', 23, '25'),
(45, 1, '1', 25, 3, '23', 24, '26'),
(46, 1, '1', 26, 3, '24', 25, '27'),
(47, 1, '1', 27, 3, '25', 26, '28'),
(48, 1, '1', 28, 3, '26', 27, '29'),
(49, 1, '1', 29, 3, '27', 28, '30'),
(50, 1, '1', 30, 3, '28', 29, '31'),
(51, 1, '1', 31, 3, '29', 30, '32'),
(52, 1, '1', 32, 3, '30', 31, '33'),
(53, 1, '1', 33, 3, '31', 32, '34'),
(54, 1, '1', 34, 3, '32', 33, '35'),
(55, 1, '1', 35, 3, '33', 34, '36'),
(56, 1, '1', 36, 3, '34', 35, '37'),
(57, 1, '1', 37, 3, '35', 36, '38'),
(58, 1, '1', 38, 3, '36', 37, '39'),
(59, 1, '1', 39, 3, '37', 38, '40'),
(60, 1, '1', 40, 3, '38', 39, '41');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE IF NOT EXISTS `pelayanan` (
  `PELAYANAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LP_ID` int(11) DEFAULT NULL,
  `PELAYANAN_KETERSEDIAAN` tinyint(1) DEFAULT NULL,
  `PELAYANAN_KET` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`PELAYANAN_ID`),
  KEY `FK_RELATIONSHIP_14` (`LP_ID`),
  KEY `FK_RELATIONSHIP_92` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`PELAYANAN_ID`, `TAHUN_ID`, `RS_NOREG`, `LP_ID`, `PELAYANAN_KETERSEDIAAN`, `PELAYANAN_KET`) VALUES
(1, 1, '1', 2, 1, 'Keterangan 2'),
(2, 1, '1', 3, 1, 'Keterangan 3'),
(3, 1, '1', 4, 1, 'Keterangan 4'),
(4, 1, '1', 6, 1, 'Keterangan 6'),
(5, 1, '1', 8, 0, 'Keterangan 8'),
(6, 1, '1', 9, 0, 'Keterangan 9'),
(7, 1, '1', 10, 0, 'Keterangan 10'),
(8, 1, '1', 11, 0, 'Keterangan 11'),
(9, 1, '1', 13, 1, 'Keterangan 13'),
(10, 1, '1', 14, 1, 'Keterangan 14'),
(11, 1, '1', 15, 1, 'Keterangan 15'),
(12, 1, '1', 16, 1, 'Keterangan 16'),
(13, 1, '1', 17, 1, 'Keterangan 17'),
(14, 1, '1', 19, 0, 'Keterangan 19'),
(15, 1, '1', 20, 0, 'Keterangan 20'),
(16, 1, '1', 21, 0, 'Keterangan 21'),
(17, 1, '1', 22, 0, 'Keterangan 22'),
(18, 1, '1', 23, 0, 'Keterangan 23'),
(19, 1, '1', 24, 0, 'Keterangan 24'),
(20, 1, '1', 25, 0, 'Keterangan 25'),
(21, 1, '1', 26, 0, 'Keterangan 26'),
(22, 1, '1', 27, 0, 'Keterangan 27'),
(23, 1, '1', 28, 0, 'Keterangan 28'),
(24, 1, '1', 29, 0, 'Keterangan 29'),
(25, 1, '1', 30, 0, 'Keterangan 30'),
(26, 1, '1', 32, 1, 'Keterangan 32'),
(27, 1, '1', 33, 1, 'Keterangan 33'),
(28, 1, '1', 34, 1, 'Keterangan 34'),
(29, 1, '1', 35, 1, 'Keterangan 35'),
(30, 1, '1', 36, 1, 'Keterangan 36'),
(31, 1, '1', 37, 1, 'Keterangan 37'),
(32, 1, '1', 38, 1, 'Keterangan 38'),
(33, 1, '1', 40, 0, 'Keterangan 40'),
(34, 1, '1', 41, 0, 'Keterangan 41'),
(35, 1, '1', 42, 0, 'Keterangan 42'),
(36, 1, '1', 43, 0, 'Keterangan 43'),
(37, 1, '1', 44, 0, 'Keterangan 44'),
(38, 1, '1', 45, 0, 'Keterangan 45'),
(39, 1, '1', 46, 0, 'Keterangan 46'),
(40, 1, '1', 47, 0, 'Keterangan 47'),
(41, 1, '1', 48, 0, 'Keterangan 48'),
(42, 1, '1', 49, 0, 'Keterangan 49'),
(43, 1, '1', 50, 0, 'Keterangan 50'),
(44, 1, '1', 51, 0, 'Keterangan 51'),
(45, 1, '1', 52, 0, 'Keterangan 52'),
(46, 1, '1', 54, 1, 'Keterangan 54'),
(47, 1, '1', 55, 1, 'Keterangan 55'),
(48, 1, '1', 57, 1, 'Keterangan 57'),
(49, 1, '1', 58, 1, 'Keterangan 58'),
(50, 1, '1', 59, 1, 'Keterangan 59'),
(51, 1, '1', 60, 1, 'Keterangan 60'),
(52, 1, '1', 61, 1, 'Keterangan 61'),
(53, 1, '1', 62, 1, 'Keterangan 62'),
(54, 1, '1', 64, 0, 'Keterangan 64'),
(55, 1, '1', 65, 0, 'Keterangan 65'),
(56, 1, '1', 66, 0, 'Keterangan 66'),
(57, 1, '1', 67, 0, 'Keterangan 67'),
(58, 1, '1', 68, 0, 'Keterangan 68'),
(59, 1, '1', 69, 0, 'Keterangan 69'),
(60, 1, '1', 70, 0, 'Keterangan 70'),
(61, 1, '1', 71, 0, 'Keterangan 71'),
(62, 1, '1', 72, 0, 'Keterangan 72'),
(63, 1, '1', 73, 0, 'Keterangan 73'),
(64, 1, '1', 74, 0, 'Keterangan 74'),
(65, 1, '1', 76, 1, 'Keterangan 76'),
(66, 1, '1', 77, 1, 'Keterangan 77'),
(67, 1, '1', 78, 1, 'Keterangan 78'),
(68, 1, '1', 79, 1, 'Keterangan 79'),
(69, 1, '1', 80, 1, 'Keterangan 80'),
(70, 1, '1', 80, 1, 'Keterangan 81'),
(71, 1, '1', 80, 1, 'Keterangan 82'),
(72, 1, '1', 80, 1, 'Keterangan 83');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_diit`
--

CREATE TABLE IF NOT EXISTS `pelayanan_diit` (
  `DIIT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_DIET_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `DIIT_VVIP` int(11) DEFAULT NULL,
  `DIIT_VIP` int(11) DEFAULT NULL,
  `DIIT_KLS1` int(11) DEFAULT NULL,
  `DIIT_KLS3` int(11) DEFAULT NULL,
  `DIIT_KLS2` int(11) DEFAULT NULL,
  `DIIT_KLS1_1` int(11) DEFAULT NULL,
  `DIIT_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`DIIT_ID`),
  KEY `FK_RELATIONSHIP_214` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_47` (`JENIS_DIET_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_farmasi`
--

CREATE TABLE IF NOT EXISTS `pelayanan_farmasi` (
  `PF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GO_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PF_JUMLAH_ITEM` int(11) DEFAULT NULL,
  `PF_JML_IGD` int(11) DEFAULT NULL,
  `PF_JML_IRJA` int(11) DEFAULT NULL,
  `PF_JML_IRNA` int(11) DEFAULT NULL,
  `PF_JML_RESEP_TOTAL` int(11) DEFAULT NULL,
  `PF_JML_RESEP_DILAYANI` int(11) DEFAULT NULL,
  `PF_JML_RESEP_PERSEN` int(11) DEFAULT NULL,
  PRIMARY KEY (`PF_ID`),
  KEY `FK_RELATIONSHIP_211` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_45` (`GO_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_gigi`
--

CREATE TABLE IF NOT EXISTS `pelayanan_gigi` (
  `PEL_GILUT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `TDK_GILUT_ID` int(11) DEFAULT NULL,
  `PEL_GILUT_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PEL_GILUT_ID`),
  KEY `FK_RELATIONSHIP_237` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_259` (`TDK_GILUT_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_kegiatan_kb`
--

CREATE TABLE IF NOT EXISTS `pelayanan_kegiatan_kb` (
  `KB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `METODE_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KB_JUMLAH_PESERTA` int(11) DEFAULT NULL,
  `KB_RUJUKAN_RI` int(11) DEFAULT NULL,
  `KB_RUJUKAN_JLN` int(11) DEFAULT NULL,
  `KB_KUNJUNGAN_ULANG` int(11) DEFAULT NULL,
  `KB_KELUHAN` int(11) DEFAULT NULL,
  `KB_DIRUJUK` int(11) DEFAULT NULL,
  PRIMARY KEY (`KB_ID`),
  KEY `FK_RELATIONSHIP_204` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_38` (`METODE_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_lab_patologi`
--

CREATE TABLE IF NOT EXISTS `pelayanan_lab_patologi` (
  `LAB_P_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_LAB_ID` int(11) NOT NULL,
  `LAB_P_SEDERHANA_N2` int(11) NOT NULL,
  `LAB_P_SEDANG_N2` int(11) NOT NULL,
  `LAB_P_CANGGIH_N2` int(11) NOT NULL,
  `LAB_P_SEDERHANA_N1` int(11) NOT NULL,
  `LAB_P_SEDANG_N1` int(11) NOT NULL,
  `LAB_P_CANGGIH_N1` int(11) NOT NULL,
  `LAB_P_SEDERHANA_N` int(11) NOT NULL,
  `LAB_P_SEDANG_N` int(11) NOT NULL,
  `LAB_P_CANGGIH_N` int(11) NOT NULL,
  PRIMARY KEY (`LAB_P_ID`),
  KEY `FK_RELATIONSHIP_201` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `JENIS_LAB_ID` (`JENIS_LAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_lab_toksikologi`
--

CREATE TABLE IF NOT EXISTS `pelayanan_lab_toksikologi` (
  `LAB_T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPT_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LAB_T_SKRINING_N2` int(11) NOT NULL,
  `LAB_T_KONFIRMASI_N2` int(11) NOT NULL,
  `LAB_T_SKRINING_N1` int(11) NOT NULL,
  `LAB_T_KONFIRMASI_N1` int(11) NOT NULL,
  `LAB_T_SKRINING_N` int(11) NOT NULL,
  `LAB_T_KONFIRMASI_N` int(11) NOT NULL,
  PRIMARY KEY (`LAB_T_ID`),
  KEY `FK_RELATIONSHIP_202` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_42` (`LPT_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_lab_total`
--

CREATE TABLE IF NOT EXISTS `pelayanan_lab_total` (
  `LAB_TOTAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_LAB_ID` int(11) NOT NULL,
  `LAB_TOTAL_JUMLAH_N2` int(11) NOT NULL,
  `LAB_TOTAL_JUMLAH_N1` int(11) NOT NULL,
  `LAB_TOTAL_JUMLAH_N` int(11) NOT NULL,
  `LAB_TOTAL_JUMLAH_TOTAL` int(11) NOT NULL,
  `LAB_TOTAL_JUMLAH_RERATA` int(11) NOT NULL,
  PRIMARY KEY (`LAB_TOTAL_ID`),
  KEY `FK_RELATIONSHIP_201` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `JENIS_LAB_ID` (`JENIS_LAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_maskin`
--

CREATE TABLE IF NOT EXISTS `pelayanan_maskin` (
  `P_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) NOT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `UNITMASKIN_ID` int(11) DEFAULT NULL,
  `P_MASKIN_L_N2` int(11) NOT NULL,
  `P_MASKIN_P_N2` int(11) NOT NULL,
  `P_MASKIN_TOTAL_N2` int(11) NOT NULL,
  `P_MASKIN_L_N1` int(11) NOT NULL,
  `P_MASKIN_P_N1` int(11) NOT NULL,
  `P_MASKIN_TOTAL_N1` int(11) NOT NULL,
  `P_MASKIN_L_N` int(11) NOT NULL,
  `P_MASKIN_P_N` int(11) NOT NULL,
  `P_MASKIN_TOTAL_N` int(11) NOT NULL,
  `P_MASKIN_JUMLAH_L` int(11) NOT NULL,
  `P_MASKIN_JUMLAH_P` int(11) NOT NULL,
  `P_MASKIN_RERATA_L` int(11) NOT NULL,
  `P_MASKIN_RERATA_P` int(11) NOT NULL,
  PRIMARY KEY (`P_MASKIN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `TAHUN_ID` (`TAHUN_ID`),
  KEY `UNITMASKIN_ID` (`UNITMASKIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_hemodialisis`
--

CREATE TABLE IF NOT EXISTS `pembayaran_hemodialisis` (
  `HEMODIALIS_BYR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) NOT NULL,
  `HEMODIALIS_BYR_UMUM_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_UMUM_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_ASKES_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_ASKES_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_LAIN_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_LAIN_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_JAMKESMAS_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_JAMKESMAS_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_JAMKESMASDA_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_JAMKESMASDA_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_JAMSOSTEK_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_JAMSOSTEK_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_SPM_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_SPM_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_LAINLAIN_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_LAINLAIN_NONRUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_TOTAL_RUJUK` int(11) DEFAULT NULL,
  `HEMODIALIS_BYR_TOTAL_NONRUJUK` int(11) DEFAULT NULL,
  PRIMARY KEY (`HEMODIALIS_BYR_ID`),
  KEY `FK_RELATIONSHIP_122` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `pembayaran_rawat_inap` (
  `PEMBAYARAN_RI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PEL_RI_ID` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_UMUM` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_ASKES` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_ASURANSI_LAIN` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_JAMKESMAS` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_JAMKESMASDA` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_JAMSOSTEK` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_SPM` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_LAIN` int(11) DEFAULT NULL,
  `PEMBAYARAN_RI_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`PEMBAYARAN_RI_ID`),
  KEY `FK_RELATIONSHIP_179` (`PEL_RI_ID`),
  KEY `FK_RELATIONSHIP_182` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `pembayaran_rawat_jalan` (
  `PRJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) DEFAULT NULL,
  `POLI_ID` int(11) DEFAULT NULL,
  `PRJ_ASKES` int(11) DEFAULT NULL,
  `PRJ_ASURANSI_LAIN` int(11) DEFAULT NULL,
  `PRJ_JAMKESMAS` int(11) DEFAULT NULL,
  `PRJ_JAMKARMADA` int(11) DEFAULT NULL,
  `PRJ_JAMSOSTEK` int(11) DEFAULT NULL,
  `PRJ_SPM` int(11) DEFAULT NULL,
  `PRJ_LAINLAIN` int(11) DEFAULT NULL,
  `PRJ_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`PRJ_ID`),
  KEY `FK_RELATIONSHIP_173` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_174` (`LIST_TAHUN_ID`),
  KEY `FK_RELATIONSHIP_24` (`POLI_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemulasaraan_jenazah`
--

CREATE TABLE IF NOT EXISTS `pemulasaraan_jenazah` (
  `P_JENAZAH_ID` int(11) NOT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_JENAZAH_ID` int(11) DEFAULT NULL,
  `P_JENAZAH_JUMLAH` int(11) NOT NULL,
  PRIMARY KEY (`P_JENAZAH_ID`),
  KEY `FK_RELATIONSHIP_233` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_JENAZAH_ID` (`LIST_JENAZAH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_darah`
--

CREATE TABLE IF NOT EXISTS `penerimaan_darah` (
  `PENERIMAAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PENERIMAAN_DARAH_ID` int(11) DEFAULT NULL,
  `PENERIMAAN_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PENERIMAAN_ID`),
  KEY `FK_RELATIONSHIP_221` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `PENERIMAAN_DARAH_ID` (`PENERIMAAN_DARAH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_darah`
--

CREATE TABLE IF NOT EXISTS `penggunaan_darah` (
  `PENGGUNAAN_DARAH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PENGGUNAAN_TRANS_ID` int(11) DEFAULT NULL,
  `PENGGUNAAN_DARAH_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PENGGUNAAN_DARAH_ID`),
  KEY `FK_RELATIONSHIP_220` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `PENGGUNAAN_TRANS_ID` (`PENGGUNAAN_TRANS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_terbanyak_maskin_ri`
--

CREATE TABLE IF NOT EXISTS `penyakit_terbanyak_maskin_ri` (
  `PENYAKIT_MASKIN_RI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) NOT NULL,
  `ICD10_CODE` varchar(25) NOT NULL,
  `PENYAKIT_MASKIN_RI_NAMA` varchar(200) DEFAULT NULL,
  `PENYAKIT_MASKIN_RI_JML` int(11) DEFAULT NULL,
  PRIMARY KEY (`PENYAKIT_MASKIN_RI_ID`),
  KEY `FK_RELATIONSHIP_255` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`),
  KEY `ICD10_CODE` (`ICD10_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_terbanyak_maskin_rj`
--

CREATE TABLE IF NOT EXISTS `penyakit_terbanyak_maskin_rj` (
  `PENYAKIT_MASKIN_RJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) NOT NULL,
  `ICD10_CODE` varchar(25) NOT NULL,
  `PENYAKIT_MASKIN_RJ_NAMA` varchar(200) DEFAULT NULL,
  `PENYAKIT_MASKIN_RJ_JML` int(11) DEFAULT NULL,
  PRIMARY KEY (`PENYAKIT_MASKIN_RJ_ID`),
  KEY `FK_RELATIONSHIP_255` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`),
  KEY `ICD10_CODE` (`ICD10_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_canggih`
--

CREATE TABLE IF NOT EXISTS `peralatan_canggih` (
  `PC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RS_NOREG` varchar(25) NOT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `LPC_ID` int(11) NOT NULL,
  `PC_JUMLAH` int(11) NOT NULL,
  PRIMARY KEY (`PC_ID`),
  KEY `FK_RELATIONSHIP_93` (`TAHUN_ID`),
  KEY `LPC_ID` (`LPC_ID`),
  KEY `RS_ID` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_hemodialisis`
--

CREATE TABLE IF NOT EXISTS `peralatan_hemodialisis` (
  `PHEMO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPH_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PHEMO_JUMLAH` int(1) DEFAULT NULL,
  PRIMARY KEY (`PHEMO_ID`),
  KEY `FK_RELATIONSHIP_114` (`LPH_ID`),
  KEY `FK_RELATIONSHIP_118` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_hemodialisis2`
--

CREATE TABLE IF NOT EXISTS `peralatan_hemodialisis2` (
  `PHEMO2_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LPH_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PHEMO2_KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PHEMO2_ID`),
  KEY `FK_RELATIONSHIP_114` (`LPH_ID`),
  KEY `FK_RELATIONSHIP_118` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_radiologi_rs`
--

CREATE TABLE IF NOT EXISTS `peralatan_radiologi_rs` (
  `PERALATAN_RADIOLOGI_RS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERALATAN_RAD_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PERALATAN_RADIOLOGI_RS_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PERALATAN_RADIOLOGI_RS_ID`),
  KEY `FK_RELATIONSHIP_119` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_62` (`PERALATAN_RAD_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permasalahan`
--

CREATE TABLE IF NOT EXISTS `permasalahan` (
  `PRBLM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KAT_PERMASALAHAN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PRBLM_NAMA` varchar(250) DEFAULT NULL,
  `PRBLM_PEMECAHAN` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`PRBLM_ID`),
  KEY `FK_RELATIONSHIP_218` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_49` (`KAT_PERMASALAHAN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `persentase_keluhan_maskin`
--

CREATE TABLE IF NOT EXISTS `persentase_keluhan_maskin` (
  `KELUHAN_MASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_KELUHAN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KELUHAN_MASKIN_DITANGANI` int(11) DEFAULT NULL,
  `KELUHAN_MASKIN_JUMLAH` int(11) DEFAULT NULL,
  `KELUHAN_MASKIN_PERSENTASE` float DEFAULT NULL,
  PRIMARY KEY (`KELUHAN_MASKIN_ID`),
  KEY `FK_RELATIONSHIP_248` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_80` (`LIST_KELUHAN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rasio_keuangan`
--

CREATE TABLE IF NOT EXISTS `rasio_keuangan` (
  `RK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) DEFAULT NULL,
  `LIST_RK_ID` int(11) NOT NULL,
  `RK_N2` float DEFAULT NULL,
  `RK_N1` float DEFAULT NULL,
  `RK_N` float DEFAULT NULL,
  PRIMARY KEY (`RK_ID`),
  KEY `FK_RELATIONSHIP_111` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_RK_ID` (`LIST_RK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rasio_keuangan`
--

INSERT INTO `rasio_keuangan` (`RK_ID`, `TAHUN_ID`, `RS_NOREG`, `LIST_RK_ID`, `RK_N2`, `RK_N1`, `RK_N`) VALUES
(1, 1, '1', 1, 10, 25, 40),
(2, 1, '1', 2, 20, 35, 50),
(3, 1, '1', 3, 30, 45, 60),
(4, 1, '1', 4, 40, 55, 70),
(5, 1, '1', 5, 50, 65, 80),
(6, 1, '1', 6, 60, 75, 90);

-- --------------------------------------------------------

--
-- Table structure for table `rehabilitasi_medik`
--

CREATE TABLE IF NOT EXISTS `rehabilitasi_medik` (
  `RM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_RM_ID` int(11) DEFAULT NULL,
  `RM_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`RM_ID`),
  KEY `FK_RELATIONSHIP_208` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_RM_ID` (`LIST_RM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE IF NOT EXISTS `rumah_sakit` (
  `RS_NOREG` varchar(25) NOT NULL,
  `RS_TGL_REG` date DEFAULT NULL,
  `RS_NAMA` varchar(100) DEFAULT NULL,
  `RS_JENIS` int(50) DEFAULT NULL,
  `RS_KELAS` int(25) DEFAULT NULL,
  `RS_NAMA_DIREKTUR` varchar(25) DEFAULT NULL,
  `RS_PENYELENGGARA` varchar(100) DEFAULT NULL,
  `RS_STATUS_PENYELENGGARA` int(50) DEFAULT NULL,
  `RS_ALAMAT` varchar(250) DEFAULT NULL,
  `RS_KAB` varchar(50) DEFAULT NULL,
  `RS_KODEPOS` int(11) DEFAULT NULL,
  `RS_TELP` int(11) DEFAULT NULL,
  `RS_FAX` int(11) DEFAULT NULL,
  `RS_EMAIL` varchar(25) DEFAULT NULL,
  `RS_TELP_HUMAS` int(11) DEFAULT NULL,
  `RS_WEBSITE` varchar(25) DEFAULT NULL,
  `RS_LUAS_LAHAN` float DEFAULT NULL,
  `RS_LUAS_BANGUNAN` float DEFAULT NULL,
  `RS_SIO_NOMOR` varchar(25) DEFAULT NULL,
  `RS_SIO_TGL` date DEFAULT NULL,
  `RS_SIO_OLEH` varchar(50) DEFAULT NULL,
  `RS_SIO_SIFAT` varchar(50) DEFAULT NULL,
  `RS_SIO_MASABERLAKU` int(11) DEFAULT NULL,
  `RS_SPK_NOMOR` varchar(50) DEFAULT NULL,
  `RS_SPK_TGL` date DEFAULT NULL,
  `RS_SPK_OLEH` varchar(50) DEFAULT NULL,
  `RS_SPK_SIFAT` varchar(50) DEFAULT NULL,
  `RS_SPK_MASABERLAKU` int(11) DEFAULT NULL,
  `RS_AKREDITASI` varchar(50) DEFAULT NULL,
  `RS_AKR_PENTAHAPAN` int(50) DEFAULT NULL,
  `RS_AKR_STATUS` int(50) DEFAULT NULL,
  `RS_TGL_AKREDITASI` date DEFAULT NULL,
  `RS_STRENGTH` text NOT NULL,
  `RS_WEAKNESS` text NOT NULL,
  PRIMARY KEY (`RS_NOREG`),
  KEY `RS_JENIS` (`RS_JENIS`),
  KEY `RS_KELAS` (`RS_KELAS`),
  KEY `RS_STATUS_PENYELENGGARA` (`RS_STATUS_PENYELENGGARA`),
  KEY `RS_AKR_PENTAHAPAN` (`RS_AKR_PENTAHAPAN`),
  KEY `RS_AKR_STATUS` (`RS_AKR_STATUS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`RS_NOREG`, `RS_TGL_REG`, `RS_NAMA`, `RS_JENIS`, `RS_KELAS`, `RS_NAMA_DIREKTUR`, `RS_PENYELENGGARA`, `RS_STATUS_PENYELENGGARA`, `RS_ALAMAT`, `RS_KAB`, `RS_KODEPOS`, `RS_TELP`, `RS_FAX`, `RS_EMAIL`, `RS_TELP_HUMAS`, `RS_WEBSITE`, `RS_LUAS_LAHAN`, `RS_LUAS_BANGUNAN`, `RS_SIO_NOMOR`, `RS_SIO_TGL`, `RS_SIO_OLEH`, `RS_SIO_SIFAT`, `RS_SIO_MASABERLAKU`, `RS_SPK_NOMOR`, `RS_SPK_TGL`, `RS_SPK_OLEH`, `RS_SPK_SIFAT`, `RS_SPK_MASABERLAKU`, `RS_AKREDITASI`, `RS_AKR_PENTAHAPAN`, `RS_AKR_STATUS`, `RS_TGL_AKREDITASI`, `RS_STRENGTH`, `RS_WEAKNESS`) VALUES
('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_growth_rate`
--

CREATE TABLE IF NOT EXISTS `sales_growth_rate` (
  `SGR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SGR_TAHUN` int(11) NOT NULL,
  `SGR_PENDAPATAN_TAHUN_INI` float DEFAULT NULL,
  `SGR_PENDAPATAN_TAHUN_LALU` float DEFAULT NULL,
  `SGR_PERBANDINGAN` float DEFAULT NULL,
  `SGR_SGR` float DEFAULT NULL,
  PRIMARY KEY (`SGR_ID`),
  KEY `FK_RELATIONSHIP_109` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `SGR_TAHUN` (`SGR_TAHUN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales_growth_rate`
--

INSERT INTO `sales_growth_rate` (`SGR_ID`, `TAHUN_ID`, `RS_NOREG`, `SGR_TAHUN`, `SGR_PENDAPATAN_TAHUN_INI`, `SGR_PENDAPATAN_TAHUN_LALU`, `SGR_PERBANDINGAN`, `SGR_SGR`) VALUES
(1, 1, '1', 1, 10, 5, 1, 100),
(2, 1, '1', 2, 20, 10, 1, 100),
(3, 1, '1', 3, 30, 10, 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `sarana_prasarana`
--

CREATE TABLE IF NOT EXISTS `sarana_prasarana` (
  `SARPRAS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_SARPRAS_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SARPRAS_KONDISI` tinyint(1) DEFAULT NULL,
  `SARPRAS_KET` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`SARPRAS_ID`),
  KEY `FK_RELATIONSHIP_108` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_15` (`LIST_SARPRAS_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `sarana_prasarana`
--

INSERT INTO `sarana_prasarana` (`SARPRAS_ID`, `LIST_SARPRAS_ID`, `TAHUN_ID`, `RS_NOREG`, `SARPRAS_KONDISI`, `SARPRAS_KET`) VALUES
(1, 1, 1, '1', 0, 'ket 1'),
(2, 2, 1, '1', 1, 'ket 2'),
(3, 3, 1, '1', 2, 'ket 3'),
(4, 4, 1, '1', 1, 'ket 4'),
(5, 5, 1, '1', 0, 'ket 5'),
(6, 6, 1, '1', 1, 'ket 6'),
(7, 7, 1, '1', 2, 'ket 7'),
(8, 8, 1, '1', 1, 'ket 8'),
(9, 9, 1, '1', 0, 'ket 9'),
(10, 10, 1, '1', 1, 'ket 10'),
(11, 11, 1, '1', 2, 'ket 11'),
(12, 12, 1, '1', 1, 'ket 12'),
(13, 13, 1, '1', 0, 'ket 13'),
(14, 14, 1, '1', 1, 'ket 14'),
(15, 15, 1, '1', 2, 'ket 15'),
(16, 16, 1, '1', 1, 'ket 16'),
(17, 17, 1, '1', 0, 'ket 17'),
(18, 18, 1, '1', 1, 'ket 18'),
(19, 19, 1, '1', 2, 'ket 19'),
(20, 20, 1, '1', 1, 'ket 20'),
(21, 21, 1, '1', 0, 'ket 21'),
(22, 22, 1, '1', 1, 'ket 22'),
(23, 23, 1, '1', 2, 'ket 23'),
(24, 24, 1, '1', 1, 'ket 24'),
(25, 25, 1, '1', 0, 'ket 25'),
(26, 26, 1, '1', 1, 'ket 26'),
(27, 27, 1, '1', 2, 'ket 27'),
(28, 28, 1, '1', 1, 'ket 28'),
(29, 29, 1, '1', 0, 'ket 29'),
(30, 30, 1, '1', 1, 'ket 30'),
(31, 31, 1, '1', 2, 'ket 31'),
(32, 32, 1, '1', 1, 'ket 32'),
(33, 33, 1, '1', 0, 'ket 33'),
(34, 34, 1, '1', 1, 'ket 34'),
(35, 35, 1, '1', 2, 'ket 35'),
(36, 36, 1, '1', 1, 'ket 36'),
(37, 37, 1, '1', 0, 'ket 37'),
(38, 38, 1, '1', 1, 'ket 38'),
(39, 39, 1, '1', 2, 'ket 39');

-- --------------------------------------------------------

--
-- Table structure for table `sarpras_hemodialisis`
--

CREATE TABLE IF NOT EXISTS `sarpras_hemodialisis` (
  `HEMO_SARPRAS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_HEMO_SARPRAS_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `HEMO_SARPRAS_KONDISI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`HEMO_SARPRAS_ID`),
  KEY `FK_RELATIONSHIP_116` (`TAHUN_ID`),
  KEY `LIST_HEMO_SARPRAS_ID` (`LIST_HEMO_SARPRAS_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sepuluh_besar_kasus_rujukan`
--

CREATE TABLE IF NOT EXISTS `sepuluh_besar_kasus_rujukan` (
  `SRJKN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SRJKN_KASUS` varchar(250) DEFAULT NULL,
  `SRJKN_PUSKESMAS` int(11) DEFAULT NULL,
  `SRJKN_FASIL_LAIN` int(11) DEFAULT NULL,
  `SRJKN_RS_LAIN` int(11) DEFAULT NULL,
  `SRJKN_KEMBALI_PUSAT` int(11) DEFAULT NULL,
  `SRJKN_KEMBALI_FASLAIN` int(11) DEFAULT NULL,
  `SRJKN_KEMBALI_RS` int(11) DEFAULT NULL,
  `SRJKN_RUJUKAN` int(11) DEFAULT NULL,
  `SRJKN_DATANGSENDIRI` int(11) DEFAULT NULL,
  `SRJKN_DITERIMA_KEMBALI` int(11) DEFAULT NULL,
  PRIMARY KEY (`SRJKN_ID`),
  KEY `FK_RELATIONSHIP_171` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `ICD10_CODE` (`SRJKN_KASUS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sepuluh_besar_penyakit_igd`
--

CREATE TABLE IF NOT EXISTS `sepuluh_besar_penyakit_igd` (
  `PENY_IGD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ICD10_CODE` varchar(10) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PENY_IGD_NAMA` varchar(100) NOT NULL,
  `PENY_IGD_JMLH` int(11) DEFAULT NULL,
  `PENY_IGD_PERSEN` float DEFAULT NULL,
  PRIMARY KEY (`PENY_IGD_ID`),
  KEY `FK_RELATIONSHIP_168` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `ICD10_CODE` (`ICD10_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sepuluh_besar_penyakit_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `sepuluh_besar_penyakit_rawat_inap` (
  `PENY_RI_KODE` int(25) NOT NULL AUTO_INCREMENT,
  `ICD10_CODE` varchar(25) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PENY_RI_NAMA` varchar(250) DEFAULT NULL,
  `PENY_RI_JMLH` int(11) DEFAULT NULL,
  `PENY_RI_PERSENTASE` float DEFAULT NULL,
  PRIMARY KEY (`PENY_RI_KODE`),
  KEY `FK_RELATIONSHIP_186` (`TAHUN_ID`),
  KEY `ICD10_CODE` (`ICD10_CODE`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sepuluh_besar_penyakit_rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `sepuluh_besar_penyakit_rawat_jalan` (
  `PENY_RJ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `ICD10_CODE` varchar(25) DEFAULT NULL,
  `PENY_RJ_NAMA` varchar(100) NOT NULL,
  `PENY_RJ_JUMLAH` int(11) DEFAULT NULL,
  `PENY_RJ_PERSENTASE` float DEFAULT NULL,
  PRIMARY KEY (`PENY_RJ_ID`),
  KEY `FK_RELATIONSHIP_176` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `ICD10_CODE` (`ICD10_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `spm`
--

CREATE TABLE IF NOT EXISTS `spm` (
  `SPM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SPM_KATEGORI_ID` int(25) NOT NULL,
  `SPM_INDIKATOR_ID` int(11) NOT NULL,
  `SPM_STANDAR` float NOT NULL,
  `SPM_NUMERATOR` float DEFAULT NULL,
  `SPM_DENUMERATOR` float DEFAULT NULL,
  `SPM_PENCAPAIAN` float DEFAULT NULL,
  PRIMARY KEY (`SPM_ID`),
  KEY `FK_RELATIONSHIP_229` (`TAHUN_ID`),
  KEY `TAHUN_ID` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `SPM_KATEGORI_ID` (`SPM_KATEGORI_ID`),
  KEY `SPM_INDIKATOR_ID` (`SPM_INDIKATOR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `spm_rs`
--

CREATE TABLE IF NOT EXISTS `spm_rs` (
  `SPM_RS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LSPMRS_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SPM_RS_PEMENUHAN` float NOT NULL,
  `SPM_RS_INDIKATOR` int(11) DEFAULT NULL,
  `SPM_RS_PENCAPAIAN` float DEFAULT NULL,
  PRIMARY KEY (`SPM_RS_ID`),
  KEY `FK_RELATIONSHIP_123` (`LSPMRS_ID`),
  KEY `FK_RELATIONSHIP_129` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `RS_NOREG_2` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `spm_rs`
--

INSERT INTO `spm_rs` (`SPM_RS_ID`, `LSPMRS_ID`, `TAHUN_ID`, `RS_NOREG`, `SPM_RS_PEMENUHAN`, `SPM_RS_INDIKATOR`, `SPM_RS_PENCAPAIAN`) VALUES
(1, 1, 1, '1', 10, 9, 11),
(2, 2, 1, '1', 20, 7, 22),
(3, 3, 1, '1', 30, 15, 33),
(4, 4, 1, '1', 40, 7, 44),
(5, 5, 1, '1', 50, 8, 55),
(6, 6, 1, '1', 60, 2, 66),
(7, 7, 1, '1', 70, 4, 77),
(8, 8, 1, '1', 80, 4, 88),
(9, 9, 1, '1', 90, 3, 99),
(10, 10, 1, '1', 100, 4, 110),
(11, 11, 1, '1', 110, 3, 121),
(12, 12, 1, '1', 120, 2, 132),
(13, 13, 1, '1', 130, 1, 143),
(14, 14, 1, '1', 140, 4, 154),
(15, 15, 1, '1', 150, 2, 165),
(16, 16, 1, '1', 160, 9, 176),
(17, 17, 1, '1', 170, 3, 187),
(18, 18, 1, '1', 180, 1, 198),
(19, 19, 1, '1', 190, 3, 209),
(20, 20, 1, '1', 200, 2, 220),
(21, 21, 1, '1', 210, 3, 231),
(22, 1, 1, '1', 10, 9, 11),
(23, 2, 1, '1', 20, 7, 22),
(24, 3, 1, '1', 30, 15, 33),
(25, 4, 1, '1', 40, 7, 44),
(26, 5, 1, '1', 50, 8, 55),
(27, 6, 1, '1', 60, 2, 66),
(28, 7, 1, '1', 70, 4, 77),
(29, 8, 1, '1', 80, 4, 88),
(30, 9, 1, '1', 90, 3, 99),
(31, 10, 1, '1', 100, 4, 110),
(32, 11, 1, '1', 110, 3, 121),
(33, 12, 1, '1', 120, 2, 132),
(34, 13, 1, '1', 130, 1, 143),
(35, 14, 1, '1', 140, 4, 154),
(36, 15, 1, '1', 150, 2, 165),
(37, 16, 1, '1', 160, 9, 176),
(38, 17, 1, '1', 170, 3, 187),
(39, 18, 1, '1', 180, 1, 198),
(40, 19, 1, '1', 190, 3, 209),
(41, 20, 1, '1', 200, 2, 220),
(42, 21, 1, '1', 210, 3, 231);

-- --------------------------------------------------------

--
-- Table structure for table `status_akreditasi_rs`
--

CREATE TABLE IF NOT EXISTS `status_akreditasi_rs` (
  `akreditasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `akreditasi_rs_status` varchar(200) NOT NULL,
  PRIMARY KEY (`akreditasi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status_akreditasi_rs`
--

INSERT INTO `status_akreditasi_rs` (`akreditasi_id`, `akreditasi_rs_status`) VALUES
(1, 'Penuh'),
(2, 'Bersyarat'),
(3, 'Gagal');

-- --------------------------------------------------------

--
-- Table structure for table `status_penyelenggara_rs`
--

CREATE TABLE IF NOT EXISTS `status_penyelenggara_rs` (
  `status_rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_rs` varchar(200) NOT NULL,
  PRIMARY KEY (`status_rs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `status_penyelenggara_rs`
--

INSERT INTO `status_penyelenggara_rs` (`status_rs_id`, `status_rs`) VALUES
(1, 'Islam'),
(2, 'Katholik'),
(3, 'Protestan'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Organisasi Sosial'),
(7, 'Perusahaan'),
(8, 'Perorangan');

-- --------------------------------------------------------

--
-- Table structure for table `survey_pelanggan`
--

CREATE TABLE IF NOT EXISTS `survey_pelanggan` (
  `SURVEY_PELANGGAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UNIT_SURVEY_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `SURVEY_PELANGGAN_NILAI` float DEFAULT NULL,
  PRIMARY KEY (`SURVEY_PELANGGAN_ID`),
  KEY `FK_RELATIONSHIP_130` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_64` (`UNIT_SURVEY_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `survey_pelanggan`
--

INSERT INTO `survey_pelanggan` (`SURVEY_PELANGGAN_ID`, `UNIT_SURVEY_ID`, `TAHUN_ID`, `RS_NOREG`, `SURVEY_PELANGGAN_NILAI`) VALUES
(1, 1, 1, '1', -14),
(2, 2, 1, '1', -12),
(3, 3, 1, '1', -10),
(4, 4, 1, '1', -8),
(5, 5, 1, '1', -6),
(6, 6, 1, '1', -4),
(7, 7, 1, '1', -2),
(8, 8, 1, '1', 0),
(9, 9, 1, '1', 2),
(10, 10, 1, '1', 4),
(11, 11, 1, '1', 6),
(12, 12, 1, '1', 8),
(13, 13, 1, '1', 10),
(14, 14, 1, '1', 12),
(15, 15, 1, '1', 14),
(16, 16, 1, '1', 16),
(17, 17, 1, '1', 18),
(18, 18, 1, '1', 20),
(19, 19, 1, '1', 22),
(20, 20, 1, '1', 24),
(21, 21, 1, '1', 26),
(22, 22, 1, '1', 28),
(23, 23, 1, '1', 30),
(24, 24, 1, '1', 32),
(25, 25, 1, '1', 34),
(26, 26, 1, '1', 36),
(27, 27, 1, '1', 38),
(28, 28, 1, '1', 40),
(29, 29, 1, '1', 42),
(30, 30, 1, '1', 44),
(31, 31, 1, '1', 46),
(32, 32, 1, '1', 48),
(33, 33, 1, '1', 50),
(34, 34, 1, '1', 52),
(35, 35, 1, '1', 54),
(36, 36, 1, '1', 56),
(37, 37, 1, '1', 58),
(38, 38, 1, '1', 60),
(39, 39, 1, '1', 62),
(40, 40, 1, '1', 64),
(41, 41, 1, '1', 66),
(42, 42, 1, '1', 68),
(43, 43, 1, '1', 70),
(44, 44, 1, '1', 72),
(45, 45, 1, '1', 74),
(46, 46, 1, '1', 76),
(47, 47, 1, '1', 78),
(48, 48, 1, '1', 80),
(49, 49, 1, '1', 82),
(50, 50, 1, '1', 84),
(51, 51, 1, '1', 86),
(52, 52, 1, '1', 88),
(53, 53, 1, '1', 90),
(54, 54, 1, '1', 92),
(55, 55, 1, '1', 94),
(56, 56, 1, '1', 96),
(57, 57, 1, '1', 98),
(58, 58, 1, '1', 100),
(59, 59, 1, '1', 102),
(60, 60, 1, '1', 104),
(61, 61, 1, '1', 106),
(62, 62, 1, '1', 108),
(63, 63, 1, '1', 110),
(64, 64, 1, '1', 112),
(65, 65, 1, '1', 114),
(66, 66, 1, '1', 116),
(67, 67, 1, '1', 118),
(68, 68, 1, '1', 120),
(69, 69, 1, '1', 122),
(70, 70, 1, '1', 124),
(71, 71, 1, '1', 126),
(72, 72, 1, '1', 128),
(73, 73, 1, '1', 130),
(74, 74, 1, '1', 132),
(75, 75, 1, '1', 134),
(76, 1, 1, '1', -14),
(77, 2, 1, '1', -12),
(78, 3, 1, '1', -10),
(79, 4, 1, '1', -8),
(80, 5, 1, '1', -6),
(81, 6, 1, '1', -4),
(82, 7, 1, '1', -2),
(83, 8, 1, '1', 0),
(84, 9, 1, '1', 2),
(85, 10, 1, '1', 4),
(86, 11, 1, '1', 6),
(87, 12, 1, '1', 8),
(88, 13, 1, '1', 10),
(89, 14, 1, '1', 12),
(90, 15, 1, '1', 14),
(91, 16, 1, '1', 16),
(92, 17, 1, '1', 18),
(93, 18, 1, '1', 20),
(94, 19, 1, '1', 22),
(95, 20, 1, '1', 24),
(96, 21, 1, '1', 26),
(97, 22, 1, '1', 28),
(98, 23, 1, '1', 30),
(99, 24, 1, '1', 32),
(100, 25, 1, '1', 34),
(101, 26, 1, '1', 36),
(102, 27, 1, '1', 38),
(103, 28, 1, '1', 40),
(104, 29, 1, '1', 42),
(105, 30, 1, '1', 44),
(106, 31, 1, '1', 46),
(107, 32, 1, '1', 48),
(108, 33, 1, '1', 50),
(109, 34, 1, '1', 52),
(110, 35, 1, '1', 54),
(111, 36, 1, '1', 56),
(112, 37, 1, '1', 58),
(113, 38, 1, '1', 60),
(114, 39, 1, '1', 62),
(115, 40, 1, '1', 64),
(116, 41, 1, '1', 66),
(117, 42, 1, '1', 68),
(118, 43, 1, '1', 70),
(119, 44, 1, '1', 72),
(120, 45, 1, '1', 74),
(121, 46, 1, '1', 76),
(122, 47, 1, '1', 78),
(123, 48, 1, '1', 80),
(124, 49, 1, '1', 82),
(125, 50, 1, '1', 84),
(126, 51, 1, '1', 86),
(127, 52, 1, '1', 88),
(128, 53, 1, '1', 90),
(129, 54, 1, '1', 92),
(130, 55, 1, '1', 94),
(131, 56, 1, '1', 96),
(132, 57, 1, '1', 98),
(133, 58, 1, '1', 100),
(134, 59, 1, '1', 102),
(135, 60, 1, '1', 104),
(136, 61, 1, '1', 106),
(137, 62, 1, '1', 108),
(138, 63, 1, '1', 110),
(139, 64, 1, '1', 112),
(140, 65, 1, '1', 114),
(141, 66, 1, '1', 116),
(142, 67, 1, '1', 118),
(143, 68, 1, '1', 120),
(144, 69, 1, '1', 122),
(145, 70, 1, '1', 124),
(146, 71, 1, '1', 126),
(147, 72, 1, '1', 128),
(148, 73, 1, '1', 130),
(149, 74, 1, '1', 132),
(150, 75, 1, '1', 134);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
  `TAHUN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_TAHUN` int(11) DEFAULT NULL,
  PRIMARY KEY (`TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`TAHUN_ID`, `TAHUN_TAHUN`) VALUES
(1, 2013),
(2, 2010),
(3, 2011),
(4, 2012),
(5, 2014),
(6, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_medik_hemodialisis`
--

CREATE TABLE IF NOT EXISTS `tenaga_medik_hemodialisis` (
  `HEMO_TENAGA_MEDIK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_HEMO_TENAGA_MEDIK_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `HEMO_TENAGA_MEDIK_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`HEMO_TENAGA_MEDIK_ID`),
  KEY `FK_RELATIONSHIP_113` (`LIST_HEMO_TENAGA_MEDIK_ID`),
  KEY `FK_RELATIONSHIP_117` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_terbanyak_maskin`
--

CREATE TABLE IF NOT EXISTS `tindakan_terbanyak_maskin` (
  `TM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `LIST_TAHUN_ID` int(11) NOT NULL,
  `TM_JENIS_TINDAKAN` varchar(200) DEFAULT NULL,
  `TM_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`TM_ID`),
  KEY `FK_RELATIONSHIP_256` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`),
  KEY `LIST_TAHUN_ID` (`LIST_TAHUN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_efisiensi_rs`
--

CREATE TABLE IF NOT EXISTS `tingkat_efisiensi_rs` (
  `EFF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `DEFF_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `EFF_NILAI_N2` float NOT NULL,
  `EFF_NILAI_N1` float NOT NULL,
  `EFF_NILAI_N` float DEFAULT NULL,
  `EFF_RERATA` float DEFAULT NULL,
  PRIMARY KEY (`EFF_ID`),
  KEY `FK_RELATIONSHIP_11` (`DEFF_ID`),
  KEY `FK_RELATIONSHIP_95` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tingkat_efisiensi_rs`
--

INSERT INTO `tingkat_efisiensi_rs` (`EFF_ID`, `TAHUN_ID`, `DEFF_ID`, `RS_NOREG`, `EFF_NILAI_N2`, `EFF_NILAI_N1`, `EFF_NILAI_N`, `EFF_RERATA`) VALUES
(1, 1, 1, '1', 12, 13, 14, 15),
(2, 1, 2, '1', 13, 14, 15, 16),
(3, 1, 3, '1', 14, 15, 16, 17),
(4, 1, 4, '1', 15, 16, 17, 18),
(5, 1, 5, '1', 16, 17, 18, 19),
(6, 1, 6, '1', 17, 18, 19, 20),
(7, 1, 7, '1', 18, 19, 20, 21),
(8, 1, 8, '1', 19, 20, 21, 22),
(9, 1, 9, '1', 20, 21, 22, 23),
(10, 1, 10, '1', 21, 22, 23, 24),
(11, 1, 11, '1', 22, 23, 24, 25);

-- --------------------------------------------------------

--
-- Table structure for table `upaya_perbaikan_maskin`
--

CREATE TABLE IF NOT EXISTS `upaya_perbaikan_maskin` (
  `PERBAIKANMASKIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `PERBAIKANMASKIN_URAIAN` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`PERBAIKANMASKIN_ID`),
  KEY `FK_RELATIONSHIP_254` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@root.com');

-- --------------------------------------------------------

--
-- Table structure for table `vct_cst`
--

CREATE TABLE IF NOT EXISTS `vct_cst` (
  `VCT_CST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GOLONGAN_UMUR_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `VCT_JUMLAHTOTAL` int(11) DEFAULT NULL,
  `VCT_NEGATIF` int(11) DEFAULT NULL,
  `VCT_POSITIF` int(11) DEFAULT NULL,
  `CST_JUMLAHTOTAL` int(11) DEFAULT NULL,
  `CST_ARV` int(11) DEFAULT NULL,
  PRIMARY KEY (`VCT_CST_ID`),
  KEY `FK_RELATIONSHIP_135` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_66` (`GOLONGAN_UMUR_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `vct_cst`
--

INSERT INTO `vct_cst` (`VCT_CST_ID`, `GOLONGAN_UMUR_ID`, `TAHUN_ID`, `RS_NOREG`, `VCT_JUMLAHTOTAL`, `VCT_NEGATIF`, `VCT_POSITIF`, `CST_JUMLAHTOTAL`, `CST_ARV`) VALUES
(1, 1, 1, '1', 21, 31, 41, 51, 61),
(2, 2, 1, '1', 31, 41, 51, 61, 71),
(3, 3, 1, '1', 41, 51, 61, 71, 81),
(4, 4, 1, '1', 51, 61, 71, 81, 91),
(5, 5, 1, '1', 61, 71, 81, 91, 101),
(6, 6, 1, '1', 71, 81, 91, 101, 111),
(7, 7, 1, '1', 81, 91, 101, 111, 121),
(8, 1, 1, '1', 21, 31, 41, 51, 61),
(9, 2, 1, '1', 31, 41, 51, 61, 71),
(10, 3, 1, '1', 41, 51, 61, 71, 81),
(11, 4, 1, '1', 51, 61, 71, 81, 91),
(12, 5, 1, '1', 61, 71, 81, 91, 101),
(13, 6, 1, '1', 71, 81, 91, 101, 111),
(14, 7, 1, '1', 81, 91, 101, 111, 121),
(15, 1, 1, '1', 21, 31, 41, 51, 61),
(16, 2, 1, '1', 31, 41, 51, 61, 71),
(17, 3, 1, '1', 41, 51, 61, 71, 81),
(18, 4, 1, '1', 51, 61, 71, 81, 91),
(19, 5, 1, '1', 61, 71, 81, 91, 101),
(20, 6, 1, '1', 71, 81, 91, 101, 111),
(21, 7, 1, '1', 81, 91, 101, 111, 121);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analisa`
--
ALTER TABLE `analisa`
  ADD CONSTRAINT `analisa_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `analisa_ibfk_2` FOREIGN KEY (`ANALISA_KATEGORI_ID`) REFERENCES `list_analisa` (`list_analisa_id`),
  ADD CONSTRAINT `analisa_ibfk_3` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `analisa_ketenagaan`
--
ALTER TABLE `analisa_ketenagaan`
  ADD CONSTRAINT `analisa_ketenagaan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `analisa_ketenagaan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_105` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `analisa_rasio_keuangan`
--
ALTER TABLE `analisa_rasio_keuangan`
  ADD CONSTRAINT `analisa_rasio_keuangan_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `analisa_rasio_keuangan_ibfk_3` FOREIGN KEY (`LIST_ANALISA_RK_ID`) REFERENCES `list_rasio_keuangan` (`list_rk_id`),
  ADD CONSTRAINT `FK_RELATIONSHIP_112` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `cost_recovery`
--
ALTER TABLE `cost_recovery`
  ADD CONSTRAINT `cost_recovery_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `cost_recovery_ibfk_2` FOREIGN KEY (`LIST_CR_ID`) REFERENCES `list_cost_recovery` (`list_cr_id`),
  ADD CONSTRAINT `FK_RELATIONSHIP_110` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `dbd_baru_dan_pulang`
--
ALTER TABLE `dbd_baru_dan_pulang`
  ADD CONSTRAINT `FK_RELATIONSHIP_72` FOREIGN KEY (`DBD_DIAGNOSIS_ID`) REFERENCES `dbd_diagnosis` (`DBD_DIAGNOSIS_ID`);

--
-- Constraints for table `diagnosis_kematian_rawat_inap`
--
ALTER TABLE `diagnosis_kematian_rawat_inap`
  ADD CONSTRAINT `diagnosis_kematian_rawat_inap_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `diagnosis_kematian_rawat_inap_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `diagnosis_kematian_rawat_inap_ibfk_3` FOREIGN KEY (`ICD10_CODE`) REFERENCES `icd10` (`ICD10_CODE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_184` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `hasil_pelayanan_perinatologi`
--
ALTER TABLE `hasil_pelayanan_perinatologi`
  ADD CONSTRAINT `hasil_pelayanan_perinatologi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `hasil_pelayanan_perinatologi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `hasil_pelayanan_perinatologi_ibfk_3` FOREIGN KEY (`PPR_ID`) REFERENCES `list_pelayanan_perinatologi` (`PPR_ID`);

--
-- Constraints for table `hasil_pelayanan_persalinan`
--
ALTER TABLE `hasil_pelayanan_persalinan`
  ADD CONSTRAINT `hasil_pelayanan_persalinan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `hasil_pelayanan_persalinan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `hasil_pelayanan_persalinan_ibfk_3` FOREIGN KEY (`PP_ID`) REFERENCES `list_pelayanan_persalinan` (`PP_ID`);

--
-- Constraints for table `hasil_survey_maskin`
--
ALTER TABLE `hasil_survey_maskin`
  ADD CONSTRAINT `FK_RELATIONSHIP_251` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `hasil_survey_maskin_ibfk_1` FOREIGN KEY (`P_MASKIN_ID`) REFERENCES `pelayanan_maskin` (`P_MASKIN_ID`),
  ADD CONSTRAINT `hasil_survey_maskin_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `hiv`
--
ALTER TABLE `hiv`
  ADD CONSTRAINT `FK_RELATIONSHIP_127` FOREIGN KEY (`GOLONGAN_UMUR_ID`) REFERENCES `list_golongan_umur` (`GOLONGAN_UMUR_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_136` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `hiv_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
