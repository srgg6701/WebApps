<?php
/**
 * @version     2.1.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */


// no direct access
defined('_JEXEC') or die;
//массив подключаемых файлов:
$arrPathReq=array('SData','SDebug','SErrors','SFiles','SStuff','SHelpersAdmin','SHTML','SSite','SUser');
for($i=0,$j=count($arrPathReq);$i<$j;$i++)
	require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.$arrPathReq[$i].'.php';

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_collector1')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');
$controller	= JController::getInstance('Collector1');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
