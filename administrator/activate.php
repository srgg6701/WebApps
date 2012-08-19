<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>a2allcom_fastweb - Administration</title>
  <link href="/webapps/administrator/templates/bluestork/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/webapps/media/system/css/modal.css" type="text/css" />
  <link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="templates/bluestork/css/template.css" type="text/css" />
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
  <script src="/webapps/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/core.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/mootools-more.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/multiselect.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/modal.js" type="text/javascript"></script>
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
				new Joomla.JMultiSelect('adminForm');
			});
		window.addEvent('domready', function() {

			SqueezeBox.initialize({});
			SqueezeBox.assign($$('a.modal'), {
				parse: 'rel'
			});
		});
		window.addEvent('domready', function(){
			actions = $$('a.move_up');
			actions.combine($$('a.move_down'));
			actions.combine($$('a.grid_true'));
			actions.combine($$('a.grid_false'));
			actions.combine($$('a.grid_trash'));
			actions.each(function(a){
				a.addEvent('click', function(){
					args = JSON.decode(this.rel);
					listItemTask(args.id, args.task);
				});
			});
			$$('input.check-all-toggle').each(function(el){
				el.addEvent('click', function(){
					if (el.checked) {
						document.id(this.form).getElements('input[type=checkbox]').each(function(i){
							i.checked = true;
						})
					}
					else {
						document.id(this.form).getElements('input[type=checkbox]').each(function(i){
							i.checked = false;
						})
					}
				});
			});
		});
  </script>


<!--[if IE 7]>
<link href="templates/bluestork/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if gte IE 8]>
<link href="templates/bluestork/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="minwidth-body">
	<div id="border-top" class="h_blue">
		<span class="logo"><a href="http://www.joomla.org" target="_blank"><img src="templates/bluestork/images/logo.png" alt="Joomla!" /></a></span>
		<span class="title"><a href="index.php">Administration</a></span>
	</div>
	<div id="header-box">
		<div id="module-menu">
			<ul id="menu" >
<li class="node"><a href="#">Site</a><ul>
<li><a class="icon-16-cpanel" href="index.php">Control Panel</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-profile" href="index.php?option=com_admin&amp;task=profile.edit&amp;id=42">My Profile</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-config" href="index.php?option=com_config">Global Configuration</a></li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-maintenance" href="index.php?option=com_checkin">Maintenance</a><ul id="menu-com-checkin" class="menu-component">
<li><a class="icon-16-checkin" href="index.php?option=com_checkin">Global Check-in</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-clear" href="index.php?option=com_cache">Clear Cache</a></li>
<li><a class="icon-16-purge" href="index.php?option=com_cache&amp;view=purge">Purge Expired Cache</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li><a class="icon-16-info" href="index.php?option=com_admin&amp;view=sysinfo">System Information</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-logout" href="/webapps/administrator/index.php?option=com_login&amp;task=logout&amp;9714788168a56028ed82bdd218d9785d=1">Logout</a></li>
</ul>
</li>
<li class="node"><a href="#">Users</a><ul>
<li class="node"><a class="icon-16-user" href="index.php?option=com_users&amp;view=users">User Manager</a><ul id="menu-com-users-users" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=user.add">Add New User</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-groups" href="index.php?option=com_users&amp;view=groups">Groups</a><ul id="menu-com-users-groups" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=group.add">Add New Group</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-levels" href="index.php?option=com_users&amp;view=levels">Access Levels</a><ul id="menu-com-users-levels" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=level.add">Add New Access Level</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-user-note" href="index.php?option=com_users&amp;view=notes">User Notes</a><ul id="menu-com-users-notes" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_users&amp;task=note.add">Add User Note</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-category" href="index.php?option=com_categories&amp;view=categories&amp;extension=com_users.notes">User Note Categories</a><ul id="menu-com-categories-categories-com-users-notes" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_categories&amp;task=category.add&amp;extension=com_users">Add New Category</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li><a class="icon-16-massmail" href="index.php?option=com_users&amp;view=mail">Mass Mail Users</a></li>
</ul>
</li>
<li class="node"><a href="#">Menus</a><ul>
<li class="node"><a class="icon-16-menumgr" href="index.php?option=com_menus&amp;view=menus">Menu Manager</a><ul id="menu-com-menus-menus" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=menu&amp;layout=edit">Add New Menu</a></li>
</ul>
</li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-menu" href="index.php?option=com_menus&amp;view=items&amp;menutype=mainmenu">Main Menu <span><img src="/webapps/administrator/templates/bluestork/images/menu/icon-16-default.png" alt="*" title="Home" /></span></a><ul id="menu-com-menus-items-mainmenu" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=mainmenu">Add New Menu Item</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-menu" href="index.php?option=com_menus&amp;view=items&amp;menutype=footer">Footer</a><ul id="menu-com-menus-items-footer" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=footer">Add New Menu Item</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-menu" href="index.php?option=com_menus&amp;view=items&amp;menutype=customer-accaunt">Мой аккаунт</a><ul id="menu-com-menus-items-customer-accaunt" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=customer-accaunt">Add New Menu Item</a></li>
</ul>
</li>
</ul>
</li>
<li class="node"><a href="#">Content</a><ul>
<li class="node"><a class="icon-16-article" href="index.php?option=com_content">Article Manager</a><ul id="menu-com-content" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_content&amp;task=article.add">Add New Article</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-category" href="index.php?option=com_categories&amp;extension=com_content">Category Manager</a><ul id="menu-com-categories-com-content" class="menu-component">
<li><a class="icon-16-newarticle" href="index.php?option=com_categories&amp;task=category.add&amp;extension=com_content">Add New Category</a></li>
</ul>
</li>
<li><a class="icon-16-featured" href="index.php?option=com_content&amp;view=featured">Featured Articles</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-media" href="index.php?option=com_media">Media Manager</a></li>
</ul>
</li>
<li class="node"><a href="#">Components</a><ul>
<li class="node"><a class="icon-16-s_com_collector1" href="index.php?option=com_collector1">Коллектор</a><ul id="menu-com-collector1" class="menu-component">
<li><a class="icon-16-s__customers" href="index.php?option=com_collector1&amp;view=_customers"> customers</a></li>
<li><a class="icon-16-s__customers_paid" href="index.php?option=com_collector1&amp;view=_customers_paid"> customers paid</a></li>
<li><a class="icon-16-s__customer_site_options" href="index.php?option=com_collector1&amp;view=_customer_site_options"> customer site options</a></li>
<li><a class="icon-16-s__engines_all" href="index.php?option=com_collector1&amp;view=_engines_all"> engines all</a></li>
<li><a class="icon-16-s__engines_ru" href="index.php?option=com_collector1&amp;view=_engines_ru"> engines ru</a></li>
<li><a class="icon-16-s__site_options" href="index.php?option=com_collector1&amp;view=_site_options"> site options</a></li>
<li><a class="icon-16-s__site_options_types" href="index.php?option=com_collector1&amp;view=_site_options_types"> site options types</a></li>
<li><a class="icon-16-s__site_types" href="index.php?option=com_collector1&amp;view=_site_types"> site types</a></li>
<li><a class="icon-16-s__options_beyond_sides" href="index.php?option=com_collector1&amp;view=_options_beyond_sides"> options beyond sides</a></li>
<li><a class="icon-16-s__site_options_partial" href="index.php?option=com_collector1&amp;view=_site_options_partial"> site options partial</a></li>
<li><a class="icon-16-s__precustomers" href="index.php?option=com_collector1&amp;view=_precustomers"> precustomers</a></li>
<li><a class="icon-16-s__files_names" href="index.php?option=com_collector1&amp;view=_files_names"> files names</a></li>
<li><a class="icon-16-s__customer_orders" href="index.php?option=com_collector1&amp;view=_customer_orders"> customer orders</a></li>
<li><a class="icon-16-s__virtual_orderss" href="index.php?option=com_collector1&amp;view=_virtual_orderss"> virtual orderss</a></li>
</ul>
</li>
<li><a class="icon-16-component" href="index.php?option=com_ajax">ajax</a></li>
<li class="node"><a class="icon-16-banners" href="index.php?option=com_banners">Banners</a><ul id="menu-com-banners" class="menu-component">
<li><a class="icon-16-banners" href="index.php?option=com_banners">Banners</a></li>
<li><a class="icon-16-banners-cat" href="index.php?option=com_categories&amp;extension=com_banners">Categories</a></li>
<li><a class="icon-16-banners-clients" href="index.php?option=com_banners&amp;view=clients">Clients</a></li>
<li><a class="icon-16-banners-tracks" href="index.php?option=com_banners&amp;view=tracks">Tracks</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-contact" href="index.php?option=com_contact">Contacts</a><ul id="menu-com-contact" class="menu-component">
<li><a class="icon-16-contact" href="index.php?option=com_contact">Contacts</a></li>
<li><a class="icon-16-contact-cat" href="index.php?option=com_categories&amp;extension=com_contact">Categories</a></li>
</ul>
</li>
<li><a class="icon-16-component" href="index.php?option=com_hello">hello-world</a></li>
<li class="node"><a class="icon-16-messages" href="index.php?option=com_messages">Messaging</a><ul id="menu-com-messages" class="menu-component">
<li><a class="icon-16-messages-add" href="index.php?option=com_messages&amp;task=message.add">New Private Message</a></li>
<li><a class="icon-16-messages-read" href="index.php?option=com_messages">Read Private Messages</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-newsfeeds" href="index.php?option=com_newsfeeds">Newsfeeds</a><ul id="menu-com-newsfeeds" class="menu-component">
<li><a class="icon-16-newsfeeds" href="index.php?option=com_newsfeeds">Feeds</a></li>
<li><a class="icon-16-newsfeeds-cat" href="index.php?option=com_categories&amp;extension=com_newsfeeds">Categories</a></li>
</ul>
</li>
<li class="node"><a class="icon-16-component" href="index.php?option=com_pay">Pay</a><ul id="menu-com-pay" class="menu-component">
<li><a class="icon-16-payments" href="index.php?option=com_pay&amp;view=payments">Payments</a></li>
</ul>
</li>
<li><a class="icon-16-redirect" href="index.php?option=com_redirect">Redirect</a></li>
<li><a class="icon-16-search" href="index.php?option=com_search">Search</a></li>
<li><a class="icon-16-finder" href="index.php?option=com_finder">Smart Search</a></li>
<li class="node"><a class="icon-16-weblinks" href="index.php?option=com_weblinks">Weblinks</a><ul id="menu-com-weblinks" class="menu-component">
<li><a class="icon-16-weblinks" href="index.php?option=com_weblinks">Links</a></li>
<li><a class="icon-16-weblinks-cat" href="index.php?option=com_categories&amp;extension=com_weblinks">Categories</a></li>
</ul>
</li>
</ul>
</li>
<li class="node"><a href="#">Extensions</a><ul>
<li><a class="icon-16-install" href="index.php?option=com_installer">Extension Manager</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-module" href="index.php?option=com_modules">Module Manager</a></li>
<li><a class="icon-16-plugin" href="index.php?option=com_plugins">Plug-in Manager</a></li>
<li><a class="icon-16-themes" href="index.php?option=com_templates">Template Manager</a></li>
<li><a class="icon-16-language" href="index.php?option=com_languages">Language Manager</a></li>
</ul>
</li>
<li class="node"><a href="#">Help</a><ul>
<li><a class="icon-16-help" href="index.php?option=com_admin&amp;view=help">Joomla Help</a></li>
<li class="separator"><span></span></li>
<li><a class="icon-16-help-forum" href="http://forum.joomla.org" target="_blank" >Official Support Forum</a></li>
<li><a class="icon-16-help-docs" href="http://docs.joomla.org" target="_blank" >Documentation Wiki</a></li>
<li class="separator"><span></span></li>
<li class="node"><a class="icon-16-weblinks" href="#">Useful Joomla links</a><ul class="menu-component">
<li><a class="icon-16-help-jed" href="http://extensions.joomla.org" target="_blank" >Joomla Extensions</a></li>
<li><a class="icon-16-help-trans" href="http://community.joomla.org/translations.html" target="_blank" >Joomla Translations</a></li>
<li><a class="icon-16-help-jrd" href="http://resources.joomla.org" target="_blank" >Joomla Resources</a></li>
<li><a class="icon-16-help-community" href="http://community.joomla.org" target="_blank" >Community Portal</a></li>
<li><a class="icon-16-help-security" href="http://developer.joomla.org/security.html" target="_blank" >Security Center</a></li>
<li><a class="icon-16-help-dev" href="http://developer.joomla.org" target="_blank" >Developer Resources</a></li>
<li><a class="icon-16-help-shop" href="http://shop.joomla.org" target="_blank" >Joomla Shop</a></li>
</ul>
</li>
</ul>
</li>
</ul>

		</div>
		<div id="module-status">
			<span class="loggedin-users">0 Visitors</span><span class="backloggedin-users">1 Admin</span><span class="no-unread-messages"><a href="/webapps/administrator/index.php?option=com_messages">0</a></span>
			<span class="viewsite"><a href="http://localhost/webapps/" target="_blank">View Site</a></span><span class="logout"><a href="/webapps/administrator/index.php?option=com_login&amp;task=logout&amp;9714788168a56028ed82bdd218d9785d=1">Log out</a></span>		</div>
		<div class="clr"></div>
	</div>

	<div id="content-box">
		<div id="toolbar-box">
			<div class="m">
				<div class="toolbar-list" id="toolbar">
<ul>
<li class="button" id="toolbar-new">
<a href="#" onclick="Joomla.submitbutton('user.add')" class="toolbar">
<span class="icon-32-new">
</span>
New
</a>
</li>

<li class="button" id="toolbar-edit">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('user.edit')}" class="toolbar">
<span class="icon-32-edit">
</span>
Edit
</a>
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-publish">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('users.activate')}" class="toolbar">
<span class="icon-32-publish">
</span>
Activate
</a>
</li>

<li class="button" id="toolbar-unpublish">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('users.block')}" class="toolbar">
<span class="icon-32-unpublish">
</span>
Block
</a>
</li>

<li class="button" id="toolbar-unblock">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('users.unblock')}" class="toolbar">
<span class="icon-32-unblock">
</span>
Unblock
</a>
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-delete">
<a href="#" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('users.delete')}" class="toolbar">
<span class="icon-32-delete">
</span>
Delete
</a>
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-popup-options">
<a class="modal" href="http://localhost/webapps/administrator/index.php?option=com_config&amp;view=component&amp;component=com_users&amp;path=&amp;tmpl=component" rel="{handler: 'iframe', size: {x: 875, y: 550}, onClose: function() {}}">
<span class="icon-32-options">
</span>
Options
</a>
</li>

<li class="divider">
</li>

<li class="button" id="toolbar-help">
<a href="#" onclick="Joomla.popupWindow('http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help16:Users_User_Manager', 'Help', 700, 500, 1)" rel="help" class="toolbar">
<span class="icon-32-help">
</span>
Help
</a>
</li>

</ul>
<div class="clr"></div>
</div>
					<div class="pagetitle icon-48-user"><h2>User Manager: Users</h2></div>
			</div>
		</div>
						<div id="submenu-box">
			<div class="m">
				<ul id="submenu">
		<li>
	<a class="active" href="index.php?option=com_users&amp;view=users">Users</a>	</li>
		<li>
	<a href="index.php?option=com_users&amp;view=groups">User Groups</a>	</li>
		<li>
	<a href="index.php?option=com_users&amp;view=levels">Viewing Access Levels</a>	</li>
		<li>
	<a href="index.php?option=com_users&amp;view=notes">User Notes</a>	</li>
		<li>
	<a href="index.php?option=com_categories&amp;extension=com_users.notes">Note Categories</a>	</li>
	</ul>
				<div class="clr"></div>
			</div>
		</div>
		
				
<div id="system-message-container">
</div>
		<div id="element-box">
			<div class="m">
				﻿
<form action="/webapps/administrator/index.php?option=com_users&amp;view=users" onsubmit="alert(this.action);" target="_new" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search">Search Users</label>
			<input type="text" name="filter_search" id="filter_search" value="" title="Search Users" />
			<button type="submit">Search</button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Reset</button>
		</div>
		<div class="filter-select fltrt">
			<label for="filter_state">
				Filter Users by:&#160;			</label>

			<select name="filter_state" class="inputbox" onchange="this.form.submit()">
				<option value="*">- State -</option>
				<option value="0">Enabled</option>
<option value="1">Disabled</option>
			</select>

			<select name="filter_active" class="inputbox" onchange="this.form.submit()">
				<option value="*">- Active -</option>
				<option value="0">Activated</option>
<option value="1">Unactivated</option>
			</select>

			<select name="filter_group_id" class="inputbox" onchange="this.form.submit()">
				<option value="">- Group -</option>
				<option value="1">Public</option>
<option value="6">- Manager</option>
<option value="7">- - Administrator</option>
<option value="2">- Registered</option>
<option value="3">- - Author</option>
<option value="4">- - - Editor</option>
<option value="5">- - - - Publisher</option>
<option value="8">- Super Users</option>
			</select>

			<select name="filter_range" id="filter_range" class="inputbox" onchange="this.form.submit()">
				<option value="">- Registration Date -</option>
				<option value="today">today</option>
<option value="past_week">in the last week</option>
<option value="past_1month">in the last month</option>
<option value="past_3month">in the last 3 months</option>
<option value="past_6month">in the last 6 months</option>
<option value="past_year">in the last year</option>
<option value="post_year">more than a year ago</option>
			</select>
		</div>
	</fieldset>
	<div class="clr"> </div>

	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" title="Check All" onclick="Joomla.checkAll(this)" />
				</th>
				<th class="left">
					<a href="#" onclick="Joomla.tableOrdering('a.name','desc','');" title="Click to sort by this column">Name<img src="/webapps/media/system/images/sort_asc.png" alt=""  /></a>				</th>
				<th class="nowrap" width="10%">
					<a href="#" onclick="Joomla.tableOrdering('a.username','asc','');" title="Click to sort by this column">User Name</a>				</th>
				<th class="nowrap" width="5%">
					<a href="#" onclick="Joomla.tableOrdering('a.block','asc','');" title="Click to sort by this column">Enabled</a>				</th>
				<th class="nowrap" width="5%">
					<a href="#" onclick="Joomla.tableOrdering('a.activation','asc','');" title="Click to sort by this column">Activated</a>				</th>
				<th class="nowrap" width="10%">
					User Groups				</th>
				<th class="nowrap" width="15%">
					<a href="#" onclick="Joomla.tableOrdering('a.email','asc','');" title="Click to sort by this column">Email</a>				</th>
				<th class="nowrap" width="10%">
					<a href="#" onclick="Joomla.tableOrdering('a.lastvisitDate','asc','');" title="Click to sort by this column">Last Visit Date</a>				</th>
				<th class="nowrap" width="10%">
					<a href="#" onclick="Joomla.tableOrdering('a.registerDate','asc','');" title="Click to sort by this column">Registration Date</a>				</th>
				<th class="nowrap" width="3%">
					<a href="#" onclick="Joomla.tableOrdering('a.id','asc','');" title="Click to sort by this column">ID</a>				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="15">
					<div class="container"><div class="pagination">

<div class="limit">Display #<select id="limit" name="limit" class="inputbox" size="1" onchange="Joomla.submitform();">
	<option value="5">5</option>
	<option value="10">10</option>
	<option value="15">15</option>
	<option value="20" selected="selected">20</option>
	<option value="25">25</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="0">All</option>
</select>
</div>
<div class="limit"></div>
<input type="hidden" name="limitstart" value="0" />
</div></div>				</td>
			</tr>
		</tfoot>
		<tbody>
					<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb0" name="cid[]" value="42" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 1" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=42"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=42" title="Edit User Super User">
						Super User</a>
														</td>
				<td class="center">
					admin				</td>
				<td class="center">
																		<a class="grid_true"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Super Users									</td>
				<td class="center">
					srgg67@gmail.com				</td>
				<td class="center">
											2012-07-30 07:38:34									</td>
				<td class="center">
					2012-05-02 16:29:22				</td>
				<td class="center">
					42				</td>
			</tr>
						<tr class="row1">
				<td class="center">
											<input type="checkbox" id="cb1" name="cid[]" value="48" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 2" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=48"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=48" title="Edit User Ванюшка">
						Ванюшка</a>
														</td>
				<td class="center">
					ivanno				</td>
				<td class="center">
																		<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb1', task:'users.unblock'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					ivano@mail.ru				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-06-15 07:24:54				</td>
				<td class="center">
					48				</td>
			</tr>
						<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb2" name="cid[]" value="54" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 3" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=54"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=54" title="Edit User Герберт">
						Герберт</a>
														</td>
				<td class="center">
					herbert				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb2', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					herbert@walles.org				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-07-29 17:26:37				</td>
				<td class="center">
					54				</td>
			</tr>
						<tr class="row1">
				<td class="center">
											<input type="checkbox" id="cb3" name="cid[]" value="51" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 4" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=51"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=51" title="Edit User Коняг">
						Коняг</a>
														</td>
				<td class="center">
					cohnago				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb3', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					cognax@mail.ru				</td>
				<td class="center">
											2012-07-26 11:14:19									</td>
				<td class="center">
					2012-07-26 11:00:13				</td>
				<td class="center">
					51				</td>
			</tr>
						<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb4" name="cid[]" value="55" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 5" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=55"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=55" title="Edit User Нана">
						Нана</a>
														</td>
				<td class="center">
					nana				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb4', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					nunu@mail.ru				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-07-29 17:33:58				</td>
				<td class="center">
					55				</td>
			</tr>
						<tr class="row1">
				<td class="center">
                	<input type="checkbox" id="cb5" name="cid[]" value="63" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 6" /></td>
				<td>
					<div class="fltrt">
						<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=57"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div><a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=63" title="Edit User Ольчик">USER TO ACTIVATE</a>
				</td>
				<td class="center">
					USER LOGIN				</td>
				<td class="center">
<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb5', task:'users.unblock'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb5', task:'users.activate'}" href="#toggle"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					USER@EMAIL				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-07-30 07:52:17				</td>
				<td class="center">
					63				</td>
			</tr>
						<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb6" name="cid[]" value="50" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 7" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=50"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=50" title="Edit User Орланд">
						Орланд</a>
														</td>
				<td class="center">
					orlando				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb6', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					orlando@blum.com				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-07-26 09:59:17				</td>
				<td class="center">
					50				</td>
			</tr>
						<tr class="row1">
				<td class="center">
											<input type="checkbox" id="cb7" name="cid[]" value="44" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 8" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=44"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=44" title="Edit User Серёшкин">
						Серёшкин</a>
														</td>
				<td class="center">
					srgg_tester				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb7', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					dusk18@mail.ru				</td>
				<td class="center">
											2012-06-05 17:51:18									</td>
				<td class="center">
					2012-05-12 14:06:40				</td>
				<td class="center">
					44				</td>
			</tr>
						<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb8" name="cid[]" value="43" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 9" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=43"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=43" title="Edit User Сержик">
						Сержик</a>
														</td>
				<td class="center">
					srgg67				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb8', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					educationservice@yandex.ru				</td>
				<td class="center">
											2012-06-18 15:21:04									</td>
				<td class="center">
					2012-05-08 08:56:56				</td>
				<td class="center">
					43				</td>
			</tr>
						<tr class="row1">
				<td class="center">
											<input type="checkbox" id="cb9" name="cid[]" value="45" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 10" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=45"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=45" title="Edit User Толик">
						Толик</a>
														</td>
				<td class="center">
					toljan				</td>
				<td class="center">
																		<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb9', task:'users.unblock'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb5', task:'users.activate'}" href="#toggle"></a>					
                    
                    </td>
				<td class="center">
											Registered									</td>
				<td class="center">
					totalitarist@mail.ru				</td>
				<td class="center">
											2012-06-15 08:25:31									</td>
				<td class="center">
					2012-05-26 07:29:58				</td>
				<td class="center">
					45				</td>
			</tr>
						<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb10" name="cid[]" value="46" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 11" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=46"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=46" title="Edit User Толик2">
						Толик2</a>
														</td>
				<td class="center">
					toljasik				</td>
				<td class="center">
																		<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb10', task:'users.unblock'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb5', task:'users.activate'}" href="#toggle"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					sale@referats.info				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-05-26 08:37:32				</td>
				<td class="center">
					46				</td>
			</tr>
						<tr class="row1">
				<td class="center">
											<input type="checkbox" id="cb11" name="cid[]" value="47" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 12" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=47"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=47" title="Edit User Толян">
						Толян</a>
														</td>
				<td class="center">
					toljanko				</td>
				<td class="center">
																		<a class="grid_false hasTip" title="No::Click on icon to toggle state." rel="{id:'cb11', task:'users.unblock'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					educationservice.ru@gmail.com				</td>
				<td class="center">
											Never									</td>
				<td class="center">
					2012-05-26 09:18:09				</td>
				<td class="center">
					47				</td>
			</tr>
						<tr class="row0">
				<td class="center">
											<input type="checkbox" id="cb12" name="cid[]" value="49" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row 13" />									</td>
				<td>
					<div class="fltrt">
																		<a href="/webapps/administrator/index.php?option=com_users&amp;task=note.add&amp;u_id=49"><img src="/webapps/administrator/templates/bluestork/images/admin/note_add_16.png" alt="COM_USERS_NOTES" title="Add a note" /></a>					</div>
										<a href="/webapps/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=49" title="Edit User Федот-да-нетот">
						Федот-да-нетот</a>
														</td>
				<td class="center">
					fedja				</td>
				<td class="center">
																		<a class="grid_true hasTip" title="Yes::Click on icon to toggle state." rel="{id:'cb12', task:'users.block'}" href="#toggle"></a>															</td>
				<td class="center">
					<a class="grid_true"></a>				</td>
				<td class="center">
											Registered									</td>
				<td class="center">
					fjodor@mail.ru				</td>
				<td class="center">
											2012-07-25 10:54:48									</td>
				<td class="center">
					2012-07-25 10:17:46				</td>
				<td class="center">
					49				</td>
			</tr>
					</tbody>
	</table>

		<fieldset class="batch">
	<legend>Batch process the selected users</legend>
	<label id="batch-choose-action-lbl" for="batch-choose-action">Select Group</label>
	<fieldset id="batch-choose-action" class="combo">
		<select name="batch[group_id]" class="inputbox" id="batch-group-id">
			<option value="">Select</option>
			<option value="1">Public</option>
<option value="6">- Manager</option>
<option value="7">- - Administrator</option>
<option value="2">- Registered</option>
<option value="3">- - Author</option>
<option value="4">- - - Editor</option>
<option value="5">- - - - Publisher</option>
<option value="8">- Super Users</option>
		</select>
		
	<input type="radio" name="batch[group_action]" id="batch[group_action]add" value="add"  checked="checked" />
	<label for="batch[group_action]add" id="batch[group_action]add-lbl" class="radiobtn">Add To Group</label>
	<input type="radio" name="batch[group_action]" id="batch[group_action]del" value="del"  />
	<label for="batch[group_action]del" id="batch[group_action]del-lbl" class="radiobtn">Delete From Group</label>
	<input type="radio" name="batch[group_action]" id="batch[group_action]set" value="set"  />
	<label for="batch[group_action]set" id="batch[group_action]set-lbl" class="radiobtn">Set To Group</label>
	</fieldset>

	<button type="submit" onclick="Joomla.submitbutton('user.batch');">
		Process	</button>
	<button type="button" onclick="document.id('batch-group-id').value=''">
		Clear	</button>
</fieldset>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="a.name" />
		<input type="hidden" name="filter_order_Dir" value="asc" />
		<input type="hidden" name="9714788168a56028ed82bdd218d9785d" value="1" />	</div>
</form>

				<div class="clr"></div>
			</div>
		</div>
		<noscript>
			Warning! JavaScript must be enabled for proper operation of the Administrator backend.		</noscript>
	</div>

	<p align="center">Joomla! 2.5.3</p>
	<div id="footer">
		<p class="copyright">
			<a href="http://www.joomla.org">Joomla!&#174;</a> is free software released under the <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU General Public License</a>.		</p>
	</div>
</body>
</html>
