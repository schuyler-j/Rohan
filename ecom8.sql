-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2022 at 04:02 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.30


DROP DATABASE IF EXISTS ecom;
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartID` int NOT NULL,
  `TotalPrice` int NOT NULL,
  `Shipping` text NOT NULL,
  `Payment` text NOT NULL,
  `DoP` date NOT NULL,
  `UserID` int NOT NULL,
  `ProductID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartID`, `TotalPrice`, `Shipping`, `Payment`, `DoP`, `UserID`, `ProductID`) VALUES
(579, 0, 'test road', 'credit', '2022-10-11', 10003, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `CreditCard` int NOT NULL,
  `ccName` text NOT NULL,
  `expDate` date NOT NULL,
  `cvc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`CreditCard`, `ccName`, `expDate`, `cvc`) VALUES
(675558888, 'sam', '2024-09-18', 233),
(788876654, 'testingggg', '2022-10-25', 332),
(888888888, 'test', '2022-10-26', 555),
(897676545, 'tested', '2022-10-26', 455),
(981928333, 'jeff', '2022-10-18', 309),
(987654321, 'jon', '2022-09-09', 321),
(988847732, 'test', '2022-10-27', 333),
(999991111, 'testing', '2022-10-27', 999);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `sellerID` int DEFAULT NULL,
  `creationDate` date NOT NULL,
  `shippingAddr` text NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `postID` int NOT NULL,
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
  `orderID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `orderDate` date NOT NULL,
  `cartID` int DEFAULT NULL,
  `complete` tinyint(1) NOT NULL,
  `shippingAddr` text NOT NULL,
  `state` enum('Australian Capital Territory','New South Wales','Northern Territory','Queensland','South Australia','Tasmania','Victoria','Western Australia') NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `Description` text NOT NULL,
  `pName` varchar(32) NOT NULL,
  `Price` text NOT NULL,
  `cItem` tinyint(1) NOT NULL,
  `State` enum('Australian Capital Territory','New South Wales','Northern Territory','Queensland','South Australia','Tasmania','Victoria','Western Australia') CHARACTER SET utf8mb4 NOT NULL,
  `Location` text NOT NULL,
  `Category` enum('Caravans and Campervans','Motorhomes','Camping Gear','Vehicles','Trailers','Hobby/Sporting Equipment') CHARACTER SET utf8mb4 NOT NULL,
  `stockAmt` int NOT NULL,
  `imgSrc` text NOT NULL,
  `sellerID` int DEFAULT NULL,
  `onSale` tinyint(1) NOT NULL DEFAULT '0',
  `salePrice` varchar(32) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Description`, `pName`, `Price`, `cItem`, `State`, `Location`, `Category`, `stockAmt`, `imgSrc`, `sellerID`, `onSale`, `salePrice`, `featured`) VALUES
(1001, 'Cruisemaster XT Triathalon, 20\" chassis, 8080A Hitch, 18\" Wheels.', 'Cruisemaster Caravan', '83900.00', 1, 'South Australia', '22 Bridge Road', 'Caravans and Campervans', 69, 'cruiser.png', 11, 0, '', 0),
(1002, 'Compact motorhome, built for the whole family.', 'Sage Motorhome', '120899.00', 0, 'South Australia', '28 Shine Street', 'Motorhomes', 3, 'sage.png', 10, 0, '', 0),
(1003, 'This swag is a top contender. The be all and end all of swag technology. Constructed from the greatest materials known to man, this swag has it all.', 'XTM 4x4 Twin Double Swag', '299.00', 0, 'New South Wales', '08 Polly Drive', 'Camping Gear', 23, 'dswag.png', 10, 0, '', 0),
(1004, 'Set includes a 4.5qt oven. Carry bag and 29cm folding pan and griddle.', 'Dawson Cast Iron Set', '119.99', 0, 'Western Australia', '09 Faun Road', 'Camping Gear', 12, 'iron.png', 10, 0, '', 0),
(1005, 'A grey pair of hiking boots. Good condition.', 'Grey Hiking Boots', '29.99', 1, 'South Australia', '28', 'Camping Gear', 13, 'hikingboots.png', 11, 1, '15.99', 0),
(1006, 'Old spoon that works good as new.', 'Old Spoon', '8.99', 1, 'South Australia', '45', 'Camping Gear', 13, 'spoon.png', 11, 1, '4.99', 0),
(1007, 'This knife is extremely sharp.', 'Hunting knife', '12.99', 1, 'South Australia', 'G Home', 'Camping Gear', 13, 'knife.png', 11, 1, '7.99', 0),
(1008, 'Titanium steel bush hat. Built to last.', 'Bush Hat', '39.99', 1, 'South Australia', 'SA Now St', 'Camping Gear', 12, 'hat.png', 11, 1, '12.99', 0),
(1009, 'Keep the dirt, dust and sand out of your gazebo with this durable outdoor flooring.', 'Mesh Gazebo Flooring', '29.00', 1, 'New South Wales', '90', 'Camping Gear', 1, 'flooring.png', 11, 0, '', 1),
(1010, 'Can\'t go wrong with a fancy beach cart. Designed with the beach in mind.', 'Quad Fold Beach Cart', '129.00', 1, 'New South Wales', '34', 'Camping Gear', 1, 'beachcart.png', 11, 0, '', 1),
(1011, 'Ideal cook set for the camp fire.', '3 Piece Utensil Set', '16.88', 1, 'South Australia', '19 Old Road', 'Camping Gear', 1, 'utensil.png', 11, 0, '', 1),
(1012, 'A chair for sitting down in and relaxing. Titanium steel legs capable of withstanding the heaviest of loads.', 'Walker Arm Chair', '59.99', 1, 'New South Wales', '87', 'Camping Gear', 80, 'armchair.png', 10, 0, '', 0),
(1013, 'Durable polyester. 190cm.', 'Hooded Sleeping Bag', '47.99', 1, 'South Australia', '122', 'Camping Gear', 12, 'sleepingbag.png', 10, 0, '', 0),
(808080, '8x8 Trailer', 'Camping Trailer', '999.89', 1, 'South Australia', '90 Lo Rd', 'Trailers', 1, 'trailer.png', 10, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `itemCount` int NOT NULL,
  `itemsSold` int NOT NULL,
  `shippingAddr` text NOT NULL,
  `postCode` int NOT NULL,
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
  `sessionID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `expires` date NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `firstname`, `lastname`, `email`, `message`) VALUES
('2022-10-05 13:05:29', 'hi', 'test', 'test@test.com', 'hello.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `DOB` date NOT NULL,
  `Email` text NOT NULL,
  `Address` text NOT NULL,
  `CreditCard` int DEFAULT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `sessionID` int DEFAULT NULL,
  `postcode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Email`, `Address`, `CreditCard`, `Username`, `Password`, `sessionID`, `postcode`) VALUES
(10001, 'JOHN', 'ADAM', '1990-09-01', 'j@adam.com', '19 Now Dr', NULL, 'admin', '95e05a128d25470a2d040ec342ed6f7fcee721d0', NULL, 5100),
(10002, 'SAM', 'COLLIN', '1976-09-08', 's@collin.com', '05 Coll Street', 675558888, 'scol5', '62e5f121ab85b7bfd9d060d8a9e4a5e34d27081f', NULL, 5170),
(10003, 'test', 'test', '2022-09-01', 'te@st.com', 'test road', 888888888, 'test', '356a192b7913b04c54574d18c28d46e6395428ab', NULL, 5009),
(10006, 'Jane', 'Here', '1976-09-04', 'jane@jane.com', '12 Jane St', NULL, 'jane2002', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 4000),
(12935, 'joey', 'adam', '1980-12-09', 'jo@j.com', '100 now st', NULL, 'joey12344', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', NULL, 5000),
(12954, 'joel', 'wind', '1970-11-12', 'hi@n.co', '12 hi rd', NULL, 'wind12', '272c3dcd3796d3f3b1d9f8ae1c4b98142841d680', NULL, 4000),
(12981, 'jay', 'jay', '1960-11-11', 'a@a.com', '10 a st', NULL, 'jay0', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 1000),
(20640, 'Alice', 'Senior', '1234-03-12', 'alice@alice.com', 'alice st', NULL, 'alice2022', '9a79be611e0267e1d943da0737c6c51be67865a0', NULL, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishID`, `userID`, `ProductID`) VALUES
(13017, 12981, 1009),
(15552, 10003, 1002),
(16110, 10003, 1008),
(16114, 10003, 1010),
(16126, 10003, 1013);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD KEY `UserID` (`UserID`,`ProductID`);

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
  ADD KEY `session_ibfk_1` (`userID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `CreditCard` (`CreditCard`),
  ADD KEY `sessionID` (`sessionID`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD UNIQUE KEY `ProductID` (`ProductID`),
  ADD KEY `userID` (`userID`,`ProductID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sessionID`) REFERENCES `session` (`sessionID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`CreditCard`) REFERENCES `creditcard` (`CreditCard`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
