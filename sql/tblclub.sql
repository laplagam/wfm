-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 08:20 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblclub`
--

INSERT INTO `tblclub` (`id`, `name`, `skill`, `countryid`, `leaguelevel`, `leagueid`) VALUES
(1, 'IK Start', 380, 1, 1, 1),
(2, 'Bodø Glimt ', 400, 1, 1, 1),
(3, 'Sogndal', 300, 1, 1, 1),
(4, 'Tromsø', 370, 1, 1, 1),
(5, 'Lillestrøm', 370, 1, 1, 1),
(6, 'Kristiansund BK', 370, 1, 1, 1),
(7, 'Sandefjord', 390, 1, 1, 1),
(8, 'Vålerenga', 390, 1, 1, 1),
(9, 'Stabæk', 410, 1, 1, 1),
(10, 'Odd', 420, 1, 1, 1),
(11, 'FK Haugesund', 410, 1, 1, 1),
(12, 'Brann', 490, 1, 1, 1),
(13, 'Strømsgodset', 500, 1, 1, 1),
(14, 'Sarpsborg 08', 500, 1, 1, 1),
(15, 'Molde', 540, 1, 1, 1),
(16, 'Rosenborg', 620, 1, 1, 1);

INSERT INTO `tblclub` ( `name`, `skill`, `countryid`, `leaguelevel`, `leagueid`) VALUES
('Manchester City', 780, 2, 1, 2),
('Chelsea ', 760, 2, 1, 2),
('Manchester United', 740, 2, 1, 2),
('Tottenham', 720, 2, 1, 2),
('Liverpool', 680, 2, 1, 2),
('Arsenal', 680, 2, 1, 2),
('Burnley', 640, 2, 1, 2),
('Brighton', 600, 2, 1, 2),
('Watford', 640, 2, 1, 2),
('Huddersfield', 600, 2, 1, 2),
('Newcastle United', 610, 2, 1, 2),
('Leicester', 615, 2, 1, 2),
('Southampton', 660, 2, 1, 2),
('Stoke', 640, 2, 1, 2),
('Everton', 650, 2, 1, 2),
('West Bromwich', 610, 2, 1, 2),
('Bournemouth', 615, 2, 1, 2),
('West Ham', 640, 2, 1, 2),
('Swansea', 600, 2, 1, 2),
('Crystal Palace', 595, 2, 1, 2);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
