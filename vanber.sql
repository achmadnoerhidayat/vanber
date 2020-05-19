-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2020 pada 18.57
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanber`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member'),
(3, 'master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'pangandaran', 'PANGANDARAN'),
(2, 'bandung', 'BANDUNG'),
(3, 'sukabumi', 'SUKABUMI'),
(4, 'ciamis', 'CIAMIS'),
(5, 'banjar', 'BANJAR'),
(6, 'tasikmalaya', 'TASIKMALAYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coment`
--

CREATE TABLE `coment` (
  `id` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `coment`
--

INSERT INTO `coment` (`id`, `id_content`, `name`, `email`, `description`) VALUES
(11, 9, 'umar', 'samino@test.com', 'test ajaja'),
(16, 5, 'adi yana', 'admin@test.test', 'test'),
(18, 5, 'umar', 'samino@test.com', 'bagus sekali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_avilable` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `id_category`, `slug`, `title`, `description`, `is_avilable`, `image`) VALUES
(4, 2, 'corona-di-bandung-mengalami-peningkatan', 'Corona di bandung mengalami peningkatan', '<p>kapasitas rumah sakit yang sudah tidak dapat di tampung lagi dan pemerintah tuntut agar dapat konsisten dalam menerapkan peraturan jangan simpang siur dalam peraturan</p>\r\n', 1, 'corona-di-bandung-mengalami-peningkatan-20200507181030.jpg'),
(5, 4, 'penjambretan-terhadap-ibu-di-ciamis', 'penjambretan terhadap ibu di ciamis', 'Penjambret yang terjadi pada ibu ubu di ciamis ini', 1, 'penjambretan-terhadap-ibu-di-ciamis-20200507193119.jpg'),
(9, 3, 'tahu-di-suka-bumi-go-internation', 'Tahu di suka bumi go internation', 'Tahu sukabumi mulai di lirik oleh bangsa luar dan sosok di belakang yang mensukseskan ya ialah bapak H.Achmad Noerhidayat beliau adalah pengusaha tahu sumedang dari tahun sekian dan mereka merintis tahu ya itu di sumedang', 1, 'tahu-di-suka-bumi-go-internation-20200511145803.png'),
(24, 1, 'imam-di-pangandaran-postif-corona', 'imam di pangandaran postif corona', '<p>di pangandaran postif coronaimam di pangandaran postif coronaimam di pangandaran postif coronaimam di pangandaran postif coronaimam di pangandaran postif corona/p>', 1, 'imam-di-pangandaran-postif-corona-20200518211832.jpg'),
(25, 2, 'banjir-di-bandung-kiara-condong-semakin-meluas', 'Banjir di Bandung kiara condong semakin meluas', '<p>Banjir di Bandung kiara condong semakin meluasBanjir&nbsp;<span style=\"font-size: 0.875rem;\">di Bandung kiara condong semakin meluasBanjir di Bandung kiara condong semakin meluasBanjir di Bandung kiara condong semakin meluasBanjir di Bandung kiara condong semakin meluasBanjir di Bandung kiara condong semakin meluas</span></p>', 1, 'Banjir-di-Bandung-kiara-condong-semakin-meluas-20200518212352.jpg'),
(26, 1, 'pembangkit-listrik', 'Pembangkit listrik', '<p>alat pembangkit listrik yang terbaru di indonesai</p>\r\n', 1, 'Pembangkit-listrik-20200518225023.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_akses`, `username`, `email`, `password`, `is_active`, `image`) VALUES
(1, 2, 'umar jamaludin', 'umarjamaludi@yahoo.com', '12345678', 0, 'asdf'),
(2, 1, 'admin', 'admin@test.test', '$2y$10$GH7Kl4uYIMeL0MaKjegNi.H0/r2YGHvR3TQJNNt27alasEulQ0GRW', 1, ''),
(3, 2, 'yana', 'adiyana@test.test', '$2y$10$qiWNTgpStZ6g93k9Z81Mred5UrDPqr5vEhewcymGJhAWGkTeODk.K', 1, ''),
(4, 2, 'samino', 'samino@test.com', '$2y$10$i3mY5NI4ILAHy9A5Fja2GeevQZwl2Wa510rXnzw3Y4oh7RXff3KVK', 1, '-200516191138.jpg'),
(5, 3, 'sidiqun', 'sidiq@test.test', '$2y$10$5BA7n/Htk7hwcoUPj2Q/Y.nice4KGjNdwvJYFz.4a8gR/0NTVjRkq', 1, ''),
(8, 2, 'riyan', 'riyan@test.test', '$2y$10$8DIfcgIrMY2iHxwrioOxz.RvtdXXsUSpX2LSJy2gXSiLmpNwJyvW.', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coment_ibfk_1` (`id_content`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_ibfk_1` (`id_category`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `coment`
--
ALTER TABLE `coment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
