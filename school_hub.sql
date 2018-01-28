-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2018 at 10:03 PM
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
  `category_name` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category_name`, `Date`) VALUES
(1, 'University', '2018-01-27 05:36:48'),
(2, 'Polytechnic', '2018-01-27 05:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `reports` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`id`, `school_id`, `reviews`, `reports`, `date`) VALUES
(1, 1, 0, 'a very good school', '2018-01-27 05:52:16'),
(2, 2, 0, 'a very bad school', '2018-01-27 05:54:55'),
(3, 1, 0, 'i love the school', '2018-01-27 05:55:05'),
(4, 2, 5, 'hjwjwjwiwiwi', '2018-01-27 08:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblschool`
--

CREATE TABLE `tblschool` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_description` varchar(500) NOT NULL,
  `opening_hours` varchar(250) NOT NULL,
  `closing_hours` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschool`
--

INSERT INTO `tblschool` (`id`, `category_id`, `school_name`, `school_description`, `opening_hours`, `closing_hours`, `address`, `Date`) VALUES
(1, 1, 'UNN', 'School for lions', 'monday-friday', '', 'nsukka, Nigeria', '2018-01-28 20:09:28'),
(2, 1, 'UniIbadan', 'school for kids intelligent', 'monday-friday', '', 'ibadan', '2018-01-27 05:55:27'),
(3, 1, 'French School', 'A Short Description', '8 :00 AM', '4 :00 PM', 'Jos', '2018-01-28 20:26:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `tblschool`
--
ALTER TABLE `tblschool`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblschool`
--
ALTER TABLE `tblschool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD CONSTRAINT `tblreport_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `tblschool` (`id`);

--
-- Constraints for table `tblschool`
--
ALTER TABLE `tblschool`
  ADD CONSTRAINT `tblschool_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tblcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
