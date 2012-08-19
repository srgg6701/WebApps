<?php
/**
 * @version     1.0.0
 * @package     com_pay
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'payment.cancel' || document.formvalidator.isValid(document.id('payment-form'))) {
			Joomla.submitform(task, document.getElementById('payment-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_pay&view=add'); ?>" method="post" name="add_pay" id="payment-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_PAY_LEGEND_PAYMENT'); ?></legend>
			<ul class="adminformlist">


			<li><?php echo $this->form->getLabel('id_order'); ?>
			<?php echo $this->form->getInput('id_order'); ?></li>


			<li><?php echo $this->form->getLabel('method_pay'); ?>
			<?php echo $this->form->getInput('method_pay'); ?></li>


			<li><?php echo $this->form->getLabel('summ'); ?>
			<?php echo $this->form->getInput('summ'); ?></li>


			<li><?php echo $this->form->getLabel('currency'); ?>
			<?php echo $this->form->getInput('currency'); ?></li>


			<li><?php echo $this->form->getLabel('description'); ?>
			<?php echo $this->form->getInput('description'); ?></li>


			<li><?php echo $this->form->getLabel('date_begin'); ?>
			<?php echo $this->form->getInput('date_begin'); ?></li>







            </ul>
		</fieldset>
	</div>


	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>
	<input type="submit" value="Добавить">
</form>