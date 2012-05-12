<?php
/**
 * @version		$Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
//
$arr_options=$this->model_data;
//
$sites_types=$this->sites_types;
//
$cms_choice=$this->cms_choice;
?>
<h4 style="margin-top:-10px;">Выбранные вами опции:</h4>
<table cellpadding="8" cellspacing="0" id="tblCollected">
  <tr>
    <th>Опция</th>
    <th>Значение</th>
  </tr>
<?php
	$arrRightOptions=array('site_type_id','engine_type_choice_id','engines_ids','xtra'); 
	foreach($arr_options as $option=>$data){ 
		if (in_array($option,$arrRightOptions)){
			
				switch ($option)  { 

					case "site_type_id":
						$option_name="Тип сайта";
						$option_value=$sites_types['name_ru'];
							break;
			
					case "engine_type_choice_id":
						$option_name="Движок";
							switch ($data)  { 
								case "1":
									$option_value="Готовая CMS";
										break;
								case "2":
									$option_value="Разработать собственный";
										break;
								case "3":
									$option_value="Перенести на имеющийся";
										break;
							}

							break;
			
					case "engines_ids":
						$option_name="Подходящие CMS";
						$i=0;
						$option_value=$cms_choice;
							break;
					case "xtra":
						$option_name="Дополнительные опции";
							break;
				}
?>
  <tr>
  	<td><?=$option_name?>:</td>
    <td><?php
			if ($option_value) {
				echo $option_value;
				unset($option_value);
			}else{
				if ($option=="options_array") {
					$data=unserialize($data);
					foreach($data as $key=>$val){
						echo "<div>$key=></div>";
						var_dump("<pre>",$val,"</pre>");
					}
				}
				echo $data; 
			}
		}
	?></td>
  </tr>
<?php } ?>
</table>