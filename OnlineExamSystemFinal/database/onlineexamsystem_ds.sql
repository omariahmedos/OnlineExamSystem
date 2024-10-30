-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 07:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexamsystem_ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(35) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ahemed', 'alomri2014@cc', 'As', 'K'),
(2, 'AHMED ABDURABOH ALOMARI', 'aalomari2114@gmail.com', 'xxx', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(12) NOT NULL,
  `category` varchar(50) NOT NULL,
  `exam_time_in_seconds` char(2) NOT NULL,
  `exam_per` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `category`, `exam_time_in_seconds`, `exam_per`) VALUES
(4, 'Computer-Basics', '30', '50'),
(5, 'test', '40', '70'),
(6, 'test1', '40', '98'),
(7, 'test2', '30', '50');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(12) NOT NULL,
  `tName` varchar(50) NOT NULL,
  `tTime` char(2) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentUsername` varchar(50) NOT NULL,
  `studentPASSPORT` varchar(15) NOT NULL,
  `totalQuestions` varchar(3) NOT NULL,
  `correctAnswer` varchar(3) NOT NULL,
  `wrongAnswer` varchar(3) NOT NULL,
  `persontage` varchar(4) NOT NULL,
  `remarks` varchar(10) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `tName`, `tTime`, `studentName`, `studentUsername`, `studentPASSPORT`, `totalQuestions`, `correctAnswer`, `wrongAnswer`, `persontage`, `remarks`, `date`) VALUES
(10, 'Computer-Basics', '30', 'Ahmed', 'TP053429', '08187635', '2', '1', '1', '50.0', 'Pass', '2021-12-29 '),
(11, 'Computer-Basics', '30', 'Omar', 'TP051112', '08187636', '2', '1', '1', '50.0', 'Pass', '2021-12-30 '),
(12, 'Computer-Basics', '30', 'Khaled', 'TP051111', '08187634', '2', '1', '1', '50.0', 'Pass', '2021-12-30 ');

-- --------------------------------------------------------

--
-- Table structure for table `exam_status`
--

CREATE TABLE `exam_status` (
  `id` int(12) NOT NULL,
  `activeUser` varchar(50) NOT NULL,
  `sPASSPORT` varchar(15) NOT NULL,
  `activeExam` varchar(50) NOT NULL,
  `questionNO` varchar(3) NOT NULL,
  `score` varchar(3) NOT NULL,
  `passPer` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_status`
--

INSERT INTO `exam_status` (`id`, `activeUser`, `sPASSPORT`, `activeExam`, `questionNO`, `score`, `passPer`) VALUES
(35, 'asad', 'n/a', 'Computer-Basics', '1', '0', '50'),
(36, 'alihaider', 'n/a', 'Computer-Basics', '1', '0', '50'),
(37, 'fahad', 'n/a', 'Computer-Basics', '1', '0', '50');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(20) NOT NULL,
  `question_no` varchar(3) NOT NULL,
  `question` varchar(100) NOT NULL,
  `op1` varchar(50) NOT NULL,
  `op2` varchar(50) NOT NULL,
  `op3` varchar(50) NOT NULL,
  `op4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `op1`, `op2`, `op3`, `op4`, `answer`, `category`) VALUES
(8, '1', 'The binary system uses powers of', ' 2', '10', '8', '16', '2', 'Computer-Basics'),
(7, '2', 'The brain of any computer system is ', ' ALU', 'Memory', 'CPU', 'Control Unit', 'CPU', 'Computer-Basics');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `passport` varchar(15) NOT NULL,
  `enroll` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `passport`, `enroll`) VALUES
(6, 'Khaled', 'Othman', 'TP051111', 'TP051111', '08187634', '1'),
(7, 'Ahmed', 'Al-Omari', 'TP053429', 'TP053429', '08187635', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_unlock`
--

CREATE TABLE `test_unlock` (
  `sn` int(20) NOT NULL,
  `test_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_unlock`
--

INSERT INTO `test_unlock` (`sn`, `test_name`) VALUES
(1, 'Computer-Basics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_status`
--
ALTER TABLE `exam_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_unlock`
--
ALTER TABLE `test_unlock`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_status`
--
ALTER TABLE `exam_status`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `test_unlock`
--
ALTER TABLE `test_unlock`
  MODIFY `sn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
