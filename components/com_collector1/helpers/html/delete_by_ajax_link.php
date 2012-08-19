<? /**
 * @version		$Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
//require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SFiles.php';
function makeLinkToDelete( $func_name,
						   $obj,
						   $templatename,
						   $baseurl=false,
						   $img_title=false,
						   $patting_top='2',
						   $padding_left='4',
						   $img_style=false
						 ){
	if (!$img_style) $img_style='margin-bottom:4px;';?>
<div style="display:inline-block; padding-top:<?=$patting_top?>px; padding-left:<?=$padding_left?>px;">                  
    <a href="javascript:void();" onClick="return <?=$func_name?>(this,'<?=$obj?>');" class="txtRed"><img title="<?=$img_title?>" align="absmiddle" src="<?=$baseurl?>/templates/<?=$templatename?>/images/commands/delete.gif" width="13" height="13" style="<?php echo $img_style;?>" class="del_obj_img"></a>
</div><?
}?>
