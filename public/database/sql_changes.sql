
-- Nirali : 16-01-2024 04:05 PM
ALTER TABLE `membershipplans` CHANGE `details` `long_description` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `membershipplans` ADD `short_description` TEXT NULL AFTER `price`;

ALTER TABLE `customers` CHANGE `name` `first_name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `customers` ADD `last_name` VARCHAR(100) NULL AFTER `first_name`;
ALTER TABLE `customers` ADD `confirm_password` VARCHAR(255) NULL AFTER `password`;


-- Nirali : 17-01-2024 12:05 PM
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
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


-- Nirali : 18-01-2024 04:09 PM
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

ALTER TABLE `homepage_banners`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `homepage_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT INTO `homepage_banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'THE ONLY PROVIDER OF GLOBAL GAMBLING REVENUE DATA YOU’LL EVER USE.', '<ul>\r\n	<li>STACK THE ODDS IN YOUR FAVOUR.</li>\r\n	<li>STOP RELYING ON TOPLINE REPORTING TO MAKE COMPLEX DECISIONS.</li>\r\n	<li>SUBSCRIBE TO ACCESS REVENUE DATA SPLIT BY EVERY EUROPEAN GAMBLING JURISDICTION AND MARKET.</li>\r\n</ul>', '65a8f2c402d82_1705571012.png', NULL, '2024-01-18 04:31:39');


--Nirali : 19-01-2024 10:09 PM
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
ALTER TABLE `homepage_reports`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `homepage_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


--Nirali : 22-01-2024 05:02 PM
-- Table structure for table `datatexts`
--

CREATE TABLE `datatexts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `datatexts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `datatexts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

INSERT INTO `datatexts` (`id`, `region_id`, `title`, `type`, `category`, `sub_category`, `description`, `created_at`, `updated_at`) VALUES
(1, 13, 'Domestically Regulated', 'Landbased', 'Lottery', 'State', '<div>&nbsp;</div>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; border:none; width:483pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:93.0pt; text-align:left; vertical-align:middle; white-space:normal; width:483pt\"><span style=\"font-size:12pt\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">State lotteries in Austria are operated by &Ouml;sterreichische Lotterien (Austrian Lotteries), a company&nbsp; founded in 1986. It is majority owned by Casinos Austria. The state lottery licence operates under a 15-year concession granted by the state. A new 15-year term started in October 2012.<br />\r\n			&Ouml;sterreichische Lotterien offers both draw games and instants. There are over 5,000 retail outlets.</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-01-22 04:35:05', '2024-01-22 04:41:45'),
(3, 12, 'Domestically Regulated', 'Landbased', 'Betting', 'Horseracing', '<div>&nbsp;</div>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; border:none; width:483pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:170.25pt; text-align:left; vertical-align:middle; white-space:normal; width:483pt\"><span style=\"font-size:12pt\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">There are three racetracks in Vienna, with the most notable being the Rennbahn Freudenau, at Trapprenbahnplatz on the grounds of the Prater. It operates from April to November and traditionally includes both trotting and flat racing. A competing racetrack is found on the opposite side of the Prater fairgrounds: Rennbahn Krieau. It operates trotting races every week of the year, except during July and August, when the venue is closed, and when race fans head to a racetrack in the outlying resort of Baden for a short, 2-month season. The newest&nbsp;racetrack&nbsp;is the Magna Racino racetrack and casino complex in the Viennese suburb of Ebreichsdorf. Inaugurated in 2004 and funded by a Canadian billionaire of Austrian descent, it is the site of a casino, several restaurants, and horse racing meetings, which are held between April and early November.<br />\r\n			Betting on races also has a long tradition, as the first tote started to operate in 1881.&nbsp;</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-01-22 05:00:37', '2024-01-22 05:00:37');