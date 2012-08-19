<?
defined('_JEXEC') or die('Restricted access');

class collector1ModelOrders extends JModel
{	
	protected $default_table='#__webapps_customer_orders';
	/**
	 * Удалить заказ (файлы к этому моменту уже должны быть удалены методом SFiles::deleteObjectFiles())
	 */
	function deleteOrder($order_id, $table=false){
		//удаляем все файлы:
		if ($arrUserFiles=SFiles::requestUserFilesByObjectId('orders_ids',$order_id)) {
			SFiles::deleteObjectFiles($arrUserFiles,'o'.$order_id); // если передан параметр URL test, вместо удаления файлов будет выведено сообщение 
		}
		$user = JFactory::getUser();
		//удаляем все записи из таблиц:
		if ($user->get('guest')==1) { // обновить запись в #__webapps_precustomers
			// При передаче тестового параметра (test) в URL выводит сообщение в методе store() вместо выполнения реального действия с таблицей:
			SCollection::deletePrecustomerObject('orders_ids',$order_id);
		}
		// удалить запись из #__webapps_customer_orders
		/* 	ВНИМАНИЕ! 
		 @	Процедура удаления записи из таблицы customer_orders для коллекций вызывается иначе, из собственного контроллера.
		 @	Здесь вызов из модели обусловлен тем, что процедура выполняется ТОЛЬКО через AJAX, для которого создан отельный компонент, т.о., вызов контроллера основного компонента - Controller1 - здесь не нужен.
		*/
		if (!$table) $table = JTable::getInstance('customer_orders', 'Collector1Table');
		//удалить из таблицы заказов:
		
		// При передаче тестового параметра (test) в URL выводит сообщение в методе store() вместо выполнения реального действия с таблицей:
		if (!$table->delete($order_id)) die("ОШИБКА удаления записи из таблицы заказов!<HR>".$table->getError());
		SFiles::deleteFilesRecords('o'.$order_id); //удалить записи файлов из таблицы #__webapps_files_names
		return true;
	}
	/**
	 * Получить список текущих компонентов
	 */
	function getComponentsNames(){
		$db=JFactory::getDBO();
		//в качестве альтернативы к нескольким процедурам РНР можно использовать обработку данных на сервере в виде ROUTINE or VIEW. 
		//VIEW:
/*DROP TEMPORARY TABLE IF EXISTS tbl_name0;

CREATE TEMPORARY TABLE `tbl_name0` 

SELECT dnior_webapps_site_options.id AS option_id, 
IF ( sites_types_ids_location,
	 sites_types_ids_location,
	 0 -- для корректной сортировки результатов внутри таблицы
   ) as `site types`,
   ( select name_ru FROM dnior_webapps_site_options_group 
	 WHERE site_options_ids 
	 REGEXP CONCAT('(^|,)',dnior_webapps_site_options.id,'(,|$)')
   ) as `name_ru`, 
dnior_webapps_site_options.name_ru AS `option` 
    FROM dnior_webapps_site_options 
    LEFT JOIN dnior_webapps_site_options_partial 
    ON dnior_webapps_site_options_partial.site_option_id = dnior_webapps_site_options.id
 WHERE dnior_webapps_site_options.name_ru <> 'Дополнительно' 
    AND dnior_webapps_site_options.id NOT IN (
        SELECT dnior_webapps_site_options.id 
  FROM dnior_webapps_site_options, 
       dnior_webapps_site_types, 
       dnior_webapps_site_options_partial
 WHERE dnior_webapps_site_types.name_en = 'WebShop'
   AND dnior_webapps_site_options_partial.id = dnior_webapps_site_options_partial.sites_types_ids_location
   AND dnior_webapps_site_options.id IN (
			SELECT site_option_id 
			FROM dnior_webapps_site_options_partial
			WHERE sites_types_ids_location = (
				SELECT id 
				FROM dnior_webapps_site_types 
				WHERE name_en = 'WebShop'
			)
		)
    ) ORDER BY `option` ASC;

DROP TEMPORARY TABLE IF EXISTS tbl_name1 ;

CREATE TEMPORARY TABLE `tbl_name1` 
 SELECT * FROM tbl_name0 where name_ru IS NULL
 UNION
 SELECT 0 as option_id, 0 as site_types, 0 as name_ru, `name_ru` AS `option` FROM dnior_webapps_site_options_group GROUP BY site_options_ids;

SELECT option_id, `option` AS `component` FROM tbl_name1 ORDER BY `option`*/		
		
		//получить id id опций в группах, чтобы исключить их из списка и показывать вместо них заголовки групп
		//платежи онлайн, виджеты:
		$db->setQuery('SELECT site_options_ids FROM #__webapps_site_options_group');
		$opts=implode(',',$db->loadResultArray());
		//1,3,5,8
		//2,9,6
		//опции интернет-магазина:	
		$query="SELECT #__webapps_site_options.id 
  FROM #__webapps_site_options, 
       #__webapps_site_types, 
       #__webapps_site_options_partial
 WHERE #__webapps_site_types.name_en = 'WebShop'
   AND #__webapps_site_options_partial.id = #__webapps_site_options_partial.sites_types_ids_location
   AND #__webapps_site_options.id IN (
        SELECT site_option_id 
		FROM #__webapps_site_options_partial
        WHERE sites_types_ids_location = (
            SELECT id 
			FROM #__webapps_site_types 
            WHERE name_en = 'WebShop'
        )
    )";		
		$db->setQuery($query);
		$opts2=implode(',',$db->loadResultArray());
		//объединить исключаемые опции:
		if ($opts&&$opts2) $opts.=','.$opts2;
		else $opts=($opts2)? $opts2:$opts2;
		if ($opts){
			//получить оставшиеся:
			$query='SELECT id, name_ru FROM #__webapps_site_options
	WHERE option_stat = 1 AND id NOT IN ('.$opts.')';
			$db->setQuery($query);
			$arrOptions=$db->loadAssocList();
		} 
		$db->setQuery('SELECT id AS group_id, name_ru FROM #__webapps_site_options_group');
		$groups=$db->loadAssocList();
		if (!is_array($arrOptions)) $arrOptions=$groups;
		else $arrOptions=array_merge($arrOptions,$groups);
		return $arrOptions; 
	}
	/**
	 * получим заказы зарегистрированного юзера (все данные):
	 * user, customer, precustomer, orders
	 */
	function getCustomerOrders($user = false, $db = false, $order_id = false){
		if (!$user) $user = JFactory::getUser(); //var_dump("<h1>user:</h1><pre>",$user,"</pre>"); //die();
		if ($order_id) {
			$where="#__webapps_customer_orders.id = ".$order_id;
		}else{
			if ($user->get('guest')!=1) {
				$where="customer_id = ".$user->get('id');
			}else{
				$where="`email` = '".$user->get('email')."' OR session_id = '".session_id()."'"; 
			}		
			$where.="
ORDER BY #__webapps_customer_orders.id DESC";	
		}
		$query="SELECT ".$this->default_table.".id, 
       components_names,
       files_names,
       description,
       budget,
       finish_date
       FROM ".$this->default_table;
		if ($user->get('guest')==1){
			$query.="
  JOIN #__webapps_precustomers
    ON orders_ids REGEXP CONCAT('(^|,)',".$this->default_table.".id,'(,|$)')";
		}
		$query.="  
  LEFT JOIN #__webapps_files_names 
  ON ( 
        dnior_webapps_files_names.identifier = CONCAT('o',dnior_webapps_customer_orders.id)  
        OR
        dnior_webapps_files_names.identifier = CONCAT('s',dnior_webapps_customer_orders.id)  
    )
 WHERE ".$where;
		if (!$db) $db = JFactory::getDBO();
		$db->setQuery($query);  // SDebug::dOutput("query= $query",false,true); //die('getPrecustomerSet');
		$rows=$db->loadAssocList();
		for($i=0,$j=count($rows);$i<$j;$i++) {
			if ($components_names=$rows[$i]['components_names']) {
				$query_opt="SELECT id, name_ru FROM #__webapps_site_options WHERE name_ru IN ('".str_replace('|',"','",$components_names)."')";
				$db->setQuery($query_opt);
				$components=$db->loadAssocList();
				$rows[$i]['components_names']=$components;
			}
			if ($file_name=$rows[$i]['files_names']) {
				$filenames=explode(":",$file_name); //convert to array
				$rows[$i]['files_names']=$filenames;
			} // SDebug::showDebugContent($rows,'rows');
		}
		return (empty($rows))? false:$rows;
	}
	/**
	 * получить id id ЗАКАЗОВ заказчика/предзаказчика
	 * user, orders
	 */
	/*function getUserOrdersIds($user = false, $db = false){
		if (!$user) $user = JFactory::getUser();
		if (!$this->orders_ids_array) {
			if ($user->get('guest')==1){ //returns string
				return SCollection::getPrecustomerSet( 'orders_ids', 
														$user,
														true
													  );
			}else{ //returns string
				return SCollection::getUserSet('orders_ids',$user->get('id'));
			}
		}
		return $model->orders_ids_string;
	}*/
	/**
	 * размещение/обновление заказа на выполнение отдельного компонента/(ов)
	 	см. /_docs/схемы.xlsx!Работа с файлами заказчиков
	 * model, orders
	 */
	function makeOrder($model,$current_order_id=false,$user=false){
		$table = JTable::getInstance('customer_orders', 'Collector1Table'); //создаём запись о новом заказе
		$table->reset();
		if (!$user){ 
			$user = JFactory::getUser();
			if($user->get('guest')!=1) $table->set('customer_id', $user->get('id'));//юзер заавторизован
		} //die('110');
		$arrPost=JRequest::get('post');
		$arrComponentsNames=array();
		foreach ($arrPost as $key=>$component_name){
			if (strstr($key,"component_")) $arrComponentsNames[]=$component_name;
		}
		//имена компонентов:
		if (!empty($arrComponentsNames))
			$table->set('components_names', implode('|',$arrComponentsNames));
		
		$table->set('description', JRequest::getVar('order_description'));
		$table->set('budget', JRequest::getVar('budget'));
		$table->set('finish_date', JRequest::getVar('finish_date'));
		$table->set('ordering', $table-> getNextOrder()); //die('current_order_id='.$current_order_id);
		if ($current_order_id){ //если обновляем
			if (!$table->load($current_order_id)) {
				JMail::sendErrorMess($table->getError()," (\$table->load())");
			}else{ //обновить запись в таблице заказов
				SErrors::afterTableUpdate( $table/*,
										   true, //если передаём true, пропускаем проверку $table->load($id) внутри
										   $current_order_id*/
										 );
			}
		}else{ //добавить запись в таблицу заказов
			SErrors::afterTable($table);
		}//die('136');
		$new_order_record_id=SData::getLastId(SCollection::getDefaultTable(true)); //получить id последней записи из таблицы заказов	
		$customer_status=SUser::handleUserData(JFactory::getUser());//назначить данные/получить статус юзера
		/**
		 * обработка данных таблицы предзаказчиков
		 */
		if ( $customer_status=="precustomer" || //предзаказчик, - будем обновлять данные в таблице
			 $customer_status=="unknown" 		//неизвестен, - будем добавлять данные в таблицу
		   ) {
			//установить id актуальной записи в таблице предзаказчиков для проверки:
				//последней добавленной в неё 
			//получить id записи в таблице предзаказчика, чтобы передать далее для обновления таблицы:   
			
			//if ($customer_status=="precustomer"){ //предзаказчик
				//$precustomer_table_id=SCollection::getPrecustomerRowID($user);
			//}
			SUser::handlePrecustomersTable( //добавить запись в таблицу предзаказчиков 
						$customer_status,//precustomer/unknown
						$new_order_record_id, //новая запись в таблице заказов
						'orders_ids',//Коллекция или Заказ
						$arrPost, //массив POST
						'add',//добавить (или обновить) к набору коллекций/заказов или удалить из него
						$user
					  );
		} //echo "<h4>afterTable START</h4>"; //die('141');
		SErrors::afterTable($table); //customer_orders
		SFiles::handleFilesUploading('o',$new_order_record_id); //die();
		return true;
	}
}
