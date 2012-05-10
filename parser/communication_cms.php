<?php
set_time_limit(100000);
include 'simple_html_dom.php';
include 'mysql.php';

$mysql = new mysql;


$result = $mysql->cms_select();
foreach($result as $key=>$value){

	$html = file_get_html('http://www.cms-comparison.com'.$value['href']);
	if(!$html){
		continue;
	}
	//название опции
	if(count($html->find('.vocabularies'))){
		foreach($html->find('.vocabularies') as $div_tag){
			$div_arr = explode(":", $div_tag->plaintext);
			if(trim($div_arr[0]) == "Operating System"){
				$div_arr[0] = "OS";
			}elseif(trim($div_arr[0]) == "Commercial Support"){
				$div_arr[0] = "Commerce Support";
			}
			$id_option = $mysql->option_select(trim($div_arr[0]));

			$a_text = '';

			//в $div_tag->attr['class'] 2 класса, разбиваем и берем второй
			$arr = explode(' ', $div_tag->attr['class']);


			//наличие параметров в данной опции
			foreach($html->find('.'.trim($arr[1]).' ul') as $a_tag){
				$a_text .= trim($a_tag->plaintext).'|';
			}

			//записываем в базу
			if($id_option != null && $id_option != ''){
				$mysql->cms_communic_write($value['id_cms'], $id_option, $a_text);
				echo $mysql->sql_err;
				/* echo $id_option;
				echo '<br />';
				echo $a_text;
				echo '<br />'; */
			}
		}

	}
	$html->clear(); // подчищаем за собой
	unset($html);
}












