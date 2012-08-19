<?php
/**
 * @version     2.0.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Site_options controller class.
 */
class Collector1ControllerSite_options extends JController
{

    function __construct() {
        $this->view_list = '_site_options';
        parent::__construct();
    }

}