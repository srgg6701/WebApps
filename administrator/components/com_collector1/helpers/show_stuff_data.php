<?	
if ($order_id=JRequest::getVar('order_id')){
	$objs='orders';
	$object_id=$order_id;
	$viewClass='Collector1ViewOrders';
	$user_stuff_type='components';
	$user_stuff_key='orders_of_user';
}
elseif ($collection_id=JRequest::getVar('collection_id')) {
	$objs='collected';
	$object_id=$collection_id;
	$viewClass='Collector1ViewCollected';
	$user_stuff_type='collections';
	$user_stuff_key='collections_of_user';
}
$IUser=JFactory::getUser();
$user_id_from=$IUser->get('id');
$user_id=JRequest::getVar('user_id');
$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_collector1/assets/css/collector1.css');
require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'views'.DS.$objs.DS.'view.html.php';
require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.$objs.'.php';
$user = JFactory::getUser($user_id);
$viewInstance=new $viewClass;
$Data=$viewInstance->getData($object_id,$user);?>
<div class="floatTop">
<h4>Состав <? 
if (!$get_layout) $get_layout=JRequest::getVar('layout');
echo ($get_layout=="order")? "заказа":"коллекции"; ?></h4>
<?
if ($objs=='orders') {
	//echo "<div class=''>ORDER</div>"; 
	$viewInstance->buildComponentsBlocks( $Data[$user_stuff_type], // все доступные компоненты
									  $Data[$user_stuff_key][0], // данные заказа
									  $user
									);
}else{

	

}?>
</div>
<div class="floatTop">
<h4>Данные <? 
$got_view=JRequest::getVar('view');
echo ($got_view=="precustomers")? "предзаказчика":"заказчика"; ?></h4>
<?	$i=0;//var_dump("<pre>",$user,"</pre>");?>
    <table cellspacing="0" cellpadding="0" style="border:solid 1px #CCC;">
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>id</td>
            <td><?=$user->id?></td>
        <td>Email</td>
            <td><?=$user->email?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Логин</td>
            <td><?=$user->username?></td>
       <td>mobila</td>
            <td><?=$user->mobila?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Имя</td>
            <td><?=$user->name?></td>
        <td>Тел. рабочий</td>
            <td><?=$user->work_phone?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Отчество</td>
            <td><?=$user->middlename?></td>
        <td>Скайп</td>
            <td><?=$user->skype?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
         <td>Пол</td>
            <td><?=$user->sex?></td>
        <td>Город дислокации</td>
            <td><?=$user->city?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Фамилия</td>
            <td><?=$user->surname?></td>
        <td>Регион</td>
            <td><?=$user->region?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Дата регистрации</td>
            <td><?=$user->registerDate?></td>
        <td>Компания</td>
            <td><?=$user->company_name?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>lastvisitDate</td>
            <td><?=$user->lastvisitDate?></td>
    
        <td>activation</td>
            <td><?=$user->activation?></td>
      </tr>
    </table>
    <div style="padding:8px">
    <a href="<?=JUri::root()?>administrator/index.php?option=com_collector1&view=<?=$got_view?>&layout=edit&id=<?=$user_id?>">Редактировать</a>
    </div>
</div>
<div class="fltlft width-50">
	<h4 class="marginBottom8">Список сообщений по <? 
	if ($objs=='orders'){?>заказу<? }else{?>коллекции<? }?> &nbsp; | &nbsp; <a href="javascript:void();" onClick="composeMessage();">Добавить сообщение...</a></h4>
    <table width="100%" cellspacing="0" class="tblMess">
  <tr class="trMessHeaders">
    <td>#</td>
    <td>Дата</td>
    <td>Напр.</td>
    <td>Тема</td>
    <td>Текст</td>
    <td>Ком.</td>
  </tr>
<?	for($i,$j=20;$i<$j;$i++){?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<?	}?>    
</table>
</div>
<div class="fltrt width-50">
  <div style="margin-left:10px;">	
    <h4 id="message_header" class="marginBottom8 paddingLeft10"><?
	$h_mess_text='Текст сообщения'; //будет использоваться также в клиентском скрипте
	echo $h_mess_text;?></h4>
    <div id="message_content" class="messContent">
    	<div id="sel_mess">Выберите сообщение</div>
    <div id="message_fields" style="display:<?='none'?>;">
    	<h4 class="marginBottom4 marginTop0">Тема сообщения</h4>
    	<input name="subject" id="subject" type="text" class="block width99 padding3">
    	<h4 class="marginBottom4 marginTop8">Текст сообщения</h4>
        <textarea name="message" id="message" cols="" rows="10" class="width-80 width99 padding3"></textarea>
        <button type="button" class="buttonMess" onClick="sendPostAjax('message');">Отправить</button>
        <button type="reset" class="buttonMess" onClick="composeMessage('reverse');">Отменить</button>
    </div>
    </div>
  </div>  
</div>
<script type="text/javascript">
d=document;
function composeMessage(rev){
  try{
	var hd,dmf,dsm;
	if (rev){
		hd='<?=$h_mess_text?>';
		dmf='none';
		dsm='block';
	}else{
		hd='Новое сообщение';
		dmf='block';
		dsm='none';
	}
	d.getElementById('message_header').innerHTML=hd;
	d.getElementById('message_fields').style.display=dmf;
	d.getElementById('sel_mess').style.display=dsm;
  }catch(e){
	  alert(e.message);
  }
}
function sendPostAjax(txtAreaID){
  try{
	var subj = d.getElementById("subject").value;
	var message = d.getElementById("message").value;
	// Формирование строки поиска
	var messageContent = "object=message&action=send&<?=$get_layout?>_id=<?=$order_id?>&user_id_from=<?=$user_id_from?>&user_id_to=<?=$user_id?>&subject=" + subj + "&message=" + message; //alert(messageContent);
	var req = getXmlHttpRequest();
	
	
	var requestPage = "<?=JUri::root()?>index.php?option=com_ajax";
	//var requestPage2 = "<?=JUri::root()?>components/com_ajax/models/ajax2.php";
	var url=false;
	//var url=requestPage+'&'+messageContent;
	//alert(url);
	
	//var requestPage = window.open("<?=JUri::root()?>components/com_ajax/ajax.php",'goPost');
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			else { 
				if ( req.status == 200 ) {
            		
					var jData = JSON.parse(req.responseText);
					alert(jData);
				
				} else {
					alert( "There was a problem with the URL." );
				}
				//var responseText = new String(req.responseText);
				//var responseText = new String(req.responseText);
				//alert('Сообщение отправлено!\nresponseText:\n'+responseText);
			}
		}
		
	if (url) {
		req.open("GET", url, true);
		req.send(null);
		window.open(url,'ajax');
	}else{
		// Метод POST
		req.open("POST", requestPage, true);
		// Установка заголовков
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.setRequestHeader("Content-Length", messageContent.length);
		// Отправка данных
		req.send(messageContent);			
	}
	
  }catch(e){
	  alert(e.message);
  }
}
</script>
