<?php
require('singleton.php');
//require('builder.php');
require('abstract_interface.php');
$connect=connect::getInstance();
$connect->create_connect("localhost","root","","database_web","select * from table_user");
$sql=$connect->result();
//var_dump($sql);
$connect->clean();
$connect->disconnect();
//var_dump($connect->result());


//$user=new user();
//$user->query("select * from table_user");

//$result=$user->result();
//var_dump($result);

//$row=$user->row();
//echo $row;

$user=user::getInstance();
$user->connect();
$user->query( "select * from table_user");
$result=$user->result();
var_dump($result);

 ?>
