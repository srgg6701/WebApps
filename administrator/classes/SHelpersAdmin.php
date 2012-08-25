<?
// no direct access
defined('_JEXEC') or die;

/**
 * @package com_collector1
 * @subpackage Admin Classes 
 * @since 2.5
 */

require_once JPATH_ADMINISTRATOR.DS.'modules'.DS.'mod_submenu'.DS.'helper.php';

class SAdminMenuHelper extends modSubmenuHelper{
	protected static $link_postfix="&tabletype=base";
	/**
	 * Получить список разделов, выносимых в субменю в выпадающем списке
	 */
	function getSubMenu(){
		$query="SELECT `menu_text`, `link` FROM #__menu, #__webapps_backend_submenu_list
 WHERE menu_id = #__menu.id AND `hidden` = 0";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		$arrSubListMenu=$db->loadAssocList();
		$arrForList=array();
		for($i=0,$j=count($arrSubListMenu);$i<$j;$i++) {
			$arrForList[$arrSubListMenu[$i]['menu_text']]=$arrSubListMenu[$i]['link'];
		}
		$arrParentItems=parent::getItems();
		for($i=0,$j=count($arrParentItems);$i<$j;$i++) {	
			// если меню есть в списке для drop-down listing'а, модифицируем его
			if (in_array($arrParentItems[$i][1],$arrForList)) { 
				$arrParentItems[$i][1].=self::$link_postfix;
			}
		}
		return array('parent_list'=>$arrParentItems,'drop_down_list'=>$arrForList);
	}
	/**
	 * Сформировать список перехода к сообщениям по направлениям
	 */
	function makeMailFoldersList(){
		return array( 'all'=>'Все сообщения',
					  'inbox'=>'Входящие',
					  'outbox'=>'Отправленные',
					  'drafts'=>'Черновики',
					  'trash'=>'Корзина'
					);		
	}
	/**
	 * Сформировать список перехода к редактированию базовых таблиц
	 */
	function buildTablesDropDownList($list_options){?>
<div align="right" style="float:right; width:23%; font-size:12px; margin:3px 12px 0 0px;">
	<select name="view" style="margin:0;" onChange="goTable(this.options[this.selectedIndex].value);">
    	<option value="0">-Выберите базовую таблицу-</option>
<?	foreach ($list_options as $text=>$link):?>
		<option value="<?=$link.self::$link_postfix?>"><?=$text?></option>
<?	endforeach;?>
	</select>
</div>   
<script type="text/javascript">
function goTable(goLink){
	location.href=goLink;
}
</script>
<?	}
}
?>