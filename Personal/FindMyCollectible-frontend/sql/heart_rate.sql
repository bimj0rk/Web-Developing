-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2022 at 01:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `heart_rate`
--

CREATE TABLE `heart_rate` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `sys` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `bpm` int(11) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heart_rate`
--

INSERT INTO `heart_rate` (`id`, `date`, `sys`, `dia`, `bpm`, `user`) VALUES
(10, '20.05.2022', 100, 90, 85, 'Adrian'),
(11, '21.05.2022', 120, 70, 85, 'Adrian'),
(12, '29.05.2022', 120, 70, 90, 'Victor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heart_rate`
--
ALTER TABLE `heart_rate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heart_rate`
--
ALTER TABLE `heart_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
