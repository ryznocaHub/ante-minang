-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 08:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anteminang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_bakus`
--

CREATE TABLE `bahan_bakus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_bakus`
--

INSERT INTO `bahan_bakus` (`id`, `kode`, `nama`, `jumlah`, `satuan`) VALUES
(1, 'BB1', 'asd', 67, 'ton'),
(2, 'BB2', 'aduh', 96, 'kg'),
(3, 'BB3', 'Garam', 86, 'gr'),
(4, 'BB4', 'Plastik', 0, 'pcs'),
(6, 'BB6', 'safasd', 10, 'pcs'),
(8, 'BB8', 'barang1', 2, 'pcs'),
(9, 'BB9', 'kosong', 12524, 'pcs');

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
-- Table structure for table `history_bahan_bakus`
--

CREATE TABLE `history_bahan_bakus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_bahan_bakus`
--

INSERT INTO `history_bahan_bakus` (`id`, `kode`, `nama`, `user_id`, `jumlah`, `satuan`, `keterangan`, `kategori`, `tanggal`) VALUES
(1, 'BB1', 'Singkong', 1, 10, 'kg', 'Barang Masuk', 'Masuk', '2021-04-29 01:13:38'),
(2, 'BB1', 'Singkong', 1, 10, 'kg', 'Barang Masuk', 'Masuk', '2021-04-29 01:57:09'),
(3, 'BB1', 'Singkong', 1, 9, 'pcs', 'Barang Masuk', 'Keluar', '2021-04-29 01:57:24'),
(4, 'BB1', 'Singkong', 1, 7, 'kg', 'Barang Masuk', 'Masuk', '2021-04-29 01:58:51'),
(5, 'BB1', 'Singkong', 1, 3, 'pcs', 'Bahan produksi produk ($produk->nama)', 'Keluar', '2021-04-29 02:07:58'),
(6, 'BB1', 'Singkong', 1, 3, 'pcs', 'Bahan produksi produk Keripik', 'Keluar', '2021-04-29 02:09:10'),
(7, 'BB2', 'Gula', 1, 10, 'kg', 'Barang Masuk', 'Masuk', '2021-04-29 02:10:32'),
(8, 'BB3', 'Garam', 1, 10, 'gr', 'Barang Masuk', 'Masuk', '2021-04-29 02:10:40'),
(9, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 02:10:57'),
(10, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 02:10:57'),
(11, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 02:10:57'),
(12, 'BB1', 'Singkong', 1, 100, 'kg', 'Barang Masuk', 'Masuk', '2021-04-29 12:11:55'),
(13, 'BB2', 'Gula', 1, 100, 'kg', 'Barang Masuk', 'Masuk', '2021-04-29 12:12:04'),
(14, 'BB3', 'Garam', 1, 100, 'gr', 'Barang Masuk', 'Masuk', '2021-04-29 12:12:27'),
(15, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:13:50'),
(16, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:13:50'),
(17, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:13:50'),
(18, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:13:58'),
(19, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:13:58'),
(20, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:13:58'),
(21, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:06'),
(22, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:06'),
(23, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:06'),
(24, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:13'),
(25, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:13'),
(26, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:13'),
(27, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:21'),
(28, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:21'),
(29, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:21'),
(30, 'BB1', 'Singkong', 1, 1, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:29'),
(31, 'BB2', 'Gula', 1, 2, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:29'),
(32, 'BB3', 'Garam', 1, 3, 'pcs', 'Bahan produksi ada', 'Keluar', '2021-04-29 12:14:29'),
(33, 'BB1', 'sing', 1, 4, 'pcs', 'Bahan produksi coba lagi 1', 'Keluar', '2021-05-06 04:26:03'),
(34, 'BB1', 'sing', 1, 8, 'pcs', 'Bahan produksi coba lagi 1', 'Keluar', '2021-05-06 04:26:42'),
(35, 'BB1', 'sing', 1, 10, 'pcs', 'Bahan produksi Keripik Sanjai', 'Keluar', '2021-05-11 05:24:07'),
(36, 'BB3', 'Garam', 1, 3, 'gr', 'Busuk', 'Keluar', '2021-05-16 13:13:46'),
(37, 'BB1', 'sing', 1, 4, 'ton', 'Busuk', 'Keluar', '2021-05-16 13:16:59'),
(38, 'BB6', 'safasd', 1, 11, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-20 02:36:46'),
(39, 'BB6', 'safasd', 1, 1, 'pcs', 'Busuk', 'Keluar', '2021-05-20 02:36:54'),
(40, 'BB8', 'barang1', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-25 18:02:35'),
(41, 'BB8', 'barang1', 1, 2, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-25 18:06:28'),
(42, 'BB8', 'barang1', 1, 3, 'pcs', 'Busuk', 'Keluar', '2021-05-25 18:07:18'),
(43, 'BB8', 'barang1', 1, 6, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-25 18:07:37'),
(44, 'BB1', 'asd', 1, 1, 'pcs', 'Bahan produksi bismillah', 'Keluar', '2021-06-01 01:51:14'),
(45, 'BB9', 'kosong', 1, 12312, 'pcs', 'Barang Masuk', 'Masuk', '2021-06-01 02:33:16'),
(46, 'BB9', 'kosong', 1, 212, 'pcs', 'Barang Masuk', 'Masuk', '2021-06-01 02:35:58'),
(47, 'BB1', 'asd', 1, 1, 'pcs', 'Bahan produksi bismillah', 'Keluar', '2021-06-01 02:37:02'),
(48, 'BB1', 'asd', 1, 1, 'pcs', 'Bahan produksi bismillah', 'Keluar', '2021-06-01 02:37:28'),
(49, 'BB8', 'barang1', 1, 8, 'pcs', 'Busuk', 'Keluar', '2021-06-03 10:21:29'),
(50, 'BB8', 'barang1', 1, 4, 'pcs', 'Barang Masuk', 'Masuk', '2021-06-03 10:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `history_management_bahan_bakus`
--

CREATE TABLE `history_management_bahan_bakus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_management_bahan_bakus`
--

INSERT INTO `history_management_bahan_bakus` (`id`, `kode`, `nama`, `user_id`, `aksi`, `tanggal`) VALUES
(1, 'BB1', 'Singkong', 1, 'Tambah', '2021-04-29 01:13:26'),
(2, 'BB2', 'Gula', 1, 'Tambah', '2021-04-29 01:13:55'),
(3, 'BB3', 'Garam', 1, 'Tambah', '2021-04-29 01:14:08'),
(4, 'BB1', 'Singkong', 1, 'Ubah', '2021-04-30 00:50:10'),
(5, 'BB4', 'Plastik', 1, 'Tambah', '2021-05-06 08:42:58'),
(6, 'BB5', 'asdasd', 1, 'Hapus', '2021-05-16 13:13:12'),
(7, 'BB7', 'fikri halim', 1, 'Tambah', '2021-05-25 17:39:43'),
(8, 'BB1', 'sing', 1, 'Ubah', '2021-05-25 17:47:42'),
(9, 'BB2', 'Gula', 1, 'Ubah', '2021-05-25 17:50:57'),
(10, 'BB8', 'barang1', 1, 'Tambah', '2021-05-25 18:01:41'),
(11, 'BB7', 'fikri halim', 1, 'Hapus', '2021-05-25 18:17:43'),
(12, 'BB9', 'kosong', 1, 'Tambah', '2021-06-01 01:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `history_management_produks`
--

CREATE TABLE `history_management_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_management_produks`
--

INSERT INTO `history_management_produks` (`id`, `kode`, `nama`, `user_id`, `aksi`, `tanggal`) VALUES
(1, 'BJ1', 'Keripik', 1, 'Tambah', '2021-04-29 01:21:45'),
(2, 'BJ2', 'gula kapas', 1, 'Tambah', '2021-04-29 01:26:44'),
(3, 'BJ2', 'gula kapas', 1, 'Hapus', '2021-04-29 01:49:53'),
(4, 'BJ3', 'ada', 1, 'Tambah', '2021-04-29 02:10:13'),
(5, 'BJ4', 'produk 1', 1, 'Tambah', '2021-04-30 02:30:18'),
(6, 'BJ3', 'ada1', 1, 'Edit', '2021-05-05 14:49:27'),
(7, 'BJ3', 'ada1', 1, 'Edit', '2021-05-05 14:49:44'),
(8, 'BJ5', 'ini produk', 1, 'Tambah', '2021-05-05 14:53:49'),
(9, 'BJ6', 'ini bukan produk', 1, 'Tambah', '2021-05-05 14:54:08'),
(10, 'BJ7', 'coba lagi', 1, 'Tambah', '2021-05-05 14:54:29'),
(11, 'BJ5', 'ini produk', 1, 'Edit', '2021-05-05 15:24:06'),
(12, 'BJ6', 'ini bukan produk', 1, 'Edit', '2021-05-05 15:25:30'),
(13, 'BJ4', 'produk 1', 1, 'Edit', '2021-05-05 15:26:28'),
(14, 'BJ7', 'coba lagi 1', 1, 'Edit', '2021-05-05 15:30:16'),
(15, 'BJ1', 'Keripik singkong', 1, 'Edit', '2021-05-05 15:35:45'),
(16, 'BJ1', 'Keripik singkong', 1, 'Edit', '2021-05-05 15:36:59'),
(17, 'BJ1', 'Keripik singkong', 1, 'Edit', '2021-05-05 15:38:07'),
(18, 'BJ1', 'Keripik singkong', 1, 'Edit', '2021-05-05 15:38:47'),
(19, 'BJ5', 'ini produk 1', 1, 'Edit', '2021-05-05 16:47:37'),
(20, 'BJ7', 'coba lagi 1', 1, 'Edit', '2021-05-05 16:49:51'),
(21, 'BJ6', 'ini bukan produk', 1, 'Edit', '2021-05-05 16:50:46'),
(22, 'BJ6', 'ini bukan produk', 1, 'Edit', '2021-05-05 16:54:27'),
(23, 'BJ8', 'fikri halim', 1, 'Tambah', '2021-05-06 07:05:19'),
(24, 'BJ9', 'bismillah', 1, 'Tambah', '2021-05-06 07:09:41'),
(25, 'BJ10', 'asd1123', 1, 'Tambah', '2021-05-06 07:32:18'),
(26, 'BJ7', 'coba lagi 1', 1, 'Edit', '2021-05-06 08:12:18'),
(27, 'BJ11', 'Kue kering', 1, 'Tambah', '2021-05-06 14:59:23'),
(28, 'BJ11', 'Kue Kering banget', 1, 'Edit', '2021-05-06 14:59:57'),
(29, 'BJ12', 'Keripik Sanjai', 1, 'Tambah', '2021-05-11 05:23:40'),
(30, 'BJ11', 'Kue Kering banget', 1, 'Edit', '2021-05-19 01:04:48'),
(31, 'BJ9', 'bismillah', 1, 'Edit', '2021-05-20 02:49:04'),
(32, 'BJ9', 'bismillah', 1, 'Edit', '2021-05-20 02:49:25'),
(33, 'BJ13', 'asdasd1', 1, 'Tambah', '2021-06-01 01:50:23'),
(34, 'BJ14', 'ini  nyoba', 1, 'Tambah', '2021-06-01 01:54:21'),
(35, 'BJ15', 'ss', 1, 'Tambah', '2021-06-01 01:56:27'),
(36, 'BJ15', 'ss', 1, 'Edit', '2021-06-01 02:08:31'),
(37, 'BJ16', 'sekali', 1, 'Tambah', '2021-06-01 02:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `history_produks`
--

CREATE TABLE `history_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_produks`
--

INSERT INTO `history_produks` (`id`, `kode`, `nama`, `user_id`, `jumlah`, `satuan`, `keterangan`, `kategori`, `tanggal`) VALUES
(1, 'BJ1', 'Keripik', 1, 3, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 01:23:37'),
(2, 'BJ1', 'Keripik', 1, 3, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 01:57:24'),
(3, 'BJ1', 'Keripik', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 02:07:58'),
(4, 'BJ1', 'Keripik', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 02:09:10'),
(5, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 02:10:57'),
(6, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 12:13:50'),
(7, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 12:13:58'),
(8, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 12:14:06'),
(9, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 12:14:14'),
(10, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 12:14:21'),
(11, 'BJ3', 'ada', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-04-29 12:14:29'),
(12, 'BJ7', 'coba lagi 1', 1, 2, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-06 04:26:04'),
(13, 'BJ7', 'coba lagi 1', 1, 2, 'pcs', 'Busuk', 'Keluar', '2021-05-06 04:26:26'),
(14, 'BJ7', 'coba lagi 1', 1, 4, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-06 04:26:42'),
(15, 'BJ7', 'coba lagi 1', 1, 1, 'pcs', 'Terjual', 'Keluar', '2021-05-11 05:10:18'),
(16, 'BJ12', 'Keripik Sanjai', 1, 10, 'pcs', 'Barang Masuk', 'Masuk', '2021-05-11 05:24:07'),
(17, 'BJ12', 'Keripik Sanjai', 1, 1, 'pcs', 'Terjual', 'Keluar', '2021-05-11 05:24:15'),
(18, 'BJ12', 'Keripik Sanjai', 1, 2, 'pcs', 'Terjual', 'Keluar', '2021-05-11 05:24:21'),
(19, 'BJ3', 'ada1', 1, 4, 'ton', 'Terjual', 'Keluar', '2021-05-16 13:10:46'),
(20, 'BJ7', 'coba lagi 1', 1, 1, 'pcs', 'Terjual', 'Keluar', '2021-05-20 02:37:22'),
(21, 'BJ7', 'coba lagi 1', 1, 1, 'pcs', 'Terjual', 'Keluar', '2021-05-20 02:37:33'),
(22, 'BJ9', 'bismillah', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-06-01 01:51:14'),
(23, 'BJ7', 'coba lagi 1', 1, 1, 'pcs', 'Terjual', 'Keluar', '2021-06-01 02:04:02'),
(24, 'BJ9', 'bismillah', 1, 1, 'pcs', 'Barang Masuk', 'Masuk', '2021-06-01 02:37:02'),
(25, 'BJ9', 'bismillah', 1, 1, 'pcs', 's', 'Masuk', '2021-06-01 02:37:28'),
(26, 'BJ9', 'bismillah', 1, 1, 'pcs', 'Terjual', 'Keluar', '2021-06-01 02:38:54'),
(27, 'BJ9', 'bismillah', 1, 1, 'pcs', 's', 'Keluar', '2021-06-01 02:39:39');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_19_052305_create_produks_table', 1),
(5, '2021_04_20_180403_create_bahan_bakus_table', 1),
(6, '2021_04_20_180425_create_reseps_table', 1),
(7, '2021_04_21_051759_create_history_bahan_bakus_table', 1),
(8, '2021_04_21_051817_create_history_produks_table', 1),
(9, '2021_04_21_051839_create_history_management_bahan_bakus_table', 1),
(10, '2021_04_21_051856_create_history_management_produks_table', 1),
(11, '2021_04_31_140947_create_stoks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kode`, `nama`, `jumlah`, `satuan`) VALUES
(1, 'BJ1', 'Keripik singkong', 8, 'satuan lah'),
(3, 'BJ3', 'ada1', 3, 'ton'),
(4, 'BJ4', 'produk 1', 0, 'ons'),
(5, 'BJ5', 'ini produk 1', 0, 'Ton'),
(6, 'BJ6', 'ini bukan produk', 0, 'pcs'),
(7, 'BJ7', 'coba lagi 1', 0, 'pcs'),
(8, 'BJ8', 'fikri halim', 0, 'pcs'),
(9, 'BJ9', 'bismillah', 1, 'pcs'),
(10, 'BJ10', 'asd1123', 0, 'pcs'),
(11, 'BJ11', 'Kue Kering banget', 0, 'pcs'),
(12, 'BJ12', 'Keripik Sanjai', 7, 'pcs'),
(13, 'BJ13', 'asdasd1', 0, 'pcs'),
(14, 'BJ14', 'ini  nyoba', 0, 'pcs'),
(15, 'BJ15', 'ss', 0, 'pcs'),
(16, 'BJ16', 'sekali', 0, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `reseps`
--

CREATE TABLE `reseps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `bahan_baku_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reseps`
--

INSERT INTO `reseps` (`id`, `produk_id`, `bahan_baku_id`, `jumlah`) VALUES
(20, 4, 1, 1),
(21, 4, 3, 1),
(26, 1, 1, 4),
(27, 5, 1, 1),
(30, 6, 2, 1),
(31, 8, 2, 1),
(33, 10, 3, 2),
(34, 7, 1, 2),
(42, 12, 1, 1),
(43, 11, 2, 1),
(44, 11, 3, 1),
(47, 9, 1, 1),
(48, 13, 1, 1),
(49, 14, 9, 1),
(51, 15, 9, 1),
(52, 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bahan_baku_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `name`, `email`, `jabatan`, `no_hp`, `foto`, `password`) VALUES
(1, 'a', 1, 'admin', 'admin@admin', 'Superadmin', '08221616161', 'http://127.0.0.1:8000/storage/foto/fikri/cropped-Lambang-KMPA-1 (1).png', '$2y$10$.A5kGVXJ.pcxqJ/z6Q7I5eSfvoD1XamcI96jR2x5Dt763x1v7sYVe'),
(2, 'ads', 2, 'fikri', 'fikri@gmail.com', 'Resign', '081311308298', 'http://127.0.0.1:8000/storage/foto/fikri/cropped-Lambang-KMPA-1 (1).png', '$2y$10$quRd4qGhsiyBaqPiDzNq4.BsN0FaK0BDsvIn2yBHj5D7ZJ3pb60.e'),
(3, 'fikrihalim', 2, 'faker', 'fikrihalim27@gmail.com', 'Pegawai', '089868789081', 'http://127.0.0.1:8000/storage/foto/fikri halim ch/cropped-Lambang-KMPA-1 (1).png', '$2y$10$xIy.oYoN7uzhL3CEN8GfJ.lkjM6fmSlgrGLxtNCIK9kLdkH/0OIcq'),
(4, 'fikrich', 2, 'fikri halim ch', 'fikri@kosbar.com', 'Pegawai', '09828292819', 'http://127.0.0.1:8000/storage/foto/fikri halim ch/cropped-Lambang-KMPA-1 (1).png', '$2y$10$CfE4J86vx52eUaU2YuJSmOX9UP657w2bjqoGgVWlQQLaDGqVVnZCG'),
(5, 'coba', 2, 'coba', 'coba@coba.com', 'Pegawai', '0987098798', 'http://127.0.0.1:8000/storage/foto/coba/image.png', '$2y$10$Qgd5aJFe6tA0mDIuSjuyt.Ui8xRhoPLfKtztajoQhmpskn0eX7kGe'),
(6, 'percobaan', 2, 'user percobaan', 'user@user.com', 'Pegawai', '09876543211', 'http://127.0.0.1:8000/storage/foto/user percobaan/Fikri Halim Ch_118140055_Teknologi Industri_Teknik Informatika.JPG', '$2y$10$oh1l82Wg1.G2WrmxnwYFTeMfBiOsWhZUOdee/wMOsIx8tMUwlSEV2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_bakus`
--
ALTER TABLE `bahan_bakus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_bahan_bakus`
--
ALTER TABLE `history_bahan_bakus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_bahan_bakus_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_management_bahan_bakus`
--
ALTER TABLE `history_management_bahan_bakus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_management_bahan_bakus_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_management_produks`
--
ALTER TABLE `history_management_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_management_produks_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_produks`
--
ALTER TABLE `history_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_produks_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseps`
--
ALTER TABLE `reseps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reseps_produk_id_foreign` (`produk_id`),
  ADD KEY `reseps_bahan_baku_id_foreign` (`bahan_baku_id`);

--
-- Indexes for table `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stoks_bahan_baku_id_foreign` (`bahan_baku_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_bakus`
--
ALTER TABLE `bahan_bakus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_bahan_bakus`
--
ALTER TABLE `history_bahan_bakus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `history_management_bahan_bakus`
--
ALTER TABLE `history_management_bahan_bakus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history_management_produks`
--
ALTER TABLE `history_management_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `history_produks`
--
ALTER TABLE `history_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reseps`
--
ALTER TABLE `reseps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_bahan_bakus`
--
ALTER TABLE `history_bahan_bakus`
  ADD CONSTRAINT `history_bahan_bakus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_management_bahan_bakus`
--
ALTER TABLE `history_management_bahan_bakus`
  ADD CONSTRAINT `history_management_bahan_bakus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_management_produks`
--
ALTER TABLE `history_management_produks`
  ADD CONSTRAINT `history_management_produks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_produks`
--
ALTER TABLE `history_produks`
  ADD CONSTRAINT `history_produks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reseps`
--
ALTER TABLE `reseps`
  ADD CONSTRAINT `reseps_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reseps_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stoks`
--
ALTER TABLE `stoks`
  ADD CONSTRAINT `stoks_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
