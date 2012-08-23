<?	
$UserAdmin=JFactory::getUser();
$user_id_from=$UserAdmin->get('id');
$user_id=JRequest::getVar('user_id');
$document = &JFactory::getDocument();

if ($order_id=JRequest::getVar('order_id')){
	$objs='orders';
	$object_id=$order_id;
	$viewClass='Collector1ViewOrders';
	$user_stuff_type='components';
	$user_stuff_key='orders_of_user';
	$userType='tUser';
}
elseif ($collection_id=JRequest::getVar('collection_id')) {
	$objs='collected';
	$object_id=$collection_id;
	$viewClass='Collector1ViewCollected';
	$user_stuff_type='collections';
	$user_stuff_key='collections_of_user';
	$userType='UserAdmin';
}
//$document->addStyleSheet('components/com_collector1/assets/css/collector1.css');
require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'views'.DS.$objs.DS.'view.html.php';
require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.$objs.'.php';

$view=JRequest::getVar('view');
if ($view=='customers') {
	$tUser = JFactory::getUser($user_id);
}
else {	// get precustomer data
	$tUser = SUser::getPrecustomerContactData( false,
											   $UserAdmin,
											   $user_id,
											   true //$as_object
									  		 ); 
	// нужно далее, для getData():
	$tUser->id=$user_id;
	$tUser->type='precustomer';
}
$viewInstance=new $viewClass;
$Data=$viewInstance->getData($object_id,${$userType});?>
<div class="floatTop">
<h4>Состав <? 
if (!$get_layout) $get_layout=JRequest::getVar('layout');
echo ($get_layout=="order")? "заказа":"коллекции"; ?> id <?=$object_id?></h4>
<?
if ($objs=='orders') { //echo "<div class=''>ORDER</div>"; 
	$viewInstance->buildComponentsBlocks( $Data[$user_stuff_type], // все доступные компоненты
									  	  $Data[$user_stuff_key][0], // данные заказа
									  	  $UserAdmin
										);
}else{
	//var_dump("<h1>Data:</h1><pre>",$Data,"</pre>");
	$viewInstance->buildComponentsBlocks();
	// reserved...	
}?>
</div>
<div class="floatTop">
<h4>Данные <? 
$got_view=JRequest::getVar('view');
echo ($got_view=="precustomers")? "предзаказчика":"заказчика"; ?></h4>
<?	$i=0;//var_dump("<pre>",$tUser,"</pre>");?>
    <table cellspacing="0" cellpadding="0" style="border:solid 1px #CCC;">
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>id</td>
            <td><?=$tUser->id?></td>
        <td>Email</td>
            <td><?=$tUser->email?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Логин</td>
            <td><?=$tUser->username?></td>
       <td>mobila</td>
            <td><?=$tUser->mobila?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Имя</td>
            <td><?=$tUser->name?></td>
	<?	if($tUser->type=='precustomer'){?>        
        <td>Контакт. тел.</td>
            <td><?=$tUser->phone?></td>
	<?	}else{?>        
        <td>Тел. рабочий</td>
            <td><?=$tUser->work_phone?></td>
	<?	}?>        
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Отчество</td>
            <td><?=$tUser->middlename?></td>
        <td>Скайп</td>
            <td><?=$tUser->skype?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
         <td>Пол</td>
            <td><?=$tUser->sex?></td>
        <td>Город дислокации</td>
            <td><?=$tUser->city?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Фамилия</td>
            <td><?=$tUser->surname?></td>
        <td>Регион</td>
            <td><?=$tUser->region?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Дата регистрации</td>
            <td><?=$tUser->registerDate?></td>
        <td>Компания</td>
            <td><?=$tUser->company_name?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>lastvisitDate</td>
            <td><?=$tUser->lastvisitDate?></td>
    
        <td>activation</td>
            <td><?=$tUser->activation?></td>
      </tr>
    </table>
    <div style="padding:8px">
    <a href="<?=JUri::root()?>administrator/index.php?option=com_collector1&view=<?=$got_view?>&layout=edit&id=<?=$user_id?>">Редактировать</a>
    </div>
</div>
<div style="clear:both;"></div>
<div class="fltlft width-50">
	<h4 class="marginBottom8">Список сообщений по <? 
	if ($objs=='orders'){?>заказу<? }else{?>коллекции<? }?> &nbsp; | &nbsp; <a href="javascript:void();" onClick="composeMessageDisplay();" style="font-weight:200;">Добавить сообщение...</a></h4><?
	$arrMessages=SUser::getMessages( false,
						  false,
						  $user_id,
						  $user_id_from, // текущий юзер, выяснить статус прочтения сообщения
						  false,
						  20
						); //for($i=0,$j=count($arrMessages);$i<$j;$i++) var_dump("<h1>arrMessages[$i]:</h1><pre>",$arrMessages[$i],"</pre>");
	


//var_dump("<h1>this:</h1><pre>",$this,"</pre>"); //die;

	?>
    <table width="100%" cellspacing="0" class="tblMess" id="tblMess">
  <tr class="trMessHeaders">
    <td>#</td>
    <td>Прочтено</td>
    <td>Создано</td>
    <td>Напр.</td>
    <td>Тема</td>
    <td align="center">Опции</td>
  </tr>
<?	$white='#FFF';
	$grey='#EDEDED'; 
	$light_orange="#FFE3AA";
	$unread='не прочтено';
	$goSetStat='Пометить как ';
	$goRead="прочтённое";
	$goUnRead="непрочтённое";
	for($i=0,$j=count($arrMessages);$i<$j;$i++):?>
  <tr bgcolor="<? 
  	if($read=$arrMessages[$i]['read_datetime']) {
	  	echo $white;
  	}else{ 
		echo $grey;  
		$read=false;
  	}?>" id="message_<?=$arrMessages[$i]['id']?>">
    <td><?=$arrMessages[$i]['id']?></td>
    <td><a href="void();" onClick="<? $handleMess="return handleMess"; echo $handleMess;?>(<?=$arrMessages[$i]['id']?>,'<? $switch_read_status="switch_read_status"; echo $switch_read_status;?>');" title="<?
		echo $goSetStat;
    	echo ($read)? $goUnRead:$goRead;
	?>"><?=($read)? $read:$unread?></a></td>
    <td><?=$arrMessages[$i]['datetime']?></td>
    <td><? 
		if ($arrMessages[$i]['user_id_from']==$user_id_from) {?>outbox<? }else{?>inbox<? }
	?></td>
    <td><a href="javascript:void();" onClick="<? $loadMess="return loadMess"; echo $loadMess;?>(<?=$arrMessages[$i]['id']?>);"><?=$arrMessages[$i]['subject']?></a></td>
    <td align="center"><a href="void();" onClick="return handleMess(<?=$arrMessages[$i]['id']?>,'delete');"<?
    $del_title=' title="Удалить сообщение"'; echo $del_title;
	?>><img src="<? 
	$del_img=JUri::root().'administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16';
	echo $del_img; ?>"></a></td>
  </tr>
<?	endfor;?>    
</table>
</div>
<div class="fltrt width-50">
  <div style="margin-left:10px;">	
    <h4 id="message_header" class="marginBottom8 paddingLeft10"><?
	$h_mess_text='Текст сообщения'; //будет использоваться также в клиентском скрипте
	echo $h_mess_text;?></h4>
    <div id="message_content" class="messContent">
    	<div id="sel_mess"><? $sel_message='Выберите сообщение';
			echo $sel_message;?></div>
        <div id="message_fields" style="display:<?='none'?>;">
            <h4 id="staticHeader" class="marginBottom4 marginTop0">Тема сообщения</h4>
            <input name="subject" id="subject" type="text" class="block width99 padding3">
            <h4 class="marginBottom4 marginTop8">Текст сообщения</h4>
            <textarea name="message" id="message" cols="" rows="10" class="width99 padding3"></textarea>
            <button type="button" class="buttonMess" onClick="sendPostAjax('message');">Отправить</button>
            <button type="reset" class="buttonMess" onClick="composeMessageDisplay('reverse');">Отменить</button>
        </div>
    </div>
  </div>  
</div>
<?	require_once JPATH_SITE.DS.'includes'.DS.'internal_mail_js.php';