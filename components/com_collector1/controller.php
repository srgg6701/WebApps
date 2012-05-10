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

jimport('joomla.application.component.controller');

class Collector1Controller extends JController
{
	/**
	* Method to display the view
	*
	* @access public
	*
	*/
	function display()
	{
		parent::display(); //отображает default view
	}
	//добавить данные в таблицу опций сайта заказчика:
	function collect(){
		
		$post_collection=JRequest::get('post');
		var_dump("<h1>post_collection:</h1><pre>",$post_collection,"</pre>");
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$table = JTable::getInstance('customer_site_options', 'Collector1Table');
		//var_dump("<h1>table:</h1><pre>",$table,"</pre>");
		$user = JFactory::getUser();
 
		if ($user->guest) {
			
			echo " GUEST! Зарагистрируем его. ";
  		
		}else{
			
			//echo 'You are logged in as:<br />';
			//echo 'User name: ' . $user->username . '<br />';
			//echo 'Real name: ' . $user->name . '<br />';
			//echo 'User ID  : ' . $user->id . '<br />'; 
			//сохраним:
			/**/
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
			//echo "<div>engine_type_choice_id= $engine_type_choice_id</div>";
			$table->set('engine_type_choice_id', $engine_type_choice_id);

			$arrStoredOptions=array();
			//echo "<hr>";
			foreach ($post_collection as $key=>$val){
				if (strstr($key,'cms_name_')) $arrCMS[]=$val;
				if (strstr($key,'option_')) {
					$gt=explode('_',$key);
					$index=(int)$gt[1];
					if (!is_array($arrStoredOptions[$index])) {
						$arrStoredOptions[$index]=array($gt[2]);
					}else array_push($arrStoredOptions[$index],$gt[2]);
					//echo "<div>[".$gt[1]."], ".$gt[2]."<hr>";
					//var_dump('<pre>',$arrStoredOptions[$index],'</pre>');
					//echo "</div>";
				}
			}
			if (is_array($arrCMS)){
				$table->set('engines_ids',implode(',',$arrCMS));
			}
			if (!empty($arrStoredOptions)){
				$table->set('options_array',serialize($arrStoredOptions));
				//var_dump('<hr><pre>',$arrStoredOptions,'</pre>');
				//echo '<hr>';
				//var_dump('<pre>',serialize($arrStoredOptions),'</pre>');
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
}