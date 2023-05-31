-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 04:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosan`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `idadmin` int(11) NOT NULL,
  `emailadmin` varchar(50) NOT NULL,
  `passwordadmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`idadmin`, `emailadmin`, `passwordadmin`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `idbayar` int(11) NOT NULL,
  `idkamar` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tanggalselesai` date DEFAULT NULL,
  `statuss` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(11) NOT NULL,
  `idkamar` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggalbooking` date NOT NULL,
  `tanggalhuni` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `kamarpa1`
--

CREATE TABLE `kamarpa1` (
  `idkamar` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `nomorkamar` varchar(10) NOT NULL,
  `fasilitas` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `kamarpa1`
--

INSERT INTO `kamarpa1` (`idkamar`, `iduser`, `nomorkamar`, `fasilitas`, `status`, `harga`, `foto`) VALUES
(24, 0, '10', 'Kamar mandi dalam, kasur, lemari, meja, kursi, free air, free listrik, free wifi.', 'Tersedia', 7500000, '5fec9de64c8af.jpg'),
(25, 22, '2', 'Kamar mandi dalam, kasur, lemari, meja, kursi, free air, free listrik, free wifi.', 'Tersedia', 7500000, '5fec9e188bcfa.jpg'),
(26, 0, '3', 'Kamar mandi luar, kasur, lemari, meja, kursi, free air, free listrik, free wifi.', 'Tersedia', 7000000, '5fec9e595d09b.jpg'),
(27, 0, '4', 'Kamar mandi luar, kasur, lemari, meja, kursi, free air, free listrik, free wifi.', 'Tersedia', 7000000, '5fec9e89a60dd.jpg'),
(28, 22, '5', 'Kamar mandi dalam, kasur, lemari, meja, kursi, free air, free listrik, free wifi.', 'Tidak Tersedia', 7700000, '5fec9eb82fb9a.jpg'),
(29, 0, '6', 'Kamar mandi luar, kasur, meja, kursi, free air, free listrik, free wifi.', 'Tersedia', 6900000, '5fec9f0a8d304.jpg'),
(30, 0, '7', 'Kamar mandi dalam, kasur, lemari, meja, kursi, free air, free listrik, free wifi.', 'Tersedia', 7700000, '5fec9f88438d3.jpg'),
(31, 0, '8', 'Kamar mandi luar, kasur, lemari, meja, free air, free listrik, free wifi.', 'Tersedia', 7200000, '5fec9fd326cab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keluhanpa1`
--

CREATE TABLE `keluhanpa1` (
  `idkeluhan` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idkamar` int(11) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `keluhanpa1`
--

INSERT INTO `keluhanpa1` (`idkeluhan`, `iduser`, `idkamar`, `isi`) VALUES
(39, 22, 26, 'mengeluh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `namalengkap` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `namalengkap`, `email`, `password`, `nohp`) VALUES
(22, 'dhea anggita', 'dhea.anggita18@gmail.com', '$2y$10$O4K1VfZjLxSReEXfmGXZV.Ag0KMtj9v2sGm9ILMV18J6WkJpvTLUu', '083107581363'),
(23, 'deadea', 'dea@gmail.com', '$2y$10$kk/tVp6ptqubxCClVyLSqupiPakJMytxZzdoOABCEqmQ6221xPIBO', '083888888888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`idbayar`),
  ADD KEY `idkamar` (`idkamar`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD KEY `idkamar` (`idkamar`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `kamarpa1`
--
ALTER TABLE `kamarpa1`
  ADD PRIMARY KEY (`idkamar`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `keluhanpa1`
--
ALTER TABLE `keluhanpa1`
  ADD PRIMARY KEY (`idkeluhan`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idkamar` (`idkamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kamarpa1`
--
ALTER TABLE `kamarpa1`
  MODIFY `idkamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `keluhanpa1`
--
ALTER TABLE `keluhanpa1`
  MODIFY `idkeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
