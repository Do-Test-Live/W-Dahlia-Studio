-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 02:12 PM
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
(2, 'Super Admin', '103.107.160.134', 'public/images/avatar-01.jpg', 'admin@dahlia.com', '@BCD1234', 'admin', '2023-08-01 09:41:01');

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
-- Table structure for table `booked_schedule`
--

CREATE TABLE `booked_schedule` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booked_date` date NOT NULL,
  `booked_time` time NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule_limit`
--

CREATE TABLE `class_schedule_limit` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `class_number` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `membership_point` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email`, `number`, `address`, `city`, `zip_code`, `password`, `profile_image`, `membership_point`, `inserted_at`, `updated_at`) VALUES
(1, 'Test User', 'test@test.com', '00000000', '', '', '', '@BCD1234', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(10, '2023-08-22', '0000-00-00 00:00:00'),
(11, '2023-08-14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `date`, `time_start`, `time_end`, `inserted_at`) VALUES
(20, '2023-08-22', '19:48:00', '20:48:00', '2023-08-06 11:44:57'),
(21, '2023-08-22', '00:00:00', '00:00:00', '2023-08-06 11:44:57'),
(22, '2023-08-22', '00:00:00', '00:00:00', '2023-08-06 11:44:57'),
(23, '2023-08-22', '00:00:00', '00:00:00', '2023-08-06 11:44:57'),
(24, '2023-08-22', '04:04:00', '05:04:00', '2023-08-06 11:44:57'),
(25, '2023-08-22', '00:00:00', '00:00:00', '2023-08-06 11:44:57'),
(26, '2023-08-22', '00:00:00', '00:00:00', '2023-08-06 11:44:57'),
(27, '2023-08-22', '00:00:00', '00:00:00', '2023-08-06 11:44:57'),
(28, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06'),
(29, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06'),
(30, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06'),
(31, '2023-08-14', '17:50:00', '18:50:00', '2023-08-06 11:50:06'),
(32, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06'),
(33, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06'),
(34, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06'),
(35, '2023-08-14', '00:00:00', '00:00:00', '2023-08-06 11:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_checkout_session_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `billing_id`, `customer_name`, `customer_email`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `stripe_checkout_session_id`, `created`, `modified`) VALUES
(1, 100, 'Test', 'test@test.com', '1小時30分鐘租場服務', 'DP12345', 190.00, 'hkd', 180.00, 'hkd', 'pi_3NaCqbDPX938f2061qZhTQRh', 'succeeded', 'cs_test_a1WSCFZE1s5eZrLqh46hoF5Ec29IgkEiX1ltlN1Ec9MHjpc557rCQ2CEFC', '2023-08-01 13:18:27', '2023-08-01 13:18:27'),
(2, 1, 'Test', 'test@test.com', '1小時30分鐘租場服務', 'DP12345', 190.00, 'hkd', 108.00, 'hkd', 'pi_3NaF2DDPX938f2062ylaqCDH', 'succeeded', 'cs_test_a1W89GaABzrKqMxnxl6KZUoxGKMkh4WRFJgzzOOsSMwEKcQ6sYH48395qx', '2023-08-01 15:38:37', '2023-08-01 15:38:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_schedule`
--
ALTER TABLE `booked_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedule_limit`
--
ALTER TABLE `class_schedule_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `booked_schedule`
--
ALTER TABLE `booked_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_schedule_limit`
--
ALTER TABLE `class_schedule_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `date_slot`
--
ALTER TABLE `date_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
