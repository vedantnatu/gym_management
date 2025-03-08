-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 08:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `mem`
--

CREATE TABLE `mem` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `membershiptype` char(10) NOT NULL,
  `dt` date DEFAULT NULL,
  `sex` char(10) NOT NULL,
  `fee` int(10) NOT NULL,
  `pack` varchar(10) NOT NULL,
  `expiryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mem`
--

INSERT INTO `mem` (`id`, `name`, `email`, `phone`, `membershiptype`, `dt`, `sex`, `fee`, `pack`, `expiryDate`) VALUES
(16, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 2147483647, 'gold', '2023-11-14', 'basic', 0, '', NULL),
(17, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 2147483647, 'gold', '2023-11-14', 'basic', 0, '', NULL),
(19, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 2147483647, 'platinum', '2023-11-16', 'male', 8000, 'yearly', '2024-11-16'),
(20, 'ved', 's21_natu_vedant@mgmcen.ac.in', 1234567890, 'basic', '2023-11-14', 'male', 5000, '', NULL),
(23, 'vai', 'vai@gmail.com', 2147483647, 'basic', '2023-11-15', 'female', 5000, 'monthly', '2023-12-15'),
(24, 'natu vai', 'vai@gmail.com', 1234567890, 'gold', '2023-12-10', 'female', 8000, 'yearly', '2024-12-10'),
(25, 'vid', 'vid@gmail.com', 1234567890, 'gold', '2023-11-16', 'female', 2000, 'quaterly', '2023-11-15'),
(26, 'vid', 'vai@gmail.com', 1234567890, 'gold', '2023-11-16', 'female', 3000, 'quaterly', '2023-11-15'),
(27, 'vid', 'vai@gmail.com', 1234567890, 'gold', '2023-11-16', 'female', 3000, 'quaterly', '2023-11-15'),
(49, 'swati', 'swati@gmail.com', 2147483647, 'gold', '2024-01-01', 'female', 450, 'yearly', '2025-01-01'),
(50, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 940490930, 'platinum', '2024-01-18', 'male', 5000, 'yearly', '2025-01-18'),
(51, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 1234567890, 'platinum', '2024-01-18', 'male', 5000, 'yearly', '2025-01-18'),
(71, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 2147483647, 'silver', '2024-01-19', 'male', 20, 'yearly', '2025-01-19'),
(72, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 2147483647, 'silver', '2024-01-19', 'male', 5000, 'yearly', '2025-01-19'),
(73, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 940490937, 'silver', '2024-01-02', 'male', 5000, 'yearly', '2025-01-02'),
(74, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 940490937, 'gold', '2024-01-01', 'male', 5000, 'yearly', '2025-01-01'),
(75, 'Vedant Natu', 's21_natu_vedant@mgmcen.ac.in', 940490937, 'gold', '2024-01-01', 'male', 5000, 'yearly', '2025-01-01'),
(76, 'piyush', 'vedantvnatu@gmail.com', 940490937, 'gold', '2024-01-19', 'male', 545, 'yearly', '2025-01-19'),
(77, 'piyush', 'vedantvnatu@gmail.com', 940490937, 'gold', '2024-01-19', 'male', 545, 'yearly', '2025-01-19'),
(78, 'aniket', 'karwa@gmail.com', 983458539, 'gold', '2024-01-08', 'male', 2000, 'yearly', '2025-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mem`
--
ALTER TABLE `mem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mem`
--
ALTER TABLE `mem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
