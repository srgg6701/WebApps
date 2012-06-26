
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">

<head>

  <base href="http://localhost/webapps/index.php" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>Собрать сайт</title>
  <link href="http://localhost/webapps/index.php/component/search/?Itemid=103&amp;format=opensearch" rel="search" title="Искать a2allcom_fastweb" type="application/opensearchdescription+xml" />
  <link rel="stylesheet" href="/webapps/media/system/css/calendar-jos.css" type="text/css"  title="Зеленый"  media="all" />
  <link rel="stylesheet" href="/webapps/media/cms/css/debug.css" type="text/css" />
  <script src="/webapps/media/system/js/calendar-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/calendar-setup-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/mootools-core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/mootools-more-uncompressed.js" type="text/javascript"></script>
  <script type="text/javascript">
Calendar._DN = new Array ("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"); Calendar._SDN = new Array ("Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"); Calendar._FD = 0; Calendar._MN = new Array ("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"); Calendar._SMN = new Array ("Янв", "Фев", "Март", "Апр", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт", "Нояб", "Дек"); Calendar._TT = {};Calendar._TT["INFO"] = "О календаре"; Calendar._TT["ABOUT"] =
 "DHTML Date/Time Selector\n" +
 "(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
"For latest version visit: http://www.dynarch.com/projects/calendar/\n" +
"Distributed under GNU LGPL.  See http://gnu.org/licenses/lgpl.html for details." +
"\n\n" +
"Выбор даты:\n" +
"- Чтобы выбрать год, используйте кнопками < и > \n" +
"- Чтобы выбрать месяц воспользуйтесь кнопками < и > \n" +
"- Удерживайте кнопку мыши на любой из кнопок, расположенных выше, для быстрого выбора.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Time selection:\n" +
"- Click on any of the time parts to increase it\n" +
"- or Shift-click to decrease it\n" +
"- or click and drag for faster selection.";

		Calendar._TT["PREV_YEAR"] = "Нажмите, что бы перейти на предыдущий год. Нажмите и удерживайте для показа списка лет."; Calendar._TT["PREV_MONTH"] = "Нажмите, что бы перейти на предыдущий месяц. Нажмите и удерживайте для показа списка месяцев."; Calendar._TT["GO_TODAY"] = "Текущая дата"; Calendar._TT["NEXT_MONTH"] = "Нажмите, что бы перейти на следующий месяц. Нажмите и удерживайте для показа списка месяцев."; Calendar._TT["NEXT_YEAR"] = "Нажмите, что бы перейти на следующий год. Нажмите и удерживайте для показа списка лет."; Calendar._TT["SEL_DATE"] = "Выбор даты."; Calendar._TT["DRAG_TO_MOVE"] = "Потяните, чтобы переместить"; Calendar._TT["PART_TODAY"] = "Сегодня"; Calendar._TT["DAY_FIRST"] = "Показывать первые %s"; Calendar._TT["WEEKEND"] = "0,6"; Calendar._TT["CLOSE"] = "Закрыть"; Calendar._TT["TODAY"] = "Сегодня"; Calendar._TT["TIME_PART"] = "Shift + клик или перетаскивание мышкой позволит изменить значение."; Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d"; Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e"; Calendar._TT["WK"] = "нед."; Calendar._TT["TIME"] = "Время:";
window.addEvent('domready', function() {
			$$('.hasTip').each(function(el) {
				var title = el.get('title');
				if (title) {
					var parts = title.split('::', 2);
					el.store('tip:title', parts[0]);
					el.store('tip:text', parts[1]);
				}
			});
			var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false});
		});
window.addEvent('domready', function() {Calendar.setup({
				// Id of the input field
				inputField: "finish_date",
				// Format of the input field
				ifFormat: "%Y-%m-%d",
				// Trigger for the calendar (button ID)
				button: "finish_date_img",
				// Alignment (defaults to "Bl")
				align: "Tl",
				singleClick: true,
				firstDay: 1
				});});
function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(3600000); });
  </script>


<script src="/webapps/templates/fastwebdev/js/firefox/correct_submenu_position.js" type="text/javascript"></script>

<script src="/webapps/templates/fastwebdev/js/jquery-1.7.1.min.js" type="text/javascript"></script>



<script src="/webapps/templates/_js/common.js" type="text/javascript"></script>



<link rel="stylesheet" href="/webapps/templates/fastwebdev/css/style.css" type="text/css">

</head>

<body>

<div style="position:fixed; right:10px; bottom:4px; background:#FFFF00; z-index:1;" class="padding10 bold border_radius"><a href="#" onclick="manageBlockDisplay('debug_menu');return false">Debug</a> 

    <div id="debug_menu" class="padding10 bgSand border_radius" style="position:absolute; bottom:37px; right:0px; display:none; border:solid 1px #FF9900;">

    	<div><a href="/webapps/index.php/component/content/?view=app">Objects</a></div>

    	<div><a href="/webapps/index.php/component/content/?view=app&amp;c=debug">test</a></div>

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
					<form action="/webapps/index.php?Itemid=103" method="post">

	<div class="search">

		<label for="mod-search-searchword" id="swrd">Искать...</label>

			<input name="searchword" id="mod-search-searchword" maxlength="20"  class="inputbox" type="text" size="40" value="Поиск"  onblur="if (this.value=='') this.value='Поиск';" onfocus="if (this.value=='Поиск') this.value='';" /><input type="submit" value="" class="button" onclick="this.form.searchword.focus();"/>	<input type="hidden" name="task" value="search" />

	<input type="hidden" name="option" value="com_search" />

	<input type="hidden" name="Itemid" value="103" />

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

&nbsp; <a href="javascript:void();" onclick="manageLoginDisplay('block');">Вход</a>

                        ::

                        <a href="/webapps/index.php/component/users/?view=registration">Регистрация</a>                    <div id="login_block">

                    			<div class="moduletable">
					<form action="/webapps/index.php?Itemid=103" method="post" id="login-form" >

		<fieldset class="userdata">

	<p id="form-login-username">

		<label for="modlgn-username">Логин</label>

		<input id="modlgn-username" type="text" name="username" class="inputbox"  size="18" />

	</p>

	<p id="form-login-password">

		<label for="modlgn-passwd">Пароль</label>

		<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18"  />

	</p>

		<p id="form-login-remember">

		<label for="modlgn-remember">Запомнить меня</label>

		<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>

	</p>

		<input type="submit" name="Submit" class="button" value="Войти" />

	<input type="hidden" name="option" value="com_users" />

	<input type="hidden" name="task" value="user.login" />

	<input type="hidden" name="return" value="aW5kZXgucGhwP0l0ZW1pZD0xMDM=" />

	<input type="hidden" name="28f4f3ecda19357bb214e27358572ed9" value="1" />	</fieldset>

	<ul>

		<li>

			<a href="/webapps/index.php/component/users/?view=reset">

			Забыли пароль?</a>

		</li>

		<li>

			<a href="/webapps/index.php/component/users/?view=remind">

			Забыли логин?</a>

		</li>

				<li>

			<a href="/webapps/index.php/component/users/?view=registration">

				Регистрация</a>

		</li>

			</ul>

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

    <td><a href="/webapps/index.php/mission" >Миссия</a>      </td>

    <td  class="tdActive"> <a href="/webapps/index.php?Itemid=103" >Собрать сайт</a>      </td>

    <td><a href="/webapps/index.php?Itemid=247" >Заказать</a>      </td>

    <td><a href="/webapps/index.php/vopros-otvet" >Вопрос-ответ</a>      </td>

    <td><a href="/webapps/index.php/consulting" >Консалтинг бесплатно</a>      </td>

    <td><a href="/webapps/index.php/policy" >Соглашение об услугах</a>      </td>

    <td><a href="/webapps/index.php/partnership" >Партнёрская программа</a>      </td>

  </tr>

</table>



		</div>
	    

    		</div>

            <div id="wrapper_component">

                            <!-- system messages -->

  				
<div id="system-message-container">
</div>

				<div id="com">

					﻿﻿﻿﻿﻿﻿<div style="margin:-10px 20px 0px 0px; padding-bottom:10px;">Собранные вами сайты: 	# <a href="/webapps/index.php/component/collector1/?view=collected&amp;collection_id=54">54</a>,	# <a href="/webapps/index.php/component/collector1/?view=collected&amp;collection_id=55">55</a></div>

<div style="margin:10px 10px 20px 0px; padding:10px 20px 20px 10px; background:#FF9;" class="border_radius">

	<p><img src="/webapps/templates/fastwebdev/images/signs/Flag_red.png" width="24" height="24" hspace="6" align="left"><strong>ВНИМАНИЕ!</strong> Для того, чтобы иметь возможность редактировать  опции сайтов и получить доступ ко всем возможностям системы, вам необходимо <a href="/webapps/index.php/component/users/?view=registration&amp;task=fill_precustomer_data" style="text-decoration:underline;"><b>добавить к своим данным логин и пароль</b></a>.</p> 

    <div style="padding-left:10px">Это займёт у вам не более нескольких секунд.</div>

</div>

<form name="form1" method="post" enctype="multipart/form-data" action="/webapps/index.php/component/collector1/collect" onSubmit="return checkRequired();return false;">

    <div>

    	<div class="h2" style="margin-top:0px;">Если вы уже <a href="/webapps/index.php/component/users/?view=registration">зарегистрированы</a>,  <img src="/webapps/templates/fastwebdev/images/user24.png" width="22" height="22" hspace="4" border="0" align="absmiddle"><b><a href="/webapps/index.php/component/users/?view=login">заавторизуйтесь</a>!</b></div>

      <div style="margin:8px 0 12px;">Это позволит вам получить доступ ко всем опциям системы.</div>

      <hr size="2" color="#009900"><br>

    

    <a name="select_site_type" id="select_site_type"></a>

  <label for="select"><h3 class="collector_head">Какой тип сайта вам нужен?</h3></label>

  

  <select name="selectSiteType" id="selectSiteType" onChange="checkRows(this.options[this.selectedIndex].value);">

    <option selected value="0">Выберите из списка</option>

    

    <option value="3">Интернет-магазин</option>

    

    <option value="2">Личный</option>

    

    <option value="1">Корпоративный</option>

    

    <option value="-1">Другое</option>

  </select>

  </div>

<div id="collector_wrapper" style="clear:both;">

<table width="100%" cellpadding="8" cellspacing="0" id="tblCollector" onClick="checkPatchBoxes(this);">

  <tr>

    <th style=" border-right: solid 1px #ccc;border-radius:4px 0 0 0;">&nbsp;</th>

    <th colspan="3" style="background:#FFFFFF;border-radius:0 4px 0 0;">Разделы</th>

    </tr>

  <tr>

      <th align="center" style="background:#F90; color:#FFFFFF;">Опции</th>

	    <th>Публичный<div class="skinny">[public]</div></th>

        <th>Админ<div class="skinny">[admin]</div></th>

        <th>Личный кабинет<div class="skinny">[user]</div></th>

      </tr>

  <tr class="WebShop">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> SMS-информирование</label>

    </td>

	    

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_2_admin" id="2_admin"></td>

        

    <td><input type="checkbox" name="option_2_user" id="2_user"></td>

      </tr>

  <tr class="WebShop">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Запросы актуальности заказа</label>

    </td>

	    

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_3_admin" id="3_admin"></td>

        

    <td><input type="checkbox" name="option_3_user" id="3_user"></td>

      </tr>

  <tr class="WebShop joined_end">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Корзина</label>

    </td>

	    

    <td><input type="checkbox" name="option_1_public" id="1_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_1_user" id="1_user"></td>

      </tr>

	

  <tr class="WebShop">

    <td colspan="4" class="joined">Платежи онлайн</td>

  </tr>

    <tr class="WebShop">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> PayPal</label>

    </td>

	    

    <td><input type="checkbox" name="option_7_public" id="7_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_7_user" id="7_user"></td>

      </tr>

  <tr class="WebShop">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> Webmoney</label>

    </td>

	    

    <td><input type="checkbox" name="option_6_public" id="6_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_6_user" id="6_user"></td>

      </tr>

  <tr class="WebShop">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> Карточкой</label>

    </td>

	    

    <td><input type="checkbox" name="option_4_public" id="4_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_4_user" id="4_user"></td>

      </tr>

  <tr class="WebShop">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> Платёжный шлюз</label>

    </td>

	    

    <td><input type="checkbox" name="option_8_public" id="8_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_8_user" id="8_user"></td>

      </tr>

  <tr class="WebShop joined_end">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> Яндекс.деньги</label>

    </td>

	    

    <td><input type="checkbox" name="option_5_public" id="5_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_5_user" id="5_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> RSS</label>

    </td>

	    

    <td><input type="checkbox" name="option_11_public" id="11_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_11_user" id="11_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Архив материалов</label>

    </td>

	    

    <td><input type="checkbox" name="option_12_public" id="12_public"></td>

        

    <td><input type="checkbox" name="option_12_admin" id="12_admin"></td>

        

    <td><input type="checkbox" name="option_12_user" id="12_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Блог</label>

    </td>

	    

    <td><input type="checkbox" name="option_17_public" id="17_public"></td>

        

    <td><input type="checkbox" name="option_17_admin" id="17_admin"></td>

        

    <td><input type="checkbox" name="option_17_user" id="17_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Добавить статью</label>

    </td>

	    

    <td><input type="checkbox" name="option_14_public" id="14_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_14_user" id="14_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Карта сайта</label>

    </td>

	    

    <td><input type="checkbox" name="option_9_public" id="9_public"></td>

        

    <td><input type="checkbox" name="option_9_admin" id="9_admin"></td>

        

    <td><input type="checkbox" name="option_9_user" id="9_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Облако тегов</label>

    </td>

	    

    <td><input type="checkbox" name="option_20_public" id="20_public"></td>

        

    <td><input type="checkbox" name="option_20_admin" id="20_admin"></td>

        

    <td><input type="checkbox" name="option_20_user" id="20_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Опросы</label>

    </td>

	    

    <td><input type="checkbox" name="option_19_public" id="19_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_19_user" id="19_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Поиск</label>

    </td>

	    

    <td><input type="checkbox" name="option_10_public" id="10_public"></td>

        

    <td><input type="checkbox" name="option_10_admin" id="10_admin"></td>

        

    <td><input type="checkbox" name="option_10_user" id="10_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Рейтинг статьи</label>

    </td>

	    

    <td><input type="checkbox" name="option_15_public" id="15_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_15_user" id="15_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Страница не найдена</label>

    </td>

	    

    <td><input type="checkbox" name="option_13_public" id="13_public"></td>

        

    <td><input type="checkbox" name="option_13_admin" id="13_admin"></td>

        

    <td><input type="checkbox" name="option_13_user" id="13_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Форум</label>

    </td>

	    

    <td><input type="checkbox" name="option_16_public" id="16_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_16_user" id="16_user"></td>

      </tr>

  <tr class="joined_end">

    <td style="padding-left:10px;">

    	<label><input type="checkbox"> Фотогалерея</label>

    </td>

	    

    <td><input type="checkbox" name="option_18_public" id="18_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_18_user" id="18_user"></td>

      </tr>

	

  <tr>

    <td colspan="4" class="joined">Социальные виджеты</td>

  </tr>

    <tr class="">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> Like (нравится)</label>

    </td>

	    

    <td><input type="checkbox" name="option_21_public" id="21_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_21_user" id="21_user"></td>

      </tr>

  <tr class="">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> RSS в социальной сети</label>

    </td>

	    

    <td><input type="checkbox" name="option_23_public" id="23_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_23_user" id="23_user"></td>

      </tr>

  <tr class="joined_end">

    <td style="padding-left:20px;">

    	<label><input type="checkbox"> Добавить в друзья</label>

    </td>

	    

    <td><input type="checkbox" name="option_22_public" id="22_public"></td>

        

    <td>&nbsp;</td>

        

    <td><input type="checkbox" name="option_22_user" id="22_user"></td>

      </tr>

  <tr>

    <td colspan="4" style="padding-right:20px;"><div style="padding-left:6px">Краткое описание (опционально):</div>

      <textarea rows="5" style="margin-top:6px; display:block;" class="widthFull" name="xtra" id="xtra"></textarea></td>

  </tr>

  <tr>

    <td colspan="4">

  <div style="margin:8px 10px;">

  	Дополнительные материалы &#8212; ТЗ, бриф и т.п.:

    <div class="marginBottom12 marginTop6">(вы можете загрузить файлы форматов: jpeg, jpg, png, gif, rtf, doc, docx, txt, xls, xlsx, zip, rar)</div>

  </div>

<span style="display:inline-block;">

  <div class="marginBottom10" id="files_container">

    <div class="put_file_field">

  		<input type="file" name="fileField_1" id="fileField_1">&nbsp; <a href="#" onClick="return addFileField('remove',parentNode);" class="txtRed">отменить загрузку...</a> &nbsp;

    </div>

  </div>

  </span>

  <div class="paddingLeft10">

  	<a href="#" onClick="return addFileField('add');">ещё файл...</a>

  </div>

	

    <div class="clearBoth marginTop10"></div>

  <hr size="1" class="marginTop10">

<div class="marginBottom4">Укажите желаемую дату выполнения задания в формате ГГГГ-ММ-ДД</div>

или выберите её из календаря: <input type="text" title="" name="finish_date" id="finish_date" value="" size=9 /><img src="/webapps/media/system/images/calendar.png" alt="Календарь" class="calendar" id="finish_date_img" />    

    </td>

  </tr>

</table>

<table cellpadding="8" cellspacing="0">

  <tr>

  	<td>

    

<h4 style="margin-bottom:4px;">Выберите движок:</h4>

    <div>(вы можете выбрать несколько возможных вариантов)</div>

    <br>

      <label>

        <input type="radio" name="choose_engine" value="take_ready" id="choose_engine_1" onClick="manageEnginesChoice(this);">Готовая CMS</label> &nbsp;

      <label>

        <input type="radio" name="choose_engine" value="build_own" id="choose_engine_2" onClick="manageEnginesChoice(this);">Разработать собственный</label> &nbsp;

      <label>

        <input type="radio" name="choose_engine" value="exists" id="choose_engine_3" onClick="manageEnginesChoice(this);">Перенести на имеющийся</label><span id="existing_cms_name" style="display:none;">:  <input style="background:#FFFF99; border:solid 1px #999;" type="text" name="existing_cms" id="existing_cms" value=""></span></td>

  </tr>

  <tr id="tr_cms_list" style="display:none;">

    <td id="sms_list" onClick="controlCMSchoice(this);">

    <hr size="1">

	<label><div><input name="cms_name_0" type="checkbox" value="0">1С-Битрикс</div></label>

	<label><div><input name="cms_name_1" type="checkbox" value="1">ABO.CMS</div></label>

	<label><div><input name="cms_name_2" type="checkbox" value="2">Amiro.CMS</div></label>

	<label><div><input name="cms_name_3" type="checkbox" value="3">АТИЛЕКТ.CMS</div></label>

	<label><div><input name="cms_name_4" type="checkbox" value="4">B2evolution</div></label>

	<label><div><input name="cms_name_5" type="checkbox" value="5">BIGACE</div></label>

	<label><div><input name="cms_name_6" type="checkbox" value="6">CMS Made Simple</div></label>

	<label><div><input name="cms_name_7" type="checkbox" value="7">CMS Mail Keeper</div></label>

	<label><div><input name="cms_name_8" type="checkbox" value="8">CMSimple</div></label>

	<label><div><input name="cms_name_9" type="checkbox" value="9">Concrete5</div></label>

	<label><div><input name="cms_name_10" type="checkbox" value="10">Contao</div></label>

	<label><div><input name="cms_name_11" type="checkbox" value="11">DLEngine</div></label>

	<label><div><input name="cms_name_12" type="checkbox" value="12">Danneo</div></label>

	<label><div><input name="cms_name_13" type="checkbox" value="13">DotNetNuke</div></label>

	<label><div><input name="cms_name_14" type="checkbox" value="14">Drupal</div></label>

	<label><div><input name="cms_name_15" type="checkbox" value="15">E107</div></label>

	<label><div><input name="cms_name_16" type="checkbox" value="16">e2</div></label>

	<label><div><input name="cms_name_17" type="checkbox" value="17">eZ publish</div></label>

	<label><div><input name="cms_name_18" type="checkbox" value="18">InSales</div></label>

	<label><div><input name="cms_name_19" type="checkbox" value="19">Joomla</div></label>

	<label><div><input name="cms_name_20" type="checkbox" value="20">HostCMS</div></label>

	<label><div><input name="cms_name_21" type="checkbox" value="21">KooBoo</div></label>

	<label><div><input name="cms_name_22" type="checkbox" value="22">MODx</div></label>

	<label><div><input name="cms_name_23" type="checkbox" value="23">Mambo Open Source</div></label>

	<label><div><input name="cms_name_24" type="checkbox" value="24">MediaWiki</div></label>

	<label><div><input name="cms_name_25" type="checkbox" value="25">Movable Type</div></label>

	<label><div><input name="cms_name_26" type="checkbox" value="26">Nethouse</div></label>

	<label><div><input name="cms_name_27" type="checkbox" value="27">Newscoop</div></label>

	<label><div><input name="cms_name_28" type="checkbox" value="28">NPJ</div></label>

	<label><div><input name="cms_name_29" type="checkbox" value="29">Nucleus CMS</div></label>

	<label><div><input name="cms_name_30" type="checkbox" value="30">OpenCms</div></label>

	<label><div><input name="cms_name_31" type="checkbox" value="31">PHP-Fusion</div></label>

	<label><div><input name="cms_name_32" type="checkbox" value="32">PHP-Nuke</div></label>

	<label><div><input name="cms_name_33" type="checkbox" value="33">Plone</div></label>

	<label><div><input name="cms_name_34" type="checkbox" value="34">Prestashop</div></label>

	<label><div><input name="cms_name_35" type="checkbox" value="35">S.Builder</div></label>

	<label><div><input name="cms_name_36" type="checkbox" value="36">Sapid</div></label>

	<label><div><input name="cms_name_37" type="checkbox" value="37">SharePoint</div></label>

	<label><div><input name="cms_name_38" type="checkbox" value="38">Site Sapiens</div></label>

	<label><div><input name="cms_name_39" type="checkbox" value="39">TYPO3</div></label>

	<label><div><input name="cms_name_40" type="checkbox" value="40">Textpattern</div></label>

	<label><div><input name="cms_name_41" type="checkbox" value="41">TikiWiki</div></label>

	<label><div><input name="cms_name_42" type="checkbox" value="42">uCoz</div></label>

	<label><div><input name="cms_name_43" type="checkbox" value="43">UMI.CMS</div></label>

	<label><div><input name="cms_name_44" type="checkbox" value="44">WikkaWiki</div></label>

	<label><div><input name="cms_name_45" type="checkbox" value="45">WordPress</div></label>

	<label><div><input name="cms_name_46" type="checkbox" value="46">XOOPS</div></label>

	<label><div><input name="cms_name_47" type="checkbox" value="47">Xaraya</div></label>

	<label><div><input name="cms_name_48" type="checkbox" value="48">Zikula</div></label>

        

	</td>  

  </tr>

</table>

</div>

<div id="tell_your_data">

<h4>Пожалуйста, сообщите нам свои контактные данные:</h4>

<dl>

	<dt>Как вас зовут? <div class="required_field"></div></dt>

	<dd><input class="dataCell" name="name" type="text" id="name" value="Нюша"></dd>



	<dt>Ваш емэйл: <div class="required_field"></div></dt>

	<dd><input name="email" id="email" type="text" value="njusha@mail.ru"></dd>

    

	<dt>Ваш телефон: <div class="required_field"></div></dt>

	<dd><input name="phone" id="phone" type="text" value="1-255-580-22-88"></dd>

    

	<dt>Скайп: </dt>

	<dd><input name="skype" id="skype" type="text" value=""></dd>

</dl>

</div>

<div style="clear:both; margin-top:-20px;"><a name="bottom" id="bottom"></a></div>

<br>

<button id="make_site_prototype" type="submit">Создать прототип!</button>

<br>

</form>



<script type="text/javascript">

function checkCommonData(){

	try{

		d=document;

		var yName=d.getElementById('name');

		var yEmail=d.getElementById('email');

		var yPhone=d.getElementById('phone');

		var err=0;

		var mess='';

	

		if (!yName.value||yName.value==' ') {

			mess='Вы не сообщили нам своё имя!';					

			yName.style.backgroundColor='yellow';

		}

		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (!filter.test(yEmail.value)) {

			mess='Емэйл введён некорректно или отсутствует!';

			yEmail.style.backgroundColor='yellow';

		}

		if (yPhone.value.length<7) {

			mess='Вы не сообщили нам № своего телефона или указали его некорректно!';					

			yPhone.style.backgroundColor='yellow';

		}

		if(mess!=''){

			alert(mess);

			scrollToY('bottom');

			return false;

		}

	}catch(e){

		alert(e.message);

	}

}

</script>



<script type="text/javascript">

function loadCollection(collection_id){

	location.href='/webapps/index.php/component/collector1/?collection_id='+collection_id;

}

function checkPatchBoxes(eventSrcElement){

	var tBox;

	try{

		



		tBox=(navigator.appName.indexOf("Internet Explorer")==-1)? event.target:event.srcElement;

		var rows=eventSrcElement.getElementsByTagName('tr');

		var row,boxes;

		for(i=0,j=rows.length;i<j;i++){

			row=rows.item(i);

			

			

			boxes=row.getElementsByTagName('input');

					

			f=boxes.length

			//если в строке есть чекбоксы:

			if (f>0){

				var bc=0; //counter for checked boxes in row

				for(k=0;k<f;k++){

					//если не первая ячейка:

					if (k>0){

						if (tBox==boxes.item(0)) 

							boxes.item(k).checked=(boxes.item(0).checked==true)? true:false;

					

						if (boxes.item(k).checked==true) {

							boxes.item(k).parentNode.style.background='#ccff99';

							bc++;

						}else boxes.item(k).parentNode.style.background='';

					}

				}

				var fm=(f-1);

				//проверить условие отмтки/разотметки пакетного чекбокса:

				if (bc==fm) boxes.item(0).checked=true;

				if (bc==0) boxes.item(0).checked=false;

			}		

		}

		

	}catch(e){

		alert(e.message);

	}

}

function checkRequired(){

	try{

		d=document;

		var selST=d.getElementById('selectSiteType');

		

		if (selST.options[selST.selectedIndex].value=='0') {

			alert('Вы не указали, какой тип сайта вам нужен!');

			scrollToY('select_site_type');

			selST.style.backgroundColor='yellow';

			return false;

		}

		return checkCommonData();

		

	}catch(e){

		alert(e.message);

	}

}

function checkRows(sel){

	

	var rws=document.getElementsByTagName('tr');

	var tRow,arrClassName,newClassName,tClassName;

	if(sel=='3') { //WebShop, именно число, иначе возникают проблемы при записи в БД 

		tClassName='WebShop';

		changedClassName='hiddenShop';

	}else{

		tClassName='hiddenShop';

		changedClassName='WebShop';

	}

	for(i=0,j=rws.length;i<j;i++){

		newClassName='';

		tRow=rws.item(i); 

		if (tRow.className.indexOf(tClassName)!=-1){

			if (tRow.className!=tClassName){

				arrClassName=tRow.className.split(' ');

				for(b=0,c=arrClassName.length;b<c;b++){

					if (arrClassName[b]!=tClassName) newClassName+=' '+arrClassName[b];

				}

			} 

			newClassName+=' '+changedClassName;

			tRow.className=newClassName;

		}

	}

}

function manageEnginesChoice(radio){

	var d=document;

	try{

		if (radio.id=="choose_engine_1"||radio.id=="choose_engine_2"){

			if (radio.id=="choose_engine_0") d.getElementById('existing_cms').value='';	

			d.getElementById('existing_cms_name').style.display='none';	

			if (radio.id=="choose_engine_1") scrollTo(0,2000);//location.href='#bottom';

		}		

		if (radio.id=="choose_engine_1"){

			d.getElementById('tr_cms_list').style.display='block';

		}		

		if (radio.id=="choose_engine_2"||radio.id=="choose_engine_3"){

			d.getElementById('tr_cms_list').style.display='none';

		}		

		if (radio.id=="choose_engine_3"){

			d.getElementById('existing_cms_name').style.display='inline';				

		}	

	}catch(e){

		alert(e.message);

	}

}

function controlCMSchoice(tdBlock){

	var cells=tdBlock.getElementsByTagName('input');

	var cell;

	for(i=0,j=cells.length;i<j;i++){

		cell=cells.item(i);

		cell.parentNode.style.backgroundColor=(cell.checked==true)? '#F90':'';

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



<script>function toggleContainer(name) {
			var e = document.getElementById(name);// MooTools might not be available ;)
			e.style.display =(e.style.display == 'none') ? 'block' : 'none';
		}</script><div id="system-debug" class="profiler"><h1>Консоль отладки Joomla!</h1><div class="dbgHeader" onclick="toggleContainer('dbgContainersession');"><a href="javascript:void(0);"><h3>Сессия</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainersession"><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session0');"><a href="javascript:void(0);"><h3>__default</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session0"><code>session.counter &rArr; 32<br /></code><code>session.timer.start &rArr; 1340602458<br /></code><code>session.timer.last &rArr; 1340613646<br /></code><code>session.timer.now &rArr; 1340613653<br /></code><code>session.client.browser &rArr; Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.165 Safari/535.19 YI<br /></code><code>registry &rArr; {}<br /></code><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session1');"><a href="javascript:void(0);"><h3>user</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session1"><code>id &rArr; 0<br /></code><code>name &rArr; Нюша<br /></code><code>username &rArr; <br /></code><code>email &rArr; njusha@mail.ru<br /></code><code>password &rArr; <br /></code><code>password_clear &rArr; <br /></code><code>usertype &rArr; <br /></code><code>block &rArr; <br /></code><code>sendEmail &rArr; 0<br /></code><code>registerDate &rArr; <br /></code><code>lastvisitDate &rArr; <br /></code><code>activation &rArr; <br /></code><code>params &rArr; <br /></code><code>groups &rArr; Array<br /></code><code>guest &rArr; 1<br /></code><code>customer_data_array &rArr; Array<br /></code><code>aid &rArr; 0<br /></code><code>phone &rArr; 1-255-580-22-88<br /></code></div><code>session.token &rArr; c759bfa1f434c47384d241005a5e880d<br /></code></div></div><div class="dbgHeader" onclick="toggleContainer('dbgContainerprofile_information');"><a href="javascript:void(0);"><h3>Результаты профилирования</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainerprofile_information"><div><code>Application 0.001 seconds (+0.001); 0.77 MB (+0.769) - afterLoad</code></div><div><code>Application 0.074 seconds (+0.073); 3.84 MB (+3.068) - afterInitialise</code></div><div><code>Application 0.088 seconds (+0.014); 4.47 MB (+0.633) - afterRoute</code></div><div><code>Application 0.176 seconds (+0.088); 6.43 MB (+1.958) - afterDispatch</code></div><div><code>Application 0.183 seconds (+0.008); 6.63 MB (+0.198) - beforeRenderModule mod_menu (Footer)</code></div><div><code>Application 0.196 seconds (+0.013); 6.79 MB (+0.168) - afterRenderModule mod_menu (Footer)</code></div><div><code>Application 0.197 seconds (+0.000); 6.79 MB (-0.003) - beforeRenderModule mod_menu (Main Menu)</code></div><div><code>Application 0.206 seconds (+0.010); 6.81 MB (+0.016) - afterRenderModule mod_menu (Main Menu)</code></div><div><code>Application 0.206 seconds (+0.000); 6.80 MB (-0.003) - beforeRenderModule mod_login (Логин)</code></div><div><code>Application 0.216 seconds (+0.010); 6.84 MB (+0.032) - afterRenderModule mod_login (Логин)</code></div><div><code>Application 0.216 seconds (+0.000); 6.84 MB (-0.000) - beforeRenderModule mod_search (Поиск)</code></div><div><code>Application 0.221 seconds (+0.005); 6.86 MB (+0.020) - afterRenderModule mod_search (Поиск)</code></div><div><code>Application 0.231 seconds (+0.010); 6.94 MB (+0.089) - afterRender</code></div></div><div class="dbgHeader" onclick="toggleContainer('dbgContainermemory_usage');"><a href="javascript:void(0);"><h3>Использование памяти</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainermemory_usage"><code>6.93 MB (7,271,576 Bytes)</code></div><div class="dbgHeader" onclick="toggleContainer('dbgContainerqueries');"><a href="javascript:void(0);"><h3>Запросы к базе данных</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainerqueries"><h4>41 SQL-запросов зафиксировано</h4><ol><li><code><span class="dbgCommand">SELECT</span> `data`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `session_id` <b class="dbgOperator">=</b> &#039;74aeb6830b949da8ec2180fcd11c517f&#039;</code></li><li><code><span class="dbgCommand">DELETE</span> 

<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `time` &lt; &#039;1340595653&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> folder <span class="dbgCommand">AS</span> type, element <span class="dbgCommand">AS</span> name, params

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> enabled &gt;<b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> type <b class="dbgOperator">=</b>&#039;plugin&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> state &gt;<b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> access <span class="dbgCommand">IN</span> (1,1)

<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> ordering</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_languages&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> m.id, m.menutype, m.title, m.alias, m.note, m.path <span class="dbgCommand">AS</span> route, m.link, m.type, m.level, m.language,m.browserNav, m.access, m.params, m.home, m.img, m.template_style_id, m.component_id, m.parent_id,e.element as component

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> m

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> m.component_id <b class="dbgOperator">=</b> e.extension_id

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.published <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> m.parent_id &gt; 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> m.client_id <b class="dbgOperator">=</b> 0

<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> m.lft</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_collector1&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> <b style="color: red;">*</b>

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_languages</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> published<b class="dbgOperator">=</b>1

<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> ordering <span class="dbgCommand">ASC</span></code></li><li><code><span class="dbgCommand">SELECT</span> id, home, template, s.params

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_template_styles</span> as s

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> as e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element<b class="dbgOperator">=</b>s.template <br />&#160;&#160;<span class="dbgCommand">AND</span> e.type<b class="dbgOperator">=</b>&#039;template&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id<b class="dbgOperator">=</b>s.client_id

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> s.client_id <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> e.enabled <b class="dbgOperator">=</b> 1</code></li><li><code><span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as a

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> a.id <b class="dbgOperator">=</b> 0</code></li><li><code><span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as a

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> a.id <b class="dbgOperator">=</b> 0</code></li><li><code><span class="dbgCommand">SELECT</span> collections_ids <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_precustomers</span>

 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> `email` <b class="dbgOperator">=</b> &#039;njusha@mail.ru&#039; <span class="dbgCommand">OR</span> session_id <b class="dbgOperator">=</b> &#039;74aeb6830b949da8ec2180fcd11c517f&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_webapps_site_options</span>.id <span class="dbgCommand">AS</span> option_id, 

<span class="dbgCommand">IF</span> ( sites_types_ids_location,

	 sites_types_ids_location,

	 0 -- для корректной сортировки результатов внутри таблицы

   ) as `site types`,

   ( select name_ru <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_group</span> 

	 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_ids 

	 <span class="dbgCommand">REGEXP</span> <span class="dbgCommand">CONCAT</span>(&#039;(^|,)&#039;,<span class="dbgTable">dnior_webapps_site_options</span>.id,&#039;(,|$)&#039;) -- извлечь название групп опций

   ) as `name_ru`, 

<span class="dbgTable">dnior_webapps_site_options</span>.name_ru <span class="dbgCommand">AS</span> `option` 

    <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options</span> 

    <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_webapps_site_options_partial</span> 

    <br />&#160;&#160;<span class="dbgCommand">ON</span> <span class="dbgTable">dnior_webapps_site_options_partial</span>.site_option_id <b class="dbgOperator">=</b> <span class="dbgTable">dnior_webapps_site_options</span>.id

 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> <span class="dbgTable">dnior_webapps_site_options</span>.name_ru &lt;&gt; &#039;Дополнительно&#039;

 <br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> `site types` <span class="dbgCommand">DESC</span>, `name_ru`, `option` <span class="dbgCommand">ASC</span>;</code></li><li><code><span class="dbgCommand">SELECT</span> id, name_ru, name_en

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_types</span> <br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> id <span class="dbgCommand">DESC</span></code></li><li><code><span class="dbgCommand">SELECT</span> site_side, name_ru

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> <br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> id</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,2,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,3,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,1,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,7,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,6,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,4,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,8,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,5,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,11,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,12,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,17,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,14,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,9,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,20,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,19,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,10,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,15,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,13,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,16,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,18,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,21,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,23,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span> 

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> site_options_beyond_side <span class="dbgCommand">REGEXP</span> concat(&#039;(^|,)&#039;,22,&#039;(,|$)&#039;)</code></li><li><code><span class="dbgCommand">SELECT</span> m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_modules</span> <span class="dbgCommand">AS</span> m

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_modules_menu</span> <span class="dbgCommand">AS</span> mm <br />&#160;&#160;<span class="dbgCommand">ON</span> mm.moduleid <b class="dbgOperator">=</b> m.id

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element <b class="dbgOperator">=</b> m.module <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id <b class="dbgOperator">=</b> m.client_id

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.published <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> e.enabled <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> (m.publish_up <b class="dbgOperator">=</b> &#039;0000-00-00 00:00:00&#039; <span class="dbgCommand">OR</span> m.publish_up &lt;<b class="dbgOperator">=</b> &#039;2012-06-25 08:40:53&#039;) <br />&#160;&#160;<span class="dbgCommand">AND</span> (m.publish_down <b class="dbgOperator">=</b> &#039;0000-00-00 00:00:00&#039; <span class="dbgCommand">OR</span> m.publish_down &gt;<b class="dbgOperator">=</b> &#039;2012-06-25 08:40:53&#039;) <br />&#160;&#160;<span class="dbgCommand">AND</span> m.access <span class="dbgCommand">IN</span> (1,1) <br />&#160;&#160;<span class="dbgCommand">AND</span> m.client_id <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> (mm.menuid <b class="dbgOperator">=</b> 103 <span class="dbgCommand">OR</span> mm.menuid &lt;<b class="dbgOperator">=</b> 0)

<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> m.position, m.ordering</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_content&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_users&#039;</code></li><li><code><span class="dbgCommand">UPDATE</span> `<span class="dbgTable">dnior_session</span>`

<br />&#160;&#160;<span class="dbgCommand">SET</span> `data` <b class="dbgOperator">=</b> &#039;__default|a:8:{s:15:\&quot;session.counter\&quot;;i:32;s:19:\&quot;session.timer.start\&quot;;i:1340602458;s:18:\&quot;session.timer.last\&quot;;i:1340613646;s:17:\&quot;session.timer.now\&quot;;i:1340613653;s:22:\&quot;session.client.browser\&quot;;s:112:\&quot;Mozilla/5.0 (Windows <span class="dbgCommand">NT</span> 6.1; WOW64) AppleWebKit/535.19 (<span class="dbgCommand">KHTML</span>, like Gecko) Chrome/18.0.1025.165 Safari/535.19 <span class="dbgCommand">YI</span>\&quot;;s:8:\&quot;registry\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:4:\&quot;user\&quot;;O:5:\&quot;JUser\&quot;:25:{s:9:\&quot;\0<b style="color: red;">*</b>\0isRoot\&quot;;b:0;s:2:\&quot;id\&quot;;i:0;s:4:\&quot;name\&quot;;s:8:\&quot;Нюша\&quot;;s:8:\&quot;username\&quot;;N;s:5:\&quot;email\&quot;;s:14:\&quot;njusha@mail.ru\&quot;;s:8:\&quot;password\&quot;;N;s:14:\&quot;password_clear\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;usertype\&quot;;N;s:5:\&quot;block\&quot;;N;s:9:\&quot;sendEmail\&quot;;i:0;s:12:\&quot;registerDate\&quot;;N;s:13:\&quot;lastvisitDate\&quot;;N;s:10:\&quot;activation\&quot;;N;s:6:\&quot;params\&quot;;N;s:6:\&quot;groups\&quot;;a:0:{}s:5:\&quot;guest\&quot;;i:1;s:10:\&quot;\0<b style="color: red;">*</b>\0_params\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:14:\&quot;\0<b style="color: red;">*</b>\0_authGroups\&quot;;a:1:{i:0;i:1;}s:14:\&quot;\0<b style="color: red;">*</b>\0_authLevels\&quot;;a:2:{i:0;i:1;i:1;i:1;}s:15:\&quot;\0<b style="color: red;">*</b>\0_authActions\&quot;;N;s:12:\&quot;\0<b style="color: red;">*</b>\0_errorMsg\&quot;;N;s:19:\&quot;customer_data_array\&quot;;a:0:{}s:10:\&quot;\0<b style="color: red;">*</b>\0_errors\&quot;;a:0:{}s:3:\&quot;aid\&quot;;i:0;s:5:\&quot;phone\&quot;;s:15:\&quot;1-255-580-22-88\&quot;;}s:13:\&quot;session.token\&quot;;s:32:\&quot;c759bfa1f434c47384d241005a5e880d\&quot;;}&#039;
	, `time` <b class="dbgOperator">=</b> &#039;1340613653&#039;

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `session_id` <b class="dbgOperator">=</b> &#039;74aeb6830b949da8ec2180fcd11c517f&#039;</code></li></ol><h4>15 типов SQL-запросов зафиксировано, отсортировано по вхождениям</h4><h5>Запросы типа SELECT:</h5><ol><li><code>23 &#215; <span class="dbgCommand">SELECT</span> site_side <span class="dbgCommand">AS</span> `missing side name`
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span></code></li><li><code>4 &#215; <span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span></code></li><li><code>2 &#215; <span class="dbgCommand">SELECT</span> a.<b style="color: red;">*</b>
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_users</span> as a</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> id, name_ru, name_en
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_types</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> site_side, name_ru
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_beyond_sides</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> folder <span class="dbgCommand">AS</span> type, element <span class="dbgCommand">AS</span> name, params
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_modules</span> <span class="dbgCommand">AS</span> m
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_modules_menu</span> <span class="dbgCommand">AS</span> mm <br />&#160;&#160;<span class="dbgCommand">ON</span> mm.moduleid <b class="dbgOperator">=</b> m.id
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element <b class="dbgOperator">=</b> m.module <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id <b class="dbgOperator">=</b> m.client_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> <span class="dbgTable">dnior_webapps_site_options</span>.id <span class="dbgCommand">AS</span> option_id, 
 <span class="dbgCommand">IF</span> ( sites_types_ids_location,
   sites_types_ids_location,
   0 -- для корректной сортировки результатов внутри таблицы
    ) as `site types`,
    ( select name_ru <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_site_options_group</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> collections_ids <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_precustomers</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> <b style="color: red;">*</b>
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_languages</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> id, home, template, s.params
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_template_styles</span> as s
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> as e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element<b class="dbgOperator">=</b>s.template <br />&#160;&#160;<span class="dbgCommand">AND</span> e.type<b class="dbgOperator">=</b>&#039;template&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id<b class="dbgOperator">=</b>s.client_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> `data`
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> m.id, m.menutype, m.title, m.alias, m.note, m.path <span class="dbgCommand">AS</span> route, m.link, m.type, m.level, m.language,m.browserNav, m.access, m.params, m.home, m.img, m.template_style_id, m.component_id, m.parent_id,e.element as component
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> m
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> m.component_id <b class="dbgOperator">=</b> e.extension_id</code></li></ol><h5>Прочие SQL-запросы:</h5><ol><li><code>1 &#215; <span class="dbgCommand">UPDATE</span> `<span class="dbgTable">dnior_session</span>`
 <br />&#160;&#160;<span class="dbgCommand">SET</span> `data` <b class="dbgOperator">=</b> &#039;__default|a:8:{s:15:\&quot;session.counter\&quot;;i:32;s:19:\&quot;session.timer.start\&quot;;i:1340602458;s:18:\&quot;session.timer.last\&quot;;i:1340613646;s:17:\&quot;session.timer.now\&quot;;i:1340613653;s:22:\&quot;session.client.browser\&quot;;s:112:\&quot;Mozilla/5.0 (Windows <span class="dbgCommand">NT</span> 6.1; WOW64) AppleWebKit/535.19 (<span class="dbgCommand">KHTML</span>, like Gecko) Chrome/18.0.1025.165 Safari/535.19 <span class="dbgCommand">YI</span>\&quot;;s:8:\&quot;registry\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:4:\&quot;user\&quot;;O:5:\&quot;JUser\&quot;:25:{s:9:\&quot;\0<b style="color: red;">*</b>\0isRoot\&quot;;b:0;s:2:\&quot;id\&quot;;i:0;s:4:\&quot;name\&quot;;s:8:\&quot;Нюша\&quot;;s:8:\&quot;username\&quot;;N;s:5:\&quot;email\&quot;;s:14:\&quot;njusha@mail.ru\&quot;;s:8:\&quot;password\&quot;;N;s:14:\&quot;password_clear\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;usertype\&quot;;N;s:5:\&quot;block\&quot;;N;s:9:\&quot;sendEmail\&quot;;i:0;s:12:\&quot;registerDate\&quot;;N;s:13:\&quot;lastvisitDate\&quot;;N;s:10:\&quot;activation\&quot;;N;s:6:\&quot;params\&quot;;N;s:6:\&quot;groups\&quot;;a:0:{}s:5:\&quot;guest\&quot;;i:1;s:10:\&quot;\0<b style="color: red;">*</b>\0_params\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:14:\&quot;\0<b style="color: red;">*</b>\0_authGroups\&quot;;a:1:{i:0;i:1;}s:14:\&quot;\0<b style="color: red;">*</b>\0_authLevels\&quot;;a:2:{i:0;i:1;i:1;i:1;}s:15:\&quot;\0<b style="color: red;">*</b>\0_authActions\&quot;;N;s:12:\&quot;\0<b style="color: red;">*</b>\0_errorMsg\&quot;;N;s:19:\&quot;customer_data_array\&quot;;a:0:{}s:10:\&quot;\0<b style="color: red;">*</b>\0_errors\&quot;;a:0:{}s:3:\&quot;aid\&quot;;i:0;s:5:\&quot;phone\&quot;;s:15:\&quot;1-255-580-22-88\&quot;;}s:13:\&quot;session.token\&quot;;s:32:\&quot;c759bfa1f434c47384d241005a5e880d\&quot;;}&#039;  , `time` <b class="dbgOperator">=</b> &#039;1340613653&#039;</code></li><li><code>1 &#215; <span class="dbgCommand">DELETE</span> 
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`</code></li></ol></div></div></body>

</html>