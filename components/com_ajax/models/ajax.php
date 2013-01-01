<?
defined('_JEXEC') or die;
class AjaxModelAjax extends JModel
{	
	/**
	 * Удаляет файлы
	 */
	function delete_file($file_id){
		if($table = JTable::getInstance('files_names', 'Collector1Table')){
			$arrfile=explode(".",$file_id);
			// array ('s25',2,'doc')
			// delete first symbol (s/o)
			$object_id=(int)substr($arrfile[0],1); //echo "object_id= $object_id<br>";
			// 25
			$file_number=(int)$arrfile[1]; //echo "file_number= $file_number<br>";
			// 2
			$query_files="SELECT id, files_names FROM #__webapps_files_names WHERE SUBSTR(identifier,2) =".$object_id; // 25
			$db=JFactory::getDBO();
			$db->setQuery($query_files);
			$row=$db->loadRow(); //var_dump("<h1>row:</h1><pre>",$row,"</pre>");
			// if nubers of files > 1:
			if (strstr($row[1],":")) {
				// $row[1] = 25.2. My file name.doc:25.3. Your file.xlsx
				$file_name_whole_string=explode(":",$row[1]); 
				// array('2. My file name.doc','3. Your file.xlsx')
				for($i=0,$j=count($file_name_whole_string);$i<$j;$i++) {
					$parsedFileNameArray=explode(".",$file_name_whole_string[$i]);
					//array('2',',My file name','doc')
					// compare contents: $arrfile / $parsedFileNameArray
					if ( (int)$parsedFileNameArray[0]==$file_number 				// int 2
						 && array_pop($parsedFileNameArray)==array_pop($arrfile)	// string doc
					   ) {
						// cut the file name from the field to update record:
						unset($file_name_whole_string[$i]);
					}
				}
				// prepare string to update the record in the table:
				$files_names_set=implode(":",$file_name_whole_string); //echo "<div>files_names_set= $files_names_set</div>";
				//update:
				if ($table->load($row[0])) {
					$table->set('files_names',$files_names_set);
					if ($table->check()) { //var_dump("<h1>table:</h1><pre>",$table,"</pre>");
						if(!$table->store(true)) {
							echo 'ОШИБКА: Не сохранено<hr>';
							die ($table->getError());
						}
					}
				}else{
					echo 'ОШИБКА: Не загружено<hr>';
					die ($table->getError());
				}
			}elseif (!$table->delete($row[0])){ //delete the record at all
				echo 'ОШИБКА: Не удалено<hr>';
				die($table->getError());
			}
			//удалить файл физически:
			// pattern: [s/o]object_id.file_id.extension
			if (!unlink(JPATH_BASE.DS.'components'.DS.'com_collector1'.DS.'files'.DS.$file_id)) die('ОШИБКА: Файл не удалён!');
		echo 1;
		}
	}
	/**
	 * Удаляет компонент из набора заказа
	 */
	function delete_component($component_id){
		if($table = JTable::getInstance('customer_orders', 'Collector1Table')){
			$arr_component=explode(".",$component_id); 
			// array ('s25',2,'doc')
			// delete first symbol (s/o)
			$order_id=(int)$arr_component[0]; 
			// 25
			$component_index=(int)$arr_component[1]; //echo "component_index= $component_index<br>";
			// 2
			$query_files="SELECT components_names FROM dnior_webapps_customer_orders WHERE id = ".$order_id; // 25
			$db=JFactory::getDBO();
			$db->setQuery($query_files);
			// get components set:
			$components_set=$db->loadResult(); //var_dump("<h1>components_set:</h1><pre>",$components_set,"</pre>");
			// if nubers of files > 1:
			if (strstr($components_set,"|")) {
				// 
				$arr_components=explode("|",$components_set); 
				unset($arr_components[$component_index-1]); // т.к. для наглядности передаём номер компонента, начиная с 1, а не с 0
				//update:
				if ($table->load($order_id)) {
					$table->set('components_names',implode("|",$arr_components));
					if ($table->check()) { //var_dump("<h1>table:</h1><pre>",$table,"</pre>");
						if(!$table->store(true)) {
							echo 'ОШИБКА: Не сохранено<hr>';
							die ($table->getError());
						}
					}
				}else{
					echo 'ОШИБКА: Не загружено<hr>';
					die ($table->getError());
				}
			}	echo 1;
		}
	}
	/**
	 * Удалить сообщение
	 * @ user, customer, precustomer
	 */
	function deleteMessage($id) {
		$table=JTable::getInstance('messages', 'Collector1Table');
		//$test=true;
		if (JRequest::getVar('w')) echo "<div class=''>id to delete: ".$id."</div>";
		elseif (!$table->delete($id)) echo "Ошибка удаления записи из *messages_read";
		exit;
	}	
	/**
	 * удалить из таблицы прочтённых
	 * @ user, message
	 */
	function dropReadMessage($message_id){
		$table=JTable::getInstance('messages_read', 'Collector1Table');
		$messages=SUser::getMessages( false,
					  false,
					  false,
					  false,
					  " message_id = ".$message_id,
					  false,
					  '#__webapps_messages_read.id'
					); 
		$id=$messages[0]['id'];
		if ($take_test=JRequest::getVar('take_test')) {
			var_dump("<h1>messages:</h1><pre>",$messages,"</pre>");
			echo "<div class=''>id = $id</div>"; 
			echo "<div class=''>dropReadMessage</div>"; 
		}
		if (!$take_test||JRequest::getVar('do')){
			echo(!$table->delete($id))? 
				 "Ошибка удаления записи из *messages_read (id = $id)":
				 "не прочтено";
		}
	}
	/**
	 * Получить контактные данные
	 * @ user, customer, precustomer
	 */
	function findContactData($email,$table='webapps_precustomers') {
		$query="SELECT `name`, `phone`, `skype` FROM #__".$table." WHERE `email` = '$email'";
		$db = JFactory::getDBO(); //echo "<div class=''>query= ".$query."</div>";
		$db->setQuery($query);
		$data=$db->loadRow(); 
		echo implode("|",$data);
	}
	/**
	 * Получить текст сообщения и пометить его как прочтённое
	 * @ user, customer, precustomer, message, content
	 */
	function getMessage(){
		$arrMessage=array();
		$message_id=(int)JRequest::getVar('object_id');
		$arrMessage['message']=SUser::getMessage($message_id); 
		if (JRequest::getVar('take_test')) 
			var_dump("\narrMessage:\n",$arrMessage);
		$user_id_read=(int)JRequest::getVar('user_id_read');
		// добавить к прочтённым:
		if (!SUser::checkMessageReadStatus($user_id_read,$message_id))
			$this->setMessRead($message_id,$user_id_read);
		$arrMessage['date']=date("Y-m-d H:i:s");
		echo json_encode($arrMessage);
		exit;
	}	
	/**
	 * @ user, customer, precustomer, message, contacts
	 */
	function sendMessage(){
		//var_dump(JRequest::get('post'));die();
		$arrFields=array('order_id','collection_id','subject','message','user_id_from','user_id_to');
		foreach($arrFields as $i=>$value)
			${$arrFields[$i]}=JRequest::getVar($value);
		
		if ($ObjectType=JRequest::getVar('pickupObjectType')){
			// $ObjectType also may be "none"!
			if ($ObjectType=='site') 
				$obj_identifier=JRequest::getVar('collections_ids_array'); // передаёт "s"
			elseif ($ObjectType=='components') 
				$obj_identifier=JRequest::getVar('component'); // передаёт "o"
		}else{ // неизвестно, используется или нет
			if ($objid=$order_id){
				$objtype='o';
			}elseif($objid=$collection_id){
				$objtype='s';
			}
			$obj_identifier=$objtype.$objid;
		}
		$table = JTable::getInstance('messages', 'Collector1Table');
		
		$arrData=array( 'user_id_from'=>$user_id_from,
						'user_id_to'=>$user_id_to,
						'date_time'=>date('Y-m-d H:i:s'),
						'subject'=>$subject,
						'message'=>$message,
						'obj_identifier'=>$obj_identifier
					  );		
		foreach ($arrData as $field => $value){
			$table->set($field,$value);
		}
		// получить id добавленной записи
		// 
		if ($take_test=JRequest::getVar('take_test')){ 
			var_dump("sendMessage, line: ".__LINE__."\n\narrData:</h1><pre>",$arrData,"</pre>");
		}
		if (!$take_test||JRequest::getVar('do')){
			SErrors::afterTableUpdate($table);
			$data=array( // вернуть клиентскому скрипту:
					'id'=>SData::getLastId('#__webapps_messages'),
					'date_time'=>$arrData['date_time'],
					'subject'=>$arrData['subject'],
					'message'=>$arrData['message'],
				);
			// добавить к прочтённым:
			$this->setMessRead($data['id'],$user_id_from); 
			// разместить файлы (если были):
			if ($_FILES){
				// получить № последнего приаттаченного файла:
				$files_number_start=SFiles::getLastAttachNumber(true);
				$file_names='';
				$cnt=0;
				foreach ($_FILES as $field_name=>$file_data){
					if ( key($file_data)=='name' 
						 && $file_data['name'] //файл размещён в поле заказчки
						 && $file_data['size']>0
				   ) {
						$filename=$file_data['name'];
						SFiles::uploadFiles( // filename field: 
										$field_name, 
									   	// saved file path:
									   	JPATH_BASE.DS.'components'.DS.'com_collector1'.DS.'attaches'.DS.$files_number_start.substr($filename,strrpos($filename,"."))
									 );
					}
					if ($cnt)
						$file_names.=':';
					$file_names.=$files_number_start.".".$filename;
					$files_number_start++; 	// may be initializeb not by 0
					$cnt++;					// initializeb not by 0
				}
				if (!SFiles::addAttachesToTable($data['id'],$file_names))
					JMail::sendErrorMess('Файлы: $file_names, id сообщения: $message_id','Не добавлены файлы в таблицу аттачментов');
				$data['file_names']=$file_names;
			}
		}
		echo json_encode($data);
		exit;
	}
	/**
	 * Переключить статус сообщения
	 * @ user, customer, precustomer
	 */
	function setMessRead($message_id,$user_id,$show_date=false){
		//создаём запись...:
		$table = JTable::getInstance('messages_read', 'Collector1Table');
		$table->reset();
		$table->set('message_id', $message_id);
		$table->set('user_id', $user_id);
		$table->set('date_time', date("Y-m-d H:i:s"));
		if ($take_test=JRequest::getVar('take_test')) { // протестировать
			$message['message_id']=$message_id;
			$message['user_id']=$user_id;
			$message['date_time']=date("Y-m-d H:i:s");
			var_dump("<pre>","message (setMessRead):\n",$message,"</pre>");
		}
		if (!$take_test||JRequest::getVar('do'))
			SErrors::afterTable($table);
		if ($show_date) 
			echo date("d.m.Y H:i:s");
	}
	/**
	 * Переключить статус сообщения
	 * @ user, customer, precustomer
	 */
	function switchMessageReadStatus(){ 
		$user_id=(int)JRequest::getVar('user_id');
		$message_id=(int)JRequest::getVar('object_id');
		if(SUser::checkMessageReadStatus($user_id,$message_id)) { // если есть в таблице прочтённых - удалить оттуда
			$this->dropReadMessage($message_id);
		}else{ // добавить в таблицу прочтённых
			$this->setMessRead($message_id,$user_id,true);
		}
		exit;
	}	
	/**
	 * Обновить контактные данные
	 * @ user, customer, precustomer
	 */
	function updateContactData( $arrData, // id, field, value
								$table='precustomers'
							  ) {
		$table = JTable::getInstance($table, 'Collector1Table');
		if (!$table->load($arrData['id'])) {
			JMail::sendErrorMess($table->getError()," (\$table->load())");
			return false;
		}else{
			$table->set($arrData['field'], $arrData['value']); 
			if (JRequest::getVar('w')) echo "<div>Обновить запись (afterTableUpdate)</div>";
			//обновить запись:
			SErrors::afterTableUpdate($table);
		}
	}
}?>