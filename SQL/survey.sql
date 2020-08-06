-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 07:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(30) NOT NULL,
  `cnt` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `cnt`) VALUES
(9999, 23);

-- --------------------------------------------------------

--
-- Table structure for table `t_account`
--

CREATE TABLE `t_account` (
  `uid` varchar(100) NOT NULL COMMENT 'Email đăng nhập',
  `fname` varchar(100) NOT NULL COMMENT 'Họ',
  `lname` varchar(100) NOT NULL COMMENT 'Tên',
  `pass` varchar(50) NOT NULL COMMENT 'Mật khẩu',
  `tel` varchar(20) NOT NULL COMMENT 'Số điện thoại',
  `gender` tinyint(1) DEFAULT NULL COMMENT 'Giới tính',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ xóa',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian tạo',
  `upadte_datetime` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Thời gian update',
  `upd_count` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lần update',
  `admin_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Cờ quản trị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`uid`, `fname`, `lname`, `pass`, `tel`, `gender`, `del_flg`, `create_datetime`, `upadte_datetime`, `upd_count`, `admin_flg`) VALUES
('12abc@gmail.com', 'lieu', 'nguyen', '1', '0564896565', 1, 0, '2020-08-04 13:24:35', '2020-08-04 13:24:35', 0, 0),
('abc11@gmail.com', 'lieu', 'nguyen', '1', '0365898564', 1, 0, '2020-08-04 13:25:08', '2020-08-04 13:25:08', 0, 0),
('abc1213@gmail.com', 'mn d,mf w.e', 'nguyen', '1', '0358978546', 2, 1, '2020-08-04 13:27:27', '2020-08-04 13:55:56', 0, 0),
('abc12@gmail.com', 'lieu', 'nguyen', '1', '0564589652', 1, 0, '2020-08-04 13:23:42', '2020-08-04 13:23:42', 0, 0),
('abc1@gmail.com', 'nguyen', 'thị a', '1', '0564856952', 2, 1, '2020-08-04 13:26:45', '2020-08-04 13:56:16', 0, 0),
('abc2@gmail.com', 'lieu', 'nguyen', '123456', '0356898564', 1, 0, '2020-08-04 11:44:44', '2020-08-04 11:44:44', 0, 0),
('abc@bcf.com', 'eqwe2', 'eqwe', '1', '0365654521', 1, 0, '2020-07-21 21:48:30', '2020-08-04 10:54:13', 0, 0),
('abc@gmail.com', 'asd222', 'dasdas', 'fkdjsfkak', '0386279685', 1, 0, '2020-07-19 21:14:43', '2020-08-05 08:50:11', 0, 1),
('admin1@gmail.com', 'nguyen', 'eqwe', '123456', '0386279685', 2, 0, '2020-07-20 22:33:45', '2020-08-04 13:23:24', 0, 0),
('admin@gmail.com', 'nguyen', 'duc lieu', '1', '0386279685', 1, 0, '2020-07-19 20:37:32', '2020-08-04 12:39:51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_answer`
--

CREATE TABLE `t_answer` (
  `id` varchar(30) NOT NULL COMMENT 'id',
  `id_hdr` varchar(30) NOT NULL COMMENT 'id header',
  `id_dtl` varchar(30) NOT NULL COMMENT 'id detail',
  `usr_id` varchar(100) NOT NULL COMMENT 'user id',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày trả lời',
  `del_flg` smallint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_answer`
--

INSERT INTO `t_answer` (`id`, `id_hdr`, `id_dtl`, `usr_id`, `create_datetime`, `del_flg`) VALUES
('1595814688', 'HD_005', 'DT_025', 'abc@gmail.com', '2020-07-27 08:51:28', 0),
('1595814883', 'HD_017', 'DT_074', 'abc@gmail.com', '2020-07-27 08:54:43', 0),
('1595818525', 'HD_014', 'DT_063', 'abc@gmail.com', '2020-07-27 09:55:25', 0),
('1595821886', 'HD_015', 'DT_067', 'abc@gmail.com', '2020-07-27 10:51:26', 0),
('1595824272', 'HD_016', 'DT_071', 'abc@gmail.com', '2020-07-27 11:31:12', 0),
('1595825112', 'HD_010', 'DT_045', 'abc@gmail.com', '2020-07-27 11:45:12', 0),
('1595828940', 'HD_013', 'DT_056', 'abc@gmail.com', '2020-07-27 12:49:00', 0),
('1595828957', 'HD_012', 'DT_051', 'abc@gmail.com', '2020-07-27 12:49:17', 0),
('1595836339', 'HD_015', 'DT_067', 'admin@gmail.com', '2020-07-27 14:52:19', 0),
('1595910959', 'HD_008', 'DT_039', 'abc@gmail.com', '2020-07-28 11:35:59', 0),
('1595923094', 'HD_009', 'DT_043', 'abc@gmail.com', '2020-07-28 14:58:14', 0),
('1595992903', 'HD_006', 'DT_028', 'abc@gmail.com', '2020-07-29 10:21:43', 0),
('1595992945', 'HD_006', 'DT_030', 'admin@gmail.com', '2020-07-29 10:22:25', 0),
('1596017843', 'HD_010', 'DT_047', 'admin@gmail.com', '2020-07-29 17:17:23', 0),
('1596017854', 'HD_016', 'DT_070', 'admin@gmail.com', '2020-07-29 17:17:34', 0),
('183/1596692802496', 'HD_005', 'DT_022', 'admin@gmail.com', '2020-08-06 12:46:42', 0),
('283/1596688117043', '210/1596613646582', '194/1596613673970', 'admin@gmail.com', '2020-08-06 11:28:37', 0),
('350/1596688117069', '392/1596679485609', '495/1596679493873', 'admin@gmail.com', '2020-08-06 11:28:37', 0),
('384/1596688117057', '29/1596613686915', '459/1596613698045', 'admin@gmail.com', '2020-08-06 11:28:37', 0),
('538/1596692802507', '134/1596692694385', '626/1596692721269', 'admin@gmail.com', '2020-08-06 12:46:42', 0),
('714/1596688038029', '415/1596252211710', '93/1596252254765', 'admin@gmail.com', '2020-08-06 11:27:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id` varchar(30) NOT NULL COMMENT 'id loại khảo sát',
  `content` varchar(300) NOT NULL COMMENT 'Loại khỏa sát',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'thời gian update',
  `update_count` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'số lần update',
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa (1: xóa, 0: không xóa)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id`, `content`, `create_datetime`, `update_datetime`, `update_count`, `del_flg`) VALUES
('CT_001', 'Cuộc sống', '2020-07-21 20:41:25', '2020-07-21 20:41:25', 0, 0),
('CT_002', 'Gia đình', '2020-07-21 20:41:54', '2020-07-21 20:41:54', 0, 0),
('CT_003', 'Thể thao', '2020-07-21 20:42:03', '2020-07-21 20:42:03', 0, 0),
('CT_004', 'Du lịch', '2020-07-21 20:42:22', '2020-07-21 20:42:22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_surveydtl`
--

CREATE TABLE `t_surveydtl` (
  `id` varchar(30) NOT NULL COMMENT 'Id',
  `id_hdr` varchar(30) NOT NULL COMMENT 'Id header',
  `answer` varchar(500) NOT NULL COMMENT 'câu trả lời',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày update',
  `update_count` smallint(1) NOT NULL DEFAULT 0 COMMENT 'số lần update',
  `del_flg` smallint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa',
  `STT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_surveydtl`
--

INSERT INTO `t_surveydtl` (`id`, `id_hdr`, `answer`, `create_datetime`, `update_datetime`, `update_count`, `del_flg`, `STT`) VALUES
('161/1596613659912', '210/1596613646582', '3', '2020-08-05 14:48:30', '2020-08-05 14:48:30', 0, 0, 1),
('194/1596613673970', '210/1596613646582', '4', '2020-08-05 14:48:30', '2020-08-05 14:48:30', 0, 0, 2),
('232/1596692709267', '134/1596692694385', 'vì thích', '2020-08-06 12:45:29', '2020-08-06 13:38:12', 0, 1, 98),
('264/1596679497274', '392/1596679485609', '3', '2020-08-06 09:05:05', '2020-08-06 11:39:27', 0, 1, 93),
('274/1596252250429', '415/1596252211710', '1993', '2020-08-01 10:24:18', '2020-08-01 10:24:18', 0, 0, 3),
('459/1596613698045', '29/1596613686915', 'đá34234', '2020-08-05 14:48:31', '2020-08-05 14:48:31', 0, 0, 4),
('486/1596362497281', '78/1596362488146', 'ai', '2020-08-02 17:01:39', '2020-08-02 17:01:59', 0, 1, 5),
('492/1596684905413', '913/1596684884947', 'hgjghfj', '2020-08-06 10:35:07', '2020-08-06 10:35:11', 0, 1, 96),
('495/1596679493873', '392/1596679485609', '1', '2020-08-06 09:05:05', '2020-08-06 11:39:27', 0, 1, 91),
('544/1596613695524', '29/1596613686915', 'c3ewrqew', '2020-08-05 14:48:31', '2020-08-05 14:48:31', 0, 0, 6),
('626/1596692721269', '134/1596692694385', 'thích thì uống thôi', '2020-08-06 12:45:29', '2020-08-06 12:45:29', 0, 0, 100),
('628/1596252229822', '415/1596252211710', '1990', '2020-08-01 10:24:18', '2020-08-01 10:24:18', 0, 0, 7),
('736/1596692713716', '134/1596692694385', 'vì đam mê', '2020-08-06 12:45:29', '2020-08-06 12:45:29', 0, 0, 99),
('787/1596684907125', '913/1596684884947', 'jghfjfg', '2020-08-06 10:35:07', '2020-08-06 10:35:11', 0, 1, 97),
('796/1596613655529', '210/1596613646582', '1', '2020-08-05 14:48:30', '2020-08-05 14:48:30', 0, 0, 8),
('895/1596362578393', '627/1596362573112', 'ai', '2020-08-02 17:02:59', '2020-08-03 12:56:10', 0, 1, 9),
('900/1596679495361', '392/1596679485609', '2', '2020-08-06 09:05:05', '2020-08-06 11:39:27', 0, 1, 92),
('901/1596692727261', '134/1596692694385', 'Khác', '2020-08-06 12:45:29', '2020-08-06 12:45:29', 0, 0, 101),
('905/1596679499466', '392/1596679485609', '4', '2020-08-06 09:05:05', '2020-08-06 11:39:27', 0, 1, 94),
('906/1596613658432', '210/1596613646582', '2', '2020-08-05 14:48:30', '2020-08-05 14:48:30', 0, 0, 10),
('93/1596252254765', '415/1596252211710', 'Khác', '2020-08-01 10:24:18', '2020-08-06 13:39:06', 0, 1, 11),
('954/1596252247093', '415/1596252211710', '1992', '2020-08-01 10:24:18', '2020-08-01 10:24:18', 0, 0, 12),
('972/1596679503730', '392/1596679485609', '0', '2020-08-06 09:05:05', '2020-08-06 11:39:27', 0, 1, 95),
('981/1596252218238', '415/1596252211710', '1989', '2020-08-01 10:24:18', '2020-08-01 10:24:18', 0, 0, 13),
('DT_001', 'HD_001', 'Do hoàn cảnh gia đình, bố mẹ không có cách giáo dục đúng đắn', '2020-07-21 20:45:29', '2020-07-21 20:45:29', 0, 0, 14),
('DT_002', 'HD_001', 'Do thiếu kiến thức chủ quan cho rằng bản thân sẽ không nghiện', '2020-07-21 20:46:05', '2020-07-21 20:46:05', 0, 0, 15),
('DT_003', 'HD_001', 'Do bạn bè rủ rê lôi kéo', '2020-07-21 20:46:25', '2020-07-21 20:46:25', 0, 0, 16),
('DT_004', 'HD_001', 'Khác.', '2020-07-21 20:46:37', '2020-07-21 20:46:37', 0, 0, 17),
('DT_005', 'HD_002', 'Đi du lịch', '2020-07-21 20:49:49', '2020-07-21 20:49:49', 0, 0, 18),
('DT_006', 'HD_002', 'Ăn món mình muốn', '2020-07-21 20:50:09', '2020-07-21 20:50:09', 0, 0, 19),
('DT_007', 'HD_002', 'Có thật nhiều tiền', '2020-07-21 20:50:21', '2020-07-21 20:50:21', 0, 0, 20),
('DT_008', 'HD_002', 'Giảm cân', '2020-07-21 20:50:32', '2020-07-21 20:50:32', 0, 0, 21),
('DT_009', 'HD_002', 'Dành thời gian cho gia đinh và người thân', '2020-07-21 20:50:43', '2020-07-21 20:50:43', 0, 0, 22),
('DT_010', 'HD_002', 'Khác', '2020-07-21 20:51:00', '2020-07-21 20:51:00', 0, 0, 23),
('DT_011', 'HD_003', 'Sẽ rất phát triển mạnh mẽ', '2020-07-21 20:51:52', '2020-07-21 20:51:52', 0, 0, 24),
('DT_012', 'HD_003', 'Có phát triển nhưng không phải lĩnh vực nào cũng có thể sử dụng hình thức online được.', '2020-07-21 20:53:25', '2020-07-21 20:53:25', 0, 0, 25),
('DT_013', 'HD_003', 'Vẫn duy trì tình trạng hiện tại', '2020-07-21 20:53:25', '2020-07-21 20:53:25', 0, 0, 26),
('DT_014', 'HD_003', 'Sẽ khó mà duy trì được', '2020-07-21 20:53:25', '2020-07-21 20:53:25', 0, 0, 27),
('DT_015', 'HD_003', 'Tôi không biết ra sao hoặc không quan tâm.', '2020-07-21 20:53:25', '2020-07-21 20:53:25', 0, 0, 28),
('DT_016', 'HD_003', 'Khác', '2020-07-21 20:53:25', '2020-07-21 20:53:25', 0, 0, 29),
('DT_017', 'HD_004', 'Rất thường xuyên', '2020-07-21 20:56:18', '2020-07-21 20:56:18', 0, 0, 30),
('DT_018', 'HD_004', 'Thường xuyên', '2020-07-21 20:56:18', '2020-07-21 20:56:18', 0, 0, 31),
('DT_019', 'HD_004', 'Bình thường', '2020-07-21 20:56:18', '2020-07-21 20:56:18', 0, 0, 32),
('DT_020', 'HD_004', 'Hiếm khi', '2020-07-21 20:56:18', '2020-07-21 20:56:18', 0, 0, 33),
('DT_021', 'HD_004', 'Chưa bao giờ', '2020-07-21 20:56:18', '2020-07-21 20:56:18', 0, 0, 34),
('DT_022', 'HD_005', 'Huda', '2020-07-21 20:59:37', '2020-07-21 20:59:37', 0, 0, 35),
('DT_023', 'HD_005', 'heliken', '2020-07-21 20:59:37', '2020-07-21 20:59:37', 0, 0, 36),
('DT_024', 'HD_005', 'Bia Hà Nội', '2020-07-21 20:59:37', '2020-07-21 20:59:37', 0, 0, 37),
('DT_025', 'HD_005', '33', '2020-07-21 20:59:37', '2020-07-31 16:10:51', 9, 1, 38),
('DT_026', 'HD_005', 'Sư tử trắng', '2020-07-21 20:59:37', '2020-07-21 20:59:37', 0, 0, 39),
('DT_027', 'HD_005', 'Khác', '2020-07-21 20:59:37', '2020-07-21 20:59:37', 0, 0, 40),
('DT_028', 'HD_006', 'Đi du lịch', '2020-07-21 21:02:32', '2020-07-21 21:02:32', 0, 0, 41),
('DT_029', 'HD_006', 'Thay đổi chỗ ở (mua/ thuê ... nhà mới )', '2020-07-21 21:02:32', '2020-07-21 21:02:32', 0, 0, 42),
('DT_030', 'HD_006', 'Gửi ngân hàng', '2020-07-21 21:02:32', '2020-07-21 21:02:32', 0, 0, 43),
('DT_031', 'HD_006', 'Khác', '2020-07-21 21:02:32', '2020-07-21 21:02:32', 0, 0, 44),
('DT_032', 'HD_007', 'Cách giáo dục của phụ huynh', '2020-07-21 21:05:05', '2020-07-21 21:05:05', 0, 0, 45),
('DT_033', 'HD_007', 'Sự phát triển của internet', '2020-07-21 21:05:05', '2020-07-21 21:05:05', 0, 0, 46),
('DT_034', 'HD_007', 'Do nhà trường không tập trung phát triển điểm mạnh của học sinh', '2020-07-21 21:05:05', '2020-07-21 21:05:05', 0, 0, 47),
('DT_035', 'HD_007', 'Do cách hành xử của những người sung quanh', '2020-07-21 21:05:05', '2020-07-21 21:05:05', 0, 0, 48),
('DT_036', 'HD_008', 'Rèn con tính tự lập , kỷ luật tốt', '2020-07-21 21:06:41', '2020-07-21 21:06:41', 0, 0, 49),
('DT_037', 'HD_008', 'Phát triển khả năng tập trung', '2020-07-21 21:06:41', '2020-07-21 21:06:41', 0, 0, 50),
('DT_038', 'HD_008', 'Phát triển tư duy', '2020-07-21 21:06:41', '2020-07-21 21:06:41', 0, 0, 51),
('DT_039', 'HD_008', 'Ý kiến khác', '2020-07-21 21:06:41', '2020-07-21 21:06:41', 0, 0, 52),
('DT_040', 'HD_009', 'Vì người trẻ là những người chỉ thích hưởng thụ, không muốn hi sinh bản thân cho gia đình', '2020-07-21 21:08:05', '2020-07-21 21:08:05', 0, 0, 53),
('DT_041', 'HD_009', 'Được tự do làm những điều mình thích', '2020-07-21 21:08:05', '2020-07-21 21:08:05', 0, 0, 54),
('DT_042', 'HD_009', 'Không tìm được người bạn đời phù hợp', '2020-07-21 21:08:05', '2020-07-21 21:08:05', 0, 0, 55),
('DT_043', 'HD_009', 'Có quá nhiều vấn đề gây áp lực như kinh tế, công việc, nhà cửa', '2020-07-21 21:08:05', '2020-07-21 21:08:05', 0, 0, 56),
('DT_044', 'HD_010', 'Tài chính', '2020-07-21 21:09:06', '2020-07-21 21:09:06', 0, 0, 57),
('DT_045', 'HD_010', 'Tình bạn', '2020-07-21 21:09:06', '2020-07-21 21:09:06', 0, 0, 58),
('DT_046', 'HD_010', 'Tình yêu', '2020-07-21 21:09:06', '2020-07-21 21:09:06', 0, 0, 59),
('DT_047', 'HD_010', 'Gia đình', '2020-07-21 21:09:06', '2020-07-21 21:09:06', 0, 0, 60),
('DT_048', 'HD_011', 'Nên cấm vì ảnh hưởng tới sự ổn định của xã hội', '2020-07-21 21:10:14', '2020-07-21 21:10:14', 0, 0, 61),
('DT_049', 'HD_011', 'Không nên cấm vì có rất nhiều khoản nợ cần phải có sự hỗ trợ của họ', '2020-07-21 21:10:14', '2020-07-21 21:10:14', 0, 0, 62),
('DT_050', 'HD_011', 'Ý kiến khác', '2020-07-21 21:10:14', '2020-07-21 21:10:14', 0, 0, 63),
('DT_051', 'HD_012', 'Sức khỏe', '2020-07-21 21:11:42', '2020-07-21 21:11:42', 0, 0, 64),
('DT_052', 'HD_012', 'Tiền tài', '2020-07-21 21:11:42', '2020-07-21 21:11:42', 0, 0, 65),
('DT_053', 'HD_012', 'Hạnh phúc', '2020-07-21 21:11:42', '2020-07-21 21:11:42', 0, 0, 66),
('DT_054', 'HD_012', 'khác', '2020-07-21 21:11:42', '2020-07-21 21:11:42', 0, 0, 67),
('DT_055', 'HD_013', 'Châu Âu', '2020-07-21 21:13:11', '2020-07-21 21:13:11', 0, 0, 68),
('DT_056', 'HD_013', 'Châu Á', '2020-07-21 21:13:11', '2020-07-21 21:13:11', 0, 0, 69),
('DT_057', 'HD_013', 'Châu Phi', '2020-07-21 21:13:11', '2020-07-21 21:13:11', 0, 0, 70),
('DT_058', 'HD_013', 'Châu Mỹ', '2020-07-21 21:13:11', '2020-07-21 21:13:11', 0, 0, 71),
('DT_059', 'HD_013', 'Ở nhà ngủ', '2020-07-21 21:13:11', '2020-07-21 21:13:11', 0, 0, 72),
('DT_060', 'HD_014', 'Dùng bình thường, không có vấn đề gì', '2020-07-21 21:14:19', '2020-07-21 21:14:19', 0, 0, 73),
('DT_061', 'HD_014', 'Không nên dùng vì rất có hại cho trẻ', '2020-07-21 21:14:19', '2020-07-21 21:14:19', 0, 0, 74),
('DT_062', 'HD_014', 'Chỉ cho sử dụng những khi cần thiết', '2020-07-21 21:14:19', '2020-07-21 21:14:19', 0, 0, 75),
('DT_063', 'HD_014', 'Ý kiến khác', '2020-07-21 21:14:19', '2020-07-21 21:14:19', 0, 0, 76),
('DT_064', 'HD_015', 'Lạnh lùng', '2020-07-21 21:15:55', '2020-07-21 21:15:55', 0, 0, 77),
('DT_065', 'HD_015', 'Trầm tính, ít nói', '2020-07-21 21:15:55', '2020-07-21 21:15:55', 0, 0, 78),
('DT_066', 'HD_015', 'Vui vẻ, hoà đồng', '2020-07-21 21:15:55', '2020-07-21 21:15:55', 0, 0, 79),
('DT_067', 'HD_015', 'Khác', '2020-07-21 21:15:55', '2020-07-21 21:15:55', 0, 0, 80),
('DT_068', 'HD_016', 'Ảnh hưởng đến công việc', '2020-07-21 21:17:34', '2020-07-21 21:17:34', 0, 0, 81),
('DT_069', 'HD_016', 'Ảnh hưởng đến kinh tế', '2020-07-21 21:17:34', '2020-07-21 21:17:34', 0, 0, 82),
('DT_070', 'HD_016', 'Ảnh hưởng đến sức khỏe', '2020-07-21 21:17:34', '2020-07-21 21:17:34', 0, 0, 83),
('DT_071', 'HD_016', 'Tất cả các ý trên', '2020-07-21 21:17:34', '2020-07-21 21:17:34', 0, 0, 84),
('DT_072', 'HD_017', 'Bill gates', '2020-07-21 21:19:55', '2020-07-21 21:19:55', 0, 0, 85),
('DT_073', 'HD_017', 'Mark Zuckerberg', '2020-07-21 21:19:55', '2020-07-21 21:19:55', 0, 0, 86),
('DT_074', 'HD_017', 'Jack ma', '2020-07-21 21:19:55', '2020-07-21 21:19:55', 0, 0, 87),
('DT_075', 'HD_017', 'Warren Buffett', '2020-07-21 21:19:55', '2020-07-21 21:19:55', 0, 0, 88),
('DT_076', 'HD_017', 'Phạm Nhật Vượng', '2020-07-21 21:19:55', '2020-07-21 21:19:55', 0, 0, 89),
('DT_077', 'HD_017', 'Khác', '2020-07-21 21:19:55', '2020-07-21 21:19:55', 0, 0, 90);

-- --------------------------------------------------------

--
-- Table structure for table `t_surveyhdr`
--

CREATE TABLE `t_surveyhdr` (
  `id` varchar(30) NOT NULL COMMENT 'Id',
  `id_multi` varchar(30) NOT NULL,
  `id_category` varchar(30) NOT NULL COMMENT 'mã loại khảo sát',
  `content` varchar(500) NOT NULL COMMENT 'nội dung khảo sát',
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo',
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ngày update',
  `update_count` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'số lần update',
  `del_flg` smallint(1) NOT NULL DEFAULT 0 COMMENT 'cờ xóa',
  `STT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_surveyhdr`
--

INSERT INTO `t_surveyhdr` (`id`, `id_multi`, `id_category`, `content`, `create_datetime`, `update_datetime`, `update_count`, `del_flg`, `STT`) VALUES
('134/1596692694385', 'HD_005', 'CT_001', 'Tại sao bạn thích loại bia đó?', '2020-08-06 12:45:29', '2020-08-06 12:45:29', 0, 0, 25),
('210/1596613646582', '210/1596613646582', 'CT_002', 'c1', '2020-08-05 14:48:30', '2020-08-06 09:10:05', 0, 0, 1),
('29/1596613686915', '210/1596613646582', 'CT_002', 'c3', '2020-08-05 14:48:31', '2020-08-06 09:10:05', 0, 0, 2),
('392/1596679485609', '210/1596613646582', 'CT_002', 'c4', '2020-08-06 09:05:05', '2020-08-06 11:39:27', 0, 1, 23),
('415/1596252211710', '415/1596252211710', 'CT_001', 'bạn sinh năm bao nhiêu', '2020-08-01 10:24:18', '2020-08-04 15:11:51', 0, 0, 3),
('627/1596362573112', '627/1596362573112', 'CT_001', 'bạn là ai', '2020-08-02 17:02:59', '2020-08-04 15:11:51', 0, 1, 4),
('78/1596362488146', '78/1596362488146', 'CT_001', 'bạn là ai', '2020-08-02 17:01:39', '2020-08-04 15:11:51', 0, 1, 5),
('913/1596684884947', '913/1596684884947', 'CT_001', 'gfdg', '2020-08-06 10:35:07', '2020-08-06 10:35:11', 0, 1, 24),
('HD_001', 'HD_001', 'CT_001', 'Theo bạn đâu là nguyên nhân dẫn đến sự trẻ hóa trong việc sử dụng chất kích thích', '2020-07-21 20:43:54', '2020-08-04 15:11:51', 0, 0, 6),
('HD_002', 'HD_002', 'CT_001', 'Ước mơ bạn chưa thực hiện được là gì?', '2020-07-21 20:49:06', '2020-08-04 15:11:51', 0, 0, 7),
('HD_003', 'HD_003', 'CT_001', 'Bạn nghĩ thế nào về sự thay đổi cửa các hình thức online - trực tuyến vào cuốc sống toàn cầu sau dịch Covid 19 toàn cầu vừa qua ?', '2020-07-21 20:51:36', '2020-08-04 15:11:51', 0, 0, 8),
('HD_004', 'HD_004', 'CT_004', 'Bạn có thường xuyên cập nhật trạng thái và đăng ảnh trên facebook không?', '2020-07-21 20:53:59', '2020-08-04 15:11:51', 0, 0, 9),
('HD_005', 'HD_005', 'CT_001', 'Bạn thích uống loại bia nào nhất?', '2020-07-21 20:57:03', '2020-08-04 15:11:51', 0, 0, 10),
('HD_006', 'HD_006', 'CT_002', 'Nếu trúng số giải đặc biệt bạn sẽ làm gì trước nhất?', '2020-07-21 21:00:32', '2020-08-04 15:11:51', 0, 0, 11),
('HD_007', 'HD_007', 'CT_002', 'Theo bạn tại sao giới trẻ hiện nay không thể xác định ước mơ của mình là gì', '2020-07-21 21:03:05', '2020-08-04 15:11:51', 0, 0, 12),
('HD_008', 'HD_008', 'CT_002', 'Phương pháp dạy con theo kiểu Nhật giúp Mẹ Việt những gì ?', '2020-07-21 21:05:56', '2020-08-04 15:11:51', 0, 0, 13),
('HD_009', 'HD_009', 'CT_002', 'Theo bạn tại sao giới trẻ lại có xu hướng chọn cuộc sống độc thân?', '2020-07-21 21:07:24', '2020-08-04 15:11:51', 0, 0, 14),
('HD_010', 'HD_010', 'CT_002', 'Bạn đang gặp vấn đề về lĩnh vực gì?', '2020-07-21 21:08:33', '2020-08-04 15:11:51', 0, 0, 15),
('HD_011', 'HD_011', 'CT_003', 'Bạn nghĩ gì về việc cấm các công ty đòi nợ thuê hoạt động?', '2020-07-21 21:09:43', '2020-08-04 15:11:51', 0, 0, 16),
('HD_012', 'HD_012', 'CT_003', 'Trong tương lai, bạn mong muốn điều gì ?', '2020-07-21 21:10:51', '2020-08-04 15:11:51', 0, 0, 17),
('HD_013', 'HD_013', 'CT_003', 'Bạn thích đi du lịch ở đâu ?', '2020-07-21 21:12:29', '2020-08-04 15:11:51', 0, 0, 18),
('HD_014', 'HD_014', 'CT_003', 'Bạn thấy thế nào về việc cho trẻ em dùng điện thoại thông minh ?', '2020-07-21 21:13:49', '2020-08-04 15:11:51', 0, 0, 19),
('HD_015', 'HD_015', 'CT_003', 'Ban cho rằng bản thân mình thuộc kiểu người nào ?', '2020-07-21 21:15:17', '2020-08-04 15:11:51', 0, 0, 20),
('HD_016', 'HD_016', 'CT_004', 'Dịch covid -19 đã ảnh hưởng như thế nào đến bạn ?', '2020-07-21 21:17:02', '2020-08-04 15:11:51', 0, 0, 21),
('HD_017', 'HD_017', 'CT_004', 'Bạn lấy cảm hứng làm giàu từ người nào?', '2020-07-21 21:19:08', '2020-08-04 15:11:51', 0, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` varchar(50) NOT NULL,
  `lastvisit` int(14) NOT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `lastvisit`, `user`) VALUES
('127.0.0.11596679460', 1596710668, 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_account`
--
ALTER TABLE `t_account`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `t_answer`
--
ALTER TABLE `t_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surveydtl`
--
ALTER TABLE `t_surveydtl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `STT` (`STT`);

--
-- Indexes for table `t_surveyhdr`
--
ALTER TABLE `t_surveyhdr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `STT` (`STT`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_surveydtl`
--
ALTER TABLE `t_surveydtl`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `t_surveyhdr`
--
ALTER TABLE `t_surveyhdr`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
