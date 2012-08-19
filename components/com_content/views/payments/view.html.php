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
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SSite.php';

/**
 * HTML View class for the component view
 */
class ContentViewPayments extends JView 
{	

	/**
	 *
	 */
	function display($tpl = NULL)
	{	
		parent::display($tpl);
	}
}