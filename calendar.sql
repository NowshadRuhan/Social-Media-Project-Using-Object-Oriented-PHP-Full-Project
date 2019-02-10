-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 03:26 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_event_table`
--

CREATE TABLE IF NOT EXISTS `add_event_table` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `event_description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_event_table`
--

INSERT INTO `add_event_table` (`event_id`, `event_title`, `start_date`, `ending_date`, `event_time`, `location`, `reg_id`, `event_description`) VALUES
(1, 'Khabadi Match', '2019-01-06', '2019-01-07', '07:11:00', 'Mc Collage field', 11, 'It is a match between Bangadesh vs India');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE IF NOT EXISTS `admin_table` (
  `ad_id` int(11) NOT NULL,
  `ad_user_name` varchar(200) DEFAULT NULL,
  `ad_pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`ad_id`, `ad_user_name`, `ad_pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `daily_tasks_table`
--

CREATE TABLE IF NOT EXISTS `daily_tasks_table` (
  `tasks_id` int(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `tasks_title` varchar(200) DEFAULT NULL,
  `tasks_date` date DEFAULT NULL,
  `tasks_time` time DEFAULT NULL,
  `tasks_note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `join_event`
--

CREATE TABLE IF NOT EXISTS `join_event` (
  `join_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `reg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `note_table`
--

CREATE TABLE IF NOT EXISTS `note_table` (
  `note_id` int(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `note_title` varchar(200) DEFAULT NULL,
  `note_text` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_table`
--

CREATE TABLE IF NOT EXISTS `reg_table` (
  `reg_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_birthday` varchar(200) NOT NULL,
  `user_gender` varchar(200) NOT NULL,
  `user_mobile` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_table`
--

INSERT INTO `reg_table` (`reg_id`, `name`, `user_email`, `user_name`, `user_password`, `user_birthday`, `user_gender`, `user_mobile`) VALUES
(11, 'Nowshad Ruhan', 'ruhan@gamil.com', 'nowshad', '11', '1995-01-01', 'Male', 1626926214);

-- --------------------------------------------------------

--
-- Table structure for table `remainder_table`
--

CREATE TABLE IF NOT EXISTS `remainder_table` (
  `remainder_id` int(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `remainder_title` varchar(200) DEFAULT NULL,
  `remainder_description` varchar(200) DEFAULT NULL,
  `remainder_date` date DEFAULT NULL,
  `remainder_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_event_table`
--
ALTER TABLE `add_event_table`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `daily_tasks_table`
--
ALTER TABLE `daily_tasks_table`
  ADD PRIMARY KEY (`tasks_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `join_event`
--
ALTER TABLE `join_event`
  ADD PRIMARY KEY (`join_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `note_table`
--
ALTER TABLE `note_table`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `reg_table`
--
ALTER TABLE `reg_table`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `remainder_table`
--
ALTER TABLE `remainder_table`
  ADD PRIMARY KEY (`remainder_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_event_table`
--
ALTER TABLE `add_event_table`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daily_tasks_table`
--
ALTER TABLE `daily_tasks_table`
  MODIFY `tasks_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `join_event`
--
ALTER TABLE `join_event`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `note_table`
--
ALTER TABLE `note_table`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reg_table`
--
ALTER TABLE `reg_table`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `remainder_table`
--
ALTER TABLE `remainder_table`
  MODIFY `remainder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_event_table`
--
ALTER TABLE `add_event_table`
  ADD CONSTRAINT `add_event_table_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_table` (`reg_id`);

--
-- Constraints for table `daily_tasks_table`
--
ALTER TABLE `daily_tasks_table`
  ADD CONSTRAINT `daily_tasks_table_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_table` (`reg_id`);

--
-- Constraints for table `join_event`
--
ALTER TABLE `join_event`
  ADD CONSTRAINT `join_event_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `add_event_table` (`event_id`),
  ADD CONSTRAINT `join_event_ibfk_2` FOREIGN KEY (`reg_id`) REFERENCES `reg_table` (`reg_id`);

--
-- Constraints for table `note_table`
--
ALTER TABLE `note_table`
  ADD CONSTRAINT `note_table_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_table` (`reg_id`);

--
-- Constraints for table `remainder_table`
--
ALTER TABLE `remainder_table`
  ADD CONSTRAINT `remainder_table_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_table` (`reg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
