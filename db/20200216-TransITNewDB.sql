-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Feb 16, 2020 at 10:40 AM
-- Server version: 10.3.18-MariaDB-1:10.3.18+maria~bionic
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps_docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(765) DEFAULT NULL,
  `slug` varchar(765) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `document` varchar(300) DEFAULT NULL,
  `issn` varchar(50) DEFAULT NULL,
  `doi` varchar(50) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `pub_id`, `title`, `slug`, `author`, `abstract`, `keywords`, `document`, `issn`, `doi`, `viewed`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 2, 'Test Update 23', 'test-update-23', 'TEst Updateeee', 'Update Coba Update LAgi', 'asd', 'uploads/article/VOL12-NO1-MARCH-2019/Scan_0002.pdf', 'asd', 'asda', NULL, 1580110054, 1580134933, 6, 6),
(3, 2, 'Test 3 update file2', 'test-3-update-file2', 'Author 3asd', 'Abstract 3asda', 'Key 36', 'uploads/article/VOL12-NO1-MARCH-2019/Doc1.docx', 'asdas', 'asd', NULL, 1580110892, 1580134894, 6, 6),
(4, 3, 'Title As Slugable', 'title-as-slugable', 'asd', 'asd', 'sdaf', 'uploads/article/VOL12-NO2-APRIL-2019/Doc1.docx', 'asd', 'asd', NULL, 1580134764, 1580134862, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrator', '6', 1580089225),
('Mahasiswa', '10', 1575732317),
('Mahasiswa', '11', 1578753319),
('Mahasiswa', '12', 1578753702),
('Mahasiswa', '13', 1579601809),
('Mahasiswa', '14', 1579607057),
('Mahasiswa', '15', 1579607290),
('Mahasiswa', '16', 1579607943),
('Mahasiswa', '17', 1579608445),
('Mahasiswa', '18', 1579608516),
('Mahasiswa', '19', 1579608585),
('Mahasiswa', '20', 1579614378),
('Mahasiswa', '21', 1579614771),
('Mahasiswa', '5', 1578752498),
('Mahasiswa', '9', 1575732084),
('Sysadmin', '22', 1580089191);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1575252332, 1575252332),
('/article/*', 2, NULL, NULL, NULL, 1580099648, 1580099648),
('/jurnal/*', 2, NULL, NULL, NULL, 1579616422, 1579616422),
('/mimin/*', 2, NULL, NULL, NULL, 1576937642, 1576937642),
('/mimin/role/*', 2, NULL, NULL, NULL, 1576937642, 1576937642),
('/mimin/route/*', 2, NULL, NULL, NULL, 1576937643, 1576937643),
('/mimin/user/*', 2, NULL, NULL, NULL, 1576937644, 1576937644),
('/pembimbing/*', 2, NULL, NULL, NULL, 1580089450, 1580089450),
('/publication/*', 2, NULL, NULL, NULL, 1580090035, 1580090035),
('/register-jurnal/*', 2, NULL, NULL, NULL, 1578752455, 1578752455),
('/report/*', 2, NULL, NULL, NULL, 1580216952, 1580216952),
('/site/*', 2, NULL, NULL, NULL, 1576937644, 1576937644),
('/user/*', 2, NULL, NULL, NULL, 1576937645, 1576937645),
('/user/Admin/*', 2, NULL, NULL, NULL, 1576937646, 1576937646),
('/user/Admin/update', 2, NULL, NULL, NULL, 1576937647, 1576937647),
('/user/profile/*', 2, NULL, NULL, NULL, 1576937650, 1576937650),
('/user/Recovery/*', 2, NULL, NULL, NULL, 1576937650, 1576937650),
('/user/Registration/*', 2, NULL, NULL, NULL, 1576937652, 1576937652),
('/user/security/*', 2, NULL, NULL, NULL, 1576937653, 1576937653),
('/user/settings/*', 2, NULL, NULL, NULL, 1576937653, 1576937653),
('/user/settings/account', 2, NULL, NULL, NULL, 1579615765, 1579615765),
('/user/settings/profile', 2, NULL, NULL, NULL, 1579615762, 1579615762),
('Administrator', 1, NULL, NULL, NULL, 1575720751, 1580099654),
('Mahasiswa', 1, NULL, NULL, NULL, 1575720787, 1579616452),
('Pembimbing', 1, NULL, NULL, NULL, 1575720814, 1575725833),
('Sysadmin', 1, NULL, NULL, NULL, 1575252260, 1575252337);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrator', '/article/*'),
('Administrator', '/jurnal/*'),
('Administrator', '/mimin/*'),
('Administrator', '/mimin/role/*'),
('Administrator', '/mimin/route/*'),
('Administrator', '/mimin/user/*'),
('Administrator', '/pembimbing/*'),
('Administrator', '/publication/*'),
('Administrator', '/report/*'),
('Administrator', '/site/*'),
('Administrator', '/user/*'),
('Administrator', '/user/Admin/*'),
('Administrator', '/user/profile/*'),
('Administrator', '/user/Recovery/*'),
('Administrator', '/user/Registration/*'),
('Administrator', '/user/security/*'),
('Administrator', '/user/settings/*'),
('Mahasiswa', '/register-jurnal/*'),
('Mahasiswa', '/user/profile/*'),
('Mahasiswa', '/user/settings/account'),
('Mahasiswa', '/user/settings/profile'),
('Pembimbing', '/*'),
('Sysadmin', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_number`
--

CREATE TABLE `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `optimistic_lock` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`) VALUES
('2020????', 10, 1, 1580051042);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `jurnal` varchar(255) DEFAULT NULL,
  `abstrak` text DEFAULT NULL,
  `upload_ke` int(5) DEFAULT 0,
  `tgl_upload` datetime DEFAULT NULL,
  `pembimbing_1` int(5) DEFAULT NULL,
  `pembimbing_2` int(5) DEFAULT NULL,
  `nourutjurnal` varchar(8) DEFAULT '00000000',
  `nojurnal` varchar(8) DEFAULT NULL,
  `vol` varchar(8) DEFAULT NULL,
  `tgl_jurnal` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `user_id`, `judul`, `jurnal`, `abstrak`, `upload_ke`, `tgl_upload`, `pembimbing_1`, `pembimbing_2`, `nourutjurnal`, `nojurnal`, `vol`, `tgl_jurnal`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 21, 'RANCANG BANGUN ADAPTIVE LIGHTING MENGGUNAKAN ARDUINO DENGAN KONTROL ANDROID', 'uploads/pre-journal/G.211.13.0047/Doc1.docx', 'In the daily life of each person can not be separated from light to perform various activities in the room But the light in the room should be customized to the needs of each activity to avoid wasting electricity For that we need to save the energy of lighting system Usually the setting of the lighting use on-off method, where the lamps only work in two conditions, there are the lamps will on or off The setting of lighting with on-off method only work in room conditions, dark or bright without minding contribution of the light from the outside It caused the energy being? waste and not efficient. From that consideration, the writer create the lighting system room so the light can adjust the needs of the lighting according to the desired light intensity of the room The lamps will dim and or get brighter when the light sensor (LDR) detect the light in the room so that it makes the lighting of the lamp can be the same as we wanted. Arduino Uno R3 used as a control device with an Ethernet shield as communication media between smartphones and microcontrollers. The purpose of this research is to build an efficient lighting control system practical, according to the needs and equipped with the optimization of the lighting control based on efficiency and standard of room lightning SNI 03- 197-20 0. This system was designed practically that controlled remotely using a smartphone android device With created this system the writer hopes can save the energy of electricity and can meet the comfort factor and health of human vision on the lighting of the room.\r\n\r\n \r\nKeywords: The lighting system the light sensor (LDR), Arduino Uno R3, Android', 16, '2020-01-26 22:04:27', 1, NULL, '20200010', NULL, NULL, NULL, 21, 21, 1579652468, 1580054326);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1571582811),
('m140209_132017_init', 1571582814),
('m140403_174025_create_account_table', 1571582814),
('m140504_113157_update_tables', 1571582814),
('m140504_130429_create_token_table', 1571582814),
('m140506_102106_rbac_init', 1575252028),
('m140527_084418_auto_number', 1580048424),
('m140830_171933_fix_ip_field', 1571582814),
('m140830_172703_change_account_table_name', 1571582814),
('m141222_110026_update_ip_field', 1571582814),
('m141222_135246_alter_username_length', 1571582814),
('m150614_103145_update_social_account_table', 1571582815),
('m150623_212711_fix_username_notnull', 1571582815),
('m151024_072453_create_route_table', 1575252047),
('m151218_234654_add_timezone_to_profile', 1571582815),
('m160929_103127_add_last_login_at_to_user_table', 1571582815),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1575252028),
('m180523_151638_rbac_updates_indexes_without_prefix', 1575252028);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` int(5) NOT NULL,
  `pembimbing` varchar(200) DEFAULT NULL,
  `status_active` int(2) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `pembimbing`, `status_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Vensy Vydia', 10, 1578270923, 1578270923, 6, 6),
(2, 'Whisnumurti Adhiwibowo', 10, 1578275720, 1578275720, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `nim`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(6, 'System Administrator', 'G.211.13.0047', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'Pacific/Apia'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Agus Edy C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `vol` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `month_pub` int(11) DEFAULT NULL,
  `years_pub` int(11) DEFAULT NULL,
  `file_cover` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`id`, `vol`, `no`, `month_pub`, `years_pub`, `file_cover`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 12, 1, 3, 2019, 'uploads/article/VOL12-NO1-MARCH-2019/VOL12-NO1-MARCH-2019-cover.jpg', 1580093079, 1580422085, 6, 6),
(3, 12, 2, 4, 2019, NULL, 1580133609, 1580133609, 6, 6),
(4, 12, 3, 2, 2019, 'uploads/article/VOL12-NO3-FEBRUARY-2019/VOL12-NO3-FEBRUARY-2019-cover.jpg', 1580422528, 1580422528, 6, 6),
(5, 12, 4, 5, 2019, 'uploads/article/VOL12-NO4-MAY-2019/VOL12-NO4-MAY-2019-cover.jpg', 1580422687, 1580422741, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`name`, `alias`, `type`, `status`) VALUES
('/*', '*', '', 1),
('/article/*', '*', 'article', 1),
('/article/create', 'create', 'article', 1),
('/article/delete', 'delete', 'article', 1),
('/article/index', 'index', 'article', 1),
('/article/update', 'update', 'article', 1),
('/article/view', 'view', 'article', 1),
('/debug/*', '*', 'debug', 1),
('/debug/default/*', '*', 'debug/default', 1),
('/debug/default/db-explain', 'db-explain', 'debug/default', 1),
('/debug/default/download-mail', 'download-mail', 'debug/default', 1),
('/debug/default/index', 'index', 'debug/default', 1),
('/debug/default/toolbar', 'toolbar', 'debug/default', 1),
('/debug/default/view', 'view', 'debug/default', 1),
('/debug/user/*', '*', 'debug/user', 1),
('/debug/user/reset-identity', 'reset-identity', 'debug/user', 1),
('/debug/user/set-identity', 'set-identity', 'debug/user', 1),
('/gii/*', '*', 'gii', 1),
('/gii/default/*', '*', 'gii/default', 1),
('/gii/default/action', 'action', 'gii/default', 1),
('/gii/default/diff', 'diff', 'gii/default', 1),
('/gii/default/index', 'index', 'gii/default', 1),
('/gii/default/preview', 'preview', 'gii/default', 1),
('/gii/default/view', 'view', 'gii/default', 1),
('/jurnal/*', '*', 'jurnal', 1),
('/jurnal/create', 'create', 'jurnal', 1),
('/jurnal/delete', 'delete', 'jurnal', 1),
('/jurnal/index', 'index', 'jurnal', 1),
('/jurnal/update', 'update', 'jurnal', 1),
('/jurnal/view', 'view', 'jurnal', 1),
('/mimin/*', '*', 'mimin', 1),
('/mimin/role/*', '*', 'mimin/role', 1),
('/mimin/role/create', 'create', 'mimin/role', 1),
('/mimin/role/delete', 'delete', 'mimin/role', 1),
('/mimin/role/index', 'index', 'mimin/role', 1),
('/mimin/role/permission', 'permission', 'mimin/role', 1),
('/mimin/role/update', 'update', 'mimin/role', 1),
('/mimin/role/view', 'view', 'mimin/role', 1),
('/mimin/route/*', '*', 'mimin/route', 1),
('/mimin/route/create', 'create', 'mimin/route', 1),
('/mimin/route/delete', 'delete', 'mimin/route', 1),
('/mimin/route/generate', 'generate', 'mimin/route', 1),
('/mimin/route/index', 'index', 'mimin/route', 1),
('/mimin/route/update', 'update', 'mimin/route', 1),
('/mimin/route/view', 'view', 'mimin/route', 1),
('/mimin/user/*', '*', 'mimin/user', 1),
('/mimin/user/create', 'create', 'mimin/user', 1),
('/mimin/user/delete', 'delete', 'mimin/user', 1),
('/mimin/user/index', 'index', 'mimin/user', 1),
('/mimin/user/update', 'update', 'mimin/user', 1),
('/mimin/user/view', 'view', 'mimin/user', 1),
('/pembimbing/*', '*', 'pembimbing', 1),
('/pembimbing/create', 'create', 'pembimbing', 1),
('/pembimbing/delete', 'delete', 'pembimbing', 1),
('/pembimbing/index', 'index', 'pembimbing', 1),
('/pembimbing/update', 'update', 'pembimbing', 1),
('/pembimbing/view', 'view', 'pembimbing', 1),
('/publication/*', '*', 'publication', 1),
('/publication/create', 'create', 'publication', 1),
('/publication/delete', 'delete', 'publication', 1),
('/publication/index', 'index', 'publication', 1),
('/publication/update', 'update', 'publication', 1),
('/publication/view', 'view', 'publication', 1),
('/register-jurnal/*', '*', 'register-jurnal', 1),
('/register-jurnal/create', 'create', 'register-jurnal', 1),
('/register-jurnal/index', 'index', 'register-jurnal', 1),
('/register-jurnal/upload', 'upload', 'register-jurnal', 1),
('/report/*', '*', 'report', 1),
('/report/index', 'index', 'report', 1),
('/site/*', '*', 'site', 1),
('/site/about', 'about', 'site', 1),
('/site/captcha', 'captcha', 'site', 1),
('/site/contact', 'contact', 'site', 1),
('/site/error', 'error', 'site', 1),
('/site/index', 'index', 'site', 1),
('/site/login', 'login', 'site', 1),
('/site/logout', 'logout', 'site', 1),
('/user/*', '*', 'user', 1),
('/user/Admin/*', '*', 'user/Admin', 1),
('/user/Admin/assignments', 'assignments', 'user/Admin', 1),
('/user/Admin/block', 'block', 'user/Admin', 1),
('/user/Admin/confirm', 'confirm', 'user/Admin', 1),
('/user/Admin/create', 'create', 'user/Admin', 1),
('/user/Admin/delete', 'delete', 'user/Admin', 1),
('/user/Admin/index', 'index', 'user/Admin', 1),
('/user/Admin/info', 'info', 'user/Admin', 1),
('/user/Admin/resend-password', 'resend-password', 'user/Admin', 1),
('/user/Admin/switch', 'switch', 'user/Admin', 1),
('/user/Admin/update', 'update', 'user/Admin', 1),
('/user/Admin/update-profile', 'update-profile', 'user/Admin', 1),
('/user/profile/*', '*', 'user/profile', 1),
('/user/profile/index', 'index', 'user/profile', 1),
('/user/profile/show', 'show', 'user/profile', 1),
('/user/Recovery/*', '*', 'user/Recovery', 1),
('/user/Recovery/request', 'request', 'user/Recovery', 1),
('/user/Recovery/reset', 'reset', 'user/Recovery', 1),
('/user/Registration/*', '*', 'user/Registration', 1),
('/user/Registration/confirm', 'confirm', 'user/Registration', 1),
('/user/Registration/connect', 'connect', 'user/Registration', 1),
('/user/Registration/register', 'register', 'user/Registration', 1),
('/user/Registration/resend', 'resend', 'user/Registration', 1),
('/user/security/*', '*', 'user/security', 1),
('/user/security/auth', 'auth', 'user/security', 1),
('/user/security/login', 'login', 'user/security', 1),
('/user/security/logout', 'logout', 'user/security', 1),
('/user/settings/*', '*', 'user/settings', 1),
('/user/settings/account', 'account', 'user/settings', 1),
('/user/settings/confirm', 'confirm', 'user/settings', 1),
('/user/settings/delete', 'delete', 'user/settings', 1),
('/user/settings/disconnect', 'disconnect', 'user/settings', 1),
('/user/settings/networks', 'networks', 'user/settings', 1),
('/user/settings/profile', 'profile', 'user/settings', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(6, 'sysadmintransit', 'aguseasdasdyc@gmail.com', '$2y$10$tCuc/jO7/hlVciuw8Ve8R.g0IKMIDP8F2JrSKjqwqqCYUv0dci3SG', 'tsD6aTfCdBpgypkzj9aVK-C-dIlC6cAD', 1575250443, NULL, NULL, '172.18.0.1', 1575250443, 1575250443, 0, 1581230574),
(12, 'agusedyc', 'edyaguasdsc@gmail.com', '$2y$10$9LFKCQef3dCfqfhit/d7LOIvBRxjZRDYBKroqJlJePyVqbS4/6oTK', 'gCQRD8bPIkVlNpYzf66PrAbUdzeFFWb7', 1578753817, NULL, NULL, '172.18.0.1', 1578753699, 1578753699, 0, NULL),
(21, 'G.211.13.0047', 'edyagusc@gmail.com', '$2y$10$M8Ot.hZiquLHYkzjfk/V0edcc4HQpIZeKI366dMQRGpw08xdfVufq', 'xa0c6n2bFxHj23djc0pYQVYM-MupePHf', 1579614790, NULL, NULL, '172.18.0.1', 1579614767, 1579614767, 0, 1580305854),
(22, 'sysadminapp', 'transitftikusm@gmail.com', '$2y$10$vqXaiCfDth6m2ujCA09NROAGiKOoUl1m.TbuiApVE0qdCkvrmsmYW', 'dEiHFVXjbjEaTa1nN-2VOnJ3eRXFWloz', 1580088373, NULL, NULL, '172.18.0.1', 1580088373, 1580088373, 0, 1581230519);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_article_publication` (`pub_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auto_number`
--
ALTER TABLE `auto_number`
  ADD PRIMARY KEY (`group`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_publication` FOREIGN KEY (`pub_id`) REFERENCES `publication` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
