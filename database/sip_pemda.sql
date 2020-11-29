-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28 Nov 2020 pada 01.38
-- Versi Server: 5.7.32-0ubuntu0.18.04.1
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
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `nama`) VALUES
(1, 'Gangguan Makan (Anoreksia)'),
(2, 'BAB cair/lembek'),
(3, 'BAB disertai ampas/lendir'),
(4, 'sesak napas'),
(5, 'Demam'),
(6, 'Iritasi Tenggorokan (Hiperemesis)'),
(7, 'Pilek'),
(9, 'Nyeri Otot'),
(10, 'Batuk'),
(11, 'Banyak Minum (Dehidrasi)'),
(14, 'berat badan turun'),
(15, 'vasikel cepat pecah'),
(17, 'diare'),
(18, 'fases keras'),
(19, 'frekuensi BAB < 3 kali'),
(20, 'gatal'),
(21, 'kesulitan makan'),
(23, 'lesu'),
(25, 'muka merah'),
(26, 'nyeri kepala'),
(28, 'nyeri perut'),
(29, 'BAB tidak puas'),
(30, 'susah BAB'),
(31, 'batuk berulang berkarakteristik (mengi)'),
(32, 'Nyeri Tenggorokan'),
(35, 'buang angin berlebih'),
(37, 'Benjolan berisi Cairan berwarna kuning gelap seperti nanah pada kulit (bula hipopion)'),
(38, 'demam lama disertai keringat malam'),
(42, 'gelisah'),
(44, 'lemah badan'),
(45, 'mual kadang muntah'),
(46, 'muntah'),
(47, 'nyeri kepala ringan'),
(48, 'perut kembung'),
(49, 'terdapat riwayat asma'),
(51, 'mual'),
(52, 'Batuk Berkepanjangan'),
(53, 'muncul gelembung pada kulit'),
(54, 'BAB disertai darah'),
(55, 'batuk kering'),
(56, 'batuk berdahak'),
(57, 'batuk berdarah'),
(58, 'kesulitan minum'),
(59, 'batuk pada malam/dini hari'),
(60, 'batuk bersifat musiman'),
(61, 'diare persisten'),
(62, 'kemerahan pada kulit (eritema)'),
(63, 'krusta tebal berwarna kuning seperti madu'),
(64, 'lepuhan berisi cairan diameter â‰¥10 mm (bulla)'),
(65, 'tampak erosi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala_penyakit`
--

CREATE TABLE `gejala_penyakit` (
  `id` int(10) NOT NULL,
  `id_penyakit` int(10) NOT NULL,
  `id_gejala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala_penyakit`
--

INSERT INTO `gejala_penyakit` (`id`, `id_penyakit`, `id_gejala`) VALUES
(55, 1, 10),
(56, 1, 5),
(57, 1, 6),
(58, 1, 26),
(59, 1, 9),
(60, 1, 7),
(61, 1, 4),
(62, 2, 52),
(63, 2, 1),
(64, 2, 42),
(65, 2, 25),
(66, 2, 7),
(67, 3, 5),
(68, 3, 1),
(69, 3, 44),
(70, 3, 51),
(71, 3, 46),
(72, 3, 26),
(73, 3, 28),
(74, 3, 32),
(75, 4, 5),
(76, 4, 20),
(77, 4, 44),
(78, 4, 53),
(79, 4, 47),
(80, 5, 2),
(81, 5, 3),
(82, 5, 54),
(83, 5, 11),
(84, 5, 5),
(85, 5, 46),
(86, 6, 29),
(87, 6, 18),
(88, 6, 19),
(89, 6, 30),
(90, 7, 35),
(91, 7, 17),
(92, 7, 45),
(93, 7, 28),
(94, 7, 48),
(95, 8, 56),
(96, 8, 57),
(97, 8, 55),
(98, 8, 5),
(99, 8, 21),
(100, 8, 58),
(101, 8, 44),
(102, 8, 4),
(103, 11, 60),
(104, 11, 31),
(105, 11, 59),
(106, 11, 49),
(107, 9, 14),
(108, 9, 38),
(109, 9, 61),
(110, 9, 1),
(111, 9, 23),
(112, 10, 37),
(113, 10, 62),
(114, 10, 63),
(115, 10, 64),
(116, 10, 65),
(117, 10, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_penyakit`
--

CREATE TABLE `kategori_penyakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `penjelasan` text NOT NULL,
  `penanganan` text NOT NULL,
  `penyebab` text NOT NULL,
  `obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `penjelasan`, `penanganan`, `penyebab`, `obat`) VALUES
(1, 'Infeksi Saluran Pernapasan Atas', 'Infeksi Saluran Pernapasan Atas (ISPA) adalah infeksi saluran pernapasan yang terjadi tidak lebih dari 14 hari, mulai dari hidung hingga paru-paru.', '../handlings/handling_infeksi_saluran_pernapasan_atas1604502975.html', '../causes/cause_infeksi_saluran_pernapasan_atas1604502975.html', '../medicines/medicine_infeksi_saluran_pernapasan_atas1604502975.html'),
(2, 'Batuk Rejan (Pertusis)', 'Pertusis adalah infekssi akibat bakteri gram negatif bordetella pertusis pada saluran nafas sehingga menimbulkan batuk yang khas. Penularan penyakit ini melalui droplet pasien pertusis atau individu yang belum di imunisasi/ imunisasi tidak kuat.', '../handlings/handling_pertusis1605925029.html', '../causes/cause_pertusis1605925029.html', '../medicines/medicine_pertusis1605925029.html'),
(3, 'Iritasi Tenggorokan (Faringitis)', 'Peradangan membran mutosa faring dan strukur lain di sekitarnya.', '../handlings/handling_faringitis1605925107.html', '../causes/cause_faringitis1605925107.html', '../medicines/medicine_faringitis1605925107.html'),
(4, 'Cacar Air', 'Varicella (disebut juga cacar air) adalah peyakit sangat menular yang disebabkan oleeh virus. Virus yang menyebabkan penyakit ini adalah virus varicella looster. Cara penularan dapat melalui percikan ludah atau udra, juga dapat menyebar meelalu kontak langsung atau tidak langsung dengan nanah dari gelemung dan selaput lendir orang yang terkena cacar air atau herpes zooster (penyakit kulit herpes).', '../handlings/handling_cacar_air1605925212.html', '../causes/cause_cacar_air1605925212.html', '../medicines/medicine_cacar_air1605925212.html'),
(5, 'Diare ', 'Diare adalah suu kondisi diana seseorang buang air bear denga konsistensi lemebk (cair, bahkan dapat berupa air dan frekuensi yang lebih sering (â‰¥3x / dalam 1 hari). Penyebabnya dapat infeksi (virus,bakteri, parasit malabsorbsi, alergi,keracunan, imunodefisiensi dll) yang sering ditemukan  adalah karena infeksi dan kerracunan. Diare < 14 hari termasuk kategori akut. Diare persistan (kronik ) > 14 hari.', '../handlings/handling_diare_1605925815.html', '../causes/cause_diare_1605925815.html', '../medicines/medicine_diare_1605925815.html'),
(6, 'Sembelit ', 'Sembelit adalah buang  air besar yan tidak memuaskan yag ditandai oleh BAB kurang dari 3 kali dalam 1 minggu atau kesulitan dalam pengeluaran fases akibat fases yang keras', '../handlings/handling_sembelit_1605925938.html', '../causes/cause_sembelit_1605925938.html', '../medicines/medicine_sembelit_1605925938.html'),
(7, 'intoleransi Laktosa', 'Masalah pencernaan yang sering terjadi dimana ubuh tidak dapat menerima laktosa, sejenis gula yang sering ditemukan pada susu tipe intoleransi laktosa:\r\n1. Intoleransi laktosa primer\r\n2. Intoleransi laktosa sekunder\r\n3. Intoleransi laktosa kongenital', '../handlings/handling_intoleransi_laktosa1605926080.html', '../causes/cause_intoleransi_laktosa1605926080.html', '../medicines/medicine_intoleransi_laktosa1605926080.html'),
(8, 'Radang Paru-Paru (Pneumonia)', 'Pneumonia adalah infeksi akut parenkim paru yang meliputi aveolus dan jarinngan intertitial. Pneumonia di definisikan berdasrakan gejala dan tanda klinis, serta perjalanan penyakitnya.WHO mendefinisikan pneumonia hanya berdasarkan pneumonia klinis yang didapat pada pemeriksaan inspeksi dan frekuensi pernapasan. Insidens pneumonia pada anak < 5 tahun  di negara maju adalah 2-4 kasus/100 anak/tahun , sedangkan dinegara berkembang 10-20 kasu /100 anak/tahun. Pneumonia meyebabkan lebih dari 5 juta kematian pertahun pada anak balita dinegara berkembang. Klasifikasi pneumonia (WHO):\r\n1.Bayi kurang dari 2 bulan\r\n1) Pneumonia berat : napas cepat atau frekuensi yang berat\r\n2) Pnneumonia sangat berat : tidak mau menetek/minum,kejang,letargi,demam,hipetermia,bradipnea\r\n2.Anak umu 2 bulan- 5 tahun :\r\n1) Pneumonia ringan : napas cepat\r\n2) Pneumonia berat :retraksi\r\n3) Pneumonia sangat berat : tidak dapat minum atau makan, kejang, latergi,malnutrisi', '../handlings/handling_1.radang_paru_paru_(pneumonia)1605926348.html', '../causes/cause_1.radang_paru_paru_(pneumonia)1605926348.html', '../medicines/medicine_1.radang_paru_paru_(pneumonia)1605926348.html'),
(9, 'Tuberkulosis (TBC)', 'Tuberkulosis adalah suatu pennyakit infeksi yang disebabkan bakteri berbentuk batang yang dikenal dengan nama Myobacterium Tuberculosis. Penularan penyakit ini melalui perantara ludah atau dahak (droplet) dari penderita TB kepada individu yang rentan (daya tahan tubuh rendah). Pada umumnya TB menyerang jaringan paru, tetapi dapat juga menyerang jaringan yang lain.', '../handlings/handling_tuberkulosis_(tbc)1605926556.html', '../causes/cause_tuberkulosis_(tbc)1605926556.html', '../medicines/medicine_tuberkulosis_(tbc)1605926556.html'),
(10, 'Impetigo', 'Impetigo adalah salah satu contoh pioderma yang menyerang lapisan epidermis kulit. Impetigo terbagi menjadi impetigo bulosa dan impeigo krutosa', '../handlings/handling_impetigo1606053987.html', '../causes/cause_impetigo1606053987.html', '../medicines/medicine_impetigo1606053987.html'),
(11, 'Asma', 'Asma adalah inflamasi kronis saluran nafas yang menyebabkan obstruksi dan hiperaktivitas saluran nafas dengan derajat berfariasi.', '../handlings/handling_asma1606054482.html', '../causes/cause_asma1606054482.html', '../medicines/medicine_asma1606054482.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama_anak`, `umur`, `nomor_telepon`, `alamat`, `role`) VALUES
(1, 'Administrator', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '-', 0, '081234567890', 'address', 'admin'),
(7, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'anak test diedit', 8, '081234567891', 'test alamat', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
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
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
