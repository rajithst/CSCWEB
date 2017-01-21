-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 05:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csc`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `email`, `password`, `name`, `role`, `profile`) VALUES
(1, 'admin@csc.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'L.P Jayasinghe', 'Administrator', '../public/dist/img/profile/c280829b27.jpg'),
(2, 'rajith@gmail.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'Rajith', 'Administrator', '../public/dist/img/profile/11f642ec08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentsubmissions`
--

CREATE TABLE IF NOT EXISTS `assignmentsubmissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subid` varchar(20) DEFAULT NULL,
  `assid` int(11) DEFAULT NULL,
  `studentname` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `date` text,
  `path` varchar(255) DEFAULT NULL,
  `attempt` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent` int(11) NOT NULL DEFAULT '0',
  `rcvd` int(11) NOT NULL DEFAULT '0',
  `sentmsg` varchar(1000) NOT NULL DEFAULT '0',
  `rcvdmsg` varchar(1000) NOT NULL DEFAULT '0',
  `time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sent`, `rcvd`, `sentmsg`, `rcvdmsg`, `time`) VALUES
(1, 101, 1, '0', 'recieved - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-12-11 03:05:06'),
(2, 1, 101, 'sent - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0', '2016-12-11 05:00:00'),
(6, 1, 101, 'we', '0', '1483352598'),
(7, 1, 101, 'we', '0', '1483352598'),
(8, 1, 101, 'weeed', '0', '1483352606'),
(9, 1, 101, 'weeed', '0', '1483352607');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseid` varchar(255) NOT NULL,
  `coursename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `coursename`) VALUES
('csc01', 'General'),
('csc02', 'Programming'),
('csc03', 'System Administration'),
('csc04', 'e-Learning'),
('csc05', 'Graphic Designing'),
('csc06', 'Web Design & Development'),
('csc07', 'Game Development'),
('csc08', 'Embedded System Development'),
('csc09', 'Red Hat Training Courses'),
('csc10', 'Mobile Application Development'),
('csc11', 'Project Management');

-- --------------------------------------------------------

--
-- Table structure for table `course_income`
--

CREATE TABLE IF NOT EXISTS `course_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_NIC` varchar(15) NOT NULL,
  `coursename` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `person_rec` varchar(255) NOT NULL,
  `refference_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `course_income`
--

INSERT INTO `course_income` (`id`, `student_NIC`, `coursename`, `payment_method`, `amount`, `received_date`, `person_rec`, `refference_no`) VALUES
(1, '941170463V', 'csc02/1', 'Cash', 25499, '2017-01-09', 'co ordinator', '2617'),
(2, '941258564V', 'csc03/1', 'Cash', 25499, '2017-01-05', 'co ordinator', '1731'),
(3, '941258564V', 'csc03/1', 'Cash', 25499, '2017-01-05', 'co ordinator', '1731'),
(4, '941258564V', 'csc05/1', 'Cash', 29499, '2017-01-08', 'co ordinator', '731426'),
(5, '941258564V', 'csc02/1', 'Cheque', 10000, '2017-01-09', 'co ordinator', '9999'),
(6, '', '', '', 0, '1970-01-01', '', ''),
(7, '', '', '', 0, '1970-01-01', '', ''),
(8, '', '', '', 0, '1970-01-01', '', ''),
(9, '941258564V', 'csc02/1', 'Cash', 10000, '2017-01-08', 'co ordinator', '9494'),
(10, '941221328V', 'csc02/4', 'cash', 19999, '2016-01-10', 'staff', '1011'),
(11, '941221327V', '', 'Dnation', 9950, '2017-01-06', 'staff', '2631'),
(12, '941221327V', '1', 'Advertising', 10000, '2017-01-31', 'co ordinator', '2631'),
(13, '941221327V', '1', 'Advertising', 25499, '2017-01-26', 'staff', '1726'),
(14, '941221324V', '3', 'Dnation', 19850, '2017-01-10', 'staff', '1010'),
(15, '941221324V', '3', 'Dnation', 19850, '2017-01-10', 'staff', '1010'),
(16, '941221324V', '3', 'Dnation', 19850, '2017-01-10', 'staff', '1010'),
(17, '941221324V', '3', 'Dnation', 19850, '2017-01-10', 'staff', '1010'),
(18, '941234567V', 'csc02/1', 'Cheque', 0, '2017-01-02', 'rajith Thennakoon', '1254'),
(19, '941234567V', 'csc02/1', 'Cheque', 20000, '2017-01-17', 'rajith Thennakoon', '12547'),
(20, '941258564V', 'csc02/1', 'Dnation', 0, '2017-01-11', 'rajith Thennakoon', '1999'),
(21, '941258564V', 'csc02/1', '', 0, '2017-01-19', 'Shehan Weerakkody', '999999'),
(22, '941234567V', 'csc02/1', 'Advertising', 20000, '2017-01-24', 'New User Last Name', '8888'),
(23, '941221327V', 'csc02/1', 'Cash', 20000, '2017-01-13', 'rajith Thennakoon', '462631'),
(24, '941221327V', 'csc02/1', 'Cheque', 20000, '2017-01-10', 'Shehan Weerakkody', '0000'),
(25, '941221327V', 'csc02/1', 'Cheque', 20000, '2017-01-10', 'Shehan Weerakkody', '0000'),
(26, '941221327V', 'csc02/1', 'Cheque', 20000, '2017-01-10', 'Shehan Weerakkody', '0000'),
(27, '941221327V', 'csc02/1', 'Cash', 20000, '2017-01-03', 'rajith Thennakoon', '7070'),
(28, '941221326V', 'csc02/4', 'Cheque', 35000, '2017-01-01', 'Shehan Weerakkody', '0303'),
(29, '941170463V', 'csc02/4', 'Cheque', 35000, '2017-01-02', 'rajith Thennakoon', '3333');

-- --------------------------------------------------------

--
-- Table structure for table `cus_course_income`
--

CREATE TABLE IF NOT EXISTS `cus_course_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `requesting_party` varchar(255) NOT NULL,
  `received_date` date NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cus_course_income`
--

INSERT INTO `cus_course_income` (`id`, `course_name`, `requesting_party`, `received_date`, `received_by`, `amount`) VALUES
(1, 'new co', 'company', '2016-11-09', 'me', 15000),
(2, 'new cos', 'companys', '2016-11-21', 'mes', 111111),
(3, 'new course', 'sLC', '2016-11-02', 'staff', 19500),
(4, 'NEW course', 'COMPANY', '2017-01-03', 'staff', 9999),
(5, 'new course', 'COMPANY', '2017-01-17', 'rajith Thennakoon', 16000);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sdate` date NOT NULL,
  `enddate` date NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `student` int(2) NOT NULL,
  `coursec` int(2) NOT NULL,
  `cscc` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `sdate`, `enddate`, `starttime`, `endtime`, `student`, `coursec`, `cscc`) VALUES
(33, 'Asignment', '2017-01-27', '2017-01-27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `give_to` varchar(255) NOT NULL,
  `give_by` varchar(255) NOT NULL,
  `given_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_type`, `description`, `give_to`, `give_by`, `given_date`, `amount`) VALUES
(1, ' ', 'donno', 'dd', 'cc', '2016-11-08', 1000),
(2, '', 'donnoghgf', 'xx', 'zz', '2016-11-27', 1596357),
(3, '', 'bymistake', 'jj', 'kk', '2016-04-01', 19),
(4, '', 'bymistake', 'jj', 'kk', '2016-04-01', 19),
(5, '', 'tv add', 'channel', 'us', '2016-11-15', 35000),
(6, 'Dnation', 'donnoss', 'xx', 'cc', '2016-11-23', 2000),
(7, 'Dnation', 'vesak', 'none', 'none', '0000-00-00', 50000),
(8, 'Advertising', 'promotion', 'tv channel', 'USCS', '0000-00-00', 6999),
(9, 'Advertising', 'promotion', 'tv channel', 'USCS', '2017-01-03', 26599),
(10, 'Advertising', 'promotion', 'Rupavahii', 'USCS', '2017-01-03', 263100),
(11, 'Dnation', 'new don', 'comp', 'rajith Thennakoon', '2017-01-17', 160004);

-- --------------------------------------------------------

--
-- Table structure for table `fileuploads`
--

CREATE TABLE IF NOT EXISTS `fileuploads` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `fileuploads`
--

INSERT INTO `fileuploads` (`id`, `date`, `Subject`, `subject_code`, `title`, `description`, `filename`, `file`) VALUES
(14, '2016-11-15', 'Java Application Development using JavaSE', 'csc02/1', 'java beginners', 'java slide set one', 'java set 1', 'uploads/NAT_CCNA.pdf'),
(15, '2016-11-16', 'Java Application Development using JavaSE', 'csc02/1', '', '', '', 'uploads/pdf.png'),
(16, '2016-11-18', 'Java Application Development using JavaSE', 'csc02/1', '', '', '', 'uploads/combodate-1.0.7.zip'),
(17, '2016-11-19', 'Intensive Training Course on Office Applications', 'csc01/1', '', '', '', 'uploads/bootstrap-timepicker.zip'),
(18, '2017-01-14', 'Java Application Development using JavaSE', 'csc02/1', 'New slides', 'java se slides', 'todays lecture slides', 'uploads/Sampath.pdf'),
(19, '2017-01-14', 'Java Application Development using JavaSE', 'csc02/1', 'New slides', 'java se slides', 'todays lecture slides', 'uploads/Sampath.pdf'),
(20, '2017-01-15', 'Instructional Design Methodology for e- Learning ', 'csc04/2', 'new test', 'test', 'test file', 'uploads/Course-income.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(225) DEFAULT NULL,
  `last_name` varchar(225) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`) VALUES
(9, 'Rajith ', 'Thennakoon', 'rajtih@gmail.com', '078256659', 'Street Fighting IT for Business Executives (IT Empathy for Business Executives)'),
(10, 'Emalsha', 'Rasad', 'remalsha@gmail.com', '0715136507', 'Programming using Python'),
(11, 'humairah', 'dahlan', 'humairah@hfhdu.djhf', '67878', 'Intensive Training Course on Office Applications'),
(12, 'ass', 'ss', 'ss', 'ss', ' '),
(13, 'new lec', 'las', 'a@gmail.com', '4578', '3D Modeling and Animation'),
(14, 'new lec', 'las', 'a@gmail.com', '4578', '3D Modeling and Animation'),
(15, 'new lec', 'las', 'a@gmail.com', '4578', '3D Modeling and Animation'),
(16, 'new lec', 'las', 'a@gmail.com', '4578', '3D Modeling and Animation'),
(17, 'new lec', 'las', 'a@gmail.com', '4578', '3D Modeling and Animation');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_details`
--

CREATE TABLE IF NOT EXISTS `lecture_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `hall` varchar(20) NOT NULL,
  `time_from` varchar(20) NOT NULL,
  `time_to` varchar(20) NOT NULL,
  `lecturer_name` varchar(255) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lecture_details`
--

INSERT INTO `lecture_details` (`id`, `subject_id`, `date`, `hall`, `time_from`, `time_to`, `lecturer_name`, `instructor_name`) VALUES
(1, 'csc02/1', '0000-00-00', 'woo2', '3:15 AM', '3:15 AM', '', ''),
(2, 'csc02/1', '0000-00-00', 'woo2', '3:15 AM', '3:15 AM', '', ''),
(3, 'csc02/1', '0000-00-00', 'woo2', '3:15 AM', '3:15 AM', '', ''),
(4, 'csc02/1', '0000-00-00', 'woo2', '3:15 AM', '3:15 AM', '', ''),
(5, 'csc02/4', '0000-00-00', 'woo2', '3:15 AM', '3:15 AM', 'Dr jeewani gunathilaka', ''),
(6, 'csc02/4', '0000-00-00', 'woo2', '3:15 AM', '3:15 AM', 'Dr jeewani gunathilaka', ''),
(7, 'csc02/1', '0000-00-00', 'woo2', '3:30 AM', '3:30 AM', 'Dr kasun', 'rangana'),
(8, 'csc02/1', '2017-01-19', 'woo2', '3:30 AM', '3:30 AM', 'Dr kasun', 'rangana'),
(9, 'csc02/1', '2017-01-10', 'W001', '4:30 AM', '3:30 AM', 'Dr kasun', 'rangana'),
(10, 'csc02/1', '2017-01-04', 'W001', '3:30 AM', '6:30 AM', 'Dr jeewani gunathilaka', 'isuru'),
(11, 'csc02/1', '2017-01-19', 'IRQUE', '3:30 AM', '3:30 AM', 'Dr kasun', 'isuru'),
(12, 'csc02/4', '2017-01-19', 'W001', '3:30 AM', '8:30 AM', 'Dr jeewani gunathilaka', 'isuru'),
(13, 'csc02/4', '2017-01-25', 'W001', '5:30 AM', '7:30 AM', 'Dr jeewani gunathilaka', 'rangana'),
(14, 'csc02/1', '2017-01-04', 'IRQUE', '12:45 AM', '12:45 AM', 'ass ss', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_income`
--

CREATE TABLE IF NOT EXISTS `other_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `received_from` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `received_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `other_income`
--

INSERT INTO `other_income` (`id`, `description`, `received_from`, `received_by`, `received_date`, `amount`) VALUES
(1, 'donno', 'who', 'me', '2016-11-02', 11000),
(2, 'donnoss', 's', 'mes', '2016-11-15', 30000),
(3, 'donnoss', 's', 'mes', '2016-11-15', 30000),
(4, 'new', 'company', 'staff1', '2016-11-16', 30000),
(5, 'vesak', 'UOC', 'staff', '2017-01-06', 14499),
(6, 'vesak', 'company', 'rajith Thennakoon', '2017-01-03', 210000);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) DEFAULT NULL,
  `subject` varchar(120) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `student` int(2) DEFAULT '0',
  `coursec` int(2) DEFAULT '0',
  `cscc` int(2) DEFAULT '0',
  `type` int(2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`),
  KEY `posts_adminusers_id_fk` (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `adminid`, `subject`, `text`, `student`, `coursec`, `cscc`, `type`, `date`, `time`) VALUES
(1, 1, 'Main Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 2, '2016-10-28', '00:00:00'),
(6, 1, 'Post 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 2, '2016-11-06', '00:00:00'),
(7, 1, 'draft', 'loremIpsum                                    ', 1, 0, 0, 1, '2017-01-13', '00:00:00'),
(9, 1, 'draft', 'lklk                                    ', 1, 1, 0, 1, '2017-01-13', '00:00:00'),
(10, 1, 'ass', 'assss                                    ', 1, 1, 1, 1, '2017-01-14', '00:00:00'),
(12, 1, 'asa', 'sasas                                    ', 1, 1, 1, 1, '2017-01-14', '00:00:00'),
(13, 1, 'a', 'asas                                    ', 1, 0, 1, 0, '2017-01-15', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_income`
--

CREATE TABLE IF NOT EXISTS `project_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `responsible_party` varchar(255) NOT NULL,
  `received_date` date NOT NULL,
  `due_date` date NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `project_income`
--

INSERT INTO `project_income` (`id`, `pro_name`, `client`, `responsible_party`, `received_date`, `due_date`, `received_by`, `amount`) VALUES
(1, 'new', 'new client', 'jdjd', '2016-11-19', '2016-11-05', '0000-00-00', 30000),
(2, 'new', 'new client', 'jdjd', '2016-11-09', '2016-11-03', '0000-00-00', 5445),
(3, 'new pro', 'clien', 'res', '2016-11-16', '2016-11-04', '0000-00-00', 12500),
(4, 'new propro', 'clli', 'co ordinator', '0000-00-00', '0000-00-00', '0000-00-00', 15000),
(5, 'CSC site', 'CSC', 'SDU', '2017-01-01', '2017-01-19', 'staff', 49000),
(6, 'nproject', 'ncompany', 'SDU', '2017-01-03', '2017-01-31', '$full_name', 180000),
(7, 'mproject', 'mcompany', 'SDU', '2017-01-10', '2017-01-18', 'rajith Thennakoon', 160000);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `subjectid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `topic`, `content`, `path`, `subjectid`) VALUES
(1, 'hello', 'dds', '', 'csc05/2'),
(2, 'sds', 'dsd', '', 'csc05/2'),
(3, 'cc', 'cdd', '', 'csc05/2'),
(4, 'cdc', 'ds', '', 'csc05/2'),
(5, 'd', 'vfv', '', 'csc05/2'),
(6, 'assignment', 'submit your posts to vle', '', 'csc05/2'),
(7, 'java application lec 2', 'assginment will be available soon', '', 'csc02/1'),
(8, 'another assignment wiill be soon', 'yo motherfuckers', '', 'csc02/1'),
(9, 'Python fundamentals', 'slide set 1', '', 'csc02/4'),
(10, 'd', 'sasas', '', 'csc02/1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telephone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` varchar(40) DEFAULT NULL,
  `profile` varchar(200) NOT NULL DEFAULT '../public/dist/img/system/staff.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `email`, `telephone`, `address`, `password`, `role`, `profile`) VALUES
(1, 'rajith', 'Thennakoon', 'Rajithsthennakoon@gmail.com', '0715136507', '   70/1 Adhikarampura.Kandy', 'ee7ddfa19482e219fb5021ec30bd975c', 'CSC Staff', '../public/dist/img/system/staff.jpg'),
(2, 'Suneth', 'Perera', 'suneth@gmail.com', '0771648528', ' lorem', 'ee7ddfa19482e219fb5021ec30bd975c', 'Course Coordinator', '../public/dist/img/system/staff.jpg'),
(3, 'Alex', 'Garret', 'alex@gmail.com', '', '', 'ee7ddfa19482e219fb5021ec30bd975c', 'CSC Coordinator', '../public/dist/img/system/staff.jpg'),
(5, 'rajith', 'thennakoon\r\n', 'rajith@gmail.com', '', '', 'ee7ddfa19482e219fb5021ec30bd975c', 'Course Coordinator', '../public/dist/img/system/staff.jpg'),
(6, 'Shehan', 'Weerakkody', 'rajith@csc.com', '', '', '81dc9bdb52d04dc20036dbd8313ed055', 'CSC Staff', '../public/dist/img/system/staff.jpg'),
(7, 'New User', 'Last Name', 'test@gmail.com', '0715136507', 'test address', 'ee7ddfa19482e219fb5021ec30bd975c', 'CSC Staff', '../public/dist/img/system/staff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_title` varchar(5) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `name_w_initials` varchar(255) DEFAULT NULL,
  `coursename` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `home_address` varchar(255) NOT NULL,
  `home_mobile` varchar(20) NOT NULL,
  `home_tel` int(11) NOT NULL,
  `workplace_designation` varchar(255) DEFAULT NULL,
  `work_place_addr` varchar(255) NOT NULL,
  `work_place_tel` int(11) NOT NULL,
  `work_place_email` varchar(255) NOT NULL,
  `vehicle_no` varchar(30) DEFAULT NULL,
  `description_howknow` varchar(355) NOT NULL,
  `howknow` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT 'csc@gmail.com',
  `email` varchar(40) NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT '0',
  `total_attendance` int(11) NOT NULL DEFAULT '0',
  `registered` int(11) NOT NULL DEFAULT '0',
  `batch` int(10) DEFAULT '1',
  `assignment_marks` int(11) NOT NULL DEFAULT '0',
  `total_assignments` int(11) NOT NULL DEFAULT '0',
  `exam_marks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name_title`, `fullname`, `name_w_initials`, `coursename`, `dob`, `gender`, `nic`, `home_address`, `home_mobile`, `home_tel`, `workplace_designation`, `work_place_addr`, `work_place_tel`, `work_place_email`, `vehicle_no`, `description_howknow`, `howknow`, `username`, `email`, `attendance`, `total_attendance`, `registered`, `batch`, `assignment_marks`, `total_assignments`, `exam_marks`) VALUES
(1, NULL, 'Rajith Sanjeewa Thennakoon', 'T.M.R.S Thennakoon', 'csc02/1', '0000-00-00', 'male', '941221327V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', 'rajith@gmail.com', 27, 30, 1, 1, 16, 2, 80),
(2, NULL, 'Suneth Perera', 'S.Perera', 'csc02/4', '1994-12-01', 'male', '941221326V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', 'suneth@gmail.com', 0, 0, 1, 1, 0, 0, 0),
(3, NULL, 'Emalsha Rasad', 'E.R Rasad', 'csc02/1', NULL, NULL, '941221324V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', '', 30, 35, 1, 1, 14, 2, 59),
(4, NULL, 'Hasiru Kavishan', 'H kavishan', 'csc02/4', NULL, NULL, '941221328V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', '', 4, 4, 1, 2, 0, 0, 0),
(21, 'Mr', 'ishanka shehan weerakkody', 'i s weerakkody', 'csc02/4', '0000-00-00', 'Male', '941170463V', '68/6A Abeyrathna mawatha boralasgamuwa', '0772741986', 112545702, 'member', 'company sri lanka', 1111, 'comany@gmail.com', 'CA1199', 'news alert', 'Television', 'csc@gmail.com', 'weerakkody.shehan@yahoo.com', 3, 4, 1, 2, 0, 0, 0),
(26, '', '', '', '', '1970-01-01', '', '', '', '', 0, '', '', 0, '', '', '', '', 'csc@gmail.com', '', 0, 0, 1, 1, 0, 0, 0),
(29, 'Mr', 'imesha udayantha', 'i udayantha', 'csc02/1', '1994-05-20', 'Male', '941258564V', 'ambalangoda', '', 0, '', '', 0, '', '', '', 'Newspaper Advertisment', 'csc@gmail.com', '', 21, 23, 1, 1, 0, 0, 0),
(31, 'Mr', 'chamath madhushan', 'c madhusha', 'csc02/1', '2017-01-17', 'Male', '941234567V', 'Aluthgama Sri Lanka', '', 0, '', '', 0, '', '', '', 'Newspaper Advertisment', 'csc@gmail.com', '', 0, 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` varchar(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `subjectid` varchar(30) DEFAULT NULL,
  `coursecid` int(11) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `batch` varchar(11) DEFAULT NULL,
  `active` int(2) DEFAULT '0',
  `year` text,
  PRIMARY KEY (`id`),
  KEY `subjects_courses_courseid_fk` (`courseid`),
  KEY `subjects` (`coursecid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `courseid`, `subject`, `subjectid`, `coursecid`, `fee`, `duration`, `batch`, `active`, `year`) VALUES
(1, 'csc01', 'Intensive Training Course on Office Applications', 'csc01/1', 2, NULL, 8, '2', 1, NULL),
(2, 'csc01', 'Upgrading and Maintenance of Personal Computer Environment', 'csc01/2', 5, 22500, 10, '2', 1, NULL),
(4, 'csc01', 'Computer Aided Drafting Using AutoCAD 2012', 'csc01/3', 2, NULL, NULL, NULL, NULL, NULL),
(5, 'csc01', 'Street Fighting IT for Business Executives (IT Empathy for Business Executives)', 'csc01/4', 5, NULL, NULL, NULL, NULL, NULL),
(6, 'csc01', 'Computing for Career Development', 'csc01/5', 5, NULL, NULL, NULL, NULL, NULL),
(7, 'csc02', 'Java Application Development using JavaSE', 'csc02/1', 5, 20000, 8, '2', 1, '2017'),
(8, 'csc02', 'Advanced Java Application Development using JavaEE', 'csc02/2', 2, 22500, 10, '1', 1, '2017'),
(9, 'csc02', 'Intensive Course on Visual Basic .NET', 'csc02/3', 5, 22500, 10, NULL, NULL, NULL),
(12, 'csc02', 'Programming using Python language', 'csc02/4', 5, 35000, 10, '3', NULL, NULL),
(13, 'csc03', ' Linux Systems & Network Administration', 'csc03/1', 5, NULL, NULL, NULL, NULL, NULL),
(14, 'csc04', 'Workshop on Introduction to e-Learning', 'csc04/1', 2, 21, 11, NULL, NULL, NULL),
(15, 'csc04', 'Instructional Design Methodology for e- Learning ', 'csc04/2', 2, 50000, 20, NULL, NULL, NULL),
(16, 'csc04', 'e-Learning Content Authoring ', 'csc04/3', 2, 22500, 8, NULL, NULL, NULL),
(17, 'csc04', 'Install, Configuring and Managing a Learning Management System(LMS)', 'csc04/4', 2, NULL, NULL, NULL, NULL, NULL),
(18, 'csc04', 'Geographic Information Systems Applications', 'csc04/5', 2, NULL, NULL, NULL, NULL, NULL),
(19, 'csc05', 'Graphic Designing & Creativity Development', 'csc05/1', 2, 300, 22, NULL, NULL, NULL),
(20, 'csc05', '3D Modeling and Animation', 'csc05/2', 2, NULL, NULL, NULL, NULL, NULL),
(21, 'csc05', 'Digital Video Production and Animation', 'csc05/3', 2, NULL, NULL, NULL, NULL, NULL),
(22, 'csc06', 'Advanced Multimedia Web Design & Development Techniques', 'csc06/1', 2, NULL, NULL, NULL, NULL, NULL),
(23, 'csc06', 'Dynamic Web Application Development with PHP & MySQL', 'csc06/2', 2, NULL, NULL, NULL, NULL, NULL),
(24, 'csc06', 'Interactive Multimedia Content for the Web with Flash & Scripts', 'csc06/3', 2, NULL, NULL, NULL, NULL, NULL),
(25, 'csc07', 'Game Development Techniques', 'csc07/1', 2, NULL, NULL, NULL, NULL, NULL),
(26, 'csc08', 'Embedded Systems Design & Development using Microcontroller Programming (including Robotics)', 'csc08/1', 2, NULL, NULL, NULL, NULL, NULL),
(27, 'csc08', 'Workshop on Embedded Systems Development', 'csc08/2', 2, NULL, NULL, NULL, NULL, NULL),
(28, 'csc09', 'Red Hat Training And Certification', 'csc09/1', 2, NULL, NULL, NULL, NULL, NULL),
(29, 'csc09', 'Overview of Red Hat Training Courses', 'csc09/2', 2, NULL, NULL, NULL, NULL, NULL),
(30, 'csc09', 'Red Hat System Administration I (RH124)', 'csc09/3', 2, NULL, NULL, NULL, NULL, NULL),
(31, 'csc09', 'Red Hat System Administration II (RH134)', 'csc09/4', 2, NULL, NULL, NULL, NULL, NULL),
(32, 'csc09', 'Red Hat System Administration III (RH254)', 'csc09/5', 2, NULL, NULL, NULL, NULL, NULL),
(33, 'csc10', 'Hybrid Mobile Application Development using Titanium – for Android & Apple IOS', 'csc10/1', 2, NULL, NULL, NULL, NULL, NULL),
(34, 'csc10', 'Android Application Development', 'csc10/2', 2, NULL, NULL, NULL, NULL, NULL),
(35, 'csc11', 'Workshop on Introduction to Project Management', 'csc11/1', 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subid` varchar(20) NOT NULL,
  `linktitle` varchar(225) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `submitted_date` date NOT NULL,
  `edateandtime` text NOT NULL,
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_adminusers_id_fk` FOREIGN KEY (`adminid`) REFERENCES `adminusers` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects` FOREIGN KEY (`coursecid`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `subjects_courses_courseid_fk` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
