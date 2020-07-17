-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 12:05 PM
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
-- Database: `dangky`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE `dangky` (
  `FullName` text CHARACTER SET utf8mb4 NOT NULL,
  `UserName` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Password` text CHARACTER SET utf8mb4 NOT NULL,
  `RePassword` text CHARACTER SET utf8mb4 NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `DOB` date NOT NULL,
  `Address` text CHARACTER SET utf8mb4 NOT NULL,
  `Avatar` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `Favourite` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`FullName`, `UserName`, `Password`, `RePassword`, `Gender`, `DOB`, `Address`, `Avatar`, `Favourite`) VALUES
('Võ Phụng Nhân', 'NhanVP', '123456', '123456', 1, '0000-00-00', 'Phú Thượng', 'download.jpg', ''),
('Võ Phụng Nhân1', 'NhanVP', '123456', '123456', 1, '0000-00-00', 'a', 'download.jpg', 'Xem phim'),
('SinhNT', 'NhanVP', '123456', '123456', 1, '0000-00-00', 's', 'download.jpg', ''),
('MinhNN1', 'NhanVP', '123456', '123456', 1, '0000-00-00', 'â', 'download.jpg', ''),
('Phụng Nhân', 'NhanVP', '123456', '123456', 1, '0000-00-00', 'sd', '', 'âsas'),
('ádasdas', 'NhanVP', '123456', '123456', 1, '0000-00-00', 'sss', 'download.jpg', ''),
('Nhân 23', 'NhanVP', '123456', '123456', 1, '0000-00-00', 'sứ', 'download.jpg', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
