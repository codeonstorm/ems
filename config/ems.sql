-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2023 at 06:51 PM
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
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `uuid` varchar(60) NOT NULL,
  `organiser_id` bigint(20) NOT NULL,
  `organiser_name` varchar(30) NOT NULL,
  `title` text NOT NULL,
  `description` longtext DEFAULT NULL,
  `event_email` varchar(60) NOT NULL,
  `event_mobile` int(10) UNSIGNED NOT NULL,
  `venue` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `banner` varchar(60) DEFAULT NULL,
  `accepted_policy` tinyint(1) NOT NULL,
  `total_views` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `uuid`, `organiser_id`, `organiser_name`, `title`, `description`, `event_email`, `event_mobile`, `venue`, `start_time`, `end_time`, `banner`, `accepted_policy`, `total_views`, `status`, `created_at`, `updated_at`) VALUES
(14, 'cfef7ee398c2b3733335c9be3445a18c', 1, 'Global Startup Ecosystem', 'India Tech Summit', 'India Tech Summit is an international program featuring global speakers and partners passionate about the future of India. The central theme of the global summit is to “catalyze entrepreneurial and business ecosystems in emerging markets”.\r\n\r\nThe multi year event is a 13- year initiative of the Global Startup Ecosystem which brings together hundreds of entrepreneurs, investors, digital marketers and creatives together in to targeted cities around the world to accelerate tech, innovation and economic development within the host country.\r\n\r\n', '', 12333334, 'Location\r\nNew Delhi\r\n\r\nLocation TBA New Delhi, DL\r\n', '2023-11-25 11:39:00', '2023-11-29 11:39:00', '4ebbaf7be5d90b2183975be801287fc3.jpeg', 1, 7, 1, '2023-11-29 07:11:21', '2023-11-29 07:11:21'),
(15, '21a76bad9ad1d67c03da05242720e69f', 1, 'Exhibitions India Group', 'Startup Hub Expo 2024', 'As the largest startup exhibition in India, this expo is a game-changer.\r\n', '', 12333334, 'Pragati Maidan\r\n</br>\r\nPragati Maidan New Delhi, DL 110001', '2023-12-14 22:06:00', '2023-12-15 22:06:00', '23cc84d3f5fdd7d36b1924062f9e9a81.jpeg', 1, 0, 1, '2023-11-30 05:11:56', '2023-11-30 05:11:56'),
(21, 'a3912968404a164d2225c7862c13ee9c', 1, 'INDIAN ENTREPRENEUR', 'New Delhi\'s Big Business Tech & Entrepreneur Professional Networking Affair', 'New Delhi\'s Big Business Tech & Entrepreneur Professional Networking Affair\r\n', 'ankit@gmail.com', 12333334, 'Food Court - Pacific Mall Tagore Garden\r\n</br>\r\nNajafgarh Rd, Tagore Garden Tilak Nagar New Delhi, New Delhi 110018', '2023-12-22 22:17:00', '2023-12-23 22:17:00', '890b521091a486b588139e21dfc47fcb.jpeg', 1, 0, 1, '2023-11-30 06:11:33', '2023-11-30 06:11:33'),
(22, '8924495b57ec2aa8385b22ae874f03bb', 1, 'EFEEXIM and Managed by TRESCON', 'INTERNATIONAL INTERIORS & FURNITURE FAIR 2023', 'https://iiffglobal.com/delhi/', 'a@hh.b', 12333334, 'Online', '2023-12-21 22:35:00', '2023-12-22 22:35:00', 'b4f36ec3c28fbb015e4a8f4edb7a3d91.jpeg', 1, 0, 1, '2023-11-30 06:11:05', '2023-11-30 06:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `mobile`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ankit', 'ankit', 'admin@gmail.com', 12345678, '$2y$10$ZOhEFu7MsxcEMkmnIBtd1.vxA/ew23nUl2OX1eDnCeoQm.C6yf1Sy', '2023-11-27 06:11:45', '2023-11-27 06:11:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
