-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 09:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-05-13 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `paymentdate` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `totalperson` int(255) NOT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentdate` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `totalperson`, `FromDate`, `RegDate`, `paymentdate`, `status`) VALUES
(29, 9, '19', 12, '2021-02-08', '2021-02-09 09:49:06', '2021-02-13', 1),
(30, 9, '19', 33, '2021-02-01', '2021-02-11 11:31:40', '0000-00-00', 1),
(31, 9, '19', 5, '2021-03-02', '2021-02-13 10:00:51', '2021-02-13', 1),
(32, 9, '20', 5, '2021-02-20', '2021-02-13 19:26:51', '2021-02-17', 3),
(33, 9, '19', -5, '2021-03-04', '2021-02-14 16:12:46', '0000-00-00', 1),
(34, 9, '19', -4, '2021-02-01', '2021-02-14 16:13:24', '0000-00-00', 1),
(35, 9, '19', 5, '2021-03-07', '2021-02-14 16:20:16', '0000-00-00', 1),
(36, 9, '19', 30, '2021-02-11', '2021-02-14 16:22:38', '0000-00-00', 1),
(37, 8, '19', 3, '2021-02-27', '2021-02-15 13:20:11', '0000-00-00', 1),
(38, 8, '19', 3, '2021-02-24', '2021-02-15 13:24:33', '0000-00-00', 1),
(39, 8, '19', 3, '2021-02-24', '2021-02-15 13:26:12', '0000-00-00', 1),
(40, 9, '19', 2, '2021-03-04', '2021-02-15 16:15:47', '0000-00-00', 1),
(41, 10, '19', 2, '2021-02-25', '2021-02-15 16:28:57', '0000-00-00', 1),
(42, 8, '24', 2, '2021-02-27', '2021-02-15 17:25:32', '0000-00-00', 1),
(43, 8, '20', 2, '2021-02-01', '2021-02-16 11:07:46', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbus`
--

CREATE TABLE `tblbus` (
  `busid` int(255) NOT NULL,
  `busname` varchar(255) DEFAULT NULL,
  `busnumber` varchar(255) NOT NULL,
  `busroute` varchar(255) NOT NULL,
  `bustime` varchar(255) NOT NULL,
  `busstart` varchar(255) NOT NULL,
  `busend` varchar(255) NOT NULL,
  `busseatsavailable` varchar(255) NOT NULL,
  `busdate` date NOT NULL,
  `bustktprice` varchar(255) NOT NULL,
  `bustype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbus`
--

INSERT INTO `tblbus` (`busid`, `busname`, `busnumber`, `busroute`, `bustime`, `busstart`, `busend`, `busseatsavailable`, `busdate`, `bustktprice`, `bustype`) VALUES
(15, 'Dreamline', '5454', '8', '1:43 am', 'alankar', 'saidabad', '40', '2021-02-20', '220', 'NON AC');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusroute`
--

CREATE TABLE `tblbusroute` (
  `brid` int(20) NOT NULL,
  `busfrom` varchar(20) DEFAULT NULL,
  `busto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbusroute`
--

INSERT INTO `tblbusroute` (`brid`, `busfrom`, `busto`) VALUES
(5, 'Dhaka', 'Shylet'),
(7, 'Dhaka', 'Feni'),
(8, 'Chittagong', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusseat`
--

CREATE TABLE `tblbusseat` (
  `busseatid` int(255) NOT NULL,
  `seatname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbusseat`
--

INSERT INTO `tblbusseat` (`busseatid`, `seatname`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'B1'),
(4, 'B2'),
(5, 'C1'),
(6, 'C2'),
(7, 'D1'),
(8, 'D2'),
(9, 'E1'),
(10, 'E2'),
(11, 'F1'),
(12, 'F2'),
(13, 'G1'),
(14, 'G2'),
(15, 'H1'),
(16, 'H2'),
(17, 'I1'),
(18, 'I2'),
(19, 'J1'),
(20, 'J2'),
(21, 'K1'),
(22, 'K2'),
(23, 'L1'),
(24, 'L2'),
(25, 'M1'),
(26, 'M2'),
(28, 'N1'),
(29, 'N2'),
(30, 'O1'),
(31, 'O2'),
(32, 'P1'),
(33, 'P2'),
(37, 'Q1'),
(38, 'Q2'),
(39, 'R1'),
(40, 'R2'),
(41, 'S1'),
(42, 'S2'),
(43, 'T1'),
(44, 'T2');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(9, 'Seam', 'seamofficial37@gmail.com', '545245422', 'hi', 'hjgfdxzdxfghjk', '2021-02-05 05:42:57', NULL),
(10, 'Moon', 'moon@gmail.com', '2565646355', 'About  Tour outside country', 'dfkjbdfnvm,bdxjvj', '2021-02-15 13:30:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Issue` varchar(100) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpackagecategory`
--

CREATE TABLE `tblpackagecategory` (
  `packageid` int(11) NOT NULL,
  `packagecategory` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpackagecategory`
--

INSERT INTO `tblpackagecategory` (`packageid`, `packagecategory`) VALUES
(5, 'Adventure'),
(6, 'Corporate'),
(7, 'Couples');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(3, 'About Us', '																				<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Test test</span>\r\n										'),
(11, 'Contact', '<div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-weight: bold;\">Number : 733583274</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-weight: bold;\">Email : hgdsvb@gmail.com</span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tourdays` int(11) NOT NULL,
  `touritinerary` varchar(255) NOT NULL,
  `packageinclusion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`, `tourdays`, `touritinerary`, `packageinclusion`) VALUES
(8, 'Bandarban', 'Adventure', 'Bandarban, Bangladesh', 4500, 'Bandarban Hotel', 'Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts, the others being Rangamati District and Khagrachhari District. Bandarban city is the headquarters of the Bandarban district.', 'Daily-Sun-Magazine-18.jpg', '2021-01-24 16:45:45', '2021-02-15 13:18:50', 3, 'Journey Starts from Dhaka at 11 pm to Bandarban in Non-AC Bus. Return Bus will be at 3rd day 2 pm.', 'Complementary Breakfast- Lunch, Snacks, Hotel Accomendation (3/4) Sharing'),
(9, 'Rangamati', 'Adventure', 'Bangladesh', 3350, 'Jhum Hotel, Nira & Similar Category', 'Rangamati is the administrative headquarters of Rangamati Hill District in the Chittagong Hill Tracts of Bangladesh. It is also the capital city of Chittagong Hill Tracts. The town is located at 22°37\'60N 92°12\'0E and has an altitude of 14 metres', 'rangamati-hanging-bridge.jpg', '2021-02-07 21:41:46', '2021-02-15 13:19:40', 3, 'Journey Starts from Dhaka at 11 pm to Rangamati in Non-AC Bus. Return Bus will be at 3rd day 2 pm.', 'Complementary Breakfast- Lunch, Snacks, Hotel Accomendation (3/4) Sharing'),
(10, 'Mohasthan Garh', 'Holydays', 'Bogra,Bangladesh', 600, 'Bogra Hotel', 'Mahasthangarh is one of the most earliest urban archaeological sites so far discovered in Bangladesh. The village Mahasthan in Shibganj upazila of Bogra District contains the remains of an ancient city which was called Pundranagara or Paundravardhanapura in the territory of Pundravardhana', 'Manasthangarh.jpg', '2021-02-08 01:06:17', NULL, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(20, 'SEAM', '12989', 'seam@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-02-08 01:00:45', NULL),
(21, 'Marufa Ruma', '0167290505', 'marufa@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-02-11 03:42:29', NULL),
(22, 'Sadia Akter Nipa', '0162355556', 'sadia@gmail', '202cb962ac59075b964b07152d234b70', '2021-02-11 03:43:11', NULL),
(23, 'Naima Akter Ritu', '0162222222', 'naima@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-02-11 03:43:48', NULL),
(24, 'Md. Zakir Hossain', '0175555555', 'zakir@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-02-11 03:44:27', NULL),
(25, 'Md. Firoz Hossain', '0179999999', 'firoz@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-02-11 03:45:23', NULL),
(26, 'Taimia Abru', '0153333333', 'taimia@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-02-11 03:46:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusrtktbook`
--

CREATE TABLE `tblusrtktbook` (
  `tktbookid` int(255) NOT NULL,
  `busid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `seatnumber` varchar(255) NOT NULL,
  `tblseatid` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `bkdate` timestamp(6) NULL DEFAULT NULL,
  `bookid` int(11) NOT NULL,
  `paymentdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusrtktbook`
--

INSERT INTO `tblusrtktbook` (`tktbookid`, `busid`, `userid`, `seatnumber`, `tblseatid`, `status`, `bkdate`, `bookid`, `paymentdate`) VALUES
(63, 15, 19, 'C1', 5, 1, '2021-02-13 02:33:12.000000', 142765, '0000-00-00 00:00:00'),
(64, 15, 19, 'C2', 6, 1, '2021-02-13 02:33:12.000000', 142765, '0000-00-00 00:00:00'),
(65, 15, 19, 'B1', 3, 2, '2021-02-13 02:34:17.000000', 191319, '0000-00-00 00:00:00'),
(72, 15, 19, 'A1', 1, 1, '2021-02-13 23:24:33.000000', 151389, '0000-00-00 00:00:00'),
(84, 15, 20, 'F2', 12, 2, '2021-02-16 06:08:54.000000', 53590, '2021-02-16 18:00:00'),
(85, 15, 20, 'G1', 13, 2, '2021-02-16 06:08:54.000000', 53590, '2021-02-16 18:00:00'),
(86, 15, 20, 'G2', 14, 2, '2021-02-16 06:09:09.000000', 164403, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
-- (See below for the actual view)
--
CREATE TABLE `view1` (
`busid` int(255)
,`busname` varchar(255)
,`busnumber` varchar(255)
,`busroute` varchar(255)
,`bustime` varchar(255)
,`busstart` varchar(255)
,`busend` varchar(255)
,`busseatsavailable` varchar(255)
,`busdate` date
,`bustktprice` varchar(255)
,`seatavailable` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view2`
-- (See below for the actual view)
--
CREATE TABLE `view2` (
`busid` int(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1`  AS  select `tblbus`.`busid` AS `busid`,`tblbus`.`busname` AS `busname`,`tblbus`.`busnumber` AS `busnumber`,`tblbus`.`busroute` AS `busroute`,`tblbus`.`bustime` AS `bustime`,`tblbus`.`busstart` AS `busstart`,`tblbus`.`busend` AS `busend`,`tblbus`.`busseatsavailable` AS `busseatsavailable`,`tblbus`.`busdate` AS `busdate`,`tblbus`.`bustktprice` AS `bustktprice`,(`tblbus`.`busseatsavailable` - count(`tblusrtktbook`.`seatnumber`)) AS `seatavailable` from (`tblbus` join `tblusrtktbook` on((`tblbus`.`busid` = `tblusrtktbook`.`busid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view2`
--
DROP TABLE IF EXISTS `view2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2`  AS  select distinct `tblbus`.`busid` AS `busid` from (((`tblusers` join `tblusrtktbook` on((`tblusers`.`id` = `tblusrtktbook`.`userid`))) join `tblbus` on((`tblusrtktbook`.`busid` = `tblbus`.`busid`))) join `tblbusroute` on((`tblbus`.`busroute` = `tblbusroute`.`brid`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblbus`
--
ALTER TABLE `tblbus`
  ADD PRIMARY KEY (`busid`);

--
-- Indexes for table `tblbusroute`
--
ALTER TABLE `tblbusroute`
  ADD PRIMARY KEY (`brid`);

--
-- Indexes for table `tblbusseat`
--
ALTER TABLE `tblbusseat`
  ADD PRIMARY KEY (`busseatid`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpackagecategory`
--
ALTER TABLE `tblpackagecategory`
  ADD PRIMARY KEY (`packageid`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- Indexes for table `tblusrtktbook`
--
ALTER TABLE `tblusrtktbook`
  ADD PRIMARY KEY (`tktbookid`),
  ADD KEY `busid` (`busid`),
  ADD KEY `tblseatid` (`tblseatid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblbus`
--
ALTER TABLE `tblbus`
  MODIFY `busid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblbusroute`
--
ALTER TABLE `tblbusroute`
  MODIFY `brid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblbusseat`
--
ALTER TABLE `tblbusseat`
  MODIFY `busseatid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpackagecategory`
--
ALTER TABLE `tblpackagecategory`
  MODIFY `packageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblusrtktbook`
--
ALTER TABLE `tblusrtktbook`
  MODIFY `tktbookid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblusrtktbook`
--
ALTER TABLE `tblusrtktbook`
  ADD CONSTRAINT `tblusrtktbook_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `tblbus` (`busid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
