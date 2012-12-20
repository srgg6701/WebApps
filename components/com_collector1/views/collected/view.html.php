<?php
/**
 * @version     1.4.0
 * @package     com_collector1
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt*/

// No direct access
defined('_JEXEC') or die;
/**
 * HTML View class for the Collector1 component
 */
class Collector1ViewCollected extends JView 
{	/* возвращает всё ($this)*/
	protected $_action; //тип выполненного действия
	protected $collections_data_array; //то, что собрал юзер - массив ВСЕХ данных ВСЕХ коллекций. 
	protected $jrequest_collection_id; //collection id, переданный, как параметр URL
	protected $options_names;
	protected $done=array();
	protected $templatename;
	protected $go_signup="index.php?option=com_users&view=registration&task=fill_precustomer_data";
	public $get_options_names;
	public $order_files;
	
	/**
	 * Построить таблицу для backend'a
	 */
	function buildComponentsBlocks(){
		$model=JModel::getInstance('collector1','Collector1Model');
		$this->get_options_names=$model->get_options_names();
		$this->buildCollectionsTable('isAdmin');
		return true;
	}
	/**
	 * Получить данные коллекций
	 * @ collection
	 */
	function getData($collection_id,$user=false){
		$model=JModel::getInstance('collected','Collector1Model');
		// $model=$this->getModel(); - не использовать, т.к. не сработает для backend
		$Data=array();  //SDebug::showDebugContent($model2,'model2');
		if (!$user) $user = JFactory::getUser();
		$isAdmin=SUser::detectAdminStat($user);
		$Data=$model->collected($isAdmin); // SDebug::showDebugContent($Data,'Data');
		if ($isAdmin) {
			$this->collections_data_array=$Data;
			return true;
		}
		else return $Data;
	}
	/**
	 * Построить таблицу коллекций
	 * @ collection
	 */
	function buildCollectionsTable($user=false,$collections_data_array=false){
		if (!$user) $user = JFactory::getUser();
		if(!$collections_data_array)
			$collections_data_array=$this->collections_data_array;
		// SDebug::showDebugContent($collections_data_array,'collections_data_array');?>
    	<table cellpadding="8" cellspacing="0" id="tblCollected">
          <tr id="tblHeaderRow">
            <th>Опция</th>
            <th>Значение</th>
          </tr>
<?	$arrRightOptions=array('site_type_id','engine_type_choice_id','engines','options_array','xtra'); 
	if (!empty($collections_data_array)) :
		//$arrSMSs=SCollection::setCMStypes(); SDebug::showDebugContent($arrSMSs,'arrSMSs');
		$j=count($collections_data_array);
		$fl=0;
		foreach ($collections_data_array as $collection_set) :
			$collection_id=$collection_set['id'];?>
        <?	if ($user!='isAdmin'){?>  
          <tr class="site_id"><td colspan="2" id="site_<?=$collection_set['id']?>">&nbsp;</td></tr>  
          <tr>
          	<td colspan="2" id="my_site_number">Сайт # <?=$collection_id?></td>
          </tr>
		<?	} 
			foreach($collection_set as $option=>$data) : 
				if (in_array($option,$arrRightOptions)) :
					switch ($option) : 
						case "site_type_id":
							$option_name="Тип сайта";
							$option_value=$collection_set['site_type_name'];
								break;
						case "options_array":
							$option_name="Отмеченные опции";
							$option_value='options_array';
								break;
						case "engines":case "engine_type_choice_id":
							$option_name="Выбор движка";
								switch ($collection_set['engine_type_choice_id'])  { 
									case "3": $option_value="Мигрирация на ".$collection_set['engines'];
										break;							
									case "2": $option_value=$collection_set['engines'];
										break;
									case "1": $option_value=str_replace(',',', ',$collection_set['engines']).' ';
										break;
								}
						break;
						case "xtra":
							$option_name="Дополнительные опции";
								break;
					endswitch;
					if($option!="engines"):?>
		  <tr<? 		if ($option=='xtra') {?> id="site_desc_cell"<? }
		  				if ($option_value=='options_array') :?> valign="top" class="rowMySiteOptions"<? endif;?>>
			<td><?=$option_name?>:</td>
			<td><?	// echo "option value = ".$option_value."<hr>";
			// SDebug::showDebugContent($collection_set,'collection_set');
			
			if ($option_value) {
				//массив опций:
				if ($option_value=='options_array'){
					$arrColumnsNames=Collector1ModelCollector1::getSidesDesc();?>
                <table cellspacing="0" class="UnderCollected">
                  <tr>
                    <th><div align="right" class="txtBlack">&nbsp;&nbsp;Разделы &gt; &nbsp; </div>
                        <div class="h3">▼Опция</div></th>
							<?	for($ii=0,$c=count($arrColumnsNames);$ii<$c;$ii++) :?>
					<th><? echo $arrColumnsNames[$ii]['name_ru'].'<div class="skinny">['.$arrColumnsNames[$ii]['site_side'].']</div>';?></th>
							<?	endfor;?>
  				  </tr>
						<?		$get_options_names=$this->get_options_names;
								
								foreach($collection_set['options_array'] as $option_id => $array_sides) :?>
                  <tr>
                    <td><?=$get_options_names[$option_id]?><? ?></td>
    							<?	for($ii=0,$c=count($arrColumnsNames);$ii<$c;$ii++) :?>
					<td<? 
										if($array_sides[$ii]&&$array_sides[$ii]==$arrColumnsNames[$ii]['site_side']) :
											$checked=true;
											?> class="checked"<? // рисует галочку
										else: $checked=false;
										endif;?> align="center"><?
                                        if ($user!='isAdmin'||!$checked):
											?>&nbsp;<?
										else:
											?>&bull;<?
                                        endif;?></td>
    							<?	endfor;?>
  					</tr>
						<?		endforeach;?>
				</table>
			<?	}else echo $option_value;
                unset($option_value);
            }else{
                if ($option=="options_array") :
                    $data=unserialize($data);
                    foreach($data as $key=>$val) :
                        echo "<div>$key=></div>";
                        var_dump("<pre>",$val,"</pre>");
                    endforeach;
                endif;
                echo $data; 
            }
        endif;?></td>
		  </tr>
	<?php 			endif;
			endforeach;?>
    	  <tr>
            <td valign="top" align="right" class="bold"><div style="display:inline-block;">Файлы</div> <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->templatename 
	?>/images/folder.png" width="32" height="32" style="margin-left:10px; margin-top:-6px;" align="right"></td>
            <td valign="top"><? //SDebug::showDebugContent($collection_set,'collection_set');
			if ($user=='isAdmin') $this->baseurl='..';
			SFiles::showFiles( $collection_set['files_names'],
							   $collection_id,
							   $this->templatename,
							   'collected',
							   $this->baseurl //may not be
					  		 );?></td>
          </tr>
        <?	if ($user!='isAdmin'){?>  
          <tr>
          	<td colspan="2" class="bgOverWhite linkButtons">
            	<br><a href="<?
			if ($user->get('guest')==1){
				?>javascript:void();" onclick="askToSignUp('<?=$this->go_signup?>');<?	
			}else{
                echo JRoute::_("index.php?option=com_collector1&view=collector1&id=1&collection_id=".$collection_id);
			}?>">Изменить опции...</a> &nbsp; <a class="txtRed" href="<?=JRoute::_("index.php?option=com_collector1&collection_id=".$collection_id)?>&task=delete" onclick="if (!confirm('Вы уверены, что хотите удалить этот сайт?')) return false;">Удалить сайт...</a><br>
<br>
			</td>
          </tr>
		<?	}		
			$fl++;
		endforeach;
	endif;?>
</table>
<? 	}
	/**
	 *
	 */
	function display($tpl = NULL)
	{	
		$model=$this->getModel();
		$this->collections_data_array=$model->collected(); 
		//SDebug::showDebugContent($this->collections_data_array,'this->collections_data_array');
		//ЕСЛИ коллекции обнаружены:
		if ($this->collections_data_array!==false){
			$modelCollector=JModel::getInstance('collector1','Collector1Model');
			$this->get_options_names=$modelCollector->get_options_names();
			$arrSiteActions=array('site_new' => array("Сайт собран! <a href=\"#\" onClick=\"return goNewSite(".JRequest::getVar('site_new').");\" class=\"linkSpotYellow\">перейти к сайту...</a>","#CCF","blue"),
								  'site_deleted' => array("Сайт удалён.","#FCC","red"),
								  'site_updated' => array("Данные сайта изменены!","#E4F9DD","green")	
						  		 );
			$user = JFactory::getUser();
			foreach ($arrSiteActions as $site_action_type=>$site_action_type_data_array){
				
				if(!$jrequest_collection_id=JRequest::getVar($site_action_type))
					$jrequest_collection_id=JRequest::getVar('collection_id'); //потребуется далее, после выполнения цикла, для определения доступа к странице, с учётом статуса юзера и соответствия сессий создания коллекции и её просмотра
				$this->jrequest_collection_id=$jrequest_collection_id;
				
				if (JRequest::getVar($site_action_type)) {
					$this->done=$site_action_type_data_array; //действие, цвет фона блока сообщения, постфикс для флага
					$this->_action=$site_action_type;
					if ($site_action_type=='site_new') {
						//a notification for admin:
						$adminEmail=JFactory::getConfig()->getValue('mailfrom');
						$siteName=JFactory::getConfig()->getValue('sitename');
						if (!JFactory::getMailer()->sendMail($adminEmail, $siteName, $adminEmail, $siteName.': Новый сайт', 'На сайте WebApps.2-all.com создана новая коллекция.'))
							JMail::sendErrorMess('','Ошибка отправки уведомления о новом сайте...');
					} 
					//получить статус юзера 
					if (SUser::getCustomerStatus($user)=="precustomer")
						$this->done[0].="
<div style=\"padding: 6px 0;\">Пожалуйста, <a href=".JRoute::_($this->go_signup).">добавьте к своим данным логин и пароль</a>.</div> 
							<div>Это займёт несколько секунд и предоставит вам доступ ко всем опциям системы.</div>";
					break;
				}else unset($site_action_type); //чтобы не получить просто последний ключ, т.к. далее будет использоваться реальное значение
			}
			$this->templatename=SSite::getCurrentTemplateName($app);
		}
		parent::display($tpl);
	}
}