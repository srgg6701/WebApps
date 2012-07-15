    <div id="mission_possible"<? 
	$user = JFactory::getUser();
	if ($user->get('guest')==1
		 && $user->get('email') //precustomer
	   ){
		?> style="margin-top:-40px;"<? $precustomer=true;
    }?>>
        <div id="mission_possible_header" class="txtBlack"><a href="index.php/mission">Миссия выполнима!</a>
<? 	if ($precustomer) {?> 
		<div style="font-size:14px; margin-bottom:-3px; margin-top:9px;" align="center">
        	<span style="background:#FF9; padding:6px 18px 6px 15px;" class="border_radius">Мы уже работаем над этим...</span>
        </div>
<? 	}?> 
        </div>
<? 	if (!$precustomer) {?> 
        <div id="your_the_best">Ваш web-сайт будет самым лучшим &#8212;</div>
<? 	}?> 
    </div>
<!-- Mission is possible CONTENT -->    
<div align="left" id="mission_wrapper_next">
    <!-- Mission is possible! (HEADER) -->

    <!-- Just mission CONTENT -->    
    <div id="mission_content">
        <div id="mission_content_next">
            <table cellspacing="0" width="100%" cellpadding="10">
              <tr valign="top">
                <td id="img_people">
                  <img id="illustration_main" src="<?=$path_to_images?>127544905.jpg" width="363" height="242"></td>
                <td rowspan="2" class="h2" id="your_site">
                  <li></li>Мощным
                  <p><li></li>Функциональным</p>
                  <p><li></li>Быстрым</p>
                  <p><li></li>Легко модифицируемым</p>
                  <div style="margin:26px 0 24px 0;">
                  	<hr style="border-color:#090;" size="1" noshade />
                  </div>
                  <p><img style="margin-right:10px;" src="<?=$path_to_images?>infinity.gif" width="36" height="36" align="left">Ваш сайт будет бессмертным &#8212; <div style="color:#7C9C72; font-size:0.8em">Я гарантирую это! &copy;</div></p>
                </td>
              </tr>
              <tr>
                <td class="h1" id="super_bonuses"><img src="<?=$path_to_images?>1335622738_bag.png" width="48" height="48" hspace="4" align="absmiddle"><a href="#">Супербонусы для рекомендателей!</a></td>
              </tr>
          </table>
        </div>
        <div id="mission_content2"<? if ($precustomer){?> style="position:absolute; right:30px; top:191px;"<? }?>>

            <div id="our_principles">4 наших главных принципа:</div>
            
            <div class="list_big_circle">
                <p><li><span>1</span></li>Создание web-сайта для заказчика не является  конечной целью &#8212; мы разрабатываем системы, которые сможет в дальнейшем поддерживать и модифицировать любой специалист даже среднего уровня.</p>
                <div style="clear:both"></div> 
                <p><li><span>2</span></li>Каждый сайт сопровождается полным пакетом документации; </p>
                <div style="clear:both"></div> 
                <p><li><span>3</span></li>Архитектура приложения позволяет легко добавлять/изменять любые компоненты без изучения внутреннего устройства системы и каких-либо дополнительных затрат;</p>
                <div style="clear:both"></div> 
                <p><li><span>4</span></li>Невыполнимых заданий не существует.</p>
            </div>
        </div>
   </div>
</div>
