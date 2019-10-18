-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2019 at 02:21 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `Account_Id` int(11) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Password` varchar(50) NOT NULL,
  `Account_Type` varchar(20) DEFAULT NULL,
  `Account_Created_By` int(11) DEFAULT NULL,
  `Account_Approved_By` int(11) DEFAULT NULL,
  `Account_Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`Account_Id`, `User_Email`, `User_Password`, `Account_Type`, `Account_Created_By`, `Account_Approved_By`, `Account_Status`) VALUES
(1, 'henok@gmail.com', '1234', 'Admin', NULL, NULL, '0'),
(10, 'kebe@gmail.com', '202cb962ac59075b964b07152d234b70', 'Seller', 10, NULL, '0'),
(11, 'abe@gmail.com', '202cb962ac59075b964b07152d234b70', 'Seller', 11, NULL, '0'),
(12, 'ken@gmail.com', '202cb962ac59075b964b07152d234b70', 'Seller', 12, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Product_Id` int(11) NOT NULL,
  `Seller_Id` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Price` float NOT NULL,
  `Product_Description` varchar(255) DEFAULT NULL,
  `Product_Status` varchar(20) DEFAULT NULL,
  `Product_PostDate` datetime DEFAULT NULL,
  `Subcategory_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product_Category`
--

CREATE TABLE `Product_Category` (
  `Category_Id` int(11) NOT NULL,
  `Account_Id` int(11) DEFAULT NULL,
  `Category_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product_Image`
--

CREATE TABLE `Product_Image` (
  `Image_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Image_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product_Report`
--

CREATE TABLE `Product_Report` (
  `Report_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Report_UserEmail` varchar(50) NOT NULL,
  `Report_Issue` varchar(25) NOT NULL,
  `Report_Content` varchar(255) NOT NULL,
  `Report_PostDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product_Subcategory`
--

CREATE TABLE `Product_Subcategory` (
  `Subcategory_Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Account_Id` int(11) DEFAULT NULL,
  `Subcategory_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Seller`
--

CREATE TABLE `Seller` (
  `Seller_Id` int(11) NOT NULL,
  `Account_Id` int(11) NOT NULL,
  `Seller_Email` varchar(50) NOT NULL,
  `Seller_Name` varchar(50) NOT NULL,
  `Seller_Phone` varchar(20) NOT NULL,
  `Seller_Alternate_Phone` varchar(20) DEFAULT NULL,
  `Region` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Sub_City` varchar(20) DEFAULT NULL,
  `Subscription_Type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`Account_Id`),
  ADD KEY `Created_Account` (`Account_Created_By`),
  ADD KEY `Created_Account_Approved_By` (`Account_Approved_By`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Seller_Id` (`Seller_Id`),
  ADD KEY `Subcategory_Id` (`Subcategory_Id`);

--
-- Indexes for table `Product_Category`
--
ALTER TABLE `Product_Category`
  ADD PRIMARY KEY (`Category_Id`),
  ADD KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `Product_Image`
--
ALTER TABLE `Product_Image`
  ADD PRIMARY KEY (`Image_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `Product_Report`
--
ALTER TABLE `Product_Report`
  ADD PRIMARY KEY (`Report_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `Product_Subcategory`
--
ALTER TABLE `Product_Subcategory`
  ADD PRIMARY KEY (`Subcategory_Id`),
  ADD KEY `Category_Id` (`Category_Id`),
  ADD KEY `Account_Id` (`Account_Id`);

--
-- Indexes for table `Seller`
--
ALTER TABLE `Seller`
  ADD PRIMARY KEY (`Seller_Id`),
  ADD KEY `Account_Id` (`Account_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `Account_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Product_Category`
--
ALTER TABLE `Product_Category`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Product_Image`
--
ALTER TABLE `Product_Image`
  MODIFY `Image_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Product_Report`
--
ALTER TABLE `Product_Report`
  MODIFY `Report_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Product_Subcategory`
--
ALTER TABLE `Product_Subcategory`
  MODIFY `Subcategory_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Seller`
--
ALTER TABLE `Seller`
  MODIFY `Seller_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `Created_Account` FOREIGN KEY (`Account_Created_By`) REFERENCES `Account` (`Account_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Created_Account_Approved_By` FOREIGN KEY (`Account_Approved_By`) REFERENCES `Account` (`Account_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`Seller_Id`) REFERENCES `Seller` (`Seller_Id`),
  ADD CONSTRAINT `Product_ibfk_2` FOREIGN KEY (`Subcategory_Id`) REFERENCES `Product_Subcategory` (`Subcategory_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Product_Category`
--
ALTER TABLE `Product_Category`
  ADD CONSTRAINT `Product_Category_ibfk_1` FOREIGN KEY (`Account_Id`) REFERENCES `Account` (`Account_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Product_Image`
--
ALTER TABLE `Product_Image`
  ADD CONSTRAINT `Product_Image_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `Product` (`Product_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Product_Report`
--
ALTER TABLE `Product_Report`
  ADD CONSTRAINT `Product_Report_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `Product` (`Product_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Product_Subcategory`
--
ALTER TABLE `Product_Subcategory`
  ADD CONSTRAINT `Product_Subcategory_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `Product_Category` (`Category_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Product_Subcategory_ibfk_2` FOREIGN KEY (`Account_Id`) REFERENCES `Account` (`Account_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Seller`
--
ALTER TABLE `Seller`
  ADD CONSTRAINT `Seller_ibfk_1` FOREIGN KEY (`Account_Id`) REFERENCES `Account` (`Account_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
