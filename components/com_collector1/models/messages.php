<?	defined('_JEXEC') or die;
/**
 */
class collector1ModelMessages extends JModel{
	
	private $messArray=array();
	
	function getMessages($user=false){
		if (!$user) $user = JFactory::getUser();
		$user_id_from=$user_id_to=$user_id_read=$user->get('id'); // die('user_id_from='.$user_id_from);
		$sort=$fields_subquery=false;
		$limit=20;
		$messArray=$this->messArray;
		if (!empty($messArray)){
			$sort=$messArray['sort'];
			$user_id_from=$messArray['user_id_from'];
			$user_id_to=$messArray['user_id_to'];
			$user_id_read=$messArray['user_id_read'];
			$criteria=$messArray['criteria'];
			$limit=$messArray['limit'];
			$fields_subquery=$messArray['fields_subquery'];
		} 	
		return SUser::getMessages(
							$sort, // сортировка
							$user_id_from, // фильтр по отправителю
							$user_id_to, // фильтр по получателю
							$user_id_read, // фильтр по тому, кто прочёл
							$criteria, // дополнительные критерии выбора записей
							$limit, //, // лимит записей
							$fields_subquery // дополнительные поля извлечения данных
						   );
	}
	public function fillMessArray($messArray){
		foreach($messArray as $key=>$value)
			if ($value){
				$this->messArray[$key]=$value; 
			}
	}
}