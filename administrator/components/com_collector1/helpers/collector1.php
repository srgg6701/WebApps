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

/**
 * Collector1 helper.
 */
class Collector1Helper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{

		JSubMenuHelper::addEntry(
			JText::_('Предзаказчики'), // COM_COLLECTOR1_TITLE__PRECUSTOMERS
			'index.php?option=com_collector1&view=_precustomers',
			$vName == '_precustomers'
		);
		JSubMenuHelper::addEntry(
			JText::_('Заказчики'), // COM_COLLECTOR1_TITLE__CUSTOMERS
			'index.php?option=com_collector1&view=_customers',
			$vName == '_customers'
		);
		JSubMenuHelper::addEntry(
			JText::_('Внесшие предоплату'), // COM_COLLECTOR1_TITLE__CUSTOMERS_PAID
			'index.php?option=com_collector1&view=_customers_paid',
			$vName == '_customers_paid'
		);
		JSubMenuHelper::addEntry(
			JText::_('Собранные коллекции'), // COM_COLLECTOR1_TITLE__CUSTOMER_SITE_OPTIONS
			'index.php?option=com_collector1&view=_customer_site_options',
			$vName == '_customer_site_options'
		);
		JSubMenuHelper::addEntry(
			JText::_('Заказы компонентов'), // COM_COLLECTOR1_TITLE__CUSTOMER_ORDERS
			'index.php?option=com_collector1&view=_customer_orders',
			$vName == '_customer_orders'
		);
		JSubMenuHelper::addEntry(
			JText::_('Файлы'), // COM_COLLECTOR1_TITLE__FILES_NAMES
			'index.php?option=com_collector1&view=_files_names',
			$vName == '_files_names'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__ENGINES_ALL'),
			'index.php?option=com_collector1&view=_engines_all',
			$vName == '_engines_all'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__ENGINES_RU'),
			'index.php?option=com_collector1&view=_engines_ru',
			$vName == '_engines_ru'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__SITE_OPTIONS'),
			'index.php?option=com_collector1&view=_site_options',
			$vName == '_site_options'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__SITE_OPTIONS_TYPES'),
			'index.php?option=com_collector1&view=_site_options_types',
			$vName == '_site_options_types'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__SITE_TYPES'),
			'index.php?option=com_collector1&view=_site_types',
			$vName == '_site_types'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__OPTIONS_BEYOND_SIDES'),
			'index.php?option=com_collector1&view=_options_beyond_sides',
			$vName == '_options_beyond_sides'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__SITE_OPTIONS_PARTIAL'),
			'index.php?option=com_collector1&view=_site_options_partial',
			$vName == '_site_options_partial'
		);
		/*JSubMenuHelper::addEntry(
			JText::_('COM_COLLECTOR1_TITLE__VIRTUAL_ORDERSS'),
			'index.php?option=com_collector1&view=_virtual_orderss',
			$vName == '_virtual_orderss'
		);*/
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_collector1';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
