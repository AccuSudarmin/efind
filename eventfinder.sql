-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 08:35 AM
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
  `arURLWebsite` varchar(100) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`arId`, `arTitle`, `arContent`, `arDateStart`, `arDateEnd`, `arPict`, `arURL`, `arAuthor`, `arEventLocation`, `arTicketPrice`, `arBarcode`, `arURLWebsite`, `arCategory`, `arContact`, `arDatePost`, `arStatus`, `arSEODesc`, `arOrganizer`, `arMetaDesc`) VALUES
(1, 'Joanna Newsom Australian Tour', '<p style="box-sizing: border-box; margin: 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">In the wake of her fourth studio album Divers, released today, captivating songwriter-harpist&nbsp;<a title="Joanna Newsom" href="http://www.eventfinda.com.au/artist/joanna-newsom" style="box-sizing: border-box; color: rgb(0, 119, 204); text-decoration: none; outline: none !important; background-color: transparent;">Joanna Newsom</a>&nbsp;announces her return to Australia in January 2016, performing in&nbsp;<a title="Joanna Newsom Melbourne" href="http://www.eventfinda.com.au/2016/joanna-newsom-australian-tour/melbourne/southbank" style="box-sizing: border-box; color: rgb(0, 119, 204); text-decoration: none; outline: none !important; background-color: transparent;">Melbourne</a>,&nbsp;<a title="Joanna Newsom Sydney" href="http://www.eventfinda.com.au/2016/joanna-newsom-australian-tour/sydney/circular-quay" style="box-sizing: border-box; color: rgb(0, 119, 204); text-decoration: none; outline: none !important; background-color: transparent;">Sydney</a>&nbsp;and<a title="Joanna Newsom Brisbane" href="http://www.eventfinda.com.au/2016/joanna-newsom-australian-tour/brisbane" style="box-sizing: border-box; color: rgb(0, 119, 204); text-decoration: none; outline: none !important; background-color: transparent;">Brisbane</a>.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Taking in the East Coast on her fifth Australian visit, Joanna will grace the stages of Art Centre Melbourne’s Hamer Hall on 19 January, followed by a Concert Hall appearance at the Sydney Opera House on 21 January as part of the already announced Sydney Festival program, and Queensland Performing Arts Centre (QPAC) on 23 January.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Audiences can splash into the technicoloured depths of Joanna Newsom’s Divers. A clear sightline now fully reveals the limitlessness of this momentous album, and the tectonic plate shift each new announcement brings! With two songs off Divers already officially “dropped” – first ‘Sapokanikan’, presented with the Paul Thomas Anderson-directed video, and second, ‘Leaving The City’, accompanied by the beautiful imagery of visual artist Kim Keever.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">“Divers is not a puzzle to crack, but a dialog that generously articulates the intimate chasm of loss, the way it''s both irrational and very real” – Pitchfork ‘Best New Music’<br style="box-sizing: border-box;"><br style="box-sizing: border-box;">“Her style blends the luminous arpeggios of the classical- and folk-harp traditions with African syncopation — crisp, snappy, interlocking rhythms.” – The New York Times<br style="box-sizing: border-box;"><br style="box-sizing: border-box;">“Lyrically, ‘Sapokanikan’ is bookish, but its melodies are more than infectious enough to leave it ringing in your head long after its five minute run time has passed.” – NME On Repeat</p>', '2016-01-19', '2016-01-23', 'http://localhost/eventfinder/public/userfiles/image/426841-1082-7.jpg', 'Joanna-Newsom-Australian-Tour', 1, 'Art Centre Melbourne’s Hamer Hall', 'Rp. 200.000,-', 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://www.eventfinda.com.au/tour/2015/joa', 'http://www.eventfinda.com.au/tour/2015/joanna-newsom-australian-tour', 1, '', '2015-11-1', '1', '', 'Joanna Newsom', 'In the wake of her fourth studio album Divers, released today, captivating songwriter-harpist Joanna Newsom announces her return to Australia in January 2016, performing in Melbourne, Sydney and Brisbane.'),
(2, 'Puffing Billy Steam Train Day Tour', '                        <p style="box-sizing: border-box; margin: 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Coastal View Day Tours operate all year round specialising in small group day tours, so you can relax and enjoy a more personalised experience. We cover most of Victoria’s sightseeing destinations, from Phillip Island to Wilson''s Prom, from Yarra Valley to Mornington Peninsula, and from Dandenong Ranges to Gippsland and to Great Ocean Road. We place a strong emphasis on including the most beautiful natural Australian surroundings into our tours. Our team has the highest commitment to provide a quality friendly service. Do you want a relaxed day trip, in which you can indulge your senses? Then choose Coastal View Day Tours, and you shall be rewarded with one of the best tour-services there are.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Puffing Billy Steam Train Day Tour <br style="box-sizing: border-box;">Highlights: <br style="box-sizing: border-box;">Ride on Australia’s famous steam train Puffing Billy from Belgrave to Emerald. <br style="box-sizing: border-box;">Journey through the breath taking Dandenong Mountains. <br style="box-sizing: border-box;">Experience some of Australia most beautiful natural scenery and enormously tall trees. <br style="box-sizing: border-box;">Indulge in a selection of award winning Aussie Meat Pies, Gourmet Pies, and Pastries, all freshly prepared and baked on the premises @ Pie in the Sky. <br style="box-sizing: border-box;">Have free time to wonder and explore fascinating stores in the charming village of Olinda. <br style="box-sizing: border-box;">Olinda was once the home of accomplished Australian Artist Arthur Streeton. Streeton''s works appear in many major Australian galleries and museums, including the Australian War Memorial, and National Gallery of Victoria. <br style="box-sizing: border-box;">Stop by SkyHigh Mount Dandenong to admire the panoramic views over the Dandenong’s and Melbourne</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Tour Includes: <br style="box-sizing: border-box;">- Puffing Billy Train Fare <br style="box-sizing: border-box;">- Lunch <br style="box-sizing: border-box;">-Pick up and drop off <br style="box-sizing: border-box;">- Air conditioned couch travel <br style="box-sizing: border-box;">- A qualified and experienced driver <br style="box-sizing: border-box;">- On-board seatbelts</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">What to Bring: <br style="box-sizing: border-box;">- Sunglasses, sunscreen & hat <br style="box-sizing: border-box;">- Water bottle <br style="box-sizing: border-box;">- Comfortable clothing <br style="box-sizing: border-box;">- Comfortable non-slip walking shoes</p>                     ', '2016-03-26', '2016-03-26', 'http://localhost/eventfinder/public/userfiles/image/426802-177320-34.jpg', 'Puffing-Billy-Steam-Train-Day-Tour', 1, 'Berwick Train Station, Melbourne', 'General Admission $115.00', 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://www.eventfinda.com.au/2016/puffing-', 'http://www.eventfinda.com.au/2016/puffing-billy-steam-train-day-tour/melbourne/berwick', 2, '', '2015-11-1', '1', '', 'coastal view day tours', 'Coastal View Day Tours operate all year round specialising in small group day tours, so you can relax and enjoy a more personalised experience. We cover most of Victoria’s sightseeing destinations, from Phillip Island to Wilson''s Prom, from Yarra Valley to Mornington Peninsula, and from Dandenong Ranges to Gippsland and to Great Ocean Road.'),
(3, 'Fremantle Festival - Street Parade & Festival Closing Party', '<p style="box-sizing: border-box; margin: 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Street Parade and Closing Dance PartyStreet Parade. This decades-old Fremantle tradition sees pedestrians reclaiming the streets as floats of every size, shape and colour make their way through the heart of the city. Grab a stick of chalk and express yourself on the road in a mass art event at 3pm. Parade kicks off at 4pm. Closing Dance PartyJoin us at the Town Hall for the Festival Closing Party.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Music, dance and celebration from 6pm!</p>', '2015-11-04', '2015-11-01', 'http://localhost/eventfinder/public/userfiles/image/416827-171071-34.jpg', 'Fremantle-Festival-Street-Parade-Festival-Closing-Party', 1, 'Fremantle Town Hall, 8 William Street, Perth', '', 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://www.eventfinda.com.au/link/http%253', 'http://www.eventfinda.com.au/link/http%253A%252F%252Fwww.fremantlestory.com.au%252Fyour-story%252Fev', 2, '', '2015-11-1', '1', '', 'gretacarlshausen', 'Street Parade and Closing Dance PartyStreet Parade. This decades-old Fremantle tradition sees pedestrians reclaiming the streets as floats of every size, shape and colour make their way through the heart of the city. '),
(4, 'All Ford Day Car Show', '                                                                                                <p style="box-sizing: border-box; margin: 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">The largest single marque Car Show in W.A. has moved to a new home for 2015 - Kingsway Football Oval with the Kingsway Sporting Complex in Madeley.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Great value family day out with proceeds to charity.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Check out our website - www.afd.asn.au or our Facebook Page - www.facebook.com/allfordday for more information and announcements about our 2015 charities.</p>                                                                                    ', '2015-11-03', '2015-11-01', 'http://localhost/eventfinder/public/userfiles/image/406335-163930-34.jpg', 'All-Ford-Day-Car-Show', 1, 'Kingsway Football Club, Skeit Road, Perth', 'Adult: $10.00<br />\r\nChildren: $5.00<br />\r\nFamily (2 + 2): $20.00<br />\r\nDoor Sales Only', 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=www.afd.asn.au &choe=UTF-8', 'www.afd.asn.au ', 2, 'Check out our website - www.afd.asn.au or our Facebook Page - www.facebook.com/allfordday for more information and announcements about our 2015 charities.', '2015-11-1', '1', '', 'gtxb', 'The largest single marque Car Show in W.A. has moved to a new home for 2015 - Kingsway Football Oval with the Kingsway Sporting Complex in Madeley.');

-- --------------------------------------------------------

--
-- Table structure for table `events_tags`
--

CREATE TABLE IF NOT EXISTS `events_tags` (
  `etId` int(11) NOT NULL AUTO_INCREMENT,
  `etName` varchar(100) NOT NULL,
  `etArticleId` int(11) NOT NULL,
  PRIMARY KEY (`etId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `events_tags`
--

INSERT INTO `events_tags` (`etId`, `etName`, `etArticleId`) VALUES
(1, 'joanna', 1),
(2, 'music', 1),
(3, 'Australia', 1),
(4, 'echibition', 2),
(5, 'train', 2),
(6, 'berwick', 2),
(7, 'parade', 3),
(8, 'festival', 3),
(9, 'closing party', 3),
(10, 'femantle', 3),
(11, 'exhibition', 3),
(12, 'exhibition', 4),
(13, 'ford', 4),
(14, 'car day', 4),
(15, 'perth', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hit_article`
--

CREATE TABLE IF NOT EXISTS `hit_article` (
  `haDate` varchar(10) NOT NULL,
  `haArticleId` int(11) NOT NULL DEFAULT '0',
  `haTotal` int(50) DEFAULT NULL,
  PRIMARY KEY (`haDate`,`haArticleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hit_article`
--

INSERT INTO `hit_article` (`haDate`, `haArticleId`, `haTotal`) VALUES
('2015-11-01', 1, 2),
('2015-11-01', 3, 1),
('2015-11-01', 4, 2),
('2015-11-02', 3, 1),
('2015-11-02', 4, 4),
('2015-11-03', 3, 1),
('2015-11-03', 4, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `ref_map`
--

INSERT INTO `ref_map` (`mapId`, `mapLongitude`, `mapLatitude`, `mapZoom`, `mapArticleId`) VALUES
(53, '151.20699020000006', '-33.8674869', 16, 50),
(54, '151.20699020000006', '-33.8674869', 16, 51),
(55, '144.96783400000004', '-37.820502', 17, 1),
(56, '0.1660500000000411', '50.84037', 14, 2),
(57, '115.74817200000007', '-32.054291', 16, 3),
(58, '115.83729949999997', '-31.8148089', 15, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `ref_social_media`
--

INSERT INTO `ref_social_media` (`smId`, `smTwitter`, `smFacebook`, `smLine`, `smPath`, `smInstagram`, `smArticleId`) VALUES
(47, 't', 'f', 'l', 'p', 'i', 50),
(48, 't', 'f', 'l', 'p', 'i', 51),
(49, '@joanna', '@joanna', '@joanna', '@joanna', '@joanna', 1),
(50, '', '', '', '', '', 2),
(51, '', '', '', '', '', 3),
(52, '', '@allfordday', '', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slId` int(11) NOT NULL AUTO_INCREMENT,
  `slTitle` text,
  `slDesc` text,
  `slPict` text,
  `slURL` varchar(100) NOT NULL,
  `slOrder` int(11) NOT NULL,
  PRIMARY KEY (`slId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slId`, `slTitle`, `slDesc`, `slPict`, `slURL`, `slOrder`) VALUES
(2, 'Joanna Newsom Australian Tour', 'In the wake of her fourth studio album Divers, released today, captivating songwriter-harpist Joanna Newsom announces her return to Australia in January 2016, performing in Melbourne, Sydney andBrisbane.', 'http://localhost/eventfinder/public/userfiles/image/426841-1082-7.jpg', 'http://localhost/eventfinder/music/Joanna-Newsom-Australian-Tour', 1),
(3, 'Puffing Billy Steam Train Day Tour', 'Coastal View Day Tours operate all year round specialising in small group day tours, so you can relax and enjoy a more personalised experience. ', 'http://localhost/eventfinder/public/userfiles/image/426802-177320-34.jpg', '', 2);

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
-- Table structure for table `submission_event`
--

CREATE TABLE IF NOT EXISTS `submission_event` (
  `seId` int(11) NOT NULL AUTO_INCREMENT,
  `seTitle` varchar(100) DEFAULT NULL,
  `seContent` text,
  `seDateStart` varchar(20) DEFAULT NULL,
  `seDateEnd` varchar(20) DEFAULT NULL,
  `sePict` text,
  `seOrganizer` varchar(50) DEFAULT NULL,
  `seTicketPrice` text,
  `seWebURL` varchar(100) DEFAULT NULL,
  `seCategory` int(11) DEFAULT NULL,
  `seContact` text,
  `seEventLocation` text NOT NULL,
  `seAdminContact` text,
  `seDatePost` varchar(20) DEFAULT NULL,
  `seApproval` enum('0','1') NOT NULL DEFAULT '0',
  `seTwitter` varchar(50) NOT NULL,
  `seFacebook` varchar(50) NOT NULL,
  `seLine` varchar(50) NOT NULL,
  `sePath` varchar(50) NOT NULL,
  `seInstagram` varchar(50) NOT NULL,
  PRIMARY KEY (`seId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `submission_event`
--

INSERT INTO `submission_event` (`seId`, `seTitle`, `seContent`, `seDateStart`, `seDateEnd`, `sePict`, `seOrganizer`, `seTicketPrice`, `seWebURL`, `seCategory`, `seContact`, `seEventLocation`, `seAdminContact`, `seDatePost`, `seApproval`, `seTwitter`, `seFacebook`, `seLine`, `sePath`, `seInstagram`) VALUES
(1, 'All Ford Day Car Show', '<p style="box-sizing: border-box; margin: 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">The largest single marque Car Show in W.A. has moved to a new home for 2015 - Kingsway Football Oval with the Kingsway Sporting Complex in Madeley.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Great value family day out with proceeds to charity.</p><p style="box-sizing: border-box; margin: 20px 0px 0px; font-size: 15px; line-height: 1.6; word-wrap: break-word; color: rgb(85, 85, 85); font-family: ''Open Sans'', Helvetica, Arial, sans-serif; background-color: rgb(255, 255, 255);">Check out our website - www.afd.asn.au or our Facebook Page - www.facebook.com/allfordday for more information and announcements about our 2015 charities.</p>', '2015-11-01', '2015-11-01', NULL, 'gtxb', 'Adult: $10.00\r\nChildren: $5.00\r\nFamily (2 + 2): $20.00\r\nDoor Sales Only', 'www.afd.asn.au ', 2, 'Check out our website - www.afd.asn.au or our Facebook Page - www.facebook.com/allfordday for more information and announcements about our 2015 charities.', 'Kingsway Football Club, Skeit Road, Perth', 'gtxb@gmail.com', NULL, '1', '', '@allfordday', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_today`
--

CREATE TABLE IF NOT EXISTS `visitor_today` (
  `ctdId` int(11) NOT NULL AUTO_INCREMENT,
  `vtdIp` varchar(50) NOT NULL,
  `vtdDate` varchar(10) NOT NULL,
  PRIMARY KEY (`ctdId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `visitor_today`
--

INSERT INTO `visitor_today` (`ctdId`, `vtdIp`, `vtdDate`) VALUES
(5, '128.8.8.7', '2015-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_total`
--

CREATE TABLE IF NOT EXISTS `visitor_total` (
  `vtDate` varchar(50) NOT NULL DEFAULT '',
  `vtTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`vtDate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_total`
--

INSERT INTO `visitor_total` (`vtDate`, `vtTotal`) VALUES
('2015-11-02', 1),
('2015-11-03', 3),
('2015-11-04', 2);

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
('Eventfinder Indonesia', 'Your one and true guide to upcoming events, concerts, exhibitions, parties & more! Find out best events, activities and things to do in town.', 'Your one and true guide to upcoming events, concerts, exhibitions, parties & more! Find out best events, activities and things to do in town.', 'eventfinder@gmail.com', '04115858585', 'eventfinder_id', 'eventfinder_id', 'eventfinder_id', 'eventfinder_id', 'eventfinder_id');

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
