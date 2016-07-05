-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2016 at 03:27 AM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parentId`) VALUES
(8, 'Điện thoại', 0),
(9, 'Laptop', 0),
(10, 'Tablet', 0),
(11, 'Phụ kiện', 0),
(12, 'Sim thẻ', 0),
(13, 'Tin tức', 0),
(14, 'Game app', 0),
(15, 'Samsung', 8),
(16, 'Nokia - Microsoft', 8),
(17, 'Apple (Iphone)', 8),
(18, 'Sony', 8),
(19, 'OPPO', 8),
(20, 'HTC', 8),
(21, 'Motorola', 8),
(22, 'Asus (Zenfone)', 8),
(23, 'Huawei', 8),
(24, 'LG', 8),
(25, 'Mobiistar', 8),
(26, 'Lenovo', 8),
(27, 'Philips', 8),
(28, 'ZTE', 8),
(29, 'Mobell', 8),
(30, 'Obi Worldphone', 8),
(31, 'Wing', 8),
(39, 'Q-Mobile', 8),
(40, 'WIKO', 8),
(41, 'Dell', 9),
(42, 'Acer', 9),
(43, 'Asus', 9),
(44, 'HP-Compaq', 9),
(45, 'Lenovo', 9),
(46, 'Apple (Ipad)', 10),
(47, 'Samsung', 10),
(48, 'Asus', 10),
(49, 'Lenovo', 10),
(50, 'Huawei', 10),
(51, 'Acer', 10),
(52, 'Wing', 10),
(53, 'Mobiistar', 10),
(54, 'Mobell', 10),
(57, 'Ốp lưng, bao da', 11),
(58, 'Pin, sạc dự phòng', 11),
(59, 'Sạc dây, cáp các loại', 11),
(60, 'Thẻ nhớ', 11),
(61, 'Tai nghe', 11),
(62, 'Miếng dán màn hình', 11),
(63, 'USB', 11),
(64, 'Chuột máy tính', 11),
(65, 'Loa laptop', 11),
(66, 'Phụ kiện khác', 11),
(67, 'Sim Mobifone', 12),
(68, 'Sim Viettel', 12),
(69, 'Sim Vinaphone', 12),
(70, 'Tin nhanh 24/7', 13),
(71, 'Tin khuyến mãi', 13),
(72, 'Bài đánh giá', 13),
(73, 'Hỏi đáp', 0),
(74, 'Android', 14),
(75, 'iOS', 14),
(76, 'Windowsphone', 14);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `genders` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detailphone`
--

CREATE TABLE `detailphone` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `scr_tech` varchar(300) NOT NULL,
  `scr_dpi` varchar(300) NOT NULL,
  `scr_width` varchar(300) NOT NULL,
  `scr_touch` varchar(300) NOT NULL,
  `scr_glass` varchar(300) NOT NULL,
  `b_campixel` varchar(300) NOT NULL,
  `b_camvideo` varchar(300) NOT NULL,
  `b_camflash` varchar(300) NOT NULL,
  `b_camepro` varchar(300) NOT NULL,
  `f_campixel` varchar(300) NOT NULL,
  `f_camvideo` varchar(300) NOT NULL,
  `f_camcall` varchar(300) NOT NULL,
  `f_camother` varchar(300) NOT NULL,
  `os_ver` varchar(300) NOT NULL,
  `chip_name` varchar(300) NOT NULL,
  `chip_clock` varchar(300) NOT NULL,
  `chip_gpu` varchar(300) NOT NULL,
  `ram` varchar(300) NOT NULL,
  `rom_size` varchar(300) NOT NULL,
  `rom_enable` varchar(300) NOT NULL,
  `sdcard` varchar(300) NOT NULL,
  `sdmax` varchar(300) NOT NULL,
  `net_2g` varchar(300) NOT NULL,
  `net_3g` varchar(300) NOT NULL,
  `net_4g` varchar(300) NOT NULL,
  `sim_num` varchar(300) NOT NULL,
  `sim_type` varchar(300) NOT NULL,
  `wifi` varchar(300) NOT NULL,
  `gps` varchar(300) NOT NULL,
  `bluetooth` varchar(300) NOT NULL,
  `nfc` varchar(300) NOT NULL,
  `port` varchar(300) NOT NULL,
  `jack` varchar(300) NOT NULL,
  `net_other` varchar(300) NOT NULL,
  `design` varchar(300) NOT NULL,
  `matter` varchar(300) NOT NULL,
  `size` varchar(300) NOT NULL,
  `weight` varchar(300) NOT NULL,
  `pin_size` varchar(300) NOT NULL,
  `pin_type` varchar(300) NOT NULL,
  `movie` varchar(300) NOT NULL,
  `music` varchar(300) NOT NULL,
  `record` varchar(300) NOT NULL,
  `radio` varchar(300) NOT NULL,
  `other` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detailtablet`
--

CREATE TABLE `detailtablet` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `scr_tech` varchar(300) NOT NULL,
  `scr_dpi` varchar(300) NOT NULL,
  `scr_size` varchar(300) NOT NULL,
  `b_campixel` varchar(300) NOT NULL,
  `b_camvideo` varchar(300) NOT NULL,
  `b_camfeature` varchar(300) NOT NULL,
  `f_campixel` varchar(300) NOT NULL,
  `os_ver` varchar(300) NOT NULL,
  `chip_name` varchar(300) NOT NULL,
  `chip_clock` varchar(300) NOT NULL,
  `chip_gpu` varchar(300) NOT NULL,
  `ram` varchar(300) NOT NULL,
  `rom_size` varchar(300) NOT NULL,
  `rom_enable` varchar(300) NOT NULL,
  `sdcard` varchar(300) NOT NULL,
  `sdmax` varchar(300) NOT NULL,
  `sensor` varchar(300) NOT NULL,
  `sim_num` varchar(300) NOT NULL,
  `sim_type` varchar(300) NOT NULL,
  `calling` varchar(300) NOT NULL,
  `net_3g` varchar(300) NOT NULL,
  `net_4g` varchar(300) NOT NULL,
  `wifi` varchar(300) NOT NULL,
  `bluetooth` varchar(300) NOT NULL,
  `gps` varchar(300) NOT NULL,
  `port` varchar(300) NOT NULL,
  `jack` varchar(300) NOT NULL,
  `otg` varchar(300) NOT NULL,
  `net_other` varchar(300) NOT NULL,
  `record` varchar(300) NOT NULL,
  `radio` varchar(300) NOT NULL,
  `spec_feat` varchar(300) NOT NULL,
  `matter` varchar(300) NOT NULL,
  `size` varchar(300) NOT NULL,
  `weight` varchar(300) NOT NULL,
  `pin_type` varchar(300) NOT NULL,
  `pin_size` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`id`, `name`, `website`, `phone`, `email`, `avatar`) VALUES
(9, 'Samsung', 'http://www.samsung.com/vn/home/', '1666242588', 'nguyenhuuninh150593@gmail.com', '../upload/producer/Samsung.png'),
(10, 'LG', 'http://www.lg.com/vn', '18001503', 'nguyenhuuninh150593@gmail.com', '../upload/producer/LG.png'),
(11, 'Nokia - Microsoft', 'http://nokia.com', '12458976979', 'nokia@gmail.com', '../upload/producer/nokia.jpg'),
(12, 'Apple (Iphone)', 'http://apple.com', '4353645842', 'apple@gmail.com', '../upload/producer/apple.png'),
(13, 'Sony', 'http://sony.com', '347843474', 'sony@gmail.com', '../upload/producer/sony.jpg'),
(14, 'OPPO', 'http://oppo.com', '238463984', 'oppo@gmail.com', '../upload/producer/oppo.png'),
(15, 'HTC', 'http://htc.com', '56483435', 'htc@gmail.com', '../upload/producer/htc.png'),
(16, 'Asus', 'http://asus.com', '8435928', 'asus@gmail.com', '../upload/producer/asus.png');

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
(1, 'Samsung Galaxy S7 Edge', 18490000, 15, '2016-07-01'),
(2, 'Samsung Galaxy S7', 15990000, 15, '2016-07-01'),
(3, 'Samsung Galaxy J5', 3990000, 15, '2016-07-01'),
(4, 'Samsung Galaxy J1 (2016)', 2590000, 15, '2016-07-01'),
(5, 'Samsung Galaxy J1 mini', 1790000, 15, '2016-07-01'),
(6, 'Samsung E1200', 350000, 15, '2016-07-01'),
(7, 'Microsoft Lumia 950', 7990000, 16, '2016-07-01'),
(8, 'Nokia Lumia 530', 890000, 16, '2016-07-01'),
(9, 'Nokia 105', 420000, 16, '2016-07-01'),
(10, 'iPhone 6s 128GB', 24690000, 17, '2016-07-01'),
(11, 'iPhone 6 Plus 64GB', 20590000, 17, '2016-07-01'),
(12, 'iPhone SE 16GB', 11490000, 17, '2016-07-01'),
(13, 'iPhone 5S 16GB', 6990000, 17, '2016-07-01'),
(14, 'Sony Xperia Z5', 15990000, 18, '2016-07-01'),
(15, 'Sony Xperia M4 Dual', 6190000, 18, '2016-07-01'),
(16, 'Sony Xperia M5', 6990000, 18, '2016-07-01'),
(17, 'OPPO F1 Plus', 9990000, 19, '2016-07-01'),
(18, 'OPPO F1', 5490000, 19, '2016-07-01'),
(19, 'OPPO Neo 5 16GB', 2690000, 19, '2016-07-01'),
(20, 'OPPO Joy Plus R1011', 1990000, 19, '2016-07-01'),
(21, 'HTC 10', 16990000, 20, '2016-07-01'),
(22, 'HTC One M8 Eye', 6990000, 20, '2016-07-01'),
(23, 'HTC Desire 630', 3990000, 20, '2016-07-01'),
(24, 'HTC Desire 620G', 2790000, 20, '2016-07-01'),
(25, 'Asus Zenfone 2 Laser LTE', 3990000, 22, '2016-07-01'),
(26, 'Asus Zenfone GO ZB452KG', 1990000, 22, '2016-07-01'),
(27, 'iPad Pro Wifi Cellular 128GB', 26990000, 46, '2016-07-03'),
(28, 'Samsung Galaxy Tab S2 8', 9990000, 47, '2016-07-03'),
(29, 'ASUS ZenPad 7.0 (Z370CG)', 3990000, 48, '2016-07-03'),
(30, 'Lenovo IdeaPad 100S 11IBY Z3735/2GB/32GB/Win10', 3990000, 45, '2016-07-04'),
(31, 'HP Pavilion 11 S001TU N3050/2GB/500GB/Win10', 5990000, 44, '2016-07-04'),
(32, 'Dell Inspiron 3552 N3050/2GB/500GB/Win10', 6690000, 41, '2016-07-04'),
(33, 'ASUS X403SA N3700/2GB/500GB/Win10', 6990000, 43, '2016-07-04'),
(34, 'Acer Aspire Z1402 52KX i5 5200U/4GB/500GB/Win10', 10490000, 42, '2016-07-04'),
(35, 'Ốp lưng Galaxy J1', 50000, 57, '2016-07-04'),
(36, 'Ốp lưng iPhone 5-5S', 50000, 57, '2016-07-04'),
(37, 'Bao da iPad mini 4 Tucano Angolo', 450000, 57, '2016-07-04'),
(38, 'Bao da Galaxy Tab A 8 inch nắp gập Coreka', 180000, 57, '2016-07-04'),
(39, 'Ốp lưng MTB 7" nắp gập Ablock Đen', 220000, 57, '2016-07-04'),
(40, 'Bao da Galaxy Tab E 9.6 inch nắp gập JM', 280000, 57, '2016-07-04'),
(41, 'Pin sạc dự phòng eSaver 5000 mAh Y322', 200000, 58, '2016-07-04'),
(42, 'Pin sạc dự phòng 9000 mAh Xmobile Y303', 400000, 58, '2016-07-04'),
(43, 'Pin sạc dự phòng Polymer 10000 mAh Eco TS-D190', 550000, 58, '2016-07-04'),
(44, 'Pin Nokia BL-4U Pisen', 150000, 58, '2016-07-04'),
(45, 'Đế sạc Lightning iPhone-iPad ML8H2AM-A Apple', 1490000, 59, '2016-07-04'),
(46, 'Cáp Lightning 20cm Eco AL06-200', 50000, 59, '2016-07-04'),
(47, 'Adapter sạc Dual 2A TS-C067 X mobile', 160000, 59, '2016-07-04'),
(48, 'Sạc xe hơi Dual USB X mobile TS-C063', 200000, 59, '2016-07-04'),
(49, 'Adapter Sạc Iphone-Ipad-Ipod 12W MD836ZM Apple', 490000, 59, '2016-07-04'),
(50, 'Cáp chuyển Cổng Lightning sang USB MD821AM/A', 1000000, 59, '2016-07-04'),
(51, 'Thẻ nhớ 8Gb MicroSD Class 4', 130000, 60, '2016-07-04'),
(52, 'Thẻ nhớ 16Gb MicroSD class 10', 190000, 60, '2016-07-04'),
(53, 'Thẻ nhớ 32Gb MicroSD class 10', 390000, 60, '2016-07-04'),
(54, 'Thẻ nhớ 64gb MicroSD class 10_U1', 790000, 60, '2016-07-04'),
(55, 'Thẻ nhớ 128GB MicroSD class 10 UHS1', 1990000, 60, '2016-07-04'),
(56, 'Tai nghe Sony Hi-Res MDR-NC750', 1990000, 61, '2016-07-04'),
(57, 'Tai nghe bluetooth Sony MBH20 chính hãng', 649000, 61, '2016-07-04'),
(58, 'Tai nghe chụp tai Kanen IP-950', 300000, 61, '2016-07-04'),
(59, 'Tai nghe HPM Genius HS-02B', 110000, 61, '2016-07-04'),
(60, 'Miếng dán Galaxy Tab 4 7 inch', 70000, 62, '2016-07-04'),
(61, 'Miếng dán màn hình iPad Pro', 70000, 62, '2016-07-04'),
(62, 'Miếng Dán Laptop 15 inch', 100000, 62, '2016-07-04'),
(63, 'Miếng dán màn hình iPhone 6 - GOS', 50000, 62, '2016-07-04'),
(64, 'Miếng dán màn hình Lumia 950XL', 50000, 62, '2016-07-04'),
(65, 'USB 32Gb Transcend JetDrive Go 300', 990000, 63, '2016-07-04'),
(66, 'USB 8GB 2.0 Apacer AH112', 100000, 63, '2016-07-04'),
(67, 'USB OTG 8GB 2.0 Kingston DT DUO', 150000, 63, '2016-07-04'),
(68, 'USB OTG 16GB 2.0 Transcend JetFlash 380', 250000, 63, '2016-07-04'),
(69, 'Chuột không dây Logitech M238 Họa tiết hình Khỉ', 335000, 64, '2016-07-04'),
(70, 'Chuột không dây Zadez M356', 200000, 64, '2016-07-04'),
(71, 'Chuột có dây Genius NS-100X', 100000, 64, '2016-07-04'),
(72, 'Loa Vi Tính Fenda U213A - 2.0', 185000, 65, '2016-07-04'),
(73, 'Loa Bluetooth Amethyst Mark Mini', 990000, 65, '2016-07-04'),
(74, 'Loa không dây Sony SRS-X55', 4290000, 65, '2016-07-04'),
(75, 'Móc dán điện thoại iRing RingCK002', 40000, 66, '2016-07-04'),
(76, 'Túi chống nước Cosano 5 inch', 50000, 66, '2016-07-04'),
(77, 'Gậy chụp ảnh selfie Monopod Macaron M1', 70000, 66, '2016-07-04'),
(78, 'Bộ Combo Đèn Quạt Stand Điện Thoại', 70000, 66, '2016-07-04'),
(79, 'Sim Mobi BIG 75', 75000, 67, '2016-07-04'),
(80, 'Sim Mobi BIG 150', 150000, 67, '2016-07-04'),
(81, 'Sim Mobi BIG 300', 300000, 8, '2016-07-04'),
(82, 'Vina BÙM 75', 75000, 69, '2016-07-04'),
(83, 'Vina BÙM 150', 150000, 69, '2016-07-04'),
(84, 'Vina BÙM 300', 300000, 69, '2016-07-04'),
(85, 'Viettel KMC5 75', 75000, 68, '2016-07-04'),
(86, 'Viettel KMC5 150', 150000, 68, '2016-07-04'),
(87, 'Viettel KMC5 300', 300000, 68, '2016-07-04'),
(88, 'Sim Viettel (Tomato)', 75000, 68, '2016-07-04'),
(89, 'Sim Mobifone (MobiQ)', 75000, 67, '2016-07-04'),
(90, 'Sim Vinaphone (Vinacard)', 75000, 69, '2016-07-04'),
(91, 'TRước', 12000, 8, '2016-07-04'),
(92, 'tét', 434000, 8, '2016-07-04'),
(93, 'Điện thoại', 0, 8, '2016-07-04'),
(94, 'Điện thoại', 0, 8, '2016-07-04'),
(95, 'Điện thoại', 0, 8, '2016-07-04'),
(96, 'Điện thoại', 0, 8, '2016-07-04'),
(97, 'Điện thoại', 12000, 8, '2016-07-04'),
(98, 'Laptop', 123000, 8, '2016-07-04'),
(99, 'Laptop', 123000, 8, '2016-07-04'),
(100, 'Laptop', 123000, 8, '2016-07-04'),
(101, 'Laptop', 123000, 8, '2016-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `keyword` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `keyword`, `description`) VALUES
(1, 'Admin', 'admin', ''),
(2, 'Client', 'client', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `genders` tinyint(1) NOT NULL,
  `role` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `birthday` date NOT NULL,
  `atm` varchar(20) NOT NULL,
  `beginDate` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullName`, `genders`, `role`, `phone`, `email`, `address`, `birthday`, `atm`, `beginDate`, `status`) VALUES
(2, 'ninh', 'efea4dbc0e33d945ea37f95a5f3d3a7e', 'Nguyen Huu Ninh', 1, '1', '01694332623', 'nguyenhuuninh150593@gmail.com', 'Binh Duong', '1993-05-15', '711A119988', '2016-06-16', 'work'),
(4, 'tien', '2a26569e98b26668f39e98e6baef2d54', 'Lê Đức Tiến', 1, '1', '01647929747', 'ngoinhamaam1993@yahoo.com.vn', 'Huế City', '1993-10-25', '193719232873', '2016-06-29', 'work'),
(5, 'tienclient', 'cccc7282f41f0b163cbb966cf9ab8f55', 'Tiến Client', 1, '2', '01647929979', 'tiensi23@gmail.com', 'Hà nội', '2009-01-07', '193714352546', '2016-06-29', 'work');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailphone`
--
ALTER TABLE `detailphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailtablet`
--
ALTER TABLE `detailtablet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detailphone`
--
ALTER TABLE `detailphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detailtablet`
--
ALTER TABLE `detailtablet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
