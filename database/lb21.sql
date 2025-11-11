-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 04:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lb21`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul_film` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `jadwal_tayang` time NOT NULL,
  `tanggal_rilis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `genre`, `durasi`, `jadwal_tayang`, `tanggal_rilis`) VALUES
(1, 'Avengers: Endgame (pagi)', 'Action', 180, '07:00:00', '2025-11-10'),
(2, 'Avengers: Endgame (siang)', 'Action', 180, '12:00:00', '2025-11-10'),
(3, 'Avengers: Endgame (malam)', 'Action', 180, '19:00:00', '2025-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `email`, `no_hp`, `tanggal_daftar`) VALUES
(1, 'Andi Pratama', 'andi@gmail.com', '081234567890', '2025-01-10'),
(2, 'Budi Santoso', 'budi@yahoo.com', '081345678901', '2025-02-15'),
(3, 'Citra Lestari', 'citra@gmail.com', '081456789012', '2025-03-05'),
(4, 'Dwi Rahmawati', 'dwi@outlook.com', '081567890123', '2025-03-20'),
(5, 'Eko Saputra', 'eko@gmail.com', '081678901234', '2025-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `nomor_kursi` varchar(10) NOT NULL,
  `tanggal_menonton` date NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_member`, `id_film`, `nomor_kursi`, `tanggal_menonton`, `tanggal_pemesanan`, `harga`) VALUES
(1, 1, 1, 'A1', '2025-11-11', '2025-11-10', 50000.00),
(2, 1, 2, 'A2', '2025-11-11', '2025-11-11', 70000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_film` (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
