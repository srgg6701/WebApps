<?php

/**
 * @version		$Id: hello.php 15 2009-11-02 18:37:15Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Collector Model
 */
class CollectorModelCollector extends JModelItem
{
	/**
	 * @var string msg
	 */
	protected $msg;
	protected $user_stat;

	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getMsg() 
	{
		
		/*if ($this->user_stat=JRequest::getInt('user_stat')){
			die('user_stat: '.$this->user_stat);
			return $this->user_stat;
		}*/

		if (!isset($this->msg)) 
		{
			$id = JRequest::getInt('id');
			switch ($id) 
			{
			case 2:
				$this->msg = 'Сейчас начнём разбрасывать';
			break;
			default:
			case 1:
				$this->msg = '...и будем собирать!';
			break;
			}
		}
		return $this->msg;
	}
	public function manageUserInfo() 
	{
		$this->user_stat=JRequest::getInt('user_stat');
		return $this->user_stat;
	}
}
