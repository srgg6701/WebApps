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
//jimport('joomla.application.web.webclient');
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewCollector1 extends JView
{
	protected $state;
	protected $item;
	protected $current_order_set;
	protected $collections_ids_array=array(); //массив id id коллекций заказчика
	protected $go_submit='index.php?option=com_collector1&task=';
	protected $go_action;

	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$params		= $app->getParams();

		// Get some data from the models
		$state		= $this->get('State');
		$item		= $this->get('Item');
		$user = JFactory::getUser();
		//получим данные переданной коллекции заказчика:
		$current_set_id=JRequest::getVar('collection_id');
		if ($current_set_id&&$user->get('guest')!=1) {
			
			$this->go_action='update';
			$this->go_submit.="update&collection_id=".$current_set_id;		
			$this->current_order_set=Collector1ModelCollector1::getCollection($current_set_id);
			$this->collections_ids_array=Collector1ModelCollector1::getCollectionsIds($user->id);

		}else{
			$this->go_submit.="collect";
		}
		//получает HTML из контроллера (?), в случае, если он также вызывает у себя parent::display()
        parent::display($tpl);
	}
}