<?
/**
 * Процедуры для получения объектов сайта в дополнение к стандартным
 * @package com_collector1
 * @subpackage Admin Classes 
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class SSite{
	/**
	 *получить имя текущего шаблона
	 */
	function getCurrentTemplateName($app=false) {
		if (!$app) $app = JFactory::getApplication();
		$templateparams=(array)$app->getTemplate(true);
		return $templateparams['template'];
	}
	/**
	 * Получить путь к директроии картинок для шаблона
	 */
	function getImagesPath(){
		return JURI::base(true).'/templates/'.self::getCurrentTemplateName().'/images/';
	}
}
?>