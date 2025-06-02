-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2025 at 01:57 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:43:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:17:\"delete permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"create permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:17:\"update permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"view permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"create role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"update role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:11:\"delete role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:9:\"view role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"create movie\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"update movie\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"delete movie\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"view movie\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"create category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:15:\"update category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"delete category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:13:\"view category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:11:\"create user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:11:\"update user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:11:\"delete user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:9:\"view user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:16:\"softDelete movie\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:13:\"restore movie\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:14:\"delete episode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:14:\"update episode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:14:\"create episode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"view episode\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:17:\"view notification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:19:\"delete notification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:20:\"restore notification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:23:\"softDelete notification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:19:\"update subscription\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:19:\"delete subscription\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:17:\"view subscription\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:11:\"delete plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:11:\"update plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:9:\"view plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:11:\"create plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:10:\"delete url\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:10:\"create url\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:8:\"view url\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:10:\"update url\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:41;a:3:{s:1:\"a\";i:42;s:1:\"b\";s:14:\"delete comment\";s:1:\"c\";s:3:\"web\";}i:42;a:3:{s:1:\"a\";i:43;s:1:\"b\";s:12:\"delete reply\";s:1:\"c\";s:3:\"web\";}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:8:\"employee\";s:1:\"c\";s:3:\"web\";}}}', 1748944881);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `is_hot`, `updated_at`) VALUES
(1, 'Marvel', '2025-05-27 07:11:35', 0, NULL),
(2, 'Sci-fi', '2025-05-27 07:11:35', 0, NULL),
(3, 'Sitcom', '2025-05-27 07:11:35', 0, NULL),
(4, 'Anime', '2025-05-27 07:11:35', 0, NULL),
(5, 'Hậu tận thế', '2025-05-27 07:11:35', 0, NULL),
(7, 'Khoa Học Viễn Tưởng', '2025-05-27 07:11:35', 0, NULL),
(8, 'Hành Động', '2025-05-27 07:11:35', 0, NULL),
(9, 'Tình Cảm', '2025-05-27 07:11:35', 0, NULL),
(10, 'Gia Đình', '2025-05-27 07:11:35', 0, NULL),
(11, 'Kinh Dị', '2025-05-27 07:11:35', 0, NULL),
(12, 'Hài Hước', '2025-05-27 07:11:35', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_movie`
--

CREATE TABLE `category_movie` (
  `id_category` bigint UNSIGNED NOT NULL,
  `id_movie` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_movie`
--

INSERT INTO `category_movie` (`id_category`, `id_movie`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 2),
(8, 2),
(10, 2),
(11, 2),
(12, 3),
(1, 4),
(5, 5),
(1, 8),
(8, 8),
(8, 11),
(10, 11),
(12, 11),
(12, 12),
(2, 13),
(7, 13),
(8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `id_movie` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments_replies`
--

CREATE TABLE `comments_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `id_movie` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_comment` bigint UNSIGNED NOT NULL,
  `id_user_reply` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint UNSIGNED NOT NULL,
  `id_movie` bigint UNSIGNED NOT NULL,
  `episode` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `id_movie`, `episode`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-27 07:11:36', '2025-05-27 07:11:36'),
(2, 1, 2, '2025-05-27 07:11:37', '2025-05-27 07:11:37'),
(3, 1, 3, '2025-05-27 07:11:37', '2025-05-27 07:11:37'),
(4, 2, 1, '2025-06-02 10:36:44', '2025-06-02 10:36:44'),
(5, 4, 1, '2025-06-02 11:30:55', '2025-06-02 11:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_movie` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `id_user`, `id_movie`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2025-06-01 11:16:45', '2025-06-01 11:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_movie` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_05_191021_create_subscriptions_plans_table', 1),
(5, '2025_03_05_191108_create_subsctiptions_table', 1),
(6, '2025_03_05_191238_create_notifications_table', 1),
(7, '2025_03_05_191239_create_payments_table', 1),
(8, '2025_03_05_191254_create_categories_table', 1),
(9, '2025_03_05_191303_create_banners_table', 1),
(10, '2025_03_05_191316_create_movies_table', 1),
(11, '2025_03_05_191428_create_episodes_table', 1),
(12, '2025_03_05_191444_create_urls_table', 1),
(13, '2025_03_05_191457_create_comments_table', 1),
(14, '2025_03_05_191517_create_comments__replies_table', 1),
(15, '2025_03_05_191540_create_favourites_table', 1),
(16, '2025_03_05_191554_create_histories_table', 1),
(17, '2025_03_14_212928_create_category_movie', 1),
(18, '2025_04_15_134334_add_favorite_to_movies', 1),
(19, '2025_04_17_102109_add_column_is_series_to_movies', 1),
(20, '2025_04_18_001052_fix_status_enum_in_subscriptions', 1),
(21, '2025_04_22_174128_add_detail_to_subscription_plans_table', 1),
(22, '2025_04_23_093114_add_image_to_users', 1),
(23, '2025_04_23_103054_add_is_hot_to_categories', 1),
(24, '2025_04_24_112826_create_replies', 1),
(25, '2025_04_30_181110_add_updated_at_to_categories', 1),
(26, '2025_05_01_000000_rename_favourite_to_favorite_table', 1),
(27, '2025_05_03_181417_add_gender_to_users', 1),
(28, '2025_05_15_111351_create_permission_tables', 1),
(29, '2025_05_15_120007_create_personal_access_tokens_table', 1),
(30, '2025_06_01_154801_add_trailer_url_to_movies_table', 2),
(31, '2025_06_01_164239_add_trailer_url_to_movies_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_year` year NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint NOT NULL,
  `film_duration` int NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `isPremium` tinyint(1) NOT NULL DEFAULT '0',
  `image` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `favorite` bigint UNSIGNED NOT NULL DEFAULT '0',
  `is_series` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `thumbnail`, `trailer_url`, `cast`, `director`, `release_year`, `country`, `views`, `film_duration`, `isDeleted`, `isPremium`, `image`, `created_at`, `updated_at`, `favorite`, `is_series`) VALUES
(1, 'Hala Madrid', 'Một bộ tài liệu nói về hành trình vĩ đại của Real Madrid dưới triều đại Ancelotti', 'images/1748339416.jpg', NULL, 'Real Madrid', 'Joe Russo', '2025', 'USA', 1500000, 140, 0, 0, '[\"storage/uploads/movies/3Q5fzL7vfFak8nhS0d5ko0JgaJvjWWflKLlGJC0z.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 09:50:16', 0, 0),
(2, 'The Last Of Us', 'lấy bối cảnh giả tưởng vào thời kỳ 20 năm sau tận thế. Một loại virus biến dị bởi chủng nấm ký sinh màng não (Cordyceps Brain Infection – CBI) gây ra dịch bệnh thế kỷ. Những người bị nhiễm bệnh sẽ biến thành quái vật ăn thịt đồng loại. Chủng virus này đã khiến hơn 60% dân số trên trái đất biến mất trong những năm đầu bùng nổ dịch. 20 năm kể từ ngày thảm họa xuất hiện, thế giới rơi vào tăm tối và thảm khốc', 'images/1748860271.jpg', 'https://www.youtube.com/embed/EVyDWbsucRA', 'Pedro Pascal, Bella Ramsey', 'Sony', '2024', 'USA', 920000, 130, 0, 0, '[\"storage/uploads/movies/kgL9obLN1zmHPNQniXRJQ82kCofUrj9azFMKkLhu.jpg\"]', '2025-05-27 07:11:35', '2025-06-02 10:31:11', 0, 0),
(3, 'Bộ phim về Minecraft', 'Bốn kẻ lạc lõng – Garrett “The Garbage Man” Garrison (Jason Momoa), Henry (Sebastian Hansen), Natalie (Emma Myers) và Dawn (Danielle Brooks) – bất ngờ gặp rắc rối khi họ bị kéo qua cánh cửa bí ẩn dẫn đến Overworld: một thế giới kỳ lạ được tạo bởi những khối lập phương và phát triển nhờ vào trí tưởng tượng.', 'images/1748771656.jpg', 'https://www.youtube.com/embed/PE2YZhcC4NY', 'Jack Black, Jason Mamoa, Emma Myers', 'Jared Hess', '2025', 'USA', 800000, 140, 0, 0, '[\"storage/uploads/movies/062gTbX48F1J3H6AgSc3aMgl2ilIdWnb6VvstJQo.jpg\"]', '2025-05-27 07:11:35', '2025-06-01 09:54:16', 0, 0),
(4, 'Oppenheimer', 'Năm 1926, Robert Oppenheimer là một sinh viên xuất sắc tại phòng thí nghiệm Cavendish ở Đại học Cambridge, song do nhớ nhà và gặp khó khăn trong việc học tập dưới vị giáo sư Patrick Blackett nên điều này đã khiến ông trầm cảm rất nhiều. Oppenheimer có ý định hãm hại giáo sư của mình bằng việc tẩm độc quả táo cho thầy ăn, nhưng sáng hôm sau, Niels Bohr đã vô tình nhìn thấy trái táo và Oppenheimer kịp thời ngăn không cho ông ăn nó.', 'images/1748772777.jpg', 'https://www.youtube.com/embed/uYPbbksJxIg', 'Ryan Reynolds, Margot Robbie', 'Christopher Nolan', '2023', 'Canada', 640000, 110, 0, 0, '[\"storage/uploads/movies/99WzZU7dGTBxP8jMgSlSxncwo56BFV44XWLQyipt.jpg\"]', '2025-05-27 07:11:35', '2025-06-01 10:12:57', 0, 0),
(5, '28 Years Later', '28 năm sau thảm hoạ đai dịch Zombies....', 'images/1748858569.jpg', 'https://www.youtube.com/embed/mcvLKldPM08', 'Cillian Murphy, Zendaya', 'Christopher Nolan', '2025', 'USA', 1200000, 145, 0, 0, '[\"storage/uploads/movies/vEj6ve3e45FBQ2RFyKeVezwL2kP0TwPtr1QpIjwG.jpg\"]', '2025-05-27 07:11:35', '2025-06-02 10:02:50', 0, 0),
(6, 'Retro Vibes', 'A nostalgic movie taking you back to the golden era of the 90s.', 'images/retro_vibes.jpg', NULL, 'Leonardo DiCaprio, Julia Roberts', 'Quentin Tarantino', '2024', 'USA', 500000, 120, 0, 0, '[\"retro_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0),
(7, 'Galactic Frontiers', 'A group of astronauts embark on a mission beyond the Milky Way.', 'images/galactic_frontiers.jpg', NULL, 'Tom Holland, Brie Larson', 'Denis Villeneuve', '2025', 'USA', 1300000, 150, 0, 0, '[\"sci_fi_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0),
(8, 'ThunderBolt', 'Khi giám đốc CIA Valentina Allegra de Fontaine đối mặt với nguy cơ luận tội vì một loạt các hoạt động bất hợp pháp, bà ta đã phái Yelena Belova, John Walker, Ghost và Taskmaster đến một cơ sở bí mật dưới vỏ bọc của một nhiệm vụ. Tại đó, các đặc vụ bị đẩy vào một cuộc đối đầu chết người, nơi Ghost giết Taskmaster, và một người đàn ông bí ẩn tên Bob bất ngờ xuất hiện.', 'images/1748778477.jpg', 'https://www.youtube.com/embed/hUUszE29jS0', 'Keanu Reeves, Charlize Theron', 'Chad Stahelski', '2025', 'USA', 1400000, 130, 0, 0, '[\"storage/uploads/movies/ah2BFBjGIQRvZ1e5kDwIPd9vHreR3uqS3vfV27mM.jpg\"]', '2025-05-27 07:11:35', '2025-06-01 11:47:58', 0, 0),
(9, 'Love in Paris', 'A heartfelt romance unfolds between two strangers in the City of Love.', 'images/love_in_paris.jpg', NULL, 'Timothée Chalamet, Lily Collins', 'Greta Gerwig', '2024', 'France', 850000, 125, 0, 0, '[\"romance_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0),
(10, 'Family Ties', 'A warm, comedic drama about three generations living under one roof.', 'images/family_ties.jpg', NULL, 'Meryl Streep, Tom Hanks', 'Ron Howard', '2023', 'USA', 780000, 110, 0, 0, '[\"family_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0),
(11, 'Sonic 3', 'A haunted mansion holds dark secrets that a group of friends must uncover.', 'images/1748859661.jpg', 'https://www.youtube.com/embed/qSu6i2iFMO0', 'Ryan Gosling', 'James Wan', '2024', 'Canada', 1120000, 105, 0, 0, '[\"storage/uploads/movies/6ypuIYYtGY2LQHiLDd0UxjD40JfBWGbddMc7jWK8.jpg\"]', '2025-05-27 07:11:35', '2025-06-02 10:21:01', 0, 0),
(12, 'The Mokey', 'A struggling stand-up comedian finds unexpected success.', 'images/1748860135.jpg', 'https://www.youtube.com/embed/husMGbXEIho', 'Pete Davidson, Awkwafina', 'Judd Apatow', '2024', 'USA', 690000, 95, 0, 0, '[\"storage/uploads/movies/cggWMBUwqsMzCFO9TZrN9JmmsPZfwigDSkLaUz3v.jpg\"]', '2025-05-27 07:11:35', '2025-06-02 10:28:55', 0, 0),
(13, 'Superman Movie (2025)', 'Hành tinh Krypton đang mất ổn định vì nguồn năng lượng bị khai thác quá mức. Jor-El, nhà khoa học và cũng là trưởng ban cố vấn của Krypton, xin hội đồng cho phép ông kiểm soát kho dự trữ huyết thống di truyền.', 'images/1748859037.jpg', 'https://www.youtube.com/embed/uhUht6vAsMY', 'Henry Cavill, Natalie Portman', 'Ridley Scott', '2025', 'UK', 920000, 155, 0, 0, '[\"storage/uploads/movies/b67oUCryyeDpJ2EAlNQNV02u94WfQczUVha9pKAl.jpg\"]', '2025-05-27 07:11:35', '2025-06-02 10:10:37', 0, 0),
(14, 'The New Avengers', 'A fresh lineup of heroes takes the stage to defend Earth.', 'images/the_new_avengers.jpg', NULL, 'Florence Pugh, Simu Liu', 'Ryan Coogler', '2026', 'USA', 1800000, 150, 0, 0, '[\"marvel_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0),
(15, 'Echoes of the Past', 'A young woman wakes up in medieval Japan with no memory.', 'images/echoes_past.jpg', NULL, 'Rina Sawayama, Hiroyuki Sanada', 'Takashi Miike', '2025', 'Japan', 970000, 140, 0, 0, '[\"isekai_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0),
(16, 'Shadow Ops', 'An elite soldier uncovers a conspiracy that threatens the world.', 'images/shadow_ops.jpg', NULL, 'Idris Elba, Gal Gadot', 'Michael Bay', '2026', 'USA', 1600000, 135, 0, 0, '[\"thriller_poster.jpg\"]', '2025-05-27 07:11:35', '2025-05-27 07:11:35', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_send_user` bigint UNSIGNED NOT NULL,
  `id_receive_user` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `content`, `id_send_user`, `id_receive_user`, `status`, `isDeleted`, `created_at`, `updated_at`) VALUES
(1, 'Chúc mừng bạn đã trở thành người dùng VIP!', 1, 1, 1, 0, '2025-05-27 07:11:37', '2025-05-27 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_noti` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `method` enum('credit_card','paypal','bank_transfer','cash','crypto','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit_card',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'delete permission', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(2, 'create permission', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(3, 'update permission', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(4, 'view permission', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(5, 'create role', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(6, 'update role', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(7, 'delete role', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(8, 'view role', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(9, 'create movie', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(10, 'update movie', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(11, 'delete movie', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(12, 'view movie', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(13, 'create category', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(14, 'update category', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(15, 'delete category', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(16, 'view category', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(17, 'create user', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(18, 'update user', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(19, 'delete user', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(20, 'view user', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(21, 'softDelete movie', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(22, 'restore movie', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(23, 'delete episode', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(24, 'update episode', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(25, 'create episode', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(26, 'view episode', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(27, 'view notification', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(28, 'delete notification', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(29, 'restore notification', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(30, 'softDelete notification', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(31, 'update subscription', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(32, 'delete subscription', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(33, 'view subscription', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(34, 'delete plan', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(35, 'update plan', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(36, 'view plan', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(37, 'create plan', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(38, 'delete url', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(39, 'create url', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(40, 'view url', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(41, 'update url', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(42, 'delete comment', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(43, 'delete reply', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `received_id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(2, 'employee', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35'),
(3, 'user', 'web', '2025-05-27 07:11:35', '2025-05-27 07:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(9, 2),
(10, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(21, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7Byzrn77ATrBTKLpAiFyrMahAoVRKjLn0ZFf8j0c', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiN0VZREFDaWlaS2FzejkyOGtRTG4yQXZSS3FJam9YRzNMRTdCN0dnNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Nb3ZpZURldGFpbC80Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjc6InVzZXJfaWQiO2k6MTtzOjk6InVzZXJfbmFtZSI7czo0OiJkZW1vIjtzOjEwOiJ1c2VyX2VtYWlsIjtzOjE1OiJhZG1pbkBnbWFpbC5jb20iO3M6MTA6ImlzX1ByZW1pdW0iO2k6MDt9', 1748863903);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `id_plan` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Status` enum('active','inactive','expired') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payment_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_plans`
--

CREATE TABLE `subscriptions_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions_plans`
--

INSERT INTO `subscriptions_plans` (`id`, `name`, `duration`, `price`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Gói miễn phí', '7', 0.00, NULL, '2025-05-27 07:11:37', '2025-05-27 07:11:37'),
(2, 'Gói 1 tháng', '1', 49.00, NULL, '2025-05-27 07:11:37', '2025-05-27 07:11:37'),
(3, 'Gói 3 tháng', '3', 119.00, NULL, '2025-05-27 07:11:37', '2025-05-27 07:11:37'),
(4, 'Gói 12 tháng', '12', 399.00, NULL, '2025-05-27 07:11:37', '2025-05-27 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` bigint UNSIGNED NOT NULL,
  `id_episode` bigint UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` enum('360p','480p','720p','1080p','4K') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '720p',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `id_episode`, `url`, `server_name`, `resolution`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://drive.google.com/file/d/1sX4K3NaRh5BIsAgj9qgnQK1sz1TLxVQn/preview', 'Google Drive', '720p', '2025-05-27 07:22:54', '2025-05-27 07:22:54'),
(2, 4, 'https://media.studyphim.vn/4uploader/mu4/user3/the%20last%20of%20us%20ss1/The.Last.of.Us.S01E01.720p.HMAX.WEBRip.x264-GalaxyTV.mp4?st=NDqSMJtRvVaQxI5kK5h68g&e=1748871243&uip=&playsinline=1&webkit-playsinline=1', 'google drive', '4K', '2025-06-02 10:36:59', '2025-06-02 10:36:59'),
(3, 5, 'https://tvhay.icu/api/vod/phimle/Oppenheimer.m3u8', 'google', '1080p', '2025-06-02 11:31:12', '2025-06-02 11:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPremium` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `isPremium`, `remember_token`, `created_at`, `updated_at`, `image`, `gender`) VALUES
(1, 'demo', 'admin@gmail.com', NULL, '$2y$12$MdlHOHtFeVJFM90k/wZki.s2KBk.STx6tsi9H4n3SIDkqK7Vxn//2', 0, NULL, '2025-05-27 07:11:35', '2025-06-01 11:18:31', '1166297.png', 1),
(2, 'King', 'king@gmail.com', NULL, '$2y$12$OOHecxSs3cTZYzNySLbF7OOAmi1HjxLyEvnOkVZe/D/qdY0ZhD2Bm', 0, NULL, '2025-05-27 07:11:35', '2025-05-27 07:11:35', NULL, 0),
(3, 'Phuc', 'phuc@gmail.com', NULL, '$2y$12$J2Aw0eDDJFmzVzQVkVdwpuCni8J2Ks/5KH8qHAG8n7yURMuMh02KS', 0, NULL, '2025-05-27 07:11:36', '2025-05-27 07:11:36', NULL, 0),
(4, 'Huy', 'huy@gmail.com', NULL, '$2y$12$C/WHEPTStq6WR9qlsIvEfe.cP1vISorWPf6XEW2s2wwl1S5FrFac6', 0, NULL, '2025-05-27 07:11:36', '2025-05-27 07:11:36', NULL, 0),
(5, 'Duy', 'duy@gmail.com', NULL, '$2y$12$h1Y5XyfhivxSDASSMMDs8eD7J53xjy2ffWaUiWvEIVsz84iAvgyCS', 0, NULL, '2025-05-27 07:11:36', '2025-05-27 07:11:36', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `category_movie`
--
ALTER TABLE `category_movie`
  ADD PRIMARY KEY (`id_category`,`id_movie`),
  ADD KEY `category_movie_id_movie_foreign` (`id_movie`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id_movie_foreign` (`id_movie`),
  ADD KEY `comments_id_user_foreign` (`id_user`);

--
-- Indexes for table `comments_replies`
--
ALTER TABLE `comments_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_replies_id_movie_foreign` (`id_movie`),
  ADD KEY `comments_replies_id_user_foreign` (`id_user`),
  ADD KEY `comments_replies_id_comment_foreign` (`id_comment`),
  ADD KEY `comments_replies_id_user_reply_foreign` (`id_user_reply`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_id_movie_foreign` (`id_movie`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_id_user_foreign` (`id_user`),
  ADD KEY `favourites_id_movie_foreign` (`id_movie`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_id_user_foreign` (`id_user`),
  ADD KEY `histories_id_movie_foreign` (`id_movie`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_id_send_user_foreign` (`id_send_user`),
  ADD KEY `notifications_id_receive_user_foreign` (`id_receive_user`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_id_user_foreign` (`id_user`),
  ADD KEY `payments_id_noti_foreign` (`id_noti`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_sender_id_foreign` (`sender_id`),
  ADD KEY `replies_received_id_foreign` (`received_id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_id_plan_foreign` (`id_plan`),
  ADD KEY `subscriptions_id_user_foreign` (`id_user`);

--
-- Indexes for table `subscriptions_plans`
--
ALTER TABLE `subscriptions_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `urls_id_episode_foreign` (`id_episode`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_replies`
--
ALTER TABLE `comments_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions_plans`
--
ALTER TABLE `subscriptions_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_movie`
--
ALTER TABLE `category_movie`
  ADD CONSTRAINT `category_movie_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_movie_id_movie_foreign` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_id_movie_foreign` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments_replies`
--
ALTER TABLE `comments_replies`
  ADD CONSTRAINT `comments_replies_id_comment_foreign` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_replies_id_movie_foreign` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_replies_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_replies_id_user_reply_foreign` FOREIGN KEY (`id_user_reply`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_id_movie_foreign` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favourites_id_movie_foreign` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_id_movie_foreign` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_id_receive_user_foreign` FOREIGN KEY (`id_receive_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_id_send_user_foreign` FOREIGN KEY (`id_send_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_id_noti_foreign` FOREIGN KEY (`id_noti`) REFERENCES `notifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_received_id_foreign` FOREIGN KEY (`received_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_id_plan_foreign` FOREIGN KEY (`id_plan`) REFERENCES `subscriptions_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `urls`
--
ALTER TABLE `urls`
  ADD CONSTRAINT `urls_id_episode_foreign` FOREIGN KEY (`id_episode`) REFERENCES `episodes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
