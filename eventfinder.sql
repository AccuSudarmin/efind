-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2015 at 03:32 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `amId` int(11) NOT NULL AUTO_INCREMENT,
  `amName` varchar(50) NOT NULL,
  `amPassword` varchar(50) NOT NULL,
  `amSalt` varchar(20) NOT NULL,
  PRIMARY KEY (`amId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`amId`, `amName`, `amPassword`, `amSalt`) VALUES
(1, 'admin', 'EXGKPpYr3W5CiM86aGu0gw5Nnb9oY2s1', 'hck5');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `arId` int(11) NOT NULL AUTO_INCREMENT,
  `arTitle` varchar(100) NOT NULL,
  `arContent` text NOT NULL,
  `arDate` date NOT NULL,
  `arPict` varchar(100) NOT NULL,
  `arURL` varchar(100) NOT NULL,
  `arAuthor` int(11) NOT NULL,
  PRIMARY KEY (`arId`),
  KEY `arAuthor` (`arAuthor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `logAdmin` int(11) NOT NULL,
  `logDate` date NOT NULL,
  `logMessage` text NOT NULL,
  PRIMARY KEY (`logId`),
  KEY `logAdmin` (`logAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`arAuthor`) REFERENCES `admin` (`amId`) ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`logAdmin`) REFERENCES `admin` (`amId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
