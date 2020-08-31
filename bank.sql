-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Aug 2020 um 05:31
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bank`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auszahlung`
--

CREATE TABLE `auszahlung` (
  `id` int(10) UNSIGNED NOT NULL,
  `beitrag` double NOT NULL,
  `konto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `auszahlung`
--

INSERT INTO `auszahlung` (`id`, `beitrag`, `konto_id`, `created_at`, `updated_at`) VALUES
(1, 400, 2, '2020-08-31 00:37:59', '2020-08-31 00:37:59'),
(2, 400, 2, '2020-08-31 00:38:29', '2020-08-31 00:38:29'),
(3, 400, 1, '2020-08-31 01:21:58', '2020-08-31 01:21:58'),
(4, 400, 1, '2020-08-31 01:27:39', '2020-08-31 01:27:39');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einzahlung`
--

CREATE TABLE `einzahlung` (
  `id` int(10) UNSIGNED NOT NULL,
  `beitrag` double NOT NULL,
  `konto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `einzahlung`
--

INSERT INTO `einzahlung` (`id`, `beitrag`, `konto_id`, `created_at`, `updated_at`) VALUES
(1, 500, 1, '2020-08-30 23:05:19', '2020-08-30 23:05:19'),
(2, 200, 1, '2020-08-30 23:05:47', '2020-08-30 23:05:47'),
(3, 200, 2, '2020-08-30 23:06:12', '2020-08-30 23:06:12'),
(4, 200, 2, '2020-08-31 00:07:56', '2020-08-31 00:07:56'),
(5, 200, 2, '2020-08-31 00:08:20', '2020-08-31 00:08:20'),
(6, 200, 2, '2020-08-31 00:08:36', '2020-08-31 00:08:36'),
(7, 400, 2, '2020-08-31 00:39:01', '2020-08-31 00:39:01'),
(8, 400, 1, '2020-08-31 01:17:36', '2020-08-31 01:17:36'),
(9, 400, 2, '2020-08-31 01:20:14', '2020-08-31 01:20:14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontos`
--

CREATE TABLE `kontos` (
  `id` int(10) UNSIGNED NOT NULL,
  `konto_inhaber` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `konto_nummer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `konto_stand` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `kontos`
--

INSERT INTO `kontos` (`id`, `konto_inhaber`, `konto_nummer`, `status`, `konto_stand`, `created_at`, `updated_at`) VALUES
(1, 'Anass Hobban', 'DE2231247896522257123', 1, 200, '2020-08-30 18:16:55', '2020-08-31 01:27:39'),
(2, 'albert Sams', 'DE2231247896522257857', 1, 900, '2020-08-30 18:16:55', '2020-08-31 01:20:14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todos`
--

CREATE TABLE `todos` (
  `id` int(10) UNSIGNED NOT NULL,
  `todo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `todos`
--

INSERT INTO `todos` (`id`, `todo`, `description`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Working with Eloquent Without PHP', 'Testing the work using eloquent without laravel', 'eloquent', 3, '2020-08-28 17:57:43', '2020-08-28 17:57:43');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ueberweisung`
--

CREATE TABLE `ueberweisung` (
  `id` int(10) UNSIGNED NOT NULL,
  `konto_id_source` int(11) NOT NULL,
  `konto_id_ziel` int(11) NOT NULL,
  `beitrag` double UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `ueberweisung`
--

INSERT INTO `ueberweisung` (`id`, `konto_id_source`, `konto_id_ziel`, `beitrag`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 100, '2020-08-31 00:14:02', '2020-08-31 00:14:02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userimage` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `userimage`, `api_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Anass Khan', 'anas2200@hotmail.com', '$2y$10$A8d4AuaWa6Iycp9k7PzJzu2pvkj/Bj7a6R6DSHxA95/QhiesCGNS6', NULL, NULL, NULL, '2020-08-28 17:57:42', '2020-08-28 17:57:42');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `auszahlung`
--
ALTER TABLE `auszahlung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `einzahlung`
--
ALTER TABLE `einzahlung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kontos`
--
ALTER TABLE `kontos`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ueberweisung`
--
ALTER TABLE `ueberweisung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_key_unique` (`api_key`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `auszahlung`
--
ALTER TABLE `auszahlung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `einzahlung`
--
ALTER TABLE `einzahlung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `kontos`
--
ALTER TABLE `kontos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `ueberweisung`
--
ALTER TABLE `ueberweisung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
