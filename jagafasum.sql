-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 06:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jagafasum`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `citizen_id` char(16) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`citizen_id`, `name`, `address`, `telephone`) VALUES
('172834', 'Steven', 'Sidoarjo', ''),
('2798880729352657', 'Charlie Davis', '789 Oak St, City C', ''),
('3432716489786017', 'Ethan Brown', '202 Pine St, City E', ''),
('3865437106130692', 'Bob Smith', '456 Elm St, City B', ''),
('6498272684953268', 'Alice Johnson', '123 Main St, City A', ''),
('9349519505506898', 'Diana White', '101 Maple St, City D', '');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `contribution_id` int(11) NOT NULL,
  `citizen_id` char(16) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `contribution_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `citizen_id`, `username`, `contribution_date`) VALUES
(1, '6498272684953268', 'e.jones', '2024-01-15'),
(2, '3865437106130692', 'm.green', '2024-01-20'),
(3, '2798880729352657', 'a.taylor', '2024-02-05'),
(4, '9349519505506898', 'r.clark', '2024-02-10'),
(5, '3432716489786017', 'l.martin', '2024-02-15'),
(6, '6498272684953268', 'm.green', '2024-03-01'),
(7, '3865437106130692', 'e.jones', '2024-03-10'),
(8, '2798880729352657', 'r.clark', '2024-03-15'),
(9, '9349519505506898', 'a.taylor', '2024-03-20'),
(10, '3432716489786017', 'l.martin', '2024-03-25'),
(11, '172834', 'a.taylor', '2024-11-05'),
(12, '172834', 'l.martin', '2024-11-12'),
(14, '6498272684953268', 's.steven', '2024-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `contribution_product`
--

CREATE TABLE `contribution_product` (
  `contribution_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contribution_product`
--

INSERT INTO `contribution_product` (`contribution_id`, `product_id`, `amount`) VALUES
(1, 1, 2),
(1, 2, 1),
(1, 3, 4),
(2, 4, 1),
(2, 5, 2),
(2, 6, 1),
(3, 7, 3),
(3, 8, 1),
(3, 9, 2),
(3, 10, 1),
(3, 11, 10),
(4, 1, 5),
(4, 2, 1),
(4, 3, 3),
(5, 4, 2),
(5, 5, 4),
(6, 6, 1),
(6, 7, 3),
(6, 8, 2),
(7, 9, 2),
(7, 10, 1),
(8, 1, 4),
(8, 2, 2),
(9, 3, 1),
(9, 4, 3),
(9, 5, 1),
(10, 6, 2),
(10, 7, 1),
(10, 8, 3),
(11, 1, 1),
(12, 2, 6),
(12, 9, 1),
(14, 2, 4),
(14, 3, 2),
(14, 6, 1),
(14, 8, 2),
(14, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_accounts`
--

CREATE TABLE `employee_accounts` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`username`, `email`, `name`) VALUES
('a.taylor', 'a.taylor@email.com', 'Anna Taylor'),
('e.jones', 'e.jones@email.com', 'Emily Jones'),
('l.martin', 'l.martin@email.com', 'Laura Martin'),
('m.green', 'm.green@email.com', 'Michael Green'),
('r.clark', 'r.clark@email.com', 'Robert Clark'),
('s.steven', 'stevnathar@gmail.com', 'Steven');

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
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(34, '2019_08_19_000000_create_failed_jobs_table', 1),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2024_09_11_063504_create_types_table', 1),
(37, '2024_09_11_063856_create_places_table', 1),
(38, '2024_09_11_064806_update_places_table', 1),
(39, '2024_09_11_064812_update_types_table', 1),
(40, '2024_09_11_071129_add_typeid_place_table', 1),
(41, '2024_09_14_135226_create_tickets_table', 1),
(42, '2024_09_14_135523_update_tickets_table', 1),
(43, '2024_09_14_140446_add_placeid_tickets_table', 2),
(44, '2024_10_09_083450_update_tickets_table', 2);

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
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `latitude` double(8,3) NOT NULL,
  `longtitude` double(8,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `created_at`, `updated_at`, `name`, `description`, `address`, `postcode`, `city`, `province`, `latitude`, `longtitude`, `image`, `type_id`) VALUES
(1, NULL, NULL, 'Pheurn2sxtqXIsPwGPZe', 'BpcQXQFBYdLET323lto7yytHwEueinHwYOAvl1o3', 'axGk6c70hqJgydFdh1OgnnSjkP65P6sJBj5QuIid', 15612, 'PymMn30sDFrHD3JSEeFBeRmTRSu6esFlesgeQuqR', 'lXim7gVGIbKdhosquF1PgxaoXrpTTBJ1aVdp06dL', -51.303, 65.149, '1.jpg', 2),
(2, NULL, NULL, 'gTobHjhFjlpLDxjcBIIV', 'gbekkiqtj12fpFVsjkOSbTecEBXpbaK0ZPXr7JvP', '5PRfBAa917OAKXFxK5TC0mzBuyMpbDRumlk8y3TH', 12173, 'Uw6Zreu1RWrmH8cN0mXXSwMTeoVCDy6JqIwYhUoM', 'wlM9DVdcpzWkkHUcDN6SebV2PRCCaDlvZJdGtzYM', -5.942, -56.149, '2.jpg', 1),
(3, NULL, NULL, 'qje3a4UMR3J0rPo8VtkW', 'CX8WXhoVDkeCbwRoWzqxNEMHJzh66d3QSnJf2t6S', 'B37mucx7F5iXFutaX4S0Tf1bX1WVnWB4pdiLlGQG', 73786, '0OpGW87ftoBpADfDIKPrulZ4rtXZInwJK6rKXVTA', 'dkCKP0VTa4hWFbRloqc8Vj6pATTooqYGBTAf65RL', 67.279, 60.678, '3.jpg', 3),
(4, NULL, NULL, 'KsftDTEKRdL2rkTOrpkh', 'icBwgqKV9RmoYg6OPZy0vTzBxwjCOMMcvPJeqmLG', 'epqF55kDVgrts5ZpdqDBWebLsAp7VmlkXEwyKZra', 26657, 'MlDCp9HQdSwJIIgdp2WVPiftFScq9Sl8Mt4ziYpc', 'rh1GinetvDb8P6LlFcjV1nqalmidYxAA5WYtuhsw', -49.221, 84.722, '4.jpg', 2),
(5, NULL, NULL, 'Fw4Ep6NpVa0Hcdg9dQBZ', 'LOSloZkCDv0339xk8ljAh645XbarmZj3RJpVkIZ3', 'd9gYGgwFHgWPlxPHqQ2rHlCJMfUTBFPADWIvZTGh', 62020, 'M8qD2W7hg3sWtdHYltScTjYGCWtBND5X95fSoFup', 'xlwzYy3rrDTr5EDIfKqS9HVdwHIbJYGlvxgBT2HL', 47.025, 11.432, '5.jpg', 1),
(6, NULL, NULL, 'CSGL2HHGnVfMSyVM4Eh7', 'Axc4gKGnddGDYHAGzgLN9s7UHxUg3c0VddX7uizW', '6X5KSh60YNb2O1rVKmV0J8C2rKwludXiar6q6qv8', 30030, 'vEQs4gggRjTDb9GWBV6pbxDYvHSSpIU16qeLIQFU', 'MGyF0BoEstAj2ghtOa76NmVhR6pt8EEll8RcJ12B', -55.986, -87.719, '6.jpg', 3),
(7, NULL, NULL, 'hD4evqNuPeKYlVVrAUwG', '5tAbarT3MDMTkoJjcHcs9eQLIafKOOj66X7anFmW', 'DYr7GkQX5MCv31taucHqLmtoouZFLmrUOakAV3Fb', 31761, 'lX2qnoS4xjdUdl5EncAEBcrdu9C4m2WZv11NOaO4', '5k4KQ3EgdeV3zl4qQnlCc9PeOWtfLh7I5OmEaaw7', -54.066, -43.049, '7.jpg', 2),
(8, NULL, NULL, 'T5Z9ooleCzfkOjYzF5yZ', 'PLIshjxazc0XbINdpnfEncjKDBt2GloRoOGXaBBv', 'knpzFzRdoSAxRusbnv8vrmy6kbsLGt83LGeteRIH', 38482, 'ZxT74D5sPqIgf2eGQqnX5zTZMokTQgSuHDnk1M0I', 'yUsOHiqhKyEaRVtMrlKNjzXbjYajQSfOJp6iMNoB', -68.143, 25.181, '8.jpg', 1),
(9, NULL, NULL, 'X8FELdKWvgJvcJF5pOQF', 'wzS3HXMtxPO5ltGOEZYE8h59k5p896XlMRRxf8sU', 'm5wo7P4eqpL9lhW1Oozpbx6O4a86wRZom5G4YGVc', 59369, 'mWQarut9aTmsbFIHIVoLViMAfdKxCAENhxGxSu4U', 'lgNbk9fKe1z6jAQNFDISUkLDhyQVYXQFDtyqdUmp', -8.875, 75.896, '9.jpg', 3),
(10, NULL, NULL, 'CGlX8c0PLCEU3gZxejEw', 'qnZgUzWSs0spMDQrunFsICHrqOmRHWExgKEwDS9P', 'WXzYwYF2ezz9sbJ68231D204Rmd4Cnv4Yo3RBprP', 51684, 'GMulkkYnHm0yAd8As72hXZDFT0ehdZSKy0lqF0PW', 'zbgYqeY3TW9tf3UD5HPtZemRDmAXrgKwrkU8pjte', -83.151, 8.693, '10.jpg', 2),
(11, NULL, NULL, 'PdRvKRru03fOY8u9xef3', 'm5anQwyBrhAG1eu4GgbA78kSjC51Wn3FflogexPD', 'Pw7wvDGhIfajckykDwRmVO0ElDjahgMixzyAWfoo', 71537, 'IHCATCTs2LyJIWCSpivmUS4yg5Cy6r7ppkVQ4Azf', 'KiZ4KFq5mGAFX5p6w8KbuCuREGKvw7eythUp0MMF', 49.506, -10.602, '11.jpg', 1),
(12, NULL, NULL, '3e8aD5rct0KVTEMbQSTQ', 'lRlDL1YNM6sQjhQpQKdtLyjDloOrBN4aHmHGtie5', 'V3hDQELVfkMHcCxXq8rAaFvfpXrGRKGPGy1FiCnJ', 58741, 'hWdFvrJqf8Zz80uYmuOGmgIZgF0CDWpBtFXsgHdv', 'EVoV6vvhFPvahWv2kWLRIhmQODUAHcdOokZYZloy', -12.956, -38.705, '12.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`) VALUES
(1, 'Garden Shovel'),
(2, 'Rake'),
(3, 'Watering Can'),
(4, 'Garden Gloves'),
(5, 'Fertilizer'),
(6, 'All-Purpose Cleaner'),
(7, 'Disinfectant Wipes'),
(8, 'Bleach'),
(9, 'Bandage Kit'),
(10, 'First Aid Ointment'),
(11, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report` varchar(255) NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `report`, `place_id`, `created_at`, `updated_at`, `image`) VALUES
(1, 'BvaAlb5DvF7aBAPZZnRkpshxakd7vC', 1, NULL, NULL, ''),
(2, 'KmsXUkupoj7hO7Z7cMv2GEodh0rM2x', 2, NULL, NULL, ''),
(3, '2hJWORScNAchiCpitcUk71EwBWSzoR', 3, NULL, NULL, ''),
(4, 'zxP4lPTUNmo8bmHMzBK8xT2150nl37', 8, NULL, NULL, ''),
(5, 'xMaXJOtHnI8M5ABoIxxTP3ZHDraq17', 12, NULL, NULL, ''),
(6, '3MKhDQ2ldEUz2KmmBX5k47uPamq5NI', 10, NULL, NULL, ''),
(7, 'Fvm86XA6ksZg46HgU1KLesmCDkZnXe', 4, NULL, NULL, ''),
(8, 'KF1nHpCs4DixYLfM9MTOD1bonzm76Z', 9, NULL, NULL, ''),
(9, 'PQtkWe87gS59AfjeppFW3AY2OqZn1R', 8, NULL, NULL, ''),
(10, 'Fimm69ERMiluHFX9UoR7V7eL54Vo7k', 4, NULL, NULL, ''),
(11, 'OjgLJwZQRhmI73rfGzAtDYIAzK2YJ8', 9, NULL, NULL, ''),
(12, 'DOO0WDDVfQrGxp7RhESxvlEzIlI8An', 12, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Taman'),
(2, NULL, NULL, 'Trotoar'),
(3, NULL, NULL, 'Lampu Lalu Lintas');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'VEPP1DKA0y', '01SZmv1pL0@gmail.com', NULL, '$2y$10$gPGK1Ra29c6E3cE.VwyACu2IUnOGkvPQBtHt26DW0hEJceW24wy1y', NULL, NULL, NULL),
(2, 'ClYRL2S4TL', 'z4ZtIWzaYW@gmail.com', NULL, '$2y$10$qslXH5Yae3oawc9/2uqwZuvdyuaZ7Uf4DmRWVlm5xp4N36SPW7LmO', NULL, NULL, NULL),
(3, 'ZKCqcZxgkS', 'HxTywigAIO@gmail.com', NULL, '$2y$10$Y3Aa2yQxSq/Ygi4IRqfMv.8mKwkblRlvx4k/Cy4D3FdMbUXK098xW', NULL, NULL, NULL),
(4, 'OEmGu4lrkd', 'xKay4jK0zn@gmail.com', NULL, '$2y$10$4WyPldaqlk9wnrajdCck0uRVY37k0yqdye7iTNio8JXdVZqP7v02q', NULL, NULL, NULL),
(5, 'toZjyhoL5x', 'HDCo6qZfXA@gmail.com', NULL, '$2y$10$I35hFcqLdDebg8H23Ko7WujUeoNZW3T/FDhoSZ.3DFVwR.DEROrc6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`citizen_id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`contribution_id`),
  ADD KEY `citizen_id` (`citizen_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `contribution_product`
--
ALTER TABLE `contribution_product`
  ADD PRIMARY KEY (`contribution_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_type_id_foreign` (`type_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_place_id_foreign` (`place_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `contribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_ibfk_1` FOREIGN KEY (`citizen_id`) REFERENCES `citizens` (`citizen_id`),
  ADD CONSTRAINT `contributions_ibfk_2` FOREIGN KEY (`username`) REFERENCES `employee_accounts` (`username`);

--
-- Constraints for table `contribution_product`
--
ALTER TABLE `contribution_product`
  ADD CONSTRAINT `contribution_product_ibfk_1` FOREIGN KEY (`contribution_id`) REFERENCES `contributions` (`contribution_id`),
  ADD CONSTRAINT `contribution_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
