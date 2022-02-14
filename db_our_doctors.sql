-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2022 at 01:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_our_doctors`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `row_status`, `created_at`, `updated_at`) VALUES
(1, 'Anesthesiology', 1, '2021-12-22 20:27:44', NULL),
(2, 'Cardiology', 1, '2021-12-22 20:27:44', NULL),
(3, 'Chest/Respiratory', 1, NULL, NULL),
(4, 'Cancer-Oncology ', 1, NULL, NULL),
(5, 'Child Pediatric', 1, NULL, NULL),
(7, 'Dermatology/Skin & Sex', 1, NULL, NULL),
(8, 'Eye/Ophthalmology', 1, NULL, NULL),
(9, 'ENT/ Head-Neck Surgery', 1, NULL, NULL),
(10, 'Gastroenterologist', 1, NULL, NULL),
(11, 'Hormone & Diabetes ', 1, NULL, NULL),
(12, 'Medicine/ Internal & Family', 1, NULL, NULL),
(13, 'Neuro Medicine', 1, NULL, NULL),
(14, 'Orthopedic/ Trauma', 1, NULL, NULL),
(15, 'Plastic & Cosmetic Surgery', 1, NULL, NULL),
(16, 'Nutritionist/ Food Nutrition', 1, NULL, NULL),
(17, 'Urologist', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chambers`
--

CREATE TABLE `chambers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `consulting_hrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitfees_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitfees_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_status` tinyint(1) NOT NULL DEFAULT '1',
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chambers`
--

INSERT INTO `chambers` (`id`, `address`, `doctor_id`, `hospital_id`, `consulting_hrs`, `visitfees_one`, `visitfees_two`, `row_status`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'test u', 1, 8, 'Sun-Wed : 4PM - 8PM', '1000', '700', 1, '01245', NULL, '2022-02-08 05:34:06'),
(2, 'test', 2, 9, 'Sun-Wed : 4PM - 8PM', '900', '500', 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `division_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', '2021-11-07 09:50:11', '2021-11-07 09:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `category_id`, `hospital_id`, `degree`, `mobile`, `address`, `age`, `details`, `image`, `row_status`, `created_at`, `updated_at`) VALUES
(1, 'Bethany Figueroa', 13, 9, 'Tempora rerum amet', '16', 'Et anim sed molestia', '20', 'Maiores aliquam alia', '1644315063620241b7eb233.jpg', 1, '2022-02-08 04:11:03', '2022-02-08 04:11:03'),
(2, 'Sandra Alvarez', 15, 10, 'MBBS', '24', 'Iusto cupiditate del', '73', 'Aut cupidatat culpa', '16443167776202486918704.jpg', 1, '2022-02-08 04:13:50', '2022-02-08 04:39:37'),
(3, 'Sandra', 1, 9, 'Temporibus fuga Lab', '18', 'Ipsa architecto sin', '69', 'Quis magni irure ad', '164431525062024272663c0.png', 1, '2022-02-08 04:14:10', '2022-02-08 04:14:10');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazila_id` int(11) NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_status` tinyint(1) NOT NULL DEFAULT '1',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `map_location`, `division_id`, `district_id`, `upazila_id`, `phone`, `row_status`, `logo`, `created_at`, `updated_at`) VALUES
(7, 'Benedict Pollard', 'Similique deleniti d', 'https://g.page/square-hospitals-ltd?share', 6, 47, 366, '22', 1, '164431259462023812702f6.jpg', '2022-02-08 03:29:54', '2022-02-08 03:29:54'),
(8, 'Price Leonard', 'Quia aut dicta exped', 'https://goo.gl/maps/63d6xN4kvx3aMoou5', 5, 37, 286, '6', 1, '16443126066202381ed67e7.png', '2022-02-08 03:30:06', '2022-02-08 03:30:06'),
(9, 'Brianna Galloway', 'Possimus consequunt', 'https://goo.gl/maps/uCbzGswLveKfBJhc8', 5, 37, 289, '25', 1, '16443126196202382b57a0d.png', '2022-02-08 03:30:19', '2022-02-08 03:30:19'),
(10, 'Howard Mann', 'Sit commodi pariatu', '', 6, 47, 367, '55', 1, '16443126456202384515d99.png', '2022-02-08 03:30:45', '2022-02-08 03:30:45'),
(11, 'Rowan Espinoza', 'Sed ducimus eos ma', 'https://goo.gl/maps/sfyQkJu4S1uG4hJ5A', 1, 0, 0, '48', 1, '1644846992620a5f904cf5c.png', '2022-02-14 07:56:32', '2022-02-14 07:56:32');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2021_12_22_232955_create_categories_table', 1),
(15, '2021_12_22_233031_create_hospitals_table', 1),
(16, '2021_12_22_233032_create_doctors_table', 1),
(17, '2021_12_22_233048_create_reviews_table', 1),
(18, '2021_12_22_234202_create_chambers_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `doctor_id`, `rating`, `review`, `upload_file`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 5, 'Good Bangladesh for his expertise in Balloon Valvuloplasty especially Mitral stenosis (PTMC) & Peripheral angioplasty. He has an outstanding performance record in Coronary angioplasty including Primary PCI, Chronic Total Occlusion & multi vessel complex angioplasties for more than 20 years.', NULL, NULL, NULL),
(4, 1, 1, 5, 'Best Doctor', NULL, NULL, NULL),
(5, 1, 1, 5, 'Upload a prescription or just prescription header.', NULL, '2021-12-22 17:09:41', '2021-12-22 17:09:41'),
(6, 1, 1, 5, 'Working', NULL, '2022-02-14 07:32:20', '2022-02-14 07:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `district_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12');
INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', '2021-11-07 09:50:12', '2021-11-07 09:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3' COMMENT '1 = super admin, 2 = admin, 3 = staff',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '01587421457', 'root@email.com', '1', NULL, '$2y$10$vtrKeomINj.48McZoQ7htOuOiDbBpHr/K8edGbYbSbN.SR3hO26Qe', NULL, '2022-02-06 18:00:00', '2022-02-06 18:00:00'),
(2, 'Admin', '01587421458', 'admin@email.com', '2', NULL, '$2y$10$vnvbSJqUAYRQvphettVRxe6Q8joCxqhLGd9inaFKJypQL2tOpUxxG', NULL, '2022-02-06 18:00:00', '2022-02-06 18:00:00'),
(3, 'Staff', '01587421459', 'staff@email.com', '3', NULL, '$2y$10$.fUhDmAYlnzDfkCJyyOoP.OzEoVa2y8zmR2zy8mGUkeT1NORjSaRW', NULL, '2022-02-06 18:00:00', '2022-02-06 18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chambers`
--
ALTER TABLE `chambers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chambers_doctor_id_foreign` (`doctor_id`),
  ADD KEY `chambers_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_category_id_foreign` (`category_id`),
  ADD KEY `doctors_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chambers`
--
ALTER TABLE `chambers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chambers`
--
ALTER TABLE `chambers`
  ADD CONSTRAINT `chambers_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chambers_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctors_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
