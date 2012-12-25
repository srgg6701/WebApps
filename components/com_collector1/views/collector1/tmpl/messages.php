<style>
<?	$css=true;
	if ($css){?>
label{
	margin:0;
	text-align:initial;
}
label > div{
	float: left;
	margin-top: -16px;
	padding-bottom:6px;
	padding-left: 60px;
}
#message_header{
	padding-left:6px;
}
table#tblMess 
	tr[id] 
		td:first-child {	/* Id */
	text-align:right;
}
table#tblMess 
	tr[id] 
		td:first-child	
			+td +td {	/* Created */
	max-width:70px;
}
table#tblMess 
	tr[id] 
		td:first-child	
			+td +td +td {	/* Sender */
	max-width:100px;
}
table#tblMess 
	tr[id] 
		td:first-child	
			+td +td +td +td { /* Read */
	max-width:70px;
}
table#tblMess 
	tr[id] 
		td:first-child	
			+td +td +td +td +td {	/* Attaches */
	/*	*/
}
table#tblMess 
	tr[id] 
		td:first-child	
			+td +td +td +td +td +td {	/* Subject */
	max-width:578px;
}
tr[id] td{
	font-size:0.9em;
	overflow:hidden;
	white-space:nowrap;
}
textarea#message{
	width:97%;
	margin-bottom:8px;
}
div.hidden{
	padding:10px;
}
/*div#messContent{
	display:inline-block;
}*/
<?	}?>
</style>
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
$arrMessages=$this->messages; 
// SDebug::showDebugContent($arrMessages,'arrMessages');?>
<div style="clear:both;margin-top:10px;"></div>
<div>
<? require_once $mess_path.'table.php';?>
</div>
<div class="paddingLeft10 paddingRight10" id="pickup_obj" style="display:<?="none"?>; vertical-align:top;">
	<h4 class="marginBottom8">Выберите объект сообщения:</h4>
    <div>
        <label>
          <input type="radio" name="pickupObjectType" value="site" id="pickupObjectType_sites" />
          Сайты</label>
          <div class="hidden" id="pickupObjectType_sites_obj"><?
	$collections_ids_array=$this->collections_ids_array; 
	//SDebug::showDebugContent($collections_ids_array,'collections_ids_array');
	echo JHTML::_('select.genericlist', array_combine($collections_ids_array,$collections_ids_array), 'collections_ids_array');
		?></div>
        <br />
        <label>
          <input type="radio" name="pickupObjectType" value="components" id="pickupObjectType_components" /> Наботы компонентов
          </label>
          <div class="hidden" id="pickupObjectType_components_obj"><?		
	$orders=SData::getUserOrders($user);
	SDebug::showDebugContent($orders,'orders');
	for($i=0,$j=count($orders);$i<$j;$i++){
		$order=$orders[$i];
		$cmp_name='<div>';	
		
		for($cmp=0,$vcmp=count($order['components_names']);$cmp<$vcmp;$cmp++)
			$cmp_name.="<div>".$order['components_names'][$cmp]['name_ru']."</div>"; 
		
		$cmp_name.="</div>
			<hr size='1' color='#CCC' style='clear:both'>";
		
		$option[]=JHTML::_( 'select.option', $order['id'], $order['id'].'</br>'.$cmp_name);
	}
	echo JHTML::_( 'select.radiolist', 
				   $option, 
				   'component',	// name 
				   ' class=""', 
				   'value', // $rvalues key - is value 
				   'text',  // $rvalues value - is text 
				   false,  // selected value by default
				   false 
				 );

		  ?></div>
        <br />
        <label>
          <input type="radio" name="pickupObjectType" value="none" id="pickupObjectType_none" />
          Без объекта</label>
        <br />
    </div>
</div>
<div class="paddingLeft10" style="display:inline-block;">
<? 	require_once $mess_path.'form.php';?>
</div>
<?	require_once JPATH_SITE.DS.'includes'.DS.'internal_mail_js.php'; ?>