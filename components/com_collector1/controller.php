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
//echo "<h3>controller.php</h3>";
//методы для работы с коллекциями также представлены в administrator/classes/SCollection.php
class Collector1Controller extends JController
{
	private $go_page='index.php?option=com_collector1&view=collected'; //ссылка на собранные коллекции
	private $go_page_common="index.php?option=com_collector1"; //базовая ссылка на компонент
	/**
	 * Добавить данные в таблицу опций сайта (Коллекций)
	 */
	function collect(){ //task=collect
		$last_record_id=$this->getModel()->addCollection();
		if (!$last_record_id) { 
			JMail::sendErrorMess('Не получен id добавленной записи.',"Добавление записи.");
			return false;
		}
		//пслать дальше:
		$this->setRedirect(JRoute::_($this->go_page.'&site_added='.$last_record_id));
	}
	/**
	 * Удалить запись из таблицы опций сайта заказчика. Данные из таблицы *customers не удалять
	 */
	function delete(){ //task=delete
		$collection_id=JRequest::getVar('collection_id');
		if($this->getModel()->deleteCollectionData($collection_id)) {
			//удалить из набора коллекций предзаказчика:
			$this->getModel()->deletePreCollection($collection_id);
			$this->setRedirect(JRoute::_($this->go_page.'&site_deleted='.$collection_id));
			
		}else{
			JMail::sendErrorMess('Данные не удалены.',"Удаление записи.");		
		}
	}
	/**
	 * Добавить заказ на выполнение отдельного компонента/(ов)
	 */
	function order(){		
		$model=$this->getModel();
		if($this->getModel('orders')->makeOrder($model)) { 
			die ('makeOrder is complited!');
			$this->setRedirect(JRoute::_($this->go_page_common."&view=orders"));			
		}else{
			JMail::sendErrorMess('Данные не размещены.',"Добавление заказа.");		
		}
	}
	/**
	 * Обновить данные в таблице Коллекций (опций сайта заказчика)
	 */
	function update(){ //task=update
		$collection_id=JRequest::getVar('collection_id');
		if ($this->getModel()->updateCollectionData($collection_id)) {
			$this->setRedirect(JRoute::_($this->go_page.'&site_updated='.$collection_id));
		}else{
			JMail::sendErrorMess('Данные не изменены.',"Обновление записи.");
		}
	}
	/**
	 * Обновить данные в таблице заказов
	 */
	function updateorder(){ //task=update
		$model=$this->getModel();
		if($this->getModel('orders')->makeOrder($model,JRequest::getVar('order_id'))) { 
			die ('makeOrder UPDATED is complited!');
			$this->setRedirect(JRoute::_($this->go_page_common."&view=orders&site_updated=".$order_id));			
		}else{
			JMail::sendErrorMess('Данные не обновлены.',"Обновление заказа.");		
		}
	}
	/**
	 * Определиться с процедурой - обновлять/создавать коллекцию через установку action формы
	 * Отобразить представление
	 * @access public
	 *
	 */
	function display($tpl=NULL)
	{	
 		// Set the view and the model
        /*$_view = JRequest::getVar('view','collector1');
		if ($_view=='orders') {
			//die('orders');
			//$layout = JRequest::getVar('layout');
			//$view  = $this->getView( $_view, 'html' );
			$view->setModel($model,true);
		}*/
		//$model->getCustomerStatus();
		//$view->setModel($model);
		//$model=JModel::getInstance('CMS','collector1Model');
		//$this->getModel('CMS');
		//var_dump("<h1>model:</h1><pre>",$model,"</pre>");die();
		parent::display(); //отображает default view
	}
}