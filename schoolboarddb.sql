-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2019 at 12:57 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolboarddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `lastName`, `board`) VALUES
(1, 'Marko', 'Ivkovic', 'CSM'),
(2, 'Nikola', 'Petrovic', 'CSM'),
(3, 'Petar', 'Markovic', 'CSMB'),
(4, 'Milica', 'Randjelovic', 'CSMB'),
(5, 'Marija', 'Lakicevic', 'CSM'),
(6, 'Ruzica', 'Petronijevic', 'CSM'),
(7, 'Milan', 'Rakic', 'CSMB');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) NOT NULL,
  `oop` int(11) DEFAULT NULL,
  `web_programming` int(11) DEFAULT NULL,
  `back_end_programming` int(11) DEFAULT NULL,
  `front_end_programming` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `id_student`, `oop`, `web_programming`, `back_end_programming`, `front_end_programming`) VALUES
(1, 1, NULL, NULL, NULL, 8),
(2, 2, 7, 6, 10, 10),
(3, 3, 8, 3, 9, 6),
(4, 4, 5, 7, 7, 7),
(5, 5, 8, 8, 8, 8),
(6, 6, 6, 6, 5, 6),
(7, 7, 8, 6, 3, 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
