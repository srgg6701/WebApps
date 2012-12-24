<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
//echo "<h3>view.html.php</h3>";
//jimport('joomla.application.component.view');
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewOrders extends JView 
{	/* возвращает всё ($this)*/
	protected $components;
	function display($tpl = null)
	{	
		$this->components=$this->getModel($view)->getComponentsNames();

		parent::display($tpl);
	}
}