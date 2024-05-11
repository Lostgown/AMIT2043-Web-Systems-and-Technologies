-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 08:21 AM
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
-- Database: `amit-2043`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(5) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `ic_no` varchar(14) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `recovery_no` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `ic_no`, `admin_pass`, `phone_no`, `gender`, `email`, `birth_date`, `recovery_no`) VALUES
('A1', 'Lim Shiow Yi', '050409-07-0654', 'abcde', '010-1199110', 'F', 'limsy-pm23@student.tarc.edu.my', '2005-04-09', 568742),
('A2', 'Teoh Ming Geng', '050409-07-0653', 'abcde', '010-1119901', 'M', 'teohmg@gmail.com', '2005-05-10', 984357),
('A3', 'Raymond Goh Cheng Chen', '050207-07-0563', 'aaaa', '014-2429675', 'M', 'gohchengchen98@gmail.con', '2005-02-07', 666741);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(5) NOT NULL,
  `event_id` varchar(5) NOT NULL,
  `member_id` varchar(5) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `event_id`, `member_id`, `booking_date`, `booking_time`) VALUES
('B1', 'E1', 'M1', '2024-04-05', '18:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` varchar(5) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `event_name` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` longtext NOT NULL,
  `pax` int(3) NOT NULL,
  `remaining_pax` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `imgpath`, `event_name`, `date`, `start_time`, `end_time`, `description`, `pax`, `remaining_pax`) VALUES
('E1', '', 'Training', '2024-04-23', '16:00:00', '18:00:00', 'Usual Training', 30, 15);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(5) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `ic_no` varchar(14) NOT NULL,
  `member_pass` varchar(50) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `recovery_no` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `ic_no`, `member_pass`, `phone_no`, `gender`, `email`, `birth_date`, `recovery_no`) VALUES
('M1', 'Woo Yee Ping', '051223-07-0532', 'abcde', '012-3445444', 'M', 'wyp@gmail.com', '2005-12-23', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `FOREIGN` (`event_id`,`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
