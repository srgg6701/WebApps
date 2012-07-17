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
//jimport('joomla.application.component.view');
//echo "<h3>view.html.php</h3>";
//jimport('joomla.application.web.webclient');
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewCollector1 extends JView
{
	protected $state;
	protected $item;
	protected $current_order_set; //набор опций текущей коллекции
	protected $jrequest_collection_id; //collection id, переданный, как параметр URL
	protected $collections_ids_array; //массив id id коллекций заказчика, нужен для построения списка ранее собранных сайтов
	protected $go_submit='index.php?option=com_collector1&task='; //заготовка для URL формы
	public $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data"; //ссылка на создание коллекции с заполнением данных предзаказчика
	protected $templatename; //имя шаблона
	protected $collector_table; //данные для построения таблицы коллектора
	/**
	 * Заполнить и отобразить шаблон
	 */
	function display($tpl = NULL)
	{
		//require_once JPATH_ADMINISTRATOR.DS.'classes/SSite.php';
		$app		= JFactory::getApplication();
		$params		= $app->getParams();
		$this->templatename=SSite::getCurrentTemplateName($app);

		// Get some data from the models
		$state		= $this->get('State');
		$item		= $this->get('Item');
		$user = JFactory::getUser(); 
		//нужно для формирования списка коллекций в таблице для выбора и быстрой загрузки:
		$this->collections_ids_array=$collections_ids_array=SCollection::getCurrentSetArray('collections_ids');
		$model=$this->getModel();
		//получим данные переданной коллекции заказчика:
		$current_set_id=$this->jrequest_collection_id=JRequest::getVar('collection_id');
		//collection id, переданный, как параметр URL и коллекция принадлежит текущему юзеру:
		if ( $current_set_id
			 && is_array($collections_ids_array) //будет NULL, если незаавторизованный юзер ещё не вводил свой емэйл
			 && in_array($current_set_id,$collections_ids_array)
		   ) { 
			$this->go_submit.="update&collection_id=".$current_set_id;		
			$this->current_order_set=$model->getCollectionDataArray($current_set_id,$user);
		}else{
			$this->go_submit.="collect";
		}		//получает HTML из контроллера (?), в случае, если он также вызывает у себя parent::display()
		$this->collector_table=$model->getDataForCollector(); //данные для построения таблицы коллектора
        parent::display($tpl);
	}
}