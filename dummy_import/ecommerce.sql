-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2022 at 02:05 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` int DEFAULT '0',
  `category` int DEFAULT '0',
  `product` int DEFAULT '0',
  `slider` int DEFAULT '0',
  `coupons` int DEFAULT '0',
  `shipping` int DEFAULT '0',
  `blog` int DEFAULT '0',
  `setting` int DEFAULT '0',
  `returnorder` int DEFAULT '0',
  `review` int DEFAULT '0',
  `orders` int DEFAULT '0',
  `stock` int DEFAULT '0',
  `reports` int DEFAULT '0',
  `alluser` int DEFAULT '0',
  `adminuserrole` int DEFAULT '0',
  `type` int DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `product`, `slider`, `coupons`, `shipping`, `blog`, `setting`, `returnorder`, `review`, `orders`, `stock`, `reports`, `alluser`, `adminuserrole`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-05-08 07:33:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 'ifXYd6Pepi', NULL, NULL, '2022-05-08 07:33:58', '2022-05-08 07:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_srb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `post_title_en`, `post_title_srb`, `post_slug_en`, `post_slug_srb`, `post_image`, `post_details_en`, `post_details_srb`, `created_at`, `updated_at`) VALUES
(1, 1, 'Innovative new technologies', 'Inovativne nove tehnologije', 'innovative-new-technologies', 'Inovativne-nove-tehnologije', 'upload/post/1732265821606628.jpg', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', '2022-05-08 11:43:43', NULL),
(2, 2, 'Discounts this month', 'Ovomesecni popusti', 'discounts-this-month', 'Ovomesecni-popusti', 'upload/post/1732265877084527.jpg', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', '2022-05-08 11:44:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

DROP TABLE IF EXISTS `blog_post_categories`;
CREATE TABLE IF NOT EXISTS `blog_post_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_name_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`id`, `blog_category_name_en`, `blog_category_name_srb`, `blog_category_slug_en`, `blog_category_slug_srb`, `created_at`, `updated_at`) VALUES
(1, 'News', 'Novosti', 'news', 'Novosti', '2022-05-08 10:41:45', NULL),
(2, 'Discounts', 'Popusti', 'discounts', 'Popusti', '2022-05-08 10:42:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_srb`, `brand_slug_en`, `brand_slug_srb`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'KYK bearings', 'KYK lezajevi', 'kyk-bearings', 'kyk-lezajevi', 'upload/brand/1732257886010099.png', NULL, NULL),
(2, 'SKF', 'SKF', 'skf', 'skf', 'upload/brand/1732257898668736.png', NULL, NULL),
(3, 'Zvl', 'Zvl', 'zvl', 'zvl', 'upload/brand/1732257924800336.jpg', NULL, NULL),
(4, 'Gufero', 'Gufero', 'gufero', 'gufero', 'upload/brand/1732258022531403.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_srb`, `category_slug_en`, `category_slug_srb`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Bearings and gears', 'Lezajevi i zupcanici', 'bearings-and-gears', 'lezajevi-i-zupcanici', 'fa-cogs', NULL, '2022-05-08 09:47:01'),
(2, 'Belts and shafts', 'Kaisevi i kardani', 'belts-and-shafts', 'kaisevi-i-kardani', 'fa-circle-o', NULL, '2022-05-08 09:47:44'),
(3, 'Screws', 'Srafovska roba', 'screws', 'srafovska-roba', 'fa-crosshairs', NULL, NULL),
(4, 'Small elements', 'Sitni elementi', 'small-elements', 'sitni-elementi', 'fa-bandcamp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int NOT NULL,
  `coupon_validity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TWENTY', 20, '2022-05-08', 1, '2022-05-08 10:32:36', NULL),
(2, 'TEST', 30, '2022-05-18', 1, '2022-05-08 10:32:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(209, '2014_10_12_000000_create_users_table', 1),
(210, '2014_10_12_100000_create_password_resets_table', 1),
(211, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(212, '2019_08_19_000000_create_failed_jobs_table', 1),
(213, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(214, '2021_02_02_203839_create_sessions_table', 1),
(215, '2021_02_02_212221_create_admins_table', 1),
(216, '2022_04_14_155640_create_brands_table', 1),
(217, '2022_04_16_084909_create_categories_table', 1),
(218, '2022_04_16_104847_create_sub_categories_table', 1),
(219, '2022_04_16_121109_create_sub_sub_categories_table', 1),
(220, '2022_04_17_093143_create_products_table', 1),
(221, '2022_04_17_094800_create_multi_imgs_table', 1),
(222, '2022_04_20_152644_create_sliders_table', 1),
(223, '2022_04_26_115722_create_wishlists_table', 1),
(224, '2022_04_26_155738_create_coupons_table', 1),
(225, '2022_04_27_095517_create_ship_divisions_table', 1),
(226, '2022_04_27_101348_create_ship_districts_table', 1),
(227, '2022_04_27_103955_create_ship_states_table', 1),
(228, '2022_05_05_135123_create_orders_table', 1),
(229, '2022_05_05_135343_create_order_items_table', 1),
(230, '2022_05_07_073909_create_blog_post_categories_table', 1),
(231, '2022_05_07_084553_create_blog_posts_table', 1),
(232, '2022_05_07_153244_create_site_settings_table', 1),
(233, '2022_05_07_163036_create_seos_table', 1),
(234, '2022_05_07_174942_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

DROP TABLE IF EXISTS `multi_imgs`;
CREATE TABLE IF NOT EXISTS `multi_imgs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/products/multi-img/1732262382877313.jpg', '2022-05-08 10:49:04', NULL),
(2, 1, 'upload/products/multi-img/1732262383221705.jpg', '2022-05-08 10:49:04', NULL),
(3, 1, 'upload/products/multi-img/1732262383337419.jpg', '2022-05-08 10:49:04', NULL),
(4, 2, 'upload/products/multi-img/1732262514812120.jpg', '2022-05-08 10:51:10', NULL),
(5, 2, 'upload/products/multi-img/1732262515198314.jpg', '2022-05-08 10:51:10', NULL),
(6, 2, 'upload/products/multi-img/1732262515323170.jpg', '2022-05-08 10:51:10', NULL),
(12, 4, 'upload/products/multi-img/1732263290788064.jpg', '2022-05-08 11:03:29', NULL),
(11, 4, 'upload/products/multi-img/1732263290685305.jpg', '2022-05-08 11:03:29', NULL),
(10, 4, 'upload/products/multi-img/1732263290308332.jpg', '2022-05-08 11:03:29', NULL),
(13, 5, 'upload/products/multi-img/1732263486607794.jpg', '2022-05-08 11:06:36', NULL),
(14, 5, 'upload/products/multi-img/1732263486713759.jpg', '2022-05-08 11:06:36', NULL),
(15, 5, 'upload/products/multi-img/1732263486852884.jpg', '2022-05-08 11:06:36', NULL),
(21, 7, 'upload/products/multi-img/1732263655543839.jpg', '2022-05-08 11:09:17', NULL),
(20, 7, 'upload/products/multi-img/1732263655256169.jpg', '2022-05-08 11:09:17', NULL),
(19, 7, 'upload/products/multi-img/1732263655114434.jpg', '2022-05-08 11:09:17', NULL),
(22, 8, 'upload/products/multi-img/1732263775651145.jpg', '2022-05-08 11:11:12', NULL),
(23, 8, 'upload/products/multi-img/1732263775937439.jpg', '2022-05-08 11:11:12', NULL),
(24, 8, 'upload/products/multi-img/1732263776049183.jpg', '2022-05-08 11:11:12', NULL),
(25, 9, 'upload/products/multi-img/1732263862895352.jpg', '2022-05-08 11:12:35', NULL),
(26, 9, 'upload/products/multi-img/1732263863215428.jpg', '2022-05-08 11:12:35', NULL),
(27, 9, 'upload/products/multi-img/1732263863350303.jpg', '2022-05-08 11:12:35', NULL),
(28, 10, 'upload/products/multi-img/1732264095323619.jpg', '2022-05-08 11:16:17', NULL),
(29, 10, 'upload/products/multi-img/1732264095749109.jpg', '2022-05-08 11:16:17', NULL),
(30, 10, 'upload/products/multi-img/1732264095871993.jpg', '2022-05-08 11:16:17', NULL),
(31, 11, 'upload/products/multi-img/1732264409430396.jpg', '2022-05-08 11:21:16', NULL),
(32, 11, 'upload/products/multi-img/1732264996398398.jpg', '2022-05-08 11:21:16', '2022-05-08 11:30:36'),
(34, 12, 'upload/products/multi-img/1732265254418732.jpg', '2022-05-08 11:34:42', NULL),
(35, 12, 'upload/products/multi-img/1732265254558405.jpg', '2022-05-08 11:34:42', NULL),
(36, 12, 'upload/products/multi-img/1732265254681163.jpg', '2022-05-08 11:34:42', NULL),
(37, 13, 'upload/products/multi-img/1732265255363522.jpg', '2022-05-08 11:34:43', NULL),
(38, 13, 'upload/products/multi-img/1732265255501825.jpg', '2022-05-08 11:34:43', NULL),
(39, 13, 'upload/products/multi-img/1732265255623900.jpg', '2022-05-08 11:34:43', NULL),
(40, 14, 'upload/products/multi-img/1732265382548653.jpg', '2022-05-08 11:36:44', NULL),
(41, 14, 'upload/products/multi-img/1732265382686529.jpg', '2022-05-08 11:36:44', NULL),
(42, 14, 'upload/products/multi-img/1732265382975224.jpg', '2022-05-08 11:36:45', NULL),
(43, 15, 'upload/products/multi-img/1732265476859016.jpg', '2022-05-08 11:38:14', NULL),
(44, 15, 'upload/products/multi-img/1732265476996844.jpg', '2022-05-08 11:38:14', NULL),
(45, 15, 'upload/products/multi-img/1732265477134967.jpg', '2022-05-08 11:38:15', NULL),
(46, 16, 'upload/products/multi-img/1732265590508720.jpg', '2022-05-08 11:40:03', NULL),
(47, 16, 'upload/products/multi-img/1732265590692378.jpg', '2022-05-08 11:40:03', NULL),
(48, 16, 'upload/products/multi-img/1732265590829438.jpg', '2022-05-08 11:40:03', NULL),
(49, 17, 'upload/products/multi-img/1732265696464760.jpg', '2022-05-08 11:41:44', NULL),
(50, 17, 'upload/products/multi-img/1732265696626646.jpg', '2022-05-08 11:41:44', NULL),
(51, 17, 'upload/products/multi-img/1732265696739463.jpg', '2022-05-08 11:41:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` int NOT NULL DEFAULT '0',
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_order`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, 'user1', 'user1@gmail.com', '15424', '32450, Dude Dudica 12', '15644', 'card_1KxAXCF8GiLheLMokNut9Idd', 'Stripe', 'txn_3KxAXDF8GiLheLMo2Boa5PyT', 'usd', 21.00, '6277cb38ad2c2', 'EOS31765996', '08 May 2022', 'May', '2022', '2022-05-08', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'confirm', '2022-05-08 11:52:59', '2022-05-08 11:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'Black', '16mm', '6', 5.00, '2022-05-08 11:52:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` bigint NOT NULL,
  `category_id` bigint NOT NULL,
  `subcategory_id` bigint NOT NULL,
  `subsubcategory_id` bigint DEFAULT NULL,
  `product_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int NOT NULL,
  `product_tags_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_srb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description_eng` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description_srb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int DEFAULT NULL,
  `featured` int DEFAULT NULL,
  `special_deals` int DEFAULT NULL,
  `special_offer` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_srb`, `product_slug_en`, `product_slug_srb`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_srb`, `product_size_en`, `product_size_srb`, `product_color_en`, `product_color_srb`, `selling_price`, `discount_price`, `short_description_eng`, `short_description_srb`, `long_description_eng`, `long_description_srb`, `product_thumbnail`, `hot_deals`, `featured`, `special_deals`, `special_offer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 6, 'Sprial gear no 1', 'Puzasti zubcanik br 1', 'sprial-gear-no-1', 'puzasti-zubcanik-br-1', '123488', 15, 'Spiral,Gear', 'Puazsti,Zubcanik', 'Small,Medium', 'Malo,Srednje', 'Black', 'Crna', '600', '540', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732262382756616.jpg', 1, NULL, NULL, NULL, 1, '2022-05-08 10:49:03', NULL),
(2, 2, 2, 4, 7, 'Belt V52', 'Kais V52', 'belt-v52', 'kais-v52', 'V52000', 52, 'Belt,V belt', 'Kais, Klinasti', 'Medium,Large', 'Srednje,Veliko', 'Black', 'Crna', '1000', '950', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732262514687777.jpg', NULL, 1, NULL, NULL, 1, '2022-05-08 10:51:09', NULL),
(4, 3, 3, 6, NULL, 'Bolt', 'Sraf', 'bolt', 'sraf', 'b10012', 150, 'Bolt', 'Sraf', '12mm,16mm,20mm', '12mm,16mm,20mm', 'Silver,Black', 'Srebrna,Crna', '6', NULL, 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732263289932504.jpg', NULL, NULL, 1, NULL, 1, '2022-05-08 11:03:29', '2022-05-08 11:19:32'),
(5, 4, 4, 9, NULL, 'Clamp L25mm', 'Osigurac L25mm', 'clamp-l25mm', 'osigurac-l25mm', 'c10025', 100, 'Clamp,25mm', 'Osigurac,25mm', 'Medium', 'Srednje', 'Silver', 'Srebrna', '15', NULL, 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732263486452668.jpg', NULL, NULL, NULL, 1, 1, '2022-05-08 11:06:36', NULL),
(7, 1, 1, 1, 1, 'Bearing C20', 'Lezaj C20', 'bearing-c20', 'lezaj-c20', 'b10020', 50, 'Bearing,20x2', 'Lezaj,Lager,20x2', 'Medium', 'Srednje', 'Silver', 'Srebrni', '200', '160', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732263654924172.jpg', 1, NULL, NULL, NULL, 1, '2022-05-08 11:09:17', NULL),
(8, 2, 2, 5, 9, 'Cross X540', 'Krstasti X540', 'cross-x540', 'krstasti-x540', 'x100540', 120, 'Shaft,Cross', 'Kardan,Krstasti', 'Medium,Large', 'Srednje,Veliko', 'Black', 'Crna', '1200', '1000', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732263775475189.jpg', NULL, NULL, 1, NULL, 1, '2022-05-08 11:11:12', NULL),
(9, 2, 3, 7, NULL, 'Nut', 'Matica', 'nut', 'matica', 'm10012', 150, 'Nut', 'Matica', '12mm,16mm,20mm', '12mm,16mm,20mm', 'Black,Silver', 'Crna,Srebrna', '5', NULL, 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732263862441968.jpg', NULL, 1, NULL, NULL, 1, '2022-05-08 11:12:35', '2022-05-08 11:18:58'),
(10, 3, 4, 8, NULL, 'Meh. Key 50mm', 'Mehanicki klin 50mm', 'meh.-key-50mm', 'mehanicki-klin-50mm', 'k10050', 100, 'Key,Mehanical', 'Mehanicki,Klin', 'Medium', 'Srednje', 'Black', 'Crna', '25', '22', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732264095173591.jpg', NULL, NULL, NULL, 1, 1, '2022-05-08 11:16:16', NULL),
(11, 1, 1, 3, 5, 'KHG 890', 'KHG 890', 'khg-890', 'khg-890', 'kh100100', 60, 'Gear', 'Zupcanik', 'Small,Medium,Large', 'Malo,Srednje,Veliko', 'Black', 'Crna', '33', '30', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265105694486.jpg', 1, NULL, NULL, NULL, 1, '2022-05-08 11:21:16', '2022-05-08 11:32:31'),
(12, 3, 2, 5, 10, 'A Shaft', 'A Kardan', 'a-shaft', 'a-kardan', 's100450', 120, 'Shaft', 'Kardan', 'Medium,Large', 'Srednje,Veliko', 'Black', 'Crna', '1600', '1520', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265254095918.jpg', 1, NULL, NULL, NULL, 1, '2022-05-08 11:34:42', NULL),
(13, 3, 2, 5, 10, 'A Shaft', 'A Kardan', 'a-shaft', 'a-kardan', 's100450', 120, 'Shaft', 'Kardan', 'Medium,Large', 'Srednje,Veliko', 'Black', 'Crna', '1600', '1520', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265254992420.jpg', 1, NULL, NULL, NULL, 1, '2022-05-08 11:34:43', NULL),
(14, 1, 1, 2, 3, 'SA Bearing', 'SA Lezaj', 'sa-bearing', 'sa-lezaj', 'sa10600', 36, 'Bearing', 'Lezaj,Lager', 'Medium,Large', 'Srednje,Veliko', 'Black', 'Crna', '750', NULL, 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265382406402.jpg', NULL, 1, NULL, NULL, 1, '2022-05-08 11:36:44', NULL),
(15, 1, 1, 2, 4, 'CGD Bearing', 'CGD Lezaj', 'cgd-bearing', 'cgd-lezaj', 'sgd104589', 45, 'Bearing', 'Lezaj,Lager', 'Small,Medium,Large', 'Malo,Srednje,Veliko', 'Black', 'Crna', '890', '800', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265476717289.jpg', 1, NULL, NULL, 1, 1, '2022-05-08 11:38:14', NULL),
(16, 1, 1, 1, 2, 'SPH Bearing', 'SPH Lezaj', 'sph-bearing', 'sph-lezaj', 'shp100658', 60, 'Bearing', 'Lezaj,Lager', 'Small,Medium,Large', 'Malo,Srednje,Veliko', 'Black', 'Crna', '790', '700', 'This is a placeholder description on english.', 'Ovo je privremeni opis na srpskom.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265590213508.jpg', NULL, NULL, 1, NULL, 1, '2022-05-08 11:40:02', NULL),
(17, 3, 2, 4, 8, 'R Belt', 'R Kais', 'r-belt', 'r-kais', 'gf145689', 56, 'Belt', 'Kais', 'Medium,Large', 'Srednje,Veliko', 'Black', 'Crna', '650', NULL, 'This is a placeholder description on english.', 'This is a placeholder description on english for purposes of testing the website.', 'This is a placeholder description on english for purposes of testing the website.', 'Ovo je privremeni opis na srpskom za potrebe testiranja rada stranice.', 'upload/products/thumbnail/1732265696356439.jpg', NULL, NULL, NULL, 1, 1, '2022-05-08 11:41:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Test review 1', 'Test review', '1', '2022-05-08 11:50:53', '2022-05-08 11:51:15'),
(2, 9, 1, 'test review 2', 'Test review 2', '0', '2022-05-08 11:51:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
CREATE TABLE IF NOT EXISTS `seos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'default', 'default', 'default', 'default', 'default', '2022-05-08 07:33:58', '2022-05-08 07:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hrIwc2EpqhROeqPslMqw93k2MfVZRsIhaVTYpTiT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36 OPR/85.0.4341.75', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6InNhc0Z6WDBSZFVTck5Kdm45c0Y2YzRCNEhFR1NRYlN6Qm85ODNjRzQiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTk6InBhc3N3b3JkX2hhc2hfYWRtaW4iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImNhcnQiO2E6MDp7fXM6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFBBVU9SU2h2ZU5uenFlVGNabHJ2S3U0V0I3RkFtaWM2bjhrNTZaTEFWdWVXaVlzcC9pd0cyIjtzOjg6Imxhbmd1YWdlIjtzOjc6ImVuZ2xpc2giO30=', 1652018621);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

DROP TABLE IF EXISTS `ship_districts`;
CREATE TABLE IF NOT EXISTS `ship_districts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Central serbia', '2022-05-08 10:36:41', NULL),
(2, 1, 'Vojvodina', '2022-05-08 10:36:50', NULL),
(3, 2, 'East coast', '2022-05-08 10:37:03', NULL),
(4, 2, 'West coast', '2022-05-08 10:37:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

DROP TABLE IF EXISTS `ship_divisions`;
CREATE TABLE IF NOT EXISTS `ship_divisions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Serbia', '2022-05-08 10:36:13', NULL),
(2, 'US', '2022-05-08 10:36:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

DROP TABLE IF EXISTS `ship_states`;
CREATE TABLE IF NOT EXISTS `ship_states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Banat', '2022-05-08 10:37:49', NULL),
(2, 1, 2, 'Backa', '2022-05-08 10:38:01', NULL),
(3, 1, 1, 'Sumadija', '2022-05-08 10:38:23', NULL),
(4, 1, 1, 'Niski okrug', '2022-05-08 10:38:35', NULL),
(5, 1, 1, 'Krusevacki okrug', '2022-05-08 10:38:47', NULL),
(6, 2, 3, 'Florida', '2022-05-08 10:39:38', NULL),
(7, 2, 3, 'New York', '2022-05-08 10:39:51', NULL),
(8, 2, 4, 'California', '2022-05-08 10:40:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1732267058575266.png', '060/000-434', '061/111-565', 'suport@ecomerc.com', 'Lazarevic Inc.', 'Lazara Lazarevica 12', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com/ludska01', 'www.youtube.com', '2022-05-08 07:33:58', '2022-05-08 12:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1732261298126850.jpg', 'Test slider 1', 'test 1 description', 1, NULL, NULL),
(2, 'upload/slider/1732261500411883.jpg', 'Test slider 2', 'test 2 description', 1, NULL, '2022-05-08 10:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint NOT NULL,
  `subcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_srb`, `subcategory_slug_en`, `subcategory_slug_srb`, `created_at`, `updated_at`) VALUES
(1, 1, 'Roller bearings', 'Rotirajuci lezajevi', 'roller-bearings', 'rotirajuci-lezajevi', NULL, NULL),
(2, 1, 'Ball bearings', 'Kuglicasti lezajevi', 'ball-bearings', 'kuglicasti-lezajevi', NULL, NULL),
(3, 1, 'Gears', 'Zupcanici', 'gears', 'zupcanici', NULL, '2022-05-08 10:06:03'),
(4, 2, 'Belts', 'Kaisevi', 'belts', 'kaisevi', NULL, NULL),
(5, 2, 'Shafts', 'Kardani', 'shafts', 'kardani', NULL, NULL),
(6, 3, 'Bolts', 'Srafovi', 'bolts', 'srafovi', NULL, NULL),
(7, 3, 'Nuts', 'Matice', 'nuts', 'matice', NULL, NULL),
(8, 4, 'Keys', 'Klinovi', 'keys', 'klinovi', NULL, NULL),
(9, 4, 'Clamps', 'Osiguraci', 'clamps', 'osiguraci', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

DROP TABLE IF EXISTS `sub_sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategory_id` bigint NOT NULL,
  `subsubcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_srb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_srb`, `subsubcategory_slug_en`, `subsubcategory_slug_srb`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cylindircal roller', 'Cilindricni lezajevi', 'cylindircal-roller', 'cilindricni-lezajevi', NULL, NULL),
(2, 1, 'Spherical rollers', 'Sfericni lezajevi', 'spherical-rollers', 'sfericni-lezajevi', NULL, NULL),
(3, 2, 'Self allingning', 'Samopozicionirajuci', 'self-allingning', 'samopozicionirajuci', NULL, NULL),
(4, 2, 'Caged', 'Zatvoreni', 'caged', 'zatvoreni', NULL, NULL),
(5, 3, 'Spur gears', 'Mamuzasti zupcanici', 'spur-gears', 'mamuzasti-zupcanici', NULL, NULL),
(6, 3, 'Spiral bevel gear', 'Puzasti zupcanici', 'spiral-bevel-gear', 'puzasti-zupcanici', NULL, NULL),
(7, 4, 'V belts', 'Klinasti kaisevi', 'v-belts', 'klinasti-kaisevi', NULL, NULL),
(8, 4, 'Round belts', 'Okrugli kaisevi', 'round-belts', 'okrugli-kaisevi', NULL, NULL),
(9, 5, 'Cross shafts', 'Krstasti kardani', 'cross-shafts', 'krstasti-kardani', NULL, NULL),
(10, 5, 'Axle shafts', 'Obicni Kardani', 'axle-shafts', 'obicni-kardani', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@gmail.com', '0+654156454564', '2022-05-08 14:03:41', NULL, '$2y$10$PAUORShveNnzqeTcZlrvKu4WB7FAmic6n8k56ZLAVueWiYsp/iwG2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-08 11:50:23', '2022-05-08 12:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2022-05-08 11:50:30', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
