-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 03:55 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cisf_designation`
--

CREATE TABLE IF NOT EXISTS `cisf_designation` (
  `desig_code` varchar(10) NOT NULL,
  `desig_description` varchar(50) NOT NULL,
  `desig_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`desig_id`),
  UNIQUE KEY `desig_description` (`desig_description`),
  UNIQUE KEY `desig_code` (`desig_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cisf_designation`
--

INSERT INTO `cisf_designation` (`desig_code`, `desig_description`, `desig_id`) VALUES
('12345', 'abcde', 2),
('123345', 'xxcfsf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cisf_gpl`
--

CREATE TABLE IF NOT EXISTS `cisf_gpl` (
  `gpl_id` int(10) NOT NULL AUTO_INCREMENT,
  `dp_description` varchar(60) NOT NULL,
  `desig_description` varchar(60) NOT NULL,
  `no_of_persons` int(10) NOT NULL,
  `gpl_remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`gpl_id`),
  UNIQUE KEY `dp_description` (`dp_description`,`desig_description`),
  KEY `desig_description` (`desig_description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cisf_shift`
--

CREATE TABLE IF NOT EXISTS `cisf_shift` (
  `shift_id` int(10) NOT NULL AUTO_INCREMENT,
  `shift_code` varchar(20) NOT NULL,
  `description` varchar(60) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  PRIMARY KEY (`shift_id`),
  UNIQUE KEY `shift_code` (`shift_code`,`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cisf_shift`
--

INSERT INTO `cisf_shift` (`shift_id`, `shift_code`, `description`, `from_time`, `to_time`) VALUES
(3, '42342432', 'afaddbdb', '12:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cisf_sp`
--

CREATE TABLE IF NOT EXISTS `cisf_sp` (
  `sp_id` int(10) NOT NULL AUTO_INCREMENT,
  `cisf_no` int(20) NOT NULL,
  `name1` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `desig_description` varchar(60) NOT NULL,
  `join_date` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `office_ph` int(10) NOT NULL,
  `res_ph` int(10) NOT NULL,
  `fax` int(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`sp_id`),
  UNIQUE KEY `address` (`address`),
  UNIQUE KEY `cisf_no` (`cisf_no`),
  KEY `email_address` (`email_address`),
  KEY `desig_description` (`desig_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cisf_sp`
--

INSERT INTO `cisf_sp` (`sp_id`, `cisf_no`, `name1`, `gender`, `date_of_birth`, `desig_description`, `join_date`, `address`, `office_ph`, `res_ph`, `fax`, `email_address`, `status`, `remarks`) VALUES
(14, 65465646, 'jlkjljjl', 'Male', '1990-12-01', 'abcde', '2006-07-08', 'knnl', 0, 0, 0, '', 'Available', '');

-- --------------------------------------------------------

--
-- Table structure for table `cisf_swsp`
--

CREATE TABLE IF NOT EXISTS `cisf_swsp` (
  `swsp_id` int(10) NOT NULL AUTO_INCREMENT,
  `shift_date` date NOT NULL,
  `shift` varchar(60) NOT NULL,
  `persons` varchar(500) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`swsp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `duty_area`
--

CREATE TABLE IF NOT EXISTS `duty_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_code1` varchar(10) NOT NULL,
  `area_code2` varchar(10) NOT NULL,
  `area_description` varchar(60) NOT NULL,
  `area_remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`area_id`),
  UNIQUE KEY `area_description` (`area_description`),
  UNIQUE KEY `area_code1_2` (`area_code1`,`area_code2`),
  KEY `area_code1` (`area_code1`),
  KEY `area_code2` (`area_code2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `duty_area`
--

INSERT INTO `duty_area` (`area_id`, `area_code1`, `area_code2`, `area_description`, `area_remarks`) VALUES
(37, 'it', 'jaa', 'jet area at it', 'jet area airways'),
(38, 'jtt', 'jaa', 'jet area at jtt', 'jet area airways'),
(40, 'it', 'cs', 'chopper at it', 'chopper service'),
(41, 'jtt', 'cs', 'chopper at jtt', 'chopper service'),
(42, 'it', 'bs', 'boeing', 'boeing service\r\n'),
(44, 'it', 'as', 'aerodrome', 'aerodrome service'),
(45, 'dt', 'cs', 'chopper at dt', 'chopper service'),
(46, 'dt', 'hs', 'helicopter at dt', 'helicopter service'),
(51, 'ewud', 'rs', 'rocket at ewud', 'rocket service'),
(53, 'ewud', 'hs', 'helicopter at ewud', 'helicopter service'),
(56, 'ewud', 'cs', 'chopper at ewud', 'chopper service'),
(58, 'dt', 'op', 'op', 'op'),
(60, 'ff', 'fsfs', 'svs', 'sv');

-- --------------------------------------------------------

--
-- Table structure for table `duty_facilitation`
--

CREATE TABLE IF NOT EXISTS `duty_facilitation` (
  `facility_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility` varchar(200) NOT NULL,
  `facility_type` varchar(25) NOT NULL,
  `sub_facility_type` varchar(25) NOT NULL,
  PRIMARY KEY (`facility_id`),
  UNIQUE KEY `facility` (`facility`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `duty_location`
--

CREATE TABLE IF NOT EXISTS `duty_location` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_code` varchar(10) NOT NULL,
  `loc_description` varchar(50) NOT NULL,
  `loc_remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`loc_id`),
  UNIQUE KEY `loc_code` (`loc_code`),
  UNIQUE KEY `loc_description` (`loc_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `duty_location`
--

INSERT INTO `duty_location` (`loc_id`, `loc_code`, `loc_description`, `loc_remarks`) VALUES
(3, 'ff', 'ghln', 'ff'),
(9, 'dt', 'gh', 'jhbk'),
(10, 'ewud', 'hello', 'hebd'),
(11, 'it', 'international airport', 'for international flights'),
(12, 'jtt', 'tty', 'abra');

-- --------------------------------------------------------

--
-- Table structure for table `duty_point`
--

CREATE TABLE IF NOT EXISTS `duty_point` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `dp_code1` varchar(10) NOT NULL,
  `dp_code2` varchar(10) NOT NULL,
  `dp_code3` varchar(15) NOT NULL,
  `dp_description` varchar(75) NOT NULL,
  `no_shifts` int(11) NOT NULL,
  `shifts` varchar(20) NOT NULL,
  `dp_remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`dp_id`),
  UNIQUE KEY `dp_code3` (`dp_code3`),
  UNIQUE KEY `dp_code_1_2_3` (`dp_code1`,`dp_code2`,`dp_code3`),
  UNIQUE KEY `dp_description` (`dp_description`),
  KEY `dp_code1` (`dp_code1`),
  KEY `dp_code2` (`dp_code2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `duty_point`
--

INSERT INTO `duty_point` (`dp_id`, `dp_code1`, `dp_code2`, `dp_code3`, `dp_description`, `no_shifts`, `shifts`, `dp_remarks`) VALUES
(3, 'ewud', 'cs', 'xbc', 'flglg', 3, 'a,b,c', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('abhinav', 'abhinav'),
('girijesh', 'girijesh'),
('piyush', 'piyush'),
('ravish', 'ravish'),
('vikas', 'vikas');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cisf_gpl`
--
ALTER TABLE `cisf_gpl`
  ADD CONSTRAINT `cisf_gpl_ibfk_1` FOREIGN KEY (`dp_description`) REFERENCES `duty_point` (`dp_description`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cisf_gpl_ibfk_2` FOREIGN KEY (`desig_description`) REFERENCES `cisf_designation` (`desig_description`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cisf_sp`
--
ALTER TABLE `cisf_sp`
  ADD CONSTRAINT `cisf_sp_ibfk_1` FOREIGN KEY (`desig_description`) REFERENCES `cisf_designation` (`desig_description`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `duty_area`
--
ALTER TABLE `duty_area`
  ADD CONSTRAINT `duty_area_ibfk_1` FOREIGN KEY (`area_code1`) REFERENCES `duty_location` (`loc_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `duty_point`
--
ALTER TABLE `duty_point`
  ADD CONSTRAINT `duty_point_ibfk_1` FOREIGN KEY (`dp_code2`) REFERENCES `duty_area` (`area_code2`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `duty_point_ibfk_2` FOREIGN KEY (`dp_code1`) REFERENCES `duty_area` (`area_code1`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
