<?php
/**
 * @version     2.1.0
 * @package     com_collector1
 * @copyright   Copyright (C) webapps 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      srgg <srgg67@gmail.com> - http://www.facebook.com/srgg67
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Collector1 records.
 */
class Collector1Model_customers extends JModelList
{

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',
                'surname', 'a.surname',
                'middle_name', 'a.middle_name',
                'sex', 'a.sex',
                'birthday', 'a.birthday',
                'work_phone', 'a.work_phone',
                'mobila', 'a.mobila',
                'company_name', 'a.company_name',
                'city', 'a.city',
                'region', 'a.region',
                'zip_code', 'a.zip_code',
            );
        }

        parent::__construct($config);
    }


	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_published', '', 'string');
		$this->setState('filter.state', $published);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_collector1');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.surname', 'asc');
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param	string		$id	A prefix for the store id.
	 * @return	string		A store id.
	 * @since	1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id.= ':' . $this->getState('filter.search');
		$id.= ':' . $this->getState('filter.state');

		return parent::getStoreId($id);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 * @since	1.6
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.*, 
       IF ( a.sex = "f","Ж",
           IF (a.sex = "m","М","")
          ) AS sex'
			)
		); 
		$query->from('`#__users` AS a');
		
		$query->where('a.id IN (
				SELECT DISTINCT customer_id
        FROM #__webapps_customer_orders
        WHERE customer_id >0
            UNION
        SELECT DISTINCT customer_id
        FROM #__webapps_customer_site_options
        WHERE customer_id >0
			)'
		);
        // Join over the users for the checked out user.
        $query->select(' `name` AS editor');
		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->getEscaped($search, true).'%');
                $query->where('( a.surname LIKE '.$search.'  OR  a.work_phone LIKE '.$search.'  OR  a.mobila LIKE '.$search.'  OR  a.company_name LIKE '.$search.'  OR  a.city LIKE '.$search.'  OR  a.zip_code LIKE '.$search.' )');
			}
		}
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
		    $query->order($db->getEscaped($orderCol.' '.$orderDirn));
        } // echo "<div>4 query: <hr><pre>".$query."</pre></div>";
		return $query; 
	}
}
