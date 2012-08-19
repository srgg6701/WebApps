<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
jimport('joomla.mail.mail');
require_once JPATH_COMPONENT.DS.'views'.DS.'consulting'.DS.'helpers'.DS.'other_articles.php';
require_once JPATH_ADMINISTRATOR.DS.'classes/SSite.php';

/**
 * HTML View class for the Collector1 component
 */
class ContentViewConsulting extends JView 
{	
	protected $other_articles;
	protected $images;
	/**
	 * Создать заголовки разделов
	 */
	function makeHeaders(){
		return array( 'choose_right_developer'=>'Как выбрать правильного разработчика',
							array('where_to_find_him'=>'Где его найти',
								  //'bad_freelance'=>'Чем плох free-lance.ru',
								  //'how_to_check_him'=>'Как его проверить',
								  'wrong_developer'=>'Разработчик оказался не тем, кем казался…',
								  'site_partial'=>'Что делать, если нужно делать не весь сайт'
							 	 ),
						   'make_cost_minimal'=>'Свести к минимуму затраты на создание сайта',
							array('critical_important'=>'1. Критически важно: максимальное использование готовых решений',
									array('find_and_hide'=>'Бороться и искать, найти и перепрятать!',
										  'take_it'=>'Нравится? Забирайте!',
										  'frontiers'=>'Видовой барьер'
										  ),
								  'devolopment_strategy'=>'2. Стратегия развития сайта — чего вы хотите?'
								 ),
						   'make_time_minimal'=>'Как добиться от разработчика минимальных сроков разработки сайта',
							array('tech_issue'=>'ТЗ',
								  'personal'=>'Кадры решают всё',
								  'policy'=>'Договор предоставления услуг'
								 ),
						   'under_control_own'=>'Полный контроль над собственным сайтом',
							array('right_cms'=>'Правильный выбор CMS',
								  'right_developer'=>'Правильный выбор разработчика',
								  'access_to_developers'=>'Доступ к широкому кругу потенциальных разработчиков',
								  'documents'=>'Документальная поддержка',
								  'under_control'=>'Всё как на ладони',
								  'cooperation_spirit'=>'Дух сотрудничества'
								 )
						 );
	}
	/**
	 * Сгенерировать заголовки разделов и извлечь их контент
	 */
	function generateContent($block_text=false){
		$arrHeaders=$this->makeHeaders();
		foreach ($arrHeaders as $file_name=>$pheader){
			if (is_array($pheader)){
				$this->extractFileContent(3,$pheader,$block_text);//извлечь подзаголовки и контент разделов
			}else{
				$block_level=(!$block_text)? "h3":"div";
				if (!$block_text){
					$anchor="<a name=\"$file_name\"></a>";
					$block_level.=" class='marginBottomMinus8 marginTop20 font_size1_1'";
				}else{
					$anchor="<a class=\"bold\" href=\"#{$file_name}\">";
					$anchor_close="</a>";
				}
				echo "<$block_level>{$anchor}$pheader{$anchor_close}</$block_level>"; //сгенерировать заголовок раздела
				if (!$block_text) require_once JPATH_COMPONENT.DS.'views'.DS.'consulting'.DS.'contents2'.DS.$file_name.'.php';
			}
		}
	}
	/**
	 * Получить контент файла для раздела
	 */
	function extractFileContent($hlevel,$content,$block_text=false,$blevel=false){
		//static $page;
		$hlevel++;
		if ($block_text){
			if (!$blevel) $blevel=10;
			else $blevel+=10;
		}
		foreach ($content as $key=>$data) {
			if (is_array($data)){
				$this->extractFileContent($hlevel,$data,$block_text,$blevel); //3
			}else{
				if (!$block_text) {
					$anchor="<a name=\"$key\"></a>";
					$block_level="h".$hlevel." class='marginBottomMinus8'";
				}else{
					$block_level="div";
					$padding_left=" style='padding-left: {$blevel}px'";
					$anchor="<a href=\"#{$key}\">";
					$anchor_close="</a>";
				}
				echo "<$block_level{$padding_left}>{$anchor}$data{$anchor_close}</$block_level>"; //сгенерировать заголовок раздела
				if (!$block_text) require_once JPATH_COMPONENT.DS.'views'.DS.'consulting'.DS.'contents2'.DS.$key.'.php';
			}
		}
	}
	/**
	 *
	 */
	function display($tpl = NULL)
	{	
		$this->images=SSite::getImagesPath();
		$this->other_articles=ContentHelperConsultingOtherArticles::otherArticles();
		parent::display($tpl);
	}
}