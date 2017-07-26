-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 25, 2017 at 11:59 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moes`
--
CREATE DATABASE IF NOT EXISTS `moes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `moes`;

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

-- --------------------------------------------------------

--
-- Table structure for table `carts_products`
--

CREATE TABLE `carts_products` (
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`contact`, `business`, `address`, `phone`, `email`, `login`, `password`, `id`) VALUES
('Joe', 'Bob', 'Bob st.', '1800-bobjobs', 'bobjobs@stevejobs.com', 'Monkeys', '', 19),
('Lark', 'Smark', 'Dark', 'Fark', 'Balarkey', 'Savage', '', 20),
('asdf', 'lkjhasdf', 'lkjhzsdf', 'lkjh', 'lkjhl', 'loiuh', '', 21),
('asdf', 'ljuyp9', 'lkjh3', 'p987y', 'p8y90h', 'asdf', '', 22),
('asdf', 'ljuyp9', 'lkjh3', 'p987y', 'p8y90h', 'asdf', '', 23),
('akjsdfh', ';lkhi', '.kjhlk', ',jhnli', 'lihu', 'khkk', '', 24),
('akjsdfh', ';lkhi', '.kjhlk', ',jhnli', 'lihu', 'khkk', '', 25),
('akjsdfh', ';lkhi', '.kjhlk', ',jhnli', 'lihu', 'khkk', '', 26),
('asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'Monkeys', '', 27),
('Max Scher', 'Yoga Stuff', '123 sesame', '12324567899', 'max@max.com', 'loginmax', 'password124', 28),
('Larry', 'Fantastico', '2500 Sw your mom', '8675309', 'Yourmom@momco.edu', 'fantastico', 'alskdjh', 29),
('asdf', 'trogdorrrr', 'asdf', 'asdf', 'asdf', 'Khal Trogdor', 'asdf', 30),
('lkhju', 'ljhkjlh', 'lkhjlkjh', 'hllklhjhj', 'jhll', 'logorrrthebarbarian', ';kjh', 31);

-- --------------------------------------------------------

--
-- Table structure for table `customers_carts`
--

CREATE TABLE `customers_carts` (
  `customer_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carts_products`
--
ALTER TABLE `carts_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
