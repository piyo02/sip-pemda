-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 05 Nov 2020 pada 04.04
-- Versi Server: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_pemda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diseases`
--

CREATE TABLE `diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `handling` text NOT NULL,
  `cause` text NOT NULL,
  `medicine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `description`, `handling`, `cause`, `medicine`) VALUES
(1, 'Infeksi Saluran Pernapasan Atas', 'Infeksi Saluran Pernapasan Atas (ISPA) adalah infeksi saluran pernapasan yang terjadi tidak lebih dari 14 hari, mulai dari hidung hingga paru-paru.', '../handlings/handling_infeksi_saluran_pernapasan_atas1604502975.html', '../causes/cause_infeksi_saluran_pernapasan_atas1604502975.html', '../medicines/medicine_infeksi_saluran_pernapasan_atas1604502975.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`) VALUES
(1, 'anoreksia (nafsu makan tidak ada)'),
(2, 'BAB cair/lembek'),
(3, 'BAB cair/lembek disertai ampas atau darah'),
(4, 'Sesak'),
(5, 'Demam'),
(6, 'Tenggorokan Hiperemesis'),
(7, 'Pilek'),
(8, 'Sakit Kepala'),
(9, 'Nyeri Otot'),
(10, 'Batuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `symp_of_disease`
--

CREATE TABLE `symp_of_disease` (
  `id` int(10) UNSIGNED NOT NULL,
  `disease_id` int(10) UNSIGNED NOT NULL,
  `symptom_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `symp_of_disease`
--

INSERT INTO `symp_of_disease` (`id`, `disease_id`, `symptom_id`) VALUES
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `child_name`, `age`, `phone_number`, `address`, `role`) VALUES
(1, 'Administrator', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '-', 0, '081234567890', 'address', 'admin'),
(2, 'test1', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'anak test', 7, '081234567890', 'test alamat', 'user'),
(3, 'test2', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'anak test2', 7, '081234567890', 'test alamat', 'user'),
(4, 'test3', 'test3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'anak test3', 7, '081234567890', 'test3 alamat', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symp_of_disease`
--
ALTER TABLE `symp_of_disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `symp_of_disease`
--
ALTER TABLE `symp_of_disease`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
