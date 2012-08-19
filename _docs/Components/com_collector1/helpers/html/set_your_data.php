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
	<dd><input name="email" id="email" type="text" value="<?=$user->get('email')?>"></dd>
    
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
			alert('Вы не сообщили нам № своего телефона или указали его некорректно!');					
			location.href='#bottom';
			yPhone.style.backgroundColor='yellow';
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
?><a name="bottom"></a>
