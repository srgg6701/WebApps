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
//echo "<h3>MODEL: collector1.php</h3>";
/**
 * Model
 */
class Collector1ModelCollector1 extends JModel
{
	protected $_action;
	protected $_item;
	public $_customer_status; //статус юзера как юзера и заказчика/предзаказчика
	protected $mainUserPostData=array('name','phone','skype','email');
	/**
	 * Конструктор
	 */
	function __construct(){
		parent::__construct();
		$this->_action=JRequest::getVar('task');
	}
	/**
	 * Создать коллекцию 
	 */
	function addCollection(){
		//подготовить данные для добавления новой коллекции:
		$table=$this->prepareCollectionDataSet();
		if (!$table) die("ОШИБКА! Не выполнено: Collector1ModelCollector1::prepareCollectionDataSet()");		
		//добавить данные в dnior_webapps_customer_site_options:
		SErrors::afterTable($table);
		//получить статус субъекта:
		$this->getCustomerStatus();
		$customer_status=$this->_customer_status;
		if(!$added_record_id=SData::getLastId(SCollection::getDefaultTable()))
			JMail::sendErrorMess('Не добавлена временная коллекция опций сайта для незарегистрированного заказачика.',"Добавление временной коллекции.");
		//Юзер неизвестен, будем ДОБАВЛЯТЬ данные в таблицу предзаказчика:
		if ($customer_status=="unknown") {
			//добавить запись в таблицу предзаказчиков
			$this->handlePrecustomersTable( $added_record_id, //новая запись в таблице коллекций
										 	JRequest::get('post')
									      );
		}
		if (!SFiles::handleFilesUploading('s',$added_record_id))
			JMail::sendErrorMess('Не загружены файлы во время добавления заказа.','Ошибка загрузки файлов');
		return $added_record_id; //id последней записи нужен для редиректа, устанавливаемом в контроллере
	}
	/**
	 * Построить ячейки для frontend, backend, boudoire в строке опции
	 */
	function buildOptionsSidesCells($option_id){
		$db = JFactory::getDBO();
		$query="SELECT site_side AS `missing side name`
FROM #__webapps_site_options_beyond_sides 
WHERE site_options_beyond_side REGEXP concat('(^|,)',$option_id,'(,|$)')";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	/**
	 * Удалить коллекцию
	 */
	function deleteCollectionData($collection_id) {
		//JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$table = JTable::getInstance('customer_site_options', 'Collector1Table');
		return $table->delete($collection_id); 		
	}
	/**
	 * Удалить коллекцию из набора предзаказчика
	 */
	function deletePreCollection($collection_id) {
		$query="SELECT id, collections_ids FROM #__webapps_precustomers WHERE $collection_id IN (collections_ids)";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		$pre_order_data=$db->loadAssoc();
		$current_collections=explode(',',$pre_order_data['collections_ids']);
		$key=array_search($collection_id,$current_collections);
		if ($key!==false){ //потому что может случиться 0
			unset($current_collections[$key]);
		}
		//JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$table = JTable::getInstance('precustomers', 'Collector1Table');
		
		if (!$table->load($pre_order_data['id'])) {
			
			JMail::sendErrorMess($table->getError()," (\$table->load())");
			return false;
		
		}else{
			$new_collections_ids=implode(',',$current_collections);
			$table->set('collections_ids', $new_collections_ids);
			if ($table->check()) {
				
				if (!$table->store(true)){
					// handle failed update
					JMail::sendErrorMess($table->getError()," (\$table->store())");
				}
			
			}else{
				// handle invalid input
				JMail::sendErrorMess($table->getError()," (\$table->check())");
			}
		}
		return true; 		
	}
	/**
	 * Get the data for a banner
	 */
	function &getItem()
	{
		if (!isset($this->_item))
		{
			$cache = JFactory::getCache('com_collector1', '');

			$id = $this->getState('collector1.id');

			$this->_item =  $cache->get($id);

			if ($this->_item === false) {
				
                // redirect to banner url
				$db		= $this->getDbo();
				$query	= $db->getQuery(true);
				$query->select(
					'a.*'
					);
				$query->from('#__users as a');
				$query->where('a.id = ' . (int) $id);

				$db->setQuery((string)$query);
				if (!$db->query()) {
					echo "Возможно, проблема из-за того, что компонент был для версии 1.5 - см. getItem()";
					JError::raiseError(500, $db->getErrorMsg());
				}

				$this->_item = $db->loadObject();
				$cache->store($this->_item, $id);
			}$this->_item;
		}
		return $this->_item;
	}
	/**
	 * Получить коллекцию по её id
	 */
	function getCollection($collection_id){
		$user = JFactory::getUser();
		if ($user->get('guest')!=1||$user->get('email')) { 
			$db=JFactory::getDBO();
			$query='SELECT `id`,`site_type_id`,`engine_type_choice_id`,`engines_ids`,`options_array`,`xtra` FROM '.self::setDefaultTable().' WHERE id = ' . (int)$collection_id;
			$db->setQuery($query);
			//
			$current_order_set=$db->loadAssoc();  
			//transform serialized arrays:
			$current_order_set['engines_ids']=explode(',',$current_order_set['engines_ids']);
			//далее будем строить карту опций по разделам сайта:
			$current_order_set['options_array']=unserialize($current_order_set['options_array']);
			$query_sides='SELECT site_side FROM #__webapps_site_options_beyond_sides ';
			$db->setQuery($query_sides);
			$site_sides=$db->loadResultArray();
			$arrCheckedMap=array();
			//все опции в коллекции:
			$boxes_set=$current_order_set['options_array'];
			//препарируем набор опций построчно:		
			foreach ($boxes_set as $option_id=>$current_array) {
				//препарируем массив отмеченных опций для каждой строки:
				for($i=0,$j=count($site_sides);$i<$j;$i++){
					//по умолчанию элемент массива пуст:
					$arrCheckedMap[$option_id][$i]='';
					for ($b=0,$x=count($current_array);$b<$x;$b++){ 
						//если текущий тип раздела отмечен для данной опции:
						if (in_array($site_sides[$i],$current_array)) {
							//заполняем элемент массива и прерываем цикл:
							$arrCheckedMap[$option_id][$i]=$site_sides[$i];
							break;	
						}
					}
				}
			}
			$current_order_set['options_array']=$arrCheckedMap;
			require_once JPATH_COMPONENT.'/models/collected.php';
				switch ($current_order_set['engine_type_choice_id'])  { 

					case "1":
						$current_order_set['engines']=collector1ModelCollected::get_cms_names($current_order_set['engines_ids']);
							break;
			
					case "2": //разработать собственный
						//require_once JPATH_ADMINISTRATOR.DS.'classes/SCollection.php';
						$arrSMSs=SCollection::setCMStypes();
						$current_order_set['engines']=$arrSMSs[1][1];
							break;
			
					case "3":
						$current_order_set['engines']=collector1ModelCollected::get_cms_own_name($collection_id);
							break;
				}
			$current_order_set['site_type_name']=collector1ModelCollected::get_sites_types($current_order_set['site_type_id']);
			//var_dump("<h1>current_order_set:</h1><pre>",$current_order_set,"</pre>");die();
			return $current_order_set; 
		}else return false;
	}	
	/**
	 * Получить массив id id коллекций заказчика
	 */
	function getCollectionsIds($customer_id){
		$db=JFactory::getDBO();
		$query='SELECT id FROM '.self::setDefaultTable().' WHERE customer_id = '. (int)$customer_id;
		$db->setQuery($query);
		return $db->loadResultArray();
	}
	/**
	  * Получить статус заказчика/предзказчика 
	 */
	/**	
	  * - [enabled,] activated		  				block = 0, activation [empty] 
	  * -  enabled,  not activated (can log in) 	block = 0, activation [code]
	  *	-  not enabled, not activated				block = 1, activation [code] 
	  * -  disabled, activated	(can't log in)		block = 1, activation [empty]	
	  -----------------------------------------------------------------------
	  * * Нет в таблице юзеров:
	  * - предзаказчик - уже создавал коллекции/заказы, но ещё не зарегистрировался
	  * - новый предзаказчик
	  */
	function getCustomerStatus($user=false){
		//выясним статус юзера:
		if (!$user) $user = JFactory::getUser();
		if ($user->get('guest')!=1){
			$customer_status=($user->get('block')==1)? "disabled":"enabled";
			$customer_status.=" ";
			//код активации?
			$customer_status.=($user->get('activation'))? "inactive":"active";
		}else{
			//проверить запись в таблице предзаказчиков по полученному емэйлу:
			$customer_status=SUser::getPrecustomerStatus(JRequest::getVar('email'),$user);
			if ($customer_status>1){
				JMail::sendErrorMess('Обнаружено более 1 записи предзаказчика',"Лишние записи в таблице предзаказчиков");
			}else{
				$customer_status=($customer_status)? "precustomer":"unknown";
			}
		}
		if (!$this->_customer_status=$customer_status)
			JMail::sendErrorMess('Не получен статус субъекта в getCustomerStatus()','Не получен статус субъекта');
		//echo "<div>$customer_status</div>";
		return true;
	}
	/**
	  * Получить массив всех данных для построения таблицы Коллектора
	*/
	function getDataForCollector(){
		$db = JFactory::getDBO();
		$query=" SELECT #__webapps_site_options.id AS option_id, 
IF ( sites_types_ids_location,
	 sites_types_ids_location,
	 0 -- для корректной сортировки результатов внутри таблицы
   ) as `site types`,
   ( select name_ru FROM #__webapps_site_options_group 
	 WHERE site_options_ids 
	 REGEXP CONCAT('(^|,)',#__webapps_site_options.id,'(,|$)') -- извлечь название групп опций
   ) as `name_ru`, 
#__webapps_site_options.name_ru AS `option` 
    FROM #__webapps_site_options 
    LEFT JOIN #__webapps_site_options_partial 
    ON #__webapps_site_options_partial.site_option_id = #__webapps_site_options.id
 WHERE #__webapps_site_options.name_ru <> 'Дополнительно'
 ORDER BY `site types` DESC, `name_ru`, `option` ASC;";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	//Методы Joomla! здесь не используем просто потому, что не видим в данном случае необходимости	
	/**
	 * Получим таблицу разделов сайта
	 */
	function getSidesDesc(){
		$db = JFactory::getDBO();
		$query="SELECT site_side, name_ru
FROM #__webapps_site_options_beyond_sides ORDER BY id";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	/**
	 * Получим таблицу типов сайта
	 */
	function getSitesTypes(){
		$db = JFactory::getDBO();
		$query="SELECT id, name_ru, name_en
FROM #__webapps_site_types ORDER BY id DESC";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	/**
	 * Подготовить данные для добавления/обновления таблицы Коллекций
	 */
	function prepareCollectionDataSet($updated_id=false) {
		$post_collection=JRequest::get('post');
		$table = JTable::getInstance('customer_site_options', 'Collector1Table');
		if ($updated_id) {
			if (!$table->load($updated_id)) 
				JMail::sendErrorMess($table->getError()," (\$table->load())");
				//var_dump("<h1>updated_id:</h1><pre>",$updated_id,"</pre>"); die();
		}
		$table->reset();
		$user = JFactory::getUser();
		$selectSiteType=$post_collection["selectSiteType"]; //site type
		$table->set('customer_id', $user->id); //id заказчика
		$table->set('site_type_id', $selectSiteType); //тип сайта
		//выяснить выбор типа движка:
		switch ($post_collection["choose_engine"])  { 

			case "take_ready":
				$engine_type_choice_id="1";
					break;
	
			case "build_own":
				$engine_type_choice_id="2";
					break;
	
			case "exists":
				$engine_type_choice_id="3";
					break;
		}
		$table->set('engine_type_choice_id', $engine_type_choice_id); //тип движка
		$arrStoredOptions=array();
		//получить опции не для всех типов сайтов:
		$db=JFactory::getDBO();
		$query="SELECT site_option_id, sites_types_ids_location FROM #__webapps_site_options_partial";
		$db->setQuery($query);
		$arrOptionsPartial=$db->loadAssocList();
		//var_dump("<h1>arrOptionsPartial</h1><pre>",$arrOptionsPartial,"</pre>"); echo "$selectSiteType<hr>";
		if (!empty($arrOptionsPartial)) {
			$arrOptionToIgnore=array();
			//получить игнорируемые опции, добавлять которые в набор не нужно:
			for ($i=0,$j=count($arrOptionsPartial);$i<$j;$i++){
				//если специфическая опция относится НЕ к сайту выбранного типа,
				//однозначно добавить к массиву исключений:
				if ($arrOptionsPartial[$i]['sites_types_ids_location']!=$selectSiteType)
					$arrOptionToIgnore[]=$arrOptionsPartial[$i]['site_option_id'];
			}
		} //var_dump("<h1>arrOptionToIgnore</h1><pre>",$arrOptionToIgnore,"</pre>"); echo "<hr>";
		foreach ($post_collection as $key=>$val){
			if (strstr($key,'cms_name_')) $arrCMS[]=$val;
			if (strstr($key,'option_')) {
				$gt=explode('_',$key);
				$option_id=(int)$gt[1]; # опции
				if ( !is_array($arrOptionToIgnore) || //массив игнорируемых опций не сформирован
				     !in_array($gt[1],$arrOptionToIgnore) //текущая опция в него не попадает
				   ) {
					//echo "<div>Start excluding : $gt[2]</div>";
					if (!is_array($arrStoredOptions[$option_id])) {
						$arrStoredOptions[$option_id]=array($gt[2]); // тип раздела сайта
						//var_dump("<h1>arrStoredOptions[$option_id]</h1><pre>",$arrStoredOptions[$option_id],"</pre>"); echo "<hr>";
					}else array_push($arrStoredOptions[$option_id],$gt[2]);
				}//else echo "<div>exclude option_id: ".$gt[1]."</div>";
			}
		}//die('end of checking!');
		if ($post_collection['choose_engine']=='build_own'){
			
			$table->set('engines_ids','Разработать собственный');
		
		}elseif ($post_collection['choose_engine']=='exists'){
			
			$table->set('engines_ids',$post_collection['existing_cms']);
		
		}elseif (is_array($arrCMS)){
			
			$table->set('engines_ids',implode(',',$arrCMS));
		
		}
		if (!empty($arrStoredOptions)){
			$table->set('options_array',serialize($arrStoredOptions));
		}
		$table->set('finish_date', $post_collection["finish_date"]);
		$table->set('xtra', $post_collection["xtra"]);
		/*// Bind the data to the table
		if (!$table->bind())
		{	echo "<div>Не связано!</div>";
		// handle bind failure
		}*/	
		$table->set('ordering', $table->getNextOrder());
		return $table;
	}
	/**
	 * Добавить или обновить данные в таблице предзаказчиков
	 */
	function handlePrecustomersTable(	$new_record_id, //id добавленной коллекции или заказа
										$post_collection=false,
										$current_record_id=false //если запись уже существует...
									  ){ //
		
		$table = JTable::getInstance('precustomers', 'Collector1Table'); //таблица
		//var_dump("<h1>table:</h1><pre>",$table,"</pre>");
		$table->reset();
		if (!SUser::setUserData($arrMainUserPostData)) //назначили юзеру данные из массива POST
			JMail::sendErrorMess("SUser::setUserData(\$arrMainUserPostData)"," Ошибка обновления данных юзера!");
		if (!$post_collection) $post_collection=JRequest::get('post');
		switch (JRequest::getVar('task'))  { 
			case "collect":
				$order_obj_type="collections_ids";
					break;
			case "order":
				$order_obj_type="orders_ids";
					break;
		}
		$arrMainUserPostData=$this->mainUserPostData;
		if ($current_record_id) {
			$arrDataPatch=array();
			$user = JFactory::getUser();
			$arrDataPatch['collections_ids']=$post_collection['collections_ids'];
			$arrDataPatch['orders_ids']=$post_collection['orders_ids'];
			//получить текущий набор
			
			$arrPrecustomerSet=SCollection::getGuestCollections($order_obj_type,$user);
			$arrDataPatch[$order_obj_type]=implode(",",$arrPrecustomerSet).','.$new_record_id;
			$arrDataPatch['session_id']=session_id();
			foreach ($arrMainUserPostData as $key=>$value)
				$arrDataPatch[$value]=$user->get($value);
			//обновить данные в табл. предзаказчиков:
			SErrors::afterTableUpdate($table,$arrDataPatch,$current_record_id);
		}else{
			if (!$new_record_id) {
				JMail::sendErrorMess("Не получен id добавленной записи"," Ошибка получения id добавленной записи");
				exit();
			}else{
				$table->set('collections_ids',$post_collection['collections_ids']);
				$table->set('orders_ids',$post_collection['orders_ids']);
				$table->set($order_obj_type,$new_record_id); 
				$table->set('session_id',session_id()); 
				foreach ($arrMainUserPostData as $key=>$value)
					$table->set($value,$user->get($value));
				//collections_ids or orders_ids:
				SErrors::afterTable($table);
			}
		}
		return true;
	}
	/**
	 * Получить стр. по умолчанию
	 */
	function setDefaultTable($table=false) {
		return ($page)? $table:"#__webapps_customer_site_options";
	}
	/**
	 * Построить список CMS
	 */
	function tempCMSlist() {
		return array( 'bitrix'=>'1С-Битрикс',
					'ABO.CMS'=>'ABO.CMS',
					'Amiro.CMS'=>'Amiro.CMS',
					'atilect.CMS'=>'АТИЛЕКТ.CMS',
					'B2evolution'=>'B2evolution',
					'BIGACE'=>'BIGACE',
					'CMS Made Simple'=>'CMS Made Simple',
					'CMS Mail Keeper'=>'CMS Mail Keeper',
					'CMSimple'=>'CMSimple',
					'Concrete5'=>'Concrete5',
					'Contao'=>'Contao',
					'DLEngine'=>'DLEngine',
					'Danneo'=>'Danneo',
					'DotNetNuke'=>'DotNetNuke',
					'Drupal'=>'Drupal',
					'E107'=>'E107',
					'e2'=>'e2',
					'eZ publish'=>'eZ publish',
					'InSales'=>'InSales',
					'Joomla'=>'Joomla',
					'HostCMS'=>'HostCMS',
					'KooBoo'=>'KooBoo',
					'MODx'=>'MODx',
					'Mambo Open Source'=>'Mambo Open Source',
					'MediaWiki'=>'MediaWiki',
					'Movable Type'=>'Movable Type',
					'Nethouse'=>'Nethouse',
					'Newscoop'=>'Newscoop',
					'NPJ'=>'NPJ',
					'Nucleus CMS'=>'Nucleus CMS',
					'OpenCms'=>'OpenCms',
					'PHP-Fusion'=>'PHP-Fusion',
					'PHP-Nuke'=>'PHP-Nuke',
					'Plone'=>'Plone',
					'Prestashop'=>'Prestashop',
					'S.Builder'=>'S.Builder',
					'Sapid'=>'Sapid',
					'SharePoint'=>'SharePoint',
					'Site Sapiens'=>'Site Sapiens',
					'TYPO3'=>'TYPO3',
					'Textpattern'=>'Textpattern',
					'TikiWiki'=>'TikiWiki',
					'uCoz'=>'uCoz',
					'UMI.CMS'=>'UMI.CMS',
					'WikkaWiki'=>'WikkaWiki',
					'WordPress'=>'WordPress',
					'XOOPS'=>'XOOPS',
					'Xaraya'=>'Xaraya',
					'Zikula'=>'Zikula'
				);	
	} 
	/**
	 * Обновить данные коллекции
	 */
	function updateCollectionData($collection_id) {
		$table=$this->prepareCollectionDataSet($collection_id); 
		//Добавить данные в таблицу и проверить состояние:
		//добавить данные:
		SErrors::afterTable($table);
		return true;
	}
}
