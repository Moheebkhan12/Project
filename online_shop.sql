-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 12:12 AM
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
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(6, 'Beauty Products'),
(2, 'Handbags'),
(1, 'Perfumes'),
(3, 'Teddy Bears'),
(4, 'Wallets'),
(5, 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_order_id` int(11) NOT NULL,
  `item_prod_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_order_id`, `item_prod_id`, `Quantity`) VALUES
(1, 2, 26, 1),
(2, 2, 12, 1),
(3, 2, 13, 1),
(4, 3, 17, 1),
(5, 4, 5, 1),
(6, 4, 9, 1),
(7, 5, 14, 2),
(8, 5, 2, 2),
(9, 5, 6, 2),
(10, 6, 8, 3),
(11, 6, 6, 2),
(12, 7, 8, 1),
(13, 7, 6, 2),
(14, 7, 23, 5),
(15, 8, 21, 1),
(16, 8, 23, 3),
(17, 8, 5, 3),
(18, 9, 14, 1),
(19, 9, 23, 3),
(20, 9, 32, 2),
(21, 9, 12, 1),
(22, 9, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_price`, `order_date`, `order_user_id`) VALUES
(2, 218000, 2023, 5),
(3, 450000, 2023, 5),
(4, 98000, 2023, 5),
(5, 828000, 2023, 5),
(6, 193000, 2023, 5),
(7, 213000, 2023, 5),
(8, 470000, 2023, 5),
(9, 908000, 2023, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_catg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_catg_id`) VALUES
(1, 'Gucci Guilty ', 'It is recommeded for daily use!', 'assets/images/pf1.png', 24000, 1),
(2, 'Katty Perry Meow ', 'Celebrity Fragrance, Scent-Citrusy,  Fruity', 'assets/images/pf3.png', 150000, 1),
(3, 'Giorgio Armani My Way ', 'Soft, Crisp, Sweet, Feminine & Enchating', 'assets/images/pf4.png', 120000, 1),
(4, 'Estee Lauder Intense ', 'Floral Fragrance For Women', 'assets/images/pf5.png', 90000, 1),
(5, 'Vera Wang ', 'A fresh long lasting Fragrance', 'assets/images/pf-6.png', 56000, 1),
(6, 'Clinique Happy ', 'It is recommeded for Office Wear', 'assets/images/pf2.png', 44000, 1),
(7, 'Timberland Mens Classic ', 'Leather Lining', 'assets/images/w1.png', 12000, 4),
(8, 'Herschel Roy RFID\n', 'Made in the USA or Imported', 'assets/images/w2.png', 35000, 4),
(9, 'Herschel Mens Wallets ', '100% Polyester, Imported', 'assets/images/w3.png', 42000, 4),
(10, 'Eddie Bauer Mens ', 'Cotton Canvas, Imported', 'assets/images/w4.png', 55000, 4),
(11, 'Herschel Mens Wallets ', 'Signature striped fabric liner, Imported', 'assets/images/w5.png', 35000, 4),
(12, 'Herschel Hank ', 'Faux Leather lining, No Closure closure', 'assets/images/w6.png', 64000, 4),
(13, 'West Bracelet Watch ', 'Gold-tone stainless steel mesh bracelet with adjustable end ', 'assets/images/WT6.png', 120000, 5),
(14, 'Fossil Grant Watch  ', 'Stainless steel case with cream sunray dial and green', 'assets/images/WT5.png', 220000, 5),
(15, 'Timex Unisex Watch ', 'Adjustable olive green 20 millimeter nylon slip-thru strap', 'assets/images/WT4.png', 180000, 5),
(16, 'Bulova Mens Marine ', 'From Bulovas Mens Marine Star Collection, live and play in maritime', 'assets/images/WT3.png', 320000, 5),
(17, 'Skechers Mens Quartz ', 'This Wilkie watch features a black plastic case with black dial', 'assets/images/WT2.png', 450000, 5),
(18, 'Nine West Watch ', 'Mineral crystal lens Grey textured dial with floral design', 'assets/images/WT1.png', 160000, 5),
(19, 'Aurora Snuggly ', 'Made with high quality materials and lock-washer eyes for safety', 'assets/images/T6.png', 12000, 3),
(20, 'GUND Slumbers', 'This GUND plush toy is made from soft, huggable', 'assets/images/T5.png', 15000, 3),
(21, 'Steiff Soft Cuddly ', 'The ultra-plush material creates a cozy and cuddly companion', 'assets/images/T4.png', 13000, 3),
(22, 'Aurora Palm Pals', 'High Quality Materials make for a soft and fluffy touch', 'assets/images/T3.png', 11000, 3),
(23, 'Manhattan Papa', 'Our cuddliest teddy bear pilot youll ever meet', 'assets/images/T2.png', 18000, 3),
(24, 'Adorable Yummy Bear ', 'Soft and plush material with embroidered face', 'assets/images/T1.png', 16000, 3),
(25, 'ALDO Womens Marcelinee ', 'Made of synthetic materials Tote, Top Handle ', 'assets/images/B1.png', 16000, 2),
(26, 'Sakroots Crossbody ', 'Features a main zipper closure, one front zipper pocket, and one back slip pocket', 'assets/images/B2.png', 34000, 2),
(27, 'Gucci Camelia Pebbled ', 'Inside hook closure Light fine gold-toned hardware', 'assets/images/B3.png', 520000, 2),
(28, 'Vince Camuto Orla Tote ', 'Imported, Fabric Material, Tote, this premium leather Top Handle ', 'assets/images/B4.png', 26000, 2),
(29, 'ALDO Womens Jerilini  ', 'Made of synthetic materials 1 compartment: stylish and functional', 'assets/images/B5.png', 350000, 2),
(30, 'Anuschka Satchel Handbag ', 'Art-inspired handbags for women; this premium leather large', 'assets/images/B6.png', 58000, 2),
(31, 'Hydrated Ever Skincare ', 'This step-by-step skincare regimen will have your face feeling soft', 'assets/images/P6.png', 16000, 6),
(32, 'Meaningful Anti-Aging ', 'Daily Skincare System with Youth Activating', 'assets/images/P1.png', 30000, 6),
(33, 'Pacifica Wake Up Beautiful ', 'WAKE UP BEAUTIFUL OVERNIGHT RECOVERY RETINOID CREAM', 'assets/images/P4.png', 21000, 6),
(34, 'Pacifica Vegan Overnight ', 'Supercharge your nighttime routine while your skin ', 'assets/images/P5.png', 45000, 6),
(35, 'Glow Baby Vitamin C Trial ', 'Wash cleanser, mini Glow Baby Booster Serum', 'assets/images/P3.png', 39000, 6),
(36, 'Papaine Night Family Pack ', 'FREE OF HARSH CHEMICALS including parabens', 'assets/images/P2.png', 70000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role_id`) VALUES
(1, 'admin', 'admin02@gmail.com', 'admin02', 1),
(2, 'User', 'user02@gmail.com', 'User02', 2),
(5, 'kashan', 'kashan80@gmail.com', 'kashan80', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `unique_name` (`category_name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_order_id` (`item_order_id`),
  ADD KEY `item_prod_id` (`item_prod_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `prod_catg_id` (`prod_catg_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `unique_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_email` (`user_email`),
  ADD KEY `foreign key` (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`item_prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`prod_catg_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`user_role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
