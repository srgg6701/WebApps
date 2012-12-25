<? /**
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
//echo "<h2>Controller instanse: </h2>";echo ($Collector1Controller)? "exists":"not exists";
// JS form fields validation
if (!$user)	$user = JFactory::getUser();?>
<div class="item-page make-order">
<h2><? 
	if ($this->order_id){
		$current_order_data=$this->orders_of_user[0]; // извлечёт данные только текущего заказа 
		//$current_components=$current_order_data['components_names'];
		?>Редактирование параметров заказа id<? echo $this->order_id; //var_dump("<h1>orders_of_user:</h1><pre>",$current_order_data,"</pre>");
	}else{
		?>Заказ на разработку компонентов web-сайта<? 
	}?></h2>
<form method="post" action="<?=$this->go_submit?>" enctype="multipart/form-data" name="orders" onSubmit="return checkRequired();">
<div class="padding10 bgGrayEEE" style="border-radius:6px 6px 0 0; padding:14px 0 4px 14px;">
	<strong>ВНИМАНИЕ!</strong>
	<p class="width80">Если вам необходимо выполнить работы, связанные <strong>со всем вашим сайтом</strong>, такие, как его разработка &quot;с&nbsp;нуля&quot;, перенос на CMS и т.п., пожалуйста, воспользуйтесь нашим <strong><a href="index.php/?Itemid=103">конструктором сайтов</a></strong>.
	</p>
</div>
<div class="width80">
<p>Отметьте компоненты, разработка которых вам нужна и/или добавить собственные:</p>
<div id="components">
	<span onClick="checkBackground(this);">
<? 	//var_dump("<h1>current_order_data:</h1><pre>",$current_order_data,"</pre>");//вывести текущий список компонентов:
	$this->buildComponentsBlocks( $this->components, // все доступные компоненты
								  $current_order_data, // ['components_names'] - заказанные юзером компоненты
								  $user
								);?>
	</span>
</div>    
<p><div class="required_field"></div><a name="text_order_description"></a>Опишите свой заказ, пожалуйста:</p>
</div>
  <textarea class="width80" onKeyUp="this.style.background='';" name="order_description" id="order_description" rows="8"><?=$current_order_data['description']?></textarea><!---->
  <div style="margin:8px 10px;">Дополнительные материалы:
   <div class="marginBottom14 marginTop6">(<?
    	$SFiles=new SFiles();
		echo $SFiles->allowed_formats;
	?>)</div>
  </div>
<?	SHTML::uploadFileField();?>
<p>Предполагаемый бюджет, руб.: <input name="budget" type="text" size="4" value="<?=$current_order_data['budget']?>"></p>
  <div class="clearBoth marginTop10"></div>
  <hr size="1" class="marginTop10">
<div class="marginBottom4"><div class="required_field"></div> Укажите желаемую дату выполнения задания в формате ГГГГ-ММ-ДД</div>
или выберите её из календаря: <?php echo JHTML::_('calendar', $value = $current_order_data['finish_date'], $name='finish_date', $id='finish_date', $format = '%Y-%m-%d', $attribs = 'size=9'); ?>
  
  <hr size="1" class="marginTop10">
<? 	if (!JRequest::getVar('order_id')):?>
<input name="task" type="hidden" value="order">
<?	endif;
require_once JPATH_COMPONENT.DS.'helpers'.DS.'html'.DS.'set_your_data.php';	
//JS-form validation:
$checkCommonData=setCheckCommonData();?>
<div class="clearBoth"></div>
<div style="height:24px;">&nbsp;</div>
<button type="submit" id="make_site_prototype" class="marginLeft0">Подтвердить!</button>
</form>
<script type="text/javascript">
function checkRequired(){
	try{
		d=document;
		//описание заказа:
		var txtField=d.getElementById('order_description');
		if (!txtField.value||txtField.value.length<3){
			var mess=(!txtField.value)? "Вы не разместили описание заказа!":"Описание заказа не может быть короче 3-х символов!";
			alert(mess);
			txtField.style.background='#FF9';
			d.location.href='#text_order_description';
			return false;
		}
		//дата завершения заказа:
		if(dateValidation(d.getElementById('finish_date'))){
<?	if ($checkCommonData) {?>
			return checkCommonData();
<? 	}?>	
		}else return false;
	}catch(e){
		alert(e.message);
	}
}
//
function checkBackground(tContainer){ //alert(tContainer.innerHTML);
	try{
		var cell;
		var cells=tContainer.getElementsByTagName('input');
		for(i=0,j=cells.length;i<j;i++){
			cell=cells.item(i); //checkbox
			cell.parentNode.className=(cell.checked==true)? 'bgActive':'';
		}
		//alert(bgActive);
	}catch(e){
		alert(e.message+'\n'+e.name);
	}
}
</script>

</div>
