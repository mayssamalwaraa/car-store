-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 09:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car-show`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `user_name`, `password`) VALUES
(35, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(37, 'ali', 'ali', '86318e52f5ed4801abe1d13d509443de'),
(38, 'bairak', 'bairak', '2542b2c33ccd60f05a51e7002c5a7080');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `available`) VALUES
(11, 'Tyota', 'car-category309.png', 'Yes'),
(12, 'KIA', 'car-category911.jpg', 'Yes'),
(14, 'Hyundai', 'car-category7.png', 'Yes'),
(15, 'lexus', 'car-category448.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `full_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `id_user` int(30) NOT NULL,
  `id_car` int(30) NOT NULL,
  `cash` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`full_name`, `email`, `address`, `phone`, `id_user`, `id_car`, `cash`) VALUES
('mr', '', '', 'rgkln', 10, 14, 1),
('bairak', '', '', 'rgkln', 10, 10, 0),
('bairak', '', '', 'rgkln', 10, 10, 0),
('bairak', '', '', '546', 10, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detalis`
--

CREATE TABLE `detalis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_c` int(10) UNSIGNED NOT NULL,
  `model` varchar(100) NOT NULL,
  `type_c` varchar(100) NOT NULL,
  `year_c` int(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `type_oil` varchar(100) NOT NULL,
  `type_power` varchar(100) NOT NULL,
  `mohark` varchar(100) NOT NULL,
  `maraya` varchar(100) NOT NULL,
  `led` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalis`
--

INSERT INTO `detalis` (`id`, `id_c`, `model`, `type_c`, `year_c`, `color`, `type_oil`, `type_power`, `mohark`, `maraya`, `led`, `image1`, `image2`, `image3`) VALUES
(6, 10, 'toyota', 'afalon', 2021, 'white', 'benzen', '2x4', '12cc', 'yes', 'yes', 'dcar774.png', 'dcar796.png', 'dcar849.png');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(30) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `operation` varchar(100) NOT NULL,
  `in` varchar(30) NOT NULL,
  `in_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `id_o` int(10) UNSIGNED NOT NULL,
  `id_u` int(10) UNSIGNED NOT NULL,
  `id_c` int(10) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_phone` int(100) NOT NULL,
  `pay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id_o`, `id_u`, `id_c`, `order_date`, `status`, `c_name`, `c_email`, `c_address`, `c_phone`, `pay`) VALUES
(1, 0, 10, '2021-06-23', 'Cencel', '', '', '', 0, '1'),
(7, 0, 0, '2021-06-23', 'Accept', 'mayssam', 'mayssamalwaraa295@gmail.com', '', 935735418, 'Yes'),
(12, 0, 0, '2021-06-30', 'in_ordered', 'bairak', 'bairak2345@outlook.sa', '', 0, 'Yes'),
(15, 0, 0, '2021-06-30', 'in_ordered', 'br', 'bairak2345@outlook.sa', '', 0, 'Yes'),
(16, 0, 0, '2021-07-04', 'in_ordered', 'bairak', 'bairak2345@outlook.sa', '', 0, 'Yes'),
(17, 11, 10, '2021-07-04', 'in_ordered', 'bairak', 'bairak2345@outlook.sa', '', 0, 'Yes'),
(18, 10, 10, '2021-07-05', 'in_ordered', 'mr', 'bairak2345@outlook.sa', '', 0, 'Yes'),
(19, 10, 10, '2021-07-05', 'in_ordered', 'bairak', 'bairak2345@outlook.sa', '', 546, 'Yes'),
(20, 10, 13, '2021-07-11', 'in_ordered', 'bairak', 'v@f', '', 546, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_car`
--

CREATE TABLE `tb_car` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_car`
--

INSERT INTO `tb_car` (`id`, `title`, `description`, `category_id`, `price`, `image_name`, `available`) VALUES
(10, 'Toyta afalon', '', 11, '2500.00', 'newcar390.png', 'Yes'),
(11, 'toyota parado', '', 11, '2500.00', 'newcar775.png', 'Yes'),
(12, 'toyota landcruse', '', 11, '2500.00', 'newcar583.jpg', 'Yes'),
(13, 'KIA panorama', '', 12, '2500.00', 'newcar173.png', 'Yes'),
(14, 'KIA sportage', '', 12, '2500.00', 'newcar167.png', 'Yes'),
(15, 'Lexus', '', 15, '2500.00', 'newcar508.png', 'Yes'),
(16, 'Hyondai tousan', '', 14, '2500.00', 'newcar305.png', 'Yes'),
(17, 'Hyundai sentafi', '', 14, '2500.00', 'newcar113.png', 'Yes'),
(18, 'Hyundai sonata', '', 14, '2500.00', 'newcar701.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id`, `email`, `full_name`, `user_name`, `password`) VALUES
(2, 'mayssamalwaraa295@gmail.com', 'mayssam alwaraa', 'mayssam_alwaraa', '41c456eb7a1c7ce49c0bc723d57d1956'),
(3, 'mayssamalwaraa295@gmail.com', 'manaf', 'alwaraa', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'mayssamalwaraa295@gmail.com', 'mayssam', 'alwaraa', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'mayssamalwaraa295@gmail.com', 'mayssam', 'mayssamm', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'v@f', 'bairak', 'bairak', '2542b2c33ccd60f05a51e7002c5a7080'),
(11, 'bairak2345@outlook.sa', 'bairak', 'bairak', '43a9e763adbd863d24ebf29bcef9e148');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalis`
--
ALTER TABLE `detalis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`id_o`);

--
-- Indexes for table `tb_car`
--
ALTER TABLE `tb_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detalis`
--
ALTER TABLE `detalis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `id_o` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_car`
--
ALTER TABLE `tb_car`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
