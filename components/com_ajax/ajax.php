<?php
defined('_JEXEC') or die;
header('Content-type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r')); 
// no direct access
defined( '_JEXEC' ) or die; //jimport('joomla.factory.php');
jimport('joomla.mail.mail');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'tables');
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SDebug.php';
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SStuff.php';
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SFiles.php';
require_once JPATH_BASE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.'orders.php';
$controller	= JController::getInstance('Ajax');?>
