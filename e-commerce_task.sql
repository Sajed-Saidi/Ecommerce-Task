-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 12:13 PM
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
-- Database: `e-commerce task`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `category_id`) VALUES
(1, 'Iphone', 'iphone', 1),
(7, 'Samsung', 'Samsung', 1),
(8, 'Acer', 'acer', 27),
(9, 'DELL', 'dell', 24),
(10, 'Air', 'air', 27),
(11, 'Techno', 'techno', 27),
(12, 'Lenovo', 'lenovo', 24);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`) VALUES
(1, 'Mobile', 'Experience ', '1720188099.png'),
(24, 'Laptops', 'Laptops as in computers', '1720188106.png'),
(27, 'Tablets', 'tablets', '1720188111.png'),
(30, 'Headphones', 'headohones', '1720195241.png'),
(31, 'Earphones', 'earphones', '1720195324.png'),
(32, 'Wearables', 'wearables', '1720195350.png'),
(34, 'Powerbank', 'powerbank', '1720286581.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `popular` tinyint(4) NOT NULL,
  `featured` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `brand`, `price`, `quantity`, `image`, `popular`, `featured`) VALUES
(1, 'Samsung A32', 'New version of the latest technology Samsung A32.', 'Samsung', 255, 255, '1720275220.jpg', 1, 1),
(2, 'A14', 'Samsung A14 Qualifying in the international.', 'Samsung', 190, 111, '1720178570.jpg', 1, 0),
(7, 'iphone 12', 'iphone 12', 'Iphone', 123, 1211, '1720178578.gif', 0, 1),
(8, 'Iphone 11', 'iphone 11', 'Iphone', 777, 123, '1720178585.gif', 1, 1),
(9, 'Acer VINDO 21', 'Acer VINDO 21 16 GB RAM epo920 t1090 ', 'Acer', 990, 123, '1720178644.gif', 1, 1),
(10, 'DELL VOSTRO 3000', 'DELL VOSTRO 3000 16 GB RAM good for businessmen. This laptop ensures you high specifications in tesing', 'DELL', 1000, 100, '1720178727.gif', 1, 0),
(11, 'TAB 5 Pro TECHNO', 'TAb 5 Pro containing hard chips and disks tha t can take up to 128 GB of data and 4GB RAM even as a tablet.', 'Techno', 322, 123, '1720178997.gif', 0, 1),
(12, 'MAC PRO TAB', 'MAC PRO with its new features that can allow you to experience further dimensions of interpolating inside the worlds of entertainment.', 'Air', 112, 12, '1720179091.gif', 0, 1),
(13, 'Vectus 13 DS', '14 GB Vectus DDR5 ioiu79p testing the language might take some time but we ensure you high professional typing skills here this has been written by me sajed mohammed saidi.', 'Lenovo', 800, 100, '1720275183.gif', 1, 1),
(14, 'Iphone 13', 'Iphone 13 brand new iphone that elaborated love and ecstacy throughout your venturing experience when you huble your slef with the latest ', 'Iphone', 900, 123, '1720346962.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user' COMMENT 'admin,user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'sajed', 'sajedsaidi84@gmail.com', 'asd', 'admin'),
(2, 'sajed', 'asd@gmail.com', 'asd', 'user'),
(3, 'sdf', 'programmingstudent8@gmail.com', 'asd', 'admin'),
(11, 'asd', 'mayadaher413@gmail.com', 'asd', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
