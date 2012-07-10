<?php
/**
 * Date         January 30, 2012
 * Copyright    Copyright (C) 2012 Lal B. Saud
 * License  GPL
 */

/*

*/
defined('_JEXEC') or die;

if (!$app) $app = JFactory::getApplication();

if (!$this->baseurl){
	$this->baseurl="http://".$_SERVER['HTTP_HOST'];
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/firefox/correct_submenu_position.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>

<script src="<?php echo $this->baseurl ?>/templates/_js/common.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css">
</head>
<body>
<?
if(strstr($_SERVER['HTTP_HOST'],"localhost")||$_GET['debug']){
	?><div style="position:fixed; right:10px; bottom:4px; background:#FFFF00; z-index:1;" class="padding10 bold border_radius"><a href="#" onclick="manageBlockDisplay('debug_menu');return false">Debug</a> 
    <div id="debug_menu" class="padding10 bgSand border_radius" style="position:absolute; bottom:37px; right:0px; display:<?="none"?>; border:solid 1px #FF9900;">
    	<div><a href="index.php?option=com_content&view=app">Objects</a></div>
    	<div><a href="index.php?option=com_content&view=app&c=debug">test</a></div>
        <div><a href="index.php?option=com_content&view=app&c=debug&task=_session_unset">session_unset</a></div>
    </div>
    </div>
<script type="text/javascript">
//document.getElementById().style.positionBottom='';
</script>
<? 
}
$path_to_images='templates/fastwebdev/images/'; 
//var_dump("<h1>SESSION:</h1><pre>",$_SESSION,"</pre>");
//$_SESSION['example1']='EXMPL';
//echo "<hr>"; $session =& JFactory::getSession();
//var_dump("<h1>session:</h1><pre>",$session,"</pre>");?>
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
          	<a href="index.php">WebApps</a>.2-all<span style="color: #F4BD00;">.com</span>  
          </div>
          			</td>
                    <td style="padding-top:2px;">
		  <div id="call_us"><img src="<?=$path_to_images?>1335869184_contact.png" width="24" height="24" hspace="4" align="absmiddle"><? 
		  $arrContact=SData::getContactData(1,8);
		  
		  echo $arrContact['phone'];//8(904)442-84-47 ?></div></td>
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
<? 	$user = JFactory::getUser();
	if (!$user->guest){?><img src="<?=$path_to_images?>user24.png" width="22" height="22" align="absmiddle" style="margin-left:10px;" title="<?=$user->username?>" /><span style="width:62px; padding-left:3px; text-align:left; display:inline-block; overflow:hidden;" title="<?=$user->username?>"><?=$user->username?></span> &nbsp; <a href="javascript:void();" onclick="manageLoginDisplay('exit');">Выход</a><? }
	else{?>&nbsp; <a href="javascript:void();" onclick="manageLoginDisplay('block');">Вход</a>
                        ::
                        <a href="index.php?option=com_users&view=registration">Регистрация</a><? 
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
            <? 	if ($user->get('guest')!=1){?>  			
            	<div align="right" id="account_menu">
                	<jdoc:include type="modules" name="account" style="xhtml" />
                </div>
            <?	}?>
                <!-- system messages -->
  				<jdoc:include type="message" />
				<div id="com"<? if($user->get('guest')!=1){?> class="offsetAuthorized"<? }?>>
                	<jdoc:include type="modules" name="precustomer_stuff" style="xhtml" />
					<jdoc:include type="component" />
                    <jdoc:include type="modules" name="contacts" style="xhtml" />    
                    <jdoc:include type="modules" name="sdata" style="xhtml" />    
                   	<jdoc:include type="modules" name="feedback" style="xhtml" />    
                    <!--/COM-->
           		</div>
                <!--/WRAPPER_COMPONENT-->
			</div>
            <!--/SECTION 1-->
    	</div><!-- /section1 -->
        <!--/CONTAINER-->
	</div><!-- /main container -->
    <!--/BODY-->
</div><? //echo " exmpl= ".$_SESSION['example1'];?>
<!-- /body -->    
<div id="footer">
	<center>
	<jdoc:include type="modules" name="footer_menu" style="xhtml" />
    </center>
</div>
<jdoc:include type="modules" name="debug" />
</body>
</html>