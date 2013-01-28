<script type="text/javascript">
/*	страницы со сборкой:
	/administrator/components/com_collector1/helpers/messages
*/
$(function(){
		//
		requestPage='<?=JUri::root()?>index.php';
		// 
		$('input[type="radio"][id^="pickupObjectType_"]')
			.click( function(){
				$('div.hidden').fadeOut(250);
				$('div.hidden#'+this.id+'_obj').fadeIn(250);
			});
		// 
		$('input[type="radio"][id^="component"]')
			.click( function(){
				var tWrapper=$(this).parent();
				$('div.orders_wrapper').fadeTo(150,0.5,function(){
					$(tWrapper).css('opacity',1);	
				});
		});
		$('input[type="radio"][id^="collections_ids_array"]')
			.click( function(){
				$('div#cids_wrapper label').removeAttr('style');
				$(this).parent('label').css('background-color','orange');	
			});
		//
		$('a[data-read-status]').click( function(){
				handleMess($(this).attr('data-read-status'),'switch_read_status',this);
				return false;
			});
		$('a[data-read-status]').live('click',function(){
				handleMess($(this).attr('data-read-status'),'switch_read_status',this);
				return false;
			});
		$('a[data-subject]').click( function(){ console.info('go loadMess')
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
 * Переключить статус прочтения сообщения или "удалить" его
 */
function handleMess(message_id,action,goLive){
  try{  console.info('message_id,action = '+message_id+', '+action);
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
				var Bckgr,Html,Title;
				
				if (action=='switch_read_status'){	
					Html=data;
					console.info('color: '+$(messRow).attr('bgcolor')+' : <?=$white?>, Html = '+Html);
					if ($(messRow).attr('bgcolor')=='<?=$white?>'){ // уже прочтено
						bckgr='<?=$grey?>';// назначить серый фон строке
						Title='<?=$goSetStat.$goUnRead?>';// текст title
					}else{
						bckgr='<?=$white?>';
						Title='<?=$goSetStat.$goRead?>';
					}
					$(messRow).attr('bgcolor',bckgr);
					$(goLive).text(Html).attr('title',Title);
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
 * Обработать визуально данные в строке с загруженным сообщением
 * @package
 * @subpackage
 */
function handleActiveRow(data,message_id){
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
function handleMessAreaAfterPost(data,headerTextStatic){
	$('#sel_mess').fadeIn(150).html(data['message']);
	$('#message_fields').fadeOut(150);
	$('#pickup_obj').fadeOut(150);
	var mHeader=$('#message_header');
	if (headerTextStatic) 
		$(mHeader).html(headerTextStatic);
	if ($.isArray(Attaches[data['id']])){
		var attaches=$('<div id="dAttaches">'),attcontent='<h4 class="marginBottom8">Вложенные файлы:</h4>',linkToFile,ext;
		$(attaches).attr({
			class:'messLoadedArea'
		});
		for(var key in Attaches[data['id']]) {
			if (Attaches[data['id']].hasOwnProperty(key)) {
				linkToFile=Attaches[data['id']][key];
				ext=linkToFile.substring(linkToFile.lastIndexOf("."));
				attcontent+='<div style="padding:2px;"><a href="<?=JUri::root()?>components/com_collector1/attaches/'+key+ext+'">'+linkToFile+'</a></div>';
		  	}
		}
		$(attaches).html(attcontent);
		$(mHeader).parent().after($(attaches))
	}else{
		$('#dAttaches').remove();
	}
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
				//console.info('DATA ID = '+data['id']);
				var mData=new Array();
				mData['id']=message_id;
				mData['message']=data['message'];
				handleMessAreaAfterPost(mData);
				handleActiveRow(data,message_id);
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
	// не отметили объект сообщения:
	if (!$('#attachObjects input[type="radio"]:checked').size()){
		alert('Отметьте объект сообщения');
		$('#attachObjects').css('background-color','lightyellow');
		return false;
  	}
	if ($('#attachObjects input[type="radio"]:checked').size()>0){
		// console.info('checked!');
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
	
	var att=0;
	$('div#files_container input[id^="fileField_"]').each( function() {
		if ($(this).val()) {
			att++;
			return false;
		}
    });
    if (att>0) // разместили файлы для отсылки - будем использовать форму
		$('#send_message_form').submit();
	else{
		// content
		var messageContent = "object=message&action=send<? 	
		if($get_layout):?>
&<?=$get_layout?>_id=<? echo $object_id;
		endif;?>&user_id_from=<?=$user_id?>&user_id_to=<?=$user_id_to?>&subject=" + $('#subject').val() + "&message=" + $('#message').val(); 
		// console.info('messageContent: '+messageContent); // return false;
		var uData="option=com_ajax&"+messageContent;
		
		
		var nw=false;
		if (nw) 
			takeTest(uData); // take_test param is already included
		else{
			$.ajax({
				type: "POST",// "GET"
				url:requestPage, // 		
				dataType: 'json',
				data: uData,
				/*beforeSend: function() {},*/
				success: function (data) {
						$('table#tblMess tbody tr:first-child')
							.after('<tr id="message_'+data['id']+'" bgcolor="<?=$white?>" style="background-color:<?=$light_orange?>;">'+/*
							*/'<td>'+data['id']+'</td>'+/*
							*/'<td>&nbsp</td>'+/*
							*/'<td>'+setReadMessageDate(data['id'],data['date_time'])+'</td>'+/*
							*/'<td>Я</td>'+/*
							*/'<td>'+setReadMessageDate(data['id'],data['date_time'])+'</td>'+/*
							*/'<td>files</td>'+/*
							*/'<td><a href="#" data-subject="'+data['id']+'">'+data['subject']+'</a></td>'+/*
							*/'<td align="center"><a href="#" data-delete="'+data['id']+'" <?=$del_title;?>><img src="<?=$del_img?>"></a></td>'+/*
							
						*/'</tr>');
						console.info('id = '+data['id']+', subject = '+data['subject']+', message = '+data['message']+', file_names = '+data['file_names']);
						handleMessAreaAfterPost(data,'Отправленное сообщение:');
						handleActiveRow(data);
					},
				error: function (data) {
					alert("Не удалось отправить данные.\nОтвет: "+data.result);
				}
			});
		}	
	}
  }catch(e){
	  alert(e.message);
  }
}
/**
 * Прописать дату прочтения сообщения
 */
function setReadMessageDate(message_id,readStatus){
	//var readTime=new Date();
	var sTime=readStatus.substr(11); 
	console.info('sTime = '+sTime);
	var linkContent='<a href="#" data-read-status="'+message_id+'" title="'+sTime+'\n<?=$goSetStat.$goUnRead?>">'+readStatus+'</a>';
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