-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2018 at 03:37 AM
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
  `Type` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreviewtype`
--

CREATE TABLE `tblreviewtype` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblschools`
--

CREATE TABLE `tblschools` (
  `id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Opening_Time` varchar(250) NOT NULL,
  `Closing_Time` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `CAC` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Phonenumber` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `Type` (`Type`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblreviewtype`
--
ALTER TABLE `tblreviewtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `tblreviews_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `tblreviewtype` (`id`),
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
