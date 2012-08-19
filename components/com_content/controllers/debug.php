<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SDebug.php';
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 */
class ContentControllerDebug extends JController
{
	function ulist(){
		$list=$this->getModel('debug')->getUsersList();
		var_dump("<h1>methods:</h1><pre>",$list,"</pre>"); die();
	}
	function __construct(){
		parent::__construct();
		if(JRequest::getVar('task')=='extra_task') { //ДОЛЖНО БЫТЬ В КОНСТРУКТОРЕ
			$this->registerTask(JRequest::getVar('task'),'myMethod');
			$this->display();
		}
	}
	function display($tpl=NULL){

		SDebug::showDebugContent($this->methods,'methods');
		SDebug::showDebugContent($this->taskMap,'taskMap');

		$layout = JRequest::getVar('layout','test');
		$view = JRequest::getVar('view','app');
		$view  = $this->getView( $view, 'html' );
		/**
		 * получить ОБЪЕКТ Модели
		 */
		$model=$this->getModel('debug');
		//$model->temp();
		/**
		 * передать представлению ОБЪЕКТ Модели
		 */
		$view->setModel($model,true); 
		//var_dump("<h1>model:</h1><pre>",$model,"</pre>");
		/**
		 * передать представлению имя макета
		 */
		$view->setLayout($layout);
		/**
		 * загрузить определённое представление
		 */
		$view->display(); 
	}
	function myMethod(){
		SDebug::dOutput("myMethod::extra_task",false,'class="padding10"');
	}
	/**
	 * drop all about session including it id
	 */
	function _session_unset(){
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		session_unset();
		session_destroy();
		?><h5>Данные сессии удалены, включая её id.</h5><?	
	}
}