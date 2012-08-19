<? /**
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
$orders_of_user=$this->orders_of_user; //SDebug::showDebugContent($orders_of_user,'orders_of_user');?>
<style>
div.comps{
	background: #FFE3AA;
	 padding:3px 6px; 
	 border-radius:4px;
}
div.comps > div{
	white-space:nowrap;
}
</style>
<div class="item-page">
<? 	
if (!$user) $user = JFactory::getUser();?>
<h2 style="margin:0 0 10px 10px;">Лист заказов</h2>
<? //var_dump("<h1>user:</h1><pre>",$user,"</pre>");
if ($user->get('guest')==1) {
	require_once JPATH_COMPONENT.DS.'helpers'.DS.'html'.DS.'go_register.php';?>
<br>
<?
}else {
	require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SSite.php';
}?>
<table cellspacing="0" class="customerAccount" width="100%">
  <tr id="header-row">
    <th><div>id</div></th>
    <th><div>Состав</div></th>
    <th><div>Стоимость</div></th>
    <th><div>Дата закрытия</div></th>
    <th><div>Состояние</div></th>
    <th><div>Куратор</div></th>
    <th><div>Файлы</div></th>
    <th><div>Поддержка до</div></th>
  </tr>
<?	if ($orders_of_user)
	for($i=0,$j=count($orders_of_user);$i<$j;$i++):
		$order=$orders_of_user[$i]; //SDebug::showDebugContent($order,'order');?>
  <tr valign="top"<? if($i%2==1){?> bgcolor="#efefef"<? }?>>
    <td align="right" nowrap title="Редактировать или удалить заказ"><a title="Просмотреть и отредактировать" href="<?
		if ($user->get('guest')==1){
				?>javascript:void();" onclick="askToSignUp('<?=$this->go_signup?>');<? 
		}else{
				echo JRoute::_("index.php?option=com_collector1&view=orders&layout=order&order_id=$order[id]");
		}?>"><?=$order['id']?></a>
    <?	//удаляет весь заказ:
		makeLinkToDelete( 'deleteOrder',
						  $order["id"],
						  $this->templatename,
						  $this->baseurl,
						  "Удалить заказ",
						  false,
						  true,
						  'opacity:0.7'
						);?>
    </td>
	<td>
		<div class="comps"><? 	
		for($y=0,$t=count($order["components_names"]);$y<$t;$y++):?>
			<div><? echo $order["components_names"][$y]["name_ru"];?> 
		<? 	//удаляет компонент из набора заказа:
			makeLinkToDelete( 'deleteComponent', 
							  $order["id"].'.'.($y+1), 
							  $this->templatename, 
							  $this->baseurl, 
							  "Удалить компонент", 
							  false,
							  '4', 
							  true
							);?></div>
	<?	endfor;?>
    	</div></td>
    <td align="right"><? 
    echo $order['budget'];
?></td>
    <td><? 
    echo $order['finish_date'];
?></td>
    <td><? 
    //echo $order[''];
?></td>
    <td></td>
    <td nowrap><?	//echo "<div>baseurl= ".$this->baseurl.", templatename= ".$this->templatename."</div>"; 
    SFiles::showFiles( $order['files_names'],
					   $order['id'],
					   $this->templatename,
					   'orders',
					   $this->baseurl //may not be
					 );
?></td>
    <td><? 
    //echo $order[''];
?></td>
  </tr>
<?	endfor;?>  
</table>
</div>
