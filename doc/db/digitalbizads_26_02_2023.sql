-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 05:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `theme_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adsname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_border_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `header_text_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_backgroung` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_font_family` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `business_cards`
--

INSERT INTO `business_cards` (`id`, `card_id`, `user_id`, `theme_id`, `adsname`, `theme_color`, `icon_border_color`, `card_lang`, `cover`, `logo`, `card_url`, `card_type`, `title`, `sub_title`, `description`, `phone_number`, `email`, `cashapp`, `website`, `footer_text`, `card_status`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `header_text_color`, `header_backgroung`, `banner_content`, `banner_type`, `location`, `header_font_family`, `about_us`, `profile`) VALUES
(1, '63da699314b0a', 3, '1', 'Arifur New Shop', '#08e756', NULL, 'en', NULL, NULL, '63da699314b0a', 'vcard', 'Arifur New Shop1', NULL, NULL, '01710788656', 'arifur@gmail.com', 'arifurrahmansw3', 'https://mailtrap.io/', 'assfasfasf', 'activated', 1, '2023-02-01 07:30:59', 3, '2023-02-01 00:30:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '63db6326db83c', 4, NULL, 'First Ads', '#d507ce', NULL, 'en', NULL, NULL, 'ronymia', 'vcard', 'First Ads', NULL, NULL, '8801767671133', 'ronymia.tech@gmail.com', 'MyCashApp12', NULL, 'All Rights Reserved', 'activated', 1, '2023-02-02 14:15:50', 4, '2023-02-13 11:50:41', 4, NULL, NULL, '#ffffff', '#fa0000', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '63db6b44e1d05', 6, NULL, '901 Print Kings', '#2e063d', NULL, 'en', NULL, NULL, '63db6b44e1d05', 'vcard', '901 PRINT KINGS', NULL, NULL, '6625491457', '901PrintKings@gmail.com', '$901printkings', NULL, '@901printkings2023', 'activated', 1, '2023-02-02 14:50:28', 6, '2023-02-12 10:00:07', 6, NULL, NULL, '#ffffff', '#4e2876', 'https://digitalbizads.com//assets/uploads/gallery/3b61ba01-3fc3-4c70-8073-cc7ee98ca905-63e21b21cd13f.png', 'banner', NULL, NULL, NULL, NULL),
(6, '63df221fcdd1e', 2, NULL, 'Webdevs', '#ba8c0d', '#eb8d0a', 'en', NULL, NULL, 'webdevs', 'vcard', 'Arobil IT Limited Company', NULL, NULL, '8801767671133', 'ronymia.tech@gmail.com', 'mycashapp', 'https://webdevs4u.com/', 'All Rights Reserved', 'activated', 1, '2023-02-05 10:27:27', 2, '2023-02-13 14:08:09', 2, NULL, NULL, '#ffffff', '#e74b08', 'assets/uploads/banner/1676297124.png', 'banner', 'https://www.google.com/maps/place/Arobil+Limited/@23.751684,90.392024,15z/data=!4m2!3m1!1s0x0:0xaca32a89a9dbca8?sa=X&ved=2ahUKEwjInOHT1JL9AhXkzDgGHbhbAZgQ_BJ6BAgyEAg', 'Arial', NULL, NULL),
(7, '63df22fd66f28', 2, NULL, 'Asia Pacific Hotel', '#e4861b', NULL, 'en', NULL, 'assets/uploads/logo/1675933884.png', 'asiapacifichotel', 'vcard', NULL, NULL, NULL, '8801990572321', 'ronymia.tech@gmail.com', 'cashapp', 'https://webdevs4u.com/', 'all rights reserved', 'activated', 1, '2023-02-05 10:31:09', 2, '2023-02-09 09:11:29', 2, NULL, NULL, '#ffffff', '#e87211', 'assets/uploads/banner/1675933702.png', 'banner', NULL, NULL, NULL, NULL),
(8, '63df6e33b454c', 2, NULL, 'Rony', '#73ff00', NULL, 'en', NULL, 'assets/uploads/logo/cms-63e235d3dafad.png', 'rony', 'vcard', NULL, NULL, NULL, '1794798227', 'mdmridul6088@gmail.com', 'MyCashApp', 'https://webdevs4u.com/', 'all rights reserved', 'activated', 1, '2023-02-05 15:52:03', 2, '2023-02-07 14:32:12', 2, NULL, NULL, '#d9b5b5', '#e53434', 'https://www.youtube.com/embed/CvY_cV5RWt8', 'videourl', NULL, NULL, NULL, NULL),
(10, '63e26ba1dee94', 9, NULL, 'qeqeqweqweqe', '#d19d01', NULL, 'en', NULL, NULL, '63e26ba1dee94', 'vcard', 'YOU ARE  INVITED', NULL, NULL, '0171078865', 'asas@gmail.com', 'asas', 'https://www.koreaweek2023.com/', 'asas', 'activated', 1, '2023-02-07 22:17:53', 9, '2023-02-11 20:58:58', 9, NULL, NULL, '#000000', '#fdc700', 'assets/uploads/banner/1676148940.png', 'banner', NULL, NULL, NULL, NULL),
(11, '63e48c0607231', 7, NULL, 'Arifur', '#ffffff', NULL, 'en', NULL, NULL, '63e48c0607231', 'vcard', NULL, NULL, NULL, '01710788656', 'arifurr@gmail.com', 'dad', 'http://asdasdasd.com', 'ddsaddd', 'activated', 1, '2023-02-09 13:00:38', 7, '2023-02-09 06:07:03', 7, NULL, NULL, '#0e3258', '#141414', 'https://digitalbizads.com//assets/uploads/videos/video-63e48d87ccc62.mp4', 'videosource', NULL, NULL, NULL, NULL),
(12, '63e7a3e6ec595', 10, NULL, 'Arobil', '#aa7384', '#f3d4e0', 'en', NULL, NULL, '63e7a3e6ec595', 'vcard', 'Unique Braiding', NULL, NULL, '8801767671133', 'raihan@gmail.com', 'mycashapp', 'https://digitalbizads.com/', NULL, 'activated', 1, '2023-02-11 21:19:18', 10, '2023-02-14 11:48:50', 10, NULL, NULL, '#ffffff', '#a27584', NULL, 'banner', NULL, 'Times New Roman', NULL, NULL),
(13, '63e9304cd3ac6', 11, NULL, 'Golden Heart Memories', '#007004', '#000000', 'en', NULL, NULL, '63e9304cd3ac6', 'vcard', 'MEMORIES LAST A LIFETIME', NULL, NULL, '3135802917', 'makeitfancy313@gmail.com', '$donnie718', NULL, NULL, 'inactive', 1, '2023-02-13 01:30:36', 11, '2023-02-14 05:13:28', 11, NULL, NULL, '#ffffff', '#2f6e1e', NULL, 'banner', NULL, 'Arial', NULL, NULL),
(17, '63eb78458037d', 2, NULL, 'Unique Braiding 01', '#aa7384', '#f4a4c0', 'en', NULL, NULL, 'uniquebraiding', 'vcard', 'Unique Braiding', NULL, NULL, '6625491457', '901PrintKings@gmail.com', NULL, NULL, NULL, 'activated', 1, '2023-02-14 19:02:13', 2, '2023-02-15 07:35:28', 2, NULL, NULL, '#ffffff', '#a27584', 'assets/uploads/banner/ad-63ec8b4030b7d.webp', 'banner', NULL, 'Times New Roman', NULL, NULL),
(18, '63eb913b9649c', 12, '1', 'My Digital Business', '#ff0000', '#0031f5', 'en', NULL, NULL, '63eb913b9649c', 'vcard', 'My Digital Business', NULL, NULL, '0171078865', 'arifurrahman@gmail.com', 'cashpp', 'https://icons8.com/line-awesome', NULL, 'inactive', 1, '2023-02-14 20:48:43', 12, '2023-02-14 13:53:39', NULL, NULL, NULL, '#000000', '#ffffff', 'assets/uploads/banner/1676382291.png', 'banner', 'https://www.google.com/maps/search/Unit+10A,+House+21,+Road+17,+Banani+C%2FA,+Dhaka+1213/@23.7896575,90.3996506,15z/data=!3m1!4b1', 'Arial', NULL, NULL),
(19, '63eb94cba005d', 12, NULL, 'My Premium Ac', '#ff0000', '#ffffff', 'en', NULL, 'assets/uploads/logo/1676384111.png', 'personalize', 'vcard', NULL, NULL, NULL, '01710788656', 'arifurr@gmail.com', 'cashapp', 'https://web.whatsapp.com/', 'Copyright', 'activated', 1, '2023-02-14 21:03:55', 12, '2023-02-14 14:15:16', 12, NULL, NULL, '#050000', '#ffffff', 'assets/uploads/banner/1676383020.png', 'banner', 'https://www.google.com/maps/search/Unit+10A,+House+21,+Road+17,+Banani+C%2FA,+Dhaka+1213/@23.7896575,90.3996506,15z/data=!3m1!4b1', 'Arial', NULL, NULL),
(21, '63ec32259e0f5', 12, '1', 'PGF', '#ffc107', '#000000', 'en', NULL, NULL, 'pgadabarber', 'vcard', NULL, NULL, NULL, '6624591457', '901PrintKings@gmail.com', NULL, NULL, NULL, 'activated', 1, '2023-02-15 08:15:17', 12, '2023-02-15 01:15:17', NULL, NULL, NULL, '#ffffff', '#000000', NULL, 'banner', NULL, 'Arial', NULL, NULL),
(22, '63ec663b411fc', 12, NULL, 'Unique Braiding', '#aa7384', '#f9d3e0', 'en', NULL, NULL, 'uniquebraiding01', 'vcard', 'Unique Braiding', NULL, NULL, '6623337654', '901PrintKings@gmail.com', NULL, NULL, NULL, 'activated', 1, '2023-02-15 11:57:31', 12, '2023-02-15 08:09:03', 12, NULL, NULL, '#ffffff', '#a27584', 'assets/uploads/banner/Be-Unique-Braiding-63ec931fd177b.webp', 'banner', NULL, 'Arial', NULL, NULL),
(23, '63f0dd93572aa', 13, '1', 'Test', '#ffc107', '#000000', 'en', NULL, NULL, '63f0dd93572aa', 'vcard', 'Test Card', NULL, NULL, '8801767671133', 'rony@gmail.com', 'mycashapp', 'https://webdevs4u.com', NULL, 'activated', 1, '2023-02-18 21:15:47', 13, '2023-02-18 14:15:47', NULL, NULL, NULL, '#ffffff', '#000000', 'assets/uploads/banner/61Uvy1EJp3L-63f0dd935a749.webp', 'banner', NULL, 'Arial', NULL, NULL),
(24, '63f1b6e32366b', 11, NULL, 'Golden Heart Memories', '#669d34', '#d6d6d6', 'en', NULL, NULL, '63f1b6e32366b', 'vcard', 'MEMORIES LAST A LIFETIME', NULL, NULL, '3135802917', 'makeitfancy313@gmail.com', '$donnie718', NULL, NULL, 'activated', 1, '2023-02-19 12:42:59', 11, '2023-02-19 15:06:57', 11, NULL, NULL, '#ffffff', '#669d34', 'assets/uploads/banner/3DB76CB1-2367-467D-9B6F-0B657BD46F52-63f1b6e32af08.webp', 'banner', NULL, 'Arial', NULL, NULL),
(25, '63f763bf16303', 2, NULL, 'Daraz Shop', '#f56200', '#dd6808', 'en', NULL, NULL, 'darazshop', 'vcard', 'Daraz Shop', NULL, NULL, '8801767671133', 'rony@gmail.com', 'MyCashApp', 'https://webdevs4u.com/', 'all rights reserved', 'activated', 1, '2023-02-23 07:01:51', 2, '2023-02-23 13:05:45', 2, NULL, NULL, '#ffffff', '#e56a06', 'assets/uploads/banner/61Uvy1EJp3L-63f763bf3af5b.webp', 'banner', 'https://www.google.com/maps/@23.7984463,90.4031033,15z', 'Arial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL),
(26, '63f766bd2fe5c', 2, '7ccc432a06hty', NULL, 'purple', NULL, 'en', '/backend/img/vCards/IMG-63f766bd30aa3-img.png.png', NULL, 'digitalbiz', 'store', 'Digitalbiz', 'New Store', '{\"whatsapp_no\":\"8801767671122\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"BMD\",\"email\":\"ronymia.tech@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, '1', 0, '2023-02-23 07:14:37', NULL, '2023-02-23 13:14:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-63f766bd3098a-logo.png.png'),
(27, '63f7692fd87cd', 2, '7ccc432a06hju', NULL, 'blue', NULL, 'en', '/backend/img/vCards/IMG-63f7692fd9d2e-img.png.png', NULL, 'daraz', 'store', 'Daraz', 'darazmall', '{\"whatsapp_no\":\"8801767671133\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"rony@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, '1', 0, '2023-02-23 07:25:03', NULL, '2023-02-23 13:25:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-63f7692fd9939-logo.png.png'),
(28, '63fad638e0fa9', 15, '7ccc432a06hty', NULL, 'green', NULL, 'en', '/backend/img/vCards/IMG-diigtalbiz-banner.jpg.jpg', NULL, 'digitalbizastore', 'store', 'Digitalbizastore', 'Digitalbiz Ads Store', '{\"whatsapp_no\":\"8801767671133\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"BND\",\"email\":\"ronymia.tech@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'inactive', 1, '2023-02-25 21:47:04', NULL, '2023-02-26 04:29:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-63fadca35a238-digitallogo.png.png'),
(29, '63fae0f81aabc', 15, NULL, 'My Ads', '#d35909', '#000000', 'en', NULL, NULL, 'evaly', 'vcard', 'Evaly', NULL, NULL, '8801767671133', 'rony@gmail.com', 'mycashapp', 'https://webdevs4u.com/', 'all rights reserved', 'activated', 1, '2023-02-25 22:32:56', 15, '2023-02-26 04:33:31', 15, NULL, NULL, '#ffffff', '#e08300', 'assets/uploads/banner/61Uvy1EJp3L-63fae0f8279d7.webp', 'banner', NULL, 'Arial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL);

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
(1, 1, 'facebook', 'fab fa-facebook', 'facebook', 'arifurrahmansw1', NULL, '1', '2023-02-01 07:30:59', '2023-02-01 13:30:59'),
(2, 1, 'instagram', 'fab fa-instagram', 'instagram', 'arifurrahmansw2', NULL, '1', '2023-02-01 07:30:59', '2023-02-01 13:30:59'),
(14, 4, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-04 21:01:13', '2023-02-04 14:01:13'),
(15, 4, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-04 21:01:13', '2023-02-04 14:01:13'),
(28, 5, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-05 10:37:04', '2023-02-05 03:37:04'),
(29, 5, 'instagram', 'fab fa-instagram', 'instagram', 'instagram', NULL, '1', '2023-02-05 10:37:04', '2023-02-05 03:37:04'),
(46, 9, 'facebook', 'fab fa-facebook', 'facebook', 'arifurrahmansw', NULL, '1', '2023-02-07 16:28:50', '2023-02-07 09:28:50'),
(47, 9, 'instagram', 'fab fa-instagram', 'instagram', 'arifurrahmansw', NULL, '1', '2023-02-07 16:28:50', '2023-02-07 09:28:50'),
(65, 8, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-07 21:32:12', '2023-02-07 14:32:12'),
(66, 8, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-07 21:32:12', '2023-02-07 14:32:12'),
(89, 11, 'facebook', 'fab fa-facebook', 'facebook', 'asasa', NULL, '1', '2023-02-09 13:07:03', '2023-02-09 06:07:03'),
(90, 11, 'instagram', 'fab fa-instagram', 'instagram', 'aad', NULL, '1', '2023-02-09 13:07:03', '2023-02-09 06:07:03'),
(93, 7, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-09 16:11:29', '2023-02-09 09:11:29'),
(94, 7, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-09 16:11:29', '2023-02-09 09:11:29'),
(105, 10, 'facebook', 'fab fa-facebook', 'facebook', 'arrr', NULL, '1', '2023-02-12 03:58:58', '2023-02-11 20:58:58'),
(106, 10, 'instagram', 'fab fa-instagram', 'instagram', 'asas', NULL, '1', '2023-02-12 03:58:58', '2023-02-11 20:58:58'),
(109, 3, 'facebook', 'fab fa-facebook', 'facebook', 'https://www.facebook.com/profile.php?id=100007747725813&mibextid=LQQJ4d', NULL, '1', '2023-02-12 17:00:07', '2023-02-12 10:00:07'),
(110, 2, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-13 18:50:41', '2023-02-13 11:50:41'),
(111, 2, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-13 18:50:41', '2023-02-13 11:50:41'),
(116, 6, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-13 21:08:09', '2023-02-13 14:08:09'),
(117, 6, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-13 21:08:09', '2023-02-13 14:08:09'),
(140, 12, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-14 18:48:50', '2023-02-14 11:48:50'),
(141, 12, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-14 18:48:50', '2023-02-14 11:48:50'),
(142, 18, 'facebook', 'fab fa-facebook', 'facebook', 'facebook', NULL, '1', '2023-02-14 20:48:48', '2023-02-14 13:48:48'),
(143, 18, 'instagram', 'fab fa-instagram', 'instagram', 'instagram', NULL, '1', '2023-02-14 20:48:48', '2023-02-14 13:48:48'),
(158, 20, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-14 21:11:20', '2023-02-14 14:11:20'),
(159, 20, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-14 21:11:20', '2023-02-14 14:11:20'),
(160, 19, 'facebook', 'fab fa-facebook', 'facebook', 'facebook', NULL, '1', '2023-02-14 21:15:16', '2023-02-14 14:15:16'),
(161, 19, 'instagram', 'fab fa-instagram', 'instagram', 'instgram', NULL, '1', '2023-02-14 21:15:16', '2023-02-14 14:15:16'),
(164, 14, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-15 07:12:11', '2023-02-15 00:12:11'),
(165, 14, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-15 07:12:11', '2023-02-15 00:12:11'),
(168, 16, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-18 07:29:31', '2023-02-18 00:29:31'),
(169, 16, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-18 07:29:31', '2023-02-18 00:29:31'),
(170, 23, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-18 21:15:47', '2023-02-18 14:15:47'),
(171, 23, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-18 21:15:47', '2023-02-18 14:15:47'),
(174, 25, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-23 07:05:45', '2023-02-23 13:05:45'),
(175, 25, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-23 07:05:45', '2023-02-23 13:05:45'),
(178, 29, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-25 22:33:31', '2023-02-26 04:33:31'),
(179, 29, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-25 22:33:31', '2023-02-26 04:33:31');

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
(1, 1, 'assets/uploads/gallery/pexels-daniel-rocha-14857249-63da69931761d.jpg', 'gallery', NULL, '2023-02-01 07:30:59', '2023-02-01 07:30:59'),
(2, 1, 'assets/uploads/gallery/pexels-italo-melo-2379004-63da69931c0b5.jpg', 'gallery', NULL, '2023-02-01 07:30:59', '2023-02-01 07:30:59'),
(3, 1, 'assets/uploads/gallery/pexels-monstera-5384429-63da69931daa7.jpg', 'gallery', NULL, '2023-02-01 07:30:59', '2023-02-01 07:30:59'),
(4, 1, 'assets/uploads/gallery/pexels-moose-photos-1587009-63da69931e8af.jpg', 'gallery', NULL, '2023-02-01 07:30:59', '2023-02-01 07:30:59'),
(5, 1, 'assets/uploads/gallery/pexels-shakin-ahmed-13880214-63da699320668.jpg', 'gallery', NULL, '2023-02-01 07:30:59', '2023-02-01 07:30:59'),
(9, 2, 'assets/uploads/gallery/mwvg2zma_1-(1)-63db634ccfb6d.jpg', 'gallery', NULL, '2023-02-02 14:16:28', '2023-02-02 14:16:28'),
(10, 2, 'assets/uploads/gallery/mwvg2zma_1-63db634ccfedf.jpg', 'gallery', NULL, '2023-02-02 14:16:28', '2023-02-02 14:16:28'),
(11, 3, 'assets/uploads/gallery/09921a49-f39c-4747-b02d-9644253daddd-63db6b44e29f3.png', 'gallery', NULL, '2023-02-02 14:50:28', '2023-02-02 14:50:28'),
(12, 3, 'assets/uploads/gallery/71370493-b1d0-4a60-8e5b-f574ce649661-63db6b44e33fa.png', 'gallery', NULL, '2023-02-02 14:50:28', '2023-02-02 14:50:28'),
(15, 4, 'assets/uploads/gallery/mwvg2zma_1-(1)-63db97d5dae1c.jpg', 'gallery', NULL, '2023-02-02 18:00:37', '2023-02-02 18:00:37'),
(16, 4, 'assets/uploads/gallery/mwvg2zma_1-63db97d5db2cf.jpg', 'gallery', NULL, '2023-02-02 18:00:37', '2023-02-02 18:00:37'),
(17, 5, 'https://digitalbizads.com//assets/uploads/videos/2023-01-29-19-46-23-63df20a0b68a8.mp4', 'videosource', NULL, '2023-02-05 03:21:06', '2023-02-05 03:21:06'),
(22, 8, 'assets/uploads/gallery/ezgif-63df6e4f441c0.webp', 'gallery', NULL, '2023-02-05 15:52:31', '2023-02-05 15:52:31'),
(23, 9, 'assets/uploads/gallery/pexels-brynna-spencer-227294-63e20ff88feec.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(24, 9, 'assets/uploads/gallery/pexels-daniel-rocha-14857249-63e20ff890dbc.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(25, 9, 'assets/uploads/gallery/pexels-jeffrey-reed-769772-63e20ff891795.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(26, 9, 'assets/uploads/gallery/pexels-monstera-5384429-63e20ff891df3.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(27, 9, 'assets/uploads/gallery/pexels-moose-photos-1587009-63e20ff892067.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(28, 9, 'assets/uploads/gallery/pexels-shakin-ahmed-13880214-63e20ff892a21.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(29, 9, 'assets/uploads/gallery/pexels-vinicius-wiesehofer-1130623-63e20ff8939c3.jpg', 'gallery', NULL, '2023-02-07 15:46:48', '2023-02-07 15:46:48'),
(30, 9, 'assets/uploads/gallery/pexels-cliford-mervil-2398220-63e219d225232.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(31, 9, 'assets/uploads/gallery/pexels-emmy-e-2381069-63e219d267e08.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(32, 9, 'assets/uploads/gallery/pexels-fauxels-3184306-63e219d268c2b.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(33, 9, 'assets/uploads/gallery/pexels-fauxels-3184611-63e219d268edd.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(34, 9, 'assets/uploads/gallery/pexels-stefan-stefancik-91227-63e219d26912d.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(35, 9, 'assets/uploads/gallery/pexels-tima-miroshnichenko-5198239-63e219d269adc.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(36, 9, 'assets/uploads/gallery/pexels-vinicius-wiesehofer-1130623-63e219d269d4a.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(37, 9, 'assets/uploads/gallery/pexels-vinicius-wiesehofer-1130626-63e219d26a965.jpg', 'gallery', NULL, '2023-02-07 16:28:50', '2023-02-07 16:28:50'),
(38, 8, 'assets/uploads/gallery/mwvg2zma_1-(1)-63e21ec714762.jpg', 'gallery', NULL, '2023-02-07 16:49:59', '2023-02-07 16:49:59'),
(39, 8, 'assets/uploads/gallery/mwvg2zma_1-63e21ec714dd7.jpg', 'gallery', NULL, '2023-02-07 16:49:59', '2023-02-07 16:49:59'),
(40, 8, 'assets/uploads/gallery/phone-63e21ec71504b.jpg', 'gallery', NULL, '2023-02-07 16:49:59', '2023-02-07 16:49:59'),
(44, 7, 'assets/uploads/gallery/mwvg2zma_1-(1)-63e2329940912.jpg', 'gallery', NULL, '2023-02-07 18:14:33', '2023-02-07 18:14:33'),
(45, 7, 'assets/uploads/gallery/mwvg2zma_1-(1)-63e263686a34e.jpg', 'gallery', NULL, '2023-02-07 21:42:48', '2023-02-07 21:42:48'),
(46, 7, 'assets/uploads/gallery/mwvg2zma_1-63e263686a748.jpg', 'gallery', NULL, '2023-02-07 21:42:48', '2023-02-07 21:42:48'),
(47, 11, 'assets/uploads/banner/pexels-archie-binamira-705075-63e48c0609344.jpg', 'gallery', NULL, '2023-02-09 13:00:39', '2023-02-09 13:00:39'),
(48, 11, 'assets/uploads/banner/pexels-brynna-spencer-227294-63e48c073da12.jpg', 'gallery', NULL, '2023-02-09 13:00:40', '2023-02-09 13:00:40'),
(49, 11, 'assets/uploads/banner/pexels-cliford-mervil-2398220-63e48c085b7fa.jpg', 'gallery', NULL, '2023-02-09 13:00:42', '2023-02-09 13:00:42'),
(50, 11, 'assets/uploads/banner/pexels-daniel-rocha-14857249-63e48c0a1205c.jpg', 'gallery', NULL, '2023-02-09 13:00:43', '2023-02-09 13:00:43'),
(51, 11, 'assets/uploads/banner/pexels-emmy-e-2381069-63e48c0b05140.jpg', 'gallery', NULL, '2023-02-09 13:00:44', '2023-02-09 13:00:44'),
(52, 11, 'assets/uploads/banner/pexels-fauxels-3184611-63e48c0c5cdf2.jpg', 'gallery', NULL, '2023-02-09 13:00:44', '2023-02-09 13:00:44'),
(53, 3, 'assets/uploads/banner/cccce768-131f-42ac-96fd-f31b4c69c21a-63e595c17a1dd.jpeg', 'gallery', NULL, '2023-02-10 07:54:25', '2023-02-10 07:54:25'),
(54, 3, 'assets/uploads/banner/73f1c7b2-6c7b-4a87-86d0-1c78971a47be-63e595c1ab2e4.jpeg', 'gallery', NULL, '2023-02-10 07:54:26', '2023-02-10 07:54:26'),
(55, 3, 'assets/uploads/banner/462f1064-78cf-4545-9fd8-ee28722d24f6-63e595c21ee1b.jpeg', 'gallery', NULL, '2023-02-10 07:54:26', '2023-02-10 07:54:26'),
(56, 3, 'assets/uploads/banner/e769a00b-44f4-49c5-bbaa-97a94f2b524f-63e595c24cb2d.jpeg', 'gallery', NULL, '2023-02-10 07:54:26', '2023-02-10 07:54:26'),
(60, 12, 'assets/uploads/banner/3d1y9zamhvmvaccyt7ar3qz096_thumbnail-63e7a3e6eece9.png', 'gallery', NULL, '2023-02-11 21:19:19', '2023-02-11 21:19:19'),
(61, 6, 'assets/uploads/banner/6369e38a629ab1667883914-63ea43c152a2d.jpg', 'gallery', NULL, '2023-02-13 21:05:53', '2023-02-13 21:05:53'),
(62, 14, 'assets/uploads/banner/5f6f1bec255c61601117164-63eb24af56c1d.jpg', 'gallery', NULL, '2023-02-14 13:05:35', '2023-02-14 13:05:35'),
(63, 14, 'assets/uploads/banner/5f6f1d4bc69e71601117515-63eb24af681ce.jpg', 'gallery', NULL, '2023-02-14 13:05:35', '2023-02-14 13:05:35'),
(64, 16, 'assets/uploads/banner/5f6f1bec255c61601117164-63eb73b07a05b.jpg', 'gallery', NULL, '2023-02-14 18:42:40', '2023-02-14 18:42:40'),
(65, 16, 'assets/uploads/banner/5f6f1d4bc69e71601117515-63eb73b08b784.jpg', 'gallery', NULL, '2023-02-14 18:42:40', '2023-02-14 18:42:40'),
(66, 18, 'assets/uploads/banner/pexels-archie-binamira-705075-63eb913b988b0.jpg', 'gallery', NULL, '2023-02-14 20:48:44', '2023-02-14 20:48:44'),
(67, 18, 'assets/uploads/banner/pexels-brynna-spencer-227294-63eb913cccc81.jpg', 'gallery', NULL, '2023-02-14 20:48:45', '2023-02-14 20:48:45'),
(68, 18, 'assets/uploads/banner/pexels-cliford-mervil-2398220-63eb913dea0dd.jpg', 'gallery', NULL, '2023-02-14 20:48:47', '2023-02-14 20:48:47'),
(69, 18, 'assets/uploads/banner/pexels-daniel-rocha-14857249-63eb913f9df28.jpg', 'gallery', NULL, '2023-02-14 20:48:48', '2023-02-14 20:48:48'),
(70, 19, 'assets/uploads/banner/pexels-andrea-piacquadio-927022-63eb94cba1d64.jpg', 'gallery', NULL, '2023-02-14 21:03:56', '2023-02-14 21:03:56'),
(71, 19, 'assets/uploads/banner/pexels-archie-binamira-705075-63eb94cca1e67.jpg', 'gallery', NULL, '2023-02-14 21:03:57', '2023-02-14 21:03:57'),
(72, 19, 'assets/uploads/banner/pexels-brynna-spencer-227294-63eb94cdd49f9.jpg', 'gallery', NULL, '2023-02-14 21:03:58', '2023-02-14 21:03:58'),
(73, 19, 'assets/uploads/banner/pexels-cliford-mervil-2398220-63eb94cef28c7.jpg', 'gallery', NULL, '2023-02-14 21:04:00', '2023-02-14 21:04:00'),
(74, 20, 'assets/uploads/banner/5f6f1bec255c61601117164-63eb968820c53.jpg', 'gallery', NULL, '2023-02-14 21:11:20', '2023-02-14 21:11:20'),
(75, 20, 'assets/uploads/banner/5f6f1d4bc69e71601117515-63eb968831c93.jpg', 'gallery', NULL, '2023-02-14 21:11:20', '2023-02-14 21:11:20'),
(76, 22, 'assets/uploads/banner/37dbacc0-6910-4f23-b5ad-36f7b5b7b39b-63ec663b441e8.jpeg', 'gallery', NULL, '2023-02-15 11:57:31', '2023-02-15 11:57:31'),
(77, 22, 'assets/uploads/banner/52c16e71-a69c-4059-b01f-42cc65ea0319-63ec663b496c9.jpeg', 'gallery', NULL, '2023-02-15 11:57:31', '2023-02-15 11:57:31'),
(78, 23, 'assets/uploads/banner/mwvg2zma_1-(1)-63f0dd936142c.jpg', 'gallery', NULL, '2023-02-18 21:15:47', '2023-02-18 21:15:47'),
(79, 23, 'assets/uploads/banner/phone-63f0dd9372242.jpg', 'gallery', NULL, '2023-02-18 21:15:47', '2023-02-18 21:15:47'),
(80, 25, 'assets/uploads/banner/5f6f1d4bc69e71601117515---copy-63f763bfa2bd6.jpg', 'gallery', NULL, '2023-02-23 07:01:52', '2023-02-23 07:01:52'),
(81, 25, 'assets/uploads/banner/5f6f1bec255c61601117164---copy-63f763c0c633b.jpg', 'gallery', NULL, '2023-02-23 07:01:53', '2023-02-23 07:01:53'),
(82, 29, 'assets/uploads/banner/61uvy1ejp3l-63fae0f84b9ca.jpg', 'gallery', NULL, '2023-02-25 22:32:56', '2023-02-25 22:32:56'),
(83, 29, 'assets/uploads/banner/mwvg2zma_1-(1)-63fae0f896c0a.jpg', 'gallery', NULL, '2023-02-25 22:32:56', '2023-02-25 22:32:56'),
(84, 29, 'assets/uploads/banner/mwvg2zma_1-63fae0f8c7319.jpg', 'gallery', NULL, '2023-02-25 22:32:56', '2023-02-25 22:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 'paypal_mode', 'sandbox', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(5, 'paypal_client_id', 'Aa8_7OJaxmCZQpkx3hbzdySDz7haM0Wu6c6MmzX5JQsaywY1i8HMJo2ddnr9-pEEoRP3qvjflrxOVoXL', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(6, 'paypal_secret', 'EFeiHIyAcO6F3C8Pex4MZbqfZOPCu55J1tNZGfnNRqMwEty8azLoPQSsFnX63NGLD6q8dA6gMJqcnX2M', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(7, 'razorpay_key', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(8, 'razorpay_secret', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(9, 'term', 'monthly', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(10, 'stripe_publishable_key', 'pk_test_51M9pqYBIRmXVjgUGW3b1i91X0uTNeU6umRaoD9UprcFLotiHpfdBwgr4MnkbZoPuKKPFmdWJFVzWTwvUgxBrcl1d00OcqJU0Ta', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(11, 'stripe_secret', 'sk_test_51M9pqYBIRmXVjgUG4VjKaH21Jm0s6KvLTcIZ6fgTqpvfIbfuVocHbjn4vOeVHX6yrJekPPw4xfphkU4EN7ItAqr500Q3kUMHc8', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
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
(3, '60964410732t9', '/backend/img/payment-method/stripe.png', 'Stripe', 'Stripe', '10', '11', 'enabled', '1', '2023-01-28 07:33:18', '2023-02-18 10:21:43'),
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

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `media_id`, `user_id`, `media_name`, `media_url`, `created_at`, `updated_at`) VALUES
(1, '63fad4d3607d7', '63fad0da009a2', 'mwvg2zma_1 (1).jpg', 'images/63fad0da009a2-63fad4d3607d7.jpg', '2023-02-25 21:41:07', '2023-02-25 21:41:07'),
(2, '63fad4d3e6e47', '63fad0da009a2', 'mwvg2zma_1.jpg', 'images/63fad0da009a2-63fad4d3e6e47.jpg', '2023-02-25 21:41:07', '2023-02-25 21:41:07'),
(3, '63fad4d444646', '63fad0da009a2', 'No_Image_Available.jpg', 'images/63fad0da009a2-63fad4d444646.jpg', '2023-02-25 21:41:08', '2023-02-25 21:41:08'),
(4, '63fad4d48db28', '63fad0da009a2', 'phone.jpg', 'images/63fad0da009a2-63fad4d48db28.jpg', '2023-02-25 21:41:08', '2023-02-25 21:41:08'),
(5, '63fadd1a172dd', '63fad0da009a2', '1651409070dk2.jpg', 'images/63fad0da009a2-63fadd1a172dd.jpg', '2023-02-25 22:16:26', '2023-02-25 22:16:26'),
(6, '63fadd29cbf2e', '63fad0da009a2', 'TOSef1.jpg', 'images/63fad0da009a2-63fadd29cbf2e.jpg', '2023-02-25 22:16:41', '2023-02-25 22:16:41');

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
(1, 'home', 'banner', 'banner_title', 'Create your DigitalBizADS', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(2, 'home', 'banner', 'banner_description', 'Digitalbizads is a Digital Business Ads Maker. You can create your own Digital Ads to attract your customers.', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(3, 'home', 'banner', 'banner_button_1', 'Sign up now', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(4, 'home', 'banner', 'banner_button_1_link', '/login', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(5, 'home', 'banner', 'banner_button_2', 'How it works', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(6, 'home', 'banner', 'banner_button_2_link', '#how-it-works', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(7, 'home', 'works', 'work_mini_title', 'How it works?', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(8, 'home', 'works', 'work_title', 'Create, share & get more customers', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(9, 'home', 'works', 'work_description', 'Register a new account, create your own digital biz ad, share your unique link and get more customers.', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(10, 'home', 'works', 'work_li_title_1', 'Create digital biz ad', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(11, 'home', 'works', 'work_li_title_2', 'Share your link', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(12, 'home', 'works', 'work_li_title_3', 'Get more customers', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(13, 'home', 'works', 'work_card_title_1', 'Photo gallery', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(14, 'home', 'works', 'work_card_description_1', 'You can create photo gallery of your products', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(15, 'home', 'works', 'work_card_title_2', 'Contact Listing', '2023-01-28 07:33:21', '2023-01-28 07:33:21'),
(16, 'home', 'works', 'work_card_description_2', 'You can list your contact informations in your digital biz ad.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(17, 'home', 'works', 'work_card_title_3', 'Save DigitalBizAds', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(18, 'home', 'works', 'work_card_description_3', 'You can save your digitalbizads and you can create multiple digitalbizads', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(19, 'home', 'works', 'work_card_title_4', 'Best for Businesses', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(20, 'home', 'works', 'work_card_description_4', 'Digitalbizads will help you to transform your card visitors into customers.', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
(21, 'home', 'features', 'feature_mini_title', 'Why Digital Business Ad', '2023-01-28 07:33:22', '2023-01-28 07:33:22'),
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
  `no_of_features` int(11) DEFAULT NULL,
  `no_of_payments` int(11) DEFAULT NULL,
  `personalized_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide_branding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_setup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_support` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_private` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_whatsapp_store` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `plan_name`, `plan_description`, `plan_price`, `validity`, `no_of_vcards`, `no_of_services`, `no_of_galleries`, `no_of_features`, `no_of_payments`, `personalized_link`, `hide_branding`, `free_setup`, `free_support`, `recommended`, `is_private`, `status`, `created_at`, `updated_at`, `is_whatsapp_store`) VALUES
(1, '60673288f0d35', 'Beginner', 'You can take your Biginner plan to start your first Journey !!', '0', '7', '1', 20, 1, NULL, NULL, '0', '0', '0', '0', '0', '0', '1', '2023-01-28 07:33:18', '2023-02-25 22:02:44', 1),
(2, '606732aa4fb58', 'Intermediate', 'It is our popular plan to start business with us', '36', '31', '5', 10, 10, NULL, NULL, '1', '1', '0', '0', '1', '0', '1', '2023-01-28 07:33:18', '2023-02-25 22:01:24', 1),
(3, '606732cb4ec9b', 'Professional', 'Let\'s start with Professional to bring more and more business', '48', '31', '5', 999, 1, NULL, NULL, '1', '1', '0', '0', '0', '0', '1', '2023-01-28 07:33:18', '2023-02-16 21:23:34', 0),
(4, '63eb18462adec', 'Owner Account', 'Free account for owners', '0', '9999', '999', 999, 999, NULL, NULL, '1', '1', '0', '0', '0', '1', '1', '2023-02-14 12:12:38', '2023-02-14 12:12:38', 0);

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
(1, '254212fdd454', NULL, NULL, 'Digitalbizads', '/images/web/elements/63d4d84274e3b.png', '/images/web/elements/63d4f09e56e3e.png', 'This is sample meta description', 'keyword 1, keyword 2', '/backend/img/logo.png', NULL, 'DigitalBizAds', 'donotreply@digitalbizads.com', 'smtp', 'p3plzcpnl499959.prod.phx3.secureserver.net', 465, 'tls', 'donotreply@digitalbizads.com', 't&=az5DJ!)9D', '1', '2023-01-28 07:33:19', '2023-01-28 03:53:34');

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

--
-- Dumping data for table `store_products`
--

INSERT INTO `store_products` (`id`, `card_id`, `product_id`, `badge`, `product_image`, `product_name`, `product_subtitle`, `regular_price`, `sales_price`, `product_status`, `status`, `created_at`, `updated_at`) VALUES
(4, '63fad638e0fa9', '63fadd3d17f34', 'In Stock', 'images/63fad0da009a2-63fadd29cbf2e.jpg', 'Fields Of Europe® Romance', 'Inspired by the rich beauty of the European countryside', '250', '200', 'instock', '1', '2023-02-25 22:17:01', '2023-02-25 22:17:01'),
(5, '63fad638e0fa9', '63fadd3d28328', 'In Stock', 'images/63fad0da009a2-63fadd1a172dd.jpg', 'DKNY Women\'s Bryant Bucket', 'Textured leather crossbody, featuring a zip top closure and chain detailed shoulder strap', '500', '450', 'instock', '1', '2023-02-25 22:17:01', '2023-02-25 22:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`, `card_id`) VALUES
(1, 'angcon26101999@gmail.com', '2022-08-13 04:34:13', '2022-08-13 04:34:13', NULL),
(2, 'fdsf@gmail.com', '2023-01-01 17:18:50', NULL, NULL),
(3, 'rabin@gmail.com', '2023-01-01 17:19:04', NULL, NULL),
(4, 'rabin@gmail.com', '2023-01-01 17:19:09', NULL, NULL),
(5, 'rabin@gmail.com', '2023-01-01 17:19:16', NULL, NULL),
(6, 'ronymia.tech@gmail.com', '2023-01-08 18:31:23', NULL, NULL),
(7, 'rony@gmail.com', '2023-01-08 18:35:57', NULL, NULL),
(8, 'sakil@gmail.com', '2023-01-22 18:34:34', NULL, NULL),
(9, 'nayeem@gmail.com', '2023-01-22 19:47:53', NULL, NULL),
(10, 'sakib@gmail.com', '2023-01-22 19:50:41', NULL, NULL),
(11, 'admin@gmail.com', '2023-02-02 17:45:36', '2023-02-02 17:45:36', 2),
(12, 'admin2@gmail.com', '2023-02-05 15:53:50', '2023-02-05 15:53:50', 8),
(13, 'ron11y@gmail.com', '2023-02-07 18:22:17', '2023-02-07 18:22:17', 7),
(14, 'ranassss@gmail.com', '2023-02-07 22:37:09', '2023-02-07 22:37:09', 7);

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
(3, '63db6171e9989', '2023-02-02 07:08:34', 'pi_3MWwuMGh5kKYxQzX0n1KKAOv', '4', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '24', '1', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+880199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"5464\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":24,\"subtotal\":\"24\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-02 14:08:34', '2023-02-02 14:08:54'),
(4, '63db6640eb482', '2023-02-02 07:29:04', '63db6640eb4ad', '6', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Sherman Bowen\",\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":\"901PrintKings@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-02 14:29:04', '2023-02-02 14:29:04'),
(5, '63db975b9c6f4', '2023-02-02 10:58:35', 'pi_3MX0UxGh5kKYxQzX0PRHScKz', '2', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '24', '2', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"1234\",\"to_billing_zipcode\":\"1214\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":24,\"subtotal\":\"24\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-02 17:58:35', '2023-02-02 17:58:47'),
(6, '63e20eea79014', '2023-02-07 08:42:18', '63e20eea79043', '7', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Arifur\",\"to_billing_address\":\"Banani Dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1212\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":null,\"to_billing_email\":\"arifur@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-07 15:42:18', '2023-02-07 15:42:18'),
(7, '63e26a239f8b0', '2023-02-07 15:11:31', '63e26a239f913', '9', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":\"asas\",\"to_billing_city\":\"asas\",\"to_billing_state\":\"asas\",\"to_billing_zipcode\":\"242342\",\"to_billing_country\":\"Aland Islands\",\"to_billing_phone\":\"01710785555\",\"to_billing_email\":\"user2@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-07 22:11:31', '2023-02-07 22:11:31'),
(8, '63e7a2986155f', '2023-02-11 14:13:44', '63e7a2986158c', '10', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+880199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-11 21:13:44', '2023-02-11 21:13:44'),
(9, '63e90a9e703a1', '2023-02-12 15:49:50', '63e90a9e703cf', '11', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-12 22:49:50', '2023-02-12 22:49:50'),
(10, '63eb1878a52b0', '2023-02-14 05:13:28', '', '11', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '3', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-14 12:13:28', '2023-02-14 12:13:28'),
(11, '63eb8f909d64e', '2023-02-14 13:41:36', '63eb8f909d682', '12', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Abdullah\",\"to_billing_address\":\"Unit 10A, House 21, Road 17, Banani C\\/A, Dhaka 1213\",\"to_billing_city\":\"Banani\",\"to_billing_state\":\"Banani\",\"to_billing_zipcode\":\"1212\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01710788656\",\"to_billing_email\":\"abdullah@gmail.com\",\"to_vat_number\":\"123456\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-14 20:41:36', '2023-02-14 20:41:36'),
(12, '63eb9263ae98e', '2023-02-14 13:53:39', '', '12', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '24', '4', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Abdullah\",\"to_billing_address\":\"Unit 10A, House 21, Road 17, Banani C\\/A, Dhaka 1213\",\"to_billing_city\":\"Banani\",\"to_billing_state\":\"Banani\",\"to_billing_zipcode\":\"1212\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01710788656\",\"to_billing_email\":\"abdullah@gmail.com\",\"to_vat_number\":\"123456\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":24,\"subtotal\":\"24\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-14 20:53:39', '2023-02-14 20:53:39'),
(13, '63f0dd57a7940', '2023-02-18 14:14:47', '63f0dd57a796c', '13', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Anis\",\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":\"anis@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-18 21:14:47', '2023-02-18 21:14:47'),
(14, '63f9fa5a76375', '2023-02-25 12:09:01', 'pi_3MfMYiBvw926rAz916hhW0Yv', '14', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '36', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"1234\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'PENDING', '1', '2023-02-25 06:09:01', '2023-02-25 06:09:01'),
(15, '63f9fb9d50c61', '2023-02-25 12:14:22', 'pi_3MfMduBIRmXVjgUG0A47ZrXj', '14', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '36', '5', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"1234\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 06:14:22', '2023-02-25 06:14:37'),
(16, '63fad0f134e6b', '2023-02-26 03:24:36', 'pi_3MfaqkBIRmXVjgUG08A1hwF9', '15', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '36', '6', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 21:24:36', '2023-02-25 21:24:52'),
(17, '63fad27e82bf7', '2023-02-26 03:31:10', '63fad27e82c53', '15', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 21:31:10', '2023-02-25 21:31:10'),
(18, '63fad9a276592', '2023-02-26 04:01:39', 'pi_3MfbQdBIRmXVjgUG0wP7RhiH', '15', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '36', '7', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 22:01:39', '2023-02-25 22:01:55'),
(19, '63fada003f31f', '2023-02-26 04:03:12', '', '15', '60673288f0d35', 'Beginner Plan', 'Offline', 'USD', '0', '8', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 22:03:12', '2023-02-25 22:03:12'),
(20, '63fada178784d', '2023-02-26 04:03:35', '', '15', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '9', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony Islam\",\"to_billing_address\":\"dhaka, banani\\r\\ndhaka\",\"to_billing_city\":\"Chittoor\",\"to_billing_state\":\"ANDHRA PRADESH\",\"to_billing_zipcode\":\"1213\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"0199057232\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 22:03:35', '2023-02-25 22:03:35');

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
(2, '63d4eb634a936', 'Rony', 'ronymia.tech@gmail.com', 2, NULL, '$2y$10$keJSi20npNuj/Fkxz4S9O.Oc2eCjjcpTGD4p1uwenVIU/mq2031Gu', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"24\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"10\",\"no_of_galleries\":\"10\",\"no_of_features\":\"10\",\"no_of_payments\":\"10\",\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:55.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-03-05 10:58:47', '2023-02-02 17:58:47', 'Rony', 'personal', '123', 'dhaka', 'dhaka', '1234', '1214', 'Bangladesh', '01990572321', 'ronymia.tech@gmail.com', 1, NULL, '2023-01-28 03:31:15', '2023-02-02 17:58:47'),
(3, '63da686ca8829', 'Arifur', 'arfmahmud64@gmail.com', 2, NULL, '$2y$10$J4rrUSjTJmWmYVrbBIFBTuy4JQaKfMPuke.wxeTkgsLc8WuCZVige', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-01-28T09:25:26.000000Z\"}', '2023-03-04 13:29:14', '2023-02-01 07:29:14', 'Arifur', 'personal', NULL, 'werwer', 'werwer', 'werwr', '1215', 'Bangladesh', '01710788565', 'arfmahmud64@gmail.com', 1, NULL, '2023-02-01 07:26:04', '2023-02-01 07:29:14'),
(4, '63db60a48038d', 'Rony', 'ronymia2211@gmail.com', 2, NULL, '$2y$10$Gyu0EsLCxFj4KxoAji2lV..FijcCautOXc/rXS0tcQm8r62uBm4/W', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"24\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"10\",\"no_of_galleries\":\"10\",\"no_of_features\":\"10\",\"no_of_payments\":\"10\",\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:55.000000Z\"}', '2023-03-05 07:08:54', '2023-02-02 14:08:54', 'Rony Islam', 'personal', '5464', 'dhaka, banani\r\ndhaka', 'Chittoor', 'ANDHRA PRADESH', '1213', 'Bangladesh', '+880199057232', 'ronymia.tech@gmail.com', 1, NULL, '2023-02-02 14:05:08', '2023-02-02 14:08:54'),
(5, '63db64d839019', 'Sherman', 'showoffgrafixs@gmail.com', 2, NULL, '$2y$10$bZMe8MZVkp.aCKy08Modi.1pk.4cvtLhcjszkoANOIubCxURVLbwm', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-02 14:23:04', '2023-02-02 14:23:04'),
(6, '63db65d204043', 'Sherman Bowen', '901PrintKings@gmail.com', 2, NULL, '$2y$10$aQu3NoLM9fW/6oCIeY9eduBICkzmoERv9i.wwTF4zc1eq5HLmE4h.', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":\"5\",\"no_of_galleries\":\"5\",\"no_of_features\":\"5\",\"no_of_payments\":\"5\",\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:26.000000Z\"}', '2023-03-05 07:29:04', '2023-02-02 14:29:04', 'Sherman Bowen', 'personal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '901PrintKings@gmail.com', 1, NULL, '2023-02-02 14:27:14', '2023-02-02 14:29:04'),
(7, '63e20ebb55d77', 'Arifur', 'arifur@gmail.com', 2, NULL, '$2y$10$Hp86S3TRTWpOYXcdTSdmXOvzvKK5ntiojvJX2d4odST./m/xecEx6', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":\"5\",\"no_of_galleries\":\"5\",\"no_of_features\":\"5\",\"no_of_payments\":\"5\",\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:26.000000Z\"}', '2023-03-10 08:42:18', '2023-02-07 15:42:18', 'Arifur', 'personal', NULL, 'Banani Dhaka', 'dhaka', 'dhaka', '1212', 'Bangladesh', NULL, 'arifur@gmail.com', 1, NULL, '2023-02-07 15:41:31', '2023-02-07 15:42:18'),
(8, '63e261a3554e2', 'Arman', 'arman@gmail.com', 2, NULL, '$2y$10$KdS18TijPnEn3moptDrV1OQAbRLxsjXjNOMHFRhAuiTkhvt69L5ge', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-07 21:35:15', '2023-02-07 21:35:15'),
(9, '63e26a04a0034', 'user', 'user2@gmail.com', 2, NULL, '$2y$10$oDOlIJjt6DDjWq0jXUF4Z.m3Ta7FL/1UiaAEJyiFXKy63lZACMpii', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":\"5\",\"no_of_galleries\":\"5\",\"no_of_features\":\"5\",\"no_of_payments\":\"5\",\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:26.000000Z\"}', '2023-03-10 15:11:31', '2023-02-07 22:11:31', 'user', 'personal', NULL, 'asas', 'asas', 'asas', '242342', 'Aland Islands', '01710785555', 'user2@gmail.com', 1, NULL, '2023-02-07 22:11:00', '2023-02-07 22:11:31'),
(10, '63e7a279118f3', 'Jabir', 'jabir@gmail.com', 2, NULL, '$2y$10$rtAKOlYL7CaDXJtPtT.fku7ZPLcS5CKVPEVeZBNI3nXRkSl2t5CcS', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":\"5\",\"no_of_galleries\":\"5\",\"no_of_features\":\"5\",\"no_of_payments\":\"5\",\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:26.000000Z\"}', '2023-03-14 14:13:44', '2023-02-11 21:13:44', 'Rony Islam', 'personal', NULL, 'dhaka, banani\r\ndhaka', 'Chittoor', 'ANDHRA PRADESH', '1213', 'Bangladesh', '+880199057232', 'ronymia.tech@gmail.com', 1, NULL, '2023-02-11 21:13:13', '2023-02-11 21:13:44'),
(11, '63e9073664817', 'Doneise', 'dturner071882@gmail.com', 2, NULL, '$2y$10$MuQhsBd6d4/z/c/RT7d90OZgXSgISBCStpqLX1ll6Sg5zQO8wctV6', 'Email', NULL, '63eb18462adec', '9999', '{\"id\":4,\"plan_id\":\"63eb18462adec\",\"plan_name\":\"Owner Account\",\"plan_description\":\"Free account for owners\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"999\",\"no_of_services\":\"999\",\"no_of_galleries\":\"999\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"1\",\"status\":\"1\",\"created_at\":\"2023-02-14T05:12:38.000000Z\",\"updated_at\":\"2023-02-14T05:12:38.000000Z\"}', '2050-07-01 05:13:28', '2023-02-14 12:13:28', 'Doneise Turner', 'personal', NULL, '14235 Rutland', 'Detroit', 'Michigan', '48227', 'United States', '13135802917', 'dturner071882@gmail.com', 1, NULL, '2023-02-12 22:35:18', '2023-02-14 12:13:28'),
(12, '63eb8f51b7e72', 'Abdullah', 'abdullah@gmail.com', 2, NULL, '$2y$10$QIPD9s4IQGh74nDiKDGuaedpCni9TPm.F0ktocHlGhfJvidxLK/oy', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"24\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"10\",\"no_of_galleries\":\"10\",\"no_of_features\":\"10\",\"no_of_payments\":\"10\",\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:55.000000Z\"}', '2023-03-17 13:53:39', '2023-02-14 20:53:39', 'Abdullah', 'personal', '123456', 'Unit 10A, House 21, Road 17, Banani C/A, Dhaka 1213', 'Banani', 'Banani', '1212', 'Bangladesh', '01710788656', 'abdullah@gmail.com', 1, NULL, '2023-02-14 20:40:33', '2023-02-14 20:53:39'),
(13, '63f0dd482ba6e', 'Anis', 'anis@gmail.com', 2, NULL, '$2y$10$PsiiLV0e6CaZBRAlE2Kbte6B7kRJr7IL4OwhPUGXHg9erHf27IKHK', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"7\",\"no_of_vcards\":\"1\",\"no_of_services\":\"1\",\"no_of_galleries\":\"1\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-02-16T14:15:56.000000Z\"}', '2023-02-25 14:14:47', '2023-02-18 21:14:47', 'Anis', 'personal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anis@gmail.com', 1, NULL, '2023-02-18 21:14:32', '2023-02-18 21:14:47'),
(14, '63f9fa31e7887', 'Ahmed', 'ahmed@gmail.com', 2, NULL, '$2y$10$4gLBg315oltPnjIsLwZ2susbq5dN9cmwe61LrBOuVnnbnox1xqbEe', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"36\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":10,\"no_of_galleries\":10,\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-02-18T16:20:53.000000Z\"}', '2023-03-28 12:14:37', '2023-02-25 06:14:37', 'Rony Islam', 'personal', '1234', 'dhaka, banani\r\ndhaka', 'Chittoor', 'ANDHRA PRADESH', '1213', 'Bangladesh', '0199057232', 'ronymia.tech@gmail.com', 1, NULL, '2023-02-25 06:08:18', '2023-02-25 06:14:37'),
(15, '63fad0da009a2', 'babu', 'babu@gmail.com', 2, NULL, '$2y$10$V9KFe6JPKEaKzuP7jLiR1uN6WjSaImDUVySJGnqfx5bIc6deRgIwW', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"36\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":10,\"no_of_galleries\":10,\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-02-26T04:01:24.000000Z\",\"is_whatsapp_store\":1}', '2023-03-29 04:03:35', '2023-02-25 22:03:35', 'Rony Islam', 'personal', '123', 'dhaka, banani\r\ndhaka', 'Chittoor', 'ANDHRA PRADESH', '1213', 'Bangladesh', '0199057232', 'ronymia.tech@gmail.com', 1, NULL, '2023-02-25 21:24:10', '2023-02-25 22:03:35');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `business_fields`
--
ALTER TABLE `business_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_gallery`
--
ALTER TABLE `card_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
