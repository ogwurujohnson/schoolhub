-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2018 at 06:14 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `Category_Name`, `Date`) VALUES
(3, 'Primary', '2018-01-29 17:02:03'),
(4, 'Secondary', '2018-01-29 17:02:18'),
(5, 'Tertiary', '2018-01-29 17:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblreviews`
--

CREATE TABLE `tblreviews` (
  `id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review_Type` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreviews`
--

INSERT INTO `tblreviews` (`id`, `School_Id`, `Comment`, `Rating`, `Review_Type`, `Date`) VALUES
(9, 3, 'Awesome!!!', 5, 2, '2018-02-04 02:28:29'),
(10, 1, 'Awful!', 1, 3, '2018-02-10 01:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblreviewtype`
--

CREATE TABLE `tblreviewtype` (
  `id` int(11) NOT NULL,
  `Review_Name` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreviewtype`
--

INSERT INTO `tblreviewtype` (`id`, `Review_Name`, `Date`) VALUES
(1, 'Facilities', '2018-02-01 00:55:30'),
(2, 'Academic Performance', '2018-02-01 00:55:30'),
(3, 'Quality of Teachers', '2018-02-01 00:55:30'),
(4, 'Learning Environment', '2018-02-01 00:55:30'),
(5, 'General', '2018-02-01 14:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblschools`
--

CREATE TABLE `tblschools` (
  `id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `School_Name` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Opening_Time` varchar(250) NOT NULL,
  `Closing_Time` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `CAC` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `Total_Rating` int(11) NOT NULL DEFAULT '0',
  `Rate_Count` int(11) NOT NULL DEFAULT '0',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschools`
--

INSERT INTO `tblschools` (`id`, `Category_Id`, `School_Name`, `Description`, `Opening_Time`, `Closing_Time`, `Website`, `CAC`, `Email`, `Address`, `Country`, `Image`, `Phone_Number`, `Status`, `Total_Rating`, `Rate_Count`, `Date`) VALUES
(1, 5, 'NASA College', '', '9 :00 AM', '5 :00 PM', '', 'RC-0001', 'info@nasa.com', 'Jos', 'Nigeria', 'assets/img/category/slider-2.jpg', '0934784', 0, 1, 1, '2018-01-31 23:21:55'),
(3, 5, 'futa', 'good school', '8am', '5pm', 'futa.edu.ng', 'jkkd88', 'info@futa.edu.ng', 'akure, nigeria', 'nigeria', '', '3003308', 0, 5, 1, '2018-02-01 03:57:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreviews`
--
ALTER TABLE `tblreviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`School_Id`),
  ADD KEY `Type` (`Review_Type`);

--
-- Indexes for table `tblreviewtype`
--
ALTER TABLE `tblreviewtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschools`
--
ALTER TABLE `tblschools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`Category_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblreviews`
--
ALTER TABLE `tblreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblreviewtype`
--
ALTER TABLE `tblreviewtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblschools`
--
ALTER TABLE `tblschools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblreviews`
--
ALTER TABLE `tblreviews`
  ADD CONSTRAINT `tblreviews_ibfk_1` FOREIGN KEY (`Review_Type`) REFERENCES `tblreviewtype` (`id`),
  ADD CONSTRAINT `tblreviews_ibfk_2` FOREIGN KEY (`School_Id`) REFERENCES `tblschools` (`id`);

--
-- Constraints for table `tblschools`
--
ALTER TABLE `tblschools`
  ADD CONSTRAINT `tblschools_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `tblcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
