-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2021 at 08:32 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs230`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `itemid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(75) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `cost` int(3) NOT NULL,
  `pic1` varchar(50) NOT NULL,
  `pic2` varchar(50) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `fakes` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`itemid`, `name`, `description`, `location`, `open`, `close`, `cost`, `pic1`, `pic2`, `tags`, `fakes`) VALUES
(1, 'White Park', 'White Park, also the home of the Morgantown Ice Arena, is a 170-acre park that serves as a hub for many athletic activities.  The park includes four adult softball fields and two youth baseball fields, a pavilion, and a small play area adjacent to the pavilion with swings and a slide.  Five miles of wooded trails interspersed throughout the park are used by hikers, bikers and wildlife enthusiasts. Additionally, White Park is home to a waterfall along one of it\'s trails.', 'White Park, 1001 Mississippi St, Morgantown, WV 26501', '08:30:00', '04:30:00', 1, '', '', 'outdoor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `fid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`fid`, `userid`, `activityid`, `date`) VALUES
(1, 4, 1, '2021-04-21 00:00:00');

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
(3, 'heather', 'fetty', 'fettywap', 'fetty@wap.rap', '../images/default.png'),
(4, 'Martha', 'Lacek', 'Marty01', 'mal0058@mix.wvu.edu', 'profiles/60808a85668875.70291666.jpeg'),
(5, 'Alex', 'Royce', 'akroyce', 'akr0030@mix.wvu.edu', 'profiles/607c9fcd461d37.25829330.jpg'),
(6, 'kate', '.', 'kate', '1@1.com', '../images/default.png'),
(7, 'Delaney', 'Irwin', 'dmi0003', 'dmi0003@mix.wvu.edu', '../images/default.png'),
(8, 'Harley', 'Frazee', 'hpf0004', 'hpf0004@mix.wvu.edu', '../images/default.png'),
(9, 'Callyn', 'Zeigler', 'callyn', 'cal@cal.com', '../images/default.png');

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
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `sid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `tags` varchar(50) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`sid`, `name`, `location`, `description`, `tags`, `upload_date`) VALUES
(1, 'Tudor\'s Biscuit World', '376 High St, Morgantown, WV 26505', 'They serve breakfast all day. Their link: http://www.tudorsbiscuitworld.com/', 'Restaurants', '2021-04-16 00:58:31'),
(2, 'Casa d\'Amici', 'High St', 'Pizza', 'Restaurant', '2021-04-16 00:58:31');

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
(3, 'heather', 'fetty', 'fettywap', '$2y$10$epHkr2nR1s348i0I6so/SOGbhMRyCOXeTTlqkCQU4jgNIPu8MxKBq', 'fetty@wap.rap'),
(4, 'Martha', 'Lacek', 'Marty01', '$2y$10$S8k8WyMOw.VQ7AV2GQznc.5V/xRiv8px9j0jPBQ/SeYMlvGq.KB.a', 'mal0058@mix.wvu.edu'),
(5, 'Alex', 'Royce', 'akroyce', '$2y$10$uZp9X3z7SX6zM0HSLO7r7uHBHsde1DVCmiSfCWoRf0qLqJ1nDXRUm', 'akr0030@mix.wvu.edu'),
(6, 'kate', '.', 'kate', '$2y$10$9VH6QMtsCpAGZYvgC1wYYubpkEKmgC8iTM/i0.i9EBbr0JUHFaqEm', '1@1.com'),
(7, 'Delaney', 'Irwin', 'dmi0003', '$2y$10$i9qwoQZodEeRgs1uEDBlKOGLMtZCLqf5HwbalaU5Dm0xrcTVdNzCq', 'dmi0003@mix.wvu.edu'),
(8, 'Harley', 'Frazee', 'hpf0004', '$2y$10$pZ/zWp7XIrjU8wAgjA4qQ.lqeVZ/CzrY1US9wp60HdDPhvGZeCqdO', 'hpf0004@mix.wvu.edu'),
(9, 'Callyn', 'Zeigler', 'callyn', '$2y$10$r/FtNXK8N3574j/XbWqsZO60SapC.TrP7RmxRxJuXnwtEYMsnvxsO', 'cal@cal.com');

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
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`fid`);

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
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`sid`);

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
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
