-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2025 at 01:45 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jayams1h_team`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `title`, `subtitle`, `description`, `about_code`, `created_at`, `updated_at`) VALUES
(1, 'about_us_images/lbEbb1VzGYeoQLp235UZXHklaaxG98wIIt5aGNA6.png', 'About 1', 'We Clean, You Shine', 'LauntreeTM brand is an online and retail laundry service provider. Be it steam ironing, starching, stain removal, minor alterations, laundry and dry-cleaning.', '<style>\r\n    .about-us-section {\r\n      padding: 50px 0;\r\n    }\r\n    .about-us-image {\r\n      max-width: 100%;\r\n      border-radius: 10px;\r\n    }\r\n    .about-us-title {\r\n      font-size: 2rem;\r\n      font-weight: 600;\r\n    }\r\n    .about-us-description {\r\n      font-size: 1.1rem;\r\n      line-height: 1.8;\r\n    }\r\n  </style>  \r\n<section class=\"about-us-section\">\r\n    <div class=\"container\">\r\n      <div class=\"row align-items-center\">\r\n        <!-- Left Side: Image -->\r\n        <div class=\"col-md-6\">\r\n          <img src=\"https://via.placeholder.com/500\" alt=\"About Us Image\" class=\"about-us-image img-fluid\">\r\n        </div>\r\n        <!-- Right Side: Title and Description -->\r\n        <div class=\"col-md-6\">\r\n          <h2 class=\"about-us-title\">About Us</h2>\r\n          <p class=\"about-us-description\">\r\n            Our mission is to provide high-quality solutions that cater to the needs of our diverse clientele. We pride ourselves on delivering unparalleled customer service and innovative solutions to help businesses grow.\r\n          </p>\r\n          <p class=\"about-us-description\">\r\n            Our team consists of industry experts with years of experience and a passion for excellence. Whether you\'re looking for business consulting, technical support, or innovative product development, we\'re here to help.\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </section>', '2024-09-14 11:15:36', '2024-09-14 11:47:57'),
(2, 'about_us_images/ZZG0COnu4Bly74SaxmO72HVra5wPWoC2LTLqHtQl.png', 'About 2', 'We Clean, You Shine', 'LauntreeTM brand is an online and retail laundry service provider. Be it steam ironing, starching, stain removal, minor alterations, laundry and dry-cleaning.', '<style>\r\n    .about-us-section {\r\n      padding: 50px 0;\r\n    }\r\n    .about-us-image {\r\n      max-width: 100%;\r\n      border-radius: 10px;\r\n    }\r\n    .about-us-title {\r\n      font-size: 2rem;\r\n      font-weight: 600;\r\n    }\r\n    .about-us-description {\r\n      font-size: 1.1rem;\r\n      line-height: 1.8;\r\n    }\r\n  </style> \r\n<section class=\"about-us-section\">\r\n    <div class=\"container\">\r\n      <div class=\"row align-items-center\">\r\n        <!-- Left Side: Title and Description -->\r\n        <div class=\"col-md-6\">\r\n          <h2 class=\"about-us-title\">About Us</h2>\r\n          <p class=\"about-us-description\">\r\n            Our mission is to provide high-quality solutions that cater to the needs of our diverse clientele. We pride ourselves on delivering unparalleled customer service and innovative solutions to help businesses grow.\r\n          </p>\r\n          <p class=\"about-us-description\">\r\n            Our team consists of industry experts with years of experience and a passion for excellence. Whether you\'re looking for business consulting, technical support, or innovative product development, we\'re here to help.\r\n          </p>\r\n        </div>\r\n        <!-- Right Side: Image -->\r\n        <div class=\"col-md-6\">\r\n          <img src=\"https://via.placeholder.com/500\" alt=\"About Us Image\" class=\"about-us-image img-fluid\">\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </section>', '2024-09-14 11:15:56', '2024-09-14 11:48:11'),
(3, 'about_us_images/eOfLXJHurfSvQnIya2PWzsGGi4pGz3JxUuDQKzg9.png', 'About #3', 'We Clean, You Shine', 'LauntreeTM brand is an online and retail laundry service provider. Be it steam ironing, starching, section', 'LauntreeTM brand is an online and retail laundry service provider. Be it steam ironing, starching, section', '2024-09-14 11:48:53', '2024-09-14 11:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `admin_role`, `created_at`, `updated_at`) VALUES
(2, 'jayamwebsolutions@gmail.com', '$2y$12$S5J9yF7YrPVq.IUNYU0rK.3REQkuJxaXoBJ3S79va3/kmQHqna5hm', 'Admin', '2024-08-30 05:52:02', '2024-08-30 05:55:21'),
(14, 'jayamweb.developer2@gmail.com', '$2y$12$l0roVQNYRPSUjaSSDByAT.fWsxC8MBs5johw0pgCbdZvGGoAl3Uxq', 'Employee', '2024-11-05 07:31:49', '2024-11-05 07:31:49'),
(15, 'demo.developer@gmail.com', '$2y$12$Ys8ODTNQDzq541ONK77vdujAt8hZsKvWFD59Z78xhSbSx019elz6S', 'Employee', '2024-11-05 07:32:27', '2024-11-09 05:13:19'),
(17, 'jayamweb.developer@gmail.com', '$2y$12$MOryvPPjXT57rRR96wL.8OTiMxMt7icVgxsHXlT7gkZ.Cl8jZ9ExC', 'Employee', '2024-11-09 05:16:00', '2024-11-09 05:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `attendance_date`, `check_in`, `check_out`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-10-01', '08:01:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(2, 1, '2024-10-02', '09:14:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(3, 1, '2024-10-03', '09:42:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(4, 1, '2024-10-04', '08:03:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(5, 1, '2024-10-05', '09:12:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(6, 1, '2024-10-06', '09:12:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(7, 1, '2024-10-07', '08:53:00', NULL, '2024-11-05 07:12:43', '2024-11-05 07:12:43'),
(8, 1, '2024-10-08', '09:39:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(9, 1, '2024-10-09', '08:24:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(10, 1, '2024-10-10', '09:25:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(11, 1, '2024-10-11', '09:32:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(12, 1, '2024-10-12', '08:59:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(13, 1, '2024-10-13', '09:27:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(14, 1, '2024-10-14', '09:10:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(15, 1, '2024-10-15', '09:54:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(16, 1, '2024-10-16', '09:17:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(17, 1, '2024-10-17', '08:32:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(18, 1, '2024-10-18', '09:58:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(19, 1, '2024-10-19', '09:02:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(20, 1, '2024-10-20', '09:23:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(21, 1, '2024-10-21', '09:37:00', '17:21:06', '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(22, 1, '2024-10-22', '09:42:00', '17:21:30', '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(23, 1, '2024-10-23', '08:04:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(24, 1, '2024-10-24', '08:34:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(25, 1, '2024-10-25', '09:55:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(26, 1, '2024-10-26', '09:52:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(27, 1, '2024-10-27', '08:57:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(28, 1, '2024-10-28', '09:32:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(29, 1, '2024-10-29', '09:34:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(30, 1, '2024-10-30', '08:13:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(31, 1, '2024-10-31', '09:03:00', NULL, '2024-11-05 07:12:44', '2024-11-05 07:12:44'),
(32, 1, '2024-11-05', '15:00:04', '17:04:14', '2024-11-05 09:30:04', '2024-11-05 11:34:14'),
(33, 2, '2024-11-05', '17:04:26', '17:06:37', '2024-11-05 11:34:26', '2024-11-05 11:36:37'),
(34, 1, '2024-11-06', '09:52:09', '17:20:59', '2024-11-06 04:22:09', '2024-11-06 11:50:59'),
(35, 2, '2024-11-06', '12:56:31', NULL, '2024-11-06 07:26:31', '2024-11-06 07:26:31'),
(36, 3, '2024-11-09', '10:46:26', '12:11:56', '2024-11-09 05:16:26', '2024-11-09 06:41:56'),
(37, 1, '2024-11-09', '12:11:59', NULL, '2024-11-09 06:41:59', '2024-11-09 06:41:59'),
(38, 1, '2024-11-12', '15:52:28', NULL, '2024-11-12 10:22:28', '2024-11-12 10:22:28'),
(39, 1, '2024-11-13', '10:03:03', NULL, '2024-11-13 04:33:03', '2024-11-13 04:33:03'),
(40, 1, '2024-11-15', '10:07:55', NULL, '2024-11-15 04:37:55', '2024-11-15 04:37:55'),
(41, 1, '2024-11-20', '09:57:23', NULL, '2024-11-20 04:27:23', '2024-11-20 04:27:23'),
(42, 1, '2024-11-21', '11:21:42', NULL, '2024-11-21 05:51:42', '2024-11-21 05:51:42'),
(43, 1, '2024-12-18', '08:34:24', '08:34:49', '2024-12-18 03:04:24', '2024-12-18 03:04:49'),
(44, 1, '2025-02-01', '11:54:54', '12:07:31', '2025-02-01 06:24:54', '2025-02-01 06:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `segment` text COLLATE utf8mb4_unicode_ci,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `segment`, `company_name`, `url`, `contact_person`, `email`, `phone_number`, `location`, `zipcode`, `country`, `created_at`, `updated_at`) VALUES
(17, NULL, 'Google', NULL, NULL, 'jayamweb.developer2@gmail.com', '9698647822', NULL, NULL, NULL, '2024-09-11 09:04:20', '2024-09-11 09:04:20'),
(18, NULL, 'Google', NULL, NULL, 'jayamweb.developer@gmail.com', '54747547547', NULL, NULL, NULL, '2024-09-12 10:02:41', '2024-09-12 10:02:41'),
(19, NULL, 'Test', NULL, NULL, 'jayamwebsolutions@gmail.com', '9966444221', NULL, NULL, NULL, '2024-09-12 10:33:52', '2024-09-12 10:33:52'),
(20, NULL, 'JayamWebSolutions', NULL, NULL, 'businessnewcomer@web.de', '6543219833', NULL, NULL, NULL, '2024-09-12 10:37:33', '2024-09-12 10:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `clients_sections`
--

CREATE TABLE `clients_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clients_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clients_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_sections`
--

INSERT INTO `clients_sections` (`id`, `clients_name`, `clients_image`, `clients_code`, `created_at`, `updated_at`) VALUES
(1, 'Client Layout 1', 'clients_images/PWxvEc0DRUkGw3szoartdo9oubWDV9c17V4BP1ZU.png', NULL, '2024-09-14 12:21:14', '2024-09-14 12:21:14'),
(2, 'Client Layout 2', 'clients_images/x6cGtzIZcKjBnYK3jJu1EHzCleUKwVjRVjUUpclF.png', NULL, '2024-09-14 12:22:19', '2024-09-14 12:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`id`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(2, NULL, '1729493491_pngwing.com.png', '2024-10-21 06:51:31', '2024-10-21 06:51:31'),
(3, NULL, '1729493518_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', '2024-10-21 06:51:58', '2024-10-21 06:51:58'),
(16, NULL, '1729493985_Screenshot (26).png', '2024-10-21 06:59:45', '2024-10-21 06:59:45'),
(17, NULL, '1729493986_logo.png', '2024-10-21 06:59:46', '2024-10-21 06:59:46'),
(19, NULL, '1729493987_Screenshot (10).png', '2024-10-21 06:59:47', '2024-10-21 06:59:47'),
(23, 5, '1729510656_Minimum_Temperature_Rise (13).png', '2024-10-21 11:37:36', '2024-10-21 11:37:36'),
(24, 5, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', '2024-10-22 07:17:12', '2024-10-22 07:17:12'),
(25, 5, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', '2024-10-22 07:17:33', '2024-10-22 07:17:33'),
(26, 5, '1729581453_pngwing.com.png', '2024-10-22 07:17:33', '2024-10-22 07:17:33'),
(27, 5, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', '2024-10-22 07:17:33', '2024-10-22 07:17:33'),
(28, 5, '1729581453_AdobeStock_557975384_Preview.png', '2024-10-22 07:17:33', '2024-10-22 07:17:33'),
(29, 5, '1729581454_Screenshot_20241003-130059_1728889290.jpg', '2024-10-22 07:17:34', '2024-10-22 07:17:34'),
(30, 5, '1729588578_download (2).jpg', '2024-10-22 09:16:18', '2024-10-22 09:16:18'),
(31, 5, '1729588578_download.jpg', '2024-10-22 09:16:18', '2024-10-22 09:16:18'),
(32, 5, '1729588579_images.jpg', '2024-10-22 09:16:19', '2024-10-22 09:16:19'),
(33, 5, '1729588579_download (1).jpg', '2024-10-22 09:16:19', '2024-10-22 09:16:19'),
(34, 5, '1729588618_about.jpg', '2024-10-22 09:16:58', '2024-10-22 09:16:58'),
(35, 5, '1729588621_star.png', '2024-10-22 09:17:01', '2024-10-22 09:17:01'),
(36, 5, '1729588626_about.jpg', '2024-10-22 09:17:06', '2024-10-22 09:17:06'),
(52, 26, '1729510656_download-removebg-preview (9).png', NULL, NULL),
(53, 26, '1729510656_Minimum_Temperature_Rise (13).png', NULL, NULL),
(54, 26, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(55, 26, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(56, 26, '1729581453_pngwing.com.png', NULL, NULL),
(57, 26, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', NULL, NULL),
(58, 26, '1729581453_AdobeStock_557975384_Preview.png', NULL, NULL),
(59, 26, '1729581454_Screenshot_20241003-130059_1728889290.jpg', NULL, NULL),
(60, 26, '1729588578_download (2).jpg', NULL, NULL),
(61, 26, '1729588578_download.jpg', NULL, NULL),
(62, 26, '1729588579_images.jpg', NULL, NULL),
(63, 26, '1729588579_download (1).jpg', NULL, NULL),
(64, 26, '1729588618_about.jpg', NULL, NULL),
(65, 26, '1729588621_star.png', NULL, NULL),
(66, 26, '1729588626_about.jpg', NULL, NULL),
(67, 27, '1729510656_download-removebg-preview (9).png', NULL, NULL),
(68, 27, '1729510656_Minimum_Temperature_Rise (13).png', NULL, NULL),
(69, 27, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(70, 27, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(71, 27, '1729581453_pngwing.com.png', NULL, NULL),
(72, 27, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', NULL, NULL),
(73, 27, '1729581453_AdobeStock_557975384_Preview.png', NULL, NULL),
(74, 27, '1729581454_Screenshot_20241003-130059_1728889290.jpg', NULL, NULL),
(75, 27, '1729588578_download (2).jpg', NULL, NULL),
(76, 27, '1729588578_download.jpg', NULL, NULL),
(77, 27, '1729588579_images.jpg', NULL, NULL),
(78, 27, '1729588579_download (1).jpg', NULL, NULL),
(79, 27, '1729588618_about.jpg', NULL, NULL),
(80, 27, '1729588621_star.png', NULL, NULL),
(81, 27, '1729588626_about.jpg', NULL, NULL),
(82, 28, '1729510656_download-removebg-preview (9).png', NULL, NULL),
(83, 28, '1729510656_Minimum_Temperature_Rise (13).png', NULL, NULL),
(84, 28, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(85, 28, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(86, 28, '1729581453_pngwing.com.png', NULL, NULL),
(87, 28, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', NULL, NULL),
(88, 28, '1729581453_AdobeStock_557975384_Preview.png', NULL, NULL),
(89, 28, '1729581454_Screenshot_20241003-130059_1728889290.jpg', NULL, NULL),
(90, 28, '1729588578_download (2).jpg', NULL, NULL),
(91, 28, '1729588578_download.jpg', NULL, NULL),
(92, 28, '1729588579_images.jpg', NULL, NULL),
(93, 28, '1729588579_download (1).jpg', NULL, NULL),
(94, 28, '1729588618_about.jpg', NULL, NULL),
(95, 28, '1729588621_star.png', NULL, NULL),
(96, 28, '1729588626_about.jpg', NULL, NULL),
(98, 29, '1729510656_Minimum_Temperature_Rise (13).png', NULL, NULL),
(99, 29, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(100, 29, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(101, 29, '1729581453_pngwing.com.png', NULL, NULL),
(102, 29, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', NULL, NULL),
(103, 29, '1729581453_AdobeStock_557975384_Preview.png', NULL, NULL),
(104, 29, '1729581454_Screenshot_20241003-130059_1728889290.jpg', NULL, NULL),
(105, 29, '1729588578_download (2).jpg', NULL, NULL),
(106, 29, '1729588578_download.jpg', NULL, NULL),
(107, 29, '1729588579_images.jpg', NULL, NULL),
(108, 29, '1729588579_download (1).jpg', NULL, NULL),
(109, 29, '1729588618_about.jpg', NULL, NULL),
(110, 29, '1729588621_star.png', NULL, NULL),
(111, 29, '1729588626_about.jpg', NULL, NULL),
(112, 5, '1729662298_logoOLD.png', '2024-10-23 05:44:58', '2024-10-23 05:44:58'),
(113, 30, '1729510656_Minimum_Temperature_Rise (13).png', NULL, NULL),
(114, 30, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(115, 30, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(116, 30, '1729581453_pngwing.com.png', NULL, NULL),
(117, 30, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', NULL, NULL),
(118, 30, '1729581453_AdobeStock_557975384_Preview.png', NULL, NULL),
(119, 30, '1729581454_Screenshot_20241003-130059_1728889290.jpg', NULL, NULL),
(120, 30, '1729588578_download (2).jpg', NULL, NULL),
(121, 30, '1729588578_download.jpg', NULL, NULL),
(122, 30, '1729588579_images.jpg', NULL, NULL),
(123, 30, '1729588579_download (1).jpg', NULL, NULL),
(124, 30, '1729588618_about.jpg', NULL, NULL),
(125, 30, '1729588621_star.png', NULL, NULL),
(126, 30, '1729588626_about.jpg', NULL, NULL),
(127, 30, '1729662298_logoOLD.png', NULL, NULL),
(128, 32, '1729510656_Minimum_Temperature_Rise (13).png', NULL, NULL),
(129, 32, '1729581432_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(130, 32, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78-removebg-preview.png', NULL, NULL),
(131, 32, '1729581453_pngwing.com.png', NULL, NULL),
(132, 32, '1729581453_elegance-golden-floral-frame-wreaths-vector-illustration_1021635-78.png', NULL, NULL),
(133, 32, '1729581453_AdobeStock_557975384_Preview.png', NULL, NULL),
(134, 32, '1729581454_Screenshot_20241003-130059_1728889290.jpg', NULL, NULL),
(135, 32, '1729588578_download (2).jpg', NULL, NULL),
(136, 32, '1729588578_download.jpg', NULL, NULL),
(137, 32, '1729588579_images.jpg', NULL, NULL),
(138, 32, '1729588579_download (1).jpg', NULL, NULL),
(139, 32, '1729588618_about.jpg', NULL, NULL),
(140, 32, '1729588621_star.png', NULL, NULL),
(141, 32, '1729588626_about.jpg', NULL, NULL),
(142, 32, '1729662298_logoOLD.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_reviews`
--

CREATE TABLE `client_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_count` int(11) NOT NULL DEFAULT '1',
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_reviews`
--

INSERT INTO `client_reviews` (`id`, `parent_id`, `client_name`, `client_role`, `company_name`, `review_content`, `stars_count`, `client_image`, `created_at`, `updated_at`) VALUES
(4, NULL, 'jkl', 'lk', 'lkml\';', 'lk', 4, 'client_images/p11mntGWtLNYT8B8P7tQ8U2tFmaLwWUGkTrJpp4b.png', '2024-10-21 06:00:25', '2024-10-21 06:00:25'),
(5, NULL, NULL, 'http://127.0.0.1:1111/', 'NEwtrends', 'nhsdf mspdgjsdg lsdgjsd0-p ;sdfpiu \r\n;sdfgjusdpg jghswpeto', 1, 'client_images/swyzkfdFRN3A7rNxWkhwEBYAytUPbjZ1F7PoTu0d.png', '2024-10-21 08:48:54', '2024-10-21 08:48:54'),
(11, 5, NULL, 'fdh', 'dfh', 'dfgsdfgsdgsd', 5, 'client_images/RWCDC0QVIAZx6ichNuZMsLFesKFSv8jKHbCHgymi.jpg', '2024-10-22 08:16:45', '2024-10-22 08:16:45'),
(12, 5, NULL, 'http://127.0.0.1:8000/', 'sdgdsgs', 'dsgsgh sdgdswgsgh asdgysdgyd asdggs', 3, 'client_images/piTSXVqnyEHfgt41WE3fBgQVZAox1Yd9xd41TizI.jpg', '2024-10-22 08:17:08', '2024-10-22 08:17:08'),
(13, 5, NULL, 'http://127.0.0.1:8000/', 'Million Minds', 'vfsdf egtwetw4 sdgsdggg wstqwetw dawgs', 5, 'client_images/8HHComSdCN7YFNNsr3QPSPCbElADf1A0PGXmmaoJ.png', '2024-10-22 08:21:01', '2024-10-22 08:21:01'),
(14, 5, NULL, 'http://127.0.0.1:8000/', 'Google', 'xcbh egtwtwe ytwe4y4yb yer4yre yery5r ye4y54urtfik', 4, 'client_images/ZdP8GChCE1sHo4oGdLAbLYzb8qKnXBwfKeZy3OxD.png', '2024-10-22 08:25:16', '2024-10-22 08:25:16'),
(15, 26, NULL, 'fdh', 'dfh', 'dfgsdfgsdgsd', 5, 'client_images/RWCDC0QVIAZx6ichNuZMsLFesKFSv8jKHbCHgymi.jpg', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(16, 26, NULL, 'http://127.0.0.1:8000/', 'sdgdsgs', 'dsgsgh sdgdswgsgh asdgysdgyd asdggs', 3, 'client_images/piTSXVqnyEHfgt41WE3fBgQVZAox1Yd9xd41TizI.jpg', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(17, 26, NULL, 'http://127.0.0.1:8000/', 'Million Minds', 'vfsdf egtwetw4 sdgsdggg wstqwetw dawgs', 5, 'client_images/8HHComSdCN7YFNNsr3QPSPCbElADf1A0PGXmmaoJ.png', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(18, 26, NULL, 'http://127.0.0.1:8000/', 'Google', 'xcbh egtwtwe ytwe4y4yb yer4yre yery5r ye4y54urtfik', 4, 'client_images/ZdP8GChCE1sHo4oGdLAbLYzb8qKnXBwfKeZy3OxD.png', '2024-10-23 05:13:57', '2024-10-23 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `proposal_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `last_name`, `company_name`, `phone_number`, `email`, `location`, `category`, `service`, `status`, `content`, `proposal_status`, `created_at`, `updated_at`) VALUES
(162, NULL, NULL, 'Deepika', '8111000798\n+91 9566087805 \n+91 8807766732', NULL, 'chennai', NULL, NULL, 'Proposal sent', 'seo for evnt mangement, The number it\'s not working \nI have added New Number Cal and update', 'completed', '2024-08-29 11:18:18', '2024-08-31 04:53:21'),
(163, 'test', 'test', 'Sai Sathguru Travels', '93610 31435', 'test@gmail.com', 'manimangalam', 'Test', 'test', 'Proposal sent', 'he asked for local seo, we have asked to share screenshot of search. but he did not, Called and told needs for SEO only for his Bussiness and told want to talk concern person (have to follow,) - Spoke to the person. He want Google My Business page. Said the cost will be 2500 and sent him a whatsapp', NULL, '2024-08-29 11:18:18', '2024-09-05 05:08:07'),
(164, 'senthil nathan', NULL, 'madura engg. enterprises', '8637441486', NULL, 'madurai. he is in chennai now and enquired about website', NULL, NULL, NULL, 'website design. structural steel fabrication.The number is busy', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(165, 'Rekha', NULL, 'CRI SOLUTIONS', '9444653607 / 98845 00303', NULL, 'tambaram', NULL, NULL, NULL, 'website revamp, Told that I updated to Lakshmi mam she is handling our work', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(166, 'Kiruthika Prasanna', NULL, NULL, '(61) 411503996', 'info@activesupportaustralia.com.au', 'australia', NULL, NULL, NULL, 'asked for time to discuss, Number have to check - Its a Abroad Number. Our Number code is 91', 'completed', '2024-08-29 11:18:18', '2024-08-31 04:26:35'),
(167, 'Yanche exim private limited', NULL, NULL, '98847 25725', 'yanche@yanchebiz.com &\nyantaichennai@gmail.com', NULL, NULL, NULL, NULL, 'website development, call cut it', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(168, 'KATHER MOHIDEEN', NULL, 'Star Enterprises', '9941021994\n044- 48552122', 'starenterps@gmail.com', 'kannan avenu, bharathi nagar', NULL, NULL, NULL, 'ecommerce website for tiles, Told that already have Domaizztave booked a domain https://starenter.in/ But did not have any design in it He said september 1st week', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(169, 'Kitchen Creators', NULL, 'Kitchen Creators', '98410 05463', 'kitchencreators@gmail.com', NULL, NULL, NULL, NULL, 'website development, Told that I don\'t have enough money for web site development so will contact you as soon as I have the amount.. 26.8.2024. called again follow up Told I noted your number if I get amount surely will commit for Dynamic website at your company ', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(170, 'Miyuki M', NULL, 'M- Line Travel Agency', '0081 90-8105-0637', NULL, 'Japan', NULL, NULL, NULL, 'website development,The number does not exist ', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(171, NULL, NULL, 'Naadi astrology', '9789036242', NULL, NULL, NULL, NULL, NULL, 'google ads. he launched site 2 - 3 months ago and doing ad. targetting singapore , malaysia,Told that it\'s going on good and asking will you Google ads for us and call you by evening today itself', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(172, 'Jude', NULL, 'existing client', '1 (647) 867-4644', NULL, 'USA/canada', NULL, NULL, 'Closed', 'existing client, The number it\'s not working ', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(173, NULL, NULL, NULL, '90030 25059', 'Venkatramanik@gmail.com', 'chennai/USA', NULL, NULL, NULL, 'Told that already have website and need add promotion for tamil matrimony and need also website with low cost of domain in daynamic asking to share cost of package for both', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(174, 'VELU', NULL, 'Maarra agro products India Pvt Ltd', '8220689282', 'velunr@gmail.com', 'cuddalore', NULL, NULL, NULL, 'website development,Told that call by tomorrow 19 th August ', NULL, '2024-08-29 11:18:18', '2024-08-29 11:18:18'),
(175, 'Vaishnavi', NULL, NULL, '9840468641', 'vaishu24v@gmail.com', 'searched from OMR for Builder website', NULL, NULL, NULL, 'website development,Told that I have requirement and going discussions and when I get requirements will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(176, NULL, NULL, 'student project', '8881650311', NULL, 'potheri', NULL, NULL, NULL, 'website development student project with python based integration possibility', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(177, 'Arunkumar', NULL, 'natural leaf oil mill pvt ltd', '97878 76757', 'arunkumarwin2021@gmail.com', 'ariyalur', NULL, NULL, NULL, 'ecommerce website The number is busy ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(178, 'Natrayan', NULL, 'SNOGGY™', '90809 90960', 'natsnoggy@gmail.com', NULL, NULL, NULL, NULL, 'landing page - dynamic for products, Told that no requirement s anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(179, 'Rajalakshmi', NULL, 'Ratha Worldwide Leathers Pvt Ltd', '9788121615', 'marketing@rathaworldwide.com', NULL, NULL, NULL, NULL, 'website development, Told that no requirements at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(180, 'Vivek', NULL, 'North east construction', '9787937100', 'vivek.necc@gmail.com', NULL, NULL, NULL, NULL, 'website development, Told that no requirements at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(181, 'Rajan Manoj', NULL, 'chennai', '8050025789', 'rajanmano.25@gmail.com', NULL, NULL, NULL, NULL, 'website development, Told that I will check if need anything will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(182, 'Tharun', NULL, 'Mens wear', '7904909881', 'tharunkumar958@gmail.com', 'Villivakkam', NULL, NULL, NULL, 'ecommerce website, Told that calling from Bangalore we have skilled developers so if you need please call us', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(183, 'Praveen', NULL, NULL, '8637463738', 'praveenpravin127@gmail.com', NULL, NULL, NULL, NULL, 'website development, Told that am too running the web design company ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(184, 'kiruthika/general manager', NULL, 'Sun bionaturals india pvt ltd', '7299073171', 'export@sunasia.in', 'guindy', NULL, NULL, NULL, 'website development, The number is switched off ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(185, 'The regal sf', NULL, 'The Regal Security Force', '9659131131', 'theregalsf@gmail.com\nadmin@regalsecurityforce.com', '600063', NULL, NULL, NULL, 'website development, Told that already have website in dynamic and need for changes and remove in optamize something so please should call him tomorrow evening 19 th Aug \n19.08.2024Spoke to him Said will send the designs https://regalsecurityforce.com/ Very basic website Whatsapp sent, Called him and told that I am I out side so call me later .26 .8.2024 Told that still not checking anything you shared so after check will call you tomorrow ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(186, NULL, NULL, NULL, '73052 22832', NULL, NULL, NULL, NULL, NULL, 'web development - tours travels,Told that no requirement s in website and cut it', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(187, 'sridevi', NULL, NULL, '9789924204', NULL, NULL, NULL, NULL, NULL, 'she received more details from us. she will get back later.The Number is busy, and they called and said if need will call you ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(188, NULL, NULL, 'Menhdibysuthabalki', '7305007011', '-', 'velacherry', NULL, NULL, NULL, 'Need logo design, website and seo ,Told that what needs those mentioned everything are doing through other web solutions ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(189, 'Ganesh', NULL, 'Mandala Homes', '61 452 395 361', 'mandalahomesnsw@gmail.com', 'australia', NULL, NULL, 'Closed', 'he need to develop wesite for construction business. dynamic website with options to add progress of project to customer with login.', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(190, 'vanmathi', NULL, 'intelligence quality', '9150007164', 'vanmathi.n@iq6sigma.com', NULL, NULL, NULL, NULL, 'she asked to send wordpress development quotation also. we sent it. call cut it ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(191, 'Dr. P. Nageswara Rao', NULL, 'Society for Electronic Transactions and Security (SETS)', '9094042234 / 044- 66632506', 'nageswar@setsindia.net', 'chennai', NULL, NULL, NULL, 'revamp of https://setsindia.in/,Told that no requirement s anything at present if need will call you ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(192, 'S.S.PERUMAL', NULL, 'CARBOLINK RESEARCH SOLUTIONS PRIVATE LIMITED.', '7358745803', 'saiyasikabiochem61@gmail.com', 'chennai', NULL, NULL, NULL, 'he had 2 websites already. developed by indiamart. he need another website to develop to receive queries without involvement of indiamart. he need order request to send ,process order and mail. after payment shipment details to enter. \n\nend user, companies, agents (login)\n\n3types of prices to enter while adding products, Told that everything completed work by jayam and if need anything additionally will call you ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(193, 'SYED MOHAMED', NULL, 'LESUN DETERGENTS PVT LTD', '9940756786', 'ldpl2023@gmail.com', 'chennai', NULL, NULL, NULL, 'website development. called and informed that quotation mailed. he said received. customer should come. Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(194, 'Gokul', NULL, 'he asked for his friend. in truecalled it showed information technology', '9941477133', 'thiru.vaasu@gmail.com', NULL, NULL, NULL, NULL, 'he asked for dynamic website with 40 products category landing page, home, about, contact. he wanted different page design for each category,Told that no requirement s anything at present,', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(195, 'Logi', NULL, 'sk enterprise', '9342968696', 'ske.avm.101@gmail.com', 'Guduvancheri', NULL, NULL, NULL, 'Hrm software to handle the whole office work ,Told that person I relieved from there', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(196, 'Arun', NULL, 'biotech startup company', '9790429979', NULL, NULL, NULL, NULL, NULL, 'they asked about website design for Biotech company, we asked business name, email id. they did not send in whatsapp, Told that no need anything and when I ask about do you have website and reply will call you after an hour', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(197, 'Anbu', NULL, NULL, '9150185953', NULL, NULL, NULL, NULL, NULL, 'he asked about website design cost for led myvideoscreens display ,. video walls. asked details of projects we have done and pricing & said he will get back,Told that what those enquired everything done with from other web solutions now no requirements anything and may be nee d in future share the company profile details', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(198, NULL, NULL, NULL, '9003399262', NULL, 'krishna nagar', NULL, NULL, NULL, 'he asked about ,Told that no requirement for website only need for software for distribution ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(199, '-', NULL, 'MK Aircon service', '9677000526', NULL, 'New Perungalathur', NULL, NULL, NULL, 'website and marketing.In and around 5 - 6 KM ,Told that have website and got leads through marketing so no requirement s anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(200, NULL, NULL, 'courier booking', '90422 44185', NULL, NULL, NULL, NULL, NULL, 'Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(201, '. Manikandan', NULL, 'Ennum Ezhuthum', '6385915740', 'octopusmass2020@gmail.com', 'thanjavur', NULL, NULL, NULL, 'Told that have website but not professional that so shared to you website that check and update ( Have to call)', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(202, 'anitha', NULL, NULL, '9500137006', NULL, NULL, NULL, NULL, NULL, 'Told that no requirements at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(203, 'bhavani', NULL, 'sicci.in', '9840915096', NULL, 'chennai', NULL, NULL, NULL, 'they want to develop micro website for 3 nos. and connect it in existing website', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(204, NULL, NULL, 'nature villa', '90197 64833', 'care@naturevillakochi.com', 'Aluva , Kerala', NULL, NULL, NULL, 'Told that am free lancer worker so no requirement anything', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(205, 'Murugesan', NULL, 'construction company', '9566403654', 'Murugesan1015@gmail.com', 'madambakkam', NULL, NULL, 'Prospect', 'Told that need website development so request to call back in 2 days, 22.8.2024.again follow up Told that need website and asking price list and call me by Monday 26 th August .26.8.2024 Told that I have committed in project my side so please wait I will call you and you shared that\' will check and update you sure and remind me after a week sure', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(206, 'basker sundara raju', NULL, NULL, '9695926333', NULL, NULL, NULL, NULL, NULL, 'The number is busy', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(207, 'Silambarasan Rajendran', NULL, NULL, '9176122311', 'simbhoo@gmail.com', NULL, NULL, NULL, NULL, 'Calls not picking', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(208, NULL, NULL, NULL, '971544475160', NULL, 'UAE', NULL, NULL, NULL, 'Asking for social media marketing', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45352', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(211, 'Hema', NULL, 'hemaclinic', '9498831604', 'hemamanjini@gmail.com', 'pondicherry', NULL, NULL, NULL, 'appoinments, gallery, employee details, locations and contact details , Told that long back enquired and have Already website and am busy little so tomorrow you can call, Today called and said no requirements anything need at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(212, 'sathishkumar', NULL, 'organic foods', '9092873481', 'sathishkumar723@gmail.com', NULL, NULL, NULL, NULL, 'ecommerce site to sell orhanic foods.Told that already we did ecommerce site and going on good so no requirement s anything', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(213, 'Aravind', NULL, 'science website', '8220705987', '-', 'tambaram', NULL, NULL, NULL, 'Need some text and content, images and video (single).The number it\'s switched off ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(214, 'senthamizhan', NULL, 'jewellery website', '9942438303', 'sennthamizhan0107@gmail.com', 'chengalpattu', NULL, NULL, NULL, 'Need dynamic website to change the jewellery images .Calls not picking', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(215, 'Raj kumar', NULL, 'Engineering based work \ncompany name: FOCUS INTERNATIONAL', '7558190013', 'kraziboy.raj@gmail.com', 'CAMPUS ROAD', NULL, NULL, 'Proposal sent', 'Need logo design ,Told that need website in future so please share the company proposal to my wats up number I will check and call you\nSent in Whatsapp', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(216, 'senthilkumar', NULL, 'https://sreechakradattasreepadapeadam.org', '9884280482/ 73055 48119', NULL, 'guduvancherry', NULL, NULL, NULL, 'web page design for donation, The number is busy ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(217, 'jayapratha', NULL, 'krishna nagar', '8807209202', 'jayapratha', 'krishna nagar', NULL, NULL, NULL, 'patient portal. they have done website with some other company and they did not do it properly. they have charged 35000/- INR for web development & patient portal. but they did not complete as required . they asked patient portal quotation with us, Told that that website still not launching and already paid mentioned that but extra amount asking price to launch I have financial tight now so am holding that process not plsn anything so if I get amount will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(218, 'srinivasan', NULL, NULL, NULL, '\nv.prabhakharan@gmail.com', NULL, NULL, NULL, NULL, 'tours and travel website', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(219, 'shive prem', NULL, 'anugraha builders', '9677262606', 'sivaprem@yahoo.co.in', NULL, NULL, NULL, NULL, 'Calls not picking', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(220, 'Rex', NULL, 'Rentostay', '8866789999', 'rentostay@gmail.com', NULL, NULL, NULL, NULL, 'Told that no requirement s anything at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(221, 'Mohammed Ahmed (Sr. Graphic Designer)', NULL, 'Euro Asia Pvt Ltd', '971 55 261 4664', 'wetravelfordesign@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(222, 'Balramrathod', NULL, 'Balramrathod', '9493093843', NULL, NULL, NULL, NULL, NULL, 'realestate (properties promotion),The number is switched off ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(223, NULL, NULL, 'TriStar Residency', '9941130307', NULL, 'chennai', NULL, NULL, NULL, 'reference by kabellos- they want to create a single page website for home stay,Told that already have created web page so going on good and no requirements anything at present ,may be need in future will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(224, NULL, NULL, 'CRM software', '9363458495', NULL, 'chennai', NULL, NULL, NULL, 'crm software for leads, calls, appointment, follow up, conversions, The number is switched off ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(225, NULL, NULL, NULL, '9840800142', NULL, NULL, NULL, NULL, NULL, 'website development, Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(226, NULL, NULL, 'website revamp', '84288 81472,', NULL, 'sharjah', NULL, NULL, NULL, 'revamp of https://rikada.ae/. ,The number is out of service ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(227, NULL, NULL, 'sai ganesh medical', '99490 05014', NULL, NULL, NULL, NULL, NULL, 'VPS server, Told that requires VPs server as below 500rs for a month and I request to share the website and mail id to us will check and tell you again called him told shared the website and mail id to wats up .', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(228, NULL, NULL, 'kaarunesh construction', '98404 12638', NULL, 'chennai', NULL, NULL, NULL, 'website redesign - www.kaarunesh.com.- Told that am in the meeting and have to check so call me back in lunch ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(229, 'karthick', NULL, 'basell.co.in', '89397 80536', NULL, 'chennai', NULL, NULL, NULL, 'server migration, website development, Told that already finished our enquired queries so if need anything in future will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(230, 'SANKAR', NULL, 'U&V Certification Pvt Ltd', '7010598068', 'mkt@uandvcert.com\nbde@uandvcert.com', 'kerala', NULL, NULL, NULL, 'mail sent for single page and five page website, Told that I already worked tand need for that company but now moved another company so need anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(231, 'vidhya bharath', NULL, 'educational consultancy', '82488 39640', NULL, NULL, NULL, NULL, NULL, 'The number is busy', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(232, NULL, NULL, NULL, '9342939197', 'dba@vaighai.com', 'madurai', NULL, NULL, NULL, 'website revamp of gromedcoir.com ,Told that we did our required with another company now no requirements anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(233, NULL, NULL, NULL, '97908 11085', NULL, NULL, NULL, NULL, NULL, 'AMC for 5 websites \"http://www.trinitysteel.lk/\nhttp://www.astrotechsteels.com/\nhttp://www.genesisdc.com/\nhttp://www.triunetechnofab.com//\nhttp://www.astromach.com/\". The number is busy ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(234, NULL, NULL, 'toys selling', '7418464914', NULL, NULL, NULL, NULL, NULL, 'Calls not picking', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(235, NULL, NULL, NULL, '7358087321', NULL, NULL, NULL, NULL, NULL, 'Insurance agents 35 to 45, Told that am in busy and net work issues here so call you later', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(236, 'Tirupati Tour package', NULL, 'Sriwari tour travels', '9500085434', NULL, 'vyasarpadi', NULL, NULL, NULL, 'Told that need website so call me by next month Sep 25th for reminder', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(237, 'vijay ram', NULL, 'https://aesgs.com/', '99940 75717', NULL, NULL, NULL, NULL, NULL, 'Calls not picking , Called and said our projects are handling Lakshmi mam so willl discuss if need anything', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(238, 'Anaz', NULL, NULL, '8281241334', 'anaz.appu@gmail.com', NULL, NULL, NULL, NULL, 'Calls not picking', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(239, 'Jeeva', NULL, NULL, '9789864175', '​dinkoenterprises@gmail.com', NULL, NULL, NULL, NULL, 'Told that no requirements anything need at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(240, 'Slochana', NULL, 'slochana garments', '7502396771', NULL, NULL, NULL, NULL, NULL, 'Told that we finished website design from some other company so now it\'s going on good and if need anything will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(241, 'Medron healthcare', NULL, 'Medron healthcare', '6381888823', NULL, NULL, NULL, NULL, NULL, 'ecommerce, Told that it\'s wrong number ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(242, NULL, NULL, 'https://bethelpmt.com/', '7538819107', NULL, NULL, NULL, NULL, NULL, 'website revamp of a wordpress website in wordpress,,,Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(243, NULL, NULL, 'sanmax construction', '9444079967', 'sunmaxpltd@gmail.com', NULL, NULL, NULL, 'Closed', 'website design', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(244, NULL, NULL, NULL, '9629168683', NULL, NULL, NULL, NULL, NULL, 'logo design, Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(245, NULL, NULL, 'veera builders', '8608420275', NULL, 'https://veeraabuilders.com/', NULL, NULL, NULL, 'website design, Told that website created with some other one no need anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(246, 'sale queen web solutions', NULL, 'yazh clothing', '9500173876', NULL, NULL, NULL, NULL, NULL, 'want to design website for boutique, pipe mfr company,Told that we are web solutions company so could you share the projects when you get received lot of projects ?', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(247, NULL, NULL, 'rolnadlam', '6381470110', NULL, NULL, NULL, NULL, NULL, 'property listing website ,Told that give leads for you through our add promotion for new start up company so please discuss with your head and tell about this both can we do?', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(248, NULL, NULL, 'Sujith', '9489393441', 'crossurvey@gmail.com', NULL, NULL, NULL, NULL, 'website design, The number is busy ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(249, NULL, NULL, 'Abdul fazith', '98402 75438', 'abdulfazithmohamedgani@gmail.com', NULL, NULL, NULL, NULL, 'ecommerce Told that no requirement s anything need at present bcocz am working ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(250, NULL, NULL, 'ravi', '9442949675 / 89393 31498', NULL, NULL, NULL, NULL, NULL, 'tution centere website , The number is busy ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(251, NULL, NULL, NULL, '96802 77285', 'KUNDANMETAL@gmail.com', NULL, NULL, NULL, NULL, 'website design, Told that need website and he is in holiday for a month and remind and call me next month of September 25th', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(252, NULL, NULL, 'varsha', '9629644117', NULL, NULL, NULL, NULL, NULL, 'ecommerce site, Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(253, NULL, NULL, NULL, '7200913526 / 6474033127', 'sviswanathan062@gmail.com', NULL, NULL, NULL, NULL, 'website design , The number is out of service ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(254, NULL, NULL, 'swastha', '9566127726', NULL, NULL, NULL, NULL, NULL, 'google ad , Told that it\'s going on work with another company so no need anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(255, NULL, NULL, 'Majestic G3 Technology and services', '9445708560', 'raravinddoss@gmail.com', NULL, NULL, NULL, NULL, 'website design You Talked and client said he is in Ranchi he will come by August 23', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(256, 'packersandmoverinchennai.com', NULL, NULL, '99403 30299', 'vijayashwin240@gmail.com', NULL, NULL, NULL, NULL, 'google ad packersandmoverinchennai.com Told that need Google add and SEO and telling we could not do add promotion in Google ads and asking about SEO cost of package .so (have to talk again)', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(257, 'Medical products', NULL, 'SISHYA MEDITECH PRIVATE LIMITED', '87783 08378', NULL, NULL, NULL, NULL, 'Prospect', 'Told that We need a dynamic website design and request that you call us on September 25th to discuss this further. Please also share a proposal relevant to our business.', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(258, NULL, NULL, 'Heaven blanc energy Pvt Ltd', '70108 56361', 'heavenoil96@gmail.com', 'chennai', NULL, NULL, NULL, 'https://wst-me.com/ \n\nWe need this type of website madam', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(259, NULL, NULL, 'exports, imports comapny -Fruits an spice an water', '98925 85864', NULL, NULL, NULL, NULL, NULL, 'Told that call me after half an hour', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(260, NULL, NULL, 'driving school,', '9677534005', NULL, 'neyveli', NULL, NULL, NULL, 'Told that need website and logo design so request to call us September 10 th', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(261, NULL, NULL, 'intrerior design', '80988 51557', 'vmcreationinterior@gmail.com', NULL, NULL, NULL, NULL, 'website design ,Told that We already have a website done by Jayam but need a new dynamic website for our new business. Please call us on September 15th.', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(262, 'Velavan', NULL, 'Sudhanthira fencing', '0065 93981186', NULL, 'singapore / kallakurichi', NULL, NULL, NULL, 'website design', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(263, NULL, NULL, 'auditing company', '9789941959', NULL, NULL, NULL, NULL, NULL, 'web application , Told that no requirement s anything need at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(264, 'Balan', NULL, 'property listing - real estate', '8220581989', NULL, 'kallakurichi', NULL, NULL, NULL, 'property listing web like https://ppcpondy.com/. Told that I will check the quote and request to call us to remind September first week 5 th', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(265, 'Stalin James', NULL, 'taxi', '9360520497', 'stalinjames2019@gmail.com', 'tiruchendur/chennai', NULL, NULL, NULL, 'website, google ads \nhttps://www.gogocabs.com/....... Told that little busy and have requirements so call me by evening ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(266, NULL, NULL, 'pschycologist life coach', '9884418499', NULL, NULL, NULL, NULL, NULL, 'she called to fix issues on GMB. we said we will not work on it.', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(267, 'Antony', NULL, 'Med Corp India', '9437022137', NULL, 'chennai, Thirumudivakkam', NULL, NULL, NULL, 'ref websites\n\nhttps://www.marssterile.in/ \nhttps://www.microflow.in/\n\nHe need to start in august 2024, he said he will call back..... Told that I have seen your ref website you shared and this month 30 th call us to remind ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(268, 'Jeevan Prasad', NULL, 'Launtree', '97908 2823', NULL, 'kandigai,\nnew perungalathur,\nSRM (potheri)', NULL, NULL, 'Closed', 'website, google ad', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(269, NULL, NULL, 'Interior CRM, Quote, Track status', '8072834634', NULL, 'Chrompet', NULL, NULL, NULL, 'Calls not picking ,Told that no requirements anything at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(270, NULL, NULL, 'Nisvo Marine Surveys LLP', '89392 06203', NULL, NULL, NULL, NULL, NULL, 'Told that already have website in static and no requirement s anything at present ,may be need in future will call you same number', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(271, 'Laundry service', NULL, 'Grandstaysalem.in', '9486061234', 'julianaspicesenterprise@gmail.com', NULL, NULL, NULL, NULL, 'website revamp, Calls not picking , Told that need website and Digital marketing and asking how much will be paid for add promotion so (have to follow)', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(272, NULL, NULL, NULL, '0060 17-689 0012', NULL, 'Malaysia', NULL, NULL, NULL, 'ecommerce website for Spice selling in Malaysia', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(273, NULL, NULL, 'Harsha Home Care & Air Care\n\nhttps://accaress.com/', '7708897646', NULL, 'chennai', NULL, NULL, NULL, 'google ad, 15 L - 20 Lakhs, website issues, 1000/day he is waste he is searching for some Technology and he ias trying to learn something from us. Client came to our office', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(274, NULL, NULL, 'https://www.royalnesthomes.in/', '9952006514', NULL, 'chennai, pannal', NULL, NULL, NULL, 'enquired about website revamp of a real estate website,,, Told that little busy so all me after some time', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(275, 'Mahesh', NULL, 'Securoak', '99622 36547', NULL, 'chennai, guindy', NULL, NULL, 'Closed', 'revamp of Securoak.com', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(276, NULL, NULL, NULL, '7550326799', NULL, NULL, NULL, NULL, NULL, 'Told that we are software company so no need anything at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(277, NULL, NULL, 'Bio septic tank manufacturer', '8668120547', NULL, 'vandaloor', NULL, NULL, NULL, 'Told that no requirements anything need at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(278, NULL, NULL, 'maintenance services', '9445051127', NULL, 'tambaram', NULL, NULL, NULL, 'he need website after one month. he got price details over phone,,, The number is busy ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(279, 'David Marshel', NULL, 'TAMILAR KURAL FOUNDATION OF MALAYSIA', '0060 19-412 3397\n0060 12-486 1414', 'davidmarshel@gmail.com', 'Malaysia', NULL, NULL, 'Closed', 'they want to develop a website for foundation with fund raising concept. they will send their requirement to prepare quotation. payment api, whatsapp api integration are requested.', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(280, 'Scrap', NULL, 'RRR Traders', '72003 25347\n9600025347\n7200325347', 'riyasabdulla@gmail.com', 'Padi', NULL, NULL, NULL, 'Told that need SEO for trading in and around Chennai priority first page for their business and need suggestion for them what he needs and form our company told it willl take 25 k for SEO so it\'s High that ,,, (Have to call )', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(281, 'Siva prakasam', NULL, 'Sam Global Chemical India Pvt Ltd', '97908 05584', 'admin@samglobal.co', 'sriperumbudur', NULL, NULL, NULL, 'Calls not picking', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(282, 'kavin karthi', NULL, 'SRI KAYAL WIND TECHNOLOGY', '9356154835', 'kavinrock50@gmail.com', NULL, NULL, NULL, NULL, 'Told that need website so call me tomorrow will discuss about this', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(283, 's k call drivers', NULL, NULL, '9840308381', NULL, NULL, NULL, NULL, NULL, 'google ads. he run google ads for the past 12 yers. has website (but its not working), now he tells that call option is not showing in google ad.,,,,Told that will come to office tomorrow', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(284, 'India mosquito \nnet perfect', NULL, NULL, '9080880052', 'p.sugumar198@gmail.com', 'porur', NULL, NULL, NULL, 'Not much worth. Just send him the designs and quote in mail and whatsapp', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(285, 'Kiran / IT Manager', NULL, 'BLUEIRIS.IN', '73587 15541 / 9629177386', 'edp@bluiris.in', 'chennai', NULL, NULL, NULL, 'Email service', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(286, 'Raj jain', NULL, NULL, '8300000001', NULL, NULL, NULL, NULL, NULL, 'need to develop website like lifetimenumber.com ....Told that no requirements need anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(287, 'Krithika', NULL, NULL, '98401 67644', NULL, NULL, NULL, NULL, NULL, 'our client daughter music sound websiteTold', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(288, 'krithika konda', NULL, NULL, '9840167644', NULL, NULL, NULL, NULL, 'Proposal sent', 'Sent in Whatsapp,Told that I will check and tell tomorrow and I have your will call you', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(289, 'Rajesh', NULL, 'AIIMS', '8669235744', NULL, 'Chennai', NULL, NULL, 'Closed', 'Call by 11.00 \nhttps://aiimsrishikesh.edu.in/a1_1/\nhttps://aiimsguwahati.ac.in/\nhttps://aiimsnagpur.edu.in/\nhttps://www.aiims.edu/\nhttps://jipmer.edu.in/\n', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(290, 'S Gowtham Raj', NULL, 'Lucas Indian Services', '9500021994', 'rajitinfra@gmail.com', 'Lukas', NULL, NULL, 'Proposal sent', 'THey have designed Ecomerse website Industry parts. Some colugue has refered us They are asking for digital marketing. Asked him to send his company details etc. After checking we have to give , Told that am in driving so call you after getting free ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(291, NULL, NULL, 'Selling cleaning products', '8124385611', 'gowthamraj.s@lismail.in', 'Chennai', NULL, NULL, 'Proposal sent', 'ecommerce website for cleaning products...Told that I will check proposal you shared and call me by tomorrow 28 .8.2024', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(292, 'sent', NULL, 'Magnumbond', '9840255785', NULL, 'Coimbatore', NULL, NULL, 'Proposal sent', 'No need to follow up Exesting client He asked for 1 page website that to 5000 he pay now and next amount in cheque ,,,,.Told that need single page website and processing going on for that and call me in neext week sep 7th', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(293, NULL, NULL, 'SS TRAVELS', '9943837848', 'magnuminds@gmail.com', NULL, NULL, NULL, 'Proposal sent', NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(294, NULL, NULL, 'Job consultancy', '8939989983', NULL, 'guduvancherry', NULL, NULL, 'Proposal sent', 'Told that we checked your designs and quote but it\'s not friendly budgect with you so my friend to refer another one web solutions so doing that ...', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(295, NULL, NULL, 'travel agency', '7708839272', NULL, NULL, NULL, NULL, NULL, 'Call and check ,,,. going calls to some other one not related people', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(296, NULL, NULL, 'International \nscientistand Research', NULL, NULL, NULL, NULL, NULL, 'Closed', NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(297, NULL, NULL, 'he asked for ppt for his protfolio', '7299847793', NULL, NULL, NULL, NULL, 'Proposal sent', 'Told that no requirements anything at present', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(298, 'S M PATIL', NULL, 'SRI SAI DEEP ENTERPRISE', '9845561249', NULL, NULL, NULL, NULL, 'Proposal sent', 'he need manpower consultancy website without job post\nAfter followup he asked for 1 page website. Sent quote,,,.Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(299, NULL, NULL, 'shopify website for mens clothing. he did not tell his company and not decided the name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(300, NULL, NULL, 'Super Market', '1 (809) 857-373', NULL, NULL, NULL, NULL, 'Closed', 'he called and told about his requirements. , he want to have website for having food items country based,thats for wholesale, retails', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(301, NULL, NULL, 'Kodak', '91 7397 412 389', NULL, NULL, NULL, NULL, 'Proposal sent', 'Asked him to send his company details to proced further Have quote for Facebook and instagram ads,,,,, The number is busy,,,.Told that resend that package of quote and he needs digital marketing for insurance advisor requruitment through add promotion and needs suggestion which one is suit for me', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(302, 'Akbar', NULL, 'kodak', '7397412389', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(303, NULL, NULL, 'Priyam Matrimony', '9940093123', 'sheriff200385@gmail.com', NULL, NULL, NULL, 'Proposal sent', 'No Website She want to promote in Instagram and facebook. I suggested for one page webdesign. Have to send our website details,,,,Calls not picking ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(304, NULL, NULL, 'AB Technologies', '9381026559', NULL, 'koratur', NULL, NULL, 'Proposal sent', 'digital marketing, single page website Proposal sent for single page website and Instagram FB, Google ads proposels...Told that we checked your proposal and need one week time to discuss so call me and remind me Sep 7th', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(305, 'kavitha/sriv', NULL, 'srivtch.in', '9941226655', NULL, 'chennai, uae', NULL, NULL, 'Proposal sent', 'they have an existing website, want to redesign. testing solutions they provide.....Told that your package cost is high so we do some other company and not required anything at present ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(306, 'Sivakumar', NULL, 'Ananda Myanmar', '7708446896', 'Kavitha.ekambaram@srivtch.in,Sriv@srivtch.in', 'myanmar', NULL, NULL, 'Proposal sent', NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(307, NULL, NULL, 'Construction', '744 920 7797', 'sivakumar@ananda.com.mm', 'chennai', NULL, NULL, 'Proposal sent', 'He asked for executives. He dont know He thought designer will sit in his office and design. Call again and explain about the design process. U spoke to himcheck ur status. He said he will tell to concern person\nCall as new enquiry', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(308, 'Balakumar pandurangan', NULL, 'Glazier Car Garage Studio', '81484 22474', NULL, 'chennai, Tambaram krishnanagar', NULL, NULL, 'Proposal sent', NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(309, NULL, NULL, 'Events - Department', '91 9888714111', NULL, NULL, NULL, NULL, NULL, 'We have mailed our deseigns and 20.08 he sent us content and asked us to send quotation Book website have to send quote today', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(310, 'S.chakraborty \n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Closed', 'Re-design our existing website and make a UI/UX Website , where Google map integration, Payment integration will be exist, and total page will be 5,', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(311, 'sugumar', NULL, 'india mosquito net', '9080880052', NULL, 'porur', NULL, NULL, 'Proposal sent', 'google ad. he asked first details . we said about single page website, google my business account. ad. At last he said, he tried for google ad and he has google my business account. https://www.omshrimlknetlanservice.org I spoke to him He is intrestede. He said he will come to office. 23500 i said He is ok followup him to get order', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(312, NULL, NULL, 'plugcrux', '9789133302', 'support@plugcrux.com', NULL, NULL, NULL, 'Proposal sent', 'digital products ecommerce', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(313, NULL, NULL, 'jeeva', '9840775026', NULL, NULL, NULL, NULL, NULL, 'asked for domain name .lk, reseller is not supporting .lk domain. it took to get the details. as it was late, not contacted him. You tell him .Lk domain cant be booked. We can book other extentions like .com,.org, .net, .in', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(314, NULL, NULL, NULL, '9886078901', NULL, NULL, NULL, NULL, NULL, 'vipglobalrealty.in But no website He asked some doubt in Face Book Ads No need to call back now. Later after 2 months can call may be is in a verge of starting a company He called through Digital Marketing ads', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(315, NULL, NULL, NULL, '8148531845', NULL, NULL, NULL, NULL, NULL, 'She asked no need and in whatsapp she asked its free. Call after 3 months', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(316, 'Prabu Venketasan', NULL, 'Annamalaiyar Agency', '9841420213', 'annamalaiyaragency1@gmail.com', 'Vysarpadi 600039', NULL, NULL, 'Proposal sent', 'Already some one has called. Sent our designs in Whatsapp Call him 22.08.2024 Again They said 25000 i said 14500 108 Dhiviya dharisanam Tours temple Package He wont do website atonce. Follow up to get his order his wife took after he go to office he cant talk', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(317, 'DAVID RAJ', NULL, 'J.K. ENGINEERING ASSOCIATES', '8501846331 - no whatsapp\nMD_9787575452 \n9789721404', 'jkenggchennai@gmail.com\njkenggchennaisales@gmail.com,\njkenggsales.ind@gmail.com', NULL, NULL, NULL, 'Proposal sent', 'Kishkintha Road. So i said i will meet Have to send mail and whatsapp after that did not follow him If he give appoinment i can meet as office is bnear tambaram', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(318, 'ganapathy', NULL, 'Local new channel', '81109 82582', NULL, NULL, NULL, NULL, NULL, 'talked to him. we should send him quotation for posting news. there are no any categories required.', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(319, 'Jack Vinodh', NULL, 'Fionah International', '96776 63937', 'he has a website with in indvidual person and he is not responding properly for support. so he want to move to some other provider and want to make updates in website\'s products page.\n\nshared details of requirements for domain transfer & hosting migration\n\nhe said annual cost 3350 is high and he pay 2500 only presently. we said we are charging this rate only', 'Vandalore 600048', NULL, NULL, NULL, 'https://fionahinternational.com/ Lakshmi madam is following up with details as of now no need to follow up ', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(320, 'Balagiridhararao', NULL, 'Emporis Academy pvt', '9441244907', 'balagiridhar@emporiserp.com', 'puzhudhivakkam', NULL, NULL, NULL, 'they needed web hosting linux with email options. also wanted pricing for dedicated server asked what all the activities you will use in that hosting but no reply', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(321, 'mohankumar', NULL, 'Sunshine jewellery', '9841343573', NULL, NULL, NULL, NULL, NULL, 'ecommerce website for jewellery, He will share reference website to prepare quotation as of now no needd to call after i send quote u can follow up', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(322, NULL, NULL, 'Job Web Site', '8807755784', NULL, 'Thanjavoor', NULL, NULL, NULL, 'Job website', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(323, 'Yazen Ahemed', NULL, 'A1 Belt Company', '9884214809', NULL, 'periyamet. google my business account is there', NULL, NULL, NULL, 'ecommerce website. competitor website https://haldenluxury.com/', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(324, 'sonukumar. hr', NULL, NULL, '8925813200', 'sonukr51423@gmail.com', 'chennai', NULL, NULL, NULL, 'investment company real estate, leasing. reference website - gripinvest.in', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(325, NULL, NULL, 'HF Sarees', '72999 88077', NULL, 'Mylapore', NULL, NULL, 'Proposal sent', 'Sent our ecomerse website design She has domain hosting already\nFollow her and can convert. 100% she will need the website', NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(326, NULL, NULL, NULL, '97507 26332', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(327, NULL, NULL, 'Karnan Crackers', '9585593485', NULL, 'Sivakasi', NULL, NULL, 'Closed', NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19'),
(328, NULL, NULL, 'Yanche exports & imports. but website is not for this company.', '98847 25725', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 11:18:19', '2024-08-29 11:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `type` enum('Intern','Trainee','Junior','Mid-Level','Senior','Lead') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `position_title`, `salary`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Front End Developer', 10000.00, 'Trainee', '2024-11-05 07:08:14', '2024-11-05 07:08:14'),
(2, 'PHP Developer', 12000.00, 'Trainee', '2024-11-05 07:08:26', '2024-11-05 07:08:26'),
(3, 'PHP Developer', 15000.00, 'Junior', '2024-11-05 07:08:42', '2024-11-05 07:08:42'),
(4, 'Front End Developer', 13000.00, 'Junior', '2024-11-05 07:08:54', '2024-11-05 07:08:54'),
(5, 'SEO', 12000.00, 'Junior', '2024-11-05 07:09:04', '2024-11-05 07:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `joining_date` date NOT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `personal_email`, `office_email`, `gender`, `dob`, `joining_date`, `designation_id`, `login_id`, `address`, `bank_name`, `account_no`, `ifsc`, `photo`, `id_proof`, `created_at`, `updated_at`) VALUES
(1, 'Prakash', '9698647822', 'prakaashbsc376@gmail.com', 'jayamweb.developer2@gmail.com', 'male', '2000-11-29', '2023-12-25', 2, 14, 'Thambaram, Chennai', 'Union Bank', '63004390237250', 'UNB6385902', 'photos/HTLT5qgxRbtmHrPgHEehQBB8WzrP1P6vseGrWKYG.png', 'id_proofs/Hgtl6te1xdmt0ocPeQvglNnShhzkxvzlaSqNb4Si.pdf', '2024-11-05 07:12:16', '2024-11-06 05:46:27'),
(2, 'John Doe', '123455678904', 'john.doe6@example.com', 'john.office66@example.com', 'male', '1990-01-01', '2022-01-01', 1, 15, '123 Main St, Anytown, USA', 'Bank of America', '12345676890', 'BOFAUS3N', 'photos/PezTrEsO7dYMd613S95gFC45ravjhagP8nSvyieb.png', 'BOFAUS3N', '2024-11-05 07:13:50', '2024-11-08 08:26:07'),
(3, 'Enki', '9876546320', 'enki@123gmail.com', 'jayamweb.developer@gmail.com', 'male', '1999-05-19', '2023-10-12', 3, 17, 'Thambaram, chennai', 'State Bank Of India', '630043902372502', 'SBI2355G235', 'photos/uWY8SeNUN9PleoQluQAPwkPBgpyrFIfBwHfQjUH0.png', 'id_proofs/fSFATiGQKGLoT9191mjjvWz5qVMuptVwib8J8aTZ.pdf', '2024-11-09 04:56:14', '2024-11-09 05:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_project`
--

CREATE TABLE `employee_project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_project`
--

INSERT INTO `employee_project` (`id`, `project_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(7, 2, 1, NULL, NULL),
(8, 2, 2, NULL, NULL),
(27, 3, 1, NULL, NULL),
(28, 1, 3, NULL, NULL),
(29, 4, 1, NULL, NULL),
(31, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE `follow_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('client','organization') COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_ups`
--

INSERT INTO `follow_ups` (`id`, `client_id`, `content`, `type`, `scheduled_date`, `created_at`, `updated_at`) VALUES
(1, 6, 'A lot has happened on Facebook since you last logged in. Here are some notifications you\'ve missed from your friends.', 'client', '2024-08-28', '2024-08-27 07:29:58', '2024-08-27 07:29:58'),
(2, 6, 'If you need to perform actions both when the DOM is ready and when the whole page is loaded, you can combine both:', 'client', NULL, '2024-08-27 08:19:12', '2024-08-27 08:19:12'),
(7, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'organization', '2024-11-27', '2024-08-27 08:42:50', '2024-08-27 08:42:50'),
(11, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'organization', NULL, '2024-08-27 09:35:38', '2024-08-27 09:35:38'),
(12, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'client', NULL, '2024-08-27 09:35:49', '2024-08-27 09:35:49'),
(13, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'client', NULL, '2024-08-27 09:36:02', '2024-08-27 09:36:02'),
(14, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'client', NULL, '2024-08-27 09:36:09', '2024-08-27 09:36:09'),
(15, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'client', NULL, '2024-08-27 09:36:18', '2024-08-27 09:36:18'),
(16, 6, 'By ensuring the database schema allows scheduled_date to be null and updating your controller to handle null values properly, you should avoid issues related to unsupported operand types and ensure smooth functionality of your follow-up logic.', 'organization', NULL, '2024-08-27 09:38:22', '2024-08-27 09:38:22'),
(18, 6, 'testttttttttttttttttttttttttttt  yhsssssssssssssssssssssssssssssssssssssssssssssssssssss', 'client', '2024-09-26', '2024-09-04 09:25:27', '2024-09-04 09:25:27'),
(19, 162, 'ddddddddddddddd', 'organization', '2024-09-21', '2024-09-05 04:52:43', '2024-09-05 04:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `footer_name`, `footer_image`, `footer_code`, `created_at`, `updated_at`) VALUES
(4, 'Type2', 'footer_images/edJueZnNNI3vLFuPnXpyNEaYherLEnoTb2GT1OEv.png', '<style>\r\n.footer {\r\n  background-color: #333;\r\n  color: white;\r\n  padding: 40px 20px;\r\n}\r\n\r\n.footer-container {\r\n  display: flex;\r\n  justify-content: space-between;\r\n  flex-wrap: wrap;\r\n  max-width: 1200px;\r\n  margin: auto;\r\n}\r\n\r\n.footer-section {\r\n  flex: 1;\r\n  min-width: 250px;\r\n  margin: 20px;\r\n}\r\n\r\n.footer-logo {\r\n  width: 150px;\r\n  margin-bottom: 10px;\r\n}\r\n\r\n.footer-section h3 {\r\n  margin-bottom: 15px;\r\n}\r\n\r\n.footer-section p, .footer-section ul, .footer-section li {\r\n  margin-bottom: 10px;\r\n}\r\n\r\n.quick-links ul {\r\n  list-style: none;\r\n}\r\n\r\n.quick-links ul li {\r\n  margin-bottom: 5px;\r\n}\r\n\r\n/* Social Media Icons */\r\n.social-icons {\r\n  margin-top: 10px;\r\n}\r\n\r\n.social-icons a {\r\n  margin-right: 15px;\r\n  color: white;\r\n  font-size: 20px;\r\n}\r\n\r\n.social-icons a:hover {\r\n  color: #ccc;\r\n}\r\n\r\n/* Copyright Section */\r\n.footer-bottom {\r\n  text-align: center;\r\n  padding: 20px 0;\r\n  background-color: #222;\r\n}\r\n\r\n/* Responsive Design */\r\n@media (max-width: 768px) {\r\n  .footer-container {\r\n    flex-direction: column;\r\n    align-items: center;\r\n  }\r\n\r\n  .footer-section {\r\n    margin: 20px 0;\r\n  }\r\n\r\n  .social-icons {\r\n    justify-content: center;\r\n  }\r\n}\r\n</style>\r\n <footer class=\"footer\">\r\n    <div class=\"footer-container\">\r\n      <!-- Company Info -->\r\n      <div class=\"footer-section company-info\">\r\n        <img src=\"logo.png\" alt=\"Company Logo\" class=\"footer-logo\">\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fermentum turpis ac magna finibus.</p>\r\n      </div>\r\n\r\n      <!-- Quick Links -->\r\n      <div class=\"footer-section quick-links\">\r\n        <h3>Quick Links</h3>\r\n        <ul>\r\n          <li><a href=\"#home\">Home</a></li>\r\n          <li><a href=\"#about\">About</a></li>\r\n          <li><a href=\"#services\">Services</a></li>\r\n          <li><a href=\"#contact\">Contact</a></li>\r\n        </ul>\r\n      </div>\r\n\r\n      <!-- Contact Info -->\r\n      <div class=\"footer-section contact-info\">\r\n        <h3>Contact Us</h3>\r\n        <p><i class=\"fas fa-map-marker-alt\"></i> 123 Street, City, Country</p>\r\n        <p><i class=\"fas fa-phone\"></i> +1 234 567 890</p>\r\n        <p><i class=\"fas fa-envelope\"></i> info@example.com</p>\r\n        <div class=\"social-icons\">\r\n          <a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>\r\n          <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>\r\n          <a href=\"#\"><i class=\"fab fa-instagram\"></i></a>\r\n        </div>\r\n      </div>\r\n    </div>\r\n\r\n    <!-- Copyright -->\r\n    <div class=\"footer-bottom\">\r\n      <p>&copy; 2024 Your Company. All Rights Reserved.</p>\r\n    </div>\r\n  </footer>', '2024-09-13 12:34:29', '2024-09-14 05:12:14'),
(5, 'Type1', 'footer_images/G3vM3psB4HiFkxJ2ybM8HCDZoi1NporWbazQeLCX.png', '<style>\r\n/* Custom Styles for Footer */\r\n.footer {\r\n  background-color: #343a40; /* Dark background */\r\n  color: #f8f9fa; /* Light text */\r\n}\r\n\r\n.footer a {\r\n  color: #f8f9fa; /* Light text color for links */\r\n}\r\n\r\n.footer a:hover {\r\n  color: #ced4da; /* Light grey on hover */\r\n}\r\n\r\n.footer .bi {\r\n  font-size: 1.25rem; /* Size for Bootstrap icons */\r\n}\r\n\r\n</style>\r\n<footer class=\"footer bg-dark text-light py-5\">\r\n    <div class=\"container\">\r\n      <div class=\"row\">\r\n        <!-- Company Info -->\r\n        <div class=\"col-md-4 mb-4 mb-md-0\">\r\n          <img src=\"logo.png\" alt=\"Company Logo\" class=\"img-fluid mb-3\" style=\"max-width: 150px;\">\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fermentum turpis ac magna finibus.</p>\r\n        </div>\r\n\r\n        <!-- Quick Links -->\r\n        <div class=\"col-md-4 mb-4 mb-md-0\">\r\n          <h5 class=\"text-uppercase mb-3\">Quick Links</h5>\r\n          <ul class=\"list-unstyled\">\r\n            <li><a href=\"#home\" class=\"text-light text-decoration-none\">Home</a></li>\r\n            <li><a href=\"#about\" class=\"text-light text-decoration-none\">About</a></li>\r\n            <li><a href=\"#services\" class=\"text-light text-decoration-none\">Services</a></li>\r\n            <li><a href=\"#contact\" class=\"text-light text-decoration-none\">Contact</a></li>\r\n          </ul>\r\n        </div>\r\n\r\n        <!-- Contact Info -->\r\n        <div class=\"col-md-4 mb-4 mb-md-0\">\r\n          <h5 class=\"text-uppercase mb-3\">Contact Us</h5>\r\n          <p><i class=\"bi bi-geo-alt\"></i> 123 Street, City, Country</p>\r\n          <p><i class=\"bi bi-phone\"></i> +1 234 567 890</p>\r\n          <p><i class=\"bi bi-envelope\"></i> info@example.com</p>\r\n          <div class=\"d-flex gap-3\">\r\n            <a href=\"#\" class=\"text-light\"><i class=\"bi bi-facebook\"></i></a>\r\n            <a href=\"#\" class=\"text-light\"><i class=\"bi bi-twitter\"></i></a>\r\n            <a href=\"#\" class=\"text-light\"><i class=\"bi bi-instagram\"></i></a>\r\n          </div>\r\n        </div>\r\n      </div>\r\n\r\n      <!-- Newsletter Signup -->\r\n      <div class=\"row mt-4\">\r\n        <div class=\"col-12\">\r\n          <div class=\"d-flex flex-column flex-md-row justify-content-md-between align-items-center\">\r\n            <h5 class=\"text-uppercase mb-3 mb-md-0\">Subscribe to our Newsletter</h5>\r\n            <form class=\"d-flex mt-2 mt-md-0\">\r\n              <input class=\"form-control me-2\" type=\"email\" placeholder=\"Enter your email\" aria-label=\"Email\">\r\n              <button class=\"btn btn-primary\" type=\"submit\">Subscribe</button>\r\n            </form>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n\r\n    <!-- Copyright -->\r\n    <div class=\"text-center mt-4 pt-4 border-top border-light\">\r\n      <p class=\"mb-0\">&copy; 2024 Your Company. All Rights Reserved.</p>\r\n    </div>\r\n  </footer>', '2024-09-14 05:14:14', '2024-09-14 05:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `get_touch_us`
--

CREATE TABLE `get_touch_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brands` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projects` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviews` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `get_touch_us`
--

INSERT INTO `get_touch_us` (`id`, `parent_id`, `title1`, `title2`, `title3`, `brands`, `content`, `sort_order`, `years`, `clients`, `projects`, `reviews`, `created_at`, `updated_at`) VALUES
(2, NULL, '17', '{Years} of Expertise In Delivering Web Development & Digital Marketing Services', 'Get In Touch With Usdfgdfgsdfs', '[\"SEO\",\"Branding\",\"Lead Generation\",\"Social Media Management\",\"Logo Design\"]', 'We are a team of top talent delivering enterprise solutions globally. \nwe evolve with the advancement in technology because \nwe believe in making our technology as your innovation.', 'cvbsdfsdfsghjgjgjgjgj', '17 + Years', '1,200 + Clients', '1,850 + Projects', '500 + Reviews', '2024-10-17 06:46:33', '2024-10-21 07:02:24'),
(8, 5, '17', 'In Delivering Web Development & Digital Marketing Services', '{Years} of Expertise', NULL, NULL, NULL, '17, Years', '1200, Happy Clients', '1850, Projects', '500, Reviews', '2024-10-21 12:00:58', '2024-10-22 11:20:34'),
(10, 26, '17', 'In Delivering Web Development & Digital Marketing Services', '{Years} of Expertise', NULL, NULL, NULL, '17, Years', '1200, Happy Clients', '1850, Projects', '500, Reviews', '2024-10-23 05:13:57', '2024-10-23 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headers`
--

INSERT INTO `headers` (`id`, `header_name`, `header_image`, `header_code`, `created_at`, `updated_at`) VALUES
(3, 'Type1', 'header_images/8SFkF32IZbYiJspfXhIZdMW5pcWMvT4ydzUHlW6v.png', '<style>\r\nheader {\r\n  display: flex;\r\n  justify-content: space-between;\r\n  align-items: center;\r\n  padding: 20px;\r\n  background-color: #333;\r\n}\r\n\r\n.logo img {\r\n  width: 150px;\r\n}\r\n\r\n.nav-menu ul {\r\n  list-style: none;\r\n  display: flex;\r\n}\r\n\r\n.nav-menu ul li {\r\n  margin-left: 20px;\r\n}\r\n\r\n.nav-menu ul li a {\r\n  color: white;\r\n  text-decoration: none;\r\n  font-size: 18px;\r\n}\r\n\r\n.nav-menu ul li a:hover {\r\n  color: #ccc;\r\n}\r\n\r\n/* Responsive styles */\r\n@media (max-width: 768px) {\r\n  header {\r\n    flex-direction: column;\r\n    align-items: flex-start;\r\n  }\r\n\r\n  .nav-menu ul {\r\n    flex-direction: column;\r\n    margin-top: 20px;\r\n  }\r\n\r\n  .nav-menu ul li {\r\n    margin-left: 0;\r\n    margin-bottom: 10px;\r\n  }\r\n}\r\n</style>\r\n<header class=\"header\">\r\n    <div class=\"logo\">\r\n      <img src=\"logo.png\" alt=\"Logo\">\r\n    </div>\r\n    <nav class=\"nav-menu\">\r\n      <ul>\r\n        <li><a href=\"#home\">Home</a></li>\r\n        <li><a href=\"#about\">About</a></li>\r\n        <li><a href=\"#services\">Services</a></li>\r\n        <li><a href=\"#contact\">Contact</a></li>\r\n      </ul>\r\n    </nav>\r\n  </header>', '2024-09-13 12:30:11', '2024-09-14 04:49:17'),
(4, 'Type2', 'header_images/A2lDmEFTOdvAMS1WiAZ95sAU1Buh6bs93PvvNq6S.png', '<style>\r\nheader {\r\n  display: flex;\r\n  justify-content: space-between;\r\n  align-items: center;\r\n  padding: 20px;\r\n  background-color: #333;\r\n  position: relative;\r\n}\r\n\r\n.logo img {\r\n  width: 150px;\r\n}\r\n\r\n/* Navigation menu - hidden on small screens */\r\n.nav-menu ul {\r\n  list-style: none;\r\n  display: flex;\r\n}\r\n\r\n.nav-menu ul li {\r\n  margin-left: 20px;\r\n}\r\n\r\n.nav-menu ul li a {\r\n  color: white;\r\n  text-decoration: none;\r\n  font-size: 18px;\r\n}\r\n\r\n.nav-menu ul li a:hover {\r\n  color: #ccc;\r\n}\r\n\r\n/* Hamburger menu - hidden on larger screens */\r\n.hamburger {\r\n  display: none;\r\n  flex-direction: column;\r\n  cursor: pointer;\r\n}\r\n\r\n.hamburger span {\r\n  height: 3px;\r\n  width: 25px;\r\n  background-color: white;\r\n  margin-bottom: 5px;\r\n  border-radius: 5px;\r\n}\r\n\r\n/* Mobile menu - hidden by default */\r\n.mobile-menu {\r\n  display: none;\r\n  position: absolute;\r\n  top: 60px;\r\n  right: 20px;\r\n  background-color: #333;\r\n  padding: 20px;\r\n  border-radius: 5px;\r\n}\r\n\r\n.mobile-menu ul {\r\n  list-style: none;\r\n}\r\n\r\n.mobile-menu ul li {\r\n  margin-bottom: 10px;\r\n}\r\n\r\n.mobile-menu ul li a {\r\n  color: white;\r\n  text-decoration: none;\r\n  font-size: 18px;\r\n}\r\n\r\n.mobile-menu ul li a:hover {\r\n  color: #ccc;\r\n}\r\n\r\n/* Responsive Styles */\r\n\r\n/* Medium to large screens */\r\n@media (min-width: 768px) {\r\n  .nav-menu {\r\n    display: block;\r\n  }\r\n\r\n  .hamburger, .mobile-menu {\r\n    display: none;\r\n  }\r\n}\r\n\r\n/* Small screens */\r\n@media (max-width: 767px) {\r\n  .nav-menu {\r\n    display: none;\r\n  }\r\n\r\n  .hamburger {\r\n    display: flex;\r\n  }\r\n\r\n  .mobile-menu.active {\r\n    display: block;\r\n  }\r\n}\r\n</style>\r\n<header class=\"header\">\r\n    <div class=\"logo\">\r\n      <img src=\"logo.png\" alt=\"Logo\">\r\n    </div>\r\n    <nav class=\"nav-menu\">\r\n      <ul>\r\n        <li><a href=\"#home\">Home</a></li>\r\n        <li><a href=\"#about\">About</a></li>\r\n        <li><a href=\"#services\">Services</a></li>\r\n        <li><a href=\"#contact\">Contact</a></li>\r\n      </ul>\r\n    </nav>\r\n    <div class=\"hamburger\">\r\n      <span></span>\r\n      <span></span>\r\n      <span></span>\r\n    </div>\r\n  </header>\r\n\r\n  <!-- Mobile Menu -->\r\n  <div class=\"mobile-menu\">\r\n    <ul>\r\n      <li><a href=\"#home\">Home</a></li>\r\n      <li><a href=\"#about\">About</a></li>\r\n      <li><a href=\"#services\">Services</a></li>\r\n      <li><a href=\"#contact\">Contact</a></li>\r\n    </ul>\r\n  </div>\r\n\r\n<script>\r\nconst hamburger = document.querySelector(\'.hamburger\');\r\nconst mobileMenu = document.querySelector(\'.mobile-menu\');\r\n\r\nhamburger.addEventListener(\'click\', () => {\r\n  mobileMenu.classList.toggle(\'active\');\r\n});\r\n</script>', '2024-09-13 12:30:25', '2024-09-14 04:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `header_footers`
--

CREATE TABLE `header_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_btn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workenquiryname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servicename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire_developers` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_app_dev` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_app_dev` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppc` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industriesname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `healthcare` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retail` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logistics` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oil_gas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_info` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `music_video` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_footers`
--

INSERT INTO `header_footers` (`id`, `header_logo`, `header_link`, `request_btn`, `request_btn_link`, `contact_no`, `whatsapp_no`, `email1`, `email2`, `skype_name`, `skype_link`, `workenquiryname`, `companyname`, `about_us`, `portfolio`, `blog`, `contact_us`, `faqs`, `privacy_policy`, `servicename`, `hire_developers`, `web_app_dev`, `mobile_app_dev`, `seo`, `ppc`, `social_media`, `industriesname`, `healthcare`, `education`, `retail`, `logistics`, `oil_gas`, `copyright`, `copyright_info`, `music_video`, `created_at`, `updated_at`) VALUES
(1, 'logos/5krf6Wk0iacJy2wjQf8W02YvbthreOWrLophcrJ7.png', '#', 'Request Quote', '#', '+91 9698647822', '+91 123 4567 890', 'jayamwebsolutions@gmail.com', 'jayamweb.developer2@gmail.com', 'reevan-skype', 'vvxx', 'For Work inquiry', 'Company', 'About us', 'Portfolios', 'Blog', 'Contact Us', 'Faqs', 'Privacy & Policy', 'Services', NULL, 'Web App Development', 'Mobile App Development', 'Search Engine Optimization', 'Pay-Per-Click', 'Social Media Marketing', 'Industries', 'Healthcare', 'Education', 'Retail', 'Logistics', 'Oil & Gas', 'We are tracking any intention of piracy.', 'Copyright © 2023 Jayam Web Solutions. All rights reserved. Template By Rajesh Doot', 'Music & Video', '2024-10-14 04:54:21', '2024-10-19 09:10:31'),
(2, 'dfsg', 'dfg', NULL, NULL, 'phone:098765345235', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Contact Us444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'www.veido.commmm', NULL, '2024-10-14 10:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `home_sections`
--

CREATE TABLE `home_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sections`
--

INSERT INTO `home_sections` (`id`, `page_id`, `title`, `title2`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(3, 0, 'Section3', 'See what we can do for you', 0, '2', '2024-10-14 11:53:32', '2024-10-14 13:17:40'),
(4, 0, 'Section4', 'Some of our Finest Work', 0, '3', NULL, '2024-10-19 11:53:10'),
(59, 5, 'Logo Section', NULL, 0, '3', '2024-10-22 04:53:29', '2024-10-23 08:41:58'),
(60, 5, 'Year Of Experience', NULL, 0, '4', '2024-10-22 04:53:29', '2024-10-23 04:25:17'),
(61, 5, 'Recent Projects', NULL, 0, '5', '2024-10-22 04:53:29', '2024-10-23 04:25:17'),
(62, 5, 'Google Reviews', NULL, 0, '6', '2024-10-22 04:53:29', '2024-10-22 09:45:28'),
(63, 5, 'SEO Package', NULL, 0, '7', '2024-10-22 04:53:29', '2024-10-22 09:45:29'),
(64, 5, 'Price & Package', NULL, 0, '8', '2024-10-22 04:53:29', '2024-10-22 09:45:30'),
(65, 5, 'Payment Terms', NULL, 0, '9', '2024-10-22 04:53:29', '2024-10-22 09:45:31'),
(66, 16, 'Logo Section', NULL, 0, '10', '2024-10-22 04:54:26', '2024-10-22 05:09:48'),
(67, 16, 'Year Of Experience', NULL, 0, '11', '2024-10-22 04:54:26', '2024-10-22 04:54:26'),
(68, 16, 'Recent Projects', NULL, 0, '12', '2024-10-22 04:54:26', '2024-10-22 04:54:26'),
(69, 16, 'Google Reviews', NULL, 0, '13', '2024-10-22 04:54:26', '2024-10-22 04:54:26'),
(70, 16, 'SEO Package', NULL, 0, '14', '2024-10-22 04:54:26', '2024-10-22 04:54:26'),
(71, 16, 'Price & Package', NULL, 0, '15', '2024-10-22 04:54:26', '2024-10-22 04:54:26'),
(72, 16, 'Payment Terms', NULL, 0, '16', '2024-10-22 04:54:26', '2024-10-22 04:54:26'),
(73, 18, 'Logo Section', NULL, 0, '17', '2024-10-23 04:32:39', '2024-10-23 04:32:39'),
(80, 26, 'Logo Section', NULL, 0, '18', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(81, 26, 'Year Of Experience', NULL, 0, '19', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(82, 26, 'Recent Projects', NULL, 0, '20', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(83, 26, 'Google Reviews', NULL, 0, '21', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(84, 26, 'SEO Package', NULL, 0, '22', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(85, 26, 'Price & Package', NULL, 0, '23', '2024-10-23 05:13:57', '2024-10-23 05:13:57'),
(86, 26, 'Payment Terms', NULL, 0, '24', '2024-10-23 05:13:57', '2024-10-23 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `leave_date`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-04', 'aa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `parent_id`, `title1`, `title2`, `form_title`, `created_at`, `updated_at`) VALUES
(1, NULL, 'saff', 'asfaf', 'saf', NULL, '2024-10-21 10:54:46'),
(2, 5, 'Trusted by Over {1200+}  Customers', 'Join a growing community of satisfied users today!', 'We\'d {Love}  to Hear from You', '2024-10-21 11:32:08', '2024-10-22 10:13:42'),
(4, 26, 'Trusted by Over {1200+}  Customers', 'Join a growing community of satisfied users today!', 'We\'d {Love}  to Hear from You', '2024-10-23 05:13:57', '2024-10-23 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menuType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuID` int(11) DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortOrder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menuType`, `menuID`, `menu`, `menuSlug`, `sortOrder`, `created_at`, `updated_at`) VALUES
(7, 'MENU', NULL, 'Personal Services', 'personal-services', '1', '2024-08-21 05:27:17', '2024-08-21 05:27:17'),
(8, 'MENU', NULL, 'Agriculture and Food', 'agriculture-and-food', '2', '2024-08-21 05:27:29', '2024-08-21 05:27:29'),
(9, 'MENU', NULL, 'Transportation and Logistics', 'transportation-and-logistics', '3', '2024-08-21 05:27:36', '2024-08-21 05:27:36'),
(10, 'MENU', NULL, 'Non-Profit and Government', 'non-profit-and-government', '4', '2024-08-21 05:27:43', '2024-08-21 05:27:43'),
(11, 'MENU', NULL, 'Entertainment and Media', 'entertainment-and-media', '13', '2024-08-21 05:27:54', '2024-08-21 05:33:50'),
(12, 'MENU', NULL, 'Technology and IT', 'technology-and-it', '6', '2024-08-21 05:28:02', '2024-08-21 05:28:02'),
(13, 'MENU', NULL, 'Finance and Banking', 'finance-and-banking', '7', '2024-08-21 05:28:08', '2024-08-21 05:28:08'),
(14, 'MENU', NULL, 'Hospitality and Tourism', 'hospitality-and-tourism', '8', '2024-08-21 05:28:17', '2024-08-21 05:28:17'),
(15, 'MENU', NULL, 'Retail and Consumer', 'retail-and-consumer', '9', '2024-08-21 05:28:27', '2024-08-21 05:28:27'),
(16, 'MENU', NULL, 'Manufacturing and Industry', 'manufacturing-and-industry', '10', '2024-08-21 05:28:35', '2024-08-21 05:28:35'),
(17, 'MENU', NULL, 'Real Estate and Construction', 'real-estate-and-construction', '11', '2024-08-21 05:28:42', '2024-08-28 11:11:47'),
(18, 'MENU', NULL, 'Healthcare', 'healthcare', '12', '2024-08-21 05:28:48', '2024-08-21 05:28:48'),
(19, 'MENU', NULL, 'Education', 'education', '5', '2024-08-21 05:28:56', '2024-08-21 05:34:09'),
(20, 'MENU', NULL, 'Personal Services', 'personal-services', '1', '2024-08-20 23:57:17', '2024-08-20 23:57:17'),
(21, 'MENU', NULL, 'Agriculture and Food', 'agriculture-and-food', '2', '2024-08-20 23:57:29', '2024-08-20 23:57:29'),
(22, 'MENU', NULL, 'Transportation and Logistics', 'transportation-and-logistics', '3', '2024-08-20 23:57:36', '2024-08-20 23:57:36'),
(23, 'MENU', NULL, 'Non-Profit and Government', 'non-profit-and-government', '4', '2024-08-20 23:57:43', '2024-08-20 23:57:43'),
(24, 'MENU', NULL, 'Entertainment and Media', 'entertainment-and-media', '13', '2024-08-20 23:57:54', '2024-08-21 00:03:50'),
(25, 'MENU', NULL, 'Technology and IT', 'technology-and-it', '6', '2024-08-20 23:58:02', '2024-08-20 23:58:02'),
(26, 'MENU', NULL, 'Finance and Banking', 'finance-and-banking', '7', '2024-08-20 23:58:08', '2024-08-20 23:58:08'),
(27, 'MENU', NULL, 'Hospitality and Tourism', 'hospitality-and-tourism', '8', '2024-08-20 23:58:17', '2024-08-20 23:58:17'),
(28, 'MENU', NULL, 'Retail and Consumer', 'retail-and-consumer', '9', '2024-08-20 23:58:27', '2024-08-20 23:58:27'),
(29, 'MENU', NULL, 'Manufacturing and Industry', 'manufacturing-and-industry', '10', '2024-08-20 23:58:35', '2024-08-20 23:58:35'),
(31, 'MENU', NULL, 'Healthcare', 'healthcare', '12', '2024-08-20 23:58:48', '2024-08-20 23:58:48'),
(32, 'MENU', NULL, 'Education', 'education', '5', '2024-08-20 23:58:56', '2024-08-21 00:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `menu_and_links`
--

CREATE TABLE `menu_and_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_and_links`
--

INSERT INTO `menu_and_links` (`id`, `menu`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Homes', '#', '2024-10-14 06:28:27', '2024-10-23 06:10:24'),
(2, 'About', '#', '2024-10-14 06:28:30', '2024-10-14 06:28:09'),
(3, 'Service', '#', NULL, '2024-10-14 06:28:11'),
(4, 'Portfolio', '#', NULL, '2024-10-14 06:28:13'),
(5, 'Career', '#', NULL, '2024-10-14 06:28:14'),
(6, 'Blog', '#', NULL, '2024-10-14 06:28:16'),
(12, 'Contact', '#', '2024-10-14 10:45:14', '2024-10-14 10:45:29');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_05_085347_create_menu_table', 2),
(5, '2024_08_09_045018_create_sections_table', 3),
(6, '2024_08_21_053856_create_contacts_table', 4),
(7, '2024_08_21_072705_create_admins_table', 5),
(10, '2024_08_23_042136_create_service_table', 6),
(11, '2024_08_27_112635_create_follow_ups_table', 7),
(12, '2024_08_29_180401_create_admins_table', 8),
(13, '2024_09_04_121021_create_clients_table', 9),
(14, '2024_09_04_142227_create_segments_table', 10),
(16, '2024_09_07_100801_create_web_links_table', 11),
(17, '2024_09_06_104517_create_themes_colors_table', 12),
(18, '2024_09_12_165810_create_web_creates_table', 12),
(19, '2024_09_13_115021_create_headers_table', 13),
(20, '2024_09_13_165121_create_footers_table', 14),
(24, '2024_09_14_115445_create_slider_heads_table', 15),
(25, '2024_09_14_115445_create_sliders_table', 15),
(26, '2024_09_14_163410_create_about_us_table', 16),
(28, '2024_09_14_171706_create_clients_sections_table', 17),
(29, '2024_09_14_180300_create_service_sections_table', 18),
(30, '2024_09_16_103422_create_orders_table', 19),
(31, '2024_10_14_101652_create_header_footers_table', 20),
(32, '2024_10_14_111958_create_menu_and_links_table', 21),
(33, '2024_10_14_162908_create_home_sections_table', 22),
(34, '2024_10_19_144453_create_pages_table', 23),
(38, '2024_10_17_101553_create_get_touch_us_table', 24),
(39, '2024_10_17_123817_create_client_reviews_table', 25),
(40, '2024_10_18_095030_create_portfolios_table', 25),
(43, '2024_10_21_114709_create_logos_table', 26),
(44, '2024_10_21_120303_create_client_logos_table', 26),
(82, '2024_10_21_124155_create_recent_projects_table', 27),
(83, '2024_10_21_144227_create_payment_terms_table', 27),
(84, '2024_10_21_152510_create_seo_sections_table', 27),
(85, '2024_10_23_124638_create_recent_project_contents_table', 27),
(86, '2024_10_28_151858_create_designations_table', 27),
(87, '2024_10_28_165244_create_employees_table', 27),
(88, '2024_10_29_111947_create_attendances_table', 27),
(89, '2024_10_30_113026_create_leaves_table', 27),
(90, '2024_11_02_100342_create_projects_table', 27),
(91, '2024_11_02_164119_create_employee_project_table', 27),
(94, '2024_11_05_181422_create_timesheets_table', 28),
(95, '2024_11_06_114057_create_project_messages_table', 28),
(96, '2024_11_07_121319_create_project_controls_table', 29),
(97, '2024_11_09_153118_create_modules_table', 30),
(99, '2024_11_13_123025_create_project_logs_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `project_id`, `employee_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(5, 3, NULL, 'Clients Module', 'Focused on managing clients. Below are the steps and necessary code modifications to create a Client Management System, including fetching, adding, editing, and deleting clients.', '2024-11-09 11:08:08', '2024-11-13 04:45:19'),
(8, 3, NULL, 'Admin Module', 'Admin Manage Subadmins, Reports, Delete, Edit ect..', '2024-11-09 11:13:51', '2024-11-13 04:45:20'),
(9, 3, NULL, 'User Management Module', 'Admin Management: Admin can manage all users, assign roles (admin, sub-admin, client), and control access permissions.', '2024-11-09 11:32:04', '2024-11-15 04:39:22'),
(10, 3, NULL, 'Client Follow-Up Module', 'Follow-Up Message Creation: Admin and sub-admins can add follow-up messages for clients.', '2024-11-09 11:32:20', '2024-11-13 04:45:18'),
(11, 3, NULL, 'Status Management Module', 'Client Status: Ability to manage the status of each client (e.g., New, In Progress, Closed, etc.).', '2024-11-09 11:32:32', '2024-11-12 10:20:24'),
(12, 3, NULL, 'Sub-Admin Role & Permissions', 'Sub-Admin Management: Sub-admins should have limited access compared to admins, allowing them to manage clients and follow-up messages but not users or settings.', '2024-11-09 11:32:54', '2024-11-21 06:13:40'),
(13, 3, NULL, 'Reports and Analytics', 'Client Follow-up Summary: Provide reports on follow-up statuses, including how many follow-ups are pending, completed, or overdue.', '2024-11-09 11:33:18', '2024-11-21 06:13:39'),
(14, 2, 1, 'User Management Module', 'Customer Registration & Authentication: Allow customers to sign up, log in, and manage their profiles (name, email, password, etc.).', '2024-11-09 11:34:55', '2024-11-13 06:42:01'),
(15, 2, 1, 'Product Management Module', 'Product Catalog: Allows the vendor to add, edit, and delete products. Each product will have attributes like name, description, price, images, and stock quantity.', '2024-11-09 11:35:03', '2024-11-21 06:13:32'),
(16, 2, NULL, 'Shopping Cart Module', 'Add to Cart: Customers can add multiple products to their shopping cart.\nCart Management: View, edit (change quantity or remove items), and clear the cart.', '2024-11-09 11:35:11', '2024-11-21 06:13:26'),
(17, 2, 2, 'Checkout & Payment Module', 'Shipping Information:\nPayment Gateway Integration:', '2024-11-09 11:35:33', '2024-11-21 06:12:34'),
(18, 2, 2, 'Order Management Module', 'Order History: Customers can view their order history and track the status of their current orders (pending, shipped, delivered).\nOrder Status Updates: The vendor can update order statuses (processing, shipped, delivered, etc.).', '2024-11-09 11:35:43', '2024-11-21 06:12:33'),
(19, 2, 2, 'Reviews & Ratings Module', 'Product Ratings: Allow customers to leave ratings and reviews on products they’ve purchased.\nReview Moderation: Admin can approve, reject, or flag inappropriate reviews.\nRatings Summary: Display average product ratings on product pages for customers to make informed decisions.', '2024-11-09 11:35:57', '2025-02-01 06:40:36'),
(20, 2, 2, 'Admin Dashboard Module', 'Product Management: Admin can view and manage all products, categories, inventory, and prices.\nOrder Management: Admin can see all customer orders and their status, and process returns and refunds.', '2024-11-09 11:36:11', '2025-02-01 06:40:36'),
(22, 1, 3, 'Test Module', 'test test module', '2024-11-09 11:47:01', '2024-11-12 10:20:20'),
(23, 1, 3, 'Test Module 2', 'Test Module 2', '2024-11-11 04:22:07', '2024-11-12 10:20:19'),
(24, 4, 1, 'front end', 'front end', '2024-11-21 05:54:28', '2024-11-21 06:07:42'),
(25, 4, 1, 'back end', 'back end', '2024-11-21 05:54:39', '2024-11-21 06:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `web_id` bigint(20) UNSIGNED NOT NULL,
  `pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sections` text COLLATE utf8mb4_unicode_ci,
  `layout` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `web_id`, `pages`, `sections`, `layout`, `created_at`, `updated_at`) VALUES
(4, 17, 15, '1', '[\"slider\",\"about\",\"testimonial\",\"blog\",\"contact\"]', NULL, '2024-09-16 06:46:53', '2024-09-16 06:46:53'),
(5, 17, 15, '1', '[\"slider\",\"about\",\"testimonial\",\"blog\",\"contact\"]', NULL, '2024-09-16 12:56:47', '2024-09-16 12:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Industries', 'industries', 'active', '2024-10-22 04:53:29', '2024-10-22 09:35:07'),
(16, 'Education', 'education', 'active', '2024-10-22 04:54:26', '2024-10-22 04:54:26');

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
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `parent_id`, `type`, `image`, `link`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Dynamic', '1729226946.png', 'http://127.0.0.1:8000/', NULL, 'Active', '2024-10-18 04:49:06', '2024-10-18 04:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `price_package`
--

CREATE TABLE `price_package` (
  `id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `future` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `basic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medium` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enterprice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `advanced` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price_package`
--

INSERT INTO `price_package` (`id`, `section_id`, `parent_id`, `future`, `basic`, `medium`, `enterprice`, `advanced`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'Price', '25000/-', '45000/-', '75000/-', '99000/-', NULL, NULL),
(2, NULL, NULL, 'bn', 'dfghj', 'dfghj', 'frtgyh', 'rdtfgyhdxvxcvb xcb          dsg sdgsdgs dfgdfgsdfg xdfgsdfgh', '2024-10-16 12:29:47', '2024-10-16 12:29:47'),
(3, NULL, NULL, 'dsf41414141', 'sdf4141', 'sdf214141', 'sdfs41', 'sdffasdfasfgasfg1`34`44', '2024-10-17 05:47:30', '2024-10-17 05:47:30'),
(4, NULL, NULL, 'dgsd', 'gsgsg', 'sgsgsg', 'sgsgs', 'gsg', '2024-10-21 10:30:01', '2024-10-21 10:30:01'),
(5, NULL, NULL, 'dfg', 'dfghd', 'dfh', 'dfgh', 'dfh', '2024-10-21 10:52:10', '2024-10-21 10:52:10'),
(6, NULL, NULL, 'dsgs', 'dgsgsg', 'ssg', 'ggg', 'sgsg', '2024-10-21 12:56:25', '2024-10-21 12:56:25'),
(7, NULL, 5, 'Price', '18,500/-', '25,000/-', '45,000/-', '75,000/-', '2024-10-21 13:00:46', '2024-10-21 13:00:46'),
(8, NULL, 5, 'No. of Keywords', '07', '15', '25', '50', '2024-10-21 13:00:57', '2024-10-21 13:00:57'),
(9, NULL, 5, 'No. of Pages Optimized', 'Up to 7', 'Up to 15', 'Up to 25', 'Up to 50', '2024-10-22 08:48:32', '2024-10-22 08:48:32'),
(10, NULL, 5, 'Number of Directory Submission & Classified Submission', '30', '50', '70', '100', '2024-10-22 08:58:16', '2024-10-22 08:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_budget` decimal(15,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `pro_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `pro_name`, `pro_type`, `pro_budget`, `start_date`, `end_date`, `client_name`, `client_email`, `client_phone`, `client_address`, `review_date`, `status`, `pro_status`, `proof`, `created_at`, `updated_at`) VALUES
(1, 'Jayam CMS', 'Dynamic Website', 15000.00, '2024-10-28', '2024-11-08', 'jayam', 'jayamwebsolutions@gmail.com', '8537398602', 'thambaram, chennai', '2024-11-04', 'Pending', 'In Progress', 'project_doc/1730796413_Jooy Job update - 24-06-2024.docx', '2024-11-05 08:46:53', '2024-11-06 05:17:46'),
(2, 'Dailyfresh', 'E-commerce', 23000.00, '2024-11-11', '2024-11-30', 'ram', 'rec44.int@gmail.com', '9876543211', 'thambaram, chennai', '2024-11-25', 'Pending', 'Not Started', 'project_doc/1730875264_1730796413_Jooy Job update - 24-06-2024.docx', '2024-11-06 06:41:04', '2024-11-06 06:41:04'),
(3, 'Client Follow up', 'Web Applications', 30000.00, '2024-11-04', '2024-11-29', 'jayam', 'jayamwebsolutions@gmail.com', '8537398602', 'thambaram, chennai', '2024-11-22', 'Pending', 'Started', 'project_doc/1731127516_1730796413_Jooy Job update - 24-06-2024 (1).docx', '2024-11-09 04:45:16', '2024-11-09 04:45:16'),
(4, 'Laundry', 'Dynamic Website', 20000.00, '2024-11-21', '2024-11-30', 'asdf', 'asf@dfgg.vom', '96758963521225', 'dasd', '2024-11-23', 'Pending', 'Not Started', NULL, '2024-11-21 05:53:50', '2024-11-21 05:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `project_controls`
--

CREATE TABLE `project_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_controls`
--

INSERT INTO `project_controls` (`id`, `project_id`, `pro_name`, `pro_link`, `pro_image`, `created_at`, `updated_at`) VALUES
(7, 1, 'Jayam CMS Live Link', 'http://127.0.0.1:2222/', 'project_documents/1731135377_logo (2).png', '2024-11-08 06:20:04', '2024-11-09 06:56:17'),
(8, 2, 'Dailyfresh', 'https://dailyfresh.net.in/', 'project_documents/1731128674_my-business-name-high-resolution-logo-transparent.png', '2024-11-09 05:04:34', '2024-11-09 05:04:34'),
(9, 3, 'Client Follow up', 'https://jayamdesigners.co.in/client-follow-up/admin', 'project_documents/1731128715_jayam-web-solutions-high-resolution-logo-transparent.png', '2024-11-09 05:05:15', '2024-11-09 05:05:15'),
(10, 4, 'laundry', 'https://followup.jayamwebsolutions.com/admin/inquiries', 'project_documents/1732170504_WhatsApp Image 2024-08-27 at 12.08.48 PM.jpeg', '2024-11-21 06:28:24', '2024-11-21 06:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_logs`
--

CREATE TABLE `project_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_logs`
--

INSERT INTO `project_logs` (`id`, `employee_id`, `project_id`, `module_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2024-11-13 12:04:30', '2024-11-13 12:04:36', '2024-11-13 12:04:30', '2024-11-13 12:04:36'),
(2, 1, 2, 20, '2024-11-13 12:09:00', '2024-11-13 12:09:12', '2024-11-13 12:09:00', '2024-11-13 12:09:12'),
(3, 1, 2, 14, '2024-11-13 12:16:35', '2024-11-13 13:22:16', '2024-11-13 12:16:35', '2024-11-13 13:22:16'),
(4, 1, 3, NULL, '2024-11-13 12:55:34', '2024-11-13 12:55:36', '2024-11-13 12:55:34', '2024-11-13 12:55:36'),
(5, 1, 3, 9, '2024-11-13 12:58:04', '2024-11-13 12:58:10', '2024-11-13 12:58:04', '2024-11-13 12:58:10'),
(6, 1, 2, 14, '2024-11-13 13:22:15', NULL, '2024-11-13 13:22:15', '2024-11-13 13:22:15'),
(7, 1, 4, 25, '2024-11-21 06:30:22', NULL, '2024-11-21 06:30:22', '2024-11-21 06:30:22'),
(8, 1, 2, 15, '2025-02-01 06:25:36', NULL, '2025-02-01 06:25:36', '2025-02-01 06:25:36'),
(9, 1, 4, 25, '2025-02-01 06:25:46', NULL, '2025-02-01 06:25:46', '2025-02-01 06:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `project_messages`
--

CREATE TABLE `project_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_messages`
--

INSERT INTO `project_messages` (`id`, `project_id`, `employee_id`, `message_type`, `message`, `document`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Text', '<div bis_skin_checked=\"1\" id=\"messageText\" name=\"messageText\">test</div>', NULL, '2024-11-06 11:50:24', '2024-11-06 11:50:24'),
(2, 2, NULL, 'Text', '<div bis_skin_checked=\"1\" id=\"messageText\" name=\"messageText\">dfhdfh</div>', NULL, '2024-11-06 11:53:13', '2024-11-06 11:53:13'),
(3, 2, 1, 'Text', '<div id=\"messageText\" name=\"messageText\">dgsw sdgdfgsd</div><p>sdg kjsdg&nbsp;</p><p>asfgioasnj</p>', NULL, '2024-11-06 11:58:31', '2024-11-06 11:58:31'),
(4, 2, NULL, 'Text', '<div bis_skin_checked=\"1\" id=\"messageText\" name=\"messageText\">the project complete EDO</div>', NULL, '2024-11-06 12:19:03', '2024-11-06 12:19:03'),
(5, 2, NULL, 'Document', NULL, 'project_documents/1730895682_1730874701_1730796413_Jooy Job update - 24-06-2024.docx', '2024-11-06 12:21:22', '2024-11-06 12:21:22'),
(6, 2, NULL, 'Image', NULL, 'project_documents/1730895705_Product hunt-bro.png', '2024-11-06 12:21:45', '2024-11-06 12:21:45'),
(7, 2, NULL, 'Video', NULL, 'project_documents/1730895725_My items - Awesome Screenshot.mp4', '2024-11-06 12:22:05', '2024-11-06 12:22:05'),
(8, 2, NULL, 'Audio', NULL, 'project_documents/1730895736_8XbsQ0jKAeNgRsMeoZNiystUZukXVcX4HeMLqjZa.wav', '2024-11-06 12:22:16', '2024-11-06 12:22:16'),
(9, 2, NULL, 'Audio', NULL, 'project_documents/1730895966_Lana-Del-Rey-Diet-Mountain-Dew-(RawPraise.ng).mp3', '2024-11-06 12:26:06', '2024-11-06 12:26:06'),
(10, 2, NULL, 'Text', '<div bis_skin_checked=\"1\" id=\"messageText\" name=\"messageText\"><strong>asf sgsd sgsd<br>&nbsp;<img src=\"blob:http://127.0.0.1:2222/ce38d89c-50bf-4a4e-a374-2c801a90d27e\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></strong></div><p><strong>sgfsdgsdgd</strong></p><p><strong>dfjfgjj</strong></p><p><br></p><p><strong><img src=\"blob:http://127.0.0.1:2222/e0e349bb-f5c6-4a3c-b25d-16eb8ce3ac9a\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></strong></p><p><strong>dxgsdfhgsdfh</strong></p><br>', NULL, '2024-11-06 12:30:27', '2024-11-06 12:30:27'),
(14, 1, NULL, 'Text', '<p data-t=\'{\"n\":\"blueLinks\"}\' style=\'margin: 0px 0px 16px; color: rgb(43, 43, 43); font-family: \"Segoe UI\", \"Segoe UI Midlevel\", sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\'><span style=\'font-size: 64px; font-family: \"Eb Garamond\"; font-style: normal; line-height: 52px; float: left; margin-inline-end: 8px;\'>M</span>ammals are a group of warm-blooded vertebrates that give birth to live young and feed them with milk. Known as one of the most adaptable animals on the Earth, mammals are found on every continent and in every range in size, be it tiny bumblebee bats, to humans, or giant blue whales.</p><div data-t=\'{\"n\":\"intraArticle\",\"t\":13}\' style=\'position: relative; z-index: 97; width: 682px; color: rgb(43, 43, 43); font-family: \"Segoe UI\", \"Segoe UI Midlevel\", sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\'><span style=\"color: rgb(255, 255, 255); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(22, 55, 112); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Lorem, ipsum dolor sit amet consectetur adipisicing <br>elit. dignissimos beatae quidem similique ut <br>eos mollitia molestiae, excepturi officiis quos?<br>&nbsp;Optio quisquam commodi quod!</span>&nbsp;</div><h3 style=\"box-sizing: border-box; padding: 0px; margin: 20px 0px 0.5rem; font-weight: 500; line-height: 1.2; font-size: 22px; color: rgb(0, 192, 240); font-family: Poppins, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(250, 252, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Objectives of SEO:</h3><ul style=\"box-sizing: border-box; padding: 0px 0px 0px 20px; margin: 0px 0px 1rem; list-style: disc; color: rgb(101, 110, 129); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(250, 252, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Achieve top rankings in SERPs through continuous SEO activities.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Enhance your business&#39;s reach in the digital landscape.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Improve rankings through analysis of Google algorithms and competitive strategies.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Boost Google Rankings for increased visibility.<h3 style=\"box-sizing: border-box; padding: 0px; margin: 20px 0px 10px; font-weight: 500; line-height: 1.2; font-size: 20px; color: rgb(0, 86, 179);\">Terms &amp; Conditions:</h3><ul style=\"box-sizing: border-box; padding: 0px 0px 0px 20px; margin: 0px 0px 1rem; list-style: none;\"><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 8px; font-size: 16px; color: rgb(51, 51, 51);\">SEO Activities involve organic SEO i.e. improving rank and traffic to the website.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 8px; font-size: 16px; color: rgb(51, 51, 51);\">Additional cost applicable for Content writing at 1/- INR per word. If contents are provided from your end as per our requirement, there will be no cost chargeable.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 8px; font-size: 16px; color: rgb(51, 51, 51);\">Advance payment is not refundable after initiating the project.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 8px; font-size: 16px; color: rgb(51, 51, 51);\">Your side co-ordinations are most important to understand your services &amp; requirements. Communication could be in any mode: Telephone, Email, Video Call.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 8px; font-size: 16px; color: rgb(51, 51, 51);\">If any additional tasks needed on your website for SEO, the same will be done by our development team at additional cost. Cost will be estimated based on requirement.</li></ul></li></ul>', NULL, '2024-11-07 04:31:35', '2024-11-07 04:31:35'),
(15, 1, NULL, 'Video', NULL, 'project_documents/1730956386_Marvel Studios  The Marvels _ Official Trailer (1).mp4', '2024-11-07 05:13:06', '2024-11-07 05:13:06'),
(16, 1, NULL, 'Text', '<div style=\"box-sizing: border-box; padding: 10px; margin: 0px; flex: 1 1 0%; width: 571.047px; max-width: 45%; color: rgb(101, 110, 129); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(250, 252, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><img data-fr-image-pasted=\"true\" src=\"http://127.0.0.1:2222/assets/about.jpg\" alt=\"\" style=\"box-sizing: border-box; padding: 0px; width: 153px; height: 512px;\" class=\"fr-fic fr-dii\"><img src=\"blob:http://127.0.0.1:2222/3a15ebfa-ef18-4cf2-af72-8d29b08d072d\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></div><div style=\"box-sizing: border-box; padding: 10px; margin: -2rem 0px 0px; flex: 1 1 0%; width: 571.047px; max-width: 45%; color: rgb(101, 110, 129); font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(250, 252, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><h3 style=\"box-sizing: border-box; padding: 0px; margin: 20px 0px 0.5rem; font-weight: 500; line-height: 1.2; font-size: 22px; color: rgb(0, 192, 240);\">About SEO</h3><p style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 15px; font-size: 16px; color: rgb(85, 85, 85);\">This quotation is prepared for SEO &ndash; Search Engine Optimization that helps reach target audiences by making your business visible in the SERP (Search Engine Results Page). SEO is the most preferred method of Digital Marketing Strategy, which brings your target audience to the website.</p><h3 style=\"box-sizing: border-box; padding: 0px; margin: 20px 0px 0.5rem; font-weight: 500; line-height: 1.2; font-size: 22px; color: rgb(0, 192, 240);\">Objectives of SEO:</h3><ul style=\"box-sizing: border-box; padding: 0px 0px 0px 20px; margin: 0px 0px 1rem; list-style: disc;\"><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Achieve top rankings in SERPs through continuous SEO activities.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Enhance your business&#39;s reach in the digital landscape.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Improve rankings through analysis of Google algorithms and competitive strategies.</li><li style=\"box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 16px; color: rgb(51, 51, 51);\">Boost Google Rankings for increased visibility.</li></ul></div>', NULL, '2024-11-07 06:14:20', '2024-11-07 06:14:20'),
(17, 3, NULL, 'Text', '<div id=\"messageText\" name=\"messageText\">Test Message Addd</div>', NULL, '2024-11-09 12:13:18', '2024-11-09 12:13:18'),
(18, 4, NULL, 'Text', '<div id=\"messageText\" name=\"messageText\">complete it today</div><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', NULL, '2024-11-21 06:24:44', '2024-11-21 06:24:44'),
(19, 2, NULL, 'Document', '<p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'project_documents/1734491273_section-blade.docx', '2024-12-18 03:07:53', '2024-12-18 03:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `recent_projects`
--

CREATE TABLE `recent_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_project_contents`
--

CREATE TABLE `recent_project_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sectionName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionName`, `created_at`, `updated_at`) VALUES
(1, 'Hero', NULL, NULL),
(2, 'About', NULL, NULL),
(3, 'Services', NULL, NULL),
(4, 'Gallery', NULL, NULL),
(5, 'Testimonials', NULL, NULL),
(6, 'Blog', NULL, NULL),
(7, 'Contact', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE `segments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Builders', NULL, NULL),
(7, 'Education', '2024-09-04 10:20:52', '2024-09-04 10:20:52'),
(8, 'Technology', '2024-09-04 10:21:00', '2024-09-04 10:21:00'),
(9, 'Finance', '2024-09-04 10:21:05', '2024-09-04 10:21:05'),
(10, 'Entertainment', '2024-09-04 10:21:10', '2024-09-04 10:21:10'),
(11, 'Travel', '2024-09-04 10:21:17', '2024-09-04 10:21:17'),
(12, 'Retail', '2024-09-04 10:21:22', '2024-09-04 10:21:22'),
(13, 'Food & Beverage', '2024-09-04 10:21:31', '2024-09-04 10:21:31'),
(14, 'Automotive', '2024-09-04 10:21:37', '2024-09-04 10:21:37'),
(15, 'Real Estate', '2024-09-04 10:21:43', '2024-09-04 10:21:43'),
(16, 'Manufacturing', '2024-09-04 10:21:50', '2024-09-04 10:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `seo_sections`
--

CREATE TABLE `seo_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortOrder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service`, `sortOrder`, `created_at`, `updated_at`) VALUES
(4, 'Mobile App', '7', '2024-08-22 23:32:21', '2024-11-06 05:11:19'),
(26, 'Static Website', '1', '2024-11-06 05:09:39', '2024-11-06 05:09:43'),
(27, 'Dynamic Website', '3', '2024-11-06 05:10:00', '2024-11-06 05:10:00'),
(28, 'Web Applications', '4', '2024-11-06 05:10:42', '2024-11-06 05:10:42'),
(29, 'Content Management Systems (CMS)', '5', '2024-11-06 05:10:49', '2024-11-06 05:10:49'),
(30, 'Single Page Applications (SPA)', '6', '2024-11-06 05:10:59', '2024-11-06 05:10:59'),
(31, 'E-commerce', '2', '2024-11-06 05:11:06', '2024-11-06 05:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `service_name`, `service_image`, `service_code`, `created_at`, `updated_at`) VALUES
(1, 'Service 1', 'service_images/aaBIq8N5t7nYy999W3ytnbGCp1x5eTOVNpIClpYy.png', '<style>\r\n\r\n.sectiontitle {\r\n  background-position: center;\r\n  margin: 30px 0 0px;\r\n  text-align: center;\r\n  min-height: 20px;\r\n}\r\n\r\n.sectiontitle h2 {\r\n  font-size: 30px;\r\n  color: #222;\r\n  margin-bottom: 0px;\r\n  padding-right: 10px;\r\n  padding-left: 10px;\r\n}\r\n\r\n\r\n.headerLine {\r\n  width: 160px;\r\n  height: 2px;\r\n  display: inline-block;\r\n  background: #101F2E;\r\n}\r\n\r\n\r\n.projectFactsWrap{\r\n    display: flex;\r\n    margin-top: 30px;\r\n    flex-direction: row;\r\n    flex-wrap: wrap;\r\n    background: #224a89;\r\n}\r\n\r\n\r\n#projectFacts .fullWidth{\r\n  padding: 0;\r\n}\r\n\r\n.projectFactsWrap .item{\r\n  width: 25%;\r\n  height: 100%;\r\n  padding: 50px 0px;\r\n  text-align: center;\r\n}\r\n\r\n.projectFactsWrap .item p.number{\r\n  font-size: 40px;\r\n  padding: 0;\r\n  font-weight: bold;\r\n}\r\n\r\n.projectFactsWrap .item p{\r\n  color: rgba(255, 255, 255, 0.8);\r\n  font-size: 18px;\r\n  margin: 0;\r\n  padding: 10px;\r\n  font-family: \'Open Sans\';\r\n}\r\n\r\n\r\n.projectFactsWrap .item span{\r\n  width: 60px;\r\n  background: rgba(255, 255, 255, 0.8);\r\n  height: 2px;\r\n  display: block;\r\n  margin: 0 auto;\r\n}\r\n\r\n\r\n.projectFactsWrap .item i{\r\n  vertical-align: middle;\r\n  font-size: 50px;\r\n  color: rgba(255, 255, 255, 0.8);\r\n}\r\n\r\n\r\n.projectFactsWrap .item:hover i, .projectFactsWrap .item:hover p{\r\n  color: white;\r\n}\r\n\r\n.projectFactsWrap .item:hover span{\r\n  background: white;\r\n}\r\n\r\n@media (max-width: 786px){\r\n  .projectFactsWrap .item {\r\n     flex: 0 0 50%;\r\n  }\r\n}\r\n</style>\r\n\r\n<div id=\"projectFacts\" class=\"sectionClass\">\r\n    <div class=\"fullWidth\">\r\n        <div class=\"projectFactsWrap\">\r\n            <div class=\"item wow fadeInUpBig animated\" data-number=\"12\" style=\"visibility: visible;\">\r\n                <p id=\"number1\" class=\"number\">12</p>\r\n                <p>Projects done</p>\r\n            </div>\r\n            <div class=\"item wow fadeInUpBig animated\" data-number=\"55\" style=\"visibility: visible;\">\r\n                <p id=\"number2\" class=\"number\">55</p>\r\n                <p>Happy clients</p>\r\n            </div>\r\n            <div class=\"item wow fadeInUpBig animated\" data-number=\"359\" style=\"visibility: visible;\">\r\n                <p id=\"number3\" class=\"number\">359</p>\r\n                <p>Cups of coffee</p>\r\n            </div>\r\n            <div class=\"item wow fadeInUpBig animated\" data-number=\"246\" style=\"visibility: visible;\">\r\n                <p id=\"number4\" class=\"number\">246</p>\r\n                <p>Photos taken</p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n\r\n<script>\r\n$.fn.jQuerySimpleCounter = function( options ) {\r\n	    var settings = $.extend({\r\n	        start:  0,\r\n	        end:    100,\r\n	        easing: \'swing\',\r\n	        duration: 400,\r\n	        complete: \'\'\r\n	    }, options );\r\n\r\n	    var thisElement = $(this);\r\n\r\n	    $({count: settings.start}).animate({count: settings.end}, {\r\n			duration: settings.duration,\r\n			easing: settings.easing,\r\n			step: function() {\r\n				var mathCount = Math.ceil(this.count);\r\n				thisElement.text(mathCount);\r\n			},\r\n			complete: settings.complete\r\n		});\r\n	};\r\n\r\n\r\n$(\'#number1\').jQuerySimpleCounter({end: 12,duration: 3000});\r\n$(\'#number2\').jQuerySimpleCounter({end: 55,duration: 3000});\r\n$(\'#number3\').jQuerySimpleCounter({end: 359,duration: 2000});\r\n$(\'#number4\').jQuerySimpleCounter({end: 246,duration: 2500});\r\n\r\n\r\n\r\n  	/* AUTHOR LINK */\r\n     $(\'.about-me-img\').hover(function(){\r\n            $(\'.authorWindowWrapper\').stop().fadeIn(\'fast\').find(\'p\').addClass(\'trans\');\r\n        }, function(){\r\n            $(\'.authorWindowWrapper\').stop().fadeOut(\'fast\').find(\'p\').removeClass(\'trans\');\r\n        });\r\n  \r\n</script>', '2024-09-14 12:51:19', '2024-09-14 12:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5gH9eO2ejzDZYUDXfl2fqdtNvAklPXwEAlHEiCaX', NULL, '185.247.137.149', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3I2UHJrd3czcnZLa1VZMldpcnlVUnVDZVQ4d0xVZk9vdVNNRnA0USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vd3d3LnRlYW0uamF5YW13ZWJzb2x1dGlvbnMuY29tL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738344076),
('EnfURjqRpOVJFnBiHJDj7M9PFJZZkfBvZmC24iCF', NULL, '87.236.176.253', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkZHbWJtMHAybGJjU3ZWNndvQTEyUlJTYXBtU0ZVR001MUtKTFp0MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly93d3cudGVhbS5qYXlhbXdlYnNvbHV0aW9ucy5jb20vYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738326450),
('L0NohNU8sqXxLIPKAsDjQjaGEbOOqo0jxCceQqxB', NULL, '205.210.31.13', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEJxZk1pRHZBRnc1d0hGT1JXeFZCZVpHNE9VQmVNZTZJTFJJdW8xMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly90ZWFtLmpheWFtd2Vic29sdXRpb25zLmNvbS9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738369491),
('THmFodhXhlSglSa5KlmhnLlN3C4KrwndxBL0IFZm', 2, '223.178.80.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWTlyZHJ1NTBUb1d2M2FEdnpHOEQ2dHo2ZGxRTHEyWDNJcDRNOVRDbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vdGVhbS5qYXlhbXdlYnNvbHV0aW9ucy5jb20vYWRtaW4vYXNzaWduLXByb2plY3QiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1738392387),
('vNNeS3QYaf5vVCStCETIgS6HDb6okWthE0Wu7kXH', NULL, '185.247.137.149', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzdnTUlQOEd4aHlXNDQ5dk9tUGwydjVDRmdYa1BadWQwNWQ2Z2dMZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vd3d3LnRlYW0uamF5YW13ZWJzb2x1dGlvbnMuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738344076),
('xIx1DIXsgruDKCs4Yml5rPG68inkWV1r3TrmWjUy', NULL, '205.210.31.13', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmlhM0tNVkJMNEZrMmZrQ1Rsanp1dVQ4TE1DN2doSkxaRVh2U3BacyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly90ZWFtLmpheWFtd2Vic29sdXRpb25zLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738369491);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_head_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `slider_head_id`, `created_at`, `updated_at`) VALUES
(10, 'Slider 1', 'Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'images/ciYIdTTQDDqy2o0k9dhCXOYGLwwdurWrLmSpgSnB.png', 3, '2024-09-14 10:47:22', '2024-09-14 10:47:22'),
(11, 'Slider 2', 'Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'images/NsZjZLekl27YEClneVzQCnbV9WHREFWus0zSyynQ.png', 3, '2024-09-14 10:49:24', '2024-09-14 10:49:24'),
(12, 'Responsive Slider', 'Test lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'images/YegyMo8QezA9AyioU9bpfnIoztsMewC26a80UXMe.png', 4, '2024-09-14 10:50:10', '2024-09-14 10:51:01'),
(13, 'Responsive Slider', 'Test lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'images/S7nAcpFcSVkwHu8tPE8UUWJKBdctNpP8z3BzsXAO.png', 4, '2024-09-14 10:50:42', '2024-09-14 10:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `slider_heads`
--

CREATE TABLE `slider_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_heads`
--

INSERT INTO `slider_heads` (`id`, `slider_name`, `slider_code`, `created_at`, `updated_at`) VALUES
(3, 'sider layout 1', '<div id=\"carouselExampleCaptions\" class=\"carousel slide\" data-bs-ride=\"carousel\">    <div class=\"carousel-indicators\">      <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>      <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>      <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>    </div>    <div class=\"carousel-inner\">      <!-- Slide 1 -->      <div class=\"carousel-item active\">        <img src=\"https://via.placeholder.com/1200x600\" class=\"d-block w-100\" alt=\"Slide 1 Image\">        <div class=\"carousel-caption d-none d-md-block\">          <h5>Slide Title 1</h5>          <p>Slide Description 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>        </div>      </div>      <!-- Slide 2 -->      <div class=\"carousel-item\">        <img src=\"https://via.placeholder.com/1200x600\" class=\"d-block w-100\" alt=\"Slide 2 Image\">        <div class=\"carousel-caption d-none d-md-block\">          <h5>Slide Title 2</h5>          <p>Slide Description 2: Suspendisse potenti. Nulla aliquet, orci et aliquet efficitur.</p>        </div>      </div>      <!-- Slide 3 -->      <div class=\"carousel-item\">        <img src=\"https://via.placeholder.com/1200x600\" class=\"d-block w-100\" alt=\"Slide 3 Image\">        <div class=\"carousel-caption d-none d-md-block\">          <h5>Slide Title 3</h5>          <p>Slide Description 3: Quisque eget velit finibus, pharetra magna non, gravida nisi.</p>        </div>      </div>    </div>    <!-- Carousel Controls -->    <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"prev\">      <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>      <span class=\"visually-hidden\">Previous</span>    </button>    <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"next\">      <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>      <span class=\"visually-hidden\">Next</span>    </button>  </div>', '2024-09-14 10:36:54', '2024-09-14 10:36:54'),
(4, 'sider layout 2', '<style>    .carousel-caption {      position: absolute;      top: 50%;      left: 50%;      transform: translate(-50%, -50%);      text-align: center;    }    .carousel-caption h5 {      font-size: 2rem;      font-weight: bold;    }    .carousel-caption p {      font-size: 1.25rem;    }  </style> <div id=\"carouselExampleCaptions\" class=\"carousel slide\" data-bs-ride=\"carousel\">    <div class=\"carousel-indicators\">      <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>      <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>      <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>    </div>    <div class=\"carousel-inner\">      <!-- Slide 1 -->      <div class=\"carousel-item active\">        <img src=\"https://via.placeholder.com/1200x600\" class=\"d-block w-100\" alt=\"Slide 1 Image\">        <div class=\"carousel-caption\">          <h5>Slide Title 1</h5>          <p>Slide Description 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>        </div>      </div>      <!-- Slide 2 -->      <div class=\"carousel-item\">        <img src=\"https://via.placeholder.com/1200x600\" class=\"d-block w-100\" alt=\"Slide 2 Image\">        <div class=\"carousel-caption\">          <h5>Slide Title 2</h5>          <p>Slide Description 2: Suspendisse potenti. Nulla aliquet, orci et aliquet efficitur.</p>        </div>      </div>      <!-- Slide 3 -->      <div class=\"carousel-item\">        <img src=\"https://via.placeholder.com/1200x600\" class=\"d-block w-100\" alt=\"Slide 3 Image\">        <div class=\"carousel-caption\">          <h5>Slide Title 3</h5>          <p>Slide Description 3: Quisque eget velit finibus, pharetra magna non, gravida nisi.</p>        </div>      </div>    </div>    <!-- Carousel Controls -->    <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"prev\">      <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>      <span class=\"visually-hidden\">Previous</span>    </button>    <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"next\">      <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>      <span class=\"visually-hidden\">Next</span>    </button>  </div>', '2024-09-14 10:38:40', '2024-09-14 10:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `themes_colors`
--

CREATE TABLE `themes_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hover_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `task_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `task_status` enum('pending','completed','in-progress') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-10-29 11:52:37', '$2y$12$iVKK.6fJBf85otXZbKRQNOenzRI5pMuvFQUurxzKUNM2mFIZKXSzy', '0NtNZ5SvdW', '2024-10-29 11:52:37', '2024-10-29 11:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `web_creates`
--

CREATE TABLE `web_creates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `website_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_links`
--

CREATE TABLE `web_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weblink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_links`
--

INSERT INTO `web_links` (`id`, `category`, `webname`, `weblink`, `screenshot`, `created_at`, `updated_at`) VALUES
(3, 'educational', 'Online Offline Checker', 'C:\\xampp\\htdocs\\CMS-management\\CMS-dashboard\\../online-offline-checker', 'home3.png', '2024-09-06 23:24:49', '2024-09-06 23:24:49'),
(15, 'personal', 'Service Selling2', 'https://www.webdevelopmentindia.co.in/jooyjob/', 'home1.png', '2024-09-09 18:06:48', '2024-09-09 18:06:48'),
(16, 'business', 'Chart Project2', 'http://localhost/CMS-management/chart-project', 'home2.png', '2024-09-09 18:10:01', '2024-09-09 18:10:01'),
(17, 'ecommerce', 'E-Commerce2', 'https://www.webdevelopmentindia.co.in/huevouge/', 'home3.png', '2024-09-09 18:11:14', '2024-09-09 18:11:14'),
(19, 'personal', 'Google2', 'https://google.com', 'home1.png', '2024-09-09 18:18:15', '2024-09-09 18:18:15'),
(21, 'news', 'Maatwebsite', 'https://laravel-excel.com/', 'home2.png', '2024-09-09 23:38:41', '2024-09-09 23:38:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_sections`
--
ALTER TABLE `clients_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_reviews`
--
ALTER TABLE `client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`),
  ADD UNIQUE KEY `employees_personal_email_unique` (`personal_email`),
  ADD UNIQUE KEY `employees_office_email_unique` (`office_email`),
  ADD UNIQUE KEY `employees_account_no_unique` (`account_no`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `employee_project`
--
ALTER TABLE `employee_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_project_project_id_foreign` (`project_id`),
  ADD KEY `employee_project_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_touch_us`
--
ALTER TABLE `get_touch_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_footers`
--
ALTER TABLE `header_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sections`
--
ALTER TABLE `home_sections`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_and_links`
--
ALTER TABLE `menu_and_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_project_id_foreign` (`project_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_web_id_foreign` (`web_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_package`
--
ALTER TABLE `price_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_controls`
--
ALTER TABLE `project_controls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_controls_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_logs`
--
ALTER TABLE `project_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_logs_employee_id_foreign` (`employee_id`),
  ADD KEY `project_logs_project_id_foreign` (`project_id`),
  ADD KEY `project_logs_module_id_foreign` (`module_id`);

--
-- Indexes for table `project_messages`
--
ALTER TABLE `project_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_messages_project_id_foreign` (`project_id`),
  ADD KEY `project_messages_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `recent_projects`
--
ALTER TABLE `recent_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_project_contents`
--
ALTER TABLE `recent_project_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_sections`
--
ALTER TABLE `seo_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_slider_head_id_foreign` (`slider_head_id`);

--
-- Indexes for table `slider_heads`
--
ALTER TABLE `slider_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes_colors`
--
ALTER TABLE `themes_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timesheets_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_creates`
--
ALTER TABLE `web_creates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `web_creates_client_id_foreign` (`client_id`);

--
-- Indexes for table `web_links`
--
ALTER TABLE `web_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients_sections`
--
ALTER TABLE `clients_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `client_reviews`
--
ALTER TABLE `client_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_project`
--
ALTER TABLE `employee_project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_ups`
--
ALTER TABLE `follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `get_touch_us`
--
ALTER TABLE `get_touch_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `header_footers`
--
ALTER TABLE `header_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_sections`
--
ALTER TABLE `home_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu_and_links`
--
ALTER TABLE `menu_and_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `price_package`
--
ALTER TABLE `price_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_controls`
--
ALTER TABLE `project_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_logs`
--
ALTER TABLE `project_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_messages`
--
ALTER TABLE `project_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recent_projects`
--
ALTER TABLE `recent_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent_project_contents`
--
ALTER TABLE `recent_project_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `seo_sections`
--
ALTER TABLE `seo_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slider_heads`
--
ALTER TABLE `slider_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `themes_colors`
--
ALTER TABLE `themes_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_creates`
--
ALTER TABLE `web_creates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_links`
--
ALTER TABLE `web_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employee_project`
--
ALTER TABLE `employee_project`
  ADD CONSTRAINT `employee_project_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_project_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_web_id_foreign` FOREIGN KEY (`web_id`) REFERENCES `web_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_controls`
--
ALTER TABLE `project_controls`
  ADD CONSTRAINT `project_controls_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_logs`
--
ALTER TABLE `project_logs`
  ADD CONSTRAINT `project_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `project_logs_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
  ADD CONSTRAINT `project_logs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project_messages`
--
ALTER TABLE `project_messages`
  ADD CONSTRAINT `project_messages_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_messages_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_slider_head_id_foreign` FOREIGN KEY (`slider_head_id`) REFERENCES `slider_heads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `web_creates`
--
ALTER TABLE `web_creates`
  ADD CONSTRAINT `web_creates_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
