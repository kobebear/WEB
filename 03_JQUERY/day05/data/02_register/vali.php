<?php
header("Content-Type:text/plain;charset=UTF-8");
require_once("../init.php");
@$uname=$_REQUEST["uname"];
if($uname){
  sleep(3);
  $sql="select * from xz_user where uname='$uname'";
  if(count(sql_execute($sql,MYSQLI_ASSOC))==0)
    echo "true";
  else
    echo "false";
}else{
  sleep(5);
  @$email=$_REQUEST["email"];
  $sql="select * from xz_user where email='$email'";
  if(count(sql_execute($sql,MYSQLI_ASSOC))==0)
    echo "true";
  else
    echo "false";
}