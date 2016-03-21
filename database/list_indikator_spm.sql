-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 12:05 PM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
