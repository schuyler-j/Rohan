-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 09:33 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.30

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
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `CreditCard` int NOT NULL,
  `ccName` text COLLATE utf8mb4_general_ci NOT NULL,
  `expDate` date NOT NULL,
  `cvc` int NOT NULL,
  `userID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int NOT NULL,
  `userID` int NOT NULL,
  `sellerID` int NOT NULL,
  `creationDate` date NOT NULL,
  `shippingAddr` text COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int NOT NULL,
  `userID` int NOT NULL,
  `orderDate` date NOT NULL,
  `cartID` int NOT NULL,
  `complete` tinyint(1) NOT NULL,
  `shippingAddr` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Category` text COLLATE utf8mb4_general_ci NOT NULL,
  `stockAmt` int NOT NULL,
  `imgSrc` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Description`, `pName`, `Price`, `cItem`, `State`, `Location`, `Category`, `stockAmt`, `imgSrc`) VALUES
(1001, 'Cruisemaster XT Triathalon, 20\" chassis, 8080A Hitch, 18\" Wheels.', 'Cruisemaster Caravan', '83900', 1, 'South Australia', '22 Bridge Road', 'Caravans and Campervans', 3, 'cruiser.png'),
(1002, 'Compact motorhome, built for the whole family.', 'Sage Motorhome', '120000', 0, 'South Australia', '28 Shine Street', 'Motorhomes', 4, 'sage.png'),
(1003, 'This swag is a top contender. The be all and end all of swag technology. Constructed from the greatest materials known to man, this swag has it all.', 'XTM 4x4 Twin Double Swag', '299', 0, 'New South Whales', '08 Polly Drive', 'Camping Gear', 23, 'dswag.png'),
(1004, 'Set includes a 4.5qt oven. Carry bag and 29cm folding pan and griddle.', 'Dawson Cast Iron Set', '119', 0, 'Western Australia', '09 Faun Road', 'Camping Gear', 12, 'iron.png');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerID` int NOT NULL,
  `userID` int NOT NULL,
  `itemCount` int NOT NULL,
  `itemsSold` int NOT NULL,
  `shippingAddr` text COLLATE utf8mb4_general_ci NOT NULL,
  `postCode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerID`, `userID`, `itemCount`, `itemsSold`, `shippingAddr`, `postCode`) VALUES
(10, 10001, 0, 0, '12 Lol Road', 5000);

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
  `Address` text COLLATE utf8mb4_general_ci NOT NULL,
  `CreditCard` int NOT NULL,
  `Username` text COLLATE utf8mb4_general_ci NOT NULL,
  `Password` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Email`, `Address`, `CreditCard`, `Username`, `Password`) VALUES
(10001, 'JOHN', 'ADAM', '1990-09-01', 'j@adam.com', '19 Now Dr', 123456789, 'jadam', '95e05a128d25470a2d040ec342ed6f7fcee721d0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`CreditCard`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
