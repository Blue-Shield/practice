-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 02:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxmale`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bhubaneswar', '2021-04-07 23:56:49', '2021-04-08 00:30:06'),
(5, 'Banglore', '2021-04-09 07:43:29', '2021-04-09 07:43:29');

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
-- Table structure for table `galleryimages`
--

CREATE TABLE `galleryimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleryimages`
--

INSERT INTO `galleryimages` (`id`, `user_id`, `image_name`, `created_at`, `updated_at`) VALUES
(2, 11, '1617974362.1jpg', '2021-04-09 07:49:22', '2021-04-09 07:49:22'),
(3, 11, '1617974362.2jpg', '2021-04-09 07:49:22', '2021-04-09 07:49:22'),
(4, 11, '1617974362.3jpg', '2021-04-09 07:49:22', '2021-04-09 07:49:22'),
(6, 8, '1618203763.1jpg', '2021-04-11 23:32:43', '2021-04-11 23:32:43'),
(7, 8, '1618203763.2jpg', '2021-04-11 23:32:43', '2021-04-11 23:32:43'),
(8, 8, '1618205506.0jpg', '2021-04-12 00:01:46', '2021-04-12 00:01:46'),
(9, 8, '1618205506.1jpg', '2021-04-12 00:01:46', '2021-04-12 00:01:46'),
(10, 8, '1618205507.2jpg', '2021-04-12 00:01:47', '2021-04-12 00:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `masseurs`
--

CREATE TABLE `masseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnicity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bodytype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eyecolor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haircolor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `massage_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `profile_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT 'dummy.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masseurs`
--

INSERT INTO `masseurs` (`id`, `name`, `email`, `mobile`, `user_id`, `ethnicity`, `bodytype`, `eyecolor`, `haircolor`, `website`, `city`, `pin`, `address`, `pricing`, `languages`, `services`, `massage_for`, `description`, `created_at`, `updated_at`, `dob`, `height`, `profile_image`) VALUES
(1, 'Anshu..', 'anshu@gmail.com', '8093664645', '8', 'hispanic', 'volupious', 'hazel', 'red', 'hellow.com', 'Banglore', 752102, 'Andilo, Balianta, Khurdha, 752102', '{\"thirty_mins_in\":\"120\",\"sixty_mins_in\":\"140\",\"ninty_mins_in\":\"140\",\"hundredtwenty_mins_in\":\"150\",\"thirty_mins_out\":\"160\",\"sixty_mins_out\":\"170\",\"ninty_mins_out\":\"200\",\"hundredtwenty_mins_out\":\"400\"}', '[\"Arabic\",\"Chinese\",\"English\",\"French\",\"German\",\"Italian\",\"Portuguese\",\"Russian\",\"Spanish\"]', '[\"Hot Stone\",\"Reflexology\",\"Deep Tissue\",\"Sensual Massage\",\"Sport Massage\",\"Gay Friendly\",\"Tantric Massage\",\"Thai Massage\"]', 'men', 'Lorem ipsum dolor sit, amet Lorem ipsum dolor sit, ametLorem ipsum dolor sit, amet', '2021-04-08 06:47:49', '2021-04-08 06:47:49', '1997-01-05', '6.20', '1618205264.jpg'),
(3, NULL, NULL, NULL, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09 07:13:36', '2021-04-09 07:13:36', NULL, NULL, '1617972266.jpg');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2021_04_08_052225_create_cities_table', 2),
(5, '2021_04_08_074848_create_table_masseurs', 3),
(6, '2021_04_08_101441_create_table_masseurs', 4),
(7, '2021_04_09_105105_create_galleryimages_table', 5);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(5) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sk Alli', '7978412803', 'anshu@gmail.com', NULL, '$2y$10$kql0vESchdTsR.BEKr313euGmzaUN5xv2Mi5Uup8VyxN4iE9feL6q', 0, NULL, '2021-04-07 05:58:25', '2021-04-07 05:58:25'),
(8, 'Hellow', '9879979797', 'hellow@gmail.com', NULL, '$2y$10$kag5m9LCfT4iKy/UUuiYoOamCaqmclUwTUsDlT3mW35yzRgFivtW6', 1, NULL, '2021-04-08 06:47:49', '2021-04-08 06:47:49'),
(11, 'Hitesh Rout', '7978412803', 'hitesh@gmail.com', NULL, '$2y$10$J9rEDgaF74YOSDxBScf.3unEtz5Fj8yZckl0JCJwJ3OGeHt71CU8K', 1, NULL, '2021-04-09 07:13:36', '2021-04-09 07:13:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleryimages`
--
ALTER TABLE `galleryimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masseurs`
--
ALTER TABLE `masseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleryimages`
--
ALTER TABLE `galleryimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `masseurs`
--
ALTER TABLE `masseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
