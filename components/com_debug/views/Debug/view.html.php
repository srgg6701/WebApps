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

jimport('joomla.application.component.view');
//echo "<h3 style='color:red'>component/view.html.php</h3>";
/**
 * View to edit
 */
class DebugViewDebug extends JView {

    /**
     * Display the view
     */
    public function display($tpl = null) {
		
		if (!$db) $db = JFactory::getDBO();
        $user = JFactory::getUser();
		//SUser::extractCustomerTableData($user);		
		var_dump("<h1>user:</h1><pre>",$user,"</pre>");
        parent::display($tpl);
    }
}
