<?php
set_time_limit(1000);
include 'simple_html_dom.php';
include 'mysql.php';

$mysql = new mysql;

//получаем контент

$html = file_get_html('http://www.cms-comparison.com/cms-list');
//проверка на наличие текста в теге label и запись в переменную


if($html->innertext!='' && count($html->find('label'))){
    foreach($html->find('label') as $label_tag){
      $label_text ='';
//достаем из селекта опции
		if(count($html->find('#'.$label_tag->attr['for'].' option'))){
			foreach($html->find('#'.$label_tag->attr['for'].' option') as $select_tag){
				$label_text .= trim($select_tag->plaintext).'|';
			}
		}
		$mysql->option_write(trim($label_tag->plaintext), $label_text, 'en');
		//выводим ошибки
		echo $mysql->sql_err;
    }
	
}

$html->clear(); // подчищаем за собой
unset($html); 

//достаем cms
//сначала все которые начинаются с цыфры
for($i=0; $i<5; $i++){
	$html = file_get_html('http://www.cms-comparison.com/cms-list/'.$i);
	if($html->innertext!='' && count($html->find('.views-table a'))){
		foreach($html->find('.views-table a') as $a_tag_number){
			$mysql->cms_write(trim($a_tag_number->plaintext), $a_tag_number->href, 'en');
			//выводим ошибки
			echo $mysql->sql_err;
		}
	
	}
}
$html->clear(); // подчищаем за собой
unset($html);
 
//теперь все которые начинаются с буквы
for ($i=65; $i<=90; $i++) {
	$html = file_get_html('http://www.cms-comparison.com/cms-list/'.chr($i));
	if($html->innertext!='' && count($html->find('.views-table a'))){
		foreach($html->find('.views-table a') as $a_tag_abc){
			$mysql->cms_write(trim($a_tag_abc->plaintext), $a_tag_abc->href, 'en');
			//выводим ошибки
			echo $mysql->sql_err;
		}
	
	}
}
$html->clear(); //подчищаем за собой
unset($html);





































?>