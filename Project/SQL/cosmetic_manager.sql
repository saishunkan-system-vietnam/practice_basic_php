-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 06, 2020 lúc 12:41 PM
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
('admin@gmail.com', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '2020-08-06', 1, '0965002620', NULL, 'Huế', 1, 0, '2020-07-01 13:21:01', '2020-07-29 13:22:49'),
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
(23, 'admin@gmail.com', 'Ngô Tá Sinh', '0965000000', 'Đà Nẵng', '1700', 'Hàng dể vỡ', 0, 1, '2020-08-06 14:24:58', '2020-08-06 14:49:05');

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
(32, 23, 4, 1, '600', 1, '2020-08-06 14:24:58', '2020-08-06 14:49:05');

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
(1, 'Viên uống trắng da Glutathione Ever Collagen', 'Kem đa năng Lucas Papaw Ointment 25g là một loại kem đa năng có xuất xứ từ Úc, sản phẩm là niểm tự hào hơn 100 năm qua của xứ sở Kangaroo.  Giá trên đã bao gồm phí mua hộ, chưa bao gồm thuế và phí vận chuyển (nếu có) ở nước ngoài và cước vận chuyển về Việt Nam. Miễn phí giao hàng nội thành Hà Nội và Hồ Chí Minh.', 'Hàn Quốc', '200', '../../img/1.jpg', '1', '<p><strong>C&ocirc;ng dụng của kem đa năng Lucas Papaw Ointment 25g</strong></p>\r\n\r\n<p><em><strong>- Gi&uacute;p hỗ trợ điều trị vi&ecirc;m da do dị ứng, nứt đầu ti ở b&agrave; bầu v&agrave; hăm xước da ở trẻ em</strong></em></p>\r\n\r\n<p>+ Loại kem n&agrave;y c&oacute; t&aacute;c dụng l&agrave;m giảm c&aacute;c triệu chứng vi&ecirc;m da, dị ứng ngo&agrave;i da, mẩn ngứa hay bị ph&aacute;t ban.</p>\r\n\r\n<p>+ Gi&uacute;p cho trẻ em thường xuy&ecirc;n đeo bỉm hết bị vết xước hay hăm t&atilde;</p>\r\n\r\n<p>+ Kem Lucas c&ograve;n c&oacute; c&ocirc;ng dụng giảm vi&ecirc;m da, l&agrave;m l&agrave;nh vết nứt cổ g&agrave; ở đầu ti c&aacute;c b&agrave; mẹ đang cho con b&uacute;</p>\r\n\r\n<p><em><strong>- T&aacute;c dụng như kem nẻ, vừa c&oacute; t&aacute;c dụng như kem dưỡng</strong></em></p>\r\n\r\n<p>+ Chuy&ecirc;n hỗ trợ điều trị c&aacute;c triệu chứng kh&ocirc;, nứt nẻ ngo&agrave;i da như da kh&ocirc; bong tr&oacute;c, da bị nẻ hay phồng rộp, m&ocirc;i kh&ocirc; nứt do thời tiết hanh kh&ocirc;&hellip;</p>\r\n\r\n<p>+ C&oacute; t&aacute;c dụng dưỡng m&ocirc;i, dưỡng da, tạo n&ecirc;n sự mịn m&agrave;ng, gi&uacute;p da trở n&ecirc;n mềm mịn.</p>\r\n\r\n<p><em><strong>- Kem Lucas của &Uacute;c c&ograve;n được biết đến như 1 sản phẩm l&agrave;m đẹp</strong></em></p>\r\n\r\n<p>+ Nhờ c&ocirc;ng dụng dưỡng da m&agrave; chị em phụ nữ khi trang điểm c&oacute; thể sử dụng sản phẩm n&agrave;y thay cho kem l&oacute;t</p>\r\n\r\n<p>+ Hơn nữa loại sản phẩm đa năng n&agrave;y c&ograve;n được d&ugrave;ng như geo t&oacute;c, gi&uacute;p cho m&aacute;i t&oacute;c v&agrave;o nếp v&agrave; kh&ocirc;ng bị x&ugrave; rối</p>\r\n\r\n<p>+ C&aacute;c loại mụn mới tấy, mụn bọc hay mụn mủ sẽ bị tan xẹp nhờ sản phẩm n&agrave;y</p>\r\n\r\n<p>+ Nhờ b&ocirc;i kem Lucas m&agrave; những vết sẹo, vết ch&agrave;m xấu x&iacute; sẽ bị mờ dần đi</p>\r\n\r\n<p><em><strong>- Một số t&aacute;c dụng kh&aacute;c</strong></em></p>\r\n\r\n<p>+ Nhờ c&oacute; kem đa năng Lucas m&agrave; những vết do c&ocirc;n tr&ugrave;ng cắn, muỗi đốt sẽ khỏi</p>\r\n\r\n<p>+ Giảm đau r&aacute;t ở những v&ugrave;ng da bị bỏng nước, ch&aacute;y rộp hay ch&aacute;y nắng</p>\r\n\r\n<p>+ Những vết thương hay đứt tay nhẹ do dao k&eacute;o,do c&aacute;c mảnh kim loại, s&agrave;nh vụn, gai đ&acirc;m sẽ được hỗ trợ điều trị l&agrave;nh nhờ loại kem n&agrave;y</p>\r\n\r\n<p>+ Một số trường hợp bị mắc chứng Eczema được hỗ trợ điều trị khỏi nhờ kem b&ocirc;i đa năng n&agrave;y</p>\r\n\r\n<p>+ Hỗ trợ bệnh nh&acirc;n mắc bệnh trĩ tạm thời.</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>Những th&agrave;nh phần chủ yếu tự nhi&ecirc;n l&agrave; men đu đủ Carica tươi, Petroleum chất tự nhi&ecirc;n c&oacute; c&ocirc;ng dụng bảo quản Kali Sorbate...</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>&ndash; Xo&aacute;y mở nắp tu&yacute;p kem Lucas ra</p>\r\n\r\n<p>&ndash; Mở nắp bảo quản bằng c&aacute;ch d&ugrave;ng phần lưng của nắp, xong bước n&agrave;y l&agrave; thoa kem l&ecirc;n da v&agrave; chờ kết quả nh&eacute;!</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:</strong></p>\r\n\r\n<p>- Bảo quản nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh &aacute;nh nắng trực tiếp của mặt trời.</p>\r\n\r\n<p>- Để xa tầm tay của trẻ em.</p>\r\n', 0, '2020-07-01 00:00:00', '2020-08-06 10:53:02'),
(2, 'Viên Uống Innerb Aqua Rich Hỗ Trợ Cấp Nước', 'update', 'Hàn Quốc', '150', '../../img/2.jpg', '1', '<p><strong>C&ocirc;ng dụng của kem đa năng Lucas Papaw Ointment 25g</strong></p>\r\n\r\n<p><em><strong>- Gi&uacute;p hỗ trợ điều trị vi&ecirc;m da do dị ứng, nứt đầu ti ở b&agrave; bầu v&agrave; hăm xước da ở trẻ em</strong></em></p>\r\n\r\n<p>+ Loại kem n&agrave;y c&oacute; t&aacute;c dụng l&agrave;m giảm c&aacute;c triệu chứng vi&ecirc;m da, dị ứng ngo&agrave;i da, mẩn ngứa hay bị ph&aacute;t ban.</p>\r\n\r\n<p>+ Gi&uacute;p cho trẻ em thường xuy&ecirc;n đeo bỉm hết bị vết xước hay hăm t&atilde;</p>\r\n\r\n<p>+ Kem Lucas c&ograve;n c&oacute; c&ocirc;ng dụng giảm vi&ecirc;m da, l&agrave;m l&agrave;nh vết nứt cổ g&agrave; ở đầu ti c&aacute;c b&agrave; mẹ đang cho con b&uacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, '2020-06-02 00:00:00', '2020-08-06 10:02:58'),
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
(13, 'Viên uống trắng da Glutathione Ever Collagen', '', 'Hàn Quốc', '200', '../img/2.jpg', '100ml', NULL, 0, '2020-07-01 00:00:00', '2020-08-05 10:23:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id đơn hàng', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `t_order_detail`
--
ALTER TABLE `t_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id chi tiết đơn hàng', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id sản phẩm', AUTO_INCREMENT=14;

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
