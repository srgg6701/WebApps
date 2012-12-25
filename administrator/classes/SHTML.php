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

