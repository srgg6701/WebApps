<?
/**
 * HTML-компоненты
 *@package HTML
 *@subpackage
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.mail.mail');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'tables');
//Добавить данные в таблицу и проверить состояние:
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';

class SHTML extends JHtml{
	public $pagination;
	public function makePagination( $user_id=NULL,
								  	$params=false
								  ){
		$mCount=(int)SUser::getAllUserMessagesCount($user_id);
		$devided=$mCount/20;
		$cnt=intval($devided);
		$pages=($devided>$cnt)? $cnt+=1:$cnt;
		$request=JRequest::get('get');
		if(!$current_limit=$request['limit'])
			$current_limit=0; // чтоб выделить первое значение, если нет никакого
		unset($request['limit']);
		$link='?';
		$i=0;
		foreach($request as $key=>$value){
			if ($i) $link.='&';
			$link.=$key."=".$value;
			$i++;
		}
		$p='';
		for($i=0;$i<$pages;$i++){
			$set_limit=($i*20).',20';
			$p.='<a ';
			if ($set_limit==$current_limit)
				$p.='class="txtOrange" ';
			$p.='href="'.$link.'&limit='.$set_limit.'">['.($i+1).']</a> ';
		}
		$pagination='<div'.$params.' align="center">Страницы: '.$p.'</div>';
		if ($user_id)
			$this->pagination=$pagination;
		else 
			return $pagination;
	}
/**
 * Пагинация для таблицы сообщений админа
 * @package
 * @subpackage
 */
	public static function makePaginationAdmin(){
		return self::makePagination();
	}
/**
 * Описание
 * @package
 * @subpackage
 */
	public static function uploadFileField(){?>
<span style="display:inline-block;">
  <div class="marginBottom10" id="files_container">
    <div class="put_file_field">
  		<input type="file" name="fileField_1" id="fileField_1" multiple>&nbsp; <a href="#" onClick="return addFileField('remove',parentNode);" class="txtRed">отменить загрузку...</a> &nbsp;
    </div>
  </div>
  </span>
  <div class="paddingLeft10">
  	<a href="#" onClick="return addFileField('add');">ещё файл...</a>
  </div>		
<?	}
}

