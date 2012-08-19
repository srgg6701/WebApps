<? 
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
/**
 * Показывает собранные (незаавторизованным) юзером коллекции
 */
$arrGuestCollections=$this->guest_collections_ids;
if ($arrGuestCollections[0]) {?>
<div style="margin:-10px 20px 0px 0px; padding-bottom:10px;">Собранные вами сайты: <?
	for ($i=0,$j=count($arrGuestCollections);$i<$j;$i++){
		if ($i) echo ',';?>
	# <a href="<?=JRoute::_('index.php?option=com_collector1&view=collected&collection_id='.$arrGuestCollections[$i])?>"><?=$arrGuestCollections[$i]?></a><? 
	}?></div>
<?	require_once JPATH_COMPONENT.DS.'helpers/html/go_register.php';
}