-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 12:22 PM
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
-- Database: `qlthietbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietmuontra`
--

CREATE TABLE `chitietmuontra` (
  `MaMuonTra` int(11) NOT NULL,
  `MaThietBi` int(11) NOT NULL,
  `DaTra` bit(1) NOT NULL,
  `NgayTra` date NOT NULL,
  `Del_Flg` bit(1) NOT NULL,
  `GhiChu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHang` int(11) NOT NULL,
  `TenHang` text NOT NULL,
  `Email` text DEFAULT NULL,
  `SDT` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHang`, `TenHang`, `Email`, `SDT`) VALUES
(1, 'SamSung', NULL, NULL),
(2, 'Balo Túi Nữ Thời Trang Thái Hà', NULL, NULL),
(3, 'CÔNG TY TNHH MTV THIÊN KỲ TÂM', NULL, NULL),
(4, 'Vi Tính Nhất Thiên - Công Ty TNHH Kỹ Thuật Tin Học Nhất Thiên', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `muontra`
--

CREATE TABLE `muontra` (
  `MaMuonTra` int(11) NOT NULL,
  `IDTaiKhoan` int(11) NOT NULL,
  `NgayMuon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDTaiKhoan` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `DiaChi` text DEFAULT NULL,
  `Avatar` text DEFAULT NULL,
  `Del_Flg` bit(1) NOT NULL DEFAULT b'0',
  `Admin_Flg` bit(1) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`IDTaiKhoan`, `UserName`, `Password`, `Email`, `DiaChi`, `Avatar`, `Del_Flg`, `Admin_Flg`, `GhiChu`) VALUES
(1, 'NhanVP', '1', 'shadowin1811@gmail.com', 'Phú thượng', NULL, b'0', NULL, '1212');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `MaTheLoai` int(11) NOT NULL,
  `TenTheLoai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`MaTheLoai`, `TenTheLoai`) VALUES
(1, 'Thiết bị văn phòng'),
(2, 'Thiết bị bảo hộ cá nhân'),
(3, 'Thiết bị leo núi'),
(5, 'Thiết bị điện tử');

-- --------------------------------------------------------

--
-- Table structure for table `thietbi`
--

CREATE TABLE `thietbi` (
  `MaThietBi` int(11) NOT NULL,
  `TenThietBi` text NOT NULL,
  `MaTheLoai` int(11) NOT NULL,
  `HangSanXuat` int(11) DEFAULT NULL,
  `Del_Flg` bit(1) NOT NULL,
  `Img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thietbi`
--

INSERT INTO `thietbi` (`MaThietBi`, `TenThietBi`, `MaTheLoai`, `HangSanXuat`, `Del_Flg`, `Img`) VALUES
(1, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL),
(2, 'Balo Leo núi', 3, 2, b'0', NULL),
(3, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(4, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(5, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(6, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(7, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(8, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(9, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL),
(10, 'Máy Tính Desknote Dell OptiPlex 9010', 1, 4, b'0', NULL),
(11, 'Balo Leo núi', 3, 2, b'0', NULL),
(12, 'Bộ đồ bảo hộ lao động', 2, 3, b'0', NULL),
(13, 'Máy Tính Desknote DELL OptiPlex 9010', 1, 4, b'0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietmuontra`
--
ALTER TABLE `chitietmuontra`
  ADD KEY `MaMuonTra` (`MaMuonTra`),
  ADD KEY `MaThietBi` (`MaThietBi`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHang`);

--
-- Indexes for table `muontra`
--
ALTER TABLE `muontra`
  ADD PRIMARY KEY (`MaMuonTra`),
  ADD KEY `IDTaiKhoan` (`IDTaiKhoan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDTaiKhoan`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaTheLoai`);

--
-- Indexes for table `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`MaThietBi`),
  ADD KEY `MaTheLoai` (`MaTheLoai`),
  ADD KEY `HangSanXuat` (`HangSanXuat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `muontra`
--
ALTER TABLE `muontra`
  MODIFY `MaMuonTra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `IDTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `MaTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `MaThietBi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietmuontra`
--
ALTER TABLE `chitietmuontra`
  ADD CONSTRAINT `chitietmuontra_ibfk_1` FOREIGN KEY (`MaMuonTra`) REFERENCES `muontra` (`MaMuonTra`),
  ADD CONSTRAINT `chitietmuontra_ibfk_2` FOREIGN KEY (`MaThietBi`) REFERENCES `thietbi` (`MaThietBi`);

--
-- Constraints for table `muontra`
--
ALTER TABLE `muontra`
  ADD CONSTRAINT `muontra_ibfk_1` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`IDTaiKhoan`);

--
-- Constraints for table `thietbi`
--
ALTER TABLE `thietbi`
  ADD CONSTRAINT `thietbi_ibfk_1` FOREIGN KEY (`MaTheLoai`) REFERENCES `theloai` (`MaTheLoai`),
  ADD CONSTRAINT `thietbi_ibfk_2` FOREIGN KEY (`HangSanXuat`) REFERENCES `hangsanxuat` (`MaHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
