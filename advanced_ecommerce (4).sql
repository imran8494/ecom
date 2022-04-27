-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 07:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Imran Hossain', 'admin', '01687663654', 'mdimranhossain985@gmail.com', NULL, '$2y$10$kN6PgqOWbSzcM6Q44auyD.PrWyehcvTWLd7gk1hwQzy25RIIlOIyq', '43675.jpg', 1, NULL, NULL, '2021-08-20 09:35:13'),
(2, 'Imran', 'subadmin', '01687663654', 'imrancsecity@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '22748.jpg', 1, NULL, NULL, '2020-11-18 02:13:34'),
(3, 'Md. Imran', 'subadmin', '01771045019', 'admin@admin.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `company_name`, `details`, `image`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MIH Company', 'All types of product are available here', 'girl1.jpg', 'girl1', 'Girl 1', 'Banner 1', 1, NULL, NULL),
(2, 'MIH Company', 'All types of product are available here', 'girl2.jpg', 'girl2', 'Girl 2', 'Banner 2', 1, NULL, NULL),
(3, 'MIH Company', 'All types of product are available here', 'girl3.jpg', 'girl3', 'Girl 3', 'Banner 3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arrow', 1, '2021-07-19 23:35:02', '2021-07-21 07:56:20'),
(3, 'Gap', 1, '2021-07-20 01:36:26', '2021-07-21 07:56:36'),
(4, 'Lee', 1, '2021-07-21 07:56:50', '2021-07-21 07:56:50'),
(5, 'Monte Carlo', 1, '2021-07-21 07:57:07', '2021-07-21 07:57:07'),
(6, 'Peter England', 1, '2021-07-21 07:57:21', '2021-07-21 07:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size_attr_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_discount` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'T-shirts', NULL, 0.00, 'All types of T-shirts are available here.', 't-shirts', '', '', '', 1, '2020-11-25 07:15:11', '2021-07-21 07:19:41'),
(2, 1, 1, 'Casual Tshirts', NULL, 0.00, '', 'casual-t-shirts', '', '', '', 1, '2020-11-25 07:15:29', '2021-07-24 06:27:00'),
(3, 1, 1, 'Formal Tshirts', NULL, 0.00, '', 'formal-t-shirts', '', '', '', 1, '2020-11-25 07:15:45', '2021-07-19 21:33:42'),
(8, 0, 3, 'Shoes', '483263.jpg', 0.00, 'asdf', 'adsf', 'asd', 'adsf', 'adsf', 1, '2021-07-20 09:52:04', '2021-07-24 06:28:06'),
(9, 0, 3, 'Doll', '900161.png', 0.00, 'a', 'asdf', '', '', '', 1, '2021-07-20 09:54:59', '2021-07-24 06:28:17'),
(10, 9, 3, 'Electronics', '143553.png', 0.00, 'asdf', 'adsf', '', '', '', 1, '2021-07-20 09:57:38', '2021-07-24 06:28:27'),
(11, 0, 2, 'Wedding Dresses', '746495.jpg', 15.00, 'Wedding dresses are available.', 'wedding-dresses', '', '', '', 1, '2021-08-10 13:30:24', '2021-08-10 13:30:24'),
(12, 0, 1, 'Shirts', '371350.jpg', 0.00, '', 'shirts', '', '', '', 1, '2021-08-10 13:46:25', '2021-08-10 13:46:25'),
(13, 0, 2, 'Salwar Kameej', NULL, 0.00, '', 'kameej', '', '', '', 1, '2021-08-10 14:07:05', '2021-08-10 14:07:05'),
(14, 0, 3, 'Frock', '454514.jpg', 0.00, '', 'frock', '', '', '', 1, '2021-08-10 14:18:24', '2021-08-10 14:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', 'test10', '1,2', 'mdimranhossain985@gmail.com,imrancsecity@gmail.com', 'Single', 'Percentage', 10.00, '2020-12-31', 1, NULL, '2021-08-05 03:47:30'),
(2, 'Manual', 'dfsdf', '1,3', 'mdimranhossain985@gmail.com,imrancsecity@gmail.com', 'Single Times', 'Fixed', 20.00, '2021-08-03', 1, '2021-08-04 00:23:20', '2021-08-08 14:08:53'),
(4, 'Automatic', 'YTBDVqyV', '2,10', '', 'Multiple Times', 'Percentage', 30.00, '2021-08-18', 1, '2021-08-04 09:38:14', '2021-08-08 14:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `password`, `email_verified_at`, `current_team_id`, `profile_photo_path`, `city`, `state`, `country`, `pincode`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Imran Hossain', 'imrancsecity@gmail.com', NULL, '$2y$10$qtTyrrVgmI3rwJdFIwKkCOgCVI6X6/g3/k88WQFpYv7NgtpSU6Fb6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01687663654', 1, NULL, '2021-08-05 07:52:14'),
(2, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', NULL, '$2y$10$mdYEKwfK/ybn70NJvKRmWOk7ytmjwkZsZHGhviGyjoTb7uKwENs/K', NULL, NULL, NULL, NULL, NULL, 'Bangladesh', NULL, '01687663654', 1, NULL, '2021-08-11 09:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 1, NULL, NULL),
(2, '2', 'Imran Hossain', '19/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'India', '121712', '01687663654', 1, NULL, '2021-08-11 10:15:21'),
(6, '2', 'Md Imran Hossain', '17/A, Shantibagh', 'Dhaka', 'Dhanmondi', 'Macao', '121710', '01687663654', NULL, '2021-08-05 15:18:53', '2021-08-12 06:00:28'),
(7, '1', 'Md Imran Hossain', '17/A, Shantibagh', 'Dhaka', 'Dhanmondi', 'Zimbabwe', '121785', '01687663654', NULL, '2021-08-06 07:36:37', '2021-08-11 21:02:00'),
(8, '1', 'Md Imran Hossain', '17/A, Shantibagh', 'Dhaka', 'Savar', 'BANGLADESH', '121785', '01687663654', NULL, '2021-08-06 10:25:31', '2021-08-06 10:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_11_15_100619_create_sessions_table', 1),
(7, '2020_11_15_133901_create_admins_table', 2),
(8, '2020_11_18_091905_create_sections_table', 3),
(9, '2020_11_21_073355_create_categories_table', 4),
(10, '2020_11_25_123154_create_products_table', 5),
(13, '2021_07_18_193335_create_product_attributes_table', 6),
(14, '2021_07_19_111306_create_product_images_table', 7),
(15, '2021_07_20_042425_create_brands_table', 8),
(17, '2021_07_20_063019_add_columns_to_products_table', 9),
(19, '2021_07_21_051753_create_banners_table', 10),
(21, '2021_07_23_144256_create_carts_table', 11),
(23, '2021_07_28_162633_add_columns_to_users_table', 12),
(24, '2021_07_29_150418_create_customers_table', 13),
(25, '2021_08_03_131234_create_coupons_table', 14),
(26, '2021_08_05_172226_create_delivery_addresses_table', 15),
(27, '2021_08_06_145328_create_orders_table', 16),
(28, '2021_08_06_150101_create_orders_products_table', 17),
(29, '2021_08_07_174126_create_order_statuses_table', 18),
(30, '2021_08_08_080916_create_order_status_logs_table', 19),
(31, '2021_08_08_084257_update_order_status_table', 20),
(33, '2021_08_10_153039_create_shipping_charges_table', 21),
(36, '2021_08_15_094314_create_ssl_payments_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` double(8,2) DEFAULT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `payment_gateway`, `grand_total`, `courier_name`, `tracking_number`, `created_at`, `updated_at`) VALUES
(1, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 200.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 2360.00, NULL, NULL, '2021-08-20 08:08:03', '2021-08-20 08:08:03'),
(2, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 100.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 1240.00, NULL, NULL, '2021-08-20 08:13:46', '2021-08-20 08:13:46'),
(3, 2, 'Md Imran Hossain', '17/A, Shantibagh', 'Dhaka', 'Dhanmondi', 'Macao', '121710', '01687663654', 'mdimranhossain985@gmail.com', 20.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 2180.00, NULL, NULL, '2021-08-20 08:15:26', '2021-08-20 08:15:26'),
(4, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 200.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 2360.00, NULL, NULL, '2021-08-20 08:17:19', '2021-08-20 08:17:19'),
(5, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 200.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 2360.00, NULL, NULL, '2021-08-20 08:35:36', '2021-08-20 08:35:36'),
(6, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 200.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 2360.00, NULL, NULL, '2021-08-20 08:36:00', '2021-08-20 08:36:00'),
(7, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 200.00, NULL, NULL, 'New', 'Prepaid', 'Prepaid', 2360.00, NULL, NULL, '2021-08-20 08:36:59', '2021-08-20 08:36:59'),
(8, 1, 'Md Imran Hossain', '17/A, Shantibagh', 'Dhaka', 'Dhanmondi', 'Zimbabwe', '121785', '01687663654', 'imrancsecity@gmail.com', NULL, NULL, NULL, 'Paid', 'Prepaid', 'Prepaid', 2160.00, NULL, NULL, '2021-08-20 08:48:43', '2021-08-20 08:48:43'),
(9, 1, 'Md Imran Hossain', '17/A, Shantibagh', 'Dhaka', 'Dhanmondi', 'Zimbabwe', '121785', '01687663654', 'imrancsecity@gmail.com', NULL, NULL, NULL, 'Paid', 'Prepaid', 'Prepaid', 3240.00, NULL, NULL, '2021-08-20 08:50:54', '2021-08-20 08:50:54'),
(10, 2, 'Md. Imran Hossain', '17/A, Shantibag', 'Dhaka', 'Shahjahanpur', 'Bangladesh', '1217', '01687663654', 'mdimranhossain985@gmail.com', 100.00, NULL, NULL, 'Paid', 'Prepaid', 'Prepaid', 3340.00, NULL, NULL, '2021-08-20 10:11:28', '2021-08-20 10:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(8,2) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:08:03', '2021-08-20 08:08:03'),
(2, 2, 2, 7, 'YCT0d01', 'Yellow casual Tshirts', 'Yellowd', 'Small', 570.00, 2, '2021-08-20 08:13:46', '2021-08-20 08:13:46'),
(3, 3, 2, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:15:26', '2021-08-20 08:15:26'),
(4, 4, 2, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:17:19', '2021-08-20 08:17:19'),
(5, 5, 2, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:35:36', '2021-08-20 08:35:36'),
(6, 6, 2, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:36:00', '2021-08-20 08:36:00'),
(7, 7, 2, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:36:59', '2021-08-20 08:36:59'),
(8, 8, 1, 1, 'RCT001', 'Red Casual T-shirts', 'Red', 'Large', 1080.00, 2, '2021-08-20 08:48:43', '2021-08-20 08:48:43'),
(9, 9, 1, 2, 'BFT001', 'Black Formal T-shirts', 'Black', 'Medium', 1620.00, 2, '2021-08-20 08:50:54', '2021-08-20 08:50:54'),
(10, 10, 2, 2, 'BFT001', 'Black Formal T-shirts', 'Black', 'Medium', 1620.00, 2, '2021-08-20 10:11:28', '2021-08-20 10:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Pending', 1, NULL, NULL),
(3, 'Hold', 1, NULL, NULL),
(4, 'Cancelled', 1, NULL, NULL),
(5, 'In Progress', 1, NULL, NULL),
(6, 'Paid', 1, NULL, NULL),
(7, 'Shipped', 1, NULL, NULL),
(8, 'Delivered', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_logs`
--

CREATE TABLE `order_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_logs`
--

INSERT INTO `order_status_logs` (`id`, `order_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 49, 'Paid', '2021-08-08 02:15:54', '2021-08-08 02:15:54'),
(2, 49, 'Shipped', '2021-08-08 02:16:38', '2021-08-08 02:16:38'),
(3, 49, 'Shipped', '2021-08-08 03:27:10', '2021-08-08 03:27:10'),
(4, 49, 'In Progress', '2021-08-08 03:29:05', '2021-08-08 03:29:05'),
(5, 46, 'Hold', '2021-08-08 03:53:16', '2021-08-08 03:53:16'),
(6, 49, 'Delivered', '2021-08-08 04:13:18', '2021-08-08 04:13:18'),
(7, 27, 'Shipped', '2021-08-08 11:38:11', '2021-08-08 11:38:11'),
(8, 7, 'Shipped', '2021-08-08 11:47:56', '2021-08-08 11:47:56'),
(9, 8, 'Shipped', '2021-08-08 12:01:07', '2021-08-08 12:01:07'),
(10, 52, 'Shipped', '2021-08-08 13:13:57', '2021-08-08 13:13:57'),
(11, 53, 'Shipped', '2021-08-08 13:17:22', '2021-08-08 13:17:22'),
(12, 55, 'Shipped', '2021-08-08 13:26:34', '2021-08-08 13:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_discount` double(8,2) NOT NULL,
  `product_weight` double(8,2) NOT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occasion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `section_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `product_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'Red Casual T-shirts', 'RCT001', 'Red', 1000.00, 10.00, 700.00, NULL, 'Red Casual T-shirts 1 -1141248846.jpg', 'Its a good product', 'Machine wash', 'Cotton', 'Plain', 'Half sleeve', 'Regular', 'Casual', 'Good title', 'Meta description', 'meta keywords', 'Yes', 1, '2020-11-29 06:27:05', '2021-08-12 05:31:54'),
(2, 3, 1, 3, 'Black Formal T-shirts', 'BFT001', 'Black', 2000.00, 10.00, 100.00, NULL, 'Black Formal T-shirts 1-1349399532.jpg', 'Good product', 'Machine wash', 'Wool', 'Printed', 'Half sleeve', 'Regular', 'Casual', 'Good product', 'From the details', 'tshirts', 'No', 1, '2020-11-29 07:15:12', '2021-08-10 13:02:42'),
(3, 2, 1, 4, 'Black Formal T-shirts', 'BFT001', 'Black', 2000.00, 0.00, 0.00, NULL, 'Black Formal T-shirts 2-1155544572.jpg', '', '', 'Polyster', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2020-11-29 07:24:03', '2021-08-10 13:03:32'),
(4, 2, 1, 1, 'Black Formal T-shirts', 'BFT001', 'Black', 2000.00, 0.00, 0.00, NULL, 'Black Formal T-shirts 3-1847927021.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Yes', 1, '2020-11-29 07:45:11', '2021-08-10 13:04:37'),
(5, 2, 1, 3, 'Black Formal T-shirts', 'BFT001', 'Black', 2000.00, 0.00, 0.00, NULL, 'Black Formal T-shirts 4-362751906.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Yes', 1, '2020-11-29 07:57:03', '2021-08-10 13:05:11'),
(6, 2, 1, 5, 'Red Casual T-shirts', 'RCT001', 'Yellow', 2000.00, 0.00, 0.00, NULL, 'Red Casual T-shirts 2-353245910.jpg', '', '', 'Cotton', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2020-11-29 08:00:30', '2021-08-10 13:06:07'),
(7, 3, 1, 5, 'Yellow casual Tshirts', 'YCT0d01', 'Yellowd', 2000.00, 0.00, 100.00, 'screen-capture (3)-1571227595.webm', 'Yellow casual Tshirts 1-936418787.jpg', '', '', 'Polyster', 'Plain', 'Sleeveless', 'Slim', 'Formal', '', '', '', 'No', 1, '2020-11-29 08:25:19', '2021-08-10 13:06:52'),
(8, 2, 1, 5, 'Red Casual T-shirts', 'YCT0d01', 'Yellow', 2000.00, 0.00, 0.00, NULL, 'Red Casual T-shirts 3-1472385585.jpg', '', '', 'Polyster', 'Printed', 'Sleeveless', 'Slim', 'Formal', '', '', '', 'No', 1, '2020-11-29 08:34:26', '2021-08-10 13:07:35'),
(9, 2, 1, 6, 'Yellow casual Tshirts', 'YCT001', 'Red', 2000.00, 0.00, 100.00, NULL, 'Yellow casual Tshirts 2-191550103.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Yes', 1, '2020-11-29 08:36:25', '2021-08-10 13:08:12'),
(10, 2, 1, 6, 'Yellow casual Tshirts', 'YCT0d01', 'Red', 2000.00, 0.00, 0.00, 'good-604404137.mp4', 'Yellow casual Tshirts 3-1382631659.jpg', '', '', 'Cotton', 'Checked', 'Sleeveless', 'Slim', 'Casual', '', '', '', 'No', 1, '2020-11-29 08:39:25', '2021-08-10 13:08:44'),
(12, 2, 1, 0, 'Black Formal T-shirts', '365432', 'Black', 600.00, 20.00, 35.00, NULL, NULL, 'ertretr', 'asdf', 'Wool', 'Printed', 'Short Sleeve', 'Slim', 'Formal', 'retreter', 'sdfdsf', 'cvbvcbcv', 'No', 1, '2021-07-18 08:22:23', '2021-07-18 08:22:23'),
(13, 2, 1, 4, 'T shirts', 'PRRRRRR21540', 'Yellowd', 30.00, 21.00, 3.00, NULL, 'T-shirts 1-506456052.jpg', 'dssad', 'asdf', 'Polyster', 'Printed', 'Sleeveless', 'Regular', 'Casual', 'dsfds', 'adsf', 'werewf', 'No', 1, '2021-07-18 09:27:05', '2021-08-10 13:11:10'),
(15, 2, 1, 4, 'Black Formal T-shirts', 'BFT001', 'Black', 2000.00, 15.00, 0.00, NULL, NULL, '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-07-18 10:28:03', '2021-07-24 06:15:33'),
(17, 2, 1, 0, 'Black Formal T-shirts', 'BFT001', 'Black', 2000.00, 0.00, 0.00, NULL, NULL, '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-07-18 10:29:28', '2021-07-18 10:29:28'),
(18, 2, 1, 1, 'Red Formal T-shirts', 'YCT0d01', 'Red', 2000.00, 0.00, 0.00, NULL, 'red-copy-1678106475.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Yes', 1, '2021-07-18 10:29:40', '2021-08-10 13:12:25'),
(22, 8, 3, 1, 'Black Shoes', 'YCT0151', 'Black', 1000.00, 0.00, 20.00, NULL, '1-1273565905.png', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-07-20 09:53:48', '2021-08-04 07:55:16'),
(23, 9, 3, 1, 'Sports Doll', 'Doll001', 'Yellowd', 3000.00, 5.00, 45.00, NULL, '1_12_854_all_image_1623915097-1413926836.jpg', '', '', 'Polyster', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-07-20 09:55:57', '2021-07-22 05:14:10'),
(25, 11, 2, 6, 'Princess Peach Wedding Dress', 'PPWD001', 'PINK', 50000.00, 5.00, 3.00, NULL, 'Princess Peach Wedding Dress-771892166.jpg', 'Wedding dress', 'Laundry Wash', 'Cotton', 'Plain', 'Half sleeve', 'Slim', 'Casual', '', '', '', 'Yes', 1, '2021-08-10 13:34:01', '2021-08-10 13:34:01'),
(26, 11, 2, 4, 'Girls Designer Gown', 'GDG001', 'Red', 80000.00, 0.00, 3.00, NULL, 'girls designer gown-558080752.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:37:42', '2021-08-10 13:37:42'),
(27, 11, 2, 6, 'Bridal Dress', 'BD001', 'Red', 20000.00, 0.00, 2.00, NULL, 'birdal dress-90119852.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:40:47', '2021-08-10 13:40:47'),
(28, 11, 2, 6, 'Bridal Dress', 'BD002', 'Red', 12000.00, 0.00, 1.00, NULL, 'bridal dress 2-71269085.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:42:02', '2021-08-10 13:42:02'),
(29, 11, 2, 6, 'Bridal Dress', 'BD003', 'Yellow', 10000.00, 0.00, 2.00, NULL, 'bridal dress 3-811910008.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:43:40', '2021-08-10 13:43:40'),
(30, 12, 1, 1, 'Black Formal Shirts', 'BFS001', 'Black', 1500.00, 0.00, 1.00, NULL, 'black formal shits 1-453479332.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:47:56', '2021-08-10 13:47:56'),
(31, 12, 1, 3, 'Black Formal Shirts', 'BFS002', 'Black', 1000.00, 0.00, 1.00, NULL, 'black formal shirts-1876682928.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:51:22', '2021-08-10 13:51:22'),
(32, 12, 1, 6, 'Light Blue Casual Shirts', 'LBCS001', 'Blue', 1200.00, 0.00, 1.00, NULL, 'Light blue casula shirts 1-365127269.png', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:54:36', '2021-08-10 13:54:36'),
(33, 12, 1, 4, 'Blue Casual Shirts', 'BCS002', 'Blue', 1300.00, 0.00, 1.00, NULL, 'blue casul shirts 1-1402968521.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:56:12', '2021-08-10 13:56:12'),
(34, 12, 1, 3, 'Mens Plain Shirts', 'MPS001', 'PINK', 1000.00, 0.00, 1.00, NULL, 'mens plain shirts 1-1847547575.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 13:59:02', '2021-08-10 13:59:02'),
(35, 12, 1, 3, 'Formal Shirts', 'FS001', 'Akashi', 800.00, 0.00, 1.00, NULL, 'Formal Shirts 1-217548247.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 14:02:03', '2021-08-10 14:02:03'),
(36, 13, 2, 3, 'Pink Color Salwar Kameej', 'SK001', 'PINK', 5000.00, 0.00, 1.00, NULL, 'Salwar Kameej 1-941670054.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 14:08:23', '2021-08-10 14:08:23'),
(37, 13, 2, 4, 'Kameej', 'K001', 'Red', 2500.00, 0.00, 2.00, NULL, 'kameej 1-219184611.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 14:09:48', '2021-08-10 14:09:48'),
(38, 13, 2, 4, 'Stylish Kameej', 'K002', 'Red', 6000.00, 0.00, 2.00, NULL, 'kameej 2-1684627239.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 14:12:03', '2021-08-10 14:12:03'),
(39, 14, 3, 4, 'Frock', 'F001', 'White', 2000.00, 0.00, 1.00, NULL, 'frock 1-1193995969.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 14:19:33', '2021-08-10 14:19:33'),
(40, 14, 3, 5, 'Frock', 'F002', 'Red', 2500.00, 0.00, 1.00, NULL, 'frock 2-124508433.jpg', '', '', 'Select', 'Select', 'Select', 'Select', 'Select', '', '', '', 'No', 1, '2021-08-10 14:20:33', '2021-08-10 14:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Small', '1000', '20', 'BTS001-S', 0, '2021-07-18 23:38:30', '2021-07-23 08:40:41'),
(2, 1, 'Medium', '1100', '15', 'BTS001-M', 1, '2021-07-18 23:38:30', '2021-07-19 04:46:30'),
(3, 1, 'Large', '1200', '10', 'BTS001-L', 1, '2021-07-18 23:38:30', '2021-07-19 04:46:23'),
(6, 2, 'Medium', '1800', '15', 'BFS001-M', 1, '2021-07-19 04:40:08', '2021-07-19 04:40:08'),
(7, 3, 'Small', '500', '20', 'BH002', 1, '2021-07-23 23:28:22', '2021-07-23 23:28:22'),
(8, 4, 'Medium', '1000', '10', 'BFT005', 1, '2021-07-23 23:28:55', '2021-07-23 23:29:32'),
(9, 15, 'Small', '500', '45', 'asdfas', 1, '2021-07-24 06:16:45', '2021-07-24 06:16:45'),
(10, 7, 'Small', '570', '20', 'asd', 1, '2021-07-24 06:30:54', '2021-07-24 06:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`, `status`, `created_at`, `updated_at`) VALUES
(5, 7, '904981626702354.png', 1, '2021-07-19 07:45:55', '2021-07-19 07:45:55'),
(6, 7, '494141626702355.png', 1, '2021-07-19 07:45:55', '2021-07-19 07:45:55'),
(7, 2, '874881626754378.png', 1, '2021-07-19 22:12:58', '2021-07-19 22:19:05'),
(13, 1, '520561626975886.jpg', 1, '2021-07-22 11:44:46', '2021-07-22 11:44:46'),
(14, 1, '316461626975886.jpg', 1, '2021-07-22 11:44:46', '2021-07-22 11:44:46'),
(15, 1, '84961626975886.jpg', 1, '2021-07-22 11:44:47', '2021-07-22 11:44:47'),
(16, 1, '784361626977134.jpg', 1, '2021-07-22 12:05:35', '2021-07-22 12:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, NULL, '2020-11-26 03:30:46'),
(2, 'Women', 1, NULL, '2021-07-18 11:20:47'),
(3, 'Kids', 1, NULL, '2021-07-20 09:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C28UxKXzLElF6OEMMbekEYz3lWnoz0aJCkSgRCRQ', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSUZDTHg5SnJaMkc3VjdERFZMaVlxWmpvR1lRMHd2TTM0TDc2U3M3RyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vbG9jYWxob3N0L2Vjb20vcHVibGljL2FkbWluL3NlY3Rpb25zIjt9czoxMDoic2Vzc2lvbl9pZCI7czo0MDoiNThrSzhrdjNQTWIzWWF5RDN5Wnl6eEViN2l5MkFzNEFUZGtWN3JySiI7czo0OiJwYWdlIjtzOjg6InNlY3Rpb25zIjtzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1629477728),
('VZGG8W5MlFhwUcVeuNbFqO430rrqkvlXrFKnj4WD', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib0kwd1k4Tk95SnExa2NHeXFxclNVQVVVUmtzUWNJWUIyNXoxVUFUTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QvZWNvbS9wdWJsaWMvZXhhbXBsZTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJzZXNzaW9uX2lkIjtzOjQwOiJoZ016cXhvRFBzVm1BbWpLZFZubmQxZFVCY0FVYVdNSUNYb2tDdUFGIjtzOjU1OiJsb2dpbl9jdXN0b21lcl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo4OiJvcmRlcl9pZCI7aTo3O30=', 1629470572);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `0_500g` double(8,2) DEFAULT NULL,
  `501_1000g` double(8,2) DEFAULT NULL,
  `1001_2000g` double(8,2) DEFAULT NULL,
  `2001_5000g` double(8,2) DEFAULT NULL,
  `above_5000g` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `0_500g`, `501_1000g`, `1001_2000g`, `2001_5000g`, `above_5000g`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan\r\n', 300.00, 600.00, 900.00, 1200.00, 1500.00, 1, '0000-00-00 00:00:00', '2021-08-12 05:59:22'),
(2, 'Albania', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-11 18:00:00', '2021-08-11 09:48:28'),
(3, 'Algeria', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-12 18:00:00', '2021-08-12 18:00:00'),
(4, 'American Samoa', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-13 18:00:00', '2021-08-12 03:08:20'),
(5, 'Andorra', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-14 18:00:00', '2021-08-12 03:08:23'),
(6, 'Angola', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-15 18:00:00', '2021-08-15 18:00:00'),
(7, 'Anguilla', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-16 18:00:00', '2021-08-10 11:14:09'),
(8, 'Antarctica', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-17 18:00:00', '2021-08-17 18:00:00'),
(9, 'Antigua and Barbuda', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-18 18:00:00', '2021-08-10 11:14:11'),
(10, 'Argentina', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-19 18:00:00', '2021-08-10 12:13:08'),
(11, 'Armenia', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-20 18:00:00', '2021-08-20 18:00:00'),
(12, 'Aruba', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-21 18:00:00', '2021-08-21 18:00:00'),
(13, 'Australia', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-22 18:00:00', '2021-08-22 18:00:00'),
(14, 'Austria', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-23 18:00:00', '2021-08-23 18:00:00'),
(15, 'Azerbaijan', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-24 18:00:00', '2021-08-24 18:00:00'),
(16, 'Bahamas', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-25 18:00:00', '2021-08-25 18:00:00'),
(17, 'Bahrain', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-26 18:00:00', '2021-08-26 18:00:00'),
(18, 'Bangladesh', 100.00, 200.00, 300.00, 400.00, 500.00, 1, '2021-08-27 18:00:00', '2021-08-12 04:26:29'),
(19, 'Barbados', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-28 18:00:00', '2021-08-28 18:00:00'),
(20, 'Belarus', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-29 18:00:00', '2021-08-29 18:00:00'),
(21, 'Belgium', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 18:00:00', '2021-08-30 18:00:00'),
(22, 'Belize', NULL, NULL, NULL, NULL, NULL, 1, '2021-08-31 18:00:00', '2021-08-31 18:00:00'),
(23, 'Benin', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-01 18:00:00', '2021-09-01 18:00:00'),
(24, 'Bermuda', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-02 18:00:00', '2021-09-02 18:00:00'),
(25, 'Bhutan', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-03 18:00:00', '2021-09-03 18:00:00'),
(26, 'Bolivia', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-04 18:00:00', '2021-09-04 18:00:00'),
(27, 'Bosnia and Herzegovina', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-05 18:00:00', '2021-09-05 18:00:00'),
(28, 'Botswana', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-06 18:00:00', '2021-09-06 18:00:00'),
(29, 'Bouvet Island', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-07 18:00:00', '2021-09-07 18:00:00'),
(30, 'Brazil', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-08 18:00:00', '2021-09-08 18:00:00'),
(31, 'British Indian Ocean Territory', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-09 18:00:00', '2021-09-09 18:00:00'),
(32, 'Brunei Darussalam', NULL, NULL, NULL, NULL, NULL, 0, '2021-09-10 18:00:00', '2021-08-12 04:38:10'),
(33, 'Bulgaria', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-11 18:00:00', '2021-09-11 18:00:00'),
(34, 'Burkina Faso', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-12 18:00:00', '2021-09-12 18:00:00'),
(35, 'Burundi', NULL, NULL, NULL, NULL, NULL, 0, '2021-09-13 18:00:00', '2021-08-10 11:13:58'),
(36, 'Cambodia', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-14 18:00:00', '2021-09-14 18:00:00'),
(37, 'Cameroon', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-15 18:00:00', '2021-09-15 18:00:00'),
(38, 'Canada', NULL, NULL, NULL, NULL, NULL, 0, '2021-09-16 18:00:00', '2021-08-10 11:13:59'),
(39, 'Cape Verde', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-17 18:00:00', '2021-09-17 18:00:00'),
(40, 'Cayman Islands', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-18 18:00:00', '2021-09-18 18:00:00'),
(41, 'Central African Republic', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-19 18:00:00', '2021-09-19 18:00:00'),
(42, 'Chad', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-20 18:00:00', '2021-09-20 18:00:00'),
(43, 'Chile', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-21 18:00:00', '2021-09-21 18:00:00'),
(44, 'China', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-22 18:00:00', '2021-09-22 18:00:00'),
(45, 'Christmas Island', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-23 18:00:00', '2021-09-23 18:00:00'),
(46, 'Cocos (Keeling) Islands', NULL, NULL, NULL, NULL, NULL, 0, '2021-09-24 18:00:00', '2021-08-12 04:39:04'),
(47, 'Colombia', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-25 18:00:00', '2021-09-25 18:00:00'),
(48, 'Comoros', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-26 18:00:00', '2021-09-26 18:00:00'),
(49, 'Congo', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-27 18:00:00', '2021-09-27 18:00:00'),
(50, 'Congo, the Democratic Republic of the', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-28 18:00:00', '2021-09-28 18:00:00'),
(51, 'Cook Islands', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-29 18:00:00', '2021-09-29 18:00:00'),
(52, 'Costa Rica', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-30 18:00:00', '2021-09-30 18:00:00'),
(53, 'Cote D\'Ivoire', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-01 18:00:00', '2021-10-01 18:00:00'),
(54, 'Croatia', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-02 18:00:00', '2021-10-02 18:00:00'),
(55, 'Cuba', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-03 18:00:00', '2021-08-12 04:38:20'),
(56, 'Cyprus', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-04 18:00:00', '2021-10-04 18:00:00'),
(57, 'Czech Republic', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-05 18:00:00', '2021-10-05 18:00:00'),
(58, 'Denmark', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-06 18:00:00', '2021-10-06 18:00:00'),
(59, 'Djibouti', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-07 18:00:00', '2021-10-07 18:00:00'),
(60, 'Dominica', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-08 18:00:00', '2021-10-08 18:00:00'),
(61, 'Dominican Republic', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-09 18:00:00', '2021-10-09 18:00:00'),
(62, 'Ecuador', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-10 18:00:00', '2021-10-10 18:00:00'),
(63, 'Egypt', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-11 18:00:00', '2021-10-11 18:00:00'),
(64, 'El Salvador', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-12 18:00:00', '2021-08-12 04:38:38'),
(65, 'Equatorial Guinea', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-13 18:00:00', '2021-10-13 18:00:00'),
(66, 'Eritrea', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-14 18:00:00', '2021-10-14 18:00:00'),
(67, 'Estonia', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-15 18:00:00', '2021-10-15 18:00:00'),
(68, 'Ethiopia', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-16 18:00:00', '2021-10-16 18:00:00'),
(69, 'Falkland Islands (Malvinas)', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-17 18:00:00', '2021-10-17 18:00:00'),
(70, 'Faroe Islands', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-18 18:00:00', '2021-10-18 18:00:00'),
(71, 'Fiji', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-19 18:00:00', '2021-10-19 18:00:00'),
(72, 'Finland', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-20 18:00:00', '2021-10-20 18:00:00'),
(73, 'France', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-21 18:00:00', '2021-10-21 18:00:00'),
(74, 'French Guiana', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-22 18:00:00', '2021-10-22 18:00:00'),
(75, 'French Polynesia', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-23 18:00:00', '2021-10-23 18:00:00'),
(76, 'French Southern Territories', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-24 18:00:00', '2021-10-24 18:00:00'),
(77, 'Gabon', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-25 18:00:00', '2021-10-25 18:00:00'),
(78, 'Gambia', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-26 18:00:00', '2021-10-26 18:00:00'),
(79, 'Georgia', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-27 18:00:00', '2021-10-27 18:00:00'),
(80, 'Germany', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-28 18:00:00', '2021-10-28 18:00:00'),
(81, 'Ghana', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-29 18:00:00', '2021-10-29 18:00:00'),
(82, 'Gibraltar', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-30 18:00:00', '2021-10-30 18:00:00'),
(83, 'Greece', NULL, NULL, NULL, NULL, NULL, 1, '2021-10-31 18:00:00', '2021-10-31 18:00:00'),
(84, 'Greenland', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-01 18:00:00', '2021-11-01 18:00:00'),
(85, 'Grenada', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-02 18:00:00', '2021-11-02 18:00:00'),
(86, 'Guadeloupe', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-03 18:00:00', '2021-11-03 18:00:00'),
(87, 'Guam', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-04 18:00:00', '2021-11-04 18:00:00'),
(88, 'Guatemala', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-05 18:00:00', '2021-11-05 18:00:00'),
(89, 'Guinea', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-06 18:00:00', '2021-11-06 18:00:00'),
(90, 'Guinea-Bissau', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-07 18:00:00', '2021-11-07 18:00:00'),
(91, 'Guyana', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-08 18:00:00', '2021-11-08 18:00:00'),
(92, 'Haiti', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-09 18:00:00', '2021-11-09 18:00:00'),
(93, 'Heard Island and Mcdonald Islands', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-10 18:00:00', '2021-11-10 18:00:00'),
(94, 'Holy See (Vatican City State)', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-11 18:00:00', '2021-11-11 18:00:00'),
(95, 'Honduras', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-12 18:00:00', '2021-11-12 18:00:00'),
(96, 'Hong Kong', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-13 18:00:00', '2021-11-13 18:00:00'),
(97, 'Hungary', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-14 18:00:00', '2021-11-14 18:00:00'),
(98, 'Iceland', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-15 18:00:00', '2021-11-15 18:00:00'),
(99, 'India', 200.00, 400.00, 600.00, 800.00, 1000.00, 1, '2021-11-16 18:00:00', '2021-08-12 05:58:44'),
(100, 'Indonesia', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-17 18:00:00', '2021-11-17 18:00:00'),
(101, 'Iran, Islamic Republic of', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-18 18:00:00', '2021-11-18 18:00:00'),
(102, 'Iraq', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-19 18:00:00', '2021-11-19 18:00:00'),
(103, 'Ireland', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-20 18:00:00', '2021-11-20 18:00:00'),
(104, 'Israel', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-21 18:00:00', '2021-11-21 18:00:00'),
(105, 'Italy', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-22 18:00:00', '2021-11-22 18:00:00'),
(106, 'Jamaica', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-23 18:00:00', '2021-11-23 18:00:00'),
(107, 'Japan', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-24 18:00:00', '2021-11-24 18:00:00'),
(108, 'Jordan', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-25 18:00:00', '2021-11-25 18:00:00'),
(109, 'Kazakhstan', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-26 18:00:00', '2021-11-26 18:00:00'),
(110, 'Kenya', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-27 18:00:00', '2021-11-27 18:00:00'),
(111, 'Kiribati', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-28 18:00:00', '2021-11-28 18:00:00'),
(112, 'Korea, Democratic People\'s Republic of', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-29 18:00:00', '2021-11-29 18:00:00'),
(113, 'Korea, Republic of', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-30 18:00:00', '2021-11-30 18:00:00'),
(114, 'Kuwait', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-01 18:00:00', '2021-12-01 18:00:00'),
(115, 'Kyrgyzstan', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-02 18:00:00', '2021-12-02 18:00:00'),
(116, 'Lao People\'s Democratic Republic', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-03 18:00:00', '2021-12-03 18:00:00'),
(117, 'Latvia', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-04 18:00:00', '2021-12-04 18:00:00'),
(118, 'Lebanon', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-05 18:00:00', '2021-12-05 18:00:00'),
(119, 'Lesotho', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-06 18:00:00', '2021-12-06 18:00:00'),
(120, 'Liberia', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-07 18:00:00', '2021-12-07 18:00:00'),
(121, 'Libyan Arab Jamahiriya', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-08 18:00:00', '2021-12-08 18:00:00'),
(122, 'Liechtenstein', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-09 18:00:00', '2021-12-09 18:00:00'),
(123, 'Lithuania', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-10 18:00:00', '2021-12-10 18:00:00'),
(124, 'Luxembourg', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-11 18:00:00', '2021-12-11 18:00:00'),
(125, 'Macao', 10.00, 20.00, 30.00, 40.00, 50.00, 1, '2021-12-12 18:00:00', '2021-08-12 06:00:58'),
(126, 'Macedonia, the Former Yugoslav Republic of', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-13 18:00:00', '2021-12-13 18:00:00'),
(127, 'Madagascar', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-14 18:00:00', '2021-12-14 18:00:00'),
(128, 'Malawi', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-15 18:00:00', '2021-12-15 18:00:00'),
(129, 'Malaysia', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-16 18:00:00', '2021-12-16 18:00:00'),
(130, 'Maldives', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-17 18:00:00', '2021-12-17 18:00:00'),
(131, 'Mali', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-18 18:00:00', '2021-12-18 18:00:00'),
(132, 'Malta', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-19 18:00:00', '2021-12-19 18:00:00'),
(133, 'Marshall Islands', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-20 18:00:00', '2021-12-20 18:00:00'),
(134, 'Martinique', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-21 18:00:00', '2021-12-21 18:00:00'),
(135, 'Mauritania', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-22 18:00:00', '2021-12-22 18:00:00'),
(136, 'Mauritius', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-23 18:00:00', '2021-12-23 18:00:00'),
(137, 'Mayotte', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-24 18:00:00', '2021-12-24 18:00:00'),
(138, 'Mexico', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-25 18:00:00', '2021-12-25 18:00:00'),
(139, 'Micronesia, Federated States of', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-26 18:00:00', '2021-12-26 18:00:00'),
(140, 'Moldova, Republic of', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-27 18:00:00', '2021-12-27 18:00:00'),
(141, 'Monaco', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-28 18:00:00', '2021-12-28 18:00:00'),
(142, 'Mongolia', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-29 18:00:00', '2021-12-29 18:00:00'),
(143, 'Montserrat', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-30 18:00:00', '2021-12-30 18:00:00'),
(144, 'Morocco', NULL, NULL, NULL, NULL, NULL, 1, '2021-12-31 18:00:00', '2021-12-31 18:00:00'),
(145, 'Mozambique', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-01 18:00:00', '2022-01-01 18:00:00'),
(146, 'Myanmar', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-02 18:00:00', '2022-01-02 18:00:00'),
(147, 'Namibia', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-03 18:00:00', '2022-01-03 18:00:00'),
(148, 'Nauru', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-04 18:00:00', '2022-01-04 18:00:00'),
(149, 'Nepal', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-05 18:00:00', '2022-01-05 18:00:00'),
(150, 'Netherlands', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-06 18:00:00', '2022-01-06 18:00:00'),
(151, 'Netherlands Antilles', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-07 18:00:00', '2022-01-07 18:00:00'),
(152, 'New Caledonia', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-08 18:00:00', '2022-01-08 18:00:00'),
(153, 'New Zealand', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-09 18:00:00', '2022-01-09 18:00:00'),
(154, 'Nicaragua', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-10 18:00:00', '2022-01-10 18:00:00'),
(155, 'Niger', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-11 18:00:00', '2022-01-11 18:00:00'),
(156, 'Nigeria', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-12 18:00:00', '2022-01-12 18:00:00'),
(157, 'Niue', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-13 18:00:00', '2022-01-13 18:00:00'),
(158, 'Norfolk Island', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-14 18:00:00', '2022-01-14 18:00:00'),
(159, 'Northern Mariana Islands', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-15 18:00:00', '2022-01-15 18:00:00'),
(160, 'Norway', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-16 18:00:00', '2022-01-16 18:00:00'),
(161, 'Oman', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 18:00:00', '2022-01-17 18:00:00'),
(162, 'Pakistan', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-18 18:00:00', '2022-01-18 18:00:00'),
(163, 'Palau', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-19 18:00:00', '2022-01-19 18:00:00'),
(164, 'Palestinian Territory, Occupied', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-20 18:00:00', '2022-01-20 18:00:00'),
(165, 'Panama', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-21 18:00:00', '2022-01-21 18:00:00'),
(166, 'Papua New Guinea', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-22 18:00:00', '2022-01-22 18:00:00'),
(167, 'Paraguay', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-23 18:00:00', '2022-01-23 18:00:00'),
(168, 'Peru', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-24 18:00:00', '2022-01-24 18:00:00'),
(169, 'Philippines', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-25 18:00:00', '2022-01-25 18:00:00'),
(170, 'Pitcairn', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-26 18:00:00', '2022-01-26 18:00:00'),
(171, 'Poland', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-27 18:00:00', '2022-01-27 18:00:00'),
(172, 'Portugal', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-28 18:00:00', '2022-01-28 18:00:00'),
(173, 'Puerto Rico', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-29 18:00:00', '2022-01-29 18:00:00'),
(174, 'Qatar', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-30 18:00:00', '2022-01-30 18:00:00'),
(175, 'Reunion', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-31 18:00:00', '2022-01-31 18:00:00'),
(176, 'Romania', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-01 18:00:00', '2022-02-01 18:00:00'),
(177, 'Russian Federation', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-02 18:00:00', '2022-02-02 18:00:00'),
(178, 'Rwanda', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-03 18:00:00', '2022-02-03 18:00:00'),
(179, 'Saint Helena', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-04 18:00:00', '2022-02-04 18:00:00'),
(180, 'Saint Kitts and Nevis', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-05 18:00:00', '2022-02-05 18:00:00'),
(181, 'Saint Lucia', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-06 18:00:00', '2022-02-06 18:00:00'),
(182, 'Saint Pierre and Miquelon', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-07 18:00:00', '2022-02-07 18:00:00'),
(183, 'Saint Vincent and the Grenadines', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-08 18:00:00', '2022-02-08 18:00:00'),
(184, 'Samoa', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-09 18:00:00', '2022-02-09 18:00:00'),
(185, 'San Marino', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-10 18:00:00', '2022-02-10 18:00:00'),
(186, 'Sao Tome and Principe', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-11 18:00:00', '2022-02-11 18:00:00'),
(187, 'Saudi Arabia', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-12 18:00:00', '2022-02-12 18:00:00'),
(188, 'Senegal', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-13 18:00:00', '2022-02-13 18:00:00'),
(189, 'Serbia and Montenegro', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-14 18:00:00', '2022-02-14 18:00:00'),
(190, 'Seychelles', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-15 18:00:00', '2022-02-15 18:00:00'),
(191, 'Sierra Leone', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-16 18:00:00', '2022-02-16 18:00:00'),
(192, 'Singapore', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-17 18:00:00', '2022-02-17 18:00:00'),
(193, 'Slovakia', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-18 18:00:00', '2022-02-18 18:00:00'),
(194, 'Slovenia', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-19 18:00:00', '2022-02-19 18:00:00'),
(195, 'Solomon Islands', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-20 18:00:00', '2022-02-20 18:00:00'),
(196, 'Somalia', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-21 18:00:00', '2022-02-21 18:00:00'),
(197, 'South Africa', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-22 18:00:00', '2022-02-22 18:00:00'),
(198, 'South Georgia and the South Sandwich Islands', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-23 18:00:00', '2022-02-23 18:00:00'),
(199, 'Spain', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-24 18:00:00', '2022-02-24 18:00:00'),
(200, 'Sri Lanka', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-25 18:00:00', '2022-02-25 18:00:00'),
(201, 'Sudan', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-26 18:00:00', '2022-02-26 18:00:00'),
(202, 'Suriname', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-27 18:00:00', '2022-02-27 18:00:00'),
(203, 'Svalbard and Jan Mayen', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-28 18:00:00', '2022-02-28 18:00:00'),
(204, 'Swaziland', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-01 18:00:00', '2022-03-01 18:00:00'),
(205, 'Sweden', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-02 18:00:00', '2022-03-02 18:00:00'),
(206, 'Switzerland', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-03 18:00:00', '2022-03-03 18:00:00'),
(207, 'Syrian Arab Republic', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-04 18:00:00', '2022-03-04 18:00:00'),
(208, 'Taiwan, Province of China', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-05 18:00:00', '2022-03-05 18:00:00'),
(209, 'Tajikistan', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-06 18:00:00', '2022-03-06 18:00:00'),
(210, 'Tanzania, United Republic of', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-07 18:00:00', '2022-03-07 18:00:00'),
(211, 'Thailand', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-08 18:00:00', '2022-03-08 18:00:00'),
(212, 'Timor-Leste', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-09 18:00:00', '2022-03-09 18:00:00'),
(213, 'Togo', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-10 18:00:00', '2022-03-10 18:00:00'),
(214, 'Tokelau', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-11 18:00:00', '2022-03-11 18:00:00'),
(215, 'Tonga', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-12 18:00:00', '2022-03-12 18:00:00'),
(216, 'Trinidad and Tobago', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-13 18:00:00', '2022-03-13 18:00:00'),
(217, 'Tunisia', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-14 18:00:00', '2022-03-14 18:00:00'),
(218, 'Turkey', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-15 18:00:00', '2022-03-15 18:00:00'),
(219, 'Turkmenistan', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-16 18:00:00', '2022-03-16 18:00:00'),
(220, 'Turks and Caicos Islands', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-17 18:00:00', '2022-03-17 18:00:00'),
(221, 'Tuvalu', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-18 18:00:00', '2022-03-18 18:00:00'),
(222, 'Uganda', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-19 18:00:00', '2022-03-19 18:00:00'),
(223, 'Ukraine', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-20 18:00:00', '2022-03-20 18:00:00'),
(224, 'United Arab Emirates', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-21 18:00:00', '2022-03-21 18:00:00'),
(225, 'United Kingdom', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-22 18:00:00', '2022-03-22 18:00:00'),
(226, 'United States', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-23 18:00:00', '2022-03-23 18:00:00'),
(227, 'United States Minor Outlying Islands', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-24 18:00:00', '2022-03-24 18:00:00'),
(228, 'Uruguay', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-25 18:00:00', '2022-03-25 18:00:00'),
(229, 'Uzbekistan', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-26 18:00:00', '2022-03-26 18:00:00'),
(230, 'Vanuatu', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-27 18:00:00', '2022-03-27 18:00:00'),
(231, 'Venezuela', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-28 18:00:00', '2022-03-28 18:00:00'),
(232, 'Viet Nam', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-29 18:00:00', '2022-03-29 18:00:00'),
(233, 'Virgin Islands, British', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-30 18:00:00', '2022-03-30 18:00:00'),
(234, 'Virgin Islands, U.s.', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-31 18:00:00', '2022-03-31 18:00:00'),
(235, 'Wallis and Futuna', NULL, NULL, NULL, NULL, NULL, 1, '2022-04-01 18:00:00', '2022-04-01 18:00:00'),
(236, 'Western Sahara', NULL, NULL, NULL, NULL, NULL, 1, '2022-04-02 18:00:00', '2022-04-02 18:00:00'),
(237, 'Yemen', NULL, NULL, NULL, NULL, NULL, 1, '2022-04-03 18:00:00', '2022-04-03 18:00:00'),
(238, 'Zambia', NULL, NULL, NULL, NULL, NULL, 1, '2022-04-04 18:00:00', '2022-04-04 18:00:00'),
(239, 'Zimbabwe', NULL, NULL, NULL, NULL, NULL, 1, '2022-04-05 18:00:00', '2021-08-11 21:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `ssl_payments`
--

CREATE TABLE `ssl_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ssl_payments`
--

INSERT INTO `ssl_payments` (`id`, `order_id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01771045019', 1386.00, '17/A, Shantibagh', 'Processing', '611e79df33ae8', 'BDT', NULL, NULL),
(2, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01771045019', 1386.00, '17/A, Shantibagh', 'Pending', '611e7ec70248b', 'BDT', NULL, NULL),
(3, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01771045019', 1386.00, '17/A, Shantibagh', 'Processing', '611e7f0166851', 'BDT', NULL, NULL),
(4, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01771045019', 2863.00, '17/A, Shantibagh', 'Processing', '611e7fa99bad8', 'BDT', NULL, NULL),
(5, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01771045019', 2863.00, '17/A, Shantibagh', 'Processing', '611e80668053f', 'BDT', NULL, NULL),
(6, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01771045019', 2863.00, '17/A, Shantibagh', 'Processing', '611e81219d7da', 'BDT', NULL, NULL),
(7, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01771045019', 2863.00, '17/A, Shantibagh', 'Pending', '611e81a25afb3', 'BDT', NULL, NULL),
(8, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01771045019', 1386.00, '17/A, Shantibagh', 'Processing', '611e83300fdde', 'BDT', NULL, NULL),
(9, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Processing', '611e87ec0974d', 'BDT', NULL, NULL),
(10, NULL, 'Md. Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3340.00, '17/A, Shantibag', 'Processing', '611e8a115aca0', 'BDT', NULL, NULL),
(11, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Processing', '611e8ae0a9b71', 'BDT', NULL, NULL),
(12, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Processing', '611e8b5e8dc20', 'BDT', NULL, NULL),
(13, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Pending', '611e8bc7a6684', 'BDT', NULL, NULL),
(14, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Pending', '611e8d5a9abf6', 'BDT', NULL, NULL),
(15, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Pending', '611e8f22d3585', 'BDT', NULL, NULL),
(16, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Processing', '611e8f2867e40', 'BDT', NULL, NULL),
(17, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Processing', '611e8ff15a49b', 'BDT', NULL, NULL),
(18, NULL, 'Md Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3250.00, '17/A, Shantibagh', 'Processing', '611e9076ca348', 'BDT', NULL, NULL),
(19, NULL, 'Md. Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 2360.00, '17/A, Shantibag', 'Processing', '611fb84325b98', 'BDT', NULL, NULL),
(20, NULL, 'Md. Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 2360.00, '17/A, Shantibag', 'Processing', '611fb8b8911da', 'BDT', NULL, NULL),
(21, NULL, 'Md. Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 2360.00, '17/A, Shantibag', 'Pending', '611fb9034590f', 'BDT', NULL, NULL),
(22, NULL, 'Md. Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 2360.00, '17/A, Shantibag', 'Pending', '611fc038e9d3a', 'BDT', NULL, NULL),
(23, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01687663654', 2160.00, '17/A, Shantibagh', 'Pending', '611fc0d4aeac1', 'BDT', NULL, NULL),
(24, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01687663654', 2160.00, '17/A, Shantibagh', 'Processing', '611fc0d4b55ec', 'BDT', NULL, NULL),
(25, NULL, 'Md Imran Hossain', 'imrancsecity@gmail.com', '01687663654', 3240.00, '17/A, Shantibagh', 'Processing', '611fc15447b95', 'BDT', NULL, NULL),
(26, NULL, 'Md. Imran Hossain', 'mdimranhossain985@gmail.com', '01687663654', 3340.00, '17/A, Shantibag', 'Processing', '611fd43779e76', 'BDT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'MD. IMRAN HOSSAIN', NULL, NULL, NULL, NULL, NULL, NULL, 'mdimranhossain985@gmail.com', NULL, '$2y$10$/HnX68JVvgC7TsyEw0AyIOFrzAX4UsCDLWwLMvKlcozvuAPKG2.Ea', NULL, NULL, NULL, 'kfbQS7JvM89NqEneBY3ZBAnP8RAHGIdL4tNaYV8ccPa8Fwd0CnjhwZAcWug2', NULL, NULL, '2020-11-15 04:25:27', '2020-11-15 04:25:27'),
(2, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, '01771045019', 'hossainmdibrahim2002@gmail.com', NULL, '$2y$10$EFA2HzOZrm1QdMy.3D/5G.E0aStFBzYBLof/E4aoE3kbWoHJRc7ae', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:09:28', '2021-07-28 13:09:28'),
(3, 'Jack Smith', NULL, NULL, NULL, NULL, NULL, '01875632152', 'jack@gmail.com', NULL, '$2y$10$bAzRMtKxLZR28JECGy8VleLiGmP6gngzfqZ4dU9D68EBiAD7balbG', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:20:09', '2021-07-28 13:20:09'),
(4, 'khan', NULL, NULL, NULL, NULL, NULL, '01771045019', 'asdf@gmail.com', NULL, '$2y$10$4zH7hZHl7tbkdB7Z5jvBU.gnIAaSiKAzCzorjSjcEgamHM8BEyeFy', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:21:29', '2021-07-28 13:21:29'),
(5, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, '01771045019', 'qwerew@gmail.com', NULL, '$2y$10$b4lDVxM2Ky.uxz4aOyiV1uP/pHU1H9Go85c6laNOMVXQZSXDF3vuS', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:22:02', '2021-07-28 13:22:02'),
(6, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, '01771045019', 'ewrewr@gmail.com', NULL, '$2y$10$fzqT9YQC1sZAruSNjKDQxeqTj6PHB7MPaMgfnl9412gx28AHIbm/.', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:23:54', '2021-07-28 13:23:54'),
(7, 'erew', NULL, NULL, NULL, NULL, NULL, '546534351', 'imran@gmail.comwerew', NULL, '$2y$10$2I3Yn.camGiNeWv1F0MehuX2pSfVtUjU3eIvqrNlIdTsLdZ7OkZWu', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:24:21', '2021-07-28 13:24:21'),
(8, 'erewrew', NULL, NULL, NULL, NULL, NULL, '545545', 'kjh@gnau.cin', NULL, '$2y$10$PLy/jzV7ndwIGELbsyotjeWkiLcRcazzVogHbj2..HVYQAT/1K6HS', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:29:14', '2021-07-28 13:29:14'),
(9, 'asdf', NULL, NULL, NULL, NULL, NULL, '2425512', 'asddmi@gamil.com', NULL, '$2y$10$157W.GtoOQjbjC4eYXYuE./GoZN274wxzDB9yeMFTKKf8bg3D14rO', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:30:00', '2021-07-28 13:30:00'),
(10, 'wer', NULL, NULL, NULL, NULL, NULL, '546', 'asdf@gmail.comdf', NULL, '$2y$10$f.KbHczwiTT9x9Ic1UPUTuXW7oQi9rYt74/lOaDdx8r.jvzSUGw2u', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:31:06', '2021-07-28 13:31:06'),
(11, 'adsf', NULL, NULL, NULL, NULL, NULL, '54545', 'asd@gmail.com', NULL, '$2y$10$iYeiYrJtXEip5VZvX5CfvuXuf8wj1acLi4tr0s7rJlBg..yv5EnBO', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:31:56', '2021-07-28 13:31:56'),
(12, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, '01771045019', 'imrana@gmail.com', NULL, '$2y$10$Ez910evyqGwG3yysu/kPtO4iT8reYsNoWp0dLO46DDywHWBcr9pru', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:32:34', '2021-07-28 13:32:34'),
(13, 'werewr', NULL, NULL, NULL, NULL, NULL, 'werewr', 'wrwer@gmail.com', NULL, '$2y$10$GwA0EDFqBX/FENiah.kPXu/b1Bh4VNhOASZ12uUHr2pd/OCEPj6lG', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 13:33:04', '2021-07-28 13:33:04'),
(14, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, '01771045019', 'wer@gm.com', NULL, '$2y$10$mP2kaemoijkX.23FlqA0NepCD95xticUO6FRcoMtM6rODs9QTSXN6', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-29 02:15:05', '2021-07-29 02:15:05'),
(15, 'wer', NULL, NULL, NULL, NULL, NULL, '01771045019', '87er@asdf.com', NULL, '$2y$10$GKlT3rSeETYz7yS7w7MPQ.x92i7H3WKUd5b0mFpdS6FRh0oOwlBly', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-29 02:16:04', '2021-07-29 02:16:04'),
(16, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, NULL, 'adsf@df', NULL, '$2y$10$q0NVBKXn.TqIXIcME13HFu5Ys/shPRjZqVfzw2Z/1yr6OYEpJVIqK', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 02:21:04', '2021-07-29 02:21:04'),
(17, 'werew', NULL, NULL, NULL, NULL, NULL, NULL, 'mdimranhossaain985@gmail.com', NULL, '$2y$10$HQK.ygn7xB7K2uKwYXYOHucr1Oj1b2lRo6cqTOCWgFJCVOGP9D7Ny', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 02:23:33', '2021-07-29 02:23:33'),
(18, 'adsf', NULL, NULL, NULL, NULL, NULL, '01771045019', 'asdf@adsf.com', NULL, '$2y$10$NAlSoTS6ecHtFvSix5caMO1tVmkFczgWaBv0O2wYcqUMfFoxdj3dy', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-29 10:18:01', '2021-07-29 10:18:01'),
(19, 'adsfdsf', NULL, NULL, NULL, NULL, NULL, '01771045019', 'asdf@gmail.coms', NULL, '$2y$10$B/KsQSMhvm3BdirG38DkCOk5CZsoU91pI2YDFKs4Yr5mk1kOd2e5e', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'asdf', NULL, NULL, NULL, NULL, NULL, '01771045019', 'adsf@dfa', NULL, '$2y$10$7HQZ9P5xE1RblcFJsa06OuMRSKF9pztZEJr.MkXRfn/bsx5UUfXw.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'adsf', NULL, NULL, NULL, NULL, NULL, '551', 'asdqmi@gamil.coma', NULL, '$2y$10$PWVFpX0fH3uUvV0jRxkFTOXJrBdODKx8QtEJqdr.w5HkKD6dlX8TC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Md. Imran Hossain', NULL, NULL, NULL, NULL, NULL, '01771045019', 'adsf@dfaaaaa', NULL, '$2y$10$uUyTg/MBnHdz0w/4.fcYdei2jQkygfvygsgSAWSDOvM0/x1QiLbJO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'adf', NULL, NULL, NULL, NULL, NULL, 'asdf', 'admin@admin.com', NULL, '$2y$10$iWWQhzQ4SZADpCtDpv.eLObWVs68Btd/lmziN1Sd6/pB67RG/5Ioq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'adf', NULL, NULL, NULL, NULL, NULL, '01771045019', 'adsf@dfaadsf', NULL, '$2y$10$8hDMRZYIP8eMux.9DHR/3.UnOmNKj7csLtdEdPGgs2DoV.RyoQ8e2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'adsfadsf', NULL, NULL, NULL, NULL, NULL, 'adsfasd', 'adfd@gmail.coma', NULL, '$2y$10$tZCEhQq.kgEV73ZyuectS.Oj54ZL5sLt7qfIg0ZpcclctdtV0gjbm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'asdf', NULL, NULL, NULL, NULL, NULL, 'adsf', 'adsf@dfaaaaaa', NULL, '$2y$10$uoWX6/5QuLeIkaiMQM1pSODRuSuicEMg8guY10gQlIAHcITIgXe6q', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'qwerewwerwer', NULL, NULL, NULL, NULL, NULL, 'erewr', 'rew@gmail.ocm', NULL, '$2y$10$8P3aqU8anZthGJgoSVzx/uB8.GQeXWmQAEQNgo6XYEhs.CLSJ8KQG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'rkjewlrjw', NULL, NULL, NULL, NULL, NULL, 'kjlfkjsd', 'imran@gmail.com', NULL, '$2y$10$p0sUJ9t/brHmqjPa6Rh4OOwglZUWdaVKn5euPlBmi5wkH7bvv/IYe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssl_payments`
--
ALTER TABLE `ssl_payments`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `ssl_payments`
--
ALTER TABLE `ssl_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
