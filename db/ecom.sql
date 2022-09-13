-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 05:59 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.30

DROP DATABASE IF EXISTS ecom;
CREATE DATABASE ecom;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int NOT NULL,
  `TotalPrice` int NOT NULL,
  `Shipping` text COLLATE utf8mb4_general_ci NOT NULL,
  `Payment` text COLLATE utf8mb4_general_ci NOT NULL,
  `DoP` date NOT NULL,
  `UserID` int NOT NULL,
  `ProductID` int NOT NULL,
  `CreditCard` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `postID` int NOT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `img` text COLLATE utf8mb4_general_ci NOT NULL,
  `postdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`postID`, `title`, `content`, `img`, `postdate`) VALUES
(100, 'Day at the Beach', 'Local travelers have been enjoying the sun this week. ', 'beach.png', '2022-09-13'),
(101, 'Forest Adventures', 'The park of Australia are encouraging new travelers to explore the land by introducing new trees.', 'forest.png', '2022-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `Description` text COLLATE utf8mb4_general_ci NOT NULL,
  `pName` text COLLATE utf8mb4_general_ci NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `cItem` tinyint(1) NOT NULL,
  `State` text COLLATE utf8mb4_general_ci NOT NULL,
  `Location` text COLLATE utf8mb4_general_ci NOT NULL,
  `Category` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `FirstName` text COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` text COLLATE utf8mb4_general_ci NOT NULL,
  `DOB` date NOT NULL,
  `Email` text COLLATE utf8mb4_general_ci NOT NULL,
  `Buyer` tinyint(1) NOT NULL,
  `Address` text COLLATE utf8mb4_general_ci NOT NULL,
  `CreditCard` int NOT NULL,
  `Username` text COLLATE utf8mb4_general_ci NOT NULL,
  `Password` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Email`, `Buyer`, `Address`, `CreditCard`, `Username`, `Password`) VALUES
(10001, 'JOHN', 'ADAM', '1990-09-01', 'j@adam.com', 1, '19 Now Dr', 123456789, 'jadam', '95e05a128d25470a2d040ec342ed6f7fcee721d0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
