-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 03:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_tindakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `id_asuransi` bigint(20) UNSIGNED NOT NULL,
  `nama_asuransi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_asuransi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_asuransi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asuransi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asuransi`
--

INSERT INTO `asuransi` (`id_asuransi`, `nama_asuransi`, `email_asuransi`, `no_telp_asuransi`, `alamat_asuransi`, `created_at`, `updated_at`) VALUES
(1, 'PT. ASURANSI WAHANA TATA', 'aswata@gmail.com', '0321 78781728', 'Jakarta', NULL, NULL),
(10, 'PT ASURANSI HARTA AMAN P', 'harta@asuransi-harta.co.id', '(021) 570 2060', 'Jakarta', '2022-04-07 18:43:47', '2022-04-19 20:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` bigint(20) UNSIGNED NOT NULL,
  `code_divisi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `code_divisi`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'DIV001', 'HUMAN RESOURCE', '2022-02-17 17:00:00', '2022-02-17 17:00:00'),
(2, 'DIV002', 'TAX', '2022-02-18 00:14:58', '2022-02-18 00:14:58'),
(3, 'DIV003', 'ACCOUNTING', '2022-02-18 00:15:13', '2022-02-18 00:15:13'),
(4, 'DIV004', 'IT', '2022-02-18 00:15:24', '2022-02-18 00:15:24'),
(5, 'DIV005', 'PPIC', '2022-02-18 00:15:55', '2022-02-18 00:15:55'),
(6, 'DIV006', 'K3', '2022-02-18 00:17:05', '2022-02-18 00:17:05'),
(7, 'DIV007', 'Logistik', '2022-04-19 23:28:48', '2022-04-19 23:28:48'),
(8, 'DIV008', 'Marketing', '2022-04-19 23:29:01', '2022-04-19 23:29:01'),
(9, 'DIV009', 'General Affair', '2022-04-19 23:29:21', '2022-04-19 23:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenis_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `nopol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rangka` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mesin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tonase` double(8,2) DEFAULT NULL,
  `atas_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemakai_kendaraan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `polis_asuransi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_ex_asuransi` date DEFAULT NULL,
  `asuransi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_ex_stnk` date DEFAULT NULL,
  `tgl_ex_pajak_stnk` date DEFAULT NULL,
  `tgl_ex_kir` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nopol`, `jenis_kendaraan`, `tahun_kendaraan`, `warna_kendaraan`, `no_rangka`, `no_mesin`, `tonase`, `atas_nama`, `pemakai_kendaraan_id`, `polis_asuransi`, `tgl_ex_asuransi`, `asuransi_id`, `tgl_ex_stnk`, `tgl_ex_pajak_stnk`, `tgl_ex_kir`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, 'S 1027 VZ', 'KJG INNOVA', '2009', 'HITAM', 'MHFXR420590005525', '2KD6426394', NULL, 'PT. WAHANA PELITA PERSADA', 4, NULL, '2022-04-07', 1, '2026-02-27', '2023-02-27', NULL, 'ex L 1275 HT', '2022-04-17 23:27:58', '2022-04-19 23:48:01'),
(17, 'L 5675 EA', 'HONDA BEAT', '2010', 'MERAH', 'MH1JF2217AK255846', 'JF22E1251566', NULL, 'ADI WIJAYA KOMARYONO', 5, NULL, NULL, NULL, '2025-01-23', '2023-01-23', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 23:50:03'),
(18, 'W 5231 DU', 'HONDA REVO', '2011', 'HITAM', 'MH1JBC129BK222697', 'JBC1E2211569', NULL, 'SASTRO KOMARJONO', 6, NULL, NULL, NULL, '2026-01-26', '2023-01-26', NULL, 'ex W 6257 JK', '2022-04-17 23:27:58', '2022-04-19 23:50:29'),
(19, 'L 1733 ZA', 'T. KIJANG INNOVA', '2010', 'SILVER METALIK', 'MHFXR42G6A0005604', '2KD6437885', NULL, 'ARIS CATUR WICAKSONO', 7, '027.4050.301.2021.000792.00', '2022-03-22', 1, '2025-01-29', '2023-01-29', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:30:50'),
(20, 'L 5834 XO', 'HONDA SUPRA X 125', '2011', 'PUTIH HIJAU', 'MH1JBF112BK004786', 'JBF1E1004606', NULL, 'MISTAMAR', 8, NULL, NULL, NULL, '2022-01-30', '2023-01-30', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:31:15'),
(21, 'L 9739 W', 'TRUK DROOP SIDE', '2011', 'KUNING', 'MHMFE71P1BK029952', '4D34TGY1099', NULL, 'ELSA AYU MARYONO', 9, '10202012100435', '2022-09-03', 10, '2022-02-20', '2023-02-20', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:31:40'),
(22, 'L 1936 VG', 'T. KIJANG INNOVA', '2012', 'BIRU TUA METALIK', 'MHFXR42G9C0011545', '2KD6959947', NULL, 'MANGUN CIPTO RAHARJO', 10, NULL, '2022-04-18', NULL, '2023-02-24', NULL, NULL, 'diperpanjang pemakai', '2022-04-17 23:27:58', '2022-04-26 18:32:21'),
(23, 'L 1510 KD', 'MERC BENZ', '2016', 'HITAM METALIK', 'WDC1569432J269487', '270910E1000221', NULL, 'VONNY PRAYOGO', 11, '027.1050.301.2021.002980.00', '2022-04-30', 1, '2022-04-13', '2022-04-13', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:33:53'),
(24, 'L 6174 AG', 'SUPRA FIT X', '2008', 'HITAM', 'MH1HB711XBK393030', 'HB71E1390278', NULL, 'ADI WIJAYA KOMARYONO', 12, NULL, NULL, NULL, '2023-04-22', '2022-04-22', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:35:06'),
(25, 'S 8194 SC', 'TRUCK BOX', '2021', 'HIJAU', 'MJEC1JG41M5193634', 'W04DTPJ86539', NULL, 'PT WIJAYA PRAWIRA PERKASA', 13, NULL, NULL, 1, '2026-05-20', '2022-05-20', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:35:37'),
(26, 'L 1124 PX', 'LEXUS RX 270 AT', '2014', 'HITAM', 'JTJZA11A4E2461860', '1AR1106605', NULL, 'RANGGA MAYANG', 14, '10202012100435', '2022-09-03', 10, '2025-05-29', '2022-05-29', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:36:18'),
(27, 'S 7177 T', 'IZUSU ELF', '2020', 'PUTIH', 'MHCNLR55HLIO88273', 'MO88273', NULL, 'PT. WIJAYA PRAWIRA PERKASA', 15, NULL, NULL, NULL, '2025-05-29', '2022-05-29', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:36:47'),
(28, 'S 8232 SC', 'TRUK DROOP SIDE', '2021', 'HIJAU', 'MJEC1JG53M5006439', 'W04DTRR82799', NULL, 'PT. WAHANA PELITA PERSADA', 16, NULL, NULL, NULL, '2026-06-03', '2022-06-03', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:37:41'),
(29, 'S 8231 SC', 'TRUK DROOP SIDE', '2021', 'HIJAU', 'MJEC1JG53M5006440', 'W04DTRR82794', NULL, 'PT. WAHANA PELITA PERSADA', 17, NULL, NULL, NULL, '2026-06-03', '2022-06-03', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:39:26'),
(30, 'W 5501 EE', 'HONDA SUPRA 125 TR', '2011', 'MERAH HITAM', 'MH1JB912XBK564162', 'JB91E2554801', NULL, 'ILANDARI YATI', 18, NULL, NULL, NULL, '2026-07-05', '2022-07-05', NULL, 'ex W 5293 G', '2022-04-17 23:27:58', '2022-04-26 18:40:39'),
(31, 'L 1552 XE', 'NEW XENIA', '2013', 'SILVER METALIK', 'MHKV1BA1JDK023700', 'MB53371', NULL, 'GALIH PUTRA ISTIAWAN, SH', 2, '10202012100435', '2022-09-03', 10, '2023-07-08', '2022-07-08', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:41:12'),
(32, 'L 1604 IW', 'NEW XENIA', '2012', 'SILVER METALIK', 'MHKV1AA2JCK009375', 'DP64185', NULL, 'FITRAH TAUFANI', NULL, '10202012100435', '2022-09-03', 10, '2022-07-10', '2022-07-10', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 00:54:26'),
(33, 'W 1405 CL', 'NEW XENIA', '2014', 'SILVER METALIK', 'MHKV1BA1JEK042304', 'ME13211', NULL, 'ALIP SUTIKNO', 19, '10202012100435', '2022-09-03', 10, '2022-07-12', '2022-07-12', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:42:13'),
(34, 'W 1433 CL', 'NEW XENIA', '2014', 'SILVER METALIK', 'MHKV1BBJEK009563', 'ME22204', NULL, 'BUDIANTO', 20, '10202012100435', '2022-09-03', 10, '2022-07-12', '2022-07-12', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:42:52'),
(35, 'W 1706 CL', 'ALPHARD', '2007', 'ABU-ABU METALIK', 'ANH100149490', '2AZB206791', NULL, 'NURUL SAIFUDIN', 21, '10202012100435', '2022-09-03', 10, '2022-07-19', '2022-07-19', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:43:33'),
(36, 'W 1704 CL', 'HONDA CR-V', '2010', 'COKLAT TUA', 'MHRRE1840AJ002554', 'R20A14814277', NULL, 'SAMSUL HIDAYAT', 5, NULL, NULL, NULL, '2022-07-19', '2022-07-19', NULL, 'dijual', '2022-04-17 23:27:58', '2022-04-26 18:44:25'),
(37, 'W 1270 CM', 'HONDA MOBILIO', '2015', 'ABU-ABU MUDA', 'MHRDD4850FJ412720', 'L15Z11193039', NULL, 'ALAMAH', 22, '10202012100435', '2022-09-03', 10, '2022-08-07', '2022-08-07', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:46:03'),
(38, 'W 1259 YF', 'SUZUKI ERTIGA', '2015', 'ABU-ABU METALIK', 'MHYKZE81SFJ279862', 'K14BT1167606', NULL, 'M. EFENDI', 21, '10202012100435', '2022-09-03', 10, '2022-08-09', '2022-08-09', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:47:04'),
(39, 'S 8178 SB', 'PICK UP BOX', '2019', 'HITAM', 'MK2LOPU39KJ011357', '4D56CT52069', NULL, 'PT. WIJAYA PRAWIRA PERKASA', 23, '10202012100435', '2022-09-03', 10, '2024-08-13', '2022-08-13', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:47:42'),
(40, 'W 1547 CM', 'HONDA MOBILIO', '2015', 'ABU-ABU MUDA', 'MHRDD4850FJ412367', 'L15Z11192012', NULL, 'RIYADI', 24, '10202012100435', '2022-09-03', 10, '2022-08-14', '2022-08-14', NULL, NULL, '2022-04-17 23:27:58', '2022-04-26 18:48:13'),
(41, 'W 1582 CM', 'SUZUKI ERTIGA', '2015', 'HITAM METALIK', 'MHYKZE813FJ279588', 'K14BT1167278', NULL, 'ILANDARI YATI', NULL, '10202012100435', '2022-09-03', 10, '2022-08-15', '2022-08-15', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 18:34:59'),
(42, 'L 3613 BU', 'HONDA NF 100', '1999', 'HITAM', 'MH1KEVL10XK085992', 'KEVLE1085850', NULL, 'ADI WIJAYA KOMARYONO', NULL, NULL, NULL, NULL, '2023-08-22', '2022-08-22', NULL, 'tdk diurus', '2022-04-17 23:27:58', '2022-04-19 18:37:30'),
(43, 'L 8174 AS', 'TRUK DROOP SIDE', '2007', 'KUNING', 'MHMFE74P47K005034', '4D34TC73637', NULL, 'SETIAWAN', NULL, '10202012100435', '2022-09-03', 10, '2022-09-10', '2022-09-10', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 18:46:46'),
(44, 'L 4274 YQ', 'HONDA SUPRA X 125', '2012', 'HITAM', 'MH1JBG117CK071990', 'JBG1E1071138', NULL, 'SOETRIYONO', NULL, NULL, NULL, NULL, '2022-09-21', '2022-09-21', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 18:50:10'),
(45, 'L 4272 YQ', 'HONDA SUPRA X 125', '2012', 'HITAM', 'MH1JBG119CK072560', 'JBG1E1072072', NULL, 'MUHAMAD EFENDI', NULL, NULL, NULL, NULL, '2022-09-21', '2022-09-21', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 18:55:10'),
(46, 'L 9908 BJ', 'TRUK DROOP SIDE', '2010', 'KUNING', 'MHMFE71P1AK020569', '4D34TF80744', NULL, 'ADI WIJAYA KOMARYONO', NULL, '10202012100435', '2022-09-03', 10, '2025-10-12', '2022-10-12', NULL, 'ex L 9835 AH', '2022-04-17 23:27:58', '2022-04-19 19:06:54'),
(47, 'L 8140 DK', 'PICK UP BOX', '2002', 'PUTIH', 'MHYESL4152J117647', 'G15AIA117647', NULL, 'KHO HARTAWAN', NULL, '10202012100435', '2022-09-03', 10, '2022-10-22', '2022-10-22', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:08:15'),
(48, 'L 1126 EI', 'SUZUKI ERTIGA', '2015', 'PUTIH METALIK', 'MHYKZE818FJ283574', 'K14BT1171661', NULL, 'EDWARD HADIAMAN PAMUNGKAS', NULL, '10202012100435', '2022-09-03', 10, NULL, '2022-10-26', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:09:35'),
(49, 'S 8402 SB', 'PICK UP BOX', '2019', 'HITAM', 'MK2LOPU39KJ018966', '4D56CT88192', NULL, 'PT. WIJAYA PRAWIRA PERKASA', NULL, '10202012100435', '2022-09-03', 10, '2024-10-24', '2022-10-24', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:12:30'),
(50, 'L 5662 AT', 'HONDA REVO', '2010', 'HITAM', 'MH1JBC113AK926805', 'JBC1E1869649', NULL, 'KUSAIRI', NULL, NULL, NULL, NULL, '2023-11-01', '2022-11-01', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:14:45'),
(51, 'W 1775 CO', 'HONDA MOBILIO', '2017', 'ABU-ABU BULAN METALIK', 'MHRDD4850HJ701948', 'L15Z13611409', NULL, 'A\'AN AFARIANTO', NULL, '10202012100435', '2022-09-03', 10, '2022-11-02', '2022-11-02', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:17:39'),
(52, 'W 1801 CO', 'HONDA MOBILIO', '2017', 'ABU-ABU BULAN METALIK', 'MHRDD4850HJ700852', 'L15Z13604094', NULL, 'HANDRIN DWI LESTIAWAN', NULL, '10202012100435', '2022-09-03', 10, '2022-11-02', '2022-11-02', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:20:19'),
(53, 'W 4155 NC', 'HONDA REVO', '2010', 'HITAM', 'MH1JBC11XAK932424', 'JBC1E1933184', NULL, 'SUTOYO', NULL, NULL, NULL, NULL, '2023-11-02', '2022-11-02', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:21:39'),
(54, 'S 8711 SC', 'TRUK DROOP SIDE', '2012', 'KUNING', 'MHMFE84P8CK002174', '4D34TH96542', NULL, 'DADANG SYARIFUDIN', NULL, NULL, NULL, NULL, '2022-11-06', '2022-11-06', NULL, 'L 9571 GK', '2022-04-17 23:27:58', '2022-04-19 19:26:24'),
(55, 'S  8526 SB', 'PICK UP BOX', '2019', 'HITAM', 'MK2LOPU39KJ021210', '4D56CT90555', NULL, 'PT. WIJAYA PRAWIRA PERKASA', NULL, '10202012100435', '2022-09-03', 10, '2024-11-29', '2022-11-29', NULL, NULL, '2022-04-17 23:27:58', '2022-04-19 19:30:19'),
(56, 'S  8636 SB', 'PICK UP BOX', '2019', 'HITAM', 'MK2LOPU39KJ024814', '4D56CTX4098', NULL, 'PT. WIJAYA PRAWIRA PERKASA', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(57, 'L 9784 BR', 'PICK UP BOX', '2012', 'HITAM', 'MHMLOPU39CK102874', '4D56CH81835', NULL, 'MUHAMMAD KURNIAWAN', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(58, 'AG 6462 IP', 'HONDA REVO', '2010', 'HITAM', 'MH1JBC119AK910348', 'JBC1E1908167', NULL, 'PAIJAH', NULL, NULL, '2022-04-18', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(59, 'S 1136 SM', 'T. KIJANG INNOVA', '2018', 'PUTIH', 'MHFAB3EM9J0010530', '2GDC452957', NULL, 'PT. WIJAYA PRAWIRA PERKASA', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(60, 'L 1940 FT', 'MERC BENZ', '2012', 'HITAM METALIK', 'MHL212054CJ003196', '27295232050441', NULL, 'SUHARTI', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(61, 'W 1366 CS', 'ALPHARD 2.5G AT', '2017', 'HITAM', 'JTNGF3DHXH8008758', '2ARH874957', NULL, 'HERI SISWANTO', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(62, 'S 9778 SB', 'PICK UP BOX', '2020', 'PUTIH', 'MHCPHR54CLJ417439', 'E417439', NULL, 'PT. WIJAYA PRAWIRA PERKASA', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(63, 'S 9780 SB', 'PICK UP BOX', '2020', 'PUTIH', 'MHCPHR54CLJ417438', 'E417438', NULL, 'PT. WIJAYA PRAWIRA PERKASA', NULL, '10202012100435', '1970-01-01', NULL, '1970-01-01', '1970-01-01', '2022-04-18', NULL, '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(64, 'L 2187 JQ', 'HONDA C100M/GRAND', '1994', 'HITAM', 'MH1ND000RRK167485', 'NDE1267794', NULL, 'YONO SUPARNO', NULL, NULL, '2022-04-18', NULL, '2022-04-18', '2022-04-18', '2022-04-18', 'Diperpanjang pemakai', '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(65, 'L 4482 FU', 'HONDA GL 160D', '2007', 'HITAM', 'MH1KC121X7K062557', 'KC12E1063629', NULL, 'ADI WIJAYA KOMARYONO', NULL, NULL, '2022-04-18', NULL, '2022-04-18', '2022-04-18', '2022-04-18', 'Diperpanjang pemakai', '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(66, 'L 5461 DV', 'YAMAHA VIXION', '2010', 'MERAH MARUN', 'MH33C1004AK367827', '3C1368802', NULL, 'ADI WIJAYA KOMARYONO', NULL, NULL, '2022-04-18', NULL, '2022-04-18', '2022-04-18', '2022-04-18', 'Diperpanjang pemakai', '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(67, 'L 7781 A', 'MOBIL BUS ELF', '2010', 'SILVER METALIK', 'MHMFE71P9AK002364', '4D34TF73256', NULL, 'ADI WIJAYA KOMARYONO', NULL, NULL, '2022-04-18', NULL, '1970-01-01', '2022-04-18', '2022-04-18', 'dijual juli 20', '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(68, 'L 9278 H', 'TRUK DROOP SIDE', '2011', 'KUNING', 'MHMFE84P8BK000515', '4D34TGX5687', NULL, 'RUDI ROSADI', NULL, NULL, '2022-04-18', NULL, '1970-01-01', '1970-01-01', '2022-04-18', 'sudah dijual (Februari 2021)', '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(69, 'L 9629 Q', 'TRUK DROOP SIDE', '2011', 'KUNING', 'MHMFE74P4BK056300', '4D34TGY2226', NULL, 'ABD. MALIK', NULL, NULL, '2022-04-18', NULL, '1970-01-01', '2022-04-18', '2022-04-18', 'sudah dijual (Februari 2021)', '2022-04-17 23:27:58', '2022-04-17 23:27:58'),
(70, 'L 1608 WQ', 'NEW XENIA', '2012', 'SILVER METALIK', 'MHKV1AA2JCK010879', 'DP66164', NULL, 'WAHYU WINEDAR, SE', NULL, NULL, '2022-04-18', NULL, '1970-01-01', '1970-01-01', '2022-04-18', 'sudah dijual (Februari 2021)', '2022-04-17 23:27:58', '2022-04-17 23:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_16_072128_create_divisi_table', 1),
(6, '2022_01_16_072246_create_tipe_asset_table', 1),
(7, '2022_01_17_041849_create_table_tindakan_aset', 2),
(8, '2022_01_21_080034_create_notifications_table', 3),
(9, '2022_01_24_011436_add_column_in_table_asset_tindakan', 4),
(10, '2022_01_25_023349_add_expired_date', 5),
(11, '2022_01_27_035202_add_column_user_id', 6),
(12, '2022_01_27_075610_add_column_code_divisi', 7),
(13, '2022_01_27_082634_add_column_code_tipe_aset', 8),
(14, '2022_01_28_012745_create_column_tindakan', 9),
(15, '2022_02_02_011424_add_column_spesifikasi', 10),
(16, '2022_02_04_020815_add_column_id_divisi_and_id_tipe_aset', 11),
(17, '2022_02_07_012256_add_column_in_table_tindakan', 12),
(18, '2022_02_08_013630_add_column_img_at_table_tindakan_aset', 13),
(19, '2022_04_04_014556_create_warna_kendaraan', 14),
(20, '2022_04_04_014922_create_jenis_kendaraan', 15),
(21, '2022_04_04_015149_create_jenis_tahun', 16),
(22, '2022_04_04_015502_create_asuransi_kendaraan', 17),
(23, '2022_04_04_015835_create_pemakai_kendaraan', 18),
(24, '2022_04_05_063503_create_table_pemakai_kendaraan', 19),
(25, '2022_04_06_032233_create_table_kendaraan', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kf.zakiyudin@gmail.com', '$2y$10$yeD02phdSa1Ii.qS0GRY8OKHIArUYLRGLTtQNSiA1sJGpnAbuxJky', '2022-01-17 23:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `pemakai_kendaraan`
--

CREATE TABLE `pemakai_kendaraan` (
  `id_pemakai_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `nama_pemakai_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemakai_kendaraan`
--

INSERT INTO `pemakai_kendaraan` (`id_pemakai_kendaraan`, `nama_pemakai_kendaraan`, `divisi_id`, `created_at`, `updated_at`) VALUES
(1, 'Pak Freddyy', 4, NULL, '2022-04-05 19:05:01'),
(2, 'Bu Retno', 1, '2022-04-05 18:35:22', '2022-04-05 18:35:22'),
(3, 'Pak Andik', 4, '2022-04-05 18:39:34', '2022-04-05 18:39:34'),
(4, 'BP SASTRO', NULL, '2022-04-19 20:20:58', '2022-04-19 20:20:58'),
(5, 'Bu Yenny', NULL, '2022-04-19 23:25:59', '2022-04-19 23:39:23'),
(6, 'Maskuri', NULL, '2022-04-19 23:26:19', '2022-04-19 23:26:19'),
(7, 'Miftachul Huda', NULL, '2022-04-19 23:26:44', '2022-04-19 23:26:44'),
(8, 'Hidayat', NULL, '2022-04-19 23:27:07', '2022-04-19 23:27:07'),
(9, 'General Affair', NULL, '2022-04-19 23:27:37', '2022-04-19 23:27:37'),
(10, 'Cindi (Jkt)', NULL, '2022-04-19 23:27:53', '2022-04-19 23:27:53'),
(11, 'Ibu Dian', NULL, '2022-04-19 23:28:10', '2022-04-19 23:28:10'),
(12, 'Metal Roof', NULL, '2022-04-19 23:28:26', '2022-04-19 23:28:26'),
(13, 'Abd. Hafidz', 7, '2022-04-19 23:31:58', '2022-04-19 23:31:58'),
(14, 'Bpk Adi', NULL, '2022-04-19 23:32:21', '2022-04-19 23:32:21'),
(15, 'Suliono', 9, '2022-04-19 23:32:40', '2022-04-19 23:32:40'),
(16, 'Petrus', 7, '2022-04-19 23:32:53', '2022-04-19 23:32:53'),
(17, 'Suherman', 7, '2022-04-19 23:33:08', '2022-04-19 23:33:08'),
(18, 'Sutikno', NULL, '2022-04-19 23:33:24', '2022-04-19 23:33:24'),
(19, 'Diana', NULL, '2022-04-19 23:38:15', '2022-04-19 23:38:15'),
(20, 'Marketing Kupang', 8, '2022-04-19 23:38:39', '2022-04-19 23:38:39'),
(21, 'Bpk Hartawan', NULL, '2022-04-19 23:38:55', '2022-04-19 23:38:55'),
(22, 'Anom Beta Putranto', NULL, '2022-04-19 23:39:54', '2022-04-19 23:39:54'),
(23, 'Yoel', 7, '2022-04-19 23:40:10', '2022-04-19 23:40:10'),
(24, 'Trie Ningsih', NULL, '2022-04-19 23:40:35', '2022-04-19 23:40:35'),
(25, 'Paulus Rudy', NULL, '2022-04-19 23:40:57', '2022-04-19 23:40:57'),
(26, 'Logistik', 7, '2022-04-19 23:41:29', '2022-04-19 23:41:29'),
(27, 'Kristianto', NULL, '2022-04-19 23:41:42', '2022-04-19 23:41:42'),
(28, 'Operasional GA', 9, '2022-04-19 23:42:05', '2022-04-19 23:42:05'),
(29, 'Umar', 7, '2022-04-19 23:42:20', '2022-04-19 23:42:20'),
(30, 'Simon', 7, '2022-04-19 23:42:38', '2022-04-19 23:42:38'),
(31, 'Faro', 7, '2022-04-19 23:42:57', '2022-04-19 23:42:57'),
(32, 'Kusairi', NULL, '2022-04-19 23:43:25', '2022-04-19 23:43:25'),
(33, 'Meily Susiewati', NULL, '2022-04-19 23:43:58', '2022-04-19 23:43:58'),
(34, 'Sutoyo', NULL, '2022-04-19 23:44:23', '2022-04-19 23:44:23'),
(35, 'Hafis', NULL, '2022-04-19 23:44:40', '2022-04-19 23:44:40'),
(36, 'Egis', 7, '2022-04-19 23:44:56', '2022-04-19 23:44:56'),
(37, 'Nur Febri', 7, '2022-04-19 23:45:13', '2022-04-19 23:45:13'),
(38, 'Paijah', NULL, '2022-04-19 23:45:29', '2022-04-19 23:45:29'),
(39, 'Bpk Wijaya', NULL, '2022-04-19 23:45:44', '2022-04-19 23:45:44'),
(40, 'Roby', 7, '2022-04-19 23:46:03', '2022-04-19 23:46:03'),
(41, 'Setiawan/Margo', NULL, '2022-04-19 23:46:50', '2022-04-19 23:46:50'),
(42, 'Mistamar', NULL, '2022-04-19 23:47:03', '2022-04-19 23:47:03'),
(43, 'Bpk Satya', NULL, '2022-04-19 23:47:16', '2022-04-19 23:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_tindakan_aset`
--

CREATE TABLE `table_tindakan_aset` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aset` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_expired` date NOT NULL DEFAULT '2023-01-25',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `spesifikasi` text COLLATE utf8mb4_unicode_ci,
  `id_divisi` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tipe_asset` bigint(20) UNSIGNED DEFAULT NULL,
  `gambar_aset` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_tindakan_aset`
--

INSERT INTO `table_tindakan_aset` (`id`, `nama_aset`, `tanggal_pembelian`, `tanggal_expired`, `created_at`, `updated_at`, `spesifikasi`, `id_divisi`, `id_tipe_asset`, `gambar_aset`) VALUES
(2, 'MONITOR SAMSUNG 24 inch FHD IPS 75HZ LS24R350FHEXXD', '1970-01-01', '2022-03-23', '2022-02-18 00:35:46', '2022-02-21 01:24:42', 'Brand Type : s24R350\nPanel Size(Inch) : 24\nPanel Type : IPS\nPanel Resolution : 1920x1080\nAspect Ratio : 16 : 9\n\nBrightness (cd/㎡) : 250\nRefresh Rate(hz) : 75\nResponse Time (ms) : 5\nSync : AMD FreeSync Technology\nConnectivity : D-Sub + HDMI\n\nAudio port : -\nBuild in Speaker : No\nVESA mounting (mm) : 75x75\nErgonomic Stand : No\nUSB Ports : -\n\nPanel bit : 8 bits\nHDR : -\nNTSC (%) : 72\nSRGB (%) : -\nAdobe RGB : -\nDCI-P3 (%) : -\n\nPower Cons (watt) : 25 (MAXIMUM)\nProduct Weight (nw/kg) : 3.5\nBox Dimension (cm) : 61 x 15 x 39\nVolume Weight (kg) : 7', 1, 1, NULL),
(3, 'CPU DELL XPS 8940 i7-10700', '1970-01-01', '1970-01-01', '2022-02-18 00:35:46', '2022-02-18 00:48:31', '•Intel Core i7-10700 10th Gen\n•Memory 32GB DDR4 2666MHz\n•Storage M.2 512GB SSD + 1TB SATA\n•DVDRW Drive\n•VGA NVIDIA GTX 1660Ti 6GB\n•WF + BT\n•Dell USB Mouse + Keyboard\n•OS : Windows 10 Professional', 5, 3, NULL),
(4, 'PAKET CCTV HIKVISION 8 CHANNEL 8 KAMERA TURBO HD 1080P 2MP', '1970-01-01', '1970-01-01', '2022-02-18 00:35:46', '2022-02-18 01:12:36', '1 Pcs Hardisk (HDD) 320GB/500GB/1000GB/2000GB\nPenyimpanan HDD 320GB = 9 Hari\nPenyimpanan HDD 500GB = 13 Hari\nPenyimpanan HDD 1000GB = 26 Hari\nPenyimpanan HDD 2000GB = 53 Hari\n\n50M Kabel RG59 + Power', 3, 4, NULL),
(5, 'coba import 7', '1970-01-01', '2022-03-23', '2022-02-18 00:35:46', '2022-02-20 18:44:53', 'coba import spesifikasi 4', 4, 5, NULL),
(7, 'coba import 9', '1970-01-01', '2022-03-23', '2022-02-18 00:35:46', '2022-02-20 18:40:03', 'coba import spesifikasi 6', 1, 2, NULL),
(10, 'coba upload img', '2022-02-22', '2022-03-26', '2022-02-21 18:58:33', '2022-02-24 01:18:24', 'coba upload image', 1, 1, 'public/gambar_aset/pic1.jpg'),
(11, 'kjdkajkdjasd', '2022-02-22', '2022-05-01', '2022-02-21 19:17:02', '2022-04-01 02:17:35', 'nnkanskdaksmdk', 1, 1, 'public/gambar_aset/ub.png');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_kendaraan`
--

CREATE TABLE `tahun_kendaraan` (
  `id_tahun_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `tahun_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` bigint(20) UNSIGNED NOT NULL,
  `nama_tindakan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_tindakan` date NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `keterangan`, `tanggal_tindakan`, `id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Servis', '-', '2022-02-21', 7, '2022-02-20 18:40:03', '2022-02-20 18:40:03', 1),
(2, 'Maintenance', 'blablabla', '2022-02-21', 5, '2022-02-20 18:44:53', '2022-02-20 18:44:53', 1),
(3, 'blabla', 'blablabla', '2022-02-21', 2, '2022-02-21 01:24:42', '2022-02-21 01:24:42', 1),
(4, 'Maintenance', 'kkjkaksdkajskdjaksjdkajd', '2022-02-24', 11, '2022-02-24 01:18:09', '2022-02-24 01:18:09', 1),
(5, 'Servis', NULL, '2022-02-24', 10, '2022-02-24 01:18:24', '2022-02-24 01:18:24', 1),
(6, 'Servis', '-', '2022-04-01', 11, '2022-04-01 02:17:35', '2022-04-01 02:17:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_asset`
--

CREATE TABLE `tipe_asset` (
  `id_tipe_asset` bigint(20) UNSIGNED NOT NULL,
  `code_tipe_asset` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tipe_asset` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_asset`
--

INSERT INTO `tipe_asset` (`id_tipe_asset`, `code_tipe_asset`, `nama_tipe_asset`, `created_at`, `updated_at`) VALUES
(1, 'TA001', 'KENDARAAN', '2022-02-17 17:00:00', '2022-02-17 17:00:00'),
(2, 'TA002', 'FURNITURE', '2022-02-18 00:19:00', '2022-02-18 00:19:00'),
(3, 'TA003', 'KOMPUTER', '2022-02-18 00:21:11', '2022-02-18 00:21:11'),
(4, 'TA004', 'ELEKTRO', '2022-02-18 00:21:29', '2022-02-18 00:21:29'),
(5, 'TA005', 'MESIN', '2022-02-18 00:21:40', '2022-02-18 00:21:40'),
(6, 'TA006', 'LOGISTIK', '2022-04-04 19:23:18', '2022-04-04 19:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zakiyudin Kamil Fikri', 'zakikamil@gmail.com', NULL, '$2y$10$OP4V9h9JeD2zhfRwo/jCletDzB36Mhc9HSXJw/De7cQR.4xdk/LgC', 'NVMBzWPYDmunQzT2XWyW7tJtAtsSfAaSPculwB9pXGgBGQHDT74aBmJsebEW', '2022-01-16 00:25:33', '2022-01-16 00:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `warna_kendaraan`
--

CREATE TABLE `warna_kendaraan` (
  `id_warna` bigint(20) UNSIGNED NOT NULL,
  `nama_warna` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warna_kendaraan`
--

INSERT INTO `warna_kendaraan` (`id_warna`, `nama_warna`, `created_at`, `updated_at`) VALUES
(1, 'HITAM', '2022-04-03 17:00:00', NULL),
(2, 'HITAM METALIK', '2022-04-03 17:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id_asuransi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `kendaraan_pemakai_kendaraan_id_foreign` (`pemakai_kendaraan_id`),
  ADD KEY `kendaraan_asuransi_id_foreign` (`asuransi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemakai_kendaraan`
--
ALTER TABLE `pemakai_kendaraan`
  ADD PRIMARY KEY (`id_pemakai_kendaraan`),
  ADD KEY `pemakai_kendaraan_divisi_id_foreign` (`divisi_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `table_tindakan_aset`
--
ALTER TABLE `table_tindakan_aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_tindakan_aset_id_divisi_foreign` (`id_divisi`),
  ADD KEY `table_tindakan_aset_id_tipe_asset_foreign` (`id_tipe_asset`);

--
-- Indexes for table `tahun_kendaraan`
--
ALTER TABLE `tahun_kendaraan`
  ADD PRIMARY KEY (`id_tahun_kendaraan`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `tindakan_id_foreign` (`id`),
  ADD KEY `tindakan_user_id_foreign` (`user_id`);

--
-- Indexes for table `tipe_asset`
--
ALTER TABLE `tipe_asset`
  ADD PRIMARY KEY (`id_tipe_asset`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warna_kendaraan`
--
ALTER TABLE `warna_kendaraan`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `id_asuransi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pemakai_kendaraan`
--
ALTER TABLE `pemakai_kendaraan`
  MODIFY `id_pemakai_kendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_tindakan_aset`
--
ALTER TABLE `table_tindakan_aset`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tahun_kendaraan`
--
ALTER TABLE `tahun_kendaraan`
  MODIFY `id_tahun_kendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipe_asset`
--
ALTER TABLE `tipe_asset`
  MODIFY `id_tipe_asset` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warna_kendaraan`
--
ALTER TABLE `warna_kendaraan`
  MODIFY `id_warna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_asuransi_id_foreign` FOREIGN KEY (`asuransi_id`) REFERENCES `asuransi` (`id_asuransi`),
  ADD CONSTRAINT `kendaraan_pemakai_kendaraan_id_foreign` FOREIGN KEY (`pemakai_kendaraan_id`) REFERENCES `pemakai_kendaraan` (`id_pemakai_kendaraan`);

--
-- Constraints for table `pemakai_kendaraan`
--
ALTER TABLE `pemakai_kendaraan`
  ADD CONSTRAINT `pemakai_kendaraan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id_divisi`);

--
-- Constraints for table `table_tindakan_aset`
--
ALTER TABLE `table_tindakan_aset`
  ADD CONSTRAINT `table_tindakan_aset_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_tindakan_aset_id_tipe_asset_foreign` FOREIGN KEY (`id_tipe_asset`) REFERENCES `tipe_asset` (`id_tipe_asset`) ON DELETE CASCADE;

--
-- Constraints for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD CONSTRAINT `tindakan_id_foreign` FOREIGN KEY (`id`) REFERENCES `table_tindakan_aset` (`id`),
  ADD CONSTRAINT `tindakan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
