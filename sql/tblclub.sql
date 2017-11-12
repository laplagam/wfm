-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 03:31 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

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
-- Table structure for table `tblclub`
--

DROP TABLE IF EXISTS `tblclub`;
CREATE TABLE IF NOT EXISTS `tblclub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skill` int(9) NOT NULL,
  `countryid` int(3) NOT NULL,
  `leaguelevel` int(2) NOT NULL,
  `leagueid` int(11) NOT NULL DEFAULT '0',
  `isplayer` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblclub`
--

INSERT INTO `tblclub` (`id`, `name`, `skill`, `countryid`, `leaguelevel`, `leagueid`, `isplayer`) VALUES
(1, 'IK Start', 380, 1, 1, 1, 1),
(2, 'Bodø Glimt ', 400, 1, 1, 1, 0),
(3, 'Sogndal', 300, 1, 1, 1, 0),
(4, 'Tromsø', 370, 1, 1, 1, 0),
(5, 'Lillestrøm', 370, 1, 1, 1, 0),
(6, 'Kristiansund BK', 370, 1, 1, 1, 0),
(7, 'Sandefjord', 390, 1, 1, 1, 0),
(8, 'Vålerenga', 390, 1, 1, 1, 0),
(9, 'Stabæk', 410, 1, 1, 1, 0),
(10, 'Odd', 420, 1, 1, 1, 0),
(11, 'FK Haugesund', 410, 1, 1, 1, 0),
(12, 'Brann', 490, 1, 1, 1, 0),
(13, 'Strømsgodset', 500, 1, 1, 1, 0),
(14, 'Sarpsborg 08', 500, 1, 1, 1, 0),
(15, 'Molde', 540, 1, 1, 1, 0),
(16, 'Rosenborg', 620, 1, 1, 1, 0),
(53, 'Manchester City', 780, 2, 1, 2, 0),
(54, 'Chelsea ', 760, 2, 1, 2, 0),
(55, 'Manchester United', 740, 2, 1, 2, 0),
(56, 'Tottenham', 720, 2, 1, 2, 0),
(57, 'Liverpool', 680, 2, 1, 2, 0),
(58, 'Arsenal', 680, 2, 1, 2, 0),
(59, 'Burnley', 640, 2, 1, 2, 0),
(60, 'Brighton', 600, 2, 1, 2, 0),
(61, 'Watford', 640, 2, 1, 2, 0),
(62, 'Huddersfield', 600, 2, 1, 2, 0),
(63, 'Newcastle United', 610, 2, 1, 2, 0),
(64, 'Leicester', 615, 2, 1, 2, 0),
(65, 'Southampton', 660, 2, 1, 2, 0),
(66, 'Stoke', 640, 2, 1, 2, 0),
(67, 'Everton', 650, 2, 1, 2, 0),
(68, 'West Bromwich', 610, 2, 1, 2, 0),
(69, 'Bournemouth', 615, 2, 1, 2, 0),
(70, 'West Ham', 640, 2, 1, 2, 0),
(71, 'Swansea', 600, 2, 1, 2, 0),
(72, 'Crystal Palace', 595, 2, 1, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
