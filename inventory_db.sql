-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 05:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(21, 'Estasy', '1'),
(23, 'Walton', '1'),
(36, 'Samsung', '1'),
(49, 'Brothers', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category_name`, `status`) VALUES
(11, 'Electronics', '1'),
(13, 'Cloth', '1'),
(87, 'Furniture', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`) VALUES
(46, 'Arif', '0000-00-00', 63000),
(47, 'Arif', '0000-00-00', 6000),
(48, 'Harry', '0000-00-00', 12000),
(49, 'Arif', '0000-00-00', 12000),
(50, 'Arif', '0000-00-00', 6000),
(51, 'arif', '0000-00-00', 6000),
(52, 'arif', '0000-00-00', 6000),
(53, 'aee', '0000-00-00', 1200),
(54, 'Arif', '0000-00-00', 98800),
(55, 'Bablu', '0000-00-00', 28400),
(56, 'Arif', '0000-00-00', 19400),
(57, 'arif', '0000-00-00', 21200),
(58, 'moi', '0000-00-00', 52500),
(59, 'Biradf', '0000-00-00', 11000),
(60, 'Arif', '0000-00-00', 20000),
(61, 'Bablu', '0000-00-00', 6000),
(62, 'Kuddus', '0000-00-00', 42000),
(63, 'Arif', '0000-00-00', 2400),
(64, 'New Store', '0000-00-00', 40000),
(65, 'Arif', '0000-00-00', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(40, 46, 'Samsung M11', 10500, 6),
(41, 47, 'Fan', 1200, 5),
(42, 48, 'T-shirt', 1200, 10),
(43, 49, 'Fan', 1200, 10),
(44, 50, 'T-shirt', 1200, 5),
(45, 51, 'T-shirt', 1200, 5),
(46, 52, 'Fan', 1200, 5),
(47, 53, 'Fan', 1200, 1),
(48, 54, 'T-shirt', 1200, 5),
(49, 54, 'Fan', 1200, 2),
(50, 54, '32\" Led TV', 15000, 5),
(51, 54, 'Pants', 2200, 7),
(52, 55, 'T-shirt', 1200, 5),
(53, 55, 'Fan', 1200, 2),
(54, 55, 'Galaxy M11', 10000, 2),
(55, 56, 'Fan', 1200, 2),
(56, 56, 'T-shirt', 1200, 5),
(57, 56, 'Pants', 2200, 5),
(58, 57, 'Fan', 1200, 3),
(59, 57, 'Pants', 2200, 8),
(60, 58, 'Samsung M11', 10500, 5),
(61, 59, 'Pants', 2200, 5),
(62, 60, 'Galaxy M11', 10000, 2),
(63, 61, 'T-shirt', 1200, 5),
(64, 62, 'Samsung M11', 10500, 4),
(65, 63, 'Fan', 1200, 2),
(66, 64, 'Rounded Dining Table ', 20000, 2),
(67, 65, 'Galaxy M11', 10000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(54, 11, 23, 'Fan', 1200, 100, '2021-08-18', '1'),
(55, 13, 21, 'T-shirt', 1200, 60, '2021-08-04', '1'),
(57, 11, 36, 'Samsung M11', 10500, 70, '2021-08-04', '1'),
(58, 11, 23, '32\" Led TV', 15000, 5, '2021-08-04', '1'),
(59, 11, 36, 'Galaxy M11', 10000, 0, '2021-08-05', '1'),
(60, 13, 21, 'Pants', 2200, 25, '2021-08-07', '1'),
(63, 87, 49, 'Rounded Dining Table ', 20000, 8, '2021-08-18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userimg`
--

CREATE TABLE `userimg` (
  `img` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userimg`
--

INSERT INTO `userimg` (`img`) VALUES
('image/halcyon-1352522_1920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `fullname`, `email`, `password`, `confirm_password`, `operator`, `added_date`) VALUES
('ADMIN', 'Administrator', 'admin@gmail.com', '$2y$10$itgf1G7Hzg7iDZC2QVmcP.2Z1cJYYmSV2KN/wXLIan/Fvu79C1lzW', '$2y$10$/QpTdGf8zTmZbw9KVokxmubJzI8l3VzTGey4U2OPMvZU785u5sj9e', 'Admin', '2021-08-19 03:20:57'),
('arif', 'Arif', 'arif@gamil.com', '$2y$10$DFia2u5NKFW6nxnOlZf5S.V59w4JZSM9w5q1nrFA6Uj/0MFXgdaS6', '$2y$10$FA1vcZralGgewYvVwhurO.8dtav0yjjNWBtFS8e/o60pU2xfieMIe', 'Manager', '2021-08-19 03:20:01'),
('likhon', 'Shohana Arif', 'shohana@gmail.com', '$2y$10$wFsAJ.ACxvEWmZqVCLqtSec6j6e.18v90WkNvduzobr05pUhiDbei', '$2y$10$mxufCrOyE3ZJR4ReHlUidOEZzLSAXIXJ6nNHnYLWI9p2Vq9LvqnXe', 'Admin', '2021-08-14 05:29:00'),
('Mamun', 'Mamun Hossain', 'mamun@gmail.com', '$2y$10$P7Ni9BytG.02zMqpWCsck.LDxvvB479E.y5IIEoRSwdTapHmGIy8q', '$2y$10$o5TP/X2NDefbykYd7iIoeuoqnhnNgZeDUUw4HZER6BZpIUcMWSBy.', 'Manager', '2021-08-07 18:21:16'),
('saifur', 'sairur rahman', 'saifur@gmail.com', '$2y$10$mnI.8GTc9OegFy8HJY2D5uRpFVBq5dgceyT1t.58MIGIc4H8S9s4y', '$2y$10$mLeHa3Rxpmpvc19jC7qg8eGmUPMblKgdpZBGr.dZBEdw6NJhJmyeS', 'User', '2021-08-19 03:20:52'),
('User', 'User', 'user@mail.com', '$2y$10$8/oKsOwJAhzsBMGbuBVEQuaE02vQ1qHqb6JmOBreiHD0Vopzy8HSe', '$2y$10$PkV6IVil/k9rTIlhLwrQ9.x8EWofIaj7wXrz.fnB3j2JpVnyllhTy', 'User', '2021-08-19 03:18:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `userimg`
--
ALTER TABLE `userimg`
  ADD PRIMARY KEY (`img`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
