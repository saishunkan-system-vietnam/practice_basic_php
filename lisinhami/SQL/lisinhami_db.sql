-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 21, 2020 lúc 07:36 PM
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

--
-- Đang đổ dữ liệu cho bảng `t_image`
--

INSERT INTO `t_image` (`id`, `id_prd`, `img_url`, `top_flg`, `banner_flg`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
(38, 1, '1/24d06bb1ac3e54600d2f-17022020113338.png', 1, 0, 1, '2020-08-18 02:30:53', '2020-08-19 09:35:48'),
(40, 1, '1/a27fad5a88a770f929b6-17022020113549.png', 0, 0, 1, '2020-08-18 02:33:23', '2020-08-19 09:35:48'),
(41, 1, '1/24d06bb1ac3e54600d2f-17022020113338-big.png', 0, 0, 1, '2020-08-18 02:34:00', '2020-08-19 09:35:48'),
(42, 1, '1/a27fad5a88a770f929b6-17022020113549-big.png', 0, 0, 1, '2020-08-18 02:34:05', '2020-08-19 09:35:48'),
(43, 13, '13/3.png', 0, 0, 0, '2020-08-18 04:00:21', '2020-08-18 04:00:21'),
(44, 11, '11/picture.png', 1, 0, 0, '2020-08-18 04:06:06', '2020-08-18 11:10:10'),
(45, 11, '11/3.png', 0, 0, 0, '2020-08-18 07:44:27', '2020-08-18 07:44:27'),
(46, 2, '2/3.png', 0, 0, 0, '2020-08-18 07:46:18', '2020-08-18 07:46:18'),
(47, 15, '15/a27fad5a88a770f929b6-17022020113549.png', 1, 0, 0, '2020-08-20 08:39:03', '2020-08-21 02:01:22'),
(48, 15, '15/cake-logo.png', 0, 0, 0, '2020-08-20 08:39:17', '2020-08-20 08:39:17');

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

--
-- Đang đổ dữ liệu cho bảng `t_order_detail`
--

INSERT INTO `t_order_detail` (`id`, `id_odrh`, `id_product`, `amount`, `price`, `tax`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
(1, 1, 1, 1, '65000', '2', 0, '2020-08-19 11:10:10', '2020-08-19 11:10:10'),
(2, 2, 2, 2, '20000', '2', 0, '2020-08-19 11:10:10', '2020-08-21 13:00:44'),
(3, 2, 2, 2, '20000', '2', 0, '2020-08-19 11:10:10', '2020-08-21 13:00:44'),
(4, 1, 1, 1, '0', '2', 0, '2020-08-19 11:10:10', '2020-08-19 11:10:10');

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
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT 'Trạng thái đơn hàng (\r\n1: chờ xử lý xác nhận đơn hàng\r\n2: đã xử lý, chờ xuất hàng.\r\n3: đã xuất hàng chờ vận chuyển\r\n4: đang vận chuyển, chờ giao hàng\r\n5: Đang giao hàng\r\n6: Nhận hàng, hoàn thành đơn hàng\r\n0: Hủy đơn hàng\r\n)',
  `odr_flg` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Cờ xác định đơn hàng (0: đơn hàng đã đăng nhập, 1 là đơn hàng không đăng nhập, 2 là đơn hàng sample)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_order_header`
--

INSERT INTO `t_order_header` (`id`, `id_user`, `odr_date`, `paymnt_method`, `shipping_unit`, `fee`, `address`, `reciever`, `phone`, `note`, `status`, `odr_flg`, `create_datetime`, `update_datetime`) VALUES
(1, 'shadowin1811@gmail.com', '2020-08-20', 'Tiền mặt', 'Giao  hàng tiết kiệm', '10000', 'Huế', 'Nhân Vp', '096500000', 'Hàng dể vỡ', '6', '1', '2020-08-19 11:09:04', '2020-08-20 09:40:56'),
(2, 'duclieu.ndl93@gmail.com', '2020-08-19', 'Tiền mặt', 'Giao  hàng tiết kiệm', '15000', 'Huế', 'Nhân Vp', '096500000', 'Hàng dể vỡ', '6', '2', '2020-08-19 11:09:06', '2020-08-21 14:13:30'),
(3, 'duclieu.ndl93@gmail.com', '2020-08-19', 'Tiền mặt', 'Giao  hàng tiết kiệm', '10000', 'Huế', 'Nhân Vp', '096500000', 'Hàng dể vỡ', '1', '2', '2020-08-19 11:09:06', '2020-08-21 14:36:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_payment_method`
--

CREATE TABLE `t_payment_method` (
  `id` int(11) NOT NULL COMMENT 'id',
  `payment_cd` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã phương thức thanh toán',
  `method_paymnt` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Phương thức thanh toán',
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'link thân thiện',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa (0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_payment_method`
--

INSERT INTO `t_payment_method` (`id`, `payment_cd`, `method_paymnt`, `slug`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
(1, '', 'Tiền mặt', 'tien-mat', 0, '2020-08-21 11:26:45', '2020-08-21 11:26:45'),
(2, '', 'BANK BIDV', 'bank-bidv', 0, '2020-08-21 11:26:45', '2020-08-21 11:26:45'),
(3, '', 'MOMO', 'momo', 0, '2020-08-21 11:26:45', '2020-08-21 11:26:45');

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
  `category_cd` int(1) NOT NULL DEFAULT 1 COMMENT 'Mã thể loại(1:sản phẩm mỹ phẩm, 2: sản phẩm dùng thử, 3: sản phẩm quà tặng)',
  `price` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Giá sản phẩm',
  `discount` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'Giảm giá',
  `tax` int(2) NOT NULL COMMENT 'Thuế ',
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
(1, 'Gel Rửa Tay Sát Khuẩn Treat&Ease Hand Sanitiser', 1, '10000', '1000', 5, 'Viet Nam', '<p>- Tiêu diệt đến 99,9% vi khuẩn</p>					<p>- Phù hợp mang thoe bên mình</p>					<p>- Sử dụng làm sạch da tay mà không cần rửa lại với nước</p>					<p>- Mùi hương dễ chịu và dưỡng ẩm da tay mềm', '<p><strong>Gel Rửa Tay Sát Khuẩn Treat&Ease Hand Sanitiser 57ml</strong> Điều trị & làm dịu Gel kháng khuẩn này giết chết 99,9% vi khuẩn và vi rút mà không cần nước. </p>				<p>Dung tích: 57ml</p>				<p><strong>Gel Rửa Tay Sát Khuẩn Treat&Ease Hand Sanitiser 57ml</strong> Điều trị & làm dịu Gel kháng khuẩn này giết chết 99,9% vi khuẩn và vi rút mà không cần nước. Gel đi kèm trong một chai hành động bơm tiện dụng để dễ dàng sử dụng và lý tưởng để đặt trong nhà vệ sinh và khu vực nhà bếp để vệ sinh ngay lập tức.</p>				<p> - Gel tay kháng khuẩn Giết chết 99,9% vi khuẩn và vi rút</p>				<p>- Không cần nước hay khăn Bơm hành động cho ứng dụng dễ dàng.</p>				<p>- Lý tưởng cho nhà vệ sinh và nhà bếp</p>', 10, 'San-pham-test', 1, '2020-08-14 06:49:29', '2020-08-19 09:35:48'),
(2, 'SP mỹ phẩm 01', 1, '500000', '100000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj', 150, 'san-pham-my-pham-01', 0, '2020-08-15 11:30:12', '2020-08-19 13:49:35'),
(3, 'SP mỹ phẩm 02', 1, '600000', '200000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj', 150, 'san-pham-my-pham-02', 0, '2020-08-15 11:31:42', '2020-08-19 13:49:51'),
(4, 'SP mỹ phẩm 03', 1, '650000', '50000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj', 150, 'san-pham-my-pham-03', 0, '2020-08-15 11:32:44', '2020-08-19 13:49:56'),
(5, 'SP quà tặng 05', 3, '670000', '70000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj5345345', 150, 'san-pham-qua-tang-05', 0, '2020-08-15 13:18:30', '2020-08-19 13:50:55'),
(6, 'SP quà tặng 04', 3, '650000', '50000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj5345345', 150, 'san-pham-qua-tang-04', 0, '2020-08-15 13:19:37', '2020-08-19 13:51:08'),
(7, 'SP quà tặng 03', 3, '680000', '80000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj5345345', 150, 'san-pham-qua-tang-03', 0, '2020-08-15 13:20:05', '2020-08-19 13:51:12'),
(8, 'SP quà tặng 06', 3, '700000', '20000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj5345345', 150, 'san-pham-qua-tang-06', 0, '2020-08-15 13:20:14', '2020-08-19 13:51:17'),
(9, 'SP quà tặng 07', 3, '650000', '50000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj5345345', 150, 'san-pham-qua-tang-07', 1, '2020-08-15 13:21:42', '2020-08-19 13:51:20'),
(10, 'SP quà tặng 01', 3, '1000', '0', 0, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj', 0, 'san-pham-qua-tang-01', 0, '2020-08-15 13:57:04', '2020-08-21 09:09:23'),
(11, 'SP mỹ phẩm 04', 1, '650000', '50000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj5345345', 150, 'san-pham-my-pham-04', 0, '2020-08-16 13:48:04', '2020-08-19 13:50:04'),
(12, 'SP mỹ phẩm 05', 1, '650000', '50000', 5, 'Korea', 'sản phẩm abnbc', 'sdkfjhkj', 150, 'san-pham-my-pham-05', 1, '2020-08-16 13:48:35', '2020-08-19 13:50:09'),
(13, 'SP quà tặng 02', 3, '0', '0', 0, 'JP', 'san pham doi thuong', 'đàasdxZdasf', 0, 'san-pham-qua-tang-02', 0, '2020-08-17 02:11:31', '2020-08-19 13:51:38'),
(14, 'SP mỹ phẩm 06', 1, '1000000', '0', 0, 'VietName', 'san pham doi thuong', 'Test chi tiết sản phẩm', 0, 'san-pham-my-pham-06', 0, '2020-08-18 07:03:12', '2020-08-19 13:50:14'),
(15, 'SP mỹ phẩm 07', 1, '650000', '0', 0, 'VietName', 'youiou', 'Test chi tiết sản phẩm', 0, 'san-pham-my-pham-07', 0, '2020-08-18 09:25:52', '2020-08-19 13:50:23'),
(16, 'SP dùng thử 01', 2, '50000', '0', 5, 'JP', 'Sản phẩm Gel dùng thử', 'Sản phẩm Gel dùng thử', 100, 'san-pham-dung-thu-01', 0, '2020-08-19 13:06:29', '2020-08-19 13:50:30'),
(17, 'SP dùng thử 02', 2, '10000', '0', 0, 'Korea', 'Sửa rửa mặt ', 'Sửa rửa mặt \r\nabcdefgh', 0, 'san-pham-dung-thu-02', 0, '0000-00-00 00:00:00', '2020-08-19 13:50:36'),
(18, 'SP dùng thử 03', 2, '8000', '0', 0, 'Korea', 'Sửa rửa mặt abc', 'Sửa rửa mặt abc\r\nabcdefgh', 0, 'san-pham-dung-thu-03', 0, '0000-00-00 00:00:00', '2020-08-19 13:50:42');

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
  `ship_cd` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã đơn vị vận chuyển',
  `shipping_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'đơn vị vận chuyển',
  `fee` decimal(10,0) NOT NULL DEFAULT 0 COMMENT 'phí vận chuyển',
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link thân thiện',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: không xóa, 1: xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_shipping_unit`
--

INSERT INTO `t_shipping_unit` (`id`, `ship_cd`, `shipping_unit`, `fee`, `slug`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
(1, '', 'Giao hàng tiết kiệm', '15000', 'giao-hang-tiet-kiem', 0, '2020-08-21 09:21:16', '2020-08-21 09:21:16'),
(2, '', 'Giao hàng nhanh', '16000', 'giao-hang-nhanh', 0, '2020-08-21 09:21:16', '2020-08-21 09:22:13'),
(3, '', 'Viettel Post', '13000', 'viettel-post', 0, '2020-08-21 09:21:16', '2020-08-21 09:21:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_user`
--

CREATE TABLE `t_user` (
  `uid` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT ' Email người dùng',
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `full_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Họ tên người dùng',
  `gender` tinyint(1) DEFAULT NULL COMMENT 'Giới tính(0: Nữ, 1:Nam)',
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'số điện thoại',
  `address1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ chính',
  `address2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ phụ',
  `admin_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ admin(0: user, 1:admin)',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa(0: Không xóa, 1:Xóa)',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_user`
--

INSERT INTO `t_user` (`uid`, `pass`, `full_name`, `gender`, `phone`, `address1`, `address2`, `admin_flg`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
('duclieu.ndl93@gmail.com', '1', 'Nguyễn Đức Liệu', NULL, NULL, 'Hương Trà', 'Thừa Thiên Huế', 1, 0, '2020-08-20 09:41:48', '2020-08-21 13:49:32'),
('shadowin1811@gmail.com', '1', NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-08-20 09:24:48', '2020-08-21 09:28:02'),
('shadowin181122@gmail.com', 'og~@zvyd', NULL, NULL, NULL, NULL, NULL, 0, 0, '2020-08-20 09:40:43', '2020-08-20 09:40:43'),
('shadowin18122@gmail.com', 'og~@zvyd', NULL, NULL, NULL, NULL, NULL, 0, 0, '2020-08-20 09:40:43', '2020-08-20 09:40:43');

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
-- Chỉ mục cho bảng `t_payment_method`
--
ALTER TABLE `t_payment_method`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`,`slug`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `t_order_header`
--
ALTER TABLE `t_order_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `t_payment_method`
--
ALTER TABLE `t_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `t_point`
--
ALTER TABLE `t_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT cho bảng `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id sản phẩm', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `t_reset_pass`
--
ALTER TABLE `t_reset_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id yêu cầu lấy lại mật khẩu';

--
-- AUTO_INCREMENT cho bảng `t_shipping_unit`
--
ALTER TABLE `t_shipping_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
