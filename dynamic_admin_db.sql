-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 06:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamic_admin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(251) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `admin_image` text NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `admin_image`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Dynamic Admin', NULL, 'admin@gmail.com', '$2y$10$MeUGpZak1oxYZZIEMao9wuYqElYiEaByLcexYvn571cQGTP5yVrR2', 'iJVIsXAFQSuUzC6btzFsnUU44kL6r3PFxrmMCb0XXvSoYCTe29kEcyQ5ZrKm', '', '7698472027', NULL, '2020-11-24 23:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_seos`
--

CREATE TABLE `general_seos` (
  `id` int(10) UNSIGNED NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_seos`
--

INSERT INTO `general_seos` (`id`, `seo_title`, `page_title`, `seo_keyword`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'General SEO Title', 'General Title', 'General Keywords', 'General Description', NULL, '2020-11-24 22:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `dec_pt` int(11) DEFAULT NULL,
  `registration` int(11) DEFAULT NULL,
  `email_verification` int(11) DEFAULT NULL,
  `sms_verification` int(11) DEFAULT NULL,
  `email_notification` int(11) DEFAULT NULL,
  `sms_notification` int(11) DEFAULT NULL,
  `email_sent_from` varchar(255) DEFAULT NULL,
  `email_template` blob DEFAULT NULL,
  `sms_api` text DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `website_title`, `dec_pt`, `registration`, `email_verification`, `sms_verification`, `email_notification`, `sms_notification`, `email_sent_from`, `email_template`, `sms_api`, `phone`, `email`, `footer`, `google_analytics`, `address`) VALUES
(1, 'Dynamic Admin', 2, 1, 1, 1, 0, 0, 'contact@brahmavedi.in', 0x3c703e266e6273703b3c2f703e0d0a3c64697620636c6173733d227772617070657222207374796c653d226261636b67726f756e642d636f6c6f723a20236632663266323b223e0d0a3c7461626c65207374796c653d227461626c652d6c61796f75743a2066697865643b20636f6c6f723a20236238623862383b20666f6e742d66616d696c793a205562756e74752c2073616e732d73657269663b2220616c69676e3d2263656e746572223e0d0a3c74626f64793e0d0a3c74723e0d0a3c746420636c6173733d227072656865616465725f5f736e697070657422207374796c653d2270616464696e672d746f703a20313070783b2070616464696e672d626f74746f6d3a203570783b20766572746963616c2d616c69676e3a20746f703b2077696474683a2032383070783b223e266e6273703b3c2f74643e0d0a3c746420636c6173733d227072656865616465725f5f77656276657273696f6e22207374796c653d2270616464696e672d746f703a20313070783b2070616464696e672d626f74746f6d3a203570783b20746578742d616c69676e3a2072696768743b20766572746963616c2d616c69676e3a20746f703b2077696474683a2032383070783b223e266e6273703b3c2f74643e0d0a3c2f74723e0d0a3c2f74626f64793e0d0a3c2f7461626c653e0d0a3c7461626c652069643d22656d622d656d61696c2d6865616465722d636f6e7461696e65722220636c6173733d2268656164657222207374796c653d227461626c652d6c61796f75743a2066697865643b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b2220616c69676e3d2263656e746572223e0d0a3c74626f64793e0d0a3c74723e0d0a3c7464207374796c653d2277696474683a2036303070783b223e0d0a3c64697620636c6173733d226865616465725f5f6c6f676f20656d622d6c6f676f2d6d617267696e2d626f7822207374796c653d22666f6e742d73697a653a20323670783b206c696e652d6865696768743a20333270783b20636f6c6f723a20236333636564393b20666f6e742d66616d696c793a20526f626f746f2c205461686f6d612c2073616e732d73657269663b206d617267696e3a20367078203230707820323070783b223e0d0a3c6469762069643d22656d622d656d61696c2d6865616465722220636c6173733d226c6f676f2d6c65667422207374796c653d22666f6e742d73697a653a203070782021696d706f7274616e743b206c696e652d6865696768743a20302021696d706f7274616e743b2220616c69676e3d226c656674223e3c696d67207374796c653d226865696768743a206175746f3b2077696474683a2033313270783b206d61782d77696474683a2033313270783b22207372633d2268747470733a2f2f627261686d61766564692e696e2f64656d6f2f6173736574732f757365722f696e74657266616365436f6e74726f6c2f6c6f676f49636f6e2f6c6f676f2e6a70672220616c743d22222077696474683d2233313222206865696768743d223434223e3c2f6469763e0d0a3c2f6469763e0d0a3c2f74643e0d0a3c2f74723e0d0a3c2f74626f64793e0d0a3c2f7461626c653e0d0a3c7461626c6520636c6173733d226c61796f7574206c61796f75742d2d6e6f2d67757474657222207374796c653d226261636b67726f756e642d636f6c6f723a20236666666666663b207461626c652d6c61796f75743a2066697865643b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b206f766572666c6f772d777261703a20627265616b2d776f72643b20776f72642d777261703a20627265616b2d776f72643b20776f72642d627265616b3a20627265616b2d776f72643b2220616c69676e3d2263656e746572223e0d0a3c74626f64793e0d0a3c74723e0d0a3c746420636c6173733d22636f6c756d6e22207374796c653d22766572746963616c2d616c69676e3a20746f703b20636f6c6f723a20233630363636643b206c696e652d6865696768743a20323170783b20666f6e742d66616d696c793a2073616e732d73657269663b2077696474683a2036303070783b223e0d0a3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b206d617267696e2d746f703a20323470783b223e0d0a3c646976207374796c653d226c696e652d6865696768743a20313070783b20666f6e742d73697a653a203170783b223e266e6273703b3c2f6469763e0d0a3c2f6469763e0d0a3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b223e0d0a3c68323e4869207b7b6e616d657d7d2c3c2f68323e0d0a3c703e3c7370616e207374796c653d22666f6e742d7765696768743a20626f6c643b223e7b7b6d6573736167657d7d3c2f7370616e3e3c2f703e0d0a3c2f6469763e0d0a3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b223e266e6273703b3c2f6469763e0d0a3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b206d617267696e2d626f74746f6d3a20323470783b223e0d0a3c7020636c6173733d2273697a652d313422207374796c653d226d617267696e2d626f74746f6d3a203070783b206c696e652d6865696768743a20323170783b223e5468616e6b732c3c62723e3c7370616e207374796c653d22666f6e742d7765696768743a20626f6c643b223e427261686d6156656469205465616d3c2f7370616e3e3c2f703e0d0a3c2f6469763e0d0a3c2f74643e0d0a3c2f74723e0d0a3c2f74626f64793e0d0a3c2f7461626c653e0d0a3c2f6469763e, 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=Matrimonial&SMSText={{message}}&GSM={{number}}&type=longSMS', '+91 7698472027', 'contact@dynamicadmin.in', '© 2020-2021 Dynamic Admin, Inc. All rights reserved.', '<script>\r\n(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');\r\n \r\n  ga(\'create\', \' \', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n</script>', '<p>Test Address</p>');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `menu_position` varchar(15) DEFAULT NULL,
  `menu_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `title`, `slug`, `body`, `menu_position`, `menu_status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'About Us', 'About-Us', '<p>Hiii... This is A Dynamic Admin About Us Page</p>', '1', 1, '2020-11-24 22:44:01', '2020-11-24 22:45:49');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_05_030338_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 1),
(2, 'App\\Admin', 1),
(3, 'App\\Admin', 1),
(4, 'App\\Admin', 1),
(5, 'App\\Admin', 1),
(6, 'App\\Admin', 1),
(7, 'App\\Admin', 1),
(8, 'App\\Admin', 1),
(9, 'App\\Admin', 1),
(10, 'App\\Admin', 1),
(11, 'App\\Admin', 1),
(12, 'App\\Admin', 1),
(13, 'App\\Admin', 1),
(14, 'App\\Admin', 1),
(15, 'App\\Admin', 1),
(16, 'App\\Admin', 1),
(17, 'App\\Admin', 1),
(18, 'App\\Admin', 1),
(19, 'App\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Role', 'admin', '2020-11-24 10:07:24', '2020-11-24 10:07:24'),
(2, 'Delete Role', 'admin', '2020-11-24 10:07:41', '2020-11-24 10:07:41'),
(3, 'Edit Role', 'admin', '2020-11-24 10:07:57', '2020-11-24 10:07:57'),
(4, 'Permission List', 'admin', '2020-11-24 10:08:16', '2020-11-24 10:08:16'),
(5, 'Edit Permission', 'admin', '2020-11-24 10:08:30', '2020-11-24 10:08:30'),
(6, 'Delete Permission', 'admin', '2020-11-24 10:08:45', '2020-11-24 10:08:45'),
(7, 'Add Admin User', 'admin', '2020-11-24 10:09:06', '2020-11-24 10:09:06'),
(8, 'Edit Admin User', 'admin', '2020-11-24 10:09:19', '2020-11-24 10:09:19'),
(9, 'Delete Admin User', 'admin', '2020-11-24 10:09:33', '2020-11-24 10:09:33'),
(10, 'All', 'admin', '2020-11-24 10:12:44', '2020-11-24 10:12:44'),
(11, 'Menu Management', 'admin', '2020-11-24 10:13:12', '2020-11-24 10:13:12'),
(12, 'Menu Edit', 'admin', '2020-11-24 10:13:24', '2020-11-24 10:13:24'),
(13, 'Delete Menu', 'admin', '2020-11-24 10:13:37', '2020-11-24 10:13:37'),
(14, 'Add Logo', 'admin', '2020-11-24 10:13:58', '2020-11-24 10:13:58'),
(15, 'Site Settings', 'admin', '2020-11-24 10:14:10', '2020-11-24 10:14:10'),
(16, 'Social Setting', 'admin', '2020-11-24 10:14:26', '2020-11-24 10:14:26'),
(17, 'Google Analytics', 'admin', '2020-11-24 10:14:39', '2020-11-24 10:14:39'),
(18, 'SEO', 'admin', '2020-11-24 10:14:52', '2020-11-24 10:14:52'),
(19, 'Log Viewer', 'admin', '2020-11-24 10:15:04', '2020-11-24 10:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2020-11-24 10:06:34', '2020-11-24 10:06:34'),
(2, 'Subscriber', 'admin', '2020-11-24 23:03:40', '2020-11-24 23:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `fontawesome_code` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `fontawesome_code`, `url`, `created_at`, `updated_at`) VALUES
(8, 'facebook', 'https://www.facebook.com', NULL, NULL),
(9, 'twitter', 'https://www.twitter.com', NULL, NULL),
(10, 'Instagram', 'https://www.instagram.com', NULL, NULL),
(11, 'linkedin', 'https://www.linkedin.com', NULL, NULL),
(12, 'youtube', 'https://www.youtube.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `is_term_accept` tinyint(1) NOT NULL DEFAULT 0 COMMENT ' 0 = not accepted,1 = accepted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `last_login_at`, `last_login_ip`, `to_be_logged_out`, `status`, `gender`, `mobile_no`, `created_by`, `updated_by`, `is_term_accept`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abhi', 'Solanki', 'abhi@gmail.com', 'gravatar', 'avatar-367-456319.webp', '$2y$10$MeUGpZak1oxYZZIEMao9wuYqElYiEaByLcexYvn571cQGTP5yVrR2', NULL, 1, NULL, 0, NULL, NULL, NULL, 0, 1, '1', '7956237412', NULL, NULL, 0, 'uQyzUSqVDimUAkStS00Lw5sT59Vqi4Z5ZBkinNAwNSOv3p2UFBjzxrrWBI68', '2020-11-24 23:01:11', '2021-06-29 06:24:19', NULL),
(2, 'Maru', 'Vishal', 'maruvishal@gmail.com', 'gravatar', NULL, '$2y$10$MUUqj96BZsdAWRFVfFADw.tSdubA4jClCqaNmVMWfan9rH7V40RZu', NULL, 1, NULL, 0, NULL, NULL, NULL, 0, 1, NULL, '8574965874', NULL, NULL, 0, NULL, '2020-12-27 22:36:12', '2020-12-27 22:36:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_seos`
--
ALTER TABLE `general_seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_seos`
--
ALTER TABLE `general_seos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
