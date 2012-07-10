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
	protected $current_order_set;
	protected $collections_ids_array=array(); //массив id id коллекций заказчика
	protected $go_submit='index.php?option=com_collector1&task='; //заготовка для URL формы
	public $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data"; //ссылка на создание коллекции с заполнением данных предзаказчика
	protected $guest_collections_ids; //id id коллекций гостя
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
		$model=$this->getModel();
		//получим данные переданной коллекции заказчика:
		$current_set_id=JRequest::getVar('collection_id');
		if ($current_set_id) {
			$this->go_submit.="update&collection_id=".$current_set_id;		
			$this->current_order_set=$model->getCollection($current_set_id,$user);
			//нужно для формирования списка коллекций в таблице для выбора и быстрой загрузки:
			if (!($this->collections_ids_array=$model->collections_ids_array)) 
				$this->collections_ids_array=$model->getCollectionsIds($user->get('email'));
		}else{
			$this->go_submit.="collect";
		}//var_dump("<h1>user:</h1><pre>",$user,"</pre>"); die();
		//проверим, создавал ли незаавторизованный юзер сайты в течение сессии:
		if ($user->get('guest')==1){
			$aset=SCollection::getPrecustomerSet('collections_ids',$user);
			if (is_array($aset)) //т.к. может вернуть id записи, а не массив
				$this->guest_collections_ids=$aset; //получает строку из ячейки коллекций/заказов, значения разделены запятыми
		}
		//должно быть именно здесь, чтобы получить все установленные значения свойств класса:
		//require_once JPATH_COMPONENT.DS.'helpers/html/your_sites.php';
		//получает HTML из контроллера (?), в случае, если он также вызывает у себя parent::display()
		$this->collector_table=$model->getDataForCollector(); //данные для построения таблицы коллектора
        parent::display($tpl);
	}
}