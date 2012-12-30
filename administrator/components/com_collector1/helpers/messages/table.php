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
	for($i=0,$j=count($arrMessages);$i<$j;$i++){
		$messageId=$arrMessages[$i]['id'];
		$messageDateTime=$arrMessages[$i]['datetime'];
		if ($messageReadDateTime=$arrMessages[$i]['read_datetime'])
			$messageTime=substr($messageReadDateTime,11);
		$messageSubject=$arrMessages[$i]['subject'];
		$messageIdFrom=$arrMessages[$i]['user_id_from'];	
    	$mine=((int)$messageIdFrom==$user_id)? true:false;
		$read=($messageReadDateTime)? true:false;
		?>
  <tr class="<?=SUser::setMailRowClass($messageId)?>" bgcolor="<?
		echo($read)? $white:$grey;
		?>" id="message_<?=$messageId?>">
    <td><?=$messageId?></td>
    <td title="<?=$messageDateTime?>">&nbsp;</td>
    <td title="<?=$messageDateTime?>"><?=$messageDateTime?></td>
    <td><?
		// ОТ КОГО? - ОТПРАВИТЕЛЬ СООБЩЕНИЯ		
		if ($mine){?>
		  Я
	<? 	}else{ // not me
			//получить отправителя:
			if($got_view=='precustomers') {?>Предзаказчик<? }
			else{
				$arrUserDataFromMail=SUser::getUserDataFromMail($messageId);?>
				<a href="<? echo JUri::root() .					"administrator/index.php?option=com_users&view=user&layout=edit&id=" .
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
    <td><a href="#" data-read-status="<?=$messageId?>" title="<? 
	
	if ($messageTime) 		
		echo $messageTime."\n"; 
	
	echo $goSetStat;
	
	echo ($read)? $goUnRead:$goRead;
	
	?>"><? echo ($read)? $messageReadDateTime:$unread;?></a></td>
    <td>&nbsp;</td>
    <td><a href="#" data-subject="<?=$messageId?>"><?=$messageSubject?></a></td>
    <td align="center"><a href="#" data-delete="<?=$messageId?>" <?
    $del_title=' title="Удалить сообщение"'; echo $del_title;
	?>><img src="<?=$del_img?>"></a></td>
  </tr>
<?	}?>
  <tr>
    <td align="center" colspan="<?=$y?>"><?
    echo $this->pagination; //var_dump("<h1>get:</h1><pre>",JRequest::get('get'),"</pre>");?></td>
  </tr>
<?	if(!$i):?>
  <tr>
    <td colspan="<?=$y?>" style="padding:10px;">Сообщений нет</td>
  </tr>
<?	endif;?>        
</table>


