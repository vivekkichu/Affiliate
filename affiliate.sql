-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 08:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affiliate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `address` blob DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `parent` int(11) NOT NULL DEFAULT 0,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `address`, `level`, `parent`, `username`, `password`, `created`) VALUES
(6, 'Vivek P C', 'vivek.kichu@yahoo.com', 9074485808, 0x4475626169, 2, 4, 'aaaa', '91a16365e0db62ed5e890eaebc70d3cb', '2024-04-27 10:41:10'),
(7, 'Kumar', 'kumar@gmail.com', 9999999999, 0x4475626169, 3, 6, 'kumar', 'e0ec043b3f9e198ec09041687e4d4e8d', '2024-04-27 10:49:03'),
(8, 'Kejriwall', 'kegriwall@gmail.com', 8888888888, 0x44656c6869, 4, 7, 'kejriwall', '312f04f99be9e857bfb2c033eeb1d3e2', '2024-04-27 10:50:54'),
(9, 'Ronaldo', 'ronaldo@gmail.com', 7777777777, 0x5072747567756c, 5, 8, 'ronaldo', '664fae06a748e656511d55b59fc6f85e', '2024-04-27 10:56:03'),
(10, 'Rozario', 'rozario@gmail.com', 8888888888, 0x4272617a696c, 5, 8, 'rozario', '312f04f99be9e857bfb2c033eeb1d3e2', '2024-04-27 10:56:40'),
(11, 'Tendulkar', 'tendulkar@gmail.com', 9999999999, 0x4d756d626169, 6, 10, 'tendulkar', 'e0ec043b3f9e198ec09041687e4d4e8d', '2024-04-27 10:57:53'),
(12, 'Karthik', 'karthik@gmail.com', 9876543200, 0x54564d0d0a54564d, 1, 0, 'karthik', '25f9e794323b453885f5181f1b624d0b', '2024-04-28 05:22:28'),
(13, 'Karthik', 'karthik@gmail.com', 9876543200, 0x4475626169, 1, 0, 'karthik', 'e807f1fcf82d132f9bb018ca6738a19f', '2024-04-28 05:25:35'),
(14, 'Karthik', 'karthik@gmail.com', 9876543200, 0x4475626169, 1, 14, 'karthik', '91c63fa39a647be6feab42950464359e', '2024-04-28 05:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `commision`
--

CREATE TABLE `commision` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `commision` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commision`
--

INSERT INTO `commision` (`id`, `userid`, `product`, `amount`, `commision`, `date`, `status`) VALUES
(1, 8, 8, 40.00, 0.40, '2024-04-27 16:20:00', 1),
(2, 7, 8, 40.00, 0.80, '2024-04-27 16:20:00', 1),
(3, 6, 8, 40.00, 1.20, '2024-04-27 16:20:00', 1),
(4, 4, 8, 40.00, 2.00, '2024-04-27 16:20:00', 1),
(5, 4, 8, 40.00, 4.00, '2024-04-27 16:20:00', 1),
(6, 4, 8, 40.00, 4.00, '2024-04-27 16:20:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `QuantityPerUnit` varchar(20) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT 0.00,
  `UnitsInStock` smallint(2) DEFAULT 0,
  `Discontinued` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `QuantityPerUnit`, `UnitPrice`, `UnitsInStock`, `Discontinued`) VALUES
(1, 'Chai', '10 boxes x 20 bags', 18.00, 39, b'0'),
(2, 'Chang', '24 - 12 oz bottles', 19.00, 12, b'0'),
(3, 'Aniseed Syrup', '12 - 550 ml bottles', 10.00, 13, b'0'),
(4, 'Chef Anton\'s Cajun Seasoning', '48 - 6 oz jars', 22.00, 53, b'0'),
(5, 'Chef Anton\'s Gumbo Mix', '36 boxes', 21.35, 0, b'1'),
(6, 'Grandma\'s Boysenberry Spread', '12 - 8 oz jars', 25.00, 120, b'0'),
(7, 'Uncle Bob\'s Organic Dried Pears', '12 - 1 lb pkgs.', 30.00, 15, b'0'),
(8, 'Northwoods Cranberry Sauce', '12 - 12 oz jars', 40.00, 7, b'0'),
(9, 'Mishi Kobe Niku', '18 - 500 g pkgs.', 97.00, 29, b'1'),
(10, 'Ikura', '12 - 200 ml jars', 31.00, 31, b'0'),
(11, 'Queso Cabrales', '1 kg pkg.', 21.00, 22, b'0'),
(12, 'Queso Manchego La Pastora', '10 - 500 g pkgs.', 38.00, 86, b'0'),
(13, 'Konbu', '2 kg box', 6.00, 24, b'0'),
(14, 'Tofu', '40 - 100 g pkgs.', 23.25, 35, b'0'),
(15, 'Genen Shouyu', '24 - 250 ml bottles', 15.50, 39, b'0'),
(16, 'Pavlova', '32 - 500 g boxes', 17.45, 29, b'0'),
(17, 'Alice Mutton', '20 - 1 kg tins', 39.00, 0, b'1'),
(18, 'Carnarvon Tigers', '16 kg pkg.', 62.50, 42, b'0'),
(19, 'Teatime Chocolate Biscuits', '10 boxes x 12 pieces', 9.20, 25, b'0'),
(20, 'Sir Rodney\'s Marmalade', '30 gift boxes', 81.00, 40, b'0'),
(21, 'Sir Rodney\'s Scones', '24 pkgs. x 4 pieces', 10.00, 3, b'0'),
(22, 'Gustaf\'s Knckebrd', '24 - 500 g pkgs.', 21.00, 104, b'0'),
(23, 'Tunnbrd', '12 - 250 g pkgs.', 9.00, 61, b'0'),
(24, 'Guaran Fantstica', '12 - 355 ml cans', 4.50, 20, b'1'),
(25, 'NuNuCa Nu-Nougat-Creme', '20 - 450 g glasses', 14.00, 76, b'0'),
(26, 'Gumbr Gummibrchen', '100 - 250 g bags', 31.23, 15, b'0'),
(27, 'Schoggi Schokolade', '100 - 100 g pieces', 43.90, 49, b'0'),
(28, 'Rssle Sauerkraut', '25 - 825 g cans', 45.60, 26, b'1'),
(29, 'Thringer Rostbratwurst', '50 bags x 30 sausgs.', 123.79, 0, b'1'),
(30, 'Nord-Ost Matjeshering', '10 - 200 g glasses', 25.89, 10, b'0'),
(31, 'Gorgonzola Telino', '12 - 100 g pkgs', 12.50, 0, b'0'),
(32, 'Mascarpone Fabioli', '24 - 200 g pkgs.', 32.00, 9, b'0'),
(33, 'Geitost', '500 g', 2.50, 112, b'0'),
(34, 'Sasquatch Ale', '24 - 12 oz bottles', 14.00, 111, b'0'),
(35, 'Steeleye Stout', '24 - 12 oz bottles', 18.00, 20, b'0'),
(36, 'Inlagd Sill', '24 - 250 g  jars', 19.00, 112, b'0'),
(37, 'Gravad lax', '12 - 500 g pkgs.', 26.00, 11, b'0'),
(38, 'Cte de Blaye', '12 - 75 cl bottles', 263.50, 17, b'0'),
(39, 'Chartreuse verte', '750 cc per bottle', 18.00, 69, b'0'),
(40, 'Boston Crab Meat', '24 - 4 oz tins', 18.40, 123, b'0'),
(41, 'Jack\'s New England Clam Chowder', '12 - 12 oz cans', 9.65, 85, b'0'),
(42, 'Singaporean Hokkien Fried Mee', '32 - 1 kg pkgs.', 14.00, 26, b'1'),
(43, 'Ipoh Coffee', '16 - 500 g tins', 46.00, 17, b'0'),
(44, 'Gula Malacca', '20 - 2 kg bags', 19.45, 27, b'0'),
(45, 'Rogede sild', '1k pkg.', 9.50, 5, b'0'),
(46, 'Spegesild', '4 - 450 g glasses', 12.00, 95, b'0'),
(47, 'Zaanse koeken', '10 - 4 oz boxes', 9.50, 36, b'0'),
(48, 'Chocolade', '10 pkgs.', 12.75, 15, b'0'),
(49, 'Maxilaku', '24 - 50 g pkgs.', 20.00, 10, b'0'),
(50, 'Valkoinen suklaa', '12 - 100 g bars', 16.25, 65, b'0'),
(51, 'Manjimup Dried Apples', '50 - 300 g pkgs.', 53.00, 20, b'0'),
(52, 'Filo Mix', '16 - 2 kg boxes', 7.00, 38, b'0'),
(53, 'Perth Pasties', '48 pieces', 32.80, 0, b'1'),
(54, 'Tourtire', '16 pies', 7.45, 21, b'0'),
(55, 'Pt chinois', '24 boxes x 2 pies', 24.00, 115, b'0'),
(56, 'Gnocchi di nonna Alice', '24 - 250 g pkgs.', 38.00, 21, b'0'),
(57, 'Ravioli Angelo', '24 - 250 g pkgs.', 19.50, 36, b'0'),
(58, 'Escargots de Bourgogne', '24 pieces', 13.25, 62, b'0'),
(59, 'Raclette Courdavault', '5 kg pkg.', 55.00, 79, b'0'),
(60, 'Camembert Pierrot', '15 - 300 g rounds', 34.00, 19, b'0'),
(61, 'Sirop d\'rable', '24 - 500 ml bottles', 28.50, 113, b'0'),
(62, 'Tarte au sucre', '48 pies', 49.30, 17, b'0'),
(63, 'Vegie-spread', '15 - 625 g jars', 43.90, 24, b'0'),
(64, 'Wimmers gute Semmelkndel', '20 bags x 4 pieces', 33.25, 22, b'0'),
(65, 'Louisiana Fiery Hot Pepper Sauce', '32 - 8 oz bottles', 21.05, 76, b'0'),
(66, 'Louisiana Hot Spiced Okra', '24 - 8 oz jars', 17.00, 4, b'0'),
(67, 'Laughing Lumberjack Lager', '24 - 12 oz bottles', 14.00, 52, b'0'),
(68, 'Scottish Longbreads', '10 boxes x 8 pieces', 12.50, 6, b'0'),
(69, 'Gudbrandsdalsost', '10 kg pkg.', 36.00, 26, b'0'),
(70, 'Outback Lager', '24 - 355 ml bottles', 15.00, 15, b'0'),
(71, 'Flotemysost', '10 - 500 g pkgs.', 21.50, 26, b'0'),
(72, 'Mozzarella di Giovanni', '24 - 200 g pkgs.', 34.80, 14, b'0'),
(73, 'Rd Kaviar', '24 - 150 g jars', 15.00, 101, b'0'),
(74, 'Longlife Tofu', '5 kg pkg.', 10.00, 4, b'0'),
(75, 'Rhnbru Klosterbier', '24 - 0.5 l bottles', 7.75, 125, b'0'),
(76, 'Lakkalikri', '500 ml', 18.00, 57, b'0'),
(77, 'Original Frankfurter grne Soe', '12 boxes', 13.00, 32, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `userid`, `productid`, `amount`, `qty`, `date`) VALUES
(1, 11, 8, 40.00, 1, '2024-04-27 16:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commision`
--
ALTER TABLE `commision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ProductName` (`ProductName`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `commision`
--
ALTER TABLE `commision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
