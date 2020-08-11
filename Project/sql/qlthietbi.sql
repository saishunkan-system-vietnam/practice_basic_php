-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 11:56 AM
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
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update',
  `time_token` datetime NOT NULL COMMENT 'Thời gian tồn tại của token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`id`, `user_name`, `password`, `email`, `address`, `avatar`, `del_flg`, `admin_flg`, `token`, `create_datetime`, `update_datetime`, `time_token`) VALUES
(1, 'NhanVP', '1', 'shadowin1811@gmail.com', 'Phú thượng', '', b'0', b'1', '', '2020-07-22 10:55:14', '2020-08-10 23:42:15', '2020-08-09 00:00:00'),
(2, 'NhanVIP', 'Nhan1235@', 'phungnhan0935488044@gmail.com', NULL, NULL, b'0', b'0', 'bad2a4ad53dcdb97', '2020-07-22 10:55:21', '2020-08-11 15:01:43', '2020-08-11 15:01:43'),
(3, 'phungNhanV', 'Nhan7895#', 'vophungnhan95@gmail.com', NULL, NULL, b'0', b'1', NULL, '2020-07-30 13:59:26', '2020-08-11 14:36:26', '2020-08-09 00:00:00'),
(4, 'NhanVPP', 'Nhan1478@', 'shadowin18111@gmail.com', NULL, NULL, b'1', b'0', NULL, '2020-07-30 14:00:25', '2020-08-10 14:29:47', '2020-08-09 00:00:00'),
(5, 'NhanVP1', 'Nhan12369@', 'shadowin18211@gmail.com', '', NULL, b'0', b'1', NULL, '2020-07-30 14:06:49', '2020-08-10 23:02:00', '2020-08-09 00:00:00'),
(6, 'NhanVP2', 'Nhan2822#', 'shadowin1821911@gmail.com', 'Phú Thượng', 'doboafnuoicon_5.jpg', b'0', b'1', NULL, '2020-08-07 20:05:46', '2020-08-11 16:46:32', '2020-08-09 00:00:00'),
(7, 'NhanVP4', 'Nhan2733@', 'shadowin1821922211@gmail.com', 'Phú Thượng', '', b'1', b'1', NULL, '2020-08-10 23:41:47', '2020-08-10 23:41:53', '0000-00-00 00:00:00');

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
  `device_name` varchar(500) NOT NULL COMMENT 'Tên thiết bị',
  `id_category` int(11) NOT NULL COMMENT 'Id thể loại',
  `id_supplier` int(11) DEFAULT NULL COMMENT 'Id nhà cung cấp',
  `del_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Cờ xóa. 1: xóa, 0: không xóa',
  `img` text DEFAULT NULL COMMENT 'Ảnh thiết bị',
  `info` text DEFAULT NULL,
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_device`
--

INSERT INTO `t_device` (`id`, `device_name`, `id_category`, `id_supplier`, `del_flg`, `img`, `info`, `create_datetime`, `update_datetime`) VALUES
(1, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL, 'Nhà sản xuất - Model\r\n\r\nDELL inc\r\nDell Optiplex 9010 ALL IN ONE\r\n\r\nModel\r\n\r\nIntel® Q77 Express Chipset\r\n \r\nCPU - Bộ vi xử lý\r\n\r\nIntel® Core i5® 3470s\r\n\r\n( Xung nhịp tối đa 3.6Ghz, Bộ đệm 6Mb L2, 64 Bits)\r\nCHÍP THẾ HỆ 3 CỰC NHANH\r\n\r\nBộ vi sử lý thế hệ 3 cực nhanh,  4 lõi 4 luồng ( 4CPUs ) băng thông lên đến 5Gt/s công nghệ 22nm, cực mát.\r\n\r\nBộ nhớ trong ( RAM\r\n\r\n4Gb DDR3 Dual Chanel \r\n\r\nTổng số 2 chân cắm ram, cho phép nâng cấp tối đa 16 Gb ram DDR3\r\n\r\nỔ đĩa cứng\r\n\r\n500Gb HDD chuẩn SATA\r\n\r\nMàn hình hiển thị\r\n\r\nMÀN HÌNH  WIDE LED 23 inchs \r\nFULL HD 1920 x 1080\r\n\r\nMàn hình cực đẹp, công nghệ chống lóa cao cấp \r\n\r\nGiao tiếp mạng\r\n\r\nWIFI + Integrated Intel® 82579LM Ethernet LAN 10/100/1000\r\n\r\nỔ đĩa Quang\r\n\r\nDVD hoặc DVD Combo, nếu có ổ Ghi DVD không tính thêm tiền\r\n\r\nLOA\r\n\r\nSTEREO SPEAKER 2.0 Giả lập 3D - JBL, HAMAN KADON\r\n\r\nĐiều khiển âm thanh\r\n\r\nIntel HD Audio\r\n\r\nHỗ trợ 2 đường ra âm thanh, 2 đường vào cho Mic và Stereo\r\n\r\nCác kết nối hỗ trợ\r\n\r\n4 cổng USB 3.0 ( 2 trước - 2 sau ), 6 cổng USB 2.0, 1 RJ45, 1 cổng Serial ( COM), 1 cổng VGA, 2 cổng DisplayPort, 2 cổng PS2, 2 đường vào cho MIC và Stereo, 2 đường ra âm thanh, Hỗ trợ Parallel/ Serial Port', '2020-07-29 10:53:12', '2020-08-03 16:52:00'),
(2, 'Balo Leo núi', 3, 2, b'0', NULL, NULL, '2020-07-29 10:53:53', '2020-08-03 16:51:19'),
(3, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:12', '2020-08-03 16:50:09'),
(4, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:15', '2020-07-29 10:54:45'),
(5, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:18', '2020-07-29 10:54:47'),
(6, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:20', '2020-08-03 16:50:20'),
(7, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:22', '2020-07-29 10:54:52'),
(8, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:25', '2020-07-29 10:54:53'),
(9, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL, NULL, '2020-07-29 10:54:27', '2020-08-03 16:46:45'),
(10, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL, NULL, '2020-07-29 10:54:29', '2020-08-03 16:47:24'),
(11, 'Balo Leo núi', 3, 2, b'0', NULL, NULL, '2020-07-29 10:54:31', '2020-07-29 10:54:58'),
(12, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL, NULL, '2020-07-29 10:54:34', '2020-07-29 10:55:01'),
(13, 'Máy Tính Desknote DELL OptiPlex 9010', 1, 4, b'0', NULL, NULL, '2020-07-29 10:54:36', '2020-07-29 10:55:04'),
(14, 'Máy tính để bàn Dell Vostro 3470 Core i5', 1, 4, b'0', NULL, NULL, '2020-07-30 10:52:41', '2020-07-30 10:52:41'),
(15, 'Laptop DELL E5450', 1, 1, b'0', '', NULL, '2020-07-31 15:03:15', '2020-08-03 16:50:35'),
(16, 'Laptop DELL E5450', 1, 1, b'0', '', NULL, '2020-07-31 15:03:53', '2020-08-03 16:43:31'),
(17, 'Laptop DELL E5450', 1, 1, b'0', '', NULL, '2020-07-31 15:14:13', '2020-08-03 16:50:30'),
(18, 'Laptop DELL E5450', 1, 1, b'0', '', NULL, '2020-07-31 15:29:46', '2020-08-03 16:51:12'),
(19, 'Laptop DELL E5450', 2, 1, b'0', '', NULL, '2020-07-31 15:29:56', NULL),
(20, '	 Laptop DELL E5450', 2, 3, b'0', '', NULL, '2020-08-03 15:38:37', '2020-08-03 16:39:38'),
(21, '	 Laptop DELL E5450', 3, 4, b'0', '', NULL, '2020-08-03 15:55:47', '2020-08-03 16:40:23'),
(22, 'Bộ đồ bảo hộ lao động VIP', 1, 1, b'1', '', NULL, '2020-08-03 15:56:07', '2020-08-03 16:41:50'),
(23, 'Bộ đồ bảo hộ lao động VIP', 2, 2, b'0', '', '<p><strong>1232</strong></p>', '2020-08-03 15:58:01', '2020-08-05 11:19:13'),
(24, 'Laptop DELL E5450', 1, 1, b'0', '', '', '2020-08-04 13:41:19', '2020-08-05 11:16:23'),
(25, 'Laptop DELL E5450', 1, 1, b'0', '53445_bo_luu_dien_ups_prolink_pro700sfc.jpg', '', '2020-08-04 13:41:26', '2020-08-11 16:11:03'),
(26, 'Bộ đồ leo núi VIP (bản giới hạn)', 3, 2, b'1', 'dell vostro.jpeg', '<p>Được sản xuất tại Paris chỉ c&oacute; 2 bản tr&ecirc;n thế giới</p>', '2020-08-05 10:49:10', '2020-08-07 21:12:48'),
(27, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 1, b'0', 'dell vostro.jpeg', '<p><em><s>&Aacute;dsadasd</s></em></p>\n\n<p>&nbsp;</p>', '2020-08-07 21:15:53', '2020-08-09 21:48:16'),
(29, 'Bộ đồ leo núi VIP (bản giới hạn)', 1, 3, b'1', 'avatar_null.png', '<p><strong>&eacute;dfsdfs</strong></p>', '2020-08-07 21:43:21', '2020-08-11 09:58:11'),
(30, 'Bộ Dụng Cụ Sinh Tồn Dã Ngoại 13 Trong 1 (13 Cái)', 3, 3, b'0', 'đồ leo núi.jpg', '', '2020-08-07 21:56:30', '2020-08-11 09:58:05'),
(31, 'Máy in laser Brother HL-L2321D', 1, 1, b'0', 'may-in-brother-hl-l2321.jpg', '<h2><strong>Đặc điểm nổi bật</strong></h2>\n\n<ul>\n	<li>D&ugrave;ng mực Brother TN-2385 ch&iacute;nh h&atilde;ng, tăng tuổi thọ của m&aacute;y</li>\n	<li>Tốc độ in vượt trội đến 30 trang/ph&uacute;t, tiết kiệm thời gian in</li>\n	<li>Độ ph&acirc;n giải 2400x600 cho chất lượng bản in r&otilde; n&eacute;t</li>\n	<li>T&iacute;nh năng in đảo mặt tự động tiết kiệm chi ph&iacute; giấy in</li>\n</ul>\n\n<p>&nbsp;</p>', '2020-08-07 21:58:59', '2020-08-11 09:29:14'),
(32, 'Bộ đồ leo núi VIP (bản giới hạn)', 2, 3, b'1', '', '', '2020-08-10 23:41:00', '2020-08-10 23:41:05'),
(33, 'Khung ảnh', 1, 1, b'0', 'doboafnuoicon_1.jpg', '', '2020-08-11 14:33:40', '2020-08-11 16:47:24'),
(34, 'Bộ đồ bảo hộ lao động VIP', 1, 1, b'1', '', '', '2020-08-11 16:48:01', '2020-08-11 16:48:29'),
(35, 'Bộ đồ bảo hộ lao động VIP', 1, 1, b'1', 'doboafnuoicon_7.jpg', '', '2020-08-11 16:48:13', '2020-08-11 16:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `t_loan`
--

CREATE TABLE `t_loan` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `id_account` int(11) NOT NULL COMMENT 'Id tài khoản',
  `loan_date` datetime NOT NULL COMMENT 'Ngày mượn',
  `intend_date` datetime DEFAULT NULL COMMENT 'Ngày hẹn trả',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_loan`
--

INSERT INTO `t_loan` (`id`, `id_account`, `loan_date`, `intend_date`, `create_datetime`, `update_datetime`) VALUES
(1, 1, '2020-07-27 00:00:00', '2020-08-19 00:00:00', '2020-07-27 14:23:46', NULL),
(2, 1, '2020-07-27 00:00:00', '2020-08-26 00:00:00', '2020-07-29 10:59:20', NULL),
(21, 1, '2020-07-27 00:00:00', '2020-08-26 00:00:00', '2020-07-29 10:59:23', NULL),
(22, 1, '2020-07-27 00:00:00', '2020-08-26 00:00:00', '2020-07-29 10:59:43', NULL),
(24, 1, '2020-07-27 00:00:00', '2020-08-26 00:00:00', '2020-07-29 11:59:19', NULL),
(25, 1, '2020-07-27 00:00:00', '2020-08-26 00:00:00', '2020-07-29 12:59:19', NULL),
(26, 2, '2020-07-27 00:00:00', '2020-08-26 00:00:00', '2020-07-29 13:00:19', NULL),
(27, 1, '2020-07-29 00:00:00', '2020-08-26 00:00:00', '2020-07-29 13:02:19', NULL),
(28, 1, '2020-07-29 00:00:00', '2020-08-26 00:00:00', '2020-07-29 13:09:19', NULL),
(29, 1, '2020-07-29 00:00:00', '2020-08-26 00:00:00', '2020-07-29 23:08:48', NULL),
(30, 1, '2020-07-30 00:00:00', '2020-08-26 00:00:00', '2020-07-30 14:22:42', NULL),
(31, 1, '2020-07-30 00:00:00', '2020-08-26 00:00:00', '2020-07-30 14:24:23', NULL),
(32, 1, '2020-07-30 00:00:00', '2020-08-26 00:00:00', '2020-07-30 14:32:10', NULL),
(33, 1, '2020-07-30 00:00:00', '2020-08-26 00:00:00', '2020-07-30 15:37:14', NULL),
(34, 1, '2020-07-31 00:00:00', '2020-08-26 00:00:00', '2020-07-31 14:39:01', NULL),
(35, 1, '2020-08-04 00:00:00', '2020-08-26 00:00:00', '2020-08-04 11:22:24', NULL),
(36, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:33:25', NULL),
(37, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:33:47', NULL),
(38, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:35:11', NULL),
(39, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:55:46', NULL),
(40, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:56:02', NULL),
(41, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:56:44', NULL),
(42, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 16:59:21', NULL),
(43, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 17:02:00', NULL),
(44, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 17:03:22', NULL),
(45, 1, '2020-08-04 00:00:00', '0000-00-00 00:00:00', '2020-08-04 17:05:55', NULL),
(46, 1, '2020-08-04 00:00:00', '2020-08-04 00:00:00', '2020-08-04 17:08:33', NULL),
(47, 1, '2020-08-04 00:00:00', '2020-08-19 00:00:00', '2020-08-04 17:09:43', NULL),
(48, 1, '2020-08-05 00:00:00', '2020-08-05 00:00:00', '2020-08-05 15:55:20', NULL),
(49, 1, '2020-08-05 00:00:00', '2020-08-05 00:00:00', '2020-08-05 15:56:34', NULL),
(50, 1, '2020-08-05 00:00:00', '2020-08-05 00:00:00', '2020-08-05 16:12:02', NULL),
(51, 1, '2020-08-11 00:00:00', '2020-08-11 00:00:00', '2020-08-11 10:49:32', NULL),
(52, 1, '2020-08-11 00:00:00', '2020-08-04 00:00:00', '2020-08-11 10:49:50', NULL),
(53, 1, '2020-08-11 00:00:00', '2020-08-11 00:00:00', '2020-08-11 13:11:29', NULL),
(54, 1, '2020-08-11 00:00:00', '2020-08-11 00:00:00', '2020-08-11 13:11:36', NULL),
(55, 1, '2020-08-11 00:00:00', '2020-08-11 00:00:00', '2020-08-11 13:11:40', NULL),
(56, 1, '2020-08-11 13:45:56', '2020-08-11 00:00:00', '2020-08-11 13:45:56', NULL),
(57, 1, '2020-08-11 14:32:32', '2020-08-07 00:00:00', '2020-08-11 14:32:32', NULL),
(58, 1, '2020-08-11 15:13:24', '2020-08-11 00:00:00', '2020-08-11 15:13:24', NULL),
(59, 1, '2020-08-11 16:48:38', '2020-08-11 00:00:00', '2020-08-11 16:48:38', NULL);

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
  `pay_date` datetime DEFAULT NULL COMMENT 'Ngày trả',
  `del_flg` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Cờ xóa. 1: true, 0: false',
  `reason` text NOT NULL COMMENT 'Lý do mượn',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian tạo',
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_loan_detail`
--

INSERT INTO `t_loan_detail` (`id`, `id_loan`, `id_device`, `amount`, `pay_flg`, `pay_date`, `del_flg`, `reason`, `create_datetime`, `update_datetime`) VALUES
(2, 1, 2, 1, b'0', NULL, b'0', '', '2020-07-29 11:20:21', '2020-08-10 20:37:46'),
(11, 30, 14, 4, b'0', NULL, b'1', '<p>Lại l&agrave; chơi game</p>', '2020-07-30 14:22:42', '2020-08-10 20:05:32'),
(12, 31, 3, 1, b'0', NULL, b'1', '', '2020-07-30 14:24:23', NULL),
(13, 32, 8, 1, b'0', NULL, b'1', '', '2020-07-30 14:32:10', '2020-08-10 20:03:55'),
(14, 33, 1, 1, b'0', NULL, b'1', '', '2020-07-30 15:37:14', '2020-08-10 20:22:13'),
(15, 34, 1, 1, b'0', NULL, b'1', '', '2020-07-31 14:39:01', '2020-08-10 20:22:13'),
(16, 35, 4, 1, b'0', NULL, b'1', '', '2020-08-04 11:22:24', '2020-08-10 20:03:23'),
(17, 42, 23, 1, b'0', NULL, b'1', '', '2020-08-04 16:59:21', '2020-08-10 20:07:33'),
(18, 43, 25, 1, b'0', NULL, b'1', '', '2020-08-04 17:02:00', '2020-08-10 20:16:35'),
(19, 44, 24, 1, b'0', NULL, b'1', '', '2020-08-04 17:03:22', '2020-08-10 20:07:48'),
(20, 45, 25, 1, b'0', NULL, b'1', '', '2020-08-04 17:05:55', '2020-08-10 20:16:35'),
(21, 46, 25, 1, b'0', NULL, b'1', '', '2020-08-04 17:08:33', '2020-08-10 20:16:35'),
(22, 47, 13, 5, b'0', NULL, b'1', '<p>Training thi đấu</p>', '2020-08-04 17:09:43', '2020-08-10 20:05:06'),
(23, 48, 18, 1, b'0', NULL, b'1', '<p>Chơi game theo team</p>', '2020-08-05 15:55:20', '2020-08-10 20:06:01'),
(24, 49, 19, 1, b'0', NULL, b'1', '', '2020-08-05 15:56:34', '2020-08-10 20:06:17'),
(25, 50, 26, 1, b'0', NULL, b'1', '', '2020-08-05 16:12:02', '2020-08-10 20:17:00'),
(26, 51, 31, 7, b'0', NULL, b'0', '', '2020-08-11 10:49:32', NULL),
(27, 52, 15, 3, b'0', NULL, b'1', '', '2020-08-11 10:49:50', '2020-08-11 14:34:43'),
(28, 53, 31, 1, b'1', '2020-08-11 00:00:00', b'0', '', '2020-08-11 13:11:29', '2020-08-11 13:45:50'),
(29, 54, 1, 1, b'1', '2020-08-11 00:00:00', b'0', '', '2020-08-11 13:11:36', '2020-08-11 13:46:14'),
(30, 55, 1, 1, b'1', '2020-08-11 00:00:00', b'0', '', '2020-08-11 13:11:40', '2020-08-11 13:42:59'),
(31, 56, 1, 1, b'1', '2020-08-11 00:00:00', b'0', '', '2020-08-11 13:45:56', '2020-08-11 16:49:46'),
(32, 57, 31, 4, b'0', NULL, b'0', '<p>sadsdas</p>', '2020-08-11 14:32:32', NULL),
(33, 58, 1, 1, b'0', NULL, b'0', '', '2020-08-11 15:13:24', NULL),
(34, 59, 33, 1, b'0', NULL, b'0', '', '2020-08-11 16:48:38', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_device`
--
ALTER TABLE `t_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `t_loan`
--
ALTER TABLE `t_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `t_loan_detail`
--
ALTER TABLE `t_loan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=35;

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
