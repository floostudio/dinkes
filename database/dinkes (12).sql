-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2014 at 06:23 AM
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
  `AT_NILAI` float DEFAULT NULL,
  PRIMARY KEY (`AT_ID`),
  KEY `FK_RELATIONSHIP_105` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dbd`
--

CREATE TABLE IF NOT EXISTS `dbd` (
  `DBD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `DBD_DIAGNOSIS_ID` int(11) DEFAULT NULL,
  `DBD_DEWASA_L` int(11) DEFAULT NULL,
  `DBD_DEWASA_P` int(11) DEFAULT NULL,
  `DBD_ANAK_L` int(11) DEFAULT NULL,
  `DBD_ANAK_P` int(11) DEFAULT NULL,
  `DBD_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`DBD_ID`),
  KEY `FK_RELATIONSHIP_137` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_71` (`DBD_DIAGNOSIS_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dbd_baru_dan_pulang`
--

CREATE TABLE IF NOT EXISTS `dbd_baru_dan_pulang` (
  `DBD_II_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
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
  KEY `FK_RELATIONSHIP_138` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_72` (`DBD_DIAGNOSIS_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `HIV_JUMLAH_N2` int(11) DEFAULT NULL,
  `HIV_JUMLAH_N1` int(11) NOT NULL,
  `HIV_JUMLAH_N` int(11) NOT NULL,
  PRIMARY KEY (`HIV_ID`),
  KEY `FK_RELATIONSHIP_127` (`GOLONGAN_UMUR_ID`),
  KEY `FK_RELATIONSHIP_136` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `jumlah_peralatan_radiologi_rs`
--

CREATE TABLE IF NOT EXISTS `jumlah_peralatan_radiologi_rs` (
  `JUMLAH_PERALATAN_RADIOLOGI_RS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERALATAN_RAD_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JUMLAH_PERALATAN_RADIOLOGI_RS_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`JUMLAH_PERALATAN_RADIOLOGI_RS_ID`),
  KEY `FK_RELATIONSHIP_119` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_62` (`PERALATAN_RAD_ID`),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kasus_tb_ri_jenis`
--

CREATE TABLE IF NOT EXISTS `kasus_tb_ri_jenis` (
  `KASUS_TB_RI_JENIS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JENIS_TB_ID` int(11) DEFAULT NULL,
  `KASUS_TB_RJ_JENIS_N2` int(11) DEFAULT NULL,
  `KASUS_TB_RI_JENIS_N1` int(11) NOT NULL,
  `KASUS_TB_RI_JENIS_N` int(11) NOT NULL,
  PRIMARY KEY (`KASUS_TB_RI_JENIS_ID`),
  KEY `FK_RELATIONSHIP_134` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_70` (`JENIS_TB_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `kelayakan_peralatan`
--

CREATE TABLE IF NOT EXISTS `kelayakan_peralatan` (
  `KLPR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KLPR_KALIBRASI_JML` int(11) DEFAULT NULL,
  `KLPR_KALIBRASI_STANDAR` int(11) DEFAULT NULL,
  `KLPR_KALIBRASI_NILAI` float DEFAULT NULL,
  `KLPR_FUNGSI_JML` int(11) DEFAULT NULL,
  `KLPR_FUNGSI_STANDAR` int(11) DEFAULT NULL,
  `KLPR_FUNGSI_NILAI` int(11) DEFAULT NULL,
  PRIMARY KEY (`KLPR_ID`),
  KEY `FK_RELATIONSHIP_266` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kelayakan_ruangan`
--

CREATE TABLE IF NOT EXISTS `kelayakan_ruangan` (
  `KR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KR_JUMLAH` int(11) DEFAULT NULL,
  `KR_STANDAR` int(11) DEFAULT NULL,
  `KR_NILAI` float DEFAULT NULL,
  PRIMARY KEY (`KR_ID`),
  KEY `FK_RELATIONSHIP_102` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `KPR_JML` int(11) DEFAULT NULL,
  `KPR_STANDAR` int(11) DEFAULT NULL,
  `KPR_NILAI` float DEFAULT NULL,
  PRIMARY KEY (`KPR_ID`),
  KEY `FK_RELATIONSHIP_100` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `kematian_ibu`
--

CREATE TABLE IF NOT EXISTS `kematian_ibu` (
  `JKI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JKI_IBUHAMIL_RUJUKAN` int(11) DEFAULT NULL,
  `JKI_IBUHAMIL_DTGSENDIRI` int(11) DEFAULT NULL,
  `JKI_IBUBERSALIN_RUJUKAN` int(11) DEFAULT NULL,
  `JKI_IBUBERHASIL_DTGSENDIRI` int(11) DEFAULT NULL,
  `JKI_IBUNIFAS_RSLAIN` int(11) DEFAULT NULL,
  `JKI_IBUNIFAS_RS` int(11) DEFAULT NULL,
  `JKI_TOTAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`JKI_ID`),
  KEY `FK_RELATIONSHIP_139` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kematian_ibu_karena_persalinan`
--

CREATE TABLE IF NOT EXISTS `kematian_ibu_karena_persalinan` (
  `KIP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRIBULAN_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `KIP_TOTAL` int(11) DEFAULT NULL,
  `KIP_PENDARAHAN` int(11) DEFAULT NULL,
  `KIP_EKLAMPSIA` int(11) DEFAULT NULL,
  `KIP_SEPSIS` int(11) DEFAULT NULL,
  PRIMARY KEY (`KIP_ID`),
  KEY `FK_RELATIONSHIP_128` (`TRIBULAN_ID`),
  KEY `FK_RELATIONSHIP_141` (`TAHUN_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kematian_ibu_per_faktor`
--

CREATE TABLE IF NOT EXISTS `kematian_ibu_per_faktor` (
  `JKIF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKI_ID` int(11) DEFAULT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `JKIF_FAKTOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`JKIF_ID`),
  KEY `FK_RELATIONSHIP_140` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_73` (`SKI_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `KETENAGAAN_STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`KETENAGAAN_ID`),
  KEY `FK_RELATIONSHIP_106` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_17` (`LK_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `list_analisa`
--

INSERT INTO `list_analisa` (`list_analisa_id`, `list_analisa_nama`) VALUES
(1, 'ADMIN'),
(2, 'AMBULANS'),
(3, 'BEDAH'),
(4, 'DALIN'),
(5, 'PELAYANAN FARMASI'),
(6, 'SPM FARMASI'),
(7, 'PERMASALAHAN FARMASI'),
(8, 'PELAYANAN GIZI'),
(9, 'MUTU GIZI'),
(10, 'SPM GIZI'),
(11, 'MASALAH GIZI'),
(12, 'PELAYANAN KB'),
(13, 'SPM LAB'),
(14, 'MASALAH LAB'),
(15, 'SPM LAUNDRY'),
(16, 'SPM LIMBAH'),
(17, 'PELAYANAN LIMBAH'),
(18, 'MASALAH LIMBAH'),
(19, 'SPM PERI NEO'),
(20, 'SPM MASALAH'),
(21, 'PELAYANAN RADIOLOGI'),
(22, 'SPM RADIOLOGI'),
(23, 'SPM RADIOLOGI'),
(24, 'MASALAH RADIOLOGI'),
(25, '10 BESAR RAWAT INAP'),
(26, 'SPM REKAM MEDIK'),
(27, 'MASALAH REKAM MEDIK'),
(28, 'SPM SARANA'),
(29, 'ANALISA SPM RS'),
(30, 'ANALISA SURVEY MASKIN'),
(31, 'ANALISA SURVEY RS'),
(32, 'ANALISA SPM TRANSFUSI'),
(33, 'ANALISA EFESIENSI DAN MUTU PENGELOLAAN'),
(34, 'ANALISA SGR'),
(35, 'analisa cost recovery'),
(36, 'ANALISA RASIO KEUANGAN'),
(37, 'Sarpras- Kelengkapan Peralatan'),
(38, 'Sarpras- Kelayakan Peralatan'),
(39, 'Sarpras- Kelayakan Ruangan');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_kategori_permasalahan`
--

CREATE TABLE IF NOT EXISTS `list_kategori_permasalahan` (
  `KAT_PERMASALAHAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KAT_PERMASALAHAN_NAMA` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`KAT_PERMASALAHAN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_persalinan`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_persalinan` (
  `PP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PP_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_radiologi`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_radiologi` (
  `P_RADIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_RADIO_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`P_RADIO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_pelayanan_rawat_inap`
--

CREATE TABLE IF NOT EXISTS `list_pelayanan_rawat_inap` (
  `PEL_RI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEL_RI_NAMA` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PEL_RI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_pemeriksaan_sanitasi`
--

CREATE TABLE IF NOT EXISTS `list_pemeriksaan_sanitasi` (
  `LIST_SANITASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIST_SANITASI_NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`LIST_SANITASI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(19, 'Generator Set', 'A');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `list_tipe_pasien_tb`
--

INSERT INTO `list_tipe_pasien_tb` (`TIPE_TB`, `TIPE_NAMA`) VALUES
(1, 'BTA Positif'),
(2, 'BTA Negatif/ Ro Pos'),
(3, 'Extra Paru'),
(4, 'Sub Total Pasien Baru'),
(5, 'Total Pasien Baru'),
(6, 'Kambuh'),
(7, 'Defaulter'),
(8, 'Gagal'),
(9, 'Kronik'),
(10, 'Lain-lain'),
(11, 'Sub Total Pasien Pengobatan Ulang'),
(12, 'Total Pasien Pengobatan Ulang'),
(13, 'Total'),
(14, 'Total Keseluruhan'),
(15, 'Total Keseluruhan (L+P)');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mdgs5_peralatan_maternal_essensial`
--

CREATE TABLE IF NOT EXISTS `mdgs5_peralatan_maternal_essensial` (
  `PM_ID` int(11) NOT NULL,
  `TAHUN_ID` int(11) DEFAULT NULL,
  `RS_NOREG` varchar(25) NOT NULL,
  `MATERNAL_ESSENSIAL_ID` int(11) DEFAULT NULL,
  `PM_JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PM_ID`),
  KEY `FK_RELATIONSHIP_156` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_75` (`MATERNAL_ESSENSIAL_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `HEMODIALIS_BYR_ANALISA` text,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status_akreditasi_rs`
--

CREATE TABLE IF NOT EXISTS `status_akreditasi_rs` (
  `akreditasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `akreditasi_rs_status` varchar(200) NOT NULL,
  PRIMARY KEY (`akreditasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status_penyeenggara_rs`
--

CREATE TABLE IF NOT EXISTS `status_penyeenggara_rs` (
  `status_rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_rs` varchar(200) NOT NULL,
  PRIMARY KEY (`status_rs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `SURVEY_PELANGGAN_RERATA` float DEFAULT NULL,
  PRIMARY KEY (`SURVEY_PELANGGAN_ID`),
  KEY `FK_RELATIONSHIP_130` (`TAHUN_ID`),
  KEY `FK_RELATIONSHIP_64` (`UNIT_SURVEY_ID`),
  KEY `RS_NOREG` (`RS_NOREG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
  `TAHUN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_TAHUN` int(11) DEFAULT NULL,
  PRIMARY KEY (`TAHUN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`TAHUN_ID`, `TAHUN_TAHUN`) VALUES
(1, 2013);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Constraints for table `dbd`
--
ALTER TABLE `dbd`
  ADD CONSTRAINT `dbd_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `FK_RELATIONSHIP_137` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_71` FOREIGN KEY (`DBD_DIAGNOSIS_ID`) REFERENCES `dbd_diagnosis` (`DBD_DIAGNOSIS_ID`);

--
-- Constraints for table `dbd_baru_dan_pulang`
--
ALTER TABLE `dbd_baru_dan_pulang`
  ADD CONSTRAINT `dbd_baru_dan_pulang_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `FK_RELATIONSHIP_138` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
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

--
-- Constraints for table `igd`
--
ALTER TABLE `igd`
  ADD CONSTRAINT `FK_RELATIONSHIP_94` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `igd_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_238` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_59` FOREIGN KEY (`JENIS_IMUNISASI_ID`) REFERENCES `list_jenis_imunisasi` (`JENIS_IMUNISASI_ID`),
  ADD CONSTRAINT `imunisasi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `imunisasi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `indikator_klinik_kegiatan_rawat_inap`
--
ALTER TABLE `indikator_klinik_kegiatan_rawat_inap`
  ADD CONSTRAINT `FK_RELATIONSHIP_183` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `indikator_klinik_kegiatan_rawat_inap_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `indikator_klinik_kegiatan_rawat_inap_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `indikator_klinik_kegiatan_rawat_inap_ibfk_3` FOREIGN KEY (`IKRI_ID`) REFERENCES `list_indikator_klinik_ri` (`IKRI_ID`);

--
-- Constraints for table `iri`
--
ALTER TABLE `iri`
  ADD CONSTRAINT `FK_RELATIONSHIP_96` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `iri_ibfk_1` FOREIGN KEY (`KATEGORI_PASIEN_ID`) REFERENCES `list_pasien_rawat_inap` (`PRI_ID`),
  ADD CONSTRAINT `iri_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `irj`
--
ALTER TABLE `irj`
  ADD CONSTRAINT `FK_RELATIONSHIP_98` FOREIGN KEY (`TAHUN_id`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `irj_ibfk_1` FOREIGN KEY (`rs_noreg`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `irj_ibfk_2` FOREIGN KEY (`pasien_kategori_id`) REFERENCES `list_pasien_rawat_jalan` (`LIST_PASIEN_ID`);

--
-- Constraints for table `jumlah_ambulans_rs`
--
ALTER TABLE `jumlah_ambulans_rs`
  ADD CONSTRAINT `FK_RELATIONSHIP_90` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `jumlah_kunjungan_radiologi`
--
ALTER TABLE `jumlah_kunjungan_radiologi`
  ADD CONSTRAINT `jumlah_kunjungan_radiologi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `jumlah_kunjungan_radiologi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `jumlah_kunjungan_radiologi_ibfk_3` FOREIGN KEY (`P_RADIO_ID`) REFERENCES `list_pelayanan_radiologi` (`P_RADIO_ID`);

--
-- Constraints for table `jumlah_operasi_bedah`
--
ALTER TABLE `jumlah_operasi_bedah`
  ADD CONSTRAINT `jumlah_operasi_bedah_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `jumlah_operasi_bedah_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `jumlah_operasi_bedah_ibfk_3` FOREIGN KEY (`JENIS_OPERASI_ID`) REFERENCES `list_jenis_operasi` (`JENIS_OPERASI_ID`);

--
-- Constraints for table `jumlah_peralatan_radiologi_rs`
--
ALTER TABLE `jumlah_peralatan_radiologi_rs`
  ADD CONSTRAINT `FK_RELATIONSHIP_119` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_62` FOREIGN KEY (`PERALATAN_RAD_ID`) REFERENCES `list_peralatan_radiologi` (`PERALATAN_RAD_ID`),
  ADD CONSTRAINT `jumlah_peralatan_radiologi_rs_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `jumlah_peralatan_radiologi_rs_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `jumlah_tenaga_igd`
--
ALTER TABLE `jumlah_tenaga_igd`
  ADD CONSTRAINT `FK_RELATIONSHIP_166` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`IGDLIST_ID`) REFERENCES `list_tenaga_igd` (`IGDLIST_ID`),
  ADD CONSTRAINT `jumlah_tenaga_igd_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `jumlah_tenaga_igd_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `kapasitas_tempat_tidur`
--
ALTER TABLE `kapasitas_tempat_tidur`
  ADD CONSTRAINT `FK_RELATIONSHIP_77` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `FK_RELATIONSHIP_89` FOREIGN KEY (`JENIS_TT_ID`) REFERENCES `list_jenis_tempat_tidur` (`JENIS_TT_ID`);

--
-- Constraints for table `kasus_tb_ri`
--
ALTER TABLE `kasus_tb_ri`
  ADD CONSTRAINT `FK_RELATIONSHIP_132` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_87` FOREIGN KEY (`GOLONGAN_UMUR_ID`) REFERENCES `list_golongan_umur` (`GOLONGAN_UMUR_ID`),
  ADD CONSTRAINT `kasus_tb_ri_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `kasus_tb_ri_jenis`
--
ALTER TABLE `kasus_tb_ri_jenis`
  ADD CONSTRAINT `FK_RELATIONSHIP_134` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_70` FOREIGN KEY (`JENIS_TB_ID`) REFERENCES `list_jenis_tb` (`JENIS_TB_ID`),
  ADD CONSTRAINT `kasus_tb_ri_jenis_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `kasus_tb_rj`
--
ALTER TABLE `kasus_tb_rj`
  ADD CONSTRAINT `FK_RELATIONSHIP_131` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_65` FOREIGN KEY (`GOLONGAN_UMUR_ID`) REFERENCES `list_golongan_umur` (`GOLONGAN_UMUR_ID`),
  ADD CONSTRAINT `kasus_tb_rj_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `kasus_tb_rj_jenis`
--
ALTER TABLE `kasus_tb_rj_jenis`
  ADD CONSTRAINT `FK_RELATIONSHIP_133` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_67` FOREIGN KEY (`JENIS_TB_ID`) REFERENCES `list_jenis_tb` (`JENIS_TB_ID`),
  ADD CONSTRAINT `kasus_tb_rj_jenis_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `kebutuhan_tenaga`
--
ALTER TABLE `kebutuhan_tenaga`
  ADD CONSTRAINT `FK_RELATIONSHIP_104` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kebutuhan_tenaga_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kebutuhan_tenaga_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kebutuhan_tenaga_ibfk_3` FOREIGN KEY (`LIST_TM_ID`) REFERENCES `list_jenis_tenaga_medis` (`LIST_TM_ID`);

--
-- Constraints for table `kegiatan_kesehatan_jiwa`
--
ALTER TABLE `kegiatan_kesehatan_jiwa`
  ADD CONSTRAINT `kegiatan_kesehatan_jiwa_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kegiatan_kesehatan_jiwa_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kegiatan_kesehatan_jiwa_ibfk_3` FOREIGN KEY (`LIST_JIWA_ID`) REFERENCES `list_kegiatan_jiwa` (`LIST_JIWA_ID`);

--
-- Constraints for table `kegiatan_rawat_inap`
--
ALTER TABLE `kegiatan_rawat_inap`
  ADD CONSTRAINT `FK_RELATIONSHIP_180` FOREIGN KEY (`PEL_RI_ID`) REFERENCES `list_pelayanan_rawat_inap` (`PEL_RI_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_181` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kegiatan_rawat_inap_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kegiatan_rawat_inap_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `kegiatan_rujukan`
--
ALTER TABLE `kegiatan_rujukan`
  ADD CONSTRAINT `kegiatan_rujukan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kegiatan_rujukan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kegiatan_rujukan_ibfk_3` FOREIGN KEY (`SR_ID`) REFERENCES `list_spesialisasi_rujukan` (`SR_ID`);

--
-- Constraints for table `kegiatan_rujukan_igd`
--
ALTER TABLE `kegiatan_rujukan_igd`
  ADD CONSTRAINT `kegiatan_rujukan_igd_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kegiatan_rujukan_igd_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kegiatan_rujukan_igd_ibfk_3` FOREIGN KEY (`LISTRUJUKAN_ID`) REFERENCES `list_kegiatan_rujukan_igd` (`LISTRUJUKAN_ID`);

--
-- Constraints for table `kegiatan_sanitasi`
--
ALTER TABLE `kegiatan_sanitasi`
  ADD CONSTRAINT `kegiatan_sanitasi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kegiatan_sanitasi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kegiatan_sanitasi_ibfk_3` FOREIGN KEY (`LIST_SANITASI_ID`) REFERENCES `list_pemeriksaan_sanitasi` (`LIST_SANITASI_ID`);

--
-- Constraints for table `kegiatan_transfusi_darah`
--
ALTER TABLE `kegiatan_transfusi_darah`
  ADD CONSTRAINT `kegiatan_transfusi_darah_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kegiatan_transfusi_darah_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kegiatan_transfusi_darah_ibfk_3` FOREIGN KEY (`KEGIATAN_TRANS_ID`) REFERENCES `list_kegiatan_transfusi` (`KEGIATAN_TRANS_ID`);

--
-- Constraints for table `kelayakan_peralatan`
--
ALTER TABLE `kelayakan_peralatan`
  ADD CONSTRAINT `kelayakan_peralatan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kelayakan_peralatan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kelayakan_peralatan_ibfk_3` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `kelayakan_ruangan`
--
ALTER TABLE `kelayakan_ruangan`
  ADD CONSTRAINT `kelayakan_ruangan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kelayakan_ruangan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `kelengkapan_kelola_maskin`
--
ALTER TABLE `kelengkapan_kelola_maskin`
  ADD CONSTRAINT `kelengkapan_kelola_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kelengkapan_kelola_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kelengkapan_kelola_maskin_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kelengkapan_kelola_maskin_ibfk_4` FOREIGN KEY (`KLP_ID`) REFERENCES `list_kelengkapan_kelola_maskin` (`KLP_ID`);

--
-- Constraints for table `kelengkapan_peralatan`
--
ALTER TABLE `kelengkapan_peralatan`
  ADD CONSTRAINT `kelengkapan_peralatan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kelengkapan_peralatan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `kelengkapan_survey_maskin`
--
ALTER TABLE `kelengkapan_survey_maskin`
  ADD CONSTRAINT `kelengkapan_survey_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kelengkapan_survey_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kelengkapan_survey_maskin_ibfk_3` FOREIGN KEY (`KP_MASKIN_ID`) REFERENCES `list_kelengkapan_survey_maskin` (`KP_MASKIN_ID`);

--
-- Constraints for table `keluhan_maskin_petugas`
--
ALTER TABLE `keluhan_maskin_petugas`
  ADD CONSTRAINT `keluhan_maskin_petugas_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `keluhan_maskin_petugas_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `keluhan_maskin_petugas_ibfk_3` FOREIGN KEY (`PMASKIN_ID`) REFERENCES `list_petugas_maskin` (`PMASKIN_ID`);

--
-- Constraints for table `kematian_ibu`
--
ALTER TABLE `kematian_ibu`
  ADD CONSTRAINT `FK_RELATIONSHIP_139` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kematian_ibu_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `kematian_ibu_karena_persalinan`
--
ALTER TABLE `kematian_ibu_karena_persalinan`
  ADD CONSTRAINT `kematian_ibu_karena_persalinan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kematian_ibu_karena_persalinan_ibfk_2` FOREIGN KEY (`TRIBULAN_ID`) REFERENCES `list_tribulan` (`TRIBULAN_ID`),
  ADD CONSTRAINT `kematian_ibu_karena_persalinan_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `kematian_ibu_per_faktor`
--
ALTER TABLE `kematian_ibu_per_faktor`
  ADD CONSTRAINT `FK_RELATIONSHIP_140` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_73` FOREIGN KEY (`SKI_ID`) REFERENCES `list_sebab_kematian_ibu` (`SKI_ID`),
  ADD CONSTRAINT `kematian_ibu_per_faktor_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `ketenagaan`
--
ALTER TABLE `ketenagaan`
  ADD CONSTRAINT `ketenagaan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `ketenagaan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `ketenagaan_ibfk_3` FOREIGN KEY (`LK_ID`) REFERENCES `list_ketenagaan` (`LK_ID`);

--
-- Constraints for table `kondisi_peralatan_rs`
--
ALTER TABLE `kondisi_peralatan_rs`
  ADD CONSTRAINT `kondisi_peralatan_rs_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kondisi_peralatan_rs_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kondisi_peralatan_rs_ibfk_3` FOREIGN KEY (`LIST_PERALATAN_ID`) REFERENCES `list_peralatan_pelayanan` (`LIST_PERALATAN_ID`);

--
-- Constraints for table `konsultasi_gizi`
--
ALTER TABLE `konsultasi_gizi`
  ADD CONSTRAINT `konsultasi_gizi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `konsultasi_gizi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `konsultasi_gizi_ibfk_3` FOREIGN KEY (`TIPE_PASIEN_ID`) REFERENCES `list_tipe_pasien` (`TIPE_PASIEN_ID`);

--
-- Constraints for table `kujungan_rawat_jalan`
--
ALTER TABLE `kujungan_rawat_jalan`
  ADD CONSTRAINT `kujungan_rawat_jalan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kujungan_rawat_jalan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kujungan_rawat_jalan_ibfk_3` FOREIGN KEY (`POLI_ID`) REFERENCES `list_poli_rawat_jalan` (`POLI_ID`);

--
-- Constraints for table `kunjungan_igd`
--
ALTER TABLE `kunjungan_igd`
  ADD CONSTRAINT `kunjungan_igd_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `kunjungan_igd_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `kunjungan_igd_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`);

--
-- Constraints for table `laptah_penemuan_tb`
--
ALTER TABLE `laptah_penemuan_tb`
  ADD CONSTRAINT `laptah_penemuan_tb_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `laptah_penemuan_tb_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `laptah_penemuan_tb_ibfk_3` FOREIGN KEY (`TIPE_TB`) REFERENCES `list_tipe_pasien_tb` (`TIPE_TB`);

--
-- Constraints for table `list_indikator_spm`
--
ALTER TABLE `list_indikator_spm`
  ADD CONSTRAINT `list_indikator_spm_ibfk_1` FOREIGN KEY (`INDIKATOR_KATEGORI_ID`) REFERENCES `list_kategori_indikator_spm` (`INDIKATOR_KATEGORI_ID`);

--
-- Constraints for table `live_saving`
--
ALTER TABLE `live_saving`
  ADD CONSTRAINT `live_saving_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `live_saving_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `live_saving_ibfk_3` FOREIGN KEY (`TRIBULAN_ID`) REFERENCES `list_tribulan` (`TRIBULAN_ID`);

--
-- Constraints for table `mdgs4_1`
--
ALTER TABLE `mdgs4_1`
  ADD CONSTRAINT `mdgs4_1_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs4_1_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs4_1_ibfk_3` FOREIGN KEY (`MDGS4_ID`) REFERENCES `list_mdgs` (`MDGS_ID`);

--
-- Constraints for table `mdgs4_2`
--
ALTER TABLE `mdgs4_2`
  ADD CONSTRAINT `mdgs4_2_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs4_2_ibfk_2` FOREIGN KEY (`MDGS4_ID`) REFERENCES `list_mdgs` (`MDGS_ID`),
  ADD CONSTRAINT `mdgs4_2_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `mdgs4_peralatan_neonatal_esensial`
--
ALTER TABLE `mdgs4_peralatan_neonatal_esensial`
  ADD CONSTRAINT `mdgs4_peralatan_neonatal_esensial_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs4_peralatan_neonatal_esensial_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs4_peralatan_neonatal_esensial_ibfk_3` FOREIGN KEY (`NEONATAL_ESENSIAL_ID`) REFERENCES `list_peralatan_neonatal_esensial` (`NEONATAL_ESENSIAL_ID`);

--
-- Constraints for table `mdgs5_1`
--
ALTER TABLE `mdgs5_1`
  ADD CONSTRAINT `mdgs5_1_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs5_1_ibfk_2` FOREIGN KEY (`MDGS5_ID`) REFERENCES `list_mdgs` (`MDGS_ID`),
  ADD CONSTRAINT `mdgs5_1_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `mdgs5_2`
--
ALTER TABLE `mdgs5_2`
  ADD CONSTRAINT `mdgs5_2_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs5_2_ibfk_2` FOREIGN KEY (`MDGS5_ID`) REFERENCES `list_mdgs` (`MDGS_ID`),
  ADD CONSTRAINT `mdgs5_2_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `mdgs5_3`
--
ALTER TABLE `mdgs5_3`
  ADD CONSTRAINT `mdgs5_3_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs5_3_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs5_3_ibfk_3` FOREIGN KEY (`MDGS5_ID`) REFERENCES `list_mdgs` (`MDGS_ID`);

--
-- Constraints for table `mdgs5_peralatan_maternal_essensial`
--
ALTER TABLE `mdgs5_peralatan_maternal_essensial`
  ADD CONSTRAINT `mdgs5_peralatan_maternal_essensial_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs5_peralatan_maternal_essensial_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs5_peralatan_maternal_essensial_ibfk_3` FOREIGN KEY (`MATERNAL_ESSENSIAL_ID`) REFERENCES `list_peralatan_maternal_essensial` (`MATERNAL_ESSENSIAL_UD`);

--
-- Constraints for table `mdgs6_1`
--
ALTER TABLE `mdgs6_1`
  ADD CONSTRAINT `mdgs6_1_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mdgs6_1_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs6_1_ibfk_3` FOREIGN KEY (`MDGS6_ID`) REFERENCES `list_mdgs` (`MDGS_ID`),
  ADD CONSTRAINT `mdgs6_1_ibfk_4` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs6_1_ibfk_5` FOREIGN KEY (`MDGS6_ID`) REFERENCES `list_mdgs` (`MDGS_ID`);

--
-- Constraints for table `mdgs6_2`
--
ALTER TABLE `mdgs6_2`
  ADD CONSTRAINT `mdgs6_2_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mdgs6_2_ibfk_2` FOREIGN KEY (`MDGS6_ID`) REFERENCES `list_mdgs` (`MDGS_ID`),
  ADD CONSTRAINT `mdgs6_2_ibfk_3` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `mekanisme_pengaduan_maskin`
--
ALTER TABLE `mekanisme_pengaduan_maskin`
  ADD CONSTRAINT `mekanisme_pengaduan_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `mekanisme_pengaduan_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `mekanisme_pengaduan_maskin_ibfk_3` FOREIGN KEY (`LIST_MEKANISME_ID`) REFERENCES `list_mekanisme_pengaduan_maskin` (`LIST_MEKANISME_ID`);

--
-- Constraints for table `pasien_hemodialisis`
--
ALTER TABLE `pasien_hemodialisis`
  ADD CONSTRAINT `pasien_hemodialisis_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pasien_hemodialisis_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pasien_hemodialisis_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`);

--
-- Constraints for table `pelatihan_sdm`
--
ALTER TABLE `pelatihan_sdm`
  ADD CONSTRAINT `pelatihan_sdm_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelatihan_sdm_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelatihan_sdm_ibfk_3` FOREIGN KEY (`UNIT_ID`) REFERENCES `list_unit` (`UNIT_ID`),
  ADD CONSTRAINT `pelatihan_sdm_ibfk_4` FOREIGN KEY (`LIST_TM_ID`) REFERENCES `list_jenis_tenaga_medis` (`LIST_TM_ID`);

--
-- Constraints for table `pelayanan_diit`
--
ALTER TABLE `pelayanan_diit`
  ADD CONSTRAINT `pelayanan_diit_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_diit_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_diit_ibfk_3` FOREIGN KEY (`JENIS_DIET_ID`) REFERENCES `list_jenis_diet` (`JENIS_DIET_ID`);

--
-- Constraints for table `pelayanan_farmasi`
--
ALTER TABLE `pelayanan_farmasi`
  ADD CONSTRAINT `pelayanan_farmasi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_farmasi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_farmasi_ibfk_3` FOREIGN KEY (`GO_ID`) REFERENCES `list_golongan_obat` (`GO_ID`);

--
-- Constraints for table `pelayanan_gigi`
--
ALTER TABLE `pelayanan_gigi`
  ADD CONSTRAINT `pelayanan_gigi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_gigi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_gigi_ibfk_3` FOREIGN KEY (`TDK_GILUT_ID`) REFERENCES `list_tindakan_gilut` (`TDK_GILUT_ID`);

--
-- Constraints for table `pelayanan_kegiatan_kb`
--
ALTER TABLE `pelayanan_kegiatan_kb`
  ADD CONSTRAINT `FK_RELATIONSHIP_204` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_38` FOREIGN KEY (`METODE_ID`) REFERENCES `list_metode_kb` (`METODE_ID`),
  ADD CONSTRAINT `pelayanan_kegiatan_kb_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_kegiatan_kb_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `pelayanan_lab_patologi`
--
ALTER TABLE `pelayanan_lab_patologi`
  ADD CONSTRAINT `pelayanan_lab_patologi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_lab_patologi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_lab_patologi_ibfk_3` FOREIGN KEY (`JENIS_LAB_ID`) REFERENCES `list_jenis_pemeriksaan_lab` (`JENIS_LAB_ID`);

--
-- Constraints for table `pelayanan_lab_toksikologi`
--
ALTER TABLE `pelayanan_lab_toksikologi`
  ADD CONSTRAINT `pelayanan_lab_toksikologi_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_lab_toksikologi_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_lab_toksikologi_ibfk_3` FOREIGN KEY (`LPT_ID`) REFERENCES `list_pemeriksaan_toksikologi` (`LPT_ID`);

--
-- Constraints for table `pelayanan_lab_total`
--
ALTER TABLE `pelayanan_lab_total`
  ADD CONSTRAINT `pelayanan_lab_total_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_lab_total_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_lab_total_ibfk_3` FOREIGN KEY (`JENIS_LAB_ID`) REFERENCES `list_jenis_pemeriksaan_lab` (`JENIS_LAB_ID`);

--
-- Constraints for table `pelayanan_maskin`
--
ALTER TABLE `pelayanan_maskin`
  ADD CONSTRAINT `pelayanan_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pelayanan_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pelayanan_maskin_ibfk_3` FOREIGN KEY (`UNITMASKIN_ID`) REFERENCES `list_unit_kerja_maskin` (`UNITMASKIN_ID`);

--
-- Constraints for table `pembayaran_hemodialisis`
--
ALTER TABLE `pembayaran_hemodialisis`
  ADD CONSTRAINT `pembayaran_hemodialisis_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pembayaran_hemodialisis_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pembayaran_hemodialisis_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`);

--
-- Constraints for table `pembayaran_rawat_inap`
--
ALTER TABLE `pembayaran_rawat_inap`
  ADD CONSTRAINT `pembayaran_rawat_inap_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pembayaran_rawat_inap_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pembayaran_rawat_inap_ibfk_3` FOREIGN KEY (`PEL_RI_ID`) REFERENCES `list_pelayanan_rawat_inap` (`PEL_RI_ID`);

--
-- Constraints for table `pembayaran_rawat_jalan`
--
ALTER TABLE `pembayaran_rawat_jalan`
  ADD CONSTRAINT `pembayaran_rawat_jalan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pembayaran_rawat_jalan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `pembayaran_rawat_jalan_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`),
  ADD CONSTRAINT `pembayaran_rawat_jalan_ibfk_4` FOREIGN KEY (`POLI_ID`) REFERENCES `list_poli_rawat_jalan` (`POLI_ID`);

--
-- Constraints for table `pemulasaraan_jenazah`
--
ALTER TABLE `pemulasaraan_jenazah`
  ADD CONSTRAINT `pemulasaraan_jenazah_ibfk_3` FOREIGN KEY (`LIST_JENAZAH_ID`) REFERENCES `list_tindakan_jenazah` (`LIST_JENAZAH_ID`),
  ADD CONSTRAINT `pemulasaraan_jenazah_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `pemulasaraan_jenazah_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `penerimaan_darah`
--
ALTER TABLE `penerimaan_darah`
  ADD CONSTRAINT `penerimaan_darah_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `penerimaan_darah_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `penerimaan_darah_ibfk_3` FOREIGN KEY (`PENERIMAAN_DARAH_ID`) REFERENCES `list_penerimaan_darah` (`PENERIMAAN_DARAH_ID`);

--
-- Constraints for table `penggunaan_darah`
--
ALTER TABLE `penggunaan_darah`
  ADD CONSTRAINT `penggunaan_darah_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `penggunaan_darah_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `penggunaan_darah_ibfk_3` FOREIGN KEY (`PENGGUNAAN_TRANS_ID`) REFERENCES `list_penggunaan_transfusi` (`PENGGUNAAN_TRANS_ID`);

--
-- Constraints for table `penyakit_terbanyak_maskin_ri`
--
ALTER TABLE `penyakit_terbanyak_maskin_ri`
  ADD CONSTRAINT `penyakit_terbanyak_maskin_ri_ibfk_4` FOREIGN KEY (`ICD10_CODE`) REFERENCES `icd10` (`ICD10_CODE`),
  ADD CONSTRAINT `penyakit_terbanyak_maskin_ri_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `penyakit_terbanyak_maskin_ri_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `penyakit_terbanyak_maskin_ri_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`);

--
-- Constraints for table `penyakit_terbanyak_maskin_rj`
--
ALTER TABLE `penyakit_terbanyak_maskin_rj`
  ADD CONSTRAINT `penyakit_terbanyak_maskin_rj_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `penyakit_terbanyak_maskin_rj_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `penyakit_terbanyak_maskin_rj_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`),
  ADD CONSTRAINT `penyakit_terbanyak_maskin_rj_ibfk_4` FOREIGN KEY (`ICD10_CODE`) REFERENCES `icd10` (`ICD10_CODE`);

--
-- Constraints for table `peralatan_canggih`
--
ALTER TABLE `peralatan_canggih`
  ADD CONSTRAINT `peralatan_canggih_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `peralatan_canggih_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `peralatan_canggih_ibfk_3` FOREIGN KEY (`LPC_ID`) REFERENCES `list_peralatan_canggih` (`LPC_ID`);

--
-- Constraints for table `peralatan_hemodialisis`
--
ALTER TABLE `peralatan_hemodialisis`
  ADD CONSTRAINT `peralatan_hemodialisis_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `peralatan_hemodialisis_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `peralatan_hemodialisis_ibfk_3` FOREIGN KEY (`LPH_ID`) REFERENCES `list_peralatan_hemodialisis` (`LPH_ID`);

--
-- Constraints for table `peralatan_hemodialisis2`
--
ALTER TABLE `peralatan_hemodialisis2`
  ADD CONSTRAINT `peralatan_hemodialisis2_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `peralatan_hemodialisis2_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `peralatan_hemodialisis2_ibfk_3` FOREIGN KEY (`LPH_ID`) REFERENCES `list_peralatan_hemodialisis` (`LPH_ID`);

--
-- Constraints for table `permasalahan`
--
ALTER TABLE `permasalahan`
  ADD CONSTRAINT `permasalahan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `permasalahan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `permasalahan_ibfk_3` FOREIGN KEY (`KAT_PERMASALAHAN_ID`) REFERENCES `list_kategori_permasalahan` (`KAT_PERMASALAHAN_ID`);

--
-- Constraints for table `persentase_keluhan_maskin`
--
ALTER TABLE `persentase_keluhan_maskin`
  ADD CONSTRAINT `persentase_keluhan_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `persentase_keluhan_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `persentase_keluhan_maskin_ibfk_3` FOREIGN KEY (`LIST_KELUHAN_ID`) REFERENCES `list_keluhan_maskin` (`LIST_KELUHAN_ID`);

--
-- Constraints for table `rasio_keuangan`
--
ALTER TABLE `rasio_keuangan`
  ADD CONSTRAINT `rasio_keuangan_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `rasio_keuangan_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `rasio_keuangan_ibfk_3` FOREIGN KEY (`LIST_RK_ID`) REFERENCES `list_rasio_keuangan` (`list_rk_id`);

--
-- Constraints for table `rehabilitasi_medik`
--
ALTER TABLE `rehabilitasi_medik`
  ADD CONSTRAINT `rehabilitasi_medik_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `rehabilitasi_medik_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `rehabilitasi_medik_ibfk_3` FOREIGN KEY (`LIST_RM_ID`) REFERENCES `list_tindakan_rehabilitasi_medik` (`LIST_TM_ID`);

--
-- Constraints for table `sales_growth_rate`
--
ALTER TABLE `sales_growth_rate`
  ADD CONSTRAINT `sales_growth_rate_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `sales_growth_rate_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sales_growth_rate_ibfk_3` FOREIGN KEY (`SGR_TAHUN`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`);

--
-- Constraints for table `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  ADD CONSTRAINT `sarana_prasarana_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sarana_prasarana_ibfk_2` FOREIGN KEY (`LIST_SARPRAS_ID`) REFERENCES `list_sarpras` (`LIST_SARPRAS_ID`),
  ADD CONSTRAINT `sarana_prasarana_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `sarpras_hemodialisis`
--
ALTER TABLE `sarpras_hemodialisis`
  ADD CONSTRAINT `FK_RELATIONSHIP_116` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `sarpras_hemodialisis_ibfk_1` FOREIGN KEY (`LIST_HEMO_SARPRAS_ID`) REFERENCES `list_hemo_sarpras` (`hemo_sarpras_id`),
  ADD CONSTRAINT `sarpras_hemodialisis_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sarpras_hemodialisis_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `sepuluh_besar_kasus_rujukan`
--
ALTER TABLE `sepuluh_besar_kasus_rujukan`
  ADD CONSTRAINT `FK_RELATIONSHIP_171` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `sepuluh_besar_kasus_rujukan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sepuluh_besar_kasus_rujukan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `sepuluh_besar_penyakit_igd`
--
ALTER TABLE `sepuluh_besar_penyakit_igd`
  ADD CONSTRAINT `sepuluh_besar_penyakit_igd_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sepuluh_besar_penyakit_igd_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `sepuluh_besar_penyakit_igd_ibfk_3` FOREIGN KEY (`ICD10_CODE`) REFERENCES `icd10` (`ICD10_CODE`);

--
-- Constraints for table `sepuluh_besar_penyakit_rawat_inap`
--
ALTER TABLE `sepuluh_besar_penyakit_rawat_inap`
  ADD CONSTRAINT `sepuluh_besar_penyakit_rawat_inap_ibfk_1` FOREIGN KEY (`ICD10_CODE`) REFERENCES `icd10` (`ICD10_CODE`),
  ADD CONSTRAINT `sepuluh_besar_penyakit_rawat_inap_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sepuluh_besar_penyakit_rawat_inap_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `sepuluh_besar_penyakit_rawat_jalan`
--
ALTER TABLE `sepuluh_besar_penyakit_rawat_jalan`
  ADD CONSTRAINT `sepuluh_besar_penyakit_rawat_jalan_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `sepuluh_besar_penyakit_rawat_jalan_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `sepuluh_besar_penyakit_rawat_jalan_ibfk_3` FOREIGN KEY (`ICD10_CODE`) REFERENCES `icd10` (`ICD10_CODE`);

--
-- Constraints for table `spm`
--
ALTER TABLE `spm`
  ADD CONSTRAINT `spm_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `spm_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `spm_ibfk_3` FOREIGN KEY (`SPM_KATEGORI_ID`) REFERENCES `list_kategori_indikator_spm` (`INDIKATOR_KATEGORI_ID`),
  ADD CONSTRAINT `spm_ibfk_4` FOREIGN KEY (`SPM_INDIKATOR_ID`) REFERENCES `list_indikator_spm` (`INDIKATOR_ID`);

--
-- Constraints for table `spm_rs`
--
ALTER TABLE `spm_rs`
  ADD CONSTRAINT `spm_rs_ibfk_1` FOREIGN KEY (`LSPMRS_ID`) REFERENCES `list_spm_rs` (`LSPMRS_ID`),
  ADD CONSTRAINT `spm_rs_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `spm_rs_ibfk_3` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`);

--
-- Constraints for table `survey_pelanggan`
--
ALTER TABLE `survey_pelanggan`
  ADD CONSTRAINT `survey_pelanggan_ibfk_1` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `survey_pelanggan_ibfk_2` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `survey_pelanggan_ibfk_3` FOREIGN KEY (`UNIT_SURVEY_ID`) REFERENCES `list_unit_survey` (`UNIT_SURVEY_ID`);

--
-- Constraints for table `tenaga_medik_hemodialisis`
--
ALTER TABLE `tenaga_medik_hemodialisis`
  ADD CONSTRAINT `FK_RELATIONSHIP_113` FOREIGN KEY (`LIST_HEMO_TENAGA_MEDIK_ID`) REFERENCES `list_hemo_tenaga_medik` (`LIST_HEMO_TENAGA_MEDIK_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_117` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `tenaga_medik_hemodialisis_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `tenaga_medik_hemodialisis_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `tindakan_terbanyak_maskin`
--
ALTER TABLE `tindakan_terbanyak_maskin`
  ADD CONSTRAINT `tindakan_terbanyak_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `tindakan_terbanyak_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`),
  ADD CONSTRAINT `tindakan_terbanyak_maskin_ibfk_3` FOREIGN KEY (`LIST_TAHUN_ID`) REFERENCES `list_tahun` (`LIST_TAHUN_ID`);

--
-- Constraints for table `upaya_perbaikan_maskin`
--
ALTER TABLE `upaya_perbaikan_maskin`
  ADD CONSTRAINT `upaya_perbaikan_maskin_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `upaya_perbaikan_maskin_ibfk_2` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

--
-- Constraints for table `vct_cst`
--
ALTER TABLE `vct_cst`
  ADD CONSTRAINT `vct_cst_ibfk_1` FOREIGN KEY (`RS_NOREG`) REFERENCES `rumah_sakit` (`RS_NOREG`),
  ADD CONSTRAINT `vct_cst_ibfk_2` FOREIGN KEY (`GOLONGAN_UMUR_ID`) REFERENCES `list_golongan_umur` (`GOLONGAN_UMUR_ID`),
  ADD CONSTRAINT `vct_cst_ibfk_3` FOREIGN KEY (`TAHUN_ID`) REFERENCES `tahun` (`TAHUN_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
