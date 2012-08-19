<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

defined('_JEXEC') or die;

// Include dependancies

//массив подключаемых файлов:
$arrPathReq=array('SData','SErrors','SFiles','SCollection','SSite','SUser');
for($i=0,$j=count($arrPathReq);$i<$j;$i++)
	require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.$arrPathReq[$i].'.php';

jimport('joomla.mail.mail');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');
jimport('joomla.application.component.view');

JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'tables');

//главный Контроллер компонента:
//echo "<h3>collector1.php</h3>";
// Execute the task.
$controller	= JController::getInstance('Collector1');
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();
