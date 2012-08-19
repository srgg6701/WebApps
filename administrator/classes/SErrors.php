<?
/**
 * Вывод ошибок (для localhost) и отправка их по емэйлу на error_webapps@2-all.com для удалённого сервера
 * @package com_collector1
 * @subpackage Debug & Errors
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.mail.mail');

class SErrors{
	public static $trace;
	/**
	 * Добавить запись
	 */
	function afterTable($table) {
		// Check that the data is valid
		if (!$table->check()) {
			JMail::sendErrorMess($table->getError()," (\$table->check())");
		}
		// Store the data in the table
		if (!$table->store(true)) {
			JMail::sendErrorMess($table->getError()," (\$table->store())");
		}
		// Check the record in
		if (!$table->checkin()) {
			JMail::sendErrorMess($table->getError()," (\$table->checkin())");
		}
		return true;
	}
	/**
	 * Обновить запись в таблице
	 */
	function afterTableUpdate( $table,
							   $arr_data=false //если получили, будем извлекать данные запроса из массива, если нет - запрос уже установлен
							   //$id // id обновляемой записи
							 ) {
		$errSubj='Ошибка обновления таблицы';
		if (!$table) $err='$table';//if (!$id) $err='id';
		if (is_array($arr_data)&&empty($arr_data)) $err='arr_data (входящий массив $arr_data пуст)';
		if ($err) JMail::sendErrorMess('Не получено: '.$err,$errSubj);
		else{
			if (is_array($arr_data)) { //может быть true, в этом случае данные уже должны быть подготовлены
				/*if (!$table->load($id)) {
					$err=true;
				}else{*/	
				foreach($arr_data as $field=>$value) 
					$table->set($field,$value);//}
			}
			if ($table->check()) {
				// При передаче тестового параметра (test) в URL выводит сообщение в методе store() вместо выполнения реального действия с таблицей:
				if (!$table->store(true)) $err=true;
			}else $err=true;
		}
		if ($err) {
			JMail::sendErrorMess($table->getError(),$errSubj);
			return false;
		}
		return true;
	}
	/**
	 * Показать Debug Trace
	 */
	function showDebugTrace($val){ 
		//user debug mode:
		if (JRequest::getVar('view')=='app'){
			$style='padding:10px; border:dotted 1px;margin-top:2px; border-radius:6px;';?>
		<?	//
			if (is_array($val)||is_object($val)) { 
				if (is_object($val)){
					$rObj=new ReflectionObject($val);
					$tr='<div style="background:#CFF;'.$style.'">Object: <b>'.$rObj->getName().'</b><br>';
					self::$trace.=$tr;
					self::showDebugTrace((array)$val);	
					self::$trace.='</div>';
				}else{	
					$tr='<div style="'.$style.'background: #efefef;">Array:<br><div style="background:#FFFFFF;">';
					self::$trace.= $tr;
					foreach ($val as $k=>$v) {
						$ttr="<div style='$style'> [$k] =>";
						self::$trace.=$ttr;
						self::showDebugTrace($v);
						self::$trace.="</div>";
					}
					self::$trace.='</div>
					</div>';
				}
			}else{
				self::$trace.=$val;
			}			
		}else{
			ob_start();
			var_dump($val);
			$str=ob_get_contents();
			ob_end_clean();
			self::$trace='<h4>Object:</h4><pre>'.$str.'</pre>';
		}
		return true;
	}
}