<?php
/**
 * @version     2.1.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */


// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
// Import CSS
$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_collector1/assets/css/collector1.css');
SDebug::showDebugContent($this,'this');
$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_collector1');
$saveOrder	= $listOrder == 'a.ordering';?>
<form action="<?php echo JRoute::_('index.php?option=com_collector1&view=_messages'); ?>" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar" style="padding-bottom:0;">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
			<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
	</fieldset>
</form>
<style>
table#tblMess tr[id] td {/* по умолчанию (т.е., - тема) */
	height:16px;
	overflow:hidden;
	white-space:nowrap;
	max-width:272px;
	font-size:1.1em;
}
table#tblMess tr[id] > td:first-child {
	text-align:right;
}
table#tblMess tr[id] > td:first-child +td { /* создано */
	/*background:#CCFF99;*/
	max-width:59px;
}
table#tblMess tr[id] > td:first-child +td +td { /* от кого */
	/*background: #FCF;*/
	max-width:50px;
	text-align:center;
}
table#tblMess tr[id] > td:first-child +td +td +td{ /* прочтено */
	/*background: #FF9;*/
	max-width:90px;
}
textarea#message{ 
	width:97%;
	margin-bottom:8px;
}
table#messagesBlockTable{
	margin-top:-9px; 
	margin-left:2px;
}
table#messagesBlockTable td#messagesBlockTD label{
	display:block;
}
table#messagesBlockTable fieldset{
	margin-left:0px;
}
table#messagesBlockTable fieldset input[type="checkbox"]{
	margin-bottom:0px;
	margin-top:2px;
}
</style>
<table id="messagesBlockTable" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" nowrap class="padding10" bgcolor="#FFF" id="messagesBlockTD">
    <h4 style="margin:0;"><img src="<?=JUri::root()?>administrator/templates/bluestork/images/menu/filter.gif" width="16" height="16" align="absmiddle" class="marginRight4">Отфильтровать</h4>
    <div style="padding:5px;"></div>
      <fieldset>
      	<legend>Непрочтённые:</legend>
      <label>
      	<input type="checkbox" name="unread_me" id="unread_me"> мной
      </label>
      <label>
      	<input type="checkbox" name="unread_coworkers" id="unread_coworkers"> сотрудниками
      </label>
      <label>
      	<input type="checkbox" name="unread_customers" id="unread_customers"> клиентами
      </label>
      </fieldset>
      <button>Применить</button>
      </td>
    <td width="100%">
    <div style="margin-top:-7px;" class="paddingLeft10">
		<?	// извлечь данные сообщений:
	$arrMessages=$this->_messages;?>
<div class="widthMax50" style="display:inline-block; vertical-align:top;">
<? 
$view=JRequest::getVar('view');
$direct=JRequest::getVar('direct');
require_once JPATH_COMPONENT.DS.'helpers'.DS.'messages'.DS.'table.php';?>
</div>
<div class="width-50" style="display:inline-block;">
  <div style="margin-left:10px;">	
<?	// id id:
	$collections_ids_array=SStuff::getCurrentSetArray('collections_ids'); 
	// id, названия компонентов:
	$orders=SStuff::getCurrentSetArray('orders_ids');
	require_once JPATH_COMPONENT.DS.'helpers'.DS.'mess_object.php'; 
	require_once JPATH_COMPONENT.DS.'helpers'.DS.'messages'.DS.'form.php';?>
  </div>  
</div>
<?	require_once JPATH_SITE.DS.'includes'.DS.'internal_mail_js.php';?>
	</div>
</td>
  </tr>
</table>