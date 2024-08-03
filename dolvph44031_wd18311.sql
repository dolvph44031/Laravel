-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 10:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolvph44031_wd18311`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lê Văn Đô', 'banners/0sTBQscRlAxBeSVxXu6Glox2y8uHfnHnNnqogGYR.jpg', 'cosma đẹp tuyệt vời', '2024-08-02 21:19:52', '2024-08-02 21:19:52'),
(3, 'Áo đẹp tuyệt vời', 'banners/kw7k9m6ue64dEwB8IeMZi0fHcN4r4zbqQbD9ZNqf.jpg', 'đẹp liền', '2024-08-02 21:22:38', '2024-08-02 21:22:38'),
(4, 'Lê Đoooooo', 'banners/Fo8Y3jK9eLyyEpxNqYl4InwnzmRPCJBqDy4CwdB2.jpg', 'dddddddddddddddddddd', '2024-08-02 21:45:19', '2024-08-02 21:45:19'),
(5, 'ddddddd44444', 'banners/dRSDlLhYcQBZb0p6UEYNIxzTUhv4rrBfWNOyiAnc.jpg', '333333333333', '2024-08-02 22:00:54', '2024-08-02 22:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-08-02 03:52:51', '2024-08-02 03:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_variant_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-08-02 03:52:51', '2024-08-02 03:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `cover`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Áo Sơ Mi', 'categories/bxYrd180GZFlNGLTHIMsX7XtR3uVkUKp6N9pUwdY.jpg', 1, '2024-08-01 08:47:31', '2024-08-01 22:22:18'),
(3, 'Áo Nữ', 'categories/aP77pSy9rYPx0k3ZyHT1d3Oz4mEj3XSeFyh7Nu4a.jpg', 1, '2024-08-01 08:47:31', '2024-08-01 22:22:07'),
(4, 'Áo Nam', 'categories/vhlP9Shui6rVH4EX0Zqr8vv8sxgPiRDMvJeqalex.jpg', 0, '2024-08-01 10:36:49', '2024-08-01 10:50:41'),
(5, 'Dứa', 'categories/cJIMBsPLrvg4gC7GbPD7a2jvMatpVOs4TH7AYPNw.jpg', 1, '2024-08-01 10:51:04', '2024-08-01 22:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2024_08_01_151538_create_categories_table', 2),
(12, '2024_08_01_151759_create_products_table', 2),
(13, '2024_08_01_152913_create_product_sizes_table', 2),
(14, '2024_08_01_152953_create_product_colors_table', 2),
(15, '2024_08_01_153203_create_product_galleries_table', 2),
(16, '2024_08_01_153445_create_product_variants_table', 2),
(19, '2014_10_12_000000_create_users_table', 3),
(20, '2024_08_02_082837_create_carts_table', 4),
(21, '2024_08_02_083021_create_cart_items_table', 4),
(22, '2024_08_02_083135_create_orders_table', 4),
(23, '2024_08_02_083221_create_order_items_table', 4),
(24, '2024_08_03_035211_create_banners_table', 5),
(27, '2024_08_03_051402_create_promotions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_phone` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `total_price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `product_img_thumb` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_sale` varchar(255) NOT NULL,
  `variant_size_name` varchar(255) NOT NULL,
  `variant_color_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `img_thumb` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `price_sale` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `use_manual` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_best_sale` tinyint(1) NOT NULL DEFAULT 0,
  `is_40_sale` tinyint(1) NOT NULL DEFAULT 0,
  `is_hot_online` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `category_id`, `img_thumb`, `price`, `price_sale`, `material`, `description`, `use_manual`, `is_active`, `is_best_sale`, `is_40_sale`, `is_hot_online`, `created_at`, `updated_at`) VALUES
(2, 'DELL', 'dell-eh5h8vqh8', 'EH5H8VQH8', 4, 'products/1B4m4ceQUND3orb09fcolVRJ53LV6uFb2XLmd6er.jpg', '17000000', '16000000', NULL, 'dappppppppppppp', NULL, 1, 1, 1, 1, '2024-08-01 10:59:16', '2024-08-01 10:59:16'),
(13, 'Áo của Đô', 'ao-cua-do-i2agyftqn', 'I2AGYFTQN', 4, 'products/DER5ThTHgNzucFngpxecA7GFo8z48WJUUddemTtU.jpg', '17000000', '10999999', NULL, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, 0, 1, 0, 1, '2024-08-01 22:21:15', '2024-08-02 00:46:43'),
(14, 'Áo đen đẹp trai', 'ao-den-dep-trai-aeunnjfj2', 'AEUNNJFJ2', 2, 'products/j78ldmbyRQgZQVVGKaSacK9Id97Hjlb5xhCGGmSb.jpg', '197999', '100999', NULL, 'đẹp tuyệt vời', NULL, 1, 1, 0, 1, '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(16, 'Áoooooo đẹpppp', 'aoooooo-depppp-dcpxpi7hu', 'DCPXPI7HU', 2, 'products/RFqkgVhx2a9nkQtOWXqupdeGzrFFY6ytgsxHxIuE.jpg', '17000000', '10999999', NULL, 'ccccccccccccccccc', NULL, 1, 1, 0, 0, '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(17, 'Áo Sơ mi Denim Nam Tay Dài', 'ao-so-mi-denim-nam-tay-dai-uk1xylfc4', 'UK1XYLFC4', 2, 'products/dBDUqBZaluf1ihnJBAuwTYiO1VhXWaUrHxJ0w2qq.jpg', '450000', '400000', NULL, 'Đẹp tuyệt vời', NULL, 1, 1, 0, 0, '2024-08-02 08:46:00', '2024-08-02 08:46:00'),
(18, 'Áo Sơ Mi Nam Tay Ngắn Cổ Chữ V', 'ao-so-mi-nam-tay-ngan-co-chu-v-ouadugfp9', 'OUADUGFP9', 3, 'products/R5Fah3bepGw1L8FQWErjOGLUuWn1m3IzsEU03LSs.webp', '350000', '320000', NULL, 'áo đẹp 10 điểm có nhưng đắt', NULL, 1, 1, 0, 0, '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(19, 'Áo Polo Contrast Color', 'ao-polo-contrast-color-r2agiw8j1', 'R2AGIW8J1', 4, 'products/OHsMCy3FcLyIO7yEzeaYVKfehosfqaAMiKsyilgm.webp', '350000', '299000', NULL, 'đẹp rẻ bền', NULL, 1, 1, 0, 0, '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(20, 'Áo Polo Nam Pattern Raglan', 'ao-polo-nam-pattern-raglan-qfbfjvk96', 'QFBFJVK96', 4, 'products/LHrwX5Vw4Jr9Udv5BXDS20LsXHQj7IdQzLiOndlG.webp', '390000', '350000', NULL, 'ddddddddddddddddddddd', NULL, 1, 1, 0, 1, '2024-08-02 08:58:52', '2024-08-02 08:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'black', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(2, 'blue', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(3, 'white', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(4, 'gray', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(5, 'yellow', '2024-08-01 09:00:58', '2024-08-01 09:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 2, '', NULL, NULL),
(5, 2, '', NULL, NULL),
(6, 2, '', NULL, NULL),
(7, 3, '', NULL, NULL),
(8, 3, '', NULL, NULL),
(9, 3, '', NULL, NULL),
(10, 4, '', NULL, NULL),
(11, 4, '', NULL, NULL),
(27, 9, '', NULL, NULL),
(28, 10, '', NULL, NULL),
(29, 10, '', NULL, NULL),
(30, 10, '', NULL, NULL),
(31, 11, '', NULL, NULL),
(32, 11, '', NULL, NULL),
(33, 11, '', NULL, NULL),
(34, 12, '', NULL, NULL),
(35, 12, '', NULL, NULL),
(36, 12, '', NULL, NULL),
(37, 13, '', NULL, NULL),
(38, 13, '', NULL, NULL),
(39, 13, '', NULL, NULL),
(41, 14, '', NULL, NULL),
(42, 14, '', NULL, NULL),
(43, 15, '', NULL, NULL),
(44, 15, '', NULL, NULL),
(45, 15, '', NULL, NULL),
(46, 16, '', NULL, NULL),
(47, 16, '', NULL, NULL),
(48, 16, '', NULL, NULL),
(49, 17, '', NULL, NULL),
(50, 17, '', NULL, NULL),
(51, 17, '', NULL, NULL),
(52, 18, '', NULL, NULL),
(53, 18, '', NULL, NULL),
(54, 18, '', NULL, NULL),
(55, 19, '', NULL, NULL),
(56, 19, '', NULL, NULL),
(57, 19, '', NULL, NULL),
(58, 20, '', NULL, NULL),
(59, 20, '', NULL, NULL),
(60, 20, '', NULL, NULL),
(61, 21, '', NULL, NULL),
(62, 21, '', NULL, NULL),
(63, 21, '', NULL, NULL),
(64, 22, '', NULL, NULL),
(65, 22, '', NULL, NULL),
(66, 22, '', NULL, NULL),
(67, 23, '', NULL, NULL),
(68, 23, '', NULL, NULL),
(69, 23, '', NULL, NULL),
(70, 24, '', NULL, NULL),
(71, 24, '', NULL, NULL),
(72, 24, '', NULL, NULL),
(73, 25, '', NULL, NULL),
(74, 25, '', NULL, NULL),
(75, 25, '', NULL, NULL),
(76, 26, '', NULL, NULL),
(77, 26, '', NULL, NULL),
(78, 26, '', NULL, NULL),
(79, 27, '', NULL, NULL),
(80, 27, '', NULL, NULL),
(81, 27, '', NULL, NULL),
(82, 28, '', NULL, NULL),
(83, 28, '', NULL, NULL),
(84, 28, '', NULL, NULL),
(85, 29, '', NULL, NULL),
(86, 29, '', NULL, NULL),
(87, 29, '', NULL, NULL),
(88, 30, '', NULL, NULL),
(89, 30, '', NULL, NULL),
(90, 30, '', NULL, NULL),
(91, 31, '', NULL, NULL),
(92, 31, '', NULL, NULL),
(93, 31, '', NULL, NULL),
(94, 32, '', NULL, NULL),
(95, 32, '', NULL, NULL),
(96, 32, '', NULL, NULL),
(97, 33, '', NULL, NULL),
(98, 33, '', NULL, NULL),
(99, 33, '', NULL, NULL),
(100, 34, '', NULL, NULL),
(101, 34, '', NULL, NULL),
(102, 34, '', NULL, NULL),
(103, 35, '', NULL, NULL),
(104, 35, '', NULL, NULL),
(105, 35, '', NULL, NULL),
(106, 36, '', NULL, NULL),
(107, 36, '', NULL, NULL),
(108, 36, '', NULL, NULL),
(109, 37, '', NULL, NULL),
(110, 37, '', NULL, NULL),
(111, 37, '', NULL, NULL),
(112, 38, '', NULL, NULL),
(113, 38, '', NULL, NULL),
(114, 38, '', NULL, NULL),
(115, 39, '', NULL, NULL),
(116, 39, '', NULL, NULL),
(117, 39, '', NULL, NULL),
(118, 40, '', NULL, NULL),
(119, 40, '', NULL, NULL),
(120, 40, '', NULL, NULL),
(121, 41, '', NULL, NULL),
(122, 41, '', NULL, NULL),
(123, 41, '', NULL, NULL),
(124, 42, '', NULL, NULL),
(125, 42, '', NULL, NULL),
(126, 42, '', NULL, NULL),
(127, 43, '', NULL, NULL),
(128, 43, '', NULL, NULL),
(129, 43, '', NULL, NULL),
(130, 44, '', NULL, NULL),
(131, 44, '', NULL, NULL),
(132, 44, '', NULL, NULL),
(133, 45, '', NULL, NULL),
(134, 45, '', NULL, NULL),
(135, 45, '', NULL, NULL),
(136, 46, '', NULL, NULL),
(137, 46, '', NULL, NULL),
(138, 46, '', NULL, NULL),
(139, 47, '', NULL, NULL),
(140, 47, '', NULL, NULL),
(141, 47, '', NULL, NULL),
(142, 48, '', NULL, NULL),
(143, 48, '', NULL, NULL),
(144, 48, '', NULL, NULL),
(145, 49, '', NULL, NULL),
(146, 49, '', NULL, NULL),
(147, 49, '', NULL, NULL),
(148, 50, '', NULL, NULL),
(149, 50, '', NULL, NULL),
(150, 50, '', NULL, NULL),
(151, 51, '', NULL, NULL),
(152, 51, '', NULL, NULL),
(153, 51, '', NULL, NULL),
(154, 52, '', NULL, NULL),
(155, 52, '', NULL, NULL),
(156, 52, '', NULL, NULL),
(157, 53, '', NULL, NULL),
(158, 53, '', NULL, NULL),
(159, 53, '', NULL, NULL),
(160, 54, '', NULL, NULL),
(161, 54, '', NULL, NULL),
(162, 54, '', NULL, NULL),
(163, 55, '', NULL, NULL),
(164, 55, '', NULL, NULL),
(165, 55, '', NULL, NULL),
(166, 56, '', NULL, NULL),
(167, 56, '', NULL, NULL),
(168, 56, '', NULL, NULL),
(169, 57, '', NULL, NULL),
(170, 57, '', NULL, NULL),
(171, 57, '', NULL, NULL),
(172, 58, '', NULL, NULL),
(173, 58, '', NULL, NULL),
(174, 58, '', NULL, NULL),
(175, 59, '', NULL, NULL),
(176, 59, '', NULL, NULL),
(177, 59, '', NULL, NULL),
(178, 60, '', NULL, NULL),
(179, 60, '', NULL, NULL),
(180, 60, '', NULL, NULL),
(181, 61, '', NULL, NULL),
(182, 61, '', NULL, NULL),
(183, 61, '', NULL, NULL),
(184, 62, '', NULL, NULL),
(185, 62, '', NULL, NULL),
(186, 62, '', NULL, NULL),
(187, 63, '', NULL, NULL),
(188, 63, '', NULL, NULL),
(189, 63, '', NULL, NULL),
(190, 64, '', NULL, NULL),
(191, 64, '', NULL, NULL),
(192, 64, '', NULL, NULL),
(193, 65, '', NULL, NULL),
(194, 65, '', NULL, NULL),
(195, 65, '', NULL, NULL),
(196, 66, '', NULL, NULL),
(197, 66, '', NULL, NULL),
(198, 66, '', NULL, NULL),
(199, 67, '', NULL, NULL),
(200, 67, '', NULL, NULL),
(201, 67, '', NULL, NULL),
(202, 68, '', NULL, NULL),
(203, 68, '', NULL, NULL),
(204, 68, '', NULL, NULL),
(205, 69, '', NULL, NULL),
(206, 69, '', NULL, NULL),
(207, 69, '', NULL, NULL),
(208, 70, '', NULL, NULL),
(209, 70, '', NULL, NULL),
(210, 70, '', NULL, NULL),
(211, 71, '', NULL, NULL),
(212, 71, '', NULL, NULL),
(213, 71, '', NULL, NULL),
(214, 72, '', NULL, NULL),
(215, 72, '', NULL, NULL),
(216, 72, '', NULL, NULL),
(217, 73, '', NULL, NULL),
(218, 73, '', NULL, NULL),
(219, 73, '', NULL, NULL),
(220, 74, '', NULL, NULL),
(221, 74, '', NULL, NULL),
(222, 74, '', NULL, NULL),
(223, 75, '', NULL, NULL),
(224, 75, '', NULL, NULL),
(225, 75, '', NULL, NULL),
(226, 76, '', NULL, NULL),
(227, 76, '', NULL, NULL),
(228, 76, '', NULL, NULL),
(229, 77, '', NULL, NULL),
(230, 77, '', NULL, NULL),
(231, 77, '', NULL, NULL),
(232, 78, '', NULL, NULL),
(233, 78, '', NULL, NULL),
(234, 78, '', NULL, NULL),
(235, 79, '', NULL, NULL),
(236, 79, '', NULL, NULL),
(237, 79, '', NULL, NULL),
(238, 80, '', NULL, NULL),
(239, 80, '', NULL, NULL),
(240, 80, '', NULL, NULL),
(241, 81, '', NULL, NULL),
(242, 81, '', NULL, NULL),
(243, 81, '', NULL, NULL),
(244, 82, '', NULL, NULL),
(245, 82, '', NULL, NULL),
(246, 82, '', NULL, NULL),
(247, 83, '', NULL, NULL),
(248, 83, '', NULL, NULL),
(249, 83, '', NULL, NULL),
(250, 84, '', NULL, NULL),
(251, 84, '', NULL, NULL),
(252, 84, '', NULL, NULL),
(253, 85, '', NULL, NULL),
(254, 85, '', NULL, NULL),
(255, 85, '', NULL, NULL),
(256, 86, '', NULL, NULL),
(257, 86, '', NULL, NULL),
(258, 86, '', NULL, NULL),
(259, 87, '', NULL, NULL),
(260, 87, '', NULL, NULL),
(261, 87, '', NULL, NULL),
(262, 88, '', NULL, NULL),
(263, 88, '', NULL, NULL),
(264, 88, '', NULL, NULL),
(265, 89, '', NULL, NULL),
(266, 89, '', NULL, NULL),
(267, 89, '', NULL, NULL),
(268, 90, '', NULL, NULL),
(269, 90, '', NULL, NULL),
(270, 90, '', NULL, NULL),
(271, 91, '', NULL, NULL),
(272, 91, '', NULL, NULL),
(273, 91, '', NULL, NULL),
(274, 92, '', NULL, NULL),
(275, 92, '', NULL, NULL),
(276, 92, '', NULL, NULL),
(277, 93, '', NULL, NULL),
(278, 93, '', NULL, NULL),
(279, 93, '', NULL, NULL),
(280, 94, '', NULL, NULL),
(281, 94, '', NULL, NULL),
(282, 94, '', NULL, NULL),
(283, 95, '', NULL, NULL),
(284, 95, '', NULL, NULL),
(285, 95, '', NULL, NULL),
(286, 96, '', NULL, NULL),
(287, 96, '', NULL, NULL),
(288, 96, '', NULL, NULL),
(289, 97, '', NULL, NULL),
(290, 97, '', NULL, NULL),
(291, 97, '', NULL, NULL),
(292, 98, '', NULL, NULL),
(293, 98, '', NULL, NULL),
(294, 98, '', NULL, NULL),
(295, 99, '', NULL, NULL),
(296, 99, '', NULL, NULL),
(297, 99, '', NULL, NULL),
(298, 100, '', NULL, NULL),
(299, 100, '', NULL, NULL),
(300, 100, '', NULL, NULL),
(301, 2, 'product_galleries/28btgJTMbj4zRylmM78Hx5N7Wi4HiIgbEljsRCsG.jpg', '2024-08-01 10:59:16', '2024-08-01 10:59:16'),
(306, 2, 'product_galleries/bJKwrUiORYpf6drNuyyi82VQ4cDHWHp3SdpTps3U.jpg', '2024-08-01 22:19:05', '2024-08-01 22:19:05'),
(307, 2, 'product_galleries/Quhmrfrv9jz7pHM1VzXUwrIX1F168uu9LxOjGvXG.jpg', '2024-08-01 22:19:05', '2024-08-01 22:19:05'),
(308, 2, 'product_galleries/xgqqvJ1HBcNthMZvBFRqi48bjmurnK6pN2v3b9H0.jpg', '2024-08-01 22:19:05', '2024-08-01 22:19:05'),
(309, 2, 'product_galleries/WHZFRqU1Bt36INKvkotiLFZYKD1Sb7O6nqBVDrGX.jpg', '2024-08-01 22:19:05', '2024-08-01 22:19:05'),
(310, 13, 'product_galleries/rfK8VWJiyCr5OXSaBFck7VU4yv3o5t5CE6Ma4p6z.jpg', '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(311, 13, 'product_galleries/r9HKrZpdeR7sHZcs07ay09XfBwH06AM8bNSO3ADP.jpg', '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(312, 13, 'product_galleries/7AoDwOQK9AXUuYvlsqBR6JAY4EpZxKfw100QqS8L.jpg', '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(313, 13, 'product_galleries/63C17yZluis7SfVELRIesE8SHAYIYNvOSHaqpXZX.jpg', '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(314, 14, 'product_galleries/wGMQxLkBs9uvtQn67zpejd5nTSRz5nVKlx0H1dyu.jpg', '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(315, 14, 'product_galleries/IvtJiPtiAAj6YO4ti3nBgwKkKpObfpFAgZunOlZl.jpg', '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(316, 14, 'product_galleries/GobyeS9NbyFcpEdVTCpOU5suzWnbiQufDZo6n36e.jpg', '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(317, 14, 'product_galleries/2GnYDNhYDw6kll9xJs7G0pz8PS4N6iD0h2BD8UK5.jpg', '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(318, 16, 'product_galleries/vEDjKfXgLKajQ8ibPVcOGU9tkPWpmRSAbhMYpOpC.jpg', '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(319, 16, 'product_galleries/H7D9eeTW1VJX6UdZ1IJFQgzg6XgzQrbskkeb2EXG.jpg', '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(320, 16, 'product_galleries/qCH98GkcqVz4SKDr7i5nVgL2tFC2JJrlDqcnxKoP.jpg', '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(321, 16, 'product_galleries/veBwN3LBUIbdJjLKdM4ibXZ4VLpSTDKsnZU2FoTq.jpg', '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(322, 17, 'product_galleries/wUc9faHpDoFWMEcvcNvBMNCFizD5nKciqi0gpAWq.jpg', '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(323, 17, 'product_galleries/QdbAKO1ZcB7yVUufd6HSydR4BmuwAfvW6C72Fni6.jpg', '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(324, 17, 'product_galleries/88zT3EoLxnsnMMWDVRS4ZzEKV430V1sP7SHvHtH7.jpg', '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(325, 18, 'product_galleries/9y01rUu1OlRaM8j6NPgD4NDxlneE8tFuIxzP54ah.webp', '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(326, 18, 'product_galleries/XnFrCTA9Zd10I28qJ2Gn6BT7b1F5iCV43VBHa8Sz.webp', '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(327, 18, 'product_galleries/c04ezAyDOsVB5ZrRu8GGetsstML9EIVOPGfRgnJY.webp', '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(328, 19, 'product_galleries/rGoOzrgQuwK5yFntSx5Lxwl6YdMBKNdws3x4ALGF.webp', '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(329, 19, 'product_galleries/KBe3xFwNYKSBcGD306QrAB5kxvdzi0X0wCdJ5sGn.webp', '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(330, 19, 'product_galleries/Yr9O0cBF1cbRsLWkkmzKcAaWI30xazJu6yT5JhaU.webp', '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(331, 19, 'product_galleries/7PIiQ9uD8YLyYUzLKHzHmOenN2gpgLv9fSL4bO7h.webp', '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(332, 20, 'product_galleries/9Ov1C5YKdRjlmqT1BvXDJtde5aPxE3O3snAv0SuE.webp', '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(333, 20, 'product_galleries/9YsamJIPlScnkotNO3tBlUlay4AqBImvxgjHTqEF.jpg', '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(334, 20, 'product_galleries/sW2vxN33uAyxynjW6rhziI3YKxjxaxK7pSM9pese.jpg', '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(335, 20, 'product_galleries/qbfuHIGvcpsBvIBRIUUFdGiQvvAnLt4btMMKximc.jpg', '2024-08-02 08:58:52', '2024-08-02 08:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(2, 'M', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(3, 'L', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(4, 'XL', '2024-08-01 09:00:58', '2024-08-01 09:00:58'),
(5, '2XL', '2024-08-01 09:00:58', '2024-08-01 09:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `product_size_id`, `product_color_id`, `image`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'product_variants/DeHOQ5nnncMi2DHwPUsijyUT84n2haqK7ZhloLCn.jpg', 133, 19999.00, '2024-08-01 10:59:16', '2024-08-01 21:56:22'),
(2, 2, 2, 2, 'product_variants/roh1ojapsLQ0udM1kbiHaC1QrNcAHqLG6cW1Mp2l.png', 16, 19999.00, '2024-08-01 10:59:16', '2024-08-01 21:56:22'),
(3, 2, 3, 3, 'product_variants/YHrTAnL7mBrHuuUrguKJwlIEviyqoHKZMgc57fiq.jpg', 12, 1999.00, '2024-08-01 10:59:16', '2024-08-01 21:57:19'),
(4, 2, 4, 3, 'product_variants/jJMpuD0lfpSToyPn1D7HLefHlM82X42YJIAT9iys.jpg', 16, 19999.00, '2024-08-01 10:59:16', '2024-08-01 21:57:19'),
(5, 2, 5, 5, 'product_variants/ePVUSozHKuvQUxahskqjo8HHyorRBqJyKLQtKsoT.jpg', 166, 199999.00, '2024-08-01 10:59:16', '2024-08-01 21:57:19'),
(8, 13, 2, 4, 'product_variants/khTm9FkImIYaHNIudxgg0qMwYPewFxMvZhFIrqLq.jpg', 333333, 3333.00, '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(9, 13, 1, 1, 'product_variants/sOZCzAjK14dF45x8ETUo64BEDnl4Am1D15DR9wZj.jpg', 33333, 3333.00, '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(10, 13, 3, 3, 'product_variants/OeBYFgeBD1zeIR5pH47KLj4G88ULbBM8aI9Be6JJ.jpg', 33333, 33333.00, '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(11, 13, 4, 2, 'product_variants/s3ewxepI8AE6ALLGfKifgz0yOzCyMD903GN5gWNY.jpg', 122, 3333.00, '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(12, 13, 5, 5, 'product_variants/u8jRt5u2fzSicXOn6TZUfW2pQceqfZpHmpNMRoxh.jpg', 33, 33333.00, '2024-08-01 22:21:15', '2024-08-01 22:21:15'),
(13, 14, 2, 3, 'product_variants/58w9PB6E4JAHNzjUbTImUu2x44jeOc1qYQjflR7p.jpg', 3333, 100999.00, '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(14, 14, 1, 2, 'product_variants/fURNBg6kw5LgfQ1qgRUwuFfknECdB4r8TSBXjJS3.jpg', 444, 100999.00, '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(15, 14, 3, 4, 'product_variants/EJ9etZeoRBXYW1uwAiO7rpRvJtg9qJ53a4EvJDB4.jpg', 222, 100999.00, '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(16, 14, 5, 5, 'product_variants/CCc2t6wkKjbZ5jaz8iIiDhlw02zwilDXldtbJ44z.jpg', 333, 100999.00, '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(17, 14, 4, 1, 'product_variants/JfKFyFmy7kurwPIwnUPqS6O3sSpJVIc3cA61HTFx.jpg', 555, 100999.00, '2024-08-02 00:45:56', '2024-08-02 00:45:56'),
(18, 16, 2, 5, 'product_variants/BlzyKBKeufZ91rrYxKWYvQRkDDWkRo8NDcAPmwIQ.jpg', 333, 100999.00, '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(19, 16, 1, 2, 'product_variants/yZoh9uGMDdn6aOoxr19T7N8KuimKSlXVx2kDFiU3.jpg', 333, 100999.00, '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(20, 16, 4, 3, 'product_variants/VPImJodJgIQagg9xv9cPvajD16g7N5nf4qEYRFyd.jpg', 22, 100999.00, '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(21, 16, 4, 5, 'product_variants/WJEKKiC8NxUh7ZC5q50zrky7Ul4GxdO5zf9ujdRh.jpg', 21, 100999.00, '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(22, 16, 5, 5, 'product_variants/ccMRQ3vr1g5D5hwzbhaQ0bbVSCd1Rm7mFLFxyTOx.jpg', 444, 100999.00, '2024-08-02 03:55:04', '2024-08-02 03:55:04'),
(23, 17, 4, 4, 'product_variants/P5RWn2bgFBqQj3fJEEgYVUAFUkA6wOScpZHht7Tg.jpg', 16, 400000.00, '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(24, 17, 2, 3, 'product_variants/9XcETnM2x4jdZ2VZr7G8Lsdc4Nb12qhSXZAqBh9y.jpg', 22, 400000.00, '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(25, 17, 5, 5, 'product_variants/renx2LeStOHXlbYNCWqKLlBpolIqOdnKm78Iyfa8.jpg', 33, 400000.00, '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(26, 17, 3, 1, 'product_variants/U0c3hb7ZLCI5a2h883pxOPlMQHiM0WgdZunbFykG.jpg', 44, 400000.00, '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(27, 17, 1, 2, 'product_variants/VcDZCUuRKevIYZex7M3WsT0mms7m8gVTLJf3YN0G.jpg', 555, 400000.00, '2024-08-02 08:46:01', '2024-08-02 08:46:01'),
(28, 18, 2, 3, 'product_variants/AIwrkKFBDT86ooe2qnF2lszShxQj8HmoBqhj2FTy.webp', 16, 320000.00, '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(29, 18, 5, 5, 'product_variants/9xl9AsIrLtEs6beTPRq4VPWKT7c8yHt78o0ZlMff.webp', 45, 320000.00, '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(30, 18, 3, 2, 'product_variants/AjXKGOFFjW2oFM0IkmfkcIle4W6VFIxhMc6on88l.webp', 54, 320000.00, '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(31, 18, 4, 1, 'product_variants/kScv7Ygq8eYQsxa7blsh6kWGcGbAz7ZdFX75F8XL.webp', 43, 320000.00, '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(32, 18, 1, 4, 'product_variants/vVNljI4ONlZUpowssZAqFGWBbopfy8AiFKongTfO.webp', 123, 320000.00, '2024-08-02 08:50:59', '2024-08-02 08:50:59'),
(33, 19, 2, 3, 'product_variants/mtEkGMiKc14Y7Dwjo2bNPHGE0LxO4rm1fksaa8RO.webp', 23, 299000.00, '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(34, 19, 3, 5, 'product_variants/5lZPjn3lRya2kc1mGaHhB3HKTgs7o4QrmINL7LJm.webp', 54, 299000.00, '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(35, 19, 4, 1, 'product_variants/RRwHkd402Fru04uc32tJCpbkbe9K7C9AS0i4L7dV.webp', 76, 299000.00, '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(36, 19, 1, 3, 'product_variants/zmi4JMxH1jf0GW2znqIeW6XZjh28HFfZZvzvdkpB.webp', 54, 299000.00, '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(37, 19, 5, 2, 'product_variants/qszmznUWtq7jVVQZ1uQtZVr79b1ZymfltBJQ5y9E.webp', 76, 299000.00, '2024-08-02 08:54:54', '2024-08-02 08:54:54'),
(38, 20, 1, 5, 'product_variants/OzIUVbNIUQy1vwsRZuwl1BHTz1fjTFyQEBRQauPy.webp', 54, 350000.00, '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(39, 20, 4, 1, 'product_variants/A1ZuvM5wsZCzrN7dOpFB3fKxR80whRsBx3dh31cl.jpg', 54, 350000.00, '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(40, 20, 5, 4, 'product_variants/uAk4yT9QGKys7o7e3DczNO2v3G5fIG5y9AdTO1fE.jpg', 2, 350000.00, '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(41, 20, 2, 2, 'product_variants/T4WzfFWCapoxNPo6xcja1tsCzuYsiuZn3VM3hS0U.jpg', 344, 350000.00, '2024-08-02 08:58:52', '2024-08-02 08:58:52'),
(42, 20, 3, 3, 'product_variants/Pem88NjcObnfOnQkn5vzwvrMVLJBxrTHhHeEvjgQ.jpg', 53, 350000.00, '2024-08-02 08:58:52', '2024-08-02 08:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(9) NOT NULL,
  `description` text DEFAULT NULL,
  `discount_amount` decimal(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `code`, `description`, `discount_amount`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(4, 'ddddddddddddddd', 'LEVANDOOA', 'ddddddddddddddddd', 200000.00, '2024-08-01', '2024-08-09', '2024-08-01 06:28:17', '2024-08-08 06:28:17'),
(5, 'ddddddddddddddd', 'LEVANDOOA', 'ddddddddddddddddd', 200000.00, '2024-08-01', '2024-08-09', '2024-08-01 06:28:17', '2024-08-08 06:28:17'),
(6, 'ddddddddddddddd', 'LEVANDOOB', 'ddddddddddddddddd', 400000.00, '2024-08-01', '2024-08-09', '2024-08-01 06:28:17', '2024-08-08 06:28:17'),
(7, 'levanle', 'LEVANDOOC', 'ddddddddddddddddd', 900000.00, '2024-08-01', '2024-08-09', '2024-08-01 06:28:17', '2024-08-03 00:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lê Đô', 'dolv282003@gmail.com', NULL, '$2y$10$8YKUdhpVTJuy2P0mkWNJTOsEWdRz91MyF0vzJt309lUqeJ0kB60AK', 'admin', NULL, '2024-08-02 03:35:58', '2024-08-03 01:07:44'),
(2, 'DELL', 'lexuandinh14011975@gmail.com', NULL, '$2y$10$j/jDV1l/6g1XR6q4us..O.An8VY4xfouUazmzNoFPgTtDDepZIKMu', 'member', NULL, '2024-08-02 03:46:28', '2024-08-02 03:46:28'),
(3, 'Lê Văn Đô', 'vando@gmail.com', NULL, '$2y$10$WPnNBY6mrElePUGwpyDIVeGZivIPuOYWpRQlqRb7bAGS6Zvge6LYe', 'admin', NULL, '2024-08-02 10:00:43', '2024-08-02 10:32:34'),
(4, 'dolvph44031', 'dolv2822222@gmail.com', NULL, '$2y$10$YY0jA/SfpHO5vbZt6bPud.r9mMbyX.SPuzw88yqgt3372Hm/jqFNO', 'admin', NULL, '2024-08-02 10:02:25', '2024-08-02 11:19:55'),
(5, 'DELL', 'dolv28222222222222@gmail.com', NULL, '$2y$10$JwLEkKATy4pQyDp6cT3h0OuqvXaznA7MLfDk2A8wOOh1I6Xy9.OHe', 'admin', NULL, '2024-08-02 10:32:53', '2024-08-02 10:33:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_unique` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_variant_id_foreign` (`product_variant_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variant_unique` (`product_id`,`product_size_id`,`product_color_id`),
  ADD KEY `product_variants_product_size_id_foreign` (`product_size_id`),
  ADD KEY `product_variants_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
