-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 07:13 PM
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
-- Database: `swiftbuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `payment_method`, `address`, `created_at`) VALUES
(66, 2, 199.99, 'pending', 'bkash', 'Uttara, Dhaka', '2025-03-05 10:45:02'),
(68, 2, 499.99, 'pending', 'cod', 'Banani, Dhaka', '2025-03-25 06:30:00'),
(69, 2, 29.99, 'pending', 'bkash', 'Gulshan, Dhaka', '2025-03-20 09:05:12'),
(70, 2, 19.99, 'pending', 'bank', 'Shyamoli, Dhaka', '2025-01-29 02:17:56'),
(71, 2, 799.99, 'pending', 'cod', 'Rampura, Dhaka', '2025-04-22 11:00:00'),
(72, 2, 499.99, 'pending', 'bkash', 'Bashundhara, Dhaka', '2025-05-02 04:30:22'),
(73, 2, 299.99, 'pending', 'bkash', 'Khilgaon, Dhaka', '2025-01-15 08:12:00'),
(74, 2, 799.99, 'pending', 'bank', 'Dhanmondi, Dhaka', '2025-04-18 04:23:45'),
(78, 2, 499.99, 'pending', 'cod', 'Banani, Dhaka', '2025-03-25 06:30:00'),
(82, 2, 499.99, 'pending', 'bkash', 'Bashundhara, Dhaka', '2025-05-02 04:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`, `quantity`) VALUES
(62, 1, 'Smartphone X1', 299.99, 1),
(63, 2, 'Laptop Pro 15', 799.99, 1),
(64, 3, 'Wireless Headphones', 149.99, 1),
(65, 4, 'Smartwatch 4', 199.99, 1),
(66, 5, 'Bluetooth Speaker', 59.99, 1),
(67, 6, '4K UHD TV', 499.99, 1),
(68, 7, 'Gaming Mouse', 29.99, 1),
(69, 8, 'Smartphone Charger', 19.99, 1),
(70, 9, 'Laptop Pro 15', 799.99, 1),
(71, 10, '4K UHD TV', 499.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `created_at`) VALUES
(1, 'Smartphone X1', 'Latest model with high performance.', 299.99, 50, 'product_images/1.jpg', '2025-05-03 10:57:44'),
(2, 'Laptop Pro 15', 'Powerful laptop with advanced features.', 799.99, 30, 'product_images/2.jpg', '2025-05-03 10:57:44'),
(3, 'Wireless Headphones', 'Noise-cancelling wireless headphones.', 149.99, 100, 'product_images/3.jpg', '2025-05-03 10:57:44'),
(4, 'Smartwatch 4', 'Track your fitness and notifications on the go.', 199.99, 73, 'product_images/4.jpg', '2025-05-03 10:57:44'),
(5, 'Bluetooth Speaker', 'Portable speaker with great sound quality.', 59.99, 199, 'product_images/5.jpg', '2025-05-03 10:57:44'),
(6, '4K UHD TV', 'High-definition TV with stunning picture quality.', 499.99, 20, 'product_images/6.jpg', '2025-05-03 10:57:44'),
(7, 'Gaming Mouse', 'Precision gaming mouse for ultimate control.', 29.99, 150, 'product_images/7.jpg', '2025-05-03 10:57:44'),
(8, 'Smartphone Charger', 'Fast charger for your devices.', 19.99, 300, 'product_images/8.jpg', '2025-05-03 10:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `address` text NOT NULL,
  `profile_picture` varchar(255) DEFAULT 'profile_picture/default.jpg',
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `address`, `profile_picture`, `phone`, `created_at`) VALUES
(1, 'Tasin', 'admin@gmail.com', '$2y$10$d.xLhbpUag7nfR24sJqMGOWHeD2gcDp.iazJv8VyVymK7QSaj.O5K', 'admin', 'Khilgaon, Dhaka', 'profile_picture/default.jpg', '1234567', '2025-05-03 12:22:01'),
(2, 'Tasin', 'Tasin@gmail.com', '$2y$10$MRLCEKbibIeP.7RE8B96PueLuqOBVzNMJna8DYWk9bcmGvfeanebi', 'user', 'Khilgaon, Dhaka', 'profile_picture/default.jpg', '12345678', '2025-05-03 12:23:12'),
(5, 'root', 'root@gmail.com', '$2y$10$8Kxu.rNhcV4KNPHsJ6AUd.XOJzF3zVD9LNCQlVGI7ZgpRhIcMApeS', 'admin', 'dhaka', 'profile_picture/default.jpg', '12345', '2025-05-05 08:15:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
