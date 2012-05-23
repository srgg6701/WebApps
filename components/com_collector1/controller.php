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
	 *добавить данные в таблицу опций сайта заказчика, как для зарегистрированных, так и для временных
	 */
	function collect(){ //task=collect
		if ($last_site_id=$this->getModel()->addCollection()) {
			$user = JFactory::getUser();
			//незаавторизован:
			if ($user->get('guest')==1) {
				//установить данные поциента. НужнО, чтобы сравнивать коллекции текущей сессии и прошлых, а также, чтобы было что подставлять при регистрации:
				$arrPrecustomerData=array('name','email','phone','skype');
				for($i=0,$j=count($arrPrecustomerData);$i<$j;$i++)
					if (JRequest::getVar($arrPrecustomerData[$i])) 
						$user->set($arrPrecustomerData[$i],JRequest::getVar($arrPrecustomerData[$i]));
				//error?
				if (!$this->getModel()->savePreOrderData($last_site_id))
					JMail::sendErrorMess('Не добавлена временная коллекция опций сайта для незарегистрированного заказачика.',"Добавление временной коллекции.");
			}
			//пслать дальше:
			$this->setRedirect(JRoute::_($this->go_page.'&site_added='.$last_site_id));
		}else{ 
			JMail::sendErrorMess('Не получен id добавленной записи.',"Добавление записи.");
		}
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