<?php
defined('_JEXEC') or die('Restricted access');
echo "<h1 class='' style='background:yellow'>collector1ModelCollected</h1>";
class collector1ModelCollected extends JModel
{	
	private $default_table='#__webapps_customer_site_options';
	protected $precustomers_table='#__webapps_precustomers';
	//public $collections_ids_array; //id id // public - потому что будет изменяться другим методом
	
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
				$collections_data_array[$collection_id]=$modelCollector->getCollection($collection_id/*,$user*/); //все данные коллекции
				//echo "<div class=''>collections_data_array[$collection_id]= ".$collections_data_array[$collection_id]."</div>";
				if ($collections_data_array[$collection_id]===false) return false;
				//var_dump("<h1>collections_data_array[$collection_id]:</h1><pre>",$collections_data_array[$collection_id],"</pre>");
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
	/**
	 * Получить массив id id КОЛЛЕКЦИЙ заказчика/предзаказчика
	 * @ customer, precustomer, user, set
	 */
	/*function getUserCollectionsIds( $user = false, 
									$db = false
							  	  ){ 
		if (!$user) $user = JFactory::getUser();
		if (!$this->collections_ids_array){
			if ($user->get('guest')==1){ 	//returns string
				SCollection::getPrecustomerSet('collections_ids',$user,true);
			}else{ //returns string
				SCollection::getUserSet('collections_ids',$user->get('id'));
			}
		}
		return $this->collections_ids_array;
	}*/
}
?>