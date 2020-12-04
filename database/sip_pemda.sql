-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2020 at 06:54 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
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
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `id_wali` int(11) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `id_wali`, `id_jenis_kelamin`, `nama_anak`, `umur`) VALUES
(2, 3, 1, 'anak', 11),
(3, 3, 2, 'anak ke 2', 8);

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `aturan` varchar(255) NOT NULL,
  `id_kategori_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `aturan`, `id_kategori_penyakit`) VALUES
(1, 'Aturan Infeksi Saluran Pernapasan Atas', 3),
(2, 'Aturan Batuk Rejan (Pertusis)', 3),
(3, 'Aturan Iritasi Tenggorokan (Faringitis)', 4),
(4, 'Aturan Cacar Air', 5),
(5, 'Aturan Diare ', 2),
(6, 'Aturan Sembelit ', 2),
(7, 'Aturan intoleransi Laktosa', 2),
(8, 'Aturan Radang Paru-Paru (Pneumonia)', 6),
(9, 'Aturan Tuberkulosis (TBC)', 6),
(10, 'Aturan Impetigo', 5),
(11, 'Aturan Asma', 6);

-- --------------------------------------------------------

--
-- Table structure for table `aturan_gejala`
--

CREATE TABLE `aturan_gejala` (
  `id_aturan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan_gejala`
--

INSERT INTO `aturan_gejala` (`id_aturan`, `id_gejala`) VALUES
(1, 10),
(1, 5),
(1, 6),
(1, 26),
(1, 9),
(1, 7),
(1, 4),
(2, 52),
(2, 1),
(2, 42),
(2, 25),
(2, 7),
(3, 5),
(3, 1),
(3, 44),
(3, 51),
(3, 46),
(3, 26),
(3, 28),
(3, 32),
(4, 5),
(4, 44),
(4, 53),
(4, 47),
(5, 2),
(5, 3),
(5, 54),
(5, 11),
(5, 5),
(5, 46),
(6, 29),
(6, 18),
(6, 19),
(6, 30),
(7, 35),
(7, 17),
(7, 45),
(7, 28),
(7, 48),
(8, 56),
(8, 57),
(8, 55),
(8, 5),
(8, 21),
(8, 58),
(8, 44),
(8, 4),
(11, 60),
(11, 31),
(11, 59),
(11, 49),
(9, 14),
(9, 38),
(9, 61),
(9, 1),
(9, 23),
(10, 37),
(10, 62),
(10, 63),
(10, 64),
(10, 65),
(10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `id_anak`, `diagnosa`, `tanggal`) VALUES
(1, 3, '5', '2020-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa_gejala`
--

CREATE TABLE `diagnosa_gejala` (
  `id_diagnosa` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa_gejala`
--

INSERT INTO `diagnosa_gejala` (`id_diagnosa`, `id_gejala`) VALUES
(1, 2),
(1, 3),
(1, 11),
(1, 52),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(10) NOT NULL,
  `gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
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
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_penyakit`
--

CREATE TABLE `kategori_penyakit` (
  `id_kategori_penyakit` int(11) NOT NULL,
  `kategori_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_penyakit`
--

INSERT INTO `kategori_penyakit` (`id_kategori_penyakit`, `kategori_penyakit`) VALUES
(2, 'Pencernaan'),
(3, 'Hidung'),
(4, 'Tenggorokan'),
(5, 'Kulit'),
(6, 'Paru-paru');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `obat`) VALUES
(1, '../medicines/medicine_infeksi_saluran_pernapasan_atas1604502975.html'),
(2, '../medicines/medicine_pertusis1605925029.html'),
(3, '../medicines/medicine_faringitis1605925107.html'),
(4, '../medicines/medicine_cacar_air1605925212.html'),
(5, '../medicines/medicine_diare_1605925815.html'),
(6, '../medicines/medicine_sembelit_1605925938.html'),
(7, '../medicines/medicine_intoleransi_laktosa1605926080.html'),
(8, '../medicines/medicine_1.radang_paru_paru_(pneumonia)1605926348.html'),
(9, '../medicines/medicine_tuberkulosis_(tbc)1605926556.html'),
(10, '../medicines/medicine_impetigo1606053987.html'),
(11, '../medicines/medicine_asma1606054482.html');

-- --------------------------------------------------------

--
-- Table structure for table `obat_penyakit`
--

CREATE TABLE `obat_penyakit` (
  `id_obat` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_penyakit`
--

INSERT INTO `obat_penyakit` (`id_obat`, `id_penyakit`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `id_penanganan` int(11) NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`id_penanganan`, `penanganan`) VALUES
(1, '../handlings/handling_infeksi_saluran_pernapasan_atas1604502975.html'),
(2, '../handlings/handling_pertusis1605925029.html'),
(3, '../handlings/handling_faringitis1605925107.html'),
(4, '../handlings/handling_cacar_air1605925212.html'),
(5, '../handlings/handling_diare_1605925815.html'),
(6, '../handlings/handling_sembelit_1605925938.html'),
(7, '../handlings/handling_intoleransi_laktosa1605926080.html'),
(8, '../handlings/handling_1.radang_paru_paru_(pneumonia)1605926348.html'),
(9, '../handlings/handling_tuberkulosis_(tbc)1605926556.html'),
(10, '../handlings/handling_impetigo1606053987.html'),
(11, '../handlings/handling_asma1606054482.html');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan_penyakit`
--

CREATE TABLE `penanganan_penyakit` (
  `id_penanganan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanganan_penyakit`
--

INSERT INTO `penanganan_penyakit` (`id_penanganan`, `id_penyakit`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(10) NOT NULL,
  `id_kategori_penyakit` int(11) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `penjelasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `id_kategori_penyakit`, `penyakit`, `penjelasan`) VALUES
(1, 3, 'Infeksi Saluran Pernapasan Atas', 'Infeksi Saluran Pernapasan Atas (ISPA) adalah infeksi saluran pernapasan yang terjadi tidak lebih dari 14 hari, mulai dari hidung hingga paru-paru.'),
(2, 3, 'Batuk Rejan (Pertusis)', 'Pertusis adalah infekssi akibat bakteri gram negatif bordetella pertusis pada saluran nafas sehingga menimbulkan batuk yang khas. Penularan penyakit ini melalui droplet pasien pertusis atau individu yang belum di imunisasi/ imunisasi tidak kuat.'),
(3, 4, 'Iritasi Tenggorokan (Faringitis)', 'Peradangan membran mutosa faring dan strukur lain di sekitarnya.'),
(4, 5, 'Cacar Air', 'Varicella (disebut juga cacar air) adalah peyakit sangat menular yang disebabkan oleeh virus. Virus yang menyebabkan penyakit ini adalah virus varicella looster. Cara penularan dapat melalui percikan ludah atau udra, juga dapat menyebar meelalu kontak langsung atau tidak langsung dengan nanah dari gelemung dan selaput lendir orang yang terkena cacar air atau herpes zooster (penyakit kulit herpes).'),
(5, 2, 'Diare ', 'Diare adalah suu kondisi diana seseorang buang air bear denga konsistensi lemebk (cair, bahkan dapat berupa air dan frekuensi yang lebih sering (â‰¥3x / dalam 1 hari). Penyebabnya dapat infeksi (virus,bakteri, parasit malabsorbsi, alergi,keracunan, imunodefisiensi dll) yang sering ditemukan  adalah karena infeksi dan kerracunan. Diare < 14 hari termasuk kategori akut. Diare persistan (kronik ) > 14 hari.'),
(6, 2, 'Sembelit ', 'Sembelit adalah buang  air besar yan tidak memuaskan yag ditandai oleh BAB kurang dari 3 kali dalam 1 minggu atau kesulitan dalam pengeluaran fases akibat fases yang keras'),
(7, 2, 'intoleransi Laktosa', 'Masalah pencernaan yang sering terjadi dimana ubuh tidak dapat menerima laktosa, sejenis gula yang sering ditemukan pada susu tipe intoleransi laktosa:\r\n1. Intoleransi laktosa primer\r\n2. Intoleransi laktosa sekunder\r\n3. Intoleransi laktosa kongenital'),
(8, 6, 'Radang Paru-Paru (Pneumonia)', 'Pneumonia adalah infeksi akut parenkim paru yang meliputi aveolus dan jarinngan intertitial. Pneumonia di definisikan berdasrakan gejala dan tanda klinis, serta perjalanan penyakitnya.WHO mendefinisikan pneumonia hanya berdasarkan pneumonia klinis yang didapat pada pemeriksaan inspeksi dan frekuensi pernapasan. Insidens pneumonia pada anak < 5 tahun  di negara maju adalah 2-4 kasus/100 anak/tahun , sedangkan dinegara berkembang 10-20 kasu /100 anak/tahun. Pneumonia meyebabkan lebih dari 5 juta kematian pertahun pada anak balita dinegara berkembang. Klasifikasi pneumonia (WHO):\r\n1.Bayi kurang dari 2 bulan\r\n1) Pneumonia berat : napas cepat atau frekuensi yang berat\r\n2) Pnneumonia sangat berat : tidak mau menetek/minum,kejang,letargi,demam,hipetermia,bradipnea\r\n2.Anak umu 2 bulan- 5 tahun :\r\n1) Pneumonia ringan : napas cepat\r\n2) Pneumonia berat :retraksi\r\n3) Pneumonia sangat berat : tidak dapat minum atau makan, kejang, latergi,malnutrisi'),
(9, 6, 'Tuberkulosis (TBC)', 'Tuberkulosis adalah suatu pennyakit infeksi yang disebabkan bakteri berbentuk batang yang dikenal dengan nama Myobacterium Tuberculosis. Penularan penyakit ini melalui perantara ludah atau dahak (droplet) dari penderita TB kepada individu yang rentan (daya tahan tubuh rendah). Pada umumnya TB menyerang jaringan paru, tetapi dapat juga menyerang jaringan yang lain.'),
(10, 5, 'Impetigo', 'Impetigo adalah salah satu contoh pioderma yang menyerang lapisan epidermis kulit. Impetigo terbagi menjadi impetigo bulosa dan impeigo krutosa'),
(11, 6, 'Asma', 'Asma adalah inflamasi kronis saluran nafas yang menyebabkan obstruksi dan hiperaktivitas saluran nafas dengan derajat berfariasi.');

-- --------------------------------------------------------

--
-- Table structure for table `penyebab`
--

CREATE TABLE `penyebab` (
  `id_penyebab` int(11) NOT NULL,
  `penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyebab`
--

INSERT INTO `penyebab` (`id_penyebab`, `penyebab`) VALUES
(1, '../causes/cause_infeksi_saluran_pernapasan_atas1604502975.html'),
(2, '../causes/cause_pertusis1605925029.html'),
(3, '../causes/cause_faringitis1605925107.html'),
(4, '../causes/cause_cacar_air1605925212.html'),
(5, '../causes/cause_diare_1605925815.html'),
(6, '../causes/cause_sembelit_1605925938.html'),
(7, '../causes/cause_intoleransi_laktosa1605926080.html'),
(8, '../causes/cause_1.radang_paru_paru_(pneumonia)1605926348.html'),
(9, '../causes/cause_tuberkulosis_(tbc)1605926556.html'),
(10, '../causes/cause_impetigo1606053987.html'),
(11, '../causes/cause_asma1606054482.html');

-- --------------------------------------------------------

--
-- Table structure for table `penyebab_penyakit`
--

CREATE TABLE `penyebab_penyakit` (
  `id_penyebab` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyebab_penyakit`
--

INSERT INTO `penyebab_penyakit` (`id_penyebab`, `id_penyakit`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`id_wali`, `username`, `password`, `alamat`, `nama_wali`, `no_hp`, `role`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '-', 'Administrator', '081234567890', 'admin'),
(3, 'wali', '202cb962ac59075b964b07152d234b70', 'alamat', 'wali', '081234567891', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  ADD PRIMARY KEY (`id_kategori_penyakit`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id_penanganan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `penyebab`
--
ALTER TABLE `penyebab`
  ADD PRIMARY KEY (`id_penyebab`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  MODIFY `id_kategori_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id_penanganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `penyebab`
--
ALTER TABLE `penyebab`
  MODIFY `id_penyebab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
