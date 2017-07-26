-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 26, 2017 at 12:10 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moes_test`
--
CREATE DATABASE IF NOT EXISTS `moes_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `moes_test`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `order_date` date DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `order_cost` float(10,2) DEFAULT NULL,
  `autoship` tinyint(4) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`order_date`, `order_number`, `order_cost`, `autoship`, `id`) VALUES
('2011-02-02', 12, 1.00, 0, 207),
('2012-03-03', 13, 2.00, 0, 208);

-- --------------------------------------------------------

--
-- Table structure for table `carts_products`
--

CREATE TABLE `carts_products` (
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts_products`
--

INSERT INTO `carts_products` (`cart_id`, `product_id`, `id`) VALUES
(13, 1, 1),
(14, 2, 2),
(14, 3, 3),
(29, 18, 4),
(30, 19, 5),
(30, 20, 6),
(45, 35, 7),
(46, 36, 8),
(46, 37, 9),
(61, 52, 10),
(62, 53, 11),
(62, 54, 12),
(77, 69, 13),
(78, 70, 14),
(78, 71, 15),
(93, 86, 16),
(94, 87, 17),
(94, 88, 18),
(109, 103, 19),
(110, 104, 20),
(110, 105, 21),
(125, 120, 22),
(126, 121, 23),
(126, 122, 24),
(141, 137, 25),
(142, 138, 26),
(142, 139, 27),
(157, 154, 28),
(158, 155, 29),
(158, 156, 30),
(173, 171, 31),
(174, 172, 32),
(174, 173, 33),
(189, 188, 34),
(190, 189, 35),
(190, 190, 36),
(205, 205, 37),
(206, 206, 38),
(206, 207, 39);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `contact` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers_carts`
--

CREATE TABLE `customers_carts` (
  `customer_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_carts`
--

INSERT INTO `customers_carts` (`customer_id`, `cart_id`) VALUES
(14, 31),
(14, 32),
(30, 47),
(30, 48),
(43, 63),
(43, 64),
(55, 79),
(55, 80),
(67, 95),
(67, 96),
(79, 111),
(79, 112),
(91, 127),
(91, 128),
(103, 143),
(103, 144),
(115, 159),
(115, 160),
(128, 175),
(128, 176),
(141, 191),
(141, 192),
(155, 207),
(155, 208);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(255) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `carts_products`
--
ALTER TABLE `carts_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `carts_products`
--
ALTER TABLE `carts_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
