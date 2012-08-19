<?
/**
 * Отладочные процедуры
 * @package com_collector1
 * @subpackage Debug & Errors
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';
jimport('joomla.mail.mail');

class SDebug{
	/**
	 *
	 */
	function alertDebugInfo($text){?>
<script type="text/javascript">
alert('alertDebugInfo:\n<?=$text?>');
</script>
<?	}
	/**
	 * Вывести HTML 
	 */
	function dOutput($content,$tag=false,$style=false,$backtrace=false){
		if(!$tag) $tag='div';
		if ($style){
			if (!strstr($style,'class')) $style=" style='$style'";
			else {
				str_replace('"',"'",$style);
				$style=" $style";
			}
		}
		if (strstr($content,"query")) $content=str_replace("#_","dnior",$content);
		echo "<{$tag}{$style}><pre>$content</pre></{$tag}>";
		if ($backtrace) self::showDebugContent(debug_backtrace());
	}
	/**
	 * Показать Debug object 
	 */
	function showDebugContent($val,$name=false){?>
		<div>
			<div style="padding:8px;">
				<a href="javascript:void();" onClick="manageBlockDisplay(parentNode.parentNode);">Показать/скрыть</a> объект <b><?=$name?></b>
			</div>
			<div style="display:none">
	<?	//
		if (SErrors::showDebugTrace($val)){ 
			echo SErrors::$trace.'<br>';
			SErrors::$trace='';
		}else {?>ОШИБКА выполнения SErrors::showDebugTrace($val)!<? }?>
    		</div>
        </div>
<?	}
}