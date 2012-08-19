<?php
/**
 * @version     1.0.0
 * @package     com_pay
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Payment controller class.
 */
class PayControllerPayment extends JControllerForm
{

    function __construct() {
        $this->view_list = 'payments';
        parent::__construct();
    }

}