<?
$object_id=300;
$object="Object text";
//$user_type="precustomer";
ob_start();

$user_type=($object_id<200)? 'precustomer':'customer'; ?>
<span id="<?=$object_id?>" title="DblClick" class="pseudo_link_dotted" onDblClick="makeObjectEditableField(this,'<?=$user_type?>');"><?
			echo $object.', '.$user_type;
			?></span>
<?
$span=ob_get_contents();
ob_end_clean();
echo $span;
?>
<script>
var tel="8 904 442 84 47";
var mytel=tel.replace(/\s/g,'');
//alert(mytel);
//var tObject="43_myId";
//user_id=tObject.substr(0,tObject.indexOf("_"));
//alert(user_id);
</script>