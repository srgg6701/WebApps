<?	defined('_JEXEC') or die;
/**
 */
class collector1ModelMessages extends JModel{

	function getMessages($user=false){ 
		if (!$user) $user = JFactory::getUser();
		$user_id_from=$user_id_to=$user_id_read=$user->get('id'); // die('user_id_from='.$user_id_from);
		return SUser::getMessages(
							false, // сортировка
							$user_id_from, // фильтр по отправителю
							$user_id_to, // фильтр по получателю
							$user_id_read, // фильтр по тому, кто прочёл
							false, // дополнительные критерии выбора записей
							20 //, // лимит записей
							//$fields_subquery=false // дополнительные поля извлечения данных
						   );
	}
}