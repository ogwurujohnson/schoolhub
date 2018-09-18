-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2018 at 03:27 AM
-- Server version: 5.7.23
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwcreati_wedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladverts`
--

CREATE TABLE `tbladverts` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_description` varchar(600) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` int(30) NOT NULL,
  `ad_duration` varchar(255) NOT NULL,
  `ad_cost` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladverts`
--

INSERT INTO `tbladverts` (`id`, `payment_id`, `schoolid`, `ad_title`, `ad_description`, `contact_email`, `contact_phone`, `ad_duration`, `ad_cost`, `date`) VALUES
(4, 'SchoolHub-388604697', 13, 'job opportunity', 'good in english', 'daviddisu8@gmail.com', 813367845, '1week', '5000', '2018-03-02 13:18:03'),
(3, 'SchoolHub-649918496', 10, 'Senior Lecturer needed', 'Must be down to earth', 'ogwurujohnson@gmail.com', 2147483647, '1month', '5000', '2018-03-02 06:29:33');

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
(1, 8, 'One of the best institutions Nigeria has to offer.', 4, 1, '2018-03-02 04:55:43'),
(2, 8, 'One of the best institutions Nigeria has to offer.', 5, 2, '2018-03-02 04:55:43'),
(3, 8, 'One of the best institutions Nigeria has to offer.', 5, 3, '2018-03-02 04:55:43'),
(4, 8, 'One of the best institutions Nigeria has to offer.', 4, 4, '2018-03-02 04:55:43'),
(5, 9, 'Is a nice place to be', 4, 1, '2018-03-02 06:47:44'),
(6, 9, 'Is a nice place to be', 4, 2, '2018-03-02 06:47:44'),
(7, 9, 'Is a nice place to be', 3, 3, '2018-03-02 06:47:44'),
(8, 9, 'Is a nice place to be', 5, 4, '2018-03-02 06:47:44'),
(9, 8, 'Good skul', 3, 1, '2018-03-02 16:05:54'),
(10, 8, 'Good skul', 3, 2, '2018-03-02 16:05:54'),
(11, 8, 'Good skul', 4, 3, '2018-03-02 16:05:54'),
(12, 8, 'Good skul', 3, 4, '2018-03-02 16:05:54'),
(13, 13, 'ok', 3, 1, '2018-03-06 04:48:02'),
(14, 13, 'ok', 3, 2, '2018-03-06 04:48:02'),
(15, 13, 'ok', 3, 3, '2018-03-06 04:48:02'),
(16, 13, 'ok', 3, 4, '2018-03-06 04:48:02'),
(17, 13, 'Good school', 3, 1, '2018-03-06 18:56:57'),
(18, 13, 'Good school', 4, 2, '2018-03-06 18:56:57'),
(19, 13, 'Good school', 4, 3, '2018-03-06 18:56:57'),
(20, 13, 'Good school', 4, 4, '2018-03-06 18:56:57');

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
  `Description` varchar(3000) NOT NULL,
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
(8, 5, 'University of Ibadan', 'Established in 1948, the University of Ibadan, UI as it is fondly referred to, is the first University in Nigeria. Until 1962 when it became a full-fledged independent University, it was a College of the University of London in a special relationship scheme.', '8 :00 AM', '4 :00 PM', 'ui.edu.ng', 'nil', 'info@ui.edu.ng', 'Ibadan, Oyo State', 'Nigeria', 'assets/img/crw_5845SIRKENAYO.jpg', '8092245372', 1, 31, 2, '2018-02-13 04:58:02'),
(9, 5, 'University of Lagos', 'In order to achieve rapid industrialization and development after independence, Nigeria needed to invest in the training of a professional workforce. The indispensable need to create more universities to reach this goal was facilitated by the establishment of the University of Lagos in 1962. The Eric Ashby Commission on Post School Certificate and Higher Education was established by the Nigerian Government in May 1959. The Ashby Commissionâ€™s report, titled Investment in Education, recommended ', '8 :00 AM', '4 :00 PM', 'unilag.edu.ng', 'nil', 'info@unilag.edu.ng', 'lagos, lagos', 'Nigeria', 'assets/img/unilag-770x560.jpg', '12802439', 1, 16, 1, '2018-02-13 05:11:19'),
(10, 5, 'OAU', 'The greatness and popularity of the Obafemi Awolowo University (OAU) is by no means an accident. Founded in 1962 as the University of Ife but rechristened by the Federal Military Government as the Obafemi Awolowo University on May 12, 1987, in honour of one of its most distinguished founding fathers and eminent nationalist, politician, lawyer, stateman and former chancellor, Chief Jeremiah Obafemi Awolowo.', '8 :00 AM', '4 :00 PM', 'oauife.edu.ng', '34261', 'info@oauife.edu.ng', 'Ile-Ife, Osun State', 'Nigeria', 'assets/img/1277745_main_glb_corp_localep-ngHOMEPHC1l0239211DesktopfffffIMG_2192_jpgae1e09c49eba1b78cb0abef6fe134e74.jpg', '8037176473', 1, 0, 0, '2018-02-13 05:33:51'),
(12, 5, 'Ahmadu Bello University', 'Ahmadu Bello University is a federal government research university in Zaria, Kaduna State. ABU was founded on October 4, 1962, as the University of Northern Nigeria. The university operates two campuses: Samaru and Kongo in Zaria', '8 :00 AM', '4 :00 PM', 'http://www.abu.edu.ng/', '123456', 'webmaster@abu.edu.ng', 'Zaria', 'Nigeria', 'assets/img/800px-ahmadu_bello_university_senate.jpg', '60361964053', 1, 0, 0, '2018-02-13 21:23:39'),
(13, 5, 'University of Nigeria, Nsukka', 'The University of Nigeria, commonly referred to as UNN, is a federal university located in Nsukka, Enugu State, Nigeria. Founded by Nnamdi Azikiwe in 1955 and formally opened on 7 October 1960, the University of Nigeria has three campuses â€“ Nsukka, Enugu, and Ituku-Ozalla â€“ all located in Enugu State.', '8 :00 AM', '4 :00 PM', 'http://www.unn.edu.ng/', '123456', 'customerservices.registrar@unn.edu.ng', 'Nsukka Road, 410001, Nsukka', 'Nigeria', 'assets/img/slider-2.jpg', '8063607400', 1, 27, 2, '2018-02-13 21:36:44'),
(16, 4, 'Federal Government College', 'The Federal Government College Lagos (FGCL) is a co-educational secondary school in Ijanikin, Lagos, Nigeria. It was established by the Federal Ministry of Education in 1975. The idea of this college in Lagos was conceived in the minds of the authorities of the Federal Ministry of Education early in 1974 when they thought it necessary to have one co-educational institution for Lagos state as there were in all the then 12 states of the Federation.', '8 :00 AM', '4 :00 PM', 'http://www.fgclagos.org.ng/', '12333333', 'fgclagos@consultant.com', 'Ojo, Lagos', 'Nigeria', 'assets/img/wpid-543601_324880277584438_536461427_n.jpg', '8095200389', 0, 0, 0, '2018-02-14 21:33:04'),
(19, 4, 'Emmanuels International School', 'Agriculture', '8 :00 AM', '5 :00 PM', 'http://www.emmanuelschools.com', 'Nil', 'Egbosikelechi@gmail.com', 'Aba, Abia State', 'Nigeria', '', '8069324666', 0, 0, 0, '2018-03-03 06:42:02'),
(20, 5, 'Modibbo Adama University of Technology Yola', 'Established in 1981.', '7 :00 AM', '6 :00 PM', 'http://www.mautech.edu.ng', 'Federal government Owned', 'barkindoalkali@gmail.com', 'Yola, Adamawa State', 'Nigeria', 'assets/img/images_4.jpeg', '7036892951', 0, 0, 0, '2018-03-03 13:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `School_Id`, `Phone_Number`, `Date`) VALUES
(1, 8, '8188621047', '2018-03-02 04:55:43'),
(2, 9, '8033525155', '2018-03-02 06:47:44'),
(3, 8, '7033538311', '2018-03-02 16:05:54'),
(4, 13, '7061349509', '2018-03-06 04:48:02'),
(5, 13, '8033525155', '2018-03-06 18:56:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladverts`
--
ALTER TABLE `tbladverts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladverts`
--
ALTER TABLE `tbladverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblreviews`
--
ALTER TABLE `tblreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblreviewtype`
--
ALTER TABLE `tblreviewtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblschools`
--
ALTER TABLE `tblschools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- Constraints for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD CONSTRAINT `tblusers_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `tblschools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
