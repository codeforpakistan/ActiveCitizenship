-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 07:28 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pakcareers`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE IF NOT EXISTS `age_group` (
  `age_id` int(11) NOT NULL AUTO_INCREMENT,
  `age_title` varchar(255) NOT NULL,
  `age_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `careertrack`
--

CREATE TABLE IF NOT EXISTS `careertrack` (
  `careertrack_id` int(11) NOT NULL AUTO_INCREMENT,
  `careertrack_title` varchar(255) NOT NULL,
  `careertrack_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`careertrack_id`,`careertrack_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `city_status` tinyint(4) NOT NULL DEFAULT '1',
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_logo` varchar(255) NOT NULL,
  `country_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `education_title` varchar(255) NOT NULL,
  `education_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `experience_title` varchar(255) NOT NULL,
  `experience_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fieldofwork`
--

CREATE TABLE IF NOT EXISTS `fieldofwork` (
  `fieldofwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldofwork_title` varchar(255) NOT NULL,
  `fieldofwork_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fieldofwork_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobgroup`
--

CREATE TABLE IF NOT EXISTS `jobgroup` (
  `jobgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobgroup_title` varchar(255) NOT NULL,
  `jobgroup_status` tinyint(4) NOT NULL DEFAULT '1',
  `occupation_id` int(11) NOT NULL,
  PRIMARY KEY (`jobgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `jobsector_id` int(11) NOT NULL,
  `positions` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `agegroup_id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `experience_id` int(11) NOT NULL,
  `range_id` int(11) NOT NULL,
  `jobtype_id` int(11) NOT NULL,
  `posted_date` datetime NOT NULL,
  `last_date` datetime NOT NULL,
  `organization_id` int(11) NOT NULL,
  `where_to_apply` varchar(255) NOT NULL,
  `source_id` int(11) NOT NULL,
  `job_image` varchar(255) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `jobgroup_id` int(11) NOT NULL,
  `job_view` int(11) NOT NULL,
  `job_status` tinyint(4) NOT NULL DEFAULT '1',
  `occupationgroup_id` int(11) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobsector`
--

CREATE TABLE IF NOT EXISTS `jobsector` (
  `jobsector_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobsector_title` varchar(255) NOT NULL,
  `jobsector_logo` varchar(255) NOT NULL,
  `jobsector_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`jobsector_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobsource`
--

CREATE TABLE IF NOT EXISTS `jobsource` (
  `jobsource_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobsource_title` varchar(255) NOT NULL,
  `jobsource_logo` varchar(255) NOT NULL,
  `jobsource_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`jobsource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE IF NOT EXISTS `jobtype` (
  `jobtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobtype_title` varchar(255) NOT NULL,
  `jobtype_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`jobtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE IF NOT EXISTS `management` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`user_id`, `username`, `password`, `rank_id`, `last_login`, `last_ip`, `user_status`, `useremail`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2013-12-08 00:00:00', '111111', 1, 'syeduzairahmad@live.com');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `occupation_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation_title` varchar(255) NOT NULL,
  `occupation_othertitles` text NOT NULL,
  `occupationgroup_id` int(11) NOT NULL,
  `fieldofwork_id` int(11) NOT NULL,
  `careertrack_id` int(11) NOT NULL,
  `occupation_status` tinyint(4) NOT NULL DEFAULT '1',
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupationgroup`
--

CREATE TABLE IF NOT EXISTS `occupationgroup` (
  `occupationgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupationgroup_title` varchar(255) NOT NULL,
  `occupationgroup_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`occupationgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(255) NOT NULL,
  `organization_logo` varchar(255) NOT NULL,
  `organization_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salaryrange`
--

CREATE TABLE IF NOT EXISTS `salaryrange` (
  `range_id` int(11) NOT NULL AUTO_INCREMENT,
  `range_title` varchar(255) NOT NULL,
  `range_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`range_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE IF NOT EXISTS `study` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `course_levelofeducation` varchar(255) NOT NULL,
  `course_degreeprogram` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_institution` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `course_fieldofeducation` varchar(255) NOT NULL,
  `studytrack_id` int(11) NOT NULL,
  `course_fee` varchar(255) NOT NULL,
  `course_admissiondeadline` datetime NOT NULL,
  `course_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studytrack`
--

CREATE TABLE IF NOT EXISTS `studytrack` (
  `studytrack_id` int(11) NOT NULL AUTO_INCREMENT,
  `studytrack_title` varchar(255) NOT NULL,
  `studytrack_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`studytrack_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
