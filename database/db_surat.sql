-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 18 Jun 2023 pada 10.42
-- Versi server: 8.0.31
-- Versi PHP: 8.0.26

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
-- Struktur dari tabel `tb_bidang`
--

DROP TABLE IF EXISTS `tb_bidang`;
CREATE TABLE IF NOT EXISTS `tb_bidang` (
  `id_bidang` int NOT NULL AUTO_INCREMENT,
  `bidang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `bidang`) VALUES
(1, 'Anggaran'),
(2, 'Aset'),
(3, 'Akuntansi'),
(4, 'Pajak'),
(5, 'Sekretariat'),
(6, 'PBMD'),
(7, 'Hanwas'),
(8, 'Perbendaharaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

DROP TABLE IF EXISTS `tb_golongan`;
CREATE TABLE IF NOT EXISTS `tb_golongan` (
  `id_gol` int NOT NULL AUTO_INCREMENT,
  `kd_golongan` char(10) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_time` varchar(50) NOT NULL,
  `edit_by` varchar(50) NOT NULL,
  `edit_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gol`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_golongan`
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
-- Struktur dari tabel `tb_kabupaten`
--

DROP TABLE IF EXISTS `tb_kabupaten`;
CREATE TABLE IF NOT EXISTS `tb_kabupaten` (
  `id` char(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regencies_province_id_index` (`propinsi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data untuk tabel `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id`, `propinsi_id`, `nama`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nominatif`
--

DROP TABLE IF EXISTS `tb_nominatif`;
CREATE TABLE IF NOT EXISTS `tb_nominatif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `no_sppd` varchar(255) NOT NULL,
  `no_npd` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `lama` varchar(255) NOT NULL,
  `uang_harian` varchar(255) NOT NULL,
  `status_hotel` varchar(255) NOT NULL,
  `uang_hotel` varchar(255) NOT NULL,
  `travel_hotel` varchar(255) NOT NULL,
  `pagu_hotel` varchar(255) NOT NULL,
  `status_pesawat` varchar(255) NOT NULL,
  `uang_pesawat` varchar(255) NOT NULL,
  `travel_pesawat` varchar(255) NOT NULL,
  `pagu_pesawat` varchar(255) NOT NULL,
  `transport_asal` varchar(255) NOT NULL,
  `transport_tujuan` varchar(255) NOT NULL,
  `uang_presentatif` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pagu`
--

DROP TABLE IF EXISTS `tb_pagu`;
CREATE TABLE IF NOT EXISTS `tb_pagu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `program` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kegiatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sub_kegiatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `pagu_anggaran` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_pagu`
--

INSERT INTO `tb_pagu` (`id`, `program`, `kegiatan`, `sub_kegiatan`, `tahun`, `pagu_anggaran`) VALUES
(1, 'Penunjang Urusan Pemerintahan Daerah Kabupaten/Kota', 'Administrasi Umum Perangkat Daerah', 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD', '2023', 1357107000),
(2, 'Program Pengelolaan Pendapatan Daerah', 'Kegiatan Pengelolaan Pendapatan Daerah', 'Penagihan Pajak Daerah', '2023', 1865917800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
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
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `fk_gol` (`id_gol`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nip`, `nama`, `alamat`, `jabatan`, `nama_bank`, `kode_rekening`, `id_gol`, `bidang`, `npwp`, `nik`, `status`, `email`, `foto`, `password`) VALUES
(46, '19690112 199303 1 004', 'H. Edy Wibowo, SE', 'Banjarmasin', 'Kepala Badan', 'Bank Kalsel', '001.03.28.27810.1', 4, 'Kepala Badan', '14.976.820.2-731.000', '6371011201590000', 'Kawin', 'edywibowo@gmail.com', '../assets/pegawai/1.jpg', ''),
(47, '19740101 200501 1 023', 'Hendro, M.Pd', 'Banjarmasin', 'Sekretaris Badan', 'Bank Kalsel', '001.03.28.67091.2', 4, 'Sekretariat', '15.047.549.9-731.000', '-', 'Kawin', 'hendro@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(48, '19681110 198903 1 020', 'Pahriadi, SE, MM', 'Banjarmasin', 'Kepala Bidang Pengelolaan  Barang Milik Daerah', 'Bank Kalsel', '001.03.28.87202.6', 4, 'PBMD', '14.073.992.1-731.000', '-', 'Kawin', 'pahriadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(49, '19720405 199403 1 010', 'Muhammad Syahid, SE', 'Banjarmasin', 'Kepala Bidang Pendataan dan Penetapan Pajak Daerah', 'Bank Kalsel', '001.03.28.76091.4', 5, 'Pajak', '69.616.542.2-731.000', '-', 'Kawin', 'syahid@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(50, '19830327 201001 1 016', 'Ashadi Himawan, SH', 'Banjarmasin', 'Kepala Bidang Penagihan dan Pengawasan  Pajak Daer', 'Bank Kalsel', '001.03.28.35690.7', 5, 'Hanwas', '', '', 'Kawin', 'ashadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(51, '19850107 200501 1 001', 'Muhammad Ikhsan Lutfi, SE', 'Banjarmasin', 'Kepala Bidang Anggaran', 'Bank Kalsel', '001.03.09.40487.6', 6, 'Anggaran', '', '', 'Kawin', 'ikhsan@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(52, '19701202 199303 2 011', 'Hidayah Fitriani, SE', 'Banjarmasin', 'Kepala Bidang Akuntansi', 'Bank Kalsel', '001.03.28.18175.9', 4, 'Akuntansi', '', '', 'Kawin', 'hidayah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(53, '19820401 200501 2 016', 'Apriana Amalia, SE', 'Banjarmasin', 'Kepala Bidang Perbendaharaan', 'Bank Kalsel', '001.03.28.26678.9', 4, 'Sekretariat', '', '', 'Kawin', 'apriana@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(54, '19710112 199103 2 002', 'Hj. Nurin Aulia, SE', 'Banjarmasin', 'Kasubbag Perencanaan', 'Bank Kalsel', '001.03.28.17902.3', 5, 'Sekretariat', '08.382.504.2-731.000', '6371025201710000', 'Kawin', 'nurin@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(55, '19810408 200801 2 024', 'Hj.Puji Mawarti, SE', 'Banjarmasin', 'Analis Rencana Program dan Kegiatan  ', 'Bank Kalsel', '001.03.28.67091.4', 7, 'Sekretariat', '25.339.596.6-731.000', '6371044804810000', 'Kawin', 'puji@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(56, '19800206 201001 2 012', 'Vera Wahyuliana, SE', 'Banjarmasin', 'Kasubbag Umum dan Kepegawaian', 'Bank Kalsel', '001.03.28.70902.7', 7, 'Sekretariat', '15.496.123.9-731.000', '6371044602800005', 'Kawin', 'vera@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(57, '19650504 199303 2 008', 'Fatimah. M', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.78501.2', 7, 'Sekretariat', '15.593.181.9-731.000', '6371014405650010', 'Kawin', 'fatimah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(58, '19860626 201101 1 002', 'Wahyu Riadi, SE', 'Banjarmasin', 'Penyusun Kebutuhan Barang Inventaris', 'Bank Kalsel', '001.03.28.70943.8', 7, 'Sekretariat', '15.975.794.7-731.000', '6371012606860000', 'Kawin', 'wahyu@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(59, '19890709 201101 1 001', 'Windi Faridi, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana ', 'Bank Kalsel', '001.03.28.77890.3', 8, 'Sekretariat', '15.975.381.3-731.000', '6371010907890009', 'Kawin', 'windi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(60, '19780510 201212 1 001', 'Harsono', 'Banjarmasin', 'Pengadministrasi Kepegawaian', 'Bank Kalsel', '001.03.28.77990.7', 10, 'PBMD', '66.471.186.8-731.000', '6371031005780010', 'Kawin', 'harsono@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(61, '19701112 200901 1 001', 'Aspul Anwar', 'Banjarmasin', 'Pramubakti', 'Bank Kalsel', '001.03.28.20109.7', 11, 'Sekretariat', '', '', 'Belum Kawin', 'aspul@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(62, '19771106 200501 2 010', 'Astri Kusmiatin, SE', 'Banjarmasin', 'Kasubbag Keuangan ', 'Bank Kalsel', '001.03.28.67432.0', 5, 'Sekretariat', '', '', 'Kawin', 'astri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(63, '19820527 200501 2 013', 'Meilani Dewi, A.Md', 'Banjarmasin', 'Bendahara', 'Bank Kalsel', '001.03.28.78091.3', 6, 'Sekretariat', '15.047.858.4-731.000', '6371046705820000', 'Kawin', 'meiliani@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(64, '19730915 200701 1 011', 'Hermansyah, SE', 'Banjarmasin', 'Pengelola Keuangan', 'Bank Kalsel', '001.03.28.09074.5', 7, 'Pajak', '', '', 'Kawin', 'herman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(66, '19890522 201001 2 002', 'Meilia Rachmi, S.Ab', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.28.09216.4', 7, 'Sekretariat', '15.428.000.2-731.000', '6371016205890000', 'Kawin', 'meilia@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(67, '19880904 201001 2 004', 'Ika Novita Sari, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana', 'Bank Kalsel', '001.03.28.20703.9', 9, 'Sekretariat', '77.972.982.1-731.000', '6371054409880000', 'Kawin', 'novita@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(68, '19751222 200604 2 005', 'Wiwiek Indah Pertiwi', 'Banjarmasin', 'Pengadministrasi Keuangan', 'Bank', '2000365092', 8, 'Sekretariat', '49.297.331.8-721.000', '-', 'Kawin', 'wiwiek@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(69, '19731002 199403 2 002', 'Artha Kencana, SE', 'Banjarmasin', 'Kasubbid Penerimaan dan Pengelolaan Daerah', 'Bank Kalsel', '001.03.28.98652.0', 5, 'Akuntansi', '', '', 'Kawin', 'artha@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(70, '19851215 201001 2 015', 'Ida Rosanti, SE', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.26.13570.6', 7, 'Akuntansi', '', '', 'Kawin', 'idarosanti@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(71, '19750215 201001 2 004', 'Minarsih, SE', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.28.35791.3', 7, 'Akuntansi', '', '', 'Kawin', 'minarsih@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(72, '19820116 201001 1 002', 'Suhada Hanafi', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.97403.3', 10, 'Akuntansi', '', '', 'Kawin', 'suhada@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(73, '19860317 200803 2 001', 'Rizqi Annisa, Se, Ak', 'Banjarmasin', 'Kasubbid Pelaporan dan Evaluasi  ', 'Bank Kalsel', '001.03.28.56701.2', 5, 'Akuntansi', '', '', 'Kawin', 'rizqi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(74, '19740424 200604 2 032', 'Nurlita Hermina, SE', 'Banjarmasin', 'Penyusun Laporan Keuangan', 'Bank Kalsel', '001.03.28.19151.9', 5, 'Akuntansi', '', '', 'Kawin', 'nurlita@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(75, '19870418 201903 1 009', 'Pirdaus Anhar, SE', 'Banjarmasin', 'Analis Laporan Keuangan', 'Bank Kalsel', '001.03.28.01050.4', 8, 'Akuntansi', '', '', 'Kawin', 'pirdaus@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(76, '19840830 201001 1 001', 'Noor Imani, SE', 'Banjarmasin', 'Pengadministrasi Umum', 'Bank Kalsel', '001.03.28.66732.0', 10, 'Pajak', '', '', 'Kawin', 'inamiroon@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(77, '19870504 201101 1 003', 'M.Muslih Mubarak, SE', 'Banjarmasin', 'Plt. Analis Keuangan Pusat dan Daerah Ahli Muda ', 'Bank Kalsel', '001.03.28.67419.0', 8, 'Perbendaharaan', '15.975.793.9-731.000', '6304150405870000', 'Kawin', 'muslih@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(78, '19760803 199702 2 001', 'Rusmariyani, SE, MM', 'Banjarmasin', 'Kasubbid Pengelolaan Kas', 'Bank Kalsel', '001.03.28.67809.2', 5, 'Perbendaharaan', '49.070.190.1-731.000', '6371014308760010', 'Kawin', 'rusmari@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(79, '19770701 200801 1 022', 'Buchari Muslim', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.27278.6', 9, 'Perbendaharaan', '', '', 'Kawin', 'buchari@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(80, '19821201 201001 1 011', 'Abdy Darmawan, A.Md', 'Banjarmasin', 'Pengelola Data', 'Bank Kalsel', '001.03.28.14924.6', 1, 'Perbendaharaan', '', '', 'Kawin', 'abdydar@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(81, '19830517 201001 1 013', 'Deddy Widjayadi, S.Ak', 'Banjarmasin', 'Analis Transaksi Keuangan  ', 'Bank Kalsel', '001.03.28.56011.7', 8, 'Perbendaharaan', '', '', 'Kawin', 'deddy@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(82, '19660814 199303 2 008', 'Anita Anggraini, SE', 'Banjarmasin', 'Kasubbid Penatausahaan dan Rekonsiliasi', 'Bank Kalsel', '001.03.28.01020.0', 5, 'Sekretariat', '', '', 'Belum Kawin', 'anita@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(83, '19870727 201001 1 005', 'M. Taufik Zulhijra, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan ', 'Bank Kalsel', '001.03.28.88741.3', 7, 'Perbendaharaan', '15.964.537.3-731.000', '6371012707870000', 'Kawin', 'taufikzul@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(84, '19850323 200604 2 008', 'Noor Maya Sari', 'Banjarmasin', 'Pengadministrasi Keuangan', 'Bank Kalsel', '001.03.28.11009.9', 9, 'Perbendaharaan', '15.966.844.1-731.000', '6371036303850000', 'Kawin', 'mayasari@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(85, '19660910 199303 2 013', 'Farhiah', 'Banjarmasin', 'Pengadministrasi Keuangan', 'Bank Kalsel', '001.03.28.03751.7', 7, 'Perbendaharaan', '77.972.985.4-731.000', '6371015009660000', 'Belum Kawin', 'farhiah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(86, '19960414 201808 2 001', 'Selvia Herlina, S.Stp', 'Banjarmasin', 'Analis  laporan Pertanggungjawaban Bendahara', 'Bank Kalsel', '001.03.28.00542.4', 8, 'Perbendaharaan', '82.220.664.5-711.000', '6203015404960006', 'Kawin', 'selvia@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(87, '19790128 201212 1 002', 'Adi Mata Angin', 'Banjarmasin', 'Pengadministrasi Umum', 'Bank Kalsel', '001.03.28.13055.4', 10, 'Perbendaharaan', '', '', 'Kawin', 'adimata@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(88, '19860713 201001 1 006', 'Anugerah Hari Achadianto, SE', 'Banjarmasin', 'Kasubbid Penyusunan Anggaran', 'Bank Kalsel', '001.03.28.30357.7', 7, 'Anggaran', '', '', 'Kawin', 'anugerah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(89, '19861104 201001 2 008', 'Nurma Dwi Rahmaniah, SM', 'Banjarmasin', 'Analis Sistem Informasi Pelaksanaan Anggaran', 'Bank Kalsel', '001.03.28.07065.5', 7, 'Anggaran', '', '', 'Kawin', 'nurma@gmailcom', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(90, '19760927 200701 1 012', 'Anriady', 'Banjarmasin', 'Pengadministrasi Anggaran', 'Bank Kalsel', '001.03.28.20300.1', 9, 'Anggaran', '', '', 'Kawin', 'anriady@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(91, '19820824 200501 1 002', 'Rozie, SE', 'Banjarmasin', 'Kasubbid  Penyusunan Regulasi Teknis dan Pengendal', 'Bank Kalsel', '001.03.28.22340.0', 6, 'Anggaran', '', '', 'Kawin', 'rozie@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(92, ' 19840430 201001 1 012', 'Ardiansyah, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana', 'Bank Kalsel', '001.03.28.89870.6', 7, 'Perbendaharaan', '', '', 'Kawin', 'ardiansyah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(93, '19820708 201001 1 017', 'Muhammad Haris Arsyad, S.Si, M.Ec.Dev', 'Banjarmasin', 'Penilai Pemerintah Ahli Muda', 'Bank Kalsel', '001.03.28.76901.5', 6, 'PBMD', '49.740.027.5-731.000', '6371040807820010', 'Kawin', 'harisa@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(94, '19691110 198903 1 005', 'Nabehanun Naji, S.Ap', 'Banjarmasin', 'Kasubbid Perencanaan Kebutuhan Pemanfaatan dan Pen', 'Bank Kalsel', '001.03.28.78092.5', 5, 'PBMD', '15.047.727.1-731.000', '6371041011690015', 'Kawin', 'naji@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(95, '19700210 199002 2 001', 'Noorasiah', 'Banjarmasin', 'Pengadministrasian Umum', 'Bank Kalsel', '001.03.28.17627.5', 7, 'PBMD', '15.047.722.2-731.000', '6371025002700010', 'Kawin', 'noorasiah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(96, ' 19820820 201001 2 020', 'Kamaria Kristina, S.Sos', 'Banjarmasin', 'Pengelola  Data', 'Bank Kalsel', '001.03.28.09167.2', 7, 'PBMD', '66.178.385.2-731.000', '6371016008820000', 'Kawin', 'kamaria@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(97, '19860404 200501 2 003', 'Rica Agustina, SE', 'Banjarmasin', 'Pengelola  Data', 'Bank Kalsel', '001.03.28.78901.6', 8, 'PBMD', '08.380.529.1-731.000', '6371014404860010', 'Kawin', 'rica@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(98, '19720222 199203 1 005', 'Dadang Fahriansyah', 'Banjarmasin', 'Kustodian Barang Milik Negara', 'Bank Kalsel', '001.03.28.22779.7', 7, 'PBMD', '', '', 'Belum Kawin', 'dadang@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(100, '19791210 200501 2 016', 'Yuliana, S.Sos', 'Banjarmasin', 'Kustodian Barang Milik Negara ', 'Bank Kalsel', '001.03.28.89025.6', 7, 'PBMD', '15.047.729.7-731.000', '6371045012790000', 'Kawin', 'yuliana@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(101, '19790913 201001 2 012', 'Norlaili, SE', 'Banjarmasin', 'Analis Aset Daerah', 'Bank Kalsel', '001.03.28.67209.5', 7, 'PBMD', '48.444.418.7-731.000', '6371045309790000', 'Kawin', 'norlaili@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(102, '19660207 200604 2 008', 'Kastaniah', 'Banjarmasin', 'Pengadministrasian Umum', 'Bank Kalsel', '001.03.28.03097.1', 9, 'PBMD', '15.047.730.5-731.000', '6371054702660000', 'Kawin', 'kastaniah2gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(103, '19830826 201001 1 001', 'Agus Setya Arief', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.11063.7', 11, 'PBMD', '', '', 'Kawin', 'agusetya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(104, '19880530 201001 2 005', 'Indah Citra Lestari, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana ', 'Bank Kalsel', '001.03.28.09167.6', 7, 'PBMD', '15.964.283.4-731.000', '6371047005880000', 'Kawin', 'indahc@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(105, '19840726 201001 2 005', 'Nur Hasanah, A.Md', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan', 'Bank Kalsel', '001.03.28.90927.5', 7, 'Anggaran', '', '', 'Kawin', 'hasanah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(106, '19720126 200801 1 007', 'Dody Esfandiary', 'Banjarmasin', 'Pengadministrasian Umum', 'Bank Kalsel', '001.03.28.22109.6', 9, 'PBMD', '', '', 'Kawin', 'dody@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(107, '19650711 198703 1 007', 'Sakimin', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.12345.7', 5, 'UPT', '', '', 'Kawin', 'sakimin@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(108, '19831015 200604 1 005', 'Arif Rahman Hakim, S.Ak', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.75935.9', 8, 'UPT', '', '', 'Kawin', 'arifrahman@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(109, '19771105 201001 1 006', 'Hendriansyah, A.Md', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.54029.4', 7, 'UPT', '', '', 'Kawin', 'hendri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(110, '19720625 199503 1 001', 'Nasrullah', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.29537.3', 6, 'UPT', '', '', 'Belum Kawin', 'nasrullah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(111, ' 19750729 200604 1 012', 'Juli Amaril, A.Md', 'Banjarmasin', 'Kepala Unit Pelaksana Teknis Daerah Pajak Daerah B', 'Bank Kalsel', '001.03.28.40173.0', 7, 'UPT', '', '', 'Kawin', 'juli@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(112, '19820501 201001 1 001', 'M. Syarif, SH, MH', 'Banjarmasin', 'Kasubbid Penagihan ', 'Bank Kalsel', '001.03.28.55609.1', 7, 'Hanwas', '', '', 'Kawin', 'syarif@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(113, '19670507 200604 1 008', 'Rahmadi', 'Banjarmasin', 'Pengolah Data', 'Bank Kalsel', '001.03.28.77890.8', 10, 'Pajak', '', '', 'Kawin', 'rahmadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(114, ' 19820427 200901 1 001', 'Fathur Rahman', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.09652.3', 9, 'Hanwas', '', '', 'Kawin', 'fathur@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(115, '19770405 200801 1 019', 'Fathurrahman', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.01091.0', 9, 'Hanwas', '', '', 'Kawin', 'rahmanfathur@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(116, '19830228 200803 1 005', 'Andi Irawan, S.Kom', 'Banjarmasin', 'Kasubbid Pemeriksaan dan Pengawasan ', 'Bank Kalsel', '001.03.28.67421.0', 5, 'Hanwas', '', '', 'Kawin', 'andi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(117, '19780804 201001 2 005', 'Zarmis Nadra, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan ', 'Bank Kalsel', '001.03.28.45679.0', 7, 'Hanwas', '', '', 'Kawin', 'zarmis@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(118, '19850119 200501 2 003', 'Nilla Pandan Sari, SE', 'Banjarmasin', 'Analis Pemeriksaan Pajak', 'Bank Kalsel', '001.03.28.56013.0', 7, 'Hanwas', '', '', 'Kawin', 'nillapandan@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(119, '19850909 201502 2 002', 'Rini Wijayanti, A.Md', 'Banjarmasin', 'Pengelola Data  ', 'Bank Kalsel', '001.03.28.50981.0', 9, 'Hanwas', '', '', 'Kawin', 'riniwijaya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(120, '19840313 200501 1 004', 'Fauzian Noor, SE', 'Banjarmasin', 'Analis Keuangan Pusat dan Daerah Ahli Muda ', 'Bank Kalsel', '001.03.28.09076.7', 6, 'Pajak', '', '', 'Kawin', 'fauzian@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(121, ' 19741019 200803 1 001', 'Fitriadi, S.Kom', 'Banjarmasin', 'Kasubbid Pendataan dan Penilaian Pajak Daerah  ', 'Bank Kalsel', '001.03.28.20409.0', 5, 'Pajak', '', '', 'Kawin', 'fitriadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(122, '19801009 201001 1 002', 'Muliadi', 'Banjarmasin', 'Pengolah Data', 'Bank Kalsel', '001.03.28.66780.0', 10, 'Pajak', '', '', 'Belum Kawin', 'muliadi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(123, '19771106201001 1 001', 'Mohd. Syamsu Rizal', 'Banjarmasin', 'Pengadministrasi Umum ', 'Bank Kalsel', '001.03.28.03901.4', 10, 'Pajak', '', '', 'Kawin', 'syamsu@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(124, '19781119 200701 1 007', 'Ade Novrianda Adhita', 'Banjarmasin', 'Pengadministrasi Pajak ', 'Bank Kalsel', '001.03.28.55660.3', 8, 'Pajak', '', '', 'Belum Kawin', 'adenovri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(3).jpeg', ''),
(125, '19790415 200901 2 001', 'Susiati', 'Banjarmasin', 'Pengadministrasi Pajak', 'Bank Kalsel', '001.03.28.00123.0', 9, 'Pajak', '', '', 'Belum Kawin', 'susiati@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(126, '19790425 200701 1 007', 'Arief Rahman, S.Ap', 'Banjarmasin', 'Kasubbid Penetapan dan Keberatan ', 'Bank Kalsel', '001.03.28.78290.2', 7, 'Pajak', '', '', 'Kawin', 'ariefrhmn@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', ''),
(127, '19871002 201001 2 005', 'Patimah Muliani Ningsih, S.Kom', 'Banjarmasin', 'Pranata Komputer Pelaksana Lanjutan', 'Bank Kalsel', '001.03.28.67341.7', 7, 'Pajak', '', '', 'Kawin', 'patimah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(4).jpeg', ''),
(128, '19771002 200701 2 004', 'Hj. Myrna Sylvia', 'Banjarmasin', 'Pengelola Data  ', 'Bank Kalsel', '001.03.28.70932.0', 8, 'Pajak', '', '', 'Kawin', 'myrna@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(1).jpeg', ''),
(129, '19970522 201808 1 001', 'Oscarrisandy Pratama Putra, S.STP', 'Banjarmasin', 'Analis Pemeriksaan Pajak', 'Bank Kalsel', '3200367201', 8, 'Hanwas', '', '', 'Kawin', 'oscarrisandy@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', ''),
(130, '19860110 201502 1 002', 'Mursidi Anhar, A.Md', 'Banjarmasin', 'Juru Sita', 'Bank Kalsel', '001.03.28.56309.0', 8, 'Hanwas', '', '', 'Kawin', 'mursidi@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(6).jpeg', ''),
(131, '19911017 202203 1  005', 'Royyan Ronaldi Hermawan, SE', 'Banjarmasin', 'Analis Pajak dan Retribusi Daerah', 'Bank', '320.05.89.123.981', 8, 'Pajak', '', '', 'Kawin', 'royyan@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(132, '19950208 202203 1 005', 'Gusti Indra Rachmadani, SM', 'Banjarmasin', 'Analis Aset Daerah ', 'Bank', '3200515609', 8, 'PBMD', '65.143.704.8-731.000', '-', 'Kawin', 'gusti@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(7).jpeg', ''),
(133, '19940303 201609 2 001', 'Sri Fathanah, S.STP, M.A', 'Banjarmasin', 'Analis Pembiayaan Daerah', 'Bank Kalsel', '3201013579', 6, 'Anggaran', '', '', 'Kawin', 'srifathanah@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(5).jpeg', ''),
(134, 'admin', '', '', '', '', '', 0, '', '', '', '', '', NULL, '123'),
(141, 'AAA', 'AAA', 'AAA', 'A', 'AAA', 'AAA', 0, 'ANGGARAN', '', '', '1', '', '../assets/pegawai/AAA.jpg', '123456'),
(142, '123123', 'asdadrfgdf', 'dfs', 'safsad', 'sdfs', '123414123414', 1, 'ANGGARAN', '', '', '1', '', NULL, '123456'),
(143, '123432', 'adfsdf', 'asd', 'afsda', 'dasda', '123464353453', 4, 'Sekretariat', '', '', '2', '', NULL, '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penggajihan`
--

DROP TABLE IF EXISTS `tb_penggajihan`;
CREATE TABLE IF NOT EXISTS `tb_penggajihan` (
  `id_penggajihan` int NOT NULL AUTO_INCREMENT,
  `penggajihan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_penggajihan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penginapan`
--

DROP TABLE IF EXISTS `tb_penginapan`;
CREATE TABLE IF NOT EXISTS `tb_penginapan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `propinsi` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `kategori1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_penginapan`
--

INSERT INTO `tb_penginapan` (`id`, `propinsi`, `satuan`, `kategori1`, `kategori2`, `kategori3`) VALUES
(2, '12', 'OH', '50000', '40000', '30000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perintah_tugas`
--

DROP TABLE IF EXISTS `tb_perintah_tugas`;
CREATE TABLE IF NOT EXISTS `tb_perintah_tugas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(100) NOT NULL,
  `nama` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dasar` varchar(350) NOT NULL,
  `untuk` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_perintah_tugas`
--

INSERT INTO `tb_perintah_tugas` (`id`, `no_spt`, `nama`, `dasar`, `untuk`) VALUES
(30, '800/002/Sekr/BPKPAD/V/2023', 'Abdy Darmawan, A.Md', '1. Nota Dinas Badan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin tanggal\r\n10 Februari 2023 Nomor: 900/147/Sekr/BPKPAD/II/2022 Perihal: Mohon Izin Studi\r\nKomperatif ke Badan Pengelolaan Keuangan dan Aset (BPKAD) Kota Surabaya tentang\r\nPenatausahaan Penerimaan Daerah.\r\n2. Disposisi Walikota Banjarmasin.\r\n', '1. Melakukan Studi Komperatif ke Badan Pengelolaan Keuangan dan Aset Daerah\r\n(BPKAD) Kota tentang Penatausahaan Pajak Daerah Tanggal 22 s.d 24 Februari\r\n2023 Surabaya.\r\n2. Setelah selesai melaksanakan tugas, melaporkan tertulis yang menugaskan.\r\n3. Diindahkan sebagaimana mestinya.'),
(31, '800/002/Sekr/BPKPAD/V/2023', 'Ade Novrianda Adhita', '1. Nota Dinas Badan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin tanggal\r\n10 Februari 2023 Nomor: 900/147/Sekr/BPKPAD/II/2022 Perihal: Mohon Izin Studi\r\nKomperatif ke Badan Pengelolaan Keuangan dan Aset (BPKAD) Kota Surabaya tentang\r\nPenatausahaan Penerimaan Daerah.\r\n2. Disposisi Walikota Banjarmasin.\r\n', '1. Melakukan Studi Komperatif ke Badan Pengelolaan Keuangan dan Aset Daerah\r\n(BPKAD) Kota tentang Penatausahaan Pajak Daerah Tanggal 22 s.d 24 Februari\r\n2023 Surabaya.\r\n2. Setelah selesai melaksanakan tugas, melaporkan tertulis yang menugaskan.\r\n3. Diindahkan sebagaimana mestinya.'),
(32, '800/002/Sekr/BPKPAD/V/2023', 'Adi Mata Angin', '1. Nota Dinas Badan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin tanggal\r\n10 Februari 2023 Nomor: 900/147/Sekr/BPKPAD/II/2022 Perihal: Mohon Izin Studi\r\nKomperatif ke Badan Pengelolaan Keuangan dan Aset (BPKAD) Kota Surabaya tentang\r\nPenatausahaan Penerimaan Daerah.\r\n2. Disposisi Walikota Banjarmasin.\r\n', '1. Melakukan Studi Komperatif ke Badan Pengelolaan Keuangan dan Aset Daerah\r\n(BPKAD) Kota tentang Penatausahaan Pajak Daerah Tanggal 22 s.d 24 Februari\r\n2023 Surabaya.\r\n2. Setelah selesai melaksanakan tugas, melaporkan tertulis yang menugaskan.\r\n3. Diindahkan sebagaimana mestinya.'),
(42, '800/005/Sekr/BPKPAD/V/2023', 'Abdy Darmawan, A.Md', '1. Nota Dinas Badan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin tanggal\n10 Februari 2023 Nomor: 900/147/Sekr/BPKPAD/II/2022 Perihal: Mohon Izin Studi\nKomperatif ke Badan Pengelolaan Keuangan dan Aset (BPKAD) Kota Surabaya tentang\nPenatausahaan Penerimaan Daerah.\n2. Disposisi Walikota Banjarmasin.', '1. Melakukan Studi Komperatif ke Badan Pengelolaan Keuangan dan Aset Daerah\n(BPKAD) Kota tentang Penatausahaan Pajak Daerah Tanggal 22 s.d 24 Februari\n2023 Surabaya.\n2. Setelah selesai melaksanakan tugas, melaporkan tertulis yang menugaskan.\n3. Diindahkan sebagaimana mestinya.'),
(43, '800/005/Sekr/BPKPAD/V/2023', 'Ade Novrianda Adhita', '1. Nota Dinas Badan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin tanggal\n10 Februari 2023 Nomor: 900/147/Sekr/BPKPAD/II/2022 Perihal: Mohon Izin Studi\nKomperatif ke Badan Pengelolaan Keuangan dan Aset (BPKAD) Kota Surabaya tentang\nPenatausahaan Penerimaan Daerah.\n2. Disposisi Walikota Banjarmasin.', '1. Melakukan Studi Komperatif ke Badan Pengelolaan Keuangan dan Aset Daerah\n(BPKAD) Kota tentang Penatausahaan Pajak Daerah Tanggal 22 s.d 24 Februari\n2023 Surabaya.\n2. Setelah selesai melaksanakan tugas, melaporkan tertulis yang menugaskan.\n3. Diindahkan sebagaimana mestinya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perjalan_dinas`
--

DROP TABLE IF EXISTS `tb_perjalan_dinas`;
CREATE TABLE IF NOT EXISTS `tb_perjalan_dinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_sppd` varchar(30) NOT NULL,
  `no_spt` varchar(30) NOT NULL,
  `maksud` varchar(255) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `tempat_berangkat` varchar(100) NOT NULL,
  `tempat_tujuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama` int NOT NULL,
  `pengikut` varchar(255) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `mata_anggaran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_perjalan_dinas`
--

INSERT INTO `tb_perjalan_dinas` (`id`, `no_sppd`, `no_spt`, `maksud`, `transportasi`, `tempat_berangkat`, `tempat_tujuan`, `tanggal_berangkat`, `tanggal_kembali`, `lama`, `pengikut`, `instansi`, `mata_anggaran`, `keterangan`) VALUES
(6, '090/003/Sekr/BPKPAD/VI/2023', '800/002/Sekr/BPKPAD/V/2023', 'makdus', 'Pesawat atau Transportasi Lain yang Menunjang', 'Banjarmasin', 'KOTA BANDA ACEH', '2023-06-01', '2023-06-03', 3, '2', 'Badan Pengelola Keuangan, Pendapatan dan Aset Daerah', 'aaa', 'aaaaaa'),
(5, '800/002/Sekr/BPKPAD/VI/2023', '800/002/Sekr/BPKPAD/V/2023', 'maksud', 'Pesawat atau Transportasi Lain yang Menunjang', 'Banjarmasin', 'KABUPATEN SIMEULUE', '2023-06-08', '2023-06-10', 3, '1', 'Badan Pengelola Keuangan, Pendapatan dan Aset Daerah', 'mata', 'keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesawat`
--

DROP TABLE IF EXISTS `tb_pesawat`;
CREATE TABLE IF NOT EXISTS `tb_pesawat` (
  `id_pesawat` int NOT NULL,
  `kota` varchar(50) NOT NULL,
  `bisnis` decimal(40,0) NOT NULL,
  `ekonomi` decimal(40,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_pesawat`
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
-- Struktur dari tabel `tb_propinsi`
--

DROP TABLE IF EXISTS `tb_propinsi`;
CREATE TABLE IF NOT EXISTS `tb_propinsi` (
  `id` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data untuk tabel `tb_propinsi`
--

INSERT INTO `tb_propinsi` (`id`, `nama`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rek_kegiatan`
--

DROP TABLE IF EXISTS `tb_rek_kegiatan`;
CREATE TABLE IF NOT EXISTS `tb_rek_kegiatan` (
  `id_rek` int NOT NULL AUTO_INCREMENT,
  `id_sub` int NOT NULL,
  `kode_rekening` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uraian` varchar(2000) NOT NULL,
  `anggaran` bigint NOT NULL,
  PRIMARY KEY (`id_rek`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_rek_kegiatan`
--

INSERT INTO `tb_rek_kegiatan` (`id_rek`, `id_sub`, `kode_rekening`, `uraian`, `anggaran`) VALUES
(2, 1, '123123', 'adads', 123123123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rek_travel`
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rek_travel`
--

INSERT INTO `tb_rek_travel` (`id`, `nama`, `norek`, `status`, `created_by`, `created_time`, `edit_by`, `edit_time`) VALUES
(1, 'MASINAH (PT. FIRDAUS ABADI TOUR & TRAVEL)', '001.03.01.14328.9	', 0, '', '', '', ''),
(2, 'PT. TONYMAS MEGAH WISATA (PT. TONYMAS MEGAH WISATA', '0380.0070.005.55	', 0, '', '', '', ''),
(3, 'RICKY CHANDRA (PT. CHANDRA GEMILANG ANGKASA TOUR &', '001.03.52.00607.1	', 0, '', '', '', ''),
(4, 'LIA DESTI ANDRIYANI (LIA TOURS & TRAVEL)', '200.27.84.947	', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spt`
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
-- Struktur dari tabel `tb_thl`
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_thl`
--

INSERT INTO `tb_thl` (`id`, `nama`, `alamat`, `jabatan`, `nama_bank`, `kode_rekening`, `status`, `email`, `foto`, `bidang`) VALUES
(24, 'Muhammad Aditiya Yanuari', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.65091.0', 'Belum Kawin', 'aditiya@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08.jpeg', 'Hanwas'),
(25, 'Muhammad Ridho Wahyudi', 'Banjarmasin', 'THL', 'Bank Kalsel', '001.03.01.09017.6', 'Kawin', 'wahyudi@gmail.com', 'Muhammad Ridho Wahyudi.jpg', 'PAJAK'),
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
(64, 'Andri Setiawan', 'Banjarmasin', '', 'Bank Kalsel', '001.03.01.04132.5', 'Kawin', 'andri@gmail.com', 'WhatsApp Image 2023-01-28 at 11.47.08(2).jpeg', 'Pajak'),
(67, 'hnfjf', 'ghf', 'THL', 'fghf', '1231231', 'Belum Kawin', 'fghf', '../assets/thl/hnfjf.jpg', 'Anggaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transportasi`
--

DROP TABLE IF EXISTS `tb_transportasi`;
CREATE TABLE IF NOT EXISTS `tb_transportasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `besaran` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_transportasi`
--

INSERT INTO `tb_transportasi` (`id`, `nama_provinsi`, `satuan`, `besaran`) VALUES
(1, '11', 'Orang/Kali', '12300000'),
(2, '12', 'Orang/Kali', '23200000'),
(3, '14', 'Orang/Kali', '9400000'),
(4, '21', 'Orang/Kali', '13700000'),
(5, '15', 'Orang/Kali', '15700000'),
(6, '13', 'Orang/Kali', '19000000'),
(7, '16', 'Orang/Kali', '12800000'),
(8, '18', 'Orang/Kali', '16700000'),
(9, '17', 'Orang/Kali', '10900000'),
(10, '31', 'Orang/kali', '2560000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_uang_harian`
--

DROP TABLE IF EXISTS `tb_uang_harian`;
CREATE TABLE IF NOT EXISTS `tb_uang_harian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_propinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `besaran` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_uang_harian`
--

INSERT INTO `tb_uang_harian` (`id`, `id_propinsi`, `satuan`, `besaran`) VALUES
(1, '11', 'OH', '360000'),
(8, '21', 'OH', '370000'),
(3, '12', 'OH', '370000'),
(4, '13', 'OH', '370000'),
(5, '14', 'OH', '370000'),
(6, '15', 'OH', '380000'),
(7, '16', 'OH', '380000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
