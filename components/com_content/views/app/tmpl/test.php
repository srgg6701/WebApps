<? defined('_JEXEC') or die('Restricted access'); 

// prepare the JavaScript parameters
$params = array('size'=>array('x'=>100, 'y'=>100));
// add the JavaScript
JHTML::_('behavior.modal', 'a.mymodal', $params);
// create the modal window link
echo '<a class="mymodal" title="example"
         href="index.php"  
         rel="{handler: \'iframe\',
         size: {x: 400, y: 150}}">Example Modal Window</a>';

$table = (array)JTable::getInstance('customer_site_options', 'Collector1Table');
//echo $table["*_tbl"];
foreach ($table as $key=>$val) {
	//$t=; 
	if (preg_match('/_tbl$/',$key)) {
		echo "<div>$key=>$val</div>";
	}
}
//var_dump("<h1>table:</h1><pre>",$table,"</pre>");
class dateRus{
	function convert_datetime($str) { 
	list($date, $time) = explode(' ', $str); 
	list($year, $month, $day) = explode('-', $date); 
	list($hour, $minute, $second) = explode(':', $time); 
	$timestamp = mktime($hour, $minute, $second, $month, $day, $year); 
	return $timestamp;
	}
	function month_rus($ts){
		$m=date("n",$ts);
		switch ($m){
			case 1:return "января";
			case 2:return "февраля";
			case 3:return "марта";
			case 4:return "апреля";
			case 5:return "мая";
			case 6:return "июня";
			case 7:return "июля";
			case 8:return "августа";
			case 9:return "сентября";
			case 10:return "октября";
			case 11:return "ноября";
			case 12:return "декабря";
		}
	}
	function w_date($d){
	$d=$this->convert_datetime($d);
	return $this->day_rus().'., '.date("d",$d)." ".$this->month_rus($d);
	//." ".date("Y",$d);
	}
	function day_rus(){
		switch (date('N')){
			case 1:return "Пнд";
			case 2:return "Втр";
			case 3:return "Срд";
			case 4:return "Чтв";
			case 5:return "Птн";
			case 6:return "Сбт";
			case 7:return "Вск";
		}
	}
}
$dateRus=new dateRus;
//echo $dateRus->w_date(date('Y-m-d H:i:s'));
echo "<hr>";

?><?php echo JHTML::_('date', '2012-06-17', JText::_('DATE_FORMAT_LC')); ?>
<hr>
<?

//setlocale();

// Установливаем русскую локаль
// или setlocale(LC_ALL, 'ru_RU'); в PHP 4
setlocale(LC_ALL, 'rus_RUS');
// Получаем сегодняшнюю дату
// Формируем вывод
// %a - короткая запись дня недели (Чт)
// %A - обычная запись дня недели (Четверг)
// %Y - год полностью (2008)
// %y - год кратко (08)
// Короче, смотрите маны
setlocale(LC_ALL, 'rus_RUS');
echo "date: ".strftime("%A,%d.%m.%Y", time());
// В PHP4 потребуется конвертация
// $data = iconv('ISO-8859-5','windows-1251', $data);
//echo $data; // В PHP 4 название дня недели
// будет начинаться с заглавной буквы
// в обычной форме записи

?><hr>
<?

$edate='08:17:35 AM GMT';
echo 'start date: '.$edate."<br>";
$str_to_parse=substr($edate,9,2); 	//AM-PM
echo $str_to_parse."<br>";
$utime=substr($edate,0,8); 	//H:i:s
//echo $utime."<br>";

$uhours=(int)substr($utime,0,2)+3; 	// МСК
echo 'hours: '.$uhours."<br>";
if ($utime=='PM') $uhours+=12; 
echo 'hours 2: '.$uhours."<br>";
if ($uhours>12) $uhours-=12;
echo 'hours 3: '.$uhours."<br>";
if ($utime>24) $utime-=24;
echo $uhours;
?>

