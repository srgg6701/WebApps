<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
if ($_GET['TEST']) $t=$_GET['TEST'];
// Set flag that this is a parent file.
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);

if (file_exists(dirname(__FILE__) . '/defines.php')) {
	include_once dirname(__FILE__) . '/defines.php';
}

if (!defined('_JDEFINES')) {
	define('JPATH_BASE', dirname(__FILE__));
	require_once JPATH_BASE.'/includes/defines.php';
}

require_once JPATH_BASE.'/includes/framework.php';

// Mark afterLoad in the profiler.
JDEBUG ? $_PROFILER->mark('afterLoad') : null;

// Instantiate the application.
$app = JFactory::getApplication('site');

if ($t){
	function extractObjects($obj){
	
    	echo '<div style="position:absolute; padding:10px; z-index:3; overflow:auto;">';
		
		foreach ($obj as $key=>$val){
			echo '<div style="padding:8px; border: solid 1px #ccc; margin:4px; background:#FFC;">';

			if (is_array($val)) {

				echo '<div style="background: rose; margin: 4px; padding:2px">Array '.$key; 
				if (empty($val)) echo ': empty';
				else extractObjects($val);
				echo '</div>';
			
			}else {
				if (gettype($val)=='object'){
					$rObj=new ReflectionObject($val);
					echo '<div style="background: lightskyblue; margin: 4px; padding:2px; font-size:1.4em;">Object: '.$rObj->getName();
					//echo '<pre>';
					//echo $rObj->__toString();
					//echo '</pre>';
					echo '<pre>';
					var_dump($val);
					echo '</pre>';
					//extractObjects((array)$val);
					echo '</div>';
				}else{
					echo '<div style="padding: 8px; border: dashed 1px orange; margin-bottom:4px; background: #efefef;">['.$key.'] =>';
					var_dump($val);
					echo '</div>';
				}
			} echo '</div>';
		}
    	echo '</div>';
	}
	function showClasses(){
		$arrAllClasses=get_declared_classes();
		echo '<div style="position:absolute;top:0px;z-index:4;margin:4px;padding:4px; background:#f7f7f7;">USER\'S CLASSES:<hr>';
		for($i=0,$j=count($arrAllClasses);$i<$j;$i++){
			$class=new ReflectionClass($arrAllClasses[$i]);
			if ( $class->isUserDefined()){
				$arrStatic=array($class->getMethods(ReflectionMethod::IS_STATIC));
				$arrProtected=array($class->getMethods(ReflectionMethod::IS_PROTECTED));
				$arrPrivate=array($class->getMethods(ReflectionMethod::IS_PRIVATE));
				$arrAbstract=array($class->getMethods(ReflectionMethod::IS_ABSTRACT));
				$arrFinal=array($class->getMethods(ReflectionMethod::IS_FINAL));
				echo $arrAllClasses[$i].'<blockquote><pre style="font-size:1.4em;">';
				if ( empty($arrStatic) &&
					 empty($arrProtected) &&
					 empty($arrPrivate) &&
					 empty($arrAbstract) &&
					 empty($arrFinal)
					){ echo '!!!';
					$obj = $class->newInstance();
					var_dump($obj);
					//echo get_object_vars($obj); 
				}else {
					echo '<div>Can\'t make an instance of class'.$class->getName().'</div>';
				}
				echo '</pre></blockquote>';
			}
		}
		echo '</div>';
	}
}
// Выводит состав полученных объектов в тестовом режиме:
if ($t=='site')	extractObjects($app);
// Initialise the application.
$app->initialise();
if ($t=='init') showClasses();

// Mark afterIntialise in the profiler.
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;

// Route the application.
$app->route();
if ($t=='route') showClasses();

// Mark afterRoute in the profiler.
JDEBUG ? $_PROFILER->mark('afterRoute') : null;

// Dispatch the application.
$app->dispatch();
if ($t=='dispatch') showClasses();

// Mark afterDispatch in the profiler.
JDEBUG ? $_PROFILER->mark('afterDispatch') : null;

// Render the application.
$app->render();
if ($t=='render') showClasses();

// Mark afterRender in the profiler.
JDEBUG ? $_PROFILER->mark('afterRender') : null;

// Return the response.
echo $app;
