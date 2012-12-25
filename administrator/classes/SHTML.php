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
	public static function uploadFileField(){
		require_once JPATH_BASE.DS.'components'.DS.'com_collector1'.DS.'helpers'.DS.'html'.DS.'upload.php';
	}
}