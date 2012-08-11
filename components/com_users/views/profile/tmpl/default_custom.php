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
	<legend><?php 
		echo JText::_('COM_USERS_PROFILE_EXTRA_LABEL');//COM_USERS_PROFILE_INFO_USER ?></legend>
	<dl>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_SURNAME_LABEL'); ?>
		</dt>
		<dd>
			<?php $this->showValue('name');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_MIDDLE_NAME_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('middle_name');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_SEX_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('sex');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_BIRTHDAY_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('birthday');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_WORK_PHONE_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('work_phone');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_MOBILA_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('mobila');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_COMPANY_NAME_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('company_name');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_CITY_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('city');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_REGION_LABEL'); ?>
		</dt>		
        <dd>
			<?php $this->showValue('region');?>
		</dd>
		<dt>
		<?php echo JText::_('COM_USERS_PROFILE_ZIP_CODE_LABEL'); ?>
		</dt>
        <dd>
			<?php $this->showValue('zip');?>
		</dd>
	</dl>
</fieldset>


