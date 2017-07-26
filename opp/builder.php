<?php
class builderDB{
	public $db;
	public function connectdabase($host,$username,$password,$database){
		$this->db=mysql_connect($host, $username, $password);
		mysql_select_db( $database,$this->db );
		mysql_query('SET NAMES "utf8"',$this->db);
		return $this->db;
	}
}

interface queryDB{
	public function query($sql);
	public function result();
	public function row();
}

class user implements queryDB{
	private $user;
 	private $result;
    public function __construct()
    {
        $this->user = new builderDB();
		$this->user->connectdabase('localhost','root','','database_web');
    }
	
	public function query($sql){
		$this->result=mysql_query($sql,$this->user->db);
	}
	
	public function result()
	{
		$arr = array();
		while ($row = mysql_fetch_assoc($this->result)) 
		$arr[] = $row;
		return $arr;
	}
	
	public function row()
	{
		return mysql_num_rows($this->result);		
	}
}
?>