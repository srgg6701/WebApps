<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.model');

class collector1ModelCollected extends JModel
{	
	private $default_table='#__webapps_customer_site_options';
	private $precustomers_table='#__webapps_precustomers';
	protected $collections_ids_array;
	//public $arr_collections_ids;
	
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
		if (is_array($arrCollectionsIds)) { //т.к. может вернуть id записи, а не массив
			$modelCollector=JModel::getInstance('collector1','Collector1Model');
			for ($i=0,$j=count($arrCollectionsIds);$i<$j;$i++){
				$collection_id=$arrCollectionsIds[$i]; //echo "<div class=''>collection_id= ".$collection_id."</div>";
				$collections_data_array[$collection_id]=$modelCollector->getCollection($collection_id,$user);
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
	function checkCollectionAccessory($collection_id, $user = false, $db = false) {
		$query="SELECT COUNT(*) FROM ".$this->default_table;
		if (!$user)
			$user = JFactory::getUser();
		if ($user->get('guest')!=1){
			$query.=self::$default_table."
 WHERE id = $collection_id
   AND `customer_id` = ".$user->get('id');
		}else{
			$query.=self::$precustomers_table." 
 WHERE collections_ids REGEXP CONCAT('(^|,)',$collection_id,'(,|$)')
   AND ( email = '".$user->get('email')."'
         OR session_id = ".session_id()."
       )";
		}
		if (!$db) $db = JFactory::getDBO();
		$db->setQuery($query);
		$collections_ids_array=$db->loadResult();
		$this->collections_ids_array=$collections_ids_array; //будет извлекаться также helper'ом предзаказчика
		return $collections_ids_array;
	}
	/**
	 * Получить массив id id КОЛЛЕКЦИЙ заказчика/предзаказчика
	 */
	function getCollectionsIds( $customer_identifier, //user id OR user email
								$db=false
							  ){
		$default_table=$this->default_table;
		$precustomers_table=$this->precustomers_table;
		$query='SELECT '.$default_table.'.id FROM '.$default_table;
		if (is_int($customer_identifier)) //user id 
			$query.=' WHERE customer_id = '. (int)$customer_id;
		elseif (is_string($customer_identifier)&&strstr($customer_identifier,"@")) //user email
			$query.=" 
  LEFT JOIN ".$precustomers_table ."
    ON ".$precustomers_table.".collections_ids REGEXP CONCAT('(^|,)',".$default_table.".id,'(,|$)')
 WHERE ".$precustomers_table.".email = '".$customer_identifier."' OR session_id = '".session_id()."'";
		if (!$db) $db=JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadResultArray();
	}
}
?>