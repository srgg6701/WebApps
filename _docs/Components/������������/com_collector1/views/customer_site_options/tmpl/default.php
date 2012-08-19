<?php
/**
 * @version     2.0.0
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

        
        
                    <li><?php echo 'customer_id'; ?>: 
                    <?php echo $this->item->customer_id; ?></li>

        
        
                    <li><?php echo 'site_type_id'; ?>: 
                    <?php echo $this->item->site_type_id; ?></li>

        
        
                    <li><?php echo 'engine_type_choice_id'; ?>: 
                    <?php echo $this->item->engine_type_choice_id; ?></li>

        
        
                    <li><?php echo 'engines_ids'; ?>: 
                    <?php echo $this->item->engines_ids; ?></li>

        
        
                    <li><?php echo 'options_array'; ?>: 
                    <?php echo $this->item->options_array; ?></li>

        
        
                    <li><?php echo 'xtra'; ?>: 
                    <?php echo $this->item->xtra; ?></li>

        
        
                    <li><?php echo 'finish_date'; ?>: 
                    <?php echo $this->item->finish_date; ?></li>

        
        
                    <li><?php echo 'ordering'; ?>: 
                    <?php echo $this->item->ordering; ?></li>

        
        
                    <li><?php echo 'checked_out'; ?>: 
                    <?php echo $this->item->checked_out; ?></li>

        
        
                    <li><?php echo 'checked_out_time'; ?>: 
                    <?php echo $this->item->checked_out_time; ?></li>

        

        </ul>
        
    </div>

<?php endif; ?>