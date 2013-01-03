<?	defined('_JEXEC') or die;
/**
 */
class collector1ModelMessages extends JModel{
	
	//private $messArray=array(); // to pass specified data for query
	
	function getMessages($messArray,$user=false){
		if (!$user) $user = JFactory::getUser();
		$user_id_from=$user_id_to=$user_id_read=$user->get('id');
		return SUser::getMessages($messArray);
	}
}