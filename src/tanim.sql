-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 05:18 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanim`
--

-- --------------------------------------------------------

--
-- Table structure for table `leveltable`
--

CREATE TABLE `leveltable` (
  `level` int(11) NOT NULL,
  `catagory` varchar(15) NOT NULL,
  `sub_catagory_id` int(11) NOT NULL,
  `sub_catagory_title` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveltable`
--

INSERT INTO `leveltable` (`level`, `catagory`, `sub_catagory_id`, `sub_catagory_title`) VALUES
(1, 'math', 1, 'Counting and number patterns'),
(1, 'math', 2, 'Addition skills'),
(2, 'math', 3, 'Addition of integers'),
(2, 'math', 4, 'Subtraction of integers'),
(1, 'science', 5, 'Health knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email`) VALUES
('user', 'user', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `probtosubprob`
--

CREATE TABLE `probtosubprob` (
  `problem_id` int(11) NOT NULL,
  `sub_problem_id` int(11) NOT NULL,
  `sub_problem_title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `probtosubprob`
--

INSERT INTO `probtosubprob` (`problem_id`, `sub_problem_id`, `sub_problem_title`) VALUES
(1, 1, 'How many sneakers ?'),
(1, 2, 'How many horses ?'),
(1, 3, 'How many carrots ?'),
(1, 4, 'How many pastries ?'),
(1, 5, 'How many snowflakes ?'),
(3, 11, 'what\'s the last number ?'),
(3, 12, 'What\'s the number between 60 and 66 ?'),
(3, 13, 'What\'s the number between 14 and 18 ?'),
(3, 14, 'How many candles are on four tables ?'),
(3, 15, 'How many fish are in 5 bowls ?'),
(5, 21, 'Add two numbers'),
(5, 22, 'Add two numbers'),
(5, 23, 'Add these shirts'),
(5, 24, 'Add three numbers'),
(5, 25, 'Add four numbers'),
(6, 26, 'Subtract two numbers'),
(6, 27, 'Subtract two numbers'),
(6, 28, 'Subtract two numbers'),
(6, 29, 'Subtract dolphins'),
(6, 30, 'Choose the correct picture'),
(8, 36, 'How many times we should brush a day ?'),
(8, 37, 'What should we use to brush ?'),
(8, 38, 'How should we brush ?'),
(8, 39, 'When should we brush ?'),
(8, 40, 'What if one of your teeth is about to fall ?');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `username` varchar(30) NOT NULL,
  `pId` int(11) NOT NULL,
  `date` date NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`username`, `pId`, `date`, `score`) VALUES
('user', 2, '2017-07-13', 5),
('user', 6, '2017-07-13', 5);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `rCatagory` int(11) NOT NULL,
  `rCatagoryName` varchar(15) NOT NULL,
  `rCatagoryImg` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`rCatagory`, `rCatagoryName`, `rCatagoryImg`) VALUES
(1, 'Space', 'space.jpg'),
(2, 'Sea', 'sea.jpg'),
(3, 'Animals', 'animals.jpg'),
(4, 'Birds', 'birds.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resourcedata`
--

CREATE TABLE `resourcedata` (
  `rId` int(11) NOT NULL,
  `data` varchar(500) NOT NULL,
  `img` varchar(20) NOT NULL,
  `serial` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resourcedata`
--

INSERT INTO `resourcedata` (`rId`, `data`, `img`, `serial`) VALUES
(1, 'চাঁদ পৃথিবীর একমাত্র স্থায়ী প্রাকৃতিক উপগ্রহ । \r\n সৌরজগতের পঞ্চম বৃহত্তম আর পৃথিবী থেকে গড়ে প্রায় ৩৮৪,৪০০ কিমি দুরত্বে অবস্থিত ।\r\n ধারণা করা হয় প্রায় ৪.৫১ বিলিয়ন বছর পূর্বে এটি পৃথিবী আর মঙ্গলগ্রহের ন্যায় বিশালাকার কিছুর সাথে সংঘর্ষের ফলে সৃষ্টি হয়েছিল ।', 'moon1.jpg', 1),
(1, 'চাঁদের নিজস্ব কোন আলো নেই। সূর্যের আলো চাঁদে প্রতিফলিত হয়ে আমাদের চোখে ধরা পড়ে । \r\n চাঁদের গায়ে অনেক কাল দাগ দেখা যায় । এর অধিকাংশই বিভিন্ন সময় চাঁদের উপর আছড়ে পড়া বিভিন্ন উল্কাপিন্ড দ্বারা সৃষ্ট বড় বড় গর্তের কারণে। \r\n চাঁদের নিজস্ব কোন বায়ুমন্ডল না থাকায় এরা সহজেই চাঁদের পৃষ্ঠ পর্যন্ত পৌছে যেতে পারে।', 'moon2.jpg', 2),
(1, 'চাঁদ যেহেতু পৃথিবীর চারদিকে আবর্তন করতে থাকে তাই আমরা এর আকার বিভিন্ন সময় ভিন্ন ভিন্ন দেখি । \r\n এটা সূর্যের আলো চাঁদের কিছু অংশে পড়তে না পারার কারণে হয় । \r\n যখন চাঁদ ও সূর্য একবরাবর থাকে তখন চাঁদের অন্ধকার দিকটা আমাদের চোখে পড়ে , একে অমাবস্যা বলে । \r\n আর যখন পৃথিবীর একদিকে থাকে চাঁদ , আরেকদিকে সূর্য তখন চাঁদের অর্ধেকটাই পৃথিবী থেকে দেখা যায় , একে পূর্ণিমা বলে ।', 'moon3.jpg', 3),
(1, 'কখনো কখনো চাঁদ , পৃথিবী ও সূর্যের মাঝে চলে আসার কারণে পৃথিবীর কিছু কিছু অঞ্চলে সূর্যের আলো পৌছাতে পারে না ।\r\n এ ঘটনাকে সূর্যগ্রহণ বলে । যখন পৃথিবী , চাঁদ ও সূর্যের মাঝে চলে আসার কারণে চাঁদ ঢাকা পড়ে যায় তাকে চন্দ্রগ্রহন বলে । \r\n এ সময় সূর্যের কোন আলো চাঁদে পৌছাতে পারেনা । এছাড়া পৃথিবীর বুকের জোয়ার ভাটাও চাঁদের মধ্যাকরষন বলের কারণে হয় ।', 'moon4.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `resourceid`
--

CREATE TABLE `resourceid` (
  `rCatagory` int(11) NOT NULL,
  `rId` int(11) NOT NULL,
  `rTitle` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourceid`
--

INSERT INTO `resourceid` (`rCatagory`, `rId`, `rTitle`) VALUES
(1, 1, 'Moon'),
(1, 2, 'Sky'),
(1, 3, 'Sun'),
(1, 4, 'Saturn'),
(2, 5, 'Blue whale'),
(2, 6, 'Octopus'),
(2, 7, 'Shark'),
(2, 8, 'Oceans'),
(3, 9, 'Dinosaur'),
(3, 10, 'Tiger'),
(3, 11, 'Anaconda'),
(3, 12, 'Crocodile'),
(4, 13, 'Eagle'),
(4, 14, 'Hawk'),
(4, 15, 'Humming bird'),
(4, 16, 'Ostrich');

-- --------------------------------------------------------

--
-- Table structure for table `subprob`
--

CREATE TABLE `subprob` (
  `sub_problem_id` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `op1` varchar(50) NOT NULL,
  `op2` varchar(50) NOT NULL,
  `op3` varchar(50) NOT NULL,
  `op4` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subprob`
--

INSERT INTO `subprob` (`sub_problem_id`, `question`, `ans`, `op1`, `op2`, `op3`, `op4`) VALUES
(1, 'sneakers.jpg', '4', '3', '4', '5', '6'),
(2, 'horses.jpg', '10', '9', '12', '11', '10'),
(3, 'carrots.jpg', '25', '15', '20', '22', '25'),
(4, 'pastries.jpg', '15', '12', '15', '18', '20'),
(5, 'stars.jpg', '46', '40', '42', '45', '46'),
(11, 'pattern1.jpg', '70', '65', '71', '70', '80'),
(12, 'pattern2.jpg', '63', '62', '63', '64', '65'),
(13, 'pattern3.jpg', '16', '15', '16', '17', '18'),
(14, 'pattern4.jpg', '16', '16', '15', '12', '20'),
(15, 'pattern5.jpg', '15', '18', '15', '12', '16'),
(21, 'add1', '6', '5', '6', '7', '8'),
(22, 'add2', '7', '3', '4', '7', '5'),
(23, 'add3', '5', '4', '5', '6', '7'),
(24, 'add4', '15', '15', '20', '10', '14'),
(25, 'add5', '8', '6', '8', '10', '12'),
(26, 'sub1.jpg', '6', '6', '7', '8', '9'),
(27, 'sub2.jpg', '11', '10', '11', '12', '13'),
(28, 'sub3.jpg', '7', '7', '8', '9', '10'),
(29, 'sub4.jpg', '1', '3', '7', '1', '2'),
(30, 'sub5.jpg', '4', '1', '2', '3', '4'),
(31, 'hand1.jpg', '1', '1', '2', '3', '4'),
(32, 'hand2.jpg', 'wash hands', 'walk', 'sing a song', 'wash hands', 'nothing'),
(33, 'hand3.jpg', 'wash with soap', 'wash only with water', 'wash with soap', 'rub with cloth', 'rub with each other'),
(34, 'hand4.jpg', 'wash both hands', 'wash both hands', 'eat something', 'go for a run', 'have a shower'),
(35, 'hand5.jpg', 'paper', 'liquid soap', 'soap', 'ash', 'paper'),
(36, 'tooth1.jpg', 'at least 2 times', 'not necessary', 'sometimes', '10 times', 'at least 2 times'),
(37, 'tooth2.jpg', 'tooth brush , miswak', 'soil', 'ash', 'tree leaves', 'tooth brush , miswak'),
(38, 'tooth3.jpg', 'every corner of teeth', 'just insert into mouth', 'only the front part', 'every corner of teeth', 'swallow the toothpaste'),
(39, 'tooth4.jpg', 'after eating', 'after eating', 'before eating', 'while eating', 'anytime'),
(40, 'tooth5', 'visit a doctor to remove it', 'knock it out', 'remove using pliers at home', 'visit a doctor to remove it', 'do nothing');

-- --------------------------------------------------------

--
-- Table structure for table `subtoprob`
--

CREATE TABLE `subtoprob` (
  `sub_catagory_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `problem_title` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subtoprob`
--

INSERT INTO `subtoprob` (`sub_catagory_id`, `problem_id`, `problem_title`) VALUES
(1, 1, 'Count to 100'),
(1, 2, 'How many needed ?'),
(1, 3, 'Count next number'),
(1, 4, 'Fill the pattern'),
(3, 5, 'Add those numbers'),
(4, 6, 'Subtract those numbers'),
(5, 7, 'Taking care of hands'),
(5, 8, 'Taking care of teeth');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `birthday` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`username`, `fullname`, `birthday`, `address`, `age`, `pic`) VALUES
('user', 'Admin', '', 'BUET', '20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `probtosubprob`
--
ALTER TABLE `probtosubprob`
  ADD PRIMARY KEY (`sub_problem_id`);

--
-- Indexes for table `resourcedata`
--
ALTER TABLE `resourcedata`
  ADD UNIQUE KEY `img` (`img`),
  ADD UNIQUE KEY `img_2` (`img`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
