<?php
/**
 * @version     1.0.0
 * @package     com_pay
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Pay records.
 */
class PayModelpayments extends JModelList
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
                'id_customer', 'a.id_customer',
                'id_order', 'a.id_order',
                'method_pay', 'a.method_pay',
                'summ', 'a.summ',
                'currency', 'a.currency',
                'description', 'a.description',
                'status', 'a.status',
                'date_begin', 'a.date_begin',
                'date_end', 'a.date_end',
                'total', 'a.total',
                'operation', 'a.operation',

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
		$params = JComponentHelper::getParams('com_pay');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.method_pay', 'asc');
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
	public function getListQuery($param = null)
	{
		if($param == null) return false;
		$user	= JFactory::getUser();
		$userId	= $user->get('id');
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);


		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.*'
			)
		);
		$query->from('`#__webapps_d_pay_payment` AS a');

		$query->where('a.id_customer = '.(int)$userId);
		if($param == 'enrolled'){
			$query->where('a.`operation` = 1');
		}elseif($param == 'spent'){
			$query->where('a.`operation` = -1');
		}else{
			$query->order('a.`date_begin` DESC');

		}

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->getEscaped($search, true).'%');
                $query->where('( a.method_pay LIKE '.$search.'  OR  a.currency LIKE '.$search.'  OR  a.description LIKE '.$search.'  OR  a.operation LIKE '.$search.' )');
			}
		}

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
		    $query->order($db->getEscaped($orderCol.' '.$orderDirn));
        }
        $db->setQuery($query);

		return $db->loadObjectList();
	}
}
