-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2025 at 09:49 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neurobase`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'auth_token', '232dc793ebeb6ef1be87ad05275af3879dbcbbf8fbe87da1c75715bde7dac6c1', '[\"*\"]', NULL, NULL, '2025-01-30 16:56:42', '2025-01-30 16:56:42'),
(2, 'App\\Models\\User', 4, 'auth_token', '7377912e6600ce3bd876445ea4a3a9d523a9d378709168c068b92455db7df9e5', '[\"*\"]', NULL, NULL, '2025-01-30 18:45:24', '2025-01-30 18:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` tinyint(4) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `status`, `category_id`, `created_at`, `updated_at`, `images`, `price`) VALUES
(1, 'asd', 'asd', '1', 3, '2025-01-31 15:51:36', '2025-01-31 15:51:36', '[\"products\\/Y4lQ0CNXlN6t3TFmkzZMqneXiOSOLe8TDnzChZLr.jpg\"]', '0.00'),
(2, 'asd', 'asd', '1', 3, '2025-01-31 15:52:21', '2025-01-31 15:52:21', '[\"products\\/dD7pAfpqZjOyYOlt0ds7hwve1T8jxf7cB8Fe65m9.jpg\"]', '0.00'),
(3, 'DSAD', 'ASDAS', '0', 2, '2025-01-31 17:01:20', '2025-01-31 18:11:30', '[\"products\\/uqKXfQymFrA8IPfX6LuXpGkL7zmrKkuqyCcmXlYt.jpg\"]', '0.00'),
(4, 'sad', 'sad', '0', 2, '2025-01-31 17:01:41', '2025-01-31 18:11:33', '[]', '0.00'),
(8, 'asda', 'asda', '0', 2, '2025-01-31 17:15:07', '2025-01-31 17:15:07', '[]', '12.00'),
(9, 'iphone 22', 'hada iphone yack yack', '1', 3, '2025-01-31 21:22:19', '2025-01-31 21:22:19', '[\"products\\/mdxuxrUNDCqjjgcoRnQUUeeWzS4EXHLcoqgCXbCi.jpg\"]', '99999.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `image`, `created_at`, `updated_at`, `description`) VALUES
(2, 'Oppo', 'category_images/iRbteBXQCoVcF77ClWdneu9mja2HiomJegTIQoOh.jpg', '2025-01-31 15:38:53', '2025-02-01 10:05:50', '(sometimes stylized in all caps) is a Chinese consumer electronics manufacturer headquartered'),
(3, 'iPhone', 'category_images/jtaLFnSAfS5DLzsc8KZburzgA2kiahADMZEwkrlu.png', '2025-01-31 15:39:13', '2025-02-01 10:05:21', 'iPhone, series of smartphones produced by Apple Inc., combining mobile telephone, digital camera, music player, and personal computing technologies'),
(4, 'LG', 'category_images/cYsZzzrHI5Ant9FJsGi692gDPRKj7drI4o5Fl3wY.jpg', '2025-01-31 15:55:06', '2025-02-01 10:04:44', 'LG makes electronics, chemicals, household appliances, and telecommunications products and operates'),
(5, 'Samsung', 'category_images/gZeSgw4NCyTWNSqwerNoLFxmrrV1NYDjtkHTp7tj.png', '2025-02-01 10:04:18', '2025-02-01 10:04:18', 'Samsung, South Korean company that is one of the world\'s largest producers of electronic devices.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT '0',
  `manage_supers` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `username`, `avatar_id`, `super_user`, `manage_supers`, `permissions`, `last_login`) VALUES
(2, 'OTHMANE CHEMLAL', 'otmanechemlal12@gmail.com', NULL, '$2y$12$QMjk3tGrizZ0N7V9SpeRaOkawtftMM2fPBtameYrXgPpvr205D1zO', NULL, '2025-01-30 16:40:36', '2025-01-30 16:40:36', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(3, 'OTHMANE CHEMLA', 'otmanechemlal13@gmail.com', NULL, '$2y$12$Th0umPOE3wJyou0Nq8OpceIVU4.I8T6PyVhc5TIBYUknqE73uiu1y', NULL, '2025-01-30 16:54:36', '2025-01-30 16:54:36', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(4, 'OTHMANECHLAL', 'otmanechemlaltest@gmail.com', NULL, '$2y$12$A8HHPYDm2QyBIj1BkSnPjeQLXBtq.L2ze9DmwkVtw29c5XDtfp76.', NULL, '2025-01-30 18:45:24', '2025-01-30 18:45:24', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(5, 'ousa', 'chemlal@gmail.com', NULL, '$2y$12$ayUpQy4MTZqMkpLQpTlA/.f9FfglfdoxtupGfRk/npU.owoDw9ai6', NULL, '2025-01-30 18:51:51', '2025-01-30 18:51:51', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(6, 'oussama', 'oussama21@gmail.com', NULL, '$2y$12$TiG1JcM5In2fGr0KtkBbQu.y1dP7O7AVVyQW9eFWNSPDPt276ottK', NULL, '2025-01-30 18:54:32', '2025-01-30 18:54:32', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(7, 'TEST CHEMLAL', 'otmanechemlal2@gmail.com', NULL, '$2y$12$2SosdenWSOKA8FS2GKtxoedVjUaw04C5PB8oACHq0xcSIbgl/rUv.', NULL, '2025-02-01 10:13:49', '2025-02-01 10:13:49', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
