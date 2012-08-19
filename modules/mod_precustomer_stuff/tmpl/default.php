<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_precustomer_stuff
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;?>
<div style="margin-bottom:4px; clear:both;">
	<a href="<?=JRoute::_(JUri::base().'index.php?option=com_collector1&view=collected')?>">Собрано коллекций: <?=($count_collections=count($arr_collections_ids))? $count_collections:'0'?></a>
</div>
<div>
	<a href="<?=JRoute::_(JUri::base().'index.php?option=com_collector1&view=orders')?>">Заказов компонентов: <span id="components_number"><?=($count_orders=count($arr_orders_ids))? $count_orders:'0'?></span></a>
</div>