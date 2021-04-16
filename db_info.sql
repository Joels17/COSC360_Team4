-- phpMyAdmin SQL Dump
-- version 7.4.16
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: April 05, 2021 at 2:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_sample`
--


DROP TABLE IF EXISTS `tempCode`;
DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `blogs`;
DROP TABLE IF EXISTS `users`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL PRIMARY KEY,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `tempCode`
--

CREATE TABLE `tempCode` (
  `email` varchar(255) NOT NULL PRIMARY KEY,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` TEXT NOT NULL,
  `datetime` DATETIME NOT NULL,
  `views` int NOT NULL,
  `uploadUser` varchar(255) NOT NULL,
  FOREIGN KEY (`uploadUser`) REFERENCES `users`(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `commentBody` TEXT NOT NULL,
  `datetime` DATETIME NOT NULL,
  `uploadUser` varchar(255) NOT NULL,
  `uploadBlog` int NOT NULL,
  FOREIGN KEY (`uploadUser`) REFERENCES `users`(`username`),
  FOREIGN KEY (`uploadBlog`) REFERENCES `blogs`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `number`, `password`, `img`) VALUES 
('sample', 'sampleFirst', 'sampleLast', 'sample@email.com', '1112223333', '1a1dc91c907325c69271ddf0c944bc72', 'images/Profile_sample.jpg');

--
-- Indexes for dumped tables
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
