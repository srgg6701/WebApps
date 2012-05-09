<?php
 class mysql{

	public $sql_login="root";
	public $sql_passwd="";
	public $sql_database="cms_construct";
	public $sql_host="127.0.0.1";

	public $conn_id;
	public $sql_query;
	public $sql_err;
	public $sql_res;

	function sql_connect(){
		$this->conn_id=mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
		$this->conn_log_id=mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
		mysql_select_db($this->sql_database);
	}

	function sql_close(){
		mysql_close($this->conn_id);
	}

	function sql_execute(){
		$this->sql_res=mysql_query($this->sql_query,$this->conn_id);
		$this->sql_err=mysql_error();
	}
	
	function option_write($name, $options, $local){
		$this->sql_connect();
		$this->sql_query = 'INSERT INTO `cms_option` (`name`, `options`, `local`) VALUES("'.$name.'", "'.$options.'", "'.$local.'")';
		$this->sql_execute();
		$this->sql_close();
	}
	
	function cms_write($name, $href, $local){
		$this->sql_connect();
		$this->sql_query = 'INSERT INTO `cms` (`name`, `local`, `href`) VALUES("'.$name.'", "'.$local.'", "'.$href.'")';
		$this->sql_execute();
		$this->sql_close();
	}
	
	function cms_select(){
		$this->sql_connect();
		$this->sql_query = 'SELECT `href`, `id_cms` FROM `cms`';
		$this->sql_execute();
		$this->sql_close();
		while($res = mysql_fetch_array($this->sql_res)){
			$arr[] = $res;
		}
		return $arr;
	}
	
	function option_select($option){
		$this->sql_connect();
		$this->sql_query = "SELECT `id_options` FROM `cms_option` WHERE `name` LIKE '%".$option."%'";
		$this->sql_execute();
		$this->sql_close();
		$res = mysql_fetch_array($this->sql_res);
		return $res['id_options'];
		
		
	}
	
	function cms_communic_write($id_cms, $id_option, $option){
		$this->sql_connect();
		$this->sql_query = 'INSERT INTO `cms_communic` (`id_cms`, `id_option`, `options`) VALUES("'.$id_cms.'", "'.$id_option.'", "'.$option.'")';
		$this->sql_execute();
		$this->sql_close();
	}

}