-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 10:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lisinhami_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_address`
--

CREATE TABLE `t_address` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Id địa chỉ',
  `address_cd1` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Mã địa chỉ chính',
  `address_cd2` tinyint(1) NOT NULL DEFAULT 2 COMMENT 'Mã địa chỉ phụ',
  `address1` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ chính',
  `address2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ phụ',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: Không xóa, 1: Xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_image`
--

CREATE TABLE `t_image` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `id_prd` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id Sản phẩm',
  `img_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link hình ảnh',
  `top_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ set hình ảnh mặc định (0: không set, 1: set default)',
  `banner_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ set hình ảnh banner (0: không set, 1: set)',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_odrd`
--

CREATE TABLE `t_odrd` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `id_odrh` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã đơn hàng',
  `id_prd` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sản phẩm',
  `amount` int(11) NOT NULL DEFAULT 1 COMMENT 'Số lượng',
  `price` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Đơn giá',
  `tax` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Thuế suất',
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_odrh`
--

CREATE TABLE `t_odrh` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `odr_cd` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã đơn hàng',
  `id_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã user',
  `odr_date` date NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `paymnt_method` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức thanh toán',
  `shipping_unit` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'đơn vị vận chuyển',
  `fee` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'phí ship',
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  `reciever` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên người nhận hàng',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại người nhận hàng',
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ghi chú đơn hàng',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái đơn hàng (\r\n1: chờ xử lý xác nhận đơn hàng\r\n2: đã xử lý, chờ xuất hàng.\r\n3: đã xuất hàng chờ vận chuyển\r\n4: đang vận chuyển, chờ giao hàng\r\n5: Đang giao hàng\r\n6: Nhận hàng, hoàn thành đơn hàng\r\n0: Hủy đơn hàng\r\n)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_payment _method`
--

CREATE TABLE `t_payment _method` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `payment_cd` int(11) NOT NULL COMMENT 'mã phương thức thanh toán',
  `method` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Phương thức thanh toán',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_point`
--

CREATE TABLE `t_point` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `id_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `io_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xác định in_out\r\n(0: in, 1: out)',
  `point` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượng point',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Id sản phẩm',
  `prd_cd` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã sản phẩm',
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `category_cd` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Mã thể loại(1:sản phẩm mỹ phẩm, 2: sản phẩm dùng thử, 3: sản phẩm quà tặng)',
  `price` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Giá sản phẩm',
  `discount` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Giảm giá',
  `tax` tinyint(2) NOT NULL COMMENT 'Thuế ',
  `made_in` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Xuất xứ',
  `info_gen` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả',
  `info_dtl` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nội dung',
  `point` int(11) NOT NULL DEFAULT 0 COMMENT 'Điểm thưởng',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa (0: Không xóa,  1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_reset_pass`
--

CREATE TABLE `t_reset_pass` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Id đổi mật khẩu',
  `id_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Id người dùng',
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chuỗi token',
  `timeout` datetime NOT NULL COMMENT 'Thời gian hết hạn',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_shipping_unit`
--

CREATE TABLE `t_shipping_unit` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `ship_cd` int(11) NOT NULL COMMENT 'mã đơn vị vận chuyển',
  `shipping_unit` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'đơn vị vận chuyển',
  `fee` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'phí vận chuyển',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `uid` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT ' Email người dùng',
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ tên người dùng',
  `gender` tinyint(1) NOT NULL COMMENT 'Giới tính(0: Nữ, 1:Nam)',
  `id_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id địa chỉ',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'số điện thoại',
  `admin_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ admin(0: user, 1:admin)',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: Không xóa, 1:Xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_address`
--
ALTER TABLE `t_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_image`
--
ALTER TABLE `t_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_odrd`
--
ALTER TABLE `t_odrd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_odrh`
--
ALTER TABLE `t_odrh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_payment _method`
--
ALTER TABLE `t_payment _method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_point`
--
ALTER TABLE `t_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_reset_pass`
--
ALTER TABLE `t_reset_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_shipping_unit`
--
ALTER TABLE `t_shipping_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
