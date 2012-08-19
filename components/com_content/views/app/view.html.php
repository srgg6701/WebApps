<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
jimport('joomla.mail.mail');
//	require_once JPATH_COMPONENT.DS.'helpers'.DS.'file_name.php';

/**
 * HTML View class for the Collector1 component
 */
class ContentViewApp extends JView 
{	

	/**
	 *
	 */
	function display($tpl = NULL)
	{	SDebug::dOutput("class ContentViewApp",'h4');
		parent::display($tpl);
	}
}