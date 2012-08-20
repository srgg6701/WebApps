<?php
defined('_JEXEC') or die('Restricted access');
class collector1ModelCollected extends JModel
{	
	private $default_table='#__webapps_customer_site_options';
	protected $precustomers_table='#__webapps_precustomers';
	/**
	 *
	 */	
	function __construct(){
		parent::__construct();
		$this->db=JFactory::getDBO();
		$user = JFactory::getUser();  
		//$this->query.=' WHERE customer_id = '.$user->id;
	}
	/**
	 * все сайты заказчика
	 * customer, precustomer
	 */
	function collected() {	
		if ($arrCollectionsIds=SCollection::getCurrentSetArray('collections_ids')) {
			$modelCollector=JModel::getInstance('collector1','Collector1Model'); //SDebug::showDebugContent($modelCollector,'modelCollector');
			//будем создавать массив ВСЕХ данных для каждой коллекции:
			$collections_data_array=array(); 
			for ($i=0,$j=count($arrCollectionsIds);$i<$j;$i++){
				$collection_id=$arrCollectionsIds[$i]; 
				if (SUser::detectAdminStat($user)){
					require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.'collector1.php';
					$collections_data_array[$collection_id]=Collector1ModelCollector1::getCollectionDataArray($collection_id);
				}
				else
					$collections_data_array[$collection_id]=$modelCollector->getCollectionDataArray($collection_id); //все данные коллекции
				//SDebug::showDebugContent($collections_data_array,'collections_data_array');
				if ($collections_data_array[$collection_id]===false) return false;
				unset($collections_data_array[$collection_id]['engines_ids']);
			}
		}
		return $collections_data_array;
	}
}
?>