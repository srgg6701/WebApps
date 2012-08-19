<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */
defined('_JEXEC') or die;



$custom_data = $this->data_custom;



?>
<fieldset id="users-profile-custom" class="users-profile-custom-<?php echo $group;?>">
	<legend><?php echo JText::_('COM_USERS_PROFILE_INFO_USER'); ?></legend>
	<dl>
		<?php if($custom_data['surname']!=null && $custom_data['surname']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_SURNAMENAME_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['surname']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['middle_name']!=null && $custom_data['middle_name']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_MIDDLENAME_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['middle_name']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['sex']!=null && $custom_data['sex']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_SEX_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['sex']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['birthday']!=null && $custom_data['birthday']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_BIRTHDAY_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['birthday']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['work_phone']!=null && $custom_data['work_phone']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_WORK_PHONE_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['work_phone']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['mobila']!=null && $custom_data['mobila']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_MOBILA_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['mobila']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['company_name']!=null && $custom_data['company_name']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_COMPANY_NAME_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['company_name']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['city']!=null && $custom_data['city']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_CITY_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['city']; ?>
		</dd>
	<?php endif;?>
	<?php if($custom_data['region']!=null && $custom_data['region']!=''): ?>
		<dt>
			<?php echo JText::_('COM_USERS_PROFILE_REGION_LABEL'); ?>
		</dt>
		<dd>
			<?php echo $custom_data['region']; ?>
		</dd>
	<?php endif;?>
	</dl>
</fieldset>


