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
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewCollected extends JView 
{	/* возвращает всё ($this)*/
	protected $collections_data_array; //то, что собрал юзер
	//protected $sites_types;//типы сайтов
	protected $options_names;
	protected $done=array();
	protected $guest_collections_ids;
	protected $collection_of_user; //коллекция заавторизованного юзера
	protected $templatename;
	protected $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data";
	public $order_files;
	
	function display($tpl = NULL)
	{	
		$model=$this->getModel();//var_dump("<h1>model:</h1><pre>",$model,"</pre>");
		$this->collections_data_array=$model->collected();
		if ($this->collections_data_array!==false){
			$collector1Model=JModel::getInstance('collector1','Collector1Model');
			$this->get_options_names=$collector1Model->get_options_names();
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
							$this->done[0]="Набор опций вашего сайта определён.
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
			//сравнить сессии для незаавторизованного юзера:
			if ($got_collection_id){ 
				if ($user->get('guest')==1){ //echo "<div>GUEST</div>";
					//получить массив id id всех коллекций гостя:this->guest_collections_ids
					$this->guest_collections_ids=SCollection::getPrecustomerSet('collections_ids',$user);
				}else{	//echo "<div>NOT GUEST!</div>";
					//если не гость, проверим - его ли коллекция
					if(SCollection::checkCollectionAccessory($got_collection_id,$user->get('id'))) $this->collection_of_user=1;
					elseif (JRequest::getVar('site_deleted')!=$got_collection_id) $this->collection_of_user=-1;
				}
			}
			$this->templatename=SSite::getCurrentTemplateName($app);
			
			if ($site_done=='site_added'||$site_done=='site_updated')
				$this->order_files=$model->getUserFiles('s'.JRequest::getVar($site_done));
		}
		parent::display($tpl);
	}
}