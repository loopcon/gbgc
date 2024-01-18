
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