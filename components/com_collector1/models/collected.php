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
	//все сайты заказчика:
	function collected()
	{	
		$this->db->setQuery('SELECT * ' . $this->query . $where);
		return $this->db->loadAssocList(); 
	}
	//получить движок:
	function get_cms(){
		$this->db->setQuery('SELECT id as collection_id, engines_ids ' . $this->query);
		$cms_picked_up=$this->db->loadAssocList();
		require_once(JPATH_COMPONENT.'/models/collector1.php');
		//все доступные:
		$arrEngines=Collector1ModelCollector1::tempCMSlist(); 
		$cms_list=array();
		for ($e=0,$n=count($cms_picked_up);$e<$n;$e++){
			$eng_ids=explode(',',$cms_picked_up[$e]['engines_ids']);
			$i=0;
			foreach ($arrEngines as $nick=>$name){
				$i++;
				//Внимание! В действительности у элементов массива $arrEngines нет id, однако нижеуказанная проверка корректна, поскольку они записывались в поле таблицы именно в том порядке, в котором расположены в этом массиве
				if (in_array($i,$eng_ids)){
					if ($i>1&&$cms_list[$e]) $cms_list[$e].=', ';
					$cms_list[$e].=$name;
				}
			}
			if (empty($cms_list[$e])) $cms_list[$e]='';
		}
		return $cms_list; 
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
	function get_sites_types(){
		$query="SELECT * FROM #__webapps_site_types";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadAssoc(); 
	}
}?>