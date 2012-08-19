<?php	
/**
 *
 * @package com_collector1
 * @subpackage Ajax
 */
// No direct access 
//методы для работы с коллекциями также представлены в administrator/classes/SCollection.php
class AjaxController extends JController
{
	function __construct(){
		parent::__construct();
		$object=JRequest::getVar('object');
		$action=JRequest::getVar('action');
		if ( $object
			 && $action
		   ) {
			$model=$this->getModel();
				
				switch ($object)  { 

					case "file": // процедуры с файлами:
						if ($file_id=JRequest::getVar('file_id')) {
							if ($action=="delete") $model->delete_file($file_id);
						}
					break;
			
					case "component": // если удаляем компонент:
						if ($component_id=JRequest::getVar('component_id')){
							if ($action=="delete") $model->delete_component($component_id);
						}
					break;
			
					case "order":
						if ($order_id=JRequest::getVar('order_id')){
							if ($action=="delete") {
								/**
								 * Удалить заказ, все записи, связанные с заказом, из таблицы файлов и все физические файлы
								 */
								$model=$this->getModel('orders','Collector1Model');
								$model->deleteOrder($order_id);
							}
						}
					break;
			
					case "contact_data":
						if ($action=="find"){
							$model->findContactData(JRequest::getVar('email')); // нативная модель
					}
					break;
					
					case "customer": case "precustomer":
						$user_id=(int)JRequest::getVar('user_id');
						$data_type=JRequest::getVar('data_type');
						$data_value=JRequest::getVar('data_value');
						//data_type: email, phone, skype
						//user_id
						if ($action=="update"){
							$model->updateContactData( array( 'id'=>$user_id,
							 								  'field'=>$data_type,
															  'value'=>$data_value
															), // id, field, value
													   $object.'s'
							  						 );
					}
					break;
					
					case "message":
						
						if ($action=="send"){
							$model->sendMessage();
						}
					break;
				}
		}
	}
}