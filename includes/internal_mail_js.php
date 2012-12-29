<script type="text/javascript">
/*	страницы со сборкой:
	/administrator/components/com_collector1/helpers/messages
*/
$(function(){
		//
		requestPage='<?=JUri::root()?>index.php';
		// 
		$('input[type="radio"][id^="pickupObjectType_"]').click( function(){
				$('div.hidden').fadeOut(250);
				$('div.hidden#'+this.id+'_obj').fadeIn(250);
			});
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
		$('a[data-subject]').live('click',function(){
				loadMess($(this).attr('data-subject'));
				return false;
			});
		$('a[data-delete]').click( function(){
				handleMess($(this).attr('data-delete'),'delete');
				return false;
			});
		$('a[data-delete]').live('click',function(){
				handleMess($(this).attr('data-delete'),'delete');
				return false;
			});
		$('a[data-action="add-message"]').click( function(){
				composeMessageDisplay();
				return false;
			});
	});

/**
 * Управление отображением блока с сообщением
 */
function composeMessageDisplay(rev){
  try{
	var headerTextHolder,textAreaDisplay,pickupObjDisplay,messageTextHolderDisplay;
	if (rev){
		headerTextHolder='<?=$h_mess_text?>'; // 'Текст сообщения'
		pickupObjDisplay='none';
		textAreaDisplay='none';
		messageTextHolderDisplay='block';
	}else{
		headerTextHolder='Новое сообщение';
		pickupObjDisplay='inline-block';
		textAreaDisplay='block';
		messageTextHolderDisplay='none';
	}
	$('#message_header').html(headerTextHolder); // ячейка для темы сообщения: поле с заголовком сообщения
	$('#pickup_obj').css('display',pickupObjDisplay); // блок выбора объекта
	$('#message_fields').css('display',textAreaDisplay); // поле ввода текста	// textarea
	$('#sel_mess').css('display',messageTextHolderDisplay); // блок со статическим текстом - 'Выберите сообщение'
	$('#message_content')
		.css('width','434px')
			.children('input','textarea')
				.css('width','100%');
	$("html, body").animate({ // go to message area
			scrollTop:$('#message_content').offset().top
		},500);
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
  	var uData="option=com_ajax&object=message&action="+action+"&object_id="+message_id+"&user_id=<?=$user_id?>";
	var nw=false;
	if (nw) 
		takeTest(uData);
	else{
		// content
		$.ajax({
			type: "GET",//
			url: requestPage,
			data: uData,
			success: function (data) {
				var messRow=$('#message_'+message_id);
				var messReadDateLink=$('td a',messRow).eq(0);
				var Bckgr,Html,Title;
				if (action=='switch_read_status'){	
					Html=data;
					if ($(messRow).attr('bgcolor')=='<?=$white?>'){ // уже прочтено
						bckgr='<?=$grey?>';// назначить серый фон строке
						Title='<?=$goSetStat.$goUnRead?>';// текст title
					}else{
						bckgr='<?=$white?>';
						Title='<?=$goSetStat.$goRead?>';
					}
					$(messRow).attr('bgcolor',bckgr);
					$(messReadDateLink).html(Html).attr('title',Title);
				}else if(action=='delete'){ // Удалить сообщение
					$(messRow).css('display','none');
				}
				console.info('handleMess(action:'+action+')->success');
			},
			error: function (data) {
				alert("Не удалось отправить данные.\n"+data);
				console.info('handleMess(action:'+action+')->error');
			}
		});
	}
  }catch(e){
	alert(e.message);
  }
}
/**
 * Описание
 * @package
 * @subpackage
 */
function handleReadStatus(data,message_id){
	if (!message_id)
		message_id=data['id'];
	$('table#tblMess tr')
			.each(function(index) {
				if (index>0)
					$(this).removeAttr('style','background-color');
		});
		// для активной строки:
		$('#message_'+message_id)
			.attr('bgcolor','<?=$white?>') // установить фон прочтённого
			.css('background-color','<?=$light_orange?>') // стиль активного
				.children('td') // ячейки с датой прочтения
					.children('a[data-read-status]') // ссылка с датой
					.text(data['date']); // дата прочтения
		console.info('data[date] = '+data['date']);
		if (data['date']) 
			$('table#tblMess > tr td').eq(1).html(setReadMessageDate(message_id,data['date']));// ссылка с датой прочтения	
}

/**
 * Обработать область сообщения после его отправки
 */
function handleMessAreaAfterPost(messageText,headerTextStatic){
	$('#sel_mess').fadeIn(150).html(messageText);
	$('#message_fields').fadeOut(150);
	$('#pickup_obj').fadeOut(150);
	if (headerTextStatic) $('#message_header').html(headerTextStatic);
}
/**
 * Загрузить сообщение
 */
function loadMess(message_id){
  try{ 
  	var uData="option=com_ajax&object=message&action=get&object_id="+message_id+"&user_id_read=<?=$user_id?>";
	var nw=false;
	if (nw) 
		takeTest(uData);
  	else{
		$.ajax({
			type: "POST",//GET
			url:requestPage, 			
			dataType: 'json',
			data: uData,
			/*beforeSend: function() {},*/
			success: function (data) {
				handleMessAreaAfterPost(data['message']);
				handleReadStatus(data,message_id);
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
 * Отправить сообщение методом Post
 */
function sendPostAjax(txtAreaID){
  try{
	// content
	var messageContent = "object=message&action=send&<?=$get_layout?>_id=<?=$object_id?>&user_id_from=<?=$user_id?>&user_id_to=<?=$user_id_to?>&subject=" + $('#subject').val() + "&message=" + $('#message').val(); 
	if ($('#attachObjects input[type="radio"]:checked').size()>0){
		console.info('checked!');
		var pickupObjectType=$('input[type="radio"][id^="pickupObjectType_"]:checked').val();
		var obdata,selVal,mAlert,rchecked=false;
		if (pickupObjectType=='site'){
			selVal=$('#collections_ids_array').val();
			mAlert='id сайта';
			obdata='collections_ids_array='+selVal;
		}
		else if (pickupObjectType=='components'){
			selVal=$('input[type="radio"][id^="component"]:checked').val();
			mAlert='# заказа';
			obdata='component='+selVal;
		}
		if (selVal=='0'){
			alert('Вы не указали '+mAlert+'объекта сообщения');
			return false;
		}else
			messageContent+='&pickupObjectType='+pickupObjectType+'&'+obdata;
	}
	console.info('messageContent: '+messageContent); return false;
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
					$('table#tblMess tbody tr:first-child')
						.after('<tr bgcolor="<?=$white?>" style="background-color:<?=$light_orange?>;">'+/*
						*/'<td>'+data['id']+'</td>'+/*
						*/'<td>&nbsp</td>'+/*
						*/'<td>'+setReadMessageDate(data['id'],data['date_time'])+'</td>'+/*
						*/'<td>Я</td>'+/*
						*/'<td>'+setReadMessageDate(data['id'],data['date_time'])+'</td>'+/*
						*/'<td>files</td>'+/*
						*/'<td><a href="#" data-subject="'+data['id']+'">'+data['subject']+'</a></td>'+/*
						*/'<td align="center"><a href="#" data-delete="'+data['id']+'" <?=$del_title;?>><img src="<?=$del_img?>"></a></td>'+/*
						
					*/'</tr>');
					handleMessAreaAfterPost(data['message'],'Отправленное сообщение:');
					handleReadStatus(data);
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
 * Прописать дату прочтения сообщения
 */
function setReadMessageDate(message_id,readStatus){
	var linkContent='<a data-read-status="'+message_id+'" title="<?=$goSetStat.$goUnRead?>" href="#">'+readStatus+'</a>';
	// console.info();
	return linkContent;
}

/*******************************************************
/**
 * Загрузить страницу в тестовом режиме в новой вкладке
 * @package
 * @subpackage
 */
function takeTest(uData){
	window.open(requestPage+'?'+uData+'&take_test=1','test');
}
</script>