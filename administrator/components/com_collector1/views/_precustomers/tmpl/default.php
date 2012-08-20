<?php
/**
 * @version     2.1.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */


// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
// Import CSS
$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_collector1/assets/css/collector1.css'); // SDebug::showDebugContent($this->items,'this->items');
//var_dump("<h1>ITEMS:</h1><pre>",$this->items,"</pre>");
$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_collector1');
$saveOrder	= $listOrder == 'a.ordering';?>

<form action="<?php echo JRoute::_('index.php?option=com_collector1&view=_precustomers'); ?>" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
			<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		<div class="filter-select fltrt">

            
                <select name="filter_published" class="inputbox" onchange="this.form.submit()">
                    <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                    <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true);?>
                </select>
                

		</div>
	</fieldset>
	<div class="clr"> </div>
	<!--PRECUSTOMERS-->
	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>

				<th class='left'>
<?	if ($test){?>Имя<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
<?	if ($test){?>Емэйл<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_EMAIL', 'a.email', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
<?	if ($test){?>Телефон<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_PHONE', 'a.phone', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
<?	if ($test){?>Скайп<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_SKYPE', 'a.skype', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
<?	if ($test){?>ID ID Сайтов<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_COLLECTIONS_IDS', 'a.collections_ids', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
<?	if ($test){?>ID ID Заказов<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_ORDERS_ID', 'a.orders_ids', $listDirn, $listOrder); ?>
				</th>


                <?php if (isset($this->items[0]->state)) { ?>
				<th width="5%">
					<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
				</th>
                <?php } ?>
                <?php if (isset($this->items[0]->ordering)) { ?>
				<th width="10%">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
					<?php if ($canOrder && $saveOrder) :?>
						<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', '_precustomers.saveorder'); ?>
					<?php endif; ?>
				</th>
                <?php } ?>
                <?php if (isset($this->items[0]->id)) { ?>
                <th width="1%" class="nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_collector1');
			$canEdit	= $user->authorise('core.edit',			'com_collector1');
			$canCheckin	= $user->authorise('core.manage',		'com_collector1');
			$canChange	= $user->authorise('core.edit.state',	'com_collector1');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>

				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, '_precustomers.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_collector1&task=precustomers.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->name); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->name); ?>
				<?php endif; ?>
				</td>
				<td><?php Collector1Helper::makeObjectEditableField($item->id.'_email','precustomer',$item->email);?>
                </td>
				<td><?php Collector1Helper::makeObjectEditableField($item->id.'_phone','precustomer',$item->phone);?>
				</td>
				<td><?php Collector1Helper::makeObjectEditableField($item->id.'_skype','precustomer',$item->skype);?>
				</td>
				<td><?php Collector1Helper::makeObjectsLinks(explode(",",$item->collections_ids),'collection','precustomer',$item->id);?>
				</td>
				<td><?php Collector1Helper::makeObjectsLinks(explode(",",$item->orders_ids),'order','precustomer',$item->id);?>
				</td>
                <?php if (isset($this->items[0]->state)) { ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, '_precustomers.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>
                <?php if (isset($this->items[0]->ordering)) { ?>
				    <td class="order">
					    <?php if ($canChange) : ?>
						    <?php if ($saveOrder) :?>
							    <?php if ($listDirn == 'asc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, '_precustomers.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, '_precustomers.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php elseif ($listDirn == 'desc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, '_precustomers.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, '_precustomers.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php endif; ?>
						    <?php endif; ?>
						    <?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
						    <input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" />
					    <?php else : ?>
						    <?php echo $item->ordering; ?>
					    <?php endif; ?>
				    </td>
                <?php } ?>
                <?php if (isset($this->items[0]->id)) { ?>
				<td class="center">
					<?php echo (int) $item->id; ?>
				</td>
                <?php } ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>