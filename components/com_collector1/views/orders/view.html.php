<?php 
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
//echo "<h3>view.html.php</h3>";
//jimport('joomla.application.component.view');
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewOrders extends JView 
{	/* возвращает всё ($this)*/
	protected $current_order_set; //текущий набор
	//protected $orders_ids_array; //массив id id заказов ЗААВТОРИЗОВАННОГО юзера
	protected $go_submit='index.php?option=com_collector1&task='; //заготовка для URL формы
	public $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data"; //ссылка на создание коллекции с заполнением данных предзаказчика
	//protected $guest_orders_ids; //id id заказов гостя
	protected $orders_of_user; //набор заказов юзера со всеми их данными
	protected $templatename; //имя шаблона
	protected $components; //названия компонентов
	protected $order_id;
	/**
	 * @ orders, user
	 * backend uses it also
	 */

	function buildComponentsBlocks( $components, // все возможные компоненты
									$current_order_data=false,
									$user=false
								  ){
		if (!$user) $user = JFactory::getUser();
		$isAdmin=SUser::detectAdminStat($user);
		$start_count=0; //var_dump("<h1>components:</h1><pre>",$components,"</pre>");
		$current_components=$current_order_data['components_names'];
		for ($i=0,$j=count($components),$y=count($current_components);$i<$j;$i++) {
			if ($component_id=$components[$i]['id']) {
				$component_name=$components[$i]['name_ru'];
				if ($current_order_data&&$start_count<$y) {	
					for($x=0;$x<$y;$x++) {
						$checked=false;
						if ($current_components[$x]['id']==$component_id) {
							$checked=true;
							$start_count++;
							break;
						}
					}
				}
				if (!$isAdmin){?>
				<label>
					<div<? if($checked){?> class="bgActive"<? }?>>
						<input<? if($checked){?> checked<? }?> name="component_<?=$component_id?>" type="checkbox" value="<?=$component_name?>"><span><?=$component_name?></span>
					</div>
				</label>
			<? 	}else{?>
    			<div><?=$component_name?></div>
			<?	}
			}
		}
	}

	function getData($order_id,$user=false){
		$model=JModel::getInstance('orders','Collector1Model');
		// $model=$this->getModel(); - не использовать, т.к. не сработает для backend
		$Data=array();
		$Data['components']=$model->getComponentsNames();
		if ($user) $Data['orders_of_user']=$model->getCustomerOrders($user,false,$order_id);
		return $Data;
	}
	
	function display($tpl = null)
	{	
		$user = JFactory::getUser();
		$Data=$this->getData($order_id,$user); 
		$this->components=$Data['components'];
		$this->orders_of_user=$Data['orders_of_user'];
		//:
		$order_id=JRequest::getVar('order_id'); 
		if ($this->order_id=$order_id) {
			$this->go_submit.="updateorder&order_id=".$order_id;		
		}else{
			$this->go_submit.="order";
		}
		$this->templatename=SSite::getCurrentTemplateName(JFactory::getApplication());
		parent::display($tpl);
	}
}