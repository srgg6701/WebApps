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

jimport('joomla.application.component.controller');

class Collector1Controller extends JController
{
	//
	/**
	* Method to display the view
	*
	* @access public
	*
	*/
	function display()
	{	
		parent::display(); //отображает default view
	}
	
	//добавить данные в таблицу опций сайта заказчика:
	function collect(){ //task=collect
		$this->getModel()->storeCollectedData();
	}
}