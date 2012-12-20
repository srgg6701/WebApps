<script type="text/javascript">
d=document;
// область сообщения:
textContainer=d.getElementById('sel_mess'); // блок со статическим текстом
messHeaderInput=d.getElementById('message_header'); // ячейка для темы сообщения
textArea=d.getElementById('message_fields'); // поле ввода текста
// таблица с сообщениями:
tblMess=d.getElementById('tblMess');
tBody=tblMess.getElementsByTagName('tbody').item(0);
tRows=tBody.getElementsByTagName('tr');
// страница отправки сообщнеия:
requestPage = "<?=JUri::root()?>index.php?option=com_ajax"; // стр. отправки данных

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
	return '<a title="<?=$goSetStat.$goUnRead?>" onclick="<? echo $handleMess;?>('+message_id+',\'<?=$switch_read_status?>\');" href="void();">'+tdContent+'</a>';
}
/**
 * Обработать область сообщения после его отправки
 */
function handleMessAreaAfterPost(messageText,headerTextStatic){
	textContainer.style.display='block'; // отобразить блок для контента сообщения
	textContainer.innerHTML=messageText; // разместить там текст сообщения
	textArea.style.display='none'; // спрятать форму
	if (headerTextStatic) d.getElementById('message_header').innerHTML=headerTextStatic;
}
/**
 * Загрузить сообщение
 */
function loadMess(message_id){
  try{ // alert('loadMess');
	// content
	var messageContent = "object=message&action=get&object_id="+message_id+"&user_id_read=<?=$user_id_from?>"; //alert(messageContent);
	var req = getXmlHttpRequest();
	req.onreadystatechange = function() {
		if (req.readyState != 4) return;
		else { 
			if ( req.status == 200 ) {
				//var gotMessage = ; //alert(jData['message_id']+', '+jData['user_id']+', '+jData['date_time']);
				var jData = JSON.parse(req.responseText);
				handleMessAreaAfterPost(jData['message']);
				var rows=tblMess.getElementsByTagName('tr'); // получить все строки таблицы
				for(i=0,j=rows.length;i<j;i++)
					rows.item(i).style.backgroundColor='<?=$white?>'; // 
				var tRow=d.getElementById('message_'+message_id); // получить активную строку
				tRow.style.backgroundColor='<?=$light_orange?>'; // назначить стиль фона активной строки	
				if (jData['date']) 
					tRow.getElementsByTagName('td').item(1).innerHTML=setReadMessageDate(message_id,jData['date']); // ссылка с датой прочтения
			} else {
				//wrongURL();
			}
		}
	}
	newWin=true;
	if (newWin){
		var url=requestPage+'&'+messageContent; 
		// alert(url);
		req.open("GET", url, true);
		req.send(null);
		window.open(url,'ajax');
	}
	req.open("POST", requestPage, true);
	// Установка заголовков
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.setRequestHeader("Content-Length", messageContent.length);
	// Отправка данных
	req.send(messageContent);				
	return false;
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
	var url = requestPage+"&object=message&action="+action+"&object_id="+message_id+"&user_id=<?=$user_id_from?>"; //alert(messageContent);
	var req = getXmlHttpRequest();
	req.onreadystatechange = function() {
		if (req.readyState != 4) return;
		else { 
			if ( req.status == 200 ) {
				var messRow=d.getElementById('message_'+message_id);
				var messReadDateTD=messRow.getElementsByTagName('td').item(1);
				var messReadDateLink=messReadDateTD.getElementsByTagName('a').item(0);
				// Переключить статус прочтения сообщения
				if (action=='switch_read_status'){	
					if (messRow.bgColor=='<?=$white?>') { // уже прочтено
						messRow.bgColor='<?=$grey?>'; // назначить серый фон строке
						messReadDateLink.innerHTML='<?=$unread?>'; // текст ссылки
						messReadDateLink.title='<?=$goSetStat.$goUnRead?>'; // текст title
					}else{
						messRow.bgColor='<?=$white?>';
						messReadDateLink.innerHTML=req.responseText;
						messReadDateLink.title='<?=$goSetStat.$goRead?>';
					}
				}else if(action=='delete'){ // Удалить сообщение
					messRow.style.display='none'; // спрятать строку удаляемого сообщения
					tRows.item(tRows.length-2).className='noBottomBorder'; // убрать строчную нижнюю границу с ячеек последней строки таблицы
				}
			}else{
				wrongURL();
			}
		}
	}
	var newWin=true; // for test
	//newWin=true;
	// url - уже установлено
	req.open("GET", url, true);
	req.send(null);
	if (newWin) window.open(url+'&w=1','ajax');  	
	return false;
  }catch(e){
	alert(e.message);
  }
}
</script>
