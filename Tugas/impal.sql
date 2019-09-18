-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 03:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impal`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(6) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `keterangan_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `harga_barang` int(10) DEFAULT NULL,
  `jumlah_barang` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan_barang`, `jenis_barang`, `harga_barang`, `jumlah_barang`) VALUES
('brg001', 'oreo', 'available', 'makanan', 10000, 50),
('brg002', 'fanta', 'available', 'minuman', 5000, 30),
('brg003', 'tango', 'available', 'makanan', 7000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `username_karyawan` char(10) NOT NULL,
  `username_pemilik` char(10) DEFAULT NULL,
  `password_karyawan` varchar(15) DEFAULT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `alamat_karyawan` varchar(255) DEFAULT NULL,
  `umur_karyawan` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`username_karyawan`, `username_pemilik`, `password_karyawan`, `nama_karyawan`, `alamat_karyawan`, `umur_karyawan`) VALUES
('hafikeren1', 'yuleo12345', 'wilda', 'hafiyy viazola', 'Cijaura Barat No.5', 20),
('rifkuy1234', 'yuleo12345', 'nadia', 'rifky rivaldi', 'Baleendah No.7', 21),
('rizalgg123', 'yuleo12345', 'nadilla', 'rizal kusuma', 'Setiabudi No.20', 20);

-- --------------------------------------------------------

--
-- Table structure for table `mengelola`
--

CREATE TABLE `mengelola` (
  `username_karyawan` char(10) DEFAULT NULL,
  `id_barang` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengelola`
--

INSERT INTO `mengelola` (`username_karyawan`, `id_barang`) VALUES
('hafikeren1', 'brg001'),
('rizalgg123', 'brg002'),
('rifkuy1234', 'brg003');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `username_pemilik` char(10) NOT NULL,
  `password_pemilik` varchar(15) DEFAULT NULL,
  `nama_pemilik` varchar(255) DEFAULT NULL,
  `alamat_pemilik` varchar(255) DEFAULT NULL,
  `umur_pemilik` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`username_pemilik`, `password_pemilik`, `nama_pemilik`, `alamat_pemilik`, `umur_pemilik`) VALUES
('nauffan123', 'naura', 'Nauffa M', 'Cibadak No.7', 21),
('wisnugg123', 'wishno', 'Wishnu Dwi', 'Buahbatu No.20', 20),
('yuleo12345', 'juki', 'farhan yuleo', 'Cijaura timur No.5', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`username_karyawan`),
  ADD KEY `username_pemilik_fk` (`username_pemilik`);

--
-- Indexes for table `mengelola`
--
ALTER TABLE `mengelola`
  ADD KEY `username_karyawan_fk` (`username_karyawan`),
  ADD KEY `id_barang_fk` (`id_barang`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`username_pemilik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `username_pemilik_fk` FOREIGN KEY (`username_pemilik`) REFERENCES `pemilik` (`username_pemilik`) ON DELETE CASCADE;

--
-- Constraints for table `mengelola`
--
ALTER TABLE `mengelola`
  ADD CONSTRAINT `id_barang_fk` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `username_karyawan_fk` FOREIGN KEY (`username_karyawan`) REFERENCES `karyawan` (`username_karyawan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
