-- Create new table locations
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `price` decimal(11,2) DEFAULT '0.00',
  `code` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loc_lat` decimal(9,6) DEFAULT NULL,
  `loc_long` decimal(9,6) DEFAULT NULL,
  `delivery` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_contact` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create new table location_translations
DROP TABLE IF EXISTS `location_translations`;
CREATE TABLE `location_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `location_id` int unsigned NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_translations_location_id_locale_unique` (`location_id`,`locale`),
  CONSTRAINT `location_translations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create new table provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `price` decimal(11,2) DEFAULT '0.00',
  `code` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loc_lat` decimal(9,6) DEFAULT NULL,
  `loc_long` decimal(9,6) DEFAULT NULL,
  `delivery` tinyint(1) NOT NULL,
  `price_contact` tinyint(1) NOT NULL DEFAULT '0',
  `location_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinces_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Create new table province_translations
DROP TABLE IF EXISTS `province_translations`;
CREATE TABLE `province_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int unsigned NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `province_translations_province_id_locale_unique` (`province_id`,`locale`),
  CONSTRAINT `province_translations_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Add column deleted_at
ALTER TABLE `locations`
ADD `deleted_at` timestamp NULL DEFAULT NULL AFTER `price_contact`;

ALTER TABLE `location_translations`
ADD `deleted_at` timestamp NULL DEFAULT NULL AFTER `body`;

ALTER TABLE `provinces`
ADD `deleted_at` timestamp NULL DEFAULT NULL AFTER `updated_at`;

ALTER TABLE `province_translations`
ADD `deleted_at` timestamp NULL DEFAULT NULL AFTER `body`;

--Add column customer_id for table orders
ALTER TABLE `orders`
ADD `customer_id` int unsigned NOT NULL DEFAULT 0 AFTER `payment_id`;