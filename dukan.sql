-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 03:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin', 'admin'),
('hemantk@gmail.com', '1234sd');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user` varchar(50) NOT NULL,
  `pid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user`, `pid`) VALUES
('vivek@nri123', 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(20) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`, `status`) VALUES
(1, 'lungi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(20) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total` int(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `p_id` int(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `mpo` varchar(50) NOT NULL,
  `recpname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `p_img`, `p_name`, `quantity`, `total`, `address`, `mobile`, `status`, `p_id`, `user`, `mpo`, `recpname`) VALUES
(4, './images/product_images/1.jpg', 'lungi', 1, 123, 'hazaribagh jharkhand', 932883323, 0, 4, 'vivek@nri123', 'COD', 'Vivek sharma'),
(5, './images/product_images/7.jpg', 'ram badh', 1, 230, 'hazaribagh jharkhand', 932883323, 0, 5, 'vivek@nri123', 'COD', 'Vivek Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(20) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_quant` int(10) NOT NULL,
  `catid` int(20) NOT NULL,
  `p_status` tinyint(1) NOT NULL,
  `p_s_desc` varchar(300) NOT NULL,
  `p_f_desc` varchar(500) NOT NULL,
  `p_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_quant`, `catid`, `p_status`, `p_s_desc`, `p_f_desc`, `p_img`) VALUES
(5, 'ram badh', 230, 23, 1, 1, ' yug\r\n                                ', ' vguvgu\r\n                                ', './images/product_images/7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `mobile`, `password`, `status`, `address`) VALUES
('Ram Singh', 'ramsingh@gmail.com', '7007293039', 'ramsingh', 1, 'Mughalsarai UP, India'),
('Vivek Kumar', 'vivek@nri123', '932883323', 'vivek', 1, 'hazaribagh jharkhand'),
('Vivek Kumar', 'vkvivek@nri', '7398283293', 'vkvivek', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `product_in_cart` (`pid`),
  ADD KEY `Users_Cart` (`user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `product_ordered` (`p_id`),
  ADD KEY `user_ordered` (`user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `product_in_category` (`catid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Users_Cart` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_in_cart` FOREIGN KEY (`pid`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_ordered` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_in_category` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
