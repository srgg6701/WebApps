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
$cms_choice=$this->cms_choice; //var_dump("<h1>arr_options:</h1><pre>",$arr_options,"</pre>");?>
<h3 class="collected_head">Выбранные вами опции:</h3>
<table cellpadding="8" cellspacing="0" id="tblCollected">
  <tr>
    <th>Опция</th>
    <th>Значение</th>
  </tr>
<?php
	$arrRightOptions=array('site_type_id','engine_type_choice_id','engines_ids','options_array','xtra'); 
	
	if (!empty($arr_options)){

		for ($i=0,$j=count($arr_options);$i<$j;$i++){

        	if ($j>1) {?>
          <tr>
          	<td colspan="2" id="my_site_number">Сайт # <?=($i+1)?></td>
          </tr>
		 <? }
			//
			foreach($arr_options[$i] as $option=>$data){ 
				
				if (in_array($option,$arrRightOptions)){
						
						switch ($option)  { 
								
							case "site_type_id":
								$option_name="Тип сайта";
								$option_value=$sites_types['name_ru'];
									break;
					
							case "engine_type_choice_id":
								$option_name="Выбор движка";
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
					
							case "options_array":
								$option_name="Отмеченные опции";
								$option_value='options_array';
									break;
							
							case "engines_ids":
								$option_name="Подходящие CMS";
								$option_value=$cms_choice[$i];
									break;
							
							case "xtra":
								$option_name="Дополнительные опции";
									break;
						}?>
		  <tr<? if ($option_value=='options_array'){?> valign="top" class="rowMySiteOptions"<? }?>>
			<td><?=$option_name?>:</td>
			<td><?php
					if ($option_value) {
						//массив опций:
						if ($option_value=='options_array'){
							$arrColumnsNames=Collector1ModelCollector1::getSidesDesc();
							$options_set=unserialize($data);?>
<table cellspacing="0" cellpadding="10">
  <tr>
	<th><div align="right">&nbsp;&nbsp;Разделы:</div>
		<div class="h3">▼Опция</div></th>
							<?	for($ii=0,$c=count($arrColumnsNames);$ii<$c;$ii++){?>
	<th><? echo $arrColumnsNames[$ii]['name_ru'].'<div class="skinny">['.$arrColumnsNames[$ii]['site_side'].']</div>';?></th>
							<?	}?>
  </tr>
						<?		$get_options_names=$this->get_options_names;
								foreach($options_set as $option_id => $array_sides){?>
  <tr>
	<td><?=$get_options_names[$option_id]?></td>
	<td<? if($array_sides[0]&&$array_sides[0]=='public'){?> class="checked"<? }?>>&nbsp;</td>
	<td<? if($array_sides[1]&&$array_sides[1]=='admin'){?> class="checked"<? }?>>&nbsp;</td>
	<td<? if($array_sides[2]&&$array_sides[2]=='user'){?>  class="checked"<? }?>>&nbsp;</td>
  </tr>
						<?		}?>
</table>
	
							
					<?	}else echo $option_value;
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
	<?php 	}?>
          <tr>
          	<td colspan="2" class="bgOverWhite linkButtons">
            	<br><a href="index.php/build-and-calculate?collection_id=<?=$arr_options[$i]['id']?>">Изменить опции...</a> &nbsp; <a class="txtRed" href="index.php/build-and-calculate?collection_id=<?=$arr_options[$i]['id']?>&task=delete" onclick="if (!confirm('Вы уверены, что хотите удалить этот сайт?')) return false;">Удалить сайт...</a><br>
<br>

			</td>
          </tr>
<?		}
	}?>
</table>
<div class="button-green" style="margin-left:6px;">
    <a href="index.php/build-and-calculate/">Добавить сайт...</a>
</div>
