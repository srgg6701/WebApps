-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2012 at 09:44 AM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fastdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `dnior_customers`
--

CREATE TABLE IF NOT EXISTS `dnior_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dnior_users_id` int(11) NOT NULL,
  `surname` varchar(45) DEFAULT NULL COMMENT 'Фамилия',
  `middle_name` varchar(45) DEFAULT NULL COMMENT 'Отчество',
  `sex` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `work_phone` varchar(45) DEFAULT NULL,
  `mobila` varchar(45) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dnior_users_id` (`dnior_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заказчики, как реальные, так и потенциальные' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_customers_paid`
--

CREATE TABLE IF NOT EXISTS `dnior_customers_paid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dnior_customers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dnior_customers_id` (`dnior_customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Клиенты, оплачивавшие услуги' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_customer_site_options`
--

CREATE TABLE IF NOT EXISTS `dnior_customer_site_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `site_type_id` int(11) NOT NULL,
  `engine_type_choice_id` tinyint(4) NOT NULL,
  `engines_ids` text NOT NULL,
  `options_ids` text NOT NULL COMMENT 'Массив id id выбранных опий и разделов сайта',
  PRIMARY KEY (`id`),
  KEY `site_type_id` (`site_type_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Выбранные заказчиком опции сайта' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_engines_all`
--

CREATE TABLE IF NOT EXISTS `dnior_engines_all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `free` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Список всех CMS на англ.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_engines_ru`
--

CREATE TABLE IF NOT EXISTS `dnior_engines_ru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engine_id` int(11) NOT NULL COMMENT 'dnior_engines_all.id',
  `name_ru` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `engine_id` (`engine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Список CMS, название которых может быть на русском' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_site_options`
--

CREATE TABLE IF NOT EXISTS `dnior_site_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_ru` varchar(45) DEFAULT NULL,
  `option_en` varchar(45) DEFAULT NULL,
  `option_type_id` int(11) NOT NULL COMMENT 'dnior_site_options_types.id',
  `option_stat` tinyint(4) DEFAULT NULL COMMENT 'Текущее состояние отображения опции на сайте (вкл./откл.)',
  PRIMARY KEY (`id`),
  KEY `option_type_id` (`option_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица опций сайта' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_site_options_types`
--

CREATE TABLE IF NOT EXISTS `dnior_site_options_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `site_type_id` tinyint(4) DEFAULT NULL COMMENT 'тип сайта, к которому относится опция',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dnior_site_types`
--

CREATE TABLE IF NOT EXISTS `dnior_site_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Типы сайтов	' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dnior_customers`
--
ALTER TABLE `dnior_customers`
  ADD CONSTRAINT `dnior_users_id` FOREIGN KEY (`dnior_users_id`) REFERENCES `dnior_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dnior_customers_paid`
--
ALTER TABLE `dnior_customers_paid`
  ADD CONSTRAINT `dnior_customers_id` FOREIGN KEY (`dnior_customers_id`) REFERENCES `dnior_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dnior_customer_site_options`
--
ALTER TABLE `dnior_customer_site_options`
  ADD CONSTRAINT `site_type_id` FOREIGN KEY (`site_type_id`) REFERENCES `dnior_site_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `dnior_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dnior_engines_ru`
--
ALTER TABLE `dnior_engines_ru`
  ADD CONSTRAINT `engine_id` FOREIGN KEY (`engine_id`) REFERENCES `dnior_engines_all` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dnior_site_options`
--
ALTER TABLE `dnior_site_options`
  ADD CONSTRAINT `option_type_id` FOREIGN KEY (`option_type_id`) REFERENCES `dnior_site_options_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
