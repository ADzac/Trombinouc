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
-- Table structure for table `SINSCRIRE`
--

CREATE TABLE `SINSCRIRE` (
  `id` int(254) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthdate` date NOT NULL,
  `Password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `SINSCRIRE`
--

INSERT INTO `SINSCRIRE` (`id`, `Name`, `Username`, `Birthdate`, `Password`, `Email`, `img`) VALUES
(9, 'adam', 'adam', '2021-05-14', 'tty', 'adam31azmi@gmail.com', ''),
(10, 'Adam Bin Azmi', 'adamazm', '2001-08-31', 'ola', 'adam31garena@gmail.com', ''),
(19, 'TT', 'tty', '3243-02-23', 'ttyttytty', 'fsfsfsfsf@fsd', ''),
(25, 'Daniel Z', 'Daniel ', '2001-11-18', 'ula', 'dannyzack118@gmail.com', 'touka.png'),
(26, 'Izzat', 'Pokjett', '2021-06-01', 'llllllll', 'fsfsfsfsf@fsd', ''),
(30, 'Lee Ji Eun', 'IU', '1990-07-12', '12345678', 'lilac@gmail.com', ''),
(31, 'try', 'try', '2021-06-30', '11111111', '11111@setsf', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SINSCRIRE`
--
ALTER TABLE `SINSCRIRE`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SINSCRIRE`
--
ALTER TABLE `SINSCRIRE`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
