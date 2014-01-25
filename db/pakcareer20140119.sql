-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2014 at 06:53 PM
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
-- Table structure for table `age`
--

CREATE TABLE IF NOT EXISTS `age` (
  `age_id` int(11) NOT NULL AUTO_INCREMENT,
  `age_title` varchar(255) NOT NULL,
  `age_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`age_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`age_id`, `age_title`, `age_status`) VALUES
(1, '12-201', 1),
(2, '20 -25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_title` varchar(255) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `career_worksummary` text NOT NULL,
  `career_relatedenvironment` varchar(255) NOT NULL,
  `career_duties` text NOT NULL,
  `career_context` text NOT NULL,
  `career_knowledgeRequired` text NOT NULL,
  `career_skillsRequired` text NOT NULL,
  `career_abilitiesrequired` text NOT NULL,
  `occupationgroup_id` int(11) NOT NULL,
  `career_photo` varchar(255) NOT NULL,
  `career_video` varchar(255) NOT NULL,
  `career_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`career_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `career_title`, `occupation_id`, `career_worksummary`, `career_relatedenvironment`, `career_duties`, `career_context`, `career_knowledgeRequired`, `career_skillsRequired`, `career_abilitiesrequired`, `occupationgroup_id`, `career_photo`, `career_video`, `career_status`) VALUES
(1, 'Modified Title', 5, 'Modified Summary', 'Modified Env', 'duties', 'ontext', 'MOdified', 'fdsfs', 'fdsf                            ', 2, '', 'fdsfds', 1),
(2, '', 1, 'Work summary', 'Environment', 'duties', 'tes', 'tes', 'te', 'test                            ', 2, 'Koala.jpg', 'http://', 1),
(3, '', 1, 'Work summary', 'Environment', 'duties', 'tes', 'tes', 'te', 'test              ', 2, 'Desert6.jpg', 'http://', 1);

-- --------------------------------------------------------

--
-- Table structure for table `careertrack`
--

CREATE TABLE IF NOT EXISTS `careertrack` (
  `careertrack_id` int(11) NOT NULL AUTO_INCREMENT,
  `careertrack_title` varchar(255) NOT NULL,
  `careertrack_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`careertrack_id`,`careertrack_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `careertrack`
--

INSERT INTO `careertrack` (`careertrack_id`, `careertrack_title`, `careertrack_status`) VALUES
(1, 'XYZ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `career_careertrack`
--

CREATE TABLE IF NOT EXISTS `career_careertrack` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `careertrack_id` int(11) NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `career_fieldofwork`
--

CREATE TABLE IF NOT EXISTS `career_fieldofwork` (
  `cf_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `fieldofwork_id` int(11) NOT NULL,
  PRIMARY KEY (`cf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `career_occupations`
--

CREATE TABLE IF NOT EXISTS `career_occupations` (
  `career_occupation_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  PRIMARY KEY (`career_occupation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `career_occupations`
--

INSERT INTO `career_occupations` (`career_occupation_id`, `career_id`, `occupation_id`) VALUES
(1, 1, 1),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `career_studytrack`
--

CREATE TABLE IF NOT EXISTS `career_studytrack` (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `studytrack_id` int(11) NOT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_status`, `country_id`) VALUES
(4, 'Lahore', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_logo` varchar(255) NOT NULL,
  `country_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`, `country_logo`, `country_status`) VALUES
(1, 'Pakistan', 'PK', 'Desert4.jpg', 1),
(2, 'India', 'IN', 'Penguins.jpg', 1),
(3, 'Pakistan', 'Pk', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_levelofeducation`, `course_degreeprogram`, `course_duration`, `course_institution`, `city_id`, `course_fieldofeducation`, `studytrack_id`, `course_fee`, `course_admissiondeadline`, `course_status`) VALUES
(1, 'fjdsklajflkjkl', 'jlk', 'jlk', 'jlkj', 'lkj', 4, 'lkj', 1, 'jhfkjh', '2013-01-01 12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `education_title` varchar(255) NOT NULL,
  `education_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `education_title`, `education_status`) VALUES
(1, 'B.A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `experience_title` varchar(255) NOT NULL,
  `experience_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `experience_title`, `experience_status`) VALUES
(1, '1 Year', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fieldofwork`
--

CREATE TABLE IF NOT EXISTS `fieldofwork` (
  `fieldofwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldofwork_title` varchar(255) NOT NULL,
  `fieldofwork_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fieldofwork_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fieldofwork`
--

INSERT INTO `fieldofwork` (`fieldofwork_id`, `fieldofwork_title`, `fieldofwork_status`) VALUES
(1, 'Study1', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobgroup`
--

INSERT INTO `jobgroup` (`jobgroup_id`, `jobgroup_title`, `jobgroup_status`, `occupation_id`) VALUES
(1, 'Title of my1', 1, 0);

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
  `country_id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `agegroup_id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `experience_id` int(11) NOT NULL,
  `salaryrange_id` int(11) NOT NULL,
  `jobtype_id` int(11) NOT NULL,
  `posted_date` datetime NOT NULL,
  `last_date` datetime NOT NULL,
  `organization_id` int(11) NOT NULL,
  `where_to_apply` varchar(255) NOT NULL,
  `jobsource_id` int(11) NOT NULL,
  `job_image` varchar(255) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `jobgroup_id` int(11) NOT NULL,
  `job_view` int(11) NOT NULL,
  `jobs_status` tinyint(4) NOT NULL DEFAULT '1',
  `occupationgroup_id` int(11) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `jobsector_id`, `positions`, `city_id`, `country_id`, `gender`, `agegroup_id`, `education_id`, `qualification`, `experience_id`, `salaryrange_id`, `jobtype_id`, `posted_date`, `last_date`, `organization_id`, `where_to_apply`, `jobsource_id`, `job_image`, `occupation_id`, `jobgroup_id`, `job_view`, `jobs_status`, `occupationgroup_id`) VALUES
(1, 'Test', 1, 32, 4, 2, 'Female', 1, 1, 34, 1, 1, 1, '2013-01-01 12:00:00', '2013-01-01 12:00:00', 1, 'kahroie', 1, '', 5, 1, 0, 0, 2),
(2, 'Title Modified', 1, 0, 4, 2, 'Female', 1, 1, 43, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '432', 0, '', 5, 1, 0, 1, 2),
(3, 'Title', 1, 0, 4, 2, 'Female', 1, 1, 43, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '432', 1, '', 5, 1, 0, 1, 2),
(4, 'fdsaf', 1, 0, 4, 2, 'Female', 1, 1, 43, 1, 1, 1, '2013-01-01 12:00:00', '2013-01-01 12:00:00', 1, '432', 1, '', 5, 1, 0, 1, 2),
(5, 'Title', 1, 3, 4, 2, 'Male', 1, 1, 0, 1, 1, 1, '2014-01-01 12:00:00', '2014-01-13 12:00:00', 1, 'lahore', 1, '', 1, 1, 0, 1, 1),
(6, 'Jobsn2', 1, 3, 4, 2, 'Male', 1, 1, 0, 0, 0, 0, '2014-01-08 12:00:00', '2014-01-15 12:00:00', 1, 'avv', 1, '1496619_10202590788311692_261876646_n.jpg', 1, 1, 0, 1, 2),
(7, 'Jobs', 1, 3, 4, 2, 'Male', 1, 1, 0, 0, 0, 0, '2014-01-08 12:00:00', '2014-01-15 12:00:00', 1, 'avv', 1, 'Hydrangeas2.jpg', 1, 1, 0, 1, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobsector`
--

INSERT INTO `jobsector` (`jobsector_id`, `jobsector_title`, `jobsector_logo`, `jobsector_status`) VALUES
(1, 'Test', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobsource`
--

INSERT INTO `jobsource` (`jobsource_id`, `jobsource_title`, `jobsource_logo`, `jobsource_status`) VALUES
(1, 'Jang', 'Hydrangeas.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_careertrack`
--

CREATE TABLE IF NOT EXISTS `jobs_careertrack` (
  `jc_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `careertrack_id` int(11) NOT NULL,
  PRIMARY KEY (`jc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jobs_careertrack`
--

INSERT INTO `jobs_careertrack` (`jc_id`, `job_id`, `careertrack_id`) VALUES
(3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_fieldofwork`
--

CREATE TABLE IF NOT EXISTS `jobs_fieldofwork` (
  `jf_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `fieldofwork_id` int(11) NOT NULL,
  PRIMARY KEY (`jf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jobs_fieldofwork`
--

INSERT INTO `jobs_fieldofwork` (`jf_id`, `job_id`, `fieldofwork_id`) VALUES
(1, 1, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE IF NOT EXISTS `jobtype` (
  `jobtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobtype_title` varchar(255) NOT NULL,
  `jobtype_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`jobtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`jobtype_id`, `jobtype_title`, `jobtype_status`) VALUES
(1, 'Test', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `occupation_video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occupation_id`, `occupation_title`, `occupation_othertitles`, `occupationgroup_id`, `fieldofwork_id`, `careertrack_id`, `occupation_status`, `occupation_video`) VALUES
(1, 'Title of occupation', 'Tell  ', 2, 1, 1, 1, 'http://abc.com'),
(2, 'Title12', 'Tell   12', 2, 1, 1, 1, 'http://abc.com'),
(3, 'Title122', 'Tell   ', 2, 1, 1, 1, 'http://abc.com'),
(4, 'Title122', 'Tell   ', 2, 1, 1, 1, 'http://abc.com'),
(5, 'Test', 'test ', 2, 1, 1, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `occupationgroup`
--

CREATE TABLE IF NOT EXISTS `occupationgroup` (
  `occupationgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupationgroup_title` varchar(255) NOT NULL,
  `occupationgroup_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`occupationgroup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `occupationgroup`
--

INSERT INTO `occupationgroup` (`occupationgroup_id`, `occupationgroup_title`, `occupationgroup_status`) VALUES
(1, 'ABC1', 1),
(2, 'ABC', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`, `organization_logo`, `organization_status`) VALUES
(1, 'Honda1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salaryrange`
--

CREATE TABLE IF NOT EXISTS `salaryrange` (
  `salaryrange_id` int(11) NOT NULL AUTO_INCREMENT,
  `salaryrange_title` varchar(255) NOT NULL,
  `salaryrange_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`salaryrange_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salaryrange`
--

INSERT INTO `salaryrange` (`salaryrange_id`, `salaryrange_title`, `salaryrange_status`) VALUES
(1, '10000-20000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studytrack`
--

CREATE TABLE IF NOT EXISTS `studytrack` (
  `studytrack_id` int(11) NOT NULL AUTO_INCREMENT,
  `studytrack_title` varchar(255) NOT NULL,
  `studytrack_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`studytrack_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `studytrack`
--

INSERT INTO `studytrack` (`studytrack_id`, `studytrack_title`, `studytrack_status`) VALUES
(1, 'Test', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
