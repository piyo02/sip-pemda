-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 23 Nov 2020 pada 18.36
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
(1, 'Nafsu Makan Tidak Ada (Anoreksia)'),
(2, 'BAB cair/lembek'),
(3, 'BAB cair/lembek disertai ampas atau darah'),
(4, 'sesak napas'),
(5, 'Demam'),
(6, 'Tenggorokan Hiperemesis'),
(7, 'Pilek'),
(9, 'Nyeri Otot'),
(10, 'Batuk'),
(11, 'Banyak Minum'),
(12, 'Batuk di akhiri bunyi whoop (Batuk Rejan)'),
(13, 'batuk kering kemudian berdahak'),
(14, 'berat badan turun tanpa sebab'),
(15, 'Terdapat bula'),
(16, 'demam tidak terlalu tinggi'),
(17, 'diare'),
(18, 'feses keras'),
(19, 'frekuensi BAB < 3 kali'),
(20, 'gatal pada kulit'),
(21, 'kesulitan makan/minum'),
(22, 'lama terjadi diare'),
(23, 'lesu / malas'),
(25, 'muka merah'),
(26, 'nyeri kepala'),
(28, 'nyeri perut'),
(29, 'perasaan tidak puas saat BAB'),
(30, 'susah BAB'),
(31, 'batuk berulang pada malam hari'),
(32, 'Nyeri Tenggorokan'),
(33, 'batuk lama (> 2 minggu)'),
(34, 'batuk setelah beraktivitas'),
(35, 'buang angin berlebihan'),
(37, 'Benjolan berisi Cairan pada kulit'),
(38, 'demam lama tanpa sebab jelas, disertai keringat malam'),
(39, 'diare akut yang tidak sembuh dengan pengobatan diare'),
(40, 'eritema'),
(41, 'eritema dan vesikel cepat pecah menjadi krusta tebal berwarna kuning tebal'),
(42, 'gelisah'),
(44, 'lemah badan'),
(45, 'mual kadang muntah'),
(46, 'muntah'),
(47, 'nyeri kepala ringan'),
(48, 'perut kembung'),
(49, 'riwayat asma pada keluarga');

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
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 2, 1),
(11, 2, 7),
(12, 2, 12),
(13, 2, 25),
(14, 3, 1),
(15, 3, 5),
(16, 3, 24),
(17, 3, 26),
(18, 3, 28),
(19, 3, 32),
(20, 4, 16),
(21, 4, 20),
(22, 4, 26),
(23, 5, 3),
(24, 5, 5),
(25, 5, 11),
(26, 6, 18),
(27, 6, 19),
(28, 6, 29),
(29, 6, 30),
(30, 7, 17),
(31, 7, 24),
(32, 7, 28),
(33, 8, 4),
(34, 8, 5),
(35, 8, 13),
(36, 8, 21),
(37, 9, 5),
(38, 9, 10),
(39, 9, 14),
(40, 9, 17),
(41, 10, 37),
(42, 10, 40),
(43, 10, 41),
(44, 10, 15),
(45, 11, 31),
(46, 11, 34),
(47, 11, 49);

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
(2, 'Pertusis', 'Pertusis adalah infekssi akibat bakteri gram negatif bordetella pertusis pada saluran nafas sehingga menimbulkan batuk yang khas. Penularan penyakit ini melalui droplet pasien pertusis atau individu yang belum di imunisasi/ imunisasi tidak kuat.', '../handlings/handling_pertusis1605925029.html', '../causes/cause_pertusis1605925029.html', '../medicines/medicine_pertusis1605925029.html'),
(3, 'Faringitis', 'Peradangan membran mutosa faring dan strukur lain di sekitarnya.', '../handlings/handling_faringitis1605925107.html', '../causes/cause_faringitis1605925107.html', '../medicines/medicine_faringitis1605925107.html'),
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
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
