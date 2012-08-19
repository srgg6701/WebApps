<?php
/**
 * @version     1.0.0
 * @package     com_pay
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/


// No direct access
defined('_JEXEC') or die;

class PayController extends JController
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
		require_once JPATH_COMPONENT.'/helpers/pay.php';

		// Load the submenu.
		//PayHelper::addSubmenu(JRequest::getCmd('view', 'payments'));
		$document	= JFactory::getDocument();
		$vFormat = $document->getType();
		$vName		= JRequest::getCmd('view', 'payments');
		if ($view = $this->getView($vName, $vFormat)) {
			switch ($vName) {
				case 'payments':
					$user = JFactory::getUser();
					if ($user->get('guest') == 1) {
						// Redirect to login page.
						$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
						return;
					}
					$model = $this->getModel('payments');
					break;
				case 'payment';

					$user = JFactory::getUser();
					if ($user->get('guest') == 1) {
						// Redirect to login page.
						$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
						return;
					}
					$model = $this->getModel('payment');
					$table = $model->getTable();
					$post =JRequest::get('post');
					/* if (!$table->bind(JRequest::get('post'))) {
					 return JError::raiseWarning(500, $row->getError());
					} */
					/* if (!$table->store()) {
					 JError::raiseError(500, $row->getError());
					} */



					// Check for errors.
					if (count($errors = $this->get('Errors'))) {
						JError::raiseError(500, implode("\n", $errors));
						return false;
					}
					foreach($post['cid'] as $id){
							$table->delete($id);
					}

					$this->setRedirect(JRoute::_('index.php?option=com_pay&view=payments', false));
					break;
				case 'add':

					$model = $this->getModel('payment');
					$user = JFactory::getUser();
					if ($user->get('guest') == 1) {
						// Redirect to login page.
						$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
						return;
					}

					if(isset($_POST['jform'])){
						//Дополняем входящие данные
						$_POST['jform']['id_customer'] = $user->get('id');
						$_POST['jform']['date_end'] = date('Y-m-d H:i:s');
						$_POST['jform']['status'] = 0;
						$_POST['jform']['operation'] = 1;
						//получаем текущий баланс
						$model = $this->getModel('payment');
						$total = $model->getTotal($user->get('id'));
						$_POST['jform']['total'] = $total['total'];
						$table = $model->getTable();
						$post =JRequest::get('post');

						if (!$table->bind($post['jform'])) {
							return JError::raiseWarning(500, $table->getError());
						}

						if (!$table->store()) {
						 JError::raiseError(500, $table->getError());
						}


						$this->setRedirect(JRoute::_('index.php?option=com_pay&view=payments', false));
					}


					break;
			}
		}
		$view->setModel($model, true);
        //JRequest::setVar('view', $view);

		parent::display();

		return $this;
	}
}
