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
	function collected() {	//SDebug::dOutput("collected",'h1'); //die();
		//guest?
		//$user = JFactory::getUser();
		//получить id id коллекций:
		/*($user->get('guest')==1)? //назначает данные для $this->collections_ids_array
			SCollection::getPrecustomerSet('collections_ids') : SCollection::getUserSet('collections_ids',$user->get('id'));
		$arrCollectionsIds=$this->collections_ids_array; var_dump("<h1>arrCollectionsIds:</h1><pre>",$arrCollectionsIds,"</pre>");
		if ($arrCollectionsIds){ //otherwise is null*/
		if ($arrCollectionsIds=SCollection::getCurrentSetArray('collections_ids')) {
			$modelCollector=JModel::getInstance('collector1','Collector1Model');
			//будем создавать массив ВСЕХ данных для каждой коллекции:
			$collections_data_array=array(); 
			for ($i=0,$j=count($arrCollectionsIds);$i<$j;$i++){
				$collection_id=$arrCollectionsIds[$i]; 
				$collections_data_array[$collection_id]=$modelCollector->getCollectionDataArray($collection_id); //все данные коллекции
				//SDebug::showDebugContent($collections_data_array,'collections_data_array');
				if ($collections_data_array[$collection_id]===false) return false;
				unset($collections_data_array[$collection_id]['engines_ids']);
			}
		}
		return $collections_data_array;
	}
	/**
	  * Проверить принадлежность коллекции юзеру
	 */
	/*function checkCollectionAccessory($collection_id, $user = false, $db = false) {
		$query="SELECT COUNT(*) FROM ";
		if (!$user)
			$user = JFactory::getUser();
		if ($user->get('guest')!=1){
			$query.=$this->default_table."
 WHERE id = $collection_id
   AND `customer_id` = ".$user->get('id');
		}else{
			$query.=$this->precustomers_table." 
 WHERE collections_ids REGEXP CONCAT('(^|,)',$collection_id,'(,|$)')
   AND ( email = '".$user->get('email')."'
         OR session_id = '".session_id()."'
       )";
		}
		if (!$db) $db = JFactory::getDBO();
		$db->setQuery($query);
		$collections_ids_array=$db->loadResultArray();
		$this->collections_ids_array=$collections_ids_array; //будет извлекаться также helper'ом предзаказчика
		*return $collections_ids_array; 
	}*/
}
?>