<link href="<?=JUri::root()?>templates/fastwebdev/css/messages.css" type="text/css" rel="stylesheet">
<?php
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
defined('_JEXEC') or die; 
if (JRequest::getVar('this'))
	SDebug::showDebugContent($this,'this');
$mess_path=JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'helpers'.DS.'messages'.DS;
$arrMessages=$this->messages; // выводит список, ограниченный установкой
//SDebug::showDebugContent($arrMessages,'arrMessages');?>
<div style="clear:both;margin-top:10px;"></div>
<div>
<? require_once $mess_path.'table.php';?>
</div>
<form action="<?=JUri::root()?>index.php?option=com_ajax" id="send_message_form" method="post" enctype="multipart/form-data" style="margin:0;">
<div class="paddingLeft10 paddingRight10" id="pickup_obj" style="display:<?="none"?>; vertical-align:top;">
	<h4 class="marginBottom8">Выберите объект сообщения:</h4>
    <div id="attachObjects">
        <label>
          <input type="radio" name="pickupObjectType" value="site" id="pickupObjectType_sites" />
          Сайты</label>
          <div class="<?="hidden"?>" id="pickupObjectType_sites_obj"><?
	$collections_ids_array=$this->collections_ids_array; 
	// add 's' to id:
	function attachLetter($val){
		return 's'.$val;
	}
	$arrCollectionsLetters=array_map('attachLetter',$collections_ids_array);
	//SDebug::showDebugContent($collections_ids_array,'collections_ids_array');
	$selArray=array_combine($arrCollectionsLetters,$collections_ids_array);
	array_unshift($selArray,'-?-');
	echo JHTML::_('select.genericlist', $selArray, 'collections_ids_array');
		?></div>
        <br />
        <label>
          <input type="radio" name="pickupObjectType" value="components" id="pickupObjectType_components" /> Наборы компонентов
          </label>
          <div class="<?="hidden"?>" id="pickupObjectType_components_obj"><?		
	$orders=SData::getUserOrders($user);
		//SDebug::showDebugContent($orders,'orders');
	for($i=0,$j=count($orders);$i<$j;$i++){
		$order=$orders[$i];
		$cmp_name='<div>';	
		
		for($cmp=0,$vcmp=count($order['components_names']);$cmp<$vcmp;$cmp++)
			$cmp_name.="<div>".$order['components_names'][$cmp]['name_ru']."</div>"; 
		
		$cmp_name.="</div>
			<hr size='1' color='#CCC' style='clear:both'>";
		
		$option[]=JHTML::_( 'select.option', 'o'.$order['id'], $order['id'].'</br>'.$cmp_name);
	}
	$comps=JHTML::_('select.radiolist', 
				   	$option, 
				   	'component',	// name 
				   	' class=""', 
				   	'value', // $rvalues key - is value 
				   	'text',  // $rvalues value - is text 
				   	false,  // selected value by default
				   	false 
				   );
	// correct elements' ids:
	$comps=str_replace('id="componento','id="component',$comps);
	echo $comps;
		  ?></div>
        <br />
        <label>
          <input type="radio" name="pickupObjectType" value="none" id="pickupObjectType_none" />
          Без объекта</label>
        <br />
    </div>
</div>
<div class="messLoadedArea">
<? 	require_once $mess_path.'form.php';?>
</div>
<input name="object" type="hidden" value="message">
<input name="action" type="hidden" value="send">
<? 	if($get_layout):?>
<input name="<?=$get_layout?>_id" type="hidden" value="<?=$object_id?>">
<?	endif;?>
<input name="user_id_from" type="hidden" value="<?=$user_id?>">
<input name="user_id_to" type="hidden" value="<?=$user_id_to?>">
</form>