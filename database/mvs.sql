/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.6-MariaDB : Database - mvs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mvs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mvs`;

/*Table structure for table `angebote` */

DROP TABLE IF EXISTS `angebote`;

CREATE TABLE `angebote` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `customer_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=533 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `angebote` */

insert  into `angebote`(`id`,`teildarlehen`,`darlehensbetrag`,`sollzinsbindung`,`sollzinssatz`,`eff_jahreszins_pangv`,`kaufpreis`,`kostenumbau`,`kostennotar`,`grunderwerbssteuer`,`maklerkosten`,`gesamtkosten`,`eigenkapital`,`finanzierungsbedarf`,`pdf_name`,`customer_id`) values 
(466,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'466.pdf',1),
(467,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'467.pdf',1),
(468,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'468.pdf',1),
(469,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'469.pdf',1),
(470,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'470.pdf',1),
(471,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'471.pdf',1),
(472,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'472.pdf',1),
(473,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'473.pdf',1),
(474,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'474.pdf',1),
(475,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'475.pdf',1),
(476,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'476.pdf',1),
(477,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'477.pdf',1),
(478,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'478.pdf',1),
(479,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'479.pdf',1),
(480,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'480.pdf',1),
(481,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'481.pdf',1),
(482,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'482.pdf',1),
(483,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'483.pdf',1),
(484,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'484.pdf',1),
(485,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'485.pdf',1),
(486,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'486.pdf',1),
(487,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'487.pdf',1),
(488,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'488.pdf',1),
(489,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'489.pdf',1),
(490,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'490.pdf',1),
(491,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'491.pdf',1),
(492,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'492.pdf',1),
(493,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'493.pdf',1),
(494,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'494.pdf',1),
(495,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'495.pdf',1),
(496,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'496.pdf',1),
(497,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'497.pdf',1),
(498,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'498.pdf',1),
(499,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'499.pdf',1),
(500,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'500.pdf',1),
(501,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'501.pdf',1),
(502,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'502.pdf',1),
(503,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'503.pdf',1),
(504,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'504.pdf',1),
(505,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'505.pdf',1),
(506,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'506.pdf',1),
(507,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'507.pdf',1),
(508,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'508.pdf',1),
(509,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'509.pdf',1),
(510,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'510.pdf',1),
(511,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'511.pdf',1),
(512,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'512.pdf',1),
(513,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'513.pdf',1),
(514,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'514.pdf',1),
(515,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'515.pdf',1),
(516,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'516.pdf',1),
(517,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'517.pdf',1),
(518,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'518.pdf',1),
(519,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'519.pdf',1),
(520,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'520.pdf',1),
(521,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'521.pdf',1),
(522,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'522.pdf',1),
(523,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'523.pdf',1),
(524,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'524.pdf',1),
(525,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'525.pdf',1),
(526,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'526.pdf',1),
(527,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'527.pdf',1),
(528,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'528.pdf',1),
(529,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'529.pdf',1),
(530,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'530.pdf',1),
(531,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'531.pdf',1),
(532,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'532.pdf',1);

/*Table structure for table `calc_result` */

DROP TABLE IF EXISTS `calc_result`;

CREATE TABLE `calc_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `registery_fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repayment_date_inp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_payment_opt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outstanding_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effective_interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_credit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_rate_inp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_maturity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `calc_result` */

insert  into `calc_result`(`id`,`kunden_id`,`loan_period`,`payment_month`,`payment_year`,`payment_discount`,`borrowing_rate`,`montly_deposit_val`,`annual_unsheduled_month`,`annual_unsheduled_year`,`annual_unsheduled_val`,`annual_to_month`,`annual_to_year`,`onetime_unsheduled_month`,`onetime_unsheduled_year`,`onetime_unsheduled_val`,`new_borrowing_rate`,`new_repayment_rate_inp`,`created_at`,`updated_at`,`registery_fees`,`payment_amount`,`repayment_date_inp`,`message_payment_opt`,`outstanding_balance`,`effective_interest`,`connection_credit`,`new_rate_inp`,`total_maturity`) values 
(12,'1','7','10','2022','0','2','1.050,00','9','2023','100','9','2024','4','2019','0','7','2',NULL,NULL,'585,00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `calculation` */

DROP TABLE IF EXISTS `calculation`;

CREATE TABLE `calculation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `angebotdate` date DEFAULT NULL,
  `kunden_id` int(191) NOT NULL,
  `enabled` tinyint(2) NOT NULL DEFAULT 1,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `calculation` */

insert  into `calculation`(`id`,`angebotdate`,`kunden_id`,`enabled`,`prepared_by`,`bank`,`annuities`,`to_interest`,`effectiveness`,`fixed_interest_rates`,`monthly_loan`,`residual_debt_interest_rate`,`calculated_luaf_time`,`net_loan_amount`,`initial_interest`,`optional_sound_recovery`,`created_at`,`updated_at`) values 
(1,'2019-04-04',1,1,5,'Deutsche Bank','ausgesetzt','2%','2','10 Jahre','917,29','200.970,44','33 Jahre, 5 Monate','325.500','1%','2%','2019-04-03 19:01:07','2019-06-19 15:54:36');

/*Table structure for table `checklist_categories` */

DROP TABLE IF EXISTS `checklist_categories`;

CREATE TABLE `checklist_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checklist_categories` */

insert  into `checklist_categories`(`id`,`name`,`is_active`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Test',1,'2019-06-17 16:11:30','2019-06-17 16:10:27','2019-06-17 16:11:30'),
(2,'Persönliche Unterlagen',1,NULL,'2019-06-17 16:11:36','2019-06-17 16:11:36'),
(3,'Einnahmen',1,NULL,'2019-06-17 16:12:11','2019-06-17 16:12:11'),
(4,'Ausgaben',1,NULL,'2019-06-17 16:21:11','2019-06-17 16:21:11'),
(5,'Verbindlichkeiten',1,NULL,'2019-06-17 16:33:16','2019-06-17 16:33:16'),
(6,'Finanzierungsobjekt',1,NULL,'2019-06-17 16:33:31','2019-06-17 16:33:31'),
(7,'Vermögen',1,NULL,'2019-06-17 16:39:56','2019-06-17 16:39:56');

/*Table structure for table `checklist_ehepartner` */

DROP TABLE IF EXISTS `checklist_ehepartner`;

CREATE TABLE `checklist_ehepartner` (
  `kunden_id` int(10) unsigned NOT NULL,
  `checklist_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checklist_ehepartner` */

insert  into `checklist_ehepartner`(`kunden_id`,`checklist_id`) values 
(1,1),
(1,10),
(1,11),
(1,12),
(1,14),
(1,17),
(1,21),
(1,23),
(1,40),
(1,36),
(1,15),
(1,16),
(1,41),
(1,6),
(1,4),
(1,5),
(1,32),
(100,200);

/*Table structure for table `checklist_kunden` */

DROP TABLE IF EXISTS `checklist_kunden`;

CREATE TABLE `checklist_kunden` (
  `kunden_id` int(10) unsigned NOT NULL,
  `checklist_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checklist_kunden` */

insert  into `checklist_kunden`(`kunden_id`,`checklist_id`) values 
(1,2),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,31),
(1,39),
(1,38),
(1,32),
(1,27),
(1,35),
(1,4);

/*Table structure for table `checklists` */

DROP TABLE IF EXISTS `checklists`;

CREATE TABLE `checklists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checklists` */

insert  into `checklists`(`id`,`body`,`category_id`,`is_active`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Test',0,1,'2019-06-12 16:02:41','2019-06-12 12:35:45','2019-06-12 16:02:41'),
(2,'Test 2',0,1,'2019-06-12 16:02:42','2019-06-12 12:35:51','2019-06-12 16:02:42'),
(3,'TEST',1,1,'2019-06-17 16:10:38','2019-06-17 16:10:32','2019-06-17 16:10:38'),
(4,'Kopie Ausweis in Farbe beidseitig',2,1,NULL,'2019-06-17 16:11:47','2019-06-17 16:11:47'),
(5,'Anbei Darlehensanfrage (bitte ausfüllen und gegenzeichnen)',2,1,NULL,'2019-06-17 16:12:03','2019-06-17 16:12:03'),
(6,'Lohn- / Gehaltsabrechnungen (die letzten 3)',3,1,NULL,'2019-06-17 16:12:34','2019-06-17 16:12:34'),
(7,'Abrechnungen Nebentätigkeit (die letzten 3)',3,1,NULL,'2019-06-17 16:12:57','2019-06-17 16:17:31'),
(8,'Bezügemitteilungen (die letzte)',3,1,NULL,'2019-06-17 16:17:24','2019-06-17 16:17:24'),
(9,'Lohnsteuerbescheinigung  Vorjahr oder Dezember-Abrechnung des Vorjahres',3,1,NULL,'2019-06-17 16:17:43','2019-06-17 16:17:47'),
(10,'Letzter vorliegender Einkommensteuerbescheid mit dazugehöriger Erklärung (inkl. aller Anlagen)',3,1,NULL,'2019-06-17 16:19:00','2019-06-17 16:19:20'),
(11,'Ihre letzten 3 Bilanzen / Gewinnermittlungen sowie die aktuelle BWA mit Summen- und Saldenliste',3,1,NULL,'2019-06-17 16:19:15','2019-06-17 16:19:15'),
(12,'Elterngeldbescheid',3,1,NULL,'2019-06-17 16:19:32','2019-06-17 16:19:32'),
(13,'Elterngeldbescheid',3,1,'2019-06-17 16:19:53','2019-06-17 16:19:48','2019-06-17 16:19:53'),
(14,'Nachweis sonstige Einkünfte',3,1,NULL,'2019-06-17 16:20:07','2019-06-17 16:20:07'),
(15,'Aktuelle Renteninformation / Versorgungsauskunft / Beamtenpension / Nachweis privater Rentenversicherungen',3,1,NULL,'2019-06-17 16:20:39','2019-06-17 16:20:39'),
(16,'Mietaufstellung inkl. Nettokaltmieten',3,1,NULL,'2019-06-17 16:20:51','2019-06-17 16:20:51'),
(17,'Kopie Mietverträge',3,1,NULL,'2019-06-17 16:21:01','2019-06-17 16:21:01'),
(18,'Nachweis private Krankenversicherung',4,1,NULL,'2019-06-17 16:32:07','2019-06-17 16:32:07'),
(19,'Bei bestehenden Immobilienfinanzierungen Kopien der Darlehensverträge mit  letztem Jahreskontoauszug oder aktueller Restschuld',4,1,NULL,'2019-06-17 16:32:19','2019-06-17 16:32:47'),
(20,'Nachweis Unterhaltsverpflichtungen',4,1,NULL,'2019-06-17 16:32:25','2019-06-17 16:32:44'),
(21,'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc',4,1,NULL,'2019-06-17 16:32:41','2019-06-17 16:32:41'),
(22,'Kreditverträge Privatkredite bzw. Leasingverträge mit Angabe der monatlichen Belastung  und  letzter Jahreskontoauszug  oder aktueller Restschuld',5,1,NULL,'2019-06-17 16:33:01','2019-06-17 16:33:21'),
(23,'Exposé oder Link zur Immobilie',6,1,NULL,'2019-06-17 16:33:40','2019-06-17 16:34:59'),
(24,'Farbfotos von außen',6,1,NULL,'2019-06-17 16:33:45','2019-06-17 16:34:51'),
(25,'Baubeschreibung',6,1,NULL,'2019-06-17 16:33:50','2019-06-17 16:34:46'),
(26,'Grundstückskaufvertrag',6,1,NULL,'2019-06-17 16:33:57','2019-06-17 16:34:43'),
(27,'Grundbuchauszug (nicht älter als 3 Monate)',6,1,NULL,'2019-06-17 16:34:10','2019-06-17 16:34:41'),
(28,'Aktuelle Flurkarte / Lageplan',6,1,NULL,'2019-06-17 16:35:11','2019-06-17 16:35:11'),
(29,'Bemaßte Baupläne (Grundriss / Ansicht / Schnitt)',6,1,NULL,'2019-06-17 16:35:20','2019-06-17 16:35:20'),
(30,'Wohnflächenberechnung',6,1,NULL,'2019-06-17 16:35:30','2019-06-17 16:35:30'),
(31,'Bruttogrundfläche (BGF)',6,1,NULL,'2019-06-17 16:35:45','2019-06-17 16:35:45'),
(32,'Erbbaurechtsvertrag',6,1,NULL,'2019-06-17 16:35:54','2019-06-17 16:35:54'),
(33,'Erbpachtvertrag',6,1,NULL,'2019-06-17 16:36:06','2019-06-17 16:36:06'),
(34,'Bei Eigentumswohnungen: Teilungserklärung mit Aufteilungsplan',6,1,NULL,'2019-06-17 16:37:32','2019-06-17 16:37:32'),
(35,'Baukostenaufstellung (Architekt / Bauträger)',6,1,NULL,'2019-06-17 16:38:04','2019-06-17 16:38:04'),
(36,'Aufstellung der geplanten Eigenleistungen',6,1,NULL,'2019-06-17 16:38:12','2019-06-17 16:38:12'),
(37,'Detaillierte Aufstellung evtl. geplanter Modernisierungskosten',6,1,NULL,'2019-06-17 16:38:20','2019-06-17 16:38:20'),
(38,'Mietaufstellung inkl. Nettokaltmieten',6,1,NULL,'2019-06-17 16:38:30','2019-06-17 16:38:30'),
(39,'Kopie Mietverträge',6,1,'2019-06-18 17:07:16','2019-06-17 16:39:06','2019-06-18 17:07:16'),
(40,'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc',7,1,NULL,'2019-06-17 16:40:30','2019-06-17 16:40:30'),
(41,'Grundbuchauszug bei weiterem Immobilienbesitz',7,1,NULL,'2019-06-17 16:40:41','2019-06-17 16:40:41'),
(42,'Mietverträge',6,1,NULL,'2019-06-18 17:07:25','2019-06-18 17:07:25');

/*Table structure for table `customer_timelines` */

DROP TABLE IF EXISTS `customer_timelines`;

CREATE TABLE `customer_timelines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kundens_id` int(10) unsigned NOT NULL,
  `calculation_id` int(10) unsigned NOT NULL,
  `darlehen` int(11) NOT NULL,
  `zinsstaz` int(11) NOT NULL,
  `tilgung` int(11) NOT NULL,
  `laufzeit` int(11) NOT NULL,
  `rate_monatl` int(11) NOT NULL,
  `restschuld` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customer_timelines` */

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `street_num` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`address`,`postal_code`,`city`,`street`,`street_num`,`created_at`,`updated_at`) values 
(1,'Nettetal - Kintzelmann','dssdf',47906,'Nordrhein-Westfalen - Kempen','Görtschesweg',4,'2019-02-26 13:40:18','2019-02-26 13:40:18'),
(2,'Hückelhoven - Sternad',NULL,12345,'Hückelhoven','Hückelstraße',3,'2019-02-26 13:50:21','2019-02-26 13:50:21');

/*Table structure for table `immobilies` */

DROP TABLE IF EXISTS `immobilies`;

CREATE TABLE `immobilies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kaufpreis` int(11) NOT NULL,
  `kosten_umbau_modernisierung` int(11) NOT NULL,
  `kosten_notar_grundbuch` int(11) NOT NULL,
  `grunderwerbssteuer` int(11) NOT NULL,
  `maklerkosten` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `immobilies` */

/*Table structure for table `kundens` */

DROP TABLE IF EXISTS `kundens`;

CREATE TABLE `kundens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
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
  `ehepartner_enabled` tinyint(2) DEFAULT 0,
  `ehepartner_vorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_nachname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_telefon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_geburtsdatum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kundens` */

insert  into `kundens`(`id`,`created_at`,`updated_at`,`user_id`,`vorname`,`nachname`,`strasse`,`plz`,`wohnort`,`mail`,`telefon`,`geburtsdatum`,`kaufpreis`,`kostenumbau`,`kostennotar`,`grunderwerbssteuer`,`maklerkosten`,`gesamtkosten`,`eigenkapital`,`finanzierungsbedarf`,`ehepartner_enabled`,`ehepartner_vorname`,`ehepartner_nachname`,`ehepartner_mail`,`ehepartner_telefon`,`ehepartner_geburtsdatum`) values 
(1,'2019-02-26 13:40:55','2019-09-18 17:31:03',5,'Patrick','Dierig','Görtschesweg, 4',47906,'Nordrhein-Westfalen - Kempen','p-dierig@einfachmedial.de','015204967292','2017-10-30','250000','0','2','6','4','280000.00','0','280000.00',0,'Bettina','Dierig','p-dierig@einfachmedial.de','015204967292','1993-02-12');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2018_11_21_101915_create_tests_table',1),
(2,'2018_11_21_130836_create_timeline',2),
(3,'2018_11_21_134854_update_zeitstrahl_tabelle',3),
(4,'2018_11_21_161940_update_zeitstrahl_tabelle_zwei',4),
(5,'2019_06_11_055129_create_checklists_table',5),
(6,'2019_06_12_092208_create_checklist_ehepartner_table',6),
(7,'2019_06_12_112354_add_category_column_to_checklists_table',7),
(8,'2019_06_13_044648_create_checklist_categories_table',8),
(9,'2019_06_18_123018_create_customer_timelines_table',9),
(11,'2019_08_24_100742_create_calc_result_table',10),
(12,'2019_08_26_100613_add_two_columns_to_repayments_table',11);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('p-dierig@einfachmedial.de','$2y$10$JyeHPWr3pd.uj1BKuUVxouxgZUl.jdviX6QPo9u61F49fsStB25jm','2019-06-05 15:51:46');

/*Table structure for table `repayments` */

DROP TABLE IF EXISTS `repayments`;

CREATE TABLE `repayments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zinsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tilgung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `darlehensrest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `repayment_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonder_tilgung` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3482 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `repayments` */

insert  into `repayments`(`id`,`created_at`,`updated_at`,`zinsen`,`tilgung`,`darlehensrest`,`kundens_id`,`repayment_date`,`rate`,`sonder_tilgung`) values 
(3397,'2019-09-18 18:00:15','2019-09-18 18:00:15','__','__','280000',1,'10/2022','__','__'),
(3398,'2019-09-18 18:00:15','2019-09-18 18:00:15','466.67','54366.66','225633.34',1,'11/2022','54833.33','0.00'),
(3399,'2019-09-18 18:00:15','2019-09-18 18:00:15','376.06','54457.27','171176.06',1,'12/2022','54833.33','0.00'),
(3400,'2019-09-18 18:00:15','2019-09-18 18:00:15','285.29','54548.04','116628.03',1,'1/2023','54833.33','0.00'),
(3401,'2019-09-18 18:00:15','2019-09-18 18:00:15','194.38','54638.95','61989.08',1,'2/2023','54833.33','0.00'),
(3402,'2019-09-18 18:00:15','2019-09-18 18:00:15','103.32','54730.01','7259.06',1,'3/2023','54833.33','0.00'),
(3403,'2019-09-18 18:00:15','2019-09-18 18:00:15','12.10','7259.06','0.00',1,'4/2023','7271.16','0.00'),
(3404,'2019-09-18 18:00:15','2019-09-18 18:00:15','0.00','0.00','0.00',1,'5/2023','0.00','0.00'),
(3405,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'6/2023','0.00','0.00'),
(3406,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'7/2023','0.00','0.00'),
(3407,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'8/2023','0.00','0.00'),
(3408,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','100.00','0.00',1,'9/2023','0.00','100.00'),
(3409,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'10/2023','0.00','0.00'),
(3410,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'11/2023','0.00','0.00'),
(3411,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'12/2023','0.00','0.00'),
(3412,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'1/2024','0.00','0.00'),
(3413,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'2/2024','0.00','0.00'),
(3414,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'3/2024','0.00','0.00'),
(3415,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'4/2024','0.00','0.00'),
(3416,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'5/2024','0.00','0.00'),
(3417,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'6/2024','0.00','0.00'),
(3418,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'7/2024','0.00','0.00'),
(3419,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','0.00','0.00',1,'8/2024','0.00','0.00'),
(3420,'2019-09-18 18:00:16','2019-09-18 18:00:16','0.00','100.00','0.00',1,'9/2024','0.00','100.00'),
(3421,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'10/2024','0.00','0.00'),
(3422,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'11/2024','0.00','0.00'),
(3423,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'12/2024','0.00','0.00'),
(3424,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'1/2025','0.00','0.00'),
(3425,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'2/2025','0.00','0.00'),
(3426,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'3/2025','0.00','0.00'),
(3427,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'4/2025','0.00','0.00'),
(3428,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'5/2025','0.00','0.00'),
(3429,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'6/2025','0.00','0.00'),
(3430,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'7/2025','0.00','0.00'),
(3431,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'8/2025','0.00','0.00'),
(3432,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'9/2025','0.00','0.00'),
(3433,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'10/2025','0.00','0.00'),
(3434,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'11/2025','0.00','0.00'),
(3435,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'12/2025','0.00','0.00'),
(3436,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'1/2026','0.00','0.00'),
(3437,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'2/2026','0.00','0.00'),
(3438,'2019-09-18 18:00:17','2019-09-18 18:00:17','0.00','0.00','0.00',1,'3/2026','0.00','0.00'),
(3439,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'4/2026','0.00','0.00'),
(3440,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'5/2026','0.00','0.00'),
(3441,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'6/2026','0.00','0.00'),
(3442,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'7/2026','0.00','0.00'),
(3443,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'8/2026','0.00','0.00'),
(3444,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'9/2026','0.00','0.00'),
(3445,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'10/2026','0.00','0.00'),
(3446,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'11/2026','0.00','0.00'),
(3447,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'12/2026','0.00','0.00'),
(3448,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'1/2027','0.00','0.00'),
(3449,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'2/2027','0.00','0.00'),
(3450,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'3/2027','0.00','0.00'),
(3451,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'4/2027','0.00','0.00'),
(3452,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'5/2027','0.00','0.00'),
(3453,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'6/2027','0.00','0.00'),
(3454,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'7/2027','0.00','0.00'),
(3455,'2019-09-18 18:00:18','2019-09-18 18:00:18','0.00','0.00','0.00',1,'8/2027','0.00','0.00'),
(3456,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'9/2027','0.00','0.00'),
(3457,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'10/2027','0.00','0.00'),
(3458,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'11/2027','0.00','0.00'),
(3459,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'12/2027','0.00','0.00'),
(3460,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'1/2028','0.00','0.00'),
(3461,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'2/2028','0.00','0.00'),
(3462,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'3/2028','0.00','0.00'),
(3463,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'4/2028','0.00','0.00'),
(3464,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'5/2028','0.00','0.00'),
(3465,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'6/2028','0.00','0.00'),
(3466,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'7/2028','0.00','0.00'),
(3467,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'8/2028','0.00','0.00'),
(3468,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'9/2028','0.00','0.00'),
(3469,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'10/2028','0.00','0.00'),
(3470,'2019-09-18 18:00:19','2019-09-18 18:00:19','0.00','0.00','0.00',1,'11/2028','0.00','0.00'),
(3471,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'12/2028','0.00','0.00'),
(3472,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'1/2029','0.00','0.00'),
(3473,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'2/2029','0.00','0.00'),
(3474,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'3/2029','0.00','0.00'),
(3475,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'4/2029','0.00','0.00'),
(3476,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'5/2029','0.00','0.00'),
(3477,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'6/2029','0.00','0.00'),
(3478,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'7/2029','0.00','0.00'),
(3479,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'8/2029','0.00','0.00'),
(3480,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'9/2029','0.00','0.00'),
(3481,'2019-09-18 18:00:20','2019-09-18 18:00:20','0.00','0.00','0.00',1,'10/2029','0.00','0.00');

/*Table structure for table `tests` */

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hobby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tests` */

insert  into `tests`(`id`,`hobby`,`kundens_id`,`created_at`,`updated_at`) values 
(1,'hobby test name',1,'2018-11-21 23:37:51','2018-11-21 23:37:51'),
(2,'hobby test name1',1,'2018-11-21 23:38:18','2018-11-21 23:38:18'),
(3,'hobby test name2_2',2,'2018-11-21 23:40:12','2018-11-21 23:40:12');

/*Table structure for table `timeline` */

DROP TABLE IF EXISTS `timeline`;

CREATE TABLE `timeline` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `restschuld_ende` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `timeline` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` int(11) DEFAULT 0,
  `group` int(11) DEFAULT 0,
  `admin` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`surname`,`phone`,`mail_address`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`status`,`group`,`admin`) values 
(5,'Admin User','admin@admin.com','admin','1234','homezcasdfsdfas',NULL,'$2y$10$C.aRlHjyGj0.ixSzp81Lo.6DQcV9Ii9vx3jRQbA.OQp34RiyFKhOG','xoOTPfUQXUPXxAk8NOQrgzb4g3SSeUBXpNmgLrTGMY3XdzHmQP3bXex1CIoz','2019-02-18 20:53:29','2019-02-25 16:03:49',1,1,1),
(27,'Patrick','p-dierig@einfachmedial.de','Dierig','015204967292','p-dierig@einfachmedial.de',NULL,'$2y$10$fOTD1gNVZmPS6GV6WwanXu0ZZI.3IiEPw0bxXrVSjBs3Z6WS4BZ8S',NULL,'2019-02-26 13:38:34','2019-02-26 13:40:30',1,1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
