<?php	echo __FILE__;
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
			<div class="clr"></div><?php echo $this->form->getInput('engines_ids'); ?></li>

            
			<li><?php echo $this->form->getLabel('options_array'); ?>
			<div class="clr"></div><?php echo $this->form->getInput('options_array'); ?></li>

            
			<li><?php echo $this->form->getLabel('xtra'); ?>
			<div class="clr"></div><?php echo $this->form->getInput('xtra'); ?></li>

            
			<li><?php echo $this->form->getLabel('finish_date'); ?>
			<?php echo $this->form->getInput('finish_date'); ?></li>

            

            <li><?php echo $this->form->getLabel('checked_out'); ?>
                    <?php echo $this->form->getInput('checked_out'); ?></li><li><?php echo $this->form->getLabel('checked_out_time'); ?>
                    <?php echo $this->form->getInput('checked_out_time'); ?></li>

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