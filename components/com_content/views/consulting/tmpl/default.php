<?php
/**
 * @version		$Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
if (!$user) $user = JFactory::getUser();?>
<div class="item-page">
<h2>Лучшие советы. Бесплатно для вас.</h2>
<div>
	<div class="paddingRight10"> 
        <div style="float:right; width:38%; margin:<? if ($user->get('guest')==1){?>10<? }else{?>-14<? }?>px 0px 20px 10px;">
            <div class="block_rounded" style="padding-bottom:20px; padding-left:16px; background:#FFFFCC; border: solid 2px #FFCC66;">
                <div class="h2 bold marginBottom12">Содержание</div>
                <? $this->generateContent(true);?>
            </div>
        </div>
		В этом разделе мы постарались обобщить наш многолетний опыт решения проблем заказчиков и предложить вам советы по наиболее актуальным аспектам создания, развития и поддержки вашего web-сайта. 
        <p>Скорее всего, у вас есть дополнительные вопросы, не освящённые здесь или нуждающиеся в дополнительном рассмотрении. </p>
        <p><strong>Вы можете задать их нам в любой момент!</strong></p>
        <p>Для этого, пожалуйста, <a href="#feedback_form">заполните форму обратной связи</a> ниже или просто позвоните нам!</p>    
	</div>
    <hr>
	<!--<br>
	<h2 class="marginBottom20">Консалтинг</h2>-->
    	<div style="width:80%">
		<? 	$this->generateContent();?>
		</div>
</div>
<div class="marginBottom18 clearBoth"></div>
<hr size="1" noshade>
<?	/*echo $this->other_articles;?>
<hr>
<?*/ ?>
</div>