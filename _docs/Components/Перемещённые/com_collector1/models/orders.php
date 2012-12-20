<?
defined('_JEXEC') or die('Restricted access');
//echo "<h3>models/orders.php</h3>";
class collector1ModelOrders extends JModel
{	
	/**
	 * Получить список текущих компонентов
	 */
	function getComponentsNames(){
		$db=JFactory::getDBO();
		//в качестве альтернативы к нескольким процедурам РНР можно использовать обработку данных на сервере в виде ROUTINE or VIEW. 
		//VIEW:
/*DROP TEMPORARY TABLE IF EXISTS tbl_name0;

CREATE TEMPORARY TABLE `tbl_name0` 

SELECT dnior_webapps_site_options.id AS option_id, 
IF ( sites_types_ids_location,
	 sites_types_ids_location,
	 0 -- для корректной сортировки результатов внутри таблицы
   ) as `site types`,
   ( select name_ru FROM dnior_webapps_site_options_group 
	 WHERE site_options_ids 
	 REGEXP CONCAT('(^|,)',dnior_webapps_site_options.id,'(,|$)')
   ) as `name_ru`, 
dnior_webapps_site_options.name_ru AS `option` 
    FROM dnior_webapps_site_options 
    LEFT JOIN dnior_webapps_site_options_partial 
    ON dnior_webapps_site_options_partial.site_option_id = dnior_webapps_site_options.id
 WHERE dnior_webapps_site_options.name_ru <> 'Дополнительно' 
    AND dnior_webapps_site_options.id NOT IN (
        SELECT dnior_webapps_site_options.id 
  FROM dnior_webapps_site_options, 
       dnior_webapps_site_types, 
       dnior_webapps_site_options_partial
 WHERE dnior_webapps_site_types.name_en = 'WebShop'
   AND dnior_webapps_site_options_partial.id = dnior_webapps_site_options_partial.sites_types_ids_location
   AND dnior_webapps_site_options.id IN (
			SELECT site_option_id 
			FROM dnior_webapps_site_options_partial
			WHERE sites_types_ids_location = (
				SELECT id 
				FROM dnior_webapps_site_types 
				WHERE name_en = 'WebShop'
			)
		)
    ) ORDER BY `option` ASC;

DROP TEMPORARY TABLE IF EXISTS tbl_name1 ;

CREATE TEMPORARY TABLE `tbl_name1` 
 SELECT * FROM tbl_name0 where name_ru IS NULL
 UNION
 SELECT 0 as option_id, 0 as site_types, 0 as name_ru, `name_ru` AS `option` FROM dnior_webapps_site_options_group GROUP BY site_options_ids;

SELECT option_id, `option` AS `component` FROM tbl_name1 ORDER BY `option`*/		
		
		//получить id id опций в группах, чтобы исключить их из списка и показывать вместо них заголовки групп
		//платежи онлайн, виджеты:
		$db->setQuery('SELECT site_options_ids FROM #__webapps_site_options_group');
		$opts=implode(',',$db->loadResultArray());
		//1,3,5,8
		//2,9,6
		//опции интернет-магазина:	
		$query="SELECT #__webapps_site_options.id 
  FROM #__webapps_site_options, 
       #__webapps_site_types, 
       #__webapps_site_options_partial
 WHERE #__webapps_site_types.name_en = 'WebShop'
   AND #__webapps_site_options_partial.id = #__webapps_site_options_partial.sites_types_ids_location
   AND #__webapps_site_options.id IN (
        SELECT site_option_id 
		FROM #__webapps_site_options_partial
        WHERE sites_types_ids_location = (
            SELECT id 
			FROM #__webapps_site_types 
            WHERE name_en = 'WebShop'
        )
    )";		
		$db->setQuery($query);
		$opts2=implode(',',$db->loadResultArray());
		//объединить исключаемые опции:
		if ($opts&&$opts2) $opts.=','.$opts2;
		else $opts=($opts2)? $opts2:$opts2;
		//получить оставшиеся:
		$query='SELECT id, name_ru FROM #__webapps_site_options
WHERE option_stat = 1 AND id NOT IN ('.$opts.')';
		$db->setQuery($query);
		$arrOptions=$db->loadAssocList();
		$db->setQuery('SELECT id AS group_id, name_ru FROM #__webapps_site_options_group');
		$groups=$db->loadAssocList();
		$arrOptions=array_merge($arrOptions,$groups);
		return $arrOptions; 
	}
	/**
	 * размещение/обновление заказа на выполнение отдельного компонента/(ов)
	 	см. /_docs/схемы.xlsx!Работа с файлами заказчиков
	 */
	function makeOrder($order_id=false,$user=false){
		$ttable='#__webapps_files_names';
		var_dump("<h1>POST:</h1><pre>",$_POST,"</pre>");
		var_dump("<h1>FILES:</h1><pre>",$_FILES,"</pre>");
		if (!$order_id){
			//создаём запись о новом заказе:
			$table = JTable::getInstance('#__webapps_customer_orders', 'Collector1Table');
			$table->reset();
			if (!$user){
				$user = JFactory::getUser();
				if($user->get('guest')!=1) $table->set('customer_id', $user->get('id'));
			}
			$arrPost=JRequest::get('post');
			$arrComponentsNames=array();
			foreach ($arrPost as $key=>$component_name){
				if (strstr($key,"component_")) $arrComponentsNames[]=$component_name;
			}
			//имена компонентов:
			if (!empty($arrFilesNames))
				$table->set('components_names', implode(':',$arrFilesNames));
			$table->set('description', JRequest::getVar('order_description'));
			$table->set('budget', JRequest::getVar('budget'));
			$table->set('finish_date', JRequest::getVar('finish_date'));
			$table->set('ordering', $table-> getNextOrder());
			
			var_dump("<h1>arrFilesNames:</h1><pre>",$arrFilesNames,"</pre>");
			SErrors::afterTable($table);
			
			$order_id=SData::getLastId($ttable);
		}
		if ($_FILES){
			$arrFilesNames=array();
			//$deb=true;
			//if ($deb) echo JPATH_COMPONENT."<hr>";
			foreach ($_FILES as $name=>$data){
				if ($data['name']){
					if ($deb){
						echo "<h4>".$data['name']."</h4>";
						echo "<div>[$name]=>";
						$data['name'];
							/*foreach ($data as $field=>$value){
								echo "<div style='padding:6px'>[$field]=>$value</div>";
							}*/
						echo "</div>";
					}
					//собрать имена файлов; будут записываться в поле одной строкой через разделитель (вне цикла):
					$arrFilesNames[]=$data['name'];
					$uploadedFileNameParts = explode('.',$data['name']);
					$uploadedFileExtension = array_pop($uploadedFileNameParts);
					$prepared_file_name=SData::getLastId($ttable).'.'.$uploadedFileExtension;
					echo "<div>prepared_file_name= $prepared_file_name</div>";
					//закачать файлы; вид имён файлов: 9.doc
					
					//SFiles::uploadFiles($name,JPATH_COMPONENT.DS.'files'.DS.$prepared_file_name);
				}
			}
			//разместить имена/привязка к заказам в dnior_webapps_files_names:
			//SFiles::addFilesToTable(implode(':',$arrFilesNames),'o'.$order_id);
		}
		die();
		//return JRequest::get('post');
	}
	
}
