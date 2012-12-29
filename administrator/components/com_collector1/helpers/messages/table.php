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
if(!isset($user))
	$user=JFactory::getUser();
$user_id=(int)$user->id;
//SDebug::showDebugContent($user->id,'user->id');
if (!$UserAdmin&&SUser::detectAdminStat($user)) {
	$UserAdmin=$user;
	$user_id_from=$user_id;
}

if (JRequest::getVar('test')) SDebug::showDebugContent($arrMessages,'arrMessages');?>
	<h4 class="marginBottom8"><?
    if($direct){
		$mailFolders=SAdminMenuHelper::makeMailFoldersList();
		echo $mailFolders[$direct];
	}else{?>Список сообщений<? 
		if ($objs=='orders'){?> по заказу<? }elseif($objs=='collections'){?> по коллекции<? }
	}?> &nbsp; | &nbsp; <a href="#" data-action="add-message" style="font-weight:200;">Добавить сообщение...</a></h4>
<table cellspacing="0" class="tblMess" id="tblMess">
  <tr class="trMessHeaders">
  	<? $y=0; ?>
    <td id="tdId">#<?	++$y;
		
		?></td>
    <td id="tdObject">Объект<? ++$y;
		
		?></td>
    <td id="tdCreated">Создано<? ++$y;
		
		?></td>
    <td id="tdSender" align="center">Отправитель<? ++$y;
		
		?></td>
    <td id="tdRead">Прочтено<? ++$y;
		
		?></td>
    <td id="tdAttaches">Файлы<? ++$y;
		
		?></td>
    <td id="tdSubject">Тема<? ++$y;
		
		?></td>
    <td id="tdRemove" align="center"><img src="<? ++$y;
	
	echo JUri::root().'templates/fastwebdev/images/commands/trash.png'; ?>"></td>
  </tr>
<?	$del_img=JUri::root().'administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16';
	$white='#FFF';
	$grey='#EDEDED'; 
	$light_orange="#FFE3AA";
	$unread='не прочтено';
	$goSetStat='Пометить как ';
	$goRead="прочтённое";
	$goUnRead="непрочтённое";
	for($i=0,$j=count($arrMessages);$i<$j;$i++){?>
  <tr class="<?=SUser::setMailRowClass($arrMessages[$i]['id'])?>" bgcolor="<?
		if($read=$arrMessages[$i]['read_datetime']) {
			echo $white;
		}else{ 
			echo $grey;  
			$read=false;
		}?>" id="message_<?=$arrMessages[$i]['id']?>">
    <td><?=$arrMessages[$i]['id']?></td>
    <td title="<?=$arrMessages[$i]['datetime']?>">&nbsp;</td>
    <td title="<?=$arrMessages[$i]['datetime']?>"><?=$arrMessages[$i]['datetime']?></td>
    <td><?
    
		// ОТ КОГО? - ОТПРАВИТЕЛЬ СООБЩЕНИЯ	
	
		if ((int)$arrMessages[$i]['user_id_from']==$user_id) {?>
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
    <td><a href="#" data-read-status="<?=$arrMessages[$i]['id']?>" title="<?=$goSetStat?><?=($read)? $goRead:$goUnRead?>"><?=($read)? $read:$unread?></a></td>
    <td>&nbsp;</td>
    <td><a href="#" data-subject="<?=$arrMessages[$i]['id']?>"><?=$arrMessages[$i]['subject']?></a></td>
    <td align="center"><a href="#" data-delete="<?=$arrMessages[$i]['id']?>" <?
    $del_title=' title="Удалить сообщение"'; echo $del_title;
	?>><img src="<?=$del_img?>"></a></td>
  </tr>
<?	}
	if(!$i):?>
    <td colspan="<?=$y?>" style="padding:10px;">Сообщений нет</td>
<?	endif;?>        
</table>


