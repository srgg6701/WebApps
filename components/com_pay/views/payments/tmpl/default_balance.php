<?php
/**
 * @version     1.0.0
 * @package     com_pay
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/


// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_pay');
$saveOrder	= $listOrder == 'a.ordering';
?>
	<?php $model = $this->getModel(); ?>
	<?php $this->items = $model->getListQuery('balance'); ?>

<fieldset id="users-profile-params">
	<legend>Баланс</legend>
	<dl>

	<?php echo 'Текущий баланс: '.$this->items[0]->total; ?>

	</dl>
</fieldset>