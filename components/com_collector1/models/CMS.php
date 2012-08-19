<?
defined('_JEXEC') or die;
/**
 * CMSs data
 */
class collector1ModelCMS extends JModel{

	/**
	 * получить движок
	 */
	function get_cms_names($cms_picked_up){
		$arrEngines=Collector1ModelCollector1::tempCMSlist(); 
		$cnt=count($cms_picked_up);
		$cms_list=array();
		$j=0;
		for ($e=0,$n=count($cms_picked_up);$e<$n;$e++){
			$i=0;
			if ($cms_picked_up[$e]) { //чтобы не подставило имя при $e==0
				foreach ($arrEngines as $nick=>$name){
					//Внимание! В действительности у элементов массива $arrEngines нет id, однако нижеуказанная проверка корректна, поскольку они записывались в поле таблицы именно в том порядке, в котором расположены в этом массиве
					if (in_array($i,$cms_picked_up)){
						$cms_list[]=$name;
						$j++;
					}
					$i++;
					if ($j&&$j==$cnt) break 2;
				}
			}
		}
		if (!empty($cms_list)) sort($cms_list);
		$smss=implode(',',$cms_list); 
		return $smss;
	}
	/**
	 * Получить название собственной cms
	 */
	function get_cms_own_name($collection_id){
		$query="SELECT engines_ids FROM #__webapps_customer_site_options WHERE id = ".$collection_id;
		$db=JFactory::getDBO();
		$db->setQuery($query);
		return $db->loadResult();
	}
}