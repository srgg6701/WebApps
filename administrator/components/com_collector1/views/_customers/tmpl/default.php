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
$document->addStyleSheet('components/com_collector1/assets/css/collector1.css');

$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_collector1');
$saveOrder	= $listOrder == 'a.ordering'; SDebug::showDebugContent($this->items,'items');?>

<form action="<?php echo JRoute::_('index.php?option=com_collector1&view=_customers'); ?>" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
			<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		<div class="filter-select fltrt">

            

		</div>
	</fieldset>
	<div class="clr"> </div>

	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>
				<th class='left'><? if ($test){?>USERNAME<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_USERNAME', 'a.username', $listDirn, $listOrder); ?>
                </th>
				<th class='left'><? if ($test){?>NAME<? }?>
                <?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_NAME', 'a.name', $listDirn, $listOrder); ?>
                </th>
				<th class='left'><? if ($test){?>SURNAME<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_SURNAME', 'a.surname', $listDirn, $listOrder); ?>
				</th>
				<th class='left'><? if ($test){?>MIDDLE_NAME<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_MIDDLE_NAME', 'a.middle_name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'><? if ($test){?>SEX<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_SEX', 'a.sex', $listDirn, $listOrder); ?>
				</th>
				<th class='left'> <?	if ($test){?>
				  ID ID Сайтов
				  <? }?>
				  <?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_COLLECTIONS_IDS', 'a.collections_ids', $listDirn, $listOrder); ?> </th>
				<th class='left'> <?	if ($test){?>
				  ID ID Заказов
				  <? }?>
				  <?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__PRECUSTOMERS_ORDERS_ID', 'a.orders_ids', $listDirn, $listOrder); ?> </th>
				<?	/*
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_BIRTHDAY', 'a.birthday', $listDirn, $listOrder); ?>
				</th>
                
                */	?>
				<th class='left'><? if ($test){?>WORK_PHONE<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_WORK_PHONE', 'a.work_phone', $listDirn, $listOrder); ?>
				</th>
				<th class='left'><? if ($test){?>MOBILA<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_MOBILA', 'a.mobila', $listDirn, $listOrder); ?>
				</th>
				<th class='left'><? if ($test){?>SKYPE<? }?>
                <?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_SKYPE', 'a.skype', $listDirn, $listOrder); ?>
                </th>
				<th class='left'><? if ($test){?>COMPANY_NAME<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_COMPANY_NAME', 'a.company_name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'><? if ($test){?>CITY<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_CITY', 'a.city', $listDirn, $listOrder); ?>
				</th>
				<th class='left'><? if ($test){?>REGION<? }?>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_REGION', 'a.region', $listDirn, $listOrder); ?>
				</th>
                <?	/*
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_COLLECTOR1__CUSTOMERS_ZIP_CODE', 'a.zip_code', $listDirn, $listOrder); ?>
				</th>


                <?php */
					  if (isset($this->items[0]->state)) { ?>
				<th width="5%">
					<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
				</th>
                <?php } ?>
                <?php if (isset($this->items[0]->ordering)) { ?>
				<th width="10%">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
					<?php if ($canOrder && $saveOrder) :?>
						<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', '_customers.saveorder'); ?>
					<?php endif; ?>
				</th>
                <?php } ?>
                <?php if (isset($this->items[0]->id)) { ?>
                <th width="1%" class="nowrap"><? if ($test){?>ID<? }?>
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="19">
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
				<?php if ($item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'items.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_collector1&task=customers.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->username); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->username); ?>
                <?php endif; ?>
                    </td>
				<td><?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_collector1&task=customers.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->name); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->name); ?>
				<?php endif; ?>
                </td>
				<td>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_collector1&task=customers.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->surname); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->surname); ?>
				<?php endif; ?>
				</td>
				<td>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_collector1&task=customers.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->middle_name); ?></a>
				<?php else : ?>
					<?php echo $item->middle_name; ?>
				<?php endif; ?>
				</td>
				<td>
					<?php echo $item->sex; ?>
				</td>
				<td><?php Collector1Helper::getCustomerObjects((int)$item->id,'site_options');?></td>
				<td><?php Collector1Helper::getCustomerObjects((int)$item->id,'orders');?></td>
				<? /*
                <td>
					<?php echo $item->birthday; ?>
				</td>
                	*/?>
				<td>
					<?php echo $item->work_phone; ?>
				</td>
				<td>
					<?php echo $item->mobila; ?>
				</td>
				<td>&nbsp;</td>
				<td>
					<?php echo $item->company_name; ?>
				</td>
				<td>
					<?php echo $item->city; ?>
				</td>
				<td>
					<?php echo $item->region; ?>
				</td>
                <? /*
				<td>
					<?php echo $item->zip_code; ?>
				</td>
                <?php */
					  if (isset($this->items[0]->state)) { ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, '_customers.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>
                <?php if (isset($this->items[0]->ordering)) { ?>
				    <td class="order">
					    <?php if ($canChange) : ?>
						    <?php if ($saveOrder) :?>
							    <?php if ($listDirn == 'asc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, '_customers.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, '_customers.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php elseif ($listDirn == 'desc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, '_customers.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, '_customers.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
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