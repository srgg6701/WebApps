<?php

/**
 * @version		$Id: controller.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 */
class HelloWorldController extends JController
{
	function display()
	{
		$document=JFactory::getDocument();
		$viewName=JRequest::getVar('task','all');
		$viewType=$document->getType();
		$view=$this->getView($viewName,$viewType);
		$model=$this->getModel($viewName,'ModelHelloworld');
		if (!JError::isError($model))
		{
			$view->setModel($model,true);	
		}
		$view->setLayout('default');
		$view->display();
	}
}
