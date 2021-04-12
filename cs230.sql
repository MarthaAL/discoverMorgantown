-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2021 at 10:40 AM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group3`
--

-- --------------------------------------------------------

--
-- Table structure for table `night`
--

CREATE TABLE `night` (
  `itemid` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'restraunt name',
  `location` varchar(50) NOT NULL,
  `open` time NOT NULL COMMENT 'opening time',
  `cost` int(11) NOT NULL COMMENT '$ - $$$; 1-3',
  `tags` varchar(80) NOT NULL COMMENT 'keywords to search',
  `close` time NOT NULL COMMENT 'closing time',
  `pic` varchar(50) NOT NULL DEFAULT '../images/default.jpg',
  `fakes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `outdoor`
--

CREATE TABLE `outdoor` (
  `itemid` int(11) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `tags` varchar(80) NOT NULL,
  `pic` varchar(50) NOT NULL DEFAULT '../images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `pid` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profpic` varchar(50) NOT NULL DEFAULT '../images/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`pid`, `fname`, `lname`, `uname`, `email`, `profpic`) VALUES
(1, 'hsfetty', 'hsfetty', 'hsfetty', 'hs@fetty.com', '../images/default.png'),
(2, 'Delaney', 'Irwin', 'dmirwin', 'dmi0003@mix.wvu.edu', '../images/default.png'),
(3, 'Martha', 'Lacek', 'Marty01', 'mal0058@mix.wvu.edu', '../images/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `restraunts`
--

CREATE TABLE `restraunts` (
  `itemid` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'restraunt name',
  `location` varchar(50) NOT NULL,
  `open` time NOT NULL COMMENT 'opening time',
  `cost` int(11) NOT NULL COMMENT '$ - $$$; 1-3',
  `tags` varchar(80) NOT NULL COMMENT 'keywords to search',
  `close` time NOT NULL COMMENT 'closing time',
  `pic` varchar(50) NOT NULL DEFAULT '../images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `retail`
--

CREATE TABLE `retail` (
  `itemid` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'restraunt name',
  `location` varchar(50) NOT NULL,
  `open` time NOT NULL COMMENT 'opening time',
  `cost` int(11) NOT NULL COMMENT '$ - $$$; 1-3',
  `tags` varchar(80) NOT NULL COMMENT 'keywords to search',
  `close` time NOT NULL COMMENT 'closing time',
  `pic` varchar(50) NOT NULL DEFAULT '../images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COMMENT='user database for signup and signin';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `uname`, `password`, `email`) VALUES
(1, 'hsfetty', 'hsfetty', 'hsfetty', '$2y$10$Hk5fh4s/kluoHiWj46kF6eBElT6YQK27F8PvvsWLC628C4Src6Z/u', 'hs@fetty.com'),
(2, 'Delaney', 'Irwin', 'dmirwin', '$2y$10$V/9YJ/v0W97k/SFjb6r/2OA8TG8wjf5QNdbNuFtNjd/Lp1zWFSkju', 'dmi0003@mix.wvu.edu'),
(3, 'Martha', 'Lacek', 'Marty01', '$2y$10$Tyak6UVpT/CBPNyMpXmti.p73BVqyox3oAVGt8uq4dZjXYoeYLxG2', 'mal0058@mix.wvu.edu');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `itemid` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'restraunt name',
  `location` varchar(50) NOT NULL,
  `open` time NOT NULL COMMENT 'opening time',
  `tags` varchar(80) NOT NULL COMMENT 'keywords to search',
  `close` time NOT NULL COMMENT 'closing time',
  `pic` varchar(50) NOT NULL DEFAULT '../images/default.jpg',
  `contact` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `night`
--
ALTER TABLE `night`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `outdoor`
--
ALTER TABLE `outdoor`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `restraunts`
--
ALTER TABLE `restraunts`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `retail`
--
ALTER TABLE `retail`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `night`
--
ALTER TABLE `night`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `outdoor`
--
ALTER TABLE `outdoor`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restraunts`
--
ALTER TABLE `restraunts`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retail`
--
ALTER TABLE `retail`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
