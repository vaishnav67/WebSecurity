-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2021 at 12:11 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websec`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `username` varchar(20) NOT NULL,
  `q1` varchar(10) NOT NULL,
  `q2` varchar(10) NOT NULL,
  `q3` varchar(10) NOT NULL,
  `q4` varchar(10) NOT NULL,
  KEY `user_fk` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`username`, `q1`, `q2`, `q3`, `q4`) VALUES
('keerthana23', 'Vellore', 'Bubbles', 'Honda', 'Noodles'),
('Vaishnav', 'Chennai', 'Oreo', 'Porsche', 'Idly'),
('user3', 'Vellore', 'Bubbles', 'Honda', 'Noodles'),
('keer', 'india', 'pii', 'honda', 'noodle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `secret` varchar(30) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `secret`, `email`) VALUES
('user2', '$2y$10$WZ7S3ZZkytzSniYXwKG2uuK15DfToxSR1ffdb.PzleRG.ZrsZf0JO', 'ETB5ZW2ARRHZNRPL', 'jm2@gmail.com'),
('vaishnav68', '$2y$10$wRiGVPEljgHNfqCBbay.WeAvRQ8DxORMsuLhpzVn3/Cg6Sed3uz.G', 'L3HGZ32PKM3TFM6R', 'vaihome@hotmail.com'),
('user0', '$2y$10$a1O4SyRjhPp3rKvHwsSN5uS3ChNfB1MP7.aD7kUuOiDJBf94olH9K', '4DLWMQJNN5TRJNJP', 'jm1@gmail.com'),
('user3', '$2y$10$E68BBRg.gYG6WJTK9PBK6.8ZnyX0s5ONYhzUyPfat2kBcSGTzJ9b.', 'NRTADMFGT5HCRL6Y', 'k@gmail.com'),
('keer', '$2y$10$ka.OWPIw4j6bNRBNPNG59ObibKMQQm.s0oNelB0BfqNBXP0vLWloS', 'OJXIRMCVMLPAN2NL', 'keer@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
