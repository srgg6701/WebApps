<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewCollected extends JView 
{	/* возвращает всё ($this)*/
	protected $_action; //тип выполненного действия
	protected $collections_data_array; //то, что собрал юзер - массив ВСЕХ данных ВСЕХ коллекций. 
	protected $jrequest_collection_id; //collection id, переданный, как параметр URL
	protected $options_names;
	protected $done=array();
	protected $templatename;
	protected $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data";
	public $order_files;
	
	function getData($collection_id,$user=false){
		$model=JModel::getInstance('collected','Collector1Model');
		// $model=$this->getModel(); - не использовать, т.к. не сработает для backend
		$Data=array(); // SDebug::showDebugContent($model,'model');
		$Data=$model->collected(); // SDebug::showDebugContent($Data,'Data');
		//$Data['components']=$model->getComponentsNames();
		//if ($user) $Data['orders_of_user']=$model->getCustomerOrders($user,false,$order_id);
		return $Data;
	}

	function display($tpl = NULL)
	{	
		$model=$this->getModel();
		$this->collections_data_array=$model->collected(); 
		//SDebug::showDebugContent($this->collections_data_array,'this->collections_data_array');
		//ЕСЛИ коллекции обнаружены:
		if ($this->collections_data_array!==false){
			$modelCollector=JModel::getInstance('collector1','Collector1Model');
			$this->get_options_names=$modelCollector->get_options_names();
			$arrSiteActions=array('site_new' => array("Сайт собран! [<a href=\"#\" onClick=\"return goNewSite(".JRequest::getVar('site_new').");\">перейти к сайту...</a>]","#CCF","blue"),
								  'site_deleted' => array("Сайт удалён.","#FCC","red"),
								  'site_updated' => array("Данные сайта изменены!","#E4F9DD","green")	
						  		 );
			$user = JFactory::getUser();
			foreach ($arrSiteActions as $site_action_type=>$site_action_type_data_array){
				
				if(!$jrequest_collection_id=JRequest::getVar($site_action_type))
					$jrequest_collection_id=JRequest::getVar('collection_id'); //потребуется далее, после выполнения цикла, для определения доступа к странице, с учётом статуса юзера и соответствия сессий создания коллекции и её просмотра
				$this->jrequest_collection_id=$jrequest_collection_id;
				if (JRequest::getVar($site_action_type)) {
					$this->done=$site_action_type_data_array; //действие, цвет фона блока сообщения, постфикс для флага
					$this->_action=$site_action_type;
					if ($site_action_type=='site_new') {
						//a notification for admin:
						$adminEmail=JFactory::getConfig()->getValue('mailfrom');
						$siteName=JFactory::getConfig()->getValue('sitename');
						if (!JFactory::getMailer()->sendMail($adminEmail, $siteName, $adminEmail, $siteName.': Новый сайт', 'На сайте WebApps.2-all.com создана новая коллекция.'))
							JMail::sendErrorMess('','Ошибка отправки уведомления о новом сайте...');
					}
					$this->done[0].="
<div style=\"padding: 6px 0;\">Пожалуйста, <a href=".JRoute::_($this->go_signup).">добавьте к своим данным логин и пароль</a>.</div> 
							<div>Это займёт несколько секунд и предоставит вам доступ ко всем опциям системы.</div>";
					break;
				}else unset($site_action_type); //чтобы не получить просто последний ключ, т.к. далее будет использоваться реальное значение
			}
			$this->templatename=SSite::getCurrentTemplateName($app);
		}
		parent::display($tpl);
	}
}