-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 10.14
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
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `ringkasan` text NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `view` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `konten`, `ringkasan`, `gambar`, `tanggal`, `view`, `id_user`) VALUES
(6, 'Test', '<p>lorem ipsum</p>', 'ini cuma coba aja', '1718352838_c74f50259b32f865123e.png', '2024-06-14', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'Renal', '$2a$12$PlnLT8eiHZMGuobd0bGW7Oi9vmeZM.qwfaz/PNYcihCvY.ayRawKO', 'Renaldi Muhammad Fauzi', 'tes@gmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bayu', '$2y$10$7PmRCatf60xCv5Q3d/TTPeYw6ORy9d5K/IMOaTEnAS5EXAHz5daAK', 'Bayu Sebastian', 'sebastianbayu01@gmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Friska', '$2y$10$rtr.2Y./1SIjcSdJ1MDYlu/t8rMmKPHwZ3K7QS6rHfjGSgp/8aCOS', 'Friska Sasti', 'friskasasti28@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Syifa', '$2y$10$0lqogzWZW6JDe8AqtZZvOO9evVyLEF0YPRylRQ9kNujzlOqpKC7j6', 'Siti Nursyifa', 'nursyifa1234@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Meli', '$2y$10$buwoYyOdBcsrQXDQ6t2F6O0gctQzqEv.2luNYtFwiuoHBOGPRnw0.', 'Meli Anggraeni', 'meli@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Iqbal', '$2y$10$pmucxtS8nVRnEvGMaUvlT.Ikrc3BK4VE5aEJuZVPj.QOLltL4iRvu', 'Muhammad Iqbal Saputra', 'iqbal@gmail.com', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
