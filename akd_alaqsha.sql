-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 05:32 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akd_alaqsha`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-Laki') NOT NULL,
  `agama` enum('Islam','Katolik','Kristen','Buddha','Hindu') NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_tlp`, `alamat`, `nip`) VALUES
(1, 'Maulani', 'Jakarta', '1961-09-01', 'Laki-Laki', 'Islam', '123456', 'Pondok Kelapa', '1111111'),
(2, 'Wafa Hasyim', 'Jakarta', '1990-09-01', 'Perempuan', 'Islam', '1234456', 'Matraman', '2121121'),
(3, 'Saiful Anwar', 'Jakarta', '1987-05-18', 'Laki-Laki', 'Islam', '6453423', 'Bekasi', '444455445');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mapel`
--

CREATE TABLE `jadwal_mapel` (
  `id_jadmapel` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_mapel`
--

INSERT INTO `jadwal_mapel` (`id_jadmapel`, `kelas_id`, `mapel_id`, `guru_id`, `jam`, `hari`) VALUES
(1, 1, 8, 1, '07:00-07:20', 'Senin'),
(2, 1, 7, 3, '07:20-08:00', 'Senin'),
(3, 2, 3, 2, '07:00-07:20', 'Selasa'),
(4, 2, 5, 3, '07:20-08:00', 'Selasa');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `tingkat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `tingkat`) VALUES
(1, 'VII-A ', 7),
(2, 'VIII-A', 8),
(4, 'XI-A', 9);

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` varchar(250) NOT NULL,
  `log_tipe` int(11) NOT NULL,
  `log_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id_log`, `log_time`, `user_id`, `log_tipe`, `log_desc`) VALUES
(1, '2020-09-01 23:44:31', 'Asa', 2, 'Menambahkan Data User'),
(2, '2020-09-01 23:48:47', 'asaaitika@gmail.com', 2, 'Menambahkan Data User'),
(3, '2020-09-02 04:17:51', 'asaaitika@gmail.com', 3, 'Mengubah Data Sub Menu'),
(4, '2020-09-02 04:18:01', 'asaaitika@gmail.com', 3, 'Mengubah Data Sub Menu'),
(5, '2020-09-02 04:18:08', 'asaaitika@gmail.com', 3, 'Mengubah Data Sub Menu'),
(6, '2020-09-02 10:11:17', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(7, '2020-09-02 10:12:36', 'asaaitika@gmail.com', 2, 'Menambahkan Data Kelas'),
(8, '2020-09-02 10:13:00', 'asaaitika@gmail.com', 3, 'Mengubah Data Kelas'),
(9, '2020-09-02 10:13:16', 'asaaitika@gmail.com', 4, 'Menghapus Data Kelas'),
(10, '2020-09-15 16:00:02', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(11, '2020-09-15 19:15:28', 'ardhon@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(12, '2020-09-15 19:16:05', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(13, '2020-09-15 19:16:42', 'asaaitika@gmail.com', 3, 'Mengubah Data User'),
(14, '2020-09-15 19:16:53', 'asaaitika@gmail.com', 3, 'Mengubah Data User'),
(15, '2020-09-15 19:17:13', 'asaaitika@gmail.com', 3, 'Mengubah Data User'),
(16, '2020-09-15 19:17:54', 'ardhon@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(17, '2020-09-15 19:18:26', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(18, '2020-09-16 07:55:43', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(19, '2020-09-16 07:55:58', 'asaaitika@gmail.com', 1, 'Keluar Dari Aplikasi'),
(20, '2020-09-16 07:58:42', 'ardhon@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(21, '2020-09-16 07:58:58', 'ardhon@gmail.com', 1, 'Keluar Dari Aplikasi'),
(22, '2020-09-16 07:59:03', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(23, '2020-09-16 08:01:11', 'asaaitika@gmail.com', 3, 'Mengubah Akses Level'),
(24, '2020-09-16 08:01:23', 'asaaitika@gmail.com', 3, 'Mengubah Akses Level'),
(25, '2020-09-18 15:42:12', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(26, '2020-09-18 16:42:13', 'asaaitika@gmail.com', 1, 'Keluar Dari Aplikasi'),
(27, '2020-09-18 16:42:26', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(28, '2020-09-18 16:57:47', 'asaaitika@gmail.com', 2, 'Menambahkan Data Mata Pelajaran'),
(29, '2020-09-18 16:58:02', 'asaaitika@gmail.com', 3, 'Mengubah Data Mata Pelajaran'),
(30, '2020-09-18 16:58:27', 'asaaitika@gmail.com', 3, 'Mengubah Data Tahun Akademik'),
(31, '2020-09-18 17:12:45', 'asaaitika@gmail.com', 3, 'Mengubah Data Tahun Akademik'),
(32, '2020-09-18 17:13:02', 'asaaitika@gmail.com', 3, 'Mengubah Data Tahun Akademik'),
(33, '2020-09-18 17:13:32', 'asaaitika@gmail.com', 3, 'Mengubah Data Tahun Akademik'),
(34, '2020-09-18 17:17:38', 'asaaitika@gmail.com', 3, 'Mengubah Data Kelas'),
(35, '2020-09-18 17:20:05', 'asaaitika@gmail.com', 3, 'Mengubah Data Kelas'),
(36, '2020-09-18 17:20:26', 'asaaitika@gmail.com', 3, 'Mengubah Data Mata Pelajaran'),
(37, '2020-09-18 18:20:49', 'asaaitika@gmail.com', 3, 'Mengubah Data User'),
(38, '2020-09-18 18:32:59', 'asaaitika@gmail.com', 2, 'Menambahkan Data User'),
(39, '2020-09-18 18:33:16', 'asaaitika@gmail.com', 4, 'Menghapus Data User'),
(40, '2020-09-18 18:33:36', 'asaaitika@gmail.com', 2, 'Menambahkan Data User'),
(41, '2020-09-18 18:33:51', 'asaaitika@gmail.com', 4, 'Menghapus Data User'),
(42, '2020-09-18 18:34:10', 'asaaitika@gmail.com', 2, 'Menambahkan Data User'),
(43, '2020-10-04 07:53:17', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(44, '2020-10-06 10:07:59', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(45, '2020-10-06 12:55:14', 'anakayam@gmail.com', 3, 'Mengubah Data Sub Menu'),
(46, '2020-10-12 15:43:47', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(47, '2020-10-13 21:33:26', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(48, '2020-10-13 21:37:26', 'asaaitika@gmail.com', 1, 'Keluar Dari Aplikasi'),
(49, '2020-10-13 21:38:39', 'ardhon@gmail.com', 0, 'Masuk Ke Dalam Aplikasi'),
(50, '2020-10-13 22:55:56', 'ardhon@gmail.com', 1, 'Keluar Dari Aplikasi'),
(51, '2020-10-13 23:01:15', 'asaaitika@gmail.com', 0, 'Masuk Ke Dalam Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `log_attempts`
--

CREATE TABLE `log_attempts` (
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `jam_pelajaran` int(5) NOT NULL,
  `kkm` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mata_pelajaran`, `jam_pelajaran`, `kkm`, `guru_id`) VALUES
(1, 'Fiqh', 6, 0, 0),
(2, 'IPA', 12, 0, 0),
(3, 'PKn', 6, 0, 0),
(4, 'IPS', 6, 0, 0),
(5, 'Bahasa Inggris', 4, 0, 0),
(6, 'PKn', 6, 65, 2),
(7, 'Bahasa Arab', 6, 62, 3),
(8, 'Al-Quran Hadist', 6, 61, 1),
(9, 'Matematika', 3, 56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_detail`
--

CREATE TABLE `nilai_detail` (
  `siswa_id` varchar(20) NOT NULL,
  `nilai_id` int(5) NOT NULL,
  `nil_uh` int(5) NOT NULL,
  `nil_uts` int(5) NOT NULL,
  `nil_uas` int(5) NOT NULL,
  `total_akhir` int(5) NOT NULL,
  `nil_rata` int(5) NOT NULL,
  `predikat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_header`
--

CREATE TABLE `nilai_header` (
  `id_nilai` int(11) NOT NULL,
  `mapel_id` int(5) NOT NULL,
  `tahun_pel_id` int(5) NOT NULL,
  `guru_id` int(5) NOT NULL,
  `kelas_id` int(5) NOT NULL,
  `smt` varchar(6) NOT NULL,
  `created_by` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `predikat_nil`
--

CREATE TABLE `predikat_nil` (
  `id_predikat` int(11) NOT NULL,
  `predikat` varchar(1) NOT NULL,
  `nil_awal` int(11) NOT NULL,
  `nil_akhir` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predikat_nil`
--

INSERT INTO `predikat_nil` (`id_predikat`, `predikat`, `nil_awal`, `nil_akhir`, `keterangan`) VALUES
(1, 'A', 87, 100, '87 < X < 100'),
(2, 'B', 75, 86, '75 < X < 86'),
(3, 'C', 63, 74, '63 < X < 74'),
(4, 'D', 0, 62, '0 < X < 62');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-Laki') NOT NULL,
  `agama` enum('Islam','Kristen','Prostestan','Budha','Hindu') NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_tlp`, `kelas_id`, `asal_sekolah`) VALUES
('160051', '160051554333', 'Aisyah Koirunnisa', 'Bangka Belitung', '2005-09-01', 'Perempuan', 'Islam', 'Pondok Kelapa', '123456', 2, 'Madrasah Pondok Kelapa'),
('160053', '160051121121', 'Mail Agung', 'Bangka Belintung', '2004-09-01', 'Laki-Laki', 'Islam', 'Tanjung Priuk', '323242342', 1, 'SD Negeri Tanjung Priuk'),
('190050', '19005012121', 'ARLIT', 'Banyu Wangi', '2006-09-29', 'Laki-Laki', 'Islam', 'Halim', '6453423', 1, 'SD Negeri Halim'),
('190051', '190051111221', 'AGUS ABIT\r\n', 'Jakarta', '2006-09-01', 'Laki-Laki', 'Islam', 'Rawamangun', '1234456', 1, 'SD Rawamangun 04');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_takad` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `is_active` int(1) NOT NULL,
  `mulai_takad` date NOT NULL,
  `akhir_takad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_takad`, `tahun_akademik`, `semester`, `is_active`, `mulai_takad`, `akhir_takad`) VALUES
(1, '2019/2020', 'Ganjil', 1, '2019-07-15', '0000-00-00'),
(2, '2019/2020', 'Genap', 1, '2020-01-01', '2020-07-22'),
(3, '2018/2019', 'Ganjil', 0, '2018-07-09', '2018-12-22'),
(4, '2018/2019', 'Genap', 0, '2019-01-01', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(126) NOT NULL,
  `email` varchar(126) NOT NULL,
  `image` varchar(126) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `level_id`, `is_active`, `date_created`) VALUES
(1, 'Permata Asa', 'asaaitika@gmail.com', 'conclustion1.png', '123456', 1, 1, 1593114876),
(4, 'Ardhon', 'ardhon@gmail.com', 'default.png', 'qwerty', 2, 1, 1593131831),
(12, 'Mutiara Rachma', 'shafiraarsya@gmail.com', 'default.png', 'aaaaaa', 2, 0, 1599003871),
(14, 'Masruhin', 'masruhin@gmail.com', 'default.png', '123333', 4, 0, 1599004127),
(17, 'Kina Asa', 'kinaasa21@gmail.com', 'logo_bw_copy3.png', 'zxccxz', 4, 1, 1600454050);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `level_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 9),
(4, 1, 6),
(6, 1, 7),
(7, 4, 8),
(8, 1, 8),
(9, 2, 7),
(10, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(11) NOT NULL,
  `level_name` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `level_name`) VALUES
(1, 'Tata Usaha'),
(2, 'Guru'),
(4, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(6, 'Master'),
(7, 'Penilaian'),
(8, 'Laporan'),
(9, 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(126) NOT NULL,
  `url` varchar(126) NOT NULL,
  `icon` varchar(126) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'User', 'fas fa-fw fa-user', 1),
(18, 1, 'Data Siswa', 'Admin/siswa', 'fas fa-fw fa-id-card', 0),
(19, 1, 'Data Guru', 'Admin/guru', 'fas fa-chalkboard-teacher', 1),
(20, 6, 'Data Mata Pelajaran', 'Master/mapel', 'fas fa-fw fa-clipboard-list', 1),
(21, 1, 'Jadwal Pelajaran', 'Admin/jadwalmapel', 'fas fa-fw fa-calendar', 1),
(22, 6, 'Data Tahun Akademik', 'Master/tahunakademik', 'fas fa-fw fa-list', 1),
(24, 9, 'Data Menu', 'Settings', 'fas fa-fw fa-folder', 1),
(25, 9, 'Data Sub Menu', 'Settings/submenu', 'fas fa-fw fa-folder-open', 1),
(26, 9, 'Data Level', 'Settings/level', 'fas fa-fw fa-level-up-alt', 1),
(27, 9, 'Data User', 'Settings/users', 'fas fa-fw fa-users', 1),
(31, 6, 'Data Kelas', 'Master/kelas', 'fas fa-fw fa-list-alt', 1),
(34, 6, 'Data Predikat Nilai', 'Master/predikatnilai', 'fas fa-fw fa-list', 1),
(35, 7, 'Penilaian', 'Penilaian', 'fas fa-fw fa-clipboard-list', 1),
(36, 8, 'Data Nilai Per-Siswa', 'Laporan/nilaisiswa', 'fas fa-fw fa-user', 1),
(37, 8, 'Data Nilai Per-Mata Pelajaran', 'Laporan/nilaimapel', 'fas fa-fw fa-list-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal_mapel`
--
ALTER TABLE `jadwal_mapel`
  ADD PRIMARY KEY (`id_jadmapel`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_attempts`
--
ALTER TABLE `log_attempts`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `nilai_id` (`nilai_id`),
  ADD KEY `predikat_id` (`predikat_id`);

--
-- Indexes for table `nilai_header`
--
ALTER TABLE `nilai_header`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `tahun_pel_id` (`tahun_pel_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `predikat_nil`
--
ALTER TABLE `predikat_nil`
  ADD PRIMARY KEY (`id_predikat`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_takad`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_mapel`
--
ALTER TABLE `jadwal_mapel`
  MODIFY `id_jadmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_header`
--
ALTER TABLE `nilai_header`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `predikat_nil`
--
ALTER TABLE `predikat_nil`
  MODIFY `id_predikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_takad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_mapel`
--
ALTER TABLE `jadwal_mapel`
  ADD CONSTRAINT `jadwal_mapel_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `jadwal_mapel_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_mapel_ibfk_3` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `log_attempts`
--
ALTER TABLE `log_attempts`
  ADD CONSTRAINT `log_attempts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD CONSTRAINT `nilai_detail_ibfk_1` FOREIGN KEY (`nilai_id`) REFERENCES `nilai_header` (`id_nilai`),
  ADD CONSTRAINT `nilai_detail_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `nilai_detail_ibfk_3` FOREIGN KEY (`predikat_id`) REFERENCES `predikat_nil` (`id_predikat`);

--
-- Constraints for table `nilai_header`
--
ALTER TABLE `nilai_header`
  ADD CONSTRAINT `nilai_header_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `nilai_header_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `nilai_header_ibfk_3` FOREIGN KEY (`tahun_pel_id`) REFERENCES `tahun_akademik` (`id_takad`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id_level`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id_level`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
