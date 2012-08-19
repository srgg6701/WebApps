<?
/*	jimport('joomla.application.component.model');	*/
SDebug::dOutput("models/debug.php",'h3','display:inline');
class ContentModelDebug extends JModel {	//должна быть определена!!!
	/*function __construct() {
		parent::__construct();
		echo "<h1>ContentModelDebug</h1>";
	}*/
	function temp() {
		echo "<h1>function temp</h1>";
	}
	/**
	 *	Get the revue
	 *
	 *	@return object
	 */
	function getUsersList()
	{
	   $db 	 = JFactory::getDBO();
	   $table = $db->nameQuote( '#__users' );
	   $query = ' SELECT * FROM ' . $table . ' WHERE id>0';
	   $db->setQuery( $query );
	   $revue = $db->loadObjectList();
	   // Return the revue data
	   return $revue;
	}
}