<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
// Include dependancies
jimport('joomla.application.component.controller');
require_once JPATH_COMPONENT.'/helpers/route.php';
require_once JPATH_COMPONENT.'/helpers/query.php';

if($c = JRequest::getVar('c')) { //call an additional controller and assign it as main one
	require_once(JPATH_COMPONENT.DS.'controllers'.DS.$c.'.php');
	$c	= 'ContentController'.$c;
	$controller = new $c();
}else{
	$controller = JController::getInstance('Content');
}
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
