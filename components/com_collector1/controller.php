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
	private $go_page='index.php?option=com_collector1&view=collected';
	/**
	 *добавить данные в таблицу опций сайта заказчика
	 */
	function collect(){ //task=collect
		if ($last_site_id=$this->getModel()->addCollection()) {
			$this->setRedirect(JRoute::_($this->go_page.'&site_added='.$last_site_id));
		}else die("ОШИБКА! Не получен id добавленной записи.");
	}
	/**
	 *удалить запись из таблицы опций сайта заказчика. Данные из таблицы *customers не удалять
	 */
	function delete(){ //task=delete
		$collection_id=JRequest::getVar('collection_id');
		if($this->getModel()->deleteCollectionData($collection_id)) {
			$this->setRedirect(JRoute::_($this->go_page.'&site_deleted='.$collection_id));
		}else die('ОШИБКА! Данные не удалены.');
	}
	/**
	 *обновить данные в таблице опций сайта заказчика
	 */
	function update(){ //task=update
		$collection_id=JRequest::getVar('collection_id');
		if ($this->getModel()->updateCollectionData($collection_id)) {
			$this->setRedirect(JRoute::_($this->go_page.'&site_updated='.$collection_id));
		}else die('ОШИБКА! Данные не изменены.');
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