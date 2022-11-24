-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2022 at 03:27 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `303comdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_otps`
--

CREATE TABLE `email_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phrase_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mem_aids`
--

CREATE TABLE `mem_aids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phrase_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `memory_aid_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_09_10_074605_add_profile_image_to_users_table', 1),
(12, '2022_09_16_141623_create_lessons_table', 2),
(13, '2022_09_22_134132_create_phrase_categories_table', 3),
(19, '2022_09_22_141049_create_phrases_table', 4),
(20, '2022_09_28_153725_create_likes_table', 5),
(21, '2022_09_30_172638_create_mem_aids_table', 6),
(26, '2022_10_07_175629_add_last_login_to_users_table', 7),
(28, '2022_10_14_232554_create_upvotes_table', 8),
(29, '2022_10_15_234928_create_selected_mem_aids_table', 9),
(30, '2022_10_20_231824_create_quiz_questions_table', 10),
(31, '2022_10_21_023808_create_quiz_answers_table', 11),
(34, '2022_10_21_211943_create_quiz_results_table', 12),
(37, '2022_10_22_152643_create_quiz_answers_table', 13),
(41, '2022_10_23_230522_create_quiz_questions_table', 14),
(42, '2022_10_27_011503_create_email_otps_table', 15);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phrases`
--

CREATE TABLE `phrases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phrase_category_id` bigint(20) UNSIGNED NOT NULL,
  `phrase_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phrase_meaning` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phrase_image` longtext COLLATE utf8mb4_unicode_ci,
  `phrase_pronunciation_audio_m` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phrase_pronunciation_audio_f` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phrases`
--

INSERT INTO `phrases` (`id`, `phrase_category_id`, `phrase_name`, `phrase_meaning`, `phrase_image`, `phrase_pronunciation_audio_m`, `phrase_pronunciation_audio_f`) VALUES
(1, 1, 'Ha lo', 'Hello', 'assets/images/phrases/basics/basics-1.png', 'assets/audio/basics/halo-m.mp3', 'assets/audio/basics/halo-f.mp3'),
(2, 1, 'Chiak pa boey?', 'Have you eaten?', '', 'assets/audio/basics/chiakpaboey-m.mp3', 'assets/audio/basics/chiakpaboey-f.mp3'),
(3, 1, 'Chiak pa liao', 'I have eaten', '', 'assets/audio/basics/chiakpaliao-m.mp3', 'assets/audio/basics/chiakpaliao-f.mp3'),
(4, 1, 'Loo ho boh?', 'How are you?', '', 'assets/audio/basics/luhoboh-m.mp3', 'assets/audio/basics/luhoboh-f.mp3'),
(5, 1, 'Kam sia', 'Thank you', 'assets/images/phrases/basics/basics-5.jpg', 'assets/audio/basics/gamsia-m.mp3', 'assets/audio/basics/gamsia-f.mp3'),
(8, 1, 'Mien khaek ki (casual)', 'You are welcome. (casual)', '', 'assets/audio/basics/mienkhaeki-m.mp3', 'assets/audio/basics/mienkhaeki-f.mp3'),
(9, 1, 'Mm mien khaek ki (formal)', 'You are welcome. (formal)', '', 'assets/audio/basics/mmmien-m.mp3', 'assets/audio/basics/mmmien-f.mp3'),
(10, 1, 'Si', 'Yes', 'assets/images/phrases/basics/basics-10.png', 'assets/audio/basics/si-m.mp3', 'assets/audio/basics/si-f.mp3'),
(11, 1, 'Mm si', 'No', 'assets/images/phrases/basics/basics-11.png', 'assets/audio/basics/mmsi-m.mp3', 'assets/audio/basics/mmsi-f.mp3'),
(12, 1, 'So ri', 'Sorry', 'assets/images/phrases/basics/basics-12.jpg', 'assets/audio/basics/sori-m.mp3', 'assets/audio/basics/sori-f.mp3'),
(13, 1, 'Chnia mui…', 'Excuse me…', '', 'assets/audio/basics/chiahmui-m.mp3', 'assets/audio/basics/chiahmui-f.mp3'),
(14, 1, 'Wa mm zai', 'I do not know', 'assets/images/phrases/basics/basics-14.png', 'assets/audio/basics/wammzai-m.mp3', 'assets/audio/basics/wammzai-f.mp3'),
(15, 1, 'Wa zai', 'I know', 'assets/images/phrases/basics/basics-15.png', 'assets/audio/basics/wazai-m.mp3', 'assets/audio/basics/wazai-f.mp3'),
(16, 1, 'Wa beh hiao kong Hokkien ua.', 'I do not know how to speak in Hokkien.', '', 'assets/audio/basics/wabehhiaokong-m.mp3', 'assets/audio/basics/wabehhiaokong-f.mp3'),
(17, 1, 'Wa beh hiao tnia Hokkien ua.', 'I do not understand Hokkien.', '', 'assets/audio/basics/wabehhiaotheah-m.mp3', 'assets/audio/basics/wabehhiaotheah-f.mp3'),
(18, 1, 'Beh yau kin', 'Nevermind', '', 'assets/audio/basics/behyaukin-m.mp3', 'assets/audio/basics/behyaukin-f.mp3'),
(19, 1, 'Kooi looi?', 'How much?', '', 'assets/audio/basics/kooilooi-m.mp3', 'assets/audio/basics/kooilooi-f.mp3'),
(20, 1, 'Chee lay', 'This', '', 'assets/audio/basics/cheelay-m.mp3', 'assets/audio/basics/cheelay-f.mp3'),
(21, 1, 'Har lay', 'That', '', 'assets/audio/basics/harlay-m.mp3', 'assets/audio/basics/harlay-f.mp3'),
(22, 1, 'Wa phua pae', 'I am sick', '', 'assets/audio/basics/phuabeh-m.mp3', 'assets/audio/basics/phuabeh-f.mp3'),
(23, 1, 'Wa boh ho si', 'I am not feeling well', '', 'assets/audio/basics/bohosi-m.mp3', 'assets/audio/basics/bohosi-f.mp3'),
(24, 2, 'Kay pnui', 'Chicken rice', 'assets/images/phrases/food/food-1.jpg', 'assets/audio/food/kaypnooi-m.mp3', 'assets/audio/food/kaypnooi-f.mp3'),
(25, 2, 'Ar pnui', 'Duck rice', 'assets/images/phrases/food/food-2.jpg', 'assets/audio/food/arpnooi-m.mp3', 'assets/audio/food/arpnooi-f.mp3'),
(26, 2, 'Keng ce pnui', 'Economy rice', 'assets/images/phrases/food/food-3.jpg', 'assets/audio/food/kengcepnooi-m.mp3', 'assets/audio/food/kengcepnooi-f.mp3'),
(27, 2, 'Char koey teow', 'Fried rice noodles', 'assets/images/phrases/food/food-4.jpg', 'assets/audio/food/charkoeyteow-m.mp3', 'assets/audio/food/charkoeyteow-f.mp3'),
(28, 2, 'Koey teow th\'ng', 'Rice noodles soup', 'assets/images/phrases/food/food-5.jpg', 'assets/audio/food/koeyteowtng-m.mp3', 'assets/audio/food/koeyteowtng-f.mp3'),
(29, 2, 'Bak kut teh', 'Pork ribs herbal soup', 'assets/images/phrases/food/food-6.jpg', 'assets/audio/food/bakutteh-m.mp3', 'assets/audio/food/bakutteh-f.mp3'),
(30, 2, 'Poh pneah', 'Popiah (Fresh spring rolls)', 'assets/images/phrases/food/food-7.jpg', 'assets/audio/food/popiah-m.mp3', 'assets/audio/food/popiah-f.mp3'),
(31, 2, 'Chneh hoo', 'Pasembur (Malaysian Indian dish salad)', 'assets/images/phrases/food/food-8.jpg', 'assets/audio/food/chnehhoo-m.mp3', 'assets/audio/food/chnehhoo-f.mp3'),
(32, 2, 'Hokkien mee', 'Hokkien noodles (Prawn noodles)', 'assets/images/phrases/food/food-9.jpg', 'assets/audio/food/hokkienmee-m.mp3', 'assets/audio/food/hokkienmee-f.mp3'),
(33, 2, 'Wan tan mee', 'Wonton noodles', 'assets/images/phrases/food/food-10.jpg', 'assets/audio/food/wantanmee-m.mp3', 'assets/audio/food/wantanmee-f.mp3'),
(34, 2, 'Ang tau s\'ng', 'Ais kacang (shaved ice beans)', 'assets/images/phrases/food/food-11.jpg', 'assets/audio/food/angtausng-m.mp3', 'assets/audio/food/angtausng-f.mp3'),
(35, 3, 'Loo ai lim ha mik?', 'What drink do you want?', '', 'assets/audio/drinks/limhamik-m.mp3', 'assets/audio/drinks/limhamik-f.mp3'),
(36, 3, 'Loo ai lim ha mik zui?', 'What drink do you want? (Alt. version)', '', 'assets/audio/drinks/hamikchooi-m.mp3', 'assets/audio/drinks/hamikchooi-f.mp3'),
(38, 3, '(Zui) juak', 'Hot (drink)', 'assets/images/phrases/drinks/drinks-3.png', 'assets/audio/drinks/juak-m.mp3', 'assets/audio/drinks/juak-f.mp3'),
(39, 3, '(Zui) peng', 'Cold (drink)', 'assets/images/phrases/drinks/drinks-4.png', 'assets/audio/drinks/peng-m.mp3', 'assets/audio/drinks/peng-f.mp3'),
(40, 3, '(Zui) soam', 'Warm (drink)', 'assets/images/phrases/drinks/drinks-5.png', 'assets/audio/drinks/soam-m.mp3', 'assets/audio/drinks/soam-f.mp3'),
(41, 3, 'Bar li', 'Barley drink', 'assets/images/phrases/drinks/drinks-6.jpg', 'assets/audio/drinks/barli-m.mp3', 'assets/audio/drinks/barli-f.mp3'),
(42, 3, 'Keat hua', 'Chrysanthemum drink', 'assets/images/phrases/drinks/drinks-7.jpg', 'assets/audio/drinks/keathua-m.mp3', 'assets/audio/drinks/keathua-f.mp3'),
(43, 3, 'Teh', 'Tea', 'assets/images/phrases/drinks/drinks-8.jpg', 'assets/audio/drinks/teh-m.mp3', 'assets/audio/drinks/teh-f.mp3'),
(45, 3, 'Kopi', 'Coffee', 'assets/images/phrases/drinks/drinks-9.jpg', 'assets/audio/drinks/kopi-m.mp3', 'assets/audio/drinks/kopi-f.mp3'),
(49, 3, 'Kiam leow', 'Less sugar', '', 'assets/audio/drinks/kiamleow-m.mp3', 'assets/audio/drinks/kiamleow-f.mp3'),
(50, 3, 'Cnia', 'Less sugar (alt. version)', '', 'assets/audio/drinks/chneah-m.mp3', 'assets/audio/drinks/chneah-f.mp3'),
(51, 4, 'Khong', 'Zero', 'assets/images/phrases/numbers/numbers-1.png', 'assets/audio/numbers/khong-m.mp3', 'assets/audio/numbers/khong-f.mp3'),
(52, 4, 'It', 'One (for position)', 'assets/images/phrases/numbers/numbers-2.png', 'assets/audio/numbers/it-m.mp3', 'assets/audio/numbers/it-f.mp3'),
(53, 4, 'Jit', 'One (for counting or numbering)', 'assets/images/phrases/numbers/numbers-2.png', 'assets/audio/numbers/jit-m.mp3', 'assets/audio/numbers/jit-f.mp3'),
(54, 4, 'G', 'Two (for position)', 'assets/images/phrases/numbers/numbers-3.png', 'assets/audio/numbers/g-m.mp3', 'assets/audio/numbers/g-f.mp3'),
(55, 4, 'Noh', 'Two (for counting or numbering)', 'assets/images/phrases/numbers/numbers-3.png', 'assets/audio/numbers/noh-m.mp3', 'assets/audio/numbers/noh-f.mp3'),
(56, 4, 'Sar', 'Three', 'assets/images/phrases/numbers/numbers-4.png', 'assets/audio/numbers/sna-m.mp3', 'assets/audio/numbers/sna-f.mp3'),
(57, 4, 'C', 'Four', 'assets/images/phrases/numbers/numbers-5.png', 'assets/audio/numbers/c-m.mp3', 'assets/audio/numbers/c-f.mp3'),
(58, 4, 'Goh', 'Five', 'assets/images/phrases/numbers/numbers-6.png', 'assets/audio/numbers/goh-m.mp3', 'assets/audio/numbers/goh-f.mp3'),
(59, 4, 'Luck', 'Six', 'assets/images/phrases/numbers/numbers-7.png', 'assets/audio/numbers/luck-m.mp3', 'assets/audio/numbers/luck-f.mp3'),
(60, 4, 'Chit', 'Seven', 'assets/images/phrases/numbers/numbers-8.png', 'assets/audio/numbers/chit-m.mp3', 'assets/audio/numbers/chit-f.mp3'),
(61, 4, 'Peik', 'Eight', 'assets/images/phrases/numbers/numbers-9.png', 'assets/audio/numbers/peik-m.mp3', 'assets/audio/numbers/peik-f.mp3'),
(62, 4, 'Gao', 'Nine', 'assets/images/phrases/numbers/numbers-10.png', 'assets/audio/numbers/gau-m.mp3', 'assets/audio/numbers/gau-f.mp3'),
(63, 4, 'Chap', 'Ten', 'assets/images/phrases/numbers/numbers-11.png', 'assets/audio/numbers/chap-m.mp3', 'assets/audio/numbers/chap-f.mp3'),
(64, 4, 'Chap it', 'Eleven', 'assets/images/phrases/numbers/numbers-12.png', 'assets/audio/numbers/chapit-m.mp3', 'assets/audio/numbers/chapit-f.mp3'),
(65, 4, 'Chap G', 'Twelve', 'assets/images/phrases/numbers/numbers-13.png', 'assets/audio/numbers/chapg-m.mp3', 'assets/audio/numbers/chapg-f.mp3'),
(66, 4, 'Chap sar', 'Thirteen', 'assets/images/phrases/numbers/numbers-14.png', 'assets/audio/numbers/chapsna-m.mp3', 'assets/audio/numbers/chapsna-f.mp3'),
(67, 4, 'Chap C', 'Fourteen', 'assets/images/phrases/numbers/numbers-15.png', 'assets/audio/numbers/chapc-m.mp3', 'assets/audio/numbers/chapc-f.mp3'),
(68, 4, 'Chap goh', 'Fifteen', 'assets/images/phrases/numbers/numbers-16.png', 'assets/audio/numbers/chapgoh-m.mp3', 'assets/audio/numbers/chapgoh-f.mp3'),
(69, 4, 'Chap luck', 'Sixteen', 'assets/images/phrases/numbers/numbers-17.png', 'assets/audio/numbers/chapluck-m.mp3', 'assets/audio/numbers/chapluck-f.mp3'),
(70, 4, 'Chap chit', 'Seventeen', 'assets/images/phrases/numbers/numbers-18.png', 'assets/audio/numbers/chapchit-m.mp3', 'assets/audio/numbers/chapchit-f.mp3'),
(71, 4, 'Chap peik', 'Eighteen', 'assets/images/phrases/numbers/numbers-19.png', 'assets/audio/numbers/chappeik-m.mp3', 'assets/audio/numbers/chappeik-f.mp3'),
(72, 4, 'Chap gao', 'Nineteen', 'assets/images/phrases/numbers/numbers-20.png', 'assets/audio/numbers/chapgau-m.mp3', 'assets/audio/numbers/chapgau-f.mp3'),
(73, 4, 'G chap', 'Twenty', 'assets/images/phrases/numbers/numbers-21.png', 'assets/audio/numbers/gchap-m.mp3', 'assets/audio/numbers/gchap-f.mp3'),
(74, 4, 'Sar chap', 'Thirty', 'assets/images/phrases/numbers/numbers-22.png', 'assets/audio/numbers/snachap-m.mp3', 'assets/audio/numbers/snachap-f.mp3'),
(75, 4, 'C chap', 'Forty', 'assets/images/phrases/numbers/numbers-23.png', 'assets/audio/numbers/cchap-m.mp3', 'assets/audio/numbers/cchap-f.mp3'),
(76, 4, 'Goh chap', 'Fifty', 'assets/images/phrases/numbers/numbers-24.png', 'assets/audio/numbers/gohchap-m.mp3', 'assets/audio/numbers/gohchap-f.mp3'),
(77, 4, 'Luck chap', 'Sixty', 'assets/images/phrases/numbers/numbers-25.png', 'assets/audio/numbers/luckchap-m.mp3', 'assets/audio/numbers/luckchap-f.mp3'),
(78, 4, 'Chit chap', 'Seventy', 'assets/images/phrases/numbers/numbers-26.png', 'assets/audio/numbers/chitchap-m.mp3', 'assets/audio/numbers/chitchap-f.mp3'),
(79, 4, 'Peik chap', 'Eighty', 'assets/images/phrases/numbers/numbers-27.png', 'assets/audio/numbers/peikchap-m.mp3', 'assets/audio/numbers/peikchap-f.mp3'),
(80, 4, 'Gao chap', 'Ninety', 'assets/images/phrases/numbers/numbers-28.png', 'assets/audio/numbers/gauchap-m.mp3', 'assets/audio/numbers/gauchap-f.mp3'),
(81, 4, 'Jit pak', 'One hundred', 'assets/images/phrases/numbers/numbers-29.png', 'assets/audio/numbers/jitpak-m.mp3', 'assets/audio/numbers/jitpak-f.mp3'),
(82, 4, 'Jit pak kong it', 'One hundred and one', 'assets/images/phrases/numbers/numbers-30.png', 'assets/audio/numbers/jitpakkongit-m.mp3', 'assets/audio/numbers/jitpakkongit-f.mp3'),
(83, 4, 'Jit pak kong G', 'One hundred and two', 'assets/images/phrases/numbers/numbers-31.png', 'assets/audio/numbers/jitpakkongg-m.mp3', 'assets/audio/numbers/jitpakkongg-f.mp3'),
(84, 4, 'Jit cheng', 'One thousand', 'assets/images/phrases/numbers/numbers-32.png', 'assets/audio/numbers/jitcheng-m.mp3', 'assets/audio/numbers/jitcheng-f.mp3'),
(85, 4, 'Noh cheng', 'Two thousand', 'assets/images/phrases/numbers/numbers-33.png', 'assets/audio/numbers/nohcheng-m.mp3', 'assets/audio/numbers/nohcheng-f.mp3'),
(86, 4, 'Chap cheng', 'Ten thousand', 'assets/images/phrases/numbers/numbers-34.png', 'assets/audio/numbers/chapcheng-m.mp3', 'assets/audio/numbers/chapcheng-f.mp3'),
(87, 4, 'Jit pak cheng', 'One hundred thousand', 'assets/images/phrases/numbers/numbers-35.png', 'assets/audio/numbers/jitpakcheng-m.mp3', 'assets/audio/numbers/jitpakcheng-f.mp3'),
(88, 4, 'Jit pak bahn', 'One million', 'assets/images/phrases/numbers/numbers-36.png', 'assets/audio/numbers/jitpakbahn-m.mp3', 'assets/audio/numbers/jitpakbahn-f.mp3'),
(89, 5, 'Wa boh…', 'I do not…', '', 'assets/audio/actions/waboh-m.mp3', 'assets/audio/actions/waboh-f.mp3'),
(90, 5, 'Wa oo…', 'I do…', '', 'assets/audio/actions/waoo-m.mp3', 'assets/audio/actions/waoo-f.mp3'),
(91, 5, 'Chiak', 'Eat', 'assets/images/phrases/actions/actions-3.jpg', 'assets/audio/actions/chiak-m.mp3', 'assets/audio/actions/chiak-f.mp3'),
(92, 5, 'Lim', 'Drink', 'assets/images/phrases/actions/actions-4.jpg', 'assets/audio/actions/lim-m.mp3', 'assets/audio/actions/lim-f.mp3'),
(93, 5, 'Khoon', 'Sleep', 'assets/images/phrases/actions/actions-5.jpg', 'assets/audio/actions/khoon-m.mp3', 'assets/audio/actions/khoon-f.mp3'),
(94, 5, 'Cheeo', 'Smile', 'assets/images/phrases/actions/actions-6.jpg', 'assets/audio/actions/cheeo-m.mp3', 'assets/audio/actions/cheeo-f.mp3'),
(95, 5, 'Seah ji', 'Write', 'assets/images/phrases/actions/actions-7.jpg', 'assets/audio/actions/seahji-m.mp3', 'assets/audio/actions/seahji-f.mp3'),
(96, 5, 'Thak', 'Read', 'assets/images/phrases/actions/actions-8.jpg', 'assets/audio/actions/thak-m.mp3', 'assets/audio/actions/thak-f.mp3'),
(97, 5, 'Co kang', 'Work', 'assets/images/phrases/actions/actions-9.jpg', 'assets/audio/actions/cokang-m.mp3', 'assets/audio/actions/cokang-f.mp3'),
(98, 5, 'Ki to', 'Pray', 'assets/images/phrases/actions/actions-10.jpg', 'assets/audio/actions/kito-m.mp3', 'assets/audio/actions/kito-f.mp3'),
(99, 5, 'Kong', 'Talk', 'assets/images/phrases/actions/actions-11.jpg', 'assets/audio/actions/kong-m.mp3', 'assets/audio/actions/kong-f.mp3'),
(100, 5, 'Khua', 'See', 'assets/images/phrases/actions/actions-12.jpg', 'assets/audio/actions/khua-m.mp3', 'assets/audio/actions/khua-f.mp3'),
(101, 5, 'Khia', 'Stand', 'assets/images/phrases/actions/actions-13.jpg', 'assets/audio/actions/kia-m.mp3', 'assets/audio/actions/kia-f.mp3'),
(102, 5, 'Che', 'Sit', 'assets/images/phrases/actions/actions-14.jpg', 'assets/audio/actions/che-m.mp3', 'assets/audio/actions/che-f.mp3'),
(103, 5, 'Khee', 'Go', 'assets/images/phrases/actions/actions-15.jpg', 'assets/audio/actions/khee-m.mp3', 'assets/audio/actions/khee-f.mp3'),
(104, 5, 'Choey', 'Find', 'assets/images/phrases/actions/actions-16.jpg', 'assets/audio/actions/choey-m.mp3', 'assets/audio/actions/choey-f.mp3'),
(105, 6, 'Ha mik', 'What', '', 'assets/audio/questions/hamik-m.mp3', 'assets/audio/questions/hamik-f.mp3'),
(106, 6, 'Ha mik su', 'Why', '', 'assets/audio/questions/hamiksu-m.mp3', 'assets/audio/questions/hamiksu-f.mp3'),
(107, 6, 'An chnua', 'How', '', 'assets/audio/questions/anchua-m.mp3', 'assets/audio/questions/anchua-f.mp3'),
(108, 6, 'Tee see', 'When', '', 'assets/audio/questions/teesee-m.mp3', 'assets/audio/questions/teesee-f.mp3'),
(109, 6, 'Ta lok', 'Where', '', 'assets/audio/questions/talok-m.mp3', 'assets/audio/questions/talok-f.mp3'),
(110, 6, 'Chooi chooi', 'Who', '', 'assets/audio/questions/chooichooi-m.mp3', 'assets/audio/questions/chooichooi-f.mp3'),
(111, 6, 'Chooi chooi A', 'Whose', '', 'assets/audio/questions/chooichooia-m.mp3', 'assets/audio/questions/chooichooia-f.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `phrase_categories`
--

CREATE TABLE `phrase_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phrase_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phrase_category_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phrase_category_image_cover` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phrase_categories`
--

INSERT INTO `phrase_categories` (`id`, `phrase_category_name`, `phrase_category_description`, `phrase_category_image_cover`) VALUES
(1, 'Basics', 'Get the essentials', 'assets/images/phraseCategory/basics.jpg'),
(2, 'Food', 'Eat when you are hungry', 'assets/images/phraseCategory/food.jpg'),
(3, 'Drinks', 'Thirsty? Grab a drink!', 'assets/images/phraseCategory/drink.jpg'),
(4, 'Numbers', 'You can count on me like 123', 'assets/images/phraseCategory/numbers.jpg'),
(5, 'Actions', 'All the actions you do daily.', 'assets/images/phraseCategory/action.jpg'),
(6, 'Questions', 'The more you ask, the more curious you are.', 'assets/images/phraseCategory/questions.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` enum('answer1','answer2','answer3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phrase_category_id` bigint(20) UNSIGNED NOT NULL,
  `answer1` bigint(20) UNSIGNED NOT NULL,
  `answer2` bigint(20) UNSIGNED NOT NULL,
  `answer3` bigint(20) UNSIGNED NOT NULL,
  `question` bigint(20) UNSIGNED NOT NULL,
  `correct_answer` enum('answer1','answer2','answer3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `phrase_category_id`, `answer1`, `answer2`, `answer3`, `question`, `correct_answer`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 2, 1, 'answer1', '2022-10-23 15:07:12', '2022-10-23 15:07:12'),
(2, 1, 11, 12, 10, 12, 'answer2', '2022-10-23 15:15:10', '2022-10-23 15:15:10'),
(3, 1, 19, 4, 2, 2, 'answer2', '2022-10-23 16:16:20', '2022-10-23 16:16:20'),
(4, 1, 11, 3, 5, 3, 'answer2', '2022-10-23 16:21:35', '2022-10-23 16:21:35'),
(5, 1, 11, 15, 10, 11, 'answer1', '2022-10-23 16:22:36', '2022-10-23 16:22:36'),
(6, 1, 10, 11, 12, 10, 'answer1', '2022-10-23 16:24:17', '2022-10-23 16:24:17'),
(7, 1, 23, 19, 4, 4, 'answer3', '2022-10-23 16:27:54', '2022-10-23 16:27:54'),
(8, 1, 16, 23, 17, 16, 'answer1', '2022-10-23 16:29:29', '2022-10-23 16:29:29'),
(9, 1, 12, 21, 20, 21, 'answer2', '2022-10-23 16:40:49', '2022-10-23 16:40:49'),
(10, 1, 21, 12, 20, 20, 'answer3', '2022-10-23 16:41:14', '2022-10-23 16:41:14'),
(11, 1, 16, 17, 18, 18, 'answer3', '2022-10-23 16:41:14', '2022-10-23 16:41:14'),
(12, 2, 25, 26, 24, 24, 'answer3', '2022-10-23 16:48:25', '2022-10-23 16:48:25'),
(13, 1, 13, 5, 3, 5, 'answer2', '2022-10-24 02:59:36', '2022-10-24 02:59:36'),
(14, 1, 8, 18, 9, 8, 'answer1', '2022-10-24 03:01:55', '2022-10-24 03:01:55'),
(15, 1, 13, 12, 4, 13, 'answer1', '2022-10-24 03:05:26', '2022-10-24 03:05:26'),
(16, 1, 3, 5, 14, 14, 'answer3', '2022-10-24 03:05:26', '2022-10-24 03:05:26'),
(17, 1, 22, 15, 14, 15, 'answer2', '2022-10-24 03:07:46', '2022-10-24 03:07:46'),
(18, 1, 16, 22, 17, 17, 'answer3', '2022-10-24 03:07:46', '2022-10-24 03:07:46'),
(19, 1, 17, 19, 20, 19, 'answer2', '2022-10-24 03:10:25', '2022-10-24 03:10:25'),
(20, 1, 22, 3, 23, 22, 'answer1', '2022-10-24 03:10:25', '2022-10-24 03:10:25'),
(21, 1, 22, 23, 18, 23, 'answer2', '2022-10-24 03:13:09', '2022-10-24 03:13:09'),
(22, 2, 26, 34, 25, 25, 'answer3', '2022-10-24 03:17:16', '2022-10-24 03:17:16'),
(23, 2, 31, 28, 26, 26, 'answer3', '2022-10-24 03:17:16', '2022-10-24 03:17:16'),
(24, 2, 32, 27, 24, 27, 'answer2', '2022-10-24 03:17:16', '2022-10-24 03:17:16'),
(25, 2, 28, 33, 27, 28, 'answer1', '2022-10-24 03:17:16', '2022-10-24 03:17:16'),
(26, 2, 33, 29, 28, 29, 'answer2', '2022-10-24 03:17:16', '2022-10-24 03:17:16'),
(27, 2, 31, 30, 28, 30, 'answer2', '2022-10-24 03:23:13', '2022-10-24 03:23:13'),
(28, 2, 30, 31, 32, 31, 'answer2', '2022-10-24 03:23:13', '2022-10-24 03:23:13'),
(29, 2, 33, 27, 32, 32, 'answer3', '2022-10-24 03:23:13', '2022-10-24 03:23:13'),
(30, 2, 25, 33, 34, 33, 'answer2', '2022-10-24 03:23:13', '2022-10-24 03:23:13'),
(31, 2, 26, 28, 34, 34, 'answer3', '2022-10-24 03:29:08', '2022-10-24 03:29:08'),
(32, 6, 105, 111, 106, 105, 'answer1', '2022-10-24 03:29:08', '2022-10-24 03:29:08'),
(33, 6, 110, 107, 106, 106, 'answer3', '2022-10-24 03:29:08', '2022-10-24 03:29:08'),
(34, 6, 105, 107, 109, 107, 'answer2', '2022-10-24 03:29:08', '2022-10-24 03:29:08'),
(35, 6, 108, 107, 105, 108, 'answer1', '2022-10-24 03:29:08', '2022-10-24 03:29:08'),
(36, 6, 107, 108, 109, 109, 'answer3', '2022-10-24 03:35:12', '2022-10-24 03:35:12'),
(37, 6, 105, 110, 111, 110, 'answer2', '2022-10-24 03:35:12', '2022-10-24 03:35:12'),
(38, 6, 111, 110, 106, 111, 'answer1', '2022-10-24 03:35:12', '2022-10-24 03:35:12'),
(39, 5, 90, 89, 104, 89, 'answer2', '2022-10-24 03:35:12', '2022-10-24 03:35:12'),
(40, 5, 90, 96, 89, 90, 'answer1', '2022-10-24 03:39:21', '2022-10-24 03:39:21'),
(41, 5, 100, 91, 102, 91, 'answer2', '2022-10-24 03:39:21', '2022-10-24 03:39:21'),
(42, 5, 91, 92, 98, 92, 'answer2', '2022-10-24 03:44:14', '2022-10-24 03:44:14'),
(43, 5, 103, 97, 93, 93, 'answer3', '2022-10-24 03:39:21', '2022-10-24 03:39:21'),
(44, 5, 94, 102, 104, 94, 'answer1', '2022-10-24 03:39:21', '2022-10-24 03:39:21'),
(45, 5, 97, 93, 95, 95, 'answer3', '2022-10-24 03:45:34', '2022-10-24 03:45:34'),
(46, 5, 99, 96, 98, 96, 'answer2', '2022-10-24 03:45:34', '2022-10-24 03:45:34'),
(47, 5, 97, 98, 95, 97, 'answer1', '2022-10-24 03:45:34', '2022-10-24 03:45:34'),
(48, 5, 95, 101, 98, 98, 'answer3', '2022-10-24 03:45:34', '2022-10-24 03:45:34'),
(49, 5, 97, 102, 99, 99, 'answer3', '2022-10-24 03:45:34', '2022-10-24 03:45:34'),
(50, 5, 100, 104, 94, 100, 'answer1', '2022-10-24 03:45:34', '2022-10-24 03:45:34'),
(51, 5, 103, 101, 97, 101, 'answer2', '2022-10-24 03:50:31', '2022-10-24 03:50:31'),
(52, 5, 101, 103, 102, 102, 'answer3', '2022-10-24 03:50:31', '2022-10-24 03:50:31'),
(53, 5, 93, 96, 104, 104, 'answer3', '2022-10-24 03:50:31', '2022-10-24 03:50:31'),
(54, 3, 49, 35, 36, 35, 'answer2', '2022-10-24 03:54:00', '2022-10-24 03:54:00'),
(55, 3, 36, 35, 40, 36, 'answer1', '2022-10-24 03:54:00', '2022-10-24 03:54:00'),
(56, 3, 38, 50, 39, 38, 'answer1', '2022-10-24 03:54:00', '2022-10-24 03:54:00'),
(57, 3, 40, 38, 39, 39, 'answer3', '2022-10-24 03:54:00', '2022-10-24 03:54:00'),
(58, 3, 40, 49, 38, 40, 'answer1', '2022-10-24 03:54:00', '2022-10-24 03:54:00'),
(59, 3, 41, 45, 39, 41, 'answer1', '2022-10-24 03:58:31', '2022-10-24 03:58:31'),
(60, 3, 41, 42, 43, 42, 'answer2', '2022-10-24 03:58:31', '2022-10-24 03:58:31'),
(61, 3, 45, 42, 43, 43, 'answer3', '2022-10-24 03:58:31', '2022-10-24 03:58:31'),
(62, 3, 50, 45, 43, 45, 'answer2', '2022-10-24 04:04:59', '2022-10-24 04:04:59'),
(63, 3, 50, 40, 49, 49, 'answer3', '2022-10-24 03:58:31', '2022-10-24 03:58:31'),
(64, 3, 49, 50, 41, 50, 'answer2', '2022-10-24 03:58:31', '2022-10-24 03:58:31'),
(65, 4, 53, 57, 51, 51, 'answer3', '2022-10-24 04:45:58', '2022-10-24 04:45:58'),
(66, 4, 52, 60, 54, 52, 'answer1', '2022-10-24 04:45:58', '2022-10-24 04:45:58'),
(67, 4, 52, 55, 53, 53, 'answer3', '2022-10-24 04:45:58', '2022-10-24 04:45:58'),
(68, 4, 55, 54, 51, 54, 'answer2', '2022-10-24 04:45:58', '2022-10-24 04:45:58'),
(69, 4, 55, 53, 54, 55, 'answer1', '2022-10-24 04:45:58', '2022-10-24 04:45:58'),
(70, 4, 56, 58, 53, 56, 'answer1', '2022-10-24 04:52:09', '2022-10-24 04:52:09'),
(71, 4, 63, 57, 56, 57, 'answer2', '2022-10-24 04:52:09', '2022-10-24 04:52:09'),
(72, 4, 51, 62, 58, 58, 'answer3', '2022-10-24 04:52:09', '2022-10-24 04:52:09'),
(73, 4, 59, 62, 63, 59, 'answer1', '2022-10-24 04:52:09', '2022-10-24 04:52:09'),
(74, 4, 60, 61, 55, 60, 'answer1', '2022-10-24 04:52:09', '2022-10-24 04:52:09'),
(75, 4, 60, 61, 62, 61, 'answer2', '2022-10-24 04:57:30', '2022-10-24 04:57:30'),
(76, 4, 63, 59, 62, 62, 'answer3', '2022-10-24 04:57:30', '2022-10-24 04:57:30'),
(77, 4, 81, 63, 86, 63, 'answer2', '2022-10-24 04:57:30', '2022-10-24 04:57:30'),
(78, 4, 52, 82, 64, 64, 'answer3', '2022-10-24 04:57:30', '2022-10-24 04:57:30'),
(79, 4, 83, 54, 65, 65, 'answer3', '2022-10-24 04:57:30', '2022-10-24 04:57:30'),
(80, 4, 74, 56, 66, 66, 'answer3', '2022-10-24 05:03:57', '2022-10-24 05:03:57'),
(81, 4, 67, 75, 57, 67, 'answer1', '2022-10-25 06:51:56', '2022-10-25 06:51:56'),
(82, 4, 4, 68, 76, 68, 'answer2', '2022-10-24 05:03:57', '2022-10-24 05:03:57'),
(83, 4, 69, 77, 68, 69, 'answer1', '2022-10-24 05:03:57', '2022-10-24 05:03:57'),
(84, 4, 63, 70, 78, 70, 'answer2', '2022-10-24 05:03:57', '2022-10-24 05:03:57'),
(85, 4, 61, 71, 79, 71, 'answer2', '2022-10-24 05:10:47', '2022-10-24 05:10:47'),
(86, 4, 62, 80, 72, 72, 'answer3', '2022-10-25 06:52:20', '2022-10-25 06:52:20'),
(87, 4, 73, 74, 54, 73, 'answer1', '2022-10-25 06:52:20', '2022-10-25 06:52:20'),
(88, 4, 65, 74, 66, 74, 'answer2', '2022-10-25 06:52:20', '2022-10-25 06:52:20'),
(89, 4, 75, 81, 57, 75, 'answer1', '2022-10-25 06:52:20', '2022-10-25 06:52:20'),
(90, 4, 68, 76, 74, 76, 'answer2', '2022-10-25 06:57:52', '2022-10-25 06:57:52'),
(91, 4, 76, 59, 77, 77, 'answer3', '2022-10-25 06:58:40', '2022-10-25 06:58:40'),
(92, 4, 60, 53, 78, 78, 'answer3', NULL, NULL),
(93, 4, 79, 78, 61, 79, 'answer1', '2022-10-25 06:58:40', '2022-10-25 06:58:40'),
(94, 4, 72, 80, 79, 80, 'answer2', NULL, NULL),
(95, 4, 81, 88, 87, 81, 'answer1', '2022-10-25 06:58:40', '2022-10-25 06:58:40'),
(96, 4, 88, 64, 82, 82, 'answer3', '2022-10-25 06:58:40', '2022-10-25 06:58:40'),
(97, 4, 60, 83, 82, 83, 'answer2', '2022-10-25 07:03:11', '2022-10-25 07:03:11'),
(98, 4, 84, 81, 53, 84, 'answer1', '2022-10-25 07:03:11', '2022-10-25 07:03:11'),
(99, 4, 54, 83, 85, 85, 'answer3', '2022-10-25 07:03:11', '2022-10-25 07:03:11'),
(100, 4, 64, 86, 87, 86, 'answer2', '2022-10-25 07:03:11', '2022-10-25 07:03:11'),
(101, 4, 87, 88, 81, 87, 'answer1', '2022-10-25 07:03:11', '2022-10-25 07:03:11'),
(102, 4, 87, 88, 51, 88, 'answer2', '2022-10-25 07:07:06', '2022-10-25 07:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phrase_category_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `wrong_answers` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE `upvotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mem_aid_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` longtext COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `amount_of_logins` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`, `last_login`, `amount_of_logins`) VALUES
(12, 'Tester', 'tester', 'penanghokkien303@gmail.com', '2022-11-24 15:26:28', '$2y$10$doulvi/NuWElvpTWehSh/OwjXvvRWOxWBpLgu6EPeu1H0qiDjm7y.', NULL, '2022-11-24 15:25:39', '2022-11-24 15:26:58', NULL, '2022-11-24 15:26:58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_otps`
--
ALTER TABLE `email_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_phrase_id_foreign` (`phrase_id`);

--
-- Indexes for table `mem_aids`
--
ALTER TABLE `mem_aids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mem_aids_phrase_id_foreign` (`phrase_id`),
  ADD KEY `mem_aids_user_id_foreign` (`user_id`);

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
-- Indexes for table `phrases`
--
ALTER TABLE `phrases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phrases_phrase_category_id_foreign` (`phrase_category_id`);

--
-- Indexes for table `phrase_categories`
--
ALTER TABLE `phrase_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_answers_user_id_foreign` (`user_id`),
  ADD KEY `quiz_answers_quiz_question_id_foreign` (`quiz_question_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_questions_phrase_category_id_foreign` (`phrase_category_id`),
  ADD KEY `quiz_questions_answer1_foreign` (`answer1`),
  ADD KEY `quiz_questions_answer2_foreign` (`answer2`),
  ADD KEY `quiz_questions_answer3_foreign` (`answer3`),
  ADD KEY `quiz_questions_question_foreign` (`question`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_results_user_id_foreign` (`user_id`),
  ADD KEY `quiz_results_phrase_category_id_foreign` (`phrase_category_id`);

--
-- Indexes for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upvotes_user_id_foreign` (`user_id`),
  ADD KEY `upvotes_mem_aid_id_foreign` (`mem_aid_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_otps`
--
ALTER TABLE `email_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mem_aids`
--
ALTER TABLE `mem_aids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phrases`
--
ALTER TABLE `phrases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `phrase_categories`
--
ALTER TABLE `phrase_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `upvotes`
--
ALTER TABLE `upvotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `email_otps`
--
ALTER TABLE `email_otps`
  ADD CONSTRAINT `email_otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_phrase_id_foreign` FOREIGN KEY (`phrase_id`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mem_aids`
--
ALTER TABLE `mem_aids`
  ADD CONSTRAINT `mem_aids_phrase_id_foreign` FOREIGN KEY (`phrase_id`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mem_aids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phrases`
--
ALTER TABLE `phrases`
  ADD CONSTRAINT `phrases_phrase_category_id_foreign` FOREIGN KEY (`phrase_category_id`) REFERENCES `phrase_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `quiz_answers_quiz_question_id_foreign` FOREIGN KEY (`quiz_question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_answer1_foreign` FOREIGN KEY (`answer1`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_answer2_foreign` FOREIGN KEY (`answer2`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_answer3_foreign` FOREIGN KEY (`answer3`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_phrase_category_id_foreign` FOREIGN KEY (`phrase_category_id`) REFERENCES `phrase_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_question_foreign` FOREIGN KEY (`question`) REFERENCES `phrases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_phrase_category_id_foreign` FOREIGN KEY (`phrase_category_id`) REFERENCES `phrase_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD CONSTRAINT `upvotes_mem_aid_id_foreign` FOREIGN KEY (`mem_aid_id`) REFERENCES `mem_aids` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upvotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
