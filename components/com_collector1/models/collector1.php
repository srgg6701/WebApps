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

JTable::addIncludePath(JPATH_ADMINISTRATOR.'/components/com_collector1/tables');
/**
 * Model
 */
 
//echo "Hello!"; 
class Collector1ModelCollector1 extends JModel
{
	protected $_item;
	protected $_action;

	function __construct(){
		parent::__construct();
		$action=JRequest::getVar('task');
		$this->_action=$action;
	}
	function storeCollectedData(){
		
		$post_collection=JRequest::get('post');
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$table = JTable::getInstance('customer_site_options', 'Collector1Table');
		$user = JFactory::getUser();
 
		if ($user->guest) {
			
			echo " GUEST! Зарагистрируем его. ";
  		
		}else{
			
			$table->reset();
			$table->set('customer_id', $user->id);
			$table->set('site_type_id', $post_collection["selectSiteType"]);
			
			//выяснить выбор типа движка:
			switch ($post_collection["choose_engine"])  { 

				case "take_ready":
					$engine_type_choice_id="1";
						break;
		
				case "build_own":
					$engine_type_choice_id="2";
						break;
		
				case "exists":
					$engine_type_choice_id="3";
						break;
			}
			$table->set('engine_type_choice_id', $engine_type_choice_id);
			$arrStoredOptions=array();
			foreach ($post_collection as $key=>$val){
				if (strstr($key,'cms_name_')) $arrCMS[]=$val;
				if (strstr($key,'option_')) {
					$gt=explode('_',$key);
					$index=(int)$gt[1];
					if (!is_array($arrStoredOptions[$index])) {
						$arrStoredOptions[$index]=array($gt[2]);
					}else array_push($arrStoredOptions[$index],$gt[2]);
				}
			}
			if (is_array($arrCMS)){
				$table->set('engines_ids',implode(',',$arrCMS));
			}
			if (!empty($arrStoredOptions)){
				$table->set('options_array',serialize($arrStoredOptions));
			}
			$table->set('xtra', $post_collection["xtra"]);
			$table->set('ordering', $table->getNextOrder());
		}
		/*// Bind the data to the table
		if (!$table->bind())
		{	echo "<div>Не связано!</div>";
		// handle bind failure
		}*/
		// Check that the data is valid
		if (!$table->check())
		{	echo "<div>Не проверено 1!</div>";
		// handle validation failure
		}
		// Store the data in the table
		if (!$table->store(true))
		{	echo "<div>Не сохранено!</div>";
		// handle store failure
		}
		// Check the record in
		if (!$table->checkin())
		{	echo "<div>Не проверено 2!</div>";
		// handle checkin failure
		}
		/*// Reorder the table
		if (!$table->reorder())
		{	echo "<div></div>";
		// handle reorder failure
		}*/		
		//$this->setRedirect(JRoute::_('index.php?option=com_collector1&view=collected', false));
	}
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
	//
	function tempCMSlist(){
		return array( 'bitrix'=>'1С-Битрикс',
					'ABO.CMS'=>'ABO.CMS',
					'Amiro.CMS'=>'Amiro.CMS',
					'atilect.CMS'=>'АТИЛЕКТ.CMS',
					'B2evolution'=>'B2evolution',
					'BIGACE'=>'BIGACE',
					'CMS Made Simple'=>'CMS Made Simple',
					'CMS Mail Keeper'=>'CMS Mail Keeper',
					'CMSimple'=>'CMSimple',
					'Concrete5'=>'Concrete5',
					'Contao'=>'Contao',
					'DLEngine'=>'DLEngine',
					'Danneo'=>'Danneo',
					'DotNetNuke'=>'DotNetNuke',
					'Drupal'=>'Drupal',
					'E107'=>'E107',
					'e2'=>'e2',
					'eZ publish'=>'eZ publish',
					'InSales'=>'InSales',
					'Joomla'=>'Joomla',
					'HostCMS'=>'HostCMS',
					'KooBoo'=>'KooBoo',
					'MODx'=>'MODx',
					'Mambo Open Source'=>'Mambo Open Source',
					'MediaWiki'=>'MediaWiki',
					'Movable Type'=>'Movable Type',
					'Nethouse'=>'Nethouse',
					'Newscoop'=>'Newscoop',
					'NPJ'=>'NPJ',
					'Nucleus CMS'=>'Nucleus CMS',
					'OpenCms'=>'OpenCms',
					'PHP-Fusion'=>'PHP-Fusion',
					'PHP-Nuke'=>'PHP-Nuke',
					'Plone'=>'Plone',
					'Prestashop'=>'Prestashop',
					'S.Builder'=>'S.Builder',
					'Sapid'=>'Sapid',
					'SharePoint'=>'SharePoint',
					'Site Sapiens'=>'Site Sapiens',
					'TYPO3'=>'TYPO3',
					'Textpattern'=>'Textpattern',
					'TikiWiki'=>'TikiWiki',
					'uCoz'=>'uCoz',
					'UMI.CMS'=>'UMI.CMS',
					'WikkaWiki'=>'WikkaWiki',
					'WordPress'=>'WordPress',
					'XOOPS'=>'XOOPS',
					'Xaraya'=>'Xaraya',
					'Zikula'=>'Zikula'
				);	
	} 
}
