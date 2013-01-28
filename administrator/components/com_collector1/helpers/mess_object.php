<?	
// No direct access
defined('_JEXEC') or die;?>
<div class="paddingLeft10 paddingRight10" id="pickup_obj" style="display:<?="none"?>; vertical-align:top;">
	<h4 class="marginBottom8">Выберите объект сообщения:</h4>
    <div id="attachObjects">
        <label>
          <input type="radio" name="pickupObjectType" value="site" id="pickupObjectType_sites" />
          Сайты</label>
          <div class="<?="hidden"?>" id="pickupObjectType_sites_obj"><?
	// add 's' to id:
	function attachLetter($val){
		return 's'.$val;
	}
	$arrCollectionsLetters=array_map('attachLetter',$collections_ids_array);
	//SDebug::showDebugContent($collections_ids_array,'collections_ids_array');
	$selArray=array_combine($arrCollectionsLetters,$collections_ids_array);
	array_unshift($selArray,'-?-');
	echo JHTML::_('select.genericlist', $selArray, 'collections_ids_array');
		?></div>
        <br />
        <label>
          <input type="radio" name="pickupObjectType" value="components" id="pickupObjectType_components" /> Наборы компонентов
          </label>
          <div class="<?="hidden"?>" id="pickupObjectType_components_obj"><?		
		//SDebug::showDebugContent($orders,'orders');
	for($i=0,$j=count($orders);$i<$j;$i++){
		$order=$orders[$i];
		$cmp_name='<div>';	
		
		
		for( $cmp=0,$vcmp=count($order['components_names']);
			 $cmp<$vcmp;
			 $cmp++
		   ){
			$cmp_name.="<div>";
			$cmp_name.=($isAdmin)?  
				$order['components_names'][$cmp]
				:
				$order['components_names'][$cmp]['name_ru'];
			
			$cmp_name.="</div>"; 
		}
		$cmp_name.="</div>
			<hr size='1' color='#CCC' style='clear:both'>";
		
		
		$option[]=JHTML::_( 'select.option', 'o'.$order['id'], $order['id'].'</br>'.$cmp_name);
	}
	$comps=JHTML::_('select.radiolist', 
				   	$option, 
				   	'component',	// name 
				   	' class=""', 
				   	'value', // $rvalues key - is value 
				   	'text',  // $rvalues value - is text 
				   	false,  // selected value by default
				   	false 
				   );
	// correct elements' ids:
	$comps=str_replace('id="componento','id="component',$comps);
	echo $comps;
		  ?></div>
        <br />
        <label>
          <input type="radio" name="pickupObjectType" value="none" id="pickupObjectType_none" />
          Без объекта</label>
        <br />
    </div>
</div>