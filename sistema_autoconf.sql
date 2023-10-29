-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Out-2023 às 00:42
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_autoconf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `marca` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'Volkswagen', '2023-10-27 12:50:55', '2023-10-28 04:34:01'),
(2, 'Chevrolet', '2023-10-27 12:51:04', '2023-10-27 12:51:09'),
(3, 'Ford', NULL, NULL),
(4, 'Honda', '2023-10-27 18:45:18', '2023-10-27 18:45:18'),
(6, 'Toyota', '2023-10-27 20:50:00', '2023-10-28 02:54:56'),
(11, 'Hyundai', '2023-10-28 03:09:33', '2023-10-28 03:09:33'),
(13, 'Aston Martin', '2023-10-28 18:05:51', '2023-10-28 18:05:51'),
(35, 'BMW', '2023-10-29 03:09:53', '2023-10-29 03:10:03'),
(36, 'Peugeot', '2023-10-29 03:14:34', '2023-10-29 03:14:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2023_10_27_121511_create_modelos_table', 1),
(15, '2023_10_27_122428_create_marcas_table', 1),
(16, '2023_10_27_122645_create_veiculos_table', 1),
(17, '2023_10_27_180653_add_image_to_marcas_table', 2),
(18, '2023_10_27_181037_add_image_to_marcas_table', 3),
(19, '2014_10_12_200000_add_two_factor_columns_to_users_table', 4),
(20, '2023_10_27_212516_create_sessions_table', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `modelo` text COLLATE utf8mb4_unicode_ci,
  `id_marca` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`id`, `modelo`, `id_marca`, `created_at`, `updated_at`) VALUES
(3, 'Montana', 2, NULL, NULL),
(4, 'Fusion', 3, NULL, NULL),
(5, 'HB20 COMFORT PLUS 1.6 16V 2014/2015', 11, '2023-10-27 21:31:18', '2023-10-28 21:23:32'),
(7, 'JETTA COMFORTLINE 2.0', 1, '2023-10-27 23:20:36', '2023-10-27 23:20:36'),
(9, 'I30 2.0 16V AT', 11, '2023-10-28 03:12:33', '2023-10-29 03:07:40'),
(11, 'JETTA HIGHLINE 2.0 TSI DSG', 1, '2023-10-28 04:42:08', '2023-10-28 04:42:08'),
(13, 'New Civic 2008 1.8 Flex AT', 4, '2023-10-28 05:25:16', '2023-10-28 05:25:16'),
(14, 'GOLF GTi 2.0 TSi DSG', 1, '2023-10-29 02:55:10', '2023-10-29 02:55:10'),
(15, 'TIGUAN ALLSPACE COMFORTLINE 250 1.4 TSi DSG', 1, '2023-10-29 03:01:04', '2023-10-29 03:01:04'),
(16, 'SONATA GLS 2.0 AT', 11, '2023-10-29 03:06:24', '2023-10-29 03:06:24'),
(17, '320i M SPORT 2.0 16V TB AT', 35, '2023-10-29 03:10:15', '2023-10-29 03:10:15'),
(18, '308 ACTIVE 1.6 16V', 36, '2023-10-29 03:14:46', '2023-10-29 03:14:46'),
(19, 'FUSCA 1300', 1, '2023-10-29 03:17:59', '2023-10-29 03:17:59'),
(20, 'EQUINOX PREMIER 2.0 16V TB AT9', 2, '2023-10-29 03:22:54', '2023-10-29 03:22:54'),
(21, 'GOL G3 2001 4P 1.0 16V', 1, '2023-10-29 03:41:06', '2023-10-29 03:41:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gxEIzR40kfGAYRs6TVIdtVURJutXlWBOo4qzB7s6', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1lib1JraUlrZmRZNEN3SWEwcnIxTVFBT0VpYlJmT3FYTjJJQ3UxOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1698540121);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'juan.almeidach3@gmail.com', NULL, '$2y$10$WsVS1WiyKBQUIii62w4ar.LCD7Na7.PDERQH5hVy4qzzNs1w8GR.O', NULL, NULL, NULL, 'G87IegNEyzHRQuJvtdPA66NYanr62um0kBFnKFZkPMPDOur1WFFuJbvzjrie', '2023-10-28 00:43:36', '2023-10-28 00:43:36'),
(2, 'Juan', 'juan@teste.com.br', NULL, '$2y$10$3BbzCy5M2Am8Ovb2zs4cQu2R6Vn.Y1VLVcF5dh3xSLvYZ9Y4wytpW', NULL, NULL, NULL, NULL, '2023-10-29 03:35:03', '2023-10-29 03:35:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `preco` decimal(11,2) NOT NULL,
  `imagem` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `id_marca`, `id_modelo`, `preco`, `imagem`, `created_at`, `updated_at`) VALUES
(7, 11, 9, '42900.00', '0eb78ca5be3f3564c5786d14e6a22c59.jpg', '2023-10-28 04:23:00', '2023-10-28 05:24:49'),
(11, 4, 13, '45900.00', '1e8294f7d03aaa7ed0e6d2defe63b280.jpg', '2023-10-28 05:27:05', '2023-10-28 05:27:05'),
(12, 1, 7, '65500.00', 'f1c8aa017207aaab806eb8c6cbec4b51.jpg', '2023-10-28 07:24:59', '2023-10-28 07:24:59'),
(13, 11, 5, '62900.00', 'a9ed63a82ffcba3c1739c4b4e1b8f425.jpg', '2023-10-28 21:24:38', '2023-10-28 21:26:14'),
(14, 1, 11, '64900.00', '65e567f8e074a25d620e9863882ff632.jpg', '2023-10-28 21:28:00', '2023-10-28 21:28:00'),
(17, 1, 14, '179900.00', '4b45a89d4127e0cb856a791d09147a7e.jpg', '2023-10-29 02:56:29', '2023-10-29 02:56:29'),
(18, 1, 15, '219900.00', 'ab426f9603fefeaab78ad9a03095c209.jpg', '2023-10-29 03:01:32', '2023-10-29 03:03:24'),
(19, 11, 16, '67900.00', '76c9b6f74fba16c82edcde036a3aa520.jpg', '2023-10-29 03:06:45', '2023-10-29 03:06:45'),
(20, 35, 17, '279900.00', 'a7fc344f6f8fedd13e9c3c73d2b6cffb.jpg', '2023-10-29 03:10:36', '2023-10-29 03:10:36'),
(21, 36, 18, '48900.00', '49d3af41c2ae92ecbc320b68c1b3e825.jpg', '2023-10-29 03:15:23', '2023-10-29 03:15:23'),
(22, 1, 19, '65000.00', 'e89ed46a374a362ed53872fbd8026bb1.jpg', '2023-10-29 03:18:20', '2023-10-29 03:18:20'),
(24, 2, 20, '160000.00', 'df578293ac66ab8fa0840a5b0a4c97b6.jpg', '2023-10-29 03:41:56', '2023-10-29 03:41:56');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marca_modelo` (`id_marca`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_veiculos_modelos` (`id_modelo`),
  ADD KEY `fk_veiculos_marca` (`id_marca`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `fk_marca_modelo` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `fk_veiculos_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_veiculos_modelos` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
