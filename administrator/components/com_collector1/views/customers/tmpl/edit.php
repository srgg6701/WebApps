<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Created by com_combuilder - http://www.notwebdesign.com
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'customers.cancel' || document.formvalidator.isValid(document.id('customers-form'))) {
			Joomla.submitform(task, document.getElementById('customers-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_collector1&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="customers-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_COLLECTOR1_LEGEND_CUSTOMERS'); ?></legend>
			<ul class="adminformlist">

            
			<li><?php echo $this->form->getLabel('surname'); ?>
			<?php echo $this->form->getInput('surname'); ?></li>

            
			<li><?php echo $this->form->getLabel('middle_name'); ?>
			<?php echo $this->form->getInput('middle_name'); ?></li>

            
			<li><?php echo $this->form->getLabel('sex'); ?>
			<?php echo $this->form->getInput('sex'); ?></li>

            
			<li><?php echo $this->form->getLabel('birthday'); ?>
			<?php echo $this->form->getInput('birthday'); ?></li>

            
			<li><?php echo $this->form->getLabel('work_phone'); ?>
			<?php echo $this->form->getInput('work_phone'); ?></li>

            
			<li><?php echo $this->form->getLabel('mobila'); ?>
			<?php echo $this->form->getInput('mobila'); ?></li>

            
			<li><?php echo $this->form->getLabel('company_name'); ?>
			<?php echo $this->form->getInput('company_name'); ?></li>

            
			<li><?php echo $this->form->getLabel('city'); ?>
			<?php echo $this->form->getInput('city'); ?></li>

            
			<li><?php echo $this->form->getLabel('region'); ?>
			<?php echo $this->form->getInput('region'); ?></li>

            
			<li><?php echo $this->form->getLabel('zip_code'); ?>
			<?php echo $this->form->getInput('zip_code'); ?></li>

            

            <li><?php echo $this->form->getLabel('checked_out'); ?>
                    <?php echo $this->form->getInput('checked_out'); ?></li><li><?php echo $this->form->getLabel('checked_out_time'); ?>
                    <?php echo $this->form->getInput('checked_out_time'); ?></li>

            </ul>
		</fieldset>
	</div>


	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>
</form>