<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

//jimport('joomla.application.component.helper');

/**
 * Content Component Route Helper
 *
 * @static
 * @package		Joomla.Site
 * @subpackage	com_content
 * @since 1.5
 */
class ContentHelperConsultingOtherArticles
{
	/**
	 * Блок ссылок на другие статьи
	 */
	function otherArticles()
	{	
		$arrArticles=array( 'real_cost'=>'Как определить реальную стоимость разработки сайта',
							'site_support'=>'Стоит ли платить за поддержку сайта',
							'foreign_company'=>'Стоит ли заказывать разработку сайта иногородней компании',
							'technical_issue'=>'Как грамотно составить ТЗ',
							'bad_developer'=>'Что делать, если во взаимоотношениях с разработчиком назревают проблемы'
						  );
		$other_articles='<h3>Остальные статьи:</h3>
		<ul class="marginBottom20">';
		foreach ($arrArticles as $file_name=>$link_text){
    		$other_articles.='<li><a href="index.php?option=com_content&view=consulting&layout='.$file_name.'">'.$link_text.'</a></li>';
		}
		$other_articles.='</ul>';
		return $other_articles;
	}
}
