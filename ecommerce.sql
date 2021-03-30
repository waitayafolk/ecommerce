-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 03:45 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `sale_online`
--

CREATE TABLE `sale_online` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_online`
--

INSERT INTO `sale_online` (`id`, `customer_id`, `name`, `address`, `tel`, `status`) VALUES
(1, 812458, 'awdaw', 'adwawd', 'awdaw', 'delete'),
(2, 812458, 'awdaw', 'adwawd', 'awdaw', 'delete'),
(3, 812458, 'awdaw', 'adwawd', 'awdaw', 'delete'),
(4, 812458, 'awdaw', 'adwawd', 'awdaw', 'send'),
(5, 812458, 'eiei', 'eiei', 'eiei', 'use'),
(6, 812458, 'adwaw', 'awdawd', 'awdw', 'send'),
(7, 9226648, 'ไวทยา วันฤกษ์', 'บ้าน ... อ... จ... 35100000', '0999747740', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `sale_online_detail`
--

CREATE TABLE `sale_online_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `sale_online_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_online_detail`
--

INSERT INTO `sale_online_detail` (`id`, `product_id`, `qty`, `product_price`, `sale_online_id`, `customer_id`) VALUES
(1, 1, 7, 4500, 4, 812458),
(2, 2, 5, 5200, 4, 812458),
(3, 2, 1, 5200, 5, 812458),
(4, 3, 1, 650, 6, 812458),
(5, 1, 3, 4500, 7, 9226648),
(6, 2, 1, 5200, 7, 9226648),
(7, 4, 1, 9500, 7, 9226648),
(8, 3, 1, 650, 7, 9226648);

-- --------------------------------------------------------

--
-- Table structure for table `sale_online_temp`
--

CREATE TABLE `sale_online_temp` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_online_temp`
--

INSERT INTO `sale_online_temp` (`id`, `product_id`, `customer_id`, `qty`, `product_price`) VALUES
(14, 4, 9226648, 1, 9500),
(15, 3, 9226648, 1, 650),
(16, 2, 9226648, 1, 5200);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `user_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `user_code`, `name`, `username`, `password`, `level`, `status`) VALUES
(1, 'A-17884', 'ไวทยา วันฤกษ์', 'admin', 'admin', 'admin', 'use'),
(2, 'A-186722', 'Admin PeeTer', 'peeter', '1234', 'member', 'use'),
(3, '7878', 'test', 'test', '1234', 'user', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `tb_group_product`
--

CREATE TABLE `tb_group_product` (
  `id` int(11) NOT NULL,
  `group_code` varchar(50) NOT NULL,
  `group_product_name` varchar(50) NOT NULL,
  `group_product_name_eng` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_group_product`
--

INSERT INTO `tb_group_product` (`id`, `group_code`, `group_product_name`, `group_product_name_eng`, `detail`, `status`) VALUES
(1, '1001', 'ทั่วไป', 'ETC.', 'ข้อมูลทั่วไป', 'use'),
(2, 'test', 'test', 'test', 'tst', 'delete'),
(3, '1002', 'เครื่องดื่ม', 'Drink', 'Not .. ..', 'use');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `group_product_id` int(11) NOT NULL,
  `product_detail` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `product_code`, `product_name`, `product_price`, `group_product_id`, `product_detail`, `status`) VALUES
(1, '16748', 'ComPuter', 4500, 1, '---', 'use'),
(2, '1897112', 'Printer', 5200, 1, '--', 'use'),
(3, '7844144', 'Beer', 650, 3, '--', 'use'),
(4, '189722', 'มือถือ', 9500, 3, '---', 'use'),
(5, '1234', '1234', 400, 1, '...', 'delete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sale_online`
--
ALTER TABLE `sale_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_online_detail`
--
ALTER TABLE `sale_online_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_online_temp`
--
ALTER TABLE `sale_online_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_group_product`
--
ALTER TABLE `tb_group_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sale_online`
--
ALTER TABLE `sale_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sale_online_detail`
--
ALTER TABLE `sale_online_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale_online_temp`
--
ALTER TABLE `sale_online_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_group_product`
--
ALTER TABLE `tb_group_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
