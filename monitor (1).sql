-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 11:53 AM
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
('Post-retirement medical benefits', '001', '', '2019-10-01 14:56:28'),
('Reservation policy, administration and implementation of statues', '002', '', '2019-10-01 14:56:28'),
('Dynamics of Mentoring', '003', '', '2019-10-01 14:56:28'),
('IA NR terminal depots', '004', '', '2019-10-01 14:56:28'),
('Medical benefits', '005', '', '2019-10-01 14:56:28'),
('Domestic Inquiry', '006', '', '2019-10-01 14:56:28'),
('Performance feedback', '007', '', '2019-10-01 14:56:28'),
('PMS', '008', '', '2019-10-01 14:56:28'),
('SAP HR', '009', '', '2019-10-01 14:56:28');

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
('', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 34),
('Domestic Inquiry', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35),
('Dynamics of Mentoring', 0, 5, 0, 7, 0, 4, 0, 54, 0, 55, 0, 55, 0, 55, 0, 55, 0, 55, 33),
('Performance feedback', 1, 5, 1, 4, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 36),
('PMS', 1, 3, 1, 5, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 32),
('Reservation policy, administration and implementation of statues', 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 31),
('SAP HR', 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD UNIQUE KEY `courseCode` (`courseCode`);

--
-- Indexes for table `courseganttchart`
--
ALTER TABLE `courseganttchart`
  ADD PRIMARY KEY (`CourseName`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseganttchart`
--
ALTER TABLE `courseganttchart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
