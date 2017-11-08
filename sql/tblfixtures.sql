-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 08:19 PM
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
-- Table structure for table `tblfixtures`
--

DROP TABLE IF EXISTS `tblfixtures`;
CREATE TABLE IF NOT EXISTS `tblfixtures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagueid` int(11) NOT NULL,
  `gameweek` int(11) NOT NULL,
  `hometeamid` int(11) NOT NULL,
  `hometeamname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `awayteamid` int(11) NOT NULL,
  `awayteamname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblfixtures`
--

INSERT INTO `tblfixtures` (`id`, `leagueid`, `gameweek`, `hometeamid`, `hometeamname`, `awayteamid`, `awayteamname`) VALUES
(55, 1, 1, 13, 'Strømsgodset', 7, 'Sandefjord'),
(56, 1, 1, 3, 'Sogndal', 10, 'Odd'),
(57, 1, 1, 11, 'FK Haugesund', 9, 'Stabæk'),
(58, 1, 1, 8, 'Vålerenga', 1, 'IK Start'),
(59, 1, 1, 5, 'Lillestrøm', 4, 'Tromsø'),
(60, 1, 1, 16, 'Rosenborg', 6, 'Kristiansund BK'),
(61, 1, 1, 15, 'Molde', 12, 'Brann'),
(62, 1, 1, 2, 'Bodø Glimt', 14, 'Sarpsborg 08'),
(63, 1, 2, 10, 'Odd', 13, 'Strømsgodset'),
(64, 1, 2, 9, 'Stabæk', 7, 'Sandefjord'),
(65, 1, 2, 1, 'IK Start', 3, 'Sogndal'),
(66, 1, 2, 4, 'Tromsø', 11, 'FK Haugesund'),
(67, 1, 2, 6, 'Kristiansund BK', 8, 'Vålerenga'),
(68, 1, 2, 12, 'Brann', 5, 'Lillestrøm'),
(69, 1, 2, 14, 'Sarpsborg 08', 16, 'Rosenborg'),
(70, 1, 2, 2, 'Bodø Glimt', 15, 'Molde'),
(71, 1, 3, 13, 'Strømsgodset', 9, 'Stabæk'),
(72, 1, 3, 10, 'Odd', 1, 'IK Start'),
(73, 1, 3, 7, 'Sandefjord', 4, 'Tromsø'),
(74, 1, 3, 3, 'Sogndal', 6, 'Kristiansund BK'),
(75, 1, 3, 11, 'FK Haugesund', 12, 'Brann'),
(76, 1, 3, 8, 'Vålerenga', 14, 'Sarpsborg 08'),
(77, 1, 3, 5, 'Lillestrøm', 2, 'Bodø Glimt'),
(78, 1, 3, 16, 'Rosenborg', 15, 'Molde'),
(79, 1, 4, 1, 'IK Start', 13, 'Strømsgodset'),
(80, 1, 4, 4, 'Tromsø', 9, 'Stabæk'),
(81, 1, 4, 6, 'Kristiansund BK', 10, 'Odd'),
(82, 1, 4, 12, 'Brann', 7, 'Sandefjord'),
(83, 1, 4, 14, 'Sarpsborg 08', 3, 'Sogndal'),
(84, 1, 4, 2, 'Bodø Glimt', 11, 'FK Haugesund'),
(85, 1, 4, 15, 'Molde', 8, 'Vålerenga'),
(86, 1, 4, 16, 'Rosenborg', 5, 'Lillestrøm'),
(87, 1, 5, 13, 'Strømsgodset', 4, 'Tromsø'),
(88, 1, 5, 1, 'IK Start', 6, 'Kristiansund BK'),
(89, 1, 5, 9, 'Stabæk', 12, 'Brann'),
(90, 1, 5, 10, 'Odd', 14, 'Sarpsborg 08'),
(91, 1, 5, 7, 'Sandefjord', 2, 'Bodø Glimt'),
(92, 1, 5, 3, 'Sogndal', 15, 'Molde'),
(93, 1, 5, 11, 'FK Haugesund', 16, 'Rosenborg'),
(94, 1, 5, 8, 'Vålerenga', 5, 'Lillestrøm'),
(95, 1, 6, 6, 'Kristiansund BK', 13, 'Strømsgodset'),
(96, 1, 6, 12, 'Brann', 4, 'Tromsø'),
(97, 1, 6, 14, 'Sarpsborg 08', 1, 'IK Start'),
(98, 1, 6, 2, 'Bodø Glimt', 9, 'Stabæk'),
(99, 1, 6, 15, 'Molde', 10, 'Odd'),
(100, 1, 6, 16, 'Rosenborg', 7, 'Sandefjord'),
(101, 1, 6, 5, 'Lillestrøm', 3, 'Sogndal'),
(102, 1, 6, 8, 'Vålerenga', 11, 'FK Haugesund'),
(103, 1, 7, 13, 'Strømsgodset', 12, 'Brann'),
(104, 1, 7, 6, 'Kristiansund BK', 14, 'Sarpsborg 08'),
(105, 1, 7, 4, 'Tromsø', 2, 'Bodø Glimt'),
(106, 1, 7, 1, 'IK Start', 15, 'Molde'),
(107, 1, 7, 9, 'Stabæk', 16, 'Rosenborg'),
(108, 1, 7, 10, 'Odd', 5, 'Lillestrøm'),
(109, 1, 7, 7, 'Sandefjord', 8, 'Vålerenga'),
(110, 1, 7, 3, 'Sogndal', 11, 'FK Haugesund'),
(111, 1, 8, 14, 'Sarpsborg 08', 13, 'Strømsgodset'),
(112, 1, 8, 2, 'Bodø Glimt', 12, 'Brann'),
(113, 1, 8, 15, 'Molde', 6, 'Kristiansund BK'),
(114, 1, 8, 16, 'Rosenborg', 4, 'Tromsø'),
(115, 1, 8, 5, 'Lillestrøm', 1, 'IK Start'),
(116, 1, 8, 8, 'Vålerenga', 9, 'Stabæk'),
(117, 1, 8, 11, 'FK Haugesund', 10, 'Odd'),
(118, 1, 8, 3, 'Sogndal', 7, 'Sandefjord'),
(119, 1, 9, 13, 'Strømsgodset', 2, 'Bodø Glimt'),
(120, 1, 9, 14, 'Sarpsborg 08', 15, 'Molde'),
(121, 1, 9, 12, 'Brann', 16, 'Rosenborg'),
(122, 1, 9, 6, 'Kristiansund BK', 5, 'Lillestrøm'),
(123, 1, 9, 4, 'Tromsø', 8, 'Vålerenga'),
(124, 1, 9, 1, 'IK Start', 11, 'FK Haugesund'),
(125, 1, 9, 9, 'Stabæk', 3, 'Sogndal'),
(126, 1, 9, 10, 'Odd', 7, 'Sandefjord'),
(127, 1, 10, 15, 'Molde', 13, 'Strømsgodset'),
(128, 1, 10, 16, 'Rosenborg', 2, 'Bodø Glimt'),
(129, 1, 10, 5, 'Lillestrøm', 14, 'Sarpsborg 08'),
(130, 1, 10, 8, 'Vålerenga', 12, 'Brann'),
(131, 1, 10, 11, 'FK Haugesund', 6, 'Kristiansund BK'),
(132, 1, 10, 3, 'Sogndal', 4, 'Tromsø'),
(133, 1, 10, 7, 'Sandefjord', 1, 'IK Start'),
(134, 1, 10, 10, 'Odd', 9, 'Stabæk'),
(135, 1, 11, 13, 'Strømsgodset', 16, 'Rosenborg'),
(136, 1, 11, 15, 'Molde', 5, 'Lillestrøm'),
(137, 1, 11, 2, 'Bodø Glimt', 8, 'Vålerenga'),
(138, 1, 11, 14, 'Sarpsborg 08', 11, 'FK Haugesund'),
(139, 1, 11, 12, 'Brann', 3, 'Sogndal'),
(140, 1, 11, 6, 'Kristiansund BK', 7, 'Sandefjord'),
(141, 1, 11, 4, 'Tromsø', 10, 'Odd'),
(142, 1, 11, 1, 'IK Start', 9, 'Stabæk'),
(143, 1, 12, 5, 'Lillestrøm', 13, 'Strømsgodset'),
(144, 1, 12, 8, 'Vålerenga', 16, 'Rosenborg'),
(145, 1, 12, 11, 'FK Haugesund', 15, 'Molde'),
(146, 1, 12, 3, 'Sogndal', 2, 'Bodø Glimt'),
(147, 1, 12, 7, 'Sandefjord', 14, 'Sarpsborg 08'),
(148, 1, 12, 10, 'Odd', 12, 'Brann'),
(149, 1, 12, 9, 'Stabæk', 6, 'Kristiansund BK'),
(150, 1, 12, 1, 'IK Start', 4, 'Tromsø'),
(151, 1, 13, 13, 'Strømsgodset', 8, 'Vålerenga'),
(152, 1, 13, 5, 'Lillestrøm', 11, 'FK Haugesund'),
(153, 1, 13, 16, 'Rosenborg', 3, 'Sogndal'),
(154, 1, 13, 15, 'Molde', 7, 'Sandefjord'),
(155, 1, 13, 2, 'Bodø Glimt', 10, 'Odd'),
(156, 1, 13, 14, 'Sarpsborg 08', 9, 'Stabæk'),
(157, 1, 13, 12, 'Brann', 1, 'IK Start'),
(158, 1, 13, 6, 'Kristiansund BK', 4, 'Tromsø'),
(159, 1, 14, 11, 'FK Haugesund', 13, 'Strømsgodset'),
(160, 1, 14, 3, 'Sogndal', 8, 'Vålerenga'),
(161, 1, 14, 7, 'Sandefjord', 5, 'Lillestrøm'),
(162, 1, 14, 10, 'Odd', 16, 'Rosenborg'),
(163, 1, 14, 9, 'Stabæk', 15, 'Molde'),
(164, 1, 14, 1, 'IK Start', 2, 'Bodø Glimt'),
(165, 1, 14, 4, 'Tromsø', 14, 'Sarpsborg 08'),
(166, 1, 14, 6, 'Kristiansund BK', 12, 'Brann'),
(167, 1, 15, 13, 'Strømsgodset', 3, 'Sogndal'),
(168, 1, 15, 11, 'FK Haugesund', 7, 'Sandefjord'),
(169, 1, 15, 8, 'Vålerenga', 10, 'Odd'),
(170, 1, 15, 5, 'Lillestrøm', 9, 'Stabæk'),
(171, 1, 15, 16, 'Rosenborg', 1, 'IK Start'),
(172, 1, 15, 15, 'Molde', 4, 'Tromsø'),
(173, 1, 15, 2, 'Bodø Glimt', 6, 'Kristiansund BK'),
(174, 1, 15, 14, 'Sarpsborg 08', 12, 'Brann'),
(175, 1, 16, 7, 'Sandefjord', 13, 'Strømsgodset'),
(176, 1, 16, 10, 'Odd', 3, 'Sogndal'),
(177, 1, 16, 9, 'Stabæk', 11, 'FK Haugesund'),
(178, 1, 16, 1, 'IK Start', 8, 'Vålerenga'),
(179, 1, 16, 4, 'Tromsø', 5, 'Lillestrøm'),
(180, 1, 16, 6, 'Kristiansund BK', 16, 'Rosenborg'),
(181, 1, 16, 12, 'Brann', 15, 'Molde'),
(182, 1, 16, 14, 'Sarpsborg 08', 2, 'Bodø Glimt'),
(183, 1, 17, 13, 'Strømsgodset', 10, 'Odd'),
(184, 1, 17, 7, 'Sandefjord', 9, 'Stabæk'),
(185, 1, 17, 3, 'Sogndal', 1, 'IK Start'),
(186, 1, 17, 11, 'FK Haugesund', 4, 'Tromsø'),
(187, 1, 17, 8, 'Vålerenga', 6, 'Kristiansund BK'),
(188, 1, 17, 5, 'Lillestrøm', 12, 'Brann'),
(189, 1, 17, 16, 'Rosenborg', 14, 'Sarpsborg 08'),
(190, 1, 17, 15, 'Molde', 2, 'Bodø Glimt'),
(191, 1, 18, 9, 'Stabæk', 13, 'Strømsgodset'),
(192, 1, 18, 1, 'IK Start', 10, 'Odd'),
(193, 1, 18, 4, 'Tromsø', 7, 'Sandefjord'),
(194, 1, 18, 6, 'Kristiansund BK', 3, 'Sogndal'),
(195, 1, 18, 12, 'Brann', 11, 'FK Haugesund'),
(196, 1, 18, 14, 'Sarpsborg 08', 8, 'Vålerenga'),
(197, 1, 18, 2, 'Bodø Glimt', 5, 'Lillestrøm'),
(198, 1, 18, 15, 'Molde', 16, 'Rosenborg'),
(199, 1, 19, 13, 'Strømsgodset', 1, 'IK Start'),
(200, 1, 19, 9, 'Stabæk', 4, 'Tromsø'),
(201, 1, 19, 10, 'Odd', 6, 'Kristiansund BK'),
(202, 1, 19, 7, 'Sandefjord', 12, 'Brann'),
(203, 1, 19, 3, 'Sogndal', 14, 'Sarpsborg 08'),
(204, 1, 19, 11, 'FK Haugesund', 2, 'Bodø Glimt'),
(205, 1, 19, 8, 'Vålerenga', 15, 'Molde'),
(206, 1, 19, 5, 'Lillestrøm', 16, 'Rosenborg'),
(207, 1, 20, 4, 'Tromsø', 13, 'Strømsgodset'),
(208, 1, 20, 6, 'Kristiansund BK', 1, 'IK Start'),
(209, 1, 20, 12, 'Brann', 9, 'Stabæk'),
(210, 1, 20, 14, 'Sarpsborg 08', 10, 'Odd'),
(211, 1, 20, 2, 'Bodø Glimt', 7, 'Sandefjord'),
(212, 1, 20, 15, 'Molde', 3, 'Sogndal'),
(213, 1, 20, 16, 'Rosenborg', 11, 'FK Haugesund'),
(214, 1, 20, 5, 'Lillestrøm', 8, 'Vålerenga'),
(215, 1, 21, 13, 'Strømsgodset', 6, 'Kristiansund BK'),
(216, 1, 21, 4, 'Tromsø', 12, 'Brann'),
(217, 1, 21, 1, 'IK Start', 14, 'Sarpsborg 08'),
(218, 1, 21, 9, 'Stabæk', 2, 'Bodø Glimt'),
(219, 1, 21, 10, 'Odd', 15, 'Molde'),
(220, 1, 21, 7, 'Sandefjord', 16, 'Rosenborg'),
(221, 1, 21, 3, 'Sogndal', 5, 'Lillestrøm'),
(222, 1, 21, 11, 'FK Haugesund', 8, 'Vålerenga'),
(223, 1, 22, 12, 'Brann', 13, 'Strømsgodset'),
(224, 1, 22, 14, 'Sarpsborg 08', 6, 'Kristiansund BK'),
(225, 1, 22, 2, 'Bodø Glimt', 4, 'Tromsø'),
(226, 1, 22, 15, 'Molde', 1, 'IK Start'),
(227, 1, 22, 16, 'Rosenborg', 9, 'Stabæk'),
(228, 1, 22, 5, 'Lillestrøm', 10, 'Odd'),
(229, 1, 22, 8, 'Vålerenga', 7, 'Sandefjord'),
(230, 1, 22, 11, 'FK Haugesund', 3, 'Sogndal'),
(231, 1, 23, 13, 'Strømsgodset', 14, 'Sarpsborg 08'),
(232, 1, 23, 12, 'Brann', 2, 'Bodø Glimt'),
(233, 1, 23, 6, 'Kristiansund BK', 15, 'Molde'),
(234, 1, 23, 4, 'Tromsø', 16, 'Rosenborg'),
(235, 1, 23, 1, 'IK Start', 5, 'Lillestrøm'),
(236, 1, 23, 9, 'Stabæk', 8, 'Vålerenga'),
(237, 1, 23, 10, 'Odd', 11, 'FK Haugesund'),
(238, 1, 23, 7, 'Sandefjord', 3, 'Sogndal'),
(239, 1, 24, 2, 'Bodø Glimt', 13, 'Strømsgodset'),
(240, 1, 24, 15, 'Molde', 14, 'Sarpsborg 08'),
(241, 1, 24, 16, 'Rosenborg', 12, 'Brann'),
(242, 1, 24, 5, 'Lillestrøm', 6, 'Kristiansund BK'),
(243, 1, 24, 8, 'Vålerenga', 4, 'Tromsø'),
(244, 1, 24, 11, 'FK Haugesund', 1, 'IK Start'),
(245, 1, 24, 3, 'Sogndal', 9, 'Stabæk'),
(246, 1, 24, 7, 'Sandefjord', 10, 'Odd'),
(247, 1, 25, 13, 'Strømsgodset', 15, 'Molde'),
(248, 1, 25, 2, 'Bodø Glimt', 16, 'Rosenborg'),
(249, 1, 25, 14, 'Sarpsborg 08', 5, 'Lillestrøm'),
(250, 1, 25, 12, 'Brann', 8, 'Vålerenga'),
(251, 1, 25, 6, 'Kristiansund BK', 11, 'FK Haugesund'),
(252, 1, 25, 4, 'Tromsø', 3, 'Sogndal'),
(253, 1, 25, 1, 'IK Start', 7, 'Sandefjord'),
(254, 1, 25, 9, 'Stabæk', 10, 'Odd'),
(255, 1, 26, 16, 'Rosenborg', 13, 'Strømsgodset'),
(256, 1, 26, 5, 'Lillestrøm', 15, 'Molde'),
(257, 1, 26, 8, 'Vålerenga', 2, 'Bodø Glimt'),
(258, 1, 26, 11, 'FK Haugesund', 14, 'Sarpsborg 08'),
(259, 1, 26, 3, 'Sogndal', 12, 'Brann'),
(260, 1, 26, 7, 'Sandefjord', 6, 'Kristiansund BK'),
(261, 1, 26, 10, 'Odd', 4, 'Tromsø'),
(262, 1, 26, 9, 'Stabæk', 1, 'IK Start'),
(263, 1, 27, 13, 'Strømsgodset', 5, 'Lillestrøm'),
(264, 1, 27, 16, 'Rosenborg', 8, 'Vålerenga'),
(265, 1, 27, 15, 'Molde', 11, 'FK Haugesund'),
(266, 1, 27, 2, 'Bodø Glimt', 3, 'Sogndal'),
(267, 1, 27, 14, 'Sarpsborg 08', 7, 'Sandefjord'),
(268, 1, 27, 12, 'Brann', 10, 'Odd'),
(269, 1, 27, 6, 'Kristiansund BK', 9, 'Stabæk'),
(270, 1, 27, 4, 'Tromsø', 1, 'IK Start'),
(271, 1, 28, 8, 'Vålerenga', 13, 'Strømsgodset'),
(272, 1, 28, 11, 'FK Haugesund', 5, 'Lillestrøm'),
(273, 1, 28, 3, 'Sogndal', 16, 'Rosenborg'),
(274, 1, 28, 7, 'Sandefjord', 15, 'Molde'),
(275, 1, 28, 10, 'Odd', 2, 'Bodø Glimt'),
(276, 1, 28, 9, 'Stabæk', 14, 'Sarpsborg 08'),
(277, 1, 28, 1, 'IK Start', 12, 'Brann'),
(278, 1, 28, 4, 'Tromsø', 6, 'Kristiansund BK'),
(279, 1, 29, 13, 'Strømsgodset', 11, 'FK Haugesund'),
(280, 1, 29, 8, 'Vålerenga', 3, 'Sogndal'),
(281, 1, 29, 5, 'Lillestrøm', 7, 'Sandefjord'),
(282, 1, 29, 16, 'Rosenborg', 10, 'Odd'),
(283, 1, 29, 15, 'Molde', 9, 'Stabæk'),
(284, 1, 29, 2, 'Bodø Glimt', 1, 'IK Start'),
(285, 1, 29, 14, 'Sarpsborg 08', 4, 'Tromsø'),
(286, 1, 29, 12, 'Brann', 6, 'Kristiansund BK'),
(287, 1, 30, 3, 'Sogndal', 13, 'Strømsgodset'),
(288, 1, 30, 7, 'Sandefjord', 11, 'FK Haugesund'),
(289, 1, 30, 10, 'Odd', 8, 'Vålerenga'),
(290, 1, 30, 9, 'Stabæk', 5, 'Lillestrøm'),
(291, 1, 30, 1, 'IK Start', 16, 'Rosenborg'),
(292, 1, 30, 4, 'Tromsø', 15, 'Molde'),
(293, 1, 30, 6, 'Kristiansund BK', 2, 'Bodø Glimt'),
(294, 1, 30, 12, 'Brann', 14, 'Sarpsborg 08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
