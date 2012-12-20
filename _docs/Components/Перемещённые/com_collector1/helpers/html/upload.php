<? /**
 * @version		$Id: default.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
//require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SFiles.php';?>
<span style="display:inline-block;">
  <div class="marginBottom10" id="files_container">
    <div class="put_file_field">
  		<input type="file" name="fileField_1" id="fileField_1">&nbsp; <a href="#" onClick="return addFileField('remove',parentNode);" class="txtRed">отменить загрузку...</a> &nbsp;
    </div>
  </div>
  </span>
  <div class="paddingLeft10">
  	<a href="#" onClick="return addFileField('add');">ещё файл...</a>
  </div>
