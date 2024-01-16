-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 03:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'login', ' Melakukan Login', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2024-01-14 18:13:48', '2024-01-14 18:13:48'),
(2, 'Tambah', 'Menambah Data Barang', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"Data Barang\":\"sss\"}', NULL, '2024-01-14 18:14:29', '2024-01-14 18:14:29'),
(3, 'Update', 'Update Data Barang', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"update Barang\":\"sss\"}', NULL, '2024-01-14 18:18:37', '2024-01-14 18:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2023-12-10 06:31:02', '2023-12-10 06:31:02'),
(2, 'Minuman', '2023-12-10 17:42:44', '2023-12-10 17:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_11_084159_create_tbarang_table', 1),
(6, '2023_09_11_084409_create_tpetugas_table', 1),
(7, '2023_09_11_084643_create_theadjual_table', 1),
(8, '2023_09_11_084950_create_theadbeli_table', 1),
(9, '2023_09_11_085205_create_tdetailbeli_table', 1),
(10, '2023_09_25_012848_create_tsuplier_table', 1),
(11, '2023_10_02_015712_create_kategori_table', 1),
(12, '2023_10_02_020056_add_id_kategori_to_tbarang', 1),
(13, '2023_10_23_015440_add_kode_suplier_to_theadbeli_table', 1),
(14, '2023_10_23_015714_add_id_barang_to_tdetailbeli_table', 1),
(15, '2023_11_07_151400_add_id_petugas_to_theadjual_table', 1),
(16, '2023_11_07_152055_create_tdetailjual_table', 1),
(17, '2023_11_07_152242_add_id_barang_to_tdetailjual_table', 1),
(18, '2023_11_29_054912_create_activity_log_table', 1),
(19, '2023_11_29_054913_add_event_column_to_activity_log_table', 1),
(20, '2023_11_29_054914_add_batch_uuid_column_to_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `harga_awal` bigint(20) UNSIGNED NOT NULL,
  `harga_jual` bigint(20) UNSIGNED NOT NULL,
  `stok` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `nama_barang`, `id_kategori`, `harga_awal`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(543530593454, 'Biskuat', 1, 20000, 25000, 19, '2023-12-10 06:31:34', '2024-01-11 19:06:56'),
(9873283193123, 'Chiki', 1, 20000, 30000, 10, '2023-12-10 06:32:16', '2024-01-11 19:06:57'),
(23719313219322, 'Roti', 1, 20000, 30000, 10, '2023-12-10 06:32:54', '2024-01-10 00:11:03'),
(98392032812389, 'Aqua Gelas', 1, 20000, 200000, 11, '2024-01-11 08:54:23', '2024-01-14 18:15:33'),
(889478239743294, 'sss', 1, 20000, 25000, 2, '2024-01-14 18:14:29', '2024-01-14 18:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `tdetailbeli`
--

CREATE TABLE `tdetailbeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notrans` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tdetailbeli`
--

INSERT INTO `tdetailbeli` (`id`, `notrans`, `id_barang`, `harga_beli`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'TRS >> 2023-12-10 >> T-000001', 543530593454, 20000, 13, 260000, '2023-12-10 06:35:10', '2023-12-10 06:35:53'),
(2, 'TRS >> 2023-12-10 >> T-000001', 9873283193123, 20000, 17, 340000, '2023-12-10 06:35:13', '2023-12-10 06:35:53'),
(3, 'TRS >> 2023-12-10 >> T-000001', 23719313219322, 20000, 11, 220000, '2023-12-10 06:35:17', '2023-12-10 06:35:53'),
(4, 'TRS >> 2023-12-11 >> T-000002', 543530593454, 20000, 7, 140000, '2023-12-10 17:45:38', '2023-12-10 17:46:06'),
(7, 'TRS >> 2023-12-11 >> T-000002', 9873283193123, 20000, 5, 100000, '2023-12-10 17:45:58', '2023-12-10 17:46:06'),
(8, 'TRS >> 2023-12-13 >> T-000003', 23719313219322, 20000, 1, 20000, '2023-12-13 06:42:46', '2023-12-13 06:42:46'),
(11, 'TRS >> 2023-12-27 >> T-000004', 543530593454, 20000, 3, 60000, '2023-12-27 02:07:46', '2023-12-27 02:08:10'),
(14, 'TRS >> 2023-12-27 >> T-000004', 9873283193123, 20000, 2, 40000, '2023-12-27 02:08:00', '2023-12-27 02:08:10'),
(15, 'TRS >> 2023-12-27 >> T-000005', 9873283193123, 20000, 6, 120000, '2023-12-27 03:06:41', '2023-12-27 03:06:53'),
(16, 'TRS >> 2023-12-27 >> T-000006', 543530593454, 20000, 7, 140000, '2023-12-27 03:07:11', '2023-12-27 03:07:23'),
(17, 'TRS >> 2024-01-05 >> T-000007', 543530593454, 20000, 6, 120000, '2024-01-04 17:28:14', '2024-01-04 17:28:48'),
(18, 'TRS >> 2024-01-05 >> T-000007', 23719313219322, 20000, 10, 200000, '2024-01-04 17:28:19', '2024-01-04 17:28:48'),
(19, 'TRS >> 2024-01-10 >> T-000008', 9873283193123, 20000, 3, 60000, '2024-01-10 00:09:15', '2024-01-10 00:09:44'),
(20, 'TRS >> 2024-01-10 >> T-000008', 23719313219322, 20000, 5, 100000, '2024-01-10 00:09:23', '2024-01-10 00:09:44'),
(22, 'TRS >> 2024-01-12 >> T-000009', 98392032812389, 30000, 5, 150000, '2024-01-11 19:02:29', '2024-01-11 19:05:36'),
(23, 'TRS >> 2024-01-12 >> T-000009', 543530593454, 20000, 4, 80000, '2024-01-11 19:02:40', '2024-01-11 19:05:36'),
(24, 'TRS >> 2024-01-12 >> T-000009', 9873283193123, 20000, 5, 100000, '2024-01-11 19:02:46', '2024-01-11 19:05:36'),
(25, 'TRS >> 2024-01-12 >> T-000010', 98392032812389, 100000, 1, 100000, '2024-01-11 19:09:47', '2024-01-11 19:09:47'),
(26, 'TRS >> 2024-01-15 >> T-000011', 889478239743294, 20000, 2, 40000, '2024-01-14 18:15:11', '2024-01-14 18:15:33'),
(27, 'TRS >> 2024-01-15 >> T-000011', 98392032812389, 20000, 2, 40000, '2024-01-14 18:15:26', '2024-01-14 18:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `tdetailjual`
--

CREATE TABLE `tdetailjual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Notrans` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `harga_awal` bigint(20) UNSIGNED NOT NULL,
  `harga_jual` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tdetailjual`
--

INSERT INTO `tdetailjual` (`id`, `Notrans`, `id_barang`, `harga_awal`, `harga_jual`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'PJL >> 2023-12-10 >> P-000005', 543530593454, 20000, 25000, 3, 75000, '2023-12-10 07:23:39', '2023-12-10 07:24:50'),
(2, 'PJL >> 2023-12-10 >> P-000005', 9873283193123, 20000, 30000, 3, 90000, '2023-12-10 07:23:45', '2023-12-10 07:24:50'),
(3, 'PJL >> 2023-12-10 >> P-000006', 543530593454, 20000, 25000, 3, 75000, '2023-12-10 07:26:31', '2023-12-10 07:26:47'),
(4, 'PJL >> 2023-12-10 >> P-000006', 23719313219322, 20000, 30000, 2, 60000, '2023-12-10 07:26:36', '2023-12-10 07:26:48'),
(5, 'PJL >> 2023-12-10 >> P-000007', 9873283193123, 20000, 30000, 4, 120000, '2023-12-10 09:02:05', '2023-12-10 09:02:16'),
(6, 'PJL >> 2023-12-11 >> P-000008', 543530593454, 20000, 25000, 4, 100000, '2023-12-10 17:44:35', '2023-12-10 17:45:02'),
(7, 'PJL >> 2023-12-11 >> P-000008', 23719313219322, 20000, 30000, 4, 120000, '2023-12-10 17:44:40', '2023-12-10 17:45:02'),
(8, 'PJL >> 2023-12-11 >> P-000008', 9873283193123, 20000, 30000, 4, 120000, '2023-12-10 17:44:47', '2023-12-10 17:45:02'),
(9, 'PJL >> 2023-12-11 >> P-000009', 9873283193123, 20000, 30000, 2, 60000, '2023-12-10 17:49:59', '2023-12-10 17:50:18'),
(10, 'PJL >> 2023-12-13 >> P-000010', 543530593454, 20000, 25000, 2, 50000, '2023-12-13 06:38:38', '2023-12-13 06:39:00'),
(11, 'PJL >> 2023-12-13 >> P-000011', 543530593454, 20000, 25000, 2, 50000, '2023-12-13 06:46:12', '2023-12-13 06:47:20'),
(12, 'PJL >> 2023-12-27 >> P-000012', 543530593454, 20000, 25000, 3, 75000, '2023-12-27 03:33:56', '2023-12-27 03:34:19'),
(13, 'PJL >> 2023-12-27 >> P-000012', 9873283193123, 20000, 30000, 1, 30000, '2023-12-27 03:34:03', '2023-12-27 03:34:03'),
(14, 'PJL >> 2024-01-05 >> P-000013', 543530593454, 20000, 25000, 2, 50000, '2024-01-04 17:33:46', '2024-01-04 17:33:56'),
(15, 'PJL >> 2024-01-08 >> P-000014', 9873283193123, 20000, 30000, 9, 270000, '2024-01-07 23:33:36', '2024-01-07 23:34:46'),
(16, 'PJL >> 2024-01-08 >> P-000014', 23719313219322, 20000, 30000, 5, 150000, '2024-01-07 23:34:26', '2024-01-07 23:34:47'),
(17, 'PJL >> 2024-01-08 >> P-000015', 9873283193123, 20000, 30000, 7, 30000, '2024-01-08 00:01:56', '2024-01-08 00:06:29'),
(18, 'PJL >> 2024-01-08 >> P-000016', 9873283193123, 20000, 30000, 7, 210000, '2024-01-08 00:14:12', '2024-01-08 00:19:40'),
(19, 'PJL >> 2024-01-09 >> P-000017', 543530593454, 20000, 25000, 2, 50000, '2024-01-09 06:43:27', '2024-01-09 06:44:38'),
(20, 'PJL >> 2024-01-09 >> P-000017', 23719313219322, 20000, 30000, 3, 90000, '2024-01-09 06:43:34', '2024-01-09 06:44:39'),
(21, 'PJL >> 2024-01-10 >> P-000018', 543530593454, 20000, 25000, 3, 75000, '2024-01-10 00:10:19', '2024-01-10 00:11:03'),
(22, 'PJL >> 2024-01-10 >> P-000018', 23719313219322, 20000, 30000, 3, 90000, '2024-01-10 00:10:27', '2024-01-10 00:11:03'),
(23, 'PJL >> 2024-01-10 >> P-000018', 9873283193123, 20000, 30000, 2, 60000, '2024-01-10 00:10:35', '2024-01-10 00:11:03'),
(24, 'PJL >> 2024-01-10 >> P-000019', 9873283193123, 20000, 30000, 1, 30000, '2024-01-10 00:16:07', '2024-01-10 00:17:04'),
(25, 'PJL >> 2024-01-11 >> P-000020', 9873283193123, 20000, 30000, 3, 30000, '2024-01-11 08:54:59', '2024-01-11 08:55:04'),
(26, 'PJL >> 2024-01-11 >> P-000021', 9873283193123, 20000, 30000, 1, 30000, '2024-01-11 09:01:11', '2024-01-11 09:13:48'),
(27, 'PJL >> 2024-01-11 >> P-000021', 543530593454, 20000, 25000, 1, 25000, '2024-01-11 09:13:33', '2024-01-11 09:13:33'),
(28, 'PJL >> 2024-01-12 >> P-000022', 98392032812389, 100000, 200000, 1, 200000, '2024-01-11 19:14:31', '2024-01-11 19:14:31'),
(29, 'PJL >> 2024-01-12 >> P-000023', 98392032812389, 100000, 200000, 1, 200000, '2024-01-11 19:24:52', '2024-01-11 19:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `theadbeli`
--

CREATE TABLE `theadbeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notrans` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_suplier` bigint(20) UNSIGNED NOT NULL,
  `totalitem` bigint(20) UNSIGNED NOT NULL,
  `totalharga` bigint(20) UNSIGNED NOT NULL,
  `totalbayar` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theadbeli`
--

INSERT INTO `theadbeli` (`id`, `notrans`, `tanggal`, `id_suplier`, `totalitem`, `totalharga`, `totalbayar`, `created_at`, `updated_at`) VALUES
(1, 'TRS >> 2023-12-10 >> T-000001', '2023-12-10', 1, 41, 820000, 820000, '2023-12-10 06:35:05', '2023-12-10 06:35:53'),
(2, 'TRS >> 2023-12-11 >> T-000002', '2023-12-11', 1, 12, 240000, 240000, '2023-12-10 17:45:31', '2023-12-10 17:46:05'),
(3, 'TRS >> 2023-12-13 >> T-000003', '2023-12-13', 1, 1, 20000, 20000, '2023-12-13 06:42:07', '2023-12-13 06:45:49'),
(4, 'TRS >> 2023-12-27 >> T-000004', '2023-12-27', 1, 5, 100000, 100000, '2023-12-27 01:56:05', '2023-12-27 02:08:10'),
(5, 'TRS >> 2023-12-27 >> T-000005', '2023-12-27', 1, 6, 120000, 120000, '2023-12-27 03:05:20', '2023-12-27 03:06:53'),
(6, 'TRS >> 2023-12-27 >> T-000006', '2023-12-27', 1, 7, 140000, 140000, '2023-12-27 03:07:06', '2023-12-27 03:07:23'),
(7, 'TRS >> 2024-01-05 >> T-000007', '2024-01-05', 1, 16, 320000, 320000, '2024-01-04 17:28:07', '2024-01-04 17:28:48'),
(8, 'TRS >> 2024-01-10 >> T-000008', '2024-01-10', 1, 8, 160000, 160000, '2024-01-10 00:08:47', '2024-01-10 00:09:43'),
(9, 'TRS >> 2024-01-12 >> T-000009', '2024-01-12', 2, 14, 330000, 330000, '2024-01-11 18:41:39', '2024-01-11 19:05:35'),
(10, 'TRS >> 2024-01-12 >> T-000010', '2024-01-12', 3, 1, 100000, 100000, '2024-01-11 19:09:31', '2024-01-11 19:09:58'),
(11, 'TRS >> 2024-01-15 >> T-000011', '2024-01-15', 3, 4, 80000, 80000, '2024-01-14 18:14:50', '2024-01-14 18:15:33'),
(12, 'TRS >> 2024-01-15 >> T-000012', '2024-01-15', 2, 0, 0, 0, '2024-01-14 18:27:49', '2024-01-14 18:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `theadjual`
--

CREATE TABLE `theadjual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notrans` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_petugas` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `totalbayar` bigint(20) UNSIGNED NOT NULL,
  `bayar` bigint(20) UNSIGNED NOT NULL,
  `kembalian` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theadjual`
--

INSERT INTO `theadjual` (`id`, `notrans`, `kode_petugas`, `tanggal`, `totalbayar`, `bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(5, 'PJL >> 2023-12-10 >> P-000005', 2, '2023-12-10', 165000, 200000, 35000, '2023-12-10 06:56:49', '2023-12-10 07:24:50'),
(6, 'PJL >> 2023-12-10 >> P-000006', 2, '2023-12-10', 135000, 200000, 65000, '2023-12-10 07:26:26', '2023-12-10 07:26:47'),
(7, 'PJL >> 2023-12-10 >> P-000007', 2, '2023-12-10', 120000, 150000, 30000, '2023-12-10 09:02:00', '2023-12-10 09:02:16'),
(8, 'PJL >> 2023-12-11 >> P-000008', 3, '2023-12-11', 340000, 400000, 60000, '2023-12-10 17:44:30', '2023-12-10 17:45:02'),
(9, 'PJL >> 2023-12-11 >> P-000009', 3, '2023-12-11', 60000, 70000, 10000, '2023-12-10 17:49:50', '2023-12-10 17:50:18'),
(10, 'PJL >> 2023-12-13 >> P-000010', 1, '2023-12-13', 50000, 55000, 5000, '2023-12-13 06:38:32', '2023-12-13 06:39:00'),
(11, 'PJL >> 2023-12-13 >> P-000011', 1, '2023-12-13', 50000, 55000, 5000, '2023-12-13 06:46:02', '2023-12-13 06:47:20'),
(12, 'PJL >> 2023-12-27 >> P-000012', 1, '2023-12-27', 105000, 106000, 1000, '2023-12-27 03:32:57', '2023-12-27 03:34:19'),
(13, 'PJL >> 2024-01-05 >> P-000013', 1, '2024-01-05', 50000, 60000, 10000, '2024-01-04 17:33:41', '2024-01-04 17:33:56'),
(14, 'PJL >> 2024-01-08 >> P-000014', 1, '2024-01-08', 420000, 450000, 30000, '2024-01-07 23:33:29', '2024-01-07 23:34:46'),
(15, 'PJL >> 2024-01-08 >> P-000015', 1, '2024-01-08', 0, 0, 0, '2024-01-08 00:01:50', '2024-01-08 00:01:50'),
(16, 'PJL >> 2024-01-08 >> P-000016', 1, '2024-01-08', 210000, 250000, 40000, '2024-01-08 00:14:05', '2024-01-08 00:19:39'),
(17, 'PJL >> 2024-01-09 >> P-000017', 1, '2024-01-09', 140000, 200000, 60000, '2024-01-09 06:43:19', '2024-01-09 06:44:37'),
(18, 'PJL >> 2024-01-10 >> P-000018', 1, '2024-01-10', 225000, 250000, 25000, '2024-01-10 00:10:08', '2024-01-10 00:11:03'),
(19, 'PJL >> 2024-01-10 >> P-000019', 1, '2024-01-10', 60000, 60000, 0, '2024-01-10 00:16:00', '2024-01-10 00:16:31'),
(20, 'PJL >> 2024-01-11 >> P-000020', 1, '2024-01-11', 90000, 100000, 10000, '2024-01-11 08:54:48', '2024-01-11 08:58:13'),
(21, 'PJL >> 2024-01-11 >> P-000021', 1, '2024-01-11', 55000, 60000, 5000, '2024-01-11 09:01:00', '2024-01-11 09:13:59'),
(22, 'PJL >> 2024-01-12 >> P-000022', 1, '2024-01-12', 200000, 300000, 100000, '2024-01-11 19:14:23', '2024-01-11 19:14:41'),
(23, 'PJL >> 2024-01-12 >> P-000023', 1, '2024-01-12', 200000, 300000, 100000, '2024-01-11 19:24:47', '2024-01-11 19:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `tpetugas`
--

CREATE TABLE `tpetugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_petugas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tsuplier`
--

CREATE TABLE `tsuplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_suplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_suplier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tsuplier`
--

INSERT INTO `tsuplier` (`id`, `kode_suplier`, `nama_suplier`, `alamat`, `no_telepon`, `created_at`, `updated_at`) VALUES
(1, 'SPL-000001', 'Ben', 'Bandung', '08328193441', '2023-12-10 06:33:59', '2023-12-10 06:34:10'),
(2, '20144', 'Adalberto Bednar', '220 Yost Park', '(870) 656-1495', '2024-01-10 00:19:33', '2024-01-10 00:19:33'),
(3, '29672', 'Tabitha Orn', '99012 Auer Lodge', '(678) 756-8876', '2024-01-10 00:19:33', '2024-01-10 00:19:33'),
(4, '63718', 'Arnoldo Sporer', '405 Feil Circles Apt. 341', '(458) 993-0860', '2024-01-10 00:19:33', '2024-01-10 00:19:33'),
(5, '52443', 'Durward DuBuque', '4332 Nader Hollow Apt. 929', '1-463-942-7254', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(6, '21067', 'Ms. Lavinia Sipes Sr.', '575 Royce Street', '785.886.8764', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(7, '52428', 'Joanne Daugherty', '475 Stoltenberg Lakes Suite 053', '320-930-6422', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(8, '82886', 'Dion Yost', '2762 Lemke Forges', '+1-916-440-7575', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(9, '95765', 'Mr. Jonathon Klocko PhD', '97608 Alana Street', '(346) 240-7430', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(10, '31536', 'Prof. Gus Rolfson', '596 Balistreri Dale', '1-405-597-9842', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(11, '86136', 'Adelbert Hettinger', '370 German Brook Apt. 037', '231.287.5778', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(12, '16591', 'Korey Roob', '24757 Hayley Ramp', '+1-214-873-0783', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(13, '94055', 'Tyree Shanahan', '6340 Alize Circles Suite 833', '+1 (435) 709-5522', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(14, '73750', 'Marilyne Stehr', '859 Mohr Fords Apt. 200', '+13604242731', '2024-01-10 00:19:34', '2024-01-10 00:19:34'),
(15, '79148', 'Modesto Feeney', '58308 Goyette Crossroad', '518.899.8084', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(16, '55052', 'Dr. Edwina Stark', '9567 Schumm Gardens Apt. 245', '+1.984.369.5418', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(17, '92260', 'Prof. Marlene Orn V', '3026 Jovanny Villages', '+14458044751', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(18, '67344', 'Luther Howe', '7740 Greenholt Forest', '+1.757.528.6050', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(19, '39330', 'Ms. Carli Paucek', '55364 Schuster Expressway Suite 701', '(956) 361-4131', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(20, '80815', 'Ms. Juanita Sporer', '761 Name Flat Suite 288', '(309) 720-0110', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(21, '76362', 'Mikel Rice', '49421 Batz Greens Apt. 693', '+15207612857', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(22, '64613', 'Adriel Cronin', '584 Tatyana Corner Apt. 136', '1-938-498-3702', '2024-01-10 00:19:35', '2024-01-10 00:19:35'),
(23, '85321', 'Louvenia Turcotte', '5399 Mante Flat', '+13163490530', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(24, '33415', 'Miss Rowena Dicki', '10129 Talia Cliff Apt. 382', '(959) 623-0070', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(25, '34164', 'Jevon Mohr', '7307 Israel Street Suite 642', '813.752.9350', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(26, '61539', 'Leopoldo Hill', '92506 Arlene Crossing', '+1-574-383-3233', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(27, '69471', 'Lenny Pfannerstill', '7792 Kessler Branch', '1-785-406-2386', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(28, '68226', 'Heaven Murray', '339 Gerlach Landing', '(901) 780-6182', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(29, '17245', 'Rubie Mayer', '53031 Conroy Forge Apt. 676', '(309) 914-8268', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(30, '42141', 'Lonie Stanton V', '6565 Tomas Hollow Apt. 656', '+1-906-863-4828', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(31, '39450', 'Andreanne Rice I', '403 Gaylord Dale', '947.535.2988', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(32, '96701', 'Carmen Rutherford', '15062 Yost Vista', '+17705554626', '2024-01-10 00:19:36', '2024-01-10 00:19:36'),
(33, '41446', 'Bertrand Stokes', '3598 Welch Alley', '616-795-9207', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(34, '16783', 'Prof. Larissa Klein', '997 Crona Station', '+1 (609) 731-6584', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(35, '69159', 'Era Ortiz', '43267 Christiansen Circle Apt. 111', '760-843-1032', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(36, '99123', 'Arielle Doyle II', '36318 Jacobi Inlet Suite 388', '+1-678-607-7484', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(37, '10173', 'Mrs. Madisyn Kassulke Sr.', '60600 Rutherford Viaduct Apt. 707', '+1.813.782.8974', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(38, '23686', 'Mr. Delmer Zemlak V', '903 Hagenes Station', '+1-253-859-0240', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(39, '40002', 'Amina Krajcik', '66320 Koch Terrace', '979.560.2640', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(40, '83583', 'Abe Stroman', '56380 Ankunding Way', '1-915-929-3644', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(41, '85754', 'Celestine Goldner', '41985 Velva Loop', '612.379.4167', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(42, '73219', 'Dr. Maryjane Labadie Jr.', '3079 Van Harbors', '231.659.8812', '2024-01-10 00:19:37', '2024-01-10 00:19:37'),
(43, '40401', 'Pearl Heidenreich I', '135 Odell Point Suite 360', '(262) 942-5457', '2024-01-10 00:19:38', '2024-01-10 00:19:38'),
(44, '18303', 'Mathew Glover V', '47832 Robel Port Suite 746', '1-267-558-5507', '2024-01-10 00:19:38', '2024-01-10 00:19:38'),
(45, '74397', 'Corene Schiller', '714 Beahan Haven Suite 875', '+1 (757) 737-1051', '2024-01-10 00:19:38', '2024-01-10 00:19:38'),
(46, '33892', 'Valentin Gleichner', '6109 Dibbert Skyway Suite 208', '+1-781-281-7538', '2024-01-10 00:19:38', '2024-01-10 00:19:38'),
(47, '50166', 'Kiana Bins', '7431 Schiller Greens', '559.442.6616', '2024-01-10 00:19:38', '2024-01-10 00:19:38'),
(48, '79876', 'Jamir DuBuque', '43172 Nicolas Stream', '(747) 486-0908', '2024-01-10 00:19:38', '2024-01-10 00:19:38'),
(49, '30895', 'Miss Virginie Konopelski PhD', '847 Reichel Mountain', '1-715-594-8775', '2024-01-10 00:19:39', '2024-01-10 00:19:39'),
(50, '94279', 'Aiden Dach', '9431 Adams Pines Apt. 732', '754.938.0569', '2024-01-10 00:19:40', '2024-01-10 00:19:40'),
(51, '33924', 'Korbin Mante', '247 O\'Reilly Wall Suite 020', '1-954-836-8228', '2024-01-10 00:19:40', '2024-01-10 00:19:40'),
(52, '37735', 'Dr. Tanner Abshire', '6600 Lang Street Suite 000', '1-272-812-8151', '2024-01-10 00:19:40', '2024-01-10 00:19:40'),
(53, '83475', 'Dr. Kaleigh DuBuque', '10690 Rachael Ridge', '1-606-858-8571', '2024-01-10 00:19:40', '2024-01-10 00:19:40'),
(54, '41459', 'Natasha Brown', '8757 Mark Dam', '309-618-9326', '2024-01-10 00:19:41', '2024-01-10 00:19:41'),
(55, '37557', 'Dessie Rice', '467 Spencer Forest', '832.740.1362', '2024-01-10 00:19:41', '2024-01-10 00:19:41'),
(56, '17050', 'Zaria Koepp', '667 Presley Avenue', '808-441-7363', '2024-01-10 00:19:41', '2024-01-10 00:19:41'),
(57, '55268', 'Mrs. Lavinia Ruecker I', '632 Simonis Gardens', '+1-541-528-1744', '2024-01-10 00:19:41', '2024-01-10 00:19:41'),
(58, '34935', 'Marjolaine Olson', '81940 Mitchell Key Apt. 495', '+1-731-459-9596', '2024-01-10 00:19:41', '2024-01-10 00:19:41'),
(59, '53712', 'Jeramy Wehner', '89290 Koelpin Inlet', '318.214.9374', '2024-01-10 00:19:42', '2024-01-10 00:19:42'),
(60, '72839', 'Kasandra Walter', '7568 Davis Gateway Suite 200', '(541) 670-9667', '2024-01-10 00:19:42', '2024-01-10 00:19:42'),
(61, '67789', 'Shayne Goodwin Jr.', '9585 Cedrick Avenue Suite 228', '364.280.0934', '2024-01-10 00:19:43', '2024-01-10 00:19:43'),
(62, '60664', 'Mrs. Alaina Upton', '62459 Heaney Mission Suite 913', '(347) 903-8208', '2024-01-10 00:19:43', '2024-01-10 00:19:43'),
(63, '92237', 'Tod Bechtelar Jr.', '11343 Hill Shoals Apt. 566', '(838) 241-3952', '2024-01-10 00:19:44', '2024-01-10 00:19:44'),
(64, '98261', 'Mr. Micah O\'Connell Sr.', '2662 Leslie Squares Apt. 291', '214-694-6653', '2024-01-10 00:19:44', '2024-01-10 00:19:44'),
(65, '18017', 'Maegan Weissnat', '88784 Eichmann Crest', '(224) 582-0521', '2024-01-10 00:19:45', '2024-01-10 00:19:45'),
(66, '32062', 'Lucius Schmitt I', '56906 Green Common Suite 635', '(754) 412-0507', '2024-01-10 00:19:46', '2024-01-10 00:19:46'),
(67, '62697', 'Prof. Maverick Runolfsdottir', '4284 Kiehn Inlet', '(203) 237-1233', '2024-01-10 00:19:47', '2024-01-10 00:19:47'),
(68, '47777', 'Mariam Steuber', '9219 Morar Ports', '+1 (458) 294-0448', '2024-01-10 00:19:47', '2024-01-10 00:19:47'),
(69, '60903', 'Sidney Turner', '6825 Micah Drive Suite 616', '316-968-9145', '2024-01-10 00:19:48', '2024-01-10 00:19:48'),
(70, '91861', 'Ramiro Von', '251 Hermiston Crossroad', '512-813-3795', '2024-01-10 00:19:48', '2024-01-10 00:19:48'),
(71, '10222', 'Alfredo Cronin', '243 Joana Ville', '534.408.8158', '2024-01-10 00:19:48', '2024-01-10 00:19:48'),
(72, '30803', 'Adrain Hodkiewicz IV', '6175 Ariane Burg', '+1.385.200.2312', '2024-01-10 00:19:48', '2024-01-10 00:19:48'),
(73, '14836', 'Dr. Troy Mertz', '152 Anabelle Rue Suite 583', '910-365-2460', '2024-01-10 00:19:49', '2024-01-10 00:19:49'),
(74, '29681', 'Josefa Kshlerin', '770 Vito Bypass', '646.605.8416', '2024-01-10 00:19:49', '2024-01-10 00:19:49'),
(75, '28518', 'Mr. Sidney Will Jr.', '5743 Allison Dale Apt. 003', '661-334-5273', '2024-01-10 00:19:49', '2024-01-10 00:19:49'),
(76, '70000', 'Jovan Kassulke', '7750 Kelsie Radial Apt. 597', '682.729.3309', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(77, '24354', 'Arvid Skiles', '42524 Kris Forges', '(623) 855-0241', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(78, '21924', 'Dahlia Metz', '372 Reece Lakes Apt. 243', '(352) 326-4931', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(79, '26797', 'Claire Effertz', '552 Moses Causeway Apt. 185', '520-995-8382', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(80, '24195', 'Treva Feeney', '6891 Thiel Trace', '1-930-422-8671', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(81, '45596', 'Arvilla Lemke', '43323 Janis Ramp', '678.273.6060', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(82, '90937', 'Gaylord Wiegand', '3414 Emory Stream', '+15207853212', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(83, '16335', 'Duncan Ferry', '1828 Kuhic Unions', '562.483.2088', '2024-01-10 00:19:50', '2024-01-10 00:19:50'),
(84, '58148', 'Alessandro Schinner', '474 Oma Coves', '504.220.9628', '2024-01-10 00:19:51', '2024-01-10 00:19:51'),
(85, '33279', 'Adelia Jacobi PhD', '23993 Ayden Roads', '1-252-499-3407', '2024-01-10 00:19:51', '2024-01-10 00:19:51'),
(86, '85376', 'Annamarie Pacocha', '17530 Hyatt Expressway Suite 115', '1-731-818-2448', '2024-01-10 00:19:51', '2024-01-10 00:19:51'),
(87, '65618', 'Brady Adams', '6469 Huels Viaduct', '+1 (240) 855-3836', '2024-01-10 00:19:51', '2024-01-10 00:19:51'),
(88, '52509', 'Urban Stehr', '275 Wiza Haven Apt. 046', '+1 (470) 523-9012', '2024-01-10 00:19:51', '2024-01-10 00:19:51'),
(89, '37776', 'Natasha Boyle', '4094 Jaden Avenue Suite 422', '1-754-271-3323', '2024-01-10 00:19:52', '2024-01-10 00:19:52'),
(90, '24774', 'Meda Willms', '31773 Jast Orchard', '+1.504.668.6760', '2024-01-10 00:19:52', '2024-01-10 00:19:52'),
(91, '91224', 'General Wilderman', '497 Murphy Junctions', '515.777.6063', '2024-01-10 00:19:53', '2024-01-10 00:19:53'),
(92, '97963', 'Katrine Gerhold I', '557 Sedrick Throughway', '+18633917423', '2024-01-10 00:19:53', '2024-01-10 00:19:53'),
(93, '26828', 'Blake Sanford', '2303 Jenkins Turnpike', '626.348.7359', '2024-01-10 00:19:53', '2024-01-10 00:19:53'),
(94, '74662', 'Miss Aliya Thiel', '245 Mollie Lodge', '+1 (231) 616-5199', '2024-01-10 00:19:53', '2024-01-10 00:19:53'),
(95, '84870', 'Madisyn Hilpert', '146 Schneider Mount', '+1.337.440.7932', '2024-01-10 00:19:53', '2024-01-10 00:19:53'),
(96, '91667', 'Sabina Ratke MD', '54020 Armstrong Lights', '1-918-575-7555', '2024-01-10 00:19:54', '2024-01-10 00:19:54'),
(97, '22416', 'Jany Witting I', '82402 Demario Corners Suite 160', '1-754-769-3959', '2024-01-10 00:19:54', '2024-01-10 00:19:54'),
(98, '35161', 'Jessyca McGlynn', '296 Thompson Divide Suite 790', '425-526-4153', '2024-01-10 00:19:54', '2024-01-10 00:19:54'),
(99, '71163', 'Maverick Okuneva', '9136 Jones Garden Suite 190', '(703) 941-7269', '2024-01-10 00:19:54', '2024-01-10 00:19:54'),
(100, '75829', 'Charlene Murphy', '919 Zulauf Branch', '301-934-3528', '2024-01-10 00:19:55', '2024-01-10 00:19:55'),
(101, '11678', 'Karley Heaney', '2831 Ciara Center', '929-707-9539', '2024-01-10 00:19:55', '2024-01-10 00:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_petugas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `agama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_petugas`, `nama_petugas`, `jenis_kelamin`, `Alamat`, `role`, `agama`, `no_telepon`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'P0001', 'Abdul', 'Laki-laki', 'Bandung', 'Admin', 'Islam', '832732093', '$2y$10$U6Lz.badC/Mg40qOraw7LO9t2GFN8qjAlIlfyS.vtia.OxTJP8puq', NULL, '2023-12-10 06:29:20', '2023-12-10 06:29:20'),
(2, 'PTG-000002', 'Aziz', 'Laki-laki', 'Rancamalang', 'Petugas', 'Islam', '08328193441', '$2y$10$TrrWS8/kxRQFyk6OzGd7AeLA8rc9ejqE.3rjNMOPt2dUIeAboG2Ke', NULL, '2023-12-10 06:30:43', '2023-12-10 06:30:43'),
(3, 'PTG-000003', 'Barikli', 'Laki-laki', 'Cimahi', 'Petugas', 'Islam', '08212718212', '$2y$10$CrvClcFLjLQDPLRgjQzAQOgR3GvWPcfRepHG.bbUO1CrBzAqSjPDK', NULL, '2023-12-10 17:42:22', '2023-12-10 17:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `tbarang_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `tdetailbeli`
--
ALTER TABLE `tdetailbeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tdetailbeli_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `tdetailjual`
--
ALTER TABLE `tdetailjual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tdetailjual_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `theadbeli`
--
ALTER TABLE `theadbeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theadbeli_id_suplier_foreign` (`id_suplier`);

--
-- Indexes for table `theadjual`
--
ALTER TABLE `theadjual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theadjual_kode_petugas_foreign` (`kode_petugas`);

--
-- Indexes for table `tpetugas`
--
ALTER TABLE `tpetugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsuplier`
--
ALTER TABLE `tsuplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tsuplier_kode_suplier_unique` (`kode_suplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889478239743295;

--
-- AUTO_INCREMENT for table `tdetailbeli`
--
ALTER TABLE `tdetailbeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tdetailjual`
--
ALTER TABLE `tdetailjual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `theadbeli`
--
ALTER TABLE `theadbeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `theadjual`
--
ALTER TABLE `theadjual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tpetugas`
--
ALTER TABLE `tpetugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tsuplier`
--
ALTER TABLE `tsuplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD CONSTRAINT `tbarang_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `tdetailbeli`
--
ALTER TABLE `tdetailbeli`
  ADD CONSTRAINT `tdetailbeli_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `tbarang` (`id_barang`);

--
-- Constraints for table `tdetailjual`
--
ALTER TABLE `tdetailjual`
  ADD CONSTRAINT `tdetailjual_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `tbarang` (`id_barang`);

--
-- Constraints for table `theadbeli`
--
ALTER TABLE `theadbeli`
  ADD CONSTRAINT `theadbeli_id_suplier_foreign` FOREIGN KEY (`id_suplier`) REFERENCES `tsuplier` (`id`);

--
-- Constraints for table `theadjual`
--
ALTER TABLE `theadjual`
  ADD CONSTRAINT `theadjual_kode_petugas_foreign` FOREIGN KEY (`kode_petugas`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
