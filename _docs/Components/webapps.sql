-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2012 at 06:25 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a2allcom_fastweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_customers`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dnior_users_id` int(11) unsigned NOT NULL,
  `surname` varchar(45) NOT NULL COMMENT '�������',
  `middle_name` varchar(45) NOT NULL COMMENT '��������',
  `sex` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `work_phone` varchar(45) NOT NULL,
  `mobila` varchar(45) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `zip_code` varchar(45) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `checked_out` int(11) DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dnior_users_id` (`dnior_users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='���������, ��� ��������, ��� � �������������' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dnior_webapps_customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_customers_paid`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_customers_paid` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dnior_customers_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dnior_customers_id` (`dnior_customers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='�������, ������������ ������' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dnior_webapps_customers_paid`
--


-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_customer_orders`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_customer_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `components_names` text NOT NULL,
  `description` longtext NOT NULL,
  `budget` char(12) NOT NULL,
  `finish_date` date NOT NULL DEFAULT '0000-00-00',
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='������ �� ���������� ��������� ����������� ��� �����' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dnior_webapps_customer_orders`
--

INSERT INTO `dnior_webapps_customer_orders` (`id`, `customer_id`, `components_names`, `description`, `budget`, `finish_date`, `ordering`, `state`, `checked_out`, `checked_out_time`) VALUES
(3, 0, '����� �����|�������� ������|������ �����', '������ ����!', '1000', '2012-06-26', 1, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_customer_site_options`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_customer_site_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `site_type_id` int(11) NOT NULL,
  `engine_type_choice_id` tinyint(4) NOT NULL,
  `engines_ids` mediumtext NOT NULL,
  `options_array` mediumtext NOT NULL,
  `xtra` mediumtext NOT NULL,
  `finish_date` date NOT NULL DEFAULT '0000-00-00',
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `dnior_webapps_customer_site_options`
--


-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_engines_all`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_engines_all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `free` tinyint(4) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `checked_out` int(11) DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='������ ���� CMS �� ����.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dnior_webapps_engines_all`
--


-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_engines_ru`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_engines_ru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engine_id` int(11) NOT NULL COMMENT 'dnior_engines_all.id',
  `name_ru` varchar(45) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `checked_out` int(11) DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `engine_id` (`engine_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='������ CMS, �������� ������� ����� ���� �� �������' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dnior_webapps_engines_ru`
--


-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_files_names`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_files_names` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `files_names` text NOT NULL,
  `identifier` char(6) NOT NULL,
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='������� ������, ����������� � com_collector1/files' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dnior_webapps_files_names`
--


-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_precustomers`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_precustomers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `skype` varchar(45) NOT NULL,
  `collections_ids` text,
  `orders_ids` text,
  `session_id` varchar(200) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `checked_out` int(11) DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='������� �������������� - ��������� �������, �������� ���� ��' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dnior_webapps_precustomers`
--

INSERT INTO `dnior_webapps_precustomers` (`id`, `name`, `email`, `phone`, `skype`, `collections_ids`, `orders_ids`, `session_id`, `ordering`, `state`, `checked_out`, `checked_out_time`) VALUES
(1, '��������', 'andreas@pop.com', '8-904-38-62990', '', NULL, '3', '814fee80d0445cce216bfbedba5c0d17', 1, NULL, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_site_options`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_site_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `option_stat` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='��� ��������� ����� ��� �����' AUTO_INCREMENT=25 ;

--
-- Dumping data for table `dnior_webapps_site_options`
--

INSERT INTO `dnior_webapps_site_options` (`id`, `name_ru`, `name_en`, `option_stat`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, '�������', 'Cart', 1, 0, 0, '0000-00-00 00:00:00'),
(2, 'SMS-��������������', 'SMS-messages', 1, 0, 0, '0000-00-00 00:00:00'),
(3, '������� ������������ ������', 'Purshase reminders', 1, 0, 0, '0000-00-00 00:00:00'),
(4, '���������', 'Card', 1, 0, 0, '0000-00-00 00:00:00'),
(5, '������.������', '', 1, 0, 0, '0000-00-00 00:00:00'),
(6, 'Webmoney', '', 1, 0, 0, '0000-00-00 00:00:00'),
(7, 'PayPal', 'PayPal', 1, 0, 0, '0000-00-00 00:00:00'),
(8, '�������� ����', 'Payment gateway', 1, 0, 0, '0000-00-00 00:00:00'),
(9, '����� �����', 'Site map', 1, 0, 0, '0000-00-00 00:00:00'),
(10, '�����', 'Site search', 1, 0, 0, '0000-00-00 00:00:00'),
(11, 'RSS', 'RSS', 1, 0, 0, '0000-00-00 00:00:00'),
(12, '����� ����������', 'Stuff archive', 1, 0, 0, '0000-00-00 00:00:00'),
(13, '�������� �� �������', 'Page not found', 1, 0, 0, '0000-00-00 00:00:00'),
(14, '�������� ������', 'Add article', 1, 0, 0, '0000-00-00 00:00:00'),
(15, '������� ������', 'Article ranking', 1, 0, 0, '0000-00-00 00:00:00'),
(16, '�����', 'Forum', 1, 0, 0, '0000-00-00 00:00:00'),
(17, '����', 'Blog', 1, 0, 0, '0000-00-00 00:00:00'),
(18, '�����������', 'Photo gallery', 1, 0, 0, '0000-00-00 00:00:00'),
(19, '������', 'Polls', 1, 0, 0, '0000-00-00 00:00:00'),
(20, '������ �����', 'Tags cloud', 1, 0, 0, '0000-00-00 00:00:00'),
(21, 'Like (��������)', 'Like button', 1, 0, 0, '0000-00-00 00:00:00'),
(22, '�������� � ������', 'Make friend', 1, 0, 0, '0000-00-00 00:00:00'),
(23, 'RSS � ���������� ����', 'RSS for social', 1, 0, 0, '0000-00-00 00:00:00'),
(24, '�������������', 'Extra options', 1, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_site_options_beyond_sides`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_site_options_beyond_sides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_side` varchar(20) NOT NULL,
  `name_ru` varchar(20) NOT NULL,
  `site_options_beyond_side` mediumtext NOT NULL COMMENT 'id id ����� �����, ������������� � ������� [site_side]',
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='�����, �������������� �� �� ���� �������� �����' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dnior_webapps_site_options_beyond_sides`
--

INSERT INTO `dnior_webapps_site_options_beyond_sides` (`id`, `site_side`, `name_ru`, `site_options_beyond_side`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'public', '���������', '2,3', 0, 0, '0000-00-00 00:00:00'),
(2, 'admin', '�����', '1,4,5,6,7,8,11,14,15,16,18,19,21,22,23', 0, 0, '0000-00-00 00:00:00'),
(3, 'user', '������ �������', '', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_site_options_group`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_site_options_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `site_options_ids` mediumtext NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='������ �����' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `dnior_webapps_site_options_group`
--

INSERT INTO `dnior_webapps_site_options_group` (`id`, `name_ru`, `name_en`, `site_options_ids`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(25, '������� ������', 'Online paynemt', '4,5,6,7,8', 0, 0, '0000-00-00 00:00:00'),
(26, '���������� �������', 'Social widgets', '21,22,23,24', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_site_options_partial`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_site_options_partial` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_option_id` int(11) NOT NULL,
  `sites_types_ids_location` mediumtext NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='''�����, �������������� �� �� ���� ����� ������' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dnior_webapps_site_options_partial`
--

INSERT INTO `dnior_webapps_site_options_partial` (`id`, `site_option_id`, `sites_types_ids_location`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 1, '3', 0, 0, '0000-00-00 00:00:00'),
(2, 2, '3', 0, 0, '0000-00-00 00:00:00'),
(3, 3, '3', 0, 0, '0000-00-00 00:00:00'),
(4, 4, '3', 0, 0, '0000-00-00 00:00:00'),
(5, 5, '3', 0, 0, '0000-00-00 00:00:00'),
(6, 6, '3', 0, 0, '0000-00-00 00:00:00'),
(7, 7, '3', 0, 0, '0000-00-00 00:00:00'),
(8, 8, '3', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_site_types`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_site_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(45) NOT NULL,
  `name_en` varchar(45) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='���� ������' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dnior_webapps_site_types`
--

INSERT INTO `dnior_webapps_site_types` (`id`, `name_ru`, `name_en`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, '�������������', 'Company', 0, 0, '0000-00-00 00:00:00'),
(2, '������', 'Private', 0, 0, '0000-00-00 00:00:00'),
(3, '��������-�������', 'WebShop', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dnior_webapps_virtual_orders`
--

CREATE TABLE IF NOT EXISTS `dnior_webapps_virtual_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `precustomers_id` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `native_ids` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='������, ����������� ������������������ ������ ��������' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dnior_webapps_virtual_orders`
--

