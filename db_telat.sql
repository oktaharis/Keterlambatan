-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 03:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_telat`
--

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
-- Table structure for table `lates`
--

CREATE TABLE `lates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_time_late` datetime NOT NULL,
  `information` text NOT NULL,
  `bukti` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lates`
--

INSERT INTO `lates` (`id`, `date_time_late`, `information`, `bukti`, `created_at`, `updated_at`, `student_id`) VALUES
(6, '2024-01-04 05:37:00', 'telat dikit', '1704321461.jpg', '2024-01-03 15:37:41', '2024-01-03 15:37:41', 7),
(7, '2023-12-31 05:38:00', 'kh', '1704321509.png', '2024-01-03 15:38:29', '2024-01-03 15:38:29', 7),
(8, '2024-01-02 05:38:00', 'laskdj', '1704321529.png', '2024-01-03 15:38:49', '2024-01-03 15:38:49', 7),
(9, '2024-01-04 05:38:00', 'mwehehehe', '1704321555.png', '2024-01-03 15:39:15', '2024-01-03 15:39:15', 5),
(10, '2024-01-04 05:39:00', 'alksjd', '1704321576.png', '2024-01-03 15:39:36', '2024-01-03 15:39:36', 6),
(11, '2024-01-04 05:43:00', 'yondaktau', '1704321815.png', '2024-01-03 15:43:35', '2024-01-03 15:43:35', 8);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_13_141036_create_students_table', 1),
(6, '2023_12_13_141054_create_rombels_table', 1),
(7, '2023_12_13_141101_create_rayons_table', 1),
(8, '2023_12_13_141131_create_lates_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `rayons`
--

CREATE TABLE `rayons` (
  `id` int(10) UNSIGNED NOT NULL,
  `rayon` varchar(255) NOT NULL,
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rayons`
--

INSERT INTO `rayons` (`id`, `rayon`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'cicurug 5', '2', '2024-01-02 01:29:21', '2024-01-02 01:29:21'),
(2, 'cicurug 6', '3', '2024-01-02 01:30:03', '2024-01-02 01:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `rombels`
--

CREATE TABLE `rombels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rombel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombels`
--

INSERT INTO `rombels` (`id`, `rombel`, `created_at`, `updated_at`) VALUES
(1, 'PPLG X-2', '2024-01-02 01:28:09', '2024-01-02 01:28:09'),
(2, 'PPLG X-1', '2024-01-02 01:28:21', '2024-01-02 01:28:21'),
(3, 'PPLG X-3', '2024-01-03 02:32:30', '2024-01-03 02:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rombel_id` char(36) NOT NULL,
  `rayon_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nis`, `name`, `rombel_id`, `rayon_id`, `created_at`, `updated_at`) VALUES
(5, '12209331', 'Okta Haris Sutanto', '1', '1', '2024-01-03 15:36:22', '2024-01-03 15:36:22'),
(6, '12208939', 'apri haris prihartanto', '3', '1', '2024-01-03 15:36:38', '2024-01-03 15:36:38'),
(7, '12209332', 'Sri Haris Susanti', '2', '2', '2024-01-03 15:37:00', '2024-01-03 15:37:00'),
(8, '12209129', 'kepin', '3', '2', '2024-01-03 15:42:33', '2024-01-03 15:42:33');

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
  `role` enum('admin','ps') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administator', 'admin@gmail.com', NULL, '$2y$12$QhA4lZ3H4Mgfyoc1u5agi.ogoLGzUzQhOjKGZ1Q3iR558EVQRFZP6', 'admin', NULL, '2024-01-02 01:02:47', '2024-01-02 19:48:22'),
(2, 'Pembimbing Cic 5', 'cic5@gmail.com', NULL, '$2y$12$uK9t9Zn4q/xN0CbsqZ2Rfu0pj.VEv8JnXlrjDb4nsambQyuCb8fEG', 'ps', NULL, '2024-01-02 01:29:01', '2024-01-02 07:34:27'),
(3, 'Pembimbing Cic 6', 'cic6@gmail.com', NULL, '$2y$12$8j4ytOgbMUDZWDiTMmWWBOj4HWEsIVsKkqS4WwBOTYcW7LNdyyH4i', 'ps', NULL, '2024-01-02 01:29:54', '2024-01-02 07:34:17'),
(4, 'Okta Haris Sutanto', 'okta@gmail.com', NULL, '$2y$12$5hmh6ulbP77yTBU3m097q.XKiJyttjr.sY8mjyIyl45ivgCn4eJUG', 'ps', NULL, '2024-01-03 21:37:38', '2024-01-03 21:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lates`
--
ALTER TABLE `lates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lates_student_id_foreign` (`student_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rayons`
--
ALTER TABLE `rayons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombels`
--
ALTER TABLE `rombels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lates`
--
ALTER TABLE `lates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rayons`
--
ALTER TABLE `rayons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rombels`
--
ALTER TABLE `rombels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lates`
--
ALTER TABLE `lates`
  ADD CONSTRAINT `lates_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
