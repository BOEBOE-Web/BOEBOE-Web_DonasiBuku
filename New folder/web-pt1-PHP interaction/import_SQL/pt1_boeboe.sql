-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2021 at 09:21 AM
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
-- Database: `pt1_boeboe`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_donatur`
--

CREATE TABLE `alamat_donatur` (
  `id_alamat` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota_kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode pos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_donatur`
--

INSERT INTO `alamat_donatur` (`id_alamat`, `provinsi`, `kota_kabupaten`, `kecamatan`, `kode pos`) VALUES
(9, 'Sumatera Utara', 'Langkat', 'Kuala', 20772);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_donatur`
--

CREATE TABLE `daftar_donatur` (
  `id_donatur` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `email_donatur` varchar(100) NOT NULL,
  `password_donatur` varchar(100) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `nomorHP_donatur` varchar(20) NOT NULL,
  `tanggalLahir_donatur` date NOT NULL,
  `idAlamat_donatur` int(11) NOT NULL,
  `instansi_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_donatur`
--

INSERT INTO `daftar_donatur` (`id_donatur`, `id_login`, `email_donatur`, `password_donatur`, `nama_donatur`, `nomorHP_donatur`, `tanggalLahir_donatur`, `idAlamat_donatur`, `instansi_donatur`) VALUES
(4, 9, 'rief@gmail.com', '1234', 'Arief Yusuf Winata', '087762626562', '2021-04-03', 9, 'Perorangan');

-- --------------------------------------------------------

--
-- Table structure for table `donatur_aktif`
--

CREATE TABLE `donatur_aktif` (
  `id_akun` int(11) NOT NULL,
  `email_donatur` varchar(100) NOT NULL,
  `password_donatur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur_aktif`
--

INSERT INTO `donatur_aktif` (`id_akun`, `email_donatur`, `password_donatur`) VALUES
(9, 'rief@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_donatur`
--
ALTER TABLE `alamat_donatur`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `daftar_donatur`
--
ALTER TABLE `daftar_donatur`
  ADD PRIMARY KEY (`id_donatur`),
  ADD KEY `Memiliki Akun` (`id_login`),
  ADD KEY `Memiliki Alamat` (`idAlamat_donatur`);

--
-- Indexes for table `donatur_aktif`
--
ALTER TABLE `donatur_aktif`
  ADD PRIMARY KEY (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_donatur`
--
ALTER TABLE `alamat_donatur`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daftar_donatur`
--
ALTER TABLE `daftar_donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donatur_aktif`
--
ALTER TABLE `donatur_aktif`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_donatur`
--
ALTER TABLE `daftar_donatur`
  ADD CONSTRAINT `Memiliki Akun` FOREIGN KEY (`id_login`) REFERENCES `donatur_aktif` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Memiliki Alamat` FOREIGN KEY (`idAlamat_donatur`) REFERENCES `alamat_donatur` (`id_alamat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
