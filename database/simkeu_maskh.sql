-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 08:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkeu_maskh`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penggunaan_dana`
--

CREATE TABLE `jenis_penggunaan_dana` (
  `id` int(11) NOT NULL,
  `nama_penggunaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_penggunaan_dana`
--

INSERT INTO `jenis_penggunaan_dana` (`id`, `nama_penggunaan`) VALUES
(1, 'Pengembangan Perpustakaan'),
(2, 'Kegiatan Penerimaan Siswa Baru'),
(3, 'Kegiatan dan Pembelajaran Ekskul Siswa'),
(4, 'Kegiatan Ulangan dan Ujian'),
(5, 'Pembelian Bahan Habis Pakai'),
(6, 'Daya Langganan Daya dan Jasa'),
(7, 'Perawatan Sekolah'),
(8, 'Pembayaran Honorarium Bulanan Guru Honorer dan Tenaga Kependidikan Honorer'),
(9, 'Pengembangan Profesi Guru'),
(10, 'Membantu Siswa Miskin'),
(11, 'pembiayaan pengelolaan BOS'),
(12, 'Pembelian Perangkat Komputer'),
(13, 'Biaya Lainnya jika Komponen 1 - 12 telah Terpenuhi');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_perencanaan_bos`
--

CREATE TABLE `komponen_perencanaan_bos` (
  `id` int(11) NOT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komponen_perencanaan_bos`
--

INSERT INTO `komponen_perencanaan_bos` (`id`, `nama_komponen`, `jenis`) VALUES
(1, 'Sisa Tahun Lalu', 'Sumber Dana'),
(2, 'Pendapatan Rutin', 'Sumber Dana'),
(3, 'Bantuan Operasional Sekolah', 'Sumber Dana'),
(4, 'Bantuan', 'Sumber Dana'),
(5, 'Pendapatan Asli Madrasah', 'Sumber Dana'),
(6, 'Program Madrasah', 'Penggunaan'),
(7, 'Belanja Lain', 'Penggunaan');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_perencanaan_bpmu`
--

CREATE TABLE `komponen_perencanaan_bpmu` (
  `id` int(11) NOT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_lengkap`, `username`, `password`, `level`, `status`) VALUES
(1, 'Asep Firmansyah', 'keptu', '3b5da3d68a2dded94546d9b1d9fad0e4', 'keptu', '1'),
(2, 'Pulung', 'kepma', 'eda3b5ac169e869ed5e35631c59d1c08', 'kepma', '1'),
(3, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(4, 'hash', 'hash', '2346ad27d7568ba9896f1b7da6b5991251debdf2', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_bos`
--

CREATE TABLE `perencanaan_bos` (
  `id` varchar(8) NOT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perencanaan_bos`
--

INSERT INTO `perencanaan_bos` (`id`, `jumlah_siswa`, `tahun`) VALUES
('1', 94, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_bos_detail`
--

CREATE TABLE `perencanaan_bos_detail` (
  `id` varchar(8) NOT NULL,
  `jumlah_dana` int(25) DEFAULT NULL,
  `id_perencanaan_bos` varchar(8) DEFAULT NULL,
  `id_subkomponen_perencanaan_bos` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_bpmu`
--

CREATE TABLE `perencanaan_bpmu` (
  `id` varchar(8) NOT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `biaya_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perencanaan_bpmu`
--

INSERT INTO `perencanaan_bpmu` (`id`, `jumlah_siswa`, `tahun`, `biaya_siswa`) VALUES
('B1', 71, 2018, 550000);

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_bpmu_detail`
--

CREATE TABLE `perencanaan_bpmu_detail` (
  `id` varchar(8) NOT NULL,
  `id_perencanaan_bpmu` varchar(8) DEFAULT NULL,
  `id_subkomponen_perencanaan_bpmu` varchar(8) DEFAULT NULL,
  `quantitas` int(8) DEFAULT NULL,
  `id_satuan` int(2) DEFAULT NULL,
  `jumlah_dana` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil_madrasah`
--

CREATE TABLE `profil_madrasah` (
  `npsn` varchar(8) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `tahun_buka` int(4) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kodepos` int(5) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `status_sekolah` varchar(10) DEFAULT NULL,
  `jenjang` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_bos`
--

CREATE TABLE `realisasi_bos` (
  `kode` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_bukti` varchar(25) DEFAULT NULL,
  `jenis_transaksi` varchar(25) DEFAULT NULL,
  `jumlah_dana` int(25) DEFAULT NULL,
  `id_jenis_penggunaan_dana` int(11) DEFAULT NULL,
  `id_perencanaan_bos_detail` varchar(8) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_bpmu`
--

CREATE TABLE `realisasi_bpmu` (
  `kode` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_bukti` varchar(25) DEFAULT NULL,
  `id_perencanaan_bpmu_detail` varchar(8) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `jenis_transaksi` varchar(25) DEFAULT NULL,
  `jumlah_dana` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(2) NOT NULL,
  `nama_satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subkomponen_perencanaan_bos`
--

CREATE TABLE `subkomponen_perencanaan_bos` (
  `id` varchar(8) NOT NULL,
  `id_komponen_perencanaan_bos` int(11) DEFAULT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkomponen_perencanaan_bos`
--

INSERT INTO `subkomponen_perencanaan_bos` (`id`, `id_komponen_perencanaan_bos`, `nama_komponen`) VALUES
('2.1', 2, 'Gaji PNS / DPK'),
('2.2', 2, 'Gaji Pegawai Tetap Yayasan'),
('2.3', 2, 'Belanja Barang'),
('2.4', 2, 'Belanja Pemeliharaan'),
('2.5', 2, 'Belanja lain-lain'),
('3.1', 3, 'BOS Pusat'),
('3.2', 3, 'BOS Provinsi'),
('3.3', 3, 'BOS Kadipaten / Kota'),
('4.1', 4, 'Dana Dekosentrasi'),
('4.2', 4, 'Dana Tugas Pembantuan'),
('4.3', NULL, NULL),
('4.4', NULL, NULL),
('5.1', NULL, NULL),
('5.2', NULL, NULL),
('5.3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subkomponen_perencanaan_bpmu`
--

CREATE TABLE `subkomponen_perencanaan_bpmu` (
  `id` varchar(8) NOT NULL,
  `id_komponen_perencanaan_bpmu` int(11) DEFAULT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_penggunaan_dana`
--
ALTER TABLE `jenis_penggunaan_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_perencanaan_bos`
--
ALTER TABLE `komponen_perencanaan_bos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_perencanaan_bpmu`
--
ALTER TABLE `komponen_perencanaan_bpmu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaan_bos`
--
ALTER TABLE `perencanaan_bos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaan_bos_detail`
--
ALTER TABLE `perencanaan_bos_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perencanaan_bos` (`id_perencanaan_bos`),
  ADD KEY `id_subkomponen_perencanaan_bos` (`id_subkomponen_perencanaan_bos`);

--
-- Indexes for table `perencanaan_bpmu`
--
ALTER TABLE `perencanaan_bpmu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaan_bpmu_detail`
--
ALTER TABLE `perencanaan_bpmu_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perencanaan_bpmu` (`id_perencanaan_bpmu`),
  ADD KEY `id_subkomponen_perencanaan_bpmu` (`id_subkomponen_perencanaan_bpmu`);

--
-- Indexes for table `realisasi_bos`
--
ALTER TABLE `realisasi_bos`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_perencanaan_bos_detail` (`id_perencanaan_bos_detail`),
  ADD KEY `id_jenis_penggunaan_dana` (`id_jenis_penggunaan_dana`);

--
-- Indexes for table `realisasi_bpmu`
--
ALTER TABLE `realisasi_bpmu`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_perencanaan_bpmu_detail` (`id_perencanaan_bpmu_detail`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkomponen_perencanaan_bos`
--
ALTER TABLE `subkomponen_perencanaan_bos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subkomponen_perencanaan_bos` (`id_komponen_perencanaan_bos`);

--
-- Indexes for table `subkomponen_perencanaan_bpmu`
--
ALTER TABLE `subkomponen_perencanaan_bpmu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komponen_perencanaan_bpmu` (`id_komponen_perencanaan_bpmu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_penggunaan_dana`
--
ALTER TABLE `jenis_penggunaan_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komponen_perencanaan_bos`
--
ALTER TABLE `komponen_perencanaan_bos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `komponen_perencanaan_bpmu`
--
ALTER TABLE `komponen_perencanaan_bpmu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perencanaan_bos_detail`
--
ALTER TABLE `perencanaan_bos_detail`
  ADD CONSTRAINT `perencanaan_bos_detail_ibfk_1` FOREIGN KEY (`id_perencanaan_bos`) REFERENCES `perencanaan_bos` (`id`),
  ADD CONSTRAINT `perencanaan_bos_detail_ibfk_2` FOREIGN KEY (`id_subkomponen_perencanaan_bos`) REFERENCES `subkomponen_perencanaan_bos` (`id`);

--
-- Constraints for table `perencanaan_bpmu_detail`
--
ALTER TABLE `perencanaan_bpmu_detail`
  ADD CONSTRAINT `perencanaan_bpmu_detail_ibfk_1` FOREIGN KEY (`id_perencanaan_bpmu`) REFERENCES `perencanaan_bpmu` (`id`),
  ADD CONSTRAINT `perencanaan_bpmu_detail_ibfk_2` FOREIGN KEY (`id_subkomponen_perencanaan_bpmu`) REFERENCES `subkomponen_perencanaan_bpmu` (`id`);

--
-- Constraints for table `realisasi_bos`
--
ALTER TABLE `realisasi_bos`
  ADD CONSTRAINT `realisasi_bos_ibfk_2` FOREIGN KEY (`id_perencanaan_bos_detail`) REFERENCES `perencanaan_bos_detail` (`id`),
  ADD CONSTRAINT `realisasi_bos_ibfk_3` FOREIGN KEY (`id_jenis_penggunaan_dana`) REFERENCES `jenis_penggunaan_dana` (`id`);

--
-- Constraints for table `realisasi_bpmu`
--
ALTER TABLE `realisasi_bpmu`
  ADD CONSTRAINT `realisasi_bpmu_ibfk_1` FOREIGN KEY (`id_perencanaan_bpmu_detail`) REFERENCES `perencanaan_bpmu_detail` (`id`);

--
-- Constraints for table `subkomponen_perencanaan_bos`
--
ALTER TABLE `subkomponen_perencanaan_bos`
  ADD CONSTRAINT `subkomponen_perencanaan_bos_ibfk_1` FOREIGN KEY (`id_komponen_perencanaan_bos`) REFERENCES `komponen_perencanaan_bos` (`id`);

--
-- Constraints for table `subkomponen_perencanaan_bpmu`
--
ALTER TABLE `subkomponen_perencanaan_bpmu`
  ADD CONSTRAINT `subkomponen_perencanaan_bpmu_ibfk_1` FOREIGN KEY (`id_komponen_perencanaan_bpmu`) REFERENCES `komponen_perencanaan_bpmu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
