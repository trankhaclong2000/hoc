<?php
//singleton
class connect{
    private $db;
    private static $tb;
    private $ketqua;
    private $temp;
    private function __construct(){}
	
    public static function getInstance(){
        if(!self::$tb){
            self::$tb = new connect();//access with key static
        }
        return self::$tb;
    }
	
    public function create_connect($servername,$username,$pass,$namedata,$sql)
  	{
      $this->db=mysql_connect($servername,$username,$pass) or die (mysql_error());
      mysql_select_db($namedata,$this->db) or die (mysql_error());
      mysql_query('SET NAMES "utf8"',$this->db);
      $sql=mysql_real_escape_string($sql);//use with SQL injection
      $this->temp=mysql_query($sql,$this->db);
  	}
	
	public function result(){
		$arr = array();
		while ($row = mysql_fetch_assoc($this->temp)) 
			$arr[] = $row;
		return $arr;
	}
	
	public function disconnect()
	{
		mysql_close();
	}
	
	public function clean()
	{
		unset($db);
    		unset($tb);
		unset($ketqua);
		unset($temp);
	}
}
?>
