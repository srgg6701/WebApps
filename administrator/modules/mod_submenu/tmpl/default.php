<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	mod_submenu
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

if (JRequest::getVar('option')=='com_collector1'){
	require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SHelpersAdmin.php';
	$lists=SAdminMenuHelper::getSubMenuDropDown();
	$list=$lists['parent_list'];
	$list_options=$lists['drop_down_list'];
	$width_style_ul=" style='float:left; width:75%; margin:0;'";
}

$hide = JRequest::getInt('hidemainmenu');?>
<ul id="submenu"<?=$width_style_ul?>>
	<?php 
foreach ($list as $item) :
	if (!strstr($item[1],"&tabletype=base")):?>
	<li>
	<?php
		if ($hide) :
			if (isset ($item[2]) && $item[2] == 1) :
				?><span class="nolink active"><?php echo $item[0]; ?></span><?php
			else :
				?><span class="nolink"><?php echo $item[0]; ?></span><?php
			endif;
		else :
			if(strlen($item[1])) :
				if (isset ($item[2]) && $item[2] == 1) :
					?><a class="active" href="<?php echo JFilterOutput::ampReplace($item[1]); ?>"><?php echo $item[0]; ?></a><?php
				else :
					?><a href="<?php echo JFilterOutput::ampReplace($item[1]); ?>"><?php echo $item[0]; ?></a><?php
				endif;
			else :
				?><?php echo $item[0]; ?><?php
			endif;
		endif;
		?>
		</li>
<?php 
	endif;	
endforeach; ?>
</ul>
<? if(!empty($list_options)): SAdminMenuHelper::buildTablesDropDownList($list_options); endif; ?>