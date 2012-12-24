<style>
<?	$css=true;
	if ($css){?>
#message_header{
	padding-left:6px;
}
table#tblMess tr[id] td {
	font-size:0.9em;
	overflow:hidden;
	white-space:nowrap;
}
table#tblMess tr[id] > td:first-child {
	text-align:right;
}
table#tblMess tr[id] > td:first-child +td +td {
	max-width:70px;
}
table#tblMess tr[id] > td:first-child +td +td +td{
	max-width:100px;
}
table#tblMess tr[id] > td:first-child +td +td +td +td{
	max-width:70px;
}
table#tblMess tr[id] > td:first-child +td +td +td +td +td{
	max-width:628px;
}
textarea#message{
	width:97%;
	margin-bottom:8px;
}
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
$mess_path=JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'helpers'.DS.'messages'.DS;
$arrMessages=$this->messages; 
SDebug::showDebugContent($arrMessages,'arrMessages');?>
<div style="clear:both;margin-top:10px;"></div>
<div>
<? require_once $mess_path.'table.php';?>
</div>
<div style="display:inline-block;">
<? require_once $mess_path.'form.php';?>
</div>
<?	require_once JPATH_SITE.DS.'includes'.DS.'internal_mail_js.php'; ?>