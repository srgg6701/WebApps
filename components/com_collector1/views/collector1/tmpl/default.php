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

if (strstr($_SERVER['HTTP_USER_AGENT'],"Firefox")) $firefox=true;?>

<form name="form1" method="post" action="" onSubmit="return checkRequired();">
    <div>
    <a name="select_site_type"></a>
  <label for="select" style="margin-left:6px;">Какой тип сайта вам нужен?</label>
  <select name="selectSiteType" id="selectSiteType" onChange="checkRows(this.options[this.selectedIndex].value);">
    <option selected value="0">Выберите из списка</option>
<?	$arrSitesTypes=Collector1ModelCollector1::getSitesTypes();
	for($s=0,$st=count($arrSitesTypes);$s<$st;$s++){?>    
    <option value="<?=$arrSitesTypes[$s]['name_en']?>"><?=$arrSitesTypes[$s]['name_ru']?></option>
<?	}
	if ($test){?>
    <option value="corp">Корпоративный</option>
    <option value="private">Личный</option>
    <option value="shop">Интернет-магазин</option>
<?	}?>    
    <option value="xtra">Другое</option>
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
<?	for($i=0,$j=count($table);$i<$j;$i++){
		$data_row=$table[$i];
		$data_next=$table[$i+1];
		$data_prev=$table[$i-1];
		if ( $i && $data_row['name_ru'] &&
			 ( !$data_prev['name_ru'] || $data_prev['name_ru'] != $data_row['name_ru'] )
		   ){
			
			if ($data_row['name_ru']!=NULL) $group_stat='start';?>	
  <tr<?
  	if ($data_row['site types']=='3') {?> class="WebShop"<? } 
    ?>>
    <td colspan="4" class="joined"><?=$data_row['name_ru']?></td>
  </tr>
  <?	}?>
  <tr class="<?
  	if ($data_row['site types']=='3') {?>WebShop<? } 

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
	}else echo ' style="padding-left:10px;"';?>><? //echo 'strlen='.strlen($data_row['name_ru']);?>
    	<input type="checkbox"> <?=$data_row['option']?>
    </td>
	<?  $side_cells=Collector1ModelCollector1::buildOptionsSidesCells($data_row['option_id']);
		//options cells:
		for($t=0;$t<count($arrColumnsNames);$t++){?>    
    <td><? 	$site_side=$arrColumnsNames[$t]["site_side"];
			if ($side_cells[0]["missing side name"]!=$site_side){?>
		<input type="checkbox" name="option_<?=$data_row['option_id']?>_<?=$site_side?>" id="<?=$data_row['option_id']?>_<?=$site_side?>"><?
			}else{?>&nbsp;<? }?></td>
    <?  }
		if ($group_stat=='end') $group_stat='finish';?>
  </tr>
<?	}?>
  <tr>
    <td colspan="4" style="padding-right:20px;"><div style="padding-left:6px">Дополнительно:</div>
      <textarea rows="5" style="margin-top:6px; display:block;" class="widthFull" name="xtra_options" id="xtra_options"></textarea></td>
    </tr>
<?	if ($test){?>  
  <tr class="WebShop">
    <td style="padding-left:10px;"><input type="checkbox" name="checkbox4" id="checkbox4">
      Корзина</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr class="WebShop">
    <td style="padding-left:10px;">      <input type="checkbox" name="checkbox26" id="checkbox26">
      SMS-информирование</td> 
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox27" id="checkbox27"></td>
    <td><input type="checkbox" name="checkbox28" id="checkbox28"></td>
  </tr>
  <tr class="WebShop">
    <td style="padding-left:10px;"><input type="checkbox" name="checkbox29" id="checkbox29">
      Запросы актуальности заказа</td>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="checkbox30" id="checkbox30"></td>
    <td><input type="checkbox" name="checkbox31" id="checkbox31"></td>
  </tr>
  <tr class="WebShop">
    <td colspan="4" class="joined">Платежи онлайн:</td>
    </tr>
  <tr class="WebShop">
    <td><input type="checkbox" name="checkbox5" id="checkbox5">
      Карточкой</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td></td>
    </tr>
  <tr class="WebShop">
    <td><input type="checkbox" name="checkbox6" id="checkbox6">
      Яндекс.деньги</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr class="WebShop">
    <td><input type="checkbox" name="checkbox7" id="checkbox7">
      WebMoney</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr class="WebShop">
    <td><input type="checkbox" name="checkbox8" id="checkbox8">
      PayPal</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr class="WebShop joined_end">
    <td><input type="checkbox" name="checkbox9" id="checkbox9">
      Шлюз</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox10" id="checkbox10"<?	
	if ($firefox){?> onClick="checkPatchBoxes(this);"<? }?>>
      Карта сайта</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"<?	
	if ($firefox){?> onClick="checkPatchBoxes(this);"<? }?>></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"<?	
	if ($firefox){?> onClick="checkPatchBoxes(this);"<? }?>></td>
    <td><input type="checkbox" name="checkbox3" id="checkbox3"<?	
	if ($firefox){?> onClick="checkPatchBoxes(this);"<? }?>></td>
  </tr>
  <tr>
    <td><input type="checkbox" name="checkbox11" id="checkbox11">
      Поиск</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td><input type="checkbox" name="checkbox3" id="checkbox3"></td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox12" id="checkbox12">
      RSS</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox13" id="checkbox13">
      Архив материалов</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td><input type="checkbox" name="checkbox3" id="checkbox3"></td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox14" id="checkbox14">
      Станица не найдена</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td><input type="checkbox" name="checkbox3" id="checkbox3"></td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox15" id="checkbox15">
      Добавить статью</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox16" id="checkbox16">
      Рейтинг статьи</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox17" id="checkbox17">
      Форум</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox18" id="checkbox18">
      Блог</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td><input type="checkbox" name="checkbox3" id="checkbox3"></td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox19" id="checkbox19">
      Фотогалерея</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox20" id="checkbox20">
      Опросы</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox21" id="checkbox21">
      Облако тегов</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td><input type="checkbox" name="checkbox3" id="checkbox3"></td>
    </tr>
  <tr>
    <td colspan="4" class="joined" bgcolor="#efefef">Социальные виджеты:</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox22" id="checkbox22">
      Like (Нравится)</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox23" id="checkbox23">
      Добавить в друзья</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox24" id="checkbox24">
      RSS</td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><input type="checkbox" name="checkbox25" id="checkbox25">
      Дополнительно:
      <textarea style="margin-top:6px; display:block;" name="textfield" id="textfield"></textarea></td>
    <td><input type="checkbox" name="checkbox" id="checkbox"></td>
    <td><input type="checkbox" name="checkbox2" id="checkbox2"></td>
    <td><input type="checkbox" name="checkbox32" id="checkbox32"></td>
    </tr>
<?	}?>    
</table>
<table cellpadding="8" cellspacing="0">
  <tr>
  	<td>
<h4 style="margin-bottom:4px;">Выберите движок:</h4>
    <div>(вы можете выбрать несколько возможных вариантов)</div>
    <br>
      <label>
        <input type="radio" name="choose_engine" value="cms" id="choose_engine_0" onClick="manageEnginesChoice(this);">
        Готовая CMS</label> &nbsp;
      <label>
        <input type="radio" name="choose_engine" value="build_own" id="choose_engine_1" onClick="manageEnginesChoice(this);">
        Разработать собственный</label> &nbsp;
      <label>
        <input type="radio" name="choose_engine" value="exists" id="choose_engine_2" onClick="manageEnginesChoice(this);">
        Перенести на имеющийся</label><span id="existing_cms_name" style="display:<?="none"?>;">:  <input style="background:#FFFF99; border:solid 1px #999;" type="text" name="existing_cms" id="existing_cms"></span></td>
  </tr>
  <tr id="tr_cms_list" style="display:none;">
    <td id="sms_list" onClick="controlCMSchoice(this);">
    <hr size="1">
<div><input name="" type="checkbox" value="">1С-Битрикс</div>
<div><input name="" type="checkbox" value="">ABO.CMS</div>
<div><input name="" type="checkbox" value="">Amiro.CMS</div>
<div><input name="" type="checkbox" value="">АТИЛЕКТ.CMS</div>
<div><input name="" type="checkbox" value="">B2evolution</div>
<div><input name="" type="checkbox" value="">BIGACE</div>
<div><input name="" type="checkbox" value="">CMS Made Simple</div>
<div><input name="" type="checkbox" value="">CMS Mail Keeper</div>
<div><input name="" type="checkbox" value="">CMSimple</div>
<div><input name="" type="checkbox" value="">Concrete5</div>
<div><input name="" type="checkbox" value="">Contao</div>
<div><input name="" type="checkbox" value="">DLEngine</div>
<div><input name="" type="checkbox" value="">Danneo</div>
<div><input name="" type="checkbox" value="">DotNetNuke</div>
<div><input name="" type="checkbox" value="">Drupal</div>
<div><input name="" type="checkbox" value="">E107</div>
<div><input name="" type="checkbox" value="">e2</div>
<div><input name="" type="checkbox" value="">eZ publish</div>
<div><input name="" type="checkbox" value="">InSales</div>
<div><input name="" type="checkbox" value="">Joomla</div>
<div><input name="" type="checkbox" value="">HostCMS</div>
<div><input name="" type="checkbox" value="">KooBoo</div>
<div><input name="" type="checkbox" value="">MODx</div>
<div><input name="" type="checkbox" value="">Mambo Open Source</div>
<div><input name="" type="checkbox" value="">MediaWiki</div>
<div><input name="" type="checkbox" value="">Movable Type</div>
<div><input name="" type="checkbox" value="">Nethouse</div>
<div><input name="" type="checkbox" value="">Newscoop</div>
<div><input name="" type="checkbox" value="">NPJ</div>
<div><input name="" type="checkbox" value="">Nucleus CMS</div>
<div><input name="" type="checkbox" value="">OpenCms</div>
<div><input name="" type="checkbox" value="">PHP-Fusion</div>
<div><input name="" type="checkbox" value="">PHP-Nuke</div>
<div><input name="" type="checkbox" value="">Plone</div>
<div><input name="" type="checkbox" value="">Prestashop</div>
<div><input name="" type="checkbox" value="">S.Builder</div>
<div><input name="" type="checkbox" value="">Sapid</div>
<div><input name="" type="checkbox" value="">SharePoint</div>
<div><input name="" type="checkbox" value="">Site Sapiens</div>
<div><input name="" type="checkbox" value="">TYPO3</div>
<div><input name="" type="checkbox" value="">Textpattern</div>
<div><input name="" type="checkbox" value="">TikiWiki</div>
<div><input name="" type="checkbox" value="">uCoz</div>
<div><input name="" type="checkbox" value="">UMI.CMS</div>
<div><input name="" type="checkbox" value="">WikkaWiki</div>
<div><input name="" type="checkbox" value="">WordPress</div>
<div><input name="" type="checkbox" value="">XOOPS</div>
<div><input name="" type="checkbox" value="">Xaraya</div>
<div><input name="" type="checkbox" value="">Zikula</div>
	</td>  
  </tr>
</table>
</div>
<?	
	$user = JFactory::getUser();
	if ($user->guest){?>
<h4>Пожалуйста, сообщите нам свои контактные данные:</h4>
<div id="tell_your_data">
	<div style="display:block; margin-bottom:8px;">Как вас зовут? <input name="name" type="text" id="name" value="" size="40"></div>

	<div>
    	Ваш емэйл:<div class="required"></div> <input name="email" id="email" type="text" value="">
    </div> 
	<div>
    	Ваш телефон: <input name="phone" id="phone" type="text" value=""> 
    </div>
	<div>
    	Скайп: <input name="skype" id="skype" type="text" value="">
    </div>    
<br><br><br>
<?	}?>
</div>
<button style="display:block;" type="submit">Создать прототип!</button>
</form>
<script type="text/javascript">
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
		var yEmail=d.getElementById('email');
		if (selST.options[selST.selectedIndex].value=='0') {
			alert('Вы не указали, какой тип сайта вам нужен!');
			location.href='#select_site_type';
			selST.style.backgroundColor='yellow';
			return false;
		}
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(yEmail.value)) {
			alert('Емэйл введён некорректно или отсутствует!');					
			location.href='#bottom';
			yEmail.style.backgroundColor='yellow';
			return false;
		}
	}catch(e){
		alert(e.message);
	}
}
function checkRows(sel){
	
	var rws=document.getElementsByTagName('tr');
	var tRow,arrClassName,newClassName,tClassName;
	if(sel=='WebShop') {
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
		if (radio.id=="choose_engine_0"||radio.id=="choose_engine_1"){
			if (radio.id=="choose_engine_0") d.getElementById('existing_cms').value='';	
			d.getElementById('existing_cms_name').style.display='none';	
			scrollTo(0,2000);//location.href='#bottom';
		}		
		if (radio.id=="choose_engine_0"){
			d.getElementById('tr_cms_list').style.display='block';
		}		
		if (radio.id=="choose_engine_1"||radio.id=="choose_engine_2"){
			d.getElementById('tr_cms_list').style.display='none';
		}		
		if (radio.id=="choose_engine_2"){
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