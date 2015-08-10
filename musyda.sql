-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2015 pada 13.25
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musyda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
`captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `word` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `word`) VALUES
(218, 1435816077, 'R2X6F'),
(217, 1435815512, 'NVLPC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_admin_cabang`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_cabang` (
`id_admin_cabang` int(5) NOT NULL,
  `id_cabang` int(5) NOT NULL,
  `nama_operator` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_admin_cabang`
--

INSERT INTO `dlmbg_admin_cabang` (`id_admin_cabang`, `id_cabang`, `nama_operator`, `username`, `password`, `email`) VALUES
(1, 1, 'Immawati untuk Immawan', 'pimpinancabang', 'babd59f0bbff70cdce58a986069b9f65', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_admin_panitia`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_panitia` (
`id_admin_panitia` int(5) NOT NULL,
  `nama_admin_panitia` varchar(100) NOT NULL,
  `wan_wati` varchar(8) NOT NULL,
  `username_admin_panitia` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_admin_panitia`
--

INSERT INTO `dlmbg_admin_panitia` (`id_admin_panitia`, `nama_admin_panitia`, `wan_wati`, `username_admin_panitia`, `password`) VALUES
(1, 'IMM Setengah Abad', 'Immawan', 'panitia', 'babd59f0bbff70cdce58a986069b9f65');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_admin_panlih`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_panlih` (
`id_admin_panlih` int(5) NOT NULL,
  `nama_panlih_admin` varchar(100) NOT NULL,
  `username_panlih_admin` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_admin_panlih`
--

INSERT INTO `dlmbg_admin_panlih` (`id_admin_panlih`, `nama_panlih_admin`, `username_panlih_admin`, `password`) VALUES
(1, 'Panlih', 'panlih', 'babd59f0bbff70cdce58a986069b9f65');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_admin_super`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_super` (
`id_admin_super` int(5) NOT NULL,
  `nama_super_admin` varchar(100) NOT NULL,
  `username_super_admin` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_admin_super`
--

INSERT INTO `dlmbg_admin_super` (`id_admin_super`, `nama_super_admin`, `username_super_admin`, `password`) VALUES
(1, 'Arif Hidayat', 'superadmin', 'babd59f0bbff70cdce58a986069b9f65');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_cabang_formatur`
--

CREATE TABLE IF NOT EXISTS `dlmbg_cabang_formatur` (
`id_cabang_formatur` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `wan_wati` varchar(18) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `asal_komisariat` varchar(25) NOT NULL,
  `tempat_dad` varchar(25) NOT NULL,
  `tahun_dad` year(4) NOT NULL,
  `tempat_dam` varchar(25) NOT NULL,
  `tahun_dam` year(4) NOT NULL,
  `utk_imm` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` int(20) NOT NULL,
  `id_admin_cabang` int(5) NOT NULL,
  `id_cabang_profil` int(5) NOT NULL,
  `stts` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_cabang_formatur`
--

INSERT INTO `dlmbg_cabang_formatur` (`id_cabang_formatur`, `nama`, `wan_wati`, `tgl_lahir`, `no_hp`, `asal_komisariat`, `tempat_dad`, `tahun_dad`, `tempat_dam`, `tahun_dam`, `utk_imm`, `gambar`, `tanggal`, `id_admin_cabang`, `id_cabang_profil`, `stts`) VALUES
(15, 'Arif Hidayat', 'Immawan', 'asdasd', '0856788729384', 'Tarbiyah', 'Tarbiyah', 2009, 'fgerger', 2010, 'asdasd', 'fashionstore.zip', 1435840647, 2, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_cabang_kader`
--

CREATE TABLE IF NOT EXISTS `dlmbg_cabang_kader` (
`id_cabang_kader` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `wan_wati` varchar(8) NOT NULL,
  `komisariat` varchar(200) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_cabang` int(5) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_cabang_profil`
--

CREATE TABLE IF NOT EXISTS `dlmbg_cabang_profil` (
`id_cabang_profil` int(5) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `visi_misi` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_cabang_profil`
--

INSERT INTO `dlmbg_cabang_profil` (`id_cabang_profil`, `nama_cabang`, `visi_misi`, `alamat`, `email`) VALUES
(1, 'IMM Setengah Abad', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_counter`
--

CREATE TABLE IF NOT EXISTS `dlmbg_counter` (
`id_counter` int(10) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_counter`
--

INSERT INTO `dlmbg_counter` (`id_counter`, `ip_address`, `tanggal`) VALUES
(1, '::1', '07-Feb-2013 19:10:55'),
(2, '::1', '08-Feb-2013 00:51:56'),
(3, '::1', '08-Feb-2013 05:33:05'),
(4, '::1', '08-Feb-2013 19:44:16'),
(5, '::1', '11-Feb-2013 02:32:36'),
(6, '::1', '11-Feb-2013 03:12:08'),
(7, '::1', '11-Feb-2013 12:44:50'),
(8, '::1', '11-Feb-2013 12:53:02'),
(9, '::1', '11-Feb-2013 13:24:15'),
(10, '::1', '11-Feb-2013 23:43:27'),
(11, '::1', '12-Feb-2013 00:18:03'),
(12, '::1', '12-Feb-2013 00:18:13'),
(13, '::1', '12-Feb-2013 00:23:33'),
(14, '::1', '12-Feb-2013 00:25:12'),
(15, '::1', '12-Feb-2013 02:36:03'),
(16, '::1', '12-Feb-2013 02:40:00'),
(17, '::1', '12-Feb-2013 02:40:05'),
(18, '::1', '12-Feb-2013 02:40:28'),
(19, '::1', '12-Feb-2013 02:40:31'),
(20, '::1', '12-Feb-2013 04:38:19'),
(21, '::1', '12-Feb-2013 04:39:26'),
(22, '::1', '12-Feb-2013 04:40:10'),
(23, '::1', '16-Feb-2013 04:41:24'),
(24, '::1', '16-Feb-2013 04:41:37'),
(25, '::1', '16-Feb-2013 04:42:46'),
(26, '::1', '12-Feb-2013 04:45:24'),
(27, '::1', '12-Feb-2013 04:46:13'),
(28, '::1', '12-Feb-2013 04:46:22'),
(29, '::1', '12-Feb-2013 04:46:29'),
(30, '::1', '12-Feb-2013 04:46:32'),
(31, '::1', '12-Feb-2013 04:46:34'),
(32, '::1', '12-Feb-2013 04:49:26'),
(33, '::1', '12-Feb-2013 04:58:22'),
(34, '::1', '12-Feb-2013 04:58:29'),
(35, '::1', '12-Feb-2013 04:58:39'),
(36, '::1', '12-Feb-2013 04:59:01'),
(37, '::1', '12-Feb-2013 04:59:14'),
(38, '::1', '12-Feb-2013 04:59:17'),
(39, '::1', '12-Feb-2013 05:00:41'),
(40, '::1', '12-Feb-2013 05:00:48'),
(41, '::1', '12-Feb-2013 05:07:43'),
(42, '::1', '12-Feb-2013 05:08:13'),
(43, '::1', '12-Feb-2013 05:08:32'),
(44, '::1', '12-Feb-2013 05:08:40'),
(45, '::1', '12-Feb-2013 05:09:58'),
(46, '::1', '12-Feb-2013 05:10:26'),
(47, '::1', '12-Feb-2013 05:10:42'),
(48, '::1', '12-Feb-2013 05:45:59'),
(49, '::1', '12-Feb-2013 05:46:11'),
(50, '::1', '12-Feb-2013 05:46:29'),
(51, '::1', '12-Feb-2013 05:47:26'),
(52, '::1', '12-Feb-2013 05:47:37'),
(53, '::1', '12-Feb-2013 05:47:53'),
(54, '::1', '12-Feb-2013 05:48:31'),
(55, '::1', '12-Feb-2013 05:48:46'),
(56, '::1', '12-Feb-2013 05:48:53'),
(57, '::1', '12-Feb-2013 05:49:02'),
(58, '::1', '12-Feb-2013 05:49:47'),
(59, '::1', '12-Feb-2013 05:50:22'),
(60, '::1', '12-Feb-2013 05:52:25'),
(61, '::1', '12-Feb-2013 05:52:30'),
(62, '::1', '12-Feb-2013 05:53:00'),
(63, '::1', '12-Feb-2013 05:53:02'),
(64, '::1', '12-Feb-2013 05:54:14'),
(65, '::1', '12-Feb-2013 05:54:33'),
(66, '::1', '12-Feb-2013 05:54:52'),
(67, '::1', '12-Feb-2013 05:55:52'),
(68, '::1', '12-Feb-2013 05:56:13'),
(69, '::1', '12-Feb-2013 05:56:17'),
(70, '::1', '12-Feb-2013 05:56:20'),
(71, '::1', '12-Feb-2013 05:56:22'),
(72, '::1', '12-Feb-2013 05:57:28'),
(73, '::1', '12-Feb-2013 05:57:44'),
(74, '::1', '12-Feb-2013 05:57:48'),
(75, '::1', '12-Feb-2013 05:58:03'),
(76, '::1', '12-Feb-2013 05:58:24'),
(77, '::1', '12-Feb-2013 05:58:49'),
(78, '::1', '12-Feb-2013 05:59:03'),
(79, '::1', '12-Feb-2013 05:59:03'),
(80, '::1', '12-Feb-2013 05:59:13'),
(81, '::1', '12-Feb-2013 05:59:20'),
(82, '::1', '12-Feb-2013 05:59:26'),
(83, '::1', '12-Feb-2013 05:59:29'),
(84, '::1', '12-Feb-2013 05:59:33'),
(85, '::1', '12-Feb-2013 05:59:36'),
(86, '::1', '12-Feb-2013 05:59:42'),
(87, '::1', '12-Feb-2013 05:59:56'),
(88, '::1', '12-Feb-2013 05:59:59'),
(89, '::1', '12-Feb-2013 06:00:05'),
(90, '::1', '12-Feb-2013 06:00:09'),
(91, '::1', '12-Feb-2013 06:00:09'),
(92, '::1', '12-Feb-2013 06:00:14'),
(93, '::1', '12-Feb-2013 06:00:40'),
(94, '::1', '12-Feb-2013 06:02:04'),
(95, '::1', '12-Feb-2013 06:02:12'),
(96, '::1', '12-Feb-2013 06:02:12'),
(97, '::1', '12-Feb-2013 06:02:30'),
(98, '::1', '12-Feb-2013 06:02:47'),
(99, '::1', '12-Feb-2013 06:03:05'),
(100, '::1', '12-Feb-2013 06:03:56'),
(101, '::1', '12-Feb-2013 06:04:08'),
(102, '::1', '12-Feb-2013 06:04:14'),
(103, '::1', '12-Feb-2013 06:04:17'),
(104, '::1', '12-Feb-2013 06:04:20'),
(105, '::1', '12-Feb-2013 06:04:23'),
(106, '::1', '12-Feb-2013 06:04:26'),
(107, '::1', '12-Feb-2013 06:05:35'),
(108, '::1', '12-Feb-2013 06:06:12'),
(109, '::1', '12-Feb-2013 06:06:21'),
(110, '::1', '12-Feb-2013 06:06:26'),
(111, '::1', '12-Feb-2013 06:06:28'),
(112, '::1', '12-Feb-2013 06:07:54'),
(113, '::1', '12-Feb-2013 06:11:31'),
(114, '::1', '12-Feb-2013 06:11:38'),
(115, '::1', '12-Feb-2013 06:11:55'),
(116, '::1', '12-Feb-2013 06:12:30'),
(117, '::1', '12-Feb-2013 06:12:35'),
(118, '::1', '12-Feb-2013 06:12:41'),
(119, '::1', '12-Feb-2013 06:12:44'),
(120, '::1', '12-Feb-2013 06:12:54'),
(121, '::1', '12-Feb-2013 06:12:59'),
(122, '::1', '12-Feb-2013 06:13:02'),
(123, '::1', '12-Feb-2013 06:13:22'),
(124, '::1', '12-Feb-2013 06:15:09'),
(125, '::1', '12-Feb-2013 06:17:24'),
(126, '::1', '12-Feb-2013 06:19:30'),
(127, '::1', '12-Feb-2013 06:20:07'),
(128, '::1', '12-Feb-2013 06:21:09'),
(129, '::1', '12-Feb-2013 06:21:26'),
(130, '::1', '12-Feb-2013 06:22:03'),
(131, '::1', '12-Feb-2013 06:22:11'),
(132, '::1', '12-Feb-2013 06:22:30'),
(133, '::1', '12-Feb-2013 06:22:31'),
(134, '::1', '12-Feb-2013 06:22:36'),
(135, '::1', '12-Feb-2013 06:22:47'),
(136, '::1', '12-Feb-2013 06:23:13'),
(137, '::1', '12-Feb-2013 06:23:24'),
(138, '::1', '12-Feb-2013 06:23:29'),
(139, '::1', '12-Feb-2013 06:23:34'),
(140, '::1', '12-Feb-2013 06:37:35'),
(141, '::1', '12-Feb-2013 06:41:13'),
(142, '::1', '12-Feb-2013 06:42:52'),
(143, '::1', '12-Feb-2013 06:43:10'),
(144, '::1', '12-Feb-2013 06:43:36'),
(145, '::1', '12-Feb-2013 06:43:48'),
(146, '::1', '12-Feb-2013 06:44:43'),
(147, '::1', '12-Feb-2013 06:45:26'),
(148, '::1', '12-Feb-2013 06:45:55'),
(149, '::1', '12-Feb-2013 06:46:02'),
(150, '::1', '12-Feb-2013 06:46:05'),
(151, '::1', '12-Feb-2013 06:46:08'),
(152, '::1', '12-Feb-2013 06:46:18'),
(153, '::1', '12-Feb-2013 06:46:38'),
(154, '::1', '12-Feb-2013 06:46:50'),
(155, '::1', '12-Feb-2013 06:46:57'),
(156, '::1', '12-Feb-2013 06:47:05'),
(157, '::1', '12-Feb-2013 06:47:10'),
(158, '::1', '12-Feb-2013 06:47:13'),
(159, '::1', '12-Feb-2013 06:47:16'),
(160, '::1', '12-Feb-2013 06:47:26'),
(161, '::1', '12-Feb-2013 06:47:41'),
(162, '::1', '12-Feb-2013 06:47:45'),
(163, '::1', '12-Feb-2013 06:47:51'),
(164, '::1', '12-Feb-2013 06:47:54'),
(165, '::1', '12-Feb-2013 06:49:14'),
(166, '::1', '12-Feb-2013 06:49:16'),
(167, '::1', '12-Feb-2013 06:49:31'),
(168, '::1', '12-Feb-2013 06:49:34'),
(169, '::1', '12-Feb-2013 06:49:36'),
(170, '::1', '12-Feb-2013 06:49:44'),
(171, '::1', '12-Feb-2013 06:50:41'),
(172, '::1', '12-Feb-2013 06:50:47'),
(173, '::1', '12-Feb-2013 07:05:03'),
(174, '::1', '12-Feb-2013 07:05:45'),
(175, '::1', '12-Feb-2013 07:05:50'),
(176, '::1', '12-Feb-2013 07:05:52'),
(177, '::1', '12-Feb-2013 07:06:02'),
(178, '::1', '12-Feb-2013 07:06:04'),
(179, '::1', '12-Feb-2013 07:06:11'),
(180, '::1', '12-Feb-2013 07:06:58'),
(181, '::1', '12-Feb-2013 07:07:05'),
(182, '::1', '12-Feb-2013 07:07:08'),
(183, '::1', '12-Feb-2013 07:07:17'),
(184, '::1', '12-Feb-2013 07:07:28'),
(185, '::1', '12-Feb-2013 07:07:31'),
(186, '::1', '12-Feb-2013 07:07:44'),
(187, '::1', '12-Feb-2013 07:07:47'),
(188, '::1', '12-Feb-2013 07:07:53'),
(189, '::1', '12-Feb-2013 07:36:16'),
(190, '::1', '12-Feb-2013 07:43:27'),
(191, '::1', '12-Feb-2013 07:49:30'),
(192, '::1', '12-Feb-2013 07:52:51'),
(193, '::1', '12-Feb-2013 07:53:57'),
(194, '::1', '12-Feb-2013 07:54:05'),
(195, '::1', '12-Feb-2013 07:54:09'),
(196, '::1', '12-Feb-2013 07:54:11'),
(197, '::1', '12-Feb-2013 07:57:03'),
(198, '::1', '12-Feb-2013 07:58:46'),
(199, '::1', '12-Feb-2013 07:59:50'),
(200, '::1', '12-Feb-2013 08:00:04'),
(201, '::1', '12-Feb-2013 08:00:11'),
(202, '::1', '12-Feb-2013 08:04:26'),
(203, '::1', '12-Feb-2013 08:04:30'),
(204, '::1', '12-Feb-2013 08:04:31'),
(205, '::1', '12-Feb-2013 08:05:54'),
(206, '::1', '12-Feb-2013 08:06:39'),
(207, '::1', '12-Feb-2013 08:07:54'),
(208, '::1', '12-Feb-2013 08:11:20'),
(209, '::1', '12-Feb-2013 08:13:43'),
(210, '::1', '12-Feb-2013 08:14:08'),
(211, '::1', '12-Feb-2013 08:14:31'),
(212, '::1', '12-Feb-2013 08:15:36'),
(213, '::1', '12-Feb-2013 08:16:14'),
(214, '::1', '12-Feb-2013 08:16:36'),
(215, '::1', '12-Feb-2013 08:16:58'),
(216, '::1', '12-Feb-2013 08:17:28'),
(217, '::1', '12-Feb-2013 08:17:45'),
(218, '::1', '12-Feb-2013 08:17:52'),
(219, '::1', '12-Feb-2013 08:18:17'),
(220, '::1', '12-Feb-2013 08:18:23'),
(221, '::1', '12-Feb-2013 08:18:30'),
(222, '::1', '12-Feb-2013 08:18:38'),
(223, '::1', '12-Feb-2013 08:20:36'),
(224, '::1', '12-Feb-2013 08:21:09'),
(225, '::1', '12-Feb-2013 08:22:25'),
(226, '::1', '12-Feb-2013 08:25:48'),
(227, '::1', '12-Feb-2013 08:26:31'),
(228, '::1', '12-Feb-2013 08:28:03'),
(229, '::1', '12-Feb-2013 08:28:11'),
(230, '::1', '12-Feb-2013 08:28:31'),
(231, '::1', '12-Feb-2013 08:28:59'),
(232, '::1', '12-Feb-2013 08:29:15'),
(233, '::1', '12-Feb-2013 08:29:21'),
(234, '::1', '12-Feb-2013 08:29:28'),
(235, '::1', '12-Feb-2013 08:30:55'),
(236, '::1', '12-Feb-2013 08:31:06'),
(237, '::1', '12-Feb-2013 08:31:33'),
(238, '::1', '12-Feb-2013 08:31:35'),
(239, '::1', '12-Feb-2013 08:31:38'),
(240, '::1', '12-Feb-2013 08:31:40'),
(241, '::1', '12-Feb-2013 08:32:21'),
(242, '::1', '12-Feb-2013 08:33:41'),
(243, '::1', '12-Feb-2013 08:42:37'),
(244, '::1', '12-Feb-2013 08:42:39'),
(245, '::1', '12-Feb-2013 08:43:17'),
(246, '::1', '12-Feb-2013 08:44:16'),
(247, '::1', '12-Feb-2013 08:46:45'),
(248, '::1', '12-Feb-2013 14:11:58'),
(249, '::1', '12-Feb-2013 23:36:01'),
(250, '::1', '13-Feb-2013 12:27:58'),
(251, '::1', '13-Feb-2013 20:48:22'),
(252, '::1', '14-Feb-2013 13:45:01'),
(253, '::1', '14-Feb-2013 14:14:54'),
(254, '::1', '15-Feb-2013 00:11:51'),
(255, '::1', '15-Feb-2013 00:11:55'),
(256, '::1', '15-Feb-2013 02:14:13'),
(257, '::1', '15-Feb-2013 02:14:22'),
(258, '::1', '15-Feb-2013 02:50:45'),
(259, '::1', '15-Feb-2013 02:53:07'),
(260, '::1', '15-Feb-2013 02:54:01'),
(261, '::1', '15-Feb-2013 07:44:50'),
(262, '::1', '15-Feb-2013 07:44:54'),
(263, '::1', '15-Feb-2013 07:44:56'),
(264, '::1', '15-Feb-2013 07:45:14'),
(265, '::1', '15-Feb-2013 14:44:10'),
(266, '::1', '16-Feb-2013 02:20:22'),
(267, '::1', '16-Feb-2013 16:55:25'),
(268, '::1', '17-Feb-2013 02:31:15'),
(269, '::1', '18-Feb-2013 00:46:44'),
(270, '::1', '18-Feb-2013 12:00:47'),
(271, '::1', '18-Feb-2013 12:20:19'),
(272, '::1', '18-Feb-2013 16:06:29'),
(273, '::1', '19-Feb-2013 03:57:51'),
(274, '::1', '19-Feb-2013 14:38:48'),
(275, '::1', '19-Feb-2013 15:20:39'),
(276, '::1', '19-Feb-2013 21:02:05'),
(277, '::1', '20-Feb-2013 04:36:49'),
(278, '::1', '20-Feb-2013 15:14:56'),
(279, '::1', '21-Feb-2013 01:58:17'),
(280, '::1', '22-Feb-2013 02:09:05'),
(281, '174.129.228.67', '22-Feb-2013 11:57:50'),
(282, '174.129.228.67', '22-Feb-2013 16:59:16'),
(283, '125.164.244.154', '23-Feb-2013 00:07:35'),
(284, '174.129.228.67', '23-Feb-2013 09:35:37'),
(285, '114.79.2.84', '23-Feb-2013 10:19:01'),
(286, '174.129.228.67', '23-Feb-2013 10:36:26'),
(287, '203.78.119.74', '23-Feb-2013 11:50:31'),
(288, '::1', '27-Feb-2013 13:45:25'),
(289, '::1', '04-Mar-2013 23:11:46'),
(290, '::1', '25-Apr-2015 19:57:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_menu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_menu` (
`id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url_route` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `posisi` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_menu`
--

INSERT INTO `dlmbg_menu` (`id_menu`, `id_parent`, `menu`, `url_route`, `content`, `posisi`) VALUES
(13, 0, 'Beranda', '/web/web', '', 'bawah'),
(18, 0, 'Pesan Musyda', '/web/pesan_musyda', '', 'bawah'),
(19, 0, 'Jadwal Musyda', 'web/jadwal_musyda', '', 'bawah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
`id_setting` int(10) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Musyawarah Daerah XVII IMM Jawa Tengah'),
(2, 'site_footer', 'Teks Footer', 'IMM Setengah Abad dan DPD IMM Jawa Tengah'),
(3, 'site_tema', 'Tema Musyda', 'Api Kebangkitan Mengawal Peradaban\r\n'),
(4, 'site_slider', 'Aktifkan Slider', 'yes'),
(12, 'site_slider_always', 'Tampilkan Slider di Semua Halaman', 'no'),
(13, 'site_theme', 'Nama Tampilan', 'blue-clouds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_super_pesan_musyda`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_pesan_musyda` (
  `id_super_pesan_musyda` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` int(20) NOT NULL,
  `stts` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_super_statis`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_statis` (
  `id_super_statis` int(5) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
 ADD PRIMARY KEY (`captcha_id`), ADD KEY `word` (`word`);

--
-- Indexes for table `dlmbg_admin_cabang`
--
ALTER TABLE `dlmbg_admin_cabang`
 ADD PRIMARY KEY (`id_admin_cabang`);

--
-- Indexes for table `dlmbg_admin_panitia`
--
ALTER TABLE `dlmbg_admin_panitia`
 ADD PRIMARY KEY (`id_admin_panitia`);

--
-- Indexes for table `dlmbg_admin_panlih`
--
ALTER TABLE `dlmbg_admin_panlih`
 ADD PRIMARY KEY (`id_admin_panlih`);

--
-- Indexes for table `dlmbg_admin_super`
--
ALTER TABLE `dlmbg_admin_super`
 ADD PRIMARY KEY (`id_admin_super`);

--
-- Indexes for table `dlmbg_cabang_formatur`
--
ALTER TABLE `dlmbg_cabang_formatur`
 ADD PRIMARY KEY (`id_cabang_formatur`);

--
-- Indexes for table `dlmbg_cabang_kader`
--
ALTER TABLE `dlmbg_cabang_kader`
 ADD PRIMARY KEY (`id_cabang_kader`);

--
-- Indexes for table `dlmbg_cabang_profil`
--
ALTER TABLE `dlmbg_cabang_profil`
 ADD PRIMARY KEY (`id_cabang_profil`);

--
-- Indexes for table `dlmbg_counter`
--
ALTER TABLE `dlmbg_counter`
 ADD PRIMARY KEY (`id_counter`);

--
-- Indexes for table `dlmbg_menu`
--
ALTER TABLE `dlmbg_menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `dlmbg_setting`
--
ALTER TABLE `dlmbg_setting`
 ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `dlmbg_super_pesan_musyda`
--
ALTER TABLE `dlmbg_super_pesan_musyda`
 ADD PRIMARY KEY (`id_super_pesan_musyda`);

--
-- Indexes for table `dlmbg_super_statis`
--
ALTER TABLE `dlmbg_super_statis`
 ADD PRIMARY KEY (`id_super_statis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `dlmbg_admin_cabang`
--
ALTER TABLE `dlmbg_admin_cabang`
MODIFY `id_admin_cabang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dlmbg_admin_panitia`
--
ALTER TABLE `dlmbg_admin_panitia`
MODIFY `id_admin_panitia` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dlmbg_admin_panlih`
--
ALTER TABLE `dlmbg_admin_panlih`
MODIFY `id_admin_panlih` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dlmbg_admin_super`
--
ALTER TABLE `dlmbg_admin_super`
MODIFY `id_admin_super` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dlmbg_cabang_formatur`
--
ALTER TABLE `dlmbg_cabang_formatur`
MODIFY `id_cabang_formatur` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `dlmbg_cabang_kader`
--
ALTER TABLE `dlmbg_cabang_kader`
MODIFY `id_cabang_kader` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dlmbg_cabang_profil`
--
ALTER TABLE `dlmbg_cabang_profil`
MODIFY `id_cabang_profil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dlmbg_counter`
--
ALTER TABLE `dlmbg_counter`
MODIFY `id_counter` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=291;
--
-- AUTO_INCREMENT for table `dlmbg_menu`
--
ALTER TABLE `dlmbg_menu`
MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dlmbg_setting`
--
ALTER TABLE `dlmbg_setting`
MODIFY `id_setting` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
