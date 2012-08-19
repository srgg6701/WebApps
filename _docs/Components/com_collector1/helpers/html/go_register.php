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
defined('_JEXEC') or die;
if ($forbidden) {?>
<div style="background:#FFCCFF; padding:20px 30px 30px 10px; display:inline-block;" class="border_radius">
	<img src="<?php echo $this->baseurl ?>/templates/<?=$this->templatename?>/images/stop.png" width="32" height="32" hspace="6" align="left">Просмотр невозможен, т.к. данный сайт не ваш
<?	
	if ($this->collection_of_user!=-1){?> или при его создании вы указали другой емэйл</span>. 
    <div>Чтобы получить доступ к нему, вам необходимо <a href="<?=JRoute::_($this->go_signup)?>">заавторизоваться или зарегистрироваться</a>.</div><? 
	}?>
    </div>
<?
}elseif ($user&&$user->get('email')&&$user->get('guest')==1){?>
<div style="margin:<?=$margin_minus?>10px 10px 20px 0px; padding:10px 20px 20px 10px; background:#FF9;" class="border_radius">
	<p><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->templatename ?>/images/signs/Flag_red.png" width="24" height="24" hspace="6" align="left"><strong>ВНИМАНИЕ!</strong> Для того, чтобы иметь возможность редактировать  опции сайтов и получить доступ ко всем возможностям системы, вам необходимо <a href="<?=JRoute::_($this->go_signup)?>" style="text-decoration:underline;"><b>добавить к своим данным логин и пароль</b></a>.</p> 
    <div style="padding-left:10px">Это займёт у вам не более нескольких секунд.</div>
</div><?
}?>
