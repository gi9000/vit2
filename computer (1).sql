-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 07:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `number_or` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cate`, `name`, `des`) VALUES
(1, 'Main', 'Mainboard'),
(2, 'CPU', ''),
(3, 'RAM', ''),
(4, 'GPU', ''),
(5, 'SSD', ''),
(6, 'HDD', ''),
(7, 'Monitor', ''),
(8, 'Mouse', ''),
(9, 'Keyboard', ''),
(10, 'Headset', '');

-- --------------------------------------------------------

--
-- Table structure for table `ninom`
--

CREATE TABLE `ninom` (
  `id_nn` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `mess` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ninom`
--

INSERT INTO `ninom` (`id_nn`, `name`, `email`, `phone`, `mess`) VALUES
(1, 'Mạc Thanh Bình', 'macbinhzxc111@gmail.com', 394235923, 'Anh yêu em'),
(2, 'duong', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `mes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_pro`, `name_pro`, `quantity`, `total`, `mes`) VALUES
(1, 3, 'MSI MEG Z390 Godlike LGA1151v2', 2, 0, ''),
(1, 1, 'GIGABYTE Z390 AORUS Xtreme Wat', 1, 0, ''),
(10, 2, 'ASUS ROG Zenith II Extreme', 2, 38740, ''),
(11, 2, 'ASUS ROG Zenith II Extreme', 1, 19370, ''),
(12, 8, 'MSI RTX 2080TI Gaming X Trio 1', 2, 67980, ''),
(13, 5, 'Intel Core i7 9700K 3.6GHz - 4', 3, 29670, ''),
(14, 2, 'ASUS ROG Zenith II Extreme', 1, 4520470, ''),
(14, 14, 'WD Black 1TB SATA3 7200rpm', 2369, 4520470, ''),
(15, 1, 'GIGABYTE Z390 AORUS Xtreme Wat', 1, 20590, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_pro`
--

CREATE TABLE `order_pro` (
  `id_order` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(11) NOT NULL,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pro`
--

INSERT INTO `order_pro` (`id_order`, `username`, `phone`, `address`, `date`, `total`, `status_order`) VALUES
(1, 'mtb', '+84 ', 'Thượng Định-Hà Nội', '2024-05-16 14:03:33', 25328, 'Đặt hàng thành công'),
(9, 'mtb', '+84 ', 'Thượng Định-Hà Nội', '2024-05-16 14:23:58', 0, 'Đặt hàng thành công'),
(10, 'mtb', '+84 ', 'Thượng Định-Hà Nội', '2024-05-16 14:38:14', 38740, 'Đặt hàng thành công'),
(11, 'mtb', '+84 ', 'Thượng Định-Hà Nội', '2024-05-16 14:39:13', 19370, 'Đặt hàng thành công'),
(12, 'mtb', '+84 ', 'Thượng Định-Hà Nội', '2024-05-16 14:41:28', 67980, 'Đặt hàng thành công'),
(13, 'mtb', '+84 ', 'Thượng Định-Hà Nội', '2024-05-16 14:45:35', 29670, 'Đặt hàng thành công'),
(14, 'MPeace', '+84 ', 'Thượng Định-Hà Nội', '2024-05-17 07:54:12', 4520470, 'Đặt hàng thành công'),
(15, 'MPeace', '+84 ', 'Thượng Định-Hà Nội', '2024-05-17 07:58:11', 20590, 'Đặt hàng thành công'),
(16, 'mpeace6923', '+84 ', 'Thượng Định-Hà Nội', '2024-07-18 14:46:03', 0, 'Đặt hàng thành công'),
(17, 'mpeace', '+84 1231231', 'Thường tín-Hà Nội', '2024-07-19 07:11:58', 0, 'Đặt hàng thành công');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_pro`, `name`, `number`, `picture`, `category`, `date`, `price`, `des`) VALUES
(1, 'GIGABYTE Z390 AORUS Xtreme Waterforce LGA1151v2', 2283, 'ki.jpg', 'Main', '2024-04-16', 20590, 'Intel Z390 Gaming motherboard with 16 Phase IR Digital VRM, AORUS All-In-One Monoblock, RGB Fusion 2.0, 802.11ac Wireless, Intel Thunderbolt 3, ESS SABRE 9018K2M DAC, AQUANTIA® 10GbE LAN, RGB FAN COMMANDER, OC Touch'),
(2, 'ASUS ROG Zenith II Extreme', 2313, 'ki1.jpg', 'Main', '2024-04-16', 19370, 'AMD TRX40 E-ATX motherboard sTRX4 for 3rd Gen Ryzen Thread ripper, with 16 power stages, PCIe 4.0, Wi-Fi 6 (802.11ax), 10 Gbps Ethernet, USB3.2 Gen2x2, dual USB 3.2 front panel connector, five M.2, SATA and Aura Sync RGB.'),
(3, 'MSI MEG Z390 Godlike LGA1151v2', 2330, 'ki2.jpg', 'Main', '2024-04-16', 2369, '18-phase CPU power system with large heatsinks for cooling. Four PCI Express 3.0 x16 slots supporting 2-Way SLI or 4-Way CrossFire. There is a U.2 connector and three high-speed m.2 Ultra connectors with heatsinks. DAC ESS Saber ES9018.'),
(4, 'Intel Core i9 9900K 3.6GHz - 5GHz | 8C - 16T', 2356, 'of.png', 'CPU', '2024-04-16', 12900, ''),
(5, 'Intel Core i7 9700K 3.6GHz - 4.9GHz | 8C - 8T', 2360, 'of1.png', 'CPU', '2024-04-16', 9890, ''),
(6, 'INTEL CORE I5-9400 (2.9 UPTO 4.1GHZ/ 9MB /SOCKET 1', 2367, 'of2.png', 'CPU', '2024-04-16', 5690, ''),
(7, 'ROG Strix GeForce RTX 2080 Ti OC 11GB GDDR6', 2364, 'of4.png', 'GPU', '2024-04-16', 36990, ''),
(8, 'MSI RTX 2080TI Gaming X Trio 11GB GDDR6', 2364, 'of5.png', 'GPU', '2024-04-16', 33990, ''),
(9, 'SAMSUNG 970 Evo Plus 1TB M.2 NVMe', 2363, 'of30.png', 'SSD', '2024-04-16', 6190, ''),
(10, 'SAMSUNG 970 Pro 512GB M.2 NVMe', 2363, 'of31.png', 'SSD', '2024-04-16', 4349, ''),
(11, '(16G DDR4 3600 2x8G) G.SKILL Trident Z Neo', 2369, 'of32.png', 'RAM', '2024-04-16', 4990, ''),
(12, '(16GB DDR4 3200 2x8G) HyperX Fury RGB', 2369, 'of33.png', 'RAM', '2024-04-16', 2450, ''),
(13, 'WD Black 4TB SATA3 7200rpm', 2369, 'of34.png', 'HDD', '2024-04-16', 4930, ''),
(14, 'WD Black 1TB SATA3 7200rpm', 0, 'of35.png', 'HDD', '2024-04-16', 1900, ''),
(15, 'ASUS ROG Swift PG27VQ 27\" TN 2K 165Hz WQHD G-Sync', 2367, 'ki3.jpg', 'Monitor', '2024-04-16', 20490, ''),
(16, 'LG 34UC99-W 34\" IPS 2K FreeSync', 2369, 'ki4.jpg', 'Monitor', '2024-04-16', 16490, ''),
(17, 'SAMSUNG C34F791WQE 34\" VA 2K 100Hz FreeSync', 2369, 'ki5.jpg', 'Monitor', '2024-04-16', 12999, ''),
(18, 'ROG Strix PG27UQ 27\" IPS 4K 144Hz G-Sync', 2369, 'of8.png', 'Monitor', '2024-04-16', 69990, ''),
(19, 'SAMSUNG QLED LC49HG90 49\" 2K 144Hz', 2369, 'of10.png', 'Monitor', '2024-04-16', 29990, ''),
(20, 'CORSAIR K95 RGB Platinum Gunmetal', 2369, 'of38.png', 'Keyboard', '2024-04-16', 4290, ''),
(21, 'ASUS ROG Strix Flare Keyboard', 2369, 'of39.png', 'Keyboard', '2024-04-16', 3990, ''),
(22, 'Logitech G903 HERO Wireless', 2368, 'of40.png', 'Mouse', '2024-04-16', 3489, ''),
(23, 'ASUS ROG Gladius II Aura RGB', 2369, 'of41.png', 'Mouse', '0000-00-00', 1979, ''),
(24, 'ASUS ROG Strix Fusion 500 Virtual 7.1', 2369, 'of42.png', 'Headset', '2024-04-16', 4990, ''),
(25, 'KINGSTON HyperX Cloud II Grey Metal', 2369, 'of43.png', 'Headset', '2024-04-16', 2090, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `hobby` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `type`, `address`, `avatar`, `gender`, `hobby`, `email`) VALUES
(0, '123', '1', 0, '', '', '', '', 'mpeace6923@mail.anhsaoxanh.edu.vn'),
(0, 'fatb', '1', 0, 'Quảng Ninh', '', '', 'Game', 'macbinhzxc111@gmail.com'),
(0, 'Mạc Thanh Bình', '1', 0, 'Quảng Ninh', '', '', 'GameFootball', 'mpeace6923@mail.anhsaoxanh.edu.vn'),
(1, 'MPeace', '123', 0, 'Quảng Ninh', '', 'male', 'Game', ''),
(2, 'mtb', '123', 0, 'Quảng Ninh', '', '', 'GameFootball', 'okaylienminh@gmail.com'),
(0, 'thanhbinh', '1', 0, 'Quảng Ninh', '', '', 'Game', 'macbinhzxc111@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `ninom`
--
ALTER TABLE `ninom`
  ADD PRIMARY KEY (`id_nn`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_detail_ibfk_1` (`id_order`);

--
-- Indexes for table `order_pro`
--
ALTER TABLE `order_pro`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ninom`
--
ALTER TABLE `ninom`
  MODIFY `id_nn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_pro`
--
ALTER TABLE `order_pro`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_pro` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
