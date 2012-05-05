<?php
/**
 * Date         January 30, 2012
 * Copyright    Copyright (C) 2012 Lal B. Saud
 * License  GPL
 */
defined('_JEXEC') or die;
$app = JFactory::getApplication();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/firefox/correct_submenu_position.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css">
</head>
<body>
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
                    <td align="center" nowrap class="logotype"><a href="index.php">DevLogo</a><span style="color: #F4BD00;">.net</span> :: <span style="font-size:0.8em; font-weight:lighter;"> 8(904)442-84-47</span></td>
                    <td align="right" nowrap id="topSearch">Найти: 
                      <input type="text" size="40">
                    <img class="link" src="templates/<?php echo $this->template ?>/images/find_black_18.png" width="18" height="18" hspace="4" align="absmiddle"></td>
                    <td align="center" nowrap style="font-size:1.1em; padding-right:14px;"><a href="#">Вход</a> :: <a href="#">Регистрация</a></td>
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
<?	/*if (!strstr($_SERVER['REQUEST_URI'],'?')&&!strstr($_SERVER['REQUEST_URI'],'/index.php/')){

		if ($dw_mode){?>    	
        <?	require "default_mission.php";?>        
    <?	}else require 'templates/'.$this->template.'/default_mission.php';?>    
            </div>
            
            </div>
            <!-- / section1 -->



            <!--  -->
    <?	if ($dw_mode){?>    	
        <?	require "quick_and_free.php";?>        
    <?	}else require 'templates/'.$this->template.'/quick_and_free.php';?>    
		<!-- section2 -->        

    		<div id="section2">
<?	if ($dw_mode){?>    	
	<?	require "all_our.php";?>        
<?	}else require 'templates/'.$this->template.'/all_our.php';?>    
        	<div id="right_advices">
           		<div style="padding-left:10px;">
<?	if ($dw_mode){?>    	
	<?	require "right_advices.php";?>        
<?	}else require 'templates/'.$this->template.'/right_advices.php';?>    
            	</div>
        	</div>
    	<!-- / section2 -->
<?	}else {*/?>
				<div id="com">
					<jdoc:include type="component" />    
           		</div>
<?	//}?>		
			</div>
    	</div><!-- /section1 -->
	</div><!-- /main container -->
</div>
<!-- /body -->    
<?	//параметры форматирования таблицы нижнего меню:
	//$_SESSION['menu_table_params']='align="center" class="light" cellspacing="0" height="48"';
	//unset($_SESSION['menu_tr_params']);		
?>
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