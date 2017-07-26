<?php
class connectdata{
  private $db;
  public $ketqua;
  private $temp;
  public function create_connect($servername,$username,$pass,$namedata,$sql)
  {
      $this->db=mysql_connect($servername,$username,$pass) or die (mysql_error());
      mysql_select_db($namedata,$this->db) or die (mysql_error());
      mysql_query('SET NAMES "utf8"',$this->db);
      //return $this->conn;
      $this->temp=mysql_query($sql,$this->db);
      $this->ketqua= mysql_fetch_assoc($this->temp) or die("<br/><br/>".mysql_error());
      self::tes();
      return $this->ketqua;
  }

  private function tes()
  {
    if(true)
      return $this->db;
    else
       return $this->ketqua;
  }

  public function laydata($sql)
  {
    if($sql)
    {
      $this->temp=mysql_query($sql);
      $this->ketqua= mysql_fetch_assoc($this->temp) or die("<br/><br/>".mysql_error());
      return $this->ketqua;
    }
    return "error";
  }
}

class kethua extends connectdata{
  public function abd(){
   self::tes();
  }
}
?>
