<?php 
// no direct access
defined( '_JEXEC' ) or die;
//jimport('joomla.factory.php');
jimport('joomla.mail.mail');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
jimport('joomla.application.component.view');
jimport('joomla.application.component.helper');

JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'tables');

//массив подключаемых файлов:
$arrPathReq=array('SData','SDebug','SErrors','SFiles','SCollection','SSite','SUser');
for($i=0,$j=count($arrPathReq);$i<$j;$i++)
	require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.$arrPathReq[$i].'.php';

require_once JPATH_BASE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.'orders.php';
$controller	= JController::getInstance('Debug');
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();?>
