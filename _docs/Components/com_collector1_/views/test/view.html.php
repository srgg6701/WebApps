<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;

//jimport('joomla.application.component.view');

/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewTest extends JView
{

	function display($tpl = null)
	{
		/*$app		= JFactory::getApplication();
		$params		= $app->getParams();

		// Get some data from the models
		$state		= $this->get('State');
		$item		= $this->get('Item');*/

        parent::display($tpl);

	}
}