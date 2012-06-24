<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.model');

class collector1ModelCollected extends JModel
{	
	private $query=" FROM #__webapps_customer_site_options";
	protected $db;
	
	function __construct(){
		parent::__construct();
		$this->db=JFactory::getDBO();
		$user = JFactory::getUser();  
		$this->query.=' WHERE customer_id = '.$user->id;
	}
	/**
	 * все сайты заказчика
	 */
	function collected()
	{	//SDebug::dOutput("collected",'h1');
		//guest?
		$arrCollectionsIds=SCollection::getPrecustomerSet('collections_ids');
		if (!$arrCollectionsIds){
			$query='SELECT id ' . $this->query . $where;//var_dump("<h1>query(collected):</h1><pre>",$query,"</pre>");
			$this->db->setQuery($query);
			$arrCollectionsIds=$this->db->loadResultArray(); 
		}//else var_dump("<h1>arrCollectionsIds:</h1><pre>",$arrCollectionsIds,"</pre>");
		for ($i=0,$j=count($arrCollectionsIds);$i<$j;$i++){
			$option_id=$arrCollectionsIds[$i]; //echo "<div class=''>option_id= ".$option_id."</div>";
			$main_model=JModel::getInstance('collector1','Collector1Model');
			$collections_data_array[$option_id]=$main_model->getCollection($option_id);
			//echo "<div class=''>collections_data_array[$option_id]= ".$collections_data_array[$option_id]."</div>";
			if ($collections_data_array[$option_id]===false) return false;
			unset($collections_data_array[$option_id]['engines_ids']);
		}
		return $collections_data_array;
	}
	/**
	 * Получить файлы
	 */
	function getUserFiles($identifier) {
		$db=JFactory::getDBO();
		$db->setQuery("SELECT files_names FROM #__webapps_files_names 
 WHERE `identifier` = '$identifier'");
 		$row=explode(":",$db->loadResult());
		//$row=implode("<br>",$row);
		return $row;
	}
	/**
	 * получить движок // ПЕРЕНЕСЕНО  в отдельную модель (CMS.php)
	 */
	/*function get_cms_names($cms_picked_up){
		$arrEngines=Collector1ModelCollector1::tempCMSlist(); 
		$cnt=count($cms_picked_up);
		$cms_list=array();
		$j=0;
		for ($e=0,$n=count($cms_picked_up);$e<$n;$e++){
			$i=0;
			if ($cms_picked_up[$e]) { //чтобы не подставило имя при $e==0
				foreach ($arrEngines as $nick=>$name){
					//Внимание! В действительности у элементов массива $arrEngines нет id, однако нижеуказанная проверка корректна, поскольку они записывались в поле таблицы именно в том порядке, в котором расположены в этом массиве
					if (in_array($i,$cms_picked_up)){
						$cms_list[]=$name;
						$j++;
					}
					$i++;
					if ($j&&$j==$cnt) break 2;
				}
			}
		}
		if (!empty($cms_list)) sort($cms_list);
		$smss=implode(',',$cms_list); 
		return $smss;
	}*/
	/**
	 * Получить название собственной cms
	 */
	/*function get_cms_own_name($collection_id){
		$query="SELECT engines_ids FROM #__webapps_customer_site_options WHERE id = ".$collection_id;
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadResult();
	}*/
	/**
	 * название опции, по умолчанию - на русском
	 */
	/*function get_options_names($lang=false){
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
	}*/
	/**
	 * получить таблицу типов сайтов
	 */
	/*function get_sites_types($site_type_id=false){
		$query="SELECT";
		$query.=($site_type_id)? " name_ru ":" * "; 
		$query.="FROM #__webapps_site_types";
		if ($site_type_id) $query.=" WHERE id = $site_type_id";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return ($site_type_id)? $db->loadResult():$db->loadAssoc(); 
	}*/
}
?>