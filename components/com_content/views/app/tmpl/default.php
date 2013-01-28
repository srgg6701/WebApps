<?php

/*Обращение к функциям через переменные
Вернуться к: Функции
PHP поддерживает концепцию переменных функций. Это означает, что если к имени переменной присоединены круглые скобки, PHP ищет функцию с тем же именем, что и результат вычисления переменной, и пытается ее выполнить. Эту возможность можно использовать для реализации обратных вызовов, таблиц функций и множества других вещей.
Переменные функции не будут работать с такими языковыми конструкциями как echo(), print(), unset(), isset(), empty(), include(), require() и другими подобными им операторами. Вам необходимо реализовывать свою функцию-обертку (wrapper) для того, чтобы приведенные выше конструкции могли работать с переменными функциями.
Пример #1 Работа с функциями посредством переменных
<?php
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '')
{
    echo "In bar(); argument was '$arg'.<br />\n";
}

// Функция-обертка для echo
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // Вызывает функцию foo()

$func = 'bar';
$func('test');  // Вызывает функцию bar()

$func = 'echoit';
$func('test');  // Вызывает функцию echoit()
?>
Вы также можете вызвать методы объекта, используя возможности PHP для работы с переменными функциями.
Пример #2 Обращение к методам класса посредством переменных
<?php
class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // Вызываем метод Bar()
    }
    
    function Bar()
    {
        echo "This is Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();  // Обращаемся к $foo->Variable()

?>
При вызове статических методов, вызов функции "сильнее" чем оператор доступа к статическому свойству:
Пример #3 Пример вызова переменного метода со статическим свойством
<?php
class Foo
{
    static $variable = 'static property';
    static function Variable()
    {
        echo 'Method Variable called';
    }
}

echo Foo::$variable; // Это выведет 'static property'. Переменная $variable будет разрешена в нужной области видимости.
$variable = "Variable";
Foo::$variable();  // Это вызовет $foo->Variable(), прочитав $variable из этой области видимости.

*/

/**
 * @version		$Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
//массив подключаемых файлов:
$arrPathReq=array('SData','SErrors','SFiles','SStuff','SSite','SUser');
for($i=0,$j=count($arrPathReq);$i<$j;$i++)
	require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.$arrPathReq[$i].'.php';

jimport('joomla.mail.mail');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');
jimport('joomla.application.component.view');
jimport('joomla.environment.browser');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'tables');


//$instance->set('foo', 'bar');
//$instance2 = AppClass::getInstance();
//echo '<hr>get foo: ' . $instance2->get('foo');


$session = JFactory::getSession();
$registry = JFactory::getConfig();
$user = JFactory::getUser();
$browser = JBrowser::getInstance();

if (JRequest::getVar('test')==1){?>
<div style="margin-left:10px;">
<h1>Test:</h1></div>
<div class="padding10 border_radius bgGrayEEE"><?


?></div>
<hr size="1" style="margin:20px 0;">
<?
}
//$customer_status=SUser::getPrecustomerStatus('andreas@pop.com',$user);
//echo "customer_status(".gettype($customer_status).")= $customer_status";



SDebug::showDebugContent($session,'session');
SDebug::showDebugContent($registry,'registry');
SDebug::showDebugContent($user,'user');
SDebug::showDebugContent($browser,'browser');

//$instance = AppClass::getInstance();
//SDebug::showDebugContent($instance,'instance');



if ($deb){
	$b='1';//кладёшь в переменную с именем b строку 1
	$a='b';//МЯ ПЕРЕМЕННОЙ b
	echo "ВЫРАЖЕНИЕ: \$b=1; \$a='b';";
	echo "<br>";
	echo "ИМЯ <b>ИСХОДНОЙ</b> ПЕРЕМЕННОЙ \$b ( echo \$a) =".$a;		// ИМЯ ПЕРЕМЕННОЙ - b
	echo "<br>";
	echo "ЗНАЧЕНИЕ <b>ИСХОДНОЙ</b> ПЕРЕМЕННОЙ \$b ( echo \$\$a) =".$$a;	// ЗНАЧЕНИЕ ПЕРЕМЕННОЙ - 1
}
?>
