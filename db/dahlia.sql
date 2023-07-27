-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 10:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dahlia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `updated_at`) VALUES
(1, 'Monoget Saha', '27.147.190.199', 'public/images/profile/monoget.png', 'monoget1@gmail.com', '@BCD1234', 'admin', '2022-02-06 11:16:17'),
(2, 'Super Admin', '103.107.160.134', 'public/images/avatar-01.jpg', 'test@dahlia.com', '@BCD1234', 'admin', '2023-07-27 07:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `date_slot`
--

CREATE TABLE `date_slot` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date_slot`
--

INSERT INTO `date_slot` (`id`, `date`, `inserted_at`) VALUES
(1, '2023-07-27', '0000-00-00 00:00:00'),
(2, '2023-07-27', '0000-00-00 00:00:00'),
(3, '2023-07-28', '0000-00-00 00:00:00'),
(4, '2023-07-29', '0000-00-00 00:00:00'),
(5, '2023-07-29', '0000-00-00 00:00:00'),
(6, '2023-07-29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `description` varchar(200) NOT NULL,
  `package` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `date`, `time_start`, `time_end`, `description`, `package`, `level`, `color`, `inserted_at`) VALUES
(1, '0000-00-00', '14:05:00', '17:02:00', 'jkljk', 'jklj', 'ukujk', '#ff1f1f', '2023-07-27 10:03:21'),
(2, '0000-00-00', '14:07:00', '18:02:00', 'mkl;', 'afef', 'afds', '#5dde17', '2023-07-27 10:03:21'),
(3, '0000-00-00', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:03:21'),
(4, '0000-00-00', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:03:21'),
(5, '0000-00-00', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:03:21'),
(6, '0000-00-00', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:03:21'),
(7, '0000-00-00', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:03:21'),
(8, '0000-00-00', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:03:21'),
(9, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26'),
(10, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26'),
(11, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26'),
(12, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26'),
(13, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26'),
(14, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26'),
(15, '2023-07-29', '18:08:00', '17:07:00', 'rghdrthg', 'rggr', 'gxzrgr', '#b71f1f', '2023-07-27 10:05:26'),
(16, '2023-07-29', '00:00:00', '00:00:00', '', '', '', '#000000', '2023-07-27 10:05:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_slot`
--
ALTER TABLE `date_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `date_slot`
--
ALTER TABLE `date_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
