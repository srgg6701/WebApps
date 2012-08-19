-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 14 2012 г., 15:57
-- Версия сервера: 5.0.90
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `a2allcom_fastweb`
--

--
-- Дамп данных таблицы `dnior_webapps_customer_site_options`
--

INSERT INTO `dnior_webapps_customer_site_options` (`id`, `customer_id`, `site_type_id`, `engine_type_choice_id`, `engines_ids`, `options_array`, `xtra`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(18, 0, 1, 1, '0,1,2,3', 'a:12:{i:11;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:12;a:3:{i:0;s:6:"public";i:1;s:5:"admin";i:2;s:4:"user";}i:17;a:3:{i:0;s:6:"public";i:1;s:5:"admin";i:2;s:4:"user";}i:14;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:9;a:3:{i:0;s:6:"public";i:1;s:5:"admin";i:2;s:4:"user";}i:20;a:3:{i:0;s:6:"public";i:1;s:5:"admin";i:2;s:4:"user";}i:19;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:10;a:3:{i:0;s:6:"public";i:1;s:5:"admin";i:2;s:4:"user";}i:15;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:13;a:3:{i:0;s:6:"public";i:1;s:5:"admin";i:2;s:4:"user";}i:16;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:18;a:2:{i:0;s:6:"public";i:1;s:4:"user";}}', '', 5, 0, '0000-00-00 00:00:00'),
(15, 83, 2, 2, 'Разработать собственный', 'a:3:{i:21;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:23;a:2:{i:0;s:6:"public";i:1;s:4:"user";}i:22;a:2:{i:0;s:6:"public";i:1;s:4:"user";}}', 'Почти всё то же, что и было. Только CMS собственная....\r\nА ещё -  в соц.виджетах отметил галочки для юзера!', 4, 0, '0000-00-00 00:00:00');

--
-- Дамп данных таблицы `dnior_webapps_site_options`
--

INSERT INTO `dnior_webapps_site_options` (`id`, `name_ru`, `name_en`, `option_stat`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'Корзина', 'Cart', 1, NULL, NULL, NULL),
(2, 'SMS-информирование', 'SMS-messages', 1, NULL, NULL, NULL),
(3, 'Запросы актуальности заказа', 'Purshase reminders', 1, NULL, NULL, NULL),
(4, 'Карточкой', 'Card', 1, NULL, NULL, NULL),
(5, 'Яндекс.деньги', '', 1, NULL, NULL, NULL),
(6, 'Webmoney', '', 1, NULL, NULL, NULL),
(7, 'PayPal', 'PayPal', 1, NULL, NULL, NULL),
(8, 'Платёжный шлюз', 'Payment gateway', 1, NULL, NULL, NULL),
(9, 'Карта сайта', 'Site map', 1, NULL, NULL, NULL),
(10, 'Поиск', 'Site search', 1, NULL, NULL, NULL),
(11, 'RSS', 'RSS', 1, NULL, NULL, NULL),
(12, 'Архив материалов', 'Stuff archive', 1, NULL, NULL, NULL),
(13, 'Страница не найдена', 'Page not found', 1, NULL, NULL, NULL),
(14, 'Добавить статью', 'Add article', 1, NULL, NULL, NULL),
(15, 'Рейтинг статьи', 'Article ranking', 1, NULL, NULL, NULL),
(16, 'Форум', 'Forum', 1, NULL, NULL, NULL),
(17, 'Блог', 'Blog', 1, NULL, NULL, NULL),
(18, 'Фотогалерея', 'Photo gallery', 1, NULL, NULL, NULL),
(19, 'Опросы', 'Polls', 1, NULL, NULL, NULL),
(20, 'Облако тегов', 'Tags cloud', 1, NULL, NULL, NULL),
(21, 'Like (нравится)', 'Like button', 1, NULL, NULL, NULL),
(22, 'Добавить в друзья', 'Make friend', 1, NULL, NULL, NULL),
(23, 'RSS в социальной сети', 'RSS for social', 1, NULL, NULL, NULL),
(24, 'Дополнительно', 'Extra options', 1, NULL, NULL, NULL);

--
-- Дамп данных таблицы `dnior_webapps_site_options_beyond_sides`
--

INSERT INTO `dnior_webapps_site_options_beyond_sides` (`id`, `site_side`, `name_ru`, `site_options_beyond_side`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'public', 'Публичный', '2,3', NULL, NULL, NULL),
(2, 'admin', 'Админ', '1,4,5,6,7,8,11,14,15,16,18,19,21,22,23', NULL, NULL, NULL),
(3, 'user', 'Личный кабинет', '', NULL, NULL, NULL);

--
-- Дамп данных таблицы `dnior_webapps_site_options_group`
--

INSERT INTO `dnior_webapps_site_options_group` (`id`, `name_ru`, `name_en`, `site_options_ids`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(25, 'Платежи онлайн', 'Online paynemt', '4,5,6,7,8', NULL, NULL, NULL),
(26, 'Социальные виджеты', 'Social widgets', '21,22,23,24', NULL, NULL, NULL);

--
-- Дамп данных таблицы `dnior_webapps_site_options_partial`
--

INSERT INTO `dnior_webapps_site_options_partial` (`id`, `site_option_id`, `sites_types_ids_location`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 1, '3', NULL, NULL, NULL),
(2, 2, '3', NULL, NULL, NULL),
(3, 3, '3', NULL, NULL, NULL),
(4, 4, '3', NULL, NULL, NULL),
(5, 5, '3', NULL, NULL, NULL),
(6, 6, '3', NULL, NULL, NULL),
(7, 7, '3', NULL, NULL, NULL),
(8, 8, '3', NULL, NULL, NULL);

--
-- Дамп данных таблицы `dnior_webapps_site_types`
--

INSERT INTO `dnior_webapps_site_types` (`id`, `name_ru`, `name_en`, `ordering`, `checked_out`, `checked_out_time`) VALUES
(1, 'Корпоративный', 'Company', NULL, NULL, NULL),
(2, 'Личный', 'Private', NULL, NULL, NULL),
(3, 'Интернет-магазин', 'WebShop', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
