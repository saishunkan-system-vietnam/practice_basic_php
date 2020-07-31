-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 12:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlthietbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_account`
--

CREATE TABLE `t_account` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `user_name` text NOT NULL COMMENT 'Tên đăng nhập',
  `password` text NOT NULL COMMENT 'Mật khẩu',
  `email` text NOT NULL COMMENT 'Email',
  `address` text DEFAULT NULL COMMENT 'Địa chỉ',
  `avatar` text DEFAULT NULL COMMENT 'Ảnh đại diện',
  `del_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Cờ xóa. 1: xóa, 0: không xóa',
  `admin_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Quyền admin. 1: có quyền, 0: không có quyền',
  `token` text DEFAULT NULL COMMENT 'Chuỗi token',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`id`, `user_name`, `password`, `email`, `address`, `avatar`, `del_flg`, `admin_flg`, `token`, `create_datetime`, `update_datetime`) VALUES
(1, 'NhanVP', 'admin123@', 'shadowin1811@gmail.com', 'Phú thượng', NULL, b'0', b'1', '', '2020-07-22 10:55:14', NULL),
(2, 'NhanVIP', 'Nhan1475#', 'phungnhan0935488044@gmail.com', NULL, NULL, b'0', b'0', '24cceab7ffc1118f', '2020-07-22 10:55:21', '2020-07-30 13:50:43'),
(3, 'phungNhanV', 'Nhan7895#', 'vophungnhan95@gmail.com', NULL, NULL, b'0', b'0', NULL, '2020-07-30 13:59:26', NULL),
(4, 'NhanVPP', 'Nhan1478@', 'shadowin18111@gmail.com', NULL, NULL, b'0', b'0', NULL, '2020-07-30 14:00:25', NULL),
(5, 'NhanVP1', 'Nhan12369@', 'shadowin18211@gmail.com', NULL, NULL, b'0', b'0', NULL, '2020-07-30 14:06:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `category_name` text NOT NULL COMMENT 'Tên thể loại',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id`, `category_name`, `create_datetime`, `update_datetime`) VALUES
(1, 'Thiết bị văn phòng', '2020-07-22 10:55:31', NULL),
(2, 'Thiết bị bảo hộ cá nhân', '2020-07-22 10:55:34', NULL),
(3, 'Thiết bị leo núi', '2020-07-22 10:55:36', NULL),
(5, 'Thiết bị điện tử', '2020-07-22 10:55:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_device`
--

CREATE TABLE `t_device` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `device_name` text NOT NULL COMMENT 'Tên thiết bị',
  `id_category` int(11) NOT NULL COMMENT 'Id thể loại',
  `id_supplier` int(11) DEFAULT NULL COMMENT 'Id nhà cung cấp',
  `del_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Cờ xóa. 1: xóa, 0: không xóa',
  `img` text DEFAULT NULL COMMENT 'Ảnh thiết bị',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_device`
--

INSERT INTO `t_device` (`id`, `device_name`, `id_category`, `id_supplier`, `del_flg`, `img`, `create_datetime`, `update_datetime`) VALUES
(1, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL, '2020-07-29 10:53:12', '2020-07-29 10:53:21'),
(2, 'Balo Leo núi', 3, 2, b'0', NULL, '2020-07-29 10:53:53', '2020-07-29 10:53:53'),
(3, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:12', '2020-07-29 10:54:42'),
(4, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:15', '2020-07-29 10:54:45'),
(5, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:18', '2020-07-29 10:54:47'),
(6, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:20', '2020-07-29 10:54:50'),
(7, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:22', '2020-07-29 10:54:52'),
(8, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:25', '2020-07-29 10:54:53'),
(9, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL, '2020-07-29 10:54:27', '2020-07-29 10:54:55'),
(10, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL, '2020-07-29 10:54:29', '2020-07-29 10:54:57'),
(11, 'Balo Leo núi', 3, 2, b'0', NULL, '2020-07-29 10:54:31', '2020-07-29 10:54:58'),
(12, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, '2020-07-29 10:54:34', '2020-07-29 10:55:01'),
(13, 'Máy Tính Desknote DELL OptiPlex 9010', 1, 4, b'0', NULL, '2020-07-29 10:54:36', '2020-07-29 10:55:04'),
(14, 'Máy tính để bàn Dell Vostro 3470 Core i5', 1, 4, b'0', NULL, '2020-07-30 10:52:41', '2020-07-30 10:52:41'),
(15, 'Laptop DELL E5450', 1, 1, b'0', '', '2020-07-31 15:03:15', NULL),
(16, 'Laptop DELL E5450', 1, 1, b'0', '', '2020-07-31 15:03:53', NULL),
(17, 'Laptop DELL E5450', 1, 1, b'0', '', '2020-07-31 15:14:13', NULL),
(18, 'Laptop DELL E5450', 1, 1, b'0', '', '2020-07-31 15:29:46', NULL),
(19, 'Laptop DELL E5450', 2, 1, b'0', '', '2020-07-31 15:29:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_loan`
--

CREATE TABLE `t_loan` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `id_account` int(11) NOT NULL COMMENT 'Id tài khoản',
  `loan_date` date NOT NULL COMMENT 'Ngày mượn',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_loan`
--

INSERT INTO `t_loan` (`id`, `id_account`, `loan_date`, `create_datetime`, `update_datetime`) VALUES
(1, 1, '2020-07-27', '2020-07-27 14:23:46', NULL),
(2, 1, '2020-07-27', '2020-07-29 10:59:19', NULL),
(21, 1, '2020-07-27', '2020-07-29 10:59:19', NULL),
(22, 1, '2020-07-27', '2020-07-29 10:59:19', NULL),
(23, 1, '2020-07-27', '2020-07-29 10:59:19', NULL),
(24, 1, '2020-07-27', '2020-07-29 10:59:19', NULL),
(25, 1, '2020-07-27', '2020-07-29 10:59:19', NULL),
(26, 2, '2020-07-27', '2020-07-29 10:59:19', NULL),
(27, 1, '2020-07-29', '2020-07-29 10:59:19', NULL),
(28, 1, '2020-07-29', '2020-07-29 10:59:19', NULL),
(29, 1, '2020-07-29', '2020-07-29 10:59:19', NULL),
(30, 1, '2020-07-30', '2020-07-30 14:22:42', NULL),
(31, 1, '2020-07-30', '2020-07-30 14:24:23', NULL),
(32, 1, '2020-07-30', '2020-07-30 14:32:10', NULL),
(33, 1, '2020-07-30', '2020-07-30 15:37:14', NULL),
(34, 1, '2020-07-31', '2020-07-31 14:39:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_loan_detail`
--

CREATE TABLE `t_loan_detail` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `id_loan` int(11) NOT NULL COMMENT 'Id mượn',
  `id_device` int(11) NOT NULL COMMENT 'Id thiết bị',
  `amount` int(11) NOT NULL COMMENT 'Số lượng',
  `pay_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Cờ trả. 1: đã trả, 0: chưa trả',
  `pay_date` date DEFAULT NULL COMMENT 'Ngày trả',
  `del_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Cờ xóa. 1: true, 0: false',
  `reason` text NOT NULL COMMENT 'Lý do mượn',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_loan_detail`
--

INSERT INTO `t_loan_detail` (`id`, `id_loan`, `id_device`, `amount`, `pay_flg`, `pay_date`, `del_flg`, `reason`, `create_datetime`, `update_datetime`) VALUES
(1, 1, 2, 2, b'0', NULL, b'0', 'Leo núi', '2020-07-29 11:00:21', NULL),
(2, 1, 2, 1, b'0', NULL, b'0', '', '2020-07-29 11:00:21', NULL),
(3, 1, 1, 3, b'0', NULL, b'0', '', '2020-07-29 11:00:21', NULL),
(4, 1, 1, 1, b'0', NULL, b'0', '<p>Chơi game</p>', '2020-07-29 11:00:21', NULL),
(5, 24, 1, 1, b'0', NULL, b'0', '<p>Chơi game</p>', '2020-07-29 11:00:21', NULL),
(6, 25, 11, 10, b'0', NULL, b'0', '<p>Đi lao n&uacute;i cuối tuần</p>', '2020-07-29 11:00:21', NULL),
(7, 26, 7, 1, b'0', NULL, b'0', '<p>Đi l&agrave;m thợ nề</p>', '2020-07-29 11:00:21', NULL),
(8, 27, 1, 1, b'0', NULL, b'0', '', '2020-07-29 11:00:21', NULL),
(9, 28, 1, 1, b'0', NULL, b'0', '<p><strong>Chơi ở nh&agrave; sướng hơn</strong></p>', '2020-07-29 11:00:21', NULL),
(10, 29, 1, 1, b'0', NULL, b'0', '<p><s><em><strong>chơi</strong></em></s></p>', '2020-07-29 11:00:21', NULL),
(11, 30, 14, 4, b'0', NULL, b'0', '<p>Lại l&agrave; chơi game</p>', '2020-07-30 14:22:42', NULL),
(12, 31, 3, 1, b'0', NULL, b'0', '', '2020-07-30 14:24:23', NULL),
(13, 32, 8, 1, b'0', NULL, b'0', '', '2020-07-30 14:32:10', NULL),
(14, 33, 1, 1, b'0', NULL, b'0', '', '2020-07-30 15:37:14', NULL),
(15, 34, 1, 1, b'0', NULL, b'0', '', '2020-07-31 14:39:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_supplier`
--

CREATE TABLE `t_supplier` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `supplier_name` text NOT NULL COMMENT 'Tên nhà cung cấp',
  `email` text DEFAULT NULL COMMENT 'Email',
  `phone_number` varchar(11) DEFAULT NULL COMMENT 'Số điện thoại',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_supplier`
--

INSERT INTO `t_supplier` (`id`, `supplier_name`, `email`, `phone_number`, `create_datetime`, `update_datetime`) VALUES
(1, 'Công ty TNHH Tin học Mai Hoàng', NULL, NULL, '2020-07-22 11:01:21', NULL),
(2, 'Balo Túi Nữ Thời Trang Thái Hà', NULL, NULL, '2020-07-22 11:01:21', NULL),
(3, 'Công ty TNHH MTV Thiên Kỳ Tâm', NULL, NULL, '2020-07-22 11:01:21', NULL),
(4, 'Công ty TNHH Kỹ Thuật Tin Học Nhất Thiên', NULL, NULL, '2020-07-22 11:01:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_account`
--
ALTER TABLE `t_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_device`
--
ALTER TABLE `t_device`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `t_loan`
--
ALTER TABLE `t_loan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `t_loan_detail`
--
ALTER TABLE `t_loan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loan` (`id_loan`),
  ADD KEY `id_device` (`id_device`);

--
-- Indexes for table `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_account`
--
ALTER TABLE `t_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_device`
--
ALTER TABLE `t_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_loan`
--
ALTER TABLE `t_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `t_loan_detail`
--
ALTER TABLE `t_loan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_supplier`
--
ALTER TABLE `t_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_device`
--
ALTER TABLE `t_device`
  ADD CONSTRAINT `t_device_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `t_category` (`id`),
  ADD CONSTRAINT `t_device_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `t_supplier` (`id`);

--
-- Constraints for table `t_loan`
--
ALTER TABLE `t_loan`
  ADD CONSTRAINT `t_loan_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `t_account` (`id`);

--
-- Constraints for table `t_loan_detail`
--
ALTER TABLE `t_loan_detail`
  ADD CONSTRAINT `t_loan_detail_ibfk_1` FOREIGN KEY (`id_loan`) REFERENCES `t_loan` (`id`),
  ADD CONSTRAINT `t_loan_detail_ibfk_2` FOREIGN KEY (`id_device`) REFERENCES `t_device` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
