-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 14, 2020 lúc 07:46 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lisinhami_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_address`
--

CREATE TABLE `t_address` (
  `id` int(11) NOT NULL COMMENT 'Id địa chỉ',
  `id_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id user',
  `address1` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ chính',
  `address2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ phụ',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: Không xóa, 1: Xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_image`
--

CREATE TABLE `t_image` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_prd` int(11) NOT NULL COMMENT 'id Sản phẩm',
  `img_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link hình ảnh',
  `top_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ set hình ảnh mặc định (0: không set, 1: set default)',
  `banner_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ set hình ảnh banner (0: không set, 1: set)',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_order_detail`
--

CREATE TABLE `t_order_detail` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_odrh` int(11) NOT NULL COMMENT 'mã đơn hàng',
  `id_product` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `amount` int(11) NOT NULL DEFAULT 1 COMMENT 'Số lượng',
  `price` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Đơn giá',
  `tax` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Thuế suất',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_order_header`
--

CREATE TABLE `t_order_header` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_user` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mã user',
  `odr_date` date NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `paymnt_method` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức thanh toán',
  `shipping_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'đơn vị vận chuyển',
  `fee` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'phí ship',
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  `reciever` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên người nhận hàng',
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại người nhận hàng',
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ghi chú đơn hàng',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái đơn hàng (\r\n1: chờ xử lý xác nhận đơn hàng\r\n2: đã xử lý, chờ xuất hàng.\r\n3: đã xuất hàng chờ vận chuyển\r\n4: đang vận chuyển, chờ giao hàng\r\n5: Đang giao hàng\r\n6: Nhận hàng, hoàn thành đơn hàng\r\n0: Hủy đơn hàng\r\n)',
  `odr_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xác định đơn hàng (0: đơn hàng đã đăng nhập, 1 là đơn hàng không đăng nhập, 2 là đơn hàng sample)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_payment _method`
--

CREATE TABLE `t_payment _method` (
  `id` int(11) NOT NULL COMMENT 'id',
  `payment_cd` tinyint(3) NOT NULL COMMENT 'mã phương thức thanh toán',
  `method_paymnt` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Phương thức thanh toán',
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'link thân thiện',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_point`
--

CREATE TABLE `t_point` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `io_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xác định in_out\r\n(0: in, 1: out)',
  `point` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượng point',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_product`
--

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL COMMENT 'Id sản phẩm',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `category_cd` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Mã thể loại(1:sản phẩm mỹ phẩm, 2: sản phẩm dùng thử, 3: sản phẩm quà tặng)',
  `price` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Giá sản phẩm',
  `discount` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Giảm giá',
  `tax` tinyint(2) NOT NULL COMMENT 'Thuế ',
  `made_in` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Xuất xứ',
  `info_gen` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả',
  `info_dtl` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nội dung',
  `point` int(11) NOT NULL DEFAULT 0 COMMENT 'Điểm thưởng',
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'link thân thiện',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa (0: Không xóa,  1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_product`
--

INSERT INTO `t_product` (`id`, `name`, `category_cd`, `price`, `discount`, `tax`, `made_in`, `info_gen`, `info_dtl`, `point`, `slug`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
(1, 'Sản phẩm test', 1, '10000', '1000', 5, 'Viet Nam', 'abc', 'xyz', 10, 'San-pham-test', 0, '2020-08-14 06:49:29', '2020-08-14 06:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_reset_pass`
--

CREATE TABLE `t_reset_pass` (
  `id` int(11) NOT NULL COMMENT 'Id yêu cầu lấy lại mật khẩu',
  `id_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Id người dùng',
  `token` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chuỗi token',
  `timeout` int(11) NOT NULL COMMENT 'Thời gian hết hạn',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_shipping_unit`
--

CREATE TABLE `t_shipping_unit` (
  `id` int(11) NOT NULL COMMENT 'id',
  `ship_cd` tinyint(3) NOT NULL COMMENT 'mã đơn vị vận chuyển',
  `shipping_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'đơn vị vận chuyển',
  `fee` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'phí vận chuyển',
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link thân thiện',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_user`
--

CREATE TABLE `t_user` (
  `uid` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT ' Email người dùng',
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ tên người dùng',
  `gender` tinyint(1) NOT NULL COMMENT 'Giới tính(0: Nữ, 1:Nam)',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'số điện thoại',
  `admin_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ admin(0: user, 1:admin)',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: Không xóa, 1:Xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `t_address`
--
ALTER TABLE `t_address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_image`
--
ALTER TABLE `t_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_order_header`
--
ALTER TABLE `t_order_header`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_payment _method`
--
ALTER TABLE `t_payment _method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_point`
--
ALTER TABLE `t_point`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_reset_pass`
--
ALTER TABLE `t_reset_pass`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_shipping_unit`
--
ALTER TABLE `t_shipping_unit`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `t_address`
--
ALTER TABLE `t_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id địa chỉ';

--
-- AUTO_INCREMENT cho bảng `t_image`
--
ALTER TABLE `t_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `t_order_header`
--
ALTER TABLE `t_order_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `t_payment _method`
--
ALTER TABLE `t_payment _method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `t_point`
--
ALTER TABLE `t_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id sản phẩm', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `t_reset_pass`
--
ALTER TABLE `t_reset_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id yêu cầu lấy lại mật khẩu';

--
-- AUTO_INCREMENT cho bảng `t_shipping_unit`
--
ALTER TABLE `t_shipping_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
