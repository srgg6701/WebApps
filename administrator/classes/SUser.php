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
*/	  
	/**
	 * Проверить статус прочтения сообщения для данного юзера
	  * @ user, message, status
	 */
	function checkMessageReadStatus($message_id,$user_id=false,$db=false){
		if (!$db) $db = JFactory::getDBO();
		$query=$db->getQuery(true);
		$query->select('COUNT(id)');
		$query->from('#__webapps_messages_read');
		$messSb='message_id = '.$message_id;
		if ($user_id)
			$messSb.=' AND user_id = ' . $user_id;
		$query->where($messSb);
		$db->setQuery($query);
		$result=$db->loadResult(); 
		if ($take_test=JRequest::getVar('take_test')) echo "<div class=''>query ($result)= ".$query."</div>";
		return $result;
	}
/**
 * Получить колич. всех сообщений юзера
 * @package
 * @subpackage
 */
	public static function getAllUserMessagesCount($user_id=false){
		if(!$user_id&&$user_id!==NULL){
			$user = JFactory::getUser();
			$user_id=$user->get('id');
		}
		$query="SELECT COUNT(*)
  FROM #__webapps_messages ";
  		if ($user_id)
			$query.="
  WHERE user_id_from=$user_id OR user_id_to=$user_id";
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadResult(); 
	}
/* * 
	  * Нет в таблице юзеров:
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
	 * получить юзеров с правами не ниже....
	 * @ user, admin, superadmin, manager
	 */
	function getInternalUsersIds($minimal_level,$db=false){
		$query="SELECT DISTINCT u.id
    FROM #__users as u, #__user_usergroup_map as g
    WHERE u.id = g.user_id AND g.group_id >= ".$minimal_level." -- groups having access to clients: Super Users (8), Administrator (7), Manager (6)";
		if (!$db) $db = JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadResultArray();
	}
	/**
	 * получить сообщение
	 * @ user, precustomer, customer, message
	 */
	function getMessage($id){
		$query="SELECT message FROM #__webapps_messages WHERE id = $id";
		$db = JFactory::getDBO();
		$db->setQuery($query);  //echo "<div class=''>query= ".$query."</div>";
		return $db->loadResult();		
	}	
	/**
	 * получить сообщения
	 * @ user, precustomer, customer, message
	 */
	function getMessages($arrMessages=false) { 
		
		$order_by=$arrMessages['sort']; // сортировка
		$user_id_from=$arrMessages['user_id_from']; // фильтр по отправителю
		$user_id_to=$arrMessages['user_id_to']; // фильтр по получателю
		$user_id_read=$arrMessages['user_id_read']; // фильтр по тому, кто прочёл
		$criteria=$arrMessages['criteria']; // дополнительные критерии выбора записей
		$limit=$arrMessages['limit']; // лимит записей
		$fields_subquery=$arrMessages['fields_subquery']; // дополнительные поля извлечения данных
						
		$query="SELECT DISTINCT ";
		$tbl_attaches="#__webapps_files_attaches";
		$tbl_mess="#__webapps_messages";
		$tbl_read="#__webapps_messages_read";
		$tbl_deleted="#__webapps_messages_deleted";
		$webapps_messages_id=$tbl_mess.'.id';
		if ($fields_subquery){
			
			if ($fields_subquery=='id') $fields_subquery=$webapps_messages_id;
			
			$query.=$fields_subquery;
		
		}else{
			
			$query.=$webapps_messages_id.", ";//"#__webapps_messages.id"
			
			//если нужно разобраться со статусом прочтения:
       		if ($user_id_read) $query.="
       ( SELECT DATE_FORMAT(".$tbl_read.".date_time, '%e.%m.%Y %H:%i')
         FROM ".$tbl_read." 
        WHERE user_id = ".$user_id_read."  AND message_id = ".$webapps_messages_id."
       ) AS 'read_datetime',";
       		
			$query.="
       user_id_from, 
       user_id_to, 
DATE_FORMAT(".$tbl_mess.".date_time, '%e.%m.%Y %H:%i') 
    AS 'datetime', 
       subject, 
       message, 
	   files_names,
	   ".$tbl_read.".date_time AS 'read_datetime',
       obj_identifier";
  			$user = JFactory::getUser();
			if ($isAdmin=SUser::detectAdminStat($user)) 
				$query.=",
       ".$tbl_deleted.".user_id AS del_by_user ";
	   		else 
				$exclude_del="
  AND ".$tbl_mess.".id NOT IN ( SELECT message_id 
  							FROM ".$tbl_deleted." 
						   WHERE user_id = ".$user_id_from."
						)";
		}
	   	$query.="
  FROM ".$tbl_mess." 
  LEFT JOIN ".$tbl_read." ON ";
  		
		$eq_messages="message_id = ".$webapps_messages_id;
  		
		$query.= ($isAdmin) ? 
			"( ".$eq_messages." AND ".$tbl_read.".user_id = ".$user->get('id')." )"
			:
			$eq_messages;
		
		$query.="
  LEFT JOIN ".$tbl_attaches." ON ".$tbl_attaches.".message_id = ".$webapps_messages_id;
  			if ($isAdmin)
				$query.="
  LEFT JOIN ".$tbl_deleted." ON ".$tbl_deleted.".message_id = ".$webapps_messages_id;
  		$query.="
 WHERE (";
 		if ($user_id_from || $user_id_to) {
			
			$_user_id_from=" user_id_from = $user_id_from ";
			$_user_id_to=" user_id_to = $user_id_to ";
			
			// конкретный юзер (например, заавторизованный заказчик/предзаказчик):
			if ( $user_id_from && $user_id_to ) {
				$operator=($user_id_from == $user_id_to)? " OR ":" AND ";
				$subquery=$_user_id_from.$operator.$_user_id_to;
			}else{
				$subquery=($user_id_from)? $_user_id_from:$_user_id_to;
			}
			$query.=$subquery;
		}
		if ($criteria) {
			if ($sbquery) $query.="
           AND ";
	   		$query.="(
        ".$criteria."
           )";
		}
		
		if (!$subquery&&!$criteria) 
			$query.=1;
		
		$query.="
       )";

		if ($exclude_del)
			$query.=$exclude_del;			
	   
		$query.="
ORDER BY ";
		if (!$order_by) $order_by=$webapps_messages_id." DESC";
		$query.=$order_by;
		$db = JFactory::getDBO();
		
		if ($limit) {
			$query.=" LIMIT ";
			if ($limit=='default')
				$limit="0,20";
			$query.=$limit;   
		}
		$db->setQuery($query);  
		$messages=$db->loadAssocList(); // var_dump("<h1>messages:</h1><pre>",$messages,"</pre>");
		
		if (JRequest::getVar('q')) echo "<div>SUser::getMessages(), query(".count($messages)."): <hr><pre>".$query."</pre></div>";
		
		return $messages;
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
	function getPrecustomerStatus($email=false) {
		if (!$email) $email = JRequest::getVar('email');
		$query="SELECT COUNT(*) FROM #__webapps_precustomers
 WHERE `email` = '$email' OR session_id = '".session_id()."'";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		return (int)$db->loadResult(); // id / NULL
	}
	/**
	 * Установить данные юзера
	 * @ user, data, message
	 */
	function getUserDataFromMail($message_id,$direct='from'){
		$tbl_mess="#__webapps_messages";
		$query="SELECT #__users.id AS user_id, `name` AS user_name, `username` AS user_login
FROM #__users, ".$tbl_mess."
WHERE ".$tbl_mess.".user_id_".$direct." = #__users.id
AND ".$tbl_mess.".id = ".$message_id;
		$db = JFactory::getDBO(); // echo "<div class=''>query= ".$query."</div>";
		$db->setQuery($query);
		return $db->loadAssoc();
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
				if ($rws>1) JMail::sendErrorMess("В таблице #__webapps_precustomers можеть быть только одна запись для каждого предзаказчика","Дублирование записей в табл. #__webapps_precustomers");
				else{ //условие удаления строки не соблюдено - будем получать данные для обновления
					if (!$table->load($actual_order_id)) //не загружена существующая запись
						JMail::sendErrorMess($table->getError()," (\$table->load())");
					else{
						$arrObjs=explode(",",$result[0]);
						if(!$key_del=array_search($actual_order_id,$arrObjs))
							JMail::sendErrorMess("В таблице #__webapps_precustomers среди набора коллекций/заказов не обнаружен id удаляемого","Не обнаружен удаляемый $object_type");
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
	 * Выяснить, входит ли юзер в группу админов
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
	/**
	 * Назначить строке сообщения класс, в зависимости от статуса прочтения субъектами сообщения
	 * mail, data
	 */
	function setMailRowClass( $message_id,
							  $internal_users_ids=false,
							  $minimal_level=false,
							  $user=false,
							  $db=false
							){
		if (!$user) $user = JFactory::getUser();
		$user_id=$user->get('id');
		if (!$internal_users_ids) {
			if (!$minimal_level) $minimal_level=6;
			$internal_users_ids=self::getInternalUsersIds($minimal_level,$db);
		}
		// выяснить статус сообщения.
		// полученное, если отправитель - заказчик
		// отправленное, если отправитель - заказчик
		$detect_resp_stat="IF ( m.user_id_from, 'inbox', 
           IF ( m.user_id_from, 'outbox', 'unknown' )
          ) AS direct";
		
		if (self::detectAdminStat($user)) {
			//выяснить, является ли респондент заказчиком и каков его статус - отправитель или получатель
			$query="SELECT DISTINCT 
       $detect_resp_stat
FROM #__users AS u 
LEFT JOIN #__webapps_messages AS m 
       ON ( m.user_id_from = u.id -- sender
            OR 
            m.user_id_to = u.id   -- receiver
          )
LEFT JOIN #__webapps_customer_site_options 
    as cso ON cso.customer_id =  u.id
LEFT JOIN #__webapps_customer_orders 
    as co ON co.customer_id =  u.id
WHERE m.id = ".$message_id." -- message id
  AND ( cso.customer_id = m.user_id_from -- collection customer_id
        OR 
        co.customer_id = m.user_id_from  -- order customer_id
      )";
		}else{
			$query="SELECT 
			$detect_resp_stat
FROM #__webapps_messages AS m
WHERE m.id = ".$message_id." 
  AND ( user_id_to = ".$user_id." 
     OR user_id_from = ".$user_id." 
     )"; 
		}
		if(!$db) $db = JFactory::getDBO();
		$db->setQuery($query);
		if ($direct=$db->loadResult()) {
			if ($direct=="unknown")
				JMail::sendErrorMess('Получен статус направления сообщения "unknown" (SUser::setMailRowClass())' ,'Неизвестный статус направления сообщения');
		}
		if (!self::checkMessageReadStatus($message_id,$user->get('id'))) $user_mess_unread=true;
		// если админ
		if (self::detectAdminStat($user)){
			//
			if($direct=='inbox'){ // от клиента
				if (!$user_mess_unread) $class="Read";
				else { // выяснить, прочёл ли кто-нибудь из сотрудников
					$query="SELECT COUNT(*)
FROM #__webapps_messages_read
WHERE user_id IN ( " . $internal_users_ids ."
) AND message_id = ".$message_id." AND user_id <> ".$user_id;
					"UnReadMe";
				}
			}else{ // отправленные
				   // выяснить, прочёл ли клиент
				$receiver_data=SUser::getUserDataFromMail($message_id,'to');
				if(!self::checkMessageReadStatus($message_id,$receiver_data['user_id'])) $customer_unread=true;
				// не прочтено клиентом
				if($customer_unread) {
					$class=($user_mess_unread)? 
						"UnReadOutMe" // не прочтено мной
						:
						"UnReadOut";  // прочтено мной
				}else{ // прочтено клиентом
					$class=($user_mess_unread)? 
						"UnReadMe"  // не прочтено мной
						:
						"Read";  // прочтено мной
				}
			}
		}else{ // если клиент
			$class=($direct=='inbox'&&$user_mess_unread)? "UnReadAllIn":"Read";
		}
		echo $class;
		return true;
	}
}