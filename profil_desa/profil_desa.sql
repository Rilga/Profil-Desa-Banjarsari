-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2025 at 07:55 AM
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
-- Database: `profil_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` json DEFAULT NULL,
  `dibaca` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('banjarsari_cache_user@banjarsari.com|127.0.0.1', 'i:1;', 1754237372),
('banjarsari_cache_user@banjarsari.com|127.0.0.1:timer', 'i:1754237372;', 1754237372);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sayuran', 'sayuran', '2025-08-07 00:39:35', '2025-08-07 00:39:35'),
(2, 'Buah-buahan', 'buah-buahan', '2025-08-07 00:39:35', '2025-08-07 00:39:35'),
(3, 'Kerajinan Tangan', 'kerajinan-tangan', '2025-08-07 00:39:35', '2025-08-07 00:39:35'),
(4, 'Makanan Olahan', 'makanan-olahan', '2025-08-07 00:39:35', '2025-08-07 00:39:35'),
(5, 'Minuman', 'minuman', '2025-08-07 00:39:35', '2025-08-07 00:39:35'),
(6, 'Jasa', 'jasa', '2025-08-07 00:39:35', '2025-08-07 00:39:35');

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
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` bigint UNSIGNED NOT NULL,
  `sekilas_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `sekilas_info`, `created_at`, `updated_at`) VALUES
(1, 'Desa Banjarsari akan mengadakan Musyawarah Warga pada tanggal 15 Juli 2025 pukul 09.00 WIB di Balai Desa. Hadir tepat waktu ya!', '2025-07-10 09:35:13', '2025-07-10 09:35:13'),
(2, 'Desa Banjarsari akan mengadakan Lomba 17 Agustus pada tanggal 17 Agustus 2025 pukul 09.00 WIB di Balai Desa. Hadir tepat waktu ya!', '2025-07-10 09:35:48', '2025-07-10 09:36:01');

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
(4, '2025_07_05_150336_create_beritas_table', 1),
(5, '2025_07_10_151501_create_sambutan_table', 2),
(6, '2025_07_10_151506_create_info_table', 2),
(7, '2025_08_05_084939_create_products_table', 3),
(8, '2025_08_05_092721_add_category_tags_seller_to_products_table', 3),
(9, '2025_08_05_094417_create_categories_table', 3),
(10, '2025_08_05_094528_add_category_id_to_products_table', 3),
(11, '2025_08_06_101357_remove_category_from_products_table', 3),
(12, '2025_08_07_072927_change_shoppee_column_to_text_in_products_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shoppee` text COLLATE utf8mb4_unicode_ci,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `seller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `image`, `shoppee`, `whatsapp`, `tags`, `seller`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Minuman 1', 'minuman-1', 'wkwkwk2', '16000.00', 'public/products/dVwUtsF3yovyjhIgIdG4tAllqdWNl5Kn8uhl15Il.png', 'https://shopee.co.id/ADVAN-Smartwatch-SR-Ai-Voice-Assistant-Amoled-Display-1.43-Bluetooth-Call-Waterproof-IP68-i.919692407.27371321086?sp_atk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&uls_trackid=52cs2pm500vi&utm_campaign=-&utm_content=190478-20ec785fe8b643888d8d1641d287d15d--103102&utm_medium=affiliates&utm_source=an_11186370000&utm_term=ct8z3ooceezj&xptdk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&is_from_login=true', '6285333947309', '\"Sehat, Enak, Viral\"', 'Theo', '2025-08-07 00:41:01', '2025-08-07 00:41:01', 5),
(2, 'Minuman 2', 'minuman-2', 'wwkwk3', '17000.00', 'public/products/2Oa1RzWgMzrINy1EfBwvPF86NZanBqGxG4Gs9wWq.png', 'https://shopee.co.id/ADVAN-Smartwatch-SR-Ai-Voice-Assistant-Amoled-Display-1.43-Bluetooth-Call-Waterproof-IP68-i.919692407.27371321086?sp_atk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&uls_trackid=52cs2pm500vi&utm_campaign=-&utm_content=190478-20ec785fe8b643888d8d1641d287d15d--103102&utm_medium=affiliates&utm_source=an_11186370000&utm_term=ct8z3ooceezj&xptdk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&is_from_login=true', '6285333947309', '\"Sehat, Enak, Viral\"', 'Theo Pasqualito', '2025-08-07 00:41:27', '2025-08-07 00:41:27', 5),
(3, 'Minuman 3', 'minuman-3', 'wwkwkk44', '10000.00', 'public/products/Z5sIWb9agGOfJxMEQN7TugORzMdvAURhPl5HuHeo.jpg', 'https://shopee.co.id/ADVAN-Smartwatch-SR-Ai-Voice-Assistant-Amoled-Display-1.43-Bluetooth-Call-Waterproof-IP68-i.919692407.27371321086?sp_atk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&uls_trackid=52cs2pm500vi&utm_campaign=-&utm_content=190478-20ec785fe8b643888d8d1641d287d15d--103102&utm_medium=affiliates&utm_source=an_11186370000&utm_term=ct8z3ooceezj&xptdk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&is_from_login=true', '6285333947309', '\"Sehat, Enak, Viral\"', 'Theo', '2025-08-07 00:42:02', '2025-08-07 00:42:02', 5),
(4, 'Jasa 1', 'jasa-1', 'woaokwaok', '100000.00', 'public/products/95abW6ZmqFmWWZ15yjU5OfObMqRnTelZGIjafjyU.png', 'https://shopee.co.id/ADVAN-Smartwatch-SR-Ai-Voice-Assistant-Amoled-Display-1.43-Bluetooth-Call-Waterproof-IP68-i.919692407.27371321086?sp_atk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&uls_trackid=52cs2pm500vi&utm_campaign=-&utm_content=190478-20ec785fe8b643888d8d1641d287d15d--103102&utm_medium=affiliates&utm_source=an_11186370000&utm_term=ct8z3ooceezj&xptdk=13f8f688-226b-4714-b7a8-8f4c357e8cd4&is_from_login=true', '6285333947309', '\"Sehat, Enak, Viral\"', 'Theo', '2025-08-07 00:42:27', '2025-08-07 00:42:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kepala_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sambutan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id`, `nama_kepala_desa`, `sambutan`, `foto`, `created_at`, `updated_at`) VALUES
(1, '-- AHMAD ZAENURI, KEPALA DESA Banjarsari --', 'Assalamu\'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera. Selamat datang di website resmi Desa Banjarsari. Sebagai Kepala Desa, saya [Nama Kepala Desa], berkomitmen penuh untuk menghadirkan informasi desa yang transparan dan mudah diakses melalui platform ini. Kami berharap website ini dapat menjadi sarana komunikasi dan kolaborasi efektif dalam mewujudkan Desa [Nama Desa] yang maju dan sejahtera. Saran dan masukan konstruktif senantiasa kami nantikan. Wassalamu\'alaikum Warahmatullahi Wabarakatuh.', 'sambutan/X5id4Oq66bX7iKhm0xHFIz5G0nX8CYLaQmxHBY9J.png', '2025-07-10 08:39:59', '2025-07-10 08:39:59');

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
('zU9Xkgi8Z97XdCwEilkIBIHq3saIm6Ajk0k0q6pl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0Q5MjZtQk1nTnRPbVlXZVJ4dGRGMkVSZFd5OVY1RG5mWjdvVGJocSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rYXRhbG9nIjt9fQ==', 1754553276);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin@banjarsari.com', 'admin', '2025-08-04 05:40:05', '$2y$12$HklAzdD1JOnzLbKY8nDlT.YZIyGcH.h.mKMazTBU/ZSPw4WxLU7Jq', 'cY0FNZYUyn', '2025-08-04 05:40:05', '2025-08-04 05:40:05'),
(5, 'AdminProduk', 'admin2@banjarsari.com', 'user', '2025-08-04 05:40:05', '$2y$12$8luJqfpHdvZP/LCckG44fuI6vb6yr6wFkVSMDdx0zQ9VQmq9Rlh7q', 'qJNBhMGNlDXctnWbOgYkOwDV0v0QI3poeoCQEUDiOFy0q1SpID3JzXMZsCjJ', '2025-08-04 05:40:05', '2025-08-04 05:40:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_user_id_foreign` (`user_id`);

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
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
