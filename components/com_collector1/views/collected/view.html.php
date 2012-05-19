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
	protected $collections_data_array; //то, что собрал юзер
	//protected $sites_types;//типы сайтов
	protected $options_names;
	protected $done=array();
	
	function display($tpl = NULL)
	{	
		require_once JPATH_COMPONENT.'/models/collector1.php';
		$this->collections_data_array=$this->getModel()->collected();
		//$this->sites_types=$this->getModel()->get_sites_types();
		$this->get_options_names=$this->getModel()->get_options_names();
		$arrDone=array( 'site_added' => array("Сайт добавлен","#CCF"),
						'site_deleted' => array("Сайт удалён","#FCC"),
						'site_updated' => array("Данные сайта изменены","#E4F9DD")	
					  );
		foreach ($arrDone as $site_done=>$message){
			if (JRequest::getVar($site_done)) {
				$this->done=$message;
				break;
			}
		}
		parent::display($tpl);
	}
}