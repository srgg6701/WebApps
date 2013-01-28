<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

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
		//подготовить данные для добавления новой коллекции
		if (!$table=$this->prepareCollectionDataSet()) 
			die("ОШИБКА! Не выполнено: Collector1ModelCollector1::prepareCollectionDataSet()");		
		SErrors::afterTable($table); //добавить данные в dnior_webapps_customer_site_options
		$default_table=SStuff::getDefaultTable(); //echo "<div class=''>default_table= ".$default_table."</div>";
		$added_record_id=SData::getLastId($default_table);
		if(!$added_record_id)
			JMail::sendErrorMess('Не добавлена временная коллекция опций сайта для незарегистрированного заказачика.',"Добавление временной коллекции.");
		$customer_status=SUser::handleUserData(JFactory::getUser()); //назначить данные/получить статус юзера
		//будем ОБНОВЛЯТЬ/ДОБАВЛЯТЬ данные в таблице предзаказчика:
		if ($customer_status=="precustomer"||$customer_status=="unknown") { //предзаказчик или неизвестен 
			$current_collection_object=($customer_status=="precustomer")? 'new':false;
			//ВНИМАНИЕ! Если в течение сессии юзер уже делал заказ, его статус будет precustomer
			$show_debug=true;
			if ($show_debug) SDebug::alertDebugInfo("customer_status= $customer_status"); //echo "<div>customer_status= $customer_status</div>";
			SUser::handlePrecustomersTable( //добавить запись в таблицу предзаказчиков
						$customer_status,
						$added_record_id, 	//новая запись в таблице коллекций
						'collections_ids',	//Коллекция или Заказ?
						'add',				//добавить (или обновить) к набору коллекций/заказов или удалить из него
						JRequest::get('post')
					  );
		}
		if (!SFiles::handleFilesUploading('s',$added_record_id)) 
			JMail::sendErrorMess('Не выполнен метод загрузки файлов (не возвращено true).',"Загрузка файлов.");
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
	 * @ collections
	 */
	function deleteCollection($collection_id,$table=false) {		
		if (!$table) $table = JTable::getInstance('customer_site_options', 'Collector1Table');
		if (!$table->delete($collection_id)) die("ОШИБКА удаления записи из таблицы!<HR>".$table->getError()); 		
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
	 * Получить данные коллекции по её id
	 * @ collections, user, model
	 */
	function getCollectionDataArray($collection_id,$user = false, $db = false){	
		//SDebug::dOutput("collection_id= $collection_id",'h1');
		if (!$user) $user = JFactory::getUser();
		if ($user->get('guest')!=1||$user->get('email')) { 
			$query="SELECT #__webapps_customer_site_options.id,
       `site_type_id`,
       `engine_type_choice_id`,
       `engines_ids`,
       `options_array`,
       `xtra`, 
       `files_names`,
	   `finish_date`
  FROM #__webapps_customer_site_options 
  LEFT JOIN #__webapps_files_names 
    ON #__webapps_files_names.identifier = CONCAT('s',#__webapps_customer_site_options.id)
 WHERE #__webapps_customer_site_options.id = $collection_id";
			if (!$db) $db=JFactory::getDBO();
			$db->setQuery($query); //SDebug::dOutput("query= $query"); 
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
			if (is_array($boxes_set)&&!empty($boxes_set)) {
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
			}
			$current_order_set['options_array']=$arrCheckedMap;
			$modelCMS=JModel::getInstance('CMS','collector1Model');
			if (SUser::detectAdminStat($user)){
				$isAdmin=true;
				require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.'CMS.php';
				$current_order_set['site_type_name']=self::get_sites_types($current_order_set['site_type_id']);
			}else
				$current_order_set['site_type_name']=$this->get_sites_types($current_order_set['site_type_id']);
				
			switch ($current_order_set['engine_type_choice_id'])  { 
				case "1":
					if ($isAdmin){
						$current_order_set['engines']=collector1ModelCMS::get_cms_names($current_order_set['engines_ids']);
					}else
						$current_order_set['engines']=$modelCMS->get_cms_names($current_order_set['engines_ids']);
					break;
				case "2": //разработать собственный
					$arrSMSs=SStuff::setCMStypes();
					$current_order_set['engines']=$arrSMSs[2][1];
					break;
				case "3":
					if ($isAdmin){
						$current_order_set['engines']=collector1ModelCMS::get_cms_own_name($collection_id);
					}else
						$current_order_set['engines']=$modelCMS->get_cms_own_name($collection_id);
					break;
			}
			if ($filenames=$current_order_set['files_names']) {
				$filenames=explode(":",$filenames); //convert to array
				$current_order_set['files_names']=$filenames;
			}
			//SDebug::showDebugContent($current_order_set,'current_order_set');
			return $current_order_set; 
		}else return false;
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
	 * название опции, по умолчанию - на русском
	 */
	function get_options_names($lang=false){
		if (!$lang) $lang='ru';
		$name='name_'.$lang;
		$query="SELECT id, $name FROM #__webapps_site_options ";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		$arr=$db->loadAssocList();
		//будем смещать переменные массива вверх, чтобы избавиться от нумерованных индексов:
		//array(var[0]=[[id]=id,[name]=name]) -> array(id=>name) 
		$arrOptions=array();
		for($i=0,$j=count($arr);$i<$j;$i++){
			$arrOptions[$arr[$i]['id']]=$arr[$i][$name];
		}
		return $arrOptions;
	}
	/**
	 * получить таблицу типов сайтов
	 */
	function get_sites_types($site_type_id=false){
		$query="SELECT";
		$query.=($site_type_id)? " name_ru ":" * "; 
		$query.="FROM #__webapps_site_types";
		if ($site_type_id) $query.=" WHERE id = $site_type_id";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return ($site_type_id)? $db->loadResult():$db->loadAssoc(); 
	}	
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
	 * @ collections
	 */
	function prepareCollectionDataSet($updated_id=false) {
		$table = JTable::getInstance('customer_site_options', 'Collector1Table');
		if ($updated_id){
			// если не удалось извлечь текущую запись из таблицы: 
			if(!$table->load($updated_id)) 
				JMail::sendErrorMess($table->getError()," (\$table->load())");
		}else
			$table->reset();
		
		$post_collection=JRequest::get('post');
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
		if (!empty($arrOptionsPartial)) {
			$arrOptionToIgnore=array();
			//получить игнорируемые опции, добавлять которые в набор не нужно:
			for ($i=0,$j=count($arrOptionsPartial);$i<$j;$i++){
				//если специфическая опция относится НЕ к сайту выбранного типа,
				//однозначно добавить к массиву исключений:
				if ($arrOptionsPartial[$i]['sites_types_ids_location']!=$selectSiteType)
					$arrOptionToIgnore[]=$arrOptionsPartial[$i]['site_option_id'];
			}
		}
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
					}else array_push($arrStoredOptions[$option_id],$gt[2]);
				}//else echo "<div>exclude option_id: ".$gt[1]."</div>";
			}
		}
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
	 * @ collections
	 */
	function updateCollectionData($collection_id) {
		//Добавить данные в таблицу и проверить состояние:
		SErrors::afterTableUpdate($this->prepareCollectionDataSet($collection_id));
		SFiles::handleFilesUploading( 's'/* o or s */,
								   $collection_id
								 );
		return true;
	}
}
