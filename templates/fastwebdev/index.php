<?php
/**
 * License: Private Property
 */
defined('_JEXEC') or die;

if (!$app) $app = JFactory::getApplication();

if (!$this->baseurl){
	$this->baseurl="http://".$_SERVER['HTTP_HOST'];
}?>
<!DOCTYPE HTML>
<html>
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css"> 
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/fastwebdev/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/fastwebdev/js/common.js"></script>
</head>
<body>
<?
if(strstr($_SERVER['HTTP_HOST'],"localhost")||$_GET['debug']){
	?><div style="position:fixed; right:10px; bottom:4px; background:#FFFF00; z-index:1;" class="padding10 bold border_radius"><a href="#" onclick="manageBlockDisplay('debug_menu');return false">Debug</a> 
    <div id="debug_menu" class="padding10 bgSand border_radius" style="position:absolute; bottom:37px; right:0px; display:<?="none"?>; border:solid 1px #FF9900;">
    	<div><a href="index.php?option=com_content&view=app">Objects</a></div>
    	<div style="white-space:nowrap;"><a href="index.php?option=com_debug">Tests & Debug</a></div>
        <div><a href="index.php?option=com_content&view=app&c=debug&task=_session_unset">session_unset</a></div>
    </div>
    </div>
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
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/firefox/correct_submenu_position.js">
</script>
<? 	}?>
            <div id="wrapper_component">
            <? 	if ($user->get('guest')!=1) :?>  			
            	<div align="right" id="account_menu"><!--
                
                Состав меню редактируется в разделе Меню -> Мой аккаунт
                
                	--><jdoc:include type="modules" name="account" style="xhtml" />
                </div>
            <?	endif;?>
                <!-- system messages -->
  				<jdoc:include type="message" />
				<div id="com"<? if($user->get('guest')!=1){?> class="offsetAuthorized"<? }?>>
                	
			<?	if ( ( JRequest::getVar('option')=="com_users"
                       && JRequest::getVar('layout')=="complete"
                     ) || $user->get('guest')!=1
                   ) $hide_stuff=true;
                if (!$hide_stuff):?>
                    <jdoc:include type="modules" name="precustomer_stuff" style="xhtml" />
			<?	endif;?>    
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
<script type="text/javascript">
$( function(){
		$('#swrd').html('Найти: ');
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
<jdoc:include type="modules" name="debug" />
</body>
</html>