<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	mod_quickicon
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
$html = JHtml::_('icons.buttons', $buttons);
?><h1 style="margin:6px 0 0 4px;">CPanel</h1>
<?php if (!empty($html)): ?>
	<div class="cpanel"><?php echo $html;?></div>
<?php endif;?>
