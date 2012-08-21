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
if ($objs=='orders') { //echo "<div class=''>ORDER</div>"; 
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
<div style="clear:both;"></div>
<div class="fltlft width-50">
	<h4 class="marginBottom8">Список сообщений по <? 
	if ($objs=='orders'){?>заказу<? }else{?>коллекции<? }?> &nbsp; | &nbsp; <a href="javascript:void();" onClick="composeMessage();" style="font-weight:200;">Добавить сообщение...</a></h4><?
	$arrMessages=SUser::getMessages( false,
						  false,
						  $user_id,
						  $user_id_from, // текущий юзер, выяснить статус прочтения сообщения
						  false,
						  20
						); //for($i=0,$j=count($arrMessages);$i<$j;$i++) var_dump("<h1>arrMessages[$i]:</h1><pre>",$arrMessages[$i],"</pre>");
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
<?	$white='FFF';
	$grey='EDEDED'; 
	$unread='не прочтено';
	$goSetStat='Пометить как ';
	$goRead="прочтённое";
	$goUnRead="непрочтённое";
	for($i=0,$j=count($arrMessages);$i<$j;$i++):?>
  <tr bgcolor="#<? 
  	if($read=$arrMessages[$i]['read_datetime']) {
	  	echo $white;
  	}else{ 
		echo $grey;  
		$read=false;
  	}?>" id="message_<?=$arrMessages[$i]['id']?>">
    <td><?=$arrMessages[$i]['id']?></td>
    <td><a href="void();" onClick="return handleMess(<?=$arrMessages[$i]['id']?>,'switch_read_status');" title="<?
		echo $goSetStat;
    	echo ($read)? $goUnRead:$goRead;
	?>"><?=($read)? $read:$unread?></a></td>
    <td><?=$arrMessages[$i]['datetime']?></td>
    <td><? 
		if ($arrMessages[$i]['user_id_from']==$user_id_from) {?>outbox<? }else{?>inbox<? }
	?></td>
    <td><a href="javascript:void();" onClick="return loadMess(<?=$arrMessages[$i]['id']?>);"><?=$arrMessages[$i]['subject']?></a></td>
    <td align="center"><a href="void();" onClick="return handleMess(<?=$arrMessages[$i]['id']?>,'delete');" title="Удалить сообщение"><img src="<?=JUri::root()?>administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>
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
            <h4 class="marginBottom4 marginTop0">Тема сообщения</h4>
            <input name="subject" id="subject" type="text" class="block width99 padding3">
            <h4 class="marginBottom4 marginTop8">Текст сообщения</h4>
            <textarea name="message" id="message" cols="" rows="10" class="width99 padding3"></textarea>
            <button type="button" class="buttonMess" onClick="sendPostAjax('message');">Отправить</button>
            <button type="reset" class="buttonMess" onClick="composeMessage('reverse');">Отменить</button>
        </div>
    </div>
  </div>  
</div>
<script type="text/javascript">
d=document;
requestPage = "<?=JUri::root()?>index.php?option=com_ajax";
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
	// content
	var messageContent = "object=message&action=send&<?=$get_layout?>_id=<?=$object_id?>&user_id_from=<?=$user_id_from?>&user_id_to=<?=$user_id?>&subject=" + subj + "&message=" + message; //alert(messageContent);
	var req = getXmlHttpRequest();
	var url=false;
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			else { 
				if ( req.status == 200 ) {
					var jData = JSON.parse(req.responseText);
					var tblMess=d.getElementById('tblMess');
					var tBody=tblMess.getElementsByTagName('tbody').item(0);
					var newMessRow=d.createElement('tr');
					tBody.appendChild(newMessRow);
					var tdContent='';
					for(var key in jData){
						tdContent=(jData[key])? jData[key]:'&nbsp';
						newMessRow.innerHTML+='<td>'+tdContent+'</td>';
					}
					newMessRow.innerHTML+='<td>Удалить</td>';
				} else {
					alert( "There was a problem with the URL." );
				}
			}
		}
	var url=false; // for test
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
function loadMess(message_id){
  try{ //alert('loadMess');
	// content
	var messageContent = "object=message&action=get&object_id="+message_id+"&user_id_read=<?=$user_id_from?>"; //alert(messageContent);
	var req = getXmlHttpRequest();
	var url=false;
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			else { 
				if ( req.status == 200 ) {
					var jData = JSON.parse(req.responseText);
					//alert(jData['message_id']+', '+jData['user_id']+', '+jData['date_time']);
					d.getElementById('sel_mess').style.display='block'; // отобразить блок для контента сообщения
					d.getElementById('sel_mess').innerHTML=jData['message']; // разместить там текст сообщения
					d.getElementById('message_fields').style.display='none'; // спрятать форму
					var rows=d.getElementById('tblMess').getElementsByTagName('tr'); // получить все строки таблицы
					for(i=0,j=rows.length;i<j;i++)
						rows.item(i).style.backgroundColor=''; // убрать стиль фона строк
					d.getElementById('message_'+message_id).style.backgroundColor='#FFE3AA'; // назначить стиль фона активной строки
				} else {
					alert( "There was a problem with the URL." );
				}
			}
		}
	var url=false; // for test
	//url=requestPage+'&'+messageContent;
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
  	
	return false;
  }catch(e){
	alert(e.message);
  }
}
function handleMess(message_id,action){
  try{ //alert('loadMess');
	// content
	var url = requestPage+"&object=message&action="+action+"&object_id="+message_id+"&user_id=<?=$user_id_from?>"; //alert(messageContent);
	var req = getXmlHttpRequest();
	req.onreadystatechange = function() {
		if (req.readyState != 4) return;
		else { 
			if ( req.status == 200 ) {
				var messRow=d.getElementById('message_'+message_id);
				var messReadDateTD=messRow.getElementsByTagName('td').item(1);
				var messReadDateLink=messReadDateTD.getElementsByTagName('a').item(0);
				if (action=='switch_read_status'){
					if (messRow.background=='#<?=$white?>') { // уже прочтено
						messRow.background='<?=$grey?>'; // назначить серый фон строке
						messReadDateLink.innerHTML='<?=$unread?>'; // текст ссылки
						messReadDateLink.title='<?=$goSetStat.$goUnRead?>'; // текст title
					}else {
						messRow.background='<?=$white?>';
						messReadDateLink.innerHTML=req.responseText;
						messReadDateLink.title='<?=$goSetStat.$goRead?>';
					}
				}else if(action=='delete'){
					 messRow.style.display='none';
				}
				d.getElementById('sel_mess').style.display='none'; // спрятать блок с текстом
				d.getElementById('sel_mess').innerHTML='<? echo $sel_message;?>'; // вернуть текст по умолчанию
			} else {
				alert( "There was a problem with the URL." );
			}
		}
	}
	var newWin=false; // for test
	//newWin=true;
	req.open("GET", url, true);
	req.send(null);
	if (newWin) window.open(url,'ajax');  	
	return false;
  }catch(e){
	alert(e.message);
  }
}
</script>
