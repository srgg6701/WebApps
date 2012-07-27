<table id="tableMenu" align="center" class="light" width="100%" cellspacing="0">
  <tr class="center">
    <td class="tdActive"><a href="#">:: Миссия</a></td>
    <td class="mMenu" id="tdMenuConsult"<?
if (strstr($_SERVER['HTTP_USER_AGENT'],'Firefox')){?> onMouseOver="correctPosition(this);"<? }
    ?>><a href="#">Консалтинг</a>
        <div id="submenu_consalt" class="light drop_down_menu" style="position:absolute;">
            <a href="#">Какую CMS выбрать</a>
            <a href="#">Сколько стоит интернет-магазин</a>
            <a href="#">Как выяснить лояльность разработчика</a>
            <a href="#">Ст&oacute;ит ли нанимать фрилансера</a>
            <a href="#">Сколько платить за создание сайта</a>
        </div></td>
    <td><a href="#">Собрать-и-посчитать</a></td>
    <td><a href="#">Вопрос-ответ</a></td>
    <td><a href="#">Соглашение об услугах</a></td>
    <td><a href="#">Партнёрская программа</a></td>
  </tr>
</table>
<? 	if (strstr($_SERVER['HTTP_USER_AGENT'],'Firefox')){?>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/firefox/correct_submenu_position.js">
</script>
<? 	}?>
