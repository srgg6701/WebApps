<?
// No direct access
defined('_JEXEC') or die;?>
    <h4 id="message_header" class="marginBottom8 paddingLeft10"><?
	$h_mess_text='Текст сообщения'; //будет использоваться также в клиентском скрипте
	echo $h_mess_text;?></h4>
    <div id="message_content" class="messContent">
    	<div id="sel_mess"><? $sel_message='Выберите сообщение';
			echo $sel_message;?></div>
        <div id="message_fields" style="display:<?='none'?>;">
            <h4 id="staticHeader" class="marginBottom4 marginTop0">Тема сообщения</h4>
            <input name="subject" id="subject" type="text" class="block width99 padding3">
          <h4 class="marginBottom4 marginTop8">Текст сообщения</h4>
            <textarea name="message" id="message" cols="" rows="10" class="width99 padding3"></textarea>
            <button type="button" class="buttonMess" onClick="sendPostAjax('message');">Отправить</button>
            <button type="reset" class="buttonMess" onClick="composeMessageDisplay('reverse');">Отменить</button>
        </div>
    </div>


