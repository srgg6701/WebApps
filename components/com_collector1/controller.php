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
jimport('joomla.mail.mail');
//методы для работы с коллекциями также представлены в administrator/classes/SCollection.php
class Collector1Controller extends JController
{
	private $go_page='index.php?option=com_collector1&view=collected';
	/**
	 *добавить данные в таблицу опций сайта заказчика, как для зарегистрированных, так и для временных
	 */
	function collect(){ //task=collect
		$last_site_id=$this->getModel()->addCollection();
		if (!$last_site_id) { 
			JMail::sendErrorMess('Не получен id добавленной записи.',"Добавление записи.");
			return false;
		}
		//пслать дальше:
		$this->setRedirect(JRoute::_($this->go_page.'&site_added='.$last_site_id));
	}
	/**
	 *удалить запись из таблицы опций сайта заказчика. Данные из таблицы *customers не удалять
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
	 *обновить данные в таблице опций сайта заказчика
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
	* Определиться с процедурой - обновлять/создавать коллекцию через установку action формы
	* Отобразить представление
	* @access public
	*
	*/
	function display()
	{	
		parent::display(); //отображает default view
	}
}