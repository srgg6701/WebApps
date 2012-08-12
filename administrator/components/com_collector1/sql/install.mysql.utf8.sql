CREATE TABLE IF NOT EXISTS `#__webapps_extra_contacts` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`dnior_users_id` INT(11)  NOT NULL ,
`surname` VARCHAR(255)  NOT NULL ,
`middle_name` VARCHAR(45)  NOT NULL ,
`sex` TINYINT(1)  NOT NULL ,
`birthday` DATE NOT NULL DEFAULT '0000-00-00',
`work_phone` VARCHAR(45)  NOT NULL ,
`mobila` VARCHAR(45)  NOT NULL ,
`company_name` VARCHAR(45)  NOT NULL ,
`city` VARCHAR(45)  NOT NULL ,
`region` VARCHAR(45)  NOT NULL ,
`zip_code` VARCHAR(45)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_customers_paid` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`dnior_customers_id` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_customer_site_options` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`customer_id` INT(11)  NOT NULL ,
`site_type_id` INT(11)  NOT NULL ,
`engine_type_choice_id` TINYINT(4)  NOT NULL ,
`engines_ids` TEXT(65535)  NOT NULL ,
`options_array` TEXT(65535)  NOT NULL ,
`xtra` TEXT(65535)  NOT NULL ,
`finish_date` DATE NOT NULL DEFAULT '0000-00-00',
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_engines_all` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(45)  NOT NULL ,
`free` TINYINT(4)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_engines_ru` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`engine_id` INT(11)  NOT NULL ,
`name_ru` VARCHAR(45)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_site_options` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name_ru` VARCHAR(45)  NOT NULL ,
`name_en` VARCHAR(45)  NOT NULL ,
`option_stat` TINYINT(4)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_site_options_group` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name_ru` VARCHAR(45)  NOT NULL ,
`name_en` VARCHAR(45)  NOT NULL ,
`site_options_ids` TEXT(65535)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_site_types` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name_ru` VARCHAR(45)  NOT NULL ,
`name_en` VARCHAR(45)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_site_options_beyond_sides` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`site_side` VARCHAR(20)  NOT NULL ,
`name_ru` VARCHAR(20)  NOT NULL ,
`site_options_beyond_side` TEXT(65535)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_site_options_partial` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`site_option_id` INT(11)  NOT NULL ,
`sites_types_ids_location` TEXT(65535)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_precustomers` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(45)  NOT NULL ,
`email` VARCHAR(45)  NOT NULL ,
`phone` VARCHAR(45)  NOT NULL ,
`skype` VARCHAR(45)  NOT NULL ,
`collections_ids` TEXT(65535)  NOT NULL ,
`orders_id` TEXT NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`session_id` VARCHAR(200)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_files_names` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`files_names` TEXT NOT NULL ,
`identifier` CHAR(6)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_customer_orders` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`customer_id` INT(11)  NOT NULL ,
`components_names` TEXT NOT NULL ,
`description` LONGTEXT NOT NULL ,
`budget` CHAR(12)  NOT NULL ,
`finish_date` DATE NOT NULL DEFAULT '0000-00-00',
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__webapps_virtual_orders` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`precustomers_id` INT(11)  NOT NULL ,
`type` CHAR(1)  NOT NULL ,
`native_ids` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

