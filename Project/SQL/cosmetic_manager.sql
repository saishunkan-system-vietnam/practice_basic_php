-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 29, 2020 lúc 11:18 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cosmetic_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email tài khoản',
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ và tên ',
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `birthday` date NOT NULL COMMENT 'Ngày Sinh',
  `sex` tinyint(4) NOT NULL COMMENT 'Giới tính: 0=Nữ, 1=Nam',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chuỗi xác nhận đổi mật khẩu',
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  `role` int(11) NOT NULL DEFAULT 0 COMMENT 'Phân quyền',
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `fullname`, `password`, `birthday`, `sex`, `phone`, `token`, `address`, `role`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
('aaaaaa@gmail.com', 'Nguyễn Văn Abc', 'bd4b8ad9061b07afd36df11476066877', '2020-07-18', 0, '0965000003', NULL, 'Đà Nẵng', 0, 0, '2019-04-24 13:21:38', '2020-07-29 13:22:49'),
('abcd@gmail.com', 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-15', 1, '0965000002', NULL, 'Đà Nẵng', 0, 0, '2019-09-24 13:21:32', '2020-07-29 13:22:49'),
('admin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00', 1, '0965002620', NULL, 'Huế', 0, 0, '2020-07-01 13:21:01', '2020-07-29 13:22:49'),
('nguyenvana@gmail.com', 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-23', 0, '0965000000', NULL, 'Đà Nẵng', 0, 0, '1899-05-23 13:21:22', '2020-07-29 13:22:49'),
('tinhbano1o2@gmail.com', 'Ngô Tá Sinh', 'bd4b8ad9061b07afd36df11476066877', '2020-07-24', 0, '0965000001', NULL, 'Huế', 0, 0, '2020-07-21 13:21:28', '2020-07-29 13:22:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL COMMENT 'Id đơn hàng',
  `id_account` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Id tài khoản',
  `payments` decimal(10,0) NOT NULL COMMENT 'Số tiền thanh toán',
  `del_flg` tinyint(4) NOT NULL COMMENT 'Cờ Xóa',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian đặt hàng',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL COMMENT 'Id chi tiết đơn hàng',
  `id_product` int(11) NOT NULL COMMENT 'Id sản phẩm',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng',
  `total_money` int(11) NOT NULL COMMENT 'Tổng tiền mua sản phẩm',
  `del_flg` tinyint(4) NOT NULL COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đặt hàng',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Ngày update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT 'id sản phẩm',
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `describe_product` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả sản phẩm',
  `origin` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Xuất xứ sản phẩm',
  `price` decimal(10,0) NOT NULL COMMENT 'giá sản phẩm',
  `avarta` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh sản phhẩm',
  `capacity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'dung tích',
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chú thích sản phẩm',
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thơig gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `describe_product`, `origin`, `price`, `avarta`, `capacity`, `note`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(1, 'Viên uống trắng da Glutathione Ever Collagen', '', 'Hàn Quốc', '200', './img/1.jpg', '', NULL, 0, '2020-07-01 00:00:00', '2020-07-31 00:00:00'),
(2, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', '', 'Hàn Quốc', '150', './img/2.jpg', '', NULL, 0, '2020-06-02 00:00:00', '2020-07-14 00:00:00'),
(3, 'Viên uống Vitamin E Zentiva đẹp da chống lão hóa', '', 'Mỹ', '300', './img/3.jpg', '', NULL, 0, '2020-04-06 00:00:00', '2020-05-12 00:00:00'),
(4, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', '', 'Mỹ', '600', './img/4.jpg', '', NULL, 0, '2020-06-01 00:00:00', '2020-08-13 00:00:00'),
(5, 'Bộ dưỡng da cao cấp 3w clinic flower effect extra', '', 'Hàn Quốc', '800', './img/5.png', '', NULL, 0, '2019-09-04 00:00:00', '2020-03-10 00:00:00'),
(6, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', '', 'Hàn Quốc', '560', './img/6.jpg', '', NULL, 0, '2019-12-03 00:00:00', '2020-11-18 00:00:00'),
(7, 'Son chou chou siêu lì siêu mịn vỏ đỏ', '', 'Hàn Quốc', '700', './img/7.jpg', '', NULL, 0, '2019-02-04 00:00:00', '2020-01-10 00:00:00'),
(8, 'SON DƯỠNG MÔI INNISFREE GLOW TINT LIP', '', 'Mỹ', '760', './img/8.jpg', '', NULL, 0, '2019-01-03 00:00:00', '2020-01-18 00:00:00'),
(9, 'SON DƯỠNG CÓ MÀU VÀ KHÔNG MÀU DHC COLOR', '', 'Mỹ', '170', './img/9.jpg', '', NULL, 0, '2019-01-21 00:00:00', '2020-01-15 00:00:00'),
(10, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', '', 'Mỹ', '600', './img/10.jpg', '', NULL, 0, '2020-06-01 00:00:00', '2020-08-13 00:00:00'),
(11, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', '', 'Hàn Quốc', '560', './img/11.jpg', '', NULL, 0, '2019-12-03 00:00:00', '2020-11-18 00:00:00'),
(12, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', '', 'Hàn Quốc', '150', './img/12.jpg', '', NULL, 0, '2020-06-02 00:00:00', '2020-07-14 00:00:00'),
(13, 'Viên uống trắng da Glutathione Ever Collagen', '', 'Hàn Quốc', '200', './img/2.jpg', '', NULL, 0, '2020-07-01 00:00:00', '2020-07-31 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id đơn hàng';

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id chi tiết đơn hàng';

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id sản phẩm', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
