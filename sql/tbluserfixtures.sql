-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 05:20 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwfm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbluserfixtures`
--

DROP TABLE IF EXISTS `tbluserfixtures`;
CREATE TABLE IF NOT EXISTS `tbluserfixtures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagueid` int(11) NOT NULL,
  `gameweek` int(11) NOT NULL,
  `hometeamid` int(11) NOT NULL,
  `hometeamname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `awayteamid` int(11) NOT NULL,
  `awayteamname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matchlogjson` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hometeamgoals` int(2) NOT NULL DEFAULT '0',
  `awayteamgoals` int(2) NOT NULL DEFAULT '0',
  `isplayed` tinyint(1) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
