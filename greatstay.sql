-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2018 at 10:54 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.2.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greatstay`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `bhk` int(11) NOT NULL,
  `cost_per_day` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `addr`, `bhk`, `cost_per_day`, `o_id`, `location_id`, `updated_at`, `created_at`, `verified`, `description`) VALUES
(1, 'c-15 rahul road', 2, 20, 3, 3, '2018-10-21', '2018-10-17', 1, ''),
(2, 'c-16 lavanya', 2, 30, 3, 3, '2018-10-21', '2018-10-17', 1, ''),
(3, '888', 2, 20, 3, 1, '2018-10-17', '2018-10-17', 0, ''),
(4, 'asdasdasd', 1, 1, 2, 1, '2018-10-21', '2018-10-20', 1, 'asdasdasd'),
(5, 'asdasdasd', 1, 1, 2, 1, '2018-10-21', '2018-10-20', 1, 'asdasdasd'),
(6, 'asdasdasd', 1, 1, 2, 1, '2018-10-20', '2018-10-20', 0, 'asdasdasd'),
(7, 'asdasdasd', 1, 1, 2, 1, '2018-10-20', '2018-10-20', 0, 'asdasdasd'),
(8, 'asdasdasd', 1, 1, 2, 1, '2018-10-20', '2018-10-20', 1, 'asdasdasd'),
(9, 'asdasdasd', 1, 1, 2, 1, '2018-10-21', '2018-10-20', 1, 'asdasdasd'),
(10, 'asdasdasd', 11, 1010, 2, 3, '2018-10-21', '2018-10-20', 1, 'asdasdasdadasd'),
(11, 'asdasdasdasd', 2, 123, 2, 2, '2018-10-21', '2018-10-20', 1, 'asdadasdasd'),
(12, 'asdasdasdasdasd', 1, 1, 2, 1, '2018-10-20', '2018-10-20', 0, '3wetsergtergdgxdgbvdg'),
(13, 'asdasdasdasdasd', 1, 1, 2, 1, '2018-10-20', '2018-10-20', 0, '3wetsergtergdgxdgbvdg'),
(14, 'asdasdasd', 1, 1, 2, 1, '2018-10-20', '2018-10-20', 0, 'asdasdqweqsdas');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_documents`
--

CREATE TABLE `apartment_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartment_documents`
--

INSERT INTO `apartment_documents` (`id`, `a_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 9, '9_doc_150013_1540044134.png', NULL, NULL),
(2, 10, '10_doc_150017_1540044194.jpg', NULL, NULL),
(3, 10, '10_doc_150015_1540044194.jpg', NULL, NULL),
(4, 10, '10_doc_150016_1540044194.jpg', NULL, NULL),
(5, 11, '11_doc_150012_1540053127.jpg', NULL, NULL),
(6, 14, '14_doc_150022_1540053443.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_images`
--

CREATE TABLE `apartment_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartment_images`
--

INSERT INTO `apartment_images` (`id`, `a_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 9, '9_img_150017_1540044134.jpg', NULL, NULL),
(3, 10, '10_img_150005_1540044194.jpg', NULL, NULL),
(4, 10, '10_img_150006_1540044194.jpg', NULL, NULL),
(5, 10, '10_img_150008_1540044194.jpg', NULL, NULL),
(6, 11, '11_img_150010_1540053127.jpg', NULL, NULL),
(7, 11, '11_img_150019_1540053127.jpg', NULL, NULL),
(8, 11, '11_img_150015_1540053127.jpg', NULL, NULL),
(9, 14, '14_img_150020_1540053443.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE `attraction` (
  `id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `f_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `d_id` int(10) UNSIGNED NOT NULL,
  `a_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`d_id`, `a_id`, `o_id`, `c_id`, `check_in`, `check_out`, `duration`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 4, '2018-10-23', '2018-10-22', 1, '2018-10-21 10:05:50', '2018-10-21 10:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `fdate` char(10) NOT NULL,
  `airline` varchar(255) NOT NULL,
  `f_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`) VALUES
(1, 'Mumbai'),
(2, 'Bangkok'),
(3, 'Singapore');

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
(3, '2018_10_17_181332_create_notifications_table', 2),
(4, '2018_10_18_031500_create_notifications_table', 3),
(7, '2018_10_18_050410_create_deals_table', 4),
(8, '2018_10_18_145058_create_reviews_table', 5),
(9, '2018_10_19_160436_create_apartment_images_table', 6),
(10, '2018_10_20_031542_add_admin_column_to_users_table', 7),
(11, '2018_10_20_035035_add_verified_column_to_apartment', 8),
(12, '2018_10_20_035401_add_description_column_to_apartment_table', 9),
(13, '2018_10_20_042857_create_apartment_documents_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('115aa7fe-289d-423d-8f0c-fdb03be80ef5', 'App\\Notifications\\OwnerDealApartment', 'App\\User', 3, '{"message":"A client is looking to book your apartment!","d_id":16}', NULL, '2018-10-18 01:17:07', '2018-10-18 01:17:07'),
('35e988af-eaa9-4795-9cc7-457ca53b77e8', 'App\\Notifications\\OwnerDealApartment', 'App\\User', 3, '{"message":"A client is looking to book your apartment!","d_id":15}', NULL, '2018-10-18 01:16:53', '2018-10-18 01:16:53'),
('7bbaf835-017f-4b47-913d-c5f480ca562f', 'App\\Notifications\\OwnerDealApartment', 'App\\User', 3, '{"message":"A client is looking to book your apartment!","d_id":null}', NULL, '2018-10-18 01:06:43', '2018-10-18 01:06:43'),
('801fc6cf-53f3-4236-a206-11ea7edd6c1d', 'App\\Notifications\\OwnerDealApartment', 'App\\User', 3, '{"message":"A client is looking to book your apartment!","d_id":14}', NULL, '2018-10-18 01:16:02', '2018-10-18 01:16:02'),
('d63c8bb8-7f65-4267-bf9d-182fa2d1115a', 'App\\Notifications\\OwnerDealApartment', 'App\\User', 3, '["A client is looking to book your apartment!"]', NULL, '2018-10-18 01:00:31', '2018-10-18 01:00:31'),
('f0bb3663-db05-4ba4-bbaa-cd3c7dbf2b05', 'App\\Notifications\\OwnerDealApartment', 'App\\User', 3, '{"message":"A client is looking to book your apartment!"}', NULL, '2018-10-18 01:01:48', '2018-10-18 01:01:48');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `a_id`, `c_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'adasasdasdasd', 1, '2018-10-19 11:54:34', '2018-10-19 11:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dob` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `dob`, `name`, `country`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, '2018-10-16', 'jaskaran', 'india', 'abcd@gmail.com', NULL, '$2y$10$Xs826hlS//YxBKWeCDWg0uvckNZD8HIecjzjN96LeuWOcDaYydIMq', '4GVoClHyjJhOTwaSk7vpdoSZLk7vhhNipDHAX0egvkUOLtVQhoKyTtY8cgDS', '2018-10-15 10:14:30', '2018-10-15 10:14:30', 1),
(2, '2018-10-02', 'jaskaran', 'asdasdasd', 'asdasd@gmail.com', NULL, '$2y$10$vM4CwthfvO.z0I/d917c6.dANpa65sty9M7h16z2y2abvg5X66wnm', '5vqWMWNqVo7TOaGSNl9rAJqnydlEpS40W69m9KUCErApMQ9hDkpd61pAQU9b', '2018-10-17 10:15:45', '2018-10-17 10:15:45', 0),
(3, '1998-08-08', 'owner', 'India', 'owner@gmail.com', NULL, '$2y$10$z8WqkNAbEO/dsy7DCdLIruvaslxvaPP8KFKW7C8cK1c302LlyFkoK', 'CDKphYRUlWITF1LyXVMXcpWQx0vpFEBk8jiovkVcJT2295NDqy5E15GKlpRx', '2018-10-17 10:46:32', '2018-10-17 10:46:32', 0),
(4, '2018-10-10', 'client', 'India', 'client@gmail.com', NULL, '$2y$10$Rn8hmpAvLSEvvmcOEps/fuJVb6NGu5.YBB70RgJ6AFBUkXUJJ0742', 'ro76PPs7wWamQuMqd0HEy0NhdnMYcSZFAgpj42eivq2e4XFfhIJJdS8fQiNa', '2018-10-17 10:48:06', '2018-10-17 10:48:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `phone` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `location_id_change` (`location_id`);

--
-- Indexes for table `apartment_documents`
--
ALTER TABLE `apartment_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_documents_a_id_foreign` (`a_id`);

--
-- Indexes for table `apartment_images`
--
ALTER TABLE `apartment_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_images_a_id_foreign` (`a_id`);

--
-- Indexes for table `attraction`
--
ALTER TABLE `attraction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`,`f_no`),
  ADD KEY `f_no` (`f_no`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `deals_o_id_foreign` (`o_id`),
  ADD KEY `deals_c_id_foreign` (`c_id`),
  ADD KEY `deals_a_id_foreign` (`a_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`f_no`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_a_id_foreign` (`a_id`),
  ADD KEY `reviews_c_id_foreign` (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD PRIMARY KEY (`phone`,`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment_documents`
--
ALTER TABLE `apartment_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `apartment_images`
--
ALTER TABLE `apartment_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `d_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `location_id_change` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `apartment_documents`
--
ALTER TABLE `apartment_documents`
  ADD CONSTRAINT `apartment_documents_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `apartment` (`id`);

--
-- Constraints for table `apartment_images`
--
ALTER TABLE `apartment_images`
  ADD CONSTRAINT `apartment_images_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `apartment` (`id`);

--
-- Constraints for table `attraction`
--
ALTER TABLE `attraction`
  ADD CONSTRAINT `attraction_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `apartment` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`f_no`) REFERENCES `flight` (`f_no`);

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `apartment` (`id`),
  ADD CONSTRAINT `deals_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `deals_o_id_foreign` FOREIGN KEY (`o_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `apartment` (`id`),
  ADD CONSTRAINT `reviews_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
