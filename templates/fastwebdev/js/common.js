// JavaScript Document
//добавить/удалить поле загрузки файла
function addFileField(action,pNode){
	try{	
		d=document;
		var files_container=d.getElementById('files_container');
		var divs=files_container.getElementsByTagName('div');
		var divslength=divs.length;
		if (action=='add'){
			var prevDiv=divs.item(divslength-1);//div
			var prevInput=prevDiv.getElementsByTagName('input').item(0); //file_field
			var divToClone=prevDiv.innerHTML;
			var newFileField=d.createElement("DIV");
			newFileField.innerHTML=divToClone;
			newFileField.className='put_file_field';
			files_container.appendChild(newFileField);
			//получить #id клонируемого поля:
			var numID=parseInt(prevInput.id.substring(prevInput.id.lastIndexOf("_")+1))+1;
			var newID='fileField_'+numID.toString();
			//получить поле файла:
			var newInput=newFileField.getElementsByTagName('input').item(0); 
			//назначить name, id:
			newInput.setAttribute('name',newID);
			newInput.id=newID;
		}else if(action=='remove'){
			if (divslength>1) pNode.parentNode.removeChild(pNode);
			else {
				pNode.parentNode.getElementsByTagName('input').item(0).value='';
				//alert('Последнее поле удалению не подлежит');
			}
		}
	}catch(e){
		alert(e.message);
	}
	return false;
}
//
function askToSignUp(go_signup){
	if (confirm('Чтобы изменить набор опций любого своего сайта, вам нужно добавить к своим данным логин и пароль.\nХотите сделать это сейчас?'))
		location.href=go_signup;
}
//
function goNewSite(site_id){
	try{
		var aSite=document.getElementById('site_'+site_id);
		var position = $(aSite).offset().top;
		$("html, body").animate({scrollTop:position},1000)
		return false;
	}catch(e){
		alert(e.message);
	}
}
//дата завершения заказа
function dateValidation(dataField){
	//date format validation:
	var validformat=/^\d{4}\-\d{2}\-\d{2}$/ ;
	var returnval=false;
	if(!dataField.value||dataField.value==''){
		alert("Вы не указали дату!");
		return false;
	}else if(!validformat.test(dataField.value)){
		alert("Неправильный формат даты!");
		dataField.style.background='yellow';
		return false
	}
	return true;		
}
//
function changeFieldValue(fieldID,user_type){
  try{
	var user_id=fieldID.substr(0,fieldID.indexOf("__"));
	var field_name=fieldID.substr(fieldID.indexOf("__")+2);
	var fieldValue=document.getElementById(fieldID).value;
	var sourceContainerID=user_id+'_'+field_name;
	var mess=false;
	if(fieldID.indexOf('email')!=-1){ // email?
		if (!fieldValue||fieldValue==' ')
			mess='Редактируемое поле не заполнено!';
		else{
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(fieldValue)) {
				mess='Емэйл указан некорректно!';
			}
		}
	}else if( fieldID.indexOf('skype')!=-1
			  || fieldID.indexOf('phone')!=-1
  			  || fieldID.indexOf('mobila')!=-1
  			  || fieldID.indexOf('icq')!=-1
  			  || fieldID.indexOf('gtalk')!=-1
			){
		fieldValue=fieldValue.replace(/\s/g,''); //удалить все пробелы
	}
	if (mess){ // поле не заполнено
		alert(mess);
	}else{
		//go to script
		// Адрес текущей страницы
		var url = 'index.php?option=com_ajax&format=raw&action=update&object='+user_type+'&data_type='+field_name+'&data_value='+fieldValue+'&user_id='+user_id; // e.g. 25.2.doc
		// Объект XMLHttpRequest
		var request = getXmlHttpRequest();
		var domain='http://'+window.location.hostname;
		if (window.location.hostname.indexOf('localhost')!=-1) domain+='/webapps';
		url=domain+'/'+url;
		//alert(url);
		// Запрос на сервер
		request.open("GET", url, false);
		request.send(null);
		// Чтение ответа
		if (request.responseText.indexOf('ОШИБКА:')!=-1) {
			alert('Bad request. ResponseText: '+request.responseText);
		}else{ // сбросить состояние редактирования для поля с исходными данными:
			var sourceContainer=document.getElementById(sourceContainerID);
			sourceContainer.innerHTML=fieldValue;
			makeObjectEditableField(sourceContainer,user_type); // вернуть объектам прежнее отображение
		} 
		var wtest1=0; // если надо протестироваться
		if (wtest1>0) window.open(url,'ajax');
	}
  }catch(e){
		alert(e.message);
  }
}
//преобразовать текст в редактируемое поле
function makeObjectEditableField( tObject, // text container // this // <SPAN>Content</SPAN>
								  user_type,
								  newElementType
								){
  try{
	if (!newElementType) newElementType='input';
	var spaces=" &nbsp; &nbsp; &nbsp; &nbsp; ";
	var user_id=tObject.id.substr(0,tObject.id.indexOf("_"));
	var OuterNode=tObject.parentNode; // TD
	var spanComType;
	if (tObject.innerHTML==' '||!tObject.innerHTML) {
		tObject.innerHTML=spaces;
		tObject.className='addDataInPlace';
		spanComType='add';
	}else{
		tObject.className='pseudo_link_dotted';
		spanComType='edit';
	}
	//spanComType=(tObject.className.indexOf('addDataInPlace')!=-1)? 'add':'edit';
	//БЛОК с данными отображён; переключиться на режим редактирования:
	if (tObject.style.display!='none'){	// режим по умолчанию 
		var objContent=tObject.innerHTML; // контент поля с данными 
		var editableField=document.createElement(newElementType); // редактируемое поле для перенесения статических данных 
		var fieldCommands=document.createElement('span'); // динамически создаваемый блок с командами для редактируемого поля
		editableField.id=user_id+'__'+tObject.id.substr(tObject.id.indexOf("_")+1); //43__email
		editableField.className='madeEditable';
		OuterNode.appendChild(editableField); // field
		OuterNode.appendChild(fieldCommands); // commands - OK, cancel
		if ( newElementType=='input'
		     && spanComType=='edit'
		   ) editableField.value=objContent; 
		//alert('none');
		if (tObject.innerHTML==spaces) editableField.value=''; 
		var allCommands='<img title="Подтвердить" src="templates/bluestork/images/menu/icon-16-apply.png" style="width:16px; height:16px; margin-left:10px;" ';
		allCommands+='onClick="changeFieldValue(\''+editableField.id+'\',\''+user_type+'\');">';		
		allCommands+='<img title="Отменить изменения" src="templates/bluestork/images/menu/return_back.png" style="width:16px; height:16px; margin-left:6px;" '; 
		allCommands+='onClick="makeObjectEditableField(document.getElementById(\''+tObject.id+'\'),\''+user_type+'\',\''+newElementType+'\');">';	
		
		fieldCommands.innerHTML=allCommands;		
		
		tObject.style.display='none';
	
	}else{	//выйти из режима редактирования
		// <TD><SPAN>Content</SPAN></TD>
		var spanEvent;
		if(spanComType=='edit') {
			spanEvent='ondblclick';
		}
		else spanEvent='onclick'; //alert('OuterNode HTML 1:\n'+OuterNode.innerHTML);
		OuterNode.innerHTML='<'+tObject.tagName+' id="'+tObject.id+'" class="'+tObject.className+'" '+spanEvent+'="makeObjectEditableField(this);" title="'+spanEvent+'">'+tObject.innerHTML+'</'+tObject.tagName+'>'; //alert('OuterNode HTML 2:\n'+OuterNode.innerHTML);
	}
  }catch(e){
	alert(e.message);
  }
}
//переключатель видимости блока
function manageBlockDisplay(obj){ //parentNode
	var tBlock;
	tBlock=(typeof(obj)=='string')? document.getElementById(obj):obj.getElementsByTagName('div').item(1);
	tBlock.style.display=(tBlock.style.display=='none')? 'block':'none';
}
function scrollToY(elementID){
	try{
		window.scrollTo(0,document.getElementById(elementID).offsetTop);
	}catch(e){
		alert(e.message);
	}
}
/*	AJAX	*/
/*
** Функция возвращат объект XMLHttpRequest
*/
function getXmlHttpRequest() { 
	if (window.XMLHttpRequest) {
		try {
			return new XMLHttpRequest();
		}catch (e){
			alert (e.message);
		}
	} else if (window.ActiveXObject) {
		try {
			return new ActiveXObject('Msxml2.XMLHTTP');
		}catch (e){
			alert (e.message);
		}
		try {
			return new ActiveXObject('Microsoft.XMLHTTP');
		}catch (e){
			alert (e.message);
		}
	}
	return null;
}
// удалить файл из коллекции/заказа:
function deleteFile( event_source_object,
					 file_name // like 's25.16', - 'site' + collection id + file number
				   ){ //alert(file_name);
	try{
		if(confirm('Подтверждаете удаление файла?')) {
			//go to script
			// Адрес текущей страницы
			var url = 'index.php?option=com_ajax&format=raw&action=delete&object=file&file_id='+file_name; // e.g. 25.2.doc
			// Объект XMLHttpRequest
			var request = getXmlHttpRequest();
			// Запрос на сервер
			request.open("GET", url, false);
			request.send(null);
			// Чтение ответа
			if (request.responseText.indexOf('ОШИБКА:')!=-1) {
				alert('Bad request. ResponseText: '+request.responseText);
			}else{
				var tLink=event_source_object.parentNode.parentNode.getElementsByTagName('A').item(0).getElementsByTagName('SPAN').item(0);
				tLink.style.textDecoration='line-through'; //SPAN
				tLink.style.color="#999"; //SPAN
				event_source_object.style.visibility='hidden';
			} 
			var wtest1=0;
			if (wtest1>0) window.open(url,'ajax');
		}
	}catch(e){
		alert(e.message);
	}
	return false;
}
// удалить компонент из заказа:
function deleteComponent( event_source_object,
					 	  component_id // like 's25.16', - 'site' + collection id + file number
				   		){ //alert(file_name);
	try{
		if(confirm('Подтверждаете удаление компонента из набора?')) {
			//go to script
			// Адрес текущей страницы
			var url = 'index.php?option=com_ajax&format=raw&action=delete&object=component&component_id='+component_id; // e.g. 25.2.doc
			// Объект XMLHttpRequest
			var request = getXmlHttpRequest();
			// Запрос на сервер
			request.open("GET", url, false);
			request.send(null);
			// Чтение ответа
			if (request.responseText.indexOf('ОШИБКА:')!=-1) {
				alert('Bad request. ResponseText: '+request.responseText);
			}else{
				var tLink=event_source_object.parentNode.parentNode.style.display='none'; //div
			} 
			var wtest1=0; // если надо протестироваться
			if (wtest1>0) window.open(url,'ajax');
		}
	}catch(e){
		alert(e.message);
	}
	return false;
}
// удалить заказ:
function deleteOrder( event_source_object,
					  order_id // like 's25.16', - 'site' + collection id + file number
				   	){ //alert(file_name);
	try{
		if(confirm('Подтверждаете удаление всего заказа?')) {
			//go to script
			// Адрес текущей страницы
			var url = 'index.php?option=com_ajax&format=raw&action=delete&object=order&order_id='+order_id; // e.g. 25.2.doc
			// Объект XMLHttpRequest
			var request = getXmlHttpRequest();
			// Запрос на сервер
			request.open("GET", url, false);
			request.send(null);
			// Чтение ответа
			if (request.responseText.indexOf('ОШИБКА:')!=-1) {
				alert('Bad request. ResponseText: '+request.responseText);
			}else{
				alert('Заказ удалён.');
				var comp_num=document.getElementById('components_number')
				comp_number=comp_num.innerHTML;
				if (parseInt(comp_number)) {
					comp_number--;
					comp_num.innerHTML=comp_number;
				}
				var tLink=event_source_object.parentNode.parentNode.parentNode.style.display='none'; //tr
			} 
			var wtest1=0;
			if (wtest1>0) window.open(url,'ajax');
		}
	}catch(e){
		alert(e.message);
	}
	return false;
}
// поискать и подставить имя, телефон и скайп
function seekDataRest(email){ // name, phone, skype
	try{ // alert('email');
		var Cell;
		var arrFields=new Array('name','phone','skype');
		//go to script
		var url = 'index.php?option=com_ajax&format=raw&action=find&object=contact_data&email='+email; // e.g. fedja@mail.ru
		// Объект XMLHttpRequest
		var request = getXmlHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState != 4) return;
			// Очистка предыдущих результатов
			for(i=0,j=arrFields.length;i<j;i++) {
				Cell=document.getElementById(arrFields[i]);
				Cell.value='';
				Cell.style.backgroundColor='';
			}
			if ( request.status == 200 ) {
            	//object = JSON.parse(request.responseText);
				//alert(200);
				
        	} else {
            	alert( "There was a problem with the URL." );
        	}
			//alert(JSON.parse(request.responseText));
			// Обработка JSON пакета
			//if (!(arrGotFields = JSON.parse(request.responseText))) alert('! arrGotFields');			 
			var arrGotFields=request.responseText.split("|");
			// Отображение книг
			for (i=0,j=arrGotFields.length;i<j;i++) {
				Cell=document.getElementById(arrFields[i]);
				Cell.value=arrGotFields[i];
				Cell.style.backgroundColor='#E6FFD6';
				Cell.style.border='solid 1px #ccc';
				Cell.style.padding='2px';
			}
		}
		request.open("GET",url,false);
		request.send(null);			
		
		var wtest1=0;
		if (wtest1>0) window.open(url,'ajax');
	}catch(e){
		alert(e.message);
	}
	return false;
}