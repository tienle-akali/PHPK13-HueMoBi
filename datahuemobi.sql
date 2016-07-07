-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2016 at 02:26 PM
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
-- Table structure for table `detaillaptop`
--

CREATE TABLE `detaillaptop` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `cpu_prod` varchar(300) NOT NULL,
  `cpu_tech` varchar(300) NOT NULL,
  `cpu_type` varchar(300) NOT NULL,
  `cpu_clock` varchar(300) NOT NULL,
  `cpu_cache` varchar(300) NOT NULL,
  `cpu_max` varchar(300) NOT NULL,
  `board_chip` varchar(300) NOT NULL,
  `board_bus` varchar(300) NOT NULL,
  `board_ram_max` varchar(300) NOT NULL,
  `ram_size` varchar(300) NOT NULL,
  `ram_type` varchar(300) NOT NULL,
  `ram_bus` varchar(300) NOT NULL,
  `disk_type` varchar(300) NOT NULL,
  `disk_size` varchar(300) NOT NULL,
  `scr_width` varchar(300) NOT NULL,
  `scr_dpi` varchar(300) NOT NULL,
  `scr_tech` varchar(300) NOT NULL,
  `scr_touch` varchar(300) NOT NULL,
  `gpu_chip` varchar(300) NOT NULL,
  `gpu_memory` varchar(300) NOT NULL,
  `gpu_style` varchar(300) NOT NULL,
  `sound_channel` varchar(300) NOT NULL,
  `sound_other` varchar(300) NOT NULL,
  `optical_disk` varchar(300) NOT NULL,
  `optical_type` varchar(300) NOT NULL,
  `port` varchar(300) NOT NULL,
  `ext_feat` varchar(300) NOT NULL,
  `lan` varchar(300) NOT NULL,
  `wifi_stand` varchar(300) NOT NULL,
  `wire_other` varchar(300) NOT NULL,
  `card_read` varchar(300) NOT NULL,
  `card_slot` varchar(300) NOT NULL,
  `cam_pixel` varchar(300) NOT NULL,
  `cam_info` varchar(300) NOT NULL,
  `pin_info` varchar(300) NOT NULL,
  `os_ver` varchar(300) NOT NULL,
  `soft` varchar(300) NOT NULL,
  `size` varchar(300) NOT NULL,
  `weight` varchar(300) NOT NULL,
  `matter` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detaillaptop`
--

INSERT INTO `detaillaptop` (`id`, `productId`, `cpu_prod`, `cpu_tech`, `cpu_type`, `cpu_clock`, `cpu_cache`, `cpu_max`, `board_chip`, `board_bus`, `board_ram_max`, `ram_size`, `ram_type`, `ram_bus`, `disk_type`, `disk_size`, `scr_width`, `scr_dpi`, `scr_tech`, `scr_touch`, `gpu_chip`, `gpu_memory`, `gpu_style`, `sound_channel`, `sound_other`, `optical_disk`, `optical_type`, `port`, `ext_feat`, `lan`, `wifi_stand`, `wire_other`, `card_read`, `card_slot`, `cam_pixel`, `cam_info`, `pin_info`, `os_ver`, `soft`, `size`, `weight`, `matter`) VALUES
(1, 130, '412', '124', '124', ' Ghz', '124', 'Không', '14', '1333MHz', 'Không', ' GB', '', '1333MHz', 'eMMC', '128 GB', '11.6 inch', 'HD (1280 x 720 pixels)', '', '', '', 'Share (Dùng chung bộ nhớ với RAM)', 'Card đồ họa tích hợp', '2.0', 'Combo Microphone & Headphone', 'Có', 'Không', 'USB 2.0, HDMI, LAN (RJ45), USB 3.0, VGA (D-Sub)', '', '10/100/1000 Mbps Ethernet LAN (RJ-45 connector)', '802.11b/g/n/ac', 'Bluetooth', 'Có', 'Không, Micro SD, MMC, SD, SDHC, SDXC', '0.3 MP', '', '', 'Windows 10', 'Microsoft Office bản dùng thử', 'Dài  mm - Ngang  mm - Dày  mm', '', 'Vỏ nhựa / Kim loại');

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
  `b_campro` varchar(300) NOT NULL,
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

--
-- Dumping data for table `detailphone`
--

INSERT INTO `detailphone` (`id`, `productId`, `scr_tech`, `scr_dpi`, `scr_width`, `scr_touch`, `scr_glass`, `b_campixel`, `b_camvideo`, `b_camflash`, `b_campro`, `f_campixel`, `f_camvideo`, `f_camcall`, `f_camother`, `os_ver`, `chip_name`, `chip_clock`, `chip_gpu`, `ram`, `rom_size`, `rom_enable`, `sdcard`, `sdmax`, `net_2g`, `net_3g`, `net_4g`, `sim_num`, `sim_type`, `wifi`, `gps`, `bluetooth`, `nfc`, `port`, `jack`, `net_other`, `design`, `matter`, `size`, `weight`, `pin_size`, `pin_type`, `movie`, `music`, `record`, `radio`, `other`) VALUES
(17, 127, 'TFT', '128 x 160 Pixels', '2', 'Không', 'Kính thường', 'VGA', 'Có', 'Có', 'Không', 'VGA', 'Có', 'Có', '213123', 'Không', 'qrqw', ' Ghz', 'qrw', 'Không', 'Không', ' GB', 'Không', 'Không', 'GMS 850/900/1800/1900', 'Có, Không, HSPDA 850/900/1900/2100', 'Không', '1 SIM', 'SIM thường', 'Có, Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'Có, Không, BDS, A-GPS, GLONASS', 'Có, Không, EDR, v4.2, v4.0, apt-X, A2DP, LE', 'Có', 'Micro USB', 'Không', 'Không, NFC, OTG, MHL', 'Nguyên khối, Pin rời, Pin liền', 'Nhựa', 'Dài  mm - Rộng  mm - Dày  mm', ' g', ' mAh', 'Pin chuẩn Li-Ion', 'Có', 'MP3, WAV, eAAC+, FLAC', 'Có, microphone chuyên dụng chống ồn', 'Có, Không', 'Không'),
(18, 129, 'TFT', '128 x 160 Pixels', '213', 'Không', 'Kính thường', 'VGA', 'Có', 'Có', 'Không', 'VGA', 'Có', 'Có', '12414', 'Không', '', ' Ghz', '', 'Không', 'Không', ' GB', 'Không', 'Không', 'GMS 850/900/1800/1900', 'Có, Không, HSPDA 850/900/1900/2100', 'Không', '1 SIM', 'SIM thường', 'Có, Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'Có, Không, BDS, A-GPS, GLONASS', 'Có, Không, EDR, v4.2, v4.0, apt-X, A2DP, LE', 'Có', 'Micro USB', 'Không', 'Không, NFC, OTG, MHL', 'Nguyên khối, Pin rời, Pin liền', 'Nhựa', 'Dài  mm - Rộng  mm - Dày  mm', ' g', ' mAh', 'Pin chuẩn Li-Ion', 'Có', 'MP3, WAV, eAAC+, FLAC', 'Có, microphone chuyên dụng chống ồn', 'Có, Không', 'Không');

-- --------------------------------------------------------

--
-- Table structure for table `detailphukien`
--

CREATE TABLE `detailphukien` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailphukien`
--

INSERT INTO `detailphukien` (`id`, `productId`, `content`) VALUES
(1, 125, '- ậkof\r\n-nàkja\r\n-kjaosfj\r\njfiash\r\nádnkasn\r\n-áda'),
(2, 131, '224225252');

-- --------------------------------------------------------

--
-- Table structure for table `detailtablet`
--

CREATE TABLE `detailtablet` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `scr_tech` varchar(300) NOT NULL,
  `scr_dpi` varchar(300) NOT NULL,
  `scr_width` varchar(300) NOT NULL,
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

--
-- Dumping data for table `detailtablet`
--

INSERT INTO `detailtablet` (`id`, `productId`, `scr_tech`, `scr_dpi`, `scr_width`, `b_campixel`, `b_camvideo`, `b_camfeature`, `f_campixel`, `os_ver`, `chip_name`, `chip_clock`, `chip_gpu`, `ram`, `rom_size`, `rom_enable`, `sdcard`, `sdmax`, `sensor`, `sim_num`, `sim_type`, `calling`, `net_3g`, `net_4g`, `wifi`, `bluetooth`, `gps`, `port`, `jack`, `otg`, `net_other`, `record`, `radio`, `spec_feat`, `matter`, `size`, `weight`, `pin_type`, `pin_size`) VALUES
(1, 128, 'TFT', 'qHD (960 x 540 pixels)', '3254', 'VGA', 'Có', '323', 'VGA', 'Không', '4214', ' Ghz', '21', 'Không', 'Không', ' GB', 'Không', 'Không', 'Hall, Con quay hồi chuyển 3 chiều, Khí áp kế, Trọng lực, Gia tốc, Ánh sáng, Fingerprint Sensor', 'Không hỗ trợ', 'SIM thường', 'Có, Không', 'Có 3G (tốc độ Download  Mbps; Upload  Mbps)', 'Không', 'Wi-Fi 802.11 a/b/g/n/ac, DLNA, Wi-Fi Direct, Dual-band, Wi-Fi hotspot', 'Có, Không, EDR, v4.2, v4.0, apt-X, A2DP, LE', 'Có, Không, BDS, A-GPS, GLONASS', 'Micro USB', 'Không', 'Có, Không', 'Không, NFC, OTG, MHL', 'Có, microphone chuyên dụng chống ồn', 'Có, Không', 'Không, Mở khóa bằng vân tay', '', 'Dài  mm - Ngang  mm - Dày  mm', ' g', 'Lithium - Polymer', ' mAh'),
(2, 132, 'TFT', 'qHD (960 x 540 pixels)', 'ewqr', 'VGA', 'Có', 'qr', 'VGA', 'Không', '', ' Ghz', '', 'Không', 'Không', ' GB', 'Không', 'Không', 'Hall, Con quay hồi chuyển 3 chiều, Khí áp kế, Trọng lực, Gia tốc, Ánh sáng, Fingerprint Sensor', 'Không hỗ trợ', 'SIM thường', 'Có, Không', 'Có 3G (tốc độ Download  Mbps; Upload  Mbps)', 'Không', 'Wi-Fi 802.11 a/b/g/n/ac, DLNA, Wi-Fi Direct, Dual-band, Wi-Fi hotspot', 'Có, Không, EDR, v4.2, v4.0, apt-X, A2DP, LE', 'Có, Không, BDS, A-GPS, GLONASS', 'Micro USB', 'Không', 'Có, Không', 'Không, NFC, OTG, MHL', 'Có, microphone chuyên dụng chống ồn', 'Có, Không', 'Không, Mở khóa bằng vân tay', '', 'Dài  mm - Ngang  mm - Dày  mm', ' g', 'Lithium - Polymer', ' mAh');

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
(129, 'Điện thoại', 434000, 15, '2016-07-06'),
(130, 'Laptop', 424000, 41, '2016-07-06'),
(131, 'Phụ kiện', 434000, 57, '2016-07-06'),
(132, 'Tablet2', 424000, 46, '2016-07-06');

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
-- Indexes for table `detaillaptop`
--
ALTER TABLE `detaillaptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailphone`
--
ALTER TABLE `detailphone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailphukien`
--
ALTER TABLE `detailphukien`
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
-- AUTO_INCREMENT for table `detaillaptop`
--
ALTER TABLE `detaillaptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detailphone`
--
ALTER TABLE `detailphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `detailphukien`
--
ALTER TABLE `detailphukien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detailtablet`
--
ALTER TABLE `detailtablet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
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
