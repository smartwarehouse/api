-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 02:02 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smw`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(10) UNSIGNED NOT NULL,
  `location_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'A290', 'Jalan Sudirman no 30', NULL, NULL),
(2, 'B896', 'Jalan Patimmura no 39', NULL, NULL),
(3, 'A279', 'Jalan Hatta no 30', NULL, NULL),
(4, 'N68', 'Jalan Soekarno no 86', NULL, NULL),
(5, 'H875', 'Jalan Bung Hatta no 65', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(10) UNSIGNED NOT NULL,
  `material_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfid` int(10) UNSIGNED NOT NULL,
  `location` int(10) UNSIGNED NOT NULL,
  `material_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `material_code`, `name`, `qty`, `image`, `rfid`, `location`, `material_category`, `created_at`, `updated_at`) VALUES
(1, '2872', 'Sabun Lifeboy', 897, 'sabunlifeboy.jpg', 1, 3, 1, NULL, NULL),
(2, '6757', 'Shampo Head', 87, 'shampohead.jpg', 4, 4, 3, NULL, NULL),
(3, '786', 'Sabun Lux', 76, 'sabunlux.jpg', 2, 4, 1, NULL, NULL),
(4, '1667', 'Sabun Dettol', 768, 'dettol.jpg', 4, 1, 1, NULL, NULL),
(5, '657', 'Baju Karunia Muslim', 276, 'karunia.jpg', 3, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_category`
--

CREATE TABLE `material_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_category`
--

INSERT INTO `material_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sabun', 'sabun cair', NULL, NULL),
(2, 'detergen', 'detergen wangi', NULL, NULL),
(3, 'shampo', 'shampo wangi', NULL, NULL),
(4, 'pasta gigi', 'pasta gigi bikin gigi putih', NULL, NULL),
(5, 'baju muslim', 'baju muslim cocok untuk wanita berhijab', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_statistic`
--

CREATE TABLE `material_statistic` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `material` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_statistic`
--

INSERT INTO `material_statistic` (`id`, `qty`, `type`, `user`, `material`, `created_at`, `updated_at`) VALUES
(1, 86, '1', 2, 3, NULL, NULL),
(2, 757, '2', 1, 3, NULL, NULL),
(3, 657, '3', 4, 1, NULL, NULL),
(4, 65, '3', 3, 4, NULL, NULL),
(5, 43, '4', 5, 3, NULL, NULL);

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
(1, '2018_09_21_111111_create_roles_table', 1),
(2, '2018_09_21_111112_create_rfid_table', 1),
(3, '2018_09_21_111113_create_material_category_table', 1),
(4, '2018_09_21_111114_create_location_table', 1),
(5, '2018_09_21_111115_create_type_table', 1),
(6, '2018_09_21_114228_create_users_table', 1),
(7, '2018_09_24_043000_create_material_table', 1),
(8, '2018_09_24_043051_create_material_statistic_table', 1),
(9, '2018_09_24_043201_create_notification_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfid_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`id`, `rfid_code`, `created_at`, `updated_at`) VALUES
(1, '265', NULL, NULL),
(2, '788', NULL, NULL),
(3, '467', NULL, NULL),
(4, '6757', NULL, NULL),
(5, '654', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sembarang', NULL, NULL),
(2, 'hrd', 'human resource department', NULL, NULL),
(3, 'we', 'warehouse employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Barang Masuk', 'banyaknya data yang masuk di gudang', NULL, NULL),
(2, 'Barang Keluar', 'banyaknya data yang keluar di gudang', NULL, NULL),
(3, 'Barang Return', 'banyaknya barang return di gudang', NULL, NULL),
(4, 'Barang Kosong', 'banyaknya barang kosong yang ada di gudang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone_number`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nadila wirdatul', 'nadilawh0@gmail.com', 896896, '$2y$10$FTTwCe9uqMsdKI56rIaAzua1JDx5PAHoIsJfHdZfdMgn3/heiu6Mi', 1, '37zOZLrh0aMMUmwLhAuR6JaDePMseTpdHvcBZWSmF5LBHa06Y89QFcbhE1mf', '2018-10-02 15:57:55', '2018-10-02 15:57:55'),
(2, 'Efriza Luluk', 'luluk@gmail.com', 82862762, 'efriza', 2, NULL, NULL, NULL),
(3, 'Fatkul Nur', 'fatkul@gmail.com', 8287628, 'fatkul', 3, NULL, NULL, NULL),
(4, 'Nasrulloh Muhyiddin', 'nasrul@gmail.com', 89282, 'nasrul', 1, NULL, NULL, NULL),
(5, 'Rizka Rahayu', 'rizka@gmail.com', 89279872, 'rizka', 2, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_rfid_foreign` (`rfid`),
  ADD KEY `material_location_foreign` (`location`),
  ADD KEY `material_material_category_foreign` (`material_category`);

--
-- Indexes for table `material_category`
--
ALTER TABLE `material_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_statistic`
--
ALTER TABLE `material_statistic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_statistic_user_foreign` (`user`),
  ADD KEY `material_statistic_material_foreign` (`material`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_material_foreign` (`material`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_foreign` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_category`
--
ALTER TABLE `material_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_statistic`
--
ALTER TABLE `material_statistic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_location_foreign` FOREIGN KEY (`location`) REFERENCES `location` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_material_category_foreign` FOREIGN KEY (`material_category`) REFERENCES `material_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_rfid_foreign` FOREIGN KEY (`rfid`) REFERENCES `rfid` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_statistic`
--
ALTER TABLE `material_statistic`
  ADD CONSTRAINT `material_statistic_material_foreign` FOREIGN KEY (`material`) REFERENCES `material` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_statistic_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_material_foreign` FOREIGN KEY (`material`) REFERENCES `material` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
