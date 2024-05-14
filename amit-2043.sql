-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 04:24 PM
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
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `ic_no`, `admin_pass`, `phone_no`, `gender`, `email`, `birth_date`) VALUES
('A0001', 'Lim Shiow Yi', '050409-07-0654', 'abcde', '010-1199110', 'F', 'limsy-pm23@student.tarc.edu.my', '2005-04-09'),
('A0002', 'Teoh Ming Geng', '050409-07-0653', 'TMgeng050409', '010-1119901', 'M', 'teohmg@gmail.com', '2005-05-10'),
('A0003', 'Raymond Goh Cheng Chen', '050207-07-0563', 'Gcc050617.', '014-2429675', 'M', 'gohchengchen98@gmail.con', '2005-02-07'),
('A0004', 'Ng Jun Wei', '050409-07-0654', 'Ngjw050409', '011-1234567', 'M', 'junwei27@gmail.com', '2005-02-08'),
('A0005', 'Yew Zi Jian', '050409-07-0653', 'Yewzj050409', '016-5450219', 'M', 'zijian0613yew@gmail.com', '2005-07-01'),
('A0006', 'Aldus Whistan', '692436-04-8101', 'vY88498812Aw', '012-7305849', 'F', 'awhistan0@odnoklassniki.ru', '2000-05-25'),
('A0007', 'Nicolina Fallows', '383582-09-9138', 'zV75378939WG=8jIT/)\"', '019-07512723', 'F', 'nfallows1@symantec.com', '1993-12-26'),
('A0008', 'Harmony Gredden', '442828-02-3147', 'yY97288451bF>GZMW}', '019-9553541', 'F', 'hgredden2@google.pl', '2014-08-03'),
('A0009', 'Doralyn Northley', '265767-06-4845', 'lI12062703r', '018-9692151', 'M', 'dnorthley3@weebly.com', '1999-08-26'),
('A0010', 'Krissie Clemenzi', '560811-09-0147', 'gK14068278DY)=HSmi\"v', '014-5859458', 'F', 'kclemenzi4@hibu.com', '1985-09-24'),
('A0011', 'Collete Dyke', '946620-02-4698', 'kC34242700d', '011-0604669', 'F', 'cdyke5@slideshare.net', '2005-09-13'),
('A0012', 'Mala Renney', '906946-09-2586', 'yY05778888h>JAHh#', '016-1835570', 'F', 'mrenney6@ovh.net', '1958-01-31'),
('A0013', 'Corrine Clackson', '758801-01-2810', 'hP11551228B,Rby', '017-8491219', 'F', 'cclackson7@soundcloud.com', '1964-08-24'),
('A0014', 'Henryetta Conklin', '942127-05-7838', 'kD36667069WR#', '019-4571839', 'M', 'hconklin8@wordpress.com', '1997-12-31'),
('A0015', 'Olva Alyukin', '103857-04-0972', 'qF64423827G\"Kfu', '019-2861184', 'F', 'oalyukin9@businessweek.com', '1997-10-02'),
('A0016', 'Shurlock Dunnet', '350525-00-6814', 'uX24195652ZABg2', '018-9079734', 'F', 'sdunneta@auda.org.au', '1990-06-15'),
('A0017', 'Shayne Henrie', '429190-08-8019', 'gP21334407n}NYWfPeVp', '010-7535607', 'M', 'shenrieb@zdnet.com', '2002-05-14'),
('A0018', 'Gayle Dorrins', '169930-01-7535', 'jP30728035BP/J', '010-5476587', 'F', 'gdorrinsc@discuz.net', '2010-11-19'),
('A0019', 'Marion Davinet', '567218-03-2773', 'kA66906970VddrL#n', '017-2143387', 'M', 'mdavinetd@moonfruit.com', '2010-10-28'),
('A0020', 'Chevalier Van Oord', '561160-02-0191', 'cN77094440\"ufctoH', '019-1596309', 'F', 'cvane@t.co', '2009-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(5) NOT NULL,
  `event_id` varchar(5) NOT NULL,
  `member_id` varchar(5) NOT NULL,
  `category` varchar(2) NOT NULL,
  `level` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `event_id`, `member_id`, `category`, `level`, `booking_date`, `booking_time`) VALUES
('B0001', 'E0001', 'M0001', 'MS', 'BGN', '2024-04-05', '18:59:19'),
('B0002', 'E0005', 'M0001', 'MS', 'BGN', '2024-05-13', '22:53:01'),
('B0003', 'E0003', 'M0001', 'MS', 'BGN', '2024-05-14', '22:16:35'),
('B0004', 'E0006', 'M0001', 'MS', 'BGN', '2024-05-14', '22:16:52'),
('B0005', 'E0007', 'M0001', 'MS', 'BGN', '2024-05-14', '22:16:56'),
('B0006', 'E0009', 'M0001', 'MS', 'BGN', '2024-05-14', '22:16:59'),
('B0007', 'E0016', 'M0001', 'MS', 'BGN', '2024-05-14', '22:17:03'),
('B0008', 'E0019', 'M0001', 'MS', 'BGN', '2024-05-14', '22:17:08'),
('B0009', 'E0010', 'M0001', 'MS', 'BGN', '2024-05-14', '22:17:11'),
('B0010', 'E0008', 'M0001', 'MS', 'BGN', '2024-05-14', '22:17:14'),
('B0011', 'E0015', 'M0001', 'MS', 'BGN', '2024-05-14', '22:17:20'),
('B0012', 'E0009', 'M0002', 'MS', 'BGN', '2024-05-14', '22:17:50'),
('B0013', 'E0003', 'M0002', 'MS', 'BGN', '2024-05-14', '22:17:56'),
('B0014', 'E0008', 'M0002', 'MS', 'BGN', '2024-05-14', '22:18:01'),
('B0015', 'E0011', 'M0002', 'MS', 'BGN', '2024-05-14', '22:18:05'),
('B0016', 'E0012', 'M0002', 'MS', 'BGN', '2024-05-14', '22:18:08'),
('B0017', 'E0013', 'M0002', 'MS', 'BGN', '2024-05-14', '22:18:14'),
('B0018', 'E0007', 'M0003', 'WS', 'ITM', '2024-05-14', '22:18:44'),
('B0019', 'E0009', 'M0003', 'WS', 'ITM', '2024-05-14', '22:18:50'),
('B0020', 'E0014', 'M0003', 'WS', 'ITM', '2024-05-14', '22:18:56'),
('B0021', 'E0015', 'M0003', 'WS', 'ITM', '2024-05-14', '22:19:05'),
('B0022', 'E0008', 'M0004', 'WD', 'ITM', '2024-05-14', '22:19:30'),
('B0023', 'E0016', 'M0004', 'WD', 'ITM', '2024-05-14', '22:19:37'),
('B0024', 'E0020', 'M0004', 'WD', 'ITM', '2024-05-14', '22:19:46'),
('B0025', 'E0003', 'M0005', 'MD', 'PRO', '2024-05-14', '22:20:04'),
('B0026', 'E0020', 'M0005', 'XD', 'PRO', '2024-05-14', '22:20:13'),
('B0027', 'E0010', 'M0005', 'XD', 'PRO', '2024-05-14', '22:20:21');

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
  `remaining_pax` int(3) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `imgpath`, `event_name`, `date`, `start_time`, `end_time`, `description`, `pax`, `remaining_pax`, `status`) VALUES
('E0001', 'event-1.png', 'Training', '2024-04-23', '16:00:00', '18:00:00', 'Usual Training', 30, 29, 'Completed'),
('E0002', 'event-2.png', 'Badminton Training', '2024-04-25', '17:00:00', '19:00:00', 'Training', 40, 40, 'Completed'),
('E0003', 'event-2.png', 'Badminton Training', '2024-07-18', '17:00:00', '19:00:00', 'Training', 40, 37, 'Pending'),
('E0004', 'event-1.png', 'Badminton Training', '2024-07-22', '17:00:00', '19:00:00', 'Training', 40, 0, 'Pending'),
('E0005', '../photo/6641e8337489b.jpg', 'Badminton Tournament', '2024-05-30', '18:14:00', '19:14:00', 'fun', 50, 49, 'Pending'),
('E0006', '../photo/664365cad4aaa.jpg', 'Team Building Event', '2024-05-29', '15:00:00', '17:00:00', 'To strengthen the bond between members and committee', 60, 59, 'Pending'),
('E0007', '../photo/664367195cdab.jpg', 'Training 17 May', '2024-05-17', '15:00:00', '17:30:00', 'Physical Training and Footwork Training', 20, 18, 'Pending'),
('E0008', '../photo/66436807442ae.jpg', 'Training 20 May', '2024-05-20', '17:00:00', '19:00:00', 'Highly recommend men\'s single player to join', 20, 17, 'Pending'),
('E0009', '../photo/664368cf771a9.jpg', 'Training 25 May', '2024-05-25', '15:00:00', '17:00:00', 'Netshot Training', 20, 17, 'Pending'),
('E0010', '../photo/664369785c9ae.jpg', 'Training 27 May', '2024-05-27', '15:00:00', '17:00:00', 'Smash Training', 20, 18, 'Pending'),
('E0011', '../photo/664369fed8378.jpg', 'Training 29 May', '2024-05-29', '15:00:00', '17:00:00', 'Defend Training', 20, 19, 'Pending'),
('E0012', '../photo/66436b481f74c.jpg', 'Annual Training Camp', '2024-06-02', '13:00:00', '19:00:00', 'Gather around and have fun', 80, 79, 'Pending'),
('E0013', '../photo/66436cb0af842.jpg', 'Men\'s Double Training 6 June', '2024-06-06', '13:00:00', '15:00:00', 'Men\'s Double Training\r\nHighly recommend double player to join', 20, 19, 'Pending'),
('E0014', '../photo/66436e50a58c7.jpg', 'Training 8 June', '2024-06-08', '13:00:00', '15:00:00', 'Game Day ', 20, 19, 'Pending'),
('E0015', '../photo/66436e96a27e8.jpg', 'Training 10 June', '2024-06-10', '13:00:00', '15:00:00', 'Variety Shots Training', 20, 18, 'Pending'),
('E0016', '../photo/66436f17aea29.jpg', 'Mentality Training', '2024-06-12', '13:00:00', '17:00:00', 'Mentality is important in a game', 50, 48, 'Pending'),
('E0017', '../photo/664370b74259a.jpg', 'Training 14 June', '2024-06-14', '15:00:00', '17:00:00', 'Fun Game Day ', 20, 20, 'Pending'),
('E0018', '../photo/6643713002665.jpg', 'Training 16 June', '2024-06-16', '17:00:00', '19:00:00', 'Footwork Training', 20, 20, 'Pending'),
('E0019', '../photo/664371977591d.jpg', 'Training 18 June', '2024-06-18', '16:00:00', '18:00:00', 'Smash Training', 20, 19, 'Pending'),
('E0020', '../photo/664372017780b.jpg', 'Training 20 June', '2024-05-20', '15:00:00', '17:00:00', 'In-game Strategy Training', 50, 48, 'Pending');

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
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `ic_no`, `member_pass`, `phone_no`, `gender`, `email`, `birth_date`) VALUES
('M0001', 'Woo Yee Ping', '051223-07-0532', 'abcde', '012-3445444', 'M', 'wyp@gmail.com', '2005-12-23'),
('M0002', 'Aiman', '030207-07-0321', 'mO30051996S1', '012-5678899', 'M', 'aiman@hotmail.com', '2003-02-07'),
('M0003', 'Ai Ling', '040301-08-0458', 'Ss26881432VUR', '014-7862211', 'F', 'ling@gmail.com', '2004-03-01'),
('M0004', 'Aina', '050607-07-0872', 'abcdepW15699503h}7F', '019-8564433', 'F', 'aina@yahoo.com', '2005-06-07'),
('M0005', 'Ah Seng', '030309-02-0231', 'fC44793838q3i', '013-6574489', 'M', 'seng19@gmail.com', '2003-03-09'),
('M0006', 'Ah Zai', '050819-02-0339', 'uM057582160|A_R?0', '017-2070627', 'M', 'zaizai58@hotmail.com', '2005-08-19'),
('M0007', 'Christabella Burn', '541224-03-9071', 'zS1073654842}I6', '019-6012244', 'M', 'cburn0@qq.com', '2010-11-07'),
('M0008', 'Dion Barus', '482270-01-7815', 'pW15699503h}7F', '014-2363127', 'F', 'dbarus1@altervista.org', '2010-02-04'),
('M0009', 'Eldredge Borlease', '284266-06-1908', 'kQ10421402aeOKH<A', '010-7045457', 'M', 'eborlease2@springer.com', '2008-01-28'),
('M0010', 'Ilaire Weight', '191700-04-5110', 'zD63872565dq`', '014-3486257', 'F', 'iweight3@hao123.com', '2007-12-23'),
('M0011', 'Fitz Armytage', '297083-08-7702', 'fS26881432VUR?\"#', '017-0444109', 'F', 'farmytage4@themeforest.net', '2005-03-26'),
('M0012', 'Bertrando Payne', '547262-05-0935', 'aZ17119323Ei@R<', '016-3830223', 'M', 'bpayne5@businessinsider.com', '2009-04-28'),
('M0013', 'Alfons Linn', '459960-03-7404', 'uM057582160|A_R?0', '010-3748458', 'F', 'alinn6@fda.gov', '2009-03-16'),
('M0014', 'Carena Ranscome', '657736-08-9721', 'wT47802149h\"N+8X3', '014-1551781', 'F', 'cranscome7@msu.edu', '2006-02-05'),
('M0015', 'Tatum Wilks', '431373-04-2554', 'gG15120076o19F7g', '010-7366634', 'F', 'twilks8@cmu.edu', '2006-12-27'),
('M0016', 'Delmore Outerbridge', '420156-00-9202', 'fC44793838q3i/', '016-8888831', 'F', 'douterbridge9@google.com', '2005-03-29'),
('M0017', 'Celestina Pomroy', '362825-02-6065', 'iF64124104w~IB', '016-0947541', 'F', 'cpomroya@elegantthemes.com', '2008-03-24'),
('M0018', 'Lizbeth Capozzi', '838056-03-1296', 'fA240727696T%8=`', '019-3692781', 'M', 'lcapozzib@pbs.org', '2009-04-09'),
('M0019', 'Etty Benian', '169261-03-4047', 'sQ21305714T=Y', '015-3527451', 'F', 'ebenianc@oaic.gov.au', '2010-02-20'),
('M0020', 'Kesley Goldstone', '871765-03-8556', 'mO30051996St', '014-1934312', 'F', 'kgoldstoned@clickbank.net', '2007-03-23');

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
  ADD PRIMARY KEY (`booking_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
