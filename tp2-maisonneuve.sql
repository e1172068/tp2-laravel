-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2022 at 11:22 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp2-maisonneuve`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `titre_en` varchar(100) DEFAULT NULL,
  `contenu` text NOT NULL,
  `contenu_en` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_etudiants1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `titre_en`, `contenu`, `contenu_en`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Patates', 'Potatoes', 'patati patata', 'Pototo patata', '2022-11-17 09:09:21', '2022-11-17 09:09:21', 5),
(6, 'Laravel est un framework de qualité', 'Laravel, what a ride', 'Laravel, pas pire.', 'Truly something', '2022-11-19 09:12:04', '2022-11-19 09:12:04', 10);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) NOT NULL,
  `titre_en` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_documents_etudiants1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `titre`, `titre_en`, `created_at`, `updated_at`, `user_id`, `document_path`) VALUES
(1, 'Bonjour salut', 'Hi hello', '2022-11-17 21:14:58', '2022-11-17 17:56:47', 5, 'documents/157leesbOULEHKzVoo13kTgpe09WM0r0jqiWgEGS.pdf'),
(2, 'f1', 'f1', '2022-11-17 22:48:34', '2022-11-17 17:48:34', 5, 'documents/z4MpI0a3Br5Ob3Jq6iwuZk923DoaUvagqMSgeUBM.pdf'),
(12, 'tp vue', 'tp vue', '2022-11-19 09:03:36', '2022-11-19 04:03:36', 5, 'documents/c9t66YBslR1t53Y5EdUPJctrZ1UJeqeqosdkAmOw.pdf'),
(13, 'tp3 vue js', 'vuejs for my class', '2022-11-19 09:12:38', '2022-11-19 04:12:53', 10, 'documents/Az7cM9ElaE5FItiLJkqIZYGpzo5oVBQrpaRL4J1o.pdf'),
(14, 'plan du site stampee', 'stampee sitemap', '2022-11-19 09:13:51', '2022-11-19 04:13:51', 10, 'documents/EiJY8d67mqS6X6wLwiOhOpqaULu1Nq9Y8RDWgzkO.pdf'),
(15, 'un de plus pour la pagination', 'just need one more to demo pagination', '2022-11-19 09:16:13', '2022-11-19 04:16:13', 10, 'documents/hwfa4B2T6D3zUDpM7ZhCTrmjWiDClCXTndb4tjCQ.doc'),
(16, 'un document word', 'a word document', '2022-11-19 09:16:45', '2022-11-19 04:16:45', 10, 'documents/XZXi8KRp2eHxvDjJ4EydR7QhAzBRTEpMtHVPKj89.doc'),
(17, 'un fichier zip', 'a zip file', '2022-11-19 09:17:11', '2022-11-19 04:17:11', 10, 'documents/cMDHX1Nv9rNlElVyB9Bh2Pfh8GeRNbNvLBm9G8xd.zip');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `etudiants_ville_id_foreign` (`ville_id`),
  KEY `fk_etudiants_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`user_id`, `adress`, `phone`, `birthdate`, `ville_id`, `created_at`, `updated_at`) VALUES
(5, '2381 av Jeanne D\'arc', '5148841104', '1993-11-22', 1, '2022-11-17 04:53:48', '2022-11-17 04:53:48'),
(10, '202-2381 avenue Jeanne d\'Arc', '5148841104', '1993-10-05', 3, '2022-11-18 03:33:04', '2022-11-18 03:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Mathieu St-Onge', 'mathieu@gmail.com', NULL, '$2y$10$cQ1BG0ldzbmS1AMEOLQM6enJvYwrXiFfzPUl3GmB9TzJSMRYCwlVm', NULL, '2022-11-17 04:53:48', '2022-11-17 04:53:48'),
(8, 'Mathieu St-Onge', 'stng.mathieu2@gmail.com', NULL, '$2y$10$qM32fGbA1qfXiQGqHMwpS.F9.CUWFsbdzIor18sIlX7iGgAXJJJ32', NULL, '2022-11-17 05:57:34', '2022-11-17 05:57:34'),
(10, 'Catherine La Barre', 'catherine@hotmail.com', NULL, '$2y$10$uxOnX//Zsa9qj9NIGqXF2uF.NqOFpOIpXlezUUzSZqGTbOxmlHL.a', NULL, '2022-11-18 03:33:04', '2022-11-18 03:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Osinskishire', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(2, 'Port Ryleigh', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(3, 'South Mandy', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(4, 'Gottliebborough', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(5, 'New Raphael', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(6, 'North Kamren', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(7, 'Lake Shaun', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(8, 'McDermottville', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(9, 'Hermannborough', '2022-11-16 01:10:13', '2022-11-16 01:10:13'),
(10, 'Fadelton', '2022-11-16 01:10:13', '2022-11-16 01:10:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_etudiants1` FOREIGN KEY (`user_id`) REFERENCES `etudiants` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_documents_etudiants1` FOREIGN KEY (`user_id`) REFERENCES `etudiants` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`),
  ADD CONSTRAINT `fk_etudiants_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
