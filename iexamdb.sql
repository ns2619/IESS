-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2014 at 12:39 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iexamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_master`
--

CREATE TABLE IF NOT EXISTS `batch_master` (
  `batch_id` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `batch_name` varchar(20) NOT NULL,
  `course_name` varchar(10) NOT NULL,
  `sem_no` int(2) NOT NULL,
  `lab_no` int(3) NOT NULL,
  `rno_from` int(3) NOT NULL,
  `rno_to` int(3) NOT NULL,
  `total_stud` int(5) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `batch_master`
--

INSERT INTO `batch_master` (`batch_id`, `exam_name`, `batch_name`, `course_name`, `sem_no`, `lab_no`, `rno_from`, `rno_to`, `total_stud`) VALUES
(3, 'internal exam', 'first', 'MCA', 1, 4, 1, 30, 30),
(4, 'internal exam', 'second', 'MCA', 5, 2, 31, 50, 20),
(5, 'internal exam', 'first', 'MCA', 3, 3, 1, 40, 40),
(6, 'internal exam', 'second', 'MCA', 3, 4, 41, 80, 40),
(7, 'internal exam', 'second', 'MCA', 5, 1, 1, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `block_arrange`
--

CREATE TABLE IF NOT EXISTS `block_arrange` (
  `b_id` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `course_name` varchar(10) NOT NULL,
  `sem_no` int(2) NOT NULL,
  `block_no` int(3) NOT NULL,
  `room_no` int(3) NOT NULL,
  `roll_no_from` int(3) NOT NULL,
  `roll_no_to` int(3) NOT NULL,
  `total_stud` int(3) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `block_arrange`
--

INSERT INTO `block_arrange` (`b_id`, `exam_name`, `course_name`, `sem_no`, `block_no`, `room_no`, `roll_no_from`, `roll_no_to`, `total_stud`) VALUES
(7, 'internal exam', 'MCA', 3, 3, 4, 1, 30, 30),
(8, 'internal exam', 'MCA', 5, 4, 14, 31, 50, 20),
(9, 'internal exam', 'MCA', 3, 1, 13, 1, 40, 40),
(10, 'internal exam', 'MCA', 3, 2, 4, 41, 80, 40),
(11, 'internal exam', 'MCA', 5, 1, 12, 1, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `block_master`
--

CREATE TABLE IF NOT EXISTS `block_master` (
  `block_id` int(5) NOT NULL AUTO_INCREMENT,
  `block_no` int(2) NOT NULL,
  `room_no` int(2) NOT NULL,
  `block_strength` int(5) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `block_master`
--

INSERT INTO `block_master` (`block_id`, `block_no`, `room_no`, `block_strength`) VALUES
(10, 3, 14, 30),
(12, 4, 4, 30),
(13, 1, 12, 30),
(14, 2, 13, 30);

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE IF NOT EXISTS `course_master` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(10) NOT NULL,
  `total_sem` int(2) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`course_id`, `course_name`, `total_sem`) VALUES
(1, 'BCA', 6),
(5, 'MCA', 6),
(6, 'MBA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `exam_info_master`
--

CREATE TABLE IF NOT EXISTS `exam_info_master` (
  `exam_id` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `exam_year` int(4) NOT NULL,
  `exam_type` varchar(10) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `exam_info_master`
--

INSERT INTO `exam_info_master` (`exam_id`, `exam_name`, `exam_year`, `exam_type`) VALUES
(10, 'internal exam', 2014, 'Theory'),
(11, 'internal exam', 2014, 'Practical');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE IF NOT EXISTS `exam_schedule` (
  `exam_schedule_id` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `course_name` varchar(10) NOT NULL,
  `sem_no` int(2) NOT NULL,
  `sub_code` char(10) NOT NULL,
  `batch_name` varchar(50) DEFAULT NULL,
  `exam_date` varchar(50) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL,
  PRIMARY KEY (`exam_schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`exam_schedule_id`, `exam_name`, `course_name`, `sem_no`, `sub_code`, `batch_name`, `exam_date`, `time_from`, `time_to`) VALUES
(17, 'internal exam', 'MCA', 5, '2650001', NULL, '28-NOV-2014', '9:30 AM', '1:00 PM'),
(18, 'internal exam', 'MCA', 5, '2650002', NULL, '29-NOV-2014', '9:30 AM', '1:00 PM'),
(19, 'internal exam', 'MCA', 5, '2650004', NULL, '04-DEC-2014', '9:30 AM', '1:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule_pr`
--

CREATE TABLE IF NOT EXISTS `exam_schedule_pr` (
  `exam_schedule_pr_id` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `course_name` varchar(10) NOT NULL,
  `sem_no` int(2) NOT NULL,
  `sub_code` char(10) NOT NULL,
  `batch_name` varchar(50) DEFAULT NULL,
  `exam_date` varchar(50) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL,
  `myexamid` int(11) NOT NULL,
  PRIMARY KEY (`exam_schedule_pr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `exam_schedule_pr`
--

INSERT INTO `exam_schedule_pr` (`exam_schedule_pr_id`, `exam_name`, `course_name`, `sem_no`, `sub_code`, `batch_name`, `exam_date`, `time_from`, `time_to`, `myexamid`) VALUES
(9, 'internal exam', 'MCA', 5, '602', '', '20-NOV-2014', '1:00 PM', '3:30 PM', 0),
(10, 'internal exam', 'MCA', 5, '2650003', '', '19-NOV-2014', '1:00 PM', '3:30 PM', 0),
(11, 'internal exam', 'MCA', 5, '601', '', '21-NOV-2014', '1:00 PM', '3:30 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

CREATE TABLE IF NOT EXISTS `faculty_master` (
  `fac_id` int(5) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `date_of_join` varchar(50) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`fac_id`, `fac_name`, `gender`, `mobile_no`, `date_of_join`) VALUES
(13, 'Keyur Modi', 'Male', 2147483647, ''),
(14, 'Viral Maheta', 'Male', 2147483647, ''),
(15, 'Ankita Patel', 'female', 2147483647, ''),
(16, 'Vina Patel', 'female', 2147483647, ''),
(17, 'priya shah', 'female', 2147483647, ''),
(18, 'pankaj nanal', 'Male', 2147483647, ''),
(19, 'vikash katariya', 'Male', 2147483647, ''),
(20, 'pintu patel', 'Male', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `lab_master`
--

CREATE TABLE IF NOT EXISTS `lab_master` (
  `lab_id` int(5) NOT NULL AUTO_INCREMENT,
  `lab_no` int(3) NOT NULL,
  `lab_strength` int(3) NOT NULL,
  `lab_specialization` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lab_master`
--

INSERT INTO `lab_master` (`lab_id`, `lab_no`, `lab_strength`, `lab_specialization`) VALUES
(1, 1, 20, 'php'),
(3, 2, 50, 'android'),
(4, 3, 30, 'java'),
(5, 4, 30, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE IF NOT EXISTS `login_master` (
  `user_name` char(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`user_name`, `password`, `user_type`) VALUES
('examc', 'examc', 'exam_co_ordinator'),
('examsc', 'examsc', 'exam_sub_co_ordinator'),
('faculty', 'faculty', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `result_id` int(12) NOT NULL,
  `result_name` varchar(30) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `result_status` varchar(10) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `result_name`, `roll_no`, `result_status`) VALUES
(0, 'MCA', 3, ''),
(1, 'MCA', 1, 'PASS'),
(2, 'MCA', 2, 'FAIL');

-- --------------------------------------------------------

--
-- Table structure for table `sem_master`
--

CREATE TABLE IF NOT EXISTS `sem_master` (
  `sem_id` char(10) NOT NULL,
  `sem_no` int(2) DEFAULT NULL,
  `course_id` char(10) NOT NULL,
  PRIMARY KEY (`sem_id`),
  KEY `course_id` (`course_id`),
  KEY `course_id_2` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stud_strength_master`
--

CREATE TABLE IF NOT EXISTS `stud_strength_master` (
  `stud_id` int(5) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(10) NOT NULL,
  `sem_no` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `roll_no_from` int(3) NOT NULL,
  `roll_no_to` int(3) NOT NULL,
  `total_stud` int(3) NOT NULL,
  `total_cancel_stud` int(3) DEFAULT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stud_strength_master`
--

INSERT INTO `stud_strength_master` (`stud_id`, `course_name`, `sem_no`, `year`, `roll_no_from`, `roll_no_to`, `total_stud`, `total_cancel_stud`) VALUES
(6, 'BCA', 6, 2014, 1, 60, 0, 0),
(7, 'MCA', 5, 2014, 1, 50, 0, 0),
(8, 'MCA', 2, 2014, 1, 80, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_master`
--

CREATE TABLE IF NOT EXISTS `sub_master` (
  `sub_id` int(5) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(10) NOT NULL,
  `sem_no` int(2) NOT NULL,
  `sub_code` char(10) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `sub_type` varchar(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `sub_master`
--

INSERT INTO `sub_master` (`sub_id`, `course_name`, `sem_no`, `sub_code`, `sub_name`, `sub_type`) VALUES
(24, 'BCA', 6, '601', 'PHP', 'Both'),
(25, 'BCA', 6, '602', 'Advance.Net Using C#', 'Both'),
(26, 'BCA', 6, '603', 'Data Warehouse And D', 'Theory'),
(27, 'BCA', 6, '604', 'System Development P', 'Practical'),
(28, 'MCA', 5, '2650001', 'S.E', 'Theory'),
(29, 'MCA', 5, '2650002', 'N.S', 'Theory'),
(30, 'MCA', 5, '2650003', 'M.C', 'Both'),
(31, 'MCA', 5, '2650004', 'A.D.B.M.S', 'Theory');

-- --------------------------------------------------------

--
-- Table structure for table `supervision_schedule`
--

CREATE TABLE IF NOT EXISTS `supervision_schedule` (
  `sup_id` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `exam_date` varchar(50) NOT NULL,
  `fac_name` varchar(20) NOT NULL,
  `block_no` int(3) NOT NULL,
  `room_no` int(3) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL,
  `reliever_fac_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `supervision_schedule`
--

INSERT INTO `supervision_schedule` (`sup_id`, `exam_name`, `exam_date`, `fac_name`, `block_no`, `room_no`, `time_from`, `time_to`, `reliever_fac_name`) VALUES
(4, 'internal exam', '28-NOV-2014', 'priya shah', 3, 14, '1:00 PM', '1:00 PM', 'Keyur Modi'),
(5, 'internal exam', '28-NOV-2014', 'vikash katariya', 2, 12, '9:30 AM', '1:00 PM', 'pankaj nanal'),
(6, 'internal exam', '29-NOV-2014', 'pintu patel', 3, 14, '9:30 AM', '1:00 PM', 'vikash katariya'),
(7, 'internal exam', '29-NOV-2014', 'vikash katariya', 4, 12, '9:30 AM', '1:00 PM', 'priya shah'),
(8, 'internal exam', '04-DEC-2014', 'pankaj nanal', 3, 14, '9:30 AM', '1:00 PM', 'vikash katariya'),
(9, 'internal exam', '04-DEC-2014', 'pintu patel', 4, 13, '9:30 AM', '1:00 PM', 'vikash katariya');

-- --------------------------------------------------------

--
-- Table structure for table `supervision_schedule_pr`
--

CREATE TABLE IF NOT EXISTS `supervision_schedule_pr` (
  `sup_id_pr` int(5) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(50) NOT NULL,
  `exam_date` varchar(50) NOT NULL,
  `fac_name` varchar(20) NOT NULL,
  `lab_no` int(3) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL,
  PRIMARY KEY (`sup_id_pr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `supervision_schedule_pr`
--

INSERT INTO `supervision_schedule_pr` (`sup_id_pr`, `exam_name`, `exam_date`, `fac_name`, `lab_no`, `time_from`, `time_to`) VALUES
(3, 'internal exam', '20-NOV-2014', 'priya shah', 1, '1:00 PM', '3:30 PM'),
(4, 'internal exam', '21-NOV-2014', 'pankaj nanal', 2, '1:00 PM', '3:30 PM'),
(5, 'internal exam', '19-NOV-2014', 'pintu patel', 3, '1:00 PM', '3:30 PM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
