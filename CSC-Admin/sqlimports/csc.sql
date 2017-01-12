-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 06:19 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csc`
--
CREATE DATABASE IF NOT EXISTS `csc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csc`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `assignmentsubmissions`
--

INSERT INTO `assignmentsubmissions` (`id`, `subid`, `assid`, `studentname`, `filename`, `date`, `path`, `attempt`) VALUES
(11, 'csc02/4', 4, 'Suneth Perera', 'rr', '1479406932', '../uploads/assignment/', 1);

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
  `student_NIC` varchar(15) NOT NULL,
  `coursename` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `person_rec` varchar(255) NOT NULL,
  `refference_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_income`
--

INSERT INTO `course_income` (`student_NIC`, `coursename`, `payment_method`, `amount`, `received_date`, `person_rec`, `refference_no`) VALUES
('941170463V', 'csc05/2', 'Cash', 30000, '2016-11-09', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 30000, '2016-11-28', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 1000, '2016-11-30', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc02/1', 'Cash', 5445, '2016-11-04', 'ishanka', '123'),
('941170463V', 'csc01/1', 'Cash', 1000, '2016-11-07', 'ishanka', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cus_course_income`
--

CREATE TABLE IF NOT EXISTS `cus_course_income` (
  `course_name` varchar(255) NOT NULL,
  `requesting_party` varchar(255) NOT NULL,
  `received_date` date NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_course_income`
--

INSERT INTO `cus_course_income` (`course_name`, `requesting_party`, `received_date`, `received_by`, `amount`) VALUES
('new co', 'company', '2016-11-09', 'me', 15000),
('new cos', 'companys', '2016-11-21', 'mes', 111111),
('new course', 'sLC', '2016-11-02', 'staff', 19500);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `give_to` varchar(255) NOT NULL,
  `give_by` varchar(255) NOT NULL,
  `given_date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_type`, `description`, `give_to`, `give_by`, `given_date`, `amount`) VALUES
(' ', 'donno', 'dd', 'cc', '2016-11-08', 1000),
('', 'donnoghgf', 'xx', 'zz', '2016-11-27', 1596357),
('', 'bymistake', 'jj', 'kk', '2016-04-01', 19),
('', 'bymistake', 'jj', 'kk', '2016-04-01', 19),
('', 'tv add', 'channel', 'us', '2016-11-15', 35000),
('Dnation', 'donnoss', 'xx', 'cc', '2016-11-23', 2000);

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
(18, '2016-12-02', 'Interactive Multimedia Content for the Web with Flash ', 'csc06/3', 'multimedia', 'multimedia', 'mul', 'uploads/os.pdf'),
(19, '2017-01-08', 'Workshop on Introduction to e-Learning', 'csc04/1', '', '', '', 'uploads/2nd_Year_CS Groups.pdf'),
(20, '2017-01-08', 'Workshop on Introduction to e-Learning', 'csc04/1', '', '', '', 'uploads/14001111.docx');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`) VALUES
(9, 'Rajith ', 'Thennakoon', 'rajtih@gmail.com', '078256659', 'Street Fighting IT for Business Executives (IT Empathy for Business Executives)'),
(10, 'Emalsha', 'Rasad', 'remalsha@gmail.com', '0715136507', 'Programming using Python'),
(11, 'humairah', 'dahlan', 'humairah@hfhdu.djhf', '67878', 'Intensive Training Course on Office Applications');

-- --------------------------------------------------------

--
-- Table structure for table `other_income`
--

CREATE TABLE IF NOT EXISTS `other_income` (
  `description` varchar(255) NOT NULL,
  `received_from` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `received_date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_income`
--

INSERT INTO `other_income` (`description`, `received_from`, `received_by`, `received_date`, `amount`) VALUES
('donno', 'who', 'me', '2016-11-02', 11000),
('donnoss', 's', 'mes', '2016-11-15', 30000),
('donnoss', 's', 'mes', '2016-11-15', 30000),
('new', 'company', 'staff1', '2016-11-16', 30000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `adminid`, `subject`, `text`, `student`, `coursec`, `cscc`, `type`, `date`, `time`) VALUES
(1, 1, 'Main Post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 2, '2016-10-28', '00:00:00'),
(2, 1, 'post 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 1, '2016-10-31', '00:00:00'),
(4, 1, 'Post 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 1, '2016-11-06', '03:10:04'),
(5, 1, 'Post 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 1, '2016-11-06', '00:00:00'),
(6, 1, 'Post 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 0, 0, 2, '2016-11-06', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_income`
--

CREATE TABLE IF NOT EXISTS `project_income` (
  `pro_name` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `responsible_party` varchar(255) NOT NULL,
  `received_date` date NOT NULL,
  `due_date` date NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_income`
--

INSERT INTO `project_income` (`pro_name`, `client`, `responsible_party`, `received_date`, `due_date`, `received_by`, `amount`) VALUES
('new', 'new client', 'jdjd', '2016-11-19', '2016-11-05', 'fkdnd', 30000),
('new', 'new client', 'jdjd', '2016-11-09', '2016-11-03', 'me', 5445),
('new pro', 'clien', 'res', '2016-11-16', '2016-11-04', 'rec', 12500);

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
  `password` varchar(40) DEFAULT NULL,
  `role` varchar(40) DEFAULT NULL,
  `profile` varchar(200) NOT NULL DEFAULT '../public/dist/img/system/staff.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `profile`) VALUES
(1, 'rajith', 'ff', 'staff@gmail.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'CSC Staff', ''),
(2, 'Suneth', 'Perera', 'suneth@gmail.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'Course Coordinator', '../public/dist/img/system/staff.jpg'),
(3, 'Alex', 'Garret', 'alex@gmail.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'CSC Cordinator', '../public/dist/img/system/staff.jpg'),
(5, 'rajith', 'thennakoon\r\n', 'rajith@gmail.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'Course Coordinator', '../public/dist/img/system/staff.jpg'),
(6, 'Shehan', 'Weerakkody', 'rajith@csc.com', 'ee7ddfa19482e219fb5021ec30bd975c', 'CSC Staff', '../public/dist/img/system/staff.jpg');

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
  `dob` varchar(30) DEFAULT NULL,
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
  `batch` varchar(11) DEFAULT NULL,
  `assignment_marks` int(11) NOT NULL DEFAULT '0',
  `total_assignments` int(11) NOT NULL DEFAULT '0',
  `exam_marks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name_title`, `fullname`, `name_w_initials`, `coursename`, `dob`, `gender`, `nic`, `home_address`, `home_mobile`, `home_tel`, `workplace_designation`, `work_place_addr`, `work_place_tel`, `work_place_email`, `vehicle_no`, `description_howknow`, `howknow`, `username`, `email`, `attendance`, `total_attendance`, `registered`, `batch`, `assignment_marks`, `total_assignments`, `exam_marks`) VALUES
(1, NULL, 'Rajith Sanjeewa Thennakoon', 'T.M.R.S Thennakoon', 'csc02/1', '1994 05 01', 'male', '941221327V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', 'rajith@gmail.com', 15, 16, 1, '1', 0, 0, 0),
(2, NULL, 'Suneth Perera', 'S.Perera', 'csc02/4', '1994-12-1', 'male', '941221326V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', 'suneth@gmail.com', 0, 0, 1, '1', 0, 0, 0),
(3, NULL, 'Emalsha Rasad', 'E.R Rasad', 'csc02/1', NULL, NULL, '941221324V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', '', 13, 16, 1, '2', 0, 0, 0),
(4, NULL, 'Hasiru Kavishan', 'H kavishan', 'csc02/4', NULL, NULL, '941221328V', '', '', 0, NULL, '', 0, '', NULL, '', NULL, 'csc@gmail.com', '', 0, 0, 1, '2', 0, 0, 0);

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
  PRIMARY KEY (`id`),
  KEY `subjects_courses_courseid_fk` (`courseid`),
  KEY `subjects` (`coursecid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `courseid`, `subject`, `subjectid`, `coursecid`, `fee`, `duration`, `batch`) VALUES
(1, 'csc01', 'Intensive Training Course on Office Applications', 'csc01/1', 2, NULL, NULL, NULL),
(2, 'csc01', 'Upgrading and Maintenance of Personal Computer Environment', 'csc01/2', 5, 22500, 10, NULL),
(4, 'csc01', 'Computer Aided Drafting Using AutoCAD 2012', 'csc01/3', 2, NULL, NULL, NULL),
(5, 'csc01', 'Street Fighting IT for Business Executives (IT Empathy for Business Executives)', 'csc01/4', 5, NULL, NULL, NULL),
(6, 'csc01', 'Computing for Career Development', 'csc01/5', 5, NULL, NULL, NULL),
(7, 'csc02', 'Java Application Development using JavaSE', 'csc02/1', 2, 20000, 8, '2'),
(8, 'csc02', 'Advanced Java Application Development using JavaEE', 'csc02/2', 2, 22500, 10, NULL),
(9, 'csc02', 'Intensive Course on Visual Basic .NET', 'csc02/3', 5, 22500, 10, NULL),
(12, 'csc02', 'Programming using Python language', 'csc02/4', 5, 35000, 10, '3'),
(13, 'csc03', ' Linux Systems & Network Administration', 'csc03/1', 5, NULL, NULL, NULL),
(14, 'csc04', 'Workshop on Introduction to e-Learning', 'csc04/1', 2, 21, 11, NULL),
(15, 'csc04', 'Instructional Design Methodology for e- Learning ', 'csc04/2', 2, 50000, 20, NULL),
(16, 'csc04', 'e-Learning Content Authoring ', 'csc04/3', 2, 22500, 8, NULL),
(17, 'csc04', 'Install, Configuring and Managing a Learning Management System(LMS)', 'csc04/4', 2, NULL, NULL, NULL),
(18, 'csc04', 'Geographic Information Systems Applications', 'csc04/5', 2, NULL, NULL, NULL),
(19, 'csc05', 'Graphic Designing & Creativity Development', 'csc05/1', 2, 300, 22, NULL),
(20, 'csc05', '3D Modeling and Animation', 'csc05/2', 2, NULL, NULL, NULL),
(21, 'csc05', 'Digital Video Production and Animation', 'csc05/3', 2, NULL, NULL, NULL),
(22, 'csc06', 'Advanced Multimedia Web Design & Development Techniques', 'csc06/1', 2, NULL, NULL, NULL),
(23, 'csc06', 'Dynamic Web Application Development with PHP & MySQL', 'csc06/2', 2, NULL, NULL, NULL),
(24, 'csc06', 'Interactive Multimedia Content for the Web with Flash & Scripts', 'csc06/3', 2, NULL, NULL, NULL),
(25, 'csc07', 'Game Development Techniques', 'csc07/1', 2, NULL, NULL, NULL),
(26, 'csc08', 'Embedded Systems Design & Development using Microcontroller Programming (including Robotics)', 'csc08/1', 2, NULL, NULL, NULL),
(27, 'csc08', 'Workshop on Embedded Systems Development', 'csc08/2', 2, NULL, NULL, NULL),
(28, 'csc09', 'Red Hat Training And Certification', 'csc09/1', 2, NULL, NULL, NULL),
(29, 'csc09', 'Overview of Red Hat Training Courses', 'csc09/2', 2, NULL, NULL, NULL),
(30, 'csc09', 'Red Hat System Administration I (RH124)', 'csc09/3', 2, NULL, NULL, NULL),
(31, 'csc09', 'Red Hat System Administration II (RH134)', 'csc09/4', 2, NULL, NULL, NULL),
(32, 'csc09', 'Red Hat System Administration III (RH254)', 'csc09/5', 2, NULL, NULL, NULL),
(33, 'csc10', 'Hybrid Mobile Application Development using Titanium – for Android & Apple IOS', 'csc10/1', 2, NULL, NULL, NULL),
(34, 'csc10', 'Android Application Development', 'csc10/2', 2, NULL, NULL, NULL),
(35, 'csc11', 'Workshop on Introduction to Project Management', 'csc11/1', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subid` varchar(20) NOT NULL,
  `linktitle` varchar(225) NOT NULL,
  `submitted_date` date NOT NULL,
  `description` varchar(1000) NOT NULL,
  `edateandtime` text NOT NULL,
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `subid`, `linktitle`, `submitted_date`, `description`, `edateandtime`, `path`) VALUES
(17, 'csc02/1', 'My title', '0000-00-00', 'my description', '1480926600', '../uploads/My_folder/'),
(18, 'csc02/1', 'New Title', '2016-12-04', 'New Description', '1481002500', '../uploads/New_Folder/'),
(19, 'csc01/3', 'gydgwu', '2016-12-08', 'adhsajdhhdksahd', '1481120100', '../uploads/ABC/'),
(20, 'csc01/3', 'vvvvvvvvvvvvvvvvv', '2017-01-07', 'VVVVVVVVVVVVVVVVVVVVVVVVVVVVV', '', '../uploads/VVV-DIRECTORY/'),
(21, 'csc09/1', 'red hat', '2017-01-07', 'red hat', '', '../uploads/red hat/'),
(22, 'csc04/5', 'dfsdfgsdg', '2017-01-07', '', '1487097000', '../uploads/dfsdfgsdg/'),
(23, 'csc04/5', 'new title folder', '2017-01-07', '', '', '../uploads/new title folder/'),
(24, 'csc02/1', 'java se assignment - 01', '2017-01-08', 'java se assignment - 01', '1484229300', '../uploads/java se assignment - 01/'),
(25, 'csc02/1', 'java se assignment - 02', '2017-01-08', 'sxjgdjaksdgasjaugaiksd', '1484760300', '../uploads/java se assignment - 02/'),
(26, 'csc02/2', 'n', '2017-01-11', 'j', '1484818500', '../uploads/n/');

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
