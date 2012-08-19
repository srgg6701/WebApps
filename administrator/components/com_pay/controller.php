<?php
/**
 * @version     1.0.0
 * @package     com_pay
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/


// No direct access
defined('_JEXEC') or die;

class PayController extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			$cachable	If true, the view output will be cached
	 * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/pay.php';

		// Load the submenu.
		PayHelper::addSubmenu(JRequest::getCmd('view', 'payments'));

		$view		= JRequest::getCmd('view', 'payments');
        JRequest::setVar('view', $view);

		parent::display();

		return $this;
	}
}
