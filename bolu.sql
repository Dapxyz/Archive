-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2024 at 10:32 PM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolu`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `resi` varchar(20) NOT NULL,
  `deliveryDate` date NOT NULL DEFAULT curdate(),
  `status` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `metode_pembayaran`, `resi`, `deliveryDate`, `status`, `alamat`) VALUES
(11, 'Transfer Bank', 'RS324431', '2024-01-16', 'Terkirim', ''),
(24, 'COD', 'RS401966', '2024-01-16', 'Dikirim', ' banjar'),
(27, 'COD', 'RS633915', '2024-01-15', 'Dikemas', 'kepo '),
(31, 'Transfer Bank', 'RS418832', '2024-01-16', 'Dikemas', 'Kepo ih '),
(32, 'COD', 'RS612171', '2024-01-16', 'Dikemas', ' kp cipongporang desa serang mekar kecamatan ciparay bandung 40381'),
(33, 'COD', 'RS834483', '2024-01-16', 'Dikemas', 'ciparay ');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `cakeType` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `deliveryDate` date NOT NULL,
  `price` int(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `cakeType`, `quantity`, `deliveryDate`, `price`, `message`, `alamat`) VALUES
(11, 'Bolu Pisang', 3, '2023-12-29', 60000, 'pakai', ''),
(24, 'Bolu Pisang', 2, '2024-01-15', 1000, 'yow', ' banjar'),
(27, 'Bolu Ketan', 2, '2024-01-16', 120000, 'mantap', 'kepo '),
(31, 'Bolu Pandan', 2, '2024-01-17', 5000, 'gaada', 'Kepo ih '),
(32, 'Bolu Original', 2, '2024-01-19', 20000, 'rasa original pake messes', ' kp cipongporang desa serang mekar kecamatan ciparay bandung 40381'),
(33, 'Bolu Pisang', 1, '2024-01-16', 2000, 'gaada', 'ciparay ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(2, 'admin', 'admin', 'admin@mail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9'),
(3, 'User', 'user', 'user@mail.com', 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446'),
(8, 'Akhyar Azamta', 'akhyarazamta', 'ervan@akhyar.azamta.my.id', '447f448e70b29014b9eaf0d23724f913d06a42497883b6d9e1a7d630d3f89b9c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_pengiriman_pesan` FOREIGN KEY (`id`) REFERENCES `pesan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
