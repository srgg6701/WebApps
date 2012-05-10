<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class collector1ModelCollected extends JModel
{	
	function do_something()
	{
		echo ' Here is collected.php';
	}
}
?>