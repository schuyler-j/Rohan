-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 3.27.8.66:3306
-- Generation Time: Sep 19, 2022 at 03:45 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.30


CREATE DATABASE ecom;
use ecom;


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
  `CartID` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Shipping` text NOT NULL,
  `Payment` text NOT NULL,
  `DoP` date NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `CreditCard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `CreditCard` int(11) NOT NULL,
  `ccName` text NOT NULL,
  `expDate` date NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `sellerID` int(11) DEFAULT NULL,
  `creationDate` date NOT NULL,
  `shippingAddr` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `postID` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `img` text NOT NULL,
  `postdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`postID`, `title`, `content`, `img`, `postdate`) VALUES
(100, 'Day at the Beach', 'Local travellers have been enjoying the sun this week. The best place in the world to see the sunshine? The Beach of course! Get on down to your local.', 'beach.png', '2022-09-13'),
(101, 'Forest Adventures', 'The park of Australia are encouraging new travelers to explore the land by introducing new trees.', 'forest.png', '2022-09-11'),
(102, 'Winner, winner!', 'Try your luck at the recently installed \'Lucky Dip\'. For a limited time only. Major prizes to be won, if only luck is on your side. ', 'luck.png', '2022-09-17'),
(103, 'Kayak Adventures', 'Kayak across the greatest lakes and rivers. 2022 is the year of the kayak. Now is the best time to try out a fantastically exciting new hobby.', 'd1.png', '2022-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `cartID` int(11) DEFAULT NULL,
  `complete` tinyint(1) NOT NULL,
  `shippingAddr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `pName` text NOT NULL,
  `Price` text NOT NULL,
  `cItem` tinyint(1) NOT NULL,
  `State` text NOT NULL,
  `Location` text NOT NULL,
  `Category` text NOT NULL,
  `stockAmt` int(11) NOT NULL,
  `imgSrc` text NOT NULL,
  `sellerID` int(11) DEFAULT NULL,
  `onSale` tinyint(1) NOT NULL DEFAULT '0',
  `salePrice` text NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Description`, `pName`, `Price`, `cItem`, `State`, `Location`, `Category`, `stockAmt`, `imgSrc`, `sellerID`, `onSale`, `salePrice`, `featured`) VALUES
(1001, 'Cruisemaster XT Triathalon, 20\" chassis, 8080A Hitch, 18\" Wheels.', 'Cruisemaster Caravan', '83,900.00', 1, 'South Australia', '22 Bridge Road', 'Caravans and Campervans', 3, 'cruiser.png', 11, 0, '', 0),
(1002, 'Compact motorhome, built for the whole family.', 'Sage Motorhome', '120,899.00', 0, 'South Australia', '28 Shine Street', 'Motorhomes', 4, 'sage.png', 10, 0, '', 0),
(1003, 'This swag is a top contender. The be all and end all of swag technology. Constructed from the greatest materials known to man, this swag has it all.', 'XTM 4x4 Twin Double Swag', '299.00', 0, 'New South Whales', '08 Polly Drive', 'Camping Gear', 23, 'dswag.png', 10, 0, '', 0),
(1004, 'Set includes a 4.5qt oven. Carry bag and 29cm folding pan and griddle.', 'Dawson Cast Iron Set', '119.99', 0, 'Western Australia', '09 Faun Road', 'Camping Gear', 12, 'iron.png', 10, 0, '', 0),
(1005, 'A grey pair of hiking boots. Good condition.', 'Grey Hiking Boots', '29.99', 1, 'SA', '28', 'Camping Gear', 1, 'hikingboots.png', 11, 1, '15.99', 0),
(1006, 'Old spoon that works good as new.', 'Old Spoon', '8.99', 1, 'WA', '45', 'Camping Gear', 1, 'spoon.png', 11, 1, '4.99', 0),
(1007, 'This knife is extremely sharp.', 'Hunting knife', '12.99', 1, 'SA', 'G', 'Camping Gear', 1, 'knife.png', 11, 1, '7.99', 0),
(1008, 'Titanium steel bush hat. Built to last.', 'Bush Hat', '39.99', 1, 'SA', 'SA', 'Camping Gear', 1, 'hat.png', 11, 1, '12.99', 0),
(1009, 'Keep the dirt, dust and sand out of your gazebo with this durable outdoor flooring.', 'Mesh Gazebo Flooring', '29.00', 1, 'NSW', '90', 'Camping Gear', 1, 'flooring.png', 11, 0, '', 1),
(1010, 'Can\'t go wrong with a fancy beach cart. Designed with the beach in mind.', 'Quad Fold Beach Cart', '129.00', 1, 'NSW', '34', 'Camping Gear', 1, 'beachcart.png', 11, 0, '', 1),
(1011, 'Ideal cook set for the camp fire.', '3 Piece Utensil Set', '16.88', 1, 'SA', '19 Old Road', 'Camping Gear', 1, 'utensil.png', 11, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `itemCount` int(11) NOT NULL,
  `itemsSold` int(11) NOT NULL,
  `shippingAddr` text NOT NULL,
  `postCode` int(11) NOT NULL,
  `sellerName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerID`, `userID`, `itemCount`, `itemsSold`, `shippingAddr`, `postCode`, `sellerName`) VALUES
(10, 10001, 0, 0, '12 Lol Road', 5000, 'store'),
(11, 10002, 0, 0, '100 Basic Av.', 5200, 'Big Dave');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionID` int(100) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `expires` date NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `DOB` date NOT NULL,
  `Email` text NOT NULL,
  `Address` text NOT NULL,
  `CreditCard` int(11) DEFAULT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `sessionID` int(11) DEFAULT NULL,
  `postcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Email`, `Address`, `CreditCard`, `Username`, `Password`, `sessionID`, `postcode`) VALUES
(10001, 'JOHN', 'ADAM', '1990-09-01', 'j@adam.com', '19 Now Dr', 123456789, 'admin', '95e05a128d25470a2d040ec342ed6f7fcee721d0', NULL, 5100),
(10002, 'SAM', 'COLLIN', '1976-09-08', 's@collin.com', '05 Coll Street', 987654321, 'scol5', '62e5f121ab85b7bfd9d060d8a9e4a5e34d27081f', NULL, 5170),
(10003, 'test', 'test', '2022-09-01', 'te@st.com', 'test road', 909090, 'test', '356a192b7913b04c54574d18c28d46e6395428ab', NULL, 5009);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `WishlistTitle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`,`CreditCard`),
  ADD KEY `CreditCard` (`CreditCard`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`CreditCard`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `userID` (`userID`,`sellerID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`,`cartID`),
  ADD KEY `cartID` (`cartID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `CreditCard` (`CreditCard`),
  ADD KEY `sessionID` (`sessionID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishID`),
  ADD KEY `productID` (`productID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`CreditCard`) REFERENCES `creditcard` (`CreditCard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `cart` (`CartID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sessionID`) REFERENCES `session` (`sessionID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`ProductID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
