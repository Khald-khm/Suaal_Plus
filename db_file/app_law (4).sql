-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 11:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_law`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `description`, `img`, `start_date`, `end_date`) VALUES
(1, 'New advertisement', '/adv.jfif', '2022-06-01', '2022-07-02'),
(4, 'description', '\\2022-06-29 21-29-06.jpg', '2022-06-29', '2022-07-11'),
(5, 'another ad', '\\2022-06-29 21-31-16.jpg', '2022-06-29', '2022-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `title`, `question_id`, `is_correct`) VALUES
(82, 'nothing right at all', 49, 1),
(83, 'is it', 49, 0),
(84, 'yes it is', 49, 0),
(85, 'oh realy', 49, 0),
(86, 'somethig right', 50, 1),
(87, 'nothing is wrong', 50, 0),
(88, 'yes there is', 50, 0),
(89, 'yeah I agree too', 50, 0),
(90, 'right', 51, 1),
(91, 'wrong', 51, 0),
(92, 'wrong', 51, 0),
(93, 'wrong', 51, 0),
(94, 'صح', 52, 1),
(95, 'خطأ', 52, 0),
(96, 'خطأ', 52, 0),
(97, 'خطأ', 52, 0),
(98, 'صح', 52, 1),
(99, 'خطأ', 52, 0),
(100, 'خطأ', 52, 0),
(101, 'خطأ', 52, 0),
(102, 'صح', 54, 1),
(103, 'خطأ', 54, 0),
(104, 'خطأ', 54, 0),
(105, 'خطأ', 54, 0),
(108, 'صحيح', 56, 1),
(109, 'خطأ', 56, 0),
(110, 'خطأ', 56, 0),
(111, 'خطأ', 56, 0),
(112, 'صحيح', 57, 1),
(113, 'خطأ', 57, 0),
(114, 'صحيح', 58, 1),
(115, 'خطأ', 58, 0),
(116, 'wrong', 57, 0),
(119, 'هالمرة عنجد مو صحيح', 60, 1),
(120, 'خطأ', 60, 0),
(123, 'هالمرة عنجد عنجد صحيح', 62, 1),
(124, 'كمان هاد خطأ', 62, 0),
(125, 'ثحيح', 63, 1),
(126, 'كمان ثحيح', 63, 1),
(127, 'هازا خطأ', 63, 0),
(128, 'كمان هاذا خطأ', 63, 0),
(129, 'و هاد كمان', 63, 0),
(130, 'كمان هاد', 63, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`) VALUES
(2, 'new corporation', '2022-07-01 08-50-44.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `copon`
--

CREATE TABLE `copon` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` enum('active','inactive','requested','done') NOT NULL DEFAULT 'inactive',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `requested_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `copon`
--

INSERT INTO `copon` (`id`, `description`, `company_id`, `status`, `user_id`, `requested_date`) VALUES
(1, 'description', 2, 'active', NULL, NULL);

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `learning_type` varchar(255) NOT NULL,
  `university_id` int(11) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `users_num` int(11) NOT NULL,
  `questions_num` int(11) NOT NULL,
  `type` enum('public','private') NOT NULL,
  `password` int(11) DEFAULT NULL,
  `from_time` datetime NOT NULL,
  `to_time` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_questions`
--

CREATE TABLE `group_questions` (
  `group_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_subjects`
--

CREATE TABLE `group_subjects` (
  `group_id` int(11) NOT NULL,
  `suject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `group_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_26_141803_create_questions_table', 2);

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
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`) VALUES
(1, 'الأسئلة'),
(2, 'المواد'),
(3, 'المستخدمين'),
(4, 'الشركات'),
(5, 'الإعلانات'),
(6, 'الصلاحيات');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `learning_type` varchar(255) NOT NULL,
  `university_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `sub_chapter_id` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `library` varchar(255) DEFAULT NULL,
  `asked_count` int(11) NOT NULL DEFAULT 0,
  `correct_times` int(11) NOT NULL DEFAULT 0,
  `year_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `learning_type`, `university_id`, `subject_id`, `sub_chapter_id`, `type`, `library`, `asked_count`, `correct_times`, `year_time`) VALUES
(49, 'nothing just another question', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 24, 11, '2012'),
(50, 'another new question', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 10, 1, '2020'),
(51, 'question', 'عام', 1, 3, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2019'),
(52, 'سؤال جديد', 'عام', 1, 6, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(53, 'سؤال جديد', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(54, 'سؤال اجدد من الذي قبل', 'عام', 1, 2, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(56, 'نص السؤال', 'عام', 1, 3, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(57, 'سؤاااااااااااااال آخر', 'عام', 1, 3, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(58, 'سؤال آخر ايضا', 'عام', 1, 3, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(59, 'سؤال', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(60, 'سؤال', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(61, 'سؤال', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(62, 'سؤال', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020'),
(63, 'نص السؤال', 'عام', 1, 1, NULL, 'الاجابة الصحيحة', NULL, 0, 0, '2020');

-- --------------------------------------------------------

--
-- Table structure for table `specialize`
--

CREATE TABLE `specialize` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialize`
--

INSERT INTO `specialize` (`id`, `name`) VALUES
(1, 'مدني'),
(2, 'إداري'),
(3, 'دولي'),
(4, 'تجاري'),
(5, 'جزائي');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialize_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `specialize_id`) VALUES
(1, 'التنظيم الدولي', 3),
(2, 'الدولي الاقتصادي', 3),
(3, 'قانون العقوبات العام', 5),
(4, 'مدخل الى علم القانون', 1),
(5, 'النظم الكبرى', NULL),
(6, 'القانون الدستوري', 5),
(7, 'الحقوق و الحريات العامة', NULL),
(8, 'التشريعات الاجتماعية 1', NULL),
(9, 'دولي حقوق انسان', 3),
(10, 'الأحوال الشخصية 1', 1),
(11, 'مصادر الالتزام', 1),
(12, 'القانون الاداري', 2),
(13, 'متجر', 4),
(14, 'اشخاص و اموال', 5),
(15, 'امن الدولة', 5),
(16, 'التشريعات الاجتماعية 2', NULL),
(17, 'القضاء الاداري', 2),
(18, 'اصول محاكمات جزائية 1', 5),
(19, 'اصول محاكمات مدنية', 1),
(20, 'الاحوال الشخصية 2', 1),
(21, 'الجنسية 1', NULL),
(22, 'دولي انساني بلغة اجنبية', 3),
(23, 'اصول محاكمات جزائية 2', 5),
(24, 'الاسناد التجارية 1', 4),
(25, 'مالية عامة 1', NULL),
(26, 'الاصلية 1', NULL),
(27, 'عقود مسماة', NULL),
(28, 'المالية العامة 2', NULL),
(29, 'دولي جزائي / تشريع جمركي / اثبات / عقوبات عسكرية', NULL),
(30, 'التشريعات المصرفية', NULL),
(31, 'دبلوماسية بلغة اجنبية', NULL),
(32, 'اصول التنفيذ', NULL),
(33, 'الجنسية 2', NULL),
(34, 'تنازع القوانين', NULL),
(35, 'قضايا مختصرة / ادارة محلية / تأمينات اجتماعية / عقوبات اقتصادية', NULL),
(36, 'نطق دولي / تشريعات اقنصادية / تأمين / تسليم مجرمين', NULL),
(37, 'الاسناد التجارية 2', 4),
(38, 'ادارة عامة', NULL),
(39, 'الاصلية 2', NULL),
(40, 'اصول الفقه', NULL),
(41, 'علم الاجرام', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_chapter`
--

CREATE TABLE `sub_chapter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `learning_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`, `learning_type`) VALUES
(1, 'دمشق', 'عام');

-- --------------------------------------------------------

--
-- Table structure for table `university_year`
--

CREATE TABLE `university_year` (
  `subject_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `year` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university_year`
--

INSERT INTO `university_year` (`subject_id`, `university_id`, `year`) VALUES
(2, 1, '2'),
(1, 1, '1'),
(3, 1, '1'),
(4, 1, '1'),
(5, 1, '1'),
(6, 1, '1'),
(7, 1, '1'),
(8, 1, '1'),
(9, 1, '2'),
(10, 1, '2'),
(11, 1, '2'),
(12, 1, '2'),
(13, 1, '2'),
(14, 1, '2'),
(15, 1, '2'),
(16, 1, '2'),
(17, 1, '3'),
(18, 1, '3'),
(19, 1, '3'),
(20, 1, '3'),
(21, 1, '3'),
(22, 1, '3'),
(23, 1, '3'),
(24, 1, '3'),
(25, 1, '3'),
(26, 1, '3'),
(27, 1, '3'),
(28, 1, '3'),
(29, 1, '4'),
(30, 1, '4'),
(31, 1, '4'),
(32, 1, '4'),
(33, 1, '4'),
(34, 1, '4'),
(35, 1, '4'),
(36, 1, '4'),
(37, 1, '4'),
(38, 1, '4'),
(39, 1, '4'),
(40, 1, '4'),
(41, 1, '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_year` int(11) DEFAULT NULL,
  `learning_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL,
  `graduated` tinyint(1) DEFAULT NULL,
  `carrer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answered_questions` int(11) DEFAULT NULL,
  `correct_questions` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `role` enum('admin','agent','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `phone`, `password`, `country`, `city`, `study_year`, `learning_type`, `university_id`, `graduated`, `carrer`, `answered_questions`, `correct_questions`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', '1', 'admin1@suaalplus.sy', NULL, NULL, '5482391754', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL),
(5, 'admin', '2', 'admin2@suaalplus.sy', NULL, NULL, '7462941274', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL),
(6, 'admin', '3', 'admin3@suaalplus.sy', NULL, NULL, '6254712694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL),
(7, 'admin', '4', 'admin4@suaalplus.sy', NULL, NULL, '8371633291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL),
(8, 'admin', '5', 'admin5@suaalplus.sy', NULL, NULL, '6638216594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL),
(9, 'Ahmad', 'Mohamad', 'ahmad@suaalplus.sy', NULL, '0912345678', '12345678', 'Syria', 'Damascus', 2, 'عام', 1, 0, NULL, 20, 12, 'active', 'user', NULL, NULL, NULL),
(10, 'new', 'admin', 'newAdmin@suaalplus.sy', NULL, NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL),
(11, 'new', 'admin', 'admin7@suaalplus.sy', NULL, NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `privilege_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`user_id`, `privilege_id`) VALUES
(4, 6),
(4, 5),
(4, 4),
(4, 3),
(4, 2),
(4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copon`
--
ALTER TABLE `copon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `group_questions`
--
ALTER TABLE `group_questions`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `group_subjects`
--
ALTER TABLE `group_subjects`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `subject_id` (`suject_id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `sub_chapter_id` (`sub_chapter_id`);

--
-- Indexes for table `specialize`
--
ALTER TABLE `specialize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialize_id_2` (`specialize_id`);

--
-- Indexes for table `sub_chapter`
--
ALTER TABLE `sub_chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_year`
--
ALTER TABLE `university_year`
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `copon`
--
ALTER TABLE `copon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `specialize`
--
ALTER TABLE `specialize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sub_chapter`
--
ALTER TABLE `sub_chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `copon`
--
ALTER TABLE `copon`
  ADD CONSTRAINT `copon_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `copon_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_ibfk_3` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_questions`
--
ALTER TABLE `group_questions`
  ADD CONSTRAINT `group_questions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_subjects`
--
ALTER TABLE `group_subjects`
  ADD CONSTRAINT `group_subjects_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_users_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`sub_chapter_id`) REFERENCES `sub_chapter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`specialize_id`) REFERENCES `specialize` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_chapter`
--
ALTER TABLE `sub_chapter`
  ADD CONSTRAINT `sub_chapter_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `university_year`
--
ALTER TABLE `university_year`
  ADD CONSTRAINT `university_year_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `university_year_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD CONSTRAINT `privilege` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
