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
-- Table structure for table `FRIENDS`
--

CREATE TABLE `FRIENDS` (
  `friendId` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `friendUid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `FRIENDS`
--

INSERT INTO `FRIENDS` (`friendId`, `Uid`, `friendUid`) VALUES
(72, 25, 10),
(86, 25, 19),
(88, 25, 26),
(89, 25, 30),
(90, 10, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FRIENDS`
--
ALTER TABLE `FRIENDS`
  ADD PRIMARY KEY (`friendId`),
  ADD KEY `friendUid` (`friendUid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `FRIENDS`
--
ALTER TABLE `FRIENDS`
  MODIFY `friendId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FRIENDS`
--
ALTER TABLE `FRIENDS`
  ADD CONSTRAINT `FRIENDS_ibfk_1` FOREIGN KEY (`friendUid`) REFERENCES `SINSCRIRE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
