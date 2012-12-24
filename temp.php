<!DOCTYPE HTML>
<html>
<head>
  <base href="http://localhost/webapps/index.php/component/users/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title>a2allcom_fastweb</title>
  <link href="http://localhost/webapps/index.php/component/search/?format=opensearch" rel="search" title="Искать a2allcom_fastweb" type="application/opensearchdescription+xml" />
  <script src="http://localhost/webapps/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="http://localhost/webapps/media/system/js/core.js" type="text/javascript"></script>
  <script type="text/javascript">
function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(3600000); });
  </script>
<!----><script type="text/javascript" src="http://localhost/webapps/templates/fastwebdev/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://localhost/webapps/templates/fastwebdev/js/common.js"></script>

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
	
					</td>
                    <td id="tdLogin">
&nbsp; <a href="javascript:void();" onclick="manageLoginDisplay('block');">Вход</a>
                        ::
                        <a href="/webapps/index.php/component/users/?view=registration">Регистрация</a>
                    <div id="login_block">
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
	<input type="hidden" name="return" value="aW5kZXgucGhwP3ZpZXc9bG9naW4mb3B0aW9uPWNvbV91c2Vycw==" />
	<input type="hidden" name="5d5de38fb17341409063db279969617f" value="1" />	</fieldset>
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
<script type="text/javascript" src="/webapps/templates/fastwebdev/js/firefox/correct_submenu_position.js">
</script>
            <div id="wrapper_component">
                            <!-- system messages -->
  				
<div id="system-message-container">
<dl id="system-message">
<dt class="message">Сообщение</dt>
<dd class="message message">
	<ul>
		<li>Пожалуйста, прежде пройдите авторизацию</li>
	</ul>
</dd>
</dl>
</div>
				<div id="com">
                	
			                    
			    
					<div id="mode_login" class="login">
	
	
		
		
	
	<form action="/webapps/index.php/component/users/?task=user.login" method="post">

		<fieldset style="padding:20px;">
												<div class="login-fields"><label id="username-lbl" for="username" class="">Логин</label>					<input type="text" name="username" id="username" value="" class="validate-username" size="25"/></div>
																<div class="login-fields"><label id="password-lbl" for="password" class="">Пароль</label>					<input type="password" name="password" id="password" value="" class="validate-password" size="25"/></div>
										<button type="submit" class="button">Войти</button>
			<input type="hidden" name="return" value="aHR0cDovL2xvY2FsaG9zdC93ZWJhcHBzL2luZGV4LnBocC9tZXNzYWdlcw==" />
			<input type="hidden" name="5d5de38fb17341409063db279969617f" value="1" />		</fieldset>
	</form>
</div>
<div>
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
				Ещё нет учетной записи?</a>
		</li>
			</ul>
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
<script type="text/javascript">
$( function(){
		$('#swrd').html('Найти: ');
		$('#swrd').after('<p>'+/*
		
		*/'Hello again</p>');
		alert('jq');
	});
function manageLoginDisplay(stat){
	try{
		switch(stat){

			case "exit":
				$('#login-form').submit();
				break;		

			case "menu":
				$('#div_user_menu').show();
				break;		

			case "hide_menu":
				$('#div_user_menu').hide();
				break;		

			default: $('#login_block').css('display',stat);
		}

	}catch(e){
		alert(e.message);
	}
}
</script>

</body>
</html>