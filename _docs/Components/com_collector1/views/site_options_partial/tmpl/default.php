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

        
        
                    <li><?php echo 'site_option_id'; ?>: 
                    <?php echo $this->item->site_option_id; ?></li>

        
        
                    <li><?php echo 'sites_types_ids_location'; ?>: 
                    <?php echo $this->item->sites_types_ids_location; ?></li>

        
        
                    <li><?php echo 'ordering'; ?>: 
                    <?php echo $this->item->ordering; ?></li>

        
        
                    <li><?php echo 'checked_out'; ?>: 
                    <?php echo $this->item->checked_out; ?></li>

        
        
                    <li><?php echo 'checked_out_time'; ?>: 
                    <?php echo $this->item->checked_out_time; ?></li>

        

        </ul>
        
    </div>

<?php endif; ?>