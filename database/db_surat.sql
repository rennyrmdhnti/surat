-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2023 at 06:15 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

DROP TABLE IF EXISTS `tb_bidang`;
CREATE TABLE IF NOT EXISTS `tb_bidang` (
  `id_bidang` int NOT NULL AUTO_INCREMENT,
  `bidang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

DROP TABLE IF EXISTS `tb_golongan`;
CREATE TABLE IF NOT EXISTS `tb_golongan` (
  `id_gol` int NOT NULL,
  `kd_golongan` char(10) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_time` varchar(50) NOT NULL,
  `edit_by` varchar(50) NOT NULL,
  `edit_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_gol`, `kd_golongan`, `nama_pangkat`, `status`, `created_by`, `created_time`, `edit_by`, `edit_time`) VALUES
(1, 'IV/e', 'Pembina Utama', 0, '', '', '', ''),
(2, 'IV/c', 'Pembina Utama Muda', 0, '', '', '', ''),
(3, 'IV/b', 'Pembina Tingkat I', 0, '', '', '', ''),
(4, 'IV/a', 'Pembina', 0, '', '', '', ''),
(5, 'III/d', 'Penata Tingkat I', 0, '', '', '', ''),
(6, 'III/c', 'Penata', 0, '', '', '', ''),
(7, 'III/b', 'Penata Muda Tingkat I', 0, '', '', '', ''),
(8, 'III/a', 'Penata Muda', 0, '', '', '', ''),
(9, 'II/d', 'Pengatur tingkat I', 0, '', '', '', ''),
(10, 'II/c', 'Pengatur', 0, '', '', '', ''),
(11, 'II/b', 'Pengatur Muda Tingkat I', 0, '', '', '', ''),
(12, 'II/a', 'Pengatur Muda', 0, '', '', '', ''),
(13, 'I/d', 'Juru Tingkat I', 0, '', '', '', ''),
(14, 'I/c', 'Juru', 0, '', '', '', ''),
(15, 'I/b', 'Juru Muda Tingkat I', 0, '', '', '', ''),
(16, 'I/a', 'Juru Muda', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pagu`
--

DROP TABLE IF EXISTS `tb_pagu`;
CREATE TABLE IF NOT EXISTS `tb_pagu` (
  `id` int NOT NULL,
  `program` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kegiatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sub_kegiatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `pagu_anggaran` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pagu`
--

INSERT INTO `tb_pagu` (`id`, `program`, `kegiatan`, `sub_kegiatan`, `tahun`, `pagu_anggaran`) VALUES
(1, 'Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Administrasi Umum Perangkat Daerah', 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD', '2023', 1357107000),
(8, 'Program Pengelolaan Pendapatan Daerah', 'Kegiatan Pengelolaan Pendapatan Daerah', 'Penagihan Pajak Daerah', '2023', 1865917800);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` char(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_bank` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_rekening` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_gol` int NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `fk_gol` (`id_gol`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nip`, `nama`, `alamat`, `jabatan`, `nama_bank`, `kode_rekening`, `id_gol`, `bidang`, `npwp`, `nik`, `status`, `email`, `foto`) VALUES
(46, '19690112 199303 1 004', 'H. Edy Wibowo, SE', 'Banjarmasin', 'Kepala Badan', 'Bank Kalsel', '001.03.28.27810.1', 4, 'Kepala Badan', '14.976.820.2-731.000', '6371011201590000', 'Kawin', 'edywibowo@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(47, '19740101 200501 1 023', 'Hendro, M.Pd', 'Banjarmasin', 'Sekretaris Badan', 'Bank Kalsel', '001.03.28.67091.2', 4, 'Sekretariat', '15.047.549.9-731.000', '-', 'Kawin', 'hendro@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(48, '19681110 198903 1 020', 'Pahriadi, SE, MM', 'Banjarmasin', 'Kepala Bidang Pengelolaan  Barang Milik Daerah', 'Bank Kalsel', '001.03.28.87202.6', 4, 'PBMD', '14.073.992.1-731.000', '-', 'Kawin', 'pahriadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(49, '19720405 199403 1 010', 'Muhammad Syahid, SE', 'Banjarmasin', 'Kepala Bidang Pendataan dan Penetapan Pajak Daerah', 'Bank Kalsel', '001.03.28.76091.4', 5, 'Pajak', '69.616.542.2-731.000', '-', 'Kawin', 'syahid@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(50, '19830327 201001 1 016', 'Ashadi Himawan, SH', 'Banjarmasin', 'Kepala Bidang Penagihan dan Pengawasan  Pajak Daer', 'Bank Kalsel', '001.03.28.35690.7', 5, 'Hanwas', '', '', 'Kawin', 'ashadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(51, '19850107 200501 1 001', 'Muhammad Ikhsan Lutfi, SE', 'Banjarmasin', 'Kepala Bidang Anggaran', 'Bank Kalsel', '001.03.09.40487.6', 6, 'Anggaran', '', '', 'Kawin', 'ikhsan@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(52, '19701202 199303 2 011', 'Hidayah Fitriani, SE', 'Banjarmasin', 'Kepala Bidang Akuntansi', 'Bank Kalsel', '001.03.28.18175.9', 4, 'Akuntansi', '', '', 'Kawin', 'hidayah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(53, '19820401 200501 2 016', 'Apriana Amalia, SE', 'Banjarmasin', 'Kepala Bidang Perbendaharaan', 'Bank Kalsel', '001.03.28.26678.9', 4, 'Sekretariat', '', '', 'Kawin', 'apriana@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(54, '19710112 199103 2 002', 'Hj. Nurin Aulia, SE', 'Banjarmasin', 'Kasubbag Perencanaan', 'Bank Kalsel', '001.03.28.17902.3', 5, 'Sekretariat', '08.382.504.2-731.000', '6371025201710000', 'Kawin', 'nurin@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(55, '19810408 200801 2 024', 'Hj.Puji Mawarti, SE', 'Banjarmasin', 'Analis Rencana Program dan Kegiatan  ', 'Bank Kalsel', '001.03.28.67091.4', 7, 'Sekretariat', '25.339.596.6-731.000', '6371044804810000', 'Kawin', 'puji@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(56, '19800206 201001 2 012', 'Vera Wahyuliana, SE', 'Banjarmasin', 'Kasubbag Umum dan Kepegawaian', 'Bank Kalsel', '001.03.28.70902.7', 7, 'Sekretariat', '15.496.123.9-731.000', '6371044602800005', 'Kawin', 'vera@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(57, '19650504 199303 2 008', 'Fatimah. M', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.78501.2', 7, 'Sekretariat', '15.593.181.9-731.000', '6371014405650010', 'Kawin', 'fatimah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(58, '19860626 201101 1 002', 'Wahyu Riadi, SE', 'Banjarmasin', 'Penyusun Kebutuhan Barang Inventaris', 'Bank Kalsel', '001.03.28.70943.8', 7, 'Sekretariat', '15.975.794.7-731.000', '6371012606860000', 'Kawin', 'wahyu@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(59, '19890709 201101 1 001', 'Windi Faridi, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana ', 'Bank Kalsel', '001.03.28.77890.3', 8, 'Sekretariat', '15.975.381.3-731.000', '6371010907890009', 'Kawin', 'windi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(60, '19780510 201212 1 001', 'Harsono', 'Banjarmasin', 'Pengadministrasi Kepegawaian', 'Bank Kalsel', '001.03.28.77990.7', 10, 'PBMD', '66.471.186.8-731.000', '6371031005780010', 'Kawin', 'harsono@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(61, '19701112 200901 1 001', 'Aspul Anwar', 'Banjarmasin', 'Pramubakti', 'Bank Kalsel', '001.03.28.20109.7', 11, 'Sekretariat', '', '', 'Belum Kawin', 'aspul@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(62, '19771106 200501 2 010', 'Astri Kusmiatin, SE', 'Banjarmasin', 'Kasubbag Keuangan ', 'Bank Kalsel', '001.03.28.67432.0', 5, 'Sekretariat', '', '', 'Kawin', 'astri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(63, '19820527 200501 2 013', 'Meilani Dewi, A.Md', 'Banjarmasin', 'Bendahara', 'Bank Kalsel', '001.03.28.78091.3', 6, 'Sekretariat', '15.047.858.4-731.000', '6371046705820000', 'Kawin', 'meiliani@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(64, '19730915 200701 1 011', 'Hermansyah, SE', 'Banjarmasin', 'Pengelola Keuangan', 'Bank Kalsel', '001.03.28.09074.5', 7, 'Pajak', '', '', 'Kawin', 'herman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(65, '19870905 201101 2 002', 'Noor Meldawaty, S.Ab', 'Banjarmasin', 'Bendahara', 'Bank Kalsel', '001.03.28.67092.3', 7, 'Sekretariat', '15.569.686.7-733.000', '6303054509870006', 'Kawin', 'meldawaty@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(66, '19890522 201001 2 002', 'Meilia Rachmi, S.Ab', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.28.09216.4', 7, 'Sekretariat', '15.428.000.2-731.000', '6371016205890000', 'Kawin', 'meilia@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(67, '19880904 201001 2 004', 'Ika Novita Sari, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana', 'Bank Kalsel', '001.03.28.20703.9', 9, 'Sekretariat', '77.972.982.1-731.000', '6371054409880000', 'Kawin', 'novita@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(68, '19751222 200604 2 005', 'Wiwiek Indah Pertiwi', 'Banjarmasin', 'Pengadministrasi Keuangan', 'Bank', '2000365092', 8, 'Sekretariat', '49.297.331.8-721.000', '-', 'Kawin', 'wiwiek@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(69, '19731002 199403 2 002', 'Artha Kencana, SE', 'Banjarmasin', 'Kasubbid Penerimaan dan Pengelolaan Daerah', 'Bank Kalsel', '001.03.28.98652.0', 5, 'Akuntansi', '', '', 'Kawin', 'artha@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(70, '19851215 201001 2 015', 'Ida Rosanti, SE', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.26.13570.6', 7, 'Akuntansi', '', '', 'Kawin', 'idarosanti@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(71, '19750215 201001 2 004', 'Minarsih, SE', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.28.35791.3', 7, 'Akuntansi', '', '', 'Kawin', 'minarsih@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(72, '19820116 201001 1 002', 'Suhada Hanafi', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.97403.3', 10, 'Akuntansi', '', '', 'Kawin', 'suhada@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(73, '19860317 200803 2 001', 'Rizqi Annisa, Se, Ak', 'Banjarmasin', 'Kasubbid Pelaporan dan Evaluasi  ', 'Bank Kalsel', '001.03.28.56701.2', 5, 'Akuntansi', '', '', 'Kawin', 'rizqi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(74, '19740424 200604 2 032', 'Nurlita Hermina, SE', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.28.19151.9', 5, 'Akuntansi', '', '', 'Kawin', 'nurlita@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(75, '19870418 201903 1 009', 'Pirdaus Anhar, SE', 'Banjarmasin', 'Analis Laporan Keuangan', 'Bank Kalsel', '001.03.28.01050.4', 8, 'Akuntansi', '', '', 'Kawin', 'pirdaus@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(76, '19840830 201001 1 001', 'Noor Imani, SE', 'Banjarmasin', 'Pengadministrasi Umum', 'Bank Kalsel', '001.03.28.66732.0', 10, 'Pajak', '', '', 'Kawin', 'inamiroon@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(77, '19870504 201101 1 003', 'M.Muslih Mubarak, SE', 'Banjarmasin', 'Plt. Analis Keuangan Pusat dan Daerah Ahli Muda ', 'Bank Kalsel', '001.03.28.67419.0', 8, 'Perbendaharaan', '15.975.793.9-731.000', '6304150405870000', 'Kawin', 'muslih@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(78, '19760803 199702 2 001', 'Rusmariyani, SE, MM', 'Banjarmasin', 'Kasubbid Pengelolaan Kas', 'Bank Kalsel', '001.03.28.67809.2', 5, 'Perbendaharaan', '49.070.190.1-731.000', '6371014308760010', 'Kawin', 'rusmari@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(79, '19770701 200801 1 022', 'Buchari Muslim', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.27278.6', 9, 'Perbendaharaan', '', '', 'Kawin', 'buchari@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(80, '19821201 201001 1 011', 'Abdy Darmawan, A.Md', 'Banjarmasin', 'Pengelola Data', 'Bank Kalsel', '001.03.28.14924.6', 1, 'Perbendaharaan', '', '', 'Kawin', 'abdydar@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(81, '19830517 201001 1 013', 'Deddy Widjayadi, S.Ak', 'Banjarmasin', 'Analis Transaksi Keuangan  ', 'Bank Kalsel', '001.03.28.56011.7', 8, 'Perbendaharaan', '', '', 'Kawin', 'deddy@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(82, '19660814 199303 2 008', 'Anita Anggraini, SE', 'Banjarmasin', 'Kasubbid Penatausahaan dan Rekonsiliasi', 'Bank Kalsel', '001.03.28.01020.0', 5, 'Sekretariat', '', '', 'Belum Kawin', 'anita@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(83, '19870727 201001 1 005', 'M. Taufik Zulhijra, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan ', 'Bank Kalsel', '001.03.28.88741.3', 7, 'Perbendaharaan', '15.964.537.3-731.000', '6371012707870000', 'Kawin', 'taufikzul@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(84, '19850323 200604 2 008', 'Noor Maya Sari', 'Banjarmasin', 'Pengadministrasi Keuangan', 'Bank Kalsel', '001.03.28.11009.9', 9, 'Perbendaharaan', '15.966.844.1-731.000', '6371036303850000', 'Kawin', 'mayasari@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(85, '19660910 199303 2 013', 'Farhiah', 'Banjarmasin', 'Pengadministrasi Keuangan', 'Bank Kalsel', '001.03.28.03751.7', 7, 'Perbendaharaan', '77.972.985.4-731.000', '6371015009660000', 'Belum Kawin', 'farhiah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(86, '19960414 201808 2 001', 'Selvia Herlina, S.Stp', 'Banjarmasin', 'Analis  laporan Pertanggungjawaban Bendahara', 'Bank Kalsel', '001.03.28.00542.4', 8, 'Perbendaharaan', '82.220.664.5-711.000', '6203015404960006', 'Kawin', 'selvia@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(87, '19790128 201212 1 002', 'Adi Mata Angin', 'Banjarmasin', 'Pengadministrasi Umum', 'Bank Kalsel', '001.03.28.13055.4', 10, 'Perbendaharaan', '', '', 'Kawin', 'adimata@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(88, '19860713 201001 1 006', 'Anugerah Hari Achadianto, SE', 'Banjarmasin', 'Kasubbid Penyusunan Anggaran', 'Bank Kalsel', '001.03.28.30357.7', 7, 'Anggaran', '', '', 'Kawin', 'anugerah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(89, '19861104 201001 2 008', 'Nurma Dwi Rahmaniah, SM', 'Banjarmasin', 'Analis Sistem Informasi Pelaksanaan Anggaran', 'Bank Kalsel', '001.03.28.07065.5', 7, 'Anggaran', '', '', 'Kawin', 'nurma@gmailcom', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(90, '19760927 200701 1 012', 'Anriady', 'Banjarmasin', 'Pengadministrasi Anggaran', 'Bank Kalsel', '001.03.28.20300.1', 9, 'Anggaran', '', '', 'Kawin', 'anriady@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(91, '19820824 200501 1 002', 'Rozie, SE', 'Banjarmasin', 'Kasubbid  Penyusunan Regulasi Teknis dan Pengendal', 'Bank Kalsel', '001.03.28.22340.0', 6, 'Anggaran', '', '', 'Kawin', 'rozie@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(92, ' 19840430 201001 1 012', 'Ardiansyah, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana', 'Bank Kalsel', '001.03.28.89870.6', 7, 'Perbendaharaan', '', '', 'Kawin', 'ardiansyah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(93, '19820708 201001 1 017', 'Muhammad Haris Arsyad, S.Si, M.Ec.Dev', 'Banjarmasin', 'Penilai Pemerintah Ahli Muda', 'Bank Kalsel', '001.03.28.76901.5', 6, 'PBMD', '49.740.027.5-731.000', '6371040807820010', 'Kawin', 'harisa@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(94, '19691110 198903 1 005', 'Nabehanun Naji, S.Ap', 'Banjarmasin', 'Kasubbid Perencanaan Kebutuhan Pemanfaatan dan Pen', 'Bank Kalsel', '001.03.28.78092.5', 5, 'PBMD', '15.047.727.1-731.000', '6371041011690015', 'Kawin', 'naji@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(95, '19700210 199002 2 001', 'Noorasiah', 'Banjarmasin', 'Pengadministrasian Umum', 'Bank Kalsel', '001.03.28.17627.5', 7, 'PBMD', '15.047.722.2-731.000', '6371025002700010', 'Kawin', 'noorasiah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(96, ' 19820820 201001 2 020', 'Kamaria Kristina, S.Sos', 'Banjarmasin', 'Pengelola  Data', 'Bank Kalsel', '001.03.28.09167.2', 7, 'PBMD', '66.178.385.2-731.000', '6371016008820000', 'Kawin', 'kamaria@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(97, '19860404 200501 2 003', 'Rica Agustina, SE', 'Banjarmasin', 'Pengelola  Data', 'Bank Kalsel', '001.03.28.78901.6', 8, 'PBMD', '08.380.529.1-731.000', '6371014404860010', 'Kawin', 'rica@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(98, '19720222 199203 1 005', 'Dadang Fahriansyah', 'Banjarmasin', 'Kustodian Barang Milik Negara', 'Bank Kalsel', '001.03.28.22779.7', 7, 'PBMD', '', '', 'Belum Kawin', 'dadang@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(100, '19791210 200501 2 016', 'Yuliana, S.Sos', 'Banjarmasin', 'Kustodian Barang Milik Negara ', 'Bank Kalsel', '001.03.28.89025.6', 7, 'PBMD', '15.047.729.7-731.000', '6371045012790000', 'Kawin', 'yuliana@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(101, '19790913 201001 2 012', 'Norlaili, SE', 'Banjarmasin', 'Analis Aset Daerah', 'Bank Kalsel', '001.03.28.67209.5', 7, 'PBMD', '48.444.418.7-731.000', '6371045309790000', 'Kawin', 'norlaili@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(102, '19660207 200604 2 008', 'Kastaniah', 'Banjarmasin', 'Pengadministrasian Umum', 'Bank Kalsel', '001.03.28.03097.1', 9, 'PBMD', '15.047.730.5-731.000', '6371054702660000', 'Kawin', 'kastaniah2gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(103, '19830826 201001 1 001', 'Agus Setya Arief', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.11063.7', 11, 'PBMD', '', '', 'Kawin', 'agusetya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(104, '19880530 201001 2 005', 'Indah Citra Lestari, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana ', 'Bank Kalsel', '001.03.28.09167.6', 7, 'PBMD', '15.964.283.4-731.000', '6371047005880000', 'Kawin', 'indahc@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(105, '19840726 201001 2 005', 'Nur Hasanah, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan', 'Bank Kalsel', '001.03.28.90927.5', 7, 'Anggaran', '', '', 'Kawin', 'hasanah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(106, '19720126 200801 1 007', 'Dody Esfandiary', 'Banjarmasin', 'Pengadministrasian Umum', 'Bank Kalsel', '001.03.28.22109.6', 9, 'PBMD', '', '', 'Kawin', 'dody@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(107, '19650711 198703 1 007', 'Sakimin', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.12345.7', 5, 'UPT', '', '', 'Kawin', 'sakimin@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(108, '19831015 200604 1 005', 'Arif Rahman Hakim, S.Ak', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.75935.9', 8, 'UPT', '', '', 'Kawin', 'arifrahman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(109, '19771105 201001 1 006', 'Hendriansyah, A.Md', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.54029.4', 7, 'UPT', '', '', 'Kawin', 'hendri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(110, '19720625 199503 1 001', 'Nasrullah', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.29537.3', 6, 'UPT', '', '', 'Belum Kawin', 'nasrullah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(111, ' 19750729 200604 1 012', 'Juli Amaril, A.Md', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.40173.0', 7, 'UPT', '', '', 'Kawin', 'juli@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(112, '19820501 201001 1 001', 'M. Syarif, SH, MH', 'Banjarmasin', 'Kasubbid Penagihan ', 'Bank Kalsel', '001.03.28.55609.1', 7, 'Hanwas', '', '', 'Kawin', 'syarif@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(113, '19670507 200604 1 008', 'Rahmadi', 'Banjarmasin', 'Pengolah Data', 'Bank Kalsel', '001.03.28.77890.8', 10, 'Pajak', '', '', 'Kawin', 'rahmadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(114, ' 19820427 200901 1 001', 'Fathur Rahman', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.09652.3', 9, 'Hanwas', '', '', 'Kawin', 'fathur@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(115, '19770405 200801 1 019', 'Fathurrahman', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.01091.0', 9, 'Hanwas', '', '', 'Kawin', 'rahmanfathur@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(116, '19830228 200803 1 005', 'Andi Irawan, S.Kom', 'Banjarmasin', 'Kasubbid Pemeriksaan dan Pengawasan ', 'Bank Kalsel', '001.03.28.67421.0', 5, 'Hanwas', '', '', 'Kawin', 'andi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(117, '19780804 201001 2 005', 'Zarmis Nadra, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan ', 'Bank Kalsel', '001.03.28.45679.0', 7, 'Hanwas', '', '', 'Kawin', 'zarmis@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(118, '19850119 200501 2 003', 'Nilla Pandan Sari, SE', 'Banjarmasin', 'Analis Pemeriksaan Pajak', 'Bank Kalsel', '001.03.28.56013.0', 7, 'Hanwas', '', '', 'Kawin', 'nillapandan@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(119, '19850909 201502 2 002', 'Rini Wijayanti, A.Md', 'Banjarmasin', 'Pengelola Data  ', 'Bank Kalsel', '001.03.28.50981.0', 9, 'Hanwas', '', '', 'Kawin', 'riniwijaya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(120, '19840313 200501 1 004', 'Fauzian Noor, SE', 'Banjarmasin', 'Analis Keuangan Pusat dan Daerah Ahli Muda ', 'Bank Kalsel', '001.03.28.09076.7', 6, 'Pajak', '', '', 'Kawin', 'fauzian@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(121, ' 19741019 200803 1 001', 'Fitriadi, S.Kom', 'Banjarmasin', 'Kasubbid Pendataan dan Penilaian Pajak Daerah  ', 'Bank Kalsel', '001.03.28.20409.0', 5, 'Pajak', '', '', 'Kawin', 'fitriadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(122, '19801009 201001 1 002', 'Muliadi', 'Banjarmasin', 'Pengolah Data', 'Bank Kalsel', '001.03.28.66780.0', 10, 'Pajak', '', '', 'Belum Kawin', 'muliadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(123, '19771106201001 1 001', 'Mohd. Syamsu Rizal', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.03901.4', 10, 'Pajak', '', '', 'Kawin', 'syamsu@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(124, '19781119 200701 1 007', 'Ade Novrianda Adhita', 'Banjarmasin', 'Pengadministrasi Pajak ', 'Bank Kalsel', '001.03.28.55660.3', 8, 'Pajak', '', '', 'Belum Kawin', 'adenovri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg'),
(125, '19790415 200901 2 001', 'Susiati', 'Banjarmasin', 'Pengadministrasi Pajak', 'Bank Kalsel', '001.03.28.00123.0', 9, 'Pajak', '', '', 'Belum Kawin', 'susiati@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg'),
(126, '19790425 200701 1 007', 'Arief Rahman, S.Ap', 'Banjarmasin', 'Kasubbid Penetapan dan Keberatan ', 'Bank Kalsel', '001.03.28.78290.2', 7, 'Pajak', '', '', 'Kawin', 'ariefrhmn@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg'),
(127, '19871002 201001 2 005', 'Patimah Muliani Ningsih, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan', 'Bank Kalsel', '001.03.28.67341.7', 7, 'Pajak', '', '', 'Kawin', 'patimah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg'),
(128, '19771002 200701 2 004', 'Hj. Myrna Sylvia', 'Banjarmasin', 'Pengelola Data  ', 'Bank Kalsel', '001.03.28.70932.0', 8, 'Pajak', '', '', 'Kawin', 'myrna@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg'),
(129, '19970522 201808 1 001', 'Oscarrisandy Pratama Putra, S.STP', 'Banjarmasin', 'Analis Pemeriksaan Pajak', 'Bank Kalsel', '3200367201', 8, 'Hanwas', '', '', 'Kawin', 'oscarrisandy@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg'),
(130, '19860110 201502 1 002', 'Mursidi Anhar, A.Md', 'Banjarmasin', 'Juru Sita', 'Bank Kalsel', '001.03.28.56309.0', 8, 'Hanwas', '', '', 'Kawin', 'mursidi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg'),
(131, '19911017 202203 1  005', 'Royyan Ronaldi Hermawan, SE', 'Banjarmasin', 'Analis Pajak dan Retribusi Daerah', 'Bank', '320.05.89.123.981', 8, 'Pajak', '', '', 'Kawin', 'royyan@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(132, '19950208 202203 1 005', 'Gusti Indra Rachmadani, SM', 'Banjarmasin', 'Analis Aset Daerah ', 'Bank', '3200515609', 8, 'PBMD', '65.143.704.8-731.000', '-', 'Kawin', 'gusti@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg'),
(133, '19940303 201609 2 001', 'Sri Fathanah, S.STP, M.A', 'Banjarmasin', 'Analis Pembiayaan Daerah', 'Bank Kalsel', '3201013579', 6, 'Anggaran', '', '', 'Kawin', 'srifathanah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penggajihan`
--

DROP TABLE IF EXISTS `tb_penggajihan`;
CREATE TABLE IF NOT EXISTS `tb_penggajihan` (
  `id_penggajihan` int NOT NULL AUTO_INCREMENT,
  `penggajihan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_penggajihan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesawat`
--

DROP TABLE IF EXISTS `tb_pesawat`;
CREATE TABLE IF NOT EXISTS `tb_pesawat` (
  `id_pesawat` int NOT NULL,
  `kota` varchar(50) NOT NULL,
  `bisnis` decimal(40,0) NOT NULL,
  `ekonomi` decimal(40,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pesawat`
--

INSERT INTO `tb_pesawat` (`id_pesawat`, `kota`, `bisnis`, `ekonomi`) VALUES
(3, 'Banjarmasin - Jakarta', '525200000', '299500000'),
(4, 'Banjarmasin - Surabaya', '894200000', '438500000'),
(5, 'Banjarmasin - D.I Yogyakarta', '772300000', '402200000'),
(6, 'Banjarmasin - Semarang', '749800000', '395800000'),
(7, 'Banjarmasin - Solo', '749800000', '409700000'),
(8, 'Banjarmasin - Denpasar', '879200000', '492000000'),
(9, 'Banjarmasin - Mataram', '880300000', '488800000'),
(10, 'Banjarmasin - Banda Aceh', '1079200000', '602200000'),
(11, 'Banjarmasin - Biak', '1668600000', '874900000'),
(12, 'Banjarmasin - Jayapura', '1713500000', '935900000'),
(14, 'Banjarmasin - Medan', '1054600000', '541200000'),
(15, 'Banjarmasin - Padang', '900600000', '464200000'),
(16, 'Banjarmasin - Palembang', '749800000', '402200000'),
(17, 'Banjarmasin - Pekanbaru', '904900000', '469600000'),
(18, 'Banjarmasin - Timika', '1647200000', '871700000'),
(19, 'Banjarmasin - Pangkal Pinang', '709100000', '391500000'),
(20, 'Banjarmasin - Jambi', '769000000', '419300000'),
(21, 'Banjarmasin - Bandar Lampung', '619300000', '341200000'),
(22, 'Banjarmasin - Batam', '840700000', '457800000'),
(23, 'Banjarmasin - Balikpapan', '600000000', '350000000'),
(24, 'Banjarmasin - Palangkaraya', '600000000', '350000000'),
(25, 'Banjarmasin - Pontianak', '898000000', '540000000'),
(26, 'Banjarmasin - Makasar', '965000000', '571000000'),
(27, 'Banjarmasin - Mataram', '880300000', '488800000'),
(28, 'Banjarmasin - Bengkulu', '961600000', '561600000'),
(29, 'Banjarmasin - Palu', '1460000000', '810800000'),
(30, 'Banjarmasin - Manado', '1607600000', '809700000'),
(31, 'Banjarmasin - Kupang', '1466500000', '807600000'),
(32, 'Banjarmasin - Kendari', '1291000000', '717700000'),
(33, 'Banjarmasin - Ambon', '1885700000', '1007600000'),
(34, 'Banjarmasin - Solo', '749800000', '409700000'),
(35, 'Banjarmasin - Semarang', '749800000', '409700000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rek_kegiatan`
--

DROP TABLE IF EXISTS `tb_rek_kegiatan`;
CREATE TABLE IF NOT EXISTS `tb_rek_kegiatan` (
  `id_rek` int NOT NULL,
  `id_sub` int NOT NULL,
  `kode_rekening` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uraian` varchar(2000) NOT NULL,
  `anggaran` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_rek_kegiatan`
--

INSERT INTO `tb_rek_kegiatan` (`id_rek`, `id_sub`, `kode_rekening`, `uraian`, `anggaran`) VALUES
(1, 1, '5.1.02.02.02.0075', 'Bahan Alat/Bahan untuk Kegiatan Kantor-Alat/Bahan untuk Kegiatan Kantor Lainnya', 89200),
(2, 1, '5.1.01.03.02.0002', 'Belanja Perjalanan Dinas Biasa', 1357107000),
(3, 1, '5.1.02.02.03.0002', 'Belanja Perjalanan Dinas Biasa - Luar Negeri', 114119000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rek_travel`
--

DROP TABLE IF EXISTS `tb_rek_travel`;
CREATE TABLE IF NOT EXISTS `tb_rek_travel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `norek` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_time` varchar(50) NOT NULL,
  `edit_by` varchar(50) NOT NULL,
  `edit_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rek_travel`
--

INSERT INTO `tb_rek_travel` (`id`, `nama`, `norek`, `status`, `created_by`, `created_time`, `edit_by`, `edit_time`) VALUES
(1, 'MASINAH (PT. FIRDAUS ABADI TOUR & TRAVEL)', '001.03.01.14328.9	', 0, '', '', '', ''),
(2, 'PT. TONYMAS MEGAH WISATA (PT. TONYMAS MEGAH WISATA', '0380.0070.005.55	', 0, '', '', '', ''),
(3, 'RICKY CHANDRA (PT. CHANDRA GEMILANG ANGKASA TOUR &', '001.03.52.00607.1	', 0, '', '', '', ''),
(4, 'LIA DESTI ANDRIYANI (LIA TOURS & TRAVEL)', '200.27.84.947	', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spt`
--

DROP TABLE IF EXISTS `tb_spt`;
CREATE TABLE IF NOT EXISTS `tb_spt` (
  `id_spt` int NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dasar` varchar(500) NOT NULL,
  `untuk` varchar(500) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `credited_time` varchar(100) NOT NULL,
  PRIMARY KEY (`id_spt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_thl`
--

DROP TABLE IF EXISTS `tb_thl`;
CREATE TABLE IF NOT EXISTS `tb_thl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama_bank` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_rekening` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `bidang` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_thl`
--

INSERT INTO `tb_thl` (`id`, `nama`, `alamat`, `jabatan`, `nama_bank`, `kode_rekening`, `status`, `email`, `foto`, `bidang`) VALUES
(24, 'Muhammad Aditiya Yanuari', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.65091.0', 'Belum Kawin', 'aditiya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', 'Hanwas'),
(25, 'Muhammad Ridho Wahyudi', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.09017.6', 'Kawin', 'wahyudi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', 'Pajak'),
(26, 'Muhammad Farid Syauqi', 'Banjarmasin', '', 'Bank Kalsel', '038.03.01.76091.3', 'Belum Kawin', 'farid@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Perbendaharaan'),
(27, 'M. Haris Fadillah', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.09671.5', 'Belum Kawin', 'haris@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Pajak'),
(28, 'Nurdin Rani', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.97391.8', 'Belum Kawin', 'nurdin@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', 'Pajak'),
(29, 'Risqa Auliyani', 'Banjarmasin', '', 'Bank Kalsel', '038.03.01.90876.0', 'Belum Kawin', 'risqa@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', 'Hanwas'),
(30, 'Rizal Fadli', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.15720.8', 'Kawin', 'rizal@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Hanwas'),
(31, 'Anindya Putri Oktavia', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.71493.7', 'Belum Kawin', 'anindya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', 'Hanwas'),
(32, 'Muhammad Sugianor', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.69821.0', 'Kawin', 'sugianor@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', 'Pajak'),
(33, 'Ardhela Drianda Putri', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.97402.7', 'Belum Kawin', 'ardhela@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', 'Pajak'),
(34, 'Muhammad Husni Mubaraq', 'Banjarmasin', '', 'Bank Kalsel', '031.03.19.10117.5', 'Kawin', 'husni@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Pajak'),
(35, 'Vina Violeta Febrianty', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.09814.8', 'Belum Kawin', 'vinaviolet@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', 'Hanwas'),
(36, 'Rizky Prayudha Tri Nahdi', 'Banjarmasin', '', 'Bank Kalsel', '3200765790', 'Kawin', 'rizkyp@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', 'Pajak'),
(38, 'Muhammad Noor Abidin', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.09159.5', 'Kawin', 'abidin@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Pajak'),
(39, 'Endah Novianty', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.64571.0', 'Belum Kawin', 'endah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', 'Pajak'),
(40, 'Marzuki', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.56301.8', 'Kawin', 'marzuki@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Pajak'),
(41, 'Muhammad Riszki', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.78402.2', 'Belum Kawin', 'riszki@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', 'Pajak'),
(42, 'Ridha Karnia Putri', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.57910.0', 'Belum Kawin', 'ridha@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', 'Hanwas'),
(43, 'Muhammad Seman Syarif', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.09267.9', 'Belum Kawin', 'seman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', 'Pajak'),
(44, 'Rahman', 'Banjarmasin', '', 'Bank Kalsel', '320.05.72.560', 'Kawin', 'rahman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', 'Sekretariat'),
(45, 'Ahmad Irvani', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.20406.1', 'Belum Kawin', 'ahmadirvani@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', 'Sekretariat'),
(46, 'Hanny Safitri', 'Banjarmasin', '', 'Bank Kalsel', '016.03.01.17689.0', 'Belum Kawin', 'hanny@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', 'Sekretariat'),
(47, 'Muhammad Arief', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.09650.6', 'Belum Kawin', 'ariefm@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', 'Akuntansi'),
(48, 'Nurcahaya', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.67801.1', 'Belum Kawin', 'nurcahya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', 'Hanwas'),
(49, 'Muhammad Firdaus Ihsan', 'Banjarmasin', '', 'Bank Kalsel', '200.33.11.091', 'Kawin', 'firdaus@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', 'Pajak'),
(50, 'Fikri Edo Pratama', 'Banjarmasin', '', 'Bank Kalsel', '038.03.01.11178.5', 'Belum Kawin', 'fikriedo@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Hanwas'),
(51, 'Sri Tiningsih', 'Banjarmasin', '', 'Bank Kalsel', '038.03.01.17862.0', 'Kawin', 'sritiningsih@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', 'Sekretariat'),
(52, 'Firman Ahmadi', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.65387.6', 'Belum Kawin', 'firman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', 'Akuntansi'),
(53, 'M. Rif&#039;at', 'Banjarmasin', '', 'Bank Kalsel', '320.02.77.457', 'Belum Kawin', 'rifatm@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', 'Akuntansi'),
(55, 'Muhlisah', 'Banjarmasin', '', 'Bank Kalsel', '3200757901', 'Belum Kawin', 'muhlisa@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', 'PBMD'),
(56, 'Septiana', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.67420.7', 'Belum Kawin', 'septiana@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', 'PBMD'),
(57, 'Taufik Rahman', 'Banjarmasin', '', 'Bank Kalsel', '038.03.01.09871.5', 'Belum Kawin', 'taufik@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', 'Hanwas'),
(60, 'Dessy Intansari, S.Sos', 'Banjarmasin', '', 'Bank BRI', '1247-0100-1135-563', 'Belum Kawin', 'dessy@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', 'PBMD'),
(61, 'Muhammad Syarif Hidayatullah', 'Banjarmasin', '', 'Bank Kalsel', '012.03.01.56309.0', 'Belum Kawin', 'syarifhidayat@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', 'PBMD'),
(62, 'Firda Kharisma', 'Banjarmasin', 'THL', 'Bank BNI', '038.03.01.09054.6', 'Belum Kawin', 'firdakharisma1@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', 'PBMD'),
(63, 'Afrizal Andi', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.06543.9', 'Kawin', 'andiafrizal@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', 'Anggaran'),
(64, 'Andri Setiawan', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.04132.5', 'Kawin', 'andri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Pajak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transportasi`
--

DROP TABLE IF EXISTS `tb_transportasi`;
CREATE TABLE IF NOT EXISTS `tb_transportasi` (
  `id` int NOT NULL,
  `nama_provinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `besaran` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transportasi`
--

INSERT INTO `tb_transportasi` (`id`, `nama_provinsi`, `satuan`, `besaran`) VALUES
(1, 'Aceh', 'Orang/Kali', '12300000'),
(2, 'Sumatera Utara', 'Orang/Kali', '23200000'),
(3, 'Riau', 'Orang/Kali', '9400000'),
(4, 'Kepulauan Riau', 'Orang/Kali', '13700000'),
(5, 'Jambi', 'Orang/Kali', '15700000'),
(6, 'Sumatera Barat', 'Orang/Kali', '19000000'),
(7, 'Sumatera Selatan', 'Orang/Kali', '12800000'),
(8, 'Lampung', 'Orang/Kali', '16700000'),
(9, 'Bengkulu', 'Orang/Kali', '10900000'),
(10, 'Bangka Belitung', 'Orang/Kali', '9000000'),
(11, 'Banten', 'Orang/Kali', '44600000'),
(12, 'Jawa Barat', 'Orang/Kali', '16600000'),
(13, 'D.K.I Jakarta', 'Orang/Kali', '25600000'),
(14, 'Jawa Tengah', 'Orang/Kali', '7500000'),
(15, 'D.I Yogyakarta', 'Orang/Kali', '11800000'),
(16, 'Jawa Timur', 'Orang/Kali', '19400000'),
(17, 'Bali', 'Orang/Kali', '15900000'),
(18, 'Nusa Tenggara Barat', 'Orang/Kali', '23100000'),
(19, 'Nusa Tenggara Timur', 'Orang/Kali', '10800000'),
(20, 'Kalimantan Barat', 'Orang/Kali', '13500000'),
(21, 'Kalimantan Tengah', 'Orang/Kali', '11100000'),
(22, 'Kalimantan Selatan', 'Orang/Kali', '15000000'),
(23, 'kalimantan Timur', 'Orang/Kali', '45000000'),
(24, 'Kalimantan Utara', 'Orang/Kali', '10200000'),
(25, 'Selawesi Utara', 'Orang/Kali', '13800000'),
(26, 'Gorontalo', 'Orang/Kali', '24000000'),
(27, 'Sulawesi Barat', 'Orang/Kali', '31300000'),
(28, 'Sulawesi Selatan', 'Orang/Kali', '14500000'),
(29, 'Sulawesi Tengah', 'Orang/Kali', '16500000'),
(30, 'Sulawesi Tenggara', 'Orang/Kali', '17100000'),
(31, 'Maluku', 'Orang/Kali', '24000000'),
(32, 'Maluku Utara', 'Orang/Kali', '21500000'),
(33, 'papua', 'Orang/Kali', '43100000'),
(34, 'Papua Barat', 'Orang/Kali', '18200000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
