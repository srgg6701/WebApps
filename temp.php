
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">

<head>

  <base href="http://localhost/webapps/index.php/messages" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>Сообщения</title>
  <link href="http://localhost/webapps/index.php/component/search/?Itemid=400&amp;format=opensearch" rel="search" title="Искать a2allcom_fastweb" type="application/opensearchdescription+xml" />
  <script src="/webapps/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/core.js" type="text/javascript"></script>
  <script type="text/javascript">
function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(3600000); });
  </script>


<script src="/webapps/templates/fastwebdev/js/firefox/correct_submenu_position.js" type="text/javascript"></script>

<script src="/webapps/templates/fastwebdev/js/jquery-1.7.1.min.js" type="text/javascript"></script>

<script src="/webapps/templates/fastwebdev/js/json2.js" type="text/javascript"></script>

<script src="/webapps/templates/fastwebdev/js/common.js" type="text/javascript"></script>

<link rel="stylesheet" href="/webapps/templates/fastwebdev/css/style.css" type="text/css">

</head>

<body>

<div style="position:fixed; right:10px; bottom:4px; background:#FFFF00; z-index:1;" class="padding10 bold border_radius"><a href="#" onclick="manageBlockDisplay('debug_menu');return false">Debug</a> 

    <div id="debug_menu" class="padding10 bgSand border_radius" style="position:absolute; bottom:37px; right:0px; display:none; border:solid 1px #FF9900;">

    	<div><a href="/webapps/index.php/component/content/?view=app">Objects</a></div>

    	<div style="white-space:nowrap;"><a href="/webapps/index.php/component/debug/">Tests & Debug</a></div>

        <div><a href="/webapps/index.php/component/content/?view=app&amp;c=debug&amp;task=_session_unset">session_unset</a></div>

    </div>

    </div>

<script type="text/javascript">

//document.getElementById().style.positionBottom='';

</script>

<div id="pseudo_bg">

    <div></div>

</div>

<!-- block that fits space verically -->

<div id="body">

    <!-- main container -->

    <div align="center" class="offsetBottom" id="container">

		<!-- top offset -->

        <div style="height:4px;"></div>

    	<!-- section1 -->

        <div id="section1">

            <div id="logoPanelWrapper">

                <table height="59" width="100%" cellspacing="0" cellpadding="0">

                  <tr>

                    <td align="center" nowrap class="logotype">

          <div title="Разработка web-приложений, CMS, EMS и их компонентов">

          	<a href="/webapps/index.php">WebApps</a>.2-all<span style="color: #F4BD00;">.com</span>  

          </div>

          			</td>

                    <td style="padding-top:2px;">

		  <div id="call_us"><img src="/webapps/templates/fastwebdev/images/1335869184_contact.png" width="24" height="24" hspace="4" align="absmiddle">(904)442-84-47</div></td>

                    <td width="100%" align="right" nowrap id="topSearch">

                            			<div class="moduletable">
					<form action="/webapps/index.php/messages" method="post">

	<div class="search">

		<label for="mod-search-searchword" id="swrd">Искать...</label>

			<input name="searchword" id="mod-search-searchword" maxlength="20"  class="inputbox" type="text" size="40" value="Поиск"  onblur="if (this.value=='') this.value='Поиск';" onfocus="if (this.value=='Поиск') this.value='';" /><input type="submit" value="" class="button" onclick="this.form.searchword.focus();"/>	<input type="hidden" name="task" value="search" />

	<input type="hidden" name="option" value="com_search" />

	<input type="hidden" name="Itemid" value="400" />

	</div>

</form>

		</div>
	

<script type="text/javascript">

document.getElementById('swrd').innerHTML='Найти: ';

function manageLoginDisplay(stat){

	d=document;

	try{

		switch(stat){



			case "exit":

				d.getElementById('login-form').submit();

				//option=com_users

				//task=user.logout

				break;		



			case "menu":

				d.getElementById('div_user_menu').style.display='block';

				break;		



			case "hide_menu":

				d.getElementById('div_user_menu').style.display='none';

				break;		



			default: d.getElementById('login_block').style.display=stat;

		}



	}catch(e){

		alert(e.message);

	}

}

</script>

					</td>

                    <td id="tdLogin">

<img src="/webapps/templates/fastwebdev/images/user24.png" width="22" height="22" align="absmiddle" style="margin-left:10px;" title="ulrich" /><span style="width:62px; padding-left:3px; text-align:left; display:inline-block; overflow:hidden;" title="ulrich">ulrich</span> &nbsp; <a href="javascript:void();" onclick="manageLoginDisplay('exit');">Выход</a>                    <div id="login_block">

                    			<div class="moduletable">
					<form action="/webapps/index.php/messages" method="post" id="login-form">

	<div class="logout-button">

		<input type="submit" name="Submit" class="button" value="Выйти" />

		<input type="hidden" name="option" value="com_users" />

		<input type="hidden" name="task" value="user.logout" />

		<input type="hidden" name="return" value="aW5kZXgucGhwP0l0ZW1pZD00MDA=" />

		<input type="hidden" name="9322703785ca8e018b92aa267f433c3b" value="1" />	</div>

</form>

		</div>
	

                        <div align="right">

                            <div id="close_it"><a href="javascript:void();" onclick="manageLoginDisplay('none');">закрыть</a>

                            </div>

                        </div>

                    </div>

                    </td>

                  </tr>

                </table>

            </div>

        	<!-- Menu panel -->

            <div id="wrapper_menu">

						<div class="moduletable_menu">
					<table cellspacing="0">

  <tr>  

    <td><a href="/webapps/index.php/mission" title="Наша миссия" >Миссия</a>      </td>

    <td><a href="/webapps/index.php/sozdanie-saitov" title="Бесплатный конструктор сайтов" >Собрать сайт</a>      </td>

    <td><a href="/webapps/index.php/order" title="Разработка отдельных компонентов/решений для вашего сайта" >Заказать</a>      </td>

    <td><a href="/webapps/index.php/vopros-otvet" title="Наиболее актуальные вопросы создания вашего сайта" >Вопрос-ответ</a>      </td>

    <td><a href="/webapps/index.php/consulting" title="Лучшие рецепты по выбору оптимальных решений" >Консалтинг бесплатно</a>      </td>

    <td><a href="/webapps/index.php/policy" >Соглашение об услугах</a>      </td>

    <td><a href="/webapps/index.php/partnership" >Партнёрская программа</a>      </td>

  </tr>

</table>



		</div>
	    

    		</div>

            <div id="wrapper_component">

              			

            	<div align="right" id="account_menu"><!--

                

                Состав меню редактируется в разделе Меню -> Мой аккаунт

                

                	-->		<div class="moduletable">
					<table cellspacing="0">

  <tr>  

    <td><a href="/webapps/index.php/my-site-collected" >Cайты</a>      </td>

    <td><a href="/webapps/index.php/my-orders" >Компоненты</a>      </td>

    <td class="tdActive"> <a href="/webapps/index.php/messages" >Сообщения</a>      </td>

    <td><a href="/webapps/index.php/my-data" >Мои данные</a>      </td>

    <td><a href="/webapps/index.php/my-balance" >Мой баланс</a>      </td>

  </tr>

</table>



		</div>
	

                </div>

                            <!-- system messages -->

  				
<div id="system-message-container">
</div>

				<div id="com" class="offsetAuthorized">

                	

			    

					﻿<div style="clear:both;margin-top:10px;"></div>

<div style="display:inline-block; vertical-align:top; max-width:50%;">

	<h4 class="marginBottom8">Список сообщений &nbsp; | &nbsp; <a href="javascript:void();" onClick="composeMessageDisplay();" style="font-weight:200;">Добавить сообщение...</a></h4>
<style>

table#tblMess td {
	height:16px;
	overflow:hidden;
	white-space:nowrap;
	max-width:190px;
}
table#tblMess tr[id] > td:first-child +td {
	/*background:#CCFF99;*/
	max-width:70px;
}
table#tblMess tr[id] > td:first-child +td +td {
	/*background: #FCF;*/
	max-width:50px;
}
table#tblMess tr[id] > td:first-child +td +td +td{
	/*background: #FF9;*/
	max-width:90px;
}
</style>
<table cellspacing="0" class="tblMess" id="tblMess">

  <tr class="trMessHeaders">    <td>#</td>

    <td>Создано</td>

    <td>От кого</td>

    <td>Прочтено</td>

    <td>Тема</td>

    <td align="center" style="background:#FFC;"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></td>  
    </tr>

  <tr bgcolor="#EDEDED" id="message_10">

    <td>10</td>

    <td>26.08.2012 21:27</td>

    <td>      Я

    </td>

    <td><a href="/webapps/void();" onClick="return handleMess(10,'switch_read_status');" title="Пометить как прочтённое">не прочтено</a></td>

    <td><a href="javascript:void();" onClick="return loadMess(10);">Второе от Ульриха однака</a> there comes another one. Such an issue!    </td>

    <td align="center"><a href="/webapps/void();" onClick="return handleMess(10,'delete');" title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>

  </tr>

  <tr bgcolor="#EDEDED" id="message_9">

    <td>9</td>

    <td>26.08.2012 21:05</td>

    <td>      Я

    </td>

    <td><a href="/webapps/void();" onClick="return handleMess(9,'switch_read_status');" title="Пометить как прочтённое">не прочтено</a></td>

    <td><a href="javascript:void();" onClick="return loadMess(9);">Это Ульрих!</a></td>

    <td align="center"><a href="/webapps/void();" onClick="return handleMess(9,'delete');" title="Удалить сообщение"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>

  </tr>

        

</table>





</div>

<style>

table#tblMess td {

	font-size:0.9em;

}

textarea#message{

	width:97%;

	margin-bottom:8px;

}

</style>

<div style="display:inline-block;width:50%;">

	<div class="paddingLeft10">

    <h4 id="message_header" class="marginBottom8 paddingLeft10">Текст сообщения</h4>

    <div id="message_content" class="messContent">

    	<div id="sel_mess">Выберите сообщение</div>

        <div id="message_fields" style="display:none;">

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

﻿<script type="text/javascript">

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

requestPage = "http://localhost/webapps/index.php?option=com_ajax"; // стр. отправки данных



/**

 * Управление отображением блока с сообщением

 */

function composeMessageDisplay(rev){

  try{

	var headerTextHolder,textAreaDisplay,messageTextHolderDisplay;

	if (rev){

		headerTextHolder='Текст сообщения'; // 'Текст сообщения'

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

	var messageContent = preMess = "object=message&action=send&_id=&user_id_from=63&user_id_to=";

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

								newMessRow.innerHTML+='<td><a onclick="return loadMess('+jData['id']+');" href="javascript:void();">'+tdContent+'</a></td>';						

								break;							

							default:

								if (key!="message") 

									newMessRow.innerHTML+='<td>'+tdContent+'</td>';						

						}

					}

					newMessRow.bgColor='#FFF';

					newMessRow.style.backgroundColor='#FFE3AA';

					newMessRow.innerHTML+='<td align="center"><a title="Удалить сообщение" onclick="return handleMess('+jData['id']+',\'delete\');" href="/webapps/void();"><img src="http://localhost/webapps/administrator/templates/bluestork/images/menu/icon-16-trash.png" width="16" height="16"></a></td>';

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

	return '<a title="Пометить как непрочтённое" onclick="return handleMess('+message_id+',\'switch_read_status\');" href="/webapps/void();">'+tdContent+'</a>';

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

	var messageContent = "object=message&action=get&object_id="+message_id+"&user_id_read=63"; //alert(messageContent);

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

					rows.item(i).style.backgroundColor='#FFF'; // 

				var tRow=d.getElementById('message_'+message_id); // получить активную строку

				tRow.style.backgroundColor='#FFE3AA'; // назначить стиль фона активной строки	

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

	var url = requestPage+"&object=message&action="+action+"&object_id="+message_id+"&user_id=63"; //alert(messageContent);

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

					if (messRow.bgColor=='#FFF') { // уже прочтено

						messRow.bgColor='#EDEDED'; // назначить серый фон строке

						messReadDateLink.innerHTML='не прочтено'; // текст ссылки

						messReadDateLink.title='Пометить как непрочтённое'; // текст title

					}else{

						messRow.bgColor='#FFF';

						messReadDateLink.innerHTML=req.responseText;

						messReadDateLink.title='Пометить как прочтённое';

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



                        

                        

                   	    

                    <!--/COM-->

           		</div>

                <!--/WRAPPER_COMPONENT-->

			</div>

            <!--/SECTION 1-->

    	</div><!-- /section1 -->

        <!--/CONTAINER-->

	</div><!-- /main container -->

    <!--/BODY-->

</div><!-- /body -->    

<div id="footer">

	<center>

			<div class="moduletable">
					<table cellspacing="0">

  <tr>  

    <td><a href="/index.php" >На главную</a>      </td>

    <td><a href="/webapps/index.php/pay-ways" >Способы оплаты</a>      </td>

    <td><a href="/webapps/index.php/agreement" >Пользовательское соглашение</a>      </td>

    <td><a href="/webapps/index.php/feedback" >Обратная связь</a>      </td>

  </tr>

</table>



		</div>
	

    </center>

</div>



</body>

</html>