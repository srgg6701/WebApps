<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_precustomer_stuff
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
if (!$user) $user = JFactory::getUser(); 
if ($user_email=$user->get('email')) {
	$app		= JFactory::getApplication();
	$date		= JFactory::getDate();
	$cur_year	= $date->format('Y');
	$csite_name	= $app->getCfg('sitename');
	
	if (JString::strpos(JText :: _('MOD_PRECUSTOMER_STUFF_LINE1'), '%date%')) {
		$line1 = str_replace('%date%', $cur_year, JText :: _('MOD_PRECUSTOMER_STUFF_LINE1'));
	}
	else {
		$line1 = JText :: _('MOD_PRECUSTOMER_STUFF_LINE1');
	}
	
	if (JString::strpos($line1, '%sitename%')) {
		$lineone = str_replace('%sitename%', $csite_name, $line1);
	}
	else {
		$lineone = $line1;
	}
	
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
	// Include the syndicate functions only once
	require_once dirname(__FILE__).'/helper.php';?>
<div class="bgSand block_rounded precustomer_obj_info"> 
<?	require JModuleHelper::getLayoutPath('mod_precustomer_stuff', $params->get('layout', 'default'));?>
</div>
<?
}