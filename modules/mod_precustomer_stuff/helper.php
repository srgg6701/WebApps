<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_precustomer_stuff
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SCollection.php';
SCollection::getUserSet();
$arr_collections_ids=SCollection::$collections_ids_array;
$arr_orders_ids=SCollection::$orders_ids_array;