<?php
class JConfig {
	/*emails:
		webapps@2-all.com
		error_webapps@2-all.com
	password: webappshistory*/
	public $offline = '0';
	public $offline_message = 'Сайт закрыт на техническое обслуживание.<br /> Пожалуйста, зайдите позже.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = 'a2allcom_fastweb';
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '20';
	public $access = '1';
	public $debug = '1';
	public $debug_lang = '0';
	public $dbtype = 'mysql';
	public $host = 'localhost';
	public $user = 'root';
	public $password = '';
	public $db = 'a2allcom_fastweb';
	public $dbprefix = 'dnior_';
	public $live_site = '';
	public $secret = 'hvqmw5gTTUsOzpCB';
	public $gzip = '0';
	public $error_reporting = 'default';
	public $helpurl = 'http://help.joomla.org/proxy/index.php?option=com_help&keyref=Help16:{keyref}';
	public $ftp_host = '127.0.0.1';
	public $ftp_port = '21';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '0';
	public $offset = 'UTC';
	public $offset_user = 'UTC';
	public $mailer = 'mail';
	public $mailfrom = 'srgg67@gmail.com';
	public $fromname = 'a2allcom_fastweb';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = 'admin';
	public $smtppass = 'history';
	public $smtphost = 'localhost';
	public $smtpsecure = 'none';
	public $smtpport = '25';
	public $caching = '0';
	public $cache_handler = 'file';
	public $cachetime = '10';
	public $MetaDesc = '';
	public $MetaKeys = '';
	public $MetaTitle = '1';
	public $MetaAuthor = '1';
	public $robots = '';
	public $sef = '1';
	public $sef_rewrite = '0';
	public $sef_suffix = '0';
	public $unicodeslugs = '0';
	public $feed_limit = '10';
	public $log_path = 'Z:\\home\\localhost\\www\\fastwebdev1/logs';
	public $tmp_path = 'Z:\\home\\localhost\\www\\fastwebdev1/tmp';
	public $lifetime = '300';
	public $session_handler = 'database';
	public $MetaRights = '';
	public $sitename_pagetitles = '0';
	public $force_ssl = '0';
	public $feed_email = 'author';
	public $cookie_domain = '';
	public $cookie_path = '';
}