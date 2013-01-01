<?	
// No direct access
defined('_JEXEC') or die;
if (isset($_GET['user_id'])&&!JRequest::getVar('user_id')){
	?><h4>Ошибка: не получен id субъекта.</h4>
	<h5 style="margin:0;">Возможно, неправильно указан тип объекта (коллекция/заказ).</h5><?
}else{
$UserAdmin=JFactory::getUser();
$user_id_from=$UserAdmin->get('id');
$user_id=JRequest::getVar('user_id');
$document = &JFactory::getDocument();

if ($order_id=JRequest::getVar('order_id')){
	$objs='orders';
	$object_id=$order_id;
	$viewClass='Collector1ViewOrders';
	$user_stuff_type='components';
	$user_stuff_key='orders_of_user';
	$userType='tUser';
}
elseif ($collection_id=JRequest::getVar('collection_id')) {
	$objs='collected';
	$object_id=$collection_id;
	$viewClass='Collector1ViewCollected';
	$user_stuff_type='collections';
	$user_stuff_key='collections_of_user';
	$userType='UserAdmin';
}
//$document->addStyleSheet('components/com_collector1/assets/css/collector1.css');
require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'views'.DS.$objs.DS.'view.html.php';
require_once JPATH_SITE.DS.'components'.DS.'com_collector1'.DS.'models'.DS.$objs.'.php';

$view=JRequest::getVar('view');
if ($view=='customers') {
	$tUser = JFactory::getUser($user_id);
}
else {	// get precustomer data
	$tUser = SUser::getPrecustomerContactData( false,
											   $UserAdmin,
											   $user_id,
											   true //$as_object
									  		 ); 
	// нужно далее, для getData():
	$tUser->id=$user_id;
	$tUser->type='precustomer';
}
$viewInstance=new $viewClass;
$Data=$viewInstance->getData($object_id,${$userType});?>
<style>
tr.UnReadMe td{ /* непрочтённые мной (входящие, отправленные) */
	background:#FFF;
	font-weight:bold;
}
tr.UnReadOut td{ /* непрочтённые клиентом (исходящие) */
	background:#FF9;
}
tr.UnReadOutMe td{ /* непрочтённые клиентом (исходящие) и мной */
	background:#FF9;
	font-weight:bold;
}
</style>
<div class="floatTop">
<h4>Состав <? 
if (!$get_layout) $get_layout=JRequest::getVar('layout');
echo ($get_layout=="order")? "заказа":"коллекции"; ?> id <?=$object_id?></h4>
<?
if ($objs=='orders') { //echo "<div class=''>ORDER</div>"; 
	$viewInstance->buildComponentsBlocks( $Data[$user_stuff_type], // все доступные компоненты
									  	  $Data[$user_stuff_key][0], // данные заказа
									  	  $UserAdmin
										);
}else{
	//var_dump("<h1>Data:</h1><pre>",$Data,"</pre>");
	$viewInstance->buildComponentsBlocks();
	// reserved...	
}?>
</div>
<div class="floatTop">
<h4>Данные <? 
$got_view=JRequest::getVar('view');
echo ($got_view=="precustomers")? "предзаказчика":"заказчика"; ?></h4>
<?	$i=0;//var_dump("<pre>",$tUser,"</pre>");?>
    <table cellspacing="0" cellpadding="0" style="border:solid 1px #CCC;">
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>id</td>
            <td><?=$tUser->id?></td>
        <td>Email</td>
            <td><?=$tUser->email?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Логин</td>
            <td><?=$tUser->username?></td>
       <td>mobila</td>
            <td><?=$tUser->mobila?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Имя</td>
            <td><?=$tUser->name?></td>
	<?	if($tUser->type=='precustomer'){?>        
        <td>Контакт. тел.</td>
            <td><?=$tUser->phone?></td>
	<?	}else{?>        
        <td>Тел. рабочий</td>
            <td><?=$tUser->work_phone?></td>
	<?	}?>        
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Отчество</td>
            <td><?=$tUser->middlename?></td>
        <td>Скайп</td>
            <td><?=$tUser->skype?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
         <td>Пол</td>
            <td><?=$tUser->sex?></td>
        <td>Город дислокации</td>
            <td><?=$tUser->city?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Фамилия</td>
            <td><?=$tUser->surname?></td>
        <td>Регион</td>
            <td><?=$tUser->region?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>Дата регистрации</td>
            <td><?=$tUser->registerDate?></td>
        <td>Компания</td>
            <td><?=$tUser->company_name?></td>
      </tr>
      <tr<? $i++;if($i%2){?> bgcolor="#FFFFFF"<? }?>>
        <td>lastvisitDate</td>
            <td><?=$tUser->lastvisitDate?></td>
    
        <td>activation</td>
            <td><?=$tUser->activation?></td>
      </tr>
    </table>
    <div style="padding:8px">
    <a href="<?=JUri::root()?>administrator/index.php?option=com_collector1&view=<?=$got_view?>&layout=edit&id=<?=$user_id?>">Редактировать</a>
    </div>
</div>
<div style="clear:both;"></div>
<?	// извлечь данные сообщений:
	$arrMessages=SUser::getMessages( 
						  false,
						  false,
						  $user_id, // заказчик/предзаказчик
						  $user_id_from, // поскольку есть доступ к сообщениям всех сотрудников
						  false,
						  20
						); ?>
<div class="widthMax50" style="display:inline-block; vertical-align:top;">
<? 
if ($got_view=="precustomers"){?>
<br>
<div style="background:#FFFF00; display:inline-block; border:solid 2px #ccc;" class="padding10"><h4>Здесь (ниже) будет список только автонапоминаний</h4></div><? 
}
require_once JPATH_COMPONENT.DS.'helpers'.DS.'messages'.DS.'table.php';?>
</div>
<div class="width-50" style="display:inline-block;">
  <div style="margin-left:10px;">	
<? require_once JPATH_COMPONENT.DS.'helpers'.DS.'messages'.DS.'form.php';?>
  </div>  
</div>
<?	require_once JPATH_SITE.DS.'includes'.DS.'internal_mail_js.php';
}