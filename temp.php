  <?

class JModel{
	public $var1='my variable 1';
	static private $_instance=NULL;
	
	function __construct(){
		//var_dump("<h1>this:</h1><pre>",$this,"</pre>");
	}
	static function getInstance($class){
		if (self::$_instance==NULL) {
			self::$_instance=new $class();
			//var_dump("<h1>_instance:</h1><pre>",$_instance,"</pre>");
			//echo "<hr>";
			//echo self::$var1;
		} return self::$_instance; 
	}
}
class Collector1ModelCollected{
	public static $new_var='Hi, man! It is value by default.';
	public $my_public_common;
	function collected(){
		SCollection::getPrecustomerSet();
		echo "<div>NEW VALUE: ".SCollection::$myvar."</div>";
	}
	function collectedCommon(){
		
	}
}
//$JModel=new JModel();
//echo $JModel->var1;
class SCollection{
	public static $myvar;
	function passObjectsToModels(){
		self::$myvar=' it is changed, yes!';
		$myInstance=JModel::getInstance('Collector1ModelCollected');
		//var_dump("<h1>myInstance:</h1><pre>",$myInstance,"</pre>");
		$myInstance->my_public_common='my_public_common is changed!';
		//$myInstance::$new_var = 'new value';    
		//echo "<div>New value is: ".$myInstance::$new_var."</div>";
	}
	function getPrecustomerSet(){
		return SCollection::passObjectsToModels();
	}
}

Collector1ModelCollected::collected();
echo "<hr>";

?>
<style type="text/css">
<!--
p.MsoNormal {
margin-top:6.0pt;
margin-right:0cm;
margin-bottom:6.0pt;
margin-left:0cm;
font-size:12.0pt;
font-family:"Times New Roman","serif";
}
-->
</style>

<p class="MsoNormal">Collector1ModelCollected::collected() {</p>
<p class="MsoNormal">                        SCollection::getPrecustomerSet()  {</p>
<p class="MsoNormal" style="margin-left:35.4pt;text-indent:35.4pt;">            return  SCollection::passObjectsToModels(){</p>
<p class="MsoNormal" style="margin-left:70.8pt;text-indent:35.4pt;">            self::$myvar='  it is changed, yes!';</p>
<p class="MsoNormal" style="margin-left:70.8pt;text-indent:35.4pt;">}</p>
<p class="MsoNormal" style="margin-left:35.4pt;text-indent:35.4pt;">}</p>
<p class="MsoNormal" style="text-indent:35.4pt;">}</p>
<HR>
