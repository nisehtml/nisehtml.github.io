-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 04:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dict_webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@example.com', '73003ff0b08ab250f6d1e24b1b64041a9bd4dd6cc92b34c6ab0d062405b99e1a');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'test', 'testdb@email.com', 'helloooo', '2023-11-21 09:42:29'),
(2, 'test', 'testdb@email.com', 'helloooo', '2023-11-21 09:46:11'),
(3, 'test', 'testdb@email.com', 'helloooo', '2023-11-21 09:46:16'),
(4, 'test2', 'testdb1@email.com', 'qweertyui', '2023-11-21 09:47:37'),
(5, 'test2', 'testdb1@email.com', 'erfwerwe', '2023-11-21 09:47:55'),
(6, 'test2', 'testdb1@email.com', 'fdsfsdfs', '2023-11-21 09:56:34'),
(7, 'test2', 'testdb1@email.com', 'gfjrj', '2023-11-21 09:58:01'),
(8, 'test2', 'testdb1@email.com', 'b', '2023-11-21 10:00:30'),
(9, 'hello', 'hello@email.com', 'gfg', '2023-11-21 10:02:43'),
(10, 'hello', 'hello@email.com', 'ii', '2023-11-21 10:03:58'),
(11, 'hello', 'hello@email.com', '1234', '2023-11-21 10:05:47'),
(12, 'hello', 'hello@email.com', '7896', '2023-11-21 10:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_address`) VALUES
(1, 'hello', 'hello@email.com', 'la fi'),
(2, 'update', 'update@rmail.com', 'cloud'),
(3, 'hello', 'hello@email.com', '34535345'),
(4, 'hello', 'hello@email.com', 'la fi'),
(5, 'hello', 'hello@email.com', 'la fi'),
(6, 'test2', 'hell0@email.com', 'fdsfsdfs'),
(7, 'hello', 'hello@email.com', 'la fi'),
(8, 'test2', 'testdb1@email.com', 'rwer'),
(9, 'test2', 'testdb1@email.com', 'ewewrwer'),
(10, 'test2trert', 'testdbtretert1@email.com', 'ewewrwer'),
(11, '4234234', 'hellorwerwe@email.com', 'la fiwerwerwe'),
(12, '4234234', 'hellorwerwe@email.com', 'DAVAO CITY'),
(13, '4234234', 'hellorwerwe@email.com', 'rwerwerwerrtw'),
(14, 'test195345345', 'test19@email.com', 'N/A53453'),
(15, 'testin', 'testin@eail.com', '13131'),
(16, 'testing', 'testing@ewrew.com', 'rerwer'),
(17, 'testing', 'testing@ewrew.com', 'rerwer'),
(18, '435', '435@dd.com', '234'),
(19, 'finaltest', 'finaltest@123.com', 'finaltest address'),
(20, 'test19', 'test19@email.com', 'DAVAO CITY');

-- --------------------------------------------------------

--
-- Table structure for table `keyboards`
--

CREATE TABLE `keyboards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keyboards`
--

INSERT INTO `keyboards` (`id`, `name`, `price`, `img`, `type`) VALUES
(1, 'Delux GM902 Wireless', '2295.00', 'img/ergo/DeluxGM902Wireless.jpg', 'ergo'),
(2, 'Lenovo Go Wireless Split', '7395.00', 'img/ergo/LenovoGo WirelessSplit.jpg', 'ergo'),
(3, 'Microsoft Wireless Sculpt', '5195.00', 'img/ergo/MicrosoftWirelessSculpt.jpg', 'ergo'),
(4, 'Dark Flash GD100', '1860.00', 'img/gaming/darkflashgd100.jpg', 'gaming'),
(5, 'Keychron K14', '4390.00', 'img/gaming/keychronk14.jpg', 'gaming'),
(6, 'Melgeek Mojo68', '10495.00', 'img/gaming/melgeekmojo68.jpg', 'gaming'),
(7, 'Logitech K380', '6396.00', 'img/productivity/LOGITECHK380.jpg', 'productivity'),
(8, 'Logitech MX Keys', '3145.00', 'img/productivity/LogitechMXKeys.jpg', 'productivity'),
(9, 'Logitech Slim MK470', '1600.00', 'img/productivity/LOGITECHSLIM.jpg', 'productivity');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT 0.00,
  `order_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `order_status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `customer_email`, `customer_address`, `total_amount`, `order_details`, `order_status`) VALUES
(1, 'zx', 'zx@email.com', 'DAVAO CITY', '1860.00', '[{\"product_name\":\"Dark Flash GD100\",\"product_price\":1860}]', 'Pending'),
(2, 'zx', 'zx@email.com', 'DAVAO CITY', '9541.00', '[{\"product_name\":\"Logitech MX Keys\",\"product_price\":3145},{\"product_name\":\"Logitech K380\",\"product_price\":6396}]', 'pending'),
(3, 'str', 'str@email.com', 'dav', '1860.00', '[{\"product_name\":\"Dark Flash GD100\",\"product_price\":1860}]', 'Completed'),
(4, 'test19', 'test19@email.com', 'N/A', '28525.00', '[{\"product_name\":\"Keychron K14\",\"product_price\":4390},{\"product_name\":\"Logitech MX Keys\",\"product_price\":3145},{\"product_name\":\"Melgeek Mojo68\",\"product_price\":10495},{\"product_name\":\"Melgeek Mojo68\",\"product_price\":10495}]', 'Pending'),
(5, 'test20', 'test20@email.com', 'DAVAO CITY', '7996.00', '[{\"product_name\":\"Logitech Slim MK470\",\"product_price\":1600},{\"product_name\":\"Logitech K380\",\"product_price\":6396}]', 'Pending'),
(6, 'PWC OF DAVAO', 'test23@email.com', 'N/A', '1600.00', '[{\"product_name\":\"Logitech Slim MK470\",\"product_price\":1600}]', 'Completed'),
(7, 'update', 'update@rmail.com', 'cloud', '4390.00', '[{\"product_name\":\"Keychron K14\",\"product_price\":4390}]', 'Completed'),
(13, 'finaltest', 'finaltest@123.com', 'finaltest address', '4390.00', '[{\"product_name\":\"Keychron K14\",\"product_price\":4390}]', 'Pending'),
(14, 'test19', 'test19@email.com', 'DAVAO CITY', '14885.00', '[{\"product_name\":\"Delux GM902 Wireless\",\"product_price\":2295},{\"product_name\":\"Lenovo Go Wireless Split\",\"product_price\":7395},{\"product_name\":\"Microsoft Wireless Sculpt\",\"product_price\":5195}]', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `keyboards`
--
ALTER TABLE `keyboards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `keyboards`
--
ALTER TABLE `keyboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
