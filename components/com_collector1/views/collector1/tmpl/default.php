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

$table=Collector1ModelCollector1::getDataForCollector();
$current_order_set=$this->current_order_set;
//$collections_ids_array=$this->collections_ids_array;
//var_dump("<h1>current_order_set:</h1><pre>",$current_order_set,"</pre>");

if (strstr($_SERVER['HTTP_USER_AGENT'],"Firefox")) $firefox=true;?>

<form name="form1" method="post" action="<?=JRoute::_($this->go_submit)?>" onSubmit="return checkRequired();">
    <div>
<?	//больше одной коллекции у юзера:
if (($j=count($collections_ids_array))>1){?>
	
	<h3 class="collector_head">Выбранный сайт:</h3>   
	<select name="selectSite" id="selectSite" onChange="loadCollection(this.options[this.selectedIndex].value);">
<?	
	for($i=0;$i<$j;$i++){?>
		<option value="<?=$collections_ids_array[$i]?>"<? if ($current_order_set['id']==$collections_ids_array[$i]){?> selected<? }?>>Сайт #<?=$collections_ids_array[$i]?></option>
<? 	}?>    	
	</select>
    <br>	
<?
}
?>    
    <a name="select_site_type"></a>
  <label for="select"><h3 class="collector_head"><?

if ($current_order_set){
	
	?>Выбранный вами тип сайта: <? 

}else{
	
	?>Какой тип сайта вам нужен?<? 

}			?></h3></label>
  
  <select name="selectSiteType" id="selectSiteType" onChange="checkRows(this.options[this.selectedIndex].value);">
    <option<? 	if (!$current_order_set){?> selected<? }?> value="0">Выберите из списка</option>
<?	$arrSitesTypes=Collector1ModelCollector1::getSitesTypes();
	for($s=0,$st=count($arrSitesTypes);$s<$st;$s++){?>    
    <option value="<?=$arrSitesTypes[$s]['id']?>"<?
    	if ($current_order_set&&$current_order_set['site_type_id']==$arrSitesTypes[$s]['id']){
			?> selected<? 
		}?>><?=$arrSitesTypes[$s]['name_ru']?></option>
<?	}
	if ($test){?>
    <option value="corp">Корпоративный</option>
    <option value="private">Личный</option>
    <option value="shop">Интернет-магазин</option>
<?	}?>    
    <option value="-1">Другое</option>
  </select>
  </div>
<div id="collector_wrapper" style="clear:both;">
<table width="100%" cellpadding="8" cellspacing="0" id="tblCollector"<?	
	if (!$firefox){?> onClick="checkPatchBoxes(this);"<? }?>>
  <tr>
    <th style=" border-right: solid 1px #ccc;border-radius:4px 0 0 0;">&nbsp;</th>
    <th colspan="3" style="background:#FFFFFF;border-radius:0 4px 0 0;">Разделы</th>
    </tr>
  <tr>
      <th align="center" style="background:#F90; color:#FFFFFF;">Опции</th>
	<?	//
		$arrColumnsNames=Collector1ModelCollector1::getSidesDesc();
		for($d=0,$dc=count($arrColumnsNames);$d<$dc;$d++){?>
    <th><? echo $arrColumnsNames[$d]['name_ru'].'<div class="skinny">['.$arrColumnsNames[$d]['site_side'].']</div>';?></th>
    <?	}
		if ($test){?>
    <th>Публичный (front-end)</th>
    <th>Личный кабинет</th>
    <th>Административный (back-end)</th>
    <?	}?>
  </tr>
<?	//	
	for($i=0,$j=count($table);$i<$j;$i++){
		
		$data_row=$table[$i];
		
		unset($shopClass);
		
		if ($data_row['site types']=='3') {
			$shopClass="WebShop";
			if ($current_order_set['site_type_id']==3)  $shopClass="hiddenShop";
		}
		$data_next=$table[$i+1];
		$data_prev=$table[$i-1];
		if ( $i && $data_row['name_ru'] &&
			 ( !$data_prev['name_ru'] || $data_prev['name_ru'] != $data_row['name_ru'] )
		   ){
			
			if ($data_row['name_ru']!=NULL) $group_stat='start';?>	
  <tr<?
  	if ($shopClass) {?> class="<?=$shopClass?>"<? } 
    ?>>
    <td colspan="4" class="joined"><?=$data_row['name_ru']?></td>
  </tr>
  <?	}?>
  <tr class="<? echo $shopClass;
  		//назначить стиль строке начала новой группы:
  		if ( 
			 ( !$data_row['name_ru'] && $data_next['name_ru'] )
			  || 
			 ( $data_row['name_ru'] != $data_next['name_ru'] )
            ){ 
			
			$group_stat='end';
			if ($data_row['site types']) echo ' '; //classes separator
				
				?>joined_end<? 
			
		}?>">
    <td<? 
	if ($group_stat&&$group_stat!='finish'&&strlen($data_row['name_ru'])>0){
		?> style="padding-left:20px;"<? 
	}else echo ' style="padding-left:10px;"';?>>
    	<input type="checkbox"> <?=$data_row['option']?>
    </td>
	<?  $side_cells=Collector1ModelCollector1::buildOptionsSidesCells($data_row['option_id']);
		//options cells:
		for($t=0;$t<count($arrColumnsNames);$t++){
			unset($checked);
			unset($option_is_checked);
			$site_side=$arrColumnsNames[$t]["site_side"];
			
			$checked=$current_order_set['options_array'][$data_row['option_id']];
			if (is_array($checked) && 
				in_array($site_side,$checked)
			   ) $option_is_checked=true;?>    
    <td<? 
			
			
			if($option_is_checked){?> style="background:#ccff99;"<? }?>><? 	
			
			
			if ($side_cells[0]["missing side name"]!=$site_side){
				
				?><input type="checkbox" name="option_<?=$data_row['option_id']?>_<?=$site_side?>" id="<?=$data_row['option_id']?>_<?=$site_side?>"<? 


	//получить id опции:
	if ($option_is_checked){?> checked<? }	
		?>><?
			}else{?>&nbsp;<? }?></td>
    <?  }
		if ($group_stat=='end') $group_stat='finish';?>
  </tr>
<?	}?>
  <tr>
    <td colspan="4" style="padding-right:20px;"><div style="padding-left:6px">Дополнительно:</div>
      <textarea rows="5" style="margin-top:6px; display:block;" class="widthFull" name="xtra_options" id="xtra_options"><?=$current_order_set['xtra']?></textarea></td>
  </tr>
</table>
<table cellpadding="8" cellspacing="0">
  <tr>
  	<td>
<h4 style="margin-bottom:4px;">Выберите движок:</h4>
    <div>(вы можете выбрать несколько возможных вариантов)</div>
    <br>
      <label>
        <input type="radio" name="choose_engine" value="take_ready" id="choose_engine_1" onClick="manageEnginesChoice(this);"<?
        
		if ($current_order_set['engine_type_choice_id']==1) {?> checked<? }
		
		?>>
        Готовая CMS</label> &nbsp;
      <label>
        <input type="radio" name="choose_engine" value="build_own" id="choose_engine_2" onClick="manageEnginesChoice(this);"<?
        
		if ($current_order_set['engine_type_choice_id']==2) {?> checked<? }
		
		?>>
        Разработать собственный</label> &nbsp;
      <label>
        <input type="radio" name="choose_engine" value="exists" id="choose_engine_3" onClick="manageEnginesChoice(this);"<?
        
		if ($current_order_set['engine_type_choice_id']==3) {?> checked<? }
		
		?>>
        Перенести на имеющийся</label><span id="existing_cms_name"<?
        
		if ($current_order_set['engine_type_choice_id']!=3) {
			
			?> style="display:<?="none"?>;"<? 
		
		}?>>:  <input style="background:#FFFF99; border:solid 1px #999;" type="text" name="existing_cms" id="existing_cms"></span></td>
  </tr>
  <tr id="tr_cms_list"<? if(!$current_order_set){?> style="display:none;"<? }?>>
    <td id="sms_list" onClick="controlCMSchoice(this);">
    <hr size="1">
<?	
	$CMS=Collector1ModelCollector1::tempCMSlist();
	$i=0;	
	$engines_set=explode(',',$current_order_set['engines']);
	//var_dump("<h1>engines_set:</h1><pre>",$engines_set,"</pre>");
	foreach($CMS as $key=>$cms){?>
	<div<? 	
	
		if (in_array($cms,$engines_set)){
		
			?> style="background-color:#f90;"<? 
	
		}?>><input name="cms_name_<?=$i?>" type="checkbox" value="<?=$i?>"<? 
		
		if (in_array($cms,$engines_set)){?> checked<? }?>><?=$cms?></div>
<?		$i++;
	}?>        
	</td>  
  </tr>
</table>
</div>
<?	
	$user = JFactory::getUser();
	if ($user->get('guest')==1){?>
<div id="tell_your_data">
<h4>Пожалуйста, сообщите нам свои контактные данные:</h4>
<dl>
	<dt>Как вас зовут? <div class="required_field"></div></dt>
	<dd><input class="dataCell" name="name" type="text" id="name" value=""></dd>

	<dt>Ваш емэйл: <div class="required_field"></div></dt>
	<dd><input name="email" id="email" type="text" value=""></dd>
    
	<dt>Ваш телефон: <div class="required_field"></div></dt>
	<dd><input name="phone" id="phone" type="text" value=""></dd>
    
	<dt>Скайп: </dt>
	<dd><input name="skype" id="skype" type="text" value=""></dd>
</dl>
</div>
<?	}?>
<br>
<button id="make_site_prototype" type="submit"><?

	if ($this->go_action=='update'){
		?>Сохранить<? 	
	}else{
		?>Создать прототип<?
	}?>!</button>
<br>
</form>
<script type="text/javascript">
function loadCollection(collection_id){
	location.href='index.php/build-and-calculate?collection_id='+collection_id;
}
function checkPatchBoxes(eventSrcElement){
	var tBox;
	try{
		
<?	if (!$firefox){?>

		tBox=(navigator.appName.indexOf("Internet Explorer")==-1)? event.target:event.srcElement;
		var rows=eventSrcElement.getElementsByTagName('tr');
		var row,boxes;
		for(i=0,j=rows.length;i<j;i++){
			row=rows.item(i);
			
			
			boxes=row.getElementsByTagName('input');
<?	}else{?>
			tBox=eventSrcElement;
			//checkbox->td->tr
			boxes=eventSrcElement.parentNode.parentNode.getElementsByTagName('input');
<?	}?>					
			f=boxes.length
			//если в строке есть чекбоксы:
			if (f>0){
				var bc=0; //counter for checked boxes in row
				for(k=0;k<f;k++){
					//если не первая ячейка:
					if (k>0){
						if (tBox==boxes.item(0)) 
							boxes.item(k).checked=(boxes.item(0).checked==true)? true:false;
					
						if (boxes.item(k).checked==true) {
							boxes.item(k).parentNode.style.background='#ccff99';
							bc++;
						}else boxes.item(k).parentNode.style.background='';
					}
				}
				var fm=(f-1);
				//проверить условие отмтки/разотметки пакетного чекбокса:
				if (bc==fm) boxes.item(0).checked=true;
				if (bc==0) boxes.item(0).checked=false;
			}		
<?	if (!$firefox){?>
		}
<?	}?>		
	}catch(e){
		alert(e.message);
	}
}
function checkRequired(){
	try{
		d=document;
		var selST=d.getElementById('selectSiteType');
		var yName=d.getElementById('name');
		var yEmail=d.getElementById('email');
		var yPhone=d.getElementById('phone');
		
		if (selST.options[selST.selectedIndex].value=='0') {
			alert('Вы не указали, какой тип сайта вам нужен!');
			location.href='#select_site_type';
			selST.style.backgroundColor='yellow';
			return false;
		}
<?	if($user->get('guest')==1){?>		
		if (!yName.value||yName.value==' ') {
			alert('Вы не сообщили нам своё имя!');					
			location.href='#bottom';
			yName.style.backgroundColor='yellow';
			return false;
		}
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(yEmail.value)) {
			alert('Емэйл введён некорректно или отсутствует!');					
			location.href='#bottom';
			yEmail.style.backgroundColor='yellow';
			return false;
		}
		if (yPhone.value.length<7) {
			alert('Вы не сообщили нам № своего телефона или указали его не корректно!');					
			location.href='#bottom';
			yPhone.style.backgroundColor='yellow';
			return false;
		}
<?	}?>		
	}catch(e){
		alert(e.message);
	}
}
function checkRows(sel){
	
	var rws=document.getElementsByTagName('tr');
	var tRow,arrClassName,newClassName,tClassName;
	if(sel=='3') { //WebShop, именно число, иначе возникают проблемы при записи в БД 
		tClassName='WebShop';
		changedClassName='hiddenShop';
	}else{
		tClassName='hiddenShop';
		changedClassName='WebShop';
	}
	for(i=0,j=rws.length;i<j;i++){
		newClassName='';
		tRow=rws.item(i); 
		if (tRow.className.indexOf(tClassName)!=-1){
			if (tRow.className!=tClassName){
				arrClassName=tRow.className.split(' ');
				for(b=0,c=arrClassName.length;b<c;b++){
					if (arrClassName[b]!=tClassName) newClassName+=' '+arrClassName[b];
				}
			} 
			newClassName+=' '+changedClassName;
			tRow.className=newClassName;
		}
	}
}
function manageEnginesChoice(radio){
	var d=document;
	try{
		if (radio.id=="choose_engine_1"||radio.id=="choose_engine_2"){
			if (radio.id=="choose_engine_0") d.getElementById('existing_cms').value='';	
			d.getElementById('existing_cms_name').style.display='none';	
			scrollTo(0,2000);//location.href='#bottom';
		}		
		if (radio.id=="choose_engine_1"){
			d.getElementById('tr_cms_list').style.display='block';
		}		
		if (radio.id=="choose_engine_2"||radio.id=="choose_engine_3"){
			d.getElementById('tr_cms_list').style.display='none';
		}		
		if (radio.id=="choose_engine_3"){
			d.getElementById('existing_cms_name').style.display='inline';				
		}	
	}catch(e){
		alert(e.message);
	}
}
function controlCMSchoice(tdBlock){
	var cells=tdBlock.getElementsByTagName('input');
	var cell;
	for(i=0,j=cells.length;i<j;i++){
		cell=cells.item(i);
		cell.parentNode.style.backgroundColor=(cell.checked==true)? '#F90':'';
	}
}
</script>
<a name="bottom"></a>
