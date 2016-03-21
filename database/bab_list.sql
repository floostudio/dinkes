-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2014 at 06:45 AM
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
-- Table structure for table `bab_list`
--

CREATE TABLE IF NOT EXISTS `bab_list` (
  `bab_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `bab_list_table` varchar(50) NOT NULL,
  `bab_id` int(11) NOT NULL,
  PRIMARY KEY (`bab_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `bab_list`
--

INSERT INTO `bab_list` (`bab_list_id`, `bab_list_table`, `bab_id`) VALUES
('', '2.19 Pelayanan', 1),
('', '2.20 Peralatan Canggih', 1),
('', '2.21.1 IGD', 1),
('', '2.21.2 IRJ', 1),
('', '2.21.3 IRI', 1),
('', '2.22 Efisiensi dan Mutu Pengelolaan RS', 1),
('', '3.1 Gambaran kondisi SarPras', 2),
('', '3.2 Gambaran Kondisi Peralatan', 2),
('', '3.3.1 Analisa Sarpras-Kelengkapan Peralat', 2),
('', '3.3.2 Analisa Sarpras-Kelayakan Peralatan', 2),
('', '3.3.2 Analisa Sarpras- Kelayakan Ruangan', 2),
('', '3.4 Gambaran Ketenagaan', 2),
('', '3.5 Analisa Ketenagaan', 2),
('', '3.6 Kebutuhan Tenaga dan Rencana Pemenuhan', 2),
('', '3.7 Pelatihan Tenaga', 2),
('', '4.1 Perkembangan Pertumbuhan Pendapatan (SGR) ', 3),
('', '4.2 Laporan dan Perkembangan Cost Recovery', 3),
('', '4.3 Rasio Keuangan', 3),
('', '4.4 Analisa Rasio Keuangan', 3),
('', '5.1.A Trend Jumlah Kunjungan IGD', 4),
('', '5.1.A.1 Kemampuan Menangani Life Saving pada Tahun n', 4),
('', '5.1.A.2 Jumlah Tenaga IGD dan Pengembangan SDM', 4),
('', '5.1.A.3 10 Besar Kasus/ Penyakit IGD', 4),
('', '5.1.A.4 Pencapaian SPM IGD', 4),
('', '5.1.A.5 Permasalahan dan Pemecahan Masalah IGD', 4),
('', '5.1.B Kegiatan Rujukan IGD', 4),
('', '5.1.C Kegiatan Rujukan', 4),
('', '5.1.D Rekapitulasi 10 besar Kasus Rujukan', 4),
('', '5.2.A Jumlah Kunjungan Rawat Jalan', 4),
('', '5.2.B Cara pembayaran Kunjungan Pasien Rawat Jalan', 4),
('', '5.2.C 10 besar Penyakit Rawat Jalan', 4),
('', '5.2.D Pencapaian SPM Rawat Jalan', 4),
('', '5.2.E Permasalahan dan pemecahan Masalah di Rawat Jalan', 4),
('', '5.3.A Kegiatan Rawat Inap', 4),
('', '5.3.B Cara Pembayaran Pasien RAwat Inap', 4),
('', '5.3.C Indikator Klinik Rawat Inap', 4),
('', '5.3.D 10 Besar Penyakit Rawat Inap', 4),
('', '5.3.E Diagnosis Kematian Rawat Inap', 4),
('', '5.3.F Pencapaian SPM Kegiatan Rawat Inap', 4),
('', '5.3.G Permasalahan dan Pemecahan Masalah di Rawat Inap', 4),
('', '5.4.A Jumlah Operasi', 4),
('', '5.4.B Pencapaian SPM Kegiatan Pelayanan Bedah', 4),
('', '5.4.C Permasalahan dan Pemecahan di Pelayanan Bedah', 4),
('', '5.5.A Hasil Pelayanan Persalinan', 4),
('', '5.5.B Hasil Pelayanan Perinatologi dan Neonatologi', 4),
('', '5.5.C Pencapaian SPM Pelayanan Persalinan, Perinatologi ', 4),
('', '5.5.D Permasalahan dan Pemecahan Masalah di Persalinan, ', 4),
('', '5.6.A Hasil Pelayanan Kegiatan KB', 4),
('', '5.7.A Pencapaian SPM Pelayanan Intensif', 4),
('', '5.7.B Permasalahan dan Pemecahan Masalah Pelayanan Intensif', 4),
('', '5.8.A Jumlah Kunjungan Pelayanan Radiologi', 4),
('', '5.8.B Pencapaian SPM Pelayanan Radiologi', 4),
('', '5.8.C Permasalahan dan Pemecahan Masalah di Pelayanan Radiologi', 4),
('', '5.9.A Jumlah Pemeriksaan Laboratorium-Patologi', 4),
('', '5.9.A Jumlah Pemeriksaan Laboratorium-Toksikologi', 4),
('', '5.9.A Jumlah Pemeriksaan Laboratorium', 4),
('', '5.9.B Pencapaian SPM Pelayanan Laboratorium', 4),
('', '5.9.C Permasalahan dan Pemecahan Masalah di Pelayanan Laborat', 4),
('', '5.10.A Kegiatan Rehabilitas Medik', 4),
('', '5.10.B Pencapaian SPM Pelayanan Rehabilitasi Medik', 4),
('', '5.10.C Permasalahan dan Pemecahan Masalah di Rehab Medik', 4),
('', '5.11.A Pelayanan Obat', 4),
('', '5.11.B Permasalahan dan Pemecahan Masalah di Farmasi', 4),
('', '5.11.C Pencapaian SPM Pelayanan Farmasi', 4),
('', '5.12.A Jumlah Pelayanan Diit', 4),
('', '5.12.B Konsultasi/ Penyuluhan Gizi', 4),
('', '5.12.C Evaluasi Mutu Asuhan Gizi', 4),
('', '5.12.D Pencapaian SPM Pelayanan Gizi', 4),
('', '5.12.E Permasalahan dan Pemecahan Masalah di Gizi', 4),
('', '5.13.A Kegiatan Tranfusi Darah', 4),
('', '5.13.B Penggunaan Darah Di Rumah Sakit', 4),
('', '5.13.C Penerimaan Darah', 4),
('', '5.13.D Pencapaian SPM Pelayanan Transfusi Darah', 4),
('', '5.13.E Permasalahan dan Pemecahan Masalah di Tranfusi', 4),
('', '5.14.A Kegiatan Pelayanan Keluarga Miskin', 4),
('', '5.14.B Kelengkapan Survay Kepuasan dan pengaduan/ Keluhan', 4),
('', '5.14.C Kelengkapan Pengelolaan Pengaduan/Keluhan Pelangga', 4),
('', '5.14.D Keluhan Masyarakat Miskin thd Pelayanan Petugas', 4),
('', '5.14.E Prosentase Jenis Keluhan Maskin', 4),
('', '5.14.F Mekanisme Pengaduan Masalah Maskin', 4),
('', '5.14.G Hasil Survey Keluhan Pasien Maskin', 4),
('', '5.14.H Upaya Perbaikan Pelayanan Maskin', 4),
('', '5.14.I Rekapitulasi 10 Penyakit Rawat Jalan Maskin (3 Thn', 4),
('', '5.14.J Rekapitulasi 10 Penyakit Rawat Inap Maskin (3 Thn)', 4),
('', '5.14.K Rekapitulasi 10 Tindakan Terbanyak Maskin RS', 4),
('', '5.14.L Pencapaian SPM Pelayanan Maskin', 4),
('', '5.14.M Permasalahan dan Pemecahan Masalah Maskin', 4),
('', '5.15.A Pencapaian SPM Pelayanan Rekam Medik', 4),
('', '5.15.B Permasalahan dan pemecahan Masalah Pelayanan Rekam Medik', 4),
('', '5.16.A Laporan Kegiatan Sanitasi', 4),
('', '5.16.B Pencapaian SPM Pelayanan Limbah', 4),
('', '5.16.C Permasalahan dan Pemecahan Masalah Limbah', 4),
('', '5.17.A Pencapaian SPM Administrasi dan Manajemen', 4),
('', '5.17.B Permasalahan dan Pemecahan Masalah Administrasi dan', 4),
('', '5.18.A Pencapaian SPM Pelayanan Ambulan/ Kereta Jenazah', 4),
('', '5.18.B Permasalahan dan Pemecahan Masalah Pelayanan Ambul', 4),
('', '5.19.A Kegiatan Pemulasaraan jenazah', 4),
('', '5.19.B Pencapaian SPM Pemulasaraan Jenazah', 4),
('', '5.19.C Permasalahan dan Pemecahan Masalah Pemulasaraan Jenazah', 4),
('', '5.20.A Pencapaian SPM Pelayanan Pemeliharaan Sarana', 4),
('', '5.20.B Permasalahan dan Pemecahan Masalah Pemeliharaan Sa', 4),
('', '5.21.A Pencapaian SPM Pelayanan pemeliharaan Laundry', 4),
('', '5.21.B Permasalahan dan pemecahan Pelayanan Pemeliharaan ', 4),
('', '5.22.A Pencapaian SPM Pelayanan Pengendalian Infeksi', 4),
('', '5.22.B Permasalahan dan Pemecahan Masalah Pengendalian Infeksi', 4),
('', '5.23.A Pelayanan Kesehatan Gigi', 4),
('', '5.23.B Permasalahan dan Pemecahan Masalah Pelayanan Kesehatan', 4),
('', '5.24 Kegiatan Imunisasi', 4),
('', '5.25.A Jumlah Kunjungan Kegiatan Kesehatan Jiwa', 4),
('', '5.25.B Permasalahn dan pemecahan Masalah Kegiatan Kesehat', 4),
('', '6.1 Analisa Evaluasi Standar Pelayanan Minimal RS', 5),
('', '6.2 Analisa Survey Kepuasan Pelanggan', 5),
('', '6.3.A.1 TB Rawat Inap', 5),
('', '6.3.A.2 Kasus TB Rawat Inap Berdasarkan Jenis', 5),
('', '6.3.A.3 Kasus TB Rawat Inap', 5),
('', '6.3.A.4 Kasus TB Rawat Inap Berdasarkan Jenis', 5),
('', 'Laporan Tahunan Penemuan Pasien TB', 5),
('', '6.3.B.1 Hasil Kegiatan Klinik VCT dan CST', 5),
('', '6.3.B.2 Penderita HIV/AIDS Rawat Inap Berdasarkan Golongan', 5),
('', '6.3.C.1 Jumlah Pasien DBD (Lama & Baru) yang DIrawat Berda', 5),
('', '6.3.C.2 Jumlah Pasien DBD baru dan pulang (Sembuh ata Meni', 5),
('', '6.3.D.1 Kematian Maternal', 5),
('', '6.3.D.2 Sebab Kematian Ibu', 5),
('', '6.3.D.3 Kematian Ibu Karena Persalinan', 5),
('', '6.4.A.1 MDGS 4', 5),
('', '6.4.A.2 MDGS 4.2', 5),
('', '6.4.B.1 MDGS 5', 5),
('', '6.4.B.2 MDGS 5.2', 5),
('', '6.4.B.2.A MDGS 5 Peralatan Maternal Esensial', 5),
('', '6.4.B.2.B MDGS 4 Peralatan Neonatal Esensial', 5),
('', '6.4.C MDGS 5.3', 5),
('', '6.4.C.1 MDGS 6', 5),
('', '6.4.C.2 MDGS 6.2', 5),
('', 'A. Jumlah Pasien HD Berdasarkan Cara Pasien Hemodiali', 6),
('', 'B. Kunjungan Pasien Hemodialis', 6),
('', 'C. Sarana dan Prasarana Unit Hemodialis', 6),
('', 'D. Peralatan Unit Hemodialis', 6),
('', 'E. Tenaga Medik Unit Hemodialis', 6),
('', 'Peralatan Radiologi RS', 6),
('', 'Peralatan Radiologi Lainnya', 6);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
