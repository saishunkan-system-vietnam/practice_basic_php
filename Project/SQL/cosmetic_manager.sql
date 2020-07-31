-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2020 lúc 12:31 PM
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
('abcd@gmail.com', 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-15', 1, '0965000002', NULL, 'Đà Nẵng', 0, 0, '2019-09-24 13:21:32', '2020-07-29 13:22:49'),
('admin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00', 1, '0965002620', NULL, 'Huế', 0, 0, '2020-07-01 13:21:01', '2020-07-29 13:22:49'),
('nguyenvana@gmail.com', 'Nguyễn Văn A', 'bd4b8ad9061b07afd36df11476066877', '2020-07-23', 0, '0965000000', NULL, 'Đà Nẵng', 0, 0, '1899-05-23 13:21:22', '2020-07-29 13:22:49'),
('tinhbano1o2@gmail.com', 'Ngô Tá Sinh', 'bd4b8ad9061b07afd36df11476066877', '2020-07-24', 0, '0965000001', '42d8e03a', 'Huế', 0, 0, '2020-07-21 13:21:28', '2020-07-31 08:29:59');

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
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Cờ Xóa',
  `create_datetime` datetime NOT NULL COMMENT 'Thời gian đặt hàng',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thời gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_order`
--

INSERT INTO `t_order` (`id`, `id_account`, `recipient`, `phone`, `address`, `payments`, `note`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(1, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1900', '', 0, '2020-07-31 17:23:24', NULL),
(2, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1900', 'haaaaaaaaaaaaaaaaaaaaaaaa', 0, '2020-07-31 17:25:37', NULL),
(3, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1900', 'haaaaaaaaaaaaaaaaaaaaaaa', 0, '2020-07-31 17:25:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_order_detail`
--

CREATE TABLE `t_order_detail` (
  `id` int(11) NOT NULL COMMENT 'Id chi tiết đơn hàng',
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

INSERT INTO `t_order_detail` (`id`, `id_product`, `quantity`, `price`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(1, 1, 3, '200', 0, '2020-07-31 17:23:24', NULL),
(2, 13, 2, '200', 0, '2020-07-31 17:23:24', NULL),
(3, 2, 3, '150', 0, '2020-07-31 17:23:24', NULL),
(4, 12, 3, '150', 0, '2020-07-31 17:23:24', NULL),
(5, 1, 3, '200', 0, '2020-07-31 17:25:37', NULL),
(6, 13, 2, '200', 0, '2020-07-31 17:25:37', NULL),
(7, 2, 3, '150', 0, '2020-07-31 17:25:37', NULL),
(8, 12, 3, '150', 0, '2020-07-31 17:25:37', NULL),
(9, 1, 3, '200', 0, '2020-07-31 17:25:44', NULL),
(10, 13, 2, '200', 0, '2020-07-31 17:25:44', NULL),
(11, 2, 3, '150', 0, '2020-07-31 17:25:44', NULL),
(12, 12, 3, '150', 0, '2020-07-31 17:25:44', NULL);

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
  `avarta` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh sản phhẩm',
  `capacity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'dung tích',
  `note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chú thích sản phẩm',
  `del_flg` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `upadte_datetime` datetime DEFAULT NULL COMMENT 'Thơig gian update'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `t_product`
--

INSERT INTO `t_product` (`id`, `name`, `describe_product`, `origin`, `price`, `avarta`, `capacity`, `note`, `del_flg`, `create_datetime`, `upadte_datetime`) VALUES
(1, 'Viên uống trắng da Glutathione Ever Collagen', 'Kem đa năng Lucas Papaw Ointment 25g là một loại kem đa năng có xuất xứ từ Úc, sản phẩm là niểm tự hào hơn 100 năm qua của xứ sở Kangaroo.  Giá trên đã bao gồm phí mua hộ, chưa bao gồm thuế và phí vận chuyển (nếu có) ở nước ngoài và cước vận chuyển về Việt Nam. Miễn phí giao hàng nội thành Hà Nội và Hồ Chí Minh.', 'Hàn Quốc', '200', './img/1.jpg', '100ml', '<p><strong>Công dụng của kem đa năng Lucas Papaw Ointment 25g</strong></p>\r\n<p><em><strong>- Giúp hỗ trợ điều trị viêm da do dị ứng, nứt đầu ti ở bà bầu và hăm xước da ở trẻ em</strong></em></p>\r\n<p>+ Loại kem này có tác dụng làm giảm các triệu chứng viêm da, dị ứng ngoài da, mẩn ngứa hay bị phát ban.</p>\r\n<p>+ Giúp cho trẻ em thường xuyên đeo bỉm hết bị vết xước hay hăm tã</p>\r\n<p>+ Kem Lucas còn có công dụng giảm viêm da, làm lành vết nứt cổ gà ở đầu ti các bà mẹ đang cho con bú</p>\r\n<p><em><strong>- Tác dụng như kem nẻ, vừa có tác dụng như kem dưỡng</strong></em></p>\r\n<p>+ Chuyên hỗ trợ điều trị các triệu chứng khô, nứt nẻ ngoài da như da khô bong tróc, da bị nẻ hay phồng rộp, môi khô nứt do thời tiết hanh khô…</p>\r\n<p>+ Có tác dụng dưỡng môi, dưỡng da, tạo nên sự mịn màng, giúp da trở nên mềm mịn.</p>\r\n<p><em><strong>- Kem Lucas của Úc còn được biết đến như 1 sản phẩm làm đẹp</strong></em></p>\r\n<p>+ Nhờ công dụng dưỡng da mà chị em phụ nữ khi trang điểm có thể sử dụng sản phẩm này thay cho kem lót</p>\r\n<p>+ Hơn nữa loại sản phẩm đa năng này còn được dùng như geo tóc, giúp cho mái tóc vào nếp và không bị xù rối</p>\r\n<p>+ Các loại mụn mới tấy, mụn bọc hay mụn mủ sẽ bị tan xẹp nhờ sản phẩm này</p>\r\n<p>+ Nhờ bôi kem Lucas mà những vết sẹo, vết chàm xấu xí sẽ bị mờ dần đi</p>\r\n<p><em><strong>- Một số tác dụng khác</strong></em></p>\r\n<p>+ Nhờ có kem đa năng Lucas mà những vết do côn trùng cắn, muỗi đốt sẽ khỏi</p>\r\n<p>+ Giảm đau rát ở những vùng da bị bỏng nước, cháy rộp hay cháy nắng</p>\r\n<p>+ Những vết thương hay đứt tay nhẹ do dao kéo,do các mảnh kim loại, sành vụn, gai đâm sẽ được hỗ trợ điều trị lành nhờ loại kem này</p>\r\n<p>+ Một số trường hợp bị mắc chứng Eczema được hỗ trợ điều trị khỏi nhờ kem bôi đa năng này</p>\r\n<p>+ Hỗ trợ bệnh nhân mắc bệnh trĩ tạm thời.</p>\r\n<p><strong>Thành phần:</strong></p>\r\n<p>Những thành phần chủ yếu tự nhiên là men đu đủ Carica tươi, Petroleum chất tự nhiên có công dụng bảo quản Kali Sorbate...</p>\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n<p>– Xoáy mở nắp tuýp kem Lucas ra</p>\r\n<p>– Mở nắp bảo quản bằng cách dùng phần lưng của nắp, xong bước này là thoa kem lên da và chờ kết quả nhé!</p>\r\n<p><strong>Hướng dẫn bảo quản:</strong></p>\r\n<p>- Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp của mặt trời.</p>\r\n<p>- Để xa tầm tay của trẻ em.</p>', 0, '2020-07-01 00:00:00', '2020-07-31 00:00:00'),
(2, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', '', 'Hàn Quốc', '150', './img/2.jpg', '100ml', '<p><strong>Công dụng của kem đa năng Lucas Papaw Ointment 25g</strong></p>\r\n<p><em><strong>- Giúp hỗ trợ điều trị viêm da do dị ứng, nứt đầu ti ở bà bầu và hăm xước da ở trẻ em</strong></em></p>\r\n<p>+ Loại kem này có tác dụng làm giảm các triệu chứng viêm da, dị ứng ngoài da, mẩn ngứa hay bị phát ban.</p>\r\n<p>+ Giúp cho trẻ em thường xuyên đeo bỉm hết bị vết xước hay hăm tã</p>\r\n<p>+ Kem Lucas còn có công dụng giảm viêm da, làm lành vết nứt cổ gà ở đầu ti các bà mẹ đang cho con bú</p>\r\n<p><em><s', 0, '2020-06-02 00:00:00', '2020-07-14 00:00:00'),
(3, 'Viên uống Vitamin E Zentiva đẹp da chống lão hóa', '', 'Mỹ', '300', './img/3.jpg', '100ml', NULL, 0, '2020-04-06 00:00:00', '2020-05-12 00:00:00'),
(4, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', '', 'Mỹ', '600', './img/4.jpg', '100ml', NULL, 0, '2020-06-01 00:00:00', '2020-08-13 00:00:00'),
(5, 'Bộ dưỡng da cao cấp 3w clinic flower effect extra', '', 'Hàn Quốc', '800', './img/5.png', '100ml', NULL, 0, '2019-09-04 00:00:00', '2020-03-10 00:00:00'),
(6, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', '', 'Hàn Quốc', '560', './img/6.jpg', '100ml', NULL, 0, '2019-12-03 00:00:00', '2020-11-18 00:00:00'),
(7, 'Son chou chou siêu lì siêu mịn vỏ đỏ', '', 'Hàn Quốc', '700', './img/7.jpg', '100ml', NULL, 0, '2019-02-04 00:00:00', '2020-01-10 00:00:00'),
(8, 'SON DƯỠNG MÔI INNISFREE GLOW TINT LIP', '', 'Mỹ', '760', './img/8.jpg', '100ml', NULL, 0, '2019-01-03 00:00:00', '2020-01-18 00:00:00'),
(9, 'SON DƯỠNG CÓ MÀU VÀ KHÔNG MÀU DHC COLOR', '', 'Mỹ', '170', './img/9.jpg', '100ml', NULL, 0, '2019-01-21 00:00:00', '2020-01-15 00:00:00'),
(10, 'Bộ mỹ phẩm dưỡng trắng da 3w cilic skin ', '', 'Mỹ', '600', './img/10.jpg', '100ml', NULL, 0, '2020-06-01 00:00:00', '2020-08-13 00:00:00'),
(11, 'Serum tế bào gốc sét 4 ống- Hàn Quốc', '', 'Hàn Quốc', '560', './img/11.jpg', '100ml', NULL, 0, '2019-12-03 00:00:00', '2020-11-18 00:00:00'),
(12, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', '', 'Hàn Quốc', '150', './img/12.jpg', '100ml', NULL, 0, '2020-06-02 00:00:00', '2020-07-14 00:00:00'),
(13, 'Viên uống trắng da Glutathione Ever Collagen', '', 'Hàn Quốc', '200', './img/2.jpg', '100ml', NULL, 0, '2020-07-01 00:00:00', '2020-07-31 00:00:00');

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id đơn hàng', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id chi tiết đơn hàng', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id sản phẩm', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
