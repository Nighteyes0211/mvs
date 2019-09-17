-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Sep 2019 um 13:17
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mvs`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `angebote`
--

CREATE TABLE `angebote` (
  `id` int(10) NOT NULL,
  `teildarlehen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `darlehensbetrag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sollzinsbindung` int(11) DEFAULT NULL,
  `sollzinssatz` int(11) DEFAULT NULL,
  `eff_jahreszins_pangv` int(11) DEFAULT NULL,
  `kaufpreis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostenumbau` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostennotar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grunderwerbssteuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maklerkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gesamtkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eigenkapital` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finanzierungsbedarf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `angebote`
--

INSERT INTO `angebote` (`id`, `teildarlehen`, `darlehensbetrag`, `sollzinsbindung`, `sollzinssatz`, `eff_jahreszins_pangv`, `kaufpreis`, `kostenumbau`, `kostennotar`, `grunderwerbssteuer`, `maklerkosten`, `gesamtkosten`, `eigenkapital`, `finanzierungsbedarf`, `pdf_name`, `customer_id`) VALUES
(466, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '466.pdf', 1),
(467, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '467.pdf', 1),
(468, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '468.pdf', 1),
(469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '469.pdf', 1),
(470, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '470.pdf', 1),
(471, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '471.pdf', 1),
(472, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '472.pdf', 1),
(473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '473.pdf', 1),
(474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '474.pdf', 1),
(475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '475.pdf', 1),
(476, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '476.pdf', 1),
(477, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '477.pdf', 1),
(478, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '478.pdf', 1),
(479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '479.pdf', 1),
(480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '480.pdf', 1),
(481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '481.pdf', 1),
(482, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '482.pdf', 1),
(483, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '483.pdf', 1),
(484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '484.pdf', 1),
(485, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '485.pdf', 1),
(486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '486.pdf', 1),
(487, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '487.pdf', 1),
(488, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '488.pdf', 1),
(489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '489.pdf', 1),
(490, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '490.pdf', 1),
(491, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '491.pdf', 1),
(492, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '492.pdf', 1),
(493, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '493.pdf', 1),
(494, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '494.pdf', 1),
(495, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '495.pdf', 1),
(496, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '496.pdf', 1),
(497, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '497.pdf', 1),
(498, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '498.pdf', 1),
(499, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '499.pdf', 1),
(500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.pdf', 1),
(501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '501.pdf', 1),
(502, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '502.pdf', 1),
(503, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '503.pdf', 1),
(504, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '504.pdf', 1),
(505, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '505.pdf', 1),
(506, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '506.pdf', 1),
(507, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '507.pdf', 1),
(508, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '508.pdf', 1),
(509, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '509.pdf', 1),
(510, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '510.pdf', 1),
(511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '511.pdf', 1),
(512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '512.pdf', 1),
(513, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '513.pdf', 1),
(514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '514.pdf', 1),
(515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '515.pdf', 1),
(516, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '516.pdf', 1),
(517, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '517.pdf', 1),
(518, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '518.pdf', 1),
(519, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '519.pdf', 1),
(520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520.pdf', 1),
(521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '521.pdf', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `calculation`
--

CREATE TABLE `calculation` (
  `id` int(11) NOT NULL,
  `angebotdate` date DEFAULT NULL,
  `kunden_id` int(191) NOT NULL,
  `enabled` tinyint(2) NOT NULL DEFAULT '1',
  `prepared_by` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `annuities` varchar(255) NOT NULL,
  `to_interest` varchar(255) NOT NULL,
  `effectiveness` varchar(255) NOT NULL,
  `fixed_interest_rates` varchar(255) NOT NULL,
  `monthly_loan` varchar(255) NOT NULL,
  `residual_debt_interest_rate` varchar(255) NOT NULL,
  `calculated_luaf_time` varchar(255) NOT NULL,
  `net_loan_amount` varchar(255) NOT NULL,
  `initial_interest` varchar(255) NOT NULL,
  `optional_sound_recovery` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `calculation`
--

INSERT INTO `calculation` (`id`, `angebotdate`, `kunden_id`, `enabled`, `prepared_by`, `bank`, `annuities`, `to_interest`, `effectiveness`, `fixed_interest_rates`, `monthly_loan`, `residual_debt_interest_rate`, `calculated_luaf_time`, `net_loan_amount`, `initial_interest`, `optional_sound_recovery`, `created_at`, `updated_at`) VALUES
(1, '2019-04-04', 1, 1, 5, 'Deutsche Bank', 'ausgesetzt', '2%', '2', '10 Jahre', '917,29', '200.970,44', '33 Jahre, 5 Monate', '325.500', '1%', '2%', '2019-04-03 12:01:07', '2019-06-19 08:54:36');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `calc_result`
--

CREATE TABLE `calc_result` (
  `id` int(10) UNSIGNED NOT NULL,
  `kunden_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,00',
  `borrowing_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montly_deposit_val` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_val` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_to_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_to_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetime_unsheduled_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onetime_unsheduled_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onetime_unsheduled_val` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_borrowing_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_repayment_rate_inp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `calc_result`
--

INSERT INTO `calc_result` (`id`, `kunden_id`, `loan_period`, `payment_month`, `payment_year`, `payment_discount`, `borrowing_rate`, `montly_deposit_val`, `annual_unsheduled_month`, `annual_unsheduled_year`, `annual_unsheduled_val`, `annual_to_month`, `annual_to_year`, `onetime_unsheduled_month`, `onetime_unsheduled_year`, `onetime_unsheduled_val`, `new_borrowing_rate`, `new_repayment_rate_inp`, `created_at`, `updated_at`) VALUES
(12, '1', '10', '9', '2019', '0', '2', '1500', '9', '2023', '100', '9', '2024', '4', '2019', '0', '4', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklists`
--

CREATE TABLE `checklists` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklists`
--

INSERT INTO `checklists` (`id`, `body`, `category_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 0, 1, '2019-06-12 09:02:41', '2019-06-12 05:35:45', '2019-06-12 09:02:41'),
(2, 'Test 2', 0, 1, '2019-06-12 09:02:42', '2019-06-12 05:35:51', '2019-06-12 09:02:42'),
(3, 'TEST', 1, 1, '2019-06-17 09:10:38', '2019-06-17 09:10:32', '2019-06-17 09:10:38'),
(4, 'Kopie Ausweis in Farbe beidseitig', 2, 1, NULL, '2019-06-17 09:11:47', '2019-06-17 09:11:47'),
(5, 'Anbei Darlehensanfrage (bitte ausfüllen und gegenzeichnen)', 2, 1, NULL, '2019-06-17 09:12:03', '2019-06-17 09:12:03'),
(6, 'Lohn- / Gehaltsabrechnungen (die letzten 3)', 3, 1, NULL, '2019-06-17 09:12:34', '2019-06-17 09:12:34'),
(7, 'Abrechnungen Nebentätigkeit (die letzten 3)', 3, 1, NULL, '2019-06-17 09:12:57', '2019-06-17 09:17:31'),
(8, 'Bezügemitteilungen (die letzte)', 3, 1, NULL, '2019-06-17 09:17:24', '2019-06-17 09:17:24'),
(9, 'Lohnsteuerbescheinigung  Vorjahr oder Dezember-Abrechnung des Vorjahres', 3, 1, NULL, '2019-06-17 09:17:43', '2019-06-17 09:17:47'),
(10, 'Letzter vorliegender Einkommensteuerbescheid mit dazugehöriger Erklärung (inkl. aller Anlagen)', 3, 1, NULL, '2019-06-17 09:19:00', '2019-06-17 09:19:20'),
(11, 'Ihre letzten 3 Bilanzen / Gewinnermittlungen sowie die aktuelle BWA mit Summen- und Saldenliste', 3, 1, NULL, '2019-06-17 09:19:15', '2019-06-17 09:19:15'),
(12, 'Elterngeldbescheid', 3, 1, NULL, '2019-06-17 09:19:32', '2019-06-17 09:19:32'),
(13, 'Elterngeldbescheid', 3, 1, '2019-06-17 09:19:53', '2019-06-17 09:19:48', '2019-06-17 09:19:53'),
(14, 'Nachweis sonstige Einkünfte', 3, 1, NULL, '2019-06-17 09:20:07', '2019-06-17 09:20:07'),
(15, 'Aktuelle Renteninformation / Versorgungsauskunft / Beamtenpension / Nachweis privater Rentenversicherungen', 3, 1, NULL, '2019-06-17 09:20:39', '2019-06-17 09:20:39'),
(16, 'Mietaufstellung inkl. Nettokaltmieten', 3, 1, NULL, '2019-06-17 09:20:51', '2019-06-17 09:20:51'),
(17, 'Kopie Mietverträge', 3, 1, NULL, '2019-06-17 09:21:01', '2019-06-17 09:21:01'),
(18, 'Nachweis private Krankenversicherung', 4, 1, NULL, '2019-06-17 09:32:07', '2019-06-17 09:32:07'),
(19, 'Bei bestehenden Immobilienfinanzierungen Kopien der Darlehensverträge mit  letztem Jahreskontoauszug oder aktueller Restschuld', 4, 1, NULL, '2019-06-17 09:32:19', '2019-06-17 09:32:47'),
(20, 'Nachweis Unterhaltsverpflichtungen', 4, 1, NULL, '2019-06-17 09:32:25', '2019-06-17 09:32:44'),
(21, 'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc', 4, 1, NULL, '2019-06-17 09:32:41', '2019-06-17 09:32:41'),
(22, 'Kreditverträge Privatkredite bzw. Leasingverträge mit Angabe der monatlichen Belastung  und  letzter Jahreskontoauszug  oder aktueller Restschuld', 5, 1, NULL, '2019-06-17 09:33:01', '2019-06-17 09:33:21'),
(23, 'Exposé oder Link zur Immobilie', 6, 1, NULL, '2019-06-17 09:33:40', '2019-06-17 09:34:59'),
(24, 'Farbfotos von außen', 6, 1, NULL, '2019-06-17 09:33:45', '2019-06-17 09:34:51'),
(25, 'Baubeschreibung', 6, 1, NULL, '2019-06-17 09:33:50', '2019-06-17 09:34:46'),
(26, 'Grundstückskaufvertrag', 6, 1, NULL, '2019-06-17 09:33:57', '2019-06-17 09:34:43'),
(27, 'Grundbuchauszug (nicht älter als 3 Monate)', 6, 1, NULL, '2019-06-17 09:34:10', '2019-06-17 09:34:41'),
(28, 'Aktuelle Flurkarte / Lageplan', 6, 1, NULL, '2019-06-17 09:35:11', '2019-06-17 09:35:11'),
(29, 'Bemaßte Baupläne (Grundriss / Ansicht / Schnitt)', 6, 1, NULL, '2019-06-17 09:35:20', '2019-06-17 09:35:20'),
(30, 'Wohnflächenberechnung', 6, 1, NULL, '2019-06-17 09:35:30', '2019-06-17 09:35:30'),
(31, 'Bruttogrundfläche (BGF)', 6, 1, NULL, '2019-06-17 09:35:45', '2019-06-17 09:35:45'),
(32, 'Erbbaurechtsvertrag', 6, 1, NULL, '2019-06-17 09:35:54', '2019-06-17 09:35:54'),
(33, 'Erbpachtvertrag', 6, 1, NULL, '2019-06-17 09:36:06', '2019-06-17 09:36:06'),
(34, 'Bei Eigentumswohnungen: Teilungserklärung mit Aufteilungsplan', 6, 1, NULL, '2019-06-17 09:37:32', '2019-06-17 09:37:32'),
(35, 'Baukostenaufstellung (Architekt / Bauträger)', 6, 1, NULL, '2019-06-17 09:38:04', '2019-06-17 09:38:04'),
(36, 'Aufstellung der geplanten Eigenleistungen', 6, 1, NULL, '2019-06-17 09:38:12', '2019-06-17 09:38:12'),
(37, 'Detaillierte Aufstellung evtl. geplanter Modernisierungskosten', 6, 1, NULL, '2019-06-17 09:38:20', '2019-06-17 09:38:20'),
(38, 'Mietaufstellung inkl. Nettokaltmieten', 6, 1, NULL, '2019-06-17 09:38:30', '2019-06-17 09:38:30'),
(39, 'Kopie Mietverträge', 6, 1, '2019-06-18 10:07:16', '2019-06-17 09:39:06', '2019-06-18 10:07:16'),
(40, 'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc', 7, 1, NULL, '2019-06-17 09:40:30', '2019-06-17 09:40:30'),
(41, 'Grundbuchauszug bei weiterem Immobilienbesitz', 7, 1, NULL, '2019-06-17 09:40:41', '2019-06-17 09:40:41'),
(42, 'Mietverträge', 6, 1, NULL, '2019-06-18 10:07:25', '2019-06-18 10:07:25');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklist_categories`
--

CREATE TABLE `checklist_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklist_categories`
--

INSERT INTO `checklist_categories` (`id`, `name`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 1, '2019-06-17 09:11:30', '2019-06-17 09:10:27', '2019-06-17 09:11:30'),
(2, 'Persönliche Unterlagen', 1, NULL, '2019-06-17 09:11:36', '2019-06-17 09:11:36'),
(3, 'Einnahmen', 1, NULL, '2019-06-17 09:12:11', '2019-06-17 09:12:11'),
(4, 'Ausgaben', 1, NULL, '2019-06-17 09:21:11', '2019-06-17 09:21:11'),
(5, 'Verbindlichkeiten', 1, NULL, '2019-06-17 09:33:16', '2019-06-17 09:33:16'),
(6, 'Finanzierungsobjekt', 1, NULL, '2019-06-17 09:33:31', '2019-06-17 09:33:31'),
(7, 'Vermögen', 1, NULL, '2019-06-17 09:39:56', '2019-06-17 09:39:56');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklist_ehepartner`
--

CREATE TABLE `checklist_ehepartner` (
  `kunden_id` int(10) UNSIGNED NOT NULL,
  `checklist_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklist_ehepartner`
--

INSERT INTO `checklist_ehepartner` (`kunden_id`, `checklist_id`) VALUES
(1, 1),
(1, 10),
(1, 11),
(1, 12),
(1, 14),
(1, 17),
(1, 21),
(1, 23),
(1, 40),
(1, 36),
(1, 15),
(1, 16),
(1, 41),
(1, 6),
(1, 4),
(1, 5),
(1, 32),
(100, 200);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklist_kunden`
--

CREATE TABLE `checklist_kunden` (
  `kunden_id` int(10) UNSIGNED NOT NULL,
  `checklist_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklist_kunden`
--

INSERT INTO `checklist_kunden` (`kunden_id`, `checklist_id`) VALUES
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 31),
(1, 39),
(1, 38),
(1, 32),
(1, 27),
(1, 35),
(1, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer_timelines`
--

CREATE TABLE `customer_timelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `kundens_id` int(10) UNSIGNED NOT NULL,
  `calculation_id` int(10) UNSIGNED NOT NULL,
  `darlehen` int(11) NOT NULL,
  `zinsstaz` int(11) NOT NULL,
  `tilgung` int(11) NOT NULL,
  `laufzeit` int(11) NOT NULL,
  `rate_monatl` int(11) NOT NULL,
  `restschuld` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `id` int(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `street_num` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `name`, `address`, `postal_code`, `city`, `street`, `street_num`, `created_at`, `updated_at`) VALUES
(1, 'Nettetal - Kintzelmann', 'dssdf', 47906, 'Nordrhein-Westfalen - Kempen', 'Görtschesweg', 4, '2019-02-26 06:40:18', '2019-02-26 06:40:18'),
(2, 'Hückelhoven - Sternad', NULL, 12345, 'Hückelhoven', 'Hückelstraße', 3, '2019-02-26 06:50:21', '2019-02-26 06:50:21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `immobilies`
--

CREATE TABLE `immobilies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kaufpreis` int(11) NOT NULL,
  `kosten_umbau_modernisierung` int(11) NOT NULL,
  `kosten_notar_grundbuch` int(11) NOT NULL,
  `grunderwerbssteuer` int(11) NOT NULL,
  `maklerkosten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kundens`
--

CREATE TABLE `kundens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strasse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plz` int(11) NOT NULL,
  `wohnort` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geburtsdatum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaufpreis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostenumbau` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostennotar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grunderwerbssteuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maklerkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gesamtkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eigenkapital` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finanzierungsbedarf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_enabled` tinyint(2) DEFAULT '0',
  `ehepartner_vorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_nachname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_telefon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_geburtsdatum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `kundens`
--

INSERT INTO `kundens` (`id`, `created_at`, `updated_at`, `user_id`, `vorname`, `nachname`, `strasse`, `plz`, `wohnort`, `mail`, `telefon`, `geburtsdatum`, `kaufpreis`, `kostenumbau`, `kostennotar`, `grunderwerbssteuer`, `maklerkosten`, `gesamtkosten`, `eigenkapital`, `finanzierungsbedarf`, `ehepartner_enabled`, `ehepartner_vorname`, `ehepartner_nachname`, `ehepartner_mail`, `ehepartner_telefon`, `ehepartner_geburtsdatum`) VALUES
(1, '2019-02-26 06:40:55', '2019-08-26 07:37:54', 27, 'Patrick', 'Dierig', 'Görtschesweg, 4', 47906, 'Nordrhein-Westfalen - Kempen', 'p-dierig@einfachmedial.de', '015204967292', '2017-10-30', '250000', '0', '2', '6', '4', '280000.00', '0', '280000.00', 0, 'Bettina', 'Dierig', 'p-dierig@einfachmedial.de', '015204967292', '1993-02-12');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_11_21_101915_create_tests_table', 1),
(2, '2018_11_21_130836_create_timeline', 2),
(3, '2018_11_21_134854_update_zeitstrahl_tabelle', 3),
(4, '2018_11_21_161940_update_zeitstrahl_tabelle_zwei', 4),
(5, '2019_06_11_055129_create_checklists_table', 5),
(6, '2019_06_12_092208_create_checklist_ehepartner_table', 6),
(7, '2019_06_12_112354_add_category_column_to_checklists_table', 7),
(8, '2019_06_13_044648_create_checklist_categories_table', 8),
(9, '2019_06_18_123018_create_customer_timelines_table', 9),
(11, '2019_08_24_100742_create_calc_result_table', 10),
(12, '2019_08_26_100613_add_two_columns_to_repayments_table', 11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('p-dierig@einfachmedial.de', '$2y$10$JyeHPWr3pd.uj1BKuUVxouxgZUl.jdviX6QPo9u61F49fsStB25jm', '2019-06-05 08:51:46');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `repayments`
--

CREATE TABLE `repayments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zinsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tilgung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `darlehensrest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `repayment_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonder_tilgung` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `repayments`
--

INSERT INTO `repayments` (`id`, `created_at`, `updated_at`, `zinsen`, `tilgung`, `darlehensrest`, `kundens_id`, `repayment_date`, `rate`, `sonder_tilgung`) VALUES
(2694, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '__', '__', '280000', 1, '9/2019', '__', '__'),
(2695, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '466.67', '1033.33', '278966.67', 1, '10/2019', '1500.00', '0.00'),
(2696, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '464.94', '1035.06', '277931.61', 1, '11/2019', '1500.00', '0.00'),
(2697, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '463.22', '1036.78', '276894.83', 1, '12/2019', '1500.00', '0.00'),
(2698, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '461.49', '1038.51', '275856.32', 1, '1/2020', '1500.00', '0.00'),
(2699, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '459.76', '1040.24', '274816.08', 1, '2/2020', '1500.00', '0.00'),
(2700, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '458.03', '1041.97', '273774.11', 1, '3/2020', '1500.00', '0.00'),
(2701, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '456.29', '1043.71', '272730.40', 1, '4/2020', '1500.00', '0.00'),
(2702, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '454.55', '1045.45', '271684.95', 1, '5/2020', '1500.00', '0.00'),
(2703, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '452.81', '1047.19', '270637.76', 1, '6/2020', '1500.00', '0.00'),
(2704, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '451.06', '1048.94', '269588.82', 1, '7/2020', '1500.00', '0.00'),
(2705, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '449.31', '1050.69', '268538.14', 1, '8/2020', '1500.00', '0.00'),
(2706, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '447.56', '1052.44', '267485.70', 1, '9/2020', '1500.00', '0.00'),
(2707, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '445.81', '1054.19', '266431.51', 1, '10/2020', '1500.00', '0.00'),
(2708, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '444.05', '1055.95', '265375.56', 1, '11/2020', '1500.00', '0.00'),
(2709, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '442.29', '1057.71', '264317.85', 1, '12/2020', '1500.00', '0.00'),
(2710, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '440.53', '1059.47', '263258.38', 1, '1/2021', '1500.00', '0.00'),
(2711, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '438.76', '1061.24', '262197.15', 1, '2/2021', '1500.00', '0.00'),
(2712, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '437.00', '1063.00', '261134.14', 1, '3/2021', '1500.00', '0.00'),
(2713, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '435.22', '1064.78', '260069.37', 1, '4/2021', '1500.00', '0.00'),
(2714, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '433.45', '1066.55', '259002.82', 1, '5/2021', '1500.00', '0.00'),
(2715, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '431.67', '1068.33', '257934.49', 1, '6/2021', '1500.00', '0.00'),
(2716, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '429.89', '1070.11', '256864.38', 1, '7/2021', '1500.00', '0.00'),
(2717, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '428.11', '1071.89', '255792.49', 1, '8/2021', '1500.00', '0.00'),
(2718, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '426.32', '1073.68', '254718.81', 1, '9/2021', '1500.00', '0.00'),
(2719, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '424.53', '1075.47', '253643.34', 1, '10/2021', '1500.00', '0.00'),
(2720, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '422.74', '1077.26', '252566.08', 1, '11/2021', '1500.00', '0.00'),
(2721, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '420.94', '1079.06', '251487.02', 1, '12/2021', '1500.00', '0.00'),
(2722, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '419.15', '1080.85', '250406.16', 1, '1/2022', '1500.00', '0.00'),
(2723, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '417.34', '1082.66', '249323.51', 1, '2/2022', '1500.00', '0.00'),
(2724, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '415.54', '1084.46', '248239.05', 1, '3/2022', '1500.00', '0.00'),
(2725, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '413.73', '1086.27', '247152.78', 1, '4/2022', '1500.00', '0.00'),
(2726, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '411.92', '1088.08', '246064.70', 1, '5/2022', '1500.00', '0.00'),
(2727, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '410.11', '1089.89', '244974.81', 1, '6/2022', '1500.00', '0.00'),
(2728, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '408.29', '1091.71', '243883.10', 1, '7/2022', '1500.00', '0.00'),
(2729, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '406.47', '1093.53', '242789.57', 1, '8/2022', '1500.00', '0.00'),
(2730, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '404.65', '1095.35', '241694.22', 1, '9/2022', '1500.00', '0.00'),
(2731, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '402.82', '1097.18', '240597.04', 1, '10/2022', '1500.00', '0.00'),
(2732, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '401.00', '1099.00', '239498.04', 1, '11/2022', '1500.00', '0.00'),
(2733, '2019-08-28 10:36:47', '2019-08-28 10:36:47', '399.16', '1100.84', '238397.20', 1, '12/2022', '1500.00', '0.00'),
(2734, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '397.33', '1102.67', '237294.53', 1, '1/2023', '1500.00', '0.00'),
(2735, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '395.49', '1104.51', '236190.02', 1, '2/2023', '1500.00', '0.00'),
(2736, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '393.65', '1106.35', '235083.67', 1, '3/2023', '1500.00', '0.00'),
(2737, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '391.81', '1108.19', '233975.48', 1, '4/2023', '1500.00', '0.00'),
(2738, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '389.96', '1110.04', '232865.44', 1, '5/2023', '1500.00', '0.00'),
(2739, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '388.11', '1111.89', '231753.55', 1, '6/2023', '1500.00', '0.00'),
(2740, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '386.26', '1113.74', '230639.80', 1, '7/2023', '1500.00', '0.00'),
(2741, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '384.40', '1115.60', '229524.20', 1, '8/2023', '1500.00', '0.00'),
(2742, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '382.54', '1217.46', '228306.74', 1, '9/2023', '1500.00', '100.00'),
(2743, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '380.51', '1119.49', '227187.25', 1, '10/2023', '1500.00', '0.00'),
(2744, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '378.65', '1121.35', '226065.90', 1, '11/2023', '1500.00', '0.00'),
(2745, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '376.78', '1123.22', '224942.68', 1, '12/2023', '1500.00', '0.00'),
(2746, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '374.90', '1125.10', '223817.58', 1, '1/2024', '1500.00', '0.00'),
(2747, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '373.03', '1126.97', '222690.61', 1, '2/2024', '1500.00', '0.00'),
(2748, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '371.15', '1128.85', '221561.76', 1, '3/2024', '1500.00', '0.00'),
(2749, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '369.27', '1130.73', '220431.03', 1, '4/2024', '1500.00', '0.00'),
(2750, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '367.39', '1132.61', '219298.42', 1, '5/2024', '1500.00', '0.00'),
(2751, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '365.50', '1134.50', '218163.91', 1, '6/2024', '1500.00', '0.00'),
(2752, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '363.61', '1136.39', '217027.52', 1, '7/2024', '1500.00', '0.00'),
(2753, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '361.71', '1138.29', '215889.23', 1, '8/2024', '1500.00', '0.00'),
(2754, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '359.82', '1240.18', '214649.05', 1, '9/2024', '1500.00', '100.00'),
(2755, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '357.75', '1142.25', '213506.80', 1, '10/2024', '1500.00', '0.00'),
(2756, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '355.84', '1144.16', '212362.64', 1, '11/2024', '1500.00', '0.00'),
(2757, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '353.94', '1146.06', '211216.58', 1, '12/2024', '1500.00', '0.00'),
(2758, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '352.03', '1147.97', '210068.61', 1, '1/2025', '1500.00', '0.00'),
(2759, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '350.11', '1149.89', '208918.72', 1, '2/2025', '1500.00', '0.00'),
(2760, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '348.20', '1151.80', '207766.92', 1, '3/2025', '1500.00', '0.00'),
(2761, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '346.28', '1153.72', '206613.20', 1, '4/2025', '1500.00', '0.00'),
(2762, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '344.36', '1155.64', '205457.55', 1, '5/2025', '1500.00', '0.00'),
(2763, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '342.43', '1157.57', '204299.98', 1, '6/2025', '1500.00', '0.00'),
(2764, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '340.50', '1159.50', '203140.48', 1, '7/2025', '1500.00', '0.00'),
(2765, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '338.57', '1161.43', '201979.05', 1, '8/2025', '1500.00', '0.00'),
(2766, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '336.63', '1163.37', '200815.68', 1, '9/2025', '1500.00', '0.00'),
(2767, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '334.69', '1165.31', '199650.37', 1, '10/2025', '1500.00', '0.00'),
(2768, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '332.75', '1167.25', '198483.12', 1, '11/2025', '1500.00', '0.00'),
(2769, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '330.81', '1169.19', '197313.93', 1, '12/2025', '1500.00', '0.00'),
(2770, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '328.86', '1171.14', '196142.78', 1, '1/2026', '1500.00', '0.00'),
(2771, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '326.90', '1173.10', '194969.69', 1, '2/2026', '1500.00', '0.00'),
(2772, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '324.95', '1175.05', '193794.64', 1, '3/2026', '1500.00', '0.00'),
(2773, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '322.99', '1177.01', '192617.63', 1, '4/2026', '1500.00', '0.00'),
(2774, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '321.03', '1178.97', '191438.66', 1, '5/2026', '1500.00', '0.00'),
(2775, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '319.06', '1180.94', '190257.72', 1, '6/2026', '1500.00', '0.00'),
(2776, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '317.10', '1182.90', '189074.82', 1, '7/2026', '1500.00', '0.00'),
(2777, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '315.12', '1184.88', '187889.94', 1, '8/2026', '1500.00', '0.00'),
(2778, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '313.15', '1186.85', '186703.09', 1, '9/2026', '1500.00', '0.00'),
(2779, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '311.17', '1188.83', '185514.27', 1, '10/2026', '1500.00', '0.00'),
(2780, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '309.19', '1190.81', '184323.46', 1, '11/2026', '1500.00', '0.00'),
(2781, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '307.21', '1192.79', '183130.66', 1, '12/2026', '1500.00', '0.00'),
(2782, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '305.22', '1194.78', '181935.88', 1, '1/2027', '1500.00', '0.00'),
(2783, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '303.23', '1196.77', '180739.11', 1, '2/2027', '1500.00', '0.00'),
(2784, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '301.23', '1198.77', '179540.34', 1, '3/2027', '1500.00', '0.00'),
(2785, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '299.23', '1200.77', '178339.57', 1, '4/2027', '1500.00', '0.00'),
(2786, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '297.23', '1202.77', '177136.81', 1, '5/2027', '1500.00', '0.00'),
(2787, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '295.23', '1204.77', '175932.03', 1, '6/2027', '1500.00', '0.00'),
(2788, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '293.22', '1206.78', '174725.25', 1, '7/2027', '1500.00', '0.00'),
(2789, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '291.21', '1208.79', '173516.46', 1, '8/2027', '1500.00', '0.00'),
(2790, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '289.19', '1210.81', '172305.66', 1, '9/2027', '1500.00', '0.00'),
(2791, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '287.18', '1212.82', '171092.83', 1, '10/2027', '1500.00', '0.00'),
(2792, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '285.15', '1214.85', '169877.99', 1, '11/2027', '1500.00', '0.00'),
(2793, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '283.13', '1216.87', '168661.12', 1, '12/2027', '1500.00', '0.00'),
(2794, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '281.10', '1218.90', '167442.22', 1, '1/2028', '1500.00', '0.00'),
(2795, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '279.07', '1220.93', '166221.29', 1, '2/2028', '1500.00', '0.00'),
(2796, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '277.04', '1222.96', '164998.32', 1, '3/2028', '1500.00', '0.00'),
(2797, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '275.00', '1225.00', '163773.32', 1, '4/2028', '1500.00', '0.00'),
(2798, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '272.96', '1227.04', '162546.28', 1, '5/2028', '1500.00', '0.00'),
(2799, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '270.91', '1229.09', '161317.19', 1, '6/2028', '1500.00', '0.00'),
(2800, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '268.86', '1231.14', '160086.05', 1, '7/2028', '1500.00', '0.00'),
(2801, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '266.81', '1233.19', '158852.86', 1, '8/2028', '1500.00', '0.00'),
(2802, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '264.75', '1235.25', '157617.61', 1, '9/2028', '1500.00', '0.00'),
(2803, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '262.70', '1237.30', '156380.31', 1, '10/2028', '1500.00', '0.00'),
(2804, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '260.63', '1239.37', '155140.94', 1, '11/2028', '1500.00', '0.00'),
(2805, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '258.57', '1241.43', '153899.51', 1, '12/2028', '1500.00', '0.00'),
(2806, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '256.50', '1243.50', '152656.01', 1, '1/2029', '1500.00', '0.00'),
(2807, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '254.43', '1245.57', '151410.44', 1, '2/2029', '1500.00', '0.00'),
(2808, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '252.35', '1247.65', '150162.79', 1, '3/2029', '1500.00', '0.00'),
(2809, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '250.27', '1249.73', '148913.06', 1, '4/2029', '1500.00', '0.00'),
(2810, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '248.19', '1251.81', '147661.25', 1, '5/2029', '1500.00', '0.00'),
(2811, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '246.10', '1253.90', '146407.35', 1, '6/2029', '1500.00', '0.00'),
(2812, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '244.01', '1255.99', '145151.36', 1, '7/2029', '1500.00', '0.00'),
(2813, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '241.92', '1258.08', '143893.28', 1, '8/2029', '1500.00', '0.00'),
(2814, '2019-08-28 10:36:48', '2019-08-28 10:36:48', '239.82', '1260.18', '142633.10', 1, '9/2029', '1500.00', '0.00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `hobby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `tests`
--

INSERT INTO `tests` (`id`, `hobby`, `kundens_id`, `created_at`, `updated_at`) VALUES
(1, 'hobby test name', 1, '2018-11-21 16:37:51', '2018-11-21 16:37:51'),
(2, 'hobby test name1', 1, '2018-11-21 16:38:18', '2018-11-21 16:38:18'),
(3, 'hobby test name2_2', 2, '2018-11-21 16:40:12', '2018-11-21 16:40:12');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `timeline`
--

CREATE TABLE `timeline` (
  `id` int(10) UNSIGNED NOT NULL,
  `timeline` int(191) DEFAULT NULL,
  `calculation_id` int(11) NOT NULL,
  `kundens_id` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finanzierungsbedarf_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahreszins_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laufzeit_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_monatlich_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restschuld_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finanzierungsbedarf_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahreszins_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laufzeit_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_monatlich_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restschuld_ende` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `group` int(11) DEFAULT '0',
  `admin` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `surname`, `phone`, `mail_address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `group`, `admin`) VALUES
(5, 'Admin User', 'admin@admin.com', 'admin', '1234', 'homezcasdfsdfas', NULL, '$2y$10$C.aRlHjyGj0.ixSzp81Lo.6DQcV9Ii9vx3jRQbA.OQp34RiyFKhOG', 'xoOTPfUQXUPXxAk8NOQrgzb4g3SSeUBXpNmgLrTGMY3XdzHmQP3bXex1CIoz', '2019-02-18 13:53:29', '2019-02-25 09:03:49', 1, 1, 1),
(27, 'Patrick', 'p-dierig@einfachmedial.de', 'Dierig', '015204967292', 'p-dierig@einfachmedial.de', NULL, '$2y$10$fOTD1gNVZmPS6GV6WwanXu0ZZI.3IiEPw0bxXrVSjBs3Z6WS4BZ8S', NULL, '2019-02-26 06:38:34', '2019-02-26 06:40:30', 1, 1, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `angebote`
--
ALTER TABLE `angebote`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `calculation`
--
ALTER TABLE `calculation`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `calc_result`
--
ALTER TABLE `calc_result`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `checklist_categories`
--
ALTER TABLE `checklist_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `customer_timelines`
--
ALTER TABLE `customer_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `immobilies`
--
ALTER TABLE `immobilies`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kundens`
--
ALTER TABLE `kundens`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `repayments`
--
ALTER TABLE `repayments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `angebote`
--
ALTER TABLE `angebote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- AUTO_INCREMENT für Tabelle `calculation`
--
ALTER TABLE `calculation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `calc_result`
--
ALTER TABLE `calc_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT für Tabelle `checklist_categories`
--
ALTER TABLE `checklist_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `customer_timelines`
--
ALTER TABLE `customer_timelines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `immobilies`
--
ALTER TABLE `immobilies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kundens`
--
ALTER TABLE `kundens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `repayments`
--
ALTER TABLE `repayments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2815;

--
-- AUTO_INCREMENT für Tabelle `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
