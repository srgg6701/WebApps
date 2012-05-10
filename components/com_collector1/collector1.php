<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Created by com_combuilder - http://www.notwebdesign.com
 */

defined('_JEXEC') or die;
// Include dependancies
jimport('joomla.application.component.controller');
//JPATH_ADMINISTRATOR
JTable::addIncludePath(JPATH_ADMINISTRATOR.'/components/com_collector1/tables');

// Execute the task.
$controller	= JController::getInstance('Collector1');
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();
