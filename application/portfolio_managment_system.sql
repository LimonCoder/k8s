-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2025 at 01:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1746986954),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1746986954;', 1746986954),
('fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'i:1;', 1746959343),
('fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f:timer', 'i:1746959343;', 1746959343),
('soikot@gmail.com|127.0.0.1', 'i:1;', 1746852172),
('soikot@gmail.com|127.0.0.1:timer', 'i:1746852172;', 1746852172);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Md Omar Faruk', 'akomarfci@gmail.com', 'for portfolio', 'hi', '2024-10-07 09:43:52', '2024-10-07 09:43:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `information_id` bigint UNSIGNED NOT NULL,
  `passing_year` date NOT NULL,
  `campus_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `user_id`, `information_id`, `passing_year`, `campus_name`, `degree`, `department`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, '2024-05-17', 'FPI', 'Diploma', 'Computer Technology', '2024-05-17 21:07:03', '2024-05-17 21:07:03', NULL),
(2, 3, 3, '2026-01-01', 'EASTREN UNIVERSITY OF BANGLADESH', 'BSC. ENGINEERING', 'Department of Science', '2024-05-17 23:46:56', '2024-05-17 23:46:56', NULL),
(3, 3, 3, '2019-01-01', 'FENI COMPUTER INSTITUTE', 'DIPLOMA ENGINEERING', 'Department of Data Telecommunnication and Networking', '2024-05-17 23:47:37', '2024-05-17 23:47:37', NULL),
(4, 3, 3, '2015-01-01', 'IBN TAIMIYA SCHOOL AND COLLAGE', 'SCOUNDARY SCHOOL CERTIFICATE', 'Department of Science', '2024-05-17 23:48:10', '2024-05-17 23:48:10', NULL),
(7, 2, 2, '2019-12-08', 'FPI', 'DIPLOMA ENGINEERING', 'Computer Science & Engineering', '2025-05-08 09:52:58', '2025-05-08 09:52:58', NULL),
(8, 6, 5, '2025-05-10', 'EASTREN UNIVERSITY OF BANGLADESH', 'BSC. ENGINEERING', 'Computer Science & Engineering', '2025-05-09 23:15:10', '2025-05-09 23:15:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `information_id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `responsibility` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `information_id`, `company_name`, `designation`, `start_date`, `end_date`, `responsibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'Business Automation Ltd', 'Software Developer', '2024-05-16', '2024-06-06', '<p>44t</p>', '2024-05-17 21:08:02', '2024-05-17 21:08:02', NULL),
(2, 3, 3, 'INNOVATION IT', 'SUPPORT ENGINEER', '2022-01-01', '2023-01-01', '- Customer feedback.\r\n- Tracking and managing work records.\r\n- Customer support.\r\n- Document actionable bugs for engineering resolution.\r\n- Issue analysis.\r\n- Diagnose and troubleshoot software issues.', '2024-05-17 23:49:42', '2024-05-17 23:49:42', NULL),
(3, 1, 3, 'INNOVATION IT', 'SOFTWARE DEVELOPER', '2023-01-01', '2024-03-31', '- Developed, and maintained new & current systems.\r\n- Responsibile for developing Laravel and Codeigniter Based   Application Vehicle Management System, Smart Union, Smart   Municipility, School Managment Software, BrickApp And\r\n  District App(Api).\r\n- Working on Codeigniter Based School Managment Software.\r\n- Deploy and Manage Projects On Centos Server. br - Provided maintenance support in a production environment.', '2024-05-17 23:50:39', '2024-05-17 23:50:39', NULL),
(5, 2, 2, 'INNOVATION IT', 'Software Developer', '2024-01-01', NULL, 'Software Developer', '2025-05-08 09:53:28', '2025-05-08 09:53:28', NULL),
(6, 3, 3, 'SMART THINK', 'Software Developer', '2024-04-01', NULL, 'Software Developer', '2025-05-08 09:54:11', '2025-05-08 09:54:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stake_id` bigint UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int NOT NULL,
  `nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_freelancer` tinyint DEFAULT '0' COMMENT '0 = unavailable, 1 = available',
  `languages` json DEFAULT NULL,
  `project` int DEFAULT NULL,
  `customer` int DEFAULT NULL,
  `color_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `user_id`, `stake_id`, `first_name`, `last_name`, `photo`, `age`, `nationality`, `address`, `phone`, `email`, `skype`, `whatsapp`, `linkedin`, `facebook`, `is_freelancer`, `languages`, `project`, `customer`, `color_code`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'Nurul amin', 'limon', '1716001261.png', 27, 'Bangladeshi', 'Kazipara, Dhaka', '01838723408', 'limofpi408@gmail.com', 'Skype', 'whatsapp', 'linkedin', 'facebook', NULL, '[\"Bengali\"]', 34, 45, '#dd2222', '<p>test</p>', 0, '2024-05-17 21:01:01', '2024-05-17 23:40:49', NULL),
(2, 2, 1, 'Mk', 'Shoikot', '1716001945.png', 34, 'Bangladeshi', 'Kazipara, Dhaka', '01898723408', 'mksoikotbhuiyan117@gmail.com ', 'Skype', 'whatsapp', 'linkedin', 'facebook', NULL, '[\"Bengali\"]', 4, 4, '#00bfff', '<p>sdfsdfsd</p>', 0, '2024-05-17 21:12:26', '2025-05-08 09:58:22', NULL),
(3, 3, 2, 'Md Omar', 'Faruk', '1716011023.png', 25, 'Bangladeshi', 'Kazipara, Dhaka', '01878469345', 'akomarfci@gmail.com', 'skype', 'whatsapp', 'linkedin', 'facebook', NULL, '[\"Bengali\", \"English\"]', 5, 2000, '#2e1cb5', '<p>I am enthusiastic to take on new and challenging tasks, this is the only way to gain further knowledge. I am skilled in PHP(Laravel, Codeigniter) , cpanel, Whm &amp; Centos .<br></p>', 0, '2024-05-17 23:43:44', '2024-05-17 23:43:44', NULL),
(5, 6, 2, 'Md', 'Shahzada', '1746853893.jpeg', 27, 'Bangladeshi', 'kazipara,Dhaka', '01822222222', 'md.33.shahzada@gmail.com', 'skype', 'whatsapp', 'linkedin', 'facebook', NULL, '[\"Bengali\", \"English\"]', 20, 200, '#ff621f', '<p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>', 0, '2025-05-09 23:11:33', '2025-05-09 23:11:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `stack_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `applied_date` timestamp NULL DEFAULT NULL,
  `vacancy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_requirement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `responsibilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `employee_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `stack_id`, `user_id`, `job_title`, `applied_date`, `vacancy`, `education`, `salary`, `experience`, `additional_requirement`, `responsibilities`, `benefits`, `employee_status`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-13 01:15:49', '2025-05-11 01:15:49'),
(2, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(3, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(4, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(5, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(6, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(7, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(8, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(9, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(10, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(11, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(12, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(13, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(14, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(15, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(16, 1, 11, 'PHP Laravel Developer', '2025-05-10 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '1 to 2 years', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '<ul><li><br></li></ul>', '1', '2025-05-11 01:15:49', '2025-05-11 01:15:49'),
(17, 1, 11, 'PHP Laravel Developer', '2025-05-29 18:00:00', '12', 'Bsc In Computer science', '120000-200000', '3 to 5 Years', '<ul><li>Age 18 to 45 years</li><li>Proficiency in PHP (OOP) and Laravel framework.</li><li>Experience in developing and modifying PHP scripts from scratch.</li><li>Strong skills in MySQL database design, queries, and optimization.</li><li>Familiarity with jQuery or Vue.js (optional but preferred).</li><li>Ideal Candidate: Has hands-on experience building web applications with Laravel. Can write clean, efficient, and maintainable code.</li></ul>', '<ul><li>Develop and maintain web applications using Laravel and related technologies.</li><li>Collaborate with front-end developers to integrate UI/UX designs with backend logic.</li><li>Write clean, scalable, and well-documented PHP code.</li><li>Optimize application performance, security, and scalability.</li><li>Work with databases like MySQL or PostgreSQL, writing efficient queries and ensuring data integrity.</li><li>Implement and maintain RESTful APIs and third-party integrations.</li><li>Debug and resolve application issues and bugs.</li><li>Stay up to date with Laravel updates and best practices.</li><li>Work closely with project managers and other team members to deliver high-quality solutions.</li></ul>', '<ul><li>T/A, Mobile bill, Weekly 2 holidays</li><li>Lunch Facilities: Full Subsidize</li><li>Salary Review: Yearly</li><li>Festival Bonus: 2</li></ul>', '1', '2025-05-12 07:49:55', '2025-05-12 07:49:55'),
(18, 2, 11, 'Python Django Developer', '2025-05-12 18:00:00', '10', 'Bsc In Computer science', '120000-200000', '3 to 5 Years', '<ul><li>Expert in Python, with knowledge of at least one Python web framework {{such as Django, Flask, etc depending on your technology stack}}</li><li>Familiarity with some ORM (Object Relational Mapper) libraries Able to integrate multiple data sources and databases into one system</li><li>Understanding of the threading limitations of Python, and multi-process architecture</li><li>Good understanding of server-side templating languages such as Jinja 2, Mako, etc depending on your technology stack</li><li>Advance level understanding of front-end technologies, such as React Js, HTML5, and CSS3</li><li>Understanding of accessibility and security compliance Knowledge of user authentication and authorization between multiple systems, servers, and environments</li></ul>', '<ul><li>Writing reusable, testable, and efficient code</li><li>Design and implementation of low-latency, high-availability, and performant applications</li><li>Integration of user-facing elements developed by front-end developers with server side logic</li><li>Implementation of 3rd party Api Integration of data storage solutions</li></ul>', '<ul style=\"margin: 5px 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: medium;\"><li style=\"font-size: 14px; color: rgb(51, 51, 51); line-height: 20px;\">Festive Bonus.</li><li style=\"font-size: 14px; color: rgb(51, 51, 51); line-height: 20px;\">Breakfast, Lunch &amp; Evening snacks.</li><li style=\"font-size: 14px; color: rgb(51, 51, 51); line-height: 20px;\">Working with friendly, passionate and experienced teams</li><li style=\"font-size: 14px; color: rgb(51, 51, 51); line-height: 20px;\">Usage of cutting edge technologies</li><li style=\"font-size: 14px; color: rgb(51, 51, 51); line-height: 20px;\">Lots of trainings and courses on our expense !!</li></ul>', '1', '2025-05-12 07:53:21', '2025-05-12 07:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_14_063241_create_information_table', 1),
(5, '2024_04_16_094507_create_skills_table', 1),
(6, '2024_04_16_094834_create_education_table', 1),
(7, '2024_04_16_094931_create_experiences_table', 1),
(8, '2024_05_05_162654_create_projects_table', 1),
(9, '2024_05_05_162722_create_contacts_table', 1),
(10, '2024_04_22_033902_create_permission_tables', 2),
(12, '2025_05_11_053920_add_logo_and_location_columnt_to_users_table', 4),
(13, '2025_05_11_041535_create_job_posts_table', 5),
(14, '2025_05_11_100721_add_is_social_login_to_users_table', 6),
(15, '2025_05_11_051052_create_stakes_table', 7),
(17, '2025_05_11_163157_add_stack_id_to_informations_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `information_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technology` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `information_id`, `title`, `client`, `technology`, `url`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'E-ticket System', 'Railway', 'JavaScript', 'test', 'PR1716001743.png', '2024-05-17 21:09:04', '2024-05-17 21:09:04', NULL),
(2, 3, 3, 'Union Managment software', 'Union', 'PHP, LARAVEL, JAVASCRIPT', 'https://smartup.comillalg.gov.bd/', 'PR1716011508.png', '2024-05-17 23:51:48', '2024-05-17 23:51:48', NULL),
(3, 3, 3, 'Municipality Managment', 'MUnicipality', 'PHP, LARAVEL, JAVASCRIPT', 'https://lgdhaka.com/', 'PR1716011584.png', '2024-05-17 23:53:07', '2024-05-17 23:53:07', NULL),
(4, 2, 2, 'Union Managment system', 'dhaka', 'PHP, Laravel', 'https://lgdhaka.com/', 'PR1746719740.png', '2025-05-08 09:55:40', '2025-05-08 09:55:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5LXRkFn9y3velZD0ACQkMrD3yaubygpLFrDGSVpb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOU5ScHlTYXJnWldFNWx6dllwOUJ5dXRmTFphc2VkaFZpZG5QVllmciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWNydWl0ZXJfcmVnaXN0ZXIiO31zOjU6InN0YXRlIjtzOjQwOiJOUEsxYmZ3RUEzd2I0QnRDMFlqZTRvc08xZHFkNjVRdGtJeloxQk95IjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvam9iX3Bvc3RzLzQiO319', 1746966976),
('b7GFa3Tp7kohmZDP7hSIjrZqeYYbhgqbd2zv3Fzv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVVNVlhPeWxzT2NvTmpIWHJzc2IwaGNMak5SMHJiemFmVXREaXoyWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746986253),
('jaarYxM8hXtYGCbIwKzgctZnpmRw4LGo5CN3tiTZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE16TUxHT0pDQ0w4Y2hsNDJmWXJmNEJGWjRiRm5BWDREYk1hRzlENiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvam9iX3Bvc3QvZXlKcGRpSTZJa3QxWmxSbE1GRklWMUo2WTNKaFEzVTJOMUphVFZFOVBTSXNJblpoYkhWbElqb2lLMGMzYW0xQ01tMDVjMFJNT0RGS1oycFhVbVZQVVQwOUlpd2liV0ZqSWpvaU16ZzRaR1k1WlRrM1ptWTRZakl4WXpSbU1qUTNPR1JrTldVME5UZGxPRFF5TVRrd1kyTmhZbU5oTURZMU1HVXlOMk5tWkdNellqVmtZekV5TW1OaE55SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746985928);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `information_id` bigint UNSIGNED NOT NULL,
  `skill_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `information_id`, `skill_name`, `percentage`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'JAVASCRIPT', '60%', '2024-05-17 21:05:19', '2024-05-17 21:05:19', NULL),
(2, 4, 1, 'PHP', '70%', '2024-05-17 21:06:18', '2024-05-17 21:06:18', NULL),
(3, 4, 1, 'JQUERY', '80%', '2024-05-17 23:41:09', '2024-05-17 23:41:09', NULL),
(4, 3, 3, 'PHP', '80%', '2024-05-17 23:44:05', '2024-05-17 23:44:05', NULL),
(5, 3, 3, 'JQUERY', '70%', '2024-05-17 23:44:18', '2024-05-17 23:44:18', NULL),
(6, 3, 3, 'MYSQL', '70%', '2024-05-17 23:44:30', '2024-05-17 23:44:30', NULL),
(7, 3, 3, 'JAVASCRIPT', '60%', '2024-05-17 23:44:41', '2024-05-17 23:44:41', NULL),
(8, 3, 3, 'BITBUCKET', '50%', '2024-05-17 23:44:55', '2024-05-17 23:44:55', NULL),
(9, 3, 3, 'OOP', '70%', '2024-05-17 23:45:07', '2024-05-17 23:45:07', NULL),
(14, 2, 2, 'PHP', '80%', '2025-05-08 09:52:06', '2025-05-08 09:52:06', NULL),
(15, 2, 2, 'MYSQL', '70%', '2025-05-08 09:52:17', '2025-05-08 09:52:17', NULL),
(16, 6, 5, 'PHP', '70%', '2025-05-09 23:13:53', '2025-05-09 23:13:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stakes`
--

CREATE TABLE `stakes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stakes`
--

INSERT INTO `stakes` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PHP Laravel', 'PHP Laravel', '2025-05-11 12:16:51', '2025-05-11 12:16:51', NULL),
(2, 'Python Django', 'Python Django', '2025-05-11 12:17:13', '2025-05-11 12:17:13', NULL),
(3, 'MERN Stack', 'MERN Stack', '2025-05-11 12:17:36', '2025-05-11 12:17:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `type` tinyint NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_social_login` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `type`, `email_verified_at`, `password`, `remember_token`, `is_social_login`, `created_at`, `updated_at`, `logo`, `location`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 1, '2025-05-11 18:09:34', '$2y$12$yekpa9YEIuqPtqSxI2evAujls5xUq6zbjOLiZQX2gDWfpZM21sXH6', NULL, 0, '2024-05-17 12:42:35', '2024-05-17 12:42:35', NULL, NULL),
(2, 'Kader Shoikot', 'mksoikotbhuiyan117@gmail.com ', NULL, 2, '2025-05-12 13:45:43', '$2y$12$yekpa9YEIuqPtqSxI2evAujls5xUq6zbjOLiZQX2gDWfpZM21sXH6', NULL, 0, '2024-05-17 21:10:38', '2024-05-17 21:10:38', NULL, NULL),
(3, 'Md Omar Faruk', 'akomarfci@gmail.com', NULL, 2, '2025-05-12 13:45:00', '$2y$12$yekpa9YEIuqPtqSxI2evAujls5xUq6zbjOLiZQX2gDWfpZM21sXH6', NULL, 0, '2024-05-18 00:19:59', '2024-05-18 00:19:59', NULL, NULL),
(4, 'Nurul Amin Limon', 'limofpi408@gmail.com', NULL, 2, '2025-05-12 13:45:47', '$2y$12$yekpa9YEIuqPtqSxI2evAujls5xUq6zbjOLiZQX2gDWfpZM21sXH6', NULL, 0, '2024-05-18 00:19:59', '2024-05-18 00:19:59', NULL, NULL),
(6, 'Md Shahzada', 'md.33.shahzada@gmail.com', NULL, 2, '2025-05-12 13:47:11', '$2y$12$WgxeGrVfXwKPp.Shyp45xeOTNAJSwi2qjMPlcZUSUROEcrUUa3R5y', NULL, 0, '2025-05-09 22:57:03', '2025-05-09 22:57:03', NULL, NULL),
(11, 'DTopnotch Solutions', 'dtopnotch1@gmail.com', NULL, 3, '2025-05-11 18:18:10', '$2y$12$O1qqpfoXaZCI7/WksGYZpusA24WNYIRfc2A5g0r4gkjYFV.lmuS8G', NULL, 0, '2025-05-10 23:51:26', '2025-05-10 23:51:26', 'admin/assets/logos/1746942686_dtopnotchsolutions-Logo.png', 'Banani, Dhaka');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_user_id_foreign` (`user_id`),
  ADD KEY `educations_information_id_foreign` (`information_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_user_id_foreign` (`user_id`),
  ADD KEY `experiences_information_id_foreign` (`information_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informations_user_id_foreign` (`user_id`),
  ADD KEY `informations_stake_id_foreign` (`stake_id`);

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
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_posts_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`),
  ADD KEY `projects_information_id_foreign` (`information_id`);

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
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`),
  ADD KEY `skills_information_id_foreign` (`information_id`);

--
-- Indexes for table `stakes`
--
ALTER TABLE `stakes`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stakes`
--
ALTER TABLE `stakes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_information_id_foreign` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_information_id_foreign` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_stake_id_foreign` FOREIGN KEY (`stake_id`) REFERENCES `stakes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_information_id_foreign` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_information_id_foreign` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
