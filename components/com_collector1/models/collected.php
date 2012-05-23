<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class collector1ModelCollected extends JModel
{	
	private $query="FROM #__webapps_customer_site_options";
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
	{	//guest?
		require_once JPATH_ADMINISTRATOR.DS.'classes/SCollection.php';
		if (!$arrCollectionsIds=SCollection::getGuestCollections()){
			$this->db->setQuery('SELECT id ' . $this->query . $where);
			$arrCollectionsIds=$this->db->loadResultArray(); 
		}
		for ($i=0,$j=count($arrCollectionsIds);$i<$j;$i++){
			$option_id=$arrCollectionsIds[$i];
			$collection_set[$option_id]=Collector1ModelCollector1::getCollection($option_id);
			unset($collection_set[$option_id]['engines_ids']);
		}
		return $collection_set;
	}
	//получить движок:
	function get_cms_names($cms_picked_up){
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
		return implode(',',$cms_list); 
	}
	//название опции, по умолчанию - на русском:
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
	//получить таблицу типов сайтов:
	function get_sites_types($site_type_id=false){
		$query="SELECT";
		$query.=($site_type_id)? " name_ru ":" * "; 
		$query.="FROM #__webapps_site_types";
		if ($site_type_id) $query.=" WHERE id = $site_type_id";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return ($site_type_id)? $db->loadResult():$db->loadAssoc(); 
	}
}?>