<?php
/**
 * @version     2.0.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');

/**
 * Collector1 model.
 */
class Collector1ModelOptions_beyond_sides extends JModelItem
{
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('site');

		// Load state from the request.
		$pk = JRequest::getInt('id');
		$this->setState('options_beyond_sides.id', $pk);

		$offset = JRequest::getUInt('limitstart');
		$this->setState('list.offset', $offset);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

		// TODO: Tune these values based on other permissions.
		$user		= JFactory::getUser();
		if ((!$user->authorise('core.edit.state', 'com_collector1')) &&  (!$user->authorise('core.edit', 'com_collector1'))){
			$this->setState('filter.published', 1);
			$this->setState('filter.archived', 2);
		}
	}
        
	/**
	 * Method to get a single record.
	 *
	 * @param	integer	The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 * @since	1.6
	 */
	public function &getItem($pk = null)
	{
		// Initialise variables.
		$pk = (!empty($pk)) ? $pk : (int) $this->getState('options_beyond_sides.id');

		if ($this->_item === null) {
			$this->_item = array();
		}

		if (!isset($this->_item[$pk])) {

                        $db = $this->getDbo();
                        $query = $db->getQuery(true);

                        $query->select($this->getState(
                                'item.select', 'a.*'
                                )
                        );
                        $query->from('#__webapps_site_options_beyond_sides AS a');
                        
                        $query->where('a.id = '. (int) $pk);

                        // Filter by published state.
                        $published = $this->getState('filter.published');
                        $archived = $this->getState('filter.archived');

                        if (is_numeric($published)) {
                                $query->where('(a.state = ' . (int) $published . ' OR a.state =' . (int) $archived . ')');
                        }

                        $db->setQuery($query);

                        $data = $db->loadObject();

                        if ($error = $db->getErrorMsg()) {
                                JError::raiseError(404, $error);
                                return false;
                        }

                        $this->_item[$pk] = $data;
			
		}

		return $this->_item[$pk];
	}

}