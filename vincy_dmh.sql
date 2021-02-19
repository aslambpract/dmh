-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2020 at 11:35 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vincy_dmh`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `company_address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email_address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bpract.jpg',
  `logo_ico` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bpract.jpg',
  `theme` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `company_name`, `company_address`, `email_address`, `logo`, `logo_ico`, `theme`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cloud MLM Software', 'Calicut, India', 'info@cloudmlmsoftware.com', 'dalsarulogo.png', 'dalsarulogo.png', 'default', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auto_response`
--

CREATE TABLE `auto_response` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `campaign` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup_settings`
--

CREATE TABLE `backup_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `backup_settings`
--

INSERT INTO `backup_settings` (`id`, `client_id`, `client_secret`, `refresh_token`, `folder_id`, `created_at`, `updated_at`) VALUES
(1, '828786941446-6e34n7mt35evlp8u80957oqbbtu9abn7.apps.googleusercontent.com', 'oRRj90uKoFQyDR0Jt3dUOV89', '1/YVBXwjj2tzT75HmMRSPEl0g6oo54OPEoOrJz9rbQBSU', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `binary_commission_settings`
--

CREATE TABLE `binary_commission_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pair_value` double DEFAULT '100',
  `pair_commission` text COLLATE utf8mb4_unicode_ci,
  `pair_commission_percent` text COLLATE utf8mb4_unicode_ci,
  `binary_cap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `ceiling` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `binary_commission_settings`
--

INSERT INTO `binary_commission_settings` (`id`, `period`, `type`, `pair_value`, `pair_commission`, `pair_commission_percent`, `binary_cap`, `ceiling`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'instant', 'fixed', 100, '[\"10\",\"20\",\"30\"]', '[\"10\",\"20\",\"30\"]', 'no', 10, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `binary_pending`
--

CREATE TABLE `binary_pending` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_ip`
--

CREATE TABLE `block_ip` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_groups`
--

CREATE TABLE `campaign_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `campaign_groups`
--

INSERT INTO `campaign_groups` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'default', 'default', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carry_forward_history`
--

CREATE TABLE `carry_forward_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_left` double(15,2) NOT NULL DEFAULT '0.00',
  `total_right` double(15,2) NOT NULL DEFAULT '0.00',
  `left` double(15,2) NOT NULL DEFAULT '0.00',
  `right` double(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `identification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `expiry` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `tds` double NOT NULL,
  `service_charge` double NOT NULL,
  `payable_amount` double NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_3166_2` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT '0',
  `calling_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `format`, `exchange_rate`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'US Dollar', 'USD', '$', '1,0.00 F.CFA', 1, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Euro', 'EUR', '€', '1,0.00 F.CFA', 0.8397749919, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'British Pound', 'GBP', '£', '1,0.00 F.CFA', 0.769465909, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Indian Rupee', 'INR', '₹', '1,0.00 F.CFA', 64.1340410473, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'Australian Dollar', 'AUD', 'A$', '1,0.00 F.CFA', 1.2463121412, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'Canadian Dollar', 'CAD', 'C$', '1,0.00 F.CFA', 1.23610813, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'Singapore Dollar', 'SGD', 'S$', '1,0.00 F.CFA', 1.3526211686, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 'Malaysian Ringgit', 'MYR', 'RM', '1,0.00 F.CFA', 4.2617085601, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 'Japanese Yen', 'JPY', '¥', '1,0.00 F.CFA', 109.1473166611, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(10, 'Chinese Yuan Renminbi', 'CNY', '¥', '1,0.00 F.CFA', 6.5427432429, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(11, 'New Zealand Dollar', 'NZD', '$', '1,0.00 F.CFA', 1.3804191338, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(12, 'Indonesian Rupiah', 'IDR', 'Rp', '1,0.00 F.CFA', 13331.063821056, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(13, 'Saudi Arabian Riyal', 'SAR', '﷼', '1,0.00 F.CFA', 3.7513558992, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(14, 'Brazilian Real', 'BRL', 'R$', '1,0.00 F.CFA', 3.1184158028, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(15, 'South African Rand', 'ZAR', 'R', '1,0.00 F.CFA', 12.8703691948, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `debit_table`
--

CREATE TABLE `debit_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `tds` double NOT NULL,
  `service_charge` double NOT NULL,
  `payable_amount` double NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_tracking_details`
--

CREATE TABLE `delivery_tracking_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `direct_sponsor_bonus`
--

CREATE TABLE `direct_sponsor_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '1',
  `pv` int(11) NOT NULL DEFAULT '0',
  `rs` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_upload`
--

CREATE TABLE `document_upload` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `from_email`, `from_name`, `subject`, `type`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'baffour@thedreammakershome.com', 'dreammakershome', 'Welcome to dreammakershome', 'register', '<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p> \r\n\r\n        	   <p> but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_marketing_autoresponders`
--

CREATE TABLE `email_marketing_autoresponders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default title',
  `campaign` int(11) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `unique_clicks` int(11) NOT NULL DEFAULT '0',
  `total_clicks` int(11) NOT NULL DEFAULT '0',
  `days` int(11) NOT NULL DEFAULT '0',
  `hours` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `email_marketing_campaigns`
--

CREATE TABLE `email_marketing_campaigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` date NOT NULL,
  `campaignemail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `email_marketing_contacts`
--

CREATE TABLE `email_marketing_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_id` int(11) DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `email_marketing_contact_lists`
--

CREATE TABLE `email_marketing_contact_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

CREATE TABLE `email_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incoming_server` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incoming_port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outgoing_server` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outgoing_port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `host`, `port`, `username`, `password`, `incoming_server`, `incoming_port`, `outgoing_server`, `outgoing_port`, `from_name`, `from_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'smtp.mailtrap.io', '587', 'df7a36be62e323', 'fd582df97201c2', '', '', '', '', 'cloudmlmsoftware', 'info@cloudmlmsoftware.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `notify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `subject`, `body`, `type`, `status`, `notify`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'An administrator created an account for you', ' A site administrator  has created an account for you. You may now log in by clicking this link below This link can only be used once to log in and will lead you to a page where you can set your password', 'user_by_admin', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Account details for [user:name] at [site:name] (pending admin approval)', '[user:name],Thank you for registering at [site:name]. Your application for an account is currently pending approval. Once it has been approved, you will receive another e-mail containing information about how to log in, set your password, and other details.\r\n                --  [site:name] team', 'awaiting_approval', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'Account details for [user:name] at [site:name]', '[user:name],Thank you for registering at [site:name]. You may now log in by clicking this link or copying and pasting it to your browser: [user:one-time-login-url] This link can only be used once to log in and will lead you to a page where you can set your password. After setting your password, you will be able to log in at [site:login-url] in the future using: username: [user:name] password: Your password--  [site:name] team', 'no_approval', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Account details for [user:name] at [site:name] (approved)', '[user:name], Your account at [site:name] has been activated. You may now log in by clicking this link or copying and pasting it into your browser: [user:one-time-login-url] This link can only be used once to log in and will lead you to a page where you can set your password. After setting your password, you will be able to log in at [site:login-url] in the future using: username: [user:name] password: Your password --  [site:name] team', 'account_activation', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'An administrator created an account for you at [site:name]', '[user:name], Your account on [site:name] has been blocked. --  [site:name] team', 'account_blocked', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'Account cancellation request for [user:name] at [site:name]', '[user:name], A request to cancel your account has been made at [site:name]. You may now cancel your account on [site:url-brief] by clicking this link or copying and pasting it into your browser: [user:cancel-url] NOTE: The cancellation of your account is not reversible. This link expires in one day and nothing will happen if it is not used.--  [site:name] team', 'cancel_confirm', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'Account details for [user:name] at [site:name] (canceled)', '[user:name],Your account on [site:name] has been canceled.--  [site:name] team', 'account_canceled', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 'Replacement login information for [user:name] at [site:name]', '[user:name],A request to reset the password for your account has been made at [site:name].You may now log in by clicking this link or copying and pasting it to your browser:[user:one-time-login-url]This link can only be used once to log in and will lead you to a page where you can set your password. It expires after one day and nothing will happen if its not used. --  [site:name] team', 'password_recovery', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 'Payout Notification', ' Your payout Amount request has been approved ', 'payout_notify', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(10, 'Payout Request Notification', '[user:name] request an amount of [user:amount] ', 'payout_request_notify', 'no', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_videos`
--

CREATE TABLE `event_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ewallet_settings`
--

CREATE TABLE `ewallet_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `bitcoin_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(15,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ewallet_settings`
--

INSERT INTO `ewallet_settings` (`id`, `bitcoin_address`, `type`, `balance`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'registration_wallet', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(2, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'admin_wallet', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'position_wallet', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'account_system', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(5, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'account_reactivated', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(6, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'position_infinity_btc', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(7, '2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm', 'special_wallet', 0.00000000, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `fund_transfer`
--

CREATE TABLE `fund_transfer` (
  `id` int(10) UNSIGNED NOT NULL,
  `debit_user_id` bigint(20) UNSIGNED NOT NULL,
  `credit_user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `mimetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filesize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnailable` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_album` tinyint(1) NOT NULL DEFAULT '0',
  `album_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_table`
--

CREATE TABLE `invoice_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_slip` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `payment_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kb_article`
--

CREATE TABLE `kb_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `publish_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kb_article_relationship`
--

CREATE TABLE `kb_article_relationship` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kb_category`
--

CREATE TABLE `kb_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kb_comment`
--

CREATE TABLE `kb_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kb_pages`
--

CREATE TABLE `kb_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kb_settings`
--

CREATE TABLE `kb_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `pagination` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `leader_ship`
--

CREATE TABLE `leader_ship` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '1',
  `level_1` int(11) NOT NULL DEFAULT '0',
  `level_2` int(11) NOT NULL DEFAULT '0',
  `level_3` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leader_ship`
--

INSERT INTO `leader_ship` (`id`, `package_id`, `level_1`, `level_2`, `level_3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 0, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 2, 5, 5, 0, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 3, 5, 5, 5, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_capture`
--

CREATE TABLE `lead_capture` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_commission_settings`
--

CREATE TABLE `level_commission_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nlevel_1` double DEFAULT NULL,
  `nlevel_2` double DEFAULT NULL,
  `nlevel_3` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `level_commission_settings`
--

INSERT INTO `level_commission_settings` (`id`, `type`, `criteria`, `nlevel_1`, `nlevel_2`, `nlevel_3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fixed', 'yes', 6, 5, 4, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level_settings`
--

CREATE TABLE `level_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `package` int(11) NOT NULL,
  `commission_level1` double DEFAULT NULL,
  `commission_level2` double DEFAULT NULL,
  `commission_level3` double DEFAULT NULL,
  `matching_level1` double DEFAULT NULL,
  `matching_level2` double DEFAULT NULL,
  `matching_level3` double DEFAULT NULL,
  `sponsor_comm` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `level_settings`
--

INSERT INTO `level_settings` (`id`, `package`, `commission_level1`, `commission_level2`, `commission_level3`, `matching_level1`, `matching_level2`, `matching_level3`, `sponsor_comm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 12, 12, 14, 12, 12, 12, 8, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 2, 5, 8, 9, 5, 8, 9, 5, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 3, 15, 8, 19, 15, 8, 19, 3, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `load_position`
--

CREATE TABLE `load_position` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_of_positions` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_bonus`
--

CREATE TABLE `loyalty_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `personal_sales` double NOT NULL DEFAULT '0',
  `bonus_duration` int(11) NOT NULL DEFAULT '1',
  `bonus_percentage` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyalty_bonus`
--

INSERT INTO `loyalty_bonus` (`id`, `personal_sales`, `bonus_duration`, `bonus_percentage`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3000, 36, 7, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_users`
--

CREATE TABLE `loyalty_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pv` double(15,2) NOT NULL DEFAULT '0.00',
  `month` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `was_used` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `saved_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `source` text COLLATE utf8mb4_unicode_ci,
  `is_auto_added` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_user_locales`
--

CREATE TABLE `ltm_user_locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `locales` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_table`
--

CREATE TABLE `mail_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_subject` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `read` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `sender_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matching_bonus`
--

CREATE TABLE `matching_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matching_level1` double DEFAULT NULL,
  `matching_level2` double DEFAULT NULL,
  `matching_level3` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matching_bonus`
--

INSERT INTO `matching_bonus` (`id`, `type`, `criteria`, `matching_level1`, `matching_level2`, `matching_level3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fixed', 'yes', 6, 5, 4, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_settings`
--

CREATE TABLE `menu_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_settings`
--

INSERT INTO `menu_settings` (`id`, `menu_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Register new', 'yes', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Login', 'yes', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_11_26_161501_create_currency_table', 1),
(2, '2014_04_02_193005_create_translations_table', 1),
(3, '2014_06_01_095704_create_subscribers_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_26_05_100000_create_roles_table', 1),
(7, '2015_03_19_124805_add_src_reference_column_to_translations', 1),
(8, '2015_03_21_163127_add_original_column_to_ltr_translations', 1),
(9, '2015_07_17_172305_add_deleted_flag_to_translations', 1),
(10, '2015_08_27_161224_create_messages_table', 1),
(11, '2015_09_04_042723_tree_table', 1),
(12, '2015_09_08_054833_setup_countries_table', 1),
(13, '2015_09_08_054834_charify_countries_table', 1),
(14, '2015_09_11_062700_SettingsTable', 1),
(15, '2015_09_15_103018_user_balance', 1),
(16, '2015_09_16_044305_PointTable', 1),
(17, '2015_09_16_051401_PointsHistory', 1),
(18, '2015_09_21_095851_payout_request', 1),
(19, '2015_09_23_220523_add_was_used_flag', 1),
(20, '2015_09_27_221759_add_group_index_to_translations', 1),
(21, '2015_09_30_063317_voucher_request', 1),
(22, '2015_10_01_131458_voucher', 1),
(23, '2015_10_16_083156_create_ranksetting_table', 1),
(24, '2015_10_16_090530_create_rankhistory_table', 1),
(25, '2015_10_19_070833_mail_table', 1),
(26, '2015_10_20_095828_create_sponsortree_table', 1),
(27, '2015_11_09_104755_voucher_history', 1),
(28, '2015_11_13_093201_app_settings', 1),
(29, '2015_11_13_093201_options', 1),
(30, '2016_02_16_140450_create_kb_article_relationship_table', 1),
(31, '2016_02_16_140450_create_kb_article_table', 1),
(32, '2016_02_16_140450_create_kb_category_table', 1),
(33, '2016_02_16_140450_create_kb_comment_table', 1),
(34, '2016_02_16_140450_create_kb_pages_table', 1),
(35, '2016_02_16_140450_create_kb_settings_table', 1),
(36, '2016_02_16_140454_add_foreign_keys_to_kb_article_relationship_table', 1),
(37, '2016_02_16_140454_add_foreign_keys_to_kb_comment_table', 1),
(38, '2016_03_28_071144_create_packages_table', 1),
(39, '2016_03_29_062651_create_commision_table', 1),
(40, '2016_03_29_174941_create_purchase_history_table', 1),
(41, '2016_04_05_141956_create_sales_table', 1),
(42, '2016_04_09_060303_create_emails_table', 1),
(43, '2016_04_11_00352701_create_user_locales_table', 1),
(44, '2016_05_03_151338_create_table_loyalty_bonus', 1),
(45, '2016_05_03_174641_create_leader_ship_table', 1),
(46, '2016_05_03_220906_create_matching_bonus_table', 1),
(47, '2016_05_03_230906_create_direct_sponsor_bonus_table', 1),
(48, '2016_05_09_130902_create_package_update_history_table', 1),
(49, '2016_05_10_170205_create_loyalty_users_table', 1),
(50, '2016_05_17_224457_create_pairing_history_table', 1),
(51, '2016_05_18_124805_change_src_reference_column_in_translations', 1),
(52, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(53, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(54, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(55, '2016_06_01_000004_create_oauth_clients_table', 1),
(56, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(57, '2016_06_03_154402_create_carry_forward_history', 1),
(58, '2016_06_30_025236_create_code_table', 1),
(59, '2016_07_15_174738_creare_rs_history_table', 1),
(60, '2016_07_26_205839_create_fund_transfer_table', 1),
(61, '2016_07_28_152717_create_debit_table', 1),
(62, '2016_12_23_130224_create_email_setting_table', 1),
(63, '2016_16_05_000014_create_images_table', 1),
(64, '2017_01_02_173734_create_auto_response_table', 1),
(65, '2017_01_12_140102_create_lead_capture_table', 1),
(66, '2017_01_26_120100_create_document_upload_table', 1),
(67, '2017_03_27_182314_create_temp_reg_details_table', 1),
(68, '2017_03_27_192153_create_temp_details_table', 1),
(69, '2017_04_24_131503_create_payment_type_table', 1),
(70, '2017_04_26_175847_create_payoutNotification_table', 1),
(71, '2017_04_27_130229_create_menusettings_table', 1),
(72, '2017_05_25_145809_create_profile_infos_table', 1),
(73, '2017_09_15_135621_create_activity_log_table', 1),
(74, '2017_09_18_135621_create_notes_table', 1),
(75, '2017_09_23_000000_create_email_marketing_contacts_table', 1),
(76, '2017_09_23_000001_create_email_marketing_autoresponders_table', 1),
(77, '2017_09_23_000001_create_email_marketing_campaigns_table', 1),
(78, '2017_09_23_072905_create_sessions_table', 1),
(79, '2017_09_25_344522_vue_crud', 1),
(80, '2017_09_27_124032_create_ticket_tags_table', 1),
(81, '2017_09_27_124050_create_ticket_statuses_table', 1),
(82, '2017_09_27_124110_create_ticket_priorities_table', 1),
(83, '2017_09_27_124318_create_ticket_categories_table', 1),
(84, '2017_09_27_140350_create_ticket_comments_table', 1),
(85, '2017_09_27_173423_create_tickets_table', 1),
(86, '2017_09_27_175201_create_ticket_replies_table', 1),
(87, '2017_09_27_200043_create_ticket_departments_table', 1),
(88, '2017_09_27_200043_create_ticket_faqs_table', 1),
(89, '2017_09_28_200055_create_ticket_canned_responses_table', 1),
(90, '2017_09_29_300055_create_ticket_types_table', 1),
(91, '2018_07_22_115604_create_email_marketing_contact_lists_table', 1),
(92, '2019_03_09_082435_create_paypal_table', 1),
(93, '2019_03_27_085208_create_note_commission', 1),
(94, '2019_04_08_045653_create_product_table', 1),
(95, '2019_04_08_051932_create_orderproduct_table', 1),
(96, '2019_04_08_052417_create_order_table', 1),
(97, '2019_04_08_052755_create_shoppingaddress_table', 1),
(98, '2019_04_08_055028_create_product_addtocart_table', 1),
(99, '2019_04_09_042617_create_delivarytracking_table', 1),
(100, '2019_04_09_044830_create_invoice', 1),
(101, '2019_04_19_113328_create_block_ip', 1),
(102, '2019_05_08_065350_create_jobs_table', 1),
(103, '2019_05_09_080849_create_shoping_country_table', 1),
(104, '2019_05_09_081008_create_shoping_zone_table', 1),
(105, '2019_06_17_070215_create_category_table', 1),
(106, '2019_06_22_082932_create__hyperwallet_table', 1),
(107, '2019_06_24_051915_create_payoutmanagemt_table', 1),
(108, '2019_06_25_094310_create_payment_gateway_details_table', 1),
(109, '2019_06_28_055126_create_payout_history_table', 1),
(110, '2019_07_04_103755_create_payout_gateway_details_table', 1),
(111, '2019_07_13_084648_create_pending_transactions_table', 1),
(112, '2019_07_17_120124_create_campaign_groups_table', 1),
(113, '2019_08_08_054448_create_email_templates_table', 1),
(114, '2019_09_13_082739_create_news_table', 1),
(115, '2019_09_13_082804_create_videos_table', 1),
(116, '2019_09_14_040646_create_system_languages_table', 1),
(117, '2019_09_16_082847_create_backup_settings_table', 1),
(118, '2019_09_19_103016_create_event_videos_table', 1),
(119, '2019_09_20_051110_create_failed_jobs_table', 1),
(120, '2019_09_28_040452_create_binary_commission_settings_table', 1),
(121, '2019_09_28_092945_create_level_commission_settings_table', 1),
(122, '2019_09_28_103628_create_level_settings_table', 1),
(123, '2019_09_28_121523_create_sponsor_commission_table', 1),
(124, '2020_03_03_082952_add_approve_to_users_table', 1),
(125, '2020_03_03_083335_add_approved_to_users_table', 1),
(126, '2020_03_03_122545_user_doc', 1),
(127, '2020_03_03_123456_user_docs', 1),
(128, '2020_03_04_031847_add_file_upload_to_users_table', 1),
(129, '2020_03_05_084316_add_pv_to_rank_setting_table', 1),
(130, '2020_03_05_084553_add_new_bonus_to_rank_setting_table', 1),
(131, '2020_03_05_084938_add_capping_binary_to_rank_setting_table', 1),
(132, '2020_03_09_064630_add_next_purchase_date_purchase_history_table', 1),
(133, '2020_03_10_081625_create_salarysetting_table', 1),
(134, '2020_03_11_045004_create_riwardsetting_table', 1),
(135, '2020_03_13_075203_add_min_ratio_to_rank_setting', 1),
(136, '2020_03_13_081045_add_post_id_to_users', 1),
(137, '2020_03_13_090943_add_total_sales_volume_to_rank_setting', 1),
(138, '2020_03_13_092408_add_status_to_users', 1),
(139, '2020_03_13_093822_post_name', 1),
(140, '2020_03_13_112740_add_closing_date_to_salarysetting_table', 1),
(141, '2020_03_13_114144_add_sv_to_packages_table', 1),
(142, '2020_03_14_043129_add_price_to_product_table', 1),
(143, '2020_03_14_102118_signup_bonus_setting', 1),
(144, '2020_03_14_112822_add_riward_points_to_rank_setting', 1),
(145, '2020_03_17_115931_add_period_to_sponsor_commission_table', 1),
(146, '2020_03_23_065750_redemption_commission', 1),
(147, '2020_03_23_070751_add_redemption_balance_to_user_balance_table', 1),
(148, '2020_03_23_081302_salary_commission', 1),
(149, '2020_03_23_081825_add_salary_balance_to_user_balance_table', 1),
(150, '2020_03_23_082944_add_reward_balance_to_user_balance_table', 1),
(151, '2020_03_23_120518_reward_commission', 1),
(152, '2020_03_23_121657_ewallet_settings', 1),
(153, '2020_03_31_041730_add_product_to_purchase_history_table', 1),
(154, '2020_04_03_035543_add_left_rf_count_to_users_table', 1),
(155, '2020_04_03_035937_add_right_rf_count_to_users_table', 1),
(156, '2020_04_04_132519_pending_commission', 1),
(157, '2020_04_04_145144_pending_commission1', 1),
(158, '2020_04_04_173354_binary_pending', 1),
(159, '2020_04_06_085908_add_l_to_point_table_table', 1),
(160, '2020_04_07_111439_add_give_sp_cm_to_pending_commission1_table', 1),
(161, '2020_04_08_072642_add_sp_package_empty_to_users_table', 1),
(162, '2020_04_09_024537_pending_binary_commission', 1),
(163, '2020_04_09_032030_add_left_user_id_to_users_table', 1),
(164, '2020_04_09_105513_signup_bonus', 1),
(165, '2020_04_11_050721_add_approve_to_order_table', 1),
(166, '2020_04_11_064512_add_approve_to_purchase_history_table', 1),
(167, '2020_04_18_070628_sponsor_commission_pending', 1),
(168, '2020_04_22_063235_add_new_colums_table', 1),
(169, '2020_04_23_042430_user_accounts', 1),
(170, '2020_04_23_044713_tree_table2', 1),
(171, '2020_04_23_045152_tree_table3', 1),
(172, '2020_04_24_085456_add_account_id_to_commission_table', 1),
(173, '2020_04_25_050658_pending_table', 1),
(174, '2020_04_28_065258_from_id_to_pending_table_table', 1),
(175, '2020_04_28_113932_add_bitcoin_address_to_users_table', 1),
(176, '2020_04_28_124357_add_type_to_ewallet_settings_table', 1),
(177, '2020_04_30_040450_load_position', 1),
(178, '2020_05_01_090333_add_payout_to_packages_table', 1),
(179, '2020_05_02_124143_add_approved_to_user_accounts_table', 1),
(180, '2020_05_02_135252_re_activation', 1),
(181, '2020_05_09_082805_create_transactions_table', 1),
(182, '2020_07_07_102806_create_tree_table4nd5', 1),
(183, '2020_08_21_065928_create_stages_table', 1),
(184, '2020_08_21_080211_add_stages_to_packages_table', 1),
(185, '2020_08_24_080029_create_tree_table6nd18', 1),
(186, '2020_09_11_090904_create_pending_temp_table', 1),
(187, '2020_10_08_093301_add_id_number_to_pending_transactions', 1),
(188, '2020_10_08_094929_alter_table_users', 1),
(189, '2020_10_10_111647_add_bank_name_to_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `color` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'app.company_name', 'options.app.company_name', 'Cloud MLM Software', '', 'text', 1, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'app.company_email', 'options.app.company_email', 'info@cloudmlmsoftware.com', '', 'text', 2, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'app.company_address', 'options.app.company_address', 'Cloud MLM Software, Made with <3 by Bpract Software Solutions LLP,2nd Floor, Backer Business center, Calicut, Kerala, India - 673639', '', 'text', 2, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'app.logo_light', 'options.app.logo_light', 'logo_light.png', '', 'image', 3, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'app.logo_dark', 'options.app.logo_dark', 'logo_dark.png', '', 'image', 4, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'app.logo_icon_light', 'options.app.logo_icon_light', 'logo_icon_light.png', '', 'image', 5, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'app.logo_icon_dark', 'options.app.logo_icon_dark', 'logo_icon_dark.png', '', 'image', 6, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 'app.theme_skin', 'options.app.theme_skin', '1', '', 'text', 6, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 'app.theme_font_size', 'options.app.theme_font_size', 'initial', '', 'text', 6, 'Brand', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(10, 'app.tree_images_option', 'options.app.tree_images_option', '1', '', 'text', 7, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(11, 'app.tree_images_show_option', 'options.app.tree_images_show_option', '1', '', 'text', 8, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(12, 'app.tree_grid_option', 'options.app.tree_grid_option', '1', '', 'text', 7, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(13, 'app.tree_grid_show_option', 'options.app.tree_grid_show_option', '1', '', 'text', 8, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(14, 'app.tree_map_option', 'options.app.tree_map_option', '1', '', 'text', 7, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(15, 'app.tree_map_show_option', 'options.app.tree_map_show_option', '1', '', 'text', 8, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(16, 'app.tree_zooming_option', 'options.app.tree_zooming_option', '1', '', 'text', 7, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(17, 'app.tree_zooming_show_option', 'options.app.tree_zooming_show_option', '1', '', 'text', 8, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(18, 'app.tree_pan_option', 'options.app.tree_pan_option', '1', '', 'text', 7, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(19, 'app.tree_pan_show_option', 'options.app.tree_pan_show_option', '1', '', 'text', 8, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(20, 'app.tree_more_details_option', 'options.app.tree_more_details_option', '1', '', 'text', 7, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(21, 'app.tree_more_details_show_option', 'options.app.tree_more_details_show_option', '1', '', 'text', 8, 'Network', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(22, 'app.cookie_prefix', 'options.app.cookie_prefix', 'cookie_', '', 'text', 8, 'System', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(23, 'app.idle_timeout', 'options.app.idle_timeout', '1', '', 'text', 8, 'System', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(24, 'app.idle_timeout_delay', 'options.app.idle_timeout_delay', '900000', '', 'text', 8, 'System', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(25, 'app.google_analytics_tracking_id', 'options.app.google_analytics_tracking_id', '', '', 'text', 7, 'Admin', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(26, 'app.google_analytics_client_id', 'options.app.google_analytics_client_id', '', '', 'text', 8, 'Admin', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(27, 'app.primary_menu_items', 'options.app.primary_menu_items', '', '', 'text', 8, 'Admin', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(28, 'app.joining_fee', 'options.app.joining_fee', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(29, 'app.fast_start', 'options.app.fast_start', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(30, 'app.indirect_fast_start_level_one', 'options.app.indirect_fast_start_level_one', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(31, 'app.indirect_fast_start_level_two', 'options.app.indirect_fast_start_level_two', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(32, 'app.indirect_fast_start_level_three', 'options.app.indirect_fast_start_level_three', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(33, 'app.tax', 'options.app.tax', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(34, 'app.service_charge', 'options.app.service_charge', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(35, 'app.binary_bonus', 'options.app.binary_bonus', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(36, 'app.matching_bonus_one', 'options.app.matching_bonus_one', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(37, 'app.matching_bonus_two', 'options.app.matching_bonus_two', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(38, 'app.matching_bonus_three', 'options.app.matching_bonus_three', '', '', 'text', 8, 'Commission', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(39, 'app.system_redirect_login', 'options.app.system_redirect_login', 'dashboard', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(40, 'app.system_redirect', 'options.app.system_redirect', 'landing_page', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(41, 'app.sponsor_commission', 'options.app.sponsor_commission', '', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(42, 'app.payout_manual_bank', 'options.app.payout_manual_bank', '1', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(43, 'app.payout_hyperwallet', 'options.app.payout_hyperwallet', '0', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(44, 'app.payout_paypal', 'options.app.payout_paypal', '0', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(45, 'app.payout_btc', 'options.app.payout_btc', '0', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(46, 'app.database_manager', 'options.app.database_manager', '', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(47, 'app.user_registration', 'options.app.user_registration', '1', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(48, 'app.email_verification', 'options.app.email_verification', '1', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(49, 'app.gtag_value', 'options.app.gtag_value', 'UA-70977094-2', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(50, 'app.voucher_user_request', 'options.app.voucher_user_request', 'yes', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(51, 'app.voucher_admin_approval', 'options.app.voucher_admin_approval', 'yes', '', 'text', 8, 'settings', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `total_count` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_pv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `monthly` int(11) NOT NULL,
  `binary` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `capping` int(11) NOT NULL,
  `special_wallet` double NOT NULL,
  `positions_in_fly` double NOT NULL,
  `accounts_in_infinity` double NOT NULL,
  `positions_in_infinity` double NOT NULL,
  `payout` double NOT NULL,
  `stage` int(11) NOT NULL,
  `fee` double NOT NULL,
  `upgrade_fee_old` double NOT NULL,
  `charge` double NOT NULL,
  `member_benefit` double NOT NULL,
  `downline_bonus` double NOT NULL,
  `insurace_completing_fee` double NOT NULL,
  `longrich_reg_fee` double NOT NULL,
  `insurance_reg_fee` double NOT NULL,
  `upline_fee` double NOT NULL,
  `upgrade_fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package`, `amount`, `monthly`, `binary`, `sponsor`, `capping`, `special_wallet`, `positions_in_fly`, `accounts_in_infinity`, `positions_in_infinity`, `payout`, `stage`, `fee`, `upgrade_fee_old`, `charge`, `member_benefit`, `downline_bonus`, `insurace_completing_fee`, `longrich_reg_fee`, `insurance_reg_fee`, `upline_fee`, `upgrade_fee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'level_1', 0.009, 0, 0, 0, 0, 0, 0.0078, 0, 0, 0.0162, 1, 100, 80, 20, 0, 0, 0, 0, 0, 80, 160, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'level_2', 0.009, 0, 0, 0, 0, 0, 0.0078, 0, 0, 0.0162, 1, 320, 160, 40, 80, 0, 0, 0, 0, 0, 200, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'level_3', 0.012, 0, 0, 0, 0, 0, 0.0052, 0, 4, 0.0038, 1, 400, 200, 40, 160, 0, 0, 0, 0, 0, 200, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'level_1', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 2, 400, 200, 0, 0, 0, 0, 0, 0, 0, 400, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'level_2', 0.095, 0, 0, 0, 0, 0, 0.065, 0, 50, 0.102, 2, 800, 400, 0, 200, 0, 0, 0, 0, 0, 600, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'level_3', 0.195, 0, 0, 0, 0, 0, 0.045, 1, 100, 0.51, 2, 1200, 600, 120, 380, 100, 0, 0, 0, 0, 600, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'level_1', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 3, 1200, 600, 0, 0, 0, 0, 0, 0, 0, 1200, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 'level_2', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 3, 2400, 1200, 0, 400, 0, 0, 0, 0, 0, 2000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 'level_3', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 3, 4000, 2000, 400, 1400, 200, 0, 0, 0, 0, 2000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(10, 'level_1', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 4, 4000, 2000, 0, 0, 0, 0, 0, 0, 0, 4000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(11, 'level_2', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 4, 8000, 4000, 0, 1250, 0, 0, 1750, 0, 0, 5000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(12, 'level_3', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 4, 10000, 5000, 600, 3000, 400, 0, 0, 1000, 0, 5000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(13, 'level_1', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 5, 10000, 5000, 0, 0, 0, 0, 0, 0, 0, 10000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(14, 'level_2', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 5, 20000, 10000, 0, 4000, 0, 1000, 0, 0, 0, 15000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(15, 'level_3', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 5, 30000, 15000, 3000, 15000, 2000, 0, 0, 0, 0, 10000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(16, 'level_1', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 6, 20000, 10000, 0, 0, 0, 0, 0, 0, 0, 20000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(17, 'level_2', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 6, 40000, 20000, 0, 10000, 0, 0, 0, 0, 0, 30000, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(18, 'level_3', 0.03, 0, 0, 0, 0, 0, 0, 0, 0, 0.025, 6, 60000, 30000, 6000, 50000, 4000, 0, 0, 0, 0, 0, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_history`
--

CREATE TABLE `package_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `new_package_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pairing_history`
--

CREATE TABLE `pairing_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_left` double(15,2) NOT NULL DEFAULT '0.00',
  `total_right` double(15,2) NOT NULL DEFAULT '0.00',
  `left` double(15,2) NOT NULL DEFAULT '0.00',
  `right` double(15,2) NOT NULL DEFAULT '0.00',
  `first_percent` double(15,2) NOT NULL DEFAULT '0.00',
  `first_amount` double(15,2) NOT NULL DEFAULT '0.00',
  `first_bonus` double(15,2) NOT NULL DEFAULT '0.00',
  `second_percent` double(15,2) NOT NULL DEFAULT '0.00',
  `second_amount` double(15,2) NOT NULL DEFAULT '0.00',
  `second_bonus` double(15,2) NOT NULL DEFAULT '0.00',
  `third_percent` double(15,2) NOT NULL DEFAULT '0.00',
  `third_amount` double(15,2) NOT NULL DEFAULT '0.00',
  `third_bonus` double(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_details`
--

CREATE TABLE `payment_gateway_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_merchant_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_transaction_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rave_public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rave_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaygh_merchant_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skrill_mer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payment_gateway_details`
--

INSERT INTO `payment_gateway_details` (`id`, `bank_details`, `btc_address`, `auth_merchant_name`, `auth_transaction_key`, `rave_public_key`, `rave_secret_key`, `paypal_username`, `paypal_password`, `paypal_secret_key`, `stripe_secret_key`, `stripe_public_key`, `ipaygh_merchant_key`, `skrill_mer_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', '1GwyMojNcB6yoChGy8KeAyEXfDLKxVQg1G', '', '', 'FLWPUBK-10e43bf17697669bd521513ddb3ce0cf-X', 'FLWSECK-cc674f43ae1475f7bdc273111e2c69d9-X', 'sales_api1.cloudmlmsoftware.com', 'K7HABQ6QFHQH5MRK', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AM6ZCBnJRQbX6PW0jDTSmkQKt7uX', 'sk_test_V4JYoIQ5U7Ftz7my6DqxBh4c00VDVvaASw', 'pk_test_HyE3jzk9waA1f3yaEHDM1Uxd00w8DnNy0u', 'tk_131a23b6-9992-11e9-aef6-f23c9170642f', 'demoqco@sun-fish.com', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_notification`
--

CREATE TABLE `payment_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_notification`
--

INSERT INTO `payment_notification` (`id`, `from`, `subject`, `mail_content`, `mail_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'Payment_notification', 'Payment_notification', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cheque',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `payment_name`, `status`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cheque', 'no', 'cheque', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Paypal', 'no', 'paypal', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'Bitaps', 'yes', 'bitaps', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Stripe', 'no', 'stripe', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'Ewallet', 'no', 'ewallet', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'Ipaygh', 'no', 'ipaygh', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'Skrill', 'no', 'skrill', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 'Rave', 'no', 'rave', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 'Voucher', 'no', 'voucher', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payout_gateway_details`
--

CREATE TABLE `payout_gateway_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `paypal_clientId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `paypal_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `wallet_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `wallet_hashId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `program_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `payout_setup_admin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `payout_setup_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `min_payout_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payout_gateway_details`
--

INSERT INTO `payout_gateway_details` (`id`, `paypal_clientId`, `paypal_secret`, `wallet_id`, `wallet_hashId`, `username`, `program_token`, `password`, `payout_setup_admin`, `payout_setup_user`, `min_payout_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BTcuzchngHtJKidoMRjilksgujnkDDfyhllllFRBHJIgklnkkm', '2df85gfhn81n97vg414vgg46g4j564gh5k4xdh4df4hgf64j', 'BTcuzchngHtJKidoMRjilksgujnkDDfyhllllFRBHJIgklnkkm', '2df85gfhn81n97vg414vgg46g4j564gh5k4xdh4df4hgf64j', 'restapiuser@18157461619', 'prg-c2853bc6-1596-4bfc-a2cc-d2b9709c3f62', '645fc30d-83ed-476c-a4', 'no', 'yes', '10', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payout_history`
--

CREATE TABLE `payout_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `receiver_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `response` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `payout_request`
--

CREATE TABLE `payout_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'account',
  `amount` double NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tx_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_types`
--

CREATE TABLE `payout_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payout_types`
--

INSERT INTO `payout_types` (`id`, `payment_mode`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Manual/Bank', '1', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Hyperwallet', '0', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'Paypal', '0', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Bitaps', '0', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_details`
--

CREATE TABLE `paypal_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `regdetails` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystatus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_binary_commission`
--

CREATE TABLE `pending_binary_commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `left_user_id` int(11) NOT NULL,
  `right_user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_commission`
--

CREATE TABLE `pending_commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_commission1`
--

CREATE TABLE `pending_commission1` (
  `id` int(10) UNSIGNED NOT NULL,
  `sponsor` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `give_sp_cm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_table`
--

CREATE TABLE `pending_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `next` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_temp`
--

CREATE TABLE `pending_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` int(11) DEFAULT NULL,
  `request_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_express_data` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `rave_ref_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_data` text COLLATE utf8mb4_unicode_ci,
  `payment_response_data` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytoken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordercode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `pending_transactions`
--

CREATE TABLE `pending_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` int(11) DEFAULT NULL,
  `request_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_express_data` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `rave_ref_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_data` text COLLATE utf8mb4_unicode_ci,
  `payment_response_data` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytoken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordercode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slyde_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `point_history`
--

CREATE TABLE `point_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `pv` double NOT NULL,
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `commision_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'binary',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_table`
--

CREATE TABLE `point_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `left_carry` double NOT NULL DEFAULT '0',
  `right_carry` double NOT NULL DEFAULT '0',
  `total_left` double NOT NULL DEFAULT '0',
  `total_right` double NOT NULL DEFAULT '0',
  `pv` double NOT NULL DEFAULT '0',
  `l` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `redeem_pv` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_table`
--

INSERT INTO `point_table` (`id`, `user_id`, `left_carry`, `right_carry`, `total_left`, `total_right`, `pv`, `l`, `r`, `redeem_pv`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_name`
--

CREATE TABLE `post_name` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `updated_post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp_price` double NOT NULL,
  `dp_price` double NOT NULL,
  `sv` double NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `productaddcart`
--

CREATE TABLE `productaddcart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `profile_infos`
--

CREATE TABLE `profile_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `dateofbirth` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00/00/0000',
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `occuption` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `zip` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT '000000',
  `image` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar-big.png',
  `profile` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `cover` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cover.jpg',
  `mobile` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `passport` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `skype` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `gplus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `wechat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `about` text COLLATE utf8mb4_unicode_ci,
  `package` int(11) DEFAULT '1',
  `currency` int(11) DEFAULT '1',
  `account_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `swift` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sort_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `bank_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `paypal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `security_answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `security_question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_infos`
--

INSERT INTO `profile_infos` (`id`, `user_id`, `dateofbirth`, `address1`, `address2`, `gender`, `city`, `location`, `occuption`, `country`, `state`, `zip`, `image`, `profile`, `cover`, `mobile`, `passport`, `skype`, `twitter`, `facebook`, `gplus`, `linkedin`, `whatsapp`, `wechat`, `about`, `package`, `currency`, `account_number`, `account_holder_name`, `swift`, `sort_code`, `bank_code`, `paypal`, `btc_wallet`, `security_answer`, `security_question`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '00/00/0000', 'Room No.2 Fifth floor, TurningPoint Aartment, New York', 'Room No.45 23th floor, NewEvelyn, New York', 'male', 'Ney York', '', '0', 'US', 'NY', '452233', 'avatar-big.png', 'avatar-m-38.jpg', 'cover.jpg', '+1-7865674834', '661430744', '0', '0', '0', '0', '0', '0', '0', NULL, 1, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `product` double NOT NULL,
  `approved` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `pv` double(15,2) NOT NULL DEFAULT '0.00',
  `count` double NOT NULL DEFAULT '0',
  `total_amount` double(15,2) NOT NULL DEFAULT '0.00',
  `pay_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sales_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `rs_balance` double NOT NULL DEFAULT '0',
  `purchase_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_purchase_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `user_id`, `purchase_user_id`, `package_id`, `product`, `approved`, `pv`, `count`, `total_amount`, `pay_by`, `sales_status`, `rs_balance`, `purchase_type`, `next_purchase_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 'null', 0.00, 0, 0.00, '0', 'yes', 0, '', '0000-00-00 00:00:00', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rank_history`
--

CREATE TABLE `rank_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `rank_updated` int(11) NOT NULL,
  `remarks` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rank_setting`
--

CREATE TABLE `rank_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `rank_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rank',
  `rank_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_up` int(11) NOT NULL DEFAULT '1',
  `quali_rank_id` int(11) NOT NULL DEFAULT '1',
  `quali_rank_count` int(11) NOT NULL DEFAULT '1',
  `rank_bonus` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `personal_pv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant_bonus` double NOT NULL,
  `sales_development_bonus` double NOT NULL,
  `monthly_repurchase` double NOT NULL,
  `daily_capping_binary` double NOT NULL,
  `reward_points` double NOT NULL,
  `min_ratio` int(11) NOT NULL,
  `riward_points` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `monthly_salary` double NOT NULL,
  `franchise_bonus` double NOT NULL,
  `life_insurance` double NOT NULL,
  `total_sales_volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rank_setting`
--

INSERT INTO `rank_setting` (`id`, `rank_name`, `rank_code`, `top_up`, `quali_rank_id`, `quali_rank_count`, `rank_bonus`, `personal_pv`, `consultant_bonus`, `sales_development_bonus`, `monthly_repurchase`, `daily_capping_binary`, `reward_points`, `min_ratio`, `riward_points`, `created_at`, `updated_at`, `deleted_at`, `monthly_salary`, `franchise_bonus`, `life_insurance`, `total_sales_volume`) VALUES
(1, 'Member', 'Null', 0, 0, 0, '0', '0', 0, 0, 0, 0, 0, 0, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 0, 0, 0, 0),
(2, 'Distributor', 'DC', 0, 0, 0, '0', '51', 10, 20, 16, 10000, 3, 0, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 10, 0, 0, 0),
(3, 'Silver', 'TC', 10, 0, 0, '0', '255', 15, 20, 16, 5000, 4, 0, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 10, 0, 2, 0),
(4, 'Gold', 'ETC', 60, 0, 0, '0', '816', 20, 20, 16, 100000, 5, 0, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 10, 3, 5, 0),
(5, 'Diamond', 'DIR', 160, 0, 0, '10000', '816', 20, 20, 32, 100000, 5, 30, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 10, 3, 0, 12500),
(6, 'Blue Diamond', 'ND', 660, 0, 0, '1000000', '816', 20, 20, 32, 100000, 5, 30, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 10, 3, 0, 25000),
(7, 'Black Diamond', 'GD', 1660, 0, 0, '10000000', '816', 20, 20, 32, 100000, 5, 30, '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 10, 3, 0, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `reactivation`
--

CREATE TABLE `reactivation` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redemption_commission`
--

CREATE TABLE `redemption_commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `tds` double NOT NULL,
  `service_charge` double NOT NULL,
  `payable_amount` double NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reward_commission`
--

CREATE TABLE `reward_commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `tds` double NOT NULL,
  `service_charge` double NOT NULL,
  `payable_amount` double NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riward_setting`
--

CREATE TABLE `riward_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `rank` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double NOT NULL,
  `mini_monthly_income` double NOT NULL,
  `points` double NOT NULL,
  `allow_after_six_months` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riward_setting`
--

INSERT INTO `riward_setting` (`id`, `rank`, `percentage`, `mini_monthly_income`, `points`, `allow_after_six_months`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Member', 0, 0, 0, 'Purchase tour', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(2, 'Distributor', 3, 500, 15, 'Purchase tour', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3, 'Silver', 4, 500, 20, 'Purchase Bike', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4, 'Gold', 5, 500, 25, 'Purchase Car', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(5, 'Diamond', 5, 500, 25, 'Purchase Car', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(6, 'Blue Diamond', 5, 500, 25, 'Purchase House', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(7, 'Black Diamond', 5, 500, 25, 'Purchase House', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rs_history`
--

CREATE TABLE `rs_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `rs_credit` int(11) NOT NULL DEFAULT '0',
  `rs_debit` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salarysetting`
--

CREATE TABLE `salarysetting` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_repurchase` int(11) NOT NULL,
  `calculation_periods` int(11) NOT NULL,
  `sales_volume` double NOT NULL,
  `ratio` double NOT NULL,
  `closing_date` date NOT NULL,
  `payment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carry_forward_volume` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salarysetting`
--

INSERT INTO `salarysetting` (`id`, `post_name`, `monthly_repurchase`, `calculation_periods`, `sales_volume`, `ratio`, `closing_date`, `payment`, `carry_forward_volume`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Supervisor', 16, 6, 10, 20, '0000-00-00', 'Monthly to Salary', 'Flush out every 6 months', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(2, 'Manager', 16, 6, 100, 20, '0000-00-00', 'Monthly to Salary', 'Flush out every 6 months', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3, 'CEO', 16, 6, 200, 20, '0000-00-00', 'Monthly to Salary', 'Flush out every 6 months', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_commission`
--

CREATE TABLE `salary_commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `tds` double NOT NULL,
  `service_charge` double NOT NULL,
  `payable_amount` double NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `pv` int(11) NOT NULL DEFAULT '0',
  `redeem_pv` int(11) NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pay_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `master` int(11) NOT NULL DEFAULT '0',
  `sale_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `point_value` int(11) NOT NULL,
  `pair_value` int(11) NOT NULL,
  `pair_amount` int(11) NOT NULL,
  `tds` int(11) NOT NULL,
  `service_charge` int(11) NOT NULL,
  `sponsor_Commisions` int(11) NOT NULL,
  `payout_notification` int(11) NOT NULL,
  `joinfee` int(11) NOT NULL,
  `voucher_daily_limit` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_id_hash` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploadusers` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploadusers.xlsx',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `point_value`, `pair_value`, `pair_amount`, `tds`, `service_charge`, `sponsor_Commisions`, `payout_notification`, `joinfee`, `voucher_daily_limit`, `content`, `cookie`, `wallet_id`, `wallet_id_hash`, `wallet_address`, `uploadusers`, `created_at`, `updated_at`) VALUES
(1, 100, 10, 100, 0, 0, 100, 0, 70, 1000, 'Welcome to Terms and Conditions', 'Welcome to cookie Policy', 'qwqwqw', 'qwqwqw', '36rBxbZSzKqouzpw5R4WVpjY4iYjXC8vLH', 'uploadusers.xlsx', '2020-10-29 11:34:59', '2020-10-29 11:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingaddress`
--

CREATE TABLE `shoppingaddress` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `option_type` int(11) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ninumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `admin_feed_back` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `my_feed_back` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_country`
--

CREATE TABLE `shopping_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_required` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shopping_country`
--

INSERT INTO `shopping_country` (`id`, `country_id`, `name`, `iso_code_2`, `iso_code_3`, `postcode_required`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Afghanistan', 'AF', 'AFG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 2, 'Albania', 'AL', 'ALB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 3, 'Algeria', 'DZ', 'DZA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 4, 'American Samoa', 'AS', 'ASM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 5, 'Andorra', 'AD', 'AND', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 6, 'Angola', 'AO', 'AGO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 7, 'Anguilla', 'AI', 'AIA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 8, 'Antarctica', 'AQ', 'ATA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 9, 'Antigua and Barbuda', 'AG', 'ATG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(10, 10, 'Argentina', 'AR', 'ARG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(11, 11, 'Armenia', 'AM', 'ARM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(12, 12, 'Aruba', 'AW', 'ABW', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(13, 13, 'Australia', 'AU', 'AUS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(14, 14, 'Austria', 'AT', 'AUT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(15, 15, 'Azerbaijan', 'AZ', 'AZE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(16, 16, 'Bahamas', 'BS', 'BHS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(17, 17, 'Bahrain', 'BH', 'BHR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(18, 18, 'Bangladesh', 'BD', 'BGD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(19, 19, 'Barbados', 'BB', 'BRB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(20, 20, 'Belarus', 'BY', 'BLR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(21, 21, 'Belgium', 'BE', 'BEL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(22, 22, 'Belize', 'BZ', 'BLZ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(23, 23, 'Benin', 'BJ', 'BEN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(24, 24, 'Bermuda', 'BM', 'BMU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(25, 25, 'Bhutan', 'BT', 'BTN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(26, 26, 'Bolivia', 'BO', 'BOL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(27, 27, 'Bosnia and Herzegovina', 'BA', 'BIH', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(28, 28, 'Botswana', 'BW', 'BWA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(29, 29, 'Bouvet Island', 'BV', 'BVT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(30, 30, 'Brazil', 'BR', 'BRA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(31, 31, 'British Indian Ocean Territory', 'IO', 'IOT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(32, 32, 'Brunei Darussalam', 'BN', 'BRN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(33, 33, 'Bulgaria', 'BG', 'BGR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(34, 34, 'Burkina Faso', 'BF', 'BFA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(35, 35, 'Burundi BI', 'BI', 'BDI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(36, 36, 'Cambodia', 'KH', 'KHM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(37, 37, 'Cameroon', 'CM', 'CMR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(38, 38, 'Canada', 'CA', 'CAN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(39, 39, 'Cape Verde', 'CV', 'CPV', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(40, 40, 'Cayman Islands', 'KY', 'CYM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(41, 41, 'Central African Republic', 'CF', 'CAF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(42, 42, 'Chad', 'TD', 'TCD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(43, 43, 'Chile', 'CL', 'CHL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(44, 44, 'China', 'CN', 'CHN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(45, 45, 'Christmas Island', 'CX', 'CXR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(46, 46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(47, 47, 'Colombia', 'CO', 'COL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(48, 48, 'Comoros', 'KM', 'COM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(49, 49, 'Congo', 'CG', 'COG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(50, 50, 'Cook Islands', 'CK', 'COK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(51, 51, 'Costa Rica', 'CR', 'CRI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(52, 52, 'Cote D Ivoire', 'CI', 'CIV', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(53, 53, 'Croatia', 'HR', 'HRV', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(54, 54, 'Cuba', 'CU', 'CUB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(55, 55, 'Cyprus', 'CY', 'CYP', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(56, 56, 'Czech Republic', 'CZ', 'CZE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(57, 57, 'Denmark', 'DK', 'DNK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(58, 58, 'Djibouti', 'DJ', 'DJI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(59, 59, 'Dominica', 'DM', 'DMA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(60, 60, 'Dominican Republic', 'DO', 'DOM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(61, 61, 'East Timor', 'TL', 'TLS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(62, 62, 'Ecuador', 'EC', 'ECU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(63, 63, 'Egypt', 'EG', 'EGY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(64, 64, 'El Salvador', 'SV', 'SLV', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(65, 65, 'Equatorial Guinea', 'GQ', 'GNQ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(66, 66, 'Eritrea', 'ER', 'ERI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(67, 67, 'Estonia', 'EE', 'EST', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(68, 68, 'Ethiopia', 'ET', 'ETH', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(69, 69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(70, 70, 'Faroe Islands', 'FO', 'FRO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(71, 71, 'Fiji', 'FJ', 'FJI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(72, 72, 'Finland', 'FI', 'FIN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(73, 74, 'France, Metropolitan', 'FR', 'FRA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(74, 75, 'French Guiana', 'GF', 'GUF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(75, 76, 'French Polynesia', 'PF', 'PYF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(76, 77, 'French Southern Territories', 'TF', 'ATF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(77, 78, 'Gabon', 'GA', 'GAB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(78, 79, 'Gambia', 'GM', 'GMB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(79, 80, 'Georgia', 'GE', 'GEO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(80, 81, 'Germany', 'DE', 'DEU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(81, 82, 'Ghana', 'GH', 'GHA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(82, 83, 'Gibraltar', 'GI', 'GIB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(83, 84, 'Greece', 'GR', 'GRC', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(84, 85, 'Greenland', 'GL', 'GRL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(85, 86, 'Grenada', 'GD', 'GRD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(86, 87, 'Guadeloupe', 'GP', 'GLP', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(87, 88, 'Guam', 'GU', 'GUM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(88, 89, 'Guatemala', 'GT', 'GTM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(89, 90, 'Guinea', 'GN', 'GIN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(90, 91, 'Guinea-Bissau', 'GW', 'GNB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(91, 92, 'Guyana', 'GY', 'GUY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(92, 93, 'Haiti', 'HT', 'HTI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(93, 94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(94, 95, 'Honduras', 'HN', 'HND', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(95, 96, 'Hong Kong', 'HK', 'HKG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(96, 97, 'Hungary', 'HU', 'HUN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(97, 98, 'Iceland', 'IS', 'ISL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(98, 99, 'India', 'IN', 'IND', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(99, 100, 'Indonesia', 'ID', 'IDN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(100, 101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(101, 102, 'Iraq', 'IQ', 'IRQ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(102, 103, 'Ireland', 'IE', 'IRL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(103, 104, 'Israel', 'IL', 'ISR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(104, 105, 'Italy', 'IT', 'ITA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(105, 106, 'Jamaica', 'JM', 'JAM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(106, 107, 'Japan', 'JP', 'JPN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(107, 108, 'Jordan', 'JO', 'JOR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(108, 109, 'Kazakhstan', 'KZ', 'KAZ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(109, 110, 'Kenya', 'KE', 'KEN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(110, 111, 'Kiribati', 'KI', 'KIR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(111, 112, 'North Korea', 'KP', 'PRK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(112, 113, 'South Korea', 'KR', 'KOR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(113, 114, 'Kuwait', 'KW', 'KWT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(114, 115, 'Kyrgyzstan', 'KG', 'KGZ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(115, 116, 'Lao Peoples Democratic Republic', 'LA', 'LAO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(116, 117, 'Latvia', 'LV', 'LVA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(117, 118, 'Lebanon', 'LB', 'LBN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(118, 119, 'Lesotho', 'LS', 'LSO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(119, 120, 'Liberia', 'LR', 'LBR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(120, 121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(121, 122, 'Liechtenstein', 'LI', 'LIE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(122, 123, 'Lithuania', 'LT', 'LTU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(123, 124, 'Luxembourg', 'LU', 'LUX', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(124, 125, 'Macau', 'MO', 'MAC', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(125, 126, 'FYROM', 'MK', 'MKD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(126, 127, 'Madagascar', 'MG', 'MDG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(127, 128, 'Malawi', 'MW', 'MWI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(128, 129, 'Malaysia', 'MY', 'MYS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(129, 130, 'Maldives', 'MV', 'MDV', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(130, 131, 'Mali', 'ML', 'MLI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(131, 132, 'Malta', 'MT', 'MLT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(132, 133, 'Marshall Islands', 'MH', 'MHL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(133, 134, 'Martinique', 'MQ', 'MTQ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(134, 135, 'Mauritania', 'MR', 'MRT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(135, 136, 'Mauritius', 'MU', 'MUS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(136, 137, 'Mayotte', 'YT', 'MYT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(137, 138, 'Mexico', 'MX', 'MEX', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(138, 139, 'Micronesia, Federated States of', 'FM', 'FSM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(139, 140, 'Moldova, Republic of', 'MD', 'MDA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(140, 141, 'Monaco', 'MC', 'MCO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(141, 142, 'Mongolia', 'MN', 'MNG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(142, 143, 'Montserrat', 'MS', 'MSR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(143, 144, 'Morocco', 'MA', 'MAR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(144, 145, 'Mozambique', 'MZ', 'MOZ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(145, 146, 'Myanmar', 'MM', 'MMR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(146, 147, 'Namibia', 'NA', 'NAM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(147, 148, 'Nauru', 'NR', 'NRU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(148, 149, 'Nepal', 'NP', 'NPL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(149, 150, 'Netherlands', 'NL', 'NLD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(150, 151, 'Netherlands Antilles', 'AN', 'ANT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(151, 152, 'New Caledonia', 'NC', 'NCL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(152, 153, 'New Zealand', 'NZ', 'NZL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(153, 154, 'Nicaragua', 'NI', 'NIC', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(154, 155, 'Niger', 'NE', 'NER', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(155, 156, 'Nigeria', 'NG', 'NGA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(156, 157, 'Niue', 'NU', 'NIU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(157, 158, 'Norfolk Island', 'NF', 'NFK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(158, 159, 'Northern Mariana Islands', 'MP', 'MNP', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(159, 160, 'Norway', 'NO', 'NOR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(160, 161, 'Oman', 'OM', 'OMN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(161, 162, 'Pakistan', 'PK', 'PAK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(162, 163, 'Palau', 'PW', 'PLW', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(163, 164, 'Panama', 'PA', 'PAN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(164, 165, 'Papua New Guinea', 'PG', 'PNG', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(165, 166, 'Paraguay', 'PY', 'PRY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(166, 167, 'Peru', 'PE', 'PER', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(167, 168, 'Philippines', 'PH', 'PHL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(168, 169, 'Pitcairn', 'PN', 'PCN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(169, 170, 'Poland', 'PL', 'POL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(170, 171, 'Portugal', 'PT', 'PRT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(171, 172, 'Puerto Rico PR', 'PR', 'PRI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(172, 173, 'Qatar', 'QA', 'QAT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(173, 174, 'Reunion', 'RE', 'REU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(174, 175, 'Romania', 'RO', 'ROM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(175, 176, 'Russian Federation', 'RU', 'RUS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(176, 177, 'Rwanda', 'RW', 'RWA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(177, 178, 'Saint Kitts and Nevis', 'KN', 'KNA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(178, 179, 'Saint Lucia', 'LC', 'LCA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(179, 180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(180, 181, 'Samoa', 'WS', 'WSM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(181, 182, 'San Marino', 'SM', 'SMR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(182, 183, 'Sao Tome and Principe', 'ST', 'STP', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(183, 184, 'Saudi Arabia', 'SA', 'SAU', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(184, 185, 'Senegal', 'SN', 'SEN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(185, 186, 'Seychelles', 'SC', 'SYC', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(186, 187, 'Sierra Leone', 'SL', 'SLE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(187, 188, 'Singapore', 'SG', 'SGP', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(188, 189, 'Slovak Republic', 'SK', 'SVK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(189, 190, 'Slovenia', 'SI', 'SVN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(190, 191, 'Solomon Islands', 'SB', 'SLB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(191, 192, 'Somalia', 'SO', 'SOM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(192, 193, 'South Africa', 'ZA', 'ZAF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(193, 194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(194, 195, 'Spain', 'ES', 'ESP', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(195, 196, 'Sri Lanka', 'LK', 'LKA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(196, 197, 'St. Helena', 'SH', 'SHN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(197, 198, 'St. Pierre and Miquelon', 'PM', 'SPM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(198, 199, 'Sudan', 'SD', 'SDN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(199, 200, 'Suriname', 'SR', 'SUR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(200, 201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(201, 202, 'Swaziland', 'SZ', 'SWZ', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(202, 203, 'Sweden', 'SE', 'SWE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(203, 204, 'Switzerland', 'CH', 'CHE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(204, 205, 'Syrian Arab Republic', 'SY', 'SYR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(205, 206, 'Taiwan', 'TW', 'TWN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(206, 207, 'Tajikistan', 'TJ', 'TJK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(207, 208, 'Tanzania, United Republic of', 'TZ', 'TZA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(208, 209, 'Thailand', 'TH', 'THA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(209, 210, 'Togo', 'TG', 'TGO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(210, 211, 'Tokelau', 'TK', 'TKL', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(211, 212, 'Tonga', 'TO', 'TON', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(212, 213, 'Trinidad and Tobago', 'TT', 'TTO', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(213, 214, 'Tunisia', 'TN', 'TUN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(214, 215, 'Turkey', 'TR', 'TUR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(215, 216, 'Turkmenistan', 'TM', 'TKM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(216, 217, 'Turks and Caicos Islands', 'TC', 'TCA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(217, 218, 'Tuvalu', 'TV', 'TUV', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(218, 219, 'Uganda', 'UG', 'UGA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(219, 220, 'Ukraine', 'UA', 'UKR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(220, 221, 'United Arab Emirates', 'AE', 'ARE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(221, 222, 'United Kingdom', 'GB', 'GBR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(222, 223, 'United States', 'US', 'USA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(223, 224, 'United States Minor Outlying Islands', 'UM', 'UMI', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(224, 225, 'Uruguay', 'UY', 'URY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(225, 226, 'Uzbekistan', 'UZ', 'UZB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(226, 227, 'Vanuatu', 'VU', 'VUT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(227, 228, 'Vatican City State (Holy See)', 'VA', 'VAT', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(228, 229, 'Venezuela', 'VE', 'VEN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(229, 230, 'Viet Nam', 'VN', 'VNM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(230, 231, 'Virgin Islands (British)', 'VG', 'VGB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(231, 232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(232, 233, 'Wallis and Futuna Islands', 'WF', 'WLF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(233, 234, 'Western Sahara', 'EH', 'ESH', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(234, 235, 'Yemen', 'YE', 'YEM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(235, 237, 'Democratic Republic of Congo', 'CD', 'COD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(236, 238, 'Zambia', 'ZM', 'ZMB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(237, 239, 'Zimbabwe', 'ZW', 'ZWE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(238, 242, 'Montenegro', 'ME', 'MNE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(239, 243, 'Serbia', 'RS', 'SRB', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(240, 244, 'Aaland Islands', 'AX', 'ALA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(241, 245, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(242, 246, 'Curacao', 'CW', 'CUW', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(243, 247, 'Palestinian Territory, Occupied', 'PS', 'PSE', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(244, 248, 'South Sudan', 'SS', 'SSD', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(245, 249, 'St. Barthelemy', 'BL', 'BLM', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(246, 250, 'St. Martin (French part)', 'MF', 'MAF', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(247, 251, 'Canary Islands', 'IC', 'ICA', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(248, 252, 'Ascension Island (British)', 'AC', 'ASC', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(249, 253, 'Kosovo, Republic of', 'XK', 'UNK', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(250, 254, 'Isle of Man', 'IM', 'IMN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(251, 255, 'Tristan da Cunha', 'TA', 'SHN', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(252, 256, 'Guernsey', 'GG', 'GGY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(253, 257, 'Jersey', 'JE', 'JEY', 0, 1, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_zone`
--

CREATE TABLE `shopping_zone` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shopping_zone`
--

INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Badakhshan', 'BDS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(2, 1, 1, 'Badakhshan', 'BDS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(3, 2, 1, 'Badghis', 'BDG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(4, 3, 1, 'Baghlan', 'BGL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(5, 4, 1, 'Balkh', 'BAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(6, 5, 1, 'Bamian', 'BAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(7, 6, 1, 'Farah', 'FRA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(8, 7, 1, 'Faryab', 'FYB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(9, 8, 1, 'Ghazni', 'GHA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(10, 9, 1, 'Ghowr', 'GHO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(11, 10, 1, 'Helmand', 'HEL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(12, 11, 1, 'Herat', 'HER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(13, 12, 1, 'Jowzjan', 'JOW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(14, 13, 1, 'Kabul', 'KAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(15, 14, 1, 'Kandahar', '   KAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(16, 15, 1, 'Kapisa', 'KAP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(17, 16, 1, 'Khost', 'KHO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(18, 17, 1, 'Konar', 'KNR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(19, 18, 1, 'Kondoz', 'KDZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(20, 19, 1, 'Laghman', 'LAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(21, 20, 1, 'Lowgar', 'LOW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(22, 21, 1, 'Nangrahar', 'NAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(23, 22, 1, 'Nimruz', 'M', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(24, 23, 1, 'Nurestan', ' NUR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(25, 24, 1, 'Oruzgan', 'RU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(26, 25, 1, 'Paktia', 'PIA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(27, 26, 1, 'Paktika', 'PKA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(28, 27, 1, 'Parwan', 'PAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(29, 28, 1, 'Samangan', ' SAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(30, 29, 1, 'Sar-e Pol', 'SAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(31, 30, 1, 'Takhar', 'TAK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(32, 31, 1, 'Wardak', 'WAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(33, 32, 1, 'Zabol', 'ZAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(34, 33, 2, 'Berat', 'BR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(35, 34, 2, 'Bulqize', 'BU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(36, 35, 2, 'Delvine', 'DL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(37, 36, 2, 'Devoll', 'DV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(38, 37, 2, 'Diber', 'DI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(39, 38, 2, 'Durres', 'DR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(40, 39, 2, 'Elbasan', 'EL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(41, 40, 2, 'Kolonje', 'ER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(42, 41, 2, 'Fier', 'FR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(43, 42, 2, 'Gjirokaster', 'GJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(44, 43, 2, 'Gramsh', 'GR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(45, 44, 2, 'Has', 'HA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(46, 45, 2, 'Kavaje', 'KA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(47, 46, 2, 'Kurbin', 'KB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(48, 47, 2, 'Kucove', 'KC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(49, 48, 2, 'Korce', 'KO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(50, 49, 2, 'Kruje', 'KR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(51, 50, 2, 'Kukes', 'KU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(52, 51, 2, 'Librazhd', 'LB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(53, 52, 2, 'Lezhe', 'LE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(54, 53, 2, 'Lushnje', 'LU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(55, 54, 2, 'Malesi e Madhe', 'MM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(56, 55, 2, 'Mallakaster', 'MK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(57, 56, 2, 'Mat', 'MT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(58, 57, 2, 'Mirdite', 'MR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(59, 58, 2, 'Peqin', 'PQ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(60, 59, 2, 'Permet', 'PR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(61, 60, 2, 'Pogradec', 'PG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(62, 61, 2, 'Puke', 'PU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(63, 62, 2, 'Shkoder', 'SH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(64, 63, 2, 'Skrapar', 'SK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(65, 64, 2, 'Sarande', 'SR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(66, 65, 2, 'Tepelene', 'TE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(67, 66, 2, 'Tropoje', 'TP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(68, 67, 2, 'Tirane', 'TR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(69, 68, 2, 'Vlore', 'VL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(70, 69, 3, 'Adrar', 'ADR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(71, 70, 3, 'Ain Defla', 'ADE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(72, 71, 3, 'Ain Temouchent', 'ATE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(73, 72, 3, 'Alger', 'ALG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(74, 73, 3, 'Annaba', 'ANN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(75, 74, 3, 'Batna', 'BAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(76, 75, 3, 'Bechar', 'BEC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(77, 76, 3, 'Bejaia', 'BEJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(78, 77, 3, 'Biskra', 'BIS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(79, 78, 3, 'Blida', 'BLI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(80, 79, 3, 'Bordj Bou Arreridj', 'BBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(81, 80, 3, 'Bouira', 'BOA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(82, 81, 3, 'Boumerdes', 'BMD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(83, 82, 3, 'Chlef', 'CHL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(84, 83, 3, 'Constantine', 'CON', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(85, 84, 3, 'Djelfa', 'DJE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(86, 85, 3, 'El Bayadh', 'EBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(87, 86, 3, 'El Oued', 'EOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(88, 87, 3, 'El Tarf', 'ETA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(89, 88, 3, 'Ghardaia', 'GHA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(90, 89, 3, 'Guelma', 'GUE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(91, 90, 3, 'Illizi', 'ILL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(92, 91, 3, 'Jijel', 'JIJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(93, 92, 3, 'Khenchela', 'KHE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(94, 93, 3, 'Laghouat', 'LAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(95, 94, 3, 'Muaskar', 'MUA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(96, 95, 3, 'Medea', 'MED', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(97, 96, 3, 'Mila', 'MIL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(98, 97, 3, 'Mostaganem', 'MOS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(99, 98, 3, 'M\'Sila', 'MSI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(100, 99, 3, 'Naama', 'NAA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(101, 100, 3, 'Oran', 'ORA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(102, 101, 3, 'Ouargla', 'OUA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(103, 102, 3, 'Oum el-Bouaghi', 'OEB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(104, 103, 3, 'Relizane', 'REL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(105, 104, 3, 'Saida', 'SAI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(106, 105, 3, 'Setif', 'SET', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(107, 106, 3, 'Sidi Bel Abbes', 'SBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(108, 107, 3, 'Skikda', 'SKI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(109, 108, 3, 'Souk Ahras', 'SAH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(110, 109, 3, 'Tamanghasset', 'TAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(111, 110, 3, 'Tebessa', 'TEB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(112, 111, 3, 'Tiaret', 'TIA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(113, 112, 3, 'Tindouf', 'TIN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(114, 113, 3, 'Tipaza', 'TIP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(115, 114, 3, 'Tissemsilt', 'TIS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(116, 115, 3, 'Tizi', 'TOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(117, 116, 3, 'Tlemcen', 'TLE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(118, 117, 4, 'Eastern', 'E', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(119, 118, 4, 'Manu\'a', 'M', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(120, 119, 4, 'Rose Island', 'R', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(121, 120, 4, 'Swains Island', 'S', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(122, 121, 4, 'Western', 'W', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(123, 122, 5, 'Andorra la Vella', 'ALV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(124, 123, 5, 'Canillo', 'CAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(125, 124, 5, 'Encamp', 'ENC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(126, 125, 5, 'Escaldes-Engordany', 'ESE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(127, 126, 5, 'La Massana', 'LMA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(128, 127, 5, 'Ordino', 'ORD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(129, 128, 5, 'Sant Julia de Loria', 'SJL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(130, 129, 6, 'Bengo', 'BGO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(131, 130, 6, 'Benguela', 'BGU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(132, 131, 6, 'Bie', 'BIE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(133, 132, 6, 'Cabinda', 'CAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(134, 133, 6, 'Cuando-Cubango', 'CCU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(135, 134, 6, 'Cuanza Norte', 'CNO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(136, 135, 6, 'Cuanza Sul', 'CUS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(137, 136, 6, 'Cunene', 'CNN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(138, 137, 6, 'Huambo', 'HUA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(139, 138, 6, 'Huila', 'HUI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(140, 139, 6, 'Luanda', 'LUA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(141, 140, 6, 'Lunda Norte', 'LNO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(142, 141, 6, 'Lunda Sul', 'LSU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(143, 142, 6, 'Malange', 'MAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(144, 143, 6, 'Moxico', 'MOX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(145, 144, 6, 'Namibe', 'NAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(146, 145, 6, 'Uige', 'UIG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(147, 146, 6, 'Zaire', 'ZAI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(148, 147, 9, 'Saint George', 'ASG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(149, 148, 9, 'Saint John', 'ASJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(150, 149, 9, 'Saint Mary', 'ASM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(151, 150, 9, 'Saint Paul', 'ASL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(152, 151, 9, 'Saint Peter', 'ASR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(153, 152, 9, 'Saint Philip', 'ASH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(154, 153, 9, 'Barbuda', 'BAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(155, 154, 9, 'Redonda', 'RED', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(156, 155, 10, 'Antartida e Islas del Atlantico', 'AN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(157, 156, 10, 'Buenos Aires', 'BA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(158, 157, 10, 'Catamarca', 'CA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(159, 158, 10, 'Chaco', 'CH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(160, 159, 10, 'Chubut', 'CU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(161, 160, 10, 'Cordoba', 'CO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(162, 161, 10, 'Corrientes', 'CR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(163, 162, 10, 'Distrito Federal', 'DF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(164, 163, 10, 'Entre Rios', 'ER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(165, 164, 10, 'Formosa', 'FO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(166, 165, 10, 'Jujuy', 'JU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(167, 166, 10, 'La Pampa', 'LP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(168, 167, 10, 'La Rioja', 'LR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(169, 168, 10, 'Mendoza', 'ME', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(170, 169, 10, 'Misiones', 'MI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(171, 170, 10, 'Neuquen', 'NE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(172, 171, 10, 'Rio Negro', 'RN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(173, 172, 10, 'Salta', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(174, 173, 10, 'San Juan', 'SJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(175, 174, 10, 'San Luis', 'SL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(176, 175, 10, 'Santa Cruz', 'SC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(177, 176, 10, 'Santa Fe', 'SF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(178, 177, 10, 'Santiago del Estero', 'SD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(179, 178, 10, 'Tierra del Fuego', 'TF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(180, 179, 10, 'Tucuman', 'TU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(181, 180, 11, 'Aragatsotn', 'AGT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(182, 181, 11, 'Ararat', 'ARR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(183, 182, 11, 'Armavir', 'ARM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(184, 183, 11, 'Geghark\'unik', 'GEG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(185, 184, 11, 'Kotayk', 'KOT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(186, 185, 11, 'Lorri', 'LOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(187, 186, 11, 'Shirak', 'SHI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(188, 187, 11, 'Syunik', 'SYU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(189, 188, 11, 'Tavush', 'TAV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(190, 189, 11, 'Vayots Dzor', 'VAY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(191, 190, 11, 'Yerevan', 'YER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(192, 191, 13, 'Australian Capital Territory', 'ACT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(193, 192, 13, 'New South Wales', 'NSW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(194, 193, 13, 'Northern Territory', 'NT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(195, 194, 13, 'Queensland', 'QLD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(196, 195, 13, 'South Australia', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(197, 196, 13, 'Tasmania', 'TAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(198, 197, 13, 'Victoria', 'VIC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(199, 198, 13, 'Western Australia', 'WA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(200, 199, 14, 'Burgenland', 'BUR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(201, 200, 14, 'Kärnten', 'KAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(202, 201, 14, 'Niederösterreich', 'NOS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(203, 202, 14, 'Oberösterreich', 'OOS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(204, 203, 14, 'Salzburg', 'SAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(205, 204, 14, 'Steiermark', 'STE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(206, 205, 14, 'Tirol', 'TIR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(207, 206, 14, 'Vorarlberg', 'VOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(208, 207, 14, 'Wien', 'WIE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(209, 208, 15, 'Ali Bayramli', 'AB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(210, 209, 15, 'Abseron', 'ABS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(211, 210, 15, 'AgcabAdi', 'AGC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(212, 211, 15, 'Agdam', 'AGM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(213, 212, 15, 'Agdas', 'AGS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(214, 213, 15, 'Agstafa', 'AGA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(215, 214, 15, 'Agsu', 'AGU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(216, 215, 15, 'Astara', 'AST', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(217, 216, 15, 'Baki', 'BA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(218, 217, 15, 'BabAk', 'BAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(219, 218, 15, 'BalakAn', 'BAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(220, 219, 15, 'BArdA', 'BAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(221, 220, 15, 'Beylaqan', 'BEY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(222, 221, 15, 'Bilasuvar', 'BIL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(223, 222, 15, 'Cabrayil', 'CAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(224, 223, 15, 'Calilabab', 'CAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(225, 224, 15, 'Culfa', 'CUL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(226, 225, 15, 'Daskasan', 'DAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(227, 226, 15, 'Davaci', 'DAV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(228, 227, 15, 'Fuzuli', 'FUZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(229, 228, 15, 'Ganca', 'GA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(230, 229, 15, 'Gadabay', 'GAD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(231, 230, 15, 'Goranboy', 'GOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(232, 231, 15, 'Goycay', 'GOY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(233, 232, 15, 'Haciqabul', 'HAC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(234, 233, 15, 'Imisli', 'IMI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(235, 234, 15, 'Ismayilli', 'ISM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(236, 235, 15, 'Kalbacar', 'KAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(237, 236, 15, 'Kurdamir', 'KUR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(238, 237, 15, 'Lankaran', 'LA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(239, 238, 15, 'Lacin', 'LAC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(240, 239, 15, 'Lankaran', 'LAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(241, 240, 15, 'Lerik', 'LER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(242, 241, 15, 'Masalli', 'MAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(243, 242, 15, 'Mingacevir', 'MI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(244, 243, 15, 'Naftalan', 'NA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(245, 244, 15, 'Neftcala', 'NEF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(246, 245, 15, 'Oguz', 'OGU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(247, 246, 15, 'Ordubad', 'ORD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(248, 247, 15, 'Qabala', 'QAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(249, 248, 15, 'Qax', 'QAX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(250, 249, 15, 'Qazax', 'QAZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(251, 250, 15, 'Qobustan', 'QOB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(252, 251, 15, 'Quba', 'QBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(253, 252, 15, 'Qubadli', 'QBI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(254, 253, 15, 'Qusar', 'QUS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(255, 254, 15, 'Saki', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(256, 255, 15, 'Saatli', 'SAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(257, 256, 15, 'Sabirabad', 'SAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(258, 257, 15, 'Sadarak', 'SAD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(259, 258, 15, 'Sahbuz', 'SAH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(260, 259, 15, 'Saki', 'SAK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(261, 260, 15, 'Salyan', 'SAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(262, 261, 15, 'Sumqayit', 'SM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(263, 262, 15, 'Samaxi', 'SMI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(264, 263, 15, 'Samkir', 'SKR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(265, 264, 15, 'Samux', 'SMX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(266, 265, 15, 'Sarur', 'SAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(267, 266, 15, 'Siyazan', 'SIY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(268, 267, 15, 'Susa', 'SS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(269, 268, 15, 'Susa', 'SUS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(270, 269, 15, 'Tartar', 'TAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(271, 270, 15, 'Tovuz', 'TOV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(272, 271, 15, 'Ucar', 'UCA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(273, 272, 15, 'Xankandi', 'XA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(274, 273, 15, 'Xacmaz', 'XAC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(275, 274, 15, 'Xanlar', 'XAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(276, 275, 15, 'Xizi', 'XIZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(277, 276, 15, 'Xocali', 'XCI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(278, 277, 15, 'Xocavand', 'XVD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(279, 278, 15, 'Yardimli', 'YAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(280, 279, 15, 'Yevlax', 'YEV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(281, 280, 15, 'Zangilan', 'ZAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(282, 281, 15, 'Zaqatala', 'ZAQ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(283, 282, 15, 'Zardab', 'ZAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(284, 283, 15, 'Naxcivan', 'NX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(285, 284, 16, 'Acklins', 'ACK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(286, 285, 16, 'Berry Islands', 'BER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(287, 286, 16, 'Bimini', 'BIM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(288, 287, 16, 'Black Point', 'BLK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(289, 288, 16, 'Cat Island', 'CAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(290, 289, 16, 'Central Abaco', 'CAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(291, 290, 16, 'Central Andros', 'CAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(292, 291, 16, 'Central Eleuthera', 'CEL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(293, 292, 16, 'City of Freeport', 'FRE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(294, 293, 16, 'Crooked Island', 'CRO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(295, 294, 16, 'East Grand Bahama', 'EGB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(296, 295, 16, 'Exuma', 'EXU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(297, 296, 16, 'Grand Cay', 'GRD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(298, 297, 16, 'Harbour Island', 'HAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(299, 298, 16, 'Hope Town', 'HOP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(300, 299, 16, 'Inagua', 'INA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(301, 300, 16, 'Long Island', 'LNG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(302, 301, 16, 'Mangrove Cay', 'MAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(303, 302, 16, 'Mayaguana', 'MAY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(304, 303, 16, 'Moore\'s Island', 'MOO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(305, 304, 16, 'North Abaco', 'NAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(306, 306, 16, 'North Eleuthera', 'NEL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(307, 307, 16, 'Ragged Island', 'RAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(308, 308, 16, 'Rum Cay', 'RUM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(309, 309, 16, 'San Salvador', 'SAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(310, 310, 16, 'South Abaco', 'SAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(311, 311, 16, 'South Andros', 'SAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(312, 312, 16, 'South Eleuthera', 'SEL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(313, 313, 16, 'Spanish Wells', 'SWE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(314, 314, 16, 'West Grand Bahama', 'WGB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(315, 315, 17, 'Capital', 'CAP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(316, 316, 17, 'Central', 'CEN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(317, 317, 17, 'Muharraq', 'MUH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(318, 318, 17, 'Northern', 'NOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(319, 319, 17, 'Southern', 'SOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(320, 320, 18, 'Barisal', 'BAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(321, 321, 18, 'Chittagong', 'CHI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(322, 322, 18, 'Dhaka', 'DHA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(323, 323, 18, 'Khulna', 'KHU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(324, 324, 18, 'Rajshahi', 'RAJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(325, 325, 18, 'Sylhet', 'SYL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(326, 326, 19, 'Christ Church', 'CC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(327, 327, 19, 'Saint Andrew', 'AND', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(328, 328, 19, 'Saint George', 'GEO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(329, 329, 19, 'Saint James', 'JAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(330, 330, 19, 'Saint John', 'JOH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(331, 331, 19, 'Saint Joseph', 'JOS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(332, 332, 19, 'Saint Lucy', 'LUC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(333, 333, 19, 'Saint Michael', 'MIC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(334, 334, 19, 'Saint Peter', 'PET', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(335, 335, 19, 'Saint Philip', 'PHI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(336, 336, 19, 'Saint Thomas', 'THO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(337, 337, 20, 'Brestskaya (Brest)', 'BR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(338, 338, 20, 'Homyel\'skaya (Homyel)', 'HO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(339, 339, 20, 'Horad Minsk', 'HM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(340, 340, 20, 'Hrodzyenskaya (Hrodna)', 'HR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(341, 341, 20, 'Mahilyowskaya (Mahilyow)', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(342, 342, 20, 'Minskaya', 'MI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(343, 343, 20, 'Vitsyebskaya (Vitsyebsk)', 'VI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(344, 344, 21, 'Antwerpen', 'VAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(345, 345, 21, 'Brabant Wallon', 'WBR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(346, 346, 21, 'Hainaut', 'WHT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(347, 347, 21, 'Liège', 'WLG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(348, 348, 21, 'Limburg', 'VLI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(349, 349, 21, 'Luxembourg', 'WLX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(350, 350, 21, 'Namur', 'WNA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(351, 351, 21, 'Oost-Vlaanderen', 'VOV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(352, 352, 21, 'Vlaams Brabant', 'VBR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(353, 353, 21, 'West-Vlaanderen', 'VWV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(354, 354, 22, 'Belize', 'BZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(355, 355, 22, 'Cayo', 'CY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(356, 356, 22, 'Corozal', 'CR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(357, 357, 22, 'Orange Walk', 'OW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(358, 358, 22, 'Stann Creek', 'SC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(359, 359, 22, 'Toledo', 'TO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(360, 360, 23, 'Alibori', 'AL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(361, 361, 23, 'Atakora', 'AK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(362, 362, 23, 'Atlantique', 'AQ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(363, 363, 23, 'Borgou', 'BO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(364, 364, 23, 'Collines', 'CO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(365, 365, 23, 'Donga', 'DO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(366, 366, 23, 'Kouffo', 'KO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(367, 367, 23, 'Littoral', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(368, 368, 23, 'Mono', 'MO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(369, 369, 23, 'Oueme', 'OU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(370, 370, 23, 'Plateau', 'PL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(371, 371, 23, 'Zou', 'ZO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(372, 372, 24, 'Devonshire', 'DS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(373, 373, 24, 'Hamilton City', 'HC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(374, 374, 24, 'Hamilton', 'HA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(375, 375, 24, 'Paget', 'PG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(376, 376, 24, 'Pembroke', 'PB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(377, 377, 24, 'Saint George City', 'GC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(378, 378, 24, 'Saint George\'s', 'SG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(379, 379, 24, 'Sandys', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(380, 380, 24, 'Smith\'s', 'SM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(381, 381, 24, 'Southampton', 'SH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(382, 382, 24, 'Warwick', 'WA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(383, 383, 25, 'Bumthang', 'BUM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(384, 384, 25, 'Chukha', 'CHU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(385, 385, 25, 'Dagana', 'DAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(386, 386, 25, 'Gasa', 'GAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(387, 387, 25, 'Haa', 'HAA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(388, 388, 25, 'Lhuntse', 'LHU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(389, 389, 25, 'Mongar', 'MON', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(390, 390, 25, 'Paro', 'PAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(391, 391, 25, 'Pemagatshel', 'PEM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(392, 392, 25, 'Punakha', 'PUN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(393, 393, 25, 'Samdrup Jongkhar', 'SJO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(394, 394, 25, 'Samtse', 'SAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(395, 395, 25, 'Sarpang', 'SAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(396, 396, 25, 'Thimphu', 'THI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(397, 397, 25, 'Trashigang', 'TRG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(398, 398, 25, 'Trashiyangste', 'TRY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(399, 399, 25, 'Trongsa', 'TRO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(400, 400, 25, 'Tsirang', 'TSI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(401, 401, 25, 'Wangdue Phodrang', 'WPH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(402, 402, 25, 'Zhemgang', 'ZHE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(403, 403, 26, 'Beni', 'BEN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(404, 404, 26, 'Chuquisaca', 'CHU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(405, 405, 26, 'Cochabamba', 'COC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(406, 406, 26, 'La Paz', 'LPZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(407, 407, 26, 'Oruro', 'ORU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(408, 408, 26, 'Pando', 'PAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(409, 409, 26, 'Potosi', 'POT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(410, 410, 26, 'Santa Cruz', 'SCZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(411, 411, 26, 'Tarija', 'TAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(412, 412, 27, 'Brcko district', 'BRO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(413, 413, 27, 'Unsko-Sanski Kanton', 'FUS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(414, 414, 27, 'Posavski Kanton', 'FPO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(415, 415, 27, 'Tuzlanski Kanton', 'FTU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(416, 416, 27, 'Zenicko-Dobojski Kanton', 'FZE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(417, 417, 27, 'Bosanskopodrinjski Kanton', 'FBP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(418, 418, 27, 'Srednjebosanski Kanton', 'FSB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(419, 419, 27, 'Hercegovacko-neretvanski Kanton', 'FHN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(420, 420, 27, 'Zapadnohercegovacka Zupanija', 'FZH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(421, 421, 27, 'Kanton Sarajevo', 'FSA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(422, 422, 27, 'Zapadnobosanska', 'FZA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(423, 423, 27, 'Banja Luka', 'SBL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(424, 424, 27, 'Doboj', 'SDO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(425, 425, 27, 'Bijeljina', 'SBI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(426, 426, 27, 'Vlasenica', 'SVL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(427, 427, 27, 'Sarajevo-Romanija or Sokolac', 'SSR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(428, 428, 27, 'Foca', 'SFO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(429, 429, 27, 'Trebinje', 'STR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(430, 430, 28, 'Central', 'CE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(431, 431, 28, 'Ghanzi', 'GH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(432, 432, 28, 'Kgalagadi', 'KD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(433, 433, 28, 'Kgatleng', 'KT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(434, 434, 28, 'Kweneng', 'KW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(435, 435, 28, 'Ngamiland', 'NG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(436, 436, 28, 'North East', 'NE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(437, 437, 28, 'North West', 'NW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(438, 438, 28, 'South East', 'SE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(439, 439, 28, 'Southern', 'SO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(440, 440, 30, 'Acre', 'AC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(441, 441, 30, 'Alagoas', 'AL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(442, 442, 30, 'Amapá', 'AP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(443, 443, 30, 'Amazonas', 'AM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(444, 444, 30, 'Bahia', 'BA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(445, 445, 30, 'Ceará', 'CE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(446, 446, 30, 'Distrito Federal', 'DF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(447, 447, 30, 'Espírito Santo', 'ES', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(448, 448, 30, 'Goiás', 'GO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(449, 449, 30, 'Maranhão', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(450, 450, 30, 'Mato Grosso', 'MT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(451, 451, 30, 'Mato Grosso do Sul', 'MS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(452, 452, 30, 'Minas Gerais', 'MG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(453, 453, 30, 'Pará', 'PA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(454, 454, 30, 'Paraíba', 'PB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(455, 455, 30, 'Paraná', 'PR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(456, 456, 30, 'Pernambuco', 'PE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(457, 457, 30, 'Piauí', 'PI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(458, 458, 30, 'Rio de Janeiro', 'RJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(459, 459, 30, 'Rio Grande do Norte', 'RN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(460, 460, 30, 'Rio Grande do Sul', 'RS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(461, 461, 30, 'Rondônia', 'RO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(462, 462, 30, 'Roraima', 'RR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(463, 463, 30, 'Santa Catarina', 'SC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(464, 464, 30, 'São Paulo', 'SP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(465, 465, 30, 'Sergipe', 'SE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(466, 466, 30, 'Tocantins', 'TO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(467, 467, 31, 'Peros Banhos', 'PB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(468, 468, 31, 'Salomon Islands', 'SI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(469, 469, 31, 'Nelsons Island', 'NI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(470, 470, 31, 'Three Brothers', 'TB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(471, 471, 31, 'Eagle Islands', 'EA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(472, 472, 31, 'Danger Island', 'DI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(473, 473, 31, 'Egmont Islands', 'EG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(474, 474, 31, 'Diego Garcia', 'DG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(475, 475, 32, 'Belait', 'BEL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(476, 476, 32, 'Brunei and Muara', 'BRM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(477, 477, 32, 'Temburong', 'TEM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(478, 478, 32, 'Tutong', 'TUT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(479, 479, 33, 'Blagoevgrad', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(480, 480, 33, 'Burgas', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(481, 481, 33, 'Dobrich', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(482, 482, 33, 'Gabrovo', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(483, 483, 33, 'Haskovo', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(484, 484, 33, 'Kardjali', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(485, 485, 33, 'Kyustendil', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(486, 486, 33, 'Lovech', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(487, 487, 33, 'Montana', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(488, 488, 33, 'Pazardjik', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(489, 489, 33, 'Pernik', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(490, 490, 33, 'Pleven', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(491, 491, 33, 'Plovdiv', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(492, 492, 33, 'Razgrad', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(493, 493, 33, 'Shumen', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(494, 494, 33, 'Silistra', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(495, 495, 33, 'Sliven', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(496, 496, 33, 'Smolyan', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(497, 497, 33, 'Sofia', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(498, 498, 33, 'Sofia - town', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(499, 499, 33, 'Stara Zagora', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(500, 500, 33, 'Targovishte', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(501, 501, 33, 'Varna', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(502, 502, 33, 'Veliko Tarnovo', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(503, 503, 33, 'Vidin', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(504, 504, 33, 'Vratza', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(505, 505, 33, 'Yambol', '', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(506, 506, 34, 'Bale', 'BAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(507, 507, 34, 'Bam', 'BAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(508, 508, 34, 'Banwa', 'BAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(509, 509, 34, 'Bazega', 'BAZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(510, 510, 34, 'Bougouriba', 'BOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(511, 511, 34, 'Boulgou', 'BLG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(512, 512, 34, 'Boulkiemde', 'BOK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(513, 513, 34, 'Comoe', 'COM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(514, 514, 34, 'Ganzourgou', 'GAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(515, 515, 34, 'Gnagna', 'GNA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(516, 516, 34, 'Gourma', 'GOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(517, 517, 34, 'Houet', 'HOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(518, 518, 34, 'Ioba', 'IOA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(519, 519, 34, 'Kadiogo', 'KAD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(520, 520, 34, 'Kenedougou', 'KEN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(521, 521, 34, 'Komondjari', 'KOD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(522, 522, 34, 'Kompienga', 'KOP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(523, 523, 34, 'Kossi', 'KOS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(524, 524, 34, 'Koulpelogo', 'KOL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(525, 525, 34, 'Kouritenga', 'KOT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(526, 526, 34, 'Kourweogo', 'KOW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(527, 527, 34, 'Leraba', 'LER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(528, 528, 34, 'Loroum', 'LOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(529, 529, 34, 'Mouhoun', 'MOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(530, 530, 34, 'Nahouri', 'NAH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(531, 531, 34, 'Namentenga', 'NAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(532, 532, 34, 'Nayala', 'NAY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(533, 533, 34, 'Noumbiel', 'NOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(534, 534, 34, 'Oubritenga', 'OUB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(535, 535, 34, 'Oudalan', 'OUD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(536, 536, 34, 'Passore', 'PAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(537, 537, 34, 'Poni', 'PON', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(538, 538, 34, 'Sanguie', 'SAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(539, 539, 34, 'Sanmatenga', 'SAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(540, 540, 34, 'Seno', 'SEN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(541, 541, 34, 'Sissili', 'SIS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(542, 542, 34, 'Soum', 'SOM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(543, 543, 34, 'Sourou', 'SOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(544, 544, 34, 'Tapoa', 'TAP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(545, 545, 34, 'Tuy', 'TUY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(546, 546, 34, 'Yagha', 'YAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(547, 547, 34, 'Yatenga', 'YAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(548, 548, 34, 'Ziro', 'ZIR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(549, 549, 34, 'Zondoma', 'ZOD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(550, 550, 34, 'Zoundweogo', 'ZOW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(551, 551, 35, 'Bubanza', 'BB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(552, 552, 35, 'Bujumbura', 'BJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(553, 553, 35, 'Bururi', 'BR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(554, 554, 35, 'Cankuzo', 'CA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(555, 555, 35, 'Cibitoke', 'CI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(556, 556, 35, 'Gitega', 'GI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(557, 557, 35, 'Karuzi', 'KR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(558, 558, 35, 'Kayanza', 'KY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(559, 559, 35, 'Kirundo', 'KI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(560, 560, 35, 'Makamba', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(561, 561, 35, 'Muramvya', 'MU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(562, 562, 35, 'Muyinga', 'MY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(563, 563, 35, 'Mwaro', 'MW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(564, 564, 35, 'Ngozi', 'NG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(565, 565, 35, 'Rutana', 'RT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(566, 566, 35, 'Ruyigi', 'RY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(567, 567, 36, 'Phnom Penh', 'PP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(568, 568, 36, 'Preah Seihanu (Kompong Som or Sihanoukville)', 'PS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(569, 569, 36, 'Pailin', 'PA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(570, 570, 36, 'Keb', 'KB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(571, 571, 36, 'Banteay Meanchey', 'BM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(572, 572, 36, 'Battambang', 'BA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(573, 573, 36, 'Kampong Cham', 'KM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(574, 574, 36, 'Kampong Chhnang', 'KN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(575, 575, 36, 'Kampong Speu', 'KU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(576, 576, 36, 'Kampong Som', 'KO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(577, 577, 36, 'Kampong Thom', 'KT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(578, 578, 36, 'Kampot', 'KP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(579, 579, 36, 'Kandal', 'KL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(580, 580, 36, 'Kaoh Kong', 'KK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(581, 581, 36, 'Kratie', 'KR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(582, 582, 36, 'Mondul Kiri', 'MK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(583, 583, 36, 'Oddar Meancheay', 'OM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(584, 584, 36, 'Pursat', 'PU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(585, 585, 36, 'Preah Vihear', 'PR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(586, 586, 36, 'Prey Veng', 'PG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(587, 587, 36, 'Ratanak Kiri', 'RK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(588, 588, 36, 'Siemreap', 'SI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(589, 589, 36, 'Stung Treng', 'ST', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(590, 590, 36, 'Svay Rieng', 'SR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(591, 591, 36, 'Takeo', 'TK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(592, 592, 37, 'Adamawa (Adamaoua)', 'ADA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(593, 593, 37, 'Centre', 'CEN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(594, 594, 37, 'East (Est)', 'EST', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(595, 595, 37, 'Extreme North (Extreme-Nord)', 'EXN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(596, 596, 37, 'Littoral', 'LIT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(597, 597, 37, 'North (Nord)', 'NOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(598, 598, 37, 'Northwest (Nord-Ouest)', 'NOT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(599, 599, 37, 'West (Ouest)', 'OUE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(600, 600, 37, 'South (Sud)', 'SUD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(601, 601, 37, 'Southwest (Sud-Ouest).', 'SOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(602, 602, 38, 'Alberta', 'AB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(603, 603, 38, 'British Columbia', 'BC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(604, 604, 38, 'Manitoba', 'MB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(605, 605, 38, 'New Brunswick', 'NB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(606, 606, 38, 'Newfoundland and Labrador', 'NL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(607, 607, 38, 'Northwest Territories', 'NT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(608, 608, 38, 'Nova Scotia', 'NS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(609, 609, 38, 'Nunavut', 'NU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(610, 610, 38, 'Ontario', 'ON', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(611, 611, 38, 'Prince Edward Island', 'PE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(612, 612, 38, 'Qu&eacute;bec', 'QC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(613, 613, 38, 'Saskatchewan', 'SK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(614, 614, 38, 'Yukon Territory', 'YT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(615, 615, 39, 'Boa Vista', 'BV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(616, 616, 39, 'Brava', 'BR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(617, 617, 39, 'Calheta de Sao Miguel', 'CS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(618, 618, 39, 'Maio', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(619, 619, 39, 'Mosteiros', 'MO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(620, 620, 39, 'Paul', 'PA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(621, 621, 39, 'Porto Novo', 'PN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(622, 622, 39, 'Praia', 'PR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(623, 623, 39, 'Ribeira Grande', 'RG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(624, 624, 39, 'Sal', 'SL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(625, 625, 39, 'Santa Catarina', 'CA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(626, 626, 39, 'Santa Cruz', 'CR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(627, 627, 39, 'Sao Domingos', 'SD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(628, 628, 39, 'Sao Filipe', 'SF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(629, 629, 39, 'Sao Nicolau', 'SN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(630, 630, 39, 'Sao Vicente', 'SV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(631, 631, 39, 'Tarrafal', 'TA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(632, 632, 40, 'Creek', 'CR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(633, 633, 40, 'Eastern', 'EA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(634, 634, 40, 'Midland', 'ML', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(635, 635, 40, 'South Town', 'ST', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(636, 636, 40, 'Spot Bay', 'SP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(637, 637, 40, 'Stake Bay', 'SK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(638, 638, 40, 'West End', 'WD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(639, 639, 40, 'Western', 'WN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(640, 640, 41, 'Bamingui-Bangoran', 'BBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(641, 641, 41, 'Basse-Kotto', 'BKO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(642, 642, 41, 'Haute-Kotto', 'HKO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(643, 643, 41, 'Haut-Mbomou', 'HMB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(644, 644, 41, 'Kemo', 'KEM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(645, 645, 41, 'Lobaye', 'LOB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(646, 646, 41, 'Mambere-KadeÔ', 'MKD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(647, 647, 41, 'Mbomou', 'MBO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(648, 648, 41, 'Nana-Mambere', 'NMM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(649, 649, 41, 'Ombella-M\'Poko', 'OMP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(650, 650, 41, 'Ouaka', 'OUK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(651, 651, 41, 'Ouham', 'OUH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(652, 652, 41, 'Ouham-Pende', 'OPE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(653, 653, 41, 'Vakaga', 'VAK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(654, 654, 41, 'Nana-Grebizi', 'NGR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(655, 655, 41, 'Sangha-Mbaere', 'SMB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(656, 656, 41, 'Bangui', 'BAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(657, 657, 42, 'Batha', 'BA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(658, 658, 42, 'Biltine', 'BI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(659, 659, 42, 'Borkou-Ennedi-Tibesti', 'BE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(660, 660, 42, 'Chari-Baguirmi', 'CB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(661, 661, 42, 'Guera', 'GU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(662, 662, 42, 'Kanem', 'KA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(663, 663, 42, 'Lac', 'LA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(664, 664, 42, 'Logone Occidental', 'LC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(665, 665, 42, 'Logone Oriental', 'LR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(666, 666, 42, 'Mayo-Kebbi', 'MK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(667, 667, 42, 'Moyen-Chari', 'MC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(668, 668, 42, 'Ouaddai', 'OU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(669, 669, 42, 'Salamat', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(670, 670, 42, 'Tandjile', 'TA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(671, 671, 43, 'Aisen del General Carlos Ibanez', 'AI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(672, 672, 43, 'Antofagasta', 'AN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(673, 673, 43, 'Araucania', 'AR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(674, 674, 43, 'Atacama', 'AT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(675, 675, 43, 'Bio-Bio', 'BI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(676, 676, 43, 'Coquimbo', 'CO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(677, 677, 43, 'Libertador General Bernardo O\'Higgins', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(678, 678, 43, 'Los Lagos', 'LL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(679, 679, 43, 'Magallanes y de la Antartica Chilena', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(680, 680, 43, 'Maule', 'ML', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(681, 681, 43, 'Region Metropolitana', 'RM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(682, 682, 43, 'Tarapaca', 'TA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(683, 683, 43, 'Valparaiso', 'VS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(684, 684, 44, 'Anhui', 'AN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(685, 685, 44, 'Beijing', 'BE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(686, 686, 44, 'Chongqing', 'CH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(687, 687, 44, 'Fujian', 'FU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(688, 688, 44, 'Gansu', 'GA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(689, 689, 44, 'Guangdong', 'GU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(690, 690, 44, 'Guangxi', 'GX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(691, 691, 44, 'Guizhou', 'GZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(692, 692, 44, 'Hainan', 'HA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(693, 693, 44, 'Hebei', 'HB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(694, 694, 44, 'Heilongjiang', 'HL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(695, 695, 44, 'Henan', 'HE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(696, 696, 44, 'Hong Kong', 'HK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(697, 697, 44, 'Hubei', 'HU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(698, 698, 44, 'Hunan', 'HN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(699, 699, 44, 'Inner Mongolia', 'IM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(700, 700, 44, 'Jiangsu', 'JI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(701, 701, 44, 'Jiangxi', 'JX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(702, 702, 44, 'Jilin', 'JL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(703, 703, 44, 'Liaoning', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(704, 704, 44, 'Macau', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(705, 705, 44, 'Ningxia', 'NI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(706, 706, 44, 'Shaanxi', 'SH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(707, 707, 44, 'Shandong', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(708, 708, 44, 'Shanghai', 'SG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(709, 709, 44, 'Shanxi', 'SX', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(710, 710, 44, 'Sichuan', 'SI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(711, 711, 44, 'Tianjin', 'TI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(712, 712, 44, 'Xinjiang', 'XI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(713, 713, 44, 'Yunnan', 'YU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(714, 714, 44, 'Zhejiang', 'ZH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(715, 715, 46, 'Direction Island', 'D', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(716, 716, 46, 'Home Island', 'H', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(717, 717, 46, 'Horsburgh Island', 'O', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(718, 718, 46, 'South Island', 'S', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(719, 719, 46, 'West Island', 'W', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(720, 720, 47, 'Amazonas', 'AMZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(721, 721, 47, 'Antioquia', 'ANT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(722, 722, 47, 'Arauca', 'ARA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(723, 723, 47, 'Atlantico', 'ATL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(724, 724, 47, 'Bogota D.C.', 'BDC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(725, 725, 47, 'Bolivar', 'BOL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(726, 726, 47, 'Boyaca', 'BOY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(727, 727, 47, 'Caldas', 'CAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(728, 728, 47, 'Caqueta', 'CAQ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(729, 729, 47, 'Casanare', 'CAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(730, 730, 47, 'Cauca', 'CAU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(731, 731, 47, 'Cesar', 'CES', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(732, 732, 47, 'Choco', 'CHO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(733, 733, 47, 'Cordoba', 'COR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(734, 734, 47, 'Cundinamarca', 'CAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(735, 735, 47, 'Guainia', 'GNA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(736, 736, 47, 'Guajira', 'GJR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(737, 737, 47, 'Guaviare', 'GVR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(738, 738, 47, 'Huila', 'HUI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(739, 739, 47, 'Magdalena', 'MAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(740, 740, 47, 'Meta', 'MET', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(741, 741, 47, 'Narino', 'NAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(742, 742, 47, 'Norte de Santander', 'NDS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(743, 743, 47, 'Putumayo', 'PUT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(744, 744, 47, 'Quindio', 'QUI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(745, 745, 47, 'Risaralda', 'RIS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(746, 746, 47, 'San Andres y Providencia', 'SAP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(747, 747, 47, 'Santander', 'SAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(748, 748, 47, 'Sucre', 'SUC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(749, 749, 47, 'Tolima', 'TOL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(750, 750, 47, 'Valle del Cauca', 'VDC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(751, 751, 47, 'Vaupes', 'VAU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(752, 752, 47, 'Vichada', 'VIC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(753, 753, 48, 'Grande Comore', 'G', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(754, 754, 48, 'Anjouan', 'A', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(755, 755, 48, 'Moheli', 'M', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(756, 756, 49, 'Bouenza', 'BO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(757, 757, 49, 'Brazzaville', 'BR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(758, 758, 49, 'Cuvette', 'CU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(759, 759, 49, 'Cuvette-Ouest', 'CO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(760, 760, 49, 'Kouilou', 'KO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(761, 761, 49, 'Lekoumou', 'LE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(762, 762, 49, 'Likouala', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(763, 763, 49, 'Niari', 'NI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(764, 764, 49, 'Plateaux', 'PL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(765, 765, 49, 'Pool', 'PO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(766, 766, 49, 'Sangha', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(767, 767, 50, 'Pukapuka', 'PU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(768, 768, 50, 'Rakahanga', 'RK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(769, 769, 50, 'Manihiki', 'MK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(770, 770, 50, 'Penrhyn', 'PE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(771, 771, 50, 'Nassau Island', 'NI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(772, 772, 50, 'Surwarrow', 'SU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(773, 773, 50, 'Palmerston', 'PA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(774, 774, 50, 'Aitutaki', 'AI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(775, 775, 50, 'Manuae', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(776, 776, 50, 'Takutea', 'TA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(777, 777, 50, 'Mitiaro', 'MT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(778, 778, 50, 'Atiu', 'AT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(779, 779, 50, 'Mauke', 'MU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(780, 780, 50, 'Rarotonga', 'RR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(781, 781, 50, 'Mangaia', 'MG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(782, 782, 51, 'Alajuela', 'AL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(783, 783, 51, 'Cartago', 'CA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(784, 784, 51, 'Guanacaste', 'GU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(785, 785, 51, 'Heredia', 'HE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(786, 786, 51, 'Limon', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(787, 787, 51, 'Puntarenas', 'PU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(788, 788, 51, 'San Jose', 'SJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(789, 789, 52, 'Abengourou', 'ABE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(790, 790, 52, 'Abidjan', 'ABI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(791, 791, 52, 'Aboisso', 'ABO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(792, 792, 52, 'Adiake', 'ADI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(793, 793, 52, 'Adzope', 'ADZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(794, 794, 52, 'Agboville', 'AGB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(795, 795, 52, 'Agnibilekrou', 'AGN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(796, 796, 52, 'Alepe', 'ALE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(797, 797, 52, 'Bocanda', 'BOC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(798, 798, 52, 'Bangolo', 'BAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(799, 799, 52, 'Beoumi', 'BEO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(800, 800, 52, 'Biankouma', 'BIA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(801, 801, 52, 'Bondoukou', 'BDK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(802, 802, 52, 'Bongouanou', 'BGN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(803, 803, 52, 'Bouafle', 'BFL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(804, 804, 52, 'Bouake', 'BKE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(805, 805, 52, 'Bouna', 'BNA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(806, 806, 52, 'Boundiali', 'BDL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(807, 807, 52, 'Dabakala', 'DKL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(808, 808, 52, 'Dabou', 'DBU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(809, 809, 52, 'Daloa', 'DAL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(810, 810, 52, 'Danane', 'DAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(811, 811, 52, 'Daoukro', 'DAO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(812, 812, 52, 'Dimbokro', 'DIM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(813, 813, 52, 'Divo', 'DIV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(814, 814, 52, 'Duekoue', 'DUE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(815, 815, 52, 'Ferkessedougou', 'FER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(816, 816, 52, 'Gagnoa', 'GAG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(817, 817, 52, 'Grand-Bassam', 'GBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(818, 818, 52, 'Grand-Lahou', 'GLA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(819, 819, 52, 'Guiglo', 'GUI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(820, 820, 52, 'Issia', 'ISS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(821, 821, 52, 'Jacqueville', 'JAC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(822, 822, 52, 'Katiola', 'KAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(823, 823, 52, 'Korhogo', 'KOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(824, 824, 52, 'Lakota', 'LAK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(825, 825, 52, 'Man', 'MAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(826, 826, 52, 'Mankono', 'MKN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(827, 827, 52, 'Mbahiakro', 'MBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(828, 828, 52, 'Odienne', 'ODI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(829, 829, 52, 'Oume', 'OUM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(830, 830, 52, 'Sakassou', 'SAK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(831, 831, 52, 'San-Pedro', 'SPE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(832, 832, 52, 'Sassandra', 'SAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(833, 833, 52, 'Seguela', 'SEG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(834, 834, 52, 'Sinfra', 'SIN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(835, 835, 52, 'Soubre', 'SOU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(836, 836, 52, 'Tabou', 'TAB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(837, 837, 52, 'Tanda', 'TAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(838, 838, 52, 'Tiebissou', 'TIE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(839, 839, 52, 'Tingrela', 'TIN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(840, 840, 52, 'Tiassale', 'TIA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(841, 841, 52, 'Touba', 'TBA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(842, 842, 52, 'Toulepleu', 'TLP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(843, 843, 52, 'Toumodi', 'TMD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(844, 844, 52, 'Vavoua', 'VAV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(845, 845, 52, 'Yamoussoukro', 'YAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(846, 846, 52, 'Zuenoula', 'ZUE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(847, 847, 53, 'Bjelovarsko-bilogorska', 'BB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(848, 848, 53, 'Grad Zagreb', 'GZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(849, 849, 53, 'Dubrovačko-neretvanska', 'DN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(850, 850, 53, 'Istarska', 'IS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(851, 851, 53, 'Karlovačka', 'KA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(852, 852, 53, 'Koprivničko-križevačka', 'KK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(853, 853, 53, 'Krapinsko-zagorska', 'KZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(854, 854, 53, 'Ličko-senjska', 'LS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(855, 855, 53, 'Međimurska', 'ME', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(856, 856, 53, 'Osječko-baranjska', 'OB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(857, 857, 53, 'Požeško-slavonska', 'PS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(858, 858, 53, 'Primorsko-goranska', 'PG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(859, 859, 53, 'Šibensko-kninska', 'SK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(860, 860, 53, 'Sisačko-moslavačka', 'SM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(861, 861, 53, 'Brodsko-posavska', 'BP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(862, 862, 53, 'Splitsko-dalmatinska', 'SD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(863, 863, 53, 'Varaždinska', 'VA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(864, 864, 53, 'Virovitičko-podravska', 'VP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(865, 865, 53, 'Vukovarsko-srijemska', 'VS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(866, 866, 53, 'Zadarska', 'ZA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(867, 867, 53, 'Zagrebačka', 'ZG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(868, 868, 54, 'Camaguey', 'CA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(869, 869, 54, 'Ciego de Avila', 'CD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(870, 870, 54, 'Cienfuegos', 'CI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(871, 871, 54, 'Ciudad de La Habana', 'CH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(872, 872, 54, 'Granma', 'GR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(873, 873, 54, 'Guantanamo', 'GU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(874, 874, 54, 'Holguin', 'HO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(875, 875, 54, 'Isla de la Juventud', 'IJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(876, 876, 54, 'La Habana', 'LH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(877, 877, 54, 'Las Tunas', 'LT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(878, 878, 54, 'Matanzas', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(879, 879, 54, 'Pinar del Rio', 'PR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(880, 880, 54, 'Sancti Spiritus', 'SS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(881, 881, 54, 'Santiago de Cuba', 'SC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(882, 882, 54, 'Villa Clara', 'VC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(883, 883, 55, 'Famagusta', 'F', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(884, 884, 55, 'Kyrenia', 'K', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(885, 885, 55, 'Larnaca', 'A', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(886, 886, 55, 'Limassol', 'I', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(887, 887, 55, 'Nicosia', 'N', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(888, 888, 55, 'Paphos', 'P', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(889, 889, 56, 'Ústecký', 'U', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(890, 890, 56, 'Jihočeský', 'C', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(891, 891, 56, 'Jihomoravský', 'B', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(892, 892, 56, 'Karlovarský', 'K', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(893, 893, 56, 'Královehradecký', 'H', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(894, 894, 56, 'Liberecký', 'L', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(895, 895, 56, 'Moravskoslezský', 'T', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(896, 896, 56, 'Olomoucký', 'M', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(897, 897, 56, 'Pardubický', 'E', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(898, 898, 56, 'Plzeňský', 'P', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(899, 899, 56, 'Praha', 'A', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(900, 900, 56, 'Středočeský', 'S', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(901, 901, 56, 'Vysočina', 'J', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(902, 902, 56, 'Zlínský', 'Z', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(903, 903, 57, 'Arhus', 'AR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(904, 904, 57, 'Bornholm', 'BH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(905, 905, 57, 'Copenhagen', 'CO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(906, 906, 57, 'Faroe Islands', 'FO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(907, 907, 57, 'Frederiksborg', 'FR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(908, 908, 57, 'Fyn', 'FY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(909, 909, 57, 'Kobenhavn', 'KO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(910, 910, 57, 'Nordjylland', 'NO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(911, 911, 57, 'Ribe', 'RI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(912, 912, 57, 'Ringkobing', 'RK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(913, 913, 57, 'Roskilde', 'RO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(914, 914, 57, 'Sonderjylland', 'SO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(915, 915, 57, 'Storstrom', 'ST', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(916, 916, 57, 'Vejle', 'VK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(917, 917, 57, 'Vestj&aelig;lland', 'VJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(918, 918, 57, 'Viborg', 'VB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(919, 919, 58, 'Ali Sabih', 'S', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(920, 920, 58, 'Dikhil', 'K', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(921, 921, 58, 'Djibouti', 'J', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(922, 922, 58, 'Obock', 'O', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(923, 923, 58, 'Tadjoura', 'T', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(924, 924, 59, 'Saint Andrew Parish', 'AND', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(925, 925, 59, 'Saint David Parish', 'DAV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(926, 926, 59, 'Saint George Parish', 'GEO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(927, 927, 59, 'Saint John Parish', 'JOH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(928, 928, 59, 'Saint Joseph Parish', 'JOS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(929, 929, 59, 'Saint Luke Parish', 'LUK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(930, 930, 59, 'Saint Mark Parish', 'MAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(931, 931, 59, 'Saint Patrick Parish', 'PAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(932, 932, 59, 'Saint Paul Parish', 'PAU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(933, 933, 59, 'Saint Peter Parish', 'PET', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(934, 934, 60, 'Distrito Nacional', 'DN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(935, 935, 60, 'Azua', 'AZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(936, 936, 60, 'Baoruco', 'BC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(937, 937, 60, 'Barahona', 'BH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(938, 938, 60, 'Dajabon', 'DJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(939, 939, 60, 'Duarte', 'DU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(940, 940, 60, 'Elias Pina', 'EL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(941, 941, 60, 'El Seybo', 'SY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(942, 942, 60, 'Espaillat', 'ET', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(943, 943, 60, 'Hato Mayor', 'HM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(944, 944, 60, 'Independencia', 'IN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(945, 945, 60, 'La Altagracia', 'AL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(946, 946, 60, 'La Romana', 'RO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(947, 947, 60, 'La Vega', 'VE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(948, 948, 60, 'Maria Trinidad Sanchez', 'MT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(949, 949, 60, 'Monsenor Nouel', 'MN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(950, 950, 60, 'Monte Cristi', 'MC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(951, 951, 60, 'Monte Plata', 'MP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(952, 952, 60, 'Pedernales', 'PD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(953, 953, 60, 'Peravia (Bani)', 'PR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(954, 954, 60, 'Puerto Plata', 'PP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(955, 955, 60, 'Salcedo', 'SL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(956, 956, 60, 'Samana', 'SM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(957, 957, 60, 'Sanchez Ramirez', 'SH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(958, 958, 60, 'San Cristobal', 'SC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(959, 959, 60, 'San Jose de Ocoa', 'JO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(960, 960, 60, 'San Juan', 'SJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(961, 961, 60, 'San Pedro de Macoris', 'PM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(962, 962, 60, 'Santiago', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(963, 963, 60, 'Santiago Rodriguez', 'ST', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(964, 964, 60, 'Santo Domingo', 'SD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(965, 965, 60, 'Valverde', 'VA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(966, 966, 61, 'Aileu', 'AL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(967, 967, 61, 'Ainaro', 'AN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(968, 968, 61, 'Baucau', 'BA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(969, 969, 61, 'Bobonaro', 'BO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(970, 970, 61, 'Cova Lima', 'CO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(971, 971, 61, 'Dili', 'DI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(972, 972, 61, 'Ermera', 'ER', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(973, 973, 61, 'Lautem', 'LA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(974, 974, 61, 'Liquica', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(975, 975, 61, 'Manatuto', 'MT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(976, 976, 61, 'Manufahi', 'MF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(977, 977, 61, 'Oecussi', 'OE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(978, 978, 61, 'Viqueque', 'VI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(979, 979, 62, 'Azuay', 'AZU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(980, 980, 62, 'Bolivar', 'BOL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(981, 981, 62, 'Ca&ntilde;ar', 'CAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(982, 982, 62, 'Carchi', 'CAR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(983, 983, 62, 'Chimborazo', 'CHI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(984, 984, 62, 'Cotopaxi', 'COT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(985, 985, 62, 'El Oro', 'EOR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(986, 986, 62, 'Esmeraldas', 'ESM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(987, 987, 62, 'Gal&aacute;pagos', 'GPS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(988, 988, 62, 'Guayas', 'GUA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(989, 989, 62, 'Imbabura', 'IMB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(990, 990, 62, 'Loja', 'LOJ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(991, 991, 62, 'Los Rios', 'LRO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(992, 992, 62, 'Manab&iacute;', 'MAN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(993, 993, 62, 'Morona Santiago', 'MSA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(994, 994, 62, 'Napo', 'NAP', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(995, 995, 62, 'Orellana', 'ORE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(996, 996, 62, 'Pastaza', 'PAS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(997, 997, 62, 'Pichincha', 'PIC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(998, 998, 62, 'Sucumb&iacute;os', 'SUC', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(999, 999, 62, 'Tungurahua', 'TUN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1000, 1000, 62, 'Zamora Chinchipe', 'ZCH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1001, 1001, 63, 'Ad Daqahliyah', 'DHY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1002, 1002, 63, 'Al Bahr al Ahmar', 'BAM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1003, 1003, 63, 'Al Buhayrah', 'BHY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1004, 1004, 63, 'Al Fayyum', 'FYM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1005, 1005, 63, 'Al Gharbiyah', 'GBY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1006, 1006, 63, 'Al Iskandariyah', 'IDR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1007, 1007, 63, 'Al Isma\'iliyah', 'IML', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1008, 1008, 63, 'Al Jizah', 'JZH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1009, 1009, 63, 'Al Minufiyah', 'MFY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1010, 1010, 63, 'Al Minya', 'MNY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1011, 1011, 63, 'Al Qahirah', 'QHR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1012, 1012, 63, 'Al Qalyubiyah', 'QLY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1013, 1013, 63, 'Al Wadi al Jadid', 'WJD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1014, 1014, 63, 'Ash Sharqiyah', 'SHQ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1015, 1015, 63, 'As Suways', 'SWY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1016, 1016, 63, 'Aswan', 'ASW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1017, 1017, 63, 'Asyut', 'ASY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1018, 1018, 63, 'Bani Suwayf', 'BSW', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1019, 1019, 63, 'Bur Sa\'id', 'BSD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1020, 1020, 63, 'Dumyat', 'DMY', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1021, 1021, 63, 'Janub Sina', 'JNS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1022, 1022, 63, 'Kafr ash Shaykh', 'KSH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1023, 1023, 63, 'Matruh', 'MAT', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1024, 1024, 63, 'Qina', 'QIN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1025, 1025, 63, 'Shamal Sina', 'SHS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1026, 1026, 63, 'Suhaj', 'SUH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1027, 1027, 64, 'Ahuachapan', 'AH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1028, 1028, 64, 'Cabanas', 'CA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1029, 1029, 64, 'Chalatenango', 'CH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1030, 1030, 64, 'Cuscatlan', 'CU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1031, 1031, 64, 'La Libertad', 'LB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1032, 1032, 64, 'La Paz', 'PZ', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1033, 1033, 64, 'La Union', 'UN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1034, 1034, 64, 'Morazan', 'MO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1035, 1035, 64, 'San Miguel', 'SM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1036, 1036, 64, 'San Salvador', 'SS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1037, 1037, 64, 'San Vicente', 'SV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1038, 1038, 64, 'Santa Ana', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1039, 1039, 64, 'Sonsonate', 'SO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1040, 1040, 64, 'Usulutan', 'US', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1041, 1041, 65, 'Provincia Annobon', 'AN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1042, 1042, 65, 'Provincia Bioko Norte', 'BN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1043, 1043, 65, 'Provincia Bioko Sur', 'BS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1044, 1044, 65, 'Provincia Centro Sur', 'CS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1045, 1045, 65, 'Provincia Kie-Ntem', 'KN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1046, 1046, 65, 'Provincia Litoral', 'LI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1047, 1047, 65, 'Provincia Wele-Nzas', 'WN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1048, 1048, 66, 'Central (Maekel)', 'MA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1049, 1049, 66, 'Anseba (Keren)', 'KE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1050, 1050, 66, 'Southern Red Sea (Debub-Keih-Bahri)', 'DK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1051, 1051, 66, 'Northern Red Sea (Semien-Keih-Bahri)', 'SK', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1052, 1052, 66, 'Southern (Debub)', 'DE', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1053, 1053, 66, 'Gash-Barka (Barentu)', 'BR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1054, 1054, 67, 'Harjumaa (Tallinn)', 'HA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1055, 1055, 67, 'Hiiumaa (Kardla)', 'HI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1056, 1056, 67, 'Ida-Virumaa (Johvi)', 'IV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1057, 1057, 67, 'Jarvamaa (Paide)', 'JA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1058, 1058, 67, 'Jogevamaa (Jogeva)', 'JO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1059, 1059, 67, 'Laane-Virumaa (Rakvere)', 'LV', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1060, 1060, 67, 'Laanemaa (Haapsalu)', 'LA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1061, 1061, 67, 'Parnumaa (Parnu)', 'PA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1062, 1062, 67, 'Polvamaa (Polva)', 'PO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1063, 1063, 67, 'Raplamaa (Rapla)', 'RA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1064, 1064, 67, 'Saaremaa (Kuessaare)', 'SA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1065, 1065, 67, 'Tartumaa (Tartu)', 'TA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1066, 1066, 67, 'Valgamaa (Valga)', 'VA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1067, 1067, 67, 'Viljandimaa (Viljandi)', 'VI', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1068, 1068, 67, 'Vorumaa (Voru)', 'VO', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1069, 1069, 68, 'Afar', 'AF', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1070, 1070, 68, 'Amhara', 'AH', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1071, 1071, 68, 'Benishangul-Gumaz', 'BG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1072, 1072, 68, 'Gambela', 'GB', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1073, 1073, 68, 'Hariai', 'HR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1074, 1074, 68, 'Oromia', 'OR', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1075, 1075, 68, 'Somali', 'SM', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1076, 1076, 68, 'Southern Nations - Nationalities and Peoples Regio...', 'SN', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1077, 1077, 68, 'Tigray', 'TG', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1078, 1078, 68, 'Addis Ababa', 'AA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1079, 1079, 68, 'Dire Dawa', 'DD', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1080, 1080, 71, 'Central Division', 'C', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1081, 1081, 71, 'Northern Division', 'N', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1082, 1082, 71, 'Eastern Division', 'E', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1083, 1083, 71, 'Western Division', 'W', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1084, 1084, 71, 'Rotuma', 'R', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1085, 1085, 72, 'Ahvenanmaan lääni', 'AL', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1086, 1086, 72, 'Etelä-Suomen lääni', 'ES', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1087, 1087, 72, 'Itä-Suomen lääni', 'IS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1088, 1088, 72, 'Länsi-Suomen lääni', 'LS', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1089, 1089, 72, 'Lapin lääni', 'LA', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1090, 1090, 72, 'Oulun lääni', 'OU', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1091, 1114, 74, 'Ain', '1', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1092, 1115, 74, 'Aisne', '2', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1093, 1116, 74, 'Allier', '3', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1094, 1117, 74, 'Alpes de Haute Provence', '4', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1095, 1118, 74, 'Hautes-Alpes', '5', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1096, 1119, 74, 'Alpes Maritimes', '6', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1097, 1120, 74, 'Ard&egrave;che', '7', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1098, 1121, 74, 'Ardennes', '8', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1099, 1122, 74, 'Ari&egrave;ge', '9', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1100, 1123, 74, 'Aube', '10', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1101, 1124, 74, 'Aude', '11', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1102, 1125, 74, 'Aveyron', '12', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1103, 1126, 74, 'Bouches du Rh&ocirc;ne', '13', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1104, 1127, 74, 'Calvados', '14', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1105, 1128, 74, 'Cantal', '15', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1106, 1129, 74, 'Charente', '16', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1107, 1130, 74, 'Charente Maritime', '17', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1108, 1131, 74, 'Cher', '18', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1109, 1132, 74, 'Corr&egrave;ze', '19', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1110, 1133, 74, 'Corse du Sud', '2A', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1111, 1134, 74, 'Haute Corse', '2B', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1112, 1135, 74, 'C&ocirc;te d&#039;or', '21', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1113, 1136, 74, 'C&ocirc;tes d&#039;Armor', '22', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1114, 1137, 74, 'Creuse', '23', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1115, 1138, 74, 'Dordogne', '24', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1116, 1139, 74, 'Doubs', '25', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1117, 1140, 74, 'Dr&ocirc;me', '26', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1118, 1141, 74, 'Eure', '27', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1119, 1142, 74, 'Eure et Loir', '28', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1120, 1143, 74, 'Finist&egrave;re', '29', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1121, 1144, 74, 'Gard', '30', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1122, 1145, 74, 'Haute Garonne', '31', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1123, 1146, 74, 'Gers', '32', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1124, 1147, 74, 'Gironde', '33', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1125, 1148, 74, 'H&eacute;rault', '34', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1126, 1149, 74, 'Ille et Vilaine', '35', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1127, 1150, 74, 'Indre', '36', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1128, 1151, 74, 'Indre et Loire', '37', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1129, 1152, 74, 'Is&eacute;re', '38', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1130, 1153, 74, 'Jura', '39', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1131, 1154, 74, 'Landes', '40', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1132, 1155, 74, 'Loir et Cher', '41', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1133, 1156, 74, 'Loire', '42', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1134, 1157, 74, 'Haute Loire', '43', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1135, 1158, 74, 'Loire Atlantique', '44', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1136, 1159, 74, 'Loiret', '45', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1137, 1160, 74, 'Lot', '46', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1138, 1161, 74, 'Lot et Garonne', '47', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1139, 1162, 74, 'Loz&egrave;re', '48', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1140, 1163, 74, 'Maine et Loire', '49', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1141, 1164, 74, 'Manche', '50', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1142, 1165, 74, 'Marne', '51', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1143, 1166, 74, 'Haute Marne', '52', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1144, 1167, 74, 'Mayenne', '53', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1145, 1168, 74, 'Meurthe et Moselle', '54', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1146, 1169, 74, 'Meuse', '55', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1147, 1170, 74, 'Morbihan', '56', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1148, 1171, 74, 'Moselle', '57', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1149, 1172, 74, 'Ni&egrave;vre', '58', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1150, 1173, 74, 'Nord', '59', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1151, 1174, 74, 'Oise', '60', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1152, 1175, 74, 'Orne', '61', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1153, 1176, 74, 'Pas de Calais', '62', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1154, 1177, 74, 'Puy de D&ocirc;me', '63', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1155, 1178, 74, 'Pyr&eacute;n&eacute;es Atlantiques', '64', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1156, 1179, 74, 'Hautes Pyr&eacute;n&eacute;es', '65', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1157, 1180, 74, 'Pyr&eacute;n&eacute;es Orientales', '66', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1158, 1181, 74, 'Bas Rhin', '67', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1159, 1182, 74, 'Haut Rhin', '68', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1160, 1183, 74, 'Rh&ocirc;ne', '69', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1161, 1184, 74, 'Haute Sa&ocirc;ne', '70', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1162, 1185, 74, 'Sa&ocirc;ne et Loire', '71', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1163, 1186, 74, 'Sarthe', '72', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1164, 1187, 74, 'Savoie', '73', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1165, 1188, 74, 'Haute Savoie', '74', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1166, 1189, 74, 'Paris', '75', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1167, 1190, 74, 'Seine Maritime', '76', 0, 1, '2020-10-29 11:35:00', '2020-10-29 11:35:00', NULL),
(1168, 1191, 74, 'Seine et Marne', '77', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1169, 1192, 74, 'Yvelines', '78', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1170, 1193, 74, 'Deux S&egrave;vres', '79', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1171, 1194, 74, 'Somme', '80', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1172, 1195, 74, 'Tarn', '81', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1173, 1196, 74, 'Tarn et Garonne', '82', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1174, 1197, 74, 'Var', '83', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1175, 1198, 74, 'Vaucluse', '84', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1176, 1199, 74, 'Vend&eacute;e', '85', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1177, 1200, 74, 'Vienne', '86', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1178, 1201, 74, 'Haute Vienne', '87', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1179, 1202, 74, 'Vosges', '88', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1180, 1203, 74, 'Yonne', '89', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1181, 1204, 74, 'Territoire de Belfort', '90', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1182, 1205, 74, 'Essonne', '91', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1183, 1206, 74, 'Hauts de Seine', '92', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1184, 1207, 74, 'Seine St-Denis', '93', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1185, 1208, 74, 'Val de Marne', '94', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1186, 1209, 74, 'Val d\'Oise', '95', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1187, 1210, 76, 'Archipel des Marquises', 'M', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1188, 1211, 76, 'Archipel des Tuamotu', 'T', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1189, 1212, 76, 'Archipel des Tubuai', 'I', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1190, 1213, 76, 'Iles du Vent', 'V', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1191, 1214, 76, 'Iles Sous-le-Vent', 'S', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1192, 1215, 77, 'Iles Crozet', 'C', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1193, 1216, 77, 'Iles Kerguelen', 'K', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1194, 1217, 77, 'Ile Amsterdam', 'A', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1195, 1218, 77, 'Ile Saint-Paul', 'P', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1196, 1219, 77, 'Adelie Land', 'D', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1197, 1220, 78, 'Estuaire', 'ES', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1198, 1221, 78, 'Haut-Ogooue', 'HO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1199, 1222, 78, 'Moyen-Ogooue', 'MO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1200, 1223, 78, 'Ngounie', 'NG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1201, 1224, 78, 'Nyanga', 'NY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1202, 1225, 78, 'Ogooue-Ivindo', 'OI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1203, 1226, 78, 'Ogooue-Lolo', 'OL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1204, 1227, 78, 'Ogooue-Maritime', 'OM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1205, 1228, 78, 'Woleu-Ntem', 'WN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1206, 1229, 79, 'Banjul', 'BJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1207, 1230, 79, 'Basse', 'BS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1208, 1231, 79, 'Brikama', 'BR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1209, 1232, 79, 'Janjangbure', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1210, 1233, 79, 'Kanifeng', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1211, 1234, 79, 'Kerewan', 'KE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1212, 1235, 79, 'Kuntaur', 'KU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1213, 1236, 79, 'Mansakonko', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1214, 1237, 79, 'Lower River', 'LR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1215, 1238, 79, 'Central River', 'CR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1216, 1239, 79, 'North Bank', 'NB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1217, 1240, 79, 'Upper River', 'UR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1218, 1241, 79, 'Western', 'WE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1219, 1242, 80, 'Abkhazia', 'AB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1220, 1243, 80, 'Ajaria', 'AJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1221, 1244, 80, 'Tbilisi', 'TB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1222, 1245, 80, 'Guria', 'GU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1223, 1246, 80, 'Imereti', 'IM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1224, 1247, 80, 'Kakheti', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1225, 1248, 80, 'Kvemo Kartli', 'KK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1226, 1249, 80, 'Mtskheta-Mtianeti', 'MM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1227, 1250, 80, 'Racha Lechkhumi and Kvemo Svanet', 'RL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1228, 1251, 80, 'Samegrelo-Zemo Svaneti', 'SZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1229, 1252, 80, 'Samtskhe-Javakheti', 'SJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1230, 1253, 80, 'Shida Kartli', 'SK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1231, 1254, 81, 'Baden-Württemberg', 'BAW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1232, 1255, 81, 'Bayern', 'BAY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1233, 1256, 81, 'Berlin', 'BER', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1234, 1257, 81, 'Brandenburg', 'BRG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1235, 1258, 81, 'Bremen', 'BRE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1236, 1259, 81, 'Hamburg', 'HAM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1237, 1260, 81, 'Hessen', 'HES', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1238, 1261, 81, 'Mecklenburg-Vorpommern', 'MEC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1239, 1262, 81, 'Niedersachsen', 'NDS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1240, 1263, 81, 'Nordrhein-Westfalen', 'NRW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1241, 1264, 81, 'Rheinland-Pfalz', 'RHE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1242, 1265, 81, 'Saarland', 'SAR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1243, 1266, 81, 'Sachsen', 'SAS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1244, 1267, 81, 'Sachsen-Anhalt', 'SAC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1245, 1268, 81, 'Schleswig-Holstein', 'SCN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1246, 1269, 81, 'Thüringen', 'THE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1247, 1270, 82, 'Ashanti Region', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1248, 1271, 82, 'Brong-Ahafo Region', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1249, 1272, 82, 'Central Region', 'CE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1250, 1273, 82, 'Eastern Region', 'EA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1251, 1274, 82, 'Greater Accra Region', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1252, 1275, 82, 'Northern Region', 'NO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1253, 1276, 82, 'Upper East Region', 'UE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1254, 1277, 82, 'Upper West Region', 'UW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1255, 1278, 82, 'Volta Region', 'VO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1256, 1279, 82, 'Western Region', 'WE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1257, 1280, 84, 'Attica', 'AT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1258, 1281, 84, 'Central Greece', 'CN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1259, 1282, 84, 'Central Macedonia', 'CM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1260, 1283, 84, 'Crete', 'CR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1261, 1284, 84, 'East Macedonia and Thrace', 'EM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1262, 1285, 84, 'Epirus', 'EP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1263, 1286, 84, 'Ionian Islands', 'II', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1264, 1287, 84, 'North Aegean', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1265, 1288, 84, 'Peloponnesos', 'PP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1266, 1289, 84, 'South Aegean', 'SA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1267, 1290, 84, 'Thessaly', 'TH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1268, 1291, 84, 'West Greece', 'WG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1269, 1292, 84, 'West Macedonia', 'WM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1270, 1293, 85, 'Avannaa', 'A', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1271, 1294, 85, 'Tunu', 'T', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1272, 1295, 85, 'Kitaa', 'K', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1273, 1296, 86, 'Saint Andrew', 'A', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1274, 1297, 86, 'Saint David', 'D', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1275, 1298, 86, 'Saint George', 'G', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1276, 1299, 86, 'Saint John', 'J', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1277, 1300, 86, 'Saint Mark', 'M', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1278, 1301, 86, 'Saint Patrick', 'P', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1279, 1302, 86, 'Carriacou', 'C', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1280, 1303, 86, 'Petit Martinique', 'Q', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1281, 1304, 89, 'Alta Verapaz', 'AV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1282, 1305, 89, 'Baja Verapaz', 'BV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1283, 1306, 89, 'Chimaltenango', 'CM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1284, 1307, 89, 'Chiquimula', 'CQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1285, 1308, 89, 'El Peten', 'PE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1286, 1309, 89, 'El Progreso', 'PR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1287, 1310, 89, 'El Quiche', 'QC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1288, 1311, 89, 'Escuintla', 'ES', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1289, 1312, 89, 'Guatemala', 'GU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1290, 1313, 89, 'Huehuetenango', 'HU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1291, 1314, 89, 'Izabal', 'IZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1292, 1315, 89, 'Jalapa', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1293, 1316, 89, 'Jutiapa', 'JU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1294, 1317, 89, 'Quetzaltenango', 'QZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1295, 1318, 89, 'Retalhuleu', 'RE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1296, 1319, 89, 'Sacatepequez', 'ST', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1297, 1320, 89, 'San Marcos', 'SM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1298, 1321, 89, 'Santa Rosa', 'SR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1299, 1322, 89, 'Solola', 'SO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1300, 1323, 89, 'Suchitepequez', 'SU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1301, 1324, 89, 'Totonicapan', 'TO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1302, 1325, 89, 'Zacapa', 'ZA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1303, 1326, 90, 'Conakry', 'CNK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1304, 1327, 90, 'Beyla', 'BYL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1305, 1328, 90, 'Boffa', 'BFA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1306, 1329, 90, 'Boke', 'BOK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1307, 1330, 90, 'Coyah', 'COY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1308, 1331, 90, 'Dabola', 'DBL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1309, 1332, 90, 'Dalaba', 'DLB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1310, 1333, 90, 'Dinguiraye', 'DGR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1311, 1334, 90, 'Dubreka', 'DBR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1312, 1335, 90, 'Faranah', 'FRN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1313, 1336, 90, 'Forecariah', 'FRC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1314, 1337, 90, 'Fria', 'FRI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1315, 1338, 90, 'Gaoual', 'GAO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1316, 1339, 90, 'Gueckedou', 'GCD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1317, 1340, 90, 'Kankan', 'KNK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1318, 1341, 90, 'Kerouane', 'KRN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1319, 1342, 90, 'Kindia', 'KND', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1320, 1343, 90, 'Kissidougou', 'KSD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1321, 1344, 90, 'Koubia', 'KBA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1322, 1345, 90, 'Koundara', 'KDA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1323, 1346, 90, 'Kouroussa', 'KRA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1324, 1347, 90, 'Labe', 'LAB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1325, 1348, 90, 'Lelouma', 'LLM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1326, 1349, 90, 'Lola', 'LOL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1327, 1350, 90, 'Macenta', 'MCT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1328, 1351, 90, 'Mali', 'MAL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1329, 1352, 90, 'Mamou', 'MAM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1330, 1353, 90, 'Mandiana', 'MAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1331, 1354, 90, 'Nzerekore', 'NZR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1332, 1355, 90, 'Pita', 'PIT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1333, 1356, 90, 'Siguiri', 'SIG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1334, 1357, 90, 'Telimele', 'TLM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1335, 1358, 90, 'Tougue', 'TOG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1336, 1359, 90, 'Yomou', 'YOM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1337, 1360, 91, 'Bafata Region', 'BF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1338, 1361, 91, 'Biombo Region', 'BB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1339, 1362, 91, 'Bissau Region', 'BS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1340, 1363, 91, 'Bolama Region', 'BL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1341, 1364, 91, 'Cacheu Region', 'CA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1342, 1365, 91, 'Gabu Region', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1343, 1366, 91, 'Oio Region', 'OI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1344, 1367, 91, 'Quinara Region', 'QU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1345, 1368, 91, 'Tombali Region', 'TO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1346, 1369, 92, 'Barima-Waini', 'BW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1347, 1370, 92, 'Cuyuni-Mazaruni', 'CM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1348, 1371, 92, 'Demerara-Mahaica', 'DM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1349, 1372, 92, 'East Berbice-Corentyne', 'EC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1350, 1373, 92, 'Essequibo Islands-West Demerara', 'EW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1351, 1374, 92, 'Mahaica-Berbice', 'MB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1352, 1375, 92, 'Pomeroon-Supenaam', 'PM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1353, 1376, 92, 'Potaro-Siparuni', 'PI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1354, 1377, 92, 'Upper Demerara-Berbice', 'UD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1355, 1378, 92, 'Upper Takutu-Upper Essequibo', 'UT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1356, 1379, 93, 'Artibonite', 'AR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1357, 1380, 93, 'Centre', 'CE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1358, 1381, 93, 'Grand Anse', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1359, 1382, 93, 'Nord', 'ND', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1360, 1383, 93, 'Nord-Est', 'NE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1361, 1384, 93, 'Nord-Ouest', 'NO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1362, 1385, 93, 'Ouest', 'OU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1363, 1386, 93, 'Sud', 'SD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1364, 1387, 93, 'Sud-Est', 'SE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1365, 1388, 94, 'Flat Island', 'F', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1366, 1389, 94, 'McDonald Island', 'M', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1367, 1390, 94, 'Shag Island', 'S', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1368, 1391, 94, 'Heard Island', 'H', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1369, 1392, 95, 'Atlantida', 'AT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1370, 1393, 95, 'Choluteca', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1371, 1394, 95, 'Colon', 'CL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1372, 1395, 95, 'Comayagua', 'CM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1373, 1396, 95, 'Copan', 'CP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1374, 1397, 95, 'Cortes', 'CR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1375, 1398, 95, 'El Paraiso', 'PA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1376, 1399, 95, 'Francisco Morazan', 'FM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1377, 1400, 95, 'Gracias a Dios', 'GD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1378, 1401, 95, 'Intibuca', 'IN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1379, 1402, 95, 'Islas de la Bahia (Bay Islands)', 'IB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1380, 1403, 95, 'La Paz', 'PZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1381, 1404, 95, 'Lempira', 'LE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1382, 1405, 95, 'Ocotepeque', 'OC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1383, 1406, 95, 'Olancho', 'OL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1384, 1407, 95, 'Santa Barbara', 'SB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1385, 1408, 95, 'Valle', 'VA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1386, 1409, 95, 'Yoro', 'YO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1387, 1410, 96, 'Central and Western Hong Kong Island', 'HCW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1388, 1411, 96, 'Eastern Hong Kong Island', 'HEA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1389, 1412, 96, 'Southern Hong Kong Island', 'HSO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1390, 1413, 96, 'Wan Chai Hong Kong Island', 'HWC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1391, 1414, 96, 'Kowloon City Kowloon', 'KKC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1392, 1415, 96, 'Kwun Tong Kowloon', 'KKT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1393, 1416, 96, 'Sham Shui Po Kowloon', 'KSS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1394, 1417, 96, 'Wong Tai Sin Kowloon', 'KWT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1395, 1418, 96, 'Yau Tsim Mong Kowloon', 'KYT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1396, 1419, 96, 'Islands New Territories', 'NIS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1397, 1420, 96, 'Kwai Tsing New Territories', 'NKT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1398, 1421, 96, 'North New Territories', 'NNO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1399, 1422, 96, 'Sai Kung New Territories', 'NSK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1400, 1423, 96, 'Sha Tin New Territories', 'NST', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1401, 1424, 96, 'Tai Po New Territories', 'NTP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1402, 1425, 96, 'Tsuen Wan New Territories', 'NTW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1403, 1426, 96, 'Tuen Mun New Territories', 'NTM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1404, 1427, 96, 'Yuen Long New Territories', 'NYL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1405, 1467, 98, 'Austurland', 'AL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1406, 1468, 98, 'Hofuoborgarsvaeoi', 'HF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1407, 1469, 98, 'Norourland eystra', 'NE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1408, 1470, 98, 'Norourland vestra', 'NV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1409, 1471, 98, 'Suourland', 'SL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1410, 1472, 98, 'Suournes', 'SN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1411, 1473, 98, 'Vestfiroir', 'VF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1412, 1474, 98, 'Vesturland', 'VL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1413, 1475, 99, 'Andaman and Nicobar Islands', 'AN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1414, 1476, 99, 'Andhra Pradesh', 'AP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1415, 1477, 99, 'Arunachal Pradesh', 'AR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1416, 1478, 99, 'Assam', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1417, 1479, 99, 'Bihar', 'BI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1418, 1480, 99, 'Chandigarh', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1419, 1481, 99, 'Dadra and Nagar Haveli', 'DA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1420, 1482, 99, 'Daman and Diu', 'DM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1421, 1483, 99, 'Delhi', 'DE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1422, 1484, 99, 'Goa', 'GO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1423, 1485, 99, 'Gujarat', 'GU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1424, 1486, 99, 'Haryana', 'HA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1425, 1487, 99, 'Himachal Pradesh', 'HP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1426, 1488, 99, 'Jammu and Kashmir', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1427, 1489, 99, 'Karnataka', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1428, 1490, 99, 'Kerala', 'KE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1429, 1491, 99, 'Lakshadweep Islands', 'LI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1430, 1492, 99, 'Madhya Pradesh', 'MP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1431, 1493, 99, 'Maharashtra', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1432, 1494, 99, 'Manipur', 'MN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1433, 1495, 99, 'Meghalaya', 'ME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1434, 1496, 99, 'Mizoram', 'MI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1435, 1497, 99, 'Nagaland', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1436, 1498, 99, 'Orissa', 'OR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1437, 1499, 99, 'Puducherry', 'PO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1438, 1500, 99, 'Punjab', 'PU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1439, 1500, 99, 'Punjab', 'PU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1440, 1501, 99, 'Rajasthan', 'RA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1441, 1502, 99, 'Sikkim', 'SI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1442, 1503, 99, 'Tamil Nadu', 'TN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1443, 1504, 99, 'Tripura', 'TR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1444, 1505, 99, 'Uttar Pradesh', 'UP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1445, 1506, 99, 'West Bengal', 'WB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1446, 1507, 100, 'Aceh', 'AC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1447, 1508, 100, 'Bali', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1448, 1509, 100, 'Banten', 'BT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1449, 1510, 100, 'Bengkulu', 'BE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1450, 1511, 100, 'Kalimantan Utara', 'BD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1451, 1512, 100, 'Gorontalo', 'GO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1452, 1513, 100, 'Jakarta', 'JK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1453, 1514, 100, 'Jambi', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1454, 1515, 100, 'Jawa Barat', 'JB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1455, 1516, 100, 'Jawa Tengah', 'JT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1456, 1517, 100, 'Jawa Timur', 'JI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1457, 1518, 100, 'Kalimantan Barat', 'KB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1458, 1519, 100, 'Kalimantan Selatan', 'KS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1459, 1520, 100, 'Kalimantan Tengah', 'KT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1460, 1521, 100, 'Kalimantan Timur', 'KI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1461, 1522, 100, 'Kepulauan Bangka Belitung', 'BB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1462, 1523, 100, 'Lampung', 'LA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1463, 1524, 100, 'Maluku', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1464, 1525, 100, 'Maluku Utara', 'MU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1465, 1526, 100, 'Nusa Tenggara Barat', 'NB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1466, 1527, 100, 'Nusa Tenggara Timur', 'NT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1467, 1528, 100, 'Papua', 'PA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1468, 1529, 100, 'Riau', 'RI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1469, 1530, 100, 'Sulawesi Selatan', 'SN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1470, 1531, 100, 'Sulawesi Tengah', 'ST', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1471, 1532, 100, 'Sulawesi Tenggara', 'SG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1472, 1533, 100, 'Sulawesi Utara', 'SA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1473, 1534, 100, 'Sumatera Barat', 'SB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1474, 1535, 100, 'Sumatera Selatan', 'SS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1475, 1536, 100, 'Sumatera Utara', 'SU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1476, 1537, 100, 'Yogyakarta', 'YO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1477, 1538, 101, 'Tehran', 'TEH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1478, 1539, 101, 'Qom', 'QOM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1479, 1540, 101, 'Markazi', 'MKZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1480, 1541, 101, 'Qazvin', 'QAZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1481, 1542, 101, 'Gilan', 'GIL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1482, 1543, 101, 'Ardabil', 'ARD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1483, 1544, 101, 'Zanjan', 'ZAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1484, 1545, 101, 'East Azarbaijan', 'EAZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1485, 1546, 101, 'West Azarbaijan', 'WEZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1486, 1547, 101, 'Kurdistan', 'KRD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1487, 1548, 101, 'Hamadan', 'HMD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1488, 1549, 101, 'Kermanshah', 'KRM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1489, 1550, 101, 'Ilam', 'ILM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1490, 1551, 101, 'Lorestan', 'LRS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1491, 1552, 101, 'Khuzestan', 'KZT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1492, 1553, 101, 'Chahar Mahaal and Bakhtiari', 'CMB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1493, 1554, 101, 'Kohkiluyeh and Buyer Ahmad', 'KBA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1494, 1555, 101, 'Bushehr', 'BSH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1495, 1556, 101, 'Fars', 'FAR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1496, 1557, 101, 'Hormozgan', 'HRM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1497, 1558, 101, 'Sistan and Baluchistan', 'SBL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1498, 1559, 101, 'Kerman', 'KRB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1499, 1560, 101, 'Yazd', 'YZD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1500, 1561, 101, 'Esfahan', 'EFH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1501, 1562, 101, 'Semnan', 'SMN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1502, 1563, 101, 'Mazandaran', 'MZD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1503, 1564, 101, 'Golestan', 'GLS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1504, 1565, 101, 'North Khorasan', 'NKH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1505, 1566, 101, 'Razavi Khorasan', 'RKH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1506, 1567, 101, 'South Khorasan', 'SKH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1507, 1568, 102, 'Baghdad', 'BD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1508, 1569, 102, 'Salah ad Din', 'SD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1509, 1570, 102, 'Diyala', 'DY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1510, 1571, 102, 'Wasit', 'WS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1511, 1572, 102, 'Maysan', 'MY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1512, 1573, 102, 'Al Basrah', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1513, 1574, 102, 'Dhi Qar', 'DQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1514, 1575, 102, 'Al Muthanna', 'MU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1515, 1576, 102, 'Al Qadisyah', 'QA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1516, 1577, 102, 'Babil', 'BB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1517, 1578, 102, 'Al Karbala', 'KB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1518, 1579, 102, 'An Najaf', 'NJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1519, 1580, 102, 'Al Anbar', 'AB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1520, 1581, 102, 'Ninawa', 'NN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1521, 1582, 102, 'Dahuk', 'DH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1522, 1583, 102, 'Arbil', 'AL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1523, 1584, 102, 'At Ta\'mim', 'TM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1524, 1585, 102, 'As Sulaymaniyah', 'SL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1525, 1586, 103, 'Carlow', 'CA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1526, 1587, 103, 'Cavan', 'CV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1527, 1588, 103, 'Clare', 'CL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1528, 1589, 103, 'Cork', 'CO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1529, 1590, 103, 'Donegal', 'DO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1530, 1591, 103, 'Dublin', 'DU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1531, 1592, 103, 'Galway', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1532, 1593, 103, 'Kerry', 'KE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1533, 1594, 103, 'Kildare', 'KI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1534, 1595, 103, 'Kilkenny', 'KL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1535, 1596, 103, 'Laois', 'LA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1536, 1597, 103, 'Leitrim', 'LE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1537, 1598, 103, 'Limerick', 'LI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1538, 1599, 103, 'Longford', 'LO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1539, 1600, 103, 'Louth', 'LU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1540, 1601, 103, 'Mayo', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1541, 1602, 103, 'Meath', 'ME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1542, 1603, 103, 'Monaghan', 'MO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1543, 1604, 103, 'Offaly', 'OF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1544, 1605, 103, 'Roscommon', 'RO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1545, 1606, 103, 'Sligo', 'SL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1546, 1607, 103, 'Tipperary', 'TI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1547, 1608, 103, 'Waterford', 'WA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1548, 1609, 103, 'Westmeath', 'WE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1549, 1610, 103, 'Wexford', 'WX', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1550, 1611, 103, 'Wicklow', 'WI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1551, 1612, 104, 'Be\'er Sheva', 'BS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1552, 1613, 104, 'Bika\'at Hayarden', 'BH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1553, 1614, 104, 'Eilat and Arava', 'EA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1554, 1615, 104, 'Galil', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1555, 1616, 104, 'Haifa', 'HA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1556, 1617, 104, 'Jehuda Mountains', 'JM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1557, 1618, 104, 'Jerusalem', 'JE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1558, 1619, 104, 'Negev', 'NE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1559, 1620, 104, 'Semaria', 'SE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1560, 1621, 104, 'Sharon', 'SH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1561, 1622, 104, 'Tel Aviv (Gosh Dan)', 'TA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1562, 1643, 106, 'Clarendon Parish', 'CLA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1563, 1644, 106, 'Hanover Parish', 'HAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1564, 1645, 106, 'Kingston Parish', 'KIN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1565, 1646, 106, 'Manchester Parish', 'MAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1566, 1647, 106, 'Portland Parish', 'POR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1567, 1648, 106, 'Saint Andrew Parish', 'AND', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1568, 1649, 106, 'Saint Ann Parish', 'ANN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1569, 1650, 106, 'Saint Catherine Parish', 'CAT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1570, 1651, 106, 'Saint Elizabeth Parish', 'ELI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1571, 1652, 106, 'Saint James Parish', 'JAM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1572, 1653, 106, 'Saint Mary Parish', 'MAR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1573, 1654, 106, 'Saint Thomas Parish', 'THO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1574, 1655, 106, 'Trelawny Parish', 'TRL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1575, 1656, 106, 'Westmoreland Parish', 'WML', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1576, 1657, 107, 'Aichi', 'AI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1577, 1658, 107, 'Akita', 'AK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1578, 1659, 107, 'Aomori', 'AO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1579, 1660, 107, 'Chiba', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1580, 1661, 107, 'Ehime', 'EH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1581, 1662, 107, 'Fukui', 'FK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1582, 1663, 107, 'Fukuoka', 'FU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1583, 1664, 107, 'Fukushima', 'FS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1584, 1665, 107, 'Gifu', 'GI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1585, 1666, 107, 'Gumma', 'GU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1586, 1667, 107, 'Hiroshima', 'HI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1587, 1668, 107, 'Hokkaido', 'HO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1588, 1669, 107, 'Hyogo', 'HY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1589, 1670, 107, 'Ibaraki', 'IB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1590, 1671, 107, 'Ishikawa', 'IS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1591, 1672, 107, 'Iwate', 'IW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1592, 1673, 107, 'Kagawa', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1593, 1674, 107, 'Kagoshima', 'KG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1594, 1675, 107, 'Kanagawa', 'KN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1595, 1676, 107, 'Kochi', 'KO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1596, 1677, 107, 'Kumamoto', 'KU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1597, 1678, 107, 'Kyoto', 'KY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1598, 1679, 107, 'Mie', 'MI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1599, 1680, 107, 'Miyagi', 'MY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1600, 1681, 107, 'Miyazaki', 'MZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1601, 1682, 107, 'Nagano', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1602, 1683, 107, 'Nagasaki', 'NG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1603, 1684, 107, 'Nara', 'NR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1604, 1685, 107, 'Niigata', 'NI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1605, 1686, 107, 'Oita', 'OI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1606, 1687, 107, 'Okayama', 'OK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1607, 1688, 107, 'Okinawa', 'ON', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1608, 1689, 107, 'Osaka', 'OS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1609, 1690, 107, 'Saga', 'SA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1610, 1691, 107, 'Saitama', 'SI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1611, 1692, 107, 'Shiga', 'SH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1612, 1693, 107, 'Shimane', 'SM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1613, 1694, 107, 'Shizuoka', 'SZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1614, 1695, 107, 'Tochigi', 'TO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1615, 1696, 107, 'Tokushima', 'TS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1616, 1697, 107, 'Tokyo', 'TK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1617, 1698, 107, 'Tottori', 'TT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1618, 1699, 107, 'Toyama', 'TY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1619, 1700, 107, 'Wakayama', 'WA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1620, 1701, 107, 'Yamagata', 'YA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1621, 1702, 107, 'Yamaguchi', 'YM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1622, 1703, 107, 'Yamanashi', 'YN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1623, 1704, 108, 'Amman', 'AM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1624, 1705, 108, 'Ajlun', 'AJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1625, 1706, 108, 'Al Aqabah', 'AA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1626, 1707, 108, 'Al Balqa', 'AB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1627, 1708, 108, 'Al Karak', 'AK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1628, 1709, 108, 'Al Mafraq', 'AL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1629, 1710, 108, 'At Tafilah', 'AT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1630, 1711, 108, 'Az Zarqa', 'AZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1631, 1712, 108, 'Irbid', 'IR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1632, 1713, 108, 'Jarash', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1633, 1714, 108, 'Ma n', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1634, 1715, 108, 'Madaba', 'MD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1635, 1716, 109, 'Almaty', 'AL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1636, 1717, 109, 'Almaty City', 'AC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1637, 1718, 109, 'Aqmola', 'AM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1638, 1719, 109, 'Aqtobe', 'AQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1639, 1720, 109, 'Astana City', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1640, 1721, 109, 'Atyrau', 'AT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1641, 1722, 109, 'Batys Qazaqstan', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1642, 1723, 109, 'Bayqongyr City', 'BY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1643, 1724, 109, 'Mangghystau', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1644, 1725, 109, 'Ongtustik Qazaqstan', 'ON', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1645, 1726, 109, 'Pavlodar', 'PA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1646, 1727, 109, 'Qaraghandy', 'QA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1647, 1728, 109, 'Qostanay', 'QO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1648, 1729, 109, 'Qyzylorda', 'QY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1649, 1730, 109, 'Shyghys Qazaqstan', 'SH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1650, 1731, 109, 'Soltustik Qazaqstan', 'SO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1651, 1732, 109, 'Zhambyl', 'ZH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1652, 1733, 110, 'Central', 'CE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1653, 1734, 110, 'Coast', 'CO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1654, 1735, 110, 'Eastern', 'EA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1655, 1736, 110, 'Nairobi Area', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1656, 1737, 110, 'North Eastern', 'NE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1657, 1738, 110, 'Nyanza', 'NY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1658, 1739, 110, 'Rift Valley', 'RV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1659, 1740, 110, 'Western', 'WE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1660, 1741, 111, 'Abaiang', 'AG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1661, 1742, 111, 'Abemama', 'AM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1662, 1743, 111, 'Aranuka', 'AK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1663, 1744, 111, 'Arorae', 'AO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1664, 1745, 111, 'Banaba', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1665, 1746, 111, 'Beru', 'BE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1666, 1747, 111, 'Butaritari', 'bT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1667, 1748, 111, 'Kanton', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1668, 1749, 111, 'Kiritimati', 'KR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1669, 1750, 111, 'Kuria', 'KU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1670, 1751, 111, 'Maiana', 'MI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1671, 1752, 111, 'Makin', 'MN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1672, 1753, 111, 'Marakei', 'ME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1673, 1754, 111, 'Nikunau', 'NI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1674, 1755, 111, 'Nonouti', 'NO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1675, 1756, 111, 'Onotoa', 'ON', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1676, 1757, 111, 'Tabiteuea', 'TT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1677, 1758, 111, 'Tabuaeran', 'TR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1678, 1759, 111, 'Tamana', 'TM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1679, 1760, 111, 'Tarawa', 'TW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1680, 1761, 111, 'Teraina', 'TE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1681, 1762, 112, 'Chagang-do', 'CHA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1682, 1763, 112, 'Hamgyong-bukto', 'HAB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1683, 1764, 112, 'Hamgyong-namdo', 'HAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1684, 1765, 112, 'Hwanghae-bukto', 'HWB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1685, 1766, 112, 'Hwanghae-namdo', 'HWN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1686, 1767, 112, 'Kangwon-do', 'KAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1687, 1768, 112, 'Pyongan-bukto', 'PYB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1688, 1769, 112, 'Pyongan-namdo', 'PYN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1689, 1770, 112, 'Ryanggang-do (Yanggang-do)', 'YAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1690, 1771, 112, 'Rason Directly Governed City', 'NAJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1691, 1772, 112, 'Pyongyang Special City', 'PYO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1692, 1773, 113, 'Chungchong-bukto', 'CO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1693, 1774, 113, 'Chungchong-namdo', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1694, 1775, 113, 'Cheju-do', 'CD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1695, 1776, 113, 'Cholla-bukto', 'CB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1696, 1777, 113, 'Cholla-namdo', 'CN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1697, 1778, 113, 'Inchon-gwangyoksi', 'IG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1698, 1779, 113, 'Kangwon-do', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1699, 1780, 113, 'Kwangju-gwangyoksi', 'KG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1700, 1781, 113, 'Kyonggi-do', 'KD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1701, 1782, 113, 'Kyongsang-bukto', 'KB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1702, 1783, 113, 'Kyongsang-namdo', 'KN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1703, 1784, 113, 'Pusan-gwangyoksi', 'PG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1704, 1785, 113, 'Soul-tukpyolsi', 'SO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1705, 1786, 113, 'Taegu-gwangyoksi', 'TA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1706, 1787, 113, 'Taejon-gwangyoksi', 'TG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1707, 1788, 114, 'Al Asimah', 'AL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1708, 1789, 114, 'Al Ahmadi', 'AA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1709, 1790, 114, 'Al Farwaniyah', 'AF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1710, 1791, 114, 'Al Jahra', 'AJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1711, 1792, 114, 'Hawalli', 'HA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1712, 1793, 115, 'Bishkek', 'GB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1713, 1794, 115, 'Batken', 'B', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1714, 1795, 115, 'Chu', 'C', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1715, 1796, 115, 'Jalal-Abad', 'J', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1716, 1797, 115, 'Naryn', 'N', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1717, 1798, 115, 'Osh', 'O', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1718, 1799, 115, 'Talas', 'T', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1719, 1800, 115, 'Ysyk-Kol', 'Y', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1720, 1801, 116, 'Vientiane', 'VT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1721, 1802, 116, 'Attapu', 'AT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1722, 1803, 116, 'Bokeo', 'BK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1723, 1804, 116, 'Bolikhamxai', 'BL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1724, 1805, 116, 'Champasak', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1725, 1806, 116, 'Houaphan', 'HO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1726, 1807, 116, 'Khammouan', 'KH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1727, 1808, 116, 'Louang Namtha', 'LM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1728, 1809, 116, 'Louangphabang', 'LP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1729, 1810, 116, 'Oudomxai', 'OU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1730, 1811, 116, 'Phongsali', 'PH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1731, 1812, 116, 'Salavan', 'SL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1732, 1813, 116, 'Savannakhet', 'SV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1733, 1814, 116, 'Vientiane', 'VI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1734, 1815, 116, 'Xaignabouli', 'XA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1735, 1816, 116, 'Xekong', 'XE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1736, 1817, 116, 'Xiangkhoang', 'XI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1737, 1818, 116, 'Xaisomboun', 'XN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1738, 1852, 119, 'Berea', 'BE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1739, 1853, 119, 'Butha-Buthe', 'BB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1740, 1854, 119, 'Leribe', 'LE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1741, 1855, 119, 'Mafeteng', 'MF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1742, 1856, 119, 'Maseru', 'MS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1743, 1857, 119, 'Mohale\'s Hoek', 'MH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1744, 1858, 119, 'Mokhotlong', 'MK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1745, 1859, 119, 'Qacha\'s Nek', 'QN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1746, 1860, 119, 'Quthing', 'QT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1747, 1861, 119, 'Thaba-Tseka', 'TT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1748, 1862, 120, 'Bomi', 'BI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1749, 1863, 120, 'Bong', 'BG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1750, 1864, 120, 'Grand Bassa', 'GB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1751, 1865, 120, 'Grand Cape Mount', 'CM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1752, 1866, 120, 'Grand Gedeh', 'GG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1753, 1867, 120, 'Grand Kru', 'GK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1754, 1868, 120, 'Lofa', 'LO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1755, 1869, 120, 'Margibi', 'MG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1756, 1870, 120, 'Maryland', 'ML', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1757, 1871, 120, 'Montserrado', 'MS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1758, 1872, 120, 'Nimba', 'NB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1759, 1873, 120, 'River Cess', 'RC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1760, 1874, 120, 'Sinoe', 'SN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1761, 1875, 121, 'Ajdabiya', 'AJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1762, 1876, 121, 'Al\'Aziziyah', 'AZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1763, 1877, 121, 'Al Fatih', 'FA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1764, 1878, 121, 'Al Jabal al Akhdar', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1765, 1879, 121, 'Al Jufrah', 'JU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1766, 1880, 121, 'Al Khums', 'KH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1767, 1881, 121, 'Al Kufrah', 'KU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1768, 1882, 121, 'An Nuqat al Khams', 'NK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1769, 1883, 121, 'Ash Shati', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1770, 1884, 121, 'Awbari', 'AW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1771, 1885, 121, 'Az Zawiyah', 'ZA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1772, 1886, 121, 'Banghazi', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1773, 1887, 121, 'Darnah', 'DA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1774, 1888, 121, 'Ghadamis', 'GD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1775, 1889, 121, 'Gharyan', 'GY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1776, 1890, 121, 'Misratah', 'MI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1777, 1891, 121, 'Murzuq', 'MZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1778, 1892, 121, 'Sabha', 'SB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1779, 1893, 121, 'Sawfajjin', 'SW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1780, 1894, 121, 'Surt', 'SU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1781, 1895, 121, 'Tarabulus (Tripoli)', 'TL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1782, 1896, 121, 'Tarhunah', 'TH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1783, 1897, 121, 'Tubruq', 'TU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1784, 1898, 121, 'Yafran', 'YA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1785, 1899, 121, 'Zlitan', 'ZL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1786, 1900, 122, 'Vaduz', 'V', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1787, 1901, 122, 'Schaan', 'A', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1788, 1902, 122, 'Balzers', 'B', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1789, 1903, 122, 'Triesen', 'N', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1790, 1904, 122, 'Eschen', 'E', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1791, 1905, 122, 'Mauren', 'M', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1792, 1906, 122, 'Triesenberg', 'T', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1793, 1907, 122, 'Ruggell', 'R', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1794, 1908, 122, 'Gamprin', 'G', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1795, 1909, 122, 'Schellenberg', 'L', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1796, 1910, 122, 'Planken', 'P', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1797, 1911, 123, 'Alytus', 'AL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1798, 1912, 123, 'Kaunas', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1799, 1913, 123, 'Klaipeda', 'KL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1800, 1914, 123, 'Marijampole', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1801, 1915, 123, 'Panevezys', 'PA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1802, 1916, 123, 'Siauliai', 'SI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1803, 1917, 123, 'Taurage', 'TA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1804, 1918, 123, 'Telsiai', 'TE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1805, 1919, 123, 'Utena', 'UT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1806, 1920, 123, 'Vilnius', 'VI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1807, 1921, 124, 'Diekirch', 'DD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1808, 1922, 124, 'Clervaux', 'DC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1809, 1923, 124, 'Redange', 'DR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1810, 1924, 124, 'Vianden', 'DV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1811, 1925, 124, 'Wiltz', 'DW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1812, 1926, 124, 'Grevenmacher', 'GG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1813, 1927, 124, 'Echternach', 'GE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1814, 1928, 124, 'Remich', 'GR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1815, 1929, 124, 'Luxembourg', 'LL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1816, 1930, 124, 'Capellen', 'LC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1817, 1931, 124, 'Esch-sur-Alzette', 'LE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1818, 1932, 124, 'Mersch', 'LM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1819, 1933, 125, 'Our Lady Fatima Parish', 'OLF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1820, 1934, 125, 'St. Anthony Parish', 'ANT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1821, 1935, 125, 'St. Lazarus Parish', 'LAZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1822, 1936, 125, 'Cathedral Parish', 'CAT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1823, 1937, 125, 'St. Lawrence Parish', 'LAW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1824, 1938, 127, 'Antananarivo', 'AN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1825, 1939, 127, 'Antsiranana', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1826, 1940, 127, 'Fianarantsoa', 'FN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1827, 1941, 127, 'Mahajanga', 'MJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1828, 1942, 127, 'Toamasina', 'TM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1829, 1943, 127, 'Toliara', 'TL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1830, 1944, 128, 'Balaka', 'BLK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1831, 1945, 128, 'Blantyre', 'BLT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1832, 1946, 128, 'Chikwawa', 'CKW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1833, 1947, 128, 'Chiradzulu', 'CRD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1834, 1948, 128, 'Chitipa', 'CTP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1835, 1949, 128, 'Dedza', 'DDZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1836, 1950, 128, 'Dowa', 'DWA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1837, 1951, 128, 'Karonga', 'KRG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1838, 1952, 128, 'Kasungu', 'KSG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1839, 1953, 128, 'Likoma', 'LKM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1840, 1954, 128, 'Lilongwe', 'LLG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1841, 1955, 128, 'Machinga', 'MCG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1842, 1956, 128, 'Mangochi', 'MGC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1843, 1957, 128, 'Mchinji', 'MCH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1844, 1958, 128, 'Mulanje', 'MLJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1845, 1959, 128, 'Mwanza', 'MWZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1846, 1960, 128, 'Mzimba', 'MZM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1847, 1961, 128, 'Ntcheu', 'NTU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1848, 1962, 128, 'Nkhata Bay', 'NKB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1849, 1963, 128, 'Nkhotakota', 'NKH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1850, 1964, 128, 'Nsanje', 'NSJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1851, 1965, 128, 'Ntchisi', 'NTI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1852, 1966, 128, 'Phalombe', 'PHL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1853, 1967, 128, 'Rumphi', 'RMP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1854, 1968, 128, 'Salima', 'SLM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1855, 1969, 128, 'Thyolo', 'THY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1856, 1970, 128, 'Zomba', 'ZBA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1857, 1971, 129, 'Johor', 'MY-01', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1858, 1972, 129, 'Kedah', 'MY-02', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1859, 1973, 129, 'Kelantan', 'MY-03', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1860, 1974, 129, 'Labuan', 'MY-15', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1861, 1975, 129, 'Melaka', 'MY-04', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1862, 1976, 129, 'Negeri Sembilan', 'MY-05', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1863, 1977, 129, 'Pahang', 'MY-06', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1864, 1978, 129, 'Perak', 'MY-08', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1865, 1979, 129, 'Perlis', 'MY-09', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1866, 1980, 129, 'Pulau Pinang', 'MY-07', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1867, 1981, 129, 'Sabah', 'MY-12', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1868, 1982, 129, 'Sarawak', 'MY-13', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1869, 1983, 129, 'Selangor', 'MY-10', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1870, 1984, 129, 'Terengganu', 'MY-11', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1871, 1985, 129, 'Kuala Lumpur', 'MY-14', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1872, 1986, 130, 'Thiladhunmathi Uthuru', 'THU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1873, 1987, 130, 'Thiladhunmathi Dhekunu', 'THD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1874, 1988, 130, 'Miladhunmadulu Uthuru', 'MLU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1875, 1989, 130, 'Miladhunmadulu Dhekunu', 'MLD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1876, 1990, 130, 'Maalhosmadulu Uthuru', 'MAU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1877, 1991, 130, 'Maalhosmadulu Dhekunu', 'MAD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1878, 1992, 130, 'Faadhippolhu', 'FAA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1879, 1993, 130, 'Male Atoll', 'MAA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1880, 1994, 130, 'Ari Atoll Uthuru', 'AAU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1881, 1995, 130, 'Ari Atoll Dheknu', 'AAD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1882, 1996, 130, 'Felidhe Atoll', 'FEA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1883, 1997, 130, 'Mulaku Atoll', 'MUA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1884, 1998, 130, 'Nilandhe Atoll Uthuru', 'NAU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1885, 1999, 130, 'Nilandhe Atoll Dhekunu', 'NAD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1886, 2000, 130, 'Kolhumadulu', 'KLH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1887, 2001, 130, 'Hadhdhunmathi', 'HDH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1888, 2002, 130, 'Huvadhu Atoll Uthuru', 'HAU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1889, 2003, 130, 'Huvadhu Atoll Dhekunu', 'HAD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1890, 2004, 130, 'Fua Mulaku', 'FMU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1891, 2005, 130, 'Addu', 'ADD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1892, 2006, 131, 'Gao', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1893, 2007, 131, 'Kayes', 'KY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1894, 2008, 131, 'Kidal', 'KD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1895, 2009, 131, 'Koulikoro', 'KL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1896, 2010, 131, 'Mopti', 'MP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1897, 2011, 131, 'Segou', 'SG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1898, 2012, 131, 'Sikasso', 'SK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1899, 2013, 131, 'Tombouctou', 'TB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1900, 2014, 131, 'Bamako Capital District', 'CD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1901, 2015, 132, 'Attard', 'ATT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1902, 2016, 132, 'Balzan', 'BAL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1903, 2017, 132, 'Birgu', 'BGU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1904, 2018, 132, 'Birkirkara', 'BKK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1905, 2019, 132, 'Birzebbuga', 'BRZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1906, 2020, 132, 'Bormla', 'BOR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1907, 2021, 132, 'Dingli', 'DIN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1908, 2022, 132, 'Fgura', 'FGU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1909, 2023, 132, 'Floriana', 'FLO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1910, 2024, 132, 'Gudja', 'GDJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1911, 2025, 132, 'Gzira', 'GZR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1912, 2026, 132, 'Gargur', 'GRG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1913, 2027, 132, 'Gaxaq', 'GXQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1914, 2028, 132, 'Hamrun', 'HMR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1915, 2029, 132, 'Iklin', 'IKL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1916, 2030, 132, 'Isla', 'ISL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1917, 2031, 132, 'Kalkara', 'KLK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1918, 2032, 132, 'Kirkop', 'KRK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1919, 2033, 132, 'Lija', 'LIJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1920, 2034, 132, 'Luqa', 'LUQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1921, 2035, 132, 'Marsa', 'MRS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1922, 2036, 132, 'Marsaskala', 'MKL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1923, 2037, 132, 'Marsaxlokk', 'MXL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1924, 2038, 132, 'Mdina', 'MDN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1925, 2039, 132, 'Melliea', 'MEL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1926, 2040, 132, 'Mgarr', 'MGR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1927, 2041, 132, 'Mosta', 'MST', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1928, 2042, 132, 'Mqabba', 'MQA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1929, 2043, 132, 'Msida', 'MSI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1930, 2044, 132, 'Mtarfa', 'MTF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1931, 2045, 132, 'Naxxar', 'NAX', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1932, 2046, 132, 'Paola', 'PAO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1933, 2047, 132, 'Pembroke', 'PEM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1934, 2048, 132, 'Pieta', 'PIE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1935, 2049, 132, 'Qormi', 'QOR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1936, 2050, 132, 'Qrendi', 'QRE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1937, 2051, 132, 'Rabat', 'RAB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1938, 2052, 132, 'Safi', 'SAF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1939, 2053, 132, 'San Giljan', 'SGI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1940, 2054, 132, 'Santa Lucija', 'SLU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1941, 2055, 132, 'San Pawl il-Bahar', 'SPB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1942, 2056, 132, 'San Gwann', 'SGW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1943, 2057, 132, 'Santa Venera', 'SVE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1944, 2058, 132, 'Siggiewi', 'SIG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1945, 2059, 132, 'Sliema', 'SLM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1946, 2060, 132, 'Swieqi', 'SWQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1947, 2061, 132, 'Ta Xbiex', 'TXB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1948, 2062, 132, 'Tarxien', 'TRX', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1949, 2063, 132, 'Valletta', 'VLT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1950, 2064, 132, 'Xgajra', 'XGJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1951, 2065, 132, 'Zabbar', 'ZBR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1952, 2066, 132, 'Zebbug', 'ZBG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1953, 2067, 132, 'Zejtun', 'ZJT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1954, 2068, 132, 'Zurrieq', 'ZRQ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1955, 2069, 132, 'Fontana', 'FNT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1956, 2070, 132, 'Ghajnsielem', 'GHJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1957, 2071, 132, 'Gharb', 'GHR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1958, 2072, 132, 'Ghasri', 'GHS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1959, 2073, 132, 'Kercem', 'KRC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1960, 2074, 132, 'Munxar', 'MUN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1961, 2075, 132, 'Nadur', 'NAD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1962, 2076, 132, 'Qala', 'QAL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1963, 2077, 132, 'Victoria', 'VIC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1964, 2078, 132, 'San Lawrenz', 'SLA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1965, 2079, 132, 'Sannat', 'SNT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1966, 2080, 132, 'Xagra', 'ZAG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1967, 2081, 132, 'Xewkija', 'XEW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1968, 2082, 132, 'Zebbug', 'ZEB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1969, 2083, 133, 'Ailinginae', 'ALG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1970, 2084, 133, 'Ailinglaplap', 'ALL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1971, 2085, 133, 'Ailuk', 'ALK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1972, 2086, 133, 'Arno', 'ARN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1973, 2087, 133, 'Aur', 'AUR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1974, 2088, 133, 'Bikar', 'BKR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1975, 2089, 133, 'Bikini', 'BKN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1976, 2090, 133, 'Bokak', 'BKK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1977, 2091, 133, 'Ebon', 'EBN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1978, 2092, 133, 'Enewetak', 'ENT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1979, 2093, 133, 'Erikub', 'EKB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1980, 2094, 133, 'Jabat', 'JBT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1981, 2095, 133, 'Jaluit', 'JLT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1982, 2096, 133, 'Jemo', 'JEM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1983, 2097, 133, 'Kili', 'KIL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1984, 2098, 133, 'Kwajalein', 'KWJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1985, 2099, 133, 'Lae', 'LAE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1986, 2100, 133, 'Lib', 'LIB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1987, 2101, 133, 'Likiep', 'LKP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1988, 2102, 133, 'Majuro', 'MJR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1989, 2103, 133, 'Maloelap', 'MLP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1990, 2104, 133, 'Mejit', 'MJT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1991, 2105, 133, 'Mili', 'MIL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1992, 2106, 133, 'Namorik', 'NMK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1993, 2107, 133, 'Namu', 'NAM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1994, 2108, 133, 'Rongelap', 'RGL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1995, 2109, 133, 'Rongrik', 'RGK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1996, 2110, 133, 'Toke', 'TOK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1997, 2111, 133, 'Ujae', 'UJA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1998, 2112, 133, 'Ujelang', 'UJL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(1999, 2113, 133, 'Utirik', 'UTK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2000, 2114, 133, 'Wotho', 'WTH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2001, 2115, 133, 'Wotje', 'WTJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2002, 2116, 135, 'Adrar', 'AD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2003, 2117, 135, 'Assaba', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2004, 2118, 135, 'Brakna', 'BR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2005, 2119, 135, 'Dakhlet Nouadhibou', 'DN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2006, 2120, 135, 'Gorgol', 'GO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2007, 2121, 135, 'Guidimaka', 'GM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2008, 2122, 135, 'Hodh Ech Chargui', 'HC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2009, 2123, 135, 'Hodh El Gharbi', 'HG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2010, 2124, 135, 'Inchiri', 'IN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2011, 2125, 135, 'Tagant', 'TA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2012, 2126, 135, 'Tiris Zemmour', 'TZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2013, 2127, 135, 'Trarza', 'TR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2014, 2128, 135, 'Nouakchott', 'NO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2015, 2129, 136, 'Beau Bassin-Rose Hill', 'BR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2016, 2130, 136, 'Curepipe', 'CU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2017, 2131, 136, 'Port Louis', 'PU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2018, 2132, 136, 'Quatre Bornes', 'QB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2019, 2133, 136, 'Vacoas-Phoenix', 'VP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2020, 2134, 136, 'Agalega Islands', 'AG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2021, 2135, 136, 'Cargados Carajos Shoals (Saint Brandon Islands)', 'CC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2022, 2136, 136, 'Rodrigues', 'RO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2023, 2137, 136, 'Black River', 'BL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2024, 2138, 136, 'Flacq', 'FL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2025, 2139, 136, 'Grand Port', 'GP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2026, 2140, 136, 'Moka', 'MO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2027, 2141, 136, 'Pamplemousses', 'PA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2028, 2142, 136, 'Plaines Wilhems', 'PW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2029, 2143, 136, 'Port Louis', 'PL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2030, 2144, 136, 'Riviere du Rempart', 'RR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2031, 2145, 136, 'Savanne', 'SA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2032, 2146, 138, 'Baja California Norte', 'BN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2033, 2147, 138, 'Baja California Sur', 'BS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2034, 2148, 138, 'Campeche', 'CA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2035, 2149, 138, 'Chiapas', 'CI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2036, 2150, 138, 'Chihuahua', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2037, 2151, 138, 'Coahuila de Zaragoza', 'CZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2038, 2152, 138, 'Colima', 'CL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2039, 2153, 138, 'Distrito Federal', 'DF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2040, 2154, 138, 'Durango', 'DU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2041, 2155, 138, 'Guanajuato', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2042, 2156, 138, 'Guerrero', 'GE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2043, 2157, 138, 'Hidalgo', 'HI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2044, 2158, 138, 'Jalisco', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2045, 2159, 138, 'Mexico', 'ME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2046, 2160, 138, 'Michoacan de Ocampo', 'MI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2047, 2161, 138, 'Morelos', 'MO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2048, 2162, 138, 'Nayarit', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2049, 2163, 138, 'Nuevo Leon', 'NL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2050, 2164, 138, 'Oaxaca', 'OA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2051, 2165, 138, 'Puebla', 'PU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2052, 2166, 138, 'Queretaro de Arteaga', 'QA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2053, 2167, 138, 'Quintana Roo', 'QR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2054, 2168, 138, 'San Luis Potosi', 'SA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2055, 2169, 138, 'Sinaloa', 'SI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2056, 2170, 138, 'Sonora', 'SO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2057, 2171, 138, 'Tabasco', 'TB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2058, 2172, 138, 'Tamaulipas', 'TM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2059, 2173, 138, 'Tlaxcala', 'TL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2060, 2174, 138, 'Veracruz-Llave', 'VE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2061, 2175, 138, 'Yucatan', 'YU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2062, 2176, 138, 'Zacatecas', 'ZA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2063, 2177, 139, 'Chuuk', 'C', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2064, 2178, 139, 'Kosrae', 'K', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2065, 2179, 139, 'Pohnpei', 'P', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2066, 2180, 139, 'Yap', 'Y', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2067, 2181, 140, 'Gagauzia', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2068, 2182, 140, 'Chisinau', 'CU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2069, 2183, 140, 'Balti', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2070, 2184, 140, 'Cahul', 'CA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2071, 2185, 140, 'Edinet', 'ED', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2072, 2186, 140, 'Lapusna', 'LA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2073, 2187, 140, 'Orhei', 'OR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2074, 2188, 140, 'Soroca', 'SO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2075, 2189, 140, 'Tighina', 'TI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2076, 2190, 140, 'Ungheni', 'UN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2077, 2191, 140, 'St‚nga Nistrului', 'SN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2078, 2192, 141, 'Fontvieille', 'FV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2079, 2193, 141, 'La Condamine', 'LC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2080, 2194, 141, 'Monaco-Ville', 'MV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2081, 2195, 141, 'Monte-Carlo', 'MC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2082, 2196, 142, 'Ulanbaatar', '1', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2083, 2197, 142, 'Orhon', '35', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2084, 2198, 142, 'Darhan uul', '37', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2085, 2199, 142, 'Hentiy', '39', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2086, 2200, 142, 'Hovsgol', '41', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2087, 2201, 142, 'Hovd', '43', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2088, 2202, 142, 'Uvs', '46', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2089, 2203, 142, 'Tov', '47', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2090, 2204, 142, 'Selenge', '49', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2091, 2205, 142, 'Suhbaatar', '51', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2092, 2206, 142, 'Omnogovi', '53', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2093, 2207, 142, 'Ovorhangay', '55', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2094, 2208, 142, 'Dzavhan', '57', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2095, 2209, 142, 'DundgovL', '59', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2096, 2210, 142, 'Dornod', '61', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2097, 2211, 142, 'Dornogov', '63', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2098, 2212, 142, 'Govi-Sumber', '64', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2099, 2213, 142, 'Govi-Altay', '65', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2100, 2214, 142, 'Bulgan', '67', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2101, 2215, 142, 'Bayanhongor', '69', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2102, 2216, 142, 'Bayan-Olgiy', '71', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2103, 2217, 142, 'Arhangay', '73', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2104, 2218, 143, 'Saint Anthony', 'A', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2105, 2219, 143, 'Saint Georges', 'G', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2106, 2220, 143, 'Saint Peter', 'P', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2107, 2221, 144, 'Agadir', 'AGD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2108, 2222, 144, 'Al Hoceima', 'HOC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2109, 2223, 144, 'Azilal', 'AZI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2110, 2224, 144, 'Beni Mellal', 'BME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2111, 2225, 144, 'Ben Slimane', 'BSL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2112, 2226, 144, 'Boulemane', 'BLM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2113, 2227, 144, 'Casablanca', 'CBL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2114, 2228, 144, 'Chaouen', 'CHA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2115, 2229, 144, 'El Jadida', 'EJA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2116, 2230, 144, 'El Kelaa des Sraghna', 'EKS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2117, 2231, 144, 'Er Rachidia', 'ERA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2118, 2232, 144, 'Essaouira', 'ESS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2119, 2233, 144, 'Fes', 'FES', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2120, 2234, 144, 'Figuig', 'FIG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2121, 2235, 144, 'Guelmim', 'GLM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2122, 2236, 144, 'Ifrane', 'IFR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2123, 2237, 144, 'Kenitra', 'KEN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2124, 2238, 144, 'Khemisset', 'KHM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2125, 2239, 144, 'Khenifra', 'KHN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2126, 2240, 144, 'Khouribga', 'KHO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2127, 2241, 144, 'Laayoune', 'LYN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2128, 2242, 144, 'Larache', 'LAR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2129, 2243, 144, 'Marrakech', 'MRK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2130, 2244, 144, 'Meknes', 'MKN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2131, 2245, 144, 'Nador', 'NAD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2132, 2246, 144, 'Ouarzazate', 'ORZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2133, 2247, 144, 'Oujda', 'OUJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2134, 2248, 144, 'Rabat-Sale', 'RSA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2135, 2249, 144, 'Safi', 'SAF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2136, 2250, 144, 'Settat', 'SET', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2137, 2251, 144, 'Sidi Kacem', 'SKA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2138, 2252, 144, 'Tangier', 'TGR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2139, 2253, 144, 'Tan-Tan', 'TAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2140, 2254, 144, 'Taounate', 'TAO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2141, 2255, 144, 'Taroudannt', 'TRD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2142, 2256, 144, 'Tata', 'TAT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2143, 2257, 144, 'Taza', 'TAZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2144, 2258, 144, 'Tetouan', 'TET', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2145, 2259, 144, 'Tiznit', 'TIZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2146, 2260, 144, 'Ad Dakhla', 'ADK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2147, 2261, 144, 'Boujdour', 'BJD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2148, 2262, 144, 'Es Smara', 'ESM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2149, 2263, 145, 'Cabo Delgado', 'CD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2150, 2264, 145, 'Gaza', 'GZ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2151, 2265, 145, 'Inhambane', 'IN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2152, 2266, 145, 'Manica', 'MN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2153, 2267, 145, 'Maputo (city)', 'MC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2154, 2268, 145, 'Maputo', 'MP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2155, 2269, 145, 'Nampula', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2156, 2270, 145, 'Niassa', 'NI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2157, 2271, 145, 'Sofala', 'SO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2158, 2272, 145, 'Tete', 'TE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2159, 2273, 145, 'Zambezia', 'ZA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2160, 2274, 146, 'Ayeyarwady', 'AY', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2161, 2275, 146, 'Bago', 'BG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2162, 2276, 146, 'Magway', 'MG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2163, 2277, 146, 'Mandalay', 'MD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2164, 2278, 146, 'Sagaing', 'SG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2165, 2279, 146, 'Tanintharyi', 'TN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2166, 2280, 146, 'Yangon', 'YG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2167, 2281, 146, 'Chin State', 'CH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2168, 2282, 146, 'Kachin State', 'KC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2169, 2283, 146, 'Kayah State', 'KH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2170, 2284, 146, 'Kayin State', 'KN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2171, 2285, 146, 'Mon State', 'MN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2172, 2286, 146, 'Rakhine State', 'RK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2173, 2287, 146, 'Shan State', 'SH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2174, 2288, 147, 'Caprivi', 'CA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2175, 2289, 147, 'Erongo', 'ER', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2176, 2290, 147, 'Hardap', 'HA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2177, 2291, 147, 'Karas', 'KR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2178, 2292, 147, 'Kavango', 'KV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2179, 2293, 147, 'Khomas', 'KH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2180, 2294, 147, 'Kunene', 'KU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2181, 2295, 147, 'Ohangwena', 'OW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2182, 2296, 147, 'Omaheke', 'OK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2183, 2297, 147, 'Omusati', 'OT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2184, 2298, 147, 'Oshana', 'ON', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2185, 2299, 147, 'Oshikoto', 'OO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2186, 2300, 147, 'Otjozondjupa', 'OJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2187, 2301, 148, 'Aiwo', 'AO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2188, 2302, 148, 'Anabar', 'AA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2189, 2303, 148, 'Anetan', 'AT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2190, 2304, 148, 'Anibare', 'AI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2191, 2305, 148, 'Baiti', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2192, 2306, 148, 'Boe', 'BO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2193, 2307, 148, 'Buada', 'BU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2194, 2308, 148, 'Denigomodu', 'DE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2195, 2309, 148, 'Ewa', 'EW', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2196, 2310, 148, 'Ijuw', 'IJ', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2197, 2311, 148, 'Meneng', 'ME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2198, 2312, 148, 'Nibok', 'NI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2199, 2313, 148, 'Uaboe', 'UA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2200, 2314, 148, 'Yaren', 'YA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2201, 2315, 149, 'Bagmati', 'BA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2202, 2316, 149, 'Bheri', 'BH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2203, 2317, 149, 'Dhawalagiri', 'DH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2204, 2318, 149, 'Gandaki', 'GA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2205, 2319, 149, 'Janakpur', 'JA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2206, 2320, 149, 'Karnali', 'KA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2207, 2321, 149, 'Kosi', 'KO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2208, 2322, 149, 'Lumbini', 'LU', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2209, 2323, 149, 'Mahakali', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2210, 2324, 149, 'Mechi', 'ME', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2211, 2325, 149, 'Narayani', 'NA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2212, 2326, 149, 'Rapti', 'RA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2213, 2327, 149, 'Sagarmatha', 'SA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2214, 2328, 149, 'Seti', 'SE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2215, 2329, 150, 'Drenthe', 'DR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2216, 2330, 150, 'Flevoland', 'FL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2217, 2331, 150, 'Friesland', 'FR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2218, 2332, 150, 'Gelderland', 'GE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2219, 2333, 150, 'Groningen', 'GR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2220, 2334, 150, 'Limburg', 'LI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2221, 2335, 150, 'Noord-Brabant', 'NB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2222, 2336, 150, 'Noord-Holland', 'NH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2223, 2337, 150, 'Overijssel', 'OV', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2224, 2338, 150, 'Utrecht', 'UT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2225, 2339, 150, 'Zeeland', 'ZE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2226, 2340, 150, 'Zuid-Holland', 'ZH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2227, 2341, 152, 'Iles Loyaute', 'L', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2228, 2342, 152, 'Nord', 'N', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2229, 2343, 152, 'Sud', 'S', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2230, 2344, 153, 'Auckland', 'AUK', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2231, 2345, 153, 'Bay of Plenty', 'BOP', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2232, 2346, 153, 'Canterbury', 'CAN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2233, 2347, 153, 'Coromandel', 'COR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2234, 2348, 153, 'Gisborne', 'GIS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2235, 2349, 153, 'Fiordland', 'FIO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2236, 2350, 153, 'Hawke\'s Bay', 'HKB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2237, 2351, 153, 'Marlborough', 'MBH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2238, 2352, 153, 'Manawatu-Wanganui', 'MWT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2239, 2353, 153, 'Mt Cook-Mackenzie', 'MCM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2240, 2354, 153, 'Nelson', 'NSN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2241, 2355, 153, 'Northland', 'NTL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2242, 2356, 153, 'Otago', 'OTA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2243, 2357, 153, 'Southland', 'STL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2244, 2358, 153, 'Taranaki', 'TKI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2245, 2359, 153, 'Wellington', 'WGN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2246, 2360, 153, 'Waikato', 'WKO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2247, 2361, 153, 'Wairarapa', 'WAI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2248, 2362, 153, 'West Coast', 'WTC', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2249, 2363, 154, 'Atlantico Norte', 'AN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2250, 2364, 154, 'Atlantico Sur', 'AS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2251, 2365, 154, 'Boaco', 'BO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2252, 2366, 154, 'Carazo', 'CA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2253, 2367, 154, 'Chinandega', 'CI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2254, 2368, 154, 'Chontales', 'CO', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2255, 2369, 154, 'Esteli', 'ES', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2256, 2370, 154, 'Granada', 'GR', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2257, 2371, 154, 'Jinotega', 'JI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2258, 2372, 154, 'Leon', 'LE', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2259, 2373, 154, 'Madriz', 'MD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2260, 2374, 154, 'Managua', 'MN', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2261, 2375, 154, 'Masaya', 'MS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2262, 2376, 154, 'Matagalpa', 'MT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2263, 2377, 154, 'Nuevo Segovia', 'NS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2264, 2378, 154, 'Rio San Juan', 'RS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2265, 2379, 154, 'Rivas', 'RI', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2266, 2380, 155, 'Agadez', 'AG', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2267, 2381, 155, 'Diffa', 'DF', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2268, 2382, 155, 'Dosso', 'DS', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2269, 2383, 155, 'Maradi', 'MA', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2270, 2384, 155, 'Niamey', 'NM', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2271, 2385, 155, 'Tahoua', 'TH', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2272, 2386, 155, 'Tillaberi', 'TL', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2273, 2387, 155, 'Zinder', 'ZD', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2274, 2388, 156, 'Abia', 'AB', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2275, 2389, 156, 'Abuja Federal Capital Territory', 'CT', 0, 1, '2020-10-29 11:35:01', '2020-10-29 11:35:01', NULL),
(2276, 2390, 156, 'Adamawa', 'AD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2277, 2391, 156, 'Akwa Ibom', 'AK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2278, 2392, 156, 'Anambra', 'AN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2279, 2393, 156, 'Bauchi', 'BC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2280, 2394, 156, 'Bayelsa', 'BY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2281, 2395, 156, 'Benue', 'BN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2282, 2396, 156, 'Borno', 'BO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2283, 2397, 156, 'Cross River', 'CR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2284, 2398, 156, 'Delta', 'DE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2285, 2399, 156, 'Ebonyi', 'EB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2286, 2400, 156, 'Edo', 'ED', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2287, 2401, 156, 'Ekiti', 'EK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2288, 2402, 156, 'Enugu', 'EN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2289, 2403, 156, 'Gombe', 'GO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2290, 2404, 156, 'Imo', 'IM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2291, 2405, 156, 'Jigawa', 'JI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2292, 2406, 156, 'Kaduna', 'KD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2293, 2407, 156, 'Kano', 'KN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2294, 2408, 156, 'Katsina', 'KT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2295, 2409, 156, 'Kebbi', 'KE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2296, 2410, 156, 'Kogi', 'KO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2297, 2411, 156, 'Kwara', 'KW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2298, 2412, 156, 'Lagos', 'LA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2299, 2413, 156, 'Nassarawa', 'NA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2300, 2414, 156, 'Niger', 'NI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2301, 2415, 156, 'Ogun', 'OG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2302, 2416, 156, 'Ondo', 'ONG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2303, 2417, 156, 'Osun', 'OS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2304, 2418, 156, 'Oyo', 'OY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2305, 2419, 156, 'Plateau', 'PL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2306, 2420, 156, 'Rivers', 'RI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2307, 2421, 156, 'Sokoto', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2308, 2422, 156, 'Taraba', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2309, 2423, 156, 'Yobe', 'YO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2310, 2424, 156, 'Zamfara', 'ZA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2311, 2425, 159, 'Northern Islands', 'N', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2312, 2426, 159, 'Rota', 'R', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2313, 2427, 159, 'Saipan', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2314, 2428, 159, 'Tinian', 'T', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2315, 2429, 160, 'Akershus', 'AK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2316, 2430, 160, 'Aust-Agder', 'AA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2317, 2431, 160, 'Buskerud', 'BU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2318, 2432, 160, 'Finnmark', 'FM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2319, 2433, 160, 'Hedmark', 'HM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2320, 2434, 160, 'Hordaland', 'HL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2321, 2435, 160, 'More og Romdal', 'MR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2322, 2436, 160, 'Nord-Trondelag', 'NT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2323, 2437, 160, 'Nordland', 'NL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2324, 2438, 160, 'Ostfold', 'OF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2325, 2439, 160, 'Oppland', 'OP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2326, 2440, 160, 'Oslo', 'OL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2327, 2441, 160, 'Rogaland', 'RL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2328, 2442, 160, 'Sor-Trondelag', 'ST', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2329, 2443, 160, 'Sogn og Fjordane', 'SJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2330, 2444, 160, 'Svalbard', 'SV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2331, 2445, 160, 'Telemark', 'TM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2332, 2446, 160, 'Troms', 'TR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2333, 2447, 160, 'Vest-Agder', 'VA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2334, 2448, 160, 'Vestfold', 'VF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2335, 2449, 161, 'Ad Dakhiliyah', 'DA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2336, 2450, 161, 'Al Batinah', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2337, 2451, 161, 'Al Wusta', 'WU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2338, 2452, 161, 'Ash Sharqiyah', 'SH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2339, 2453, 161, 'Az Zahirah', 'ZA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2340, 2454, 161, 'Masqat', 'MA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2341, 2455, 161, 'Musandam', 'MU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2342, 2456, 161, 'Zufar', 'ZU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2343, 2457, 162, 'Balochistan', 'B', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2344, 2458, 162, 'Federally Administered Tribal Areas', 'T', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2345, 2459, 162, 'Islamabad Capital Territory', 'I', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2346, 2460, 162, 'North-West Frontier', 'N', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2347, 2461, 162, 'Punjab', 'P', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2348, 2462, 162, 'Sindh', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2349, 2463, 163, 'Aimeliik', 'AM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2350, 2464, 163, 'Airai', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2351, 2465, 163, 'Angaur', 'AN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2352, 2466, 163, 'Hatohobei', 'HA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2353, 2467, 163, 'Kayangel', 'KA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2354, 2468, 163, 'Koror', 'KO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2355, 2469, 163, 'Melekeok', 'ME', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2356, 2470, 163, 'Ngaraard', 'NA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2357, 2471, 163, 'Ngarchelong', 'NG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2358, 2472, 163, 'Ngardmau', 'ND', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2359, 2473, 163, 'Ngatpang', 'NT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2360, 2474, 163, 'Ngchesar', 'NC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2361, 2475, 163, 'Ngeremlengui', 'NR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2362, 2476, 163, 'Ngiwal', 'NW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2363, 2477, 163, 'Peleliu', 'PE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2364, 2478, 163, 'Sonsorol', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2365, 2479, 164, 'Bocas del Toro', 'BT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2366, 2480, 164, 'Chiriqui', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2367, 2481, 164, 'Cocle', 'CC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2368, 2482, 164, 'Colon', 'CL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2369, 2483, 164, 'Darien', 'DA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2370, 2484, 164, 'Herrera', 'HE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2371, 2485, 164, 'Los Santos', 'LS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2372, 2486, 164, 'Panama', 'PA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2373, 2487, 164, 'San Blas', 'SB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2374, 2488, 164, 'Veraguas', 'VG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2375, 2489, 165, 'Bougainville', 'BV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2376, 2490, 165, 'Central', 'CE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2377, 2491, 165, 'Chimbu', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2378, 2492, 165, 'Eastern Highlands', 'EH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2379, 2493, 165, 'East New Britain', 'EB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2380, 2494, 165, 'East Sepik', 'ES', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2381, 2495, 165, 'Enga', 'EN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2382, 2496, 165, 'Gulf', 'GU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2383, 2497, 165, 'Madang', 'MD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2384, 2498, 165, 'Manus', 'MN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2385, 2499, 165, 'Milne Bay', 'MB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2386, 2500, 165, 'Morobe', 'MR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2387, 2501, 165, 'National Capital', 'NC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2388, 2502, 165, 'New Ireland', 'NI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2389, 2503, 165, 'Northern', 'NO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2390, 2504, 165, 'Sandaun', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2391, 2505, 165, 'Southern Highlands', 'SH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2392, 2506, 165, 'Western', 'WE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2393, 2507, 165, 'Western Highlands', 'WH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2394, 2508, 165, 'West New Britain', 'WB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2395, 2509, 166, 'Alto Paraguay', 'AG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2396, 2510, 166, 'Alto Parana', 'AN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2397, 2511, 166, 'Amambay', 'AM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2398, 2512, 166, 'Asuncion', 'AS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2399, 2513, 166, 'Boqueron', 'BO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2400, 2514, 166, 'Caaguazu', 'CG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2401, 2515, 166, 'Caazapa', 'CZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2402, 2516, 166, 'Canindeyu', 'CN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2403, 2517, 166, 'Central', 'CE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2404, 2518, 166, 'Concepcion', 'CC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2405, 2519, 166, 'Cordillera', 'CD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2406, 2520, 166, 'Guaira', 'GU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2407, 2521, 166, 'Itapua', 'IT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2408, 2522, 166, 'Misiones', 'MI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2409, 2523, 166, 'Neembucu', 'NE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2410, 2524, 166, 'Paraguari', 'PA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2411, 2525, 166, 'Presidente Hayes', 'PH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2412, 2526, 166, 'San Pedro', 'SP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2413, 2527, 167, 'Amazonas', 'AM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2414, 2528, 167, 'Ancash', 'AN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2415, 2529, 167, 'Apurimac', 'AP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2416, 2530, 167, 'Arequipa', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2417, 2531, 167, 'Ayacucho', 'AY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2418, 2532, 167, 'Cajamarca', 'CJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2419, 2533, 167, 'Callao', 'CL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2420, 2534, 167, 'Cusco', 'CU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2421, 2535, 167, 'Huancavelica', 'HV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2422, 2536, 167, 'Huanuco', 'HO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2423, 2537, 167, 'Ica', 'IC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2424, 2538, 167, 'Junin', 'JU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2425, 2539, 167, 'La Libertad', 'LD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2426, 2540, 167, 'Lambayeque', 'LY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2427, 2541, 167, 'Lima', 'LI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2428, 2542, 167, 'Loreto', 'LO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2429, 2543, 167, 'Madre de Dios', 'MD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2430, 2544, 167, 'Moquegua', 'MO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2431, 2545, 167, 'Pasco', 'PA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2432, 2546, 167, 'Piura', 'PI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2433, 2547, 167, 'Puno', 'PU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2434, 2548, 167, 'San Martin', 'SM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2435, 2549, 167, 'Tacna', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2436, 2550, 167, 'Tumbes', 'TU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2437, 2551, 167, 'Ucayali', 'UC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2438, 2552, 168, 'Abra', 'ABR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2439, 2553, 168, 'Agusan del Norte', 'ANO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2440, 2554, 168, 'Agusan del Sur', 'ASU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2441, 2555, 168, 'Aklan', 'AKL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2442, 2556, 168, 'Albay', 'ALB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2443, 2557, 168, 'Antique', 'ANT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2444, 2558, 168, 'Apayao', 'APY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2445, 2559, 168, 'Aurora', 'AUR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2446, 2560, 168, 'Basilan', 'BAS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2447, 2561, 168, 'Bataan', 'BTA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2448, 2562, 168, 'Batanes', 'BTE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2449, 2563, 168, 'Batangas', 'BTG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2450, 2564, 168, 'Biliran', 'BLR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2451, 2565, 168, 'Benguet', 'BEN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2452, 2566, 168, 'Bohol', 'BOL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2453, 2567, 168, 'Bukidnon', 'BUK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2454, 2568, 168, 'Bulacan', 'BUL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2455, 2569, 168, 'Cagayan', 'CAG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2456, 2570, 168, 'Camarines Norte', 'CNO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2457, 2571, 168, 'Camarines Sur', 'CSU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2458, 2572, 168, 'Camiguin', 'CAM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2459, 2573, 168, 'Capiz', 'CAP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2460, 2574, 168, 'Catanduanes', 'CAT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2461, 2575, 168, 'Cavite', 'CAV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2462, 2576, 168, 'Cebu', 'CEB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2463, 2577, 168, 'Compostela', 'CMP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2464, 2578, 168, 'Davao del Norte', 'DNO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2465, 2579, 168, 'Davao del Sur', 'DSU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2466, 2580, 168, 'Davao Oriental', 'DOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2467, 2581, 168, 'Eastern Samar', 'ESA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2468, 2582, 168, 'Guimaras', 'GUI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2469, 2583, 168, 'Ifugao', 'IFU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2470, 2584, 168, 'Ilocos Norte', 'INO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2471, 2585, 168, 'Ilocos Sur', 'ISU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2472, 2586, 168, 'Iloilo', 'ILO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2473, 2587, 168, 'Isabela', 'ISA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2474, 2588, 168, 'Kalinga', 'KAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2475, 2589, 168, 'Laguna', 'LAG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2476, 2590, 168, 'Lanao del Norte', 'LNO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2477, 2591, 168, 'Lanao del Sur', 'LSU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2478, 2592, 168, 'La Union', 'UNI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2479, 2593, 168, 'Leyte', 'LEY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2480, 2594, 168, 'Maguindanao', 'MAG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2481, 2595, 168, 'Marinduque', 'MRN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2482, 2596, 168, 'Masbate', 'MSB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2483, 2597, 168, 'Mindoro Occidental', 'MIC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2484, 2598, 168, 'Mindoro Oriental', 'MIR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2485, 2599, 168, 'Misamis Occidental', 'MSC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2486, 2600, 168, 'Misamis Oriental', 'MOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2487, 2601, 168, 'Mountain', 'MOP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2488, 2602, 168, 'Negros Occidental', 'NOC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2489, 2603, 168, 'Negros Oriental', 'NOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2490, 2604, 168, 'North Cotabato', 'NCT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2491, 2605, 168, 'Northern Samar', 'NSM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2492, 2606, 168, 'Nueva Ecija', 'NEC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2493, 2607, 168, 'Nueva Vizcaya', 'NVZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2494, 2608, 168, 'Palawan', 'PLW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2495, 2609, 168, 'Pampanga', 'PMP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2496, 2610, 168, 'Pangasinan', 'PNG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2497, 2611, 168, 'Quezon', 'QZN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2498, 2612, 168, 'Quirino', 'QRN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2499, 2613, 168, 'Rizal', 'RIZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2500, 2614, 168, 'Romblon', 'ROM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2501, 2615, 168, 'Samar', 'SMR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2502, 2616, 168, 'Sarangani', 'SRG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2503, 2617, 168, 'Siquijor', 'SQJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2504, 2618, 168, 'Sorsogon', 'SRS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2505, 2619, 168, 'South Cotabato', 'SCO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2506, 2620, 168, 'Southern Leyte', 'SLE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2507, 2621, 168, 'Sultan Kudarat', 'SKU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2508, 2622, 168, 'Sulu', 'SLU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2509, 2623, 168, 'Surigao del Norte', 'SNO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2510, 2624, 168, 'Surigao del Sur', 'SSU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2511, 2625, 168, 'Tarlac', 'TAR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2512, 2626, 168, 'Tawi-Tawi', 'TAW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2513, 2627, 168, 'Zambales', 'ZBL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2514, 2628, 168, 'Zamboanga del Norte', 'ZNO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2515, 2629, 168, 'Zamboanga del Sur', 'ZSU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2516, 2630, 168, 'Zamboanga Sibugay', 'ZSI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2517, 2631, 170, 'Dolnoslaskie', 'DO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2518, 2632, 170, 'Kujawsko-Pomorskie', 'KP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2519, 2633, 170, 'Lodzkie', 'LO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2520, 2634, 170, 'Lubelskie', 'LL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2521, 2635, 170, 'Lubuskie', 'LU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2522, 2636, 170, 'Malopolskie', 'ML', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2523, 2637, 170, 'Mazowieckie', 'MZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2524, 2638, 170, 'Opolskie', 'OP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2525, 2639, 170, 'Podkarpackie', 'PP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2526, 2640, 170, 'Podlaskie', 'PL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2527, 2641, 170, 'Pomorskie', 'PM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2528, 2642, 170, 'Slaskie', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2529, 2643, 170, 'Swietokrzyskie', 'SW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2530, 2644, 170, 'Warminsko-Mazurskie', 'WM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2531, 2645, 170, 'Wielkopolskie', 'WP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2532, 2646, 170, 'Zachodniopomorskie', 'ZA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2533, 2647, 198, 'Saint Pierre', 'P', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2534, 2648, 198, 'Miquelon', 'M', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2535, 2649, 171, 'A&ccedil;ores', 'AC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2536, 2650, 171, 'Aveiro', 'AV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2537, 2651, 171, 'Beja', 'BE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2538, 2652, 171, 'Braga', 'BR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2539, 2653, 171, 'Bragan&ccedil;a', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2540, 2654, 171, 'Castelo Branco', 'CB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2541, 2655, 171, 'Coimbra', 'CO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2542, 2656, 171, '&Eacute;vora', 'EV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2543, 2657, 171, 'Faro', 'FA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2544, 2658, 171, 'Guarda', 'GU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2545, 2659, 171, 'Leiria', 'LE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2546, 2660, 171, 'Lisboa', 'LI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2547, 2661, 171, 'Madeira', 'ME', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2548, 2662, 171, 'Portalegre', 'PO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2549, 2663, 171, 'Porto', 'PR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2550, 2664, 171, 'Santar&eacute;m', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2551, 2665, 171, 'Set&uacute;bal', 'SE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2552, 2666, 171, 'Viana do Castelo', 'VC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2553, 2667, 171, 'Vila Real', 'VR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2554, 2668, 171, 'Viseu', 'VI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2555, 2669, 173, 'Ad Dawhah', 'DW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2556, 2670, 173, 'Al Ghuwayriyah', 'GW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2557, 2671, 173, 'Al Jumayliyah', 'JM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2558, 2672, 173, 'Al Khawr', 'KR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2559, 2673, 173, 'Al Wakrah', 'WK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2560, 2674, 173, 'Ar Rayyan', 'RN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2561, 2675, 173, 'Jarayan al Batinah', 'JB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2562, 2676, 173, 'Madinat ash Shamal', 'MS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2563, 2677, 173, 'Umm Sa\'id', 'UD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2564, 2678, 173, 'Umm Salal', 'UL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2565, 2679, 175, 'Alba', 'AB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2566, 2680, 175, 'Arad', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2567, 2681, 175, 'Arges', 'AG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2568, 2682, 175, 'Bacau', 'BC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2569, 2683, 175, 'Bihor', 'BH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2570, 2684, 175, 'Bistrita-Nasaud', 'BN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2571, 2685, 175, 'Botosani', 'BT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2572, 2686, 175, 'Brasov', 'BV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2573, 2687, 175, 'Braila', 'BR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2574, 2688, 175, 'Bucuresti', 'B', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2575, 2689, 175, 'Buzau', 'BZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2576, 2690, 175, 'Caras-Severin', 'CS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2577, 2691, 175, 'Calarasi', 'CL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2578, 2692, 175, 'Cluj', 'CJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2579, 2693, 175, 'Constanta', 'CT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2580, 2694, 175, 'Covasna', 'CV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2581, 2695, 175, 'Dimbovita', 'DB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2582, 2696, 175, 'Dolj', 'DJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2583, 2697, 175, 'Galati', 'GL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2584, 2698, 175, 'Giurgiu', 'GR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2585, 2699, 175, 'Gorj', 'GJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2586, 2700, 175, 'Harghita', 'HR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2587, 2701, 175, 'Hunedoara', 'HD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2588, 2702, 175, 'Ialomita', 'IL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2589, 2703, 175, 'Iasi', 'IS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2590, 2704, 175, 'Ilfov', 'IF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2591, 2705, 175, 'Maramures', 'MM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2592, 2706, 175, 'Mehedinti', 'MH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2593, 2707, 175, 'Mures', 'MS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2594, 2708, 175, 'Neamt', 'NT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2595, 2709, 175, 'Olt', 'OT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2596, 2710, 175, 'Prahova', 'PH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2597, 2711, 175, 'Satu-Mare', 'SM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2598, 2712, 175, 'Salaj', 'SJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2599, 2713, 175, 'Sibiu', 'SB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2600, 2714, 175, 'Suceava', 'SV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2601, 2715, 175, 'Teleorman', 'TR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2602, 2716, 175, 'Timis', 'TM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2603, 2717, 175, 'Tulcea', 'TL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2604, 2718, 175, 'Vaslui', 'VS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2605, 2719, 175, 'Valcea', 'VL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2606, 2720, 175, 'Vrancea', 'VN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2607, 2721, 176, 'Abakan', 'AB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2608, 2722, 176, 'Aginskoye', 'AG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2609, 2723, 176, 'Anadyr', 'AN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2610, 2724, 176, 'Arkahangelsk', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2611, 2725, 176, 'Astrakhan', 'AS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2612, 2726, 176, 'Barnaul', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2613, 2727, 176, 'Belgorod', 'BE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2614, 2728, 176, 'Birobidzhan', 'BI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2615, 2729, 176, 'Blagoveshchensk', 'BL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2616, 2730, 176, 'Bryansk', 'BR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2617, 2731, 176, 'Cheboksary', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2618, 2732, 176, 'Chelyabinsk', 'CL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2619, 2733, 176, 'Cherkessk', 'CR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2620, 2734, 176, 'Chita', 'CI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2621, 2735, 176, 'Dudinka', 'DU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2622, 2736, 176, 'Elista', 'EL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2623, 2738, 176, 'Gorno-Altaysk', 'GA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2624, 2739, 176, 'Groznyy', 'GR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2625, 2740, 176, 'Irkutsk', 'IR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2626, 2741, 176, 'Ivanovo', 'IV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2627, 2742, 176, 'Izhevsk', 'IZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2628, 2743, 176, 'Kalinigrad', 'KA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2629, 2744, 176, 'Kaluga', 'KL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2630, 2745, 176, 'Kasnodar', 'KS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2631, 2746, 176, 'Kazan', 'KZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2632, 2747, 176, 'Kemerovo', 'KE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2633, 2748, 176, 'Khabarovsk', 'KH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2634, 2749, 176, 'Khanty-Mansiysk', 'KM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2635, 2750, 176, 'Kostroma', 'KO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2636, 2751, 176, 'Krasnodar', 'KR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2637, 2752, 176, 'Krasnoyarsk', 'KN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2638, 2753, 176, 'Kudymkar', 'KU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2639, 2754, 176, 'Kurgan', 'KG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2640, 2755, 176, 'Kursk', 'KK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2641, 2756, 176, 'Kyzyl', 'KY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2642, 2757, 176, 'Lipetsk', 'LI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2643, 2758, 176, 'Magadan', 'MA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2644, 2759, 176, 'Makhachkala', 'MK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2645, 2760, 176, 'Maykop', 'MY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2646, 2761, 176, 'Moscow', 'MO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2647, 2762, 176, 'Murmansk', 'MU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2648, 2763, 176, 'Nalchik', 'NA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2649, 2764, 176, 'Naryan Mar', 'NR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2650, 2765, 176, 'Nazran', 'NZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2651, 2766, 176, 'Nizhniy Novgorod', 'NI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2652, 2767, 176, 'Novgorod', 'NO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2653, 2768, 176, 'Novosibirsk', 'NV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2654, 2769, 176, 'Omsk', 'OM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2655, 2770, 176, 'Orel', 'OR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2656, 2771, 176, 'Orenburg', 'OE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2657, 2772, 176, 'Palana', 'PA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2658, 2773, 176, 'Penza', 'PE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2659, 2774, 176, 'Perm', 'PR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2660, 2775, 176, 'Petropavlovsk-Kamchatskiy', 'PK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2661, 2776, 176, 'Petrozavodsk', 'PT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2662, 2777, 176, 'Pskov', 'PS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2663, 2778, 176, 'Rostov-na-Donu', 'RO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2664, 2779, 176, 'Ryazan', 'RY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2665, 2780, 176, 'Salekhard', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2666, 2781, 176, 'Samara', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2667, 2782, 176, 'Saransk', 'SR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2668, 2783, 176, 'Saratov', 'SV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2669, 2784, 176, 'Smolensk', 'SM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2670, 2785, 176, 'St. Petersburg', 'SP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2671, 2786, 176, 'Stavropol', 'ST', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2672, 2787, 176, 'Syktyvkar', 'SY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2673, 2788, 176, 'Tambov', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2674, 2789, 176, 'Tomsk', 'TO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2675, 2790, 176, 'Tula', 'TU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2676, 2791, 176, 'Tura', 'TR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2677, 2792, 176, 'Tver', 'TV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2678, 2793, 176, 'Tyumen', 'TY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2679, 2794, 176, 'Ufa', 'UF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2680, 2795, 176, 'Ul\'yanovsk', 'UL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2681, 2796, 176, 'Ulan-Ude', 'UU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2682, 2797, 176, 'Ust\'-Ordynskiy', 'US', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2683, 2798, 176, 'Vladikavkaz', 'VL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2684, 2799, 176, 'Vladimir', 'VA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2685, 2800, 176, 'Vladivostok', 'VV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2686, 2801, 176, 'Volgograd', 'VG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2687, 2802, 176, 'Vologda', 'VD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2688, 2803, 176, 'Voronezh', 'VO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2689, 2804, 176, 'Vyatka', 'VY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2690, 2805, 176, 'Yakutsk', 'YA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2691, 2806, 176, 'Yaroslavl', 'YR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2692, 2807, 176, 'Yekaterinburg', 'YE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2693, 2808, 176, 'Yoshkar-Ola', 'YO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2694, 2809, 177, 'Butare', 'BU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2695, 2810, 177, 'Byumba', 'BY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2696, 2811, 177, 'Cyangugu', 'CY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2697, 2812, 177, 'Gikongoro', 'GK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2698, 2813, 177, 'Gisenyi', 'GS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2699, 2814, 177, 'Gitarama', 'GT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2700, 2815, 177, 'Kibungo', 'KG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2701, 2816, 177, 'Kibuye', 'KY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2702, 2817, 177, 'Kigali Rurale', 'KR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2703, 2818, 177, 'Kigali-ville', 'KV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2704, 2819, 177, 'Ruhengeri', 'RU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2705, 2820, 177, 'Umutara', 'UM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2706, 2821, 178, 'Christ Church Nichola Town', 'CCN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2707, 2822, 178, 'Saint Anne Sandy Point', 'SAS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2708, 2823, 178, 'Saint George Basseterre', 'SGB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2709, 2824, 178, 'Saint George Gingerland    ', 'SGG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2710, 2825, 178, 'Saint James Windward', 'SJW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2711, 2826, 178, 'Saint John Capesterre', 'SJC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2712, 2827, 178, 'Saint John Figtree', 'SJF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2713, 2828, 178, 'Saint Mary Cayon', 'SMC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2714, 2829, 178, 'Saint Paul Capesterre', 'CAP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2715, 2830, 178, 'Saint Paul Charlestown', 'CHA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2716, 2831, 178, 'Saint Peter Basseterre', 'SPB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2717, 2832, 178, 'Saint Thomas Lowland', 'STL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2718, 2833, 178, 'Saint Thomas Middle Island', 'STM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2719, 2834, 178, 'Trinity Palmetto Point', 'TPP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2720, 2835, 179, 'Anse-la-Raye', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2721, 2836, 179, 'Castries', 'CA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2722, 2837, 179, 'Choiseul', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2723, 2838, 179, 'Dauphin', 'DA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2724, 2839, 179, 'Dennery', 'DE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2725, 2840, 179, 'Gros-Islet', 'GI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2726, 2841, 179, 'Laborie', 'LA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2727, 2842, 179, 'Micoud', 'MI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2728, 2843, 179, 'Praslin', 'PR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2729, 2844, 179, 'Soufriere', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2730, 2845, 179, 'Vieux-Fort', 'VF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2731, 2846, 180, 'Charlotte', 'C', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2732, 2847, 180, 'Grenadines', 'R', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2733, 2848, 180, 'Saint Andrew', 'A', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2734, 2849, 180, 'Saint David', 'D', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2735, 2850, 180, 'Saint George', 'G', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2736, 2851, 180, 'Saint Patrick', 'P', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2737, 2852, 181, 'A\'ana', 'AN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2738, 2853, 181, 'Aiga-i-le-Tai', 'AI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2739, 2854, 181, 'Atua', 'AT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2740, 2855, 181, 'Fa\'asaleleaga', 'FA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2741, 2856, 181, 'Gaga\'emauga', 'GE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2742, 2857, 181, 'Gagaifomauga', 'GF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2743, 2858, 181, 'Palauli', 'PA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2744, 2859, 181, 'Satupa\'itea', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2745, 2860, 181, 'Tuamasaga', 'TU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2746, 2861, 181, 'Va\'a-o-Fonoti', 'VF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2747, 2862, 181, 'Vaisigano', 'VS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2748, 2863, 182, 'Acquaviva', 'AC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2749, 2864, 182, 'Borgo Maggiore', 'BM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2750, 2865, 182, 'Chiesanuova', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2751, 2866, 182, 'Domagnano', 'DO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2752, 2867, 182, 'Faetano', 'FA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2753, 2868, 182, 'Fiorentino', 'FI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2754, 2869, 182, 'Montegiardino', 'MO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2755, 2870, 182, 'Citta di San Marino', 'SM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2756, 2871, 182, 'Serravalle', 'SE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2757, 2872, 183, 'Sao Tome', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2758, 2873, 183, 'Principe', 'P', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2759, 2874, 184, 'Al Bahah', 'BH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2760, 2875, 184, 'Al Hudud ash Shamaliyah', 'HS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2761, 2876, 184, 'Al Jawf', 'JF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2762, 2877, 184, 'Al Madinah', 'MD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2763, 2878, 184, 'Al Qasim', 'QS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2764, 2879, 184, 'Ar Riyad', 'RD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2765, 2880, 184, 'Ash Sharqiyah (Eastern)', 'AQ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2766, 2881, 184, 'Asir', 'AS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2767, 2882, 184, 'Ha\'il', 'HL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2768, 2883, 184, 'Jizan', 'JZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2769, 2884, 184, 'Makkah', 'ML', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2770, 2885, 184, 'Najran', 'NR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2771, 2886, 184, 'Tabuk', 'TB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2772, 2887, 185, 'Dakar', 'DA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2773, 2888, 185, 'Diourbel', 'DI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2774, 2889, 185, 'Fatick', 'FA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2775, 2890, 185, 'Kaolack', 'KA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2776, 2891, 185, 'Kolda', 'KO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2777, 2892, 185, 'Louga', 'LO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2778, 2893, 185, 'Matam', 'MA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2779, 2894, 185, 'Saint-Louis', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2780, 2895, 185, 'Tambacounda', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2781, 2896, 185, 'Thies', 'TH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2782, 2897, 185, 'Ziguinchor', 'ZI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2783, 2898, 186, 'Anse aux Pins', 'AP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2784, 2899, 186, 'Anse Boileau', 'AB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2785, 2900, 186, 'Anse Etoile', 'AE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2786, 2901, 186, 'Anse Louis', 'AL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2787, 2902, 186, 'Anse Royale', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2788, 2903, 186, 'Baie Lazare', 'BL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2789, 2904, 186, 'Baie Sainte Anne', 'BS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2790, 2905, 186, 'Beau Vallon', 'BV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2791, 2906, 186, 'Bel Air', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2792, 2907, 186, 'Bel Ombre', 'BO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2793, 2908, 186, 'Cascade', 'CA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2794, 2909, 186, 'Glacis', 'GL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2795, 2910, 186, 'Grand\' Anse (on Mahe)', 'GM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2796, 2911, 186, 'Grand\' Anse (on Praslin)', 'GP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2797, 2912, 186, 'La Digue', 'DG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2798, 2913, 186, 'La Riviere Anglaise', 'RA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2799, 2914, 186, 'Mont Buxton', 'MB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2800, 2915, 186, 'Mont Fleuri', 'MF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2801, 2916, 186, 'Plaisance', 'PL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2802, 2917, 186, 'Pointe La Rue', 'PR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2803, 2918, 186, 'Port Glaud', 'PG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2804, 2919, 186, 'Saint Louis', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2805, 2920, 186, 'Takamaka', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2806, 2921, 187, 'Eastern', 'E', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2807, 2922, 187, 'Northern', 'N', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2808, 2923, 187, 'Southern', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2809, 2924, 187, 'Western', 'W', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2810, 2925, 189, 'Banskobystrický', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2811, 2926, 189, 'Bratislavský', 'BR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2812, 2927, 189, 'Košický', 'KO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2813, 2928, 189, 'Nitriansky', 'NI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2814, 2929, 189, 'Prešovský', 'PR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2815, 2930, 189, 'Trenčiansky', 'TC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2816, 2931, 189, 'Trnavský', 'TV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2817, 2932, 189, 'Žilinský', 'ZI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2818, 2933, 191, 'Central', 'CE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2819, 2934, 191, 'Choiseul', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2820, 2935, 191, 'Guadalcanal', 'GC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2821, 2936, 191, 'Honiara', 'HO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2822, 2937, 191, 'Isabel', 'IS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2823, 2938, 191, 'Makira', 'MK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2824, 2939, 191, 'Malaita', 'ML', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2825, 2940, 191, 'Rennell and Bellona', 'RB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2826, 2941, 191, 'Temotu', 'TM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2827, 2942, 191, 'Western', 'WE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2828, 2943, 192, 'Awdal', 'AW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2829, 2944, 192, 'Bakool', 'BK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2830, 2945, 192, 'Banaadir', 'BN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2831, 2946, 192, 'Bari', 'BR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2832, 2947, 192, 'Bay', 'BY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2833, 2948, 192, 'Galguduud', 'GA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2834, 2949, 192, 'Gedo', 'GE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2835, 2950, 192, 'Hiiraan', 'HI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2836, 2951, 192, 'Jubbada Dhexe', 'JD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2837, 2952, 192, 'Jubbada Hoose', 'JH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2838, 2953, 192, 'Mudug', 'MU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2839, 2954, 192, 'Nugaal', 'NU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2840, 2955, 192, 'Sanaag', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2841, 2956, 192, 'Shabeellaha Dhexe', 'SD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2842, 2957, 192, 'Shabeellaha Hoose', 'SH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2843, 2958, 192, 'Sool', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2844, 2959, 192, 'Togdheer', 'TO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2845, 2960, 192, 'Woqooyi Galbeed', 'WG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2846, 2961, 193, 'Eastern Cape', 'EC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2847, 2962, 193, 'Free State', 'FS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2848, 2963, 193, 'Gauteng', 'GT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2849, 2964, 193, 'KwaZulu-Natal', 'KN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2850, 2965, 193, 'Limpopo', 'LP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2851, 2966, 193, 'Mpumalanga', 'MP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2852, 2967, 193, 'North West', 'NW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2853, 2968, 193, 'Northern Cape', 'NC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2854, 2969, 193, 'Western Cape', 'WC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2855, 2970, 195, 'La Coru&ntilde;a', 'CA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2856, 2971, 195, '&Aacute;lava', 'AL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2857, 2972, 195, 'Albacete', 'AB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2858, 2973, 195, 'Alicante', 'AC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2859, 2974, 195, 'Almeria', 'AM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2860, 2975, 195, 'Asturias', 'AS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2861, 2976, 195, '&Aacute;vila', 'AV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2862, 2977, 195, 'Badajoz', 'BJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2863, 2978, 195, 'Baleares', 'IB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2864, 2979, 195, 'Barcelona', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2865, 2980, 195, 'Burgos', 'BU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2866, 2981, 195, 'C&aacute;ceres', 'CC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2867, 2982, 195, 'C&aacute;diz', 'CZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2868, 2983, 195, 'Cantabria', 'CT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2869, 2984, 195, 'Castell&oacute;n', 'CL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2870, 2985, 195, 'Ceuta', 'CE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2871, 2986, 195, 'Ciudad Real', 'CR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2872, 2987, 195, 'C&oacute;rdoba ', 'CD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2873, 2988, 195, 'Cuenca', 'CU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2874, 2989, 195, 'Girona', 'GI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2875, 2990, 195, 'Granada', 'GD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2876, 2991, 195, 'Guadalajara', 'GJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2877, 2992, 195, 'Guip&uacute;zcoa', 'GP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2878, 2993, 195, 'Huelva', 'HL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2879, 2994, 195, 'Huesca', 'HS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2880, 2995, 195, 'Ja&eacute;n', 'JN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2881, 2996, 195, 'La Rioja', 'RJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2882, 2997, 195, 'Las Palmas', 'PM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2883, 2998, 195, 'Leon', 'LE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2884, 2999, 195, 'Lleida', 'LL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2885, 3000, 195, 'Lugo', 'LG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2886, 3001, 195, 'Madrid', 'MD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2887, 3002, 195, 'Malaga', 'MA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2888, 3003, 195, 'Melilla', 'ML', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2889, 3004, 195, 'Murcia', 'MU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2890, 3005, 195, 'Navarra', 'NV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2891, 3006, 195, 'Ourense', 'OU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2892, 3007, 195, 'Palencia', 'PL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2893, 3008, 195, 'Pontevedra', 'PO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2894, 3009, 195, 'Salamanca', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2895, 3010, 195, 'Santa Cruz de Tenerife', 'SC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2896, 3011, 195, 'Segovia', 'SG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2897, 3012, 195, 'Sevilla', 'SV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2898, 3013, 195, 'Soria', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2899, 3014, 195, 'Tarragona', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2900, 3015, 195, 'Teruel', 'TE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2901, 3016, 195, 'Toledo', 'TO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2902, 3017, 195, 'Valencia', 'VC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2903, 3018, 195, 'Valladolid', 'VD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2904, 3019, 195, 'Vizcaya', 'VZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2905, 3020, 195, 'Zamora', 'ZM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2906, 3021, 195, 'Zaragoza', 'ZR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2907, 3022, 196, 'Central', 'CE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2908, 3023, 196, 'Eastern', 'EA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2909, 3024, 196, 'North Central', 'NC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2910, 3025, 196, 'Northern', 'NO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2911, 3026, 196, 'North Western', 'NW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2912, 3027, 196, 'Sabaragamuwa', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2913, 3028, 196, 'Southern', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2914, 3029, 196, 'Uva', 'UV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2915, 3030, 196, 'Western', 'WE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2916, 3032, 197, 'Saint Helena', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2917, 3034, 199, 'A\'ali an Nil', 'ANL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2918, 3035, 199, 'Al Bahr al Ahmar', 'BAM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2919, 3036, 199, 'Al Buhayrat', 'BRT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2920, 3037, 199, 'Al Jazirah', 'JZR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2921, 3038, 199, 'Al Khartum', 'KRT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2922, 3039, 199, 'Al Qadarif', 'QDR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2923, 3040, 199, 'Al Wahdah', 'WDH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2924, 3041, 199, 'An Nil al Abyad', 'ANB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2925, 3042, 199, 'An Nil al Azraq', 'ANZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2926, 3043, 199, 'Ash Shamaliyah', 'ASH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2927, 3044, 199, 'Bahr al Jabal', 'BJA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2928, 3045, 199, 'Gharb al Istiwa\'iyah', 'GIS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2929, 3046, 199, 'Gharb Bahr al Ghazal', 'GBG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2930, 3047, 199, 'Gharb Darfur', 'GDA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2931, 3048, 199, 'Gharb Kurdufan', 'GKU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2932, 3049, 199, 'Janub Darfur', 'JDA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2933, 3050, 199, 'Janub Kurdufan', 'JKU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2934, 3051, 199, 'Junqali', 'JQL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2935, 3052, 199, 'Kassala', 'KSL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2936, 3053, 199, 'Nahr an Nil', 'NNL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2937, 3054, 199, 'Shamal Bahr al Ghazal', 'SBG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2938, 3055, 199, 'Shamal Darfur', 'SDA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2939, 3056, 199, 'Shamal Kurdufan', 'SKU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2940, 3057, 199, 'Sharq al Istiwa\'iyah', 'SIS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2941, 3058, 199, 'Sinnar', 'SNR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2942, 3059, 199, 'Warab', 'WRB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2943, 3060, 200, 'Brokopondo', 'BR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2944, 3061, 200, 'Commewijne', 'CM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2945, 3062, 200, 'Coronie', 'CR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2946, 3063, 200, 'Marowijne', 'MA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2947, 3064, 200, 'Nickerie', 'NI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2948, 3065, 200, 'Para', 'PA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2949, 3066, 200, 'Paramaribo', 'PM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2950, 3067, 200, 'Saramacca', 'SA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2951, 3068, 200, 'Sipaliwini', 'SI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2952, 3069, 200, 'Wanica', 'WA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2953, 3070, 202, 'Hhohho', 'H', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2954, 3071, 202, 'Lubombo', 'L', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2955, 3072, 202, 'Manzini', 'M', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2956, 3073, 202, 'Shishelweni', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2957, 3074, 203, 'Blekinge', 'K', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2958, 3075, 203, 'Dalarna', 'W', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2959, 3076, 203, 'Gävleborg', 'X', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2960, 3077, 203, 'Gotland', 'I', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2961, 3078, 203, 'Halland', 'N', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2962, 3079, 203, 'Jämtland', 'Z', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2963, 3080, 203, 'Jönköping', 'F', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2964, 3081, 203, 'Kalmar', 'H', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2965, 3082, 203, 'Kronoberg', 'G', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2966, 3083, 203, 'Norrbotten', 'BD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2967, 3084, 203, 'Örebro', 'T', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2968, 3085, 203, 'Östergötland', 'E', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2969, 3086, 203, 'Sk&aring;ne', 'M', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2970, 3087, 203, 'Södermanland', 'D', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2971, 3088, 203, 'Stockholm', 'AB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2972, 3089, 203, 'Uppsala', 'C', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2973, 3090, 203, 'Värmland', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2974, 3091, 203, 'Västerbotten', 'AC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2975, 3092, 203, 'Västernorrland', 'Y', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2976, 3093, 203, 'Västmanland', 'U', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2977, 3094, 203, 'Västra Götaland', 'O', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2978, 3095, 204, 'Aargau', 'AG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2979, 3096, 204, 'Appenzell Ausserrhoden', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2980, 3097, 204, 'Appenzell Innerrhoden', 'AI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2981, 3098, 204, 'Basel-Stadt', 'BS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2982, 3099, 204, 'Basel-Landschaft', 'BL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2983, 3100, 204, 'Bern', 'BE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2984, 3101, 204, 'Fribourg', 'FR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2985, 3102, 204, 'Gen&egrave;ve', 'GE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2986, 3103, 204, 'Glarus', 'GL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2987, 3104, 204, 'Graubünden', 'GR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2988, 3105, 204, 'Jura', 'JU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2989, 3106, 204, 'Luzern', 'LU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2990, 3107, 204, 'Neuch&acirc;tel', 'NE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2991, 3108, 204, 'Nidwald', 'NW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2992, 3109, 204, 'Obwald', 'OW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2993, 3110, 204, 'St. Gallen', 'SG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2994, 3111, 204, 'Schaffhausen', 'SH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2995, 3112, 204, 'Schwyz', 'SZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2996, 3113, 204, 'Solothurn', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2997, 3114, 204, 'Thurgau', 'TG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2998, 3115, 204, 'Ticino', 'TI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(2999, 3116, 204, 'Uri', 'UR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3000, 3117, 204, 'Valais', 'VS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3001, 3118, 204, 'Vaud', 'VD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3002, 3119, 204, 'Zug', 'ZG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3003, 3120, 204, 'Zürich', 'ZH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3004, 3121, 205, 'Al Hasakah', 'HA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3005, 3122, 205, 'Al Ladhiqiyah', 'LA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3006, 3123, 205, 'Al Qunaytirah', 'QU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3007, 3124, 205, 'Ar Raqqah', 'RQ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3008, 3125, 205, 'As Suwayda', 'SU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3009, 3126, 205, 'Dara', 'DA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3010, 3127, 205, 'Dayr az Zawr', 'DZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3011, 3128, 205, 'Dimashq', 'DI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3012, 3129, 205, 'Halab', 'HL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3013, 3130, 205, 'Hamah', 'HM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3014, 3131, 205, 'Hims', 'HI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3015, 3132, 205, 'Idlib', 'ID', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3016, 3133, 205, 'Rif Dimashq', 'RD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3017, 3134, 205, 'Tartus', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3018, 3135, 206, 'Chang-hua', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3019, 3136, 206, 'Chia-i', 'CI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3020, 3137, 206, 'Hsin-chu', 'HS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3021, 3138, 206, 'Hua-lien', 'HL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3022, 3139, 206, 'I-lan', 'IL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3023, 3140, 206, 'Kao-hsiung county', 'KH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3024, 3141, 206, 'Kin-men', 'KM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3025, 3142, 206, 'Lien-chiang', 'LC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3026, 3143, 206, 'Miao-li', 'ML', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3027, 3144, 206, 'Nan-t\'ou', 'NT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3028, 3145, 206, 'P\'eng-hu', 'PH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3029, 3146, 206, 'P\'ing-tung', 'PT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3030, 3147, 206, 'T\'ai-chung', 'TG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3031, 3148, 206, 'T\'ai-nan', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3032, 3149, 206, 'T\'ai-pei county', 'TP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3033, 3150, 206, 'T\'ai-tung', 'TT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3034, 3151, 206, 'T\'ao-yuan', 'TY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3035, 3152, 206, 'Yun-lin', 'YL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3036, 3153, 206, 'Chia-i city', 'CC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3037, 3154, 206, 'Chi-lung', 'CL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3038, 3155, 206, 'Hsin-chu', 'HC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3039, 3156, 206, 'T\'ai-chung', 'TH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3040, 3157, 206, 'T\'ai-nan', 'TN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3041, 3158, 206, 'Kao-hsiung city', 'KC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3042, 3159, 206, 'T\'ai-pei city', 'TC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3043, 3160, 207, 'Gorno-Badakhstan', 'GB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3044, 3161, 207, 'Khatlon', 'KT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3045, 3162, 207, 'Sughd', 'SU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3046, 3163, 208, 'Arusha', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3047, 3164, 208, 'Dar es Salaam', 'DS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3048, 3165, 208, 'Dodoma', 'DO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3049, 3166, 208, 'Iringa', 'IR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3050, 3167, 208, 'Kagera', 'KA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3051, 3168, 208, 'Kigoma', 'KI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3052, 3169, 208, 'Kilimanjaro', 'KJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3053, 3170, 208, 'Lindi', 'LN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3054, 3171, 208, 'Manyara', 'MY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3055, 3172, 208, 'Mara', 'MR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3056, 3173, 208, 'Mbeya', 'MB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3057, 3174, 208, 'Morogoro', 'MO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3058, 3175, 208, 'Mtwara', 'MT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3059, 3176, 208, 'Mwanza', 'MW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3060, 3177, 208, 'Pemba North', 'PN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3061, 3178, 208, 'Pemba South', 'PS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3062, 3179, 208, 'Pwani', 'PW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3063, 3180, 208, 'Rukwa', 'RK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3064, 3181, 208, 'Ruvuma', 'RV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3065, 3182, 208, 'Shinyanga', 'SH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3066, 3183, 208, 'Singida', 'SI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3067, 3184, 208, 'Tabora', 'TB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3068, 3185, 208, 'Tanga', 'TN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3069, 3186, 208, 'Zanzibar Central/South', 'ZC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3070, 3187, 208, 'Zanzibar North', 'ZN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3071, 3188, 208, 'Zanzibar Urban/West', 'ZU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3072, 3189, 209, 'Amnat Charoen  Amnat', 'Charoen', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3073, 3190, 209, 'Ang Thong  Ang', 'Thong', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3074, 3191, 209, 'Ayutthaya', 'Ayutthaya', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3075, 3192, 209, 'Bangkok', 'Bangkok', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3076, 3193, 209, 'Buriram', 'Buriram', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3077, 3194, 209, 'Chachoengsao', 'Chachoengsao', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3078, 3195, 209, 'Chai Nat', 'Chai Nat', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3079, 3196, 209, 'Chaiyaphum', 'Chaiyaphum', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3080, 3197, 209, 'Chanthaburi', 'Chanthaburi', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3081, 3198, 209, 'Chiang Mai', 'Chiang Mai', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3082, 3199, 209, 'Chiang Rai', 'Chiang Rai', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3083, 3200, 209, 'Chon Buri', 'Chon Buri', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3084, 3201, 209, 'Chumphon', 'Chumphon', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3085, 3202, 209, 'Kalasin', 'Kalasin', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3086, 3203, 209, 'Kamphaeng Phet', 'Kamphaeng Phet', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3087, 3204, 209, 'Kanchanaburi', 'Kanchanaburi', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3088, 3205, 209, 'Khon Kaen', 'Khon Kaen', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3089, 3206, 209, 'Krabi', 'Krabi', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3090, 3207, 209, 'Lampang', 'Lampang', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3091, 3208, 209, 'Lamphun', 'Lamphun', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3092, 3209, 209, 'Loei', 'Loei', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3093, 3210, 209, 'Lop Buri', 'Lop Buri', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3094, 3211, 209, 'Mae Hong Son', 'Mae Hong Son', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3095, 3212, 209, 'Maha Sarakham', 'Maha Sarakham', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3096, 3213, 209, 'Mukdahan', 'Mukdahan', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3097, 3214, 209, 'Nakhon Nayok', 'Nakhon Nayok', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3098, 3215, 209, 'Nakhon Pathom', 'Nakhon Pathom', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3099, 3216, 209, 'Nakhon Phanom', 'Nakhon Phanom', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3100, 3217, 209, 'Nakhon Ratchasima', 'Nakhon Ratchasima', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3101, 3218, 209, 'Nakhon Sawan', 'Nakhon Sawan', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3102, 3219, 209, 'Nakhon Si Thammarat', 'Nakhon Si Thammarat', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3103, 3220, 209, 'Nan', 'Nan', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3104, 3221, 209, 'Narathiwat', 'Narathiwat', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3105, 3222, 209, 'Nong Bua Lamphu', 'Nong Bua Lamphu', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3106, 3223, 209, 'Nong Khai', 'Nong Khai', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3107, 3224, 209, 'Nonthaburi', 'Nonthaburi', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3108, 3225, 209, 'Pathum Thani', 'Pathum Thani', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3109, 3226, 209, 'Pattani', 'Pattani', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3110, 3227, 209, 'Phangnga', 'Phangnga', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3111, 3228, 209, 'Phatthalung', 'Phatthalung', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3112, 3229, 209, 'Phayao', 'Phayao', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3113, 3230, 209, 'Phetchabun', 'Phetchabun', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3114, 3231, 209, 'Phetchaburi', 'Phetchaburi', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3115, 3232, 209, 'Phichit', 'Phichit', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3116, 3233, 209, 'Phitsanulok', 'Phitsanulok', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3117, 3234, 209, 'Phrae', 'Phrae', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3118, 3235, 209, 'Phuket', 'Phuket', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3119, 3236, 209, 'Prachin Buri', 'Prachin Buri', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3120, 3237, 209, 'Prachuap Khiri Khan', 'Prachuap Khiri Khan', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3121, 3238, 209, 'Ranong', 'Ranong', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3122, 3239, 209, 'Ratchaburi', 'Ratchaburi', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3123, 3240, 209, 'Rayong', 'Rayong', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3124, 3241, 209, 'Roi Et', 'Roi Et', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3125, 3242, 209, 'Sa Kaeo', 'Sa Kaeo', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3126, 3243, 209, 'Sakon Nakhon', 'Sakon Nakhon', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3127, 3244, 209, 'Samut Prakan', 'Samut Prakan', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3128, 3245, 209, 'Samut Sakhon', 'Samut Sakhon', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3129, 3246, 209, 'Samut Songkhram', 'Samut Songkhram', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3130, 3247, 209, 'Sara Buri', 'Sara Buri', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3131, 3248, 209, 'Satun', 'Satun', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3132, 3249, 209, 'Sing Buri', 'Sing Buri', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3133, 3250, 209, 'Sisaket', 'Sisaket', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3134, 3251, 209, 'Songkhla', 'Songkhla', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3135, 3252, 209, 'Sukhothai', 'Sukhothai', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3136, 3253, 209, 'Suphan Buri', 'Suphan Buri', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3137, 3254, 209, 'Surat Thani', 'Surat Thani', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3138, 3255, 209, 'Surin', 'Surin', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3139, 3256, 209, 'Tak', 'Tak', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3140, 3257, 209, 'Trang', 'Trang', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3141, 3258, 209, 'Trat', 'Trat', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3142, 3259, 209, 'Ubon Ratchathani', 'Ubon Ratchathani', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3143, 3260, 209, 'Udon Thani', 'Udon Thani', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3144, 3261, 209, 'Uthai Thani', 'Uthai Thani', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3145, 3262, 209, 'Uttaradit', 'Uttaradit', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3146, 3263, 209, 'Yala', 'Yala', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3147, 3264, 209, 'Yasothon', 'Yasothon', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3148, 3265, 210, 'Kara', 'K', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3149, 3266, 210, 'Plateaux', 'P', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3150, 3267, 210, 'Savanes', 'S', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3151, 3268, 210, 'Centrale', 'C', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3152, 3269, 210, 'Maritime', 'M', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3153, 3270, 211, 'Atafu', 'A', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3154, 3271, 211, 'Fakaofo', 'F', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3155, 3272, 211, 'Nukunonu', 'N', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3156, 3273, 212, 'Ha\'apai', 'H', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3157, 3274, 212, 'Tongatapu', 'T', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3158, 3275, 212, 'Vava\'u', 'V', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3159, 3276, 213, 'Couva/Tabaquite/Talparo', 'CT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3160, 3277, 213, 'Diego Martin', 'DM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3161, 3278, 213, 'Mayaro/Rio Claro', 'MR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3162, 3279, 213, 'Penal/Debe', 'PD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3163, 3280, 213, 'Princes Town', 'PT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3164, 3281, 213, 'Sangre Grande', 'SG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3165, 3282, 213, 'San Juan/Laventille', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3166, 3283, 213, 'Siparia', 'SI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3167, 3284, 213, 'Tunapuna/Piarco', 'TP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3168, 3285, 213, 'Port of Spain', 'PS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3169, 3286, 213, 'San Fernando', 'SF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3170, 3287, 213, 'Arima', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3171, 3288, 213, 'Point Fortin', 'PF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3172, 3289, 213, 'Chaguanas', 'CH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3173, 3290, 213, 'Tobago', 'TO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3174, 3291, 214, 'Ariana', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3175, 3292, 214, 'Beja', 'BJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3176, 3293, 214, 'Ben Arous', 'BA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3177, 3294, 214, 'Bizerte', 'BI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3178, 3295, 214, 'Gabes', 'GB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3179, 3296, 214, 'Gafsa', 'GF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3180, 3297, 214, 'Jendouba', 'JE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3181, 3298, 214, 'Kairouan', 'KR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3182, 3299, 214, 'Kasserine', 'KS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3183, 3300, 214, 'Kebili', 'KB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3184, 3301, 214, 'Kef', 'KF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3185, 3302, 214, 'Mahdia', 'MH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3186, 3303, 214, 'Manouba', 'MN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3187, 3304, 214, 'Medenine', 'ME', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3188, 3305, 214, 'Monastir', 'MO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3189, 3306, 214, 'Nabeul', 'NA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3190, 3307, 214, 'Sfax', 'SF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3191, 3308, 214, 'Sidi', 'SD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3192, 3309, 214, 'Siliana', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3193, 3310, 214, 'Sousse', 'SO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3194, 3311, 214, 'Tataouine', 'TA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3195, 3312, 214, 'Tozeur', 'TO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3196, 3313, 214, 'Tunis', 'TU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3197, 3314, 214, 'Zaghouan', 'ZA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3198, 3315, 215, 'Adana', 'ADA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3199, 3316, 215, 'Adıyaman', 'ADI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3200, 3317, 215, 'Afyonkarahisar', 'AFY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3201, 3318, 215, 'Ağrı', 'AGR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3202, 3319, 215, 'Aksaray', 'AKS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3203, 3320, 215, 'Amasya', 'AMA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3204, 3321, 215, 'Ankara', 'ANK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3205, 3322, 215, 'Antalya', 'ANT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3206, 3323, 215, 'Ardahan', 'ARD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3207, 3324, 215, 'Artvin', 'ART', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3208, 3325, 215, 'Aydın', 'AYI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3209, 3326, 215, 'Balıkesir', 'BAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3210, 3327, 215, 'Bartın', 'BAR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3211, 3328, 215, 'Batman', 'BAT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3212, 3329, 215, 'Bayburt', 'BAY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3213, 3330, 215, 'Bilecik', 'BIL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3214, 3331, 215, 'Bingöl', 'BIN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3215, 3332, 215, 'Bitlis', 'BIT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3216, 3333, 215, 'Bolu', 'BOL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3217, 3334, 215, 'Burdur', 'BRD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3218, 3335, 215, 'Bursa', 'BRS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3219, 3336, 215, 'Çanakkale', 'CKL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3220, 3337, 215, 'Çankırı', 'CKR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3221, 3338, 215, 'Çorum', 'COR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3222, 3339, 215, 'Denizli', 'DEN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3223, 3340, 215, 'Diyarbakır', 'DIY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3224, 3341, 215, 'Düzce', 'DUZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3225, 3342, 215, 'Edirne', 'EDI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3226, 3343, 215, 'Elazığ', 'ELA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3227, 3344, 215, 'Erzincan', 'EZC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3228, 3345, 215, 'Erzurum', 'EZR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3229, 3346, 215, 'Eskişehir', 'ESK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3230, 3347, 215, 'Gaziantep', 'GAZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3231, 3348, 215, 'Giresun', 'GIR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3232, 3349, 215, 'Gümüşhane', 'GMS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3233, 3350, 215, 'Hakkari', 'HKR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3234, 3351, 215, 'Hatay', 'HTY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3235, 3352, 215, 'Iğdır', 'IGD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3236, 3353, 215, 'Isparta', 'ISP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3237, 3354, 215, 'İstanbul', 'IST', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3238, 3355, 215, 'İzmir', 'IZM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3239, 3356, 215, 'Kahramanmaraş', 'KAH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3240, 3357, 215, 'Karabük', 'KRB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3241, 3358, 215, 'Karaman', 'KRM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3242, 3359, 215, 'Kars', 'KRS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3243, 3360, 215, 'Kastamonu', 'KAS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3244, 3361, 215, 'Kayseri', 'KAY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3245, 3362, 215, 'Kilis', 'KLS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3246, 3363, 215, 'Kırıkkale', 'KRK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3247, 3364, 215, 'Kırklareli', 'KLR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3248, 3365, 215, 'Kırşehir', 'KRH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3249, 3366, 215, 'Kocaeli', 'KOC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3250, 3367, 215, 'Konya', 'KON', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3251, 3368, 215, 'Kütahya', 'KUT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3252, 3369, 215, 'Malatya', 'MAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3253, 3370, 215, 'Manisa', 'MAN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3254, 3371, 215, 'Mardin', 'MAR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3255, 3372, 215, 'Mersin', 'MER', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3256, 3373, 215, 'Muğla', 'MUG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3257, 3374, 215, 'Muş', 'MUS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3258, 3375, 215, 'Nevşehir', 'NEV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3259, 3376, 215, 'Niğde', 'NIG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3260, 3377, 215, 'Ordu', 'ORD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3261, 3378, 215, 'Osmaniye', 'OSM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3262, 3379, 215, 'Rize', 'RIZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3263, 3380, 215, 'Sakarya', 'SAK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3264, 3381, 215, 'Samsun', 'SAM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3265, 3382, 215, 'Şanlıurfa', 'SAN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3266, 3383, 215, 'Siirt', 'SII', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3267, 3384, 215, 'Sinop', 'SIN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3268, 3385, 215, 'Şırnak', 'SIR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3269, 3386, 215, 'Sivas', 'SIV', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3270, 3387, 215, 'Tekirdağ', 'TEL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3271, 3388, 215, 'Tokat', 'TOK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3272, 3389, 215, 'Trabzon', 'TRA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3273, 3390, 215, 'Tunceli', 'TUN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3274, 3391, 215, 'Uşak', 'USK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3275, 3392, 215, 'Van', 'VAN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3276, 3393, 215, 'Yalova', 'YAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3277, 3394, 215, 'Yozgat', 'YOZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3278, 3395, 215, 'Zonguldak', 'ZON', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3279, 3396, 216, 'Ahal Welayaty', 'A', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3280, 3397, 216, 'Balkan Welayaty', 'B', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3281, 3398, 216, 'Dashhowuz Welayaty', 'D', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3282, 3399, 216, 'Lebap Welayaty', 'L', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3283, 3400, 216, 'Mary Welayaty', 'M', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3284, 3401, 217, 'Ambergris Cays', 'AC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3285, 3402, 217, 'Dellis Cay', 'DC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3286, 3403, 217, 'French Cay', 'FC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3287, 3404, 217, 'Little Water Cay', 'LW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3288, 3405, 217, 'Parrot Cay', 'RC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3289, 3406, 217, 'Pine Cay', 'PN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3290, 3407, 217, 'Salt Cay', 'SL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3291, 3408, 217, 'Grand Turk', 'GT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3292, 3409, 217, 'South Caicos', 'SC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3293, 3410, 217, 'East Caicos', 'EC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3294, 3411, 217, 'Middle Caicos', 'MC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3295, 3412, 217, 'North Caicos', 'NC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3296, 3413, 217, 'Providenciales', 'PR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3297, 3414, 217, 'West Caicos', 'WC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3298, 3415, 218, 'Nanumanga', 'NMG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3299, 3416, 218, 'Niulakita', 'NLK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3300, 3417, 218, 'Niutao', 'NTO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3301, 3418, 218, 'Funafuti', 'FUN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3302, 3419, 218, 'Nanumea', 'NME', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3303, 3420, 218, 'Nui', 'NUI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3304, 3421, 218, 'Nukufetau', 'NFT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3305, 3422, 218, 'Nukulaelae', 'NLL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3306, 3423, 218, 'Vaitupu', 'VAI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3307, 3424, 219, 'Kalangala', 'KAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3308, 3425, 219, 'Kampala', 'KMP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3309, 3426, 219, 'Kayunga', 'KAY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3310, 3427, 219, 'Kiboga', 'KIB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3311, 3428, 219, 'Luwero', 'LUW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3312, 3429, 219, 'Masaka', 'MAS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3313, 3430, 219, 'Mpigi', 'MPI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3314, 3431, 219, 'Mubende', 'MUB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3315, 3432, 219, 'Mukono', 'MUK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3316, 3433, 219, 'Nakasongola', 'NKS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3317, 3434, 219, 'Rakai', 'RAK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3318, 3435, 219, 'Sembabule', 'SEM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3319, 3436, 219, 'Wakiso', 'WAK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3320, 3437, 219, 'Bugiri', 'BUG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3321, 3438, 219, 'Busia', 'BUS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3322, 3439, 219, 'Iganga', 'IGA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3323, 3440, 219, 'Jinja', 'JIN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3324, 3441, 219, 'Kaberamaido', 'KAB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3325, 3442, 219, 'Kamuli', 'KML', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3326, 3443, 219, 'Kapchorwa', 'KPC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3327, 3444, 219, 'Katakwi', 'KTK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3328, 3445, 219, 'Kumi', 'KUM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3329, 3446, 219, 'Mayuge', 'MAY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3330, 3447, 219, 'Mbale', 'MBA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3331, 3448, 219, 'Pallisa', 'PAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3332, 3449, 219, 'Sironko', 'SIR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3333, 3450, 219, 'Soroti', 'SOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3334, 3451, 219, 'Tororo', 'TOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3335, 3452, 219, 'Adjumani', 'ADJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3336, 3453, 219, 'Apac', 'APC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3337, 3454, 219, 'Arua', 'ARU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3338, 3455, 219, 'Gulu', 'GUL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3339, 3456, 219, 'Kitgum', 'KIT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3340, 3457, 219, 'Koti', 'KOT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3341, 3458, 219, 'Lira', 'LIR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3342, 3459, 219, 'Moro', 'MRT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3343, 3460, 219, 'Moyo', 'MOY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3344, 3461, 219, 'Nakapiripirit', 'NAK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3345, 3462, 219, 'Nebbi', 'NEB', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3346, 3463, 219, 'Pader', 'PAD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3347, 3464, 219, 'Yumbe', 'YUM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3348, 3465, 219, 'Bundibugyo', 'BUN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3349, 3466, 219, 'Bushenyi', 'BSH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3350, 3467, 219, 'Hoima', 'HOI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3351, 3468, 219, 'Kabale', 'KBL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3352, 3469, 219, 'Kabarole', 'KAR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3353, 3470, 219, 'Kamwenge', 'KAM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3354, 3471, 219, 'Kanungu', 'KAN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3355, 3472, 219, 'Kasese', 'KAS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3356, 3473, 219, 'Kibaale', 'KBA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3357, 3474, 219, 'Kisoro', 'KIS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3358, 3475, 219, 'Kyenjojo', 'KYE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3359, 3476, 219, 'Masindi', 'MSN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3360, 3477, 219, 'Mbarara', 'MBR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3361, 3478, 219, 'Ntungamo', 'NTU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3362, 3479, 219, 'Rukungiri', 'RUK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3363, 3480, 220, 'Cherkas\'ka Oblast', '71', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3364, 3481, 220, 'Chernihivs\'ka Oblast', '74', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3365, 3482, 220, 'Chernivets\'ka Oblast', '77', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3366, 3483, 220, 'Crimea', '43', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3367, 3484, 220, 'Dnipropetrovs\'ka Oblast', '12', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3368, 3485, 220, 'Donets\'ka Oblast', '14', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3369, 3486, 220, 'Ivano-Frankivs\'ka Oblast', '26', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3370, 3487, 220, 'Khersons\'ka Oblast', '65', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3371, 3488, 220, 'Khmel\'nyts\'ka Oblast', '68', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3372, 3489, 220, 'Kirovohrads\'ka Oblast', '35', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3373, 3490, 220, 'Kyiv', '30', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3374, 3491, 220, 'Kyivs\'ka Oblast', '32', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3375, 3492, 220, 'Luhans\'ka Oblast', '9', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3376, 3493, 220, 'L\'vivs\'ka Oblast', '46', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3377, 3494, 220, 'Mykolayivs\'ka Oblast', '48', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3378, 3495, 220, 'Odes\'ka Oblast', '51', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3379, 3496, 220, 'Poltavs\'ka Oblast', '53', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3380, 3497, 220, 'Rivnens\'ka Oblast', '56', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3381, 3498, 220, 'Sevastopol', '40', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3382, 3499, 220, 'Sums\'ka Oblast', '59', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3383, 3500, 220, 'Ternopil\'s\'ka Oblast', '61', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3384, 3501, 220, 'Vinnyts\'ka Oblast', '5', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3385, 3502, 220, 'Volyns\'ka Oblast', '7', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3386, 3503, 220, 'Zakarpats\'ka Oblast', '21', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3387, 3504, 220, 'Zaporiz\'ka Oblast', '23', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3388, 3505, 220, 'Zhytomyrs\'ka oblast', '18', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3389, 3506, 221, 'Abu Dhabi', 'ADH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3390, 3507, 221, 'Ajman', 'AJ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3391, 3508, 221, 'Al Fujayrah', 'FU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3392, 3509, 221, 'Ash Shariqah', 'SH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3393, 3510, 221, 'Dubai', 'DU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3394, 3511, 221, 'R\'as al Khaymah', 'RK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3395, 3512, 221, 'Umm al Qaywayn', 'UQ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3396, 3513, 222, 'Aberdeen', 'ABN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3397, 3514, 222, 'Aberdeenshire', 'ABNS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3398, 3515, 222, 'Anglesey', 'ANG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3399, 3516, 222, 'Angus', 'AGS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3400, 3517, 222, 'Argyll and Bute', 'ARY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3401, 3518, 222, 'Bedfordshire', 'BEDS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3402, 3519, 222, 'Berkshire', 'BERKS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3403, 3520, 222, 'Blaenau Gwent', 'BLA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3404, 3521, 222, 'Bridgend', 'BRI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3405, 3522, 222, 'Bristol', 'BSTL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3406, 3523, 222, 'Buckinghamshire', 'BUCKS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3407, 3524, 222, 'Caerphilly', 'CAE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3408, 3525, 222, 'Cambridgeshire', 'CAMBS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3409, 3526, 222, 'Cardiff', 'CDF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3410, 3527, 222, 'Carmarthenshire', 'CARM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3411, 3528, 222, 'Ceredigion', 'CDGN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3412, 3529, 222, 'Cheshire', 'CHES', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3413, 3530, 222, 'Clackmannanshire', 'CLACK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3414, 3531, 222, 'Conwy', 'CON', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3415, 3532, 222, 'Cornwall', 'CORN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3416, 3533, 222, 'Denbighshire', 'DNBG', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3417, 3534, 222, 'Derbyshire', 'DERBY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3418, 3535, 222, 'Devon', 'DVN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3419, 3536, 222, 'Dorset', 'DOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3420, 3537, 222, 'Dumfries and Galloway', 'DGL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3421, 3538, 222, 'Dundee', 'DUND', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3422, 3539, 222, 'Durham', 'DHM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3423, 3540, 222, 'East Ayrshire', 'ARYE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3424, 3541, 222, 'East Dunbartonshire', 'DUNBE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3425, 3542, 222, 'East Lothian', 'LOTE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3426, 3543, 222, 'East Renfrewshire', 'RENE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3427, 3544, 222, 'East Riding of Yorkshire', 'ERYS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3428, 3545, 222, 'East Sussex', 'SXE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3429, 3546, 222, 'Edinburgh', 'EDIN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3430, 3547, 222, 'Essex', 'ESX', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3431, 3548, 222, 'Falkirk', 'FALK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3432, 3549, 222, 'Fife', 'FFE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3433, 3550, 222, 'Flintshire', 'FLINT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3434, 3551, 222, 'Glasgow', 'GLAS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3435, 3552, 222, 'Gloucestershire', 'GLOS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3436, 3553, 222, 'Greater London', 'LDN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3437, 3554, 222, 'Greater Manchester', 'MCH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3438, 3555, 222, 'Gwynedd', 'GDD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3439, 3556, 222, 'Hampshire', 'HANTS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3440, 3557, 222, 'Herefordshire', 'HWR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3441, 3558, 222, 'Hertfordshire', 'HERTS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3442, 3559, 222, 'Highlands', 'HLD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3443, 3560, 222, 'Inverclyde', 'IVER', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3444, 3561, 222, 'Isle of Wight', 'IOW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3445, 3562, 222, 'Kent', 'KNT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3446, 3563, 222, 'Lancashire', 'LANCS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3447, 3564, 222, 'Leicestershire', 'LEICS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3448, 3565, 222, 'Lincolnshire', 'LINCS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3449, 3566, 222, 'Merseyside', 'MSY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3450, 3567, 222, 'Merthyr Tydfil', 'MERT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3451, 3568, 222, 'Midlothian', 'MLOT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3452, 3569, 222, 'Monmouthshire', 'MMOUTH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3453, 3570, 222, 'Moray', 'MORAY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3454, 3571, 222, 'Neath Port Talbot', 'NPRTAL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3455, 3572, 222, 'Newport', 'NEWPT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3456, 3573, 222, 'Norfolk', 'NOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3457, 3574, 222, 'North Ayrshire', 'ARYN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3458, 3575, 222, 'North Lanarkshire', 'LANN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3459, 3576, 222, 'North Yorkshire', 'YSN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3460, 3577, 222, 'Northamptonshire', 'NHM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3461, 3578, 222, 'Northumberland', 'NLD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3462, 3579, 222, 'Nottinghamshire', 'NOT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3463, 3580, 222, 'Orkney Islands', 'ORK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3464, 3581, 222, 'Oxfordshire', 'OFE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3465, 3582, 222, 'Pembrokeshire', 'PEM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3466, 3583, 222, 'Perth and Kinross', 'PERTH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3467, 3584, 222, 'Powys', 'PWS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3468, 3585, 222, 'Renfrewshire', 'REN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3469, 3586, 222, 'Rhondda Cynon Taff', 'RHON', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3470, 3587, 222, 'Rutland', 'RUT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3471, 3588, 222, 'Scottish Borders', 'BOR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3472, 3589, 222, 'Shetland Islands', 'SHET', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3473, 3590, 222, 'Shropshire', 'SPE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3474, 3591, 222, 'Somerset', 'SOM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3475, 3592, 222, 'South Ayrshire', 'ARYS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3476, 3593, 222, 'South Lanarkshire', 'LANS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3477, 3594, 222, 'South Yorkshire', 'YSS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3478, 3595, 222, 'Staffordshire', 'SFD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3479, 3596, 222, 'Stirling', 'STIR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3480, 3597, 222, 'Suffolk', 'SFK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3481, 3598, 222, 'Surrey', 'SRY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3482, 3599, 222, 'Swansea', 'SWAN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3483, 3600, 222, 'Torfaen', 'TORF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3484, 3601, 222, 'Tyne and Wear', 'TWR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3485, 3602, 222, 'Vale of Glamorgan', 'VGLAM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3486, 3603, 222, 'Warwickshire', 'WARKS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3487, 3604, 222, 'West Dunbartonshire', 'WDUN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3488, 3605, 222, 'West Lothian', 'WLOT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3489, 3606, 222, 'West Midlands', 'WMD', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3490, 3607, 222, 'West Sussex', 'SXW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3491, 3608, 222, 'West Yorkshire', 'YSW', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3492, 3609, 222, 'Western Isles', 'WIL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3493, 3610, 222, 'Wiltshire', 'WLT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3494, 3611, 222, 'Worcestershire', 'WORCS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3495, 3612, 222, 'Wrexham', 'WRX', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3496, 3613, 223, 'Alabama', 'AL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3497, 3614, 223, 'Alaska', 'AK', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3498, 3615, 223, 'American Samoa', 'AS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3499, 3616, 223, 'Arizona', 'AZ', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3500, 3617, 223, 'Arkansas', 'AR', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3501, 3618, 223, 'Armed Forces Africa', 'AF', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3502, 3619, 223, 'Armed Forces Americas', 'AA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3503, 3620, 223, 'Armed Forces Canada', 'AC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3504, 3621, 223, 'Armed Forces Europe', 'AE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3505, 3622, 223, 'Armed Forces Middle East', 'AM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3506, 3623, 223, 'Armed Forces Pacific', 'AP', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3507, 3624, 223, 'California', 'CA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3508, 3625, 223, 'Colorado', 'CO', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3509, 3626, 223, 'Connecticut', 'CT', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3510, 3627, 223, 'Delaware', 'DE', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3511, 3628, 223, 'District of Columbia', 'DC', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3512, 3629, 223, 'Federated States Of Micronesia', 'FM', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3513, 3630, 223, 'Florida', 'FL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3514, 3631, 223, 'Georgia', 'GA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3515, 3632, 223, 'Guam', 'GU', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3516, 3633, 223, 'Hawaii', 'HI', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3517, 3634, 223, 'Idaho', 'ID', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3518, 3635, 223, 'Illinois', 'IL', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3519, 3636, 223, 'Indiana', 'IN', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3520, 3637, 223, 'Iowa', 'IA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3521, 3638, 223, 'Kansas', 'KS', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3522, 3639, 223, 'Kentucky', 'KY', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3523, 3640, 223, 'Louisiana', 'LA', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3524, 3641, 223, 'Maine', 'ME', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3525, 3642, 223, 'Marshall Islands', 'MH', 0, 1, '2020-10-29 11:35:02', '2020-10-29 11:35:02', NULL),
(3526, 3643, 223, 'Maryland', 'MD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3527, 3644, 223, 'Massachusetts', 'MA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3528, 3645, 223, 'Michigan', 'MI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3529, 3646, 223, 'Minnesota', 'MN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3530, 3647, 223, 'Mississippi', 'MS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3531, 3648, 223, 'Missouri', 'MO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3532, 3649, 223, 'Montana', 'MT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3533, 3650, 223, 'Nebraska', 'NE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3534, 3651, 223, 'Nevada', 'NV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3535, 3652, 223, 'New Hampshire', 'NH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3536, 3653, 223, 'New Jersey', 'NJ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3537, 3654, 223, 'New Mexico', 'NM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3538, 3655, 223, 'New York', 'NY', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3539, 3656, 223, 'North Carolina', 'NC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3540, 3657, 223, 'North Dakota', 'ND', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3541, 3658, 223, 'Northern Mariana Islands', 'MP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3542, 3659, 223, 'Ohio', 'OH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3543, 3660, 223, 'Oklahoma', 'OK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3544, 3661, 223, 'Oregon', 'OR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3545, 3662, 223, 'Palau', 'PW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3546, 3663, 223, 'Pennsylvania', 'PA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3547, 3664, 223, 'Puerto Rico', 'PR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3548, 3665, 223, 'Rhode Island', 'RI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3549, 3666, 223, 'South Carolina ', 'SC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3550, 3667, 223, 'South Dakota', 'SD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3551, 3668, 223, 'Tennessee', 'TN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3552, 3669, 223, 'Texas', 'TX', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3553, 3670, 223, 'Utah', 'UT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3554, 3671, 223, 'Vermont', 'VT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3555, 3672, 223, 'Virgin Islands', 'VI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3556, 3673, 223, 'Virginia', 'VA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3557, 3674, 223, 'Washington', 'WA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3558, 3675, 223, 'West Virginia', 'WV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3559, 3676, 223, 'Wisconsin', 'WI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3560, 3677, 223, 'Wyoming', 'WY', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3561, 3678, 224, 'Baker Island', 'BI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3562, 3679, 224, 'Howland Island', 'HI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3563, 3680, 224, 'Jarvis Island', 'JI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3564, 3681, 224, 'Johnston Atoll', 'JA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3565, 3682, 224, 'Kingman Reef', 'KR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3566, 3683, 224, 'Midway Atoll', 'MA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3567, 3684, 224, 'Navassa Island', 'NI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3568, 3685, 224, 'Palmyra Atoll', 'PA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3569, 3686, 224, 'Wake Island', 'WI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3570, 3687, 225, 'Artigas', 'AR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3571, 3688, 225, 'Canelones', 'CA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3572, 3689, 225, 'Cerro Largo', 'CL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3573, 3690, 225, 'Colonia', 'CO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3574, 3691, 225, 'Durazno', 'DU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3575, 3692, 225, 'Flores', 'FS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3576, 3693, 225, 'Florida', 'FA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3577, 3694, 225, 'Lavalleja', 'LA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3578, 3695, 225, 'Maldonado', 'MA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3579, 3696, 225, 'Montevideo', 'MO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3580, 3697, 225, 'Paysandu', 'PA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3581, 3698, 225, 'Rio Negro', 'RN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3582, 3699, 225, 'Rivera', 'RV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3583, 3700, 225, 'Rocha', 'RO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3584, 3701, 225, 'Salto', 'SL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3585, 3702, 225, 'San Jose', 'SJ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3586, 3703, 225, 'Soriano', 'SO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3587, 3704, 225, 'Tacuarembo', 'TA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3588, 3705, 225, 'Treinta y Tres', 'TT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3589, 3706, 226, 'Andijon', 'AN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3590, 3707, 226, 'Buxoro', 'BU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3591, 3708, 226, 'Farg\'ona', 'FA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3592, 3709, 226, 'Jizzax', 'JI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3593, 3710, 226, 'Namangan', 'NG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3594, 3711, 226, 'Navoiy', 'NW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3595, 3712, 226, 'Qashqadaryo', 'QA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3596, 3713, 226, 'Qoraqalpog\'iston Republikasi', 'QR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3597, 3714, 226, 'Samarqand', 'SA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3598, 3715, 226, 'Sirdaryo', 'SI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3599, 3716, 226, 'Surxondaryo', 'SU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3600, 3717, 226, 'Toshkent City', 'TK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3601, 3718, 226, 'Toshkent Region', 'TO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3602, 3719, 226, 'Xorazm', 'XO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3603, 3720, 227, 'Malampa', 'MA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3604, 3721, 227, 'Penama', 'PE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3605, 3722, 227, 'Sanma', 'SA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3606, 3723, 227, 'Shefa', 'SH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3607, 3724, 227, 'Tafea', 'TA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3608, 3725, 227, 'Torba', 'TO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3609, 3726, 229, 'Amazonas', 'AM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3610, 3727, 229, 'Anzoategui', 'AN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3611, 3728, 229, 'Apure', 'AP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3612, 3729, 229, 'Aragua', 'AR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3613, 3730, 229, 'Barinas', 'BA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3614, 3731, 229, 'Bolivar', 'BO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3615, 3732, 229, 'Carabobo', 'CA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3616, 3733, 229, 'Cojedes', 'CO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3617, 3734, 229, 'Delta Amacuro', 'DA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3618, 3735, 229, 'Dependencias Federales', 'DF', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3619, 3736, 229, 'Distrito Federal', 'DI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3620, 3737, 229, 'Falcon', 'FA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3621, 3738, 229, 'Guarico', 'GU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3622, 3739, 229, 'Lara', 'LA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3623, 3740, 229, 'Merida', 'ME', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3624, 3741, 229, 'Miranda', 'MI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3625, 3742, 229, 'Monagas', 'MO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3626, 3743, 229, 'Nueva Esparta', 'NE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3627, 3744, 229, 'Portuguesa', 'PO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3628, 3745, 229, 'Sucre', 'SU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3629, 3746, 229, 'Tachira', 'TA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3630, 3747, 229, 'Trujillo', 'TR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3631, 3748, 229, 'Vargas', 'VA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3632, 3749, 229, 'Yaracuy', 'YA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3633, 3750, 229, 'Zulia', 'ZU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3634, 3751, 230, 'An Giang', 'AG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3635, 3752, 230, 'Bac Giang', 'BG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3636, 3753, 230, 'Bac Kan', 'BK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3637, 3754, 230, 'Bac Lieu', 'BL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3638, 3755, 230, 'Bac Ninh', 'BC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3639, 3756, 230, 'Ba Ria-Vung Tau', 'BR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3640, 3757, 230, 'Ben Tre', 'BN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3641, 3758, 230, 'Binh Dinh', 'BH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3642, 3759, 230, 'Binh Duong', 'BU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3643, 3760, 230, 'Binh Phuoc', 'BP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3644, 3761, 230, 'Binh Thuan', 'BT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3645, 3762, 230, 'Ca Mau', 'CM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3646, 3763, 230, 'Can Tho', 'CT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3647, 3764, 230, 'Cao Bang', 'CB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3648, 3765, 230, 'Dak Lak', 'DL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3649, 3766, 230, 'Dak Nong', 'DG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3650, 3767, 230, 'Da Nang', 'DN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3651, 3768, 230, 'Dien Bien', 'DB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3652, 3769, 230, 'Dong Nai', 'DI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3653, 3770, 230, 'Dong Thap', 'DT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3654, 3771, 230, 'Gia Lai', 'GL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3655, 3772, 230, 'Ha Giang', 'HG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3656, 3773, 230, 'Hai Duong', 'HD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3657, 3774, 230, 'Hai Phong', 'HP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3658, 3775, 230, 'Ha Nam', 'HM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3659, 3776, 230, 'Ha Noi', 'HI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3660, 3777, 230, 'Ha Tay', 'HT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3661, 3778, 230, 'Ha Tinh', 'HH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3662, 3779, 230, 'Hoa Binh', 'HB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3663, 3780, 230, 'Ho Chi Minh City', 'HC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3664, 3781, 230, 'Hau Giang', 'HU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3665, 3782, 230, 'Hung Yen', 'HY', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3666, 3783, 232, 'Saint Croix', 'C', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3667, 3784, 232, 'Saint John', 'J', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3668, 3785, 232, 'Saint Thomas', 'T', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3669, 3786, 233, 'Alo', 'A', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3670, 3787, 233, 'Sigave', 'S', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3671, 3788, 233, 'Wallis', 'W', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3672, 3789, 235, 'Abyan', 'AB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3673, 3790, 235, 'Adan', 'AD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3674, 3791, 235, 'Amran', 'AM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3675, 3792, 235, 'Al Bayda', 'BA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3676, 3793, 235, 'Ad Dali', 'DA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3677, 3794, 235, 'Dhamar', 'DH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3678, 3795, 235, 'Hadramawt', 'HD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3679, 3796, 235, 'Hajjah', 'HJ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3680, 3797, 235, 'Al Hudaydah', 'HU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3681, 3798, 235, 'Ibb', 'IB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3682, 3799, 235, 'Al Jawf', 'JA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3683, 3800, 235, 'Lahij', 'LA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3684, 3801, 235, 'Ma\'rib', 'MA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3685, 3802, 235, 'Al Mahrah', 'MR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3686, 3803, 235, 'Al Mahwit', 'MW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3687, 3804, 235, 'Sa\'dah', 'SD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3688, 3805, 235, 'San\'a', 'SN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3689, 3806, 235, 'Shabwah', 'SH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3690, 3807, 235, 'Ta\'izz', 'TA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3691, 3812, 237, 'Bas-Congo', 'BC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3692, 3813, 237, 'Bandundu', 'BN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3693, 3814, 237, 'Equateur', 'EQ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3694, 3815, 237, 'Katanga', 'KA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3695, 3816, 237, 'Kasai-Oriental', 'KE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3696, 3817, 237, 'Kinshasa', 'KN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3697, 3818, 237, 'Kasai-Occidental', 'KW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3698, 3819, 237, 'Maniema', 'MA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3699, 3820, 237, 'Nord-Kivu', 'NK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3700, 3821, 237, 'Orientale', 'OR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3701, 3822, 237, 'Sud-Kivu', 'SK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3702, 3823, 238, 'Central', 'CE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3703, 3824, 238, 'Copperbelt', 'CB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3704, 3825, 238, 'Eastern', 'EA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3705, 3826, 238, 'Luapula', 'LP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3706, 3827, 238, 'Lusaka', 'LK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3707, 3828, 238, 'Northern', 'NO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3708, 3829, 238, 'North-Western', 'NW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3709, 3830, 238, 'Southern', 'SO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3710, 3831, 238, 'Western', 'WE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3711, 3832, 239, 'Bulawayo', 'BU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3712, 3833, 239, 'Harare', 'HA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3713, 3834, 239, 'Manicaland', 'ML', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3714, 3835, 239, 'Mashonaland Central', 'MC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3715, 3836, 239, 'Mashonaland East', 'ME', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);
INSERT INTO `shopping_zone` (`id`, `zone_id`, `country_id`, `name`, `code`, `shipping_cost`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3716, 3837, 239, 'Mashonaland West', 'MW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3717, 3838, 239, 'Masvingo', 'MV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3718, 3839, 239, 'Matabeleland North', 'MN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3719, 3840, 239, 'Matabeleland South', 'MS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3720, 3841, 239, 'Midlands', 'MD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3721, 3842, 105, 'Agrigento', 'AG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3722, 3843, 105, 'Alessandria', 'AL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3723, 3844, 105, 'Ancona', 'AN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3724, 3845, 105, 'Aosta', 'AO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3725, 3846, 105, 'Arezzo', 'AR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3726, 3847, 105, 'Ascoli Piceno', 'AP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3727, 3848, 105, 'Asti', 'AT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3728, 3849, 105, 'Avellino', 'AV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3729, 3850, 105, 'Bari', 'BA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3730, 3851, 105, 'Belluno', 'BL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3731, 3852, 105, 'Benevento', 'BN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3732, 3853, 105, 'Bergamo', 'BG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3733, 3854, 105, 'Biella', 'BI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3734, 3855, 105, 'Bologna', 'BO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3735, 3856, 105, 'Bolzano', 'BZ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3736, 3857, 105, 'Brescia', 'BS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3737, 3858, 105, 'Brindisi', 'BR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3738, 3859, 105, 'Cagliari', 'CA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3739, 3860, 105, 'Caltanissetta', 'CL', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3740, 3861, 105, 'Campobasso', 'CB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3741, 3862, 105, 'Carbonia-Iglesias', 'CI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3742, 3863, 105, 'Caserta', 'CE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3743, 3864, 105, 'Catania', 'CT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3744, 3865, 105, 'Catanzaro', 'CZ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3745, 3866, 105, 'Chieti', 'CH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3746, 3867, 105, 'Como', 'CO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3747, 3868, 105, 'Cosenza', 'CS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3748, 3869, 105, 'Cremona', 'CR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3749, 3870, 105, 'Crotone', 'KR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3750, 3871, 105, 'Cuneo', 'CN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3751, 3872, 105, 'Enna', 'EN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3752, 3873, 105, 'Ferrara', 'FE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3753, 3874, 105, 'Firenze', 'FI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3754, 3875, 105, 'Foggia', 'FG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3755, 3876, 105, 'Forli-Cesena', 'FC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3756, 3877, 105, 'Frosinone', 'FR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3757, 3878, 105, 'Genova', 'GE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3758, 3879, 105, 'Gorizia', 'GO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3759, 3880, 105, 'Grosseto', 'GR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3760, 3881, 105, 'Imperia', 'IM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3761, 3882, 105, 'Isernia', 'IS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3762, 3883, 105, 'L&#39;Aquila', 'AQ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3763, 3884, 105, 'La Spezia', 'SP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3764, 3885, 105, 'Latina', 'LT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3765, 3886, 105, 'Lecce', 'LE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3766, 3887, 105, 'Lecco', 'LC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3767, 3888, 105, 'Livorno', 'LI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3768, 3889, 105, 'Lodi', 'LO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3769, 3890, 105, 'Lucca', 'LU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3770, 3891, 105, 'Macerata', 'MC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3771, 3892, 105, 'Mantova', 'MN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3772, 3893, 105, 'Massa-Carrara', 'MS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3773, 3894, 105, 'Matera', 'MT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3774, 3895, 105, 'Medio Campidano', 'VS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3775, 3896, 105, 'Messina', 'ME', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3776, 3897, 105, 'Milano', 'MI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3777, 3898, 105, 'Modena', 'MO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3778, 3899, 105, 'Napoli', 'NA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3779, 3900, 105, 'Novara', 'NO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3780, 3901, 105, 'Nuoro', 'NU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3781, 3902, 105, 'Ogliastra', 'OG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3782, 3903, 105, 'Olbia-Tempio', 'OT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3783, 3904, 105, 'Oristano', 'OR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3784, 3905, 105, 'Padova', 'PD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3785, 3906, 105, 'Palermo', 'PA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3786, 3907, 105, 'Parma', 'PR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3787, 3908, 105, 'Pavia', 'PV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3788, 3909, 105, 'Perugia', 'PG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3789, 3910, 105, 'Pesaro e Urbino', 'PU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3790, 3911, 105, 'Pescara', 'PE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3791, 3912, 105, 'Piacenza', 'PC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3792, 3913, 105, 'Pisa', 'PI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3793, 3914, 105, 'Pistoia', 'PT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3794, 3915, 105, 'Pordenone', 'PN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3795, 3916, 105, 'Potenza', 'PZ', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3796, 3917, 105, 'Prato', 'PO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3797, 3918, 105, 'Ragusa', 'RG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3798, 3919, 105, 'Ravenna', 'RA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3799, 3920, 105, 'Reggio Calabria', 'RC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3800, 3921, 105, 'Reggio Emilia', 'RE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3801, 3922, 105, 'Rieti', 'RI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3802, 3923, 105, 'Rimini', 'RN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3803, 3924, 105, 'Roma', 'RM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3804, 3925, 105, 'Rovigo', 'RO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3805, 3926, 105, 'Salerno', 'SA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3806, 3927, 105, 'Sassari', 'SS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3807, 3928, 105, 'Savona', 'SV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3808, 3929, 105, 'Siena', 'SI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3809, 3930, 105, 'Siracusa', 'SR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3810, 3931, 105, 'Sondrio', 'SO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3811, 3932, 105, 'Taranto', 'TA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3812, 3933, 105, 'Teramo', 'TE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3813, 3934, 105, 'Terni', 'TR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3814, 3935, 105, 'Torino', 'TO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3815, 3936, 105, 'Trapani', 'TP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3816, 3937, 105, 'Trento', 'TN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3817, 3938, 105, 'Treviso', 'TV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3818, 3939, 105, 'Trieste', 'TS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3819, 3940, 105, 'Udine', 'UD', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3820, 3941, 105, 'Varese', 'VA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3821, 3942, 105, 'Venezia', 'VE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3822, 3943, 105, 'Verbano-Cusio-Ossola', 'VB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3823, 3944, 105, 'Vercelli', 'VC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3824, 3945, 105, 'Verona', 'VR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3825, 3946, 105, 'Vibo Valentia', 'VV', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3826, 3947, 105, 'Vicenza', 'VI', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3827, 3948, 105, 'Viterbo', 'VT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3828, 3949, 222, 'County Antrim', 'ANT', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3829, 3950, 222, 'County Armagh', 'ARM', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3830, 3951, 222, 'County Down', 'DOW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3831, 3952, 222, 'County Fermanagh', 'FER', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3832, 3953, 222, 'County Londonderry', 'LDY', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3833, 3954, 222, 'County Tyrone', 'TYR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3834, 3955, 222, 'Cumbria', 'CMA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3835, 3956, 190, 'Pomurska', '1', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3836, 3957, 190, 'Podravska', '2', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3837, 3958, 190, 'Koroška', '3', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3838, 3959, 190, 'Savinjska', '4', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3839, 3960, 190, 'Zasavska', '5', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3840, 3961, 190, 'Spodnjeposavska', '6', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3841, 3962, 190, 'Jugovzhodna Slovenija', '7', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3842, 3963, 190, 'Osrednjeslovenska', '8', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3843, 3964, 190, 'Gorenjska', '9', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3844, 3965, 190, 'Notranjsko-kraška', '10', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3845, 3966, 190, 'Goriška', '11', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3846, 3967, 190, 'Obalno-kraška', '12', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3847, 3968, 33, 'Ruse', '', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3848, 3969, 101, 'Alborz', 'ALB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3849, 3970, 21, 'Brussels-Capital Region', 'BRU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3850, 3971, 138, 'Aguascalientes', 'AG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3851, 3973, 242, 'Andrijevica', '1', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3852, 3974, 242, 'Bar', '2', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3853, 3975, 242, 'Berane', '3', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3854, 3976, 242, 'Bijelo Polje', '4', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3855, 3977, 242, 'Budva', '5', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3856, 3978, 242, 'Cetinje', '6', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3857, 3979, 242, 'Danilovgrad', '7', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3858, 3980, 242, 'Herceg-Novi', '8', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3859, 3981, 242, 'Kolašin', '9', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3860, 3982, 242, 'Kotor', '10', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3861, 3983, 242, 'Mojkovac', '11', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3862, 3984, 242, 'Nikšić', '12', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3863, 3985, 242, 'Plav', '13', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3864, 3986, 242, 'Pljevlja', '14', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3865, 3987, 242, 'Plužine', '15', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3866, 3988, 242, 'Podgorica', '16', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3867, 3989, 242, 'Rožaje', '17', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3868, 3990, 242, 'Šavnik', '18', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3869, 3991, 242, 'Tivat', '19', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3870, 3992, 242, 'Ulcinj', '20', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3871, 3993, 242, 'Žabljak', '21', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3872, 3994, 243, 'Belgrade', '0', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3873, 3995, 243, 'North Bačka', '1', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3874, 3996, 243, 'Central Banat', '2', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3875, 3997, 243, 'North Banat', '3', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3876, 3998, 243, 'South Banat', '4', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3877, 3999, 243, 'West Bačka', '5', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3878, 4000, 243, 'South Bačka', '6', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3879, 4001, 243, 'Srem', '7', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3880, 4002, 243, 'Mačva', '8', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3881, 4003, 243, 'Kolubara', '9', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3882, 4004, 243, 'Podunavlje', '10', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3883, 4005, 243, 'Braničevo', '11', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3884, 4006, 243, 'Šumadija', '12', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3885, 4007, 243, 'Pomoravlje', '13', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3886, 4008, 243, 'Bor', '14', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3887, 4009, 243, 'Zaječar', '15', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3888, 4010, 243, 'Zlatibor', '16', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3889, 4011, 243, 'Moravica', '17', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3890, 4012, 243, 'Raška', '18', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3891, 4013, 243, 'Rasina', '19', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3892, 4014, 243, 'Nišava', '20', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3893, 4015, 243, 'Toplica', '21', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3894, 4016, 243, 'Pirot', '22', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3895, 4017, 243, 'Jablanica', '23', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3896, 4018, 243, 'Pčinja', '24', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3897, 4020, 245, 'Bonaire', 'BO', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3898, 4021, 245, 'Saba', 'SA', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3899, 4022, 245, 'Sint Eustatius', 'SE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3900, 4023, 248, 'Central Equatoria', 'EC', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3901, 4024, 248, 'Eastern Equatoria', 'EE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3902, 4025, 248, 'Jonglei', 'JG', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3903, 4026, 248, 'Lakes', 'LK', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3904, 4027, 248, 'Northern Bahr el-Ghazal', 'BN', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3905, 4028, 248, 'Unity', 'UY', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3906, 4029, 248, 'Upper Nile', 'NU', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3907, 4030, 248, 'Warrap', 'WR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3908, 4031, 248, 'Western Bahr el-Ghazal', 'BW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3909, 4032, 248, 'Western Equatoria', 'EW', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3910, 4035, 129, 'Putrajaya', 'MY-16', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3911, 4036, 117, 'Ainaži, Salacgrīvas novads', '661405', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3912, 4037, 117, 'Aizkraukle, Aizkraukles novads', '320201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3913, 4038, 117, 'Aizkraukles novads', '320200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3914, 4039, 117, 'Aizpute, Aizputes novads', '640605', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3915, 4040, 117, 'Aizputes novads', '640600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3916, 4041, 117, 'Aknīste, Aknīstes novads', '560805', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3917, 4042, 117, 'Aknīstes novads', '560800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3918, 4043, 117, 'Aloja, Alojas novads', '661007', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3919, 4044, 117, 'Alojas novads', '661000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3920, 4045, 117, 'Alsungas novads', '624200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3921, 4046, 117, 'Alūksne, Alūksnes novads', '360201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3922, 4047, 117, 'Alūksnes novads', '360200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3923, 4048, 117, 'Amatas novads', '424701', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3924, 4049, 117, 'Ape, Apes novads', '360805', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3925, 4050, 117, 'Apes novads', '360800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3926, 4051, 117, 'Auce, Auces novads', '460805', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3927, 4052, 117, 'Auces novads', '460800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3928, 4053, 117, 'Ādažu novads', '804400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3929, 4054, 117, 'Babītes novads', '804900', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3930, 4055, 117, 'Baldone, Baldones novads', '800605', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3931, 4056, 117, 'Baldones novads', '800600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3932, 4057, 117, 'Baloži, Ķekavas novads', '800807', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3933, 4058, 117, 'Baltinavas novads', '384400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3934, 4059, 117, 'Balvi, Balvu novads', '380201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3935, 4060, 117, 'Balvu novads', '380200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3936, 4061, 117, 'Bauska, Bauskas novads', '400201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3937, 4062, 117, 'Bauskas novads', '400200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3938, 4063, 117, 'Beverīnas novads', '964700', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3939, 4064, 117, 'Brocēni, Brocēnu novads', '840605', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3940, 4065, 117, 'Brocēnu novads', '840601', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3941, 4066, 117, 'Burtnieku novads', '967101', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3942, 4067, 117, 'Carnikavas novads', '805200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3943, 4068, 117, 'Cesvaine, Cesvaines novads', '700807', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3944, 4069, 117, 'Cesvaines novads', '700800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3945, 4070, 117, 'Cēsis, Cēsu novads', '420201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3946, 4071, 117, 'Cēsu novads', '420200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3947, 4072, 117, 'Ciblas novads', '684901', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3948, 4073, 117, 'Dagda, Dagdas novads', '601009', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3949, 4074, 117, 'Dagdas novads', '601000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3950, 4075, 117, 'Daugavpils', '50000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3951, 4076, 117, 'Daugavpils novads', '440200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3952, 4077, 117, 'Dobele, Dobeles novads', '460201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3953, 4078, 117, 'Dobeles novads', '460200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3954, 4079, 117, 'Dundagas novads', '885100', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3955, 4080, 117, 'Durbe, Durbes novads', '640807', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3956, 4081, 117, 'Durbes novads', '640801', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3957, 4082, 117, 'Engures novads', '905100', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3958, 4083, 117, 'Ērgļu novads', '705500', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3959, 4084, 117, 'Garkalnes novads', '806000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3960, 4085, 117, 'Grobiņa, Grobiņas novads', '641009', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3961, 4086, 117, 'Grobiņas novads', '641000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3962, 4087, 117, 'Gulbene, Gulbenes novads', '500201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3963, 4088, 117, 'Gulbenes novads', '500200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3964, 4089, 117, 'Iecavas novads', '406400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3965, 4090, 117, 'Ikšķile, Ikšķiles novads', '740605', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3966, 4091, 117, 'Ikšķiles novads', '740600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3967, 4092, 117, 'Ilūkste, Ilūkstes novads', '440807', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3968, 4093, 117, 'Ilūkstes novads', '440801', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3969, 4094, 117, 'Inčukalna novads', '801800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3970, 4095, 117, 'Jaunjelgava, Jaunjelgavas novads', '321007', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3971, 4096, 117, 'Jaunjelgavas novads', '321000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3972, 4097, 117, 'Jaunpiebalgas novads', '425700', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3973, 4098, 117, 'Jaunpils novads', '905700', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3974, 4099, 117, 'Jelgava', '90000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3975, 4100, 117, 'Jelgavas novads', '540200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3976, 4101, 117, 'Jēkabpils', '110000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3977, 4102, 117, 'Jēkabpils novads', '560200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3978, 4103, 117, 'Jūrmala', '130000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3979, 4104, 117, 'Kalnciems, Jelgavas novads', '540211', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3980, 4105, 117, 'Kandava, Kandavas novads', '901211', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3981, 4106, 117, 'Kandavas novads', '901201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3982, 4107, 117, 'Kārsava, Kārsavas novads', '681009', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3983, 4108, 117, 'Kārsavas novads', '681000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3984, 4109, 117, 'Kocēnu novads ,bij. Valmieras)', '960200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3985, 4110, 117, 'Kokneses novads', '326100', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3986, 4111, 117, 'Krāslava, Krāslavas novads', '600201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3987, 4112, 117, 'Krāslavas novads', '600202', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3988, 4113, 117, 'Krimuldas novads', '806900', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3989, 4114, 117, 'Krustpils novads', '566900', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3990, 4115, 117, 'Kuldīga, Kuldīgas novads', '620201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3991, 4116, 117, 'Kuldīgas novads', '620200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3992, 4117, 117, 'Ķeguma novads', '741001', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3993, 4118, 117, 'Ķegums, Ķeguma novads', '741009', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3994, 4119, 117, 'Ķekavas novads', '800800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3995, 4120, 117, 'Lielvārde, Lielvārdes novads', '741413', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3996, 4121, 117, 'Lielvārdes novads', '741401', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3997, 4122, 117, 'Liepāja', '170000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3998, 4123, 117, 'Limbaži, Limbažu novads', '660201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(3999, 4124, 117, 'Limbažu novads', '660200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4000, 4125, 117, 'Līgatne, Līgatnes novads', '421211', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4001, 4126, 117, 'Līgatnes novads', '421200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4002, 4127, 117, 'Līvāni, Līvānu novads', '761211', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4003, 4128, 117, 'Līvānu novads', '761201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4004, 4129, 117, 'Lubāna, Lubānas novads', '701413', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4005, 4130, 117, 'Lubānas novads', '701400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4006, 4131, 117, 'Ludza, Ludzas novads', '680201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4007, 4132, 117, 'Ludzas novads', '680200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4008, 4133, 117, 'Madona, Madonas novads', '700201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4009, 4134, 117, 'Madonas novads', '700200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4010, 4135, 117, 'Mazsalaca, Mazsalacas novads', '961011', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4011, 4136, 117, 'Mazsalacas novads', '961000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4012, 4137, 117, 'Mālpils novads', '807400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4013, 4138, 117, 'Mārupes novads', '807600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4014, 4139, 117, 'Mērsraga novads', '887600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4015, 4140, 117, 'Naukšēnu novads', '967300', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4016, 4141, 117, 'Neretas novads', '327100', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4017, 4142, 117, 'Nīcas novads', '647900', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4018, 4143, 117, 'Ogre, Ogres novads', '740201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4019, 4144, 117, 'Ogres novads', '740202', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4020, 4145, 117, 'Olaine, Olaines novads', '801009', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4021, 4146, 117, 'Olaines novads', '801000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4022, 4147, 117, 'Ozolnieku novads', '546701', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4023, 4148, 117, 'Pārgaujas novads', '427500', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4024, 4149, 117, 'Pāvilosta, Pāvilostas novads', '641413', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4025, 4150, 117, 'Pāvilostas novads', '641401', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4026, 4151, 117, 'Piltene, Ventspils novads', '980213', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4027, 4152, 117, 'Pļaviņas, Pļaviņu novads', '321413', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4028, 4153, 117, 'Pļaviņu novads', '321400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4029, 4154, 117, 'Preiļi, Preiļu novads', '760201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4030, 4155, 117, 'Preiļu novads', '760202', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4031, 4156, 117, 'Priekule, Priekules novads', '641615', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4032, 4157, 117, 'Priekules novads', '641600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4033, 4158, 117, 'Priekuļu novads', '427300', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4034, 4159, 117, 'Raunas novads', '427700', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4035, 4160, 117, 'Rēzekne', '210000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4036, 4161, 117, 'Rēzeknes novads', '780200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4037, 4162, 117, 'Riebiņu novads', '766300', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4038, 4163, 117, 'Rīga', '10000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4039, 4164, 117, 'Rojas novads', '888300', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4040, 4165, 117, 'Ropažu novads', '808400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4041, 4166, 117, 'Rucavas novads', '648500', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4042, 4167, 117, 'Rugāju novads', '387500', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4043, 4168, 117, 'Rundāles novads', '407700', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4044, 4169, 117, 'Rūjiena, Rūjienas novads', '961615', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4045, 4170, 117, 'Rūjienas novads', '961600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4046, 4171, 117, 'Sabile, Talsu novads', '880213', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4047, 4172, 117, 'Salacgrīva, Salacgrīvas novads', '661415', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4048, 4173, 117, 'Salacgrīvas novads', '661400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4049, 4174, 117, 'Salas novads', '568700', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4050, 4175, 117, 'Salaspils novads', '801200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4051, 4176, 117, 'Salaspils, Salaspils novads', '801211', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4052, 4177, 117, 'Saldus novads', '840200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4053, 4178, 117, 'Saldus, Saldus novads', '840201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4054, 4179, 117, 'Saulkrasti, Saulkrastu novads', '801413', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4055, 4180, 117, 'Saulkrastu novads', '801400', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4056, 4181, 117, 'Seda, Strenču novads', '941813', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4057, 4182, 117, 'Sējas novads', '809200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4058, 4183, 117, 'Sigulda, Siguldas novads', '801615', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4059, 4184, 117, 'Siguldas novads', '801601', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4060, 4185, 117, 'Skrīveru novads', '328200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4061, 4186, 117, 'Skrunda, Skrundas novads', '621209', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4062, 4187, 117, 'Skrundas novads', '621200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4063, 4188, 117, 'Smiltene, Smiltenes novads', '941615', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4064, 4189, 117, 'Smiltenes novads', '941600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4065, 4190, 117, 'Staicele, Alojas novads', '661017', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4066, 4191, 117, 'Stende, Talsu novads', '880215', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4067, 4192, 117, 'Stopiņu novads', '809600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4068, 4193, 117, 'Strenči, Strenču novads', '941817', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4069, 4194, 117, 'Strenču novads', '941800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4070, 4195, 117, 'Subate, Ilūkstes novads', '440815', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4071, 4196, 117, 'Talsi, Talsu novads', '880201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4072, 4197, 117, 'Talsu novads', '880200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4073, 4198, 117, 'Tērvetes novads', '468900', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4074, 4199, 117, 'Tukuma novads', '900200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4075, 4200, 117, 'Tukums, Tukuma novads', '900201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4076, 4201, 117, 'Vaiņodes novads', '649300', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4077, 4202, 117, 'Valdemārpils, Talsu novads', '880217', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4078, 4203, 117, 'Valka, Valkas novads', '940201', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4079, 4204, 117, 'Valkas novads', '940200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4080, 4205, 117, 'Valmiera', '250000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4081, 4206, 117, 'Vangaži, Inčukalna novads', '801817', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4082, 4207, 117, 'Varakļāni, Varakļānu novads', '701817', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4083, 4208, 117, 'Varakļānu novads', '701800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4084, 4209, 117, 'Vārkavas novads', '769101', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4085, 4210, 117, 'Vecpiebalgas novads', '429300', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4086, 4211, 117, 'Vecumnieku novads', '409500', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4087, 4212, 117, 'Ventspils', '270000', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4088, 4213, 117, 'Ventspils novads', '980200', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4089, 4214, 117, 'Viesīte, Viesītes novads', '561815', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4090, 4215, 117, 'Viesītes novads', '561800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4091, 4216, 117, 'Viļaka, Viļakas novads', '381615', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4092, 4217, 117, 'Viļakas novads', '381600', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4093, 4218, 117, 'Viļāni, Viļānu novads', '781817', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4094, 4219, 117, 'Viļānu novads', '781800', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4095, 4220, 117, 'Zilupe, Zilupes novads', '681817', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4096, 4221, 117, 'Zilupes novads', '681801', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4097, 4222, 43, 'Arica y Parinacota', 'AP', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4098, 4223, 43, 'Los Rios', 'LR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4099, 4224, 220, 'Kharkivs\'ka Oblast', '63', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4100, 4225, 118, 'Beirut', 'LB-BR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4101, 4226, 118, 'Bekaa', 'LB-BE', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4102, 4227, 118, 'Mount Lebanon', 'LB-ML', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4103, 4228, 118, 'Nabatieh', 'LB-NB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4104, 4229, 118, 'North', 'LB-NR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4105, 4230, 118, 'South', 'LB-ST', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4106, 4231, 99, 'Telangana', 'TS', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4107, 4232, 44, 'Qinghai', 'QH', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4108, 4233, 100, 'Papua Barat', 'PB', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4109, 4234, 100, 'Sulawesi Barat', 'SR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL),
(4110, 4235, 100, 'Kepulauan Riau', 'KR', 0, 1, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signup_bonus`
--

CREATE TABLE `signup_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pair_value` double DEFAULT '100',
  `pair_commission` text COLLATE utf8mb4_unicode_ci,
  `pair_commission_percent` text COLLATE utf8mb4_unicode_ci,
  `binary_cap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `ceiling` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `signup_bonus`
--

INSERT INTO `signup_bonus` (`id`, `period`, `type`, `pair_value`, `pair_commission`, `pair_commission_percent`, `binary_cap`, `ceiling`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'instant', 'fixed', 100, '[\"10\",\"20\",\"30\"]', '[\"10\",\"20\",\"30\"]', 'no', 10, '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signup_bonus_setting`
--

CREATE TABLE `signup_bonus_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualify_personal_sv` double NOT NULL,
  `income` double NOT NULL,
  `capping` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup_bonus_setting`
--

INSERT INTO `signup_bonus_setting` (`id`, `rank`, `qualify_personal_sv`, `income`, `capping`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gold Star', 172800, 3, 'unlimitted', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsortree`
--

CREATE TABLE `sponsortree` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsortree`
--

INSERT INTO `sponsortree` (`id`, `user_id`, `sponsor`, `position`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 1, 'yes', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 0, 1, 1, 'vaccant', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_commission`
--

CREATE TABLE `sponsor_commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_commission` double DEFAULT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sponsor_commission`
--

INSERT INTO `sponsor_commission` (`id`, `type`, `criteria`, `sponsor_commission`, `period`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fixed', 'yes', 5, 'instant', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_commission_pending`
--

CREATE TABLE `sponsor_commission_pending` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sv` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stage_name`, `created_at`, `updated_at`) VALUES
(1, 'BRONZE', '2020-10-29 11:35:03', '2020-10-29 11:35:03'),
(2, 'SILVER', '2020-10-29 11:35:03', '2020-10-29 11:35:03'),
(3, 'GOLD', '2020-10-29 11:35:03', '2020-10-29 11:35:03'),
(4, 'PLATINUM', '2020-10-29 11:35:03', '2020-10-29 11:35:03'),
(5, 'DIAMOND', '2020-10-29 11:35:03', '2020-10-29 11:35:03'),
(6, 'DIAMOND 1', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_languages`
--

CREATE TABLE `system_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `system_languages`
--

INSERT INTO `system_languages` (`id`, `language`, `locale`, `status`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Azerbaijan', 'az', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Albanian', 'sq', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'Amharic', 'am', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'English', 'en', 'yes', 'yes', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'Arabic', 'ar', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'Armenian', 'hy', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'Afrikaans', 'af', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(8, 'Basque', 'eu', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(9, 'Bashkir', 'ba', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(10, 'Belarusian', 'be', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(11, 'Bengali', 'bn', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(12, 'Bulgarian', 'bg', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(13, 'Bosnian', 'bs', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(14, 'Welsh', 'cy', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(15, 'Hungarian', 'hu', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(16, 'Vietnamese', 'vi', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(17, 'Haitian', 'ht', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(18, 'Galician', 'gl', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(19, 'Dutch', 'nl', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(20, 'Hill Mari', 'mrj', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(21, 'Greek', 'el', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(22, 'Georgian', 'ka', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(23, 'Gujarati', 'gu', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(24, 'Danish', 'da', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(25, 'Hebrew', 'he', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(26, 'Yiddish', 'yi', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(27, 'Indonesian', 'id', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(28, 'Irish', 'ga', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(29, 'Italian', 'it', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(30, 'Icelandic', 'is', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(31, 'Spanish', 'es', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(32, 'Kazakh', 'kk', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(33, 'Kannada', 'kn', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(34, 'Catalan', 'ca', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(35, 'Kyrgyz', 'ky', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(36, 'Chinese', 'zh', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(37, 'Korean', 'ko', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(38, 'Xhosa', 'xh', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(39, 'Latin', 'la', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(40, 'Latvian', 'lv', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(41, 'Lithuanian', 'lt', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(42, 'Malagasy', 'mg', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(43, 'Malay', 'ms', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(44, 'Malayalam', 'ml', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(45, 'Maltese', 'mt', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(46, 'Macedonian', 'mk', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(47, 'Maori', 'mi', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(48, 'Marathi', 'mr', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(49, 'Mari', 'mhr', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(50, 'Mongolian', 'mn', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(51, 'German', 'de', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(52, 'Nepali', 'ne', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(53, 'Norwegian', 'no', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(54, 'Punjabi', 'pa', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(55, 'Papiamento', 'pap', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(56, 'Persian', 'fa', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(57, 'Polish', 'pl', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(58, 'Portuguese', 'pt', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(59, 'Romanian', 'ro', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(60, 'Russian', 'ru', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(61, 'Cebuano', 'ceb', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(62, 'Serbian', 'sr', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(63, 'Sinhala', 'si', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(64, 'Slovakian', 'sk', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(65, 'Slovenian', 'sl', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(66, 'Swahili', 'sw', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(67, 'Sundanese', 'su', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(68, 'Tajik', 'tg', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(69, 'Thai', 'th', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(70, 'Tagalog', 'tl', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(71, 'Tamil', 'tl', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(72, 'Tatar', 'tt', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(73, 'Telugu', 'te', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(74, 'Turkish', 'tr', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(75, 'Udmurt', 'udm', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(76, 'Uzbek', 'uz', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(77, 'Ukrainian', 'uk', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(78, 'Urdu', 'ur', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(79, 'Finnish', 'fi', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(80, 'French', 'fr', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(81, 'Hindi', 'hi', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(82, 'Croatian', 'hr', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(83, 'Czech', 'cs', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(84, 'Swedish', 'sv', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(85, 'Scottish', 'gd', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(86, 'Estonian', 'et', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(87, 'Esperanto', 'eo', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(88, 'Javanese', 'jv', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(89, 'Japanese', 'ja', 'no', 'no', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_details`
--

CREATE TABLE `temp_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `regdetails` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystatus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_details`
--

INSERT INTO `temp_details` (`id`, `regdetails`, `paystatus`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '0', NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_reg_details`
--

CREATE TABLE `temp_reg_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `regdetails` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystatus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `department` int(10) UNSIGNED DEFAULT NULL,
  `priority` int(10) UNSIGNED DEFAULT NULL,
  `category` int(10) UNSIGNED DEFAULT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `ratingreply` tinyint(1) NOT NULL,
  `flags` int(11) NOT NULL,
  `ip_address` int(11) NOT NULL,
  `isoverdue` int(11) NOT NULL,
  `reopened` int(11) NOT NULL,
  `isanswered` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `reopened_at` datetime DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `last_message_at` datetime DEFAULT NULL,
  `last_response_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_canned_responses`
--

CREATE TABLE `ticket_canned_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `category`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bug', 'Bug', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Feature Request', 'Feature Request', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'Sales Question', 'Sales Question', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Cancellation', 'Cancellation', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'Technical Issue', 'Technical Issue', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_departments`
--

CREATE TABLE `ticket_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_departments`
--

INSERT INTO `ticket_departments` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FINANCE', 'Dealing with payout	', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'MARKETING', 'Marketing  section	', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'TECHNICAL', 'Technical', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_faqs`
--

CREATE TABLE `ticket_faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `faq` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_urgency` tinyint(1) NOT NULL,
  `ispublic` tinyint(1) NOT NULL,
  `is_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `priority`, `status`, `priority_desc`, `priority_color`, `priority_urgency`, `ispublic`, `is_default`, `admin_note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Low', '1', 'Low', '#00a65a', 4, 1, '', '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Normal', '1', 'Normal', '#00bfef', 3, 1, '1', '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'High', '1', 'High', '#f39c11', 2, 1, '', '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Emergency', '1', 'Emergency', '#dd4b38', 1, 1, '', '', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longblob,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flags` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `email_user` int(11) NOT NULL,
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `properties` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `name`, `state`, `mode`, `message`, `flags`, `sort`, `email_user`, `icon_class`, `properties`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Open', 'open', 3, 'Ticket have been Reopened by', 0, 1, 0, '', 'Open tickets.', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(2, 'Resolved', 'closed', 1, 'Ticket have been Resolved by', 0, 2, 0, '', 'Resolved tickets.', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(3, 'Closed', 'closed', 3, 'Ticket have been Closed by', 0, 3, 0, '', 'Closed tickets. Tickets will still be accessible on client and staff panels.', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(4, 'Archived', 'archived', 3, 'Ticket have been Archived by', 0, 4, 0, '', 'Tickets only adminstratively available but no longer accessible on ticket queues and client panel.', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(5, 'Deleted', 'deleted', 3, 'Ticket have been Deleted by', 0, 5, 0, '', 'Tickets queued for deletion. Not accessible on ticket queues.', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(6, 'Unverified', 'unverified', 3, 'User account verification required.', 0, 6, 0, '', 'Ticket will be open after user verifies his/her account.', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL),
(7, 'Request Approval', 'unverified', 3, 'Approval requested by', 0, 7, 0, '', 'Ticket will be approve  after Admin verifies  this ticket', '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_tags`
--

CREATE TABLE `ticket_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ispublic` tinyint(1) NOT NULL,
  `is_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'payout',
  `wallet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_responce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tree_table`
--

CREATE TABLE `tree_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table`
--

INSERT INTO `tree_table` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 1, '1', 'yes', '2020-10-29 11:34:59', '2020-10-29 11:34:59'),
(2, 0, 1, 1, 1, '1', 'vaccant', '2020-10-29 11:34:59', '2020-10-29 11:34:59'),
(3, 0, 1, 1, 1, '2', 'vaccant', '2020-10-29 11:34:59', '2020-10-29 11:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table2`
--

CREATE TABLE `tree_table2` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table2`
--

INSERT INTO `tree_table2` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table3`
--

CREATE TABLE `tree_table3` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table3`
--

INSERT INTO `tree_table3` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table4`
--

CREATE TABLE `tree_table4` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table4`
--

INSERT INTO `tree_table4` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table5`
--

CREATE TABLE `tree_table5` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table5`
--

INSERT INTO `tree_table5` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table6`
--

CREATE TABLE `tree_table6` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table6`
--

INSERT INTO `tree_table6` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table7`
--

CREATE TABLE `tree_table7` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table7`
--

INSERT INTO `tree_table7` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table8`
--

CREATE TABLE `tree_table8` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table8`
--

INSERT INTO `tree_table8` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table9`
--

CREATE TABLE `tree_table9` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table9`
--

INSERT INTO `tree_table9` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table10`
--

CREATE TABLE `tree_table10` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table10`
--

INSERT INTO `tree_table10` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table11`
--

CREATE TABLE `tree_table11` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table11`
--

INSERT INTO `tree_table11` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table12`
--

CREATE TABLE `tree_table12` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table12`
--

INSERT INTO `tree_table12` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table13`
--

CREATE TABLE `tree_table13` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table13`
--

INSERT INTO `tree_table13` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table14`
--

CREATE TABLE `tree_table14` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table14`
--

INSERT INTO `tree_table14` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table15`
--

CREATE TABLE `tree_table15` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table15`
--

INSERT INTO `tree_table15` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table16`
--

CREATE TABLE `tree_table16` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table16`
--

INSERT INTO `tree_table16` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table17`
--

CREATE TABLE `tree_table17` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table17`
--

INSERT INTO `tree_table17` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `tree_table18`
--

CREATE TABLE `tree_table18` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `cyclecount` int(11) NOT NULL DEFAULT '1',
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vaccant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree_table18`
--

INSERT INTO `tree_table18` (`id`, `user_id`, `sponsor`, `placement_id`, `cyclecount`, `leg`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 1, '1', 'vaccant', '2020-10-29 11:35:03', '2020-10-29 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_pass` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_id` int(11) NOT NULL,
  `monthly_maintenance` int(11) NOT NULL DEFAULT '1',
  `rank_update_date` date NOT NULL,
  `register_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `black_list` int(11) NOT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `approved` int(11) NOT NULL DEFAULT '0',
  `file_upload` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hypperwallet_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `hypperwalletid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `enable_2fa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `approve` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `left_rf_count` int(11) NOT NULL,
  `right_rf_count` int(11) NOT NULL,
  `left_user_id` int(11) NOT NULL,
  `right_user_id` int(11) NOT NULL,
  `sp_package_empty` int(11) NOT NULL,
  `bitcoin_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `transaction_pass`, `rank_id`, `monthly_maintenance`, `rank_update_date`, `register_by`, `confirmation_code`, `confirmed`, `admin`, `black_list`, `shipping_state`, `active`, `approved`, `file_upload`, `hypperwallet_token`, `hypperwalletid`, `enable_2fa`, `shipping_country`, `remember_token`, `id_number`, `account_number`, `branch`, `next_of_kin`, `info`, `date_of_birth`, `created_at`, `updated_at`, `deleted_at`, `approve`, `post_id`, `status`, `left_rf_count`, `right_rf_count`, `left_user_id`, `right_user_id`, `sp_package_empty`, `bitcoin_address`, `bank_name`) VALUES
(1, 'John', 'Doe', 'admin', 'info@infinty-btc.com', NULL, '$2y$10$AF2hiGksduCGMfq8WxZFxuPaJGgPzNHm1uLHCFH1aSe0nLmXB6E82', '123456', 1, 1, '0000-00-00', '0', '39d270080146e49ab71941e02f052a81', 1, 1, 0, '', 'yes', 1, '', '0', '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL, 0, 0, 'null', 0, 0, 0, 0, 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `approved` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `user_id`, `account_type`, `account_no`, `status`, `approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'account', '1', 'yes', 'pending', '2020-10-29 11:35:03', '2020-10-29 11:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_balance`
--

CREATE TABLE `user_balance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `redemption_balance` double NOT NULL,
  `salary_balance` double NOT NULL,
  `reward_balance` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_balance`
--

INSERT INTO `user_balance` (`id`, `user_id`, `balance`, `redemption_balance`, `salary_balance`, `reward_balance`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 0, 0, '2020-10-29 11:34:59', '2020-10-29 11:34:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_doc`
--

CREATE TABLE `user_doc` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_docs`
--

CREATE TABLE `user_docs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `voucher_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `total_amount` double NOT NULL,
  `balance_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_history`
--

CREATE TABLE `voucher_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `voucher_id` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_by` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `used_for` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `used_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_request`
--

CREATE TABLE `voucher_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `count` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vue_crud`
--

CREATE TABLE `vue_crud` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_hyperwallet`
--

CREATE TABLE `_hyperwallet` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `program_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_response`
--
ALTER TABLE `auto_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_settings`
--
ALTER TABLE `backup_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binary_commission_settings`
--
ALTER TABLE `binary_commission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binary_pending`
--
ALTER TABLE `binary_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_ip`
--
ALTER TABLE `block_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_groups`
--
ALTER TABLE `campaign_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carry_forward_history`
--
ALTER TABLE `carry_forward_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_id_index` (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencies_code_index` (`code`);

--
-- Indexes for table `debit_table`
--
ALTER TABLE `debit_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_tracking_details`
--
ALTER TABLE `delivery_tracking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_sponsor_bonus`
--
ALTER TABLE `direct_sponsor_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_upload`
--
ALTER TABLE `document_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_marketing_autoresponders`
--
ALTER TABLE `email_marketing_autoresponders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_marketing_campaigns`
--
ALTER TABLE `email_marketing_campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_marketing_contacts`
--
ALTER TABLE `email_marketing_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_marketing_contacts_email_unique` (`email`),
  ADD UNIQUE KEY `email_marketing_contacts_mobile_unique` (`mobile`);

--
-- Indexes for table `email_marketing_contact_lists`
--
ALTER TABLE `email_marketing_contact_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_setting`
--
ALTER TABLE `email_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_videos`
--
ALTER TABLE `event_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewallet_settings`
--
ALTER TABLE `ewallet_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_transfer_debit_user_id_foreign` (`debit_user_id`),
  ADD KEY `fund_transfer_credit_user_id_foreign` (`credit_user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_table`
--
ALTER TABLE `invoice_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kb_article`
--
ALTER TABLE `kb_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_article_relationship`
--
ALTER TABLE `kb_article_relationship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_relationship_article_id_foreign` (`article_id`),
  ADD KEY `article_relationship_category_id_foreign` (`category_id`);

--
-- Indexes for table `kb_category`
--
ALTER TABLE `kb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_comment`
--
ALTER TABLE `kb_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_article_id_foreign` (`article_id`);

--
-- Indexes for table `kb_pages`
--
ALTER TABLE `kb_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_settings`
--
ALTER TABLE `kb_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leader_ship`
--
ALTER TABLE `leader_ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_capture`
--
ALTER TABLE `lead_capture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_commission_settings`
--
ALTER TABLE `level_commission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_settings`
--
ALTER TABLE `level_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_position`
--
ALTER TABLE `load_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty_bonus`
--
ALTER TABLE `loyalty_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty_users`
--
ALTER TABLE `loyalty_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ixk_ltm_translations_locale_group_key` (`locale`,`group`,`key`),
  ADD KEY `ix_ltm_translations_group` (`group`);

--
-- Indexes for table `ltm_user_locales`
--
ALTER TABLE `ltm_user_locales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_ltm_user_locales_user_id` (`user_id`);

--
-- Indexes for table `mail_table`
--
ALTER TABLE `mail_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matching_bonus`
--
ALTER TABLE `matching_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_settings`
--
ALTER TABLE `menu_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_unique` (`key`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_history`
--
ALTER TABLE `package_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pairing_history`
--
ALTER TABLE `pairing_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateway_details`
--
ALTER TABLE `payment_gateway_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_notification`
--
ALTER TABLE `payment_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_gateway_details`
--
ALTER TABLE `payout_gateway_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_history`
--
ALTER TABLE `payout_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_request`
--
ALTER TABLE `payout_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_types`
--
ALTER TABLE `payout_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_details`
--
ALTER TABLE `paypal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_binary_commission`
--
ALTER TABLE `pending_binary_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_commission`
--
ALTER TABLE `pending_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_commission1`
--
ALTER TABLE `pending_commission1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_table`
--
ALTER TABLE `pending_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_temp`
--
ALTER TABLE `pending_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_temp_order_id_unique` (`order_id`);

--
-- Indexes for table `pending_transactions`
--
ALTER TABLE `pending_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_transactions_order_id_unique` (`order_id`);

--
-- Indexes for table `point_history`
--
ALTER TABLE `point_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_table`
--
ALTER TABLE `point_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_name`
--
ALTER TABLE `post_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productaddcart`
--
ALTER TABLE `productaddcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_infos`
--
ALTER TABLE `profile_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_history_user_id_foreign` (`user_id`),
  ADD KEY `purchase_history_purchase_user_id_foreign` (`purchase_user_id`),
  ADD KEY `purchase_history_package_id_foreign` (`package_id`);

--
-- Indexes for table `rank_history`
--
ALTER TABLE `rank_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank_setting`
--
ALTER TABLE `rank_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rank_setting_rank_code_unique` (`rank_code`);

--
-- Indexes for table `reactivation`
--
ALTER TABLE `reactivation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redemption_commission`
--
ALTER TABLE `redemption_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_commission`
--
ALTER TABLE `reward_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riward_setting`
--
ALTER TABLE `riward_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_history`
--
ALTER TABLE `rs_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarysetting`
--
ALTER TABLE `salarysetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_commission`
--
ALTER TABLE `salary_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingaddress`
--
ALTER TABLE `shoppingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_country`
--
ALTER TABLE `shopping_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_zone`
--
ALTER TABLE `shopping_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_bonus`
--
ALTER TABLE `signup_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_bonus_setting`
--
ALTER TABLE `signup_bonus_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsortree`
--
ALTER TABLE `sponsortree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor_commission`
--
ALTER TABLE `sponsor_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor_commission_pending`
--
ALTER TABLE `sponsor_commission_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_email_index` (`email`);

--
-- Indexes for table `system_languages`
--
ALTER TABLE `system_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_details`
--
ALTER TABLE `temp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_reg_details`
--
ALTER TABLE `temp_reg_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department` (`department`),
  ADD KEY `priority` (`priority`),
  ADD KEY `category` (`category`),
  ADD KEY `type` (`type`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ticket_canned_responses`
--
ALTER TABLE `ticket_canned_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_faqs`
--
ALTER TABLE `ticket_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_tags`
--
ALTER TABLE `ticket_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_types`
--
ALTER TABLE `ticket_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table`
--
ALTER TABLE `tree_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table2`
--
ALTER TABLE `tree_table2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table3`
--
ALTER TABLE `tree_table3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table4`
--
ALTER TABLE `tree_table4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table5`
--
ALTER TABLE `tree_table5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table6`
--
ALTER TABLE `tree_table6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table7`
--
ALTER TABLE `tree_table7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table8`
--
ALTER TABLE `tree_table8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table9`
--
ALTER TABLE `tree_table9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table10`
--
ALTER TABLE `tree_table10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table11`
--
ALTER TABLE `tree_table11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table12`
--
ALTER TABLE `tree_table12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table13`
--
ALTER TABLE `tree_table13`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table14`
--
ALTER TABLE `tree_table14`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table15`
--
ALTER TABLE `tree_table15`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table16`
--
ALTER TABLE `tree_table16`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table17`
--
ALTER TABLE `tree_table17`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_table18`
--
ALTER TABLE `tree_table18`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_balance`
--
ALTER TABLE `user_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_doc`
--
ALTER TABLE `user_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_docs`
--
ALTER TABLE `user_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_history`
--
ALTER TABLE `voucher_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_request`
--
ALTER TABLE `voucher_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vue_crud`
--
ALTER TABLE `vue_crud`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vue_crud_title_unique` (`title`);

--
-- Indexes for table `_hyperwallet`
--
ALTER TABLE `_hyperwallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auto_response`
--
ALTER TABLE `auto_response`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `backup_settings`
--
ALTER TABLE `backup_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `binary_commission_settings`
--
ALTER TABLE `binary_commission_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `binary_pending`
--
ALTER TABLE `binary_pending`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `block_ip`
--
ALTER TABLE `block_ip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campaign_groups`
--
ALTER TABLE `campaign_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `carry_forward_history`
--
ALTER TABLE `carry_forward_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `debit_table`
--
ALTER TABLE `debit_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_tracking_details`
--
ALTER TABLE `delivery_tracking_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `direct_sponsor_bonus`
--
ALTER TABLE `direct_sponsor_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document_upload`
--
ALTER TABLE `document_upload`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_marketing_autoresponders`
--
ALTER TABLE `email_marketing_autoresponders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_marketing_campaigns`
--
ALTER TABLE `email_marketing_campaigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_marketing_contacts`
--
ALTER TABLE `email_marketing_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_marketing_contact_lists`
--
ALTER TABLE `email_marketing_contact_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_setting`
--
ALTER TABLE `email_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `event_videos`
--
ALTER TABLE `event_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ewallet_settings`
--
ALTER TABLE `ewallet_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_table`
--
ALTER TABLE `invoice_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kb_article`
--
ALTER TABLE `kb_article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kb_article_relationship`
--
ALTER TABLE `kb_article_relationship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kb_category`
--
ALTER TABLE `kb_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kb_comment`
--
ALTER TABLE `kb_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kb_pages`
--
ALTER TABLE `kb_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kb_settings`
--
ALTER TABLE `kb_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leader_ship`
--
ALTER TABLE `leader_ship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lead_capture`
--
ALTER TABLE `lead_capture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level_commission_settings`
--
ALTER TABLE `level_commission_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `level_settings`
--
ALTER TABLE `level_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `load_position`
--
ALTER TABLE `load_position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loyalty_bonus`
--
ALTER TABLE `loyalty_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loyalty_users`
--
ALTER TABLE `loyalty_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ltm_user_locales`
--
ALTER TABLE `ltm_user_locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail_table`
--
ALTER TABLE `mail_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matching_bonus`
--
ALTER TABLE `matching_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_settings`
--
ALTER TABLE `menu_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `package_history`
--
ALTER TABLE `package_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pairing_history`
--
ALTER TABLE `pairing_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_gateway_details`
--
ALTER TABLE `payment_gateway_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_notification`
--
ALTER TABLE `payment_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payout_gateway_details`
--
ALTER TABLE `payout_gateway_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payout_history`
--
ALTER TABLE `payout_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payout_request`
--
ALTER TABLE `payout_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payout_types`
--
ALTER TABLE `payout_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paypal_details`
--
ALTER TABLE `paypal_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_binary_commission`
--
ALTER TABLE `pending_binary_commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_commission`
--
ALTER TABLE `pending_commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_commission1`
--
ALTER TABLE `pending_commission1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_table`
--
ALTER TABLE `pending_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_temp`
--
ALTER TABLE `pending_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_transactions`
--
ALTER TABLE `pending_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `point_table`
--
ALTER TABLE `point_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_name`
--
ALTER TABLE `post_name`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productaddcart`
--
ALTER TABLE `productaddcart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_infos`
--
ALTER TABLE `profile_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rank_history`
--
ALTER TABLE `rank_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rank_setting`
--
ALTER TABLE `rank_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reactivation`
--
ALTER TABLE `reactivation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `redemption_commission`
--
ALTER TABLE `redemption_commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reward_commission`
--
ALTER TABLE `reward_commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riward_setting`
--
ALTER TABLE `riward_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rs_history`
--
ALTER TABLE `rs_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salarysetting`
--
ALTER TABLE `salarysetting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salary_commission`
--
ALTER TABLE `salary_commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shoppingaddress`
--
ALTER TABLE `shoppingaddress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shopping_country`
--
ALTER TABLE `shopping_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table `shopping_zone`
--
ALTER TABLE `shopping_zone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4111;
--
-- AUTO_INCREMENT for table `signup_bonus`
--
ALTER TABLE `signup_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `signup_bonus_setting`
--
ALTER TABLE `signup_bonus_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sponsortree`
--
ALTER TABLE `sponsortree`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sponsor_commission`
--
ALTER TABLE `sponsor_commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sponsor_commission_pending`
--
ALTER TABLE `sponsor_commission_pending`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_languages`
--
ALTER TABLE `system_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `temp_details`
--
ALTER TABLE `temp_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_reg_details`
--
ALTER TABLE `temp_reg_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_canned_responses`
--
ALTER TABLE `ticket_canned_responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket_faqs`
--
ALTER TABLE `ticket_faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ticket_tags`
--
ALTER TABLE `ticket_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tree_table`
--
ALTER TABLE `tree_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tree_table2`
--
ALTER TABLE `tree_table2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table3`
--
ALTER TABLE `tree_table3`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table4`
--
ALTER TABLE `tree_table4`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table5`
--
ALTER TABLE `tree_table5`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table6`
--
ALTER TABLE `tree_table6`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table7`
--
ALTER TABLE `tree_table7`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table8`
--
ALTER TABLE `tree_table8`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table9`
--
ALTER TABLE `tree_table9`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table10`
--
ALTER TABLE `tree_table10`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table11`
--
ALTER TABLE `tree_table11`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table12`
--
ALTER TABLE `tree_table12`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table13`
--
ALTER TABLE `tree_table13`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table14`
--
ALTER TABLE `tree_table14`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table15`
--
ALTER TABLE `tree_table15`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table16`
--
ALTER TABLE `tree_table16`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table17`
--
ALTER TABLE `tree_table17`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tree_table18`
--
ALTER TABLE `tree_table18`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_balance`
--
ALTER TABLE `user_balance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_doc`
--
ALTER TABLE `user_doc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_docs`
--
ALTER TABLE `user_docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `voucher_history`
--
ALTER TABLE `voucher_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `voucher_request`
--
ALTER TABLE `voucher_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vue_crud`
--
ALTER TABLE `vue_crud`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `_hyperwallet`
--
ALTER TABLE `_hyperwallet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  ADD CONSTRAINT `fund_transfer_credit_user_id_foreign` FOREIGN KEY (`credit_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fund_transfer_debit_user_id_foreign` FOREIGN KEY (`debit_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kb_article_relationship`
--
ALTER TABLE `kb_article_relationship`
  ADD CONSTRAINT `article_relationship_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `kb_article` (`id`),
  ADD CONSTRAINT `article_relationship_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kb_category` (`id`);

--
-- Constraints for table `kb_comment`
--
ALTER TABLE `kb_comment`
  ADD CONSTRAINT `comment_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `kb_article` (`id`);

--
-- Constraints for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `purchase_history_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `purchase_history_purchase_user_id_foreign` FOREIGN KEY (`purchase_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchase_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
