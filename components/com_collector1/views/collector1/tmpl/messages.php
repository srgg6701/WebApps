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
<?	//
	$collections_ids_array=$this->collections_ids_array; 
	//
	$orders=SData::getUserOrders($user);
	require_once JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'helpers'.DS.'mess_object.php';?>
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