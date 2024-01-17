
-- Nirali : 16-01-2024 04:05 PM
ALTER TABLE `membershipplans` CHANGE `details` `long_description` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `membershipplans` ADD `short_description` TEXT NULL AFTER `price`;

ALTER TABLE `customers` CHANGE `name` `first_name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `customers` ADD `last_name` VARCHAR(100) NULL AFTER `first_name`;
ALTER TABLE `customers` ADD `confirm_password` VARCHAR(255) NULL AFTER `password`;