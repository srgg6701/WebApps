<?
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
/**
 * Форма добавления контактных данных
 */
defined('_JEXEC') or die;
if (!$user) $user = JFactory::getUser();
	if ($user->get('guest')==1){?>
<div id="tell_your_data">
<h4>Пожалуйста, сообщите нам свои контактные данные:</h4>
<dl>
	<dt>Как вас зовут? <div class="required_field"></div></dt>
	<dd><input class="dataCell" name="name" type="text" id="name" value="<?=$user->get('name')?>"></dd>

	<dt>Ваш емэйл: <div class="required_field"></div></dt>
	<dd><input name="email" id="email" type="text" value="<?=$user->get('email')?>" onBlur="seekDataRest(this.value);"></dd>
    
	<dt>Ваш телефон: <div class="required_field"></div></dt>
	<dd><input name="phone" id="phone" type="text" value="<?=$user->get('phone')?>"></dd>
    
	<dt>Скайп: </dt>
	<dd><input name="skype" id="skype" type="text" value="<?=$user->get('skype')?>"></dd>
</dl>
</div>
<?	
	}
	function setCheckCommonData(){	
	if (!$user)
		$user = JFactory::getUser();
	if($user->get('guest')==1){?>

<script type="text/javascript">
function checkCommonData(){
	try{
		d=document;
		var yName=d.getElementById('name');
		var yEmail=d.getElementById('email');
		var yPhone=d.getElementById('phone');
		var err=0;
		var mess='';
	
		if (!yName.value||yName.value==' ') {
			mess='Вы не сообщили нам своё имя!';					
			yName.style.backgroundColor='yellow';
		}
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(yEmail.value)) {
			mess='Емэйл введён некорректно или отсутствует!';
			yEmail.style.backgroundColor='yellow';
		}
		if (yPhone.value.length<7) {
			mess='Вы не сообщили нам № своего телефона или указали его некорректно!';					
			yPhone.style.backgroundColor='yellow';
		}
		if(mess!=''){
			alert(mess);
			scrollToY('bottom');
			return false;
		}
	}catch(e){
		alert(e.message);
	}
}
</script>

<?			return true;
		}else return false;
	}
?><div style="clear:both; margin-top:-20px;"><a name="bottom" id="bottom"></a></div>
