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
		$model=$this->getModel();
		$this->collections_data_array=$model->collected();//var_dump("<h1>collections_data_array:</h1><pre>",$this->collections_data_array,"</pre>");
		//ЕСЛИ коллекции обнаружены:
		if ($this->collections_data_array!==false){
			$modelCollector=JModel::getInstance('collector1','Collector1Model');
			$this->get_options_names=$modelCollector->get_options_names();
			$arrSiteActions=array('site_added' => array("Сайт добавлен","#CCF","blue"),
								  'site_deleted' => array("Сайт удалён","#FCC","red"),
								  'site_updated' => array("Данные сайта изменены","#E4F9DD","green")	
						  		 );
			$user = JFactory::getUser();
			foreach ($arrSiteActions as $site_action_type=>$message){
				
				if(!$got_collection_id=JRequest::getVar($site_action_type))
					$got_collection_id=JRequest::getVar('collection_id'); //потребуется далее, после выполнения цикла, для определения доступа к странице, с учётом статуса юзера и соответствия сессий создания коллекции и её просмотра
				
				if (JRequest::getVar($site_action_type)) {
					$this->done=$message;
					if ($site_action_type=='site_added') {
						if ($user->get('guest')==1){
							$this->done[0]="Набор опций вашего сайта определён.
<div style=\"padding: 6px 0;\">Пожалуйста, <a href=".JRoute::_($this->go_signup).">добавьте к своим данным логин и пароль</a>.</div> 
							<div>Это займёт несколько секунд и предоставит вам доступ ко всем опциям системы.</div>";
						}else $this->done[0].="!";
						//a notification for admin:
						$adminEmail=JFactory::getConfig()->getValue('mailfrom');
						$siteName=JFactory::getConfig()->getValue('sitename');
						if (!JFactory::getMailer()->sendMail($adminEmail, $siteName, $adminEmail, $siteName.': Новый сайт', 'На сайте WebApps.2-all.com создана новая коллекция.'))
							JMail::sendErrorMess('','Ошибка отправки уведомления о новом сайте...');
					}
					break;
				}else unset($site_action_type); //чтобы не получить просто последний ключ, т.к. далее будет использоваться реальное значение
			}
			//установить принадлежность коллекции юзеру:
			if ($got_collection_id){ 
				//если не гость, проверим - его ли коллекция
				if($model->checkCollectionAccessory($got_collection_id,$user)) $this->collection_of_user=1;
				elseif (JRequest::getVar('site_deleted')!=$got_collection_id) $this->collection_of_user=-1;
			}
			$this->templatename=SSite::getCurrentTemplateName($app);
			//НЕ АКТУАЛЬНО, Т.К. ИНФОРМАЦИЯ О ФАЙЛАХ ДОБАЛЕНА В МАССИВ КОЛЛЕКЦИЙ
			//if ($site_action_type!='site_deleted') { //не удаляли сайт, будем получать файлы
				//$this->order_files=($uset)? SFiles::requestUserFiles($uset):SFiles::getUserFiles('collections_ids',$user); 
			//}
		}
		parent::display($tpl);
	}
}