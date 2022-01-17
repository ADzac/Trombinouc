-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2021 at 08:16 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.28-2+0~20210604.85+debian10~1.gbp219f11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bm016140`
--

-- --------------------------------------------------------

--
-- Table structure for table `STATUS`
--

CREATE TABLE `STATUS` (
  `postid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `post` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `STATUS`
--

INSERT INTO `STATUS` (`postid`, `uid`, `post`, `date`) VALUES
(81, 19, 'yuhu &#128515;', '12/06/21\r\n06:14:51'),
(83, 25, ':)\r\n', '12/06/21\r\n07:15:14'),
(87, 25, 'J\'ai faim &#128525;', '12/06/21\r\n07:30:18'),
(88, 25, 'J\'ai sommeil', '12/06/21\r\n07:37:05'),
(92, 30, 'Anyeong-hasaeyo', '13/06/21\r\n03:17:07'),
(93, 31, 'Halo tlm', '13/06/21\r\n07:28:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `STATUS`
--
ALTER TABLE `STATUS`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `STATUS`
--
ALTER TABLE `STATUS`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `STATUS`
--
ALTER TABLE `STATUS`
  ADD CONSTRAINT `STATUS_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `SINSCRIRE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
