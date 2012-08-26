<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Administrator
 * @subpackage	mod_submenu
 * @since		1.6
 */
abstract class modSubmenuHelper
{
	/**
	 * Get the member items of the submenu.
	 *
	 * @return	mixed	An arry of menu items, or false on error.
	 */
	public static function getItems()
	{
		// Initialise variables.
		$menu = JToolBar::getInstance('submenu'); 
		$list = $menu->getItems();
		if (!is_array($list) || !count($list)) {
			return false;
		}
		return $list;
	}
	function buildMailSubmodule($view){
		$direct=JRequest::getVar('direct');?>
    	  <li><a style="cursor:default; text-decoration:none;"<? 
		  if($view=='_messages'){?> class="active"<? }?>>Сообщения: <select name="mail_direct" onChange="return go_messages(this);">
    	    <option value=""<? if(!$direct){?> selected<? }?>>-Выберите папку-</option>
	<?	$mailFolders=SAdminMenuHelper::makeMailFoldersList();
		foreach($mailFolders as $value=>$text) {?>
    	    <option value="<?=$value?>"<? if($direct==$value){?> selected<? }?>><?=$text?></option>
	<? }?>
    	  </select></a></li>
          <script type="text/javascript">
function go_messages(sel){
  try{
	  var go_location=sel.options[sel.selectedIndex].value;
	  if (go_location) location.href='<?=JUri::root()?>administrator/index.php?option=com_collector1&view=_messages&direct='+go_location;
	  //alert();
  }catch(e){
	  alert(e.message);
  }
  return false;
}
</script>
<? }
}
