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

/**
 * View to edit
 */
class Collector1ViewPrecustomers extends JView
{
	protected $state;
	protected $item;
	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', true);
		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);
        if (isset($this->item->checked_out)) {
		    $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
        } else {
            $checkedOut = false;
        }
		$canDo		= Collector1Helper::getActions();

		JToolBarHelper::title(JText::_('COM_COLLECTOR1_TITLE_PRECUSTOMERS'), 'precustomers.png');
		//http://localhost/webapps/administrator/index.php?option=com_collector1&view=precustomers&layout=edit&id=40
		if ( $this->_layout=='edit'
			 && JRequest::getVar('id')
			 // If not checked out, can save the item:
			 && (!$checkedOut && ($canDo->get('core.edit')||($canDo->get('core.create')))) 
		   ){
			JToolBarHelper::apply('precustomers.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('precustomers.save', 'JTOOLBAR_SAVE');
		}
		if ( ( JRequest::getVar('order_id')
			   && JRequest::getVar('user_id')
			 ) || $this->_layout=='collection' || $this->_layout=='order'
		   ) JToolBarHelper::go_back();
		else{
			if (empty($this->item->id)) {
				JToolBarHelper::cancel('precustomers.cancel', 'JTOOLBAR_CANCEL');
			}else {
				JToolBarHelper::cancel('precustomers.cancel', 'JTOOLBAR_CLOSE');
			}
		}
	}
}
