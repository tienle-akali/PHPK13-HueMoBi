-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 08:52 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datahuemobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `prices` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `importDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `prices`, `idCategory`, `importDay`) VALUES
(134, 'iPhone 6s', 17990000, 17, '2016-07-10'),
(135, 'Samsung Galaxy S7 Edge (Pink Gold Edition)', 18490000, 15, '2016-07-10'),
(136, 'iPhone 6 64GB', 17490000, 17, '2016-07-10'),
(137, 'HTC 10', 16990000, 20, '2016-07-10'),
(138, 'Sony Xperia Z5 Premium Dual', 15990000, 18, '2016-07-10'),
(139, 'OPPO F1 Plus', 9990000, 19, '2016-07-10'),
(140, 'Lenovo Vibe P1', 6990000, 26, '2016-07-10'),
(141, 'LG Stylus 2', 5990000, 24, '2016-07-10'),
(142, 'Motorola Moto X Play', 5790000, 21, '2016-07-10'),
(143, 'Obi Worldphone SF1', 4640000, 30, '2016-07-10'),
(144, 'Microsoft Lumia 640', 2690000, 16, '2016-07-10'),
(145, 'Wiko K-Kool', 1690000, 40, '2016-07-10'),
(146, 'Mobiistar B247', 420000, 25, '2016-07-10'),
(147, 'Wing S88', 190000, 31, '2016-07-10'),
(148, 'Acer Iconia B1-723', 2290000, 51, '2016-07-10'),
(149, 'ASUS ZenPad C 7.0 (Z170CG)', 2790000, 48, '2016-07-10'),
(150, 'Samsung Galaxy Tab S2 8', 9990000, 47, '2016-07-10'),
(151, 'iPad Pro Wifi Cellular 128GB', 26990000, 46, '2016-07-10'),
(152, 'Lenovo Tab 2 A7-30', 1990000, 49, '2016-07-10'),
(153, 'Lenovo IdeaPad 100S 11IBY Z3735/2GB/32GB/Win10', 3990000, 45, '2016-07-10'),
(154, 'Dell Inspiron 3552 N3050/2GB/500GB/Win10', 6690000, 41, '2016-07-10'),
(155, 'Acer Aspire Z1402 30BA i3 5005U/4GB/500GB/Win10', 8490000, 42, '2016-07-10'),
(156, 'HP Spectre 13', 42990000, 44, '2016-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
