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
		if (task == 'customer_site_options.cancel' || document.formvalidator.isValid(document.id('customer_site_options-form'))) {
			Joomla.submitform(task, document.getElementById('customer_site_options-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_collector1&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="customer_site_options-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_COLLECTOR1_LEGEND_CUSTOMER_SITE_OPTIONS'); ?></legend>
			<ul class="adminformlist">

            
			<li><?php echo $this->form->getLabel('id'); ?>
			<?php echo $this->form->getInput('id'); ?></li>

            
			<li><?php echo $this->form->getLabel('customer_id'); ?>
			<?php echo $this->form->getInput('customer_id'); ?></li>

            
			<li><?php echo $this->form->getLabel('engine_type_choice_id'); ?>
			<?php echo $this->form->getInput('engine_type_choice_id'); ?></li>

            
			<li><?php echo $this->form->getLabel('engines_ids'); ?>
			<?php echo $this->form->getInput('engines_ids'); ?></li>

            
			<li><?php echo $this->form->getLabel('option_ids'); ?>
			<?php echo $this->form->getInput('option_ids'); ?></li>

            

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