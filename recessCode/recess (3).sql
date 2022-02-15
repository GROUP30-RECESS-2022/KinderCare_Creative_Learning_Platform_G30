-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2022 at 09:22 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recess`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'recess30');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `assignmentId` int(10) NOT NULL AUTO_INCREMENT,
  `assignmentName` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time(6) DEFAULT NULL,
  `endDate` date NOT NULL,
  `endTime` time(6) NOT NULL,
  `assignment` varchar(20) NOT NULL,
  `attemptsAllowed` int(10) DEFAULT '1',
  `teacherEmail` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`assignmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentId`, `assignmentName`, `startDate`, `startTime`, `endDate`, `endTime`, `assignment`, `attemptsAllowed`, `teacherEmail`) VALUES
(1, 'Assignment1', '2022-02-16', NULL, '2022-02-26', '00:00:00.000000', 'GMPX', 2, 'kiraboisaac6@gmail.com'),
(2, 'Assignment2', '2022-02-02', NULL, '2022-02-03', '00:00:00.000000', 'CHM', 3, 'justincampdiop@gmail.com'),
(3, 'Assignment3', '2022-02-03', NULL, '2022-02-12', '00:00:00.000000', 'NOSTXY', 5, 'teacher@gmail.com'),
(4, 'Assignment 4', '2022-02-02', NULL, '2023-04-02', '00:00:00.000000', 'ABDE', 1, 'justincampdiop@gmail.com'),
(5, 'Assignment 5', '2022-02-02', NULL, '2023-04-02', '00:00:00.000000', 'ABDE', 2, 'kiraboisaac6@gmail.com'),
(6, 'Assignment 6', '2022-02-02', NULL, '2023-04-02', '00:00:00.000000', 'ABDE', 3, 'mjem@gmail.com'),
(7, 'Assignment 7', '2022-02-02', NULL, '2023-04-02', '00:00:00.000000', 'ABDE', 2, 'kiden5@gmail.com'),
(8, 'Assignment 8', '2022-02-02', NULL, '2023-04-02', '00:00:00.000000', 'ABDE', 2, 'justincampdiop@gmail.com'),
(9, 'Assignment 9', '2022-02-02', NULL, '2023-04-02', '00:00:00.000000', 'ABDE', 2, 'suzanowamagyezi@gmail.com'),
(10, 'Assignment10', '2022-02-03', NULL, '2022-02-19', '00:00:00.000000', 'EJO', 3, 'kiraboisaac6@gmail.com'),
(11, 'Assingment11', '2022-02-03', NULL, '2022-02-05', '00:00:00.000000', 'DEIJNO', 4, 'kiden5@gmail.com'),
(12, 'Assignment 12', '2022-02-03', NULL, '2022-02-05', '00:00:00.000000', 'DEIJNO', 3, 'kiraboisaac6@gmail.com'),
(13, 'Assignment 13', '2022-02-03', NULL, '2022-02-05', '00:00:00.000000', 'DEIJNO', 2, 'suzanowamagyezi@gmail.com'),
(14, 'Assignment 14', '2022-02-04', NULL, '2022-02-19', '00:00:00.000000', 'ABHM', 3, 'mjem@gmail.com'),
(15, 'Assignment 15', '2022-02-04', NULL, '2022-02-19', '00:00:00.000000', 'ABHM', 3, 'mjem@gmail.com'),
(16, 'Assignment 16', '2022-02-04', NULL, '2022-02-19', '00:00:00.000000', 'ABHM', 2, 'suzanowamagyezi@gmail.com'),
(17, 'Assignment17', '2022-02-18', '02:17:00.000000', '2022-02-24', '11:22:00.000000', 'CDEJ', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comments` varchar(25) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `recordNo` int(10) NOT NULL AUTO_INCREMENT,
  `userCode` varchar(25) NOT NULL,
  `assignmentName` varchar(50) NOT NULL,
  `finalMark` float DEFAULT NULL,
  `teacherComment` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`recordNo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`recordNo`, `userCode`, `assignmentName`, `finalMark`, `teacherComment`) VALUES
(1, 'KCLP1', 'Assignment1', 44.13, NULL),
(2, 'KCLP1', 'Assignment10', 60.33, 'Good marks'),
(3, 'KCLP1', 'Assignment10', 48.21, 'Below average'),
(4, 'KCLP3', 'Assignment10', 48.21, 'Below average'),
(5, 'KCLP3', 'Assignment10', 48.21, NULL),
(6, 'KCLP1', 'Assignment2', 51.37, 'Averagely scored');

-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

DROP TABLE IF EXISTS `pupil`;
CREATE TABLE IF NOT EXISTS `pupil` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `userCode` varchar(25) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `phoneNumber` int(12) NOT NULL,
  `pupilPassword` varchar(30) NOT NULL,
  `activationStatus` varchar(25) DEFAULT 'Deactivated',
  `activationRequest` varchar(30) DEFAULT NULL,
  `marks` float DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pupil`
--

INSERT INTO `pupil` (`Id`, `userCode`, `firstName`, `lastName`, `phoneNumber`, `pupilPassword`, `activationStatus`, `activationRequest`, `marks`) VALUES
(1, 'KCLP1', 'Kiden', 'Yenki', 775304215, 'kiden123', 'activated', 'sent', 39.81),
(2, 'KCLP2', 'Isaac', 'Kirabo', 788833735, 'isaac123', 'Deactivated', 'sent', NULL),
(3, 'KCLP3', 'Sharif', 'Ismail', 788833735, 'sharif123', 'activated', 'sent', NULL),
(4, 'KCLP4', 'Julie', 'Nvanungi', 778235696, 'julie123', 'Deactivated', 'Not sent', NULL),
(5, 'KCLP5', 'Benjamin', 'Jumba', 75665465, 'benjamin123', 'Deactivated', 'sent', NULL),
(6, 'KCLP6', 'Jemimah', 'Mulungi', 779635640, 'jemimah123', 'activated', 'sent', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherCode` int(8) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teacherCode`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherCode`, `firstName`, `lastName`, `email`, `pass`) VALUES
(1, 'Kirabo', 'Isaac', 'kiraboisaac6@gmail.com', 'qwerty'),
(2, 'Justine', 'Odongo', 'justincampdiop@gmail.com', '123456'),
(3, 'Justine', 'Odongo', 'justincampdiop@gmail.com', '123456'),
(4, 'Justine', 'Odongo', 'justincampdiop@gmail.com', '123456'),
(5, 'Kiden', 'Yenki', 'kiden5@gmail.com', '12345'),
(6, 'Suzan', 'Nowamagyezi', 'suzanowamagyezi@gmail.com', '1357'),
(7, 'Tonny', 'Mutebi', 'Tonny@gmail.com', '123456'),
(8, 'Brian', 'Odongo', 'brian@gmail.com', '123456'),
(9, 'Justin', 'Odongo', 'justin10@gmail.com', '123456'),
(10, 'Mulungi', 'Jemimah', 'mjem@gmail.com', 'qwerty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
