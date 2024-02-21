-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 10:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gbgc`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_orderdetails`
--

CREATE TABLE `additional_orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetaddress1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionaldetails` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_orderdetails`
--

INSERT INTO `additional_orderdetails` (`id`, `order_id`, `firstname`, `lastname`, `companyname`, `country`, `streetaddress`, `streetaddress1`, `city`, `postalcode`, `phone`, `email`, `additionaldetails`, `created_at`, `updated_at`) VALUES
(1, 1, 'loopcon', NULL, NULL, '0', NULL, NULL, NULL, NULL, '6767676767', 'loopcon@gmail.com', NULL, '2024-02-10 01:22:35', '2024-02-10 01:22:35'),
(2, 2, 'loopcon', NULL, NULL, '0', NULL, NULL, NULL, NULL, '6767676767', 'loopcon@gmail.com', NULL, '2024-02-10 01:25:15', '2024-02-10 01:25:15'),
(3, 3, 'loopcon', NULL, NULL, '0', NULL, NULL, NULL, NULL, '6767676767', 'loopcon@gmail.com', NULL, '2024-02-10 01:35:05', '2024-02-10 01:35:05'),
(4, 4, 'loopcon', NULL, NULL, '0', NULL, NULL, NULL, NULL, '6767676767', 'loopcon@gmail.com', NULL, '2024-02-21 01:32:35', '2024-02-21 01:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `additional_users`
--

CREATE TABLE `additional_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_users`
--

INSERT INTO `additional_users` (`id`, `customer_id`, `parent_id`, `name`, `job_title`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'test', 'test', '8569567458', 'test@gmail.com', '2024-02-10 01:24:32', '2024-02-10 01:24:32'),
(2, 3, 1, 'test', 'test', '8569567458', 'disha@gmail.com', '2024-02-10 01:35:01', '2024-02-10 01:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(23, 'loopcon16@gmail.com', 8968696969, 'fgfgfg', '2024-02-08 06:50:46', '2024-02-08 06:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Indian Rupee', 1, '2024-02-08 01:24:13', '2024-02-08 01:24:13'),
(2, 'US Dollar', 1, '2024-02-08 01:22:26', '2024-02-08 01:22:26'),
(3, 'Euro', 1, '2024-02-08 01:22:47', '2024-02-08 01:22:47'),
(4, 'British Pound', 1, '2024-02-08 01:23:30', '2024-02-08 01:23:30'),
(5, 'Japanese Yen', 1, '2024-02-08 01:23:41', '2024-02-08 01:23:41'),
(6, 'Chinese Yuan', 1, '2024-02-08 01:23:59', '2024-02-08 01:23:59'),
(8, 'test1221', 1, '2024-02-11 23:04:59', '2024-02-11 23:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussiness_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_wider_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT 'No=0,Yes=1',
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(12) DEFAULT NULL,
  `access_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'pending=0,approved=1,cancel=3,delete=4',
  `additional_user_no` tinyint(4) NOT NULL DEFAULT 0,
  `accept_additional_user` int(11) DEFAULT 0,
  `remainadditional_user` int(11) NOT NULL DEFAULT 0,
  `payment_additional_user` int(11) NOT NULL DEFAULT 0,
  `remain_payment_additional_user` int(11) NOT NULL DEFAULT 0,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=payment done',
  `additionalpayment` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `job_title`, `bussiness_name`, `business_wider_group`, `email`, `email_verify`, `otp`, `password`, `phone`, `access_type`, `status`, `additional_user_no`, `accept_additional_user`, `remainadditional_user`, `payment_additional_user`, `remain_payment_additional_user`, `billing_address`, `additional_details`, `gst`, `payment`, `additionalpayment`, `created_at`, `updated_at`) VALUES
(1, 'loopcon', 'developer', NULL, NULL, 'loopcon@gmail.com', '1', NULL, '$2y$12$1Wu9WYik0ZMMBPnFekWSV.F4l32N7M6H3VwWJxn1gYqW9ToDkpiLi', 6767676767, 'paid', 1, 3, 2, 1, 2, 0, NULL, NULL, NULL, 1, 0, '2024-02-10 01:21:17', '2024-02-21 02:44:37'),
(2, 'test', 'test', NULL, NULL, 'test@gmail.com', '1', NULL, '$2y$12$BaAqcUjMBfUdND3IDmwbtuyg3fijhjZb3iFdM5kDxmDEfkROY1Dd.', 8569567458, 'additionaluser', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '2024-02-10 01:24:32', '2024-02-10 01:25:41'),
(3, 'test', 'test', NULL, NULL, 'disha@gmail.com', '1', NULL, '$2y$12$SgMMN4cbic.tUKE7RdFVrOhopPkb8vK0XuEF/cIrmVzMmcg0YjLD.', 8569567458, 'additionaluser', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '2024-02-10 01:35:01', '2024-02-10 01:37:17'),
(4, 'free', 'free', 'free', 'free', 'free@gmail.com', '1', NULL, '$2y$12$Ci1WWaODdOFO0EUiblmCsucIM8wloAOYQ97cSAGKzK8tLjVLz9FcC', 6956856955, 'free', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '2024-02-12 05:55:10', '2024-02-12 05:55:28'),
(5, 'test', 'test', 'test', 'small', 'test12@gmail.com', '0', NULL, NULL, 8456953256, 'paid', 0, 2, 0, 2, 0, 0, NULL, 'asasasasas', 'A123234', 0, 0, '2024-02-21 01:32:29', '2024-02-21 01:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `datatexts`
--

CREATE TABLE `datatexts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` int(11) NOT NULL,
  `main_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datatexts`
--

INSERT INTO `datatexts` (`id`, `region_id`, `main_category`, `sub_category_1`, `sub_category_2`, `level_4`, `description`, `created_at`, `updated_at`) VALUES
(2, 12, '13', '14', '16', '25', '<div>&nbsp;</div>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; border:none; width:483pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:93.0pt; text-align:left; vertical-align:middle; white-space:normal; width:483pt\"><span style=\"font-size:12pt\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">State lotteries in Austria are operated by &Ouml;sterreichische Lotterien (Austrian Lotteries), a company&nbsp; founded in 1986. It is majority owned by Casinos Austria. The state lottery licence operates under a 15-year concession granted by the state. A new 15-year term started in October 2012.<br />\r\n			&Ouml;sterreichische Lotterien offers both draw games and instants. There are over 5,000 retail outlets.</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-01-26 03:48:21', '2024-02-20 03:00:25'),
(5, 62, '13', '14', '16', '25', '<p>testtttt</p>', '2024-02-20 04:47:17', '2024-02-20 04:47:17'),
(6, 5, '13', '15', '20', '42', '<p>testtttt</p>', '2024-02-20 05:21:33', '2024-02-20 05:21:33'),
(8, 16, '13', '15', '19', '39', '<p>testttt</p>', '2024-02-20 05:27:51', '2024-02-20 05:27:51'),
(11, 12, '13', '14', '16', '27', '<p>testttttttttt</p>', '2024-02-20 05:56:11', '2024-02-20 05:56:11'),
(12, 16, '67', '68', '69', '70', '<p>testttttttt</p>', '2024-02-20 06:05:41', '2024-02-20 06:05:41'),
(13, 6, '13', '15', '20', '43', '<p>testtttttt</p>', '2024-02-20 06:06:19', '2024-02-20 06:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `label`, `value`, `template`, `created_at`, `updated_at`) VALUES
(1, 'newsletter_signup', 'Newsletter Signup', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Thank you for signing up to our monthly newsletter. We&rsquo;re excited to have you on board.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Our newsletter will keep you informed about the latest industry trends, exclusive offers, and information about updates and new releases from GBGC.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Look out for <span style=\"background-color:white\">valuable industry content delivered directly to your inbox each month.Feel free to contact us with any questions, feedback, or suggestions for the newsletter.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best wishes,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:03:18'),
(2, 'sign_up_for_free_access', 'Sign Up for Free Access', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Thank you for choosing GBGC for your company&rsquo;s gambling and gaming data needs.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">We&rsquo;ve received your data portal access request for a free subscription to The Gambling Revenue Report: Europe. Europe-wide revenue insights for our industry will soon be at your fingertips! You&rsquo;ll receive an email with your free-access login details shortly.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Hungry to dive into data split by country jurisdiction and gambling category? Interested in 5-year revenue projections? Upgrade to a Pro subscription to the Gambling Revenue Report: Europe for 12-month access to the full GBGC data portal.It&rsquo;s quick and easy to upgrade - click here for Pro Access.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Feel free to reach out if you have any questions or require further assistance.</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:04:22'),
(3, 'sign_up_for_pro_access_invoice', 'Sign Up for Pro Access (Request an Invoice)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Thank you for choosing GBGC for your company&rsquo;s comprehensive gambling and gaming data needs.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">We&rsquo;ve received your request for 12 months of Pro Access to our data portal and the full Gambling Revenue Report: Europe. You&rsquo;ll soon be able to dive into detailed revenue insights across European jurisdictions and diverse gambling categories, along with exclusive 5-year projections (updated quarterly),helping your business stay informed and operate armed with all the facts.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">You requested to pay by invoice during sign-up. We&rsquo;ll issue this within the next 1-2 business days using the information provided. Once payment is received and confirmed, we&rsquo;ll email your login details immediately,and you can start accessing the data portal.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Feel free to reach out if you have any questions or require further assistance. </span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:05:26'),
(4, 'sign_up_for_pro_access_card_payment', 'Sign Up for Pro Access (Card Payment)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Thank you for choosing GBGC for your company&rsquo;s comprehensive gambling and gaming data needs.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">We&rsquo;ve received your request for 12 months of Pro Access to our data portal and the full Gambling Revenue Report: Europe. You&rsquo;ll soon be able to dive into detailed revenue insights across European jurisdictions and diverse gambling categories, along with exclusive 5-year projections (updated quarterly), helping your business stay informed and operate armed with all the facts.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">We&rsquo;ve confirmed your credit card payment, and you&rsquo;ll receive an email with your pro-access login details shortly.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Feel free to reach out if you have any questions or require further assistance. </span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:09:50'),
(5, 'moved_from_free_to_pro_access_invoice', 'Moved from Free to Pro Access (paid by invoice)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">We&rsquo;ve received your request to upgrade to 12 months of Pro Access to our data portal and the full Gambling Revenue Report: Europe. You&rsquo;ll soon be able to dive into detailed revenue insights across European jurisdictions and diverse gambling categories, along with exclusive 5-year projections (updated quarterly), helping your business stay informed and operate armed with all the facts.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><br />\r\n			<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">You requested to pay by invoice. We&rsquo;ll issue this within 1-2 business days using the information you provided. Once payment is received and confirmed, we&rsquo;ll upgrade your account immediately. We&rsquo;ll email to let you know as soon as your Pro Access upgrade is complete and your 12-month Pro Access to the Gambling Revenue Report: Europe is live.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">As always, feel free to reach out if you have any questions or need further assistance. </span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:32:37'),
(6, 'moved_from_free_to_pro_access_card', 'Moved from Free to Pro Access (paid by card)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Thanks for upgrading to 12 months of Pro Access to our data portal and the full Gambling Revenue Report: Europe. We&rsquo;ve received your credit card payment and upgraded your account.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">You can now use your existing login details to dive into detailed revenue insights across European jurisdictions and diverse gambling categories, along with exclusive 5-year projections (updated quarterly), helping your business stay informed and operate armed with all the facts.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Now your company is a Pro Member, it&rsquo;s easy to add additional usersto your subscription for only &pound;100 each. If you&rsquo;d like more of your team to have full access to the portal, you can use this link to add additional users to your Pro Accessaccount:</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">(link)</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">If you need any further help, please get in touch. </span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Best regards,</span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:33:43'),
(7, 'moved_from_free_to_pro_access_invoice_payment_received', 'Moved from Free to Pro Access (invoice payment received)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Great news&hellip;we&rsquo;ve received the invoice payment and upgraded your Free Access to Pro Access. Your 12-month subscription to the GBGC data portal and the full Gambling Revenue Report: Europe is now live. </span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">You can now use your existing login details to dive into detailed revenue insights across European jurisdictions and diverse gambling categories, along with exclusive 5-year projections (updated quarterly), helping your business stay informed and operate armed with all the facts.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><br />\r\n			<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Now your company is a Pro Member, it&rsquo;s easy to add additional users to your subscription for only &pound;100 each. If you&rsquo;d like more of your team to have full access to the portal, you can use this link to add additional users to your Pro Access account:</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">(link)</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">If you need any further help, please get in touch. </span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Best regards,</span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:34:54'),
(8, 'renew_your_gbgc_data_portal_access', 'Renew Your GBGC Data Portal Access', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">We hope you&rsquo;ve found value in accessing the GBGC Data Portal. Your subscription is set to expire in 4 weeks.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">To ensure uninterrupted service, please follow this link to renew your 12-month access: [Form Link]</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Thank you for choosing GBGC and for your interest in the Gambling Revenue Report: Europe. We look forward to continuing to provide you with valuable insights.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:35:20'),
(9, 'reminder', 'Reminder: Your GBGC Data Portal Access Expires in 4 Weeks', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">We wanted to remind you that your access to the GBGC Data Portal is scheduled to expire in 2 weeks. If you haven&rsquo;t already, please renew your subscription using this link: [FORM LINK]</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">We appreciate your continued partnership and look forward to serving your data needs for another year.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">The GBGC Team</span></span></span></span></span></span><br />\r\n			&nbsp;</p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:36:32'),
(10, 'final_notice', 'Final Notice: GBGC Data Portal Access Ends Tomorrow', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Tomorrow marks the end of your current subscription to the GBGC Data Portal. If you haven&rsquo;t renewed yet, you still have a 2-week grace period to ensure a smooth transition.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">To avoid any disruption, renew your subscription here: [FORM LINK]</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Thank you for choosing GBGC. We value your business and are here to assist with any questions.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span></span></span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:37:02'),
(11, 'subscription_expired', 'Subscription Expired: GBGC Data Portal Access', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Thank you for being a GBGC customer.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">As your access to the data portal has now ended, we wanted to thank you for your partnership. Should you wish to re-subscribe or have any questions, please don&rsquo;t hesitate to reach out.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Thank you for being a valued part of the GBGC global gambling community.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span></span></span></span></span></span><br />\r\n			&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">The GBGC team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:37:47');
INSERT INTO `email_templates` (`id`, `label`, `value`, `template`, `created_at`, `updated_at`) VALUES
(12, 'welcome_to_the_gbgc_data_portal', 'Welcome to the GBGC Data Portal', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Welcome to GBGC Data Portal! We&rsquo;re excited to provide you with exclusive access to the comprehensive gambling and gaming revenue data in the Gambling Revenue Report: Europe.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Below are your login details:</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">&bull; Username: [Customer&rsquo;s Email]</span><br />\r\n			<span style=\"background-color:white\">&bull; Temporary Password: [Temporary Password]</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">To enhance the security of your account, we use Two-Factor Authentication (2FA) using your business email. In the following email, you&rsquo;ll receive instructions on how to complete this setup.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">If you have any questions or need assistance, please get in touch with us.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:38:43'),
(13, 'setting_up_email_authentication', 'Setting Up Email Authentication (2FA)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span><br />\r\n			<br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">To enhance the security of your GBGC Data Portal account, we&rsquo;ve implemented Two-Factor Authentication (2FA) using your business email.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Completing the setup is straightforward; follow the steps below: </span></span></span></span></span></span><br />\r\n			<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">1. Log in to your account using your temporary password.</span><br />\r\n			<span style=\"background-color:white\">2. Check your registered email for a verification code.</span><br />\r\n			<span style=\"background-color:white\">3. Enter the code in the portal to complete the process.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Once done, your account will have an additional layer of protection. If you have any issues or questions, please reach out for assistance.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Thank you for prioritising the security of your account.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span></span></span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:41:19'),
(14, 'inform_pro_user_that_additional_users_paid_by_credit_card_are_live', 'Inform Pro User that Additional Users (paid by credit card) are live', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">We&rsquo;ve received your request to add new users from your team to your Pro Access GBGC membership and your credit card payment.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">The additional users you provided us with have now been added to your account. We have issued each additional user with their own username and password to access the Gambling Revenue Report: Europe and data portal. As a reminder, all login credentials are unique to the individual and should never be shared.</span></span></span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Feel free to reach out if you have any questions or require further assistance. </span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:42:55'),
(15, 'inform_pro_user_that_we_received_their_request_for_additional_users_paid_by_invoice', 'Inform Pro User that we’ve received their request for Additional Users (paid by invoice)', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">We&rsquo;ve received your request to add new users from your team to your Pro Access GBGC membership. </span></span></span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">You requested to pay by invoice during sign-up. We&rsquo;ll issue this within the next 1-2 business days using the information provided. Once payment is received and confirmed, we&rsquo;ll email you confirmation that login details have been provided to the additional users you requested, and they can start accessing the data portal.</span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Feel free to reach out if you have any questions or require further assistance.</span><br />\r\n			<span style=\"background-color:white\">Best regards,</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:43:59'),
(16, 'inform_pro_user_that_additional_users_paid_by_invoice_are_live', 'Inform Pro User that additional users (paid by invoice) are live', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Great news&hellip;we&rsquo;ve received the invoice payment and added the Additional Users you requested to your GBGC Pro Access membership. </span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">We have issued each Additional User with their own username and password to access the Gambling Revenue Report: Europe and data portal. As a reminder, all login credentials are unique to the individual and should never be shared.</span></span></span></span></span></span><br />\r\n			<span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Feel free to reach out if you have any questions or require further assistance. </span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:44:33'),
(17, 'inform_additional_user_that_their_data_portal_access_is_live', 'Inform Additional User that their data portal access is live', '<p>&nbsp;</p>\r\n\r\n<div style=\"border:1px solid #cccccc; display:contents; width:480px\">\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mob_center\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">&nbsp;<br />\r\n			&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;\r\n			<p style=\"text-align:center\"><span style=\"font-size:36px\"><img alt=\"\" src=\"/img/gbgc-logo-black.png\" style=\"height:80px; width:208px\" /></span></p>\r\n			</div>\r\n\r\n			<div style=\"border-top:1px solid #cccccc; margin-bottom:0px; margin-left:50px; margin-right:50px; margin-top:0px; text-align:center\">&nbsp;</div>\r\n\r\n			<div class=\"container\" style=\"background:#ffffff; padding:5px 10px\">\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Dear [Customer&rsquo;s Name],</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">As you will be aware, your business has subscribed to GBGC&rsquo;s Gambling Revenue Report: Europe. [insert Pro User Name] has requested that you be added as an additional user attached to their membership.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\">Look out for an email with your login details to our data portal, which you&rsquo;ll receive shortly. Once you log in, you&rsquo;ll be able to dive into detailed gambling revenue insights across European jurisdictions and diverse gambling categories, along with exclusive 5-year projections (updated quarterly), helping your business stay informed and operate armed with all the facts.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><br />\r\n			<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"><span style=\"background-color:white\">Feel free to reach out if you have any questions or require further assistance. </span><br />\r\n			<br />\r\n			<span style=\"background-color:white\">Best regards,</span><br />\r\n			<span style=\"background-color:white\">The GBGC Team</span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:middle\">\r\n			<div class=\"container\" style=\"background:#eeeeee; padding:5px 10px\">\r\n			<p style=\"text-align:center\">&nbsp;&nbsp;&nbsp;Stay connected on LinkedIn (Linked in Logo)<br />\r\n			This message is private and confidential. If you have received thismessage in error, please notify us and remove it from your system.<br />\r\n			GBGC may monitor email traffic data and also the content of email for the purposes of security and staff training.<br />\r\n			GBGC is a limited company registered in England and Wales. Registered number: 14205866. Registered office: Accounts &amp; Legal Consultants Suite 1-3, 24 Southwark Street, London, England, SE1 1TY.<br />\r\n			Unsubscribe (link) | Privacy Policy (link) | Contact Us (link)<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,&quot;sans-serif&quot;\"><span style=\"font-size:11.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:#242424\"> </span></span></span></span></span></span></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', NULL, '2024-02-05 02:45:17');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 'Why should you make an FAQ page?', 'An FAQ page is a time-saving customer service tactic that provides the most commonly asked questions and answers for current or potential customers.&nbsp; Before diving into how to make an FAQ page, you need to know why having one is so important. There are so many reasons beyond improving the customer experience for perfecting your FAQ page.&nbsp;', '2024-01-11 02:37:57', '2024-01-15 06:26:59'),
(4, 'How to make an FAQ page', 'There are seven simple steps to make the perfect FAQ page for your business. The design of an FAQ page is crucial for an easy-to-use customer experience. Follow these steps, and your customer success team will thank you.&nbsp;', '2024-01-11 07:12:15', '2024-01-13 01:06:36'),
(9, 'test', '<p>test</p>\r\n\r\n<p>test</p>\r\n\r\n<p>test</p>', '2024-02-08 06:53:50', '2024-02-08 06:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyrignt_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fevicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_tag_manager` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `phone`, `address`, `aboutus`, `contact_email`, `linkedin`, `copyrignt_year`, `admin_email`, `admin_password`, `logo`, `fevicon`, `seo_title`, `meta_keyword`, `meta_description`, `canonical_tag`, `google_tag_manager`, `created_at`, `updated_at`) VALUES
(1, 'GBGC', '9986758967', 'Rajkot', 'A specialist gaming market research and consultancy firm. A specialist gaming market research and consultancy firm. Our consultancy and advice are based on more than 50 years of experience in different areas of the gambling sector. Since 1999, GBGC has helped clients in all parts of the gambling value chain to explore opportunities, develop strategies, and improve gambling businesses around the world. Our clients include governments, regulators, investors, suppliers, and operators involved in the global gambling industry.', 'admin@gmail.com', 'https://www.linkedin.com/', '2024', 'admin@gmail.com', '12345678', '65a51917cb6d0_1705318679.png', '65af5d7b1f926_1705991547.png', 'gbgc', 'gbgc', 'gbgc', 'gbgc', 'gbgc', NULL, '2024-02-01 07:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_banners`
--

CREATE TABLE `homepage_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_banners`
--

INSERT INTO `homepage_banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'THE ONLY PROVIDER OF GLOBAL GAMBLING REVENUE DATA YOU’LL EVER USE.', '<ul>\r\n	<li>STACK THE ODDS IN YOUR FAVOUR.</li>\r\n	<li>STOP RELYING ON TOPLINE REPORTING TO MAKE COMPLEX DECISIONS.</li>\r\n	<li>SUBSCRIBE TO ACCESS REVENUE DATA SPLIT BY EVERY EUROPEAN GAMBLING JURISDICTION AND MARKET.</li>\r\n</ul>', '65af579e04c04_1705990046.png', NULL, '2024-01-23 00:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_reports`
--

CREATE TABLE `homepage_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_reports`
--

INSERT INTO `homepage_reports` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'CURRENT', '<p>Our data is updated quarterly, and so are our expert projections. Say goodbye to once-a-year reports that are outdated as soon as you click &lsquo;buy.&rsquo;</p>', '65af6ba584797_1705995173.png', '2024-01-19 22:51:29', '2024-01-23 02:02:53'),
(3, 'PREVIOUS', '<p>Our data is updated quarterly, and so are our expert projections. Say goodbye to once-a-year reports that are outdated as soon as you click &lsquo;buy.&rsquo;</p>', '65ab4a80933e6_1705724544.png', '2024-01-19 22:52:24', '2024-01-19 22:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `level_masters`
--

CREATE TABLE `level_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_masters`
--

INSERT INTO `level_masters` (`id`, `parent_id`, `title`, `level_number`, `created_at`, `updated_at`) VALUES
(13, 0, 'Domestically Regulated', 1, '2024-02-02 01:55:26', '2024-02-02 01:55:26'),
(14, 13, 'Landbased', 2, '2024-02-02 01:55:57', '2024-02-02 01:55:57'),
(15, 13, 'Remote', 2, '2024-02-02 01:56:13', '2024-02-02 01:56:13'),
(16, 14, 'Lottery', 3, '2024-02-02 01:56:51', '2024-02-02 01:56:51'),
(17, 14, 'Betting', 3, '2024-02-02 01:57:04', '2024-02-02 01:57:04'),
(18, 14, 'Gaming', 3, '2024-02-02 01:57:23', '2024-02-02 01:57:23'),
(19, 15, 'Lottery', 3, '2024-02-02 01:57:53', '2024-02-02 01:57:53'),
(20, 15, 'Betting', 3, '2024-02-02 01:58:11', '2024-02-02 01:58:12'),
(21, 15, 'Gaming', 3, '2024-02-02 01:59:00', '2024-02-02 01:59:00'),
(22, 13, 'Total', 2, '2024-02-02 03:23:31', '2024-02-02 03:23:31'),
(23, 22, 'Lottery', 3, '2024-02-02 03:24:11', '2024-02-02 03:24:11'),
(24, 22, 'Gaming', 3, '2024-02-02 03:24:29', '2024-02-02 03:24:29'),
(25, 16, 'State', 4, '2024-02-02 03:28:56', '2024-02-02 03:28:56'),
(26, 16, 'Other', 4, '2024-02-02 03:29:18', '2024-02-02 03:29:18'),
(27, 16, 'Charity', 4, '2024-02-02 03:29:32', '2024-02-02 03:29:32'),
(28, 17, 'Horseracing', 4, '2024-02-02 03:29:51', '2024-02-02 03:29:51'),
(29, 17, 'Greyhounds', 4, '2024-02-02 03:30:07', '2024-02-02 03:30:07'),
(30, 17, 'Sports & other event', 4, '2024-02-02 03:30:30', '2024-02-02 03:30:30'),
(31, 17, 'Virtuals', 4, '2024-02-02 03:31:08', '2024-02-02 03:31:08'),
(32, 18, 'keno and numbers', 4, '2024-02-02 03:31:38', '2024-02-02 03:31:38'),
(33, 18, 'casino -tables & other', 4, '2024-02-02 03:32:09', '2024-02-02 03:32:09'),
(34, 18, 'casino - slots', 4, '2024-02-02 03:32:37', '2024-02-02 03:32:37'),
(35, 18, 'casino - betting', 4, '2024-02-02 03:32:57', '2024-02-02 03:32:57'),
(36, 18, 'slots (ex casino)', 4, '2024-02-02 03:33:13', '2024-02-02 03:33:13'),
(37, 18, 'bingo (ex casino)', 4, '2024-02-02 03:33:56', '2024-02-02 03:33:56'),
(38, 18, 'other (ex casino)', 4, '2024-02-02 03:34:10', '2024-02-02 03:34:10'),
(39, 19, 'State', 4, '2024-02-02 03:34:40', '2024-02-02 03:34:40'),
(40, 19, 'Other', 4, '2024-02-02 03:35:12', '2024-02-02 03:35:12'),
(41, 19, 'Charity', 4, '2024-02-02 03:36:03', '2024-02-02 03:36:03'),
(42, 20, 'Horseracing', 4, '2024-02-02 03:36:29', '2024-02-02 03:36:29'),
(43, 20, 'Greyhounds', 4, '2024-02-02 03:38:54', '2024-02-02 03:38:54'),
(44, 20, 'Sports & other event', 4, '2024-02-02 03:40:03', '2024-02-02 03:40:03'),
(45, 20, 'Virtuals', 4, '2024-02-02 03:40:28', '2024-02-02 03:40:28'),
(46, 20, 'DFS', 4, '2024-02-02 03:42:06', '2024-02-02 03:42:06'),
(47, 21, 'keno and numbers', 4, '2024-02-02 03:42:31', '2024-02-02 03:42:45'),
(48, 21, 'casino - tables & other', 4, '2024-02-02 03:43:03', '2024-02-02 03:43:03'),
(49, 21, 'slots', 4, '2024-02-02 03:43:30', '2024-02-02 03:43:30'),
(50, 21, 'online poker', 4, '2024-02-02 03:44:11', '2024-02-02 03:44:11'),
(51, 21, 'bingo', 4, '2024-02-02 03:44:34', '2024-02-02 03:44:34'),
(52, 23, 'State', 4, '2024-02-02 03:44:58', '2024-02-02 03:44:58'),
(53, 23, 'Other', 4, '2024-02-02 03:45:21', '2024-02-02 03:45:21'),
(54, 23, 'Charity', 4, '2024-02-02 03:46:42', '2024-02-02 03:46:42'),
(55, 22, 'Betting', 3, '2024-02-02 03:47:39', '2024-02-02 03:47:39'),
(56, 55, 'Horseracing', 4, '2024-02-02 03:48:11', '2024-02-02 03:48:11'),
(57, 55, 'Greyhounds', 4, '2024-02-02 03:48:27', '2024-02-02 03:48:27'),
(58, 55, 'Sports and other event', 4, '2024-02-02 03:48:41', '2024-02-02 03:48:41'),
(59, 55, 'Virtuals', 4, '2024-02-02 03:49:06', '2024-02-02 03:49:06'),
(60, 55, 'DFS', 4, '2024-02-02 03:49:24', '2024-02-02 03:49:24'),
(61, 24, 'keno and numbers', 4, '2024-02-02 03:49:58', '2024-02-02 03:49:58'),
(62, 24, 'casino tables and all other', 4, '2024-02-02 03:50:16', '2024-02-02 03:51:32'),
(63, 24, 'LB casino - betting', 4, '2024-02-02 03:51:49', '2024-02-02 03:51:49'),
(64, 24, 'slots', 4, '2024-02-02 03:52:07', '2024-02-02 03:52:07'),
(65, 24, 'online poker', 4, '2024-02-02 03:52:34', '2024-02-02 03:52:34'),
(66, 24, 'bingo', 4, '2024-02-02 03:52:50', '2024-02-02 03:52:50'),
(67, 0, 'unRegulated', 1, NULL, NULL),
(68, 67, 'landbased', 2, NULL, NULL),
(69, 68, 'gaming', 3, NULL, NULL),
(70, 69, 'virtuals', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membershipplans`
--

CREATE TABLE `membershipplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `access_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membershipplans`
--

INSERT INTO `membershipplans` (`id`, `access_status`, `name`, `price`, `short_description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'free', 'FREE ACCESS', NULL, '<ul>\r\n	<li>All Europeon data aggregated</li>\r\n	<li>Data from 2007-now</li>\r\n	<li>all data updated quarterly</li>\r\n</ul>', NULL, 1, NULL, '2024-01-30 00:08:06'),
(2, 'paid', 'Internet Gambling Report', '2500', '<ul>\r\n	<li>\r\n	<p>Every European jurisdiction</p>\r\n	</li>\r\n	<li>\r\n	<p>A standardised view aid comparisons</p>\r\n	</li>\r\n	<li>\r\n	<p>Local view including nuances/terminology</p>\r\n	</li>\r\n	<li>\r\n	<p>ALL Data from 2007 to now</p>\r\n	</li>\r\n	<li>\r\n	<p>5-year forward projection for every jurisdiction</p>\r\n	</li>\r\n	<li>\r\n	<p>ALL Data and projections are updated quarterly</p>\r\n	</li>\r\n	<li>\r\n	<p>1 hour of free tailored data consultancy</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Additional bussiness users&nbsp;&pound;100&nbsp;</strong></p>\r\n	</li>\r\n</ul>', '<p>GBGC&rsquo;s comprehensive 4,000-page Global Gambling Report contains information and data on the gambling activities in more than 250 jurisdictions. It is constantly updated with new developments in regulation, taxation and market performance for the sports betting, horseracing, casino, bingo, and lottery sectors.</p>\r\n\r\n<p>In addition to the jurisdiction reports, the Global Gambling Report contains a wealth of databases with more than 140,000 data points measuring revenues for the global gambling market.</p>', 1, '2024-01-13 01:27:50', '2024-01-30 00:04:44'),
(3, 'freetopro', 'Free to Paid', '500', '<p>test</p>', '<p>test</p>', 1, NULL, '2024-02-06 04:01:45'),
(4, 'additionaluser', 'Additional User', '200', '<p>tesst</p>', '<p>testt</p>', 1, NULL, '2024-02-09 00:09:23');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2024_01_09_114922_create_websitelogos_table', 3),
(9, '2024_01_10_064414_create_aboutus_table', 4),
(10, '2024_01_11_061151_create_faqs_table', 5),
(11, '2024_01_11_132048_create_customers_table', 6),
(15, '2024_01_13_044455_create_membershipplans_table', 7),
(16, '2024_01_15_061405_create_general_settings_table', 7),
(17, '2024_01_15_092632_create_static_pages_table', 8),
(19, '2024_01_16_042602_create_newsletters_table', 9),
(20, '2024_01_16_060125_create_regions_table', 10),
(21, '2024_01_17_083248_create_contactus_table', 11),
(22, '2024_01_18_063004_create_homepage_banners_table', 12),
(24, '2024_01_19_045829_create_homepage_reports_table', 13),
(27, '2024_01_22_071850_create_datatexts_table', 14),
(30, '2024_01_24_070846_create_level_masters_table', 15),
(31, '2024_01_27_040309_create_scores_table', 16),
(32, '2024_01_30_080925_create_email_templates_table', 17),
(33, '2024_02_06_093847_create_orders_table', 18),
(34, '2024_02_06_095103_create_additional_orderdetails_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newsletter_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `newsletter_email`, `created_at`, `updated_at`) VALUES
(2, 'loopcon@gmail.com', '2024-01-15 23:19:23', '2024-01-15 23:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membershipplans_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `membershipplans_id`, `amount`, `status`, `payment_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '500', '0', NULL, NULL, '2024-02-10 01:22:35', '2024-02-10 01:22:35'),
(2, '1', '4', '200', '0', NULL, NULL, '2024-02-10 01:25:15', '2024-02-10 01:25:15'),
(3, '1', '4', '200', '0', NULL, NULL, '2024-02-10 01:35:05', '2024-02-10 01:35:05'),
(4, '1', '3', '500', '0', NULL, NULL, '2024-02-21 01:32:35', '2024-02-21 01:32:35');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', NULL, '2024-01-16 01:52:07'),
(2, 'United Arab Emirates', NULL, NULL),
(3, 'Afghanistan', NULL, NULL),
(4, 'Antigua and Barbuda', NULL, NULL),
(5, 'Anguilla', NULL, NULL),
(6, 'Albania', NULL, NULL),
(7, 'Armenia', NULL, NULL),
(8, 'Angola', NULL, NULL),
(9, 'Antarctica', NULL, NULL),
(10, 'Argentina', NULL, NULL),
(11, 'American Samoa', NULL, NULL),
(12, 'Austria', NULL, NULL),
(13, 'Australia', NULL, NULL),
(14, 'Aruba', NULL, NULL),
(15, 'Åland', NULL, NULL),
(16, 'Azerbaijan', NULL, NULL),
(17, 'Bosnia and Herzegovina', NULL, NULL),
(18, 'Barbados', NULL, NULL),
(19, 'Bangladesh', NULL, NULL),
(20, 'Belgium', NULL, NULL),
(21, 'Burkina Faso', NULL, NULL),
(22, 'Bulgaria', NULL, NULL),
(23, 'Bahrain', NULL, NULL),
(24, 'Burundi', NULL, NULL),
(25, 'Benin', NULL, NULL),
(26, 'Saint Barthélemy', NULL, NULL),
(27, 'Bermuda', NULL, NULL),
(28, 'Brunei', NULL, NULL),
(29, 'Bolivia', NULL, NULL),
(30, 'Bonaire', NULL, NULL),
(31, 'Brazil', NULL, NULL),
(32, 'Bahamas', NULL, NULL),
(33, 'Bhutan', NULL, NULL),
(34, 'Bouvet Island', NULL, NULL),
(35, 'Botswana', NULL, NULL),
(36, 'Belarus', NULL, NULL),
(37, 'Belize', NULL, NULL),
(38, 'Canada', NULL, NULL),
(39, 'Cocos [Keeling] Islands', NULL, NULL),
(40, 'Democratic Republic of the Congo', NULL, NULL),
(41, 'Central African Republic', NULL, NULL),
(42, 'Republic of the Congo', NULL, NULL),
(43, 'Switzerland', NULL, NULL),
(44, 'Ivory Coast', NULL, NULL),
(45, 'Cook Islands', NULL, NULL),
(46, 'Chile', NULL, NULL),
(47, 'Cameroon', NULL, NULL),
(48, 'China', NULL, NULL),
(49, 'Colombia', NULL, NULL),
(50, 'Costa Rica', NULL, NULL),
(51, 'Cuba', NULL, NULL),
(52, 'Cape Verde', NULL, NULL),
(53, 'Curacao', NULL, NULL),
(54, 'Christmas Island', NULL, NULL),
(55, 'Cyprus', NULL, NULL),
(56, 'Czech Republic', NULL, NULL),
(57, 'Germany', NULL, NULL),
(58, 'Djibouti', NULL, NULL),
(59, 'Denmark', NULL, NULL),
(60, 'Dominica', NULL, NULL),
(61, 'Dominican Republic', NULL, NULL),
(62, 'Algeria', NULL, NULL),
(63, 'Ecuador', NULL, NULL),
(64, 'Estonia', NULL, NULL),
(65, 'Egypt', NULL, NULL),
(66, 'Western Sahara', NULL, NULL),
(67, 'Eritrea', NULL, NULL),
(68, 'Spain', NULL, NULL),
(69, 'Ethiopia', NULL, NULL),
(70, 'Finland', NULL, NULL),
(71, 'Fiji', NULL, NULL),
(72, 'Falkland Islands', NULL, NULL),
(73, 'Micronesia', NULL, NULL),
(74, 'Faroe Islands', NULL, NULL),
(75, 'France', NULL, NULL),
(76, 'Gabon', NULL, NULL),
(77, 'United Kingdom', NULL, NULL),
(78, 'Grenada', NULL, NULL),
(79, 'Georgia', NULL, NULL),
(80, 'French Guiana', NULL, NULL),
(81, 'Guernsey', NULL, NULL),
(82, 'Ghana', NULL, NULL),
(83, 'Gibraltar', NULL, NULL),
(84, 'Greenland', NULL, NULL),
(85, 'Gambia', NULL, NULL),
(86, 'Guinea', NULL, NULL),
(87, 'Guadeloupe', NULL, NULL),
(88, 'Equatorial Guinea', NULL, NULL),
(89, 'Greece', NULL, NULL),
(90, 'South Georgia and the South Sandwich Islands', NULL, NULL),
(91, 'Guatemala', NULL, NULL),
(92, 'Guam', NULL, NULL),
(93, 'Guinea-Bissau', NULL, NULL),
(94, 'Guyana', NULL, NULL),
(95, 'Hong Kong', NULL, NULL),
(96, 'Heard Island and McDonald Islands', NULL, NULL),
(97, 'Honduras', NULL, NULL),
(98, 'Croatia', NULL, NULL),
(99, 'Haiti', NULL, NULL),
(100, 'Hungary', NULL, NULL),
(101, 'Indonesia', NULL, NULL),
(102, 'Ireland', NULL, NULL),
(103, 'Israel', NULL, NULL),
(104, 'Isle of Man', NULL, NULL),
(105, 'India', NULL, NULL),
(106, 'British Indian Ocean Territory', NULL, NULL),
(107, 'Iraq', NULL, NULL),
(108, 'Iran', NULL, NULL),
(109, 'Iceland', NULL, NULL),
(110, 'Italy', NULL, NULL),
(111, 'Jersey', NULL, NULL),
(112, 'Jamaica', NULL, NULL),
(113, 'Jordan', NULL, NULL),
(114, 'Japan', NULL, NULL),
(115, 'Kenya', NULL, NULL),
(116, 'Kyrgyzstan', NULL, NULL),
(117, 'Cambodia', NULL, NULL),
(118, 'Kiribati', NULL, NULL),
(119, 'Comoros', NULL, NULL),
(120, 'Saint Kitts and Nevis', NULL, NULL),
(121, 'North Korea', NULL, NULL),
(122, 'South Korea', NULL, NULL),
(123, 'Kuwait', NULL, NULL),
(124, 'Cayman Islands', NULL, NULL),
(125, 'Kazakhstan', NULL, NULL),
(126, 'Laos', NULL, NULL),
(127, 'Lebanon', NULL, NULL),
(128, 'Saint Lucia', NULL, NULL),
(129, 'Liechtenstein', NULL, NULL),
(130, 'Sri Lanka', NULL, NULL),
(131, 'Liberia', NULL, NULL),
(132, 'Lesotho', NULL, NULL),
(133, 'Lithuania', NULL, NULL),
(134, 'Luxembourg', NULL, NULL),
(135, 'Latvia', NULL, NULL),
(136, 'Libya', NULL, NULL),
(137, 'Morocco', NULL, NULL),
(138, 'Monaco', NULL, NULL),
(139, 'Moldova', NULL, NULL),
(140, 'Montenegro', NULL, NULL),
(141, 'Saint Martin', NULL, NULL),
(142, 'Madagascar', NULL, NULL),
(143, 'Marshall Islands', NULL, NULL),
(144, 'Macedonia', NULL, NULL),
(145, 'Mali', NULL, NULL),
(146, 'Myanmar [Burma]', NULL, NULL),
(147, 'Mongolia', NULL, NULL),
(148, 'Macao', NULL, NULL),
(149, 'Northern Mariana Islands', NULL, NULL),
(150, 'Martinique', NULL, NULL),
(151, 'Mauritania', NULL, NULL),
(152, 'Montserrat', NULL, NULL),
(153, 'Malta', NULL, NULL),
(154, 'Mauritius', NULL, NULL),
(155, 'Maldives', NULL, NULL),
(156, 'Malawi', NULL, NULL),
(157, 'Mexico', NULL, NULL),
(158, 'Malaysia', NULL, NULL),
(159, 'Mozambique', NULL, NULL),
(160, 'Namibia', NULL, NULL),
(161, 'New Caledonia', NULL, NULL),
(162, 'Niger', NULL, NULL),
(163, 'Norfolk Island', NULL, NULL),
(164, 'Nigeria', NULL, NULL),
(165, 'Nicaragua', NULL, NULL),
(166, 'Netherlands', NULL, NULL),
(167, 'Norway', NULL, NULL),
(168, 'Nepal', NULL, NULL),
(169, 'Nauru', NULL, NULL),
(170, 'Niue', NULL, NULL),
(171, 'New Zealand', NULL, NULL),
(172, 'Oman', NULL, NULL),
(173, 'Panama', NULL, NULL),
(174, 'Peru', NULL, NULL),
(175, 'French Polynesia', NULL, NULL),
(176, 'Papua New Guinea', NULL, NULL),
(177, 'Philippines', NULL, NULL),
(178, 'Pakistan', NULL, NULL),
(179, 'Poland', NULL, NULL),
(180, 'Saint Pierre and Miquelon', NULL, NULL),
(181, 'Pitcairn Islands', NULL, NULL),
(182, 'Puerto Rico', NULL, NULL),
(183, 'Palestine', NULL, NULL),
(184, 'Portugal', NULL, NULL),
(185, 'Palau', NULL, NULL),
(186, 'Paraguay', NULL, NULL),
(187, 'Qatar', NULL, NULL),
(188, 'Réunion', NULL, NULL),
(189, 'Romania', NULL, NULL),
(190, 'Serbia', NULL, NULL),
(191, 'Russia', NULL, NULL),
(192, 'Rwanda', NULL, NULL),
(193, 'Saudi Arabia', NULL, NULL),
(194, 'Solomon Islands', NULL, NULL),
(195, 'Seychelles', NULL, NULL),
(196, 'Sudan', NULL, NULL),
(197, 'Sweden', NULL, NULL),
(198, 'Singapore', NULL, NULL),
(199, 'Saint Helena', NULL, NULL),
(200, 'Slovenia', NULL, NULL),
(201, 'Svalbard and Jan Mayen', NULL, NULL),
(202, 'Slovakia', NULL, NULL),
(203, 'Sierra Leone', NULL, NULL),
(204, 'San Marino', NULL, NULL),
(205, 'Senegal', NULL, NULL),
(206, 'Somalia', NULL, NULL),
(207, 'Suriname', NULL, NULL),
(208, 'South Sudan', NULL, NULL),
(209, 'São Tomé and Príncipe', NULL, NULL),
(210, 'El Salvador', NULL, NULL),
(211, 'Sint Maarten', NULL, NULL),
(212, 'Syria', NULL, NULL),
(213, 'Swaziland', NULL, NULL),
(214, 'Turks and Caicos Islands', NULL, NULL),
(215, 'Chad', NULL, NULL),
(216, 'French Southern Territories', NULL, NULL),
(217, 'Togo', NULL, NULL),
(218, 'Thailand', NULL, NULL),
(219, 'Tajikistan', NULL, NULL),
(220, 'Tokelau', NULL, NULL),
(221, 'East Timor', NULL, NULL),
(222, 'Turkmenistan', NULL, NULL),
(223, 'Tunisia', NULL, NULL),
(224, 'Tonga', NULL, NULL),
(225, 'Turkey', NULL, NULL),
(226, 'Trinidad and Tobago', NULL, NULL),
(227, 'Tuvalu', NULL, NULL),
(228, 'Taiwan', NULL, NULL),
(229, 'Tanzania', NULL, NULL),
(230, 'Ukraine', NULL, NULL),
(231, 'Uganda', NULL, NULL),
(232, 'U.S. Minor Outlying Islands', NULL, NULL),
(233, 'United States', NULL, NULL),
(234, 'Uruguay', NULL, NULL),
(235, 'Uzbekistan', NULL, NULL),
(236, 'Vatican City', NULL, NULL),
(237, 'Saint Vincent and the Grenadines', NULL, NULL),
(238, 'Venezuela', NULL, NULL),
(239, 'British Virgin Islands', NULL, NULL),
(240, 'U.S. Virgin Islands', NULL, NULL),
(241, 'Vietnam', NULL, NULL),
(242, 'Vanuatu', NULL, NULL),
(243, 'Wallis and Futuna', NULL, NULL),
(244, 'Samoa', NULL, NULL),
(245, 'Kosovo', NULL, NULL),
(246, 'Yemen', NULL, NULL),
(247, 'Mayotte', NULL, NULL),
(248, 'South Africa', NULL, NULL),
(249, 'Zambia', NULL, NULL),
(250, 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `currency_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` double(8,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `view`, `region_id`, `currency_id`, `level_1`, `level_2`, `level_3`, `level_4`, `year`, `score`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 1, 'USD', '13', '14', '16', '25', '2007', 516.00, 'tests', NULL, NULL),
(2, 'Standard', 1, 'USD', '13', '14', '16', '25', '2008', 540.00, 'test', NULL, NULL),
(3, 'Standard', 1, 'USD', '13', '14', '16', '25', '2009', 578.00, 'fsfsf', NULL, NULL),
(4, 'Standard', 1, 'USD', '13', '14', '16', '25', '2010', 541.00, '', NULL, NULL),
(5, 'Standard', 1, 'USD', '13', '14', '16', '25', '2011', 605.00, '', NULL, NULL),
(6, 'Standard', 1, 'USD', '13', '14', '16', '25', '2012', 579.00, '', NULL, NULL),
(7, 'Standard', 1, 'USD', '13', '14', '16', '25', '2013', 534.00, '', NULL, NULL),
(8, 'Standard', 1, 'USD', '13', '14', '16', '25', '2014', 537.00, '', NULL, NULL),
(9, 'Standard', 1, 'USD', '13', '14', '16', '26', '2007', NULL, '', NULL, NULL),
(10, 'Standard', 1, 'USD', '13', '14', '16', '26', '2008', NULL, '', NULL, NULL),
(11, 'Standard', 1, 'USD', '13', '14', '16', '26', '2009', NULL, '', NULL, NULL),
(12, 'Standard', 1, 'USD', '13', '14', '16', '26', '2010', NULL, '', NULL, NULL),
(13, 'Standard', 1, 'USD', '13', '14', '16', '26', '2011', NULL, '', NULL, NULL),
(14, 'Standard', 1, 'USD', '13', '14', '16', '26', '2012', NULL, '', NULL, NULL),
(15, 'Standard', 1, 'USD', '13', '14', '16', '26', '2013', NULL, '', NULL, NULL),
(16, 'Standard', 1, 'USD', '13', '14', '16', '26', '2014', NULL, '', NULL, NULL),
(17, 'Standard', 1, 'USD', '13', '14', '16', '27', '2007', NULL, '', NULL, NULL),
(18, 'Standard', 1, 'USD', '13', '14', '16', '27', '2008', NULL, '', NULL, NULL),
(19, 'Standard', 1, 'USD', '13', '14', '16', '27', '2009', NULL, '', NULL, NULL),
(20, 'Standard', 1, 'USD', '13', '14', '16', '27', '2010', NULL, '', NULL, NULL),
(21, 'Standard', 1, 'USD', '13', '14', '16', '27', '2011', NULL, '', NULL, NULL),
(22, 'Standard', 1, 'USD', '13', '14', '16', '27', '2012', NULL, '', NULL, NULL),
(23, 'Standard', 1, 'USD', '13', '14', '16', '27', '2013', NULL, '', NULL, NULL),
(24, 'Standard', 1, 'USD', '13', '14', '16', '27', '2014', NULL, '', NULL, NULL),
(25, 'Standard', 1, 'USD', '13', '14', '17', '28', '2007', 4.00, '', NULL, NULL),
(26, 'Standard', 1, 'USD', '13', '14', '17', '28', '2008', 4.00, '', NULL, NULL),
(27, 'Standard', 1, 'USD', '13', '14', '17', '28', '2009', 4.00, '', NULL, NULL),
(28, 'Standard', 1, 'USD', '13', '14', '17', '28', '2010', 4.00, '', NULL, NULL),
(29, 'Standard', 1, 'USD', '13', '14', '17', '28', '2011', 4.00, '', NULL, NULL),
(30, 'Standard', 1, 'USD', '13', '14', '17', '28', '2012', 5.00, '', NULL, NULL),
(31, 'Standard', 1, 'USD', '13', '14', '17', '28', '2013', 5.00, '', NULL, NULL),
(32, 'Standard', 1, 'USD', '13', '14', '17', '28', '2014', 5.00, '', NULL, NULL),
(33, 'Standard', 1, 'USD', '13', '14', '17', '29', '2007', NULL, '', NULL, NULL),
(34, 'Standard', 1, 'USD', '13', '14', '17', '29', '2008', NULL, '', NULL, NULL),
(35, 'Standard', 1, 'USD', '13', '14', '17', '29', '2009', NULL, '', NULL, NULL),
(36, 'Standard', 1, 'USD', '13', '14', '17', '29', '2010', NULL, '', NULL, NULL),
(37, 'Standard', 1, 'USD', '13', '14', '17', '29', '2011', NULL, '', NULL, NULL),
(38, 'Standard', 1, 'USD', '13', '14', '17', '29', '2012', NULL, '', NULL, NULL),
(39, 'Standard', 1, 'USD', '13', '14', '17', '29', '2013', NULL, '', NULL, NULL),
(40, 'Standard', 1, 'USD', '13', '14', '17', '29', '2014', NULL, '', NULL, NULL),
(41, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2007', 380.00, '', NULL, NULL),
(42, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2008', 402.00, '', NULL, NULL),
(43, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2009', 400.00, '', NULL, NULL),
(44, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2010', 424.00, '', NULL, NULL),
(45, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2011', 411.00, '', NULL, NULL),
(46, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2012', 451.00, '', NULL, NULL),
(47, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2013', 461.00, '', NULL, NULL),
(48, 'Standard', 1, 'USD', '13', '14', '17', NULL, '2014', 476.00, '', NULL, NULL),
(49, 'Standard', 1, 'USD', '13', '14', '17', '31', '2007', NULL, '', NULL, NULL),
(50, 'Standard', 1, 'USD', '13', '14', '17', '31', '2008', NULL, '', NULL, NULL),
(51, 'Standard', 1, 'USD', '13', '14', '17', '31', '2009', NULL, '', NULL, NULL),
(52, 'Standard', 1, 'USD', '13', '14', '17', '31', '2010', NULL, '', NULL, NULL),
(53, 'Standard', 1, 'USD', '13', '14', '17', '31', '2011', NULL, '', NULL, NULL),
(54, 'Standard', 1, 'USD', '13', '14', '17', '31', '2012', NULL, '', NULL, NULL),
(55, 'Standard', 1, 'USD', '13', '14', '17', '31', '2013', NULL, '', NULL, NULL),
(56, 'Standard', 1, 'USD', '13', '14', '17', '31', '2014', NULL, '', NULL, NULL),
(57, 'Standard', 1, 'USD', '13', '14', '18', '32', '2007', NULL, '', NULL, NULL),
(58, 'Standard', 1, 'USD', '13', '14', '18', '32', '2008', NULL, '', NULL, NULL),
(59, 'Standard', 1, 'USD', '13', '14', '18', '32', '2009', NULL, '', NULL, NULL),
(60, 'Standard', 1, 'USD', '13', '14', '18', '32', '2010', NULL, '', NULL, NULL),
(61, 'Standard', 1, 'USD', '13', '14', '18', '32', '2011', NULL, '', NULL, NULL),
(62, 'Standard', 1, 'USD', '13', '14', '18', '32', '2012', NULL, '', NULL, NULL),
(63, 'Standard', 1, 'USD', '13', '14', '18', '32', '2013', NULL, '', NULL, NULL),
(64, 'Standard', 1, 'USD', '13', '14', '18', '32', '2014', NULL, '', NULL, NULL),
(65, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2007', 69.00, '', NULL, NULL),
(66, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2008', 70.00, '', NULL, NULL),
(67, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2009', 65.00, '', NULL, NULL),
(68, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2010', 57.00, '', NULL, NULL),
(69, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2011', 64.00, '', NULL, NULL),
(70, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2012', 63.00, '', NULL, NULL),
(71, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2013', 59.00, '', NULL, NULL),
(72, 'Standard', 1, 'USD', '13', '14', '18', NULL, '2014', 62.00, '', NULL, NULL),
(73, 'Standard', 1, 'USD', '13', '14', '18', '34', '2007', 125.00, '', NULL, NULL),
(74, 'Standard', 1, 'USD', '13', '14', '18', '34', '2008', 127.00, '', NULL, NULL),
(75, 'Standard', 1, 'USD', '13', '14', '18', '34', '2009', 118.00, '', NULL, NULL),
(76, 'Standard', 1, 'USD', '13', '14', '18', '34', '2010', 105.00, '', NULL, NULL),
(77, 'Standard', 1, 'USD', '13', '14', '18', '34', '2011', 118.00, '', NULL, NULL),
(78, 'Standard', 1, 'USD', '13', '14', '18', '34', '2012', 116.00, '', NULL, NULL),
(79, 'Standard', 1, 'USD', '13', '14', '18', '34', '2013', 109.00, '', NULL, NULL),
(80, 'Standard', 1, 'USD', '13', '14', '18', '34', '2014', 114.00, '', NULL, NULL),
(81, 'Standard', 1, 'USD', '13', '14', '18', '35', '2007', NULL, '', NULL, NULL),
(82, 'Standard', 1, 'USD', '13', '14', '18', '35', '2008', NULL, '', NULL, NULL),
(83, 'Standard', 1, 'USD', '13', '14', '18', '35', '2009', NULL, '', NULL, NULL),
(84, 'Standard', 1, 'USD', '13', '14', '18', '35', '2010', NULL, '', NULL, NULL),
(85, 'Standard', 1, 'USD', '13', '14', '18', '35', '2011', NULL, '', NULL, NULL),
(86, 'Standard', 1, 'USD', '13', '14', '18', '35', '2012', NULL, '', NULL, NULL),
(87, 'Standard', 1, 'USD', '13', '14', '18', '35', '2013', NULL, '', NULL, NULL),
(88, 'Standard', 1, 'USD', '13', '14', '18', '35', '2014', NULL, '', NULL, NULL),
(89, 'Standard', 1, 'USD', '13', '14', '18', '36', '2007', 101.00, '', NULL, NULL),
(90, 'Standard', 1, 'USD', '13', '14', '18', '36', '2008', 106.00, '', NULL, NULL),
(91, 'Standard', 1, 'USD', '13', '14', '18', '36', '2009', 101.00, '', NULL, NULL),
(92, 'Standard', 1, 'USD', '13', '14', '18', '36', '2010', 113.00, '', NULL, NULL),
(93, 'Standard', 1, 'USD', '13', '14', '18', '36', '2011', 93.00, '', NULL, NULL),
(94, 'Standard', 1, 'USD', '13', '14', '18', '36', '2012', 89.00, '', NULL, NULL),
(95, 'Standard', 1, 'USD', '13', '14', '18', '36', '2013', 99.00, '', NULL, NULL),
(96, 'Standard', 1, 'USD', '13', '14', '18', '36', '2014', 107.00, '', NULL, NULL),
(97, 'Standard', 1, 'USD', '13', '14', '18', '37', '2007', 7.00, '', NULL, NULL),
(98, 'Standard', 1, 'USD', '13', '14', '18', '37', '2008', 7.00, '', NULL, NULL),
(99, 'Standard', 1, 'USD', '13', '14', '18', '37', '2009', 7.00, '', NULL, NULL),
(100, 'Standard', 1, 'USD', '13', '14', '18', '37', '2010', 7.00, '', NULL, NULL),
(101, 'Standard', 1, 'USD', '13', '14', '18', '37', '2011', 7.00, '', NULL, NULL),
(102, 'Standard', 1, 'USD', '13', '14', '18', '37', '2012', 6.00, '', NULL, NULL),
(103, 'Standard', 1, 'USD', '13', '14', '18', '37', '2013', 6.00, '', NULL, NULL),
(104, 'Standard', 1, 'USD', '13', '14', '18', '37', '2014', 6.00, '', NULL, NULL),
(105, 'Standard', 1, 'USD', '13', '14', '18', '38', '2007', 5.00, '', NULL, NULL),
(106, 'Standard', 1, 'USD', '13', '14', '18', '38', '2008', 5.00, '', NULL, NULL),
(107, 'Standard', 1, 'USD', '13', '14', '18', '38', '2009', 5.00, '', NULL, NULL),
(108, 'Standard', 1, 'USD', '13', '14', '18', '38', '2010', 5.00, '', NULL, NULL),
(109, 'Standard', 1, 'USD', '13', '14', '18', '38', '2011', 5.00, '', NULL, NULL),
(110, 'Standard', 1, 'USD', '13', '14', '18', '38', '2012', 5.00, '', NULL, NULL),
(111, 'Standard', 1, 'USD', '13', '14', '18', '38', '2013', 5.00, '', NULL, NULL),
(112, 'Standard', 1, 'USD', '13', '14', '18', '38', '2014', 5.00, '', NULL, NULL),
(113, 'Standard', 1, 'USD', '13', '15', '19', '39', '2007', 27.00, '', NULL, NULL),
(114, 'Standard', 1, 'USD', '13', '15', '19', '39', '2008', 41.00, '', NULL, NULL),
(115, 'Standard', 1, 'USD', '13', '15', '19', '39', '2009', 54.00, '', NULL, NULL),
(116, 'Standard', 1, 'USD', '13', '15', '19', '39', '2010', 60.00, '', NULL, NULL),
(117, 'Standard', 1, 'USD', '13', '15', '19', '39', '2011', 86.00, '', NULL, NULL),
(118, 'Standard', 1, 'USD', '13', '15', '19', '39', '2012', 102.00, '', NULL, NULL),
(119, 'Standard', 1, 'USD', '13', '15', '19', '39', '2013', 113.00, '', NULL, NULL),
(120, 'Standard', 1, 'USD', '13', '15', '19', '39', '2014', 126.00, '', NULL, NULL),
(121, 'Standard', 1, 'USD', '13', '15', '19', '40', '2007', NULL, '', NULL, NULL),
(122, 'Standard', 1, 'USD', '13', '15', '19', '40', '2008', NULL, '', NULL, NULL),
(123, 'Standard', 1, 'USD', '13', '15', '19', '40', '2009', NULL, '', NULL, NULL),
(124, 'Standard', 1, 'USD', '13', '15', '19', '40', '2010', NULL, '', NULL, NULL),
(125, 'Standard', 1, 'USD', '13', '15', '19', '40', '2011', NULL, '', NULL, NULL),
(126, 'Standard', 1, 'USD', '13', '15', '19', '40', '2012', NULL, '', NULL, NULL),
(127, 'Standard', 1, 'USD', '13', '15', '19', '40', '2013', NULL, '', NULL, NULL),
(128, 'Standard', 1, 'USD', '13', '15', '19', '40', '2014', NULL, '', NULL, NULL),
(129, 'Standard', 1, 'USD', '13', '15', '19', '41', '2007', NULL, '', NULL, NULL),
(130, 'Standard', 1, 'USD', '13', '15', '19', '41', '2008', NULL, '', NULL, NULL),
(131, 'Standard', 1, 'USD', '13', '15', '19', '41', '2009', NULL, '', NULL, NULL),
(132, 'Standard', 1, 'USD', '13', '15', '19', '41', '2010', NULL, '', NULL, NULL),
(133, 'Standard', 1, 'USD', '13', '15', '19', '41', '2011', NULL, '', NULL, NULL),
(134, 'Standard', 1, 'USD', '13', '15', '19', '41', '2012', NULL, '', NULL, NULL),
(135, 'Standard', 1, 'USD', '13', '15', '19', '41', '2013', NULL, '', NULL, NULL),
(136, 'Standard', 1, 'USD', '13', '15', '19', '41', '2014', NULL, '', NULL, NULL),
(137, 'Standard', 1, 'USD', '13', '15', '20', '42', '2007', NULL, '', NULL, NULL),
(138, 'Standard', 1, 'USD', '13', '15', '20', '42', '2008', NULL, '', NULL, NULL),
(139, 'Standard', 1, 'USD', '13', '15', '20', '42', '2009', NULL, '', NULL, NULL),
(140, 'Standard', 1, 'USD', '13', '15', '20', '42', '2010', NULL, '', NULL, NULL),
(141, 'Standard', 1, 'USD', '13', '15', '20', '42', '2011', NULL, '', NULL, NULL),
(142, 'Standard', 1, 'USD', '13', '15', '20', '42', '2012', NULL, '', NULL, NULL),
(143, 'Standard', 1, 'USD', '13', '15', '20', '42', '2013', NULL, '', NULL, NULL),
(144, 'Standard', 1, 'USD', '13', '15', '20', '42', '2014', NULL, '', NULL, NULL),
(145, 'Standard', 1, 'USD', '13', '15', '20', '43', '2007', NULL, '', NULL, NULL),
(146, 'Standard', 1, 'USD', '13', '15', '20', '43', '2008', NULL, '', NULL, NULL),
(147, 'Standard', 1, 'USD', '13', '15', '20', '43', '2009', NULL, '', NULL, NULL),
(148, 'Standard', 1, 'USD', '13', '15', '20', '43', '2010', NULL, '', NULL, NULL),
(149, 'Standard', 1, 'USD', '13', '15', '20', '43', '2011', NULL, '', NULL, NULL),
(150, 'Standard', 1, 'USD', '13', '15', '20', '43', '2012', NULL, '', NULL, NULL),
(151, 'Standard', 1, 'USD', '13', '15', '20', '43', '2013', NULL, '', NULL, NULL),
(152, 'Standard', 1, 'USD', '13', '15', '20', '43', '2014', NULL, '', NULL, NULL),
(153, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2007', 38.00, '', NULL, NULL),
(154, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2008', 43.00, '', NULL, NULL),
(155, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2009', 45.00, '', NULL, NULL),
(156, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2010', 52.00, '', NULL, NULL),
(157, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2011', 56.00, '', NULL, NULL),
(158, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2012', 66.00, '', NULL, NULL),
(159, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2013', 81.00, '', NULL, NULL),
(160, 'Standard', 1, 'USD', '13', '15', '20', NULL, '2014', 96.00, '', NULL, NULL),
(161, 'Standard', 1, 'USD', '13', '15', '20', '45', '2007', NULL, '', NULL, NULL),
(162, 'Standard', 1, 'USD', '13', '15', '20', '45', '2008', NULL, '', NULL, NULL),
(163, 'Standard', 1, 'USD', '13', '15', '20', '45', '2009', NULL, '', NULL, NULL),
(164, 'Standard', 1, 'USD', '13', '15', '20', '45', '2010', NULL, '', NULL, NULL),
(165, 'Standard', 1, 'USD', '13', '15', '20', '45', '2011', NULL, '', NULL, NULL),
(166, 'Standard', 1, 'USD', '13', '15', '20', '45', '2012', NULL, '', NULL, NULL),
(167, 'Standard', 1, 'USD', '13', '15', '20', '45', '2013', NULL, '', NULL, NULL),
(168, 'Standard', 1, 'USD', '13', '15', '20', '45', '2014', NULL, '', NULL, NULL),
(169, 'Standard', 1, 'USD', '13', '15', '20', '46', '2007', NULL, '', NULL, NULL),
(170, 'Standard', 1, 'USD', '13', '15', '20', '46', '2008', NULL, '', NULL, NULL),
(171, 'Standard', 1, 'USD', '13', '15', '20', '46', '2009', NULL, '', NULL, NULL),
(172, 'Standard', 1, 'USD', '13', '15', '20', '46', '2010', NULL, '', NULL, NULL),
(173, 'Standard', 1, 'USD', '13', '15', '20', '46', '2011', NULL, '', NULL, NULL),
(174, 'Standard', 1, 'USD', '13', '15', '20', '46', '2012', NULL, '', NULL, NULL),
(175, 'Standard', 1, 'USD', '13', '15', '20', '46', '2013', NULL, '', NULL, NULL),
(176, 'Standard', 1, 'USD', '13', '15', '20', '46', '2014', NULL, '', NULL, NULL),
(177, 'Standard', 1, 'USD', '13', '15', '21', '47', '2007', 0.00, '', NULL, NULL),
(178, 'Standard', 1, 'USD', '13', '15', '21', '47', '2008', 0.00, '', NULL, NULL),
(179, 'Standard', 1, 'USD', '13', '15', '21', '47', '2009', 0.00, '', NULL, NULL),
(180, 'Standard', 1, 'USD', '13', '15', '21', '47', '2010', 0.00, '', NULL, NULL),
(181, 'Standard', 1, 'USD', '13', '15', '21', '47', '2011', 0.00, '', NULL, NULL),
(182, 'Standard', 1, 'USD', '13', '15', '21', '47', '2012', 0.00, '', NULL, NULL),
(183, 'Standard', 1, 'USD', '13', '15', '21', '47', '2013', 0.00, '', NULL, NULL),
(184, 'Standard', 1, 'USD', '13', '15', '21', '47', '2014', 0.00, '', NULL, NULL),
(185, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2007', 11.00, '', NULL, NULL),
(186, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2008', 12.00, '', NULL, NULL),
(187, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2009', 13.00, '', NULL, NULL),
(188, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2010', 13.00, '', NULL, NULL),
(189, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2011', 14.00, '', NULL, NULL),
(190, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2012', 14.00, '', NULL, NULL),
(191, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2013', 14.00, '', NULL, NULL),
(192, 'Standard', 1, 'USD', '13', '15', '21', NULL, '2014', 13.00, '', NULL, NULL),
(193, 'Standard', 1, 'USD', '13', '15', '21', '49', '2007', 21.00, '', NULL, NULL),
(194, 'Standard', 1, 'USD', '13', '15', '21', '49', '2008', 22.00, '', NULL, NULL),
(195, 'Standard', 1, 'USD', '13', '15', '21', '49', '2009', 24.00, '', NULL, NULL),
(196, 'Standard', 1, 'USD', '13', '15', '21', '49', '2010', 24.00, '', NULL, NULL),
(197, 'Standard', 1, 'USD', '13', '15', '21', '49', '2011', 26.00, '', NULL, NULL),
(198, 'Standard', 1, 'USD', '13', '15', '21', '49', '2012', 27.00, '', NULL, NULL),
(199, 'Standard', 1, 'USD', '13', '15', '21', '49', '2013', 26.00, '', NULL, NULL),
(200, 'Standard', 1, 'USD', '13', '15', '21', '49', '2014', 25.00, '', NULL, NULL),
(201, 'Standard', 1, 'USD', '13', '15', '21', '50', '2007', NULL, '', NULL, NULL),
(202, 'Standard', 1, 'USD', '13', '15', '21', '50', '2008', 5.00, '', NULL, NULL),
(203, 'Standard', 1, 'USD', '13', '15', '21', '50', '2009', 6.00, '', NULL, NULL),
(204, 'Standard', 1, 'USD', '13', '15', '21', '50', '2010', 6.00, '', NULL, NULL),
(205, 'Standard', 1, 'USD', '13', '15', '21', '50', '2011', 5.00, '', NULL, NULL),
(206, 'Standard', 1, 'USD', '13', '15', '21', '50', '2012', 4.00, '', NULL, NULL),
(207, 'Standard', 1, 'USD', '13', '15', '21', '50', '2013', 4.00, '', NULL, NULL),
(208, 'Standard', 1, 'USD', '13', '15', '21', '50', '2014', 3.00, '', NULL, NULL),
(209, 'Standard', 1, 'USD', '13', '15', '21', '51', '2007', NULL, '', NULL, NULL),
(210, 'Standard', 1, 'USD', '13', '15', '21', '51', '2008', NULL, '', NULL, NULL),
(211, 'Standard', 1, 'USD', '13', '15', '21', '51', '2009', NULL, '', NULL, NULL),
(212, 'Standard', 1, 'USD', '13', '15', '21', '51', '2010', NULL, '', NULL, NULL),
(213, 'Standard', 1, 'USD', '13', '15', '21', '51', '2011', NULL, '', NULL, NULL),
(214, 'Standard', 1, 'USD', '13', '15', '21', '51', '2012', NULL, '', NULL, NULL),
(215, 'Standard', 1, 'USD', '13', '15', '21', '51', '2013', NULL, '', NULL, NULL),
(216, 'Standard', 1, 'USD', '13', '15', '21', '51', '2014', NULL, '', NULL, NULL),
(217, 'Local', 1, 'USD', '13', '14', '16', '25', '2007', 516.00, '', NULL, NULL),
(218, 'Local', 1, 'USD', '13', '14', '16', '25', '2008', 540.00, '', NULL, NULL),
(219, 'Local', 1, 'USD', '13', '14', '16', '25', '2009', 578.00, '', NULL, NULL),
(220, 'Local', 1, 'USD', '13', '14', '16', '25', '2010', 541.00, '', NULL, NULL),
(221, 'Local', 1, 'USD', '13', '14', '16', '25', '2011', 605.00, '', NULL, NULL),
(222, 'Local', 1, 'USD', '13', '14', '16', '25', '2012', 579.00, '', NULL, NULL),
(223, 'Local', 1, 'USD', '13', '14', '16', '25', '2013', 534.00, '', NULL, NULL),
(224, 'Local', 1, 'USD', '13', '14', '16', '25', '2014', 537.00, '', NULL, NULL),
(225, 'Local', 1, 'USD', '13', '14', '16', '26', '2007', NULL, '', NULL, NULL),
(226, 'Local', 1, 'USD', '13', '14', '16', '26', '2008', NULL, '', NULL, NULL),
(227, 'Local', 1, 'USD', '13', '14', '16', '26', '2009', NULL, '', NULL, NULL),
(228, 'Local', 1, 'USD', '13', '14', '16', '26', '2010', NULL, '', NULL, NULL),
(229, 'Local', 1, 'USD', '13', '14', '16', '26', '2011', NULL, '', NULL, NULL),
(230, 'Local', 1, 'USD', '13', '14', '16', '26', '2012', NULL, '', NULL, NULL),
(231, 'Local', 1, 'USD', '13', '14', '16', '26', '2013', NULL, '', NULL, NULL),
(232, 'Local', 1, 'USD', '13', '14', '16', '26', '2014', NULL, '', NULL, NULL),
(233, 'Local', 1, 'USD', '13', '14', '16', '27', '2007', NULL, '', NULL, NULL),
(234, 'Local', 1, 'USD', '13', '14', '16', '27', '2008', NULL, '', NULL, NULL),
(235, 'Local', 1, 'USD', '13', '14', '16', '27', '2009', NULL, '', NULL, NULL),
(236, 'Local', 1, 'USD', '13', '14', '16', '27', '2010', NULL, '', NULL, NULL),
(237, 'Local', 1, 'USD', '13', '14', '16', '27', '2011', NULL, '', NULL, NULL),
(238, 'Local', 1, 'USD', '13', '14', '16', '27', '2012', NULL, '', NULL, NULL),
(239, 'Local', 1, 'USD', '13', '14', '16', '27', '2013', NULL, '', NULL, NULL),
(240, 'Local', 1, 'USD', '13', '14', '16', '27', '2014', NULL, '', NULL, NULL),
(241, 'Local', 1, 'USD', '13', '14', '17', '28', '2007', 4.00, '', NULL, NULL),
(242, 'Local', 1, 'USD', '13', '14', '17', '28', '2008', 4.00, '', NULL, NULL),
(243, 'Local', 1, 'USD', '13', '14', '17', '28', '2009', 4.00, '', NULL, NULL),
(244, 'Local', 1, 'USD', '13', '14', '17', '28', '2010', 4.00, '', NULL, NULL),
(245, 'Local', 1, 'USD', '13', '14', '17', '28', '2011', 4.00, '', NULL, NULL),
(246, 'Local', 1, 'USD', '13', '14', '17', '28', '2012', 5.00, '', NULL, NULL),
(247, 'Local', 1, 'USD', '13', '14', '17', '28', '2013', 5.00, '', NULL, NULL),
(248, 'Local', 1, 'USD', '13', '14', '17', '28', '2014', 5.00, '', NULL, NULL),
(249, 'Local', 1, 'USD', '13', '14', '17', '29', '2007', NULL, '', NULL, NULL),
(250, 'Local', 1, 'USD', '13', '14', '17', '29', '2008', NULL, '', NULL, NULL),
(251, 'Local', 1, 'USD', '13', '14', '17', '29', '2009', NULL, '', NULL, NULL),
(252, 'Local', 1, 'USD', '13', '14', '17', '29', '2010', NULL, '', NULL, NULL),
(253, 'Local', 1, 'USD', '13', '14', '17', '29', '2011', NULL, '', NULL, NULL),
(254, 'Local', 1, 'USD', '13', '14', '17', '29', '2012', NULL, '', NULL, NULL),
(255, 'Local', 1, 'USD', '13', '14', '17', '29', '2013', NULL, '', NULL, NULL),
(256, 'Local', 1, 'USD', '13', '14', '17', '29', '2014', NULL, '', NULL, NULL),
(257, 'Local', 1, 'USD', '13', '14', '17', NULL, '2007', 380.00, '', NULL, NULL),
(258, 'Local', 1, 'USD', '13', '14', '17', NULL, '2008', 402.00, '', NULL, NULL),
(259, 'Local', 1, 'USD', '13', '14', '17', NULL, '2009', 400.00, '', NULL, NULL),
(260, 'Local', 1, 'USD', '13', '14', '17', NULL, '2010', 424.00, '', NULL, NULL),
(261, 'Local', 1, 'USD', '13', '14', '17', NULL, '2011', 411.00, '', NULL, NULL),
(262, 'Local', 1, 'USD', '13', '14', '17', NULL, '2012', 451.00, '', NULL, NULL),
(263, 'Local', 1, 'USD', '13', '14', '17', NULL, '2013', 461.00, '', NULL, NULL),
(264, 'Local', 1, 'USD', '13', '14', '17', NULL, '2014', 476.00, '', NULL, NULL),
(265, 'Local', 1, 'USD', '13', '14', '17', '31', '2007', NULL, '', NULL, NULL),
(266, 'Local', 1, 'USD', '13', '14', '17', '31', '2008', NULL, '', NULL, NULL),
(267, 'Local', 1, 'USD', '13', '14', '17', '31', '2009', NULL, '', NULL, NULL),
(268, 'Local', 1, 'USD', '13', '14', '17', '31', '2010', NULL, '', NULL, NULL),
(269, 'Local', 1, 'USD', '13', '14', '17', '31', '2011', NULL, '', NULL, NULL),
(270, 'Local', 1, 'USD', '13', '14', '17', '31', '2012', NULL, '', NULL, NULL),
(271, 'Local', 1, 'USD', '13', '14', '17', '31', '2013', NULL, '', NULL, NULL),
(272, 'Local', 1, 'USD', '13', '14', '17', '31', '2014', NULL, '', NULL, NULL),
(273, 'Local', 1, 'USD', '13', '14', '18', '32', '2007', NULL, '', NULL, NULL),
(274, 'Local', 1, 'USD', '13', '14', '18', '32', '2008', NULL, '', NULL, NULL),
(275, 'Local', 1, 'USD', '13', '14', '18', '32', '2009', NULL, '', NULL, NULL),
(276, 'Local', 1, 'USD', '13', '14', '18', '32', '2010', NULL, '', NULL, NULL),
(277, 'Local', 1, 'USD', '13', '14', '18', '32', '2011', NULL, '', NULL, NULL),
(278, 'Local', 1, 'USD', '13', '14', '18', '32', '2012', NULL, '', NULL, NULL),
(279, 'Local', 1, 'USD', '13', '14', '18', '32', '2013', NULL, '', NULL, NULL),
(280, 'Local', 1, 'USD', '13', '14', '18', '32', '2014', NULL, '', NULL, NULL),
(281, 'Local', 1, 'USD', '13', '14', '18', NULL, '2007', 69.00, '', NULL, NULL),
(282, 'Local', 1, 'USD', '13', '14', '18', NULL, '2008', 70.00, '', NULL, NULL),
(283, 'Local', 1, 'USD', '13', '14', '18', NULL, '2009', 65.00, '', NULL, NULL),
(284, 'Local', 1, 'USD', '13', '14', '18', NULL, '2010', 57.00, '', NULL, NULL),
(285, 'Local', 1, 'USD', '13', '14', '18', NULL, '2011', 64.00, '', NULL, NULL),
(286, 'Local', 1, 'USD', '13', '14', '18', NULL, '2012', 63.00, '', NULL, NULL),
(287, 'Local', 1, 'USD', '13', '14', '18', NULL, '2013', 59.00, '', NULL, NULL),
(288, 'Local', 1, 'USD', '13', '14', '18', NULL, '2014', 62.00, '', NULL, NULL),
(289, 'Local', 1, 'USD', '13', '14', '18', '34', '2007', 125.00, '', NULL, NULL),
(290, 'Local', 1, 'USD', '13', '14', '18', '34', '2008', 127.00, '', NULL, NULL),
(291, 'Local', 1, 'USD', '13', '14', '18', '34', '2009', 118.00, '', NULL, NULL),
(292, 'Local', 1, 'USD', '13', '14', '18', '34', '2010', 105.00, '', NULL, NULL),
(293, 'Local', 1, 'USD', '13', '14', '18', '34', '2011', 118.00, '', NULL, NULL),
(294, 'Local', 1, 'USD', '13', '14', '18', '34', '2012', 116.00, '', NULL, NULL),
(295, 'Local', 1, 'USD', '13', '14', '18', '34', '2013', 109.00, '', NULL, NULL),
(296, 'Local', 1, 'USD', '13', '14', '18', '34', '2014', 114.00, '', NULL, NULL),
(297, 'Local', 1, 'USD', '13', '14', '18', '35', '2007', NULL, '', NULL, NULL),
(298, 'Local', 1, 'USD', '13', '14', '18', '35', '2008', NULL, '', NULL, NULL),
(299, 'Local', 1, 'USD', '13', '14', '18', '35', '2009', NULL, '', NULL, NULL),
(300, 'Local', 1, 'USD', '13', '14', '18', '35', '2010', NULL, '', NULL, NULL),
(301, 'Local', 1, 'USD', '13', '14', '18', '35', '2011', NULL, '', NULL, NULL),
(302, 'Local', 1, 'USD', '13', '14', '18', '35', '2012', NULL, '', NULL, NULL),
(303, 'Local', 1, 'USD', '13', '14', '18', '35', '2013', NULL, '', NULL, NULL),
(304, 'Local', 1, 'USD', '13', '14', '18', '35', '2014', NULL, '', NULL, NULL),
(305, 'Local', 1, 'USD', '13', '14', '18', '36', '2007', 101.00, '', NULL, NULL),
(306, 'Local', 1, 'USD', '13', '14', '18', '36', '2008', 106.00, '', NULL, NULL),
(307, 'Local', 1, 'USD', '13', '14', '18', '36', '2009', 101.00, '', NULL, NULL),
(308, 'Local', 1, 'USD', '13', '14', '18', '36', '2010', 113.00, '', NULL, NULL),
(309, 'Local', 1, 'USD', '13', '14', '18', '36', '2011', 93.00, '', NULL, NULL),
(310, 'Local', 1, 'USD', '13', '14', '18', '36', '2012', 89.00, '', NULL, NULL),
(311, 'Local', 1, 'USD', '13', '14', '18', '36', '2013', 99.00, '', NULL, NULL),
(312, 'Local', 1, 'USD', '13', '14', '18', '36', '2014', 107.00, '', NULL, NULL),
(313, 'Local', 1, 'USD', '13', '14', '18', '37', '2007', 7.00, '', NULL, NULL),
(314, 'Local', 1, 'USD', '13', '14', '18', '37', '2008', 7.00, '', NULL, NULL),
(315, 'Local', 1, 'USD', '13', '14', '18', '37', '2009', 7.00, '', NULL, NULL),
(316, 'Local', 1, 'USD', '13', '14', '18', '37', '2010', 7.00, '', NULL, NULL),
(317, 'Local', 1, 'USD', '13', '14', '18', '37', '2011', 7.00, '', NULL, NULL),
(318, 'Local', 1, 'USD', '13', '14', '18', '37', '2012', 6.00, '', NULL, NULL),
(319, 'Local', 1, 'USD', '13', '14', '18', '37', '2013', 6.00, '', NULL, NULL),
(320, 'Local', 1, 'USD', '13', '14', '18', '37', '2014', 6.00, '', NULL, NULL),
(321, 'Local', 1, 'USD', '13', '14', '18', '38', '2007', 5.00, '', NULL, NULL),
(322, 'Local', 1, 'USD', '13', '14', '18', '38', '2008', 5.00, '', NULL, NULL),
(323, 'Local', 1, 'USD', '13', '14', '18', '38', '2009', 5.00, '', NULL, NULL),
(324, 'Local', 1, 'USD', '13', '14', '18', '38', '2010', 5.00, '', NULL, NULL),
(325, 'Local', 1, 'USD', '13', '14', '18', '38', '2011', 5.00, '', NULL, NULL),
(326, 'Local', 1, 'USD', '13', '14', '18', '38', '2012', 5.00, '', NULL, NULL),
(327, 'Local', 1, 'USD', '13', '14', '18', '38', '2013', 5.00, '', NULL, NULL),
(328, 'Local', 1, 'USD', '13', '14', '18', '38', '2014', 5.00, '', NULL, NULL),
(329, 'Local', 1, 'USD', '13', '15', '19', '39', '2007', 27.00, '', NULL, NULL),
(330, 'Local', 1, 'USD', '13', '15', '19', '39', '2008', 41.00, '', NULL, NULL),
(331, 'Local', 1, 'USD', '13', '15', '19', '39', '2009', 54.00, '', NULL, NULL),
(332, 'Local', 1, 'USD', '13', '15', '19', '39', '2010', 60.00, '', NULL, NULL),
(333, 'Local', 1, 'USD', '13', '15', '19', '39', '2011', 86.00, '', NULL, NULL),
(334, 'Local', 1, 'USD', '13', '15', '19', '39', '2012', 102.00, '', NULL, NULL),
(335, 'Local', 1, 'USD', '13', '15', '19', '39', '2013', 113.00, '', NULL, NULL),
(336, 'Local', 1, 'USD', '13', '15', '19', '39', '2014', 126.00, '', NULL, NULL),
(337, 'Local', 1, 'USD', '13', '15', '19', '40', '2007', NULL, '', NULL, NULL),
(338, 'Local', 1, 'USD', '13', '15', '19', '40', '2008', NULL, '', NULL, NULL),
(339, 'Local', 1, 'USD', '13', '15', '19', '40', '2009', NULL, '', NULL, NULL),
(340, 'Local', 1, 'USD', '13', '15', '19', '40', '2010', NULL, '', NULL, NULL),
(341, 'Local', 1, 'USD', '13', '15', '19', '40', '2011', NULL, '', NULL, NULL),
(342, 'Local', 1, 'USD', '13', '15', '19', '40', '2012', NULL, '', NULL, NULL),
(343, 'Local', 1, 'USD', '13', '15', '19', '40', '2013', NULL, '', NULL, NULL),
(344, 'Local', 1, 'USD', '13', '15', '19', '40', '2014', NULL, '', NULL, NULL),
(345, 'Local', 1, 'USD', '13', '15', '19', '41', '2007', NULL, '', NULL, NULL),
(346, 'Local', 1, 'USD', '13', '15', '19', '41', '2008', NULL, '', NULL, NULL),
(347, 'Local', 1, 'USD', '13', '15', '19', '41', '2009', NULL, '', NULL, NULL),
(348, 'Local', 1, 'USD', '13', '15', '19', '41', '2010', NULL, '', NULL, NULL),
(349, 'Local', 1, 'USD', '13', '15', '19', '41', '2011', NULL, '', NULL, NULL),
(350, 'Local', 1, 'USD', '13', '15', '19', '41', '2012', NULL, '', NULL, NULL),
(351, 'Local', 1, 'USD', '13', '15', '19', '41', '2013', NULL, '', NULL, NULL),
(352, 'Local', 1, 'USD', '13', '15', '19', '41', '2014', NULL, '', NULL, NULL),
(353, 'Local', 1, 'USD', '13', '15', '20', '42', '2007', NULL, '', NULL, NULL),
(354, 'Local', 1, 'USD', '13', '15', '20', '42', '2008', NULL, '', NULL, NULL),
(355, 'Local', 1, 'USD', '13', '15', '20', '42', '2009', NULL, '', NULL, NULL),
(356, 'Local', 1, 'USD', '13', '15', '20', '42', '2010', NULL, '', NULL, NULL),
(357, 'Local', 1, 'USD', '13', '15', '20', '42', '2011', NULL, '', NULL, NULL),
(358, 'Local', 1, 'USD', '13', '15', '20', '42', '2012', NULL, '', NULL, NULL),
(359, 'Local', 1, 'USD', '13', '15', '20', '42', '2013', NULL, '', NULL, NULL),
(360, 'Local', 1, 'USD', '13', '15', '20', '42', '2014', NULL, '', NULL, NULL),
(361, 'Local', 1, 'USD', '13', '15', '20', '43', '2007', NULL, '', NULL, NULL),
(362, 'Local', 1, 'USD', '13', '15', '20', '43', '2008', NULL, '', NULL, NULL),
(363, 'Local', 1, 'USD', '13', '15', '20', '43', '2009', NULL, '', NULL, NULL),
(364, 'Local', 1, 'USD', '13', '15', '20', '43', '2010', NULL, '', NULL, NULL),
(365, 'Local', 1, 'USD', '13', '15', '20', '43', '2011', NULL, '', NULL, NULL),
(366, 'Local', 1, 'USD', '13', '15', '20', '43', '2012', NULL, '', NULL, NULL),
(367, 'Local', 1, 'USD', '13', '15', '20', '43', '2013', NULL, '', NULL, NULL),
(368, 'Local', 1, 'USD', '13', '15', '20', '43', '2014', NULL, '', NULL, NULL),
(369, 'Local', 1, 'USD', '13', '15', '20', NULL, '2007', 38.00, '', NULL, NULL),
(370, 'Local', 1, 'USD', '13', '15', '20', NULL, '2008', 43.00, '', NULL, NULL),
(371, 'Local', 1, 'USD', '13', '15', '20', NULL, '2009', 45.00, '', NULL, NULL),
(372, 'Local', 1, 'USD', '13', '15', '20', NULL, '2010', 52.00, '', NULL, NULL),
(373, 'Local', 1, 'USD', '13', '15', '20', NULL, '2011', 56.00, '', NULL, NULL),
(374, 'Local', 1, 'USD', '13', '15', '20', NULL, '2012', 66.00, '', NULL, NULL),
(375, 'Local', 1, 'USD', '13', '15', '20', NULL, '2013', 81.00, '', NULL, NULL),
(376, 'Local', 1, 'USD', '13', '15', '20', NULL, '2014', 96.00, '', NULL, NULL),
(377, 'Local', 1, 'USD', '13', '15', '20', '45', '2007', NULL, '', NULL, NULL),
(378, 'Local', 1, 'USD', '13', '15', '20', '45', '2008', NULL, '', NULL, NULL),
(379, 'Local', 1, 'USD', '13', '15', '20', '45', '2009', NULL, '', NULL, NULL),
(380, 'Local', 1, 'USD', '13', '15', '20', '45', '2010', NULL, '', NULL, NULL),
(381, 'Local', 1, 'USD', '13', '15', '20', '45', '2011', NULL, '', NULL, NULL),
(382, 'Local', 1, 'USD', '13', '15', '20', '45', '2012', NULL, '', NULL, NULL),
(383, 'Local', 1, 'USD', '13', '15', '20', '45', '2013', NULL, '', NULL, NULL),
(384, 'Local', 1, 'USD', '13', '15', '20', '45', '2014', NULL, '', NULL, NULL),
(385, 'Local', 1, 'USD', '13', '15', '20', '46', '2007', NULL, '', NULL, NULL),
(386, 'Local', 1, 'USD', '13', '15', '20', '46', '2008', NULL, '', NULL, NULL),
(387, 'Local', 1, 'USD', '13', '15', '20', '46', '2009', NULL, '', NULL, NULL),
(388, 'Local', 1, 'USD', '13', '15', '20', '46', '2010', NULL, '', NULL, NULL),
(389, 'Local', 1, 'USD', '13', '15', '20', '46', '2011', NULL, '', NULL, NULL),
(390, 'Local', 1, 'USD', '13', '15', '20', '46', '2012', NULL, '', NULL, NULL),
(391, 'Local', 1, 'USD', '13', '15', '20', '46', '2013', NULL, '', NULL, NULL),
(392, 'Local', 1, 'USD', '13', '15', '20', '46', '2014', NULL, '', NULL, NULL),
(393, 'Local', 1, 'USD', '13', '15', '21', '47', '2007', 0.00, '', NULL, NULL),
(394, 'Local', 1, 'USD', '13', '15', '21', '47', '2008', 0.00, '', NULL, NULL),
(395, 'Local', 1, 'USD', '13', '15', '21', '47', '2009', 0.00, '', NULL, NULL),
(396, 'Local', 1, 'USD', '13', '15', '21', '47', '2010', 0.00, '', NULL, NULL),
(397, 'Local', 1, 'USD', '13', '15', '21', '47', '2011', 0.00, '', NULL, NULL),
(398, 'Local', 1, 'USD', '13', '15', '21', '47', '2012', 0.00, '', NULL, NULL),
(399, 'Local', 1, 'USD', '13', '15', '21', '47', '2013', 0.00, '', NULL, NULL),
(400, 'Local', 1, 'USD', '13', '15', '21', '47', '2014', 0.00, '', NULL, NULL),
(401, 'Local', 1, 'USD', '13', '15', '21', NULL, '2007', 11.00, '', NULL, NULL),
(402, 'Local', 1, 'USD', '13', '15', '21', NULL, '2008', 12.00, '', NULL, NULL),
(403, 'Local', 1, 'USD', '13', '15', '21', NULL, '2009', 13.00, '', NULL, NULL),
(404, 'Local', 1, 'USD', '13', '15', '21', NULL, '2010', 13.00, '', NULL, NULL),
(405, 'Local', 1, 'USD', '13', '15', '21', NULL, '2011', 14.00, '', NULL, NULL),
(406, 'Local', 1, 'USD', '13', '15', '21', NULL, '2012', 14.00, '', NULL, NULL),
(407, 'Local', 1, 'USD', '13', '15', '21', NULL, '2013', 14.00, '', NULL, NULL),
(408, 'Local', 1, 'USD', '13', '15', '21', NULL, '2014', 13.00, '', NULL, NULL),
(409, 'Local', 1, 'USD', '13', '15', '21', '49', '2007', 21.00, '', NULL, NULL),
(410, 'Local', 1, 'USD', '13', '15', '21', '49', '2008', 22.00, '', NULL, NULL),
(411, 'Local', 1, 'USD', '13', '15', '21', '49', '2009', 24.00, '', NULL, NULL),
(412, 'Local', 1, 'USD', '13', '15', '21', '49', '2010', 24.00, '', NULL, NULL),
(413, 'Local', 1, 'USD', '13', '15', '21', '49', '2011', 26.00, '', NULL, NULL),
(414, 'Local', 1, 'USD', '13', '15', '21', '49', '2012', 27.00, '', NULL, NULL),
(415, 'Local', 1, 'USD', '13', '15', '21', '49', '2013', 26.00, '', NULL, NULL),
(416, 'Local', 1, 'USD', '13', '15', '21', '49', '2014', 25.00, '', NULL, NULL),
(417, 'Local', 1, 'USD', '13', '15', '21', '50', '2007', NULL, '', NULL, NULL),
(418, 'Local', 1, 'USD', '13', '15', '21', '50', '2008', 5.00, '', NULL, NULL),
(419, 'Local', 1, 'USD', '13', '15', '21', '50', '2009', 6.00, '', NULL, NULL),
(420, 'Local', 1, 'USD', '13', '15', '21', '50', '2010', 6.00, '', NULL, NULL),
(421, 'Local', 1, 'USD', '13', '15', '21', '50', '2011', 5.00, '', NULL, NULL),
(422, 'Local', 1, 'USD', '13', '15', '21', '50', '2012', 4.00, '', NULL, NULL),
(423, 'Local', 1, 'USD', '13', '15', '21', '50', '2013', 4.00, '', NULL, NULL),
(424, 'Local', 1, 'USD', '13', '15', '21', '50', '2014', 3.00, '', NULL, NULL),
(425, 'Local', 1, 'USD', '13', '15', '21', '51', '2007', NULL, '', NULL, NULL),
(426, 'Local', 1, 'USD', '13', '15', '21', '51', '2008', NULL, '', NULL, NULL),
(427, 'Local', 1, 'USD', '13', '15', '21', '51', '2009', NULL, '', NULL, NULL),
(428, 'Local', 1, 'USD', '13', '15', '21', '51', '2010', NULL, '', NULL, NULL),
(429, 'Local', 1, 'USD', '13', '15', '21', '51', '2011', NULL, '', NULL, NULL),
(430, 'Local', 1, 'USD', '13', '15', '21', '51', '2012', NULL, '', NULL, NULL),
(431, 'Local', 1, 'USD', '13', '15', '21', '51', '2013', NULL, '', NULL, NULL),
(432, 'Local', 1, 'USD', '13', '15', '21', '51', '2014', NULL, '', NULL, NULL),
(433, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2015', 516.00, '', NULL, NULL),
(434, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2016', 501.00, '', NULL, NULL),
(435, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2017', 507.00, '', NULL, NULL),
(436, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2018', 520.00, '', NULL, NULL),
(437, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2019', 488.00, '', NULL, NULL),
(438, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2020', 462.00, '', NULL, NULL),
(439, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2021', 477.00, '', NULL, NULL),
(440, 'Local', 1, 'LocalCurr', '13', '14', '16', '25', '2022', 449.00, '', NULL, NULL),
(441, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2015', NULL, '', NULL, NULL),
(442, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2016', NULL, '', NULL, NULL),
(443, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2017', NULL, '', NULL, NULL),
(444, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2018', NULL, '', NULL, NULL),
(445, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2019', NULL, '', NULL, NULL),
(446, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2020', NULL, '', NULL, NULL),
(447, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2021', NULL, '', NULL, NULL),
(448, 'Local', 1, 'LocalCurr', '13', '14', '16', '26', '2022', NULL, '', NULL, NULL),
(449, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2015', NULL, '', NULL, NULL),
(450, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2016', NULL, '', NULL, NULL),
(451, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2017', NULL, '', NULL, NULL),
(452, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2018', NULL, '', NULL, NULL),
(453, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2019', NULL, '', NULL, NULL),
(454, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2020', NULL, '', NULL, NULL),
(455, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2021', NULL, '', NULL, NULL),
(456, 'Local', 1, 'LocalCurr', '13', '14', '16', '27', '2022', NULL, '', NULL, NULL),
(457, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2015', 5.00, '', NULL, NULL),
(458, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2016', 5.00, '', NULL, NULL),
(459, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2017', 5.00, '', NULL, NULL),
(460, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2018', 5.00, '', NULL, NULL),
(461, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2019', 5.00, '', NULL, NULL),
(462, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2020', 3.00, '', NULL, NULL),
(463, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2021', 4.00, '', NULL, NULL),
(464, 'Local', 1, 'LocalCurr', '13', '14', '17', '28', '2022', 5.00, '', NULL, NULL),
(465, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2015', NULL, '', NULL, NULL),
(466, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2016', NULL, '', NULL, NULL),
(467, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2017', NULL, '', NULL, NULL),
(468, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2018', NULL, '', NULL, NULL),
(469, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2019', NULL, '', NULL, NULL),
(470, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2020', NULL, '', NULL, NULL),
(471, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2021', NULL, '', NULL, NULL),
(472, 'Local', 1, 'LocalCurr', '13', '14', '17', '29', '2022', NULL, '', NULL, NULL),
(473, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2015', 487.00, '', NULL, NULL),
(474, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2016', 502.00, '', NULL, NULL),
(475, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2017', 506.00, '', NULL, NULL),
(476, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2018', 513.00, '', NULL, NULL),
(477, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2019', 514.00, '', NULL, NULL),
(478, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2020', 345.00, '', NULL, NULL),
(479, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2021', 436.00, '', NULL, NULL),
(480, 'Local', 1, 'LocalCurr', '13', '14', '17', NULL, '2022', 472.00, '', NULL, NULL),
(481, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2015', NULL, '', NULL, NULL),
(482, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2016', NULL, '', NULL, NULL),
(483, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2017', NULL, '', NULL, NULL),
(484, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2018', NULL, '', NULL, NULL),
(485, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2019', NULL, '', NULL, NULL),
(486, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2020', NULL, '', NULL, NULL),
(487, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2021', NULL, '', NULL, NULL),
(488, 'Local', 1, 'LocalCurr', '13', '14', '17', '31', '2022', NULL, '', NULL, NULL),
(489, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2015', NULL, '', NULL, NULL),
(490, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2016', NULL, '', NULL, NULL),
(491, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2017', NULL, '', NULL, NULL),
(492, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2018', NULL, '', NULL, NULL),
(493, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2019', NULL, '', NULL, NULL),
(494, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2020', NULL, '', NULL, NULL),
(495, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2021', NULL, '', NULL, NULL),
(496, 'Local', 1, 'LocalCurr', '13', '14', '18', '32', '2022', NULL, '', NULL, NULL),
(497, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2015', 74.00, '', NULL, NULL),
(498, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2016', 78.00, '', NULL, NULL),
(499, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2017', 79.00, '', NULL, NULL),
(500, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2018', 75.00, '', NULL, NULL),
(501, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2019', 77.00, '', NULL, NULL),
(502, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2020', 38.00, '', NULL, NULL),
(503, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2021', 29.00, '', NULL, NULL),
(504, 'Local', 1, 'LocalCurr', '13', '14', '18', NULL, '2022', 62.00, '', NULL, NULL),
(505, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2015', 137.00, '', NULL, NULL),
(506, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2016', 145.00, '', NULL, NULL),
(507, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2017', 147.00, '', NULL, NULL),
(508, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2018', 140.00, '', NULL, NULL),
(509, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2019', 143.00, '', NULL, NULL),
(510, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2020', 71.00, '', NULL, NULL),
(511, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2021', 55.00, '', NULL, NULL),
(512, 'Local', 1, 'LocalCurr', '13', '14', '18', '34', '2022', 115.00, '', NULL, NULL),
(513, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2015', NULL, '', NULL, NULL),
(514, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2016', NULL, '', NULL, NULL),
(515, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2017', NULL, '', NULL, NULL),
(516, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2018', NULL, '', NULL, NULL),
(517, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2019', NULL, '', NULL, NULL),
(518, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2020', NULL, '', NULL, NULL),
(519, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2021', NULL, '', NULL, NULL),
(520, 'Local', 1, 'LocalCurr', '13', '14', '18', '35', '2022', NULL, '', NULL, NULL),
(521, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2015', 80.00, '', NULL, NULL),
(522, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2016', 86.00, '', NULL, NULL),
(523, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2017', 90.00, '', NULL, NULL),
(524, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2018', 107.00, '', NULL, NULL),
(525, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2019', 114.00, '', NULL, NULL),
(526, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2020', 68.00, '', NULL, NULL),
(527, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2021', 61.00, '', NULL, NULL),
(528, 'Local', 1, 'LocalCurr', '13', '14', '18', '36', '2022', 124.00, '', NULL, NULL),
(529, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2015', 6.00, '', NULL, NULL),
(530, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2016', 6.00, '', NULL, NULL),
(531, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2017', 6.00, '', NULL, NULL),
(532, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2018', 5.00, '', NULL, NULL),
(533, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2019', 2.00, '', NULL, NULL),
(534, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2020', 2.00, '', NULL, NULL),
(535, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2021', 1.00, '', NULL, NULL),
(536, 'Local', 1, 'LocalCurr', '13', '14', '18', '37', '2022', 1.00, '', NULL, NULL),
(537, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2015', 5.00, '', NULL, NULL),
(538, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2016', 5.00, '', NULL, NULL),
(539, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2017', 5.00, '', NULL, NULL),
(540, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2018', 5.00, '', NULL, NULL),
(541, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2019', 3.00, '', NULL, NULL),
(542, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2020', 1.00, '', NULL, NULL),
(543, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2021', 1.00, '', NULL, NULL),
(544, 'Local', 1, 'LocalCurr', '13', '14', '18', '38', '2022', 1.00, '', NULL, NULL),
(545, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2015', 137.00, '', NULL, NULL),
(546, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2016', 145.00, '', NULL, NULL),
(547, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2017', 160.00, '', NULL, NULL),
(548, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2018', 178.00, '', NULL, NULL),
(549, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2019', 182.00, '', NULL, NULL),
(550, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2020', 216.00, '', NULL, NULL),
(551, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2021', 240.00, '', NULL, NULL),
(552, 'Local', 1, 'LocalCurr', '13', '15', '19', '39', '2022', 247.00, '', NULL, NULL),
(553, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2015', NULL, '', NULL, NULL),
(554, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2016', NULL, '', NULL, NULL),
(555, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2017', NULL, '', NULL, NULL),
(556, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2018', NULL, '', NULL, NULL),
(557, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2019', NULL, '', NULL, NULL),
(558, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2020', NULL, '', NULL, NULL),
(559, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2021', NULL, '', NULL, NULL),
(560, 'Local', 1, 'LocalCurr', '13', '15', '19', '40', '2022', NULL, '', NULL, NULL),
(561, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2015', NULL, '', NULL, NULL),
(562, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2016', NULL, '', NULL, NULL),
(563, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2017', NULL, '', NULL, NULL),
(564, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2018', NULL, '', NULL, NULL),
(565, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2019', NULL, '', NULL, NULL),
(566, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2020', NULL, '', NULL, NULL),
(567, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2021', NULL, '', NULL, NULL),
(568, 'Local', 1, 'LocalCurr', '13', '15', '19', '41', '2022', NULL, '', NULL, NULL),
(569, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2015', NULL, '', NULL, NULL),
(570, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2016', NULL, '', NULL, NULL),
(571, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2017', NULL, '', NULL, NULL),
(572, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2018', NULL, '', NULL, NULL),
(573, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2019', NULL, '', NULL, NULL),
(574, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2020', NULL, '', NULL, NULL),
(575, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2021', NULL, '', NULL, NULL),
(576, 'Local', 1, 'LocalCurr', '13', '15', '20', '42', '2022', NULL, '', NULL, NULL),
(577, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2015', NULL, '', NULL, NULL),
(578, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2016', NULL, '', NULL, NULL),
(579, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2017', NULL, '', NULL, NULL),
(580, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2018', NULL, '', NULL, NULL),
(581, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2019', NULL, '', NULL, NULL),
(582, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2020', NULL, '', NULL, NULL),
(583, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2021', NULL, '', NULL, NULL),
(584, 'Local', 1, 'LocalCurr', '13', '15', '20', '43', '2022', NULL, '', NULL, NULL),
(585, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2015', 109.00, '', NULL, NULL),
(586, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2016', 129.00, '', NULL, NULL),
(587, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2017', 145.00, '', NULL, NULL),
(588, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2018', 164.00, '', NULL, NULL),
(589, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2019', 192.00, '', NULL, NULL),
(590, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2020', 174.00, '', NULL, NULL),
(591, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2021', 244.00, '', NULL, NULL),
(592, 'Local', 1, 'LocalCurr', '13', '15', '20', NULL, '2022', 301.00, '', NULL, NULL),
(593, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2015', NULL, '', NULL, NULL),
(594, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2016', NULL, '', NULL, NULL),
(595, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2017', NULL, '', NULL, NULL),
(596, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2018', NULL, '', NULL, NULL),
(597, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2019', NULL, '', NULL, NULL),
(598, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2020', NULL, '', NULL, NULL),
(599, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2021', NULL, '', NULL, NULL),
(600, 'Local', 1, 'LocalCurr', '13', '15', '20', '45', '2022', 2.00, '', NULL, NULL),
(601, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2015', NULL, '', NULL, NULL),
(602, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2016', NULL, '', NULL, NULL),
(603, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2017', NULL, '', NULL, NULL),
(604, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2018', NULL, '', NULL, NULL),
(605, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2019', NULL, '', NULL, NULL),
(606, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2020', NULL, '', NULL, NULL),
(607, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2021', NULL, '', NULL, NULL),
(608, 'Local', 1, 'LocalCurr', '13', '15', '20', '46', '2022', NULL, '', NULL, NULL),
(609, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2015', 0.00, '', NULL, NULL),
(610, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2016', 0.00, '', NULL, NULL),
(611, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2017', 0.00, '', NULL, NULL),
(612, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2018', 0.00, '', NULL, NULL),
(613, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2019', 0.00, '', NULL, NULL);
INSERT INTO `scores` (`id`, `view`, `region_id`, `currency_id`, `level_1`, `level_2`, `level_3`, `level_4`, `year`, `score`, `comment`, `created_at`, `updated_at`) VALUES
(614, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2020', 0.00, '', NULL, NULL),
(615, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2021', 0.00, '', NULL, NULL),
(616, 'Local', 1, 'LocalCurr', '13', '15', '21', '47', '2022', 0.00, '', NULL, NULL),
(617, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2015', 14.00, '', NULL, NULL),
(618, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2016', 15.00, '', NULL, NULL),
(619, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2017', 14.00, '', NULL, NULL),
(620, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2018', 14.00, '', NULL, NULL),
(621, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2019', 14.00, '', NULL, NULL),
(622, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2020', 22.00, '', NULL, NULL),
(623, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2021', 18.00, '', NULL, NULL),
(624, 'Local', 1, 'LocalCurr', '13', '15', '21', NULL, '2022', 19.00, '', NULL, NULL),
(625, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2015', 26.00, '', NULL, NULL),
(626, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2016', 27.00, '', NULL, NULL),
(627, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2017', 25.00, '', NULL, NULL),
(628, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2018', 27.00, '', NULL, NULL),
(629, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2019', 26.00, '', NULL, NULL),
(630, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2020', 46.00, '', NULL, NULL),
(631, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2021', 55.00, '', NULL, NULL),
(632, 'Local', 1, 'LocalCurr', '13', '15', '21', '49', '2022', 47.00, '', NULL, NULL),
(633, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2015', 3.00, '', NULL, NULL),
(634, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2016', 2.00, '', NULL, NULL),
(635, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2017', 2.00, '', NULL, NULL),
(636, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2018', 3.00, '', NULL, NULL),
(637, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2019', 3.00, '', NULL, NULL),
(638, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2020', 4.00, '', NULL, NULL),
(639, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2021', 4.00, '', NULL, NULL),
(640, 'Local', 1, 'LocalCurr', '13', '15', '21', '50', '2022', 4.00, '', NULL, NULL),
(641, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2015', NULL, '', NULL, NULL),
(642, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2016', NULL, '', NULL, NULL),
(643, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2017', NULL, '', NULL, NULL),
(644, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2018', NULL, '', NULL, NULL),
(645, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2019', NULL, '', NULL, NULL),
(646, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2020', 0.00, '', NULL, NULL),
(647, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2021', 0.00, '', NULL, NULL),
(648, 'Local', 1, 'LocalCurr', '13', '15', '21', '51', '2022', 0.00, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy_policy', 'Privacy Policy', '65af59b2aa647_1705990578.png', '2024-01-15 05:19:03', '2024-01-23 00:46:18'),
(3, 'Cookies Policy', 'cookies_policy', 'Cookies Policy', NULL, '2024-01-15 05:20:53', '2024-01-15 05:20:53'),
(4, 'Terms & Conditions', 'terms-conditions', '<p>Terms &amp; Conditions</p>', NULL, '2024-01-15 05:21:24', '2024-02-09 01:46:06'),
(5, 'Legal Disclaimer', 'legal-disclaimer', '<p>other legal disclaimers</p>', NULL, '2024-01-15 05:22:17', '2024-02-09 01:44:42'),
(6, 'About Us', 'about_us', '&nbsp;A specialist gaming market research and consultancy firm. Our consultancy and advice are based on more than 50 years of experience in different areas of the gambling sector. Since 1999, GBGC has helped clients in all parts of the gambling value chain to explore opportunities, develop strategies, and improve gambling businesses around the world. Our clients include governments, regulators, investors, suppliers, and operators involved in the global gambling industry.', '65a51709f0c2b_1705318153.png', '2024-01-15 05:27:34', '2024-01-15 06:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'GBGC-Admin', 'admin@gmail.com', NULL, '$2y$12$O/HXwyvgR4KxGxORcsA3P.lyOg41i3z3gpyQINM9ZxOiWbMRPIjqO', NULL, '2024-01-05 23:49:46', '2024-01-06 02:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `websitelogos`
--

CREATE TABLE `websitelogos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websitelogos`
--

INSERT INTO `websitelogos` (`id`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, '659d3b35cf39a_1704803125.png', '659d3b35cf70d_1704803125.png', NULL, '2024-01-09 06:55:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_orderdetails`
--
ALTER TABLE `additional_orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_users`
--
ALTER TABLE `additional_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatexts`
--
ALTER TABLE `datatexts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_banners`
--
ALTER TABLE `homepage_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_reports`
--
ALTER TABLE `homepage_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_masters`
--
ALTER TABLE `level_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membershipplans`
--
ALTER TABLE `membershipplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websitelogos`
--
ALTER TABLE `websitelogos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_orderdetails`
--
ALTER TABLE `additional_orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `additional_users`
--
ALTER TABLE `additional_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datatexts`
--
ALTER TABLE `datatexts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_banners`
--
ALTER TABLE `homepage_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_reports`
--
ALTER TABLE `homepage_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level_masters`
--
ALTER TABLE `level_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `membershipplans`
--
ALTER TABLE `membershipplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websitelogos`
--
ALTER TABLE `websitelogos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
