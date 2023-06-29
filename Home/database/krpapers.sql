-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 11:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krpapers`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_stock`
--

CREATE TABLE `add_stock` (
  `as_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `hoisery` varchar(200) NOT NULL,
  `ntbt` varchar(200) NOT NULL,
  `bleech` varchar(200) NOT NULL,
  `reciever` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_stock`
--

INSERT INTO `add_stock` (`as_id`, `date`, `hoisery`, `ntbt`, `bleech`, `reciever`) VALUES
(2, '0000-00-00', '1000', '0', '0', 'ayush'),
(3, '2022-06-23', '1000', '0', '0', 'ayush'),
(4, '2022-06-23', '1000', '0', '0', 'ayush'),
(5, '2022-06-23', '1000', '0', '0', 'ayush'),
(6, '2022-06-19', '300', '10000', '10000', 'ayush'),
(7, '2022-06-19', '34', '500', '30', 'ayush'),
(8, '2022-06-30', '34', '0', '0', 'ayusj');

-- --------------------------------------------------------

--
-- Table structure for table `available_items`
--

CREATE TABLE `available_items` (
  `id` int(11) NOT NULL,
  `hoisery` varchar(100) NOT NULL,
  `ntbt` varchar(100) NOT NULL,
  `bleech` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_items`
--

INSERT INTO `available_items` (`id`, `hoisery`, `ntbt`, `bleech`) VALUES
(0, '1034', '10500', '10030');

-- --------------------------------------------------------

--
-- Table structure for table `daily_usage`
--

CREATE TABLE `daily_usage` (
  `d_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `hoisery` varchar(300) NOT NULL,
  `ntbt` varchar(300) NOT NULL,
  `bleech` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_usage`
--

INSERT INTO `daily_usage` (`d_id`, `date`, `time`, `hoisery`, `ntbt`, `bleech`) VALUES
(3, '2022-06-08', '04:12:54', '300', '0', '0'),
(4, '2022-06-12', '10:48:40', '300', '0', '0'),
(5, '2022-06-18', '02:40:44', '34', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `stock_fulfilment_history`
--

CREATE TABLE `stock_fulfilment_history` (
  `new_id` int(100) NOT NULL,
  `sup_id` int(100) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `transport_city` varchar(1000) NOT NULL,
  `transport_local` varchar(200) NOT NULL,
  `gst` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='all past records for incoming raw material';

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(100) NOT NULL,
  `supplier_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone_no` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `gst_no` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `supplier_name`, `email`, `phone_no`, `address`, `city`, `gst_no`) VALUES
(1, 'ajay', 'abc@xyz.com', '1234567890', '2d2fc', 'bareilly', 'wefnp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_stock`
--
ALTER TABLE `add_stock`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `daily_usage`
--
ALTER TABLE `daily_usage`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `stock_fulfilment_history`
--
ALTER TABLE `stock_fulfilment_history`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `forignkey` (`sup_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_stock`
--
ALTER TABLE `add_stock`
  MODIFY `as_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daily_usage`
--
ALTER TABLE `daily_usage`
  MODIFY `d_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_fulfilment_history`
--
ALTER TABLE `stock_fulfilment_history`
  MODIFY `new_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock_fulfilment_history`
--
ALTER TABLE `stock_fulfilment_history`
  ADD CONSTRAINT `forignkey` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
