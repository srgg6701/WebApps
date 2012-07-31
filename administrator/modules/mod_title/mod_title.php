<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	mod_title
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Get the component title div
$title = JFactory::getApplication()->get('JComponentTitle');
if (JRequest::getVar('tabletype')=='base') {
	$title=str_replace("<h2> ","<h2> <span style='font-weight:300'>Базовая таблица:</span> ",$title);
//$t = new DOMDocument();
//$t->loadHTML($title);
//$h2=$t->getElementsByTagName('H2');
//echo $doc->saveHTML();
	//var_dump($h2);
}
require JModuleHelper::getLayoutPath('mod_title', $params->get('layout', 'default'));
