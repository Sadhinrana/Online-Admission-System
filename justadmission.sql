-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2016 at 08:39 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `justadmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `name` varchar(32) NOT NULL,
  `father` varchar(32) NOT NULL,
  `mother` varchar(32) NOT NULL,
  `sex` varchar(3) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `present` text NOT NULL,
  `permanent` text NOT NULL,
  `contact` int(15) NOT NULL,
  `sscroll` int(10) NOT NULL,
  `sscres` int(10) NOT NULL,
  `sscsession` varchar(20) NOT NULL,
  `sscpa` year(4) NOT NULL,
  `sscgpa` decimal(10,0) NOT NULL,
  `sscboard` varchar(15) NOT NULL,
  `hscroll` int(10) NOT NULL,
  `hscres` int(10) NOT NULL,
  `hscsession` varchar(20) NOT NULL,
  `hscpa` year(4) NOT NULL,
  `hscgpa` decimal(10,0) NOT NULL,
  `hscboard` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `applytime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `userid`, `unit`, `name`, `father`, `mother`, `sex`, `dob`, `present`, `permanent`, `contact`, `sscroll`, `sscres`, `sscsession`, `sscpa`, `sscgpa`, `sscboard`, `hscroll`, `hscres`, `hscsession`, `hscpa`, `hscgpa`, `hscboard`, `status`, `applytime`) VALUES
(30, 37, '', '', '', '', '', '', 'Xxa', 'ax', 0, 0, 0, '', 0000, '0', '', 0, 0, '', 0000, '0', '', 0, '2016-02-27 07:38:04'),
(31, 37, '', '', '', '', '', '', 'Xxa', 'ax', 0, 0, 0, '', 0000, '0', '', 0, 0, '', 0000, '0', '', 1, '2016-02-27 07:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `referenceid`
--

CREATE TABLE IF NOT EXISTS `referenceid` (
  `id` int(11) NOT NULL,
  `refid` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sitedata`
--

CREATE TABLE IF NOT EXISTS `sitedata` (
  `id` int(11) NOT NULL,
  `heading` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitedata`
--

INSERT INTO `sitedata` (`id`, `heading`) VALUES
(1, 'Undergraduate Admission Test 2015-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `joined` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `password`, `salt`, `joined`) VALUES
(37, 'justas', '003ea93856caeada068e926730000b3ed862c2f22873c563e9be7dc6923781f0', '×œ4ž|²$•+6æ¶I^Ø¶Õ\nç¾—×°¸±}¾', '2016-02-27 07:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referenceid`
--
ALTER TABLE `referenceid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitedata`
--
ALTER TABLE `sitedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `referenceid`
--
ALTER TABLE `referenceid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sitedata`
--
ALTER TABLE `sitedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
