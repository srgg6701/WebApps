<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_custom
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?><div class="custom<?php echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')): ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?>>
<div class="h3 marginBottom14 bold">Вы можете связаться с нами по телефонам (11:00 - 19:00 Мск):</div>
	<?php 
	for($i=1;$i<=3;$i++){
		$person_data=SData::getContactData($i);?>
    <div style="margin-top:6px;">
		<b><?=$person_data['phone']?></b>, <?=$person_data['name']?> <?=$person_data['subname']?>, <?=$person_data['position']?>
	</div>
	<?
	}//echo $module->content;?>
</div>
<div style="margin-top:20px;" class="h3 marginBottom10 bold">...или отправить сообщение через форму обратной связи:</div>
