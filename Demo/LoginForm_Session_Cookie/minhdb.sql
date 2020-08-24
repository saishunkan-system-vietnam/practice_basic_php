-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 12:17 PM
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
-- Database: `minhdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(5) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `IDCard` int(10) NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `District` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CityTown` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ImagePath` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Hobbies` text COLLATE utf8_unicode_ci NOT NULL,
  `DelFlag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`ID`, `UserName`, `Password`, `DOB`, `IDCard`, `Gender`, `Country`, `District`, `CityTown`, `Street`, `ImagePath`, `Hobbies`, `DelFlag`) VALUES
(1, 'minh', '12345678', '2020-03-04', 2432432, 'Male', 'Viet Nam', 'Phu Vang', 'Hue', 'NTP', '', 'minh', 0),
(2, 'abc', '1111', '1111', 432332, 'Female', 'Viet Nam', 'abc', 'cde', 'egh', '', 'aaaaaaaa', 0),
(25, 'MinhNN', '123', '2020-07-07', 242332, 'Male', 'VN', 'PV', 'HUE', 'HUE', '', '        abc        ', 0),
(26, 'dfasfd', '1234', '2020-07-16', 1234432, 'Male', 'sfafa', 'sfa', 'fsafas', 'sfasf', '', '            34234324    ', 0),
(27, '2221', '12', '2020-07-16', 23432321, 'Male', 'Vietnam', 'sfa', 'HUE', 'HUE', 'sda.PNG', '                321321', 0),
(28, 'a', 'aa', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(29, 'a', 'aa', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(30, 'b', 'bb', '2020-03-04', 543, 'Male', 'Viet Nam', 'gfdg', 'gsfd', 'sedfd', '', 'dfasfdsfasdfsf', 0),
(31, 'c', 'cc', '2020-03-04', 343, 'Female', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(32, 'd', 'dd', '2020-03-04', 54534, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(33, 'e', 'ee', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(34, 'f', 'ff', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(35, 'g', 'g', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(36, 'h', 'hh', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(37, 'i', 'ii', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0),
(38, 'k', 'kk', '2020-03-04', 23424, 'Male', 'Viet Nam', 'sdasd', 'fgđf', 'sdfd', '', 'dfasfdsfasdfsf', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
