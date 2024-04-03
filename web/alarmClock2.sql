-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2023 at 09:28 PM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alarmClock`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarm`
--

CREATE TABLE `alarm` (
  `id` int(9) NOT NULL,
  `topic` varchar(99) NOT NULL,
  `time` time NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alarm`
--

INSERT INTO `alarm` (`id`, `topic`, `time`, `day`, `status`) VALUES
(205, 'work meetg', '22:42:00', ',,,,,Sat,', 1),
(206, 'wake up', '22:44:00', ',,,,,Sat,', 1),
(208, 'pick up food', '01:13:00', ',Tue,,,,,', 1),
(209, ' food', '01:15:00', ',Tue,,,,,', 1),
(210, 'TING1', '01:39:00', ',Tue,,,,,', 1),
(211, 'TING2', '01:40:00', ',Tue,,,,,', 1),
(212, 'work', '11:19:00', ',Tue,,,,Sat,', 1),
(213, 'selena gomaz', '11:20:00', ',Tue,,,,,', 1),
(214, 'bts', '11:21:00', ',Tue,,,,,', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alarm`
--
ALTER TABLE `alarm`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

