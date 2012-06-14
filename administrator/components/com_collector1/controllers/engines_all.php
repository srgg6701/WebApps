<?php
/**
 * @version     2.1.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Engines_all controller class.
 */
class Collector1ControllerEngines_all extends JControllerForm
{

    function __construct() {
        $this->view_list = '_engines_all';
        parent::__construct();
    }

}