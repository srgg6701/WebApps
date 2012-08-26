<?
/**
 * Методы для работы с коллекциям
 * @package com_collector1
 * @subpackage Admin Classes 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JTable::addIncludePath(JPATH_ADMINISTRATOR.'/components/com_collector1/tables');
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';
jimport('joomla.mail.mail');
/**
 * static
 */
class SCollection extends JTable{
	static private $alt_table='#__webapps_customer_orders';
	static private $default_table='#__webapps_customer_site_options';
	static private $precustomers_table='#__webapps_precustomers';
	static $collections_ids_array; //массив id id коллекций
	static $orders_ids_array; //массив id id заказов
	/**
	 * Удалить коллекцию из набора предзаказчика
	 * @ collections
	 * файлы удаляются методом SFiles::deleteObjectFiles
	 */
	function deletePrecustomerObject($object_type,$object_id) {
		if (JRequest::getVar('test')) $test_mode=true;
		
		$query="SELECT id, $object_type FROM ".self::$precustomers_table." 
 WHERE $object_type REGEXP '(^|,)".$object_id."($|,)'";
		$db = JFactory::getDBO();
		$db->setQuery($query); if ($test_mode) echo "\nquery: \n".$query."\n\n";
		$pre_objects_array=$db->loadAssoc(); var_dump($pre_objects_array);
		// конвертировать строку объектов в массив:
		$current_objects=explode(',',$pre_objects_array[$object_type]);
		$key=array_search($object_id,$current_objects);
		if ($key!==false){ //потому что может случиться 0
			unset($current_objects[$key]); // удалить удаляемый 
		}
		$table = JTable::getInstance('precustomers', 'Collector1Table');
		if (!$table->load($pre_objects_array['id'])) {
			JMail::sendErrorMess($table->getError()," (\$table->load())");
			return false;
		}else{
			$new_objects_ids=implode(',',$current_objects); // конвертировать обновлённый набор в строку
			if ($test_mode) echo "\nnew_objects_ids= ".$new_objects_ids."\n";
			//var_dump("table, id: ".$pre_objects_array['id']."\n",$table,"\n");
			$table->set($object_type, $new_objects_ids); 
			//обновить запись:
			SErrors::afterTableUpdate($table);
			/*if ($table->check()) {
				if (!$table->store(true)){ // обновить данные
					// handle failed update
					JMail::sendErrorMess($table->getError()," (\$table->store())");
				}
			}else{
				// handle invalid input
				JMail::sendErrorMess($table->getError()," (\$table->check())");
			}*/
		}
		return true; 		
	}
	/**
	 * Получить default_table
	 * @ table
	 */
	function getDefaultTable($alt_table=false) {
		if (strstr($alt_table,'#__')) return $alt_table;
		else return ($alt_table)? self::$alt_table:self::$default_table;
	}
	/**
	 * Получить id временной коллекции юзера
	 * collections, precustomer
	 */
	function getPrecustomerRowID($user=false) {
		if (!$user) $user = JFactory::getUser();
		$query="SELECT id FROM ".self::$precustomers_table."
 WHERE `email` = '".$user->get('email')."' OR session_id = '".session_id()."'";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadResult();
	}
	/**
	 * Получить текущий набор id id коллекций/объектов независимо ни от того, был ли он уже создан и каков статус юзера
	 * @ set, orders, collections
	 */
	function getCurrentSetArray($object_type){ 
		$objs_array=$object_type.'_array'; //value!
		if (!self::$$objs_array) { // collections_ids_array or orders_ids_array; equal to ${$objs_array}
			self::getUserSet(false,$objs_array);
			return self::$$objs_array; //equal to ${$objs_array}
		}
	}
	/**
	 * Получим id id коллекций/объектов заказчика
	 * @ customer, user, collections, orders
	 */
	function getCustomerSet( $object_type, // collections_ids | orders_ids
					     	 $user,
							 $db=false
					   	   ) {
		if (!$user) {
			$user = JFactory::getUser();
		}
		if (!$db) $db = JFactory::getDBO();
		$table=($object_type=='collections_ids')? 'site_options':'orders';
		$query='SELECT id FROM #__webapps_customer_'.$table.' WHERE customer_id = '.$user->get('id');
		$db->setQuery($query);
		if($ids_array=$db->loadResultArray()) {
			self::${$object_type.'_array'}=$ids_array;
			return implode(",",$ids_array); //returns string
		}else return false; //boolean - записей нет вообще
	}
	
	/**
	 * Получичить для редиректа:  view (customers/precustomers), user_id
	 * @ customer, precustomer, user, collections, orders
	 */
	function getObjectDataForRedirect( $layout, // collection / order
									   $object_id
									 ){
		$arrRedirectParams=array();
		// получить статус юзера
			// проверить, указан ли customer_id в соответствующей таблице
		$table_name_tail=($layout=='collection')? 'site_options':'orders';
		$query="SELECT customer_id FROM #__webapps_customer_".$table_name_tail."
WHERE id = ".$object_id;
		$db = JFactory::getDBO();
		$db->setQuery($query);
		if (!$arrRedirectParams['user_id']=$db->loadResult()){
			$arrRedirectParams['view']='precustomers';
			$query="SELECT id FROM #__webapps_".$arrRedirectParams['view']."
WHERE " . $layout . "s_ids REGEXP '(^|,)".$object_id."($|,)'";
			$db->setQuery($query); //die($query);
			$arrRedirectParams['user_id']=$db->loadResult();
		}else{
			$arrRedirectParams['view']='customers';
		} 
		return $arrRedirectParams;
	}
	/**
	 * Получить все коллекции/заказы незарегистрированного юзера
	 * @ ВНИМАНИЕ! Может вернуть 3 различных значения:
	   @ - значение ячейки, если нашли
	   @ - true - если нашли запись, но ячейка пуста
	   @ - false - если запись не найдена
	   @ precustomer, user, collections, orders
	 */
	function getPrecustomerSet( $object_type, // collections_ids | orders_ids
								$user=false,
								$test=false
							  ) {
		$db = JFactory::getDBO();  
		if($user_id=JRequest::getVar('user_id')) { // для backend'а
			$user=JFactory::getUser($user_id); // SDebug::showDebugContent($user,'USER');
			$user_data=SUser::getPrecustomerContactData($db,false,$user_id); //var_dump("<h1>user_data:</h1><pre>",$user_data,"</pre>"); //die();
			$user_email=$user_data['email'];
		}elseif (!$user){ 
			$user = JFactory::getUser(); 
			$user_email=$user->get('email');
		}
		$query="SELECT id, $object_type FROM ".self::$precustomers_table."
 WHERE `email` = '".$user_email."' OR session_id = '".session_id()."'";
		$test=true; if ($test) // echo "<div>query: <hr><pre>".$query."</pre></div>";
		$db->setQuery($query);  //SDebug::dOutput("query= $query",false,true); //die('getPrecustomerSet');
		if ($row=$db->loadAssoc()) { //получает строку из ячейки коллекций/заказов, значения разделены запятыми
			if ($cell=$row[$object_type]) { //данные поля обнаружены - Коллекция или Заказ существуют
				self::${$object_type.'_array'}=explode(",",$cell);
				return $row[$object_type]; //returns string
			}else return (int)$row['id']; //int - запись есть, но ячейка пуста
		}else return false; //boolean - записей нет вообще
	}
	/**
	 * Получим id id коллекций/объектов юзера - либо заказчика, либо предзаказчика
	 * @ customer, precustomer, user, collections, orders
	 */
	function getUserSet( $user=false,
						 $object_type=false // collections_ids | orders_ids
					   ) {
		$user_id=JRequest::getVar('user_id'); // для backend'а
		if (!$user) $user = JFactory::getUser($user_id);
		if ($user->get('email')) { 
			if ($user_id){ // для backend'а
				$call_method=(JRequest::getVar('view')=='precustomers')? 'getPrecustomerSet':'getCustomerSet';
			}else{
				$call_method=($user->get('guest')==1)? 'getPrecustomerSet':'getCustomerSet'; // ? customer / precustomer
			}
			if ($object_type!='orders_ids') self::$call_method('collections_ids',$user);
			if ($object_type!='collections_ids') self::$call_method('orders_ids',$user);
		}else return NULL; //т.к. массив коллекций и заказов может существовать только для зарегистированного или указавшего емэйл юзера
	}
	/**
	 * Добавить id юзера в таблицу постоянных коллекций/заказов, удалить запись из таблицы временных
	 * @ user, customer, precustomer, data, table
	 */
	function makeCustomerDataPermanent($user=false,$db=false,$test=false){ //вызывается в com_users
		
		if ($test) var_dump("<h1>REQUEST:</h1><pre>",$_REQUEST,"</pre>");
		
		if (JRequest::getVar('test')) $test=true;
		if (!$user) $user = JFactory::getUser(); 
		elseif(!is_object($user)) { // юзера активирует админ, через backend, т.о., в данном случае $user - админ, а мы получили id активируемого юзера
			$user = JFactory::getUser($user);
			if ($test) var_dump("<h1>user:</h1><pre>",$user,"</pre>"); 
		}
		if (!$db) $db	= JFactory::getDBO();
		$user_id=$user->get('id');
		$arrDataGate=array('collections_ids' => array('table'=>self::$default_table,'model'=>'Collected'), //customer_site_options
						   'orders_ids' => array('table'=>self::$alt_table,'model'=>'Orders') //customer_orders
						  ); 
		if ($test)
			var_dump("<h1>arrDataGate:</h1><pre>",$arrDataGate,"</pre>");
		
		foreach ($arrDataGate as $key=>$array){
			// $key: collections_ids / orders_ids
			// ["table"] => table name, ["model"] => model name
			$objects_ids=self::getPrecustomerSet($key,$user,$test); 
			if ($test) var_dump("<h1>objects_ids:</h1><pre>",$objects_ids,"</pre>");
			
			if (gettype($objects_ids)=='string'){ //иначе - int (если нашли запись, но не значение ячейки) или boolean (false) - если запись не обнаружена
				//обновим записи, добавив user id
				$query = $db->getQuery(true);
				$query->update($array['table']); //обновить в customer_site_options, customer_orders
				$query->set("customer_id = ".$user_id); //совпадает для обеих таблиц
				$query->where("id IN ($objects_ids)"); 
				$db->setQuery($query);
				if ($test){
					echo "<div>UPDATE query: <hr><pre>".$query."</pre></div>";
				}else{
					if (!$db->query()) { //afterTableUpdate ?
						//sendErrorMess включён
						JError::raiseError(500, $db->getErrorMsg());
					}//else echo "<div>UPDATED! query: <hr><pre>".$query."</pre></div>";
				}
			}
		}
		// будем добавлять запись в таблицу USERS:
		if ($contacts=SUser::getPrecustomerContactData($db,$user)){ // not NULL
			$table = JTable::getInstance('customers', 'Collector1Table');
			$table->reset();
			$table->set('skype', $contacts['skype']);
			$table->set('phone', $contacts['phone']);
			$table->set('ordering', $table-> getNextOrder());
			SErrors::afterTableUpdate($table);
		}
		$table = JTable::getInstance('precustomers', 'Collector1Table');//совпадает для обеих таблиц
		//удалим запись из временной таблицы
		if ($precustomer_id=self::getPrecustomerRowID($user)){
			if ($test){
				echo "\nУдалить данные из таблицы предзаказчиков.\n";
				var_dump("<pre>id предзаказчика: {$id}\n",$table,"</pre>");
			}elseif (!$table->delete($precustomer_id)) {
				JMail::sendErrorMess(" "," Не удалены временные данные коллекции/заказа");
			}
		}
		if (!$test) return true;
	}
	/**
	 * Получить типы CMS
	 */
	function setCMStypes(){
		return array( 1=>array('take_ready','Готовая CMS'),
					  2=>array('build_own','Разработать собственный'),
					  3=>array('exists','Перенести на имеющийся')
					);
	}
}
?>