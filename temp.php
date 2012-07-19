<?
class HFile{
	function handleFile($file,$dir=false){
		print "<div>Файл: $file : тип: " . filetype($dir . $file) . "\n</div>";
	}
	function handleFiles($method,$dir=false,$type=false) {
		if (!$dir) $dir = dirname(__FILE__);
		$dir.='/';
		// Открыть заведомо существующий каталог и начать считывать его содержимое
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if ($file!='.'&&$file!='..') {
						if ($type=='this') $this->$method($file,$dir);
						else self::$method($file,$dir);
					}
				}
				closedir($dh);
			}
		}
		else echo "! dir: ".$dir; 
	}
}
HFile::handleFiles('handleFile','components/com_collector1/files');
echo "<hr>";
$HFile=new HFile;
$HFile->handleFiles('handleFile','components/com_collector1/files','this');
?>