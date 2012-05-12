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
	
	function collected()
	{
		$this->db->setQuery('SELECT *' . $this->query);
		return $this->db->loadAssoc(); 
	}
	//получить таблицу типов сайтов:
	function get_sites_types(){
		$query="SELECT * FROM #__webapps_site_types";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadAssoc(); 
	}
	//получить движок:
	function get_cms(){
		$this->db->setQuery('SELECT engines_ids ' . $this->query);
		$cms_picked_up=$this->db->loadAssoc();
		require_once(JPATH_COMPONENT.'/models/collector1.php');
		$arrEngines=Collector1ModelCollector1::tempCMSlist(); 
		$i=0;
		$cms_list='';
		$engs=explode(',',$cms_picked_up['engines_ids']);
		//var_dump("<h1>engs:</h1><pre>",$engs,"</pre>"); 
		foreach ($arrEngines as $nick=>$name){
			$i++;
			if (in_array($i,$engs)){
				if ($i>1)
					$cms_list.=', ';
				$cms_list.=$name;
			}
		}//die();
		return $cms_list; 
	}
}

?>