<?php
/**
 * Date         January 30, 2012
 * Copyright    Copyright (C) 2012 Lal B. Saud
 * License  GPL
 */

/*

*/

defined('_JEXEC') or die;
$app = JFactory::getApplication();


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/firefox/correct_submenu_position.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css">
</head>
<body>
<? $path_to_images='templates/fastwebdev/images/'; ?>
<div id="pseudo_bg">
    <div></div>
</div>
<!-- block that fits space verically -->
<div id="body">
	<!-- system messages -->
  	<jdoc:include type="message" />

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
          	<a href="index.php">WebApps</a>.2-all<span style="color: #F4BD00;">.com</span>  
          </div>
		  <div id="call_us"><img src="<?=$path_to_images?>1335869184_contact.png" width="24" height="24" hspace="4" align="absmiddle">8(904)442-84-47 </div></td>
                    <td width="100%" align="right" nowrap id="topSearch">
                            	<jdoc:include type="modules" name="search" style="xhtml" />
<script type="text/javascript">
document.getElementById('swrd').innerHTML='Найти: ';
function manageLoginDisplay(stat){
	d=document;
	try{
		switch(stat){

			case "exit":
				d.getElementById('login-form').submit();
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
                    <? $user = JFactory::getUser();
	if (!$user->guest){?>
	<div style="position:relative">
		<div id="div_user_menu" style="display:<?="none"?>;">
            <a href="index.php?option=com_customer&task=userdata">Мои данные</a>
            <a href="index.php?option=com_collector1&task=collected">Мой сайт</a>
            <a href="index.php?option=com_customer&task=balance">Мой баланс</a>
        	<div align="right" id="close_user_menu"><a href="javascript:void();" onclick="manageLoginDisplay('hide_menu');">Закрыть</a></div>
        </div>
    </div>
    <span id="user_menu_here" style="padding:6px 10px; margin-left:10px; background:#FFFF00; cursor:pointer; border-radius:6px;" onclick="manageLoginDisplay('menu');">Меню</span><img src="<?=$path_to_images?>user24.png" width="22" height="22" hspace="6" align="absmiddle" style="margin-right:14px;" /><a href="javascript:void();" onclick="manageLoginDisplay('exit');">Выход</a><? }
	else{?>&nbsp; <a href="javascript:void();" onclick="manageLoginDisplay('block');">Вход</a>
                        ::
                        <a href="index.php/component/users/?view=registration">Регистрация</a><? 
	}?>
                    <div id="login_block">
                    	<jdoc:include type="modules" name="login" style="xhtml" />
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

				<jdoc:include type="modules" name="menu" style="xhtml" />    
    		</div>

<?	if (strstr($_SERVER['HTTP_USER_AGENT'],'Firefox')){?>
<script type="text/javascript" src="tmpl/default/js/firefox/correct_submenu_position.js">
</script>
<? 	}?>
            <div id="wrapper_component">  			
				<div id="com">
					<jdoc:include type="component" />    
           		</div>
<?	//}?>		
			</div>
    	</div><!-- /section1 -->
	</div><!-- /main container -->
</div>
<!-- /body -->    
<div id="footer">
	<center>
	<? 	//$s="1000";
		//$_SESSION['skip_first']='second'?>
	<jdoc:include type="modules" name="footer_menu" style="xhtml" />
    </center>
</div>
<jdoc:include type="modules" name="debug" />
</body>
</html>