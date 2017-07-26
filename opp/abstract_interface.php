<?php
abstract class data{
	protected $host;
	protected $username;
	protected $pass;
	protected $database;
	
	abstract public function connect();
	abstract public function disconnect();
}

interface query{
	public function query($sql);
	public function result();
	public function row();
}

class user extends data implements query{
	private $db;
	private $link;
	private $result=array();
	private $row;
	private static $singleton;
	
	private function __construct(){
		$this->host='localhost';
		$this->username='root';
		$this->pass='';
		$this->database='database_web';
	}
	
	public function connect(){
		$this->db=mysql_connect($this->host,$this->username,$this->pass);
		mysql_select_db($this->database,$this->db);
		mysql_query('SET NAMES "utf8"',$this->db);
		return $this->db;
	}
	
	public function disconnect(){
		mysql_close();
	}
	
	public function query($sql){
		if($sql){
			$this->link=mysql_query($sql,$this->db);
		}
		return $this->link;
	}
	
	public function result(){
		while ($row = mysql_fetch_assoc($this->link)) 
		$this->result[] = $row;
		return $this->result;
	}
	
	public function row(){
		return mysql_num_rows($this->link);	
	}
	
	public static function getInstance(){
        if(!self::$singleton){
            self::$singleton = new user();//access with key static
        }
        return self::$singleton;
    }
}

?>