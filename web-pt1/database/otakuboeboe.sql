-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2021 at 09:20 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otakuboeboe`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi_buku`
--

CREATE TABLE `donasi_buku` (
  `id_donasiBuku` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `id_kategoriKebutuhan` int(11) NOT NULL,
  `nama_perpus` varchar(100) NOT NULL,
  `jumlah_buku` int(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `foto_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donasi_detail`
--

CREATE TABLE `donasi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `nama_penerima` int(11) NOT NULL,
  `nama_pengirim` int(11) NOT NULL,
  `nama_perpustakaan` int(11) NOT NULL,
  `alamat_penerima` int(11) NOT NULL,
  `noTelepon_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donasi_konfirmasi`
--

CREATE TABLE `donasi_konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_konfirmasiPerpus` int(11) NOT NULL,
  `bukti_donasi` int(11) NOT NULL,
  `status_donasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donatur_aktif`
--

CREATE TABLE `donatur_aktif` (
  `id_akunDonaturAktif` int(11) NOT NULL,
  `email_donatur` varchar(100) NOT NULL,
  `password_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur_aktif`
--

INSERT INTO `donatur_aktif` (`id_akunDonaturAktif`, `email_donatur`, `password_donatur`) VALUES
(14, 'rief@gmail.com', '$2y$10$WrEg6T229rmQkq81N3WT3eujTiaEqAPA0VOg1VuN8x0iOFpUd7.GW'),
(15, 'winata26@gmail.com', '$2y$10$asqGH4TtFsKV9wH.oS5Yd.MhoFfIjS3FgkwwvyPg/rrLATp6CSgSK'),
(16, 'arief@gmail.com', '$2y$10$vPuweRCS6lUEWdft6okTmu0ZGUco3QrLAu8kmDJP/.pEdDEKcAihe'),
(17, 'nurul@gmail.com', '$2y$10$yhNezgeDz1HG.tdrWfuOuuVWaGt7GJnYk/65OtdmDGfW/SyoCNHre'),
(18, 'devana@gmail.com', '$2y$10$c33Sa9jrPvL4ASVVJ/d/VO5y2vb0clHrXpcociRnBqp9p9uM17cXe');

-- --------------------------------------------------------

--
-- Table structure for table `donatur_alamat`
--

CREATE TABLE `donatur_alamat` (
  `id_alamatDonaturAktif` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodePos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur_alamat`
--

INSERT INTO `donatur_alamat` (`id_alamatDonaturAktif`, `alamat`, `kodePos`) VALUES
(16, 'fdf', 2112),
(17, 'Jalan Musing Melintir Mati aja dh', 22222),
(18, 'fdfd', 21212),
(19, '21sdf', 21221),
(20, 'fdfdf', 21231);

-- --------------------------------------------------------

--
-- Table structure for table `donatur_daftar`
--

CREATE TABLE `donatur_daftar` (
  `id_donatur` int(11) NOT NULL,
  `id_loginDonatur` int(11) NOT NULL,
  `email_donatur` varchar(100) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `noTelepon_donatur` varchar(20) NOT NULL,
  `tglLahir_donatur` date NOT NULL,
  `id_alamatDonatur` int(11) NOT NULL,
  `instansi_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur_daftar`
--

INSERT INTO `donatur_daftar` (`id_donatur`, `id_loginDonatur`, `email_donatur`, `nama_donatur`, `noTelepon_donatur`, `tglLahir_donatur`, `id_alamatDonatur`, `instansi_donatur`) VALUES
(4, 14, 'rief@gmail.com', 'Arief Yusuf Winata', '0812321312', '2021-05-24', 16, 'Lembaga'),
(5, 15, 'winata26@gmail.com', 'Arief Yusuf Winata', '123332', '2025-03-03', 17, 'Perorangan'),
(6, 16, 'arief@gmail.com', 'Arief Yusuf Winata', '12121', '2021-05-27', 18, 'Komunitas'),
(7, 17, 'nurul@gmail.com', 'Nurul Qofifah AudyNingrum', '21221', '2002-02-14', 19, 'Perusahaan'),
(8, 18, 'devana@gmail.com', 'Devana', '12121', '2021-05-25', 20, 'Perorangan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kebutuhan`
--

CREATE TABLE `kategori_kebutuhan` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_kebutuhan`
--

INSERT INTO `kategori_kebutuhan` (`id_kategori`, `jenis_kategori`) VALUES
(8, 'Pendidikan,Anak-anak,Kamus,Kedokteran'),
(9, 'Silahkan Update'),
(10, 'Silahkan Update'),
(11, 'Silahkan Update');

-- --------------------------------------------------------

--
-- Table structure for table `perpus_aktif`
--

CREATE TABLE `perpus_aktif` (
  `id_akunPerpus` int(11) NOT NULL,
  `email_perpus` varchar(100) NOT NULL,
  `password_perpus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpus_aktif`
--

INSERT INTO `perpus_aktif` (`id_akunPerpus`, `email_perpus`, `password_perpus`) VALUES
(30, 'winata@gmail.com', '$2y$10$mjwFZ.qzBYvEWzPfBzkzUu6JxoJm9tSVpG53cjGnX4PjAQt/fLwHS'),
(31, 'arief2@gmail.com', '$2y$10$BJowc6BC1qxxM/Hj/37SL.BPubgGLVEaHOUBJcipzcMcvBHWA32jK'),
(32, 'nurul2@gmail.com', '$2y$10$39soy6bTqTyTv6uQBHMuy.InrOx5vfgYpUe4rRwwaBecte50IF552'),
(33, 'devana2@gmail.com', '$2y$10$J45WgoKy.8CsiaP4MUDIRujZkaweGUW7Am7NtHMlr7iqcX6XK3fBy');

-- --------------------------------------------------------

--
-- Table structure for table `perpus_alamat`
--

CREATE TABLE `perpus_alamat` (
  `id_alamatPerpusAktif` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa_kelurahan` varchar(100) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `kodePos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpus_alamat`
--

INSERT INTO `perpus_alamat` (`id_alamatPerpusAktif`, `provinsi`, `kabupaten_kota`, `kecamatan`, `desa_kelurahan`, `rt`, `rw`, `jalan`, `kodePos`) VALUES
(48, 'Nanggala', 'Nawacita', 'haha', 'psuing', '$rt', '21', 'jfjfjfjf', 2132),
(49, 'Sumatera Utara', 'Binjai', 'fd', 'fd', '21', '21', 'fdfdf', 2112),
(50, 'Sulawesi Tengah', 'fd', 'fd', 'fd', '21', '21', 'fdfd', 22212),
(51, 'Jawa Timur', 'fd', 'fd', 'fd', '21', '21', 'fdfd', 22221);

-- --------------------------------------------------------

--
-- Table structure for table `perpus_daftar`
--

CREATE TABLE `perpus_daftar` (
  `id_perpus` int(11) NOT NULL,
  `id_loginPerpus` int(11) NOT NULL,
  `namaPengelola_perpus` varchar(100) NOT NULL,
  `nama_perpus` varchar(100) NOT NULL,
  `tahunBerdiri_perpus` varchar(50) NOT NULL,
  `noIzin_perpus` int(50) NOT NULL,
  `id_alamatPerpus` int(11) NOT NULL,
  `id_kategoriPerpus` int(11) NOT NULL,
  `noTelepon_perpus` int(50) NOT NULL,
  `tentang_perpus` varchar(100) NOT NULL,
  `gambar_perpus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpus_daftar`
--

INSERT INTO `perpus_daftar` (`id_perpus`, `id_loginPerpus`, `namaPengelola_perpus`, `nama_perpus`, `tahunBerdiri_perpus`, `noIzin_perpus`, `id_alamatPerpus`, `id_kategoriPerpus`, `noTelepon_perpus`, `tentang_perpus`, `gambar_perpus`) VALUES
(43, 30, 'rief', 'Pusing melintir', '2121', 111111, 48, 8, 21333, '11111', 'image/profile-perpus/upload-user/Capture.JPG'),
(44, 31, 'Arief Yusuf Winata', 'Perpus Arief', '2020', 1212121, 49, 9, 21, 'Silahkan Update', 'image/profile-perpus/gambar.png'),
(45, 32, 'Nurul Qofifah AudyNingrum', 'Peprus Nurul', '2019', 21121, 50, 10, 2121212, 'Silahkan Update', 'image/profile-perpus/gambar.png'),
(46, 33, 'Devana Gema Falesta', 'Perpus Devana', '2018', 222121, 51, 11, 212121, 'Silahkan Update', 'image/profile-perpus/gambar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi_buku`
--
ALTER TABLE `donasi_buku`
  ADD PRIMARY KEY (`id_donasiBuku`),
  ADD KEY `Kategori` (`id_kategoriKebutuhan`),
  ADD KEY `Donasi` (`id_donatur`);

--
-- Indexes for table `donasi_detail`
--
ALTER TABLE `donasi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `donasi_konfirmasi`
--
ALTER TABLE `donasi_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `Melakukan Konformasi` (`id_konfirmasiPerpus`);

--
-- Indexes for table `donatur_aktif`
--
ALTER TABLE `donatur_aktif`
  ADD PRIMARY KEY (`id_akunDonaturAktif`);

--
-- Indexes for table `donatur_alamat`
--
ALTER TABLE `donatur_alamat`
  ADD PRIMARY KEY (`id_alamatDonaturAktif`);

--
-- Indexes for table `donatur_daftar`
--
ALTER TABLE `donatur_daftar`
  ADD PRIMARY KEY (`id_donatur`),
  ADD KEY `Memiliki Akun` (`id_loginDonatur`),
  ADD KEY `Memiliki Alamat` (`id_alamatDonatur`);

--
-- Indexes for table `kategori_kebutuhan`
--
ALTER TABLE `kategori_kebutuhan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `perpus_aktif`
--
ALTER TABLE `perpus_aktif`
  ADD PRIMARY KEY (`id_akunPerpus`);

--
-- Indexes for table `perpus_alamat`
--
ALTER TABLE `perpus_alamat`
  ADD PRIMARY KEY (`id_alamatPerpusAktif`);

--
-- Indexes for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  ADD PRIMARY KEY (`id_perpus`),
  ADD KEY `Memiliki Akun Mitra` (`id_loginPerpus`),
  ADD KEY `Memiliki Alamat Mitra` (`id_alamatPerpus`),
  ADD KEY `Memiliki Kategori Kebutuhan` (`id_kategoriPerpus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi_buku`
--
ALTER TABLE `donasi_buku`
  MODIFY `id_donasiBuku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi_detail`
--
ALTER TABLE `donasi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi_konfirmasi`
--
ALTER TABLE `donasi_konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donatur_aktif`
--
ALTER TABLE `donatur_aktif`
  MODIFY `id_akunDonaturAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `donatur_alamat`
--
ALTER TABLE `donatur_alamat`
  MODIFY `id_alamatDonaturAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `donatur_daftar`
--
ALTER TABLE `donatur_daftar`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_kebutuhan`
--
ALTER TABLE `kategori_kebutuhan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perpus_aktif`
--
ALTER TABLE `perpus_aktif`
  MODIFY `id_akunPerpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `perpus_alamat`
--
ALTER TABLE `perpus_alamat`
  MODIFY `id_alamatPerpusAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi_buku`
--
ALTER TABLE `donasi_buku`
  ADD CONSTRAINT `Donasi` FOREIGN KEY (`id_donatur`) REFERENCES `donatur_daftar` (`id_donatur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Kategori` FOREIGN KEY (`id_kategoriKebutuhan`) REFERENCES `kategori_kebutuhan` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Melakukan Konfirmasi` FOREIGN KEY (`id_donasiBuku`) REFERENCES `donasi_konfirmasi` (`id_konfirmasi`) ON UPDATE CASCADE;

--
-- Constraints for table `donasi_konfirmasi`
--
ALTER TABLE `donasi_konfirmasi`
  ADD CONSTRAINT `Melakukan Konformasi` FOREIGN KEY (`id_konfirmasiPerpus`) REFERENCES `perpus_daftar` (`id_perpus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Konfirmasi` FOREIGN KEY (`id_konfirmasi`) REFERENCES `donasi_detail` (`id_detail`) ON UPDATE CASCADE;

--
-- Constraints for table `donatur_daftar`
--
ALTER TABLE `donatur_daftar`
  ADD CONSTRAINT `Memiliki Akun Donatur` FOREIGN KEY (`id_loginDonatur`) REFERENCES `donatur_aktif` (`id_akunDonaturAktif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Alamat Donatur` FOREIGN KEY (`id_alamatDonatur`) REFERENCES `donatur_alamat` (`id_alamatDonaturAktif`) ON UPDATE CASCADE;

--
-- Constraints for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  ADD CONSTRAINT `Memiliki Akun Perpus` FOREIGN KEY (`id_loginPerpus`) REFERENCES `perpus_aktif` (`id_akunPerpus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Alamat Perpus` FOREIGN KEY (`id_alamatPerpus`) REFERENCES `perpus_alamat` (`id_alamatPerpusAktif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Kategori Kebutuhan` FOREIGN KEY (`id_kategoriPerpus`) REFERENCES `kategori_kebutuhan` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
