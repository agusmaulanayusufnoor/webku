-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 20 Jan 2022 pada 09.26
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bprku`
--

--
-- Dumping data untuk tabel `kode_kantor_sliks`
--

INSERT INTO `kode_kantor_sliks` (`id`, `kode_kantor`, `nama_kantor`, `created_at`, `updated_at`) VALUES
(1, '001', 'cab. kpo', NULL, NULL),
(2, '002', 'cab. cisalak', NULL, NULL),
(3, '003', 'cab. subang', NULL, NULL),
(4, '004', 'cab. purwadadi', NULL, NULL),
(5, '005', 'cab. pamanukan', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
