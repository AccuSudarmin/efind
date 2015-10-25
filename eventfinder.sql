-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2015 at 03:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `arTitle` varchar(100) DEFAULT NULL,
  `arContent` text,
  `arDateStart` date DEFAULT NULL,
  `arDateEnd` date DEFAULT NULL,
  `arPict` varchar(100) DEFAULT NULL,
  `arURL` varchar(100) DEFAULT NULL,
  `arAuthor` int(11) DEFAULT NULL,
  `arEventLocation` text NOT NULL,
  `arTicketPrice` text,
  `arBarcode` varchar(100) DEFAULT NULL,
  `arCategory` int(11) DEFAULT '1',
  `arContact` text,
  `arDatePost` varchar(11) DEFAULT NULL,
  `arStatus` enum('1','0') NOT NULL DEFAULT '1',
  `arSEODesc` text NOT NULL,
  `arOrganizer` varchar(100) NOT NULL,
  `arMetaDesc` text NOT NULL,
  PRIMARY KEY (`arId`),
  KEY `arAuthor` (`arAuthor`),
  KEY `arCategory` (`arCategory`),
  KEY `arPict` (`arPict`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`arId`, `arTitle`, `arContent`, `arDateStart`, `arDateEnd`, `arPict`, `arURL`, `arAuthor`, `arEventLocation`, `arTicketPrice`, `arBarcode`, `arCategory`, `arContact`, `arDatePost`, `arStatus`, `arSEODesc`, `arOrganizer`, `arMetaDesc`) VALUES
(42, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', '                                                                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                                                               ', '2014-10-15', '2015-10-15', 'http://localhost/eventfinder/public/userfiles/image/3.jpg', 'Lorem-ipsum-dolor-sit-amet,-consectetur-adipisicing-elit', 1, 'Makassar', 'Rp. 2000.000,-', 'http://eventfinder.co.id', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore', '2015-10-24', '1', '', 'Tiki', 'cobaki'),
(43, 'Sport Event Presented By Eventfinder', 'Sport Event Presented By Eventfinder&nbsp;Sport Event Presented By Eventfinder&nbsp;Sport Event Presented By Eventfinder', '2015-10-15', '2015-10-17', 'http://localhost/eventfinder/public/userfiles/image/photo3.png', 'Sport-Event-Presented-By-Eventfinder', 1, '', 'Rp. 200.000,-', 'http://eventfinder.co.id', 3, 'Phone: 0411 70707070\r\nEmail: contact@eventfinder.co.id', '2015-10-15', '1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `form_event`
--

CREATE TABLE IF NOT EXISTS `form_event` (
  `feId` int(11) NOT NULL AUTO_INCREMENT,
  `feTitle` varchar(100) DEFAULT NULL,
  `feContent` text,
  `feDateStart` varchar(20) DEFAULT NULL,
  `feDateEnd` varchar(20) DEFAULT NULL,
  `fePict` text,
  `feAuthor` varchar(50) DEFAULT NULL,
  `feTicketPrice` varchar(50) DEFAULT NULL,
  `feWebURL` varchar(100) DEFAULT NULL,
  `feCategory` int(11) DEFAULT NULL,
  `feContact` text,
  `feAdminContact` text,
  `feDatePost` varchar(20) DEFAULT NULL,
  `feApproval` int(11) DEFAULT NULL,
  PRIMARY KEY (`feId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hit_article`
--

CREATE TABLE IF NOT EXISTS `hit_article` (
  `haId` int(11) NOT NULL AUTO_INCREMENT,
  `haTotal` int(50) DEFAULT NULL,
  `haDate` varchar(50) DEFAULT NULL,
  `haArticleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`haId`)
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

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `mdId` int(11) NOT NULL,
  `mdLocation` varchar(100) NOT NULL,
  PRIMARY KEY (`mdId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mdId`, `mdLocation`) VALUES
(1, 'http://www.eventfinder.co.id/images/slide2_03.gif'),
(2, 'http://www.eventfinder.co.id/images/slide_01.gif'),
(3, 'http://www.eventfinder.co.id/images/slide_05.gif');

-- --------------------------------------------------------

--
-- Table structure for table `ref_category`
--

CREATE TABLE IF NOT EXISTS `ref_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_category`
--

INSERT INTO `ref_category` (`catId`, `catName`) VALUES
(1, 'Music'),
(2, 'Exhibition'),
(3, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `ref_map`
--

CREATE TABLE IF NOT EXISTS `ref_map` (
  `mapId` int(11) NOT NULL AUTO_INCREMENT,
  `mapLongitude` varchar(50) DEFAULT NULL,
  `mapLatitude` varchar(50) DEFAULT NULL,
  `mapZoom` int(50) DEFAULT NULL,
  `mapArticleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`mapId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ref_map`
--

INSERT INTO `ref_map` (`mapId`, `mapLongitude`, `mapLatitude`, `mapZoom`, `mapArticleId`) VALUES
(39, '119.42392891658528', '-5.13705695288282', 14, 42),
(40, '119.41178306937218', '-5.135069401600222', 9, 43);

-- --------------------------------------------------------

--
-- Table structure for table `ref_social_media`
--

CREATE TABLE IF NOT EXISTS `ref_social_media` (
  `smId` int(11) NOT NULL AUTO_INCREMENT,
  `smTwitter` varchar(50) DEFAULT NULL,
  `smFacebook` varchar(50) DEFAULT NULL,
  `smLine` varchar(50) DEFAULT NULL,
  `smPath` varchar(50) DEFAULT NULL,
  `smInstagram` varchar(50) DEFAULT NULL,
  `smArticleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`smId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `ref_social_media`
--

INSERT INTO `ref_social_media` (`smId`, `smTwitter`, `smFacebook`, `smLine`, `smPath`, `smInstagram`, `smArticleId`) VALUES
(39, '@twitter1', '@facebook1', '@line1', '@path1', '@instagram1', 42),
(40, '@eventfinderid', '@eventfinderid', '@eventfinderid', '@eventfinderid', '@eventfinderid', 43);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slId` int(11) NOT NULL AUTO_INCREMENT,
  `slTitle` text,
  `slDesc` text,
  `slPict` text,
  `slOrder` int(11) NOT NULL,
  PRIMARY KEY (`slId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slId`, `slTitle`, `slDesc`, `slPict`, `slOrder`) VALUES
(4, 'Slider 3', 'lorem ipsum dolar sir amet lorem ipsum dolar sir amet lorem ipsum dolar sir amet', 'http://localhost/eventfinder/public/userfiles/image\\photo3.png', 2),
(5, 'Slider baru', 'Cobaka ini slidernya', 'http://localhost/eventfinder/public/userfiles/slider\\3.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slider_home`
--

CREATE TABLE IF NOT EXISTS `slider_home` (
  `shId` int(11) NOT NULL AUTO_INCREMENT,
  `shTitle` varchar(100) DEFAULT NULL,
  `shDesc` text,
  `shPict` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`shId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider_home`
--

INSERT INTO `slider_home` (`shId`, `shTitle`, `shDesc`, `shPict`) VALUES
(1, 'Music Event', 'Music Event Concert1', 'http://localhost/eventfinder/public/userfiles/slider/3.jpg'),
(2, 'Exhibition Event', 'Exhibition event', 'http://localhost/eventfinder/public/userfiles/slider/photo3.png'),
(3, 'Sport Event', 'Sport Sport', 'http://localhost/eventfinder/public/userfiles/slider/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_today`
--

CREATE TABLE IF NOT EXISTS `visitor_today` (
  `vtdId` int(11) NOT NULL AUTO_INCREMENT,
  `vtdDate` varchar(50) NOT NULL,
  `vtdTotal` int(11) NOT NULL,
  PRIMARY KEY (`vtdId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_total`
--

CREATE TABLE IF NOT EXISTS `visitor_total` (
  `vtId` int(11) NOT NULL AUTO_INCREMENT,
  `vtDate` varchar(50) DEFAULT NULL,
  `vtTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`vtId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_profile`
--

CREATE TABLE IF NOT EXISTS `web_profile` (
  `webTitle` varchar(100) NOT NULL,
  `webDesc` text NOT NULL,
  `webAbout` text NOT NULL,
  `webEmail` varchar(50) NOT NULL,
  `webPhone` varchar(50) NOT NULL,
  `webTwitter` varchar(30) NOT NULL,
  `webFacebook` varchar(30) NOT NULL,
  `webLine` varchar(30) NOT NULL,
  `webPath` varchar(30) NOT NULL,
  `webInstagram` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_profile`
--

INSERT INTO `web_profile` (`webTitle`, `webDesc`, `webAbout`, `webEmail`, `webPhone`, `webTwitter`, `webFacebook`, `webLine`, `webPath`, `webInstagram`) VALUES
('Eventfinder', 'Event Finder', 'Event Finder', 'eventfinder@gmail.com', '04115858585', '@eventfinder_id', '@eventfinder_id', '@eventfinder_id', '@eventfinder_id', '@eventfinder_id');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`arAuthor`) REFERENCES `admin` (`amId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`arCategory`) REFERENCES `ref_category` (`catId`) ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`logAdmin`) REFERENCES `admin` (`amId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
