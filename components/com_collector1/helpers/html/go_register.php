<? 
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die; 
/**
 * Предупреждение о невозможности просмотра параметров сайта и предложение зарегистрироваться
 */
$view_name=JRequest::getVar('view');
if ($forbidden) {?>
<div style="background:#FFCCFF;" class="border_radius block_done">
	<div>
	<img src="<?php echo $this->baseurl ?>/templates/<?=$this->templatename?>/images/stop.png" width="32" height="32" hspace="6" align="left">Просмотр невозможен, т.к. данный сайт не ваш.</div>
    </div>
<?
}elseif ( $user
		  && $user->get('email')
		  && $user->get('guest')==1
		){?>
<div style="background:#FF9;" class="border_radius block_done">
	<div>
	<p><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->templatename ?>/images/signs/Flag_red.png" width="24" height="24" hspace="6" align="left"><strong>ВНИМАНИЕ!</strong> Для того, чтобы иметь возможность редактировать <?
    if($view_name=='collected'){?>опции сайтов<? }
	elseif($view_name=='orders'){?>параметры заказов<? }?> и получить доступ ко всем возможностям системы, вам необходимо <a href="<?=JRoute::_($this->go_signup)?>" style="text-decoration:underline;"><b>добавить к своим данным логин и пароль</b></a>.</p>
Это займёт у ваc не более нескольких секунд.    </div>
</div><? 
}else{ 
	var_dump("<h1>user:</h1><pre>",$user,"</pre>");
	die("<h4>No user</h4>"); 
}?>
