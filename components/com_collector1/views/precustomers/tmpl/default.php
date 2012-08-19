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

<?php if( $this->item ) : ?>

    <div class="item_fields">
        
        <ul class="fields_list">

        
        
                    <li><?php echo 'id'; ?>: 
                    <?php echo $this->item->id; ?></li>

        
        
                    <li><?php echo 'name'; ?>: 
                    <?php echo $this->item->name; ?></li>

        
        
                    <li><?php echo 'email'; ?>: 
                    <?php echo $this->item->email; ?></li>

        
        
                    <li><?php echo 'phone'; ?>: 
                    <?php echo $this->item->phone; ?></li>

        
        
                    <li><?php echo 'skype'; ?>: 
                    <?php echo $this->item->skype; ?></li>

        
        
                    <li><?php echo 'collections_ids'; ?>: 
                    <?php echo $this->item->collections_ids; ?></li>

        
        
                    <li><?php echo 'orders_id'; ?>: 
                    <?php echo $this->item->orders_id; ?></li>

        
        
                    <li><?php echo 'ordering'; ?>: 
                    <?php echo $this->item->ordering; ?></li>

        
        
                    <li><?php echo 'state'; ?>: 
                    <?php echo $this->item->state; ?></li>

        
        
                    <li><?php echo 'checked_out'; ?>: 
                    <?php echo $this->item->checked_out; ?></li>

        
        
                    <li><?php echo 'checked_out_time'; ?>: 
                    <?php echo $this->item->checked_out_time; ?></li>

        

        </ul>
        
    </div>

<?php endif; ?>