<?php
/**
 * Дополнительные методы работы с объектом user
 * @package com_collector1
 * @subpackage Admin Classes 
 */
// No direct access
defined('_JEXEC') or die;
/**
 * Обработка юзера
 */
class SUser{
	static $isAdmin;
	/**
	  * Получить статус заказчика/предзказчика
	 */
	/**
	  * - [enabled,] activated		  				block = 0, activation [empty]
	  * -  enabled,  not activated (can log in) 	block = 0, activation [code]
	  *	-  not enabled, not activated				block = 1, activation [code]
	  * -  disabled, activated	(can't log in)		block = 1, activation [empty]
	  -----------------------------------------------------------------------
	  * * Нет в таблице юзеров:
	  * - предзаказчик - уже создавал коллекции/заказы, но ещё не зарегистрировался
	  * - новый предзаказчик
	  * @ user, customer, precustomer, status
	  */
	function getCustomerStatus($user=false) {
		//выясним статус юзера:
		if (!$user) $user = JFactory::getUser();
		if ($user->get('guest')!=1){
			$customer_status=($user->get('block')==1)? "disabled":"enabled";
			$customer_status.=" ";
			//код активации?
			$customer_status.=($user->get('activation'))? "inactive":"active";
		}else{
			//проверить запись в таблице предзаказчиков по полученному емэйлу:
			$customer_status=self::getPrecustomerStatus(JRequest::getVar('email'),$user);
			if ($customer_status>1){
				JMail::sendErrorMess('Обнаружено более 1 записи предзаказчика',"Лишние записи в таблице предзаказчиков");
			}else{
				$customer_status=($customer_status)? "precustomer":"unknown";
			}
		}
		if (!$customer_status)
			JMail::sendErrorMess('Не получен статус юзера.',"Определение статуса юзера.");
		return $customer_status;
	}
	/**
	 * @ user, precustomer
	 */
	function getPrecustomerContactData( $db=false,
										$user=false,
										$user_id=false,
										$as_object=false
									  ){
		if (!$db) $db	= JFactory::getDBO();
		if (!$user) $user = JFactory::getUser(); 
		$query="SELECT `name`, `phone`, `skype`";
		$from_where=' FROM #__webapps_precustomers 
 WHERE ';
		if (self::detectAdminStat($user)){
			$query.=", `email` ".$from_where." id = ".(int)$user_id;
		}else{
			$query.=$from_where." `email` = '".$user->get('email')."' 
    OR `session_id` ='".session_id()."'";
		}
		$db->setQuery($query); // echo "<div>query: <hr><pre>".$query."</pre></div>";
		return ($as_object)? $db->loadObject():$db->loadAssoc();
	}
	/**
	 * Проверить, не является ли текущий юзер предзаказчиком?
	  * @ user, precustomer, status
	 */
	function getPrecustomerStatus($email=false/*,$user=false*/) {
		if (!$email) $email = JRequest::getVar('email');
		//if (!$user) $user = JFactory::getUser();
		$query="SELECT COUNT(*) FROM #__webapps_precustomers
 WHERE `email` = '$email' OR session_id = '".session_id()."'";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		return (int)$db->loadResult(); // id / NULL
	}
	/**
	 * Проверить статус прочтения сообщения для данного юзера
	  * @ user, message, status
	 */
	function checkMessageReadStatus($user_id,$message_id,$db=false){
		if (!$db) $db = JFactory::getDBO();
		$query=$db->getQuery(true);
		$query->select('COUNT(id)');
		$query->from('#__webapps_messages_read');
		$query->where('message_id = '.$message_id.' AND user_id = ' . $user_id);
		$db->setQuery($query);
		$result=$db->loadResult(); //echo "<div class=''>query ($result)= ".$query."</div>";
		return $result;
	}
	/**
	 * получить сообщения
	 * @ user, precustomer, customer, message
	 */
	function getMessages( $order_by=false,
						  $user_id_from=false,
						  $user_id_to=false,
						  $user_id_read=false,
						  $criteria=false,
						  $limit=false,
						  $fields=false
						) { 
		$query="SELECT ";
		if ($fields){
			if ($fields=='id') $fields='#__webapps_messages.id';
			$query.=$fields;
		}else{
			$query.="#__webapps_messages.id,";
			//если нужно разобраться со статусом прочтения:
       		if ($user_id_read) $query.="
       ( SELECT DATE_FORMAT(#__webapps_messages_read.date_time, '%e.%m.%Y %H:%i')
         FROM #__webapps_messages_read 
        WHERE user_id = ".$user_id_read."  AND message_id = dnior_webapps_messages.id
       ) AS 'read_datetime',";
       		$query.="
       user_id_from, 
       user_id_to, 
       DATE_FORMAT(#__webapps_messages.date_time, '%e.%m.%Y %H:%i') AS 'datetime', 
       subject, 
       message, 
       obj_identifier ";
		}
	   $query.="
  FROM #__webapps_messages 
  LEFT JOIN #__webapps_messages_read ON message_id = #__webapps_messages.id";
		if ($user_id_from)
			$subquery_user_from=$sbquery=" user_id_from = $user_id_from ";
		if ($user_id_to)
			$subquery_user_to=$sbquery=" user_id_to = $user_id_to ";
		if ( $user_id_from
			 || $user_id_to
			 || $fields
		   ){
			$query.=" 
 WHERE ";
			if (!$fields) $query.=($user_id_from&&$user_id_to)? $subquery_user_from . "AND" . $subquery_user_to : $sbquery;
		}
		if ($criteria) {
			if ($sbquery) $query.="
   AND ";
	   		$query.="(
        ".$criteria."
       )";
		}
		$query.="
ORDER BY ";
		if (!$order_by) $order_by="id DESC";
		$query.=$order_by;
		$query.=" LIMIT ";
		if (!$limit) $limit="20";
		$query.=$limit;  // echo "<div>query: <hr><pre>".$query."</pre></div>";
		$db = JFactory::getDBO();
		$db->setQuery($query);  
		$messages=$db->loadAssocList();  //var_dump("<h1>messages:</h1><pre>",$messages,"</pre>");
		return $messages;
	}
	/**
	 * Добавить или обновить данные в таблице предзаказчиков
	 * ВНИМАНИЕ! Метод вызывается ТОЛЬКО ПРИ ДОБАВЛЕНИИ новой коллекции или заказа
	 * (в табл.табл. *customer_site_options или *customer_orders соответственно)
	 * @ precustomer, table, update, delete
	 */
	function handlePrecustomersTable(
					$customer_status, //precustomer/unknown
				  	$actual_order_id, //id добавленной/удаляемой коллекции или заказа
					$object_type, //Коллекция или Заказ - 'collections_ids'/'orders_ids'
				  	$action, //добавить к набору коллекций/заказов или удалить из него
				  	$post_data=false,
					$user=false
					) { //
		$show_debug=true;
		if (!$action||!$actual_order_id) {
			if (!$action){
				$mess="Не получен \$action";
				$subj="Ошибка получения типа действия предзаказчика";
			}else{
				$mess="Не получен id добавленной записи";
				$subj="Ошибка получения id добавленной записи";
			}
			JMail::sendErrorMess($mess,$subj);
			exit();
		}
		if ($show_debug) SDebug::alertDebugInfo("actual_order_id= $actual_order_id");
		if (!$post_data) $post_data=JRequest::get('post');
		if (!$user) $user = JFactory::getUser();
		$arrMainUserPostData=array('name','phone','skype','email');
		$table = JTable::getInstance('precustomers', 'Collector1Table'); //таблица
		if ($action=='delete') { //удаляем Коллекцию/Заказ
			//сначала проверить, что нужно делать - удалять или обновлять запись:
			$contr_field=($object_type=='collections_ids')? 'orders_ids':'collections_ids';
			$query="SELECT $object_type FROM #__webapps_precustomers
 WHERE $object_type = '$actual_order_id' -- не содержит ','
   AND $contr_field = '' 				 -- пусто
   AND ( `email` = '".$user->get('email')."'
   	   -- OR session_id = '".session_id(). // "'-- закомментировано, т.к. при удалении заказа емэйл уже установлен и может быть изменён ТОЛЬКО в процессе создания новой Коллекции/Заказа
"       )";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$result=$db->loadResultArray();
			$rws=count($result); //колич. записей
			if($rws=='1') $table->delete();
   			else{
				if ($rws>1) JMail::sendErrorMess("В таблице dnior_webapps_precustomers можеть быть только одна запись для каждого предзаказчика","Дублирование записей в табл. dnior_webapps_precustomers");
				else{ //условие удаления строки не соблюдено - будем получать данные для обновления
					if (!$table->load($actual_order_id)) //не загружена существующая запись
						JMail::sendErrorMess($table->getError()," (\$table->load())");
					else{
						$arrObjs=explode(",",$result[0]);
						if(!$key_del=array_search($actual_order_id,$arrObjs))
							JMail::sendErrorMess("В таблице dnior_webapps_precustomers среди набора коллекций/заказов не обнаружен id удаляемого","Не обнаружен удаляемый $object_type");
						else{ //id удаляемой Коллекции/Заказа обнаружен
							unset($arrObjs[$key_del]); //удалить из массива
							$strObjsToUpdate=implode(",",$arrObjs); //подготовить актуальный набор Коллекций/Заказов для обновления, трансформировав в строку
							//обновить данные в табл. предзаказчиков:
							SErrors::afterTableUpdate($table,$strObjsToUpdate/*,$actual_order_id*/);
						}
					}
				}
			}
		}else{ //обновить запись
			$table->reset();
			//Обновлять!
			if ($customer_status=="precustomer") { //Предзаказчик (данные уже есть)
				//получить id записи в таблице предзаказчика, чтобы передать далее для обновления таблицы и проверить её наличие
				if (!$table->load(SCollection::getPrecustomerRowID($user)))
					JMail::sendErrorMess($table->getError(),"Ошибка во время подготовки обновления таблицы предзаказчиков");
				else{
					$arrDataPatch=array();
					$arrDataPatch[$object_type]=$post_data[$object_type];
					//получить текущий набор (нужно, чтобы дополнить его создаваемой Коллекцией/Заказом)
					if ($objects_ids_array=SCollection::getCurrentSetArray($object_type)) {//массив id id объектов сформирован (т.е., он - не NULL)1
						$arrDataPatch[$object_type]=implode(",",$objects_ids_array).','.$actual_order_id;
					}else{
						$pre_set=SCollection::getPrecustomerSet($object_type,$user);
						if (gettype($pre_set)=='integer') {//запись в таблице есть, но ячейка пуста
							$arrDataPatch[$object_type]=$actual_order_id;
						}
					} //SDebug::dOutput("actual_order_id=$actual_order_id",'h1');
					$arrDataPatch['session_id']=session_id();
					//добавить к массиву данные юзера:
					foreach ($arrMainUserPostData as $key=>$value)
						$arrDataPatch[$value]=$user->get($value);
					//обновить данные в табл. предзаказчиков:
					SErrors::afterTableUpdate($table,$arrDataPatch);
				}
			}else{ //Добавлять! //статус юзера - unknown
				//die('going to insert!');
				$table->set($object_type/*order_obj_type*/,$actual_order_id); //collections_ids , 29
				$table->set('session_id',session_id());
				foreach ($arrMainUserPostData as $key=>$value) {
					$table->set($value,JRequest::getVar($value));//$user->get($value)
				}//die();
				SErrors::afterTable($table); //SDebug::dOutput("ВЫПОЛНЕНО: afterTable",'h1');
			}
		}
		//$test=true;
		if ($test){
			$done=($customer_status=="precustomer")? "ОБНОВЛЕНО":"ДОБАВЛЕНО";
			echo "<h1>$done!</h1>actual_order_id= $actual_order_id";
			echo "<div class=''>customer_status= ".$customer_status."</div>";
			var_dump("<h1>table:</h1><pre>",$table,"</pre>");
			die();
		}
		return true;
	}
	/**
	 * Назначить данные юзеру, полученные с запросом и вернуть его статус
	 * @ user, status
	 */
	function handleUserData($user=false) {
		if (!$user) $user = JFactory::getUser();
		self::setUserData($user); //назначить юзеру данные, полученные в запросе
		return self::getCustomerStatus($user); //получить статус юзера
	}
	/**
	 * Установить данные юзера
	 * @ user, data
	 */
	function setUserData($user=false) { 
		if (!$user) $user = JFactory::getUser();
		$arrMainUserPostData=array('name','phone','skype','email');
		for($i=0,$j=count($arrMainUserPostData);$i<$j;$i++)
			if (JRequest::getVar($arrMainUserPostData[$i]))
				$user->set($arrMainUserPostData[$i],JRequest::getVar($arrMainUserPostData[$i]));
		return true;
	}
	/**
	 * Установить данные юзера
	 * @ user, status
	 */
	function detectAdminStat($user=false){ 
		if (self::$isAdmin===NULL) {
			if (!$user) $user = JFactory::getUser();
			//echo "<div class=''>detectAdminStat</div>";
			$groupsUserIsIn = JAccess::getGroupsByUser($user->id);
			// admin OR user
			self::$isAdmin=(in_array(7,$groupsUserIsIn) || in_array(8,$groupsUserIsIn))? true:false;
		}//else echo "isAdmin now: ".self::$isAdmin;
		return self::$isAdmin;
	}
	/**
	 * Установить данные юзера
	 * @ customer, user, data
	 */
	function extractCustomerTableData($user,$db=false) {
		if (!$db) $db = JFactory::getDBO();
		//var_dump("<h1>user($ustat):</h1><pre>",$user,"</pre>"); die();
		$query="SELECT surname,
       middle_name,
       sex,
       DATE_FORMAT(birthday, '%e.%c.%Y') AS 'birthday', -- 23.10.1967
       work_phone,
       mobila,
       skype,
       company_name,
       city,
       region,
       zip_code	      
  FROM #__users WHERE id = ".$user->get('id');
		$db->setQuery($query); //echo "<div>query: <hr><pre>".$query."</pre></div>";
		$user_data=$db->loadAssoc(); 
		foreach($user_data as $field=>$value){
			if (!$user->$field) $user->set($field,$value);
		}
		return $user;
	}
}