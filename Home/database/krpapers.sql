-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 05:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, '2022-06-30', '34', '0', '0', 'ayusj'),
(9, '2023-07-22', '11', '0', '0', 'Shubham'),
(10, '0000-00-00', '11', '0', '0', 'Shubham'),
(11, '0001-02-23', '1111', '11', '11', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `available_items`
--

CREATE TABLE `available_items` (
  `id` int(11) NOT NULL,
  `hoisery` varchar(100) NOT NULL,
  `ntbt` varchar(100) NOT NULL,
  `bleech` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_items`
--

INSERT INTO `available_items` (`id`, `hoisery`, `ntbt`, `bleech`) VALUES
(0, '2300', '9567', '10021');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_usage`
--

INSERT INTO `daily_usage` (`d_id`, `date`, `time`, `hoisery`, `ntbt`, `bleech`) VALUES
(3, '2022-06-08', '04:12:54', '300', '0', '0'),
(4, '2022-06-12', '10:48:40', '300', '0', '0'),
(5, '2022-06-18', '02:40:44', '34', '0', '0'),
(6, '2023-06-26', '02:03:51', '8', '4', '4'),
(7, '2023-06-26', '02:04:24', '8', '4', '4'),
(8, '2023-07-20', '02:20:02', '7', '1', '1'),
(9, '2023-07-22', '01:56:16', '11', '0', '0'),
(10, '2023-07-22', '14:55:39', '11', '1111', '11'),
(11, '2023-07-25', '15:43:40', '0', '2', '0'),
(12, '2023-07-25', '15:44:12', '89', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_id` int(11) NOT NULL,
  `Item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_id`, `Item`) VALUES
(1, 'hoisery'),
(2, 'ntbt'),
(3, 'bleech');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` varchar(100) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Username`, `Email`, `Password`, `Type`) VALUES
('Ayush123', 'Ayush Tandon', '', 'Hacker', 'Admin'),
('Sanjay123', 'Sanjay Tandon', '', 'Hacker', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(15) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cost` int(12) NOT NULL,
  `packof` varchar(200) NOT NULL,
  `gsm` varchar(500) NOT NULL,
  `color` varchar(500) NOT NULL,
  `size` varchar(200) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `cost`, `packof`, `gsm`, `color`, `size`, `image`) VALUES
(2, 'Marigold Handmade Paper Envelopes', 'Embrace the charm of floral finesse with the vibrant hues and intricate textures of our Marigold Handmade Paper Envelopes. <br> The enchanting marigold petals add an ethereal touch, making each envelope a visual delight. <br> Whether used for special invitations, heartfelt letters, or thoughtful gifts, our envelopes are sure to leave a lasting impression on the recipients.', 249, '10', '200', 'White', '5.5 X 7.5', 'Marigoldenv.jpeg'),
(4, 'Zari Handmade Paper Diaries ', 'It is made with love of local articians and our efforts. It is made with 100% cotton fiber aking it tree free also with this diary we are promoting our local articians', 250, '1', '80', 'White', 'A5', 'Zari Handmade Paper Diaries .jpg'),
(5, 'Plain Colored Cotton Paper', 'Plain A4 Handmade paper sheets made with 100% Cotton Rag.', 180, '12', '150', 'Multi Colored', 'A4', 'Plain coloured paper .jpg'),
(6, 'Red Textured Colored Paper', 'Red Leather texture gives yiu a royal look on  your project making your work look more attractive. Also it is made with Cotton Rag give a eco friendly touch ', 200, '10', '150', 'Red', 'A4', 'Red Texture leather paper .jpg'),
(7, 'Handmade Paper Cards', 'Wheat color Paper card gives you a royal look on your project making your work look more attractive. Also it is made with Cotton Rag give a eco friendly touch', 125, '15', '400', 'Wheat', '5 X 7', 'IMG_20230422_131119_Bokeh-01.jpeg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='all past records for incoming raw material';

--
-- Dumping data for table `stock_fulfilment_history`
--

INSERT INTO `stock_fulfilment_history` (`new_id`, `sup_id`, `item`, `quantity`, `rate`, `transport_city`, `transport_local`, `gst`, `total`, `image`) VALUES
(1, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(2, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(3, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(4, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(5, 1, 'hoisery', '78', '90', 'Bareilly', '200', '500', '7720', 'market.PNG'),
(6, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(7, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(8, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(9, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(10, 1, 'hoisery', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(11, 1, 'ntbt', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(12, 1, 'ntbt', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(13, 1, 'ntbt', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(14, 1, '', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(15, 1, '', '89', '90', 'Bareilly', '200', '500', '8710', 'market.PNG'),
(16, 1, '', '89', '90', 'Bareilly', '200', '500', '8710', 'Marigoldenv.jpeg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `supplier_name`, `email`, `phone_no`, `address`, `city`, `gst_no`) VALUES
(1, 'ajay', 'abc@xyz.com', '1234567890', '2d2fc', 'bareilly', 'wefnp');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(100) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `assigned_date` datetime NOT NULL,
  `assigned_to` varchar(100) NOT NULL,
  `exp_comp_date` datetime NOT NULL COMMENT 'Expected completion date',
  `completion_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`t_id`, `heading`, `detail`, `assigned_date`, `assigned_to`, `exp_comp_date`, `completion_status`) VALUES
(1, 'Papers and envelopes', 'coloring envelopes', '2023-07-30 08:34:08', 'Sanjay123', '2023-08-08 12:04:08', 1),
(2, 'vwvwvvv', 'wvwvwvvw', '2023-07-30 10:28:02', 'Ayush123', '2023-07-30 10:28:02', 1),
(3, 'paper', 'ihbwfovousbvobSb', '2023-07-30 10:52:41', 'Ayush123', '2023-09-13 14:22:41', 1),
(4, 'Envelope color', 'hggouguguo', '2023-07-30 00:00:00', 'Ayush123', '2023-08-06 00:00:00', 0),
(5, 'fipwri', '\r\nj-2eoij', '2023-08-27 00:00:00', 'Ayush123', '2023-09-07 00:00:00', 0);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `foreign key` (`assigned_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_stock`
--
ALTER TABLE `add_stock`
  MODIFY `as_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daily_usage`
--
ALTER TABLE `daily_usage`
  MODIFY `d_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_fulfilment_history`
--
ALTER TABLE `stock_fulfilment_history`
  MODIFY `new_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock_fulfilment_history`
--
ALTER TABLE `stock_fulfilment_history`
  ADD CONSTRAINT `forignkey` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`assigned_to`) REFERENCES `login` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
