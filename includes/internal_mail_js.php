<script type="text/javascript">
$( function(){
		d=document;
		requestPage = "<?=JUri::root()?>index.php?option=com_ajax"; // стр. отправки данных
		// область сообщения:
		textContainer=$('#sel_mess'); // блок со статическим текстом
		messHeaderInput=$('#message_header'); // ячейка для темы сообщения
		textArea=$('#message_fields'); // поле ввода текста
		// таблица с сообщениями:
		tblMess=$('table#tblMess');
		//tBody=$('tbody',tblMess).eq(0);
		//tRows=$('tr',tblMess);
		// страница отправки сообщнеия:
		
		$('a[data-subject]').click( function(){
				loadMess($(this).attr('data-subject'));
			});
		$('a[data-read-status]').click( function(){
				handleMess($(this).attr('data-read-status'),'switch_read_status');
			});
		$('a[data-read-status]').live('click',function(){
				handleMess($(this).attr('data-read-status'),'switch_read_status');
			});
	});
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
	messHeaderInput.innerHTML=headerTextHolder; // поле с заголовком сообщения
	textArea.style.display=textAreaDisplay; // textarea
	textContainer.style.display=messageTextHolderDisplay; // 'Выберите сообщение'
  }catch(e){
	  alert(e.message);
  }
}
/**
 * Отправить сообщение методом Post
 */
function sendPostAjax(txtAreaID){
  try{
	var subj = d.getElementById("subject").value;
	var message = d.getElementById("message").value; //alert('message='+message);
	// content
	var preMess='';
	var messageContent = preMess = "object=message&action=send&<?=$get_layout?>_id=<?=$object_id?>&user_id_from=<?=$user_id_from?>&user_id_to=<?=$user_id?>";
	messageContent+="&subject=" + subj + "&message=" + message; 
	var req = getXmlHttpRequest();
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			else { 
				if ( req.status == 200 ) {
					var jData = JSON.parse(req.responseText);
					var newMessRow=d.createElement('tr');
					// добавить строку сверху:
					tBody.insertBefore(newMessRow, tBody.getElementsByTagName('tr').item(1));
					var tdContent='';
					for(var key in jData){
						tdContent=(jData[key])? jData[key]:'&nbsp';
						switch(key){
							case "date_time":
								newMessRow.innerHTML+='<td>'+setReadMessageDate(jData['id'],tdContent)+'</td>';
								break;							
							case "subject":
								newMessRow.innerHTML+='<td><a onclick="<? echo $loadMess;?>('+jData['id']+');" href="javascript:void();">'+tdContent+'</a></td>';						
								break;							
							default:
								if (key!="message") 
									newMessRow.innerHTML+='<td>'+tdContent+'</td>';						
						}
					}
					newMessRow.bgColor='<?=$white?>';
					newMessRow.style.backgroundColor='<?=$light_orange?>';
					newMessRow.innerHTML+='<td align="center"><a<?=$del_title;?> onclick="<? echo $handleMess;?>('+jData['id']+',\'delete\');" href="void();"><img src="<?=$del_img?>"></a></td>';
					// отобразить блок для контента сообщения
					// разместить там текст сообщения
					// спрятать форму alert(jData['message']);
					handleMessAreaAfterPost(jData['message'],'Отправленное сообщение:');
				}else{
					wrongURL();
				}
			}
		}
	var url=0; // for test
	if (url>0) {
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
	}
  }catch(e){
	  alert(e.message);
  }
}
/**
 * Обработать область сообщения после его отправки
 */
function setReadMessageDate(message_id,tdContent){
	var linkContent='<a data-read-status="'+message_id+'" title="<?=$goSetStat.$goUnRead?>" href="javascript:void();">'+tdContent+'</a>';
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
	$.ajax({
		type: "GET",//POST
		url:'<?=JUri::root()?>index.php', 			
		dataType: 'json',
		data: "option=com_ajax&object=message&action=get&object_id="+message_id+"&user_id_read=<?=$user_id?>",
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
  }catch(e){
	alert(e.message);
  }
}
/**
 * Переключить статус прочтения сообщения
 * Удалить сообщение
 */
function handleMess(message_id,action){
  try{ //alert('loadMess');
	// content
	$.ajax({
		type: "GET",//
		url: requestPage,
		dataType: 'json',
		data: "object=message&action="+action+"&object_id="+message_id+"&user_id=<?=$user_id_from?>",
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
  }catch(e){
	alert(e.message);
  }
}
</script>