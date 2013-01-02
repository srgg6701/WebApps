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

class Collector1Controller extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			$cachable	If true, the view output will be cached
	 * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/collector1.php';
		$layout=JRequest::getVar('layout');
		if ( !JRequest::getVar('view')
		     && ($layout=='collection'||$layout=='order')
		   ){
			$object_id_string=$layout.'_id';
			$object_id=JRequest::getVar($object_id_string);
			// получить view (customers/orders), user_id
			// administrator/index.php?option=com_collector1&view=customers&layout=collection&collection_id=82&user_id=64
			// administrator/index.php?option=com_collector1&view=precustomer&layout=collection&collection_id=86user_id=
			$arrRedirectParams=SCollection::getObjectDataForRedirect($layout,$object_id);
			$url='index.php?option=com_collector1&view=' 
										. $arrRedirectParams['view'] .
										'&layout=' .
										$layout .
										'&' . $object_id_string . '=' .
										$object_id .
										'&user_id=' . 
										$arrRedirectParams['user_id'];
			//die('url: '.$url);
			$this->setRedirect(JRoute::_($url, false)); //
		}else{
			// Load the submenu.
			Collector1Helper::addSubmenu(JRequest::getCmd('view', '_precustomers'));
	
			$view		= JRequest::getCmd('view', '_precustomers');
			JRequest::setVar('view', $view);
	
			parent::display();
	
			return $this;
		}
	}
}
