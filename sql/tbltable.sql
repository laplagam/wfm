-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 10:26 PM
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
-- Table structure for table `tbltable`
--

DROP TABLE IF EXISTS `tbltable`;
CREATE TABLE IF NOT EXISTS `tbltable` (
  `leagueid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `teamname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goalsfor` int(11) NOT NULL DEFAULT '0',
  `goalsagainst` int(11) NOT NULL DEFAULT '0',
  `victory` int(11) NOT NULL DEFAULT '0',
  `draw` int(11) NOT NULL DEFAULT '0',
  `loss` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbltable`
--

INSERT INTO `tbltable` (`leagueid`, `teamid`, `teamname`, `goalsfor`, `goalsagainst`, `victory`, `draw`, `loss`, `points`) VALUES
(1, 1, 'IK Start', 0, 0, 0, 0, 0, 0),
(1, 2, 'Bodø Glimt', 0, 0, 0, 0, 0, 0),
(1, 3, 'Sogndal', 0, 0, 0, 0, 0, 0),
(1, 4, 'Tromsø', 0, 0, 0, 0, 0, 0),
(1, 5, 'Lillestrøm', 0, 0, 0, 0, 0, 0),
(1, 6, 'Kristiansund BK', 0, 0, 0, 0, 0, 0),
(1, 7, 'Sandefjord', 0, 0, 0, 0, 0, 0),
(1, 8, 'Vålerenga', 0, 0, 0, 0, 0, 0),
(1, 9, 'Stabæk', 0, 0, 0, 0, 0, 0),
(1, 10, 'Odd', 0, 0, 0, 0, 0, 0),
(1, 11, 'FK Haugesund', 0, 0, 0, 0, 0, 0),
(1, 12, 'Brann', 0, 0, 0, 0, 0, 0),
(1, 13, 'Strømsgodset', 0, 0, 0, 0, 0, 0),
(1, 14, 'Sarpsborg 08', 0, 0, 0, 0, 0, 0),
(1, 15, 'Molde', 0, 0, 0, 0, 0, 0),
(1, 16, 'Rosenborg', 0, 0, 0, 0, 0, 0),
(2, 53, 'Manchester City', 0, 0, 0, 0, 0, 0),
(2, 54, 'Chelsea ', 0, 0, 0, 0, 0, 0),
(2, 55, 'Manchester United', 0, 0, 0, 0, 0, 0),
(2, 56, 'Tottenham', 0, 0, 0, 0, 0, 0),
(2, 57, 'Liverpool', 0, 0, 0, 0, 0, 0),
(2, 58, 'Arsenal', 0, 0, 0, 0, 0, 0),
(2, 59, 'Burnley', 0, 0, 0, 0, 0, 0),
(2, 60, 'Brighton', 0, 0, 0, 0, 0, 0),
(2, 61, 'Watford', 0, 0, 0, 0, 0, 0),
(2, 62, 'Huddersfield', 0, 0, 0, 0, 0, 0),
(2, 63, 'Newcastle United', 0, 0, 0, 0, 0, 0),
(2, 64, 'Leicester', 0, 0, 0, 0, 0, 0),
(2, 65, 'Southampton', 0, 0, 0, 0, 0, 0),
(2, 66, 'Stoke', 0, 0, 0, 0, 0, 0),
(2, 67, 'Everton', 0, 0, 0, 0, 0, 0),
(2, 68, 'West Bromwich', 0, 0, 0, 0, 0, 0),
(2, 69, 'Bournemouth', 0, 0, 0, 0, 0, 0),
(2, 70, 'West Ham', 0, 0, 0, 0, 0, 0),
(2, 71, 'Swansea', 0, 0, 0, 0, 0, 0),
(2, 72, 'Crystal Palace', 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
