CREATE TABLE IF NOT EXISTS `#__webapps_d_pay_payment` (
 id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  id_customer INT(11) NOT NULL,
  id_order INT(11) NOT NULL,
  method_pay VARCHAR(150) NOT NULL,
  summ INT(11) NOT NULL,
  currency VARCHAR(150) NOT NULL DEFAULT 'RUR',
  description MEDIUMTEXT NOT NULL,
  status INT(11) NOT NULL,
  date_begin DATETIME DEFAULT NULL,
  date_end DATETIME DEFAULT NULL,
  total INT(11) NOT NULL,
  operation INT(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;

