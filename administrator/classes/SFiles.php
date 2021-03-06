<?
/**
 * Методы для работы с файлами
 *@package com_collector1
 *@subpackage Admin Classes 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.mail.mail');
//import joomlas filesystem functions, we will do all the filewriting with joomlas functions,
//so if the ftp layer is on, joomla will write with that, not the apache user, which might
//not have the correct permissions
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_collector1'.DS.'tables');
//Добавить данные в таблицу и проверить состояние:
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';

class SFiles extends JFile{
	
	static $_table='#__webapps_files_names';
	public $valid_extensions='jpeg,jpg,png,gif,rtf,doc,docx,txt,xls,xlsx,zip,rar';
	public $allowed_formats;
	
	function __construct($exts=false){
		if ($exts) $this->valid_extensions=$exts;
		$this->allowed_formats='вы можете загрузить файлы форматов: '.$this->makeExtReadable($this->valid_extensions);
	}
	/**
 * Добавить записи в таблицу аттачментов
 * @package
 * @subpackage
 */
	public static function addAttachesToTable($message_id,$file_names,$table=false){
		if(!$table)
			$table=JTable::getInstance('files_attaches', 'Collector1Table');
		$table->reset();
		$table->set('files_names',$file_names); //имена файлов
		$table->set('message_id',$message_id); //идентификатор сообщения
		return SErrors::afterTable($table);
	}
	/**
	 * Обработать имена загружаемых файлов и добавить в таблицу (имена файлов разделяются ":"):
	 */
	function addFilesToTable($name,$identifier,$updated_record_id=false){
		$table = JTable::getInstance('files_names', 'Collector1Table');
		$methodName='afterTable';
		$table->reset();
		if ($updated_record_id){
			if (!$table->load($updated_record_id))
				JMail::sendErrorMess('Не получен id записи при добавлении файла, addFilesToTable()'.$err,"Ошибка обновления таблицы файлов");
			$methodName.='Update';
		}
		$table->set('files_names',$name); //имя файла
		$table->set('identifier',$identifier); //идентификатор типа заказа (сайт/компонент) 
		//сохраняем имя файла отдельно в таблице, а контент именуем как id последней записи
		SErrors::$methodName($table);
	}
	/**
	 * Удалить файл
	 * @ file, delete
	 */
	function deleteObjectFiles($files_array,$identifier,$dir=false) { 
		// [0]=> string(15) "1. To do 1.docx"
		if (!$dir) $dir=JPATH_BASE.DS.'components'.DS.'com_collector1'.DS.'files';
		if (!is_array($files_array)) 
			JMail::sendErrorMess('$files_array - не массив.','Неверный тип данных');
		for($i=0,$j=count($files_array);$i<$j;$i++){
			// [files_names]=> 1. To do 1.docx
			$files_name=explode(".",$files_array[$i]);
			$file=$identifier.'.'.array_shift($files_name).'.'.array_pop($files_name);
			if (JRequest::getVar('test'))
				echo "\nUNLINK file: ".$dir.DS.$file."\n";
			else unlink($dir.DS.$file);
		} //
		return true; 
	}
	/**
	 * Удалить записи файлов из таблицы при удалении объекта (коллекции или заказа)
	 * @ file, delete, collections, orders
	 * метод нужен для того, чтобы сначала получить id записи, после чего использовать его для безопасного удаления
	 */
	function deleteFilesRecords($identifier,$db=false) { 
		$query="SELECT id FROM ".self::$_table." WHERE identifier = '$identifier'";
		if (!$db) $db=JFactory::getDBO();
		$db->setQuery($query); 
		$id=$db->loadResult();
		$table = JTable::getInstance('files_names', 'Collector1Table');
		if (JRequest::getVar('test')) {
			echo "\nУДАЛИТЬ запись из таблицы *files_names, id записи: $id\n";
			//var_dump("<pre>",$table,"</pre>");
		}elseif (!$table->delete($id)) {
			echo $table->getError();
			return false;
		}else return true;
	}
	/**
	 * Пакетная обработка файлов с внутренним вызовом другого метода
	 * @ file
	 */
	/*function handleFiles($method,$dir=false,$obj_id=false,$type=false) { 
		if (!$dir) $dir = dirname(__FILE__);
		// Открыть заведомо существующий каталог и начать считывать его содержимое
		if (is_dir($dir)) {	echo "<div class=''>dir= ".$dir."</div>";
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) { 
					if ( $file!='.'
						 && $file!='..'
						 && $file!='_notes'
					   ) {	//echo "<div class=''>file= ".$file."</div>";
						if ($obj_id) $dir.='|'.$obj_id; //нужно для сравнения id полученного объекта и текущего файла в вызываемом методе.
						if ($type=='this') $this->$method($file,$dir);
						else self::$method($file,$dir);
					}
				}
				closedir($dh);
			} //return true;
		} //else echo "! dir: ".$dir; //die();
		return true;
	}*/
/**
 * Описание
 * @package
 * @subpackage
 */
	public static function explodeFilesNames($identifier,$params){
		return ($rec_data=self::getFilesData($identifier,$params))? 
			explode(":",$rec_data[$params]):NULL;	
	}
/**
 * Получить данные файлов заказа/коллекции
 * @package
 * @subpackage
 */
	public static function getFilesData( $identifier=false,
										 $params='id,files_names,identifier',
										 $qparams=false
									   ){
		$query="SELECT ".$params." FROM ".self::$_table;
		$method_name='loadAssoc';
		($identifier)? 
			$query.=" WHERE `identifier` = '".$identifier."'" : $method_name.='List';
		if ($qparams)
			$query.=" ".$qparams;
		$db = JFactory::getDBO();
		$db->setQuery($query); 
		return $db->$method_name();
	}	
/**
 * Описание
 * @package
 * @subpackage
 */
	public static function getIdByObjIdentifier($identifier){
		$query="SELECT id FROM ".self::$_table." WHERE `identifier` = '".$identifier."'";
		$db = JFactory::getDBO();
		$db->setQuery($query); 
		return $db->loadResult();
	}
/**
 * Получить № последнего аттачмента
 * @package
 * @subpackage
 */
	public static function getLastAttachNumber($add1){		
		$table_name="#__webapps_files_attaches";
		$table=JTable::getInstance('files_attaches', 'Collector1Table');
		$query="SELECT files_names 
FROM $table_name
WHERE id=( SELECT MAX(id) FROM $table_name )";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		if(!$last_files=$db->loadResult())
			$return=0; 
		else{
			$names=explode(":",$last_files);
			$last_name=array_pop($names);
			$return=(int)substr($last_name,0,strpos($last_name,"."));
		}
		if ($add1) $return+=1;
		return $return;
	}	
/**
 * Распарсить имена приаттаченных файлов и вернуть как массив: №=>name
 * @package
 * @subpackage
 */
	public static function handleAttachesNames($files_names){
		$files=explode(":",$files_names);
		$arrFiles=array();
		foreach($files as $file){
			$arrFiles[substr($file,0,strpos($file,"."))]=substr($file,strpos($file,".")+1);
		} //var_dump("<h1>arrFiles:</h1><pre>",$arrFiles,"</pre>");
		return $arrFiles;
	}	
	/**
	 * Обработать закачиваемые файлы
	 */
	function handleFilesUploading( $atype/* o or s */,
								   $obj_id
								 ){
		if ($_FILES){ //$deb=true; //if ($deb) echo JPATH_COMPONENT."<hr>";
			//
			$f=1;
			$updated_record_id=false;
			$identifier=$atype.$obj_id;
			// проверить, были ли уже закачаны какие-либо файлы:
			if($existFilesData=self::explodeFilesNames($identifier,'files_names')){
				//var_dump("<h1>existFilesData:</h1><pre>",$existFilesData,"</pre>");
				$f+=count($existFilesData);
				$files_names=implode(":",$existFilesData);
				$updated_record_id=self::getIdByObjIdentifier($identifier);
			} 	
			foreach ($_FILES as $name=>$data){
				if ( key($data)=='name' &&
				     $data['name'] //файл размещён в поле заказчки
				   ) {
					if ($data['size']>0){
						$uploadedFileName=$f.'. '.$data['name']; //пробел после точки нужен для читабельного отображения имени файла в списках
						$uploadedFileNameParts = explode('.',$uploadedFileName);
						$uploadedFileExtension = array_pop($uploadedFileNameParts); //extension
						//$test=true;
						if ($test){
							echo "<h5>".$uploadedFileName."</h5>";
							echo "<div>[$name]=>".$uploadedFileName;
							echo "</div>";
						}
						//собрать имена файлов; будут записываться в поле одной строкой через разделитель (вне цикла):
						if ($f>1) $files_names.=':';
						//присвоить файлу, сохраняемому в директории, имя:
						$files_names.=$uploadedFileName;
						//назначить таблицу - коллекций (основная) или заказов (альтернативную):
						if ($atype=='o') $alt_table=true;
						$ttable=SStuff::getDefaultTable($alt_table);
						//получим имя файла вида: 29.2.doc // № заказа . № файла . расширение
						$prepared_file_id=$obj_id.'.' . $f . '.' . $uploadedFileExtension;
						
						//закачать файлы; вид имён файлов: 9.doc
						self::uploadFiles( $name, // filename field 
										   // path to save file. Starts from an object type (s/o)
										   JPATH_COMPONENT.DS.'files'.DS.$atype.$prepared_file_id
										 );
						$f++;
					}else{
						JMail::sendErrorMess($_FILES,'Не получен контент загружаемого файла...');
					}
				}
			}
		}
		//разместить имена/привязка к заказам в dnior_webapps_files_names:
		if ($f>1) { //закачали хотя бы один файл
			//echo "<div class=''>f=$f, updated_record_id= ".$updated_record_id."</div>";
			self::addFilesToTable( 
							$files_names,
							$atype.$obj_id,
							$updated_record_id
						); 	//die();
			return true;
		}else return NULL;
	}
	/**
	 *
	 */
	function requestUserFilesByObjectId( 
									$object_type,
							   		$object_id,
							   		$user=false,
							   		$db=false
							 	) {
		if (!$user) $user = JFactory::getUser();
		$method_name=($user->get('guest')==1)? 'getPrecustomerSet':'getCustomerSet';
			$arrUserStuff=SStuff::$method_name($object_type,$user);
		if ($arrUserStuff) {
			$query="SELECT `identifier`, files_names FROM ".self::$_table." 
	 WHERE SUBSTRING( identifier, 2) = ".$object_id; //echo "<div class=''>query= ".$query."</div>"; 
			if (!$db) $db=JFactory::getDBO();
			$db->setQuery($query); 
			if($user_files=$db->loadAssoc()){
				return explode(":",$user_files['files_names']);
			}
		}
		return NULL;
	}
	/**
	 * add a space 
	 */
	function makeExtReadable(){
		return str_replace(',',', ',$this->valid_extensions);
	}
	/**
	 * @ file, delete
	 */
	function showFiles( $filenames, // don't contain object type prefix
						$object_id,
						$templatename,
						$view=false,
						$baseurl=false
					  ) {
		require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'helpers'.DS.'html'.DS.'delete_by_ajax_link.php';
		if (!$view) $view=JRequest::getVar('view');
		$type=($view=='orders')? 'o':'s';
		if (is_array($filenames)){ //может быть false
			switch($view){
				case "orders":
					$width='226';
					break;
				case "collected":
					$width='500';
					break;
				default: 
					$width='450';
			}
			for($i=0,$j=count($filenames);$i<$j;$i++):
				$filename=$filenames[$i]; // without object type prefix, just object id, file id, file name, extension
				// 2. My file name.doc 
				$parsedFileName=explode('.',$filename);
				// array (2,' My file name','doc')
				//$object_id:
				// 25 
				$file_id=$parsedFileName[0];
				// 2
				$ext=array_pop($parsedFileName);
				// doc
				$file_in_dir_name=$type.$object_id.'.'.$file_id.'.'.$ext;
				// s25.2.doc echo $file_in_dir_name;?>
	<div class="flslinks">
    	<div style="max-width:<?=$width?>px;">
        	<?	// click to load:	?>
        	<a href="<?=$baseurl.'/components/com_collector1/files/'.$file_in_dir_name?>">
            	<nobr>
                	<span onMouseOver="this.title=this.innerHTML"><?=$filename?></span>
                </nobr></a> 
        </div>
        <?	if ($baseurl!="..") makeLinkToDelete('deleteFile',$file_in_dir_name,$templatename,$baseurl,"Удалить файл...")?>
    </div>
		
			<?	echo "\n";/**/
			endfor;
		}else{?>Файлов нет.<? }	
	}
	/*
	 * upload file
	 * @ upload, file
	 */
	function uploadFiles( $fieldName,
						  $uploadPath, // path to upload including file name
						  $img_params=false,
						  $max_file_size=false
						){	//source: http://docs.joomla.org/Creating_a_file_uploader_in_your_component	
		//	$fieldName	is the name of the field in the html form, filedata is the default name for swfupload
		//so we will leave it as that
		//any errors the server registered on uploading
		$fileError = $_FILES[$fieldName]['error'];
		if ($fileError > 0) 
		{
				switch ($fileError) 
			{
				case 1:
				echo JText::_( 'FILE TO LARGE THAN PHP INI ALLOWS' );
				return;
		 
				case 2:
				echo JText::_( 'FILE TO LARGE THAN HTML FORM ALLOWS' );
				return;
		 
				case 3:
				echo JText::_( 'ERROR PARTIAL UPLOAD' );
				return;
		 
				case 4:
				echo JText::_( 'ERROR NO FILE' );
				return;
				}
		}
		if (!$max_file_size) $max_file_size=2000000;
		//check for filesize
		$fileSize = $_FILES[$fieldName]['size'];
		if($fileSize > $max_file_size)
		{
			echo JText::_( 'FILE BIGGER THAN 2MB' );
		}
		 
		//check the file extension is ok
		$fileName = $_FILES[$fieldName]['name'];
		$uploadedFileNameParts = explode('.',$fileName);
		$uploadedFileExtension = array_pop($uploadedFileNameParts);
		 
		$validFileExts = explode(',', $this->valid_extensions);
		 
		//assume the extension is false until we know its ok
		$extOk = false;
		 
		//go through every ok extension, if the ok extension matches the file extension (case insensitive)
		//then the file extension is ok
		foreach($validFileExts as $key => $value)
		{
			if( preg_match("/$value/i", $uploadedFileExtension ) )
			{
				$extOk = true;
			}
		}
		 
		if ($extOk == false) 
		{
			echo JText::_( 'INVALID EXTENSION' );
				return;
		}
		 
		//the name of the file in PHP's temp directory that we are going to move to our folder
		$fileTemp = $_FILES[$fieldName]['tmp_name'];
		//for security purposes, we will also do a getimagesize on the temp file (before we have moved it 
		//to the folder) to check the MIME type of the file, and whether it has a width and height
		$imageinfo = getimagesize($fileTemp);
		//we are going to define what file extensions/MIMEs are ok, and only let these ones in (whitelisting), rather than try to scan for bad
		//types, where we might miss one (whitelisting is always better than blacklisting) 
		$okMIMETypes = 'image/jpeg,image/pjpeg,image/png,image/x-png,image/gif';
		$validFileTypes = explode(",", $okMIMETypes);		
		//if the temp file does not have a width or a height, or it has a non ok MIME, return
		if( $img_params && ( 
				!is_int($imageinfo[0]) || !is_int($imageinfo[1]) ||  !in_array($imageinfo['mime'], $validFileTypes) 
			)
		  )
		{
			echo JText::_( 'INVALID FILETYPE' );
				return;
		}
		//lose any special characters in the filename
		// НЕ ИСПОЛЬЗУЕТСЯ ИЗ-ЗА ПРОБЛЕМ С ОТОБРАЖЕНИЕМ КИРИЛИЦЫ:
		//$fileName = preg_replace("/[^A-Za-z0-9А-Яа-я]/i", "-", $fileName); 
		//always use constants when making file paths, to avoid the possibilty of remote file inclusion
		echo "\nuploadPath(LINE: ".__LINE__.")=".$uploadPath."\n";
		if(!parent::upload($fileTemp, $uploadPath)) 
		{
			echo JText::_( 'ERROR MOVING FILE' );
				return;
		}
		else
			return true;
		
	}
}