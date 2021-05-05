-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2021 at 11:09 AM
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
-- Table structure for table `donatur_aktif`
--

CREATE TABLE `donatur_aktif` (
  `id_akunDonaturAktif` int(11) NOT NULL,
  `email_donatur` varchar(100) NOT NULL,
  `password_donatur` varchar(100) NOT NULL,
  `isActive` int(1) NOT NULL
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
  `password_donatur` varchar(100) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `noTelepon_donatur` varchar(20) NOT NULL,
  `tglLahir_donatur` date NOT NULL,
  `id_alamatDonatur` int(11) NOT NULL,
  `instansi_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpus_aktif`
--

CREATE TABLE `perpus_aktif` (
  `id_akunPerpus` int(11) NOT NULL,
  `email_perpus` varchar(100) NOT NULL,
  `password_perpus` varchar(100) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpus_alamat`
--

CREATE TABLE `perpus_alamat` (
  `id_alamatPurpusAktif` int(11) NOT NULL,
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
  `id_Perpus` int(11) NOT NULL,
  `id_loginPerpus` int(11) NOT NULL,
  `email_perpus` varchar(100) NOT NULL,
  `password_perpus` varchar(100) NOT NULL,
  `namaPengelola_perpus` varchar(100) NOT NULL,
  `nama_perpus` varchar(100) NOT NULL,
  `tahunBerdiri_perpus` varchar(50) NOT NULL,
  `noIzin_perpus` int(50) NOT NULL,
  `id_alamatPerpus` int(11) NOT NULL,
  `noTelepon_perpus` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `perpus_aktif`
--
ALTER TABLE `perpus_aktif`
  ADD PRIMARY KEY (`id_akunPerpus`);

--
-- Indexes for table `perpus_alamat`
--
ALTER TABLE `perpus_alamat`
  ADD PRIMARY KEY (`id_alamatPurpusAktif`);

--
-- Indexes for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  ADD PRIMARY KEY (`id_Perpus`),
  ADD KEY `Memiliki Akun Mitra` (`id_loginPerpus`),
  ADD KEY `Memiliki Alamat Mitra` (`id_alamatPerpus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donatur_aktif`
--
ALTER TABLE `donatur_aktif`
  MODIFY `id_akunDonaturAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donatur_alamat`
--
ALTER TABLE `donatur_alamat`
  MODIFY `id_alamatDonaturAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donatur_daftar`
--
ALTER TABLE `donatur_daftar`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perpus_aktif`
--
ALTER TABLE `perpus_aktif`
  MODIFY `id_akunPerpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perpus_alamat`
--
ALTER TABLE `perpus_alamat`
  MODIFY `id_alamatPurpusAktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  MODIFY `id_Perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donatur_daftar`
--
ALTER TABLE `donatur_daftar`
  ADD CONSTRAINT `Memiliki Akun` FOREIGN KEY (`id_loginDonatur`) REFERENCES `donatur_aktif` (`id_akunDonaturAktif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Alamat` FOREIGN KEY (`id_alamatDonatur`) REFERENCES `donatur_alamat` (`id_alamatDonaturAktif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perpus_daftar`
--
ALTER TABLE `perpus_daftar`
  ADD CONSTRAINT `Memiliki Akun Mitra` FOREIGN KEY (`id_loginPerpus`) REFERENCES `perpus_aktif` (`id_akunPerpus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Alamat Mitra` FOREIGN KEY (`id_alamatPerpus`) REFERENCES `perpus_alamat` (`id_alamatPurpusAktif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
