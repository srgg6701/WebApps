<?

require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SDebug.php';
require_once JPATH_ADMINISTRATOR.DS.'classes'.DS.'SErrors.php';
/**
 * Demonstrates the singleton pattern in Joomla!
 */

class ContentModelApp extends JModel{	//должна быть определена!!!
}

class AppClass extends JObject
{
    protected $myApp;
    protected $myModel;
    protected $myRegistry;
    protected $myTable;
    protected $myUser;
    protected $myView;
	
	/**
     * Constructor
     *
     * @access private
     * @return  SomeClass New object
     */
    function __construct() { 		
		//SDebug::dOutput("display",'h1');
	}
    /**
     * Returns a reference to the global SomeClass object
     *
     * @access public
     * @static
     * @return  SomeClass The SomeClass object
     */
    function getInstance()
    {	SDebug::dOutput("display",'h1');
        static $instance;
        if (!$instance)
        {
            $instance = new AppClass();
        }
        return $instance;
    }
}
