-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 05:11 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klpcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpjp`
--

CREATE TABLE `dpjp` (
  `id` int(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpjp`
--

INSERT INTO `dpjp` (`id`, `nama_dokter`) VALUES
(1, 'Andi'),
(2, 'Lili'),
(3, 'Sophie'),
(4, 'Budi');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama`) VALUES
(1, 'BP'),
(2, 'KIA'),
(3, 'Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` int(255) NOT NULL,
  `tanggal` int(255) NOT NULL,
  `no_rm` int(255) NOT NULL,
  `dpjp` int(255) NOT NULL,
  `poli` int(8) NOT NULL,
  `jenis_rm` int(8) NOT NULL,
  `identitas` int(8) NOT NULL,
  `anamnesa` int(8) NOT NULL,
  `pemeriksaan` int(8) NOT NULL,
  `diagnosa` int(8) NOT NULL,
  `terapi` int(8) NOT NULL,
  `paraf` int(8) NOT NULL,
  `indikator` int(8) NOT NULL,
  `kelengkapan` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `tanggal`, `no_rm`, `dpjp`, `poli`, `jenis_rm`, `identitas`, `anamnesa`, `pemeriksaan`, `diagnosa`, `terapi`, `paraf`, `indikator`, `kelengkapan`) VALUES
(7, 1575759600, 112, 2, 3, 1, 1, 1, 1, 1, 1, 1, 6, 1),
(8, 1575759600, 242, 3, 2, 2, 1, 1, 1, 1, 0, 1, 5, 0),
(9, 1575759600, 696, 1, 1, 2, 1, 1, 1, 1, 1, 1, 6, 1),
(10, 1575759600, 232, 3, 2, 1, 1, 1, 1, 1, 1, 1, 6, 1),
(11, 1575759600, 252, 4, 3, 1, 1, 0, 1, 1, 1, 1, 5, 0),
(12, 1575759600, 211, 4, 2, 2, 1, 1, 1, 1, 0, 1, 5, 0),
(13, 1575759600, 692, 3, 1, 2, 1, 1, 1, 1, 1, 1, 6, 1),
(14, 1575759600, 421, 3, 2, 1, 1, 1, 1, 1, 1, 1, 6, 1),
(15, 1575759600, 232, 2, 3, 1, 1, 1, 1, 1, 1, 1, 6, 1),
(16, 1575759600, 521, 1, 2, 2, 1, 1, 1, 1, 0, 1, 5, 0),
(17, 1575759600, 695, 3, 1, 2, 1, 1, 1, 1, 0, 1, 5, 0),
(18, 1575759600, 521, 3, 2, 1, 1, 1, 1, 1, 1, 1, 6, 1),
(19, 1575759600, 452, 2, 3, 1, 1, 0, 1, 1, 1, 1, 5, 0),
(20, 1575759600, 201, 2, 2, 2, 1, 1, 1, 1, 0, 1, 5, 0),
(21, 1575759600, 622, 3, 1, 2, 1, 1, 1, 1, 1, 1, 6, 1),
(22, 1575759600, 426, 3, 2, 1, 1, 1, 1, 0, 1, 1, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dpjp`
--
ALTER TABLE `dpjp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dpjp`
--
ALTER TABLE `dpjp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
