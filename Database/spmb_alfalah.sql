-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2025 at 02:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spmb_alfalah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Admin', 'Akrom', 'akrommuhammadyusuf@gmail.com', 'Femboy'),
(2, 'Admin', 'Syia', 'syia@gmail.com', '123321'),
(3, 'Iuno', 'Admin', 'iuno@gmail.com', 'kusuka2');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int NOT NULL,
  `id_pendaftaran` int NOT NULL,
  `jurusan1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan2` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_pendaftaran`, `jurusan1`, `jurusan2`) VALUES
(1, 1, 'Otomotif', 'RPL'),
(2, 2, 'RPL', 'Listrik'),
(3, 3, 'RPL', 'Otomotif'),
(4, 4, 'Otomotif', 'Mesin'),
(7, 7, 'RPL', 'Listrik'),
(9, 9, 'RPL', 'Mesin'),
(10, 10, 'RPL', 'Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pendaftaran` int DEFAULT NULL,
  `Tanggal_pembayaran` date NOT NULL,
  `jumlah_pembayaran` bigint NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bukti_pembayaran` text COLLATE utf8mb4_general_ci COMMENT 'Path foto bukti pembayaran (dipisah koma jika lebih dari 1)',
  `total_cicilan` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftaran`, `Tanggal_pembayaran`, `jumlah_pembayaran`, `status_pembayaran`, `bukti_pembayaran`, `total_cicilan`) VALUES
(1, 1, '2025-11-16', 3350000, 'Lunas', '../admin/uploads/bukti_pembayaran/bukti_1_1763300275.png', 2),
(2, 2, '2025-11-17', 3350000, 'Lunas', '../admin/uploads/bukti_pembayaran/bukti_2_1763370874.png', 2),
(3, 3, '2025-11-16', 3350000, 'Lunas', '../admin/uploads/bukti_pembayaran/bukti_3_1763302586.png', 1),
(4, 4, '2025-11-16', 2000000, 'Belum Lunas', '../admin/uploads/bukti_pembayaran/bukti_4_1763303152.png', 1),
(5, 9, '2025-11-19', 1550000, 'Belum Lunas', '../admin/uploads/bukti_pembayaran/bukti_9_1763560687.jpg', 1),
(6, 10, '2025-11-23', 1000000, 'Belum Lunas', '../admin/uploads/bukti_pembayaran/bukti_10_1763924256.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `anak_ke` int NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `kelurahan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pos` int NOT NULL,
  `rt` int NOT NULL,
  `rw` int NOT NULL,
  `nisn` bigint NOT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `citacita` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran_baju` enum('S','M','L','XL','XXL','XXXL') COLLATE utf8mb4_general_ci NOT NULL,
  `no_kk` bigint NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `ktp_ayah` bigint NOT NULL,
  `telepon_ayah` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `ktp_ibu` bigint NOT NULL,
  `telepon_ibu` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `tgl_daftar`, `nama`, `tempat_lahir`, `tanggal_lahir`, `anak_ke`, `jenis_kelamin`, `alamat`, `kelurahan`, `kecamatan`, `telepon`, `asal_sekolah`, `kode_pos`, `rt`, `rw`, `nisn`, `hobby`, `citacita`, `ukuran_baju`, `no_kk`, `nama_ayah`, `pekerjaan_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `ktp_ayah`, `telepon_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `ktp_ibu`, `telepon_ibu`) VALUES
(1, '2025-08-15', 'Muhammad Yusuf Akram', 'Bandung Cisitu lama', '2008-08-12', 1, 'Laki-laki', 'bandung, Coblong, dago pojok jln.bunisari', 'Dago', 'Coblong', '+62 821-2054-7015', 'SMPN 35', 40543, 6, 7, 1356794346, 'Sepedaan, Masak ,Lari, Gaming, Alam', 'Enginner', 'M', 3242324234523525, 'Abi', 'Dosen', 'Malang, Dampit', '1981-12-20', 2112776576868345, '+62 895-3105-0229', 'Umi', 'Ibu Rumah Tangga', 'Surabaya Siduarjo', '1981-01-29', 327348726478234, '+62 852-2235-7550'),
(2, '2025-08-16', 'Muhammad Rival Rhamdani', 'Gerlong', '2007-10-03', 2, 'Laki-laki', 'Jl. Gegerkalong Tengah No. 56', 'Gegerkalong', 'Sukasari', '+62 819-2889-6590', 'SMPN 12 Bandung', 40123, 3, 4, 243445354654, 'Sepeda, Parkour', 'Atlet sepeda', 'L', 3859361730496275, 'Bapak', 'Buruh', 'Bandung', '1974-03-31', 45543543565654, '0821332132', 'Mamah', 'Ibu Rumah Tangga', 'Bandung', '1976-04-02', 4387947945435, '0852-4356-7550'),
(3, '2025-09-12', 'Rizki Ramdhani', 'Cilacap', '2008-09-29', 1, 'Laki-laki', 'JL cijotang indah', 'Cimeyan', 'Cibeuying', '+62 895-0772-0402', 'SMPN Cimeyan 3', 40191, 4, 8, 1658307723, 'Gaming, Editing', 'Web development', 'M', 75830184756380194, 'Ayah', 'Kerja', 'Jawa', '1990-02-12', 3456723456853408, '+62 231-4754-9382', 'Ibu', 'Kerja', 'Jawa', '1980-06-07', 9356983456833408, '+62 276-5432-2456'),
(4, '2025-10-16', 'Iuno', 'Shibuya', '2008-08-12', 1, 'Perempuan', 'Higashishishiokoji kamadonocho,shimogyo ward,kyoto\r\n', 'Dago', 'Coblong', '+81 90-1234-5678', 'SMPN 35', 40321, 7, 6, 48662760572, 'Panahan, Olahraga, Sepeda', 'jadi istri yg baik', 'S', 0, 'N/A', '', 'N/A', '1000-01-01', 0, '', '', '', 'N/A', '1000-01-01', 0, ''),
(7, '2025-10-17', 'Regat Rakan Ahmad', 'Bandung', '2008-08-17', 1, 'Laki-laki', 'Jl. Bukit Jarian', 'Hegarmanah', 'Cidadap', '089558775318', 'SMPN 12 Bandung', 4021, 5, 4, 33657389012, 'Edit Video', 'Youtuber', 'XL', 2039761539405612, 'Ayah', 'Polisi', 'Bandung', '1982-05-02', 2465738291027563, '+62 643-3844-3286', 'Ibu', 'Ibu Rumah Tangga', 'Bandung', '1982-12-02', 3265938291027587, '0852-3241-2155'),
(9, '2025-10-16', 'Muhammad Sandi ', 'bandung', '2008-02-02', 3, 'Laki-laki', 'jalan.cigadung raya barat gg.hambali no.86', 'cigadung', 'cibeunying kaler', '0892-323-215', 'SMPN 19 BANDUNG', 40321, 1, 8, 283192373271, 'Main Game, masak, nonton anime ', 'food vlogger', 'XL', 2393746501765398, 'Ayah', 'nuruh harian lepas', 'Bandung', '1961-12-01', 247683927562497, '082321213', 'Ibu ', 'Ibu Rumah Tangga', 'Bandung', '1971-03-10', 468425753590421, '+62 093-3217-2345'),
(10, '2025-11-23', 'Dimas', 'Bandung', '2009-03-12', 1, 'Laki-laki', 'sekepicung ', 'ciburial', 'cibeunying', '0889-7116-1155', 'MTS ALBURHAN', 40624, 1, 5, 7588997624, 'Nonton anime ', 'developer game', 'M', 7462904715305074, 'Ayah', 'Kerja', 'Bandung', '1988-02-12', 856143969473493, '+62 231-4354-2384', 'Ibu', 'art', 'Bandung', '1988-02-21', 3758102847574, '03248989432');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pembayaran`
--

CREATE TABLE `riwayat_pembayaran` (
  `id_riwayat` int NOT NULL,
  `id_pembayaran` int NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` decimal(15,2) NOT NULL,
  `bukti_bayar` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Path file gambar bukti pembayaran',
  `catatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pembayaran`
--

INSERT INTO `riwayat_pembayaran` (`id_riwayat`, `id_pembayaran`, `tanggal_bayar`, `jumlah_bayar`, `bukti_bayar`, `catatan`, `created_at`) VALUES
(1, 1, '2025-11-16', 2000000.00, '../admin/uploads/bukti_pembayaran/bukti_1_1763300180.png', 'Pembayaran Pertama', '2025-11-16 13:36:20'),
(2, 1, '2025-11-16', 1350000.00, '../admin/uploads/bukti_pembayaran/bukti_1_1763300275.png', 'Cicilan ke-2 (Total: Rp 3.350.000)', '2025-11-16 13:37:55'),
(3, 2, '2025-11-16', 1500000.00, '../admin/uploads/bukti_pembayaran/bukti_2_1763302046.png', 'Pembayaran Pertama', '2025-11-16 14:07:26'),
(4, 3, '2025-11-16', 3350000.00, '../admin/uploads/bukti_pembayaran/bukti_3_1763302586.png', 'Pembayaran Lunas', '2025-11-16 14:16:26'),
(5, 4, '2025-11-16', 2000000.00, '../admin/uploads/bukti_pembayaran/bukti_4_1763303152.png', 'Pembayaran Pertama', '2025-11-16 14:25:52'),
(6, 2, '2025-11-17', 1850000.00, '../admin/uploads/bukti_pembayaran/bukti_2_1763370874.png', 'Cicilan ke-2 (Total: Rp 3.350.000)', '2025-11-17 09:14:34'),
(7, 5, '2025-11-19', 1550000.00, '../admin/uploads/bukti_pembayaran/bukti_9_1763560687.jpg', 'Pembayaran Pertama', '2025-11-19 13:58:07'),
(8, 6, '2025-11-23', 1000000.00, '../admin/uploads/bukti_pembayaran/bukti_10_1763924256.jpg', 'Pembayaran Pertama', '2025-11-23 18:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gmail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `gmail`, `password`) VALUES
(1, 'Akrom', 'akrommuhammadyusuf@gmail.com', '$2y$10$Yxw1Ss/h2XnujDDfGi//WuKL8Zn2LrQ.oy.zQ5dZHMMizPfXwkMY.'),
(2, 'Rival', 'Rival@gmail.com', '321321'),
(3, 'Rizki R', 'Rizki@gmail.com', '876876'),
(4, 'Iuno', 'Iuno@gmail.com', '090909'),
(5, 'Sudo Apt', 'sudo@example.com', '098098'),
(7, 'Regat', 'Regat@gmail.com', '231433'),
(9, 'Sandi', 'Sandi@gmail.com', '1234'),
(11, 'Dimas', 'Dimas@gmail.com', 'makan12'),
(12, 'aku', 'aku@gmail.com', '$2y$10$o1QK6ldjfHFY5xPmITAcFezoovGQtZ21CSva88rZA3YJoAAjGG1n6');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int NOT NULL,
  `id_pendaftaran` int NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir_wali` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir_wali` date NOT NULL,
  `ktp_wali` bigint DEFAULT NULL,
  `no_tlp_wali` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`id_wali`, `id_pendaftaran`, `nama_wali`, `tempat_lahir_wali`, `tanggal_lahir_wali`, `ktp_wali`, `no_tlp_wali`, `pekerjaan_wali`) VALUES
(1, 4, 'Akira ', 'Jepang, Tokyo', '1990-03-23', 9502513638694026, '+62 034902349', 'CEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `fk_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `fk_wali_pendaftaran` (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `fk_pendaftaran` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_id_pendaftaran` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  ADD CONSTRAINT `riwayat_pembayaran_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE;

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `fk_wali_pendaftaran` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
