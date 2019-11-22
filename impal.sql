-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 04:56 PM
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
-- Table structure for table `barang_terjual`
--

CREATE TABLE `barang_terjual` (
  `id_barang` char(6) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `keterangan_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `harga_barang` int(10) DEFAULT NULL,
  `jumlah_barang` int(5) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_terjual`
--

INSERT INTO `barang_terjual` (`id_barang`, `nama_barang`, `keterangan_barang`, `jenis_barang`, `harga_barang`, `jumlah_barang`, `tanggal`) VALUES
('brg001', 'oreo', 'Kosong', 'makanan', 1000, 45, '0000-00-00'),
('brg002', 'fanta', 'Kosong', 'minuman', 2004, 20, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_tersedia`
--

CREATE TABLE `barang_tersedia` (
  `id_barang` char(6) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `keterangan_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `harga_barang` int(10) DEFAULT NULL,
  `jumlah_barang` int(5) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_tersedia`
--

INSERT INTO `barang_tersedia` (`id_barang`, `nama_barang`, `keterangan_barang`, `jenis_barang`, `harga_barang`, `jumlah_barang`, `tanggal`) VALUES
('brg001', 'oreo', 'Available', 'makanan', 1000, 90, '2019-11-13'),
('brg003', 'qwe', 'Available', 'qwe', 123, 123123, '2019-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `username` char(10) NOT NULL,
  `username_pemilik` char(10) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`username`, `username_pemilik`, `password`, `role`, `nama`, `alamat`, `umur`) VALUES
('hafikeren1', 'yuleo12345', 'wilda', 2, 'hafiyy viazola', 'Cijaura Barat No.5', 20),
('rifkuy1234', 'yuleo12345', 'nadia', 2, 'rifky rivaldi', 'Baleendah No.7', 21),
('rizalgg123', 'yuleo12345', 'nadilla', 2, 'rizal kusuma', 'Setiabudi No.20', 20);

-- --------------------------------------------------------

--
-- Table structure for table `mengelola`
--

CREATE TABLE `mengelola` (
  `username_karyawan` char(10) DEFAULT NULL,
  `id_barang` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `username` char(10) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`username`, `password`, `role`, `nama`, `alamat`, `umur`) VALUES
('nauffan123', 'naura', 1, 'Nauffa M', 'Cibadak No.7', 21),
('wisnugg123', 'wishno', 1, 'Wishnu Dwi', 'Buahbatu No.20', 20),
('yuleo12345', 'juki', 1, 'farhan yuleo', 'Cijaura timur No.5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_barang` char(6) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `keterangan_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `jumlah_barang` int(5) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_barang`, `nama_barang`, `keterangan_barang`, `jenis_barang`, `jumlah_barang`, `tanggal`) VALUES
('brg001', 'oreo', 'Kosong', 'makanan', 123, '2019-11-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_terjual`
--
ALTER TABLE `barang_terjual`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_tersedia`
--
ALTER TABLE `barang_tersedia`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`username`),
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
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `username_pemilik_fk` FOREIGN KEY (`username_pemilik`) REFERENCES `pemilik` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `mengelola`
--
ALTER TABLE `mengelola`
  ADD CONSTRAINT `id_barang_fk` FOREIGN KEY (`id_barang`) REFERENCES `barang_tersedia` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `username_karyawan_fk` FOREIGN KEY (`username_karyawan`) REFERENCES `karyawan` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
