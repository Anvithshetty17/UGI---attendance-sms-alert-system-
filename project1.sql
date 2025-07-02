-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 02:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_no` int(10) NOT NULL,
  `a_name` varchar(29) NOT NULL,
  `s_phone` bigint(10) NOT NULL,
  `a_password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_no`, `a_name`, `s_phone`, `a_password`) VALUES
(1, 'prajna', 765432123, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_no` int(9) NOT NULL,
  `stat_id` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `st_status` varchar(20) NOT NULL,
  `stat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_no`, `stat_id`, `course`, `st_status`, `stat_date`) VALUES
(1, 'U05UI21S0001', 'accountancy', 'Present', '2024-04-05'),
(2, 'U05UI21S0002', 'accountancy', 'Present', '2024-04-05'),
(3, 'U05UI21S0003', 'accountancy', 'Absent', '2024-04-05'),
(4, 'U05UI21S0004', 'accountancy', 'Present', '2024-04-05'),
(5, 'U05UI21S0005', 'accountancy', 'Present', '2024-04-05'),
(6, 'U05UI21S0001', 'c#', 'Present', '2024-04-06'),
(7, 'U05UI21S0002', 'c#', 'Absent', '2024-04-06'),
(8, 'U05UI21S0003', 'c#', 'Absent', '2024-04-06'),
(9, 'U05UI21S0004', 'c#', 'Absent', '2024-04-06'),
(10, 'U05UI21S0005', 'c#', 'Present', '2024-04-06'),
(11, 'U05UI21S0001', 'python', 'Absent', '2024-04-06'),
(12, 'U05UI21S0002', 'python', 'Absent', '2024-04-06'),
(13, 'U05UI21S0003', 'python', 'Absent', '2024-04-06'),
(14, 'U05UI21S0004', 'python', 'Absent', '2024-04-06'),
(15, 'U05UI21S0005', 'python', 'Absent', '2024-04-06'),
(16, 'U05UI21S0001', 'java', 'Present', '2024-04-06'),
(17, 'U05UI21S0002', 'java', 'Absent', '2024-04-06'),
(18, 'U05UI21S0003', 'java', 'Absent', '2024-04-06'),
(19, 'U05UI21S0004', 'java', 'Absent', '2024-04-06'),
(20, 'U05UI21S0005', 'java', 'Absent', '2024-04-06'),
(21, 'U05UI21S0001', 'java', 'Present', '2024-04-07'),
(22, 'U05UI21S0002', 'java', 'Present', '2024-04-07'),
(23, 'U05UI21S0003', 'java', 'Absent', '2024-04-07'),
(24, 'U05UI21S0004', 'java', 'Absent', '2024-04-07'),
(25, 'U05UI21S0005', 'java', 'Absent', '2024-04-07'),
(26, 'U05UI21S0001', 'accountancy', 'Present', '2024-04-07'),
(27, 'U05UI21S0002', 'accountancy', 'Present', '2024-04-07'),
(28, 'U05UI21S0003', 'accountancy', 'Present', '2024-04-07'),
(29, 'U05UI21S0004', 'accountancy', 'Present', '2024-04-07'),
(30, 'U05UI21S0005', 'accountancy', 'Present', '2024-04-07'),
(31, 'U05UI21S0001', 'java', 'Present', '2024-04-08'),
(32, 'U05UI21S0002', 'java', 'Absent', '2024-04-08'),
(33, 'U05UI21S0003', 'java', 'Absent', '2024-04-08'),
(34, 'U05UI21S0004', 'java', 'Present', '2024-04-08'),
(35, 'U05UI21S0005', 'java', 'Absent', '2024-04-08'),
(36, 'U05UI21S0001', 'accountancy', 'Absent', '2024-04-08'),
(37, 'U05UI21S0002', 'accountancy', 'Absent', '2024-04-08'),
(38, 'U05UI21S0003', 'accountancy', 'Absent', '2024-04-08'),
(39, 'U05UI21S0004', 'accountancy', 'Absent', '2024-04-08'),
(40, 'U05UI21S0005', 'accountancy', 'Absent', '2024-04-08'),
(41, 'U05UI21S0001', 'python', 'Present', '2024-04-08'),
(42, 'U05UI21S0002', 'python', 'Absent', '2024-04-08'),
(43, 'U05UI21S0003', 'python', 'Absent', '2024-04-08'),
(44, 'U05UI21S0004', 'python', 'Absent', '2024-04-08'),
(45, 'U05UI21S0005', 'python', 'Present', '2024-04-08'),
(46, 'U05UI21S0001', 'python', 'Present', '2024-04-09'),
(47, 'U05UI21S0002', 'python', 'Present', '2024-04-09'),
(48, 'U05UI21S0003', 'python', 'Absent', '2024-04-09'),
(49, 'U05UI21S0004', 'python', 'Absent', '2024-04-09'),
(50, 'U05UI21S0005', 'python', 'Absent', '2024-04-09'),
(51, 'U05UI21S0001', 'java', 'Present', '2024-04-09'),
(52, 'U05UI21S0002', 'java', 'Present', '2024-04-09'),
(53, 'U05UI21S0003', 'java', 'Present', '2024-04-09'),
(54, 'U05UI21S0004', 'java', 'Present', '2024-04-09'),
(55, 'U05UI21S0005', 'java', 'Present', '2024-04-09'),
(56, 'u05ui21s00008', 'java', 'Present', '2024-04-12'),
(57, 'U05UI21S0001', 'java', 'Absent', '2024-04-12'),
(58, 'U05UI21S0002', 'java', 'Absent', '2024-04-12'),
(59, 'U05UI21S0003', 'java', 'Absent', '2024-04-12'),
(60, 'U05UI21S0004', 'java', 'Absent', '2024-04-12'),
(61, 'U05UI21S0005', 'java', 'Absent', '2024-04-12'),
(62, 'u05ui21s00008', 'java', 'Present', '2024-04-12'),
(63, 'U05UI21S0001', 'java', 'Present', '2024-04-12'),
(64, 'U05UI21S0002', 'java', 'Absent', '2024-04-12'),
(65, 'U05UI21S0003', 'java', 'Absent', '2024-04-12'),
(66, 'U05UI21S0004', 'java', 'Absent', '2024-04-12'),
(67, 'U05UI21S0005', 'java', 'Absent', '2024-04-12'),
(68, 'u05ui21s00008', 'java', 'Present', '2024-04-12'),
(69, 'U05UI21S0001', 'java', 'Present', '2024-04-12'),
(70, 'U05UI21S0002', 'java', 'Absent', '2024-04-12'),
(71, 'U05UI21S0003', 'java', 'Absent', '2024-04-12'),
(72, 'U05UI21S0004', 'java', 'Absent', '2024-04-12'),
(73, 'U05UI21S0005', 'java', 'Absent', '2024-04-12'),
(74, 'u05ui21s00008', 'java', 'Present', '2024-04-14'),
(75, 'U05UI21S0001', 'java', 'Present', '2024-04-14'),
(76, 'U05UI21S0002', 'java', 'Present', '2024-04-14'),
(77, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(78, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(79, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(80, 'u05ui21s00008', 'java', 'Absent', '2024-04-14'),
(81, 'U05UI21S0001', 'java', 'Present', '2024-04-14'),
(82, 'U05UI21S0002', 'java', 'Present', '2024-04-14'),
(83, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(84, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(85, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(86, 'u05ui21s00008', 'SOCIAL MEDIA', 'Present', '2024-04-14'),
(87, 'U05UI21S0001', 'SOCIAL MEDIA', 'Absent', '2024-04-14'),
(88, 'U05UI21S0002', 'SOCIAL MEDIA', 'Absent', '2024-04-14'),
(89, 'U05UI21S0003', 'SOCIAL MEDIA', 'Absent', '2024-04-14'),
(90, 'U05UI21S0004', 'SOCIAL MEDIA', 'Absent', '2024-04-14'),
(91, 'U05UI21S0005', 'SOCIAL MEDIA', 'Absent', '2024-04-14'),
(92, 'u05ui21s00008', 'python', 'Present', '2024-04-14'),
(93, 'U05UI21S0001', 'python', 'Absent', '2024-04-14'),
(94, 'U05UI21S0002', 'python', 'Absent', '2024-04-14'),
(95, 'U05UI21S0003', 'python', 'Absent', '2024-04-14'),
(96, 'U05UI21S0004', 'python', 'Absent', '2024-04-14'),
(97, 'U05UI21S0005', 'python', 'Absent', '2024-04-14'),
(98, 'u05ui21s00008', 'java', 'Present', '2024-04-14'),
(99, 'U05UI21S0001', 'java', 'Absent', '2024-04-14'),
(100, 'U05UI21S0002', 'java', 'Absent', '2024-04-14'),
(101, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(102, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(103, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(104, 'u05ui21s00008', 'java', 'Absent', '2024-04-14'),
(105, 'U05UI21S0001', 'java', 'Absent', '2024-04-14'),
(106, 'U05UI21S0002', 'java', 'Absent', '2024-04-14'),
(107, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(108, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(109, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(110, 'u05ui21s00008', 'java', 'Absent', '2024-04-14'),
(111, 'U05UI21S0001', 'java', 'Absent', '2024-04-14'),
(112, 'U05UI21S0002', 'java', 'Absent', '2024-04-14'),
(113, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(114, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(115, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(116, 'u05ui21s00008', 'java', 'Present', '2024-04-14'),
(117, 'U05UI21S0001', 'java', 'Absent', '2024-04-14'),
(118, 'U05UI21S0002', 'java', 'Absent', '2024-04-14'),
(119, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(120, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(121, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(122, 'u05ui21s00008', 'java', 'Absent', '2024-04-14'),
(123, 'U05UI21S0001', 'java', 'Present', '2024-04-14'),
(124, 'U05UI21S0002', 'java', 'Absent', '2024-04-14'),
(125, 'U05UI21S0003', 'java', 'Absent', '2024-04-14'),
(126, 'U05UI21S0004', 'java', 'Absent', '2024-04-14'),
(127, 'U05UI21S0005', 'java', 'Absent', '2024-04-14'),
(128, 'U05UI21S0001', 'java', 'Present', '2024-04-21'),
(129, 'U05UI21S0002', 'java', 'Absent', '2024-04-21'),
(130, 'U05UI21S0003', 'java', 'Present', '2024-04-21'),
(131, 'U05UI21S0001', 'java', 'Absent', '2024-04-22'),
(132, 'U05UI21S0002', 'java', 'Absent', '2024-04-22'),
(133, 'U05UI21S0003', 'java', 'Absent', '2024-04-22'),
(134, 'U05UI21S0001', 'python', 'Absent', '2024-04-22'),
(135, 'U05UI21S0002', 'python', 'Present', '2024-04-22'),
(136, 'U05UI21S0003', 'python', 'Absent', '2024-04-22'),
(137, 'U05UI21S0001', 'java', 'Absent', '2024-04-22'),
(138, 'U05UI21S0002', 'java', 'Absent', '2024-04-22'),
(139, 'U05UI21S0003', 'java', 'Absent', '2024-04-22'),
(140, 'U05UI21S0004', 'java', 'Absent', '2024-04-22'),
(141, 'U05UI21S0001', 'java', 'Absent', '2024-05-17'),
(142, 'U05UI21S0002', 'java', 'Present', '2024-05-17'),
(143, 'U05UI21S0003', 'java', 'Absent', '2024-05-17'),
(144, 'U05UI21S0004', 'java', 'Present', '2024-05-17'),
(145, 'U05UI21S0001', 'c#', 'Present', '2024-05-17'),
(146, 'U05UI21S0002', 'c#', 'Absent', '2024-05-17'),
(147, 'U05UI21S0003', 'c#', 'Present', '2024-05-17'),
(148, 'U05UI21S0004', 'c#', 'Present', '2024-05-17'),
(149, 'U05UI21S0001', 'python', 'Present', '2025-06-23'),
(150, 'U05UI21S0002', 'python', 'Present', '2025-06-23'),
(151, 'U05UI21S0003', 'python', 'Present', '2025-06-23'),
(152, 'U05UI21S0004', 'python', 'Absent', '2025-06-23'),
(153, 'u05ui21s00015', 'python', 'Present', '2025-06-23'),
(154, 'U05UI21S0002', 'python', 'Present', '2025-06-23'),
(155, 'U05UI21S0003', 'python', 'Present', '2025-06-23'),
(156, 'U05UI21S0004', 'python', 'Present', '2025-06-23'),
(157, 'u05ui21s00015', 'python', 'Present', '2025-06-23'),
(158, 'U05UI21S0002', 'python', 'Present', '2025-06-23'),
(159, 'U05UI21S0003', 'python', 'Present', '2025-06-23'),
(160, 'U05UI21S0004', 'python', 'Present', '2025-06-23'),
(161, 'u05ui21s00015', 'python', 'Absent', '2025-06-23'),
(162, 'U05UI21S0002', 'python', 'Present', '2025-06-23'),
(163, 'U05UI21S0003', 'python', 'Present', '2025-06-23'),
(164, 'U05UI21S0004', 'python', 'Present', '2025-06-23'),
(165, 'U05UI21S0017', 'python', 'Present', '2025-06-23'),
(166, '1', 'python', 'Absent', '2025-06-23'),
(167, 'u05ui21s00015', 'python', 'Present', '2025-06-23'),
(168, 'U05UI21S0002', 'python', 'Present', '2025-06-23'),
(169, 'U05UI21S0003', 'python', 'Present', '2025-06-23'),
(170, 'U05UI21S0004', 'python', 'Present', '2025-06-23'),
(171, 'U05UI21S0017', 'python', 'Present', '2025-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_no` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_no`, `c_name`) VALUES
(1, 'BCA'),
(2, 'bcom'),
(3, 'BBA'),
(4, 'BCOM');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `no` int(10) NOT NULL,
  `st_id` varchar(20) NOT NULL,
  `st_name` varchar(20) NOT NULL,
  `st_dept` varchar(30) NOT NULL,
  `st_phone` bigint(10) NOT NULL,
  `st_email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`no`, `st_id`, `st_name`, `st_dept`, `st_phone`, `st_email`, `password`) VALUES
(2, 'U05UI21S0002', 'ADHITHYA', 'BCA', 1234567890, 'ADHITHYA@GMAIL.COM', '1234'),
(3, 'U05UI21S0003', 'AKSHAY', 'BCA', 1234567890, 'AKSHAY@GMAIL.COM', '1234'),
(4, 'U05UI21S0004', 'akil', 'BCA', 2132345678, 'akil@gmail.com', '1234'),
(5, 'u05ui21s00015', 'Anvith shetty', 'BCA', 7204947177, 'anvithshetty555@gmai', '1234'),
(6, 'U05UI21S0017', 'Anvith shetty', 'BCA', 917204947177, 'anvithshetty555@gmai', '1234'),
(7, '1', 'Anvith shetty', 'BCA', 8296507804, 'nnm24mc015@nmamit.in', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_no` int(10) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `course` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_no`, `sub_code`, `sub_name`, `course`) VALUES
(1, 'bca01', 'java', 'bca'),
(2, 'bca02', 'python', 'bca'),
(3, 'bcom01', 'accountancy', 'bcom'),
(4, 'bca03', 'c#', 'bca'),
(5, 'BBA01', 'SOCIAL MEDIA', 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `t_phone` bigint(10) NOT NULL,
  `course` varchar(20) NOT NULL,
  `t_sub` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_phone`, `course`, `t_sub`, `password`) VALUES
(1, 'Anvith Shetty', 2342342213, 'bca', 'python', '1234'),
(2, 'sujan', 2342346578, 'bca', 'c#', '1234'),
(3, 'akshay', 4575456890, 'bcom', 'accountancy', '1234'),
(4, 'rahul', 2342342213, 'bca', 'accountancy', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_no`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_no`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_no` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
