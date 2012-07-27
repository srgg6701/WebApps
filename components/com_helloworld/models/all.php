<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.model');

class ModelHelloworldAll extends JModel{
	var $_hellos=null;
	function getList()
	{
		//if (!$this->_hellos)
		if (empty($this->_hellos))
		{	
			$query="SELECT id, greeting FROM #__helloworld";
			$this->_hellos=$this->_getList($query,0,5);
			//echo "<br>Hello again!";
		}
		return $this->_hellos;
	}
}