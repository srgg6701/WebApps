
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>a2allcom_fastweb - Панель управления</title>
  <link href="/webapps/administrator/templates/bluestork/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="components/com_collector1/assets/css/collector1.css" type="text/css" />
  <link rel="stylesheet" href="/webapps/media/cms/css/debug.css" type="text/css" />
  <link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="templates/bluestork/css/template.css" type="text/css" />
  <link rel="stylesheet" href="language/ru-RU/ru-RU.css" type="text/css" />
  <link rel="stylesheet" href="/webapps/media/system/css/modal.css" type="text/css" />
  <style type="text/css">

.icon-16-s_com_collector1 {
	background: url(components/com_collector1/assets/images/s_com_collector1.png) no-repeat;
}

.icon-16-s__customers {
	background: url(components/com_collector1/assets/images/s__customers.png) no-repeat;
}

.icon-16-s__customers_paid {
	background: url(components/com_collector1/assets/images/s__customers_paid.png) no-repeat;
}

.icon-16-s__customer_site_options {
	background: url(components/com_collector1/assets/images/s__customer_site_options.png) no-repeat;
}

.icon-16-s__engines_all {
	background: url(components/com_collector1/assets/images/s__engines_all.png) no-repeat;
}

.icon-16-s__engines_ru {
	background: url(components/com_collector1/assets/images/s__engines_ru.png) no-repeat;
}

.icon-16-s__site_options {
	background: url(components/com_collector1/assets/images/s__site_options.png) no-repeat;
}

.icon-16-s__site_options_types {
	background: url(components/com_collector1/assets/images/s__site_options_types.png) no-repeat;
}

.icon-16-s__site_types {
	background: url(components/com_collector1/assets/images/s__site_types.png) no-repeat;
}

.icon-16-s__options_beyond_sides {
	background: url(components/com_collector1/assets/images/s__options_beyond_sides.png) no-repeat;
}

.icon-16-s__site_options_partial {
	background: url(components/com_collector1/assets/images/s__site_options_partial.png) no-repeat;
}

.icon-16-s__precustomers {
	background: url(components/com_collector1/assets/images/s__precustomers.png) no-repeat;
}

.icon-16-s__files_names {
	background: url(components/com_collector1/assets/images/s__files_names.png) no-repeat;
}

.icon-16-s__customer_orders {
	background: url(components/com_collector1/assets/images/s__customer_orders.png) no-repeat;
}

.icon-16-s__virtual_orderss {
	background: url(components/com_collector1/assets/images/s__virtual_orderss.png) no-repeat;
}

  </style>
  <script src="/webapps/media/system/js/mootools-core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/mootools-more-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/multiselect.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/modal-uncompressed.js" type="text/javascript"></script>
  <script type="text/javascript">
window.addEvent('domready', function() {
			$$('.hasTip').each(function(el) {
				var title = el.get('title');
				if (title) {
					var parts = title.split('::', 2);
					el.store('tip:title', parts[0]);
					el.store('tip:text', parts[1]);
				}
			});
			var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false});
		});
		window.addEvent('domready', function() {

			SqueezeBox.initialize({});
			SqueezeBox.assign($$('a.modal'), {
				parse: 'rel'
			});
		});
  </script>


<!--[if IE 7]>
<link href="templates/bluestork/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if gte IE 8]>
<link href="templates/bluestork/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style>
div#content-box div#toolbar-box div.m {
	border-radius:6px 6px 0 0 !important;
}
</style>
<script type="text/javascript" src="http://localhost/webapps/templates/fastwebdev/js/common.js"></script>
</head>
<body id="minwidth-body">
	<div id="border-top" class="h_blue">
		<span class="logo"><a href="http://www.joomla.org" target="_blank"><img src="templates/bluestork/images/logo.png" alt="Joomla!" /></a></span>
		<span class="title"><a href="index.php">Панель управления</a></span>
	</div>
	<div id="header-box">
		<div id="module-menu">
							<ul id="menu" >
<li class="node"><a href="#">Сайт</a><ul>
<li><a class="icon-16-cpanel" href="index.php">Панель управления</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-profile" href="index.php?option=com_admin&amp;task=profile.edit&amp;id=42">Мой профиль</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-config" href="index.php?option=com_config">Общие настройки</a></li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-maintenance" href="index.php?option=com_checkin">Обслуживание</a><ul id="menu-com-checkin" class="menu-component">
<li><a class="icon-16-checkin" href="index.php?option=com_checkin">Снять блокировки</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-clear" href="index.php?option=com_cache">Очистить весь кэш</a></li>
<li><a class="icon-16-purge" href="index.php?option=com_cache&amp;view=purge">Очистить устаревший кэш</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li><a class="icon-16-info" href="index.php?option=com_admin&amp;view=sysinfo">Информация о системе</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-logout" href="/webapps/administrator/index.php?option=com_login&amp;task=logout&amp;ba018604787bc31dfbccaef617b5a0cf=1">Выйти</a></li>
</ul>
</li>
<li class="node"><a href="#">Пользователи</a><ul>
<li class="node"><a class="icon-16-user" href="index.php?option=com_users&amp;view=users">Менеджер пользователей</a><ul id="menu-com-users-users" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=user.add">Создать пользователя</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-groups" href="index.php?option=com_users&amp;view=groups">Группы</a><ul id="menu-com-users-groups" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=group.add">Создать группу</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-levels" href="index.php?option=com_users&amp;view=levels">Уровни доступа</a><ul id="menu-com-users-levels" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=level.add">Создать уровень доступа</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-user-note" href="index.php?option=com_users&amp;view=notes">Заметки о пользователях</a><ul id="menu-com-users-notes" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=note.add">Создать заметку о пользователе</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-category" href="index.php?option=com_categories&amp;view=categories&amp;extension=com_users.notes">Категории заметок</a><ul id="menu-com-categories-categories-com-users-notes" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_categories&amp;task=category.add&amp;extension=com_users">Создать категорию</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li><a class="icon-16-massmail" href="index.php?option=com_users&amp;view=mail">Массовая рассылка сообщений</a></li>
</ul>
</li>
<li class="node"><a href="#">Меню</a><ul>
<li class="node"><a class="icon-16-menumgr" href="index.php?option=com_menus&amp;view=menus">Менеджер меню</a><ul id="menu-com-menus-menus" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=menu&amp;layout=edit">Создать меню</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-menu" href="index.php?option=com_menus&amp;view=items&amp;menutype=mainmenu">Main Menu <span><img src="/webapps/administrator/templates/bluestork/images/menu/icon-16-default.png" alt="*" title="Главная" /></span></a><ul id="menu-com-menus-items-mainmenu" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=mainmenu">Создать пункт меню</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-menu" href="index.php?option=com_menus&amp;view=items&amp;menutype=footer">Footer</a><ul id="menu-com-menus-items-footer" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=footer">Создать пункт меню</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-menu" href="index.php?option=com_menus&amp;view=items&amp;menutype=customer-accaunt">Мой аккаунт</a><ul id="menu-com-menus-items-customer-accaunt" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=customer-accaunt">Создать пункт меню</a></li>
</ul>
</li>
</ul>
</li>
<li class="node"><a href="#">Материалы</a><ul>
<li class="node"><a class="icon-16-article" href="index.php?option=com_content">Менеджер материалов</a><ul id="menu-com-content" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_content&amp;task=article.add">Создать материал</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-category" href="index.php?option=com_categories&amp;extension=com_content">Менеджер категорий</a><ul id="menu-com-categories-com-content" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_categories&amp;task=category.add&amp;extension=com_content">Создать категорию</a></li>
</ul>
</li>
<li><a class="icon-16-featured" href="index.php?option=com_content&amp;view=featured">Избранные материалы</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-media" href="index.php?option=com_media">Медиа-менеджер</a></li>
</ul>
</li>
<li class="node"><a href="#">Компоненты</a><ul>
<li><a class="icon-16-component" href="index.php?option=com_ajax">ajax</a></li>
<li><a class="icon-16-component" href="index.php?option=com_debug">debug</a></li>
<li><a class="icon-16-component" href="index.php?option=com_hello">hello-world</a></li>
<li class="node"><a class="icon-16-component" href="index.php?option=com_pay">Pay</a><ul id="menu-com-pay" class="menu-component">
<li><a class="icon-16-payments" href="index.php?option=com_pay&amp;view=payments">Payments</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-banners" href="index.php?option=com_banners">Баннеры</a><ul id="menu-com-banners" class="menu-component">
<li><a class="icon-16-banners" href="index.php?option=com_banners">Баннеры</a></li>
<li><a class="icon-16-banners-cat" href="index.php?option=com_categories&amp;extension=com_banners">Категории</a></li>
<li><a class="icon-16-banners-clients" href="index.php?option=com_banners&amp;view=clients">Клиенты</a></li>
<li><a class="icon-16-banners-tracks" href="index.php?option=com_banners&amp;view=tracks">Статистика</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-s_com_collector1" href="index.php?option=com_collector1">Коллектор</a><ul id="menu-com-collector1" class="menu-component">
<li><a class="icon-16-s__customers" href="index.php?option=com_collector1&amp;view=_customers">Заказчики</a></li>
<li><a class="icon-16-s__customers_paid" href="index.php?option=com_collector1&amp;view=_customers_paid">Оплатившие заказчики</a></li>
<li><a class="icon-16-s__customer_site_options" href="index.php?option=com_collector1&amp;view=_customer_site_options">Текущие коллекции</a></li>
<li><a class="icon-16-s__engines_all" href="index.php?option=com_collector1&amp;view=_engines_all">CMS (all)</a></li>
<li><a class="icon-16-s__engines_ru" href="index.php?option=com_collector1&amp;view=_engines_ru">CMS (ru)</a></li>
<li><a class="icon-16-s__site_options" href="index.php?option=com_collector1&amp;view=_site_options">Опции</a></li>
<li><a class="icon-16-s__site_options_types" href="index.php?option=com_collector1&amp;view=_site_options_types">Типы опций</a></li>
<li><a class="icon-16-s__site_types" href="index.php?option=com_collector1&amp;view=_site_types">Типы сайтов</a></li>
<li><a class="icon-16-s__options_beyond_sides" href="index.php?option=com_collector1&amp;view=_options_beyond_sides">Нестандартные опции</a></li>
<li><a class="icon-16-s__site_options_partial" href="index.php?option=com_collector1&amp;view=_site_options_partial">Опции не для всех типов сайтов</a></li>
<li><a class="icon-16-s__precustomers" href="index.php?option=com_collector1&amp;view=_precustomers">Предзаказчики</a></li>
<li><a class="icon-16-s__files_names" href="index.php?option=com_collector1&amp;view=_files_names">Файлы</a></li>
<li><a class="icon-16-s__customer_orders" href="index.php?option=com_collector1&amp;view=_customer_orders">Заказы компонентов</a></li>
<li><a class="icon-16-s__virtual_orderss" href="index.php?option=com_collector1&amp;view=_virtual_orderss">Виртуальные заказы</a></li>
<li><a class="icon-16-s__virtual_orderss" href="index.php?option=com_collector1&amp;view=_messages">Сообщения</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-contact" href="index.php?option=com_contact">Контакты</a><ul id="menu-com-contact" class="menu-component">
<li><a class="icon-16-contact" href="index.php?option=com_contact">Контакты</a></li>
<li><a class="icon-16-contact-cat" href="index.php?option=com_categories&amp;extension=com_contact">Категории</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-newsfeeds" href="index.php?option=com_newsfeeds">Ленты новостей</a><ul id="menu-com-newsfeeds" class="menu-component">
<li><a class="icon-16-newsfeeds" href="index.php?option=com_newsfeeds">Ленты</a></li>
<li><a class="icon-16-newsfeeds-cat" href="index.php?option=com_categories&amp;extension=com_newsfeeds">Категории</a></li>
</ul>
</li>
<li><a class="icon-16-redirect" href="index.php?option=com_redirect">Перенаправление</a></li>
<li><a class="icon-16-search" href="index.php?option=com_search">Поиск</a></li>
<li class="node"><a class="icon-16-messages" href="index.php?option=com_messages">Сообщения</a><ul id="menu-com-messages" class="menu-component">
<li><a class="icon-16-messages-add" href="index.php?option=com_messages&amp;task=message.add">Создать личное сообщение</a></li>
<li><a class="icon-16-messages-read" href="index.php?option=com_messages">Читать личные сообщения</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-weblinks" href="index.php?option=com_weblinks">Ссылки</a><ul id="menu-com-weblinks" class="menu-component">
<li><a class="icon-16-weblinks" href="index.php?option=com_weblinks">Ссылки</a></li>
<li><a class="icon-16-weblinks-cat" href="index.php?option=com_categories&amp;extension=com_weblinks">Категории</a></li>
</ul>
</li>
<li><a class="icon-16-finder" href="index.php?option=com_finder">Умный поиск</a></li>
</ul>
</li>
<li class="node"><a href="#">Расширения</a><ul>
<li><a class="icon-16-install" href="index.php?option=com_installer">Менеджер расширений</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-module" href="index.php?option=com_modules">Менеджер модулей</a></li>
<li><a class="icon-16-plugin" href="index.php?option=com_plugins">Менеджер плагинов</a></li>
<li><a class="icon-16-themes" href="index.php?option=com_templates">Менеджер шаблонов</a></li>
<li><a class="icon-16-language" href="index.php?option=com_languages">Менеджер языков</a></li>
</ul>
</li>
<li class="node"><a href="#">Справка</a><ul>
<li><a class="icon-16-help" href="index.php?option=com_admin&amp;view=help">Справка по Joomla!</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-help-forum" href="http://forum.joomla.org" target="_blank" >Официальный форум поддержки</a></li>
<li><a class="icon-16-help-forum" href="http://forum.joomla.org/viewforum.php?f=26" target="_blank" >Официальный русский форум</a></li>
<li><a class="icon-16-help-docs" href="http://docs.joomla.org" target="_blank" >Wiki-документация</a></li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-weblinks" href="#">Полезные ссылки по Joomla</a><ul class="menu-component">
<li><a class="icon-16-help-jed" href="http://extensions.joomla.org" target="_blank" >Расширения Joomla!</a></li>
<li><a class="icon-16-help-trans" href="http://community.joomla.org/translations.html" target="_blank" >Локализации Joomla!</a></li>
<li><a class="icon-16-help-jrd" href="http://resources.joomla.org" target="_blank" >Ресурсы Joomla</a></li>
<li><a class="icon-16-help-community" href="http://community.joomla.org" target="_blank" >Портал сообщества Joomla!</a></li>
<li><a class="icon-16-help-security" href="http://developer.joomla.org/security.html" target="_blank" >Центр обеспечения безопасности</a></li>
<li><a class="icon-16-help-dev" href="http://developer.joomla.org" target="_blank" >Ресурсы для разработчиков</a></li>
<li><a class="icon-16-help-shop" href="http://shop.joomla.org" target="_blank" >Журнал Joomla!</a></li>
</ul>
</li>
</ul>
</li>
</ul>

						</div>
		<div id="module-status">
			<span class="loggedin-users">На сайте: 0</span><span class="backloggedin-users">В панели: 2</span><span class="no-unread-messages"><a href="/webapps/administrator/index.php?option=com_messages">0</a></span>
			<span class="viewsite"><a href="http://localhost/webapps/" target="_blank">Просмотр сайта</a></span><span class="logout"><a href="/webapps/administrator/index.php?option=com_login&amp;task=logout&amp;ba018604787bc31dfbccaef617b5a0cf=1">Выйти</a></span>		</div>
		<div class="clr"></div>
	</div>

	<div id="content-box">
		<div id="toolbar-box">
			<div class="m">
								<div class="toolbar-list" id="toolbar">
<ul>
<li class="divider">
</li>

<li class="button" id="toolbar-publish">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Пожалуйста, выберите объект из списка');}else{ Joomla.submitbutton('_messages.publish')}" class="toolbar">
<span class="icon-32-publish">
</span>
Опубликовать
</a>
</li>

<li class="button" id="toolbar-unpublish">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Пожалуйста, выберите объект из списка');}else{ Joomla.submitbutton('_messages.unpublish')}" class="toolbar">
<span class="icon-32-unpublish">
</span>
Снять с публикации
</a>
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-archive">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Пожалуйста, выберите объект из списка');}else{ Joomla.submitbutton('_messages.archive')}" class="toolbar">
<span class="icon-32-archive">
</span>
В архив
</a>
</li>

<li class="button" id="toolbar-checkin">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Пожалуйста, выберите объект из списка');}else{ Joomla.submitbutton('_messages.checkin')}" class="toolbar">
<span class="icon-32-checkin">
</span>
Разблокировать
</a>
</li>

<li class="button" id="toolbar-trash">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Пожалуйста, выберите объект из списка');}else{ Joomla.submitbutton('_messages.trash')}" class="toolbar">
<span class="icon-32-trash">
</span>
В корзину
</a>
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-popup-options">
<a class="modal" href="http://localhost/webapps/administrator/index.php?option=com_config&amp;view=component&amp;component=com_collector1&amp;path=&amp;tmpl=component" rel="{handler: 'iframe', size: {x: 875, y: 550}, onClose: function() {}}">
<span class="icon-32-options">
</span>
Настройки
</a>
</li>

</ul>
<div class="clr"></div>
</div>
									<div class="pagetitle icon-48-_messages"><h2>Сообщения</h2></div>
        				</div>
		</div>
		        					<div id="submenu-box">
			<div class="m">
				<ul id="submenu" style='float:left; width:75%; margin:0;'>  <li>
	<a href="index.php?option=com_collector1&amp;view=_precustomers">Предзаказчики</a>  </li>
  <li>
	<a href="index.php?option=com_collector1&amp;view=_customers">Заказчики</a>  </li>
  <li>
	<a href="index.php?option=com_collector1&amp;view=_customers_paid">Внесшие предоплату</a>  </li>
    	  <li><a style="cursor:default; text-decoration:none;" class="active">Сообщения: <select name="mail_direct" onChange="return go_messages(this);">
    	    <option value="">-Выберите папку-</option>
	    	    <option value="all" selected>Все сообщения</option>
	    	    <option value="inbox">Входящие</option>
	    	    <option value="outbox">Отправленные</option>
	    	    <option value="drafts">Черновики</option>
	    	    <option value="trash">Корзина</option>
	    	  </select></a></li>
          <script type="text/javascript">
function go_messages(sel){
  try{
	  var go_location=sel.options[sel.selectedIndex].value;
	  if (go_location) location.href='http://localhost/webapps/administrator/index.php?option=com_collector1&view=_messages&direct='+go_location;
	  //alert();
  }catch(e){
	  alert(e.message);
  }
  return false;
}
</script>
<span class="nolink txtBlack" style="margin-top:-8px;">Перейти к: 
	<select id="sel_layout">
      <option value="0">-Тип объекта-</option>
      <option value="collection">сайту</option>
      <option value="order">заказу</option>
    </select>
    id <input name="object_id" id="object_id" type="text" value="" size="2">
    <button type="button" onClick="go_object_profile('object_id','sel_layout');">Перейти</button>
</span>
</ul>
<script type="text/javascript">
function go_object_profile(object_id,sel_layout){
  try{
	d=document;
	var cell=d.getElementById(object_id); // obj id cell
	var obj_type=d.getElementById(sel_layout); // select
	var layout=obj_type.options[obj_type.selectedIndex].value;
	location.href='http://localhost/webapps/administrator/index.php?option=com_collector1&layout='+layout+'&'+layout+'_id='+cell.value;
	// ! view ! user_id
	//alert(); 
  }catch(e){
	alert(e.message);  
  }
}
</script>

<div align="right" style="float:right; width:23%; font-size:12px; margin:3px 12px 0 0px;">
	<select name="view" style="margin:0;" onChange="goTable(this.options[this.selectedIndex].value);">
    	<option value="0">-Выберите базовую таблицу-</option>
		<option value="index.php?option=com_pay&tabletype=base">Платежи</option>
		<option value="index.php?option=com_collector1&view=_engines_all&tabletype=base">Все CMS</option>
		<option value="index.php?option=com_collector1&view=_engines_ru&tabletype=base">CMS ru</option>
		<option value="index.php?option=com_collector1&view=_site_options&tabletype=base">Опции для сайта</option>
		<option value="index.php?option=com_collector1&view=_site_options_types&tabletype=base">Типы опций для сайта</option>
		<option value="index.php?option=com_collector1&view=_site_types&tabletype=base">Типы сайтов</option>
		<option value="index.php?option=com_collector1&view=_options_beyond_sides&tabletype=base">Несгруппированные опции для сайта</option>
		<option value="index.php?option=com_collector1&view=_site_options_partial&tabletype=base">Опции не для всех разделов сайта</option>
		<option value="index.php?option=com_collector1&view=_customer_site_options&tabletype=base">Все собранные коллекции</option>
		<option value="index.php?option=com_collector1&view=_customer_orders&tabletype=base">Все заказы компонентов</option>
		<option value="index.php?option=com_collector1&view=_files_names&tabletype=base">Все файлы</option>
	</select>
</div>   
<script type="text/javascript">
function goTable(goLink){
	location.href=goLink;
}
</script>
				<div class="clr"></div>
			</div>
		</div>
		
        					
<div id="system-message-container">
</div>
		<div id="element-box">
			<div class="m">
        					<form action="/webapps/administrator/index.php?option=com_collector1&amp;view=_messages" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar" style="padding-bottom:0;">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search">Фильтр:</label>
			<input type="text" name="filter_search" id="filter_search" value="" title="Search" />
			<button type="submit">Искать</button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Очистить</button>
		</div>
	</fieldset>
</form>
<style>
table#tblMess tr[id] td {/* по умолчанию (т.е., - тема) */
	height:16px;
	overflow:hidden;
	white-space:nowrap;
	max-width:272px;
	font-size:1.1em;
}
table#tblMess tr[id] > td:first-child {
	text-align:right;
}
table#tblMess tr[id] > td:first-child +td { /* создано */
	/*background:#CCFF99;*/
	max-width:59px;
}
table#tblMess tr[id] > td:first-child +td +td { /* от кого */
	/*background: #FCF;*/
	max-width:50px;
	text-align:center;
}
table#tblMess tr[id] > td:first-child +td +td +td{ /* прочтено */
	/*background: #FF9;*/
	max-width:90px;
}
textarea#message{ 
	width:97%;
	margin-bottom:8px;
}
table#messagesBlockTable{
	margin-top:-9px; 
	margin-left:2px;
}
table#messagesBlockTable td#messagesBlockTD label{
	display:block;
}
table#messagesBlockTable fieldset{
	margin-left:0px;
}
table#messagesBlockTable fieldset input[type="checkbox"]{
	margin-bottom:0px;
	margin-top:2px;
}
</style>
<table id="messagesBlockTable" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" nowrap class="padding10" bgcolor="#FFF" id="messagesBlockTD">
    <h4 style="margin:0;"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/filter.gif" width="16" height="16" align="absmiddle" class="marginRight4">Отфильтровать</h4>
    <div style="padding:5px;"></div>
      <fieldset>
      	<legend>Непрочтённые:</legend>
      <label>
      	<input type="checkbox" name="unread_me" id="unread_me"> мной
      </label>
      <label>
      	<input type="checkbox" name="unread_coworkers" id="unread_coworkers"> сотрудниками
      </label>
      <label>
      	<input type="checkbox" name="unread_customers" id="unread_customers"> клиентами
      </label>
      </fieldset>
      <button>Применить</button>
      </td>
    <td width="100%">
    <div style="margin-top:-7px;" class="paddingLeft10">
		<div class="widthMax50" style="display:inline-block; vertical-align:top;">
<style>
tr.Read td{
/* прочтённые:
	для адимина:
		входящие: всеми сотрудниками, включая заавторизованного
		отправленные: клиентом
	для клиента: входящие прочтённые
*/
	background:#FFF;
}
tr.UnReadAllIn td{
/*	для админа: 
	входящие, непрочтённые никем из сотрудников 
	для клиента: входящие непрочтённые
*/
	background:EDEDED;
}
</style>
		<div>
			<div style="padding:8px;">
				<a href="javascript:void();" onClick="manageBlockDisplay(parentNode.parentNode);">Показать/скрыть</a> объект <b>this</b>
			</div>
			<div style="display:none">
	<div style='font-size:12px;'><h4>Object:</h4><pre><pre class='xdebug-var-dump' dir='ltr'>
<b>object</b>(<i>Collector1View_messages</i>)[<i>140</i>]
  <i>protected</i> 'items' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      0 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>42</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'24'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 18:01:31'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ну набрали и чо?'</font> <i>(length=28)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'65-й, как и ДО того...'</font> <i>(length=33)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'o65'</font> <i>(length=3)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      1 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>112</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'48'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 22:08:56'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'And how it works?'</font> <i>(length=17)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Tell me about it!'</font> <i>(length=17)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      2 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>111</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'49'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 22:10:41'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'And how it works?'</font> <i>(length=17)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Tell me about it!'</font> <i>(length=17)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      3 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>40</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'43'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 21:09:14'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'оттактооно михалыч!'</font> <i>(length=36)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'а раньше чо было тогда?'</font> <i>(length=41)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      4 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>131</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'25'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 18:03:13'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'А теперичча - 66'</font> <i>(length=26)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'а чо не работало-то?!'</font> <i>(length=36)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'o66'</font> <i>(length=3)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      5 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>130</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'18'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-26 12:15:34'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'хм... страннаааа....'</font> <i>(length=32)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'а чото должно переключать, ан нет...'</font> <i>(length=63)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      6 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>129</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'38'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 20:17:50'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Ужо за 20 перевалило давно!'</font> <i>(length=47)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ага, ага'</font> <i>(length=14)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      7 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>128</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'39'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 20:23:56'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'мля, охренеть!'</font> <i>(length=25)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ага, ага ога уго'</font> <i>(length=28)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      8 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>127</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 16:52:34'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Такая хрень. Не так всё просто!'</font> <i>(length=55)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ага, чо та фигня'</font> <i>(length=28)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      9 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>126</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'29'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 18:22:38'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'21-е уже. Что с пагинацией?'</font> <i>(length=45)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Будет оно работать или нет?'</font> <i>(length=49)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      10 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>125</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'6'</font> <i>(length=1)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'42'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'44'</font> <i>(length=2)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-08-23 21:06:38'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Куча работы'</font> <i>(length=21)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Была сделана уже...'</font> <i>(length=33)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'s85'</font> <i>(length=3)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      11 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>124</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'42'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 20:56:14'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'А было так гладко...'</font> <i>(length=34)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'вкралась, заразо!'</font> <i>(length=31)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      12 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>123</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'16'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-26 11:58:52'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'А теперь гляну, чо не помечает как непрочтённые для свежего сообщения!'</font> <i>(length=128)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Вы же правду говорите, когда считаете, что мы убийцы. Я себя не считаю... Почему не считаю? Мы сегодня живем в таком интересном мире, где после того, как США приняли недружественный акт по отношению к России, мы вынуждены были пересмотреть и этот вопрос. Во-первых, потому что нам нане�'...</font> <i>(length=765)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      13 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>122</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'12'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-19 23:33:41'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Ну и чо?'</font> <i>(length=13)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Да, пишу мессагу'</font> <i>(length=29)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      14 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>121</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'4'</font> <i>(length=1)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'42'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'44'</font> <i>(length=2)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-08-21 21:17:01'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Третье добавляю'</font> <i>(length=29)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Добавится?'</font> <i>(length=19)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'s85'</font> <i>(length=3)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      15 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>120</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'64'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 16:57:17'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'оно работает, но...'</font> <i>(length=32)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'как-то по-странному, да?'</font> <i>(length=42)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      16 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>119</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'7'</font> <i>(length=1)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'42'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'44'</font> <i>(length=2)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-08-23 21:12:11'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Ладно ещё одно'</font> <i>(length=26)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Напишу, напишу!'</font> <i>(length=27)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'s85'</font> <i>(length=3)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      17 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>118</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'17'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-26 12:07:21'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Попытка разобраться со статусом прочтения/непрочтения 2. Заодно смотрим на то, что там у нас с длиной ячейки...'</font> <i>(length=199)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Наша компания предлагает вам обратить внимание на современные, качественные и разнообразные виды натяжных потолков, которые вы всегда можете приобрести, заказать для того, чтобы украсить, до неузнаваемости изменить интерьер офиса, дома или квартиры. Натяжные потолки - это попул'...</font> <i>(length=2934)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      18 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>117</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'30'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-29 18:24:44'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'22-е уже. Что с пагинацией?!'</font> <i>(length=46)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Неужто придётся вручную добавлять?'</font> <i>(length=64)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      19 <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>stdClass</i>)[<i>116</i>]
          <i>public</i> 'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'54'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          <i>public</i> 'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'date_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:42:56'</font> <i>(length=19)</i>
          <i>public</i> 'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ну попробуем по-тупому'</font> <i>(length=41)</i>
          <i>public</i> 'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'но шоб надёжно было!'</font> <i>(length=36)</i>
          <i>public</i> 'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>public</i> 'ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          <i>public</i> 'checked_out_time' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0000-00-00 00:00:00'</font> <i>(length=19)</i>
          <i>public</i> 'editor' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> 'pagination' <font color='#888a85'>=&gt;</font> 
    <b>object</b>(<i>JPagination</i>)[<i>115</i>]
      <i>public</i> 'limitstart' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>0</font>
      <i>public</i> 'limit' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>20</font>
      <i>public</i> 'total' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>66</font>
      <i>public</i> 'prefix' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>protected</i> '_viewall' <font color='#888a85'>=&gt;</font> <small>boolean</small> <font color='#75507b'>false</font>
      <i>protected</i> '_additionalUrlParams' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>protected</i> '_errors' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>public</i> 'pages.total' <font color='#888a85'>=&gt;</font> <small>float</small> <font color='#f57900'>4</font>
      <i>public</i> 'pages.current' <font color='#888a85'>=&gt;</font> <small>float</small> <font color='#f57900'>1</font>
      <i>public</i> 'pages.start' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>1</font>
      <i>public</i> 'pages.stop' <font color='#888a85'>=&gt;</font> <small>float</small> <font color='#f57900'>4</font>
  <i>protected</i> 'state' <font color='#888a85'>=&gt;</font> 
    <b>object</b>(<i>JObject</i>)[<i>138</i>]
      <i>protected</i> '_errors' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>public</i> 'task' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> 'filter.search' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> 'filter.state' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> 'params' <font color='#888a85'>=&gt;</font> 
        <b>object</b>(<i>JRegistry</i>)[<i>105</i>]
          <i>protected</i> 'data' <font color='#888a85'>=&gt;</font> 
            <b>object</b>(<i>stdClass</i>)[<i>109</i>]
              ...
      <i>public</i> 'list.limit' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'20'</font> <i>(length=2)</i>
      <i>public</i> 'list.start' <font color='#888a85'>=&gt;</font> <small>float</small> <font color='#f57900'>0</font>
      <i>public</i> 'list.ordering' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'a.message'</font> <i>(length=9)</i>
      <i>public</i> 'list.direction' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'asc'</font> <i>(length=3)</i>
  <i>protected</i> '_messages' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      0 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'68'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 17:11'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Едрёна матрёна!'</font> <i>(length=28)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'усё никак улюдей!!!'</font> <i>(length=33)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.перевод.xlsx:2.Список затруднительных предметов.doc:3.контакты с преподами.xlsx'</font> <i>(length=136)</i>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 17:11:59'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      1 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'67'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 17:09'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'поймать за яйцы!'</font> <i>(length=29)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ну по крайней мере ясно, в чём трабл!'</font> <i>(length=65)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 17:09:10'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      2 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'66'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 17:05'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'поймать за яйцы!'</font> <i>(length=29)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ну по крайней мере ясно, в чём трабл!'</font> <i>(length=65)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 17:05:37'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      3 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'65'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 17:00'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Ну, так-то лучше?'</font> <i>(length=29)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'понЯл, михалыч, каково это?'</font> <i>(length=48)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 17:00:07'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      4 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'64'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 16:57'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'оно работает, но...'</font> <i>(length=32)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'как-то по-странному, да?'</font> <i>(length=42)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 16:57:17'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      5 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 16:52'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Такая хрень. Не так всё просто!'</font> <i>(length=55)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ага, чо та фигня'</font> <i>(length=28)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      6 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'62'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 16:50'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'она чо михалыч!'</font> <i>(length=27)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'файлы!!!'</font> <i>(length=13)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'s64'</font> <i>(length=3)</i>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      7 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'61'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 16:49'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'она чо михалыч!'</font> <i>(length=27)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'файлы!!!'</font> <i>(length=13)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 16:49:08'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'s64'</font> <i>(length=3)</i>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      8 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'60'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 16:46'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'она чо михалыч!'</font> <i>(length=27)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'файлы!!!'</font> <i>(length=13)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
      9 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'59'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 16:43'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'она чо михалыч!'</font> <i>(length=27)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'файлы!!!'</font> <i>(length=13)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 16:43:03'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
      10 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'58'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 15:55'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'она чо михалыч!'</font> <i>(length=27)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'файлы!!!'</font> <i>(length=13)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 15:55:54'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      11 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'57'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:55'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'а хрен там с аттачем...'</font> <i>(length=39)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'чота не выходит никак...'</font> <i>(length=42)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:55:17'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      12 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'56'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:49'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'А теперича с аттачем!'</font> <i>(length=38)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'чо будет-то, Господи?'</font> <i>(length=37)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:49:06'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      13 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'55'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:46'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'хитрая оно!'</font> <i>(length=20)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ну попробовали родную функцию...'</font> <i>(length=58)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:46:23'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
      14 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'54'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:42'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ну попробуем по-тупому'</font> <i>(length=41)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'но шоб надёжно было!'</font> <i>(length=36)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:46:02'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      15 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'53'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:36'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'странна...'</font> <i>(length=17)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'почему не извлекает-то?'</font> <i>(length=42)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:42:34'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      16 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'52'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:34'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'она чо михалыч с последним-то!'</font> <i>(length=54)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'так а в чём трабл?'</font> <i>(length=31)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
      17 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'50'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1.01.2013 14:25'</font> <i>(length=15)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Пробуем после обработки аттачей'</font> <i>(length=59)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Пока что просто мессага!'</font> <i>(length=44)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2013-01-01 14:33:49'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      18 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'49'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'29.12.2012 22:10'</font> <i>(length=16)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'And how it works?'</font> <i>(length=17)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Tell me about it!'</font> <i>(length=17)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2012-12-30 15:46:30'</font> <i>(length=19)</i>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
      19 <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'id' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'48'</font> <i>(length=2)</i>
          'user_id_from' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'63'</font> <i>(length=2)</i>
          'user_id_to' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'0'</font> <i>(length=1)</i>
          'datetime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'29.12.2012 22:08'</font> <i>(length=16)</i>
          'subject' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'And how it works?'</font> <i>(length=17)</i>
          'message' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Tell me about it!'</font> <i>(length=17)</i>
          'files_names' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'read_datetime' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'obj_identifier' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          'del_by_user' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> 'name' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'_messages'</font> <i>(length=9)</i>
  <i>protected</i> '_name' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'_messages'</font> <i>(length=9)</i>
  <i>protected</i> 'models' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      <i><font color='#888a85'>empty</font></i>
  <i>protected</i> '_models' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      '_messages' <font color='#888a85'>=&gt;</font> &amp;
        <b>object</b>(<i>Collector1Model_messages</i>)[<i>139</i>]
          <i>protected</i> 'cache' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
          <i>protected</i> 'context' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'com_collector1._messages'</font> <i>(length=24)</i>
          <i>protected</i> 'filter_fields' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
          <i>protected</i> 'query' <font color='#888a85'>=&gt;</font> 
            <b>object</b>(<i>JDatabaseQueryMySQL</i>)[<i>136</i>]
              ...
          <i>protected</i> 'stateSet' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>protected</i> '__state_set' <font color='#888a85'>=&gt;</font> <small>boolean</small> <font color='#75507b'>true</font>
          <i>protected</i> 'db' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
          <i>protected</i> '_db' <font color='#888a85'>=&gt;</font> 
            <b>object</b>(<i>JDatabaseMySQL</i>)[<i>16</i>]
              ...
          <i>protected</i> 'name' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'_messages'</font> <i>(length=9)</i>
          <i>protected</i> 'option' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'com_collector1'</font> <i>(length=14)</i>
          <i>protected</i> 'state' <font color='#888a85'>=&gt;</font> 
            <b>object</b>(<i>JObject</i>)[<i>138</i>]
              ...
          <i>protected</i> 'event_clean_cache' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'onContentCleanCache'</font> <i>(length=19)</i>
          <i>protected</i> '_errors' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
  <i>protected</i> 'basePath' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> '_basePath' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Z:\home\localhost\www\WebApps\administrator/components/com_collector1'</font> <i>(length=69)</i>
  <i>protected</i> 'defaultModel' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> '_defaultModel' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'_messages'</font> <i>(length=9)</i>
  <i>protected</i> 'layout' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'default'</font> <i>(length=7)</i>
  <i>protected</i> '_layout' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'default'</font> <i>(length=7)</i>
  <i>protected</i> 'layoutExt' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'php'</font> <i>(length=3)</i>
  <i>protected</i> '_layoutExt' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'php'</font> <i>(length=3)</i>
  <i>protected</i> 'layoutTemplate' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'_'</font> <i>(length=1)</i>
  <i>protected</i> '_layoutTemplate' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'_'</font> <i>(length=1)</i>
  <i>protected</i> 'path' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      'template' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      'helper' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
  <i>protected</i> '_path' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      'template' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          0 <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Z:\home\localhost\www\WebApps\administrator/templates/bluestork/html/com_collector1/_messages\'</font> <i>(length=94)</i>
          1 <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Z:\home\localhost\www\WebApps\administrator/components/com_collector1/views/_messages/tmpl\'</font> <i>(length=91)</i>
      'helper' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          0 <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Z:\home\localhost\www\WebApps\administrator/components/com_collector1/helpers\'</font> <i>(length=78)</i>
  <i>protected</i> 'template' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> '_template' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Z:\home\localhost\www\WebApps\administrator\components\com_collector1\views\_messages\tmpl\default.php'</font> <i>(length=102)</i>
  <i>protected</i> 'output' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> '_output' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>protected</i> 'escape' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'htmlspecialchars'</font> <i>(length=16)</i>
  <i>protected</i> '_escape' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'htmlspecialchars'</font> <i>(length=16)</i>
  <i>protected</i> 'charset' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'UTF-8'</font> <i>(length=5)</i>
  <i>protected</i> '_charset' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'UTF-8'</font> <i>(length=5)</i>
  <i>protected</i> '_errors' <font color='#888a85'>=&gt;</font> 
    <b>array</b>
      <i><font color='#888a85'>empty</font></i>
  <i>public</i> 'baseurl' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'/webapps/administrator'</font> <i>(length=22)</i>
  <i>public</i> 'document' <font color='#888a85'>=&gt;</font> &amp;
    <b>object</b>(<i>JDocumentHTML</i>)[<i>104</i>]
      <i>public</i> '_links' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>public</i> '_custom' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>public</i> 'template' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> 'baseurl' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> 'params' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> '_file' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>protected</i> '_template' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>protected</i> '_template_tags' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>protected</i> '_caching' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> 'title' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'a2allcom_fastweb - Панель управления'</font> <i>(length=52)</i>
      <i>public</i> 'description' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> 'link' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> 'base' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> 'language' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ru-ru'</font> <i>(length=5)</i>
      <i>public</i> 'direction' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'ltr'</font> <i>(length=3)</i>
      <i>public</i> '_generator' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Joomla! - Open Source Content Management'</font> <i>(length=40)</i>
      <i>public</i> '_mdate' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> '_tab' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'  '</font> <i>(length=2)</i>
      <i>public</i> '_lineEnd' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'&#10;'</font> <i>(length=1)</i>
      <i>public</i> '_charset' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'utf-8'</font> <i>(length=5)</i>
      <i>public</i> '_mime' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'text/html'</font> <i>(length=9)</i>
      <i>public</i> '_namespace' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> '_profile' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
      <i>public</i> '_scripts' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          '/webapps/media/system/js/mootools-core-uncompressed.js' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
          '/webapps/media/system/js/core-uncompressed.js' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
          '/webapps/media/system/js/mootools-more-uncompressed.js' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
          '/webapps/media/system/js/multiselect.js' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
      <i>public</i> '_script' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'text/javascript' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'window.addEvent(&#39;domready&#39;, function() {&#10;			$$(&#39;.hasTip&#39;).each(function(el) {&#10;				var title = el.get(&#39;title&#39;);&#10;				if (title) {&#10;					var parts = title.split(&#39;::&#39;, 2);&#10;					el.store(&#39;tip:title&#39;, parts[0]);&#10;					el.store(&#39;tip:text&#39;, parts[1]);&#10;				}&#10;			});&#10;			var JTooltips = new Tips($$(&#39;.hasTip&#39;), { maxTitleChars: 50, fixed: false});&#10;		});'</font> <i>(length=340)</i>
      <i>public</i> '_styleSheets' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'components/com_collector1/assets/css/collector1.css' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
      <i>public</i> '_style' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
      <i>public</i> '_metaTags' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          'http-equiv' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
          'standard' <font color='#888a85'>=&gt;</font> 
            <b>array</b>
              ...
      <i>public</i> '_engine' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
      <i>public</i> '_type' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'html'</font> <i>(length=4)</i>
      <i>protected</i> '_errors' <font color='#888a85'>=&gt;</font> 
        <b>array</b>
          <i><font color='#888a85'>empty</font></i>
</pre></pre></div>    		</div>
        </div>
	<h4 class="marginBottom8">Все сообщения &nbsp; | &nbsp; <a href="#" data-action="add-message" style="font-weight:200;">Добавить сообщение...</a></h4>
<table cellspacing="0" class="tblMess" id="tblMess">
  <tr class="trMessHeaders">
  	    <td id="tdId">#</td>
    <td id="tdObject">Объект</td>
    <td id="tdCreated">Создано</td>
    <td id="tdSender" align="center">Отправитель</td>
    <td id="tdRead">Прочтено</td>
    <td id="tdAttaches">Файлы</td>
    <td id="tdSubject">Тема</td>
    <td id="tdRemove" align="center"><img src="http://localhost/webapps/templates/fastwebdev/images/commands/trash.png"></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_68">
    <td>68</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 17:11">1.01.2013 17:11</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="68" title="17:11:59
Пометить как непрочтённое">2013-01-01 17:11:59</a></td>
    <td align="center">3</td>
    <td><a href="#" data-subject="68">Едрёна матрёна!</a></td>
    <td align="center"><a href="#" data-delete="68"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_67">
    <td>67</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 17:09">1.01.2013 17:0<a href="#" data-delete="66"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16" /></a>9</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="67" title="17:09:10
Пометить как непрочтённое">2013-01-01 17:09:10</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="67">поймать за яйцы!</a></td>
    <td align="center"><a href="#" data-delete="67"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_66">
    <td>66</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 17:05">1.01.2013 17:05</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="66" title="17:05:37
Пометить как непрочтённое">2013-01-01 17:05:37</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="66">поймать за яйцы!</a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_65">
    <td>65</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 17:00">1.01.2013 17:00</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="65" title="17:00:07
Пометить как непрочтённое">2013-01-01 17:00:07</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="65">Ну, так-то лучше?</a></td>
    <td align="center"><a href="#" data-delete="65"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_64">
    <td>64</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 16:57">1.01.2013 16:57</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="64" title="16:57:17
Пометить как непрочтённое">2013-01-01 16:57:17</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="64">оно работает, но...</a></td>
    <td align="center"><a href="#" data-delete="64"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#EDEDED" id="message_63">
    <td>63</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 16:52">1.01.2013 16:52</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="63" title="16:57:17
Пометить как прочтённое">не прочтено</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="63">Такая хрень. Не так всё просто!</a></td>
    <td align="center"><a href="#" data-delete="63"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#EDEDED" id="message_62">
    <td>62</td>
    <td align="center" title="сайт">s64</td>
    <td title="1.01.2013 16:50">1.01.2013 16:50</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="62" title="16:57:17
Пометить как прочтённое">не прочтено</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="62">она чо михалыч!</a></td>
    <td align="center"><a href="#" data-delete="62"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_61">
    <td>61</td>
    <td align="center" title="сайт">s64</td>
    <td title="1.01.2013 16:49">1.01.2013 16:49</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="61" title="16:49:08
Пометить как непрочтённое">2013-01-01 16:49:08</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="61">она чо михалыч!</a></td>
    <td align="center"><a href="#" data-delete="61"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#EDEDED" id="message_60">
    <td>60</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 16:46">1.01.2013 16:46</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="60" title="16:49:08
Пометить как прочтённое">не прочтено</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="60">она чо михалыч!</a></td>
    <td align="center"><a href="#" data-delete="60"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_59">
    <td>59</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 16:43">1.01.2013 16:43</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="59" title="16:43:03
Пометить как непрочтённое">2013-01-01 16:43:03</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="59">она чо михалыч!</a></td>
    <td align="center"><a href="#" data-delete="59"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_58">
    <td>58</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 15:55">1.01.2013 15:55</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="58" title="15:55:54
Пометить как непрочтённое">2013-01-01 15:55:54</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="58">она чо михалыч!</a></td>
    <td align="center"><a href="#" data-delete="58"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_57">
    <td>57</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:55">1.01.2013 14:55</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="57" title="14:55:17
Пометить как непрочтённое">2013-01-01 14:55:17</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="57">а хрен там с аттачем...</a></td>
    <td align="center"><a href="#" data-delete="57"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_56">
    <td>56</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:49">1.01.2013 14:49</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="56" title="14:49:06
Пометить как непрочтённое">2013-01-01 14:49:06</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="56">А теперича с аттачем!</a></td>
    <td align="center"><a href="#" data-delete="56"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_55">
    <td>55</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:46">1.01.2013 14:46</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="55" title="14:46:23
Пометить как непрочтённое">2013-01-01 14:46:23</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="55">хитрая оно!</a></td>
    <td align="center"><a href="#" data-delete="55"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_54">
    <td>54</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:42">1.01.2013 14:42</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="54" title="14:46:02
Пометить как непрочтённое">2013-01-01 14:46:02</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="54">ну попробуем по-тупому</a></td>
    <td align="center"><a href="#" data-delete="54"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_53">
    <td>53</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:36">1.01.2013 14:36</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="53" title="14:42:34
Пометить как непрочтённое">2013-01-01 14:42:34</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="53">странна...</a></td>
    <td align="center"><a href="#" data-delete="53"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#EDEDED" id="message_52">
    <td>52</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:34">1.01.2013 14:34</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="52" title="14:42:34
Пометить как прочтённое">не прочтено</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="52">она чо михалыч с последним-то!</a></td>
    <td align="center"><a href="#" data-delete="52"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_50">
    <td>50</td>
    <td align="center" title=""></td>
    <td title="1.01.2013 14:25">1.01.2013 14:25</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="50" title="14:33:49
Пометить как непрочтённое">2013-01-01 14:33:49</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="50">Пробуем после обработки аттачей</a></td>
    <td align="center"><a href="#" data-delete="50"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#FFF" id="message_49">
    <td>49</td>
    <td align="center" title=""></td>
    <td title="29.12.2012 22:10">29.12.2012 22:10</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="49" title="15:46:30
Пометить как непрочтённое">2012-12-30 15:46:30</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="49">And how it works?</a></td>
    <td align="center"><a href="#" data-delete="49"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr class="1" bgcolor="#EDEDED" id="message_48">
    <td>48</td>
    <td align="center" title=""></td>
    <td title="29.12.2012 22:08">29.12.2012 22:08</td>
    <td>				<a href="http://localhost/webapps/administrator/index.php?option=com_users&view=user&layout=edit&id=63" title="﻿﻿Ульрих3-й; Редактировать данные">ulrich</a></td>
    <td><a href="#" data-read-status="48" title="15:46:30
Пометить как прочтённое">не прочтено</a></td>
    <td align="center"></td>
    <td><a href="#" data-subject="48">And how it works?</a></td>
    <td align="center"><a href="#" data-delete="48"  title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
  </tr>
  <tr>
    <td align="center" colspan="8"><div align="center">Страницы: <a class="txtOrange" href="">[1]</a> <a href="">[2]</a> <a href="">[3]</a> <a href="">[4]</a> </div></td>
  </tr>
        
</table>
<script>
var Attaches=new Array();
Attaches['68']=new Array();
				
Attaches['68']['1']="перевод.xlsx";
				
Attaches['68']['2']="Список затруднительных предметов.doc";
				
Attaches['68']['3']="контакты с преподами.xlsx";
		</script>
<script type="text/javascript">
/*	страницы со сборкой:
	/administrator/components/com_collector1/helpers/messages
*/
$(function(){
		alert('hi');
	});
</script></div>
<div class="width-50" style="display:inline-block;">
  <div style="margin-left:10px;">	
    <h4 id="message_header" class="marginBottom8 paddingLeft10">Текст сообщения</h4>
    <div id="message_content" class="messContent">
    	<div id="sel_mess">Выберите сообщение</div>
        <div id="message_fields" style="display:none;">
            <h4 id="staticHeader" class="marginBottom4 marginTop0">Тема сообщения</h4>
            <input name="subject" id="subject" type="text" class="block width99 padding3">
          <h4 class="marginBottom4 marginTop8">Текст сообщения</h4>
            <textarea name="message" id="message" cols="" rows="10" class="width99 padding3"></textarea>
		<span style="display:inline-block;">
  <div class="marginBottom10" id="files_container">
    <div class="put_file_field">
  		<input type="file" name="fileField_1" id="fileField_1" multiple>&nbsp; <a href="#" onClick="return addFileField('remove',parentNode);" class="txtRed">отменить загрузку...</a> &nbsp;
    </div>
  </div>
  </span>
  <div class="paddingLeft10">
  	<a href="#" onClick="return addFileField('add');">ещё файл...</a>
  </div>		
        	<br>
            <button type="button" class="buttonMess" onClick="sendPostAjax('message');">Отправить</button>
            <button type="reset" class="buttonMess" onClick="composeMessageDisplay('reverse');">Отменить</button>
        </div>
    </div>

  </div>  
</div>
	</div>
</td>
  </tr>
</table>
        					<div class="clr"></div>
			</div>
		</div>
		<noscript>
			Внимание! JavaScript должен быть разрешен для правильной работы Панели управления.		</noscript>
	</div>
        		<p align="center">Joomla! 2.5.3</p>
        		<div id="footer">
		<p class="copyright">
			<a href="http://www.joomla.org">Joomla!&#174;</a> - бесплатное программное обеспечение, распространяемое по лицензии <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU General Public License</a><br/>Локализация: <a href="http://joomlaportal.ru">Портал Joomla! по-русски</a>. Техническая поддержка: <a href="http://joomlaforum.ru">Форум русской поддержки Joomla! CMS</a><br/>		</p>
	</div>
<script>function toggleContainer(name) {
			var e = document.getElementById(name);// MooTools might not be available ;)
			e.style.display =(e.style.display == 'none') ? 'block' : 'none';
		}</script><div id="system-debug" class="profiler"><h1>Консоль отладки Joomla!</h1><div class="dbgHeader" onclick="toggleContainer('dbgContainersession');"><a href="javascript:void(0);"><h3>Сессия</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainersession"><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session0');"><a href="javascript:void(0);"><h3>__default</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session0"><code>session.counter &rArr; 7<br /></code><code>session.timer.start &rArr; 1357138049<br /></code><code>session.timer.last &rArr; 1357138063<br /></code><code>session.timer.now &rArr; 1357138361<br /></code><code>session.client.browser &rArr; Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11<br /></code><code>registry &rArr; {"application":{"lang":""},"com_installer":{"message":"","extension_message":""}}<br /></code><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session1');"><a href="javascript:void(0);"><h3>user</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session1"><code>id &rArr; 42<br /></code><code>name &rArr; Super User<br /></code><code>username &rArr; admin<br /></code><code>email &rArr; srgg67@gmail.com<br /></code><code>password &rArr; 008f80dfdba3b87bd9b7f22a9c470a21:vFQ7tKHlxOUCpGwmjTdxw3Z7vhPIlVZf<br /></code><code>password_clear &rArr; <br /></code><code>usertype &rArr; deprecated<br /></code><code>block &rArr; 0<br /></code><code>sendEmail &rArr; 1<br /></code><code>registerDate &rArr; 2012-05-02 16:29:22<br /></code><code>lastvisitDate &rArr; 2013-01-02 11:25:51<br /></code><code>activation &rArr; 0<br /></code><code>params &rArr; <br /></code><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session2');"><a href="javascript:void(0);"><h3>groups</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session2"><code>8 &rArr; 8<br /></code></div><code>guest &rArr; 0<br /></code><code>customer_data_array &rArr; Array<br /></code><code>aid &rArr; 0<br /></code><code>location &rArr; /libraries/joomla/database/table.php <br><br /></code><code>surname &rArr; <br /></code><code>middle_name &rArr; <br /></code><code>sex &rArr; <br /></code><code>birthday &rArr; 0000-00-00<br /></code><code>work_phone &rArr; <br /></code><code>mobila &rArr; <br /></code><code>skype &rArr; <br /></code><code>company_name &rArr; <br /></code><code>city &rArr; <br /></code><code>region &rArr; <br /></code><code>zip_code &rArr; <br /></code><code>customer_status &rArr; enabled active<br /></code></div><code>session.token &rArr; 799bcfbb259b48db8c7c15e359a3c9af<br /></code></div></div><div class="dbgHeader" onclick="toggleContainer('dbgContainerprofile_information');"><a href="javascript:void(0);"><h3>Результаты профилирования</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainerprofile_information"><div><code>Application 0.002 seconds (+0.002); 1.03 MB (+1.026) - afterLoad</code></div><div><code>Application 0.101 seconds (+0.099); 5.83 MB (+4.808) - afterInitialise</code></div><div><code>Application 0.101 seconds (+0.000); 5.83 MB (+0.000) - afterRoute</code></div><div><code>Application 0.264 seconds (+0.163); 9.25 MB (+3.412) - afterDispatch</code></div><div><code>Application 0.273 seconds (+0.009); 9.51 MB (+0.265) - beforeRenderModule mod_version (Joomla Version)</code></div><div><code>Application 0.278 seconds (+0.005); 9.55 MB (+0.043) - afterRenderModule mod_version (Joomla Version)</code></div><div><code>Application 0.280 seconds (+0.002); 9.59 MB (+0.041) - beforeRenderModule mod_submenu (Admin Submenu)</code></div><div><code>Application 0.289 seconds (+0.009); 9.65 MB (+0.052) - afterRenderModule mod_submenu (Admin Submenu)</code></div><div><code>Application 0.289 seconds (+0.000); 9.64 MB (-0.004) - beforeRenderModule mod_title (Title)</code></div><div><code>Application 0.294 seconds (+0.005); 9.65 MB (+0.004) - afterRenderModule mod_title (Title)</code></div><div><code>Application 0.295 seconds (+0.000); 9.65 MB (-0.001) - beforeRenderModule mod_toolbar (Toolbar)</code></div><div><code>Application 0.313 seconds (+0.018); 9.72 MB (+0.072) - afterRenderModule mod_toolbar (Toolbar)</code></div><div><code>Application 0.313 seconds (+0.000); 9.72 MB (-0.001) - beforeRenderModule mod_status (User Status)</code></div><div><code>Application 0.320 seconds (+0.007); 9.73 MB (+0.012) - afterRenderModule mod_status (User Status)</code></div><div><code>Application 0.320 seconds (+0.000); 9.73 MB (-0.002) - beforeRenderModule mod_menu (Admin Menu)</code></div><div><code>Application 1.362 seconds (+1.042); 10.10 MB (+0.373) - afterRenderModule mod_menu (Admin Menu)</code></div><div><code>Application 1.365 seconds (+0.003); 10.27 MB (+0.175) - afterRender</code></div></div><div class="dbgHeader" onclick="toggleContainer('dbgContainermemory_usage');"><a href="javascript:void(0);"><h3>Использование памяти</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainermemory_usage"><code>10.37 MB (10,871,880 Bytes)</code></div><div class="dbgHeader" onclick="toggleContainer('dbgContainerqueries');"><a href="javascript:void(0);"><h3>Запросы к базе данных</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainerqueries"><h4>99 SQL-запросов зафиксировано</h4><ol><li><code><span class="dbgCommand">SELECT</span> `data`
<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `session_id` <b class="dbgOperator">=</b> &#039;85271e41825276476b49ab4ef629a259&#039;</code></li><li><code><span class="dbgCommand">DELETE</span> 
<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `time` &lt; &#039;1357120361&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> b.id
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_user_usergroup_map</span> <span class="dbgCommand">AS</span> map
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_usergroups</span> <span class="dbgCommand">AS</span> a <br />&#160;&#160;<span class="dbgCommand">ON</span> a.id <b class="dbgOperator">=</b> map.group_id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_usergroups</span> <span class="dbgCommand">AS</span> b <br />&#160;&#160;<span class="dbgCommand">ON</span> b.lft &lt;<b class="dbgOperator">=</b> a.lft <br />&#160;&#160;<span class="dbgCommand">AND</span> b.rgt &gt;<b class="dbgOperator">=</b> a.rgt
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> map.user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_languages&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> folder <span class="dbgCommand">AS</span> type, element <span class="dbgCommand">AS</span> name, params
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> enabled &gt;<b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> type <b class="dbgOperator">=</b>&#039;plugin&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> state &gt;<b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> access <span class="dbgCommand">IN</span> (1,1,2,3)
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> ordering</code></li><li><code><span class="dbgCommand">SELECT</span> template, s.params
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_template_styles</span> as s
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> as e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.type<b class="dbgOperator">=</b>&#039;template&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> e.element<b class="dbgOperator">=</b>s.template <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id<b class="dbgOperator">=</b>s.client_id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> s.client_id <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> home <b class="dbgOperator">=</b> 1
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> home</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_collector1&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>,uc.name <span class="dbgCommand">AS</span> editor
<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_webapps_messages</span>` <span class="dbgCommand">AS</span> a
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> uc <br />&#160;&#160;<span class="dbgCommand">ON</span> uc.id<b class="dbgOperator">=</b>a.checked_out
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> a.message asc</code></li><li><code><span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>,uc.name <span class="dbgCommand">AS</span> editor
<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_webapps_messages</span>` <span class="dbgCommand">AS</span> a
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> uc <br />&#160;&#160;<span class="dbgCommand">ON</span> uc.id<b class="dbgOperator">=</b>a.checked_out
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> a.message asc <br />&#160;&#160;<span class="dbgCommand">LIMIT</span> 0, 20</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> <span class="dbgTable">dnior_webapps_messages</span>.id, 
       user_id_from, 
       user_id_to, 
       <span class="dbgCommand">DATE_FORMAT</span>(<span class="dbgTable">dnior_webapps_messages</span>.date_time, &#039;%e.%m.%Y %H:%i&#039;) <span class="dbgCommand">AS</span> &#039;datetime&#039;, 
       subject, 
       message, 
	   files_names,
	   <span class="dbgTable">dnior_webapps_messages_read</span>.date_time <span class="dbgCommand">AS</span> &#039;read_datetime&#039;,
       obj_identifier,
       <span class="dbgTable">dnior_webapps_messages_deleted</span>.user_id <span class="dbgCommand">AS</span> del_by_user 
  <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages</span> 
  <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages_read</span> <br />&#160;&#160;<span class="dbgCommand">ON</span> message_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_messages</span>.id
  <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_files_attaches</span> <br />&#160;&#160;<span class="dbgCommand">ON</span> <span class="dbgTable">dnior_webapps_files_attaches</span>.message_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_messages</span>.id
  <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages_deleted</span> <br />&#160;&#160;<span class="dbgCommand">ON</span> <span class="dbgTable">dnior_webapps_messages_deleted</span>.message_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_messages</span>.id
 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> (1
       )
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> <span class="dbgTable">dnior_webapps_messages</span>.id <span class="dbgCommand">DESC</span> <br />&#160;&#160;<span class="dbgCommand">LIMIT</span> 20</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 68 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 68 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 68</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 67 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 67 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 67</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 66 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 66 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 66</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 65 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 65 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 65</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 64 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 64 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 64</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 63 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 63 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 63</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 62 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 62 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 62</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 61 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 61 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 61</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 60 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 60 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 60</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 59 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 59 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 59</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 58 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 58 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 58</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 57 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 57 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 57</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 56 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 56 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 56</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 55 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 55 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 55</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 54 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 54 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 54</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 53 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 53 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 53</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 52 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 52 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 52</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 50 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 50 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 50</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 49 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 49 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 49</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g
    <br />&#160;&#160;<span class="dbgCommand">WHERE</span> u.id <b class="dbgOperator">=</b> g.user_id <br />&#160;&#160;<span class="dbgCommand">AND</span> g.group_id &gt;<b class="dbgOperator">=</b> 6 -- groups <br />&#160;&#160;having access to clients: Super Users (8), Administrator (7), Manager (6)</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
       <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
           <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
          ) <span class="dbgCommand">AS</span> direct
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
       <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
            <span class="dbgCommand">OR</span> 
            m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
          )
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
    as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
    as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.id <b class="dbgOperator">=</b> 48 -- message id
  <br />&#160;&#160;<span class="dbgCommand">AND</span> ( cso.customer_id <b class="dbgOperator">=</b> m.user_id_from -- collection customer_id
        <span class="dbgCommand">OR</span> 
        co.customer_id <b class="dbgOperator">=</b> m.user_id_from  -- <br />&#160;&#160;order customer_id
      )</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> message_id <b class="dbgOperator">=</b> 48 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_messages</span>.user_id_from <b class="dbgOperator">=</b> <span class="dbgTable">dnior_users</span>.id
<br />&#160;&#160;<span class="dbgCommand">AND</span> <span class="dbgTable">dnior_webapps_messages</span>.id <b class="dbgOperator">=</b> 48</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(<b style="color: red;">*</b>)
  <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages</span></code></li><li><code><span class="dbgCommand">SELECT</span> m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_modules</span> <span class="dbgCommand">AS</span> m
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_modules_menu</span> <span class="dbgCommand">AS</span> mm <br />&#160;&#160;<span class="dbgCommand">ON</span> mm.moduleid <b class="dbgOperator">=</b> m.id
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element <b class="dbgOperator">=</b> m.module <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id <b class="dbgOperator">=</b> m.client_id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.published <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> e.enabled <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> (m.publish_up <b class="dbgOperator">=</b> &#039;0000-00-00 00:00:00&#039; <span class="dbgCommand">OR</span> m.publish_up &lt;<b class="dbgOperator">=</b> &#039;2013-01-02 14:52:41&#039;) <br />&#160;&#160;<span class="dbgCommand">AND</span> (m.publish_down <b class="dbgOperator">=</b> &#039;0000-00-00 00:00:00&#039; <span class="dbgCommand">OR</span> m.publish_down &gt;<b class="dbgOperator">=</b> &#039;2013-01-02 14:52:41&#039;) <br />&#160;&#160;<span class="dbgCommand">AND</span> m.access <span class="dbgCommand">IN</span> (1,1,2,3) <br />&#160;&#160;<span class="dbgCommand">AND</span> m.client_id <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> (mm.menuid <b class="dbgOperator">=</b> 0 <span class="dbgCommand">OR</span> mm.menuid &lt;<b class="dbgOperator">=</b> 0)
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> m.position, m.ordering</code></li><li><code><span class="dbgCommand">SELECT</span> `menu_text`, `link` <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span>, <span class="dbgTable">dnior_webapps_backend_submenu_list</span>
 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> menu_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_menu</span>.id <br />&#160;&#160;<span class="dbgCommand">AND</span> `hidden` <b class="dbgOperator">=</b> 0</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(<b style="color: red;">*</b>)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_messages</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> state <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> user_id_to <b class="dbgOperator">=</b> 42</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(session_id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_session</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> guest <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> client_id <b class="dbgOperator">=</b> 1</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(session_id)
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_session</span>
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> guest <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> client_id <b class="dbgOperator">=</b> 0</code></li><li><code><span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>, <span class="dbgCommand">SUM</span>(b.home) <span class="dbgCommand">AS</span> home,b.language,l.image,l.sef,l.title_native
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu_types</span> <span class="dbgCommand">AS</span> a
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> b <br />&#160;&#160;<span class="dbgCommand">ON</span> b.menutype <b class="dbgOperator">=</b> a.menutype <br />&#160;&#160;<span class="dbgCommand">AND</span> b.home !<b class="dbgOperator">=</b> 0
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_languages</span> <span class="dbgCommand">AS</span> l <br />&#160;&#160;<span class="dbgCommand">ON</span> l.lang_code <b class="dbgOperator">=</b> language
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> (b.client_id <b class="dbgOperator">=</b> 0 <span class="dbgCommand">OR</span> b.client_id <span class="dbgCommand">IS</span> <span class="dbgCommand">NULL</span>)
<br />&#160;&#160;<span class="dbgCommand">GROUP</span> <span class="dbgCommand">BY</span> a.id, a.menutype, a.description, a.title, b.menutype,b.language,l.image,l.sef,l.title_native</code></li><li><code><span class="dbgCommand">SELECT</span> m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> m
<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> m.component_id <b class="dbgOperator">=</b> e.extension_id
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.client_id <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> e.enabled <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> m.id &gt; 1
<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> m.lft</code></li><li><code><span class="dbgCommand">UPDATE</span> `<span class="dbgTable">dnior_session</span>`
<br />&#160;&#160;<span class="dbgCommand">SET</span> `data` <b class="dbgOperator">=</b> &#039;__default|a:8:{s:15:\&quot;session.counter\&quot;;i:7;s:19:\&quot;session.timer.start\&quot;;i:1357138049;s:18:\&quot;session.timer.last\&quot;;i:1357138063;s:17:\&quot;session.timer.now\&quot;;i:1357138361;s:22:\&quot;session.client.browser\&quot;;s:108:\&quot;Mozilla/5.0 (Windows <span class="dbgCommand">NT</span> 6.1; WOW64) AppleWebKit/537.11 (<span class="dbgCommand">KHTML</span>, like Gecko) Chrome/23.0.1271.97 Safari/537.11\&quot;;s:8:\&quot;registry\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:2:{s:11:\&quot;application\&quot;;O:8:\&quot;stdClass\&quot;:1:{s:4:\&quot;lang\&quot;;s:0:\&quot;\&quot;;}s:13:\&quot;com_installer\&quot;;O:8:\&quot;stdClass\&quot;:2:{s:7:\&quot;message\&quot;;s:0:\&quot;\&quot;;s:17:\&quot;extension_message\&quot;;s:0:\&quot;\&quot;;}}}s:4:\&quot;user\&quot;;O:5:\&quot;JUser\&quot;:37:{s:9:\&quot;\0<b style="color: red;">*</b>\0isRoot\&quot;;b:1;s:2:\&quot;id\&quot;;s:2:\&quot;42\&quot;;s:4:\&quot;name\&quot;;s:10:\&quot;Super User\&quot;;s:8:\&quot;username\&quot;;s:5:\&quot;admin\&quot;;s:5:\&quot;email\&quot;;s:16:\&quot;srgg67@gmail.com\&quot;;s:8:\&quot;password\&quot;;s:65:\&quot;008f80dfdba3b87bd9b7f22a9c470a21:vFQ7tKHlxOUCpGwmjTdxw3Z7vhPIlVZf\&quot;;s:14:\&quot;password_clear\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;usertype\&quot;;s:10:\&quot;deprecated\&quot;;s:5:\&quot;block\&quot;;s:1:\&quot;0\&quot;;s:9:\&quot;sendEmail\&quot;;s:1:\&quot;1\&quot;;s:12:\&quot;registerDate\&quot;;s:19:\&quot;2012-05-02 16:29:22\&quot;;s:13:\&quot;lastvisitDate\&quot;;s:19:\&quot;2013-01-02 11:25:51\&quot;;s:10:\&quot;activation\&quot;;s:1:\&quot;0\&quot;;s:6:\&quot;params\&quot;;s:0:\&quot;\&quot;;s:6:\&quot;groups\&quot;;a:1:{i:8;s:1:\&quot;8\&quot;;}s:5:\&quot;guest\&quot;;i:0;s:10:\&quot;\0<b style="color: red;">*</b>\0_params\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:14:\&quot;\0<b style="color: red;">*</b>\0_authGroups\&quot;;a:2:{i:0;i:1;i:1;i:8;}s:14:\&quot;\0<b style="color: red;">*</b>\0_authLevels\&quot;;a:4:{i:0;i:1;i:1;i:1;i:2;i:2;i:3;i:3;}s:15:\&quot;\0<b style="color: red;">*</b>\0_authActions\&quot;;N;s:12:\&quot;\0<b style="color: red;">*</b>\0_errorMsg\&quot;;N;s:19:\&quot;customer_data_array\&quot;;a:0:{}s:10:\&quot;\0<b style="color: red;">*</b>\0_errors\&quot;;a:0:{}s:3:\&quot;aid\&quot;;i:0;s:8:\&quot;location\&quot;;s:41:\&quot;/libraries/joomla/database/table.php &lt;br&gt;\&quot;;s:7:\&quot;surname\&quot;;s:0:\&quot;\&quot;;s:11:\&quot;middle_name\&quot;;s:0:\&quot;\&quot;;s:3:\&quot;sex\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;birthday\&quot;;s:10:\&quot;0000-00-00\&quot;;s:10:\&quot;work_phone\&quot;;s:0:\&quot;\&quot;;s:6:\&quot;mobila\&quot;;s:0:\&quot;\&quot;;s:5:\&quot;skype\&quot;;s:0:\&quot;\&quot;;s:12:\&quot;company_name\&quot;;s:0:\&quot;\&quot;;s:4:\&quot;city\&quot;;s:0:\&quot;\&quot;;s:6:\&quot;region\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;zip_code\&quot;;s:0:\&quot;\&quot;;s:15:\&quot;customer_status\&quot;;s:14:\&quot;enabled active\&quot;;}s:13:\&quot;session.token\&quot;;s:32:\&quot;799bcfbb259b48db8c7c15e359a3c9af\&quot;;}&#039;
	, `time` <b class="dbgOperator">=</b> &#039;1357138362&#039;
<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `session_id` <b class="dbgOperator">=</b> &#039;85271e41825276476b49ab4ef629a259&#039;</code></li></ol><h4>20 типов SQL-запросов зафиксировано, отсортировано по вхождениям</h4><h5>Запросы типа SELECT:</h5><ol><li><code>20 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(id)
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages_read</span></code></li><li><code>20 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_users</span>.id <span class="dbgCommand">AS</span> user_id, `name` <span class="dbgCommand">AS</span> user_name, `username` <span class="dbgCommand">AS</span> user_login
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span>, <span class="dbgTable">dnior_webapps_messages</span></code></li><li><code>20 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> u.id
     <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as u, <span class="dbgTable">dnior_user_usergroup_map</span> as g</code></li><li><code>20 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> 
        <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;inbox&#039;, 
            <span class="dbgCommand">IF</span> ( m.user_id_from, &#039;outbox&#039;, &#039;unknown&#039; )
           ) <span class="dbgCommand">AS</span> direct
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> u 
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages</span> <span class="dbgCommand">AS</span> m 
        <br />&#160;&#160;<span class="dbgCommand">ON</span> ( m.user_id_from <b class="dbgOperator">=</b> u.id -- sender
             <span class="dbgCommand">OR</span> 
             m.user_id_to <b class="dbgOperator">=</b> u.id   -- receiver
           )
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_site_options</span> 
     as cso <br />&#160;&#160;<span class="dbgCommand">ON</span> cso.customer_id <b class="dbgOperator">=</b>  u.id
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_customer_orders</span> 
     as co <br />&#160;&#160;<span class="dbgCommand">ON</span> co.customer_id <b class="dbgOperator">=</b>  u.id</code></li><li><code>2 &#215; <span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span></code></li><li><code>2 &#215; <span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>,uc.name <span class="dbgCommand">AS</span> editor
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_webapps_messages</span>` <span class="dbgCommand">AS</span> a
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_users</span> <span class="dbgCommand">AS</span> uc <br />&#160;&#160;<span class="dbgCommand">ON</span> uc.id<b class="dbgOperator">=</b>a.checked_out</code></li><li><code>2 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(session_id)
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_session</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> `menu_text`, `link` <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span>, <span class="dbgTable">dnior_webapps_backend_submenu_list</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(<b style="color: red;">*</b>)
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_messages</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>, <span class="dbgCommand">SUM</span>(b.home) <span class="dbgCommand">AS</span> home,b.language,l.image,l.sef,l.title_native
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu_types</span> <span class="dbgCommand">AS</span> a
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> b <br />&#160;&#160;<span class="dbgCommand">ON</span> b.menutype <b class="dbgOperator">=</b> a.menutype <br />&#160;&#160;<span class="dbgCommand">AND</span> b.home !<b class="dbgOperator">=</b> 0
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_languages</span> <span class="dbgCommand">AS</span> l <br />&#160;&#160;<span class="dbgCommand">ON</span> l.lang_code <b class="dbgOperator">=</b> language</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> m.id, m.title, m.alias, m.link, m.parent_id, m.img, e.element
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> m
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> m.component_id <b class="dbgOperator">=</b> e.extension_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_modules</span> <span class="dbgCommand">AS</span> m
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_modules_menu</span> <span class="dbgCommand">AS</span> mm <br />&#160;&#160;<span class="dbgCommand">ON</span> mm.moduleid <b class="dbgOperator">=</b> m.id
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element <b class="dbgOperator">=</b> m.module <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id <b class="dbgOperator">=</b> m.client_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> b.id
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_user_usergroup_map</span> <span class="dbgCommand">AS</span> map
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_usergroups</span> <span class="dbgCommand">AS</span> a <br />&#160;&#160;<span class="dbgCommand">ON</span> a.id <b class="dbgOperator">=</b> map.group_id
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_usergroups</span> <span class="dbgCommand">AS</span> b <br />&#160;&#160;<span class="dbgCommand">ON</span> b.lft &lt;<b class="dbgOperator">=</b> a.lft <br />&#160;&#160;<span class="dbgCommand">AND</span> b.rgt &gt;<b class="dbgOperator">=</b> a.rgt</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">DISTINCT</span> <span class="dbgTable">dnior_webapps_messages</span>.id, 
        user_id_from, 
        user_id_to, 
        <span class="dbgCommand">DATE_FORMAT</span>(<span class="dbgTable">dnior_webapps_messages</span>.date_time, &#039;%e.%m.%Y %H:%i&#039;) <span class="dbgCommand">AS</span> &#039;datetime&#039;, 
        subject, 
        message, 
     files_names,
     <span class="dbgTable">dnior_webapps_messages_read</span>.date_time <span class="dbgCommand">AS</span> &#039;read_datetime&#039;,
        obj_identifier,
        <span class="dbgTable">dnior_webapps_messages_deleted</span>.user_id <span class="dbgCommand">AS</span> del_by_user 
   <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_messages</span> 
   <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages_read</span> <br />&#160;&#160;<span class="dbgCommand">ON</span> message_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_messages</span>.id
   <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_files_attaches</span> <br />&#160;&#160;<span class="dbgCommand">ON</span> <span class="dbgTable">dnior_webapps_files_attaches</span>.message_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_messages</span>.id
   <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_messages_deleted</span> <br />&#160;&#160;<span class="dbgCommand">ON</span> <span class="dbgTable">dnior_webapps_messages_deleted</span>.message_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_messages</span>.id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> folder <span class="dbgCommand">AS</span> type, element <span class="dbgCommand">AS</span> name, params
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> `data`
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> template, s.params
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_template_styles</span> as s
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> as e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.type<b class="dbgOperator">=</b>&#039;template&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> e.element<b class="dbgOperator">=</b>s.template <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id<b class="dbgOperator">=</b>s.client_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgCommand">COUNT</span>(<b style="color: red;">*</b>)
   <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_message</span></code></li></ol><h5>Прочие SQL-запросы:</h5><ol><li><code>1 &#215; <span class="dbgCommand">UPDATE</span> `<span class="dbgTable">dnior_session</span>`
 <br />&#160;&#160;<span class="dbgCommand">SET</span> `data` <b class="dbgOperator">=</b> &#039;__default|a:8:{s:15:\&quot;session.counter\&quot;;i:7;s:19:\&quot;session.timer.start\&quot;;i:1357138049;s:18:\&quot;session.timer.last\&quot;;i:1357138063;s:17:\&quot;session.timer.now\&quot;;i:1357138361;s:22:\&quot;session.client.browser\&quot;;s:108:\&quot;Mozilla/5.0 (Windows <span class="dbgCommand">NT</span> 6.1; WOW64) AppleWebKit/537.11 (<span class="dbgCommand">KHTML</span>, like Gecko) Chrome/23.0.1271.97 Safari/537.11\&quot;;s:8:\&quot;registry\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:2:{s:11:\&quot;application\&quot;;O:8:\&quot;stdClass\&quot;:1:{s:4:\&quot;lang\&quot;;s:0:\&quot;\&quot;;}s:13:\&quot;com_installer\&quot;;O:8:\&quot;stdClass\&quot;:2:{s:7:\&quot;message\&quot;;s:0:\&quot;\&quot;;s:17:\&quot;extension_message\&quot;;s:0:\&quot;\&quot;;}}}s:4:\&quot;user\&quot;;O:5:\&quot;JUser\&quot;:37:{s:9:\&quot;\0<b style="color: red;">*</b>\0isRoot\&quot;;b:1;s:2:\&quot;id\&quot;;s:2:\&quot;42\&quot;;s:4:\&quot;name\&quot;;s:10:\&quot;Super User\&quot;;s:8:\&quot;username\&quot;;s:5:\&quot;admin\&quot;;s:5:\&quot;email\&quot;;s:16:\&quot;srgg67@gmail.com\&quot;;s:8:\&quot;password\&quot;;s:65:\&quot;008f80dfdba3b87bd9b7f22a9c470a21:vFQ7tKHlxOUCpGwmjTdxw3Z7vhPIlVZf\&quot;;s:14:\&quot;password_clear\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;usertype\&quot;;s:10:\&quot;deprecated\&quot;;s:5:\&quot;block\&quot;;s:1:\&quot;0\&quot;;s:9:\&quot;sendEmail\&quot;;s:1:\&quot;1\&quot;;s:12:\&quot;registerDate\&quot;;s:19:\&quot;2012-05-02 16:29:22\&quot;;s:13:\&quot;lastvisitDate\&quot;;s:19:\&quot;2013-01-02 11:25:51\&quot;;s:10:\&quot;activation\&quot;;s:1:\&quot;0\&quot;;s:6:\&quot;params\&quot;;s:0:\&quot;\&quot;;s:6:\&quot;groups\&quot;;a:1:{i:8;s:1:\&quot;8\&quot;;}s:5:\&quot;guest\&quot;;i:0;s:10:\&quot;\0<b style="color: red;">*</b>\0_params\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:14:\&quot;\0<b style="color: red;">*</b>\0_authGroups\&quot;;a:2:{i:0;i:1;i:1;i:8;}s:14:\&quot;\0<b style="color: red;">*</b>\0_authLevels\&quot;;a:4:{i:0;i:1;i:1;i:1;i:2;i:2;i:3;i:3;}s:15:\&quot;\0<b style="color: red;">*</b>\0_authActions\&quot;;N;s:12:\&quot;\0<b style="color: red;">*</b>\0_errorMsg\&quot;;N;s:19:\&quot;customer_data_array\&quot;;a:0:{}s:10:\&quot;\0<b style="color: red;">*</b>\0_errors\&quot;;a:0:{}s:3:\&quot;aid\&quot;;i:0;s:8:\&quot;location\&quot;;s:41:\&quot;/libraries/joomla/database/table.php &lt;br&gt;\&quot;;s:7:\&quot;surname\&quot;;s:0:\&quot;\&quot;;s:11:\&quot;middle_name\&quot;;s:0:\&quot;\&quot;;s:3:\&quot;sex\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;birthday\&quot;;s:10:\&quot;0000-00-00\&quot;;s:10:\&quot;work_phone\&quot;;s:0:\&quot;\&quot;;s:6:\&quot;mobila\&quot;;s:0:\&quot;\&quot;;s:5:\&quot;skype\&quot;;s:0:\&quot;\&quot;;s:12:\&quot;company_name\&quot;;s:0:\&quot;\&quot;;s:4:\&quot;city\&quot;;s:0:\&quot;\&quot;;s:6:\&quot;region\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;zip_code\&quot;;s:0:\&quot;\&quot;;s:15:\&quot;customer_status\&quot;;s:14:\&quot;enabled active\&quot;;}s:13:\&quot;session.token\&quot;;s:32:\&quot;799bcfbb259b48db8c7c15e359a3c9af\&quot;;}&#039;  , `time` <b class="dbgOperator">=</b> &#039;1357138362&#039;</code></li><li><code>1 &#215; <span class="dbgCommand">DELETE</span> 
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`</code></li></ol></div></div></body>
</html>
