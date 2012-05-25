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
	protected $guest_collections;
	protected $collection_of_user; //коллекция заавторизованного юзера
	protected $templatename;
	protected $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data";
	
	function display($tpl = NULL)
	{	
		require_once JPATH_COMPONENT.'/models/collector1.php';
		$this->collections_data_array=$this->getModel()->collected();
		if ($this->collections_data_array!==false){
			$this->get_options_names=$this->getModel()->get_options_names();
			$arrDone=array( 'site_added' => array("Сайт добавлен","#CCF","blue"),
							'site_deleted' => array("Сайт удалён","#FCC","red"),
							'site_updated' => array("Данные сайта изменены","#E4F9DD","green")	
						  );
			$user = JFactory::getUser();
			foreach ($arrDone as $site_done=>$message){
				
				$got_collection_id=JRequest::getVar($site_done); //потребуется далее, после выполнения цикла, для определения доступа к странице, с учётом статуса юзера и соответствия сессий создания коллекции и её просмотра
				
				if (JRequest::getVar($site_done)) {
					$this->done=$message;
					if ($site_done=='site_added') {
						if ($user->get('guest')==1){
							$this->done[0]="
							Набор опций вашего сайта определён.
							<div style=\"padding: 6px 0;\">Пожалуйста, <a href=".JRoute::_($this->go_signup).">добавьте к своим данным логин и пароль</a>.</div> 
							<div>Это займёт несколько секунд и предоставит вам доступ ко всем опциям системы.</div>";
						}else $this->done[0].="!";
						//a notification for admin:
						$adminEmail=JFactory::getConfig()->getValue('mailfrom');
						$siteName=JFactory::getConfig()->getValue('sitename');
						if (!JFactory::getMailer()->sendMail($adminEmail, $siteName, $adminEmail, $siteName.': Новый сайт', 'На сайте WebApps.2-all.com создана новая коллекция.'))
						{	
							JMail::sendErrorMess('','Ошибка отправки уведомления о новом сайте...');
						}
					}
					break;
				}
			}
			if (!$got_collection_id&&JRequest::getVar('collection_id')) 
				$got_collection_id=JRequest::getVar('collection_id');
			//проверим, получали ли команды работы с коллекциями:
			//сравнить сессии для незаавторизованного юзера:
			if ($got_collection_id){
				
				require_once JPATH_ADMINISTRATOR.DS.'classes/SCollection.php';
				
				if ($user->get('guest')==1){
					//получить массив id id всех коллекций гостя:this->guest_collections
					$this->guest_collections=SCollection::getGuestCollections($user);
				
				}else{	
					//если не гость, проверим - его ли коллекция
					$this->collection_of_user=(SCollection::checkCollectionAccessory($got_collection_id,$user->get('id')))? 1:-1;
				}
			}//die('<hr>collection_id_session='.$this->collection_id_session);
			require_once JPATH_ADMINISTRATOR.DS.'classes/SSite.php';
			$this->templatename=SSite::getCurrentTemplateName($app);
		}
		parent::display($tpl);
	}
}