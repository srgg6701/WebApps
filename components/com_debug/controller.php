<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/
 
// No direct access
defined('_JEXEC') or die;
//методы для работы с коллекциями также представлены в administrator/classes/SCollection.php
class DebugController extends JController
{
	function __construct(){
		parent::__construct();
		//$contacts=SCollection::getPrecustomerContactData();
		
		/*$db	= JFactory::getDBO();
		//добавить доп. контактные данные в таблицу заказчиков:
		$query="SELECT `phone`, `skype` FROM #__webapps_precustomers 
 WHERE `email` = 'froud@crime.ru' 
    OR `session_id` ='45466'";
		$db->setQuery($query); echo "<div>query: <hr><pre>".$query."</pre></div>";
		var_dump("<h1>array:</h1><pre>",$db->loadAssoc(),"</pre>");*/
		
		//$view=&$this->getView(JRequest::getVar( 'view', 'Debug' ), 'html' );
		//$view->setLayout( 'layout', 'default' );
		//$view->display();
		//$this->display();
	}
	/*function display($tpl=NULL)
	{	
		parent::display(); //отображает default view
	}*/
}