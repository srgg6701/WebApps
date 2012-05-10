<?php
/**
 * @version		$Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');?>
<h4 style="margin-top:-10px;">Выбранные вами опции:</h4>
<table>
<?php //foreach($this->list as $l): ?>
<tr><td>
<a href="<?php //echo $l->link;?>"><?php //echo $l->title;?></a>
</td></tr>
<?php //endforeach; ?>
</table>