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
defined('_JEXEC') or die('Restricted access');
if (!$user) $user = JFactory::getUser();
if (!$this->templatename) $this->templatename=SSite::getCurrentTemplateName($app);
$collections_data_array=$this->collections_data_array; //SDebug::showDebugContent($collections_data_array,'collections_data_array');?>
<div class="item-page">
<style>
tr.site_id td{ 
	line-height:0; 
	visibility:hidden;
}
</style>
	<div class="collected-top">
<?	//если производили какие-либо действия - добавляли/изменяли/удаляли:
	$done=$this->done; 
	if (!empty($done)){
		if (is_array($collections_data_array)) {?>
    <div class="block_done" style="background:<?=$done[1]?>;">
    	<div>
    		<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->templatename 
	?>/images/signs/Flag_<?=$done[2]?>.png" width="24" height="24" hspace="6" align="baseline" style="margin-bottom:-2px;"><?=$done[0]?>
    	</div>
        <img src="<?=JUri::root()?>templates/fastwebdev/images/commands/delete.gif" width="13" height="13" id="close_issue" class="closeIssue" style="position:absolute; right:0; top:0; margin:4px; cursor:pointer;" title="Закрыть" onClick="parentNode.style.display='none';" />
    </div>
<?		}?>    
<?	}elseif ($user->get('guest')==1){ 
		$margin_minus='-';
		require_once JPATH_COMPONENT.DS.'helpers'.DS.'html'.DS.'go_register.php';
			/*?><h3 class="collected_head">Выбранные вами опции:</h3><? */
	}
	if (count($collections_data_array)) {?>
        <h3 class="collected_head">Текущие собранные сайты:</h3>
    <? 	//SDebug::showDebugContent($collections_data_array,'collections_data_array');
		$this->buildCollectionsTable($user);
	}else{?>
		<h3 class="collected_head">Сайтов нет</h3>
<? 	}?>
<div class="button-green" style="margin-left:6px;">
    <a href="<?=JRoute::_("index.php?option=com_collector1&view=collector1");//view не убирать!?>">Добавить сайт...</a>
</div>
<? 	if ($user->get('guest')==1) require_once JPATH_COMPONENT.DS.'helpers'.DS.'html'.DS.'go_register.php';?>
  </div>
</div>
