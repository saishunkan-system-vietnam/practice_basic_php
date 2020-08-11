-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 11, 2020 lúc 12:00 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

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
-- Cấu trúc bảng cho bảng `t_account`
--

CREATE TABLE `t_account` (
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
  `update_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_account`
--

INSERT INTO `t_account` (`id`, `fullname`, `password`, `birthday`, `sex`, `phone`, `token`, `address`, `role`, `del_flg`, `create_datetime`, `update_datetime`) VALUES
('aaaaaa@gmail.com', 'Nguyễn Văn Abc', 'bd4b8ad9061b07afd36df11476066877', '2020-07-18', 0, '0965000003', NULL, 'Đà Nẵng', 0, 0, '2019-04-24 13:21:38', '2020-07-29 13:22:49'),
('abcd@gmail.com', 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-15', 1, '0965000002', NULL, 'Đà Nẵng', 0, 1, '2019-09-24 13:21:32', '2020-08-11 14:17:30'),
('admin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '2020-08-06', 1, '0965002620', NULL, 'Huế', 1, 0, '2020-07-01 13:21:01', '2020-07-29 13:22:49'),
('admin1@gmail.com', 'Ngô Tá Sinh', 'bd4b8ad9061b07afd36df11476066877', '2020-08-13', 1, '0965000000', NULL, 'Huế', 0, 0, '2020-08-11 15:26:29', NULL),
('duclieu.ndl93@gmail.com', 'Nguyễn Đức Liệu', '64b931486d0a7e152cce488871d6f6f4', '1993-06-26', 1, '0386279685', NULL, 'Huế', 0, 0, '2020-08-11 09:18:09', NULL),
('ngotasinh@gmail.com', 'ngo', 'bd4b8ad9061b07afd36df11476066877', '2020-08-11', 1, '0965002620', '1089d474', 'huế', 0, 0, '2020-08-11 14:26:26', '2020-08-11 16:56:30'),
('nguyenvana@gmail.com', 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-23', 0, '0965000000', NULL, 'Đà Nẵng', 0, 0, '1899-05-23 13:21:22', '2020-07-29 13:22:49'),
('tinhbano1o2@gmail.com', 'Ngô Tá Sinh', 'bd4b8ad9061b07afd36df11476066877', '2020-07-24', 0, '0965000001', 'fee8f34e', 'Huế', 0, 0, '2020-07-21 13:21:28', '2020-08-11 16:58:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_order`
--

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL COMMENT 'Id đơn hàng',
  `id_account` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Id tài khoản',
  `recipient` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người nhận hàng',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại người nhận',
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ người nhận hàng',
  `payments` decimal(10,0) NOT NULL COMMENT 'Số tiền thanh toán',
  `note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ghi chú',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Trạng thái hóa đơn:\r\n0: Chờ xử lý.\r\n1: Đã tiếp nhận\r\n2:Đang gửi\r\n3: Đã nhận\r\n4:Cancel',
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Cờ Xóa',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian đặt hàng',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_order`
--

INSERT INTO `t_order` (`id`, `id_account`, `recipient`, `phone`, `address`, `payments`, `note`, `status`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(22, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1700', 'Hàng dể vỡ', 0, 0, '2020-08-06 14:24:29', NULL),
(23, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1700', 'Hàng dể vỡ', 0, 1, '2020-08-06 14:24:58', '2020-08-06 14:49:05'),
(24, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1700', '121212121212121', 0, 1, '2020-08-07 09:15:31', '2020-08-11 13:49:50'),
(25, 'admin@gmail.com', 'Nhân', '0965000000', 'Đà Nẵng', '1170', 'mới', 4, 0, '2020-08-11 08:19:35', '2020-08-11 16:53:52'),
(26, 'admin@gmail.com', 'Nhân', '0965000002', 'Huế', '1760', '2222222222222222222222222', 4, 0, '2020-08-11 09:01:12', '2020-08-11 10:26:48'),
(27, 'admin@gmail.com', 'Nhân', '0965000003', 'Huế', '1760', '33333333333333333333333333333', 0, 0, '2020-08-11 09:02:53', NULL),
(28, 'admin@gmail.com', 'Nhân', '0965000003', 'Huế', '1760', '33333333333333333333333333333', 0, 0, '2020-08-11 09:05:58', NULL),
(29, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1760', 'rewsrew', 0, 0, '2020-08-11 09:06:03', NULL),
(30, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1760', 'rewsrew', 0, 0, '2020-08-11 09:06:06', NULL),
(31, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1760', '9789789', 0, 0, '2020-08-11 09:07:41', NULL),
(32, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1760', '76867867', 4, 0, '2020-08-11 09:09:14', '2020-08-11 12:51:32'),
(33, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', '87867', '600', '8678678', 0, 0, '2020-08-11 09:10:35', NULL),
(34, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', '87867', '600', '8678678', 0, 0, '2020-08-11 09:10:43', NULL),
(35, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', '87867', '600', '8678678', 0, 0, '2020-08-11 09:11:31', NULL),
(36, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '9808908', 0, 0, '2020-08-11 09:11:40', NULL),
(37, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '9808908', 0, 0, '2020-08-11 09:12:09', NULL),
(38, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '9808908', 0, 0, '2020-08-11 09:12:27', NULL),
(39, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '08908908', 0, 0, '2020-08-11 09:12:48', NULL),
(40, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '08908908', 0, 0, '2020-08-11 09:13:52', NULL),
(41, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '08908908', 0, 0, '2020-08-11 09:14:27', NULL),
(42, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '6YUTYUTYT', 0, 0, '2020-08-11 09:14:36', NULL),
(43, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:19:55', NULL),
(44, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:20:05', NULL),
(45, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:20:35', NULL),
(46, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:22:04', NULL),
(47, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:22:51', NULL),
(48, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:23:12', NULL),
(49, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:24:07', NULL),
(50, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '600', '8908908', 0, 0, '2020-08-11 09:25:08', NULL),
(51, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Huế', '350', '11111111111', 0, 0, '2020-08-11 09:26:57', NULL),
(52, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Huế', '350', '11111111111', 0, 0, '2020-08-11 09:28:20', NULL),
(53, 'duclieu.ndl93@gmail.com', 'vien', '0965000000', 'Đà Nẵng', '350', 'aaaaaaaaaaaaaaa', 0, 0, '2020-08-11 09:30:02', NULL),
(54, 'duclieu.ndl93@gmail.com', 'vien', '0965000000', 'Đà Nẵng', '350', 'aaaaaaaaaaaaaaa', 0, 0, '2020-08-11 09:32:37', NULL),
(55, 'duclieu.ndl93@gmail.com', 'vien', '0965000000', 'Đà Nẵng', '350', 'aaaaaaaaaaaaaaa', 0, 0, '2020-08-11 09:32:40', NULL),
(56, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Huế', '350', '11111111111', 0, 0, '2020-08-11 09:32:50', NULL),
(57, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Huế', '350', '11111111111', 0, 0, '2020-08-11 09:34:01', NULL),
(58, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Huế', '350', '11111111111', 0, 0, '2020-08-11 09:34:03', NULL),
(59, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Huế', '350', '11111111111', 0, 0, '2020-08-11 09:34:54', NULL),
(60, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 4, 0, '2020-08-11 09:37:18', '2020-08-11 13:35:31'),
(61, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:39:11', NULL),
(62, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:39:16', NULL),
(63, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:42:13', NULL),
(64, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:41', NULL),
(65, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:43', NULL),
(66, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:43', NULL),
(67, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:43', NULL),
(68, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:43', NULL),
(69, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:43', NULL),
(70, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:44', NULL),
(71, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:44', NULL),
(72, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:48', NULL),
(73, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:48', NULL),
(74, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:48', NULL),
(75, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:49', NULL),
(76, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:49', NULL),
(77, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:49', NULL),
(78, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:49', NULL),
(79, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:49', NULL),
(80, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:49', NULL),
(81, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:43:50', NULL),
(82, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:44:08', NULL),
(83, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:25', NULL),
(84, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:26', NULL),
(85, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:26', NULL),
(86, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:27', NULL),
(87, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:27', NULL),
(88, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:27', NULL),
(89, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:27', NULL),
(90, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:27', NULL),
(91, 'duclieu.ndl93@gmail.com', 'bo', '0965000000', 'Đà Nẵng', '350', '', 0, 0, '2020-08-11 09:45:27', NULL),
(92, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:47:22', NULL),
(93, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:47:45', NULL),
(94, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:51:33', NULL),
(95, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:54:43', NULL),
(96, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:55:32', NULL),
(97, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:56:20', NULL),
(98, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:58:23', NULL),
(99, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵngddddd', '350', 'dddddddddddd', 0, 0, '2020-08-11 09:58:35', NULL),
(100, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'đâs', 0, 0, '2020-08-11 09:58:53', NULL),
(101, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'đâs', 0, 0, '2020-08-11 10:00:10', NULL),
(102, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'đâs', 0, 0, '2020-08-11 10:00:44', NULL),
(103, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'đâs', 0, 0, '2020-08-11 10:02:24', NULL),
(104, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'fdsfds', 0, 0, '2020-08-11 10:02:55', NULL),
(105, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', '8678678', '150', '', 0, 0, '2020-08-11 10:03:38', NULL),
(106, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', '8678678', '150', '', 0, 0, '2020-08-11 10:04:13', NULL),
(107, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'rewrw', '150', 'rewrewr', 0, 0, '2020-08-11 10:04:18', NULL),
(110, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'rewrw', '150', 'rewrewr', 0, 0, '2020-08-11 10:08:11', NULL),
(111, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'rewrw', '150', 'rewrewr', 0, 0, '2020-08-11 10:11:41', NULL),
(112, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'rewrw', '150', 'rewrewr', 0, 0, '2020-08-11 10:11:43', NULL),
(113, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'rewrw', '150', 'rewrewr', 0, 0, '2020-08-11 10:12:42', NULL),
(114, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'rewrw', '150', 'rewrewr', 0, 0, '2020-08-11 10:12:44', NULL),
(115, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'eeeeeeeeeee', 0, 0, '2020-08-11 10:12:54', NULL),
(116, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'eeeeeeeeeee', 0, 0, '2020-08-11 10:14:01', NULL),
(117, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'eeeeeeeeeee', 0, 0, '2020-08-11 10:14:03', NULL),
(118, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'eeeeeeeeeeeeeeeeeeeeeeee', 0, 0, '2020-08-11 10:14:12', NULL),
(119, 'duclieu.ndl93@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'eeeeeeeeeeeeeeeeeeeeeeee', 0, 0, '2020-08-11 10:14:55', NULL),
(120, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'aaaaaaaaaaa', 0, 0, '2020-08-11 10:24:23', NULL),
(121, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', 'aaaaaaaaaaa', 0, 0, '2020-08-11 10:24:34', NULL),
(122, 'admin@gmail.com', 'vien', '0965000001', 'Huế', '150', 'yyyyyyyyyyyyy', 0, 0, '2020-08-11 10:25:37', NULL),
(123, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '300', '111111', 0, 0, '2020-08-11 10:38:12', NULL),
(124, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:40:57', NULL),
(125, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:41:21', NULL),
(126, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:42:28', NULL),
(127, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:42:40', NULL),
(128, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:42:54', NULL),
(129, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:43:15', NULL),
(130, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:43:20', NULL),
(131, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:43:39', NULL),
(132, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:43:45', NULL),
(133, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '76867868', 0, 0, '2020-08-11 10:44:49', NULL),
(134, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '150', '89789789', 0, 0, '2020-08-11 10:44:56', NULL),
(135, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '350', '97897897', 0, 0, '2020-08-11 10:45:28', NULL),
(136, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '350', 'HGFHGF', 0, 0, '2020-08-11 10:49:48', NULL),
(137, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '350', 'HGFHGF', 0, 0, '2020-08-11 10:50:09', NULL),
(138, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '350', 'HGFHGF', 0, 0, '2020-08-11 10:50:43', NULL),
(139, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '350', 'oipoip', 0, 0, '2020-08-11 10:51:52', NULL),
(140, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '350', 'oipoip', 0, 0, '2020-08-11 10:52:08', NULL),
(141, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '850', '67898678678yiyuiy', 0, 0, '2020-08-11 10:52:21', NULL),
(142, 'admin@gmail.com', 'ngo ta sinh', '0965002620', 'huế', '600', 'dddddddddddddddddđ', 0, 0, '2020-08-11 14:16:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_order_detail`
--

CREATE TABLE `t_order_detail` (
  `id` int(11) NOT NULL COMMENT 'Id chi tiết đơn hàng',
  `id_order` int(11) NOT NULL COMMENT 'id order',
  `id_product` int(11) NOT NULL COMMENT 'Id sản phẩm',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng',
  `price` decimal(10,0) NOT NULL COMMENT 'Giá bán',
  `del_flg` tinyint(4) NOT NULL COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đặt hàng',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Ngày update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_order_detail`
--

INSERT INTO `t_order_detail` (`id`, `id_order`, `id_product`, `quantity`, `price`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(27, 22, 1, 4, '200', 0, '2020-08-06 14:24:29', NULL),
(28, 22, 3, 1, '300', 0, '2020-08-06 14:24:29', NULL),
(29, 22, 4, 1, '600', 0, '2020-08-06 14:24:29', NULL),
(30, 23, 1, 4, '200', 1, '2020-08-06 14:24:58', '2020-08-06 14:49:05'),
(31, 23, 3, 1, '300', 1, '2020-08-06 14:24:58', '2020-08-06 14:49:05'),
(32, 23, 4, 1, '600', 1, '2020-08-06 14:24:58', '2020-08-06 14:49:05'),
(33, 24, 1, 4, '200', 1, '2020-08-07 09:15:31', '2020-08-11 13:49:50'),
(34, 24, 3, 1, '300', 1, '2020-08-07 09:15:31', '2020-08-11 13:49:50'),
(35, 24, 4, 1, '600', 1, '2020-08-07 09:15:31', '2020-08-11 13:49:50'),
(36, 25, 1, 1, '200', 0, '2020-08-11 08:19:35', NULL),
(37, 25, 13, 1, '200', 0, '2020-08-11 08:19:35', NULL),
(38, 25, 3, 2, '300', 0, '2020-08-11 08:19:35', NULL),
(39, 25, 9, 1, '170', 1, '2020-08-11 08:19:35', '2020-08-11 16:53:52'),
(40, 26, 4, 2, '600', 0, '2020-08-11 09:01:12', NULL),
(41, 26, 6, 1, '560', 0, '2020-08-11 09:01:12', NULL),
(42, 27, 4, 2, '600', 0, '2020-08-11 09:02:53', NULL),
(43, 27, 6, 1, '560', 0, '2020-08-11 09:02:53', NULL),
(44, 28, 4, 2, '600', 0, '2020-08-11 09:05:58', NULL),
(45, 28, 6, 1, '560', 0, '2020-08-11 09:05:58', NULL),
(46, 29, 4, 2, '600', 0, '2020-08-11 09:06:03', NULL),
(47, 29, 6, 1, '560', 0, '2020-08-11 09:06:03', NULL),
(48, 30, 4, 2, '600', 0, '2020-08-11 09:06:06', NULL),
(49, 30, 6, 1, '560', 0, '2020-08-11 09:06:06', NULL),
(50, 31, 4, 2, '600', 0, '2020-08-11 09:07:41', NULL),
(51, 31, 6, 1, '560', 0, '2020-08-11 09:07:41', NULL),
(52, 32, 4, 2, '600', 0, '2020-08-11 09:09:14', NULL),
(53, 32, 6, 1, '560', 0, '2020-08-11 09:09:14', NULL),
(54, 33, 4, 1, '600', 0, '2020-08-11 09:10:35', NULL),
(55, 34, 4, 1, '600', 0, '2020-08-11 09:10:43', NULL),
(56, 35, 4, 1, '600', 0, '2020-08-11 09:11:31', NULL),
(57, 36, 4, 1, '600', 0, '2020-08-11 09:11:40', NULL),
(58, 37, 4, 1, '600', 0, '2020-08-11 09:12:09', NULL),
(59, 38, 4, 1, '600', 0, '2020-08-11 09:12:27', NULL),
(60, 39, 4, 1, '600', 0, '2020-08-11 09:12:48', NULL),
(61, 40, 4, 1, '600', 0, '2020-08-11 09:13:52', NULL),
(62, 41, 4, 1, '600', 0, '2020-08-11 09:14:27', NULL),
(63, 42, 4, 1, '600', 0, '2020-08-11 09:14:36', NULL),
(64, 43, 4, 1, '600', 0, '2020-08-11 09:19:55', NULL),
(65, 44, 4, 1, '600', 0, '2020-08-11 09:20:05', NULL),
(66, 51, 1, 1, '200', 0, '2020-08-11 09:26:57', NULL),
(67, 51, 2, 1, '150', 0, '2020-08-11 09:26:57', NULL),
(68, 52, 1, 1, '200', 0, '2020-08-11 09:28:20', NULL),
(69, 52, 2, 1, '150', 0, '2020-08-11 09:28:20', NULL),
(70, 53, 1, 1, '200', 0, '2020-08-11 09:30:02', NULL),
(71, 53, 2, 1, '150', 0, '2020-08-11 09:30:02', NULL),
(72, 54, 1, 1, '200', 0, '2020-08-11 09:32:37', NULL),
(73, 54, 2, 1, '150', 0, '2020-08-11 09:32:37', NULL),
(74, 55, 1, 1, '200', 0, '2020-08-11 09:32:40', NULL),
(75, 55, 2, 1, '150', 0, '2020-08-11 09:32:40', NULL),
(76, 56, 1, 1, '200', 0, '2020-08-11 09:32:50', NULL),
(77, 56, 2, 1, '150', 0, '2020-08-11 09:32:50', NULL),
(78, 57, 1, 1, '200', 0, '2020-08-11 09:34:01', NULL),
(79, 57, 2, 1, '150', 0, '2020-08-11 09:34:01', NULL),
(80, 58, 1, 1, '200', 0, '2020-08-11 09:34:03', NULL),
(81, 58, 2, 1, '150', 0, '2020-08-11 09:34:03', NULL),
(82, 59, 1, 1, '200', 0, '2020-08-11 09:34:54', NULL),
(83, 59, 2, 1, '150', 0, '2020-08-11 09:34:54', NULL),
(84, 60, 1, 1, '200', 0, '2020-08-11 09:37:18', NULL),
(85, 60, 2, 1, '150', 0, '2020-08-11 09:37:18', NULL),
(86, 61, 1, 1, '200', 0, '2020-08-11 09:39:11', NULL),
(87, 61, 2, 1, '150', 0, '2020-08-11 09:39:11', NULL),
(88, 62, 1, 1, '200', 0, '2020-08-11 09:39:16', NULL),
(89, 62, 2, 1, '150', 0, '2020-08-11 09:39:16', NULL),
(90, 63, 1, 1, '200', 0, '2020-08-11 09:42:13', NULL),
(91, 63, 2, 1, '150', 0, '2020-08-11 09:42:13', NULL),
(92, 64, 1, 1, '200', 0, '2020-08-11 09:43:41', NULL),
(93, 64, 2, 1, '150', 0, '2020-08-11 09:43:41', NULL),
(94, 65, 1, 1, '200', 0, '2020-08-11 09:43:43', NULL),
(95, 65, 2, 1, '150', 0, '2020-08-11 09:43:43', NULL),
(96, 66, 1, 1, '200', 0, '2020-08-11 09:43:43', NULL),
(97, 66, 2, 1, '150', 0, '2020-08-11 09:43:43', NULL),
(98, 67, 1, 1, '200', 0, '2020-08-11 09:43:43', NULL),
(99, 67, 2, 1, '150', 0, '2020-08-11 09:43:43', NULL),
(100, 68, 1, 1, '200', 0, '2020-08-11 09:43:43', NULL),
(101, 68, 2, 1, '150', 0, '2020-08-11 09:43:43', NULL),
(102, 69, 1, 1, '200', 0, '2020-08-11 09:43:43', NULL),
(103, 69, 2, 1, '150', 0, '2020-08-11 09:43:43', NULL),
(104, 70, 1, 1, '200', 0, '2020-08-11 09:43:44', NULL),
(105, 70, 2, 1, '150', 0, '2020-08-11 09:43:44', NULL),
(106, 71, 1, 1, '200', 0, '2020-08-11 09:43:44', NULL),
(107, 71, 2, 1, '150', 0, '2020-08-11 09:43:44', NULL),
(108, 72, 1, 1, '200', 0, '2020-08-11 09:43:48', NULL),
(109, 72, 2, 1, '150', 0, '2020-08-11 09:43:48', NULL),
(110, 73, 1, 1, '200', 0, '2020-08-11 09:43:48', NULL),
(111, 73, 2, 1, '150', 0, '2020-08-11 09:43:48', NULL),
(112, 74, 1, 1, '200', 0, '2020-08-11 09:43:48', NULL),
(113, 74, 2, 1, '150', 0, '2020-08-11 09:43:48', NULL),
(114, 75, 1, 1, '200', 0, '2020-08-11 09:43:49', NULL),
(115, 75, 2, 1, '150', 0, '2020-08-11 09:43:49', NULL),
(116, 76, 1, 1, '200', 0, '2020-08-11 09:43:49', NULL),
(117, 76, 2, 1, '150', 0, '2020-08-11 09:43:49', NULL),
(118, 77, 1, 1, '200', 0, '2020-08-11 09:43:49', NULL),
(119, 77, 2, 1, '150', 0, '2020-08-11 09:43:49', NULL),
(120, 78, 1, 1, '200', 0, '2020-08-11 09:43:49', NULL),
(121, 78, 2, 1, '150', 0, '2020-08-11 09:43:49', NULL),
(122, 79, 1, 1, '200', 0, '2020-08-11 09:43:49', NULL),
(123, 79, 2, 1, '150', 0, '2020-08-11 09:43:49', NULL),
(124, 80, 1, 1, '200', 0, '2020-08-11 09:43:49', NULL),
(125, 80, 2, 1, '150', 0, '2020-08-11 09:43:49', NULL),
(126, 81, 1, 1, '200', 0, '2020-08-11 09:43:50', NULL),
(127, 81, 2, 1, '150', 0, '2020-08-11 09:43:50', NULL),
(128, 82, 1, 1, '200', 0, '2020-08-11 09:44:08', NULL),
(129, 82, 2, 1, '150', 0, '2020-08-11 09:44:08', NULL),
(130, 83, 1, 1, '200', 0, '2020-08-11 09:45:25', NULL),
(131, 83, 2, 1, '150', 0, '2020-08-11 09:45:25', NULL),
(132, 84, 1, 1, '200', 0, '2020-08-11 09:45:26', NULL),
(133, 84, 2, 1, '150', 0, '2020-08-11 09:45:26', NULL),
(134, 85, 1, 1, '200', 0, '2020-08-11 09:45:26', NULL),
(135, 85, 2, 1, '150', 0, '2020-08-11 09:45:26', NULL),
(136, 86, 1, 1, '200', 0, '2020-08-11 09:45:27', NULL),
(137, 86, 2, 1, '150', 0, '2020-08-11 09:45:27', NULL),
(138, 87, 1, 1, '200', 0, '2020-08-11 09:45:27', NULL),
(139, 87, 2, 1, '150', 0, '2020-08-11 09:45:27', NULL),
(140, 88, 1, 1, '200', 0, '2020-08-11 09:45:27', NULL),
(141, 88, 2, 1, '150', 0, '2020-08-11 09:45:27', NULL),
(142, 89, 1, 1, '200', 0, '2020-08-11 09:45:27', NULL),
(143, 89, 2, 1, '150', 0, '2020-08-11 09:45:27', NULL),
(144, 90, 1, 1, '200', 0, '2020-08-11 09:45:27', NULL),
(145, 90, 2, 1, '150', 0, '2020-08-11 09:45:27', NULL),
(146, 91, 1, 1, '200', 0, '2020-08-11 09:45:27', NULL),
(147, 91, 2, 1, '150', 0, '2020-08-11 09:45:27', NULL),
(148, 92, 1, 1, '200', 0, '2020-08-11 09:47:22', NULL),
(149, 92, 2, 1, '150', 0, '2020-08-11 09:47:22', NULL),
(150, 93, 1, 1, '200', 0, '2020-08-11 09:47:45', NULL),
(151, 93, 2, 1, '150', 0, '2020-08-11 09:47:45', NULL),
(152, 94, 1, 1, '200', 0, '2020-08-11 09:51:33', NULL),
(153, 94, 2, 1, '150', 0, '2020-08-11 09:51:33', NULL),
(154, 95, 1, 1, '200', 0, '2020-08-11 09:54:43', NULL),
(155, 95, 2, 1, '150', 0, '2020-08-11 09:54:43', NULL),
(156, 96, 1, 1, '200', 0, '2020-08-11 09:55:32', NULL),
(157, 96, 2, 1, '150', 0, '2020-08-11 09:55:32', NULL),
(158, 98, 1, 1, '200', 0, '2020-08-11 09:58:23', NULL),
(159, 98, 2, 1, '150', 0, '2020-08-11 09:58:23', NULL),
(160, 100, 12, 1, '150', 0, '2020-08-11 09:58:53', NULL),
(161, 101, 12, 1, '150', 0, '2020-08-11 10:00:10', NULL),
(162, 102, 12, 1, '150', 0, '2020-08-11 10:00:44', NULL),
(163, 103, 12, 1, '150', 0, '2020-08-11 10:02:24', NULL),
(164, 104, 12, 1, '150', 0, '2020-08-11 10:02:55', NULL),
(165, 105, 12, 1, '150', 0, '2020-08-11 10:03:38', NULL),
(166, 106, 12, 1, '150', 0, '2020-08-11 10:04:13', NULL),
(167, 107, 12, 1, '150', 0, '2020-08-11 10:04:18', NULL),
(168, 110, 12, 1, '150', 0, '2020-08-11 10:08:11', NULL),
(169, 111, 12, 1, '150', 0, '2020-08-11 10:11:41', NULL),
(170, 112, 12, 1, '150', 0, '2020-08-11 10:11:43', NULL),
(171, 113, 12, 1, '150', 0, '2020-08-11 10:12:42', NULL),
(172, 114, 12, 1, '150', 0, '2020-08-11 10:12:44', NULL),
(173, 115, 12, 1, '150', 0, '2020-08-11 10:12:54', NULL),
(174, 116, 12, 1, '150', 0, '2020-08-11 10:14:01', NULL),
(175, 117, 12, 1, '150', 0, '2020-08-11 10:14:03', NULL),
(176, 118, 12, 1, '150', 0, '2020-08-11 10:14:12', NULL),
(177, 119, 12, 1, '150', 0, '2020-08-11 10:14:55', NULL),
(178, 120, 12, 1, '150', 0, '2020-08-11 10:24:23', NULL),
(179, 121, 12, 1, '150', 0, '2020-08-11 10:24:34', NULL),
(180, 122, 12, 1, '150', 0, '2020-08-11 10:25:37', NULL),
(181, 123, 12, 2, '150', 0, '2020-08-11 10:38:12', NULL),
(182, 124, 2, 1, '150', 0, '2020-08-11 10:40:57', NULL),
(183, 125, 2, 1, '150', 0, '2020-08-11 10:41:21', NULL),
(184, 126, 2, 1, '150', 0, '2020-08-11 10:42:28', NULL),
(185, 127, 2, 1, '150', 0, '2020-08-11 10:42:40', NULL),
(186, 128, 2, 1, '150', 0, '2020-08-11 10:42:54', NULL),
(187, 129, 2, 1, '150', 0, '2020-08-11 10:43:15', NULL),
(188, 130, 2, 1, '150', 0, '2020-08-11 10:43:20', NULL),
(189, 131, 2, 1, '150', 0, '2020-08-11 10:43:39', NULL),
(190, 132, 2, 1, '150', 0, '2020-08-11 10:43:45', NULL),
(191, 133, 2, 1, '150', 0, '2020-08-11 10:44:49', NULL),
(192, 134, 2, 1, '150', 0, '2020-08-11 10:44:56', NULL),
(193, 139, 13, 1, '200', 0, '2020-08-11 10:51:52', NULL),
(194, 139, 2, 1, '150', 0, '2020-08-11 10:51:52', NULL),
(195, 141, 2, 1, '150', 0, '2020-08-11 10:52:21', NULL),
(196, 141, 7, 1, '700', 0, '2020-08-11 10:52:21', NULL),
(197, 142, 13, 3, '200', 0, '2020-08-11 14:16:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_product`
--

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL COMMENT 'id sản phẩm',
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `describe_product` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả sản phẩm',
  `origin` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Xuất xứ sản phẩm',
  `price` decimal(10,0) NOT NULL COMMENT 'giá sản phẩm',
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh sản phhẩm',
  `capacity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'dung tích',
  `content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'nội dung sản phẩm',
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thơig gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_product`
--

INSERT INTO `t_product` (`id`, `name`, `describe_product`, `origin`, `price`, `image`, `capacity`, `content`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(1, 'Viên uống trắng da Glutathione Ever Collagen', 'Kem đa năng Lucas Papaw Ointment 25g là một loại kem đa năng có xuất xứ từ Úc, sản phẩm là niểm tự hào hơn 100 năm qua của xứ sở Kangaroo.  Giá trên đã bao gồm phí mua hộ, chưa bao gồm thuế và phí vận chuyển (nếu có) ở nước ngoài và cước vận chuyển về Việt Nam. Miễn phí giao hàng nội thành Hà Nội và Hồ Chí Minh.', 'Hàn Quốc', '200', '../../../../../../../../../../img/1.jpg', '100ml', '<p><strong>C&ocirc;ng dụng của kem đa năng Lucas Papaw Ointment 25g</strong></p>\r\n\r\n<p><em><strong>- Gi&uacute;p hỗ trợ điều trị vi&ecirc;m da do dị ứng, nứt đầu ti ở b&agrave; bầu v&agrave; hăm xước da ở trẻ em</strong></em></p>\r\n\r\n<p>+ Loại kem n&agrave;y c&oacute; t&aacute;c dụng l&agrave;m giảm c&aacute;c triệu chứng vi&ecirc;m da, dị ứng ngo&agrave;i da, mẩn ngứa hay bị ph&aacute;t ban.</p>\r\n\r\n<p>+ Gi&uacute;p cho trẻ em thường xuy&ecirc;n đeo bỉm hết bị vết xước hay hăm t&atilde;</p>\r\n\r\n<p>+ Kem Lucas c&ograve;n c&oacute; c&ocirc;ng dụng giảm vi&ecirc;m da, l&agrave;m l&agrave;nh vết nứt cổ g&agrave; ở đầu ti c&aacute;c b&agrave; mẹ đang cho con b&uacute;</p>\r\n\r\n<p><em><strong>- T&aacute;c dụng như kem nẻ, vừa c&oacute; t&aacute;c dụng như kem dưỡng</strong></em></p>\r\n\r\n<p>+ Chuy&ecirc;n hỗ trợ điều trị c&aacute;c triệu chứng kh&ocirc;, nứt nẻ ngo&agrave;i da như da kh&ocirc; bong tr&oacute;c, da bị nẻ hay phồng rộp, m&ocirc;i kh&ocirc; nứt do thời tiết hanh kh&ocirc;&hellip;</p>\r\n\r\n<p>+ C&oacute; t&aacute;c dụng dưỡng m&ocirc;i, dưỡng da, tạo n&ecirc;n sự mịn m&agrave;ng, gi&uacute;p da trở n&ecirc;n mềm mịn.</p>\r\n\r\n<p><em><strong>- Kem Lucas của &Uacute;c c&ograve;n được biết đến như 1 sản phẩm l&agrave;m đẹp</strong></em></p>\r\n\r\n<p>+ Nhờ c&ocirc;ng dụng dưỡng da m&agrave; chị em phụ nữ khi trang điểm c&oacute; thể sử dụng sản phẩm n&agrave;y thay cho kem l&oacute;t</p>\r\n\r\n<p>+ Hơn nữa loại sản phẩm đa năng n&agrave;y c&ograve;n được d&ugrave;ng như geo t&oacute;c, gi&uacute;p cho m&aacute;i t&oacute;c v&agrave;o nếp v&agrave; kh&ocirc;ng bị x&ugrave; rối</p>\r\n\r\n<p>+ C&aacute;c loại mụn mới tấy, mụn bọc hay mụn mủ sẽ bị tan xẹp nhờ sản phẩm n&agrave;y</p>\r\n\r\n<p>+ Nhờ b&ocirc;i kem Lucas m&agrave; những vết sẹo, vết ch&agrave;m xấu x&iacute; sẽ bị mờ dần đi</p>\r\n\r\n<p><em><strong>- Một số t&aacute;c dụng kh&aacute;c</strong></em></p>\r\n\r\n<p>+ Nhờ c&oacute; kem đa năng Lucas m&agrave; những vết do c&ocirc;n tr&ugrave;ng cắn, muỗi đốt sẽ khỏi</p>\r\n\r\n<p>+ Giảm đau r&aacute;t ở những v&ugrave;ng da bị bỏng nước, ch&aacute;y rộp hay ch&aacute;y nắng</p>\r\n\r\n<p>+ Những vết thương hay đứt tay nhẹ do dao k&eacute;o,do c&aacute;c mảnh kim loại, s&agrave;nh vụn, gai đ&acirc;m sẽ được hỗ trợ điều trị l&agrave;nh nhờ loại kem n&agrave;y</p>\r\n\r\n<p>+ Một số trường hợp bị mắc chứng Eczema được hỗ trợ điều trị khỏi nhờ kem b&ocirc;i đa năng n&agrave;y</p>\r\n\r\n<p>+ Hỗ trợ bệnh nh&acirc;n mắc bệnh trĩ tạm thời.</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>Những th&agrave;nh phần chủ yếu tự nhi&ecirc;n l&agrave; men đu đủ Carica tươi, Petroleum chất tự nhi&ecirc;n c&oacute; c&ocirc;ng dụng bảo quản Kali Sorbate...</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>&ndash; Xo&aacute;y mở nắp tu&yacute;p kem Lucas ra</p>\r\n\r\n<p>&ndash; Mở nắp bảo quản bằng c&aacute;ch d&ugrave;ng phần lưng của nắp, xong bước n&agrave;y l&agrave; thoa kem l&ecirc;n da v&agrave; chờ kết quả nh&eacute;!</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:</strong></p>\r\n\r\n<p>- Bảo quản nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh &aacute;nh nắng trực tiếp của mặt trời.</p>\r\n\r\n<p>- Để xa tầm tay của trẻ em.</p>\r\n', 0, '2020-07-01 00:00:00', '2020-08-11 13:10:56'),
(2, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', 'update', 'Hàn Quốc', '150', '../../../img/2.jpg', '100ml', '<p><strong>C&ocirc;ng dụng của kem đa năng Lucas Papaw Ointment 25g</strong></p>\r\n\r\n<p><em><strong>- Gi&uacute;p hỗ trợ điều trị vi&ecirc;m da do dị ứng, nứt đầu ti ở b&agrave; bầu v&agrave; hăm xước da ở trẻ em</strong></em></p>\r\n\r\n<p>+ Loại kem n&agrave;y c&oacute; t&aacute;c dụng l&agrave;m giảm c&aacute;c triệu chứng vi&ecirc;m da, dị ứng ngo&agrave;i da, mẩn ngứa hay bị ph&aacute;t ban.</p>\r\n\r\n<p>+ Gi&uacute;p cho trẻ em thường xuy&ecirc;n đeo bỉm hết bị vết xước hay hăm t&atilde;</p>\r\n\r\n<p>+ Kem Lucas c&ograve;n c&oacute; c&ocirc;ng dụng giảm vi&ecirc;m da, l&agrave;m l&agrave;nh vết nứt cổ g&agrave; ở đầu ti c&aacute;c b&agrave; mẹ đang cho con b&uacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '2020-06-02 00:00:00', '2020-08-07 08:28:41'),
(3, 'Viên uống Vitamin E Zentiva đẹp da chống lão hóa', '', 'Mỹ', '300', '../img/3.jpg', '100ml', NULL, 0, '2020-04-06 00:00:00', '2020-05-12 00:00:00'),
(4, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', '', 'Mỹ', '600', '../img/4.jpg', '100ml', NULL, 0, '2020-06-01 00:00:00', '2020-08-13 00:00:00'),
(5, 'Bộ dưỡng da cao cấp 3w clinic flower effect extra', '', 'Hàn Quốc', '800', '../img/5.png', '100ml', NULL, 0, '2019-09-04 00:00:00', '2020-03-10 00:00:00'),
(6, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', '', 'Hàn Quốc', '560', '../img/6.jpg', '100ml', NULL, 0, '2019-12-03 00:00:00', '2020-11-18 00:00:00'),
(7, 'Son chou chou siêu lì siêu mịn vỏ đỏ', '', 'Hàn Quốc', '700', '../img/7.jpg', '100ml', NULL, 0, '2019-02-04 00:00:00', '2020-01-10 00:00:00'),
(8, 'SON DƯỠNG MÔI INNISFREE GLOW TINT LIP', '', 'Mỹ', '760', '../img/8.jpg', '100ml', NULL, 0, '2019-01-03 00:00:00', '2020-01-18 00:00:00'),
(9, 'SON DƯỠNG CÓ MÀU VÀ KHÔNG MÀU DHC COLOR', '', 'Mỹ', '170', '../img/9.jpg', '100ml', NULL, 0, '2019-01-21 00:00:00', '2020-01-15 00:00:00'),
(10, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', '', 'Mỹ', '600', '../img/10.jpg', '100ml', NULL, 0, '2020-06-01 00:00:00', '2020-08-13 00:00:00'),
(11, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', '', 'Hàn Quốc', '560', '../img/11.jpg', '100ml', NULL, 0, '2019-12-03 00:00:00', '2020-08-06 15:37:21'),
(12, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', '', 'Hàn Quốc', '150', '../img/12.jpg', '100ml', NULL, 0, '2020-06-02 00:00:00', '2020-08-05 14:52:05'),
(13, 'Viên uống trắng da Glutathione Ever Collagen', '', 'Hàn Quốc', '200', '../img/2.jpg', '100ml', NULL, 0, '2020-07-01 00:00:00', '2020-08-05 10:23:12'),
(18, 'son cao cấp', 'son mới nhập', 'Anh', '120000', '../IMG//11111.jpeg', '100ml', '<p>111111111111111111111111</p>\r\n', 0, '2020-08-11 13:03:22', NULL),
(19, 'ngo ta sinh', 'moi', 'anh', '22222', '../', '100', '<p>aaaaaaaaaaaaaaaaaa</p>\r\n', 0, '2020-08-11 14:19:34', NULL),
(20, 'ngo ta sinh', 'moi', 'anh', '22222', '../IMG//setting.png', '100', '<p>aaaaaaaaaaaaaaaa</p>\r\n', 0, '2020-08-11 14:20:54', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `t_account`
--
ALTER TABLE `t_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`);

--
-- Chỉ mục cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `t_order`
--
ALTER TABLE `t_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id đơn hàng', AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id chi tiết đơn hàng', AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT cho bảng `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id sản phẩm', AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `t_order`
--
ALTER TABLE `t_order`
  ADD CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `t_account` (`id`);

--
-- Các ràng buộc cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  ADD CONSTRAINT `t_order_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `t_product` (`id`),
  ADD CONSTRAINT `t_order_detail_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `t_order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
