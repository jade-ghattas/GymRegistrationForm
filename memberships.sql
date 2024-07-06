-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 05:51 AM
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
-- Database: `memberships`
--

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Birthday` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `HomeAddress` varchar(300) NOT NULL,
  `CreditCardNumber` varchar(75) NOT NULL,
  `CCExpiryDate` varchar(10) NOT NULL,
  `CVV` varchar(5) NOT NULL,
  `Membership` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`ID`, `FirstName`, `LastName`, `Email`, `Birthday`, `Gender`, `PhoneNumber`, `HomeAddress`, `CreditCardNumber`, `CCExpiryDate`, `CVV`, `Membership`) VALUES
(5, 'Example 1', 'Example 1', 'example1@gmail.com', '2024-07-01', 'Male', '123-852-9635', '123 Example Road 1', '1234-1235-1236-1237', '0226', '123', 'Monthly'),
(6, 'Example 2', 'Example 2', 'example2@gmail.com', '2024-07-02', 'Male', '963-852-7416', '123 Example Road 2', '1238-1239-1234-1233', '1122', '456', 'SixMonths');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
