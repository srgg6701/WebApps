<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	Templates.bluestork
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$doc->addStyleSheet('templates/system/css/system.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

if ($this->direction == 'rtl') {
	$doc->addStyleSheet('templates/'.$this->template.'/css/template_rtl.css');
}
/** Load specific language related css */
$lang = JFactory::getLanguage();
$file = 'language/'.$lang->getTag().'/'.$lang->getTag().'.css';
if (JFile::exists($file)) {
	$doc->addStyleSheet($file);
}

if ($this->params->get('textBig')) {
	$doc->addStyleSheet('templates/'.$this->template.'/css/textbig.css');
}

if ($this->params->get('highContrast')) {
	$doc->addStyleSheet('templates/'.$this->template.'/css/highcontrast.css');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo  $this->language; ?>" lang="<?php echo  $this->language; ?>" dir="<?php echo  $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--[if IE 7]>
<link href="templates/<?php echo  $this->template ?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if gte IE 8]>
<link href="templates/<?php echo  $this->template ?>/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style>
div#content-box div#toolbar-box div.m {
	border-radius:6px 6px 0 0 !important;
}
</style>
<link rel="stylesheet/less" type="text/css" href="templates/<?php echo $this->template ?>/less/styles.less">
<script src="templates/<?php echo $this->template ?>/less/less.js" type="text/javascript"></script> 

<script type="text/javascript" src="<?=JUri::root()?>templates/fastwebdev/js/common.js"></script>
<script type="text/javascript" src="<?=JUri::root()?>templates/fastwebdev/js/jquery-1.7.1.min.js"></script>
</head>
<body id="minwidth-body">
	<div id="border-top" class="h_blue">
		<span class="logo"><a href="http://www.joomla.org" target="_blank"><img src="templates/<?php echo  $this->template ?>/images/logo.png" alt="Joomla!" /></a></span>
		<span class="title"><a href="index.php"><?php echo $this->params->get('showSiteName') ? $app->getCfg('sitename'). " " . JText::_('JADMINISTRATION') : JText::_('JADMINISTRATION') ; ?></a></span>
	</div>
	<div id="header-box">
		<div id="module-menu">
				<? if ($_GET['tp']){?><h4>menu</h4><? }?>
			<jdoc:include type="modules" name="menu" />
				<? if ($_GET['tp']){?><h4>/menu</h4><? }?>
		</div>
		<div id="module-status">
			<jdoc:include type="modules" name="status" />
			<?php
				//Display an harcoded logout
				$task = JRequest::getCmd('task');
				if ($task == 'edit' || $task == 'editA' || JRequest::getInt('hidemainmenu')) {
					$logoutLink = '';
				} else {
					$logoutLink = JRoute::_('index.php?option=com_login&task=logout&'. JSession::getFormToken() .'=1');
				}
				$hideLinks	= JRequest::getBool('hidemainmenu');
				$output = array();
				// Print the Preview link to Main site.
				$output[] = '<span class="viewsite"><a href="'.JURI::root().'" target="_blank">'.JText::_('JGLOBAL_VIEW_SITE').'</a></span>';
				// Print the logout link.
				$output[] = '<span class="logout">' .($hideLinks ? '' : '<a href="'.$logoutLink.'">').JText::_('JLOGOUT').($hideLinks ? '' : '</a>').'</span>';
				// Output the items.
				foreach ($output as $item) :
				echo $item;
				endforeach;
			?>
		</div>
		<div class="clr"></div>
	</div>

	<div id="content-box">
		<div id="toolbar-box">
			<div class="m">
				<? if ($_GET['tp']){?><h4>toolbar</h4><? }?>
				<jdoc:include type="modules" name="toolbar" />
				<? if ($_GET['tp']){?><h4>/toolbar<br />title</h4><? }?>
				<jdoc:include type="modules" name="title" />
        	<? if ($_GET['tp']){?><h4>/title</h4><? }?>
			</div>
		</div>
		<?php if (!JRequest::getInt('hidemainmenu')): ?>
        	<? if ($_GET['tp']){?><h4>submenu</h4><? }?>
		<jdoc:include type="modules" name="submenu" style="rounded" id="submenu-box" />
        	<? if ($_GET['tp']){?><h4>/submenu</h4><? }?>
		<?php endif; ?>
		<jdoc:include type="message" />
		<div id="element-box">
			<div class="m">
        	<? if ($_GET['tp']){?><h4>component</h4><? }?>
				<jdoc:include type="component" />
        	<? if ($_GET['tp']){?><h4>/component</h4><? }?>
				<div class="clr"></div>
			</div>
		</div>
		<noscript>
			<?php echo  JText::_('JGLOBAL_WARNJAVASCRIPT') ?>
		</noscript>
	</div>
        	<? if ($_GET['tp']){?><h4>footer</h4><? }?>
	<jdoc:include type="modules" name="footer" style="none"  />
        	<? if ($_GET['tp']){?><h4>/footer</h4><? }?>
	<div id="footer">
		<p class="copyright">
			<?php $joomla= '<a href="http://www.joomla.org">Joomla!&#174;</a>';
				echo JText::sprintf('JGLOBAL_ISFREESOFTWARE', $joomla) ?>
		</p>
	</div>
</body>
</html>
