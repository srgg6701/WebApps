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
JHtml::_('behavior.formvalidation');
// Import CSS
$document = &JFactory::getDocument();
$document->addStyleSheet('components/com_collector1/assets/css/collector1.css');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'precustomers.cancel' || document.formvalidator.isValid(document.id('precustomers-form'))) {
			Joomla.submitform(task, document.getElementById('precustomers-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_collector1&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="precustomers-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_COLLECTOR1_LEGEND_PRECUSTOMERS'); ?></legend>
			<ul class="adminformlist">

            
			<li><?php echo $this->form->getLabel('id'); ?>
			<?php echo $this->form->getInput('id'); ?></li>

            
			<li><?php echo $this->form->getLabel('name'); ?>
			<?php echo $this->form->getInput('name'); ?></li>

            
			<li><?php echo $this->form->getLabel('email'); ?>
			<?php echo $this->form->getInput('email'); ?></li>

            
			<li><?php echo $this->form->getLabel('phone'); ?>
			<?php echo $this->form->getInput('phone'); ?></li>

            
			<li><?php echo $this->form->getLabel('skype'); ?>
			<?php echo $this->form->getInput('skype'); ?></li>

            <?	/*?>
            
			<li><?php echo $this->form->getLabel('collections_ids'); ?>
			<div class="clr"></div><?php echo $this->form->getInput('collections_ids'); ?></li>

            
			<li><?php echo $this->form->getLabel('orders_id'); ?>
			<div class="clr"></div><?php echo $this->form->getInput('orders_id'); ?></li>

            
			<li><?php echo $this->form->getLabel('session_id'); ?>
			<?php echo $this->form->getInput('session_id'); ?></li>


            <li><?php echo $this->form->getLabel('state'); ?>
                    <?php echo $this->form->getInput('state'); ?></li><li><?php echo $this->form->getLabel('checked_out'); ?>
                    <?php echo $this->form->getInput('checked_out'); ?></li><li><?php echo $this->form->getLabel('checked_out_time'); ?>
                    <?php echo $this->form->getInput('checked_out_time'); ?></li>
            <?*/	?>

            </ul>
		</fieldset>
	</div>


	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>