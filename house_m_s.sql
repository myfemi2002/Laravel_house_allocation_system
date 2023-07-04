-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 02:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_m_s`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE IF NOT EXISTS `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apartment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `apartment_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Moses Hall', 1, 1, NULL, '2022-08-27 19:28:00', NULL),
(3, 'White House Loto', 1, 1, NULL, '2022-08-28 04:38:33', NULL),
(4, 'Estate 9', 1, 1, NULL, '2022-09-07 16:42:03', NULL),
(5, 'Samio Estate', 1, 1, 1, '2022-09-26 19:02:23', '2022-09-26 19:03:23'),
(6, 'Falana\'s Hall', 1, 1, NULL, '2023-01-13 19:31:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_rooms`
--

CREATE TABLE IF NOT EXISTS `assign_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_rooms`
--

INSERT INTO `assign_rooms` (`id`, `firstname`, `othername`, `surname`, `pow`, `department`, `apartment_id`, `block_id`, `room_id`, `phone`, `email`, `dob`, `remarks`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Adam', 'Williamson', 'James', 'Fire Services', 'Fire Department', '2', '2', '18', '+1 (927) 199-5249', 'dyri@mailinator.com', NULL, NULL, 1, 1, NULL, '2022-09-06 15:38:41', '2022-09-06 21:08:16'),
(2, 'Courtney', 'Adkins', 'Joyner', 'Zenith Bank', 'Bank', '2', '1', '2', '+1 (419) 908-9838', 'livaqobesi@mailinator.com', NULL, NULL, 1, 1, NULL, '2022-09-06 15:58:02', '2022-09-07 15:15:05'),
(3, 'Maisie', 'Crosby', 'Tate', 'Quo nemo aperiam obc', 'Amet atque vero quo', '2', '1', '1', '+1 (107) 636-8643', 'kujem@mailinator.com', NULL, NULL, 1, 1, NULL, '2022-09-06 21:11:51', '2022-09-06 21:12:38'),
(4, 'Raya', 'Mckinney', 'Fuller', 'Quaerat esse aliqui', 'Eiusmod tempora volu', '2', '1', '3', '+1 (354) 238-7671', 'cydiby@mailinator.com', NULL, NULL, 1, 1, NULL, '2022-09-06 21:14:28', '2022-09-06 21:14:44'),
(5, 'Avram', 'Phelps', 'Erickson', 'Et est earum at atq', 'Voluptas qui iusto c', '2', '1', '2', '+1 (906) 544-1889', 'zanifagi@mailinator.com', NULL, NULL, 1, 1, NULL, '2022-09-07 15:31:34', '2022-09-07 15:32:29'),
(6, 'Kameko', 'Gilbert', 'Booth', 'Neque voluptas aut i', 'Quas deleniti quam e', '2', '1', '10', '+1 (917) 877-4483', 'kulafirijo@mailinator.com', NULL, NULL, 0, 1, NULL, '2022-09-07 17:00:53', NULL),
(7, 'Tobias', 'Osborn', 'Haley', 'Rem esse sed soluta', 'Vitae aut ratione ex', '2', '2', '22', '+1 (757) 806-3361', 'qyhemaj@mailinator.com', NULL, NULL, 0, 1, NULL, '2022-09-08 22:45:03', NULL),
(8, 'Linda', 'Valentine', 'Sharpe', 'Delectus cillum mol', 'Dolore et omnis hic', '2', '1', '8', '+1 (512) 745-1789', 'cuzenuvuv@mailinator.com', NULL, NULL, 0, 1, NULL, '2022-09-08 23:41:23', NULL),
(9, 'Rae', 'Gentry', 'Williamson', 'Quibusdam voluptas d', 'Officia quia anim od', '2', '1', '9', '+1 (645) 594-2641', 'xyxivy@mailinator.com', NULL, NULL, 0, 1, NULL, '2022-09-08 23:43:22', NULL),
(10, 'Melyssa', 'Guerrero', 'Leonard', 'Amet amet molestia', 'Et corporis accusant', '2', '2', '23', '+1 (678) 672-1634', 'gisijiny@mailinator.com', NULL, NULL, 0, 1, NULL, '2022-09-08 23:44:57', NULL),
(11, 'Solomon', 'Wall', 'King', 'Saepe enim molestiae', 'Iure soluta perspici', '2', '2', '19', '+1 (377) 653-4104', 'robawexe@mailinator.com', NULL, NULL, 0, 1, NULL, '2022-09-08 23:46:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `block_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocks_apartment_id_foreign` (`apartment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `apartment_id`, `block_num`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Block-1', 1, 1, NULL, '2022-09-05 09:30:23', NULL),
(2, 2, 'Block-2', 1, 1, NULL, '2022-09-05 09:37:17', NULL),
(3, 3, 'Block-3', 1, 1, NULL, '2022-09-05 09:38:55', NULL),
(4, 3, 'Block-4', 1, 1, 1, '2022-09-05 09:39:13', '2022-09-05 09:43:26'),
(5, 2, 'Block-5', 1, 1, 1, '2022-09-05 11:54:06', '2022-09-05 11:54:52'),
(6, 2, 'Block-6', 1, 1, NULL, '2022-09-05 11:55:09', NULL),
(7, 2, 'Block-7', 1, 1, NULL, '2022-09-05 11:55:34', NULL),
(8, 2, 'Block-8', 1, 1, NULL, '2022-09-05 11:55:56', NULL),
(9, 2, 'Block-9', 1, 1, NULL, '2022-09-05 11:56:16', NULL),
(10, 2, 'Block-10', 1, 1, NULL, '2022-09-05 11:57:28', NULL),
(11, 2, 'Block-11', 1, 1, NULL, '2022-09-07 16:50:07', NULL),
(12, 5, 'Block-12', 1, 1, NULL, '2022-09-26 19:31:26', NULL),
(13, 5, 'Block-1', 1, 1, NULL, '2022-09-26 23:49:11', NULL),
(14, 5, 'Block-2', 1, 1, NULL, '2022-09-26 23:49:53', NULL),
(15, 6, 'Block-1', 1, 1, NULL, '2023-01-13 19:32:16', NULL),
(16, 6, 'Block-3', 1, 1, NULL, '2023-01-26 22:10:28', NULL),
(17, 6, 'Block-2', 1, 1, NULL, '2023-01-26 22:10:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_22_171648_laratrust_setup_tables', 1),
(6, '2022_08_27_025810_create_blocks_table', 13),
(7, '2022_08_27_075700_create_property_names_table', 2),
(8, '2022_08_27_174422_create_offices_table', 3),
(9, '2022_08_27_201227_create_apartments_table', 4),
(10, '2022_08_28_054937_create_shops_table', 5),
(11, '2022_08_28_101403_create_shop_nums_table', 6),
(12, '2022_08_28_121004_create_office_numbs_table', 7),
(15, '2022_09_02_140207_create_room_accessories_table', 10),
(17, '2022_09_05_101522_create_blocks_table', 14),
(19, '2022_09_06_004943_create_assign_rooms_table', 16),
(21, '2022_09_09_112618_create_room_nums_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'CRM Office', 1, 1, NULL, '2022-08-28 10:04:54', NULL),
(2, 'Moses Hall Office', 1, 1, NULL, '2022-08-28 10:07:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `office_numbs`
--

CREATE TABLE IF NOT EXISTS `office_numbs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `office_numb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_numbs`
--

INSERT INTO `office_numbs` (`id`, `office_numb`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Office-1', 1, 1, NULL, '2022-08-28 11:42:07', NULL),
(2, 'Office-2', 1, 1, NULL, '2022-08-28 11:43:19', NULL),
(3, 'Office-3', 1, 1, NULL, '2022-08-28 11:43:33', NULL),
(4, 'Office-4', 1, 1, NULL, '2022-08-28 11:43:45', NULL),
(5, 'Office-5', 1, 1, NULL, '2022-08-28 11:49:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_names`
--

CREATE TABLE IF NOT EXISTS `property_names` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apartment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_names`
--

INSERT INTO `property_names` (`id`, `apartment_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Moses Hall', 1, 1, NULL, '2022-08-27 09:43:04', NULL),
(2, 'White House Lotto', 1, 1, NULL, '2022-08-27 09:45:09', NULL),
(4, 'Canana Land Market', 1, 1, NULL, '2022-08-27 18:46:02', NULL),
(5, 'Moses Apartment Office', 1, 1, NULL, '2022-08-27 18:48:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_accessories`
--

CREATE TABLE IF NOT EXISTS `room_accessories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_accessories_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_accessories`
--

INSERT INTO `room_accessories` (`id`, `room_accessories_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 1, 1, 1, '2022-09-02 18:39:01', '2022-09-07 16:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `room_nums`
--

CREATE TABLE IF NOT EXISTS `room_nums` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `room_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not-Vacant, 1=Vacant, 2=Pending-Approval ',
  `room_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_accessories` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `photo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not-Sent, 1=Sent, 2=Pending',
  `date_sent` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_nums_block_id_foreign` (`block_id`),
  KEY `room_nums_apartment_id_foreign` (`apartment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_nums`
--

INSERT INTO `room_nums` (`id`, `block_id`, `apartment_id`, `room_num`, `room_status`, `room_description`, `room_accessories`, `firstname`, `othername`, `surname`, `pow`, `department`, `phone`, `email`, `dob`, `remarks`, `status`, `photo_image`, `msg_status`, `date_sent`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Flat-1', 1, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Davis', 'Damon Klein', 'Good', 'Corporis labore ut o', 'Nulla excepturi sint', '+1 (604) 923-9509', 'test@newinfo.com.ng', '1970-08-20', 'Consequatur Quibusd', 1, NULL, 1, '2022-10-08 22:50:03', 1, NULL, NULL, '2022-10-06 12:56:34', '2022-10-08 22:50:03'),
(2, 1, 2, 'Flat-2', 1, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Erich', 'Rhona Salas', 'Jimenez', 'Blanditiis deleniti', 'In in nobis est quo', '+1 (834) 493-3249', 'test@newinfo.com.ng', '2005-03-27', 'Porro ut quis conseq', 1, NULL, 2, NULL, 1, NULL, NULL, '2022-10-06 04:04:03', '2022-10-08 23:08:35'),
(3, 1, 2, 'Flat-3', 2, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Aphrodite', 'Driscoll Vinson', 'Bell', 'Voluptate quod moles', 'Perspiciatis exerci', '+1 (929) 882-4121', 'test@newinfo.com.ng', '1987-06-12', 'Sint accusantium et', 0, NULL, 0, NULL, 1, NULL, NULL, '2022-10-06 04:00:19', '2022-10-06 04:00:19'),
(4, 1, 2, 'Flat-4', 2, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Hall', 'Summer Bryant', 'Juarez', 'Eveniet illum ut s', 'Nulla est voluptas l', '+1 (153) 134-6339', 'test@newinfo.com.ng', '2015-09-17', 'Officiis nihil nostr', 0, NULL, 0, NULL, 1, NULL, NULL, '2022-10-06 03:43:21', '2022-10-06 03:43:21'),
(5, 1, 2, 'Flat-5', 1, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Basil', 'Xavier Hull', 'Alvarez', 'Laborum Error dolor', 'In labore obcaecati', '+1 (736) 709-8944', 'test@newinfo.com.ng', '2019-12-07', 'Enim sed vero deleni', 1, NULL, 2, NULL, 1, NULL, NULL, '2022-10-06 03:38:27', '2022-10-08 23:08:58'),
(6, 1, 2, 'Flat-6', 2, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Nolan', 'Quail Forbes', 'Silva', 'Consequat Aliquid l', 'Consectetur earum d', '+1 (965) 601-4968', 'test@newinfo.com.ng', '1974-05-12', 'Sunt impedit dolor', 0, NULL, 0, NULL, 1, NULL, NULL, '2022-10-06 03:35:49', '2022-10-06 13:52:19'),
(7, 1, 2, 'Flat-7', 1, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Mechelle', 'Dane Carr', 'Rhodes', 'Cum ipsam voluptas n', 'In omnis incidunt n', '+1 (604) 794-4974', 'test@newinfo.com.ng', '1981-07-30', 'Do inventore assumen', 1, NULL, 1, '2022-10-08 21:32:45', 1, NULL, NULL, '2022-10-06 02:44:30', '2022-10-08 21:32:45'),
(8, 1, 2, 'Flat-8', 1, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Aline', 'Pandora Clark', 'Johns', 'Suscipit culpa sit', 'Eveniet veritatis e', '+1 (526) 745-9349', 'test@newinfo.com.ng', '2005-10-02', 'In at in consectetur', 1, NULL, 1, '2022-10-08 20:58:29', 1, NULL, NULL, '2022-10-06 02:39:19', '2022-10-08 20:58:29'),
(9, 1, 2, 'Flat-9', 2, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Oleg', 'Cora Hayden', 'Duncan', 'Ipsam dolorem minima', 'Et voluptas modi duc', '+1 (694) 346-3724', 'test@newinfo.com.ng', NULL, NULL, 0, NULL, 0, NULL, 1, NULL, NULL, '2022-10-08 23:07:49', '2022-10-08 23:07:49'),
(10, 1, 2, 'Flat-10', 1, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Macy', 'Arsenio Hopkins', 'Knight', 'Pariatur Earum exer', 'Ullam est ex quae ma', '+1 (248) 805-2024', 'test@newinfo.com.ng', NULL, NULL, 1, NULL, 1, '2022-10-08 23:09:53', 1, NULL, NULL, '2022-10-08 23:08:14', '2022-10-08 23:09:53'),
(11, 2, 2, 'Flat-1', 2, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Bryar', 'Jonah Bullock', 'Moran', 'Consequatur perspic', 'Est aut quia culpa e', '+1 (621) 796-3291', 'gibopus@mailinator.com', NULL, NULL, 0, 'upload/occupant_images/1746242344025381.jpg', 0, NULL, 1, NULL, NULL, '2022-10-09 19:14:34', '2022-10-09 19:14:34'),
(12, 2, 2, 'Flat-2', 0, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2022-09-09 12:36:12', '2022-09-09 12:36:12'),
(13, 2, 2, 'Flat-3', 2, NULL, 'Clocks, Clothes, Rugs, Timber decor, Mirrors, Wall prints, Table lamps, Pinboards, Glass sculptures, Stool,Cushions, Books, Indoor plants,  Plates,AC', 'Abra', 'Libby York', 'Whitley', 'Quos harum quasi nem', 'Quasi nisi duis dolo', '+1 (531) 354-7877', 'gonefisego@mailinator.com', '1972-11-15', NULL, 0, 'upload/occupant_images/1746316601264151.jpg', 0, NULL, 1, NULL, NULL, '2022-10-10 14:54:57', '2022-10-10 14:54:57'),
(14, 2, 2, 'Flat-4', 2, NULL, 'Books,AC', 'Brenda', 'Skyler Booker', 'Tillman', 'Amet beatae volupta', 'Iusto saepe in fuga', '+1 (667) 549-4536', 'kaxigyq@mailinator.com', '1990-10-13', NULL, 0, 'upload/occupant_images/1746243734669350.jpg', 0, NULL, 1, NULL, NULL, '2022-10-09 19:36:40', '2022-10-09 19:36:40'),
(15, 1, 2, 'Flat-28', 1, NULL, 'Indoor plants,AC,Fan,Bulb', 'Hedy', 'Jesse Doyle', 'Dillard', 'Exercitationem qui q', 'In totam labore itaq', '+1 (973) 284-4843', 'test@newinfo.com.ng', NULL, NULL, 1, NULL, 1, NULL, 4, NULL, NULL, '2022-09-22 22:31:37', '2022-10-08 17:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Canana Land Shop', 1, 1, NULL, '2022-08-28 07:54:27', NULL),
(2, 'Moses Hall Shop', 1, 1, NULL, '2022-08-28 07:57:14', NULL),
(3, 'Lotto Shop', 1, 1, NULL, '2022-08-28 09:09:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_nums`
--

CREATE TABLE IF NOT EXISTS `shop_nums` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_numb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_nums`
--

INSERT INTO `shop_nums` (`id`, `shop_numb`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shop-1', 1, 1, NULL, '2022-08-28 09:48:39', NULL),
(2, 'Shop-2', 1, 1, NULL, '2022-08-28 09:48:59', NULL),
(4, 'Shop-3', 1, 1, NULL, '2022-08-28 09:52:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','manager','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `facebook`, `twitter`, `phone`, `address`, `role`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Femi Falana', 'adminlord', 'adminlord@admin.com', NULL, '$2y$10$KG6U6vKdfcYMuS6a2gUEh.4xRpFLo8/54OFDdeVo6zy3KUPsOTXIK', '1741382827267001.jpg', 'https://www.facebook.com/myfemi2002', 'https://www.twitter.com/myfemi2003', '+(234) 803-3554-3036', 'Block 21 Room 1, Moses Hall, Redemption Camp', 'admin', 'active', NULL, NULL, NULL, '2022-08-15 13:20:07', '2022-08-17 04:24:45'),
(2, 'Leslie Hall', 'managerlord', 'managerlord@admin.com', NULL, '$2y$10$nYdWoBhq6.eB/pdd2ef3L.LDg.k4BgvAmpG84X2ohsulyez7kwsNO', NULL, NULL, NULL, NULL, NULL, 'manager', 'active', NULL, NULL, NULL, '2022-08-25 04:59:03', '2022-08-25 04:59:03'),
(3, 'Acton Patel', 'userlord', 'userlord@admin.com', NULL, '$2y$10$nYdWoBhq6.eB/pdd2ef3L.LDg.k4BgvAmpG84X2ohsulyez7kwsNO', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, NULL, '2022-08-26 13:42:28', NULL),
(4, 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$nyWTtjYlUVyW9b71bTXSJOn6bkCJ3OohGe9S8lUqafAMaZ.gqy6zK', '1741382827267002.jpg', 'https://www.facebook.com/myfemi2002', 'https://www.twitter.com/myfemi2003', '+(234) 803-3554-3036', 'Block 21 Room 1, Moses Hall, Redemption Camp', 'admin', 'active', NULL, NULL, NULL, NULL, NULL),
(5, 'Nolan King', NULL, 'tudagik@mailinator.com', NULL, '$2y$10$NSl8kRrP82Qq9xCj5eSIVuq0eWKl5uY2Fkfi4A2Vy5foZEzQUODIG', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, NULL, '2023-04-23 22:10:19', '2023-04-23 22:10:19');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_nums`
--
ALTER TABLE `room_nums`
  ADD CONSTRAINT `room_nums_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_nums_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
