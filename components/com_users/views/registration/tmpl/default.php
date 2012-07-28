<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
//JHtml::_('behavior.formvalidation');
if (!$user) $user = JFactory::getUser();
//var_dump("<h1>user:</h1><pre>",$user,"</pre>");?>
<div class="registration<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>
	<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
<?php endif;?>
	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate" onSubmit="return checkFormFields(this);">
<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
	<?php $fields = $this->form->getFieldset($fieldset->name);?>
	<?php if (count($fields)):?>
		<fieldset>
		<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.?>
			<legend><?php echo JText::_($fieldset->label);?></legend>
		<?php endif;?>
			<dl>
		<?php foreach($fields as $field):// Iterate through the fields in the set and display them.?>
			<?php if ($field->hidden):// If the field is hidden, just display the input.?>
				<?php echo $field->input;?>
			<?php else:?>
				<dt>
				<?php 
				$label_content=$field->label;
				echo $label_content; ?>
				<?php if (!$field->required && $field->type != 'Spacer'): ?>
					<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL');?></span>
				<?php endif; ?>
				</dt>
				<dd><?php 
				$input_content=$field->input;
				if ($user->get('guest')==1&&$user->get('email')) {
					//
					switch ($field->name)  { 
				
						case "jform[name]":
							//echo "NAME";
							$new_input=$user->get('name');
								break;
	
						case "jform[email1]":
							//echo "EMAIL";
							$new_input=$user->get('email');
								break;

						default: unset($new_input);
					}
				}
				if ($new_input) 
					$input_content=str_replace('value=""','value="'.$new_input.'"',$field->input);
				echo $input_content;
				?></dd>
			<?php endif;?>
		<?php endforeach;?>
			</dl>
		</fieldset>
	<?php endif;?>
<?php endforeach;?>
		<div style="padding:4px;"></div>
		<div>
			<button type="submit" class="validate"><?php echo JText::_('JREGISTER');?></button>
			<?php echo JText::_('COM_USERS_OR');?>
			<a href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="registration.register" />
			<?php echo JHtml::_('form.token');?>
		</div>
	</form>
</div>
<script type="text/javascript">
function checkFormFields(form){
	try{
		var fields='';
		var wrong='';
		var field_id,field,txt,lbl_id,tLabel;
		for(i=0;i<form.length;i++){
			field=form.elements[i];
			if(field.id){ 
				lbl_id=field.id+'-lbl';
				tLabel=document.getElementById(lbl_id);
				if (tLabel) { 
					if (field.value=='') {
						txt=tLabel.innerHTML.substr(0,tLabel.innerHTML.indexOf('<'));
						fields+='* '+txt+'\n';
						//alert(txt);
					}else{
						if( field.id=='jform_password2'
							&& field.value!=document.getElementById('jform_password1').value
						  ) wrong+='- Пароли\n';
						if( field.id=='jform_email2'
							&& field.value!=document.getElementById('jform_email1').value
						  ) wrong+='- Адреса электронной почты\n';
					}/**/
				}/**/
			}
		}
		if (fields!=''||wrong!='') {
			var mess='Данные не могут быть отправлены, потому что';
			if (fields!=''&&wrong!=''){
				mess+=':\n1.Не заполнены поля формы - \n'+fields+'2. Не совпадают значения полей - \n'+wrong;
			}else{
				if (fields!='') mess+=' не заполнены следующие поля:\n'+fields; 
				else mess+=' не совпадают значения полей:\n'+wrong;
			}
			alert(mess);
			return false;
		}else return true;
	}catch(e){
		alert(e.message);
	}
}
</script>

