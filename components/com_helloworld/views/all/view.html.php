<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.view');

class HelloworldViewAll extends JView
{
	function display($tpl=null)
	{
		global $option;
		$model =& $this->getModel();
		$list=$model->getList();
		
		for ($i=0; $i=count($list); $i++)
		{
			$row=$list[$i];
			$row->link=JRoute::_('index.php?option='.$option.'&id='.$row->id.'task=hello');
		}
		$this->assignRef('list',$list);
		parent::display($tpl);
	}
}