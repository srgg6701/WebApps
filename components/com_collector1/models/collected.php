<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.model');

class collector1ModelCollected extends JModel
{	
	private $query=" FROM #__webapps_customer_site_options";
	protected $db;
	public $arr_collections_ids;
	
	function __construct(){
		parent::__construct();
		$this->db=JFactory::getDBO();
		$user = JFactory::getUser();  
		//$this->query.=' WHERE customer_id = '.$user->id;
	}
	/**
	 * все сайты заказчика
	 */
	function collected()
	{	//SDebug::dOutput("collected",'h1');
		//guest?
		$user = JFactory::getUser();
		//получить id id коллекций:
		//echo "<div class='bold'>collected :: collected</div>";
		$arrCollectionsIds=($user->get('guest')==1)?
			SCollection::getPrecustomerSet('collections_ids') : SCollection::getUserSet($user->get('id'));
		//if ($user->get('guest')==1) $arrCollectionsIds=SCollection::getPrecustomerSet('collections_ids');
		//else $arrCollectionsIds=SCollection::getUserSet($user->get('id'));
		//else var_dump("<h1>arrCollectionsIds:</h1><pre>",$arrCollectionsIds,"</pre>");
		$this->arr_collections_ids=$arrCollectionsIds;
		if (is_array($arrCollectionsIds)) { //т.к. может вернуть id записи, а не массив
			$main_model=JModel::getInstance('collector1','Collector1Model');
			for ($i=0,$j=count($arrCollectionsIds);$i<$j;$i++){
				$collection_id=$arrCollectionsIds[$i]; //echo "<div class=''>collection_id= ".$collection_id."</div>";
				$collections_data_array[$collection_id]=$main_model->getCollection($collection_id);
				//echo "<div class=''>collections_data_array[$collection_id]= ".$collections_data_array[$collection_id]."</div>";
				if ($collections_data_array[$collection_id]===false) return false;
				//var_dump("<h1>collections_data_array[$collection_id]:</h1><pre>",$collections_data_array[$collection_id],"</pre>");
				unset($collections_data_array[$collection_id]['engines_ids']);
			}
		}
		return $collections_data_array;
	}
}
?>