
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">

<head>

  <base href="http://localhost/webapps/index.php/component/collector1/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>a2allcom_fastweb</title>
  <link href="http://localhost/webapps/index.php/component/search/?format=opensearch" rel="search" title="Искать a2allcom_fastweb" type="application/opensearchdescription+xml" />
  <link rel="stylesheet" href="/webapps/media/cms/css/debug.css" type="text/css" />
  <script src="/webapps/media/system/js/mootools-core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/core-uncompressed.js" type="text/javascript"></script>
  <script type="text/javascript">
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
					<form action="/webapps/index.php/component/collector1/" method="post">

	<div class="search">

		<label for="mod-search-searchword" id="swrd">Искать...</label>

			<input name="searchword" id="mod-search-searchword" maxlength="20"  class="inputbox" type="text" size="40" value="Поиск"  onblur="if (this.value=='') this.value='Поиск';" onfocus="if (this.value=='Поиск') this.value='';" /><input type="submit" value="" class="button" onclick="this.form.searchword.focus();"/>	<input type="hidden" name="task" value="search" />

	<input type="hidden" name="option" value="com_search" />

	<input type="hidden" name="Itemid" value="0" />

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
					<form action="/webapps/index.php/component/collector1/" method="post" id="login-form" >

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

	<input type="hidden" name="return" value="aW5kZXgucGhwP3ZpZXc9b3JkZXJzJm9wdGlvbj1jb21fY29sbGVjdG9yMQ==" />

	<input type="hidden" name="cf8a0b77c3c39054ff7b89521bfd617d" value="1" />	</fieldset>

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

                            <!-- system messages -->

  				
<div id="system-message-container">
</div>

				<div id="com">

                			<div class="moduletable_precustomer">
					﻿<div class="bgSand block_rounded precustomer_obj_info"> 

<div style="margin-bottom:4px; clear:both;"><a href="/webapps/index.php/component/collector1/?view=collected">Собрано коллекций: 2</a></div>

<div><a href="/webapps/index.php/component/collector1/?view=orders">Заказов компонентов: 1</a></div></div>

		</div>
	

					﻿﻿﻿﻿﻿﻿<div class="item-page">

<h2>Лист заказов</h2>

</div>

<table cellspacing="0" class="customerAccount">

  <tr id="header-row">

    <th><div>Заказ</div></th>

    <th><div>Стоимость</div></th>

    <th><div>Дата закрытия</div></th>

    <th><div>Состояние</div></th>

    <th><div>Куратор</div></th>

    <th><div>Файлы</div></th>

    <th><div>Период поддержки</div></th>

  </tr>

  <tr valign="top">

    <td align="right">47</td>

    <td align="right">1200</td>

    <td>2012-07-30</td>

    <td></td>

    <td></td>

    <td nowrap>			<div><a href="/webapps/components/com_collector1/files/47.1.zip">47.1. ru-RU_joomla_lang_site.1.5.22v1.zip</a> <a href="javascript:void();" onClick="return deleteFile(this,'47.1');" class="txtRed"><img title="Удалить файл..." align="absmiddle" src="/webapps/templates/fastwebdev/images/commands/delete.gif" width="13" height="13" style="margin-bottom:4px;"></a></div>

		
</td>

    <td></td>

  </tr>

  

</table>



                        

                        

                   	    

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