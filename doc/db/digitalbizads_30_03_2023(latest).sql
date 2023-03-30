-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 05:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_store_show` int(1) NOT NULL DEFAULT 0,
  `shop_link_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `business_cards`
--

INSERT INTO `business_cards` (`id`, `card_id`, `user_id`, `theme_id`, `adsname`, `theme_color`, `icon_border_color`, `card_lang`, `cover`, `logo`, `card_url`, `card_type`, `title`, `sub_title`, `description`, `phone_number`, `email`, `cashapp`, `website`, `footer_text`, `card_status`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `header_text_color`, `header_backgroung`, `banner_content`, `banner_type`, `location`, `header_font_family`, `about_us`, `profile`, `is_store_show`, `shop_link_name`) VALUES
(1, '63da699314b0a', 3, '1', 'Arifur New Shop', '#08e756', NULL, 'en', NULL, NULL, '63da699314b0a', 'vcard', 'Arifur New Shop1', NULL, NULL, '01710788656', 'arifur@gmail.com', 'arifurrahmansw3', 'https://mailtrap.io/', 'assfasfasf', 'activated', 1, '2023-02-01 07:30:59', 3, '2023-02-01 00:30:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, '63db6326db83c', 4, NULL, 'First Ads', '#d507ce', NULL, 'en', NULL, NULL, 'ronymia', 'vcard', 'First Ads', NULL, NULL, '8801767671133', 'ronymia.tech@gmail.com', 'MyCashApp12', NULL, 'All Rights Reserved', 'activated', 1, '2023-02-02 14:15:50', 4, '2023-02-13 11:50:41', 4, NULL, NULL, '#ffffff', '#fa0000', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(6, '63df221fcdd1e', 2, NULL, 'Webdevs', '#ba8c0d', '#eb8d0a', 'en', NULL, NULL, 'webdevs', 'vcard', 'Arobil IT Limited Company', NULL, NULL, '8801767671133', 'ronymia.tech@gmail.com', 'mycashapp', 'https://webdevs4u.com/', 'All Rights Reserved', 'inactive', 1, '2023-02-05 10:27:27', 2, '2023-03-05 05:36:25', 2, NULL, NULL, '#ffffff', '#e74b08', 'assets/uploads/banner/1676297124.png', 'banner', 'https://www.google.com/maps/place/Arobil+Limited/@23.751684,90.392024,15z/data=!4m2!3m1!1s0x0:0xaca32a89a9dbca8?sa=X&ved=2ahUKEwjInOHT1JL9AhXkzDgGHbhbAZgQ_BJ6BAgyEAg', 'Arial', NULL, NULL, 0, NULL),
(7, '63df22fd66f28', 2, NULL, 'Asia Pacific Hotel', '#e4861b', NULL, 'en', NULL, 'assets/uploads/logo/1675933884.png', 'asiapacifichotel', 'vcard', NULL, NULL, NULL, '8801990572321', 'ronymia.tech@gmail.com', 'cashapp', 'https://webdevs4u.com/', 'all rights reserved', 'inactive', 1, '2023-02-05 10:31:09', 2, '2023-03-05 05:36:25', 2, NULL, NULL, '#ffffff', '#e87211', 'assets/uploads/banner/1675933702.png', 'banner', NULL, NULL, NULL, NULL, 0, NULL),
(8, '63df6e33b454c', 2, NULL, 'Rony', '#73ff00', NULL, 'en', NULL, 'assets/uploads/logo/cms-63e235d3dafad.png', 'rony', 'vcard', NULL, NULL, NULL, '1794798227', 'mdmridul6088@gmail.com', 'MyCashApp', 'https://webdevs4u.com/', 'all rights reserved', 'activated', 1, '2023-02-05 15:52:03', 2, '2023-03-05 05:45:30', 2, NULL, NULL, '#d9b5b5', '#e53434', 'https://www.youtube.com/embed/CvY_cV5RWt8', 'videourl', NULL, NULL, NULL, NULL, 0, NULL),
(10, '63e26ba1dee94', 9, NULL, 'qeqeqweqweqe', '#d19d01', NULL, 'en', NULL, NULL, '63e26ba1dee94', 'vcard', 'YOU ARE  INVITED', NULL, NULL, '0171078865', 'asas@gmail.com', 'asas', 'https://www.koreaweek2023.com/', 'asas', 'inactive', 1, '2023-02-07 22:17:53', 9, '2023-03-22 11:49:02', 9, NULL, NULL, '#000000', '#fdc700', 'assets/uploads/banner/1676148940.png', 'banner', NULL, NULL, NULL, NULL, 0, NULL),
(11, '63e48c0607231', 7, NULL, 'Arifur', '#ffffff', NULL, 'en', NULL, NULL, '63e48c0607231', 'vcard', NULL, NULL, NULL, '01710788656', 'arifurr@gmail.com', 'dad', 'http://asdasdasd.com', 'ddsaddd', 'activated', 1, '2023-02-09 13:00:38', 7, '2023-02-09 06:07:03', 7, NULL, NULL, '#0e3258', '#141414', 'https://digitalbizads.com//assets/uploads/videos/video-63e48d87ccc62.mp4', 'videosource', NULL, NULL, NULL, NULL, 0, NULL),
(13, '63e9304cd3ac6', 11, NULL, 'Golden Heart Memories', '#007004', '#000000', 'en', NULL, NULL, '63e9304cd3ac6', 'vcard', 'MEMORIES LAST A LIFETIME', NULL, NULL, '3135802917', 'makeitfancy313@gmail.com', '$donnie718', NULL, NULL, 'inactive', 1, '2023-02-13 01:30:36', 11, '2023-02-14 05:13:28', 11, NULL, NULL, '#ffffff', '#2f6e1e', NULL, 'banner', NULL, 'Arial', NULL, NULL, 0, NULL),
(17, '63eb78458037d', 2, NULL, 'Unique Braiding 01', '#aa7384', '#f4a4c0', 'en', NULL, NULL, 'uniquebraiding', 'vcard', 'Unique Braiding', NULL, NULL, '6625491457', '901PrintKings@gmail.com', NULL, NULL, NULL, 'inactive', 1, '2023-02-14 19:02:13', 2, '2023-03-05 05:36:25', 2, NULL, NULL, '#ffffff', '#a27584', 'assets/uploads/banner/ad-63ec8b4030b7d.webp', 'banner', NULL, 'Times New Roman', NULL, NULL, 0, NULL),
(18, '63eb913b9649c', 12, '1', 'My Digital Business', '#ff0000', '#0031f5', 'en', NULL, NULL, '63eb913b9649c', 'vcard', 'My Digital Business', NULL, NULL, '0171078865', 'arifurrahman@gmail.com', 'cashpp', 'https://icons8.com/line-awesome', NULL, 'inactive', 1, '2023-02-14 20:48:43', 12, '2023-02-14 13:53:39', NULL, NULL, NULL, '#000000', '#ffffff', 'assets/uploads/banner/1676382291.png', 'banner', 'https://www.google.com/maps/search/Unit+10A,+House+21,+Road+17,+Banani+C%2FA,+Dhaka+1213/@23.7896575,90.3996506,15z/data=!3m1!4b1', 'Arial', NULL, NULL, 0, NULL),
(19, '63eb94cba005d', 12, NULL, 'My Premium Ac', '#ff0000', '#ffffff', 'en', NULL, 'assets/uploads/logo/1676384111.png', 'personalize', 'vcard', NULL, NULL, NULL, '01710788656', 'arifurr@gmail.com', 'cashapp', 'https://web.whatsapp.com/', 'Copyright', 'activated', 1, '2023-02-14 21:03:55', 12, '2023-02-14 14:15:16', 12, NULL, NULL, '#050000', '#ffffff', 'assets/uploads/banner/1676383020.png', 'banner', 'https://www.google.com/maps/search/Unit+10A,+House+21,+Road+17,+Banani+C%2FA,+Dhaka+1213/@23.7896575,90.3996506,15z/data=!3m1!4b1', 'Arial', NULL, NULL, 0, NULL),
(21, '63ec32259e0f5', 12, '1', 'PGF', '#ffc107', '#000000', 'en', NULL, NULL, 'pgadabarber', 'vcard', NULL, NULL, NULL, '6624591457', '901PrintKings@gmail.com', NULL, NULL, NULL, 'activated', 1, '2023-02-15 08:15:17', 12, '2023-02-15 01:15:17', NULL, NULL, NULL, '#ffffff', '#000000', NULL, 'banner', NULL, 'Arial', NULL, NULL, 0, NULL),
(22, '63ec663b411fc', 12, NULL, 'Unique Braiding', '#aa7384', '#f9d3e0', 'en', NULL, NULL, 'uniquebraiding01', 'vcard', 'Unique Braiding', NULL, NULL, '6623337654', '901PrintKings@gmail.com', NULL, NULL, NULL, 'activated', 1, '2023-02-15 11:57:31', 12, '2023-02-15 08:09:03', 12, NULL, NULL, '#ffffff', '#a27584', 'assets/uploads/banner/Be-Unique-Braiding-63ec931fd177b.webp', 'banner', NULL, 'Arial', NULL, NULL, 0, NULL),
(24, '63f1b6e32366b', 11, NULL, 'Golden Heart Memories', '#669d34', '#d6d6d6', 'en', NULL, NULL, '63f1b6e32366b', 'vcard', 'MEMORIES LAST A LIFETIME', NULL, NULL, '3135802917', 'makeitfancy313@gmail.com', '$donnie718', NULL, NULL, 'activated', 1, '2023-02-19 12:42:59', 11, '2023-02-19 15:06:57', 11, NULL, NULL, '#ffffff', '#669d34', 'assets/uploads/banner/3DB76CB1-2367-467D-9B6F-0B657BD46F52-63f1b6e32af08.webp', 'banner', NULL, 'Arial', NULL, NULL, 0, NULL),
(26, '63f9287fedd85', 14, NULL, 'Ausome Things & More', '#0700c4', '#0700c4', 'en', NULL, NULL, '63f9287fedd85', 'vcard', 'Ausome Things & More', NULL, NULL, '4782844248', 'ausomethings@gmail.com', '$snap012', NULL, NULL, 'inactive', 1, '2023-02-25 04:13:36', 14, '2023-03-06 10:17:38', 14, NULL, NULL, '#ffffff', '#0700c4', 'assets/uploads/banner/936AB713-388D-4C9F-89DA-5B54E2D7441E-63f92a2ff1b04.webp', 'banner', NULL, 'Times New Roman', NULL, NULL, 0, NULL),
(27, '63fb41a8b6b7e', 17, NULL, 'Arobil', '#7e6720', '#9c9111', 'en', NULL, NULL, 'arobilitltd', 'vcard', 'Arobil IT Ltd', NULL, NULL, '8801767671133', 'ronymia.tech@gmail.com', 'mycashapp', 'https://webdevs4u.com/', 'All Rights Reserved', 'activated', 1, '2023-02-26 18:25:28', 17, '2023-03-07 11:13:50', 17, NULL, NULL, '#ffffff', '#be8c04', 'assets/uploads/banner/WhatsApp-Image-2023-01-22-at-10-64071a888c1bd.webp', 'banner', 'https://www.google.com/maps/place/Express+T-shirts+%26+Graphics,+106+Gardner+Blvd,+Columbus,+MS+39702/@36.3713381,-84.5978635,6z/data=!4m9!1m2!2m1!1sexpress+T+Shirts+%26+Graphics!3m5!1s0x8886ed0f411c65f9:0x4f1edc7646f594bf!8m2!3d33.4979372!4d-88.3892584!16s%2Fg%2F11k3qx01x9?hl=en-US', 'Poppins', 'Let\'s Talk\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 0, NULL),
(28, '63fb47f90110c', 17, '7ccc432a06hty', NULL, 'purple', NULL, 'en', '/backend/img/vCards/IMG-63fb47f90152b-diigtalbiz-banner.jpg.jpg', NULL, 'digital-ads-store', 'store', 'Digital Ads Store', 'Digital Ads Store', '{\"whatsapp_no\":\"8801767671133\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"ronymia111333@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-02-26 18:52:25', NULL, '2023-03-04 10:06:52', NULL, NULL, NULL, '#030202', '#ffffff', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-63fb496a21c4f-digitallogo.png.png', 0, NULL),
(30, '63fd66d1213a0', 17, '1', 'Gifted Hands', '#b51a00', '#000000', 'en', NULL, NULL, 'giftedhands', 'vcard', 'Gifted Hands', NULL, NULL, '6292783681', 'giftedhands@gmail.com', '$Gifted Hands', NULL, 'Giftedhandsllc', 'activated', 1, '2023-02-28 09:28:33', 17, '2023-03-01 14:42:50', NULL, NULL, NULL, '#ffffff', '#a62c17', 'assets/uploads/banner/FCF1C7F2-6475-49D9-8A76-1F18F592A57A-63fd66d124d9e.webp', 'banner', NULL, 'Arial', 'We are you personal Party planning Company', NULL, 0, NULL),
(31, '63fdc2a5e9779', 11, '7ccc432a06hty', NULL, 'green', NULL, 'en', '/backend/img/vCards/IMG-63fdc2a5e9d83-4E248E94-DC3C-4B6A-8B9C-A23490793DAF.jpeg.jpg', NULL, 'gifts', 'store', 'Gifts', 'Welcome to our market place', '{\"whatsapp_no\":null,\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"USD\",\"email\":\"901PrintKings@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-02-28 16:00:21', NULL, '2023-02-28 09:01:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-63fdc2a5e9c50-92C196DD-7030-40ED-9AB2-91E1C75B2D41.png.png', 0, NULL),
(32, '63fdfbac8235d', 5, NULL, 'Printkings', '#433855', '#ffffff', 'en', NULL, NULL, '901printkings', 'vcard', '901 PRINT KINGS', NULL, NULL, '6625491457', '901PrintKings@gmail.com', '$SBOWEN2005', NULL, '901 PRINT KINGS', 'activated', 1, '2023-02-28 20:03:40', 5, '2023-03-05 14:24:59', 5, NULL, NULL, '#ffffff', '#5a447e', 'assets/uploads/banner/39A89338-820F-4F2B-A264-4CF6AFE78E97-63fdfbac8b5ea.webp', 'banner', NULL, 'Times New Roman', 'We are your ONE STOP SHOP, for all your Custom Apparel, Graphic & Signs!  If you can think or dream it we can make it happen!', NULL, 1, NULL),
(33, '63fdfe1a45aeb', 5, '7ccc432a06hty', NULL, 'blue', NULL, 'en', '/backend/img/vCards/IMG-63fdfe1a45fed-3ED6935F-7859-4B13-BB34-6EDCE5DFB2E4.png.png', NULL, 'print-kings', 'store', 'PRINT KINGS', 'Welcome to our Web Store', '{\"whatsapp_no\":null,\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"USD\",\"email\":\"901PrintKings@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-02-28 20:14:02', NULL, '2023-03-04 11:46:28', NULL, NULL, NULL, '#ffffff', '#000000', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-63fdfe1a45ed7-CC87C106-49CE-4E3E-A179-915339F245D6.png.png', 0, NULL),
(34, '63fece800444e', 5, NULL, 'HomeSmart', '#2e3867', '#e22400', 'en', NULL, NULL, '63fece800444e', 'vcard', 'HOME SMART', NULL, NULL, '9012356042', 'info@homesmart.com', NULL, NULL, NULL, 'activated', 1, '2023-03-01 11:03:13', 5, '2023-03-04 11:44:51', 5, NULL, NULL, '#ffffff', '#303864', 'assets/uploads/banner/F567A626-D5FB-4CAD-B888-9BC9AFFEE949-63fece8032563.webp', 'banner', NULL, 'Arial', NULL, NULL, 0, NULL),
(36, '63ff3b744dd3a', 17, NULL, 'est', '#ffc107', '#000000', 'en', NULL, NULL, 'test', 'vcard', NULL, NULL, NULL, '01990572321', 'rony@gmail.com', NULL, NULL, NULL, 'activated', 1, '2023-03-01 18:48:04', 17, '2023-03-07 11:06:12', 17, NULL, NULL, '#ffffff', '#000000', 'assets/uploads/banner/WhatsApp-Image-2023-01-22-at-10-64071a96bd0b8.webp', 'banner', NULL, 'Arial', NULL, NULL, 1, NULL),
(37, '64029f51a5747', 5, NULL, 'GOOD SEWARDSHIP', '#1f1f1f', '#000000', 'en', NULL, NULL, 'good-stewardship', 'vcard', 'GOOD STEWARDSHIP', NULL, NULL, '7708733152', 'gavin.turner8719@gmail.com', '$GATSourcingLLC', 'https://a.co/d/eJ9rziw', 'GOODSTEWARDSHIP', 'activated', 1, '2023-03-04 08:30:57', 5, '2023-03-04 11:44:51', 5, NULL, NULL, '#ffffff', '#2c2c2c', 'assets/uploads/banner/275367DD-7B52-4F11-89E7-55A6A702FFC0-64029f51ac974.webp', 'banner', NULL, 'Georgia', 'Synopsis:  To learn and understand how to apply good stewardship principles using both biblical and real world practical ways to apply good stewardship to aim higher, be more successful, and unlock blessings in your personal life, relationships, business, and ministry.', NULL, 0, NULL),
(40, '6403406732db2', 22, '7ccc432a06hju', NULL, 'green', NULL, 'en', '/backend/img/vCards/IMG-64034067334a2-indho.png.png', NULL, 'my-store', 'store', 'My store', 'my test store', '{\"whatsapp_no\":\"01767671133\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"hello@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, '1', 1, '2023-03-04 19:58:15', NULL, '2023-03-04 13:00:46', NULL, NULL, NULL, '#000000', '#000000', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-6403406733273-digitallogo.png.png', 1, NULL),
(41, '6403432e463cd', 23, '7ccc432a06hju', NULL, 'blue', NULL, 'en', '/backend/img/vCards/IMG-6403432e468a5-1.png.png', NULL, 'test-store1', 'store', 'test store1', 'test store1', '{\"whatsapp_no\":null,\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"test@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, '1', 1, '2023-03-04 20:10:06', NULL, '2023-03-04 13:10:46', NULL, NULL, NULL, '#000000', '#000000', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-6403432e4675d-2life.png.png', 1, NULL),
(43, '64042cb890107', 2, '7ccc432a06hju', NULL, 'blue', NULL, 'en', '/backend/img/vCards/IMG-64042cb890605-619ryfby++L._AC_UX569_.jpg.jpg', NULL, '64042cb890107', 'store', 'Big Store', 'Welcome  to my store', '{\"whatsapp_no\":\"01794798227\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"BDT\",\"email\":null}', NULL, NULL, NULL, NULL, NULL, '1', 1, '2023-03-05 12:46:32', NULL, '2023-03-05 05:46:32', NULL, NULL, NULL, '#000000', '#000000', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-64042cb890486-favicon@3x.png.png', 1, NULL),
(45, '64044d495982e', 24, '7ccc432a06hju', NULL, 'blue', NULL, 'en', NULL, NULL, 'help-2', 'store', 'Help 2', 'Help', '{\"whatsapp_no\":null,\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"expresssph@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-05 15:05:29', NULL, '2023-03-11 21:09:12', NULL, NULL, NULL, '#000000', '#000000', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-64044d4959cdb-177D0481-E95B-4BB0-B97D-0694E8DB5B0C.png.png', 0, NULL),
(47, '64046a6ded1a7', 25, '7ccc432a06hty', NULL, 'blue', NULL, 'en', NULL, NULL, 'carebah', 'store', 'carebah', 'online store', '{\"whatsapp_no\":\"8801767671133\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"rony@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-05 17:09:49', NULL, '2023-03-05 10:35:20', NULL, NULL, NULL, '#ff0000', '#ffffff', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(48, '640475c7c07e8', 24, NULL, 'Auto repair', '#2c2c2c', '#edaa41', 'en', NULL, NULL, 'autodr01', 'vcard', 'Auto Doctor', NULL, NULL, '9016547765', 'xpresssph@gmail.com', '$AutoDr', NULL, 'Auto Dr', 'activated', 1, '2023-03-05 17:58:15', 24, '2023-03-11 21:07:46', 24, NULL, NULL, '#ffffff', '#2c2c2c', 'assets/uploads/banner/2C8CE6D7-E9FA-4540-8BEA-3DA8776D7D72-640475c7c48e9.webp', 'banner', NULL, 'Arial', 'You Break it we fix it!', NULL, 0, NULL),
(49, '6404a07fb62f2', 5, NULL, 'All About Braids', '#e54094', '#d34e92', 'en', NULL, NULL, 'allaboutbraids', 'vcard', 'ALL ABOUT BRAIDS', NULL, NULL, '9014562145', 'expresssph@gmail.com', '$Allaboutbraids', NULL, 'ALL ABOUT BRAIDS', 'activated', 1, '2023-03-05 21:00:31', 5, '2023-03-05 14:02:22', 5, NULL, NULL, '#ffffff', '#d34e92', 'assets/uploads/banner/B1B40FCE-A72D-4F0A-8814-BF1B19EE7E19-6404a07fb976d.webp', 'banner', NULL, 'Times New Roman', 'We do dem braids like no other', NULL, 0, NULL),
(50, '6405e1ddbc7d9', 26, NULL, 'Kimbella\'s Creations', '#ee719e', '#f9d3e0', 'en', NULL, NULL, 'kimbellacreations', 'vcard', 'Kimbella Creations', NULL, NULL, '8138488810', 'support@kimbellascreations.com', NULL, 'https://kimbellascreations.com/', 'Kimbella Creations', 'activated', 1, '2023-03-06 19:51:42', 26, '2023-03-06 14:01:47', 26, NULL, NULL, '#ffffff', '#de789d', 'assets/uploads/banner/AF56D327-4BDD-4D72-8F4E-D26762B43CBB-6405eae3cac74.webp', 'banner', NULL, 'Arial', 'We are your one stop shop for creation!', NULL, 1, NULL),
(51, '6405e2fa00514', 26, '7ccc432a06hty', NULL, 'blue', NULL, 'en', '/backend/img/vCards/IMG-6405e2fa00932-D2FFEB40-E385-4589-8AE8-D552254BB59A.jpeg.jpg', NULL, 'kimbella_shop', 'store', 'Kimbella\'s', 'Welcome to Kimbella\'s Creations', '{\"whatsapp_no\":\"8138488810\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"USD\",\"email\":\"901PrintKings@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-06 19:56:26', NULL, '2023-03-23 09:44:45', NULL, NULL, NULL, '#ffb5af', '#000000', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'SHOP'),
(53, '640cebeae3258', 24, NULL, 'Sefie', '#000000', '#ff4015', 'en', NULL, NULL, 'feelinmyselfie', 'vcard', 'FEELIN MYSELFIE STUDIOS', NULL, NULL, '8337735343', 'fellinmysefie@gmail', NULL, NULL, 'Feeling myselfy studio', 'activated', 1, '2023-03-12 04:00:27', 24, '2023-03-11 21:12:25', 24, NULL, NULL, '#ffffff', '#161616', 'assets/uploads/banner/9FB2B426-75E7-4CA6-9515-B21DF1553712-640cebeaeaa9f.webp', 'banner', NULL, 'Arial', NULL, NULL, 1, NULL),
(54, '640e8d393ae2c', 24, '1', 'Art Expressions', '#4f308a', '#fffbb9', 'en', NULL, NULL, 'artexpressions', 'vcard', 'ART EXPRESSIONS', NULL, NULL, '3347658899', '901PrintKings@gmail.com', '$ARTEXPRESSIONS', NULL, 'ART EXPRESSIONS', 'activated', 1, '2023-03-13 09:40:57', 24, '2023-03-13 02:40:57', NULL, NULL, NULL, '#ffffff', '#4e3089', 'assets/uploads/banner/BDA5C659-464D-4083-9C31-781C7CD173F8-640e8d39473c7.webp', 'banner', NULL, 'Times New Roman', NULL, NULL, 0, NULL),
(55, '641166468687b', 27, NULL, 'Selfie Studio', '#de789d', '#ffdbd8', 'en', NULL, NULL, 'feelinmyselfiestudio', 'vcard', 'Feelin\' My SELFie Studio', NULL, NULL, '8337735343', 'feelinmyselfie@gmail.com', '$Feelinmyselfie', 'https://form.jotform.com/213258175671156', 'Feelinmyselfie', 'activated', 1, '2023-03-15 13:31:36', 27, '2023-03-22 11:49:42', 27, NULL, NULL, '#ffffff', '#d07d9c', 'assets/uploads/banner/404726CA-F79D-4F6D-8F97-AF6BEB5A4763-6411b09be9b7e.webp', 'banner', 'https://www.google.com/search?q=southland+mall&rlz=1CDGOYI_enUS910US910&oq=southland+mall&aqs=chrome..69i57.15313j0j7&hl=en-US&sourceid=chrome-mobile&ie=UTF-8&dlnr=1&sei=sWcRZIqrMp-eptQPprO42AQ#', 'Poppins', NULL, NULL, 1, NULL),
(56, '64116dd37c90f', 27, '7ccc432a06hty', NULL, 'green', NULL, 'en', NULL, NULL, 'feelin-my-selfie', 'store', 'Feelin\' My SELFie', 'Love your SELFie', '{\"whatsapp_no\":null,\"whatsapp_msg\":\"Thanks for snapping with us!\",\"currency\":\"USD\",\"email\":\"feelinmyselfie@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-15 14:03:47', NULL, '2023-03-22 11:49:42', NULL, NULL, NULL, '#ffffff', '#000000', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-64116dd37ccf6-FeelinMySelfieStudio_logo_1.jpg.jpg', 0, NULL),
(57, '64184b50bdf1e', 28, '1', 'Lorem Ipsum is simply dummy text', '#3f64f8', '#c3b3ff', 'en', NULL, NULL, '64184b50bdf1e', 'vcard', 'Lorem Ipsum', NULL, NULL, '01958745896', 'rabinmia7578@gmail.com', 'https://www.facebook.com/s', 'https://webdevs4u.com', NULL, 'activated', 1, '2023-03-20 19:02:24', 28, '2023-03-20 12:02:24', NULL, NULL, NULL, '#ffffff', '#4771f0', 'assets/uploads/banner/pexels-darlene-alderson-7970846-64184b50c161f.webp', 'banner', 'dhaka', 'Georgia', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 0, NULL),
(58, '64184d8398481', 28, '7ccc432a06hty', NULL, 'indigo', NULL, 'en', NULL, NULL, 'digitalbiz-ads-sote', 'store', 'digitalbiz ads sote', 'Modern Store', '{\"whatsapp_no\":null,\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"AED\",\"email\":\"rabinmia7578@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-20 19:11:47', NULL, '2023-03-20 12:55:13', NULL, NULL, NULL, '#000000', '#000000', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(59, '641aedffdee54', 9, '7ccc432a06hty', NULL, 'gray', NULL, 'en', '/backend/img/vCards/IMG-641aedffdf309-244489804_1831062430406935_7580768010977749493_n.jpg.jpg', NULL, '641aedffdee54', 'store', 'Dhaka Shop', 'Welcome to Dhaka Shop', '{\"whatsapp_no\":\"8801681944126\",\"whatsapp_msg\":\"Welcome to Dhaka Shop\",\"currency\":\"USD\",\"email\":\"maidul@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-22 19:01:03', NULL, '2023-03-22 12:01:03', NULL, NULL, NULL, '#ffffff', '#0d0df2', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-641aedffdf048-1668953184.png.png', 1, 'SHOP'),
(60, '642165dfa91cb', 29, NULL, 'Express Tea Beg', '#ffc107', '#000000', 'en', NULL, NULL, 'bigstore', 'vcard', 'Big Store', NULL, NULL, '1794798225', 'mdmridul608@gmail.com', NULL, NULL, '2020', 'activated', 1, '2023-03-27 16:46:08', 29, '2023-03-27 10:18:19', 29, NULL, NULL, '#ffffff', '#e3be4f', 'assets/uploads/banner/hub-luxury-642165dff35e0.webp', 'banner', NULL, 'Garamond', NULL, NULL, 1, NULL),
(62, '6422c4841c6e1', 29, '7ccc432a06hju', NULL, 'blue', NULL, 'en', NULL, NULL, 'big-store', 'store', 'Big Store', 'Big Store', '{\"whatsapp_no\":\"016625491459\",\"whatsapp_msg\":\"Thanks for shopping with us.\",\"currency\":\"USD\",\"email\":\"mdmridul608@gmail.com\"}', NULL, NULL, NULL, NULL, NULL, 'activated', 1, '2023-03-28 04:42:12', NULL, '2023-03-29 05:27:31', NULL, NULL, NULL, '#1bf341', '#ffffff', NULL, NULL, NULL, NULL, NULL, '/backend/img/vCards/IMG-6423cc43b1f10-favicon@4x-(1).png.png', 1, 'SHOP');

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
(110, 2, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-13 18:50:41', '2023-02-13 11:50:41'),
(111, 2, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-13 18:50:41', '2023-02-13 11:50:41'),
(116, 6, 'facebook', 'fab fa-facebook', 'facebook', 'ronymia', NULL, '1', '2023-02-13 21:08:09', '2023-02-13 14:08:09'),
(117, 6, 'instagram', 'fab fa-instagram', 'instagram', 'ronymia', NULL, '1', '2023-02-13 21:08:09', '2023-02-13 14:08:09'),
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
(183, 26, 'facebook', 'fab fa-facebook', 'facebook', 'https://m.facebook.com/', NULL, '1', '2023-02-25 06:53:26', '2023-02-24 23:53:26'),
(203, 50, 'facebook', 'fab fa-facebook', 'facebook', 'Sherman Bowen', NULL, '1', '2023-03-06 20:59:23', '2023-03-06 13:59:23'),
(204, 50, 'instagram', 'fab fa-instagram', 'instagram', 'Kimbella\'s Creations', NULL, '1', '2023-03-06 20:59:23', '2023-03-06 13:59:23'),
(205, 48, 'facebook', 'fab fa-facebook', 'facebook', 'https://www.facebook.com/Sherman_Bowen', NULL, '1', '2023-03-07 18:01:52', '2023-03-07 11:01:52'),
(210, 27, 'facebook', 'fab fa-facebook', 'facebook', 'https://www.facebook.com/profile.php?id=100007747725813&mibextid=LQQJ4d', NULL, '1', '2023-03-07 18:13:50', '2023-03-07 11:13:50'),
(211, 27, 'instagram', 'fab fa-instagram', 'instagram', 'https://www.facebook.com/mdrony.tech', NULL, '1', '2023-03-07 18:13:50', '2023-03-07 11:13:50'),
(228, 55, 'facebook', 'fab fa-facebook', 'facebook', 'https://www.facebook.com/SouthlandSelfie?mibextid=ZbWKwL', NULL, '1', '2023-03-16 20:10:39', '2023-03-16 13:10:39'),
(229, 55, 'instagram', 'fab fa-instagram', 'instagram', 'https://instagram.com/feelinmyselfiestudio?igshid=ZDdkNTZiNTM=', NULL, '1', '2023-03-16 20:10:39', '2023-03-16 13:10:39'),
(230, 57, 'facebook', 'fab fa-facebook', 'facebook', 'https://www.facebook.com/s', NULL, '1', '2023-03-20 19:02:24', '2023-03-20 12:02:24'),
(231, 57, 'instagram', 'fab fa-instagram', 'instagram', 'http://www.instagram.com', NULL, '1', '2023-03-20 19:02:24', '2023-03-20 12:02:24');

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
(82, 26, 'assets/uploads/banner/ff7d2ed5-9c24-4a93-b680-54c4959e4321-63f94d470e594.jpeg', 'gallery', NULL, '2023-02-25 06:50:31', '2023-02-25 06:50:31'),
(83, 26, 'assets/uploads/banner/ea02c1f3-a3c4-4f0f-ba09-47ecea4f7482-63f94d474b3e6.jpeg', 'gallery', NULL, '2023-02-25 06:50:31', '2023-02-25 06:50:31'),
(84, 26, 'assets/uploads/banner/0b0952ba-06b3-4bb1-bb59-9a684603cb11-63f94d81d92b5.jpeg', 'gallery', NULL, '2023-02-25 06:51:30', '2023-02-25 06:51:30'),
(85, 26, 'assets/uploads/banner/be95f313-cadf-4a56-87f2-229447f5bae8-63f94db762158.jpeg', 'gallery', NULL, '2023-02-25 06:52:24', '2023-02-25 06:52:24'),
(86, 26, 'assets/uploads/banner/1404badb-fe11-4713-ad05-58bfc092c08d-63f94df58bef3.jpeg', 'gallery', NULL, '2023-02-25 06:53:26', '2023-02-25 06:53:26'),
(87, 27, 'assets/uploads/banner/mwvg2zma_1-(1)-63fb41a8c6996.jpg', 'gallery', NULL, '2023-02-26 18:25:28', '2023-02-26 18:25:28'),
(88, 27, 'assets/uploads/banner/mwvg2zma_1-63fb41a8d62bd.jpg', 'gallery', NULL, '2023-02-26 18:25:28', '2023-02-26 18:25:28'),
(89, 27, 'assets/uploads/banner/phone-63fb41a8e4d37.jpg', 'gallery', NULL, '2023-02-26 18:25:29', '2023-02-26 18:25:29'),
(90, 32, 'assets/uploads/banner/517ab94d-8452-4efa-8d26-03f20d50d2e2-63fdfcb9c3828.png', 'gallery', NULL, '2023-02-28 20:08:10', '2023-02-28 20:08:10'),
(91, 32, 'assets/uploads/banner/111be1e5-53ff-432a-91f9-8c7f40d3d159-63fdfcba0f4e5.jpeg', 'gallery', NULL, '2023-02-28 20:08:10', '2023-02-28 20:08:10'),
(92, 32, 'assets/uploads/banner/1d69fc8d-796e-4ef3-bedc-d21536b23d29-63fdfcba5e968.jpeg', 'gallery', NULL, '2023-02-28 20:08:10', '2023-02-28 20:08:10'),
(93, 32, 'assets/uploads/banner/901e0660-14e1-4d84-a074-01fcb70a0333-63fdfd2ed1d03.png', 'gallery', NULL, '2023-02-28 20:10:07', '2023-02-28 20:10:07'),
(94, 32, 'assets/uploads/banner/fbd04f36-8aa2-43e8-a730-a74a80f5fcc3-63fdfd2f47031.png', 'gallery', NULL, '2023-02-28 20:10:07', '2023-02-28 20:10:07'),
(95, 32, 'assets/uploads/banner/50194fef-781a-4814-b379-d89211d49757-63fdfd2f873e8.png', 'gallery', NULL, '2023-02-28 20:10:07', '2023-02-28 20:10:07'),
(96, 37, 'assets/uploads/banner/00a0884d-139b-445e-8992-2166b454ee7b-6402a15b83a6b.png', 'gallery', NULL, '2023-03-04 08:39:39', '2023-03-04 08:39:39'),
(97, 37, 'assets/uploads/banner/bae650e2-c724-4877-a9f3-15668979fee4-6402a176d2543.png', 'gallery', NULL, '2023-03-04 08:40:06', '2023-03-04 08:40:06'),
(98, 50, 'assets/uploads/banner/7a997255-bb42-4f64-867d-65a991ccaa26-6405e1de13422.jpeg', 'gallery', NULL, '2023-03-06 19:51:42', '2023-03-06 19:51:42'),
(99, 53, 'assets/uploads/banner/9a154836-99dd-4943-99bc-40dfa76934b5-640cebeb71357.jpeg', 'gallery', NULL, '2023-03-12 04:00:27', '2023-03-12 04:00:27'),
(100, 53, 'assets/uploads/banner/963b8aa8-024e-4070-82f4-3745ae2d8b64-640cebebb0b66.jpeg', 'gallery', NULL, '2023-03-12 04:00:27', '2023-03-12 04:00:27'),
(101, 53, 'assets/uploads/banner/4cb89aeb-6c35-4240-9348-9de3f3b2aa3b-640cebebbdead.jpeg', 'gallery', NULL, '2023-03-12 04:00:27', '2023-03-12 04:00:27'),
(102, 55, 'assets/uploads/banner/20230225_182925_05-641169100a8a2.jpg', 'gallery', NULL, '2023-03-15 13:43:28', '2023-03-15 13:43:28'),
(103, 55, 'assets/uploads/banner/picsart_23-02-20_21-55-40-214-641169106e896.jpg', 'gallery', NULL, '2023-03-15 13:43:28', '2023-03-15 13:43:28'),
(104, 55, 'assets/uploads/banner/picsart_23-02-20_21-46-44-767-64116910f11c4.jpg', 'gallery', NULL, '2023-03-15 13:43:29', '2023-03-15 13:43:29'),
(105, 55, 'assets/uploads/banner/picsart_23-02-14_23-59-19-660-64116911982bf.png', 'gallery', NULL, '2023-03-15 13:43:29', '2023-03-15 13:43:29'),
(106, 55, 'assets/uploads/banner/20230315_170507_01-6413154befebe.jpg', 'gallery', NULL, '2023-03-16 20:10:36', '2023-03-16 20:10:36'),
(107, 55, 'assets/uploads/banner/20230315_170038_01-6413154c54cfe.jpg', 'gallery', NULL, '2023-03-16 20:10:37', '2023-03-16 20:10:37'),
(108, 55, 'assets/uploads/banner/20230218_175651_01-6413154d012ff.jpg', 'gallery', NULL, '2023-03-16 20:10:37', '2023-03-16 20:10:37'),
(109, 55, 'assets/uploads/banner/20230218_142956_02-6413154d9fd8b.jpg', 'gallery', NULL, '2023-03-16 20:10:38', '2023-03-16 20:10:38'),
(110, 55, 'assets/uploads/banner/20230218_142152_01-6413154e4a808.jpg', 'gallery', NULL, '2023-03-16 20:10:38', '2023-03-16 20:10:38'),
(111, 55, 'assets/uploads/banner/20230214_153847-6413154eecd14.jpg', 'gallery', NULL, '2023-03-16 20:10:39', '2023-03-16 20:10:39'),
(112, 57, 'assets/uploads/banner/pexels-antoni-shkraba-7163373-64184b50c78d7.jpg', 'gallery', NULL, '2023-03-20 19:02:24', '2023-03-20 19:02:24'),
(113, 57, 'assets/uploads/banner/pexels-ketut-subiyanto-4623355-64184b50cb6a4.jpg', 'gallery', NULL, '2023-03-20 19:02:24', '2023-03-20 19:02:24'),
(114, 57, 'assets/uploads/banner/pexels-jopwell-2422290-64184b50ce659.jpg', 'gallery', NULL, '2023-03-20 19:02:24', '2023-03-20 19:02:24'),
(115, 60, 'assets/uploads/banner/91blmvkziwl-642165e038f05.jpg', 'gallery', NULL, '2023-03-27 16:46:08', '2023-03-27 16:46:08'),
(116, 60, 'assets/uploads/banner/619ryfby++l-642165e0401ab.jpg', 'gallery', NULL, '2023-03-27 16:46:08', '2023-03-27 16:46:08'),
(117, 60, 'assets/uploads/banner/81vv+-ebi5l-642165e044e93.jpg', 'gallery', NULL, '2023-03-27 16:46:08', '2023-03-27 16:46:08'),
(118, 60, 'assets/uploads/banner/71y+bktiodl-642165e048715.jpg', 'gallery', NULL, '2023-03-27 16:46:08', '2023-03-27 16:46:08'),
(119, 60, 'assets/uploads/banner/71ahc+ejshl-642165e04bd9f.jpg', 'gallery', NULL, '2023-03-27 16:46:08', '2023-03-27 16:46:08');

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
(5, 'paypal_client_id', 'Absh31p4OALqtKl-ktP2N_Jl1N70ofjCUm0EV3ygQk-r1OP6SpABgn4AYPvCgeHLZah7XHXhEv22pEqi', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(6, 'paypal_secret', 'EFeiHIyAcO6F3C8Pex4MZbqfZOPCu55J1tNZGfnNRqMwEty8azLoPQSsFnX63NGLD6q8dA6gMJqcnX2M', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(7, 'razorpay_key', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(8, 'razorpay_secret', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(9, 'term', 'monthly', '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(10, 'stripe_publishable_key', 'pk_test_51M9pqYBIRmXVjgUGW3b1i91X0uTNeU6umRaoD9UprcFLotiHpfdBwgr4MnkbZoPuKKPFmdWJFVzWTwvUgxBrcl1d00OcqJU0Ta', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(11, 'stripe_secret', 'sk_test_51M9pqYBIRmXVjgUG4VjKaH21Jm0s6KvLTcIZ6fgTqpvfIbfuVocHbjn4vOeVHX6yrJekPPw4xfphkU4EN7ItAqr500Q3kUMHc8', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(12, 'app_theme', 'yellow', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
(13, 'primary_image', '/images/web/elements/6405dfa2da02d.png', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
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
(26, 'tax_value', '2', '2023-01-28 07:33:34', '2023-01-28 07:33:34'),
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
  `iso_numeric` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `priority`, `iso_code`, `name`, `symbol`, `subunit`, `subunit_to_unit`, `symbol_first`, `html_entity`, `decimal_mark`, `thousands_separator`, `iso_numeric`, `is_active`) VALUES
(1, 100, 'AED', 'United Arab Emirates Dirham', 'د.إ', 'Fils', 100, 'true', '', '.', ',', 784, 0),
(2, 100, 'AFN', 'Afghan Afghani', '؋', 'Pul', 100, 'false', '', '.', ',', 971, 0),
(3, 100, 'ALL', 'Albanian Lek', 'L', 'Qintar', 100, 'false', '', '.', ',', 8, 0),
(4, 100, 'AMD', 'Armenian Dram', 'դր.', 'Luma', 100, 'false', '', '.', ',', 51, 0),
(5, 100, 'ANG', 'Netherlands Antillean Gulden', 'ƒ', 'Cent', 100, 'true', '&#x0192;', ',', '.', 532, 0),
(6, 100, 'AOA', 'Angolan Kwanza', 'Kz', 'Cêntimo', 100, 'false', '', '.', ',', 973, 0),
(7, 100, 'ARS', 'Argentine Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 32, 0),
(8, 4, 'AUD', 'Australian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 36, 0),
(9, 100, 'AWG', 'Aruban Florin', 'ƒ', 'Cent', 100, 'false', '&#x0192;', '.', ',', 533, 0),
(10, 100, 'AZN', 'Azerbaijani Manat', 'null', 'Qəpik', 100, 'true', '', '.', ',', 944, 0),
(11, 100, 'BAM', 'Bosnia and Herzegovina Convertible Mark', 'КМ', 'Fening', 100, 'true', '', '.', ',', 977, 0),
(12, 100, 'BBD', 'Barbadian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 52, 0),
(13, 100, 'BDT', 'Bangladeshi Taka', '৳', 'Paisa', 100, 'true', '', '.', ',', 50, 0),
(14, 100, 'BGN', 'Bulgarian Lev', 'лв', 'Stotinka', 100, 'false', '', '.', ',', 975, 0),
(15, 100, 'BHD', 'Bahraini Dinar', 'ب.د', 'Fils', 1000, 'true', '', '.', ',', 48, 0),
(16, 100, 'BIF', 'Burundian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 108, 0),
(17, 100, 'BMD', 'Bermudian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 60, 0),
(18, 100, 'BND', 'Brunei Dollar', '$', 'Sen', 100, 'true', '$', '.', ',', 96, 0),
(19, 100, 'BOB', 'Bolivian Boliviano', 'Bs.', 'Centavo', 100, 'true', '', '.', ',', 68, 0),
(20, 100, 'BRL', 'Brazilian Real', 'R$', 'Centavo', 100, 'true', 'R$', ',', '.', 986, 0),
(21, 100, 'BSD', 'Bahamian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 44, 0),
(22, 100, 'BTN', 'Bhutanese Ngultrum', 'Nu.', 'Chertrum', 100, 'false', '', '.', ',', 64, 0),
(23, 100, 'BWP', 'Botswana Pula', 'P', 'Thebe', 100, 'true', '', '.', ',', 72, 0),
(24, 100, 'BYR', 'Belarusian Ruble', 'Br', 'Kapyeyka', 100, 'false', '', '.', ',', 974, 0),
(25, 100, 'BZD', 'Belize Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 84, 0),
(26, 5, 'CAD', 'Canadian Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 124, 0),
(27, 100, 'CDF', 'Congolese Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 976, 0),
(28, 100, 'CHF', 'Swiss Franc', 'Fr', 'Rappen', 100, 'true', '', '.', ',', 756, 0),
(29, 100, 'CLF', 'Unidad de Fomento', 'UF', 'Peso', 1, 'true', '&#x20B1;', ',', '.', 990, 0),
(30, 100, 'CLP', 'Chilean Peso', '$', 'Peso', 1, 'true', '&#36;', ',', '.', 152, 0),
(31, 100, 'CNY', 'Chinese Renminbi Yuan', '¥', 'Fen', 100, 'true', '&#20803;', '.', ',', 156, 0),
(32, 100, 'COP', 'Colombian Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', ',', '.', 170, 0),
(33, 100, 'CRC', 'Costa Rican Colón', '₡', 'Céntimo', 100, 'true', '&#x20A1;', ',', '.', 188, 0),
(34, 100, 'CUC', 'Cuban Convertible Peso', '$', 'Centavo', 100, 'false', '', '.', ',', 931, 0),
(35, 100, 'CUP', 'Cuban Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 192, 0),
(36, 100, 'CVE', 'Cape Verdean Escudo', '$', 'Centavo', 100, 'false', '', '.', ',', 132, 0),
(37, 100, 'CZK', 'Czech Koruna', 'Kč', 'Haléř', 100, 'true', '', ',', '.', 203, 0),
(38, 100, 'DJF', 'Djiboutian Franc', 'Fdj', 'Centime', 100, 'false', '', '.', ',', 262, 0),
(39, 100, 'DKK', 'Danish Krone', 'kr', 'Øre', 100, 'false', '', ',', '.', 208, 0),
(40, 100, 'DOP', 'Dominican Peso', '$', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 214, 0),
(41, 100, 'DZD', 'Algerian Dinar', 'د.ج', 'Centime', 100, 'false', '', '.', ',', 12, 0),
(42, 100, 'EGP', 'Egyptian Pound', 'ج.م', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 818, 0),
(43, 100, 'ERN', 'Eritrean Nakfa', 'Nfk', 'Cent', 100, 'false', '', '.', ',', 232, 0),
(44, 100, 'ETB', 'Ethiopian Birr', 'Br', 'Santim', 100, 'false', '', '.', ',', 230, 0),
(45, 2, 'EUR', 'Euro', '€', 'Cent', 100, 'true', '&#x20AC;', ',', '.', 978, 0),
(46, 100, 'FJD', 'Fijian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 242, 0),
(47, 100, 'FKP', 'Falkland Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 238, 0),
(48, 3, 'GBP', 'British Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 826, 0),
(49, 100, 'GEL', 'Georgian Lari', 'ლ', 'Tetri', 100, 'false', '', '.', ',', 981, 0),
(50, 100, 'GHS', 'Ghanaian Cedi', '₵', 'Pesewa', 100, 'true', '&#x20B5;', '.', ',', 936, 0),
(51, 100, 'GIP', 'Gibraltar Pound', '£', 'Penny', 100, 'true', '&#x00A3;', '.', ',', 292, 0),
(52, 100, 'GMD', 'Gambian Dalasi', 'D', 'Butut', 100, 'false', '', '.', ',', 270, 0),
(53, 100, 'GNF', 'Guinean Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 324, 0),
(54, 100, 'GTQ', 'Guatemalan Quetzal', 'Q', 'Centavo', 100, 'true', '', '.', ',', 320, 0),
(55, 100, 'GYD', 'Guyanese Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 328, 0),
(56, 100, 'HKD', 'Hong Kong Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 344, 0),
(57, 100, 'HNL', 'Honduran Lempira', 'L', 'Centavo', 100, 'true', '', '.', ',', 340, 0),
(58, 100, 'HRK', 'Croatian Kuna', 'kn', 'Lipa', 100, 'true', '', ',', '.', 191, 0),
(59, 100, 'HTG', 'Haitian Gourde', 'G', 'Centime', 100, 'false', '', '.', ',', 332, 0),
(60, 100, 'HUF', 'Hungarian Forint', 'Ft', 'Fillér', 100, 'false', '', ',', '.', 348, 0),
(61, 100, 'IDR', 'Indonesian Rupiah', 'Rp', 'Sen', 100, 'true', '', ',', '.', 360, 0),
(62, 100, 'ILS', 'Israeli New Sheqel', '₪', 'Agora', 100, 'true', '&#x20AA;', '.', ',', 376, 0),
(63, 100, 'INR', 'Indian Rupee', '₹', 'Paisa', 100, 'true', '&#x20b9;', '.', ',', 356, 0),
(64, 100, 'IQD', 'Iraqi Dinar', 'ع.د', 'Fils', 1000, 'false', '', '.', ',', 368, 0),
(65, 100, 'IRR', 'Iranian Rial', '﷼', 'Dinar', 100, 'true', '&#xFDFC;', '.', ',', 364, 0),
(66, 100, 'ISK', 'Icelandic Króna', 'kr', 'Eyrir', 100, 'true', '', ',', '.', 352, 0),
(67, 100, 'JMD', 'Jamaican Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 388, 0),
(68, 100, 'JOD', 'Jordanian Dinar', 'د.ا', 'Piastre', 100, 'true', '', '.', ',', 400, 0),
(69, 6, 'JPY', 'Japanese Yen', '¥', 'null', 1, 'true', '&#x00A5;', '.', ',', 392, 0),
(70, 100, 'KES', 'Kenyan Shilling', 'KSh', 'Cent', 100, 'true', '', '.', ',', 404, 0),
(71, 100, 'KGS', 'Kyrgyzstani Som', 'som', 'Tyiyn', 100, 'false', '', '.', ',', 417, 0),
(72, 100, 'KHR', 'Cambodian Riel', '៛', 'Sen', 100, 'false', '&#x17DB;', '.', ',', 116, 0),
(73, 100, 'KMF', 'Comorian Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 174, 0),
(74, 100, 'KPW', 'North Korean Won', '₩', 'Chŏn', 100, 'false', '&#x20A9;', '.', ',', 408, 0),
(75, 100, 'KRW', 'South Korean Won', '₩', 'null', 1, 'true', '&#x20A9;', '.', ',', 410, 0),
(76, 100, 'KWD', 'Kuwaiti Dinar', 'د.ك', 'Fils', 1000, 'true', '', '.', ',', 414, 0),
(77, 100, 'KYD', 'Cayman Islands Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 136, 0),
(78, 100, 'KZT', 'Kazakhstani Tenge', '〒', 'Tiyn', 100, 'false', '', '.', ',', 398, 0),
(79, 100, 'LAK', 'Lao Kip', '₭', 'Att', 100, 'false', '&#x20AD;', '.', ',', 418, 0),
(80, 100, 'LBP', 'Lebanese Pound', 'ل.ل', 'Piastre', 100, 'true', '&#x00A3;', '.', ',', 422, 0),
(81, 100, 'LKR', 'Sri Lankan Rupee', '₨', 'Cent', 100, 'false', '&#x0BF9;', '.', ',', 144, 0),
(82, 100, 'LRD', 'Liberian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 430, 0),
(83, 100, 'LSL', 'Lesotho Loti', 'L', 'Sente', 100, 'false', '', '.', ',', 426, 0),
(84, 100, 'LTL', 'Lithuanian Litas', 'Lt', 'Centas', 100, 'false', '', '.', ',', 440, 0),
(85, 100, 'LVL', 'Latvian Lats', 'Ls', 'Santīms', 100, 'true', '', '.', ',', 428, 0),
(86, 100, 'LYD', 'Libyan Dinar', 'ل.د', 'Dirham', 1000, 'false', '', '.', ',', 434, 0),
(87, 100, 'MAD', 'Moroccan Dirham', 'د.م.', 'Centime', 100, 'false', '', '.', ',', 504, 0),
(88, 100, 'MDL', 'Moldovan Leu', 'L', 'Ban', 100, 'false', '', '.', ',', 498, 0),
(89, 100, 'MGA', 'Malagasy Ariary', 'Ar', 'Iraimbilanja', 5, 'true', '', '.', ',', 969, 0),
(90, 100, 'MKD', 'Macedonian Denar', 'ден', 'Deni', 100, 'false', '', '.', ',', 807, 0),
(91, 100, 'MMK', 'Myanmar Kyat', 'K', 'Pya', 100, 'false', '', '.', ',', 104, 0),
(92, 100, 'MNT', 'Mongolian Tögrög', '₮', 'Möngö', 100, 'false', '&#x20AE;', '.', ',', 496, 0),
(93, 100, 'MOP', 'Macanese Pataca', 'P', 'Avo', 100, 'false', '', '.', ',', 446, 0),
(94, 100, 'MRO', 'Mauritanian Ouguiya', 'UM', 'Khoums', 5, 'false', '', '.', ',', 478, 0),
(95, 100, 'MUR', 'Mauritian Rupee', '₨', 'Cent', 100, 'true', '&#x20A8;', '.', ',', 480, 0),
(96, 100, 'MVR', 'Maldivian Rufiyaa', 'MVR', 'Laari', 100, 'false', '', '.', ',', 462, 0),
(97, 100, 'MWK', 'Malawian Kwacha', 'MK', 'Tambala', 100, 'false', '', '.', ',', 454, 0),
(98, 100, 'MXN', 'Mexican Peso', '$', 'Centavo', 100, 'true', '$', '.', ',', 484, 0),
(99, 100, 'MYR', 'Malaysian Ringgit', 'RM', 'Sen', 100, 'true', '', '.', ',', 458, 0),
(100, 100, 'MZN', 'Mozambican Metical', 'MTn', 'Centavo', 100, 'true', '', ',', '.', 943, 0),
(101, 100, 'NAD', 'Namibian Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 516, 0),
(102, 100, 'NGN', 'Nigerian Naira', '₦', 'Kobo', 100, 'false', '&#x20A6;', '.', ',', 566, 0),
(103, 100, 'NIO', 'Nicaraguan Córdoba', 'C$', 'Centavo', 100, 'false', '', '.', ',', 558, 0),
(104, 100, 'NOK', 'Norwegian Krone', 'kr', 'Øre', 100, 'true', 'kr', ',', '.', 578, 0),
(105, 100, 'NPR', 'Nepalese Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 524, 0),
(106, 100, 'NZD', 'New Zealand Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 554, 0),
(107, 100, 'OMR', 'Omani Rial', 'ر.ع.', 'Baisa', 1000, 'true', '&#xFDFC;', '.', ',', 512, 0),
(108, 100, 'PAB', 'Panamanian Balboa', 'B/.', 'Centésimo', 100, 'false', '', '.', ',', 590, 0),
(109, 100, 'PEN', 'Peruvian Nuevo Sol', 'S/.', 'Céntimo', 100, 'true', 'S/.', '.', ',', 604, 0),
(110, 100, 'PGK', 'Papua New Guinean Kina', 'K', 'Toea', 100, 'false', '', '.', ',', 598, 0),
(111, 100, 'PHP', 'Philippine Peso', '₱', 'Centavo', 100, 'true', '&#x20B1;', '.', ',', 608, 0),
(112, 100, 'PKR', 'Pakistani Rupee', '₨', 'Paisa', 100, 'true', '&#x20A8;', '.', ',', 586, 0),
(113, 100, 'PLN', 'Polish Złoty', 'zł', 'Grosz', 100, 'false', 'z&#322;', ',', '', 985, 0),
(114, 100, 'PYG', 'Paraguayan Guaraní', '₲', 'Céntimo', 100, 'true', '&#x20B2;', '.', ',', 600, 0),
(115, 100, 'QAR', 'Qatari Riyal', 'ر.ق', 'Dirham', 100, 'false', '&#xFDFC;', '.', ',', 634, 0),
(116, 100, 'RON', 'Romanian Leu', 'Lei', 'Bani', 100, 'true', '', ',', '.', 946, 0),
(117, 100, 'RSD', 'Serbian Dinar', 'РСД', 'Para', 100, 'true', '', '.', ',', 941, 0),
(118, 100, 'RUB', 'Russian Ruble', 'р.', 'Kopek', 100, 'false', '&#x0440;&#x0443;&#x0431;', ',', '.', 643, 0),
(119, 100, 'RWF', 'Rwandan Franc', 'FRw', 'Centime', 100, 'false', '', '.', ',', 646, 0),
(120, 100, 'SAR', 'Saudi Riyal', 'ر.س', 'Hallallah', 100, 'true', '&#xFDFC;', '.', ',', 682, 0),
(121, 100, 'SBD', 'Solomon Islands Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 90, 0),
(122, 100, 'SCR', 'Seychellois Rupee', '₨', 'Cent', 100, 'false', '&#x20A8;', '.', ',', 690, 0),
(123, 100, 'SDG', 'Sudanese Pound', '£', 'Piastre', 100, 'true', '', '.', ',', 938, 0),
(124, 100, 'SEK', 'Swedish Krona', 'kr', 'Öre', 100, 'false', '', ',', '', 752, 0),
(125, 100, 'SGD', 'Singapore Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 702, 0),
(126, 100, 'SHP', 'Saint Helenian Pound', '£', 'Penny', 100, 'false', '&#x00A3;', '.', ',', 654, 0),
(127, 100, 'SKK', 'Slovak Koruna', 'Sk', 'Halier', 100, 'true', '', '.', ',', 703, 0),
(128, 100, 'SLL', 'Sierra Leonean Leone', 'Le', 'Cent', 100, 'false', '', '.', ',', 694, 0),
(129, 100, 'SOS', 'Somali Shilling', 'Sh', 'Cent', 100, 'false', '', '.', ',', 706, 0),
(130, 100, 'SRD', 'Surinamese Dollar', '$', 'Cent', 100, 'false', '', '.', ',', 968, 0),
(131, 100, 'SSP', 'South Sudanese Pound', '£', 'piaster', 100, 'false', '&#x00A3;', '.', ',', 728, 0),
(132, 100, 'STD', 'São Tomé and Príncipe Dobra', 'Db', 'Cêntimo', 100, 'false', '', '.', ',', 678, 0),
(133, 100, 'SVC', 'Salvadoran Colón', '₡', 'Centavo', 100, 'true', '&#x20A1;', '.', ',', 222, 0),
(134, 100, 'SYP', 'Syrian Pound', '£S', 'Piastre', 100, 'false', '&#x00A3;', '.', ',', 760, 0),
(135, 100, 'SZL', 'Swazi Lilangeni', 'L', 'Cent', 100, 'true', '', '.', ',', 748, 0),
(136, 100, 'THB', 'Thai Baht', '฿', 'Satang', 100, 'true', '&#x0E3F;', '.', ',', 764, 0),
(137, 100, 'TJS', 'Tajikistani Somoni', 'ЅМ', 'Diram', 100, 'false', '', '.', ',', 972, 0),
(138, 100, 'TMT', 'Turkmenistani Manat', 'T', 'Tenge', 100, 'false', '', '.', ',', 934, 0),
(139, 100, 'TND', 'Tunisian Dinar', 'د.ت', 'Millime', 1000, 'false', '', '.', ',', 788, 0),
(140, 100, 'TOP', 'Tongan Paʻanga', 'T$', 'Seniti', 100, 'true', '', '.', ',', 776, 0),
(141, 100, 'TRY', 'Turkish Lira', 'TL', 'kuruş', 100, 'false', '', ',', '.', 949, 0),
(142, 100, 'TTD', 'Trinidad and Tobago Dollar', '$', 'Cent', 100, 'false', '$', '.', ',', 780, 0),
(143, 100, 'TWD', 'New Taiwan Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 901, 0),
(144, 100, 'TZS', 'Tanzanian Shilling', 'Sh', 'Cent', 100, 'true', '', '.', ',', 834, 0),
(145, 100, 'UAH', 'Ukrainian Hryvnia', '₴', 'Kopiyka', 100, 'false', '&#x20B4;', '.', ',', 980, 0),
(146, 100, 'UGX', 'Ugandan Shilling', 'USh', 'Cent', 100, 'false', '', '.', ',', 800, 0),
(147, 1, 'USD', 'United States Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 840, 1),
(148, 100, 'UYU', 'Uruguayan Peso', '$', 'Centésimo', 100, 'true', '&#x20B1;', ',', '.', 858, 0),
(149, 100, 'UZS', 'Uzbekistani Som', 'null', 'Tiyin', 100, 'false', '', '.', ',', 860, 0),
(150, 100, 'VEF', 'Venezuelan Bolívar', 'Bs F', 'Céntimo', 100, 'true', '', ',', '.', 937, 0),
(151, 100, 'VND', 'Vietnamese Đồng', '₫', 'Hào', 10, 'true', '&#x20AB;', ',', '.', 704, 0),
(152, 100, 'VUV', 'Vanuatu Vatu', 'Vt', 'null', 1, 'true', '', '.', ',', 548, 0),
(153, 100, 'WST', 'Samoan Tala', 'T', 'Sene', 100, 'false', '', '.', ',', 882, 0),
(154, 100, 'XAF', 'Central African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 950, 0),
(155, 100, 'XAG', 'Silver (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 961, 0),
(156, 100, 'XAU', 'Gold (Troy Ounce)', 'oz t', 'oz', 1, 'false', '', '.', ',', 959, 0),
(157, 100, 'XCD', 'East Caribbean Dollar', '$', 'Cent', 100, 'true', '$', '.', ',', 951, 0),
(158, 100, 'XDR', 'Special Drawing Rights', 'SDR', '', 1, 'false', '$', '.', ',', 960, 0),
(159, 100, 'XOF', 'West African Cfa Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 952, 0),
(160, 100, 'XPF', 'Cfp Franc', 'Fr', 'Centime', 100, 'false', '', '.', ',', 953, 0),
(161, 100, 'YER', 'Yemeni Rial', '﷼', 'Fils', 100, 'false', '&#xFDFC;', '.', ',', 886, 0),
(162, 100, 'ZAR', 'South African Rand', 'R', 'Cent', 100, 'true', '&#x0052;', '.', ',', 710, 0),
(163, 100, 'ZMK', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 894, 0),
(164, 100, 'ZMW', 'Zambian Kwacha', 'ZK', 'Ngwee', 100, 'false', '', '.', ',', 967, 0);

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
(1, '60964401751ab', '/backend/img/payment-method/paypal.png', 'Paypal', 'Paypal', '5', '6', 'enabled', '1', '2023-01-28 07:33:18', '2023-03-15 12:49:30'),
(3, '60964410732t9', '/backend/img/payment-method/stripe.png', 'Stripe', 'Stripe', '10', '11', 'enabled', '1', '2023-01-28 07:33:18', '2023-03-15 12:48:01'),
(4, '659644107y2g5', '/backend/img/payment-method/bank-transfer.png', 'Bank Transfer', 'Bank Transfer', '12', '13', 'enabled', '1', '2023-01-28 07:33:18', '2023-03-20 19:09:41');

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
(1, '63fb481b55b75', '63fb3f868661b', '1651409070dk2.jpg', 'images/63fb3f868661b-63fb481b55b75.jpg', '2023-02-26 18:52:59', '2023-02-26 18:52:59'),
(2, '63fb481b8e8da', '63fb3f868661b', 'TOSef1.jpg', 'images/63fb3f868661b-63fb481b8e8da.jpg', '2023-02-26 18:52:59', '2023-02-26 18:52:59'),
(4, '63fdbc8027e47', '63fb3f868661b', '37473B22-B907-4C09-8A0A-133F92E854B4.jpeg', 'images/63fb3f868661b-63fdbc8027e47.jpg', '2023-02-28 15:34:08', '2023-02-28 15:34:08'),
(5, '63fdc32b0c817', '63e9073664817', '921747BD-00C6-459D-8BCD-44F76B56D1DB.jpeg', 'images/63e9073664817-63fdc32b0c817.jpg', '2023-02-28 16:02:35', '2023-02-28 16:02:35'),
(6, '63fdcb0e8832a', '63fb3f868661b', '9F9C8810-EECF-4A9A-82F2-9F847139460F.png', 'images/63fb3f868661b-63fdcb0e8832a.png', '2023-02-28 16:36:14', '2023-02-28 16:36:14'),
(7, '63fdcc69a852a', '63fb3f868661b', 'DCB438A8-A2B6-47E5-B6B2-F25E42049C2C.jpeg', 'images/63fb3f868661b-63fdcc69a852a.jpg', '2023-02-28 16:42:01', '2023-02-28 16:42:01'),
(8, '63fdcc69f2da4', '63fb3f868661b', 'EE0DA46E-33FD-4611-8967-990E7400B411.jpeg', 'images/63fb3f868661b-63fdcc69f2da4.jpg', '2023-02-28 16:42:01', '2023-02-28 16:42:01'),
(9, '63fdcc6abbf6b', '63fb3f868661b', '12D3F8BB-3352-4142-8598-276B0EB1C539.png', 'images/63fb3f868661b-63fdcc6abbf6b.png', '2023-02-28 16:42:02', '2023-02-28 16:42:02'),
(10, '63fdcc6b8787c', '63fb3f868661b', '64AFF0D4-6079-4058-9ACC-E4B8A879990D.png', 'images/63fb3f868661b-63fdcc6b8787c.png', '2023-02-28 16:42:03', '2023-02-28 16:42:03'),
(11, '63fdcc6c4eb66', '63fb3f868661b', '28DD6661-6A54-4562-9187-32A78CF709E2.png', 'images/63fb3f868661b-63fdcc6c4eb66.png', '2023-02-28 16:42:04', '2023-02-28 16:42:04'),
(12, '63fdcc6c907ce', '63fb3f868661b', '3F1E4E29-EDB4-4163-83A0-CD0811D55CCB.jpeg', 'images/63fb3f868661b-63fdcc6c907ce.jpg', '2023-02-28 16:42:04', '2023-02-28 16:42:04'),
(13, '63fdcc6d74325', '63fb3f868661b', 'D9E7638C-8E7D-47B4-A2AE-8E19521153CB.png', 'images/63fb3f868661b-63fdcc6d74325.png', '2023-02-28 16:42:05', '2023-02-28 16:42:05'),
(14, '63fdcc6db6356', '63fb3f868661b', '9DA3C530-EF10-43BF-93A2-601C0BA8B26B.png', 'images/63fb3f868661b-63fdcc6db6356.png', '2023-02-28 16:42:05', '2023-02-28 16:42:05'),
(15, '63fdcc6de39f8', '63fb3f868661b', '95379CDB-D764-4248-8A90-CBE3D7AD9F81.jpeg', 'images/63fb3f868661b-63fdcc6de39f8.jpg', '2023-02-28 16:42:05', '2023-02-28 16:42:05'),
(16, '64031d84d202d', '64031bc54f630', 'Pizza-Pollo-e-Zucchine-600x428.jpg', 'images/64031bc54f630-64031d84d202d.jpg', '2023-03-04 17:29:24', '2023-03-04 17:29:24'),
(17, '640604f455284', '6405df5e02e9e', '8B506721-8AF5-4FF7-A1CD-2BB849EF7CE6.jpeg', 'images/6405df5e02e9e-640604f455284.jpg', '2023-03-06 22:21:24', '2023-03-06 22:21:24'),
(18, '640cecf4621ff', '640342b16c2b7', 'B85BD938-3C6A-4D7B-AE81-9B035E185D28.jpeg', 'images/640342b16c2b7-640cecf4621ff.jpg', '2023-03-12 04:04:52', '2023-03-12 04:04:52'),
(19, '640efc39088ea', '6405df5e02e9e', '6C2213A3-D730-4588-8BDE-DC3471AE3735.png', 'images/6405df5e02e9e-640efc39088ea.png', '2023-03-13 17:34:33', '2023-03-13 17:34:33'),
(21, '64131499a71c4', '64115b67a5789', '20230315_170026_02.jpg', 'images/64115b67a5789-64131499a71c4.jpg', '2023-03-16 20:07:37', '2023-03-16 20:07:37'),
(22, '64131499ba15c', '64115b67a5789', '20230315_170507_01.jpg', 'images/64115b67a5789-64131499ba15c.jpg', '2023-03-16 20:07:37', '2023-03-16 20:07:37'),
(23, '6413149c1724c', '64115b67a5789', '20230315_165705_01.jpg', 'images/64115b67a5789-6413149c1724c.jpg', '2023-03-16 20:07:40', '2023-03-16 20:07:40'),
(24, '6413149f3b80e', '64115b67a5789', '20230315_164940_03.jpg', 'images/64115b67a5789-6413149f3b80e.jpg', '2023-03-16 20:07:43', '2023-03-16 20:07:43'),
(25, '64184ef370f32', '6418450143f29', 'pexels-ketut-subiyanto-4623355.jpg', 'images/6418450143f29-64184ef370f32.jpg', '2023-03-20 19:17:55', '2023-03-20 19:17:55'),
(26, '64184ef373481', '6418450143f29', 'pexels-jopwell-2422290.jpg', 'images/6418450143f29-64184ef373481.jpg', '2023-03-20 19:17:55', '2023-03-20 19:17:55'),
(27, '64184ef3c7219', '6418450143f29', 'pexels-jopwell-2422280.jpg', 'images/6418450143f29-64184ef3c7219.jpg', '2023-03-20 19:17:55', '2023-03-20 19:17:55'),
(28, '64184ef3cafdc', '6418450143f29', 'pexels-fauxels-3184315.jpg', 'images/6418450143f29-64184ef3cafdc.jpg', '2023-03-20 19:17:55', '2023-03-20 19:17:55'),
(29, '64184ef4833b7', '6418450143f29', 'pexels-kindel-media-6994261 - Copy.jpg', 'images/6418450143f29-64184ef4833b7.jpg', '2023-03-20 19:17:56', '2023-03-20 19:17:56'),
(30, '64184ef484f8e', '6418450143f29', 'pexels-kindel-media-6994261.jpg', 'images/6418450143f29-64184ef484f8e.jpg', '2023-03-20 19:17:56', '2023-03-20 19:17:56'),
(31, '641aca33a74b1', '64115b67a5789', 'C55CC174-7DE4-4895-B710-5D7FDCFCF9D1.jpeg', 'images/64115b67a5789-641aca33a74b1.jpg', '2023-03-22 16:28:19', '2023-03-22 16:28:19'),
(36, '6423be1b79394', '64216345cad97', '2022-audi-a8-103-1644872258.jpg', 'images/64216345cad97-6423be1b79394.jpg', '2023-03-28 22:27:07', '2023-03-28 22:27:07'),
(37, '64242807a1a02', '64216345cad97', '20220211142347-margherita-9920_ba86be55-674e-4f35-8094-2067ab41a671.jpg', 'images/64216345cad97-64242807a1a02.jpg', '2023-03-29 05:59:03', '2023-03-29 05:59:03');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `store_id` varchar(20) NOT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` float(14,2) DEFAULT 0.00,
  `payment_fee` float(14,2) NOT NULL DEFAULT 0.00,
  `vat` float(14,2) DEFAULT 0.00,
  `shipping_cost` int(10) NOT NULL,
  `grand_total` float DEFAULT 0,
  `order_date` date DEFAULT NULL,
  `shipping_details` text NOT NULL,
  `billing_details` text NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `store_id`, `order_number`, `quantity`, `total_price`, `payment_fee`, `vat`, `shipping_cost`, `grand_total`, `order_date`, `shipping_details`, `billing_details`, `payment_method`, `payment_status`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, '642166f2b0c6d', NULL, 1, 26.00, 0.00, 0.78, 17, 26, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Dhaka\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 00:36:41', '2023-03-28 00:36:41', 0),
(2, 2, '642166f2b0c6d', NULL, 1, 26.00, 0.00, 10.00, 10, 26, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 01:14:21', '2023-03-28 01:14:21', 0),
(3, 3, '642166f2b0c6d', NULL, 1, 180.00, 0.00, 5.40, 10, 180, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Gujarat\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 01:17:24', '2023-03-28 01:17:24', 0),
(4, 4, '642166f2b0c6d', 'order6422a4e5a02f3', 1, 180.00, 0.00, 10.00, 17, 180, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 02:27:17', '2023-03-28 02:27:17', 0),
(5, 5, '642166f2b0c6d', 'order6422a511cec3e', 1, 180.00, 0.00, 5.40, 10, 180, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Dhaka\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 02:28:01', '2023-03-28 02:28:01', 0),
(6, 7, '642166f2b0c6d', 'order_6422ae8619d4a', 1, 20.30, 0.00, 0.61, 10, 20.3, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Dhaka\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 03:08:22', '2023-03-28 03:08:22', 0),
(7, 8, '642166f2b0c6d', 'order_6422b3f1017a5', 1, 20.30, 0.00, 10.00, 10, 20.3, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 03:31:29', '2023-03-28 03:31:29', 0),
(8, 9, '642166f2b0c6d', 'order_6422b9f74e7e7', 1, 27.40, 0.00, 0.82, 20, 27.4, '2023-03-28', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"3\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Dhaka\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 03:57:11', '2023-03-28 03:57:11', 0),
(9, 10, '642166f2b0c6d', 'order_6422ba82c1483', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 03:59:30', '2023-03-28 03:59:30', 0),
(10, 11, '642166f2b0c6d', 'order_6422bb81680b3', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 04:03:45', '2023-03-28 04:03:45', 0),
(11, 12, '642166f2b0c6d', 'order_6422bda1ebd3b', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 04:12:49', '2023-03-28 04:12:49', 0),
(12, 13, '642166f2b0c6d', 'order_6422beb066570', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 04:17:20', '2023-03-28 04:17:20', 0),
(13, 14, '642166f2b0c6d', 'order_6422bfd07707b', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 04:22:08', '2023-03-28 04:22:08', 0),
(14, 15, '642166f2b0c6d', 'order_6422c055a3dfb', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 04:24:21', '2023-03-28 04:24:21', 0),
(15, 16, '642166f2b0c6d', 'order_6422c08b50435', 1, 20.30, 0.00, 10.00, 17, 20.3, '2023-03-28', '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"mdm mridul\",\"bill_last_name\":\"biswas\",\"bill_email\":\"mdmridul@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"manwa\",\"bill_city\":\"dhakja\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Stripe', 1, '2023-03-28 04:25:15', '2023-03-28 04:25:15', 0),
(16, 17, '6422c4841c6e1', 'order_6423daf92dd78', 1, 80.00, 0.00, 2.40, 10, 80, '2023-03-29', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"test\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Dhaka\",\"bill_zip\":\"1740\"}', 'Paypal', 1, '2023-03-29 00:30:17', '2023-03-29 00:30:17', 0),
(17, 18, '6422c4841c6e1', 'order_6423dc69eb348', 1, 80.00, 0.00, 2.40, 17, 80, '2023-03-29', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"Dhaka\",\"bill_zip\":\"1740\"}', 'Paypal', 1, '2023-03-29 00:36:25', '2023-03-29 00:36:25', 0),
(18, 23, '6422c4841c6e1', 'order_6423f0e38b3af', 1, 80.00, 0.00, 10.00, 10, 80, '2023-03-29', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Paypal', 1, '2023-03-29 02:03:47', '2023-03-29 02:03:47', 0),
(19, 24, '6422c4841c6e1', 'order_6423f1903a152', 1, 80.00, 0.00, 10.00, 10, 100, '2023-03-29', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Paypal', 1, '2023-03-29 02:06:40', '2023-03-29 02:06:40', 0),
(20, 25, '6422c4841c6e1', 'order_6423f24744272', 1, 80.00, 0.00, 10.00, 10, 100, '2023-03-29', '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', '{\"bill_first_name\":\"Md\",\"bill_last_name\":\"Mridul\",\"bill_email\":\"mdmridul6088@gmail.com\",\"bill_phone\":\"01794798227\",\"bill_address1\":\"zinda park\",\"bill_city\":\"Gandhinagar\",\"bill_state\":\"CoxBazar\",\"bill_zip\":\"1740\"}', 'Paypal', 1, '2023-03-29 02:09:43', '2023-03-29 02:09:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  `unit_price` float(14,2) DEFAULT NULL,
  `variant_id` text DEFAULT NULL,
  `variant_option_id` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `variant_id`, `variant_option_id`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 1, 40, 1, 26.00, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":2,\"name\":\"Ass\"},{\"id\":4,\"name\":\"Medium\"}]', '2023-03-28 06:36:41', NULL, '2023-03-28 06:36:41'),
(2, 2, 40, 1, 26.00, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":2,\"name\":\"Ass\"},{\"id\":4,\"name\":\"Medium\"}]', '2023-03-28 07:14:21', NULL, '2023-03-28 07:14:21'),
(3, 3, 39, 1, 180.00, NULL, NULL, '2023-03-28 07:17:24', NULL, '2023-03-28 07:17:24'),
(4, 4, 39, 1, 180.00, NULL, NULL, '2023-03-28 08:27:17', NULL, '2023-03-28 08:27:17'),
(5, 5, 39, 1, 180.00, NULL, NULL, '2023-03-28 08:28:01', NULL, '2023-03-28 08:28:01'),
(6, 6, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 09:08:22', NULL, '2023-03-28 09:08:22'),
(7, 7, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 09:31:29', NULL, '2023-03-28 09:31:29'),
(8, 8, 40, 1, 27.40, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":2,\"name\":\"Ass\"},{\"id\":5,\"name\":\"Big\"}]', '2023-03-28 09:57:11', NULL, '2023-03-28 09:57:11'),
(9, 9, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 09:59:30', NULL, '2023-03-28 09:59:30'),
(10, 10, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 10:03:45', NULL, '2023-03-28 10:03:45'),
(11, 11, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 10:12:49', NULL, '2023-03-28 10:12:49'),
(12, 12, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 10:17:20', NULL, '2023-03-28 10:17:20'),
(13, 13, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 10:22:08', NULL, '2023-03-28 10:22:08'),
(14, 14, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 10:24:21', NULL, '2023-03-28 10:24:21'),
(15, 15, 40, 1, 20.30, '[{\"id\":1,\"name\":\"Color\"},{\"id\":2,\"name\":\"Size\"}]', '[{\"id\":1,\"name\":\"Black\"},{\"id\":3,\"name\":\"Small\"}]', '2023-03-28 10:25:15', NULL, '2023-03-28 10:25:15'),
(16, 16, 42, 1, 80.00, NULL, NULL, '2023-03-29 06:30:17', NULL, '2023-03-29 06:30:17'),
(17, 17, 42, 1, 80.00, NULL, NULL, '2023-03-29 06:36:25', NULL, '2023-03-29 06:36:25'),
(18, 18, 42, 1, 80.00, NULL, NULL, '2023-03-29 08:03:47', NULL, '2023-03-29 08:03:47'),
(19, 19, 42, 1, 80.00, NULL, NULL, '2023-03-29 08:06:40', NULL, '2023-03-29 08:06:40'),
(20, 20, 42, 1, 80.00, NULL, NULL, '2023-03-29 08:09:43', NULL, '2023-03-29 08:09:43');

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
(207, 'about', 'about', 'about_content_description', 'Are you ready to expand your business? Let us help, With a DigitalBizADS account and mobile site you will be able to instantly share your contacts, location, receive phone calls, text messages, and allow your customers to purchase your products from your own mobile webstore!  We put in lots of work to help you advance your business using the most used device in the world, your smart phone. With features like, phone, text, email, gps store location, website, Social media & Store integrations DigitalBizADS is hard to beat!', '2023-01-28 07:33:32', '2023-01-28 07:33:32'),
(208, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(209, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(210, 'about', 'about', 'about_content_title', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(211, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(212, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(213, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(214, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(215, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(216, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(217, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(218, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33'),
(219, 'about', 'about', 'about_content_description', NULL, '2023-01-28 07:33:33', '2023-01-28 07:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('901PrintKings@gmail.com', '$2y$10$szXYBlLRrwnRKcpZn4A8AOYS88u7lMDYAoLkgHzP8fclYpbuyixke', '2023-02-28 19:01:09'),
('ronymia111333@gmail.com', '$2y$10$KQgKHPZQetkIa4jAouD.Vu7otird7OFx5vNhB/Tm/fpDqZHyk20IW', '2023-03-01 22:19:24'),
('showoffgrafixs@gmail.com', '$2y$10$AYeBQPbB9GUGKnoUtERA8e5Wr6HX.g9REFTdMc4.KH/ScB6DxZHIK', '2023-03-04 20:43:45');

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
  `fearures` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_private` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_whatsapp_store` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `plan_name`, `plan_description`, `plan_price`, `validity`, `no_of_vcards`, `no_of_services`, `no_of_galleries`, `no_of_features`, `no_of_payments`, `personalized_link`, `hide_branding`, `free_setup`, `free_support`, `recommended`, `fearures`, `is_private`, `status`, `created_at`, `updated_at`, `is_whatsapp_store`) VALUES
(1, '60673288f0d35', 'Beginner', 'You can take your Biginner plan to start your first Journey !!', '0', '7', '1', 1, 0, NULL, NULL, '0', '0', '0', '0', '0', '[\"About Us\",\"Photo Gallery\"]', '0', '1', '2023-01-28 07:33:18', '2023-03-11 18:43:31', 0),
(2, '606732aa4fb58', 'Intermediate', 'It is our popular plan to jump start business online!', '36', '31', '1', 1, 0, NULL, NULL, '1', '1', '0', '0', '1', '[\"About Us\",\"Photo Gallery\"]', '0', '1', '2023-01-28 07:33:18', '2023-03-11 19:58:24', 0),
(3, '606732cb4ec9b', 'Professional', 'Let\'s go Professional and maximize your business profits!', '48', '31', '3', 999, 0, NULL, NULL, '1', '1', '0', '0', '0', '[\"About Us\",\"Photo Gallery\"]', '0', '1', '2023-01-28 07:33:18', '2023-03-20 08:00:34', 1),
(4, '63eb18462adec', 'Owner Account', 'Free account for owners', '0', '9999', '999', 999, 0, NULL, NULL, '1', '1', '0', '0', '0', NULL, '1', '1', '2023-02-14 12:12:38', '2023-03-05 12:47:43', 1),
(6, '64041aae466bc', 'Diamond', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere. Nulla sit amet volutpat augue. Quisque malesuada vulputate ligula.', '100', '31', '1', 1, 0, 0, 0, '0', '0', '0', '0', '0', NULL, '0', '0', '2023-03-05 11:29:34', '2023-03-06 17:19:56', 0),
(7, '64041cc62f59b', 'Platinum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '100', '31', '1', 10, 0, 0, 0, '0', '0', '0', '0', '0', '[\"Unlimited Image\",\"Unlimited Storage\",\"Unlimited Scan\"]', '0', '0', '2023-03-05 11:38:30', '2023-03-06 17:19:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=inactive,1=active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `user_id`, `category_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 17, 'Clothing', 1, '2023-03-04 17:03:27', '2023-03-04 17:57:45', 17, 17),
(2, 17, 'Households', 1, '2023-03-04 17:03:46', '2023-03-04 17:57:49', 17, 17),
(3, 21, 'pizza', 1, '2023-03-04 17:29:47', '2023-03-04 17:29:47', 21, 21),
(5, 24, 'Shoes', 1, '2023-03-05 15:06:56', '2023-03-05 15:06:56', 24, 24),
(6, 26, '3D All Over T-Shirts', 1, '2023-03-06 22:18:38', '2023-03-06 22:18:38', 26, 26),
(7, 26, 'Graduation Stoles', 1, '2023-03-06 22:18:52', '2023-03-06 22:18:52', 26, 26),
(8, 26, 'Custom 3D T-Shirts', 1, '2023-03-07 14:03:07', '2023-03-07 14:03:07', 26, 26),
(9, 24, 'Christmas Photos', 1, '2023-03-12 04:04:14', '2023-03-12 04:04:14', 24, 24),
(10, 27, 'Influencer', 1, '2023-03-15 14:00:22', '2023-03-15 14:00:22', 27, 27),
(11, 27, 'Game Changer', 1, '2023-03-15 14:07:41', '2023-03-15 14:07:41', 27, 27),
(12, 27, 'Selfie Packages', 1, '2023-03-15 14:08:54', '2023-03-15 14:08:54', 27, 27),
(13, 27, 'Kids Characters', 1, '2023-03-15 14:21:06', '2023-03-15 14:21:06', 27, 27),
(14, 27, 'Holiday Characters', 1, '2023-03-15 14:21:18', '2023-03-15 14:21:18', 27, 27),
(15, 28, 'Mobile', 1, '2023-03-20 19:12:49', '2023-03-20 19:12:49', 28, 28),
(16, 28, 'Electronices', 1, '2023-03-20 19:12:57', '2023-03-20 19:12:57', 28, 28),
(17, 28, 'Cake & Milk', 1, '2023-03-20 19:15:56', '2023-03-20 19:15:56', 28, 28),
(18, 28, 'Beauty & Health', 1, '2023-03-20 19:16:05', '2023-03-20 19:16:05', 28, 28),
(19, 27, 'Senior', 1, '2023-03-22 18:11:23', '2023-03-22 18:11:23', 27, 27),
(20, 9, 'Menswear', 1, '2023-03-22 19:02:23', '2023-03-22 19:02:23', 9, 9),
(21, 9, 'Womenswear', 1, '2023-03-22 19:02:35', '2023-03-22 19:02:35', 9, 9),
(22, 29, 'Car', 1, '2023-03-27 16:51:10', '2023-03-27 16:51:10', 29, 29),
(23, 29, 'Mens fashion', 1, '2023-03-27 16:52:30', '2023-03-27 16:52:30', 29, 29),
(24, 29, 'Womens fashion', 1, '2023-03-27 16:52:43', '2023-03-27 16:52:43', 29, 29);

-- --------------------------------------------------------

--
-- Table structure for table `product_order_transactions`
--

CREATE TABLE `product_order_transactions` (
  `id` int(11) NOT NULL,
  `store_id` varchar(20) NOT NULL,
  `transection_id` varchar(50) NOT NULL,
  `transection_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `provider` varchar(20) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `trsnsection_amount` int(10) NOT NULL,
  `invoice` int(10) NOT NULL,
  `invoice_details` text NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order_transactions`
--

INSERT INTO `product_order_transactions` (`id`, `store_id`, `transection_id`, `transection_date`, `provider`, `currency`, `trsnsection_amount`, `invoice`, `invoice_details`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '642166f2b0c6d', 'pi_3MqW8gIH2i6FoGaE0Yut2nO5', '2023-03-28 00:36:41', 'Stripe', 'usd', 43, 1, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 00:36:41', '2023-03-28 00:36:41'),
(2, '642166f2b0c6d', 'pi_3MqWEFIH2i6FoGaE0EmXLG4y', '2023-03-28 01:14:21', 'Stripe', 'usd', 46, 2, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 01:14:21', '2023-03-28 01:14:21'),
(3, '642166f2b0c6d', 'pi_3MqWmLIH2i6FoGaE0NVaoJnt', '2023-03-28 01:17:23', 'Stripe', 'usd', 195, 3, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 01:17:23', '2023-03-28 01:17:23'),
(4, '642166f2b0c6d', 'pi_3MqXjUIH2i6FoGaE1tAkxDMb', '2023-03-28 02:27:17', 'Stripe', 'usd', 207, 4, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 02:27:17', '2023-03-28 02:27:17'),
(5, '642166f2b0c6d', 'pi_3MqXshIH2i6FoGaE0t9iJ61w', '2023-03-28 02:28:01', 'Stripe', 'usd', 195, 5, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 02:28:01', '2023-03-28 02:28:01'),
(6, '642166f2b0c6d', 'pi_3MqY9BIH2i6FoGaE0xDWEkFF', '2023-03-28 03:07:28', 'Stripe', 'usd', 30, 6, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 03:07:28', '2023-03-28 03:07:28'),
(7, '642166f2b0c6d', 'pi_3MqY9BIH2i6FoGaE0xDWEkFF', '2023-03-28 03:08:22', 'Stripe', 'usd', 30, 7, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 03:08:22', '2023-03-28 03:08:22'),
(8, '642166f2b0c6d', 'pi_3MqYs4IH2i6FoGaE19LMyE9e', '2023-03-28 03:31:28', 'Stripe', 'usd', 40, 8, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 03:31:28', '2023-03-28 03:31:28'),
(9, '642166f2b0c6d', 'pi_3MqZFxIH2i6FoGaE012SgTqe', '2023-03-28 03:57:11', 'Stripe', 'usd', 47, 9, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"3\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 03:57:11', '2023-03-28 03:57:11'),
(10, '642166f2b0c6d', 'pi_3MqZJCIH2i6FoGaE1djMs1qQ', '2023-03-28 03:59:30', 'Stripe', 'usd', 47, 10, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 03:59:30', '2023-03-28 03:59:30'),
(11, '642166f2b0c6d', 'pi_3MqZNLIH2i6FoGaE00bxlzBl', '2023-03-28 04:03:45', 'Stripe', 'usd', 47, 11, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 04:03:45', '2023-03-28 04:03:45'),
(12, '642166f2b0c6d', 'pi_3MqZW9IH2i6FoGaE0R2NQGsA', '2023-03-28 04:12:49', 'Stripe', 'usd', 47, 12, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 04:12:49', '2023-03-28 04:12:49'),
(13, '642166f2b0c6d', 'pi_3MqZaRIH2i6FoGaE0kR1xWGf', '2023-03-28 04:17:20', 'Stripe', 'usd', 47, 13, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 04:17:20', '2023-03-28 04:17:20'),
(14, '642166f2b0c6d', 'pi_3MqZfDIH2i6FoGaE0wlpLGUQ', '2023-03-28 04:22:08', 'Stripe', 'usd', 47, 14, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 04:22:08', '2023-03-28 04:22:08'),
(15, '642166f2b0c6d', 'pi_3MqZhKIH2i6FoGaE1Hcr2TNb', '2023-03-28 04:24:21', 'Stripe', 'usd', 47, 15, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 04:24:21', '2023-03-28 04:24:21'),
(16, '642166f2b0c6d', 'pi_3MqZiDIH2i6FoGaE1VOC19S5', '2023-03-28 04:25:15', 'Stripe', 'usd', 47, 16, '{\"ship_first_name\":\"mdm mridul\",\"ship_last_name\":\"biswas\",\"ship_email\":\"mdmridul@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"manwa\",\"ship_city\":\"dhakja\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu egestas tellus. Maecenas consectetur libero non velit laoreet posuere.\",\"same_as_shipping\":true}', 'succeeded', 1, '2023-03-28 04:25:15', '2023-03-28 04:25:15'),
(17, '6422c4841c6e1', 'PAYID-MQR5TNA1FH58787VS252845B', '2023-03-29 00:24:48', 'Stripe', 'USD', 92, 17, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"test\",\"same_as_shipping\":true}', 'created', 1, '2023-03-29 00:24:48', '2023-03-29 00:24:48'),
(18, '6422c4841c6e1', 'PAYID-MQR5YZQ65J853240S202101S', '2023-03-29 06:36:25', 'Stripe', 'USD', 99, 18, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"1\",\"ship_zip\":\"1740\",\"ship_area\":\"2\",\"order_note\":\"\",\"same_as_shipping\":true}', 'success', 1, '2023-03-29 00:36:18', '2023-03-29 00:36:25'),
(19, '6422c4841c6e1', 'PAYID-MQR52EQ39T89291W99603313', '2023-03-29 00:39:10', 'Stripe', 'USD', 100, 19, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'created', 1, '2023-03-29 00:39:10', '2023-03-29 00:39:10'),
(20, '6422c4841c6e1', 'PAYID-MQR572Q30M34637SX5195749', '2023-03-29 00:51:18', 'Paypal', 'USD', 100, 20, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'created', 1, '2023-03-29 00:51:18', '2023-03-29 00:51:18'),
(21, '6422c4841c6e1', 'PAYID-MQR6AIA1T736626U6959181L', '2023-03-29 00:52:12', 'Paypal', 'USD', 100, 21, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'created', 1, '2023-03-29 00:52:12', '2023-03-29 00:52:12'),
(22, '6422c4841c6e1', 'PAYID-MQR6A3A51G7654773477981B', '2023-03-29 06:53:56', 'Paypal', 'USD', 100, 22, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'Cancel', 1, '2023-03-29 00:53:28', '2023-03-29 00:53:56'),
(23, '6422c4841c6e1', 'PAYID-MQR7BWA67H53932K39114001', '2023-03-29 08:03:47', 'Paypal', 'USD', 100, 23, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'success', 1, '2023-03-29 02:03:36', '2023-03-29 02:03:47'),
(24, '6422c4841c6e1', 'PAYID-MQR7C7Y7VE27036JJ085273W', '2023-03-29 08:06:40', 'Paypal', 'USD', 100, 24, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'success', 1, '2023-03-29 02:06:22', '2023-03-29 02:06:40'),
(25, '6422c4841c6e1', 'PAYID-MQR7EOQ08E81752XD105733J', '2023-03-29 08:09:43', 'Paypal', 'USD', 100, 25, '{\"ship_first_name\":\"Md\",\"ship_last_name\":\"Mridul\",\"ship_email\":\"mdmridul6088@gmail.com\",\"ship_phone\":\"01794798227\",\"ship_address1\":\"zinda park\",\"ship_city\":\"Gandhinagar\",\"ship_state\":\"2\",\"ship_zip\":\"1740\",\"ship_area\":\"1\",\"order_note\":\"\",\"same_as_shipping\":true}', 'success', 1, '2023-03-29 02:09:30', '2023-03-29 02:09:43');

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
(1, '254212fdd454', NULL, NULL, 'Digitalbizads', '/images/web/elements/63d4d84274e3b.png', '/images/web/elements/63d4f09e56e3e.png', 'This is sample meta description', 'keyword 1, keyword 2', '/backend/img/logo.png', NULL, 'DigitalBizAds', 'donotreply@digitalbizads.com', 'smtp', 'p3plzcpnl499959.prod.phx3.secureserver.net', 465, 'tls', 'donotreply@digitalbizads.com', 't&=az5DJ!)9D', '1', '2023-01-28 07:33:19', '2023-03-06 19:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_cost`
--

CREATE TABLE `shipping_cost` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,0) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_cost`
--

INSERT INTO `shipping_cost` (`id`, `user_id`, `name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 29, 'Gazipur', '10', 1, '2023-03-27 17:20:49', '2023-03-27 10:20:49'),
(2, 29, 'Dhaka', '17', 1, '2023-03-27 17:21:06', '2023-03-27 10:21:06'),
(3, 29, 'CoxBazar', '20', 1, '2023-03-27 17:21:33', '2023-03-27 10:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tax_type` enum('percentage','amount') NOT NULL COMMENT 'percentage/amount',
  `amount` decimal(10,0) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `user_id`, `name`, `tax_type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 29, 'Dhaka', 'percentage', '3', 1, '2023-03-27 17:22:51', '2023-03-27 17:22:51'),
(2, 29, 'CoxBazar', 'amount', '10', 1, '2023-03-27 17:23:09', '2023-03-27 17:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `store_products`
--

CREATE TABLE `store_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `badge` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stock` int(100) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_variant` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=none Variant 1=Variant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_products`
--

INSERT INTO `store_products` (`id`, `card_id`, `product_id`, `category_id`, `badge`, `product_image`, `product_name`, `product_subtitle`, `regular_price`, `sales_price`, `product_stock`, `status`, `created_at`, `updated_at`, `is_variant`) VALUES
(4, '63f616e27dbbd', '63f61dbd24ed2', NULL, 'Test', 'images/63db60a48038d-63f616f479a1c.jpg', 'mobile', 'mobile phone', '20', '18', 0, '1', '2023-02-22 07:50:53', '2023-02-22 07:50:53', 0),
(7, '63f712afaf150', '63f73f0502460', NULL, 'test', 'images/63f6f6cc66143-63f73e5da8640.jpg', 'prossor', 'test', '10', '8', 0, '1', '2023-02-23 04:25:09', '2023-02-23 04:25:09', 0),
(8, '63f712afaf150', '63f73f0502ddb', NULL, 'test2', 'images/63f6f6cc66143-63f73eee9e8e2.jpg', 'Pasta', 'test', '30', '20', 0, '1', '2023-02-23 04:25:09', '2023-02-23 04:25:09', 0),
(11, '63f7498ca772a', '63f74e9494cc5', NULL, 'test', 'images/63f6f6cc66143-63f73eee9e8e2.jpg', 'test', 'test', '300', '200', 0, '1', '2023-02-23 05:31:32', '2023-02-23 05:31:32', 0),
(12, '63f7498ca772a', '63f74e94959be', NULL, 'test', 'images/63f6f6cc66143-63f73e5da8640.jpg', 'test', 'yesy', '200', '180', 0, '1', '2023-02-23 05:31:32', '2023-02-23 05:31:32', 0),
(13, '63f77180d7ffb', '63faf27c66672', NULL, 'test', 'images/63f6f6cc66143-63f73eee9e8e2.jpg', 'test', 'test', '20', '20', 0, '1', '2023-02-25 23:47:40', '2023-02-25 23:47:40', 0),
(16, '63fb0852e19a8', '64030f1e24d77', 6, 'test', 'images/63f6f6cc66143-63f73eee9e8e2.jpg', 'test 1', 'test 1', '200', '180', 0, '1', '2023-03-04 03:27:58', '2023-03-04 03:27:58', 0),
(17, '63fb0852e19a8', '64030f1e25896', 3, 'test 2', 'images/63f6f6cc66143-63f73e5da8640.jpg', 'test 2', 'test 2', '150', '140', 0, '1', '2023-03-04 03:27:58', '2023-03-04 03:27:58', 0),
(34, '64100a26dc8f8', '641013762f536', 10, 'Premium', 'images/641008af6cc65-64100a852924c.jpg', 'Panini-Cheese-Burger', 'Burger', '20', '18', 0, '1', '2023-03-14 00:25:58', '2023-03-18 22:24:00', 0),
(35, '64100a26dc8f8', '64104cdcbeb4d', 11, 'Premium', 'images/641008af6cc65-64100a84d62fe.jpg', 'Big Kahuna 🧀🥓🍍🌶️🌶️+Neu !!', 'Big Kahuna', '12', '10', 0, '1', '2023-03-14 04:30:52', '2023-03-18 06:56:10', 1),
(36, '6416d57c8917e', '6416f70b5efc1', 12, 'TOP', 'images/6416d4d4c13dc-6416d66655e64.png', 'Best', 'Welcome to my car house', '1000', '999', 10, '0', '2023-03-19 05:50:35', '2023-03-19 05:50:58', 0),
(37, '63f6ed636e3b3', '6417f5fba7ee2', 15, 'TOP', 'images/63d4eb634a936-6417f5f59eb01.png', 'BMW', 'welcome to my car house', '10000', '9999', 100, '1', '2023-03-19 23:58:19', '2023-03-19 23:58:19', 0),
(38, '63f6ed636e3b3', '64182d5dcdf8a', 14, 'NEW', 'images/63d4eb634a936-64182d348b9f1.jpg', 'BMW black', 'BMW black is good', '5000', '4900', 31, '1', '2023-03-20 03:54:37', '2023-03-20 04:24:39', 1),
(39, '642166f2b0c6d', '64216d01199c8', 22, 'Premium', 'images/64216345cad97-64216c0718165.jpg', 'Big Car', 'Big Car', '200', '180', 10, '1', '2023-03-27 17:16:33', '2023-03-27 17:16:33', 0),
(40, '642166f2b0c6d', '64217835842d6', 23, 'Premium', 'images/64216345cad97-64217828c5e3a.jpg', 'Tshirt', 'Tshirt', '10', '10', 0, '1', '2023-03-27 18:04:21', '2023-03-27 18:04:21', 1),
(42, '6422c4841c6e1', '6423be4211c7b', 22, 'Premium', 'images/64216345cad97-64242807a1a02.jpg', 'Auti r8 super car', 'Big Car', '100', '80', 10, '1', '2023-03-28 22:27:46', '2023-03-29 05:59:08', 0),
(43, '6422c4841c6e1', '64240466ba514', 22, 'Premium', 'images/64216345cad97-6423be1b79394.jpg', 'Nissan', 'Nissan', '10', '8', 10, '1', '2023-03-29 03:27:02', '2023-03-29 03:27:02', 0);

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
(14, 'ranassss@gmail.com', '2023-02-07 22:37:09', '2023-02-07 22:37:09', 7),
(15, 'ss@gmail.com', '2023-02-26 18:27:51', '2023-02-26 18:27:51', 27),
(16, 'shiwoffgrafixs@gmail.com', '2023-03-10 11:45:01', '2023-03-10 11:45:01', 50),
(17, 'ronymia2211@gmail.com', '2023-03-12 20:58:27', '2023-03-12 20:58:27', 27),
(18, 'fdsf@fdsf', '2023-03-20 19:03:55', '2023-03-20 19:03:55', 57),
(19, 'fds1212f@fdsf', '2023-03-20 19:04:08', '2023-03-20 19:04:08', 57),
(20, 'iris@gmail.com', '2023-03-21 09:18:56', '2023-03-21 09:18:56', 55),
(21, 'mdmridul608@gmail.com', '2023-03-27 16:46:59', '2023-03-27 16:46:59', 60);

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
(5, '63db975b9c6f4', '2023-02-02 10:58:35', 'pi_3MX0UxGh5kKYxQzX0PRHScKz', '2', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '24', '2', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"1234\",\"to_billing_zipcode\":\"1214\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":24,\"subtotal\":\"24\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-02 17:58:35', '2023-02-02 17:58:47'),
(6, '63e20eea79014', '2023-02-07 08:42:18', '63e20eea79043', '7', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Arifur\",\"to_billing_address\":\"Banani Dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1212\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":null,\"to_billing_email\":\"arifur@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-07 15:42:18', '2023-02-07 15:42:18'),
(7, '63e26a239f8b0', '2023-02-07 15:11:31', '63e26a239f913', '9', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":\"asas\",\"to_billing_city\":\"asas\",\"to_billing_state\":\"asas\",\"to_billing_zipcode\":\"242342\",\"to_billing_country\":\"Aland Islands\",\"to_billing_phone\":\"01710785555\",\"to_billing_email\":\"user2@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-07 22:11:31', '2023-02-07 22:11:31'),
(9, '63e90a9e703a1', '2023-02-12 15:49:50', '63e90a9e703cf', '11', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-12 22:49:50', '2023-02-12 22:49:50'),
(10, '63eb1878a52b0', '2023-02-14 05:13:28', '', '11', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '3', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-14 12:13:28', '2023-02-14 12:13:28'),
(11, '63eb8f909d64e', '2023-02-14 13:41:36', '63eb8f909d682', '12', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Abdullah\",\"to_billing_address\":\"Unit 10A, House 21, Road 17, Banani C\\/A, Dhaka 1213\",\"to_billing_city\":\"Banani\",\"to_billing_state\":\"Banani\",\"to_billing_zipcode\":\"1212\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01710788656\",\"to_billing_email\":\"abdullah@gmail.com\",\"to_vat_number\":\"123456\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-14 20:41:36', '2023-02-14 20:41:36'),
(12, '63eb9263ae98e', '2023-02-14 13:53:39', '', '12', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '24', '4', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Abdullah\",\"to_billing_address\":\"Unit 10A, House 21, Road 17, Banani C\\/A, Dhaka 1213\",\"to_billing_city\":\"Banani\",\"to_billing_state\":\"Banani\",\"to_billing_zipcode\":\"1212\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01710788656\",\"to_billing_email\":\"abdullah@gmail.com\",\"to_vat_number\":\"123456\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":24,\"subtotal\":\"24\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-14 20:53:39', '2023-02-14 20:53:39'),
(16, '63f914d9e3e8c', '2023-02-24 19:49:45', '63f914d9e3eb9', '16', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"sherman bowen\",\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":\"godsproductionhousellc@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 02:49:45', '2023-02-25 02:49:45'),
(17, '63f914ed0242f', '2023-02-24 19:50:05', '63f914ed0245f', '14', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"kelli allen\",\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":\"moramommy12@GMAIL.COM\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-25 02:50:05', '2023-02-25 02:50:05'),
(18, '63fb40d8dfc09', '2023-02-26 11:22:01', 'pi_3MfiInBIRmXVjgUG1Wh26mmb', '17', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '36', '7', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+8801767671133\",\"to_billing_email\":\"ronymia111333@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-26 18:22:01', '2023-02-26 18:22:15'),
(19, '63fb4299ab7f9', '2023-02-26 11:29:29', '', '17', '60673288f0d35', 'Beginner Plan', 'Offline', 'USD', '0', '8', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+8801767671133\",\"to_billing_email\":\"ronymia111333@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-26 18:29:29', '2023-02-26 18:29:29'),
(20, '63fb429eae525', '2023-02-26 11:29:34', '', '17', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '9', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+8801767671133\",\"to_billing_email\":\"ronymia111333@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-26 18:29:34', '2023-02-26 18:29:34'),
(21, '63fb5c367556d', '2023-02-26 13:18:46', '', '17', '60673288f0d35', 'Beginner Plan', 'Offline', 'USD', '0', '10', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+8801767671133\",\"to_billing_email\":\"ronymia111333@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-26 20:18:46', '2023-02-26 20:18:46'),
(22, '63fb5c468b936', '2023-02-26 13:19:02', '', '17', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '11', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"dhaka\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"+8801767671133\",\"to_billing_email\":\"ronymia111333@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-26 20:19:02', '2023-02-26 20:19:02'),
(23, '63fb8e6da8569', '2023-02-26 16:53:01', '', '5', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '12', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-26 23:53:01', '2023-02-26 23:53:01'),
(24, '63fdbfc85df55', '2023-02-28 08:48:08', '', '11', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '13', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-02-28 15:48:08', '2023-02-28 15:48:08'),
(25, '64003869ccf0f', '2023-03-02 05:47:21', '', '11', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '12', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-02 12:47:21', '2023-03-02 12:47:21'),
(26, '64003c5cedad8', '2023-03-02 06:04:12', '', '11', '60673288f0d35', 'Beginner Plan', 'Offline', 'USD', '0', '13', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-02 13:04:12', '2023-03-02 13:04:12'),
(27, '64003c633628e', '2023-03-02 06:04:19', '', '11', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '14', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Doneise Turner\",\"to_billing_address\":\"14235 Rutland\",\"to_billing_city\":\"Detroit\",\"to_billing_state\":\"Michigan\",\"to_billing_zipcode\":\"48227\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"13135802917\",\"to_billing_email\":\"dturner071882@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-02 13:04:19', '2023-03-02 13:04:19'),
(30, '6403320f95122', '2023-03-04 11:57:03', '', '22', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '16', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-04 18:57:03', '2023-03-04 18:57:03'),
(31, '640341d6cb818', '2023-03-04 13:04:22', '464654', '23', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '19', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"1234\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"rony@gmail.com\",\"to_vat_number\":\"1234\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-04 20:04:22', '2023-03-05 12:44:56'),
(32, '64034239c002c', '2023-03-04 13:06:01', '', '23', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '17', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"1234\",\"to_billing_zipcode\":\"1234\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"rony@gmail.com\",\"to_vat_number\":\"1234\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-04 20:06:01', '2023-03-04 20:06:01'),
(33, '640342da26dfd', '2023-03-04 13:08:42', '', '24', '63eb18462adec', 'Owner Account Plan', 'Offline', 'USD', '0', '18', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":\"0\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-04 20:08:42', '2023-03-04 20:08:42'),
(34, '64042c2ba90c3', '2023-03-05 05:44:11', 'aaaaaaaaaaa', '2', '64041cc62f59b', 'Platinum Plan', 'Offline', 'USD', '100', '20', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Rony\",\"to_billing_address\":\"dhaka\",\"to_billing_city\":\"dhaka\",\"to_billing_state\":\"1234\",\"to_billing_zipcode\":\"1214\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01990572321\",\"to_billing_email\":\"ronymia.tech@gmail.com\",\"to_vat_number\":\"123\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":100,\"subtotal\":\"100\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-05 12:44:11', '2023-03-05 12:45:04'),
(35, '640433e587f04', '2023-03-05 06:17:09', '', '25', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '21', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-05 13:17:09', '2023-03-05 13:17:09'),
(36, '6405dfa4d4a53', '2023-03-06 12:42:12', '6405dfa4d4a8c', '26', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Kim Collins\",\"to_billing_address\":\"4215 moon shadow Loop\",\"to_billing_city\":\"Mulberry\",\"to_billing_state\":\"Fl\",\"to_billing_zipcode\":\"33860\",\"to_billing_country\":null,\"to_billing_phone\":\"8138488810\",\"to_billing_email\":\"kimk0304@icloud.com\",\"to_vat_number\":\"593761380\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-06 19:42:12', '2023-03-06 19:42:12'),
(37, '6405e3ce9d03d', '2023-03-06 12:59:58', '', '26', '606732aa4fb58', 'Intermediate Plan', 'Offline', 'USD', '36', '22', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Kim Collins\",\"to_billing_address\":\"4215 moon shadow Loop\",\"to_billing_city\":\"Mulberry\",\"to_billing_state\":\"Fl\",\"to_billing_zipcode\":\"33860\",\"to_billing_country\":null,\"to_billing_phone\":\"8138488810\",\"to_billing_email\":\"kimk0304@icloud.com\",\"to_vat_number\":\"593761380\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-06 19:59:58', '2023-03-06 19:59:58'),
(38, '64115c3e3c33c', '2023-03-15 05:48:46', 'pi_3MlnCcBIRmXVjgUG0qWl281Y', '27', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Shavon Adams\",\"to_billing_address\":\"6438 Manchester Dr\",\"to_billing_city\":\"Horn lake\",\"to_billing_state\":\"Ms\",\"to_billing_zipcode\":\"38637\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"6624024001\",\"to_billing_email\":\"Feelinmyselfie@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-15 12:48:46', '2023-03-15 12:48:46'),
(39, '64116270b968a', '2023-03-15 06:15:12', '64116270b96c1', '27', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":null,\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":null,\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-15 13:15:12', '2023-03-15 13:15:12'),
(40, '64116cd5ab9f4', '2023-03-15 06:59:33', '', '27', '606732cb4ec9b', 'Professional Plan', 'Offline', 'USD', '48', '23', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Shavon Adams\",\"to_billing_address\":\"6438 Manchester Dr\",\"to_billing_city\":\"Horn lake\",\"to_billing_state\":\"Ms\",\"to_billing_zipcode\":\"38637\",\"to_billing_country\":\"United States\",\"to_billing_phone\":\"6624024001\",\"to_billing_email\":\"Feelinmyselfie@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-15 13:59:33', '2023-03-15 13:59:33'),
(41, '64184645de07b', '2023-03-20 11:40:53', '64184645de0a7', '28', '60673288f0d35', 'Beginner Plan', 'FREE', 'USD', '0', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"rabin\",\"to_billing_address\":null,\"to_billing_city\":null,\"to_billing_state\":null,\"to_billing_zipcode\":null,\"to_billing_country\":null,\"to_billing_phone\":null,\"to_billing_email\":\"rabinmia7578@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":0,\"subtotal\":0,\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-20 18:40:53', '2023-03-20 18:40:53'),
(42, '64184af1e3335', '2023-03-20 12:00:50', 'pi_3MnhOQBvw926rAz9043tzTmq', '28', '606732aa4fb58', 'Intermediate Plan', 'Stripe', 'USD', '36', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"rabin\",\"to_billing_address\":\"fdsf\",\"to_billing_city\":\"fds\",\"to_billing_state\":\"fds\",\"to_billing_zipcode\":\"fds\",\"to_billing_country\":\"Denmark\",\"to_billing_phone\":\"dsfsdf\",\"to_billing_email\":\"rabinmia7578@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-20 19:00:50', '2023-03-20 19:00:50'),
(43, '64184cc7b32c3', '2023-03-20 12:08:40', 'pi_3MnhVzBvw926rAz90WpBJl6Y', '28', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"rabin\",\"to_billing_address\":\"fdsf\",\"to_billing_city\":\"fds\",\"to_billing_state\":\"fds\",\"to_billing_zipcode\":\"fds\",\"to_billing_country\":\"Denmark\",\"to_billing_phone\":\"dsfsdf\",\"to_billing_email\":\"rabinmia7578@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-20 19:08:40', '2023-03-20 19:08:40'),
(44, '64184d0982a2b', '2023-03-20 12:09:45', 'pi_3MnhX3Bvw926rAz91Yy6DAUr', '28', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"rabin\",\"to_billing_address\":\"fdsf\",\"to_billing_city\":\"fds\",\"to_billing_state\":\"fds\",\"to_billing_zipcode\":\"fds\",\"to_billing_country\":\"Denmark\",\"to_billing_phone\":\"dsfsdf\",\"to_billing_email\":\"rabinmia7578@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-20 19:09:45', '2023-03-20 19:09:45'),
(45, '64184d1deda6a', '2023-03-20 12:10:05', 'sdfsdffdsfdf', '28', '606732cb4ec9b', 'Professional Plan', 'Offline', 'USD', '48', '24', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"rabin\",\"to_billing_address\":\"fdsf\",\"to_billing_city\":\"fds\",\"to_billing_state\":\"fds\",\"to_billing_zipcode\":\"fds\",\"to_billing_country\":\"Denmark\",\"to_billing_phone\":\"dsfsdf\",\"to_billing_email\":\"rabinmia7578@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-20 19:10:05', '2023-03-20 19:10:53'),
(46, '641aeb4ab3604', '2023-03-22 11:49:31', 'pi_3MoQAYBvw926rAz91FmUJprM', '9', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":\"asas\",\"to_billing_city\":\"asas\",\"to_billing_state\":\"asas\",\"to_billing_zipcode\":\"242342\",\"to_billing_country\":\"Aland Islands\",\"to_billing_phone\":\"01710785555\",\"to_billing_email\":\"user2@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-22 18:49:31', '2023-03-22 18:49:31'),
(47, '641aed048077b', '2023-03-22 11:56:52', 'pi_3MoQHgBIRmXVjgUG1nKsxm2q', '9', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', '26', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"user\",\"to_billing_address\":\"asas\",\"to_billing_city\":\"asas\",\"to_billing_state\":\"asas\",\"to_billing_zipcode\":\"242342\",\"to_billing_country\":\"Aland Islands\",\"to_billing_phone\":\"01710785555\",\"to_billing_email\":\"user2@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-22 18:56:52', '2023-03-22 18:57:04'),
(48, '64216406d5945', '2023-03-27 09:38:15', 'pi_3MqCVHBIRmXVjgUG059sjk4H', '29', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"md mridul\",\"to_billing_address\":\"mawna\",\"to_billing_city\":\"Dhaka\",\"to_billing_state\":\"Dhaka\",\"to_billing_zipcode\":\"1740\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01794798227\",\"to_billing_email\":\"mdmridul608@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-27 16:38:15', '2023-03-27 16:38:15'),
(49, '642164185f4cd', '2023-03-27 09:38:32', 'pi_3MqCVYBIRmXVjgUG0YDJj7Fx', '29', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', '25', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"md mridul\",\"to_billing_address\":\"mawna\",\"to_billing_city\":\"Dhaka\",\"to_billing_state\":\"Dhaka\",\"to_billing_zipcode\":\"1740\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01794798227\",\"to_billing_email\":\"mdmridul608@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-27 16:38:32', '2023-03-27 16:39:00'),
(50, '642165a5805c1', '2023-03-27 09:45:09', 'pi_3MqCbxBIRmXVjgUG00vTulf7', '30', '606732cb4ec9b', 'Professional Plan', 'Stripe', 'USD', '48', '26', '', '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"Cally Beach\",\"to_billing_address\":\"Sit repudiandae est\",\"to_billing_city\":\"Assumenda dolor cumq\",\"to_billing_state\":\"Facere accusamus vol\",\"to_billing_zipcode\":\"55695\",\"to_billing_country\":\"Nigeria\",\"to_billing_phone\":\"+1 (871) 519-8559\",\"to_billing_email\":\"kununoq@mailinator.com\",\"to_vat_number\":\"488\",\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":48,\"subtotal\":\"48\",\"tax_amount\":0}', 'SUCCESS', '1', '2023-03-27 16:45:09', '2023-03-27 16:46:12'),
(51, '6423ce3f4f205', '2023-03-29 05:35:59', 'PAYID-MQR44QQ11H83890WM476394S', '29', '606732aa4fb58', 'Intermediate Plan', 'PayPal', 'USD', '36', NULL, NULL, '{\"from_billing_name\":\"\",\"from_billing_address\":\"\",\"from_billing_city\":\"\",\"from_billing_state\":\"\",\"from_billing_zipcode\":\"\",\"from_billing_country\":\"\",\"from_vat_number\":\"\",\"from_billing_phone\":\"\",\"from_billing_email\":\"\",\"to_billing_name\":\"md mridul\",\"to_billing_address\":\"mawna\",\"to_billing_city\":\"Dhaka\",\"to_billing_state\":\"Dhaka\",\"to_billing_zipcode\":\"1740\",\"to_billing_country\":\"Bangladesh\",\"to_billing_phone\":\"01794798227\",\"to_billing_email\":\"mdmridul608@gmail.com\",\"to_vat_number\":null,\"tax_name\":\"\",\"tax_type\":\"\",\"tax_value\":\"\",\"invoice_amount\":36,\"subtotal\":\"36\",\"tax_amount\":0}', 'PENDING', '1', '2023-03-28 23:35:59', '2023-03-28 23:35:59');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stripe_public_key` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_public_key` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_secret_key` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_mode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sandbox' COMMENT 'sandbox,live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `auth_type`, `profile_image`, `plan_id`, `term`, `plan_details`, `plan_validity`, `plan_activation_date`, `billing_name`, `type`, `vat_number`, `billing_address`, `billing_city`, `billing_state`, `billing_zipcode`, `billing_country`, `billing_phone`, `billing_email`, `status`, `remember_token`, `created_at`, `updated_at`, `stripe_public_key`, `stripe_secret_key`, `paypal_public_key`, `paypal_secret_key`, `paypal_mode`) VALUES
(1, '609c03880ee47', 'Admin', 'arobil@gmail.com', 1, NULL, '$2y$10$6CTjoLHHCVY.tN8.ZQ3GJOAzdAAP/x5fw.dvBsINrZsz.3ftLdBsK', 'Email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-28 07:33:19', '2023-01-28 02:07:48', NULL, NULL, NULL, NULL, 'sandbox'),
(2, '63d4eb634a936', 'Rony', 'ronymia.tech@gmail.com', 2, NULL, '$2y$10$keJSi20npNuj/Fkxz4S9O.Oc2eCjjcpTGD4p1uwenVIU/mq2031Gu', 'Email', NULL, '64041cc62f59b', '31', '{\"id\":7,\"plan_id\":\"64041cc62f59b\",\"plan_name\":\"Platinum\",\"plan_description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\",\"plan_price\":\"100\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":\"10\",\"no_of_galleries\":\"0\",\"no_of_features\":\"0\",\"no_of_payments\":\"0\",\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"fearures\":\"\\\"[\\\\\\\"Unlimited Photo\\\\\\\",\\\\\\\"Unlimited Scan\\\\\\\",\\\\\\\"Unlimited Storage\\\\\\\"]\\\"\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-03-05T04:38:30.000000Z\",\"updated_at\":\"2023-03-05T04:38:30.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-05 05:45:04', '2023-03-05 12:45:04', 'Rony', 'personal', '123', 'dhaka', 'dhaka', '1234', '1214', 'Bangladesh', '01990572321', 'ronymia.tech@gmail.com', 1, NULL, '2023-01-28 03:31:15', '2023-03-05 12:45:04', NULL, NULL, NULL, NULL, 'sandbox'),
(3, '63da686ca8829', 'Arifur', 'arfmahmud64@gmail.com', 2, NULL, '$2y$10$J4rrUSjTJmWmYVrbBIFBTuy4JQaKfMPuke.wxeTkgsLc8WuCZVige', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":5,\"no_of_galleries\":5,\"no_of_features\":5,\"no_of_payments\":5,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T13:33:18.000000Z\",\"updated_at\":\"2023-01-28T09:25:26.000000Z\"}', '2023-03-04 13:29:14', '2023-02-01 07:29:14', 'Arifur', 'personal', NULL, 'werwer', 'werwer', 'werwr', '1215', 'Bangladesh', '01710788565', 'arfmahmud64@gmail.com', 1, NULL, '2023-02-01 07:26:04', '2023-02-01 07:29:14', NULL, NULL, NULL, NULL, 'sandbox'),
(4, '63db60a48038d', 'Rony', 'ronymia2211@gmail.com', 2, NULL, '$2y$10$Gyu0EsLCxFj4KxoAji2lV..FijcCautOXc/rXS0tcQm8r62uBm4/W', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"24\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"10\",\"no_of_galleries\":\"10\",\"no_of_features\":\"10\",\"no_of_payments\":\"10\",\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:55.000000Z\"}', '2023-03-05 07:08:54', '2023-02-02 14:08:54', 'Rony Islam', 'personal', '5464', 'dhaka, banani\r\ndhaka', 'Chittoor', 'ANDHRA PRADESH', '1213', 'Bangladesh', '+880199057232', 'ronymia.tech@gmail.com', 1, NULL, '2023-02-02 14:05:08', '2023-02-02 14:08:54', NULL, NULL, NULL, NULL, 'sandbox'),
(5, '63db64d839019', 'Sherman', 'showoffgrafixs@gmail.com', 2, NULL, '$2y$10$bZMe8MZVkp.aCKy08Modi.1pk.4cvtLhcjszkoANOIubCxURVLbwm', 'Email', NULL, '63eb18462adec', '9999', '{\"id\":4,\"plan_id\":\"63eb18462adec\",\"plan_name\":\"Owner Account\",\"plan_description\":\"Free account for owners\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"999\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"1\",\"status\":\"1\",\"created_at\":\"2023-02-14T05:12:38.000000Z\",\"updated_at\":\"2023-02-26T14:47:55.000000Z\",\"is_whatsapp_store\":\"1\"}', '2050-07-13 16:53:01', '2023-02-26 23:53:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-02-02 14:23:04', '2023-02-26 23:53:01', NULL, NULL, NULL, NULL, 'sandbox'),
(7, '63e20ebb55d77', 'Arifur', 'arifur@gmail.com', 2, NULL, '$2y$10$Hp86S3TRTWpOYXcdTSdmXOvzvKK5ntiojvJX2d4odST./m/xecEx6', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"31\",\"no_of_vcards\":\"1\",\"no_of_services\":\"5\",\"no_of_galleries\":\"5\",\"no_of_features\":\"5\",\"no_of_payments\":\"5\",\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:26.000000Z\"}', '2023-03-10 08:42:18', '2023-02-07 15:42:18', 'Arifur', 'personal', NULL, 'Banani Dhaka', 'dhaka', 'dhaka', '1212', 'Bangladesh', NULL, 'arifur@gmail.com', 1, NULL, '2023-02-07 15:41:31', '2023-02-07 15:42:18', NULL, NULL, NULL, NULL, 'sandbox'),
(9, '63e26a04a0034', 'user', 'maidul.tech@gmail.com', 2, NULL, '$2y$10$kKXeHQVOKGb.baDseIR8xe9RkKjdMB5OG.F0juqpoBbPq7XjWwdx2', 'Email', NULL, '606732cb4ec9b', '31', '{\"id\":3,\"plan_id\":\"606732cb4ec9b\",\"plan_name\":\"Professional\",\"plan_description\":\"Let\'s go Professional and maximize your business profits!\",\"plan_price\":\"48\",\"validity\":\"31\",\"no_of_vcards\":\"3\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"fearures\":\"[\\\"About Us\\\",\\\"Photo Gallery\\\"]\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-20T01:00:34.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-05-23 11:57:02', '2023-03-22 18:57:04', 'user', 'personal', NULL, 'asas', 'asas', 'asas', '242342', 'Aland Islands', '01710785555', 'user2@gmail.com', 1, 'Cq15m3zEOtfzaHeVV8TAyT1fKazZEnJAI63kEwMKl1vo4LXyyVE8Lbl6IDV7', '2023-02-07 22:11:00', '2023-03-22 18:57:04', NULL, NULL, NULL, NULL, 'sandbox'),
(11, '63e9073664817', 'Doneise', 'dturner071882@gmail.com', 2, NULL, '$2y$10$MuQhsBd6d4/z/c/RT7d90OZgXSgISBCStpqLX1ll6Sg5zQO8wctV6', 'Email', NULL, '63eb18462adec', '9999', '{\"id\":4,\"plan_id\":\"63eb18462adec\",\"plan_name\":\"Owner Account\",\"plan_description\":\"Free account for owners\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"999\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"1\",\"status\":\"1\",\"created_at\":\"2023-02-14T05:12:38.000000Z\",\"updated_at\":\"2023-03-02T05:53:17.000000Z\",\"is_whatsapp_store\":\"1\"}', '2050-07-17 06:04:19', '2023-03-02 13:04:19', 'Doneise Turner', 'personal', NULL, '14235 Rutland', 'Detroit', 'Michigan', '48227', 'United States', '13135802917', 'dturner071882@gmail.com', 1, NULL, '2023-02-12 22:35:18', '2023-03-02 13:04:19', NULL, NULL, NULL, NULL, 'sandbox'),
(12, '63eb8f51b7e72', 'Abdullah', 'abdullah@gmail.com', 2, NULL, '$2y$10$QIPD9s4IQGh74nDiKDGuaedpCni9TPm.F0ktocHlGhfJvidxLK/oy', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"24\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"10\",\"no_of_galleries\":\"10\",\"no_of_features\":\"10\",\"no_of_payments\":\"10\",\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-01-27T20:25:55.000000Z\"}', '2023-03-17 13:53:39', '2023-02-14 20:53:39', 'Abdullah', 'personal', '123456', 'Unit 10A, House 21, Road 17, Banani C/A, Dhaka 1213', 'Banani', 'Banani', '1212', 'Bangladesh', '01710788656', 'abdullah@gmail.com', 1, NULL, '2023-02-14 20:40:33', '2023-02-14 20:53:39', NULL, NULL, NULL, NULL, 'sandbox'),
(14, '63f912e575961', 'kelli allen', 'moramommy12@GMAIL.COM', 2, NULL, '$2y$10$k9Jc0aprz/muE/qf6TY5B.JRkyEQ6NgLcbqveRV1DHdqE.81tddBe', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"7\",\"no_of_vcards\":\"1\",\"no_of_services\":\"1\",\"no_of_galleries\":\"1\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-02-16T14:15:56.000000Z\"}', '2023-03-03 19:50:05', '2023-02-25 02:50:05', 'kelli allen', 'personal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'moramommy12@GMAIL.COM', 1, NULL, '2023-02-25 02:41:25', '2023-02-25 02:50:05', NULL, NULL, NULL, NULL, 'sandbox'),
(16, '63f914c230eb5', 'sherman bowen', 'godsproductionhousellc@gmail.com', 2, NULL, '$2y$10$OWs/NBEP4mXSEFKyifva7.Kt8yO53.M1gyE0qlJhhEkPFsqolR5hu', 'Email', NULL, '60673288f0d35', '9999', '{\"id\":1,\"plan_id\":\"60673288f0d35\",\"plan_name\":\"Beginner\",\"plan_description\":\"You can take your Biginner plan to start your first Journey !!\",\"plan_price\":\"0\",\"validity\":\"7\",\"no_of_vcards\":\"1\",\"no_of_services\":\"1\",\"no_of_galleries\":\"1\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"0\",\"hide_branding\":\"0\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-02-16T14:15:56.000000Z\"}', '2023-03-03 19:49:45', '2023-02-25 02:49:45', 'sherman bowen', 'personal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'godsproductionhousellc@gmail.com', 1, NULL, '2023-02-25 02:49:22', '2023-02-25 02:49:45', NULL, NULL, NULL, NULL, 'sandbox'),
(17, '63fb3f868661b', 'Rony', 'ronymia111333@gmail.com', 2, NULL, '$2y$10$FH1CZ851zMiyZ/69nyHOau0ehTBfr16cJC6Q6YYPtFwVEpuxPi4Ye', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to start business with us\",\"plan_price\":\"36\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"10\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-02-26T11:29:06.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-03-29 13:19:02', '2023-02-26 20:19:02', 'Rony', 'personal', '123', 'dhaka', 'dhaka', 'dhaka', '1234', 'Bangladesh', '+8801767671133', 'ronymia111333@gmail.com', 1, NULL, '2023-02-26 18:16:22', '2023-03-12 21:04:57', 'test', 'test', 'test', 'test', 'sandbox'),
(22, '640331a325a85', 'Sherman Bowen II', '901printkings@gmail.com', 2, NULL, '$2y$10$rB5DnaysNonaFxQpZ4isIOkk9psbXlqrWlSsoy0..vB.SqgMtsNfm', 'Email', NULL, '63eb18462adec', '9999', '{\"id\":4,\"plan_id\":\"63eb18462adec\",\"plan_name\":\"Owner Account\",\"plan_description\":\"Free account for owners\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"999\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"1\",\"status\":\"1\",\"created_at\":\"2023-02-14T05:12:38.000000Z\",\"updated_at\":\"2023-03-02T05:53:17.000000Z\",\"is_whatsapp_store\":\"1\"}', '2050-07-19 11:57:03', '2023-03-04 18:57:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 18:55:15', '2023-03-04 18:57:03', NULL, NULL, NULL, NULL, 'sandbox'),
(23, '640341a20e936', 'Store', 'store@gmail.com', 2, NULL, '$2y$10$DV1UNa70rEzZ9p4mWGTI/ub5AMii85hY/w87c94JwC5KKFwtdK.ZK', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to jump start business online!\",\"plan_price\":\"36\",\"validity\":\"31\",\"no_of_vcards\":\"2\",\"no_of_services\":\"10\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"fearures\":null,\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-02T05:32:44.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-05-05 13:06:01', '2023-03-05 12:44:56', 'Rony', 'personal', '1234', 'dhaka', 'dhaka', '1234', '1234', 'Bangladesh', '01990572321', 'rony@gmail.com', 1, NULL, '2023-03-04 20:03:30', '2023-03-05 12:44:56', NULL, NULL, NULL, NULL, 'sandbox'),
(24, '640342b16c2b7', 'Sherman', 'xpresssph@gmail.com', 2, NULL, '$2y$10$5m2pSRdZtj.G/nqhMZu8p.uzJgsMOvbCp8MjO28riokM2EzWicsR6', 'Email', NULL, '63eb18462adec', '9999', '{\"id\":4,\"plan_id\":\"63eb18462adec\",\"plan_name\":\"Owner Account\",\"plan_description\":\"Free account for owners\",\"plan_price\":\"0\",\"validity\":\"9999\",\"no_of_vcards\":\"999\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"is_private\":\"1\",\"status\":\"1\",\"created_at\":\"2023-02-14T05:12:38.000000Z\",\"updated_at\":\"2023-03-02T05:53:17.000000Z\",\"is_whatsapp_store\":\"1\"}', '2050-07-19 13:08:42', '2023-03-04 20:08:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-04 20:08:01', '2023-03-04 20:08:42', NULL, NULL, NULL, NULL, 'sandbox'),
(25, '640433c43b41b', 'Joinal', 'joinal@gmail.com', 2, NULL, '$2y$10$nKWuDVAsEMoFuSrf4qmbQuSlTfPMBEejyOJadEqomJxUJhYcSXWoW', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to jump start business online!\",\"plan_price\":\"36\",\"validity\":\"31\",\"no_of_vcards\":\"2\",\"no_of_services\":\"10\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"fearures\":null,\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-02T05:32:44.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-05 06:17:09', '2023-03-05 13:17:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-03-05 13:16:36', '2023-03-05 13:17:09', NULL, NULL, NULL, NULL, 'sandbox'),
(26, '6405df5e02e9e', 'Kim Collins', 'kimk0304@icloud.com', 2, NULL, '$2y$10$lnjz3nVKf.MdTv8.1f.TYOkDNiGNvDMl2Ze1fpAL4nJhV8VglBDRG', 'Email', NULL, '606732aa4fb58', '31', '{\"id\":2,\"plan_id\":\"606732aa4fb58\",\"plan_name\":\"Intermediate\",\"plan_description\":\"It is our popular plan to jump start business online!\",\"plan_price\":\"36\",\"validity\":\"31\",\"no_of_vcards\":\"2\",\"no_of_services\":\"10\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"1\",\"fearures\":null,\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-02T05:32:44.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-06 12:59:58', '2023-03-06 19:59:58', 'Kim Collins', 'business', '593761380', '4215 moon shadow Loop', 'Mulberry', 'Fl', '33860', NULL, '8138488810', 'kimk0304@icloud.com', 1, NULL, '2023-03-06 19:41:02', '2023-03-06 19:59:58', NULL, NULL, NULL, NULL, 'sandbox'),
(27, '64115b67a5789', 'Shavon Adams', 'Feelinmyselfie@gmail.com', 2, NULL, '$2y$10$Ni4oBR.K3r67YwysA/BCae3GTV1Xll6FT5ddtxmz8BbKlf4MZQOkO', 'Email', NULL, '606732cb4ec9b', '31', '{\"id\":3,\"plan_id\":\"606732cb4ec9b\",\"plan_name\":\"Professional\",\"plan_description\":\"Let\'s go Professional and maximize your business profits!\",\"plan_price\":\"48\",\"validity\":\"31\",\"no_of_vcards\":\"5\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"fearures\":\"[\\\"About Us\\\",\\\"Photo Gallery\\\"]\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-11T11:43:57.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-15 06:59:33', '2023-03-15 13:59:33', 'Shavon Adams', 'business', NULL, '6438 Manchester Dr', 'Horn lake', 'Ms', '38637', 'United States', '6624024001', 'Feelinmyselfie@gmail.com', 1, NULL, '2023-03-15 12:45:11', '2023-03-15 13:59:33', NULL, NULL, NULL, NULL, 'sandbox'),
(28, '6418450143f29', 'rabin', 'rabinmia7578@gmail.com', 2, NULL, '$2y$10$tRiEthQxqUsXD2hUUT4DJ.bLthSJ6aaeqRXZBOcQXh4nOOIBr1WzS', 'Email', NULL, '606732cb4ec9b', '31', '{\"id\":3,\"plan_id\":\"606732cb4ec9b\",\"plan_name\":\"Professional\",\"plan_description\":\"Let\'s go Professional and maximize your business profits!\",\"plan_price\":\"48\",\"validity\":\"31\",\"no_of_vcards\":\"3\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"fearures\":\"[\\\"About Us\\\",\\\"Photo Gallery\\\"]\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-20T01:00:34.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-20 12:10:53', '2023-03-20 19:10:53', 'rabin', 'personal', NULL, 'fdsf', 'fds', 'fds', 'fds', 'Denmark', 'dsfsdf', 'rabinmia7578@gmail.com', 1, NULL, '2023-03-20 18:35:29', '2023-03-20 19:10:53', NULL, NULL, NULL, NULL, 'sandbox'),
(29, '64216345cad97', 'Md Mridul', 'mdmridul608@gmail.com', 2, NULL, '$2y$10$gfeP1UNcnNSio7gWElzJ1uJdLo3zSdqzHHQwsKaNpn4lX8q3paBU6', 'Email', NULL, '606732cb4ec9b', '31', '{\"id\":3,\"plan_id\":\"606732cb4ec9b\",\"plan_name\":\"Professional\",\"plan_description\":\"Let\'s go Professional and maximize your business profits!\",\"plan_price\":\"48\",\"validity\":\"31\",\"no_of_vcards\":\"3\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"fearures\":\"[\\\"About Us\\\",\\\"Photo Gallery\\\"]\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-20T01:00:34.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-27 09:39:00', '2023-03-27 16:39:00', 'md mridul', 'personal', NULL, 'mawna', 'Dhaka', 'Dhaka', '1740', 'Bangladesh', '01794798227', 'mdmridul608@gmail.com', 1, NULL, '2023-03-27 16:35:01', '2023-03-29 05:54:47', 'pk_test_51LtUkeIH2i6FoGaE6IFfIDMGyP5Tnzm5fT4HM0340Eu8NnufyOmyvqBn14BRihpYaPdUrcVniN3AkmHZPFjLhR8t00QIxImi8s', 'sk_test_51LtUkeIH2i6FoGaEZ3Y90HVXatZKimap3Wsnbw72syI5PFoV9KtEAwGf6788R5LuLnfpCXXq9DOSo7REOtqjG8Vp00FIBEPP38', 'Absh31p4OALqtKl-ktP2N_Jl1N70ofjCUm0EV3ygQk-r1OP6SpABgn4AYPvCgeHLZah7XHXhEv22pEqi', 'EFeiHIyAcO6F3C8Pex4MZbqfZOPCu55J1tNZGfnNRqMwEty8azLoPQSsFnX63NGLD6q8dA6gMJqcnX2M', 'live'),
(30, '642165812d1a7', 'Sakil', 'sakil@gmail.com', 2, NULL, '$2y$10$jePj6MjTM8rM0YL5a80EQ.IfjLGpNKyTfjRW/cKIRJ3LfYAg7dvIC', 'Email', NULL, '606732cb4ec9b', '31', '{\"id\":3,\"plan_id\":\"606732cb4ec9b\",\"plan_name\":\"Professional\",\"plan_description\":\"Let\'s go Professional and maximize your business profits!\",\"plan_price\":\"48\",\"validity\":\"31\",\"no_of_vcards\":\"3\",\"no_of_services\":\"999\",\"no_of_galleries\":\"0\",\"no_of_features\":null,\"no_of_payments\":null,\"personalized_link\":\"1\",\"hide_branding\":\"1\",\"free_setup\":\"0\",\"free_support\":\"0\",\"recommended\":\"0\",\"fearures\":\"[\\\"About Us\\\",\\\"Photo Gallery\\\"]\",\"is_private\":\"0\",\"status\":\"1\",\"created_at\":\"2023-01-28T00:33:18.000000Z\",\"updated_at\":\"2023-03-20T01:00:34.000000Z\",\"is_whatsapp_store\":\"1\"}', '2023-04-27 09:46:12', '2023-03-27 16:46:12', 'Cally Beach', 'business', '488', 'Sit repudiandae est', 'Assumenda dolor cumq', 'Facere accusamus vol', '55695', 'Nigeria', '+1 (871) 519-8559', 'kununoq@mailinator.com', 1, NULL, '2023-03-27 16:44:33', '2023-03-27 16:46:12', NULL, NULL, NULL, NULL, 'sandbox');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Color', '64217835842d6', '2023-03-27 18:04:34', '2023-03-27 18:04:34'),
(2, 'Size', '64217835842d6', '2023-03-27 18:04:41', '2023-03-27 18:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `variant_options`
--

CREATE TABLE `variant_options` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` float(13,2) DEFAULT 0.00,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variant_options`
--

INSERT INTO `variant_options` (`id`, `product_id`, `variant_id`, `name`, `stock`, `created_at`, `updated_at`, `price`, `photo`) VALUES
(1, '64217835842d6', 1, 'Black', 10, '2023-03-27 18:05:27', '2023-03-27 18:05:27', 10.30, 'images/64216345cad97-64217828c5e3a.jpg'),
(2, '64217835842d6', 1, 'Ass', 10, '2023-03-27 18:05:46', '2023-03-27 18:05:46', 10.20, 'images/64216345cad97-64217828c5e3a.jpg'),
(3, '64217835842d6', 2, 'Small', 10, '2023-03-27 18:06:17', '2023-03-27 18:06:17', 0.00, 'images/64216345cad97-64217828c5e3a.jpg'),
(4, '64217835842d6', 2, 'Medium', 10, '2023-03-27 18:06:41', '2023-03-27 18:06:41', 5.80, 'images/64216345cad97-64217828c5e3a.jpg'),
(5, '64217835842d6', 2, 'Big', 10, '2023-03-27 18:07:00', '2023-03-27 18:07:00', 7.20, 'images/64216345cad97-64217828c5e3a.jpg');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order_transactions`
--
ALTER TABLE `product_order_transactions`
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
-- Indexes for table `shipping_cost`
--
ALTER TABLE `shipping_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant_options`
--
ALTER TABLE `variant_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_cards`
--
ALTER TABLE `business_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `business_fields`
--
ALTER TABLE `business_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_gallery`
--
ALTER TABLE `card_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_order_transactions`
--
ALTER TABLE `product_order_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `shipping_cost`
--
ALTER TABLE `shipping_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variant_options`
--
ALTER TABLE `variant_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
