-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 05:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars_shopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(31, 22, 'Sports Shoe', '#SS001', 'Brown', 'Small', '1000', 2, 'user4@gmail.com', 'TDI8B1kmmkvjg4h3Ycw3ojDmE4g0eKLWizK2g4MP', NULL, NULL),
(32, 22, 'Sports Shoe', '#SS001', 'Brown', 'Small', '1000', 2, 'user2@gmail.com', 'ed2TvqVGUj7AjA5YE7rojipBtN2m8KuTTafNXTuz', NULL, NULL),
(48, 11, 'Anti Theft Backpack with USB-Charging', '#ATBC009', 'Black', 'Large', '110', 2, 'Haze@gmail.com', 'NunzaV48twcsGDCudK9NSPJYA9n0qaa0tDjV4tCW', NULL, NULL),
(49, 11, 'Anti Theft Backpack with USB-Charging', '#ATBC009', 'Black', 'Small', '100', 1, 'Haze@gmail.com', 'D73nanhDV5S5TudSOsetXo7UQJ5398zfGOrJdbnR', NULL, NULL),
(50, 11, 'Anti Theft Backpack with USB-Charging', '#ATBC009', 'Black', 'Small', '100', 1, 'Haze@gmail.com', '0czUXNtz7gfR26XMiAAkwkCPY13u4ex4xsjBj1aw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 0, 'Men\'s', 'Men Main Category', 'Men URL', 1, NULL, '2020-11-18 01:29:00', '2020-11-30 08:57:43'),
(13, 0, 'Women', 'Women Main Catgory', 'Women URL', 1, NULL, '2020-11-18 01:29:34', '2020-11-18 01:29:34'),
(14, 0, 'Slimming', 'Slimming Main Catgory', 'Slimming Category URL', 1, NULL, '2020-11-18 01:30:05', '2020-11-18 01:30:05'),
(15, 0, 'Health & Beauty', 'Health & Beauty Main Category', 'Health & Beauty Url', 1, NULL, '2020-11-18 01:30:34', '2020-11-18 01:30:34'),
(16, 0, 'Muslim fashion', 'Muslim fashion  Main Category', 'Muslim fashion URL', 1, NULL, '2020-11-18 01:31:01', '2020-11-18 01:31:01'),
(17, 0, 'Phone & Accessories', 'Phone & Accessories Main Category', 'Phone & Accessories URL', 1, NULL, '2020-11-18 01:31:26', '2020-11-18 01:31:26'),
(18, 0, 'Computer & Laptop', 'Computer & Laptop Mian Category', 'Computer & Laptop URL', 1, NULL, '2020-11-18 01:31:48', '2020-11-18 01:31:48'),
(19, 0, 'Sports & Outdoor', 'Sports & Outdoor  Main Category', 'Sports & Outdoor  URL', 1, NULL, '2020-11-18 01:32:10', '2020-11-18 01:32:10'),
(20, 0, 'Baby & Toys', 'Baby & Toys Main  Category', 'Baby & Toys URL', 1, NULL, '2020-11-18 01:32:37', '2020-11-18 01:32:37'),
(21, 13, 'Bag\'s', 'Women\'s bags Subcategory', 'Women\'s-Bags-Url', 1, NULL, '2020-11-18 01:36:55', '2020-12-20 04:37:07'),
(30, 17, 'IPhone', 'Just testing IPhone X', 'phone\'s iPhone', 1, NULL, '2020-11-25 02:07:07', '2020-11-25 02:09:52'),
(31, 12, 'Bag\'s', 'Men Bags are for only Men usage', 'Men\'s-Bags', 1, NULL, '2020-11-30 08:59:17', '2020-12-19 03:01:39'),
(32, 12, 'Shoe\'s', 'Men Shoes', 'Men shoe', 1, NULL, '2020-12-15 06:15:20', '2020-12-15 06:15:20'),
(33, 13, 'Shoe\'s', 'Women shoe category', 'Women-Shoe-Url', 1, NULL, '2020-12-19 01:15:53', '2020-12-20 04:39:20'),
(34, 12, 'Clothing', 'Men Clothing to shop for customers', 'Men\'s-Cloth', 1, NULL, '2020-12-19 03:03:52', '2020-12-19 03:03:52'),
(35, 13, 'Clothes', 'Women clothing for only womens', 'Women-Clothes-Url', 1, NULL, '2020-12-20 04:40:19', '2020-12-20 04:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', '2020-11-23 12:05:33', '2020-12-15 06:02:51'),
(2, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', '2020-11-26 10:52:02', '2021-03-29 09:25:39'),
(3, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', '2020-12-01 13:41:58', '2020-12-15 06:13:59'),
(4, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', '2020-12-20 10:05:34', '2020-12-22 05:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_10_02_164204_add_admin_column_to_users', 2),
(4, '2020_11_18_061028_create_categories_table', 3),
(5, '2020_11_20_053431_create_products_table', 4),
(8, '2020_11_20_113553_create_product_attributes_table', 5),
(9, '2020_11_22_084210_create_cart_table', 6),
(10, '2020_12_14_110313_create_posts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `shipping_charges` float NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `telephone`, `shipping_charges`, `order_status`, `payment_method`, `total`, `created_at`, `updated_at`) VALUES
(1, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 300, '2020-11-30 08:00:38', '2020-11-30 00:00:38'),
(2, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'Pending', '', 50000, '2020-11-30 08:03:51', '2020-11-30 06:49:12'),
(3, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 375, '2020-12-01 08:26:33', '2020-12-01 00:26:33'),
(4, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', 0, 'New', '', 750, '2020-12-01 13:42:02', '2020-12-01 05:42:02'),
(5, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 200, '2020-12-01 14:31:04', '2020-12-01 06:31:04'),
(6, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 1125, '2020-12-01 14:45:26', '2020-12-01 06:45:26'),
(7, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 400, '2020-12-01 17:36:15', '2020-12-01 09:36:15'),
(8, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 400, '2020-12-01 17:36:15', '2020-12-01 09:36:15'),
(9, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 750, '2020-12-15 14:00:25', '2020-12-15 06:00:25'),
(10, 3, 'user2@gmail.com', 'User02', 'Test add', 'test city', 'state', 'malaysia', '12345', '123456789', 0, 'New', '', 300, '2020-12-15 14:03:01', '2020-12-15 06:03:01'),
(11, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', 0, 'New', '', 100, '2020-12-15 14:05:59', '2020-12-15 06:05:59'),
(12, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', 0, 'New', '', 300, '2020-12-15 14:07:03', '2020-12-15 06:07:03'),
(13, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', 0, 'New', '', 50000, '2020-12-15 14:07:48', '2020-12-15 06:07:48'),
(14, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', 0, 'New', '', 750, '2020-12-15 14:08:45', '2020-12-15 06:08:45'),
(15, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', 0, 'New', '', 100000, '2020-12-15 14:12:22', '2020-12-15 06:12:22'),
(16, 5, 'user4@gmail.com', 'User4', 'local address', 'local city', 'local state', 'malaysia', '1111', '0000000000', 0, 'New', '', 50000, '2020-12-15 14:14:02', '2020-12-15 06:14:02'),
(17, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', 0, 'In Process', '', 50, '2020-12-15 14:19:19', '2020-12-15 06:21:36'),
(18, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', 0, 'New', '', 375, '2020-12-15 14:19:58', '2020-12-15 06:19:58'),
(19, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', 0, 'Pending', '', 50000, '2020-12-15 14:20:22', '2020-12-15 06:20:57'),
(20, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', 0, 'Shipped', '', 200, '2020-12-19 14:24:13', '2020-12-19 06:42:52'),
(21, 7, 'Haze@gmail.com', 'Hazeena', 'Wolivoran', 'Kalmunai', 'Eastern', 'Sri Lanka', '32300', '0123456789', 0, 'Shipped', '', 200, '2020-12-20 10:05:46', '2020-12-20 06:36:16'),
(22, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', 0, 'In Process', '', 350, '2020-12-20 14:33:40', '2020-12-20 06:36:06'),
(23, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', 0, 'New', '', 98, '2020-12-21 12:23:44', '2020-12-21 04:23:44'),
(24, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', 0, 'New', '', 100, '2020-12-21 12:34:37', '2020-12-21 04:34:37'),
(25, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', 0, 'New', '', 100, '2020-12-21 12:36:39', '2020-12-21 04:36:39'),
(26, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', 0, 'New', '', 100, '2020-12-21 12:39:27', '2020-12-21 04:39:27'),
(27, 7, 'Haze@gmail.com', 'Haze', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', 0, 'New', '', 375, '2020-12-22 13:24:22', '2020-12-22 05:24:22'),
(28, 1, 'thilsan000a@gmail.com', 'Thilsan', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', 0, 'New', '', 800, '2021-03-29 14:55:58', '2021-03-29 09:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 15, 'CS001', 'test', 'M', 'black', 200, 1, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(2, 9, 3, 15, 'CS001', 'test', 'M', 'black', 200, 2, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(3, 9, 3, 15, 'CS001', 'test', 'M', 'black', 200, 1, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(4, 9, 3, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(5, 9, 3, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(6, 9, 3, 16, 'CS001', 'Blue Casual Shoes', 'M', 'brown', 50000, 2, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(7, 9, 3, 15, 'CS001', 'test', 'M', 'black', 200, 1, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(8, 9, 3, 15, 'CS001', 'test', 'M', 'black', 200, 1, '2020-11-29 07:21:48', '2020-11-28 23:21:48'),
(9, 10, 3, 15, 'CS001', 'test', 'M', 'black', 200, 2, '2020-11-29 20:35:32', '2020-11-29 12:35:32'),
(10, 11, 3, 15, 'CS001', 'test', 'M', 'black', 200, 2, '2020-11-29 20:39:08', '2020-11-29 12:39:08'),
(11, 11, 3, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-11-29 20:39:08', '2020-11-29 12:39:08'),
(12, 12, 3, 15, 'CS001', 'test', 'M', 'black', 200, 2, '2020-11-30 06:56:28', '2020-11-29 22:56:28'),
(13, 12, 3, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-11-30 06:56:28', '2020-11-29 22:56:28'),
(14, 13, 3, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-11-30 07:11:15', '2020-11-29 23:11:15'),
(15, 1, 3, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-11-30 08:00:38', '2020-11-30 00:00:38'),
(16, 1, 3, 15, 'CS001', 'test', 'M', 'black', 200, 1, '2020-11-30 08:00:38', '2020-11-30 00:00:38'),
(17, 2, 3, 16, 'CS001', 'Blue Casual Shoes', 'M', 'brown', 50000, 1, '2020-11-30 08:03:51', '2020-11-30 00:03:51'),
(18, 3, 3, 18, 'TUMI001', 'TUMI', 'Large', 'Navy Blue', 375, 1, '2020-12-01 08:26:33', '2020-12-01 00:26:33'),
(19, 4, 5, 18, 'TUMI001', 'TUMI', 'Large', 'Navy Blue', 375, 2, '2020-12-01 13:42:02', '2020-12-01 05:42:02'),
(20, 5, 3, 15, 'CS001', 'test', 'M', 'black', 200, 1, '2020-12-01 14:31:04', '2020-12-01 06:31:04'),
(21, 6, 3, 18, 'TUMI001', 'TUMI', 'Large', 'Navy Blue', 375, 3, '2020-12-01 14:45:26', '2020-12-01 06:45:26'),
(22, 7, 3, 15, 'CS001', 'test', 'M', 'black', 200, 2, '2020-12-01 17:36:15', '2020-12-01 09:36:15'),
(23, 8, 3, 15, 'CS001', 'test', 'M', 'black', 200, 2, '2020-12-01 17:36:15', '2020-12-01 09:36:15'),
(24, 9, 3, 18, 'TUMI001', 'TUMI', 'Large', 'Navy Blue', 375, 2, '2020-12-15 14:00:25', '2020-12-15 06:00:25'),
(25, 10, 3, 15, 'CS001', 'test', 'S', 'black', 100, 3, '2020-12-15 14:03:01', '2020-12-15 06:03:01'),
(26, 11, 5, 15, 'CS001', 'test', 'S', 'black', 100, 1, '2020-12-15 14:05:59', '2020-12-15 06:05:59'),
(27, 12, 5, 15, 'CS001', 'test', 'L', 'black', 300, 1, '2020-12-15 14:07:03', '2020-12-15 06:07:03'),
(28, 13, 5, 16, 'CS001', 'Blue Casual Shoes', 'M', 'brown', 50000, 1, '2020-12-15 14:07:48', '2020-12-15 06:07:48'),
(29, 14, 5, 18, 'TUMI001', 'TUMI', 'Large', 'Navy Blue', 375, 2, '2020-12-15 14:08:45', '2020-12-15 06:08:45'),
(30, 15, 1, 16, 'CS001', 'Blue Casual Shoes', 'M', 'brown', 50000, 2, '2020-12-15 14:12:22', '2020-12-15 06:12:22'),
(31, 16, 5, 16, 'CS001', 'Blue Casual Shoes', 'M', 'brown', 50000, 1, '2020-12-15 14:14:02', '2020-12-15 06:14:02'),
(32, 17, 1, 22, '#SS001', 'Sports Shoe', 'M', 'Brown', 50, 1, '2020-12-15 14:19:19', '2020-12-15 06:19:19'),
(33, 18, 1, 18, 'TUMI001', 'TUMI', 'Large', 'Navy Blue', 375, 1, '2020-12-15 14:19:58', '2020-12-15 06:19:58'),
(34, 19, 1, 16, 'CS001', 'Blue Casual Shoes', 'M', 'brown', 50000, 1, '2020-12-15 14:20:22', '2020-12-15 06:20:22'),
(35, 20, 1, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 2, '2020-12-19 14:24:13', '2020-12-19 06:24:13'),
(36, 21, 7, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 2, '2020-12-20 10:05:46', '2020-12-20 02:05:46'),
(37, 22, 7, 37, '#WLS003', 'Women Long Sleeve Hooded Sweatshirt Short Style Pullover Hoodies Clothes', 'Small', 'Pink', 175, 2, '2020-12-20 14:33:40', '2020-12-20 06:33:40'),
(38, 23, 7, 17, '#SBW001', '3pcs Set Backpack With Purse Women Lady Girl Canvas For Outdoor Shopping School', 'Small', 'Dark Blue', 49, 2, '2020-12-21 12:23:44', '2020-12-21 04:23:44'),
(39, 24, 7, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 1, '2020-12-21 12:34:37', '2020-12-21 04:34:37'),
(40, 25, 7, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 1, '2020-12-21 12:36:39', '2020-12-21 04:36:39'),
(41, 26, 7, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 1, '2020-12-21 12:39:27', '2020-12-21 04:39:27'),
(42, 27, 7, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 2, '2020-12-22 13:24:22', '2020-12-22 05:24:22'),
(43, 27, 7, 37, '#WLS003', 'Women Long Sleeve Hooded Sweatshirt Short Style Pullover Hoodies Clothes', 'Large', 'Pink', 175, 1, '2020-12-22 13:24:22', '2020-12-22 05:24:22'),
(44, 28, 1, 37, '#WLS003', 'Women Long Sleeve Hooded Sweatshirt Short Style Pullover Hoodies Clothes', 'Large', 'Pink', 200, 2, '2021-03-29 14:55:58', '2021-03-29 09:25:58'),
(45, 28, 1, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 2, '2021-03-29 14:55:58', '2021-03-29 09:25:58'),
(46, 28, 1, 11, '#ATBC009', 'Anti Theft Backpack with USB-Charging', 'Small', 'Black', 100, 2, '2021-03-29 14:55:58', '2021-03-29 09:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thilsan000a@gmail.com', '$2y$10$zfO2MudGWQCMNtgDt4L30.w6IiFJ6ha4GmDkdpvkV77pk3TsKkQyG', '2020-12-01 00:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `authername`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Love stroy', 'Love stroy', 'this c', '2020-12-14 04:02:54', '2020-12-14 05:49:56'),
(2, 'Story of Horner', 'Thilsan', 'Yes.. it absolutely a horror story to scare', '2020-12-14 04:03:18', '2020-12-14 05:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `details`, `brand`, `old_price`, `price`, `image`, `product_status`, `status`, `created_at`, `updated_at`) VALUES
(2, 31, 'Canvas Waterproof Marshmello Usb Anti-Theft Laptop Dj Backpack For Men Student School Backpack Teenagers Girl Boys Bookbag', '#CWM002', 'Black | Brown', 'New upgrade, security protection to meet your different needs; Initial password 000.\r\nSet the password: 1. In the state of initial password 000, press and hold the dot below the password lock', '•	I’ll break down why your product descriptions are an incredible opportunity to engage your potential customers\r\n•	I’ll share five examples of insanely effective product descriptions\r\n•	And I\'ll explain how you can use these product description stra', 'ETOP', NULL, '120', '50867.jpg', NULL, 1, '2020-12-19 04:02:01', '2021-04-16 06:14:38'),
(3, 31, 'Camera Large BackPack Bag for Men', '#CLBB003', 'Black', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', 'Features:\r\n-Elegant backpack with color lining, compatible with most DSLR cameras;\r\n-Interior soft Purple / Red / Green / Orange lining;\r\n-Maintains DSLR camera body with attached lens and 1-2 additional lenses and accessories;\r\n-Tripod mounting syst', 'CA', NULL, '150', '12702.jpg', NULL, 1, '2020-12-19 04:24:07', '2021-04-15 03:29:34'),
(4, 31, 'Foldable Lightweight Waterproof Travel Backpack', '#FLWTB004', 'Pink', 'Super compact and convenient backpack to suit your traveling, and on-the-go needs. The main compartment has a small pocket on the inside. There is also a second front compartment, as well as ', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering into denied areas. ... The term \"black bag\" refers to the s', 'Catchme', NULL, '30', '81920.jpg', NULL, 1, '2020-12-19 04:33:26', '2021-04-15 03:29:45'),
(5, 31, 'Men\'s Canvas Messenger Shoulder Bag Handbag Outdoor Travel Hiking Crossbody Bag - Brown', '#MCMSB005', 'Brown', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', 'Made of high quality real leather, high-end atmosphere, wear-resistant.\r\n-Multi-pocket design, the items are placed in an orderly manner.\r\n-Large-capacity men\'s leather shoulder bag, suitable for business travel, work, etc.\r\n-Medium size, light and p', 'Generic', '', '200', '48095.jpg', NULL, 1, '2020-12-19 04:48:01', '2020-12-19 04:48:01'),
(6, 31, '3pcs/set Men\'s Backpack Bag Male USB Charging Laptop Schoolbag Business Bag Set - Grey', '#BBM006', 'Light Slate Gray', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', '● 3 pack set. What you could get is: 1 x backpack, 1 x messenger bag, 1 x handbag.\r\n● Fashion style design. Lightweight, breathable and comfortable.\r\n● Large capacity. You could storage up to 16inch laptop. Easy to travel.\r\n● Equipped with USB chargi', 'Generic', NULL, '200', '93444.jpg', NULL, 1, '2020-12-19 04:52:32', '2020-12-20 03:34:46'),
(7, 31, 'Vertical square European and American style travel canvas bag Outdoor large capacity round bucket student bag large 28*26*48-Avocado', '#VSE007', 'Dark Slate Gray', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', 'Reasonable price\r\nDurable and practical', 'Generic', '', '250', '64094.jpg', NULL, 1, '2020-12-19 05:16:13', '2020-12-19 05:16:13'),
(8, 31, 'Men genuine leather Business Laptop Backpack Man Vintage Fashion Travel Backpack Men USB Backpack PU Leather Business Laptop Rucksack Travel Shoulder Bag Handbag-Black', '#MGLB008', 'Black', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', 'Colors:Black,Khaki\r\nMaterial:PU Leather(Waterproof)\r\nLining Material:Polyester\r\nSize:about 30*10*41cm\r\n-Open Method: Zipper open.', 'Generic', '', '220', '29217.jpg', NULL, 1, '2020-12-19 05:20:57', '2020-12-19 05:20:57'),
(9, 31, 'USB charging stitching contrast color backpack two-piece mother bag simple college student bag-Army Green', '#UCS009', 'White &Slate Gray', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', 'Material:Polyester\r\nColor:Grey, Black, Blue, Rose\r\nWeight:580g\r\nLength:28cm(11.02\'\')\"\"\"\"', 'Generic', 'RM 200', '150', '10180.jpg', 'New', 1, '2020-12-19 05:23:46', '2020-12-19 05:59:41'),
(11, 31, 'Anti Theft Backpack with USB-Charging', '#ATBC009', 'Black', 'Black bag operations (or black bag jobs) are covert or clandestine entries into structures to obtain information for human intelligence operations. This usually entails breaking and entering ', 'Integrated USB charging port\r\nIlluminating safety strips\r\nWater repellent fabric\r\nWeight balance\r\nLuggage strap\r\nAdjustable open angles\"', 'Green.lk', '200', '100', '16526.jpg', 'New', 1, '2020-12-19 05:42:49', '2020-12-19 06:20:29'),
(12, 32, 'Men\'s Casual Shoes With Lace - Brown', '#MCS001', 'Brown', 'This shoe brings you to comfort all day around.\r\nIt is nice shoes for everyday use, or a wedding or formal occasion.\r\nMakes a statement of its own with a variety in men\'s casual footwear with', 'A Quality Product\r\nMade according to the international standards\r\nFashionable and Stylish', 'TSA', NULL, '69', '35300.jpg', NULL, 1, '2020-12-20 04:11:17', '2020-12-20 04:11:17'),
(13, 32, 'BC Mens Casual Shoe - Black Shoe', '#BCM002', 'Black', 'A Branded Quality Product\r\nMade according to the international standards\r\nBest suited for daily use in smart and casual wear.\r\nThe perfect blend of comfort\r\nDetailed eyelet and unique finish.', 'High quality\r\nDurable product\r\nComfortable to wear\"\"', 'BC', '100', '90', '49938.jpg', 'New', 1, '2020-12-20 04:15:38', '2020-12-20 04:23:28'),
(14, 32, 'BC Mens Casual Shoe - Black Shoe', '#BCM003', 'Gray & Black', 'A Branded Quality Product\r\nMade according to the international standards\r\nBest suited for daily use in smart and casual wear.\r\nThe perfect blend of comfort\r\nDetailed eyelet and unique finish.', 'High quality\r\nDurable product\r\nComfortable to wear\"\"', 'BC', '110', '99', '54375.jpg', NULL, 1, '2020-12-20 04:18:02', '2020-12-20 04:21:48'),
(15, 34, 'Perfect Premium Men\'s High Quality Plain Short Sleeve Mongo Branded V neck Comfort V Collar T Shirt Slim Fit Extended V-Neck t shit Casual Plain T shirt Tops Vneck Tee Casual Clothes T-Shirt ', '#PPM001', 'Maroon', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'Product Material : Cotton', 'Mongo', '50', '25', '92495.jpg', 'New', 1, '2020-12-20 04:31:41', '2020-12-20 04:31:41'),
(16, 34, 'Perfect High Quality Casual Mongo Cotton V-neck T Shirt for Men (Blue)', '#PHQ002', 'Black', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'Condition : New\r\nProduct Name : Men\'s Red V-Neck T-Shirt\r\nBrand : Mongo', 'Mongo', 'RM 50', '19', '21090.jpg', 'New', 1, '2020-12-20 04:34:23', '2020-12-20 04:34:23'),
(17, 21, '3pcs Set Backpack With Purse Women Lady Girl Canvas For Outdoor Shopping School', '#SBW001', 'Dark Blue', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'Kain: kanvas\r\nJumlah: 3 pcs/Set\r\nUkuran: besar tinggi: 44 CM lebar 27 CM tebal 15 CM Tengah: tinggi 23 CM lebar 19 CM tebal 6 CM, kecil: tinggi 12 CM lebar 20 CM\r\nKesempatan: pasti berjalan dengan baik dengan pakaian apa pun dalam setiap kesempatan s', 'ETOP', NULL, '49', '65925.jpg', 'New', 1, '2020-12-20 04:43:12', '2020-12-20 04:43:12'),
(18, 21, 'QUANBU Cute Cat Tassel Shoulder Bag Small Mini Coin Purse Messenger Bag Crossbody Satchel For Kids Girls, Color D Pink(4.7x3.9)', '#QCC002', 'Pink', 'Shoulder Bag with adjustable shoulder strap design,Magnetic buckle closing design,easy to open and use for kids. Novelty fashion style, Unique attractive Cute Tassel shoulder bag,Easy to carr', 'Shoulder Bag with adjustable shoulder strap design,Magnetic buckle closing design,easy to open and use for kids.\r\nNovelty fashion style, Unique attractive Cute Tassel shoulder bag,Easy to carry and store small treasures.\r\nCute Tassel shoulder bag. Ea', 'QUANBU', NULL, '25', '43800.jpg', NULL, 1, '2020-12-20 04:51:11', '2020-12-20 04:51:11'),
(19, 21, 'Cute Unicorn Girls Children School Bags Cartoon Printing Primary Backpacks Book Capacity Bags Satchel For Child 2-5 Years Old', '#CUG003', 'Pink', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'New and High Quality\r\n100% Real Shooting\r\nColor: Pink, Purple', 'ETOP', 'RM 55', '35', '69317.jpg', 'New', 1, '2020-12-20 04:54:31', '2020-12-20 04:54:31'),
(20, 33, 'Casual Walking Shoes Lightweight Anti Slip Running Sport Sneakers For Women', '#CWS001', 'Black', 'Classic Design: Classic Lightweight shoes provide comfortable feelings of walking barefooted for a more natural running or walking.\r\n\r\nSoftness and Slip Resistance: Slip-proof and firmly thic', '1you will happy to put on those fashion sneakers and get better sports, gym, running, walking, hiking experences2\"', 'Top Deals', NULL, '50', '9630.jpg', 'New', 1, '2020-12-20 05:00:11', '2020-12-20 05:00:36'),
(22, 33, 'Poplikdfr Unisex Children LED Light Shoes Sports Casual Anti-skid Baby Breathable Shoes', 'PUC003', 'Pink', 'Product category: Children Shoes\r\n\r\nHow to wear: magic sticker\r\n\r\nColor: red, black, pink, gray\r\n\r\nShoe upper material: mesh cloth\r\n\r\nSole material: rubber\r\n\r\nSize: 21 inner length 13 cm, 22 ', 'Soft, non-skid, high strength and wear-resistant rubber sole, so that baby is not easy to fall..', 'Poplikdfr', '50', '39', '82951.jpg', 'New', 1, '2020-12-20 05:22:06', '2020-12-20 05:22:06'),
(23, 33, 'Style women\'s Black sandals, Girls casual Flat sandals, Ladies slippers', '#SWB003', 'Black', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'High quality materials used. Very comfortable and low weight. Durable product.\r\nSizes available 4, 5, 6, 7. Elegant design', 'Style', 'RM 49', '39', '27601.jpg', 'New', 1, '2020-12-20 05:33:21', '2020-12-20 05:33:21'),
(25, 33, 'Womens Ladies Girls Korean Sandals for Women Women Fish Mouth Platform High Heels Wedge Sandals Buckle Slope Sandals Women Casual Flat Shoes Fashion Shoes Work', '#WLC005', 'White', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'It is made of high quality materials\r\nDurable enought for your daily wearing\r\nSpecial design will steal your heart!', 'BestGO', 'RM 149', '99', '39949.jpg', NULL, 1, '2020-12-20 05:42:03', '2020-12-20 05:42:03'),
(26, 33, 'Girl\'s Casual Shoes - Blue Color- Shoe', '#GCS', 'Blue', 'Richma Shoes brings to you the most stupendous collection of casual shoes in various colours.\r\nYou can shop these casual shoes in amazing prints and that too in high quality material.\r\nUnique', 'Product Type :Casual Shoes\r\nBrand : Richma Shoes\r\nColor : Blue\r\nHeel Type : No Heels', 'BestGO', '80', '49', '78811.jpg', NULL, 1, '2020-12-20 05:48:47', '2020-12-20 05:48:47'),
(27, 33, 'Girls Casual Shoes - black Color Shoe', '#GCS006', 'Black', 'This flat features a classic pointed-toe, ballet style design, every girl are worth it.\r\nThis style of shoe suits your personality and wardrobe perfectly. Wearable antiskid rubber sole as wel', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around features, problems it solves and other benefits to help generat', 'Mongo', NULL, '29', '47500.jpg', NULL, 1, '2020-12-20 05:51:22', '2020-12-20 05:51:22'),
(28, 34, 'Men\'s Casual Marshmello Short Sleeve Crew Neck T Shirt - White', '#MCM003', 'White', 'Color\r\nAs different computers display colors differently, the color of the actual item may vary slightly from the above images, thanks for your understanding.\r\nSmell\r\nAll of our items are bra', 'MATERIAL: Made of polyester blend fabric, heavy duty and made to resist shrinking, wrinkles and stains.\r\nDESIGN: Solid color, lapel neck, short sleeve, with waistbelt, with pockets, looking great and feel confident in any work situation.\r\nWITH POCKET', 'Jumperjuser', NULL, '99', '88999.jpg', 'New', 1, '2020-12-20 05:59:01', '2020-12-20 06:07:35'),
(29, 34, 'T-shirt Republic Purple - Men\'s Premium Polo T-shirt Purple', '#TSR004', 'Purple', 'Made with comfortable high-quality materials, fine durable stitches and export-ready production standards to give you the best value and comfort.\r\nOur Modern-Fit is a shape which falls betwee', 'Colour : Purple T shirt - DarkPurple\r\nMaterial : 65/35 Cotton Pique Knit (Crocodile Material)\r\nSpecialties : Comfortable, Excellent Colorfastness, Anti-shrink', 'Green.lk', NULL, '45', '7714.jpg', 'New', 1, '2020-12-20 06:10:03', '2020-12-20 06:10:03'),
(30, 34, 'Men\'s Printed Knit Denim  jeans with Collar Jeans', '#MPK005', 'Blue', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'Printed Knit Button Shirt with Collar\r\nCotton Base\"\"', 'Green.lk', 'RM 100', '80', '53512.jpg', NULL, 1, '2020-12-20 06:12:07', '2020-12-20 06:16:21'),
(31, 34, 'T-shirt Republic Men\'s Premium Long Sleeve T shirts 3 x Value Pack - Zinc Blue Marl - Grey Marl - Sky Blue Marl', '#TSR006', 'White', 'Made with comfortable high-quality materials, fine durable stitches and export-ready production standards to give you the best value and comfort.\r\n\r\nOur Modern-Fit is a shape which falls betw', 'Colours : Zinc Blue Marl - Grey Marl - Sky Blue Marl T shirts\r\nMaterial : 65/35 Cotton, Soft\r\nSpecialties : Comfortable, Excellent Colorfastness, Anti-shrink', 'BestGO', NULL, '120', '93979.jpg', NULL, 1, '2020-12-20 06:14:45', '2020-12-20 06:14:45'),
(32, 21, 'Women Bag Set Large Capacity Female Handbag Fashion Shoulder Bag Purse Wallet Ladies PU Leather Cross body Hand Bag', '#WBS004', 'Black', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around feat', 'Types of bags:Handbags & Crossbody bags\r\nDecoration:Tassel\r\nGender:WOMEN\r\nInterior:No Pocket\r\nStyle:Fashion\r\nColor: Brown and Gray\r\nClosure Type:Hasp\r\nItem Type:Handbags\r\nOccasion:Versatile\r\nMain Material:PU\r\nSize:33*14*30cm', 'Generic', NULL, '75', '98996.jpg', NULL, 1, '2020-12-20 06:20:43', '2020-12-20 06:20:43'),
(33, 21, 'Universal 4-Piece Women Bag Set With Tassel Bucket Bag, Handbag, Shoulder Bag And Card Holder', '#UPW005', 'Brown', 'Made of PU leather, super durable with smooth hand feel\r\n\r\n2.Easy to carry and use for travel, shopping and daily life\r\n\r\n3.4-Piece Set, Large Capacity, Come with Tassel Bucket Bag, Shoulder ', '1:Made of PU leather, super durable with smooth hand feel2:4-Piece Set, Large Capacity, Come with Tassel Bucket Bag, Handbag, Shoulder Bag and Card Holder3:Easy to carry and use for travel, shopping, daily wear', 'Generic', NULL, '150', '22079.jpg', 'New', 1, '2020-12-20 06:22:09', '2020-12-20 06:22:09'),
(34, 21, 'Women\'s Tote Bag Pu Bucket Tassel Mother Bag One-Shoulder Bag', '#WTB005', 'Red', 'Name: bucket set of four sets of buckets\r\nStyle: women\'s handbag\r\nFabric texture: PU\r\nPopular element: tassel\r\nBag trend style: child bag\r\nInner structure of the bag: zipper pocket\r\nProducts ', 'Stylish appearance, unique in the crowd\r\nHigh-quality durable Material\r\nMulti-space area division, can accommodate your items in the largest area, with high practical value', 'Mongo', NULL, '200', '69292.jpg', NULL, 1, '2020-12-20 06:23:25', '2020-12-20 06:23:25'),
(35, 35, 'Women Standing Collar Dot Printing Pleated Dress Korean Clothes', '#WSC001', 'Black', 'Item type: Dress\r\n\r\nColor: black\r\nSleeve length: long sleeve\r\nWaist type: loose waist\r\nMain fabric composition: polyester fiber (dacron)\r\nSize: Length Bust Waist Sleeve Shoulder\r\nS(cm) 100 96', 'Eco-friendly fabric, soft, breathable, lightweight to wear..\r\n-- Dot printing + pleated dress, pretty and fashion..', 'Generic', NULL, '200', '59138.jpg', 'New', 1, '2020-12-20 06:26:52', '2020-12-20 06:26:52'),
(36, 35, 'Poplikdfr Women Plaid Printing Pocket Irregular Casual Pleated Dress Korean Clothes', '#PWP002', 'Gray', 'Item type: Dress\r\n\r\nColor: black and white plaid\r\nMain fabric composition 2: polyester fiber (dacron)\r\nPattern: plaid pattern\r\nSleeve length: sleeveless\r\nSkirt shape: irregular skirt\r\nSize: L', '-- Made of eco-friendly material, breathable and comfortable..\r\n-- Plaid printing dress, beautiful and lovely, suitable for daily wear..', 'Generic', NULL, '120', '18593.jpg', NULL, 1, '2020-12-20 06:28:21', '2020-12-20 06:28:21'),
(37, 35, 'Women Long Sleeve Hooded Sweatshirt Short Style Pullover Hoodies Clothes', '#WLS003', 'Pink', 'tem type:Sweatshirt\r\n\r\nColor: yellow, gray, black, light blue stripe, pink\r\n\r\nStyle type: fresh and sweet\r\n\r\nApplicable gender: female\r\n\r\nSleeve type: Lantern Sleeve\r\n\r\nMain fabric compositio', 'A product description is the marketing copy used to describe a product\'s value proposition to potential customers. A compelling product description provides customers with details around features, problems it solves and other benefits to help generat', 'Green.lk', NULL, '175', '91440.jpg', 'New', 1, '2020-12-20 06:29:55', '2020-12-20 06:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 2, 'BSS001-S', 'Small', '1000', '100', '2020-11-20 04:15:31', '2020-11-20 04:15:31'),
(12, 15, 'CS001S', 'S', '100', '10', '2020-11-22 03:24:19', '2020-11-22 03:24:19'),
(13, 15, 'CS001M', 'M', '200', '10', '2020-11-22 03:24:19', '2020-11-22 03:24:19'),
(14, 15, 'CS001L', 'L', '300', '10', '2020-11-22 03:24:19', '2020-11-22 03:24:19'),
(15, 16, 'CS001', 'M', '50000', '2', '2020-11-24 05:04:08', '2020-11-24 05:04:08'),
(16, 17, '#IP001-S', 'Small', '600', '5', '2020-11-25 02:15:15', '2020-11-25 02:15:15'),
(17, 17, '#IP001-L', 'Large', '700', '3', '2020-11-25 02:15:15', '2020-11-25 02:15:15'),
(18, 18, 'TUMI001', 'Large', '375', '7', '2020-11-30 09:17:38', '2020-11-30 09:17:38'),
(27, 22, 'FBS001-S', 'L', '50000', '2', '2020-12-16 05:53:21', '2020-12-16 05:53:21'),
(28, 22, 'BSS001-S', 'Small', '1000', '2', '2020-12-16 06:25:42', '2020-12-16 06:25:42'),
(29, 21, 'FBS001-S', 'Large', '500', '50', '2020-12-19 02:39:10', '2020-12-19 02:39:10'),
(30, 11, '#ATBC009-S', 'Small', '100', '20', '2020-12-19 06:23:32', '2020-12-19 06:23:32'),
(31, 11, '#ATBC009-L', 'Large', '110', '10', '2020-12-19 06:23:32', '2020-12-19 06:23:32'),
(34, 36, '#PWP002', 'Small', '120', '50', '2020-12-22 05:26:41', '2020-12-22 05:26:41'),
(35, 36, '#PWP002', 'Large', '150', '2', '2020-12-22 05:26:41', '2020-12-22 05:26:41'),
(38, 37, '#WLS003', 'Small', '175', '10', '2020-12-22 06:15:34', '2020-12-22 06:15:34'),
(39, 37, '#WLS003', 'Large', '200', '10', '2020-12-22 06:16:21', '2020-12-22 06:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `city`, `state`, `country`, `pincode`, `telephone`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'Thilsan', 'thilsan000a@gmail.com', 'Ampara', 'Kalmunai', 'Eastern', 'Malaysia', '32300', '0123456789', NULL, '$2y$10$I6mkbFjUfQAfJroujXx4eOtkPMRnl57Zde8xtnd6PbxBLfSZsVoHC', 'admin', NULL, '2020-10-02 08:33:03', '2021-03-29 09:25:39', 1),
(6, 'Customer', 'Cus@gmail.com', '550 uwsakara road Dehwala', 'Dehwala', 'Dehwala', 'Sri Lanka', '1112', '111111111', NULL, '$2y$10$WJ7VKWqCsS01Is18b6S0E.vn4su4BQ7MPXBNpm2ZmiYwrqVy6Gz.u', NULL, NULL, '2020-12-20 02:00:55', '2020-12-20 02:00:55', NULL),
(7, 'Haze', 'Haze@gmail.com', 'boliworan road sainthamruthu', 'Kalmunai', 'Sainthamaruthu', 'Sri Lanka', '54000', '7272622762', NULL, '$2y$10$1vUPe9lsY8ohrU0nUnMJeOFhCIuXksKKi1dRLkCmUby9ApK/MWiAe', NULL, NULL, '2020-12-20 02:04:10', '2020-12-22 05:24:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
