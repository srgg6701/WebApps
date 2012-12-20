<?
// No direct access
defined('_JEXEC') or die; ?>
<style>
tr.Read td{
/* прочтённые:
	для адимина:
		входящие: всеми сотрудниками, включая заавторизованного
		отправленные: клиентом
	для клиента: входящие прочтённые
*/
	background:#FFF;
}
tr.UnReadAllIn td{
/*	для админа: 
	входящие, непрочтённые никем из сотрудников 
	для клиента: входящие непрочтённые
*/
	background:EDEDED;
}
</style>
<?
if (!$UserAdmin&&SUser::detectAdminStat($user)) {
	$UserAdmin=JFactory::getUser();
	$user_id_from=$UserAdmin->get('id');
}
if (JRequest::getVar('test')) SDebug::showDebugContent($arrMessages,'arrMessages');?>
	<h4 class="marginBottom8"><?
    if($direct){
		$mailFolders=SAdminMenuHelper::makeMailFoldersList();
		echo $mailFolders[$direct];
	}else{?>Список сообщений<? 
		if ($objs=='orders'){?> по заказу<? }elseif($objs=='collections'){?> по коллекции<? }
	}?> &nbsp; | &nbsp; <a href="javascript:void();" onClick="composeMessageDisplay();" style="font-weight:200;">Добавить сообщение...</a></h4>
<table cellspacing="0" class="tblMess" id="tblMess">
  <tr class="trMessHeaders"><? $y=0; ?>
    <td>#<? ++$y?></td>
    <td>Объект</td>
    <td>Создано<? ++$y?></td>
    <td align="center">От кого<? ++$y?></td>
    <td>Прочтено<? ++$y?></td>
    <td>Тема<? ++$y?></td>
    <td align="center" style="background:#FFC;"><img src="<? 
	$del_img=JUri::root().'administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16';
	echo $del_img; ?>"></td><? ++$y?>
  </tr>
<?	//$white='#FFF';
	//$grey='#EDEDED'; 
	$light_orange="#FFE3AA";
	$unread='не прочтено';
	$goSetStat='Пометить как ';
	$goRead="прочтённое";
	$goUnRead="непрочтённое";
	for($i=0,$j=count($arrMessages);$i<$j;$i++):?>
  <tr class="<?=SUser::setMailRowClass($arrMessages[$i]['id'])/*if($read=$arrMessages[$i]['read_datetime']) {
	  	//echo //$white;
  	}else{ 
		//echo //$grey;  
		$read=false;
  	}*/?>" id="message_<?=$arrMessages[$i]['id']?>">
    <td><?=$arrMessages[$i]['id']?></td>
    <td title="<?=$arrMessages[$i]['datetime']?>">&nbsp;</td>
    <td title="<?=$arrMessages[$i]['datetime']?>"><?=$arrMessages[$i]['datetime']?></td>
    <td><? //echo "<div class=''>user_id_from= ".$user_id_from."</div>";
		if ($arrMessages[$i]['user_id_from']==$user_id_from) {?>
      Я
    <? 	}else{ // not me
			//получить отправителя:
			if($got_view=='precustomers') {?>Предзаказчик<? }
			else{
				$arrUserDataFromMail=SUser::getUserDataFromMail($arrMessages[$i]['id']);?>
				<a href="<? echo JUri::root() .
					"administrator/index.php?option=com_users&view=user&layout=edit&id=" .
					$arrUserDataFromMail['user_id'];?>" title="<?
						echo $arrUserDataFromMail['user_name'] . 
						"; Редактировать данные";?>"><?
				if ($view=="_messages"){ 
					echo $arrUserDataFromMail['user_login'];
				}elseif($got_view=='customers') {?>Заказчик<? }{
				}?></a><?
			}
		}
	?></td>
    <td><a href="void();" onClick="<? $handleMess="return handleMess"; echo $handleMess;?>(<?=$arrMessages[$i]['id']?>,'<? $switch_read_status="switch_read_status"; echo $switch_read_status;?>');" title="<?
		echo $goSetStat;
    	//echo ($read)? $goUnRead:$goRead;
	?>">СМ. ЗАКОММЕНТИРОВАННЫЙ КОД, стр: <? echo __LINE__;//=($read)? $read:$unread?></a></td>
    <td><a href="javascript:void();" onClick="<? $loadMess="return loadMess"; echo $loadMess;?>(<?=$arrMessages[$i]['id']?>);"><?=$arrMessages[$i]['subject']?></a></td>
    <td align="center"><a href="void();" onClick="return handleMess(<?=$arrMessages[$i]['id']?>,'delete');"<?
    $del_title=' title="Удалить сообщение"'; echo $del_title;
	?>><img src="<?=$del_img?>"></a></td>
  </tr>
<?	endfor;
	if(!$i):?>
    <td colspan="<?=$y?>" style="padding:10px;">Сообщений нет</td>
<?	endif;?>        
</table>


