-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2021 at 10:09 AM
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
(1, 'White Park', 'White Park is one of the most beautiful spots in Morgantown. White Park has various attractions including a waterfall, many trails, tons of baseball fields, and tons of space, making it a perfect place to go with friends or family. ', '1001 Mississippi St, Morgantown, WV 26501', '08:30:00', '04:30:00', 0, '../images/WhitePark.jpeg', '../images/WhitePark2.jpeg', 'outdoor', 0),
(2, 'D.P. Dough', 'A great place to get a calzone with just about anything you could ever imagine in it, almost anytime as it is open until 3-4 AM everyday! Not only do they have delicious calzones, but they have wings, tots, breadsticks, and more! ', '408 High ST, Morgantown, WV 26505', '11:00:00', '04:00:00', 1, '../images/DPDough.jpeg', '../images/DPDough2.jpeg', 'restaurant', 0),
(3, 'Cheat Lake Park and Trail', 'Just outside of Morgantown, Cheat Lake Park has multiple picnic area\'s, a beach area for swimming, a fishing pier, fish cleaning stations, and playgrounds.It is also home to an amazing trail that is 4.5 mile long and follows the Lake Lynn shoreline. ', 'Cheat Lake Trail, Cheat Lake, WV 26508', '07:30:00', '06:00:00', 0, '../images/cheatLake.jpeg', '../images/cheatLake2.jpeg', 'outdoor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments` varchar(200) CHARACTER SET utf16 NOT NULL,
  `profpic` varchar(80) CHARACTER SET utf16 NOT NULL,
  `profname` varchar(25) CHARACTER SET utf16 NOT NULL,
  `itemid` int(11) NOT NULL,
  `posted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments`, `profpic`, `profname`, `itemid`, `posted`) VALUES
('hey', '../images/default.png', 'mtowey', 1, '2021-04-30 17:24:39'),
('heyyy', '../images/default.png', 'mtowey', 1, '2021-04-30 17:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `fid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`fid`, `userid`, `activityid`, `date`) VALUES
(3, 4, 1, '2021-04-26 20:36:16'),
(5, 6, 1, '2021-04-30 19:28:37'),
(6, 10, 1, '2021-05-01 20:44:49'),
(12, 13, 1, '2021-05-02 18:25:53');

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
(4, 'Martha', 'Lacek', 'Marty01', 'mal0058@mix.wvu.edu', 'profiles/608ffb068257c8.40403099.jpeg'),
(5, 'Alex', 'Royce', 'akroyce', 'akr0030@mix.wvu.edu', 'profiles/607c9fcd461d37.25829330.jpg'),
(6, 'kate', '.', 'kate', '1@1.com', '../images/default.png'),
(7, 'Delaney', 'Irwin', 'dmi0003', 'dmi0003@mix.wvu.edu', '../images/default.png'),
(8, 'Harley', 'Frazee', 'hpf0004', 'hpf0004@mix.wvu.edu', '../images/default.png'),
(9, 'Callyn', 'Zeigler', 'callyn', 'cal@cal.com', 'profiles/608dae969903b9.24536408.jpg'),
(10, 't', 't', 't', 't@t.t', 'profiles/608dbda60579b2.43421964.jpg'),
(11, 'Heather', 'Fetty', 'heather', 'heather@test.123', '../images/default.png'),
(12, 'h', 'h', 'h', 'h@h.h', '../images/default.png'),
(13, 'Heather', 'Fetty', 'hsf123', 'hsf@123.123', 'profiles/608dc348d39308.28381993.jpg'),
(14, 'Mary', 'Mac', 'mmac', 'mary@mary.com', '../images/default.png'),
(15, 'asdf', 'asdf', 'asdf', 'mal0058@mix.wvu.edu', '../images/default.png'),
(16, 'a', 'a', 'a', 'mal0058@mix.wvu.edu', '../images/default.png'),
(17, 'b', 'b', 'b', 'mal0058@mix.wvu.edu', '../images/default.png'),
(18, 'test', 'test', 'test', 'testing@testing.com', '../images/default.png');

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
(2, 'Casa d\'Amici', 'High St', 'Pizza', 'Restaurant', '2021-04-16 00:58:31'),
(3, 'code', 'high st', 'a fun place to be', 'night life', '2021-05-01 20:45:55'),
(4, 'suggestion', 'a good place', 'some fun stuff to do ', 'nightlife', '2021-05-01 21:09:20'),
(5, 'suggestion', 'a good place', 'fun times', 'night life', '2021-05-02 18:10:49'),
(6, 'suggestion', 'a good place', 'fun times', 'night life', '2021-05-02 18:12:33'),
(7, 'suggestion', 'a good place', 'fun times', 'night life', '2021-05-02 18:15:07'),
(8, 'suggestion', 'a good place', 'fun times', 'night life', '2021-05-02 18:21:04'),
(9, 'suggestion', 'a good place', 'fun times', 'night life', '2021-05-02 18:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `admin` int(11) DEFAULT '0',
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COMMENT='user database for signup and signin';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `admin`, `fname`, `lname`, `uname`, `password`, `email`) VALUES
(1, 0, 'hsfetty', 'hsfetty', 'hsfetty', '$2y$10$Hk5fh4s/kluoHiWj46kF6eBElT6YQK27F8PvvsWLC628C4Src6Z/u', 'hs@fetty.com'),
(2, 0, 'Delaney', 'Irwin', 'dmirwin', '$2y$10$V/9YJ/v0W97k/SFjb6r/2OA8TG8wjf5QNdbNuFtNjd/Lp1zWFSkju', 'dmi0003@mix.wvu.edu'),
(3, 0, 'heather', 'fetty', 'fettywap', '$2y$10$epHkr2nR1s348i0I6so/SOGbhMRyCOXeTTlqkCQU4jgNIPu8MxKBq', 'fetty@wap.rap'),
(4, 1, 'Martha', 'Lacek', 'Marty01', '$2y$10$S8k8WyMOw.VQ7AV2GQznc.5V/xRiv8px9j0jPBQ/SeYMlvGq.KB.a', 'mal0058@mix.wvu.edu'),
(5, 1, 'Alex', 'Royce', 'akroyce', '$2y$10$uZp9X3z7SX6zM0HSLO7r7uHBHsde1DVCmiSfCWoRf0qLqJ1nDXRUm', 'akr0030@mix.wvu.edu'),
(6, 0, 'kate', '.', 'kate', '$2y$10$9VH6QMtsCpAGZYvgC1wYYubpkEKmgC8iTM/i0.i9EBbr0JUHFaqEm', '1@1.com'),
(7, 0, 'Delaney', 'Irwin', 'dmi0003', '$2y$10$i9qwoQZodEeRgs1uEDBlKOGLMtZCLqf5HwbalaU5Dm0xrcTVdNzCq', 'dmi0003@mix.wvu.edu'),
(8, 0, 'Harley', 'Frazee', 'hpf0004', '$2y$10$pZ/zWp7XIrjU8wAgjA4qQ.lqeVZ/CzrY1US9wp60HdDPhvGZeCqdO', 'hpf0004@mix.wvu.edu'),
(9, 1, 'Callyn', 'Zeigler', 'callyn', '$2y$10$r/FtNXK8N3574j/XbWqsZO60SapC.TrP7RmxRxJuXnwtEYMsnvxsO', 'cal@cal.com'),
(10, 0, 't', 't', 't', '$2y$10$EjwvyVSD3iFi7AD7FG3n.u9Iep7BNPLvrov9VRaoprPKXOLPn3ebq', 't@t.t'),
(11, 0, 'Heather', 'Fetty', 'heather', '$2y$10$0kfcv97jJuTydsY7OdpGYeYW7/F6AmCJwVvahrVA0uUL8cDz6QLby', 'heather@test.123'),
(12, 0, 'h', 'h', 'h', '$2y$10$WxXG23FmYPkxt2SmebG5Eu4Ooko0xY1qVi0H54/qbX4OX00q4b07S', 'h@h.h'),
(13, 0, 'Heather', 'Fetty', 'hsf123', '$2y$10$eJzB8QEFkLcg94cWSm89TO6rL9fYR0POSosuTz6bYGL.GaOgH2H4O', 'hsf@123.123'),
(14, 0, 'Mary', 'Mac', 'mmac', '$2y$10$MxN3DiED82TzboGTxyr/6ew8k6wcN9JUbq6zM4xq6I6ESTmeX1eu2', 'mary@mary.com'),
(15, 0, 'asdf', 'asdf', 'asdf', '$2y$10$xfzLj4.KiBdhTc5TL0jhLOHRXxpF1rUsjlCKD3XbeGWR.1h8zG9pm', 'mal0058@mix.wvu.edu'),
(16, 0, 'a', 'a', 'a', '$2y$10$zzSrI5xWiwvsfJrTjnFPNOCxXY/dQlsee5AxIOUttkZtrwqqqhBR6', 'mal0058@mix.wvu.edu'),
(17, 0, 'b', 'b', 'b', '$2y$10$7mPoxRUWT4KSz1TVqHvCteoRcx.CCqZFl9MrtNfFcB/tkrx8T3dcy', 'mal0058@mix.wvu.edu'),
(18, 0, 'test', 'test', 'test', '$2y$10$glNMtBU6v0ZM9RUbQgmuM.044NwK0KKFxZ4cRZ9u/yef2lBkpQxOC', 'testing@testing.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`pid`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
