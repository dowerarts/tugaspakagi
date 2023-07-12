-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2023 pada 12.42
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_web2`
--

CREATE TABLE `db_web2` (
  `id` int(11) NOT NULL,
  `npm` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `notelp` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `namabarang` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `totalharga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `db_web2`
--

INSERT INTO `db_web2` (`id`, `npm`, `nama`, `alamat`, `notelp`, `namabarang`, `quantity`, `harga`, `totalharga`) VALUES
(24, 'asd', 'asdsa', 'ad', 'sd', 'dasada', 0, 0, 0),
(22, 'asd', 'apri', 'sadasdasd', '081280608095', 'asdasd', 0, 0, 10),
(23, 'udin', '020204012', 'jakarta', 'jakarta', 'jakarta', 0, 0, 0),
(25, 'asd', 'sa', 'das', 'da', 'da', 0, 0, 0),
(26, 'asd', 'sad', 'aasd', 'saasd', '123', 123, 41212, 5069076);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_web2`
--
ALTER TABLE `db_web2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_web2`
--
ALTER TABLE `db_web2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
