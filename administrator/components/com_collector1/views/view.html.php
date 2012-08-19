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
class Collector1ViewXXX_UCFIRST_INTERNAL_NAME_XXX extends JView
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
		$isNew		= ($this->item->XXX_INTERNAL_PRIMARY_KEY_XXX == 0);
        if (isset($this->item->checked_out)) {
		    $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
        } else {
            $checkedOut = false;
        }
		$canDo		= Collector1Helper::getActions();

		JToolBarHelper::title(JText::_('COM_COLLECTOR1_TITLE_XXX_UPPER_INTERNAL_NAME_XXX'), 'XXX_INTERNAL_NAME_XXX.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit')||($canDo->get('core.create'))))
		{

			JToolBarHelper::apply('XXX_INTERNAL_NAME_XXX.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('XXX_INTERNAL_NAME_XXX.save', 'JTOOLBAR_SAVE');
		}
		if (!$checkedOut && ($canDo->get('core.create'))){
			JToolBarHelper::custom('XXX_INTERNAL_NAME_XXX.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}
		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			JToolBarHelper::custom('XXX_INTERNAL_NAME_XXX.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		}
		if (empty($this->item->XXX_INTERNAL_PRIMARY_KEY_XXX)) {
			JToolBarHelper::cancel('XXX_INTERNAL_NAME_XXX.cancel', 'JTOOLBAR_CANCEL');
		}
		else {
			JToolBarHelper::cancel('XXX_INTERNAL_NAME_XXX.cancel', 'JTOOLBAR_CLOSE');
		}

	}
}
