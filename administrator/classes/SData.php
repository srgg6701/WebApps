<?
/**
 * Класс для хранения данных локально, в качестве альтернативы БД
 * Подключён в /libraries/joomla/application/component/controller.php, иначе возникают глюки...
 * @package com_collector1
 * @subpackage Admin Classes 
 */
class SData{

	static $principal=array('phone'=>"(904)442-84-47",'position'=>'Директор','name'=>'Сергей','subname'=>'Владимирович','surname'=>'Клевцов','nick'=>'srgg01'); //1
	static $main_manager=array('phone'=>"(925)354-29-07",'position'=>'Зам.директора по работе с клиентами','name'=>'Ольга','subname'=>'Сергеевна','surname'=>'Аносова','nick'=>'o-anosova'); //2
	static $main_developer=array('phone'=>"(909)422-94-62",'position'=>'Зам.директора по продуктам','name'=>'Дмитрий','subname'=>'Игоревич','surname'=>'Фролов','nick'=>'d.i.frolov'); //3
	static $error_mail="error_webapps@2-all.com";
	
	static function getContactData($position,$first=false){
		$arrPositions=array( '1'=>self::$principal,
							 '2'=>self::$main_manager,
							 '3'=>self::$main_developer
		     			   );
		if (!$first) {
			$arrPositions[$position]['phone']="+7".$arrPositions[$position]['phone'];
		}
		return $arrPositions[$position];
	}
	/**
	 * Получим id последней коллекции или заказа:
	 */
	function getLastId($table_name,$db=false){
		//получить:
		$query="SELECT max(id) FROM $table_name";
		if (!$db) $db = JFactory::getDBO();
		$db->setQuery($query);
		$last_id=$db->loadResult();
		return (!$last_id)? false:$last_id;
	}	
}?>