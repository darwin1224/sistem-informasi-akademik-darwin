-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2019 at 07:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Kristen'),
(2, 'Buddha'),
(3, 'Islam'),
(4, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_pembayaran`
--

CREATE TABLE `tbl_biaya_pembayaran` (
  `id_biaya_pembayaran` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `jumlah_biaya_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_pembayaran`
--

INSERT INTO `tbl_biaya_pembayaran` (`id_biaya_pembayaran`, `id_jenis_pembayaran`, `id_tahun_akademik`, `jumlah_biaya_pembayaran`) VALUES
(1, 1, 1, '500.000'),
(2, 2, 1, '600.000'),
(3, 3, 1, '700.000'),
(4, 4, 1, '800.000'),
(5, 5, 1, '900.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE `tbl_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(30) NOT NULL,
  `id_ruangan` varchar(5) NOT NULL,
  `id_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`id_golongan`, `nama_golongan`, `id_ruangan`, `id_jurusan`) VALUES
(1, 'GOL1A', '01B', 'IPA'),
(2, 'GOL2B', '01A', 'IPS'),
(3, 'GOL3A', '01C', 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` varchar(15) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin_guru` enum('Laki-laki','Perempuan') NOT NULL,
  `id_agama` int(11) NOT NULL,
  `gambar_guru` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama_guru`, `jenis_kelamin_guru`, `id_agama`, `gambar_guru`, `username`, `password`) VALUES
('GR001', 'Muhardi Saputra', 'Laki-laki', 1, 'user_blank.png', 'muhardi', 'e10adc3949ba59abbe56e057f20f883e'),
('GR002', 'Budi Haryanto', 'Laki-laki', 3, 'user_blank.png', 'budi', 'e10adc3949ba59abbe56e057f20f883e'),
('GR003', 'Felicia Tanjaya', 'Perempuan', 2, 'user_blank.png', 'felicia', 'e10adc3949ba59abbe56e057f20f883e'),
('GR004', 'HINDRA CHANDRA', 'Laki-laki', 2, 'd6ea03f660027ebf694eb6368d0ca75d.png', 'hindra', 'e10adc3949ba59abbe56e057f20f883e'),
('GR005', 'HASAN WIJAYA', 'Laki-laki', 2, '97818157e8fe378fcc864cc6a7ad0ee1.png', 'hasan', 'e10adc3949ba59abbe56e057f20f883e'),
('GR006', 'ERLAN MAWAR', 'Laki-laki', 1, 'b215e9fbb4921538f476cdfcdc0eb7f8.png', 'erlan', 'e10adc3949ba59abbe56e057f20f883e'),
('GR007', 'MEDIANA TAMBUNAN', 'Perempuan', 1, '16bfbae99b11a3a55439c069169debb2.png', 'mediana', 'e10adc3949ba59abbe56e057f20f883e'),
('GR008', 'IDA RATMAWATI', 'Perempuan', 3, '12e5aa0570e8d35c1039fdf6196d78a8.png', 'ida', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses_pengguna`
--

CREATE TABLE `tbl_hak_akses_pengguna` (
  `id_hak_akses` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses_pengguna`
--

INSERT INTO `tbl_hak_akses_pengguna` (`id_hak_akses`, `id_menu`, `id_level_pengguna`) VALUES
(5, 6, 1),
(8, 9, 1),
(12, 13, 1),
(13, 14, 1),
(34, 12, 1),
(46, 7, 1),
(48, 8, 1),
(51, 10, 1),
(52, 11, 1),
(64, 11, 2),
(65, 15, 2),
(67, 1, 3),
(68, 11, 3),
(72, 15, 3),
(73, 16, 3),
(75, 18, 4),
(76, 19, 4),
(77, 20, 4),
(78, 22, 4),
(79, 23, 4),
(80, 26, 4),
(81, 5, 1),
(82, 3, 1),
(85, 1, 1),
(86, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_jurusan` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_guru` varchar(30) NOT NULL,
  `id_ruangan` varchar(10) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `hari_jadwal` varchar(30) NOT NULL,
  `jam_jadwal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_tahun_akademik`, `id_jurusan`, `id_mapel`, `id_guru`, `id_ruangan`, `id_golongan`, `hari_jadwal`, `jam_jadwal`) VALUES
(2, 1, 'IPS', 'TIK', 'GR004', '01E', 2, 'Rabu', '10.45 - 11.30'),
(6, 1, 'IPA', 'FIS', 'GR002', '01E', 3, 'Kamis', '10.45 - 11.30'),
(7, 1, 'IPA', 'BIO', 'GR003', '01C', 2, 'Kamis', '08.15 - 09.00'),
(8, 1, 'IPS', 'MTK', 'GR002', '01D', 2, 'Jumat', '12.15 - 13.00'),
(9, 1, 'IPS', 'BING', 'GR003', '01B', 1, 'Jumat', '10.45 - 11.30'),
(11, 1, 'IPS', 'SB', 'GR002', '01B', 1, 'Selasa', '10.45 - 11.30'),
(13, 1, 'IPA', 'TIK', 'GR004', '01D', 2, 'Sabtu', '07.30 - 08.15'),
(14, 1, 'IPS', 'BING', 'GR002', '01A', 1, 'Senin', '08.15 - 09.00'),
(15, 1, 'IPA', 'BID', 'GR001', '01A', 2, 'Senin', '07.30 - 08.15'),
(16, 1, 'IPA', 'BING', 'GR005', '01D', 2, 'Senin', '07.30 - 08.15'),
(17, 1, 'IPA', 'MTK', 'GR008', '01D', 3, 'Senin', '10.00 - 10.45'),
(18, 1, 'IPS', 'PEN', 'GR006', '01C', 2, 'Senin', '11.30 - 12.15'),
(19, 1, 'IPA', 'BING', 'GR001', '01A', 1, 'Senin', '12.15 - 13.00'),
(20, 1, 'IPS', 'BIO', 'GR002', '01A', 3, 'Senin', '10.45 - 11.30'),
(21, 1, 'IPA', 'SB', 'GR005', '01E', 3, 'Senin', '10.45 - 11.30'),
(22, 1, 'IPA', 'BING', 'GR007', '01C', 2, 'Senin', '09.15 - 10.00'),
(23, 1, 'IPA', 'MTK', 'GR001', '01C', 1, 'Selasa', '07.30 - 08.15'),
(24, 1, 'IPS', 'PEN', 'GR006', '01B', 3, 'Selasa', '08.15 - 09.00'),
(25, 1, 'IPA', 'FIS', 'GR005', '01D', 1, 'Selasa', '09.15 - 10.00'),
(26, 1, 'IPS', 'BID', 'GR003', '01E', 1, 'Selasa', '10.00 - 10.45'),
(27, 1, 'IPS', 'BING', 'GR003', '01C', 2, 'Rabu', '10.45 - 11.30'),
(28, 1, 'IPA', 'BIO', 'GR002', '01A', 2, 'Selasa', '11.30 - 12.15'),
(29, 1, 'IPA', 'TIK', 'GR001', '01C', 3, 'Selasa', '11.30 - 12.15'),
(30, 1, 'IPA', 'SB', 'GR002', '01B', 1, 'Selasa', '12.15 - 13.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pembayaran`
--

CREATE TABLE `tbl_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_jenis_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_pembayaran`
--

INSERT INTO `tbl_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`) VALUES
(1, 'SPP SEMESTER 1'),
(2, 'SPP SEMESTER 2'),
(3, 'SPP SEMESTER 3'),
(4, 'SPP SEMESTER 4'),
(5, 'SPP SEMESTER 5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenjang_sekolah`
--

CREATE TABLE `tbl_jenjang_sekolah` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(50) NOT NULL,
  `jumlah_kelas_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenjang_sekolah`
--

INSERT INTO `tbl_jenjang_sekolah` (`id_jenjang`, `nama_jenjang`, `jumlah_kelas_jenjang`) VALUES
(1, 'SD / MI', 6),
(2, 'SMP / MTS', 3),
(3, 'SMA / SMK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('IPA', 'Ilmu Pengetahuan Alam'),
('IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `status_kurikulum` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `nama_kurikulum`, `status_kurikulum`) VALUES
(1, 'Kurikulum 2017', 'Aktif'),
(2, 'Kurikulum 2013', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum_detail`
--

CREATE TABLE `tbl_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_jurusan` varchar(10) NOT NULL,
  `id_ruangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum_detail`
--

INSERT INTO `tbl_kurikulum_detail` (`id_kurikulum_detail`, `id_kurikulum`, `id_mapel`, `id_jurusan`, `id_ruangan`) VALUES
(1, 1, 'BING', 'IPS', '01A'),
(2, 1, 'MTK', 'IPS', '01A'),
(3, 1, 'TIK', 'IPA', '01E'),
(4, 2, 'BING', 'IPA', '01A'),
(5, 2, 'MTK', 'IPS', '01B'),
(6, 1, 'BING', 'IPA', '01A'),
(7, 2, 'BING', 'IPS', '01C'),
(8, 2, 'BIO', 'IPS', '01A'),
(10, 1, 'MTK', 'IPS', '01E'),
(11, 2, 'FIS', 'IPA', '01A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_pengguna`
--

CREATE TABLE `tbl_level_pengguna` (
  `id_level_pengguna` int(11) NOT NULL,
  `level_pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_pengguna`
--

INSERT INTO `tbl_level_pengguna` (`id_level_pengguna`, `level_pengguna`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Walikelas'),
(4, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_pembayaran`
--

CREATE TABLE `tbl_log_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log_pembayaran`
--

INSERT INTO `tbl_log_pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `id_siswa`, `id_jenis_pembayaran`, `jumlah_pembayaran`) VALUES
(6, '2019-02-13', 'SW001', 3, 500),
(7, '2019-02-13', 'SW005', 3, 800);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_siswa`
--

CREATE TABLE `tbl_log_siswa` (
  `id_log_siswa` int(11) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log_siswa`
--

INSERT INTO `tbl_log_siswa` (`id_log_siswa`, `id_siswa`, `id_golongan`, `id_tahun_akademik`) VALUES
(1, 'SW001', 1, 1),
(2, 'SW002', 1, 1),
(3, 'SW003', 1, 1),
(4, 'SW004', 2, 1),
(5, 'SW005', 2, 1),
(6, 'SW006', 3, 1),
(7, 'SW007', 3, 1),
(8, 'SW008', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
('BID', 'Bahasa Indonesia'),
('BING', 'Bahasa Inggris'),
('BIO', 'BIOLOGI'),
('FIS', 'Fisika'),
('KIM', 'Kimia'),
('MTK', 'Matematika'),
('PEN', 'PENJAS'),
('SB', 'SENI BUDAYA'),
('TIK', 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL,
  `icon_menu` varchar(50) NOT NULL,
  `sub_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `link_menu`, `icon_menu`, `sub_menu`) VALUES
(1, 'Data Siswa', 'siswa', 'fa fa-users', 0),
(2, 'Data Guru', 'guru', 'fa fa-graduation-cap', 0),
(3, 'Master Data', '#', 'fa fa-folder', 0),
(5, 'Jurusan', 'jurusan', 'fa fa-qrcode', 3),
(6, 'Ruangan', 'ruangan', 'fa fa-list-alt', 3),
(7, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-o', 3),
(8, 'Mata Pelajaran', 'mapel', 'fa fa-book', 3),
(9, 'Golongan', 'golongan', 'fa fa-user', 3),
(10, 'Kurikulum', 'kurikulum', 'fa fa-cubes', 3),
(11, 'Jadwal', 'jadwal', 'fa fa-calendar', 0),
(12, 'Wali Kelas', 'walikelas', 'fa fa-graduation-cap', 0),
(13, 'Data Pengguna', 'pengguna', 'fa fa-user', 0),
(14, 'Settings', 'sekolah', 'fa fa-cogs', 0),
(15, 'Nilai Siswa', 'nilai', 'fa fa-book', 0),
(16, 'Raport Siswa', 'raport', 'fa fa-calendar', 0),
(18, 'Data Pembayaran', 'pembayaran', 'fa fa-table', 0),
(19, 'Form Bayar', 'pembayaran/tambah', 'fa fa-edit', 0),
(20, 'Master Data', '#', 'fa fa-folder', 0),
(22, 'Jenis Pembayaran', 'jenis_pembayaran', 'fa fa-th-large', 20),
(23, 'Biaya Pembayaran', 'biaya', 'fa fa-money', 20),
(26, 'Laporan', 'pembayaran/laporan', 'fa fa-file-o', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_siswa`, `id_jadwal`, `nilai`) VALUES
(8, 'SW004', 18, 80),
(9, 'SW005', 18, 60),
(10, 'SW006', 24, 50),
(11, 'SW007', 24, 60),
(12, 'SW004', 2, 40),
(13, 'SW005', 2, 50),
(14, 'SW005', 13, 70),
(15, 'SW004', 13, 90),
(16, 'SW004', 7, 80),
(17, 'SW005', 7, 50),
(18, 'SW001', 9, 40),
(19, 'SW002', 9, 80),
(20, 'SW003', 9, 100),
(21, 'SW001', 26, 50),
(22, 'SW002', 26, 80),
(23, 'SW003', 26, 90),
(24, 'SW004', 27, 70),
(25, 'SW005', 27, 70),
(26, 'SW004', 16, 80),
(27, 'SW005', 16, 90),
(28, 'SW008', 18, 90),
(29, 'SW008', 2, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `jumlah_pembayaran` varchar(100) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL,
  `deskripsi_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `id_siswa`, `id_jenis_pembayaran`, `jumlah_pembayaran`, `status_pembayaran`, `deskripsi_pembayaran`) VALUES
(1, '2019-02-05', 'SW005', 3, '800.000', 'Lunas', 'Pembayaran ditunda'),
(2, '2019-02-12', 'SW005', 1, '600.000', 'Belum Lunas', 'Pembayaran Lunas'),
(4, '2019-02-12', 'SW003', 1, '800.000', 'Belum Lunas', 'Pembayaran Lunas'),
(5, '2019-02-07', 'SW002', 4, '700.000', 'Belum Lunas', 'Pembayaran Ditunda'),
(6, '2019-02-13', 'SW001', 3, '500.000', 'Lunas', 'Pembayaran Tuntas'),
(7, '2019-02-13', 'SW005', 3, '800.000', 'Lunas', 'Pembayaran Tuntas');

--
-- Triggers `tbl_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `hapus_log_pembayaran` AFTER DELETE ON `tbl_pembayaran` FOR EACH ROW BEGIN
DELETE FROM tbl_log_pembayaran WHERE id_pembayaran = OLD.id_pembayaran;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_log_pembayaran` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
INSERT INTO tbl_log_pembayaran set id_pembayaran = NEW.id_pembayaran, tanggal_pembayaran = NEW.tanggal_pembayaran, id_siswa = NEW.id_siswa, id_jenis_pembayaran = NEW.id_jenis_pembayaran, jumlah_pembayaran = NEW.jumlah_pembayaran;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_log_pembayaran` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_log_pembayaran SET tanggal_pembayaran = NEW.tanggal_pembayaran, id_siswa = NEW.id_siswa, id_jenis_pembayaran = NEW.id_jenis_pembayaran, jumlah_pembayaran = NEW.jumlah_pembayaran WHERE id_pembayaran = NEW.id_pembayaran;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `id_level_pengguna` int(11) NOT NULL,
  `gambar_pengguna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `username`, `password`, `id_level_pengguna`, `gambar_pengguna`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'user_blank.png'),
(2, 'Tony Xu', 'tonyxu@gmail.com', 'tony123', 'e10adc3949ba59abbe56e057f20f883e', 4, 'user_blank.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` varchar(4) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
('01A', 'Ruangan Kelas 1A'),
('01B', 'Ruangan Kelas 1B'),
('01C', 'Ruangan Kelas 1C'),
('01D', 'Ruangan Kelas 1D'),
('01E', 'Ruangan Kelas 1E');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `email_sekolah` varchar(50) NOT NULL,
  `telepon_sekolah` varchar(15) NOT NULL,
  `id_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `email_sekolah`, `telepon_sekolah`, `id_jenjang`) VALUES
(1, 'HARAPAN JAYA', 'Jalan Sisingamangaraja No 145 C Medan', 'harapanjaya@gmail.com', '061474836474', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin_siswa` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `tempat_lahir_siswa` varchar(50) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `gambar_siswa` text NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_kurikulum` int(11) DEFAULT NULL,
  `id_walikelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin_siswa`, `tanggal_lahir_siswa`, `tempat_lahir_siswa`, `id_agama`, `gambar_siswa`, `id_golongan`, `id_tahun_akademik`, `id_kurikulum`, `id_walikelas`) VALUES
('SW001', 'Darwin', 'Laki-laki', '2019-02-11', 'Medan', 1, 'user_blank.png', 1, 1, 1, 1),
('SW002', 'Lucky Nugrah', 'Laki-laki', '2018-09-04', 'Bandung', 2, 'user_blank.png', 1, 1, 1, 1),
('SW003', 'Melisa Tanjaya', 'Perempuan', '2018-06-07', 'Jakarta', 2, 'user_blank.png', 1, 1, 1, 1),
('SW004', 'Sisca Wijaya', 'Perempuan', '2019-01-29', 'Kalimantan Timur', 3, 'user_blank.png', 2, 1, 1, 11),
('SW005', 'Ricky Wijaya', 'Laki-laki', '2018-10-10', 'Aceh', 1, 'user_blank.png', 2, 1, 1, 11),
('SW006', 'Martin Alexander', 'Laki-laki', '2019-01-06', 'Medan', 1, 'user_blank.png', 3, 1, 1, 15),
('SW007', 'Shella Maryan', 'Perempuan', '2000-04-12', 'Sulawesi Selatan', 3, 'user_blank.png', 3, 1, 1, 15),
('SW008', 'Calvin Sanjaya', 'Laki-laki', '1997-01-01', 'Bali', 1, 'user_blank.png', 2, 1, 1, 11);

--
-- Triggers `tbl_siswa`
--
DELIMITER $$
CREATE TRIGGER `hapus_log_siswa` BEFORE DELETE ON `tbl_siswa` FOR EACH ROW BEGIN
DELETE FROM tbl_log_siswa WHERE id_siswa = OLD.id_siswa;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_tambah_data_siswa` AFTER INSERT ON `tbl_siswa` FOR EACH ROW BEGIN
INSERT INTO tbl_log_siswa set id_golongan = NEW.id_golongan, id_siswa = NEW.id_siswa, id_tahun_akademik = NEW.id_tahun_akademik;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_log_siswa` AFTER UPDATE ON `tbl_siswa` FOR EACH ROW BEGIN
UPDATE tbl_log_siswa set id_golongan = NEW.id_golongan, id_tahun_akademik = NEW.id_tahun_akademik WHERE id_siswa = NEW.id_siswa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `status_tahun_akademik` enum('Aktif','Tidak Aktif') NOT NULL,
  `semester_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `status_tahun_akademik`, `semester_tahun_akademik`) VALUES
(1, '2017/2018', 'Aktif', 1),
(5, '2019/2020', 'Tidak Aktif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_walikelas`, `id_guru`, `id_golongan`, `id_tahun_akademik`) VALUES
(1, 'GR003', 1, 1),
(11, 'GR005', 2, 1),
(15, 'GR006', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_biaya_pembayaran`
--
ALTER TABLE `tbl_biaya_pembayaran`
  ADD PRIMARY KEY (`id_biaya_pembayaran`),
  ADD KEY `f_biaya_jenis_pembayaran` (`id_jenis_pembayaran`),
  ADD KEY `f_biaya_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`id_golongan`),
  ADD KEY `f_golongan_kelas` (`id_ruangan`),
  ADD KEY `f_golongan_jurusan` (`id_jurusan`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `f_agama_guru` (`id_agama`);

--
-- Indexes for table `tbl_hak_akses_pengguna`
--
ALTER TABLE `tbl_hak_akses_pengguna`
  ADD PRIMARY KEY (`id_hak_akses`),
  ADD KEY `f_hak_akses_menu` (`id_menu`),
  ADD KEY `f_hak_akses_level_pengguna` (`id_level_pengguna`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `f_jadwal_mapel` (`id_mapel`),
  ADD KEY `f_jadwal_jurusan` (`id_jurusan`),
  ADD KEY `f_jadwal_golongan` (`id_golongan`),
  ADD KEY `f_jadwal_ruangan` (`id_ruangan`),
  ADD KEY `f_jadwal_tahun_akademik` (`id_tahun_akademik`),
  ADD KEY `f_jadwal_guru` (`id_guru`);

--
-- Indexes for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  ADD PRIMARY KEY (`id_kurikulum_detail`),
  ADD KEY `f_kurikulum_kurikulum_detail` (`id_kurikulum`),
  ADD KEY `f_mapel_kurikulum_detail` (`id_mapel`),
  ADD KEY `f_jurusan_kurikulum_detail` (`id_jurusan`),
  ADD KEY `f_ruangan_kurikulum_detail` (`id_ruangan`);

--
-- Indexes for table `tbl_level_pengguna`
--
ALTER TABLE `tbl_level_pengguna`
  ADD PRIMARY KEY (`id_level_pengguna`);

--
-- Indexes for table `tbl_log_pembayaran`
--
ALTER TABLE `tbl_log_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_log_siswa`
--
ALTER TABLE `tbl_log_siswa`
  ADD PRIMARY KEY (`id_log_siswa`),
  ADD KEY `f_log_siswa` (`id_siswa`),
  ADD KEY `f_log_golongan` (`id_golongan`),
  ADD KEY `f_log_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `f_nilai_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `f_pembayaran_siswa` (`id_siswa`),
  ADD KEY `f_pembayaran_jenis` (`id_jenis_pembayaran`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `f_level_pengguna` (`id_level_pengguna`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD KEY `f_sekolah_jenjang` (`id_jenjang`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `f_agama` (`id_agama`),
  ADD KEY `f_siswa_golongan` (`id_golongan`),
  ADD KEY `f_siswa_tahun_akademik` (`id_tahun_akademik`),
  ADD KEY `f_siswa_kurikulum` (`id_kurikulum`),
  ADD KEY `f_siswa_walikelas` (`id_walikelas`);

--
-- Indexes for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  ADD PRIMARY KEY (`id_walikelas`),
  ADD KEY `f_walikelas_guru` (`id_guru`),
  ADD KEY `f_walikelas_tahun_akademik` (`id_tahun_akademik`),
  ADD KEY `f_walikelas_golongan` (`id_golongan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_biaya_pembayaran`
--
ALTER TABLE `tbl_biaya_pembayaran`
  MODIFY `id_biaya_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hak_akses_pengguna`
--
ALTER TABLE `tbl_hak_akses_pengguna`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  MODIFY `id_kurikulum_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_level_pengguna`
--
ALTER TABLE `tbl_level_pengguna`
  MODIFY `id_level_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_log_siswa`
--
ALTER TABLE `tbl_log_siswa`
  MODIFY `id_log_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_biaya_pembayaran`
--
ALTER TABLE `tbl_biaya_pembayaran`
  ADD CONSTRAINT `f_biaya_jenis_pembayaran` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `tbl_jenis_pembayaran` (`id_jenis_pembayaran`),
  ADD CONSTRAINT `f_biaya_tahun_akademik` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tbl_tahun_akademik` (`id_tahun_akademik`);

--
-- Constraints for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD CONSTRAINT `f_golongan_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `f_golongan_kelas` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`);

--
-- Constraints for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `f_agama_guru` FOREIGN KEY (`id_agama`) REFERENCES `tbl_agama` (`id_agama`);

--
-- Constraints for table `tbl_hak_akses_pengguna`
--
ALTER TABLE `tbl_hak_akses_pengguna`
  ADD CONSTRAINT `f_hak_akses_level_pengguna` FOREIGN KEY (`id_level_pengguna`) REFERENCES `tbl_level_pengguna` (`id_level_pengguna`),
  ADD CONSTRAINT `f_hak_akses_menu` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`);

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `f_jadwal_golongan` FOREIGN KEY (`id_golongan`) REFERENCES `tbl_golongan` (`id_golongan`),
  ADD CONSTRAINT `f_jadwal_guru` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`),
  ADD CONSTRAINT `f_jadwal_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `f_jadwal_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `f_jadwal_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`),
  ADD CONSTRAINT `f_jadwal_tahun_akademik` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tbl_tahun_akademik` (`id_tahun_akademik`);

--
-- Constraints for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  ADD CONSTRAINT `f_jurusan_kurikulum_detail` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `f_kurikulum_kurikulum_detail` FOREIGN KEY (`id_kurikulum`) REFERENCES `tbl_kurikulum` (`id_kurikulum`),
  ADD CONSTRAINT `f_mapel_kurikulum_detail` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`),
  ADD CONSTRAINT `f_ruangan_kurikulum_detail` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`);

--
-- Constraints for table `tbl_log_siswa`
--
ALTER TABLE `tbl_log_siswa`
  ADD CONSTRAINT `f_log_golongan` FOREIGN KEY (`id_golongan`) REFERENCES `tbl_golongan` (`id_golongan`),
  ADD CONSTRAINT `f_log_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`),
  ADD CONSTRAINT `f_log_tahun_akademik` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tbl_tahun_akademik` (`id_tahun_akademik`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `f_nilai_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `f_pembayaran_jenis` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `tbl_jenis_pembayaran` (`id_jenis_pembayaran`),
  ADD CONSTRAINT `f_pembayaran_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);

--
-- Constraints for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD CONSTRAINT `f_level_pengguna` FOREIGN KEY (`id_level_pengguna`) REFERENCES `tbl_level_pengguna` (`id_level_pengguna`);

--
-- Constraints for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD CONSTRAINT `f_sekolah_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `tbl_jenjang_sekolah` (`id_jenjang`);

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `f_agama` FOREIGN KEY (`id_agama`) REFERENCES `tbl_agama` (`id_agama`),
  ADD CONSTRAINT `f_siswa_golongan` FOREIGN KEY (`id_golongan`) REFERENCES `tbl_golongan` (`id_golongan`),
  ADD CONSTRAINT `f_siswa_kurikulum` FOREIGN KEY (`id_kurikulum`) REFERENCES `tbl_kurikulum` (`id_kurikulum`),
  ADD CONSTRAINT `f_siswa_tahun_akademik` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tbl_tahun_akademik` (`id_tahun_akademik`),
  ADD CONSTRAINT `f_siswa_walikelas` FOREIGN KEY (`id_walikelas`) REFERENCES `tbl_walikelas` (`id_walikelas`);

--
-- Constraints for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  ADD CONSTRAINT `f_walikelas_golongan` FOREIGN KEY (`id_golongan`) REFERENCES `tbl_golongan` (`id_golongan`),
  ADD CONSTRAINT `f_walikelas_guru` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`),
  ADD CONSTRAINT `f_walikelas_tahun_akademik` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tbl_tahun_akademik` (`id_tahun_akademik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
