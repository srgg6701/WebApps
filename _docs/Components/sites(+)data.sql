-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2012 at 09:01 AM
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

--
-- Dumping data for table `dnior_webapps_site_options`
--

INSERT INTO `dnior_webapps_site_options` (`id`, `name_ru`, `name_en`, `option_stat`) VALUES
(1, 'Корзина', 'Cart', 1),
(2, 'SMS-информирование', 'SMS-messages', 1),
(3, 'Запросы актуальности заказа', 'Purshase reminders', 1),
(4, 'Карточкой', 'Card', 1),
(5, 'Яндекс.деньги', '', 1),
(6, 'Webmoney', '', 1),
(7, 'PayPal', 'PayPal', 1),
(8, 'Платёжный шлюз', 'Payment gateway', 1),
(9, 'Карта сайта', 'Site map', 1),
(10, 'Поиск', 'Site search', 1),
(11, 'RSS', 'RSS', 1),
(12, 'Архив материалов', 'Stuff archive', 1),
(13, 'Страница не найдена', 'Page not found', 1),
(14, 'Добавить статью', 'Add article', 1),
(15, 'Рейтинг статьи', 'Article ranking', 1),
(16, 'Форум', 'Forum', 1),
(17, 'Блог', 'Blog', 1),
(18, 'Фотогалерея', 'Photo gallery', 1),
(19, 'Опросы', 'Polls', 1),
(20, 'Облако тегов', 'Tags cloud', 1),
(21, 'Like (нравится)', 'Like button', 1),
(22, 'Добавить в друзья', 'Make friend', 1),
(23, 'RSS в социальной сети', 'RSS for social', 1),
(24, 'Дополнительно', 'Extra options', 1);

--
-- Dumping data for table `dnior_webapps_site_options_beyond_sides`
--

INSERT INTO `dnior_webapps_site_options_beyond_sides` (`id`, `site_side`, `site_options_beyond_side`) VALUES
(1, 'frontend', '2,3'),
(2, 'backend', '1,4,5,6,7,8,11,14,15,16,18,19,21,22,23'),
(3, 'личный кабинет', '');

--
-- Dumping data for table `dnior_webapps_site_options_group`
--

INSERT INTO `dnior_webapps_site_options_group` (`id`, `name_ru`, `name_en`, `site_options_ids`) VALUES
(25, 'Платежи онлайн', 'Online paynemt', '4,5,6,7,8,9'),
(26, 'Социальные виджеты', 'Social widgets', '21,22,23,24');

--
-- Dumping data for table `dnior_webapps_site_options_partial`
--

INSERT INTO `dnior_webapps_site_options_partial` (`id`, `site_option_id`, `sites_types_ids_location`) VALUES
(1, 1, '3'),
(2, 2, '3'),
(3, 3, '3'),
(4, 4, '3'),
(5, 5, '3'),
(6, 6, '3'),
(7, 7, '3'),
(8, 8, '3');

--
-- Dumping data for table `dnior_webapps_site_types`
--

INSERT INTO `dnior_webapps_site_types` (`id`, `name_ru`, `name_en`) VALUES
(1, 'Корпоративный', 'Company'),
(2, 'Личный', 'Private'),
(3, 'Интернет-магазин', 'WebShop');
