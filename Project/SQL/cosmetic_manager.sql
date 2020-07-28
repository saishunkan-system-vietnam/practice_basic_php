-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 28, 2020 lúc 12:33 PM
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
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 0,
  `lever` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `fullname`, `password`, `birthday`, `sex`, `phone`, `email`, `address`, `del_flag`, `lever`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00', 1, '0965002620', 'admin@gmail.com', 'Huế', 0, 0),
(8, 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-23', 0, '0965000000', 'nguyenvana@gmail.com', 'Đà Nẵng', 0, 0),
(24, 'Ngô Tá Sinh', 'bd4b8ad9061b07afd36df11476066877', '2020-07-24', 0, '0965000001', 'tinhbano1o2@gmail.com', 'Huế', 0, 0),
(25, 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-15', 1, '0965000002', 'abcd@gmail.com', 'Đà Nẵng', 0, 0),
(26, 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-18', 0, '0965000003', 'aaaaaa@gmail.com', 'Đà Nẵng', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_time` date NOT NULL,
  `expiry_date` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `avarta` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `producer`, `production_time`, `expiry_date`, `price`, `avarta`, `del_flg`, `note`) VALUES
(1, 'Viên uống trắng da Glutathione Ever Collagen', 'Hàn Quốc', '2020-07-01', '2020-07-31', '200', './img/1.jpg', 0, NULL),
(2, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', 'Hàn Quốc', '2020-06-02', '2020-07-14', '150', './img/2.jpg', 0, NULL),
(3, 'Viên uống Vitamin E Zentiva đẹp da chống lão hóa', 'Mỹ', '2020-04-06', '2020-05-12', '300', './img/3.jpg', 0, NULL),
(4, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', 'Mỹ', '2020-06-01', '2020-08-13', '600', './img/4.jpg', 0, NULL),
(5, 'Bộ dưỡng da cao cấp 3w clinic flower effect extra', 'Hàn Quốc', '2019-09-04', '2020-03-10', '800', './img/5.png', 0, NULL),
(6, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', 'Hàn Quốc', '2019-12-03', '2020-11-18', '560', './img/6.jpg', 0, NULL),
(7, 'Son chou chou siêu lì siêu mịn vỏ đỏ', 'Hàn Quốc', '2019-02-04', '2020-01-10', '700', './img/7.jpg', 0, NULL),
(8, 'SON DƯỠNG MÔI INNISFREE GLOW TINT LIP', 'Mỹ', '2019-01-03', '2020-01-18', '760', './img/8.jpg', 0, NULL),
(9, 'SON DƯỠNG CÓ MÀU VÀ KHÔNG MÀU DHC COLOR', 'Mỹ', '2019-01-21', '2020-01-15', '170', './img/9.jpg', 0, NULL),
(10, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', 'Mỹ', '2020-06-01', '2020-08-13', '600', './img/10.jpg', 0, NULL),
(11, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', 'Hàn Quốc', '2019-12-03', '2020-11-18', '560', './img/11.jpg', 0, NULL),
(12, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', 'Hàn Quốc', '2020-06-02', '2020-07-14', '150', './img/12.jpg', 0, NULL),
(13, 'Viên uống trắng da Glutathione Ever Collagen', 'Hàn Quốc', '2020-07-01', '2020-07-31', '200', './img/2.jpg', 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
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
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
