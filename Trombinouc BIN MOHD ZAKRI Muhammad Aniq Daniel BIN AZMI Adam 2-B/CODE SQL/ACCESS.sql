-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2021 at 08:15 PM
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
-- Table structure for table `ACCESS`
--

CREATE TABLE `ACCESS` (
  `accessId` int(11) NOT NULL,
  `accessFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ACCESS`
--

INSERT INTO `ACCESS` (`accessId`, `accessFriend`) VALUES
(97, 72),
(98, 86),
(100, 88),
(101, 89),
(102, 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCESS`
--
ALTER TABLE `ACCESS`
  ADD PRIMARY KEY (`accessId`),
  ADD KEY `accessFriend` (`accessFriend`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCESS`
--
ALTER TABLE `ACCESS`
  MODIFY `accessId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ACCESS`
--
ALTER TABLE `ACCESS`
  ADD CONSTRAINT `access_friend` FOREIGN KEY (`accessFriend`) REFERENCES `FRIENDS` (`friendId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
