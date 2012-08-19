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

        
        
                    <li><?php echo 'dnior_users_id'; ?>: 
                    <?php echo $this->item->dnior_users_id; ?></li>

        
        
                    <li><?php echo 'surname'; ?>: 
                    <?php echo $this->item->surname; ?></li>

        
        
                    <li><?php echo 'middle_name'; ?>: 
                    <?php echo $this->item->middle_name; ?></li>

        
        
                    <li><?php echo 'sex'; ?>: 
                    <?php echo $this->item->sex; ?></li>

        
        
                    <li><?php echo 'birthday'; ?>: 
                    <?php echo $this->item->birthday; ?></li>

        
        
                    <li><?php echo 'work_phone'; ?>: 
                    <?php echo $this->item->work_phone; ?></li>

        
        
                    <li><?php echo 'mobila'; ?>: 
                    <?php echo $this->item->mobila; ?></li>

        
        
                    <li><?php echo 'company_name'; ?>: 
                    <?php echo $this->item->company_name; ?></li>

        
        
                    <li><?php echo 'city'; ?>: 
                    <?php echo $this->item->city; ?></li>

        
        
                    <li><?php echo 'region'; ?>: 
                    <?php echo $this->item->region; ?></li>

        
        
                    <li><?php echo 'zip_code'; ?>: 
                    <?php echo $this->item->zip_code; ?></li>

        
        
                    <li><?php echo 'ordering'; ?>: 
                    <?php echo $this->item->ordering; ?></li>

        
        
                    <li><?php echo 'checked_out'; ?>: 
                    <?php echo $this->item->checked_out; ?></li>

        
        
                    <li><?php echo 'checked_out_time'; ?>: 
                    <?php echo $this->item->checked_out_time; ?></li>

        

        </ul>
        
    </div>

<?php endif; ?>