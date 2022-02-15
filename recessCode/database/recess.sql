-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2022 at 11:43 PM
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
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `assignmentId` int(10) NOT NULL AUTO_INCREMENT,
  `assignmentName` varchar(50) NOT NULL,
  `startDate` datetime(6) NOT NULL,
  `endDate` datetime(6) NOT NULL,
  `assignment` varchar(20) NOT NULL,
  PRIMARY KEY (`assignmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentId`, `assignmentName`, `startDate`, `endDate`, `assignment`) VALUES
(1, 'Assignment1', '2022-02-16 16:50:00.000000', '2022-02-26 16:50:00.000000', 'GMPX'),
(2, 'Assignment2', '2022-02-02 17:17:00.000000', '2022-02-03 17:18:00.000000', 'CHM'),
(3, 'Assignment3', '2022-02-03 17:28:00.000000', '2022-02-12 17:29:00.000000', 'NOSTXY'),
(4, 'Assignment 4', '2022-02-02 13:20:00.000000', '2023-04-02 22:20:00.000000', 'ABDE'),
(5, 'Assignment 5', '2022-02-02 13:20:00.000000', '2023-04-02 22:20:00.000000', 'ABDE'),
(6, 'Assignment 6', '2022-02-02 13:20:00.000000', '2023-04-02 22:20:00.000000', 'ABDE'),
(7, 'Assignment 7', '2022-02-02 13:20:00.000000', '2023-04-02 22:20:00.000000', 'ABDE'),
(8, 'Assignment 8', '2022-02-02 13:20:00.000000', '2023-04-02 22:20:00.000000', 'ABDE'),
(9, 'Assignment 9', '2022-02-02 13:20:00.000000', '2023-04-02 22:20:00.000000', 'ABDE'),
(10, 'Assignment10', '2022-02-03 04:52:00.000000', '2022-02-19 04:52:00.000000', 'EJO'),
(11, 'Assingment11', '2022-02-03 12:56:00.000000', '2022-02-05 12:56:00.000000', 'DEIJNO'),
(12, 'Assignment 12', '2022-02-03 12:56:00.000000', '2022-02-05 12:56:00.000000', 'DEIJNO'),
(13, 'Assignment 13', '2022-02-03 12:56:00.000000', '2022-02-05 12:56:00.000000', 'DEIJNO'),
(14, 'Assignment 14', '2022-02-04 13:46:00.000000', '2022-02-19 13:46:00.000000', 'ABHM'),
(15, 'Assignment 15', '2022-02-04 13:46:00.000000', '2022-02-19 13:46:00.000000', 'ABHM'),
(16, 'Assignment 16', '2022-02-04 13:46:00.000000', '2022-02-19 13:46:00.000000', 'ABHM');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`recordNo`, `userCode`, `assignmentName`, `finalMark`, `teacherComment`) VALUES
(1, 'KCLP1', 'Assignment1', 50.66, NULL),
(2, 'KCLP1', 'Assignment1', 47.62, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

DROP TABLE IF EXISTS `pupil`;
CREATE TABLE IF NOT EXISTS `pupil` (
  `No` int(10) NOT NULL AUTO_INCREMENT,
  `userCode` varchar(25) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `phoneNumber` int(12) NOT NULL,
  `pupilPassword` varchar(30) NOT NULL,
  `activationStatus` varchar(25) DEFAULT 'Deactivated',
  `activationRequest` varchar(20) DEFAULT ' Not sent',
  `marks` float DEFAULT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pupil`
--

INSERT INTO `pupil` (`No`, `userCode`, `firstName`, `lastName`, `phoneNumber`, `pupilPassword`, `activationStatus`, `activationRequest`, `marks`) VALUES
(1, 'KCLP1', 'Kiden', 'yenki', 775304215, 'kiden123', 'activated', 'sent', 39.81),
(2, 'KCLP2', 'Isaac', 'Kirabo', 788833735, 'isaac123', 'activated', 'Not sent', NULL),
(3, 'KCLP3', 'Sharif', 'Ismail', 788833735, 'sharif123', 'activated', 'Not Sent', NULL),
(4, 'KCLP4', 'Julie', 'Nvanungi', 778235696, 'julie123', 'Deactivated', 'sent', NULL),
(5, 'KCLP5', 'Esther', 'Nabwire', 779635986, 'esther123', 'Deactivated', 'Not sent', NULL),
(6, 'KCLP6', 'Jemimah', 'Mulungi', 779635640, 'jemimah123', 'Deactivated', 'Not sent', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
(8, 'Brian', 'Odongo', 'brian@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
