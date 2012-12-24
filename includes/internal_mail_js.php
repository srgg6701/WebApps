<script type="text/javascript">
$( function(){
		//
		requestPage='<?=JUri::root()?>index.php';
		// 
		$('a[data-read-status]').click( function(){
				handleMess($(this).attr('data-read-status'),'switch_read_status');
				return false;
			});
		$('a[data-read-status]').live('click',function(){
				handleMess($(this).attr('data-read-status'),'switch_read_status');
				return false;
			});

		$('a[data-subject]').click( function(){
				loadMess($(this).attr('data-subject'));
				return false;
			});
		$('a[data-subject]').live( 'click',function(){
				loadMess($(this).attr('data-subject'));
				return false;
			});
		$('a[data-delete]').click( function(){
				handleMess($(this).attr('data-delete'),'delete');
				return false;
			});
		$('a[data-delete]').live( 'click',function(){
				handleMess($(this).attr('data-delete'),'delete');
				return false;
			});
		$('a[data-action="add-message"]').click( function(){
				composeMessageDisplay();
				return false;
			});
	});
/**
 * Описание
 * @package
 * @subpackage
 */
function takeTest(uData){
	window.open(requestPage+'?'+uData+'&take_test=1','test');
}

/**
 * Управление отображением блока с сообщением
 */
function composeMessageDisplay(rev){
  try{
	var headerTextHolder,textAreaDisplay,messageTextHolderDisplay;
	if (rev){
		headerTextHolder='<?=$h_mess_text?>'; // 'Текст сообщения'
		textAreaDisplay='none';
		messageTextHolderDisplay='block';
	}else{
		headerTextHolder='Новое сообщение';
		textAreaDisplay='block';
		messageTextHolderDisplay='none';
	}
	$('#message_header').html(headerTextHolder); // ячейка для темы сообщения: поле с заголовком сообщения
	$('#message_fields').css('display',textAreaDisplay); // поле ввода текста	// textarea
	$('#sel_mess').css('display',messageTextHolderDisplay); // блок со статическим текстом - 'Выберите сообщение'
  }catch(e){
	  alert(e.message);
  }
}
/**
 * Отправить сообщение методом Post
 */
function sendPostAjax(txtAreaID){
  try{
	// content
	// var preMess='';
	var messageContent = /*preMess = */"object=message&action=send&<?=$get_layout?>_id=<?=$object_id?>&user_id_from=<?=$user_id_from?>&user_id_to=<?=$user_id?>";
	messageContent+="&subject=" + $('#subject').val() + "&message=" + $('#message').val(); 
	var uData="option=com_ajax&"+messageContent;
	var nw=true;
	if (nw) 
		takeTest(uData);
  	else{
		$.ajax({
			type: "POST",// "GET"
			url:requestPage, // 		
			dataType: 'json',
			data: uData,
			/*beforeSend: function() {},*/
			success: function (data) {
					/*var newMessRow=d.createElement('tr');
					
					tblMess=d.getElementById('tblMess');
					tBody=tblMess.getElementsByTagName('tbody').item(0);
tRows=tBody.getElementsByTagName('tr');
					
					// добавить строку сверху:
					tBody.insertBefore(newMessRow, tBody.getElementsByTagName('tr').item(1));*/
					
					$('table#tblMess tbody tr:first-child')
						.after('<tr bgcolor="<?=$white?>" style="background-color:<?=$light_orange?>;">'+/*
						*/'<td>'+data['id']+'</td>'+/*
						*/'<td>&nbsp</td>'+/*
						*/'<td>'+setReadMessageDate(data['id'],data['date_time']+'</td>'+/*
						*/'<td>Я</td>'+/*
						*/'<td>'+setReadMessageDate(data['id'],data['date_time'])+'</td>'+/*
						*/'<td><a href="#" data-subject="'+data['id']+'">'+data['subject']+'</a></td>'+/*
						*/'<td align="center"><a href="#" data-delete="'+data['id']+'" <?=$del_title;?>><img src="<?=$del_img?>"></a></td>'+/*
						
					*/'</tr>');
					/*var tdContent='';
					for(var key in data){
						tdContent=(data[key])? data[key]:'&nbsp';
						switch(key){
							case "date_time":
								newMessRow.innerHTML+='<td>'+setReadMessageDate(data['id'],tdContent)+'</td>';
								break;							
							case "subject":
								newMessRow.innerHTML+='<td><a onclick="<? echo $loadMess;?>('+data['id']+');" href="javascript:void();">'+tdContent+'</a></td>';						
								break;							
							default:
								if (key!="message") 
									newMessRow.innerHTML+='<td>'+tdContent+'</td>';						
						}
					}
					newMessRow.bgColor='<?=$white?>';
					newMessRow.style.backgroundColor='<?=$light_orange?>';
					newMessRow.innerHTML+='<td align="center"><a<?=$del_title;?> onclick="<? echo $handleMess;?>('+data['id']+',\'delete\');" href="void();"><img src="<?=$del_img?>"></a></td>';*/
					// отобразить блок для контента сообщения
					// разместить там текст сообщения
					// спрятать форму alert(data['message']);
					handleMessAreaAfterPost(data['message'],'Отправленное сообщение:');
				},
			error: function (data) {
				alert("Не удалось отправить данные.\nОтвет: "+data.result);
			}
		});
	}	/*var req = getXmlHttpRequest();
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			else { 
				if ( req.status == 200 ) {
					var data = JSON.parse(req.responseText);
					var newMessRow=d.createElement('tr');
					// добавить строку сверху:
					tBody.insertBefore(newMessRow, tBody.getElementsByTagName('tr').item(1));
					var tdContent='';
					for(var key in data){
						tdContent=(data[key])? data[key]:'&nbsp';
						switch(key){
							case "date_time":
								newMessRow.innerHTML+='<td>'+setReadMessageDate(data['id'],tdContent)+'</td>';
								break;							
							case "subject":
								newMessRow.innerHTML+='<td><a onclick="<? echo $loadMess;?>('+data['id']+');" href="javascript:void();">'+tdContent+'</a></td>';						
								break;							
							default:
								if (key!="message") 
									newMessRow.innerHTML+='<td>'+tdContent+'</td>';						
						}
					}
					newMessRow.bgColor='<?=$white?>';
					newMessRow.style.backgroundColor='<?=$light_orange?>';
					newMessRow.innerHTML+='<td align="center"><a<?=$del_title;?> onclick="<? echo $handleMess;?>('+data['id']+',\'delete\');" href="void();"><img src="<?=$del_img?>"></a></td>';
					// отобразить блок для контента сообщения
					// разместить там текст сообщения
					// спрятать форму alert(data['message']);
					handleMessAreaAfterPost(data['message'],'Отправленное сообщение:');
				}else{
					wrongURL();
				}
			}
		}*/
	/*var url=0; // for test
	if (url>0) {
		<? //JUri::root()?>index.php?option=com_ajax"; ?>
		var goUrl=requestPage+'&'+messageContent+'&w=1';
		req.open("GET", goUrl, true);
		req.send(null);
		window.open(goUrl,'ajax');
	}else{
		// Метод POST
		req.open("POST", requestPage, true);
		// Установка заголовков
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.setRequestHeader("Content-Length", messageContent.length);
		// Отправка данных
		req.send(messageContent);			
	}*/
  }catch(e){
	  alert(e.message);
  }
}
/**
 * Обработать область сообщения после его отправки
 */
function setReadMessageDate(message_id,readStatus){
	var linkContent='<a data-read-status="'+message_id+'" title="<?=$goSetStat.$goUnRead?>" href="#">'+readStatus+'</a>';
	// console.info();
	return linkContent;
}
/**
 * Обработать область сообщения после его отправки
 */
function handleMessAreaAfterPost(messageText,headerTextStatic){
	$('#sel_mess').fadeIn(150).html(messageText);
	$('#message_fields').fadeOut(150);
	if (headerTextStatic) $('#message_header').html(headerTextStatic);
}
/**
 * Загрузить сообщение
 */
function loadMess(message_id){
  try{ 
  	var uData="option=com_ajax&object=message&action=get&object_id="+message_id+"&user_id_read=<?=$user_id?>";
	var nw=true;
	if (nw) 
		takeTest(uData);
  	else{
		$.ajax({
			type: "GET",//POST
			url:requestPage, 			
			dataType: 'json',
			data: uData,
			/*beforeSend: function() {},*/
			success: function (data) {
				handleMessAreaAfterPost(data['message']);
				$('tr').each(function() {
					$(this).css('background-color','<?=$white?>'); //
				});
				// для активной строки:
				$('#message_'+message_id).css('background-color','<?=$light_orange?>');
				if (data['date']) 
					$('table#tblMess > tr td').eq(1).html(setReadMessageDate(message_id,data['date']));// ссылка с датой прочтения
			},
			error: function (data) {
				alert("Не удалось отправить данные.\nОтвет: "+data.result);
			}
		});
    }
  }catch(e){
	alert(e.message);
  }
}
/**
 * Переключить статус прочтения сообщения
 * Удалить сообщение
 */
function handleMess(message_id,action){
  try{ 
  	var uData="option=com_ajax&object=message&action="+action+"&object_id="+message_id+"&user_id=<?=$user_id_from?>";
	var nw=true;
	if (nw) 
		takeTest(uData);
	else{
		// content
		$.ajax({
			type: "GET",//
			url: requestPage,
			dataType: 'json',
			data: uData,
			/*beforeSend: function() {},*/
			success: function (data) {
				var messRow=$('#message_'+message_id);
				var messReadDateLink=$('td a',messRow).eq(0);
				//alert('OK!');
				var Bckgr,Html,Title;
				if (action=='switch_read_status'){	
					if ($(messRow).attr('bgcolor')=='<?=$white?>'){ // уже прочтено
						bckgr='<?=$grey?>';// назначить серый фон строке
						Html='<?=$unread?>';// текст ссылки
						Title='<?=$goSetStat.$goUnRead?>';// текст title
					}else{
						bckgr='<?=$white?>';
						Html=data;
						Title='<?=$goSetStat.$goRead?>';
					}
					$(messRow).attr('bgcolor',bckgr);
					$(messReadDateLink).html(Html).attr('title',Title);
				}else if(action=='delete'){ // Удалить сообщение
					$(messRow).css('display','none');
				}
			},
			error: function (data) {
				alert("Не удалось отправить данные.");
			}
		});
	}
  }catch(e){
	alert(e.message);
  }
}
</script>