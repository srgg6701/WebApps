﻿<?php
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
$user = JFactory::getUser();

if ( ($user->get('guest')!=1 && $this->collection_of_user!=-1) || //заавторизован
	 !empty($this->guest_collections) //коллекция создана текущим гостем (проверяется по его емэйлу)
   ) {?>
<script type="text/javascript">
function askToSignUp(){
	if (confirm('Чтобы изменить набор опций любого своего сайта, вам нужно добавить к своим данным логин и пароль.\nХотите сделать это сейчас?'))
		location.href='<?=$this->go_signup?>';
}
</script>
<?	//
	$collections_data_array=$this->collections_data_array;
	//
	$done=$this->done;
	if (!empty($done)){
		
	?><div class="block_done" style="background:<?=$done[1]?>;"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->templatename 
	?>/images/signs/Flag_<?=$done[2]?>.png" width="24" height="24" hspace="6" align="baseline" style="margin-bottom:-2px;"><?=$done[0]?></div>
    <br>
	<br><?

	}else{
		$margin_minus='-';
		require_once JPATH_COMPONENT.DS.'helpers/html/go_register.php';
	
	?><h3 class="collected_head">Выбранные вами опции:</h3><?
	}?>
<table cellpadding="8" cellspacing="0" id="tblCollected">
  <tr>
    <th>Опция</th>
    <th>Значение</th>
  </tr>
<?php
	
	$arrRightOptions=array('site_type_id','engine_type_choice_id','engines','options_array','xtra'); 
	
	if (!empty($collections_data_array)){

		$j=count($collections_data_array);
		foreach ($collections_data_array as $collection_id=>$collection_set){

        	if ($j>1) {?>
          <tr>
          	<td colspan="2" id="my_site_number">Сайт # <?=$collection_set['id']?></td>
          </tr>
		 <? }
			//
			foreach($collection_set as $option=>$data){ 
				
				if (in_array($option,$arrRightOptions)){
						
						switch ($option)  { 
								
							case "site_type_id":
								$option_name="Тип сайта";
								$option_value=$collection_set['site_type_name'];
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
							
							case "engines":
								$option_name="Подходящие CMS";
								$option_value=str_replace(',',', ',$collection_set['engines']).' ';
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
							//$options_set=
							//unserialize($data);?>
<table cellspacing="0" cellpadding="10">
  <tr>
	<th><div align="right">&nbsp;&nbsp;Разделы:</div>
		<div class="h3">▼Опция</div></th>
							<?	for($ii=0,$c=count($arrColumnsNames);$ii<$c;$ii++){?>
	<th><? echo $arrColumnsNames[$ii]['name_ru'].'<div class="skinny">['.$arrColumnsNames[$ii]['site_side'].']</div>';?></th>
							<?	}?>
  </tr>
						<?		$get_options_names=$this->get_options_names;
								
								foreach($collection_set['options_array'] as $option_id => $array_sides){?>
  <tr>
	<td><?=$get_options_names[$option_id]?><? ?></td>
    							<?	for($ii=0,$c=count($arrColumnsNames);$ii<$c;$ii++){?>
	<td<? 
										if($array_sides[$ii]&&$array_sides[$ii]==$arrColumnsNames[$ii]['site_side']){
											
											?> class="checked"<? 
										
										}?>>&nbsp;</td>
    							<?	}?>
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
            	<br><a href="<?
			if (!empty($this->guest_collections)){
				?>javascript:void();" onclick="askToSignUp();<?	
			}else{
                echo JRoute::_("index.php?option=com_collector1&collection_id=".$collection_set['id']);
			}?>">Изменить опции...</a> &nbsp; <a class="txtRed" href="<?=JRoute::_("index.php?option=com_collector1&collection_id=".$collection_set['id'])?>&task=delete" onclick="if (!confirm('Вы уверены, что хотите удалить этот сайт?')) return false;">Удалить сайт...</a><br>
<br>

			</td>
          </tr>
<?		}
	}?>
</table>
<div class="button-green" style="margin-left:6px;">
    <a href="<?=JRoute::_("index.php?option=com_collector1")?>">Добавить сайт...</a>
</div>
<?

}else{
	
	//echo "<div>guest? = ".$user->get('guest').", collection_of_user: ".$this->collection_of_user.", empty? = ".empty($this->guest_collections)."</div>";
	if (!$this->templatename) {
			require_once JPATH_ADMINISTRATOR.DS.'classes/SSite.php';
			$this->templatename=SSite::getCurrentTemplateName($app);
	} 
	$forbidden=true;
	require_once JPATH_COMPONENT.DS.'helpers/html/go_register.php';
}