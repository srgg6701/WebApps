<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Created by com_combuilder - http://www.notwebdesign.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');

JTable::addIncludePath(JPATH_ROOT . '/administrator/components/com_collector1/tables');

/**
 * Model
 */
class Collector1ModelCollector1 extends JModel
{
	protected $_item;

	/**
	 * Get the data for a banner
	 */
	function &getItem()
	{
		if (!isset($this->_item))
		{
			$cache = JFactory::getCache('com_collector1', '');

			$id = $this->getState('collector1.id');

			$this->_item =  $cache->get($id);

			if ($this->_item === false) {
				
                // redirect to banner url
				$db		= $this->getDbo();
				$query	= $db->getQuery(true);
				$query->select(
					'a.*'
					);
				$query->from('#__users as a');
				$query->where('a.id = ' . (int) $id);

				$db->setQuery((string)$query);
				if (!$db->query()) {
					echo "Возможно, проблема из-за того, что компонент был для версии 1.5 - см. getItem()";
					JError::raiseError(500, $db->getErrorMsg());
				}

				$this->_item = $db->loadObject();
				$cache->store($this->_item, $id);
			}$this->_item;
		}
		return $this->_item;
	}
	//получить массив всех данных для построения таблицы Коллектора:
	function getDataForCollector(){
		$db = JFactory::getDBO();
		$query=" SELECT dnior_webapps_site_options.id AS option_id, 
IF ( sites_types_ids_location,
	 sites_types_ids_location,
	 0 -- для корректной сортировки результатов внутри таблицы
   ) as `site types`,
   ( select name_ru FROM dnior_webapps_site_options_group 
	 WHERE site_options_ids 
	 REGEXP CONCAT('(^|,)',dnior_webapps_site_options.id,'(,|$)') -- извлечь название групп опций
   ) as `name_ru`, 
dnior_webapps_site_options.name_ru AS `option` 
    FROM dnior_webapps_site_options 
    LEFT JOIN dnior_webapps_site_options_partial 
    ON dnior_webapps_site_options_partial.site_option_id = dnior_webapps_site_options.id
 WHERE dnior_webapps_site_options.name_ru <> 'Дополнительно'
 ORDER BY `site types` DESC, `name_ru`, `option` ASC;";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	//построить ячейки для frontend, backend, boudoire в строке опции
	function buildOptionsSidesCells($option_id){
		$db = JFactory::getDBO();
		$query="SELECT site_side AS `missing side name`
FROM dnior_webapps_site_options_beyond_sides 
WHERE site_options_beyond_side  REGEXP concat('(^|,)',$option_id,'(,|$)')";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	//Методы Joomla! здесь не используем просто потому, что не видим в данном случае необходимости
	//получим таблицу разделов сайта:
	function getSidesDesc(){
		$db = JFactory::getDBO();
		$query="SELECT site_side, name_ru
FROM dnior_webapps_site_options_beyond_sides ORDER BY id";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
	//получим таблицу разделов сайта:
	function getSitesTypes(){
		$db = JFactory::getDBO();
		$query="SELECT id, name_ru, name_en
FROM dnior_webapps_site_types ORDER BY id DESC";
		if (!$db->setQuery($query)) {
			JError::raiseError(500, $db->getErrorMsg());
		}
		return $db->loadAssocList();
	}
}

