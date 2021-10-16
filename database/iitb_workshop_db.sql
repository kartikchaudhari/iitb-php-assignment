-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 10:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iitb_workshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `iitb_coordinator`
--

CREATE TABLE `iitb_coordinator` (
  `coordinator_id` int(11) NOT NULL COMMENT 'coordinator record id',
  `name` varchar(300) NOT NULL COMMENT 'coordinator name',
  `email` varchar(500) NOT NULL COMMENT 'coordinator email',
  `password` text NOT NULL COMMENT 'password',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'record creation timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_coordinator`
--

INSERT INTO `iitb_coordinator` (`coordinator_id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Coordinator User', 'coordinator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-10-13 06:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `iitb_discipline`
--

CREATE TABLE `iitb_discipline` (
  `d_id` int(11) NOT NULL COMMENT 'discipline record id',
  `d_name` varchar(500) NOT NULL COMMENT 'discipline name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_discipline`
--

INSERT INTO `iitb_discipline` (`d_id`, `d_name`) VALUES
(1, 'Computer Science and Engineering'),
(2, 'Chemical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `iitb_feedback`
--

CREATE TABLE `iitb_feedback` (
  `feedback_id` int(11) NOT NULL COMMENT 'feedback record id',
  `student_id` int(11) NOT NULL COMMENT 'student record id',
  `feedback_date` date NOT NULL COMMENT 'feedback date',
  `topic_attended` text NOT NULL COMMENT 'attended topics',
  `feedback` text NOT NULL COMMENT 'feedback',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'record creatio timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_feedback`
--

INSERT INTO `iitb_feedback` (`feedback_id`, `student_id`, `feedback_date`, `topic_attended`, `feedback`, `created_at`) VALUES
(1, 2, '2021-09-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 09:22:50'),
(2, 2, '2021-09-15', '[\"Python Is Best\",\"Python is Best\",\"Java is Best\"]', 'Some Feedback Text Here.', '2021-10-15 10:09:50'),
(3, 2, '2021-09-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 09:22:50'),
(4, 2, '2021-09-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:17:34'),
(5, 2, '2021-09-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:13'),
(6, 2, '2021-09-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(7, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(8, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(9, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(10, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(11, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(12, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(13, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(14, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(15, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(16, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(17, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(18, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(19, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(20, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(21, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(22, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(23, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(24, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(25, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(26, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(27, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(28, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(29, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(30, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(31, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(32, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(33, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(34, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(35, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(36, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(37, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(38, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(39, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(40, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(41, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(42, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(43, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(44, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(45, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(46, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(47, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(48, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(49, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(50, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(51, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(52, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(53, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(54, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(55, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(56, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(57, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(58, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(59, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(60, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(61, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(62, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(63, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14'),
(64, 2, '2021-10-15', '[\"Topic 1\",\"Topic 2\"]', 'Feedback Text', '2021-10-15 10:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `iitb_participants_type`
--

CREATE TABLE `iitb_participants_type` (
  `type_id` int(11) NOT NULL COMMENT 'participants record id',
  `type_name` varchar(200) NOT NULL COMMENT 'participants name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_participants_type`
--

INSERT INTO `iitb_participants_type` (`type_id`, `type_name`) VALUES
(1, 'Students'),
(2, 'Faculties');

-- --------------------------------------------------------

--
-- Table structure for table `iitb_reports`
--

CREATE TABLE `iitb_reports` (
  `report_id` int(11) NOT NULL COMMENT 'report record id',
  `month` tinyint(4) NOT NULL COMMENT 'month number',
  `report_file` text NOT NULL COMMENT 'parth for report file',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iitb_student`
--

CREATE TABLE `iitb_student` (
  `student_id` int(11) NOT NULL COMMENT 'student record id',
  `name` varchar(300) NOT NULL COMMENT 'student name',
  `course` tinyint(4) NOT NULL COMMENT 'student course',
  `semester` tinyint(4) NOT NULL COMMENT 'student semester',
  `email` varchar(500) NOT NULL COMMENT 'student email',
  `password` text NOT NULL COMMENT 'student password',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp for student registration'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_student`
--

INSERT INTO `iitb_student` (`student_id`, `name`, `course`, `semester`, `email`, `password`, `created_at`) VALUES
(2, 'KARTIK CHAUDHARI', 1, 3, 'student@gmail.com', 'cd73502828457d15655bbd7a63fb0bc8', '2021-10-12 15:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `iitb_workshop`
--

CREATE TABLE `iitb_workshop` (
  `workshop_id` int(11) NOT NULL COMMENT 'workshop record id',
  `workshop_title` text NOT NULL COMMENT 'workshop title',
  `workshop_date` varchar(20) NOT NULL COMMENT 'workshop date',
  `workshop_type` tinyint(4) NOT NULL COMMENT 'type of workshop',
  `participant_type` tinyint(4) NOT NULL COMMENT 'type of participant',
  `participant_expacted` smallint(6) NOT NULL COMMENT 'participant expacted',
  `workshop_category` text NOT NULL,
  `discipline_type` text NOT NULL COMMENT 'discipline type',
  `workshop_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'workshop status (1-pending,2-completed)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'entry creation timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_workshop`
--

INSERT INTO `iitb_workshop` (`workshop_id`, `workshop_title`, `workshop_date`, `workshop_type`, `participant_type`, `participant_expacted`, `workshop_category`, `discipline_type`, `workshop_status`, `created_at`) VALUES
(14, 'Test Test', '2021-10-28', 2, 2, 1222, 'Workshop', '[\"1\",\"2\"]', 0, '2021-10-15 07:41:41'),
(15, 'Test Test', '2021-10-13', 2, 2, 1222, 'Workshop', '[\"1\"]', 1, '2021-10-15 08:32:41'),
(16, 'Test Test', '2021-10-15', 1, 1, 133, 'Workshop', '[\"1\"]', 1, '2021-10-15 09:55:11'),
(17, 'Test Test', '2021-9-28', 2, 2, 1222, 'Workshop', '[\"1\",\"2\"]', 1, '2021-10-15 07:41:41'),
(18, 'Test Test', '2021-9-13', 2, 2, 1222, 'Workshop', '[\"1\"]', 1, '2021-10-15 08:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `iitb_workshop_type`
--

CREATE TABLE `iitb_workshop_type` (
  `type_id` int(11) NOT NULL COMMENT 'workshop type Id',
  `type_name` varchar(200) NOT NULL COMMENT 'workshop name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iitb_workshop_type`
--

INSERT INTO `iitb_workshop_type` (`type_id`, `type_name`) VALUES
(1, 'In-house'),
(2, 'Outreach');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iitb_coordinator`
--
ALTER TABLE `iitb_coordinator`
  ADD PRIMARY KEY (`coordinator_id`);

--
-- Indexes for table `iitb_discipline`
--
ALTER TABLE `iitb_discipline`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `iitb_feedback`
--
ALTER TABLE `iitb_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `iitb_participants_type`
--
ALTER TABLE `iitb_participants_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `iitb_reports`
--
ALTER TABLE `iitb_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `iitb_student`
--
ALTER TABLE `iitb_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `iitb_workshop`
--
ALTER TABLE `iitb_workshop`
  ADD PRIMARY KEY (`workshop_id`);

--
-- Indexes for table `iitb_workshop_type`
--
ALTER TABLE `iitb_workshop_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iitb_coordinator`
--
ALTER TABLE `iitb_coordinator`
  MODIFY `coordinator_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'coordinator record id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iitb_discipline`
--
ALTER TABLE `iitb_discipline`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'discipline record id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iitb_feedback`
--
ALTER TABLE `iitb_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'feedback record id', AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `iitb_participants_type`
--
ALTER TABLE `iitb_participants_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'participants record id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iitb_reports`
--
ALTER TABLE `iitb_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'report record id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iitb_student`
--
ALTER TABLE `iitb_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'student record id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iitb_workshop`
--
ALTER TABLE `iitb_workshop`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'workshop record id', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `iitb_workshop_type`
--
ALTER TABLE `iitb_workshop_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'workshop type Id', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
