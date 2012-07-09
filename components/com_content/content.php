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
	//массив подключаемых файлов:
	$arrPathReq=array('SData','SDebug','SErrors','SFiles','SCollection','SSite','SUser');
	for($i=0,$j=count($arrPathReq);$i<$j;$i++)
		require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.$arrPathReq[$i].'.php';
	//SDebug::dOutput("content.php",'h3','display:inline');
	jimport('joomla.mail.mail');
	jimport('joomla.application.component.controller');
	jimport('joomla.application.component.model');
	jimport('joomla.application.component.helper');
	jimport('joomla.application.component.view');
	require_once(JPATH_COMPONENT.DS.'controllers'.DS.$c.'.php');	
	$c	= 'ContentController'.$c; //будет отсылать на /component/content/?view=app&c=debug (test.php)
	$controller = new $c();
}else{
	$controller = JController::getInstance('Content');
}
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
