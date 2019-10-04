-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 08:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `CourseName` varchar(100) NOT NULL,
  `courseCode` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`CourseName`, `courseCode`, `createdBy`, `timeStamp`) VALUES
('', '0001', 'user1', '2019-10-04 00:00:00'),
('Post-retirement medical benefits', '001', 'user1', '2019-10-04 12:16:26'),
('Performance feedback', '002', 'user1', '2019-10-04 00:00:00'),
('PMS', '003', 'user1', '2019-10-04 00:00:00'),
('Dynamics of mentoring', '004', 'user2', '2019-10-04 00:00:00'),
('Domestic Inquiry', '005', 'user2', '2019-10-04 00:00:00'),
('Reservation policy, administration and implementation of statues', '006', 'user3', '2019-10-04 00:00:00'),
('IA NR terminal depots', '007', 'user3', '2019-10-04 00:00:00'),
('Medical Benefits', '008', 'user3', '2019-10-04 00:00:00'),
('SAP HR', '009', 'user3', '2019-10-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courseganttchart`
--

CREATE TABLE `courseganttchart` (
  `CourseName` varchar(100) NOT NULL,
  `phase1` tinyint(4) NOT NULL DEFAULT 0,
  `actual1` int(11) NOT NULL DEFAULT 0,
  `phase2` tinyint(4) NOT NULL DEFAULT 0,
  `actual2` int(11) NOT NULL DEFAULT 0,
  `phase3` tinyint(4) NOT NULL DEFAULT 0,
  `actual3` int(11) NOT NULL DEFAULT 0,
  `phase4` tinyint(4) NOT NULL DEFAULT 0,
  `actual4` int(11) NOT NULL DEFAULT 0,
  `phase5` tinyint(4) NOT NULL DEFAULT 0,
  `actual5` int(11) NOT NULL DEFAULT 0,
  `phase6` tinyint(4) NOT NULL DEFAULT 0,
  `actual6` int(11) NOT NULL DEFAULT 0,
  `phase7` tinyint(4) NOT NULL DEFAULT 0,
  `actual7` int(11) NOT NULL DEFAULT 0,
  `phase8` tinyint(4) NOT NULL DEFAULT 0,
  `actual8` int(11) NOT NULL DEFAULT 0,
  `phase9` tinyint(4) NOT NULL DEFAULT 0,
  `actual9` int(11) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseganttchart`
--

INSERT INTO `courseganttchart` (`CourseName`, `phase1`, `actual1`, `phase2`, `actual2`, `phase3`, `actual3`, `phase4`, `actual4`, `phase5`, `actual5`, `phase6`, `actual6`, `phase7`, `actual7`, `phase8`, `actual8`, `phase9`, `actual9`, `id`) VALUES
('Medical Benefits', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 43);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `uname`, `pwd`, `dept`) VALUES
(1, 'user1', 'pwd1', '001'),
(2, 'user2', 'pwd2', '001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD UNIQUE KEY `courseCode` (`courseCode`),
  ADD UNIQUE KEY `CourseName` (`CourseName`);

--
-- Indexes for table `courseganttchart`
--
ALTER TABLE `courseganttchart`
  ADD PRIMARY KEY (`CourseName`),
  ADD KEY `id` (`id`),
  ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseganttchart`
--
ALTER TABLE `courseganttchart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
