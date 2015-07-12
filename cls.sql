-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 07:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cls`
--
CREATE DATABASE IF NOT EXISTS `cls` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cls`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `Course_Code` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Course_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Level` tinyint(4) DEFAULT NULL,
  `Course_Mode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Course_Length` tinyint(4) DEFAULT NULL,
  `Course_Hours` float DEFAULT NULL,
  `Exam_Exist` enum('Y','N','','') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Exam_Hours` float DEFAULT NULL,
  `Course_Constraint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Course_Description` text COLLATE utf8_unicode_ci,
  `Capacity` smallint(6) DEFAULT NULL,
  `CostCentre_Code` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Course_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_Code`, `Version`, `Course_Name`, `Level`, `Course_Mode`, `Course_Length`, `Course_Hours`, `Exam_Exist`, `Exam_Hours`, `Course_Constraint`, `Course_Description`, `Capacity`, `CostCentre_Code`) VALUES
('BSC1100', '14/15', 'Intro to Building Science', 1, 'hybrid', 15, 45, 'N', NULL, NULL, NULL, NULL, '570K');

-- --------------------------------------------------------

--
-- Table structure for table `course_professor`
--

DROP TABLE IF EXISTS `course_professor`;
CREATE TABLE IF NOT EXISTS `course_professor` (
  `Course_Code` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Professor_Code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Course_Code`,`Professor_Code`),
  KEY `Professor_Code` (`Professor_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `Level_Code` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `StudentNumber_Start` smallint(6) NOT NULL,
  `StudentNumber_Projected` smallint(6) NOT NULL,
  `StudentNumber_Actual` smallint(6) NOT NULL,
  PRIMARY KEY (`Level_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `Professor_Code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Professor_FirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Professor_LastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Teaching_Status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Professor_Constraints` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Weekly_Hours` float DEFAULT NULL,
  `Hourly_Pay` float DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Town` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PostalCode` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Home_Phone` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Work_Phone` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cell_Phone` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Office_Number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Professor_Suggested` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Professor_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `Program_Code` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `Program_Version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Program_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Total_Student` smallint(6) DEFAULT NULL,
  `Level` tinyint(4) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Coordinator_Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Coordinator_PhoneNumber` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Program_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Program_Code`, `Program_Version`, `Program_Name`, `Total_Student`, `Level`, `Start_Date`, `End_Date`, `Coordinator_Name`, `Coordinator_PhoneNumber`) VALUES
('1512X', '14/15', 'Bachelor Building Science', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_course`
--

DROP TABLE IF EXISTS `program_course`;
CREATE TABLE IF NOT EXISTS `program_course` (
  `Program_Code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Course_Code` char(9) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Program_Code`,`Course_Code`),
  KEY `Course_Code` (`Course_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_course`
--

INSERT INTO `program_course` (`Program_Code`, `Course_Code`) VALUES
('1512X', 'BSC1100');

-- --------------------------------------------------------

--
-- Table structure for table `program_level`
--

DROP TABLE IF EXISTS `program_level`;
CREATE TABLE IF NOT EXISTS `program_level` (
  `Program_Code` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `Level_Code` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Program_Code`,`Level_Code`),
  KEY `Level_Code` (`Level_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `Section_Code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Course_Code` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Section_Size` tinyint(4) DEFAULT NULL,
  `Room_Code` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Room_Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delivery_Type1` enum('Lab','Hybrid','Theory','') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delivery_Type2` enum('Lab','Hybrid','Theory','') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delivery_Type3` enum('Lab','Hybrid','Theory','') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hours_Type1` float DEFAULT NULL,
  `Hours_Type2` float DEFAULT NULL,
  `Hours_Type3` float DEFAULT NULL,
  PRIMARY KEY (`Section_Code`,`Course_Code`),
  KEY `Course_Code` (`Course_Code`),
  KEY `Course_Code_2` (`Course_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`Section_Code`, `Course_Code`, `Section_Size`, `Room_Code`, `Room_Description`, `Delivery_Type1`, `Delivery_Type2`, `Delivery_Type3`, `Hours_Type1`, `Hours_Type2`, `Hours_Type3`) VALUES
('010', 'BSC1100', 24, 'CL425', NULL, 'Lab', NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_program`
--

DROP TABLE IF EXISTS `term_program`;
CREATE TABLE IF NOT EXISTS `term_program` (
  `Term_Code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Program_Code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Term_Code`,`Program_Code`),
  KEY `Program_Code` (`Program_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term_program`
--

INSERT INTO `term_program` (`Term_Code`, `Program_Code`) VALUES
('F14', '1512X');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` enum('main_user','coordinator','budget_officer','admin') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `user_role`) VALUES
(1, 'admin', '8d2ec3283975f84fc6cf71cb686d1487630efbd0309d226a9477a66095b24d32', '37e90bf275ace59b', 'admin'),
(4, 'coordinator', '141ea6e010ec104e3f78f66337d1e3c6c38ad7ec9738cacc00e11033719c6b24', '351ed84d3b61bd30', 'coordinator'),
(10, 'mainuser', '9ba5e392ce993b816ee863d37bd924f659f53c0dafea97726b77293897828708', '299fadb05bf09289', 'main_user'),
(11, 'budget', 'b99b35b31ac1fd5342543d8f2cf6dd28fe50ba273d97ad8d3b832966cc9c3484', '5f3401067eee14fb', 'budget_officer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_professor`
--
ALTER TABLE `course_professor`
  ADD CONSTRAINT `course_professor_ibfk_2` FOREIGN KEY (`Professor_Code`) REFERENCES `professor` (`Professor_Code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_professor_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `course` (`Course_Code`) ON UPDATE CASCADE;

--
-- Constraints for table `program_course`
--
ALTER TABLE `program_course`
  ADD CONSTRAINT `program_course_ibfk_2` FOREIGN KEY (`Course_Code`) REFERENCES `course` (`Course_Code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `program_course_ibfk_1` FOREIGN KEY (`Program_Code`) REFERENCES `program` (`Program_Code`) ON UPDATE CASCADE;

--
-- Constraints for table `program_level`
--
ALTER TABLE `program_level`
  ADD CONSTRAINT `program_level_ibfk_2` FOREIGN KEY (`Level_Code`) REFERENCES `level` (`Level_Code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `program_level_ibfk_1` FOREIGN KEY (`Program_Code`) REFERENCES `program` (`Program_Code`) ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `course` (`Course_Code`) ON UPDATE CASCADE;

--
-- Constraints for table `term_program`
--
ALTER TABLE `term_program`
  ADD CONSTRAINT `term_program_ibfk_1` FOREIGN KEY (`Program_Code`) REFERENCES `program` (`Program_Code`) ON UPDATE CASCADE;
  
CREATE USER '25sK9PcRsutUchM8'@'localhost' IDENTIFIED BY PASSWORD '*55459EB2C6F83B2FBD95D26350D526BA1F456DB6';

GRANT USAGE ON *.* TO '25sK9PcRsutUchM8'@'localhost' IDENTIFIED BY PASSWORD '*55459EB2C6F83B2FBD95D26350D526BA1F456DB6';

GRANT ALL PRIVILEGES ON `cls`.* TO '25sK9PcRsutUchM8'@'localhost';


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
