<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Created by com_combuilder - http://www.notwebdesign.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewCollector1 extends JView
{
	protected $state;
	protected $item;
	public $current_order_set;

	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$params		= $app->getParams();

		// Get some data from the models
		$state		= $this->get('State');
		$item		= $this->get('Item');
		//получим данные переданной коллекции заказчика:
		$current_set_id=JRequest::getVar('collection_id');
		if ($current_set_id) {
			$this->current_order_set=Collector1ModelCollector1::getCollection($current_set_id);
		}
		//получает HTML из контроллера (?), в случае, если он также вызывает у себя parent::display()
        parent::display($tpl);
	}
}