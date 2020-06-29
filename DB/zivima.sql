-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2019 at 10:43 PM
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
-- Database: `zivima`
--

-- --------------------------------------------------------

--
-- Table structure for table `district_authority`
--

DROP TABLE IF EXISTS `district_authority`;
CREATE TABLE IF NOT EXISTS `district_authority` (
  `DA_id` int(11) NOT NULL AUTO_INCREMENT,
  `DA_Name` varchar(30) DEFAULT NULL,
  `DA_mail` varchar(20) DEFAULT NULL,
  `DA_pass` varchar(15) DEFAULT NULL,
  `DA_mobile` varchar(10) DEFAULT NULL,
  `verifyBy` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`DA_id`),
  KEY `verifyBy` (`verifyBy`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district_authority`
--

INSERT INTO `district_authority` (`DA_id`, `DA_Name`, `DA_mail`, `DA_pass`, `DA_mobile`, `verifyBy`, `createdAt`, `updatedAt`) VALUES
(1, 'sameer', 'sam@13.com', '123', '963852745', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `E_no` int(11) NOT NULL AUTO_INCREMENT,
  `E_name` varchar(100) DEFAULT NULL,
  `competitionDate` date DEFAULT NULL,
  `regStartFrom` date DEFAULT NULL,
  `lastRegDate` date DEFAULT NULL,
  `E_location` varchar(100) DEFAULT NULL,
  `fullAdd` varchar(200) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `DA_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`E_no`),
  KEY `DA_id` (`DA_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`E_no`, `E_name`, `competitionDate`, `regStartFrom`, `lastRegDate`, `E_location`, `fullAdd`, `createdAt`, `updatedAt`, `DA_id`) VALUES
(18, 'SMART NAGAR', '2019-10-14', '2019-10-14', '2019-10-14', 'AHAMEDNAGAR', 'AMS Collage A. Nagar', '2019-10-13', '2019-10-13', 1),
(17, 'SMART INDIA', '2019-10-13', '2019-10-13', '2019-10-13', 'PUNE', 'DYPIMCA AKURDI PUNE', '2019-10-12', '2019-10-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

DROP TABLE IF EXISTS `institute`;
CREATE TABLE IF NOT EXISTS `institute` (
  `In_Id` int(11) NOT NULL AUTO_INCREMENT,
  `InName` varchar(30) DEFAULT NULL,
  `InAICTID` int(11) DEFAULT NULL,
  `InMail` varchar(30) DEFAULT NULL,
  `InMobile` varchar(10) DEFAULT NULL,
  `InPass` varchar(15) DEFAULT NULL,
  `InVerifyStatus` tinyint(1) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `DA_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`In_Id`),
  KEY `DA_Id` (`DA_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`In_Id`, `InName`, `InAICTID`, `InMail`, `InMobile`, `InPass`, `InVerifyStatus`, `createdAt`, `updatedAt`, `DA_Id`) VALUES
(1, 'dyp', 1212, 'ggggg@gn', '25656', '', 1, '2019-10-14', '2019-10-08', 1),
(101, 'D Y Patil', 231, 'abc@mail.com', '96969696', '121', 1, NULL, NULL, 1),
(1100, 'PCCOE', 1234, 'pccoe@gmail', '897565', '123', 1, '2019-10-10', '2019-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `institute_sopc`
--

DROP TABLE IF EXISTS `institute_sopc`;
CREATE TABLE IF NOT EXISTS `institute_sopc` (
  `SOPC_id` int(11) NOT NULL,
  `SPOC_name` varchar(30) NOT NULL,
  `SPOC_mail` varchar(20) NOT NULL,
  `SPOC_pass` varchar(15) NOT NULL,
  `SOPC_designation` varchar(15) NOT NULL,
  `SPOC_mobile` int(10) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `verifyStatus` tinyint(1) NOT NULL,
  `IN_id` int(11) NOT NULL,
  PRIMARY KEY (`SOPC_id`),
  KEY `IN_id` (`IN_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problem_statement`
--

DROP TABLE IF EXISTS `problem_statement`;
CREATE TABLE IF NOT EXISTS `problem_statement` (
  `PS_id` int(11) NOT NULL AUTO_INCREMENT,
  `PS_type` varchar(50) DEFAULT NULL,
  `PS_title` varchar(100) DEFAULT NULL,
  `PS_description` mediumtext,
  `PS_tech` varchar(200) DEFAULT NULL,
  `PS_note` varchar(200) DEFAULT NULL,
  `E_id` int(11) DEFAULT NULL,
  `DA_id` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`PS_id`),
  KEY `DA_id` (`DA_id`),
  KEY `E_id` (`E_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem_statement`
--

INSERT INTO `problem_statement` (`PS_id`, `PS_type`, `PS_title`, `PS_description`, `PS_tech`, `PS_note`, `E_id`, `DA_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Hardwarw', 'MAHARASTRA', 'Hello This is testign', 'ajax angular javascript', 'note 1233', 17, NULL, '2019-10-11', '2019-10-11'),
(2, 'Hardwarw', 'kerala', 'aaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', '52555', 17, NULL, '2019-10-11', '2019-10-11'),
(3, 'Hardwarw', 'MAHARASTRA', 'ssssssssss', 'sssss', 'ssssssss', 3, NULL, '2019-10-11', '2019-10-11'),
(4, 'Hardwarw', 'Water Supply', 'asdfghjkl;zxcvbnm,.jklwertyuiopasdfghjkl   hdasugd aashm ayg d,fj ds<h U.H HD.H BF,Z JG O.H .KJH TOR', 'IOT', '1233', 18, 1, '2019-10-13', '2019-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `R_id` int(11) NOT NULL AUTO_INCREMENT,
  `R_title` varchar(30) DEFAULT NULL,
  `R_file` varchar(200) DEFAULT NULL,
  `R_desc` longtext,
  `submittedAT` date DEFAULT NULL,
  `PS_id` int(11) DEFAULT NULL,
  `ST_id` int(11) DEFAULT NULL,
  `R_checkStatus` tinyint(1) DEFAULT '0',
  `R_grade` int(11) DEFAULT NULL,
  `DA_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`R_id`),
  KEY `DA_Id` (`DA_Id`),
  KEY `ST_id` (`ST_id`),
  KEY `PS_id` (`PS_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`R_id`, `R_title`, `R_file`, `R_desc`, `submittedAT`, `PS_id`, `ST_id`, `R_checkStatus`, `R_grade`, `DA_Id`) VALUES
(1, '1212', 'Video Conferancing MMTP Ganesh Kadam.pdf', NULL, '2019-10-12', 2, 10, 1, NULL, 1),
(2, '1212', 'Video Conferancing MMTP Ganesh Kadam.pdf', '12121', '2019-10-12', 2, 12, 1, NULL, 1),
(3, 'HOLA', 'Gmail - Welcome to Components And Applications Of Internet Of Things.pdf', 'ghello juniors', '2019-10-12', 1, 0, 1, NULL, 1),
(4, '1212', 'Video Conferancing MMTP Ganesh Kadam.pdf', 'dfghj', '2019-10-13', 3, NULL, 1, NULL, 1),
(5, '1212', 'Video Conferancing MMTP Ganesh Kadam.pdf', 'dfghj', '2019-10-13', 3, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `R_id` int(11) NOT NULL,
  `R_file` blob NOT NULL,
  `E_id` int(11) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `R_description` varchar(100) NOT NULL,
  PRIMARY KEY (`R_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_team`
--

DROP TABLE IF EXISTS `student_team`;
CREATE TABLE IF NOT EXISTS `student_team` (
  `ST_id` int(11) NOT NULL AUTO_INCREMENT,
  `ST_name` varchar(30) DEFAULT NULL,
  `ST_leaderName` varchar(30) DEFAULT NULL,
  `ST_mail` varchar(50) DEFAULT NULL,
  `ST_pass` varchar(15) DEFAULT NULL,
  `ST_mobile` varchar(12) DEFAULT NULL,
  `In_Id` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `verifySatus` tinyint(1) DEFAULT NULL,
  `SPOC_id` int(11) DEFAULT NULL,
  `E_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ST_id`),
  KEY `SPOC_id` (`SPOC_id`),
  KEY `E_id` (`E_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_team`
--

INSERT INTO `student_team` (`ST_id`, `ST_name`, `ST_leaderName`, `ST_mail`, `ST_pass`, `ST_mobile`, `In_Id`, `createdAt`, `updatedAt`, `verifySatus`, `SPOC_id`, `E_id`) VALUES
(10, 'akshay', 'a', 'bhosalep411@gmail.com', '123', '07798 376151', NULL, '2019-10-13', NULL, 1, NULL, 17),
(12, 'Ganesh', 'a', 'ganeshbkdm@gmail.com', '123', '07798 376151', NULL, '2019-10-13', NULL, 1, NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

DROP TABLE IF EXISTS `team_member`;
CREATE TABLE IF NOT EXISTS `team_member` (
  `TM_id` int(11) NOT NULL AUTO_INCREMENT,
  `TM_name` varchar(100) DEFAULT NULL,
  `TM_mail` varchar(100) DEFAULT NULL,
  `TM_mobile` varchar(100) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `ST_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`TM_id`),
  KEY `ST_id` (`ST_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`TM_id`, `TM_name`, `TM_mail`, `TM_mobile`, `createdAt`, `updatedAt`, `ST_id`) VALUES
(3, 'Soumitra', 'joshisc@gmail.com', '968574', NULL, NULL, 12),
(10, 'Ganesh Kadam', 'ganeshbkdm@gmail.com', '08698238508', '2019-10-13', '2019-10-13', 12),
(12, 'GANESH BHAUPATIL KADAM', 'ganeshbkdm@gmail.com', '08698238508', '2019-10-13', '2019-10-13', 12),
(11, 'Ganesh Kadam', 'ganeshbkdm@gmail.com', '08698238508', '2019-10-13', '2019-10-13', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
