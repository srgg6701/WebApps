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
$images=SSite::getImagesPath();
?>
<DIV class="item-page">
  <h2>Способы оплаты</h2>
    <table cellspacing="0" cellpadding="8">
  <tr>
    <td align="center"><img src="<?=$images?>payments/sberbank.png" width="26" height="27"></td>
    <td>Банковский перевод</td>
  </tr>
  <tr>
    <td align="center"><img src="<?=$images?>payments/yandex.png" width="23" height="28"></td>
    <td>Яндекс.деньги</td>
  </tr>
  <tr>
    <td align="center"><img src="<?=$images?>payments/webmoney.png" width="26" height="27"></td>
    <td>WebMoney</td>
  </tr>
  <tr>
    <td align="center"><img src="<?=$images?>payments/money@mail.ru.png" width="19" height="20"></td>
    <td>Деньги@mail.ru</td>
  </tr>
  <tr>
    <td><img src="<?=$images?>payments/paypal.png" width="37" height="11"></td>
    <td>PayPal</td>
  </tr>
</table><br>
Если ни один из указанных вам способов оплаты услуг не подходит, сообщите нам о вашей проблеме, заполнив форму отправки ниже:
<hr size="1">
</DIV>