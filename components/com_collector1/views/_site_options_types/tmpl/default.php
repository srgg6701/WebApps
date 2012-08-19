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
?>

<?php if($this->items) : ?>

    <div class="items">

            <ul class="items_list">
                
    <?php foreach ($this->items as $item) :?>
                
                <li><a href="<?php echo JRoute::_('index.php?option=com_collector1&view=site_options_types&id=' . (int)$item->id); ?>"><?php echo $item->id; ?></a></li>

    <?php endforeach; ?>
            
            </ul>

    </div>

     <div class="pagination">
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="counter">
                <?php echo $this->pagination->getPagesCounter(); ?>
            </p>
        <?php endif; ?>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>


<?php endif; ?>