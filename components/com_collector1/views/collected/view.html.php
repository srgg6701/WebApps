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
class Collector1ViewCollected extends JView 
{	/* возвращает всё ($this)*/
	public $model_data; //то, что собрал юзер
	public $sites_types;//типы сайтов
	public $cms_choice;//выбранные cms
	public $options_names;
	
	function display($tpl = NULL)
	{	
		$this->model_data=$this->getModel()->collected();
		$this->sites_types=$this->getModel()->get_sites_types();
		$this->cms_choice=$this->getModel()->get_cms();
		$this->get_options_names=$this->getModel()->get_options_names();
		parent::display($tpl);
	}
}