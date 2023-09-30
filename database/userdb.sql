-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2023 at 04:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(170) NOT NULL,
  `password` varchar(170) NOT NULL,
  `role` varchar(170) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `role`) VALUES
(110, 'mark', 'B', 'PH', 'mark@gmail.com', 'mark', 'admin'),
(111, 'admin', 'nis', 'trator', 'admin@gmail.com', 'admin123', 'admin'),
(112, 'mark', 'v', 'de leon', 'principal@gmail.com', 'principal', 'principal');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(222) NOT NULL,
  `employeeid` varchar(170) NOT NULL,
  `firstname` varchar(170) NOT NULL,
  `lastname` varchar(170) NOT NULL,
  `middlename` varchar(170) NOT NULL,
  `gender` varchar(170) NOT NULL,
  `position` varchar(170) NOT NULL,
  `address` varchar(170) NOT NULL,
  `dateofbirth` date NOT NULL,
  `phonenumber` varchar(170) NOT NULL,
  `email` varchar(170) NOT NULL,
  `role` varchar(170) NOT NULL DEFAULT 'employee',
  `startdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeeid`, `firstname`, `lastname`, `middlename`, `gender`, `position`, `address`, `dateofbirth`, `phonenumber`, `email`, `role`, `startdate`) VALUES
(8, '213', 'dwa', 'daw', 'daw', 'male', 'Utility 8', 'dawdaw', '2023-09-13', 'dawdwa', 'albenruel@gmail.com', 'employee', '2023-09-24 14:50:05'),
(9, '213', 'dwa', 'daw', 'daw', 'male', 'Utility 8', 'dawdaw', '2023-09-13', 'dawdwa', 'albenruel@gmail.com', 'employee', '2023-09-24 14:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeid` int(111) NOT NULL,
  `lrn` int(111) NOT NULL,
  `subjectid` int(111) NOT NULL,
  `gradingperiodid` int(111) NOT NULL,
  `grade` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeid`, `lrn`, `subjectid`, `gradingperiodid`, `grade`) VALUES
(1, 12324232, 1101, 1, 89),
(2, 12324232, 1101, 1, 89);

-- --------------------------------------------------------

--
-- Table structure for table `gradingsystem`
--

CREATE TABLE `gradingsystem` (
  `id` int(11) NOT NULL,
  `lrn` int(111) NOT NULL,
  `gradingperiod` varchar(111) NOT NULL,
  `english` int(11) NOT NULL,
  `mathematics` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `filipino` int(11) NOT NULL,
  `aralingpanlipunan` int(11) NOT NULL,
  `esp` int(11) NOT NULL,
  `mapeh` int(11) NOT NULL,
  `tle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradingsystem`
--

INSERT INTO `gradingsystem` (`id`, `lrn`, `gradingperiod`, `english`, `mathematics`, `science`, `filipino`, `aralingpanlipunan`, `esp`, `mapeh`, `tle`) VALUES
(1, 12324232, '1', 88, 89, 87, 80, 90, 98, 78, 89),
(2, 12324232, '2', 88, 89, 87, 80, 90, 98, 78, 89),
(3, 122367766, '1', 80, 81, 82, 83, 84, 85, 86, 87),
(5, 122367766, '2', 88, 88, 89, 89, 87, 87, 86, 86),
(6, 12324232, '3', 88, 88, 78, 90, 91, 77, 88, 88),
(7, 12324232, '4', 80, 81, 87, 84, 84, 86, 89, 87);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(244) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `middlename` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `dateofbirth` varchar(55) NOT NULL,
  `bloodgroup` varchar(55) NOT NULL,
  `religion` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `grade` varchar(55) NOT NULL,
  `section` varchar(55) NOT NULL,
  `lrn` varchar(55) NOT NULL,
  `phonenumber` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL DEFAULT 'student',
  `dateenrolled` timestamp NOT NULL DEFAULT current_timestamp(),
  `class_id` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `dateofbirth`, `bloodgroup`, `religion`, `email`, `password`, `grade`, `section`, `lrn`, `phonenumber`, `role`, `dateenrolled`, `class_id`) VALUES
(17, 'Sandy', 'nicole', 'magsino', 'Female', '15/08/2002', 'A+', 'Christian', 'sandynicole@gmail.com', 'sandynicole', '7', '1', '12324232', '0923212323', 'student', '2023-09-24 07:36:45', 2),
(19, 'juan', 'V', 'Dela cruz', 'Male', '07/08/2023', 'A+', 'Christian', 'juanv@gmail.com', 'juan', '10', '1', '12123', '41321', 'student', '2023-09-26 11:12:19', 0),
(20, 'patrick', 'A', 'Quial', 'Male', '08/09/2023', 'A-', 'Islam', 'dwadwa@gmail.com', 'lance', '9', '1', '12121', '23213', 'student', '2023-09-27 14:55:41', 0),
(21, 'Joe', 'V', 'etn', 'Male', '08/09/2023', 'A-', 'Christian', 'joe@gmail.com', 'joe', '8', '1', '1111', '09123213', 'student', '2023-09-28 01:38:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(111) NOT NULL,
  `subjectname` varchar(111) NOT NULL,
  `subjectcode` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectname`, `subjectcode`) VALUES
(1, 'math', 1101);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(244) NOT NULL,
  `prcid` varchar(19) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `middlename` varchar(35) NOT NULL,
  `gender` varchar(35) NOT NULL,
  `advisoryclass` varchar(35) NOT NULL,
  `address` varchar(35) NOT NULL,
  `dateofbirth` varchar(35) NOT NULL,
  `phonenumber` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` varchar(35) NOT NULL DEFAULT 'teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `prcid`, `firstname`, `lastname`, `middlename`, `gender`, `advisoryclass`, `address`, `dateofbirth`, `phonenumber`, `email`, `password`, `role`) VALUES
(25, '111-135', 'Ingrid', 'Alexandra', 'V', 'female', '8', 'Taboc Borongan City', '2002-09-20', '09194264234', 'ingridalexandra@gmail.com', 'ingrid', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `type`, `date_created`) VALUES
(1, 'Administrator', '', 'admin', '0192023a7bbd73250516f069df18b500', 1, '2020-11-20 13:25:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeid`);

--
-- Indexes for table `gradingsystem`
--
ALTER TABLE `gradingsystem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gradingsystem`
--
ALTER TABLE `gradingsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
