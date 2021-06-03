-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2021 at 12:40 AM
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
  `id_loginDonatur` int(11) NOT NULL,
  `id_kategoriKebutuhan` int(11) NOT NULL,
  `nama_perpus` varchar(100) NOT NULL,
  `jumlah_buku` int(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `foto_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donasi_detail`
--

CREATE TABLE `donasi_detail` (
  `id_detail` varchar(20) NOT NULL,
  `id_alamatPerpus` int(11) NOT NULL,
  `id_loginDonatur` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `nama_perpustakaan` varchar(50) NOT NULL,
  `alamat_penerima` varchar(50) NOT NULL,
  `noTelepon_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donasi_konfirmasi`
--

CREATE TABLE `donasi_konfirmasi` (
  `id_detail` varchar(20) NOT NULL,
  `id_konfirmasi` int(11) NOT NULL,
  `id_konfirmasiPerpus` int(11) NOT NULL,
  `bukti_donasi` varchar(200) NOT NULL,
  `status_donasi` varchar(50) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `donatur_alamat`
--

CREATE TABLE `donatur_alamat` (
  `id_alamatDonaturAktif` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodePos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kebutuhan`
--

CREATE TABLE `kategori_kebutuhan` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpus_aktif`
--

CREATE TABLE `perpus_aktif` (
  `id_akunPerpus` int(11) NOT NULL,
  `email_perpus` varchar(100) NOT NULL,
  `password_perpus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi_buku`
--
ALTER TABLE `donasi_buku`
  ADD PRIMARY KEY (`id_donasiBuku`),
  ADD KEY `Kategori` (`id_kategoriKebutuhan`),
  ADD KEY `Donasi` (`id_loginDonatur`);

--
-- Indexes for table `donasi_detail`
--
ALTER TABLE `donasi_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_alamatPerpus to donasi_buku` (`id_alamatPerpus`),
  ADD KEY `id_donasi to id_donasiBuku` (`id_loginDonatur`);

--
-- Indexes for table `donasi_konfirmasi`
--
ALTER TABLE `donasi_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_detail to id_detail` (`id_detail`),
  ADD KEY `id_konfirmasiPerpus to id_akunPerpus` (`id_konfirmasiPerpus`);

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
  MODIFY `id_donasiBuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `donasi_konfirmasi`
--
ALTER TABLE `donasi_konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `perpus_aktif`
--
ALTER TABLE `perpus_aktif`
  MODIFY `id_akunPerpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `perpus_alamat`
--
ALTER TABLE `perpus_alamat`
  MODIFY `id_alamatPerpusAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi_buku`
--
ALTER TABLE `donasi_buku`
  ADD CONSTRAINT `Donasi` FOREIGN KEY (`id_loginDonatur`) REFERENCES `donatur_daftar` (`id_loginDonatur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Kategori` FOREIGN KEY (`id_kategoriKebutuhan`) REFERENCES `kategori_kebutuhan` (`id_kategori`) ON UPDATE CASCADE;

--
-- Constraints for table `donasi_detail`
--
ALTER TABLE `donasi_detail`
  ADD CONSTRAINT `id_alamatPerpus to donasi_buku` FOREIGN KEY (`id_alamatPerpus`) REFERENCES `perpus_daftar` (`id_alamatPerpus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_donasi to id_donasiBuku` FOREIGN KEY (`id_loginDonatur`) REFERENCES `donasi_buku` (`id_loginDonatur`) ON UPDATE CASCADE;

--
-- Constraints for table `donasi_konfirmasi`
--
ALTER TABLE `donasi_konfirmasi`
  ADD CONSTRAINT `id_detail to id_detail` FOREIGN KEY (`id_detail`) REFERENCES `donasi_detail` (`id_detail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_konfirmasiPerpus to id_akunPerpus` FOREIGN KEY (`id_konfirmasiPerpus`) REFERENCES `perpus_aktif` (`id_akunPerpus`) ON UPDATE CASCADE;

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
