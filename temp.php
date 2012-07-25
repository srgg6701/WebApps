
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">

<head>

  <base href="http://localhost/webapps/index.php/component/users/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>a2allcom_fastweb</title>
  <link href="http://localhost/webapps/index.php/component/search/?format=opensearch" rel="search" title="Искать a2allcom_fastweb" type="application/opensearchdescription+xml" />
  <link rel="stylesheet" href="/webapps/media/cms/css/debug.css" type="text/css" />
  <script src="/webapps/media/system/js/mootools-core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/core-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/mootools-more-uncompressed.js" type="text/javascript"></script>
  <script src="/webapps/media/system/js/validate-uncompressed.js" type="text/javascript"></script>
  <script type="text/javascript">
function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(3600000); });
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
					<form action="/webapps/index.php/component/users/" method="post">

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
					<form action="/webapps/index.php/component/users/" method="post" id="login-form" >

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

	<input type="hidden" name="return" value="aW5kZXgucGhwP3ZpZXc9cmVnaXN0cmF0aW9uJm9wdGlvbj1jb21fdXNlcnM=" />

	<input type="hidden" name="7232ac8be69a3073c005226710855f18" value="1" />	</fieldset>

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

<div style="margin-bottom:4px; clear:both;"><a href="/webapps/index.php/component/collector1/?view=collected">Собрано коллекций: 4</a></div>

<div><a href="/webapps/index.php/component/collector1/?view=orders">Заказов компонентов: 2</a></div></div>

		</div>
	

					﻿<div class="registration">

	<form id="member-registration" action="/webapps/index.php/component/users/?task=registration.register" method="post" class="form-validate">

				<fieldset>

					<legend>Регистрация пользователя</legend>

					<dl>

									<dt>

				<span class="spacer"><span class="before"></span><span class="text"><label id="jform_spacer-lbl" class=""><strong class="red">*</strong> Обязательное поле</label></span><span class="after"></span></span>								</dt>

				<dd> </dd>

												<dt>

				<label id="jform_name-lbl" for="jform_name" class="hasTip required" title="Имя::Введите ваше полное имя">Имя<span class="star">&#160;*</span></label>								</dt>

				<dd><input type="text" name="jform[name]" id="jform_name" value="Федот-да-нетот" class="required" size="30"/></dd>

												<dt>

				<label id="jform_username-lbl" for="jform_username" class="hasTip required" title="Логин::Введите желаемый логин">Логин<span class="star">&#160;*</span></label>								</dt>

				<dd><input type="text" name="jform[username]" id="jform_username" value="" class="validate-username required" size="30"/></dd>

												<dt>

				<label id="jform_password1-lbl" for="jform_password1" class="hasTip required" title="Пароль::Введите пароль. Длина пароля должна быть 4 символа или более">Пароль<span class="star">&#160;*</span></label>								</dt>

				<dd><input type="password" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="validate-password required" size="30"/></dd>

												<dt>

				<label id="jform_password2-lbl" for="jform_password2" class="hasTip required" title="Повтор пароля::Подтверждение пароля">Повтор пароля<span class="star">&#160;*</span></label>								</dt>

				<dd><input type="password" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="validate-password required" size="30"/></dd>

												<dt>

				<label id="jform_email1-lbl" for="jform_email1" class="hasTip required" title="Адрес электронной почты::Введите адрес электронной почты">Адрес электронной почты<span class="star">&#160;*</span></label>								</dt>

				<dd><input type="text" name="jform[email1]" class="validate-email required" id="jform_email1" value="fjodor@mail.ru" size="30"/></dd>

												<dt>

				<label id="jform_email2-lbl" for="jform_email2" class="hasTip required" title="Подтверждение адреса электронной почты::Подтвердите указанный вами адрес электронной почты">Подтверждение адреса электронной почты:<span class="star">&#160;*</span></label>								</dt>

				<dd><input type="text" name="jform[email2]" class="validate-email required" id="jform_email2" value="" size="30"/></dd>

																				</dl>

		</fieldset>

			<div style="padding:4px;"></div>

		<div>

			<button type="submit" class="validate">Регистрация</button>

			или			<a href="/webapps/" title="Отмена">Отмена</a>

			<input type="hidden" name="option" value="com_users" />

			<input type="hidden" name="task" value="registration.register" />

			<input type="hidden" name="7232ac8be69a3073c005226710855f18" value="1" />		</div>

	</form>

</div>



                        

                        

                   	    

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
		}</script><div id="system-debug" class="profiler"><h1>Консоль отладки Joomla!</h1><div class="dbgHeader" onclick="toggleContainer('dbgContainersession');"><a href="javascript:void(0);"><h3>Сессия</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainersession"><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session0');"><a href="javascript:void(0);"><h3>__default</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session0"><code>session.counter &rArr; 145<br /></code><code>session.timer.start &rArr; 1343202157<br /></code><code>session.timer.last &rArr; 1343210999<br /></code><code>session.timer.now &rArr; 1343211338<br /></code><code>session.client.browser &rArr; Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.1634 Safari/535.19 YI<br /></code><code>registry &rArr; {}<br /></code><div class="dbgHeader" onclick="toggleContainer('dbgContainer_session1');"><a href="javascript:void(0);"><h3>user</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainer_session1"><code>id &rArr; 0<br /></code><code>name &rArr; Федот-да-нетот<br /></code><code>username &rArr; <br /></code><code>email &rArr; fjodor@mail.ru<br /></code><code>password &rArr; <br /></code><code>password_clear &rArr; <br /></code><code>usertype &rArr; <br /></code><code>block &rArr; <br /></code><code>sendEmail &rArr; 0<br /></code><code>registerDate &rArr; <br /></code><code>lastvisitDate &rArr; <br /></code><code>activation &rArr; <br /></code><code>params &rArr; <br /></code><code>groups &rArr; Array<br /></code><code>guest &rArr; 1<br /></code><code>customer_data_array &rArr; Array<br /></code><code>aid &rArr; 0<br /></code><code>phone &rArr; 7815-002-22-55<br /></code></div><code>session.token &rArr; 99c4de7148876928376c5dd44abbda2e<br /></code></div></div><div class="dbgHeader" onclick="toggleContainer('dbgContainerprofile_information');"><a href="javascript:void(0);"><h3>Результаты профилирования</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainerprofile_information"><div><code>Application 0.001 seconds (+0.001); 0.77 MB (+0.771) - afterLoad</code></div><div><code>Application 0.073 seconds (+0.073); 3.84 MB (+3.068) - afterInitialise</code></div><div><code>Application 0.087 seconds (+0.013); 4.47 MB (+0.633) - afterRoute</code></div><div><code>Application 0.151 seconds (+0.065); 6.91 MB (+2.435) - afterDispatch</code></div><div><code>Application 0.159 seconds (+0.008); 7.10 MB (+0.196) - beforeRenderModule mod_menu (Footer)</code></div><div><code>Application 0.173 seconds (+0.014); 7.27 MB (+0.168) - afterRenderModule mod_menu (Footer)</code></div><div><code>Application 0.174 seconds (+0.000); 7.27 MB (-0.003) - beforeRenderModule mod_precustomer_stuff (Объекты предзаказчика)</code></div><div><code>Application 0.181 seconds (+0.007); 7.33 MB (+0.061) - afterRenderModule mod_precustomer_stuff (Объекты предзаказчика)</code></div><div><code>Application 0.181 seconds (+0.000); 7.33 MB (-0.001) - beforeRenderModule mod_menu (Main Menu)</code></div><div><code>Application 0.191 seconds (+0.010); 7.34 MB (+0.016) - afterRenderModule mod_menu (Main Menu)</code></div><div><code>Application 0.191 seconds (+0.000); 7.34 MB (-0.003) - beforeRenderModule mod_login (Логин)</code></div><div><code>Application 0.197 seconds (+0.006); 7.37 MB (+0.027) - afterRenderModule mod_login (Логин)</code></div><div><code>Application 0.197 seconds (+0.000); 7.37 MB (-0.000) - beforeRenderModule mod_search (Поиск)</code></div><div><code>Application 0.202 seconds (+0.005); 7.39 MB (+0.020) - afterRenderModule mod_search (Поиск)</code></div><div><code>Application 0.209 seconds (+0.006); 7.45 MB (+0.064) - afterRender</code></div></div><div class="dbgHeader" onclick="toggleContainer('dbgContainermemory_usage');"><a href="javascript:void(0);"><h3>Использование памяти</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainermemory_usage"><code>7.42 MB (7,783,064 Bytes)</code></div><div class="dbgHeader" onclick="toggleContainer('dbgContainerqueries');"><a href="javascript:void(0);"><h3>Запросы к базе данных</h3></a></div><div  style="display: none;" class="dbgContainer" id="dbgContainerqueries"><h4>12 SQL-запросов зафиксировано</h4><ol><li><code><span class="dbgCommand">SELECT</span> `data`

<br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `session_id` <b class="dbgOperator">=</b> &#039;a9a8a62992259768640bd047dc3d0d33&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> folder <span class="dbgCommand">AS</span> type, element <span class="dbgCommand">AS</span> name, params

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

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_users&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> <b style="color: red;">*</b>

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_languages</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> published<b class="dbgOperator">=</b>1

<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> ordering <span class="dbgCommand">ASC</span></code></li><li><code><span class="dbgCommand">SELECT</span> id, home, template, s.params

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_template_styles</span> as s

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> as e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element<b class="dbgOperator">=</b>s.template <br />&#160;&#160;<span class="dbgCommand">AND</span> e.type<b class="dbgOperator">=</b>&#039;template&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id<b class="dbgOperator">=</b>s.client_id

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> s.client_id <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> e.enabled <b class="dbgOperator">=</b> 1</code></li><li><code><span class="dbgCommand">SELECT</span> m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_modules</span> <span class="dbgCommand">AS</span> m

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_modules_menu</span> <span class="dbgCommand">AS</span> mm <br />&#160;&#160;<span class="dbgCommand">ON</span> mm.moduleid <b class="dbgOperator">=</b> m.id

<br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element <b class="dbgOperator">=</b> m.module <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id <b class="dbgOperator">=</b> m.client_id

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> m.published <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> e.enabled <b class="dbgOperator">=</b> 1 <br />&#160;&#160;<span class="dbgCommand">AND</span> (m.publish_up <b class="dbgOperator">=</b> &#039;0000-00-00 00:00:00&#039; <span class="dbgCommand">OR</span> m.publish_up &lt;<b class="dbgOperator">=</b> &#039;2012-07-25 10:15:38&#039;) <br />&#160;&#160;<span class="dbgCommand">AND</span> (m.publish_down <b class="dbgOperator">=</b> &#039;0000-00-00 00:00:00&#039; <span class="dbgCommand">OR</span> m.publish_down &gt;<b class="dbgOperator">=</b> &#039;2012-07-25 10:15:38&#039;) <br />&#160;&#160;<span class="dbgCommand">AND</span> m.access <span class="dbgCommand">IN</span> (1,1) <br />&#160;&#160;<span class="dbgCommand">AND</span> m.client_id <b class="dbgOperator">=</b> 0 <br />&#160;&#160;<span class="dbgCommand">AND</span> (mm.menuid <b class="dbgOperator">=</b> 0 <span class="dbgCommand">OR</span> mm.menuid &lt;<b class="dbgOperator">=</b> 0)

<br />&#160;&#160;<span class="dbgCommand">ORDER</span> <span class="dbgCommand">BY</span> m.position, m.ordering</code></li><li><code><span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled

<br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span>

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `type` <b class="dbgOperator">=</b> &#039;component&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> `element` <b class="dbgOperator">=</b> &#039;com_content&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> id, collections_ids <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_precustomers</span>

 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> `email` <b class="dbgOperator">=</b> &#039;fjodor@mail.ru&#039; <span class="dbgCommand">OR</span> session_id <b class="dbgOperator">=</b> &#039;a9a8a62992259768640bd047dc3d0d33&#039;</code></li><li><code><span class="dbgCommand">SELECT</span> id, orders_ids <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_precustomers</span>

 <br />&#160;&#160;<span class="dbgCommand">WHERE</span> `email` <b class="dbgOperator">=</b> &#039;fjodor@mail.ru&#039; <span class="dbgCommand">OR</span> session_id <b class="dbgOperator">=</b> &#039;a9a8a62992259768640bd047dc3d0d33&#039;</code></li><li><code><span class="dbgCommand">UPDATE</span> `<span class="dbgTable">dnior_session</span>`

<br />&#160;&#160;<span class="dbgCommand">SET</span> `data` <b class="dbgOperator">=</b> &#039;__default|a:8:{s:15:\&quot;session.counter\&quot;;i:145;s:19:\&quot;session.timer.start\&quot;;i:1343202157;s:18:\&quot;session.timer.last\&quot;;i:1343210999;s:17:\&quot;session.timer.now\&quot;;i:1343211338;s:22:\&quot;session.client.browser\&quot;;s:113:\&quot;Mozilla/5.0 (Windows <span class="dbgCommand">NT</span> 6.1; WOW64) AppleWebKit/535.19 (<span class="dbgCommand">KHTML</span>, like Gecko) Chrome/18.0.1025.1634 Safari/535.19 <span class="dbgCommand">YI</span>\&quot;;s:8:\&quot;registry\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:4:\&quot;user\&quot;;O:5:\&quot;JUser\&quot;:25:{s:9:\&quot;\0<b style="color: red;">*</b>\0isRoot\&quot;;b:0;s:2:\&quot;id\&quot;;i:0;s:4:\&quot;name\&quot;;s:26:\&quot;Федот-да-нетот\&quot;;s:8:\&quot;username\&quot;;N;s:5:\&quot;email\&quot;;s:14:\&quot;fjodor@mail.ru\&quot;;s:8:\&quot;password\&quot;;N;s:14:\&quot;password_clear\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;usertype\&quot;;N;s:5:\&quot;block\&quot;;N;s:9:\&quot;sendEmail\&quot;;i:0;s:12:\&quot;registerDate\&quot;;N;s:13:\&quot;lastvisitDate\&quot;;N;s:10:\&quot;activation\&quot;;N;s:6:\&quot;params\&quot;;N;s:6:\&quot;groups\&quot;;a:0:{}s:5:\&quot;guest\&quot;;i:1;s:10:\&quot;\0<b style="color: red;">*</b>\0_params\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:14:\&quot;\0<b style="color: red;">*</b>\0_authGroups\&quot;;a:1:{i:0;i:1;}s:14:\&quot;\0<b style="color: red;">*</b>\0_authLevels\&quot;;a:2:{i:0;i:1;i:1;i:1;}s:15:\&quot;\0<b style="color: red;">*</b>\0_authActions\&quot;;N;s:12:\&quot;\0<b style="color: red;">*</b>\0_errorMsg\&quot;;N;s:19:\&quot;customer_data_array\&quot;;a:0:{}s:10:\&quot;\0<b style="color: red;">*</b>\0_errors\&quot;;a:0:{}s:3:\&quot;aid\&quot;;i:0;s:5:\&quot;phone\&quot;;s:14:\&quot;7815-002-22-55\&quot;;}s:13:\&quot;session.token\&quot;;s:32:\&quot;99c4de7148876928376c5dd44abbda2e\&quot;;}&#039;
	, `time` <b class="dbgOperator">=</b> &#039;1343211338&#039;

<br />&#160;&#160;<span class="dbgCommand">WHERE</span> `session_id` <b class="dbgOperator">=</b> &#039;a9a8a62992259768640bd047dc3d0d33&#039;</code></li></ol><h4>10 типов SQL-запросов зафиксировано, отсортировано по вхождениям</h4><h5>Запросы типа SELECT:</h5><ol><li><code>3 &#215; <span class="dbgCommand">SELECT</span> extension_id <span class="dbgCommand">AS</span> id, element <span class="dbgCommand">AS</span> &quot;option&quot;, params, enabled
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_modules</span> <span class="dbgCommand">AS</span> m
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_modules_menu</span> <span class="dbgCommand">AS</span> mm <br />&#160;&#160;<span class="dbgCommand">ON</span> mm.moduleid <b class="dbgOperator">=</b> m.id
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element <b class="dbgOperator">=</b> m.module <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id <b class="dbgOperator">=</b> m.client_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> id, collections_ids <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_precustomers</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> id, home, template, s.params
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_template_styles</span> as s
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> as e <br />&#160;&#160;<span class="dbgCommand">ON</span> e.element<b class="dbgOperator">=</b>s.template <br />&#160;&#160;<span class="dbgCommand">AND</span> e.type<b class="dbgOperator">=</b>&#039;template&#039; <br />&#160;&#160;<span class="dbgCommand">AND</span> e.client_id<b class="dbgOperator">=</b>s.client_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> id, orders_ids <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_webapps_precustomers</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> <b style="color: red;">*</b>
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_languages</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> folder <span class="dbgCommand">AS</span> type, element <span class="dbgCommand">AS</span> name, params
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_extensions</span></code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> m.id, m.menutype, m.title, m.alias, m.note, m.path <span class="dbgCommand">AS</span> route, m.link, m.type, m.level, m.language,m.browserNav, m.access, m.params, m.home, m.img, m.template_style_id, m.component_id, m.parent_id,e.element as component
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> <span class="dbgTable">dnior_menu</span> <span class="dbgCommand">AS</span> m
 <br />&#160;&#160;<span class="dbgCommand">LEFT</span> <span class="dbgCommand">JOIN</span> <span class="dbgTable">dnior_extensions</span> <span class="dbgCommand">AS</span> e <br />&#160;&#160;<span class="dbgCommand">ON</span> m.component_id <b class="dbgOperator">=</b> e.extension_id</code></li><li><code>1 &#215; <span class="dbgCommand">SELECT</span> `data`
 <br />&#160;&#160;<span class="dbgCommand">FROM</span> `<span class="dbgTable">dnior_session</span>`</code></li></ol><h5>Прочие SQL-запросы:</h5><ol><li><code>1 &#215; <span class="dbgCommand">UPDATE</span> `<span class="dbgTable">dnior_session</span>`
 <br />&#160;&#160;<span class="dbgCommand">SET</span> `data` <b class="dbgOperator">=</b> &#039;__default|a:8:{s:15:\&quot;session.counter\&quot;;i:145;s:19:\&quot;session.timer.start\&quot;;i:1343202157;s:18:\&quot;session.timer.last\&quot;;i:1343210999;s:17:\&quot;session.timer.now\&quot;;i:1343211338;s:22:\&quot;session.client.browser\&quot;;s:113:\&quot;Mozilla/5.0 (Windows <span class="dbgCommand">NT</span> 6.1; WOW64) AppleWebKit/535.19 (<span class="dbgCommand">KHTML</span>, like Gecko) Chrome/18.0.1025.1634 Safari/535.19 <span class="dbgCommand">YI</span>\&quot;;s:8:\&quot;registry\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:4:\&quot;user\&quot;;O:5:\&quot;JUser\&quot;:25:{s:9:\&quot;\0<b style="color: red;">*</b>\0isRoot\&quot;;b:0;s:2:\&quot;id\&quot;;i:0;s:4:\&quot;name\&quot;;s:26:\&quot;Федот-да-нетот\&quot;;s:8:\&quot;username\&quot;;N;s:5:\&quot;email\&quot;;s:14:\&quot;fjodor@mail.ru\&quot;;s:8:\&quot;password\&quot;;N;s:14:\&quot;password_clear\&quot;;s:0:\&quot;\&quot;;s:8:\&quot;usertype\&quot;;N;s:5:\&quot;block\&quot;;N;s:9:\&quot;sendEmail\&quot;;i:0;s:12:\&quot;registerDate\&quot;;N;s:13:\&quot;lastvisitDate\&quot;;N;s:10:\&quot;activation\&quot;;N;s:6:\&quot;params\&quot;;N;s:6:\&quot;groups\&quot;;a:0:{}s:5:\&quot;guest\&quot;;i:1;s:10:\&quot;\0<b style="color: red;">*</b>\0_params\&quot;;O:9:\&quot;JRegistry\&quot;:1:{s:7:\&quot;\0<b style="color: red;">*</b>\0data\&quot;;O:8:\&quot;stdClass\&quot;:0:{}}s:14:\&quot;\0<b style="color: red;">*</b>\0_authGroups\&quot;;a:1:{i:0;i:1;}s:14:\&quot;\0<b style="color: red;">*</b>\0_authLevels\&quot;;a:2:{i:0;i:1;i:1;i:1;}s:15:\&quot;\0<b style="color: red;">*</b>\0_authActions\&quot;;N;s:12:\&quot;\0<b style="color: red;">*</b>\0_errorMsg\&quot;;N;s:19:\&quot;customer_data_array\&quot;;a:0:{}s:10:\&quot;\0<b style="color: red;">*</b>\0_errors\&quot;;a:0:{}s:3:\&quot;aid\&quot;;i:0;s:5:\&quot;phone\&quot;;s:14:\&quot;7815-002-22-55\&quot;;}s:13:\&quot;session.token\&quot;;s:32:\&quot;99c4de7148876928376c5dd44abbda2e\&quot;;}&#039;  , `time` <b class="dbgOperator">=</b> &#039;1343211338&#039;</code></li></ol></div></div></body>

</html>