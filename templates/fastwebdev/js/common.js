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
function changeFieldValue(fieldID,user_id){
  try{
	var fieldValue=document.getElementById(fieldID).value;
	var mess=false;
	if (!fieldValue||fieldValue==' ')
		mess='Редактируемое поле не заполнено!';
	else if(fieldID.indexOf('email')!=-1){ // email?
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(fieldValue)) {
			mess='Емэйл указан некорректно!';
		}
	}
	if (mess){
		alert(mess);
	}else{
		//go to script
		// Адрес текущей страницы
		var url = 'index.php?option=com_ajax&format=raw&action=update&object=precustomer_data&user_id='+user_id; // e.g. 25.2.doc
		// Объект XMLHttpRequest
		var request = getXmlHttpRequest();

		var domain='http://'+window.location.hostname;
		if (window.location.hostname.indexOf('localhost')!=-1) domain+='/webapps';
		url=domain+'/'+url;
		alert(url);
		// Запрос на сервер
		request.open("GET", url, false);
		request.send(null);
		// Чтение ответа
		if (request.responseText.indexOf('ОШИБКА:')!=-1) {
			alert('Bad request. ResponseText: '+request.responseText);
		}else{
			//var tLink=event_source_object.parentNode.parentNode.style.display='none'; //div
		} 
		var wtest1=0; // если надо протестироваться
		if (wtest1>0) window.open(url,'ajax');
	}
  }catch(e){
		alert(e.message);
  }
}
// сбросить состояние редактирования:
function cancelEditableField(outerContainer,skipNodeId,style){
  try{	
	var sourceNode=document.getElementById(skipNodeId);
	outerContainer.innerHTML='<'+sourceNode.tagName+' id="'+sourceNode.id+'" class="'+sourceNode.className+'" ondblclick="makeObjectEditableField(this);" title="DblClick">'+sourceNode.innerHTML+'</'+sourceNode.tagName+'>';
  }catch(e){
	  alert('cancelEditableField ERROR: '+e.message);
  }
}
//преобразовать текст в редактируемое поле
function makeObjectEditableField( tObject, // text container
								  user_id, // user data
								  newElementType
								){
  try{
	var OuterNode=tObject.parentNode; // TD
	if (!newElementType) newElementType='input';
	if (tObject.style.display!='none'){ 
		var objContent=tObject.innerHTML; 
		var editableField=document.createElement(newElementType);
		var fieldCommands=document.createElement('span');
		editableField.id=tObject.id.substr(1); // set id to field
		editableField.className='madeEditable';
		OuterNode.appendChild(editableField); // field
		OuterNode.appendChild(fieldCommands); // commands - OK, cancel
		if (newElementType=='input') editableField.value=objContent; 
		fieldCommands.innerHTML='<img src="templates/bluestork/images/menu/icon-16-apply.png" style="width:16px; height:16px; margin-left:10px;" onClick="changeFieldValue(\''+editableField.id+'\',\''+user_id+'\');" title="Подтвердить"><img src="templates/bluestork/images/menu/return_back.png" style="width:16px; height:16px; margin-left:6px;" onClick="cancelEditableField(this.parentNode.parentNode,\''+tObject.id+'\');" title="Отменить изменения">';
		tObject.style.display='none';
	}else{
		OuterNode.innerHTML='<'+tObject.tagName+' id="'+tObject.id+'" class="'+tObject.className+'" ondblclick="makeObjectEditableField(this);" title="DblClick">'+tObject.innerHTML+'</'+tObject.tagName+'>';
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