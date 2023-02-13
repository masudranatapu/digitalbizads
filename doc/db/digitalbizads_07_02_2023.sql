-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 09:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalbizads`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_cards`
--

CREATE TABLE `business_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `adsname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EN',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cashapp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `header_text_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_backgroung` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `business_cards`
--

INSERT INTO `business_cards` (`id`, `card_id`, `user_id`, `theme_id`, `adsname`, `theme_color`, `card_lang`, `cover`, `logo`, `card_url`, `card_type`, `title`, `sub_title`, `description`, `phone_number`, `email`, `cashapp`, `website`, `footer_text`, `card_status`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `header_text_color`, `header_backgroung`, `banner_content`, `banner_type`) VALUES
(1, '63e1f7e55929e', 3, NULL, 'My Small Shop', '#f10909', 'en', NULL, NULL, '63e1f7e55929e', 'vcard', 'My Small Shop1', NULL, NULL, '017107886561', 'arifmahmud64@gmail.com1', 'myfaceapp1', 'https://getbootstrap.com/1', 'Copyright1', 'activated', 1, '2023-02-07 01:04:05', 3, '2023-02-07 08:04:09', 3, NULL, NULL, '#ffffff', '#3b0b93', 'https://www.youtube.com/embed/CAOZSBBTBIY', 'videourl');

-- --------------------------------------------------------

--
-- Table structure for table `business_fields`
--

CREATE TABLE `business_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_fields`
--

INSERT INTO `business_fields` (`id`, `card_id`, `type`, `icon`, `label`, `content`, `position`, `status`, `created_at`, `updated_at`) VALUES
(19, 1, 'facebook', 'fab fa-facebook', 'facebook', 'arifiurahmansw1', NULL, '1', '2023-02-07 02:04:09', '2023-02-07 08:04:09'),
(20, 1, 'instagram', 'fab fa-instagram', 'instagram', 'arifur1', NULL, '1', '2023-02-07 02:04:09', '2023-02-07 08:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Monday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tuesday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Wednesday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Thursday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Friday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Saturday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sunday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_always_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_display` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `card_id`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `is_always_open`, `is_display`, `status`, `created_at`, `updated_at`) VALUES
(1, '63d4edfa856f0', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', '09:00 - 18:30', 'Closed', '1', '1', '2023-01-28 03:42:51', '2023-01-28 03:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `card_gallery`
--

CREATE TABLE `card_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` int(11) NOT NULL,
  `content` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `card_gallery`
--

INSERT INTO `card_gallery` (`id`, `card_id`, `content`, `gallery_type`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/uploads/gallery/pexels-anastasiya-gepp-1462636-63e1f7e5bcc7b.jpg', 'gallery', NULL, '2023-02-07 01:04:05', '2023-02-07 01:04:05'),
(2, 1, 'assets/uploads/gallery/pexels-brynna-spencer-227294-63e1f7e5c53e7.jpg', 'gallery', NULL, '2023-02-07 01:04:05', '2023-02-07 01:04:05'),
(3, 1, 'assets/uploads/gallery/pexels-daniel-rocha-14857249-63e1f7e5cc162.jpg', 'gallery', NULL, '2023-02-07 01:04:05', '2023-02-07 01:04:05'),
(6, 1, 'assets/uploads/gallery/pexels-vinicius-wiesehofer-1130626-63e205f9258b9.jpg', 'gallery', NULL, '2023-02-07 02:04:09', '2023-02-07 02:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Digitalbizads', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(2, 'currency', 'USD', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(3, 'timezone', 'UTC', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(4, 'paypal_mode', '', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(5, 'paypal_client_id', '', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(6, 'paypal_secret', '', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(7, 'razorpay_key', '', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(8, 'razorpay_secret', '', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(9, 'term', 'monthly', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(10, 'stripe_publishable_key', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(11, 'stripe_secret', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(12, 'app_theme', 'yellow', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(13, 'primary_image', '/images/web/elements/63d4db86af636.jpg', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(14, 'secondary_image', '/frontend/assets/elements/home.svg', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(15, 'tax_type', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(16, 'invoice_prefix', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(17, 'invoice_name', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(18, 'invoice_email', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(19, 'invoice_phone', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(20, 'invoice_address', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(21, 'invoice_city', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(22, 'invoice_state', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(23, 'invoice_zipcode', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(24, 'invoice_country', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(25, 'tax_name', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(26, 'tax_value', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(27, 'tax_number', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(28, 'email_heading', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(29, 'email_footer', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(30, 'invoice_footer', '', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(31, 'share_content', 'Welcome to { business_name }, DigitalBizAds Cards here : { business_url } Powered by: { appName }', '2023-01-28 07:33:35', '2023-01-28 07:33:35'),
(32, 'bank_transfer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dolorem!', '2023-01-28 07:33:35', '2023-01-28 07:33:35'),
(33, 'version', '', '2023-01-28 07:33:35', '2023-01-28 07:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` int(11) NOT NULL,
  `iso_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit_to_unit` int(11) NOT NULL,
  `symbol_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_entity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thousands_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_numeric` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `priority`, `iso_code`, `name`, `symbol`, `subunit`, `subunit_to_unit`, `symbol_first`, `html_entity`, `decimal_mark`, `thousands_separator`, `iso_numeric`) VALUES
(1, 100, 'AED', 'United Arab Emirates Dirham', 'د.إ', 'Fils', 100, 'true', '', '.', ',', 784),
(2, 100, 'AFN', 'Afghan Afghani', '؋', 'Pul', 100, 'false', '', '.', ',', 971),
(3, 100, 'ALL', 'Albanian Lek', 'L', 'Qintar', 100, 'false', '', '.', ',', 8),
(4, 100, 'AMD', 'Armenian Dram', 'դր.', 'Luma', 100, 'false', '', '.', ',', 51),
(5, 100, 'ANG', 'Netherlands Antillean Gulden', 'ƒ', 'Cent', 100, 'true', '&#x0192;', ',', '.', 532),
(6, 100, 'AOA', 'Angolan Kwanza', 'Kz', 'Cêntimo', 100, 'false', '', '.', ',', 973),
(7, 100, 'ARS', 'Argentine Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 32),
(8, 4, 'AUD', 'Australian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 36),
(9, 100, 'AWG', 'Aruban Florin', 'ƒ', 'Cent', 100, 'false', '&#x0192;', '.', ',', 533),
(10, 100, 'AZN', 'Azerbaijani Manat', 'null', 'Qəpik', 100, 'true', '', '.', ',', 944),
(11, 100, 'BAM', 'Bosnia and Herzegovina Convertible Mark', 'КМ', 'Fening', 100, 'true', '', '.', ',', 977),
(12, 100, 'BBD', 'Barbadian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 52),
(13, 100, 'BDT', 'Bangladeshi Taka', '৳', 'Paisa', 100, 'true', '', '.', ',', 50),
(14, 100, 'BGN', 'Bulgarian Lev', 'лв', 'Stotinka', 100, 'false', '', '.', ',', 975),
(15, 100, 'BHD', 'Bahraini Dinar', 'ب.د', 'Fils', 1000, 'true', '', '.', ',', 48),
(16, 100, 'BIF', 'Burundian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 108),
(17, 100, 'BMD', 'Bermudian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 60),
(18, 100, 'BND', 'Brunei Dollar', '$', 'Sen', 100, 'true', '$', '.', ',', 96),
(19, 100, 'BOB', 'Bolivian Boliviano', 'Bs.', 'Centavo', 100, 'true', '', '.', ',', 68),
(20, 100, 'BRL', 'Brazilian Real', 'R$', 'Centavo', 100, 'true', 'R$', ',', '.', 986),
(21, 100, 'BSD', 'Bahamian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 44),
(22, 100, 'BTN', 'Bhutanese Ngultrum', 'Nu.', 'Chertrum', 100, 'false', '', '.', ',', 64),
(23, 100, 'BWP', 'Botswana Pula', 'P', 'Thebe', 100, 'true', '', '.', ',', 72),
(24, 100, 'BYR', 'Belarusian Ruble', 'Br', 'Kapyeyka', 100, 'false', '', '.', ',', 974),
(25, 100, 'BZD', 'Belize Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 84),
(26, 5, 'CAD', 'Canadian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 124),
(27, 100, 'CDF', 'Congolese Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 976),
(28, 100, 'CHF', 'Swiss Franc', 'Fr', 'Rappen', 100, 'true', '', '.', ',', 756),
(29, 100, 'CLF', 'Unidad de Fomento', 'UF', 'Peso', 1, 'true', '&#x20B1;', ',', '.', 990),
(30, 100, 'CLP', 'Chilean Peso', '$', 'Peso', 1, 'true', '&#36;', ',', '.', 152),
(31, 100, 'CNY', 'Chinese Renminbi Yuan', '¥', 'Fen', 100, 'true', '&#20803;', '.', ',', 156),
(32, 100, 'COP', 'Colombian Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 170),
(33, 100, 'CRC', 'Costa Rican Colón', '₡', 'Céntimo', 100, 'true', '&#x20A1;', ',', '.', 188),
(34, 100, 'CUC', 'Cuban Convertible Peso', '$', 'Centavo', 100, 'false', '', '.', ',', 931),
(35, 100, 'CUP', 'Cuban Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 192),
(36, 100, 'CVE', 'Cape Verdean Escudo', '$', 'Centavo', 100, 'false', '', '.', ',', 132),
(37, 100, 'CZK', 'Czech Koruna', 'Kč', 'Haléř', 100, 'true', '', ',', '.', 203),
(38, 100, 'DJF', 'Djiboutian Franc', 'Fdj', 'Centime', 100, 'false', '', '.', ',', 262),
(39, 100, 'DKK', 'Danish Krone', 'kr', 'Øre', 100, 'false', '', ',', '.', 208),
(40, 100, 'DOP', 'Dominican Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 214),
(41, 100, 'DZD', 'Algerian Dinar', 'د.ج', 'Centime', 100, 'false', '', '.', ',', 12),
(42, 100, 'EGP', 'Egyptian Pound', 'ج.م', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 818),
(43, 100, 'ERN', 'Eritrean Nakfa', 'Nfk', 'Cent', 100, 'false', '', '.', ',', 232),
(44, 100, 'ETB', 'Ethiopian Birr', 'Br', 'Santim', 100, 'false', '', '.', ',', 230),
(45, 2, 'EUR', 'Euro', '€', 'Cent', 100, 'true', '&#x20AC;', ',', '.', 978),
(46, 100, 'FJD', 'Fijian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 242),
(47, 100, 'FKP', 'Falkland Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 238),
(48, 3, 'GBP', 'British Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 826),
(49, 100, 'GEL', 'Georgian Lari', 'ლ', 'Tetri', 100, 'false', '', '.', ',', 981),
(50, 100, 'GHS', 'Ghanaian Cedi', '₵', 'Pesewa', 100, 'true', '&#x20B5;', '.', ',', 936),
(51, 100, 'GIP', 'Gibraltar Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 292),
(52, 100, 'GMD', 'Gambian Dalasi', 'D', 'Butut', 100, 'false', '', '.', ',', 270),
(53, 100, 'GNF', 'Guinean Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 324),
(54, 100, 'GTQ', 'Guatemalan Quetzal', 'Q', 'Centavo', 100, 'true', '', '.', ',', 320),
(55, 100, 'GYD', 'Guyanese Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 328),
(56, 100, 'HKD', 'Hong Kong Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 344),
(57, 100, 'HNL', 'Honduran Lempira', 'L', 'Centavo', 100, 'true', '', '.', ',', 340),
(58, 100, 'HRK', 'Croatian Kuna', 'kn', 'Lipa', 100, 'true', '', ',', '.', 191),
(59, 100, 'HTG', 'Haitian Gourde', 'G', 'Centime', 100, 'false', '', '.', ',', 332),
(60, 100, 'HUF', 'Hungarian Forint', 'Ft', 'Fillér', 100, 'false', '', ',', '.', 348),
(61, 100, 'IDR', 'Indonesian Rupiah', 'Rp', 'Sen', 100, 'true', '', ',', '.', 360),
(62, 100, 'ILS', 'Israeli New Sheqel', '₪', 'Agora', 100, 'true', '&#x20AA;', '.', ',', 376),
(63, 100, 'INR', 'Indian Rupee', '₹', 'Paisa', 100, 'true', '&#x20b9;', '.', ',', 356),
(64, 100, 'IQD', 'Iraqi Dinar', 'ع.د', 'Fils', 1000, 'false', '', '.', ',', 368),
(65, 100, 'IRR', 'Iranian Rial', '﷼', 'Dinar', 100, 'true', '&#xFDFC;', '.', ',', 364),
(66, 100, 'ISK', 'Icelandic Króna', 'kr', 'Eyrir', 100, 'true', '', ',', '.', 352),
(67, 100, 'JMD', 'Jamaican Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 388),
(68, 100, 'JOD', 'Jordanian Dinar', 'د.ا', 'Piastre', 100, 'true', '', '.', ',', 400),
(69, 6, 'JPY', 'Japanese Yen', '¥', 'null', 1, 'true', '&#x00A5;', '.', ',', 392),
(70, 100, 'KES', 'Kenyan Shilling', 'KSh', 'Cent', 100, 'true', '', '.', ',', 404),
(71, 100, 'KGS', 'Kyrgyzstani Som', 'som', 'Tyiyn', 100, 'false', '', '.', ',', 417),
(72, 100, 'KHR', 'Cambodian Riel', '៛', 'Sen', 100, 'false', '&#x17DB;', '.', ',', 116),
(73, 100, 'KMF', 'Comorian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 174),
(74, 100, 'KPW', 'North Korean Won', '₩', 'Chŏn', 100, 'false', '&#x20A9;', '.', ',', 408),
(75, 100, 'KRW', 'South Korean Won', '₩', 'null', 1, 'true', '&#x20A9;', '.', ',', 410),
(76, 100, 'KWD', 'Kuwaiti Dinar', 'د.ك', 'Fils', 1000, 'true', '', '.', ',', 414),
(77, 100, 'KYD', 'Cayman Islands Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 136),
(78, 100, 'KZT', 'Kazakhstani Tenge', '〒', 'Tiyn', 100, 'false', '', '.', ',', 398),
(79, 100, 'LAK', 'Lao Kip', '₭', 'Att', 100, 'false', '&#x20AD;', '.', ',', 418),
(80, 100, 'LBP', 'Lebanese Pound', 'ل.ل', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 422),
(81, 100, 'LKR', 'Sri Lankan Rupee', '₨', 'Cent', 100, 'false', '&#x0BF9;', '.', ',', 144),
(82, 100, 'LRD', 'Liberian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 430),
(83, 100, 'LSL', 'Lesotho Loti', 'L', 'Sente', 100, 'false', '', '.', ',', 426),
(84, 100, 'LTL', 'Lithuanian Litas', 'Lt', 'Centas', 100, 'false', '', '.', ',', 440),
(85, 100, 'LVL', 'Latvian Lats', 'Ls', 'Santīms', 100, 'true', '', '.', ',', 428),
(86, 100, 'LYD', 'Libyan Dinar', 'ل.د', 'Dirham', 1000, 'false', '', '.', ',', 434),
(87, 100, 'MAD', 'Moroccan Dirham', 'د.م.', 'Centime', 100, 'false', '', '.', ',', 504),
(88, 100, 'MDL', 'Moldovan Leu', 'L', 'Ban', 100, 'false', '', '.', ',', 498),
(89, 100, 'MGA', 'Malagasy Ariary', 'Ar', 'Iraimbilanja', 5, 'true', '', '.', ',', 969),
(90, 100, 'MKD', 'Macedonian Denar', 'ден', 'Deni', 100, 'false', '', '.', ',', 807),
(91, 100, 'MMK', 'Myanmar Kyat', 'K', 'Pya', 100, 'false', '', '.', ',', 104),
(92, 100, 'MNT', 'Mongolian Tögrög', '₮', 'Möngö', 100, 'false', '&#x20AE;', '.', ',', 496),
(93, 100, 'MOP', 'Macanese Pataca', 'P', 'Avo', 100, 'false', '', '.', ',', 446),
(94, 100, 'MRO', 'Mauritanian Ouguiya', 'UM', 'Khoums', 5, 'false', '', '.', ',', 478),
(95, 100, 'MUR', 'Mauritian Rupee', '₨', 'Cent', 100, 'true', '&#x20A8;', '.', ',', 480),
(96, 100, 'MVR', 'Maldivian Rufiyaa', 'MVR', 'Laari', 100, 'false', '', '.', ',', 462),
(97, 100, 'MWK', 'Malawian Kwacha', 'MK', 'Tambala', 100, 'false', '', '.', ',', 454),
(98, 100, 'MXN', 'Mexican Peso', '$', 'Centavo', 100, 'true', '$', '.', ',', 484),
(99, 100, 'MYR', 'Malaysian Ringgit', 'RM', 'Sen', 100, 'true', '', '.', ',', 458),
(100, 100, 'MZN', 'Mozambican Metical', 'MTn', 'Centavo', 100, 'true', '', ',', '.', 943),
(101, 100, 'NAD', 'Namibian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 516),
(102, 100, 'NGN', 'Nigerian Naira', '₦', 'Kobo', 100, 'false', '&#x20A6;', '.', ',', 566),
(103, 100, 'NIO', 'Nicaraguan Córdoba', 'C$', 'Centavo', 100, 'false', '', '.', ',', 558),
(104, 100, 'NOK', 'Norwegian Krone', 'kr', 'Øre', 100, 'true', 'kr', ',', '.', 578),
(105, 100, 'NPR', 'Nepalese Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 524),
(106, 100, 'NZD', 'New Zealand Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 554),
(107, 100, 'OMR', 'Omani Rial', 'ر.ع.', 'Baisa', 1000, 'true', '&#xFDFC;', '.', ',', 512),
(108, 100, 'PAB', 'Panamanian Balboa', 'B/.', 'Centésimo', 100, 'false', '', '.', ',', 590),
(109, 100, 'PEN', 'Peruvian Nuevo Sol', 'S/.', 'Céntimo', 100, 'true', 'S/.', '.', ',', 604),
(110, 100, 'PGK', 'Papua New Guinean Kina', 'K', 'Toea', 100, 'false', '', '.', ',', 598),
(111, 100, 'PHP', 'Philippine Peso', '₱', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 608),
(112, 100, 'PKR', 'Pakistani Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 586),
(113, 100, 'PLN', 'Polish Złoty', 'zł', 'Grosz', 100, 'false', 'z&#322;', ',', '', 985),
(114, 100, 'PYG', 'Paraguayan Guaraní', '₲', 'Céntimo', 100, 'true', '&#x20B2;', '.', ',', 600),
(115, 100, 'QAR', 'Qatari Riyal', 'ر.ق', 'Dirham', 100, 'false', '&#xFDFC;', '.', ',', 634),
(116, 100, 'RON', 'Romanian Leu', 'Lei', 'Bani', 100, 'true', '', ',', '.', 946),
(117, 100, 'RSD', 'Serbian Dinar', 'РСД', 'Para', 100, 'true', '', '.', ',', 941),
(118, 100, 'RUB', 'Russian Ruble', 'р.', 'Kopek', 100, 'false', '&#x0440;&#x0443;&#x0431;', ',', '.', 643),
(119, 100, 'RWF', 'Rwandan Franc', 'FRw', 'Centime', 100, 'false', '', '.', ',', 646),
(120, 100, 'SAR', 'Saudi Riyal', 'ر.س', 'Hallallah', 100, 'true', '&#xFDFC;', '.', ',', 682),
(121, 100, 'SBD', 'Solomon Islands Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 90),
(122, 100, 'SCR', 'Seychellois Rupee', '₨', 'Cent', 100, 'false', '&#x20A8;', '.', ',', 690),
(123, 100, 'SDG', 'Sudanese Pound', '£', 'Piastre', 100, 'true', '', '.', ',', 938),
(124, 100, 'SEK', 'Swedish Krona', 'kr', 'Öre', 100, 'false', '', ',', '', 752),
(125, 100, 'SGD', 'Singapore Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 702),
(126, 100, 'SHP', 'Saint Helenian Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 654),
(127, 100, 'SKK', 'Slovak Koruna', 'Sk', 'Halier', 100, 'true', '', '.', ',', 703),
(128, 100, 'SLL', 'Sierra Leonean Leone', 'Le', 'Cent', 100, 'false', '', '.', ',', 694),
(129, 100, 'SOS', 'Somali Shilling', 'Sh', 'Cent', 100, 'false', '', '.', ',', 706),
(130, 100, 'SRD', 'Surinamese Dollar', '$', 'Cent', 100, 'false', '', '.', ',', 968),
(131, 100, 'SSP', 'South Sudanese Pound', '£', 'piaster', 100, 'false', '&#x00A3;', '.', ',', 728),
(132, 100, 'STD', 'São Tomé and Príncipe Dobra', 'Db', 'Cêntimo', 100, 'false', '', '.', ',', 678),
(133, 100, 'SVC', 'Salvadoran Colón', '₡', 'Centavo', 100, 'true', '&#x20A1;', '.', ',', 222),
(134, 100, 'SYP', 'Syrian Pound', '£S', 'Piastre', 100, 'false', '&#x00A3;', '.', ',', 760),
(135, 100, 'SZL', 'Swazi Lilangeni', 'L', 'Cent', 100, 'true', '', '.', ',', 748),
(136, 100, 'THB', 'Thai Baht', '฿', 'Satang', 100, 'true', '&#x0E3F;', '.', ',', 764),
(137, 100, 'TJS', 'Tajikistani Somoni', 'ЅМ', 'Diram', 100, 'false', '', '.', ',', 972),
(138, 100, 'TMT', 'Turkmenistani Manat', 'T', 'Tenge', 100, 'false', '', '.', ',', 934),
(139, 100, 'TND', 'Tunisian Dinar', 'د.ت', 'Millime', 1000, 'false', '', '.', ',', 788),
(140, 100, 'TOP', 'Tongan Paʻanga', 'T$', 'Seniti', 100, 'true', '', '.', ',', 776),
(141, 100, 'TRY', 'Turkish Lira', 'TL', 'kuruş', 100, 'false', '', ',', '.', 949),
(142, 100, 'TTD', 'Trinidad and Tobago Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 780),
(143, 100, 'TWD', 'New Taiwan Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 901),
(144, 100, 'TZS', 'Tanzanian Shilling', 'Sh', 'Cent', 100, 'true', '', '.', ',', 834),
(145, 100, 'UAH', 'Ukrainian Hryvnia', '₴', 'Kopiyka', 100, 'false', '&#x20B4;', '.', ',', 980),
(146, 100, 'UGX', 'Ugandan Shilling', 'USh', 'Cent', 100, 'false', '', '.', ',', 800),
(147, 1, 'USD', 'United States Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 840),
(148, 100, 'UYU', 'Uruguayan Peso', '$', 'Centésimo', 100, 'true', '&#x20B1;', ',', '.', 858),
(149, 100, 'UZS', 'Uzbekistani Som', 'null', 'Tiyin', 100, 'false', '', '.', ',', 860),
(150, 100, 'VEF', 'Venezuelan Bolívar', 'Bs F', 'Céntimo', 100, 'true', '', ',', '.', 937),
(151, 100, 'VND', 'Vietnamese Đồng', '₫', 'Hào', 10, 'true', '&#x20AB;', ',', '.', 704),
(152, 100, 'VUV', 'Vanuatu Vatu', 'Vt', 'null', 1, 'true', '', '.', ',', 548),
(153, 100, 'WST', 'Samoan Tala', 'T', 'Sene', 100, 'false', '', '.', ',', 882),
(154, 100, 'XAF', 'Central African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 950),
(155, 100, 'XAG', 'Silver (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 961),
(156, 100, 'XAU', 'Gold (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 959),
(157, 100, 'XCD', 'East Caribbean Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 951),
(158, 100, 'XDR', 'Special Drawing Rights', 'SDR', '', 1, 'false', '$', '.', ',', 960),
(159, 100, 'XOF', 'West African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 952),
(160, 100, 'XPF', 'Cfp Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 953),
(161, 100, 'YER', 'Yemeni Rial', '﷼', 'Fils', 100, 'false', '&#xFDFC;', '.', ',', 886),
(162, 100, 'ZAR', 'South African Rand', 'R', 'Cent', 100, 'true', '&#x0052;', '.', ',', 710),
(163, 100, 'ZMK', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 894),
(164, 100, 'ZMW', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 967);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_gateway_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enabled',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `payment_gateway_id`, `payment_gateway_logo`, `payment_gateway_name`, `display_name`, `client_id`, `secret_key`, `is_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '60964401751ab', '/backend/img/payment-method/paypal.png', 'Paypal', 'Paypal', '5', '6', 'enabled', '1', '2023-01-28 07:33:18', '2023-01-28 07:33:18'),
(3, '60964410732t9', '/backend/img/payment-method/stripe.png', 'Stripe', 'Stripe', '10', '11', 'enabled', '1', '2023-01-28 07:33:18', '2023-01-28 07:33:18'),
(4, '659644107y2g5', '/backend/img/payment-method/bank-transfer.png', 'Bank Transfer', 'Bank Transfer', '12', '13', 'enabled', '1', '2023-01-28 07:33:18', '2023-01-28 07:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language`, `created_at`, `updated_at`) VALUES
(1, NULL, 'en', '2023-01-28 01:33:08', '2023-01-28 01:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_29_200844_create_languages_table', 1),
(4, '2018_08_29_205156_create_translations_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_03_31_131010_create_roles_table', 1),
(7, '2021_04_01_151204_create_themes_table', 1),
(8, '2021_04_01_151457_create_plans_table', 1),
(9, '2021_04_01_151522_create_business_cards_table', 1),
(10, '2021_04_01_151647_create_services_table', 1),
(11, '2021_04_01_151712_create_galleries_table', 1),
(12, '2021_04_01_151730_create_payments_table', 1),
(13, '2021_04_01_151755_create_business_hours_table', 1),
(14, '2021_04_01_151814_create_settings_table', 1),
(15, '2021_04_01_151835_create_gateways_table', 1),
(16, '2021_04_01_151858_create_transactions_table', 1),
(17, '2021_05_10_140547_create_currencies_table', 1),
(18, '2021_07_27_190247_create_config_table', 1),
(19, '2021_07_29_140453_create_pages_table', 1),
(20, '2021_08_03_171614_create_business_fields_table', 1),
(21, '2021_08_23_184731_create_store_products_table', 1),
(22, '2021_09_21_132016_create_medias_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `section_name`, `section_title`, `section_content`, `created_at`, `updated_at`) VALUES
(1, 'home', 'banner', 'banner_title', 'Create your DigitalBizADS Card', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(2, 'home', 'banner', 'banner_description', 'Digitalbizads is a Digital Business Ads Maker. You can create your own Digital Ads to attract your customers.', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(3, 'home', 'banner', 'banner_button_1', 'Sign up now', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(4, 'home', 'banner', 'banner_button_1_link', '/login', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(5, 'home', 'banner', 'banner_button_2', 'How it works', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(6, 'home', 'banner', 'banner_button_2_link', '#how-it-works', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(7, 'home', 'works', 'work_mini_title', 'How it works?', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(8, 'home', 'works', 'work_title', 'Create, share & get more customers', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(9, 'home', 'works', 'work_description', 'Register a new account, create your own digitalbizads card, share your unique link and get more customers.', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(10, 'home', 'works', 'work_li_title_1', 'Create digitalbizads card', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(11, 'home', 'works', 'work_li_title_2', 'Share your link', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(12, 'home', 'works', 'work_li_title_3', 'Get more customers', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(13, 'home', 'works', 'work_card_title_1', 'Photo gallery', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(14, 'home', 'works', 'work_card_description_1', 'You can create photo gallery of your products', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(15, 'home', 'works', 'work_card_title_2', 'Contact Listing', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(16, 'home', 'works', 'work_card_description_2', 'You can list your contact informations in your digitalbizads card', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(17, 'home', 'works', 'work_card_title_3', 'Save DigitalBizAds', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(18, 'home', 'works', 'work_card_description_3', 'You can save your digitalbizads card and you can create multiple digitalbizads cards', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(19, 'home', 'works', 'work_card_title_4', 'Best for Businesses', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(20, 'home', 'works', 'work_card_description_4', 'Digitalbizads  cards will help you to transform your card visitors into customers.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(21, 'home', 'features', 'feature_mini_title', 'Why Digital Business Card?', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(22, 'home', 'features', 'feature_title', 'vCard Features', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(23, 'home', 'features', 'feature_card_title_1', 'WhatsApp Enabled', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(24, 'home', 'features', 'feature_card_description_1', 'You can enable and disable WhatsApp Chat Feature in your digital business card.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(25, 'home', 'features', 'feature_card_description_2', 'Photo Gallery', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(26, 'home', 'features', 'feature_card_description_2', 'You can upload product photos or any business related photos in your gallery section.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(27, 'home', 'features', 'feature_card_description_3', 'Services Section', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(28, 'home', 'features', 'feature_card_description_3', 'You can list your all services with image and description in this section.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(29, 'home', 'features', 'feature_card_description_4', 'Payment Details', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(30, 'home', 'features', 'feature_card_description_4', 'You can list your all accepted payment methods in your digital business card.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(31, 'home', 'features', 'feature_card_description_5', 'Business Hours', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(32, 'home', 'features', 'feature_card_description_5', 'You can display your business opening hours. Your customer can easily understand when you are available.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(33, 'home', 'features', 'feature_card_description_6', 'YouTube Link Integraion', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(34, 'home', 'features', 'feature_card_description_6', 'You can integrate your YouTube Link with your digital business card.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(35, 'home', 'features', 'feature_card_description_7', 'Google Maps Integraion', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(36, 'home', 'features', 'feature_card_description_7', 'You can display your shop / business location in google maps. Visitors can easily find you.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(37, 'home', 'features', 'feature_card_description_8', 'Social Media Links', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(38, 'home', 'features', 'feature_card_description_8', 'Your all social media presence in one digital business card. Stay connect with your customers.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(39, 'home', 'features', 'feature_card_description_9', 'Modern Theme', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(40, 'home', 'features', 'feature_card_description_9', 'We used modern theme for user interface. It is fully responsive.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(41, 'home', 'features', 'feature_card_description_10', 'Clean UI Design', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(42, 'home', 'features', 'feature_card_description_10', 'We creafted all designs professionally. It made with latest frameworks.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(43, 'home', 'features', 'feature_card_description_11', 'Faster Loading', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(44, 'home', 'features', 'feature_card_description_11', 'We give more importance for page load. Your digital card load faster than normal webpages.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(45, 'home', 'features', 'feature_card_description_12', 'Unique Link', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(46, 'home', 'features', 'feature_card_description_12', 'Your name or business whatever it is. You can generate your business card link as per your choice.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(47, 'home', 'pricing', 'pricing_mini_title', 'Pricing', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(48, 'home', 'pricing', 'pricing_title', 'Choose your best plan', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(49, 'home', 'pricing', 'pricing_subtitle', 'Good investments will gives you 10x more revenue.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(50, 'faq', 'faq', 'faq_title', 'Frequently Asked Question', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(51, 'faq', 'faq', 'faq_description', 'The most common questions about how our business works and what can do for you.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(52, 'faq', 'faq', 'faq_question_1', 'How Long is this site live?', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(53, 'faq', 'faq', 'faq_answer_1', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(54, 'faq', 'faq', 'faq_question_2', 'Can I install/upload anything I want on there?', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(55, 'faq', 'faq', 'faq_answer_2', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2023-01-28 07:33:23', '2023-01-28 07:33:23'),
(56, 'faq', 'faq', 'faq_question_3', 'How can I migrate to another site?', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(57, 'faq', 'faq', 'faq_answer_3', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(58, 'faq', 'faq', 'faq_question_4', 'Can I change the domain you give me?', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(59, 'faq', 'faq', 'faq_answer_4', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(60, 'faq', 'faq', 'faq_question_5', 'How many sites I can create at once?', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(61, 'faq', 'faq', 'faq_answer_5', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(62, 'faq', 'faq', 'faq_question_6', 'How can I communicate with you?', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(63, 'faq', 'faq', 'faq_answer_6', 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(64, 'footer support email', 'support', 'support_email', 'info@digitalbizads.com', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(65, 'privacy', 'privacy', 'privacy_title', 'Privacy Policy for DigitalBizAds', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(66, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(67, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(68, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(69, 'privacy', 'privacy', 'privacy_content_title', 'Consent', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(70, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(71, 'privacy', 'privacy', 'privacy_content_title', 'Information we collect', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(72, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(73, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(74, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(75, 'privacy', 'privacy', 'privacy_content_title', 'How we use your information', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(76, 'privacy', 'privacy', 'privacy_content_description', 'We use the information we collect in various ways, including to:', '2023-01-28 07:33:24', '2023-01-28 07:33:24'),
(77, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(78, 'privacy', 'privacy', 'privacy_content_title', 'Log Files', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(79, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(80, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(81, 'privacy', 'privacy', 'privacy_content_title', 'Cookies and Web Beacons', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(82, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(83, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(84, 'privacy', 'privacy', 'privacy_content_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(85, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(86, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(87, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(88, 'privacy', 'privacy', 'privacy_content_title', 'Third Party Privacy Policies', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(89, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(90, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(91, 'privacy', 'privacy', 'privacy_content_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:25', '2023-01-28 07:33:25'),
(92, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(93, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(94, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(95, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(96, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(97, 'privacy', 'privacy', 'privacy_content_title', 'GDPR Data Protection Rights', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(98, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(99, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(100, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(101, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(102, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(103, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(104, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(105, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(106, 'privacy', 'privacy', 'privacy_content_title', 'Childrens Information', '2023-01-28 07:33:26', '2023-01-28 07:33:26'),
(107, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(108, 'privacy', 'privacy', 'privacy_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(109, 'terms', 'terms', 'term_content_title', 'Terms and Conditions', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(110, 'terms', 'terms', 'term_content_description', 'Welcome to DigitalBizAds!', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(111, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(112, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(113, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(114, 'terms', 'terms', 'term_content_title', 'Cookies', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(115, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(116, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(117, 'terms', 'terms', 'term_content_title', 'License', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(118, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(119, 'terms', 'terms', 'term_content_description', 'You must not:', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(120, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(121, 'terms', 'terms', 'term_content_description', 'This Agreement shall begin on the date hereof.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(122, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(123, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:27', '2023-01-28 07:33:27'),
(124, 'terms', 'terms', 'term_content_description', 'You warrant and represent that:', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(125, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(126, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(127, 'terms', 'terms', 'term_content_title', 'Hyperlinking to our Content', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(128, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(129, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(130, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(131, 'terms', 'terms', 'term_content_description', 'We may consider and approve other link requests from the following types of organizations:', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(132, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(133, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(134, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(135, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(136, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(137, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(138, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(139, 'terms', 'terms', 'term_content_title', 'iFrames', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(140, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(141, 'terms', 'terms', 'term_content_title', 'Content Liability', '2023-01-28 07:33:28', '2023-01-28 07:33:28'),
(142, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(143, 'terms', 'terms', 'term_content_title', 'Reservation of Rights', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(144, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(145, 'terms', 'terms', 'term_content_title', 'Removal of links from our website', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(146, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(147, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(148, 'terms', 'terms', 'term_content_title', 'Disclaimer', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(149, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(150, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(151, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(152, 'terms', 'terms', 'term_content_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(153, 'footer', 'footer', 'social-facebook', 'https://facebook.com', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(154, 'footer', 'footer', 'social-twitter', 'https://twitter.com', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(155, 'footer', 'footer', 'social-instagram', 'https://instagram.com', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(156, 'footer', 'footer', 'social-linkedIn', 'https://linkedin.com', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(157, 'refund', 'refund', 'refund-title', 'Return and Refund Policy', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(158, 'refund', 'refund', 'refund-desc', 'Last updated: January 20, 2023', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(159, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(160, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(161, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:29', '2023-01-28 07:33:29'),
(162, 'refund', 'refund', 'desc', 'Interpretation and Definitions', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(163, 'refund', 'refund', 'desc', 'Interpretation', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(164, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(165, 'refund', 'refund', 'desc', 'Definitions', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(166, 'refund', 'refund', 'desc', 'For the purposes of this Return and Refund Policy:', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(167, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(168, 'refund', 'refund', 'desc', '2. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(169, 'refund', 'refund', 'desc', '3. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(170, 'refund', 'refund', 'desc', '4. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(171, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(172, 'refund', 'refund', 'desc', '6. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(173, 'refund', 'refund', 'desc', 'Your Order Cancellation Rights', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(174, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(175, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(176, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:30', '2023-01-28 07:33:30'),
(177, 'refund', 'refund', 'desc', 'By email: support@digitalbizads.com', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(178, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(179, 'refund', 'refund', 'desc', 'Conditions for Returns', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(180, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(181, 'refund', 'refund', 'desc', '1. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(182, 'refund', 'refund', 'desc', 'The following Goods cannot be returned:', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(183, 'refund', 'refund', 'desc', '1. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(184, 'refund', 'refund', 'desc', '2. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(185, 'refund', 'refund', 'desc', '3. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(186, 'refund', 'refund', 'desc', '4. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(187, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(188, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(189, 'refund', 'refund', 'desc', 'Returning Goods', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(190, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(191, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(192, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(193, 'refund', 'refund', 'desc', 'Contact Us', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(194, 'refund', 'refund', 'desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(195, 'refund', 'refund', 'desc', 'By email: support@digitalbizads.com', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(196, 'contact', 'contact', 'page_name', 'Contact', '2023-01-28 07:33:31', '2023-01-28 07:33:31'),
(197, 'contact', 'contact', 'page_subtitle', 'Got any question? Let’s talk about it.', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(198, 'contact', 'contact', 'page_section_1', 'Office', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(199, 'contact', 'contact', 'page_section_1_content_1', 'DigitalBizAds', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(200, 'contact', 'contact', 'page_section_1_content_2', 'USA', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(201, 'contact', 'contact', 'page_section_2', 'Contacts', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(202, 'contact', 'contact', 'page_section_2_content_1', 'info@digitalbizads.com', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(203, 'contact', 'contact', 'page_section_2_content_1', '+1 (662) 549-1457', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(204, 'contact', 'contact', 'page_section_3', 'Socials', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(205, 'about', 'about', 'about_content_title', 'About us', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(206, 'about', 'about', 'about_content_description', 'Welcome to DigitalBizAds!', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(207, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(208, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(209, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(210, 'about', 'about', 'about_content_title', 'About the company', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(211, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(212, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(213, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(214, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(215, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(216, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(217, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(218, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(219, 'about', 'about', 'about_content_description', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!', '2023-01-28 07:33:33', '2023-01-28 07:33:33');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_vcards` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_services` int(11) NOT NULL,
  `no_of_galleries` int(11) NOT NULL,
  `no_of_features` int(11) NOT NULL,
  `no_of_payments` int(11) NOT NULL,
  `personalized_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide_branding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_setup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_support` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_private` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `plan_name`, `plan_description`, `plan_price`, `validity`, `no_of_vcards`, `no_of_services`, `no_of_galleries`, `no_of_features`, `no_of_payments`, `personalized_link`, `hide_branding`, `free_setup`, `free_support`, `recommended`, `is_private`, `status`, `created_at`, `updated_at`) VALUES
(1, '60673288f0d35', 'Beginner', 'You can take your Biginner plan to start your first Journey !!', '0', '31', '1', 5, 5, 5, 5, '0', '0', '0', '0', '0', '0', '1', '2023-01-28 07:33:18', '2023-01-28 03:25:26'),
(2, '606732aa4fb58', 'Intermediate', 'It is our popular plan to start business with us', '24', '31', '5', 10, 10, 10, 10, '1', '1', '0', '0', '1', '0', '1', '2023-01-28 07:33:18', '2023-01-28 03:25:55'),
(3, '606732cb4ec9b', 'Professional', 'Let\'s start with Professional to bring more and more business', '48', '31', '999', 999, 999, 999, 999, '1', '1', '0', '0', '0', '0', '1', '2023-01-28 07:33:18', '2023-01-28 03:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_enquiry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_adsense_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tawk_chat_bot_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `google_key`, `google_analytics_id`, `google_adsense_code`, `site_name`, `site_logo`, `favicon`, `seo_meta_description`, `seo_keywords`, `seo_image`, `tawk_chat_bot_key`, `name`, `address`, `driver`, `host`, `port`, `encryption`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, '254212fdd454', NULL, NULL, 'Digitalbizads', '/images/web/elements/63d4d84274e3b.png', '/images/web/elements/63d4f09e56e3e.png', 'This is sample meta description', 'keyword 1, keyword 2', '/backend/img/logo.png', NULL, 'DigitalBizAds', 'noreply@digitalbizads.com', 'smtp', 'smtp.mailtrap.io', 2525, 'tls', '', '', '1', '2023-01-28 07:33:19', '2023-01-28 03:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `card_id`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 2, '2023-02-06 05:22:29', '2023-02-06 05:22:29'),
(2, 'arfmahmud64@gmail.com', 8, '2023-02-07 00:54:40', '2023-02-07 00:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_id`, `theme_name`, `theme_description`, `theme_thumbnail`, `theme_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '7ccc432a06caa', 'Modern vCard Light', 'vCard', 'modern-light.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(2, '7ccc432a06vta', 'Modern vCard Dark', 'vCard', 'modern-dark.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(3, '7ccc432a06cth', 'Classic vCard Light', 'vCard', 'classic-light.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(4, '7ccc432a06vyw', 'Classic vCard Dark', 'vCard', 'classic-dark.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(5, '7ccc432a06ctw', 'Metro vCard Light', 'vCard', 'metro-light.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(6, '7ccc432a06vhd', 'Metro vCard Dark', 'vCard', 'metro-dark.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(7, '7ccc432a06hty', 'Modern Store Light', 'WhatsApp Store', 'modern-store-light.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19'),
(8, '7ccc432a06hju', 'Modern Store Dark', 'WhatsApp Store', 'modern-store-dark.png', 'Free', '1', '2023-01-28 07:33:19', '2023-01-28 07:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `gobiz_transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desciption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `gobiz_transaction_id`, `transaction_date`, `transaction_id`, `user_id`, `plan_id`, `desciption`, `payment_gateway_name`, `transaction_currency`, `transaction_amount`, `invoice_number`, `invoice_prefix`, `invoice_details`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '63d4ebc621a75', '2023-01-28 09:32:54', '63d4ebc621add', '2', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"1234\",\"to_billing_zipcode\":\"1214\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-01-28 03:32:54', '2023-01-28 03:32:54'),
(2, '63da692aa085d', '2023-02-01 13:29:14', '63da692aa08d9', '3', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Arifur\",\"to_billing_address\":\"werwer\",\"to_billing_city\":\"werwer\",\"to_billing_state\":\"werwr\",\"to_billing_zipcode\":\"1215\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01710788565\",\"to_billing_email\":\"arfmahmud64@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-01 07:29:14', '2023-02-01 07:29:14'),
(3, '63e0dfc17d31e', '2023-02-06 11:08:49', '63e0dfc17d3d8', '4', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"abc\",\"to_billing_address\":\"dasdasd\",\"to_billing_city\":\"asdasd\",\"to_billing_state\":\"asdasd\",\"to_billing_zipcode\":\"234324\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01710788656\",\"to_billing_email\":\"abc@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-06 05:08:49', '2023-02-06 05:08:49'),
(4, '63e104ff24e19', '2023-02-06 13:47:43', '63e104ff24e74', '5', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":\"user@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-06 07:47:43', '2023-02-06 07:47:43'),
(5, '63e1051373df0', '2023-02-06 13:48:03', '63e1051373e44', '5', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":\"asas\",\"to_billing_city\":\"asas\",\"to_billing_state\":\"234324\",\"to_billing_zipcode\":\"24234234\",\"to_billing_country\":\"Albania\",\"to_billing_phone\":\"324234324234234\",\"to_billing_email\":\"user@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-06 07:48:03', '2023-02-06 07:48:03'),
(6, '63e10575124f1', '2023-02-06 13:49:41', '63e105751259b', '5', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":\"asas\",\"to_billing_city\":\"asas\",\"to_billing_state\":\"234324\",\"to_billing_zipcode\":\"24234234\",\"to_billing_country\":\"Albania\",\"to_billing_phone\":\"324234324234234\",\"to_billing_email\":\"user@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-06 07:49:41', '2023-02-06 07:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_validity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_activation_date` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `auth_type`, `profile_image`, `plan_id`, `term`, `plan_details`, `plan_validity`, `plan_activation_date`, `billing_name`, `type`, `vat_number`, `billing_address`, `billing_city`, `billing_state`, `billing_zipcode`, `billing_country`, `billing_phone`, `billing_email`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '609c03880ee47', 'Admin', 'arobil@gmail.com', 1, NULL, '$2y$10$6CTjoLHHCVY.tN8.ZQ3GJOAzdAAP/x5fw.dvBsINrZsz.3ftLdBsK', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-28 07:33:19', '2023-01-28 02:07:48'),
(2, '63d4eb634a936', 'Rony', 'ronymia.tech@gmail.com', 2, NULL, '$2y$10$keJSi20npNuj/Fkxz4S9O.Oc2eCjjcpTGD4p1uwenVIU/mq2031Gu', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-01-28T09:25:26.000000Z\"}', '2022-02-28 09:32:54', '2023-01-28 03:32:54', 'Rony', 'personal', '123', 'dhaka', 'dhaka', '1234', '1214', 'Bangladesh', '01990572321', 'ronymia.tech@gmail.com', 1, NULL, '2023-01-28 03:31:15', '2023-02-01 05:44:07'),
(3, '63da686ca8829', 'Arifur', 'arfmahmud64@gmail.com', 2, NULL, '$2y$10$J4rrUSjTJmWmYVrbBIFBTuy4JQaKfMPuke.wxeTkgsLc8WuCZVige', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-01-28T09:25:26.000000Z\"}', '2023-03-04 13:29:14', '2023-02-01 07:29:14', 'Arifur', 'personal', NULL, 'werwer', 'werwer', 'werwr', '1215', 'Bangladesh', '01710788565', 'arfmahmud64@gmail.com', 1, NULL, '2023-02-01 07:26:04', '2023-02-01 07:29:14'),
(4, '63e0df9744e7d', 'abc', 'abc@gmail.com', 2, NULL, '$2y$10$ShZPrYQe2crfLjCZck/hUeE4oIOw3sugk65dkr35YtY4S86V9Sn3.', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-01-28T09:25:26.000000Z\"}', '2023-03-09 11:08:49', '2023-02-06 05:08:49', 'abc', 'personal', NULL, 'dasdasd', 'asdasd', 'asdasd', '234324', 'Bangladesh', '01710788656', 'abc@gmail.com', 1, NULL, '2023-02-06 05:08:07', '2023-02-06 05:08:49'),
(5, '63e104e8c47aa', 'user', 'user@gmail.com', 2, NULL, '$2y$10$H7/2679kGmQm/3WqOKUYJu9INy4VJPj1gfWbaIkLVs7DxObtkQ2e.', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-01-28T09:25:26.000000Z\"}', '2023-03-09 13:49:41', '2023-02-06 07:49:41', 'user', 'personal', NULL, 'asas', 'asas', '234324', '24234234', 'Albania', '324234324234234', 'user@gmail.com', 1, NULL, '2023-02-06 07:47:20', '2023-02-06 07:49:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_cards`
--
ALTER TABLE `business_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_cards_card_url_unique` (`card_url`),
  ADD KEY `fk_business_cards_users` (`user_id`);

--
-- Indexes for table `business_fields`
--
ALTER TABLE `business_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_gallery`
--
ALTER TABLE `card_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_cards`
--
ALTER TABLE `business_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_fields`
--
ALTER TABLE `business_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_gallery`
--
ALTER TABLE `card_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_cards`
--
ALTER TABLE `business_cards`
  ADD CONSTRAINT `fk_business_cards_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
